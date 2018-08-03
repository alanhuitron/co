<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cuestionario extends CI_Controller {
 
 	public function __construct(){
 		parent::__construct();
 		$this->load->model(array('model_cuestionario','model_auditoria_actividades','model_auditoria_log'));
 		//$this->load->library('session');
 	}

 	public function ver_cuestionario()
	{	
		$accion="Ver Cuestionario";
		$this->model_auditoria_actividades->m_registrar_auditoria_actividades($accion);
		$this->load->view('cuestionario/cuestionario');
	}

	public function ver_cuestionario_asignacion()
	{	
		$accion="Ver Cuestionario-Asignación";
		$this->model_auditoria_actividades->m_registrar_auditoria_actividades($accion);
		$this->load->view('cuestionario/cuestionario_asignacion');
	}

	 

	public function ver_popupcueasi()
	{	
		$accion="Ver PopUp Cuestionario-Asignación";
		$this->model_auditoria_actividades->m_registrar_auditoria_actividades($accion);
		$this->load->view('cuestionario/popupcuestionario_asignacion');
	}

	


	public function listar_cuestionarios(){

	 	$lista = $this->model_cuestionario->m_lista_cuestionario();

	 	$arrFinal = array();
	 	$id='';
	 	$i=0;
	 	$iddimension='';
	 	$iddimension2='';

	 	foreach ($lista as $key => $value) {
			if($value['idcuestionario'] != $id){
				$arrTmp1 = array (
					'idcuestionario' => $value['idcuestionario'],
					'descue' => $value['descue'],
					
 					'edad' => '',
					'cargo' => '',
					'sueldo' => '',
					'tieper' =>'',
					'iddivision' => '-',
					'dimensiones'=>array()
				);

				$id=$value['idcuestionario'];
				$arrFinal['cuestionario'] = $arrTmp1;
			}

			if($value['iddimension'] != $iddimension){
				$arrTmp2 = array(
					'iddimension' => $value['iddimension'],
					'desdim' => $value['desdim'],
					
					'variables' => array()
				);

				$iddimension=$value['iddimension'];
				$arrFinal['cuestionario']['dimensiones'][$i] = $arrTmp2;
				$arrTmp2=array();
				$i++;
			}



	 	}

	 	foreach ($arrFinal['cuestionario']['dimensiones'] as $key1 => $value1) {

	 		$arrVariables = array();
	 	 	foreach ($lista as $key2 => $value2) {

	 	 		if($value1['iddimension']==$value2['iddimension']){

	 	 			$arrTmp3 = array(
	 	 				'idvariable' => $value2['idvariable'],
	 	 				'desvar' => $value2['desvar'],
	 	 				'idcuedet' =>$value2['idcuedet'],
	 	 				'valor' => 'variable'.$value2['idvariable']
	 	 			);
	 	 			
	 	 			$arrVariables[] = $arrTmp3;


	 	 		}
	 	 	}

	 	 	$arrFinal['cuestionario']['dimensiones'][$key1]['variables']=$arrVariables;

	 	}


	 	$accion="Listar Cuestionarios";
		$this->model_auditoria_actividades->m_registrar_auditoria_actividades($accion);
		$this->output->set_content_type('aplication/json');
		$this->output->set_output(json_encode($arrFinal));
	 }

	 public function registrar_cuestionario(){
	 	$p = json_decode(trim(file_get_contents('php://input')),true);
	 	//var_dump('<pre>',$p['cuestionario']);exit();
	 	$lista = array();
	 	$lista=$p['cuestionario']['dimensiones'];

	 	$data['idcuestionario']	=	$p['cuestionario']['idcuestionario'];
	 	$data['idusuario'] 		=   $this->session->userdata('userid');
		$data['iddivision']		=	$p['cuestionario']['iddivision'];
		$data['edad']	        =	$p['cuestionario']['edad'];
		$data['cargo']			=	$p['cuestionario']['cargo'];
		$data['sueldo']			=	$p['cuestionario']['sueldo'];
		$data['tieper']			=	$p['cuestionario']['tieper'];
 		
 		//$this->model_cuestionario->m_registrar_cuestionario_usuario($data);

 		foreach ($lista as $key => $value) {
 			foreach ($value['variables'] as $key => $value2) {
 			 
 			 	$datad['idcuedet'] = $value2['idcuedet'];
 			 	$datad['idusuario']= $this->session->userdata('userid');
 			 	$datad['respuesta']= $value2['valor'];
 			 	$this->model_cuestionario->m_registrar_usuario_respuesta($datad);
 			}
 		}
		

 		$accion="Registrar Cuestionario";
		$this->model_auditoria_actividades->m_registrar_auditoria_actividades($accion);
		$response['message'] = "Se registraron los datos correctamente";
		echo json_encode($response);
	 }

	 public function registrar_cuestionario_asi(){

		$p = json_decode(trim(file_get_contents('php://input')),true);

		$data['idperiodo'] = $this->session->userdata('idperiodo');
		$data['descue'] = $p['descripcion'];
		$data['estcue'] = 0;

		$this->model_cuestionario->m_registrar_cue_asi($data);

		/* REGISTRO AUDITORIA LOG - INSERT */
		$data['idcuestionario']=$this->db->insert_id();
		$this->model_auditoria_log->m_registro_auditoria_log($data,"cuestionario");

		$accion="Registrar Cuestionario Asignación";
		$this->model_auditoria_actividades->m_registrar_auditoria_actividades($accion);

		$response['message'] = "Se registraron los datos correctamente";
		echo json_encode($response);

	 }


	 public function listar_cuestionarios_pag($pag,$busqueda){


		$lista['data']=$this->model_cuestionario->m_lista_cuestionarios_pag($pag,$busqueda);
		 
		$contador = $this->model_cuestionario->m_count_lista_cuestionarios($busqueda);
		$lista['contador'] = $contador;
		// var_dump('<pre>',$lista);exit();
		$accion="Listar Cuestonarios Paginación";
		$this->model_auditoria_actividades->m_registrar_auditoria_actividades($accion);

		$this->output->set_content_type('aplication/json');
		$this->output->set_output(json_encode($lista));
	 }

}