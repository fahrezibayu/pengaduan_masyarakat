<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tunggu_m extends CI_Model
{
	public function get()
	{
		$this->db->select('nama_pegawai, ket_divisi, pengajuan_cuti.*');
		$this->db->from('pengajuan_cuti');
		$this->db->join('user', 'pengajuan_cuti.id_user= user.id_user');
		$this->db->join('divisi', 'pengajuan_cuti.id_divisi = divisi.id_divisi');
		$this->db->order_by('id_cuti', 'DESC');
		$query = $this->db->get()->result_array();
		return $query;
	}

	public function search($bulan, $tahun, $karyawan)
	{

		if ($karyawan == "all") {
			if ($bulan == "" && $tahun != "") {
				$this->db->select('nama_pegawai, ket_divisi, pengajuan_cuti.*');
				$this->db->from('pengajuan_cuti');
				$this->db->join('user', 'pengajuan_cuti.id_user = user.id_user');
				$this->db->join('divisi', 'pengajuan_cuti.id_divisi = divisi.id_divisi');
				$this->db->where('SUBSTRING(pengajuan_cuti.created_at,7,4)', $tahun);
				$this->db->order_by('id_cuti', 'DESC');
				$query = $this->db->get()->result_array();
				return $query;
			} else if ($bulan == "" && $tahun == "") {
				$this->db->select('nama_pegawai, ket_divisi, pengajuan_cuti.*');
				$this->db->from('pengajuan_cuti');
				$this->db->join('user', 'pengajuan_cuti.id_user = user.id_user');
				$this->db->join('divisi', 'pengajuan_cuti.id_divisi = divisi.id_divisi');
				$this->db->order_by('id_cuti', 'DESC');
				$query = $this->db->get()->result_array();
				return $query;
			} else if ($bulan != "" && $tahun == "") {
				$this->db->select('nama_pegawai, ket_divisi, pengajuan_cuti.*');
				$this->db->from('pengajuan_cuti');
				$this->db->join('user', 'pengajuan_cuti.id_user = user.id_user');
				$this->db->join('divisi', 'pengajuan_cuti.id_divisi = divisi.id_divisi');
				$this->db->where('SUBSTRING(pengajuan_cuti.created_at,4,2)', $bulan);
				$this->db->order_by('id_cuti', 'DESC');
				$query = $this->db->get()->result_array();
				return $query;
			} else if ($bulan != "" && $tahun != "") {
				$this->db->select('nama_pegawai, ket_divisi, pengajuan_cuti.*');
				$this->db->from('pengajuan_cuti');
				$this->db->join('user', 'pengajuan_cuti.id_user = user.id_user');
				$this->db->join('divisi', 'pengajuan_cuti.id_divisi = divisi.id_divisi');
				$this->db->where('SUBSTRING(pengajuan_cuti.created_at,7,4)', $tahun);
				$this->db->where('SUBSTRING(pengajuan_cuti.created_at,4,2)', $bulan);
				$this->db->order_by('id_cuti', 'DESC');
				$query = $this->db->get()->result_array();
				return $query;
			}
		} else {
			if ($bulan == "" && $tahun != "" && $karyawan == "") {
				$this->db->select('nama_pegawai, ket_divisi, pengajuan_cuti.*');
				$this->db->from('pengajuan_cuti');
				$this->db->join('user', 'pengajuan_cuti.id_user = user.id_user');
				$this->db->join('divisi', 'pengajuan_cuti.id_divisi = divisi.id_divisi');
				$this->db->where('SUBSTRING(pengajuan_cuti.created_at,7,4)', $tahun);
				$this->db->order_by('id_cuti', 'DESC');
				$query = $this->db->get()->result_array();
				return $query;
			} else if ($bulan == "" && $tahun == "" && $karyawan != "") {
				$this->db->select('nama_pegawai, ket_divisi, pengajuan_cuti.*');
				$this->db->from('pengajuan_cuti');
				$this->db->join('user', 'pengajuan_cuti.id_user = user.id_user');
				$this->db->join('divisi', 'pengajuan_cuti.id_divisi = divisi.id_divisi');
				$this->db->where('pengajuan_cuti.id_user', $karyawan);
				$this->db->order_by('id_cuti', 'DESC');
				$query = $this->db->get()->result_array();
				return $query;
			} else if ($bulan == "" && $tahun != "" && $karyawan != "") {
				$this->db->select('nama_pegawai, ket_divisi, pengajuan_cuti.*');
				$this->db->from('pengajuan_cuti');
				$this->db->join('user', 'pengajuan_cuti.id_user = user.id_user');
				$this->db->join('divisi', 'pengajuan_cuti.id_divisi = divisi.id_divisi');
				$this->db->where('SUBSTRING(pengajuan_cuti.created_at,7,4)', $tahun);
				$this->db->where('pengajuan_cuti.id_user', $karyawan);
				$this->db->order_by('id_cuti', 'DESC');
				$query = $this->db->get()->result_array();
				return $query;
			} else if ($bulan != "" && $tahun == "" && $karyawan == "") {
				$this->db->select('nama_pegawai, ket_divisi, pengajuan_cuti.*');
				$this->db->from('pengajuan_cuti');
				$this->db->join('user', 'pengajuan_cuti.id_user = user.id_user');
				$this->db->join('divisi', 'pengajuan_cuti.id_divisi = divisi.id_divisi');
				$this->db->where('SUBSTRING(pengajuan_cuti.created_at,4,2)', $bulan);
				$this->db->order_by('id_cuti', 'DESC');
				$query = $this->db->get()->result_array();
				return $query;
			} else if ($bulan != "" && $tahun == "" && $karyawan != "") {
				$this->db->select('nama_pegawai, ket_divisi, pengajuan_cuti.*');
				$this->db->from('pengajuan_cuti');
				$this->db->join('user', 'pengajuan_cuti.id_user = user.id_user');
				$this->db->join('divisi', 'pengajuan_cuti.id_divisi = divisi.id_divisi');
				$this->db->where('SUBSTRING(pengajuan_cuti.created_at,4,2)', $bulan);
				$this->db->where('pengajuan_cuti.id_user', $karyawan);
				$this->db->order_by('id_cuti', 'DESC');
				$query = $this->db->get()->result_array();
				return $query;
			} else if ($bulan != "" && $tahun != "" && $karyawan == "") {
				$this->db->select('nama_pegawai, ket_divisi, pengajuan_cuti.*');
				$this->db->from('pengajuan_cuti');
				$this->db->join('user', 'pengajuan_cuti.id_user = user.id_user');
				$this->db->join('divisi', 'pengajuan_cuti.id_divisi = divisi.id_divisi');
				$this->db->where('SUBSTRING(pengajuan_cuti.created_at,7,4)', $tahun);
				$this->db->where('SUBSTRING(pengajuan_cuti.created_at,4,2)', $bulan);
				$this->db->order_by('id_cuti', 'DESC');
				$query = $this->db->get()->result_array();
				return $query;
			} else if ($bulan != "" && $tahun != "" && $karyawan != "") {
				$this->db->select('nama_pegawai, ket_divisi, pengajuan_cuti.*');
				$this->db->from('pengajuan_cuti');
				$this->db->join('user', 'pengajuan_cuti.id_user = user.id_user');
				$this->db->join('divisi', 'pengajuan_cuti.id_divisi = divisi.id_divisi');
				$this->db->where('SUBSTRING(pengajuan_cuti.created_at,7,4)', $tahun);
				$this->db->where('SUBSTRING(pengajuan_cuti.created_at,4,2)', $bulan);
				$this->db->where('pengajuan_cuti.id_user', $karyawan);
				$this->db->order_by('id_cuti', 'DESC');
				$query = $this->db->get()->result_array();
				return $query;
			}
		}
	}

	public function get_cuti($id_user)
	{
		$this->db->select('nama_pegawai, ket_divisi, pengajuan_cuti.*');
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
