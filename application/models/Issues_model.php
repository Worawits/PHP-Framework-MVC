<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Issues_model extends CI_Model
{
    function issuesList($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_issues');

        $this->db->where('isDeleted', 0);
        $this->db->where('checklist_id', $id);
        $this->db->order_by('id', 'desc');
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
    }
    function project_name($id){
        $this->db->select('name');
        $this->db->from('tbl_project');

        $this->db->where('id', $id);
        $query = $this->db->get();
        
        $result = $query->row_array();        
        return $result;
    }
    function addNewIssues($data){
        $this->db->trans_start();
        $this->db->insert('tbl_issues', $data);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
    function getData($id){
        $sql = " t1.*";
		
		$this->db->select($sql);
		$this->db->from("tbl_issues t1");
	
		
		if ($id) {	
			$this->db->where('t1.id', $id);
		}
		
		$this->db->order_by('t1.id', 'desc');
	
		$query = $this->db->get();

		if ($id) {
			return $query->row_array();
		}else{
			return $query->result_array();
		}
    }
    function editOldIssues($data, $id){
        $this->db->where('id', $id);
        $this->db->update('tbl_issues', $data);
        
        return TRUE;
    }
    function deleteIssues($id, $data){
        $this->db->where('id', $id);
        $this->db->update('tbl_issues', $data);
        
        return $this->db->affected_rows();
    }
    function getscope_idbyid($id){
        $this->db->select('id_ins,topic');
        $this->db->from('tbl_scope');
        $this->db->where('id', $id);
        $query = $this->db->get();
        
        $result = $query->row_array();        
        return $result;
    }
    function getins_idbyid($id){
        $this->db->select('t1.id_project,t1.ins_col,t2.name');
        $this->db->from('tbl_ins t1');
        $this->db->join('tbl_project as t2','t2.id = t1.id_project');
        $this->db->where('t1.id', $id);
        $query = $this->db->get();
        
        $result = $query->row_array();        
        return $result;
    }
    function getchecklist_idbyid($id){
        $this->db->select('id_scope,topic');
        $this->db->from('tbl_checklist');
        $this->db->where('id', $id);
        $query = $this->db->get();
        
        $result = $query->row_array();        
        return $result;
    }
    
}
