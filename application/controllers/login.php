<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model("m_user");
	}
	public function index()
	{
		$this->form_validation->set_rules("user","Username","required|callback_cek");
		$this->form_validation->set_rules("pwd","Password","required|callback_cek");
		if($this->form_validation->run() == false){
			$data["content"] = $this->load->view("login","",true);
			$this->load->view("main",$data);
		} else {
			$username = $this->input->post("user");
			$pwd = $this->input->post("pwd");
			$user = $this->m_user->get_by(array("USERNAME"=>$username,"PASSWORD"=>md5($pwd)),false,false,true);
			$this->session->set_userdata("username",$user["USERNAME"]);
			$this->session->set_userdata("role",$user["ROLE"]);
			$this->session->set_userdata("id_user",$user["ID_USER"]);
			redirect(site_url("home"));
			// echo $this->session->userdata("role");
		}
	}
	public function cek(){
		$username = $this->input->post("user");
		$pwd = $this->input->post("pwd");
		$user = $this->m_user->get_by(array("USERNAME"=>$username,"PASSWORD"=>md5($pwd)));
		if(count($user) > 0){
			return true;
		} else {
			$this->form_validation->set_message("cek","Username atau password tidak tersedia.");
			return false;
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */