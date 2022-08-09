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

    $this->load->view('layouts/header');
    $this->load->view('layouts/aside');
    $this->load->view('admin/tecnico/vadd');
    $this->load->view('layouts/footer');
}


public function cinsert(){

     $nombre = $this->input->post('txtnombre');
     $dni = $this->input->post('txtdni');
     $telefono = $this->input->post('txttelefono');

     $res=$this->mtecnico->midupdatetecnico($dni);

     if($res==null){
               $data = array(
                   'Nombre' => $nombre,
                   'Dni' => $dni,
                   'Telefono' => $telefono,
                   'Activo' => '1'
               );
               $res=$this->mtecnico->minserttecnico($data);
               if($res){
                   $this->session->set_flashdata('correcto', 'Se guardo Correctamente');
                   redirect(base_url().'mantenimiento/ctecnico');
               }else{
                   $this->session->set_flashdata('error', 'No se Guardo registro');
                   redirect(base_url().'mantenimiento/ctecnico/cadd');
               }

     }else{

        //REGLA DE VALIDACION
        $this->session->set_flashdata('error', 'Este Dni ya esta registrado');
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

  $res=$this->mtecnico->midupdatetecnico($dni);

     if($res==null){
        $data = array(
            'Nombre' => $nombre,
            'Dni' => $id,
            'Telefono' => $telefono
        );
              $res = $this->mtecnico->mupdatetecnico($id, $data);
              if($res){
                  $this->session->set_flashdata('correcto', 'Se Guardo Correctamente');
                  redirect(base_url().'mantenimiento/ctecnico');
              }else {
                  $this->session->set_flashdata('error', 'No se pudo actualizar el tecnico');
                  redirect(base_url().'mantenimiento/ctecnico/cedit/'.$id);
              }

     }else{

        //REGLA DE VALIDACION
        $this->session->set_flashdata('error', 'Este Dni ya esta registrado');
        redirect(base_url().'mantenimiento/ctecnico/cadd');
     }

            







}

public function cdelete($id){

    $data=array(
        'Activo' => '0'
    );
    $this->mtecnico->mupdatetecnico($id, $data);
    //redirect(base_url().'mantenimiento/ctecnico');
    echo "mantenimiento/ctecnico";
}


}
?>
