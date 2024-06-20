<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mediapelaporan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('mediapelaporan_m');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['row'] = $this->mediapelaporan_m->get();
        $this->template->load('template', 'mediapelaporan/mediapelaporan_data', $data);
    }

    public function add()
    {
        $this->form_validation->set_rules('nama_media_pelaporan', 'Nama Pelaporan', 'required');

        $this->form_validation->set_message('required', '%s masih kosong, silahkan diisi');


        if ($this->form_validation->run() == false) {
            $this->template->load('template', 'mediapelaporan/mediapelaporan_form');
        } else {
            $post = [
                'nama_media_pelaporan' => $this->input->post('nama_media_pelaporan')
            ];

            $this->db->insert('tbl_media_pelaporan', $post);
            if ($this->db->affected_rows() > 0) {
                echo "<script>
                        alert('Data media pelaporan berhasil ditambahkan');
                    </script>";
            }
            echo "<script>window.location='" . site_url('index.php/mediapelaporan') . "';</script>";
        }
    }

    public function edit($id)
    {
        $data = array(
            'page' => 'add',
            'mediapelaporan_by_id' => $this->db->get_where('tbl_media_pelaporan', ['id_media_pelaporan' => $id])->row_array()
        );
        $this->form_validation->set_rules('nama_media_pelaporan', 'Nama Media Pelaporan', 'required');


        if ($this->form_validation->run() == false) {
            $this->template->load('template', 'mediapelaporan/mediapelaporan_edit', $data);
        } else {
            $post = [
                'nama_media_pelaporan' => $this->input->post('nama_media_pelaporan')
            ];

            $this->db->where('id_media_pelaporan', $id);
            $this->db->update('tbl_media_pelaporan', $post);
            echo "<script>
                    alert('Data media pelaporan berhasil ubah');
                </script>";
            echo "<script>window.location='" . site_url('index.php/mediapelaporan') . "';</script>";
        }
    }


    public function del($id)
    {
        $this->mediapelaporan_m->del($id);
        if ($this->db->affected_rows() > 0) {
            echo "<script>alert('Data berhasil dihapus');</script>";
        }
        echo "<script>window.location='" . site_url('index.php/mediapelaporan') . "';</script>";
    }
}
