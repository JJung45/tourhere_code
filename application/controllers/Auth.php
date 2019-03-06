<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        // load form and url helpers
        $this->load->helper(array('form', 'url'));

        // load form_validation library
        $this->load->library('form_validation');
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

        $this->form_validation->set_rules('name', 'userName', 'required');
        $this->form_validation->set_rules('id', 'userId', 'required|min_length[5]|max_length[20]|is_unique[user.id]');
        $this->form_validation->set_rules('pw', 'userPw', 'required|min_length[6]|max_length[30]|matches[re_pw]');
        $this->form_validation->set_rules('re_pw', 'userRepw', 'required');


        if($this->form_validation->run()==false){
            $this->load->view('register');
        }else{
            $this->load->model('User_Model');
            $pw = password_hash($this->input->post('pw'),PASSWORD_BCRYPT,["cost" => 8]);
            $data = array(
                'name' => $this->input->post('name'),
                'id' => $this->input->post('id'),
                'pw' => $pw
            );
            $this->User_Model->add($data);
            redirect('/tourhere');
        }
        $this->load->view('footer');
    }


    function authenication(){
        $this->load->model('User_Model');
        $user = $this->User_Model->getById(array(
           'id'=>$this->input->post('id')
        ));
        if($this->input->post('id')==$user->id && password_verify($this->input->post('pw'),$user->pw)){
            $this->session->set_userdata('is_login',true);
            $this->session->set_flashdata('message','로그인에 성공했습니다.');
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