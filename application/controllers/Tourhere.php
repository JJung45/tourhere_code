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


    public  function  board(){
        $this->load->view('head');
        $this->load->view('mainnav');
        $this->load->view('board');
        $this->load->view('footer');
    }

    public function  login(){
        $this->basic();
        //로그인 필요

        //로그인이 되어있지 않다면 로그인 페이지를 리다이렉션

        if(!$this->session->userdata('is_login')) {
            redirect('/auth/login');
        }else{
            redirect('/mypage/main');
        }
        $this->load->view('footer');
    }

    public function basic(){
        $this->load->view('head');
        $this->load->view('nav');
        $this->load->view('main');
    }
}