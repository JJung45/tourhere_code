<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Posting extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
    }

    function index(){
        $this->base();
    }

    function do_upload(){

        $this->form_validation->set_rules('id', 'userId', 'required');
        $this->form_validation->set_rules('txt', 'userTxt', 'required');

        if($this->form_validation->run()==false){
            $this->base();
        }else{
            $config['upload_path'] = './uploads/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 100;
            $config['max_width']            = 1024;
            $config['max_height']           = 768;

            $this->load->library('upload',$config);

            if(!$this->upload->do_upload()){
                echo "업로드 실패";
            }else{
                echo "업로드 성공";
            }

            echo "성공";
        }

    }

    function base(){
        $this->load->view('head');
        $this->load->view('posting');
        $this->load->view('footer');
    }

}