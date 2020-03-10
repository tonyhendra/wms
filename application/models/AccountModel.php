<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AccountModel extends CI_Model {

	    $this->db->where('username', $username); // Untuk menambahkan Where Clause : username='$username'
        $result = $this->db->get('username')->row(); // Untuk mengeksekusi dan mengambil data hasil query
        
        return $result;

}

/* End of file AccountModel.php */
/* Location: ./application/models/AccountModel.php */