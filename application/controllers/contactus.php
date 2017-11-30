<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of contactus
 *
 * @author Dev
 */
class contactus extends CI_Controller {
    //put your code here
    public function __construct() {
        parent::__construct();
        // Load the captcha helper
        $this->load->library('image_lib');
        $this->load->helper('captcha');
        $this->load->model("contactusmodel", "contact",TRUE);
    }
    public function index(){
      if ($this->session->userdata('user_data')) {
          $session = $this->session->userdata('user_data');
          
          $config = array(
            'img_path'      => APPPATH . 'assets/images/captcha_images/',
            'img_url'       =>  base_url() .'application/assets/images/captcha_images/',///webapplicationdemo/application/assets/images/pentabits.png
            'img_width'     => '150',
            'img_height'    => 50,
            'word_length'   => 8,
            'font_size'     => 16,
            'font_path' => base_url() . 'system/fonts/captcha_font.ttf',
              
        );
        $captcha = create_captcha($config);
        // Unset previous captcha and store new captcha word
        $this->session->unset_userdata('captchaCode');
        $this->session->set_userdata('captchaCode',$captcha['word']);
     
        $page="contactus/contactform";
        $header="";
        $result["captchaImg"]=$captcha['image'];
        createbody_method($result, $page, $header, $session);
      }else{
          redirect('memberlogin', 'refresh');
      }
    }
    
    public function captchaRefresh(){
        $config = array(
            'img_path'      => APPPATH . 'assets/images/captcha_images/',
            'img_url'       =>  base_url() .'application/assets/images/captcha_images/',///webapplicationdemo/application/assets/images/pentabits.png
            'img_width'     => '150',
            'img_height'    => 50,
            'word_length'   => 8,
            'font_size'     => 16,
            'font_path' => base_url() . 'system/fonts/captcha_font.ttf',
        );
        $captcha = create_captcha($config);
        
        // Unset previous captcha and store new captcha word
        $this->session->unset_userdata('captchaCode');
        $this->session->set_userdata('captchaCode',$captcha['word']);
        echo $captcha['image'];
    }
    
    public function sendMail(){
        $json_response = array();
        if ($this->session->userdata('user_data')) {
            
            $session = $this->session->userdata('user_data');
            $captchaCode = $this->session->userdata('captchaCode');

            $name = $this->input->post("contpersonname");
            $email = $this->input->post("contpersonemail");
            $message = $this->input->post("contpersonemsg");
            $captchaInput = $this->input->post("captchadata");

            if ($captchaInput == $captchaCode) {

                $data = array(
                    "name" => $name,
                    "email" => $email,
                    "message" => $message
                );
                
                $config['protocol']    = 'smtp';
                $config['smtp_host']    = "ssl://s2.fcomet.com";//'ssl://smtp.gmail.com';
                $config['smtp_port']    = '465';
                $config['smtp_timeout'] = '7';
                $config['smtp_user']    = 'test@pentabits.net';
                $config['smtp_pass']    = 'test@123#';
                $config['charset']    = 'utf-8';
                $config['newline']    = "\r\n";
                $config['mailtype'] = 'text'; // or html
                $config['validation'] = TRUE; // bool whether to validate email or not      
                $this->load->library('email',$config);
                 //$this->email->initialize($config);
                
                
                //sending mail for test@pentabits.net
                $this->email->from($email, $name);
                $this->email->to("test@pentabits.net");
                $this->email->subject('Contact us form mail.');
                $this->email->message($message);

                //Send mail 
                if ($this->email->send()) {
                    $this->contact->insertContact($data);
                    $json_response = array("msg_code" => 1, "msg_data" => "Thank you we will get back soon!!.");
                } else {

                    $json_response = array("msg_code" => 0, "msg_data" => "Error in sending Email.");
                }
            } else {
                $json_response = array("msg_code" => 400, "msg_data" => "Captcha code error.");
            }
        } else {
            $json_response = array("msg_code" => 500, "msg_data" => "Session time out,Redirect to login");
        }
        header("Access-Control-Allow-Origin: *");
        header('Content-Type: application/json');
        echo json_encode($json_response);
        exit;
    }
}
