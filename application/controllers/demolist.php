<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class demolist extends CI_Controller  {
 public function __construct()
 {
    parent::__construct();
    $this->load->model('demomodel','',TRUE);
    $this->load->library('session');
    $this->load->model('departmentmodel','',TRUE);
	
 }
 public function index(){
     
      if ($this->session->userdata('user_data')) {
          $session = $this->session->userdata('user_data');
          $login=($session["login"]!=""?$session["login"]:"");
          $userId = ($session["userid"] != "" ? $session["userid"] : 0);
          
          if($login=="admin"){
            $result["employeelist"]= $this->demomodel->getList();
          }else{
              $result["employeelist"]= $this->demomodel->getList($userId);
          }
          
          $page="employee/list";
          $header="";
          createbody_method($result, $page, $header, $session);
      }else{
          redirect('memberlogin', 'refresh');
      }
 }
 
 
 public function addEdit(){
     
     if($this->session->userdata('user_data')){
         $session = $this->session->userdata('user_data');
         $header="";
         if ($this->uri->segment(4) === FALSE) {

                $employeeId = 0;
            } else {
                $employeeId = $this->uri->segment(4);
            }
        $result["department"]=$this->departmentmodel->getAllDepartment();
        if($employeeId!=0){
            $result["empData"]=  $this->demomodel->getDataById($employeeId);
            $page = 'employee/addEdit';
        }else{
            $result["empData"]=NULL;
            $page = 'employee/addEdit';
        }
            
        createbody_method($result, $page, $header, $session); 
     }else{
         redirect('memberlogin','refresh');
     }
 }
 /**
  * 
  */
 public function saveEmployee(){

        $json_response = array();
        if ($this->session->userdata('user_data')) {
            $session = $this->session->userdata('user_data');
            $employeeid = $this->input->post("hdemployeeid");
            $firstname = $this->input->post("firstname");
            $lastname = $this->input->post("lastname");
            $sex = $this->input->post("optionsex");
            $dateofbirth = $this->input->post("dateofbirth");
            $empmobile = $this->input->post("empmobile");
            $email = $this->input->post("empemail");
            $department = $this->input->post("department");
            $userId = ($session["userid"] != "" ? $session["userid"] : 0);
            $rslt;



            if ($employeeid != "") {

                if ($_FILES["imgEmp"]['error'] == 4) {//no file upload on edit
                    //normal upadate without image
                    $data = array(
                        "firstname" => $firstname,
                        "lastname" => $lastname,
                        "sex" => $sex,
                        "dob" => date("Y-m-d", strtotime($dateofbirth)),
                        "departmentid" => $department,
                        "mobile" => $empmobile,
                        "email" => $email,
                        "userid" => $userId
                    );
                    $rslt = $this->demomodel->update($employeeid, $data);
                    if ($rslt) {
                        $json_response = array("msg_code" => 1, "msg_data" => "Data saved successfully.");
                    } else {
                        $json_response = array("msg_code" => 0, "msg_data" => "Internal error occured.");
                    }
                } else {
                    //update with file uplaod
                    $imageName = $this->demomodel->getImageName($employeeid);
                    $dir = APPPATH . 'assets/images/demoimages/';
                    $this->unlinkImageFile($dir, $imageName);
                    $config = array(
                        'upload_path' => $dir,
                        'allowed_types' => 'gif|jpg|png|jpeg',
                        //allowed max file size. 0 means unlimited file size
                        'max_size' => '2048KB',
                        //max file name size
                        'max_filename' => '255',
                        //whether file name should be encrypted or not
                        'encrypt_name' => TRUE
                            //store image info once uploaded
                    );
                    $this->load->library('upload', $config);
                    if ($this->upload->do_upload("imgEmp")) {

                        $image_data = $this->upload->data();
                        $config['image_library'] = 'gd2';
                        $config['source_image'] = $image_data['full_path']; //get original image
                        $config['width'] = 800;
                        $config['height'] = 600;
                        $this->load->library('image_lib', $config);
                        $this->image_lib->resize();
                        $uploadedImage = $image_data['file_name'];
                        $data = array(
                            "firstname" => $firstname,
                            "lastname" => $lastname,
                            "sex" => $sex,
                            "dob" => date("Y-m-d", strtotime($dateofbirth)),
                            "departmentid" => $department,
                            "mobile" => $empmobile,
                            "email" => $email,
                            "userid" => $userId,
                            "image" => $uploadedImage
                        );

                        $rslt = $this->demomodel->update($employeeid, $data);
                        if ($rslt) {
                            $json_response = array("msg_code" => 1, "msg_data" => "Data saved successfully.");
                        } else {
                            $json_response = array("msg_code" => 0, "msg_data" => "Internal error occured.");
                        }
                    } else {
                        $json_response = array(
                            'msg_code' => 400,
                            'msg_data' => $this->upload->display_errors(),
                        );
                    }
                }
            } else {//ADD
                if ($_FILES['imgEmp']['error'] != 4) {

                    $dir = APPPATH . 'assets/images/demoimages/';
                    $config = array(
                        'upload_path' => $dir,
                        'allowed_types' => 'gif|jpg|png',
                        //allowed max file size. 0 means unlimited file size
                        'max_size' => '2048KB',
                        //max file name size
                        'max_filename' => '255',
                        //whether file name should be encrypted or not
                        'encrypt_name' => TRUE
                            //store image info once uploaded
                    );
                    $this->load->library('upload', $config);
                    if ($this->upload->do_upload('imgEmp')) {

                        $image_data = $this->upload->data();
                        $config['image_library'] = 'gd2';
                        $config['source_image'] = $image_data['full_path']; //get original image
                        $config['width'] = 800;
                        $config['height'] = 600;
                        $this->load->library('image_lib', $config);
                        $this->image_lib->resize();
                        $uploadedImage = $image_data['file_name'];
                        $data = array(
                            "firstname" => $firstname,
                            "lastname" => $lastname,
                            "sex" => $sex,
                            "dob" => date("Y-m-d", strtotime($dateofbirth)),
                            "departmentid" => $department,
                            "mobile" => $empmobile,
                            "email" => $email,
                            "userid" => $userId,
                            "image" => $uploadedImage
                        );


                        $rslt = $this->demomodel->insert($data);

                        if ($rslt) {
                            $json_response = array("msg_code" => 1, "msg_data" => "Data saved successfully.");
                        } else {
                            $json_response = array("msg_code" => 0, "msg_data" => "Internal error occured.");
                        }
                    } else {

                        $json_response = array(
                            'msg_code' => 400,
                            'msg_data' => $this->upload->display_errors(),
                        );
                    }
                } else {
                    $data = array(
                        "firstname" => $firstname,
                        "lastname" => $lastname,
                        "sex" => $sex,
                        "dob" => date("Y-m-d", strtotime($dateofbirth)),
                        "departmentid" => $department,
                        "mobile" => $empmobile,
                        "email" => $email,
                        "userid" => $userId
                    );

                    $rslt = $this->demomodel->insert($data);
                    if ($rslt) {
                        $json_response = array("msg_code" => 1, "msg_data" => "Data saved successfully.");
                    } else {
                        $json_response = array("msg_code" => 0, "msg_data" => "Internal error occured.");
                    }
                }
            }
        } else {
            $json_response = array("msg_code" => 500, "msg_data" => "Session time out,Redirect to login");
        }
        header("Access-Control-Allow-Origin: *");
        header('Content-Type: application/json');
        echo json_encode($json_response);
        exit;
    }
 
 public function delete(){
     if ($this->session->userdata('user_data')) {
            if ($this->uri->segment(4) === FALSE) {

                $employeeId = 0;
            } else {
                $employeeId = $this->uri->segment(4);
            }
            
            $rslt=  $this->demomodel->delete($employeeId);
            if($rslt){
                redirect("demolist","refresh");
            }
        } else {
            redirect('memberlogin', 'refresh');
        }
    }
    
    public function unlinkImageFile($path,$filename){
        $imagepath = $path.$filename;
        if(file_exists($imagepath)){
            @unlink($imagepath);
        }
    }
 
 
}
