<?php 
class Model_sugerencia extends CI_Model{

	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function m_registrar($data){
		return $this->db->insert('sugerencia',$data);
	}
	
	public function m_registrar_rptasug($data){
		return $this->db->insert('sugerencia_respuesta',$data);
	}

	public function m_lista_sugerencias($pag,$busqueda){
		
		$inicio = ($pag-1)*10; 


		$sql = "select s.idsugerencia,s.nomsug,s.dessug,sr.desres from sugerencia s
				left join sugerencia_respuesta sr  on s.idsugerencia=sr.idsugerencia where s.estsug=1"; 

		if($busqueda!='empty'){
			$sql=$sql." and (s.nomsug like '%".$busqueda."%' or s.dessug like '%".$busqueda."%') ";
		}

		$sql= $sql . " order by estsug DESC limit ".$inicio.", 10 "; 
		 
		 
   		$datos= $this->db->query($sql);
		return $datos->result_array();
	}


	public function m_count_lista_sugerencias($busqueda){
		
		$sql = " select COUNT(*) as contador,s.nomsug,s.dessug from sugerencia s
				left join sugerencia_respuesta sr on s.idsugerencia=sr.idsugerencia where s.estsug=1 ";
	 
		
		if($busqueda!='empty'){
			$sql=$sql." and (s.nomsug like '%".$busqueda."%' or s.dessug like '%".$busqueda."%') ";
		}		
		 
   		$datos= $this->db->query($sql);
		return $datos->result_array();
	}

	public function m_eliminar($idsugerencia){

		 
		$this->db->where('idsugerencia',$idsugerencia);
		return $this->db->delete('sugerencia');

	}

	public function m_eliminar_rpta($idsugerencia){
 		

		$this->db->where('idsugerencia',$idsugerencia);
		return $this->db->delete('sugerencia_respuesta');

	}


	public function m_listar_esta_sugerencia($idsug){

		$this->db->from("sugerencia");
 		$this->db->where("idsugerencia",$idsug);
 		 
   		$datos= $this->db->get();
		return $datos->result_array();
	}
}