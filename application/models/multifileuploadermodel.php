<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of multifileuploadermodel
 *
 * @author Dev
 */
class multifileuploadermodel extends CI_Model{
    //put your code here
     public function insertFilesData($data=  array()){
        try {
                $this->db->trans_begin();
                $this->db->insert('multifilesdata', $data);
                
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
    
    public function getUploadedFiles($userId){
        $data=array();
        $sql="SELECT
                id,
                filename,
                thumbnail,
                userid,
                date_format(uploaddate,'%d-%m-%Y')as uploaddate
              FROM multifilesdata
              WHERE userid=".intval($userId);
        
        $query = $this->db->query($sql);
        if($query->num_rows()>0){
            foreach ($query->result() as $row) {
                $filesysarr = explode('~', $row->filename);
                $realfilename=$filesysarr[1];
                $data[]=array(
                    "id"=>$row->id,
                    "filename"=>$row->filename,
                    "thumbnail"=>$row->thumbnail,
                    "userid"=>$row->userid,
                    "uploaddate"=>$row->uploaddate,
                    "realfilename"=>$realfilename
                );
            }
            return $data;
        }else{
            return $data;
        }
    }
    
    public function getFileNameById($fileId){
        
        $fileName = "";
        $sql = "SELECT
                id,
                filename,
                thumbnail,
                userid,
                uploaddate
              FROM multifilesdata
              WHERE id=" . intval($fileId);
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $fileName = $row->filename;
           return $fileName;
        } else {
            return $fileName;
        }
    }
    
    
     public function delete($fileid){
         try {
                $this->db->trans_begin();
               
                $this->db->where("id",$fileid);
                $this->db->delete('multifilesdata');
                
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
