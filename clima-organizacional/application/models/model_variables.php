<?php 
class Model_variables extends CI_Model{

	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function m_lista_variables($pag,$busqueda){
		
		$inicio = ($pag-1)*10; 
		$sql = "select * from variables v inner join dimensiones d 
		   on v.iddimension = d.iddimension where v.estvar=1 ";

		if($busqueda!='empty'){
			$sql=$sql."and (nomvar like '%".$busqueda."%' or desvar like '%".$busqueda."%' or nomdim like '%".$busqueda."%')";
		}

		$sql= $sql . " limit ".$inicio.", 10 "; 
		 
		 
   		$datos= $this->db->query($sql);
		return $datos->result_array();
	}

	public function m_count_lista_variables($busqueda){
		$sql=" select COUNT(*) as contador,nomvar,desvar,nomdim from variables v inner join dimensiones d 
		   on v.iddimension = d.iddimension where v.estvar=1 ";
	 	
	 	if($busqueda!='empty'){
			$sql=$sql." and (nomvar like '%".$busqueda."%' or desvar like '%".$busqueda."%' or nomdim like '%".$busqueda."%')";
		}
			
		 
   		$datos= $this->db->query($sql);
		return $datos->result_array();
	}

	public function m_registrar($data){
		return $this->db->insert('variables',$data);
	}

	public function m_listar_esta_variable($varId){

		$this->db->from("variables");
 		$this->db->where("idvariable",$varId);
 		 
   		$datos= $this->db->get();
		return $datos->result_array();
	}
	
	public function m_editar($data){
		$this->db->where('idvariable',$data['idvariable']);
		return $this->db->update('variables',$data);
	}

	public function m_eliminar($varId){

		
		$this->db->where('idvariable',$varId);
		return $this->db->delete('variables');

	}

	public function m_variable_x_dimension($dimId){



		$sql = "select d.desdim,v.idvariable,v.desvar FROM cuestionario_detalle cd 
		INNER JOIN variables v on cd.idvariable = v.idvariable
		INNER JOIN dimensiones d on cd.iddimension = d.iddimension
		where cd.iddimension=".$dimId ." and cd.idcuestionario=5";

		$datos= $this->db->query($sql);
		return $datos->result_array();

	}


	public function m_listar_variables_cbo($dimId){

		$this->db->from("variables");
		$this->db->where("iddimension",$dimId);
		$this->db->where("estvar","1");
		
   		$datos= $this->db->get();
		return $datos->result_array();
	}

}