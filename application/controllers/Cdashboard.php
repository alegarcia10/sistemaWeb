<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Cdashboard extends CI_Controller {
    function __construct(){
    parent:: __construct();
	if(!$this->session->userdata('login')){
        redirect(base_url());
    }
    $this->load->model('musuario');
    }


    public function index()
	{
		//$idRol=$data['usuario']->IdRol;
        //$data['rolesindex'] = $this->musuario->obtener($idRol);


		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/dashboard');
		$this->load->view('layouts/footer');
	}


}