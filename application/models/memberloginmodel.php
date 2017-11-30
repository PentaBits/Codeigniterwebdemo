<?php
class memberloginmodel extends CI_Model{
  /**
   * @name checkMember
   * @param type $login
   * @param type $password
   * @return array()
   */   
public function checkMember($login,$password){
     
  $sql="SELECT
            userid,
            login,
            PASSWORD,
            loginip,
            logintime,
            joburl,
            isActive
          FROM users
          WHERE login=".trim($this->db->escape($login))." AND PASSWORD=".trim($this->db->escape($password))."
          AND isActive='Y'";
     $query = $this->db->query($sql);
     if($query->num_rows()> 0){
            $row = $query->row();
            $data =array(
                "userid"=>$row->userid,
                "login"=>$row->login,
                "isActive"=>$row->isActive
				
            );

          return $data;
        }
        else{
            return $data=array(
                "userid"=>"",
                "login"=>"",
                "isActive"=>"N"
            );
        }
        
    }
    /**
     * @method userLoginUpdate 
     * @param type $userId
     * @param type $data
     */
    public function userLoginUpdate($userId, $data = array()) {
        try {
            $this->db->trans_begin();
            $this->db->where('userid', $userId);
            $this->db->update('users', $data);
            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
            } else {
                $this->db->trans_commit();
            }
        } catch (Exception $exc) {
            $this->db->trans_rollback();
        }
    }



//*********************model end*****************//
}