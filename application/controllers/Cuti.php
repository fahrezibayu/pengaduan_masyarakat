<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cuti extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model(['tunggu_m', 'data_m', 'divisi_m']);
		$this->load->library('form_validation');
		check_not_login();
	}

	public function index()
	{
		$id_user = $this->session->userdata('id_user');
		$data['data_cuti'] = $this->tunggu_m->get_cuti($id_user);
		$this->template->load('template', 'pengajuan/data_cuti_saya', $data);
	}


	public function add()
	{
		$this->db->select('id_divisi, ket_divisi');
		$this->db->from('divisi');
		$data = [
			'divisies' => $this->db->get()->result_array(),
			'levels' => $this->db->get('level')->result_array(),
			'users' => $this->db->get('user')->result_array()
		];


		$this->form_validation->set_rules('nama_pegawai', 'Nama pegawai', 'required');
		$this->form_validation->set_rules('divisi', 'Divisi', 'required');
		$this->form_validation->set_rules('keperluan', 'Keperluan', 'required');
		$this->form_validation->set_rules('tgl_mulai', 'Mulai', 'required');
		$this->form_validation->set_rules('tgl_sampai', 'Sampai', 'required');
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'required');

		$this->form_validation->set_message('required', '%s masih kosong, silahkan diisi');

		if ($this->form_validation->run() == false) {
			$this->template->load('template', 'pengajuan/tambah_cuti_saya', $data);
		} else {
			error_reporting(0);
			date_default_timezone_set('Asia/Jakarta');
			$tahun = date("Y");
			$this->db->select_sum('lama');
			$this->db->from('pengajuan_cuti');
			$this->db->where('status', '1');
			$this->db->where('SUBSTRING(created_at,7,4)', $tahun);
			$this->db->where("pengajuan_cuti.id_user", $this->session->userdata('id_user'));
			$cuti = $this->db->get()->row_array();
			if ($cuti['lama'] == "") {
				$total = "0";
			} else {
				$total = $cuti['lama'];
			}
			$total_cuti = $total + $this->input->post('lama');
			if ($total_cuti > 12) {
				echo "<script>
				alert('Cuti anda sudah melebihi 12 hari.');
			</script>";
				echo "<script>window.location='" . site_url('cuti') . "';</script>";
			} else {
				$data_cuti = [
					'id_user' => $this->input->post('nama_pegawai'),
					'id_divisi' => $this->input->post('divisi'),
					'keperluan' => $this->input->post('keperluan'),
					'lama' => $this->input->post('lama'),
					'tgl_mulai' => $this->input->post('tgl_mulai'),
					'tgl_sampai' => $this->input->post('tgl_sampai'),
					'keterangan' => $this->input->post('keterangan'),
					'status' => $this->session->userdata('id_level') == 1 ? 1 : 2,
					'created_at' => date('d-m-Y')
				];

				$this->db->insert('pengajuan_cuti', $data_cuti);
				if ($this->db->affected_rows() > 0) {
					echo "<script>
				        alert('Data cuti berhasil di tambahkan');
				    </script>";
				}
				echo "<script>window.location='" . site_url('cuti') . "';</script>";
			}
		}
	}

	public function edit($id)
	{
		$this->db->select('id_divisi, ket_divisi');
		$this->db->from('divisi');
		$data = [
			'divisies' => $this->db->get()->result_array(),
			'levels' => $this->db->get('level')->result_array(),
			'users' => $this->db->get('user')->result_array(),
			'cuti_by_id' => $this->db->get_where('pengajuan_cuti', ['id_cuti' => $id])->row_array()
		];

		$this->form_validation->set_rules('nama_pegawai', 'Nama pegawai', 'required');
		$this->form_validation->set_rules('divisi', 'Divisi', 'required');
		$this->form_validation->set_rules('keperluan', 'Keperluan', 'required');
		$this->form_validation->set_rules('tgl_mulai', 'Mulai', 'required');
		$this->form_validation->set_rules('tgl_sampai', 'Sampai', 'required');
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'required');

		$this->form_validation->set_message('required', '%s masih kosong, silahkan diisi');

		if ($this->form_validation->run() == false) {
			$this->template->load('template', 'pengajuan/edit_cuti_saya', $data);
		} else {

			error_reporting(0);
			date_default_timezone_set('Asia/Jakarta');
			$tahun = date("Y");
			$this->db->select_sum('lama');
			$this->db->from('pengajuan_cuti');
			$this->db->where('status', '1');
			$this->db->where('SUBSTRING(created_at,7,4)', $tahun);
			$this->db->where("id_user", $this->session->userdata('id_user'));
			$cuti = $this->db->get()->row_array();

			$this->db->select_sum('lama');
			$this->db->from('pengajuan_cuti');
			$this->db->where('id_cuti', $id);
			$cuti_ini = $this->db->get()->row_array();
			$total_cuti = $cuti['lama'] - $cuti_ini['lama'] + $this->input->post('lama');
			if ($total_cuti > 12) {
				echo "<script>
				alert('Cuti anda sudah melebihi 12 hari.');
			</script>";
				echo "<script>window.location='" . site_url('cuti') . "';</script>";
			} else {
				$data_cuti = [
					'id_user' => $this->input->post('nama_pegawai'),
					'id_divisi' => $this->input->post('divisi'),
					'keperluan' => $this->input->post('keperluan'),
					'lama' => $this->input->post('lama'),
					'tgl_mulai' => $this->input->post('tgl_mulai'),
					'tgl_sampai' => $this->input->post('tgl_sampai'),
					'keterangan' => $this->input->post('keterangan'),
					'status' => $this->input->post('status')
				];

				$this->db->where('id_cuti', $id);
				$this->db->update('pengajuan_cuti', $data_cuti);
				if ($this->db->affected_rows() > 0) {
					echo "<script>
                    alert('Data cuti berhasil di ubah');
                </script>";
				}
				echo "<script>window.location='" . site_url('cuti') . "';</script>";
			}
		}
	}

	public function del($id)
	{
		$this->tunggu_m->del($id);
		if ($this->db->affected_rows() > 0) {
			echo "<script>
                alert('Data cuti berhasil di hapus');
            </script>";
		}
		echo "<script>window.location='" . site_url('cuti') . "';</script>";
	}

	public function edit_cuti_ajax()
	{
		$id_user = $_GET['id_user'];
		if ($this->input->is_ajax_request()) {
			$data = [
				'status' => 200,
				'cuti' => $this->db->get_where('pengajuan_cuti', ['id_user' => $id_user])->row_array()
			];
			echo json_encode($data);
		}
	}
}
