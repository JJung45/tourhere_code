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

        $config['base_url'] = 'http://localhost/board/';
        $config['uri_segment'] = 3;
        $config['total_rows'] = 200;
        $config['per_page'] = 20;
        $config['num_links'] = 2;
        $config['use_page_numbers'] = TRUE;
        $config['page_query_string'] = TRUE;


        $this->pagination->initialize($config);

        echo $this->pagination->create_links();
    }
}
