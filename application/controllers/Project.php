<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class Project extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('project_model');
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
    function project()
    {
        // if($this->isAdmin() == TRUE)
        // {
        //     $this->loadThis();
        // }
        // else
        // {
            if($this->role == ROLE_CUSTOMER){
                $projectRecords = $this->project_model->projectList($this->vendorId);
                for($i=0;$i<count($projectRecords);$i++){
                    $projectRecords[$i]->checklist = $this->project_model->countchecklist($projectRecords[$i]->id);
                    $projectRecords[$i]->issues = $this->project_model->countissues($projectRecords[$i]->id);
                    $alarm = $this->project_model->checkalarm($projectRecords[$i]->id);
                    $projectRecords[$i]->alarm = 0;
                    for($a=0;$a<count($alarm);$a++){
                        $date = DateTime::createFromFormat('d/m/Y', $alarm[$a]->ins_col);
                        if(strtotime(date("Y-m-d"))>=strtotime($date->format('Y-m-d'))){
                            $projectRecords[$i]->alarm = 2;
                        }else if(strtotime(date("Y-m-d"))>=strtotime($date->modify('+5 day')->format('Y-m-d'))){
                            $projectRecords[$i]->alarm = 1;
                        }
                    }
                }
                $data['projectRecords'] = $projectRecords;
                // $data['alarm'] = 0;
                $this->global['pageTitle'] = 'โปรเจค';
                // echo json_encode($data['projectRecords']);
                $this->loadViews("project/index", $this->global, $data, NULL);
            }else{
                $projectRecords = $this->project_model->projectList();
                $data['name'] = $this->project_model->getmember();
                for($i=0;$i<count($projectRecords);$i++){
                    $projectRecords[$i]->checklist = $this->project_model->countchecklist($projectRecords[$i]->id);
                    $projectRecords[$i]->checklist_dev = $this->project_model->countchecklist_dev($projectRecords[$i]->id);
                    $projectRecords[$i]->checklist_test = $this->project_model->countchecklist_test($projectRecords[$i]->id);
                    $projectRecords[$i]->checklist_cus = $this->project_model->countchecklist_cus($projectRecords[$i]->id);
                    $projectRecords[$i]->issues = $this->project_model->countissues($projectRecords[$i]->id);
                    $projectRecords[$i]->issues_dev = $this->project_model->countissues_dev($projectRecords[$i]->id);
                    $projectRecords[$i]->issues_test = $this->project_model->countissues_test($projectRecords[$i]->id);
                    $projectRecords[$i]->issues_cus = $this->project_model->countissues_cus($projectRecords[$i]->id);
                    $alarm = $this->project_model->checkalarm($projectRecords[$i]->id);
                    $projectRecords[$i]->alarm = 0;
                    for($a=0;$a<count($alarm);$a++){
                        $date = DateTime::createFromFormat('d/m/Y', $alarm[$a]->ins_col);
                        if(strtotime(date("Y-m-d"))>=strtotime($date->format('Y-m-d'))){
                            $projectRecords[$i]->alarm = 2;
                        }else if(strtotime(date("Y-m-d").'+5 day')>=strtotime($date->format('Y-m-d'))){
                            $projectRecords[$i]->alarm = 1;
                        }
                    }
                }
                $data['projectRecords'] = $projectRecords;
                // $data['alarm'] = 0;
                $this->global['pageTitle'] = 'โปรเจค';
                // echo json_encode($data['projectRecords']);
                $this->loadViews("project/index", $this->global, $data, NULL);
            }
        // }
    }
    function addNewProject(){
        // if($this->isAdmin() == TRUE)
        // {
        //     $this->loadThis();
        // }
        // else
        // {
            $this->load->library('form_validation');
            
            $this->form_validation->set_rules('name','Project Name','trim|required|xss_clean|max_length[128]');
            $this->form_validation->set_rules('type','Project Type','trim|required|max_length[100]|xss_clean');
            $this->form_validation->set_rules('start_date','Project Start','trim|required|xss_clean');
            $this->form_validation->set_rules('end_date','Project End','trim|required|xss_clean');
            $this->form_validation->set_rules('ins','Project Installment','trim|required|xss_clean');
            $this->form_validation->set_rules('cus_id','Project Customer Id','trim|required|xss_clean');
            $this->form_validation->set_rules('date_dev','Project Date Developer','trim|required|xss_clean');

            if($this->form_validation->run() == FALSE)
            {
                $this->project();
            }
            else
            {
                $name = $this->input->post('name');
                $type = $this->input->post('type');
                $cus_id = $this->input->post('cus_id');
                $date_dev = $this->input->post('date_dev');
                $ins = $this->input->post('ins');
                $start = $this->input->post('start_date');
                $end = $this->input->post('end_date');
                $start_date = str_replace('/', '-', $start);
                $end_date = str_replace('/', '-', $end);
                $detail = $this->input->post('detail');
                $line_token = $this->input->post('line_token');
                $backgroundColor = $this->input->post('backgroundColor');
                $borderColor = $this->input->post('borderColor');
                $textColor = $this->input->post('textColor');
             

                $data = array(
                    'name'=>$name,
                    'type'=>$type, 
                    'cus_id'=>$cus_id,
                    'date_dev'=>$date_dev,
                    'detail'=>$detail, 
                    'line_token'=>$line_token, 
                    'start_date'=>date("Y-m-d", strtotime($start_date) ),
                    'end_date'=>date("Y-m-d", strtotime($end_date) ), 
                    'ins'=>$ins,
                    'backgroundColor'=>$backgroundColor,
                    'borderColor'=>$borderColor, 
                    'textColor'=>$textColor, 
                    'createdBy'=>$this->vendorId,
                    'createdDtm'=>date('Y-m-d H:i:s')
                );
                $this->log_model->project_log($data,0,$this->vendorId);
                $result = $this->project_model->addNewProject($data);
                    
                if($result > 0)
                {
                    $this->session->set_flashdata('success', 'New Project created successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Project creation failed');
                }
                    
                redirect('project');
            }
        // }
    }
    function getProjectById()
    {
        $id = $this->input->post('id');
		if($id) {
			$data = $this->project_model->getData($id);
			echo json_encode($data);
		}

		return false;
	}
    function getProjectBycode()
    {
        $code = $this->input->post('code');
		if($code) {
			$data = $this->project_model->getDatabycode($code);
			echo json_encode($data);
		}

		return false;
	}
    function editOldProject()
    {
        // if($this->isAdmin() == TRUE)
        // {
        //     $this->loadThis();
        // }
        // else
        // {
            $this->load->library('form_validation');
            
            $id = $this->input->post('edit_id');

            $this->form_validation->set_rules('edit_name','Project Name','trim|required|xss_clean|max_length[128]');
            $this->form_validation->set_rules('edit_type','Project Type','trim|required|max_length[100]|xss_clean');
            $this->form_validation->set_rules('edit_start_date','Project Start','trim|required|xss_clean');
            $this->form_validation->set_rules('edit_end_date','Project End','trim|required|xss_clean');
            $this->form_validation->set_rules('edit_ins','Project Installment','trim|required|xss_clean');
            $this->form_validation->set_rules('edit_cus_id','Project Customer Id','trim|required|xss_clean');
            $this->form_validation->set_rules('edit_date_dev','Project Date Developer','trim|required|xss_clean');

            if($this->form_validation->run() == FALSE)
            {
                $this->project();
            }
            else
            {
                $name = $this->input->post('edit_name');
                $type = $this->input->post('edit_type');
                $cus_id = $this->input->post('edit_cus_id');
                $date_dev = $this->input->post('edit_date_dev');
                $ins = $this->input->post('edit_ins');
                $start = $this->input->post('edit_start_date');
                $end = $this->input->post('edit_end_date');
                $start_date = str_replace('/', '-', $start);
                $end_date = str_replace('/', '-', $end);
                $detail = $this->input->post('edit_detail');
                $status = $this->input->post('edit_status');
                $line_token = $this->input->post('edit_line_token');
                $backgroundColor = $this->input->post('edit_backgroundColor');
                $borderColor = $this->input->post('edit_borderColor');
                $textColor = $this->input->post('edit_textColor');

                $data = array(
                    'type'=>$type, 
                    'name'=>$name,
                    'cus_id'=>$cus_id,
                    'date_dev'=>$date_dev,
                    'detail'=>$detail,
                    'line_token'=>$line_token, 
                    'start_date'=>date("Y-m-d", strtotime($start_date) ),
                    'end_date'=>date("Y-m-d", strtotime($end_date) ),
                    'ins'=>$ins,
                    'status'=>$status, 
                    'backgroundColor'=>$backgroundColor,
                    'borderColor'=>$borderColor, 
                    'textColor'=>$textColor,
                    'updatedBy'=>$this->vendorId, 
                    'updatedDtm'=>date('Y-m-d H:i:s')
                );
                $this->log_model->project_log($data,1,$this->vendorId);
                $result = $this->project_model->editProject($data, $id);
                
                if($result == true)
                {
                    $this->session->set_flashdata('success', 'Project updated successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Project updation failed');
                }
                
                redirect('project');

            }
        // }
    }
    public function upload_image($id,$position = null)
    {
        $this->load->library('upload');
        $image = array();
        $response = array();
        if($_FILES['photo']['size'][0] != 0 ){
            $ImageCount = count($_FILES['photo']['name']);
            for($i = 0; $i < $ImageCount; $i++){
                $_FILES['file']['name']       = $_FILES['photo']['name'][$i];
                $_FILES['file']['type']       = $_FILES['photo']['type'][$i];
                $_FILES['file']['tmp_name']   = $_FILES['photo']['tmp_name'][$i];
                $_FILES['file']['error']      = $_FILES['photo']['error'][$i];
                $_FILES['file']['size']       = $_FILES['photo']['size'][$i];
    
                // File upload configuration
                $uploadPath = 'image/image_project';
                $config['upload_path'] = $uploadPath;
                $config['file_name'] =  uniqid().$id;
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
    
                // Load and initialize upload library
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
    
                // Upload file to server
                if($this->upload->do_upload('file')){
                    // Uploaded file data
                    $imageData = $this->upload->data();
                    $imageupload = base_url('image/image_project/'.$imageData['file_name']);
                    array_push($image,$imageupload);
    
                }
            }
                $data = array(
                    'image'=> json_encode($image),
                    'updatedBy'=>$this->vendorId, 
                    'updatedDtm'=>date('Y-m-d H:i:s')
                  );
                  $update = $this->project_model->editProject($data, $id);
                // $update = true;
                // $response['data'] = $data;
        }
        if($_FILES['add_photo']['size'][0] != 0 ){
            $ImageCount = count($_FILES['add_photo']['name']);
            $result = $this->project_model->getData($id);
            $image = json_decode($result['image']);
            for($i = 0; $i < $ImageCount; $i++){
                $_FILES['file']['name']       = $_FILES['add_photo']['name'][$i];
                $_FILES['file']['type']       = $_FILES['add_photo']['type'][$i];
                $_FILES['file']['tmp_name']   = $_FILES['add_photo']['tmp_name'][$i];
                $_FILES['file']['error']      = $_FILES['add_photo']['error'][$i];
                $_FILES['file']['size']       = $_FILES['add_photo']['size'][$i];
    
                // File upload configuration
                $uploadPath = 'image/image_project';
                $config['upload_path'] = $uploadPath;
                $config['file_name'] =  uniqid().$id;
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
    
                // Load and initialize upload library
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
    
                // Upload file to server
                if($this->upload->do_upload('file')){
                    // Uploaded file data
                    $imageData = $this->upload->data();
                    $imageupload = base_url('image/image_project/'.$imageData['file_name']);
                    $value = count($image);
                    $image[$value] = $imageupload;
                    // array_push(json_decode($result['image']),$imageupload);
    
                }
            }
                $data = array(
                    'image'=> json_encode($image),
                    'updatedBy'=>$this->vendorId, 
                    'updatedDtm'=>date('Y-m-d H:i:s')
                  );
                  $update = $this->project_model->editProject($data, $id);
                // $update = true;
                // $response['data'] = $data;
                }
                if($_FILES['edit_photo']['size'] != 0 ){
                    $response = array();
                    $config['upload_path'] = 'image/image_project';
                    $config['file_name'] =  uniqid().$id;
                    $config['allowed_types'] = 'gif|jpeg|jpg|png';
                    $config['max_size'] = '50000';
            
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);
                    if (!$this->upload->do_upload('edit_photo')) {
                        $error = $this->upload->display_errors();
                        $response['success'] = false;
                        $response['messages'] = 'พบข้อผิดพลาดในการบันทึกข้อมูลกรุณาติดต่อแอดมิน '.$error;		
                        $this->session->set_flashdata('error', 'Project updation error');	
                    } else {
                        $data = array('upload_data' => $this->upload->data());
                        $type = explode('.', $_FILES['edit_photo']['name']);
                        $type = $type[count($type) - 1];
                        $image_name=$config['file_name'] . '.' . $type;
                        $image_url=base_url('image/image_project/'.$image_name);
            
            
                        $result = $this->project_model->getData($id);
                        $image = json_decode($result['image']);
                        $image[$position] = $image_url;
                        $data = array(
                            'image'=> json_encode($image),
                            'updatedBy'=>$this->vendorId, 
                            'updatedDtm'=>date('Y-m-d H:i:s')
                          );
                        
                    
                          $update = $this->project_model->editProject($data, $id);
                    }
                    // $update = true;
                    // $response['data'] = $data;
                }
                if($update == true)
                  {
                      $this->session->set_flashdata('success', 'Project updated successfully');
                      $response['success'] = true;
                  }
                  else
                  {
                      $this->session->set_flashdata('error', 'Project updation failed');
                      $response['success'] = false;
                  }
              
              echo json_encode($response);
    }
    public function upload_image_edit($id,$position)
    {
		$response = array();
        $config['upload_path'] = 'image/image_project';
        $config['file_name'] =  uniqid().$id;
        $config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = '50000';
        // $config['max_size'] = '5000';

        // $config['max_width']  = '1024';s
        // $config['max_height']  = '768';

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('edit_photo')) {
            $error = $this->upload->display_errors();
			$response['success'] = false;
			$response['messages'] = 'พบข้อผิดพลาดในการบันทึกข้อมูลกรุณาติดต่อแอดมิน '.$error;		
            $this->session->set_flashdata('error', 'Project updation error');	
        } else {
            $data = array('upload_data' => $this->upload->data());
            $type = explode('.', $_FILES['edit_photo']['name']);
            $type = $type[count($type) - 1];
			$image_name=$config['file_name'] . '.' . $type;
			$image_url=base_url('image/image_project/'.$image_name);


       
            $data = array(
				'image'=> $image_url,
                'updatedBy'=>$this->vendorId, 
                'updatedDtm'=>date('Y-m-d H:i:s')
              );
            
        
			  $update = $this->project_model->editProject($data, $id);

			  if($update == true)
                {
                    $this->session->set_flashdata('success', 'Project updated successfully');
                    $response['success'] = true;
                }
                else
                {
                    $this->session->set_flashdata('error', 'Project updation failed');
                    $response['success'] = false;
                }
            }
            echo json_encode($response);
    }
    function deleteProject()
    {
        if($this->isAdmin() == TRUE)
        {
            echo(json_encode(array('status'=>'access')));
        }
        else
        {   
            $id = $this->input->post('id');
            $data = array('isDeleted'=>1,'updatedBy'=>$this->vendorId, 'updatedDtm'=>date('Y-m-d H:i:s'));
            $this->log_model->project_log($data,2,$this->vendorId);
            $result = $this->project_model->deleteProject($id, $data);
            
            // if ($result > 0) { echo(json_encode(array('status'=>TRUE))); }
            // else { echo(json_encode(array('status'=>FALSE))); }
            if($result > 0)
            {
                $this->session->set_flashdata('success', 'Delete Project successfully');
            }
            else
            {
                $this->session->set_flashdata('error', 'Delete Project failed');
            }
            redirect('project','refresh');
        }
    }
}
