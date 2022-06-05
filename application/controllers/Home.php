<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('modelUser');

    }

    public function index()
    {
            $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('home');
        $this->load->view('templates/footer');
    }

    public function menu()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('menu');
        $this->load->view('templates/footer');

    }
}
?>