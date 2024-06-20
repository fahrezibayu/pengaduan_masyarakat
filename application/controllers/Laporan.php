<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model(['approval_m', 'data_m', 'tunggu_m','absen_m','divisi_m','gaji_model']);
	}

	public function approval()
	{

		if (isset($_POST['search'])) {
			$bulan 		= $this->input->post("bulan");
			$tahun 		= $this->input->post("tahun");
			$karyawan	= $this->input->post("id_pegawai");
			$data['data_cuti'] = $this->tunggu_m->search($bulan, $tahun, $karyawan);
			$data['karyawan'] = $this->data_m->get();
			$this->template->load('template', 'approval/approval_lap', $data);
		} else {
			$data['data_cuti'] = $this->tunggu_m->get();
			$data['karyawan'] = $this->data_m->get();
			$this->template->load('template', 'approval/approval_lap', $data);
		}
	}
	public function absensi()
	{
		$data['karyawan'] = $this->data_m->get();
		$this->template->load('template', 'absen/lap_absensi', $data);
	}

	public function detail_absen($id)
	{
		$data['id_pegawai'] = $id;
		return $this->template->load('template', 'absen/detail_absen',$data);

	}

	public function penggajian()
	{
		
		$month = date("m");
        $year = date("Y");
        $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $month, $year);
        $nonSundays = 0;
        for ($day = 1; $day <= $daysInMonth; $day++) {
            $timestamp = strtotime("$year-$month-$day");
            $dayOfWeek = date('N', $timestamp);
            if ($dayOfWeek != 7) {
                $nonSundays++;
            }
        }
        $users = $this->data_m->get();
        $gaji = [];
        foreach ($users as $row) {
            $jabatan = $this->divisi_m->get_by_id($row['id_divisi']);
            $countAbsensi = $this->absen_m->count_absensi($month, $row['id_pegawai']);
            // $countLembur = $this->absen_m->sum_lembur($month, $row['id_pegawai']);
            // $upahLembur = $countLembur * 10000;
            $gajiKotor = round($countAbsensi / $nonSundays, 2) * $jabatan->gaji_pokok;

            $absensi = $this->absen_m->get_absensi($month, $row['id_pegawai']);
            $t_terlambat = 0;
            $pot_terlambat = 0;
            foreach ($absensi as $value) {
                $jam = $this->gaji_model->get_jam_kerja();
                $waktu_awal = strtotime($jam->start);
                $waktu_akhir = strtotime($value->jam_masuk);
                $selisih_detik = $waktu_akhir - $waktu_awal;
                $selisih_menit = $selisih_detik / 60;
                if ($selisih_menit > 10) {
                    $t_terlambat += 1;
                    $pot_terlambat += 10000;
                }
            }
            $gajiBersih = $gajiKotor - $pot_terlambat;

            $gaji[] = [
                'id_karyawan' => $row['id_pegawai'],
                'karyawan' => $row['nama_pegawai'],
                'jabatan' => $jabatan->ket_divisi,
                'totalhari' => $nonSundays,
                'gaji_pokok' => $jabatan->gaji_pokok,
                'absen' => $countAbsensi,
                'gaji_kotor' => intval($gajiKotor),
                'gaji_bersih' => intval($gajiBersih),
                'pot_terlambat' => intval($pot_terlambat),
                't_terlambat' => intval($t_terlambat),
                'month' => $month,
                'year' => $year,
            ];
        }
        $data['gaji'] = $gaji;
		$this->template->load('template', 'penggajian/laporan', $data);
	}

    public function penggajian_search()
	{

        $bulan = $this->input->post('bulan') + 1;
        if (strlen($bulan) == 1) {
            $month = "0" . $bulan;
        } else {
            $month = $bulan;
        }
        // dd($month);
        $year = $this->input->post('tahun');
        $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $month, $year);
        $nonSundays = 0;
        for ($day = 1; $day <= $daysInMonth; $day++) {
            $timestamp = strtotime("$year-$month-$day");
            $dayOfWeek = date('N', $timestamp);
            if ($dayOfWeek != 7) {
                $nonSundays++;
            }
        }
        $users = $this->data_m->get();
        $gaji = [];
        foreach ($users as $row) {
            $jabatan = $this->divisi_m->get_by_id($row['id_divisi']);
            $countAbsensi = $this->absen_m->count_absensi($month, $row['id_pegawai']);
            // $countLembur = $this->absen_m->sum_lembur($month, $row['id_pegawai']);
            // $upahLembur = $countLembur * 10000;
            $gajiKotor = round($countAbsensi / $nonSundays, 2) * $jabatan->gaji_pokok;

            $absensi = $this->absen_m->get_absensi($month, $row['id_pegawai']);
            $t_terlambat = 0;
            $pot_terlambat = 0;
            foreach ($absensi as $value) {
                $jam = $this->gaji_model->get_jam_kerja();
                $waktu_awal = strtotime($jam->start);
                $waktu_akhir = strtotime($value->jam_masuk);
                $selisih_detik = $waktu_akhir - $waktu_awal;
                $selisih_menit = $selisih_detik / 60;
                if ($selisih_menit > 10) {
                    $t_terlambat += 1;
                    $pot_terlambat += 10000;
                }
            }
            $gajiBersih = $gajiKotor - $pot_terlambat;

            $gaji[] = [
                'id_karyawan' => $row['id_pegawai'],
                'karyawan' => $row['nama_pegawai'],
                'jabatan' => $jabatan->ket_divisi,
                'totalhari' => $nonSundays,
                'gaji_pokok' => $jabatan->gaji_pokok,
                'absen' => $countAbsensi,
                'gaji_kotor' => intval($gajiKotor),
                'gaji_bersih' => intval($gajiBersih),
                'pot_terlambat' => intval($pot_terlambat),
                't_terlambat' => intval($t_terlambat),
                'month' => $month,
                'year' => $year,
            ];
        }
        $data['gaji'] = $gaji;
		$this->template->load('template', 'penggajian/laporan', $data);
	}
    public function slip_gaji($id,$bulan,$tahun)
	{

        if (strlen($bulan) == 1) {
            $month = "0" . $bulan;
        } else {
            $month = $bulan;
        }

        // dd($month);
        $year = $tahun;
        $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $month, $year);
        $nonSundays = 0;
        for ($day = 1; $day <= $daysInMonth; $day++) {
            $timestamp = strtotime("$year-$month-$day");
            $dayOfWeek = date('N', $timestamp);
            if ($dayOfWeek != 7) {
                $nonSundays++;
            }
        }
        $users = $this->data_m->get_by_id($id);
        $gaji = [];
        $jabatan = $this->divisi_m->get_by_id($users->id_divisi);
        $countAbsensi = $this->absen_m->count_absensi($month, $users->id_pegawai);
        // $countLembur = $this->absen_m->sum_lembur($month, $row['id_pegawai']);
        // $upahLembur = $countLembur * 10000;
        $gajiKotor = round($countAbsensi / $nonSundays, 2) * $jabatan->gaji_pokok;

        $absensi = $this->absen_m->get_absensi($month, $users->id_pegawai);
        $t_terlambat = 0;
        $pot_terlambat = 0;
        foreach ($absensi as $value) {
            $jam = $this->gaji_model->get_jam_kerja();
            $waktu_awal = strtotime($jam->start);
            $waktu_akhir = strtotime($value->jam_masuk);
            $selisih_detik = $waktu_akhir - $waktu_awal;
            $selisih_menit = $selisih_detik / 60;
            if ($selisih_menit > 10) {
                $t_terlambat += 1;
                $pot_terlambat += 10000;
            }
        }
        $gajiBersih = $gajiKotor - $pot_terlambat;

        $data['gajiKotor'] = $gajiKotor;
        $data['gajiBersih'] = $gajiBersih;

        $data['karyawan'] = $users->nama_pegawai;
        $data['alamat'] = $users->alamat;
        $data['nohp'] = $users->nohp;
        $data['namajabatan'] = $jabatan->ket_divisi;

        $data['bulan'] = $bulan;
        $data['tahun'] = $tahun;

        $gaji[] = [
            'id_karyawan' => $users->id_pegawai,
            'karyawan' => $users->nama_pegawai,
            'jabatan' => $jabatan->ket_divisi,
            'totalhari' => $nonSundays,
            'gaji_pokok' => $jabatan->gaji_pokok,
            'absen' => $countAbsensi,
            'gaji_kotor' => intval($gajiKotor),
            'gaji_bersih' => intval($gajiBersih),
            'pot_terlambat' => intval($pot_terlambat),
            't_terlambat' => intval($t_terlambat),
            'month' => $month,
            'year' => $year,
        ];
        $data['gaji'] = $gaji;
        $this->load->view('penggajian/slip_gaji', $data);
    }
}
