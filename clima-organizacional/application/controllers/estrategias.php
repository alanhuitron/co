<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Estrategias extends CI_Controller {
 
 	public function __construct(){
 		parent::__construct();
 		$this->load->model(array('model_estrategia','model_auditoria_actividades','model_auditoria_log'));
 		//$this->load->library('session');
 	}

 	public function ver_estrategias()
	{	
		$accion="Ver Estrategias";
		$this->model_auditoria_actividades->m_registrar_auditoria_actividades($accion);


		$this->load->view('estrategias/estrategias');
	}

	public function ver_popupestrategias()
	{
		$accion="Ver PopUp Estrategias";
		$this->model_auditoria_actividades->m_registrar_auditoria_actividades($accion);


		$this->load->view('estrategias/popupestrategias');
	}

	
	public function ver_popupestrategiaproblema()
	{	
		$accion="Ver PopUp Estrategia Problema";
		$this->model_auditoria_actividades->m_registrar_auditoria_actividades($accion);


		$this->load->view('estrategias/popupestrategiaspro');
	}

	public function listar_estrategias($pag,$busqueda){
		
		$lista['data']=$this->model_estrategia->m_lista_estrategias($pag,$busqueda);
		 
		$contador = $this->model_estrategia->m_count_lista_estrategias($busqueda);
		$lista['contador'] = $contador;
		// var_dump('<pre>',$lista);exit();

		$accion="Listar Estrategias";
		$this->model_auditoria_actividades->m_registrar_auditoria_actividades($accion);


		$this->output->set_content_type('aplication/json');
		$this->output->set_output(json_encode($lista));
		// var_dump(json_encode($lista));exit();
	}


	public function registrar_estrategias(){
		$p = json_decode(trim(file_get_contents('php://input')),true);
		

		

		
		foreach ($p['arrEstrategias'] as $key => $value) {

			$data['idvariable']=$p['varId'];
			$data['nomestra']=$value['nombre'];
			$response = $this->model_estrategia->m_registrar($data);

			/* REGISTRO AUDITORIA LOG - INSERT */
			$data['idestrategia']=$this->db->insert_id();
			$this->model_auditoria_log->m_registro_auditoria_log($data,"estrategias");
 			unset($data);
 		}
		 

		 
		$accion="Registrar Estrategias";
		$this->model_auditoria_actividades->m_registrar_auditoria_actividades($accion);

		//$response['message'] = "Se registraron los datos correctamente";
		echo json_encode($response);
	}

	public function listar_esta_estrategia($idestrategia){

		$lista=$this->model_estrategia->m_listar_esta_estrategia($idestrategia);


		$this->output->set_content_type('aplication/json');
		$this->output->set_output(json_encode($lista));
		// var_dump(json_encode($lista));exit();
	}

	public function editar(){
		$p = json_decode(trim(file_get_contents('php://input')),true);

		// var_dump('<pre>',$p);exit();
		$data['idestrategia'] = $p['id'] ;
		$data['idvariable']		=	$p['varId'];
		$data['nomestra'] = $p['arrEstrategias'][0]['nombre'];

		$dataAnt=$this->model_estrategia->m_listar_esta_estrategia2($p['id']);
		$response = $this->model_estrategia->m_editar($data);

		/* REGISTRO AUDITORIA LOG - EDITAR */
		$this->model_auditoria_log->m_editar_auditoria_log($data,$dataAnt,"estrategias",$p['id']);

		$accion="Editar Estrategias";
		$this->model_auditoria_actividades->m_registrar_auditoria_actividades($accion);


		//$response['message'] = "Se registraron los datos correctamente";
		echo json_encode($response);
	}

	public function eliminar_estrategias($estId){

		$data=$this->model_estrategia->m_listar_esta_estrategia2($estId);
		$response = $this->model_estrategia->m_eliminar($estId);

		/* REGISTRO AUDITORIA LOG - ELIMINAR */
		$this->model_auditoria_log->m_eliminar_auditoria_log($data[0],"estrategias",$estId);

		$accion="Eliminar Estrategias";
		$this->model_auditoria_actividades->m_registrar_auditoria_actividades($accion);


		//$response['message'] = "Se registraron los datos correctamente";
		echo json_encode($response);
	}

	public function listar_est_variable($idvar){
		
		$lista['data']=$this->model_estrategia->m_lista_est_med($idvar);
		 
		$this->output->set_content_type('aplication/json');
		$this->output->set_output(json_encode($lista));
		// var_dump(json_encode($lista));exit();
	}

	 
	 
	
}