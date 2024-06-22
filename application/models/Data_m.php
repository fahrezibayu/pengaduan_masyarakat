<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_m extends CI_Model
{

    public function get()
    {
        $this->db->select('*');
		$this->db->where("id_level != ",3);
        $query = $this->db->get('user')->result_array();
        return $query;
    }

    public function get_by_id($id)
    {
        $this->db->select('user.*, data_karyawan.*');
        $this->db->from('data_karyawan');
        $this->db->join('user', 'data_karyawan.id_user = user.id_user');
        $this->db->where('data_karyawan.id_pegawai', $id);
        $query = $this->db->get()->row();
        return $query;
    }
    



    public function del($id)
    {
        $this->db->where('id_user', $id);
        $this->db->delete('data_karyawan');
    }
}
