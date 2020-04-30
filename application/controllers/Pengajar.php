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
        public function dataPengajar()
        {
            $data['pengajar']=$this->pengajar_model->view('el_pengajar')->result();
            $this->load->view('part/header');
            $this->load->view('part/sidebarpengajar');
            $this->load->view('pengajar/dataPengajar',$data);
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
        public function updateprofile($id)
        {
            $data = array(
                'nip' => $this->input->post('NIP'), 
                'nama' => $this->input->post('Nama'), 
                'jenis_kelamin' => $this->input->post('jk'), 
                'tempat_lahir' => $this->input->post('tempatlahir'), 
                'tgl_lahir' => $this->input->post('tgllahir'), 
                'alamat' => $this->input->post('alamat')
            );
            $this->Pengajar_model->updateProfile($data,$id);
            redirect('pengajar/profile');
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

        public function jadwalMengajar($id)
        {
            $data['hari'] = array("Senin","Selasa","Rabu","Kamis","Jumat");
            $data['day']=$id;
            $data['jadwal'] = $this->pengajar_model->jadwalPelajaran($id,
            $this->session->userdata('id'))->result();    
            $this->load->view('part/header');
            $this->load->view('part/sidebarpengajar');
            $this->load->view('pengajar/jadwalmengajar',$data);
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
            $daftarFilter=array();
            $daftarKelamin=array();
            if ($this->input->post()) {
                $daftarKelamin=$this->input->post('jeniskelamin');
                $daftarFilter=array(
                    'nip'=>$this->input->post('nip'),
                    'nama'=>$this->input->post('nama'),
                    'tempat_lahir'=>$this->input->post('tempatLahir'),
                    'tgl_lahir'=>$this->input->post('tahun').'-'.$this->input->post('bulan').'-'.$this->input->post('tanggal'),
                    'alamat'=>$this->input->post('alamat'),
                    'is_admin'=>$this->input->post('opsi')
                );
            }
            $data['nama'] = $this->session->userdata('nama');
            $dataFilter['data']=$this->siswa_model->filterPengajar($daftarFilter,$daftarKelamin)->result();
            $this->load->view('part/header');
            $this->load->view('part/sidebarpengajar',$data);
            $this->load->view('pengajar/filterPengajar',$dataFilter);
            $this->load->view('part/footer');
        }

        public function filterSiswa()
        {
            $daftarFilter=array();
            $daftarKelamin=array();
            $daftarAgama=array();
            $daftarKelas=array();
            if ($this->input->post()) {
                $daftarKelas=$this->input->post('kelas');
                $daftarAgama=$this->input->post('agama');
                $daftarKelamin=$this->input->post('jeniskelamin');
                $daftarFilter=array(
                    'nis'=>$this->input->post('nis'),
                    'nama'=>$this->input->post('nama'),
                    'tahun_masuk'=>$this->input->post('tahunMasuk'),
                    'tempat_lahir'=>$this->input->post('tempatLahir'),
                    'tgl_lahir'=>$this->input->post('tahun').'-'.$this->input->post('bulan').'-'.$this->input->post('tanggal'),
                    'alamat'=>$this->input->post('alamat'),
                    'status_id'=>$this->input->post('statusSiswa')
                );
            }
            $data['nama'] = $this->session->userdata('nama');
            // echo "<pre>";
            // print_r($daftarFilter);
            // echo "</pre>";
            // echo "<pre>";
            // print_r($daftarKelas);
            // echo "</pre>";
            // echo "<pre>";
            // print_r($daftarAgama);
            // echo "</pre>";
            // echo "<pre>";
            // print_r($daftarKelamin);
            // echo "</pre>";
            $dataFilter['data']=$this->siswa_model->filterSiswa($daftarFilter,$daftarKelamin,$daftarAgama,$daftarKelas)->result();
            // echo "<pre>";
            // print_r($dataFilter);
            // echo "</pre>";
            $this->load->view('part/header');
            $this->load->view('part/sidebarpengajar',$data);
            $this->load->view('pengajar/filterSiswa',$dataFilter);
            $this->load->view('part/footer');
        }
        public function detailFilterSiswa($id)
        {
            $data['nama'] = $this->session->userdata('nama');
            $data['siswa']=$this->siswa_model->view_where('el_siswa',array('id'=>$id))->result();
            $data['kelas']=$this->siswa_model->getKelasSiswa($id)->result();
            $this->load->view('part/header');
            $this->load->view('part/sidebarpengajar',$data);
            $this->load->view('pengajar/detailFilterSiswa',$data);
            $this->load->view('part/footer');
        }
        public function detailFilterPengajar($id)
        {
            // $this->load->model('siswa_model');
            $data['nama'] = $this->session->userdata('nama');
            $data['pengajar']=$this->siswa_model->view_where('el_pengajar',array('id'=>$id))->result();
            $data['jadwal']=$this->siswa_model->jadwalPengajar($id)->result();
            $this->load->view('part/header');
            $this->load->view('part/sidebarpengajar',$data);
            $this->load->view('pengajar/detailFilterPengajar',$data);
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
            $data['receiver']=$penerima[0]->id;
            $this->load->view('part/header');
            $this->load->view('part/sidebarpengajar',$data);
            $this->load->view('siswa/detailPesan',$data);
            $this->load->view('part/footer');
        }

        public function ambilMapel()
        {
            $data['mapel'] = $this->pengajar_model->GetAllMapel()->result();
            $data['pengajar'] = $this->pengajar_model->getPengajar($this->session->userdata('id'))->result();
            $this->load->view('part/header');
            $this->load->view('part/sidebarpengajar');
            $this->load->view('pengajar/ambilmatapelajaran',$data);
            $this->load->view('part/footer');
        }

        public function pickMapel($id)
        {
            $data = array('id_mapel' => $id);
            $this->pengajar_model->updateMapelPengajar($data,$this->session->userdata('id'));
            redirect('pengajar/ambilMapel');
        }
    }
?>