<?php

class Mequipos extends CI_Model{

    //MOSTRAR orden equipos
    public function mselectequipos(){
        $resultado =	$query = $this->db->query("SELECT r.num_orden , r.fecha ,r.marca, r.modelo,
        r.num_serie, r.sector, r.descripcion, r.id_cliente, r.anulado, c.Nombre FROM recepcionequipos r
        JOIN cliente c ON r.idcliente = c.IdCliente  
        where r.anulado=0 
        ORDER BY r.num_orden DESC;");
     return $resultado->result();
    }
    //INSERTAR orden equipos
    public function minsertequipos($data){
        return  $this->db->insert('recepcionequipos',$data);
    }

    //OBTENER DATOS
    public function midupdateequipos($id){
       $this->db->where('num_orden', $id);
       $resultado = $this->db->get('recepcionequipos');
       return $resultado->row();
    }

    
    //MODIFICAR orden equipos
    public function mupdateequipos($id, $data){
        $this->db->where('num_orden', $id);
        return $this->db->update('recepcionequipos', $data);
     }

     //Traer Cliente
    public function mselectinfocliente($id){
        $this->db->where('IdCliente =',"$id");
        $resultado =$this->db->get('cliente');
        return $resultado->row();
    }
}
?>