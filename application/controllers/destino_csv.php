<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class destino_csv extends CI_Controller {
 
 public function __construct()
 {
  parent::__construct();
  $this->load->model('destino_csv_model');
 }

 function index()
 {
  $data['rdestinos'] = $this->destino_csv_model->fetch_data();
  $this->load->view('rdestino', $data);
 }

 function export()
 {
  $file_name = 'destino_details_on_'.date('Ymd').'.csv'; 
     header("Content-Description: File Transfer"); 
     header("Content-Disposition: attachment; filename=$file_name"); 
     header("Content-Type: application/csv;");
   
     // get data 
     $rdestinos = $this->destino_csv_model->fetch_data();

     // file creation 
     $file = fopen('php://output', 'w');
 
     $header = array("Clave", "Description"); 
     fputcsv($file, $header);
     foreach ($rdestinos->result_array() as $key => $value)
     { 
       fputcsv($file, $value); 
     }
     fclose($file); 
     exit; 
 }
 
  
}
