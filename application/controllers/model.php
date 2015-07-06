<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model("m_model");
		$this->load->library("form_validation");
		$this->form_validation->set_error_delimiters("<div class=\"col-sm-3 alert alert-danger\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\"><i class=\"fa fa-times\"></i></button>","</div>");
	}
	public function index()
	{
		$data["content"]	= $this->load->view("model/grid","",true);
		$this->load->view('main_admin',$data);
	}
	public function form($id = null){
		$this->load->library("upload");
		$this->form_validation->set_rules("nama","Nama Model","required");
		if($this->form_validation->run() == false){
			$data["id"]		= $id;
			$data["id_user"]	= $this->session->userdata("id_user");
			$data["model"] = $this->m_model->get($id);
			$data["content"]= $this->load->view("model/form",$data,true);
			if($id == null){
				$this->load->view('main_admin',$data);
			} else {
				if(count($data["model"]) < 1){
					redirect(base_url("model"));
				} else {
					$this->load->view('main_admin',$data);
				}
			}
		} else {
			$nama= $this->input->post("nama");
			$status		= $this->input->post("status");
			$id_user	= $this->session->userdata("id_user");
			$data		= array("NAMA"=>$nama,"ID_USER"=>$id_user,"STATUS"=>$status);
			if(!is_dir('./uploads/'.$id_user.'/')){
				mkdir('./uploads/' . $id_user . '/',0777);
			}
			$config['upload_path']	= './uploads/' . $id_user.'/';
			$config['encrypt_name']	= FALSE;
			$config['allowed_types']= '*';
			$config['max_size']		= '0';
			$this->load->library('upload');
			$this->upload->initialize($config);
			$this->upload->overwrite	= true;
			
			if ($this->upload->do_upload()){
				$path	= $this->upload->data();
				$data["PHOTO"]=$id_user . '/' . $path['file_name'];
			}
			if($id == false){
				$this->m_model->save($data);
			} else {
				$this->m_model->save($data,$id);
			}
			
			redirect(site_url("model"));
		}
	}
	public function grid_json(){		
		$model	= $this->m_model->get();
		$i = 0;
		foreach($model as $row){
			$model[$i]["NO"] = $i+1;
			$model[$i]["STATUS"] = ($row["STATUS"] == 1) ? ("Aktif") : ("Tidak Aktif");
			$model[$i]["BUTTON"] = ("<a href='" . site_url("model/form/" . $row["ID_MODEL"]) . "'><span class='fa fa-pencil'></span></a>");
			$i++;
		}
		$data	= array("geonames"=>$model);
		echo json_encode($data);
	}
}
