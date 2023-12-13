<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class Checklist extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('checklist_model');
        $this->load->model('user_model');
        $this->isLoggedIn();
    }

    public function index()
    {
        // print_r($this->session->userdata('userId'));

        $data['countuser'] = $this->user_model->userListingCount();
        $this->loadViews("dashboard", $this->global, $data, NULL);
    }

    function checklist($id)
    {
        // if($this->isAdmin() == TRUE)
        // {
        //     $this->loadThis();
        // }
        // else
        // {   
        $data['id'] = $id;
        $checklistRecords = $this->checklist_model->checklistList($id);
        if ($checklistRecords) {
            foreach ($checklistRecords as $cR) {
                if ($cR->check != null) {
                    $check = $this->checklist_model->checklistid($cR->check);
                    $cR->name = $check[0]->name;
                } else {
                    $cR->name = '';
                }
                $cR->issues = $this->checklist_model->countissues($cR->id);
                $cR->issues_dev = $this->checklist_model->countissues_dev($cR->id);
                $cR->issues_test = $this->checklist_model->countissues_test($cR->id);
                $cR->issues_cus = $this->checklist_model->countissues_cus($cR->id);
            }
        }
        $data['checklistRecords'] = $checklistRecords;
        $data['scope_id'] = $this->checklist_model->getscope_idbyid($id);
        $data['ins_id'] = $this->checklist_model->getins_idbyid($data['scope_id']['id_ins']);
        // print_r($data['userRecords'] );
        $this->global['pageTitle'] = 'Checklist';

        $this->loadViews("checklist/index", $this->global, $data, NULL);
        // }
    }

    function addNewChecklist()
    {
        $id = $this->input->post('id');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('topic', 'Checklist topic', 'trim|required|xss_clean');
        // $a_id = $this->input->post('a_id');
        if ($this->form_validation->run() == FALSE) {
            $this->checklist($id);
        } else {
            $topic = $this->input->post('topic');
            $data = array(
                'id_scope' => $id,
                'topic' => $topic,
                'createdBy' => $this->vendorId,
                'createdDtm' => date('Y-m-d H:i:s')
            );
            $result = $this->checklist_model->addNewChecklist($data);

            if ($result > 0) {
                $this->session->set_flashdata('success', 'New Checklist created successfully');
            } else {
                $this->session->set_flashdata('error', 'Checklist creation failed');
            }

            redirect('checklist/' . $id, 'refresh');
        }
    }

    function getChecklistById()
    {
        $id = $this->input->post('id');
        if ($id) {
            $data = $this->checklist_model->getData($id);
            echo json_encode($data);
        }

        return false;
    }
    function Checklistdev()
    {
        $id = $this->input->post('id');
        if ($id) {
            $data = array(
                'status' => "1",
                'updatedBy' => $this->vendorId,
                'updatedDtm' => date('Y-m-d H:i:s')
            );
            $result = $this->checklist_model->editChecklist($data, $id);

            if ($result == true) {
                $response = true;
                $this->session->set_flashdata('success', 'Checklist updated successfully');
            } else {
                $response = false;
                $this->session->set_flashdata('error', 'Checklist updation failed');
            }
        }
        echo json_encode($response);
    }
    function ChecklistEm()
    {
        $id = $this->input->post('id');
        if ($id) {
            $data = array(
                'status_test' => "1",
                'date_check' => date('Y-m-d H:i:s'),
                'check' => $this->vendorId,
                'updatedBy' => $this->vendorId,
                'updatedDtm' => date('Y-m-d H:i:s')
            );
            $result = $this->checklist_model->editChecklist($data, $id);

            if ($result == true) {
                $response = true;
                $this->session->set_flashdata('success', 'Checklist updated successfully');
            } else {
                $response = false;
                $this->session->set_flashdata('error', 'Checklist updation failed');
            }
        }
        echo json_encode($response);
    }
    function ChecklistCus()
    {
        $id = $this->input->post('id');
        if ($id) {
            $data = array(
                'cus_check' => "1",
                'date_cus_check' => date('Y-m-d H:i:s'),
                'updatedBy' => $this->vendorId,
                'updatedDtm' => date('Y-m-d H:i:s')
            );
            $result = $this->checklist_model->editChecklist($data, $id);

            if ($result == true) {
                $response = true;
                $this->session->set_flashdata('success', 'Checklist updated successfully');
            } else {
                $response = false;
                $this->session->set_flashdata('error', 'Checklist updation failed');
            }
        }
        echo json_encode($response);
    }
    function editOldChecklist()
    {

        $this->load->library('form_validation');

        $id = $this->input->post('edit_id');
        $scope_id = $this->input->post('edit_scope_id');
        $this->form_validation->set_rules('edit_topic', 'Checklist Name', 'trim|required|xss_clean');
        // $a_id = $this->input->post('edit_a_id');
        if ($this->form_validation->run() == FALSE) {
            $this->checklist($scope_id);
        } else {
            $topic = $this->input->post('edit_topic');
            $data = array(
                'topic' => $topic,
                'updatedBy' => $this->vendorId,
                'updatedDtm' => date('Y-m-d H:i:s')
            );

            $result = $this->checklist_model->editChecklist($data, $id);

            if ($result == true) {
                $this->session->set_flashdata('success', 'Checklist updated successfully');
            } else {
                $this->session->set_flashdata('error', 'Checklist updation failed');
            }

            redirect('checklist/' . $scope_id, 'refresh');
        }
    }

    function deleteChecklist()
    {

        $delete_id = $this->input->post('delete_id');
        $scope_id = $this->input->post('scope_id');
        $data = array('isDeleted' => 1, 'updatedBy' => $this->vendorId, 'updatedDtm' => date('Y-m-d H:i:s'));

        $result = $this->checklist_model->deleteChecklist($delete_id, $data);

        // if ($result > 0) { echo(json_encode(array('status'=>TRUE))); }
        // else { echo(json_encode(array('status'=>FALSE))); }
        if ($result > 0) {
            $this->session->set_flashdata('success', 'Delete Checklist successfully');
        } else {
            $this->session->set_flashdata('error', 'Delete Checklist failed');
        }
        redirect('checklist/' . $scope_id, 'refresh');
    }
}
