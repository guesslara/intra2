<?php
    /*
     *Clase para limpiar cadenas de texto en la aplicacion, al momento de pasar el parametro al constructor
     *Transcripcion: Gerardo Lara 
     *Fecha: 07-Mayo-2013
     *Fuente: PHP Programacion Web avanzada para profesionales - Cibelli
    */
    class clsFiltro{
        private $tagsPermitidos = array('<b>','<p>','<br>');
        
        public function __construct($tags=false){
            if(!empty($tags) && is_array($tags)){
                $this->tagsPermitidos = array_merge($this->tagsPermitidos,$tags);
            }
        }
        
        public function filtrar($texto){
            if(!is_array($texto)){
                return $this->procesar($texto);
            }
        }
        
        private function procesar($t){
            return strip_tags($t,implode('',$this->tagsPermitidos));
        }
        
    }
?>