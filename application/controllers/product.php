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
class product extends CI_Controller {
    //put your code here
    
    public function __construct() {
        parent::__construct();
        $this->load->model("productcategorymodel","pcatg", TRUE);    
        $this->load->model("productmastermodel","product", TRUE);
        $this->load->model("unitmastermodel","uom", TRUE);
        

    }
    public function index(){
         if ($this->session->userdata('user_data')) {
          $session = $this->session->userdata('user_data');
          $result["product"]=  $this->product->getProductList();
          $page="product/list";
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

                $productid = 0;
            } else {
                $productid = $this->uri->segment(4);
            }
       $result["category"] = $this->pcatg->getCategoryList();
       $result["unit"] = $this->uom->getUomList();
       
        if($productid!=0){
            $result["product"]=  $this->product->getProductById($productid);
            $page = 'product/addEdit';
        }else{
            $result["product"]=NULL;
            $page = 'product/addEdit';
        }
            
        createbody_method($result, $page, $header, $session); 
     }else{
         redirect('memberlogin','refresh');
     }
    }
    
    public  function saveproduct(){
         $json_response = array();
          if ($this->session->userdata('user_data')) {
              $session = $this->session->userdata('user_data');
              $productId = $this->input->post("hdprodid");
              $product = $this->input->post("product");
              $proddesc = $this->input->post("proddesc");
              $categoryId= $this->input->post("productcat");
              $unitId = $this->input->post("produnit");
              
              
              
              
              if($productId!=""){
                  $data=array(
                      "product_name"=>$product,
                      "product_desc"=>$proddesc,
                      "category_id"=>$categoryId,
                      "uom_id"=>$unitId
                  );
                  $rslt=$this->product->updateProduct($data,$productId);
                  
              }  else {
                    $data=array(
                      "product_name"=>$product,
                      "product_desc"=>$proddesc,
                      "category_id"=>$categoryId,
                      "uom_id"=>$unitId
                  );
                  $rslt= $this->product->insertProduct($data);
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

                $productid = 0;
            } else {
                $productid = $this->uri->segment(4);
            }
            
            $rslt=  $this->product->delete($productid);
            if($rslt){
                redirect("product","refresh");
            }
        } else {
            redirect('memberlogin', 'refresh');
        }
    }
    
}
