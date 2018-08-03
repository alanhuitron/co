<?php 
class Model_problemas extends CI_Model{

	public function __construct(){
		parent::__construct();
		$this->load->database();
	}


	public function m_lista_problemas(){
		
		


		$sql = "select cd.idcuedet,cr.idcueusures,cd.idcuestionario,cd.iddimension,d.nomdim,cd.idvariable,v.desvar,cr.respuesta,COUNT(cr.respuesta) as cantidad FROM cuestionario_usuario_respuesta cr INNER JOIN cuestionario_detalle cd ON cr.idcuedet=cd.idcuedet INNER JOIN cuestionario c ON cd.idcuestionario = c.idcuestionario INNER JOIN periodo p ON c.idperiodo = p.idperiodo AND p.estper=1 INNER JOIN dimensiones d on cd.iddimension=d.iddimension INNER JOIN variables v on cd.idvariable = v.idvariable GROUP BY cd.idcuedet, cr.respuesta order by cd.iddimension,cd.idvariable,COUNT(cr.respuesta) desc,cr.respuesta"; 
 
		 
		 
   		$datos= $this->db->query($sql);
		return $datos->result_array();
	}


	public function m_count_lista_problemas(){
		
		$sql = " select count(*) FROM cuestionario_detalle cd 
				inner join cuestionario c on cd.idcuestionario=C.idcuestionario
				inner join periodo p on c.idperiodo=p.idperiodo where p.estper=1 ";
	 
		 	
		 
   		$datos= $this->db->query($sql);
		return $datos->result_array();
	}


	public function m_lista_problemas_detallado($idvar){

		$sql="select cd.idcuedet,cr.idcueusures,cd.idcuestionario,cd.iddimension,d.nomdim,cd.idvariable,v.desvar,cr.respuesta,COUNT(cr.respuesta) as cantidad FROM cuestionario_usuario_respuesta cr 
		INNER JOIN cuestionario_detalle cd ON cr.idcuedet=cd.idcuedet 
		INNER JOIN cuestionario c ON cd.idcuestionario = c.idcuestionario 
		INNER JOIN periodo p ON c.idperiodo = p.idperiodo AND p.estper=1 
		INNER JOIN dimensiones d on cd.iddimension=d.iddimension 
		INNER JOIN variables v on cd.idvariable = v.idvariable where v.idvariable=".$idvar." GROUP BY cd.idcuedet, cr.respuesta order by cd.iddimension,cd.idvariable,COUNT(cr.respuesta) desc,cr.respuesta";
	
		$datos= $this->db->query($sql);
		return $datos->result_array();
	}

}