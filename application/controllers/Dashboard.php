<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		check_not_login();
	}

	public function index()
	{
		error_reporting(0);
		date_default_timezone_set('Asia/Jakarta');
		$data['pelapor'] = $this->db->from('user')->where("id_level",3)->count_all_results();
		$data['pengaduan'] = $this->db->from('tbl_pengaduan')->count_all_results();
		$data['proses'] = $this->db->from('tbl_pengaduan')->where("tindaklanjut =", '')->count_all_results();
		$data['selesai'] = $this->db->from('tbl_pengaduan')->where("tindaklanjut !=", '')->count_all_results();
		$this->template->load('template', 'dashboard', $data);
	}
}
