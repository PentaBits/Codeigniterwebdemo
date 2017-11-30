<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of departmentmodel
 *
 * @author Dev
 */
class departmentmodel extends CI_Model {
    //put your code here
    /**
     * getAllDepartment()
     * @return type
     */
    public function  getAllDepartment(){
        $dataDepartment = array();
        $sql="SELECT
                  id,
                  departmentname,
                  departmentdesc
                FROM department_master ORDER BY departmentname";
        $query=  $this->db->query($sql);
        if($query->num_rows()>0){
            foreach($query->result() as $rows){
                $dataDepartment[]=array(
                    "id"=>$rows->id,
                    "departmentname"=>$rows->departmentname,
                    "departmentdesc"=>$rows->departmentdesc
                );
            }
        
            return $dataDepartment;
            }  else {
                return$dataDepartment;
            }
        
}



}
