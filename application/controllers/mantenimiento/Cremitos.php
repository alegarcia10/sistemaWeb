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
        $id=100;
        $remito->montoTotal= $id;
         //$remito->Gastos=$this->mremito->consultaGatosremito($id);
    }




    //die;

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
            redirect(base_url().'mantenimiento/cremito');
        }else{
            $this->session->set_flashdata('error', 'No se Guardo registro');
            redirect(base_url().'mantenimiento/cremito/cadd');
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
    
    //$roles=$this->mroles->obtener($idRol);
    $this->load->view('layouts/header');
    $this->load->view('layouts/aside',$data);
    $this->load->view('admin/remito/vedit', $data);
    $this->load->view('layouts/footer');
}

public function cupdate(){
      $tarea = $this->input->post('txttarea');
      $obs = $this->input->post('txtobser');
      $precio = $this->input->post('txtprecio');
      $cliente = mb_strtoupper($this->input->post("cliente"));
      $id = $this->input->post('txtIdRemito');
      $check = $this->input->post('habilitado');

      if($check=='on'){
        $completa=1;
      }else{
        $completa=0;
      }

     $data = array(

       'Precio' => $precio,
       'TareaDesarrollar' => $tarea,
       'IdCliente' => $cliente,
       'Completada' => $completa,
       'observaciones' => $obs

     );

        $res = $this->mremito->mupdateremito($id, $data);
        if($res){
            $this->session->set_flashdata('correcto', 'Se Guardo Correctamente');
            redirect(base_url().'mantenimiento/cremito');
        }else {
            $this->session->set_flashdata('error', 'No se pudo actualizar la remito');
            redirect(base_url().'mantenimiento/cremito/cedit'.$id);
        }


}

public function cupdatefact(){

    $fpago = $this->input->post('txtfechaPago');
    $ffact = $this->input->post('txtfechaFactura');
    $nfact = $this->input->post('txtnumFactura');
    $id = $this->input->post('txtid');
    $estado = $this->input->post('txtpago');
    $IdRemito= $this->input->post('txtIdRemito');

    if($fpago==null){
        $fpago=null;
    }
    else{
        $fpago =date("Y/m/d", strtotime($this->input->post('txtfechaPago')));
    }

    if($ffact==null){
        $ffact=null;
    }
    else{
        $ffact =date("Y/m/d", strtotime($this->input->post('txtfechaFactura')));
    }
    
  
    $res=$this->mfactura->midupdatefact($nfact);
    $fac=$this->mfactura->mbuscaremitofactura($IdRemito);
    if(($fac==null) or ($fac!=$id)){
       if(($res==null) or ($nfact==$id)){
          
          $data = array(
              'N_factura' => $nfact,
              'fecha_factura' => $ffact,
              'fecha_pago' => $fpago,
              'estado_pago' => $estado,
              'id_remito' =>$IdRemito
          );
          if($res==null && ($fac==null)){
                $res = $this->mfactura->minsertfactura($data);
          }else{
                $res = $this->mfactura->mupdatefact($id, $data);
          }
                if($res){
                    $this->session->set_flashdata('correcto', 'Se Guardo Correctamente');
                    redirect(base_url().'mantenimiento/cremito');
                }else {
                    $this->session->set_flashdata('error', 'No se pudo actualizar la factura');
                    redirect(base_url().'mantenimiento/cremito/cedit/'.$IdRemito);
                }
  
       }else{
  
          //REGLA DE VALIDACION
          $this->session->set_flashdata('error', 'N° de Factura registrado');
          redirect(base_url().'mantenimiento/cremito/cedit/'.$IdRemito);
       }
    }else{
        $this->session->set_flashdata('error', 'La remito ' .$IdRemito. ' tiene factura asociada');
        redirect(base_url().'mantenimiento/cremito/cedit/'.$IdRemito);
      
    }
}
  

public function cdelete($id){

    $data=array(
        'Eliminada' => '1'
    );
    $this->mremito->mupdateremito($id, $data);
    //redirect(base_url().'mantenimiento/cremito');
    echo "mantenimiento/cremito";
}

public function ccompleta($id){

    $data=array(
        'Completada' => '1'
    );
    $this->mremito->mupdateremito($id, $data);
    //redirect(base_url().'mantenimiento/cremito');
    echo "mantenimiento/cremito";
}

public function cdescompleta($id){

    $data=array(
        'Completada' => '0'
    );
    $this->mremito->mupdateremito($id, $data);
    //redirect(base_url().'mantenimiento/cremito');
    echo "mantenimiento/cremito";
}





}
?>
