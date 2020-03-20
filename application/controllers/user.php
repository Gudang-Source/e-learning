<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class user extends CI_Controller {

    public function index()
    {
        $this->load->view('part/headerauth');
        $this->load->view('auth/login');
        $this->load->view('part/footerauth');
    }

    public function registerSiswa()
    {
        $this->load->view('part/headerauth');
        $this->load->view('auth/registerSiswa');
        $this->load->view('part/footerauth');
    }
    public function registerGuru()
    {
        $this->load->view('part/headerauth');
        $this->load->view('auth/registerGuru');
        $this->load->view('part/footerauth');
    }

    public function prosesLogin()
    {
        
        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');

        if ($this->form_validation->run() == TRUE) {
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $auth = $this->user_model->login($email,$password);
            if ($auth['verifed'] == 1) {
                if (!empty($auth['siswa_id'])) {
                    $siswa = array(
                        'nama' => 'value'
                    );
                    $this->session->set_userdata( $siswa );
                    
                    redirect('siswa');
                }elseif(!empty($auth['pengajar_id'])){
                    if (!empty($auth['is_admin'])) {
                        $admin = array(
                            'key' => 'value'
                        );
                        $this->session->set_userdata( $admin );
                        
                        redirect('admin');
                    }
                    
                    $pengajar = array(
                        'key' => 'value'
                    );
                    $this->session->set_userdata( $pengajar );
                    
                    redirect('pengajar');
                }
                
                
            } else {
                $this->session->flashdata('error', $this->model_user->get_alert('warning', 'maaf akun anda belum di verifikasi oleh admin.'));
                redirect('user');
            }
        } else {
            $this->session->flashdata('error', $this->model_user->get_alert('warning', 'maaf username atau password salah.'));
            redirect('user');
        }
            
            
    }

    public function prosesRegisterSiswa()
    {
        $this->form_validation->set_rules('fieldname', 'fieldlabel', 'required');
        
        if ($this->form_validation->run() == TRUE) {
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $nama = $this->input->post('nama');
            $nis = $this->input->post('nis');
            $tempatlahir = $this->input->post('tempatlahir');
            $jk = $this->input->post('jk');
            $alamat = $this->input->post('alamat');
            $tahunmasuk = $this->input->post('tahunmasuk');
            
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

            redirect('user');
        } else {
            $this->session->flashdata('error', $this->model_user->get_alert('warning', 'Lengkapi form di bawah.'));
            redirect('user/registerSiswa');
        }
        
       
        
    }
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

    public function logout()
    {   
       $this->session->sess_destroy();
       redirect('user');
    }

    
}

?>