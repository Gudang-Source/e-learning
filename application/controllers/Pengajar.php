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
            $this->load->view('pengajar/profile',$data);
            $this->load->view('part/footer');
        }
        
        public function updateGambar()
        {
            $config['upload_path']          = './assets/images/user/';
            $config['allowed_types']        = 'jpg|jpeg|png';

            $this->load->library('upload', $config);
            $upload = $this->upload->do_upload('file-input');
            if (!$upload){
                $data['profile'] = $this->pengajar_model->getProfilePengajar($this->session->userdata('id'))->result();
                $this->session->set_flashdata('error', $this->upload->display_errors());
                
                $this->load->view('part/header');
                $this->load->view('part/sidebarsiswa');
                $this->load->view('pengajar/profile',$data);
                $this->load->view('part/footer');
            }else{
                $upload = $this->upload->data();
                $data = array(
                    'foto' => $upload['file_name']
                );
                
                $array = array(
                    'foto' => $upload['file_name']
                );
                $this->session->set_userdata( $array );
                
                $this->pengajar_model->updateImage($data,$this->session->userdata('id'));
                redirect('pengajar/profile');
            }
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
            $this->pengajar_model->updateProfile($data,$id);
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
            $data['data']=$this->pengajar_model->getKelas()->result();
            $data['pengajar']=$this->pengajar_model->getPengajar($this->session->userdata('id'))->result();
            $data['mapel']=$this->pengajar_model->getMapelKelas()->result();
            $this->load->view('part/header');
            $this->load->view('part/sidebarpengajar',$data);
            $this->load->view('pengajar/tugas/tugaskelas');
            $this->load->view('part/footer');
        }

        public function listTugas($kelas,$mapelid)
        {
            $data['idkelas'] = $kelas;
            $data['mapelid'] = $mapelid;
            $data['materi']=$this->pengajar_model->getTugasKelas($kelas,$mapelid,$this->session->userdata('id'))->result();
            $this->load->view('part/header');
            $this->load->view('part/sidebarpengajar');
            $this->load->view('pengajar/tugas/listtugas',$data);
            $this->load->view('part/footer');
        }
        public function tambahTugas($kelas,$mapelid)
        {
            $data['idkelas'] = $kelas;
            $data['idmapel'] = $mapelid;
            $data['kelas']=$this->pengajar_model->view_where('el_kelas',array('id' => $kelas))->result();
            $data['mapel']=$this->pengajar_model->view_where('el_mapel',array('id' => $mapelid))->result();

            $this->load->view('part/header');
            $this->load->view('part/sidebarpengajar');
            $this->load->view('pengajar/tugas/TambahTugas',$data);
            $this->load->view('part/footer');
        }
        
        public function prosesUploadTugas()
        {
            $judul = $this->input->post('judul');
            $idkelas = $this->input->post('idkelas');
            $idmapel = $this->input->post('idmapel');
            $tanggal = $this->input->post('tanggal');
            $deadline = $this->input->post('deadline');
            $content = $this->input->post('isi');
            $todate = date('Y-m-d H:i:s', strtotime($deadline));

            $config['upload_path']          = './assets/tugas/';
            $config['allowed_types']        = '*';
    
            $this->load->library('upload', $config);
            $upload = $this->upload->do_upload('materi');
            if (!$upload){
                $data['idkelas'] = $idkelas;
                $data['error'] = $this->upload->display_errors();
                $data['idmapel'] = $idmapel;
                $data['kelas']=$this->pengajar_model->view_where('el_kelas',array('id' => $idkelas))->result();
                $data['mapel']=$this->pengajar_model->view_where('el_mapel',array('id' => $idmapel))->result();
                $this->load->view('part/header');
                $this->load->view('part/sidebarpengajar');
                $this->load->view('pengajar/materi/TambahMateri',$data);
                $this->load->view('part/footer');
            }else{
                $upload = $this->upload->data();
                $data = array(
                    'mapel_id' => $idmapel,
                    'pengajar_id' =>$this->session->userdata('id'),
                    'tgl_buat' => $tanggal,
                    'judul' => $judul,
                    'durasi' => $todate,
                    'info' => $content,
                    'file' => $upload['file_name'],
                    'aktif' => 1,
                    'tampil_siswa' => 1
                );
                $id = $this->pengajar_model->insert($data,'el_tugas');
                $data = array('tugas_id' => $id,'kelas_id' =>$idkelas);
                $this->pengajar_model->insert($data,'el_tugas_kelas');
                redirect('Pengajar/listTugas/'.$idkelas.'/'.$idmapel);
            }
        }

        public function detailTugas($idtugas)
        {
            $data['materi'] = $this->pengajar_model->view_where('el_tugas',array('id'=>$idtugas))->result();
            $this->load->view('part/header');
            $this->load->view('part/sidebarpengajar');
            $this->load->view('pengajar/tugas/detailtugas',$data);
            $this->load->view('part/footer');
        }

        public function hapusTugas($id,$kelas,$mapelid)
        {
            $this->pengajar_model->hapusTugas($id);
            redirect("pengajar/listTugas/".$kelas."/".$mapelid);
        }
        public function penilaian($idtugas,$kelas,$mapelid)
        {
            $data['idkelas'] = $kelas;
            $data['idmapel'] = $mapelid;
            $data['idtugas'] = $idtugas;
            $data['upload'] = $this->pengajar_model->hasilUploadTugas($kelas,$idtugas)->result();
            $this->load->view('part/header');
            $this->load->view('part/sidebarpengajar');
            $this->load->view('pengajar/tugas/listnilai',$data);
            $this->load->view('part/footer');

        }
        public function updateNilai($id,$idtugas,$kelas,$mapelid)
        {
            $data['idkelas'] = $kelas;
            $data['idmapel'] = $mapelid;
            $data['idtugas'] = $idtugas;

            $nilai = $this->input->post('nilai');
            $data = array('nilai' => $nilai );
            $this->pengajar_model->updateNilai($data,$id);
            redirect('pengajar/penilaian/'.$idtugas.'/'.$kelas.'/'.$mapelid);
        }
        public function materi()
        {
            $data['data']=$this->pengajar_model->getKelas()->result();
            $data['pengajar']=$this->pengajar_model->getPengajar($this->session->userdata('id'))->result();
            $data['mapel']=$this->pengajar_model->getMapelKelas()->result();
            $this->load->view('part/header');
            $this->load->view('part/sidebarpengajar',$data);
            $this->load->view('pengajar/materi/materikelas');
            $this->load->view('part/footer');
        }

        public function listMateri($kelas,$mapelid)
        {
            $data['idkelas'] = $kelas;
            $data['mapelid'] = $mapelid;
            $data['materi']=$this->pengajar_model->getMateriKelas($kelas,$mapelid,$this->session->userdata('id'))->result();
            $this->load->view('part/header');
            $this->load->view('part/sidebarpengajar');
            $this->load->view('pengajar/materi/listmateri',$data);
            $this->load->view('part/footer');
        }
        public function tambahMateri($kelas,$mapelid)
        {
            $data['idkelas'] = $kelas;
            $data['idmapel'] = $mapelid;
            $data['kelas']=$this->pengajar_model->view_where('el_kelas',array('id' => $kelas))->result();
            $data['mapel']=$this->pengajar_model->view_where('el_mapel',array('id' => $mapelid))->result();

            $this->load->view('part/header');
            $this->load->view('part/sidebarpengajar');
            $this->load->view('pengajar/materi/TambahMateri',$data);
            $this->load->view('part/footer');
        }
        
        public function prosesUploadMateri()
        {
            $judul = $this->input->post('judul');
            $idkelas = $this->input->post('idkelas');
            $idmapel = $this->input->post('idmapel');
            $tanggal = $this->input->post('tanggal');
            $content = $this->input->post('isi');

            $config['upload_path']          = './assets/materi/';
            $config['allowed_types']        = '*';
    
            $this->load->library('upload', $config);
            $upload = $this->upload->do_upload('materi');
            if (!$upload){
                $data['idkelas'] = $idkelas;
                $data['error'] = $this->upload->display_errors();
                $data['idmapel'] = $idmapel;
                $data['kelas']=$this->pengajar_model->view_where('el_kelas',array('id' => $idkelas))->result();
                $data['mapel']=$this->pengajar_model->view_where('el_mapel',array('id' => $idmapel))->result();
                $this->load->view('part/header');
                $this->load->view('part/sidebarpengajar');
                $this->load->view('pengajar/materi/TambahMateri',$data);
                $this->load->view('part/footer');
            }else{
                $upload = $this->upload->data();
                $data = array(
                    'mapel_id' => $idmapel,
                    'pengajar_id' =>$this->session->userdata('id'),
                    'tgl_posting' => $tanggal,
                    'judul' => $judul,
                    'konten' => $content,
                    'file' => $upload['file_name'],
                    'publish' => 1,
                    'views' => 1,
                );
                $id = $this->pengajar_model->insert($data,'el_materi');
                $data = array('materi_id' => $id,'kelas_id' =>$idkelas);
                $this->pengajar_model->insert($data,'el_materi_kelas');
                redirect('Pengajar/listMateri/'.$idkelas.'/'.$idmapel);
            }
        }

        public function detailMateri($idtugas)
        {
            $data['materi'] = $this->pengajar_model->view_where('el_materi',array('id'=>$idtugas))->result();
            
            $this->load->view('part/header');
            $this->load->view('part/sidebarpengajar');
            $this->load->view('pengajar/materi/detailmateri',$data);
            $this->load->view('part/footer');
        }
        public function download($nama)
        {
            $pth    =   file_get_contents(base_url()."assets/materi/".$nama);
            force_download($nama, $pth);
        }
        public function downloadTugas($nama)
        {
            $pth    =   file_get_contents(base_url()."assets/tugas/".$nama);
            force_download($nama, $pth);
        }

        public function hapusMateri($id,$kelas,$mapelid)
        {
            $this->pengajar_model->hapusMateri($id);
            redirect("pengajar/listMateri/".$kelas."/".$mapelid);
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
            $this->load->view('pengajar/tambahPesan',$data);
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
            redirect(base_url().'pengajar/detailPesan/'.$this->session->userdata('idLogin').'/'.$this->input->post('tujuan'));
        }
        public function detailPesan($send,$receive)
        {
            $data['nama'] = $this->session->userdata('nama');
            $data['isi']=$this->pengajar_model->isiPesan($send,$receive)->result();
            $penerima=$this->siswa_model->view_where('el_login',array('id'=>$receive))->result();
            $data['receiver']=$penerima[0]->id;
            $this->load->view('part/header');
            $this->load->view('part/sidebarpengajar',$data);
            $this->load->view('pengajar/detailPesan',$data);
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
    public function ujian()
    {
        $data['nama'] = $this->session->userdata('nama');
        $data['ujian']= $this->pengajar_model->getUjian($this->session->userdata('id'))->result();
        $data['mapel'] = $this->pengajar_model->getKelasPengajar($this->session->userdata('id'))->result();
        $this->load->view('part/header');
        $this->load->view('part/sidebarpengajar',$data);
        $this->load->view('pengajar/ujian',$data);
        $this->load->view('part/footer');
    }
    public function buatUjian()
    {
       $values=array(
            'judul'=>$this->input->post('nama'),
            'tgl_dibuat'=>date('Y-m-d H:i'),
            'tgl_expired'=>$this->input->post('tgl').' '.$this->input->post('jam'),
            'waktu'=>$this->input->post('waktu'),
            'mapel_kelas_id'=>$this->input->post('mapelKelas'),
            'pengajar_id'=>$this->session->userdata('id')
        );
        $this->pengajar_model->insert($values,'el_ujian');
        redirect('pengajar/ujian');
    }
    public function detailUjian($id)
    {
        $data['id_ujian']=$id;
        $data['nama'] = $this->session->userdata('nama');
        $data['ujian']= $this->pengajar_model->getUjianDetail($id)->result();
        $data['mapel'] = $this->pengajar_model->getKelasPengajar($this->session->userdata('id'))->result();
        $data['soal']= $this->pengajar_model->view_where('el_soal',array('pengajar_id'=>$this->session->userdata('id')))->result();
        $data['soal_ujian']= $this->pengajar_model->getSoalUjian($id)->result();
        //$data['id_soalnya']=$id;
        $this->load->view('part/header');
        $this->load->view('part/sidebarpengajar',$data);
        $this->load->view('pengajar/detailUjian',$data);
        $this->load->view('part/footer');
    }
    public function hasilUjian($id)
    {
        $data['nama'] = $this->session->userdata('nama');
        $data['ujian']= $this->pengajar_model->view('el_ujian')->result();
        $data['siswa']= $this->pengajar_model->view('el_siswa')->result();
        $data['jawaban']= $this->pengajar_model->view_where('el_jawaban',array('id_ujian'=>$id))->result();
        $data['id_ujian']=$id;
        // print_r($data);
        $this->load->view('part/header');
        $this->load->view('part/sidebarpengajar',$data);
        $this->load->view('pengajar/hasilUjian',$data);
        $this->load->view('part/footer');
    }
    public function updateUjian($id)
    {
        $values=array(
            'judul'=>$this->input->post('nama'),
            'tgl_dibuat'=>date('Y-m-d H:i'),
            'tgl_expired'=>$this->input->post('tgl').' '.$this->input->post('jam'),
            'waktu'=>$this->input->post('waktu'),
            'mapel_kelas_id'=>$this->input->post('mapelKelas'),
            'pengajar_id'=>$this->session->userdata('id')
        );
        $this->pengajar_model->update($values,array('id'=>$id),'el_ujian');
        redirect('pengajar/ujian');
    }
    public function soal()
    {
        $data['nama'] = $this->session->userdata('nama');
        $data['soal']= $this->pengajar_model->view_where('el_soal',array('pengajar_id'=>$this->session->userdata('id')))->result();
        $this->load->view('part/header');
        $this->load->view('part/sidebarpengajar',$data);
        $this->load->view('pengajar/soal',$data);
        $this->load->view('part/footer');
    }
    public function simpanSoal($tipe,$id_ujian)
    {
        $insert_id='';
        if ($tipe==1) {
            $values=array(
                'pertanyaan'=>$this->input->post('pertanyaan'),
                'pg_a'=>'A.'.$this->input->post('pg_a'),
                'pg_b'=>'B.'.$this->input->post('pg_b'),
                'pg_c'=>'C.'.$this->input->post('pg_c'),
                'jawaban_pg'=>$this->input->post('jawaban_pg'),
                'tipe'=>$tipe,
                'pengajar_id'=>$this->session->userdata('id')
            );
        $insert_id=$this->pengajar_model->insert($values,'el_soal');
        }elseif ($tipe==2) {
            $values=array(
                'pertanyaan'=>$this->input->post('pertanyaan'),
                'tipe'=>$tipe,
                'pengajar_id'=>$this->session->userdata('id')
            );
        $insert_id=$this->pengajar_model->insert($values,'el_soal');
        }
        $data=array(
                'id_ujian'=>$id_ujian,
                'id_soal'=>$insert_id,
                'aktif'=>1
            );
            $this->pengajar_model->insert($data,'el_ujian_soal');
        redirect('pengajar/detailUjian/'.$id_ujian);
    }
    public function tambahSoalUjian($id)
    {
        $daftarSoal=$this->input->post('pertanyaan');
        for ($i=0; $i <count($daftarSoal) ; $i++) { 
            $data=array(
                'id_ujian'=>$id,
                'id_soal'=>$daftarSoal[$i],
                'aktif'=>1
            );
            $this->pengajar_model->insert($data,'el_ujian_soal');
        }
        redirect('pengajar/detailUjian/'.$id);
    }
    public function nilaiEssay($id,$id_ujian)
    {
        $nilaiEssay=$this->input->post('nilai_essay');
        $nilaiPG= $this->input->post('nilai_pg');
        $jumlahSoal= $this->input->post('jumlah_soal');
        $nilai_total=((($nilaiEssay+$nilaiPG)/3)/$jumlahSoal)*100;
        $values=array(
            'nilai_essay'=>$this->input->post('nilai_essay'),
            'nilai_total'=>$nilai_total
        );
        // echo $nilai_total;
        // print_r($values);
        $this->pengajar_model->update($values,array('id_jawaban'=>$id),'el_jawaban');
        redirect('pengajar/hasilUjian/'.$id_ujian);
    }
    public function hapusSoal($id)
    {
        $this->pengajar_model->delete(array('id_soal'=>$id),'el_soal');
        redirect('pengajar/soal/');
    }
    public function hapusSoalUjian($id,$id_ujian)
    {
        $this->pengajar_model->update(array('aktif'=>0),array('id_ujian_soal'=>$id),'el_ujian_soal');
        redirect('pengajar/detailUjian/'.$id_ujian);
    }
    public function hapusPesan($id,$sender,$receiver)
    {
        $this->pengajar_model->delete(array('id'=>$id),'el_messages');
        redirect('pengajar/detailPesan/'.$sender.'/'.$receiver);
    }
    
    public function absen()
    {
        $data['data']=$this->pengajar_model->getKelas()->result();
        $data['pengajar']=$this->pengajar_model->getPengajar($this->session->userdata('id'))->result();
        $data['mapel']=$this->pengajar_model->getMapelKelas()->result();
        $this->load->view('part/header');
        $this->load->view('part/sidebarpengajar',$data);
        $this->load->view('pengajar/absen/absenkelas');
        $this->load->view('part/footer');
    }

    public function setabsensi($kelas,$mapel)
    {
        $data['idkelas']=$kelas;
        $data['idmapelkelas']=$mapel;
        $data['kelas']=$this->pengajar_model->getKelasId($kelas)->result();
        $data['mapel']=$this->pengajar_model->view_where('el_mapel',array('id'=>$mapel))->result();
        $this->load->view('part/header');
        $this->load->view('part/sidebarpengajar',$data);
        $this->load->view('pengajar/absen/setabsenkelas');
        $this->load->view('part/footer');
    }
    public function setabsens()
    {
        $idkelas = $this->input->post('idkelas');
        $idmapel = $this->input->post('idmapelkelas');
        $tanggal = $this->input->post('tanggal');
        $jammulai = $this->input->post('jammulai');
        $jamselesai = $this->input->post('jamselesai');
        $data = array(
            'kelas_id' => $idkelas, 
            'mapel_id' => $idmapel, 
            'pengajar_id' => $this->session->userdata('id'), 
            'tanggal' => $tanggal, 
            'jam_mulai' => $jammulai, 
            'jam_selesai' => $jamselesai
        );

        $id = $this->pengajar_model->insert($data,'el_absen');

        $kelassiswa = $this->pengajar_model->view_where('el_kelas_siswa',array('kelas_id'=>$idkelas,'aktif'=>1))->result();
        
        foreach ($kelassiswa as $i) {
            $data = array('absen_id' => $id,'siswa_id'=>$i->siswa_id,'status'=>0);
            $this->pengajar_model->insert($data,'el_absen_siswa');
        }

        redirect('pengajar/absensi/'.$id);
    }

    public function absensi($idabsen)
    {
        $data['absen'] = $this->pengajar_model->absenSiswa($idabsen)->result();
        
        $this->load->view('part/header');
        $this->load->view('part/sidebarpengajar',$data);
        $this->load->view('pengajar/absen/absenSiswa');
        $this->load->view('part/footer');

    }

    public function updateAbsenSiswa($idabsensi,$idabsen,$status)
    {
        $data = array('status' => $status );
        $where = array('id' => $idabsensi);
        $this->pengajar_model->update($data,$where,'el_absen_siswa');
        redirect('pengajar/absensi/'.$idabsen);
    }
    public function historyAbsen($kelas,$mapel)
    {
        $where = array('kelas_id'=>$kelas,'mapel_id'=>$mapel);
        $data['absen'] = $this->pengajar_model->view_where('el_absen',$where)->result();

        $this->load->view('part/header');
        $this->load->view('part/sidebarpengajar',$data);
        $this->load->view('pengajar/absen/historyabsen');
        $this->load->view('part/footer');
    }
    public function hapusUjian($id)
    {
        $this->pengajar_model->delete(array('id'=>$id),'el_ujian');
        redirect('pengajar/ujian/');
    }
}
?>