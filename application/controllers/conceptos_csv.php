<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class conceptos_csv extends CI_Controller {
 
 public function __construct()
 {
  parent::__construct();
  $this->load->model('conceptos_csv_model');
 }

 function index()
 {
  $data['rconceptos'] = $this->conceptos_csv_model->fetch_data();
  $this->load->view('rconceptos', $data);
 }

 function export()
 {
  $file_name = 'conceptos_details_on_'.date('Ymd').'.csv'; 
     header("Content-Description: File Transfer"); 
     header("Content-Disposition: attachment; filename=$file_name"); 
     header("Content-Type: application/csv;");
   
     // get data 
     $rconceptos = $this->conceptos_csv_model->fetch_data();

     // file creation 
     $file = fopen('php://output', 'w');
 
     $header = array("Clave", "Description"); 
     fputcsv($file, $header);
     foreach ($rconceptos->result_array() as $key => $value)
     { 
       fputcsv($file, $value); 
     }
     fclose($file); 
     exit; 
 }
 
  
}
