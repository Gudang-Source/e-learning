<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class siswa extends CI_Controller {

    public function index()
    {
        $data['pengumumansiswa'] = $this->Siswa_Model->getPengumumanSiswa()->result();
        
        $this->load->view('part/header');
        $this->load->view('part/sidebarsiswa',$data);
        $this->load->view('siswa/dashboard');
        $this->load->view('part/footer');
    }
    public function TampilPengumuman($id)
    {
        $data['pengumuman'] = $this->Admin_Model->getDetailPengumuman($id)->result();
        $data['author'] = $this->Admin_Model->getPengajar($data['pengumuman'][0]->pengajar_id)->result();
        // print_r($data);
        $this->load->view('part/header');
        $this->load->view('part/sidebarsiswa');
        $this->load->view('siswa/pengumuman/DetailPengumuman',$data);
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
        $this->load->view('part/sidebarsiswa',$data);
        $this->load->view('siswa/profile');
        $this->load->view('part/footer');
    }

    public function jadwalMapel()
    {
        $data['nama'] = $this->session->userdata('nama');
        $this->load->view('part/header');
        $this->load->view('part/sidebarsiswa',$data);
        $this->load->view('siswa/profile');
        $this->load->view('part/footer');
    }

    public function tugas()
    {
        $data['nama'] = $this->session->userdata('nama');
        $this->load->view('part/header');
        $this->load->view('part/sidebarsiswa',$data);
        $this->load->view('siswa/profile');
        $this->load->view('part/footer');
    }

    public function materi()
    {
        $data['nama'] = $this->session->userdata('nama');
        $this->load->view('part/header');
        $this->load->view('part/sidebarsiswa',$data);
        $this->load->view('siswa/profile');
        $this->load->view('part/footer');
    }
    
    public function filterPengajar()
    {
        $data['nama'] = $this->session->userdata('nama');
        $this->load->view('part/header');
        $this->load->view('part/sidebarsiswa',$data);
        $this->load->view('siswa/profile');
        $this->load->view('part/footer');
    }

    public function filterSiswa()
    {
        $data['nama'] = $this->session->userdata('nama');
        $this->load->view('part/header');
        $this->load->view('part/sidebarsiswa',$data);
        $this->load->view('siswa/profile');
        $this->load->view('part/footer');
    }
    

}
?>