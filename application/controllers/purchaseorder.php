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
class purchaseorder extends CI_Controller {
    //put your code here
    
    public function __construct() {
        parent::__construct();
        $this->load->model("productcategorymodel","pcatg", TRUE);    
        $this->load->model("productmastermodel","product", TRUE);
        $this->load->model("unitmastermodel","uom", TRUE);
        $this->load->model("purchaseordermodel","po", TRUE);
        $this->load->model("vendormastermodel","vendor", TRUE);
//purchaseordermodel
        

    }
    public function index(){
         if ($this->session->userdata('user_data')) {
          $session = $this->session->userdata('user_data');
          $result["polist"]=  $this->po->getPurchaseOrderList();
          $page="purchaseorder/list";
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

                $purchaseorderid = 0;
            } else {
                $purchaseorderid = $this->uri->segment(4);
            }
       $result["product"] = $this->product->getProductList();
       $result["vendor"]=  $this->vendor->getVendorList();
       
       
        if($purchaseorderid!=0){
            $result["pomaster"]=  $this->po->getPurchaseOrderMasterById($purchaseorderid);
            $result["podtl"]=  $this->po->getPurchaseOrderDetailById($purchaseorderid);
            $page = 'purchaseorder/addEdit';
        }else{
            $result["pomaster"]=NULL;
            $result["podtl"]=NULL;
            $page = 'purchaseorder/addEdit';
        }
            
        createbody_method($result, $page, $header, $session); 
     }else{
         redirect('memberlogin','refresh');
     }
    }
    
    public  function purchaseordersave(){
         $json_response = array();
          if ($this->session->userdata('user_data')) {
              $session = $this->session->userdata('user_data');
              $poData=  json_decode(file_get_contents('php://input'), true);// $this->input->post('data');

               
               $purchaseOrderId = $poData["poid"];
               $purchaseOrderNumber = $poData["pono"];
               $purchaseOrderDate = date("Y-m-d",  strtotime($poData["podate"]));
               $vendorId = $poData["vaendor"];
               $totalAmount = $poData["totalAmount"];
               $podetails=$poData["podtl"];
               
              if($purchaseOrderId!=""){
                  $data=array(
                      
                      "po_date"=>$purchaseOrderDate,
                      "po_number"=>$purchaseOrderNumber,
                      "vendor_id"=>$vendorId,
                      "total_amount"=>$totalAmount
                  );
                  $rslt=$this->po->updatePurchaseOrder($data,$purchaseOrderId,$podetails);
                  
              }  else {
                    $data=array(
                      
                      "po_date"=>$purchaseOrderDate,
                      "po_number"=>$purchaseOrderNumber,
                      "vendor_id"=>$vendorId,
                      "total_amount"=>$totalAmount
                  );
                  $rslt= $this->po->insertPurchaseOrder($data,$podetails);
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

                $purchaseorderid = 0;
            } else {
                $purchaseorderid = $this->uri->segment(4);
            }
            
            $rslt=  $this->po->delete($purchaseorderid);
            if($rslt){
                redirect("purchaseorder","refresh");
            }
        } else {
            redirect('memberlogin', 'refresh');
        }
    }
    
    /**
     * @name getUnitByProduct
     */
    
    public function  getUnitByProduct(){
        $json_response=array();
        if ($this->session->userdata('user_data')) {
            $productId= $this->input->post("productId");
            $unit=  $this->po->getUomByProductId($productId);
            $json_response = array("msg_code" => 1, "msg_data" => $unit);
        }else{
            $json_response = array("msg_code" => 500, "msg_data" => "Session time out,Redirect to login");
        }
        header("Access-Control-Allow-Origin: *");
        header('Content-Type: application/json');
        echo json_encode($json_response);
        exit;
    }
    
}
