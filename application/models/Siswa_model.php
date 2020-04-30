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
        public function view($table)
        {
            return  $this->db->get($table);
        }
        public function view_where($table,$where)
        {
            return  $this->db->get_where($table,$where);
        }
        public function pesan($id)
        {
            // $this->db->select("el_messages.id,owner_id,sender_receiver_id,el_siswa.nama,el_messages.date FROM el_messages JOIN el_siswa ON el_siswa.id=el_messages.sender_receiver_id");
            // $this->db->from('el_messages');
            // $this->db->join('el_siswa','el_siswa.id=el_messages.sender_receiver_id');
            // $this->db->where("el_messages.owner_id",$this->session->userdata('id'));
            // $this->db->or_where("el_messages.sender_receiver_id",$this->session->userdata('id'));
            // $this->db->group_by("owner_id","sender_receiver_id");
            $query=$this->db->query("SELECT e1.username as pengirim,m.owner_id,m.content,m.sender_receiver_id,e2.username as penerima FROM el_login e1 JOIN el_messages m ON m.owner_id=e1.id JOIN el_login e2 ON e2.id=m.sender_receiver_id WHERE m.owner_id=$id or m.sender_receiver_id=$id GROUP BY e1.username order by m.date DESC");
            return $query;
        }
        public function isiPesan($send,$receive)
        {
            $query="SELECT m.id as idpesan,e1.username as pengirim,m.owner_id,m.content,m.sender_receiver_id,e2.username as penerima,m.date FROM el_login e1 JOIN el_messages m ON m.owner_id=e1.id JOIN el_login e2 ON e2.id=m.sender_receiver_id WHERE (m.owner_id=$send AND m.sender_receiver_id=$receive) OR (m.owner_id=$receive AND m.sender_receiver_id=$send) group by m.date order by m.date ASC";
            return $this->db->query($query);
        }
        public function insert($data,$table)
        {
            $this->db->insert($table,$data);
        }
        public function updateProfile($data,$id)
        {
            $this->db->where('id', $id);
            $this->db->update('el_siswa', $data);
        }
        public function updateImage($data,$id)
        {
            $this->db->where('id', $id);
            $this->db->update('el_pengajar', $data);
        }
        public function filterSiswa($like,$kelamin,$agama,$kelas)
        {
            $this->db->select('el_kelas_siswa.siswa_id, el_siswa.nis, el_siswa.nama as nama_siswa, el_siswa.jenis_kelamin, el_siswa.tempat_lahir, el_siswa.tgl_lahir, el_siswa.agama, el_siswa.tahun_masuk, el_siswa.alamat, el_siswa.status_id, el_kelas.nama as nama_kelas, el_kelas_siswa.kelas_id as id_kelas');
            $this->db->from('el_siswa');
            $this->db->join('el_kelas_siswa','el_kelas_siswa.siswa_id=el_siswa.id');
            $this->db->join('el_kelas','el_kelas.id=el_kelas_siswa.kelas_id');
            $this->db->where('el_kelas_siswa.aktif','1');
            if (!empty($like)) {
                $this->db->group_start();
                if ($like['nis']!='')
                $this->db->like('el_siswa.nis',$like['nis']);
                if ($like['nama']!='')
                $this->db->or_like('el_siswa.nama',$like['nama']);
                if ($like['tahun_masuk']!='')
                $this->db->or_like('el_siswa.tahun_masuk',$like['tahun_masuk']);
                if ($like['tempat_lahir']!='')
                $this->db->or_like('el_siswa.tempat_lahir',$like['tempat_lahir']);
                if ($like['alamat']!='')
                $this->db->or_like('el_siswa.alamat',$like['alamat']);
                if ($like['tgl_lahir']!='')
                $this->db->or_like('el_siswa.tgl_lahir',$like['tgl_lahir']);
                if ($like['status_id']!='')
                $this->db->or_like('el_siswa.status_id',$like['status_id']);
                if (!empty($kelamin)) {
                    for ($i=0; $i <count($kelamin) ; $i++) { 
                        $this->db->or_like('el_siswa.jenis_kelamin',$kelamin[$i]);
                    } 
                }
                if (!empty($agama)) {
                    for ($i=0; $i <count($agama) ; $i++) { 
                        $this->db->or_like('el_siswa.agama',$agama[$i]);
                    } 
                }
                if (!empty($kelas)) {
                    for ($i=0; $i <count($kelas) ; $i++) { 
                        $this->db->or_like('el_kelas.nama',$kelas[$i]);
                    } 
                }
                $this->db->group_end();
            }
            return $this->db->get();
        }
        public function detailFilterSiswa($where)
        {
            $this->db->select('el_kelas_siswa.siswa_id, el_siswa.nis, el_siswa.nama as nama_siswa, el_siswa.jenis_kelamin, el_siswa.tempat_lahir, el_siswa.tgl_lahir, el_siswa.agama, el_siswa.tahun_masuk, el_siswa.alamat, el_siswa.status_id, el_kelas.nama as nama_kelas, el_kelas_siswa.kelas_id as id_kelas');
            $this->db->from('el_siswa');
            $this->db->join('el_kelas_siswa','el_kelas_siswa.siswa_id=el_siswa.id');
            $this->db->join('el_kelas','el_kelas.id=el_kelas_siswa.kelas_id');
            $this->db->where('el_siswa.id',$where);
            return $this->db->get();
        }
        public function jadwalPelajaran($hari)
        {
            return $this->db->query('SELECT
            el_mapel_ajar.hari_id,
            el_mapel_ajar.jam_mulai,
            el_mapel_ajar.jam_selesai,
            el_mapel_ajar.pengajar_id,
            el_mapel_ajar.mapel_kelas_id,
            el_pengajar.nama,
            el_mapel_ajar.aktif,
            el_mapel.nama AS pelajaran,
            el_mapel_kelas.kelas_id
            FROM
            el_mapel_ajar
            JOIN el_pengajar ON el_mapel_ajar.pengajar_id = el_pengajar.id
            JOIN el_mapel_kelas ON el_mapel_ajar.mapel_kelas_id = el_mapel_kelas.id
            INNER JOIN el_mapel ON el_mapel_kelas.mapel_id = el_mapel.id
            WHERE
            el_mapel_ajar.hari_id = '.$hari.'
            ORDER BY
            el_mapel_ajar.jam_mulai ASC
            '); 
        }
        public function getKelasSiswa($siswa_id)
        {
            return  $this->db->query("SELECT el_kelas_siswa.id,siswa_id,nama,kelas_id,el_kelas_siswa.aktif FROM el_kelas_siswa join el_kelas ON el_kelas.id=el_kelas_siswa.kelas_id WHERE el_kelas_siswa.siswa_id=".$siswa_id);
        }
        public function filterPengajar($like,$kelamin)
        {
            $this->db->select('el_pengajar.`id`, `nip`, `nama`, `jenis_kelamin`, `tempat_lahir`, `tgl_lahir`, `alamat`, `foto`, `status_id`,`is_admin`');
            $this->db->from('el_pengajar');
            $this->db->join('el_login','el_login.pengajar_id=el_pengajar.id');
            $this->db->where('status_id','1');
            if (!empty($like)) {
                $this->db->group_start();
                if ($like['nip']!='')
                $this->db->like('nip',$like['nip']);
                if ($like['nama']!='')
                $this->db->or_like('nama',$like['nama']);
                if ($like['tempat_lahir']!='')
                $this->db->or_like('tempat_lahir',$like['tempat_lahir']);
                if ($like['alamat']!='')
                $this->db->or_like('alamat',$like['alamat']);
                if ($like['tgl_lahir']!='')
                $this->db->or_like('tgl_lahir',$like['tgl_lahir']);
                if ($like['is_admin']!='')
                $this->db->or_like('is_admin',$like['is_admin']);
                if (!empty($kelamin)) {
                    for ($i=0; $i <count($kelamin) ; $i++) { 
                        $this->db->or_like('jenis_kelamin',$kelamin[$i]);
                    } 
                }
                $this->db->group_end();
            }
            return $this->db->get();
        }
        public function jadwalPengajar($id)
        {
            return $this->db->query('SELECT
            el_mapel_ajar.hari_id,
            el_mapel_ajar.jam_mulai,
            el_mapel_ajar.jam_selesai,
            el_mapel_ajar.pengajar_id,
            el_mapel_ajar.mapel_kelas_id,
            el_pengajar.nama,
            el_mapel_ajar.aktif,
            el_mapel.nama AS pelajaran,
            el_mapel_kelas.kelas_id
            FROM
            el_mapel_ajar
            JOIN el_pengajar ON el_mapel_ajar.pengajar_id = el_pengajar.id
            JOIN el_mapel_kelas ON el_mapel_ajar.mapel_kelas_id = el_mapel_kelas.id
            INNER JOIN el_mapel ON el_mapel_kelas.mapel_id = el_mapel.id
            WHERE el_mapel_ajar.pengajar_id = '.$id.'
            ORDER BY
            el_mapel_ajar.hari_id ASC
            '); 
        }
        public function getUjianSiswa($id)
        {
            return $this->db->query('SELECT DISTINCT el_ujian.id,judul,tgl_dibuat,tgl_expired,waktu,el_ujian.mapel_kelas_id,el_mapel.nama as mapel,el_kelas.nama as kelas,el_kelas_siswa.kelas_id,el_kelas_siswa.siswa_id
                FROM el_ujian 
                JOIN el_mapel_kelas on el_mapel_kelas.id=el_ujian.mapel_kelas_id 
                JOIN el_mapel on el_mapel.id=el_mapel_kelas.mapel_id 
                JOIN el_kelas on el_kelas.id=el_mapel_kelas.kelas_id
                JOIN el_kelas_siswa on el_kelas_siswa.kelas_id =el_kelas.id
                WHERE el_kelas_siswa.aktif=1 and el_kelas_siswa.siswa_id='.$id);
        }
        public function getSoalUjian($id)
        {
            return $this->db->query('SELECT * FROM el_ujian_soal JOIN el_soal USING(id_soal) WHERE el_ujian_soal.id_ujian='.$id);
        }
    }
    
?>