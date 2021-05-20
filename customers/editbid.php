<?php

include('session-script.php');
$res = $_SESSION["sessionid"];
$c_mobile = $res;
if (!isset($_SESSION['login_farmer'])) {
    //header("location: login.php"); // Redirecting To Profile Page
}
error_reporting(0);
?>

<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>Edit Bid Details</title>
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


<script>
    function yesnoCheck(that) {
        if (that.value == "1") {
            document.getElementById("ifself").style.display = "block";
        } else {
            document.getElementById("ifself").style.display = "none";
        }
    }
</script>

<body oncontextmenu='return false' class='snippet-body'>
    <div class="page-content page-container" id="page-content">
        <nav class="navbar navbar-light navbar-expand-lg fixed-top text-uppercase" id="mainNav" style="background: #0c3823;">
            <div class="container-fluid">
                <a class="navbar-brand js-scroll-trigger" data-bs-hover-animate="pulse" href="../index.php" style="font-family: Montserrat, sans-serif;">TAPSHIP</a>
                <button data-toggle="collapse" data-target="#navbarResponsive" class="navbar-toggler navbar-toggler-right text-uppercase rounded" data-aos="fade" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation" style="background: #fff;"><i class="fa fa-bars" style="color: #0c3823;;"></i></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="nav navbar-nav ml-auto">
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" data-bs-hover-animate="pulse" href="index.php" style="filter: contrast(100%) grayscale(0%) hue-rotate(0deg) invert(0%) sepia(0%);">DASHBOARD</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" data-bs-hover-animate="pulse" href="../about.php">ABOUT</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" data-bs-hover-animate="pulse" href="../faq.php">FAQ</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a href="../customers/profile.php"><button class="btn btn-dark text-monospace" data-bs-hover-animate="pulse" type="button" style="margin: 10px;background: rgb(255,255,255);color: #0c3823;margin-left: 0;border-radius: 10px;">View Profile</button></a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a href="../farmers/logout-script.php"><button class="btn btn-dark text-monospace" data-bs-hover-animate="pulse" type="button" style="margin: 10px;background: rgb(255,255,255);color: #0c3823;margin-left: 0;border-radius: 10px;">Log Out</button></a></li>

                    </ul>
                </div>
            </div>
        </nav>

        <div class="features-boxed">
            <div class="container" style="background: #ffffff;">
                <div class="intro" style="background: #0c3823;margin-top: 120px;margin-bottom: 30px;">
                    <h2 class="text-center" data-aos="fade" style="color: rgb(255,255,255);padding: 30px;margin-bottom: 0px;">Edit Bid Details</h2>
                </div>
            </div>
        </div>


        <?php
         $con = mysqli_connect("localhost", "root", "", "tapship");
        if (!$con) {
            die(" Connection Error ");
        }

        $cb_id = $_GET['id'];

        $q = "SELECT cd.cro_id, cd.cro_name, cd.cro_type, cd.cro_msp, cs.cr_id, cs.cr_f_mobile, cs.cr_cro_id, cs.cr_quantity, cs.cr_mep, cs.cr_date, cs.cr_status, cs.cr_img1, cs.cr_img2, cs.cr_img3, cs.cr_status, f.f_name, f.f_mobile, f.f_gender, f.f_age, f.f_street, f.f_city, f.f_state, f.f_pincode, f.f_bankholder, f.f_bankaccount, f.f_bankifsc, f.f_bankname, f.f_bankbranch, cb.cb_bidprice, cb.cb_id, cb.cb_status FROM cropdetails cd, cropsale cs, farmer f, cropbid cb, driver d, transportbid tb where cb.cb_id=$cb_id AND f.f_mobile=cs.cr_f_mobile AND cb.cb_cr_id=cs.cr_id AND cd.cro_id=cs.cr_cro_id";
        $result = mysqli_query($con, $q);

        while ($res = mysqli_fetch_assoc($result)) {
            $cro_id =  $res['cro_id'];
            $cro_name =  $res['cro_name'];
            $cro_type =  $res['cro_type'];
            $cro_msp =  $res['cro_msp'];
            $cr_id = $res['cr_id'];
            $cr_quantity = $res['cr_quantity'];
            $cr_mep = $res['cr_mep'];
            $cr_date = $res['cr_date'];
            $cr_status = $res['cr_status'];
            $cr_img1 = $res['cr_img1'];
            $cr_img2 = $res['cr_img2'];
            $cr_img3 = $res['cr_img3'];

            $f_mobile = $res['f_mobile'];
            $f_name = $res['f_name'];
            $f_gender = $res['f_gender'];
            $f_age = $res['f_age'];
            $f_street = $res['f_street'];
            $f_city = $res['f_city'];
            $f_state = $res['f_state'];
            $f_pincode = $res['f_pincode'];

            $f_bankholder = $res['f_bankholder'];
            $f_bankaccount = $res['f_bankaccount'];
            $f_bankifsc = $res['f_bankifsc'];
            $f_bankname = $res['f_bankname'];
            $f_bankbranch = $res['f_bankbranch'];
            $f_approve =  $res['f_approve'];

            $cb_id = $res['cb_id'];
            $cb_bidprice = $res['cb_bidprice'];
            $cb_status = $res['cb_status'];

            $cb_paytype = $res['cb_paytype'];
            $cb_tid = $res['cb_tid'];
            $cb_tproof = $res['cb_tproof'];
        }
        ?>

        <div>
            <div class="container">
                <div class="cust_bloglistintro">
                    <p style="margin-left:34px;color:rgba(255,255,255,0.5);font-size:14px;"></p>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 cust_blogteaser" data-bs-hover-animate="bounce" style="padding-bottom:20px;margin-bottom:32px;"><a href="#"><img class="img-fluid" style="width:100%;" src="../farmers/<?php echo  $cr_img1; ?>"></a>

                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 cust_blogteaser" style="padding-bottom:20px;margin-bottom:32px;"><a href="#"><img class="img-fluid" data-bs-hover-animate="bounce" style="width:100%;" src="../farmers/<?php echo  $cr_img2; ?>"></a>
                        <a class="h4" href="#"></a>
                    </div>
                    <div class=" col-lg-4 col-md-12 col-sm-12 col-xs-12 cust_blogteaser" style="padding-bottom:20px;margin-bottom:32px;"><a href="#"><img class="img-fluid" data-bs-hover-animate="bounce" style="width:100%;" src="../farmers/<?php echo  $cr_img3; ?>"></a>
                        <a class="h4" href="#"></a>
                    </div>
                </div>

            </div>

            <div class="padding">
                <div class="row container d-flex justify-content-center">
                    <div class="col-xl-12 col-md-12">
                        <div class="card user-card-full">
                            <div class="row m-l-0 m-r-0">

                                <div class="col-sm-12 col-md-12 col">
                                    <div class="card-block">
                                        <h4 class="m-b-20 p-b-5 b-b-default f-w-600"><strong>Crop Details</strong></h4>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <p class="m-b-10 f-w-600">Crop ID</p>
                                                <h6 class="text-muted f-w-400"><?php echo "$cro_id" ?></h6>
                                            </div>
                                            <div class="col-sm-6">
                                                <p class="m-b-10 f-w-600">Crop Name</p>
                                                <h6 class="text-muted f-w-400"><?php echo "$cro_name" ?></h6>
                                            </div>
                                            <div class="col-sm-6">
                                                <p class="m-b-10 f-w-600">Crop Type</p>
                                                <h6 class="text-muted f-w-400"><?php echo "$cro_type" ?></h6>
                                            </div>
                                            <div class="col-sm-6">
                                                <p class="m-b-10 f-w-600">Crop Sale ID</p>
                                                <h6 class="text-muted f-w-400"><?php echo "$cr_id" ?></h6>
                                            </div>
                                            <div class="col-sm-6">
                                                <p class="m-b-10 f-w-600">Minimun Expected Price (per kgs.)</p>
                                                <h6 class="text-muted f-w-400"><?php echo "₹ $cr_mep" ?></h6>
                                            </div>
                                            <div class="col-sm-6">
                                                <p class="m-b-10 f-w-600">Maximum Selling Price (per kgs.)</p>
                                                <h6 class="text-muted f-w-400"><?php echo "₹ $cro_msp" ?></h6>
                                            </div>
                                            <div class="col-sm-6">
                                                <p class="m-b-10 f-w-600">Quantity</p>
                                                <h6 class="text-muted f-w-400"><?php echo "$cr_quantity Kgs" ?></h6>
                                            </div>
                                            <div class="col-sm-6">
                                                <p class="m-b-10 f-w-600">Date</p>
                                                <h6 class="text-muted f-w-400"><?php echo "$cr_date" ?></h6>
                                            </div>
                                            <div class="col-sm-6">
                                                <p class="m-b-10 f-w-600">Crop Status</p>
                                                <h6 class="text-muted f-w-400"><?php if ($cr_status == "0") {
                                                                                    echo "Crop Added";
                                                                                } else if ($cr_status == "1") {
                                                                                    echo "Bidding";
                                                                                } else if ($cr_status == "2") {
                                                                                    echo "Bid Accepeted";
                                                                                } else if ($cr_status == "3") {
                                                                                    echo "Payment Done";
                                                                                } else if ($cr_status == "4") {
                                                                                    echo "Payment Confirmed";
                                                                                } else if ($cr_status == "5") {
                                                                                    echo "Self Transport Selected";
                                                                                } else if ($cr_status == "6") {
                                                                                    echo "Tapship Delivery Selection Pending";
                                                                                } else if ($cr_status == "7") {
                                                                                    echo "Tapship Delivery Selection Pending";
                                                                                } else if ($cr_status == "8") {
                                                                                    echo "Tapship Delivery Selected";
                                                                                } else if ($cr_status == "9") {
                                                                                    echo "Farmer Pickup conformed";
                                                                                } else if ($cr_status == "10") {
                                                                                    echo "Driver Pickup Conformed";
                                                                                } else if ($cr_status == "11") {
                                                                                    echo "Customer Delivery Conformed";
                                                                                } else if ($cr_status == "12") {
                                                                                    echo "Deal Over";
                                                                                } ?></P>
                                                </h6>
                                            </div>
                                        </div><br>
                                        <h4 class="m-b-20 p-b-5 b-b-default f-w-600"><strong>Farmer Details</strong></h4>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <p class="m-b-10 f-w-600">Farmer Name</p>
                                                <h6 class="text-muted f-w-400"><?php echo "$f_name" ?></h6>
                                            </div>
                                            <div class="col-sm-6">
                                                <p class="m-b-10 f-w-600">Farmer Mobile</p>
                                                <h6 class="text-muted f-w-400"><?php echo "$f_mobile" ?></h6>
                                            </div>
                                            <div class="col-sm-6">
                                                <p class="m-b-10 f-w-600">Farmer Gender</p>
                                                <h6 class="text-muted f-w-400"><?php echo "$f_gender" ?></h6>
                                            </div>
                                            <div class="col-sm-6">
                                                <p class="m-b-10 f-w-600">Farmer Age</p>
                                                <h6 class="text-muted f-w-400"><?php echo "$f_age" ?></h6>
                                            </div>
                                            <div class="col-sm-6">
                                                <p class="m-b-10 f-w-600">Farmer Street</p>
                                                <h6 class="text-muted f-w-400"><?php echo "$f_street" ?></h6>
                                            </div>
                                            <div class="col-sm-6">
                                                <p class="m-b-10 f-w-600">Farmer City</p>
                                                <h6 class="text-muted f-w-400"><?php echo "$f_city" ?></h6>
                                            </div>
                                            <div class="col-sm-6">
                                                <p class="m-b-10 f-w-600">Farmer State</p>
                                                <h6 class="text-muted f-w-400"><?php echo "$f_state" ?></h6>
                                            </div>
                                            <div class="col-sm-6">
                                                <p class="m-b-10 f-w-600">Farmer Pincode</p>
                                                <h6 class="text-muted f-w-400"><?php echo "$f_pincode" ?></h6>
                                            </div>
                                        </div><br>
                                        <h4 class="m-b-20 p-b-5 b-b-default f-w-600"><strong>Bank Details</strong></h4>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <p class="m-b-10 f-w-600">Bank Account Holder</p>
                                                <h6 class="text-muted f-w-400"><?php echo "$f_bankholder" ?></h6>
                                            </div>
                                            <div class="col-sm-6">
                                                <p class="m-b-10 f-w-600">Account Number</p>
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
                                        </div><br>
                                        <h4 class="m-b-20 p-b-5 b-b-default f-w-600"><strong>Bid Details</strong></h4>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <p class="m-b-10 f-w-600">Bid ID</p>
                                                <h6 class="text-muted f-w-400"><?php echo "$cb_id" ?></h6>
                                            </div>
                                            <div class="col-sm-6">
                                                <p class="m-b-10 f-w-600">Bid Total Amount</p>
                                                <h6 class="text-muted f-w-400"><?php echo '₹ ', $cb_bidprice * $cr_quantity; ?></h6>
                                            </div>
                                            <div class="col-sm-6">
                                                <p class="m-b-10 f-w-600">Bid Status</p>
                                                <h6 class="text-muted f-w-400"><?php if ($cb_status == "0") {
                                                                                    echo "Bid Placed";
                                                                                } else if ($cb_status == "1") {
                                                                                    echo "Bid Accepted";
                                                                                } else if ($cb_status == "2") {
                                                                                    echo "Bid Rejected";
                                                                                } else if ($cb_status == "3") {
                                                                                    echo "Payment Conformation Pending";
                                                                                } else if ($cb_status == "4") {
                                                                                    echo "Transport Selection Pending";
                                                                                } else if ($cb_status == "5") {
                                                                                    echo "Delivery Pending";
                                                                                } else if ($cb_status == "6") {
                                                                                    echo "Tapship Delievry Selected ";
                                                                                } else if ($cb_status == "7") {
                                                                                    echo "Tapship Delivery Bidding";
                                                                                } else if ($cb_status == "8") {
                                                                                    echo "Farmer Pickup Conformation Pending";
                                                                                } else if ($cb_status == "9") {
                                                                                    echo "Driver Pickup Conformation Pending";
                                                                                } else if ($cb_status == "10") {
                                                                                    echo "Customer Delivery Conformation Pending";
                                                                                } else if ($cb_status == "11") {
                                                                                    echo "Driver Delivery Conformation Pending";
                                                                                } else if ($cb_status == "12") {
                                                                                    echo "Deal Over";
                                                                                } else if ($cb_status == "13") {
                                                                                    echo "Crop Deleted By Farmer";
                                                                                } ?></h6>
                                            </div>

                                            <form method="post" action="editbid-script.php" enctype="multipart/form-data" style="width:100%;">
                                                <div class="col-sm-6">
                                                    <h4 class="m-b-20 p-b-5 b-b-default f-w-600"><strong>Update Bid Price</strong></h4>
                                                    <p class="m-b-10 f-w-600">Bid Price</p>
                                                    <p style="color:red; font-weight:700;">**Please Enter Bid greater than or equal to MEP**</p>
                                                    <div class="form-group"><input class="form-control" type="text" name="bid" placeholder="Enter Bid Price" value="<?php echo $cb_bidprice; ?>" required="" autofocus=""></div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <p class="m-b-10 f-w-600"></p><br>
                                                    <input type="hidden" name="id" value="<?php echo $cb_id; ?>">
                                                    <input type="hidden" name="mep" value="<?php echo $cr_mep; ?>">
                                                    <button class="btn btn-primary btn-block" type="submit" name="update" style="background-color:#0c3823;">Update</button>
                                            </form>
                                        </div><br>


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
    </div>
</body>

</html>