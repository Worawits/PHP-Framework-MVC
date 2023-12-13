<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class MemberProject extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('memberProject_model');
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
    function memberProject($id){
        $data['projectRecords'] =$this->memberProject_model->projectList($id);
        $data['name'] = $this->memberProject_model->getmember();
        $data['id'] = $id;
        $this->loadViews("memberProject/index", $this->global, $data , NULL);
    }
    function addNewmemberProject(){
        // if($this->isAdmin() == TRUE)
        // {
        //     $this->loadThis();
        // }
        // else
        // {
            $id = $this->input->post('add_id');
            $this->load->library('form_validation');
            
            $this->form_validation->set_rules('name','Member Name','trim|required|xss_clean|max_length[128]');

            if($this->form_validation->run() == FALSE)
            {
                $this->memberProject($id);
            }
            else
            {
                $name = $this->input->post('name');         

                $data = array(
                    'member_id'=>$name,
                    'project_id'=>$id,
                );
                $result = $this->memberProject_model->addNewProject($data);
                    
                if($result > 0)
                {
                    $this->session->set_flashdata('success', 'New Member Project created successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Member Project creation failed');
                }
                    
                redirect('memberProject/'.$id);
            }
        // }
    }
    function deletememberProject(){
        // if($this->isAdmin() == TRUE)
        // {
        //     echo(json_encode(array('status'=>'access')));
        // }
        // else
        // {   
            $id = $this->input->post('id');
            $delete_id = $this->input->post('delete_id');
            $result = $this->memberProject_model->deletememberProject($id);
            
            // if ($result > 0) { echo(json_encode(array('status'=>TRUE))); }
            // else { echo(json_encode(array('status'=>FALSE))); }
            if($id > 0)
            {
                $this->session->set_flashdata('success', 'Delete Member Project successfully');
            }
            else
            {
                $this->session->set_flashdata('error', 'Delete Member Project failed');
            }
            redirect('memberProject/'.$delete_id,'refresh');
        }
    // }
}