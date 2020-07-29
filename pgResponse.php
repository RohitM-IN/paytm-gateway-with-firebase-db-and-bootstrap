<?php
header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");

// following files need to be included
require_once("lib/config_paytm.php");
require_once("lib/encdec_paytm.php");

$paytmChecksum = "";
$paramList = array();
$isValidChecksum = "FALSE";

$paramList = $_POST;
$paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : ""; //Sent by Paytm pg

//Verify all parameters received from Paytm pg to your application. Like MID received from paytm pg is same as your application�s MID, TXN_AMOUNT and ORDER_ID are same as what was sent by you to Paytm PG for initiating transaction etc.
$isValidChecksum = verifychecksum_e($paramList, PAYTM_MERCHANT_KEY, $paytmChecksum); //will return TRUE or FALSE string.

if($isValidChecksum == "TRUE") {
	//echo "<b>Checksum matched and following are the transaction details:</b>" . "<br/>";
	if ($_POST["STATUS"] == "TXN_SUCCESS") {
		//echo 'console.log("Transaction status is Success")';
		//Process your transaction here as success transaction.
		//Verify amount & order id received from Payment gateway with your application's order id and amount.
	}
	else {
		//echo 'console.log("Transaction status is failure")';
	}
/*
	if (isset($_POST) && count($_POST)>0 )
	{ 
		foreach($_POST as $paramName => $paramValue) {
				echo "Please Wait ...";
				echo "<br/>" . $paramName . " = " . $paramValue;
		}
	}
*/	
}
else {
	//echo 'console.log("Checksum mismatched.")';
	//Process transaction as suspicious.
}

?>
<header>
<link href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</header>
<h1 class="text-center">Please Wait ....<h1>
<div class="d-flex justify-content-center">
	<i class="fa fa-spinner fa-pulse fa-3x fa-fw text-center"></i>
	</div>
<form method="post" action="status.php" name="f1">
	<table style="border: 1px solid black;">
		<tbody>
		<?php
		foreach($_POST as $paramName =>  $paramValue) {
			echo '<input type="hidden" name="' . $paramName .'" id="' . $paramName .'" value="' . $paramValue . '">';
			echo '<input type="hidden" name="NAME" id="NAME" value="'.$_COOKIE['NAME'].'">';
			echo '<input type="hidden" name="CUST_ID" id="CUST_ID" value="'.$_COOKIE['CUST_ID'].'">';
			echo '<input type="hidden" name="EMAIL_ID" id="EMAIL_ID" value="'.$_COOKIE['EMAIL_ID'].'">';
			echo '<input type="hidden" name="Anonymous" id="Anonymous" value="'.$_COOKIE['Anonymous'].'">';
			if(!isset($_POST['TXNDATE']) && !isset($_POST['GATEWAYNAME'])){
				echo '<input type="hidden" name="TXNID" id="TXNID" value="NAN">';
				echo '<input type="hidden" name="PAYMENTMODE" id="PAYMENTMODE" value="NAN">';
				echo '<input type="hidden" name="TXNDATE" id="TXNDATE" value="NAN">';
				echo '<input type="hidden" name="GATEWAYNAME" id="GATEWAYNAME" value="NAN">';
				echo '<input type="hidden" name="BANKTXNID" id="BANKTXNID" value="NAN">';
			}
		}
		?>
		</tbody>
	</table>
	<script type="text/javascript">
		setTimeout(() => {
			document.f1.submit()
		}, 1500);
	</script>
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</form>