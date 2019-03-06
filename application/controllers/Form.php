<?php

class Form extends CI_Controller {

    public function index()
    {
        $this->basic();

        $this->form_validation->set_rules('name', 'userName', 'required');
        $this->form_validation->set_rules('id', 'userId', 'required|min_length[5]|max_length[20]|is_unique[user.id]');
        $this->form_validation->set_rules('pw', 'userPw', 'required|min_length[6]|max_length[30]|matches[re_pw]');
        $this->form_validation->set_rules('re_pw', 'userRepw', 'required');

//        $this->basic();

        if($this->form_validation->run()==false){
            $this->load->view('register');
            $this->load->view('footer');
        }else{
            $this->load->database();
            $this->load->model('user_Model');
            $this->user_Model->add(array(
                'name'=>$this->input->post('name'),
                'id'=>$this->input->post('id'),
                'pw'=>$this->input->post('pw')
            ));
        }

    }

    public function basic(){
        $this->load->view('head');
        $this->load->view('nav');
        $this->load->view('main');
    }
}