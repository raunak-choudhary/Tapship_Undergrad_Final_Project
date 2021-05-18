<?php
error_reporting(0);
$con = mysqli_connect("b3bu9bb23ikjqsiv8aku-mysql.services.clever-cloud.com", "uodltp4afruoomkk", "WAniOzDcPXxfNZTCLGnl", "b3bu9bb23ikjqsiv8aku");

//Create Connection


    $driver_mobile = $_GET['driver_mobile'];
    $driver_name = $_GET['driver_name'];
    $driver_gender = $_GET['driver_gender'];
    $driver_age = $_GET['driver_age'];
    $driver_street = $_GET['driver_street'];
    $driver_city = $_GET['driver_city'];
    $driver_state = $_GET['driver_state'];
    $driver_pincode = $_GET['driver_pincode'];
    $driver_aadhar = $_GET['driver_aadhar'];
    $driver_pan = $_GET['driver_pan'];
    $driver_dlnumber = $_GET['driver_dlnumber'];
    $driver_vehiclenumber = $_GET['driver_vehiclenumber'];
    $d_lat = $_GET['d_lat'];
    $d_long = $_GET['d_long'];
    $driver_approve = $_GET['driver_approve'];
    $target_path1 = $_GET['target_path1'];
    $target_path2 = $_GET['target_path2'];
    $target_path3 = $_GET['target_path3'];
    $target_path4 = $_GET['target_path4'];
    $target_path5 = $_GET['target_path5'];

    #sql query to insert into database
    $query = "INSERT into driver(d_mobile,d_name,d_gender,d_age,d_street,d_city,d_state,d_pincode,d_aadhar,d_aadharpdf,d_pan,d_panpdf,d_photo,d_dlnumber,d_dlpdf,d_vehiclenumber,d_vehiclercpdf,d_lat,d_long,d_date,d_time,d_password,d_approve) VALUES('$driver_mobile','$driver_name','$driver_gender','$driver_age','$driver_street','$driver_city','$driver_state','$driver_pincode','$driver_aadhar','$target_path1','$driver_pan','$target_path2','$target_path3','$driver_dlnumber','$target_path4','$driver_vehiclenumber','$target_path5','$d_lat','$d_long','$d_date','$d_time','$driver_password','$driver_approve')";
    $success = $con->query($query);


$con->close();

?>

<html>

<head>
    <title>Success - Driver Signup</title>

    <link rel="shortcut icon" type="image/png" href="../assets/img/fav.png">
    <link rel="stylesheet" type="text/css" href="../assets/css/manager_registered_success.css">
    <link rel="stylesheet" type="text/css" href="../assets/bootstrap/css/bootstrap.min.css">
    <script type="text/javascript" src="../assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic">
    <link rel="stylesheet" href="../assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/css/Article-List.css">
    <link rel="stylesheet" href="../assets/css/Features-Boxed.css">
    <link rel="stylesheet" href="../assets/css/Footer-Dark.css">
    <link rel="stylesheet" href="../assets/css/Highlight-Blue.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.2.0/aos.css">
</head>

<style>
    .footer-dark {
        position: fixed;
        left: 0;
        bottom: 0;
        width: 100%;
        background-color: red;
        color: white;
        text-align: center;
    }
</style>

<body>
    <nav class="navbar navbar-light navbar-expand-lg fixed-top text-uppercase" id="mainNav" style="background: #0c3823;">
        <div class="container-fluid">
            <a class="navbar-brand js-scroll-trigger" data-bs-hover-animate="pulse" href="index.php" style="font-family: Montserrat, sans-serif;">TAPSHIP</a>
            <button data-toggle="collapse" data-target="#navbarResponsive" class="navbar-toggler navbar-toggler-right text-uppercase rounded" data-aos="fade" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation" style="background: #fff;"><i class="fa fa-bars" style="color: #0c3823;;"></i></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" data-bs-hover-animate="pulse" href="index.php" style="filter: contrast(100%) grayscale(0%) hue-rotate(0deg) invert(0%) sepia(0%);">DASHBOARD</a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" data-bs-hover-animate="pulse" href="../about.php">About</a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" data-bs-hover-animate="pulse" href="../faq.php">FAQ</a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a href="../login-choice.php"><button class="btn btn-dark text-monospace" data-bs-hover-animate="pulse" type="button" style="margin: 10px;background: rgb(255,255,255);color: #0c3823;margin-left: 0;border-radius: 10px;">Log in</button></a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a href="../signup-choice.php"><button class="btn btn-dark text-monospace" data-bs-hover-animate="pulse" type="button" style="margin: 10px;background: rgb(255,255,255);color: #0c3823;margin-left: 0;border-radius: 10px;">Sign Up</button></a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container" style="margin-top:150px;">
        <div class="jumbotron" style="text-align: center; background-color:#0c3823; color:#fff;">
            <h2> <?php echo "Welcome $driver_name!" ?> </h2>
            <br>
            <h3>Your details for driver account has been submitted Successfully.</h3>
            <h5>We are reviewing your details and documents. Please have a little patience.</h5>
            <br>
            <h6><strong>Go to home <a href="../index.php">HERE</a></strong> <span>&nbsp&nbsp&nbsp</span><strong>Try to login <a href="login.php">HERE</strong></a></h6>
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