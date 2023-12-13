<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : User (UserController)
 * User Class to control all user related operations.
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class User extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->isLoggedIn();
    }

    /**
     * This function used to load the first screen of the user
     */
    public function index()
    {
        // print_r($this->session->userdata('userId'));
        $this->load->model('project_model');
        if ($this->role == ROLE_SUPERADMIN || $this->role == ROLE_ADMIN ) {
            $data['countpending'] = $this->user_model->pendingListingCount();
            $data['countworking'] = $this->user_model->workingListingCount();
            $data['countfinish'] = $this->user_model->finishListingCount();
            $data['countsupport'] = $this->user_model->supportListingCount();
            $projectRecords = $this->project_model->projectList();
            $alarmproject = [];
            for ($i = 0; $i < count($projectRecords); $i++) {
                $alarm = $this->project_model->checkalarm($projectRecords[$i]->id);
                for ($a = 0; $a < count($alarm); $a++) {
                    $date = DateTime::createFromFormat('d/m/Y', $alarm[$a]->ins_col);
                    if (strtotime(date("Y-m-d")) >= strtotime($date->format('Y-m-d'))) {
                        $projectRecords[$i]->alarm = 2;
                        $projectRecords[$i]->ins_col = $alarm[$a]->ins_col;
                        array_push($alarmproject, $projectRecords[$i]);
                    } else if (strtotime(date("Y-m-d") . '+5 day') >= strtotime($date->format('Y-m-d'))) {
                        $projectRecords[$i]->alarm = 1;
                        $projectRecords[$i]->ins_col = $alarm[$a]->ins_col;
                        array_push($alarmproject, $projectRecords[$i]);
                    }
                }
            }
            $data['alarmproject'] = $alarmproject;
        } else if ($this->role ==ROLE_PROJECT_MANAGER || $this->role == ROLE_EMPLOYEE_DEV || $this->role == ROLE_EMPLOYEE_TESTER) {
            $data['countpending'] = $this->user_model->pendingListingCount($this->vendorId);
            $data['countworking'] = $this->user_model->workingListingCount($this->vendorId);
            $data['countfinish'] = $this->user_model->finishListingCount($this->vendorId);
            $data['countsupport'] = $this->user_model->supportListingCount($this->vendorId);
            $working = $this->user_model->workingListing($this->vendorId);
            for ($i = 0; $i < count($working); $i++) {
                $working[$i]->checklist_dev = 0;
                $working[$i]->issues_dev = 0;
                $working[$i]->checklist_test = 0;
                $working[$i]->issues_test = 0;
                if ($this->role == ROLE_EMPLOYEE_DEV) {
                    $working[$i]->checklist_dev = $this->user_model->countchecklist_dev($working[$i]->id);
                    $working[$i]->issues_dev = $this->user_model->countissues_dev($working[$i]->id);
                } else if ($this->role == ROLE_EMPLOYEE_TESTER) {
                    $working[$i]->checklist_test = $this->user_model->countchecklist_test($working[$i]->id);
                    $working[$i]->issues_test = $this->user_model->countissues_test($working[$i]->id);
                }
            }
            $data['working'] = $working;
            $support = $this->user_model->supportListing($this->vendorId);
            for ($i = 0; $i < count($support); $i++) {
                $support[$i]->issues_dev = 0;
                $support[$i]->issues_test = 0;
                if ($this->role == ROLE_EMPLOYEE_DEV) {
                    $support[$i]->issues_dev = $this->user_model->countissues_dev($support[$i]->id);
                } else if ($this->role == ROLE_EMPLOYEE_TESTER) {
                    $support[$i]->issues_test = $this->user_model->countissues_test($support[$i]->id);
                }
            }
            $data['support'] = $support;
        } else if ($this->role == ROLE_CUSTOMER) {
            $project = $this->project_model->projectList($this->vendorId);
            $alarmproject = [];
            for ($i = 0; $i < count($project); $i++) {
                $project[$i]->checklist_cus = $this->user_model->countchecklist_cus($project[$i]->id);
                $project[$i]->issues_cus = $this->user_model->countissues_cus($project[$i]->id);
                $alarm = $this->project_model->checkalarm($project[$i]->id);
                for ($a = 0; $a < count($alarm); $a++) {
                    $date = DateTime::createFromFormat('d/m/Y', $alarm[$a]->ins_col);
                    if (strtotime(date("Y-m-d")) >= strtotime($date->format('Y-m-d'))) {
                        $project[$i]->alarm = 2;
                        $project[$i]->ins_col = $alarm[$a]->ins_col;
                        array_push($alarmproject, $project[$i]);
                    } else if (strtotime(date("Y-m-d") . '+5 day') >= strtotime($date->format('Y-m-d'))) {
                        $project[$i]->alarm = 1;
                        $project[$i]->ins_col = $alarm[$a]->ins_col;
                        array_push($alarmproject, $project[$i]);
                    }
                }
            }
            $data['alarmproject'] = $alarmproject;
            $data['project'] = $project;
        }
        $this->loadViews("summary/index", $this->global, $data, NULL);
    }
    function calendar($id=null){
        $this->load->model('project_model');
        if ($this->role == ROLE_SUPERADMIN || $this->role == ROLE_ADMIN || $this->role == ROLE_PROJECT_MANAGER) {
            $data['calender'] =  $this->user_model->getcalendar();
            $data['project'] = $this->project_model->projectList();
        } else if ($this->role == ROLE_EMPLOYEE_DEV || $this->role == ROLE_EMPLOYEE_TESTER) {
            $data['calender'] =  $this->user_model->getcalendar($id);
            $data['project'] = $this->user_model->projectList($id);
        }
        $this->loadViews("dashboard", $this->global, $data, NULL);
    }
    function reloadcalender(){
        $id = $this->input->post('id');
        $calender =  $this->user_model->getcalendar_by_project($id);
        echo json_encode($calender);
    }
    function editCalender(){
        $id = $this->input->post('id');
        $start_date = $this->input->post('start_date');
        $end_date = $this->input->post('end_date');
        $this->load->model('scope_model');
        $this->load->model('log_model');
        if($id){
            $data = array(
                'start_date' => $start_date,
                'end_date' => $end_date,
                'updatedBy' => $this->vendorId,
                'updatedDtm' => date('Y-m-d H:i:s')
            );
            $this->log_model->scope_log($data,1,$this->vendorId);
            $result = $this->scope_model->editScope($data, $id);
            if($result > 0){
                $response['status'] = true;
            }else{
                $response['status'] = false;
                $response['error'] = "edit false";
            }
        }else{
            $response['status'] = false;
            $response['error'] = "no id";
        }
        echo json_encode($response);
    }
    /**
     * This function is used to load the user list
     */

    function userListing()
    {
        if ($this->isAdmin() == TRUE) {
            $this->loadThis();
        } else {


            $this->load->model('user_model');
            $searchText = $this->input->post('searchText');
            $data['searchText'] = $searchText;

            $this->load->library('pagination');
            $count = $this->user_model->userListingCount($searchText);
            $returns = $this->paginationCompress("userListing/", $count, 15);

            $data['userRecords'] = $this->user_model->userListing($searchText, $returns["page"], $returns["segment"]);
            // print_r($data['userRecords'] );
            $this->global['pageTitle'] = 'จัดการผู้ใช้งานแอพ';

            $this->loadViews("users", $this->global, $data, NULL);
        }
    }

    /**
     * This function is used to load the add new form
     */
    function addNew()
    {
        if ($this->isAdmin() == TRUE) {
            $this->loadThis();
        } else {
            $this->load->model('user_model');
            $data['roles'] = $this->user_model->getUserRoles();

            $this->global['pageTitle'] = 'เพิ่มผู้ใช้งานแอพ';
            $this->loadViews("addNew", $this->global, $data, NULL);
        }
    }

    /**
     * This function is used to check whether email already exist or not
     */
    function checkEmailExists()
    {
        $userId = $this->input->post("userId");
        $email = $this->input->post("email");

        if (empty($userId)) {
            $result = $this->user_model->checkEmailExists($email);
        } else {
            $result = $this->user_model->checkEmailExists($email, $userId);
        }

        if (empty($result)) {
            echo "true";
        } else {
            echo "false";
        }
    }

    /**
     * This function is used to add new user to the system
     */
    function addNewUser()
    {
        if ($this->isAdmin() == TRUE) {
            $this->loadThis();
        } else {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('fname', 'Full Name', 'trim|required|max_length[128]|xss_clean');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|xss_clean|max_length[128]');
            $this->form_validation->set_rules('password', 'Password', 'required');
            $this->form_validation->set_rules('cpassword', 'Confirm Password', 'trim|required|matches[password]');
            $this->form_validation->set_rules('roleId', 'Role', 'trim|required|numeric');
            $this->form_validation->set_rules('mobile', 'Mobile Number', 'required|min_length[10]|xss_clean');
            $this->form_validation->set_rules('code', 'Code', 'trim|required|max_length[128]|xss_clean');

            if ($this->form_validation->run() == FALSE) {
                $this->addNew();
            } else {
                $name = $this->input->post('fname');
                $email = $this->input->post('email');
                $password = $this->input->post('password');
                $roleId = $this->input->post('roleId');
                $mobile = $this->input->post('mobile');
                $code = $this->input->post('code');
                $address = $this->input->post('address');
                $taxid = $this->input->post('taxid');
                $userInfo = array(
                    'email' => $email, 'password' => getHashedPassword($password), 'roleId' => $roleId, 'name' => $name, 'address' => $address, 'taxid' => $taxid,
                    'mobile' => $mobile, 'code' => $code, 'createdBy' => $this->vendorId, 'createdDtm' => date('Y-m-d H:i:s')
                );

                $this->load->model('user_model');
                $result = $this->user_model->addNewUser($userInfo);

                if ($result > 0) {
                    $this->session->set_flashdata('success', 'New User created successfully');
                } else {
                    $this->session->set_flashdata('error', 'User creation failed');
                }

                redirect('addNew');
            }
        }
    }


    /**
     * This function is used load user edit information
     * @param number $userId : Optional : This is user id
     */
    function editOld($userId = NULL)
    {
        if ($this->isAdmin() == TRUE || $userId == 1) {
            $this->loadThis();
        } else {
            if ($userId == null) {
                redirect('userListing');
            }

            $data['roles'] = $this->user_model->getUserRoles();
            $data['userInfo'] = $this->user_model->getUserInfo($userId);


            $this->global['pageTitle'] = 'แก้ไขผู้ใช้งานแอพ';

            $this->loadViews("editOld", $this->global, $data, NULL);
        }
    }


    /**
     * This function is used to edit the user information
     */
    function editUser()
    {
        if ($this->isAdmin() == TRUE) {
            $this->loadThis();
        } else {
            $this->load->library('form_validation');

            $userId = $this->input->post('userId');

            $this->form_validation->set_rules('fname', 'Full Name', 'trim|required|max_length[128]|xss_clean');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|xss_clean|max_length[128]');
            $this->form_validation->set_rules('password', 'Password', 'matches[cpassword]');
            $this->form_validation->set_rules('cpassword', 'Confirm Password', 'matches[password]');
            $this->form_validation->set_rules('roleId', 'Role', 'trim|required|numeric');
            $this->form_validation->set_rules('mobile', 'Mobile Number', 'required|min_length[10]|xss_clean');
            $this->form_validation->set_rules('code', 'Code', 'trim|required|max_length[128]|xss_clean');
            if ($this->form_validation->run() == FALSE) {
                $this->editOld($userId);
            } else {
                // $name = ucwords(strtolower($this->input->post('fname')));
                $name = $this->input->post('fname');
                $email = $this->input->post('email');
                $password = $this->input->post('password');
                $roleId = $this->input->post('roleId');
                $mobile = $this->input->post('mobile');
                $code = $this->input->post('code');
                $address = $this->input->post('address');
                $taxid = $this->input->post('taxid');

                $userInfo = array();

                if (empty($password)) {
                    $userInfo = array(
                        'email' => $email, 'name' => $name, 'mobile' => $mobile, 'code' => $code, 'address' => $address, 'taxid' => $taxid,
                        'updatedBy' => $this->vendorId, 'roleId' => $roleId, 'updatedDtm' => date('Y-m-d H:i:s')
                    );
                } else {
                    $userInfo = array(
                        'email' => $email, 'password' => getHashedPassword($password),
                        // 'name'=>ucwords($name), 
                        'mobile' => $mobile, 'code' => $code,
                        'name' => $name,
                        'roleId' => $roleId,
                        'address' => $address,
                        'taxid' => $taxid,
                        'updatedBy' => $this->vendorId,
                        'updatedDtm' => date('Y-m-d H:i:s')
                    );
                }
                //   $userInfo["affter_money"] = $affter_money;

                $result = $this->user_model->editUser($userInfo, $userId);

                if ($result == true) {
                    $this->session->set_flashdata('success', 'User updated successfully');
                } else {
                    $this->session->set_flashdata('error', 'User updation failed');
                }

                redirect('userListing');
            }
        }
    }


    /**
     * This function is used to delete the user using userId
     * @return boolean $result : TRUE / FALSE
     */
    function deleteUser()
    {
        if ($this->isAdmin() == TRUE) {
            echo (json_encode(array('status' => 'access')));
        } else {
            $userId = $this->input->post('userId');
            $userInfo = array('isDeleted' => 1, 'updatedBy' => $this->vendorId, 'updatedDtm' => date('Y-m-d H:i:s'));

            $result = $this->user_model->deleteUser($userId, $userInfo);

            // if ($result > 0) { echo(json_encode(array('status'=>TRUE))); }
            // else { echo(json_encode(array('status'=>FALSE))); }
            if ($result > 0) {
                $this->session->set_flashdata('success', 'Delete User successfully');
            } else {
                $this->session->set_flashdata('error', 'Delete User failed');
            }
            redirect('userListing', 'refresh');
        }
    }

    /**
     * This function is used to load the change password screen
     */
    function loadChangePass()
    {
        $this->global['pageTitle'] = 'เปลี่ยนรหัสผ่าน';

        $this->loadViews("changePassword", $this->global, NULL, NULL);
    }


    /**
     * This function is used to change the password of the user
     */
    function changePassword()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('oldPassword', 'Old password', 'required|max_length[20]');
        $this->form_validation->set_rules('newPassword', 'New password', 'required|max_length[20]');
        $this->form_validation->set_rules('cNewPassword', 'Confirm new password', 'required|matches[newPassword]|max_length[20]');

        if ($this->form_validation->run() == FALSE) {
            $this->loadChangePass();
        } else {
            $oldPassword = $this->input->post('oldPassword');
            $newPassword = $this->input->post('newPassword');

            $resultPas = $this->user_model->matchOldPassword($this->vendorId, $oldPassword);

            if (empty($resultPas)) {
                $this->session->set_flashdata('nomatch', 'Your old password not correct');
                redirect('loadChangePass');
            } else {
                $usersData = array(
                    'password' => getHashedPassword($newPassword), 'updatedBy' => $this->vendorId,
                    'updatedDtm' => date('Y-m-d H:i:s')
                );

                $result = $this->user_model->changePassword($this->vendorId, $usersData);

                if ($result > 0) {
                    $this->session->set_flashdata('success', 'Password updation successful');
                } else {
                    $this->session->set_flashdata('error', 'Password updation failed');
                }

                redirect('loadChangePass');
            }
        }
    }

    function pageNotFound()
    {
        $this->global['pageTitle'] = '404 - Page Not Found';

        $this->loadViews("404", $this->global, NULL, NULL);
    }
    public function testemail()
    {
        $this->sendmail("sarawutpromdee@gmail.com", "test");
    }
    public function sendmail($email, $message)
    {
        $config = array(
            'protocol' => 'SMTP',
            'smtp_host' => 'cpanel13wh.bkk1.cloud.z.com',
            'smtp_port' => 465,
            'smtp_user' => 'support@otobot65.com',
            'smtp_pass' => '+)bt1J1bVzV@',
            'mailtype'  => 'html',
            'charset'   => 'iso-8859-1'
        );
        $this->load->library('email', $config);
        $this->email->from('support@otobot65.com');
        $this->email->to($email);
        $this->email->subject('Otobot');
        $this->email->message($message);
        $result = $this->email->send();
        // print_r($result);
    }
}
