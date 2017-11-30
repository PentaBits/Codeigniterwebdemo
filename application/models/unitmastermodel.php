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
class unitmastermodel extends CI_Model{
    //put your code here
    public function __construct() {
        parent::__construct();
    }
    /**
     * @name getCategoryList
     * @return type array
     */
    public function getUomList(){
        $data=array();
        $sql="SELECT
                uom_id,
                uom
              FROM uom_master WHERE is_active='Y'
              ORDER BY uom";
        $query=  $this->db->query($sql);
        if($query->num_rows()>0){
            foreach ($query->result() as $rows) {
                $data[]=array(
                    "uom_id"=>$rows->uom_id,
                    "uom"=>$rows->uom,
                );
                
            }
            return $data;
        }else{
            return $data;
        }
    }
    
    public function getUomById($unitid){
        $data=array();
        $sql="SELECT
                uom_id,
                uom
              FROM uom_master
              WHERE uom_master.uom_id=".(int)$unitid;
        $query = $this->db->query($sql);
        if($query->num_rows()>0){
            
            $row=$query->row();
            
            $data=array(
                "uom_id"=>$row->uom_id,
                "uom"=>$row->uom,
                
                
            );
        
            return $data;
        }else{
            $data=array(
                "uom_id"=>"",
                "uom"=>"",
            );
        
            return $data;
        }
        
    }
    /**
     * @method insertCategory
     * @param type $data
     */
    public function insertUom($data=  array()){
        try {
                $this->db->trans_begin();
                $this->db->insert('uom_master', $data);
                
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
    
    public function updateUom($data = array(),$unitid){
        
        try {
                $this->db->trans_begin();
                $this->db->where("uom_id",$unitid);
                $this->db->update('uom_master', $data);
                
                if ($this->db->trans_status() === FALSE) {
                    $this->db->trans_rollback();
                    return FALSE;
                } else {
                    $this->db->trans_commit();
                    return TRUE;
                }
        } catch (Exception $ex) {
             $this->db->trans_rollback();
             return FALSE;
        }
    }
    
    public function delete($unitid){
         try {
                $this->db->trans_begin();
                $data = array(
                                'is_active' => 'N',
                            );
                $this->db->where("uom_id",$unitid);
                $this->db->update('uom_master', $data);
                
                if ($this->db->trans_status() === FALSE) {
                    $this->db->trans_rollback();
                    return FALSE;
                } else {
                    $this->db->trans_commit();
                    return TRUE;
                }
        } catch (Exception $ex) {
             $this->db->trans_rollback();
             return FALSE;
        }
    }
    
}
