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

<script>
    function yesnoCheck(that) {
        if (that.value == "Fruits") {
            document.getElementById("iffruits").style.display = "block";
            document.getElementById("ifvegitables").style.display = "none";
            document.getElementById("ifgrains").style.display = "none";
            document.getElementById("iffeedcrops").style.display = "none";
            document.getElementById("iffibrecrops").style.display = "none";
            document.getElementById("ifoilcrops").style.display = "none";
            document.getElementById("ifflowers").style.display = "none";
            document.getElementById("ifindustrialcrops").style.display = "none";

            document.getElementById("ifvegitables").required = false;
            document.getElementById("ifgrains").required = false;
            document.getElementById("iffeedcrops").required = false;
            document.getElementById("iffibrecrops").required = false;
            document.getElementById("ifoilcrops").required = false;
            document.getElementById("ifflowers").required = false;
            document.getElementById("ifindustrialcrops").required = false;

        } else if (that.value == "Vegitables") {
            document.getElementById("iffruits").style.display = "none";
            document.getElementById("ifvegitables").style.display = "block";
            document.getElementById("ifgrains").style.display = "none";
            document.getElementById("iffeedcrops").style.display = "none";
            document.getElementById("iffibrecrops").style.display = "none";
            document.getElementById("ifoilcrops").style.display = "none";
            document.getElementById("ifflowers").style.display = "none";
            document.getElementById("ifindustrialcrops").style.display = "none";

            document.getElementById("iffruits").required = false;
            document.getElementById("ifgrains").required = false;
            document.getElementById("iffeedcrops").required = false;
            document.getElementById("iffibrecrops").required = false;
            document.getElementById("ifoilcrops").required = false;
            document.getElementById("ifflowers").required = false;
            document.getElementById("ifindustrialcrops").required = false;

        } else if (that.value == "Grains") {
            document.getElementById("iffruits").style.display = "none";
            document.getElementById("ifvegitables").style.display = "none";
            document.getElementById("ifgrains").style.display = "block";
            document.getElementById("iffeedcrops").style.display = "none";
            document.getElementById("iffibrecrops").style.display = "none";
            document.getElementById("ifoilcrops").style.display = "none";
            document.getElementById("ifflowers").style.display = "none";
            document.getElementById("ifindustrialcrops").style.display = "none";

            document.getElementById("iffruits").required = false;
            document.getElementById("ifvegitables").required = false;
            document.getElementById("iffeedcrops").required = false;
            document.getElementById("iffibrecrops").required = false;
            document.getElementById("ifoilcrops").required = false;
            document.getElementById("ifflowers").required = false;
            document.getElementById("ifindustrialcrops").required = false;

        } else if (that.value == "Feed Crops") {
            document.getElementById("iffruits").style.display = "none";
            document.getElementById("ifvegitables").style.display = "none";
            document.getElementById("ifgrains").style.display = "none";
            document.getElementById("iffeedcrops").style.display = "block";
            document.getElementById("iffibrecrops").style.display = "none";
            document.getElementById("ifoilcrops").style.display = "none";
            document.getElementById("ifflowers").style.display = "none";
            document.getElementById("ifindustrialcrops").style.display = "none";

            document.getElementById("iffruits").required = false;
            document.getElementById("ifvegitables").required = false;
            document.getElementById("ifgrains").required = false;
            document.getElementById("iffibrecrops").required = false;
            document.getElementById("ifoilcrops").required = false;
            document.getElementById("ifflowers").required = false;
            document.getElementById("ifindustrialcrops").required = false;

        } else if (that.value == "Fibre Crops") {
            document.getElementById("iffruits").style.display = "none";
            document.getElementById("ifvegitables").style.display = "none";
            document.getElementById("ifgrains").style.display = "none";
            document.getElementById("iffeedcrops").style.display = "block";
            document.getElementById("iffeedcrops").style.display = "none";
            document.getElementById("ifoilcrops").style.display = "none";
            document.getElementById("ifflowers").style.display = "none";
            document.getElementById("ifindustrialcrops").style.display = "none";

            document.getElementById("iffruits").required = false;
            document.getElementById("ifvegitables").required = false;
            document.getElementById("ifgrains").required = false;
            document.getElementById("iffeedcrops").required = false;
            document.getElementById("ifoilcrops").required = false;
            document.getElementById("ifflowers").required = false;
            document.getElementById("ifindustrialcrops").required = false;

        } else if (that.value == "Oil Crops") {
            document.getElementById("iffruits").style.display = "none";
            document.getElementById("ifvegitables").style.display = "none";
            document.getElementById("ifgrains").style.display = "none";
            document.getElementById("iffeedcrops").style.display = "none";
            document.getElementById("iffibrecrops").style.display = "none";
            document.getElementById("ifoilcrops").style.display = "block";
            document.getElementById("ifflowers").style.display = "none";
            document.getElementById("ifindustrialcrops").style.display = "none";

            document.getElementById("iffruits").required = false;
            document.getElementById("ifvegitables").required = false;
            document.getElementById("ifgrains").required = false;
            document.getElementById("iffeedcrops").required = false;
            document.getElementById("iffibrecrops").required = false;
            document.getElementById("ifflowers").required = false;
            document.getElementById("ifindustrialcrops").required = false;

        } else if (that.value == "Flowers") {
            document.getElementById("iffruits").style.display = "none";
            document.getElementById("ifvegitables").style.display = "none";
            document.getElementById("ifgrains").style.display = "none";
            document.getElementById("iffeedcrops").style.display = "none";
            document.getElementById("iffibrecrops").style.display = "none";
            document.getElementById("ifoilcrops").style.display = "none";
            document.getElementById("ifflowers").style.display = "block";
            document.getElementById("ifindustrialcrops").style.display = "none";

            document.getElementById("iffruits").required = false;
            document.getElementById("ifvegitables").required = false;
            document.getElementById("ifgrains").required = false;
            document.getElementById("iffeedcrops").required = false;
            document.getElementById("iffibrecrops").required = false;
            document.getElementById("ifoilcrops").required = false;
            document.getElementById("ifindustrialcrops").required = false;

        } else if (that.value == "Industrial Crop") {
            document.getElementById("iffruits").style.display = "none";
            document.getElementById("ifvegitables").style.display = "none";
            document.getElementById("ifgrains").style.display = "none";
            document.getElementById("iffeedcrops").style.display = "none";
            document.getElementById("iffibrecrops").style.display = "none";
            document.getElementById("ifoilcrops").style.display = "none";
            document.getElementById("ifflowers").style.display = "none";
            document.getElementById("ifindustrialcrops").style.display = "block";

            document.getElementById("iffruits").required = false;
            document.getElementById("ifvegitables").required = false;
            document.getElementById("ifgrains").required = false;
            document.getElementById("iffeedcrops").required = false;
            document.getElementById("iffibrecrops").required = false;
            document.getElementById("ifoilcrops").required = false;
            document.getElementById("ifflowers").required = false;

        } else {
            document.getElementById("iffruits").style.display = "none";
            document.getElementById("ifvegitables").style.display = "none";
            document.getElementById("ifgrains").style.display = "none";
            document.getElementById("iffeedcrops").style.display = "none";
            document.getElementById("iffibrecrops").style.display = "none";
            document.getElementById("ifoilcrops").style.display = "none";
            document.getElementById("ifflowers").style.display = "none";
            document.getElementById("ifindustrialcrops").style.display = "none";
            document.getElementById("no1").style.display = "none";
        }
    }

    function mspCheck(that) {
        if (that.value == "Mango") {
            <?php
            $crop_type = "Fruits";
            $crop_name = "Mango";
            $sql = "Select * from cropdetails where cro_type='$crop_type' and cro_name='$crop_name'";
            $query = mysqli_query($con, $sql);
            while ($res = mysqli_fetch_array($query)) {
                $crop_msp = $res['cro_msp'];
            }
            ?>
            document.getElementById("mspshow").innerHTML = "<p>MSP value of <?php echo $crop_name; ?> is: Rs. <?php echo $crop_msp; ?></p>";
        }
        else if (that.value == "Banana") {
            <?php
            $crop_type = "Fruits";
            $crop_name = "Banana";
            $sql = "Select * from cropdetails where cro_type='$crop_type' and cro_name='$crop_name'";
            $query = mysqli_query($con, $sql);
            while ($res = mysqli_fetch_array($query)) {
                $crop_msp = $res['cro_msp'];
            }
            ?>
            document.getElementById("mspshow").innerHTML = "<p>MSP value of <?php echo $crop_msp; ?> is: Rs. <?php echo $crop_msp; ?></p>";
        }
        else if (that.value == "Tomato") {
            <?php
            $crop_type = "Vegitables";
            $crop_name = "Tomato";
            $sql = "Select * from cropdetails where cro_type='$crop_type' and cro_name='$crop_name'";
            $query = mysqli_query($con, $sql);
            while ($res = mysqli_fetch_array($query)) {
                $crop_msp = $res['cro_msp'];
            }
            ?>
            document.getElementById("mspshow").innerHTML = "<p>MSP value of <?php echo $crop_msp; ?> is: Rs. <?php echo $crop_msp; ?></p>";
        }
        else if (that.value == "Carrot") {
            <?php
            $crop_type = "Vegitables";
            $crop_name = "Carrot";
            $sql = "Select * from cropdetails where cro_type='$crop_type' and cro_name='$crop_name'";
            $query = mysqli_query($con, $sql);
            while ($res = mysqli_fetch_array($query)) {
                $crop_msp = $res['cro_msp'];
            }
            ?>
            document.getElementById("mspshow").innerHTML = "<p>MSP value of <?php echo $crop_msp; ?> is: Rs. <?php echo $crop_msp; ?></p>";
        }
        else if (that.value == "Rice") {
            <?php
            $crop_type = "Feed Crops";
            $crop_name = "Rice";
            $sql = "Select * from cropdetails where cro_type='$crop_type' and cro_name='$crop_name'";
            $query = mysqli_query($con, $sql);
            while ($res = mysqli_fetch_array($query)) {
                $crop_msp = $res['cro_msp'];
            }
            ?>
            document.getElementById("mspshow").innerHTML = "<p>MSP value of <?php echo $crop_msp; ?> is: Rs. <?php echo $crop_msp; ?></p>";
        }
    }
</script>

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
                    <li class="nav-item mx-0 mx-lg-1"><a href="../farmers/profile.php"><button class="btn btn-dark text-monospace" data-bs-hover-animate="pulse" type="button" style="margin: 10px;background: rgb(255,255,255);color: #0c3823;margin-left: 0;border-radius: 10px;">View Profile</button></a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a href="../farmers/logout-script.php"><button class="btn btn-dark text-monospace" data-bs-hover-animate="pulse" type="button" style="margin: 10px;background: rgb(255,255,255);color: #0c3823;margin-left: 0;border-radius: 10px;">Log Out</button></a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="features-boxed">
        <div class="container-fluid" style="background: #ffffff;">
            <div class="intro" style="background: #0c3823;margin-top: 120px;margin-bottom: 30px;">
                <h2 class="text-center" data-aos="fade" style="color: rgb(255,255,255);padding: 30px;margin-bottom: 0px;">Add New Crop</h2>
            </div>
        </div>
    </div>
    <div class="login-clean" style="padding: 0px;background: rgb(255,255,255);margin-top: 30px;">
        <form method="post" action="addcrop-script.php" enctype="multipart/form-data" style="background: #0c3823;margin-bottom: 40px;">

            <h5 style="color:#fff;">Crop Type</h5>
            <div class="form-group">
                <select class="form-control" id="crop_type" name="crop_type" required onchange="yesnoCheck(this);">
                    <option disabled selected value="">-- Select Crop Type --</option>
                    <?php
                    $records = mysqli_query($con, "SELECT DISTINCT cro_type From cropdetails");  // Use select query here 

                    while ($data = mysqli_fetch_array($records)) {
                        echo "<option value='" . $data['cro_type'] . "'>" . $data['cro_type'] . "</option>";  // displaying data in option menu
                    }
                    ?>
                </select>
            </div>


            <div class="form-group" id="ifvegitables" style="display: none;">
                <h5 style="color:#fff;">Crop Name</h5>
                <select class="form-control" id="crop_vegitable" name="crop_name" onchange="mspCheck(this);">
                    <option disabled selected value="">-- Select Vegitable Name --</option>
                    <?php
                    $records = mysqli_query($con, "SELECT  cro_name From cropdetails where cro_type='Vegitables'");  // Use select query here 

                    while ($data = mysqli_fetch_array($records)) {
                        echo "<option value='" . $data['cro_name'] . "'>" . $data['cro_name'] . "</option>";  // displaying data in option menu
                    }
                    ?>
                </select>
            </div>

            <div class="form-group" id="iffruits" style="display: none;">
                <h5 style="color:#fff;">Crop Name</h5>
                <select class="form-control" id="crop_fruit" name="crop_name" onchange="mspCheck(this);">
                    <option disabled selected value="">-- Select Fruit Name --</option>
                    <?php
                    $records = mysqli_query($con, "SELECT cro_name From cropdetails where cro_type='Fruits'");  // Use select query here 

                    while ($data = mysqli_fetch_array($records)) {
                        echo "<option value='" . $data['cro_name'] . "'>" . $data['cro_name'] . "</option>";  // displaying data in option menu
                    }
                    ?>
                </select>
            </div>


            <div class="form-group" id="ifgrains" style="display: none;">
                <h5 style="color:#fff;">Crop Name</h5>
                <select class="form-control" id="crop_grain" name="crop_name" onchange="mspCheck(this);">
                    <option disabled selected value="">-- Select Grain Name --</option>
                    <?php
                    $records = mysqli_query($con, "SELECT cro_name From cropdetails where cro_type='Grains'");  // Use select query here 

                    while ($data = mysqli_fetch_array($records)) {
                        echo "<option value='" . $data['cro_name'] . "'>" . $data['cro_name'] . "</option>";  // displaying data in option menu
                    }
                    ?>
                </select>
            </div>

            <div class="form-group" id="iffeedcrops" style="display: none;">
                <h5 style="color:#fff;">Crop Name</h5>
                <select class="form-control" id="crop_feedcrop" name="crop_name" onchange="mspCheck(this);">
                    <option disabled selected value="">-- Select Feed Crop Name --</option>
                    <?php
                    $records = mysqli_query($con, "SELECT cro_name From cropdetails where cro_type='Feed Crops'");  // Use select query here 

                    while ($data = mysqli_fetch_array($records)) {
                        echo "<option value='" . $data['cro_name'] . "'>" . $data['cro_name'] . "</option>";  // displaying data in option menu
                    }
                    ?>
                </select>
            </div>

            <div class="form-group" id="iffibrecrops" style="display: none;">
                <h5 style="color:#fff;">Crop Name</h5>
                <select class="form-control" id="crop_fibrecrop" name="crop_name" onchange="mspCheck(this);">
                    <option disabled selected value="">-- Select Fibre Crop Name --</option>
                    <?php
                    $records = mysqli_query($con, "SELECT cro_name From cropdetails where cro_type='Fibre Crops'");  // Use select query here 

                    while ($data = mysqli_fetch_array($records)) {
                        echo "<option value='" . $data['cro_name'] . "'>" . $data['cro_name'] . "</option>";  // displaying data in option menu
                    }
                    ?>
                </select>
            </div>

            <div class="form-group" id="ifoilcrops" style="display: none;">
                <h5 style="color:#fff;">Crop Name</h5>
                <select class="form-control" id="crop_oilcrop" name="crop_name">
                    <option disabled selected value="">-- Select Oil Crop Name --</option>
                    <?php
                    $records = mysqli_query($con, "SELECT cro_name From cropdetails where cro_type='Oil Crops'");  // Use select query here 

                    while ($data = mysqli_fetch_array($records)) {
                        echo "<option value='" . $data['cro_name'] . "'>" . $data['cro_name'] . "</option>";  // displaying data in option menu
                    }
                    ?>
                </select>
            </div>

            <div class="form-group" id="ifflowers" style="display: none;">
                <h5 style="color:#fff;">Crop Name</h5>
                <select class="form-control" id="crop_flowers" name="crop_name">
                    <option disabled selected value="">-- Select Flowers Name --</option>
                    <?php
                    $records = mysqli_query($con, "SELECT cro_name From cropdetails where cro_type='Flowers'");  // Use select query here 

                    while ($data = mysqli_fetch_array($records)) {
                        echo "<option value='" . $data['cro_name'] . "'>" . $data['cro_name'] . "</option>";  // displaying data in option menu
                    }
                    ?>
                </select>
            </div>

            <div class="form-group" id="ifindustrialcrops" style="display: none;">
                <h5 style="color:#fff;">Crop Name</h5>
                <select class="form-control" id="crop_industrialcrop" name="crop_name" onchange="mspCheck(this);">
                    <option disabled selected value="">-- Select Industrial Crop Name --</option>
                    <?php
                    $records = mysqli_query($con, "SELECT cro_name From cropdetails where cro_type='Industrial Crops'");  // Use select query here 

                    while ($data = mysqli_fetch_array($records)) {
                        echo "<option value='" . $data['cro_name'] . "'>" . $data['cro_name'] . "</option>";  // displaying data in option menu
                    }
                    ?>
                </select>
            </div>

            <div class="text-warning" id="mspshow"></div>

            <h5 style="color:#fff;">Quantity (in kgs.)</h5>
            <div class="form-group"><input class="form-control" id="crop_quantity" type="number" name="crop_quantity" placeholder="Enter Quantity in Kilograms" required="" autofocus=""></div>

            <h5 style="color:#fff;">Minimum Expected Price (per kgs.)</h5>
            <div class="form-group"><input class="form-control" id="crop_mep" type="number" name="crop_mep" placeholder="Minimum Expected Price" required="" autofocus=""></div>

            <div class="text-warning" id="errorshow1"></div>

            <h5 style="color:#fff;">Image - 01</h5>
            <div class="form-group"><input class="form-control" id="crop_img1" type="file" accept="image/jpeg, image/jpg, image/png" name="crop_img1" placeholder="Select Image" required="" autofocus=""></div>

            <h5 style="color:#fff;">Image - 02</h5>
            <div class="form-group"><input class="form-control" id="crop_img2" type="file" accept="image/jpeg, image/jpg, image/png" name="crop_img2" placeholder="Select Image" required="" autofocus=""></div>

            <h5 style="color:#fff;">Image - 03</h5>
            <div class="form-group"><input class="form-control" id="crop_img3" type="file" accept="image/jpeg, image/jpg, image/png" name="crop_img3" placeholder="Select Image" required="" autofocus=""></div>

            <input name="submit" class="btn btn-primary btn-block" type="submit" value=" Add Crop ">

            <div class="text-warning" id="errorshow2"></div>
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