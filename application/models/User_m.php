<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_m extends CI_Model
{
    // public function login($post)
    // {
    //     $this->db->select('*');
    //     $this->db->from('user');
    //     $this->db->where('username', $post['username']);
    //     $this->db->where('password', sha1($post['password']));
    //     $query = $this->db->get();
    //     return $query;
    // }

    public function get($username = null)
    {
        $this->db->select('level.ket_level, user.*');
        $this->db->from('user');
        $this->db->join('level', 'user.id_level = level.id_level');
		$this->db->where("level.id_level != ", 3);
        if ($username != null) {
            $this->db->where('username', $username);
        }
        $query = $this->db->get();
        return $query;
    }

    // public function add($post)
    // {
    //     $params['no_user'] = $post['no_user'];
    //     $params['username'] = $post['username'];
    //     $params['password'] = sha1($post['password']);
    //     $params['id_nama'] = $post['id_nama'];
    //     $params['id_divisi'] = $post['id_divisi'];
    //     $params['level'] = $post['level'];
    //     $this->db->insert('user', $params);
    // }

    // public function edit($post)
    // {
    //     $params['no_user'] = $post['no_user'];
    //     $params['username'] = $post['username'];
    //     if (!empty($post['password'])) {
    //         $params['password'] = sha1($post['password']);
    //     }
    //     $params['id_nama'] = $post['id_nama'];
    //     $params['id_divisi'] = $post['id_divisi'];
    //     $params['level'] = $post['level'];
    //     $this->db->where('id_user', $post['id_user']);
    //     $this->db->update('user', $params);
    // }

    public function del($id)
    {
        $this->db->where('id_user', $id);
        $this->db->delete('user');
    }
}
