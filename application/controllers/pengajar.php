<?php 
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class pengajar extends CI_Controller {
    
        public function index()
        {
            $data['nama'] = $this->session->userdata('nama');

            $this->load->view('part/header');
            $this->load->view('part/sidebarpengajar',$data);
            $this->load->view('pengajar/dashboard');
            $this->load->view('part/footer');
        }
        public function profile()
        {
            $data['nama'] = $this->session->userdata('nama');
            
            $this->load->view('part/header');
            $this->load->view('part/sidebarpengajar',$data);
            $this->load->view('pengajar/profile');
            $this->load->view('part/footer');
        }
        public function Pesan()
        {
            $data['nama'] = $this->session->userdata('nama');
            $this->load->view('part/header');
            $this->load->view('part/sidebarpengajar',$data);
            $this->load->view('pengajar/profile');
            $this->load->view('part/footer');
        }

        public function jadwalMapel()
        {
            $data['nama'] = $this->session->userdata('nama');
            $this->load->view('part/header');
            $this->load->view('part/sidebarpengajar',$data);
            $this->load->view('pengajar/profile');
            $this->load->view('part/footer');
        }

        public function tugas()
        {
            $data['nama'] = $this->session->userdata('nama');
            $this->load->view('part/header');
            $this->load->view('part/sidebarpengajar',$data);
            $this->load->view('pengajar/profile');
            $this->load->view('part/footer');
        }

        public function materi()
        {
            $data['nama'] = $this->session->userdata('nama');
            $this->load->view('part/header');
            $this->load->view('part/sidebarpengajar',$data);
            $this->load->view('pengajar/profile');
            $this->load->view('part/footer');
        }

        public function filterPengajar()
        {
            $data['nama'] = $this->session->userdata('nama');
            $this->load->view('part/header');
            $this->load->view('part/sidebarpengajar',$data);
            $this->load->view('pengajar/profile');
            $this->load->view('part/footer');
        }

        public function filterSiswa()
        {
            $data['nama'] = $this->session->userdata('nama');
            $this->load->view('part/header');
            $this->load->view('part/sidebarpengajar',$data);
            $this->load->view('pengajar/profile');
            $this->load->view('part/footer');
        }
    }
?>