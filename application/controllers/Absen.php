<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Absen extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('absen_m');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['row'] = $this->absen_m->get();
        $this->template->load('template', 'absen/absen_data', $data);
    }

    public function add_masuk()
    {
        // $this->form_validation->set_rules('nama_pegawai', 'Nama Pegawai', 'required');
        // $this->form_validation->set_rules('lokasi', 'Lokasi', 'required');
        // $this->form_validation->set_rules('gambar', 'gambar', 'required');

        // $this->form_validation->set_message('required', '%s masih kosong, silahkan diisi');


        $this->template->load('template', 'absen/absen_masuk');
        // if ($this->form_validation->run() == false) {
        // } else {
        //     $config = [
        //         'upload_path' => './uploads',
        //         'allowed_types' => 'gif|jpg|png|jpeg'
        //     ];
        //     $this->load->library('upload', $config);
        //     if (!$this->upload->do_upload('gambar')) {
        //         $absen_post = [
        //             'nama_pegawai' => $this->input->post('nama_pegawai'),
        //             'lokasi' => $this->input->post('lokasi'),
        //             'gambar' => 'default.png'
        //         ];
        //         $this->db->insert('absen', $absen_post);
        //         if ($this->db->affected_rows() > 0) {
        //             echo "<script>
        //             alert('Absen Masuk berhasil ditambahkan');
        //         </script>";
        //         }
        //         echo "<script>window.location='" . site_url('absen') . "';</script>";
        //     } else {
        //         $new_img = $this->upload->data('file_name');
        //         $absen_post = [
        //             'nama_pegawai' => $this->input->post('nama_pegawai'),
        //             'lokasi' => $this->input->post('lokasi'),
        //             'gambar' => $new_img,
        //         ];
        //         $this->db->insert('absen', $absen_post);
        //         if ($this->db->affected_rows() > 0) {
        //             echo "<script>
        //                 alert('Absen Masuk berhasil ditambahkan');
        //             </script>";
        //         }
        //         echo "<script>window.location='" . site_url('absen') . "';</script>";
        //     }
        // }
    }

    public function add_pulang()
    {

        $this->template->load('template', 'absen/absen_pulang');
    }

    public function save_absen_masuk()
    {

        date_default_timezone_set("Asia/Jakarta");
        $time = date("H:i:s");
        $date = date("Y-m-d");
        // todo cek apakah sudah pernah melakukan absen masuk atau belum
        $pegawai = $this->db->select('*')->from("absen")->where('id_pegawai', $this->input->post('id_pegawai'))->where("tgl_absen", "$date")->where("jam_masuk !=", '')->get();
        // echo $pegawai->num_rows();
        if ($pegawai->num_rows() == 0) {

            $img = $_POST['image'];
            $lat       = $this->input->post('lat', true);
            $long       = $this->input->post('long', true);
            $folderPath = "uploads/absen_masuk/";

            $image_parts = explode(";base64,", $img);
            $image_type_aux = explode("image/", $image_parts[0]);
            $image_type = $image_type_aux[1];

            $image_base64 = base64_decode($image_parts[1]);
            $fileName = uniqid() . '.png';

            $file = $folderPath . $fileName;
            file_put_contents($file, $image_base64);

            $data_absen = [
                'id_pegawai' => $this->input->post("id_pegawai", true),
                'tgl_absen'  => $date,
                'jam_masuk'  => $time,
                'foto_masuk' => $fileName,
                'lat_masuk'     => $lat,
                'long_masuk'     => $long
            ];

            $this->db->insert('absen', $data_absen);
            $data_json = array('message' => 'sukses', 'lat' => $lat, 'long' => $long,'jam' => $time); // PENITING
            echo json_encode($data_json);
        } else {
            $absensi = $this->db->get_where('absen', ['id_pegawai' => $this->input->post('id_pegawai')], ['tgl_absen' => $date])->row();
            // $absensi = $this->db->select('*')->from("absen")->where('id_pegawai', $this->input->post('id_pegawai'))->where("tgl_absen", "$date")->row();
            $data_json = array('message' => 'gagal', 'lat' => $absensi->lat_masuk, 'long' => $absensi->long_masuk, 'jam' => $absensi->jam_masuk); // PENITING
            echo json_encode($data_json);
        }
    }

    public function save_absen_keluar()
    {
        date_default_timezone_set("Asia/Jakarta");

        $time = date("H:i:s");
        $date = date("Y-m-d");
        // todo cek apakah sudah pernah melakukan absen masuk atau belum
        $masuk = $this->db->select('*')->from("absen")->where('id_pegawai', $this->input->post('id_pegawai'))->where("tgl_absen", "$date")->get();
        // echo $pegawai->num_rows();
        if ($masuk->num_rows() == 0) {
            $data_json = array('message' => 'gagal2', 'lat' => '', 'long' => ''); // PENITING
            echo json_encode($data_json);
        } else {
            // todo cek apakah sudah pernah melakukan absen masuk atau belum
            $pulang = $this->db->select('*')->from("absen")->where('id_pegawai', $this->input->post('id_pegawai'))->where("tgl_absen", "$date")->where("jam_pulang !=", '')->get();
            if ($pulang->num_rows() == 0) {
                $img = $_POST['image'];
                $lat       = $this->input->post('lat', true);
                $long       = $this->input->post('long', true);
                $folderPath = "uploads/absen_keluar/";

                $image_parts = explode(";base64,", $img);
                $image_type_aux = explode("image/", $image_parts[0]);
                $image_type = $image_type_aux[1];

                $image_base64 = base64_decode($image_parts[1]);
                $fileName = uniqid() . '.png';

                $file = $folderPath . $fileName;
                file_put_contents($file, $image_base64);

                $data_absen = [
                    'jam_pulang'  => $time,
                    'foto_pulang' => $fileName,
                    'lat_pulang'     => $lat,
                    'long_pulang'     => $long
                ];
                $this->db
                    ->where('id_pegawai', $this->input->post("id_pegawai", true))
                    ->where('tgl_absen', $date);
                $this->db->update('absen', $data_absen);
                $data_json = array('message' => 'sukses', 'lat' => $lat, 'long' => $long, 'jam' => $time); // PENITING
                echo json_encode($data_json);
            } else {
                $absensi = $this->db->get_where('absen', ['id_pegawai' => $this->input->post('id_pegawai')], ['tgl_absen' => $date])->row();
                // $absensi = $this->db->select('*')->from("absen")->where('id_pegawai', $this->input->post('id_pegawai'))->where("tgl_absen", "$date")->row();
                $data_json = array('message' => 'gagal', 'lat' => $absensi->lat_pulang, 'long' => $absensi->long_pulang, 'jam' => $absensi->jam_pulang); // PENITING
                echo json_encode($data_json);
            }
        }
    }

    public function edit($id)
    {
        $data = array(
            'page' => 'add',
            'absen_by_id' => $this->db->get_where('absen', ['id_absen' => $id])->row_array()
        );
        $this->form_validation->set_rules('no_absen', 'No. absen', 'required');
        $this->form_validation->set_rules('ket_absen', 'absen', 'required');


        if ($this->form_validation->run() == false) {
            $this->template->load('template', 'absen/absen_edit', $data);
        } else {
            $absen_post = [
                'no_absen' => $this->input->post('no_absen'),
                'ket_absen' => $this->input->post('ket_absen'),
            ];

            $this->db->where('id_absen', $id);
            $this->db->update('absen', $absen_post);
            echo "<script>
                    alert('Data departemen berhasil ubah');
                </script>";
            echo "<script>window.location='" . site_url('absen') . "';</script>";
        }
    }


    public function del($id_absen)
    {
        $this->absen_m->del($id_absen);
        if ($this->db->affected_rows() > 0) {
            echo "<script>alert('Data berhasil dihapus');</script>";
        }
        echo "<script>window.location='" . site_url('absen') . "';</script>";
    }
    
    public function riwayat_absen()
    {
        return $this->template->load('template', 'absen/riwayat_absen');
    }
}
