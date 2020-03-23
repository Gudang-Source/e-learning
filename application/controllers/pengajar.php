<?php 
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class pengajar extends CI_Controller {
    
        public function index()
        {
            $this->load->view('part/header');
            $this->load->view('part/sidebarpengajar');
            $this->load->view('siswa/dashboard');
            $this->load->view('part/footer');
        }
    
    }
?>