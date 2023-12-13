<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Ins_project_model extends CI_Model
{
    function insList($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_ins');

        $this->db->where('isDeleted', 0);
        $this->db->where('id_project', $id);
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
    function addNewIns($data){
        $this->db->trans_start();
        $this->db->insert('tbl_ins', $data);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
    function getData($id){
        $sql = " t1.*";
		
		$this->db->select($sql);
		$this->db->from("tbl_ins t1");
	
		
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
    function editOldIns($data, $id){
        $this->db->where('id', $id);
        $this->db->update('tbl_ins', $data);
        
        return TRUE;
    }
    function deleteIns($id, $data){
        $this->db->where('id', $id);
        $this->db->update('tbl_ins', $data);
        
        return $this->db->affected_rows();
    }
}
