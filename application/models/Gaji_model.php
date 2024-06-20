<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gaji_model extends CI_Model {

    public function get_jam_kerja() {
        return $this->db->get('jam')->row();
    }
}
