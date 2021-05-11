<?php

include('session-script.php');
$res = $_SESSION["sessionid"];
$a_name = $res;
if (!isset($_SESSION['login_admin'])) {
    header("location: login.php"); // Redirecting To Profile Page
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Add KIOSK Agent</title>
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
    <script language="Javascript" src="../assets/js/jquery.js"></script>
    <script type="text/JavaScript" src="../assets/js/agent_state_district.js"></script>
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
                    <li class="nav-item mx-0 mx-lg-1"><a href="updateprofile.php?a_name=<?php echo $a_name; ?>"><button class="btn btn-dark text-monospace" data-bs-hover-animate="pulse" type="button" style="margin: 10px;background: rgb(255,255,255);color: #0c3823;margin-left: 0;border-radius: 10px;">View Profile</button></a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a href="../admin/logout-script.php"><button class="btn btn-dark text-monospace" data-bs-hover-animate="pulse" type="button" style="margin: 10px;background: rgb(255,255,255);color: #0c3823;margin-left: 0;border-radius: 10px;">Log Out</button></a></li>

                </ul>
            </div>
        </div>
    </nav>


    <div class="features-boxed">
        <div class="container-fluid" style="background: #ffffff;">
            <div class="intro" style="background: #0c3823;margin-top: 120px;margin-bottom: 30px; max-width:1000px;">
                <h2 class="text-center" data-aos="fade" style="color: rgb(255,255,255);padding: 30px;margin-bottom: 0px;">Add KIOSK Agent</h2>
            </div>
        </div>
    </div>
    <div class="login-clean" style="padding: 0px; background: rgb(255,255,255);margin-top: 30px; ">
        <form method="post" action="addagent-script.php" enctype="multipart/form-data" style="background: #0c3823;margin-bottom: 40px;">

            <h5 style="color:#fff;">Pincode</h5>
            <div class="form-group"><input class="form-control" id="kiosk_pincode" type="text" name="kiosk_pincode" pattern="^[1-9]{1}[0-9]{5}" title="Enter valid 6 digit Pincode (Ex. 5763XX)" placeholder="KIOSK Agent's Pincode" required="" autofocus=""></div>

            <h5 style="color:#fff;">State</h5>
            <div class="form-group">
                <select class="form-control" id="kiosk_state" name="kiosk_state" onchange='select_district(this.value)' required>
                </select>
            </div>

            <h5 style="color:#fff;">District</h5>
            <div class="form-group">
                <select class="form-control" id="kiosk_district" name="kiosk_district" required>
                    <option selected disabled value="">Select State First</option>
                </select>
            </div>

            <h5 style="color:#fff;">Mobile Number</h5>
            <div class="form-group"><input class="form-control" id="kiosk_mobile" type="phone" name="kiosk_mobile" pattern="^[6-9]{1}[0-9]{9}$" title="Enter Valid 10 digit Mobile Number (Ex. 76435654XX)" placeholder="KIOSK Agent Mobile Number" required="" autofocus=""></div>

            <h5 style="color:#fff;">Full Name</h5>
            <div class="form-group"><input class="form-control" id="kiosk_name" type="text" name="kiosk_name" placeholder="KIOSK Agent Full Name" required="" autofocus=""></div>

            <h5 style="color:#fff;">Gender</h5>
            <div class="form-group">
                <select class="form-control" id="kiosk_gender" name="kiosk_gender" required>
                    <option selected disabled value="">Choose Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Others">Others</option>
                </select>
            </div>

            <h5 style="color:#fff;">Age</h5>
            <div class="form-group"><input class="form-control" id="kiosk_age" type="text" name="kiosk_age" pattern="^[1-9]{1}[0-9]{1}$" title="Enter agent's Correct age between 18 to 99 years" placeholder="KIOSK Agent's Age (Ex. 34)" required="" autofocus=""></div>

            <h5 style="color:#fff;">Address</h5>
            <div class="form-group"><input class="form-control" id="kiosk_address" type="text" name="kiosk_address" placeholder="KIOSK Agent's Address" required="" autofocus=""></div>

            <h5 style="color:#fff;">Aadhar Number</h5>
            <div class="form-group"><input class="form-control" id="kiosk_aadhar" type="text" name="kiosk_aadhar" pattern="^[2-9]{1}[0-9]{11}$" title="Enter 12 digit Aadhar Number (Ex. 2345678382XX)" placeholder="KIOSK Agent's Aadhar Number" required="" autofocus=""></div>

            <h5 style="color:#fff;">Aadhar PDF</h5>
            <div class="form-group"><input class="form-control" id="kiosk_aadharpdf" type="file" accept="application/pdf" name="kiosk_aadharpdf" required="" autofocus=""></div>

            <h5 style="color:#fff;">Photo</h5>
            <div class="form-group"><input class="form-control" id="kiosk_photo" type="file" accept="image/jpeg, image/jpg, image/png" name="kiosk_photo" placeholder="KIOSK Agent's Passport Size Photo" required="" autofocus=""></div>

            <input name="submit" class="btn btn-primary btn-block" type="submit" value=" Submit ">
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