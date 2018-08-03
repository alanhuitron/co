<?php 
class Model_graficos extends CI_Model{

	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	 
	public function m_listar_piexvariable($iddim){

		/*$sql ="select count(cusu.respuesta) as cantidad,v.idvariable,v.desvar,cusu.respuesta,
			IF(cusu.respuesta= 1,'Totalmente de Acuerdo',IF(cusu.respuesta=2,'De acuerdo',IF(cusu.respuesta=3,'Medianamente de acuerdo',
			IF(cusu.respuesta=4,'En Desacuerdo',IF(cusu.respuesta=5,'totalmente en desacuerdo','Other'))))) as DescValor
			FROM cuestionario_usuario_respuesta cusu 
			INNER JOIN cuestionario_detalle cd on cusu.idcuedet = cd.idcuedet
			INNER JOIN variables v on cd.idvariable = v.idvariable where v.idvariable=1 group by cusu.respuesta";
*/

			$sql="select d.iddimension,d.desdim,v.idvariable,v.desvar,cusu.respuesta, count(cusu.respuesta) as cantidad, 
			IF(cusu.respuesta= 1,'Totalmente de Acuerdo',IF(cusu.respuesta=2,'De acuerdo',IF(cusu.respuesta=3,'Medianamente de acuerdo', IF(cusu.respuesta=4,'En Desacuerdo',IF(cusu.respuesta=5,'totalmente en desacuerdo','Other'))))) as DescValor 
			FROM cuestionario_usuario_respuesta cusu 
			INNER JOIN cuestionario_detalle cd on cusu.idcuedet = cd.idcuedet and cd.idcuestionario=5
			INNER JOIN variables v on cd.idvariable = v.idvariable 
			INNER JOIN dimensiones d on cd.iddimension = d.iddimension where d.iddimension=".$iddim." group by cusu.respuesta,v.idvariable
			order by cd.idcuedet";

		$datos= $this->db->query($sql);
		return $datos->result_array();
	}

	public function m_listar_barraxvariable(){

		$sql=" select d.iddimension,d.desdim,v.idvariable,v.desvar,cusu.respuesta,
 count(cusu.respuesta) as cantidad, IF(cusu.respuesta= 1,'Totalmente de Acuerdo',
 	IF(cusu.respuesta=2,'De acuerdo',IF(cusu.respuesta=3,'Medianamente de acuerdo', IF(cusu.respuesta=4,'En Desacuerdo',IF(cusu.respuesta=5,'totalmente en desacuerdo','Other'))))) as DescValor 
FROM cuestionario_usuario_respuesta cusu 
INNER JOIN cuestionario_detalle cd on cusu.idcuedet = cd.idcuedet and cd.idcuestionario=5 
INNER JOIN variables v on cd.idvariable = v.idvariable 
INNER JOIN dimensiones d on cd.iddimension = d.iddimension 
group by cusu.respuesta,d.iddimension 
order by cusu.respuesta,d.iddimension,v.idvariable";
	
 		$datos= $this->db->query($sql);
		return $datos->result_array();

	}

	public function m_listar_piedimensiones($idcriterio){
		$sql="select d.iddimension,d.desdim,v.idvariable,v.desvar,cusu.respuesta,
		 count(cusu.respuesta) as cantidad, IF(cusu.respuesta= 1,'Totalmente de Acuerdo', 
		 	IF(cusu.respuesta=2,'De acuerdo',IF(cusu.respuesta=3,'Medianamente de acuerdo', 
		 		IF(cusu.respuesta=4,'En Desacuerdo',IF(cusu.respuesta=5,'totalmente en desacuerdo','Other'))))) as DescValor 
FROM cuestionario_usuario_respuesta cusu 
INNER JOIN cuestionario_detalle cd on cusu.idcuedet = cd.idcuedet  and cd.idcuestionario=5 
INNER JOIN variables v on cd.idvariable = v.idvariable 
INNER JOIN dimensiones d on cd.iddimension = d.iddimension 
group by cusu.respuesta,d.iddimension having cusu.respuesta=".$idcriterio." order by cusu.respuesta,d.iddimension,v.idvariable";

$datos= $this->db->query($sql);
		return $datos->result_array();
	}

	 public function m_listar_historico($iddim){

	 	$sql=" select cusu.respuesta, count(cusu.respuesta) as cantidad, cd.idcuestionario,
	 	IF(cusu.respuesta= 1,'Totalmente de Acuerdo', IF(cusu.respuesta=2,'De acuerdo',IF(cusu.respuesta=3,'Medianamente de acuerdo', 
	 		IF(cusu.respuesta=4,'En Desacuerdo',IF(cusu.respuesta=5,'totalmente en desacuerdo','Other'))))) as DescValor 
FROM cuestionario_usuario_respuesta cusu INNER JOIN cuestionario_detalle cd on cusu.idcuedet = cd.idcuedet ";
	
	if($iddim!='-'){
			$sql=$sql." and cd.iddimension=".$iddim;
	}
	


    $sql=$sql." group by cusu.respuesta,cd.idcuestionario, cd.iddimension order by cusu.respuesta,cd.idcuestionario";

		$datos= $this->db->query($sql);
		return $datos->result_array();
		
	 }


}