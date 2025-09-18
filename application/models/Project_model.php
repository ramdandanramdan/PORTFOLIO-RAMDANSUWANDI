<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Project_model extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    // Ambil semua proyek dari database
    public function get_projects() {
        $query = $this->db->get('projects');
        return $query->result_array();
    }

    // Ambil proyek berdasarkan ID
    public function get_project_by_id($id) {
        $query = $this->db->get_where('projects', array('id' => $id));
        return $query->row_array();
    }

    // Tambah proyek baru
    public function create_project($data) {
        return $this->db->insert('projects', $data);
    }

    // Update proyek
    public function update_project($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('projects', $data);
    }

    // Hapus proyek
    public function delete_project($id) {
        $this->db->where('id', $id);
        return $this->db->delete('projects');
    }
}