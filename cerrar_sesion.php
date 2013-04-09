<?php
	session_start();
	include("includes/txtApp.php");
	include("clases/usuarioIntranet.class.php");
	//se actualiza el estado del usuario
	$objUsuario=new usuariosIntranet();
	$objUsuario->cambiarEstadoInactivo($_COOKIE["usuarioIntranet"]);
	//se recupera la cookie enviada
	$idUsuarioCookie=$_COOKIE["usuarioIntranet"];
	setcookie("usuarioIntranet", $_SESSION[$txtApp['session']['idUsuario']], time()-3600);
	
	unset($txtApp['session']['name']);	
	unset($txtApp['session']['nivelUsuario']);
	unset($txtApp['session']['loginUsuario']);
	unset($txtApp['session']['passwordUsuario']);
	unset($txtApp['session']['idUsuario']);
	unset($txtApp['session']['nombreUsuario']);
	unset($txtApp['session']['apellidoUsuario']);
	unset($txtApp['session']['origenSistemaUsuario']);
	unset($txtApp['session']['origenSistemaUsuarioNombre']);
	unset($txtApp['session']['cambiarPassUsuario']);
	unset($txtApp['session']['sexoUsuario']);
	unset($txtApp['session']['nominaUsuario']);
	session_destroy();
	header("Location:index.php");
	exit;
?>