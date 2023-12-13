<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class Ins_project extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ins_project_model');
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
    function ins_project($id){
        // if($this->isAdmin() == TRUE)
        // {
        //     $this->loadThis();
        // }
        // else
        // {
            $data['name'] = $this->ins_project_model->project_name($id);
            $data['insRecords'] = $this->ins_project_model->insList($id);
            $data['id'] = $id;
            $this->global['pageTitle'] = 'งวด';
            
            $this->loadViews("ins/index", $this->global, $data, NULL);
        // }
    }
    function addNewIns(){
    
            $id = $this->input->post('id');
            $this->load->library('form_validation');
            
            $this->form_validation->set_rules('ins_num','Installment Number','trim|required|xss_clean');
            $this->form_validation->set_rules('ins_col','Installment Collect','trim|required|xss_clean');

            if($this->form_validation->run() == FALSE)
            {
                $this->ins_project($id);
            }
            else
            {
                $ins_num = $this->input->post('ins_num');
                $ins_col = $this->input->post('ins_col');

             

                $data = array(
                    'id_project'=>$id,
                    'ins_num'=>$ins_num,
                    'ins_col'=>$ins_col, 
                    'createdBy'=>$this->vendorId,
                    'createdDtm'=>date('Y-m-d H:i:s')
                );
                $this->log_model->ins_log($data,0,$this->vendorId);
                $result = $this->ins_project_model->addNewIns($data);
                    
                if($result > 0)
                {
                    $this->session->set_flashdata('success', 'New Installment created successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Installment creation failed');
                }
                    
                redirect('ins_project/'.$id);
            }
        
    }
    function editOldIns(){
    
            $this->load->library('form_validation');
            
            $id = $this->input->post('edit_id');
            $id_project = $this->input->post('id_project');

            $this->form_validation->set_rules('edit_ins_num','Installment Number','trim|required|xss_clean');
            $this->form_validation->set_rules('edit_ins_col','Installment Collect','trim|required|xss_clean');

            if($this->form_validation->run() == FALSE)
            {
                $this->ins_project($id_project);
            }
            else
            {
                $ins_num = $this->input->post('edit_ins_num');
                $ins_col = $this->input->post('edit_ins_col');
                $payment_status = $this->input->post('edit_payment_status');

                $data = array(
                    'ins_num'=>$ins_num,
                    'ins_col'=>$ins_col,
                    'payment_status'=>$payment_status,  
                    'updatedBy'=>$this->vendorId, 
                    'updatedDtm'=>date('Y-m-d H:i:s')
                );
                $this->log_model->ins_log($data,1,$this->vendorId);
                $result = $this->ins_project_model->editOldIns($data, $id);
                
                if($result == true)
                {
                    $this->session->set_flashdata('success', 'Installment updated successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Installment updation failed');
                }
                
                redirect('ins_project/'.$id_project);

            }
        
    }
    function getInsById(){
        $id = $this->input->post('id');
		if($id) {
			$data = $this->ins_project_model->getData($id);
			echo json_encode($data);
		}

		return false;
    }
    function deleteIns()
    {
       
            $id = $this->input->post('delete_id');
            $delete_id_project = $this->input->post('delete_id_project');
            $data = array('isDeleted'=>1,'updatedBy'=>$this->vendorId, 'updatedDtm'=>date('Y-m-d H:i:s'));
            $this->log_model->ins_log($data,2,$this->vendorId);
            $result = $this->ins_project_model->deleteIns($id, $data);
            
            // if ($result > 0) { echo(json_encode(array('status'=>TRUE))); }
            // else { echo(json_encode(array('status'=>FALSE))); }
            if($result > 0)
            {
                $this->session->set_flashdata('success', 'Delete Installment successfully');
            }
            else
            {
                $this->session->set_flashdata('error', 'Delete Installment failed');
            }
            redirect('ins_project/'.$delete_id_project,'refresh');
        
    }
}
?>