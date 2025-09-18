<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Portofolio extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('project_model');
        $this->load->model('skills_model');
        $this->load->model('achievements_model');
        $this->load->helper('url');
    }

    public function home() {
        // Halaman beranda hanya akan memuat tampilan utamanya
        $this->load->view('layouts/header');
        $this->load->view('home');
        $this->load->view('layouts/footer');
    }

    public function about() {
        $this->load->view('layouts/header');
        $this->load->view('about');
        $this->load->view('layouts/footer');
    }
    
    public function education() {
        $this->load->view('layouts/header');
        $this->load->view('education');
        $this->load->view('layouts/footer');
    }

    public function experience() {
        $this->load->view('layouts/header');
        $this->load->view('experience');
        $this->load->view('layouts/footer');
    }
    
    public function projects() {
        // Memuat data dari model untuk halaman projects
        $data['projects'] = $this->project_model->get_projects();
        $this->load->view('layouts/header');
        $this->load->view('projects', $data);
        $this->load->view('layouts/footer');
    }

    public function skills() {
        // Memuat data dari model untuk halaman skills
        $data['skills'] = $this->skills_model->get_skills();
        $this->load->view('layouts/header');
        $this->load->view('skills', $data);
        $this->load->view('layouts/footer');
    }

    public function achievements() {
        // Memuat data dari model untuk halaman achievements
        $data['achievements'] = $this->achievements_model->get_achievements();
        $this->load->view('layouts/header');
        $this->load->view('achievements', $data);
        $this->load->view('layouts/footer');
    }

    public function contact() {
        $this->load->view('layouts/header');
        $this->load->view('contact');
        $this->load->view('layouts/footer');
    }
}