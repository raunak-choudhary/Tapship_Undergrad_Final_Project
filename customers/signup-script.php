<?php
error_reporting(0);
$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "";
	$dbname = "tapship";

	//Create Connection
	$con = new mysqli($dbhost, $dbuser, $dbpass, $dbname) or die($con->connect_error);

if (isset($_POST["submit"]))
 {
     #retrieve file title
     $customer_type = $con->real_escape_string($_POST['customer_type']);
     $customer_mobile = $con->real_escape_string($_POST['customer_mobile']);
     $customer_name = $con->real_escape_string($_POST['customer_name']);
     $customer_contactname = $con->real_escape_string($_POST['customer_contactname']);
     $customer_gender = $con->real_escape_string($_POST['customer_gender']);
     $customer_age = $con->real_escape_string($_POST['customer_age']);
     $customer_street = $con->real_escape_string($_POST['customer_street']);
     $customer_city = $con->real_escape_string($_POST['customer_city']);
     $customer_state= $con->real_escape_string($_POST['customer_state']);
     $customer_pincode= $con->real_escape_string($_POST['customer_pincode']);
     $customer_aadhar= $con->real_escape_string($_POST['customer_aadhar']);
     $customer_pan= $con->real_escape_string($_POST['customer_pan']);
     $customer_password= $con->real_escape_string($_POST['customer_password']);
     $customer_approve = 1;
    
     $sql = "Select * from customer";
     $result = $con->query($sql);

     if (mysqli_num_rows($result) > 0) {
        while( $res = mysqli_fetch_assoc($result)) {
            if( $res["c_mobile"]==$customer_mobile){
                header("location: alreadyregistered.php");
            }
            else{
                #file name with a random number so that similar dont get replaced
                $customer_aadharpdf= $customer_mobile."-".$customer_name."-".$_FILES["customer_aadharpdf"]["name"];
                $customer_panpdf= $customer_mobile."-".$customer_name."-".$_FILES["customer_panpdf"]["name"];
                $customer_photo= $customer_mobile."-".$customer_name."-".$_FILES["customer_photo"]["name"];
                $customer_registration= $customer_mobile."-".$customer_name."-".$_FILES["customer_registration"]["name"];

                #temporary file name to store file
                $tname1 = $_FILES["customer_aadharpdf"]["tmp_name"];
                $tname2 = $_FILES["customer_panpdf"]["tmp_name"];
                $tname3 = $_FILES["customer_photo"]["tmp_name"];
                $tname4 = $_FILES["customer_registration"]["tmp_name"];

                #target path
                $target_path1 = "assets/documents/aadhar/".$customer_aadharpdf;
                $target_path2 = "assets/documents/pan/".$customer_panpdf;
                $target_path3 = "assets/documents/photo/".$customer_photo;
                $target_path4 = "assets/documents/registration/".$customer_registration;
            
                #TO move the uploaded file to specific location
                move_uploaded_file($tname1, $target_path1);
                move_uploaded_file($tname2, $target_path2);
                move_uploaded_file($tname3, $target_path3);
                move_uploaded_file($tname4, $target_path4);

                #sql query to insert into database
                if($customer_type=="wholesaler")
                {
                    $query = "INSERT into customer(c_type,c_mobile,c_name,c_gender,c_age,c_street,c_city,c_state,c_pincode,c_aadhar,c_aadharpdf,c_pan,c_panpdf,c_photo,c_password,c_approve) VALUES('$customer_type','$customer_mobile','$customer_name','$customer_gender','$customer_age','$customer_street','$customer_city','$customer_state','$customer_pincode','$customer_aadhar','$target_path1','$customer_pan','$target_path2','$target_path3','$customer_password','$customer_approve')";
                    $success = $con->query($query);
                }

                if($customer_type=="organization")
                {
                    $query = "INSERT into customer(c_type,c_mobile,c_name,c_contactname,c_registration,c_gender,c_age,c_street,c_city,c_state,c_pincode,c_pan,c_panpdf,c_photo,c_password,c_approve) VALUES('$customer_type','$customer_mobile','$customer_name','$customer_contactname','$customer_registration','$customer_gender','$customer_age','$customer_street','$customer_city','$customer_state','$customer_pincode','$customer_pan','$target_path2','$target_path3','$customer_password','$customer_approve')";
                    $success = $con->query($query);
                }

                

            }
        }
     }
}
 
$con->close();
 
?>


<html>

  <head>
  <title>Success - customer SignUp</title>
  
  <link rel="shortcut icon" type="image/png" href="../assets/img/fav.png">
  <link rel="stylesheet" type = "text/css" href ="../assets/css/manager_registered_success.css">
  <link rel="stylesheet" type = "text/css" href ="../assets/bootstrap/css/bootstrap.min.css">
  <script type="text/javascript" src="../assets/js/jquery.min.js"></script>
  <script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
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
    </head>

    <style>
.footer-dark {
  position: fixed;
  left: 0;
  bottom: 0;
  width: 100%;
  background-color: red;
  color: white;
  text-align: center;
}
</style>

  <body>
  <nav class="navbar navbar-light navbar-expand-lg fixed-top text-uppercase" id="mainNav" style="background: #0c3823;">
        <div class="container">
            <a class="navbar-brand js-scroll-trigger" data-bs-hover-animate="pulse" href="index.php" style="font-family: Montserrat, sans-serif;">TAPSHIP</a>
            <button data-toggle="collapse" data-target="#navbarResponsive" class="navbar-toggler navbar-toggler-right text-uppercase rounded" data-aos="fade" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation" style="background: #fff;" ><i class="fa fa-bars" style="color: #0c3823;;"></i></button>
            <div class="collapse navbar-collapse"
                id="navbarResponsive">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" data-bs-hover-animate="pulse" href="../index.php" style="filter: contrast(100%) grayscale(0%) hue-rotate(0deg) invert(0%) sepia(0%);">HOME</a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" data-bs-hover-animate="pulse" href="../contact.php">CONTACT</a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" data-bs-hover-animate="pulse" href="../about.php">About</a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" data-bs-hover-animate="pulse" href="../faq.php">FAQ</a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a href="../login-choice.php"><button  class="btn btn-dark text-monospace" data-bs-hover-animate="pulse" type="button" style="margin: 10px;background: rgb(255,255,255);color: #0c3823;margin-left: 0;border-radius: 10px;">Log in</button></a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a href="../signup-choice.php"><button class="btn btn-dark text-monospace" data-bs-hover-animate="pulse" type="button" style="margin: 10px;background: rgb(255,255,255);color: #0c3823;margin-left: 0;border-radius: 10px;">Sign Up</button></a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container" style="margin-top:150px;">
        <div class="jumbotron" style="text-align: center; background-color:#0c3823; color:#fff;">
            <h2> <?php echo "Welcome $customer_name!" ?> </h2>
            <br>
            <h3>Your details for customer account has been submitted Successfully.</h3>
            <h5>We are reviewing your details and documents. Please have a little patience.</h5>
            <br>
            <h6><strong>Go to home <a href="../index.php">HERE</a></strong> <span>&nbsp&nbsp&nbsp</span><strong>Try to login <a href="login.php">HERE</strong></a></h6>
        </div>    
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
