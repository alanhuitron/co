<?php 
class Model_estrategia extends CI_Model{

	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function m_lista_estrategias($pag,$busqueda){
		

		//var_dump($busqueda);exit();
		$inicio = ($pag-1)*10; 


		$sql = "select * from estrategias e inner join variables v on e.idvariable=v.idvariable where e.estestra=1"; 

		if($busqueda!='empty'){
			$sql=$sql." and (e.nomestra like '%".$busqueda."%' or v.desvar like '%".$busqueda."%') ";
		}

		$sql= $sql . " limit ".$inicio.", 10 "; 
		 
		 
   		$datos= $this->db->query($sql);
		return $datos->result_array();
	}


	public function m_count_lista_estrategias($busqueda){
		
		$sql = " select COUNT(*) as contador,e.nomestra,v.desvar from estrategias e inner join variables v on e.idvariable=v.idvariable where 
		e.estestra=1 ";
	 
		
		if($busqueda!='empty'){
			$sql=$sql." and (e.nomestra like '%".$busqueda."%' or v.desvar like '%".$busqueda."%') ";
		}		
		 
   		$datos= $this->db->query($sql);
		return $datos->result_array();
	}

	 
	public function m_registrar($data){
		return $this->db->insert('estrategias',$data);
	}

	public function m_listar_esta_estrategia($idestrategia){

		$this->db->from("estrategias");
		$this->db->join("variables","estrategias.idvariable=variables.idvariable");
		$this->db->join("dimensiones","variables.iddimension=dimensiones.iddimension");
 		$this->db->where("idestrategia",$idestrategia);
 		 
   		$datos= $this->db->get();
		return $datos->result_array();
	}
	
	public function m_listar_esta_estrategia2($idestrategia){

		$this->db->from("estrategias");
		
		
 		$this->db->where("idestrategia",$idestrategia);
 		 
   		$datos= $this->db->get();
		return $datos->result_array();
	}

	public function m_editar($data){
		$this->db->where('idestrategia',$data['idestrategia']);
		return $this->db->update('estrategias',$data);
	}

	public function m_eliminar($idestrategia){

		 
		$this->db->where('idestrategia',$idestrategia);
		return $this->db->delete('estrategias');

	}

	 
	 public function m_lista_est_med($idvar){
		
		 


		$sql = "select * from estrategias where estestra=1 and idvariable=".$idvar; 

	 
		 
		 
   		$datos= $this->db->query($sql);
		return $datos->result_array();
	}
}	