<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Mypage extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function main(){
        $this->load->view('head');
        $this->load->view('mypage');
        $this->load->view('footer');
    }

}