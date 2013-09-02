<?php
	session_start();	
	/*echo "<pre>";
	print_r($_SESSION);
	echo "</pre>";*/
	if($_SESSION[$txtApp['session']['nivelUsuario']]!=0){
		echo "<script type='text/javascript'> alert('Ha intentado entrar a una zona protegida, sus datos seran ENVIADOS'); </script>";
	}
?>
<!--<script type="text/javascript" src="../../clases/jquery-1.3.2.min.js" ></script>
<script type="text/javascript" src="js/jquery-190.js" ></script>-->


<script src="js/jquery-ui/js/jquery-1.9.1.js"></script>
<script src="js/jquery-ui/js/jquery-ui-1.10.3.customn.js"></script>
<script src="js/jquery-easing.1.3.js"></script>




<script type="text/javascript"  src="js/funciones.js" ></script>
<script type="text/javascript">
	$(document).ready(function(){
		redimensionarAdmin();
	});
	function redimensionarAdmin(){
		anchoDoc=$("#contenedorAdmin").width();
		anchoDoc=parseInt(anchoDoc)-265;
		$("#detalleUsuarios").css("width",anchoDoc);
		altoDoc=parseInt($("#contenedorAdmin").height());
	}
	window.onresize=redimensionarAdmin;
	
	
	
</script>
<link rel="stylesheet" type="text/css" media="all" href="../../css/estilos.css" >
<style type="text/css">
<!--
html,document,body{ position:absolute;height:100%; width:100%; margin:0px; font-family: Verdana, Geneva, sans-serif; overflow:hidden; background:#999;}
a {
	font-size: 10px;
	color: #09F;
}
a:visited {
	color: #09F;
}
a:hover {
	color: #0CF;
}
a:active {
	color: #09F;
}
li{margin-bottom:7px;}
#contenedor{ margin:3px;height:100%; width:100%; overflow:hidden; margin:0px; border:1px solid #000;}
#menuLateral{width:15%; height:99%; border:1px solid #000; background:#F0F0F0; float:left; overflow:auto;}
#menuArbol{height:99.5%; width:99%; overflow:auto;}
#contenidoApp{float:left; width:84%; height:99%; }
body{font-family:Verdana, Geneva, sans-serif; font-size:11px;}
#tituloOpcion{ font-weight:bold;}
-->
</style>
<div id="contenedorAdmin" style="position: absolute;width: 99.5%;height: 99%;background: #FFF;border: 1px solid #000;margin: 2px;">
	<div id="contenedorIzquierdoAdmin" style="position: relative;float: left;width: 250px;height: 99%;background: #FFF;margin: 2px;border: 0px solid #666;overflow: auto;">
		<div style="margin-top: 50px; height: 30px;padding: 5px;background: #FFF; font-size: 14px; font-weight: bold;text-align: center;">Usuarios, Gupos y Gesti&oacute;n</div>
		<div style="height: 110px;padding: 5px;background: #fff;font-weight: bold;text-align: left; margin: 20px 4px 4px 4px;border: 0px solid #666;width:93%;">
			<table class="tablita">
				<caption>
					Usuarios y Grupos
				</caption>
				<tr class="enlace" onclick="up('Usuario_Nuevo')">
					<td >Nuevo (s) Usuario (s)</td>
				</tr>
				<tr class="enlace" onclick="up('Usuario_Gestion'),buscaUsu()">
					<td>Gesti&oacute;n Usuarios</td>
				</tr>
				<tr class="enlace" onclick="up('Grupo_Nuevo')">
					<td>Nuevo (s) Grupo (s)</td>
				</tr>
				<tr class="enlace" onclick="up('Grupo_Gestion')">
					<td>Gesti&oacute;n Grupos</td>
				</tr>
				<tfoot><td></td></tfoot>
			</table>
		</div>
		<div style="height: 110px;padding: 5px;background: #fff;font-weight: bold;text-align: left; margin: 50px 4px 4px 4px;border: 0px solid #666;width:93%;">
			<table class="tablita">
				<caption>
					Permisos Especiales
				</caption>
				<tr class="enlace" onclick="up('Permisos_Especiales')">
					<td>Listar Permisos Especiales</td>
				</tr>
				<tfoot><td></td></tfoot>
			</table>
		</div>
		<div id="contesta"></div>
	</div>
	<div id="detalleUsuarios" style="position: relative;float: left;height: 99%;background: #FFF;margin: 2px;border: 0px solid #666;overflow: auto;">
		
	</div>
</div>
<div id="mini" class="barrainf">
</div>
<div id="cargando" class="transgral">
	<div id="msgCargador" style="height: 100px; width: 130px; position: absolute; left:50%; top:50%; margin-left:-65px; margin-top:-100px;">
		<div>Cargando...&nbsp;<img src="../../img/cargador.gif" border="0" /></div>
	</div>
</div>
<div id="error" class="error" style="margin-left: 0; margin-top: 0;"></div>
<div id="bloqueo" class="transgral">
	<div id="VentanaPerfil" style="position: absolute; height:  405px; width: 600px; background: #fff; left: 50%; top: 50%; margin-left:-300px; margin-top:-250px; border: 2px solid #f0f0f0;">
		<div id="barraup" style="width: 100%; height: 20px;">
			<div id="cerrar" class="btns" onclick="explota('bloqueo')" title="Cerrar Ventana">
				<div style="margin: 1px;"><img src="../../img/regre.png" width=23 height=18></div>
			</div>
			<div id="minimi" class="btns" onclick="minimizar()" title="Minimizar Ventana">
				<div style="margin: 1px;"><img src="../../img/mini.png" width=23 height=18></div>
			</div>
		</div>
		<div id="dpuv"></div>
		<div id="todo" style="width: 100%; height: 380px; background: #fff;">
			<div id="pestanas" style="width: 100%; height: 40px; border-bottom: 4px solid #f0f0f0; font-size: 10px;">
				<div id="btn_5" onclick="pesta('5','0')" class="pestits off" style="width: 110">
					<div style="margin-top: 5px;">Usuario Accesos</div>
				</div>
				<div id="btn_6" onclick="pesta('6','0')" class="pestits off" style="width: 110px;">
					<div style="margin-top: 5px;">Editar Informaci&oacute;n</div>
				</div>
				<div id="btn_7" onclick="pesta('7','0')" class="pestits ono" style="width: 55px;">
					<div style="margin-top: 5px;">Perfil</div>
				</div>
			</div>
			<div id="cuerpoP_7" style="width: 100%; height: 340px; background: #FFF;">
				<div id="fotoUsuario" style="width: 250px; margin: 10px; height: 300px; background: #f0f0f0; border: 1px solid rgb(225, 225, 225); float: left;">
					<img src="../../img/tortuga.png" width=250 height=300>
				</div>
				<div style="width: 300px; height: 70px; margin-right: 20px; margin-top: 10px; float: right; text-align: center;">
					<p class="titulo">PERFIL</p>
				</div>
				<div id="DatosU_7" style="position: absolute;width: 300px; height: 200px; top: 50%; left: 50%; margin-top: -28px; margin-left: -20px;"></div>
			</div>
			<div id="cuerpoP_6" style="display: none; width: 100%; height: 340px; background: #FFF;">
				<div id="fotoUsuario" style="width: 250px; margin: 10px; height: 300px; background: #f0f0f0; border: 1px solid rgb(225, 225, 225); float: left;">
					<img src="../../img/tortuga.png" width=250 height=300>
				</div>
				<div id="DatosU_6" style="position: absolute;width: 300px; height: 300px; top: 50%; left: 50%; margin-top: -125px; margin-left: -20px;"></div>
			</div>
			<div id="cuerpoP_5" style="display: none; width: 100%; height: 340px; background: #FFF;">
				<div id="DatosU_5" style="width: 100%; height: 100%;"></div>
			</div>
			<div id="cuerpoP_4" style="display: none; width: 100%; height: 340px; background: #FFF;">
				4<div id="fotoUsuario" style="width: 250px; margin: 10px; height: 300px; background: #f0f0f0; border: 1px solid rgb(225, 225, 225); float: left;"></div>
				<div style="width: 300px; height: 70px; margin-right: 20px; margin-top: 10px; float: right; background: #f0f0f0;"></div>
				<div id="DatosU_4" style="position: absolute;width: 300px; height: 200px; background: #F0F0F0; top: 50%; left: 50%; margin-top: -28px; margin-left: -20px;"></div>
			</div>
		</div>
	</div>
</div>