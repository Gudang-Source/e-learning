<?php 
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class pengajar extends CI_Controller {
    
        public function index()
        {
            $data['pengumumanguru'] = $this->Pengajar_Model->getPengumumanGuru()->result();

            $this->load->view('part/header');
            $this->load->view('part/sidebarpengajar');
            $this->load->view('pengajar/dashboard',$data);
            $this->load->view('part/footer');
        }
        public function TampilPengumuman($id)
        {
            $data['pengumuman'] = $this->Pengajar_Model->getDetailPengumuman($id)->result();
            $data['author'] = $this->Pengajar_Model->getPengajar($data['pengumuman'][0]->pengajar_id)->result();
            
            // print_r($data);
            $this->load->view('part/header');
            $this->load->view('part/sidebarpengajar');
            $this->load->view('pengajar/pengumuman/DetailPengumuman',$data);
            $this->load->view('part/footer');
        }

        public function profile()
        {
            $data['profile'] = $this->Pengajar_Model->getProfilePengajar($this->session->userdata('id'))->result();
            $this->load->view('part/header');
            $this->load->view('part/sidebaradmin');
            $this->load->view('admin/profile',$data);
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