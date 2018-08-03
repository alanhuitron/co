<?php 
class Model_perfiles extends CI_Model{

	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function m_lista_perfiles($pag,$busqueda){
		
		$inicio = ($pag-1)*10; 


		$sql = "select * from perfil "; 

		if($busqueda!='empty'){
			$sql=$sql." and (nomper like '%".$busqueda."%' or desper like '%".$busqueda."%') ";
		}

		$sql= $sql . " limit ".$inicio.", 10 "; 
		 
		 
   		$datos= $this->db->query($sql);
		return $datos->result_array();
	}


	public function m_count_lista_perfiles($busqueda){
		
		$sql = " select COUNT(*) as contador,nomper,desper from perfil   ";
	 
		
		if($busqueda!='empty'){
			$sql=$sql." and (nomper like '%".$busqueda."%' or desper like '%".$busqueda."%') ";
		}		
		 
   		$datos= $this->db->query($sql);
		return $datos->result_array();
	}

	 
	public function m_registrar($data){
		return $this->db->insert('perfil',$data);
	}

	public function m_listar_esta_perfil($idperfil){

		$this->db->from("perfil");
 		$this->db->where("idperfil",$idperfil);
 		 
   		$datos= $this->db->get();
		return $datos->result_array();
	}
	
	public function m_editar($data){
		$this->db->where('idperfil',$data['idperfil']);
		return $this->db->update('perfil',$data);
	}

	public function m_eliminar($idperfil){

		 
		$this->db->where('idperfil',$idperfil);
		return $this->db->delete('perfil');

	}

	public function m_lista_perfiles_cbo(){

		$this->db->from("perfil");
		 
		
   		$datos= $this->db->get();
		return $datos->result_array();
	}
}	