<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sugerencia extends CI_Controller {
 
 	public function __construct(){
 		parent::__construct();
 		$this->load->model(array('model_sugerencia','model_auditoria_actividades','model_auditoria_log'));
 		//$this->load->library('session');
 	}

 	public function verpopupsugerencia()
	{	
		$accion="Ver PopUp Sugerencias";
		$this->model_auditoria_actividades->m_registrar_auditoria_actividades($accion);
		$this->load->view('cuestionario/popupsugerencia');
	}

	public function ver_sugerencias()
	{	
		$accion="Ver Sugerencias";
		$this->model_auditoria_actividades->m_registrar_auditoria_actividades($accion);
		$this->load->view('sugerencia/sugerencia');
	}
	
	public function ver_popupsugerenciarpta()
	{	

		$accion="Ver PopUp Sugerencia Respuesta";
		$this->model_auditoria_actividades->m_registrar_auditoria_actividades($accion);
		$this->load->view('sugerencia/popupressugerencia');
	}


	public function listar_sugerencias($pag,$busqueda){
		
		$lista['data']=$this->model_sugerencia->m_lista_sugerencias($pag,$busqueda);
		 
		$contador = $this->model_sugerencia->m_count_lista_sugerencias($busqueda);
		$lista['contador'] = $contador;
		// var_dump('<pre>',$lista);exit();
		$this->output->set_content_type('aplication/json');
		$this->output->set_output(json_encode($lista));
		// var_dump(json_encode($lista));exit();
	}

	

	public function registrar_sugerencia(){
		$p = json_decode(trim(file_get_contents('php://input')),true);
		// $file = $_FILES["file"]["imagen"];
		// var_dump($file,'file');
		//var_dump('<pre>',$p);exit();
		$data['nomsug']			=	$p['nombre'];
		$data['dessug']			=	$p['descripcion'];
		$data['idusuario']		=	$this->session->userdata('userid');
		 
		$response = $this->model_sugerencia->m_registrar($data);

		/* REGISTRO AUDITORIA LOG - INSERT */
		$data['idsugerencia']=$this->db->insert_id();
		$this->model_auditoria_log->m_registro_auditoria_log($data,"sugerencia");

		$accion="Registrar Sugerencia";
		$this->model_auditoria_actividades->m_registrar_auditoria_actividades($accion);
		

		//$response['message'] = "Se registraron los datos correctamente";
		echo json_encode($response);
	}


	public function registrar_rpta_sugerencia(){
		$p = json_decode(trim(file_get_contents('php://input')),true);

		//var_dump('<pre>',$p);exit();
		$data['idsugerencia']	=	$p['idsug'];
		$data['desres']			=	$p['descripcion'];
		$data['idusuariores']		=	$this->session->userdata('userid');
		 

		$response = $this->model_sugerencia->m_registrar_rptasug($data);

		/* REGISTRO AUDITORIA LOG - INSERT */
		$data['idsugres']=$this->db->insert_id();
		$this->model_auditoria_log->m_registro_auditoria_log($data,"sugerencia_respuesta");



		$accion="Registrar respuesta Sugerencia";
		$this->model_auditoria_actividades->m_registrar_auditoria_actividades($accion);
		//$response['message'] = "Se registraron los datos correctamente";
		echo json_encode($response);
	}

	public function eliminar_sugerencia($sugId){
		$data=$this->model_sugerencia->m_listar_esta_sugerencia($sugId);
		$response = $this->model_sugerencia->m_eliminar($sugId);
		
		/* REGISTRO AUDITORIA LOG - ELIMINAR */
		$this->model_auditoria_log->m_eliminar_auditoria_log($data[0],"sugerencia",$sugId);

		$response = $this->model_sugerencia->m_eliminar_rpta($sugId);
		$accion="Eliminar Sugerencia";
		$this->model_auditoria_actividades->m_registrar_auditoria_actividades($accion);
		//$response['message'] = "Se registraron los datos correctamente";
		echo json_encode($response);
	}
	

	
}