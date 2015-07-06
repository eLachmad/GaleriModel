<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model("m_user");
		$this->load->library("form_validation");
	}
	public function member()
	{
		$data["user"] = $this->m_user->get_by(array("ROLE"=>3));
		$data["content"]= $this->load->view("user/grid_member",$data,true);
		$this->load->view('main_admin',$data);
	}
	public function agency()
	{
		$data["user"] = $this->m_user->get_by(array("ROLE"=>2));
		$data["content"]= $this->load->view("user/grid_agency",$data,true);
		$this->load->view('main_admin',$data);
	}
	public function grid_json_member(){		
		$user	= $this->m_user->get_by(array("ROLE"=>3));
		$i = 0;
		foreach($user as $row){
			$user[$i]["NO"] = $i+1;
			$user[$i]["STATUS"] = ($row["STATUS"] == 1) ? ("Aktif") : ("Tidak Aktif");
			$i++;
		}
		$data	= array("geonames"=>$user);
		echo json_encode($data);
	}
	public function grid_json_agency(){		
		$user	= $this->m_user->get_by(array("ROLE"=>2));
		$i = 0;
		foreach($user as $row){
			$user[$i]["NO"] = $i+1;
			$user[$i]["STATUS"] = ($row["STATUS"] == 1) ? ("Aktif") : ("Tidak Aktif");
			$user[$i]["BUTTON"] = ("<a href='#' onclick=\"verify('" . $row["ID_USER"] . "')\"><span class='fa fa-pencil'></span></a>");
			$i++;
		}
		$data	= array("geonames"=>$user);
		echo json_encode($data);
	}
	public function verify($id){
		$this->m_user->save(array("STATUS"=>1),$id);
		redirect(site_url("user/agency"));
	}
}