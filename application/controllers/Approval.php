<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Approval extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model(['approval_m', 'data_m', 'divisi_m', 'tunggu_m']);
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['data_cuti'] = $this->tunggu_m->get();
        $this->template->load('template', 'approval/approval_data', $data);
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

        if ($this->form_validation->run() == false) {
            $this->template->load('template', 'approval/approval_add', $data);
        } else {
            $data_cuti = [
                'id_user' => $this->input->post('nama_pegawai'),
                'id_divisi' => $this->input->post('divisi'),
                'keperluan' => $this->input->post('keperluan'),
                'lama' => $this->input->post('lama'),
                'tgl_mulai' => $this->input->post('tgl_mulai'),
                'tgl_sampai' => $this->input->post('tgl_sampai'),
                'keterangan' => $this->input->post('keterangan'),
                'status' => $this->session->userdata('id_level') == 1 ? 1 : 2
            ];

            $this->db->insert('pengajuan_cuti', $data_cuti);
            if ($this->db->affected_rows() > 0) {
                echo "<script>
                    alert('Data cuti berhasil di tambahkan');
                </script>";
            }
            echo "<script>window.location='" . site_url('approval') . "';</script>";
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

        if ($this->form_validation->run() == false) {
            $this->template->load('template', 'approval/approval_edit', $data);
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
            echo "<script>window.location='" . site_url('approval') . "';</script>";
        }
    }


    public function del($id_cuti)
    {
        $this->tunggu_m->del($id_cuti);
        if ($this->db->affected_rows() > 0) {
            echo "<script>
                alert('Data cuti berhasil di hapus');
            </script>";
        }
        echo "<script>window.location='" . site_url('approval') . "';</script>";
    }

    public function lap_approval()
    {
        $data['data_cuti'] = $this->tunggu_m->get();
        $this->template->load('template', 'approval/approval_lap', $data);
    }

    public function ubah_status()
    {
        $id_cuti = $_POST['id_cuti'];
        $id_user = $_POST['id_user'];
        $status = $_POST['status'];

        $data = [
            'id_user' => $id_user,
            'id_cuti' => $id_cuti,
            'status' => $status,
            'approve_at' => date('d-m-Y')
        ];


        if ($this->input->is_ajax_request()) {
            $this->db->set('status', $status);
            $this->db->where('id_cuti', $id_cuti);
            $this->db->update('pengajuan_cuti');

            $this->db->insert('notif_staff', $data);

            $data = [
                'status' => 200,
                'message' => 'Status berhasil di ubah'
            ];

            echo json_encode($data);
        } else {
            echo json_encode("Request Failed");
        }
    }
}
