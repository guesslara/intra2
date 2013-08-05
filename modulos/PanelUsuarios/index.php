<?php
	session_start();	
	/*echo "<pre>";
	print_r($_SESSION);
	echo "</pre>";*/
	if($_SESSION[$txtApp['session']['nivelUsuario']]!=0){
		echo "<script type='text/javascript'> alert('Ha intentado entrar a una zona protegida, sus datos seran ENVIADOS'); </script>";
	}
?>
<script type="text/javascript" src="../../clases/jquery-1.3.2.min.js" ></script>
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
<link rel="stylesheet" type="text/css" href="../../css/estilos.css" >
<style type="text/css">
<!--
html,document,body{ position:absolute;height:100%; width:100%; margin:0px; font-family:Verdana, Geneva, sans-serif; overflow:hidden; background:#999;}
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
		<div style="height: 30px;padding: 5px;background: #FFF; font-size: 14px; font-weight: bold;text-align: center;">Usuarios y Grupos</div>
		<div style="height: 110px;padding: 5px;background: #fff;font-weight: bold;text-align: left; margin: 4px 4px 4px 4px;border: 0px solid #666;width:93%;">
			<table class="tablita">
				<caption>
					Gestion de Usuarios
				</caption>
				<tr class="enlace" onclick="up('Usuarios_Nuevo')">
					<td >Nuevo Usuario</td>
				</tr>
				<tr class="enlace" onclick="up('Usuarios_Borrar')">
					<td>Borrar Usuario</td>
				</tr>
				<tr class="enlace" onclick="up('Usuarios_Perfil')">
					<td>Perfil de Usuario</td>
				</tr>
				<tfoot><td></td></tfoot>
			</table>
		</div>
		<div style="height: 110px;padding: 5px;background: #fff;font-weight: bold;text-align: left; margin: 4px 4px 4px 4px;border: 0px solid #666;width:93%;">
			<table class="tablita">
				<caption>
					Gestion de Grupos
				</caption>
				<tr class="enlace" onclick="up('Grupos_Añadir')">
					<td>Agregar Grupo</td>
				</tr>
				<tr class="enlace" onclick="up('Grupos_Borrar')">
					<td>Borrar Grupo</td>
				</tr>
				<tr class="enlace" onclick="up('Grupos_Perfil')">
					<td>Perfil del Grupo</td>
				</tr>
				<tfoot><td></td></tfoot>
			</table>
		</div>
		<div style="height: 110px;padding: 5px;background: #fff;font-weight: bold;text-align: left; margin: 4px 4px 4px 4px;border: 0px solid #666;width:93%;">
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
<!--<div id="cargando" style=" display:none;position: absolute; left: 0; top: 0; width: 100%; height: 100%; background: url(../../img/desv.png) repeat;">
	<div id="msgCargador"><div style="padding:6px;">&nbsp;<img src="../../img/cargador.gif" border="0" /></div></div>
</div>-->