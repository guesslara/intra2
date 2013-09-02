<?php
    //printf($_POST['lugar']);
    session_start();	
    /*echo "<pre>";
    print_r($_SESSION);
    echo "</pre>";*/
    if($_SESSION[$txtApp['session']['nivelUsuario']]!=0){
    	echo "<script type='text/javascript'> alert('Ha intentado entrar a una zona protegida, sus datos seran ENVIADOS'); </script>";
    }
    $UoI="INSERT";
    $opcion=$_POST["opcion"];
    $id_usuario=$_POST["id_usuario"];
    require_once("../../clases/clase_mysql.php");
    if($id_usuario){
	//echo" entro aki";
	//print_r($_POST);
	$UoI="UPDATE";
	require("../../includes/config.inc.php");
	$inactivos="SELECT * FROM usuariosAcceso WHERE id_usuario='$id_usuario'";
	$DB_mysql=new DB_mysql($db,$servidor,$usuarioDb,$passDb);
	$DB_mysql->consulta($inactivos);
	$datosID=$DB_mysql->registroUnico();
	if($opcion==2){
	    ?><script>
		$("#encabezado").css("width","600px");
		/*$("#error").css({
		"margin-left":""+(posicion.left+dimext)+"px",
		"margin-top":""+posicion.top+"px",
		})*/
	        $("#btnsDatP").hide();	        
	    </script><?
	}
	?><script>
	    $("#btn_checarUsuario").hide();
	    $("#passwords").hide();
	    var lista= document.getElementById('na');
	    lista.options[(<?=$datosID[6]?>)+1].selected= true;
	</script><?
    }
    if($opcion==6){
	echo"entro al if de op6";
	    ?>
	    <script>
		$("#activar").attr("onblur","esconde()");
		/*$("#activar").removeAttr("onclick");
		$("#activar").attr("onclick","validamodifi()");*/
		var sexos="<?=$datosID[9];?>";
		var op=0;
		var sexo= document.getElementById('sexo');
		if(sexos=="F"){op=1;}else{op=2;}
		sexo.options[op].selected= true;
	    </script>
	<?
    }
   //echo"opcion= $opcion";
?>
<link rel="stylesheet" type="text/css" href="../../css/estilos.css" >
<script type="text/javascript" src="../../clases/jquery-1.3.2.min.js" ></script>
<script type="text/javascript"  src="js/funciones.js" ></script>
<script type="text/javascript"></script>
<div id="error" class="error" style="margin-left: 0; margin-top: 0;"></div>
<div id="encabezado" style="height: 305px; width: 100%; float: left;">
    
    <?echo"opcion= $opcion, id= $id_usuario";?>
   
    <input type="hidden" name="ddv" id="ddv" value="<?=$UoI;?>" />
    <input type="hidden" name="id_usuarioU" id="id_usuarioU" value="<?=$id_usuario;?>" />
    <div id="datosPrincipales" class="centerTable" style="margin-top: 10px;">
	    <table class="datprin">
		<?
		if($opcion==1){
		?>
	        <caption style="font-size: 14px; font-family: 'Palatino', 'Times New Roman', sans-serif;">Datos Principales</caption>
		<?
		}
		?>
	        <tr>
	            <td>No. Nomina:</td>
	            <td>
			<?if($id_usuario && $datosID[11]!=0 && $opcion!=6){
			    echo"<pre style='display: inline;'>&#09;</pre>$datosID[11]";  
			}else{
			    if($datosID[11]==0){
				$datosID[11]="";
			    }
			?>
			    <input type="text" name="nomina" value="<?=$datosID[11];?>" class="btn_chi" id="nomina" onkeyup="this.value = this.value.replace (/[^0-9]/,'');" onblur="esconde('error');" onpaste="return false">
			<?}?>
		    </td>
	        </tr>
	        <tr>
		    <td>Nombre:</td>
		    <td>
			<?if($id_usuario && $opcion!=6){
			    echo"<pre style='display: inline;'>&#09;</pre>$datosID[3]";  
			}else{?>
			    <input type="text" name="nombre" class="btn_chi" value="<?=$datosID[3];?>" id="nombre" onchange="$('#usuario').attr('value','');" onblur="esconde('error');" onkeyup="this.value = this.value.replace (/[^aA-zZ ]/,'');" onpaste="return false">
			<?}?>
		    </td>
	        </tr>
	        <tr>
		    <td>Apellido Paterno:</td>
		    <td>
			<?if($id_usuario && $opcion!=6){
			    echo"<pre style='display: inline;'>&#09;</pre>$datosID[4]";  
			}else{?>
			    <input type="text" name="apa" class="btn_chi" value="<?=$datosID[4];?>" id="apa" onchange="$('#usuario').attr('value','');" onblur="esconde('error');" onkeyup="this.value = this.value.replace (/[^aA-zZ ]/,'');" onpaste="return false">
			<?}?>
		    </td>
		</tr>
		 <tr>
		    <td>Apellido Materno:</td>
		    <td>
			<?if($id_usuario && $datosID[5]!=null && $opcion!=6){
			    echo"<pre style='display: inline;'>&#09;</pre>$datosID[5]";  
			}else{?>
			    <input type="text" name="ama" class="btn_chi" value="<?=$datosID[5];?>" id="ama" onchange="$('#usuario').attr('value','');" onblur="esconde('error');" onkeyup="this.value = this.value.replace (/[^aA-zZ ]/,'');" onpaste="return false">
			<?}?>
		    </td>
		</tr>
		<tr>
		    <td>Sexo:</td>
		    <td>
			<?if($id_usuario && $datosID[9]!=null && $opcion!=6){
			    if($datosID[9]=="M"){
				echo"<pre style='display: inline;'>&#09;</pre>Masculino";
			    }else{
				echo"<pre style='display: inline;'>&#09;</pre>Femenino";
			    }
			}else{?>
			    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			    <select name="sexo" id="sexo" class="btn_chi" onblur="esconde('error');">
				<option value="">Seleccionar</option>
				<option value="F">Femenino</option>
				<option value="M">Masculino</option>
			    </select>
			<?}?>
		    </td>
		</tr>
	    
		<tr>
		    <td>Usuario:</td>
		    <td>
			<?if($id_usuario && $opcion!=6){
			    echo"<pre style='display: inline;'>&#09;</pre>$datosID[1]";  
			}else{?>
			    <input type="text" name="usuario" class="btn_chi" value="<?=$datosID[1];?>" id="usuario" readonly="" onfocus="crearusuario();" onblur="esconde('error');">
			<?}?>
		    </td>
		    <?if(!$id_usuario){?>
			<td><div id="btn_checarUsuario"><input type="button" class="btn_chi" value="Checar" name="Checar" id="Checar" onblur="esconde('error')" onclick="checarUsuario();"></div></td>  
		    <?}?>
		</tr>
		<tr>
		    <td>Departamento:</td>
		    <td>
			<?if($id_usuario && $opcion!=6){
			    echo"<pre style='display: inline;'>&#09;</pre>$datosID[21]";  
			}else{?>
			    <input type="tex" name="depto" class="btn_chi" value="<?=$datosID[21];?>" id="depto" onblur="esconde('error');">
			<?}?>
		    </td>
		</tr>
		<?
		 if($id_usuario && $opcion!=2){
		    ?>
		    <tr>
			<td colspan="2" align="center"><div id="resetp"><input type="button" class="btn_chi" value="Resetear Password" name="reset" id="reset" onclick="reset();"></div></td>
		    </tr>
		    <?
		 }
		?>
	      </table>
	   
	  
    </div>
    <div id="passwords" class="centerTable">
	<table class="datprin">
	    <tr>
	        <td>Password:</td>
	        <td><input type="password" name="pass" class="btn_chi" id="pass" onkeyup="nivel();" onblur="esconde('error');" onselect="this.value=''" onpaste="return false"></td>
	    </tr>
	    <tr>
	        <td>Confirmar Password:</td>
	        <td><input type="password" name="confpass" class="btn_chi" id="confpass" onpaste="return false" onkeyup="confirmar();" onblur="esconde('error');"></td>
		 <?if(!$id_usuario){?>
			<td></td>  
		    <?}?>
	    </tr>
	</table>
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
	    <input type="button" value="Guardar" name="activar" id="activar" onclick="nuevoUsuario('<?=$UoI?>');">
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