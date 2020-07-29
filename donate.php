<?php
	header("Pragma: no-cache");
	header("Cache-Control: no-cache");
    header("Expires: 0");
    require_once("./lib/cookie_aleart.php");
?>
<!DOCTYPE html PUBLIC >
<html>
<head>
<title>Paytm Order Form</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" href="./css/main.css" >


</head>
<body class="jumbotron">


<!-- Order Form Starts here -->
<div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3 bg-white">
                <div class="regForm ">
                    <h1>Order Form</h1>
                    <form action="pgRedirect.php" method="POST">
                        <div class="form-group">
                            <label class='unselectable'>Order ID:</label>
                            <input type="text" class="form-control" id="ORDER_ID" name="ORDER_ID" maxlength="32" value="<?php echo  uniqid("OID")?>" readonly>
                        </div>
                        <div class="form-group">
                            <label class="unselectable">Full Name:</label>
                            <input type="text" class="form-control is-invalid" id="DONOR_NAME" name="DONOR_NAME" maxlength="32" placeholder="Enter Full Name" required>
                            <div class="valid-feedback d-none" id="DONOR_NAME_valid" name="DONOR_NAME_valid">
                                Looks good!
                            </div>
                        </div>
                        <div class="form-group">
                            <label class='unselectable'>Phone No.</label>
                            <input type="text" class="form-control is-invalid" id="MOBILE_NUMBER" name="MOBILE_NUMBER" maxlength="10" placeholder="Ex. 7777777777" required>
                            <div class="valid-feedback d-none" id="MOBILE_NUMBER_VALID" name="MOBILE_NUMBER_VALID" >
                                Looks good!
                            </div>
                        </div>
                        <div class="form-group d-none">
                            <label>Costumer ID</label>
                            <input type="text" class="form-control" id="CUST_ID" name="CUST_ID" required>
                        </div>
                        <div class="form-group d-none">
                            <label>Channel</label>
                            <input type="text" class="form-control" id="CHANNEL_ID" name="CHANNEL_ID" value="WEB" readonly>
                        </div>
                        <div class="form-group d-none">
                            <label>INDUSTRY TYPE ID</label>
                            <input type="text" class="form-control" id="INDUSTRY_TYPE_ID" name="INDUSTRY_TYPE_ID" value="Retail" readonly>
                        </div>
                        <div class="form-group">
                            <label class="unselectable">Email:</label>
                            <input type="email" class="form-control is-invalid " id="EMAIL_ID" name="EMAIL_ID" maxlength="32" placeholder="Enter Email" required>
                            <div class="valid-feedback d-none" id="EMAIL_ID_VALID" name="EMAIL_ID_VALID" >
                                Looks good!
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="unselectable">Amount:</label>
                            <input type="number" class="form-control" id="TXN_AMOUNT" name="TXN_AMOUNT" min="1" placeholder="Indian Rupees (INR)" required>
                        </div>
                        <fieldset class="form-group">
                            <div class="row">
                              <div class="col-sm-10">
                                <div class="form-check">
                                  <input class="form-check-input" type="checkbox" id="Anonymous" name="Anonymous" value="Anonymous">
                                  <label class="form-check-label unselectable" for="Anonymous">Remain Anonymous</label>
                                </div>
                              </div>
                            </div>
                        </fieldset>
                        <!-- Finally Submit button -->
                        <button type="submit" class="btn btn-primary" name="Donate">Donate</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- JavaScript js include -->
    <script src="./js/bootstrap-validate.js"></script>
    <script src="./js/main.js"></script>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <!-- JavaScript scripts -->
</body>
</html>