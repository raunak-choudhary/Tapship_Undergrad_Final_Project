<?php

include('session-script.php');
$res = $_SESSION["sessionid"];
$f_mobile = $res;
if (!isset($_SESSION['login_farmer'])) {
    header("location: login.php"); // Redirecting To Profile Page
}
error_reporting(0);


$con = mysqli_connect("localhost", "root", "", "tapship");
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Add New Crop</title>
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
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger"
                            data-bs-hover-animate="pulse" href="index.php"
                            style="filter: contrast(100%) grayscale(0%) hue-rotate(0deg) invert(0%) sepia(0%);">DASHBOARD</a>
                    </li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger"
                            data-bs-hover-animate="pulse" href="../about.php">ABOUT</a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger"
                            data-bs-hover-animate="pulse" href="../faq.php">FAQ</a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a href="../farmers/profile.php"><button
                                class="btn btn-dark text-monospace" data-bs-hover-animate="pulse" type="button"
                                style="margin: 10px;background: rgb(255,255,255);color: #0c3823;margin-left: 0;border-radius: 10px;">View
                                Profile</button></a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a href="../farmers/logout-script.php"><button
                                class="btn btn-dark text-monospace" data-bs-hover-animate="pulse" type="button"
                                style="margin: 10px;background: rgb(255,255,255);color: #0c3823;margin-left: 0;border-radius: 10px;">Log
                                Out</button></a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="features-boxed">
        <div class="container-fluid" style="background: #ffffff;">
            <div class="intro" style="background: #0c3823;margin-top: 120px;margin-bottom: 30px; max-width:1000px;">
                <h2 class="text-center" data-aos="fade"
                    style="color: rgb(255,255,255);padding: 30px;margin-bottom: 0px;">Add New Crop</h2>
            </div>
        </div>
    </div>
    <div class="login-clean" style="padding: 0px;background: rgb(255,255,255);margin-top: 30px;">
        <form method="post" action="addcrop-script.php" enctype="multipart/form-data"
            style="background: #0c3823;margin-bottom: 40px;">

            <h5 style="color:#fff;">Crop Type</h5>
            <div class="form-group">
                <select class="form-control" id="crop_type" name="crop_type" required onchange="fetchCropData(this);">
                    <option disabled selected value="">-- Select Crop Type --</option>
                    <?php
                    $records = mysqli_query($con, "SELECT DISTINCT cro_type From cropdetails");  // Use select query here 

                    while ($data = mysqli_fetch_array($records)) {
                        echo "<option value='" . $data['cro_type'] . "'>" . $data['cro_type'] . "</option>";  // displaying data in option menu
                    }
                    ?>
                </select>
            </div>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script>
            function fetchCropData(cropType) {
                $.ajax({
                    url: 'crop-data-fetch-back.php',
                    method: "POST",
                    data: "action=crop-name&croptype=" + cropType.value,
                    success: function(data) {
                        $('#cropNameWrapper').html(data);
                    }
                })
            }

            function fetchCropDataModal(cropType) {
                $.ajax({
                    url: 'crop-data-fetch-back.php',
                    method: "POST",
                    data: "action=crop-name-modal&croptype=" + cropType,
                    success: function(data) {
                        $('#cropNameModalWrapper').html(data);
                        $('#myModal').modal('show');
                    }
                })
            }

            function fetchCropMspModal(cropType) {
                $.ajax({
                    url: 'crop-data-fetch-back.php',
                    method: "POST",
                    data: "action=crop-msp-modal&croptype=" + cropType + "&cropname=" + $('#cropnameModal')
                        .val(),
                    success: function(data) {
                        $('#mspResult').html(data);

                    }
                })
            }
            </script>

            <div class="form-group" id="cropNameWrapper">
            </div>


            <h5 style="color:#fff;">Quantity (in kgs.)</h5>
            <div class="form-group"><input class="form-control" id="crop_quantity" type="number" name="crop_quantity"
                    placeholder="Enter Quantity in Kilograms" required="" autofocus=""></div>

            <h5 style="color:#fff;">Minimum Expected Price (per kgs.)</h5>
            <div class="form-group"><input class="form-control" id="crop_mep" type="number" name="crop_mep"
                    placeholder="Minimum Expected Price" required="" autofocus=""></div>

            <div class="text-warning" id="errorshow1"></div>

            <h5 style="color:#fff;">Image - 01</h5>
            <div class="form-group"><input class="form-control" id="crop_img1" type="file"
                    accept="image/jpeg, image/jpg, image/png" name="crop_img1" placeholder="Select Image" required=""
                    autofocus=""></div>

            <h5 style="color:#fff;">Image - 02</h5>
            <div class="form-group"><input class="form-control" id="crop_img2" type="file"
                    accept="image/jpeg, image/jpg, image/png" name="crop_img2" placeholder="Select Image" required=""
                    autofocus=""></div>

            <h5 style="color:#fff;">Image - 03</h5>
            <div class="form-group"><input class="form-control" id="crop_img3" type="file"
                    accept="image/jpeg, image/jpg, image/png" name="crop_img3" placeholder="Select Image" required=""
                    autofocus=""></div>

            <input name="submit" class="btn btn-primary btn-block" type="submit" value=" Add Crop ">

            <div class="text-warning" id="errorshow2"></div>
        </form>

        <div id="cropNameModalWrapper"></div>

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