<?php 
class model_usuario extends CI_Model{

	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function login($username,$password){
		/*nos devuelve una fila es por que existe*/


		//var_dump(password_hash($password,PASSWORD_DEFAULT));exit();


		 $this->db->from('usuario');
		 $this->db->where('nomusu',$username);
		 
		 //$this->db->where('pasusu',password_hash($password));
		 $this->db->where('pasusu',base64_encode($password));

		 $this->db->where('estusu',2);
		 $q=$this->db->get();

		 //var_dump($q->result_array());exit();
		 if($q->num_rows()>0){
		 	return true;
		 }
		 else{
		 	return false;
		 }
	}

	public function listar_este_usuario($nomusu){

		$this->db->from("usuario");
		$this->db->join("division","usuario.iddivision=division.iddivision");
		$this->db->where('nomusu',$nomusu);
		
		$this->db->where('estusu',2);
		 
   		$datos= $this->db->get();
		return $datos->result_array();

	}

	public function m_lista_usuarios($pag,$busqueda){
		
		$inicio = ($pag-1)*10; 


		$sql = "select * from usuario u
		inner join perfil p on u.idperfil=p.idperfil
		inner join division d on u.iddivision=d.iddivision
		where u.estusu in (0,1,2) "; 

		if($busqueda!='empty'){
			$sql=$sql." and (u.nomusu like '%".$busqueda."%' or u.nombres like '%".$busqueda."%' or u.apellidos like '%".$busqueda."%' or u.dni like '%".$busqueda."%') ";
		}

		$sql= $sql . " order by u.idusuario limit ".$inicio.", 10 "; 
		 
		 
   		$datos= $this->db->query($sql);
		return $datos->result_array();
	}

	public function m_count_lista_usuarios($busqueda){
		
		$sql = " select COUNT(*) as contador,nomusu,nombres,apellidos,dni from usuario where estusu in (0,1,2) ";
	 
		
		if($busqueda!='empty'){
			$sql=$sql." and (nomusu like '%".$busqueda."%' or nombres like '%".$busqueda."%' or apellidos like '%".$busqueda."%' or dni like '%".$busqueda."%') ";
		}		
		 
   		$datos= $this->db->query($sql);
		return $datos->result_array();
	}

	public function m_registrar($data){
		return $this->db->insert('usuario',$data);
	}

	public function m_listar_esta_usuario($idusuario){

		$this->db->from("usuario");
 		$this->db->where("idusuario",$idusuario);
 		 
   		$datos= $this->db->get();
		return $datos->result_array();
	}
	
	public function m_editar($data){
		$this->db->where('idusuario',$data['idusuario']);
		return $this->db->update('usuario',$data);
	}

	public function m_eliminar($idusuario){

		$data = array(
			'estusu' => 1
		);
		$this->db->where('idusuario',$idusuario);
		return $this->db->update('usuario',$data);

	}

	public function m_activar($idusuario){

		$data = array(
			'estusu' => 2
		);
		$this->db->where('idusuario',$idusuario);
		return $this->db->update('usuario',$data);

	}
 
}