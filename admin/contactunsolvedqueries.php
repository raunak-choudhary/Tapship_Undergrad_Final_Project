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
    <title>Contact Us Queries</title>
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
    <link rel="stylesheet" href="../assets/css/card-hover.css">
</head>

<style type="text/css">
    .modal-confirm {        
    color: #636363;
    width: 325px;
}
.modal-confirm .modal-content {
    padding: 20px;
    border-radius: 5px;
    border: none;
}
.modal-confirm .modal-header {
    border-bottom: none;   
    position: relative;
}
.modal-confirm h4 {
    text-align: center;
    font-size: 26px;
    margin: 30px 0 -15px;
}
.modal-confirm .form-control, .modal-confirm .btn {
    min-height: 40px;
    border-radius: 3px; 
}
.modal-confirm .close {
    position: absolute;
    top: -5px;
    right: -5px;
}   
.modal-confirm .modal-footer {
    border: none;
    text-align: center;
    border-radius: 5px;
    font-size: 13px;
}   
.modal-confirm .icon-box {
    color: #fff;        
    position: absolute;
    margin: 0 auto;
    left: 0;
    right: 0;
    top: -70px;
    width: 95px;
    height: 95px;
    border-radius: 50%;
    z-index: 9;
    background: #ef513a;
    padding: 15px;
    text-align: center;
    box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);
}
.modal-confirm .icon-box i {
    font-size: 56px;
    position: relative;
    top: 4px;
}
.modal-confirm.modal-dialog {
    margin-top: 80px;
}
.modal-confirm .btn {
    color: #fff;
    border-radius: 4px;
    background: #ef513a;
    text-decoration: none;
    transition: all 0.4s;
    line-height: normal;
    border: none;
}
.modal-confirm .btn:hover, .modal-confirm .btn:focus {
    background: #da2c12;
    outline: none;
}
.trigger-btn {
    display: inline-block;
    margin: 100px auto;
}
</style>

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
                    <li class="nav-item mx-0 mx-lg-1"><a href="contactsolvedqueries.php"><button class="btn btn-dark text-monospace" data-bs-hover-animate="pulse" type="button" style="margin: 10px;background: rgb(255,255,255);color: #0c3823;margin-left: 0;border-radius: 10px;">View Solved Queries</button></a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a href="updateprofile.php?a_name=<?php echo $a_name; ?>"><button class="btn btn-dark text-monospace" data-bs-hover-animate="pulse" type="button" style="margin: 10px;background: rgb(255,255,255);color: #0c3823;margin-left: 0;border-radius: 10px;">View Profile</button></a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a href="../admin/logout-script.php"><button class="btn btn-dark text-monospace" data-bs-hover-animate="pulse" type="button" style="margin: 10px;background: rgb(255,255,255);color: #0c3823;margin-left: 0;border-radius: 10px;">Log Out</button></a></li>
                </ul>
            </div>
        </div>
    </nav>


    <div class="features-boxed">
        <div class="container-fluid" style="background: #ffffff;">
            <div class="intro" style="background: #0c3823;margin-top: 120px;margin-bottom: 30px; max-width:1000px;">
                <h2 class="text-center" data-aos="fade" style="color: rgb(255,255,255);padding: 30px;margin-bottom: 0px;">Contact Us Unsolved Queries</h2>
            </div>
        </div>
    </div>
    <br><br>

    <?php
    $con = mysqli_connect("localhost", "root", "", "tapship");
    if (!$con) {
        die(" Connection Error ");
    }
    $query = "SELECT * FROM contactus where u_status = '0'";
    $res = mysqli_query($con, $query);
    ?>

    <div class="container-fluid">
        <div class="row" style="margin-top: 10px;">
            <?php while ($row = mysqli_fetch_assoc($res)) { ?>
                <div class="col-md-12 col-xl-6 mb-6 my-3" id="query-id-<?php echo $row['u_id'] ?>">
                    <div class="card">
                        <div class="card-header">
                            <h2><?php echo $row['u_subject']; ?></h2>
                        </div>
                        <div class="card-body"><?php echo $row['u_name'] ?><span style="float: right"><?php echo $row['u_mobile']; ?></span></div>
                        <hr style="width:100%;margin: 0.1em auto;">
                        <div class="card-body"><?php echo $row['u_address']; ?><span style="float: right"><?php echo $row['u_date'] . " " . $row['u_time']; ?></span></div>
                        <div class="card-footer" style=""><?php echo $row['u_email'] ?><button class="btn btn-primary float-right " type="button" data-toggle="modal" data-target="#mszModal-<?php echo $row['u_id']; ?>" style="background-color: rgb(52,57,72); width: 200px;">View Message</button></div>
                    </div>
                </div>
                <!-- The Modal -->
                <div class="modal fade" id="mszModal-<?php echo $row['u_id']; ?>" data-backdrop="static" style="position: fixed;width: 100%;height: 100%;overflow: auto;background-color: rgb(0,0,0);background-color: rgba(0,0,0,0.4);">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content" style="position: relative;margin: auto;padding: 0;border: 1px solid #888;width: 100%;box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);">
                            <!-- Modal Header -->
                            <div class="modal-header" style="background-color: #0c3823;color: white;">
                                <h4 class="modal-title">Message</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <!-- Modal body -->
                            <div class="modal-body">
                                <?php echo $row['u_message']; ?>
                            </div>
                            <!-- Modal footer -->
                            <div class="modal-footer" style="padding:2px 16px;background-color: #0c3823;color: white;">
                                <button type="button" class="btn btn-info markAsSolvedBtn" message-id="<?php echo $row['u_id'];?>">Mark as Solved</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>


<!-- Modal HTML -->
<div id="successModal" class="modal fade">
    <div class="modal-dialog modal-confirm">
        <div class="modal-content">
            <div class="modal-header">
                <div class="icon-box">
                <i class="fa fa-check"></i>
                </div>              
                <h4 class="modal-title w-100">Success!</h4>   
            </div>
            <div class="modal-body">
                <p class="text-center">Query has been marked as solved</p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-danger btn-block" data-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div> 


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript">
        $('.markAsSolvedBtn').click(function(){
            var messageID=$(this).attr('message-id');
            $.ajax({
                url: "mark-as-contact-solved-queries.php",
                method: "POST",
                data: "mszID="+messageID,
                success: function(data){
                    if(data=="success"){
                        $('#successModal').modal('show');
                        $('#mszModal-'+messageID).modal('hide');
                        $('#query-id-'+messageID).fadeOut(500);
                    }
                }
            })
        })
        
        
    </script>

    <div class="footer-dark" style="background: rgb(12,56,35); margin-top: 30px;">
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