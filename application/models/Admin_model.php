<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class admin_model extends CI_Model{
    
        public function getDataSiswa($status)
        {
            return  $this->db->query("SELECT el_siswa.id,el_siswa.nama,nis,agama, jenis_kelamin,el_kelas.nama as kelas, status_id FROM el_siswa join el_kelas_siswa on el_kelas_siswa.siswa_id=el_siswa.id join el_kelas ON el_kelas.id=el_kelas_siswa.kelas_id WHERE status_id=".$status);
        }
        public function view($table)
        {
            return  $this->db->get($table);
        }
    	public function view_where($table,$where)
        {
            return  $this->db->get_where($table,$where);
        }
        public function getKelasSiswa($siswa_id)
        {
            return  $this->db->query("SELECT el_kelas_siswa.id,siswa_id,nama,kelas_id,el_kelas_siswa.aktif FROM el_kelas_siswa join el_kelas ON el_kelas.id=el_kelas_siswa.kelas_id WHERE el_kelas_siswa.siswa_id=".$siswa_id);
        }
        public function getAkunSiswa($siswa_id)
        {
            return  $this->db->query("SELECT el_login.id,username,password FROM el_siswa join el_login ON el_login.siswa_id=el_siswa.id WHERE el_siswa.id=".$siswa_id);
        }
    }
    
?>