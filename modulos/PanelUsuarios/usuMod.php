<?//print_r($_POST);?>
<script type="text/javascript">
  
</script>
<?
require_once("../../clases/clase_mysql.php");
require("../../includes/config.inc.php");
//for($i=0;$i<5;$i++){
if($_POST['usuarios']==1){
   $consulta="SELECT id_usuario, nombre, usuario, apaterno FROM usuariosAcceso WHERE nombre LIKE '".$_POST['nombre']."%' AND activo='0'";   
}else{
   $consulta="SELECT id_modulo, nombre, tipo FROM modulos WHERE nombre LIKE '".$_POST['nombre']."%' ";
}

$DB_mysql=new DB_mysql($db,$servidor,$usuarioDb,$passDb);
$DB_mysql->consulta($consulta);
echo"<div id='usuarios' style='margin: 0 auto; height: 450px; width: 250px;'>";
while($row=mysql_fetch_row($DB_mysql->registrosConsulta())){
?>
   <div style="height: 20px; border: 1px solid #f0f0f0;">
      <div style="float: left;"><?=$row[1]." ".$row[3]." - ( ".$row[2]." )";?></div>
      <div style="margin: 1px; float: right;"><img src="../../img/mas.png" width=23 height=18></div>
   </div>
<?
}
echo"</div>";
//}
?>