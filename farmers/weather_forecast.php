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
    <title>Weather Forecast</title>
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
    <link rel="stylesheet" href="../assets/css/table-style-finddeal.css" />
</head>

<body id="page-top">
    <nav class="navbar navbar-light navbar-expand-lg fixed-top text-uppercase" id="mainNav" style="background: #0c3823;">
        <div class="container-fluid">
            <a class="navbar-brand js-scroll-trigger" data-bs-hover-animate="pulse" href="../index.php" style="font-family: Montserrat, sans-serif;">TAPSHIP</a>
            <button data-toggle="collapse" data-target="#navbarResponsive" class="navbar-toggler navbar-toggler-right text-uppercase rounded" data-aos="fade" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation" style="background: #fff;"><i class="fa fa-bars" style="color: #0c3823;;"></i></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" data-bs-hover-animate="pulse" href="../index.php" style="filter: contrast(100%) grayscale(0%) hue-rotate(0deg) invert(0%) sepia(0%);">HOME</a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" data-bs-hover-animate="pulse" href="../contact.php">CONTACT</a></li>
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
                <h2 class="text-center" data-aos="fade" style="color: rgb(255,255,255);padding: 30px;margin-bottom: 0px;">Weather Forecast</h2>
            </div>
        </div>
    </div>

    <?php
    $q = "SELECT * from farmer where f_mobile = $f_mobile";
    $query = mysqli_query($con, $q);
    while ($res = mysqli_fetch_array($query)) {
        $f_pincode = $res['f_pincode'];
    }
    $res = shell_exec("python weather_forecast.py $f_mobile $f_pincode");
    $op = explode("\n", $res);
    ?>

    <div class="container-fluid">
        <div class="row" style="color:white; margin:10px;">
            <div class="col-lg-3 col-md-12 col-sm-12" style="background-color:#7e090f; padding:15px; height: 430px;">
                <h6><?php echo $op[0]; ?></h6>
                <h6><?php echo $op[1]; ?></h6>
                <?php echo $op[2]; ?>
                <h2><?php echo $op[3]; ?></h2>
                <h6>Weather Type : <?php echo $op[4]; ?> </h6>
                <h6>Clouds : <?php echo $op[5]; ?> </h6>
                <h6>Humidity : <?php echo $op[6]; ?> </h6>
                <h6>Dew Point : <?php echo $op[7]; ?> </h6>
                <h6>Wind Speed : <?php echo $op[8]; ?> </h6>
                <h6>Sunrise Time : <?php echo $op[9]; ?> </h6>
                <h6>Sunset Time : <?php echo $op[10]; ?> </h6>
                <h6>Maximum Temperature : <?php echo $op[11]; ?> </h6>
                <h6>Minimum Temperature : <?php echo $op[12]; ?> </h6>
            </div>
            <div class="col-lg-3 col-md-12 col-sm-12" style="background-color:#1e5239; padding:15px;   height: 430px;">
                <h6><?php echo $op[13]; ?></h6>
                <h6><?php echo $op[14]; ?></h6>
                <?php echo $op[15]; ?>
                <h2><?php echo $op[16]; ?></h2>
                <h6>Weather Type : <?php echo $op[17]; ?> </h6>
                <h6>Clouds : <?php echo $op[18]; ?> </h6>
                <h6>Humidity : <?php echo $op[19]; ?> </h6>
                <h6>Dew Point : <?php echo $op[20]; ?> </h6>
                <h6>Wind Speed : <?php echo $op[21]; ?> </h6>
                <h6>Sunrise Time : <?php echo $op[22]; ?> </h6>
                <h6>Sunset Time : <?php echo $op[23]; ?> </h6>
                <h6>Maximum Temperature : <?php echo $op[24]; ?> </h6>
                <h6>Minimum Temperature : <?php echo $op[25]; ?> </h6>
            </div>
            <div class="col-lg-3 col-md-12 col-sm-12" style="background-color:#092b1b; padding:15px;   height: 430px;">
                <h6><?php echo $op[26]; ?></h6>
                <h6><?php echo $op[27]; ?></h6>
                <?php echo $op[28]; ?>
                <h2><?php echo $op[29]; ?></h2>
                <h6>Weather Type : <?php echo $op[30]; ?> </h6>
                <h6>Clouds : <?php echo $op[31]; ?> </h6>
                <h6>Humidity : <?php echo $op[32]; ?> </h6>
                <h6>Dew Point : <?php echo $op[33]; ?> </h6>
                <h6>Wind Speed : <?php echo $op[34]; ?> </h6>
                <h6>Sunrise Time : <?php echo $op[35]; ?> </h6>
                <h6>Sunset Time : <?php echo $op[36]; ?> </h6>
                <h6>Maximum Temperature : <?php echo $op[37]; ?> </h6>
                <h6>Minimum Temperature : <?php echo $op[38]; ?> </h6>
            </div>
            <div class="col-lg-3 col-md-12 col-sm-12" style="background-color:#1e5239; padding:15px;   height: 430px;">
                <h6><?php echo $op[39]; ?></h6>
                <h6><?php echo $op[40]; ?></h6>
                <?php echo $op[41]; ?>
                <h2><?php echo $op[42]; ?></h2>
                <h6>Weather Type : <?php echo $op[43]; ?> </h6>
                <h6>Clouds : <?php echo $op[44]; ?> </h6>
                <h6>Humidity : <?php echo $op[45]; ?> </h6>
                <h6>Dew Point : <?php echo $op[46]; ?> </h6>
                <h6>Wind Speed : <?php echo $op[47]; ?> </h6>
                <h6>Sunrise Time : <?php echo $op[48]; ?> </h6>
                <h6>Sunset Time : <?php echo $op[49]; ?> </h6>
                <h6>Maximum Temperature : <?php echo $op[50]; ?> </h6>
                <h6>Minimum Temperature : <?php echo $op[51]; ?> </h6>
            </div>
        </div>
        <br>
        <div class="row" style="color:white; margin:10px; ">
            <div class="col-lg-3 col-md-12 col-sm-12" style="background-color:#092b1b; padding:15px;   height: 430px;">
                <h6><?php echo $op[52]; ?></h6>
                <h6><?php echo $op[53]; ?></h6>
                <?php echo $op[54]; ?>
                <h2><?php echo $op[55]; ?></h2>
                <h6>Weather Type : <?php echo $op[56]; ?> </h6>
                <h6>Clouds : <?php echo $op[57]; ?> </h6>
                <h6>Humidity : <?php echo $op[58]; ?> </h6>
                <h6>Dew Point : <?php echo $op[59]; ?> </h6>
                <h6>Wind Speed : <?php echo $op[60]; ?> </h6>
                <h6>Sunrise Time : <?php echo $op[61]; ?> </h6>
                <h6>Sunset Time : <?php echo $op[62]; ?> </h6>
                <h6>Maximum Temperature : <?php echo $op[63]; ?> </h6>
                <h6>Minimum Temperature : <?php echo $op[64]; ?> </h6>
            </div>
            <div class="col-lg-3 col-md-12 col-sm-12" style="background-color:#1e5239; padding:15px;   height: 430px;">
                <h6><?php echo $op[65]; ?></h6>
                <h6><?php echo $op[66]; ?></h6>
                <?php echo $op[67]; ?>
                <h2><?php echo $op[68]; ?></h2>
                <h6>Weather Type : <?php echo $op[69]; ?> </h6>
                <h6>Clouds : <?php echo $op[70]; ?> </h6>
                <h6>Humidity : <?php echo $op[71]; ?> </h6>
                <h6>Dew Point : <?php echo $op[72]; ?> </h6>
                <h6>Wind Speed : <?php echo $op[73]; ?> </h6>
                <h6>Sunrise Time : <?php echo $op[74]; ?> </h6>
                <h6>Sunset Time : <?php echo $op[75]; ?> </h6>
                <h6>Maximum Temperature : <?php echo $op[76]; ?> </h6>
                <h6>Minimum Temperature : <?php echo $op[77]; ?> </h6>
            </div>
            <div class="col-lg-3 col-md-12 col-sm-12" style="background-color:#092b1b; padding:15px;   height: 430px;">
                <h6><?php echo $op[78]; ?></h6>
                <h6><?php echo $op[79]; ?></h6>
                <?php echo $op[80]; ?>
                <h2><?php echo $op[81]; ?></h2>
                <h6>Weather Type : <?php echo $op[82]; ?> </h6>
                <h6>Clouds : <?php echo $op[83]; ?> </h6>
                <h6>Humidity : <?php echo $op[84]; ?> </h6>
                <h6>Dew Point : <?php echo $op[85]; ?> </h6>
                <h6>Wind Speed : <?php echo $op[86]; ?> </h6>
                <h6>Sunrise Time : <?php echo $op[87]; ?> </h6>
                <h6>Sunset Time : <?php echo $op[88]; ?> </h6>
                <h6>Maximum Temperature : <?php echo $op[89]; ?> </h6>
                <h6>Minimum Temperature : <?php echo $op[90]; ?> </h6>
            </div>
            <div class="col-lg-3 col-md-12 col-sm-12" style="background-color:#1e5239; padding:15px;   height: 430px;">
                <h6><?php echo $op[91]; ?></h6>
                <h6><?php echo $op[92]; ?></h6>
                <?php echo $op[93]; ?>
                <h2><?php echo $op[94]; ?></h2>
                <h6>Weather Type : <?php echo $op[95]; ?> </h6>
                <h6>Clouds : <?php echo $op[96]; ?> </h6>
                <h6>Humidity : <?php echo $op[97]; ?> </h6>
                <h6>Dew Point : <?php echo $op[98]; ?> </h6>
                <h6>Wind Speed : <?php echo $op[99]; ?> </h6>
                <h6>Sunrise Time : <?php echo $op[100]; ?> </h6>
                <h6>Sunset Time : <?php echo $op[101]; ?> </h6>
                <h6>Maximum Temperature : <?php echo $op[102]; ?> </h6>
                <h6>Minimum Temperature : <?php echo $op[103]; ?> </h6>
            </div>
        </div>
    </div>

    <div class="footer-dark" style="background: rgb(12,56,35); margin-top: 50px;">
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