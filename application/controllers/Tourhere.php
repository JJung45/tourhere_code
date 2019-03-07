<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Tourhere extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
        $this->basic();
        $this->load->view('footer');
    }

    public function  login(){
        $this->basic();

        if(!$this->session->userdata('is_login')) {
            redirect('/auth/login');
        }else{
            redirect('/tourhere');
        }
        $this->load->view('footer');
    }

    public function basic(){
        $this->load->view('head');
        $this->load->view('nav');
        $this->load->view('main');
    }
}