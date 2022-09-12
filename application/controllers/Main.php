<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

    function __construct() 
    { 
        parent::__construct(); 
        $this->load->model('Login_m'); 

        // $this->load->library('form_validation'); 

        $this->load->helper('string'); 
    } 

	public function index()
	{
		$this->load->view('header');
		$this->load->view('Chart_view');
		$this->load->view('footer');
    }
    //base_url('public/csv/datos.csv')
    public function csvtojson()
    {
        $file=base_url('public/csv/datos.csv');
        $csv= file_get_contents($file);
        $datos = array_map("str_getcsv", explode("\n", $csv));

        array_pop($datos);
        //var_dump($datos);

        $response->cols[] = array(
            "id"        =>  "", 
            "label"     =>  "Tiempo", 
            "pattern"   =>  "", 
            "type"      =>  "string" 
        );

        $response->cols[] = array( 
            "id"        =>  "", 
            "label"     =>  "Oxígeno Disuelto", 
            "pattern"   =>  "", 
            "type"      =>  "number" 
        );

        $response->cols[] = array( 
            "id"        =>  "", 
            "label"     =>  "pH", 
            "pattern"   =>  "", 
            "type"      =>  "number" 
        ); 

        $response->cols[] = array( 
            "id"        =>  "", 
            "label"     =>  "Salinidad", 
            "pattern"   =>  "", 
            "type"      =>  "number" 
        ); 

        $response->cols[] = array( 
            "id"        =>  "", 
            "label"     =>  "Temperatura", 
            "pattern"   =>  "", 
            "type"      =>  "number" 
        ); 

        foreach ($datos as $d)
        {
            $response->rows[]["c"] = array(
                array(
                    "v" => $d[0],
                    "f" => null
                ),
                array(
                    "v" => $d[1],
                    "f" => null
                ),
                array(
                    "v" => $d[2],
                    "f" => null
                ),
                array(
                    "v" => $d[3],
                    "f" => null
                ),
                array(
                    "v" => $d[4],
                    "f" => null
                )
            );
        }

        echo json_encode($response); 

    }

    public function od_data()
    {
        $file=base_url('public/csv/datos.csv');
        $csv= file_get_contents($file);
        $datos = array_map("str_getcsv", explode("\n", $csv));

        array_pop($datos);
        //var_dump($datos);

        $response->cols[] = array(
            "id"        =>  "", 
            "label"     =>  "Tiempo", 
            "pattern"   =>  "", 
            "type"      =>  "string" 
        );

        $response->cols[] = array( 
            "id"        =>  "", 
            "label"     =>  "Oxígeno Disuelto", 
            "pattern"   =>  "", 
            "type"      =>  "number" 
        );

        foreach ($datos as $d)
        {
            $response->rows[]["c"] = array(
                array(
                    "v" => $d[0],
                    "f" => null
                ),
                array(
                    "v" => $d[1],
                    "f" => null
                )
            );
        }

        echo json_encode($response); 

    }

    public function ph_data()
    {
        $file=base_url('public/csv/datos.csv');
        $csv= file_get_contents($file);
        $datos = array_map("str_getcsv", explode("\n", $csv));

        array_pop($datos);
        //var_dump($datos);

        $response->cols[] = array(
            "id"        =>  "", 
            "label"     =>  "Tiempo", 
            "pattern"   =>  "", 
            "type"      =>  "string" 
        );

        $response->cols[] = array( 
            "id"        =>  "", 
            "label"     =>  "pH", 
            "pattern"   =>  "", 
            "type"      =>  "number" 
        );

        foreach ($datos as $d)
        {
            $response->rows[]["c"] = array(
                array(
                    "v" => $d[0],
                    "f" => null
                ),
                array(
                    "v" => $d[2],
                    "f" => null
                )
            );
        }

        echo json_encode($response); 

    }

    public function sal_data()
    {
        $file=base_url('public/csv/datos.csv');
        $csv= file_get_contents($file);
        $datos = array_map("str_getcsv", explode("\n", $csv));

        array_pop($datos);
        //var_dump($datos);

        $response->cols[] = array(
            "id"        =>  "", 
            "label"     =>  "Tiempo", 
            "pattern"   =>  "", 
            "type"      =>  "string" 
        );

        $response->cols[] = array( 
            "id"        =>  "", 
            "label"     =>  "Salinidad", 
            "pattern"   =>  "", 
            "type"      =>  "number" 
        );

        foreach ($datos as $d)
        {
            $response->rows[]["c"] = array(
                array(
                    "v" => $d[0],
                    "f" => null
                ),
                array(
                    "v" => $d[3],
                    "f" => null
                )
            );
        }

        echo json_encode($response); 

    }

    public function temp_data()
    {
        $file=base_url('public/csv/datos.csv');
        $csv= file_get_contents($file);
        $datos = array_map("str_getcsv", explode("\n", $csv));

        array_pop($datos);
        //var_dump($datos);

        $response->cols[] = array(
            "id"        =>  "", 
            "label"     =>  "Tiempo", 
            "pattern"   =>  "", 
            "type"      =>  "string" 
        );

        $response->cols[] = array( 
            "id"        =>  "", 
            "label"     =>  "Temperatura", 
            "pattern"   =>  "", 
            "type"      =>  "number" 
        );

        foreach ($datos as $d)
        {
            $response->rows[]["c"] = array(
                array(
                    "v" => $d[0],
                    "f" => null
                ),
                array(
                    "v" => $d[4],
                    "f" => null
                )
            );
        }

        echo json_encode($response); 

    }

    /*public function getdata()
    {
        { 
            $data = $this->Login_m->get_all_fruits(); 
     
            //         //data to json 
     
            $responce->cols[] = array( 
                "id" => "", 
                "label" => "Topping", 
                "pattern" => "", 
                "type" => "string" 
            ); 
            $responce->cols[] = array( 
                "id" => "", 
                "label" => "Total", 
                "pattern" => "", 
                "type" => "number" 
            ); 
            foreach($data as $cd) 
                { 
                $responce->rows[]["c"] = array( 
                    array( 
                        "v" => "$cd->fruits_name", 
                        "f" => null 
                    ) , 
                    array( 
                        "v" => (int)$cd->quantity, 
                        "f" => null 
                    ) 
                ); 
                } 
     
            echo json_encode($responce); 
            } 
    }*/
}