<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengaduanmasyarakat_m extends CI_Model
{

    public function get($id = null)
    {
        $this->db->select('tbl_pengaduan.*, tbl_media_pelaporan.nama_media_pelaporan, user.nama_pegawai, tbl_jenis_pengaduan.nama_jenis_pengaduan');
        $this->db->from('tbl_pengaduan');
        $this->db->join('user', 'tbl_pengaduan.id_users = user.id_user');
        $this->db->join('tbl_media_pelaporan', 'tbl_pengaduan.id_media_pengaduan = tbl_media_pelaporan.id_media_pelaporan');
        $this->db->join('tbl_jenis_pengaduan', 'tbl_pengaduan.id_jenis_pengaduan = tbl_jenis_pengaduan.id_jenis_pengaduan');
        
        $query = $this->db->get();

        return $query;
    }
    public function del($id)
    {
        $this->db->where('id_jenis_pengaduan', $id);
        $this->db->delete('tbl_jenis_pengaduan');
    }

    public function get_by_id($id) {
        return $this->db->get_where('tbl_jenis_pengaduan', ['id_jenis_pengaduan' => $id])->row();
    }
}
