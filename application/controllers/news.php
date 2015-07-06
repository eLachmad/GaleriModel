<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model("m_news_event");
		$this->load->library("form_validation");
	}
	public function index()
	{
		$data["news"]	= $this->m_news_event->get_by(array("JENIS"=>1)); // query 
		$data["content"]	= $this->load->view("news",$data,true);
		$this->load->view('main',$data);
	}
}