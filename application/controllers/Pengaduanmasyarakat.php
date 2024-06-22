<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengaduanmasyarakat extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('pengaduanmasyarakat_m');
        $this->load->model('bidang_m');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['row'] = $this->pengaduanmasyarakat_m->get();
		
        $this->template->load('template', 'pengaduanmasyarakat/pengaduanmasyarakat_data', $data);
    }

    public function tindaklanjut($id)
    {
        $data = array(
            'page' => 'add',
			'bidang' => $this->bidang_m->get(),
            'pengaduan_by_id' => $this->db->get_where('tbl_pengaduan', ['id_pengaduan' => $id])->row_array()
        );
        $this->form_validation->set_rules('bidang', 'Nama Bidang', 'required');
        $this->form_validation->set_rules('tindaklanjut', 'Tindak Lanjut', 'required');


        if ($this->form_validation->run() == false) {
            $this->template->load('template', 'pengaduanmasyarakat/pengaduanmasyarakat_tindaklanjut', $data);
        } else {
            $post = [
                'id_bidang' => $this->input->post('bidang'),
                'tindaklanjut' => $this->input->post('tindaklanjut'),
                'tindaklanjut_by' => $this->input->post('id_user'),
                'updated_at' => date('Y-m-d H:i:s')
            ];

            $this->db->where('id_pengaduan', $id);
            $this->db->update('tbl_pengaduan', $post);
            echo "<script>
                    alert('Update tindak lanjut berhasil');
                </script>";
            echo "<script>window.location='" . site_url('index.php/pengaduanmasyarakat') . "';</script>";
        }
    }

}
