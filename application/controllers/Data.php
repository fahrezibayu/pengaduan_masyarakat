<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('data_m');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['karyawan'] = $this->data_m->get();
        $this->template->load('template', 'data/data_d', $data);
    }

    public function add()
    {
        $data = array(
            'page' => 'add',
            'users' => $this->db->get('user')->result_array(),
        );

        $this->form_validation->set_rules('nama_pegawai', 'Nama pegawai', 'required');
        $this->form_validation->set_rules('kota', 'Kota', 'required|trim');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis kelamin', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('nohp', 'No hp', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'trim|is_unique[data_karyawan.email]|valid_email');

        $this->form_validation->set_message('required', '%s masih kosong, silahkan diisi');
        $this->form_validation->set_message('is_unique', '%s sudah ada, silahkan ganti');

        if ($this->form_validation->run() == false) {
            $this->template->load('template', 'data/data_form', $data);
        } else {
            $data_post = [
                'id_user' => $this->input->post('nama_pegawai'),
                'tgl_masuk' => $this->input->post('tgl_masuk'),
                'tgl_lahir' => $this->input->post('tgl_lahir'),
                'tempat_lahir' => $this->input->post('kota'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                'alamat' => $this->input->post('alamat'),
                'nohp' => $this->input->post('nohp'),
                'email' => $this->input->post('email'),
            ];

            $cek_user = $this->db->get_where('data_karyawan', ['id_user' => $this->input->post('nama_pegawai')])->row_array();
            if (is_null($cek_user)) {
                $this->db->insert('data_karyawan', $data_post);
                if ($this->db->affected_rows() > 0) {
                    echo "<script>
                            alert('Data karyawan berhasil ditambahkan');
                        </script>";
                }
                echo "<script>window.location='" . site_url('data') . "';</script>";
            } else {
                echo "<script>
                    alert('Data karyawan sudah ada !');
                    </script>";
                echo "<script>window.location='" . site_url('data/add') . "';</script>";
            }
        }
    }

    public function edit($id)
    {
        $data = array(
            'page' => 'add',
            'users' => $this->db->get('user')->result_array(),
            'cities' => $this->db->get('cities')->result_array(),
            'user_by_id' => $this->db->get_where('data_karyawan', ['id_user' => $id])->row_array()
        );

        $this->form_validation->set_rules('nama_pegawai', 'Nama pegawai', 'required');
        $this->form_validation->set_rules('kota', 'Kota', 'required|trim');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis kelamin', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('nohp', 'No hp', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'trim|valid_email');

        $this->form_validation->set_message('required', '%s masih kosong, silahkan diisi');

        if ($this->form_validation->run() == false) {
            $this->template->load('template', 'data/data_form_edit', $data);
        } else {
            $data_post = [
                'id_user' => $this->input->post('nama_pegawai'),
                'tgl_masuk' => $this->input->post('tgl_masuk'),
                'tgl_lahir' => $this->input->post('tgl_lahir'),
                'tempat_lahir' => $this->input->post('kota'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                'alamat' => $this->input->post('alamat'),
                'nohp' => $this->input->post('nohp'),
                'email' => $this->input->post('email'),
            ];

            $this->db->where('id_user', $id);
            $this->db->update('data_karyawan', $data_post);
            echo "<script>
                    alert('Data karyawan berhasil ubah');
                </script>";
            echo "<script>window.location='" . site_url('data') . "';</script>";
        }
    }



    public function del($id_user)
    {
        $this->data_m->del($id_user);
        if ($this->db->affected_rows() > 0) {
            echo "<script>alert('Data berhasil dihapus');</script>";
        }
        echo "<script>window.location='" . site_url('data') . "';</script>";
    }
}
