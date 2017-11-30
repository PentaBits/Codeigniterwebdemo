<?php 
//session_start();
$HASHING_METHOD = 'sha512'; // md5,sha1
$ACTION_URL = "https://secure.ebs.in/pg/ma/payment/request/";

// This post.php used to calculate hash value using md5 and redirect to payment page.
if(isset($_POST['secretkey'])){
	$_SESSION['SECRET_KEY'] = $_POST['secretkey'];
	
}

else{
	$_SESSION['SECRET_KEY'] = ''; //set your secretkey here
	
	
}




/*
echo "<pre>";
print_r($_SESSION);
echo "</pre>";
*/

$hashData = $_SESSION['SECRET_KEY'];


unset($_POST['secretkey']);
unset($_POST['submitted']);

ksort($_POST);
foreach ($_POST as $key => $value){
	if (strlen($value) > 0) {
		$hashData .= '|'.$value;
	}
}
if (strlen($hashData) > 0) {
	$secureHash = strtoupper(hash($HASHING_METHOD, $hashData));
}
?>
<html>
<body onLoad="document.payment.submit();">
<h3>Please wait, redirecting to process payment..</h3>
<form action="<?php echo $ACTION_URL;?>" name="payment" method="POST">
<?php
	foreach($_POST as $key => $value) {
?>
<input type="hidden" value="<?php echo $value;?>" name="<?php echo $key;?>"/>
<?php
	}
?>
<input type="hidden" value="<?php echo $secureHash; ?>" name="secure_hash"/>
</form>
</body>
</html>


 



