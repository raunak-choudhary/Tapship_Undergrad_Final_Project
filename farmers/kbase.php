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
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Knowledge Base</title>
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
		h5 {text-align: justify;}
		
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
                    <li class="nav-item mx-0 mx-lg-1"><a href="../farmers/profile.php"><button class="btn btn-dark text-monospace" data-bs-hover-animate="pulse" type="button" style="margin: 10px;background: rgb(255,255,255);color: #0c3823;margin-left: 0;border-radius: 10px;">View Profile</button></a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a href="../farmers/logout-script.php"><button class="btn btn-dark text-monospace" data-bs-hover-animate="pulse" type="button" style="margin: 10px;background: rgb(255,255,255);color: #0c3823;margin-left: 0;border-radius: 10px;">Log Out</button></a></li>
                </ul>
            </div>
        </div>
    </nav>
		
    </div>
    <div class="header-container" style="background-image:url(&quot;../assets/img/law-bg.png&quot;);padding-top:350px;padding-bottom:175px;">
        <div class="col-md-6 col-lg-6 offset-md-3 offset-lg-3 header-title">
            <h1 class="text-center" style="color: #ffffff; font-size:60px; margin-top:-230px">Knowledge Zone</h1>
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
                    <h1 class="text-center"><br><strong><u> Scientific development of smart farming technologies</u></strong></h1>
                    <ul class="p-5 ">
<h5>The World Government Summit launched a report called Agriculture 4.0 – The Future Of Farming Technology, in collaboration with Oliver Wyman for the 2018 edition of the international event. The report addresses the four main developments placing pressure on agriculture to meeting the demands of the future: Demographics, Scarcity of natural resources, Climate change, and Food waste.

The report states that, although demand is continuously growing, by 2050 we will need to produce 70 percent more food. Meanwhile, agriculture’s share of global GDP has shrunk to just 3 percent, one-third its contribution just decades ago. Roughly 800 million people worldwide suffer from hunger. And under a business-as-usual scenario, 8 percent of the world’s population (or 650 million) will still be undernourished by 2030. The reality is that very little innovation has taken place in the industry of late—in any case, nothing to indicate that food scarcity and hunger will not be an issue in the coming decades.

To meet these challenges will require a concerted effort by governments, investors, and innovative agricultural technologies. Agriculture 4.0 will no longer depend on applying water, fertilizers, and pesticides uniformly across entire fields. Instead, farmers will use the minimum quantities required and target very specific areas. The report further states that, farms and agricultural operations will have to be run very differently, primarily due to advancements in technology such as sensors, devices, machines, and information technology. Future agriculture will use sophisticated technologies such as robots, temperature and moisture sensors, aerial images, and GPS technology. These advanced devices and precision agriculture and robotic systems will allow farms to be more profitable, efficient, safe, and environmentally friendly.

Governments can play a key part in solving the food scarcity issue. They need to take on a broader and more prominent role than their traditional regulatory and facilitating function

<br>By challenging the traditional legacy model and pursuing such a program, governments can:<br><br>
                        <li>
                           Ensure food security and reduce dependency on imports.<br>
                        </li>
						 <li>
                           Become a net exporter not only of products but also IP and new solutions.<br>
                        </li>
						 <li>
                           Increase productivity and support the shift towards an innovation- and knowledge -based economy.<br>
                        </li><h5>
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