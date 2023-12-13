<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Project_model extends CI_Model
{


    function projectList($id = null)
    {
		if($id){
			$this->db->select('t1.*');
			$this->db->from('tbl_project t1');
			$this->db->join('tbl_memberproject t2','t2.project_id = t1.id');
			$this->db->where('t1.isDeleted', 0);
			$this->db->where('t2.member_id', $id);
			$this->db->order_by('t1.status', 'asc');
			$query = $this->db->get();
			
			$result = $query->result();        
			return $result;
		}else{
			$this->db->select('t1.*,t2.name as cus_name');
			$this->db->from('tbl_project t1');
			$this->db->join('tbl_users t2','t2.userId = t1.cus_id');
			$this->db->where('t1.isDeleted', 0);
			$this->db->order_by('t1.status', 'asc');
			$query = $this->db->get();
			
			$result = $query->result();        
			return $result;
		}
    }
	function checkalarm($id = null){
			$this->db->select('id,ins_col');
			$this->db->from('tbl_ins');
			$this->db->where('id_project', $id);
			$this->db->where('payment_status', 0);
			$this->db->where('isDeleted', 0);
			$query = $this->db->get();
			
			$result = $query->result();        
			return $result;
	}
    function getData($id = null){
		$sql = " t1.*";
		
		$this->db->select($sql);
		$this->db->from("tbl_project t1");
	
		
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
    function checkcode($code,$id=null){
        $sql = " t1.*";
		
		$this->db->select($sql);
		$this->db->from("tbl_project t1");
	
		$this->db->where('t1.isDeleted', 0);
		if ($code) {	
			$this->db->where('t1.code', $code);
		}
        if ($id) {	
			$this->db->where('t1.id !=', $id);
		}
	
		$query = $this->db->get();

		if ($code) {
			return $query->row_array();
		}
    }
    function getDatabycode($code = null){
		$sql = " t1.*";
		
		$this->db->select($sql);
		$this->db->from("tbl_project t1");
	
		
		if ($code) {	
			$this->db->where('t1.code', $code);
		}
		
		$this->db->order_by('t1.id', 'desc');
	
		$query = $this->db->get();
		if ($code) {
			return $query->row_array();
			}else{
			return $query->result_array();
		}
    }
    function getcategorys()
    {
        $sql = " t1.*";
		
		$this->db->select($sql);
		$this->db->from("tbl_categorys t1");
        $this->db->where('t1.active', 0);
        $this->db->where('t1.isDeleted', 0);
		$query = $this->db->get();

		return $query->result();
    }
    function getactivitys($id=null)
    {
        $sql = " t1.*";
		
		$this->db->select($sql);
		$this->db->from("tbl_activitys t1");
	
		
		if ($id) {	
			$this->db->where('t1.c_id', $id);
		}
		$this->db->where('t1.isDeleted', 0);
        $this->db->where('t1.active', 0);
		$query = $this->db->get();
		return $query->result();
    }
	function getchecklists($id=null)
    {
        $sql = " t1.*";
		
		$this->db->select($sql);
		$this->db->from("tbl_checklists t1");
	
		
		if ($id) {	
			$this->db->where('t1.a_id', $id);
		}
		$this->db->where('t1.isDeleted', 0);
        $this->db->where('t1.active', 0);
		$query = $this->db->get();
		return $query->result();
    }
    function addNewProject($data)
    {
        $this->db->trans_start();
        $this->db->insert('tbl_project', $data);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
    function editProject($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('tbl_project', $data);
        
        return TRUE;
    }
    function deleteProject($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('tbl_project', $data);
        
        return $this->db->affected_rows();
    }
	function countchecklist($id){
		$this->db->select('t4.*');
        $this->db->from('tbl_project t1');
		$this->db->join('tbl_ins as t2','t2.id_project = t1.id');
		$this->db->join('tbl_scope as t3','t3.id_ins = t2.id');
		$this->db->join('tbl_checklist as t4','t4.id_scope = t3.id');

        $this->db->where('t1.id', $id);
		// $this->db->where('t4.status', 0);
        $query = $this->db->get();
        
        $result = $query->result();        
        return count($result);
	}
	function countchecklist_dev($id){
		$this->db->select('t4.*');
        $this->db->from('tbl_project t1');
		$this->db->join('tbl_ins as t2','t2.id_project = t1.id');
		$this->db->join('tbl_scope as t3','t3.id_ins = t2.id');
		$this->db->join('tbl_checklist as t4','t4.id_scope = t3.id');

        $this->db->where('t1.id', $id);
		$this->db->where('t4.status', 1);
        $query = $this->db->get();
        
        $result = $query->result();        
        return count($result);
	}
	function countchecklist_test($id){
		$this->db->select('t4.*');
        $this->db->from('tbl_project t1');
		$this->db->join('tbl_ins as t2','t2.id_project = t1.id');
		$this->db->join('tbl_scope as t3','t3.id_ins = t2.id');
		$this->db->join('tbl_checklist as t4','t4.id_scope = t3.id');

        $this->db->where('t1.id', $id);
		$this->db->where('t4.status_test', 1);
        $query = $this->db->get();
        
        $result = $query->result();        
        return count($result);
	}
	function countchecklist_cus($id){
		$this->db->select('t4.*');
        $this->db->from('tbl_project t1');
		$this->db->join('tbl_ins as t2','t2.id_project = t1.id');
		$this->db->join('tbl_scope as t3','t3.id_ins = t2.id');
		$this->db->join('tbl_checklist as t4','t4.id_scope = t3.id');

        $this->db->where('t1.id', $id);
		$this->db->where('t4.cus_check', 1);
        $query = $this->db->get();
        
        $result = $query->result();        
        return count($result);
	}
	function countissues($id){
		$this->db->select('t5.*');
        $this->db->from('tbl_project t1');
		$this->db->join('tbl_ins as t2','t2.id_project = t1.id');
		$this->db->join('tbl_scope as t3','t3.id_ins = t2.id');
		$this->db->join('tbl_checklist as t4','t4.id_scope = t3.id');
		$this->db->join('tbl_issues as t5','t5.checklist_id = t4.id');

        $this->db->where('t1.id', $id);
		// $this->db->where('t5.status_dev', 0);
        $query = $this->db->get();
        
        $result = $query->result();        
        return count($result);
	}
	function countissues_dev($id){
		$this->db->select('t5.*');
        $this->db->from('tbl_project t1');
		$this->db->join('tbl_ins as t2','t2.id_project = t1.id');
		$this->db->join('tbl_scope as t3','t3.id_ins = t2.id');
		$this->db->join('tbl_checklist as t4','t4.id_scope = t3.id');
		$this->db->join('tbl_issues as t5','t5.checklist_id = t4.id');

        $this->db->where('t1.id', $id);
		$this->db->where('t5.status_dev', 1);
        $query = $this->db->get();
        
        $result = $query->result();        
        return count($result);
	}
	function countissues_test($id){
		$this->db->select('t5.*');
        $this->db->from('tbl_project t1');
		$this->db->join('tbl_ins as t2','t2.id_project = t1.id');
		$this->db->join('tbl_scope as t3','t3.id_ins = t2.id');
		$this->db->join('tbl_checklist as t4','t4.id_scope = t3.id');
		$this->db->join('tbl_issues as t5','t5.checklist_id = t4.id');

        $this->db->where('t1.id', $id);
		$this->db->where('t5.status_test', 1);
        $query = $this->db->get();
        
        $result = $query->result();        
        return count($result);
	}
	function countissues_cus($id){
		$this->db->select('t5.*');
        $this->db->from('tbl_project t1');
		$this->db->join('tbl_ins as t2','t2.id_project = t1.id');
		$this->db->join('tbl_scope as t3','t3.id_ins = t2.id');
		$this->db->join('tbl_checklist as t4','t4.id_scope = t3.id');
		$this->db->join('tbl_issues as t5','t5.checklist_id = t4.id');

        $this->db->where('t1.id', $id);
		$this->db->where('t5.status_cus', 1);
        $query = $this->db->get();
        
        $result = $query->result();        
        return count($result);
	}
	function getmember(){
        $this->db->select('userId as id,name');
        $this->db->from('tbl_users');

        $this->db->where('roleId', 6);
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
    }
}
?>