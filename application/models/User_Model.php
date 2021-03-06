<?php if (!defined('BASEPATH')) {    exit('No direct script access allowed'); }

class User_Model extends CI_Model {

    function add($data){
        $this->db->set('created','NOW()',FALSE);
        $this->db->insert('user',$data);
    }

    function getById($data){
        $result = $this->db->get_where('user',array('id'=>$data['id']))->row();
        return $result;
    }
}