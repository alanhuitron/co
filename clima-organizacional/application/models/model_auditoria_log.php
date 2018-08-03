<?php 
class Model_auditoria_log extends CI_Model{

	public function __construct(){
		parent::__construct();
		$this->load->database();
		date_default_timezone_set('America/Lima');
	}

		 
	public function m_registro_auditoria_log($datos,$tabla){

		
		$data = array();
		$data= array_keys($datos);
		$regId = $this->db->insert_id();
		 
		foreach ($data as $key => $value) {
			
			$info = array(
			 	"audlog_nombretabla" => $tabla,
			 	"audlog_regid" => $regId,
			 	"audlog_campotabla" => $value,
			 	"audlog_valoranterior" => "",
			 	"audlog_valornuevo" => $datos[$value],
			 	"audlog_operacion" => "INSERTAR",
			 	"audlog_usuario" => $this->session->userdata('userid'),
			 	"audlog_fechahora" => date("Y-m-d H:i:s"),
			 	"audlog_ip" =>$this->input->ip_address()
			);

			$this->db->insert('auditoria_log',$info);
		}
		

		return 'ok';
	}

	public function m_editar_auditoria_log($datos,$dataAnt,$tabla,$regId){

		

		$data = array();
		$data= array_keys($datos);
		foreach ($data as $key => $value) {
			
			if($datos[$value] != $dataAnt[0][$value] ){
				$info = array(
				 	"audlog_nombretabla" => $tabla,
				 	"audlog_regid" => $regId,
				 	"audlog_campotabla" => $value,
				 	"audlog_valoranterior" => $dataAnt[0][$value],
				 	"audlog_valornuevo" => $datos[$value],
				 	"audlog_operacion" => "EDITAR",
				 	"audlog_usuario" => $this->session->userdata('userid'),
				 	"audlog_fechahora" => date("Y-m-d H:i:s"),
				 	"audlog_ip" =>$this->input->ip_address()
				);
	
				$this->db->insert('auditoria_log',$info);
			}

		}

	}

	public function m_eliminar_auditoria_log($datos,$tabla,$regId){

		
		$data = array();
		$data= array_keys($datos);
	 
		 
		foreach ($data as $key => $value) {
			
			$info = array(
			 	"audlog_nombretabla" => $tabla,
			 	"audlog_regid" => $regId,
			 	"audlog_campotabla" => $value,
			 	"audlog_valoranterior" => $datos[$value],
			 	"audlog_valornuevo" => "",
			 	"audlog_operacion" => "ELIMINAR",
			 	"audlog_usuario" => $this->session->userdata('userid'),
			 	"audlog_fechahora" => date("Y-m-d H:i:s"),
			 	"audlog_ip" =>$this->input->ip_address()
			);

			$this->db->insert('auditoria_log',$info);
		}
		

		return 'ok';
	}

	 

}	