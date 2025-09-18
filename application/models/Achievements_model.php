<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Achievements_model extends CI_Model {

    public function get_achievements() {
        $this->db->order_by('id', 'DESC');
        return $this->db->get('achievements')->result_array();
    }
    
    public function insert_achievement($data) {
        return $this->db->insert('achievements', $data);
    }

    // Tambahkan fungsi update dan delete di sini nanti
}