<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class admin extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('Admin_model');
	}

    public function index()
    {
        $this->load->view('part/header');
        $this->load->view('part/sidebaradmin');
        $this->load->view('admin/dashboard');
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
}

?>