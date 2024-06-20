<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        check_not_login();
        check_admin();
        $this->load->model(['user_m', 'data_m', 'divisi_m']);
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['row'] = $this->user_m->get();
        $this->template->load('template', 'user/user_data', $data);
    }

    public function add_user()
    {

        $this->db->select('divisi.id_divisi, ket_divisi');
        $this->db->from('divisi');
        $data = [
            'divisies' => $this->db->get()->result_array(),
            'levels' => $this->db->get('level')->result_array()
        ];

        $this->form_validation->set_rules('nama_pegawai', 'Nama pegawai', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user.username]');
        $this->form_validation->set_rules(
            'password',
            'Password',
            'required|trim|min_length[5]|max_length[12]|matches[konfirmasi_password]',
            array('matches' => '%s dan Konfirmasi Password harus sama')
        );
        $this->form_validation->set_rules(
            'konfirmasi_password',
            'Konfirmasi password',
            'required|trim|min_length[5]|max_length[12]|matches[password]',
            array('matches' => '%s tidak sesuai dengan password.')
        );

        $this->form_validation->set_message('required', '%s masih kosong, silahkan diisi');
        $this->form_validation->set_message('min_length', '%s minimal 5 karakter');
        $this->form_validation->set_message('is_unique', '%s sudah ada, silahkan ganti');

        $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');
        if ($this->form_validation->run() == FALSE) {
            $this->template->load('template', 'user/user_form_add', $data);
        } else {
            $config = [
                'upload_path' => './uploads',
                'allowed_types' => 'gif|jpg|png|jpeg'
            ];
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('gambar')) {
                $data_post = [
                    'nama_pegawai' => $this->input->post('nama_pegawai'),
                    'gambar' => 'default.png',
                    'username' => $this->input->post('username'),
                    'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                    // 'password' => $this->input->post('password'),
                    'id_divisi' => $this->input->post('divisi'),
                    'id_level' => $this->input->post('level')
                ];
                $this->db->insert('user', $data_post);
                if ($this->db->affected_rows() > 0) {
                    echo "<script>
                        alert('Data user berhasil ditambahkan');
                    </script>";
                }
                echo "<script>window.location='" . site_url('user') . "';</script>";
                // echo $this->upload->display_errors();
            } else {
                $new_img = $this->upload->data('file_name');
                $data_post = [
                    'nama_pegawai' => $this->input->post('nama_pegawai'),
                    'gambar' => $new_img,
                    'username' => $this->input->post('username'),
                    'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                    'id_divisi' => $this->input->post('divisi'),
                    'id_level' => $this->input->post('level')
                ];
                $this->db->insert('user', $data_post);
                if ($this->db->affected_rows() > 0) {
                    echo "<script>
                        alert('Data user berhasil ditambahkan');
                    </script>";
                }
                echo "<script>window.location='" . site_url('user') . "';</script>";
            }
            // }
        }
    }


    public function edit_user($id)
    {
        $this->db->select('id_divisi, ket_divisi');
        $this->db->from('divisi');
        $data = [
            'divisies' => $this->db->get()->result_array(),
            'levels' => $this->db->get('level')->result_array(),
            'user_by_id' => $this->db->get_where('user', ['id_user' => $id])->row_array()
        ];

        $this->form_validation->set_rules('nama_pegawai', 'Nama pegawai', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->template->load('template', 'user/user_form_edit', $data);
        } else {
            $config = [
                'upload_path' => './uploads',
                'allowed_types' => 'gif|jpg|png|jpeg'
            ];
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('gambar')) {
                $data_post = [
                    'nama_pegawai' => $this->input->post('nama_pegawai'),
                    'username' => $this->input->post('username'),
                    'password' => $this->input->post('password'),
                    'id_divisi' => $this->input->post('divisi'),
                    'id_level' => $this->input->post('level')
                ];
                $this->db->where('id_user', $id);
                $this->db->update('user', $data_post);
                if ($this->db->affected_rows() > 0) {
                    echo "<script>
                            alert('Data user berhasil ubah');
                        </script>";
                }
                echo "<script>window.location='" . site_url('user') . "';</script>";
            } else {
                $new_img = $this->upload->data('file_name');
                $data_post = [
                    'nama_pegawai' => $this->input->post('nama_pegawai'),
                    'gambar' => 'default.png',
                    'username' => $this->input->post('username'),
                    'password' => $this->input->post('password'),
                    'id_divisi' => $this->input->post('divisi'),
                    'id_level' => $this->input->post('level')
                ];
                $this->db->where('id_user', $id);
                $this->db->update('user', $data_post);
                if ($this->db->affected_rows() > 0) {
                    echo "<script>
                            alert('Data user berhasil ubah');
                        </script>";
                }
                echo "<script>window.location='" . site_url('user') . "';</script>";
            }
        }
    }

    public function username_check()
    {
        $post = $this->input->post(null, TRUE);
        $query = $this->db->query("SELECT * FROM user WHERE username = '$post[username]' AND id_user != '$post[id_user]'");
        if ($query->num_rows() > 0) {
            $this->form_validation->set_message('username_check', '%s sudah dipakai, silahkan ganti');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function del_user($id)
    {
        $this->user_m->del($id);

        if ($this->db->affected_rows() > 0) {
            echo "<script>alert('Data berhasil dihapus');</script>";
        }
        echo "<script>window.location='" . site_url('user') . "';</script>";
    }
}
