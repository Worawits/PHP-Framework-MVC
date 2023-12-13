<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class Scope_project extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('scope_model');
        $this->load->model('user_model');
        $this->load->model('log_model');
        $this->load->model('ins_project_model');
        $this->isLoggedIn();
    }

    public function index()
    {
        // print_r($this->session->userdata('userId'));

        $data['countuser'] = $this->user_model->userListingCount();
        $this->loadViews("dashboard", $this->global, $data, NULL);
    }

    function scope_project($id)
    {
        // if ($this->isAdmin() == TRUE) {
        //     $this->loadThis();
        // } else {
            $data['id'] = $id;       
            $scopeRecords = $this->scope_model->scopeList($id);
            for($i=0;$i<count($scopeRecords);$i++){
                $scopeRecords[$i]->checklist = $this->scope_model->countchecklist($scopeRecords[$i]->id);
                $scopeRecords[$i]->checklist_dev = $this->scope_model->countchecklist_dev($scopeRecords[$i]->id);
                $scopeRecords[$i]->checklist_test = $this->scope_model->countchecklist_test($scopeRecords[$i]->id);
                $scopeRecords[$i]->checklist_cus = $this->scope_model->countchecklist_cus($scopeRecords[$i]->id);
                $scopeRecords[$i]->issues = $this->scope_model->countissues($scopeRecords[$i]->id);
                $scopeRecords[$i]->issues_dev = $this->scope_model->countissues_dev($scopeRecords[$i]->id);
                $scopeRecords[$i]->issues_test = $this->scope_model->countissues_test($scopeRecords[$i]->id);
                $scopeRecords[$i]->issues_cus = $this->scope_model->countissues_cus($scopeRecords[$i]->id);
            }
            $data['scopeRecords'] = $scopeRecords;
            $data['ins_id'] = $this->scope_model->getins_idbyid($id);
            // print_r($data['userRecords'] );
            $this->global['pageTitle'] = 'Scope';

            $this->loadViews("scope/index", $this->global, $data, NULL);
        // }
    }

    function addNewScope()
    {
        $this->load->library('form_validation');

        $id_ins = $this->input->post('id');
        $ins = $this->ins_project_model->getData($id_ins);

        $this->form_validation->set_rules('topic', 'Scope Topic', 'trim|required|xss_clean');
        $this->form_validation->set_rules('start_date', 'Scope Start Date', 'trim|required|xss_clean');
        $this->form_validation->set_rules('end_date', 'Scope End Date', 'trim|required|xss_clean');
        // $c_id = $this->input->post('c_id');
        if ($this->form_validation->run() == FALSE) {
            $this->scope_project($id_ins);
        } else {
            $topic = $this->input->post('topic');
            $start_date = $this->input->post('start_date');
            $end_date = $this->input->post('end_date');
            $data = array(
                'id_project'=>$ins['id_project'],
                'id_ins'=>$id_ins,
                'topic' => $topic,
                'start_date' => $start_date,
                'end_date' => $end_date,
                'createdBy' => $this->vendorId,
                'createdDtm' => date('Y-m-d H:i:s')
            );
            $result = $this->scope_model->addNewScope($data);

            $this->log_model->scope_log($data,0,$this->vendorId);
            if ($result > 0) {
                if (!empty($_FILES['image']['name'])) {
                    $this->upload_image($result);
                }
                $this->session->set_flashdata('success', 'New Scope created successfully');
            } else {
                $this->session->set_flashdata('error', 'Scope creation failed');
            }

            redirect('scope_project/'.$id_ins, 'refresh');
        }
    }

    function getScopeById()
    {
        $id = $this->input->post('id');
        if ($id) {
            $data = $this->scope_model->getData($id);
            echo json_encode($data);
        }

        return false;
    }

    function editOldScope()
    {

        $this->load->library('form_validation');

        $id = $this->input->post('edit_id');
        $id_ins = $this->input->post('edit_id_ins');

        $this->form_validation->set_rules('edit_topic', 'Scope Topic', 'trim|required|xss_clean');
        $this->form_validation->set_rules('edit_start_date', 'Scope Start Date', 'trim|required|xss_clean');
        $this->form_validation->set_rules('edit_end_date', 'Scope End Date', 'trim|required|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            $this->activity();
        } else {
            $topic = $this->input->post('edit_topic');
            $start_date = $this->input->post('edit_start_date');
            $end_date = $this->input->post('edit_end_date');

                $data = array(
                    'topic' => $topic,
                    'start_date' => $start_date,
                    'end_date' => $end_date,
                    'updatedBy' => $this->vendorId,
                    'updatedDtm' => date('Y-m-d H:i:s')
                );
                $result = $this->scope_model->editScope($data, $id);

                if ($result == true) {
                    if (!empty($_FILES['edit_image']['name'])) {
                        $this->upload_image_edit($id);
                    }
                    $this->log_model->scope_log($data,1,$this->vendorId);
                    $this->session->set_flashdata('success', 'Scope updated successfully');
                } else {
                    $this->session->set_flashdata('error', 'Scope updation failed');
                }

                redirect('scope_project/'.$id_ins, 'refresh');
         
        }
    }

    function deleteScope()
    {
        // if ($this->isAdmin() == TRUE) {
        //     echo (json_encode(array('status' => 'access')));
        // } else {
            $id = $this->input->post('delete_id');
            $id_ins = $this->input->post('delete_id_ins');
            $data = array('isDeleted' => 1, 'updatedBy' => $this->vendorId, 'updatedDtm' => date('Y-m-d H:i:s'));

            $result = $this->scope_model->deleteScope($id, $data);
            $this->log_model->scope_log($data,2,$this->vendorId);
            // if ($result > 0) { echo(json_encode(array('status'=>TRUE))); }
            // else { echo(json_encode(array('status'=>FALSE))); }
            if ($result > 0) {
                $this->session->set_flashdata('success', 'Delete Scope successfully');
            } else {
                $this->session->set_flashdata('error', 'Delete Scope failed');
            }
            redirect('scope_project/'.$id_ins, 'refresh');
        // }
    }
    public function upload_image($scope_id)
    {
    
		$response = array();
        $config['upload_path'] = 'image/scope';
        $config['file_name'] =  uniqid().$scope_id;
        $config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = '50000';
        // $config['max_size'] = '5000';

        // $config['max_width']  = '1024';s
        // $config['max_height']  = '768';

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('image')) {
            $error = $this->upload->display_errors();
			$response['success'] = false;
			$response['messages'] = 'พบข้อผิดพลาดในการบันทึกข้อมูลกรุณาติดต่อแอดมิน '.$error;			
        } else {
            $data = array('upload_data' => $this->upload->data());
            $type = explode('.', $_FILES['image']['name']);
            $type = $type[count($type) - 1];
			$image_name=$config['file_name'] . '.' . $type;
			$image_url=base_url('image/scope/'.$image_name);

       
            $scope_info = array(
				'image'=> $image_url
              );
            
        
			  $update = $this->scope_model->editScope($scope_info, $scope_id);

			  $response['success'] = true;
			  $response['messages'] = 'บันทึกเรียบร้อย';
        }
		// echo json_encode($response);
    }
    public function upload_image_edit($scope_id)
    {
    
		$response = array();
        $config['upload_path'] = 'image/scope';
        $config['file_name'] =  uniqid().$scope_id;
        $config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = '50000';
        // $config['max_size'] = '5000';

        // $config['max_width']  = '1024';s
        // $config['max_height']  = '768';

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('edit_image')) {
            $error = $this->upload->display_errors();
			$response['success'] = false;
			$response['messages'] = 'พบข้อผิดพลาดในการบันทึกข้อมูลกรุณาติดต่อแอดมิน '.$error;			
        } else {
            $data = array('upload_data' => $this->upload->data());
            $type = explode('.', $_FILES['edit_image']['name']);
            $type = $type[count($type) - 1];
			$image_name=$config['file_name'] . '.' . $type;
			$image_url=base_url('image/scope/'.$image_name);

       
            $scope_info = array(
				'image'=> $image_url
              );
            
        
			  $update = $this->scope_model->editScope($scope_info, $scope_id);

			  $response['success'] = true;
			  $response['messages'] = 'บันทึกเรียบร้อย';
        }
		// echo json_encode($response);
    }
}
