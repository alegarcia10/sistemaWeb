<?php

class Mparteorden extends CI_Model{

    //MOSTRAR parteorden
    public function mselectparteorden($id){
        $this->db->where('Anulado =','0');
        $this->db->where('IdOrden =',"$id");
        $resultado =$this->db->get('parteorden');
        return $resultado->result();
    }
    //INSERTAR parteorden
    public function minsertparteorden($data){
          $this->db->insert('parteorden',$data);
          return $this->db->insert_id();
    }

    //INSERTAR TecnicoOrden
    public function insertTecnicoOrden($data){
      return $this->db->insert('tecnicoorden',$data);
    }

    //OBTENER DATOS
    public function midupdateparteorden($id){
       $this->db->where('IdParte', $id);
       $resultado = $this->db->get('parteorden');
       return $resultado->row();
    }
    //OBTENER DATOS Material
    public function midupdatematerial($id){
       $this->db->where('IdMat', $id);
       $resultado = $this->db->get('material');
       return $resultado->row();
    }


    //MODIFICAR parteorden
    public function mupdateparteorden($idparte, $idorden,$data){
        $this->db->where('IdParte', $idparte);
        $this->db->where('IdOrden', $idorden);
        return $this->db->update('parteorden', $data);
     }

     public function mselectinfoparteorden($id){

        $resultado =	$query = $this->db->query("SELECT o.IdOrden , o.FechaRecepcion , o.TareaDesarrollar , o.Precio , o.IdCliente , o.Completada , o.Eliminada , c.Nombre
        FROM orden o
        INNER JOIN cliente c ON o.IdCliente = c.IdCliente where o.IdOrden=$id;");
        return $resultado->row();
    }
    public function tecnico_listar_select(){//
      $query=$this->db->query("SELECT DISTINCT tecnico.Dni  ID ,tecnico.Nombre as NOMBRE
                              FROM tecnico WHERE tecnico.Activo = 1
                              ORDER BY tecnico.Nombre ASC " );
    return $query->result();
    }

    public function tecnico_listar_select2(){//
      $query=$this->db->query("SELECT DISTINCT tecnico.Dni IdTecnico ,tecnico.Nombre as NOMBRE
                              FROM tecnico WHERE tecnico.Activo = 1
                              ORDER BY tecnico.Nombre ASC " );
    return $query->result();
    }

    //Trear Materiales Parte Orden
    public function obtenerMaterial($idOrden, $idParte){
        $this->db->where('IdOrden =',"$idOrden");
        $this->db->where('IdParte =',"$idParte");
        $resultado =$this->db->get('material');
        return $resultado->result();
    }

    //Trear Material con IdMat
    public function obtenerMaterialconIdMat($IdMat){

        $this->db->where('IdMat =',"$IdMat");
        $resultado =$this->db->get('material');
        return $resultado->row();
    }



    //Eliminar Material
    public function mdeletematerial($IdMat){

        $this->db->where('IdMat =',"$IdMat");
        $resultado =$this->db->delete('material');

    }

    //MOSTRAR parteorden
    public function mselectTecnicoIdParte($id){

        $resultado =	$query = $this->db->query("SELECT t.IdParte , t.Dni , tc.Nombre FROM tecnicoorden t
           INNER JOIN tecnico tc ON t.Dni = tc.Dni where t.IdParte=$id ;");
        return $resultado->result();
    }

    public function mselectTecnicoId($id){

        $resultado =	$query = $this->db->query("SELECT tc.Nombre FROM tecnicoorden t
           INNER JOIN tecnico tc ON t.Dni = tc.Dni where t.IdParte=$id ;");
         $tecnicos=$resultado->result();
         $resultado="";
         foreach($tecnicos as $tecnico){
            $nombre = $tecnico->Nombre;
            $resultado = $resultado.$nombre;
            var_dump($nombre);
            die;
         }
         
    }




    //MODIFICAR material
    public function mupdatematerial($id, $data){
        $this->db->where('IdMat', $id);
        return $this->db->update('material', $data);
     }



    //CargarMaterial

    public function cargarMat($data){

        $IdParte=$data['IdParte'];
        $IdOrden=$data['IdOrden'];
        $Cantidad=$data['Cantidad'];
        $Descripcion=$data['Descripcion'];
        $Precio=$data['Precio'];
        $this->db->where('IdOrden =',"$IdOrden");
        $this->db->where('IdParte =',"$IdParte");
        $this->db->insert('material',$data);
        $IdMat=$this->db->insert_id();

        return $linka= '<tr>
                    <td>'.$IdMat.'</td>
                    <td>'.$Descripcion.'</td>
                    <td>'.$Cantidad.'</td>
                    <td>'.$Precio.'</td>
                    <td>
                        <div class="btn-group">
                            <a title="Modificar" href="@'.$IdMat.'" class="btn btn-info ">
                                <span class="fa fa-pencil"></span>
                            </a>
                            <a title="Eliminar" href="_'.$IdMat.'" class="btn btn-danger btn-remove">
                                <span class="fa fa-remove"></span>
                            </a>
                        </div>
                    </td>
                </tr>';
    }

    //Cargar Tecnico Orden

    public function cargarTecnicoOrden($data){

        $IdParte=$data['IdParte'];
        $Dni=$data['Dni'];

        $this->db->insert('tecnicoorden',$data);

    }

    //Eliminar TecnicoOrden
    public function mdeletetecnicoOrden($IdParte,$Dni){

        $this->db->where('Dni =',"$Dni");
        $this->db->where('IdParte =',"$IdParte");
        $resultado =$this->db->delete('tecnicoorden ');

    }



    //Trae Tecnico con el dni
    public function nombreTecnico($Dni){
        $this->db->where('Dni =',"$Dni");
        $resultado =$this->db->get('tecnico');
        $res=$resultado->row();
        return $res;
    }


    /*//INSERTAR TecnicoParteOrden
    public function cargarTecnicoParteOrden($data){
      return $this->db->insert('tecnicoparteorden',$data);
    }
    //Eliminar Tecnico tala tecnicoparteorden
    public function mdeletetecnicoParteOrden($Dni){
        $this->db->where('Dni =',"$Dni");
        $resultado =$this->db->delete('tecnicoparteorden ');

    }

    //Trae Tecnico asociado a ORDEN al momento de crear momentaneamente
    public function tecnico_parte(){
        $resultado =$this->db->get('tecnicoparteorden');
        return $resultado->result();
    }*/





}
?>
