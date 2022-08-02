<?php


use voku\helper\Paginator;

// include the composer-autoloader
require_once BASEPATH.'../vendor/autoload.php';

// create new object pass in number of pages and identifier


// get number of total records


// create the api-call


class Morden extends CI_Model{

    //MOSTRAR orden actvas
    public function mselectorden(){
        $this->db->where('Eliminada <=','2');
        $this->db->order_by("IdOrden", "asc");
        $this->db->limit("5");
        $resultado =$this->db->get('orden');
        return $resultado->result();
    }
   

   
   /* public function mselectorden(){
        /*$pages = new Paginator(10,'p');
        $rowCount =$this->$db->query('SELECT COUNT(*) FROM orden');

// pass number of records to
$pages->set_total($rowCount); 

$data = $this->$db->query('SELECT * FROM table orden' . $pages->get_limit());
header('Content-Type: application/json');
echo json_encode($pages->page_links_raw());*/

        
       /* $cant= mysqli_query("SELECT COUNT(*) AS total_registro FROM orden WHERE Eliminada <= 2 ORDER BY IdOrden ASC");
        $result = mysqli_fetch_array($cant);
        $total_registro = $result['total_registro'];

        $por_pagina=5;
        
        if(empty($_GET['pagina'])){

            $pagina = 1;}
        else {
            $pagina = $_GET['pagina'];
        }
        $desde = ($pagina -1)*$por_pagina;
        $total_paginas = ceil($total_registro/$por_pagina);

        $query=$this->db->query("SELECT *
                                FROM orden WHERE Eliminada <= 2
                                ORDER BY IdOrden ASC 
                                LIMIT $desde,$por_pagina");
        //$sentencia = $pdo->prepare($query);
        //$sentencia -> execute();

       // $resultado = $sentencia->fetchAll();
        return $query->result();
    }*/

    //MOSTRAR orden completas
    public function mselectordencompletas(){
        $this->db->where('Eliminada  >=','2');
        $this->db->order_by("IdOrden", "asc");
        $resultado =$this->db->get('orden');
        return $resultado->result();
    }
    //INSERTAR orden
    public function minsertorden($data){
        return  $this->db->insert('orden',$data);
    }

    //OBTENER DATOS
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
                              FROM cliente WHERE cliente.estado <= 2
                              ORDER BY cliente.Nombre ASC " );
    return $query->result();
    }
    public function cliente_listar_select2(){//
      $query=$this->db->query("SELECT DISTINCT cliente.IdCliente  IdCliente ,cliente.Nombre as NOMBRE
                              FROM cliente WHERE cliente.estado <= 2
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
