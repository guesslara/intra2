<?//print_r($_POST);?>
<script type="text/javascript">
   $(document).ready(function() {
		$( "#accordion2" ).accordion({
			"fillSpace": true,
			"active": 0,
		});
	});
</script>
<?
require_once("../../clases/clase_mysql.php");
require("../../includes/config.inc.php");
$paginasT=$_POST['totalpag'];
$intervalo=$_POST['intervalo'];
$pagAct=$_POST['pagAct'];
$pag=8;//pag es el limite de registros
$lim=$pag+$intervalo;
if($paginasT==0 && $intervalo==0){
   $consulta="SELECT * FROM grupos";
   $DB_mysql=new DB_mysql($db,$servidor,$usuarioDb,$passDb);
   $DB_mysql->consulta($consulta);  
   $noReg=$DB_mysql->regsAfectados();
  //  echo"registros=$noReg";
   if($noReg>$pag){
      $paginasT=ceil($noReg/$pag);
//      echo"pag= $paginasT";
?>
      <input type="hidden" id="pagAct" name="pagAct" value="<?=$pagAct;?>"/>
      <input type="hidden" id="limite" name="limite" value="<?=$lim;?>"/>
      <input type="hidden" id="tp" name="tp" value="<?=$paginasT;?>"/>
      <script>
	 $("#paginador").show();
      </script>
<?
      $consulta="SELECT * FROM grupos limit 0,8";
      $DB_mysql=new DB_mysql($db,$servidor,$usuarioDb,$passDb);
      $DB_mysql->consulta($consulta);
   }else{
     
   }
}else{
    ?><script>
	$("#paginador").show();
   </script><?
   if($pagAct==1){
      ?><script>
         $("#ant").hide();
	 $("#sig").show();
      </script><?
   }
   if($pagAct>1 && $pagAct<$paginasT){
      ?><script>
         $("#ant").show();
	 $("#sig").show();
      </script><?
   }
   if($pagAct==$paginasT){
      ?><script>
         $("#sig").hide();
         $("#ant").show();
      </script><?
   }
   $consulta="SELECT * FROM grupos limit ".$intervalo.",8";
   $DB_mysql=new DB_mysql($db,$servidor,$usuarioDb,$passDb);
   $DB_mysql->consulta($consulta);
   $noReg=$DB_mysql->regsAfectados();
?>
   <input type="hidden" id="pagAct" name="pagAct" value="<?=$pagAct;?>"/>
   <input type="hidden" id="limite" name="limite" value="<?=$lim;?>"/>
   <input type="hidden" id="tp" name="tp" value="<?=$paginasT;?>"/>
<?
}
?>


<input type="hidden" id="limreg" name="limreg" value="<?=$pag;?>"/>
<div id="paginador" style="display: none; height: 25px; width: 100%; text-align: center;">
   <div style="float: left; background: #f0f0f0; width: 25px; height: 25px; text-align: center; font-size: 15px; font-family: cursive;"><?=$pagAct;?></div>
   <div style="float: left; background: #f0f0f0; width: 325px; height: 25px; text-align: center; font-size: 9px;">
      <?for($i=1;$i<=$paginasT;$i++){
	 echo"<n onclick='pagdirect($i)' onmouseover='crece();'>$i </n>";
      }?>
   </div>
   <div style="float: right; background: #f0f0f0; width: 50px; height: 25px;">
      <div id="ant" style="display: none; float: left;" onclick="att()"><div style="margin: 1px;"><img src="../../img/ant.png" width=23 height=23></div></div>
      <div id="sig" style="float: right;" onclick="add()"><div style="margin: 1px;"><img src="../../img/sig.png" width=23 height=23></div></div>
   </div>
</div>
<div id="accordion2" style="margin: 0 auto; height: 500px; width: 300px; ">
<?
   while($row=mysql_fetch_row($DB_mysql->registrosConsulta())){
?>
      <h3 style="border: 1px solid #808080; background: #f0f0f0; "><?=$row[1];?></h3>
      <div style="border: 1px solid #808080; height: 100px;">
<?
	 $upg="SELECT usuariosAcceso.nombre, usuariosAcceso.apaterno, detalle_grupos.id_usuario, detalle_grupos.id_grupo, detalle_grupos.privilegios
	       FROM usuariosAcceso
	       INNER JOIN detalle_grupos ON usuariosAcceso.id_usuario = detalle_grupos.id_usuario
	       WHERE detalle_grupos.id_grupo = ".$row[0];
	 $DB_mysq=new DB_mysql($db,$servidor,$usuarioDb,$passDb);
	 $DB_mysq->consulta($upg);
	 while($rows=mysql_fetch_row($DB_mysq->registrosConsulta())){
?>
	    <div style="height: 20px; border: 1px solid #f0f0f0;">
	       <div style="float: left;"><?=$rows[0]." ".$rows[1];?></div>
	       <div style="margin: 1px; float: right;"><img src="../../img/menos.png" width=23 height=18></div>
	    </div>
<?
	 }
      echo"</div>";
   }
?>
</div>