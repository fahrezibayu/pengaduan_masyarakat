<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mediapelaporan_m extends CI_Model
{

    public function get($id = null)
    {
        $this->db->from('tbl_media_pelaporan');
        if ($id != null) {
            $this->db->where('id_media_pelaporan', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function del($id)
    {
        $this->db->where('id_media_pelaporan', $id);
        $this->db->delete('tbl_media_pelaporan');
    }

    public function get_by_id($id) {
        return $this->db->get_where('tbl_media_pelaporan', ['id_media_pelaporan' => $id])->row();
    }
}
