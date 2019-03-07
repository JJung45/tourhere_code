<?php if (!defined('BASEPATH')) {    exit('No direct script access allowed'); }

class Board_Model extends CI_Model {

    function add($data){
        $this->db->set('created','NOW()',FALSE);
        $this->db->insert('board',$data);
    }

    function getAll(){
        $sql = "SELECT * FROM board";
        return $this->db->query($sql)->result();
    }


    function getById($data){
        $sql = "SELECT * FROM board WHERE id=?";
        return $this->db->query($sql,array('id'=>$data['id']))->result();
    }

}