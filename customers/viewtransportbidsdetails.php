<?php

include('session-script.php');
$res = $_SESSION["sessionid"];
$c_mobile = $res;
if (!isset($_SESSION['login_farmer'])) {
    //header("location: login.php"); // Redirecting To Profile Page
}
error_reporting(0);

$con = mysqli_connect("localhost", "root", "", "tapship");
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Transport Bids</title>
    <link rel="icon" href="../assets/img/fav.png" type="image/png">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic">
    <link rel="stylesheet" href="../assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="../assets/css/Article-List.css">
    <link rel="stylesheet" href="../assets/css/Features-Boxed.css">
    <link rel="stylesheet" href="../assets/css/Footer-Dark.css">
    <link rel="stylesheet" href="../assets/css/Highlight-Blue.css">
	<link rel="stylesheet" href="../assets/css/profile.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.2.0/aos.css">
    <link rel="stylesheet" href="../assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="../assets/css/table-style.css" />
</head>

<body id="page-top">
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
                    <li class="nav-item mx-0 mx-lg-1"><a href="../farmers/profile.php"><button class="btn btn-dark text-monospace" data-bs-hover-animate="pulse" type="button" style="margin: 10px;background: rgb(255,255,255);color: #0c3823;margin-left: 0;border-radius: 10px;">View Profile</button></a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a href="../farmers/logout-script.php"><button class="btn btn-dark text-monospace" data-bs-hover-animate="pulse" type="button" style="margin: 10px;background: rgb(255,255,255);color: #0c3823;margin-left: 0;border-radius: 10px;">Log Out</button></a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="features-boxed">
        <div class="container-fluid" style="background: #ffffff;">
            <div class="intro" style="background: #0c3823;margin-top: 120px;margin-bottom: 30px;">
                <h2 class="text-center" data-aos="fade" style="color: rgb(255,255,255);padding: 30px;margin-bottom: 0px;">Transport Bids</h2>
            </div>
        </div>
    </div>

    <?php
    $tb_id = $_GET['tb_id'];

    $q = "SELECT CD.cro_id, CD.cro_name, CD.cro_type, CS.cr_id, CS.cr_quantity, cs.cr_status, cs.cr_img1,cs.cr_img2,cs.cr_img3, f.f_name, f.f_mobile, f.f_gender, f.f_age, f.f_street, f.f_city, f.f_state, f.f_pincode, d.d_name, d.d_mobile, d.d_gender, d.d_age, d.d_street, d.d_city, d.d_state, d.d_pincode, tb.tb_id, tb.tb_bid, tb.tb_status FROM cropdetails cd, cropbid cb, cropsale cs, farmer f, transportbid tb, driver d where tb.tb_d_mobile=d.d_mobile AND cd.cro_id=cs.cr_cro_id AND cb.cb_cr_id=cs.cr_id AND f.f_mobile=cb.cb_f_mobile AND tb.tb_cb_id=cb.cb_id AND cs.cr_status='7' AND tb.tb_id=$tb_id";
    $result = mysqli_query($con, $q);

    while ($res = mysqli_fetch_assoc($result)) {
        $cro_id =  $res['cro_id'];
        $cro_name =  $res['cro_name'];
        $cro_type =  $res['cro_type'];
        $cr_id = $res['cr_id'];
        $cr_status = $res['cr_status'];
        $cr_quantity = $res['cr_quantity'];
        $cr_img1 = $res['cr_img1'];
        $cr_img2 = $res['cr_img2'];
        $cr_img3 = $res['cr_img3'];

        $f_name = $res['f_name'];
        $f_mobile =  $res['f_mobile'];
        $f_gender = $res['f_gender'];
        $f_age = $res['f_age'];
        $f_street = $res['f_street'];
        $f_city = $res['f_city'];
        $f_state = $res['f_state'];
        $f_pincode = $res['f_pincode'];

        $d_name = $res['d_name'];
        $d_mobile =  $res['d_mobile'];
        $d_gender = $res['d_gender'];
        $d_age = $res['d_age'];
        $d_street = $res['d_street'];
        $d_city = $res['d_city'];
        $d_state = $res['d_state'];
        $d_pincode = $res['d_pincode'];

        $tb_id = $res['tb_id'];
        $tb_bid = $res['tb_bid'];
        $tb_status = $res['tb_status'];
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
                                                <p class="m-b-10 f-w-600">Quantity</p>
                                                <h6 class="text-muted f-w-400"><?php echo "$cr_quantity Kgs" ?></h6>
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
										<h4 class="m-b-20 p-b-5 b-b-default f-w-600"><strong>Driver Details</strong></h4>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <p class="m-b-10 f-w-600">Driver Name</p>
                                                    <h6 class="text-muted f-w-400"><?php echo "$d_name" ?></h6>
                                                </div>
                                                <div class="col-sm-6">
                                                    <p class="m-b-10 f-w-600">Driver Mobile</p>
                                                    <h6 class="text-muted f-w-400"><?php echo "$d_mobile" ?></h6>
                                                </div>
                                                <div class="col-sm-6">
                                                    <p class="m-b-10 f-w-600">Driver Age</p>
                                                    <h6 class="text-muted f-w-400"><?php echo "$d_age" ?></h6>
                                                </div>
                                                <div class="col-sm-6">
                                                    <p class="m-b-10 f-w-600">Driver Gender</p>
                                                    <h6 class="text-muted f-w-400"><?php echo "$d_gender" ?></h6>
                                                </div>
												<div class="col-sm-6">
													<p class="m-b-10 f-w-600">Driver Street</p>
													<h6 class="text-muted f-w-400"><?php echo "$d_street" ?></h6>
												</div>
												<div class="col-sm-6">
													<p class="m-b-10 f-w-600">Driver City</p>
													<h6 class="text-muted f-w-400"><?php echo "$d_city" ?></h6>
												</div>
												<div class="col-sm-6">
													<p class="m-b-10 f-w-600">Driver State</p>
													<h6 class="text-muted f-w-400"><?php echo "$d_state" ?></h6>
												</div>
												<div class="col-sm-6">
													<p class="m-b-10 f-w-600">Driver Pincode</p>
													<h6 class="text-muted f-w-400"><?php echo "$d_pincode" ?></h6>
												</div>
											</div><br>
											<h4 class="m-b-20 p-b-5 b-b-default f-w-600"><strong>Tranport Details</strong></h4>
											<div class="row">
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

    <?php
    if ($cr_status == 7) {
    ?>
        <form method="post" action="accepttransportbid.php?tb_id=<?php echo $tb_id; ?>" enctype="multipart/form-data">
            <button name="submit" type="submit" class="btn btn-dark text-monospace" style="background-color:#0c3823;"> Accept Bid </button>
            <hr>
        </form>
    <?php } ?>
	
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