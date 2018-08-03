<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dimensiones extends CI_Controller {
 
 	public function __construct(){
 		parent::__construct();
 		$this->load->model(array('model_dimensiones','model_auditoria_actividades','model_auditoria_log'));
 		//$this->load->library('session');
 	}

 	public function ver_dimensiones()
	{

		$accion="Ver Dimensiones";
		$this->model_auditoria_actividades->m_registrar_auditoria_actividades($accion);

		$this->load->view('dimensiones/dimensiones');
	}

	public function ver_popupdimensiones()
	{
		$accion="Ver PopUp Dimensiones";
		$this->model_auditoria_actividades->m_registrar_auditoria_actividades($accion);
		$this->load->view('dimensiones/popupdimensiones');
	}

	public function listar_dimensiones($pag,$busqueda){
		
		$lista['data']=$this->model_dimensiones->m_lista_dimensiones($pag,$busqueda);
		 
		$contador = $this->model_dimensiones->m_count_lista_dimensiones($busqueda);
		$lista['contador'] = $contador;
		// var_dump('<pre>',$lista);exit();
		$accion="Listar Dimensiones";
		$this->model_auditoria_actividades->m_registrar_auditoria_actividades($accion);

		$this->output->set_content_type('aplication/json');
		$this->output->set_output(json_encode($lista));
		// var_dump(json_encode($lista));exit();
	}

	public function listar_dimensiones_pag($pag){
		
		$lista['data']=$this->model_dimensiones->m_lista_dimensiones_pag($pag);
		 
		$contador = $this->model_dimensiones->m_count_lista_dimensiones_pag();
		$lista['contador'] = $contador;
		// var_dump('<pre>',$lista);exit();

		$accion="Listar Dimensiones Paginacion";
		$this->model_auditoria_actividades->m_registrar_auditoria_actividades($accion);

		$this->output->set_content_type('aplication/json');
		$this->output->set_output(json_encode($lista));
		// var_dump(json_encode($lista));exit();
	}


	public function registrar_dimensiones(){
		$p = json_decode(trim(file_get_contents('php://input')),true);
		// $file = $_FILES["file"]["imagen"];
		// var_dump($file,'file');
		//var_dump('<pre>',$p);exit();
		$data['nomdim']		=	$p['nombre'];
		$data['desdim']	=	$p['descripcion'];

		$response = $this->model_dimensiones->m_registrar($data);

		/* REGISTRO AUDITORIA LOG - INSERT */
		$data['iddimension']=$this->db->insert_id();
		$this->model_auditoria_log->m_registro_auditoria_log($data,"dimensiones");

		$accion="Registrar Dimensiones";
		$this->model_auditoria_actividades->m_registrar_auditoria_actividades($accion);

		

		//$response['message'] = "Se registraron los datos correctamente";
		echo json_encode($response);
	}

	public function listar_esta_dimension($dimId){

		$lista=$this->model_dimensiones->m_listar_esta_dimension($dimId);

		$this->output->set_content_type('aplication/json');
		$this->output->set_output(json_encode($lista));
		// var_dump(json_encode($lista));exit();
	}

	public function editar(){
		$p = json_decode(trim(file_get_contents('php://input')),true);

		// var_dump('<pre>',$p);exit();
		$data['iddimension'] = $p['id'] ;
		$data['nomdim']		=	$p['nombre'];
		$data['desdim']	=	$p['descripcion'];

		$dataAnt=$this->model_dimensiones->m_listar_esta_dimension($p['id']);
		$response = $this->model_dimensiones->m_editar($data);

		/* REGISTRO AUDITORIA LOG - EDITAR */
		$this->model_auditoria_log->m_editar_auditoria_log($data,$dataAnt,"dimensiones",$p['id']);


		$accion="Editar dimension";
		$this->model_auditoria_actividades->m_registrar_auditoria_actividades($accion);

		//$response['message'] = "Se registraron los datos correctamente";
		echo json_encode($response);
	}

	public function eliminar_dimensiones($dimId){

		$data=$this->model_dimensiones->m_listar_esta_dimension($dimId);
		$response = $this->model_dimensiones->m_eliminar($dimId);

		/* REGISTRO AUDITORIA LOG - ELIMINAR */
		$this->model_auditoria_log->m_eliminar_auditoria_log($data[0],"dimensiones",$dimId);


		$accion="Eliminar Dimension";
		$this->model_auditoria_actividades->m_registrar_auditoria_actividades($accion);

		//$response['message'] = "Se registraron los datos correctamente";
		echo json_encode($response);
	}

	public function listar_dimensiones_cbo(){

		$lista = $this->model_dimensiones->m_lista_dimensiones_cbo();
		$this->output->set_content_type('aplication/json');
		$this->output->set_output(json_encode($lista));
	}

	public function listar_dimensiones_cbo2(){

		$lista = $this->model_dimensiones->m_lista_dimensiones_cbo();

		$data = array();
		foreach ($lista as $key => $value) {
			$data[$key]=$value['nomdim'];
		}
		 

		//var_dump($data,'<pre>');exit();
		$this->output->set_content_type('aplication/json');
		$this->output->set_output(json_encode($data));
	}
	
}