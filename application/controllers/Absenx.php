<?php
defined('BASEPATH') or die('No direct script access allowed!');

class Absen extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    check_not_login();
    date_default_timezone_set('Asia/Jakarta');
    $this->load->model(['absen_m', 'data_m', 'jam_m']);
    $this->load->library('form_validation');
    $this->load->helper('Tanggal');
  }

  public function index()
  {
    $id_absen = $this->session->userdata('id_absen');
    $data['absen'] = $this->absen_m->get_absen($id_absen);
    $this->template->load('template', 'absen/absen_data', $data);
  }

  public function check_absen()
  {
    $now = date('H:i:s');
    $data['absen'] = $this->absen->absen_harian_user($this->session->id_user)->num_rows();
    return $this->template->load('template', 'absen/absen_data', $data);
  }

  public function absen()
  {
    if (@$this->uri->segment(3)) {
      $keterangan = ucfirst($this->uri->segment(3));
    } else {
      $absen_harian = $this->absen->absen_harian_user($this->session->id_user)->num_rows();
      $keterangan = ($absen_harian < 2 && $absen_harian < 1) ? 'Masuk' : 'Pulang';
    }

    $data = [
      'tgl' => date('Y-m-d'),
      'waktu' => date('H:i:s'),
      'keterangan' => $keterangan,
      'id_user' => $this->session->id_user
    ];
    $result = $this->absen->insert_data($data);
    if ($result) {
      $this->session->set_flashdata('response', [
        'status' => 'success',
        'message' => 'absen berhasil dicatat'
      ]);
    } else {
      $this->session->set_flashdata('response', [
        'status' => 'error',
        'message' => 'absen gagal dicatat'
      ]);
    }
    redirect('absen/lap_absen');
  }
}


/* End of File: d:\Ampps\www\project\absen-pegawai\application\controllers\absen.php */