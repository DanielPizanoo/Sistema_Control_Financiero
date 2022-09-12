<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class proveedores_csv extends CI_Controller {
 
 public function __construct()
 {
  parent::__construct();
  $this->load->model('proveedores_csv_model');
 }

 function index()
 {
  $data['rproveedores'] = $this->proveedores_csv_model->fetch_data();
  $this->load->view('rproveedores', $data);
 }

 function export()
 {
  $file_name = 'proveedores_details_on_'.date('Ymd').'.csv'; 
     header("Content-Description: File Transfer"); 
     header("Content-Disposition: attachment; filename=$file_name"); 
     header("Content-Type: application/csv;");
   
     // get data 
     $rproveedores = $this->proveedores_csv_model->fetch_data();

     // file creation 
     $file = fopen('php://output', 'w');
 
     $header = array("Clave", "RazonSocial", "RFC", "Pais", "Estado", "Ciudad", "Domicilio", "CodigoPostal", "Telefono", "Celular", "Email"); 
     fputcsv($file, $header);
     foreach ($rproveedores->result_array() as $key => $value)
     { 
       fputcsv($file, $value); 
     }
     fclose($file); 
     exit; 
 }
 
  
}
