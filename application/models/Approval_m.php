<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Approval_m extends CI_Model
{

    public function get($id = null)
    {
        $this->db->from('cuti');
        if ($id != null) {
            $this->db->where('id_cuti', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function search($date1, $date2)
    {
        $this->db->select('nama_pegawai, ket_divisi, pengajuan_cuti.*');
        $this->db->from('pengajuan_cuti');
        $this->db->join('user', 'pengajuan_cuti.id_user = user.id_user');
        $this->db->join('divisi', 'pengajuan_cuti.id_divisi = divisi.id_divisi');
        $this->db->where("pengajuan_cuti.created_at BETWEEN '$date1' AND '$date2'");
        $this->db->order_by('id_cuti', 'DESC');
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function get_cuti($id_user)
    {
        $this->db->select('user.nama_pegawai, divisi.ket_divisi, pengajuan_cuti.*');
        $this->db->from('pengajuan_cuti');
        $this->db->join('user', 'pengajuan_cuti.id_user = user.id_user');
        $this->db->join('divisi', 'pengajuan_cuti.id_divisi = divisi.id_divisi');
        $this->db->where('pengajuan_cuti.id_user', $id_user);
        $this->db->order_by('id_cuti', 'DESC');
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function del($id)
    {
        $this->db->where('id_cuti', $id);
        $this->db->delete('pengajuan_cuti');
    }
}
