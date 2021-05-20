<?php
error_reporting(0);
$con = mysqli_connect("localhost", "root", "", "tapship");

//Create Connection


$customer_type = $_GET['customer_type'];
    $customer_mobile = $_GET['customer_mobile'];
    $customer_name = $_GET['customer_name'];
    $customer_contactname = $_GET['customer_contactname'];
    $customer_gender = $_GET['customer_gender'];
    $customer_age = $_GET['customer_age'];
    $customer_street = $_GET['customer_street'];
    $customer_city = $_GET['customer_city'];
    $customer_state = $_GET['customer_state'];
    $customer_pincode = $_GET['customer_pincode'];
    $customer_aadhar = $_GET['customer_aadhar'];
    $customer_pan = $_GET['customer_pan'];
    $customer_password = $_GET['customer_password'];
    $customer_approve = $_GET['customer_approve'];
    $target_path1 = $_GET['target_path1'];
    $target_path2 = $_GET['target_path2'];
    $target_path3 = $_GET['target_path3'];
    $target_path4 = $_GET['target_path4'];

    if ($customer_type == "Wholesaler") {
        $query = "INSERT into customer(c_type,c_mobile,c_name,c_gender,c_age,c_street,c_city,c_state,c_pincode,c_aadhar,c_aadharpdf,c_pan,c_panpdf,c_photo,c_password,c_approve) VALUES('$customer_type','$customer_mobile','$customer_name','$customer_gender','$customer_age','$customer_street','$customer_city','$customer_state','$customer_pincode','$customer_aadhar','$target_path1','$customer_pan','$target_path2','$target_path3','$customer_password','$customer_approve')";
        $success = $con->query($query);
    }

    if ($customer_type == "Organization") {
        $query = "INSERT into customer(c_type,c_mobile,c_name,c_contactname,c_registration,c_gender,c_age,c_street,c_city,c_state,c_pincode,c_pan,c_panpdf,c_photo,c_password,c_approve) VALUES('$customer_type','$customer_mobile','$customer_name','$customer_contactname','$target_path4','$customer_gender','$customer_age','$customer_street','$customer_city','$customer_state','$customer_pincode','$customer_pan','$target_path2','$target_path3','$customer_password','$customer_approve')";
        $success = $con->query($query);
    }

$con->close();

?>


<html>

<head>
    <title>Success - customer Signup</title>

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
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" data-bs-hover-animate="pulse" href="../index.php" style="filter: contrast(100%) grayscale(0%) hue-rotate(0deg) invert(0%) sepia(0%);">HOME</a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" data-bs-hover-animate="pulse" href="../contact.php">CONTACT</a></li>
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
            <h2> <?php echo "Welcome $customer_name!" ?> </h2>
            <br>
            <h3>Your details for customer account has been submitted Successfully.</h3>
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