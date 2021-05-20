<?php

include('session-script.php');
$res = $_SESSION["sessionid"];
$a_name = $res;
if (!isset($_SESSION['login_admin'])) {
    header("location: login.php"); // Redirecting To Profile Page
}
?>
<!doctype html>
<html>

<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>Update Crop Details</title>
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

    <script type='text/javascript'></script>
</head>

<body oncontextmenu='return false' class='snippet-body'>
    <div class="page-content page-container" id="page-content">
        <nav class="navbar navbar-light navbar-expand-lg fixed-top text-uppercase" id="mainNav" style="background: #0c3823;">
            <div class="container-fluid">
                <a class="navbar-brand js-scroll-trigger" data-bs-hover-animate="pulse" href="../index.php" style="font-family: Montserrat, sans-serif;">TAPSHIP</a>
                <button data-toggle="collapse" data-target="#navbarResponsive" class="navbar-toggler navbar-toggler-right text-uppercase rounded" data-aos="fade" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation" style="background: #fff;"><i class="fa fa-bars" style="color: #0c3823;;"></i></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="nav navbar-nav ml-auto">
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" data-bs-hover-animate="pulse" href="index.php" style="filter: contrast(100%) grayscale(0%) hue-rotate(0deg) invert(0%) sepia(0%);">DASHBOARD</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" data-bs-hover-animate="pulse" href="../about.php">ABOUT</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" data-bs-hover-animate="pulse" href="../faq.php">FAQ</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a href="updateprofile.php?a_name=<?php echo $a_name; ?>"><button class="btn btn-dark text-monospace" data-bs-hover-animate="pulse" type="button" style="margin: 10px;background: rgb(255,255,255);color: #0c3823;margin-left: 0;border-radius: 10px;">View Profile</button></a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a href="../admin/logout-script.php"><button class="btn btn-dark text-monospace" data-bs-hover-animate="pulse" type="button" style="margin: 10px;background: rgb(255,255,255);color: #0c3823;margin-left: 0;border-radius: 10px;">Log Out</button></a></li>

                    </ul>
                </div>
            </div>
        </nav>
        <?php
         $con = mysqli_connect("localhost", "root", "", "tapship");
        if (!$con) {
            die(" Connection Error ");
        }


        $crop_id = $_GET['cro_id'];
        $query = " select * from cropdetails where cro_id=" . $crop_id . "";
        $result = mysqli_query($con, $query);

        while ($res = mysqli_fetch_assoc($result)) {
            $crop_type =  $res['cro_type'];
            $crop_name =  $res['cro_name'];
            $crop_cost =  $res['cro_costperkg'];
            //$crop_msp =  round($crop_cost * 1.5);
        }
        ?>


        <div class="features-boxed">
            <div class="container" style="background: #ffffff;">
                <div class="intro" style="background: #0c3823;margin-top: 120px;margin-bottom: 30px; width:800px; margin-left:150px;">
                    <h2 class="text-center" data-aos="fade" style="color: rgb(255,255,255);padding: 30px;margin-bottom: 0px;">Update Crop Details</h2>
                </div>
            </div>
        </div>

        <div class="login-clean" style="padding: 0px;background: rgb(255,255,255);margin-top: 30px;">
            <form method="post" action="updatecropcost-script.php?cro_id=<?php echo $crop_id; ?>&cro_type=<?php echo $crop_type; ?>&cro_name=<?php echo $crop_name; ?>" enctype="multipart/form-data" style="background: #0c3823; margin-bottom: 40px;">
                <h5 style="color:#fff;">Crop ID</h5>
                <div class="form-group"><input class="form-control" id="crop_id" type="text" name="crop_id" title="Crop ID" placeholder="Crop ID" value="<?php echo $crop_id ?>" required="" autofocus="" disabled></div>

                <h5 style="color:#fff;">Crop Type</h5>
                <div class="form-group">
                    <select class="form-control" id="crop_type" name="crop_type" value="<?php echo $crop_type ?>" required="" autofocus="" disabled>
                        <option value="Fruits">Fruits</option>
                        <option value="Vegitables">Vegitables</option>
                        <option value="Grains">Grains</option>
                        <option value="Feed Crops">Feed Crops</option>
                        <option value="Fibre Crops">Fibre Crops</option>
                        <option value="Oil Crops">Oil Crops</option>
                        <option value="Flowers">Flowers</option>
                        <option value="Industrial Crop">Industrial Crop</option>
                    </select>
                </div>

                <h5 style="color:#fff;">Crop Name</h5>
                <div class="form-group"><input class="form-control" id="crop_name" type="text" name="crop_name" title="Crop Name" placeholder="Crop Name" value="<?php echo $crop_name ?>" required="" autofocus="" disabled></div>

                <h5 style="color:#fff;">Cost of Crop (per kg)</h5>
                <div class="form-group"><input class="form-control" id="crop_cost" type="number" name="crop_cost" title="Crop Cost (per kg)" placeholder="Crop Cost" value="<?php echo $crop_cost ?>" required="" autofocus=""></div>
                <br>
                <input name="submit" class="btn btn-info btn-block" type="submit" value="Update">
                <strong>
                    <p style="margin-left:20px; color:white; margin-top:10px;">** Crop Type and Crop Name can't be edited</p>
                </strong>
            </form>

        </div>

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