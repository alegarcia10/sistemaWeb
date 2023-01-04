<?php

class Musuario extends CI_Model{

    public function logeo ($user,$pass){

        $this->db->where('nombre',$user);
        $this->db->where('pass',$pass);
        $resultado =$this->db->get('usuarios');
        if($resultado->num_rows()>0){
            return $resultado->row();
        }
        else{
            return false;
        }
    }

    //MOSTRAR usuario
    public function mselectusuario(){
        //$this->db->where('Anulado =','0');
        $resultado =$query=$this->db->query("SELECT t.nombre_tipo, t.idRol, u.idUsuario, u.nombre, u.email
        FROM tipousuario t JOIN usuarios u WHERE u.anulado = 0");
        return $resultado->result();
    }
    //INSERTAR usuario
    public function minsertusuario($data){
        return  $this->db->insert('usuarios',$data);
    }

    //OBTENER DATOS
    public function midupdateusuario($id){
       $this->db->where('idusuario', $id);
       $resultado = $this->db->get('usuarios');
       return $resultado->row();
    }

    //MODIFICAR usuario
    public function mupdateusuario($id, $data){
        $this->db->where('idusuario', $id);
        return $this->db->update('usuarios', $data);
     }
     //Traer usuario
    public function mselectinfousuario($id){
        $this->db->where('idusuario =',"$id");
        $resultado =$this->db->get('usuarios');
        return $resultado->row();
    }

    // Listar tipo de usuario
    public function usuario_listar_select(){//
        $query=$this->db->query("SELECT DISTINCT tipousuario.nombre_tipo as NOMBRE
                                FROM tipousuario JOIN usuarios WHERE usuarios.anulado = 0");
      return $query->result();
      }

    public function usuario_listar_select2(){//
        $query=$this->db->query("SELECT DISTINCT tipousuario.idRol IdTecnico ,.Nombre as NOMBRE
                                FROM tecnico WHERE tecnico.Activo = 1
                                ORDER BY tecnico.Nombre ASC " );
      return $query->result();
      }

      // Listar uno de tipo de usuario
    public function usuario_listar_select_uno($id){//
        $query=$this->db->query("SELECT DISTINCT tipousuario.nombre_tipo as NOMBRE
                                FROM tipousuario JOIN usuarios WHERE idusuario = $id");
      return $query->result();
      }


      //Verifico si exite usuario
    public function obtenerusuario($usuario){
        $this->db->where('usuarios', $usuario);
        $resultado = $this->db->get('usuarios');
        return $resultado->row();
     }
 
    function obtener($id){
        $this->db->where("idRol",$id);
        $query = $this->db->get('tipousuario');
        return $query->row();
        $error = $this->db->error();
    }
 
}
?>
