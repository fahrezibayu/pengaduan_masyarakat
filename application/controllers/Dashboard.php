<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		check_not_login();
	}

	public function index()
	{
		error_reporting(0);
		date_default_timezone_set('Asia/Jakarta');
		$this->template->load('template', 'dashboard', $data);
	}
}
