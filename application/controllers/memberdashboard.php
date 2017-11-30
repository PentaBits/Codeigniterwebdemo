<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class memberdashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
//        $this->load->model('dashboardmodel', '', TRUE);
//        $this->load->model('profilemodel', '', TRUE);
//	$this->load->model('healthassetvaluemodel','',TRUE);
//	$this->load->model('gstmastermodel','',TRUE);
        
        $this->load->library('session');
        $this->load->helper('date');
    }

    public function index() {
        if ($this->session->userdata('user_data')) {
            $session = $this->session->userdata('user_data');
            $page = 'memberdashboard/memberdashboard';
            $result=null;
            $header=NULL;
            createbody_method($result, $page, $header, $session);
           
        } else {

            redirect('memberlogin', 'refresh');
        }
    }
	
	/*------------PAYMENT INFO DETAIL-------------*/
	public function getPaymentInfo()
	{
		if($this->session->userdata('user_data'))
		{
			$membership_no = $this->input->post('mno',TRUE);
			$validity = $this->input->post('validity',TRUE);
			
			$mno = base64_decode($membership_no);
			$validity_str = base64_decode($validity);
			$result['paymentDtlInfo'] = $this->dashboardmodel->getPaymentInfoDetail($mno,$validity_str);
			
			$page = 'memberdashboard/payment-detail-info';
			$display = $this->load->view($page,$result);
			echo $display;
		}
		else
		{
			 redirect('memberlogin', 'refresh');
		}
	}
	
	/*------------END PAYMENT INFO DETAIL-------------*/
	
	
	public function applycashback(){
		if($this->session->userdata('user_data')){
			$session = $this->session->userdata('user_data');
			
			$customerId = ($session["CUS_ID"] != "" ? $session["CUS_ID"] : 0);
            $page = 'memberdashboard/cash-back-apply';
            $membershipNumber = $this->profilemodel->getMembershipNumber($customerId);
            $latestvalidity = $this->profilemodel->getValidityString($membershipNumber);
            $fromdate = ($latestvalidity["fromdate"]==""?"":$latestvalidity["fromdate"]);
            $todate = ($latestvalidity["validupto"]==""?"":$latestvalidity["validupto"]);
			$validityString = $fromdate." - ".$todate;
			$header ="";
			$result['memberid']=$customerId;
			$result['membershipNumber']=$membershipNumber;
			$result['validityString']=$validityString;
			$result["cashbackdata"] = $this->dashboardmodel->getMemberCashBackPoint($membershipNumber,$validityString);
			
			createbody_method($result, $page, $header, $session);
			
		}else{
			redirect('memberlogin','refresh');
		}
	}
	
	public function checkCashBackApplied(){
		if($this->session->userdata('user_data')){
			$response = array();
			$membership_no =  trim($this->input->post('membership',TRUE));
			$latestvalidity = $this->profilemodel->getValidityString($membership_no);
			$isApplied = $this->dashboardmodel->checkCashBackApplied($membership_no,$latestvalidity['VALIDITY_STRING']);
			$response = array(
				"msg_code"=>1,
				"msg_data"=>$isApplied
			);
			header('Content-Type: application/json');
			echo json_encode($response);
			exit();
		}
		else{
			redirect('memberlogin','refresh');
		}
	}
	
	public function processCashBack(){
		if($this->session->userdata('user_data')){
			$response = array();
			$insertArry = array();
			$session = $this->session->userdata('user_data');
			$customerId = trim($this->input->post('member-id',TRUE));
			$customerDtl = $this->profilemodel->getCustomerByCustId($customerId);
			$membership_no = trim($this->input->post('membership-no',TRUE));
			$validity = trim($this->input->post('member-validity',TRUE));
			$cashbackamount = trim($this->input->post('cashback-amount',TRUE));
			$cashbackpoint = trim($this->input->post('cashback-point',TRUE));
			
			$latestvalidity = $this->profilemodel->getValidityString($membership_no);
			
			$checkCashBackEligibility = $this->checkCashBackEligibility($latestvalidity["validupto"],$customerDtl['CUS_CARD']);
			if($checkCashBackEligibility){
				$insertArry = array(
					"member_id" => $customerId,
					"membership_no" => $membership_no,
					"validity_period" => $latestvalidity['VALIDITY_STRING'],
					"apply_date" => date('Y-m-d'),
					"cash_bck_point" => $cashbackpoint,
					"cash_bck_amt" => $cashbackamount,
					"is_approved" => 'N',
					"is_redeemed" => 'N'
				);
				
			
				$status = $this->insertupdatemodel->insertData('cash_back_admin',$insertArry); 
				if($status){
					$response = array(
					"msg_code" => 1,
					"msg_data" => "Cash back applied successfully."
					);
				}
				else{
					$response = array(
					"msg_code" => 2,
					"msg_data" => "There is something error.Please try again later..."
					);
				}
			}
			else{
				$response = array(
					"msg_code" => 0,
					"msg_data" => "You can apply cash back before 10 days from the date of expiry."
				);
			}
			
			header('Content-Type:application/json');
			echo json_encode($response);
			exit;
				
		}
		else{
			redirect('memberlogin','refresh');
		}
	}
	
	private function checkCashBackEligibility($validupto,$cardcode){
		$isApllicable = false;
		//echo "Valid Upto ".$validupto = date('Y-m-d',strtotime($validupto));
		$cardExtDys = $this->dashboardmodel->getCardExtensionDays($cardcode);
		
		$till_apply_days =  date('Y-m-d', strtotime($validupto. ' + '.$cardExtDys .' days'));
		
		$remaing_dys = 300;
		$upto_apply_dys = $remaing_dys+$cardExtDys;
	
		$date = date('Y-m-d');
		
		// Start date of cashback apply 
		$cur_dt=date_create($date);
		$start_date=date_create($validupto);
		$diff=date_diff($cur_dt,$start_date);
		$start_apply_days = $diff->format("%R%a days");
		
	
	//	echo "Start Aplly date ".$start_apply_days;
		
	
		// Till Aplly date cash back 
		$date1=date_create($date);
		$till_date=date_create($till_apply_days);
		
		$diff=date_diff($date1,$till_date);
		$till_apply_days = $diff->format("%R%a days");
		
		/*
			echo "<br>";
			echo "Till Apply date ".$till_apply_days;
			echo "<br>***";*/
		/*	echo "<br>";
			echo "Start Days ".$start_apply_days;
			echo "</br>";
			
			echo "<br>";
			echo "Till Appply Days ".$till_apply_days;
			echo "</br>";
			
			echo "<br>";
			echo "Upto apply days ".$upto_apply_dys;
			echo "</br>";
			*/
			
		
		if($start_apply_days>=0 && $start_apply_days<=300 && $till_apply_days<=$upto_apply_dys){
			$isApllicable = true;
		}
		if($start_apply_days>300 && $till_apply_days>$upto_apply_dys){
			$isApllicable = false;
		}
		
	return 	$isApllicable ;
	}
	
	
	public function renewpackage(){
		if($this->session->userdata('user_data')){
			$session = $this->session->userdata('user_data');
			
			$customerId = ($session["CUS_ID"] != "" ? $session["CUS_ID"] : 0);
			$membershipNumber = $this->profilemodel->getMembershipNumber($customerId);
            $latestvalidity = $this->profilemodel->getValidityString($membershipNumber);
            $fromdate = ($latestvalidity["fromdate"]==""?"":$latestvalidity["fromdate"]);
            $todate = ($latestvalidity["validupto"]==""?"":$latestvalidity["validupto"]);
			$validityString = $fromdate." - ".$todate;
			
			$grantDays = 0;
			$next_start_dt="";
			$grantDays = $this->dashboardmodel->getExtensionDays($membershipNumber,$latestvalidity["VALIDITY_STRING"]);
			
			
			
            $validupto = date('Y-m-d',  strtotime($todate));
            $validfrom = date('Y-m-d',  strtotime($fromdate));
            $actualExpryDt = date('Y-m-d',strtotime($validupto. ' +'.$grantDays.' days'));
			$validity_pd = date('d-m-Y',strtotime($validfrom ))." - ".date('d-m-Y',strtotime($actualExpryDt));
			// Next Start Date 
			$plusDay = 1;
			if($grantDays>0){
				$next_start_dt = date('Y-m-d', strtotime($actualExpryDt. ' + '.$plusDay.' days')); 
			}
			else{
				$next_start_dt = date('Y-m-d', strtotime($validupto. ' + '.$plusDay.' days')); 
			}
			
			$member = $this->profilemodel->getCustomerByCustId($customerId);
			$renewal_rate = $this->dashboardmodel->getRenewalSubscriptionAmount($member['CUS_BRANCH'],$member['CUS_CARD']);
			$cashbackAmt =  $this->dashboardmodel->getApprovedCashBackAmt($membershipNumber,$validityString);
			$result['cgstRateOpt'] = $this->gstmastermodel->getGSTRate('CGST'); // getting CGST Rate Options
			$result['sgstRateOpt'] = $this->gstmastermodel->getGSTRate('SGST'); // getting CGST Rate Options
			
			$cgstRate = $result['cgstRateOpt'][0]['rate']; // Need to change when rate is more than one 
			$sgstRate = $result['sgstRateOpt'][0]['rate']; // Need to change when rate is more than one 

			
			
			$renewalAmount = $renewal_rate - $cashbackAmt;
			$yearId = $this->profilemodel->getFinancialYear();
			$taxPercentage = $this->dashboardmodel->getTaxPercentage($yearId);
			$taxAmount = $renewalAmount*$taxPercentage/100;
			
			$cgstAmt = $cgstRate*$renewalAmount/100;
			$sgstAmt = $sgstRate*$renewalAmount/100;
			$totatlTaxableAmt = $cgstAmt+$sgstAmt;
			
			$totalPayableAmount = $renewalAmount+$totatlTaxableAmt;
			
			$page = 'memberdashboard/renew-package-form';
			$header="";
			
			$result = array(
				"customer_id"=>$customerId,
				"membershipno"=>$membershipNumber,
				"member_name"=>$member['CUS_NAME'],
				"membermobileno"=>$member['CUS_PHONE'],
				"memberemail"=>$member['CUS_EMAIL'],
				"branchcode" =>$member['CUS_BRANCH'],
				"validity_pd"=>$validity_pd,
				"subscription"=>$renewal_rate,
				"nextstartdate"=>$next_start_dt,
				"paymentdate"=>date('Y-m-d'),
				"cashbackamount"=>$cashbackAmt,
				"renewalamount"=>$renewalAmount,
				"taxpercentage"=>$taxPercentage,
				"cgstRateOpt" => $result['cgstRateOpt'],
				"sgstRateOpt" => $result['sgstRateOpt'],
				"cgstAmt" => $cgstAmt,
				"sgstAmt" => $sgstAmt,
				"totalTaxableAmt" => $totatlTaxableAmt,
				"netpayable"=> $totalPayableAmount
			);
			
			
            createbody_method($result, $page, $header, $session);
		}else{
			redirect('memberlogin','refresh');
		}
	}
	
	
	public function processrenewal()
	{
		if($this->session->userdata('user_data'))
		{
			$posts['_POST'] = $this->input->post();
			$page = 'memberdashboard/proceessrenewal';
			$this->load->view($page,$posts);
			
		}
		else
		{
			redirect('memberlogin','refresh');
		}
	}
	
	public function paymentresponse()
	{
		
		
		
		if($this->session->userdata('user_data'))
		{
			$posts['_POST'] = $this->input->post();
			$page = 'memberdashboard/paymentresponse';
			$this->load->view($page,$posts);
		}
		else
		{
			redirect('memberlogin','refresh');
		}
	}
	
	public function paymentconfirm()
	{
		if($this->session->userdata('user_data'))
		{
			$posts = $this->input->post();
			$HASHING_METHOD = 'sha512';  
			
			//$hashData = $_SESSION['SECRET_KEY'];
			$hashData = "9198beab24537d04cb37bb7b2fc44f91"; // don't change this secreate key
			
			$response = array();
			ksort($posts);
			foreach ($posts as $key => $value){
				if (strlen($value) > 0 && $key != 'SecureHash') 
				{
					 $hashData .= '|'.$value;
				}
			}
			if (strlen($hashData) > 0) 
			{
				$secureHash = strtoupper(hash($HASHING_METHOD , $hashData));
				if($secureHash != $posts['SecureHash']){
					echo '<h1>Error!</h1>';
					echo '<p>Hash validation failed from confirm page</p>';
					exit;
				}
				else 
				{
					$successMsg = $posts['Status'];
					
					if($successMsg=="SUCCESS")
					{
						// Insert array initialize 
						$insertPaymentMaster = array();
						$insertrenewaltable = array();
						$insertOnlinePayment = array();
						
						$msg_to_user = "Your payment is successfully made.";
						$payment_status = "Y";
						
						$grantDays = 0;
						$next_start_dt="";
						$renewal_tag="";
						$curr_date = date("Y-m-d");
						$membershipNumber = $this->profilemodel->getMembershipNumber($posts['customerID']);
						$latestvalidity = $this->profilemodel->getValidityString($membershipNumber);
						$fromdate = ($latestvalidity["fromdate"]==""?"":$latestvalidity["fromdate"]);
						$todate = ($latestvalidity["validupto"]==""?"":$latestvalidity["validupto"]);
						$validityString = $fromdate." - ".$todate;
						$member = $this->profilemodel->getCustomerByCustId($posts['customerID']);
						$grantDays = $this->dashboardmodel->getExtensionDays($membershipNumber,$latestvalidity["VALIDITY_STRING"]);
						
						$validupto = date('Y-m-d',strtotime($todate));
						$validfrom = date('Y-m-d',strtotime($fromdate));
						$actualExpryDt = date('Y-m-d',strtotime($validupto. ' +'.$grantDays.' days'));
						$validity_pd = date('d-m-Y',strtotime($validfrom ))." - ".date('d-m-Y',strtotime($actualExpryDt));
						// Next Start Date 
						$plusDay = 1;
						if($grantDays>0){
							$next_start_dt = date('Y-m-d', strtotime($actualExpryDt. ' + '.$plusDay.' days')); 
						}
						else{
							$next_start_dt = date('Y-m-d', strtotime($validupto. ' + '.$plusDay.' days')); 
						}
						$renewal_rate = $this->dashboardmodel->getRenewalSubscriptionAmount($member['CUS_BRANCH'],$member['CUS_CARD']);
						$cashbackAmt =  $this->dashboardmodel->getApprovedCashBackAmt($membershipNumber,$validityString);
						$renewalAmount = $renewal_rate - $cashbackAmt;
						$yearId = $this->profilemodel->getFinancialYear();
						$taxPercentage = $this->dashboardmodel->getTaxPercentage($yearId);
						
						//$taxAmount = $renewalAmount*$taxPercentage/100;
						
						
						$rowCGSTRate = $this->gstmastermodel->GetGSTRateByIdAndType('CGST',1); // 1 need to change later
						$rowSGSTRate = $this->gstmastermodel->GetGSTRateByIdAndType('SGST',2); // 2 need to change later
						
						$cgstAmt = $rowCGSTRate*$renewalAmount/100;
						$sgstAmt = $rowSGSTRate*$renewalAmount/100;
						
						$totalTaxable = $cgstAmt + $sgstAmt;
						
						$totalPayableAmount = $renewalAmount+$totalTaxable;
						// get Card Duration
						$card_duration = $this->dashboardmodel->getCardDuration($member['CUS_CARD']);
						// getting New Validity String
						//$newValidityString = $this->getNewValidityString($next_start_dt,$card_duration);
						$open_date=$next_start_dt;
						$opening_date = explode("-",$open_date);
						$valid_upto = date('Y-m-d',strtotime('+'.$card_duration.' day',mktime(0,0,0,$opening_date[1],$opening_date[2],$opening_date[0])));
						$newValidityString=$open_date." - ".$valid_upto;
						
						
						if($actualExpryDt>=$curr_date){
							$renewal_tag = "RA"; //RA = Renewal Advance  
						}else{
							$renewal_tag = "R";
						}
						$receiptSerial = $this->dashboardmodel->getReceiptSerialbyBranch($member['CUS_BRANCH'],$yearId);
						$newreceiptSerial = $receiptSerial+1;
						$previousPaymentInfo = $this->dashboardmodel->getPreviousPaymentInfo($membershipNumber,$latestvalidity["VALIDITY_STRING"]); 
						
						$insertrenewaltable = array(
							"customer_id" => $posts['customerID'],
							"renewal_date" => $next_start_dt,
							"BRANCH_CODE" => $member['CUS_BRANCH'],
							"user_id" => 80, // Member self
							"FIN_ID" => $yearId
						);
						
						$insertPaymentMaster = array(
							"MEMBERSHIP_NO" =>$membershipNumber,
							"CARD_CODE" =>$member['CUS_CARD'],
							"FROM_DT" =>$open_date,
							"VALID_UPTO" =>$valid_upto,
							"EXPIRY_DT" =>$valid_upto,
							"ADMISSION" =>0,
							"SUBSCRIPTION" =>$renewal_rate,
							"PRM_AMOUNT" =>$renewalAmount,
							"AMOUNT" => $renewalAmount,
							"MNTN_CHG" =>0,
							"SERVICE_TAX" =>NULL,
							"CGST_RATE_ID" => 1,
							"CGST_AMT" => $cgstAmt,
							"SGST_RATE_ID" => 2,
							"SGST_AMT" => $sgstAmt,
							"TOTAL_AMOUNT" =>$totalPayableAmount,
							"PAYMENT_DT" => date('Y-m-d'),
							"FRESH_RENEWAL" =>$renewal_tag,
							"BRANCH_CODE" => $member['CUS_BRANCH'],
							"RENEW_ID" => NULL,
							"USER_ID" => 80 ,
							"FIN_ID" =>$yearId,
							"RCPT_NO" =>$newreceiptSerial,
							"PAYMENT_MODE" =>'ONP', // ONP = Online Payment
							"CUST_ID" => $posts['customerID'],
							"VALIDITY_STRING" =>$newValidityString,
							"payment_from" =>'REN',
							"collection_at" =>$member['CUS_BRANCH']
						);
						
						$insertOnlinePayment = array(
							"online_payment_id" => $posts['PaymentID'], 
							"transaction_id" => $posts['TransactionID'],
							"payment_master_id" => NULL, // payment master table refrence 
							"payment_status" => $payment_status, 
							"processing_date" => date('Y-m-d'),
							"payment_from" => 'REN'
						);
						
						
						$insertData = $this->dashboardmodel->insertintoTable($insertrenewaltable,$insertPaymentMaster,$insertOnlinePayment,$previousPaymentInfo['PAYMENT_ID']);
						
						if($insertData)
						{
							$data = array(
								"CustomerName" => $member['CUS_NAME'],
								"paidAmt" => $posts['Amount'],
								"status" => $posts['Status'],
								"iscomplete" => 'Y',
								"usermsg" => 'Your payment is successfully made'
							);
							
							
						}
						else
						{
							$data = array(
								"status" => $posts['Status'],
								"iscomplete" => 'N',
								"usermsg" => 'Unexpected error.'
							);
						}
					}
					else{
						$insertOnlinePayment  =array();
						$msg_to_user = "Your transaction has been decline.";
						$payment_status = "N";
						
						$insertOnlinePayment = array(
							"online_payment_id" => $posts['PaymentID'], 
							"transaction_id" => $posts['TransactionID'],
							"payment_master_id" => NULL, // payment master table refrence 
							"payment_status" => $payment_status, 
							"processing_date" => date('Y-m-d'),
							"payment_from" => 'REN'
						);
					
						$insertData = $this->dashboardmodel->insertintoOnlinePayment($insertOnlinePayment);
						
						if($insertData)
						{
							$data = array(
								"status" => $posts['Status'],
								"iscomplete" => 'N',
								"usermsg" => 'Your transaction has been decline.'
							);
						}
						else
						{
							$data = array(
								"status" => $posts['Status'],
								"iscomplete" => 'N',
								"usermsg" => 'Your transaction has been decline.'
							);
						}
					}
					
					
					
					$page = 'memberdashboard/paymentconfirmation';
					$this->load->view($page,$data);
					
				}
			}
			 else 
				{
					echo '<h1>Error!</h1>';
					echo '<p>Invalid response</p>';
					exit;
				}
			
			
		}
		else{
			redirect('memberlogin','refresh');
		}
	}
	
	/*private function getNewValidityString($next_start_dt,$card_duration)
	{
		$open_date=$next_start_dt;
		$opening_date = explode("-",$open_date);
		$valid_upto = date('Y-m-d',strtotime('+'.$card_duration.' day',mktime(0,0,0,$opening_date[1],$opening_date[2],$opening_date[0])));
		$valid_string=$open_date." - ".$valid_upto;
		return $valid_string;
	}*/
	
	
	
	public function attendancedetail()
	{
		if($this->session->userdata('user_data'))
		{
			$session = $this->session->userdata('user_data');
			
			$customerId = ($session["CUS_ID"] != "" ? $session["CUS_ID"] : 0);
            $page = 'memberdashboard/member-attendence-view';
            $membershipNumber = $this->profilemodel->getMembershipNumber($customerId);
            $latestvalidity = $this->profilemodel->getValidityString($membershipNumber);
            $fromdate = ($latestvalidity["fromdate"]==""?"":$latestvalidity["fromdate"]);
            $todate = ($latestvalidity["validupto"]==""?"":$latestvalidity["validupto"]);
			$validityString =date('Y-m-d',strtotime($fromdate))." - ".date('Y-m-d',strtotime($todate)); // 2017-07-03 - 2017-10-04
			$header ="";
			$result['memberid']=$customerId;
			$result['membershipNumber']=$membershipNumber;
			$result['validityString']=$validityString;
			
			
			$result['memberAttendance'] = $this->dashboardmodel->getMemberAttendanceByMonth($membershipNumber,$validityString);
			
			
			
			createbody_method($result, $page, $header, $session);
		}
		else
		{
			redirect('memberlogin','refresh');
		}
	}
	
	public function attendancedetailbymonth()
	{
		if($this->session->userdata('user_data'))
		{
			$session = $this->session->userdata('user_data');
			$customerId = ($session["CUS_ID"] != "" ? $session["CUS_ID"] : 0);
            $page = 'memberdashboard/member-attendence-detail-view';
            $membershipNumber = $this->profilemodel->getMembershipNumber($customerId);
            $latestvalidity = $this->profilemodel->getValidityString($membershipNumber);
			$fromdate = ($latestvalidity["fromdate"]==""?"":$latestvalidity["fromdate"]);
            $todate = ($latestvalidity["validupto"]==""?"":$latestvalidity["validupto"]);
			
			
			$validityString =date('Y-m-d',strtotime($fromdate))." - ".date('Y-m-d',strtotime($todate)); // 2017-07-03 - 2017-10-04
			$header ="";
			$result['memberid']=$customerId;
			$result['membershipNumber']=$membershipNumber;
			$result['validityString']=$validityString;
			
			$month = $this->uri->segment(3);
			$year = $this->uri->segment(4);
			
			
			$result['memberAttDetail'] = $this->dashboardmodel->getMemberAttendanceDetailByMonthAndYear($membershipNumber,$validityString,$month,$year);
			$result['month'] = $month;
			$result['year'] = $year;
			
			createbody_method($result, $page, $header, $session);
		}
		else
		{
			redirect('memberlogin','refresh');
		}
	}
	
	
	



	
	
	
	/*
	public function getMacAddress()
	{
		ob_start(); 
		system('ipconfig /all');
		$mac = ob_get_contents();
		ob_clean();
		
		
		$name = "Physical";
		$pmac = strpos($mac,$name);
		$macAddress = substr($mac,($pmac+36),17);
		//echo "Mac Address<br>";
		//echo $mac;
		
		//echo "****fdf****<br>";
		//echo $pmac+36;
		
		//echo "********<br>";
		echo $macAddress;
	}*/
	

}

?>