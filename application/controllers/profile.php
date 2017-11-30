<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of profile
 *
 * @author Abhik Ghosh
 */
class profile extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('bloodgroupmodel', '', TRUE);
        $this->load->model('profilemodel', '', TRUE);
        $this->load->library('session');
    }

    public function index() {
        if ($this->session->userdata('user_data')) {
            $session = $this->session->userdata('user_data');
            $customerId = ($session["CUS_ID"] != "" ? $session["CUS_ID"] : 0);
            $page = 'profile/changeprofile';
            $header = "";
            $headercontent['bloodgroup'] = $this->bloodgroupmodel->getBloodGroup();
            $result = $this->profilemodel->getCustomerByCustId($customerId);
            createbody_method($result, $page, $header, $session, $headercontent);
            //($body_content_data = '',$body_content_page = '',$body_content_header='',$data,$heared_menu_content='')
        } else {

            redirect('memberlogin', 'refresh');
        }
    }

    public function UpadatePersonalia() {

        $memberName = $this->input->post("memberName");
        $alternatemobilenumber = $this->input->post("alternatemobilenumber");
        $memberAddress = $this->input->post("memberAddress");
        $pinnumber = $this->input->post("pinnumber");
        $Email = $this->input->post("Email");
		$membersex="";
		$_mtempvalue=$this->input->post("membersex");
        if (empty($_mtempvalue)) {
            $membersex = 0;
        } else {
            $membersex = $this->input->post("membersex");
        }

        $bloodgroup = $this->input->post("bloodgroup");
        $dateofbirth = $this->input->post("dateofbirth");
        $json_response = array();
        if ($this->session->userdata('user_data')) {
            if ($this->formValidate($memberName, $memberAddress, $pinnumber, $Email, $membersex, $bloodgroup, $dateofbirth)) {
                $session = $this->session->userdata('user_data');
                $customerId = $session["CUS_ID"];
                $upadateData = array(
                    "CUS_NAME" => $memberName,
                    "CUS_PHONE2" => $alternatemobilenumber,
                    "CUS_EMAIL" => $Email,
                    "CUS_ADRESS" => $memberAddress,
                    "CUS_PIN" => $pinnumber,
                    "CUS_SEX" => $membersex,
                    "CUS_BLOOD_GRP" => $bloodgroup,
                    "CUS_DOB" => date("Y-m-d", strtotime($dateofbirth))
                );

                $updatePersonal = $this->profilemodel->updatePersonal($customerId, $upadateData);
                if ($updatePersonal) {
                    $json_response = array("msg_code" => 1, "msg_data" => "Profile has been changed successfully");
                } else {
                    $json_response = array("msg_code" => 2, "msg_data" => "Something is going wrong.");
                }
            } else {
                $json_response = array("msg_code" => 0, "msg_data" => "* Fields are mandatory.");
            }
        } else {
            $json_response = array("msg_code" => 500, "msg_data" => "");
        }

        header('Content-Type: application/json');
        echo json_encode($json_response);
		 exit();
    }

    private function formValidate($memberName, $memberAddress, $pinNumber, $email, $membersex, $bloodgroup, $dateofbirth) {
        if ($memberName == "") {
            return false;
        }
        if ($memberAddress == "") {
            return false;
        }
        if ($pinNumber == "") {
            return false;
        }
        if ($email == "") {
            return FALSE;
        }
        if ($bloodgroup == "") {
            return false;
        }
        if ($dateofbirth == "") {
            return false;
        }
        if ($membersex == "0") {

            return false;
        }

        return TRUE;
    }

    public function uploadProfilePicture() {

        if ($this->session->userdata('user_data')) {

            $response = array();
            if ($this->input->post('filepost')) {
                $dir = APPPATH . 'assets/images/Profilepicture/'; //FCPATH . '/posts';

                $config = array(
                    'upload_path' => $dir,
                    'allowed_types' => 'gif|jpg|png',
                    //allowed max file size. 0 means unlimited file size
                    'max_size' => '0',
                    //max file name size
                    'max_filename' => '255',
                    //whether file name should be encrypted or not
                    'encrypt_name' => TRUE
                        //store image info once uploaded
                );
                $this->load->library('upload', $config);
                // try to upload the file
                if (!$this->upload->do_upload('imagefile')) {
                    $response = array(
                        'msg_code' => '400',
                        'msg_data' => $this->upload->display_errors(),
                    );
                } else {
                    $image_data = $this->upload->data();
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = $image_data['full_path']; //get original image
                    $config['maintain_ratio'] = TRUE;
                    $config['width'] = 255;
                    $config['height'] = 255;
                    $this->load->library('image_lib', $config);
                    if (!$this->image_lib->resize()) {
                        $response = array(
                            'msg_code' => '400',
                            'msg_data' => $this->image_lib->display_errors(),
                        );
                    } else {
                        $session = $this->session->userdata('user_data');
                        $customerId = $session["CUS_ID"];
                        $this->unLinkPreviousImage($customerId);
                        $imageUpdate = $this->profilemodel->updatePersonalImage($customerId, $image_data['file_name']);
                        if ($imageUpdate) {
                            
                            $imageName = $this->getImageFile($customerId);
                            $response = array(
                                'msg_code' => '200',
                                'msg_data' => $imageName,
                            );
                        } else {
                            $response = array(
                                'msg_code' => '400',
                                'msg_data' => 'Image upload fail',
                            );
                        }
                    }
                }
            }
        } else {
            $response = array("msg_code" => 500, "msg_data" => "");
        }

        $this->output->set_content_type('application/json', 'utf-8')
                ->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))->_display();
        exit();
    }

    public function getImageFile($customerId) {
        $image = "";
        $image = $this->profilemodel->getImageById($customerId);
        return $image;
    }

    public function unLinkPreviousImage($customerId) {
        $image = "";
        $image = $this->profilemodel->getImageById($customerId);
        $path = APPPATH .'assets/images/Profilepicture/'.$image;
        //echo($path);
        $this->load->helper("file");
        if (is_file($path)) {
           
            unlink($path);
            return TRUE;
        } else {
            return FALSE;
        }


        //unlink(base_url() . '/image/logo_thumb' . $logo_thumb);
    }

}
