<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Panel extends CI_Controller {

	function __construct(){
		parent::__construct();
		// $this->load->model("");
	}
	function index(){
		$this->load->view("main_admin");
		// echo "test";
	}
	public function logout(){
		$this->session->sess_destroy();
		redirect(site_url("login"));
	}
}