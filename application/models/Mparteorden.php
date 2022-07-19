<?php

class Mparteorden extends CI_Model{

    //MOSTRAR parteorden
    public function mselectparteorden($id){
        $this->db->where('estado <=','2');
        //$this->db->where('idCliente =',"$id");
        $resultado =$this->db->get('parteorden');
        return $resultado->result();
    }
    //INSERTAR parteorden
    public function minsertparteorden($data){
        return  $this->db->insert('parteorden',$data);
    }

    //Actualizar ultima consulta
    public function ultimaConsulta($id,$fecha){
      $data = array(
        'ultima' => $fecha,
      );
        $this->db->where('idClientes =',"$id");
        $resultado =$this->db->update('clientes', $data);

    }

    //OBTENER DATOS
    public function midupdateparteorden($id){
       $this->db->where('idparteorden', $id);
       $resultado = $this->db->get('parteorden');
       return $resultado->row();
    }

    //MODIFICAR parteorden
    public function mupdateparteorden($id, $data){
        $this->db->where('idparteorden', $id);
        return $this->db->update('parteorden', $data);
     }

     public function mselectinfoparteorden($id){
        $this->db->where('IdOrden =',"$id");
        $resultado =$this->db->get('parteorden');
        return $resultado->row();
    }
}
?>
