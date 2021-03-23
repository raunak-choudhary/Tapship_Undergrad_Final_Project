<?php

include('session-script.php');
$res = $_SESSION["sessionid"];
$f_mobile= $res;
if(!isset($_SESSION['login_farmer'])){
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
</head>

<body id="page-top">
    <nav class="navbar navbar-light navbar-expand-lg fixed-top text-uppercase" id="mainNav" style="background: #0c3823;">
        <div class="container">
            <a class="navbar-brand js-scroll-trigger" data-bs-hover-animate="pulse" href="../index.php" style="font-family: Montserrat, sans-serif;">TAPSHIP</a>
            <button data-toggle="collapse" data-target="#navbarResponsive" class="navbar-toggler navbar-toggler-right text-uppercase rounded" data-aos="fade" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation" style="background: #fff;" ><i class="fa fa-bars" style="color: #0c3823;;"></i></button>
            <div class="collapse navbar-collapse"
                id="navbarResponsive">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" data-bs-hover-animate="pulse" href="../index.php" style="filter: contrast(100%) grayscale(0%) hue-rotate(0deg) invert(0%) sepia(0%);">HOME</a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" data-bs-hover-animate="pulse" href="../contact.php">CONTACT</a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" data-bs-hover-animate="pulse" href="../about.php">ABOUT</a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" data-bs-hover-animate="pulse" href="../faq.php">FAQ</a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a href="../farmers/profile.php"><button class="btn btn-dark text-monospace" data-bs-hover-animate="pulse" type="button" style="margin: 10px;background: rgb(255,255,255);color: #0c3823;margin-left: 0;border-radius: 10px;">View Profile</button></a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a href="../farmers/logout-script.php"><button  class="btn btn-dark text-monospace" data-bs-hover-animate="pulse" type="button" style="margin: 10px;background: rgb(255,255,255);color: #0c3823;margin-left: 0;border-radius: 10px;">Log Out</button></a></li>
                </ul>
            </div>
        </div>
    </nav>

<?php 
$con=mysqli_connect("localhost","root","","tapship");
   if(!$con)
   {
       die(" Connection Error ");
   }

   $query = " select * from farmer where f_mobile=".$f_mobile."";
   $result = mysqli_query($con,$query);

   while( $res=mysqli_fetch_assoc($result))
   {
       $f_approve =  $res['f_approve'];
   }
?>

<?php
if($f_approve==0||$f_approve==2||$f_approve==3||$f_approve==4)
{?>
<div class="container" style="margin-top:150px;">
        <div class="jumbotron" style="text-align: center; background-color:#0c3823; color:#fff;">
            <h2>Status : <?php if($f_approve=="0"){echo "No Action";}else if($f_approve=="1"){echo " Accepted";}else if($f_approve=="2"){echo "Review";}else if($f_approve=="3"){echo "Rejected";}else if($f_approve=="4"){echo "Resubmitted";}  ?></h4><hr>
            <h3>Your profile is not approved by Tapship.</h2>
            <?php
            if($f_approve==0)
            echo $f_approve;
            {?>
            <h5>You have registerd successfully. We are checking your details.</h5>
            <h5>Please wait for sometime.</h5>
            <h5>Thank You</h5>
            <?php
            }
            if($f_approve==2)
            {?>
            <h5>Your application have some problem. We will contact you soon</h5>
            <h5>Please wait for for our call.</h5>
            <h5>Thank You</h5>
            <?php
            }
            if($f_approve==3)
            {?>
            <h5>Your application got rejected due to not following rules.</h5>
            <h5>You can contact our customer care for more details.</h5>
            <h5>Thank You</h5>
            <?php
            }
            if($f_approve==4)
            {?>
            <h5>Your have resubmitted application successfully. We are checking your details.</h5>
            <h5>Please wait for sometime.</h5>
            <h5>Thank You</h5>
            <?php }?>
            <br>
            <h6><strong>Go to home <a href="../index.php">HERE</a></strong></a></h6>
        </div>    
    </div>
<?php }?>


<?php
if($f_approve==1)
{?>

    <div class="features-boxed">
        <div class="container" style="background: #ffffff;">
            <div class="intro" style="background: #0c3823;margin-top: 120px;margin-bottom: 30px;">
                <h2 class="text-center" data-aos="fade" style="color: rgb(255,255,255);padding: 30px;margin-bottom: 0px;">Farmer Profile</h2>
            </div>
        </div>
    </div>
<?php }?>

<a href="addcrop.php">Add Crop</a>
<a href="activecrop.php">Active Crop</a>
<a href="sellhistory.php">Sell History</a>

    
    <div class="footer-dark" style="background: rgb(12,56,35);">
        <footer>
            <div class="container">
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