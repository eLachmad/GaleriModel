<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Daftar_Agency extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model("m_user");
	}
	public function index()
	{
		$data["content"] = $this->load->view("daftar_agency","",true);
		$this->load->view("main",$data);
	}
}