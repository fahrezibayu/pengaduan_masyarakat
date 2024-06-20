<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lap_absen extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        check_not_login();
        //$this->load->model('data_m');
        $this->load->library('form_validation');
    }

    public function index()
    {
        if ($this->fungsi->user_login()->id_level == 1) {
            return $this->lap_absen();
        } else {
            return $this->list_pegawai();
        }
    }

    public function list_pegawai()
    {
        $data = $this->detail_data_absen();
        return $this->template->load('template', 'absen/lap_absen', $data);
    }

    public function lap_absen()
    {
        $data = $this->detail_data_absen();
        return $this->template->load('template', 'absen/lap_absen', $data);
    }

    private function detail_data_absen()
    {
        $id_user = @$this->uri->segment(3) ? $this->uri->segment(3) : $this->session->id_user;
        $bulan = @$this->input->get('bulan') ? $this->input->get('bulan') : date('m');
        $tahun = @$this->input->get('tahun') ? $this->input->get('tahun') : date('Y');
    }

    public function laporan_absensi()
    {
        
        

    }

}
