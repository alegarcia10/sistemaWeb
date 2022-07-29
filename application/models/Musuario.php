<?php

class Musuario extends CI_Model{

    public function logeo ($user,$pass){

        $this->db->where('usuario',$user);
        $this->db->where('pass',$pass);
        $resultado =$this->db->get('usuario');
        if($resultado->num_rows()>0){
            return $resultado->row();
        }
        else{
            return false;
        }
    }

    //MOSTRAR usuario
    public function mselectusuario(){
        $this->db->where('Anulado =','0');
        $resultado =$this->db->get('usuario');
        return $resultado->result();
    }
    //INSERTAR usuario
    public function minsertusuario($data){
        return  $this->db->insert('usuario',$data);
    }

    //OBTENER DATOS
    public function midupdateusuario($id){
       $this->db->where('idusuario', $id);
       $resultado = $this->db->get('usuario');
       return $resultado->row();
    }

    //MODIFICAR usuario
    public function mupdateusuario($id, $data){
        $this->db->where('idusuario', $id);
        return $this->db->update('usuario', $data);
     }
     //Traer usuario
    public function mselectinfousuario($id){
        $this->db->where('idusuario =',"$id");
        $resultado =$this->db->get('usuario');
        return $resultado->row();
    }
}
?>
