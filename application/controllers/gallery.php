<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gallery extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model("m_model");
		$this->load->model("m_user");
		$this->load->library("form_validation");
	}
	public function index()
	{
		// $data["model"]	= $this->m_model->get_join_by(array(array("table"=>"model","join_key"=>"ID_USER","join_table"=>"user")));
		$data["user"] = $this->m_user->get_by(array("STATUS"=>1,"ROLE"=>2));
		$data["content"]= $this->load->view("gallery",$data,true);
		$this->load->view('main',$data);
	}
}