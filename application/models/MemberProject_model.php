<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class MemberProject_model extends CI_Model
{


    function projectList($id)
    {
        $this->db->select('t1.id,t2.userId,t2.name');
        $this->db->from('tbl_memberproject as t1');
        $this->db->join('tbl_users as t2', 't1.member_id = t2.userId','left');

        $this->db->where('t1.project_id', $id);
        $this->db->order_by('t1.id', 'desc');
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
    }

    function getmember(){
        $this->db->select('userId as id,name');
        $this->db->from('tbl_users');

        $this->db->where('roleId', 6);
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
    }
    function addNewProject($data){
        $this->db->trans_start();
        $this->db->insert('tbl_memberproject', $data);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
    function deletememberProject($id){
        $this->db->delete('tbl_memberproject',array('id' => $id));
        return true;
    }
}
?>