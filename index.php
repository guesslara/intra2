<?php
	session_start();
	session_regenerate_id(true);
	include("includes/txtApp.php");
	include("clases/usuarioIntranet.class.php");
	//include("../../clases/regLog.php");
	//$objLog=new regLog();
	//$objLog->consulta($_SESSION[$txtApp['session']['loginUsuario']],date("Y-m-d"),date("H:i:s"),$_SERVER['REMOTE_ADDR'],"ASIGNACIONES",$_SESSION[$txtApp['session']['origenSistemaUsuario']]);
	if(!isset($_SESSION[$txtApp['session']['idUsuario']])){
		//se actualiza el estado del usuario
		$objUsuario=new usuariosIntranet();
		$objUsuario->cambiarEstadoInactivo($_SESSION[$txtApp['session']['idUsuario']]);	
	    //echo "<script type='text/javascript'> alert('Su sesion ha terminado por inactividad');</script>";
	    //exit;
	}else{
		header("Location: appIntranet.php");
		exit;
	}
?>
<html>
<title>GUI 4</title>
<head>
<link rel="stylesheet" type="text/css" href="css/estilos.css" >
<script type="text/javascript" src="clases/jquery-1.3.2.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		redimensionarCapas();
		$("#txtCajaUsuario").focus();
	});	
	function redimensionarCapas(){
		var altoDoc=$("#contenidoPrincipal").height();
		var anchoDoc=$("#contenidoPrincipal").width();
		$("#contenedorLogIn").css("height",(altoDoc-50)+"px");
		$("#contenedorLogInDer").css("height",(altoDoc-50)+"px");		
	}
	window.onresize = redimensionarCapas;	
	function validacion1(){
		var validacion=true;
		var usuario=$("#txtCajaUsuario").val();
		var pass=$("#txtCajaPassword").val();
		if(usuario=="" || pass==""){
			$("#erroresLogIn").show();
			$("#erroresLogIn").html("Error: Verifique los Datos de acceso");
			validacion=false;
		}
		return validacion;
	}
</script>
</head>
<body>
<div id="contenedorPrincipal">
	<div id="barraSuperior">
		<div id="tituloPrincipal"><?=$txtApp['login']['tituloAppPrincipal'];?></div>
		<div id="tituloDer1">Ayuda | LogIn</div>
	</div>
	<div id="contenidoPrincipal">
		<div id="contenedorLogIn">
			<div id="erroresLogIn"><? if(isset($_GET["error"])){echo "<script type='text/javascript'> $('#erroresLogIn').show(); </script>"; echo "Error: Verifique los Datos de Acceso.";} ?></div>
			<div id="contenedorForm">
				<form id="frmAcceso" method="post" action="controladorLogin.php" onsubmit="return validacion1()">
					<div id="tituloDatos"><?=$txtApp['login']['tituloDatosAcceso'];?></div>
					<div id="contenedorLoginPrincipal">
						<div id="contenedorLoginTexto">
							<div id="texto1"><?=$txtApp['login']['tituloUsuario'];?></div>
							<div id="texto2"><?=$txtApp['login']['tituloPass'];?></div>
						</div>
						<div id="contenedorLoginCajas">
							<div id="caja1"><input type="text" name="txtCajaUsuario" id="txtCajaUsuario"></div>
							<div id="caja2"><input type="password" name="txtCajaPassword" id="txtCajaPassword"></div>
						</div>
					</div>
					<div id="divBotonEntrar"><input type="submit" id="botonEntrar" value="Entrar"></div>
				</form>
			</div>
		</div>
		<div id="contenedorLogInDer"><br><img src="img/LogoII.gif" width="90%" /></div>
		<div id="barraPie">Dise&ntilde;ada por Depto. Sistemas IQelectronics 2013&copy;</div>
	</div>
</div>
</body>
</html>
