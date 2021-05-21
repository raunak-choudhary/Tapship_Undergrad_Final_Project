<?php

include('session-script.php');
$res = $_SESSION["sessionid"];
$c_mobile = $res;
if (!isset($_SESSION['login_customer'])) {
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
                        <li class="nav-item mx-0 mx-lg-1"><a href="../customers/profile.php"><button class="btn btn-dark text-monospace" data-bs-hover-animate="pulse" type="button" style="margin: 10px;background: rgb(255,255,255);color: #0c3823;margin-left: 0;border-radius: 10px;">View Profile</button></a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a href="../customers/logout-script.php"><button class="btn btn-dark text-monospace" data-bs-hover-animate="pulse" type="button" style="margin: 10px;background: rgb(255,255,255);color: #0c3823;margin-left: 0;border-radius: 10px;">Log Out</button></a></li>
                    </ul>
                </div>
            </div>
        </nav>


    </div>
    <div class="header-container" style="background-image:url(&quot;../assets/img/c_suggestion.png&quot;);padding-top:400px;padding-bottom:175px;">
        <div class="col-md-6 col-lg-6 offset-md-3 offset-lg-3 header-title">
            <h1 class="text-center" style="color: #ffffff; font-size:60px; margin-top:-270px">Knowledge Zone</h1>
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
                            <h1 class="text-center"><br><strong><u> Buying Strategies And Dealing With Suppliers</u></strong></h1>
                            <ul class="p-5 ">
                                <h5>To be successful in retail, it is essential to stock the right products, at the right time and at the right price. To do this, you must be able to source your products from the best and most reliable supplier that you can. This is not always an easy thing to do. Obviously you need to establish the product lines you are going to sell from a supplier that will be consistent and reliable.
								<br><br><strong>Identifying your Niche</strong><br><br>Before you begin the process of sourcing your stock, it is always a good idea to visit a competitors store to see what they are stocking and what price levels they are retailing at. Try to gain some idea of the brand names that are being sold and decide which seem to be the highest selling lines. It is always a good idea to have a look in their reduction sections to get an idea of which items are not selling quite as well and are being sold off cheaply.
								<br>It may be possible that the retailer will talk with you. This is more easily achieved if they are some distance from your location and therefore not a retailer you will be in direct competition with. If they will talk to you, attempt to get an idea from them of which items sell best and at which times of the year. What sort of pricing strategy do they have? Do they offer multiple price deals on new products to introduce them etc? What items don’t sell too well? Remember, just because items don’t sell too well for them, it doesn’t mean they won’t for you.
								<br>Once you have established your product range, or at least a broad knowledge of a product range, it is time to search for the products. It may be a good idea at this stage to visit some trade exhibitions or shows to broaden your own knowledge of the particular product range you have chosen. You may find that newer versions of products are about to be released onto the market. Having this knowledge can help in two ways. Firstly, it gives you an opportunity to source a new product range other retailers may not have discovered yet and secondly, you could use this information to your advantage and reduce your prices down for the stock that will be replaced with newer versions. This can be done more gradually and with greater effect if it is carried out in advance of the new products arrival.
								<br>Careful consideration of your supplier is important to any retail business. You need to be able to make sure you have a supplier that will not let you down. You simply will not be satisfied with a supplier who will raise prices with little or no reason just as soon as you have become reliant on them. Check out reviews for their service where you can.
								<br><br><strong>Sourcing Your Goods</strong><br><br>Suppliers come in many different types. Briefly, you can purchase from Manufacturers, Importers, Distributors, Wholesalers and even from Auctions. Each of these sources have plusses and minuses.
								<br><br><b>Manufacturers –</b> It can sometimes be beneficial to approach manufacturers directly. Often they will sell directly to the retailer, but to do so the manufacturer will usually expect large bulk orders. In some rare instances exclusivity can also be obtained which will ensure an extra possibility of success in your business. If a manufacturer will not sell to you directly, then you should ask them for a list of their distributors.
								<br><b>Importers – </b>Buying direct from importers can hold serious advantages, but also serious disadvantages. You can get the best prices, buying foreign goods directly from an importer, but you should take into account shipping timeframes, product life cycles, tax and duties and other associated problems.
								<br><b>Distributors –</b> They sell large varieties of products at slightly higher prices than the manufacturers. It is possible to buy smaller quantities with little or no minimum quantities. Often items will be shipped for free.
								<br><b>Wholesalers – </b>This type of supplier most often gives the best price for you to pass on to the customer. They usually have a large range of products and you will find a large amount of merchandise at the best possible prices. Wholesalers will often sell pallet loads of items and even truck loads. There are often terms and conditions attached to certain sales, as with any purchase.
								<br><br><strong>Identifying Potential Suppliers</strong><br><br>When you have identified the products you want to stock, you need to identify the best possible vendor for your retail business. You need to be able to find a vendor that will supply products to you at the best possible price. These products need to be of the best quality and the vendor must be able to guarantee delivery times and be reliable when they commit to delivery. Problems normally do occur and the company must be able to back you up that eventuality with the best possible Customer Service.
								<br>
					
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