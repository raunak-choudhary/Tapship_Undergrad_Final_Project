<?php

include('session-script.php');
$res = $_SESSION["sessionid"];
$d_mobile = $res;
if (!isset($_SESSION['login_driver'])) {
    header("location: login.php"); // Redirecting To Profile Page
}
error_reporting(0);
?>
<!doctype html>
<html>

<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>Driver Profile</title>
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
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" data-bs-hover-animate="pulse" href="index.php" style="filter: contrast(100%) grayscale(0%) hue-rotate(0deg) invert(0%) sepia(0%);">DASHBOARD</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" data-bs-hover-animate="pulse" href="../about.php">ABOUT</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" data-bs-hover-animate="pulse" href="../faq.php">FAQ</a></li>
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
            $d_id =  $res['d_id'];
            $d_name =  $res['d_name'];
            $d_gender =  $res['d_gender'];
            $d_age =  $res['d_age'];
            $d_street =  $res['d_street'];
            $d_city =  $res['d_city'];
            $d_state =  $res['d_state'];
            $d_pincode =  $res['d_pincode'];
            $d_aadhar =  $res['d_aadhar'];
            $d_aadharpdf =  $res['d_aadharpdf'];
            $d_pan =  $res['d_pan'];
            $d_panpdf =  $res['d_panpdf'];
            $d_dlnumber =  $res['d_dlnumber'];
            $d_dlpdf =  $res['d_dlpdf'];
            $d_vehiclenumber =  $res['d_vehiclenumber'];
            $d_vehiclercpdf =  $res['d_vehiclercpdf'];
            $d_lat =  $res['d_lat'];
            $d_long =  $res['d_long'];
            $d_photo =  $res['d_photo'];
            $d_approve =  $res['d_approve'];
            $d_time = $res['d_time'];
            $d_date = $res['d_date'];
        }
        ?>

        <div class="features-boxed">
            <div class="container" style="background: #ffffff;">
                <div class="intro" style="background: #0c3823;margin-top: 120px;margin-bottom: 30px;">
                    <h2 class="text-center" data-aos="fade" style="color: rgb(255,255,255);padding: 30px;margin-bottom: 0px;">Driver Profile</h2>
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
                                    <div class="m-b-25"> <img src="../drivers/<?php echo  $d_photo; ?>" width="200" height="240" align="center" class="img-radius" alt="User-Profile-Image"> </div>
                                    <h3 class="f-w-600"><?php echo "$d_name" ?></h3>
                                    <h5>Driver</h5>
                                    <h5>Status: <?php if ($d_approve == "1") {
                                                    echo "No Action";
                                                } else if ($d_approve == "2") {
                                                    echo " Accepted";
                                                } else if ($d_approve == "3") {
                                                    echo "Review";
                                                } else if ($d_approve == "4") {
                                                    echo "Rejected";
                                                } else if ($d_approve == "5") {
                                                    echo "Resubmitted";
                                                } else {
                                                    echo "Multiple Login State";
                                                } ?></h5>
                                    <br> <br><br><br>
                                    <a href="editdetails.php"><button class="btn btn-primary" type="button" style="width: 250px; background-color:white; color:black;">Edit Profile</button></a>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="card-block">
                                    <h4 class="m-b-20 p-b-5 b-b-default f-w-600"><strong>Information</strong></h4>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">Id</p>
                                            <h6 class="text-muted f-w-400"><?php echo "$d_id" ?></h6>
                                        </div>
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">Name</p>
                                            <h6 class="text-muted f-w-400"><?php echo "$d_name" ?></h6>
                                        </div>
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">Mobile</p>
                                            <h6 class="text-muted f-w-400"><?php echo "$d_mobile" ?></h6>
                                        </div>
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">Gender</p>
                                            <h6 class="text-muted f-w-400"><?php echo "$d_gender" ?></h6>
                                        </div>
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">Age</p>
                                            <h6 class="text-muted f-w-400"><?php echo "$d_age" ?></h6>
                                        </div>
                                    </div>
                                    <h4 class="m-b-20 m-t-40 p-b-5 b-b-default  f-w-600"><strong>Address</strong></h4>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">Street</p>
                                            <h6 class="text-muted f-w-400"><?php echo "$d_street" ?></h6>
                                        </div>
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">City</p>
                                            <h6 class="text-muted f-w-400"><?php echo "$d_city" ?></h6>
                                        </div>
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">State</p>
                                            <h6 class="text-muted f-w-400"><?php echo "$d_state" ?></h6>
                                        </div>
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">Pincode</p>
                                            <h6 class="text-muted f-w-400"><?php echo "$d_pincode" ?></h6>
                                        </div>
                                    </div>
                                </div>
                                <h4 class="m-b-20 m-t-40 p-b-5 b-b-default m-l-20 f-w-600"><strong>Documents</strong></h4>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p class="m-b-10 m-l-20 f-w-600">Aadhaar</p>
                                        <h6 class="text-muted m-l-20 f-w-400"><?php echo "$d_aadhar" ?> &nbsp; <button class="text-monospace" style="padding:5px;"><a href="../drivers/<?php echo  $d_aadharpdf; ?>" target="_blank">View Aadhar</a></button></h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="m-b-10  m-l-20 f-w-600">PAN</p>
                                        <h6 class="text-muted m-l-20 f-w-400"><?php echo "$d_pan" ?> &nbsp; <button class="text-monospace" style="padding:5px;"><a href="../drivers/<?php echo  $d_panpdf; ?>" target="_blank">View PAN</a></button></h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="m-b-10  m-l-20 f-w-600">DL Number</p>
                                        <h6 class="text-muted m-l-20 f-w-400"><?php echo "$d_dlnumber" ?> &nbsp; <button class="text-monospace" style="padding:5px;"><a href="../drivers/<?php echo  $d_dlpdf; ?>" target="_blank">View DL</a></button></h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="m-b-10  m-l-20 f-w-600">Vehicle Number</p>
                                        <h6 class="text-muted m-l-20 f-w-400"><?php echo "$d_vehiclenumber" ?> &nbsp; <button class="text-monospace" style="padding:5px;"><a href="../drivers/<?php echo  $d_vehiclercpdf; ?>" target="_blank">View RC</a></button></h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="m-b-10  m-l-20 f-w-600">Live Location (<i>Last Updated: <?php echo "$d_time" ?>&nbsp<?php echo "$d_date" ?><i>)</p>
                                        <h6 class="text-muted m-l-20 f-w-400"><button class="text-monospace" style="padding:5px;" style="padding:5px;"><a href="https://www.google.com/maps/@<?php echo  $d_lat; ?>,<?php echo  $d_long; ?>,14z" target="_blank">View Location</a></button></h6>
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
    <script src="../assets/js/bs-init.js"></script>danger
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.2.0/aos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script src="../assets/js/freelancer.js"></script>
</body>

</html>