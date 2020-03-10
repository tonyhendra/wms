<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$this->load->view('temp/header', FALSE);
		$this->load->view('temp/top', FALSE);
		$this->load->view('temp/menu', FALSE);
		$this->load->view('home/index', FALSE);
		$this->load->view('temp/footer', FALSE);
	}

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */