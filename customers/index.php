<?php

include('session-script.php');
$res = $_SESSION["sessionid"];
$c_mobile = $res;
if (!isset($_SESSION['login_customer'])) {
    header("location: login.php"); // Redirecting To Profile Page
}
error_reporting(0);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Customer Dashboard</title>
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.2.0/aos.css">
    <link rel="stylesheet" href="../assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="../assets/css/card-hover.css">
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
                    <li class="nav-item mx-0 mx-lg-1"><a href="../customers/profile.php"><button class="btn btn-dark text-monospace" data-bs-hover-animate="pulse" type="button" style="margin: 10px;background: rgb(255,255,255);color: #0c3823;margin-left: 0;border-radius: 10px;">View Profile</button></a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a href="../customers/logout-script.php"><button class="btn btn-dark text-monospace" data-bs-hover-animate="pulse" type="button" style="margin: 10px;background: rgb(255,255,255);color: #0c3823;margin-left: 0;border-radius: 10px;">Log Out</button></a></li>
                </ul>
            </div>
        </div>
    </nav>
    <?php

    $con = mysqli_connect("localhost", "root", "", "tapship");
    if (!$con) {
        die(" Connection Error ");
    }

    $query = " select * from customer where c_mobile=" . $c_mobile . "";
    $result = mysqli_query($con, $query);

    while ($res = mysqli_fetch_assoc($result)) {
        $c_approve =  $res['c_approve'];
    }
    ?>

    <?php
    if ($c_approve == 1 || $c_approve == 3 || $c_approve == 4 || $c_approve == 5 || $c_approve == NULL) { ?>
        <div class="container-fluid" style="margin-top:150px;">
            <div class="jumbotron" style="text-align: center; background-color:#0c3823; color:#fff;">
                <h2>Status : <?php if ($c_approve == "1") {
                                    echo "No Action";
                                } else if ($c_approve == "2") {
                                    echo " Accepted";
                                } else if ($c_approve == "3") {
                                    echo "Review";
                                } else if ($c_approve == "4") {
                                    echo "Rejected";
                                } else if ($c_approve == "5") {
                                    echo "Resubmitted";
                                } else if ($c_approve == NULL) {
                                    echo "Multiple Login State";
                                } ?></h4>
                    <hr>
                    <?php
                    if ($c_approve == 1) { ?>
                        <h3>Your profile is not approved by Tapship.
                </h2>
                <h5>You have registerd successfully. We are checking your details.</h5>
                <h5>Please wait for sometime.</h5>
                <h5>Thank You</h5>
            <?php
                    } else if ($c_approve == 3) { ?>
                <h3>Your profile is not approved by Tapship.</h2>
                    <h5>Your application have some problem. We will contact you soon</h5>
                    <h5>Please wait for for our call.</h5>
                    <h5>Thank You</h5>
                <?php
                    } else if ($c_approve == 4) { ?>
                    <h3>Your profile is not approved by Tapship.</h2>
                        <h5>Your application got rejected due to not following rules.</h5>
                        <h5>You can contact our customer care for more details.</h5>
                        <h5>Thank You</h5>
                    <?php
                    } else if ($c_approve == 5) { ?>
                        <h3>Your profile is not approved by Tapship.</h2>
                            <h5>Your have resubmitted application successfully. We are checking your details.</h5>
                            <h5>Please wait for sometime.</h5>
                            <h5>Thank You</h5>
                        <?php
                    } else if ($c_approve == NULL) { ?>
                            <h4> You Have logged in to multiple user Accounts. Please Logout from all other accounts and then login to Customer Profile.
                            <?php
                        } ?>
                            <br>
                            <h6><strong>Go to home <a href="../index.php">HERE</a></strong></a></h6>
            </div>
        </div>
    <?php } ?>


    <?php
    if ($c_approve == 2) { ?>

        <div class="features-boxed">
            <div class="container-fluid" style="background: #ffffff;">
                <div class="intro" style="background: #0c3823;margin-top: 120px;margin-bottom: 30px;">
                    <h2 class="text-center" data-aos="fade" style="color: rgb(255,255,255);padding: 30px;margin-bottom: 0px;">Customer Dashboard</h2>
                </div>
            </div>
        </div>
        <center>
            <div class="container-fluid">
                <div class="row" style="margin-top: 10px;">
                    <div class="col-md-6 col-xl-4 mb-4" data-aos="fade-right">
                        <div class="card shadow border-left-primary py-2" style="background-color: rgba(0,0,0,0); border: 3px solid black; background:#F0F0F0;">
                            <div class="card-body">
                                <div class="row align-items-center no-gutters">
                                    <div class="col mr-2">
                                        <div class="col-sm-6 col-md-4 item"><img class="img-fluid" data-bs-hover-animate="pulse" src="../assets/img/customer icons/find crop.png" style="text-align: center;"></div>
                                        <div class="text-uppercase text-primary font-weight-bold text-xs mb-1" style="width: 300px;"><span class="text-capitalize text-center" style="font-size: 25px;color: rgb(1,5,15);">&nbsp; &nbsp; Total Available Crops :
                                                <?php
                                                echo $CropTotalCount = $con->query("SELECT * FROM customer")->num_rows;
                                                ?>
                                                &nbsp;</span>
                                        </div>
                                        <div class="text-dark font-weight-bold h5 mb-0" style="width: 290px;">
                                            <a href="findcrop-pin.php"><button class="btn btn-primary" type="button" style="background-color: rgb(52,57,72);margin-left: 10px; width: 250px;">Find the Crops</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-4 mb-4" data-aos="fade-down">
                        <div class="card shadow border-left-primary py-2" style="background-color: rgba(0,0,0,0); border: 3px solid black; background:#F0F0F0;">
                            <div class="card-body">
                                <div class="row align-items-center no-gutters">
                                    <div class="col mr-2">
                                        <div class="col-sm-6 col-md-4 item"><img class="img-fluid" data-bs-hover-animate="pulse" src="../assets/img/customer icons/your bids.png" style="text-align: center;"></div>
                                        <div class="text-uppercase text-primary font-weight-bold text-xs mb-1" style="width: 300px;"><span class="text-capitalize text-center" style="font-size: 25px;color: rgb(1,5,15);">&nbsp; &nbsp; Total Bids :
                                                <?php
                                                echo $DriverTotalCount = $con->query("SELECT * FROM driver")->num_rows;
                                                ?>
                                                &nbsp;</span>
                                        </div>
                                        <div class="text-dark font-weight-bold h5 mb-0" style="width: 290px;">
                                            <a href="youractivebids.php"><button class="btn btn-primary" type="button" style="background-color: rgb(52,57,72);margin-left: 10px; width: 250px;">View your Bids</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-4 mb-4" data-aos="fade-left">
                        <div class="card shadow border-left-primary py-2" style="background-color: rgba(0,0,0,0); border: 3px solid black; background:#F0F0F0;">
                            <div class="card-body">
                                <div class="row align-items-center no-gutters">
                                    <div class="col mr-2">
                                        <div class="col-sm-6 col-md-4 item"><img class="img-fluid" data-bs-hover-animate="pulse" src="../assets/img/customer icons/purchase history.png" style="text-align: center;"></div>
                                        <div class="text-uppercase text-primary font-weight-bold text-xs mb-1" style="width: 300px;"><span class="text-capitalize text-center" style="font-size: 25px;color: rgb(1,5,15);">Total Completed Deals :
                                                <?php
                                                echo $DriverTotalCount = $con->query("SELECT * FROM driver")->num_rows;
                                                ?>
                                                &nbsp;</span>
                                        </div>
                                        <div class="text-dark font-weight-bold h5 mb-0" style="width: 290px;">
                                            <a href="purchasehistory.php"><button class="btn btn-primary" type="button" style="background-color: rgb(52,57,72);margin-left: 10px; width: 250px;">View Purchase History</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-4 mb-4" data-aos="fade-right">
                        <div class="card shadow border-left-primary py-2" style="background-color: rgba(0,0,0,0); border: 3px solid black; background:#F0F0F0;">
                            <div class="card-body">
                                <div class="row align-items-center no-gutters">
                                    <div class="col mr-2">
                                        <div class="col-sm-6 col-md-4 item no-gutters"><img class="img-fluid" data-bs-hover-animate="pulse" src="../assets/img/customer icons/accepted bids.png" style="text-align: center;"></div>
                                        <div class="text-uppercase text-primary font-weight-bold text-xs mb-1" style="width: 300px;"><span class="text-capitalize text-center" style="font-size: 25px;color: rgb(1,5,15);">Total Accepted Bids :
                                                <?php
                                                echo $DriverTotalCount = $con->query("SELECT * FROM driver")->num_rows;
                                                ?>
                                            </span>
                                        </div>
                                        <div class="text-dark font-weight-bold h5 mb-0" style="width: 290px;">
                                            <a href="acceptedbids.php"><button class="btn btn-primary" type="button" style="background-color: rgb(52,57,72);margin-left: 10px; width: 250px;">View Accepted Bids</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-4 mb-4" data-aos="fade-up">
                        <div class="card shadow border-left-primary py-2" style="background-color: rgba(0,0,0,0); border: 3px solid black; background:#F0F0F0;">
                            <div class="card-body">
                                <div class="row align-items-center no-gutters">
                                    <div class="col mr-2">
                                        <div class="col-sm-6 col-md-4 item no-gutters"><img class="img-fluid" data-bs-hover-animate="pulse" src="../assets/img/customer icons/rejected bids.png" style="text-align: center;"></div>
                                        <div class="text-uppercase text-primary font-weight-bold text-xs mb-1" style="width: 300px;"><span class="text-capitalize text-center" style="font-size: 25px;color: rgb(1,5,15);">Total Rejected Bids :
                                                <?php
                                                echo $DriverTotalCount = $con->query("SELECT * FROM driver")->num_rows;
                                                ?>
                                            </span>
                                        </div>
                                        <div class="text-dark font-weight-bold h5 mb-0" style="width: 290px;">
                                            <a href="rejectedbids.php"><button class="btn btn-primary" type="button" style="background-color: rgb(52,57,72);margin-left: 10px; width: 250px;">View Rejected Bids</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-4 mb-4" data-aos="fade-left">
                        <div class="card shadow border-left-primary py-2" style="background-color: rgba(0,0,0,0); border: 3px solid black; background:#F0F0F0;">
                            <div class="card-body">
                                <div class="row align-items-center no-gutters">
                                    <div class="col mr-2">
                                        <div class="col-sm-6 col-md-4 item no-gutters"><img class="img-fluid" data-bs-hover-animate="pulse" src="../assets/img/customer icons/msp.png" style="text-align: center;"></div>
                                        <div class="text-uppercase text-primary font-weight-bold text-xs mb-1" style="width: 300px;"><span class="text-capitalize text-center" style="font-size: 25px;color: rgb(1,5,15);">MSP Tracking
                                        </div>
                                        <div class="text-dark font-weight-bold h5 mb-0" style="width: 290px;">
                                            <a href="#"><button class="btn btn-primary" type="button" style="background-color: rgb(52,57,72);margin-left: 10px; width: 250px;">View MSP</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-6 mb-6" data-aos="fade-up">
                        <div class="card shadow border-left-primary py-2" style="background-color: rgba(0,0,0,0); border: 3px solid black;margin-bottom: 30px; background:#F0F0F0;">
                            <div class="card-body">
                                <div class="row align-items-center no-gutters">
                                    <div class="col mr-2">
                                        <div class="col-sm-6 col-md-4 item no-gutters"><img class="img-fluid" data-bs-hover-animate="pulse" src="../assets/img/customer icons/helpzone.png" style="text-align: center;"></div>
                                        <div class="text-uppercase text-primary font-weight-bold text-xs mb-1" style="width: 300px;"><span class="text-capitalize text-center" style="font-size: 25px;color: rgb(1,5,15);">&nbsp; &nbsp; Help Zone
                                        </div>
                                        <div class="text-dark font-weight-bold h5 mb-0" style="width: 290px;">
                                            <a href="#"><button class="btn btn-primary" type="button" style="background-color: rgb(52,57,72);margin-left: 10px; width: 250px;">Ask the Expert</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-6 mb-6" data-aos="fade-up">
                        <div class="card shadow border-left-primary py-2" style="background-color: rgba(0,0,0,0); border: 3px solid black; margin-bottom: 30px; background:#F0F0F0;">
                            <div class="card-body">
                                <div class="row align-items-center no-gutters">
                                    <div class="col mr-2">
                                        <div class="col-sm-6 col-md-4 item no-gutters"><img class="img-fluid" data-bs-hover-animate="pulse" src="../assets/img/customer icons/knowledge.png" style="text-align: center;"></div>
                                        <div class="text-uppercase text-primary font-weight-bold text-xs mb-1" style="width: 300px;"><span class="text-capitalize text-center" style="font-size: 25px;color: rgb(1,5,15);">&nbsp; &nbsp; Knowledge Zone
                                        </div>
                                        <div class="text-dark font-weight-bold h5 mb-0" style="width: 290px;">
                                            <a href="#"><button class="btn btn-primary" type="button" style="background-color: rgb(52,57,72);margin-left: 10px; width: 250px;">Know More</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </center>

    <?php } ?>

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