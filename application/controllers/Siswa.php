<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class siswa extends CI_Controller {

    public function index()
    {
        $data['pengumumansiswa'] = $this->siswa_model->getPengumumanSiswa()->result();
        
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
        $data['profile'] = $this->siswa_model->getProfileSiswa($this->session->userdata('id'))->result();
        $this->load->view('part/header');
        $this->load->view('part/sidebarsiswa');
        $this->load->view('siswa/profile',$data);
        $this->load->view('part/footer');
    }
    public function updateprofile($id)
    {
        $data = array(
            'nis' => $this->input->post('NIS'), 
            'nama' => $this->input->post('Nama'), 
            'jenis_kelamin' => $this->input->post('jk'), 
            'tempat_lahir' => $this->input->post('tempatlahir'), 
            'tgl_lahir' => $this->input->post('tgllahir'), 
            'alamat' => $this->input->post('alamat'),
            'agama' => $this->input->post('agama'),
            'tahun_masuk' => $this->input->post('tahunmasuk')
        );
        $this->siswa_model->updateProfile($data,$id);
        redirect('siswa/profile');
        
    }

    public function Pesan()
    {
        $data['nama'] = $this->session->userdata('nama');
        $data['pesan']= $this->siswa_model->pesan($this->session->userdata('idLogin'))->result();
        $this->load->view('part/header');
        $this->load->view('part/sidebarsiswa',$data);
        $this->load->view('siswa/pesan',$data);
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
    public function tambahPesan()
    {
        $data['nama'] = $this->session->userdata('nama');
        $data['tujuan']=$this->siswa_model->view_where('el_login',array('id !='=>$this->session->userdata('idLogin')))->result();
        // print_r($data);
        $this->load->view('part/header');
        $this->load->view('part/sidebarsiswa',$data);
        $this->load->view('siswa/tambahPesan',$data);
        $this->load->view('part/footer');
    }
    public function savePesan()
    {
        $values=array(
            'type_id'=>1,
            'content'=>$this->input->post('isiPesan'),
            'owner_id'=>$this->session->userdata('idLogin'),
            'sender_receiver_id'=>$this->input->post('tujuan'),
            'date'=>date('Y-m-d H:i:s'),
            'opened'=>0
        );
        $this->siswa_model->insert($values,'el_messages');
        redirect(base_url().'siswa/detailPesan/'.$this->session->userdata('idLogin').'/'.$this->input->post('tujuan'));
    }
    public function detailPesan($send,$receive)
    {
        $data['nama'] = $this->session->userdata('nama');
        $penerima=$this->siswa_model->view_where('el_login',array('id'=>$receive))->result();
        $data['receiver']=$penerima[0]->username;
        $data['isi']=$this->siswa_model->isiPesan($send,$receive)->result();

        $this->load->view('part/header');
        $this->load->view('part/sidebarsiswa',$data);
        $this->load->view('siswa/detailPesan',$data);
        $this->load->view('part/footer');
    }

}
?>