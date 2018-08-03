<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Division extends CI_Controller {
 
 	public function __construct(){
 		parent::__construct();
 		$this->load->model('model_division');
 		//$this->load->library('session');
 	}
 

	public function listar_divisiones_cbo(){

		$lista = $this->model_division->m_lista_divisiones_cbo();
		$this->output->set_content_type('aplication/json');
		$this->output->set_output(json_encode($lista));
	}
}