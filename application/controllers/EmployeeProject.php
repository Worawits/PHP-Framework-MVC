<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class EmployeeProject extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('employeeProject_model');
        $this->load->model('log_model');
        $this->load->model('user_model');
        $this->isLoggedIn();   
    }

    public function index()
    {
        // print_r($this->session->userdata('userId'));
        $data['countuser'] = $this->user_model->userListingCount();            
        $this->loadViews("dashboard", $this->global, $data , NULL);
    }
    function employeeProject($id){
        $data['projectRecords'] =$this->employeeProject_model->projectList($id);
        $data['name'] = $this->employeeProject_model->getmember();
        $data['id'] = $id;
        $this->loadViews("employeeProject/index", $this->global, $data , NULL);
    }
    function addNewemployeeProject(){
        // if($this->isAdmin() == TRUE)
        // {
        //     $this->loadThis();
        // }
        // else
        // {
            $id = $this->input->post('add_id');
            $this->load->library('form_validation');
            
            $this->form_validation->set_rules('name','Employee Name','trim|required|xss_clean|max_length[128]');

            if($this->form_validation->run() == FALSE)
            {
                $this->employeeProject($id);
            }
            else
            {
                $name = $this->input->post('name');         

                $data = array(
                    'member_id'=>$name,
                    'project_id'=>$id,
                );
                $result = $this->employeeProject_model->addNewProject($data);
                    
                if($result > 0)
                {
                    $this->session->set_flashdata('success', 'New Employee Project created successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Employee Project creation failed');
                }
                    
                redirect('employeeProject/'.$id);
            }
        // }
    }
    function deleteemployeeProject(){
        // if($this->isAdmin() == TRUE)
        // {
        //     echo(json_encode(array('status'=>'access')));
        // }
        // else
        // {   
            $id = $this->input->post('id');
            $delete_id = $this->input->post('delete_id');
            $result = $this->employeeProject_model->deleteemployeeProject($id);
            
            // if ($result > 0) { echo(json_encode(array('status'=>TRUE))); }
            // else { echo(json_encode(array('status'=>FALSE))); }
            if($id > 0)
            {
                $this->session->set_flashdata('success', 'Delete Employee Project successfully');
            }
            else
            {
                $this->session->set_flashdata('error', 'Delete Employee Project failed');
            }
            redirect('employeeProject/'.$delete_id,'refresh');
        }
    // }
}