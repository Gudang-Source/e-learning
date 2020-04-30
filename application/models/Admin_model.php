<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class admin_model extends CI_Model{
        public function insert($data,$table)
        {
            $this->db->insert($table, $data);
            return $this->db->insert_id();
        }
        public function update($data,$where,$table)
        {
            $this->db->where($where);
            $this->db->update($table, $data);
        }
        public function delete($id,$table)
        {
            $this->db->where($id);
            $this->db->delete($table);
            
            
        }
        public function getDataSiswa($status)
        {
            return  $this->db->query("SELECT el_siswa.id,el_siswa.nama,nis,agama, jenis_kelamin,el_kelas.nama as kelas, status_id FROM el_siswa join el_kelas_siswa on el_kelas_siswa.siswa_id=el_siswa.id join el_kelas ON el_kelas.id=el_kelas_siswa.kelas_id WHERE el_kelas_siswa.aktif=1 AND status_id=".$status);
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
        
        public function getPengumuman()
        {
            return $this->db->get('el_pengumuman');
        }

        public function getPengumumanSiswa()
        {
            $this->db->where('tampil_siswa', '1');
            return $this->db->get('el_pengumuman');
        }

        public function getPengumumanGuru()
        {
            $this->db->where('tampil_pengajar', '1');
            return $this->db->get('el_pengumuman');
        }

        public function getDetailPengumuman($id)
        {
            $this->db->where('id', $id);
            return $this->db->get('el_pengumuman');        
        }

        public function TambahPengumuman($data)
        {
            $this->db->insert('el_pengumuman', $data);    
        }

        public function updatePengumuman($data,$id)
        {
            $this->db->where('id', $id);
            $this->db->update('el_pengumuman', $data);
        }

        public function hapusPengumuman($id)
        {
            $this->db->where('id', $id);
            $this->db->delete('el_pengumuman');
        }

        public function getPengajar($id)
        {
            $this->db->where('id', $id);
            return $this->db->get('el_pengajar');
        }

        public function GetAllMapel()
        {
            return $this->db->get('el_mapel');
        }

        public function addMataPelajaran($data)
        {
            $this->db->insert('el_mapel', $data);
        }

        public function getMapelById($where)
        {
            $this->db->where('id', $where);
            return $this->db->get('el_mapel');
        }

        public function editMapel($data,$where)
        {
            $this->db->where('id', $where);
            $this->db->update('el_mapel',$data);
        }

        public function deleteMapel($id)
        {
            $this->db->where('id', $id);
            $this->db->delete('el_mapel');
        }
        public function getProfileAdmin($id)
        {
            $this->db->where('id', $id);
            return $this->db->get('el_pengajar');
        }
        public function updateProfile($data,$id)
        {
            $this->db->where('id', $id);
            $this->db->update('el_pengajar', $data);
        }
        public function updateImage($data,$id)
        {
            $this->db->where('id', $id);
            $this->db->update('el_pengajar', $data);
        }
        public function getKelas()
        {
            return  $this->db->query("SELECT * FROM  el_kelas ORDER BY urutan");
        }
        public function getLastUrutanKelas()
        {
            return  $this->db->query("SELECT * FROM  el_kelas ORDER BY urutan DESC LIMIT 1");
        }
        public function getKelasId($id)
        {
            return  $this->db->query("SELECT * FROM  el_kelas WHERE id = ".$id);
        }
        public function getMapelKelas()
        {
            return  $this->db->query("SELECT
            emk.id AS id,
            emk.kelas_id,
            em.nama,
            emk.mapel_id,
            emk.aktif AS kelas_aktif
            FROM
            el_mapel_kelas AS emk
            JOIN el_mapel AS em ON em.id = emk.mapel_id
            WHERE
            emk.aktif = 1");
        }

        public function getJadwalKelas($hari,$id)
        {
            return $this->db->query("SELECT
            emk.id AS id,
            emk.kelas_id,
            em.nama AS mapel,
            emk.mapel_id,
            emk.aktif AS kelas_aktif,
            ema.id AS mapel_kelas_id,
            ema.jam_mulai,
            ema.jam_selesai,
            ema.hari_id,
            ema.pengajar_id,
            ep.nama AS pengajar
            FROM
            el_mapel_kelas AS emk
            JOIN el_mapel AS em ON em.id = emk.mapel_id
            INNER JOIN el_mapel_ajar AS ema ON ema.mapel_kelas_id = emk.id
            INNER JOIN el_pengajar AS ep ON ema.pengajar_id = ep.id
            WHERE
            emk.aktif = 1 AND
            emk.kelas_id = ".$id."  AND
            ema.hari_id = ".$hari);
        }

        public function getJadwalKelasId($id)
        {
            return $this->db->query("SELECT
            emk.id AS id,
            emk.kelas_id,
            em.nama AS mapel,
            emk.mapel_id,
            emk.aktif AS kelas_aktif,
            ema.id AS mapel_kelas_id,
            ema.jam_mulai,
            ema.jam_selesai,
            ema.hari_id,
            ema.pengajar_id,
            ep.nama AS pengajar
            FROM
            el_mapel_kelas AS emk
            JOIN el_mapel AS em ON em.id = emk.mapel_id
            INNER JOIN el_mapel_ajar AS ema ON ema.mapel_kelas_id = emk.id
            INNER JOIN el_pengajar AS ep ON ema.pengajar_id = ep.id
            WHERE
            emk.aktif = 1 AND
            ema.id = ".$id);
            
        }
        
    }
    
?>