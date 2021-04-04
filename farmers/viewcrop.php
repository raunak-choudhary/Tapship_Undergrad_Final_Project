<?php

include('session-script.php');
$res = $_SESSION["sessionid"];
$f_mobile= $res;
if(!isset($_SESSION['login_farmer'])){
header("location: login.php"); // Redirecting To Profile Page
}
error_reporting(0);
?>
<!doctype html>
        <html>
            <head>
                <meta charset='utf-8'>
                <meta name='viewport' content='width=device-width, initial-scale=1'>
				<title>Crop Details</title>
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
                    <li class="nav-item mx-0 mx-lg-1"><a href="../farmers/profile.php"><button class="btn btn-dark text-monospace" data-bs-hover-animate="pulse" type="button" style="margin: 10px;background: rgb(255,255,255);color: #0c3823;margin-left: 0;border-radius: 10px;">View Profile</button></a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a href="../farmers/logout-script.php"><button  class="btn btn-dark text-monospace" data-bs-hover-animate="pulse" type="button" style="margin: 10px;background: rgb(255,255,255);color: #0c3823;margin-left: 0;border-radius: 10px;">Log Out</button></a></li>

                </ul>
            </div>
        </div>
    </nav>

    <div class="features-boxed">
        <div class="container" style="background: #ffffff;">
            <div class="intro" style="background: #0c3823;margin-top: 120px;margin-bottom: 30px;">
                <h2 class="text-center" data-aos="fade" style="color: rgb(255,255,255);padding: 30px;margin-bottom: 0px;">Crop Details</h2>
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

   $q = "select cb_id from cropbid where cb_cr_id = $cr_id AND cb_f_mobile = $f_mobile";
   $result = mysqli_query($con,$q);

   while( $res=mysqli_fetch_assoc($result))
   {
       $cb_id =  $res['cb_id'];
   }

   $query = "SELECT CD.cro_id, CD.cro_name, CD.cro_type, CD.cro_msp, CS.cr_id, CS.cr_f_mobile, CS.cr_cro_id, CS.cr_quantity, CS.cr_mep, CS.cr_date, CS.cr_status, CS.cr_img1, CS.cr_img2, CS.cr_img3, cs.cr_status, c.c_name, c.c_mobile, c.c_contactname, c.c_gender, c.c_age, c.c_street, c.c_city, c.c_state, c.c_pincode, c.c_type, cb.cb_bidprice, cb.cb_id, cb.cb_status, cb.cb_paytype, cb.cb_tid, cb.cb_tproof, d.d_mobile, d.d_name, d.d_gender, d.d_age, d.d_dlnumber, d.d_vehiclenumber, d.d_lat, d.d_long, tb.tb_id, tb.tb_bid, tb.tb_status FROM cropdetails CD, cropsale CS, farmer f, cropbid cb, customer c,driver d, transportbid tb where cb.cb_id=$cb_id AND cb.cb_f_mobile=$f_mobile AND cb.cb_c_mobile=c.c_mobile AND cb.cb_f_mobile=f.f_mobile AND cb.cb_cr_id=cs.cr_id AND CD.cro_id=CS.cr_cro_id AND tb.tb_cb_id=cb.cb_id AND tb.tb_cb_id=$cb_id AND d.d_mobile=tb.tb_d_mobile AND tb.tb_status='1'";
   $result = mysqli_query($con,$query);

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
       $cb_id =  $res['cb_id'];

       $c_mobile = $res['c_mobile'];
       $c_name = $res['c_name'];
       $c_contactname = $res['c_contactname'];
       $c_gender = $res['c_gender'];
       $c_age = $res['c_age'];
       $c_street = $res['c_street'];
       $c_city = $res['c_city'];
       $c_state = $res['c_state'];
       $c_pincode = $res['c_pincode'];
       $c_type = $res['c_type'];

       $cb_id = $res['cb_id'];
       $cb_bidprice = $res['cb_bidprice'];
       $cb_status = $res['cb_status'];

       $cb_paytype = $res['cb_paytype'];
       $cb_tid = $res['cb_tid'];
       $cb_tproof = $res['cb_tproof'];

       $tb_id = $res['tb_id'];
       $tb_bid = $res['tb_bid'];
       $tb_status = $res['tb_status'];

       $d_mobile = $res['d_mobile'];
       $d_name = $res['d_name'];
       $d_gender = $res['d_gender'];
       $d_age = $res['d_age'];
       $d_dlnumber = $res['d_dlnumber'];
       $d_vehiclenumber = $res['d_vehiclenumber'];
       $d_lat = $res['d_lat'];
       $d_long = $res['d_long'];
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
<p>Crop Status: <?php if($cr_status=="0"){echo "Added";}else if($cr_status=="1"){echo "Bidding";}else if($cr_status=="2"){echo "Accepeted / Payment Pending";}else if($cr_status=="3"){echo "Paid / Pending Conformation";} else if($cr_status=="4"){echo "Conformed Paid / Transport Selection Pending ";} else if($cr_status=="4"){echo "Transport Selected / Delivery Peneding ";} else if($cr_status=="5"){echo "Transport Selected";}  ?></P>

<?php
if($cr_status==0){
?>
	 <button class="btn btn-dark text-monospace  " style="background-color:#0c3823;" ><a href="#">Edit Details</a></button> 
     <button class="btn btn-dark text-monospace  " style="background-color:#0c3823;" ><a href="#">Delete</a></button> 
	<hr>
<?php
}
if($cr_status==1){
?>
     <button class="btn" style="background-color:#0c3823;"> <a href="viewbids.php?cr_id=<?php echo $cr_id; ?>" class="text-white"> View Bids </a> </button>
     <button class="btn btn-dark text-monospace  " style="background-color:#0c3823;" ><a href="#">Delete</a></button> 
	 <hr>
<?php
}
if($cr_status==2){
?>
    <h5>Customer Details</h5>
    <p>Customer Type: <?php echo $c_type;?></P>
    <p>Customer Name: <?php echo $c_name;?></P>
    <p>Customer Mobile: <?php echo $c_mobile;?></P>
    <?php if($c_type=='Organization'){?>
    <p>Customer Contact Name: <?php echo $c_contactname;?></P>
    <?php }?>
    <p>Customer Gender: <?php echo $c_gender;?></P>
    <p>Customer Age: <?php echo $c_age;?></P>
    <p>Customer Street: <?php echo $c_street;?></P>
    <p>Customer City: <?php echo $c_city;?></P>
    <p>Customer State: <?php echo $c_street;?></P>
    <p>Customer Pincode: <?php echo $c_pincode;?></P>

    <h5>Bid Details</h5>
    <p>Bid ID: <?php echo $cb_id;?></P>
    <p>Bid Price: <?php echo $cb_bidprice;?></P>
    <p>Bid Total Amount: <?php echo $cb_bidprice*$cr_quantity;?></P>
    <p>Bid Status: <?php if($cb_status=="0"){echo "Bidding";}else if($cb_status=="1"){echo "Accepted";}else if($cb_status=="2"){echo "Bid Rejected";}else if($cb_status=="3"){echo "Paid / Conformation Pending";}else if($cb_status=="4"){echo "Payment Confirmed";}else if($cb_status=="5"){echo "Transport Selected";}?></P>

    <h6> Note: - Please wait for payment from <?php echo $c_name;?></h6>
	<hr>
<?php
}
if($cr_status==3){
?>
    <h5>Customer Details</h5>
    <p>Customer Type: <?php echo $c_type;?></P>
    <p>Customer Name: <?php echo $c_name;?></P>
    <p>Customer Mobile: <?php echo $c_mobile;?></P>
    <?php if($c_type=='Organization'){?>
    <p>Customer Contact Name: <?php echo $c_contactname;?></P>
    <?php }?>
    <p>Customer Gender: <?php echo $c_gender;?></P>
    <p>Customer Age: <?php echo $c_age;?></P>
    <p>Customer Street: <?php echo $c_street;?></P>
    <p>Customer City: <?php echo $c_city;?></P>
    <p>Customer State: <?php echo $c_street;?></P>
    <p>Customer Pincode: <?php echo $c_pincode;?></P>

    <h5>Bid Details</h5>
    <p>Bid ID: <?php echo $cb_id;?></P>
    <p>Bid Price: <?php echo $cb_bidprice;?></P>
    <p>Bid Total Amount: <?php echo $cb_bidprice*$cr_quantity;?></P>
    <p>Bid Status: <?php if($cb_status=="0"){echo "Bidding";}else if($cb_status=="1"){echo "Accepted";}else if($cb_status=="2"){echo "Bid Rejected";}else if($cb_status=="3"){echo "Paid / Conformation Pending";}else if($cb_status=="4"){echo "Payment Confirmed";}else if($cb_status=="5"){echo "Transport Selected";}?></P>

    <h5>Payment Details</h5>
    <p>Payment Type: <?php echo $cb_paytype;?></P>
    <p>Transcation ID: <?php echo $cb_tid;?></P>
    <p>Transcation Proof: <a href="../customers/<?php echo  $cb_tproof;?>" target="_blank">View RC</a></P>

	 <form method="post" action="confirmpayment.php?cr_id=<?php echo $cr_id; ?>" enctype="multipart/form-data">
        <button name="submit" type="submit"class="btn btn-dark text-monospace" style="background-color:#0c3823;"> Confirm Payment </button>
	    <hr>
     </form>
	<hr>
<?php
}
if($cr_status==4){
?>
    <h5>Customer Details</h5>
    <p>Customer Type: <?php echo $c_type;?></P>
    <p>Customer Name: <?php echo $c_name;?></P>
    <p>Customer Mobile: <?php echo $c_mobile;?></P>
    <?php if($c_type=='Organization'){?>
    <p>Customer Contact Name: <?php echo $c_contactname;?></P>
    <?php }?>
    <p>Customer Gender: <?php echo $c_gender;?></P>
    <p>Customer Age: <?php echo $c_age;?></P>
    <p>Customer Street: <?php echo $c_street;?></P>
    <p>Customer City: <?php echo $c_city;?></P>
    <p>Customer State: <?php echo $c_street;?></P>
    <p>Customer Pincode: <?php echo $c_pincode;?></P>

    <h5>Bid Details</h5>
    <p>Bid ID: <?php echo $cb_id;?></P>
    <p>Bid Price: <?php echo $cb_bidprice;?></P>
    <p>Bid Total Amount: <?php echo $cb_bidprice*$cr_quantity;?></P>
    <p>Bid Status: <?php if($cb_status=="0"){echo "Bidding";}else if($cb_status=="1"){echo "Accepted";}else if($cb_status=="2"){echo "Bid Rejected";}else if($cb_status=="3"){echo "Paid / Conformation Pending";}else if($cb_status=="4"){echo "Payment Confirmed";}else if($cb_status=="5"){echo "Transport Selected";}?></P>

    <h5>Payment Details</h5>
    <p>Payment Type: <?php echo $cb_paytype;?></P>
    <p>Transcation ID: <?php echo $cb_tid;?></P>
    <p>Transcation Proof: <a href="../customers/<?php echo  $cb_tproof;?>" target="_blank">View RC</a></P>

	<h6> Note: - Please wait for transport type selection by <?php echo $c_name;?></h6>
	<hr>
<?php
}
if($cr_status==5){
?>
    <h5>Customer Details</h5>
    <p>Customer Type: <?php echo $c_type;?></P>
    <p>Customer Name: <?php echo $c_name;?></P>
    <p>Customer Mobile: <?php echo $c_mobile;?></P>
    <?php if($c_type=='Organization'){?>
    <p>Customer Contact Name: <?php echo $c_contactname;?></P>
    <?php }?>
    <p>Customer Gender: <?php echo $c_gender;?></P>
    <p>Customer Age: <?php echo $c_age;?></P>
    <p>Customer Street: <?php echo $c_street;?></P>
    <p>Customer City: <?php echo $c_city;?></P>
    <p>Customer State: <?php echo $c_street;?></P>
    <p>Customer Pincode: <?php echo $c_pincode;?></P>

    <h5>Bid Details</h5>
    <p>Bid ID: <?php echo $cb_id;?></P>
    <p>Bid Price: <?php echo $cb_bidprice;?></P>
    <p>Bid Total Amount: <?php echo $cb_bidprice*$cr_quantity;?></P>
    <p>Bid Status: <?php if($cb_status=="0"){echo "Bidding";}else if($cb_status=="1"){echo "Accepted";}else if($cb_status=="2"){echo "Bid Rejected";}else if($cb_status=="3"){echo "Paid / Conformation Pending";}else if($cb_status=="4"){echo "Payment Confirmed";}else if($cb_status=="5"){echo "Transport Selected";}?></P>

    <h5>Payment Details</h5>
    <p>Payment Type: <?php echo $cb_paytype;?></P>
    <p>Transcation ID: <?php echo $cb_tid;?></P>
    <p>Transcation Proof: <a href="../customers/<?php echo  $cb_tproof;?>" target="_blank">View RC</a></P>

	<h5>Transport Details</h5>
    <p>Medium: <?php echo "Self Transport";?></P>

    <?php
    if($cb_status=="5"){ 
    $query = "select * from transportself where ts_cb_id=$cb_id";
    $result = mysqli_query($con,$query);

    while( $res=mysqli_fetch_assoc($result))
    {
        $ts_name =  $res['ts_name'];
        $ts_mobile =  $res['ts_mobile'];
        $ts_vehiclenumber =  $res['ts_vehiclenumber'];
    } ?>
    <p>Driver Name: <?php echo $ts_name;?></P>
    <p>Driver Mobile: <?php echo $ts_mobile;?></P>
    <p>Vehicle Number: <?php echo $ts_vehiclenumber;?></P>
    <?php } ?>



    
	<hr>
<?php
}
if($cr_status==6){
?>
    <h5>Customer Details</h5>
    <p>Customer Type: <?php echo $c_type;?></P>
    <p>Customer Name: <?php echo $c_name;?></P>
    <p>Customer Mobile: <?php echo $c_mobile;?></P>
    <?php if($c_type=='Organization'){?>
    <p>Customer Contact Name: <?php echo $c_contactname;?></P>
    <?php }?>
    <p>Customer Gender: <?php echo $c_gender;?></P>
    <p>Customer Age: <?php echo $c_age;?></P>
    <p>Customer Street: <?php echo $c_street;?></P>
    <p>Customer City: <?php echo $c_city;?></P>
    <p>Customer State: <?php echo $c_street;?></P>
    <p>Customer Pincode: <?php echo $c_pincode;?></P>

    <h5>Bid Details</h5>
    <p>Bid ID: <?php echo $cb_id;?></P>
    <p>Bid Price: <?php echo $cb_bidprice;?></P>
    <p>Bid Total Amount: <?php echo $cb_bidprice*$cr_quantity;?></P>
    <p>Bid Status: <?php if($cb_status=="0"){echo "Bidding";}else if($cb_status=="1"){echo "Accepted";}else if($cb_status=="2"){echo "Bid Rejected";}else if($cb_status=="3"){echo "Paid / Conformation Pending";}else if($cb_status=="4"){echo "Payment Confirmed";}else if($cb_status=="5"){echo "Transport Selected";}?></P>

    <h5>Payment Details</h5>
    <p>Payment Type: <?php echo $cb_paytype;?></P>
    <p>Transcation ID: <?php echo $cb_tid;?></P>
    <p>Transcation Proof: <a href="../customers/<?php echo  $cb_tproof;?>" target="_blank">View RC</a></P>

	<h5>Transport Details</h5>
    <p>Medium: <?php echo "Find A Truck";?></P>

    <h6> Note: - Please wait for transport some time while customer is finding a truck</h6>

	<hr>
<?php
}
if($cr_status==7){
    ?>
        <h5>Customer Details</h5>
        <p>Customer Type: <?php echo $c_type;?></P>
        <p>Customer Name: <?php echo $c_name;?></P>
        <p>Customer Mobile: <?php echo $c_mobile;?></P>
        <?php if($c_type=='Organization'){?>
        <p>Customer Contact Name: <?php echo $c_contactname;?></P>
        <?php }?>
        <p>Customer Gender: <?php echo $c_gender;?></P>
        <p>Customer Age: <?php echo $c_age;?></P>
        <p>Customer Street: <?php echo $c_street;?></P>
        <p>Customer City: <?php echo $c_city;?></P>
        <p>Customer State: <?php echo $c_street;?></P>
        <p>Customer Pincode: <?php echo $c_pincode;?></P>
    
        <h5>Bid Details</h5>
        <p>Bid ID: <?php echo $cb_id;?></P>
        <p>Bid Price: <?php echo $cb_bidprice;?></P>
        <p>Bid Total Amount: <?php echo $cb_bidprice*$cr_quantity;?></P>
        <p>Bid Status: <?php if($cb_status=="0"){echo "Bidding";}else if($cb_status=="1"){echo "Accepted";}else if($cb_status=="2"){echo "Bid Rejected";}else if($cb_status=="3"){echo "Paid / Conformation Pending";}else if($cb_status=="4"){echo "Payment Confirmed";}else if($cb_status=="5"){echo "Transport Selected";}?></P>
    
        <h5>Payment Details</h5>
        <p>Payment Type: <?php echo $cb_paytype;?></P>
        <p>Transcation ID: <?php echo $cb_tid;?></P>
        <p>Transcation Proof: <a href="../customers/<?php echo  $cb_tproof;?>" target="_blank">View RC</a></P>
    
        <h5>Transport Details</h5>
        <p>Medium: <?php echo "Find A Truck";?></P>
    
        <h6> Note: - Please wait for transport some time while customer is finding a truck</h6>
    
        <hr>
<?php
}
if($cr_status==8){
    ?>

        <h5>Customer Details</h5>
        <p>Customer Type: <?php echo $c_type;?></P>
        <p>Customer Name: <?php echo $c_name;?></P>
        <p>Customer Mobile: <?php echo $c_mobile;?></P>
        <?php if($c_type=='Organization'){?>
        <p>Customer Contact Name: <?php echo $c_contactname;?></P>
        <?php }?>
        <p>Customer Gender: <?php echo $c_gender;?></P>
        <p>Customer Age: <?php echo $c_age;?></P>
        <p>Customer Street: <?php echo $c_street;?></P>
        <p>Customer City: <?php echo $c_city;?></P>
        <p>Customer State: <?php echo $c_street;?></P>
        <p>Customer Pincode: <?php echo $c_pincode;?></P>
    
        <h5>Bid Details</h5>
        <p>Bid ID: <?php echo $cb_id;?></P>
        <p>Bid Price: <?php echo $cb_bidprice;?></P>
        <p>Bid Total Amount: <?php echo $cb_bidprice*$cr_quantity;?></P>
        <p>Bid Status: <?php if($cb_status=="0"){echo "Bidding";}else if($cb_status=="1"){echo "Accepted";}else if($cb_status=="2"){echo "Bid Rejected";}else if($cb_status=="3"){echo "Paid / Conformation Pending";}else if($cb_status=="4"){echo "Payment Confirmed";}else if($cb_status=="5"){echo "Transport Selected";}?></P>
    
        <h5>Payment Details</h5>
        <p>Payment Type: <?php echo $cb_paytype;?></P>
        <p>Transcation ID: <?php echo $cb_tid;?></P>
        <p>Transcation Proof: <a href="../customers/<?php echo  $cb_tproof;?>" target="_blank">View RC</a></P>
    
        <p>Medium: <?php echo "Find A Truck";?></P>
        <p>Transport ID: <?php echo $tb_id;?></P>
        <p>Transport Bid: <?php echo $tb_bid;?></P>
        <p>Transport Status: <?php echo $tb_status;?></P>

        <h5>Driver Details</h5>
        <p>Driver Name: <?php echo $d_name;?></P>
        <p>Driver Mobile: <?php echo $d_mobile;?></P>
        <p>Driver Age: <?php echo $d_age;?></P>
        <p>Driver Gender: <?php echo $d_gender;?></P>
        <p>Driver License Number: <?php echo $d_dlnumber;?></P>
        <p>Vehicle Number: <?php echo $d_vehiclenumber;?></P>
        <p>Location: <a href="https://www.google.com/maps/@<?php echo  $d_lat;?>,<?php echo  $d_long;?>,18z" target="_blank">View Location</a></p>
    
        <hr>
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