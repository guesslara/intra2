<?php
    class usuariosIntranet{
        
        private function conectarBdAcceso(){
            require("includes/config.inc.php");
            $link=mysql_connect($servidor,$usuarioDb,$passDb);        
            if($link==false){
                echo "Error en la conexion a la base de datos";
            }else{
                mysql_select_db($db);
                return $link;            
            }				
        }
        
        public function buscarNuevosMsg($usuarioMsg){
            $sqlN="SELECT COUNT(*) AS totalN FROM mensajes WHERE status='Nuevo' AND destinatario='".$usuarioMsg."'";
            $resN=mysql_query($sqlN,$this->conectarBdAcceso());
            $rowN=mysql_fetch_array($resN);
            if($resN){
                echo "<div style='width:auto;background:#FF0000;color:#FFF;float:left;margin-right:5px;font-weight:bold;'>".$rowN["totalN"]."</div>";
            }else{
                echo "Error";
            }
        }
        
        public function guardarMensaje($mensaje,$destinatario){
            $sqlM="INSERT INTO mensajes (mensaje,hora,fecha,status,destinatario) VALUES ('".$mensaje."','".date("H:i:s")."','".date("Y-m-d")."','Nuevo','".$destinatario."')";
            $resM=mysql_query($sqlM,$this->conectarBdAcceso());
            if($resM){
                echo "<script type='text/javascript'> alert('Mensaje Enviado'); cancelarMensaje(); </script>";
            }else{
                echo "<script type='text/javascript'> alert('Error al Enviar el Mensaje');  </script>";
            }
        }
        
        public function verUsuariosConectados($usuarioActual){
            $sqlCon="SELECT * FROM usuariosAcceso WHERE conectado=1 AND usuario != '".$usuarioActual."'";
            $resCon=mysql_query($sqlCon,$this->conectarBdAcceso());
            if(mysql_num_rows($resCon)==0){
                echo "Ningun usuario conectado.";
            }else{
                while($rowCon=mysql_fetch_array($resCon)){
                    echo "<div class='usuariosConectadosActual'><div style='float:left;width:65%;border:0px solid #CCC;'>".$rowCon["usuario"]."</div><div style='float:right;width:20%;border:0px solid #CCC;font-size:8px;text-align:center;' onclick='enviarMensaje(\"".$rowCon["usuario"]."\")'>Mensaje</div></div>";
                }
            }
        }
        
        public function cambiarEstado($idUsuario){
            $sqlEstado="UPDATE usuariosAcceso set conectado='1' WHERE ID='".$idUsuario."'";
            $resEstado=mysql_query($sqlEstado,$this->conectarBdAcceso());            
        }
        
        public function cambiarEstadoInactivo($idUsuario){
            $sqlEstado="UPDATE usuariosAcceso set conectado='0' WHERE ID='".$idUsuario."'";
            $resEstado=mysql_query($sqlEstado,$this->conectarBdAcceso());            
        }
    }
?>