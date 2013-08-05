<?
//require_once("../../includes/config.inc.php");

require_once("../../clases/clase_mysql.php");
class modeloUsuarios{
	public function insertar($datos){
		$linea=explode(",",$datos);
		require("../../includes/config.inc.php");
		$num=count($linea);$cont=0;
		//echo"*** $num *** <br />";
		for($j=0;$j<(count($linea)-1);$j++){
			$datoxd=explode("_",$linea[$j]);
			$pass=$this->pass($datoxd[1]);
			$newusu="INSERT INTO usuariosAcceso (nombre, usuario, departamento, pass) VALUES ('$datoxd[0]','$datoxd[1]','$datoxd[2]','$pass');";
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
			<br />
		<div id="tabla1" style=" height: 520px; text-align: center;">
			<div style="height: 33px;">
			<table class="tablita2">
				<th>check</th>
				<th>Nombre</th>
				<th>Usuario</th>
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
				<input name="Todos" type="checkbox" name="tdos" id="tdos" value="1" onclick="todo('<?=$cont;?>');"/>Seleccionar todos
			</div>
			<div id="btn" style="height: 30px; text-align: center; margin-top: 8px;">
				<input type="button" onclick=insertar('<?=$cont;?>'); value="Insertar Registros" />
			</div>
			<?
		
	}
}
?>	