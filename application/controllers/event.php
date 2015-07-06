<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Event extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model("m_news_event");
		$this->load->library("form_validation");
	}
	public function index()
	{
		$data["event"]	= $this->m_news_event->get_by(array("JENIS"=>2));
		$data["content"]= $this->load->view("event",$data,true);
		$this->load->view('main',$data);
	}
}