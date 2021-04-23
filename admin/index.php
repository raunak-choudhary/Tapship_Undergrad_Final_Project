<?php
include('../assets/database/dbconfig.php');
include('session-script.php');
$res = $_SESSION["sessionid"];
$a_name = $res;
if (!isset($_SESSION['login_admin'])) {
    header("location: login.php"); // Redirecting To Profile Page
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Admin Dashboard</title>
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
                    <li class="nav-item mx-0 mx-lg-1"><a href="updateprofile.php?a_name=<?php echo $a_name; ?>"><button class="btn btn-dark text-monospace" data-bs-hover-animate="pulse" type="button" style="margin: 10px;background: rgb(255,255,255);color: #0c3823;margin-left: 0;border-radius: 10px;">View Profile</button></a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a href="../admin/logout-script.php"><button class="btn btn-dark text-monospace" data-bs-hover-animate="pulse" type="button" style="margin: 10px;background: rgb(255,255,255);color: #0c3823;margin-left: 0;border-radius: 10px;">Log Out</button></a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="features-boxed">
        <div class="container-fluid" style="background: #ffffff;">
            <div class="intro" style="background: #0c3823;margin-top: 120px;margin-bottom: 30px;">
                <h2 class="text-center" data-aos="fade" style="color: rgb(255,255,255);padding: 30px;margin-bottom: 0px;">Admin Dashboard</h2>
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
                                    <div class="col-sm-6 col-md-4 item"><img class="img-fluid" data-bs-hover-animate="pulse" src="../assets/img/admin icons/farmer.png" style="text-align: center;"></div>
                                    <div class="text-uppercase text-primary font-weight-bold text-xs mb-1" style="width: 300px;"><span class="text-capitalize text-center" style="font-size: 25px;color: rgb(1,5,15);">&nbsp; &nbsp; Total Farmer :
                                            <?php
                                            echo $FarmerTotalCount = $con->query("SELECT * FROM farmer")->num_rows;
                                            ?>
                                            &nbsp;</span>
                                    </div>
                                    <div class="text-dark font-weight-bold h5 mb-0" style="width: 290px;">
                                        <a href="managefarmer.php"><button class="btn btn-primary" type="button" style="background-color: rgb(52,57,72);margin-left: 10px; width: 250px;">Manage Farmer</button></a>
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
                                    <div class="col-sm-6 col-md-4 item"><img class="img-fluid" data-bs-hover-animate="pulse" src="../assets/img/admin icons/customer.png" style="text-align: center;"></div>
                                    <div class="text-uppercase text-primary font-weight-bold text-xs mb-1" style="width: 300px;"><span class="text-capitalize text-center" style="font-size: 25px;color: rgb(1,5,15);">&nbsp; &nbsp; Total Customer :
                                            <?php
                                            echo $CustomerTotalCount = $con->query("SELECT * FROM customer")->num_rows;
                                            ?>
                                            &nbsp;</span>
                                    </div>
                                    <div class="text-dark font-weight-bold h5 mb-0" style="width: 290px;">
                                        <a href="managecustomer.php"><button class="btn btn-primary" type="button" style="background-color: rgb(52,57,72);margin-left: 10px; width: 250px;">Manage Customer</button></a>
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
                                    <div class="col-sm-6 col-md-4 item no-gutters"><img class="img-fluid" data-bs-hover-animate="pulse" src="../assets/img/admin icons/driver.png" style="text-align: center;"></div>
                                    <div class="text-uppercase text-primary font-weight-bold text-xs mb-1" style="width: 300px;"><span class="text-capitalize text-center" style="font-size: 25px;color: rgb(1,5,15);">&nbsp; &nbsp; Total Driver :
                                            <?php
                                            echo $DriverTotalCount = $con->query("SELECT * FROM driver")->num_rows;
                                            ?>
                                            &nbsp;</span>
                                    </div>
                                    <div class="text-dark font-weight-bold h5 mb-0" style="width: 290px;">
                                        <a href="managedriver.php"><button class="btn btn-primary" type="button" style="background-color: rgb(52,57,72);margin-left: 10px; width: 250px;">Manage Driver</button></a>
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
                                    <div class="col-sm-6 col-md-4 item"><img class="img-fluid" data-bs-hover-animate="pulse" src="../assets/img/admin icons/kiosk.png" style="text-align: center;"></div>
                                    <div class="text-uppercase text-primary font-weight-bold text-xs mb-1" style="width: 300px;"><span class="text-capitalize text-center" style="font-size: 25px;color: rgb(1,5,15);">&nbsp; &nbsp; KIOSK Centre Details
                                    </div>
                                    <div class="text-dark font-weight-bold h5 mb-0" style="width: 290px;">
                                        <a href="#"><button class="btn btn-primary" type="button" style="background-color: rgb(52,57,72);margin-left: 10px; width: 250px;">View Information</button></a>
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
                                    <div class="col-sm-6 col-md-4 item"><img class="img-fluid" data-bs-hover-animate="pulse" src="../assets/img/admin icons/crop and activities.png" style="text-align: center;"></div>
                                    <div class="text-uppercase text-primary font-weight-bold text-xs mb-1" style="width: 300px;"><span class="text-capitalize text-center" style="font-size: 25px;color: rgb(1,5,15);">&nbsp; &nbsp; Crop and Activities
                                    </div>
                                    <div class="text-dark font-weight-bold h5 mb-0" style="width: 290px;">
                                        <a href="#"><button class="btn btn-primary" type="button" style="background-color: rgb(52,57,72);margin-left: 10px; width: 250px;">View Crops</button></a>
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
                                    <div class="col-sm-6 col-md-4 item no-gutters"><img class="img-fluid" data-bs-hover-animate="pulse" src="../assets/img/admin icons/queriesadmin.png" style="text-align: center;"></div>
                                    <div class="text-uppercase text-primary font-weight-bold text-xs mb-1" style="width: 300px;"><span class="text-capitalize text-center" style="font-size: 25px;color: rgb(1,5,15);">&nbsp; &nbsp; Query Zone
                                    </div>
                                    <div class="text-dark font-weight-bold h5 mb-0" style="width: 440px;  display: inline-block; margin-right: 10px;">
                                        <a href="contactqueries.php"><button class="btn btn-primary" type="button" style="background-color: rgb(52,57,72); width: 220px; display: inline-block;">View Contact Us Queries</button></a>
                                        <a href="helpzonequeries.php"><button class="btn btn-primary" type="button" style="background-color: rgb(52,57,72); margin-right: 10px; width: 200px; display: inline-block;">View Help Zone Queries</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </center>


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