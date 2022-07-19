<?php

class Mcombo extends CI_Model{

    //MOSTRAR Color
    public function mcombotabla($tabla){
        //log_message('error',sprintf("NOMBRE TABLA =$tabla"));
        $this->db->where('estado ','1');
        $resultado =$this->db->get($tabla);
        return $resultado->result();
    }
    public function mcombotablaorden($tabla){
        //log_message('error',sprintf("NOMBRE TABLA =$tabla"));
        $this->db->where('Eliminada ','1');
        $resultado =$this->db->get($tabla);
        return $resultado->result();
    }




}
?>
