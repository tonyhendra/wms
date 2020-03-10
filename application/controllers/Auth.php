<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Auth extends CI_Controller {

	public function index()
	{
		$this->load->library('session');
		if($this->session->userdata('authenticated')) // Jika user sudah login (Session authenticated ditemukan)
      	redirect('home/index'); // Redirect ke page welcome

      	//$this->$this->load->model('AccountModel');

		$this->load->view('temp/header', FALSE);
		$this->load->view('auth/login', FALSE);
	}

	public function login()
	{
	    $username = $this->input->post('username'); // Ambil isi dari inputan username pada form login
	    $password = md5($this->input->post('password')); // Ambil isi dari inputan password pada form login dan encrypt dengan md5
	    $this->$this->load->model('AccountModel');
	    $user = $this->AccountModel->get($username); // Panggil fungsi get yang ada di UserModel.php
	    if(empty($user)){ // Jika hasilnya kosong / user tidak ditemukan
	      	$this->session->set_flashdata('message', 'Username tidak ditemukan'); // Buat session flashdata
	      	redirect('auth'); // Redirect ke halaman login
	    }else{
	      if($password == $user->password){ // Jika password yang diinput sama dengan password yang didatabase
	        $session = array(
	          'authenticated'=>true, // Buat session authenticated dengan value true
	          'username'=>$user->username,  // Buat session username
	          'email'=>$user->email // Buat session authenticated
	        );
	        $this->session->set_userdata($session); // Buat session sesuai $session
	        redirect('home/index'); // Redirect ke halaman welcome
	      }else{
	        $this->session->set_flashdata('message', 'Password salah'); // Buat session flashdata
	        redirect('auth'); // Redirect ke halaman login
	      }
	    }
  	}

  	public function logout()
  	{
	    $this->session->sess_destroy(); // Hapus semua session
	    redirect('auth'); // Redirect ke halaman login
  	}

}

/* End of file Auth.php */
/* Location: ./application/controllers/Auth.php */