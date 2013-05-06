<?php
    session_start();
    session_regenerate_id(true);
    include("includes/txtApp.php");
    include("clases/cookieUtils.php");
    $cookieUV=new CookieUtils();
    if($cookieUV->get($txtApp['session']['cookieApp'])==false){
        header("Location: cerrar_sesion.php");
    }
?>