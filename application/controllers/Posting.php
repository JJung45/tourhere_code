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

            $config['upload_path'] = './assets/upload';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 300;
            $config['max_width']            = 1024;
            $config['max_height']           = 768;

            $this->load->library('upload',$config);

            $this->upload->initialize($config);

            $file = array();
            for($i=0; $i<$_POST['imgcount'];$i++){
                $this->upload->initialize($config);
                $this->upload->do_upload('image_'.$i);
                $file[$i] = $_FILES['image_'.$i]['name'];
            }


            $this->load->model('Board_Model');
            $fileArr=implode(',',$file);
            $data = array(
                'id' => $_POST['id'],
                'img' => $fileArr,
                'txt' => $_POST['txt'],
            );
            $this->Board_Model->add($data);

            echo "업로드성공";

        }

    }

    function base(){
        $this->load->view('head');
        $this->load->view('posting');
        $this->load->view('footer');
    }

}