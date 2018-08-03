<?php 
class Model_cuestionario extends CI_Model{

	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	 
	public function m_lista_cuestionario(){

		
		$sql = "select c.idcuestionario,c.descue,cd.idcuedet,d.iddimension,d.desdim,v.idvariable,v.desvar,cd.idcuedet

			from cuestionario c 
			inner join cuestionario_detalle cd on c.idcuestionario=cd.idcuestionario 
			inner join dimensiones d on cd.iddimension = d.iddimension 
			inner join variables v on cd.idvariable=v.idvariable 
			inner join periodo p on c.idperiodo=p.idperiodo  where p.estper=1
            order by c.idcuestionario,cd.iddimension,cd.idvariable";
		 
		
   		$datos= $this->db->query($sql);
		return $datos->result_array();
	}

	public function m_registrar_cuestionario_usuario($data){
		return $this->db->insert('cuestionario_usuario',$data);
	}

	public function m_registrar_usuario_respuesta($data){
		return $this->db->insert('cuestionario_usuario_respuesta',$data);
	}
	
	public function m_lista_cuestionarios_pag($pag,$busqueda){
		
		$inicio = ($pag-1)*10; 


		$sql = "select * from cuestionario c
				inner join periodo p on c.idperiodo = p.idperiodo   "; 

		if($busqueda!='empty'){
			$sql=$sql." where (c.descue like '%".$busqueda."%' or p.mesini like '%".$busqueda."%' or p.mesfin like '%".$busqueda."%' or p.anio like '%".$busqueda."%') ";
		}

		$sql= $sql . " limit ".$inicio.", 10 "; 
		 
		 
   		$datos= $this->db->query($sql);
		return $datos->result_array();
	}

	public function m_count_lista_cuestionarios($busqueda){
		
		$sql = " select COUNT(*) as contador,c.descue,p.mesini,p.mesfin,p.anio from cuestionario c
				 inner join periodo p on c.idperiodo = p.idperiodo  ";
	 
		
		if($busqueda!='empty'){
			$sql=$sql." where (c.descue like '%".$busqueda."%' or p.mesini like '%".$busqueda."%' or p.mesfin like '%".$busqueda."%' or p.anio like '%".$busqueda."%') ";
		}		
		 
   		$datos= $this->db->query($sql);
		return $datos->result_array();
	}

	public function m_registrar_cue_asi($data){
		return $this->db->insert('cuestionario',$data);
	}
	

}	