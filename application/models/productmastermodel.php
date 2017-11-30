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
class productmastermodel extends CI_Model{
    //put your code here
    public function __construct() {
        parent::__construct();
    }
    /**
     * @name getCategoryList
     * @return type array
     */
    public function getProductList(){
        $data=array();
        $sql="SELECT
                product_master.product_id,
                product_master.product_name,
                product_master.category_id,
                product_master.product_desc,
                product_master.uom_id,
                product_category.category_name,uom_master.uom,product_master.is_active
              FROM product_master
              LEFT JOIN product_category ON product_master.category_id = product_category.category_id 
              LEFT JOIN uom_master ON product_master.uom_id = uom_master.uom_id
              WHERE product_master.is_active='Y'
              ORDER BY product_name";
        $query=  $this->db->query($sql);
        if($query->num_rows()>0){
            foreach ($query->result() as $rows) {
                $data[]=array(
                    "product_id"=>$rows->product_id,
                    "product_name"=>$rows->product_name,
                    "product_desc"=>$rows->product_desc,
                    "category_id"=>$rows->category_id,
                    "uom_id"=>$rows->uom_id,
                    "category_name"=>$rows->category_name,
                    "uom"=>$rows->uom,
                    "is_active"=>$rows->is_active
                    
                );
                
            }
            return $data;
        }else{
            return $data;
        }
    }
    
    public function getProductById($productId){
        $data=array();
        $sql="SELECT
                    product_master.product_id,
                    product_master.product_name,
                    product_master.category_id,
                    product_master.product_desc,
                    product_master.uom_id,
            product_category.category_name,uom_master.uom,product_master.is_active
            FROM product_master
            LEFT JOIN product_category ON product_master.category_id = product_category.category_id 
            LEFT JOIN uom_master ON product_master.uom_id = uom_master.uom_id
            WHERE product_master.product_id=".(int)$productId;
        $query = $this->db->query($sql);
        if($query->num_rows()>0){
            
            $row=$query->row();
            
            $data=array(
                "product_id"=>$row->product_id,
                "product_name"=>$row->product_name,
                "category_id"=>$row->category_id,
                "product_desc"=>$row->product_desc,
                "uom_id"=>$row->uom_id,
                "category_name"=>$row->category_name,
                "uom"=>$row->uom,
                "is_active"=>$row->is_active
                
            );
        
            return $data;
        }else{
            $data=array(
                "product_id"=>"",
                "product_name"=>"",
                "category_id"=>"",
                "product_desc"=>"",
                "uom_id"=>"",
                "category_name"=>"",
                "uom"=>"",
                "is_active"=>""
            );
        
            return $data;
        }
        
    }
    /**
     * @method insertCategory
     * @param type $data
     */
    public function insertProduct($data=  array()){
        try {
                $this->db->trans_begin();
                $this->db->insert('product_master', $data);
                
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
    
    public function updateProduct($data = array(),$productId){
        
        try {
                $this->db->trans_begin();
                $this->db->where("product_id",$productId);
                $this->db->update('product_master', $data);
                
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
    
    public function delete($productId){
         try {
                $this->db->trans_begin();
                $data = array(
                                'is_active' => 'N',
                            );
                $this->db->where("product_id",$productId);
                $this->db->update('product_master', $data);
                
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
