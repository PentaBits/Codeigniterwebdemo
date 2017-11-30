<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of vendormastermodel
 *
 * @author Dev
 */
class vendormastermodel extends CI_Model{
    //put your code here
    public function __construct() {
        parent::__construct();
    }
    
    public function getVendorList(){
        $data=array();
        $sql="select
                vendor_id,
                vendor_name,
                vendor_address
              from vendor_master ORDER BY vendor_name";
        $query=  $this->db->query($sql);
        if($query->num_rows()>0){
            foreach ($query->result() as $rows) {
                $data[]=array(
                    "vendor_id"=>$rows->vendor_id,
                    "vendor_name"=>$rows->vendor_name,
                    "vendor_address"=>$rows->vendor_address,
                    
                    
                );
                
            }
            return $data;
        }else{
            return $data;
        }
    }
}
