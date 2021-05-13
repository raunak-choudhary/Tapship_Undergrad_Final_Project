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
                    <h2 class="text-center" data-aos="fade" style="color: rgb(255,255,255);padding: 30px;margin-bottom: 0px;">Update Crop Details</h2>
                </div>
            </div>
        </div>


        <?php
        $con = mysqli_connect("localhost", "root", "", "tapship");
        if (!$con) {
            die(" Connection Error ");
        }

        $id = $_GET['id'];

        $cr_id = base64_decode($id);
        $cr_id = round((float)$cr_id / 525325.24 / 6537838239.89);

        $q = "select cr_status from cropsale where cr_id = $cr_id";
        $result = mysqli_query($con, $q);

        while ($res = mysqli_fetch_assoc($result)) {
            $cr_status = $res['cr_status'];
        }

        if ($cr_status == 0 || $cr_status == 1) {
            $query = "SELECT CD.cro_id, CD.cro_name, CD.cro_type, CD.cro_msp, CS.cr_id, CS.cr_f_mobile, CS.cr_cro_id, CS.cr_quantity, CS.cr_mep, CS.cr_date, CS.cr_status, CS.cr_img1, CS.cr_img2, CS.cr_img3, cs.cr_status FROM cropdetails CD, cropsale CS where cs.cr_id=$cr_id and CD.cro_id=cs.cr_cro_id";
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
            $d_pincode = $res['d_pincode'];
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
                                                <p class="m-b-10 f-w-600">Date</p>
                                                <h6 class="text-muted f-w-400"><?php echo "$cr_date" ?></h6>
                                            </div>
                                            <div class="col-sm-6">
                                                <p class="m-b-10 f-w-600">Minimum Selling Price (per kgs.)</p>
                                                <h6 class="text-muted f-w-400"><?php echo "$cro_msp" ?></h6>
                                            </div>
                                            <form method="post" action="editcrop-script.php" enctype="multipart/form-data" style="width:100%;">
                                                <div class="col-sm-6">
                                                    <h4 class="m-b-20 p-b-5 b-b-default f-w-600"><strong>Update Crop Details</strong></h4>
                                                    <p class="m-b-10 f-w-600">Minimun Expected Price (per kgs.)</p>
                                                    <p style="color:red; font-weight:700;">**Please Enter MEP less than 25% of Minimum Selling Price (MSP)**</p>
                                                    <div class="form-group"><input class="form-control" type="text" name="mep" placeholder="Minimun Expected Price" value="<?php echo $cr_mep; ?>" required="" autofocus=""></div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <p class="m-b-10 f-w-600">Quantity</p>
                                                    <div class="form-group"><input class="form-control" type="text" name="quantity" placeholder="Quantity" value="<?php echo $cr_quantity; ?>" required="" autofocus=""></div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <p class="m-b-10 f-w-600"></p><br>
                                                    <input type="hidden" name="id" value="<?php echo $cr_id; ?>">
                                                    <input type="hidden" name="msp" value="<?php echo $cro_msp; ?>">
                                                    <button class="btn btn-primary btn-block" type="submit" name="update" style="background-color:#0c3823;">Update</button>
                                            </form>
                                        </div>
                                    </div><br>
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