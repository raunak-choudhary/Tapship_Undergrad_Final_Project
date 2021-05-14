<?php

include('session-script.php');
$res = $_SESSION["sessionid"];
$d_mobile = $res;
if (!isset($_SESSION['login_driver'])) {
    header("location: login.php"); // Redirecting To Profile Page
}
error_reporting(0);
?>
<!doctype html>
<html>

<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>Edit Bid Details</title>
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
                        <li class="nav-item mx-0 mx-lg-1"><a href="../drivers/logout-script.php"><button class="btn btn-dark text-monospace" data-bs-hover-animate="pulse" type="button" style="margin: 10px;background: rgb(255,255,255);color: #0c3823;margin-left: 0;border-radius: 10px;">Log Out</button></a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <?php

         $con = mysqli_connect("b3bu9bb23ikjqsiv8aku-mysql.services.clever-cloud.com", "uodltp4afruoomkk", "WAniOzDcPXxfNZTCLGnl", "b3bu9bb23ikjqsiv8aku");
        if (!$con) {
            die(" Connection Error ");
        }

        $query = " select * from driver where d_mobile=" . $d_mobile . "";
        $result = mysqli_query($con, $query);

        while ($res = mysqli_fetch_assoc($result)) {
            $d_id =  $res['d_id'];
            $d_name =  $res['d_name'];
            $d_gender =  $res['d_gender'];
            $d_age =  $res['d_age'];
            $d_street =  $res['d_street'];
            $d_city =  $res['d_city'];
            $d_state =  $res['d_state'];
            $d_pincode =  $res['d_pincode'];
            $d_aadhar =  $res['d_aadhar'];
            $d_aadharpdf =  $res['d_aadharpdf'];
            $d_pan =  $res['d_pan'];
            $d_panpdf =  $res['d_panpdf'];
            $d_dlnumber =  $res['d_dlnumber'];
            $d_dlpdf =  $res['d_dlpdf'];
            $d_vehiclenumber =  $res['d_vehiclenumber'];
            $d_vehiclercpdf =  $res['d_vehiclercpdf'];
            $d_lat =  $res['d_lat'];
            $d_long =  $res['d_long'];
            $d_photo =  $res['d_photo'];
            $d_approve =  $res['d_approve'];
            $d_password =  $res['d_password'];
        }
        ?>

        <div class="features-boxed">
            <div class="container" style="background: #ffffff;">
                <div class="intro" style="background: #0c3823;margin-top: 120px;margin-bottom: 30px;">
                    <h2 class="text-center" data-aos="fade" style="color: rgb(255,255,255);padding: 30px;margin-bottom: 0px;">Edit Bid Details</h2>
                </div>
            </div>
        </div>


        <div class="padding">
            <div class="row container d-flex justify-content-center">
                <form id="editDriverDetails">
                    <div class="col-xl-12 col-md-12">
                        <div class="card user-card-full">
                            <div class="row m-l-0 m-r-0">
                                <div class="col-md-4 bg-c-lite-green user-profile">
                                    <div class="card-block text-center text-white">
                                        <div class="m-b-25"> <img src="../drivers/<?php echo  $d_photo; ?>" width="200" height="240" align="center" class="img-radius" alt="User-Profile-Image"> </div>
                                        <h3 class="f-w-600"><?php echo "$d_name" ?></h3>
                                        <h5>Driver</h5>
                                        <h5>Status: <?php if ($d_approve == "1") {
                                                        echo "No Action";
                                                    } else if ($d_approve == "2") {
                                                        echo " Accepted";
                                                    } else if ($d_approve == "3") {
                                                        echo "Review";
                                                    } else if ($d_approve == "4") {
                                                        echo "Rejected";
                                                    } else if ($d_approve == "5") {
                                                        echo "Resubmitted";
                                                    } else {
                                                        echo "Multiple Login State";
                                                    } ?></h5>
                                        <br><br><br><br><br><br><br><br><br><br><br><br><br>
                                        <button class="btn btn-primary btn-block" type="submit" name="update">Update</button>
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="card-block">
                                        <h4 class="m-b-20 p-b-5 b-b-default f-w-600"><strong>Information</strong></h4>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <p class="m-b-10 f-w-600">Name</p>
                                                <div class="form-group"><input class="form-control" type="text" name="driver_name" placeholder="Driver's Name" value="<?php echo $d_name ?>" required="" autofocus=""></div>
                                            </div>
                                            <div class="col-sm-6">
                                                <p class="m-b-10 f-w-600">Mobile</p>
                                                <div class="form-group"><input class="form-control" type="text" name="driver_mobile" placeholder="Driver's Mobile" value="<?php echo $d_mobile ?>" required="" autofocus="" disabled></div>
                                            </div>
                                            <div class="col-sm-6">
                                                <p class="m-b-10 f-w-600">Gender</p>
                                                <select class="form-control" id="d_gender" name="driver_gender" value="<?php echo $d_gender ?>" required="" autofocus="">
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                    <option value="Others">Others</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-6">
                                                <p class="m-b-10 f-w-600">Age</p>
                                                <div class="form-group"><input class="form-control" type="text" pattern="^[1-9]{1}[0-9]{1}$" name="driver_age" title="Enter your correct age between 18 to 99 years" placeholder="Your Age (Ex. 34)" value="<?php echo $d_age ?>" required="" autofocus=""></div>
                                            </div>
                                            <div class="col-sm-6">
                                                <p class="m-b-10 f-w-600">Password</p>
                                                <div class="form-group"><input class="form-control" type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" name="driver_password" placeholder="Driver's Password" value="<?php echo $d_password ?>" required="" autofocus=""></div>
                                            </div>
                                        </div>
                                        <h4 class="m-b-20 m-t-40 p-b-5 b-b-default  f-w-600"><strong>Address</strong></h4>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <p class="m-b-10 f-w-600">Street</p>
                                                <div class="form-group"><input class="form-control" type="text" name="driver_street" placeholder="Your Street" value="<?php echo $d_street ?>" required="" autofocus=""></div>
                                            </div>
                                            <div class="col-sm-6">
                                                <p class="m-b-10 f-w-600">City</p>
                                                <div class="form-group"><input class="form-control" type="text" name="driver_city" placeholder="Your City" value="<?php echo $d_city ?>" required="" autofocus=""></div>
                                            </div>
                                            <div class="col-sm-6">
                                                <p class="m-b-10 f-w-600">State</p>
                                                <div class="form-group"><input class="form-control" type="text" name="driver_state" placeholder="Your State" value="<?php echo $d_state ?>" required="" autofocus=""></div>
                                            </div>
                                            <div class="col-sm-6">
                                                <p class="m-b-10 f-w-600">Pincode</p>
                                                <div class="form-group"><input class="form-control" type="text" pattern="^[1-9]{1}[0-9]{5}" name="driver_pincode" title="Enter valid 6 digit Pincode (Ex. 5763XX)" placeholder="Your Pincode" value="<?php echo $d_pincode ?>" required="" autofocus=""></div>
                                            </div>
                                        </div>
                                        <h4 class="m-b-20 m-t-40 p-b-5 b-b-default  f-w-600"><strong>Documents</strong></h4>
                                        <div class="text-danger" id="document-error"></div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <p class="m-b-10 f-w-600">Aadhaar</p>
                                                <div class="form-group"><input class="form-control" type="text" pattern="^[2-9]{1}[0-9]{11}$" title="Enter 12 digit Aadhar Number (Ex. 2345678382XX)" name="driver_aadhar" placeholder="Your Aadhar Number" value="<?php echo $d_aadhar ?>" required="" autofocus=""></div>
                                            </div>
                                            <div class="col-sm-6">
                                                <p class="m-b-10 f-w-600">Upload Aadhaar</p>
                                                <input type="file" name="driver_aadharpdf" accept="application/pdf" id="d_aadharpdf">
                                            </div>
                                            <div class="col-sm-6">
                                                <p class="m-b-10 f-w-600">PAN</p>
                                                <div class="form-group"><input class="form-control" type="text" pattern="[A-Z]{5}[0-9]{4}[A-Z]{1}" title="Enter Valid Pan Card Number (Ex. AAAAA1111A)" name="driver_pan" placeholder="Your PAN Number" value="<?php echo $d_pan ?>" required="" autofocus=""></div>
                                            </div>
                                            <div class="col-sm-6">
                                                <p class="m-b-10 f-w-600">Upload PAN</p>
                                                <input type="file" name="driver_panpdf" accept="application/pdf" id="d_panpdf">
                                            </div>
                                            <div class="col-sm-6">
                                                <p class="m-b-10 f-w-600">Driving Licence Number</p>
                                                <div class="form-group"><input class="form-control" type="text" pattern="^[A-Z]{2}[0-9]{13}$" title="Enter Valid Driving Licence Number (Ex. RJ43278905431XX)" name="driver_dlnumber" placeholder="Your Driving Licence Number" value="<?php echo $d_dlnumber ?>" required="" autofocus=""></div>
                                            </div>
                                            <div class="col-sm-6">
                                                <p class="m-b-10 f-w-600">Upload Driving Licence</p>
                                                <input type="file" name="driver_dlpdf" accept="application/pdf" id="d_dlpdf">
                                            </div>
                                            <div class="col-sm-6">
                                                <p class="m-b-10 f-w-600">Vehicle Number</p>
                                                <div class="form-group"><input class="form-control" type="text" pattern="[A-Z]{2}[0-9]{2}[A-Z]{2}[0-9]{2\4}" title="Enter Vehicle Number (Ex. KA20CE1111)" name="driver_vehiclenumber" placeholder="Your Vehicle Number" value="<?php echo $d_vehiclenumber ?>" required="" autofocus=""></div>
                                            </div>
                                            <div class="col-sm-6">
                                                <p class="m-b-10 f-w-600">Upload Vehicle's RC Book</p>
                                                <input type="file" name="driver_vehiclercpdf" accept="application/pdf" id="d_vehiclercpdf">
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
    </div>

    <div class="modal fade" id="myModal" data-backdrop="static" style="position: fixed;width: 100%;height: 100%;overflow: auto;background-color: rgb(0,0,0);background-color: rgba(0,0,0,0.4);">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content" style="position: relative;margin: auto;padding: 0;border: 1px solid #888;width: 100%;box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);">
                <!-- Modal Header -->
                <div class="modal-header" style="background-color: #0c3823;color: white;">
                    <h4 class="modal-title">Message</h4>
                    <button type="button" class="close" onclick="pageRedirect()">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    Updated Successfully. You will be logged out after this update. Please login again to access your account.
                </div>
                <!-- Modal footer -->
                <div class="modal-footer" style="padding:2px 16px;background-color: #0c3823;color: white;">
                    <button type="button" class="btn btn-danger" onclick="pageRedirect()">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $("#editDriverDetails").submit(function(e) {
            e.preventDefault();

            var file_data_aadhar = $('#d_aadharpdf').prop('files')[0];
            var file_data_pan = $('#d_panpdf').prop('files')[0];
            var file_data_dlfile = $('#d_dlpdf').prop('files')[0];
            var file_data_vehiclerc = $('#d_vehiclercpdf').prop('files')[0];

            var formData = new FormData(this);
            formData.append('d_mobile', '<?php echo $d_mobile; ?>');
            formData.append('driver_aadharfile', file_data_aadhar);
            formData.append('driver_panfile', file_data_pan);
            formData.append('driver_dlfile', file_data_dlfile);
            formData.append('driver_vehiclercfile', file_data_vehiclerc);

            $.ajax({
                url: 'updateprofile-script.php',
                type: 'POST',
                data: formData,
                contentType: false,
                cache: false,
                processData: false,
                success: function(response) {
                    if (response == 4) {
                        $("#document-error").html("You have changed your vehicle number. Please upload proof of RC Card of your new vehicle number.");
                        $("d_vehiclercpdf").attr("required", "");
                    }
                    if (response == 3) {
                        $("#document-error").html("You have changed your driving license number. Please upload proof of your new Driving Licence Card.");
                        $("d_dlpdf").attr("required", "");
                    }
                    if (response == 2) {
                        $("#document-error").html("You have changed your pan number. Please upload proof of your new PAN Card.");
                        $("d_panpdf").attr("required", "");
                    }
                    if (response == 1) {
                        $("#document-error").html("You have changed your aadhar number. Please upload proof of your new Aadhar Card.");
                        $("d_aadharpdf").attr("required", "");
                    }
                    if (response == 0) {
                        $("#myModal").modal();
                    }
                }
            })
        });

        function pageRedirect() {
            location.replace('logout-script.php');
        }
    </script>


    <div class="footer-dark fixed-bottom" style="background: rgb(12,56,35);">
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