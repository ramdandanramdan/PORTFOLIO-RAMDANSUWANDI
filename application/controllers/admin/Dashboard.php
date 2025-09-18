<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('project_model');
        $this->load->model('skills_model');
        $this->load->model('achievements_model');
        $this->load->helper('url');
        $this->load->library('upload');
    }

    public function index() {
        $data['projects'] = $this->project_model->get_projects();
        $this->load->view('admin/dashboard', $data);
    }

    public function create() {
        $this->load->view('admin/forms/project_form');
    }

    public function store() {
        $config['upload_path']   = './public/uploads/projects/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size']      = 2048;
        $config['encrypt_name']  = TRUE;

        $this->upload->initialize($config);

        $image_name = '';
        if ($this->upload->do_upload('project_image')) {
            $upload_data = $this->upload->data();
            $image_name = $upload_data['file_name'];
        }

        $data = array(
            'title'       => $this->input->post('title'),
            'description' => $this->input->post('description'),
            'link'        => $this->input->post('link'),
            'image'       => $image_name,
        );

        $this->project_model->create_project($data);
        redirect('admin/dashboard');
    }

    public function edit($id) {
        $data['project'] = $this->project_model->get_project_by_id($id);
        $this->load->view('admin/forms/project_form', $data);
    }

    public function update($id) {
        $data = array(
            'title'       => $this->input->post('title'),
            'description' => $this->input->post('description'),
            'link'        => $this->input->post('link'),
        );

        if (!empty($_FILES['project_image']['name'])) {
            $config['upload_path'] = './public/uploads/projects/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = 2048;
            $config['encrypt_name'] = TRUE;
            $this->upload->initialize($config);

            if ($this->upload->do_upload('project_image')) {
                $old_image = $this->project_model->get_project_by_id($id)['image'];
                if ($old_image && file_exists('./public/uploads/projects/' . $old_image)) {
                    unlink('./public/uploads/projects/' . $old_image);
                }
                $upload_data = $this->upload->data();
                $data['image'] = $upload_data['file_name'];
            }
        }
        
        $this->project_model->update_project($id, $data);
        redirect('admin/dashboard');
    }

    public function delete($id) {
        $project = $this->project_model->get_project_by_id($id);
        if ($project && !empty($project['image'])) {
            $file_path = './public/uploads/projects/' . $project['image'];
            if (file_exists($file_path)) {
                unlink($file_path);
            }
        }

        $this->project_model->delete_project($id);
        redirect('admin/dashboard');
    }

    // --- METHODS UNTUK SKILLS ---
    public function create_skill() {
        $this->load->view('layouts/header_admin');
        $this->load->view('admin/forms/skill_form');
        $this->load->view('layouts/footer_admin');
    }

    public function store_skill() {
        $config['upload_path']   = './public/assets/icons/';
        $config['allowed_types'] = 'gif|jpg|png|svg|jpeg';
        $config['max_size']      = 2048;
        $config['encrypt_name']  = TRUE;

        $this->upload->initialize($config);

        $icon_name = '';
        if (!empty($_FILES['skill_icon']['name'])) {
            if ($this->upload->do_upload('skill_icon')) {
                $upload_data = $this->upload->data();
                $icon_name = $upload_data['file_name'];
            } else {
                $error = array('error' => $this->upload->display_errors());
                echo $error['error'];
                return;
            }
        }

        $data = array(
            'name'     => $this->input->post('name'),
            'category' => $this->input->post('category'),
            'icon'     => $icon_name,
        );
        $this->skills_model->insert_skill($data);
        redirect('admin/dashboard/skills');
    }

    public function skills() {
        $data['skills'] = $this->skills_model->get_skills();
        $this->load->view('layouts/header_admin');
        $this->load->view('admin/tables/skills_table', $data);
        $this->load->view('layouts/footer_admin');
    }
    
    // Metode untuk mengedit skill
    public function edit_skill($id) {
        $data['skill'] = $this->skills_model->get_skill_by_id($id);
        $this->load->view('layouts/header_admin');
        $this->load->view('admin/forms/skill_form', $data);
        $this->load->view('layouts/footer_admin');
    }

    // Metode untuk memperbarui skill
    public function update_skill($id) {
        $data = array(
            'name'     => $this->input->post('name'),
            'category' => $this->input->post('category')
        );

        if (!empty($_FILES['skill_icon']['name'])) {
            $config['upload_path']   = './public/assets/icons/';
            $config['allowed_types'] = 'gif|jpg|png|svg|jpeg';
            $config['max_size']      = 2048;
            $config['encrypt_name']  = TRUE;
            $this->upload->initialize($config);

            if ($this->upload->do_upload('skill_icon')) {
                $old_icon = $this->skills_model->get_skill_by_id($id)['icon'];
                if ($old_icon && file_exists('./public/assets/icons/' . $old_icon)) {
                    unlink('./public/assets/icons/' . $old_icon);
                }
                $upload_data = $this->upload->data();
                $data['icon'] = $upload_data['file_name'];
            }
        }
        
        $this->skills_model->update_skill($id, $data);
        redirect('admin/dashboard/skills');
    }

    // Metode untuk menghapus skill
    public function delete_skill($id) {
        $skill = $this->skills_model->get_skill_by_id($id);
        if ($skill && !empty($skill['icon'])) {
            $file_path = './public/assets/icons/' . $skill['icon'];
            if (file_exists($file_path)) {
                unlink($file_path);
            }
        }
        $this->skills_model->delete_skill($id);
        redirect('admin/dashboard/skills');
    }

    // --- METHODS UNTUK ACHIEVEMENTS ---
    public function create_achievement() {
        $this->load->view('layouts/header_admin');
        $this->load->view('admin/forms/achievement_form');
        $this->load->view('layouts/footer_admin');
    }

    public function store_achievement() {
        $data = array(
            'title'       => $this->input->post('title'),
            'description' => $this->input->post('description'),
            'link'        => $this->input->post('link')
        );
        $this->achievements_model->insert_achievement($data);
        redirect('admin/dashboard/achievements');
    }

    public function achievements() {
        $data['achievements'] = $this->achievements_model->get_achievements();
        $this->load->view('layouts/header_admin');
        $this->load->view('admin/tables/achievements_table', $data);
        $this->load->view('layouts/footer_admin');
    }

    // Metode untuk mengedit achievement
    public function edit_achievement($id) {
        $data['achievement'] = $this->achievements_model->get_achievement_by_id($id);
        $this->load->view('layouts/header_admin');
        $this->load->view('admin/forms/achievement_form', $data);
        $this->load->view('layouts/footer_admin');
    }

    // Metode untuk memperbarui achievement
    public function update_achievement($id) {
        $data = array(
            'title'       => $this->input->post('title'),
            'description' => $this->input->post('description'),
            'link'        => $this->input->post('link')
        );
        $this->achievements_model->update_achievement($id, $data);
        redirect('admin/dashboard/achievements');
    }

    // Metode untuk menghapus achievement
    public function delete_achievement($id) {
        $this->achievements_model->delete_achievement($id);
        redirect('admin/dashboard/achievements');
    }
}