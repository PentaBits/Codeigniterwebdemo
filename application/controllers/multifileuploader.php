<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of multifileuploader
 *
 * @author Dev
 */
class multifileuploader extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        $this->load->model("multifileuploadermodel","upld",TRUE);
    }
    
    
    //put your code here
    public function index(){
        if ($this->session->userdata('user_data')) {
            $session = $this->session->userdata('user_data');
            $page="multifileuploader/uploader";
            $header="";
            $result[""]=NULL;
            createbody_method($result, $page, $header, $session);
        }else{
            //$this->load->helper('url');
//            $current_url =& get_instance();
//            $cntrlr = $current_url->router->fetch_class(); // for Class name or controller
//            $mthd = $current_url->router->fetch_method(); // for method name
//            $this->session->set_userdata('last_page', $cntrlr."/".$mthd);
            redirect('memberlogin', 'refresh');
        }
    }
    
    public function multipleFileUpload(){
        $json_response = array();
         if ($this->session->userdata('user_data')) {
             
             $session = $this->session->userdata('user_data');
             $userId = ($session["userid"] != "" ? $session["userid"] : 0);
             $dir = APPPATH . 'assets/images/multiimages/';
             $thumbnailPath = APPPATH.'assets/images/multiimages/thumbnail/';
             $no_files = count($_FILES["uploadfile"]['name']);
            
             
             
             $this->load->library('upload');
             //echo($no_files."----");
             if($_FILES["uploadfile"]['error'][0] != 4){
             
                    for($i=0;$i<$no_files;$i++){
                       $_FILES['userFile']['name'] = $_FILES['uploadfile']['name'][$i];
                       $_FILES['userFile']['type'] = $_FILES['uploadfile']['type'][$i];
                       $_FILES['userFile']['tmp_name'] = $_FILES['uploadfile']['tmp_name'][$i];
                       $_FILES['userFile']['error'] = $_FILES['uploadfile']['error'][$i];
                       $_FILES['userFile']['size'] = $_FILES['uploadfile']['size'][$i];
                       
                       $newFileName="";
                       $newFileName =  time()."~".$_FILES['userFile']['name'];
                       
                       //echo($newFileName);
                       $config = array(
                        'upload_path' => $dir,
                        'allowed_types' => 'gif|jpg|png',
                        //allowed max file size. 0 means unlimited file size
                        'max_size' => '2048KB',
                        //max file name size
                        'max_filename' => '255',
                        //whether file name should be encrypted or not
                        'encrypt_name' => false,
                        //store image info once uploaded
                        'file_name'=>$newFileName
                        );
//                       $this->load->library('upload', $config);
                       $this->upload->initialize($config);
                       if($this->upload->do_upload('userFile')){
                       
                       $config = array(
                        'upload_path' => $thumbnailPath,
                        'allowed_types' => 'gif|jpg|png',
                        //allowed max file size. 0 means unlimited file size
                        'max_size' => '2048KB',
                        //max file name size
                        'max_filename' => '255',
                        //whether file name should be encrypted or not
                        'encrypt_name' => false,
                        //store image info once uploaded
                        'file_name'=>$newFileName
                        );
//                        $this->load->library('upload', $config);
                        $this->upload->initialize($config);
                        $this->upload->do_upload('userFile');
                        
                        $image_data = $this->upload->data();
                        $configs['image_library'] = 'gd2';
                        $configs['source_image'] = $image_data['full_path']; //get original image
                        $configs['width'] = 75;
                        $configs['height'] = 1;
                        $configs['maintain_ratio'] = TRUE;
                        $configs['master_dim'] = 'width';
                        $this->load->library('image_lib', $configs);
                        $this->image_lib->initialize($configs);
                        $this->image_lib->resize();
                        
                        $uploadedImage = $image_data['file_name'];
                        
                        $data =array(
                            "filename"=>$uploadedImage,
                            "thumbnail"=>$uploadedImage,
                            "userid"=>$userId,
                            "uploaddate"=>date('Y-m-d')
                          
                        );
                        $rslt = $this->upld->insertFilesData($data);
                       }else{
                           $rslt=FALSE;
                       }
                       if($rslt){
                            $json_response = array("msg_code" => 1, "msg_data" => "File(s) uploaded successfully. ");
                       }else{
                           $json_response = array("msg_code" => 0, "msg_data" => "File(s) upload unsuccessfull. ");
                       }
                }
                    
             }  else {
                 $json_response = array("msg_code" => 3, "msg_data" => "Please select at least one file");
             } 
             
        }else{
             $json_response = array("msg_code" => 500, "msg_data" => "Session time out,Redirect to login");
         }
        header("Access-Control-Allow-Origin: *");
        header('Content-Type: application/json');
        echo json_encode($json_response);
        exit;
    }
    
    public function getUploadedFiles(){
        if ($this->session->userdata('user_data')) {
            $session = $this->session->userdata('user_data');
            $userId = ($session["userid"] != "" ? $session["userid"] : 0);
            $result["datas"]=  $this->upld->getUploadedFiles($userId);
            $page="multifileuploader/list";
            $this->load->view($page, $result);
            
        }else{
            redirect('memberlogin', 'refresh');
        }
    }
    
    public function delete(){
        $json_response = array();
         if ($this->session->userdata('user_data')) {
             
             try {
                  $fileId = $this->input->post("fileId");
                  $fileName = $this->upld->getFileNameById($fileId);
                  $this->unlinkimage($fileName);
                  $rslt= $this->upld->delete($fileId);
                  if($rslt){
                     $json_response = array("msg_code" => 1, "msg_data" => "Delete success."); 
                  }  else {
                      $json_response = array("msg_code" => 0, "msg_data" => "Delete fail");
                  }
                  
             } catch (Exception $exc) {
//                 echo $exc->getTraceAsString();
                 $json_response=array("msg_code" => 0, "msg_data" => "Delete fail");
             }
       
         }else{
             $json_response = array("msg_code" => 500, "msg_data" => "Session time out,Redirect to login");
         }
        header("Access-Control-Allow-Origin: *");
        header('Content-Type: application/json');
        echo json_encode($json_response);
        exit;
    }
    
    public function  unlinkimage($file){
        $dir = APPPATH . 'assets/images/multiimages/'.$file;
        $thumbnailPath = APPPATH.'assets/images/multiimages/thumbnail/'.$file;
        if(file_exists($thumbnailPath)){
            @unlink($thumbnailPath);
            if(file_exists($dir)){
                @unlink($dir);
            }
        }
    }
}
