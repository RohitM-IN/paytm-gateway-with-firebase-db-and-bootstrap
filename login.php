<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Login Form</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fonts/font-awesome.min.css">
    <link rel="stylesheet" href="fonts/ionicons.min.css">
    <link rel="stylesheet" href="css/Login-Form-Clean.css">
    <link rel="stylesheet" href="css/nav.css">

    <script src="https://www.gstatic.com/firebasejs/7.17.0/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.17.0/firebase-auth.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.17.0/firebase-firestore.js"></script>
    <script src="js/db.js"></script>
</head>

<body style="background: #f1f7fc;">
    <div>
        <nav class="navbar navbar-light navbar-expand-md sticky-top navigation-clean-button"
            style="height:80px;background-color:#37434d;color:#ffffff;">
            <div class="container-fluid"><a class="navbar-brand" href="#"><i
                        class="fa fa-globe"></i> Dashboard</a><button data-toggle="collapse" class="navbar-toggler"
                    data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span
                        class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navcol-1">
                    <ul class="nav navbar-nav ml-auto">
                        <li role="presentation" class="nav-item"><a class="nav-link" style="color:#ffffff;"
                                href="index.php"><i class="fa fa-home"></i> Home</a></li>
                        <li role="presentation" class="nav-item"><a class="nav-link" style="color:#ffffff;"
                                href="signup.php"><i class="fa fa-sign-in"></i> Sign Up</a></li>
                        <li role="presentation" class="nav-item"><a class="nav-link" id="in" style="color:#ffffff;"
                                href="login.php"><i id="inorout_class" class="fa fa-sign-in"></i> Sign
                                In</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div class="login-clean">

        <form method="post" id="login">
            <p id="error" class="text-danger"></p>
            <div class="row">
                <p id="Success" class="text-success"></p><span id="timespan" class="text-success"></span>
            </div>

            <h2 class="sr-only">Login Form</h2>
            <div class="illustration"><i class="icon ion-android-person"></i></div>
            <div class="form-group"><input class="form-control" id="email" type="email" name="email"
                    placeholder="Email"></div>
            <div class="form-group"><input class="form-control" id="password" type="password" name="password"
                    placeholder="Password">
            </div>
            <div class="form-group"><button class="btn btn-primary btn-block" type="submit">Log In</button></div>

        </form>

    </div>
    <script src="js/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js">
    < script src = "bootstrap/js/bootstrap.min.js" >
    </script>

    <script src="js/login.js"></script>
    <?php include('./modules/footer.php') ?>
</body>

</html>