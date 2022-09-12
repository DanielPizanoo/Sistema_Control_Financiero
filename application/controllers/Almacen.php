<?php

use Mpdf\Tag\Select;

defined('BASEPATH') OR exit('No direct script access allowed');

class Almacen extends CI_Controller {

    function __construct() 
    { 
        parent::__construct(); 
        $this->load->model('Almacen_m'); 

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

	//NOTA: $this->output->enable_profiler(TRUE);
	//-------------------------------------------------------------------------------

	public function UMPDF()
    {

		$this->load->model('Almacen_m');

		$data=array(
			'unidadesdm' => $this->Almacen_m->get_unidm()
		);

        $mpdf = new \Mpdf\Mpdf([
			'defaultCssFile' => dirname(dirname(__DIR__)) . '\assets\css\styles.css',	
		]);
		$html = $this->load->view('UnidadMedidaPDF',$data ,true);
		$footer_data = array('pie' => 'Unidades de Medida');
		$footer = $this->load->view('FooterPDF',$footer_data ,true);
		$header_data = array('titulo' => 'Reporte de Unidades de Medida');
		$header = $this->load->view('HeaderPDF', $header_data ,true);
		$stylesheet = file_get_contents( __DIR__ . 'assets/css/styles.css');
		$mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
		$mpdf->SetFooter($footer);
		$mpdf->SetHeader($header);
		$mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
        $mpdf->Output(); // opens in browser
        //$mpdf->Output('UnidadesMedidaPDF.pdf','D'); // it downloads the file into the user system, with give name
	}
	//------------------------------------------------------------------------------
	public function ProPDF()
    {

		$this->load->model('Almacen_m');

		$data=array(
			'proveedores' => $this->Almacen_m->get_proveedores()
		);

        $mpdf = new \Mpdf\Mpdf([
			'defaultCssFile' => dirname(dirname(__DIR__)) . '\assets\css\styles.css',	
			'setAutoTopMargin' => 'pad'
		]);
		$html = $this->load->view('ProveedoresPDF',$data ,true);
		$footer_data = array('pie' => 'Proveedores');
		$footer = $this->load->view('FooterPDF',$footer_data ,true);
		$header_data = array('titulo' => 'Reporte de Proveedores');
		$header = $this->load->view('HeaderPDF', $header_data ,true);
		$stylesheet = file_get_contents( __DIR__ . 'assets/css/styles.css');
		$mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
		$mpdf->SetFooter($footer);
		$mpdf->SetHeader($header);
		$mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
        $mpdf->Output(); // opens in browser
        //$mpdf->Output('UnidadesMedidaPDF.pdf','D'); // it downloads the file into the user system, with give name
	}
	//--------------------------------------------------------------------------------
	public function ProductosPDF()
    {
		$this->load->model('Almacen_m');

		$data=array(
			'productos' => $this->Almacen_m->get_datos(),
			'id_tipo_producto' => $this->Almacen_m->get_tipoproducto(),
			'id_proveedor' => $this->Almacen_m->get_proveedores(),
			'id_unidad_medida' => $this->Almacen_m->get_unidm()
		);

        $mpdf = new \Mpdf\Mpdf([
			'defaultCssFile' => dirname(dirname(__DIR__)) . '\assets\css\styles.css',	
		]);
		$html = $this->load->view('ProductosPDF',$data ,true);
		$footer_data = array('pie' => 'Productos');
		$footer = $this->load->view('FooterPDF',$footer_data ,true);
		$header_data = array('titulo' => 'Reporte de Productos');
		$header = $this->load->view('HeaderPDF',$header_data ,true);
		$stylesheet = file_get_contents( __DIR__ . 'assets/css/styles.css');
		$mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
		$mpdf->SetFooter($footer);
		$mpdf->SetHeader($header);
        $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
        $mpdf->Output(); // opens in browser
        //$mpdf->Output('UnidadesMedidaPDF.pdf','D'); // it downloads the file into the user system, with give name
	}
	//-------------------------------------------------------------------------------
	public function DestinoPDF()
    {

		$this->load->model('Almacen_m');

		$data=array(
			'destinos' => $this->Almacen_m->get_destn()
		);

        $mpdf = new \Mpdf\Mpdf([
			'defaultCssFile' => dirname(dirname(__DIR__)) . '\assets\css\styles.css',	
		]);
		$html = $this->load->view('DestinoPDF',$data ,true);
		$footer_data = array('pie' => 'Destinos');
		$footer = $this->load->view('FooterPDF',$footer_data ,true);
		$header_data = array('titulo' => 'Reporte de Destinos');
		$header = $this->load->view('HeaderPDF',$header_data ,true);
		$stylesheet = file_get_contents( __DIR__ . 'assets/css/styles.css');
		$mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
		$mpdf->SetFooter($footer);
		$mpdf->SetHeader($header);
        $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
        $mpdf->Output(); // opens in browser
        //$mpdf->Output('UnidadesMedidaPDF.pdf','D'); // it downloads the file into the user system, with give name
	}
	//-------------------------------------------------------------------------------
	public function ConceptoPDF()
    {

		$this->load->model('Almacen_m');

		$data=array(
			'conceptos' => $this->Almacen_m->get_concept()
		);

        $mpdf = new \Mpdf\Mpdf([
			'defaultCssFile' => dirname(dirname(__DIR__)) . '\assets\css\styles.css',	
		]);
		$html = $this->load->view('ConceptoPDF',$data ,true);
		$footer_data = array('pie' => 'Conceptos');
		$footer = $this->load->view('FooterPDF',$footer_data ,true);
		$header_data = array('titulo' => 'Reporte de Conceptos');
		$header = $this->load->view('HeaderPDF',$header_data ,true);
		$stylesheet = file_get_contents( __DIR__ . 'assets/css/styles.css');
		$mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
		$mpdf->SetFooter($footer);
		$mpdf->SetHeader($header);
        $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
        $mpdf->Output(); // opens in browser
        //$mpdf->Output('UnidadesMedidaPDF.pdf','D'); // it downloads the file into the user system, with give name
	}
	//-------------------------------------------------------------------------------

	// SELECT id_folio, fecha, hora, c.descripcion, p.razon_social, total 
	// FROM conceptos as c
	// INNER JOIN e_encabezado as ee
	// ON c.id_concepto = ee.id_concepto
	// INNER JOIN proveedores as p
	// ON ee.id_proveedor = p.id_proveedor
	// WHERE ee.fecha BETWEEN '2020-05-12' AND '2020-05-21' AND ee.id_concepto = '18' AND p.id_proveedor = '17';

	public function REntrada()
	{
		$this->validate_session();

		$id_unidadesm = $this->input->get('id_unidadesm');

		$data=array(
			'catalogoconcepto' => $this->Almacen_m->get_econcepto(),
			'catalogoproveedor' => $this->Almacen_m->get_eproveedores()
		);

		$this->load->model('Almacen_m');

		$this->load->view('header');
		$this->load->view('navbar');
		$this->load->view('almacen/filtros_entrada',$data);
		$this->load->view('footer-open');
		$this->load->view('footer-close');
	}

	public function REntradaPDF()
	{
		$this->validate_session();

		$fecha_inicial = $this->input->get('fi');
		$fecha_final = $this->input->get('ff');
		$concepto = $this->input->get('concepto');
		$proveedor = $this->input->get('proveedor');


		$query='WHERE ';
		$bandera = 0;

		if ($fecha_inicial && $fecha_final) {
			$query = $query."e_encabezado.fecha BETWEEN '".$fecha_inicial."' and '".$fecha_final."'";
			
		} else if ($fecha_inicial && !$fecha_final) {
			$query = $query."e_encabezado.fecha = '".$fecha_inicial."'";
			$bandera = 1;
		}

		if ($concepto && $concepto != "TODOS" || $concepto != "Selecciona una opción") {
			if ($bandera == 1) {
				$query = $query." and ";
			}
			$query = $query."e_encabezado.id_concepto = ".$concepto;
			$bandera = 1;
		}

		if ($proveedor && $proveedor != "TODOS" || $proveedor != "Selecciona una opción") {
			if ($bandera == 1) {
				$query = $query." and ";
			}
			$query = $query."e_encabezado.id_proveedor = ".$proveedor;
			$bandera = 1;
		}

		if ($bandera = 0){
			$query = '';
		} 

		var_dump($query);
		
		$this->load->model('Almacen_m');
		$data=array(
			'datos' => $this->Almacen_m->get_datos_para_reporte_entrada($query)
		);

		var_dump($data['datos']);
	}





//---------------------------------------------------------------------------------
	public function CateProductosPDF()
    {

		$this->load->model('Almacen_m');

		$data=array(
			'tipo_producto' => $this->Almacen_m->get_categop()
		);

        $mpdf = new \Mpdf\Mpdf([
			'defaultCssFile' => dirname(dirname(__DIR__)) . '\assets\css\styles.css',	
		]);
		$html = $this->load->view('CateProductosPDF',$data ,true);
		$footer_data = array('pie' => 'Categoría de Productos');
		$footer = $this->load->view('FooterPDF',$footer_data ,true);
		$header_data = array('titulo' => 'Reporte de Categoría de Productos');
		$header = $this->load->view('HeaderPDF',$header_data ,true);
		$stylesheet = file_get_contents( __DIR__ . 'assets/css/styles.css');
		$mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
		$mpdf->SetFooter($footer);
		$mpdf->SetHeader($header);
        $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
        $mpdf->Output(); // opens in browser
        //$mpdf->Output('UnidadesMedidaPDF.pdf','D'); // it downloads the file into the user system, with give name
	}


//----------------------------------UNIDADESdeMEDIDA--------------------------------------------------------
	
	public function unidadesm()
	{
		$this->validate_session();

		$this->load->model('Almacen_m');

		$this->load->view('header');
		$this->load->view('navbar');
		$this->load->view('almacen/unidadMedida');
		$this->load->view('footer-open');
		$this->load->view('footer-close');
	}

	public function insert_unidadesm()
	{
        $this->validate_session();
        		
		$descripcion=$this->input->post('descripcion');

		$this->load->model('Almacen_m');
		$this->Almacen_m->insert_unidadesdm($descripcion);

        redirect('Almacen/mostrar_unidadesm');
	}
	
	public function mostrar_unidadesm()
	{
		$this->validate_session();

		$this->load->model('Almacen_m');

		$data=array(
			'unidadesdm' => $this->Almacen_m->get_unidm()
		);

		$this->load->view('header');
		$this->load->view('navbar');
		$this->load->view('almacen/unidadMedida', $data);
		$this->load->view('footer-open');
		$this->load->view('footer-close');
	}

	public function eventosu()
	{
		$this->validate_session();

		$id_unidadesm = $this->input->get('id_unidadesm');

		$data=array(
			'unidadMedida1' => $this->Almacen_m->get_unidadby_id($id_unidadesm)
		);

		$this->load->model('Almacen_m');

		$this->load->view('header');
		$this->load->view('navbar');
		$this->load->view('almacen/eventou', $data);
		$this->load->view('footer-open');
		$this->load->view('footer-close');
	}

	
	public function unidadupdate()
	{
		$this->validate_session();

		$id_unidadesm=$this->input->post('id_unidadesm');
		$descripcion=$this->input->post('descripcion');

		$this->load->model('Almacen_m');
		$this->Almacen_m->update_unidades($id_unidadesm, $descripcion);

        redirect('Almacen/mostrar_unidadesm');
	}

	public function eliminaru() 
	{
		$this->validate_session();

		$id_unidadesm = $this->input->get('id_unidadesm');

		$this->load->model('Almacen_m');
		$this->Almacen_m->delete_unidades($id_unidadesm);

		redirect('Almacen/mostrar_unidadesm');
	}

	//--------------------------------DESTINOS------------------------------------------------

	public function destinos()
	{
		$this->validate_session();

		$this->load->model('Almacen_m');

		$this->load->view('header');
		$this->load->view('navbar');
		$this->load->view('almacen/destino');
		$this->load->view('footer-open');
		$this->load->view('footer-close');
	}

	public function insert_destino()
	{
        $this->validate_session();
        		
		$nombre=$this->input->post('nombre');

		$this->load->model('Almacen_m');
		$this->Almacen_m->insert_destinos($nombre);

        redirect('Almacen/mostrar_destino');
	}

	public function mostrar_destino()
	{
		$this->validate_session();

		$this->load->model('Almacen_m');

		$data=array(
			'destinos' => $this->Almacen_m->get_destn()
		);

		$this->load->view('header');
		$this->load->view('navbar');
		$this->load->view('almacen/destino', $data);
		$this->load->view('footer-open');
		$this->load->view('footer-close');
	}
	
	public function eventosd()
	{
		$this->validate_session();

		$id_destino = $this->input->get('id_destino');

		$data=array(
			'destino1' => $this->Almacen_m->get_destinoby_id($id_destino)
		);

		$this->load->model('Almacen_m');

		$this->load->view('header');
		$this->load->view('navbar');
		$this->load->view('almacen/eventod', $data);
		$this->load->view('footer-open');
		$this->load->view('footer-close');
	}

	
	public function destinoupdate()
	{
		$this->validate_session();

		$id_destino=$this->input->post('id_destino');
		$descripcion=$this->input->post('descripcion');

		$this->load->model('Almacen_m');
		$this->Almacen_m->update_destino($id_destino, $descripcion);

        redirect('Almacen/mostrar_destino');
	}

	public function eliminard() 
	{
		$this->validate_session();

		$id_destino = $this->input->get('id_destino');

		$this->load->model('Almacen_m');
		$this->Almacen_m->delete_destino($id_destino);

		redirect('Almacen/mostrar_destino');
	}
	
	//--------------------------------CategoriaProducto------------------------------------------------

	public function categorias()
	{
		$this->validate_session();

		$this->load->model('Almacen_m');

		$this->load->view('header');
		$this->load->view('navbar');
		$this->load->view('almacen/categoriap');
		$this->load->view('footer-open');
		$this->load->view('footer-close');
	}

	public function insert_categoria()
	{
        $this->validate_session();
        		
		$nombre=$this->input->post('nombre');

		$this->load->model('Almacen_m');
		$this->Almacen_m->insert_categoria($nombre);

        redirect('Almacen/mostrar_categoria');
	}

	public function mostrar_categoria()
	{
		$this->validate_session();

		$this->load->model('Almacen_m');

		$data=array(
			'categorias' => $this->Almacen_m->get_categop()
		);

		$this->load->view('header');
		$this->load->view('navbar');
		$this->load->view('almacen/categoriap', $data);
		$this->load->view('footer-open');
		$this->load->view('footer-close');
	}

	public function eventosc()
	{
		$this->validate_session();

		$id_tipo_producto = $this->input->get('id_tipo_producto');

		$data=array(
			'categoria1' => $this->Almacen_m->get_categoriaby_id($id_tipo_producto)
		);

		$this->load->model('Almacen_m');

		$this->load->view('header');
		$this->load->view('navbar');
		$this->load->view('almacen/eventoc', $data);
		$this->load->view('footer-open');
		$this->load->view('footer-close');
	}

	public function categoriaupdate()
	{
		$this->validate_session();

		$id_tipo_producto=$this->input->post('id_tipo_producto');
		$nombre=$this->input->post('nombre');

		$this->load->model('Almacen_m');
		$this->Almacen_m->update_categoria($id_tipo_producto, $nombre);

        redirect('Almacen/mostrar_categoria');
	}

	public function eliminarc() 
	{
		$this->validate_session();

		$id_tipo_producto = $this->input->get('id_tipo_producto');

		$this->load->model('Almacen_m');
		$this->Almacen_m->delete_categoria($id_tipo_producto);

		redirect('Almacen/mostrar_categoria');
	}

	//----------------------------------Proveedores-------------------------------------------------------------
	public function proveedores()
	{
		$this->validate_session();

		$this->load->model('Almacen_m');

		$this->load->view('header');
		$this->load->view('navbar');
		$this->load->view('almacen/proveedores');
		$this->load->view('footer-open');
		$this->load->view('footer-close');
	}
	
	public function insert_proveedor()
	{
        $this->validate_session();
        		
		$razon=$this->input->post('razons');
		$rfc=$this->input->post('rfc');
		$pais=$this->input->post('pais');
		$estado=$this->input->post('estado');
		$ciudad=$this->input->post('ciudad');
		$domicilio=$this->input->post('domicilio');
		$cp=$this->input->post('cp');
		$telefono=$this->input->post('telefono');
		$celular=$this->input->post('celular');
		$email=$this->input->post('email');

		$this->load->model('Almacen_m');
		$this->Almacen_m->insert_proveedores($razon, $rfc, $pais, $estado, $ciudad, $domicilio, $cp, $telefono, $celular, $email);

		redirect('Almacen/mostrar_proveedores');
	}

	public function mostrar_proveedores()
	{
		$this->validate_session();

		$this->load->model('Almacen_m');

		$data=array(
			'proveedores' => $this->Almacen_m->get_proveedores()
		);

		$this->load->view('header');
		$this->load->view('navbar');
		$this->load->view('almacen/proveedores', $data);
		$this->load->view('footer-open');
		$this->load->view('footer-close');
	}

	public function eventospr()
	{
		$this->validate_session();

		$id_proveedor=$this->input->get('id_proveedor');

		$data=array(
			'proveedor1' => $this->Almacen_m->get_proveedores_id($id_proveedor)
		);

		$this->load->model('Almacen_m');

		$this->load->view('header');
		$this->load->view('navbar');
		$this->load->view('almacen/eventospro', $data);
		$this->load->view('footer-open');
		$this->load->view('footer-close');
	}
	
	public function proveedorupdate()
	{
		$this->validate_session();

		$id_proveedor=$this->input->post('id_proveedor');
		$razon=$this->input->post('razons');
		$rfc=$this->input->post('rfc');
		$pais=$this->input->post('pais');
		$estado=$this->input->post('estado');
		$ciudad=$this->input->post('ciudad');
		$domicilio=$this->input->post('domicilio');
		$cp=$this->input->post('cp');
		$telefono=$this->input->post('telefono');
		$celular=$this->input->post('celular');
		$email=$this->input->post('email');

		$this->load->model('Almacen_m');
		$this->Almacen_m->update_proveedores($id_proveedor, $razon, $rfc, $pais, $estado, $ciudad, $domicilio, $cp, $telefono, $celular, $email);

        redirect('Almacen/mostrar_proveedores');
	}

	public function eliminarpr() 
	{
		$this->validate_session();

		$id_proveedor=$this->input->get('id_proveedor');

		$this->load->model('Almacen_m');
		$this->Almacen_m->delete_proveedores($id_proveedor);

		redirect('Almacen/mostrar_proveedores');
	}

	//---------------------------- Productos --------------------------------------------------
	    
    public function productos() 
    {
        $this->validate_session();
        //echo site_url();

        $this->load->model('Almacen_m'); 

        $this->load->view('header');
        $this->load->view('navbar');
        $this->load->view('almacen/productos');
        $this->load->view('footer-open');
        $this->load->view('footer-close');
    }
    
    public function mostrar_datos()
	{
		$this->validate_session();

		$this->load->model('Almacen_m');

		$data=array(
			'productos' => $this->Almacen_m->get_datos(),
			'catalogotipoproducto' => $this->Almacen_m->get_tipoproducto(),
			'catalogoproveedor' => $this->Almacen_m->get_proveedores(),
			'catalogounidades' => $this->Almacen_m->get_unidm()
		);

		$this->load->view('header');
		$this->load->view('navbar');
		$this->load->view('almacen/productos', $data);
		$this->load->view('footer-open');
		$this->load->view('footer-close');
	}

	public function insert_producto()
	{
        $this->validate_session();
        		
		$nombre=$this->input->post('nombre');
		$tipoprod=$this->input->post('tipoprod');
		$proveedor=$this->input->post('proveedor');
		$unidadm=$this->input->post('unidadm');
		$precio=$this->input->post('precio');

		$this->load->model('Almacen_m');
		$this->Almacen_m->insert_productos($nombre, $tipoprod, $proveedor, $unidadm, $precio);

        redirect('Almacen/mostrar_datos');
	}
	
	public function eventos()
	{
		$this->validate_session();

		$id_producto = $this->input->get('id_producto');

		$data=array(
			'prueba1' => $this->Almacen_m->get_datosby_id($id_producto), 
			'catalogotipoproducto' => $this->Almacen_m->get_tipoproducto(),
			'catalogoproveedor' => $this->Almacen_m->get_proveedore(),
			'catalogounidades' => $this->Almacen_m->get_unidam()
		);

		$this->load->model('Almacen_m');

		$this->load->view('header');
		$this->load->view('navbar');
		$this->load->view('almacen/eventopr', $data);
		$this->load->view('footer-open');
		$this->load->view('footer-close');
	}

	public function producto_update()
	{
		$this->validate_session();
		$id_producto=$this->input->post('id_producto');
		$nombre=$this->input->post('nombre');
		$tipoprod=$this->input->post('tipoprod');
		$proveedor=$this->input->post('proveedor');
		$unidadm=$this->input->post('unidadm');
		$precio=$this->input->post('precio');

		$this->load->model('Almacen_m');
		$this->Almacen_m->update_datos($id_producto, $nombre, $tipoprod, $proveedor, $unidadm, $precio);

        redirect('Almacen/mostrar_datos');
	}
	
	public function eliminar_productos() 
	{
		$this->validate_session();

		$id_producto = $this->input->get('id_producto');

		$this->load->model('Almacen_m');
		$this->Almacen_m->delete_datos($id_producto);

		redirect('Almacen/mostrar_datos');
	}

	//---------------------------- Conceptos --------------------------------------------------

	public function conceptos() 
    {
        $this->validate_session();
        //echo site_url();

        $this->load->model('Almacen_m'); 

        $this->load->view('header');
        $this->load->view('navbar');
        $this->load->view('almacen/conceptos');
        $this->load->view('footer-open');
        $this->load->view('footer-close');
	}
	
	public function insert_concepto()
	{
        $this->validate_session();
        		
		$descripcion=$this->input->post('descripcion');

		$this->load->model('Almacen_m');
		$this->Almacen_m->insert_concepto($descripcion);

        redirect('Almacen/mostrar_concepto');
	}
	
	public function mostrar_concepto()
	{
		$this->validate_session();

		$this->load->model('Almacen_m');

		$data=array(
			'conceptos' => $this->Almacen_m->get_concept()
		);

		$this->load->view('header');
		$this->load->view('navbar');
		$this->load->view('almacen/conceptos', $data);
		$this->load->view('footer-open');
		$this->load->view('footer-close');
	}

	public function eventoscon()
	{
		$this->validate_session();

		$id_concepto = $this->input->get('id_concepto');

		$data=array(
			'conceptos1' => $this->Almacen_m->get_conceptby_id($id_concepto)
		);

		$this->load->model('Almacen_m');

		$this->load->view('header');
		$this->load->view('navbar');
		$this->load->view('almacen/eventocon', $data);
		$this->load->view('footer-open');
		$this->load->view('footer-close');
	}

	
	public function conceptupdate()
	{
		$this->validate_session();

		$id_concepto=$this->input->post('id_concepto');
		$descripcion=$this->input->post('descripcion');

		$this->load->model('Almacen_m');
		$this->Almacen_m->update_concept($id_concepto, $descripcion);

        redirect('Almacen/mostrar_concepto');
	}

	public function eliminarcon() 
	{
		$this->validate_session();

		$id_concepto = $this->input->get('id_concepto');

		$this->load->model('Almacen_m');
		$this->Almacen_m->delete_concept($id_concepto);

		redirect('Almacen/mostrar_concepto');
	}

	//---------------------------- ReporteConceptos --------------------------------------------------

	public function rconceptos() 
    {
        $this->validate_session();
        //echo site_url();

        $this->load->model('Almacen_m'); 

        $this->load->view('header');
        $this->load->view('navbar');
        $this->load->view('almacen/rconceptos');
        $this->load->view('footer-open');
        $this->load->view('footer-close');
	}

	public function mostrar_rconcepto()
	{
		$this->validate_session();

		$this->load->model('Almacen_m');

		$data=array(
			'rconceptos' => $this->Almacen_m->get_rconcept()
		);

		$this->load->view('header');
		$this->load->view('navbar');
		$this->load->view('almacen/rconceptos', $data);
		$this->load->view('footer-open');
		$this->load->view('footer-close');
	}

	public function eventosrcon()
	{
		$this->validate_session();

		$id_concepto = $this->input->get('id_concepto');

		$data=array(
			'rconceptos1' => $this->Almacen_m->get_rconceptby_id($id_concepto)
		);

		$this->load->model('Almacen_m');

		$this->load->view('header');
		$this->load->view('navbar');
		$this->load->view('almacen/eventorcon', $data);
		$this->load->view('footer-open');
		$this->load->view('footer-close');
	}

	
	public function rconceptupdate()
	{
		$this->validate_session();

		$id_concepto=$this->input->post('id_concepto');
		$descripcion=$this->input->post('descripcion');

		$this->load->model('Almacen_m');
		$this->Almacen_m->update_rconcept($id_concepto, $descripcion);

        redirect('Almacen/mostrar_rconcepto');
	}

	public function eliminarrcon() 
	{
		$this->validate_session();

		$id_concepto = $this->input->get('id_concepto');

		$this->load->model('Almacen_m');
		$this->Almacen_m->delete_rconcept($id_concepto);

		redirect('Almacen/mostrar_rconcepto');
	}

	//--------------------------------ReporteCategoriaProducto------------------------------------------------

	public function rcategorias()
	{
		$this->validate_session();

		$this->load->model('Almacen_m');

		$this->load->view('header');
		$this->load->view('navbar');
		$this->load->view('almacen/rcategoriap');
		$this->load->view('footer-open');
		$this->load->view('footer-close');
	}

	public function mostrar_rcategoria()
	{
		$this->validate_session();

		$this->load->model('Almacen_m');

		$data=array(
			'rcategorias' => $this->Almacen_m->get_rcategop()
		);

		$this->load->view('header');
		$this->load->view('navbar');
		$this->load->view('almacen/rcategoriap', $data);
		$this->load->view('footer-open');
		$this->load->view('footer-close');
	}

	public function eventosrc()
	{
		$this->validate_session();

		$id_tipo_producto = $this->input->get('id_tipo_producto');

		$data=array(
			'rcategoria1' => $this->Almacen_m->get_rcategoriaby_id($id_tipo_producto)
		);

		$this->load->model('Almacen_m');

		$this->load->view('header');
		$this->load->view('navbar');
		$this->load->view('almacen/eventorc', $data);
		$this->load->view('footer-open');
		$this->load->view('footer-close');
	}

	public function rcategoriaupdate()
	{
		$this->validate_session();

		$id_tipo_producto=$this->input->post('id_tipo_producto');
		$nombre=$this->input->post('nombre');

		$this->load->model('Almacen_m');
		$this->Almacen_m->update_rcategoria($id_tipo_producto, $nombre);

        redirect('Almacen/mostrar_rcategoria');
	}

	public function reliminarc() 
	{
		$this->validate_session();

		$id_tipo_producto = $this->input->get('id_tipo_producto');

		$this->load->model('Almacen_m');
		$this->Almacen_m->delete_rcategoria($id_tipo_producto);

		redirect('Almacen/mostrar_rcategoria');
	}

	//--------------------------------ReporteDESTINOS------------------------------------------------

	public function rdestinos()
	{
		$this->validate_session();

		$this->load->model('Almacen_m');

		$this->load->view('header');
		$this->load->view('navbar');
		$this->load->view('almacen/rdestino');
		$this->load->view('footer-open');
		$this->load->view('footer-close');
	}

	public function mostrar_rdestino()
	{
		$this->validate_session();

		$this->load->model('Almacen_m');

		$data=array(
			'rdestinos' => $this->Almacen_m->get_rdestn()
		);

		$this->load->view('header');
		$this->load->view('navbar');
		$this->load->view('almacen/rdestino', $data);
		$this->load->view('footer-open');
		$this->load->view('footer-close');
	}
	
	public function eventosrd()
	{
		$this->validate_session();

		$id_destino = $this->input->get('id_destino');

		$data=array(
			'rdestino1' => $this->Almacen_m->get_rdestinoby_id($id_destino)
		);

		$this->load->model('Almacen_m');

		$this->load->view('header');
		$this->load->view('navbar');
		$this->load->view('almacen/eventord', $data);
		$this->load->view('footer-open');
		$this->load->view('footer-close');
	}

	
	public function rdestinoupdate()
	{
		$this->validate_session();

		$id_destino=$this->input->post('id_destino');
		$descripcion=$this->input->post('descripcion');

		$this->load->model('Almacen_m');
		$this->Almacen_m->update_rdestino($id_destino, $descripcion);

        redirect('Almacen/mostrar_rdestino');
	}

	public function reliminard() 
	{
		$this->validate_session();

		$id_destino = $this->input->get('id_destino');

		$this->load->model('Almacen_m');
		$this->Almacen_m->delete_rdestino($id_destino);

		redirect('Almacen/mostrar_rdestino');
	}

	//---------------------------- ReporteProductos --------------------------------------------------
	    
    public function rproductos() 
    {
        $this->validate_session();
        //echo site_url();

        $this->load->model('Almacen_m'); 

        $this->load->view('header');
        $this->load->view('navbar');
        $this->load->view('almacen/rproductos');
        $this->load->view('footer-open');
        $this->load->view('footer-close');
    }
    
    public function mostrar_rdatos()
	{
		$this->validate_session();

		$this->load->model('Almacen_m');

		$data=array(
			'rproductos' => $this->Almacen_m->get_datos(),
			'catalogotipoproducto' => $this->Almacen_m->get_tipoproducto(),
			'catalogoproveedor' => $this->Almacen_m->get_proveedores(),
			'catalogounidades' => $this->Almacen_m->get_unidm()
		);

		$this->load->view('header');
		$this->load->view('navbar');
		$this->load->view('almacen/rproductos', $data);
		$this->load->view('footer-open');
		$this->load->view('footer-close');
	}
	
	public function reventos()
	{
		$this->validate_session();

		$id_producto = $this->input->get('id_producto');

		$data=array(
			'rprueba1' => $this->Almacen_m->get_datosby_id($id_producto), 
			'catalogotipoproducto' => $this->Almacen_m->get_tipoproducto(),
			'catalogoproveedor' => $this->Almacen_m->get_proveedore(),
			'catalogounidades' => $this->Almacen_m->get_unidam()
		);

		$this->load->model('Almacen_m');

		$this->load->view('header');
		$this->load->view('navbar');
		$this->load->view('almacen/eventopr', $data);
		$this->load->view('footer-open');
		$this->load->view('footer-close');
	}

	public function rproducto_update()
	{
		$this->validate_session();

		$id_producto=$this->input->post('id_producto');
		$nombre=$this->input->post('nombre');
		$tipoprod=$this->input->post('tipoprod');
		$proveedor=$this->input->post('proveedor');
		$unidadm=$this->input->post('unidadm');
		$precio=$this->input->post('precio');

		$this->load->model('Almacen_m');
		$this->Almacen_m->update_rdatos($id_producto, $nombre, $tipoprod, $proveedor, $unidadm, $precio);

        redirect('Almacen/mostrar_rdatos');
	}
	
	public function eliminar_rproductos() 
	{
		$this->validate_session();

		$id_producto = $this->input->get('id_producto');

		$this->load->model('Almacen_m');
		$this->Almacen_m->delete_rdatos($id_producto);

		redirect('Almacen/mostrar_rdatos');
	}

	//----------------------------------Reporte UNIDADESdeMEDIDA--------------------------------------------------------
	
	public function runidadesm()
	{
		$this->validate_session();

		$this->load->model('Almacen_m');

		$this->load->view('header');
		$this->load->view('navbar');
		$this->load->view('almacen/runidadMedida');
		$this->load->view('footer-open');
		$this->load->view('footer-close');
	}
	
	public function mostrar_runidadesm()
	{
		$this->validate_session();

		$this->load->model('Almacen_m');

		$data=array(
			'runidadesdm' => $this->Almacen_m->get_runidm()
		);

		$this->load->view('header');
		$this->load->view('navbar');
		$this->load->view('almacen/runidadMedida', $data);
		$this->load->view('footer-open');
		$this->load->view('footer-close');
	}

	public function eventosru()
	{
		$this->validate_session();

		$id_unidadesm = $this->input->get('id_unidadesm');

		$data=array(
			'runidadMedida1' => $this->Almacen_m->get_runidadby_id($id_unidadesm)
		);

		$this->load->model('Almacen_m');

		$this->load->view('header');
		$this->load->view('navbar');
		$this->load->view('almacen/eventoru', $data);
		$this->load->view('footer-open');
		$this->load->view('footer-close');
	}

	
	public function runidadupdate()
	{
		$this->validate_session();

		$id_unidadesm=$this->input->post('id_unidadesm');
		$descripcion=$this->input->post('descripcion');

		$this->load->model('Almacen_m');
		$this->Almacen_m->update_runidades($id_unidadesm, $descripcion);

        redirect('Almacen/mostrar_runidadesm');
	}

	public function eliminarru() 
	{
		$this->validate_session();

		$id_unidadesm = $this->input->get('id_unidadesm');

		$this->load->model('Almacen_m');
		$this->Almacen_m->delete_runidades($id_unidadesm);

		redirect('Almacen/mostrar_runidadesm');
	}

	//----------------------------------ReporteProveedores-------------------------------------------------------------
	public function rproveedores()
	{
		$this->validate_session();

		$this->load->model('Almacen_m');

		$this->load->view('header');
		$this->load->view('navbar');
		$this->load->view('almacen/rproveedores');
		$this->load->view('footer-open');
		$this->load->view('footer-close');
	}

	public function mostrar_rproveedores()
	{
		$this->validate_session();

		$this->load->model('Almacen_m');

		$data=array(
			'rproveedores' => $this->Almacen_m->get_rproveedores()
		);

		$this->load->view('header');
		$this->load->view('navbar');
		$this->load->view('almacen/rproveedores', $data);
		$this->load->view('footer-open');
		$this->load->view('footer-close');
	}

	public function eventosrpr()
	{
		$this->validate_session();

		$id_proveedor=$this->input->get('id_proveedor');

		$data=array(
			'rproveedor1' => $this->Almacen_m->get_rproveedores_id($id_proveedor)
		);

		$this->load->model('Almacen_m');

		$this->load->view('header');
		$this->load->view('navbar');
		$this->load->view('almacen/eventosrpro', $data);
		$this->load->view('footer-open');
		$this->load->view('footer-close');
	}
	
	public function rproveedorupdate()
	{
		$this->validate_session();

		$id_proveedor=$this->input->post('id_proveedor');
		$razon=$this->input->post('razons');
		$rfc=$this->input->post('rfc');
		$pais=$this->input->post('pais');
		$estado=$this->input->post('estado');
		$ciudad=$this->input->post('ciudad');
		$domicilio=$this->input->post('domicilio');
		$cp=$this->input->post('cp');
		$telefono=$this->input->post('telefono');
		$celular=$this->input->post('celular');
		$email=$this->input->post('email');

		$this->load->model('Almacen_m');
		$this->Almacen_m->update_rproveedores($id_proveedor, $razon, $rfc, $pais, $estado, $ciudad, $domicilio, $cp, $telefono, $celular, $email);

        redirect('Almacen/mostrar_rproveedores');
	}

	public function eliminarrpr() 
	{
		$this->validate_session();

		$id_proveedor=$this->input->get('id_proveedor');

		$this->load->model('Almacen_m');
		$this->Almacen_m->delete_rproveedores($id_proveedor);

		redirect('Almacen/mostrar_rproveedores');
	}

	//------------------------------------ Entradas -------------------------------------------
	public function entradas()
	{
		$this->validate_session();
		$this->load->model('Almacen_m');
	
		$data=array(
			'catalogoconcepto' => $this->Almacen_m->get_econcepto(),
			'catalogoproveedor' => $this->Almacen_m->get_eproveedores(),
			'catalogoproductos' => $this->Almacen_m->get_productos(),
			'catalogounidadm' => $this->Almacen_m->get_eunidadm(),
			'contador' => $this->Almacen_m->get_lastIdEncabezado()
		);
	
		$this->load->view('header');
		$this->load->view('navbar');
		$this->load->view('almacen/entradas', $data);
		$this->load->view('footer-open');
		$this->load->view('almacen/jquery_concepto');
		$this->load->view('almacen/jquery_proveedores');
		$this->load->view('almacen/jquery_modal_movimiento');
		$this->load->view('almacen/jquery_movimiento');
		$this->load->view('footer-close');
	}

	/*
	public function entradas_movimiento() 
	{
		$this->validate_session();
		$this->load->model('Almacen_m');
	
		$this->load->view('header');
		$this->load->view('navbar');
		$this->load->view('Almacen/entradas');
		$this->load->view('footer-open');
		$this->load->view('footer-close');
	}
	*/

	public function encabezado_insert_concepto()
	{
        $this->validate_session();
        		
		$descripcion=$this->input->post('descripcion');

		$this->load->model('Almacen_m');
		$this->Almacen_m->insert_concepto($descripcion);

		$data=array(
			'catalogoconcepto' => $this->Almacen_m->get_econcepto()
		);

		$cadena = '';
		foreach($data['catalogoconcepto'] as $cco)
		{
			$cadena = $cadena.'<option value="'.$cco->id_concepto.'">'.$cco->descripcion.'</option>';
		}
		echo $cadena;
	}

	public function encabezado_insert_proveedores()
	{
        $this->validate_session();
        		
		$razon=$this->input->post('razons');
		$rfc=$this->input->post('rfc');
		$pais=$this->input->post('pais');
		$estado=$this->input->post('estado');
		$ciudad=$this->input->post('ciudad');
		$domicilio=$this->input->post('domicilio');
		$cp=$this->input->post('cp');
		$telefono=$this->input->post('telefono');
		$celular=$this->input->post('celular');
		$email=$this->input->post('email');

		$this->load->model('Almacen_m');
		$this->Almacen_m->insert_proveedores($razon, $rfc, $pais, $estado, $ciudad, $domicilio, $cp, $telefono, $celular, $email);

		$data=array(
			'catalogoproveedor' => $this->Almacen_m->get_eproveedores()
		);

		$razons = '';
		foreach($data['catalogoproveedor'] as $cp)
		{
			$razons = $razons.'<option value="'.$cp->id_proveedor.'">'.$cp->razon_social.'</option>';
		}
		echo $razons;
	}

	
	public function insert_ecabecera()
	{
		$this->validate_session();
				
		$fecha=$this->input->post('fecha');
		$hora=$this->input->post('hora');
		$concepto=$this->input->post('concepto');
		$proveedor=$this->input->post('proveedor');

		$this->load->model('Almacen_m');
		$this->Almacen_m->insert_ecabeza($fecha, $hora, $concepto, $proveedor);
	}

	public function insert_movimientos()
	{
		$this->validate_session();

		$id_folio=$this->Almacen_m->get_lastId()[0]->last_folio;
		$producto=$this->input->post('producto');
		$unidadm=$this->input->post('unidadm');
		$cantidad=$this->input->post('cantidad');
		$preciou=$this->input->post('preciou');
		$subtotal = $cantidad * $preciou;

		$this->load->model('Almacen_m');
		$this->Almacen_m->insert_emovimientos($id_folio, $producto, $unidadm, $cantidad, $preciou, $subtotal);
	}
}

?>