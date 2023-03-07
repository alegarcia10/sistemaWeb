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
        $band = false;
        $parteorden = $this->mparteorden->mselectparteorden($id);
        $orden->tecnicos="";
        if($parteorden != null){
            $tec="";
            $horasAcum='00 : 00 : 00';
           
            foreach($parteorden as $parte){
                
                $tecnicos = $this->mparteorden->mselectTecnicoId($parte->IdParte);
                
                    foreach($tecnicos as $tecnico){
                    
                    $nombre = $tecnico->Nombre;
                        if(strlen(strstr($tec, $nombre))>0){
                            
                        }
                        else{
                            
                            $tec=$tec."".$nombre." ";
                        }
                       
                        
                    }
                    
                   

                   /* $FechaInicio= $parte->FechaInicio;
                    $FechaFin= $parte->FechaFin;

                    $date1 = new DateTime("$FechaInicio");
                    $date2 = new DateTime("$FechaFin");

                    $interval = date_diff($date1, $date2);
                    $hora =$interval->format(' %H :%I : %S ');
                    
                    if($FechaInicio != null || $FechaFin != null){
                        $band = true;
                    //    var_dump($hora);

                    //var_dump($FechaInicio);
                    //var_dump($FechaFin);

                    $h1 = $this->mparteorden->explode_tiempo($hora);
                    $horasAcum = $horasAcum+$h1;
                    }
                    else{
                        //$band=false;
                        //var_dump("Entra al else");
                        $horasAcum = $horasAcum + 0;
                    }*/
                    


                    
                   
                    //$h2 = $this->mparteorden->explode_tiempo($hora2);

                    //echo segundos_hhmm($total_tiempo_segundos);

                    


                            
            } //recorre parte orden
        }else{

            $tec="No tiene técnicos";
            //$horasAcum="No tiene Horas acumuladas";

            }
        
        $orden->TEC=$tec;
       // if($band == true){
        //$orden->HH=$this->mparteorden->segundos_hhmm($horasAcum);
        //}



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

    $orden->Gastos=$this->morden->consultaGatosOrden($id);
    $orden->tecnicos = $this->mparteorden->mselectTecnicoId($id);

    $orden->Precio = (int)$orden->Precio;
    $orden->Gastos = (int)$orden->Gastos;

    $orden->Ganancia = $orden->Precio - $orden->Gastos;

    }



    $this->load->view('layouts/header');
    $this->load->view('layouts/aside');
    $this->load->view('admin/estados_trabajo/vlist');
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