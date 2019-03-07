<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Board extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function main()
    {
        $this->load->view('head');
        $this->load->view('mainnav');

        $this->load->model('Board_Model');
        $board = $this->Board_Model->getAll();

        $boards = array();

        if ($board != 0) {
            $i = 0;
            $boards['bidx'] = array();
            $boards['id'] = array();
            $boards['img'] = array();
            $boards['txt'] = array();
            $boards['created'] = array();
            foreach ($board as $board) {
                $boards['bidx'][$i] = $board->bidx;
                $boards['id'][$i] = $board->id;
                $boards['img'][$i] = $board->img;
                $boards['txt'][$i] = $board->txt;
                $boards['created'][$i] = $board->created;
                $i++;
            }
            $this->load->view('board', $boards);
            $this->load->view('footer');
        } else {
            $this->load->view('board');
            $this->load->view('footer');
        }
    }



    public function view(){
        $this->load->view('head');



        $this->load->view('view');
        $this->load->view('footer');
    }


    public function mypage()
    {

        $this->load->view('head');

        $this->load->model('Board_Model');
        $board = $this->Board_Model->getById(array(
            'id' => $this->session->userdata('userId')
        ));


        $boards=array();

        if ($board != 0) {
            $i=0;
            $boards['bidx']=array();
            $boards['id']=array();
            $boards['img']=array();
            $boards['txt']=array();
            $boards['created']=array();
            foreach ($board as $board) {
                $boards['bidx'][$i] =$board->bidx;
                $boards['id'][$i] =$board->id;
                $boards['img'][$i] =$board->img;
                $boards['txt'][$i] = $board->txt;
                $boards['created'][$i] = $board->created;
                $i++;
            }
            $this->load->view('mypage',$boards);
            $this->load->view('footer');
        }else{
            $this->load->view('mypage');
            $this->load->view('footer');
        }

    }

    public function array_board(){

    }

}