<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Codigofacilito extends CI_Controller {

        function __construt(){
          parent::__construct();
          $this->load->helper('form');
        }
        function index(){
            $this->load->view('codigofacilito/headers');
          $this->load->view('codigofacilito/bienvenido');
        }
        function holamundo(){
          $this->load->view('codigofacilito/headers');
          $this->load->view('codigofacilito/bienvenido');
        }
         function nuevo(){
           $this->load->view('codigofacilito/headers');
           $this->load->view('codigofacilito/formulario');
         }
}
