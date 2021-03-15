<?php

include('session-script.php');
$res = $_SESSION["sessionid"];
$a_name= $res;
if(!isset($_SESSION['login_admin'])){
header("location: login.php"); // Redirecting To Profile Page
}
?> 

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Profile View</title>
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
                    <li class="nav-item mx-0 mx-lg-1"><a href="updateprofile.php?a_name=<?php echo $a_name; ?>"><button class="btn btn-dark text-monospace" data-bs-hover-animate="pulse" type="button" style="margin: 10px;background: rgb(255,255,255);color: #0c3823;margin-left: 0;border-radius: 10px;">View Profile</button></a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a href="../admin/logout-script.php"><button  class="btn btn-dark text-monospace" data-bs-hover-animate="pulse" type="button" style="margin: 10px;background: rgb(255,255,255);color: #0c3823;margin-left: 0;border-radius: 10px;">Log Out</button></a></li>

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


   $c_mobile = $_GET['c_mobile'];
   $query = " select * from customer where c_mobile=".$c_mobile."";
   $result = mysqli_query($con,$query);

   while( $res=mysqli_fetch_assoc($result))
   {
       $c_id =  $res['c_id'];
       $c_name =  $res['c_name'];
       $c_contactname =  $res['c_contactname'];
       $c_gender =  $res['c_gender'];
       $c_age =  $res['c_age'];
       $c_street =  $res['c_street'];
       $c_city =  $res['c_city'];
       $c_state =  $res['c_state'];
       $c_pincode =  $res['c_pincode'];
       $c_type =  $res['c_type'];
       $c_registration =  $res['c_registration'];
       $c_aadhar =  $res['c_aadhar'];
       $c_aadharpdf =  $res['c_aadharpdf'];
       $c_pan =  $res['c_pan'];
       $c_panpdf =  $res['c_panpdf'];
       $c_photo =  $res['c_photo'];
       $c_approve =  $res['c_approve'];
   }
?>
    <div class="features-boxed">
        <div class="container" style="background: #ffffff;">
            <div class="intro" style="background: #0c3823;margin-top: 120px;margin-bottom: 30px;">
                <h2 class="text-center" data-aos="fade" style="color: rgb(255,255,255);padding: 30px;margin-bottom: 0px;">Profile - <?php echo "$c_name"?></h2>
            </div>
        </div>
    </div>


    <div class="container">

    <?php
    if($c_type=="wholesaler")
    {
    ?>
    <p><img src="../customers/<?php echo  $c_photo;?>" width="200" height="240"></p>
    <p>Type: <?php echo "$c_type"?></p>
    <p>ID: <?php echo "$c_id"?></p>
    <p>Name: <?php echo "$c_name"?></p>
    <p>Mobile: <?php echo "$c_mobile"?></p>
    <p>Gender: <?php echo "$c_gender"?></p>
    <p>Age: <?php echo "$c_age"?></p>
    <p>Street: <?php echo "$c_street"?></p>
    <p>City: <?php echo "$c_city"?></p>
    <p>State: <?php echo "$c_state"?></p>
    <p>Pincode: <?php echo "$c_pincode"?></p>
    <p>Aadhar: <?php echo "$c_aadhar"?></p>
    <p>Aadhar PDF: <button class="btn btn-dark text-monospace"><a href="../customers/<?php echo  $c_aadharpdf;?>" target="_blank">View Aadhar PDF</a></button></p>
    <p>PAN: <?php echo "$c_pan"?></p>
    <p>PAN PDF: <button class="btn btn-dark text-monospace"><a href="../customers/<?php echo  $c_panpdf;?>" target="_blank">View PAN PDF</a></button></p>
    <p>Status: <?php if($c_approve=="0"){echo "No Action";}else if($c_approve=="1"){echo " Accepted";}else if($c_approve=="2"){echo "Review";}else if($c_approve=="3"){echo "Rejected";}else if($c_approve=="4"){echo "Resubmitted";}  ?></p>
    <?php
    }
    if($c_type=="organization")
    {
    ?>
    <p><img src="../customers/<?php echo  $c_photo;  ?>" width="200" height="240"></p>
    <p>Type: <?php echo "$c_type"?></p>
    <p>ID: <?php echo "$c_id"?></p>
    <p>Name: <?php echo "$c_name"?></p>
    <p>Mobile: <?php echo "$c_mobile"?></p>
    <p>Contact Person Name: <?php echo "$c_contactname"?></p>
    <p>Contact Person Gender: <?php echo "$c_gender"?></p>
    <p> Contact Person Age: <?php echo "$c_age"?></p>
    <p>Street: <?php echo "$c_street"?></p>
    <p>City: <?php echo "$c_city"?></p>
    <p>State: <?php echo "$c_state"?></p>
    <p>Pincode: <?php echo "$c_pincode"?></p>
    <p>Registration Document: <button class="btn btn-dark text-monospace"><a href="../customers/<?php echo  $c_registration;?>" target="_blank">View Document PDF</a></button></p>
    <p>PAN: <?php echo "$c_pan"?></p>
    <p>PAN PDF: <button class="btn btn-dark text-monospace"><a href="../customers/<?php echo  $c_panpdf;?>" target="_blank">View PAN PDF</a></button></p>
    <p>Status: <?php if($c_approve=="0"){echo "No Action";}else if($c_approve=="1"){echo " Accepted";}else if($c_approve=="2"){echo "Review";}else if($c_approve=="3"){echo "Rejected";}else if($c_approve=="4"){echo "Resubmitted";}  ?></p>
    <?php
    }
    ?>
    
    <form action="statuscustomer.php?c_mobile=<?php echo $c_mobile; ?>" method="post">
    <?php
    if($c_approve==0){
    ?>
     <td data-label="Profile"> <button class="btn btn-dark text-monospace" style="background-color:#0c3823;"  name="accept">Accept</button> </td>
     <td data-label="Profile"> <button class="btn btn-dark text-monospace" style="background-color:#968b0c;"  name="review">Review</button> </td>
     <td data-label="Profile"> <button class="btn btn-dark text-monospace" style="background-color:#780611;"  name="reject">Reject</button> </td>
     <hr>
    <?php
    }
    if($c_approve==1){
    ?>
     <td data-label="Profile"> <button class="btn btn-dark text-monospace" style="background-color:#968b0c;"  name="review">Review</button> </td>
     <td data-label="Profile"> <button class="btn btn-dark text-monospace" style="background-color:#780611;"  name="reject">Reject</button> </td>
     <hr>
    <?php
    }
    if($c_approve==2){
    ?>
    <td data-label="Profile"> <button class="btn btn-dark text-monospace" style="background-color:#0c3823;"  name="accept">Accept</button> </td>
     <td data-label="Profile"> <button class="btn btn-dark text-monospace" style="background-color:#780611;"  name="reject">Reject</button> </td>
     <hr>
    <?php
    }
    if($c_approve==3){
    ?>
    <td data-label="Profile"> <button class="btn btn-dark text-monospace" style="background-color:#0c3823;"  name="accept">Accept</button> </td>
     <td data-label="Profile"> <button class="btn btn-dark text-monospace" style="background-color:#968b0c;"  name="review">Review</button> </td>
     <hr>
    <?php
    }
    if($c_approve==4){
    ?>
    <td data-label="Profile"> <button class="btn btn-dark text-monospace" style="background-color:#0c3823;"  name="accept">Accept</button> </td>
     <td data-label="Profile"> <button class="btn btn-dark text-monospace" style="background-color:#968b0c;"  name="review">Review</button> </td>
     <td data-label="Profile"> <button class="btn btn-dark text-monospace" style="background-color:#780611;"  name="reject">Reject</button> </td>
    <hr>
    <?php
    }
    ?>
    </form>
    </div>

    
    <div class="footer-dark" style="background: rgb(12,56,35);">
        <footer>
            <div class="container">
                <p style="text-align: center;"><strong>© 2020 TapShip.&nbsp; All rights reserved.</strong><br></p>
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