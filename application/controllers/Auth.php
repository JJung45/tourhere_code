<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
//        $this->load->model('user_model');
    }

    public function login(){
        $this->basic();
        $this->load->view('login');
        $this->load->view('footer');
    }

    public function logout(){
        $this->session->sess_destroy();
        redirect('/tourhere');
    }


    function register(){
        $this->basic();
        $this->form_validation->set_rules('name', '이름', 'required|valid_name|is_unique[user.name]');
        $this->form_validation->set_rules('id', '아이디', 'required|min_length[5]|max_length[20]');
        $this->form_validation->set_rules('pw', '비밀번호', 'required|min_length[6]|max_length[30]|matches[re_password]');
        $this->form_validation->set_rules('re_pw', '비밀번호확인', 'required');

        if($this->form_validation->run()==false){
            $this->load->view('register');
        }else{

        }
        $this->load->view('footer');
    }


    function authenication(){
        $authenication =  $this->config->item('authenication');
        if($this->input->post('id')==$authenication['id'] && $this->input->post('pw')==$authenication['pw']){
            $this->session->set_userdata('is_login',true);
            redirect('/tourhere');
        }else{
            $this->session->set_flashdata('message','로그인에 실패했습니다.');
            redirect('/auth/login');
        }
    }

    public function basic(){
        $this->load->view('head');
        $this->load->view('nav');
        $this->load->view('main');
//        $data = $this->user_model->gets();
    }

}