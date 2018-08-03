<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Medidas extends CI_Controller {
 
 	public function __construct(){
 		parent::__construct();
 		$this->load->model(array('model_medidas','model_auditoria_actividades','model_auditoria_log'));
 		//$this->load->library('session');
 	}

 	 

	public function ver_popupmedidas()
	{	
		$accion="Ver PopUp Medidas Correctivas";
		$this->model_auditoria_actividades->m_registrar_auditoria_actividades($accion);


		$this->load->view('medidas/popupmedidas');
	}

	public function ver_medidas(){

		$accion="Ver Medidas Correctivas";
		$this->model_auditoria_actividades->m_registrar_auditoria_actividades($accion);

		$this->load->view('medidas/medidas');
	}

	public function listar_medidas($idvar){
		
		$lista['data']=$this->model_medidas->m_lista_medidas($idvar);
		

		$this->output->set_content_type('aplication/json');
		$this->output->set_output(json_encode($lista));
		// var_dump(json_encode($lista));exit();
	}


	public function registrar_medidas(){
		$p = json_decode(trim(file_get_contents('php://input')),true);
		// $file = $_FILES["file"]["imagen"];
		// var_dump($file,'file');
		//var_dump('<pre>',$p);exit();
		$data['idvariable']		=	$p['idvariable'];
		$data['nommed']	=	$p['nombre'];

		$response = $this->model_medidas->m_registrar($data);

		/* REGISTRO AUDITORIA LOG - INSERT */
		$data['idmedidad']=$this->db->insert_id();
		$this->model_auditoria_log->m_registro_auditoria_log($data,"medidas");


		$accion="Registrar Medidas Correctivas";
		$this->model_auditoria_actividades->m_registrar_auditoria_actividades($accion);

		//$response['message'] = "Se registraron los datos correctamente";
		echo json_encode($response);
	}

 

	public function eliminar_medidas($medId){
		$data=$this->model_medidas->m_lista_medidas2($medId);
		$response = $this->model_medidas->m_eliminar($medId);

			/* REGISTRO AUDITORIA LOG - ELIMINAR */
		$this->model_auditoria_log->m_eliminar_auditoria_log($data[0],"medidas",$medId);

		$accion="Eliminar Medidas Correctivas";
		$this->model_auditoria_actividades->m_registrar_auditoria_actividades($accion);
		//$response['message'] = "Se registraron los datos correctamente";
		echo json_encode($response);
	}

	 
	 public function listar_medidas_pag($pag,$busqueda){
		
		$lista['data']=$this->model_medidas->m_lista_medidas_pag($pag,$busqueda);
		 
		$contador = $this->model_medidas->m_count_lista_medidas_pag($busqueda);
		$lista['contador'] = $contador;
		// var_dump('<pre>',$lista);exit();
		$this->output->set_content_type('aplication/json');
		$this->output->set_output(json_encode($lista));
		// var_dump(json_encode($lista));exit();
	}
	
}