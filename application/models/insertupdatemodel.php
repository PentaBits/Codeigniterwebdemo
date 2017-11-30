<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class insertupdatemodel extends CI_Model{
	/* 
		@insertData('name of table','insert value as array')
		@date 22.03.2017
		@By Mithilesh
	*/
	
	public function insertData($tablename,$insertArray){
		try{
            $this->db->trans_begin();
            $this->db->insert($tablename, $insertArray);

            if($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                return false;
            } else {
                $this->db->trans_commit();
                return true;
            }
        }
		catch (Exception $err) {
            echo $err->getTraceAsString();
        }
	}
	
}