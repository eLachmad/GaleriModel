<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News_event extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model("m_news_event");
		$this->load->library("form_validation");
		$this->form_validation->set_error_delimiters("<div class=\"col-sm-3 alert alert-danger\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\"><i class=\"fa fa-times\"></i></button>","</div>");
	}
	public function index()
	{
		$data["content"]	= $this->load->view("news_event/grid","",true);
		$this->load->view('main_admin',$data);
	}
	public function form($id = null){
		$this->load->library("upload");
		$this->form_validation->set_rules("judul","Judul","required");
		$this->form_validation->set_rules("isi","Isi","required");
		$this->form_validation->set_rules("jenis","Jenis","required");
		if($this->form_validation->run() == false){
			$data["id"]		= $id;
			$data["id_user"]	= $this->session->userdata("id_user");
			$data["news_event"] = $this->m_news_event->get($id); // query buat ambil event dengan id yang dipanggil
			$data["content"]= $this->load->view("news_event/form",$data,true);
			if($id == null){
				$this->load->view('main_admin',$data);
			} else {
				if(count($data["news_event"]) < 1){
					redirect(base_url("news_event"));
				} else {
					$this->load->view('main_admin',$data);
				}
			}
		} else {
			$judul= $this->input->post("judul");
			$isi= $this->input->post("isi");
			$jenis= $this->input->post("jenis");
			$status		= $this->input->post("status");
			$id_user	= $this->session->userdata("id_user");
			$data		= array("JUDUL"=>$judul,"ID_USER"=>$id_user,"STATUS"=>$status,"ISI"=>$isi,"JENIS"=>$jenis);
			if($id == false){
				$id = $this->m_news_event->save($data); // query buat tambah data news
			} else {
				$this->m_news_event->save($data,$id);//query buat edit event / news
			}
			if(!is_dir('./news/'.$id_user.'/')){
				mkdir('./news/' . $id_user . '/',0777);
			}
			if(!is_dir('./news/'.$id_user.'/'.$id.'/')){
				mkdir('./news/' . $id_user . '/' . $id . '/',0777);
			}
			$config['upload_path']	= './news/' . $id_user . '/' . $id . '/';
			$config['encrypt_name']	= FALSE;
			$config['allowed_types']= '*';
			$config['max_size']		= '0';
			$this->load->library('upload');
			$this->upload->initialize($config);
			$this->upload->overwrite	= true;
			
			if ($this->upload->do_upload()){
				$path	= $this->upload->data();
				$data["PHOTO"]=$id_user . '/' . $id . '/' . $path['file_name'];
				$this->m_news_event->save($data,$id);
			}
			
			
			redirect(site_url("news_event"));
		}
	}
	public function grid_json(){		
		$news_event	= $this->m_news_event->get();
		$i = 0;
		foreach($news_event as $row){
			$news_event[$i]["NO"] = $i+1;
			$news_event[$i]["STATUS"] = ($row["STATUS"] == 1) ? ("Aktif") : ("Tidak Aktif");
			$news_event[$i]["JENIS"] = ($row["JENIS"] == 1) ? ("News") : ("Event");
			$news_event[$i]["BUTTON"] = ("<a href='" . site_url("news_event/form/" . $row["ID_NEWS_EVENT"]) . "'><span class='fa fa-pencil'></span></a>");
			$i++;
		}
		$data	= array("geonames"=>$news_event);
		echo json_encode($data);
	}
}
