<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
 
 	public function __construct(){
 		parent::__construct();
 		$this->load->model(array('model_usuario','model_periodo','model_auditoria_actividades'));
 		//$this->load->library('session');
 	}

 
 
	public function index(){
		 		 

			if(!empty($_POST['password']) && !empty($_POST['user'])    ){

			

				if($this->model_usuario->login($_POST['user'],$_POST['password'])){

					$dataUsuario=$this->model_usuario->listar_este_usuario($_POST['user']);
					$periodo=$this->model_periodo->m_listar_periodo_actual();


					$this->session->set_userdata('userid',$dataUsuario[0]['idusuario']);

					$this->session->set_userdata('nomdivision',$dataUsuario[0]['nomdivision']);
					$this->session->set_userdata('edad',$dataUsuario[0]['edad']);
					$this->session->set_userdata('cargo',$dataUsuario[0]['cargo']);
					$this->session->set_userdata('salario',$dataUsuario[0]['salario']);
					$this->session->set_userdata('fecingreso',$dataUsuario[0]['fecingreso']);

					$this->session->set_userdata('idperiodo',$periodo[0]['idperiodo']);
					$this->session->set_userdata('periodo','De '. $periodo[0]['mesini'].' a '.$periodo[0]['mesfin'].' del '.$periodo[0]['anio']);

					$idperfil = $dataUsuario[0]['idperfil'];
					if($idperfil == 1){
						$this->session->set_userdata('perfil',$idperfil);
						$this->session->set_userdata('nombre',$dataUsuario[0]['nomusu']);
					}

					if($idperfil == 2){
						$this->session->set_userdata('perfil',$idperfil);
						$this->session->set_userdata('nombre',$dataUsuario[0]['nomusu']);
					}

					if($idperfil == 3){
						$this->session->set_userdata('perfil',$idperfil);
						$this->session->set_userdata('nombre',$dataUsuario[0]['nomusu']);
					}

					$usuario_data = array(
   		 				'logueado' => TRUE,
   						'user' =>$_POST['user']
					);

						
					$accion="Inicio de Sesión";
					$this->model_auditoria_actividades->m_registrar_auditoria_actividades($accion);
					$this->session->set_userdata('message','');
					$this->session->set_userdata($usuario_data);
					$this->session->unset_userdata('message');
					redirect('principal');
			 	}
		 		else{

		 			$accion="Parámetros de inicio de sesión inválidos";
					$this->model_auditoria_actividades->m_registrar_auditoria_actividades($accion);
		 			$this->session->set_userdata('logueado',FALSE);
		 			$this->session->set_userdata('message','Usuario y/o Contraseña inválidos');
					redirect('principal');
				}
			
	        }
	        else{
	        	
	        	$accion="Parametros de inicio de sesión inválidos";
				$this->model_auditoria_actividades->m_registrar_auditoria_actividades($accion);
	        	$this->session->set_userdata('logueado',FALSE);
	        	$this->session->set_userdata('message','Usuario y/o Contraseña inválidos');
	        	redirect('principal');
	        }
	}

	public function logout(){
		//$this->session->sess_destroy();
		 
		$usuario_data = array(
   			'logueado' => FALSE
		);

		$accion="Cierre de Sesión";
		$this->model_auditoria_actividades->m_registrar_auditoria_actividades($accion);

		$this->session->set_userdata($usuario_data);
		//var_dump($this->session->userdata('logueado'),'logout');exit();
		redirect('principal');
	}

	public function ver_popup_confirmacion(){
		$this->load->view('confirmacion');
	}

	
}