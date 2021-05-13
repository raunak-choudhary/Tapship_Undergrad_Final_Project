<?php

include('session-script.php');

require_once '../api/twilio/vendor/autoload.php';
use Twilio\Rest\Client;
require_once '../api/twilio/config.php';

$res = $_SESSION["sessionid"];
$c_mobile = $res;
if (!isset($_SESSION['login_customer'])) {
    header("location: login.php"); // Redirecting To Profile Page
}
error_reporting(0);
?>

<?php
    $con = mysqli_connect("localhost", "root", "", "tapship");
    if (!$con) {
        die(" Connection Error ");
    }

    $query = " select * from customer where c_mobile=" . $c_mobile . "";
    $result = mysqli_query($con, $query);
    $res = mysqli_fetch_assoc($result);
    $c_tsv=$res['c_tsv_otp'];
    $c_tsv_validity=$res['c_tsv_validity'];

    if($c_tsv_validity>time()){
        echo "<script>location.replace('index.php')</script>";
    }
    else
    {   
        if($c_tsv=='')
        {
            $GeneratedOTP=rand(100000, 999999);
            $SendSMSTO='+91'.$res['c_mobile'];
            $client = new Client($account_sid, $auth_token);
            $client->messages->create(
                $SendSMSTO,
                array(
                    'from' => $twilio_number,
                    'body' => '[Tapship: 2-step verification] Hello '.$res['c_name'].", Please enter this OTP to Login ".$GeneratedOTP.". Do not share it with anyone"
                )
            );

            $InsertOTP=$con->query("UPDATE customer SET c_tsv_otp='".$GeneratedOTP."' WHERE c_mobile='".$c_mobile."'");
        }
            
    }
    
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

        <div class="features-boxed">
            <div class="container-fluid" style="background: #ffffff;">
                <div class="intro" style="background: #0c3823;margin-top: 120px;margin-bottom: 30px; max-width:1000px;">
                    <h2 class="text-center" data-aos="fade" style="color: rgb(255,255,255);padding: 30px;margin-bottom: 0px;">Two Step Verification</h2>
                </div>
            </div>
        </div>

    <div class="container">
        <div class="d-flex justify-content-center align-items-center">
            <div class="position-relative">
                <div class="card p-2 text-center">
                    <?php
                if(isset($_POST['submit'])){
                    $EnteredOTP=$_POST['first'].$_POST['second'].$_POST['third'].$_POST['fourth'].$_POST['fifth'].$_POST['sixth'];
                    $res['c_tsv_otp'];
                    if($res['c_tsv_otp']==$EnteredOTP){
                        $TsvValidity=time()+3600; //24 hour validity
                        $UpdateStatus=$con->query("UPDATE customer SET c_tsv_otp='', c_tsv_validity='".$TsvValidity."' WHERE c_mobile='".$c_mobile."'");
                        echo '<div class="alert alert-success w-100">Verification successful. redirecting to home...</div><script>setTimeout(function(){ location.replace("index.php"); }, 1000)</script>';
                    }
                    else{
                        echo '<div class="alert alert-danger w-100">Otp mismatched</div>';
                    }
                    
                }
                ?>
                    <form method="post" action="#">
                        <h6>Please enter the one time password to verify your account</h6>
                        <div> <span>A code has been sent to</span> <small><?php echo $c_mobile; ?></small> </div>
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
                                <a class="text-danger py-4 btn" onclick="resendOTP('<?php echo $c_mobile; ?>')">Resend OTP</a><br>
                                <p>If you have stuck on this page. Kindly <a href="logout-script.php">click here</a></p>
                                <span class="text-info" id="resendResponse"></span>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function resendOTP(uid){
            $('#resendResponse').html('<i class="fa fa-spinner fa-spin"> </i>');
        $.ajax({
            url: "resend-otp.php",
            method: "POST",
            data: "uid="+uid+"&name=<?php echo $res['c_name'];?>&type=tsv",
            success: function(data){
                $('#resendResponse').html(data);
            }
        })
    }
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

    <br>


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