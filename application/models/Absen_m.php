<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Absen_m extends CI_Model
{

    public function get($id = null)
    {
        $this->db->from('absen');
        if ($id != null) {
            $this->db->where('id_absen', $id);
        }
        $query = $this->db->get();
        return $query;
    }
    public function del($id)
    {
        $this->db->where('id_absen', $id);
        $this->db->delete('absen');
    }

    public function count_absensi($month, $user_id) {
        return $this->db->where('id_pegawai', $user_id)
                        ->where('MONTH(tgl_absen)', $month)
                        ->count_all_results('absen');
    }

    public function sum_lembur($month, $user_id) {
        return $this->db->where('id_pegawai', $user_id)
                        ->where('MONTH(tgl_absen)', $month)
                        ->select_sum('lembur')
                        ->get('absen')
                        ->row()
                        ->lembur;
    }

    public function get_absensi($month, $user_id) {
        return $this->db->where('id_pegawai', $user_id)
                        ->where('MONTH(tgl_absen)', $month)
                        ->get('absen')
                        ->result();
    }
}
