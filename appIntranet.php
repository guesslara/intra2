<?php
    session_start();
    session_regenerate_id(true);
    include("includes/txtApp.php");
    //include("../../clases/regLog.php");
    //$objLog=new regLog();
    //$objLog->consulta($_SESSION[$txtApp['session']['loginUsuario']],date("Y-m-d"),date("H:i:s"),$_SERVER['REMOTE_ADDR'],"ASIGNACIONES",$_SESSION[$txtApp['session']['origenSistemaUsuario']]);
    if(!isset($_SESSION[$txtApp['session']['idUsuario']])){
	echo "<script type='text/javascript'> alert('Su sesion ha terminado por inactividad'); window.location.href='index.php'; </script>";
	exit;
    }
    //se arma la foto
    $path="../fotos2/".$_SESSION[$txtApp['session']['nominaUsuario']].".JPG";
?>
<html>
<title>GUI 4</title>
<head>
<link rel="stylesheet" type="text/css" href="css/estilos.css" >
<script type="text/javascript" src="js/funciones.js"></script>
<script type="text/javascript" src="clases/jquery-1.3.2.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		redimensionarCapas();
		colocarFoto();
		colocarFocusElemento("Accesos");
		accionesEnlaces("Accesos");
		verificarUsuariosConectados();
	});	
	function redimensionarCapas(){
		var altoDoc=$("#contenidoPrincipal").height();
		var anchoDoc=$("#contenidoPrincipal").width();
		$("#contenedorLogIn").css("height",(altoDoc-50)+"px");
		$("#contenedorLogInDer").css("height",(altoDoc-50)+"px");
                //alert(anchoDoc);
                $("#col1").css("width",(anchoDoc-360)+"px");
	}
	window.onresize = redimensionarCapas;	
	function colocarFoto(){
            $('#fotoUsuario').css('background-image','url(<?=$path;?>)');
	    $('#fotoUsuario').css('background-position','center');
	    $('#fotoUsuario').css('background-repeat','no-repeat');
        }	
</script>
</head>
<body>
<div id="contenedorPrincipal">
	<div id="barraSuperior">
		<div id="tituloPrincipal">Intranet IQelectronics</div>
		<div id="tituloDer">
		    <div style="float: right;margin-top: -2px;"><a href="#"><img src="img/shutdown1.png" border="0"></a></div>
		    <div style="margin-top: 15px;float: right;"><?=$_SESSION[$txtApp['session']['nombreUsuario']]." ".$_SESSION[$txtApp['session']['apellidoUsuario']];?></div>
		</div>
	</div>
	<div id="contenidoPrincipal">
		<div id="contenedorPrincipalApp">
			<div id="col1">
			    <div style="height: 25px;padding: 5px;background: #e1e1e1;">
				<div id="Accesos" class="estilosEnlacesOpciones" onclick="accionesEnlaces('Accesos')">Accesos</div>
				<div id="Administrativas" class="estilosEnlacesOpciones" onclick="accionesEnlaces('Administrativas')">Administrativas</div>
				<div id="Operativas" class="estilosEnlacesOpciones" onclick="accionesEnlaces('Operativas')">Operativas</div>
				<div id="Utilerias" class="estilosEnlacesOpciones" onclick="accionesEnlaces('Utilerias')">Utilerias</div>
				<div id="Cursos" class="estilosEnlacesOpciones" onclick="accionesEnlaces('Cursos')">Cursos</div>
				<div id="Directorio" class="estilosEnlacesOpciones" onclick="accionesEnlaces('Directorio')">Directorio</div>
			    </div>
			    <div id="contenidoAppPrincipal" style="border: 0px solid #FF0000;margin: 5px;">
				<? print_r($_SESSION); ?>
			    </div>
			    <div id="barraPie">Dise&ntilde;ada por Depto. Sistemas IQelectronics 2013&copy;</div>
			</div>
                        <div id="col2">
                            <div id="fotoUsuario" style="width: 265px;margin: 10px auto;height: 350px;background: #FFF;border: 1px solid #e1e1e1;"></div>
			    <div style=" height: 45%;margin: 5px;border: 0px solid #CCC;font-size: 12px;text-align: left;">
				<div style="font-size: 14px;margin: 5px;">Usuarios conectados:</div>
				<div id="usuariosConectados" style="margin: 5px;padding:5px;background: #FFF;width: 260px;height: 85%;position: relative;">
				    
				</div>
			    </div>
                        </div>			
		</div>
		
	</div>
</div>
<div id="cargadorGeneral" style="position: absolute;width: 150px;height: 30px;padding: 20px;top: 50%;left: 50%;margin-left: -75px;margin-top: -20px;border: 1px solid #666;background: #FFF;text-align: center;">Cargando...</div>
<!--<div style="position: absolute;bottom: 0;height: 20px;padding: 5px;border: 1px solid #333;background: #CCC;width: 99%;margin: 3px;">
    <div style="font-size: 10px;border: 1px solid #FF0000;width: 130px;margin-top: 3px;">Personas conectadas...</div>
</div>-->
</body>
</html>