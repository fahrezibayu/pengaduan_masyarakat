<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        check_already_login_user();
        $this->load->view('users/welcome');
    }

	public function pengaduanmasyarakat()
	{
		error_reporting(0);
        check_not_login_user();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->view('users/pengaduanmasyarakat');
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

	public function registrasi() {
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
			echo "<script>
				alert('Data user berhasil ditambahkan');
			</script>";
		}
		echo "<script>window.location='" . site_url('index.php/users/login') . "';</script>";
	}

    public function process()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[5]');

        if ($this->form_validation->run() == false) {
            $this->load->view('users/login');
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $this->db->where('username', $username);
			$this->db->where('id_level', 3);
			$user = $this->db->get('user')->row_array();


            if (is_null($user)) {
                echo "<script>
                        alert ('Username belum terdaftar !');
                        window.location='" . site_url('index.php/users/login') . "'; 
                    </script>";
            } else {
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'id_user' => $user['id_user'],
                        'username' => $user['username'],
                        'id_level' => $user['id_level']
                    ];
                    $this->session->set_userdata($data);
                    echo "<script>
                            alert ('Login success');
                            window.location='" . site_url('index.php/users/pengaduanmasyarakat') . "'; 
                        </script>";
                } else {
                    echo "<script>
                    alert ('Password salah !');
                    window.location='" . site_url('index.php/users/login') . "'; 
                    </script>";
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
 