<?php
    //printf($_POST['lugar']);
    session_start();	
    /*echo "<pre>";
    print_r($_SESSION);
    echo "</pre>";*/
    if($_SESSION[$txtApp['session']['nivelUsuario']]!=0){
    	echo "<script type='text/javascript'> alert('Ha intentado entrar a una zona protegida, sus datos seran ENVIADOS'); </script>";
    }
    $lugar=explode("_",$_POST["lugar"]);
?>
<link rel="stylesheet" type="text/css" href="../../css/estilos.css" >
<script type="text/javascript" src="../../clases/jquery-1.3.2.min.js" ></script>
<script type="text/javascript"  src="js/funciones.js" ></script>
<script type="text/javascript">
</script>
<div id="encabezado" style="height: 150px; width: 1000px; float: left; background-image: url('../../css/flecha.png'); background-repeat: no-repeat; background-position: 20px 30px;">
    <div id="ubik" style="width: 300px; height: 30px; float: left; margin: 40px 10px 0px 100px; padding: 5px;">
	<titulo class="titulo"><?=$lugar[0];?></titulo>
    </div>
    <div style="clear: both;"></div>
    <div id="ubik2" style="width: 300px; height: 30px; float: left; margin: 0px 5px 0px 140px; padding: 1px; font-size: large;">
	<place class="location"><?=utf8_decode($lugar[1]);?></place>
    </div>
 
</div>
<div id="instrucciones" style="height: 150px; width: 1000px; float: left; ">
    <div id"comizq" style="width: 150px; height: 150px; float: left; background-image: url('../../css/comizq.png'); background-repeat: no-repeat; background-position: 0px 0px;"></div>
    <div id"comder" style="width: 150px; height: 150px; float: right; background-image: url('../../css/comder.png'); background-repeat: no-repeat; background-position: 0px 0px;"></div>
    <p class="ins">En esta secci&oacute;n se dan Altas de usuarios a las diferentes Aplicaciones Web, se da la opci&oacute;n de consultar
    usuarios nuevos en el Active Directory y en caso de existir se configuran en la pesta&ntilde;a de usuarios inactivos</p>
</div>
<div style="clear: both;"></div>
<div id="panel" style="height: 600px; width: 1000px; border: 1px solid #666;">
    <div id="contenedorIzquierdoAdmin" style="position: relative;float: left;width: 160px;height: 99%;background: #cccccc;margin: 2px;border: 0px solid #666;overflow: hidden;">
		<div id="btn_1" onclick="pesta('1')" class="pesta off">
		    <p>Nuevo Usuario</p>
		</div>
		<div id="btn_2" onclick="pesta('2')" class="pesta off">
		    <p>Usuarios desde AD</p>
		</div>
		<div id="btn_3" onclick="pesta('3')" class="pesta off">
		    <p>Usuarios Inactivos</p>
		</div>
	</div>
	<div id="detalle_1" style="display: none; width: 830px; position: relative;float: right;height: 99%;background: #FFF;margin: 2px;border: 0px solid #666;overflow: auto;">
	    1
	</div>
	<div id="detalle_2" style="display: none; width: 830px; position: relative;float: right;height: 99%;background: #FFF;margin: 2px;border: 0px solid #666;overflow: hidden;">
	     <div id="chek" style="height: 20px;">
		<input type="button" value="Checar" onclick="ajaxApp('lista','controlador.php','action=ad','POST');"/> Active Directory...
	    </div>
	    <div id="lista"></div>
	</div>
	<div id="detalle_3" style="display: none; width: 830px; position: relative;float: right;height: 99%;background: #FFF;margin: 2px;border: 0px solid #666;overflow: auto;">
		3
	</div>
</div>