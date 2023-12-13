<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class Issues extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('issues_model');
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
    function issues($id){
        // if($this->isAdmin() == TRUE)
        // {
        //     $this->loadThis();
        // }
        // else
        // {
            // $data['name'] = $this->issues_model->project_name($id);
            $data['issuesRecords'] = $this->issues_model->issuesList($id);
            $data['id'] = $id;
            $data['checklist_id'] = $this->issues_model->getchecklist_idbyid($id);
            $data['scope_id'] = $this->issues_model->getscope_idbyid($data['checklist_id']['id_scope']);
            $data['ins_id'] = $this->issues_model->getins_idbyid($data['scope_id']['id_ins']);
            $this->global['pageTitle'] = 'ปัญหา';
            
            $this->loadViews("issues/index", $this->global, $data, NULL);
        // }
    }
    function addNewIssues(){
        // if($this->isAdmin() == TRUE)
        // {
        //     $this->loadThis();
        // }
        // else
        // {
            $id = $this->input->post('id');
            $this->load->library('form_validation');
            
            $this->form_validation->set_rules('topic','Topic','trim|required|xss_clean');
            $this->form_validation->set_rules('important','Important','trim|required|xss_clean');

            if($this->form_validation->run() == FALSE)
            {
                $this->issues($id);
            }
            else
            {
                $topic = $this->input->post('topic');
                $important = $this->input->post('important');

             

                $data = array(
                    'checklist_id'=>$id,
                    'topic'=>$topic,
                    'date'=>date('Y-m-d'),
                    'important'=>$important,
                    'createdBy'=>$this->vendorId,
                    'createdDtm'=>date('Y-m-d H:i:s')
                );
                $this->log_model->Issues_log($data,0,$this->vendorId);
                $result = $this->issues_model->addNewIssues($data);
                    
                if($result > 0)
                {
                    $this->session->set_flashdata('success', 'New Issues created successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Issues creation failed');
                }
                    
                redirect('issues/'.$id);
            }
        // }
    }
    function editOldIssues(){
       
            $this->load->library('form_validation');
            
            $id = $this->input->post('edit_id');
            $id_Issues = $this->input->post('id_Issues');

            $this->form_validation->set_rules('edit_topic','Topic','trim|required|xss_clean');
            $this->form_validation->set_rules('edit_important','Important','trim|required|xss_clean');

            if($this->form_validation->run() == FALSE)
            {
                $this->issues($id_Issues);
            }
            else
            {
                $topic = $this->input->post('edit_topic');
                $date = $this->input->post('edit_date');
                $status_dev = $this->input->post('edit_status_dev');
                $status = $this->input->post('edit_status');
                $status_cus = $this->input->post('edit_status_cus');
                $date_success = $this->input->post('edit_date_success');
                $date_cus = $this->input->post('edit_date_cus');

                $data = array(
                    'topic'=>$topic,
                    'date'=>$date, 
                    'status_dev'=>$status_dev, 
                    'status'=>$status, 
                    'status_cus'=>$status_cus, 
                    'date_success'=>$date_success, 
                    'date_cus'=>$date_cus, 
                    'updatedBy'=>$this->vendorId, 
                    'updatedDtm'=>date('Y-m-d H:i:s')
                );
                $this->log_model->Issues_log($data,1,$this->vendorId);
                $result = $this->issues_model->editOldIssues($data, $id);
                
                if($result == true)
                {
                    $this->session->set_flashdata('success', 'Issues updated successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Issues updation failed');
                }
                
                redirect('issues/'.$id_Issues);

            }
        
    }
    function getIssuesById(){
        $id = $this->input->post('id');
		if($id) {
			$data = $this->issues_model->getData($id);
			echo json_encode($data);
		}

		return false;
    }
    function deleteIssues()
    {
         
            $id = $this->input->post('delete_id');
            $delete_id_issues = $this->input->post('delete_id_issues');
            $data = array('isDeleted'=>1,'updatedBy'=>$this->vendorId, 'updatedDtm'=>date('Y-m-d H:i:s'));
            $this->log_model->Issues_log($data,2,$this->vendorId);
            $result = $this->issues_model->deleteIssues($id, $data);
            
            // if ($result > 0) { echo(json_encode(array('status'=>TRUE))); }
            // else { echo(json_encode(array('status'=>FALSE))); }
            if($result > 0)
            {
                $this->session->set_flashdata('success', 'Delete Issues successfully');
            }
            else
            {
                $this->session->set_flashdata('error', 'Delete Issues failed');
            }
            redirect('issues/'.$delete_id_issues,'refresh');
        
    }
    function summitdevissues(){
        $id = $this->input->post('id');
        $data = array(
            'status_dev'=>1,
            'updatedBy'=>$this->vendorId, 
            'updatedDtm'=>date('Y-m-d H:i:s')
        );
        $result = $this->issues_model->editOldIssues($data,$id);

        if($result > 0)
        {
            $response = true;
            $this->session->set_flashdata('success', 'Summit Issues successfully');
        }
        else
        {
            $response = false;
            $this->session->set_flashdata('error', 'Summit Issues failed');
        }
        echo json_encode($response);
    }
    function summittestissues(){
        $id = $this->input->post('id');
        $data = array(
            'status_test'=>1,
            'date_success' => date('Y-m-d'),
            'updatedBy'=>$this->vendorId, 
            'updatedDtm'=>date('Y-m-d H:i:s')
        );
        $result = $this->issues_model->editOldIssues($data,$id);

        if($result > 0)
        {
            $response = true;
            $this->session->set_flashdata('success', 'Summit Issues successfully');
        }
        else
        {
            $response = false;
            $this->session->set_flashdata('error', 'Summit Issues failed');
        }
        echo json_encode($response);
    }
    function summitcusissues(){
        $id = $this->input->post('id');
        $data = array(
            'status_cus'=>1,
            'date_cus' => date('Y-m-d'),
            'updatedBy'=>$this->vendorId, 
            'updatedDtm'=>date('Y-m-d H:i:s')
        );
        $result = $this->issues_model->editOldIssues($data,$id);

        if($result > 0)
        {
            $response = true;
            $this->session->set_flashdata('success', 'Summit Issues successfully');
        }
        else
        {
            $response = false;
            $this->session->set_flashdata('error', 'Summit Issues failed');
        }
        echo json_encode($response);
    }
}
