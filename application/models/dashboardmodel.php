<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Model developed for mantra health zone member
 * @author Abhik
 * @date 01/02/2017
 */
class dashboardmodel extends CI_Model {
    
    public function getMemberCashBackPoint($membershipnumber,$validityString){
       $cashback=array(
           "total_point"=>0,
           "cash_back_amt"=>0,
       );
     $sql = "SELECT 
            IFNULL(cash_back_master.`total_point`,0) as total_point ,
            IFNULL(cash_back_master.`cash_back_amt`,0)as cash_back_amt
            FROM `cash_back_master`
            WHERE 
            `cash_back_master`.`id` =(SELECT MAX(`cash_back_master`.`id`) FROM `cash_back_master`
            WHERE
            cash_back_master.`membership_no` ='".$membershipnumber."'
            AND cash_back_master.`validity_string` ='".$validityString."')";
        
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
                $row = $query->row();
                $cashback=array(
                    "total_point"=>$row-> total_point,
                    "cash_back_amt"=>$row->cash_back_amt,
                   
                );
                
        }
        return $cashback;
        
        
    }
    
    public function getExtensionDays($membershipno,$validitystring){
        $grantDays = 0;
        $sql="SELECT `application_extension`.`grant_days` 
                FROM `application_extension`
                WHERE
                `application_extension`.`tran_id` = (SELECT MAX(application_extension.`tran_id`) 
                FROM application_extension WHERE application_extension.`membership_no`='".$membershipno."'
                AND application_extension.`validity_period` ='".$validitystring."')";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
                $row = $query->row();
                $grantDays = (int)$row->grant_days;
                
        }
        return $grantDays;
    }
    
    public function getAttendanceRate($fromDate,$validUpto,$memberNo){
        $totalattDays =0;
        $currentDate =date('Y-m-d');
        $sql="SELECT COUNT(tran_id)as attday FROM `member_attendance`
            WHERE member_attendance.`membershipno`='".$memberNo."'
            AND member_attendance.`att_date` BETWEEN '".$fromDate."' AND '".$validUpto."'";
        
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
                $row = $query->row();
                $totalattDays = (int)$row->attday;
                
        }
        
          $date_diff=strtotime($currentDate) - strtotime($fromDate);
          //$days = floor(($date_diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24))+1;
          $days=floor($date_diff / (60 * 60 * 24));
             if ($days>0)
             {
               $att_rate=number_format($totalattDays*100/$days,2);
               $att_rate_str=$att_rate;
             } 
             else
             {
              $att_rate_str="";
             }
             return $att_rate_str;
    }
    
    public  function getPackageHistory($mobileno,$validitystring){
        $packagehistory = array();
          $sql ="SELECT 
                customer_master.`CUS_NAME`,
                card_master.`CARD_DESC`,
                customer_master.`MEMBERSHIP_NO`,
                payment_master.`SUBSCRIPTION`,
                date_format(payment_master.`FROM_DT`,'%d-%m-%Y') as FROM_DT ,
                date_format (payment_master.`VALID_UPTO`,'%d-%m-%Y') as VALID_UPTO,
                payment_master.`VALIDITY_STRING`,
                payment_master.`CUST_ID`,
                IF(payment_master.`VALIDITY_STRING`='".$validitystring."',1,0)AS active
                FROM 
                customer_master 
                LEFT JOIN
                `card_master` ON customer_master.`CUS_CARD` = card_master.`CARD_CODE` 
                INNER JOIN
                payment_master ON customer_master.`MEMBERSHIP_NO` = payment_master.`MEMBERSHIP_NO`
                WHERE  customer_master.`CUS_PHONE` ='".$mobileno."' 
				/*AND payment_master.`SUBSCRIPTION` IS NOT NULL*/
                ORDER BY payment_master.`FROM_DT` DESC  LIMIT 0,6";
        $query = $this->db->query($sql);
        
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $rows) {
                $packagehistory[] = array( 
                                 "CARD_DESC" => $rows->CARD_DESC,
                                 "MEMBERSHIP_NO"=>$rows->MEMBERSHIP_NO,
				 "SUBSCRIPTION"=>$rows->SUBSCRIPTION,	
                                 "FROM_DT"=> $rows->FROM_DT,
                                 "VALID_UPTO"=>$rows->VALID_UPTO,
				 "active"=>$rows->active
                        );
            }
        }
        return $packagehistory;
        
    }
	
	/*--------MIthilesh-------*/
	/*---Getting all active package -----*/
	
	public function getActivepackages($mobileno)
	{
		$data = array();
		$where = array(
			"customer_master.CUS_PHONE" => $mobileno,
			"customer_master.IS_ACTIVE" => 'Y'
		);
		$this->db->select(
			'customer_master.CUS_NAME,
			 customer_master.MEMBERSHIP_NO,
			 customer_master.CUS_CARD,
			 customer_master.pack_type,
			 card_master.CARD_DESC'			 
			)
		    ->from('customer_master')
			->join('card_master','card_master.CARD_CODE=customer_master.CUS_CARD','LEFT')
			->where($where);
		$query = $this->db->get();
		
		//$this->db->last_query();
		
		if($query->num_rows()>0)
		{
			foreach ($query->result() as $row)
			{
				$data[] = array(
					"membership_no" => $row->MEMBERSHIP_NO,
					"cus_card" => $row->CUS_CARD,
					"cus_name" => $row->CUS_NAME,
					"pack_type" => $row->pack_type,
					"card_desc" => $row->CARD_DESC,
					"paymentInfo" => $this->getPaymentInfo($row->MEMBERSHIP_NO)
				);
			}
			return $data;
		}
		return $data;
			
	}
	
	public function getPaymentInfo($membership)
	{
		$data = array();
		$date = date('Y-m-d');
		$sql = "SELECT * FROM payment_master
				WHERE payment_master.`MEMBERSHIP_NO`='".$membership."'
				AND payment_master.`FRESH_RENEWAL` IN ('R','F')
				AND payment_master.VALID_UPTO >= '".$date."' 
				AND payment_master.FROM_DT <= '".$date."'
				ORDER BY payment_master.PAYMENT_ID DESC , payment_master.`VALID_UPTO` DESC
				LIMIT 1";
		
		$query = $this->db->query($sql);
		if($query->num_rows()>0)
		{
			$row = $query->row();
			$data = array(
				"from_dt" => $row->FROM_DT,
				"validupto_dt" => $row->VALID_UPTO,
				"subscription" => $row->SUBSCRIPTION,
				"paid_amount" => $row->AMOUNT,
				"validity_string" => $row->VALIDITY_STRING,
				"fresh_renewal" => $row->FRESH_RENEWAL,
				"due_amount" => $this->getDueAmount($membership,$row->VALIDITY_STRING)
			);
		}
		else
		{
			$data = array();
		}
		
		return $data;
	}
	
	
	
	/*---------Get Advance Packages---------*/
	public function getAdvancepackages($mobileno)
	{
		$data =array();
		  $sql = "SELECT 
				  customer_master.CUS_ID AS id,
				  customer_master.CUS_CARD,
				  customer_master.CUS_NAME,
				  customer_master.pack_type,
				  card_master.CARD_DESC,	
				  payment_master.`MEMBERSHIP_NO`,
				  payment_master.`VALIDITY_STRING`,
				  payment_master.FROM_DT,
				  payment_master.`VALID_UPTO`, 
				  payment_master.`SUBSCRIPTION`, 
				  payment_master.`AMOUNT`, 
				  payment_master.`FRESH_RENEWAL` 
				FROM
				  payment_master 
				  INNER JOIN customer_master 
				  ON customer_master.`MEMBERSHIP_NO` = payment_master.`MEMBERSHIP_NO` 
				   INNER JOIN card_master
				   ON card_master.`CARD_CODE`=customer_master.`CUS_CARD` 
				WHERE payment_master.`MEMBERSHIP_NO` IN 
				(
				  SELECT customer_master.`MEMBERSHIP_NO` FROM customer_master 
				WHERE 
					customer_master.`CUS_PHONE` = '".$mobileno."'
					AND customer_master.`IS_ACTIVE` = 'Y'
				) 
				    AND payment_master.`FROM_DT` > CURDATE() 
				    AND payment_master.`FRESH_RENEWAL` IN ('F', 'R') ORDER BY payment_master.FROM_DT,payment_master.PAYMENT_ID";
				
		$query = $this->db->query($sql);
		if($query->num_rows()>0)
			{
				foreach($query->result() as $rows):
					$data[] = array(
						"membership_no" => $rows->MEMBERSHIP_NO,
						"cus_card" => $rows->CUS_CARD,
						"cus_name" => $rows->CUS_NAME,
						"pack_type" => $rows->pack_type,
						"card_desc" => $rows->CARD_DESC,
						"from_dt" => $rows->FROM_DT,
						"validupto_dt" => $rows->VALID_UPTO,
						"subscription" => $rows->SUBSCRIPTION,
						"paid_amount" => $rows->AMOUNT,
						"validity_string" => $rows->VALIDITY_STRING,
						"fresh_renewal" => $rows->FRESH_RENEWAL,
						"due_amount" => $this->getDueAmount($rows->MEMBERSHIP_NO,$rows->VALIDITY_STRING)
					); 
				endforeach;
				
				return $data;
			}
			return $data;
		
	}
	
	
	public function getDueAmount($membership,$validity)
	{
		$dueAmount = 0;
		$totalSubscription = $this->getTotalSubscriptionAmount($membership,$validity);
		$totalPaid = $this->getTotalPaidAmount($membership,$validity);
		$dueAmount = $totalSubscription-$totalPaid;
		return $dueAmount;
	}
	
	private function getTotalSubscriptionAmount($membership,$validity)
	{
		$totalSubscriptionAmount = 0;
		$sql = "SELECT 
			COALESCE(SUM(payment_master.`SUBSCRIPTION`),0) AS totalSubscription
			FROM payment_master 
			WHERE MEMBERSHIP_NO = '".$membership."' 
			  AND VALIDITY_STRING = '".$validity."' 
			  AND (FRESH_RENEWAL != 'P' AND FRESH_RENEWAL != 'D') 
			  ORDER BY payment_id DESC ";
			  
	    $query = $this->db->query($sql);
		if($query->num_rows()>0)
		{
			$row = $query->row();
			$totalSubscriptionAmount = $row->totalSubscription;
		}
		return $totalSubscriptionAmount;
	}
	
	private function getTotalPaidAmount($membership,$validity)
	{
		$totalPaidAmt = 0;
		$sql = "SELECT 
			  (
			  COALESCE(SUM(payment_master.AMOUNT),0) + 
			  COALESCE(SUM(payment_master.DISCOUNT_CONV),0)+
			  COALESCE(SUM(payment_master.DISCOUNT_OFFER),0) + 
			  COALESCE(SUM(payment_master.DISCOUNT_NEGO),0) + 
			  COALESCE(SUM(payment_master.CASHBACK_AMT),0)
			  ) AS totalPaidAmount FROM payment_master 
			  WHERE MEMBERSHIP_NO = '".$membership."' 
			  AND VALIDITY_STRING = '".$validity."'
			  AND FRESH_RENEWAL != 'P' 
			  ORDER BY payment_id DESC ";
			  
			$query = $this->db->query($sql);
			if($query->num_rows()>0)
			{
				$row = $query->row();
				$totalPaidAmt = $row->totalPaidAmount;
			}
			return $totalPaidAmt;
	}
	
	
	public function getPaymentInfoDetail($mno,$validity)
	{
		$data = array();
		$where = array(
			"payment_master.MEMBERSHIP_NO" => $mno,
			"payment_master.VALIDITY_STRING" => $validity
		);
		$ignore = array('P');
		$this->db->_protect_identifiers=false;
			$this->db->select('payment_master.PAYMENT_DT,
							   payment_master.SUBSCRIPTION,
							   payment_master.AMOUNT,
							   payment_master.payment_from,
							   (COALESCE(payment_master.DISCOUNT_CONV,0)+
							   COALESCE(payment_master.DISCOUNT_OFFER,0) + 
							   COALESCE(payment_master.DISCOUNT_NEGO,0) + 
							   COALESCE(payment_master.CASHBACK_AMT,0)) AS totalDiscount
							 ')
					 ->from('payment_master')
					 ->where($where)
					 ->where_not_in('payment_master.FRESH_RENEWAL',$ignore);
		
		    $query = $this->db->get();
			//echo $this->db->last_query();
			if($query->num_rows()>0)
			{
				foreach($query->result() as $rows):
					$data[] = array(
						"payment_date" => $rows->PAYMENT_DT,
						"subscription" => $rows->SUBSCRIPTION,
						"amountpaid" => $rows->AMOUNT,
						"totaldiscount" => $rows->totalDiscount,
						"payment_from" => $rows->payment_from,
						"payment_for_txt" => $this->getPaymentForLabel($rows->payment_from)
					); 
				endforeach;
			}
			return $data;
	}
	

	
	public function getPaymentForLabel($payment_from="")
	{	$payment_for_label = "";
		

	switch ($payment_from) {
		case "REG":
			return $payment_for_label= "Registration";
			break;
		case "REN":
			return $payment_for_label= "Renewal";
			break;
		case "CON":
			return $payment_for_label= "Package Conversion";
			break;
		case "CHL":
			return $payment_for_label = "Child Package";
			break;
		case "DUE":
			return $payment_for_label = "Due Paid";
		case "compl":
			return $payment_for_label = "Complimentary Product";
		case "PRODSALE":
			return $payment_for_label = "Product Purchase";
		default:
			return $payment_for_label = "";
		}
	
	
	}
	
	
	
	public function checkCashBackApplied($mebership,$validity){
		$isApplied = "";
		$where = array(
			"membership_no" => $mebership, 
			"validity_period" => $validity
		);
		
		$this->db->select('*')
				->from('cash_back_admin')
				->where($where);
		$query = $this->db->get();
		//echo $this->db->last_query();
		if($query->num_rows()>0){
			$isApplied='Y';
		}
		else{
			$isApplied='N';
		}
		return $isApplied;
	}
	
	public function getCardExtensionDays($cardcode){
		$where = array(
			"CARD_CODE" => $cardcode,
			"IS_ACTIVE" => 'Y'
		);
		$this->db->select('card_master.EXTENSION_DAYS')
				->from('card_master')
				->where($where);
		$query = $this->db->get();
		//echo $this->db->last_query();
		
		if($query->num_rows()>0){
			$row = $query->row();
			$extensionDys = $row->EXTENSION_DAYS;
		}else{
			$extensionDys = 0;
		}
		return $extensionDys;
	}
	
	/***************************************************/
	/********************** RENEWAL ******************/
	/***************************************************/
	
	public function getTaxPercentage($yearId){
		$tax_rate = 0;
		$where = array("year_id"=>$yearId,"is_active"=>'Y');
		$this->db->select('year_master.service_tax')
				->from('year_master')
				->where($where);
		$query = $this->db->get();
		if($query->num_rows()>0){
			$row = $query->row();
			$tax_rate = $row->service_tax;
		}
		return $tax_rate;
					
	}
	
	
	public function getRenewalSubscriptionAmount($branch,$card)
	{
		$renewalRate = 0;
		$where = array("branch_code" => $branch,"card_code" => $card);
			$this->db->select('rate_detail.renewal_rate')
					->from('rate_detail')
					->where($where);
		$query = $this->db->get();
		
		if($query->num_rows()>0){
			$row = $query->row();
			$renewalRate = $row->renewal_rate;
		}
		else{
			$renewalRate = 0;
		}
		return $renewalRate;
	}
	
	public function getApprovedCashBackAmt($membership,$validtystr){
		$cashbackAmt = 0;
		$where = array(
			"cash_back_admin.membership_no" =>$membership,
			"cash_back_admin.validity_period" =>$validtystr,
			"cash_back_admin.is_approved" =>'Y',
			"cash_back_admin.is_redeemed" =>'N'
		);
		
		$this->db->select('cash_back_admin.cash_bck_amt')
				 ->from('cash_back_admin')
				 ->where($where);
		$query = $this->db->get();
		if($query->num_rows()>0){
			$row = $query->row();
			$cashbackAmt = $row->cash_bck_amt;
		}
		else{
			$cashbackAmt = 0;
		}
		return $cashbackAmt;
		
	}

	public function getCardDuration($cardCode)
	{
		$cardduration = 0;
		$where = array(
				"CARD_CODE"=>$cardCode,
				"IS_ACTIVE"=>'Y'
				);
		$this->db->select('card_master.CARD_ACTIVE_DAYS')
				 ->from('card_master')
				 ->where($where);
		$query = $this->db->get();
		if($query->num_rows()>0)
		{
			$row = $query->row();
			$cardduration = $row->CARD_ACTIVE_DAYS;
		}
		else
		{
			$cardduration = 0;
		}
		return $cardduration;
		
		
	}
	
	// get Receipt serial no by branch and yearid
	
	public function getReceiptSerialbyBranch($branch,$yearid)
	{
		$latestSerialNo = 0;
		$where = array(
			"BRANCH_CODE" => $branch,
			"FIN_ID" => $yearid
		);
		
		$this->db->select('MAX(payment_master.RCPT_NO) AS latestSerial')
				 ->from('payment_master')
				 ->where($where);
		$query = $this->db->get();
		if($query->num_rows()>0)
		{
			$row = $query->row();
			$latestSerialNo = $row->latestSerial;
		}
		else
		{
			$latestSerialNo = 0;
		}
		return $latestSerialNo;
		
	}
	
	public function getPreviousPaymentInfo($membership,$validity)
	{
		$paymentInfo = array();
		$sql = "SELECT 
				payment_master.PAYMENT_ID,
				payment_master.MEMBERSHIP_NO,
				payment_master.FROM_DT,
				payment_master.VALID_UPTO,
				payment_master.EXPIRY_DT,
				payment_master.RENEW_ID,
				payment_master.VALIDITY_STRING,
				payment_master.FRESH_RENEWAL
				FROM
				  payment_master 
				WHERE 
				payment_master.MEMBERSHIP_NO='".$membership."'
				AND payment_master.VALIDITY_STRING='".$validity."'
				AND payment_master.FRESH_RENEWAL != 'D' 
				AND payment_master.FRESH_RENEWAL != 'P' 
				AND payment_master.FRESH_RENEWAL != 'C'
				ORDER BY PAYMENT_ID DESC
				LIMIT 1";
				
		$query = $this->db->query($sql);
        if ($query->num_rows() > 0) 
		{
                // If need more result we can add later.....
				$row = $query->row();
                $paymentInfo=array(
                    "PAYMENT_ID"=>$row->PAYMENT_ID
                );
             
		}
		else{
			$paymentInfo = array();
		}
		return $paymentInfo;
	}
	
	public function insertintoTable($insertRenewal=array(),$insertPayemntMaster=array(),$insertOnlinePayment=array(),$previousPaymentID=NULL)
	{
		$updatePaymentRenewal =array();
		$updateRenewal =array();
		$updateOnlinePayment =array();
		try
		{
		
			$this->db->trans_begin();
			
			// insert into renewaltable
            $this->db->insert('renewaltable', $insertRenewal);
			$renewalId = $this->db->insert_id();
			
			// update payment master with renewal id
			$updatePaymentRenewal['RENEW_ID']=$renewalId;
			$this->db->where('PAYMENT_ID', $previousPaymentID);
			$this->db->update('payment_master', $updatePaymentRenewal); 
			
			// Insert into payment master
			$this->db->insert('payment_master', $insertPayemntMaster);
			$payment_masterID = $this->db->insert_id();
			
			$updateRenewal = array(
				"payment_id" => $payment_masterID
			);
			$this->db->where('renew_id', $renewalId);
			$this->db->update('renewaltable', $updateRenewal); 
			
			// Insert into Online payment
			$this->db->insert('online_payment_status', $insertOnlinePayment);
			$onlinePymentId = $this->db->insert_id();
			$updateOnlinePayment = array(
				"payment_master_id" => $payment_masterID 
			);
			// Update Online Payment Status with payment master ID
			$this->db->where('id', $onlinePymentId );
			$this->db->update('online_payment_status', $updateOnlinePayment); 
			
				
			if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                return false;
            } else {
                $this->db->trans_commit();
                return true;
            }
		}
		catch (Exception $exc) 
		{
            echo $exc->getTraceAsString();
        }
	}
	
	// getMemberAttendanceByMonth 
	// Count total no of days present in validity period month wise	
	public function getMemberAttendanceByMonth($membership,$validitystring)
	{
		$data = array();
		$sql = "SELECT COUNT(*) AS totalpresentDys,
				DATE_FORMAT(member_attendance.att_date,'%b') AS month_info,
				DATE_FORMAT(member_attendance.att_date,'%y') AS year_info, 
				DATE_FORMAT(member_attendance.att_date,'%Y') AS full_year_info
				FROM `member_attendance` WHERE member_attendance.membershipno='".$membership."' AND member_attendance.validity_string='".$validitystring."'
				GROUP BY DATE_FORMAT(member_attendance.att_date, '%Y%m')";
		
		$query = $this->db->query($sql);
		if($query->num_rows()>0)
			{
				foreach($query->result() as $rows):
					$data[] = array(
						"totalpresentDys" => $rows->totalpresentDys,
						"month_info" => $rows->month_info,
						"year_info" => $rows->year_info,
						"full_year" => $rows->full_year_info
					); 
				endforeach;
			}
			return $data;
		
	}

	
	// getMemberAttendanceDetailByMonthAndYear 
	// Fetch detail record of single month
	public function getMemberAttendanceDetailByMonthAndYear($membership,$validitystring,$month,$year)
	{
		$data = array();
		$sql = "SELECT *
					FROM `member_attendance` WHERE member_attendance.membershipno='".$membership."' AND member_attendance.validity_string='".$validitystring."'
					AND DATE_FORMAT(member_attendance.att_date,'%b')='".$month."' AND DATE_FORMAT(member_attendance.att_date,'%Y')=".$year;
		
		$query = $this->db->query($sql);
		if($query->num_rows()>0)
			{
				foreach($query->result() as $rows):
					$data[] = array(
						"membership" => $rows->membershipno,
						"validitystring" => $rows->validity_string,
						"att_date" => $rows->att_date,
						"in_time" => $rows->in_time,
						"out_time" => $rows->out_time
					); 
				endforeach;
			}
			return $data;
		
	}
	
	
	
	
	
}
