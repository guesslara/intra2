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
<script type="text/javascript"></script>
<div id="encabezado" style="height: 125px; width: 1002px; float: left; background-image: url('../../img/flecha.png'); background-repeat: no-repeat; background-position: 20px 30px;">
    <div id="ubik" style="width: 300px; height: 30px; float: left; margin: 40px 10px 0px 100px; padding: 5px;">
	<titulo class="titulo"><?=$lugar[0];?> (s)</titulo>
    </div>
    <div style="clear: both;"></div>
    <div id="ubik2" style="width: 300px; height: 30px; float: left; margin: 0px 5px 0px 140px; padding: 1px; font-size: large;">
	<place class="location"><?=utf8_decode($lugar[1]);?></place>
    </div>
</div>
<div style="clear: both;"></div>
<div id="panelote" style="height: 790px; width: 1002px;">
    <div id="arriba" style="width: 100%; height: 50px;">
	<div style="float: left; width: 300px; text-align: left; margin: 10px;">
	    Buscar: <input type="text" id="txtbusk" name="txtbusk" onkeyup="buscaUsu();">
	</div>
	<div style="float: left; margin-top: 10px; text-align: left;">
	    <input type="radio" value="apaterno" name="filtro" id="nombre" checked="checked">Por Apellido
	    <input type="radio" value="usuario" name="filtro" id="usuario">Por Usuario
	    <input type="radio" value="nomina" name="filtro" id="nomina">Por # Nomina
	</div>
    </div>
    <div id="centro" style="width: 100%; height: 696px;">
	<div id="usuario" style="width: 100%; height: 40px; background: #E7EAEA;">
	    <div class="divusu up" style="width: 160px;">Usuario</div>
	    <div class="divusu up" style="width: 69px;">Nomina</div>
	    <div class="divusu up">Nombre</div>
	    <div class="divusu up">Apellido P.</div>
	    <div class="divusu up">Apellido M.</div>
	    <div class="divusu up">Departamento</div>
	    <div class="divusu up">Nivel de Acceso</div>
	</div>
	<div id="medio" style="width: 100%; height: 656px; margin: 0px; background: #F0F0F0; overflow: auto;">
	</div>
    </div>
    <div id="abajo" style="width: 100%; height: 40px; bottom: 0%;">
	<div id="usuario" style="width: 100%; height: 40px; background: #E7EAEA;">
	    <div class="divusu up" style="width: 160px;">Usuario</div>
	    <div class="divusu up" style="width: 69px;">Nomina</div>
	    <div class="divusu up">Nombre</div>
	    <div class="divusu up">Apellido P.</div>
	    <div class="divusu up">Apellido M.</div>
	    <div class="divusu up">Departamento</div>
	    <div class="divusu up">Nivel de Acceso</div>
	</div>
    </div>
</div>