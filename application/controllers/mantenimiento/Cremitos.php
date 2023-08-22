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
    $this->load->model('mcliente');
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
        $id=$remito->IdRemito;
       
        $remito->montoTotal=$this->mremito->consultaTotalRemito($id);
    }


    $this->load->view('layouts/header');
    $this->load->view('layouts/aside',$data);
    $this->load->view('admin/remito/vlist', $data);
    $this->load->view('layouts/footer');
}


public function cadd(){
    $idrol = $this->session->userdata("idRol");
   
    $data['tipo_cliente_select'] = $this->mremito->cliente_listar_select();
    $datos = array(
        'roles'=> $this->mroles->obtener($idrol)
    );



    $this->load->view('layouts/header');
    $this->load->view('layouts/aside',$datos);
    $this->load->view('admin/remito/vadd', $data);
    $this->load->view('layouts/footer');
}

public function addProducto(){
    $producto = $this->input->post("producto");
    $idRemito = $this->input->post("idRemito");
    $cant = $this->input->post("cant");
    $precio = $this->input->post("precio");


    $data = array(
        'cantidad' => $cant,
        'producto' =>  $producto,
        'idRemito' => $idRemito,
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

    $data['producto'] = $this->mremito->obtenerProducto($IdRemito);

 
   
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
        'Anulado' => '1'
    );
    $this->mremito->mupdateremito($id, $data);
    //redirect(base_url().'mantenimiento/cremito');
    echo "mantenimiento/cremitos";
}

public function ceditProd($id){
    $idrol = $this->session->userdata("idRol");
    $data = array(
        'productoedit' => $this->mremito->midupdateproducto($id),
        'roles'=> $this->mroles->obtener($idrol)
    );

    $this->load->view('layouts/header');
    $this->load->view('layouts/aside',$data);
    $this->load->view('admin/producto/vedit', $data);
    $this->load->view('layouts/footer');
}

public function cdeleteProd($id){

    $prod = $this->mremito->obtenerProdconIdProd($id);
    $IdRemito= $prod->IdRemito;
    $this->mremito->mdeleteproducto($id);
    //redirect(base_url().'mantenimiento/cparteorden/cedit/'.$IdParte);
    echo "mantenimiento/cremitos/cedit/$IdRemito";
}

public function cupdateProd(){

  $descripcion = $this->input->post('txtproducto');
  $cantidad = $this->input->post('txtcantidad');
  $precio = $this->input->post('txtprecio');
  $id = $this->input->post('txtid');
  $prod = $this->mremito->obtenerProdconIdProd($id);


  $IdRemito= $prod->IdRemito;

      $data = array(
          'producto' => $descripcion,
          'cantidad' => $cantidad,
          'precio' => $precio
      );


      $res = $this->mremito->mupdateproducto($id, $data);
      if($res){
          $this->session->set_flashdata('correcto', 'Se Guardo Correctamente');
          redirect(base_url().'mantenimiento/cremitos/cedit/'.$IdRemito);
      }else {
          $this->session->set_flashdata('error', 'No se pudo actualizar la parteorden');
          redirect(base_url().'mantenimiento/cremitos/cedit'.$IdParte);
      }
}

public function cprint($id){
    $idrol = $this->session->userdata("idRol");
    $data = array(
        'remito' => $this->mremito->midupdateremito($id),
        'roles'=>$this->mroles->obtener($idrol)
    );
   
    
    $data['cliente'] = $this->mcliente->midupdatecliente($data['remito']->IdCliente);


    $data['producto'] = $this->mremito->obtenerProducto($id);
    $data['total']=$this->mremito->consultaTotalRemito($id);
   
   
    //$roles=$this->mroles->obtener($idRol);
    $this->load->view('layouts/header');
    $this->load->view('layouts/aside',$data);
    $this->load->view('admin/remito/vprint', $data);
    $this->load->view('layouts/footer');
}






}
?>
