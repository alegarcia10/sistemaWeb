<?php

class Mfactura extends CI_Model{

    //MOSTRAR Factura
    public function mselectfactura(){
        
        $resultado =$this->db->get('factura');

        return $resultado->result();
    }
    //INSERTAR Factura
    public function minsertfactura($data){
        return  $this->db->insert('factura',$data);
    }

    //Modificar
    public function miupdatefactura($id){
       $this->db->where('id_orden', $id);
       $resultado = $this->db->get('factura');
       return $resultado->row();
    }


}
?>