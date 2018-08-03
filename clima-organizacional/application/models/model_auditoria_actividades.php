<?php 
class Model_auditoria_actividades extends CI_Model{

	public function __construct(){
		parent::__construct();
		$this->load->database();
		date_default_timezone_set('America/Lima');
	}

	 
	 

	public function m_registrar_auditoria_actividades($accion){

		$datos['audact_accion']=$accion;
		$datos['audact_usuario']=$this->session->userdata('userid');
		
		$hoy = date("Y-m-d H:i:s");  
		$datos['audact_fechahora']=$hoy;

		$datos['audact_ip']=$this->input->ip_address();

		return $this->db->insert('auditoria_actividades',$datos);
	}

	 

}	