<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of contactusmodel
 *
 * @author Dev
 */
class contactusmodel  extends CI_Model{
    //put your code here
    
    public function insertContact($data=  array()){
        try {
                $this->db->trans_begin();
                $this->db->insert('contactus', $data);
                
                if ($this->db->trans_status() === FALSE) {
                    $this->db->trans_rollback();
                    return FALSE;
                } else {
                    $this->db->trans_commit();
                    return TRUE;
                }
                
        } catch (Exception $exc) {
           $this->db->trans_rollback();
           return FALSE;
        }
    }
    
}
