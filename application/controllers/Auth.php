<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function login()
    {
        check_already_login();
        $this->load->view('login');
    }

    public function process()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[5]');

        if ($this->form_validation->run() == false) {
            $this->load->view('login');
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $user = $this->db->get_where('user', ['username' => $username])->row_array();

            if (is_null($user)) {
                echo "<script>
                        alert ('Username belum terdaftar !');
                        window.location='" . site_url('index.php/auth/login') . "'; 
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
                            window.location='" . site_url('index.php/dashboard') . "'; 
                        </script>";
                } else {
                    echo "<script>
                    alert ('Password salah !');
                    window.location='" . site_url('index.phpauth/login') . "'; 
                    </script>";
                }
            }
        }
    }
    public function logout()
    {
        $params = array('username', 'id_level', 'id_user');
        $this->session->unset_userdata($params);
        redirect('index.php/auth/login');
    }
}
