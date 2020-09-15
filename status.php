<?php
	header("Pragma: no-cache");
	header("Cache-Control: no-cache");
    header("Expires: 0");
    include_once("./lib/cookie_aleart.php");
    session_start();
?>
<!DOCTYPE html PUBLIC>
<html>

<head>
    <title>Status Page</title>
    <meta name="GENERATOR" content="Evrsoft First Page">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./css/complete.css">
    <script src="js/html2pdf.bundle.min.js"></script>
</head>

<body class="">
    <?php include('./modules/header.php') ?>

    <form method="post" action="javascript: submitForm()" name="f1" id="f2">
        <table border="1">
            <tbody>
                <?php
                
			foreach($_POST as $paramName =>  $paramValue) {
                $_SESSION[$paramName] = $paramValue;
				//echo '<label>'. $paramName .'</label>';
				echo '<input class="d-none" name="' . $paramName .'" id="' . $paramName .'" value="' . $paramValue . '">';
            }
            $_SESSION['EMAIL_ID'] = $_COOKIE['EMAIL_ID'];
            $_SESSION['NAME'] = $_COOKIE['NAME'];
            $_SESSION['CUST_ID'] = $_COOKIE['CUST_ID'];
			//echo '<label> Email </label>';
			echo '<input class="d-none" name="Email_ID" id="Email_ID" value="' . $_COOKIE['EMAIL_ID'] . '">';
			//echo '<label> name </label>';
			echo '<input class="d-none" name="NAME" id="NAME" value="' . $_COOKIE['NAME'] . '"><br/>';
			//echo '<label> CUST_ID </label>';
			echo '<input class="d-none" name="CUST_ID" id="CUST_ID" value="' . $_COOKIE['CUST_ID'] . '">';
			echo '<input class="d-none" value="Donate" id="submitform" name="submitform"  type="submit">';
			?>
            </tbody>
        </table>
        <script type="text/javascript">
        setTimeout(() => {
            document.f1.submit()
        }, 100);
        </script>
    </form>
    <?php 
	$title = "";
	$message = "";
	$button = "";
	$icon = "";
	$color = "";
	$link = "";
    $date = "";
    $visible = 'd-none';
if($_POST['RESPCODE'] == 01	){
	$title = "Order Successful";
	$message = "Successfully placed";
	$button = "Back to home";
	$icon = '<i class="fa fa-check fa-4x fa-inverse" aria-hidden="true"></i>';
	$color = "lightgreen";
    $link = 'TxnStatus.php';
     $visible = 'd-block';
	if($_POST['TXNDATE'] == 'NAN'){
		$date = '';
	}else{
		$date = " on ".$_POST['TXNDATE'];
	}
	
} elseif($_POST['RESPCODE'] == 400) {
	$title = "Payment Pending";
	$message = "Successfully placed";
	$button = "Check Status";
	$icon = '<i class="fa fa-exclamation-triangle fa-4x fa-inverse" aria-hidden="true"></i>';
	$color = "indianred";
    $link = 'TxnStatus.php?ORDER_ID=' . $_POST['ORDERID'];
    $visible = 'd-none';
	if($_POST['TXNDATE'] == 'NAN'){
		$date = '';
	}else{
		$date = " on ".$_POST['TXNDATE'];
	}
}

else {
	$title = "Payment Failure";
	$message = "cannot be placed due to error";
	$button = "Try Again";
	$icon = '<i class="fa fa-times fa-4x fa-inverse" aria-hidden="true"></i>';
	$color = 'lightcoral';
    $link = 'order.php';
    $visible = 'd-none';
	if($_POST['TXNDATE'] == 'NAN'){
		$date = '';
	}else{
		$date = " on ".$_POST['TXNDATE'];
	}
}

?>
    <div class="modal-confirm bg-light" style="padding-top: 100px;">
        <div class="">

            <div class="modal-header">
                <div class="icon-box" style="background: <?php echo $color ?>">
                    <?php echo $icon ?>
                </div>
                <h4 class="modal-title w-100"><?php echo $title ?></h4>
            </div>
            <div class="modal-body">
                <p class="text-center">Your Order id <?php echo $_POST['ORDERID'] ?> with Rs
                    <?php echo $_POST['TXNAMOUNT']?>/- has been <?php echo $message . $date ?>.</p>
            </div>
            <div class="modal-footer">
                <a type="button" class="btn btn-block" style="background: <?php echo $color ?>"
                    href="<?php echo $link ?>"><?php echo $button ?></a>
                <input type="submit" class="btn <?php echo $visible ?>" value="Export as PDF" name="button1"
                    onclick="return invoiceredirect();">

            </div>
        </div>
    </div>


    <!-- > 
example echo given below it will be something like ' echo  $_POST['TXNID']  '

ORDERID = DN63069393
MID = ***********
TXNID = 20200***********************59113
TXNAMOUNT = 32.00
PAYMENTMODE = NB
CURRENCY = INR
TXNDATE = 2020-07-26 15:53:28.0
STATUS = TXN_SUCCESS
RESPCODE = 01
RESPMSG = Txn Success
GATEWAYNAME = SBI
BANKTXNID = 11678741641
BANKNAME = SBI
CHECKSUMHASH = nAL63DvimDEl***********************************CnkgptCecendrTJUa1JA4=
<-->


    <!-- > Including Firebase app , Firebase analytics , Firebase firestore and finally jQuery , Popper.js, Bootstrap JS <-->

    <script src="https://www.gstatic.com/firebasejs/7.17.0/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.17.0/firebase-analytics.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.17.0/firebase-firestore.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>
    <script src="js/invoice.js"></script>
    <!-- saving to firestore db -->
    <script src="js/db.js"></script>
    <script src="./js/firestore.js">
    submitForm()
    </script>
    <?php include('./modules/footer.php') ?>

</body>

</html>
