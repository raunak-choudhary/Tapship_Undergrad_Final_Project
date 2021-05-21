<?php

include('session-script.php');
$res = $_SESSION["sessionid"];
$d_mobile = $res;
if (!isset($_SESSION['login_driver'])) {
    header("location: login.php"); // Redirecting To Profile Page
}
error_reporting(0);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Knowledge Zone</title>
    <link rel="icon" href="../assets/img/fav.png" type="image/png">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="../assets/css/dh-header-cover-image-button.css">
    <link rel="stylesheet" href="../assets/css/Latest-Blog.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic">
    <link rel="stylesheet" href="../assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/css/Article-List.css">
    <link rel="stylesheet" href="../assets/css/Features-Boxed.css">
    <link rel="stylesheet" href="../assets/css/Footer-Dark.css">
    <link rel="stylesheet" href="../assets/css/Highlight-Blue.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.2.0/aos.css">
    <link rel="stylesheet" href="../assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="../assets/css/table-style.css">
    <link rel="stylesheet" href="../assets/css/profile.css">
    <link rel="stylesheet" href="../assets/css/aboutus.css">
    <link href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/3.6.95/css/materialdesignicons.css' rel='stylesheet'>
    <style>
        h5 {
            text-align: justify;
        }
    </style>
</head>

<body>
    <div class="page-content page-container" id="page-content">
        <nav class="navbar navbar-light navbar-expand-lg fixed-top text-uppercase" id="mainNav" style="background: #0c3823;">
            <div class="container-fluid">
                <a class="navbar-brand js-scroll-trigger" data-bs-hover-animate="pulse" href="index.php" style="font-family: Montserrat, sans-serif;">TAPSHIP</a>
                <button data-toggle="collapse" data-target="#navbarResponsive" class="navbar-toggler navbar-toggler-right text-uppercase rounded" data-aos="fade" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation" style="background: #fff;"><i class="fa fa-bars" style="color: #0c3823;;"></i></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="nav navbar-nav ml-auto">
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" data-bs-hover-animate="pulse" href="index.php" style="filter: contrast(100%) grayscale(0%) hue-rotate(0deg) invert(0%) sepia(0%);">DASHBOARD</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" data-bs-hover-animate="pulse" href="../about.php">ABOUT</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" data-bs-hover-animate="pulse" href="../faq.php">FAQ</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a href="../drivers/profile.php"><button class="btn btn-dark text-monospace" data-bs-hover-animate="pulse" type="button" style="margin: 10px;background: rgb(255,255,255);color: #0c3823;margin-left: 0;border-radius: 10px;">View Profile</button></a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a href="../drivers/logout-script.php"><button class="btn btn-dark text-monospace" data-bs-hover-animate="pulse" type="button" style="margin: 10px;background: rgb(255,255,255);color: #0c3823;margin-left: 0;border-radius: 10px;">Log Out</button></a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div class="header-container" style="background-image:url(&quot;../assets/img/d_suggestion.png&quot;);padding-top:350px;padding-bottom:175px;">
        <div class="col-md-6 col-lg-6 offset-md-3 offset-lg-3 header-title">
            <h1 class="text-center" style="color: #; font-size:60px; margin-top:-240px">Knowledge Zone</h1>
        </div>
    </div>
    <div class="blog-home3 py-5">
        <div class="container">
            <!-- Row  -->
            <div class="row justify-content-center">
                <!-- Column -->
                <div class="col-md-8 text-center">
                    <h3 class="my-3">Latest News and Articles</h3>
                    <h4 class="subtitle font-weight-normal">You can relay on our amazing features list and also our customer services will be great experience for you without doubt</h4>
                </div>
                <!-- Column -->
                <!-- Column -->
            </div>
            <section id="uppersection">
                <div class="container text-center-justified">
                    <div class="row">
                        <div class="col boxg mx-5 px-5" data-aos="fade">
                            <h1 class="text-center"><br><strong><u> Keeping Drivers and the Community Safe During the Pandemic </u></strong></h1>
                            <ul class="p-5 ">
                                <h5><strong>THE CHALLENGE</strong><br>When the COVID-19 crisis began earlier this year, it was imperative for Logistics—an essential provider in the delivery of food, medicine, and other critical supplies—to protect its drivers and community.

To ensure this happened (and continues to happen), We implemented a few simple, common-sense practices in the everyday shipping and receiving of goods, from the pickup point through final delivery.

When a truck driver arrives at a food facility to pick up a shipment, he or she typically has two primary interactions. First, the driver must pass through a security gate with proper authorization. Typically, this does not involve the driver leaving the truck, but it sometimes happens.

Next, the driver enters the facility's shipping office. Often, the office is crowded with other drivers from multiple regions and states who are verifying their loads and receiving their load or unload instructions. There are also multiple tasks that usually involve several more points of contact, such as filling out forms and sealing trailers to ensure the safety of food and other shipments.

On the other end, similar interactions occur with the receiving of goods at a warehouse or distribution center.Across the India, thousands of these deliveries happen every day—following protocols that have been entrenched as standard practice as far back as the early 1980s.
<br><br><strong>THE SOLUTION</strong><br>Logistics advised its drivers, when possible, to simply stay in their trucks—whether they are picking up a load or delivering it to the receiver. It is a solution to driver and customer safety that Logistics has provided to several customers.

The whole process of following verification and safety rules on each end of the shipment can still be done easily without close personal contact. Some standard practices, such as checking proper sealing of the trailer, can be done by the driver just outside the shipper's or receiver's location to avoid another potential exposure.

Tapship has some customers whose operation procedures necessitate drivers leaving their trucks during delivery or pickup. In those situations, the TapShip drivers don masks and gloves before leaving the truck, and follow CDC social-distancing safety suggestions while interacting with the customer.

Executives of TapShip took the initiative at the state and federal level to promote truck driver safety.Changing these existing over-the-road shipping protocols was not costly or over-burdensome. TapShip communicated with its drivers and customers that the intent was to protect the health of everyone involved in the shipment of food and supplies, including the end consumer. All it takes is one sick driver or employee to infect and shut down an entire plant, so this simple safety practice also protects the financial bottom line.

TapShip further communicated their company's safety message in a podcast interview conducted by Inbound Logistics. His hope was to spread his company's safety practices throughout the shipping industry. With everyone following along in their own small roles, TapShip reasoned that it adds up to eventually beating the pandemic and keeping India's economy running.


                                    <h5>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>


        </div>
    </div>
    <div class="footer-dark" style="background: rgb(12,56,35);">
        <footer>
            <div class="container-fluid">
                <p style="text-align: center;"><strong>© 2021 TapShip.&nbsp; All rights reserved.</strong><br></p>
            </div>
        </footer>
    </div>
    <script src="../assets/js/jquerykbase.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.2.0/aos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script src="../assets/js/freelancer.js"></script>
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/js/bs-init.js"></script>
</body>

</html>