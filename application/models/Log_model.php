<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Log_model extends CI_Model
{
    function project_log($data,$change,$vendorId){
        $save = array(
            "data"=>json_encode($data),
            "change"=>$change,
            'createdBy'=>$vendorId
        );
        $this->db->trans_start();
        $this->db->insert('log_project', $save);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;

    }
    function ins_log($data,$change,$vendorId){
        $save = array(
            "data"=>json_encode($data),
            "change"=>$change,
            'createdBy'=>$vendorId
        );
        $this->db->trans_start();
        $this->db->insert('log_ins', $save);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
    function scope_log($data,$change,$vendorId){
        $save = array(
            "data"=>json_encode($data),
            "change"=>$change,
            'createdBy'=>$vendorId
        );
        $this->db->trans_start();
        $this->db->insert('log_scope', $save);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
    function Issues_log($data,$change,$vendorId){
        $save = array(
            "data"=>json_encode($data),
            "change"=>$change,
            'createdBy'=>$vendorId
        );
        $this->db->trans_start();
        $this->db->insert('log_issues', $save);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
}
?>