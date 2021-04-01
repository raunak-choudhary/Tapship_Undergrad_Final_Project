<?php

include('session-script.php');
$res = $_SESSION["sessionid"];
$c_mobile= $res;
if(!isset($_SESSION['login_farmer'])){
//header("location: login.php"); // Redirecting To Profile Page
}
error_reporting(0);
?>
<!doctype html>
        <html>
            <head>
                <meta charset='utf-8'>
                <meta name='viewport' content='width=device-width, initial-scale=1'>
				<title>Bid Details</title>
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
                <script type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js'></script>
                <script type='text/javascript'></script>
            </head>

        <body oncontextmenu='return false' class='snippet-body'>
        <div class="page-content page-container" id="page-content">
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
                    <li class="nav-item mx-0 mx-lg-1"><a href="../customers/profile.php"><button class="btn btn-dark text-monospace" data-bs-hover-animate="pulse" type="button" style="margin: 10px;background: rgb(255,255,255);color: #0c3823;margin-left: 0;border-radius: 10px;">View Profile</button></a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a href="../farmers/logout-script.php"><button  class="btn btn-dark text-monospace" data-bs-hover-animate="pulse" type="button" style="margin: 10px;background: rgb(255,255,255);color: #0c3823;margin-left: 0;border-radius: 10px;">Log Out</button></a></li>

                </ul>
            </div>
        </div>
    </nav>

    <div class="features-boxed">
        <div class="container" style="background: #ffffff;">
            <div class="intro" style="background: #0c3823;margin-top: 120px;margin-bottom: 30px;">
                <h2 class="text-center" data-aos="fade" style="color: rgb(255,255,255);padding: 30px;margin-bottom: 0px;">Bid Details</h2>
            </div>
        </div>
    </div>


	<?php 
$con=mysqli_connect("localhost","root","","tapship");
   if(!$con)
   {
       die(" Connection Error ");
   }

   $cb_id = $_GET['cb_id'];

    $q = "SELECT CD.cro_id, CD.cro_name, CD.cro_type, CD.cro_msp, CS.cr_id, CS.cr_f_mobile, CS.cr_cro_id, CS.cr_quantity, CS.cr_mep, CS.cr_date, CS.cr_status, CS.cr_img1, CS.cr_img2, CS.cr_img3, cs.cr_status, f.f_name, f.f_mobile, f.f_gender, f.f_age, f.f_street, f.f_city, f.f_state, f.f_pincode, f_bankholder, f_bankaccount, f_bankifsc, f_bankname, f_bankbranch, cb.cb_bidprice,  cb.cb_id, cb.cb_status, c.c_name, c.c_mobile FROM cropdetails CD, cropsale CS, farmer f, cropbid cb, customer c where cb.cb_id=$cb_id AND cb.cb_c_mobile=$c_mobile AND cb.cb_c_mobile=c.c_mobile AND cb.cb_f_mobile=f.f_mobile AND cb.cb_cr_id=cs.cr_id AND CD.cro_id=CS.cr_cro_id";
    
    
    /*CD.cro_id=CS.cr_cro_id AND cb.cb_c_mobile=c.c_mobile AND cs.cr_status='1'";*/

   $result = mysqli_query($con,$q);

   while( $res=mysqli_fetch_assoc($result))
   {
       $cro_id =  $res['cro_id'];
       $cro_name =  $res['cro_name'];
       $cro_type =  $res['cro_type'];
       $cro_msp =  $res['cro_msp'];
       $cr_id = $res['cr_id'];
       $cr_quantity = $res['cr_quantity'];
       $cr_mep = $res['cr_mep'];
       $cr_date = $res['cr_date'];
       $cr_status = $res['cr_status'];
       $cr_img1 = $res['cr_img1'];
       $cr_img2 = $res['cr_img2'];
       $cr_img3 = $res['cr_img3'];

       $f_mobile = $res['f_mobile'];
       $f_name = $res['f_name'];
       $f_gender = $res['f_gender'];
       $f_age = $res['f_age'];
       $f_street = $res['f_street'];
       $f_city = $res['f_city'];
       $f_state = $res['f_state'];
       $f_pincode = $res['f_pincode'];

       $f_bankholder = $res['f_bankholder'];
       $f_bankaccount = $res['f_bankaccount'];
       $f_bankifsc = $res['f_bankifsc'];
       $f_bankname = $res['f_bankname'];
       $f_bankbranch = $res['f_bankbranch'];
       $f_approve =  $res['f_approve'];

       $cb_id = $res['cb_id'];
       $cb_bidprice = $res['cb_bidprice'];
       $cb_status = $res['cb_status'];

       $c_name = $res['c_name'];
       $c_mobile =  $res['c_mobile'];
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

<h5>Crop Figures</h5>
<p>Minimun Expected Price (per kgs.) <?php echo '₹ ',$cr_mep;?></P>
<p>Maximum Selling Price (per kgs.) <?php echo '₹ ',$cro_msp;?></P>
<p>Quantity: <?php echo $cr_quantity,' Kgs';?></P>
<p>Date: <?php echo $cr_date;?></P>
<p>Crop Status: <?php if($cr_status=="0"){echo "Added";}else if($cr_status=="1"){echo "Bidding";}else if($cr_status=="2"){echo "Bid Accepted";}else if($cr_status=="3"){echo "Payment Pending";}else if($cr_status=="4"){echo "Transport Selection Pending";} else if($cr_status=="5"){echo "Transport Pending";} else if($cr_status=="6"){echo "Deal Over";}  ?></P>

<h5>Farmer Details</h5>
<p>Farmer Name: <?php echo $f_name;?></P>
<p>Farmer Mobile: <?php echo $f_mobile;?></P>
<p>Farmer Gender: <?php echo $f_gender;?></P>
<p>Farmer Age: <?php echo $f_age;?></P>
<p>Farmer Street: <?php echo $f_street;?></P>
<p>Farmer City: <?php echo $f_city;?></P>
<p>Farmer State: <?php echo $f_street;?></P>
<p>Farmer Pincode: <?php echo $f_pincode;?></P>

<h5>Bank Details</h5>
<p>Bank Account Holder: <?php echo $f_bankholder;?></P>
<p>Account Number: <?php echo $f_bankaccount;?></P>
<p>Bank IFSC Code: <?php echo $f_bankifsc;?></P>
<p>Bank Name: <?php echo $f_bankname;?></P>
<p>Bank Branch: <?php echo $f_bankbranch;?></P>

<h5>Bid Details</h5>
<p>Bid ID: <?php echo $cb_id;?></P>
<p>Bid Price: <?php echo $cb_bidprice;?></P>
<p>Bid Total Amount: <?php echo $cb_bidprice*$cr_quantity;?></P>
<p>Bid Status: <?php if($cb_status=="0"){echo "Bidding";}else if($cb_status=="1"){echo "Accepted";}else if($cb_status=="2"){echo "Bid Rejected";}?></P>

<h5>Customer Details</h5>
<p>Customer Name: <?php echo $c_name;?></P>
<p>Customer Mobile: <?php echo $c_mobile;?></P>

<div class="features-boxed">
        <div class="container" style="background: #ffffff;">
            <div class="intro" style="background: #0c3823;margin-top: 120px;margin-bottom: 30px;">
                <h2 class="text-center" data-aos="fade" style="color: rgb(255,255,255);padding: 30px;margin-bottom: 0px;">Payment Details</h2>
            </div>
        </div>
    </div>
<div class="login-clean" style="padding: 0px; background: rgb(255,255,255); ">
<form method="post" action="payment.php?cb_id=<?php echo $cb_id; ?> " enctype="multipart/form-data" style="background: #0c3823;margin-bottom: 40px;">
        <h5 style="color:#fff;">Payment Type</h5>
        <div class="form-group">
        <input type="radio" name="cropbid__paytype" id="cropbid_paytype" value="male" required>
        <label for="male" style="color:#fff;" class="radio-inline">IMPS</label><br>
        <input type="radio" name="cropbid__paytype" id="cropbid__paytype" value="female" required>
        <label for="female" style="color:#fff;" class="radio-inline">NEFT</label><br>
        <input type="radio" name="cropbid__paytype" id="cropbid__paytype" value="other" required>
        <label for="female" style="color:#fff;" class="radio-inline">RTGS</label><br>
        </div>
        <h5 style="color:#fff;">Transaction ID</h5>
        <div class="form-group"><input class="form-control" id="cropbid__tid" type="text" name="cropbid__tid" placeholder="Put Transaction ID" required="" autofocus=""></div>
        <h5 style="color:#fff;">Transaction Proof (PDF/Photo)</h5>
        <div class="form-group"><input class="form-control" id="cropbid__tproof" type="file"  accept="image/jpeg, image/jpg, image/png, application/pdf" name="cropbid__tproof" required="" autofocus=""></div>
        <input name="submit" type="submit" class="btn btn-primary btn-block"  value="Update Payment">
</form>
</div>


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