<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('jenispengaduan_m');
        $this->load->model('mediapelaporan_m');
        $this->load->model('pengaduanmasyarakat_m');
        $this->load->library(['form_validation', 'session']);
        $this->load->helper(['url', 'security']);
    }

    public function index()
    {
        check_already_login_user();
        $this->load->view('users/welcome');
    }

    public function pengaduanmasyarakat()
    {
        check_not_login_user();
        $data['jenispengaduan'] = $this->jenispengaduan_m->get();
        $data['mediapelaporan'] = $this->mediapelaporan_m->get();
        $data['pengaduan'] = $this->pengaduanmasyarakat_m->get();
        $this->load->view('users/pengaduanmasyarakat', $data);
    }

	public function addPengaduan()
    {
        $this->form_validation->set_rules('jenis_pengaduan', 'Jenis Pengaduan', 'required');
        $this->form_validation->set_rules('media_pengaduan', 'Media Pengaduan', 'required');
        $this->form_validation->set_rules('isi_pengaduan', 'Isi Pengaduan', 'required');

        $this->form_validation->set_message('required', '%s masih kosong, silahkan diisi');


        if ($this->form_validation->run() == false) {
			$data['jenispengaduan'] = $this->jenispengaduan_m->get();
			$data['bidang'] = $this->bidang_m->get();
			$data['mediapelaporan'] = $this->mediapelaporan_m->get();
			$this->load->view('users/pengaduanmasyarakat', $data);
        } else {
            $post = [
                'id_jenis_pengaduan' => $this->input->post('jenis_pengaduan'),
                'id_media_pengaduan' => $this->input->post('media_pengaduan'),
                'isi_pengaduan' => $this->input->post('isi_pengaduan'),
                'lat_lokasi' => $this->input->post('lat'),
                'long_lokasi' => $this->input->post('long'),
                'id_users' => $this->input->post('id_user')
            ];

            $this->db->insert('tbl_pengaduan', $post);
            if ($this->db->affected_rows() > 0) {
                echo "<script>
                        alert('Data pengaduan berhasil ditambahkan');
                    </script>";
            }
            echo "<script>window.location='" . site_url('index.php/users/pengaduanmasyarakat') . "';</script>";
        }
    }

    public function login()
    {
        check_already_login();
        $this->load->view('users/login');
    }

    public function register()
    {
        check_already_login();
        $this->load->view('users/register');
    }

    public function registrasi()
    {
        $this->form_validation->set_rules('nama', 'Nama Pegawai', 'required|trim');
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user.username]');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[5]');
        $this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('nohp', 'No HP', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('users/register');
        } else {
            $data_post = [
                'nama_pegawai' => $this->input->post('nama'),
                'username' => $this->input->post('username'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'pekerjaan' => $this->input->post('pekerjaan'),
                'alamat' => $this->input->post('alamat'),
                'nohp' => $this->input->post('nohp'),
                'id_level' => 3
            ];
            $this->db->insert('user', $data_post);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Data user berhasil ditambahkan');
            }
            redirect('users/login');
        }
    }

    public function process()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[5]');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('users/login');
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $this->db->where('username', $username);
            $this->db->where('id_level', 3);
            $user = $this->db->get('user')->row_array();

            if (is_null($user)) {
                $this->session->set_flashdata('error', 'Username belum terdaftar!');
                redirect('index.php/users/login');
            } else {
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'id_user' => $user['id_user'],
                        'username' => $user['username'],
                        'id_level' => $user['id_level']
                    ];
                    $this->session->set_userdata($data);
                    $this->session->set_flashdata('success', 'Login success');
                    redirect('index.php/users/pengaduanmasyarakat');
                } else {
                    $this->session->set_flashdata('error', 'Password salah!');
                    redirect('index.php/users/login');
                }
            }
        }
    }

    public function logout()
    {
        $params = array('username', 'id_level', 'id_user');
        $this->session->unset_userdata($params);
        redirect('index.php/users');
    }
}
