<?php
session_start();
$ac=limpiar($_POST["action"]);
//print_r($_POST);
function limpiar($contenido)
{
        $contenido = strip_tags($contenido);
        $contenido = mysql_real_escape_string($contenido);
        return $contenido;
}
switch ($ac){
	case "ad":
		require_once("modeloUsuarios.php");
		$modeloUsuarios=new modeloUsuarios();
		$modeloUsuarios->ad();
	break;
	case "insertar":
		require_once("modeloUsuarios.php");
		$modeloUsuarios=new modeloUsuarios();
		$datos=limpiar($_POST["datos"]);
		$modeloUsuarios->insertar($datos);
	break;
	case "cambioFecha":
		require_once("modeloUsuarios.php");
		$id_pago=limpiar($_POST["id_pago"]);
		$fecha=limpiar($_POST["fecha"]);
		$id_usuario=limpiar($_POST["id_usuario"]);
		$proyectos=new proyectos();
		$proyectos->cambioFecha($id_pago,$fecha,$id_usuario);
	break;
exit;
}
?>