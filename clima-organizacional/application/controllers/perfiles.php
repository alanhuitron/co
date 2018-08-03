<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perfiles extends CI_Controller {
 
 	public function __construct(){
 		parent::__construct();
 		$this->load->model(array('model_perfiles','model_auditoria_actividades','model_auditoria_log'));
 		//$this->load->library('session');
 	}

 	public function ver_perfiles()
	{	
		$accion="Ver Perfiles";
		$this->model_auditoria_actividades->m_registrar_auditoria_actividades($accion);

		$this->load->view('perfil/perfiles');
	}

	public function ver_popupperfiles()
	{
		$accion="Ver PopUp Perfiles";
		$this->model_auditoria_actividades->m_registrar_auditoria_actividades($accion);

		$this->load->view('perfil/popupperfiles');
	}

	public function listar_perfiles($pag,$busqueda){
		
		$lista['data']=$this->model_perfiles->m_lista_perfiles($pag,$busqueda);
		 
		$contador = $this->model_perfiles->m_count_lista_perfiles($busqueda);
		$lista['contador'] = $contador;
		 


		$this->output->set_content_type('aplication/json');
		$this->output->set_output(json_encode($lista));
		 
	}


	public function registrar_perfiles(){
		$p = json_decode(trim(file_get_contents('php://input')),true);
		 
		$data['nomper']		=	$p['nombre'];
		$data['desper']	=	$p['descripcion'];

		$response = $this->model_perfiles->m_registrar($data);

		/* REGISTRO AUDITORIA LOG - INSERT */
		$data['idperfil']=$this->db->insert_id();
		$this->model_auditoria_log->m_registro_auditoria_log($data,"perfil");

		/* REGISTRO AUDITORIA ACTIVIDADES*/
		$accion="Registrar Perfiles";
		$this->model_auditoria_actividades->m_registrar_auditoria_actividades($accion);


		
		echo json_encode($response);
	}

	public function listar_esta_perfil($idperfil){

		$lista=$this->model_perfiles->m_listar_esta_perfil($idperfil);


		$this->output->set_content_type('aplication/json');
		$this->output->set_output(json_encode($lista));
		// var_dump(json_encode($lista));exit();
	}

	public function editar(){
		$p = json_decode(trim(file_get_contents('php://input')),true);

		// var_dump('<pre>',$p);exit();
		$data['idperfil'] = $p['id'] ;
		$data['nomper']		=	$p['nombre'];
		$data['desper']	=	$p['descripcion'];

		$dataAnt=$this->model_perfiles->m_listar_esta_perfil($p['id']);
		$response = $this->model_perfiles->m_editar($data);
		
		/* REGISTRO AUDITORIA LOG - EDITAR */
		$this->model_auditoria_log->m_editar_auditoria_log($data,$dataAnt,"perfil",$p['id']);

		/* REGISTRO AUDITORIA ACTIVIDADES*/
		$accion="Editar Perfiles";
		$this->model_auditoria_actividades->m_registrar_auditoria_actividades($accion);
		
		echo json_encode($response);
	}

	public function eliminar_perfiles($perId){
		
		$data=$this->model_perfiles->m_listar_esta_perfil($perId);
		$response = $this->model_perfiles->m_eliminar($perId);

		/* REGISTRO AUDITORIA LOG - ELIMINAR */
		$this->model_auditoria_log->m_eliminar_auditoria_log($data[0],"perfil",$perId);

		/* REGISTRO AUDITORIA ACTIVIDADES*/
		$accion="Eliminar Perfiles";
		$this->model_auditoria_actividades->m_registrar_auditoria_actividades($accion);
		//$response['message'] = "Se registraron los datos correctamente";
		echo json_encode($response);
	}

	public function listar_perfiles_cbo(){

		$lista = $this->model_perfiles->m_lista_perfiles_cbo();
		$this->output->set_content_type('aplication/json');
		$this->output->set_output(json_encode($lista));
	}

	 
	
}