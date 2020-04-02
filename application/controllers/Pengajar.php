<?php 
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class pengajar extends CI_Controller {
    
        public function index()
        {
            $data['pengumumanguru'] = $this->pengajar_model->getPengumumanGuru()->result();

            $this->load->view('part/header');
            $this->load->view('part/sidebarpengajar');
            $this->load->view('pengajar/dashboard',$data);
            $this->load->view('part/footer');
        }
        public function TampilPengumuman($id)
        {
            $data['pengumuman'] = $this->pengajar_model->getDetailPengumuman($id)->result();
            $data['author'] = $this->pengajar_model->getPengajar($data['pengumuman'][0]->pengajar_id)->result();
            
            // print_r($data);
            $this->load->view('part/header');
            $this->load->view('part/sidebarpengajar');
            $this->load->view('pengajar/pengumuman/DetailPengumuman',$data);
            $this->load->view('part/footer');
        }

        public function profile()
        {
            $data['profile'] = $this->pengajar_model->getProfilePengajar($this->session->userdata('id'))->result();
            $this->load->view('part/header');
            $this->load->view('part/sidebarpengajar');
            $this->load->view('admin/profile',$data);
            $this->load->view('part/footer');
        }
        public function Pesan()
        {
            $data['nama'] = $this->session->userdata('nama');
            $data['pesan']=$this->siswa_model->pesan($this->session->userdata('idLogin'))->result();
            $this->load->view('part/header');
            $this->load->view('part/sidebarpengajar',$data);
            $this->load->view('pengajar/pesan');
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
        public function tambahPesan()
    {
        $data['nama'] = $this->session->userdata('nama');
        $data['tujuan']=$this->pengajar_model->view_where('el_login',array('id !='=>$this->session->userdata('idLogin')))->result();
        // print_r($data);
        $this->load->view('part/header');
        $this->load->view('part/sidebarpengajar',$data);
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
        $this->pengajar_model->insert($values,'el_messages');
        redirect(base_url().'siswa/detailPesan/'.$this->session->userdata('idLogin').'/'.$this->input->post('tujuan'));
    }
    public function detailPesan($send,$receive)
    {
        $data['nama'] = $this->session->userdata('nama');
        $data['isi']=$this->pengajar_model->isiPesan($send,$receive)->result();
        $penerima=$this->siswa_model->view_where('el_login',array('id'=>$receive))->result();
        $data['receiver']=$penerima[0]->username;
        $this->load->view('part/header');
        $this->load->view('part/sidebarpengajar',$data);
        $this->load->view('siswa/detailPesan',$data);
        $this->load->view('part/footer');
    }
    }
?>