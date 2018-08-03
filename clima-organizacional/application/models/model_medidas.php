<?php 
class Model_medidas extends CI_Model{

	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function m_lista_medidas($idvar){
		
		 


		$sql = "select * from medidas where estmed=1 and idvariable=".$idvar; 

	 
		 
		 
   		$datos= $this->db->query($sql);
		return $datos->result_array();
	}

	public function m_lista_medidas2($idmed){
		
		 


		$sql = "select * from medidas where estmed=1 and idmedida=".$idmed; 

	 
		 
		 
   		$datos= $this->db->query($sql);
		return $datos->result_array();
	}

	 

	 
	public function m_registrar($data){
		return $this->db->insert('medidas',$data);
	}

	 
	
	 
	public function m_eliminar($idmedida){

		 
		$this->db->where('idmedida',$idmedida);
		return $this->db->delete('medidas');

	}

	
	public function m_lista_medidas_pag($pag,$busqueda){
		
		$inicio = ($pag-1)*10; 


		$sql = "select * FROM medidas m 
inner join variables v on m.idvariable=v.idvariable
inner join dimensiones d on v.iddimension=d.iddimension
where m.estmed=1 "; 

		if($busqueda!='empty'){
			$sql=$sql." and (m.nommed like '%".$busqueda."%' or v.desvar like '%".$busqueda."%' or d.desdim like '%".$busqueda."%' ) ";
		}

		$sql= $sql . " limit ".$inicio.", 10 "; 
		 
		 
   		$datos= $this->db->query($sql);
		return $datos->result_array();
	}


	public function m_count_lista_medidas_pag($busqueda){
		
		$sql = " select COUNT(*) as contador,m.nommed,v.desvar,d.desdim FROM medidas m 
inner join variables v on m.idvariable=v.idvariable
inner join dimensiones d on v.iddimension=d.iddimension
where m.estmed=1  ";
	 
		
		if($busqueda!='empty'){
			$sql=$sql." and (m.nommed like '%".$busqueda."%' or v.desvar like '%".$busqueda."%' or d.desdim like '%".$busqueda."%' ) ";
		}		
		 
   		$datos= $this->db->query($sql);
		return $datos->result_array();
	}


}	