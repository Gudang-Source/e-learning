<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class siswa_model extends CI_Model{
    
        public function getProfil($id)
        {
            $this->db->where('id', $id);
            return $this->db->get('el_siswa');
        }
    
    }
    
?>