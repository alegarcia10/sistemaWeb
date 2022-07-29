<?php

class Morden extends CI_Model{

    //MOSTRAR orden actvas
    public function mselectorden(){

        $resultado =	$query = $this->db->query("SELECT o.IdOrden , c.Nombre ,o.IdCliente, o.FechaRecepcion ,
           o.TareaDesarrollar, o.Precio, o.Completada, o.Eliminada FROM orden o
           INNER JOIN cliente c ON o.IdCliente = c.IdCliente where o.Eliminada=0 and o.Completada=0 ORDER BY O.IdOrden ASC;");
        return $resultado->result();

    }

    //MOSTRAR orden completas
    public function mselectordencompletas(){

        $resultado =$query = $this->db->query("SELECT o.IdOrden , c.Nombre ,o.IdCliente, o.FechaRecepcion ,
           o.TareaDesarrollar, o.Precio, o.Completada, o.Eliminada FROM orden o
           INNER JOIN cliente c ON o.IdCliente = c.IdCliente where o.Eliminada=0 and o.Completada=1  ORDER BY O.IdOrden ASC ");
        return $resultado->result();
    }
    //INSERTAR orden
    public function minsertorden($data){
        return  $this->db->insert('orden',$data);
    }

    //OBTENER DATOS con idOrden
    public function midupdateorden($id){
       $this->db->where('IdOrden', $id);
       $resultado = $this->db->get('orden');
       return $resultado->row();
    }

    //MODIFICAR orden
    public function mupdateorden($id, $data){
        $this->db->where('IdOrden', $id);
        return $this->db->update('orden', $data);
     }
     //Traer orden
    public function mselectinfoorden($id){
        $this->db->where('IdOrden =',"$id");
        $resultado =$this->db->get('orden');
        return $resultado->row();
    }

    public function cliente_listar_select(){//
      $query=$this->db->query("SELECT DISTINCT cliente.IdCliente  ID ,cliente.Nombre as NOMBRE
                              FROM cliente WHERE cliente.Anulado = 0
                              ORDER BY cliente.Nombre ASC " );
    return $query->result();
    }
    public function cliente_listar_select2(){//
      $query=$this->db->query("SELECT DISTINCT cliente.IdCliente  IdCliente ,cliente.Nombre as NOMBRE
                              FROM cliente WHERE cliente.Anulado = 0
                              ORDER BY cliente.Nombre ASC " );
    return $query->result();
    }
    function obtener($id){//
  		$this->db->where("IdCliente",$id);
  		$query = $this->db->get('cliente');
  		return $query->row();
  		$error = $this->db->error();
  	}
}
?>
