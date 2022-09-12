<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller {
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
		$this->load->view('login');
		$this->load->view('footer-open');
		$this->load->view('footer-close');
    }

    public function validate()
    {
        $user=$this->input->post('usuario');
        $pass=$this->input->post('pass');

        $this->load->model('Login_m');
        $credentials=$this->Login_m->validate_credentials($user,SHA1($pass));


        $this->load->model('Login_m');
        $credentials=$this->Login_m->validate_credentials($user,SHA1($pass));

        // Se valida si la variable $credentials tiene datos, es decir si los datos proporcionados son correctos
        if (!empty($credentials))
        {
            // Establece las variables de sesión
            $usrinfo = array(
                'user'      => $credentials[0]->id_usuario,
                'username'  => $credentials[0]->clave,
                'name'      => $credentials[0]->nombre,
                'usertype'  => $credentials[0]->id_tipo_usuario,
                'siembra'   => 1
            );
            $this->session->set_userdata($usrinfo);

            // Valida si el usuario es administrador
            if (in_array($credentials[0]->id_tipo_usuario, [1,2]))
            {
                redirect('Dashboard');
            }
        }

        // Si los datos proporcionados no coinciden, se redirige a la pagina de login
        redirect('Login');
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('Login');
    }

	/*public function upload()
	{
            $config['upload_path']          = './public/csv/';
            $config['allowed_types']        = 'csv|txt|TXT';
            $config['max_size']             = 0;
            $config['max_width']            = 0;
            $config['max_height']           = 0;
            $config['file_name']           = 'datos.csv';
            $config['overwrite']           = TRUE;
            $this->load->library('upload', $config);
            if ( ! $this->upload->do_upload('userfile'))
            {
                $error = array('error' => $this->upload->display_errors());
                print_r($error);
                //$this->load->view('upload_form', $error);
            }
            else
            {
                $data = array('upload_data' => $this->upload->data());
                $ruta='public/csv/'.$data['upload_data']['file_name'];
                redirect("Main?ruta=".$ruta);
                //var_dump($data);
            }
    }*/
}