<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//use systen\libraries\Pagination;

class Corden extends CI_Controller {
    function __construct(){
    parent:: __construct();
    if(!$this->session->userdata('login')){
        redirect(base_url());
    }
    $this->load->model('morden');
    $this->load->model('mcombo');
    }


public function index(){
       // $model=new \application\models\Morden();
       
    $data = array (
        'ordenindex' => $this->morden->mselectorden(), 
        //'ordenindex' => $model->paginate(10), 'pager' => $model -> pager,
        'ordencompletas' => $this->morden->mselectordencompletas(),
    );



    $this->load->view('layouts/header');
    $this->load->view('layouts/aside');
    $this->load->view('admin/orden/vlist', $data);
    $this->load->view('layouts/footer');
}


public function cadd(){
    $data = array (
        'tipoDocumentocombo' => $this->mcombo->mcombotablaorden('orden'),

    );

    $data['tipo_cliente_select'] = $this->morden->cliente_listar_select();



    $this->load->view('layouts/header');
    $this->load->view('layouts/aside');
    $this->load->view('admin/orden/vadd', $data);
    $this->load->view('layouts/footer');
}


public function cinsert(){

     $tarea = $this->input->post('txttarea');
     $fecha = $this->input->post('txtfecha');
     $id_cliente=$this->input->post("tipo_cliente");

    //REGLA DE VALIDACION
        $data = array(
            'FechaRecepcion' => $fecha,
            'TareaDesarrollar' => $tarea,
            'IdCliente' => $id_cliente,
            'Completada' => '0',
            'Eliminada' => '1'
        );
        $res=$this->morden->minsertorden($data);
        if($res){
            $this->session->set_flashdata('correcto', 'Se guardo Correctamente');
            redirect(base_url().'mantenimiento/corden');
        }else{
            $this->session->set_flashdata('error', 'No se Guardo registro');
            redirect(base_url().'mantenimiento/corden/cadd');
        }


}


public function cedit($id){
    $data = array(
        'ordenedit' => $this->morden->midupdateorden($id),
    );
    $data['cliente_select'] = $this->morden->cliente_listar_select2();
    $data['model'] = $this->morden->obtener($data['ordenedit']->IdCliente);

    $this->load->view('layouts/header');
    $this->load->view('layouts/aside');
    $this->load->view('admin/orden/vedit', $data);
    $this->load->view('layouts/footer');
}

public function cupdate(){

      $id = $this->input->post('txtidorden');
      $tarea = $this->input->post('txttarea');
      $fecha = $this->input->post('txtfecha');
      $cliente = mb_strtoupper($this->input->post("cliente"));

     $data = array(

       'FechaRecepcion' => $fecha,
       'TareaDesarrollar' => $tarea,
       'IdCliente' => $cliente
       //'Completada' => '0',
       //'Eliminada' => '1'
     );

        $res = $this->morden->mupdateorden($id, $data);
        if($res){
            $this->session->set_flashdata('correcto', 'Se Guardo Correctamente');
            redirect(base_url().'mantenimiento/corden');
        }else {
            $this->session->set_flashdata('error', 'No se pudo actualizar la orden');
            redirect(base_url().'mantenimiento/corden/cedit'.$idorden);
        }


}

public function cdelete($id){

    $data=array(
        'Eliminada' => '10'
    );
    $this->morden->mupdateorden($id, $data);
    redirect(base_url().'mantenimiento/corden');
}


}
?>
