<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model("m_user");
	}
	public function index()
	{
		$data["content"] = $this->load->view("home","",true);
		$this->load->view("main",$data);
	}
}