<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cremitos extends CI_Controller {
    function __construct(){
    parent:: __construct();
    if(!$this->session->userdata('login')){
        redirect(base_url());
    }
    $this->load->model('mremito');
    $this->load->model('mroles');
    $this->load->model('mcombo');
    $this->load->model('mfactura');
    $this->load->model('morden');
    }



public function index(){
    $idrol = $this->session->userdata("idRol");
    $remitos= $this->mremito->mselectremito(); 
    
   
    $data = array (
        'remitoindex' => $remitos,
        'roles'=> $this->mroles->obtener($idrol)
    );


    $remitos=  $data['remitoindex'];
  

    foreach ($remitos as $remito ) {
        $id=100;
        $remito->montoTotal= $id;
         //$remito->Gastos=$this->mremito->consultaGatosremito($id);
    }




    //die;

    $this->load->view('layouts/header');
    $this->load->view('layouts/aside',$data);
    $this->load->view('admin/remito/vlist', $data);
    $this->load->view('layouts/footer');
}


public function cadd($id){
    $idrol = $this->session->userdata("idRol");
    
    $data = array(
        'remitoedit' => $this->mremito->midupdateremito($id),
        'roles'=>$this->mroles->obtener($idrol)
    );
    $data['tipo_cliente_select'] = $this->mremito->cliente_listar_select();
    $datos = array(
        'roles'=> $this->mroles->obtener($idrol)
    );



    $IdRemito=$data['remitoedit']->IdRemito;
    $IdProducto=$data['remitoedit']->IdProducto;
    $data['producto'] = $this->mremito->obtenerProducto($IdRemito,$IdProducto);

    var_dump($data);
    die;

    $this->load->view('layouts/header');
    $this->load->view('layouts/aside',$datos);
    $this->load->view('admin/remito/vadd', $data);
    $this->load->view('layouts/footer');
}

public function addProducto(){
    $producto = $this->input->post("producto");
    $idRemito = $this->input->post("idRemito");
    $idProducto = $this->input->post("idProducto");
    $cant = $this->input->post("cant");
    $precio = $this->input->post("precio");


    $data = array(
        'cantidad' => $cant,
        'producto' =>  $producto,
        'idRemito' => $idRemito,
        'idProducto' => $idProducto,
        'precio' => $precio
    );
    $ale=$data['Cantidad'];

    $res=$this->mremito->cargarProd($data);

    $a=['linksa'=>$res];

    echo json_encode($a);
}

public function cinsert(){

     $vendedor = $this->input->post('txtvendedor');
     $obs = $this->input->post('txtobser');
     $fecha = $this->input->post('txtfecha');
     $id_cliente=$this->input->post("tipo_cliente");

    //REGLA DE VALIDACION
        $data = array(
            'fecha' => $fecha,
            'vendedor' => $vendedor,
            'IdCliente' => $id_cliente,
            'observaciones' => $obs
        );
        $res=$this->mremito->minsertremito($data);
        if($res){
            $this->session->set_flashdata('correcto', 'Se guardo Correctamente');
            redirect(base_url().'mantenimiento/cremitos');
        }else{
            $this->session->set_flashdata('error', 'No se Guardo registro');
            redirect(base_url().'mantenimiento/cremitos/cadd');
        }


}


public function cedit($id){
    $idrol = $this->session->userdata("idRol");
    $data = array(
        'remitoedit' => $this->mremito->midupdateremito($id),
        'roles'=>$this->mroles->obtener($idrol)
    );
    $data['cliente_select'] = $this->mremito->cliente_listar_select2();
    
    $data['model'] = $this->mremito->obtener($data['remitoedit']->IdCliente);

    

    $IdRemito=$data['remitoedit']->IdRemito;
    $IdProducto=$data['remitoedit']->IdProducto;
    $data['producto'] = $this->mremito->obtenerProducto($IdRemito,$IdProducto);

    var_dump($data);
    die;
   
    //$roles=$this->mroles->obtener($idRol);
    $this->load->view('layouts/header');
    $this->load->view('layouts/aside',$data);
    $this->load->view('admin/remito/vedit', $data);
    $this->load->view('layouts/footer');
}

public function cupdate(){
    
    $id = $this->input->post('txtIdRemito');
    $vendedor = $this->input->post('txtvendedor');
    $obs = $this->input->post('txtobservaciones');
    $fecha = $this->input->post('txtfecha');
    $id_cliente=$this->input->post("cliente");

    if($fecha==null){
        $fecha=null;
    }
    else{
        $fecha =date("Y/m/d", strtotime($this->input->post('txtfecha')));
    }

   
   
    $data = array(
        'fecha' => $fecha,
        'vendedor' => $vendedor,
        'IdCliente' => $id_cliente,
        'observaciones' => $obs
    );

        $res = $this->mremito->mupdateremito($id, $data);
        if($res){
            $this->session->set_flashdata('correcto', 'Se Guardo Correctamente');
            redirect(base_url().'mantenimiento/cremitos');
        }else {
            $this->session->set_flashdata('error', 'No se pudo actualizar la remito');
            redirect(base_url().'mantenimiento/cremitos/cedit'.$id);
        }


}


  

public function cdelete($id){

    $data=array(
        'Eliminada' => '1'
    );
    $this->mremito->mupdateremito($id, $data);
    //redirect(base_url().'mantenimiento/cremito');
    echo "mantenimiento/cremito";
}

public function ccompleta($id){

    $data=array(
        'Completada' => '1'
    );
    $this->mremito->mupdateremito($id, $data);
    //redirect(base_url().'mantenimiento/cremito');
    echo "mantenimiento/cremito";
}

public function cdescompleta($id){

    $data=array(
        'Completada' => '0'
    );
    $this->mremito->mupdateremito($id, $data);
    //redirect(base_url().'mantenimiento/cremito');
    echo "mantenimiento/cremito";
}





}
?>
