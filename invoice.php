<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>HTML to PDF demo code</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/invoice.css">
</head>

<body>
    <main>
        <section>
            <div class="container" style="padding-top: 100px;">
                <div>
                    <div class="container">
                        <div class="col-md-12" id="invoice">
                            <div class="invoice">
                                <!-- begin invoice-company -->
                                <div class="invoice-company text-inverse f-w-600">
                                    <span class="pull-right hidden-print">
                                        <a href="javascript:;" onclick="generatePDF()"
                                            class="btn btn-sm btn-white m-b-10 p-l-5"><i
                                                class="fa fa-file t-plus-1 text-danger fa-fw fa-lg"></i> Export as
                                            PDF</a>
                                        <a href="javascript:;" onclick="printContent()"
                                            class="btn btn-sm btn-white m-b-10 p-l-5"><i
                                                class="fa fa-print t-plus-1 fa-fw fa-lg"></i> Print</a>
                                    </span>
                                    <div><img src="img/Logo.jpg" width="50" style="border-radius: 50px;" /><a>Root
                                            Android And Ethical Hacker</a></div>
                                </div>
                                <!-- end invoice-company -->
                                <!-- begin invoice-header -->
                                <div class="invoice-header">
                                    <div class="row">
                                        <div class="col">
                                            <div class="invoice-from">
                                                <small>from</small>
                                                <address class="m-t-5 m-b-5">
                                                    <strong class="text-inverse">Twitter, Inc.</strong><br>
                                                    Email: user@domain.com
                                                </address>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="invoice-to">
                                                <small>to</small>
                                                <address class="m-t-5 m-b-5">
                                                    <strong
                                                        class="text-inverse"><?php echo $_POST['NAME']  ?></strong><br>
                                                    <?php echo $_POST['EMAIL_ID']  ?>
                                                </address>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="invoice-date">
                                                <strong><small>Invoice </small>
                                                    <div class="date text-inverse m-t-5"><span
                                                            id="date"><?php echo $_POST['TXNDATE']?></span></div>
                                                </strong>
                                                <div class="invoice-detail">
                                                    <span>#<?php echo $_POST['ORDERID'] ?></span><br>
                                                    Services Product
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end invoice-header -->
                                <!-- begin invoice-content -->
                                <div class="invoice-content">
                                    <!-- begin table-responsive -->
                                    <div class="table-responsive">
                                        <table class="table table-invoice">
                                            <thead>
                                                <tr>
                                                    <th>TASK DESCRIPTION</th>
                                                    <th class="text-right" width="20%">TOTAL AMOUNT</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <span class="text-inverse"><strong>Product</strong>
                                                        </span><br>
                                                        <small>Something here like description .</small>
                                                    </td>
                                                    <td class="text-right">₹<?php echo $_POST['TXNAMOUNT'] ?>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- end table-responsive -->
                                    <!-- begin invoice-price -->
                                    <div class="invoice-price">
                                        <div class="invoice-price-left">
                                            <div class="invoice-price-row">
                                                <div class="sub-price">
                                                    <!--small>SUBTOTAL</!--small>
                                                    <span class="text-inverse">₹<span id="total_sub"></span></span>
                                                </div>
                                                <div class="sub-price">
                                                    <i class="fa fa-plus text-muted"></i>
                                                </div>
                                                <div class="sub-price">
                                                    <small>GST (18%)</small>
                                                    <span-- class="text-inverse">₹<span id="total_interest"></span></span-->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="invoice-price-right">
                                            <small>TOTAL</small> <span
                                                class="f-w-600">₹<?php echo $_POST['TXNAMOUNT'] ?></span>
                                        </div>
                                    </div>
                                    <!-- end invoice-price -->
                                </div>
                                <!-- end invoice-content -->
                                <!-- begin invoice-note -->
                                <div class="invoice-note">
                                    * Make all cheques payable to [Your Company Name]<br>
                                    * Payment is due within 30 days<br>
                                    * If you have any questions concerning this invoice, contact [Name, Phone Number,
                                    Email]
                                </div>
                                <!-- end invoice-note -->
                                <!-- begin invoice-footer -->
                                <div class="invoice-footer">
                                    <p class="text-center m-b-5 f-w-600">
                                        THANK YOU FOR YOUR BUSINESS
                                    </p>
                                    <p class="text-center">
                                        <span class="m-r-10"><i class="fa fa-fw fa-lg fa-globe"></i>
                                            invoice.ethyt.tk</span>
                                        <span class="m-r-10"><i class="fa fa-fw fa-lg fa-phone-volume"></i>
                                            T:012-1234567890</span>
                                        <span class="m-r-10"><i class="fa fa-fw fa-lg fa-envelope"></i>
                                            user@domain.com</span>
                                    </p>
                                </div>
                                <!-- end invoice-footer -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/html2pdf.bundle.min.js"></script>
    <script src="js/invoice.js"></script>

</body>

</html>