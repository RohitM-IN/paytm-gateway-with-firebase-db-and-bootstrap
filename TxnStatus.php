<?php
	header("Pragma: no-cache");
	header("Cache-Control: no-cache");
	header("Expires: 0");

	// following files need to be included
	require_once("./lib/config_paytm.php");
	require_once("./lib/encdec_paytm.php");

	$ORDER_ID = "";
	$requestParamList = array();
	$responseParamList = array();

	if (isset($_POST["ORDER_ID"]) && $_POST["ORDER_ID"] != "") {

		// In Test Page, we are taking parameters from POST request. In actual implementation these can be collected from session or DB. 
		$ORDER_ID = $_POST["ORDER_ID"];

		// Create an array having all required parameters for status query.
		$requestParamList = array("MID" => PAYTM_MERCHANT_MID , "ORDERID" => $ORDER_ID);  
		
		$StatusCheckSum = getChecksumFromArray($requestParamList,PAYTM_MERCHANT_KEY);
		
		$requestParamList['CHECKSUMHASH'] = $StatusCheckSum;

		// Call the PG's getTxnStatusNew() function for verifying the transaction status.
		$responseParamList = getTxnStatusNew($requestParamList);
	}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
    <title>Transaction status query</title>
    <meta name="GENERATOR" content="Evrsoft First Page">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="css/nav.css">
    <script src="https://www.gstatic.com/firebasejs/7.17.0/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.17.0/firebase-auth.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.17.0/firebase-firestore.js"></script>
    <script src="js/db.js"></script>
    <script src="js/checklogin.js"></script>
</head>

<body class="">
    <?php include('./modules/header_default.php') ?>
    <div class="container">
        <h2>Transaction status query</h2>
        <form method="post" action="">
            <table style="border: 1px solid nopadding">
                <tbody>
                    <tr>
                        <td><label>ORDER_ID::*</label></td>
                        <td><input id="ORDER_ID" tabindex="1" maxlength="20" size="20" name="ORDER_ID"
                                autocomplete="off" value="<?php echo $ORDER_ID ?>">
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input value="Status Query" type="submit" onclick="checkauth()"></td>
                    </tr>
                </tbody>
            </table>
            <br /></br />
            <?php
		if (isset($responseParamList) && count($responseParamList)>0 )
		{ 
		?>
            <h2>Response of status query:</h2>
            <table style="border: 1px solid nopadding">
                <tbody>
                    <?php
					foreach($responseParamList as $paramName => $paramValue) {
						if($paramName !== "MID"){
				?>
                    <tr>
                        <td style="border: 1px solid"><label><?php echo $paramName?></label></td>
                        <td style="border: 1px solid"><?php echo $paramValue?></td>
                    </tr>
                    <?php
						}
					}
				?>
                </tbody>
            </table>
            <?php
		}
		?>
        </form>
    </div>
    <?php include('./modules/footer.php') ?>
</body>

</html>