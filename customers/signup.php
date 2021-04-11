<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Customer Signup</title>
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
    if (that.value == "Wholesaler") {
        document.getElementById("ifWholesaler").style.display = "block";
        document.getElementById("ifOrganization").style.display = "none";
        document.getElementById("customer_registration").required = false;
        document.getElementById("customer_contactname").required = false; 
        document.getElementById("no1").style.display = "block";
        document.getElementById("no2").style.display = "block";
        document.getElementById("no3").style.display = "block";
    } else if (that.value == "Organization") {
        document.getElementById("ifOrganization").style.display = "block";
        document.getElementById("ifWholesaler").style.display = "none";
        document.getElementById("customer_aadhar").required = false;
        document.getElementById("customer_aadharpdf").required = false;
        document.getElementById("no1").style.display = "block"; 
        document.getElementById("no2").style.display = "block";
        document.getElementById("no3").style.display = "block";
    } else {
        document.getElementById("ifWholesaler").style.display = "none";
        document.getElementById("ifOrganization").style.display = "none";
        document.getElementById("no1").style.display = "none";
        document.getElementById("no2").style.display = "none";
        document.getElementById("no3").style.display = "none";
    }
}
</script>

<body id="page-top">
    <nav class="navbar navbar-light navbar-expand-lg fixed-top text-uppercase" id="mainNav" style="background: #0c3823;">
        <div class="container-fluid">
            <a class="navbar-brand js-scroll-trigger" data-bs-hover-animate="pulse" href="../index.php" style="font-family: Montserrat, sans-serif;">TAPSHIP</a>
            <button data-toggle="collapse" data-target="#navbarResponsive" class="navbar-toggler navbar-toggler-right text-uppercase rounded" data-aos="fade" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation" style="background: #fff;" ><i class="fa fa-bars" style="color: #0c3823;;"></i></button>
            <div class="collapse navbar-collapse"
                id="navbarResponsive">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" data-bs-hover-animate="pulse" href="../index.php" style="filter: contrast(100%) grayscale(0%) hue-rotate(0deg) invert(0%) sepia(0%);">HOME</a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" data-bs-hover-animate="pulse" href="../contact.php">CONTACT</a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" data-bs-hover-animate="pulse" href="../about.php">ABOUT</a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" data-bs-hover-animate="pulse" href="../faq.php">FAQ</a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a href="../login-choice.php"><button  class="btn btn-dark text-monospace" data-bs-hover-animate="pulse" type="button" style="margin: 10px;background: rgb(255,255,255);color: #0c3823;margin-left: 0;border-radius: 10px;">Log in</button></a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a href="../signup-choice.php"><button class="btn btn-dark text-monospace" data-bs-hover-animate="pulse" type="button" style="margin: 10px;background: rgb(255,255,255);color: #0c3823;margin-left: 0;border-radius: 10px;">Sign Up</button></a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="features-boxed">
        <div class="container-fluid" style="background: #ffffff;">
            <div class="intro" style="background: #0c3823;margin-top: 120px;margin-bottom: 30px;">
                <h2 class="text-center" data-aos="fade" style="color: rgb(255,255,255);padding: 30px;margin-bottom: 0px;">Customers Signup</h2>
            </div>
        </div>
    </div>
    <div class="login-clean" style="padding: 0px; background: rgb(255,255,255);margin-top: 30px; ">
        <form method="post" action="signup-script.php" enctype="multipart/form-data" style="background: #0c3823;margin-bottom: 40px;">
              
             

            <h5 style="color:#fff;">Select Customer Type</h5>
            <div class="form-group">
            <select class="form-control" id="customer_type" name="customer_type" required onchange="yesnoCheck(this);">
            <option value="">Choose</option>
            <option value="Wholesaler">Wholesaler</option>
            <option value="Organization">Organization</option>
            </select>
            <hr>

            <div id="no1" style="display: none;">
            <h5 style="color:#fff;">Mobile Number</h5>
            <div class="form-group"><input class="form-control" id="customer_mobile" type="phone" name="customer_mobile" pattern="^[6-9]{1}[0-9]{9}$" title="Enter Valid 10 digit Mobile Number (Ex. 76435654XX)" placeholder="Your Mobile Number" required="" autofocus=""></div>
            
            <h5 style="color:#fff;">Full Name</h5>
            <div class="form-group"><input class="form-control" id="customer_name" type="text" name="customer_name" placeholder="Your Full Name" required="" autofocus=""></div>
            </div>

            <div id="ifOrganization" style="display: none;">
            <h6 style="color:#fff;">Organization Registration</h6>
            <div class="form-group"><input class="form-control" id="customer_registration" type="file" accept="application/pdf" name="customer_registration" placeholder="Organization Registration Documnet" required="" autofocus=""></div>

            <h5 style="color:#fff;">Contact Person</h5>
            <div class="form-group"><input class="form-control" id="customer_contactname" type="text" name="customer_contactname" placeholder="Your Full Name" required="" autofocus=""></div>
            </div>
            
            <div id="no2" style="display: none;">
            <h5 style="color:#fff;">Gender</h5>
            <div class="form-group">
            <select class="form-control" id="customer_gender" name="customer_gender" required>
              <option selected disabled value="">Choose Gender</option>
              <option value="Male">Male</option>
              <option value="Female">Female</option>
              <option value="Others">Others</option>
            </select>
        
            <h5 style="color:#fff;">Age</h5>
            <div class="form-group"><input class="form-control" id="customer_age" type="text" name="customer_age" pattern="^[1-9]{1}[0-9]{1}$" title="Enter Your Correct age between 18 to 99 years" placeholder="Your Age (Ex. 34)" required="" autofocus=""></div>
            
            <h5 style="color:#fff;">Apartment/Street</h5>
            <div class="form-group"><input class="form-control" id="customer_street" type="text" name="customer_street" placeholder="Your Apartment/Street" required="" autofocus=""></div>
            
            <h5 style="color:#fff;">City</h5>
            <div class="form-group"><input class="form-control" id="customer_city" type="text" name="customer_city" placeholder="Your City" required="" autofocus=""></div>
            
            <h5 style="color:#fff;">State</h5>
            <div class="form-group"><input class="form-control" id="customer_state" type="text" name="customer_state" placeholder="Your State" required="" autofocus=""></div>
            
            <h5 style="color:#fff;">Pincode</h5>
            <div class="form-group"><input class="form-control" id="customer_pincode" type="text" name="customer_pincode" pattern="^[1-9]{1}[0-9]{5}" title="Enter valid 6 digit Pincode (Ex. 5763XX)" placeholder="Your Pincode" required="" autofocus=""></div>
            </div>

            <div id="ifWholesaler" style="display: none;">
            <h5 style="color:#fff;">Aadhar Number</h5>
            <div class="form-group"><input class="form-control" id="customer_aadhar" type="text" name="customer_aadhar" pattern="^[2-9]{1}[0-9]{11}$" title="Enter 12 digit Aadhar Number (Ex. 2345678382XX)" placeholder="Your Aadhar Number" required="" autofocus=""></div>
            
            <h5 style="color:#fff;">Aadhar PDF</h5>
            <div class="form-group"><input class="form-control" id="customer_aadharpdf" type="file" accept="application/pdf" name="customer_aadharpdf" required="" autofocus=""></div>
            </div>

            <div id="no3" style="display: none;">
            <h5 style="color:#fff;">PAN Number</h5>
            <div class="form-group"><input class="form-control" id="customer_pan" type="text" name="customer_pan" pattern="[A-Z]{5}[0-9]{4}[A-Z]{1}"  title="Enter Valid Pan Card Number (Ex. AAAAA1111A)" placeholder="Your PAN Number" required="" autofocus=""></div>
            
            <h5 style="color:#fff;">PAN PDF</h5>
            <div class="form-group"><input class="form-control" id="customer_panpdf" type="file" accept="application/pdf" name="customer_panpdf" placeholder="Your PAN PDF" required="" autofocus=""></div>
            
            <h5 style="color:#fff;">Photo</h5>
            <div class="form-group"><input class="form-control" id="customer_photo" type="file"  accept="image/jpeg, image/jpg, image/png" name="customer_photo" placeholder="Your Passport Size Photo" required="" autofocus=""></div>
            
            <h5 style="color:#fff;">Password</h5>
            <div class="form-group"><input class="form-control" id="customer_password" type="password" name="customer_password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" placeholder="Your Password" required="" autofocus=""></div>
            </div>
            </div>
            
            <input name="submit" type="submit" class="btn btn-primary btn-block" type="submit" value=" Sign Up "><a class="forgot" href="../customers/login.php" style="color: rgb(255,255,255);">Already have account? Click here.</a>            
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