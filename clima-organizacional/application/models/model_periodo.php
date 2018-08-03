<?php 
class Model_periodo extends CI_Model{

	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	 
	public function m_listar_periodo_actual(){
		$this->db->from("periodo");
 		$this->db->where("estper",1);
 		 
   		$datos= $this->db->get();
		return $datos->result_array();
	
	}


	public function m_lista_periodo(){

		$this->db->from("periodo");
				
   		$datos= $this->db->get();
		return $datos->result_array();
	}
	

}