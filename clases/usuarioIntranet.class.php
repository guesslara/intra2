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
        
        public function verUsuariosConectados($usuarioActual){
            $sqlCon="SELECT * FROM usuariosAcceso WHERE conectado=1 AND usuario != '".$usuarioActual."'";
            $resCon=mysql_query($sqlCon,$this->conectarBdAcceso());
            if(mysql_num_rows($resCon)==0){
                echo "( 0 ) usuarios conectados.";
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