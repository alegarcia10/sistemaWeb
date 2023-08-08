<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cequipos extends CI_Controller {
    function __construct(){
    parent:: __construct();
    if(!$this->session->userdata('login')){
        redirect(base_url());
    }
    $idrol = $this->session->userdata("idRol");
    $this->load->model('mcliente');
    $this->load->model('mequipos');
    $this->load->model('mroles');
    $this->load->model('mcombo');
    //var_dump($nombre);
    }


public function index(){
    $idrol = $this->session->userdata("idRol");
    $data = array (
        'equipoindex' => $this->mequipos->mselectequipos(),
        'roles'=> $this->mroles->obtener($idrol)
    );
    //$roles=$this->mroles->obtener($idRol);
    $this->load->view('layouts/header');
    $this->load->view('layouts/aside',$data);
    $this->load->view('admin/recepcion_equipos/vlist', $data);
    $this->load->view('layouts/footer');
}



public function cadd(){
    $idrol = $this->session->userdata("idRol");
    $data['tipo_cliente_select'] = $this->mequipos->cliente_listar_select();
    $datos = array (
        'roles'=>$this->mroles->obtener($idrol)
    );
    
    $this->load->view('layouts/header');
    $this->load->view('layouts/aside',$datos);
    $this->load->view('admin/recepcion_equipos/vadd',$data);
    $this->load->view('layouts/footer');
}


public function cinsert(){

    
     $fecha = $this->input->post('txtfecha');
     $id_cliente=$this->input->post("tipo_cliente");
     $marca = $this->input->post('txtmarca');
     $modelo = $this->input->post('txtmodelo');
     $num_serie = $this->input->post('txtserie');
     $sector = $this->input->post('txtsector');
     $descripcion = $this->input->post('txtdescripcion');

               $data = array(

                   'fecha' => $fecha,
                   'marca' => $marca,
                   'modelo' => $modelo,
                   'num_serie' => $num_serie,
                   'sector' => $sector,
                   'descripcion' => $descripcion,
                   'anulado' => '0'
               );
               $res=$this->mequipos->minsertequipos($data);

               if($res){
                   $this->session->set_flashdata('correcto', 'Se guardo Correctamente');
                   redirect(base_url().'mantenimiento/cequipos');
               }else{
                   $this->session->set_flashdata('error', 'No se Guardo registro');
                   redirect(base_url().'mantenimiento/cequipos/cadd');
               }


}


public function cedit($id){
    $idrol = $this->session->userdata("idRol");
    $data = array(
        'clienteedit' => $this->mcliente->midupdatecliente($id),
        'roles'=>$this->mroles->obtener($idrol)
    );
    //$roles=$this->mroles->obtener($idRol);
    $this->load->view('layouts/header');
    $this->load->view('layouts/aside',$data);
    $this->load->view('admin/cliente/vedit', $data);
    $this->load->view('layouts/footer');
}

public function cupdate(){

     $idcliente = $this->input->post('txtidcliente');
     $nombre = $this->input->post('txtnombre');
     $cuitold = $this->input->post('txtcuitold'); 
     $cuit = $this->input->post('txtcuitnew');
     $prov = $this->input->post('txtprovincia');
     $domicilio = $this->input->post('txtdomicilio');

     $cli = $this->mcliente->obtenerclientedni($cuit);

     if(($cli==null) or ($cuitold==$cuit)){

               $data = array(

                   'Nombre' => $nombre,
                   'DniCuit' => $cuit,
                   'Provincia' => $prov,
                   'Domicilio' => $domicilio
               );

                  $res = $this->mcliente->mupdatecliente($idcliente, $data);
                  if($res){
                      $this->session->set_flashdata('correcto', 'Se Guardo Correctamente');
                      redirect(base_url().'mantenimiento/ccliente');
                  }else {
                      $this->session->set_flashdata('error', 'No se pudo actualizar la cliente');
                      redirect(base_url().'mantenimiento/ccliente/cedit/'.$idcliente);
                  }
     }else{
       //REGLA DE VALIDACION
       $this->session->set_flashdata('error', 'Este Dni/Cuit ya esta registrado ');
       redirect(base_url().'mantenimiento/ccliente/cadd');
     }


}

public function cdelete($id){

    $data=array(
        'Anulado' => '1'
    );
    $this->mequipos->mupdateequipos($id, $data);
    //redirect(base_url().'mantenimiento/ccliente');
    echo "mantenimiento/cequipos";
}


}
?>