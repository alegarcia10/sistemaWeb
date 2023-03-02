<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ctrabajos extends CI_Controller {
    function __construct(){
    parent:: __construct();
    if(!$this->session->userdata('login')){
        redirect(base_url());
    }
    $this->load->model('morden');
    $this->load->model('mparteorden');
    $this->load->model('mroles');
    }



public function index(){
    $idrol = $this->session->userdata("idRol");
    $ordenes= $this->morden->mselectorden(); 
   
    
    foreach ($ordenes as $orden ) {
        $id=$orden->IdOrden;
        $porden=$this->morden->consultarEstado($id);
        $tecnicos = $this->mparteorden->mselectTecnicoIdParte($id);
        

        if($porden != null){
            $completa=$porden->Completa;
            $estado=$porden->Estado;

            $orden->Completa=$completa;
            $orden->Estado=$estado;

            }else{
               
                $orden->Completa='0';
                $orden->Estado='4';
            }

    }


    $data = array (
        'ordenindex' => $ordenes,
        'tecnico_select' => $tecnicos,
        'roles'=> $this->mroles->obtener($idrol)
    );


    
        $tecnicos = $data['tecnico_select'];
    
    $ordenes=  $data['ordenindex'];
    

    foreach ($ordenes as $orden ) {
         $id=$orden->IdOrden;
         $orden->Gastos=$this->morden->consultaGatosOrden($id);
         $orden->tecnicos = $this->mparteorden->mselectTecnicoId($id);
    }
    
  

    //$ordenesCompletas=  $data['ordencompletas'];



    /*foreach ($ordenesCompletas as $orden ) {
         $id=$orden->IdOrden;
         $orden->Gastos=$this->morden->consultaGatosOrden($id);
    }*/


    //die;

    $this->load->view('layouts/header');
    $this->load->view('layouts/aside',$data);
    $this->load->view('admin/estados_trabajo/vlist', $data);
    $this->load->view('layouts/footer');
}


public function indexFiltroColumnas(){
    $idrol = $this->session->userdata("idRol");
    $ordenes= $this->morden->mselectorden(); 
    
    foreach ($ordenes as $orden ) {
        $id=$orden->IdOrden;
        $porden=$this->morden->consultarEstado($id);

       
        if($porden != null){
            $completa=$porden->Completa;
            $estado=$porden->Estado;

            $orden->Completa=$completa;
            $orden->Estado=$estado;

            }else{
               
                $orden->Completa='0';
                $orden->Estado='4';
            }


   }
    $check_cliente = $this->input->post('cliente');
    $check_estado = $this->input->post('estado');
    /*$check_orden = $this->input->post('ordenes');
    $check_usu = $this->input->post('usu');
    $check_rol = $this->input->post('rol');*/

    if($check_cliente=='on'){
        $cliente=1;
      }else{
        $cliente=0;
      }
      if($check_estado=='on'){
        $estado=1;
      }else{
        $estado=0;
      }

    $data = array (
        'ordenindex' => $ordenes,
        'cliente' => $cliente,
        'estado' => $estado,
        'roles'=> $this->mroles->obtener($idrol)
    );
    //var_dump($data);

    $ordenes=  $data['ordenindex'];
  

    foreach ($ordenes as $orden ) {
         $id=$orden->IdOrden;
         $orden->Gastos=$this->morden->consultaGatosOrden($id);
    }


    //$ordenesCompletas=  $data['ordencompletas'];



    /*foreach ($ordenesCompletas as $orden ) {
         $id=$orden->IdOrden;
         $orden->Gastos=$this->morden->consultaGatosOrden($id);
    }*/


    //die;

    $this->load->view('layouts/header');
    $this->load->view('layouts/aside',$data);
    $this->load->view('admin/estados_trabajo/vlist', $data);
    $this->load->view('layouts/footer');
}




}
?>