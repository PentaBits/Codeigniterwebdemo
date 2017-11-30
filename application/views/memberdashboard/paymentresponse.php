<?php 
//session_start();
$HASHING_METHOD = 'sha512'; // md5,sha1

// This response.php used to receive and validate response.

/*
if(!isset($_SESSION['SECRET_KEY']) || empty($_SESSION['SECRET_KEY']))
{
	$_SESSION['SECRET_KEY'] = ''; //set your secretkey here
	$x=1;
	
}
else{
	$x=2;
}
*/




$hashData = "9198beab24537d04cb37bb7b2fc44f91";

/*
echo "<pre>";
print_r($_POST);
echo "</pre>";
echo "*********";
*/

ksort($_POST);
foreach ($_POST as $key => $value){
	if (strlen($value) > 0 && $key != 'SecureHash') {
		$hashData .= '|'.$value;
		//echo $hashData."<br>";
	}
}


/*
echo "************After hasing************<br>";
echo "From payment response";
echo "Post Secure Hash".$_POST['SecureHash'];
echo "**********";
echo "<br>";
*/


if (strlen($hashData) > 0) {
	$secureHash = strtoupper(hash($HASHING_METHOD , $hashData));
	
/*	echo "Secure Hash With in If".$secureHash;
	echo "<br>";
	echo "Response Code is".$_POST['ResponseCode'];*/
	
	
	if($secureHash == $_POST['SecureHash']){
		
		
		/*----------------We are getting RESPONSE as array ----------Mithilesh------*/
		/* Example of response array shown 
		Array
	(
		[ResponseCode] => 0
		[ResponseMessage] => Transaction Successful
		[DateCreated] => 2017-04-07 16:53:49
		[PaymentID] => 72868008
		[MerchantRefNo] => 1491564211 
		[Amount] => 1.00
		[Mode] => LIVE
		[BillingName] => 8126
		[BillingAddress] => Test Address
		[BillingCity] => Kolkata
		[BillingState] => West Bengal
		[BillingPostalCode] => 700001
		[BillingCountry] => IND
		[BillingPhone] => 9143039959
		[BillingEmail] => mithileshkumarrouth@yahoo.in
		[DeliveryName] => 
		[DeliveryAddress] => 
		[DeliveryCity] => 
		[DeliveryState] => 
		[DeliveryPostalCode] => 
		[DeliveryCountry] => 
		[DeliveryPhone] => 
		[Description] => Developer Test
		[IsFlagged] => NO
		[TransactionID] => 204206329
		[PaymentMethod] => 1032
		[RequestID] => 33313558
		[SecureHash] => 9A640E1954F7699A74D92876C2A0307B3561F621E0E27918BAAA3182BB33BC3373E2DC5F7C65388B904215E51DF7E6DE3BBEBB498ABBE4E6E561CC8D48BBBBD1
	)
	*/
		
		
		
		
		
		
		
		if($_POST['ResponseCode'] == 0){
			// update response and the order's payment status as SUCCESS in to database
			
			//for demo purpose, its stored in session
			$_POST['paymentStatus'] = 'SUCCESS';
			$_SESSION['paymentResponse'][$_POST['PaymentID']] = $_POST;
			
		} else {
			// update response and the order's payment status as FAILED in to database
			
			//for demo purpose, its stored in session
			$_POST['paymentStatus'] = 'FAILED';
			$_SESSION['paymentResponse'][$_POST['PaymentID']] = $_POST;
		}
		// Redirect to confirm page with reference.
		$confirmData = array();
		$confirmData['PaymentID'] = $_POST['PaymentID'];
		$confirmData['TransactionID'] = $_POST['TransactionID'];
		$confirmData['Status'] = $_POST['paymentStatus'];
		$confirmData['Amount'] = $_POST['Amount'];
		$confirmData['customerID'] = $_POST['BillingName'];
		
		
		
		//$hashData = $_SESSION['SECRET_KEY'];
		$hashData = "9198beab24537d04cb37bb7b2fc44f91";

		ksort($confirmData);
		foreach ($confirmData as $key => $value){
			if (strlen($value) > 0) {
				$hashData .= '|'.$value;
			}
		}
		if (strlen($hashData) > 0) {
			$secureHash = strtoupper(hash($HASHING_METHOD , $hashData));
		}
?>
		<html>
		<body onLoad="document.payment.submit();">
		<form action="<?php echo base_url();?>memberdashboard/paymentconfirm" name="payment" method="POST">
<?php
			foreach($confirmData as $key => $value) {
?>
		<input type="hidden" value="<?php echo $value;?>" name="<?php echo $key;?>"/>
<?php
			}
?>
		<input type="hidden" value="<?php echo $secureHash; ?>" name="SecureHash"/>
		</form>
		</body>
		</html>
<?php

	} else {
		echo '<h1>Error!</h1>';
		echo '<p>Hash validation failed</p>';
	}
} 
else {
	echo '<h1>Error!</h1>';
	echo '<p>Invalid response</p>';
}
?>