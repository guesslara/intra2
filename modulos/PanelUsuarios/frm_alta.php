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
    require_once("../../clases/clase_mysql.php");
?>
<link rel="stylesheet" type="text/css" href="../../css/estilos.css" >
<script type="text/javascript" src="../../clases/jquery-1.3.2.min.js" ></script>
<script type="text/javascript"  src="js/funciones.js" ></script>
<script type="text/javascript"></script>
<div id="error" class="error" style="margin-left: 0; margin-top: 0;"></div>
<div id="encabezado" style="height: 305px; width: 810; float: left;">
    <div id="datosPrincipales" style="margin-left: 100px; margin-top: 10px;">
	    <table class="datprin">
	        <caption style="font-size: 14px; font-family: 'Palatino', 'Times New Roman', sans-serif;">Datos Principales</caption>
	        <tr>
	            <td>No. Nomina:</td>
	            <td><input type="text" name="nomina" id="nomina" onkeyup="this.value = this.value.replace (/[^0-9]/,'');" onblur="esconde('error');" onpaste="return false"></td>
	        </tr>
	        <tr>
		    <td>Nombre:</td>
		    <td><input type="text" name="nombre" id="nombre" onchange="$('#usuario').attr('value','');" onblur="esconde('error');" onkeyup="this.value = this.value.replace (/[^aA-zZ ]/,'');" onpaste="return false"></td>
	        </tr>
	        <tr>
		    <td>Apellido Paterno:</td>
		    <td><input type="text" name="apa" id="apa" onchange="$('#usuario').attr('value','');" onblur="esconde('error');" onkeyup="this.value = this.value.replace (/[^aA-zZ ]/,'');" onpaste="return false"></td>
		</tr>
		<tr>
		    <td>Sexo:</td>
		    <td>
		        <select name="sexo" id="sexo" onblur="esconde('error');">
			    <option value="">Seleccionar</option>
			    <option value="F">Femenino</option>
			    <option value="M">Masculino</option>
		        </select>
		    </td>
		</tr>
	    
		<tr>
		    <td>Usuario:</td>
		    <td><input type="text" name="usuario" id="usuario" readonly="" onfocus="crearusuario();" onblur="esconde('error');"></td>
		    <td><div id="btn_checarUsuario"><input type="button" value="Checar" name="Checar" id="Checar" onblur="esconde('error')" onclick="checarUsuario();"></div></td>
		</tr>
		<tr>
		    <td>Departamento:</td>
		    <td><input type="tex" name="depto" id="depto" onblur="esconde('error');"></td>
		</tr>
	      </table>
	    <div id="passwords">
		<table class="datprin">
		<tr>
		    <td>Password:</td>
		    <td><input type="password" name="pass" id="pass" onkeyup="nivel();" onblur="esconde('error');" onselect="this.value=''" onpaste="return false"></td>
		</tr>
		<tr>
		    <td>Confirmar Password:</td>
		    <td><input type="password" name="confpass" id="confpass" onpaste="return false" onkeyup="confirmar();" onblur="esconde('error');"></td>
		</tr>
		</table>
	    </div>
	  
    </div>
    <div id="btnsDatP">
	<div style="height: 30px; width: 150px; float: left; margin-left: 30px; margin-top: 8px;">
	    <div style="float: left;">
		<input type="checkbox" id="activacion" name="activacion" checked="checked" onchange="actdes();">
	    </div>
	    <div id="activo" style="display: none; margin-left: 10px; margin-top: 2px;">
		Usuario Inactivo
	    </div>
	    <div id="inactivo" style="margin-left: 10px; margin-top: 2px;">
		Usuario Activo
	    </div>
	</div>
	<div id="btn" style="height: 30px; text-align: center; margin-top: 8px;">
	    <input type="button" value="Guardar" name="activar" id="activar" onclick="nuevoUsuario();">
	</div>
    </div>
    <div id="luego" style="display: none; letter-spacing: 2px; word-spacing: 3px; margin-top: 20px; width: 100%; font-size: 12px; font-family: sans-serif; text-align: center; color: #272A81;">
	Ahora ya puede Configurar sus Privilegios!!!
	<div style="clear: both;"></div>
	<div style="font-size: 9px; font-family: sans-serif; text-align: center; color: #272A81;">Si desea hacerlo mas tarde tendra que dirigirse a "Perfil del usuario"</div>
    </div>
</div>
<div style="clear: both;"></div>
<div id="privilegiosUsu" style="display: none; position: absolute;height: auto; width: 100%; background: #FFF; border-top: double;">
    <div id="titilo" style="font-size: 14px; font-family: 'Palatino', 'Times New Roman', sans-serif; margin-top: 10px; text-align: center; width: 100%;">
	Configuraci&oacute;n
    </div>
    <div id="sesion" style="margin-top: 10px; width: 100%;">
	<div id="activo" style="float: left; margin-left: 10px; margin-top: 2px; width: 770px; text-align: right;">
	    <div style="float: right; margin-top: 4px;">Pedir Cambio de Contraseña en el Proximo Inicio de Sesion:</div>
	    <div id="nivel" style="margin-top: 0px; float: left;">
		Nivel de Acceso:
	            <select name="na" id="na">
		        <option value="">Seleccionar</option>
		        <option value="0">0</option>
		        <option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
		    </select>
	    </div>    
	</div>
	<div style="float: right; width: 40px; text-align: left;">
	    <input type="checkbox" id="cpis" name="cpis" checked="checked">
	</div>
    </div>
    <div style="clear: both;"></div>
    <div id="modulos" style="margin-top: 15px; width: auto; height: auto;">
	<div style="float: left; margin-left: 10px; border-bottom: groove; margin-top: 3px;">Modulos a los que tiene acceso:</div>
	<div style="float: right; margin-right: 400px; border-bottom: groove;">
	    Seleccionar todos <input name="Todos" type="checkbox" name="tdos" id="tdos" value="1" onclick="todo('ck2');"/>
	</div>
	<div style="clear: both;"></div>
	<div style="width: 810px; height: 140px; margin: 10px; background: #FFF; overflow: auto;">
	    <?
	    require("../../includes/config.inc.php");
	    $conmod="SELECT id_modulo, nombre FROM modulos;";
	    $DB_mysql=new DB_mysql($db,$servidor,$usuarioDb,$passDb);
	    $DB_mysql->consulta($conmod);$cont=1;
	    while($row=mysql_fetch_row($DB_mysql->registrosConsulta())){
		?>
		<div style="width: 185px; height: 22px; padding-top: 3px; margin: 5px; float: left; border: 1px solid #F0F0F0;">
		    <div style="width: 29px; float: left;"><input type="checkbox" id="moduloact_<?=$row[0];?>" value="<?=$row[0];?>" name="moduloact_<?=$row[0];?>" class="ck2"></div>
		    <div onclick="checarmod('<?=$row[0];?>');" style="width: 155px; height: 100%; float: right; margin-top: 3px;"><?=$row[1];?></div>
		</div>
		<?
		$cont++;
	    }
	    ?>
	</div>
    </div>
    <div id="btn" style="height: auto; bottom: 0%; text-align: center; width: 100%; text-align: center;">
	<input type="button" value="Guardar Cambios" name="privilegios" id="privilegios" onclick="privilegios('<?=$cont;?>');">
    </div>
</div>