<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class categoriap_csv extends CI_Controller {
 
    public function __construct()
    {
      parent::__construct();
      $this->load->model('categoriap_csv_model');
    }

    function index()
    {
      $data['rcategorias'] = $this->categoriap_csv_model->fetch_data();
      $this->load->view('rcategoriap', $data);
    }

    function export()
    {
      $file_name = 'productos_details_on_'.date('Ymd').'.csv'; 
        header("Content-Description: File Transfer"); 
        header("Content-Disposition: attachment; filename=$file_name"); 
        header("Content-Type: application/csv;");
      
        // get data 
        $rcategorias = $this->categoriap_csv_model->fetch_data();

        // file creation 
        $file = fopen('php://output', 'w');
    
        $header = array("Clave", "Description"); 
        fputcsv($file, $header);
        foreach ($rcategorias->result_array() as $key => $value)
        { 
          fputcsv($file, $value); 
        }
        fclose($file); 
        exit; 
    }
 
  
}
?>
