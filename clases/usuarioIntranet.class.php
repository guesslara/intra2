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
        
        public function verUsuariosConectados(){
            $sqlCon="SELECT * FROM usuariosAcceso WHERE conectado=1";
            $resCon=mysql_query($sqlCon,$this->conectarBdAcceso());
            if(mysql_num_rows($resCon)==0){
                echo "( 0 ) usuarios conectados.";
            }else{
                while($rowCon=mysql_fetch_array($resCon)){
                    echo "<div style='height:15px;padding:5px;font-size:10px;margin:5px;'>".$rowCon["usuario"]."</div>";
                }
            }
        }
        
        public function cambiarEstado($idUsuario){
            $sqlEstado="UPDATE usuariosAcceso set conectado='1' WHERE ID='".$idUsuario."'";
            $resEstado=mysql_query($sqlEstado,$this->conectarBdAcceso());            
        }
    }
?>