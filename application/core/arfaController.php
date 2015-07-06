<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class arfaController extends CI_Controller {

	public function cekLogin()
	{
		//untuk memastikan bahwa user telah memlakukan login
		if( $this->session->userdata('statusLogin') != md5(date("dmY")."1")) {
			$this->session->set_flashdata('message', 'Lakukan login terlebih dahulu');
			redirect (base_url());
		}
	}

	//hanya dapat diakses oleh idRole tertentu
	public function cekAkses($idRole)
	{
		//$idRole akan selalu dalam bentuk array
		is_array($idRole)||$idRole=array($idRole);
		$countIdRole = count($idRole);
		$statusIdRole = FALSE;
		for($i=0; $i<$countIdRole; $i++)
		{
			if($this->session->userdata('id_role') == $idRole[$i])
				$statusIdRole = TRUE;
		}

		if ($statusIdRole == FALSE)
		{
			$this->session->set_flashdata('message', 'Anda tidak dapat mengakses halaman ini, silahkan hubungi administrator');
			redirect (base_url());
		}
	}
}
/*
created by : 1.yupit sudianto (6/12/2012 - ...)
*/