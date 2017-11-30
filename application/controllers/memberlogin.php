<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class memberlogin extends CI_Controller {
 public function __construct()
 {
   parent::__construct();
    $this->load->model('memberloginmodel','',TRUE);
    $this->load->library('session');
	
 }
	
 public function index()
 {
     $page = 'memberlogin/login';
     $this->load->view($page);
 }
 
 
 /**
  * @method login
  * @date:12/01/2017
  * @chek member panel login by mobile and dob
  * */
 public function login(){
     
    
 $username = $this->input->post("user");
 $memberPassword = $this->input->post("pwd");
 $grecaptcharesponse =  $this->input->post("g-recaptcha-response");
 //your site secret key
 $secret = '6LembTEUAAAAAOhuEr2o9T_n0FAoTNlLfHV-2Wly';
 $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$grecaptcharesponse);
 $responseData = json_decode($verifyResponse);
 
 $json_response=array();
 if($responseData->success){
 if($username!="" && $memberPassword!=""){
     $result = $this->memberloginmodel->checkMember($username,$memberPassword);
     if($result["userid"]!=""){
         $this->userInformationUpdate($result["userid"]);
         $this->setSessionData($result);
         $json_response = array("msg_code"=>1,"msg_data"=>"");
     }else{
          $json_response = array("msg_code"=>3,"msg_data"=>"Incorrect Username or Password");
     }
 
 }else{
	   $json_response = array("msg_code"=>0,"msg_data"=>"Username or password cannot be blank");
           
 }
 }else{
     $json_response = array("msg_code"=>4,"msg_data"=>"Captcha validation failed!");
 } 
    header("Access-Control-Allow-Origin: *");
    header('Content-Type: application/json');
    echo json_encode( $json_response );
    exit;
 }
 
 private function setSessionData($result=NULL){
   
   if($result)
   { 
        $this->session->set_userdata("user_data",$result);
   }
 }
 private function userInformationUpdate($userId){
     //Asia/Kolkata
     date_default_timezone_set('Asia/Kolkata');
     $currentdatetime=date('Y-m-d H:i:s');
     $userData=array(
         "loginip"=>  $this->getRealIpAddr(),
         "logintime"=> $currentdatetime
     );
     $this->memberloginmodel->userLoginUpdate($userId,$userData);
 }
private  function getRealIpAddr()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
    {
      $ip=$_SERVER['HTTP_CLIENT_IP'];
    }
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
    {
      $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else
    {
      $ip=$_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}

	

}