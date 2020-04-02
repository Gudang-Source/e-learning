<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class admin extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('Admin_model');
	}

    public function index()
    {
        $data['pengumumansiswa'] = $this->Admin_model->getPengumumanSiswa()->result();
        $data['pengumumanguru'] = $this->Admin_model->getPengumumanGuru()->result();
        $this->load->view('part/header');
        $this->load->view('part/sidebaradmin');
        $this->load->view('admin/dashboard',$data);
        $this->load->view('part/footer');
    }
    public function dataSiswa($status)
    {
    	$data['siswa']=$this->Admin_model->getDataSiswa($status)->result();
        $this->load->view('part/header');
        $this->load->view('part/sidebaradmin');
        $this->load->view('admin/dataSiswa',$data);
        $this->load->view('part/footer');
    }
    public function dataPengajar()
    {
    	$data['pengajar']=$this->Admin_model->view('el_pengajar')->result();
        $this->load->view('part/header');
        $this->load->view('part/sidebaradmin');
        $this->load->view('admin/dataPengajar',$data);
        $this->load->view('part/footer');
    }
    public function detailSiswa($id)
    {
    	$data['siswa']=$this->Admin_model->view_where('el_siswa',array('id'=>$id))->result();
    	$data['kelas']=$this->Admin_model->getKelasSiswa($id)->result();
    	$data['akun']=$this->Admin_model->getAkunSiswa($id)->result();
        $this->load->view('part/header');
        $this->load->view('part/sidebaradmin');
        $this->load->view('admin/detailSiswa',$data);
        $this->load->view('part/footer');
    }
    public function tambahSiswa()
    {
    	$this->load->view('part/header');
        $this->load->view('part/sidebaradmin');
        $this->load->view('admin/tambahSiswa');
        $this->load->view('part/footer');
    }

    public function profile()
    {
        $data['profile'] = $this->Admin_model->getProfileAdmin($this->session->userdata('id'))->result();
        $this->load->view('part/header');
        $this->load->view('part/sidebaradmin');
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
        $this->Admin_model->updateProfile($data,$id);
        redirect('admin/profile');
    }
    
    public function Pengumuman()
    {
        $data['pengumuman'] = $this->Admin_model->getPengumuman()->result();
        $data['pengumuman'] = $this->Admin_model->getPengumuman()->result();
        $this->load->view('part/header');
        $this->load->view('part/sidebaradmin');
        $this->load->view('admin/pengumuman/index',$data);
        $this->load->view('part/footer');
    }

    public function TambahPengumuman()
    {
        $this->load->view('part/header');
        $this->load->view('part/sidebaradmin');
        $this->load->view('admin/pengumuman/TambahPengumuman');
        $this->load->view('part/footer');
    }
    
    public function prosesTambahPengumuman()
    {
        $this->form_validation->set_rules('judul', 'judul', 'required');
        $this->form_validation->set_rules('isi', 'isi', 'required');
        $this->form_validation->set_rules('pengajar', 'pengajar', 'required');
        $this->form_validation->set_rules('siswa', 'siswa', 'required');
        
        if ($this->form_validation->run() == TRUE) {
            $data = array(
                'judul' => $this->input->post('judul'),
                'konten' => $this->input->post('isi'),
                'tgl_tampil' => $this->input->post('tanggal'),
                'tgl_tutup' => $this->input->post('tanggal'),
                'tampil_siswa' => $this->input->post('siswa'),
                'tampil_pengajar' => $this->input->post('pengajar'),
                'pengajar_id' => $this->session->userdata('id')                
            );
            $this->Admin_model->TambahPengumuman($data);
            redirect('admin/Pengumuman');
            
        } else {
            $this->session->set_flashdata('alert', $this->User_Model->get_alert('warning', 'lengkapilah form di bawah.'));
            
            redirect('admin/TambahPengumuman');
        }
        
    }

    public function EditPengumuman($id)
    {
        $data['pengumuman'] = $this->Admin_model->getDetailPengumuman($id)->result();
        // print_r($data);
        $this->load->view('part/header');
        $this->load->view('part/sidebaradmin');
        $this->load->view('admin/pengumuman/EditPengumuman', $data);
        $this->load->view('part/footer');
    }
    
    public function prosesEditPengumuman()
    {
        $this->form_validation->set_rules('judul', 'judul', 'required');
        $this->form_validation->set_rules('isi', 'isi', 'required');
        $this->form_validation->set_rules('pengajar', 'pengajar', 'required');
        $this->form_validation->set_rules('siswa', 'siswa', 'required');
        
        if ($this->form_validation->run() == TRUE) {
            $id = $this->input->post('id');
            $data = array(
                'judul' => $this->input->post('judul'),
                'konten' => $this->input->post('isi'),
                'tgl_tampil' => $this->input->post('tanggal'),
                'tgl_tutup' => $this->input->post('tanggal'),
                'tampil_siswa' => $this->input->post('siswa'),
                'tampil_pengajar' => $this->input->post('pengajar'),
                'pengajar_id' => $this->session->userdata('id')                
            );
            $this->Admin_model->updatePengumuman($data,$id);
            // print_r($data);
            redirect('admin/Pengumuman');
            
        } else {
            $this->session->set_flashdata('alert', $this->User_Model->get_alert('warning', 'lengkapilah form di bawah.'));
            redirect('admin/EditPengumuman/'.$this->input->post('id'));
        }
        
    }

    public function TampilPengumuman($id)
    {
        $data['pengumuman'] = $this->Admin_model->getDetailPengumuman($id)->result();
        $data['author'] = $this->Admin_model->getPengajar($data['pengumuman'][0]->pengajar_id)->result();
        // print_r($data);
        $this->load->view('part/header');
        $this->load->view('part/sidebaradmin');
        $this->load->view('admin/pengumuman/DetailPengumuman',$data);
        $this->load->view('part/footer');
    }

    public function hapusPengumuman($id)
    {
        $this->Admin_model->hapusPengumuman($id);
        redirect('admin/pengumuman');
    }

    public function Mapel()
    {
        $data['mapel'] = $this->Admin_model->GetAllMapel()->result();
        $this->load->view('part/header');
        $this->load->view('part/sidebaradmin');
        $this->load->view('admin/MataPelajaran/index',$data);
        $this->load->view('part/footer');
    }
    public function TambahMataPelajaran()
    {
        $this->load->view('part/header');
        $this->load->view('part/sidebaradmin');
        $this->load->view('admin/MataPelajaran/addMataPelajaran');
        $this->load->view('part/footer');
    }

    public function prosesTambahMapel()
    {
        $this->form_validation->set_rules('mapel', 'mapel', 'required');
        $this->form_validation->set_rules('deskripsi', 'deskripsi', 'required');
        
        if ($this->form_validation->run() == TRUE) {
            $data = array(
                'nama' => $this->input->post('mapel'),
                'info' => $this->input->post('deskripsi'),                
                'aktif' => 1                
            );
            $this->Admin_model->addMataPelajaran($data);
            redirect('admin/Mapel');
        } else {
            $this->session->set_flashdata('alert', $this->User_Model->get_alert('warning', 'lengkapilah form di bawah.'));
            redirect('admin/TambahMataPelajaran');
        }
    }

    public function hapusMataPelajaran($id)
    {
        $this->Admin_model->deleteMapel($id);
        redirect('admin/Mapel');
    }

    public function EditMataPelajaran($id)
    {
        $data['mapel'] = $this->Admin_model->getMapelById($id)->result();
        $this->load->view('part/header');
        $this->load->view('part/sidebaradmin');
        $this->load->view('admin/MataPelajaran/EditMataPelajaran',$data);
        $this->load->view('part/footer');
    }

    public function prosesEditMapel()
    {
        $this->form_validation->set_rules('mapel', 'mapel', 'required');
        
        if ($this->form_validation->run() == TRUE) {
            $id = $this->input->post('id');
            $aktif = $this->input->post('aktif');
            if ($aktif == 1) {
                $aktif = 1;
            }else{
                $aktif = 0;
            }
            $data = array(
                'nama' => $this->input->post('mapel'),
                'info' => $this->input->post('deskripsi'),                
                'aktif' => $aktif
            );
            $this->Admin_model->editMapel($data,$id);
            redirect('admin/Mapel');
        } else {
            $this->session->set_flashdata('alert', $this->User_Model->get_alert('warning', 'lengkapilah form di bawah.'));
            redirect('admin/EditMataPelajaran');
        }
    }
}

?>