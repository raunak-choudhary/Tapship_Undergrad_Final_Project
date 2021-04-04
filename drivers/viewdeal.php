<?php

include('session-script.php');
$res = $_SESSION["sessionid"];
$d_mobile= $res;
if(!isset($_SESSION['login_driver'])){
header("location: login.php"); // Redirecting To Profile Page
}
error_reporting(0);
$con=mysqli_connect("localhost","root","","tapship");
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Find Crops</title>
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
    <link rel="stylesheet" href="../assets/css/table-style.css"/>
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
                    <li class="nav-item mx-0 mx-lg-1"><a href="../drivers/profile.php"><button class="btn btn-dark text-monospace" data-bs-hover-animate="pulse" type="button" style="margin: 10px;background: rgb(255,255,255);color: #0c3823;margin-left: 0;border-radius: 10px;">View Profile</button></a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a href="../drivers/logout-script.php"><button  class="btn btn-dark text-monospace" data-bs-hover-animate="pulse" type="button" style="margin: 10px;background: rgb(255,255,255);color: #0c3823;margin-left: 0;border-radius: 10px;">Log Out</button></a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="features-boxed">
        <div class="container" style="background: #ffffff;">
            <div class="intro" style="background: #0c3823;margin-top: 120px;margin-bottom: 30px;">
                <h2 class="text-center" data-aos="fade" style="color: rgb(255,255,255);padding: 30px;margin-bottom: 0px;">Transport Details</h2>
            </div>
        </div>
    </div>


	<?php 
$con=mysqli_connect("localhost","root","","tapship");
   if(!$con)
   {
       die(" Connection Error ");
   }

    $cr_id = $_GET['cr_id'];
    $query = "SELECT CD.cro_id, CD.cro_name, CD.cro_type, CS.cr_id, CS.cr_quantity, cs.cr_status, cs.cr_img1,cs.cr_img2,cs.cr_img3, f.f_name, f.f_mobile, f.f_gender, f.f_age, f.f_street, f.f_city, f.f_state, f.f_pincode, c.c_name, c.c_mobile, c.c_gender, c.c_age, c.c_street, c.c_city, c.c_state, c.c_pincode FROM cropdetails cd, cropbid cb, cropsale cs, farmer f, customer c where cd.cro_id=cs.cr_cro_id AND cb.cb_cr_id=cs.cr_id AND f.f_mobile=cb.cb_f_mobile AND c.c_mobile=cb.cb_c_mobile AND cs.cr_status='6' AND CS.cr_id = $cr_id";
   $result = mysqli_query($con,$query);

   while( $res=mysqli_fetch_assoc($result))
   {
       $cro_id =  $res['cro_id'];
       $cro_name =  $res['cro_name'];
       $cro_type =  $res['cro_type'];
       $cr_id = $res['cr_id'];
       $cr_status = $res['cr_status'];
       $cr_quantity = $res['cr_quantity'];
       $cr_img1 = $res['cr_img1'];
       $cr_img2 = $res['cr_img2'];
       $cr_img3 = $res['cr_img3'];
       
       $f_name = $res['f_name'];
       $f_mobile =  $res['f_mobile'];
       $f_gender = $res['f_gender'];
       $f_age = $res['f_age'];
       $f_street = $res['f_street'];
       $f_city = $res['f_city'];
       $f_state = $res['f_state'];
       $f_pincode = $res['f_pincode'];

       $c_name = $res['c_name'];
       $c_mobile =  $res['c_mobile'];
       $c_gender = $res['c_gender'];
       $c_age = $res['c_age'];
       $c_street = $res['c_street'];
       $c_city = $res['c_city'];
       $c_state = $res['c_state'];
       $c_pincode = $res['c_pincode'];
   }
?>

<img src="../farmers/<?php echo  $cr_img1;?>" width="30%">
<img src="../farmers/<?php echo  $cr_img2;?>" width="30%">
<img src="../farmers/<?php echo  $cr_img3;?>" width="30%">

<h5>Crop Details</h5>
<p>Crop ID: <?php echo $cro_id;?></P>
<p>Crop Name: <?php echo $cro_name;?></P>
<p>Crop Type: <?php echo $cro_type;?></P>
<p>Crop Sale ID: <?php echo $cr_id;?></P>
<p>Quantity: <?php echo $cr_quantity,' Kgs';?></P>


</P>

<h5>Farmer Details</h5>
<p>Farmer Name: <?php echo $f_name;?></P>
<p>Farmer Mobile: <?php echo $f_mobile;?></P>
<p>Farmer Gender: <?php echo $f_gender;?></P>
<p>Farmer Age: <?php echo $f_age;?></P>
<p>Farmer Street: <?php echo $f_street;?></P>
<p>Farmer City: <?php echo $f_city;?></P>
<p>Farmer State: <?php echo $f_state;?></P>
<p>Farmer Pincode: <?php echo $f_pincode;?></P>

<h5>Customer Details</h5>
<p>Customer Name: <?php echo $c_name;?></P>
<p>Customer Mobile: <?php echo $c_mobile;?></P>
<p>Customer Gender: <?php echo $c_gender;?></P>
<p>Customer Age: <?php echo $c_age;?></P>
<p>Customer Street: <?php echo $c_street;?></P>
<p>Customer City: <?php echo $c_city;?></P>
<p>Customer State: <?php echo $c_state;?></P>
<p>Customer Pincode: <?php echo $c_pincode;?></P>


<?php
if($cr_status==6){
?>
    <form method="post" action="placebid.php?cr_id=<?php echo $cr_id; ?> " enctype="multipart/form-data">
        <div class="form-group"><input class="form-control" id="tb_bid" type="text" name="tb_bid" placeholder="Tell your fare for this deal" required="" autofocus="" style="width: 300px;"></div>
        <input name="submit" type="submit" class="btn btn-dark text-monospace  " style="background-color:#0c3823;"  value=" Place Bid">
        <hr>
    </form>
<?php
}
?>


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