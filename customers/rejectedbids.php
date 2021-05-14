<?php

include('session-script.php');
$res = $_SESSION["sessionid"];
$c_mobile = $res;
if (!isset($_SESSION['login_customer'])) {
    header("location: login.php"); // Redirecting To Profile Page
}
error_reporting(0);


 $con = mysqli_connect("b3bu9bb23ikjqsiv8aku-mysql.services.clever-cloud.com", "uodltp4afruoomkk", "WAniOzDcPXxfNZTCLGnl", "b3bu9bb23ikjqsiv8aku");
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Rejected Bids</title>
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
    <link rel="stylesheet" href="../assets/css/table-style.css" />
</head>

<body id="page-top">
    <nav class="navbar navbar-light navbar-expand-lg fixed-top text-uppercase" id="mainNav" style="background: #0c3823;">
        <div class="container-fluid">
            <a class="navbar-brand js-scroll-trigger" data-bs-hover-animate="pulse" href="../index.php" style="font-family: Montserrat, sans-serif;">TAPSHIP</a>
            <button data-toggle="collapse" data-target="#navbarResponsive" class="navbar-toggler navbar-toggler-right text-uppercase rounded" data-aos="fade" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation" style="background: #fff;"><i class="fa fa-bars" style="color: #0c3823;;"></i></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" data-bs-hover-animate="pulse" href="index.php" style="filter: contrast(100%) grayscale(0%) hue-rotate(0deg) invert(0%) sepia(0%);">DASHBOARD</a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" data-bs-hover-animate="pulse" href="../about.php">ABOUT</a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" data-bs-hover-animate="pulse" href="../faq.php">FAQ</a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a href="../customers/profile.php"><button class="btn btn-dark text-monospace" data-bs-hover-animate="pulse" type="button" style="margin: 10px;background: rgb(255,255,255);color: #0c3823;margin-left: 0;border-radius: 10px;">View Profile</button></a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a href="../customers/logout-script.php"><button class="btn btn-dark text-monospace" data-bs-hover-animate="pulse" type="button" style="margin: 10px;background: rgb(255,255,255);color: #0c3823;margin-left: 0;border-radius: 10px;">Log Out</button></a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="features-boxed">
        <div class="container-fluid" style="background: #ffffff;">
            <div class="intro" style="background: #0c3823;margin-top: 120px;margin-bottom: 30px;">
                <h2 class="text-center" data-aos="fade" style="color: rgb(255,255,255);padding: 30px;margin-bottom: 0px;">Rejected Bids</h2>
            </div>
        </div>
    </div>


    <table id="tabledata" class=" table table-striped table-hover table-bordered">

        <tr class="bg-dark text-white text-center" style="display:none;">
            <thead>
                <th>Sr. No.</th>
                <th> Bid ID </th>
                <th> Crop Name </th>
                <th> Crop Qunatity </th>
                <th> Crop MEP </th>
                <th> Crop MSP </th>
                <th> Farmer Name </th>
                <th> Farmer Mobile</th>
                <th> Farmer City</th>
                <th> Bid Price (per kgs.)</th>
                <th> Crop Status </th>
                <th> View</th>
            </thead>
        </tr>

        <?php

         $con = mysqli_connect("b3bu9bb23ikjqsiv8aku-mysql.services.clever-cloud.com", "uodltp4afruoomkk", "WAniOzDcPXxfNZTCLGnl", "b3bu9bb23ikjqsiv8aku");
        


        $q = "SELECT cd.cro_name, cd.cro_type, cd.cro_msp, cs.cr_quantity, cs.cr_mep, cs.cr_date, cs.cr_status, f.f_name, f.f_mobile, f.f_city, cb.cb_bidprice, cb.cb_cr_id, cb.cb_status, cb.cb_id FROM cropdetails cd, cropsale cs, farmer f, cropbid cb,customer c where cd.cro_id=cs.cr_cro_id AND cb.cb_c_mobile=c.c_mobile AND cb.cb_cr_id=cs.cr_id AND cb.cb_f_mobile=f.f_mobile AND cb.cb_status in (2,13) AND cb.cb_c_mobile=$c_mobile ORDER BY cb.cb_id DESC";
        $query = mysqli_query($con, $q);
        $c = 1;

        while ($res = mysqli_fetch_array($query)) {
        ?>
            <tr class="text-center">
                <td data-label="Sr. No."> <?php echo $c;
                                            $c += 1 ?> </td>
                <td data-label="Bid ID"> <?php echo $res['cb_id']; ?> </td>
                <td data-label="Crop Name"> <?php echo $res['cro_name']; ?> </td>
                <td data-label="Crop Quantity"> <?php echo $res['cr_quantity'], ' Kgs'; ?> </td>
                <td data-label="Crop MEP"> <?php echo '₹ ', $res['cr_mep']; ?> </td>
                <td data-label="Crop MSP"> <?php echo '₹ ', $res['cro_msp']; ?> </td>
                <td data-label="Farmer Name"> <?php echo $res['f_name'];  ?> </td>
                <td data-label="Farmer Mobile"> <?php echo $res['f_mobile'];  ?> </td>
                <td data-label="Farmer City"> <?php echo $res['f_city'];  ?> </td>
                <td data-label="Crop Status"> <?php if($res['cro_msp']==2){ echo 'Bid Rejected';}else{ ?><h6 style="background-color:red;padding:5px; color:white;">Crop Deleted</h6><?php } ?> </td>
                <td data-label="Bid Price"> <?php echo '₹ ', $res['cb_bidprice'];  ?> </td>

                <td data-label="View Details"> <button class="btn" style="background-color:#0c3823;"><a href="viewbiddetails.php?cb_id=<?php echo $res['cb_id']; ?>" class="text-white"> View </a> </button> </td>
            </tr>

        <?php
        }
        ?>

    </table>


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