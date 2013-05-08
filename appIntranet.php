<?php
    session_start();
    session_regenerate_id(true);
    include("includes/txtApp.php");
    include("clases/cookieUtils.php");
    $cookieU=new CookieUtils();
    $valorCookieAI=$cookieU->get($txtApp['session']['cookieApp']);
    //include("../../clases/regLog.php");
    //$objLog=new regLog();
    //$objLog->consulta($_SESSION[$txtApp['session']['loginUsuario']],date("Y-m-d"),date("H:i:s"),$_SERVER['REMOTE_ADDR'],"ASIGNACIONES",$_SESSION[$txtApp['session']['origenSistemaUsuario']]);
    if(!isset($_SESSION[$txtApp['session']['idUsuario']])){
	echo "<script type='text/javascript'> alert('Su sesion ha terminado por inactividad'); window.location.href='cerrar_sesion.php'; </script>";
	exit;
    }
    //se arma la foto
    $path="../fotos2/".$_SESSION[$txtApp['session']['nominaUsuario']].".JPG";
    //$path="../fotos2/201952.JPG";
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
		verificaMensajesNuevos();
	});	
	function redimensionarCapas(){
		var altoDoc=$("#contenedorPrincipal").height();
		var anchoDoc=$("#contenedorPrincipal").width();
		$("#contenedorLogIn").css("height",(altoDoc-50)+"px");
		$("#contenedorLogInDer").css("height",(altoDoc-50)+"px");
                //alert(altoDoc);
                $("#col1").css("width",(anchoDoc-11)+"px");
                $("#col1").css("height",(altoDoc-60)+"px");
                $("#col2").css("height",(altoDoc-110)+"px");
                $("#contenidoAppPrincipal").css("height",(altoDoc-107)+"px");
                $("#contenidoAppPrincipal").css("width",(anchoDoc-340)+"px");
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
<input type="hidden" name="txtUsuarioActual" id="txtUsuarioActual" value="<?=$_SESSION[$txtApp['session']['loginUsuario']];?>">
<div id="sesion" style="color:#FFF;"></div>
<div id="contenedorPrincipal">
	<div id="barraSuperior">
		<div id="tituloPrincipal">Intranet IQelectronics</div>
		<div id="tituloDer">
		    <div style="float: right;margin-top: -2px;"><a href="cerrar_sesion.php"><img src="img/shutdown1.png" border="0"></a></div>
		    <div style="margin-top: 15px;float: right;"><?=$_SESSION[$txtApp['session']['nombreUsuario']]." ".$_SESSION[$txtApp['session']['apellidoUsuario']];?></div>
		</div>
	</div>
	<!--<div id="contenidoPrincipal">-->
		<!--<div id="contenedorPrincipalApp">-->
			<div id="col1">
			    <div style="height: 25px;padding: 5px;background: #e1e1e1;">
				<div id="Accesos" class="estilosEnlacesOpciones" onclick="accionesEnlaces('Accesos')">Accesos</div>
				<div id="Administrativas" class="estilosEnlacesOpciones" onclick="accionesEnlaces('Administrativas')">Administrativas</div>
				<div id="Operativas" class="estilosEnlacesOpciones" onclick="accionesEnlaces('Operativas')">Operativas</div>
				<div id="Utilerias" class="estilosEnlacesOpciones" onclick="accionesEnlaces('Utilerias')">Utilerias</div>
				<div id="Cursos" class="estilosEnlacesOpciones" onclick="accionesEnlaces('Cursos')">Cursos</div>
				<div id="Directorio" class="estilosEnlacesOpciones" onclick="accionesEnlaces('Directorio')">Directorio</div>
			    </div>
			    <div id="contenidoAppPrincipal" style="float: left;width: 60%;border-right: 1px solid #F0F0F0;margin: 5px;overflow: auto;">
				<? print_r($_SESSION); ?>
			    </div>
                            <!--<div id="barraPie" style="float: left;width: 50%;">Dise&ntilde;ada por Depto. Sistemas IQelectronics 2013&copy;</div>-->
                            <div id="col2">
                                <div id="fotoUsuario" style="width: 250px;margin: 10px auto;height: 300px;background: #FFF;border: 1px solid #e1e1e1;"></div>
                                <div style=" height: 45%;margin: 10px;border: 0px solid #CCC;font-size: 12px;text-align: left;">
				    <div style="font-size: 12px;margin: 10px;border: 1px solid #CCC;width: 240px;height: 20px;padding: 5px;">&nbsp;<a href="#" onclick="mostrarCapaVistaMensajes()" style="color: blue;text-decoration: none;">Ver Mensaje(s)</a><span id="msgNuevosUsuario"></span></div>
                                    <div style="font-size: 12px;margin: 10px;">Usuarios conectados:</div>				    
                                    <div id="usuariosConectados" style="margin: 10px;padding:5px;background: #FFF;width: 240px;height: 80%;position: relative;overflow: auto;"></div>
                                </div>
                            </div>    
			</div>
		<!--</div>-->
	<!--</div>-->
</div>
<div id="cargadorGeneral" style="position: absolute;width: 150px;height: 30px;padding: 20px;top: 50%;left: 50%;margin-left: -75px;margin-top: -20px;border: 1px solid #666;background: #FFF;text-align: center;">Cargando...</div>
<!--<div style="position: absolute;bottom: 0;height: 20px;padding: 5px;border: 1px solid #333;background: #CCC;width: 99%;margin: 3px;">
    <div style="font-size: 10px;border: 1px solid #FF0000;width: 130px;margin-top: 3px;">Personas conectadas...</div>
</div>-->
<div id="capaMensajesPanel" style="display: block;position: absolute;width: 100%;height: 100%;background: url(img/desv.png) repeat;z-index: 10000000000;">
    HOLA
</div>

<div id="capaMensaje">
    <div class="estiloCapaMensaje">
        <div class="mensajeCapa">Enviar Mensaje...</div>
	<div class="estiloCapaMensaje1">
	    <div class="estiloPara">Para:&nbsp;<span id="paraUsuario"></span><input type="hidden" name="paraUsuarioOculto" id="paraUsuarioOculto"</div>
            <textarea name="txtCapaMensaje" id="txtCapaMensaje" rows="4" cols="45" style="margin: 10px;"></textarea>
            <hr style="background: #CCC;width: 96%;">
            <div style="margin: 10px;text-align: right;">
                <input type="button" value="Cancelar" onclick="cancelarMensaje()">
                <input type="button" value="Enviar Mensaje" onclick="enviarMensajeUsuario()">
            </div>
	</div>
    </div>
</div>

<script type="text/javascript">
    setInterval(verificaSesionUsuario,1500000);
    setInterval(verificarUsuariosConectados,10000);
    setInterval(verificaMensajesNuevos,10000);
</script>
</body>
</html>