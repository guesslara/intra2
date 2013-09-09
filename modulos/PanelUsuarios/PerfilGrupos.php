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
    ajaxApp("pnlGroup","mod.php","pagAct=1&intervalo=0&totalpag=0","POST");
   $(document).ready(function() {
		$( "#accordion" ).accordion({
			"fillSpace": true,
			"active": 1
		});
	});
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
<div id="panel" style="height: 580px; width: 990px; background: #A0ABA0;">
    <div id="pnlMod" style="width: 190px; height: 100%; background: #f0f0f0; float: left;"></div>
    <div id="pnlGroup" style="width: 400px; height: 550; background: #fff; float: left;">
	
    </div>
    <div id="pnlUsu" style="width: 400px; height: 100%; background: #f0f0f0; float: right;"></div>
</div>