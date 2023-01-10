<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Clogin extends CI_Controller {
    function __construct(){
    parent:: __construct();
    $this->load->model('musuario');
    }


public function index(){
    
    $this->load->view('admin/login');
    
}

public function clogeo(){
    $txtnombre = $this->input->post('txtnombre');
    $txtpass = $this->input->post('txtpass');
    $res = $this->musuario->logeo($txtnombre,$txtpass);

    //var_dump($res);
    
    if(!$res){
        $this->session->set_flashdata('error', 'El Usuario y/o Contraseña son Incorrectas');
        redirect(base_url());
    }else{
        $data= array(
            'idUsuario' => $res->idUsuario,
            'nombre' => $res->nombre,
            'idRol' => $res->idRol,
            'login' => TRUE
        );
        echo $this->session->set_userdata($data);
        redirect(base_url().'cdashboard',$data);
    }
}

public function clogout (){
    $this->session->sess_destroy();
    redirect(base_url());
}

}
