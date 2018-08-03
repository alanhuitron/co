<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {
 
 	public function __construct(){
 		parent::__construct();
 		$this->load->model(array('model_usuario','model_auditoria_actividades','model_auditoria_log'));
 		 
 		 
 	}

 	public function ver_usuarios()
	{
		$accion="Ver Usuarios";
		$this->model_auditoria_actividades->m_registrar_auditoria_actividades($accion);
		$this->load->view('usuarios/usuarios');
	}

	public function ver_popupusuarios(){

		$accion="Ver PopUp Usuarios";
		$this->model_auditoria_actividades->m_registrar_auditoria_actividades($accion);

		$this->load->view('usuarios/popupusuarios');
	}

	public function listar_usuarios($pag,$busqueda){
		
		$lista['data']=$this->model_usuario->m_lista_usuarios($pag,$busqueda);
		 
		$contador = $this->model_usuario->m_count_lista_usuarios($busqueda);
		$lista['contador'] = $contador;
		// var_dump('<pre>',$lista);exit();
		$this->output->set_content_type('aplication/json');
		$this->output->set_output(json_encode($lista));
		// var_dump(json_encode($lista));exit();
	}

	public function registrar_usuarios(){
		$p = json_decode(trim(file_get_contents('php://input')),true);
		// $file = $_FILES["file"]["imagen"];
		// var_dump($file,'file');
		//var_dump('<pre>',$p);exit();
		$data['nomusu']				=	substr($p['nombres'],0,3).substr($p['apellidos'],0,3);
		$data['emailusu']			=	$p['email'];
		$data['pasusu']				=	base64_encode(substr($p['nombres'],0,3).substr($p['apellidos'],0,3));
		$data['nombres']			=	$p['nombres'];
		$data['apellidos']			=	$p['apellidos'];
		$data['dni']				=	$p['dni'];
		$data['iddivision']			=	$p['iddivision'];
		$data['cargo']				=	$p['cargo'];
		$data['salario']			=   $p['salario'];
		$data['edad']				=	$p['edad'];
		$data['fecingreso']			=	$p['fecingreso'];
		$data['estusu']			=	2;
		$data['idperfil']			=	$p['idperfil'];

		$response = $this->model_usuario->m_registrar($data);
		
		/* REGISTRO AUDITORIA LOG - INSERT */
	  	$data['idusuario']=$this->db->insert_id();
		$this->model_auditoria_log->m_registro_auditoria_log($data,"usuario");

		/* REGISTRO AUDITORIA ACTIVIDADES*/
		$accion="Registrar Usuarios";
		$this->model_auditoria_actividades->m_registrar_auditoria_actividades($accion);
		

		echo json_encode($response);
	}

	public function listar_esta_usuario($idusuario){

		$lista=$this->model_usuario->m_listar_esta_usuario($idusuario);


		$this->output->set_content_type('aplication/json');
		$this->output->set_output(json_encode($lista));
		// var_dump(json_encode($lista));exit();
	}

	public function editar(){
		$p = json_decode(trim(file_get_contents('php://input')),true);

		$data['idusuario']			= 	$p['id'];
		$data['emailusu']			=	$p['email'];		
		$data['nombres']			=	$p['nombres'];
		$data['apellidos']			=	$p['apellidos'];
		$data['dni']				=	$p['dni'];
		$data['iddivision']			=	$p['iddivision'];
		$data['cargo']				=	$p['cargo'];
		$data['salario']			=   $p['salario'];
		$data['edad']				=	$p['edad'];
		$data['fecingreso']			=	$p['fecingreso'];
		$data['estusu']				=	$p['estusu'];
		$data['idperfil']			=	$p['idperfil'];

		$dataAnt=$this->model_usuario->m_listar_esta_usuario($p['id']);
		$response = $this->model_usuario->m_editar($data);

		/* REGISTRO AUDITORIA LOG - EDITAR */
		$this->model_auditoria_log->m_editar_auditoria_log($data,$dataAnt,"usuario",$p['id']);

		$accion="Editar Usuarios";
		$this->model_auditoria_actividades->m_registrar_auditoria_actividades($accion);
		//$response['message'] = "Se registraron los datos correctamente";
		echo json_encode($response);
	}

	public function eliminar_usuarios($usuId){
		$response = $this->model_usuario->m_eliminar($usuId);

		/* REGISTRO AUDITORIA LOG - EDITAR */
		$dataAnt[0]['estusu']=2;
		$data['estusu']=1;
		$this->model_auditoria_log->m_editar_auditoria_log($data,$dataAnt,"usuario",$usuId);


		$accion="Eliminar Usuarios";
		$this->model_auditoria_actividades->m_registrar_auditoria_actividades($accion);

		//$response['message'] = "Se registraron los datos correctamente";
		echo json_encode($response);
	}

	public function activar_usuario($usuId){
		$response = $this->model_usuario->m_activar($usuId);

		/* REGISTRO AUDITORIA LOG - EDITAR */
		$dataAnt[0]['estusu']=1;
		$data['estusu']=2;
		$this->model_auditoria_log->m_editar_auditoria_log($data,$dataAnt,"usuario",$usuId);

		$accion="Activar Usuario";
		$this->model_auditoria_actividades->m_registrar_auditoria_actividades($accion);

		//$response['message'] = "Se registraron los datos correctamente";
		echo json_encode($response);
	}

	public function mi_perfil()
	{
		$accion="Ver mi perfil";
		$this->model_auditoria_actividades->m_registrar_auditoria_actividades($accion);
		$this->load->view('usuarios/miperfil');
	}

	public function ver_popupcambiapass(){

		$accion="Ver popUP cambio clave";
		$this->model_auditoria_actividades->m_registrar_auditoria_actividades($accion);
		$this->load->view('usuarios/popupcambioclave');

	}

}