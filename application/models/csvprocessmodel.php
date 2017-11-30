<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of csvprocessmodel
 *
 * @author Dev
 */
class csvprocessmodel extends CI_Model{
    
    //put your code here
    
     private $cds = 'v_csvdata';

    function __construct() {
        
    }
    
    
    
    public function createMySqlTable($data=  array()){
        $this->db->trans_begin();

        $this->db->from('csvdata');
        $this->db->truncate();


        foreach ($data as $value) {
            $changedt = "";
            if ($value["Change date"] == "") {
                $changedt = "";
            } else {
                $dt = explode('/', $value["Change date"]);
                $changedt = $dt[0] . "-" . $dt[1] . "-" . $dt[2];
            }
            $createddt = "";
            if ($value["Created date"] == "") {
                $createddt = "";
            } else {
                $dt = explode('/', $value["Created date"]);
                $createddt = $dt[0] . "-" . $dt[1] . "-" . $dt[2];
            }



            $insrtData = array(
                "Alphsorted" => $value["Alph. sorted"],
                "Changedate" => ($changedt == "" ? NULL : date("Y-m-d", strtotime($changedt))),
                "Changecomment" => $value["Change comment"],
                "Createddate" => ($createddt == "" ? NULL : date("Y-m-d", strtotime($createddt))),
                "NPUcode" => $value["NPU code"],
                "Shortdefinition" => $value["Short definition"],
                "System" => $value["System"],
                "Sysspec" => $value["Sys-spec."],
                "Prefix" => $value["Prefix"],
                "Component" => $value["Component"],
                "Compspec" => $value["Comp-spec."],
                "Kindofproperty" => $value["Kind-of-property"],
                "Proc" => $value["Proc."],
                "Unit" => $value["Unit"],
                "Speciality" => $value["Speciality"],
                "Subspeciality" => $value["Sub-speciality"],
                "TYPE" => $value["Type"],
                "Codevalue" => $value["Code value"],
                "Contextdependant" => $value["Context dependant"],
                "Scaletype" => $value["Scale type"],
                "Rule" => $value["Rule"],
                "Active" => $value["Active"]
            );

            $this->db->insert("csvdata", $insrtData);
        }
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
        } else {
            $this->db->trans_commit();
        }
    }
    public function getList(){
        $data=  array();
        $sql="SELECT 
                id,
                DATE_FORMAT(Changedate,'%d/%m/%Y')AS Changedate,
                Changecomment,
                DATE_FORMAT(Createddate,'%d/%m/%Y')AS Createddate,
                NPUcode,
                Shortdefinition,
                System,
                Prefix,
                Component,
                Kindofproperty,
                Unit,
                TYPE,
                Scaletype,
                (CASE Active
                WHEN Active=1 THEN 'active'
                ELSE 'retired'
              END)AS Active
              FROM csvdata LIMIT 0,100";
       
        
       $query=  $this->db->query($sql);
       if ($query->num_rows() > 0) {
            foreach ($query->result() as $rows) {
                $data[] = array(
                    "id" => $rows->id,
                    "Changedate" => $rows->Changedate,
                    "Changecomment" => $rows->Changecomment,
                    "Createddate" => $rows->Createddate,
                    "NPUcode" => $rows->NPUcode,
                    "Shortdefinition" => $rows->Shortdefinition,
                    "System" => $rows->System,
                    "Prefix" => $rows->Prefix,
                    "Component"=>$rows->Component,
                    "Kindofproperty"=>$rows->Kindofproperty,
                    "Unit"=>$rows->Unit,
                    "TYPE"=>$rows->TYPE,
                    "Scaletype"=>$rows->Scaletype,
                    "Active"=>$rows->Active
                    
                );
            }
            
            return $data;
        }  else {
            return $data;
        }
        
    }
    
     function get_csv_list() {
        /* Array of table columns which should be read and sent back to DataTables. Use a space where
         * you want to insert a non-database field (for example a counter or static image)
         */
        $aColumns = array(
                    "Changedate",
                    "Changecomment",
                    "Createddate",
                    "NPUcode",
                    "Shortdefinition",
                    "System",
                    "Prefix",
                    "Component",
                    "Kindofproperty",
                    "Unit",
                    "TYPE",
                    "Scaletype",
                    "Active"
            
            );

        /* Indexed column (used for fast and accurate table cardinality) */
        $sIndexColumn = "id";

        /* Total data set length */
        $sQuery = "SELECT COUNT('" . $sIndexColumn . "') AS row_count
            FROM $this->cds";
        $rResultTotal = $this->db->query($sQuery);
        $aResultTotal = $rResultTotal->row();
        $iTotal = $aResultTotal->row_count;

        /*
         * Paging
         */
        $sLimit = "";
        $iDisplayStart = $this->input->get_post('start', true);
        $iDisplayLength = $this->input->get_post('length', true);
        if (isset($iDisplayStart) && $iDisplayLength != '-1') {
            $sLimit = "LIMIT " . intval($iDisplayStart) . ", " .
                    intval($iDisplayLength);
        }

        $uri_string = $_SERVER['QUERY_STRING'];
        $uri_string = preg_replace("/%5B/", '[', $uri_string);
        $uri_string = preg_replace("/%5D/", ']', $uri_string);

        $get_param_array = explode("&", $uri_string);
        $arr = array();
        foreach ($get_param_array as $value) {
            $v = $value;
            $explode = explode("=", $v);
            $arr[$explode[0]] = $explode[1];
        }
        

        $index_of_columns = strpos($uri_string, "columns", 1);
        $index_of_start = strpos($uri_string, "start");
        $uri_columns = substr($uri_string, 7, ($index_of_start - $index_of_columns - 1));
        $columns_array = explode("&", $uri_columns);
        $arr_columns = array();
        foreach ($columns_array as $value) {
            $v = $value;
            $explode = explode("=", $v);
            if (count($explode) == 2) {
                $arr_columns[$explode[0]] = $explode[1];
            } else {
                $arr_columns[$explode[0]] = '';
            }
        }

        /*
         * Ordering
         */
        $sOrder = "ORDER BY ";
        $sOrderIndex = $arr['order[0][column]'];
        $sOrderDir = $arr['order[0][dir]'];
        $bSortable_ = $arr_columns['columns['.$sOrderIndex.'][orderable]'];
        if ($bSortable_ == "true") {
            $sOrder .= $aColumns[$sOrderIndex] .
                    ($sOrderDir === 'asc' ? ' asc' : ' desc');
        }

        /*
         * Filtering
         */
        $sWhere = "";
        $sSearchVal = trim($arr['search[value]']);
        
        if (isset($sSearchVal) && $sSearchVal != '') {
            $sWhere = "WHERE (";
            for ($i = 0; $i < count($aColumns); $i++) {
                $sWhere .= $aColumns[$i] . " LIKE '%" . $this->db->escape_like_str($sSearchVal) . "%' OR ";
            }
            $sWhere = substr_replace($sWhere, "", -3);
            $sWhere .= ')';
            
        }

        /* Individual column filtering */
        $sSearchReg = $arr['search[regex]'];
        for ($i = 0; $i < count($aColumns); $i++) {
            $bSearchable_ = $arr['columns['.$i.'][searchable]'];
            if (isset($bSearchable_) && $bSearchable_ == "true" && $sSearchReg != 'false') {
                $search_val = $arr['columns['.$i.'][search][value]'];
                if ($sWhere == "") {
                    $sWhere = "WHERE ";
                } else {
                    $sWhere .= " AND ";
                }
                $sWhere .= $aColumns[$i] . " LIKE '%" . $this->db->escape_like_str($search_val) . "%' ";
            }
        }


        /*
         * SQL queries
         * Get data to display
         */
        $sQuery = "SELECT SQL_CALC_FOUND_ROWS " . str_replace(" , ", " ", implode(", ", $aColumns)) . "
        FROM $this->cds
        $sWhere
        $sOrder
        $sLimit
        ";
        $rResult = $this->db->query($sQuery);
        

        /* Data set length after filtering */
        $sQuery = "SELECT FOUND_ROWS() AS length_count";
        $rResultFilterTotal = $this->db->query($sQuery);
        $aResultFilterTotal = $rResultFilterTotal->row();
        $iFilteredTotal = $aResultFilterTotal->length_count;

        /*
         * Output
         */
        $sEcho = $this->input->get_post('draw', true);
        $output = array(
            "draw" => intval($sEcho),
            "recordsTotal" => $iTotal,
            "recordsFiltered" => $iFilteredTotal,
            "data" => array()
        );

        foreach ($rResult->result_array() as $aRow) {
            $row = array();
            foreach ($aColumns as $col) {
                $row[] = $aRow[$col];
            }
            $output['data'][] = $row;
        }

        return $output;
    }

    
    
    
}
