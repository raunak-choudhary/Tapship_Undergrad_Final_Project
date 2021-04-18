<?php

include('session-script.php');
$res = $_SESSION["sessionid"];
$f_mobile = $res;
if (!isset($_SESSION['login_farmer'])) {
    header("location: login.php"); // Redirecting To Profile Page
}
error_reporting(0);
?>
<!doctype html>
<html>

<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>Farmer Profile</title>
    <link rel="icon" href="../assets/img/fav.png" type="image/png">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic">
    <link rel="stylesheet" href="../assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="../assets/css/Article-List.css">
    <link rel="stylesheet" href="../assets/css/Footer-Dark.css">
    <link rel="stylesheet" href="../assets/css/Highlight-Blue.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.2.0/aos.css">
    <link rel="stylesheet" href="../assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="../assets/css/table-style.css">
    <link rel="stylesheet" href="../assets/css/profile.css">
    <link href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/3.6.95/css/materialdesignicons.css' rel='stylesheet'>

    <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>

    <script type='text/javascript'></script>
</head>

<body oncontextmenu='return false' class='snippet-body'>
    <div class="page-content page-container" id="page-content">
        <nav class="navbar navbar-light navbar-expand-lg fixed-top text-uppercase" id="mainNav" style="background: #0c3823;">
            <div class="container-fluid">
                <a class="navbar-brand js-scroll-trigger" data-bs-hover-animate="pulse" href="../index.php" style="font-family: Montserrat, sans-serif;">TAPSHIP</a>
                <button data-toggle="collapse" data-target="#navbarResponsive" class="navbar-toggler navbar-toggler-right text-uppercase rounded" data-aos="fade" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation" style="background: #fff;"><i class="fa fa-bars" style="color: #0c3823;;"></i></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="nav navbar-nav ml-auto">
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" data-bs-hover-animate="pulse" href="../index.php" style="filter: contrast(100%) grayscale(0%) hue-rotate(0deg) invert(0%) sepia(0%);">HOME</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" data-bs-hover-animate="pulse" href="../contact.php">CONTACT</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" data-bs-hover-animate="pulse" href="../about.php">ABOUT</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" data-bs-hover-animate="pulse" href="../faq.php">FAQ</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a href="../farmers/logout-script.php"><button class="btn btn-dark text-monospace" data-bs-hover-animate="pulse" type="button" style="margin: 10px;background: rgb(255,255,255);color: #0c3823;margin-left: 0;border-radius: 10px;">Log Out</button></a></li>

                    </ul>
                </div>
            </div>
        </nav>
        <?php

        $con = mysqli_connect("localhost", "root", "", "tapship");
        if (!$con) {
            die(" Connection Error ");
        }

        $query = " select * from farmer where f_mobile=" . $f_mobile . "";
        $result = mysqli_query($con, $query);

        while ($res = mysqli_fetch_assoc($result)) {
            $f_id =  $res['f_id'];
            $f_name =  $res['f_name'];
            $f_gender =  $res['f_gender'];
            $f_age =  $res['f_age'];
            $f_street =  $res['f_street'];
            $f_city =  $res['f_city'];
            $f_state =  $res['f_state'];
            $f_pincode =  $res['f_pincode'];
            $f_aadhar =  $res['f_aadhar'];
            $f_aadharpdf =  $res['f_aadharpdf'];
            $f_pan =  $res['f_pan'];
            $f_panpdf =  $res['f_panpdf'];
            $f_photo =  $res['f_photo'];
            $f_approve =  $res['f_approve'];

            $f_bankholder = $res['f_bankholder'];
            $f_bankaccount = $res['f_bankaccount'];
            $f_bankifsc = $res['f_bankifsc'];
            $f_bankname = $res['f_bankname'];
            $f_bankbranch = $res['f_bankbranch'];
            $f_bankpassbook = $res['f_bankpassbook'];
            $f_approve =  $res['f_approve'];
            $f_password =  $res['f_password'];
        }
        ?>

        <div class="features-boxed">
            <div class="container" style="background: #ffffff;">
                <div class="intro" style="background: #0c3823;margin-top: 120px;margin-bottom: 30px;">
                    <h2 class="text-center" data-aos="fade" style="color: rgb(255,255,255);padding: 30px;margin-bottom: 0px;">Farmer Profile</h2>
                </div>
            </div>
        </div>


        <div class="padding">

            <div class="row container d-flex justify-content-center">
                <div class="col-xl-12 col-md-12">
                    <div class="card user-card-full">
                        <div class="row m-l-0 m-r-0">
                            <div class="col-md-4 bg-c-lite-green user-profile">
                                <div class="card-block text-center text-white">
                                    <div class="m-b-25"> <img src="../farmers/<?php echo  $f_photo; ?>" width="200" height="240" align="center" class="img-radius" alt="User-Profile-Image"> </div>
                                    <h3 class="f-w-600"><?php echo "$f_name" ?></h3>
                                    <h5>Farmer</h5>
                                    <h5>Status: <?php if ($f_approve == "1") {
                                                    echo "No Action";
                                                } else if ($f_approve == "2") {
                                                    echo " Accepted";
                                                } else if ($f_approve == "3") {
                                                    echo "Review";
                                                } else if ($f_approve == "4") {
                                                    echo "Rejected";
                                                } else if ($f_approve == "5") {
                                                    echo "Resubmitted";
                                                } else {
                                                    echo "Multiple Login State";
                                                } ?></h5>
                                    <br> <br><br><br>
                                    <a href="editdetails.php"><button class="btn btn-primary" type="button" style="width: 250px;">Edit Profile</button></a>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="card-block">
                                    <h4 class="m-b-20 p-b-5 b-b-default f-w-600"><strong>Information</strong></h4>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">Id</p>
                                            <h6 class="text-muted f-w-400"><?php echo "$f_id" ?></h6>
                                        </div>
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">Name</p>
                                            <h6 class="text-muted f-w-400"><?php echo "$f_name" ?></h6>
                                        </div>
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">Mobile</p>
                                            <h6 class="text-muted f-w-400"><?php echo "$f_mobile" ?></h6>
                                        </div>
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">Gender</p>
                                            <h6 class="text-muted f-w-400"><?php echo "$f_gender" ?></h6>
                                        </div>
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">Age</p>
                                            <h6 class="text-muted f-w-400"><?php echo "$f_age" ?></h6>
                                        </div>
                                    </div>
                                    <h4 class="m-b-20 m-t-40 p-b-5 b-b-default  f-w-600"><strong>Address</strong></h4>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">Street</p>
                                            <h6 class="text-muted f-w-400"><?php echo "$f_street" ?></h6>
                                        </div>
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">City</p>
                                            <h6 class="text-muted f-w-400"><?php echo "$f_city" ?></h6>
                                        </div>
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">State</p>
                                            <h6 class="text-muted f-w-400"><?php echo "$f_state" ?></h6>
                                        </div>
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">Pincode</p>
                                            <h6 class="text-muted f-w-400"><?php echo "$f_pincode" ?></h6>
                                        </div>
                                    </div>
                                    <h4 class="m-b-20 m-t-40 p-b-5 b-b-default  f-w-600"><strong>Documents</strong></h4>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">Aadhaar</p>
                                            <h6 class="text-muted  f-w-400"><?php echo "$f_aadhar" ?> &nbsp; <button class="btn btn-grey text-monospace"><a href="../farmers/<?php echo  $f_aadharpdf; ?>" target="_blank">View Aadhar</a></button></h6>
                                        </div>
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">PAN</p>
                                            <h6 class="text-muted f-w-400"><?php echo "$f_pan" ?> &nbsp; <button class="btn btn-grey text-monospace"><a href="../farmers/<?php echo  $f_panpdf; ?>" target="_blank">View PAN</a></button></h6>
                                        </div>
                                    </div>
                                    <h4 class="m-b-20 m-t-40 p-b-5 b-b-default  f-w-600"><strong>Bank Details</strong></h4>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">Bank Account Holder Name</p>
                                            <h6 class="text-muted f-w-400"><?php echo "$f_bankholder" ?></h6>
                                        </div>
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">Bank Account Number</p>
                                            <h6 class="text-muted f-w-400"><?php echo "$f_bankaccount" ?></h6>
                                        </div>
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">Bank IFSC Code</p>
                                            <h6 class="text-muted f-w-400"><?php echo "$f_bankifsc" ?></h6>
                                        </div>
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">Bank Name</p>
                                            <h6 class="text-muted f-w-400"><?php echo "$f_bankname" ?></h6>
                                        </div>
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">Bank Branch</p>
                                            <h6 class="text-muted f-w-400"><?php echo "$f_bankbranch" ?></h6>
                                        </div>
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">Passbook</p>
                                            <h6><button class="btn btn-grey text-monospace"><a href="../farmers/<?php echo  $f_bankpassbook; ?>" target="_blank">View Passbook</a></button></h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-dark" style="background: rgb(12,56,35);">
        <footer>
            <div class="container-fluid">
                <p style="text-align: center;"><strong>© 2021 TapShip.&nbsp; All rights reserved.</strong><br></p>
            </div>
        </footer>
    </div>
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.2.0/aos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script src="../assets/js/freelancer.js"></script>
</body>

</html>