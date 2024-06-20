<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jenispengaduan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('jenispengaduan_m');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['row'] = $this->jenispengaduan_m->get();
        $this->template->load('template', 'jenispengaduan/jenispengaduan_data', $data);
    }

    public function add()
    {
        $this->form_validation->set_rules('nama_jenis_pengaduan', 'Nama Jenis Pengaduan', 'required');

        $this->form_validation->set_message('required', '%s masih kosong, silahkan diisi');


        if ($this->form_validation->run() == false) {
            $this->template->load('template', 'jenispengaduan/jenispengaduan_form');
        } else {
            $post = [
                'nama_jenis_pengaduan' => $this->input->post('nama_jenis_pengaduan')
            ];

            $this->db->insert('tbl_jenis_pengaduan', $post);
            if ($this->db->affected_rows() > 0) {
                echo "<script>
                        alert('Data jenis pengaduan berhasil ditambahkan');
                    </script>";
            }
            echo "<script>window.location='" . site_url('index.php/jenispengaduan') . "';</script>";
        }
    }

    public function edit($id)
    {
        $data = array(
            'page' => 'add',
            'jenispengaduan_by_id' => $this->db->get_where('tbl_jenis_pengaduan', ['id_jenis_pengaduan' => $id])->row_array()
        );
        $this->form_validation->set_rules('nama_jenis_pengaduan', 'Nama Jenis Pengaduan', 'required');


        if ($this->form_validation->run() == false) {
            $this->template->load('template', 'jenispengaduan/jenispengaduan_edit', $data);
        } else {
            $post = [
                'nama_jenis_pengaduan' => $this->input->post('nama_jenis_pengaduan')
            ];

            $this->db->where('id_jenis_pengaduan', $id);
            $this->db->update('tbl_jenis_pengaduan', $post);
            echo "<script>
                    alert('Data jenis pengaduan berhasil ubah');
                </script>";
            echo "<script>window.location='" . site_url('index.php/jenispengaduan') . "';</script>";
        }
    }


    public function del($id)
    {
        $this->jenispengaduan_m->del($id);
        if ($this->db->affected_rows() > 0) {
            echo "<script>alert('Data berhasil dihapus');</script>";
        }
        echo "<script>window.location='" . site_url('index.php/jenispengaduan') . "';</script>";
    }
}
