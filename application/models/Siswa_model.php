<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class siswa_model extends CI_Model{
    
        public function getProfil($id)
        {
            $this->db->where('id', $id);
            return $this->db->get('el_siswa');
        }

        public function getPengumumanSiswa()
        {
            $this->db->where('tampil_siswa', '1');
            return $this->db->get('el_pengumuman');
        }
        public function getDetailPengumuman($id)
        {
            $this->db->where('id', $id);
            return $this->db->get('el_pengumuman');        
        }
        public function getProfileSiswa($id)
        {
            $this->db->where('id', $id);
            return $this->db->get('el_siswa');
        }
    }
    
?>