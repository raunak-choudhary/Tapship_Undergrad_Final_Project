<?php

include('session-script.php');
$res = $_SESSION["sessionid"];
$a_name = $res;
if (!isset($_SESSION['login_admin'])) {
    header("location: login.php"); // Redirecting To Profile Page
}
error_reporting(0);
?>
<!doctype html>
<html>

<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>KIOSK Agent Update Profile</title>
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

        $k_mobile = $_GET['k_mobile'];
        $query = " select * from kiosk where k_mobile=" . $k_mobile . "";
        $result = mysqli_query($con, $query);

        while ($res = mysqli_fetch_assoc($result)) {
            $k_id =  $res['k_id'];
            $k_name =  $res['k_name'];
            $k_gender =  $res['k_gender'];
            $k_age =  $res['k_age'];
            $k_address =  $res['k_address'];
            $k_district =  $res['k_district'];
            $k_state =  $res['k_state'];
            $k_pincode =  $res['k_pincode'];
            $k_aadhar =  $res['k_aadhar'];
            $k_aadharpdf =  $res['k_aadharpdf'];
            $k_photo =  $res['k_photo'];
        }
        ?>

        <div class="features-boxed">
            <div class="container" style="background: #ffffff;">
                <div class="intro" style="background: #0c3823;margin-top: 120px;margin-bottom: 30px;">
                    <h2 class="text-center" data-aos="fade" style="color: rgb(255,255,255);padding: 30px;margin-bottom: 0px;">Update KIOSK Agent Profile</h2>
                </div>
            </div>
        </div>


        <div class="padding">
            <div class="row container d-flex justify-content-center">
                <form id="editAgentDetails">
                    <div class="col-xl-12 col-md-12">
                        <div class="card user-card-full">
                            <div class="row m-l-0 m-r-0">
                                <div class="col-md-4 bg-c-lite-green user-profile">
                                    <div class="card-block text-center text-white">
                                        <div class="m-b-25"> <img src="<?php echo  $k_photo; ?>" width="200" height="240" align="center" class="img-radius" alt="Agent-Profile-Image"> </div>
                                        <h3 class="f-w-600"><?php echo "$k_name" ?></h3>
                                        <h5>KIOSK Center Agent</h5>
                                        <br><br>
                                        <button class="btn btn-info btn-block" type="submit" name="update">Update</button>
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="card-block">
                                        <h4 class="m-b-20 p-b-5 b-b-default f-w-600"><strong>Information</strong></h4>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <p class="m-b-10 f-w-600">Name</p>
                                                <div class="form-group"><input class="form-control" type="text" name="kiosk_name" placeholder="KIOSK Agent Name" value="<?php echo $k_name ?>" required="" autofocus=""></div>
                                            </div>
                                            <div class="col-sm-6">
                                                <p class="m-b-10 f-w-600">Mobile</p>
                                                <div class="form-group"><input class="form-control" type="text" name="kiosk_mobile" placeholder="KIOSK Agent Mobile" value="<?php echo $k_mobile ?>" required="" autofocus="" disabled></div>
                                            </div>
                                            <div class="col-sm-6">
                                                <p class="m-b-10 f-w-600">Gender</p>
                                                <select class="form-control" id="k_gender" name="kiosk_gender" value="<?php echo $k_gender ?>" required="" autofocus="">
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                    <option value="Others">Others</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-6">
                                                <p class="m-b-10 f-w-600">Age</p>
                                                <div class="form-group"><input class="form-control" type="text" pattern="^[1-9]{1}[0-9]{1}$" name="kiosk_age" title="Enter agent's correct age between 18 to 99 years" placeholder="KIOSK Agent's Age (Ex. 34)" value="<?php echo $k_age ?>" required="" autofocus=""></div>
                                            </div>
                                        </div>
                                        <h4 class="m-b-20 m-t-40 p-b-5 b-b-default  f-w-600"><strong>Address</strong></h4>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <p class="m-b-10 f-w-600">Address</p>
                                                <div class="form-group"><input class="form-control" type="text" name="kiosk_address" placeholder="KIOSK Agent's Address" value="<?php echo $k_address ?>" required="" autofocus=""></div>
                                            </div>
                                            <div class="col-sm-6">
                                                <p class="m-b-10 f-w-600">District</p>
                                                <div class="form-group"><input class="form-control" type="text" name="kiosk_district" placeholder="KIOSK Agent's District" value="<?php echo $k_district ?>" required="" autofocus=""></div>
                                            </div>
                                            <div class="col-sm-6">
                                                <p class="m-b-10 f-w-600">State</p>
                                                <div class="form-group"><input class="form-control" type="text" name="kiosk_state" placeholder="KIOSK Agent's State" value="<?php echo $k_state ?>" required="" autofocus=""></div>
                                            </div>
                                            <div class="col-sm-6">
                                                <p class="m-b-10 f-w-600">Pincode</p>
                                                <div class="form-group"><input class="form-control" type="text" pattern="^[1-9]{1}[0-9]{5}" name="kiosk_pincode" title="Enter valid 6 digit Pincode (Ex. 5763XX)" placeholder="KIOSK Agent's Pincode" value="<?php echo $k_pincode ?>" required="" autofocus=""></div>
                                            </div>
                                        </div>
                                        <h4 class="m-b-20 m-t-40 p-b-5 b-b-default  f-w-600"><strong>Documents</strong></h4>
                                        <div class="text-danger" id="aadhar-error"></div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <p class="m-b-10 f-w-600">Aadhaar</p>
                                                <div class="form-group"><input class="form-control" type="text" pattern="^[2-9]{1}[0-9]{11}$" title="Enter 12 digit Aadhar Number (Ex. 2345678382XX)" name="kiosk_aadhar" placeholder="KIOSK Agent's Aadhar Number" value="<?php echo $k_aadhar ?>" required="" autofocus=""></div>
                                            </div>
                                            <div class="col-sm-6">
                                                <p class="m-b-10 f-w-600">Upload Aadhaar</p>
                                                <input type="file" name="kiosk_aadharpdf" accept="application/pdf" id="k_aadharpdf">
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
                    KIOSK Agent's Profile Updated Successfully.
                </div>
                <!-- Modal footer -->
                <div class="modal-footer" style="padding:2px 16px;background-color: #0c3823;color: white;">
                    <button type="button" class="btn btn-danger" onclick="pageRedirect()">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $("#editAgentDetails").submit(function(e) {
            e.preventDefault();

            var file_data_aadhar = $('#k_aadharpdf').prop('files')[0];

            var formData = new FormData(this);
            formData.append('k_mobile', '<?php echo $k_mobile; ?>');
            formData.append('kiosk_aadharfile', file_data_aadhar);

            $.ajax({
                url: 'updateagentprofile-script.php',
                type: 'POST',
                data: formData,
                contentType: false,
                cache: false,
                processData: false,
                success: function(response) {
                    if (response == 1) {
                        $("#aadhar-error").html("You have changed your aadhar number. Please upload proof of your new Aadhar Card.");
                        $("k_aadharpdf").attr("required", "");
                    }

                    if (response == 0) {
                        $("#myModal").modal();
                    }
                }
            })
        });

        function pageRedirect() {
            location.replace('kioskdetails.php');
        }
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