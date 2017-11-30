<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of csvuploader
 *
 * @author Dev
 */
class csvuploader extends CI_Controller{
    
 public function __construct()
 {
    parent::__construct();
    $this->load->library('session');
    $this->load->library('csvimport');
    $this->load->model("csvprocessmodel", "",TRUE);
    
 }
    //put your code here
    public function index(){
        if ($this->session->userdata('user_data')) {
          $session = $this->session->userdata('user_data');
          $login=($session["login"]!=""?$session["login"]:"");
          $userId = ($session["userid"] != "" ? $session["userid"] : 0);
          $page="uploader/fileupload";
          $result=null;
          $header=NULL;
          $result["msg"]=$this->session->flashdata('message');
          
          createbody_method($result, $page, $header, $session);
      }else{
          redirect('memberlogin', 'refresh');
      }
    }
    
    public function DownloadCSV($filename){
        if ($this->session->userdata('user_data')) {
            $session = $this->session->userdata('user_data');
            $this->load->helper('download');
            if ($filename) {
                $dir = APPPATH . 'assets/upload/csv/';
                $fileTobeDwnld = $dir . $filename;
                if (file_exists($fileTobeDwnld)) {
                    // get file content
                    $data = file_get_contents($fileTobeDwnld);
                    //force download
                    force_download($filename, $data);
                } else {
                    // Redirect to base url
                    redirect('csvuploader', 'refresh');
                }
            }
        } else {
            
        }
    }
    
    public function uploadcsv(){
        
        if ($this->session->userdata('user_data')) {
            
            
             if ($_FILES["csvpld"]['error'] != 4){
                 $new_name =$_FILES["csvpld"]['name'];
                 
                 $dir = APPPATH . 'assets/upload/csv/';
                    $config = array(
                        'upload_path' => $dir,
                        'allowed_types' => 'csv',
                        //allowed max file size. 0 means unlimited file size
                        'max_size' => '6000KB',
                        //max file name size
                        'max_filename' => '255',
                        //whether file name should be encrypted or not
                        'encrypt_name' => FALSE,
                        'file_name'=>$new_name
                            //store image info once uploaded
                    );
                $this->load->library("upload",$config);
                $this->removeCsvfromDisk($dir.$new_name);
                if($this->upload->do_upload("csvpld")){
                    
                    $upload_file_data = $this->upload->data();
                    //echo($upload_file_data['full_path']);
                    $rslt=$this->csvimport->get_array($upload_file_data['full_path'],FALSE,FALSE,FALSE,';');
                    //$filepath=FALSE, $column_headers=FALSE, $detect_line_endings=FALSE, $initial_line=FALSE, $delimiter=FALSE
                    //$header_array=$rslt["0"];
                    $this->csvprocessmodel->createMySqlTable($rslt);
                    
//                    echo("<pre>");
//                    print_r($rslt);
//                    echo("</pre>");
                    redirect('csvuploader/listLoad','refresh') ;
                } else{
                    
                    $this->session->set_flashdata('message', $this->upload->display_errors());
                    redirect('csvuploader','refresh') ;
                }   
             }else{
                 $this->session->set_flashdata('message', "Please upload a CSV file.");
                 redirect('csvuploader','refresh') ;
             }
        }else{
            redirect('memberlogin', 'refresh');
        }
    }
    
    public function listCsvData(){
         if ($this->session->userdata('user_data')) {
          $session = $this->session->userdata('user_data');
          $result_data= $this->csvprocessmodel->get_csv_list();
          echo json_encode($result_data);

      }else{
          redirect('memberlogin', 'refresh');
      }
    }
    public function listLoad(){
        
        if ($this->session->userdata('user_data')) {
          $session = $this->session->userdata('user_data');

          $result=null;
          $page="uploader/list";
          $header="";
          createbody_method($result, $page, $header, $session);
      }else{
          redirect('memberlogin', 'refresh');
      }
    }
    
    public function removeCsvfromDisk($pathinfo){
        if(file_exists($pathinfo)){
            unlink($pathinfo);
        }
    }
}
