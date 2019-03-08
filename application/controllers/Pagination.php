<?php


class Pagination extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function pagination()
    {
        $this->load->library('pagination');

        $config['base_url']= '/board/notification/';
        $data['perPage']=$config['per_page']= 10;
        $data['pageNum']=$offset = $this->uri->segment(3,0);
        $data['result']=$this->Board_model->select_entry($data['perPage'], $offset);
        $data['getTotalData']=$config['total_rows']=$this->Board_model->total_entry();
        $config['page_query_string']=FALSE;
        $this->pagination->initialize($config);
        $data['pagenav'] = $this->pagination->create_links();
        $this->load->view('notification', $data);


        $this->pagination->initialize($config);

        echo $this->pagination->create_links();
    }
}
