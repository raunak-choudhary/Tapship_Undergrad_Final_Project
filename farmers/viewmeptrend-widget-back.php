<?php
$id = $_POST['id'];
$con = mysqli_connect("localhost", "root", "", "tapship");
$q = "select cro_name, cro_type, cro_costperkg, cro_msp from cropdetails where cro_id=$id";
$query = mysqli_query($con, $q);
 while ($res = mysqli_fetch_array($query)) {
    $cro_name = $res['cro_name'];
    $cro_type = $res['cro_type'];
    $cro_costperkg = $res['cro_costperkg'];
    $cro_msp = $res['cro_msp'];
}


$res = shell_exec("python viewmeptrend.py $id");
$op = explode("\n", $res);

?>

<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>Crop Details</title>
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
    <link href='https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/3.6.95/css/materialdesignicons.css' rel='stylesheet'>

    <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>

    <style>
    img{
        width:100%;
    }

    </style>


</head>

<div class="padding">
    <div class="row container d-flex justify-content-center" >
        <div class="col-xl-12 col-md-12">
            <div class="card user-card-full">
                <div class="row m-l-0 m-r-0">
                    <div class="col-sm-12 col-md-12 col">
                        <div class="card-block">
                        <h5>MEP Trend - <?php echo $cro_name;?></h5><hr>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Crop Name</p>
                                        <h6 class="text-muted f-w-400"><?php echo "$cro_name" ?></h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Crop Type</p>
                                        <h6 class="text-muted f-w-400"><?php echo "$cro_type" ?></h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Crop Cost Per Kgs.</p>
                                        <h6 class="text-muted f-w-400"><?php echo "$cro_costperkg" ?></h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Crop MSP</p>
                                        <h6 class="text-muted f-w-400"><?php echo "$cro_msp" ?></h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Last 5 Transaction Price</p>
                                        <h6 class="text-muted f-w-400"><?php echo '₹ ', $op[0]; ?><?php echo ' ₹ ', $op[1]; ?><?php echo ' ₹ ', $op[2]; ?><?php echo ' ₹ ', $op[3]; ?><?php echo ' ₹ ', $op[4]; ?></h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Crop Average MSP</p>
                                        <h6 class="text-muted f-w-400"><?php echo '₹ ',$op[5]; ?></h6>
                                    </div>

                                    <div class="col-sm-12">
                                        <p class="m-b-10 f-w-600">Crop Trend Bar Graph</p>
                                        <div><?php echo $op[6]; ?></div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>