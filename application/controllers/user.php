<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class user extends CI_Controller {

    public function index()
    {
        $this->load->view('part/headerauth');
        $this->load->view('auth/login');
        $this->load->view('part/footerauth');
    }

    public function register()
    {
        $this->load->view('part/headerauth');
        $this->load->view('auth/register');
        $this->load->view('part/footerauth');
    }

}

?>