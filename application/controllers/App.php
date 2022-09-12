<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App extends CI_Controller {

    function __construct() 
    { 
        parent::__construct(); 
        $this->load->model('App_m'); 

        // $this->load->library('form_validation'); 

        $this->load->helper('string'); 
    } 

    public function index()
    {
        redirect('App/insert_registro_evento');

    	$this->load->view('header');
		$this->load->view('login');
		$this->load->view('footer');
    }

    public function login()
    {
        $usu_clave = $this->input->post('usu_clave');
        $usu_pass = $this->input->post('usu_pass');

        $this->load->model('App_m');
        $data=$this->App_m->login($usu_clave,$usu_pass);

        $response = array();
        $response["success"] = false;

        foreach($data as $d)
        {
            $response["usu_id"] = $d->id_usuario;
            $response["usu_clave"] = $d->clave;
            $response["tipo"] = $d->id_tipo_usuario;

            $response["success"] = true;
        }

        echo json_encode($response);
    }

    public function siembras_actual()
    {
        $this->load->model('App_m');
        $data=$this->App_m->siembras_actuales();

        print json_encode($data);
    }

    public function obtener_productos()
    {
        $this->load->model('App_m');
        $data=$this->App_m->get_productos();

        print json_encode($data);
    }

    public function RegresarFecha()
    {
        $id_siembra = $this->input->post('id_siembra');

        $this->load->model('App_m');
        $data=$this->App_m->regresar_fecha($id_siembra);

        $response["dias"] = $data[0]->dias;

        echo json_encode($response);
    }

    public function insert_registro_evento()
    {
        $tipoevento = $this->input->post('tipoEvent');
        $json = $this->input->post('arrayevent');

        $data = json_decode($json, true);

        $this->load->model('App_m');

        $fecha=$data['Params']['fecha'];
        $siembra=$this->App_m->get_siembra_by_estanque($data['Params']['estanque']);
        $usuario=$data['Params']['id_usuario'];

        $this->App_m->insert_registroevento($fecha, $tipoevento, $siembra[0]->id_siembra, $usuario);

        // Obtiene el id del registro_evento que se acaba de insertar
        $registro_evento_id = $this->App_m->get_last_id();
        $id = $registro_evento_id[0]->id;


        switch ($tipoevento)
        {
            case 1: insert_muestreo($id,$data);
                break;
            case 2: insert_muestreo($id,$data);
                break;
            case 3: insert_accion($id,$data);
                break;
            case 4: insert_accion($id,$data);
                break;
            case 5: insert_observacion($id,$data);
                break;
            case 6: insert_aplicacion_producto($id,$data);
                break;
            case 7: insert_aplicacion_producto($id,$data);
                break;
            case 8: insert_aplicacion_producto($id,$data);
                break;
            case 9: insert_aplicacion_producto($id,$data);
                break;
        }
    }

    public function insert_muestreo($id,$data)
    {
        $bandera = 0;
        $contador = 1;
        foreach($data['Params'] as $emp)
        {

        }
    }



    public function validate_user ()
    {
        $user=$this->input->post('usu_clave');
        $pass=$this->input->post('usu_pass');

        $this->load->model('App_m');
        $credentials=$this->App_m->validate_credentials($user,SHA1($pass));
    }
}