<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class chat extends CI_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model("chatmodel","",TRUE);
    }
    
    public function index()
    {
        if ($this->session->userdata('user_data')) {
          $session = $this->session->userdata('user_data');
          $userId = ($session["userid"] != "" ? $session["userid"] : 0);
          $page="chat/chat";
          $header="";
          $result=NULL;
          createbody_method($result, $page, $header, $session);
      }else{
          redirect('memberlogin', 'refresh');
      }
    }
    
    public function ajax_add_chat_messages()
    {
        /**
         * need to add chat_id,user_id,chat_message_content
         */
        $chat_id=1;
        $session = $this->session->userdata('user_data');
        $user_id=($session["userid"] != "" ? $session["userid"] : 0);
        $chat_message_content = $this->input->post('chat_message_content',TRUE);
        $data=array(
            "chat_id"=>1,
            "user_id"=>$user_id,
            "chat_message_content"=>$chat_message_content
        );
        $this->chatmodel->add_messages($data);
    }
    public function get_chat_messages()
    {
       $chat_id= 1;
       $msg_max_id_frm_session = (int)$this->session->userdata("msg_max_id");
       //echo($msg_max_id_frm_session);
       $chat_messages = $this->chatmodel->get_chat_message($chat_id,$msg_max_id_frm_session);
       
      
       $session_set_max_id = $this->chatmodel->get_messages_max_id();
       $this->session->set_userdata("msg_max_id",$session_set_max_id);
     
        if($chat_messages->num_rows()>0)
        {
            $chat_messages_html = '<ul class="list-group">';
            foreach ($chat_messages->result() as $chat_msg) {
                $chat_messages_html.='<li class="list-group-item"> <span class="badge">'.$chat_msg->login ." : ".$chat_msg->createdate.'</span>'.$chat_msg->chat_message_content .'</li>';
            }
            $chat_messages_html .='</ul>';
            $result = array("status"=>"Ok","content"=>$chat_messages_html);
            echo json_encode($result);
            exit();
        }
        else
        {
            $result = array("status"=>"Ok","content"=>"");
            echo json_encode($result);
            exit();
        }
      
        
    }
    
    
    
}