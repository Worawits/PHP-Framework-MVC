<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model
{
    /**
     * This function is used to get the user listing count
     * @param string $searchText : This is optional search text
     * @return number $count : This is row count
     */
    function userListingCount($searchText = '')
    {
        $this->db->select('Role.*,BaseTbl.*');
        $this->db->from('tbl_users as BaseTbl');
        $this->db->join('tbl_roles as Role', 'Role.roleId = BaseTbl.roleId', 'left');
        if (!empty($searchText)) {
            $likeCriteria = "(BaseTbl.email  LIKE '%" . $searchText . "%'
                            OR  BaseTbl.name  LIKE '%" . $searchText . "%'
                            OR  BaseTbl.myreferral  LIKE '%" . $searchText . "%'
                            OR  BaseTbl.refferral  LIKE '%" . $searchText . "%'
                            OR  BaseTbl.mobile  LIKE '%" . $searchText . "%')";
            $this->db->where($likeCriteria);
        }
        $this->db->where('BaseTbl.isDeleted', 0);
        $this->db->where('BaseTbl.roleId !=', 1);
        $query = $this->db->get();

        return count($query->result());
    }

    /**
     * This function is used to get the user listing count
     * @param string $searchText : This is optional search text
     * @param number $page : This is pagination offset
     * @param number $segment : This is pagination limit
     * @return array $result : This is result
     */
    function userListing($searchText = '', $page = 0, $segment = 0)
    {
        $this->db->select('Role.*,BaseTbl.*');
        $this->db->from('tbl_users as BaseTbl');
        $this->db->join('tbl_roles as Role', 'Role.roleId = BaseTbl.roleId', 'left');
        if (!empty($searchText)) {
            $likeCriteria = "(BaseTbl.email  LIKE '%" . $searchText . "%'
                            OR  BaseTbl.name  LIKE '%" . $searchText . "%'
                            OR  Role.role  LIKE '%" . $searchText . "%'
                            OR  BaseTbl.code  LIKE '%" . $searchText . "%'
                            OR  BaseTbl.mobile  LIKE '%" . $searchText . "%')";
            $this->db->where($likeCriteria);
        }
        $this->db->where('BaseTbl.isDeleted', 0);
        $this->db->where('BaseTbl.roleId !=', 1);
        // $this->db->limit($page, $segment);
        $query = $this->db->get();

        $result = $query->result();
        return $result;
    }

    /**
     * This function is used to get the user roles information
     * @return array $result : This is result of the query
     */
    function getUserRoles()
    {
        $this->db->select('roleId, role');
        $this->db->from('tbl_roles');
        $this->db->where('roleId !=', 1);
        $query = $this->db->get();

        return $query->result();
    }

    /**
     * This function is used to check whether email id is already exist or not
     * @param {string} $email : This is email id
     * @param {number} $userId : This is user id
     * @return {mixed} $result : This is searched result
     */
    function checkEmailExists($email, $userId = 0)
    {
        $this->db->select("email");
        $this->db->from("tbl_users");
        $this->db->where("email", $email);
        $this->db->where("isDeleted", 0);
        if ($userId != 0) {
            $this->db->where("userId !=", $userId);
        }
        $query = $this->db->get();

        return $query->result();
    }


    /**
     * This function is used to add new user to system
     * @return number $insert_id : This is last inserted id
     */
    function addNewUser($userInfo)
    {
        $this->db->trans_start();
        $this->db->insert('tbl_users', $userInfo);

        $insert_id = $this->db->insert_id();

        $this->db->trans_complete();

        return $insert_id;
    }

    /**
     * This function used to get user information by id
     * @param number $userId : This is user id
     * @return array $result : This is user information
     */
    function getUserInfo($userId)
    {
        $this->db->select('*');
        $this->db->from('tbl_users');
        $this->db->where('isDeleted', 0);
        $this->db->where('roleId !=', 1);
        $this->db->where('userId', $userId);
        $query = $this->db->get();

        return $query->result();
    }


    /**
     * This function is used to update the user information
     * @param array $userInfo : This is users updated information
     * @param number $userId : This is user id
     */
    function editUser($userInfo, $userId)
    {
        $this->db->where('userId', $userId);
        $this->db->update('tbl_users', $userInfo);

        return TRUE;
    }



    /**
     * This function is used to delete the user information
     * @param number $userId : This is user id
     * @return boolean $result : TRUE / FALSE
     */
    function deleteUser($userId, $userInfo)
    {
        $this->db->where('userId', $userId);
        $this->db->update('tbl_users', $userInfo);

        return $this->db->affected_rows();
    }


    /**
     * This function is used to match users password for change password
     * @param number $userId : This is user id
     */
    function matchOldPassword($userId, $oldPassword)
    {
        $this->db->select('userId, password');
        $this->db->where('userId', $userId);
        $this->db->where('isDeleted', 0);
        $query = $this->db->get('tbl_users');

        $user = $query->result();

        if (!empty($user)) {
            if (verifyHashedPassword($oldPassword, $user[0]->password)) {
                return $user;
            } else {
                return array();
            }
        } else {
            return array();
        }
    }

    /**
     * This function is used to change users password
     * @param number $userId : This is user id
     * @param array $userInfo : This is user updation info
     */
    function changePassword($userId, $userInfo)
    {
        $this->db->where('userId', $userId);
        $this->db->where('isDeleted', 0);
        $this->db->update('tbl_users', $userInfo);

        return $this->db->affected_rows();
    }
    function pendingListingCount($id = null)
    {
        $this->db->select('t1.id');
        $this->db->from('tbl_project t1');
        if ($id) {
            $this->db->join('tbl_employeeproject as t2', 't2.project_id = t1.id');
            $this->db->where('t2.member_id', $id);
        }
        $this->db->where('t1.status', 0);
        $this->db->where('t1.isDeleted', 0);
        $query = $this->db->get();

        $result = $query->result();
        return count($result);
    }
    function workingListingCount($id = null)
    {
        $this->db->select('t1.id');
        $this->db->from('tbl_project t1');
        if ($id) {
            $this->db->join('tbl_employeeproject as t2', 't2.project_id = t1.id');
            $this->db->where('t2.member_id', $id);
        }
        $this->db->where('t1.status', 1);
        $this->db->where('t1.isDeleted', 0);
        $query = $this->db->get();

        $result = $query->result();
        return count($result);
    }
    function finishListingCount($id = null)
    {
        $this->db->select('t1.id');
        $this->db->from('tbl_project t1');
        if ($id) {
            $this->db->join('tbl_employeeproject as t2', 't2.project_id = t1.id');
            $this->db->where('t2.member_id', $id);
        }
        $this->db->where('t1.status', 2);
        $this->db->where('t1.isDeleted', 0);
        $query = $this->db->get();

        $result = $query->result();
        return count($result);
    }
    function supportListingCount($id = null)
    {
        $this->db->select('t1.id');
        $this->db->from('tbl_project t1');
        if ($id) {
            $this->db->join('tbl_employeeproject as t2', 't2.project_id = t1.id');
            $this->db->where('t2.member_id', $id);
        }
        $this->db->where('t1.status', 3);
        $this->db->where('t1.isDeleted', 0);
        $query = $this->db->get();

        $result = $query->result();
        return count($result);
    }
    function workingListing($id = null)
    {

        $this->db->select('t1.*');
        $this->db->from('tbl_project t1');
        if ($id) {
            $this->db->join('tbl_employeeproject t2', 't2.project_id = t1.id');
            $this->db->where('t2.member_id', $id);
        }
        $this->db->where('t1.status', 1);
        $this->db->where('t1.isDeleted', 0);
        $this->db->order_by('id', 'desc');
        $query = $this->db->get();

        $result = $query->result();
        return $result;
    }
    function countchecklist_dev($id)
    {
        $this->db->select('t4.*');
        $this->db->from('tbl_project t1');
        $this->db->join('tbl_ins as t2', 't2.id_project = t1.id');
        $this->db->join('tbl_scope as t3', 't3.id_ins = t2.id');
        $this->db->join('tbl_checklist as t4', 't4.id_scope = t3.id');

        $this->db->where('t1.id', $id);
        $this->db->where('t4.status', 0);
        $query = $this->db->get();

        $result = $query->result();
        return count($result);
    }
    function countchecklist_test($id)
    {
        $this->db->select('t4.*');
        $this->db->from('tbl_project t1');
        $this->db->join('tbl_ins as t2', 't2.id_project = t1.id');
        $this->db->join('tbl_scope as t3', 't3.id_ins = t2.id');
        $this->db->join('tbl_checklist as t4', 't4.id_scope = t3.id');

        $this->db->where('t1.id', $id);
        $this->db->where('t4.status_test', 0);
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
		$this->db->where('t4.cus_check', 0);
        $query = $this->db->get();
        
        $result = $query->result();        
        return count($result);
	}
    function countissues_dev($id)
    {
        $this->db->select('t5.*');
        $this->db->from('tbl_project t1');
        $this->db->join('tbl_ins as t2', 't2.id_project = t1.id');
        $this->db->join('tbl_scope as t3', 't3.id_ins = t2.id');
        $this->db->join('tbl_checklist as t4', 't4.id_scope = t3.id');
        $this->db->join('tbl_issues as t5', 't5.checklist_id = t4.id');

        $this->db->where('t1.id', $id);
        $this->db->where('t5.status_dev', 0);
        $query = $this->db->get();

        $result = $query->result();
        return count($result);
    }
    function countissues_test($id)
    {
        $this->db->select('t5.*');
        $this->db->from('tbl_project t1');
        $this->db->join('tbl_ins as t2', 't2.id_project = t1.id');
        $this->db->join('tbl_scope as t3', 't3.id_ins = t2.id');
        $this->db->join('tbl_checklist as t4', 't4.id_scope = t3.id');
        $this->db->join('tbl_issues as t5', 't5.checklist_id = t4.id');

        $this->db->where('t1.id', $id);
        $this->db->where('t5.status_test', 0);
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
		$this->db->where('t5.status_cus', 0);
        $query = $this->db->get();
        
        $result = $query->result();        
        return count($result);
	}
    function supportListing( $id = null){
        $this->db->select('t1.*');
        $this->db->from('tbl_project t1');
        if ($id) {
            $this->db->join('tbl_employeeproject t2', 't2.project_id = t1.id');
            $this->db->where('t2.member_id', $id);
        }
        $this->db->where('t1.status', 3);
        $this->db->where('t1.isDeleted', 0);
        $this->db->order_by('id', 'desc');
        $query = $this->db->get();

        $result = $query->result();
        return $result;
    }
    function getcalendar($id=null){
        $this->db->select('t1.name,t1.backgroundColor,t1.borderColor,t1.textColor,t2.topic,t2.start_date,t2.end_date,t2.id');
        $this->db->from('tbl_project t1');
        $this->db->join('tbl_scope t2', 't2.id_project = t1.id');
        if ($id) {
            $this->db->join('tbl_employeeproject t3', 't3.project_id = t1.id');
            $this->db->where('t3.member_id', $id);
        }
        $this->db->where('t1.status !=', 2);
        $this->db->where('t1.status !=', 4);
        $this->db->where('t1.isDeleted', 0);
        $this->db->where('t2.isDeleted', 0);
        $query = $this->db->get();

        $result = $query->result_array();
        return $result;
    }
    function getcalendar_by_project($id){
        $this->db->select('t1.name,t1.backgroundColor,t1.borderColor,t1.textColor,t2.topic,t2.start_date,t2.end_date,t2.id');
        $this->db->from('tbl_project t1');
        $this->db->join('tbl_scope t2', 't2.id_project = t1.id');
        if ($id) {
            $this->db->where('t1.id', $id);
        }
        $this->db->where('t1.status !=', 2);
        $this->db->where('t1.status !=', 4);
        $this->db->where('t1.isDeleted', 0);
        $this->db->where('t2.isDeleted', 0);
        $query = $this->db->get();

        $result = $query->result_array();
        return $result;
    }
    function projectList($id = null)
    {
		if($id){
			$this->db->select('t1.*');
			$this->db->from('tbl_project t1');
			$this->db->join('tbl_employeeproject t2','t2.project_id = t1.id');
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
}
