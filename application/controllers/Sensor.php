<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sensor extends CI_Controller {
	function __construct() 
    { 
        parent::__construct(); 
        $this->load->model('Sensor_m'); 

        // $this->load->library('form_validation'); 

        $this->load->helper('string'); 
    }

	public function index()
	{
		$this->load->model('Sensor_m');

		$this->load->view('header');
		$this->load->view('navbar');
		$this->load->view('notificacion/main');
		$this->load->view('footer');
	}

	public function notificacion($id_medicion)
	{
		$this->load->model('Sensor_m');

		// Comprueba si existe una anomalia en los valores registrados
		$anomalia=$this->Sensor_m->comprobar_anomalia($id_medicion);
		if (!empty($anomalia))
		{
			$mensaje='¡ALERTA!'."\n".'Fecha: '.$anomalia[0]->fecha."\n".'Hora: '.$anomalia[0]->hora."\n"."\n".'Se han detectado anomalias: '."\n";
			foreach($anomalia as $a)
			{
				$mensaje = $mensaje.$a->nombre_parametro.': '.$a->valor."\n";
			}

			// Obtiene los números para emitir la alerta
			$numeros=$this->Sensor_m->get_alerta_numeros();

			foreach($numeros as $n)
			{
				$this->Sensor_m->insert_alerta_medicion($n->id_alerta,$id_medicion,$mensaje);
			}
		}

		// Llama a la función para que envie el SMS con la alerta
		$alertas=$this->Sensor_m->get_alerta_no_emitida();
		foreach($alertas as $a)
		{
			$estatus = $this->send_sms($a->celular, $a->mensaje);
			if ($estatus == 'ENVIADA'){
				$this->Sensor_m->update_estatus_alerta($a->id_alerta,$id_medicion,$estatus);
			}
		}
	}
	
	public function send_sms($celular, $mensaje)
	{
		$enviado = 'NO ENVIADA';
		
		require_once 'assets/vendor/nexmo/autoload.php';
		$basic  = new \Nexmo\Client\Credentials\Basic('c142f159', 'XqLdrLtoYCoq3wzO');
		$client = new \Nexmo\Client($basic);

		try
		{
			$message = $client->message()->send([
				'to' => $celular,
				'from' => 'IT COLIMA',
				'text' => $mensaje
			]);
			$response = $message->getResponseData();

			if($response['messages'][0]['status'] == 0) {
				$enviado = 'ENVIADA';
			} else {
				$enviado = "The message failed with status: " . $response['messages'][0]['status'] . "\n";
			}
		}
		catch (Exception $e) {
			$enviado = "The message was not sent. Error: " . $e->getMessage() . "\n";
		}

		return $enviado;
	}

	public function recibir_datos()
	{
		$fecha=			$this->input->get('fecha');
		$hora_inicio=	$this->input->get('hi');
		$hora_final=	$this->input->get('hf');
		$od=			$this->input->get('do');
		$ph=			$this->input->get('ph');
		$salinidad=		$this->input->get('ec');
		$temperatura=	$this->input->get('td');
		$siembra=1;

		$this->load->model('Sensor_m');
		$this->Sensor_m->insert_medicion($fecha,$hora_inicio,$hora_final,$siembra);

		// Obtiene el id del registro que se acaba de insertar
		$id=$this->Sensor_m->get_last_id();

		// Insertar Oxigeno Disuelto
		$this->Sensor_m->insert_medicion_parametro($id[0]->id,1,$od);
		// Insertar temperatura
		$this->Sensor_m->insert_medicion_parametro($id[0]->id,2,$temperatura);
		// Insertar pH
		$this->Sensor_m->insert_medicion_parametro($id[0]->id,3,$ph);
		// Insertar Salinidad
		$this->Sensor_m->insert_medicion_parametro($id[0]->id,4,$salinidad);

		// Comprueba si es necesario emitir una notificación
		$this->notificacion($id[0]->id);
	}
}