<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


class Api_model extends CI_Model
{
    
    function loginMe($email, $password)
    {
        $this->db->select('*');
        $this->db->from('tbl_users');
        $this->db->where('email', $email);
        $this->db->where('isDeleted', 0);
        $query = $this->db->get();
        $user = $query->result();
        if(!empty($user)){
            if(verifyHashedPassword($password, $user[0]->password)){
                return $user;
            } else {
                return array();
            }
        } else {
            return array();
        }
    }
    function listProject()
    {
        $this->db->select('*');
        $this->db->from('tbl_project');
        $this->db->where('isDeleted', 0);
        $query = $this->db->get();
        return $query->result();
       
    }
    function activity_project($c_code)
    {
        $this->db->select('*');
        $this->db->from('tbl_activity_project');
        $this->db->where('c_project_id', $c_code);
        $this->db->where('isDeleted', 0);
        $query = $this->db->get();
        return $query->result();
       
    }
    function activity_project_all()
    {
        $this->db->select('tbl_activity_project.*,tbl_category_project.id as cid,tbl_category_project.image as cimage,tbl_categorys.title as cname');
        $this->db->from('tbl_activity_project');
        $this->db->join('tbl_category_project','tbl_category_project.id = tbl_activity_project.c_project_id');
          $this->db->join('tbl_categorys','tbl_categorys.id = tbl_category_project.c_code');
        $this->db->where('tbl_activity_project.isDeleted', 0);
        $query = $this->db->get();
        return $query->result();
       
    }
    function checklist($a_project_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_checklist');
        // $this->db->where('a_code', $a_code);
        $this->db->where('a_project_id', $a_project_id);
        $this->db->where('isDeleted', 0);
        $query = $this->db->get();
        return $query->result();
       
    }
    function category_project($pid,$instance)
    {

        $this->db->select('*');
        $this->db->from('tbl_project');
        $this->db->where('code', $pid);
        $this->db->where('isDeleted', 0);
        $query = $this->db->get();
        $result = $query->result();

        $this->db->select('tbl_categorys.*,tbl_category_project.*');
        $this->db->from('tbl_category_project');
        $this->db->join('tbl_categorys','tbl_categorys.id = tbl_category_project.c_code');
        $this->db->where('tbl_category_project.isDeleted', 0);
        $this->db->where('tbl_category_project.pro_code', $result[0]->id);
        $this->db->where('tbl_category_project.install_num', $instance);
        $query = $this->db->get();
        return $query->result();
       
    }

}  