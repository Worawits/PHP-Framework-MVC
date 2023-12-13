<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Checklist_model extends CI_Model
{

    function checklistList($id)
    {
        $this->db->select('t1.*');
        $this->db->from('tbl_checklist t1');
        // $this->db->join('tbl_users t2' , 't2.userId = t1.check');
        $this->db->where('id_scope', $id);
        $this->db->where('t1.isDeleted', 0);
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
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
    function getData($id = null){
		$sql = " t1.*";
		
		$this->db->select($sql);
		$this->db->from("tbl_checklist t1");
	
		
		if ($id) {	
			$this->db->where('t1.id', $id);
		}
		
		// $this->db->order_by('t1.id', 'desc');
	
		$query = $this->db->get();

		if ($id) {
			return $query->row_array();
			}else{
			return $query->result_array();
		}
    }
    function checklistid($id){
        $this->db->select('name');
        $this->db->from('tbl_users ');
        $this->db->where('userId', $id);
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
    }
    function addNewChecklist($data)
    {
        $this->db->trans_start();
        $this->db->insert('tbl_checklist', $data);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
    function editChecklist($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('tbl_checklist', $data);
        
        return TRUE;
    }
    function deleteChecklist($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('tbl_checklist', $data);
        
        return $this->db->affected_rows();
    }
    function countissues($id){
		$this->db->select('t1.*');
        $this->db->from('tbl_issues t1');
        
        $this->db->where('t1.checklist_id', $id);
		// $this->db->where('t5.status_dev', 0);
        $query = $this->db->get();
        
        $result = $query->result();        
        return count($result);
	}
	function countissues_dev($id){
		$this->db->select('t1.*');
        $this->db->from('tbl_issues t1');
        
        $this->db->where('t1.checklist_id', $id);
		$this->db->where('t1.status_dev', 1);
        $query = $this->db->get();
        
        $result = $query->result();        
        return count($result);
	}
	function countissues_test($id){
		$this->db->select('t1.*');
        $this->db->from('tbl_issues t1');
        
        $this->db->where('t1.checklist_id', $id);
		$this->db->where('t1.status_test', 1);
        $query = $this->db->get();
        
        $result = $query->result();        
        return count($result);
	}
	function countissues_cus($id){
		$this->db->select('t1.*');
        $this->db->from('tbl_issues t1');
        
        $this->db->where('t1.checklist_id', $id);
		$this->db->where('t1.status_cus', 1);
        $query = $this->db->get();
        
        $result = $query->result();        
        return count($result);
	}
}
?>