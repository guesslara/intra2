<?php
    //printf($_POST['lugar']);
    session_start();	
    /*echo "<pre>";
    print_r($_SESSION);
    echo "</pre>";*/
    if($_SESSION[$txtApp['session']['nivelUsuario']]!=0){
    	echo "<script type='text/javascript'> alert('Ha intentado entrar a una zona protegida, sus datos seran ENVIADOS'); </script>";
    }
    $opcion=$_POST["opcion"];
?>
<link rel="stylesheet" type="text/css" href="../../css/estilos.css" >
<script type="text/javascript" src="../../clases/jquery-1.3.2.min.js" ></script>
<script type="text/javascript"  src="js/funciones.js" ></script>
<script type="text/javascript"></script>
<div id="encabezado" style="height: 100px; width: 810; float: left;">
    <div id="ubik" style="width: 300px; height: 30px; float: left; margin: 40px 10px 0px 100px; padding: 5px;">
	<titulo class="titulo"><?=$opcion;?></titulo>
    </div>
    <div style="clear: both;"></div>
    <div id="ubik2" style="width: 300px; height: 30px; float: left; margin: 0px 5px 0px 140px; padding: 1px; font-size: large;">
	<place class="location"><?=utf8_decode($lugar[1]);?></place>
    </div>
 
</div>
<div id="foto" style="height: 300px; width: 250px; float: right; background: #FFF;">
    $("#foto").css("height",(altoDoc*30)/100);
    $("#foto").css("width",(anchoDoc*20)/100);
    background: #B6DCB5;
</div>
<div id="instrucciones" style="height: 150px; width: 810px; float: left; ">
    <div id"comizq" style="width: 150px; height: 150px; float: left; background-image: url('../../css/comizq.png'); background-repeat: no-repeat; background-position: 0px 0px;"></div>
    <div id"comder" style="width: 150px; height: 150px; float: right; background-image: url('../../css/comder.png'); background-repeat: no-repeat; background-position: 0px 0px;"></div>
    Este es el ejemplo habra que darle estilo
</div>
<div style="clear: both;"></div>
<div id="panel" style="height: 600px; width: 810px; background: #A0ABA0;"></div>