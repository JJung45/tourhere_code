<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Board extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Board_Model');
    }
    public function main()
    {
        $this->load->view('head');
        $this->load->view('mainnav');
        $page = $this->input->get('pagenum') ?? 0;
        $boards = $this->Board_Model->get_page(intval($page),'');
        $this->load->view('board',[
            'boards' => $boards
        ]);
        $this->load->view('footer');
    }
    //무한스크롤 시도
    public function page(){
        $this->load->model('Board_Model');
        $page = $this->input->post('pagenum');
        $search = $this->input->post('search');
        if($search){
            $data['clien'] = $this->Board_Model->get_page(intval($page),$search);
        }else{
            $data['clien'] = $this->Board_Model->get_page(intval($page),'');
        }
        $this->load->view('/board/main',$data);
    }
    public function boardList(){
        $page = $this->input->get('pagenum') ?? 0;
        $search = $this->input->get('search') ?? '';
        if($search!=''){
            $data['boards'] = $this->Board_Model->get_page(intval($page),$search);
        }else{
            $data['boards'] = $this->Board_Model->get_page(intval($page),'');
        }
        $this->load->view('/ajax/boardList', $data);
    }
    public function boardSearch(){
        $search = $this->input->get('search') ?? 0;
        $data['boards'] = $this->Board_Model->search_page($search);
        $this->load->view('/ajax/board_list',$data);
    }
    public function view(){//작업 미완료 - 수정
        $this->load->view('head');
        $bidx = $this->input->get('num');
        $data = $this->Board_Model->details($bidx);
        $this->load->view('view',[
            'data' => $data
        ]);
        $this->load->view('footer');
    }
    public function mypage()
    {
        $this->load->view('head');
        $board = $this->Board_Model->getById(array(
            'id' => $this->session->userdata('userId')
        ));
        $this->load->view('mypage',[
            'boards' => $board
        ]);//수정
        $this->load->view('footer');
    }
    //수정
    public function update(){

        $this->load->view('head');
        $bidx = $this->input->get('bidx');
        $data = $this->Board_Model->details($bidx);
        $this->load->view('update',[
            'data' => $data
        ]);
        $this->load->view('footer');
    }
    //수정
    public function delete(){
        $bidx = $this->input->get('bidx');
        $this->Board_Model->delete($bidx);
        redirect("/board/mypage");
    }
    public function notification(){
        $this->load->view('head');
        $this->load->library('pagination');
        $config['base_url']= 'notification/';
        $config['total_rows'] = 200;
        $config['full_tag_open']='<div style="position: absolute;bottom: 20px;left: 50%;">';
        $config['full_tag_close']='</div>';
        $config['next_tag_open'] = '<span>';
        $config['next_tag_close'] = '</span>';
        $config['prev_tag_open'] = '<span>';
        $config['prev_tag_close'] = '</span>';
        $config['num_tag_open'] = '<span>';
        $config['num_tag_close'] = '</span>';
        $config['first_link'] = 1;
        $config['first_tag_open'] = '<span>';
        $config['first_tag_close'] = '</span>';
        $data['perPage']=$config['per_page']= 10;
        $data['pageNum']=$offset = $this->uri->segment(3,0);
        $data['result']=$this->Board_Model->select_entry($data['perPage'], $offset);
        $data['getTotalData']=$config['total_rows']=$this->Board_Model->total_entry();
        $this->pagination->initialize($config);
        echo $this->pagination->create_links();
        $this->load->view('notification', $data);
//        $this->pagination->initialize($config);
//
//        echo $this->pagination->create_links();
        $this->load->view('footer');
    }
}