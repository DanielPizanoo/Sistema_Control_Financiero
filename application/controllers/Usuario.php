<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {
	function __construct() 
    { 
        parent::__construct(); 
        $this->load->model('Usuario_m'); 

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

		$this->load->model('Usuario_m');
		$id_medicion=$this->Usuario_m->get_last_id_medicion()[0]->id_medicion;
		$data=array(
			'last_medicion' => 	$this->Usuario_m->get_last_medicion($id_medicion),
			'mediciones'	=>	$this->Usuario_m->get_mediciones()
		);

		$this->load->view('header');
		$this->load->view('navbar');
		$this->load->view('dashboard', $data);
		$this->load->view('footer-open');
		$this->load->view('footer-close');
	}
	
	public function eventos()
	{
		$this->validate_session();

		$this->load->model('Usuario_m');
		$id_medicion=$this->Usuario_m->get_last_id_medicion()[0]->id_medicion;
		$data=array(
			'tipos_eventos' => 	$this->Usuario_m->get_tipo_evento(),
			'eventos' => $this->Usuario_m->get_eventos_last_10(),
			'estanques' => $this->Usuario_m->get_estanques_activos()
			
		);

		$this->load->view('header');
		$this->load->view('navbar');
		$this->load->view('eventos/eventos_main', $data);
		$this->load->view('footer-open');
		$this->load->view('eventos/ajax');
		$this->load->view('footer-close');
	}

	public function get_eventos()
	{
		$this->validate_session();

		$id_tipo_evento = $this->input->get('id');

		switch($id_tipo_evento)
		{
			case 1:	$this->load->view('eventos/muestreo');
				break;
			case 2:	$this->load->view('eventos/muestreo');
				break;
			case 3:	$this->load->view('eventos/accion');
				break;
			case 4:	$this->load->view('eventos/accion');
				break;
			case 5:	$this->load->view('eventos/observacion');
				break;
			case 6: $this->get_productos(1);
				break;
			case 7: $this->get_productos(2);
				break;
			case 8: $this->get_productos(3);
				break;
			case 9: $this->get_productos(4);
				break;
		}
	}

	public function get_productos($id_producto)
	{
		$this->validate_session();

		$this->load->model('Usuario_m');
		$data = array(
			'productos' => $this->Usuario_m->get_productos_by_id($id_producto)
		);

		$this->load->view('eventos/aplicacion_producto',$data);
	}

	public function insert_det_muestreo()
	{
		$this->validate_session();

		$id_muestreo = $this->input->post('id_muestreo');
		$valor = $this->input->post('cantidad');

		$this->load->model('Usuario_m');
		$this->Usuario_m->insert_det_muestreo($id_muestreo, $valor);
		$data = array (
			'det_muestreo' => $this->Usuario_m->get_det_muestreo($id_muestreo)
		);

		$this->load->view('eventos/datos_tabla_det_muestreo', $data);
	}

	public function insert_evento()
	{
		$this->validate_session();

		$fecha = $this->input->post('fecha');
		$hora = $this->input->post('hora').':00';
		$id_tipo_evento = $this->input->post('tipo_evento');
		$siembra = $this->input->post('estanque');

		// Inserta en la tabla registro_evento
		$this->load->model('Usuario_m');
		$this->Usuario_m->insert_registro_evento($fecha,$hora,$id_tipo_evento,$siembra,$this->session->user);

		// Obtiene el id del registro que se acaba de insertar
		$id=$this->Usuario_m->get_last_id()[0]->id;

		// Switch para establecer donde se registrarán los eventos
		switch($id_tipo_evento)
		{
			case 1:	
				//$hora = $this->input->post('hora').':00';
				$um = $this->input->post('unidad_medida');
	
				$this->Usuario_m->insert_muestreo($id,0,$um,$hora);
				// Obtiene el id del registro que se acaba de insertar
				$id_muestreo=$this->Usuario_m->get_last_id()[0]->id;

				$data = array (
					'eventos' => $this->Usuario_m->get_eventos_last_10(),
					'id_muestreo' => $id_muestreo
				);

				$this->load->view('eventos/tabla_det_muestreo',$data);
				break;
			case 2:	
				//$hora = $this->input->post('hora').':00';
				$um = $this->input->post('unidad_medida');
	
				$this->Usuario_m->insert_muestreo($id,0,$um,$hora);
				// Obtiene el id del registro que se acaba de insertar
				$id_muestreo=$this->Usuario_m->get_last_id()[0]->id;

				$data = array (
					'eventos' => $this->Usuario_m->get_eventos_last_10(),
					'id_muestreo' => $id_muestreo
				);

				$this->load->view('eventos/tabla_det_muestreo',$data);
				break;
			case 3:	
				$hi = $this->input->post('hora').':00';
				$hf = $this->input->post('hora_final').':00';

				$this->Usuario_m->insert_accion($id,$hi,$hf);

				$data = array (
					'eventos' => $this->Usuario_m->get_eventos_last_10()
				);

				$this->load->view('eventos/tabla',$data);
				break;
			case 4:
				$hi = $this->input->post('hora').':00';
				$hf = $this->input->post('hora_final').':00';

				$this->Usuario_m->insert_accion($id,$hi,$hf);

				$data = array (
					'eventos' => $this->Usuario_m->get_eventos_last_10()
				);

				$this->load->view('eventos/tabla',$data);
				break;
			case 5:
				$observacion = $this->input->post('observacion');

				$this->Usuario_m->insert_observacion($id,$observacion);

				$data = array (
					'eventos' => $this->Usuario_m->get_eventos_last_10()
				);

				$this->load->view('eventos/tabla',$data);
				break;
			case 6:
				$hora = $this->input->post('hora').':00';
				$producto = $this->input->post('producto');
				$cantidad = $this->input->post('cantidad');
				$um = $this->input->post('unidad_medida');

				$this->Usuario_m->insert_aplicacion_producto($id,$cantidad,$um,$hora,$producto);

				$data = array (
					'eventos' => $this->Usuario_m->get_eventos_last_10()
				);

				$this->load->view('eventos/tabla',$data);
				break;
			case 7:
				$hora = $this->input->post('hora').':00';
				$producto = $this->input->post('producto');
				$cantidad = $this->input->post('cantidad');
				$um = $this->input->post('unidad_medida');

				$this->Usuario_m->insert_aplicacion_producto($id,$cantidad,$um,$hora,$producto);

				$data = array (
					'eventos' => $this->Usuario_m->get_eventos_last_10()
				);

				$this->load->view('eventos/tabla',$data);
				break;
			case 8:
				$hora = $this->input->post('hora').':00';
				$producto = $this->input->post('producto');
				$cantidad = $this->input->post('cantidad');
				$um = $this->input->post('unidad_medida');

				$this->Usuario_m->insert_aplicacion_producto($id,$cantidad,$um,$hora,$producto);

				$data = array (
					'eventos' => $this->Usuario_m->get_eventos_last_10()
				);

				$this->load->view('eventos/tabla',$data);
				break;
			case 9:
				$hora = $this->input->post('hora').':00';
				$producto = $this->input->post('producto');
				$cantidad = $this->input->post('cantidad');
				$um = $this->input->post('unidad_medida');

				$this->Usuario_m->insert_aplicacion_producto($id,$cantidad,$um,$hora,$producto);

				$data = array (
					'eventos' => $this->Usuario_m->get_eventos_last_10()
				);

				$this->load->view('eventos/tabla',$data);
				break;
		}
	}

	public function get_ver_mas()
	{
		$this->validate_session();
		
		$id_reg_evento=$this->input->get('id');

		$this->load->model('Usuario_m');
		$id_evento=$this->Usuario_m->get_tipo_evento_by_reg_evento($id_reg_evento)[0]->id_evento;

		$join='';
		$select='';

		switch ($id_evento)
		{
			case 1: $join = 'INNER JOIN muestreo on muestreo.id_muestreo = registro_evento.id_registro_evento INNER JOIN det_muestreo on det_muestreo.id_muestreo = muestreo.id_muestreo';
			break;

			case 2: $join = 'INNER JOIN muestreo on muestreo.id_muestreo = registro_evento.id_registro_evento INNER JOIN det_muestreo on det_muestreo.id_muestreo = muestreo.id_muestreo';
			break;

			case 3: $join = 'INNER JOIN accion on accion.id_accion = registro_evento.id_registro_evento';

			$select = "DATE_FORMAT(accion.hora_inicio, '%H:%i') as hora_inicio,
			DATE_FORMAT(accion.hora_final, '%h:%i') as hora_final ";
			break;

			case 4: $join = 'INNER JOIN accion on accion.id_accion = registro_evento.id_registro_evento';
			break;

			$select = "DATE_FORMAT(accion.hora_inicio, '%H:%i') as hora_inicio,
			DATE_FORMAT(accion.hora_final, '%h:%i') as hora_final ";

			case 5: $join = 'INNER JOIN det_observacion_registro on det_observacion_registro.id_registro_evento = registro_evento.id_registro_evento';

			$select = 'det_observacion_registro.texto as texto ';
			break;

			case 6: $join = 'INNER JOIN aplicacion_producto on aplicacion_producto.id_aplicacion_producto = registro_evento.id_registro_evento INNER JOIN producto on producto.id_producto = aplicacion_producto.id_producto INNER JOIN tipo_producto on tipo_producto.id_tipo_producto = producto.id_tipo_producto';

			$select = "aplicacion_producto.cantidad as valor,
			DATE_FORMAT(aplicacion_producto.hora, '%H:%i') as hora,
			aplicacion_producto.hora as hora_f,
			aplicacion_producto.unidad_medida as unidad_medida,
			aplicacion_producto.cantidad as cantidad,
			producto.nombre as producto,
			producto.id_producto as id_producto,
			tipo_producto.id_tipo_producto as id_tipo_producto ";
			break;

			case 7: $join = 'INNER JOIN aplicacion_producto on aplicacion_producto.id_aplicacion_producto = registro_evento.id_registro_evento INNER JOIN producto on producto.id_producto = aplicacion_producto.id_producto INNER JOIN tipo_producto on tipo_producto.id_tipo_producto = producto.id_tipo_producto';

			$select = "aplicacion_producto.cantidad as valor,
			DATE_FORMAT(aplicacion_producto.hora, '%H:%i') as hora,
			aplicacion_producto.hora as hora_f,
			aplicacion_producto.unidad_medida as unidad_medida,
			aplicacion_producto.cantidad as cantidad,
			producto.nombre as producto,
			producto.id_producto as id_producto,
			tipo_producto.id_tipo_producto as id_tipo_producto ";
			break;

			case 8: $join = 'INNER JOIN aplicacion_producto on aplicacion_producto.id_aplicacion_producto = registro_evento.id_registro_evento INNER JOIN producto on producto.id_producto = aplicacion_producto.id_producto INNER JOIN tipo_producto on tipo_producto.id_tipo_producto = producto.id_tipo_producto';

			$select = "aplicacion_producto.cantidad as valor,
			DATE_FORMAT(aplicacion_producto.hora, '%H:%i') as hora,
			aplicacion_producto.hora as hora_f,
			aplicacion_producto.unidad_medida as unidad_medida,
			aplicacion_producto.cantidad as cantidad,
			producto.nombre as producto,
			producto.id_producto as id_producto,
			tipo_producto.id_tipo_producto as id_tipo_producto ";
			break;

			case 9: $join = 'INNER JOIN aplicacion_producto on aplicacion_producto.id_aplicacion_producto = registro_evento.id_registro_evento INNER JOIN producto on producto.id_producto = aplicacion_producto.id_producto INNER JOIN tipo_producto on tipo_producto.id_tipo_producto = producto.id_tipo_producto';

			$select = "aplicacion_producto.cantidad as valor,
			DATE_FORMAT(aplicacion_producto.hora, '%H:%i') as hora,
			aplicacion_producto.hora as hora_f,
			aplicacion_producto.unidad_medida as unidad_medida,
			aplicacion_producto.cantidad as cantidad,
			producto.nombre as producto,
			producto.id_producto as id_producto,
			tipo_producto.id_tipo_producto as id_tipo_producto ";
			break;
		}

		$data = array (
			'reg_evento' => $this->Usuario_m->get_reg_evento_by_id($id_reg_evento, $select, $join),
			'evento' => $this->Usuario_m->get_tipo_evento()
		);

		$this->load->view('eventos/modal_vermas', $data);
	}

	public function consultar_eventos()
	{
		$this->validate_session();

		$this->load->model('Usuario_m');
		//$id_medicion=$this->Usuario_m->get_last_id_medicion()[0]->id_medicion;
		$data=array(
			'tipos_eventos' => 	$this->Usuario_m->get_tipo_evento(),
			'estanques' => 	$this->Usuario_m->get_estanques(),
			'registro_eventos' => 	$this->Usuario_m->get_all_registro_eventos()
			
		);

		$this->load->view('header');
		$this->load->view('navbar');
		$this->load->view('consultas/principal', $data);
		$this->load->view('footer-open');
		$this->load->view('consultas/ajax');
		$this->load->view('footer-close');
	}

	public function consulta_filtros()
	{
		$this->validate_session();

		$estanque=$this->input->get('estanque');
		$evento=$this->input->get('tipo_evento');
		$fecha_inicio=$this->input->get('fecha_inicio');
		$fecha_final=$this->input->get('fecha_final');

		$where="";

		if ($estanque != null)
		{
			$where = $where." and estanque.id_estanque = ".$estanque;
		}

		if ($evento != null)
		{
			$where = $where." and evento.id_evento = ".$evento;
		}

		if ($fecha_inicio != null && $fecha_final != null) // cuando las dos fechas no sean nulas
		{
			$where = $where." and registro_evento.fecha BETWEEN '".$fecha_inicio."' and '".$fecha_final."'";
		}
		elseif ($fecha_inicio != null && $fecha_final == null) // cuando fecha inicio no sea nulo
		{
			$where = $where." and registro_evento.fecha >= '".$fecha_inicio."'";
		}
		elseif ($fecha_inicio == null && $fecha_final != null) // cuando fecha final no sea nulo
		{
			$where = $where." and registro_evento.fecha <= '".$fecha_final."'";
		}

		$this->load->model('Usuario_m');
		$data=array(
			'registro_eventos' => 	$this->Usuario_m->get_where_registro_eventos($where)
		);
		$this->load->view('consultas/tabla', $data);
	}

	public function ver_registro_evento()
	{
		$this->validate_session();

		$id_registro_evento = $this->input->get('re');
		$id_evento = $this->input->get('e');

		switch ($id_evento)
		{
			case 1: $this->ver_muestreo($id_registro_evento); break;
			case 2: $this->ver_muestreo($id_registro_evento); break;
			case 3: $this->ver_accion($id_registro_evento); break;
			case 4: $this->ver_accion($id_registro_evento); break;
			case 5: $this->ver_observacion($id_registro_evento); break;
			case 6: $this->ver_aplicacion_producto($id_registro_evento); break;
			case 7: $this->ver_aplicacion_producto($id_registro_evento); break;
			case 8: $this->ver_aplicacion_producto($id_registro_evento); break;
			case 9: $this->ver_aplicacion_producto($id_registro_evento); break;
		}
	}

	public function ver_accion($id)
	{
		$this->validate_session();

		$this->load->model('Usuario_m');
		$data=array(
			'estanques' => 	$this->Usuario_m->get_estanques(),
			'reg_evento' => $this->Usuario_m->get_reg_evento_unico($id)
		);

		$this->load->view('header');
		$this->load->view('navbar');
		$this->load->view('consultas/accion', $data);
		$this->load->view('footer-open');
		$this->load->view('footer-close');
	}

	public function estanques()
	{
		$this->validate_session();

		$this->load->model('Usuario_m');
		$data=array(
			'estanques' => 	$this->Usuario_m->get_estanques()
			
		);

		$this->load->view('header');
		$this->load->view('navbar');
		$this->load->view('admin/reg_estanque', $data);
		$this->load->view('footer-open');
		$this->load->view('footer-close');
	}

	public function insert_estanque()
	{
		$this->validate_session();

		$identificador=$this->input->post('identificador');
		$medida_x=$this->input->post('medida_x');
		$medida_y=$this->input->post('medida_y');
		$medida_z=$this->input->post('medida_z');

		$this->load->model('Usuario_m');
		$this->Usuario_m->insert_estanque($identificador,$medida_x,$medida_y,$medida_z);

		redirect('Usuario/estanques');
	}

	public function ciclos()
	{
		$this->validate_session();

		$this->load->model('Usuario_m');
		//$id_medicion=$this->Usuario_m->get_last_id_medicion()[0]->id_medicion;
		$data=array(
			'estanques' => 	$this->Usuario_m->get_estanques(),
			'siembras' => 	$this->Usuario_m->get_siembra(),
			'biomasa' => 	$this->Usuario_m->get_biomasa()
			
		);

		$this->load->view('header');
		$this->load->view('navbar');
		$this->load->view('admin/reg_ciclo', $data);
		$this->load->view('footer-open');
		$this->load->view('footer-close');
	}

	public function insert_ciclo()
	{
		$this->validate_session();

		$fecha_inicial=$this->input->post('fecha_inicio');
		$estanque=$this->input->post('estanque');
		$biomasa=$this->input->post('biomasa');
		$cantidad=$this->input->post('cantidad');

		$this->load->model('Usuario_m');
		$this->Usuario_m->insert_siembra($fecha_inicial,$estanque,$biomasa,$cantidad);

		redirect('Usuario/ciclos');
	}
}