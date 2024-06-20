<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jenispengaduan_m extends CI_Model
{

    public function get($id = null)
    {
        $this->db->from('tbl_jenis_pengaduan');
        if ($id != null) {
            $this->db->where('id_jenis_pengaduan', $id);
        }
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
