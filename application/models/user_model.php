<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class user_model extends CI_Model {
        
        public function login($username,$password)
        {
            $auth = array('username' => $username , 'password' => $password );
            $this->db->where($auth);
            return $this->db->get('el_login');
        }

        public function getDataSiswa($id)
        {
            $this->db->where('id', $id);
            return $this->db->get('el_siswa');
        }
        
        public function getDataGuru($id)
        {
            $this->db->where('id', $id);
            return $this->db->get('el_pengajar');
        }

        public function registerSiswa($data)
        {
            $this->db->insert('el_siswa', $data);
        }
        public function registerGuru($data)
        {
            $this->db->insert('el_pengajar', $data);
        }

        public function registerAdminaccount($data)
        {
            $this->db->insert('el_login', $data);
        }
        public function registerGuruaccount($data)
        {
            $this->db->insert('el_login', $data);
        }

        public function registerSiswaaccount($data)
        {
            $this->db->insert('el_login', $data);
        }

        public function getSiswaId($nis)
        {
            $this->db->where('nis', $nis);
            return $this->db->get('el_siswa');
        }
        public function getPengajarId($nis)
        {
            $this->db->where('nip', $nis);
            return $this->db->get('el_pengajar');
        }

        function get_alert($notif = 'success', $msg = '')
        {
            return '<div class="alert alert-'.$notif.'"><button type="button" class="close" data-dismiss="alert">×</button> '.$msg.'</div>';
        }
    }
?>