<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class chatmodel extends CI_Model
{
    public function __construct() {
        parent::__construct();
    }
    
    public function add_messages($data=array())
    {
        $this->db->insert('chat_messages',$data);
    }
    public function get_chat_message($chat_id=NULL,$msg_max_id_frm_session)
    {
        $sql="SELECT 
                cm.user_id,
                cm.chat_message_content,u.login,
                DATE_FORMAT(cm.create_date,'%D of %M %Y %H:%I:%S') AS createdate
                FROM 
                chat_messages cm
                INNER JOIN
                users u ON cm.user_id = u.userid
                WHERE cm.chat_id =? AND cm.chat_messages_id >? 
                ORDER BY cm.chat_messages_id ASC ";
        $result = $this->db->query($sql, array($chat_id,$msg_max_id_frm_session));
        //echo($this->db->last_query());
        return $result;
    }
    
    public function get_messages_max_id()
    {
        $maxid = 0;
        $sql="SELECT MAX(chat_messages.chat_messages_id) AS msg_id FROM chat_messages";
        $query = $this->db->query($sql);
        
        if($query->num_rows()>0){
            
            $rows = $query->row();
            $maxid = $rows->msg_id;
        
        }
        
        
        return $maxid;
    }
}

