<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	function __construct() 
    { 
        parent::__construct(); 
        $this->load->model('Dashboard_m'); 

        // $this->load->library('form_validation'); 

        $this->load->helper('string'); 
	}
	
	public function validate_session()
	{
		if (!$this->session->user)
		{
			redirect('Login/logout');
		}
	}

	public function index()
	{
		$this->validate_session();

		$this->load->model('Dashboard_m');
		$data=array(
			'siembras' => $this->Dashboard_m->get_siembras_activas(),
			'registro_eventos' => 	$this->Dashboard_m->get_all_registro_eventos()
		);

		$this->load->view('header');
		$this->load->view('navbar');
		$this->load->view('dashboard', $data);
		$this->load->view('footer-open');
		$this->load->view('footer-close');
	}
}