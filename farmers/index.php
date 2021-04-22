<?php

include('session-script.php');
$res = $_SESSION["sessionid"];
$f_mobile = $res;
if (!isset($_SESSION['login_farmer'])) {
    header("location: login.php"); // Redirecting To Profile Page
}
error_reporting(0);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Farmer Dashboard</title>
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
    <style>
        @media(max-width: 992px) {
            .lap {
                display: none;
            }
        }

        @media(min-width: 992px) {
            .mob {
                display: none;
            }
        }
    </style>
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

    <?php
    $con = mysqli_connect("localhost", "root", "", "tapship");
    if (!$con) {
        die(" Connection Error ");
    }

    $query = " select * from farmer where f_mobile=" . $f_mobile . "";
    $result = mysqli_query($con, $query);

    while ($res = mysqli_fetch_assoc($result)) {
        $f_approve =  $res['f_approve'];
        $f_pincode = $res['f_pincode'];
    }
    ?>

    <?php
    if ($f_approve == 1 || $f_approve == 3 || $f_approve == 4 || $f_approve == 5 || $f_approve == NULL) { ?>
        <div class="container" style="margin-top:150px;">
            <div class="jumbotron" style="text-align: center; background-color:#0c3823; color:#fff;">
                <h2>Status : <?php if ($f_approve == "1") {
                                    echo "No Action";
                                } else if ($f_approve == "2") {
                                    echo " Accepted";
                                } else if ($f_approve == "3") {
                                    echo "Review";
                                } else if ($f_approve == "4") {
                                    echo "Rejected";
                                } else if ($f_approve == "5") {
                                    echo "Resubmitted";
                                } else if ($f_approve == NULL) {
                                    echo "Multiple Login State";
                                } ?></h4>
                    <hr>
                    <?php
                    if ($f_approve == 1) { ?>
                        <h3>Your profile is not approved by Tapship.
                </h2>
                <h5>You have registerd successfully. We are checking your details.</h5>
                <h5>Please wait for sometime.</h5>
                <h5>Thank You</h5>
            <?php
                    }
                    if ($f_approve == 3) { ?>
                <h3>Your profile is not approved by Tapship.</h2>
                    <h5>Your application have some problem. We will contact you soon</h5>
                    <h5>Please wait for for our call.</h5>
                    <h5>Thank You</h5>
                <?php
                    }
                    if ($f_approve == 4) { ?>
                    <h3>Your profile is not approved by Tapship.</h2>
                        <h5>Your application got rejected due to not following rules.</h5>
                        <h5>You can contact our customer care for more details.</h5>
                        <h5>Thank You</h5>
                    <?php
                    }
                    if ($f_approve == 5) { ?>
                        <h3>Your profile is not approved by Tapship.</h2>
                            <h5>Your have resubmitted application successfully. We are checking your details.</h5>
                            <h5>Please wait for sometime.</h5>
                            <h5>Thank You</h5>
                        <?php
                    } else if ($f_approve == NULL) { ?>
                            <h4> You Have logged in to multiple user Accounts. Please Logout from all other accounts and then login to Farmer Profile.
                            <?php
                        } ?>
                            <h6><strong>Go to home <a href="../index.php">HERE</a></strong></a></h6>
            </div>
        </div>
    <?php }

    $py_res = shell_exec("python current_weather_forecast.py $f_mobile $f_pincode");
    $op = explode("\n", $py_res);
    ?>

    <?php
    if ($f_approve == 2) { ?>

        <div class="features-boxed">
            <div class="container-fluid" style="background: #ffffff;">
                <div class="intro" style="background: #0c3823;margin-top: 120px;margin-bottom: 30px;">
                    <h2 class="text-center" data-aos="fade" style="color: rgb(255,255,255);padding: 30px;margin-bottom: 0px;">Farmer Dashboard</h2>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row" style="color:white; margin:10px; ">
                <div class="col-lg-1 col-md-12 col-sm-12" style="background-color:#7e090f; padding:20px;">
                    <h5 class="lap">W</h5>
                    <h5 class="lap">E</h5>
                    <h5 class="lap">A</h5>
                    <h5 class="lap">T</h5>
                    <h5 class="lap">H</h5>
                    <h5 class="lap">E</h5>
                    <h5 class="lap">R</h5>
                    <h4 class="mob" style="text-align:center">Weather Report</h4>
                </div>
                <div class="col-lg-3 col-md-12 col-sm-12" style="background-color:#1e5239; padding:20px;  height: 265px;">
                    <h5><?php echo $op[0]; ?></h5>
                    <span><strong><?php echo $op[1]; ?></strong></span><br>
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-map-pin location-icon">
                        <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                        <circle cx="12" cy="10" r="3"></circle>
                    </svg>
                    <span></strong><?php echo $op[2]; ?></strong></span>
                    <br><?php echo $op[3]; ?>
                    <h1><?php echo $op[4]; ?></h1>
                    <h5><?php echo $op[5]; ?></h5>
                </div>
                <div class="col-lg-5 col-md-12 col-sm-12" style="background-color:#092b1b; padding:20px; height: 265px;">
                    <h5>Clouds &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: <?php echo $op[6]; ?> </h5>
                    <h5>Humidity &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: <?php echo $op[7]; ?> </h5>
                    <h5>Feels Like &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: <?php echo $op[8]; ?> </h5>
                    <h5>Dew Point &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: <?php echo $op[9]; ?> </h5>
                    <h5>Wind Speed &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: <?php echo $op[10]; ?> </h5>
                    <h5>Sunrise Time &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: <?php echo $op[11]; ?> </h5>
                    <h5>Sunset Time &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: <?php echo $op[12]; ?> </h5>
                </div>
                <div class="col-lg-3 col-md-12 col-sm-12" style="background-color:#1e5239; padding:20px;  height: 265px;">
                    <h5>Weather Forecast</h5>
                    <a href="weather_forecast.php"><button type="button" class="btn btn-primary">View Forecast</button></a>
                    <br><br><br>
                    <h5 style="padding-top:10px;">Crop Suggestions </h5>
                    <button type="button" class="btn btn-primary">View Suggestions</button>
                </div>
            </div>
        </div>
        <br>
        <center>
            <div class="container-fluid">
                <div class="row" style="margin-top: 10px;">
                    <div class="col-md-6 col-xl-4 mb-4" data-aos="fade-right">
                        <div class="card shadow border-left-primary py-2" style="background-color: rgba(0,0,0,0); border: 3px solid black; background:#F0F0F0;">
                            <div class="card-body">
                                <div class="row align-items-center no-gutters">
                                    <div class="col mr-2">
                                        <div class="col-sm-6 col-md-4 item"><img class="img-fluid" data-bs-hover-animate="pulse" src="../assets/img/farmer icons/add crop.png" style="text-align: center;"></div>
                                        <div class="text-uppercase text-primary font-weight-bold text-xs mb-1" style="width: 300px;"><span class="text-capitalize text-center" style="font-size: 25px;color: rgb(1,5,15);">&nbsp; &nbsp; Total added crop :
                                                <?php
                                                echo $CropTotalCount = $con->query("SELECT * FROM customer")->num_rows;
                                                ?>
                                                &nbsp;</span>
                                        </div>
                                        <div class="text-dark font-weight-bold h5 mb-0" style="width: 290px;">
                                            <a href="addcrop.php"><button class="btn btn-primary" type="button" style="background-color: rgb(52,57,72);margin-left: 10px; width: 265px;">Add New Crop</button></a>
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
                                        <div class="col-sm-6 col-md-4 item"><img class="img-fluid" data-bs-hover-animate="pulse" src="../assets/img/farmer icons/activecrop.png" style="text-align: center;"></div>
                                        <div class="text-uppercase text-primary font-weight-bold text-xs mb-1" style="width: 300px;"><span class="text-capitalize text-center" style="font-size: 25px;color: rgb(1,5,15);">&nbsp; &nbsp; Total active crop :
                                                <?php
                                                echo $DriverTotalCount = $con->query("SELECT * FROM driver")->num_rows;
                                                ?>
                                                &nbsp;</span>
                                        </div>
                                        <div class="text-dark font-weight-bold h5 mb-0" style="width: 290px;">
                                            <a href="activecrop.php"><button class="btn btn-primary" type="button" style="background-color: rgb(52,57,72);margin-left: 10px; width: 265px;">View Active Crop</button></a>
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
                                        <div class="col-sm-6 col-md-4 item no-gutters"><img class="img-fluid" data-bs-hover-animate="pulse" src="../assets/img/farmer icons/sell history.png" style="text-align: center;"></div>
                                        <div class="text-uppercase text-primary font-weight-bold text-xs mb-1" style="width: 300px;"><span class="text-capitalize text-center" style="font-size: 25px;color: rgb(1,5,15);">&nbsp; &nbsp; Total sold crop :
                                                <?php
                                                echo $DriverTotalCount = $con->query("SELECT * FROM driver")->num_rows;
                                                ?>
                                                &nbsp;</span>
                                        </div>
                                        <div class="text-dark font-weight-bold h5 mb-0" style="width: 290px;">
                                            <a href="sellhistory.php"><button class="btn btn-primary" type="button" style="background-color: rgb(52,57,72);margin-left: 10px; width: 265px;">View Sell History</button></a>
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
                                        <div class="col-sm-6 col-md-4 item"><img class="img-fluid" data-bs-hover-animate="pulse" src="../assets/img/farmer icons/msp.png" style="text-align: center;"></div>
                                        <div class="text-uppercase text-primary font-weight-bold text-xs mb-1" style="width: 300px;"><span class="text-capitalize text-center" style="font-size: 25px;color: rgb(1,5,15);">&nbsp; &nbsp; MSP Tracking
                                        </div>
                                        <div class="text-dark font-weight-bold h5 mb-0" style="width: 290px;">
                                            <a href="#"><button class="btn btn-primary" type="button" style="background-color: rgb(52,57,72);margin-left: 10px; width: 265px;">View MSP</button></a>
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
                                        <div class="col-sm-6 col-md-4 item"><img class="img-fluid" data-bs-hover-animate="pulse" src="../assets/img/farmer icons/helpzone.png" style="text-align: center;"></div>
                                        <div class="text-uppercase text-primary font-weight-bold text-xs mb-1" style="width: 300px;"><span class="text-capitalize text-center" style="font-size: 25px;color: rgb(1,5,15);">&nbsp; &nbsp; Help Zone
                                        </div>
                                        <div class="text-dark font-weight-bold h5 mb-0" style="width: 290px;">
                                            <a href="helpzone.php"><button class="btn btn-primary" type="button" style="background-color: rgb(52,57,72);margin-left: 10px; width: 265px;">Ask the Expert</button></a>
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
                                        <div class="col-sm-6 col-md-4 item no-gutters"><img class="img-fluid" data-bs-hover-animate="pulse" src="../assets/img/farmer icons/knowledge.png" style="text-align: center;"></div>
                                        <div class="text-uppercase text-primary font-weight-bold text-xs mb-1" style="width: 300px;"><span class="text-capitalize text-center" style="font-size: 25px;color: rgb(1,5,15);">&nbsp; &nbsp; Knowledge Zone
                                        </div>
                                        <div class="text-dark font-weight-bold h5 mb-0" style="width: 290px;">
                                            <a href="#"><button class="btn btn-primary" type="button" style="background-color: rgb(52,57,72);margin-left: 10px; width: 265px;">Know More</button></a>
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