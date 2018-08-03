<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Variables extends CI_Controller {
 
 	public function __construct(){
 		parent::__construct();
 		$this->load->model(array('model_variables','model_auditoria_actividades','model_auditoria_log'));
 		//$this->load->library('session');
 	}

 	public function ver_variables()
	{	
		$accion="Ver Variables";
		$this->model_auditoria_actividades->m_registrar_auditoria_actividades($accion);

		$this->load->view('variables/variables');
	}

	public function ver_popupvariables()
	{	
		$accion="Ver PopUp Variables";
		$this->model_auditoria_actividades->m_registrar_auditoria_actividades($accion);

		$this->load->view('variables/popupvariables');
	}

	public function listar_variables($pag,$busqueda){
		
		$lista['data']=$this->model_variables->m_lista_variables($pag,$busqueda);
		 
		$contador = $this->model_variables->m_count_lista_variables($busqueda);

		//var_dump($contador,'<pre>');exit();



		$lista['contador'] = $contador;
		// var_dump('<pre>',$lista);exit();
		$this->output->set_content_type('aplication/json');
		$this->output->set_output(json_encode($lista));
		// var_dump(json_encode($lista));exit();
	}

	public function registrar_variables(){
		$p = json_decode(trim(file_get_contents('php://input')),true);
		// $file = $_FILES["file"]["imagen"];
		// var_dump($file,'file');
		//var_dump('<pre>',$p);exit();
		$data['nomvar']			=	$p['nombre'];
		$data['desvar']			=	$p['descripcion'];
		$data['iddimension']	=	$p['dimId'];

		$response = $this->model_variables->m_registrar($data);

		/* REGISTRO AUDITORIA LOG - INSERT */
		$data['idvariable']=$this->db->insert_id();
		$this->model_auditoria_log->m_registro_auditoria_log($data,"variables");



		$accion="Registrar Variables";
		$this->model_auditoria_actividades->m_registrar_auditoria_actividades($accion);

		//$response['message'] = "Se registraron los datos correctamente";
		echo json_encode($response);
	}

	public function listar_esta_variable($varId){

		$lista=$this->model_variables->m_listar_esta_variable($varId);


		$this->output->set_content_type('aplication/json');
		$this->output->set_output(json_encode($lista));
		// var_dump(json_encode($lista));exit();
	}

	public function editar(){
		$p = json_decode(trim(file_get_contents('php://input')),true);

		// var_dump('<pre>',$p);exit();
		$data['idvariable'] = $p['id'] ;
		$data['nomvar']		=	$p['nombre'];
		$data['desvar']	=	$p['descripcion'];
		$data['iddimension']	=	$p['dimId'];

		$dataAnt=$this->model_variables->m_listar_esta_variable($p['id']);
		$response = $this->model_variables->m_editar($data);

		/* REGISTRO AUDITORIA LOG - EDITAR */
		$this->model_auditoria_log->m_editar_auditoria_log($data,$dataAnt,"variables",$p['id']);

		//$response['message'] = "Se registraron los datos correctamente";
		$accion="Editar Variables";
		$this->model_auditoria_actividades->m_registrar_auditoria_actividades($accion);
		echo json_encode($response);
	}

	public function eliminar_variables($varId){
		$data=$this->model_variables->m_listar_esta_variable($varId);
		$response = $this->model_variables->m_eliminar($varId);

		/* REGISTRO AUDITORIA LOG - ELIMINAR */
		$this->model_auditoria_log->m_eliminar_auditoria_log($data[0],"variables",$varId);


		//$response['message'] = "Se registraron los datos correctamente";
		$accion="Eliminar Variables";
		$this->model_auditoria_actividades->m_registrar_auditoria_actividades($accion);
		echo json_encode($response);
	}


	public function listar_variable_x_dimension($dimId){

		$lista=$this->model_variables->m_variable_x_dimension($dimId);

		$arrFinal = array();

		foreach ($lista as $key => $value) {
			
			$arrTmp= array (
				'desdim' => $value['desdim'],
				'idvariable' => $value['idvariable'],
				'desvar' => $value['desvar'],
				'valor' => 'variable'.$value['idvariable']

			);

			$arrFinal[$key]=$arrTmp;
		}
		$this->output->set_content_type('aplication/json');
		$this->output->set_output(json_encode($arrFinal));
		// var_dump(json_encode($lista));exit();
	}

	public function listar_variables_cbo($dimId){

		$lista = $this->model_variables->m_listar_variables_cbo($dimId);
		$this->output->set_content_type('aplication/json');
		$this->output->set_output(json_encode($lista));
	}

}