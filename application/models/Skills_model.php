<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Skills_model extends CI_Model {

    // Method untuk mengambil semua data skills
    public function get_skills() {
        $this->db->order_by('id', 'DESC');
        return $this->db->get('skills')->result_array();
    }

    // Method baru untuk menyimpan data skill
    public function insert_skill($data) {
        return $this->db->insert('skills', $data);
    }
}