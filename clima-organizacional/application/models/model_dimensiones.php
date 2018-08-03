<?php 
class Model_dimensiones extends CI_Model{

	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function m_lista_dimensiones($pag,$busqueda){
		
		$inicio = ($pag-1)*10; 


		$sql = "select * from dimensiones where estdim=1 "; 

		if($busqueda!='empty'){
			$sql=$sql." and (nomdim like '%".$busqueda."%' or desdim like '%".$busqueda."%') ";
		}

		$sql= $sql . " limit ".$inicio.", 10 "; 
		 
		 
   		$datos= $this->db->query($sql);
		return $datos->result_array();
	}

	public function m_lista_dimensiones_pag($pag){
		
		$inicio = ($pag-1)*1; 
		$sql = "select DISTINCT(d.iddimension),d.desdim from cuestionario_detalle cd 
		inner join dimensiones d on cd.iddimension=d.iddimension where cd.idcuestionario=5 

		order by d.iddimension  limit ".$inicio.", 1 "; 
		 
		 
   		$datos= $this->db->query($sql);
		return $datos->result_array();
	}

	public function m_count_lista_dimensiones($busqueda){
		
		$sql = " select COUNT(*) as contador,desdim,nomdim from dimensiones where estdim=1 ";
	 
		
		if($busqueda!='empty'){
			$sql=$sql." and (nomdim like '%".$busqueda."%' or desdim like '%".$busqueda."%') ";
		}		
		 
   		$datos= $this->db->query($sql);
		return $datos->result_array();
	}

	public function m_count_lista_dimensiones_pag(){
		
		$sql = "select count(DISTINCT(d.iddimension)) AS contador from cuestionario_detalle cd 
		inner join dimensiones d on cd.iddimension=d.iddimension 
		where cd.idcuestionario=5 order by d.iddimension";
 
			
		 
   		$datos= $this->db->query($sql);
		return $datos->result_array();
	}

	public function m_registrar($data){
		return $this->db->insert('dimensiones',$data);
	}

	public function m_listar_esta_dimension($dimId){

		$this->db->from("dimensiones");
 		$this->db->where("iddimension",$dimId);
 		 
   		$datos= $this->db->get();
		return $datos->result_array();
	}
	
	public function m_editar($data){
		$this->db->where('iddimension',$data['iddimension']);
		return $this->db->update('dimensiones',$data);
	}

	public function m_eliminar($dimId){

		
		$this->db->where('iddimension',$dimId);
		return $this->db->delete('dimensiones');

	}

	public function m_lista_dimensiones_cbo(){

		$this->db->from("dimensiones");
		$this->db->where("estdim","1");
		
   		$datos= $this->db->get();
		return $datos->result_array();
	}
}	