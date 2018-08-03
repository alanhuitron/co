<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Principal extends CI_Controller {
 
 	public function __construct(){
 		parent::__construct();
 		//$this->load->model('model_usuario');
 		//$this->load->library('session');
 	}

 	public function index()
	{
		//var_dump($this->session->userdata('logueado'),'des');

		if($this->session->userdata('logueado')){
			$this->load->view('principal');
		}
		else{
		 	$this->load->view('login');
	    }
	}

	public function ver_inicio(){
		$this->load->view('inicio');
	}
}