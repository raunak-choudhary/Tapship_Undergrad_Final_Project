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
    <title>Crop Details</title>
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
    <link href='https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/3.6.95/css/materialdesignicons.css' rel='stylesheet'>

    <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>


</head>

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
                        <li class="nav-item mx-0 mx-lg-1"><a href="../farmers/profile.php"><button class="btn btn-dark text-monospace" data-bs-hover-animate="pulse" type="button" style="margin: 10px;background: rgb(255,255,255);color: #0c3823;margin-left: 0;border-radius: 10px;">View Profile</button></a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a href="../farmers/logout-script.php"><button class="btn btn-dark text-monospace" data-bs-hover-animate="pulse" type="button" style="margin: 10px;background: rgb(255,255,255);color: #0c3823;margin-left: 0;border-radius: 10px;">Log Out</button></a></li>
                    </ul>
                </div>
            </div>
        </nav>


        <div class="features-boxed">
            <div class="container" style="background: #ffffff;">
                <div class="intro" style="background: #0c3823;margin-top: 120px;margin-bottom: 30px;">
                    <h2 class="text-center" data-aos="fade" style="color: rgb(255,255,255);padding: 30px;margin-bottom: 0px;">Crop Details</h2>
                </div>
            </div>
        </div>


        <?php
         $con = mysqli_connect("remotemysql.com", "m1t7Rrl6v7", "gIP1i7Re2y", "m1t7Rrl6v7");
        if (!$con) {
            die(" Connection Error ");
        }

        $id = $_GET['id'];
        
        $cr_id=base64_decode($id);
        $cr_id=round((double)$cr_id/525325.24/6537838239.89);
        
        $q = "select cr_status from cropsale where cr_id = $cr_id";
        $result = mysqli_query($con, $q);

        while ($res = mysqli_fetch_assoc($result)) {
            $cr_status = $res['cr_status'];
        }

        if ($cr_status == 0 || $cr_status == 1) {
            $query = "SELECT CD.cro_id, CD.cro_name, CD.cro_type, CD.cro_msp, CS.cr_id, CS.cr_f_mobile, CS.cr_cro_id, CS.cr_quantity, CS.cr_mep, CS.cr_date, CS.cr_status, CS.cr_img1, CS.cr_img2, CS.cr_img3, cs.cr_status FROM cropdetails CD, cropsale CS where cs.cr_id=$cr_id and CD.cro_id=cs.cr_cro_id";
        }

        if ($cr_status == 2) {
            $q = "select cb_id from cropbid where cb_cr_id = $cr_id AND cb_f_mobile = $f_mobile AND cb_status!=2";
            $result = mysqli_query($con, $q);

            while ($res = mysqli_fetch_assoc($result)) {
                $cb_id =  $res['cb_id'];
            }
            $query = "SELECT CD.cro_id, CD.cro_name, CD.cro_type, CD.cro_msp, CS.cr_id, CS.cr_f_mobile, CS.cr_cro_id, CS.cr_quantity, CS.cr_mep, CS.cr_date, CS.cr_status, CS.cr_img1, CS.cr_img2, CS.cr_img3, cs.cr_status, c.c_name, c.c_mobile, c.c_contactname, c.c_gender, c.c_age, c.c_street, c.c_city, c.c_state, c.c_pincode, c.c_type, cb.cb_bidprice, cb.cb_id, cb.cb_status FROM cropdetails CD, cropsale CS, customer c, cropbid cb where cs.cr_id=$cr_id AND cb.cb_id=$cb_id AND cb.cb_c_mobile=c.c_mobile AND cs.cr_cro_id=CD.cro_id";
        }

        if ($cr_status == 3 || $cr_status == 4) {
            $q = "select cb.cb_id from cropbid cb where cb.cb_cr_id = $cr_id AND cb.cb_f_mobile = $f_mobile AND cb_status!=2";
            $result = mysqli_query($con, $q);

            while ($res = mysqli_fetch_assoc($result)) {
                $cb_id =  $res['cb_id'];
            }
            $query = "SELECT CD.cro_id, CD.cro_name, CD.cro_type, CD.cro_msp, CS.cr_id, CS.cr_f_mobile, CS.cr_cro_id, CS.cr_quantity, CS.cr_mep, CS.cr_date, CS.cr_status, CS.cr_img1, CS.cr_img2, CS.cr_img3, cs.cr_status, c.c_name, c.c_mobile, c.c_contactname, c.c_gender, c.c_age, c.c_street, c.c_city, c.c_state, c.c_pincode, c.c_type, cb.cb_bidprice, cb.cb_id, cb.cb_status, cb.cb_paytype, cb.cb_tid, cb.cb_tproof FROM cropdetails CD, cropsale CS, customer c, cropbid cb where cs.cr_id=$cr_id AND cb.cb_id=$cb_id AND cb.cb_c_mobile=c.c_mobile AND cs.cr_cro_id=CD.cro_id";
        }
        if ($cr_status == 5) {
            $q = "select cb_id from cropbid where cb_cr_id = $cr_id AND cb_f_mobile = $f_mobile AND cb_status!=2";
            $result = mysqli_query($con, $q);

            while ($res = mysqli_fetch_assoc($result)) {
                $cb_id =  $res['cb_id'];
            }
            $query = "SELECT CD.cro_id, CD.cro_name, CD.cro_type, CD.cro_msp, CS.cr_id, CS.cr_f_mobile, CS.cr_cro_id, CS.cr_quantity, CS.cr_mep, CS.cr_date, CS.cr_status, CS.cr_img1, CS.cr_img2, CS.cr_img3, cs.cr_status, c.c_name, c.c_mobile, c.c_contactname, c.c_gender, c.c_age, c.c_street, c.c_city, c.c_state, c.c_pincode, c.c_type, cb.cb_bidprice, cb.cb_id, cb.cb_status, cb.cb_paytype, cb.cb_tid, cb.cb_tproof, cb.cb_status FROM cropdetails CD, cropsale CS, customer c, cropbid cb where cs.cr_id=$cr_id AND cb.cb_id=$cb_id AND cb.cb_c_mobile=c.c_mobile AND cs.cr_cro_id=CD.cro_id";
        }

        if ($cr_status == 6 || $cr_status == 7) {
            $q = "select cb_id from cropbid where cb_cr_id = $cr_id AND cb_f_mobile = $f_mobile AND cb_status!=2";
            $result = mysqli_query($con, $q);

            while ($res = mysqli_fetch_assoc($result)) {
                $cb_id =  $res['cb_id'];
            }
            $query = "SELECT CD.cro_id, CD.cro_name, CD.cro_type, CD.cro_msp, CS.cr_id, CS.cr_f_mobile, CS.cr_cro_id, CS.cr_quantity, CS.cr_mep, CS.cr_date, CS.cr_status, CS.cr_img1, CS.cr_img2, CS.cr_img3, cs.cr_status, c.c_name, c.c_mobile, c.c_contactname, c.c_gender, c.c_age, c.c_street, c.c_city, c.c_state, c.c_pincode, c.c_type, cb.cb_bidprice, cb.cb_id, cb.cb_status, cb.cb_paytype, cb.cb_tid, cb.cb_tproof FROM cropdetails CD, cropsale CS, farmer f, cropbid cb, customer c where cs.cr_id=$cr_id AND cb.cb_id=$cb_id AND cb.cb_f_mobile=$f_mobile AND cb.cb_c_mobile=c.c_mobile AND cb.cb_f_mobile=f.f_mobile AND cb.cb_cr_id=cs.cr_id AND CD.cro_id=CS.cr_cro_id";
        }

        if ($cr_status == 8 || $cr_status == 9 || $cr_status == 10 || $cr_status== 11 || $cr_status== 12) {
            $q = "select cb_id, cb_transporttype from cropbid where cb_cr_id = $cr_id AND cb_f_mobile = $f_mobile and cb_transporttype!=0";
            $result = mysqli_query($con, $q);

            while ($res = mysqli_fetch_assoc($result)) {
                $cb_id =  $res['cb_id'];
                $cb_transporttype = $res['cb_transporttype'];
            }

            if($cb_transporttype==1){
                $query = "SELECT CD.cro_id, CD.cro_name, CD.cro_type, CD.cro_msp, CS.cr_id, CS.cr_f_mobile, CS.cr_cro_id, CS.cr_quantity, CS.cr_mep, CS.cr_date, CS.cr_status, CS.cr_img1, CS.cr_img2, CS.cr_img3, cs.cr_status, c.c_name, c.c_mobile, c.c_contactname, c.c_gender, c.c_age, c.c_street, c.c_city, c.c_state, c.c_pincode, c.c_type, cb.cb_bidprice, cb.cb_id, cb.cb_status, cb.cb_paytype, cb.cb_tid, cb.cb_tproof, cb.cb_transporttype FROM cropdetails CD, cropsale CS, farmer f, cropbid cb, customer c where cs.cr_id=$cr_id AND cb.cb_id=$cb_id AND cb.cb_f_mobile=$f_mobile AND cb.cb_c_mobile=c.c_mobile AND cb.cb_f_mobile=f.f_mobile AND cb.cb_cr_id=cs.cr_id AND CD.cro_id=CS.cr_cro_id";
            }

            if($cb_transporttype==2){
                $query = "SELECT CD.cro_id, CD.cro_name, CD.cro_type, CD.cro_msp, CS.cr_id, CS.cr_f_mobile, CS.cr_cro_id, CS.cr_quantity, CS.cr_mep, CS.cr_date, CS.cr_status, CS.cr_img1, CS.cr_img2, CS.cr_img3, cs.cr_status, c.c_name, c.c_mobile, c.c_contactname, c.c_gender, c.c_age, c.c_street, c.c_city, c.c_state, c.c_pincode, c.c_type, cb.cb_bidprice, cb.cb_id, cb.cb_status, cb.cb_paytype, cb.cb_tid, cb.cb_tproof, cb.cb_transporttype, d.d_name, d.d_mobile, d.d_gender, d.d_age, d.d_lat, d.d_long, d.d_vehiclenumber, d.d_dlnumber, d.d_street, d.d_city, d.d_state, d.d_pincode, d.d_date, d.d_time, tb.tb_id, tb.tb_bid, tb.tb_status FROM cropdetails CD, cropsale CS, farmer f, cropbid cb, customer c, driver d, transportbid tb where tb.tb_d_mobile=d.d_mobile AND cs.cr_id=$cr_id AND cb.cb_id=$cb_id AND cb.cb_f_mobile=$f_mobile AND cb.cb_c_mobile=c.c_mobile AND cb.cb_f_mobile=f.f_mobile AND cb.cb_cr_id=cs.cr_id AND CD.cro_id=CS.cr_cro_id and tb.tb_cb_id=$cb_id AND tb.tb_status=1";
            }
        }

        $result = mysqli_query($con, $query);

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
            $cb_id =  $res['cb_id'];

            $c_mobile = $res['c_mobile'];
            $c_name = $res['c_name'];
            $c_contactname = $res['c_contactname'];
            $c_gender = $res['c_gender'];
            $c_age = $res['c_age'];
            $c_street = $res['c_street'];
            $c_city = $res['c_city'];
            $c_state = $res['c_state'];
            $c_pincode = $res['c_pincode'];
            $c_type = $res['c_type'];

            $cb_id = $res['cb_id'];
            $cb_bidprice = $res['cb_bidprice'];
            $cb_status = $res['cb_status'];

            $cb_paytype = $res['cb_paytype'];
            $cb_tid = $res['cb_tid'];
            $cb_tproof = $res['cb_tproof'];
            $cb_transporttype = $res['cb_transporttype'];

            $tb_id = $res['tb_id'];
            $tb_bid = $res['tb_bid'];
            $tb_status = $res['tb_status'];

            $d_mobile = $res['d_mobile'];
            $d_name = $res['d_name'];
            $d_gender = $res['d_gender'];
            $d_age = $res['d_age'];
            $d_dlnumber = $res['d_dlnumber'];
            $d_vehiclenumber = $res['d_vehiclenumber'];
            $d_lat = $res['d_lat'];
            $d_long = $res['d_long'];
            $d_street = $res['d_street'];
            $d_city = $res['d_city'];
            $d_state = $res['d_state'];
            $d_pincode= $res['d_pincode'];
            $d_time = $res['d_time'];
            $d_date = $res['d_date'];
            
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
                                                <p class="m-b-10 f-w-600">Minimum Selling Price (per kgs.)</p>
                                                <h6 class="text-muted f-w-400"><?php echo "₹ $cro_msp" ?></h6>
                                            </div>
                                            <div class="col-sm-6">
                                                <p class="m-b-10 f-w-600">Minimun Expected Price (per kgs.)</p>
                                                <h6 class="text-muted f-w-400"><?php echo "₹ $cr_mep" ?></h6>
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
                                                                                } ?>
                                            </div>
                                        </div><br>

                                        <?php
                                        if ($cr_status == 0) {
                                            $cr_id=round((double)$cr_id*525325.24*6537838239.89);
                                            $id = base64_encode($cr_id);
                                        ?>

                                            <button class="btn btn-dark text-monospace  " style="background-color:#0c3823;"><a href="editcrop.php?id=<?php echo $id; ?>" style="color:white; text-decoration: none;">Edit Details</a></button>
                                            <button class="btn btn-dark text-monospace  " style="background-color:#0c3823;"><a href="deletecrop.php?id=<?php echo $id; ?>" style="color:white; text-decoration: none;">Delete</a></button>

                                        <?php
                                        }
                                        if ($cr_status == 1) {
                                        ?>
                                            <button class="btn" style="background-color:#0c3823;"> <a href="viewbids.php?cr_id=<?php echo $cr_id; ?>" class="text-white" style="color:white; text-decoration: none;"> View Bids </a> </button>
                                            <button class="btn btn-dark text-monospace  " style="background-color:#0c3823;" ><a href="deletecropafterbid.php?id=<?php echo $id; ?>" style="color:white; text-decoration: none;">Delete</a></button>

                                        <?php

                                        }
                                        if ($cr_status == 2 || $cr_status == 3 || $cr_status == 4 || $cr_status == 5 || $cr_status == 6 || $cr_status == 7 || $cr_status == 8 || $cr_status == 9 || $cr_status == 10 || $cr_status == 11 || $cr_status == 12) {
                                        ?>
                                            <h4 class="m-b-20 p-b-5 b-b-default f-w-600"><strong>Customer Details</strong></h4>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <p class="m-b-10 f-w-600">Customer Type</p>
                                                    <h6 class="text-muted f-w-400"><?php echo "$c_type" ?></h6>
                                                </div>
                                                <div class="col-sm-6">
                                                    <p class="m-b-10 f-w-600">Customer Name</p>
                                                    <h6 class="text-muted f-w-400"><?php echo "$c_name" ?></h6>
                                                </div>
                                                <div class="col-sm-6">
                                                    <p class="m-b-10 f-w-600">Customer Mobile</p>
                                                    <h6 class="text-muted f-w-400"><?php echo "$c_mobile" ?></h6>
                                                </div>
                                                <?php if ($c_type == 'Organization') { ?>
                                                    <div class="col-sm-6">
                                                        <p class="m-b-10 f-w-600">Customer Contact Name</p>
                                                        <h6 class="text-muted f-w-400"><?php echo "$c_contactname" ?></h6>
                                                    </div>
                                                <?php } ?>
                                                <div class="col-sm-6">
                                                    <p class="m-b-10 f-w-600">Customer Gender</p>
                                                    <h6 class="text-muted f-w-400"><?php echo "$c_gender" ?></h6>
                                                </div>
                                                <div class="col-sm-6">
                                                    <p class="m-b-10 f-w-600">Customer Age</p>
                                                    <h6 class="text-muted f-w-400"><?php echo "$c_age" ?></h6>
                                                </div>
                                                <div class="col-sm-6">
                                                    <p class="m-b-10 f-w-600">Customer Street</p>
                                                    <h6 class="text-muted f-w-400"><?php echo "$c_street" ?></h6>
                                                </div>
                                                <div class="col-sm-6">
                                                    <p class="m-b-10 f-w-600">Customer City</p>
                                                    <h6 class="text-muted f-w-400"><?php echo "$c_city" ?></h6>
                                                </div>
                                                <div class="col-sm-6">
                                                    <p class="m-b-10 f-w-600">Customer State</p>
                                                    <h6 class="text-muted f-w-400"><?php echo "$c_state" ?></h6>
                                                </div>
                                                <div class="col-sm-6">
                                                    <p class="m-b-10 f-w-600">Customer Pincode</p>
                                                    <h6 class="text-muted f-w-400"><?php echo "$c_pincode" ?></h6>
                                                </div>
                                            </div><br>
                                            <h4 class="m-b-20 p-b-5 b-b-default f-w-600"><strong>Bid Details</strong></h4>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <p class="m-b-10 f-w-600">Bid ID</p>
                                                    <h6 class="text-muted f-w-400"><?php echo "$cb_id" ?></h6>
                                                </div>
                                                <div class="col-sm-6">
                                                    <p class="m-b-10 f-w-600">Bid Price</p>
                                                    <h6 class="text-muted f-w-400"><?php echo '₹ ', $cb_bidprice; ?></h6>
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
                                                                                    } ?>
                                                </div>
                                            </div><br>

                                        <?php
                                        }
                                        if ($cr_status == 2) {
                                        ?>
                                            <h6> Note: - Please wait for payment from <?php echo $c_name; ?></h6>
                                        <?php
                                        }
                                        if ($cr_status == 3 || $cr_status == 4 || $cr_status == 5 || $cr_status == 6 || $cr_status == 7 || $cr_status == 8 || $cr_status == 9 || $cr_status == 10 || $cr_status == 11 || $cr_status == 12) {
                                        ?>
                                            <h4 class="m-b-20 p-b-5 b-b-default f-w-600"><strong>Payment Details</strong></h4>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <p class="m-b-10 f-w-600">Payment Type</p>
                                                    <h6 class="text-muted f-w-400"><?php echo $cb_paytype; ?></h6>
                                                </div>
                                                <div class="col-sm-6">
                                                    <p class="m-b-10 f-w-600">Transaction ID</p>
                                                    <h6 class="text-muted f-w-400"><?php echo $cb_tid; ?></h6>
                                                </div>
                                                <div class="col-sm-6">
                                                    <p class="m-b-10 f-w-600">Transaction Proof</p>
                                                    <h6 class="text-muted f-w-400"><a href="../customers/<?php echo  $cb_tproof; ?>" target="_blank">View Transcation</a></h6>
                                                </div>
                                            </div><br>

                                        <?php
                                        }
                                        if ($cr_status == 3) {
                                        ?>
                                            <form method="post" action="confirmpayment.php?cr_id=<?php echo $cr_id; ?>" enctype="multipart/form-data">
                                                <button name="submit" type="submit" class="btn btn-dark text-monospace" style="background-color:#0c3823;"> Confirm Payment </button>
                                            </form>

                                        <?php
                                        }
                                        if ($cr_status == 4) {
                                        ?>
                                        <br>
                                            <h6> Note: - Please wait for transport type selection by <?php echo $c_name; ?></h6>

                                        <?php
                                        }
                                        if ($cr_status == 5) {
                                        ?>
                                            <h4 class="m-b-20 p-b-5 b-b-default f-w-600"><strong>Tranport Details</strong></h4>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <p class="m-b-10 f-w-600">Medium</p>
                                                    <h6 class="text-muted f-w-400"><?php echo "Self Transport"; ?></h6>
                                                </div>

                                                <?php
                                                if ($cb_status == "5") {
                                                    $query = "select * from transportself where ts_cb_id=$cb_id";
                                                    $result = mysqli_query($con, $query);

                                                    while ($res = mysqli_fetch_assoc($result)) {
                                                        $ts_name =  $res['ts_name'];
                                                        $ts_mobile =  $res['ts_mobile'];
                                                        $ts_vehiclenumber =  $res['ts_vehiclenumber'];
                                                    } ?>
                                                    <div class="col-sm-6">
                                                        <p class="m-b-10 f-w-600">Driver Name</p>
                                                        <h6 class="text-muted f-w-400"><?php echo $ts_name; ?></h6>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <p class="m-b-10 f-w-600">Driver Mobile</p>
                                                        <h6 class="text-muted f-w-400"><?php echo $ts_mobile; ?></h6>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <p class="m-b-10 f-w-600">Vehicle Number</p>
                                                        <h6 class="text-muted f-w-400"><?php echo  $ts_vehiclenumber; ?></h6>
                                                    </div>
                                            </div><br>
                                        <?php } ?>
                                        <form method="post" action="pickupdone.php?cb_id=<?php echo $cb_id; ?>" enctype="multipart/form-data" onsubmit="return checkForm(this);">
                                            <input type="checkbox" id="check"> Driver <?php echo $ts_name; ?> has picked up <?php echo $cr_quantity; ?> kgs. of <?php echo $cro_name; ?> to deliver it to <?php echo $c_name; ?>
                                            <br>
                                            <p id="demo"></p>
                                            <button name="submit" type="submit" class="btn btn-dark text-monospace" style="background-color:#0c3823;"> Confirm Pickup </button>
                                        </form>

                                        <script>
                                            function checkForm(form) {
                                                if (!form.check.checked) {
                                                    document.getElementById("demo").innerHTML = ("Please accept that driver has picked up the delivery from you by clicking checkbox");
                                                    return false;
                                                }
                                                return true;
                                            }
                                        </script>


                                    <?php
                                        }
                                        if ($cr_status == 6 || $cr_status == 7) {
                                    ?>
                                        <h4 class="m-b-20 p-b-5 b-b-default f-w-600"><strong>Tranport Details</strong></h4>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <p class="m-b-10 f-w-600">Medium</p>
                                                <h6 class="text-muted f-w-400"><?php echo "Tapship Delivery"; ?></h6>
                                            </div>
                                        </div>
                                        <br>
                                        <h6> Note: - Please wait for transport some time while customer is finding a truck</h6>
                                    <?php
                                    }
                                    if ($cr_status == 8 || $cr_status == 9 || $cr_status == 10 || $cr_status == 11 || $cr_status == 12) {
                                    if($cb_transporttype==1){
                                    ?>
                                        <h4 class="m-b-20 p-b-5 b-b-default f-w-600"><strong>Tranport Details</strong></h4>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <p class="m-b-10 f-w-600">Medium</p>
                                                <h6 class="text-muted f-w-400"><?php echo "Self Transport"; ?></h6>
                                            </div>
                                        </div><br>
                                        <h4 class="m-b-20 p-b-5 b-b-default f-w-600"><strong>Driver Details</strong></h4>
                                        <div class="row">
                                        <?php
                                                    $query = "select * from transportself where ts_cb_id=$cb_id";
                                                    $result = mysqli_query($con, $query);

                                                    while ($res = mysqli_fetch_assoc($result)) {
                                                        $ts_name =  $res['ts_name'];
                                                        $ts_mobile =  $res['ts_mobile'];
                                                        $ts_vehiclenumber =  $res['ts_vehiclenumber'];
                                                    } ?>
                                                    <div class="col-sm-6">
                                                        <p class="m-b-10 f-w-600">Driver Name</p>
                                                        <h6 class="text-muted f-w-400"><?php echo $ts_name; ?></h6>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <p class="m-b-10 f-w-600">Driver Mobile</p>
                                                        <h6 class="text-muted f-w-400"><?php echo $ts_mobile; ?></h6>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <p class="m-b-10 f-w-600">Vehicle Number</p>
                                                        <h6 class="text-muted f-w-400"><?php echo  $ts_vehiclenumber; ?></h6>
                                                    </div>
                                        </div><br>
                                    <?php
                                    }
                                    if($cb_transporttype==2){
                                        ?>
                                            <h4 class="m-b-20 p-b-5 b-b-default f-w-600"><strong>Tranport Details</strong></h4>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <p class="m-b-10 f-w-600">Medium</p>
                                                    <h6 class="text-muted f-w-400"><?php echo "Tapship Delivery"; ?></h6>
                                                </div>
                                                <div class="col-sm-6">
                                                    <p class="m-b-10 f-w-600">Tranport ID</p>
                                                    <h6 class="text-muted f-w-400"><?php echo $tb_id; ?></h6>
                                                </div>
                                                <div class="col-sm-6">
                                                    <p class="m-b-10 f-w-600">Tranport Bid</p>
                                                    <h6 class="text-muted f-w-400"><?php echo $tb_bid; ?></h6>
                                                </div>
                                                <div class="col-sm-6">
                                                    <p class="m-b-10 f-w-600">Tranport Status</p>
                                                    <h6 class="text-muted f-w-400"><?php if ($tb_status == "0") {
                                                                                    echo "Bidding";
                                                                                } else if ($tb_status == "1") {
                                                                                    echo "Bid Accepeted";
                                                                                } else if ($tb_status == "2") {
                                                                                    echo "Bid Rejected";
                                                                                }?></h6>
                                                </div>
                                            </div><br>
                                            <h4 class="m-b-20 p-b-5 b-b-default f-w-600"><strong>Driver Details</strong></h4>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <p class="m-b-10 f-w-600">Driver Name</p>
                                                    <h6 class="text-muted f-w-400"><?php echo $d_name; ?></h6>
                                                </div>
                                                <div class="col-sm-6">
                                                    <p class="m-b-10 f-w-600">Driver Mobile</p>
                                                    <h6 class="text-muted f-w-400"><?php echo $d_mobile; ?></h6>
                                                </div>
                                                <div class="col-sm-6">
                                                    <p class="m-b-10 f-w-600">Driver Age</p>
                                                    <h6 class="text-muted f-w-400"><?php echo $d_age; ?></h6>
                                                </div>
                                                <div class="col-sm-6">
                                                    <p class="m-b-10 f-w-600">Driver Gender</p>
                                                    <h6 class="text-muted f-w-400"><?php echo $d_gender; ?></h6>
                                                </div>
                                                <div class="col-sm-6">
                                                    <p class="m-b-10 f-w-600">Driver License Number</p>
                                                    <h6 class="text-muted f-w-400"><?php echo $d_dlnumber; ?></h6>
                                                </div>
                                                <div class="col-sm-6">
                                                    <p class="m-b-10 f-w-600">Vehicle Number</p>
                                                    <h6 class="text-muted f-w-400"><?php echo  $d_vehiclenumber; ?></h6>
                                                </div>

                                                <div class="col-sm-6">
                                                    <p class="m-b-10 f-w-600">Driver Address</p>
                                                    <h6 class="text-muted f-w-400"><?php echo  $d_street." ".$d_city." ".$d_state."-".$d_pincode; ?></h6>
                                                </div>
                                                <div class="col-sm-6">
                                                    <p class="m-b-10 f-w-600">Location (<i>Last Updated: <?php echo "$d_time" ?>&nbsp<?php echo "$d_date" ?><i>)</p>
                                                    <h6 class="text-muted f-w-400"><a href="https://www.google.com/maps/@<?php echo  $d_lat; ?>,<?php echo  $d_long; ?>,14z" target="_blank">View Location</a></h6>
                                                </div>
                                            </div><br>
                                        <?php
                                        }
                                    }
                                        if ($cr_status == 8) {
                                    ?>
                                        <form method="post" action="pickupdone.php?cb_id=<?php echo $cb_id; ?>" enctype="multipart/form-data" onsubmit="return checkForm(this);">
                                            <input type="checkbox" id="check"> Driver <?php echo $d_name; ?> has picked up <?php echo $cr_quantity; ?> kgs. of <?php echo $cro_name; ?> to deliver it to <?php echo $c_name; ?>
                                            <br>
                                            <p id="demo"></p>
                                            <button name="submit" type="submit" class="btn btn-dark text-monospace" style="background-color:#0c3823;"> Confirm Pickup </button>
                                        </form>

                                        <script>
                                            function checkForm(form) {
                                                if (!form.check.checked) {
                                                    document.getElementById("demo").innerHTML = ("Please accept that driver has picked up the delivery from you by clicking checkbox");
                                                    return false;
                                                }
                                                return true;
                                            }
                                        </script>
                                    <?php
                                        }

                                        if ($cr_status == 9) {
                                    ?>
                                        <h6> Note: - Please wait for pickup conformation from Driver</h6>
                                    <?php
                                        }
                                        if ($cr_status == 10) {
                                    ?>
                                        <h6> Note: - Please wait for crop successfully delivered to customer conformation from customer</h6>
                                    <?php
                                        }
                                        if ($cr_status == 11) {
                                    ?>
                                        <h6> Note: - Please wait for successfully delivered conformation from Driver</h6>
                                    <?php
                                        }
                                        if ($cr_status == 12) {
                                    ?>
                                        <h6> Note: - This deal is successfully completed and closed</h6>
                                        <br>
                                        <h4 style="text-align: center;">Thank You for doing business with us</h4>
                                    <?php
                                        } ?>
                                    <hr>
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