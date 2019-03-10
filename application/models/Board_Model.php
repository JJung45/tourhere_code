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
    function getById($data){//수정
        return $this->db->get_where('board',array('id'=>$data['id']))->result();
    }
    //무한 스크롤 시도 - 수정
    function get_page($page_number,$search){
        $item_per_page = 10;
        $position = $page_number*$item_per_page;
        if($search==''){
            $this->db->limit($position+$item_per_page, $position);

        }else{
            $this->db->like('txt',$search);
        }
        $this->db->order_by('created','DESC');
        $query =$this->db->get('board');
        return $query->result();
    }
    function search_page($search){
        $this->db->like('txt',$search);
        return $this->db->get('board')->result();

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
    //board자세히보기 및 mypage 수정페이지 - 수정
    function details($bidx){
        return $this->db->get_where('board',array('bidx'=>$bidx))->result();
    }
    //mypage 수정기능
    function update($data){
        $this->db->where('bidx',$data['bidx']);
        $this->db->set('created','NOW()',FALSE);
        $this->db->update('board',$data);
    }
    //mypage 삭제 - 수정
    function delete($bidx){
        return $this->db->delete('board',array('bidx'=>$bidx));
    }
}