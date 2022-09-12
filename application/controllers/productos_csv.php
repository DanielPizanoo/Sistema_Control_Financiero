<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class productos_csv extends CI_Controller {
 
 public function __construct()
 {
  parent::__construct();
  $this->load->model('productos_csv_model');
 }

 function index()
 {
  $data['rproductos'] = $this->productos_csv_model->fetch_data();
  $this->load->view('rproductos', $data);
 }

 function export()
 {
  $file_name = 'productos_details_on_'.date('Ymd').'.csv'; 
     header("Content-Description: File Transfer"); 
     header("Content-Disposition: attachment; filename=$file_name"); 
     header("Content-Type: application/csv;");
   
     // get data 
     $rproductos = $this->productos_csv_model->fetch_data();

     // file creation 
     $file = fopen('php://output', 'w');
 
     $header = array("Clave", "Nombre", "TipoProducto", "Proveedor", "UnidadMedida", "Precio"); 
     fputcsv($file, $header);
     foreach ($rproductos->result_array() as $key => $value)
     { 
       fputcsv($file, $value); 
     }
     fclose($file); 
     exit; 
 }
 
  
}
