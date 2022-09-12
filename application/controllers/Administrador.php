<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrador extends CI_Controller {
	function __construct() 
    { 
        parent::__construct(); 
        $this->load->model('Usuario_m'); 

        // $this->load->library('form_validation'); 

        $this->load->helper('string'); 
    }

	public function index()
	{
		$this->load->model('Usuario_m');
		$data=array(
			'mediciones'=>$this->Usuario_m->get_mediciones()
		);

		$this->load->view('header');
		$this->load->view('navbar');
		$this->load->view('dashboard', $data);
		$this->load->view('footer');
    }
}