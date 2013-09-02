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
	$UoI="UPDATE";
	require("../../includes/config.inc.php");
	$inactivos="SELECT * FROM usuariosAcceso WHERE id_usuario='$id_usuario'";
	$DB_mysql=new DB_mysql($db,$servidor,$usuarioDb,$passDb);
	$DB_mysql->consulta($inactivos);
	$datosID=$DB_mysql->registroUnico();
	if($opcion==2){
	    ?><script>
		/*$("#encabezado").css("width","600px");
		/*$("#error").css({
		"margin-left":""+(posicion.left+dimext)+"px",
		"margin-top":""+posicion.top+"px",
		})*/
	        $("#btnsDatP"+<?=$opcion;?>).hide();	        
	    </script><?
	}
	?><script>
	    $("#btn_checarUsuario"+<?=$opcion;?>).hide();
	    $("#passwords"+<?=$opcion;?>).hide();
	    var lista= document.getElementById('na'+<?=$opcion;?>);
	    lista.options[(<?=$datosID[6]?>)+1].selected= true;
	</script><?
    }
    if($opcion==6){
	    ?>
	    <script>
		var sexos="<?=$datosID[9];?>";
		var op=0;
		var sexo= document.getElementById('sexo'+<?=$opcion;?>);
		if(sexos=="F"){op=1;}else{op=2;}
		sexo.options[op].selected= true;
	    </script>
	<?
    }
    if($opcion==5){
	$UoI="VUPDATE";
	require("../../includes/config.inc.php");
	$conmod="SELECT * FROM detalle_mod WHERE id_usuario='$id_usuario'";
	$DB_mysql=new DB_mysql($db,$servidor,$usuarioDb,$passDb);
	$DB_mysql->consulta($conmod);
	while($rower=mysql_fetch_row($DB_mysql->registrosConsulta())){
	    ?><script>
		$("#moduloact"+<?=$opcion;?>+"_"+<?=$rower[2];?>).attr("checked","checked");
		//$("#moduloact"+<?=$opcion;?>+"_"+<?=$rower[2];?>).attr("Onclick","return false");
		//$("#moduloact"+<?=$opcion;?>+"_"+<?=$rower[2];?>).attr("disabled","disabled");
	    </script><?   
	}
	?>
	<script>
	    $("#encabezado"+<?=$opcion;?>).hide();
	    $("#privilegiosUsu"+<?=$opcion;?>).show();
	    $("#modulos"+<?=$opcion;?>).css("height","250px");
	    $("#privilegiosUsu"+<?=$opcion;?>).css("border-top","0");
	    $("#btngp"+<?=$opcion;?>).hide();
	    $("#btnmod"+<?=$opcion;?>).show();
	    
	</script>
	<?
    }
   //echo"opcion= $opcion";
?>
<link rel="stylesheet" type="text/css" href="../../css/estilos.css" >
<script type="text/javascript" src="../../clases/jquery-1.3.2.min.js" ></script>
<script type="text/javascript"  src="js/funciones.js" ></script>
<script type="text/javascript"></script>
<div id="encabezado<?=$opcion;?>" style="height: 305px; width: 100%; float: left;">    
    <input type="hidden" name="ddv<?=$opcion;?>" id="ddv<?=$opcion;?>" value="<?=$UoI;?>" />
    <input type="hidden" name="id_usuarioU<?=$opcion;?>" id="id_usuarioU<?=$opcion;?>" value="<?=$id_usuario;?>"  />
    <div id="datosPrincipales<?=$opcion;?>" class="centerTable" style="margin-top: 10px;">
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
			    <input type="text" name="nomina<?=$opcion;?>" value="<?=$datosID[11];?>" class="btn_chi" id="nomina<?=$opcion;?>" onkeyup="this.value = this.value.replace (/[^0-9]/,'');" onblur="esconde('error');" onpaste="return false">
			<?}?>
		    </td>
	        </tr>
	        <tr>
		    <td>Nombre:</td>
		    <td>
			<?if($id_usuario && $opcion!=6){
			    echo"<pre style='display: inline;'>&#09;</pre>$datosID[3]";  
			}else{?>
			    <input type="text" name="nombre<?=$opcion;?>" class="btn_chi" value="<?=$datosID[3];?>" id="nombre<?=$opcion;?>" onchange="$('#usuario').attr('value','');" onblur="esconde('error');" onkeyup="this.value = this.value.replace (/[^aA-zZ ]/,'');" onpaste="return false">
			<?}?>
		    </td>
	        </tr>
	        <tr>
		    <td>Apellido Paterno:</td>
		    <td>
			<?if($id_usuario && $opcion!=6){
			    echo"<pre style='display: inline;'>&#09;</pre>$datosID[4]";  
			}else{?>
			    <input type="text" name="apa<?=$opcion;?>" class="btn_chi" value="<?=$datosID[4];?>" id="apa<?=$opcion;?>" onchange="$('#usuario').attr('value','');" onblur="esconde('error');" onkeyup="this.value = this.value.replace (/[^aA-zZ ]/,'');" onpaste="return false">
			<?}?>
		    </td>
		</tr>
		 <tr>
		    <td>Apellido Materno:</td>
		    <td>
			<?if($id_usuario && $datosID[5]!=null && $opcion!=6){
			    echo"<pre style='display: inline;'>&#09;</pre>$datosID[5]";  
			}else{?>
			    <input type="text" name="ama<?=$opcion;?>" class="btn_chi" value="<?=$datosID[5];?>" id="ama<?=$opcion;?>" onchange="$('#usuario').attr('value','');" onblur="esconde('error');" onkeyup="this.value = this.value.replace (/[^aA-zZ ]/,'');" onpaste="return false">
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
			    <select name="sexo<?=$opcion;?>" id="sexo<?=$opcion;?>" class="btn_chi" onblur="esconde('error');">
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
			    <input type="text" name="usuario<?=$opcion;?>" class="btn_chi" value="<?=$datosID[1];?>" id="usuario<?=$opcion;?>" readonly="" onfocus="crearusuario('0','<?=$opcion;?>');" onblur="esconde('error');">
			<?}?>
		    </td>
		    <?if(!$id_usuario){?>
			<td><div id="btn_checarUsuario<?=$opcion;?>"><input type="button" class="btn_chi" value="Checar" name="Checar<?=$opcion;?>" id="Checar<?=$opcion;?>" onblur="esconde('error')" onclick="checarUsuario('<?=$opcion;?>');"></div></td>  
		    <?}?>
		</tr>
		<tr>
		    <td>Departamento:</td>
		    <td>
			<?if($id_usuario && $opcion!=6){
			    echo"<pre style='display: inline;'>&#09;</pre>$datosID[21]";  
			}else{?>
			    <input type="tex" name="depto<?=$opcion;?>" class="btn_chi" value="<?=$datosID[21];?>" id="depto<?=$opcion;?>" onblur="esconde('error');">
			<?}?>
		    </td>
		</tr>
		<?
		 if($id_usuario && $opcion!=2){
		    ?>
		    <tr>
			<td colspan="2" align="center">
			    <div id="resetp<?=$opcion;?>">
				<input type="button" class="btn_chi" value="Resetear Password" name="reset<?=$opcion;?>" id="reset<?=$opcion;?>" onclick="reset('<?=$opcion;?>');">
			    </div>
			</td>
		    </tr>
		    <?
		 }
		?>
	      </table>
	   
	  
    </div>
    <div id="passwords<?=$opcion;?>" class="centerTable">
	<table class="datprin">
	    <tr>
	        <td>Password:</td>
	        <td><input type="password" name="pass<?=$opcion;?>" class="btn_chi" id="pass<?=$opcion;?>" onkeyup="nivel('<?=$opcion;?>');" onblur="esconde('error');" onselect="this.value=''" onpaste="return false"></td>
	    </tr>
	    <tr>
	        <td>Confirmar Password:</td>
	        <td><input type="password" name="confpass<?=$opcion;?>" class="btn_chi" id="confpass<?=$opcion;?>" onpaste="return false" onkeyup="confirmar('<?=$opcion;?>');" onblur="esconde('error');"></td>
		 <?if(!$id_usuario){?>
			<td></td>  
		    <?}?>
	    </tr>
	</table>
    </div>
    <div id="btnsDatP<?=$opcion;?>">
	<div style="height: 30px; width: 150px; float: left; margin-left: 30px; margin-top: 8px;">
	    <div style="float: left;">
		<input type="checkbox" id="activacion<?=$opcion;?>" name="activacion<?=$opcion;?>" checked="checked" onchange="actdes('<?=$opcion;?>');">
	    </div>
	    <div id="activo<?=$opcion;?>" style="display: none; margin-left: 10px; margin-top: 2px;">
		Usuario Inactivo
	    </div>
	    <div id="inactivo<?=$opcion;?>" style="margin-left: 10px; margin-top: 2px;">
		Usuario Activo
	    </div>
	</div>
	<div id="btn<?=$opcion;?>" style="height: 30px; text-align: center; margin-top: 8px;">
	    <input type="button" value="Guardar" name="activar<?=$opcion;?>" id="activar<?=$opcion;?>" onclick="nuevoUsuario('<?=$UoI?>','<?=$opcion;?>');">
	</div>
    </div>
    <div id="luego<?=$opcion;?>" style="display: none; letter-spacing: 2px; word-spacing: 3px; margin-top: 20px; width: 100%; font-size: 12px; font-family: sans-serif; text-align: center; color: #272A81;">
	Ahora ya puede Configurar sus Privilegios!!!
	<div style="clear: both;"></div>
	<div style="font-size: 9px; font-family: sans-serif; text-align: center; color: #272A81;">Si desea hacerlo mas tarde tendra que dirigirse a "Perfil del usuario"</div>
    </div>
</div>
<div style="clear: both;"></div>
<div id="privilegiosUsu<?=$opcion;?>" style="display: none; width: 100%; border-top: double;">
    <div id="titilo<?=$opcion;?>" style="font-size: 14px; font-family: 'Palatino', 'Times New Roman', sans-serif; margin-top: 5px; text-align: center; width: 100%;">
	Configuraci&oacute;n
    </div>
    <div id="sesion<?=$opcion;?>" class="centerTable" style="width: 100%; height: 30px;">
	<table style="font-size: 11px;">
	    <tr>
		<td style="width: 20%; text-align: right;">
		    Nivel de Acceso:
		</td>
		<td style="width: 20%; text-align: left;">
		    <select name="na<?=$opcion;?>" <?if($opcion==5){echo"disabled=''";}?> class="btn_chi" id="na<?=$opcion;?>">
		        <option value="">Seleccionar</option>
		        <option value="0">0</option>
		        <option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
		    </select>
		</td>
		<td style="width: 60%; text-align: right;">
		    Cambio de Contraseña en el Proximo Inicio de Sesion:
		</td>
		<td style="width: 10%; text-align: left;">
		    <input type="checkbox" id="cpis<?=$opcion;?>" <?if($opcion==5){echo"disabled=''";}?> name="cpis<?=$opcion;?>" checked="checked">
		</td>
	    </tr>
	</table>
    </div>
    <div style="clear: both;"></div>
    <div id="modulos<?=$opcion;?>" style="margin-top: 0px; height: 210px;">
	<div style="width: 100%; height: 30px;">
	    <div style="width: 60%; float: left;">
		<div style="float: left; margin-left: 10px; border-bottom: groove; margin-top: 7px;">
		    Modulos a los que tiene acceso:
		</div>
		<div style="float: right; border-bottom: groove;">
		    Seleccionar todos <input name="tdos<?=$opcion;?>" type="checkbox" <?if($opcion==5){echo"disabled=''";}?> name="tdos<?=$opcion;?>" id="tdos<?=$opcion;?>" value="1" onclick="todo('ck2','<?=$opcion;?>');"/>
		</div>
	    </div>
	</div>
	<div style="width: 99%; height: 140px; margin-left: 5px; margin-top: 5px; overflow: auto;">
	    <?
	    require("../../includes/config.inc.php");
	    $conmod="SELECT id_modulo, nombre FROM modulos;";
	    $DB_mysql=new DB_mysql($db,$servidor,$usuarioDb,$passDb);
	    $DB_mysql->consulta($conmod);$cont=1;
	    while($row=mysql_fetch_row($DB_mysql->registrosConsulta())){
		?>
		<div style="width: 185px; height: 22px; padding-top: 3px; margin: 5px; float: left; border: 1px solid #F0F0F0;">
		    <div style="width: 29px; float: left;"><input type="checkbox" id="moduloact<?=$opcion;?>_<?=$row[0];?>" <?if($opcion==5){echo"disabled=''";}?> value="<?=$row[0];?>" name="moduloact<?=$opcion;?>_<?=$row[0];?>" class="ck2"></div>
		    <div onclick="checarmod('<?=$row[0];?>');" style="width: 155px; height: 100%; float: right; margin-top: 3px;"><?=$row[1];?></div>
		</div>
		<?
		$cont++;
	    }
	    ?>
	</div>
    </div>
    <div id="btngp<?=$opcion;?>" style="height: auto; bottom: 0%; text-align: center; width: 100%; text-align: center;">
	<input type="button" value="Guardar Privilegios" name="privilegios<?=$opcion;?>" id="privilegios<?=$opcion;?>" onclick="privilegios('<?=$cont;?>','<?=$opcion;?>');">
    </div>
    <div id="btnmod<?=$opcion;?>" style="display: none; height: auto; bottom: 0%; text-align: center; width: 100%; text-align: center;">
	<input type="button" value="Modificar" name="mod<?=$opcion;?>" id="mod<?=$opcion;?>" onclick="mod('<?=$cont;?>','<?=$opcion;?>');">
    </div>
</div>