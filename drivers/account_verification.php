<?php

require_once '../api/twilio/vendor/autoload.php';
use Twilio\Rest\Client;
require_once '../api/twilio/config.php';

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
    $target_path1 = $_GET['target_path1'];
    $target_path2 = $_GET['target_path2'];
    $target_path3 = $_GET['target_path3'];
    $target_path4 = $_GET['target_path4'];
    $target_path5 = $_GET['target_path5'];

     $con = mysqli_connect("localhost", "root", "", "tapship");
    if (!$con) {
        die(" Connection Error ");
    }

    $query = " select * from otps where mobile=" . $driver_mobile . "";
    $result = mysqli_query($con, $query);
    while ($res = mysqli_fetch_assoc($result)) {
        $validity=$res['validity'];
    }
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Account Verification</title>
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

    .card {
        width: 800px;
        border: none;
        height: 400px;
        box-shadow: 0px 5px 20px 0px #d2dae3;
        z-index: 1;
        display: flex;
        justify-content: center;
        align-items: center
    }

    @media (max-width: 850px){
        .card {
        width: 600px;
        border: none;
        height: 400px;
        box-shadow: 0px 5px 20px 0px #d2dae3;
        z-index: 1;
        display: flex;
        justify-content: center;
        align-items: center
    }    
    }

    @media (max-width: 650px){
        .card {
        width: 400px;
        border: none;
        height: 400px;
        box-shadow: 0px 5px 20px 0px #d2dae3;
        z-index: 1;
        display: flex;
        justify-content: center;
        align-items: center
    }    
    }

    .card h6 {
        color: #0C3823;
        font-size: 20px
    }

    .inputs input {
        width: 40px;
        height: 40px
    }

    input[type=number]::-webkit-inner-spin-button,
    input[type=number]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        margin: 0
    }


    .card-2 .content {
        margin-top: 50px
    }

    .card-2 .content a {
        color: red
    }

    .form-control:focus {
        box-shadow: none;
        border: 2px solid #0C3823;
    }

    .validate {
        border-radius: 20px;
        height: 40px;
        background-color: #0C3823;
        border: 1px solid #0C3823;
        width: 140px
    }
    </style>
</head>

<body id="page-top">
    <nav class="navbar navbar-light navbar-expand-lg fixed-top text-uppercase" id="mainNav"
        style="background: #0c3823;">
        <div class="container-fluid">
            <a class="navbar-brand js-scroll-trigger" data-bs-hover-animate="pulse" href="../index.php"
                style="font-family: Montserrat, sans-serif;">TAPSHIP</a>
            <button data-toggle="collapse" data-target="#navbarResponsive"
                class="navbar-toggler navbar-toggler-right text-uppercase rounded" data-aos="fade"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"
                style="background: #fff;"><i class="fa fa-bars" style="color: #0c3823;;"></i></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="nav navbar-nav ml-auto">
                <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" data-bs-hover-animate="pulse" href="../index.php" style="filter: contrast(100%) grayscale(0%) hue-rotate(0deg) invert(0%) sepia(0%);">HOME</a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" data-bs-hover-animate="pulse" href="../contact.php">CONTACT</a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" data-bs-hover-animate="pulse" href="../about.php">ABOUT</a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" data-bs-hover-animate="pulse" href="../faq.php">FAQ</a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a href="../login-choice.php"><button class="btn btn-dark text-monospace" data-bs-hover-animate="pulse" type="button" style="margin: 10px;background: rgb(255,255,255);color: #0c3823;margin-left: 0;border-radius: 10px;">Log in</button></a></li>
                </ul>
            </div>
        </div>
    </nav>

    <?php
            if($validity==0){
            $GeneratedOTP=rand(100000, 999999);
            $SendSMSTO='+91'.$driver_mobile;
            $client = new Client($account_sid, $auth_token);
            $client->messages->create(
                $SendSMSTO,
                array(
                    'from' => $twilio_number,
                    'body' => '[Tapship: New Account Verification] Hello New User, You have been registered as driver on Tapship.Please enter this OTP to verify your account '.$GeneratedOTP.'. Do not share it with anyone'
                )
                );
            }

            $InsertOTP=$con->query("UPDATE otps SET otp=$GeneratedOTP, validity=1 WHERE mobile=$driver_mobile");
    
?>

<div class="features-boxed">
            <div class="container" style="background: #ffffff;">
                <div class="intro" style="background: #0c3823;margin-top: 120px;margin-bottom: 30px;">
                    <h2 class="text-center" data-aos="fade" style="color: rgb(255,255,255);padding: 30px;margin-bottom: 0px;">Account Verification</h2>
                </div>
            </div>
        </div>

    <div class="container" style="margin-top:-50px;">
        <div class="d-flex justify-content-center align-items-center">
            <div class="position-relative p-5">
                <div class="card p-2 text-center">
                    <?php
                if(isset($_POST['submit'])){
                    $EnteredOTP=$_POST['first'].$_POST['second'].$_POST['third'].$_POST['fourth'].$_POST['fifth'].$_POST['sixth'];
                    $query = " select * from otps where mobile=" . $driver_mobile . "";
                    $result = mysqli_query($con, $query);
                    while ($res = mysqli_fetch_assoc($result)) {
                        $otp=$res['otp'];
                    }
                    if($otp==$EnteredOTP){
                        echo '<div class="alert alert-success w-100">Account Verification successful. redirecting to home...</div><script>setTimeout(function(){ location.replace("signup-script.php?driver_mobile='.$driver_mobile.'&driver_name='.$driver_name.'&driver_gender='.$driver_gender.'&driver_age='.$driver_age.'&driver_street='.$driver_street.'&driver_city='.$driver_city.'&driver_state='.$driver_state.'&driver_pincode='.$driver_pincode.'&driver_aadhar='.$driver_aadhar.'&driver_pan='.$driver_aadhar.'&driver_dlnumber='.$driver_dlnumber.'&driver_vehiclenumber='.$driver_vehiclenumber.'&$d_lat='.$d_lat.'&d_long='.$d_long.'&driver_password='.$driver_password.'&driver_approve=1&target_path1='.$target_path1.'&target_path2='.$target_path2.'&target_path3='.$target_path3.'&target_path4='.$target_path4.'&target_path5='.$target_path5.'"); }, 1000)</script>';
                    }
                    else{
                        echo '<div class="alert alert-danger w-100">Otp mismatched. We have sent a new otp to your phone.</div>';
                    }
                }
                ?>
                <script>
                    $('.digit-group').find('input').each(function() {
	                $(this).attr('maxlength', 1);
	                $(this).on('keyup', function(e) {
		            var parent = $($(this).parent());});});
                </script>
                    <form method="post" class="digit-group" action="#">
                        <h6>Please enter the one time password to verify your account</h6>
                        <div> <span>A code has been sent to</span> <small><?php echo $driver_mobile; ?></small> </div>
                        <div id="otp" class="inputs d-flex flex-row justify-content-center mt-2">
                            <input class="m-2 text-center form-control rounded" type="number" name="first"
                                maxlength="1" />
                            <input class="m-2 text-center form-control rounded" type="number" name="second"
                                maxlength="1" />
                            <input class="m-2 text-center form-control rounded" type="number" name="third"
                                maxlength="1" />
                            <input class="m-2 text-center form-control rounded" type="number" name="fourth"
                                maxlength="1" />
                            <input class="m-2 text-center form-control rounded" type="number" name="fifth"
                                maxlength="1" />
                            <input class="m-2 text-center form-control rounded" type="number" name="sixth"
                                maxlength="1" />
                        </div>
                        <div class="mt-4"> <button type="submit" name="submit"
                                class="btn btn-danger px-4 validate">Validate</button> </div>
                                <br>
                                <p>If you have stuck on this page. And Want a new OTP Just type 123456 as your OTP to get a new OTP.</p>
                                <span class="text-info" id="resendResponse"></span><br>
                                
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <script>

    document.addEventListener("DOMContentLoaded", function(event) {
        function OTPInput() {
            const inputs = document.querySelectorAll('#otp > *[name]');
            for (let i = 0; i < inputs.length; i++) {
                inputs[i].addEventListener('keydown', function(event) {
                    if (event.key === "Backspace") {
                        inputs[i].value = '';
                        if (i !== 0) inputs[i - 1].focus();
                    } else {
                        if (i === inputs.length - 1 && inputs[i].value !== '') {
                            return true;
                        } else if (event.keyCode > 47 && event.keyCode < 58) {
                            inputs[i].value = event.key;
                            if (i !== inputs.length - 1) inputs[i + 1].focus();
                            event.preventDefault();
                        } else if (event.keyCode > 64 && event.keyCode < 91) {
                            inputs[i].value = String.fromCharCode(event.keyCode);
                            if (i !== inputs.length - 1) inputs[i + 1].focus();
                            event.preventDefault();
                        }
                    }
                });
            }
        }
        OTPInput();
    });
    </script>


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