<?php

include('session-script.php');
$res = $_SESSION["sessionid"];
$c_mobile= $res;
if(!isset($_SESSION['login_customer'])){
header("location: login.php"); // Redirecting To Profile Page
}
error_reporting(0);
?> 
<!doctype html>
        <html>
            <head>
                <meta charset='utf-8'>
                <meta name='viewport' content='width=device-width, initial-scale=1'>
				<title>Customer Update Profile</title>
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
                                
                <scrip type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></scrip>
                <scrip type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js'></scrip>
                <scrip type='text/javascript'></scrip>
            </head>
        <body oncontextmenu='return false' class='snippet-body'>
        <div class="page-content page-container" id="page-content">
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
                    <li class="nav-item mx-0 mx-lg-1"><a href="../customers/logout-script.php"><button  class="btn btn-dark text-monospace" data-bs-hover-animate="pulse" type="button" style="margin: 10px;background: rgb(255,255,255);color: #0c3823;margin-left: 0;border-radius: 10px;">Log Out</button></a></li>
                </ul>
            </div>
        </div>
    </nav>
	<?php 

$con=mysqli_connect("localhost","root","","tapship");
if(!$con)
{
    die(" Connection Error ");
}

$query = " select * from customer where c_mobile=".$c_mobile."";
$result = mysqli_query($con,$query);

while( $res=mysqli_fetch_assoc($result))
{
    $c_id =  $res['c_id'];
    $c_name =  $res['c_name'];
    $c_contactname =  $res['c_contactname'];
    $c_gender =  $res['c_gender'];
    $c_age =  $res['c_age'];
    $c_street =  $res['c_street'];
    $c_city =  $res['c_city'];
    $c_state =  $res['c_state'];
    $c_pincode =  $res['c_pincode'];
    $c_type =  $res['c_type'];
    $c_registration =  $res['c_registration'];
    $c_aadhar =  $res['c_aadhar'];
    $c_aadharpdf =  $res['c_aadharpdf'];
    $c_pan =  $res['c_pan'];
    $c_panpdf =  $res['c_panpdf'];
    $c_photo =  $res['c_photo'];
    $c_approve =  $res['c_approve'];
    $c_password =  $res['c_password'];
}
?>

    <div class="features-boxed">
        <div class="container" style="background: #ffffff;">
            <div class="intro" style="background: #0c3823;margin-top: 120px;margin-bottom: 30px;">
                <h2 class="text-center" data-aos="fade" style="color: rgb(255,255,255);padding: 30px;margin-bottom: 0px;">Update Customer Profile</h2>
            </div>
        </div>
    </div>


    <?php
    if($c_type=="Wholesaler")
    {
    ?>
    <div class="padding">
        <div class="row container d-flex justify-content-center">
            <form id="editCustomerDetails">   
            <div class="col-xl-12 col-md-12">
                <div class="card user-card-full">
                    <div class="row m-l-0 m-r-0">
                        <div class="col-md-4 bg-c-lite-green user-profile">
                            <div class="card-block text-center text-white">
                                <div class="m-b-25"> <img src="../customers/<?php echo  $c_photo;?>" width="200" height="240" align="center" class="img-radius" alt="User-Profile-Image"> </div>
                                <h3 class="f-w-600"><?php echo "$c_name"?></h3>
                                <h5>Wholesaler</h5>
								<h5>Status: <?php if($c_approve=="1"){echo "No Action";}else if($c_approve=="2"){echo " Accepted";}else if($c_approve=="3"){echo "Review";}else if($c_approve=="4"){echo "Rejected";}else if($c_approve=="5"){echo "Resubmitted";}  else{echo "Multiple Login State";} ?></h5>
                                <br><br><br><br>
                                <button class="btn btn-primary btn-block" type="submit" name="update">Update</button>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="card-block">
                                <h4 class="m-b-20 p-b-5 b-b-default f-w-600"><strong>Information</strong></h4>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Name</p>
                                        <div class="form-group"><input class="form-control" type="text" name="customer_name" placeholder="Customer's Name" value="<?php echo $c_name ?>" required="" autofocus=""></div>
                                    </div>
									<div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">Mobile</p>
                                            <div class="form-group"><input class="form-control" type="text" name="customer_mobile" placeholder="Customer's Mobile" value="<?php echo $c_mobile ?>" required="" autofocus="" disabled></div>
                                        </div>
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">Gender</p>
                                            <select class="form-control" id="c_gender" name="customer_gender" value="<?php echo $c_gender ?>" required="" autofocus="">
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                                <option value="Others">Others</option>
                                            </select>
                                        </div>
									    <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">Age</p>
                                            <div class="form-group"><input class="form-control" type="text" pattern="^[1-9]{1}[0-9]{1}$" name="customer_age" title="Enter your correct age between 18 to 99 years" placeholder="Your Age (Ex. 34)" value="<?php echo $c_age ?>" required="" autofocus=""></div>
                                        </div>
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">Password</p>
                                            <div class="form-group"><input class="form-control" type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" name="customer_password" placeholder="Customer's Password" value="<?php echo $c_password ?>" required="" autofocus=""></div>
                                        </div>
                                </div>
                                <h4 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600"><strong>Address</strong></h4>
                                <div class="row">
                                <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">Street</p>
                                            <div class="form-group"><input class="form-control" type="text" name="customer_street" placeholder="Your Street" value="<?php echo $c_street ?>" required="" autofocus=""></div>
                                        </div>
									    <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">City</p>
                                            <div class="form-group"><input class="form-control" type="text" name="customer_city" placeholder="Your City" value="<?php echo $c_city ?>" required="" autofocus=""></div>
                                        </div>
									    <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">State</p>
                                            <div class="form-group"><input class="form-control" type="text" name="customer_state" placeholder="Your State" value="<?php echo $c_state ?>" required="" autofocus=""></div>
                                        </div>
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">Pincode</p>
                                            <div class="form-group"><input class="form-control" type="text" pattern="^[1-9]{1}[0-9]{5}" name="customer_pincode" title="Enter valid 6 digit Pincode (Ex. 5763XX)" placeholder="Your Pincode" value="<?php echo $c_pincode ?>" required="" autofocus=""></div>
                                        </div>
                                </div>
                                <h4 class="m-b-20 m-t-40 p-b-5 b-b-default  f-w-600"><strong>Documents</strong></h4>
                                <div class="text-danger" id="aadhar-pan-error" ></div>
                                <div class="row">
                                    <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">Aadhaar</p>
                                            <div class="form-group"><input class="form-control" type="text" pattern="^[2-9]{1}[0-9]{11}$" title="Enter 12 digit Aadhar Number (Ex. 2345678382XX)" name="customer_aadhar" placeholder="Your Aadhar Number" value="<?php echo $c_aadhar ?>" required="" autofocus="" ></div>
                                    </div>
                                    <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">Upload Aadhaar</p>
                                            <input type="file" name="customer_aadharpdf" accept="application/pdf" id="c_aadharpdf">
                                    </div>
									<div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">PAN</p>
                                            <div class="form-group"><input class="form-control" type="text" pattern="[A-Z]{5}[0-9]{4}[A-Z]{1}"  title="Enter Valid Pan Card Number (Ex. AAAAA1111A)" name="customer_pan" placeholder="Your PAN Number" value="<?php echo $c_pan ?>" required="" autofocus=""></div>  
                                    </div>
                                    <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">Upload PAN</p>
                                            <input type="file" name="customer_panpdf" accept="application/pdf" id="c_panpdf">
                                    </div>
								</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>							
	<?php
	}
    if($c_type=="Organization")
	{
	?>
	<div class="padding">
        <div class="row container d-flex justify-content-center">
            <form id="editCustomerDetails">
            <div class="col-xl-12 col-md-12">
                <div class="card user-card-full">
                    <div class="row m-l-0 m-r-0">
                        <div class="col-md-4 bg-c-lite-green user-profile">
                            <div class="card-block text-center text-white">
                                <div class="m-b-25"> <img src="../customers/<?php echo  $c_photo;?>" width="200" height="240" align="center" class="img-radius" alt="User-Profile-Image"> </div>
                                <h3 class="f-w-600"><?php echo "$c_name"?></h3>
                                <h5>Organization</h5>
								<h5>Status: <?php if($c_approve=="1"){echo "No Action";}else if($c_approve=="2"){echo " Accepted";}else if($c_approve=="3"){echo "Review";}else if($c_approve=="4"){echo "Rejected";}else if($c_approve=="5"){echo "Resubmitted";}   else{echo "Multiple Login State";} ?></h5>
                                <br><br><br><br>
                                <button class="btn btn-primary btn-block" type="submit" name="update">Update</button>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="card-block">
                                <h4 class="m-b-20 p-b-5 b-b-default f-w-600"><strong>Information</strong></h4>
                                <div class="text-danger" id="registration-error" ></div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Name</p>
                                        <div class="form-group"><input class="form-control" type="text" name="customer_name" placeholder="Customer's Name" value="<?php echo $c_name ?>" required="" autofocus=""></div>
                                    </div>
									<div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">Mobile</p>
                                            <div class="form-group"><input class="form-control" type="text" name="customer_mobile" placeholder="Customer's Mobile" value="<?php echo $c_mobile ?>" required="" autofocus="" disabled></div>
                                    </div>
                                    <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">Contact Person Name</p>
                                            <div class="form-group"><input class="form-control" type="text" name="customer_mobile" placeholder="Contact Person's Full Name" value="<?php echo $c_contactname ?>" required="" autofocus=""></div>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Gender</p>
                                        <select class="form-control" id="c_gender" name="customer_gender" value="<?php echo $c_gender ?>" required="" autofocus="">
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                            <option value="Others">Others</option>
                                        </select>
                                    </div>
									<div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Age</p>
                                        <div class="form-group"><input class="form-control" type="text" pattern="^[1-9]{1}[0-9]{1}$" name="customer_age" title="Enter your correct age between 18 to 99 years" placeholder="Your Age (Ex. 34)" value="<?php echo $c_age ?>" required="" autofocus=""></div>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Password</p>
                                        <div class="form-group"><input class="form-control" type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" name="customer_password" placeholder="Customer's Password" value="<?php echo $c_password ?>" required="" autofocus=""></div>
                                    </div>
                                </div>
                                <h4 class="m-b-20 m-t-40 p-b-5 b-b-default  f-w-600"><strong>Organization Address</strong></h4>
                                <div class="row">
                                <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">Street</p>
                                            <div class="form-group"><input class="form-control" type="text" name="customer_street" placeholder="Your Street" value="<?php echo $c_street ?>" required="" autofocus=""></div>
                                        </div>
									    <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">City</p>
                                            <div class="form-group"><input class="form-control" type="text" name="customer_city" placeholder="Your City" value="<?php echo $c_city ?>" required="" autofocus=""></div>
                                        </div>
									    <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">State</p>
                                            <div class="form-group"><input class="form-control" type="text" name="customer_state" placeholder="Your State" value="<?php echo $c_state ?>" required="" autofocus=""></div>
                                        </div>
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">Pincode</p>
                                            <div class="form-group"><input class="form-control" type="text" pattern="^[1-9]{1}[0-9]{5}" name="customer_pincode" title="Enter valid 6 digit Pincode (Ex. 5763XX)" placeholder="Your Pincode" value="<?php echo $c_pincode ?>" required="" autofocus=""></div>
                                        </div>
                                </div>
                                <h4 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600"><strong>Documents</strong></h4>
                                <div class="text-danger" id="aadhar-pan-error" ></div>
                                <div class="row">
                                    <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">PAN</p>
                                            <div class="form-group"><input class="form-control" type="text" pattern="[A-Z]{5}[0-9]{4}[A-Z]{1}"  title="Enter Valid Pan Card Number (Ex. AAAAA1111A)" name="customer_pan" placeholder="Your PAN Number" value="<?php echo $c_pan ?>" required="" autofocus=""></div>  
                                    </div>
                                    <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">Upload PAN</p>
                                            <input type="file" name="customer_panpdf" accept="application/pdf" id="c_panpdf">
                                    </div>
                                    <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">Upload Registration Document</p>
                                            <input type="file" name="customer_registration" accept="application/pdf" id="c_registration">
                                    </div>
								</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>		    
<?php
}
?>

<script type="text/javascript">
$("#editCustomerDetails").submit(function(e) {
    e.preventDefault();

    $.ajax({
        url: 'updateprofile-script.php',
        type: 'POST',
        data: $('#editCustomerDetails').serialize()+'&c_mobile=<?php echo $c_mobile?>',
        success: function(response){
            // if(response==5){
                // $("#registration-error").html("You have changed your company's name. Please upload new Registration Document.");
                // $("#pan-error").html("You have changed your pan number. Please upload proof of your new PAN Card.");
                // $("c_registration").attr("required","");
                // $("c_pan").attr("required","");
            // }

            if(response==4){
                $("#registration-error").html("You have changed your company's name. Please upload new Registration Document.");
                $("c_registration").attr("required","");
            }
            if(response==3){
                $("#aadhar-pan-error").html("You have changed your pan number. Please upload proof of your new PAN Card.");
                $("c_panpdf").attr("required","");
            }

            if(response==2){
                $("#aadhar-pan-error").html("You have changed your aadhar number. Please upload proof of your new Aadhar Card.");
                $("c_aadharpdf").attr("required","");
            }
            
            if(response==1){
                $("#aadhar-pan-error").html("You have changed your aadhar number and pan number. Please upload proof of your new Aadhar Card and new PAN Card.");
                $("c_aadharpdf").attr("required","");
                $("c_panpdf").attr("required","");
            }

            if(response==0){
                alert("Updated Successfully");
                location.replace('logout-script.php');
            }

        }
    })   
});       
</script>

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