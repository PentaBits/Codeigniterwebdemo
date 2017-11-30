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
class productcategorymodel extends CI_Model{
    //put your code here
    public function __construct() {
        parent::__construct();
    }
    /**
     * @name getCategoryList
     * @return type array
     */
    public function getCategoryList(){
        $data=array();
        $sql="SELECT
                category_id,
                category_name,
                category_desc,
                is_active
            FROM product_category 
            WHERE  is_active='Y'
            ORDER BY category_name ";
        $query=  $this->db->query($sql);
        if($query->num_rows()>0){
            foreach ($query->result() as $rows) {
                $data[]=array(
                    "category_id"=>$rows->category_id,
                    "category_name"=>$rows->category_name,
                    "category_desc"=>$rows->category_desc,
                    "is_active"=>$rows->is_active
                );
                
            }
            return $data;
        }else{
            return $data;
        }
    }
    
    public function getCategoryById($categoryId){
        $data=array();
        $sql="SELECT
                category_id,
                category_name,
                category_desc,
                is_active
            FROM product_category 
            WHERE  is_active='Y' AND category_id=".$categoryId."";
        $query = $this->db->query($sql);
        if($query->num_rows()>0){
            
            $row=$query->row();
            
            $data=array(
                "category_id"=>$row->category_id,
                "category_name"=>$row->category_name,
                "category_desc"=>$row->category_desc
            );
        
            return $data;
        }else{
            $data=array(
                "category_id"=>"",
                "category_name"=>"",
                "category_desc"=>""
            );
        
            return $data;
        }
        
    }
    /**
     * @method insertCategory
     * @param type $data
     */
    public function insertCategory($data=  array()){
        try {
                $this->db->trans_begin();
                $this->db->insert('product_category', $data);
                
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
    
    public function updateCategory($data = array(),$categoryId){
        
        try {
                $this->db->trans_begin();
                $this->db->where("category_id",$categoryId);
                $this->db->update('product_category', $data);
                
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
    
    public function delete($categoryId){
         try {
                $this->db->trans_begin();
                $data = array(
                                'is_active' => 'N',
                            );
                $this->db->where("category_id",$categoryId);
                $this->db->update('product_category', $data);
                
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
