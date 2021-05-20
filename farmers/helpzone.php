<?php

include('session-script.php');
$res = $_SESSION["sessionid"];
$f_mobile = $res;
if (!isset($_SESSION['login_farmer'])) {
    header("location: login.php"); // Redirecting To Profile Page
}
error_reporting(0);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Farmer Help Zone</title>
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/1.2.0/tailwind.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.2.0/aos.css">
    <link rel="stylesheet" href="../assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="../assets/css/card-hover.css">
</head>

<body id="page-top">
    <nav class="navbar navbar-light navbar-expand-lg fixed-top text-uppercase" id="mainNav" style="background: #0c3823;">
        <div class="container-fluid">
            <a class="navbar-brand js-scroll-trigger" data-bs-hover-animate="pulse" href="index.php" style="font-family: Montserrat, sans-serif;">TAPSHIP</a>
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

    <?php
     $con = mysqli_connect("localhost", "root", "", "tapship");
    if (!$con) {
        die(" Connection Error ");
    }

    $query = " select * from farmer where f_mobile=" . $f_mobile . "";
    $result = mysqli_query($con, $query);

    while ($res = mysqli_fetch_assoc($result)) {
        $f_name =  $res['f_name'];
    }
    ?>

    <div class="text-gray-100 px-8 py-12" style="margin-top: 10px;">
        <form action="helpzone-script.php" method="post">
            <div class="max-w-screen-xl mt-24 px-8 grid gap-8 grid-cols-1 md:px-12 lg:px-16 xl:px-32 py-16 mx-auto bg-gray-100 text-gray-900 rounded-lg shadow-lg">
                <div class="flex flex-col justify-center">
                    <div class="mt-2" style="text-align:center;">
                        <h2 class="text-4xl lg:text-5xl font-bold leading-tight">Ask the Expert!!</h2>
                    </div>
                </div>
                <div class="flex flex-col justify-between">
                    <div class="mt-2">
                        <span class="uppercase text-sm text-gray-600 font-bold">Subject</span>
                        <input class="w-full bg-gray-300 text-gray-900 mt-2 p-3 rounded-lg focus:outline-none focus:shadow-outline" type="text" id="farmer_subject" name="farmer_subject" placeholder="Enter Subject of your Issue" required="" autofocus="">
                    </div>
                    <div class="mt-2">
                        <span class="uppercase text-sm text-gray-600 font-bold">Message</span>
                        <textarea class="w-full h-32 bg-gray-300 text-gray-900 mt-2 p-3 rounded-lg focus:outline-none focus:shadow-outline" id="farmer_message" name="farmer_message" title="Enter your Issue in Detail" placeholder="Enter your Issue" required="" autofocus=""></textarea>
                    </div>
                    <div class="mt-2">
                        <button class="uppercase text-sm font-bold tracking-wide bg-indigo-500 text-gray-100 p-3 rounded-lg w-full focus:outline-none focus:shadow-outline" type="submit" name="submit" value="Submit">
                            Send Message
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div class="modal fade" id="mysuccessModal" data-backdrop="static" style="position: fixed;width: 100%;height: 100%;overflow: auto;background-color: rgb(0,0,0);background-color: rgba(0,0,0,0.4);">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content" style="position: relative;margin: auto;padding: 0;border: 1px solid #888;width: 100%;box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);">
                <!-- Modal Header -->
                <div class="modal-header" style="background-color: #0c3823;color: white;">
                    <h4 class="modal-title">Message</h4>
                    <button type="button" class="close" onclick="pagesuccessRedirect()">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <h3>Thank you for contacting us.</h3>
                    <h6>You are very important to us, all information received will always remain confidential. We will contact you as soon as we review your message.</h6>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer" style="padding:2px 16px;background-color: #0c3823;color: white;">
                    <button type="button" class="btn btn-danger" onclick="pagesuccessRedirect()">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="myunsuccessModal" data-backdrop="static" style="position: fixed;width: 100%;height: 100%;overflow: auto;background-color: rgb(0,0,0);background-color: rgba(0,0,0,0.4);">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content" style="position: relative;margin: auto;padding: 0;border: 1px solid #888;width: 100%;box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);">
                <!-- Modal Header -->
                <div class="modal-header" style="background-color: #0c3823;color: white;">
                    <h4 class="modal-title">Message</h4>
                    <button type="button" class="close" onclick="pageunsuccessRedirect()">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    Error in sending message!!! Please try again.
                </div>
                <!-- Modal footer -->
                <div class="modal-footer" style="padding:2px 16px;background-color: #0c3823;color: white;">
                    <button type="button" class="btn btn-danger" onclick="pageunsuccessRedirect()">Close</button>
                </div>
            </div>
        </div>
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