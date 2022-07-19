<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Cparteorden extends CI_Controller {
    function __construct(){
    parent:: __construct();
    if(!$this->session->userdata('login')){
        redirect(base_url());
    }
    $this->load->model('mparteorden');
    $this->load->model('morden');
    $this->load->model('mcombo');
    }


public function listar($id){

    $data = array (
        'parteordenindex' => $this->mparteorden->mselectparteorden($id),
        'ordenindex' => $this->mparteorden->mselectinfoparteorden($id)
    );
    $this->load->view('layouts/header');
    $this->load->view('layouts/aside');
    $this->load->view('admin/parteorden/vlist', $data);
    $this->load->view('layouts/footer');
}


public function cadd($id){

    $data = array(
        'orden' => $this->mcombo->mcombotabla('orden'),
        'ordenindex' => $this->morden->mselectinfoorden($id),
    );

    $this->load->view('layouts/header');
    $this->load->view('layouts/aside');
    $this->load->view('admin/parteorden/vadd', $data);
    $this->load->view('layouts/footer');
}


public function cinsert(){
     $idorden = $this->input->post('txtidorden');
     $fecha = $this->input->post('txtfecha');
     $imc = $this->input->post('txtimc');
     $cuello = $this->input->post('txtcuello');
     $peso = $this->input->post('txtpeso');
     $pecho = $this->input->post('txtpecho');
     $brazo = $this->input->post('txtbrazo');
     $muneca = $this->input->post('txtmuneca');
     $cintura = $this->input->post('txtcintura');
     $cadera = $this->input->post('txtcadera');
     $abdomen = $this->input->post('txtabdomen');
     $muslo = $this->input->post('txtmuslo');
     $descripcion = $this->input->post('txtdescripcion');



        $data = array(
            'idorden' => $idorden,
            'fecha' => $fecha,
            'imc' => $imc,
            'cuello' => $cuello,
            'peso' => $peso,
            'pecho' => $pecho,
            'brazo' => $brazo,
            'muneca' => $muneca,
            'cintura' => $cintura,
            'cadera' => $cadera,
            'abdomen' => $abdomen,
            'muslo' => $muslo,
            'descripcion' => $descripcion,
            'estado' => 1

        );
        $this->mparteorden->ultimaConsulta($idorden,$fecha);
        $res=$this->mparteorden->minsertparteorden($data);
        if($res){
            $this->session->set_flashdata('correcto', 'Se guardo Correctamente');
            redirect(base_url().'mantenimiento/cparteorden/listar/'.$idorden);
        }else{
            $this->session->set_flashdata('error', 'No se Guardo registro');
            redirect(base_url().'mantenimiento/cparteorden/cadd');
        }


}


public function cedit($id){
    $data = array(
        'parteordenedit' => $this->mparteorden->midupdateparteorden($id),
    );

    $a =$this->mcombo->mcombotabla('orden');

    $this->load->view('layouts/header');
    $this->load->view('layouts/aside');
    $this->load->view('admin/parteorden/vedit', $data);
    $this->load->view('layouts/footer');
}

public function cupdate(){
    $idparteorden = $this->input->post('txtidparteorden');
    $idorden = $this->input->post('txtidorden');
    $fecha = $this->input->post('txtfecha');
    $imc = $this->input->post('txtimc');
    $cuello = $this->input->post('txtcuello');
    $peso = $this->input->post('txtpeso');
    $pecho = $this->input->post('txtpecho');
    $brazo = $this->input->post('txtbrazo');
    $muneca = $this->input->post('txtmuneca');
    $cintura = $this->input->post('txtcintura');
    $cadera = $this->input->post('txtcadera');
    $abdomen = $this->input->post('txtabdomen');
    $muslo = $this->input->post('txtmuslo');
    $descripcion = $this->input->post('txtdescripcion');


        $data = array(
            'idorden' => $idorden,
            'fecha' => $fecha,
            'imc' => $imc,
            'cuello' => $cuello,
            'peso' => $peso,
            'pecho' => $pecho,
            'brazo' => $brazo,
            'muneca' => $muneca,
            'cintura' => $cintura,
            'cadera' => $cadera,
            'abdomen' => $abdomen,
            'muslo' => $muslo,
            'descripcion' => $descripcion
        );
        $res = $this->mparteorden->mupdateparteorden($idparteorden, $data);
        if($res){
            $this->session->set_flashdata('correcto', 'Se Guardo Correctamente');
            redirect(base_url().'mantenimiento/cparteorden/listar/'.$idorden);
        }else {
            $this->session->set_flashdata('error', 'No se pudo actualizar la parteorden');
            redirect(base_url().'mantenimiento/cparteorden/cedit'.$idparteorden);
        }

}

public function cdelete($id){

    $orden = $this->mparteorden->mselectinfoparteorden($id);

    $idorden= $orden->idorden;

    $this->mparteorden->mupdateparteorden($id);
    redirect(base_url().'mantenimiento/cparteorden/listar/'.$idorden);
}


}
?>
