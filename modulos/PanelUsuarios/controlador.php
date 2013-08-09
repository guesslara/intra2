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
	case "Updtprivilegios":
		require_once("modeloUsuarios.php");
		$id_usuario=limpiar($_POST["id_usuario"]);
		$na=limpiar($_POST["na"]);
		$cpis=limpiar($_POST["cpis"]);
		$modulos=limpiar($_POST["modulos"]);
		$modeloUsuarios=new modeloUsuarios();
		$modeloUsuarios->Updtprivilegios($id_usuario,$na,$cpis,$modulos);
	break;
	case "UsuarioNuevo":
		require_once("modeloUsuarios.php");
		$nomina=limpiar($_POST["nomina"]);
		$nombre=limpiar($_POST["nombre"]);
		$apa=limpiar($_POST["apa"]);
		$sexo=limpiar($_POST["sexo"]);
		$usuario=limpiar($_POST["usuario"]);
		$depto=limpiar($_POST["depto"]);
		$pass=limpiar($_POST["pass"]);
		$activo=limpiar($_POST["activo"]);
		$modeloUsuarios=new modeloUsuarios();
		$modeloUsuarios->UsuarioNuevo($nomina,$nombre,$apa,$sexo,$usuario,$depto,$pass,$activo);
	break;
	case "insertar":
		require_once("modeloUsuarios.php");
		$modeloUsuarios=new modeloUsuarios();
		$datos=limpiar($_POST["datos"]);
		$modeloUsuarios->insertar($datos);
	break;
	case "verificarUsuario":
		require_once("modeloUsuarios.php");
		$modeloUsuarios=new modeloUsuarios();
		$usuario=limpiar($_POST["usuario"]);
		$modeloUsuarios->verificarUsuario($usuario);
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