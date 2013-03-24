<?php
    session_start();
    //se verifican y se limpian las cadenas de texto
    $usuarioI=$_POST["txtCajaUsuario"];
    $passI=$_POST["txtCajaPassword"];
    if(!isset($_POST["txtCajaUsuario"]) || !isset($_POST["txtCajaPassword"])){
        session_destroy();
        header("Location: index.php?error=0");
        exit;
    }else{
        if($_SERVER["HTTP_REFERER"]==""){
            session_destroy();
            header("Location: index.php?error=0");
            exit;
        }else{
            //se validan los datos y se revisan
            if($usuarioI == "" || $passI == ""){
                session_destroy();
                header("Location: index.php?error=0");
                exit;
            }else{        
                $usuarioI=stripslashes($usuarioI);
                $passI=stripslashes($passI);
                $passI=md5($passI);
                include("accesoAppIntranet.class.php");
                $objAcceso=new accesoAppIntranet($usuarioI,$passI);
                $objAcceso->verificaAcceso();
            }
        }
    }
?>