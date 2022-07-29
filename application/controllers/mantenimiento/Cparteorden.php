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

  log_message('error',sprintf(" llega a cadd"));
  log_message('error',sprintf(" id que lelga es $id"));


  if(strpos($id, '_') !== false){
    //log_message('error',sprintf(" contiene _"));
    $id= str_replace('_', ';',$id);
    list($dni, $idOrden) = explode(';', $id);

    $this->mparteorden->mdeletetecnicoParteOrden($dni);

    redirect(base_url().'mantenimiento/cparteorden/cadd/'.$idOrden);
  }else{
    $data = array(

        'ordenindex' => $this->morden->mselectinfoorden($id),
        'tipo_tecnico_select' => $this->mparteorden->tecnico_listar_select(),
        'tecnico_select' => $this->mparteorden->tecnico_parte()

    );

    $this->load->view('layouts/header');
    $this->load->view('layouts/aside');
    $this->load->view('admin/parteorden/vadd', $data);
    $this->load->view('layouts/footer');
  }

}


public function cinsert(){
     $idorden = $this->input->post('txtidorden');

     $tarea = $this->input->post('txttarea');

        $data = array(
            'TareaDesarrollada' => $tarea,
            'IdOrden' => $idorden

        );

        $id=$this->mparteorden->minsertparteorden($data);


        if($id){
            $this->session->set_flashdata('correcto', 'Se guardo Correctamente');
            redirect(base_url().'mantenimiento/cparteorden/listar/'.$idorden);
        }else{
            $this->session->set_flashdata('error', 'No se Guardo registro');
            redirect(base_url().'mantenimiento/cparteorden/cadd/'.$idorden);
        }

}


public function cedit($id){


  $var=substr($id, 0, 1);
  $id= str_replace('@', '',$id);
  $id= str_replace('_', '',$id);

        if ($var=='@') {
          $data = array(
              'materialedit' => $this->mparteorden->midupdatematerial($id),
          );
          $this->load->view('layouts/header');
          $this->load->view('layouts/aside');
          $this->load->view('admin/material/vedit', $data);
          $this->load->view('layouts/footer');
      }elseif($var=='_'){
        $mat = $this->mparteorden->obtenerMaterialconIdMat($id);
        $IdParte= $mat->IdParte;
        $this->mparteorden->mdeletematerial($id);
        redirect(base_url().'mantenimiento/cparteorden/cedit/'.$IdParte);
      }
      elseif(strpos($id, 'ref') !== false){
        $id= str_replace('ref', ';',$id);


        list($idParte, $dni) = explode(';', $id);


        $this->mparteorden->mdeletetecnicoOrden($idParte, $dni);
        redirect(base_url().'mantenimiento/cparteorden/cedit/'.$idParte);
      }
      else{

        $data = array(
            'parteordenedit' => $this->mparteorden->midupdateparteorden($id),
            'tipo_tecnico_select' => $this->mparteorden->tecnico_listar_select(),
            'tecnico_select' => $this->mparteorden->mselectTecnicoIdParte($id),
        );


        $idOrden=$data['parteordenedit']->IdOrden;
        $idParte=$data['parteordenedit']->IdParte;
        $data['material'] = $this->mparteorden->obtenerMaterial($idOrden,$idParte);

        $FechaInicio= $data['parteordenedit']->FechaInicio;
        $FechaFin= $data['parteordenedit']->FechaFin;

        $date1 = new DateTime("$FechaInicio");
        $date2 = new DateTime("$FechaFin");

        $interval = date_diff($date1, $date2);
        $hora =$interval->format(' %H :%I : %S ');
        $data['hora'] = $hora;

        $this->load->view('layouts/header');
        $this->load->view('layouts/aside');
        $this->load->view('admin/parteorden/vedit', $data);
        $this->load->view('layouts/footer');
      }


}

public function cupdate(){
    $idparte = $this->input->post('txtidParte');
    $idorden = $this->input->post('txtidorden');
    $tarea = $this->input->post('txttarea');



        $data = array(
            'TareaDesarrollada' => $tarea
        );
        $res = $this->mparteorden->mupdateparteorden($idparte, $idorden,$data);
        if($res){
            $this->session->set_flashdata('correcto', 'Se Guardo Correctamente');
            redirect(base_url().'mantenimiento/cparteorden/listar/'.$idorden);
        }else {
            $this->session->set_flashdata('error', 'No se pudo actualizar la parteorden');
            redirect(base_url().'mantenimiento/cparteorden/cedit'.$idparteorden);
        }

}

public function cdelete($IdParte ,$IdOrden){

    /*$orden = $this->mparteorden->mselectinfoparteorden($id);
    $idorden= $orden->idorden;
    $this->mparteorden->mupdateparteorden($id);
    redirect(base_url().'mantenimiento/cparteorden/listar/'.$idorden);*/


    $data=array(
        'Anulado' => '1'
    );
    $this->mparteorden->mupdateparteorden($IdParte ,$IdOrden,$data);
    redirect(base_url().'mantenimiento/cparteorden/listar/'.$IdOrden);
}



public function addMaterial(){
    $material = $this->input->post("material");
    $idParte = $this->input->post("idParte");
    $idOrden = $this->input->post("idOrden");
    $cant = $this->input->post("cant");


    $data = array(
        'Cantidad' => $cant,
        'Descripcion' =>  $material,
        'IdOrden' => $idOrden,
        'IdParte' => $idParte
    );
    $ale=$data['Cantidad'];

    $res=$this->mparteorden->cargarMat($data);



    $a=['linksa'=>$res];

    echo json_encode($a);
}



public function ceditMat($id){
    $data = array(
        'materialedit' => $this->mparteorden->midupdatematerial($id),
    );

    $this->load->view('layouts/header');
    $this->load->view('layouts/aside');
    $this->load->view('admin/material/vedit', $data);
    $this->load->view('layouts/footer');
}

public function cdeleteMat($id){

    $mat = $this->mparteorden->obtenerMaterialconIdMat($id);

    $IdParte= $mat->IdParte;

    $this->mparteorden->mdeletematerial($id);
    redirect(base_url().'mantenimiento/cparteorden/cedit/'.$IdParte);
}

public function cupdateMat(){

  $descripcion = $this->input->post('txtdescripcion');
  $cantidad = $this->input->post('txtcantidad');
  $id = $this->input->post('txtid');
  $mat = $this->mparteorden->obtenerMaterialconIdMat($id);


  $IdParte= $mat->IdParte;

      $data = array(
          'Descripcion' => $descripcion,
          'Cantidad' => $cantidad
      );


      $res = $this->mparteorden->mupdatematerial($id, $data);
      if($res){
          $this->session->set_flashdata('correcto', 'Se Guardo Correctamente');
          redirect(base_url().'mantenimiento/cparteorden/cedit/'.$IdParte);
      }else {
          $this->session->set_flashdata('error', 'No se pudo actualizar la parteorden');
          redirect(base_url().'mantenimiento/cparteorden/cedit'.$IdParte);
      }
}

public function addTecnicoOrden(){
    $tecnico = $this->input->post("tecnico");
    $idParte = $this->input->post("idParte");
    $data = array(
        'Dni' => $tecnico,
        'IdParte' => $idParte
    );

    $this->mparteorden->cargarTecnicoOrden($data);
    $Nombre=$this->mparteorden->nombreTecnico($tecnico);


    $a=['linksa'=>$Nombre];

    echo json_encode($a);
}



public function ceditTecnico($tecnico,$idParte){

  $this->mparteorden->mdeletetecnicoOrden($idParte, $tecnico);
  redirect(base_url().'mantenimiento/cparteorden/cedit/'.$idParte);
}







}
?>
