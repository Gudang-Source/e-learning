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
            
        }

        public function registerGuru($data)
        {
            
        }

        public function getSiswaId($nis)
        {
            
        }

        public function getGuruId($nip)
        {
            
        }

        function get_alert($notif = 'success', $msg = '')
        {
            return '<div class="alert alert-'.$notif.'"><button type="button" class="close" data-dismiss="alert">×</button> '.$msg.'</div>';
        }
    }
?>