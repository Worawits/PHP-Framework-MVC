<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Scope_model extends CI_Model
{

    function scopeList($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_scope');
        $this->db->where('id_ins', $id);
        $this->db->where('isDeleted', 0);
        $query = $this->db->get();
        
        $result = $query->result();        
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
		$this->db->from("tbl_scope t1");
	
		
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
    function addNewScope($data)
    {
        $this->db->trans_start();
        $this->db->insert('tbl_scope', $data);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
    function editScope($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('tbl_scope', $data);
        
        return TRUE;
    }
    function deleteScope($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('tbl_scope', $data);
        
        return $this->db->affected_rows();
    }
    function countchecklist($id){
		$this->db->select('t1.*');
        $this->db->from('tbl_checklist t1');
        
        $this->db->where('t1.id_scope', $id);
		// $this->db->where('t4.status', 0);
        $query = $this->db->get();
        
        $result = $query->result();        
        return count($result);
	}
	function countchecklist_dev($id){
		$this->db->select('t1.*');
        $this->db->from('tbl_checklist t1');
        
        $this->db->where('t1.id_scope', $id);
		$this->db->where('t1.status', 1);
        $query = $this->db->get();
        
        $result = $query->result();        
        return count($result);
	}
	function countchecklist_test($id){
		$this->db->select('t1.*');
        $this->db->from('tbl_checklist t1');
        
        $this->db->where('t1.id_scope', $id);
		$this->db->where('t1.status_test', 1);
        $query = $this->db->get();
        
        $result = $query->result();        
        return count($result);
	}
	function countchecklist_cus($id){
		$this->db->select('t1.*');
        $this->db->from('tbl_checklist t1');
        
        $this->db->where('t1.id_scope', $id);
		$this->db->where('t1.cus_check', 1);
        $query = $this->db->get();
        
        $result = $query->result();        
        return count($result);
	}
	function countissues($id){
		$this->db->select('t1.*');
        $this->db->from('tbl_checklist t1');
		$this->db->join('tbl_issues as t2','t2.checklist_id = t1.id');
        
        $this->db->where('t1.id_scope', $id);
		// $this->db->where('t5.status_dev', 0);
        $query = $this->db->get();
        
        $result = $query->result();        
        return count($result);
	}
	function countissues_dev($id){
		$this->db->select('t1.*');
        $this->db->from('tbl_checklist t1');
		$this->db->join('tbl_issues as t2','t2.checklist_id = t1.id');
        
        $this->db->where('t1.id_scope', $id);
		$this->db->where('t2.status_dev', 1);
        $query = $this->db->get();
        
        $result = $query->result();        
        return count($result);
	}
	function countissues_test($id){
		$this->db->select('t1.*');
        $this->db->from('tbl_checklist t1');
		$this->db->join('tbl_issues as t2','t2.checklist_id = t1.id');
        
        $this->db->where('t1.id_scope', $id);
		$this->db->where('t2.status_test', 1);
        $query = $this->db->get();
        
        $result = $query->result();        
        return count($result);
	}
	function countissues_cus($id){
		$this->db->select('t1.*');
        $this->db->from('tbl_checklist t1');
		$this->db->join('tbl_issues as t2','t2.checklist_id = t1.id');
        
        $this->db->where('t1.id_scope', $id);
		$this->db->where('t2.status_cus', 1);
        $query = $this->db->get();
        
        $result = $query->result();        
        return count($result);
	}
}
?>