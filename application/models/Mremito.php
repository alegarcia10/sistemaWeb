<?php

class Mremito extends CI_Model{

    //MOSTRAR remito actvas

    public function mselectremito(){
      $this->db->where('Anulado =','0');
      $this->db->order_by("IdRemito", "asc");
      $resultado =$this->db->get('remitos');

      return $resultado->result();
  }

    public function mselectestadostrabajo(){

      $resultado =	$query = $this->db->query("SELECT o.IdRemito , c.Nombre ,o.IdCliente, o.FechaRecepcion ,
         o.TareaDesarrollar, o.Precio, o.Completada, o.Eliminada, f.N_factura, f.fecha_factura, f.fecha_pago, f.estado_pago FROM remito o
         INNER JOIN cliente c ON o.IdCliente = c.IdCliente  
         LEFT JOIN factura f ON f.id_remito = o.IdRemito
         where o.Eliminada=0 ORDER BY o.IdRemito DESC;");
      return $resultado->result();

  }

    public function mselectremitofecha($ini,$fin){
     

      $ini = date("Y-m-d", strtotime($ini));
      $fin = date("Y-m-d", strtotime($fin));
     
      $resultado =	$query = $this->db->query("SELECT o.IdRemito , c.Nombre ,o.IdCliente, o.FechaRecepcion ,
         o.TareaDesarrollar, o.Precio, o.Completada, o.Eliminada FROM remito o
         INNER JOIN cliente c ON o.IdCliente = c.IdCliente 
         where o.Eliminada=0 and o.Completada=0 and o.FechaRecepcion >= '$ini' and o.FechaRecepcion <= '$fin' 
         ORDER BY o.IdRemito DESC;");
    
      return $resultado->result();
      

  }

    public function consultaTareas($id){
        $this->db->where('IdRemito', $id);
        $resultado=$this->db->get('parteremito');
        return  $resultado->result();
     }

     //CONSULTA LOS GASTOS DE TODOS OS MATERIALES DE UNA TAREA
     public function consultaGatosTotales($id){
       $resultado =$query = $this->db->query("SELECT SUM(Precio)as Gastos FROM material where IdParte=$id");
        //log_message('error',sprintf("id remito $ $resultado"));
        $resultado=$resultado->row();
       $gastos=$resultado->Gastos;

       $x=intval($gastos);
       //var_dump($gastos->Gastos);
       //log_message('error',sprintf("gastosssss $x "));
         return  $gastos;
      }


      public function consultaGatosremito($id){
        $resultado =$query = $this->db->query("SELECT ifnull(SUM(Precio),0) as Gastos FROM material where IdRemito=$id");
         //log_message('error',sprintf("id remito $ $resultado"));
         $resultado=$resultado->row();
        $gastos=$resultado->Gastos;

        $x=intval($gastos);
        //var_dump($gastos->Gastos);
        //log_message('error',sprintf("gastos de remito $x "));
          return  $gastos;
       }
    //MOSTRAR remito completas
   
    //INSERTAR remito
    public function minsertremito($data){
        return  $this->db->insert('remito',$data);
    }

    //OBTENER DATOS con IdRemito
    public function midupdateremito($id){
       $this->db->where('IdRemito', $id);
       $resultado = $this->db->get('remito');
       return $resultado->row();
    }

    //OBTENER DATOS con IdRemito
    public function midupdateremitoyfacturas($id){
      $query=$this->db->query("SELECT o.IdRemito ,o.observaciones ,o.IdCliente, o.FechaRecepcion , o.TareaDesarrollar, 
      o.Precio, o.Completada, o.Eliminada, f.N_factura, f.fecha_factura, f.fecha_pago, f.estado_pago 
      FROM remito o LEFT JOIN factura f ON f.id_remito = o.IdRemito where o.IdRemito=$id;" );
      return $query->row();
   }

  
    //MODIFICAR remito
    public function mupdateremito($id, $data){
        $this->db->where('IdRemito', $id);
        return $this->db->update('remito', $data);
     }
     //Traer remito
    public function mselectinforemito($id){
        $this->db->where('IdRemito =',"$id");
        $resultado =$this->db->get('remito');
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
    function consultarEstado($id){//
      $query=$this->db->query("SELECT * FROM parteremito WHERE IdRemito=$id and 
      IdParte  = (SELECT MAX(IdParte) FROM parteremito WHERE IdRemito=$id)" ) ;
    return $query->row();
  	}

     function consultarPrimerTarea($id){//
      $query=$this->db->query("SELECT * FROM parteremito WHERE IdRemito=$id and 
      IdParte  = (SELECT MIN(IdParte) FROM parteremito WHERE IdRemito=$id)" ) ;
    return $query->row();
  	}
}
?>
