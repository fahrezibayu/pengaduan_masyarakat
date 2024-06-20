<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bidang extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('bidang_m');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['row'] = $this->bidang_m->get();
        $this->template->load('template', 'bidang/bidang_data', $data);
    }

    public function add()
    {
        $this->form_validation->set_rules('nama_bidang', 'Nama Bidang', 'required');

        $this->form_validation->set_message('required', '%s masih kosong, silahkan diisi');


        if ($this->form_validation->run() == false) {
            $this->template->load('template', 'bidang/bidang_form');
        } else {
            $post = [
                'nama_bidang' => $this->input->post('nama_bidang')
            ];

            $this->db->insert('tbl_bidang', $post);
            if ($this->db->affected_rows() > 0) {
                echo "<script>
                        alert('Data bidang berhasil ditambahkan');
                    </script>";
            }
            echo "<script>window.location='" . site_url('index.php/bidang') . "';</script>";
        }
    }

    public function edit($id)
    {
        $data = array(
            'page' => 'add',
            'bidang_by_id' => $this->db->get_where('tbl_bidang', ['id_bidang' => $id])->row_array()
        );
        $this->form_validation->set_rules('nama_bidang', 'Nama Bidang', 'required');


        if ($this->form_validation->run() == false) {
            $this->template->load('template', 'bidang/bidang_edit', $data);
        } else {
            $post = [
                'nama_bidang' => $this->input->post('nama_bidang')
            ];

            $this->db->where('id_bidang', $id);
            $this->db->update('tbl_bidang', $post);
            echo "<script>
                    alert('Data bidang berhasil ubah');
                </script>";
            echo "<script>window.location='" . site_url('index.php/bidang') . "';</script>";
        }
    }


    public function del($id)
    {
        $this->bidang_m->del($id);
        if ($this->db->affected_rows() > 0) {
            echo "<script>alert('Data berhasil dihapus');</script>";
        }
        echo "<script>window.location='" . site_url('index.php/bidang') . "';</script>";
    }
}
