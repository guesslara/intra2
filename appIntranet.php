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
<script type="text/javascript" src="clases/jquery-1.3.2.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		redimensionarCapas();
		colocarFoto();
	});	
	function redimensionarCapas(){
		var altoDoc=$("#contenidoPrincipal").height();
		var anchoDoc=$("#contenidoPrincipal").width();
		$("#contenedorLogIn").css("height",(altoDoc-50)+"px");
		$("#contenedorLogInDer").css("height",(altoDoc-50)+"px");
                //alert(anchoDoc);
                $("#col1").css("width",(anchoDoc-338)+"px");
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
		<div id="tituloDer">Ayuda | Desconectar</div>
	</div>
	<div id="contenidoPrincipal">
		<div id="contenedorPrincipalApp">
			<div id="col1"><? print_r($_SESSION); ?></div>
                        <div id="col2">
                            <div id="fotoUsuario" style="width: 265px;margin: 10px auto;height: 350px;background: #FFF;border: 1px solid #e1e1e1;">

                            </div>
                        </div>
		</div>
		<div id="barraPie">Dise&ntilde;ada por Depto. Sistemas IQelectronics 2013&copy;</div>
	</div>
</div>
</body>
</html>