<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class user extends CI_Controller {

    public function index()
    {
        $this->load->view('part/headerauth');
        $this->load->view('auth/login');
        $this->load->view('part/footerauth');
    }

    // ini view register siswa
    public function registerSiswa()
    {
        $this->load->view('part/headerauth');
        $this->load->view('auth/registerSiswa');
        $this->load->view('part/footerauth');
    }
    // ini view register guru
    public function registerGuru()
    {
        $this->load->view('part/headerauth');
        $this->load->view('auth/registerGuru');
        $this->load->view('part/footerauth');
    }

    // ini logika proses login
    public function prosesLogin()
    {
        
        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');

        if ($this->form_validation->run() == TRUE) {
            $email = $this->input->post('email');
            $password = md5($this->input->post('password'));
            $auth = $this->user_model->login($email,$password)->result();
            
            // print_r($auth);
            
            if (!empty($auth[0]->siswa_id)) {

                $datasiswa = $this->user_model->getDataSiswa($auth[0]->siswa_id)->result();
                $siswa = array(
                    'id' => $auth[0]->siswa_id,
                    'nama' => $datasiswa[0]->nama
                );
                $this->session->set_userdata($siswa);
                
                redirect('siswa');
            }elseif(!empty($auth[0]->pengajar_id)){
                if (!empty($auth[0]->is_admin)) {
                    $admin = array(
                        'id' => $auth[0]->siswa_id,
                        'nama' => $datasiswa[0]->nama
                    );
                    $this->session->set_userdata( $admin );
                    
                    redirect('admin');
                }
                
                $pengajar = array(
                    'id' => $auth[0]->siswa_id,
                    'nama' => $datasiswa[0]->nama
                );
                $this->session->set_userdata( $pengajar );
                
                redirect('pengajar');
            }else{
                $this->session->set_flashdata('error', $this->user_model->get_alert('warning', 'maaf username atau password salah.'));
                redirect('user');
            }
            
        } else {
            $this->session->set_flashdata('error', $this->user_model->get_alert('warning', 'Form harus di isi.'));
            redirect('user');
        }
            
            
    }

    // ini logika register siswa
    public function prosesRegisterSiswa()
    {
        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');
        $this->form_validation->set_rules('nama', 'nama', 'required');
        $this->form_validation->set_rules('nis', 'nis', 'required');
        $this->form_validation->set_rules('tempatlahir', 'tempatlahir', 'required');
        $this->form_validation->set_rules('jk', 'jk', 'required');
        $this->form_validation->set_rules('alamat', 'alamat', 'required');
        $this->form_validation->set_rules('tahunmasuk', 'tahunmasuk', 'required');
        
        if ($this->form_validation->run() == TRUE) {
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $nama = $this->input->post('nama');
            $nis = $this->input->post('nis');
            $tempatlahir = $this->input->post('tempatlahir');
            $jk = $this->input->post('jk');
            $alamat = $this->input->post('alamat');
            $tahunmasuk = $this->input->post('tahunmasuk');
            
            $nis = $this->user_model->getSiswaId($nis)->result();
            if(empty($nis[0]->nis)){
                $data2 = array(
                    'nama' => $nama ,
                    'nis' => $nis ,
                    'tempatlahir' => $tempatlahir ,
                    'jk' => $jk ,
                    'alamat' => $alamat,
                    'tahunmasuk' => $tahunmasuk
                );
                $this->user_model->registerSiswa($data2);
                
                $data1 = array(
                    'email' => $email ,
                    'password' => $password
                );

            }else{
                $this->session->set_flashdata('error', $this->user_model->get_alert('warning', 'Maaf NIS sudah Terdaftar .'));
                redirect('user');
            }

            redirect('user');
        } else {
            $this->session->flashdata('error', $this->model_user->get_alert('warning', 'Lengkapi form di bawah.'));
            redirect('user/registerSiswa');
        }
    }

    // ini logika register guru
    public function prosesRegisterGuru()
    {
        $this->form_validation->set_rules('fieldname', 'fieldlabel', 'required');
        
        if ($this->form_validation->run() == TRUE) {
            $data = array('' => 'ad' );
            $this->user_model->registerSiswa($data);
            redirect('user');
        } else {
            $this->session->flashdata('error', $this->model_user->get_alert('warning', 'Lengkapi form di bawah.'));
            redirect('user/registerGuru');
        }
    }

    // ini logout
    public function logout()
    {   
       $this->session->sess_destroy();
       redirect('user');
    }

    
}

?>