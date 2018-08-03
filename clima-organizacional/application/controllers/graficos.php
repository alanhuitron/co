<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Graficos extends CI_Controller {
 
 	public function __construct(){
 		parent::__construct();
 		$this->load->model(array('model_graficos','model_periodo','model_auditoria_actividades'));
 		//$this->load->library('session');
 	}

 	public function ver_graficos_variables()
	{	
		$accion="Ver gráficos Variables";
		$this->model_auditoria_actividades->m_registrar_auditoria_actividades($accion);

		$this->load->view('graficos/graficos_variables');
	}
	
	public function ver_graficos_dimensiones()
	{	
		$accion="Ver Gráfico Dimensiones";
		$this->model_auditoria_actividades->m_registrar_auditoria_actividades($accion);

		$this->load->view('graficos/graficos_dimensiones');
	}

	public function ver_graficos_historico()
	{	
		$accion="Ver Gráfico Historico";
		$this->model_auditoria_actividades->m_registrar_auditoria_actividades($accion);


		$this->load->view('graficos/graficos_historicos');
	}
	

	public function listar_datapiexvariable($iddim){

		$lista = $this->model_graficos->m_listar_piexvariable($iddim);
		$arrFinal = array();
		$iddim='';$idvar='';
		$suma =0;


		foreach ($lista as $key => $value) {

			if($value['iddimension']!=$iddim){

				$arrTmp = array(
					'iddimension' => $value['iddimension'],
					'desdim' => $value['desdim'],
					'variables'=>array()
				);

				$iddim=$value['iddimension'];
				$arrFinal['dimension'][$key]=$arrTmp;
			}
			
 		}

 		

 		//var_dump($arrFinal,'<pre>');exit();
 		foreach ($arrFinal['dimension'] as $key1 => $value1) {
 			$arrVariables = array();
	 		foreach ($lista as $key2 => $value2) {

	 				if($value1['iddimension']==$value2['iddimension']){
	 					
	 					
						

						if($value2['idvariable']!=$idvar){
							
							$arrTmp1= array(
							'idvariable' => $value2['idvariable'],
							'variable' => $value2['desvar'],
							'suma' => 0,
							'data_grafico' =>array()
	
							);
							
							$idvar = $value2['idvariable'];
							$arrVariables[]=$arrTmp1;
						}


						

					}

			}
			$arrFinal['dimension'][$key1]['variables'] = $arrVariables;
 		}

 		 

 		foreach ($arrFinal['dimension'] as $key3 => $value3) {
 			
 			foreach ($value3['variables'] as $key4 => $value4) {
 				$suma=0;
 				foreach ($lista as $key5 => $value5) {
 					if($value4['idvariable']==$value5['idvariable']){
 						$suma=$suma+$value5['cantidad'];
 					}
 				}

				$arrFinal['dimension'][$key3]['variables'][$key4]['suma']=$suma;
 			}
			
 		}



 		$ses=0;
 		foreach ($arrFinal['dimension'] as $key6 => $value6) {
 			foreach ($value6['variables'] as $key7 => $value7) {
 				$arrDataGrafico=array();
 				$ses++;
 				foreach ($lista as $key8 => $value8) {

 					if($value7['idvariable'] == $value8['idvariable']){
 						$porcentaje=($value8['cantidad']*100)/$value7['suma'];
 						$arrTmp2= array(
 							'name' =>$value8['DescValor'],
 							'y'=> $porcentaje
 						);
 						$arrDataGrafico[]=$arrTmp2;
 					}
 				}
 				$arrFinal['dimension'][$key6]['variables'][$key7]['data_grafico']=$arrDataGrafico;
 			}
 		}


		//var_dump($arrFinal,'<pre>');exit();
		$this->session->set_userdata('contpie',$ses);
		$this->output->set_content_type('aplication/json');
		$this->output->set_output(json_encode($arrFinal));
	}
	 
	public function listar_databarraxvariable($iddim){

		$lista = $this->model_graficos->m_listar_piexvariable($iddim);
		$arrFinal = array();
		$iddim='';$idvar='';
		$suma =0;


		foreach ($lista as $key => $value) {

			if($value['iddimension']!=$iddim){

				$arrTmp = array(
					'iddimension' => $value['iddimension'],
					'desdim' => $value['desdim'],
					'variables'=>array()
				);

				$iddim=$value['iddimension'];
				$arrFinal['dimension'][$key]=$arrTmp;
			}
			
 		}

 		

 		//var_dump($arrFinal,'<pre>');exit();
 		foreach ($arrFinal['dimension'] as $key1 => $value1) {
 			$arrVariables = array();
	 		foreach ($lista as $key2 => $value2) {

	 				if($value1['iddimension']==$value2['iddimension']){
	 					
	 					
						

						if($value2['idvariable']!=$idvar){
							
							$arrTmp1= array(
							'idvariable' => $value2['idvariable'],
							'variable' => $value2['desvar'],
							'suma' => 0,
							'data_grafico' =>array()
	
							);
							
							$idvar = $value2['idvariable'];
							$arrVariables[]=$arrTmp1;
						}


						

					}

			}
			$arrFinal['dimension'][$key1]['variables'] = $arrVariables;
 		}

 		 

 		foreach ($arrFinal['dimension'] as $key3 => $value3) {
 			
 			foreach ($value3['variables'] as $key4 => $value4) {
 				$suma=0;
 				foreach ($lista as $key5 => $value5) {
 					if($value4['idvariable']==$value5['idvariable']){
 						$suma=$suma+$value5['cantidad'];
 					}
 				}


 				$arrFinal['dimension'][$key3]['variables'][$key4]['suma']=$suma;
 			}

			
 		}



 		$ses=0;
 		foreach ($arrFinal['dimension'] as $key6 => $value6) {
 			foreach ($value6['variables'] as $key7 => $value7) {
 				$arrDataGrafico=array();
 				$ses++;
 				foreach ($lista as $key8 => $value8) {

 					if($value7['idvariable'] == $value8['idvariable']){
 						$porcentaje=($value8['cantidad']*100)/$value7['suma'];
 						$arrTmp2= array(
 							'name' =>$value8['DescValor'],
 							'y'=> $porcentaje,
 							'drilldown' =>$value8['DescValor']
 						);
 						$arrDataGrafico[]=$arrTmp2;
 					}
 				}
 				$arrFinal['dimension'][$key6]['variables'][$key7]['data_grafico']=$arrDataGrafico;
 			}
 		}


		//var_dump($arrFinal,'<pre>');exit();
		$this->session->set_userdata('contpie',$ses);
		$this->output->set_content_type('aplication/json');
		$this->output->set_output(json_encode($arrFinal));
	}
	

	public function listar_barraxdimension(){

		$lista = $this->model_graficos->m_listar_barraxvariable();

		$arraFinal = array();
		$rpta=0;
		foreach ($lista as $key => $value) {

			if($value['respuesta']!=$rpta){

				

				$arrTmp = array(
					 
					'name' => $value['DescValor'],
					'data'=>array()
				);

				$rpta=$value['respuesta'];
				$arrFinal['arrInfo'][]=$arrTmp;
			}

		}


		foreach ($arrFinal['arrInfo'] as $key2 => $value2) {
			$arrTmp=array();
			foreach ($lista as $key3 => $value3) {
				if($value2['name'] == $value3['DescValor']){
					 $arrTmp[]=(int)$value3['cantidad'];
				}
			}
			$arrFinal['arrInfo'][$key2]['data']=$arrTmp;
		}


		//var_dump($arrFinal,'<pre>');exit();

		$this->output->set_content_type('aplication/json');
		$this->output->set_output(json_encode($arrFinal));
	}	


	public function listar_piexdimension($criterioId){
		$lista = $this->model_graficos->m_listar_piedimensiones($criterioId);
		$arrFinal=array();
		
		foreach ($lista as $key => $value) {

			 $arrTmp = array(
			 	'name'=>$value['desdim'],
			 	'y'=>(int)$value['cantidad']
			 );

			 $arrFinal['datagrafico'][]=$arrTmp;
			 $nombre=$value['DescValor'];
			 $arrTmp=array();
		}
		$arrFinal['titulo']=$nombre;
		//var_dump($arrFinal,'<pre>');exit();

		$this->output->set_content_type('aplication/json');
		$this->output->set_output(json_encode($arrFinal));

	}


	public function listar_databarrahistorica($iddim){
		$lista = $this->model_graficos->m_listar_historico($iddim);
		$arrFinal = array();

		 $rpta=0;
		foreach ($lista as $key => $value) {

			if($value['respuesta']!=$rpta){

				

				$arrTmp = array(
					 
					'name' => $value['DescValor'],
					'data'=>array()
				);

				$rpta=$value['respuesta'];
				$arrFinal['arrInfo'][]=$arrTmp;
			}

		}

		foreach ($arrFinal['arrInfo'] as $key2 => $value2) {
			$arrTmp=array();
			foreach ($lista as $key3 => $value3) {
				if($value2['name'] == $value3['DescValor']){
					 $arrTmp[]=(int)$value3['cantidad'];
				}
			}
			$arrFinal['arrInfo'][$key2]['data']=$arrTmp;
		}



		$this->output->set_content_type('aplication/json');
		$this->output->set_output(json_encode($arrFinal));
	}

	public function lista_periodo(){
		$lista = $this->model_periodo->m_lista_periodo();

		$arrTmp= array();
		foreach ($lista as $key => $value) {
 			$arrTmp[$key]=$value['mesini']."-".$value['mesfin']."/".$value['anio'];


 		}


		//var_dump($lista,'<pre>');exit();
		$this->output->set_content_type('aplication/json');
		$this->output->set_output(json_encode($arrTmp));

	}
}