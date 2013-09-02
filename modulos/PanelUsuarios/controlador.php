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
	case "nommini":
		require_once("modeloUsuarios.php");
		$id_usuario=limpiar($_POST["id_usuario"]);
		$modeloUsuarios=new modeloUsuarios();
		$modeloUsuarios->nombremini($id_usuario);
	break;
	case "ad":
		require_once("modeloUsuarios.php");
		$modeloUsuarios=new modeloUsuarios();
		$modeloUsuarios->ad();
	break;
	case "buskUsu":
		require_once("modeloUsuarios.php");
		$op=limpiar($_POST["op"]);
		$filtro=limpiar($_POST["filtro"]);
		$modeloUsuarios=new modeloUsuarios();
		$modeloUsuarios->buskUsu($op,$filtro);
	break;
	case "UsuIna":
		require_once("modeloUsuarios.php");
		$modeloUsuarios=new modeloUsuarios();
		$modeloUsuarios->UsuIna();
	break;
	case "Updtprivilegios":
		require_once("modeloUsuarios.php");
		$id_usuario=limpiar($_POST["id_usuario"]);
		$na=limpiar($_POST["na"]);
		$cpis=limpiar($_POST["cpis"]);
		$modulos=limpiar($_POST["modulos"]);
		$ddv=limpiar($_POST["ddv"]);
		$modeloUsuarios=new modeloUsuarios();
		$modeloUsuarios->Updtprivilegios($id_usuario,$na,$cpis,$modulos,$ddv);
	break;
	case "UsuarioNuevo":
		require_once("modeloUsuarios.php");
		$nomina=limpiar($_POST["nomina"]);
		$nombre=limpiar($_POST["nombre"]);
		$apa=limpiar($_POST["apa"]);
		$ama=limpiar($_POST["ama"]);
		$sexo=limpiar($_POST["sexo"]);
		$usuario=limpiar($_POST["usuario"]);
		$depto=limpiar($_POST["depto"]);
		$pass=limpiar($_POST["pass"]);
		$activo=limpiar($_POST["activo"]);
		$uoi=limpiar($_POST["uoi"]);
		$id_usuario=limpiar($_POST["id_usuario"]);
		$num=limpiar($_POST["num"]);
		$modeloUsuarios=new modeloUsuarios();
		$modeloUsuarios->UsuarioNuevo($nomina,$nombre,$apa,$ama,$sexo,$usuario,$depto,$pass,$activo,$uoi,$id_usuario,$num);
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
		$num=limpiar($_POST["num"]);
		$modeloUsuarios->verificarUsuario($usuario,$num);
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