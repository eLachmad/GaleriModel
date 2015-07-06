<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Signup extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model("m_user");
	}
	public function member(){
		$this->form_validation->set_rules("user","Username","required|callback_cek");
		$this->form_validation->set_rules("email","Email","required|callback_cek");
		$this->form_validation->set_rules("pwd","Password","required");
		$this->form_validation->set_rules("pwd_c","Konfirmasi Password","required|matches[pwd]");
		if($this->form_validation->run() == false){
			$username = $this->input->post("user");
			if($username){
			?>
			<script language="javascript">
				alert("Format isian yang anda masukkan tidak benar. Silahkan isi kembali form isian dengan benar");
				document.location.href="<?php echo site_url("login"); ?>";
			</script>
			<?php
			} else {
				$this->load->view("signup_member");
			}
		} else {
			$username = $this->input->post("user");
			$email = $this->input->post("email");
			$pwd = $this->input->post("pwd");
			$this->m_user->save(array("USERNAME"=>$username,"EMAIL"=>$email,"PASSWORD"=>md5($pwd),"ROLE"=>3,"STATUS"=>1));
			?>
			<script language="javascript">
				alert("Selamat ! anda berhasil terdaftar. Silahkan login menggunakan username dan passsword yang anda daftarkan sebelumnya. Terima kasih :)");
				document.location.href="<?php echo site_url("login"); ?>";
			</script>
			<?php
		}
		
	}
	public function agency(){
		$this->form_validation->set_rules("user","Username","required|callback_cek");
		$this->form_validation->set_rules("email","Email","required|callback_cek");
		$this->form_validation->set_rules("pwd","Password","required");
		$this->form_validation->set_rules("pwd_c","Konfirmasi Password","required|matches[pwd]");
		if($this->form_validation->run() == false){
			$username = $this->input->post("user");
			if($username){
			?>
			<script language="javascript">
				alert("Format isian yang anda masukkan tidak benar. Silahkan isi kembali form isian dengan benar");
				document.location.href="<?php echo site_url("login"); ?>";
			</script>
			<?php
			} else {
				$this->load->view("signup_agency");
			}
		} else {
			$username = $this->input->post("user");
			$email = $this->input->post("email");
			$alamat = $this->input->post("alamat");
			$pwd = $this->input->post("pwd");
			$this->m_user->save(array("USERNAME"=>$username,"EMAIL"=>$email,"ALAMAT"=>$alamat,"PASSWORD"=>md5($pwd),"ROLE"=>2,"STATUS"=>0));
			?>
			<script language="javascript">
				alert("Selamat ! anda berhasil terdaftar sebagai agency. Silahkan login menggunakan username dan passsword yang anda daftarkan sebelumnya. Untuk dapat menggunakan fitur selengkapnya, silahkan menunggu konfirmasi dari kami. Terima kasih :)");
				document.location.href="<?php echo site("login"); ?>";
			</script>
			<?php
		}
		
	}
	public function cek(){
		$username = $this->input->post("user");
		$email = $this->input->post("email");
		$user = $this->m_user->get_by(array("USERNAME"=>$username,"EMAIL"=>$email),false,true);
		if(count($user) < 1){
			return true;
		} else {
			$this->form_validation->set_message("cek","Username atau password sudah terdaftar.");
			return false;
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */