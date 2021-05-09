<?php

include('session-script.php');
$res = $_SESSION["sessionid"];
$d_mobile = $res;
if (!isset($_SESSION['login_driver'])) {
    header("location: login.php"); // Redirecting To Profile Page
}
error_reporting(0);

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "tapship";

//Create Connection
$con = new mysqli($dbhost, $dbuser, $dbpass, $dbname) or die($con->connect_error);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Driver Dashboard</title>
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
    
    <script>
    function showPosition() {
        if(navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                var Latitude = position.coords.latitude;
                var Longitude = position.coords.longitude;

                var date = new Date();
                date.setTime(date.getTime()+(60*1000));
                var expires = "; expires="+date.toGMTString();

                document.cookie = "Latitude = " + Latitude+expires;
                document.cookie = "Longitude = " + Longitude+expires;
            });
        }
    }

    setTimeout(function() {
    location.reload();
    }, 50000);

    const reloadtButton = document.querySelector("#reload");
    function reload() {
        reload = location.reload();
    }
    reloadButton.addEventListener("click", reload, false);
    </script>
</head>

<body id="page-top" onload="showPosition();">
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
                    <li class="nav-item mx-0 mx-lg-1"><a href="../drivers/profile.php"><button class="btn btn-dark text-monospace" data-bs-hover-animate="pulse" type="button" style="margin: 10px;background: rgb(255,255,255);color: #0c3823;margin-left: 0;border-radius: 10px;">View Profile</button></a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a href="../drivers/logout-script.php"><button class="btn btn-dark text-monospace" data-bs-hover-animate="pulse" type="button" style="margin: 10px;background: rgb(255,255,255);color: #0c3823;margin-left: 0;border-radius: 10px;">Log Out</button></a></li>
                </ul>
            </div>
        </div>
    </nav>

    
    <?php

    $con = mysqli_connect("localhost", "root", "", "tapship");
    if (!$con) {
        die(" Connection Error ");
    }

    $query = " select * from driver where d_mobile=" . $d_mobile . "";
    $result = mysqli_query($con, $query);

    while ($res = mysqli_fetch_assoc($result)) {
        $d_approve =  $res['d_approve'];
    }
    ?>

    <?php
    if ($d_approve == 1 || $d_approve == 3 || $d_approve == 4 || $d_approve == 5 || $d_approve == NULL) { ?>
        <div class="container" style="margin-top:150px;">
            <div class="jumbotron" style="text-align: center; background-color:#0c3823; color:#fff;">
                <h2>Status : <?php if ($d_approve == "1") {
                                    echo "No Action";
                                } else if ($d_approve == "2") {
                                    echo " Accepted";
                                } else if ($d_approve == "3") {
                                    echo "Review";
                                } else if ($d_approve == "4") {
                                    echo "Rejected";
                                } else if ($d_approve == "5") {
                                    echo "Resubmitted";
                                } else if ($d_approve == NULL) {
                                    echo "Multiple Login State";
                                }  ?></h4>
                    <hr>
                    <?php
                    if ($d_approve == 1) { ?>
                        <h3>Your profile is not approved by Tapship.
                </h2>
                <h5>You have registerd successfully. We are checking your details.</h5>
                <h5>Please wait for sometime.</h5>
                <h5>Thank You</h5>
            <?php
                    }
                    if ($d_approve == 3) { ?>
                <h3>Your profile is not approved by Tapship.</h2>
                    <h5>Your application have some problem. We will contact you soon</h5>
                    <h5>Please wait for for our call.</h5>
                    <h5>Thank You</h5>
                <?php
                    }
                    if ($d_approve == 4) { ?>
                    <h3>Your profile is not approved by Tapship.</h2>
                        <h5>Your application got rejected due to not following rules.</h5>
                        <h5>You can contact our customer care for more details.</h5>
                        <h5>Thank You</h5>
                    <?php
                    }
                    if ($d_approve == 5) { ?>
                        <h3>Your profile is not approved by Tapship.</h2>
                            <h5>Your have resubmitted application successfully. We are checking your details.</h5>
                            <h5>Please wait for sometime.</h5>
                            <h5>Thank You</h5>
                        <?php
                    } else if ($d_approve == NULL) { ?>
                            <h4> You Have logged in to multiple user Accounts. Please Logout from all other accounts and then login to Driver Profile.
                            <?php
                        } ?>
                            <h6><strong>Go to home <a href="../index.php">HERE</a></strong></a></h6>
            </div>
        </div>
    <?php } ?>


    <?php
    if ($d_approve == 2) { ?>

        <?php
        $d_lat= $_COOKIE['Latitude'];
        $d_long= $_COOKIE['Longitude'];

        date_default_timezone_set("Asia/Calcutta");
        $d_date =  date("Y-m-d");
        $d_time = date("h:i A");

        $query = "update driver set d_lat=$d_lat, d_long=$d_long, d_date='$d_date', d_time='$d_time' where d_mobile='".$d_mobile."'";
        $success = $con->query($query);

        $q = "select d_lat, d_long, d_time, d_date from driver where d_mobile=$d_mobile";

        $result = mysqli_query($con, $q);

        while ($res = mysqli_fetch_assoc($result)) {
            $lat =  $res['d_lat'];
            $long =  $res['d_long'];
            $time =  $res['d_time'];
            $date =  $res['d_date'];
        }

        $url = file_get_contents('http://dev.virtualearth.net/REST/v1/Locations/'.$lat.','.$long.'?&includeNeighborhood=1&o=json&key=Alcd58ybycSq_3khfOUdGYo7AnC4PMT_03DlC6y8r7lcWZk7IwtK17LDNMq0_l3d');
        $data = json_decode($url, true);
            
        $loc = $data['resourceSets'][0]['resources'][0]['name'];
        ?>

        <div class="features-boxed">
            <div class="container-fluid" style="background: #ffffff;">
                <div class="intro" style="background: #0c3823;margin-top: 120px;margin-bottom: 30px;">
                    <h2 class="text-center" data-aos="fade" style="color: rgb(255,255,255);padding: 30px;margin-bottom: -20px;">Driver Dashboard</h2>
                </div>
                <center>
                <div style=" background-color:#0c3823; padding:10px;color:white">
                    <h6 style="display: inline-block;">Your Current Location: <i><?php echo $loc;?></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Last Updated: <i><?php echo $time.' , '.$date;?></i></h6>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <button id="click" onClick="window.location.reload();" class="btn btn-primary" type="button" style="background-color: white; color:black;margin-left: 10px; padding:10px; width:300px;">Update Your Live Location</button>
                </div>
                </center>
            </div>
        </div>

        <center>
            <div class="container-fluid">
                <div class="row" style="margin-top: 10px;">
                    <div class="col-md-6 col-xl-4 mb-4" data-aos="fade-right">
                        <div class="card shadow border-left-primary py-2" style="background-color: rgba(0,0,0,0); border: 3px solid black; background:#F0F0F0; ">
                            <div class="card-body">
                                <div class="row align-items-center no-gutters">
                                    <div class="col mr-2">
                                        <div class="col-sm-6 col-md-4 item"><img class="img-fluid" data-bs-hover-animate="pulse" src="../assets/img/driver icons/find deal.png" style="text-align: center;"></div>
                                        <div class="text-uppercase text-primary font-weight-bold text-xs mb-1" style="width: 300px;"><span class="text-capitalize text-center" style="font-size:20px;color: rgb(1,5,15);"> &nbsp; &nbsp; Total Deals Available :
                                                <?php
                                                echo $CropTotalCount = $con->query("SELECT * FROM cropdetails cd, cropbid cb, cropsale cs, farmer f, customer c where cd.cro_id=cs.cr_cro_id AND cb.cb_cr_id=cs.cr_id AND f.f_mobile=cb.cb_f_mobile AND c.c_mobile=cb.cb_c_mobile AND cb.cb_status in (6,7) AND cs.cr_status in (6,7) AND (SELECT count(tb_id) from transportbid tb, cropbid cb WHERE tb.tb_d_mobile =$d_mobile AND tb.tb_cb_id = cb.cb_id)=0")->num_rows;
                                                ?>
                                                &nbsp;</span>
                                        </div>
                                        <div class="text-dark font-weight-bold h5 mb-0" style="width: 290px;">
                                            <a href="finddeal-pin.php"><button class="btn btn-primary" type="button" style="background-color: rgb(52,57,72);margin-left: 10px; width: 250px;">Find the Deals</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-4 mb-4" data-aos="fade-down">
                        <div class="card shadow border-left-primary py-2" style="background-color: rgba(0,0,0,0); border: 3px solid black; background:#F0F0F0;  ">
                            <div class="card-body">
                                <div class="row align-items-center no-gutters">
                                    <div class="col mr-2">
                                        <div class="col-sm-6 col-md-4 item"><img class="img-fluid" data-bs-hover-animate="pulse" src="../assets/img/driver icons/your bids.png" style="text-align: center;"></div>
                                        <div class="text-uppercase text-primary font-weight-bold text-xs mb-1" style="width: 300px;"><span class="text-capitalize text-center" style="font-size:20px;color: rgb(1,5,15);"> &nbsp; &nbsp; Total Bids :
                                                <?php
                                                echo $count = $con->query("SELECT * FROM cropdetails cd, cropbid cb, cropsale cs, farmer f, customer c, transportbid tb where cd.cro_id=cs.cr_cro_id AND cb.cb_cr_id=cs.cr_id AND f.f_mobile=cb.cb_f_mobile AND c.c_mobile=cb.cb_c_mobile AND tb.tb_cb_id=cb.cb_id AND cs.cr_status='7' AND tb.tb_d_mobile=$d_mobile")->num_rows;
                                                ?>
                                                &nbsp;</span>
                                        </div>
                                        <div class="text-dark font-weight-bold h5 mb-0" style="width: 290px;">
                                            <a href="yourtransportbids.php"><button class="btn btn-primary" type="button" style="background-color: rgb(52,57,72);margin-left: 10px; width: 250px;">View your Bids</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-4 mb-4" data-aos="fade-right">
                        <div class="card shadow border-left-primary py-2" style="background-color: rgba(0,0,0,0); border: 3px solid black; background:#F0F0F0;   margin-bottom: 30px;">
                            <div class="card-body">
                                <div class="row align-items-center no-gutters">
                                    <div class="col mr-2">
                                        <div class="col-sm-6 col-md-4 item no-gutters"><img class="img-fluid" data-bs-hover-animate="pulse" src="../assets/img/driver icons/accepted bids.png" style="text-align: center;"></div>
                                        <div class="text-uppercase text-primary font-weight-bold text-xs mb-1" style="width: 300px;"><span class="text-capitalize text-center" style="font-size:20px;color: rgb(1,5,15);"> Total Accepted Bids :
                                                <?php
                                                echo $count = $con->query("SELECT * FROM cropdetails cd, cropbid cb, cropsale cs, farmer f, customer c, transportbid tb where cd.cro_id=cs.cr_cro_id AND cb.cb_cr_id=cs.cr_id AND f.f_mobile=cb.cb_f_mobile AND c.c_mobile=cb.cb_c_mobile AND tb.tb_cb_id=cb.cb_id AND cs.cr_status in (8,9,10,11) AND tb.tb_d_mobile=$d_mobile AND tb.tb_status='1'")->num_rows;
                                                ?>
                                            </span>
                                        </div>
                                        <div class="text-dark font-weight-bold h5 mb-0" style="width: 290px;">
                                            <a href="acceptedtransportbids.php"><button class="btn btn-primary" type="button" style="background-color: rgb(52,57,72);margin-left: 10px; width: 250px;">View Accepted Bids</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-4 mb-4" data-aos="fade-left">
                        <div class="card shadow border-left-primary py-2" style="background-color: rgba(0,0,0,0); border: 3px solid black; background:#F0F0F0;  ">
                            <div class="card-body">
                                <div class="row align-items-center no-gutters">
                                    <div class="col mr-2">
                                        <div class="col-sm-6 col-md-4 item"><img class="img-fluid" data-bs-hover-animate="pulse" src="../assets/img/driver icons/transport history.png" style="text-align: center;"></div>
                                        <div class="text-uppercase text-primary font-weight-bold text-xs mb-1" style="width: 300px;"><span class="text-capitalize text-center" style="font-size:20px;color: rgb(1,5,15);"> &nbsp;Total Completed Deals :
                                                <?php
                                                echo $count = $con->query("SELECT * FROM cropdetails cd, cropbid cb, cropsale cs, farmer f, customer c, transportbid tb where cd.cro_id=cs.cr_cro_id AND cb.cb_cr_id=cs.cr_id AND f.f_mobile=cb.cb_f_mobile AND c.c_mobile=cb.cb_c_mobile AND tb.tb_cb_id=cb.cb_id AND cs.cr_status=12 AND tb.tb_d_mobile=$d_mobile AND tb.tb_status='1'")->num_rows;
                                                ?>
                                                &nbsp;</span>
                                        </div>
                                        <div class="text-dark font-weight-bold h5 mb-0" style="width: 290px;">
                                            <a href="transporthistory.php"><button class="btn btn-primary" type="button" style="background-color: rgb(52,57,72);margin-left: 10px; width: 250px;">View Transport History</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-4 mb-4" data-aos="fade-up">
                        <div class="card shadow border-left-primary py-2" style="background-color: rgba(0,0,0,0); border: 3px solid black; background:#F0F0F0;   margin-bottom: 30px;">
                            <div class="card-body">
                                <div class="row align-items-center no-gutters">
                                    <div class="col mr-2">
                                        <div class="col-sm-6 col-md-4 item"><img class="img-fluid" data-bs-hover-animate="pulse" src="../assets/img/driver icons/rejected bids.png" style="text-align: center;"></div>
                                        <div class="text-uppercase text-primary font-weight-bold text-xs mb-1" style="width: 300px;"><span class="text-capitalize text-center" style="font-size:20px;color: rgb(1,5,15);"> Total Rejected Bids :
                                                <?php
                                                echo $count = $con->query("SELECT * FROM cropdetails cd, cropbid cb, cropsale cs, farmer f, customer c, transportbid tb where cd.cro_id=cs.cr_cro_id AND cb.cb_cr_id=cs.cr_id AND f.f_mobile=cb.cb_f_mobile AND c.c_mobile=cb.cb_c_mobile AND tb.tb_cb_id=cb.cb_id AND cs.cr_status in (8,9,10,11,12) AND tb.tb_d_mobile=$d_mobile AND tb.tb_status='2'")->num_rows;
                                                ?></span>
                                        </div>
                                        <div class="text-dark font-weight-bold h5 mb-0" style="width: 290px;">
                                            <a href="rejectedtransportbids.php"><button class="btn btn-primary" type="button" style="background-color: rgb(52,57,72);margin-left: 10px; width: 250px;">View Rejected Bids</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-4 mb-4" data-aos="fade-left">
                        <div class="card shadow border-left-primary py-2" style="background-color: rgba(0,0,0,0); border: 3px solid black; background:#F0F0F0;  margin-bottom: 30px;">
                            <div class="card-body">
                                <div class="row align-items-center no-gutters">
                                    <div class="col mr-2">
                                        <div class="col-sm-6 col-md-4 item no-gutters"><img class="img-fluid" data-bs-hover-animate="pulse" src="../assets/img/driver icons/helpzone.png" style="text-align: center;"></div>
                                        <div class="text-uppercase text-primary font-weight-bold text-xs mb-1" style="width: 300px;"><span class="text-capitalize text-center" style="font-size:20px;color: rgb(1,5,15);">&nbsp; &nbsp; Help Zone

                                        </div>
                                        <div class="text-dark font-weight-bold h5 mb-0" style="width: 290px;">
                                            <a href="helpzone.php"><button class="btn btn-primary" type="button" style="background-color: rgb(52,57,72);margin-left: 10px; width: 250px;">Ask the Expert</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-xl-12 mb-12" data-aos="fade-up">
                        <div class="card shadow border-left-primary py-2" style="background-color: rgba(0,0,0,0); border: 3px solid black; background:#F0F0F0;  margin-bottom: 30px;">
                            <div class="card-body">
                                <div class="row align-items-center no-gutters" style="float: left;">
                                    <div class="col mr-2">
                                        <div class="col-sm-6 col-md-4 item no-gutters"><img class="img-fluid" data-bs-hover-animate="pulse" src="../assets/img/driver icons/knowledge.png" style="text-align: center;"></div>
                                        <div class="text-uppercase text-primary font-weight-bold text-xs mb-1" style="width: 300px;"><span class="text-capitalize text-center" style="font-size:20px;color: rgb(1,5,15);">&nbsp; &nbsp; Knowledge Zone

                                        </div>
                                        <div class="text-dark font-weight-bold h5 mb-0" style="width: 290px;">
                                            <a href="kbase.php"><button class="btn btn-primary" type="button" style="background-color: rgb(52,57,72);margin-left: 10px; width: 250px;">Know More</button></a>
                                        </div>
                                        <br>
                                    </div>
                                </div>
                                <div style="text-align:left;">
                                    <h4 style="text-align:center;"> Suggestions </h4>
                                    <h6><ul>
										<li>Stay Alert - Actively pay attention to your actions and those of the drivers around you when you are driving.</li><br>
										<li>Buckle Up - Wearing your seat belt is an essential safety tip for drivers. You can also be fined for failing to do so.</li><br>
										<li>Obey Speed Limits - When driving, it's important to stick to the posted speed limit at all times.</li><br>
										<li>Make Adjustments for Weather - When the weather is less than perfect, such as rainy, snowy, or foggy conditions, use extra precautions when driving and follow guidelines.</li><br>
										<li>Follow Traffic Signals - Pay close attention to and obey stop signs and traffic lights.</li>
									  </ul></h6>

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