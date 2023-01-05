<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Croles extends CI_Controller {
    function __construct(){
    parent:: __construct();
    if(!$this->session->userdata('login')){
        redirect(base_url());
    }
    $this->load->model('mroles');
    $this->load->model('mcombo');
    }


public function index(){
    $data = array (
        'rolesindex' => $this->mroles->mselectroles(),
    );
    $this->load->view('layouts/header');
    $this->load->view('layouts/aside');
    $this->load->view('admin/roles/vlist', $data);
    $this->load->view('layouts/footer');
}


public function cadd(){

    $data['tipo_usuario_select'] = $this->mroles->usuario_listar_select();

    $this->load->view('layouts/header');
    $this->load->view('layouts/aside');
    $this->load->view('admin/roles/vadd',$data);
    $this->load->view('layouts/footer');
}


public function cinsert(){

     $nombre_tipo = $this->input->post('rol');
     

     $rol = $this->mroles->obtenerroles($roles);

    if($rol==null){

        $data = array(

            'idRol' => $idRol,
            'nombre_tipo' => $nombre_tipo
        );
        $res=$this->mroles->minsertroles($data);
        if($res){
            $this->session->set_flashdata('correcto', 'Se guardo Correctamente');
            redirect(base_url().'mantenimiento/croles');
        }else{
            $this->session->set_flashdata('error', 'No se Guardo registro');
            redirect(base_url().'mantenimiento/croles/cadd');
        }

    }else{
        //REGLA DE VALIDACION
        $this->session->set_flashdata('error', "El Rol '$roles' ya está registrado ");
        redirect(base_url().'mantenimiento/croles/cadd');
    }

    

}


public function cedit($id){
    $data = array(
        'rolesedit' => $this->mroles->midupdateroles($id),
    );
    //$data['usuario_select'] = $this->musuario->usuario_listar_select2();
    $data['model'] = $this->mroles->obtener($data['rolesedit']->idRol);

    $this->load->view('layouts/header');
    $this->load->view('layouts/aside');
    $this->load->view('admin/roles/vedit', $data);
    $this->load->view('layouts/footer');
}

public function cupdate(){

    $idRol = $this->input->post('txtidrol');
    $nombre_tipo = $this->input->post('txtnombretipo');

     $rol = $this->mroles->obtenerroles($roles);

    if(($rol==null) or ($txtnombreviejo==$roles) ){

        $data = array(
            'idRol' => $idRol,
            'nombre_tipo' => $nombre_tipo
        );

        $res = $this->mrol->mupdateusuario($idRol, $data);
        if($res){
            $this->session->set_flashdata('correcto', 'Se Guardo Correctamente');
            redirect(base_url().'mantenimiento/croles');
        }else {
            $this->session->set_flashdata('error', 'No se pudo actualizar el rol');
            redirect(base_url().'mantenimiento/croles/cedit/'.$idRol);
        }

    }else{
        //REGLA DE VALIDACION
        $this->session->set_flashdata('error', "El Rol '$roles' ya está registrado ");
        redirect(base_url().'mantenimiento/croles/cedit/'.$idRol);
    }



        


}

public function cdelete($id){

    /*$data=array(
        'Anulado' => '1'
    );*/
    $this->mroles->mupdateroles($id);
    //redirect(base_url().'mantenimiento/cusuario');
    echo "mantenimiento/croles";
}


}