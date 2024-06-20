<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bidang_m extends CI_Model
{

    public function get($id = null)
    {
        $this->db->from('tbl_bidang');
        if ($id != null) {
            $this->db->where('id_bidang', $id);
        }
        $query = $this->db->get();
        return $query;
    }
    public function del($id)
    {
        $this->db->where('id_bidang', $id);
        $this->db->delete('tbl_bidang');
    }

    public function get_by_id($id) {
        return $this->db->get_where('tbl_bidang', ['id_bidang' => $id])->row();
    }
}
