<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ctecnico extends CI_Controller {
    function __construct(){
    parent:: __construct();
    if(!$this->session->userdata('login')){
        redirect(base_url());
    }
    $this->load->model('mtecnico');
    $this->load->model('mcombo');
    }


public function index(){
    $data = array (
        'tecnicoindex' => $this->mtecnico->mselecttecnico(),
    );

    $this->load->view('layouts/header');
    $this->load->view('layouts/aside');
    $this->load->view('admin/tecnico/vlist', $data);
    $this->load->view('layouts/footer');
}


public function cadd(){
    $data = array (
        'tipoDocumentocombo' => $this->mcombo->mcombotabla('tecnico'),

    );
    $this->load->view('layouts/header');
    $this->load->view('layouts/aside');
    $this->load->view('admin/tecnico/vadd', $data);
    $this->load->view('layouts/footer');
}


public function cinsert(){

     $nombre = $this->input->post('txtnombre');
     $dni = $this->input->post('txtdni');
     $telefono = $this->input->post('txttelefono');


    //REGLA DE VALIDACION
        $data = array(
            'Nombre' => $nombre,
            'Dni' => $dni,
            'Telefono' => $telefono,
            'estado' => '1'
        );
        $res=$this->mtecnico->minserttecnico($data);
        if($res){
            $this->session->set_flashdata('correcto', 'Se guardo Correctamente');
            redirect(base_url().'mantenimiento/ctecnico');
        }else{
            $this->session->set_flashdata('error', 'No se Guardo registro');
            redirect(base_url().'mantenimiento/ctecnico/cadd');
        }


}


public function cedit($id){
    $data = array(
        'tecnicoedit' => $this->mtecnico->midupdatetecnico($id),
    );

    $this->load->view('layouts/header');
    $this->load->view('layouts/aside');
    $this->load->view('admin/tecnico/vedit', $data);
    $this->load->view('layouts/footer');
}

public function cupdate(){

  $nombre = $this->input->post('txtnombre');
  $dni = $this->input->post('txtdni');
  $id = $this->input->post('txtid');
  $telefono = $this->input->post('txttelefono');


  $data = array(
      'Nombre' => $nombre,
      'Dni' => $dni,
      'Telefono' => $telefono
  );



        $res = $this->mtecnico->mupdatetecnico($id, $data);
        if($res){
            $this->session->set_flashdata('correcto', 'Se Guardo Correctamente');
            redirect(base_url().'mantenimiento/ctecnico');
        }else {
            $this->session->set_flashdata('error', 'No se pudo actualizar el tecnico');
            redirect(base_url().'mantenimiento/ctecnico/cedit'.$idtecnico);
        }


}

public function cdelete($id){

    $data=array(
        'estado' => '10'
    );
    $this->mtecnico->mupdatetecnico($id, $data);
    redirect(base_url().'mantenimiento/ctecnico');
}


}
?>
