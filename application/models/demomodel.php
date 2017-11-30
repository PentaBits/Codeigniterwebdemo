<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of demomodel
 *
 * @author Dev
 */
class demomodel extends CI_Model{
    /**
     * @name getList
     * @return array of employees
     */
    public function getList($userId=NULL){
        $data=array();
        if($userId!=""){
        $sql="SELECT
                employee_master.id,
                employee_master.firstname,
                employee_master.lastname,
                employee_master.sex,
                DATE_FORMAT(employee_master.dob,'%d-%m-%Y')AS dob,
                employee_master.departmentid,
                employee_master.mobile,
                employee_master.email,
                employee_master.resume,
                employee_master.image,
                employee_master.address,
                department_master.departmentname
              FROM employee_master
              INNER JOIN
              department_master ON employee_master.departmentid = department_master.id
              WHERE employee_master.userid='".$userId."'";
        }else{
          $sql=  "SELECT
                employee_master.id,
                employee_master.firstname,
                employee_master.lastname,
                employee_master.sex,
                DATE_FORMAT(employee_master.dob,'%d-%m-%Y')AS dob,
                employee_master.departmentid,
                employee_master.mobile,
                employee_master.email,
                employee_master.resume,
                employee_master.image,
                employee_master.address,
                department_master.departmentname
              FROM employee_master
              INNER JOIN
              department_master ON employee_master.departmentid = department_master.id";
              
        }
        $query = $this->db->query($sql);
         if ($query->num_rows() > 0) {
            foreach ($query->result() as $rows) {
                $data[] = array(
                    "id" => $rows->id,
                    "firstname" => $rows->firstname,
                    "lastname" => $rows->lastname,
                    "sex" => $rows->sex,
                    "dob" => $rows->dob,
                    "departmentid" => $rows->departmentid,
                    "mobile" => $rows->mobile,
                    "departmentname" => $rows->departmentname,
                    "email"=>$rows->email,
                    "image"=>$rows->image
                );
            }
            return $data;
        }  else {
            return $data;
        }
        
    }
    
    
    public function insert($data){
        try {
                $this->db->trans_begin();
                $this->db->insert('employee_master', $data);
                //echo($this->db->last_query());
                if ($this->db->trans_status() === FALSE) {
                    $this->db->trans_rollback();
                    return FALSE;
                } else {
                    $this->db->trans_commit();
                    return TRUE;
                }
            
        } catch (Exception $exc) {
            $this->db->trans_rollback();
            return false;
        }
    }
    
    public function update($employeeId,$data){
            try {
                $this->db->trans_begin();
                $this->db->where("id",$employeeId);
                $this->db->update('employee_master', $data);
                if ($this->db->trans_status() === FALSE) {
                    $this->db->trans_rollback();
                    return FALSE;
                } else {
                    $this->db->trans_commit();
                    return TRUE;
                }
            
        } catch (Exception $exc) {
            $this->db->trans_rollback();
            return false;
        }
        
    }
    
    /**
     * @name getDataById
     * @param type $employeeId
     * @return type
     */
    
    public function getDataById($employeeId){
        $data=array();
        $sql="SELECT
                id,
                firstname,
                lastname,
                sex,
                DATE_FORMAT(dob,'%d-%m-%Y') AS dob,
                departmentid,
                mobile,
                email,
                RESUME,
                image,
                address,
                userid
              FROM employee_master
              WHERE id =".$employeeId;
        $query =  $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $result = $query->row();
            $data=array(
                "id"=>$result->id,
                "firstname"=>$result->firstname,
                "lastname"=>$result->lastname,
                "sex"=>$result->sex,
                "dob"=>$result->dob,
                "departmentid"=>$result->departmentid,
                "mobile"=>$result->mobile,
                "email"=>$result->email,
                "RESUME"=>$result->RESUME,
                "image"=>$result->image,
                "address"=>$result->address,
                "userid"=>$result->userid
            );
            
            return $data;
        }else{
            
            return $data;
        }
    }
    
    public function delete($employeeId){
        
        try {
                $this->db->trans_begin();
                $this->db->where("id",$employeeId);
                $this->db->delete('employee_master');
                if ($this->db->trans_status() === FALSE) {
                    $this->db->trans_rollback();
                    return FALSE;
                } else {
                    $this->db->trans_commit();
                    return TRUE;
                }
            
        } catch (Exception $exc) {
            $this->db->trans_rollback();
            return false;
        }
    }
    
    public function getImageName($employeeId){
        
        
        $image="";
        $sql="SELECT image FROM employee_master WHERE employee_master.id='".$employeeId."'";
        $query=$this->db->query($sql);
        if($query->num_rows()>0){
            $result=$query->row();
            $image=$result->image;
            
        }
        return $image;
    }
}
