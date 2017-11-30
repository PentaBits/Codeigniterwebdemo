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
class purchaseordermodel extends CI_Model{
    //put your code here
    public function __construct() {
        parent::__construct();
    }
    /**
     * @name getCategoryList
     * @return type array
     */
    public function getPurchaseOrderList(){
        $data=array();
        $sql="SELECT
                po_master.po_id,
                date_format(po_master.po_date,'%d-%m-%Y')as po_date,
                po_master.po_number,
                po_master.vendor_id,
                po_master.total_amount,vendor_master.vendor_name
              FROM po_master
              INNER JOIN
              vendor_master ON po_master.vendor_id = vendor_master.vendor_id
              WHERE po_master.is_active='Y'";
        $query=  $this->db->query($sql);
        if($query->num_rows()>0){
            foreach ($query->result() as $rows) {
                $data[]=array(
                    "id"=>$rows->po_id,
                    "po_date"=>$rows->po_date,
                    "po_number"=>$rows->po_number,
                    "total_amount"=>$rows->total_amount,
                    "vendor_name"=>$rows->vendor_name,
                  
                );
                
            }
            return $data;
        }else{
            return $data;
        }
    }
    
    public function getPurchaseOrderMasterById($purcOrdId){
        $data=array();
        $sql="SELECT
                po_master.po_id,
                DATE_FORMAT(po_master.po_date,'%d-%m-%Y')AS po_date,
                po_master.po_number,
                po_master.vendor_id,
                po_master.total_amount
              FROM po_master
              WHERE 
              po_master.po_id =".(int)$purcOrdId;
        $query = $this->db->query($sql);
        if($query->num_rows()>0){
            
            $row=$query->row();
            
            $data=array(
                "po_id"=>$row->po_id,
                "po_date"=>$row->po_date,
                "po_number"=>$row->po_number,
                "vendor_id"=>$row->vendor_id,
                "total_amount"=>$row->total_amount,
             );
        
            return $data;
        }else{
          $data=array(
                "po_id"=>$row->po_id,
                "po_date"=>$row->po_date,
                "po_number"=>$row->po_number,
                "vendor_id"=>$row->vendor_id,
                "total_amount"=>$row->total_amount,
             );
        
            return $data;
        }
        
    }
    public function getPurchaseOrderDetailById($purcOrdId){
        $data = array();
        $sql = "SELECT
                po_detail.id,
                po_detail.pm_id,
                po_detail.product_id,
                po_detail.qty,
                po_detail.rate,
                po_detail.amount,
                product_master.product_name,uom_master.uom
              FROM po_detail
              INNER JOIN
              product_master ON po_detail.product_id = product_master.product_id
              LEFT JOIN
              uom_master ON uom_master.uom_id = product_master.uom_id
              WHERE 
              po_detail.pm_id = " . (int) $purcOrdId;
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {

            foreach ($query->result() as $rows) {
                $data[] = array(
                    "id" => $rows->id,
                    "pm_id" => $rows->pm_id,
                    "product_id" => $rows->product_id,
                    "qty" => $rows->qty,
                    "rate" => $rows->rate,
                    "amount" => $rows->amount,
                    "product_name" => $rows->product_name,
                    "uom" => $rows->uom
                );
            }
            return $data;
        } else {

            return $data;
        }
    }
    /**
     * @method insertPurchaseOrder
     * @param type $data
     */
    public function insertPurchaseOrder($data=  array(),$poDtl=  array()){
        try {
                $this->db->trans_begin();
                $this->db->insert('po_master', $data);
                $lastInsertId = $this->db->insert_id();
                $this->insertUpdatePurchaseOrderDetail($poDtl,$lastInsertId);
                
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
    /**
     * 
     * @param type $PoDtl
     * @param type $masterid
     */
    public function insertUpdatePurchaseOrderDetail($PoDtl=  array(),$masterid){
        $this->db->where("pm_id", $masterid);
        $this->db->delete("po_detail");
        
        foreach ($PoDtl as $value) {
                    $dtl=array(
                        "pm_id"=>$masterid,
                        "product_id"=>$value["productid"],
                        "qty"=>$value["qty"],
                        "rate"=>$value["rate"],
                        "amount"=>$value["amt"]
                    );
                   $this->db->insert("po_detail",$dtl); 
                }
     }
    
    public function updatePurchaseOrder($data = array(),$purchaseOrderId,$poDtl=  array()){
        
        try {
                $this->db->trans_begin();
                $this->db->where("po_id",$purchaseOrderId);
                $this->db->update('po_master', $data);
                
                $this->insertUpdatePurchaseOrderDetail($poDtl,$purchaseOrderId);
                
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
    
    public function delete($purchaseorderId){
         try {
                $this->db->trans_begin();
                $data = array(
                                'is_active' => 'N',
                            );
                $this->db->where("po_id",$purchaseorderId);
                $this->db->update('po_master', $data);
                
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
    
    public function getUomByProductId($productid){
        $unitofmsrmnt="";
        $sql="SELECT uom_master.uom
                FROM
              product_master
              INNER JOIN
              uom_master ON product_master.uom_id = uom_master.uom_id
              WHERE product_master.product_id = ".(int)$productid;
        $query = $this->db->query($sql);
        if($query->num_rows()>0){
            $rows = $query->row();
            $unitofmsrmnt = $rows->uom;
        }
        return $unitofmsrmnt;
    }
    
}
