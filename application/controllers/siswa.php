<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class siswa extends CI_Controller {

    public function index()
    {
        $data['nama'] = $this->session->userdata('nama');
        
        $this->load->view('part/header');
        $this->load->view('part/sidebarsiswa',$data);
        $this->load->view('siswa/dashboard');
        $this->load->view('part/footer');
    }

    public function profile()
    {
        $data['nama'] = $this->session->userdata('nama');
        $id = $this->session->userdata('id');
        $data['profile'] = $this->siswa_model->getProfil($id)->result();
        // print_r($data);
        $this->load->view('part/header');
        $this->load->view('part/sidebarsiswa',$data);
        $this->load->view('siswa/profile');
        $this->load->view('part/footer');
    }

}
?>