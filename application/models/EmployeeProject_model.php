<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class EmployeeProject_model extends CI_Model
{


    function projectList($id)
    {
        $this->db->select('t1.id,t2.userId,t2.name');
        $this->db->from('tbl_employeeproject as t1');
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

        $this->db->where('roleId <', 5);
        $this->db->where('roleId !=', 1);
        $this->db->where('roleId !=', 2);
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
    }
    function addNewProject($data){
        $this->db->trans_start();
        $this->db->insert('tbl_employeeproject', $data);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
    function deleteemployeeProject($id){
        $this->db->delete('tbl_employeeproject',array('id' => $id));
        return true;
    }
}
?>