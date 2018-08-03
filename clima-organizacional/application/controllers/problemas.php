<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Problemas extends CI_Controller {
 
 	public function __construct(){
 		parent::__construct();
 		$this->load->model(array('model_problemas','model_auditoria_actividades'));
 		//$this->load->library('session');
 	}


 	
	public function ver_problemas()
	{	
		$accion="Ver Problemas";
		$this->model_auditoria_actividades->m_registrar_auditoria_actividades($accion);

		$this->load->view('problemas/problemas');
	}
	
	public function ver_popupproblemasdetallado()
	{	

		$accion="Ver PopUp PopuP Problemas Detallado";
		$this->model_auditoria_actividades->m_registrar_auditoria_actividades($accion);

		$this->load->view('problemas/popupproblemasdet');
	}

	public function listar_problemas($pag){
		
		$lista=$this->model_problemas->m_lista_problemas();
		$idv='';
		$i=0;
		$arrFinal = array();
		$arrFinalAlterno = array();
		foreach ($lista as $key => $value) {

			$arrTmp=array();

			if($value['idvariable']!=$idv){

				$arrTmp = array(
					'idcuedet'		  	=> $value['idcuedet'],      		
					'idcueusures'     	=> $value['idcueusures'],
					'idcuestionario'  	=> $value['idcuestionario'],  
					'iddimension'     	=> $value['iddimension'],
					'nomdim'     		=> $value['nomdim'],
					'idvariable'    	=> $value['idvariable'],
					'desvar'    		=> $value['desvar'],
					'respuesta'    		=> $value['respuesta'],
					'cantidad'    		=> $value['cantidad']
				);

				$arrFinal['data'][$i]=$arrTmp;
				$i++;
				$idv=$value['idvariable'];
			}
		}

		/*$inicio = ($pag-1)*10; 
		$acu=0;	

		while($acu<10){

			$arrFinal['data'][$acu]=$arrFinalAlterno['data'][$inicio+$acu];

			$acu++;
		}*/



		$contador = $this->model_problemas->m_count_lista_problemas();
		$arrFinal['contador'] = $contador;
		 

		//var_dump($arrFinal,'<pre>');exit();
		$this->output->set_content_type('aplication/json');
		$this->output->set_output(json_encode($arrFinal));
		 
	}
	 
	public function listar_problemas_detalle($idvar){

		$lista=$this->model_problemas->m_lista_problemas_detallado($idvar);
		$arrFinal=array();

		for ($i=1;$i<=5;$i++){
			$arrTmp=array();
			foreach ($lista as $key => $value) {

				if($i==1){
					$des="Totalmente de Acuerdo";
				}
				if($i==2){
					$des="De acuerdo";
				}
				if($i==3){
					$des="Medianamente de acuerdo";
				}
				if($i==4){
					$des="En Desacuerdo";
				}
				if($i==5){
					$des="Totalmente en desacuerdo";
				}




				if($i==$value['respuesta']){

					$arrTmp = array(
						"id" =>$i,
						"cantidad"=>$value['cantidad'],
						'descripcion' =>$des
					);
					break;
				}
				else{
					$arrTmp = array(
						"id" =>$i,
						"cantidad"=>0,
						'descripcion' =>$des
					);
				}

				 
			}

			$arrFinal[$i]=$arrTmp;
		}

		//var_dump($arrFinal,'<pre>');exit();
		$this->output->set_content_type('aplication/json');
		$this->output->set_output(json_encode($arrFinal));
	}
}