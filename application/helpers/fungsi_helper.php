<?php

function check_already_login() {
    $ci = &get_instance();
    $user_session = $ci->session->userdata('username');
    if ($user_session) {
        redirect('index.php/dashboard');
    }
}

function check_not_login() {
    $ci = &get_instance();
    $user_session = $ci->session->userdata('username');
    if (!$user_session) {
        redirect('index.php/auth/login');
    }
}

function check_admin() {
    $ci = &get_instance();
    $ci->load->library('fungsi');
    if ($ci->fungsi->user_login()->id_level != 1) {
        redirect('index.php/dashboard');
    }
}

function check_user() {
    $ci = &get_instance();
    $ci->load->library('fungsi');
    if ($ci->fungsi->user_login()->id_level != 3) {
        redirect('index.php/dashboard');
    }
}

function check_already_login_user() {
    $ci = &get_instance();
    $user_session = $ci->session->userdata('username');
    if ($user_session) {
        redirect('index.php/users/pengaduanmasyarakat');
    }
}

function check_not_login_user() {
    $ci = &get_instance();
    $user_session = $ci->session->userdata('username');
    if (!$user_session) {
        redirect('index.php/users/login');
    }
}
