<?php 
class Model_division extends CI_Model{

	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	 
	public function m_lista_divisiones_cbo(){

		$this->db->select("iddivision,nomdivision");
		$this->db->from("division");
		$this->db->where("estdiv","1");
		
   		$datos= $this->db->get();
		return $datos->result_array();
	}
}	