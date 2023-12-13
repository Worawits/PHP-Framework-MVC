<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
header('Content-Type: application/json; charset=utf-8');
header("Access-Control-Allow-Origin: *");
require APPPATH . '/libraries/BaseController.php';

class Api extends CI_Controller 
{
    public function __construct()
    {
       
        parent::__construct();
         $this->load->model('api_model');
    }
    public function index()
    {
       echo "Hellow";
    }
    public function login()
    {
        $jsonArray = json_decode(file_get_contents('php://input'), true);
        $email = $jsonArray["email"];
        $password =$jsonArray["password"];
        $result = $this->api_model->loginMe($email, $password);
        $this->echo_success($result,200,'login success');
         
    }
    public function listProject()
    {
        $result = $this->api_model->listProject();
        $this->echo_success($result,200,'get success');      
    }
    public function category_project($pid,$instance)
    {
        $result = $this->api_model->category_project($pid,$instance);
        
        $this->echo_success($result,200,'get success');      
    }
   
    public function getAllserch(){
        $listProject = $this->api_model->listProject();
        $activity_project_all = $this->api_model->activity_project_all();

        $item = [];
        foreach($activity_project_all  as $r){
            $itemData["id"] = $r->id;
            $itemData["name"] = $r->name;
            $itemData["code"] = $r->a_code;
            $itemData["type"] = 'Activity';
            $itemData["dataActivity"] = $r;
            array_push($item,$itemData);
        }
        foreach($listProject  as $r){
            $itemData["id"] = $r->id;
            $itemData["name"] = $r->name;
            $itemData["code"] = $r->code;
            $itemData["type"] = 'Project';
            $itemData["dataProject"] = $r;
            array_push($item,$itemData);
        }

         $this->echo_success($item,200,'get success');      
        
        
    }
    public function activity_project($c_code)
    {
        $result = $this->api_model->activity_project($c_code);
     
        $item = [];
        foreach($result  as $r){
            $data = $this->api_model->checklist($r->id);
            $r->checklist = $data;
            array_push($item,$r);
        }
        $this->echo_success($item,200,'get success');      
    }

    function echo_success( $result,$status,$msg){
        $dataArray["status"] = $status;
        $dataArray["msg"] = $msg;
        $dataArray["result"] = $result;
        echo json_encode($dataArray);
    }
    function upLoadimagebefor($id)
    {


        $data["reason"] = $_POST['reason'];
        $data["checkpass"] = $_POST['checkpass'];
        
        $config['upload_path']          = './image/image_check';
        $config['allowed_types']        = 'gif|jpeg|jpg|png';
        $config['max_size']             = 30000;
        $config['file_name']  = 'img_' . date("dmY_his");
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);
        if ($this->upload->do_upload('image_before')) {
            $img = $this->upload->data();
            $partname = base_url('image/image_check/'.$img["file_name"]);
            $data["image_before"] =$partname;
        }
        if ($this->upload->do_upload('image_after')) {
            $img = $this->upload->data();
            $partname = base_url('image/image_check/'.$img["file_name"]);
            $data["image_after"] =$partname;
        }
            $this->db->where("id",$id);
            $this->db->update("tbl_checklist",$data);



            $this->echo_success($data,200,'get success');     
    }

  
}
?>