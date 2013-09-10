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
<link href="js/jqueryui192/css/no-theme/jquery-ui-1.9.2.custom.css" rel="stylesheet">
<script src="js/jqueryui192/js/jquery-1.8.3.js"></script>
<script src="js/jqueryui192/js/jquery-ui-1.9.2.custom.js"></script>
<script type="text/javascript"  src="js/funciones.js" ></script>
<!--<link rel="stylesheet" type="text/css" href="../../css/estilos.css" >
<!--<script type="text/javascript"  src="js/funciones.js" ></script>-->
<script type="text/javascript">
    ajaxApp("pnlGroup","gpos.php","pagAct=1&intervalo=0&totalpag=0","POST");
    ajaxApp("pnlUsu","usu.php","nombre=","POST");
    ajaxApp("pnlModE","modul.php","pagAct=1&intervalo=0&totalpag=0","POST");
    /*$(document).ready(function() {
	$( "#accordion" ).accordion({
	    "fillSpace": true,
	    "active": 1
	});
    });*/
</script>

<div id="encabezado" style="height: 150px; width: 1000px; float: left; background-image: url('../../img/flecha.png'); background-repeat: no-repeat; background-position: 20px 30px;">
    <div id="ubik" style="width: 300px; height: 30px; float: left; margin: 40px 10px 0px 100px; padding: 5px;">
	<titulo class="titulo"><?=$lugar[0];?></titulo>
    </div>
    <div style="clear: both;"></div>
    <div id="ubik2" style="width: 300px; height: 30px; float: left; margin: 0px 5px 0px 140px; padding: 1px; font-size: large;">
	<place class="location"><?=utf8_decode($lugar[1]);?></place>
    </div>
 
</div>
<div id="foto" style="height: 300px; width: 250px; float: right; display: none;background: #FFF;">
    $("#foto").css("height",(altoDoc*30)/100);
    $("#foto").css("width",(anchoDoc*20)/100);
    background: #B6DCB5;
</div>
<div id="instrucciones" style="height: 150px; width: 1000px; float: left; ">
    <div id"comizq" style="width: 150px; height: 150px; float: left; background-image: url('../../img/comizq.png'); background-repeat: no-repeat; background-position: 0px 0px;"></div>
    <div id"comder" style="width: 150px; height: 150px; float: right; background-image: url('../../img/comder.png'); background-repeat: no-repeat; background-position: 0px 0px;"></div>
    <p class="ins">En esta secci&oacute;n se Administran los Grupos, tambien se agregan o eliminan los usuarios correspondientes"</p>
</div>
<div style="clear: both;"></div>
<div id="panel" style="height: 580px; width: 990px;">
    <div id="pnlMod" style="width: 188px; height: 100%; background: #f0f0f0; float: left; border-right: 1px solid #A0ABA0;">
	<div id="arriba" style="width: 100%; height: 30px;">
	    <div id="otro" style="width: 100%; text-align: center; height: 30px; display: none;">
	        Buscar: <input type="text" id="busknom" name="busknom" class="btn_chi" onkeyup="">
	    </div>
	    <div id="btnMM" style="width: 100%; text-align: center; height: 30px;">
		<input type="button" id="cambio" value="Modificar Modulos" name="cambio" onclick="cambio('1')"/>
	    </div>
	</div>
	<div id="pnlModE" style="width: 100%; height: 550px; overflow: auto;"></div>
    </div>
    <div id="pnlGroup" style="width: 400px; height: 550; background: #fff; float: left;"></div>
    <div id="EpnlUsu" style="width: 400px; height: 580px; background: #fff; float: right; border-left: 1px solid #A0ABA0;">
	<div id="arriba" style="width: 100%; height: 30px;">
	    <div id="buskusG" style="width: 100%; text-align: center; height: 30px;">
	        Buscar: <input type="text" id="busknom" name="busknom" class="btn_chi" onkeyup="buscaUsuP();">
	    </div>
	    <div id="btnAU" style="width: 100%; text-align: center; height: 30px; display: none;">
		<input type="button" id="cambioU" value="Agregar Usuarios" name="cambioU" onclick="cambio('2')"/>
	    </div>
	</div>
	<div id="pnlUsu" style="width: 100%; height: 550px; overflow: auto;"></div>
    </div>
</div>