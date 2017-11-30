<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of productcategory
 *
 * @author Dev
 */
class productcategory extends CI_Controller {
    //put your code here
    
    public function __construct() {
        parent::__construct();
        $this->load->model("productcategorymodel","pcatg", TRUE);
        
        
    }
    public function index(){
         if ($this->session->userdata('user_data')) {
          $session = $this->session->userdata('user_data');
          $result["productcategory"]=  $this->pcatg->getCategoryList();
          $page="product_category/list";
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

                $prodcatg = 0;
            } else {
                $prodcatg = $this->uri->segment(4);
            }
       
        if($prodcatg!=0){
            $result["prodctg"]=  $this->pcatg->getCategoryById($prodcatg);
            $page = 'product_category/addEdit';
        }else{
            $result["prodctg"]=NULL;
            $page = 'product_category/addEdit';
        }
            
        createbody_method($result, $page, $header, $session); 
     }else{
         redirect('memberlogin','refresh');
     }
    }
    
    public  function savecategory(){
         $json_response = array();
          if ($this->session->userdata('user_data')) {
              $session = $this->session->userdata('user_data');
              $categoryId= $this->input->post("hdcatgid");
              $category=  $this->input->post("catg");
              $categorydesc = $this->input->post("catgdesc");
              
              if($categoryId!=""){
                  $data=array(
                      "category_name"=>$category,
                      "category_desc"=>$categorydesc
                  );
                  $rslt=$this->pcatg->updateCategory($data,$categoryId);
                  
              }  else {
                  $data=array(
                      "category_name"=>$category,
                      "category_desc"=>$categorydesc
                  );
                  $rslt= $this->pcatg->insertCategory($data);
              }
              if($rslt){
                   $json_response = array("msg_code" => 1, "msg_data" => "Data saved successfully.");
              }else{
                   $json_response = array("msg_code" => 0, "msg_data" => "Internal error occured.");
              }
          }
          else {
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

                $prodcatgid = 0;
            } else {
                $prodcatgid = $this->uri->segment(4);
            }
            
            $rslt=  $this->pcatg->delete($prodcatgid);
            if($rslt){
                redirect("productcategory","refresh");
            }
        } else {
            redirect('memberlogin', 'refresh');
        }
    }
    
}
