<?php
    include("clases/clase_mysql.php");
    include("clases/regLog.php");
    include("clases/usuarioIntranet.class.php");
    include("clases/cookieUtils.php");
    
    class accesoAppIntranet{
        var $usuarioAcceso;
        var $passAcceso;
        
	function accesoAppIntranet($usuarioI,$passI){/*Metodo constructor*/
            $this->usuarioAcceso=$usuarioI;
            $this->passAcceso=$passI;
        }
        
        public function verificaAcceso(){
            include("includes/config.inc.php");
            $usuarioAcc=$this->usuarioAcceso;
            $passAcc=$this->passAcceso;
            $mysql = new DB_mysql($db,$servidor,$usuarioDb,$passDb);//se instancia la clase para la BD
            $link = $mysql->conectar();//conexion a la BD
            echo $sqlA = "SELECT * FROM ".$tablaUsuario." WHERE usuario='".mysql_real_escape_string(strip_tags($usuarioAcc))."'";
            $resA = $mysql->consulta($sqlA);
            if($mysql->numregistros()==0){
                header("Location: index.php?error=0");
                exit;
            }else{
                include("includes/txtApp.php");
                $valA = $mysql->registroUnico();
                if($valA["pass"] != $passAcc){
                    header("Location: index.php?error=0");
                    exit;    
                }
                session_start();
                session_name($txtApp['session']['name']);				
		session_cache_limiter('nocache,private');
		
		$_SESSION[$txtApp['session']['nivelUsuario']]=$valA["nivel_acceso"];				
		$_SESSION[$txtApp['session']['loginUsuario']]=$valA["usuario"];				
		$_SESSION[$txtApp['session']['passwordUsuario']]=$valA["pass"];				
		$_SESSION[$txtApp['session']['idUsuario']]=$valA["id_usuario"];
		$_SESSION[$txtApp['session']['nombreUsuario']]=$valA["nombre"];
		$_SESSION[$txtApp['session']['apellidoUsuario']]=$valA["apaterno"];
		$_SESSION[$txtApp['session']['origenSistemaUsuario']]=$txtApp['session']['origenSistemaUsuarioNombre'];
		$_SESSION[$txtApp['session']['cambiarPassUsuario']]=$valA["cambiarPass"];
		$_SESSION[$txtApp['session']['sexoUsuario']]=$valA["sexo"];
		$_SESSION[$txtApp['session']['nominaUsuario']]=$valA["nomina"];
                
		$bitacora=new regLog();
		$estado=new usuariosIntranet();
		$cookie=new CookieUtils();
                
		$bitacora->consulta($valA["usuario"],date("Y-m-d"),date("H:i:s"),$_SERVER['REMOTE_ADDR'],"Acceso Intranet","Pantalla Principal");
		$estado->cambiarEstado($valA["id_usuario"]);
                
		//se envia la cookie                
		$cookie->set($txtApp['session']['cookieApp'],$valA["id_usuario"],time()+600);		
		
		header("Location: appIntranet.php");
                exit;
            }
        }
    }
?>