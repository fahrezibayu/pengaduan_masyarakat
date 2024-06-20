<?php
defined('BASEPATH') or die('No direct script access allowed!');

class Absen_m extends CI_Model
{
    public function get_absen($id_absen)
    {
        $this->db->select('nama_pegawai, id_absen.*');
        $this->db->from('absen');
        $this->db->where('absen.id_absen', $id_absen);
        $this->db->order_by('id_absen', 'DESC');
        $query = $this->db->get()->result_array();
        return $query;

        /*$this->db->select("DATE_FORMAT(tgl, '%d-%m-%Y') AS tgl, waktu AS jam_masuk, (SELECT waktu FROM absen WHERE tgl = tgl AND id_user = '6' AND keterangan != keterangan) AS jam_pulang");
        $this->db->where('id_user', $id_user);
        $this->db->where("DATE_FORMAT(tgl, '%m') = ", $bulan);
        $this->db->where("DATE_FORMAT(tgl, '%Y') = ", $tahun);
        $this->db->group_by("tgl");
        $result = $this->db->get('absen');
        return $result->result_array();*/
    }

    public function absen_harian_user($id_user)
    {
        $today = date('Y-m-d');
        $this->db->where('tgl', $today);
        $this->db->where('id_user', $id_user);
        $data = $this->db->get('absen');
        return $data;
    }

    public function insert_data($data)
    {
        $result = $this->db->insert('absen', $data);
        return $result;
    }

    public function get_jam_by_time($time)
    {
        $this->db->where('start', $time, '<=');
        $this->db->or_where('finish', $time, '>=');
        $data = $this->db->get('jam');
        return $data->row();
    }
}



/* End of File: d:\Ampps\www\project\absen-pegawai\application\models\absen_model.php */