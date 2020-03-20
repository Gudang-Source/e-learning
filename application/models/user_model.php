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
        public function registerSiswa($data)
        {
            $this->db->insert('el_siswa', $data);
        }
        public function registerSiswaaccount($data)
        {
            $this->db->insert('el_login', $data);
        }

        public function registerGuru($data)
        {
            
        }

        public function getGuruId($nip)
        {
            
        }

        public function getSiswaId($nis)
        {
            $this->db->where('nis', $nis);
            return $this->db->get('el_siswa');
        }

        function get_alert($notif = 'success', $msg = '')
        {
            return '<div class="alert alert-'.$notif.'"><button type="button" class="close" data-dismiss="alert">×</button> '.$msg.'</div>';
        }
    }
?>