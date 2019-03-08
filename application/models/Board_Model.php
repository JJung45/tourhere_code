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

    //무한 스크롤 시도
    function get_page($page_number){
        $item_per_page = 10;
        $position = ($page_number*$item_per_page)-$item_per_page;
        $sql = "select * from board order by created DESC LIMIT ?,?";
        $query =$this->db->query($sql, array($position,$position+$item_per_page));
        return $query->result();
    }

    //페이징네이션적용
    function total_entry(){
        $query = $this->db->get('notification');
        return $query->num_rows();
    }

    function select_entry($list_num, $offset){
        $query = $this->db->get('notification', $list_num,$offset);
        return $query->result();
    }

    //board자세히보기
    function details($bidx){
        $sql = "SELECT * FROM board WHERE bidx=?";
        return $this->db->query($sql,array('$bidx'=> $bidx))->result();
    }

}