<?
//require_once("../../includes/config.inc.php");
require_once("../../clases/clase_mysql.php");
class modeloUsuarios{
	function nuevoG($nombreG,$modulos,$descripcion){
		$modulos=substr($modulos, 0, -1); 
		require("../../includes/config.inc.php");
		$newgrup="INSERT INTO grupos (nombre, id_modulos, descripcion) VALUES ('$nombreG','$modulos','$descripcion');";
		$DB_mysql=new DB_mysql($db,$servidor,$usuarioDb,$passDb);
		$DB_mysql->consulta($newgrup);
		$ke=$DB_mysql->regsAfectados();
		if($ke==1){
			echo"El Gurupo a sido Guardado";
		}else{
			echo"El Gurupo No se Pudo Guardar";
		}
		?><script>
			ajaxApp("todo","grpoNuevo.php","","POST");
		</script><?
	}
	function buskUsu($op,$filtro){
		require("../../includes/config.inc.php");
		$consulta="SELECT * FROM usuariosAcceso WHERE ".$filtro." LIKE '".$op."%' AND activo='0'";
		$DB_mysql=new DB_mysql($db,$servidor,$usuarioDb,$passDb);
		$DB_mysql->consulta($consulta);$cont=0;
		while($row=mysql_fetch_row($DB_mysql->registrosConsulta())){
			?>
			<div id="usuario" onmouseover="muestra('edilete_<?=$cont?>');" onmouseout="esconde('edilete_<?=$cont?>');" style="width: 99.5%; height: 80px; background: #F1F4F5; border: 1px solid #F6F9FA;">
				<div class="divusu" style="margin-top: 0px;">
					<div style="float: left; width: 100%; height: 75%;">
						<div style="float: left; margin-left: 0px; width: 59px; height: 100%;">
							<?if($row[9]=="M"){?>
								<img src="../../img/user.jpg" width=60 height=60>
							<?}else{?>
								<img src="../../img/usera.jpg" width=60 height=60>
							<?}?>
						</div>
						<div style="float: left; width: 89px; height: 100%;">
							<div style="width: 100%; height: 50%;"></div>
							<div style="width: 100%; height: 50%;"><?if($row[1]){echo"$row[1]";}else{echo"-";}?></div>
						</div>
					</div>
					<div id="edilete_<?=$cont?>" style="float: left; color: #FF0000;width: 100%; height: 25%; display: none;">
						<a href="#" onclick="edita('<?=$row[0]?>');">EDITAR</a> | <a href="#" onclick="borra('<?=$row[0]?>');">BORRAR</a>
					</div>
				</div>
				<div class="divusu" style="width: 69px;"><?if($row[11]){echo"$row[11]";}else{echo"-";}?></div>
				<div class="divusu"><?if($row[3]){echo"$row[3]";}else{echo"-";}?></div>
				<div class="divusu"><?if($row[4]){echo"$row[4]";}else{echo"-";}?></div>
				<div class="divusu"><?if($row[5]){echo"$row[5]";}else{echo"-";}?></div>
				<div class="divusu"><?if($row[21]){echo"$row[21]";}else{echo"-";}?></div>
				<div class="divusu"><?if($row[6] || $row[6]==0){echo"$row[6]";}else{echo"-";}?></div>
			</div>
			<?
			$cont++;
		}
	}
	function nombremini($id_usuario){
		require("../../includes/config.inc.php");
		$inactivos="SELECT * FROM usuariosAcceso WHERE id_usuario='$id_usuario'";
		$DB_mysql=new DB_mysql($db,$servidor,$usuarioDb,$passDb);
		$DB_mysql->consulta($inactivos);
		while($row=mysql_fetch_row($DB_mysql->registrosConsulta())){
			echo"$row[4]";
		}
	}
	function UsuIna(){
		echo"<table class='tablita2'>";
		require("../../includes/config.inc.php");
		$inactivos="SELECT * FROM usuariosAcceso WHERE activo=1";
		$DB_mysql=new DB_mysql($db,$servidor,$usuarioDb,$passDb);
		$DB_mysql->consulta($inactivos);$cont=0;
		while($row=mysql_fetch_row($DB_mysql->registrosConsulta())){
			$cont++;
			?>
			<tr onclick="pesta('1','<?=$row[0];?>')" style="font-size: 11px;">
				<td style="width: 120px"><?=$row[3];?></td>
				<td style="width: 120px"><?=$row[4];?></td>
				<td style="width: 120px"><?=$row[1];?></td>
				<td style="width: 170px"><?=$row[21];?></td>
				<td style="width: 70px"><?=$row[6];?></td>
			</tr>
			<?
		}
		if($cont==0){
			?>
			<tr>
				<td colspan="5">
					<p class="ins" style="text-align: center;">No hay Usuarios Inactivos!!!</p>
				</td>
			</tr>
			<?
		}
		echo"</table>";
	}
	public function Updtprivilegios($id_usuario,$na,$cpis,$modulos,$ddv){
		require("../../includes/config.inc.php");
		if($ddv=="VUPDATE"){
			$borra="DELETE FROM detalle_mod WHERE detalle_mod.id_usuario='".$id_usuario."'";
			$DB_mysql=new DB_mysql($db,$servidor,$usuarioDb,$passDb);
			$DB_mysql->consulta($borra);
		}
		$llave=true;
		$id_modulo=explode(",",$modulos);
		$updt="UPDATE usuariosAcceso SET nivel_acceso='".$na."', cambiarPass='".$cpis."' WHERE id_usuario='".$id_usuario."'"; 
		$DB_mysql->consulta($updt);
		$regafec=$DB_mysql->regsAfectados();
		if($regafec!=1){$llave=false;}
		for($i=0; $i<(count($id_modulo)-1);$i++){
			$inser="INSERT INTO detalle_mod (id_usuario, id_modulo) VALUES ('$id_usuario','$id_modulo[$i]')";
			$DB_mysql->consulta($inser);
			$regafecmod=$DB_mysql->regsAfectados();	
			if($regafecmod!=1){$llave=false;}
		}
		if($llave){
			echo"Todo a Salido como Esperabamos los Privilegios han sido Configurados";
		}else{
			echo"Error al Ingresar Datos";
		}
		if($ddv=="UPDATE"){
			?><script>
				pesta('3','0');
			</script><?
		}elseif($ddv=="VUPDATE"){
			?><script>
				pesta('7','0');
			</script><?
		}else{
			?><script>
				ajaxApp("detalle_1","frm_alta.php","opcion=1","POST");
			</script><?
		}
	}
	public function UsuarioNuevo($nomina,$nombre,$apa,$ama,$sexo,$usuario,$depto,$pass,$activo,$uoi,$id_usuario,$numext){
		require("../../includes/config.inc.php");
		if($uoi=="INSERT"){
			$insert="INSERT INTO usuariosAcceso (nomina, nombre, apaterno, amaterno, sexo, usuario, departamento, pass, activo) VALUES ('$nomina','$nombre','$apa','$ama','$sexo','$usuario','$depto','$pass','$activo');";
		}else{
			if($numext==6){
				if($pass=="" || $pass==null){
					$insert="UPDATE usuariosAcceso SET nomina='".$nomina."', nombre='".$nombre."', apaterno='".$apa."', amaterno='".$ama."', sexo='".$sexo."', departamento='".$depto."', activo='".$activo."' WHERE id_usuario='".$id_usuario."'";
				}else{
					$insert="UPDATE usuariosAcceso SET nomina='".$nomina."', nombre='".$nombre."', apaterno='".$apa."', amaterno='".$ama."', sexo='".$sexo."', departamento='".$depto."', activo='".$activo."', pass='".$pass."' WHERE id_usuario='".$id_usuario."'";
				}
			}else{
				if($pass=="" || $pass==null){
					$insert="UPDATE usuariosAcceso SET nomina='".$nomina."', amaterno='".$ama."', sexo='".$sexo."', activo='".$activo."' WHERE id_usuario='".$id_usuario."'";
				}else{
					$insert="UPDATE usuariosAcceso SET nomina='".$nomina."', amaterno='".$ama."', sexo='".$sexo."', activo='".$activo."', pass='".$pass."' WHERE id_usuario='".$id_usuario."'";	
				}
			}			
		}
		$DB_mysql=new DB_mysql($db,$servidor,$usuarioDb,$passDb);
		$DB_mysql->consulta($insert);
		$ke=$DB_mysql->regsAfectados();
		if($ke==1){
			if($numext==6){
				echo"El Usuario a sido Actualizado";
				?><script>
					pesta('7','<?=$id_usuario;?>');
				</script><?
			}else{
				if($uoi=="INSERT"){
					$ultimo="SELECT MAX(id_usuario) FROM usuariosAcceso";
					$DB_mysql->consulta($ultimo);
					$ultimoid=$DB_mysql->registroUnico();
					echo"Se ha insertado un Nuevo Usuario";
					$id_usuario=$ultimoid[0];
				}else{
					echo"El Usuario a sido Actualizado";
				}
				echo"<input type='hidden' name='id_usuario' id='id_usuario' value='$id_usuario' />";
				?><script>
					$("#privilegiosUsu"+<?=$numext;?>).show();
					$("#btnsDatP"+<?=$numext;?>).hide();
					$("#resetp"+<?=$numext;?>).hide();
					$("#luego"+<?=$numext;?>).show();
				</script><?
			}
		}else{
			if($numext==6){
				echo"No Hay datos que Actualizar";
				?><script>
					pesta('7','<?=$id_usuario;?>');
				</script><?
			}else{
				if($uoi=="INSERT"){
					echo"Error al Activar Usuario";
				}else{
					echo"Error al Actualizarlos Datos";
				}
				?><script>
					ajaxApp("detalle_1","frm_alta.php","opcion=1","POST");
				</script><?
			}
		}
	}
	public function verificarUsuario($usuario,$numext){
		$consul="SELECT * FROM usuariosAcceso Where usuario='$usuario'";
		require("../../includes/config.inc.php");
		$DB_mysql=new DB_mysql($db,$servidor,$usuarioDb,$passDb);
		$DB_mysql->consulta($consul);
		$num=$DB_mysql->numregistros();
		if($num==0){
			?><script>
			ubica("Checar"+<?=$numext;?>,"El usuario Puede ser Registrado!!!");
			$("#usuario"+<?=$numext;?>).attr("readonly","readonly");
			$("#usuario"+<?=$numext;?>).removeAttr("onfocus");
			usuval=true;
			</script><?
		}else{
			?><script>
			ubica("Checar"+<?=$numext;?>,"Este Usuario Ya Esta Registrado!!!");
			$("#error").css("background","#FF0000");
			$("#usuario"+<?=$numext;?>).removeAttr("readonly");
			usuval=false;
			</script><?
		}
		
	}
	public function insertar($datos){
		$linea=explode(",",$datos);
		require("../../includes/config.inc.php");
		$num=count($linea);$cont=0;
		//echo"*** $num *** <br />";
		for($j=0;$j<(count($linea)-1);$j++){
			$datoxd=explode("_",$linea[$j]);
			$nomape=explode(" ",$datoxd[0]);
			$pass=$this->pass($datoxd[1]);
			$newusu="INSERT INTO usuariosAcceso (nombre, apaterno,  usuario, departamento, pass) VALUES ('$nomape[0]','$nomape[1]','$datoxd[1]','$datoxd[2]','$pass');";
			$DB_mysql=new DB_mysql($db,$servidor,$usuarioDb,$passDb);
			$DB_mysql->consulta($newusu);
			$ke=$DB_mysql->regsAfectados();
			if($ke){
				$cont+=$ke;
			}
		}
		if($cont>0){
			echo"Se han insertado $cont Usuarios";
		}else{
			echo"Error al Ingresar Datos";
		}
		?><script>
			ajaxApp('lista','controlador.php','action=ad','POST');
		</script><?
	}
	private function pass($usuario){
		$vocales=array("a"=>4,"e"=>3,"i"=>1,"o"=>0);
		foreach ($vocales as $k => $v){
		    $usuario = str_replace($k, $v, $usuario);
		}
		return $usuario;
	}
	public function ad(){
		$cont=0;
		$file = fopen("AD/AD.csv", "r") or exit("Unable to open file!");
			?>
			<div style="width: 100%; height: 20px;"></div>
		<div id="tabla1" style=" height: 520px; text-align: center;">
			<div style="height: 33px;">
			<table class="tablita2">
				<th style="width: 70px">check</th>
				<th style="width: 250px">Nombre</th>
				<th style="width: 230px">Usuario</th>
				<th>Departamento</th>
			</table>
			</div>
			<div style="height: 480px;overflow: auto; border-bottom: 2px solid #cccccc;">
				<table class="tablita2">
			<?
				while(!feof($file)){
					$fila=fgets($file);
					$separa=explode("\"",$fila);
					if($separa[1]){
						$separa2=explode(",",$separa[1]);
						if($separa2[1])
							$depto=explode("=",$separa2[1]);
					}
					if($separa[2])
						$nomUsu=explode(",",$separa[2]);
					if($nomUsu[1] && $nomUsu[2] && $depto[1] && ($depto[0]=="OU")){
						$nomUsu[2]=trim($nomUsu[2]);
						$consul="SELECT nombre FROM usuariosAcceso Where usuario='$nomUsu[2]'";
						require("../../includes/config.inc.php");
						$DB_mysql=new DB_mysql($db,$servidor,$usuarioDb,$passDb);
						$DB_mysql->consulta($consul);
						$num=$DB_mysql->numregistros();
						if($num==0){
							?>
							<tr>
								<td>
									<input type="checkbox" id="ins_<?=$cont;?>" name="ins_<?=$cont;?>" value="<?=$nomUsu[1];?>_<?=$nomUsu[2];?>_<?=$depto[1];?>" class="ck"/>
								</td>
								<td><?=$nomUsu[1];?></td>
								<td><?=$nomUsu[2];?></td>
								<td><?=$depto[1];?></td>
							</tr>
							<?
							$depto[0]=null;$cont++;
						}
					}
				}
				if($cont==0){
					?>
					<tr>
						<td colspan="4">No Existen Usuarios Nuevos en el Active Directory¡¡¡</td>
					</tr>
					<?
				}
				fclose($file);
			?>
				</table>
			</div>
		</div>
			<div style="height: 30px; float: left; margin-left: 30px; margin-top: 5px;">
				<input name="tdos" type="checkbox" name="tdos" id="tdos" value="1" onclick="todo('ck','');"/>Seleccionar todos
			</div>
			<div id="btn" style="height: 30px; text-align: center; margin-top: 8px;">
				<input type="button" onclick="insertar('<?=$cont;?>');" value="Insertar Registros" />
			</div>
			<?
	}
}
?>	