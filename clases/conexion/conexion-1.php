<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Conexion
 *
 * @author Fernando
 */
class Conexion {
    private $CONST_SERVER  = 'localhost';
    private $CONST_USER    = 'root';
    private $CONST_PASS    = 'xampp';
    private $CONST_DB      = 'iqe_com_2010';
    private $db;
    private $mensajes;

    public function getConexion() {
        try {
            $this->db = new mysqli($this->CONST_SERVER, $this->CONST_USER, $this->CONST_PASS, $this->CONST_DB);
            if(mysqli_connect_errno()) {
                throw new Exception('No es posible atender su peticion',  mysqli_connect_errno());
            }
        } catch(Exception $e) {
            $this->mensajes['code']    = $e->getCode();
            $this->mensajes['message'] = $e->getMessage();
            $this->mensajes['file']    = $e->getFile();
            $this->mensajes['line']    = $e->getLine();
            $this->mensajes['trace']   = $e->getTrace();
            $this->mensajes['trace_s'] = $e->getTraceAsString();
            $this->db = false;
        }
        return $this->db;
    }

    public function getMensajes() {
        return $this->mensajes;
    }// end getMensajes
}
?>
