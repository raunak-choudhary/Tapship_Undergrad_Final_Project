<?php
$f_mobile = $_POST['f_mobile'];
$f_pincode = $_POST['f_pincode'];

$py_res = shell_exec("python current_weather_forecast.py $f_mobile $f_pincode");
$op = explode("\n", $py_res);

?>



<div class="container">
    <div class="row" style="color:white; margin:10px; ">
        <div class="col-lg-1 col-md-12 col-sm-12" style="background-color:#7e090f; padding:20px;">
            <h5 class="lap">W</h5>
            <h5 class="lap">E</h5>
            <h5 class="lap">A</h5>
            <h5 class="lap">T</h5>
            <h5 class="lap">H</h5>
            <h5 class="lap">E</h5>
            <h5 class="lap">R</h5>
            <h4 class="mob" style="text-align:center">Weather Report</h4>
        </div>
        <div class="col-lg-3 col-md-12 col-sm-12" style="background-color:#1e5239; padding:20px;  height: 265px;">
            <h5><?php echo $op[0]; ?></h5>
            <span><strong><?php echo $op[1]; ?></strong></span><br>
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-map-pin location-icon">
                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                <circle cx="12" cy="10" r="3"></circle>
            </svg>
            <span></strong><?php echo $op[2]; ?></strong></span>
            <br><?php echo $op[3]; ?>
            <h1><?php echo $op[4]; ?></h1>
            <h5><?php echo $op[5]; ?></h5>
        </div>
        <div class="col-lg-5 col-md-12 col-sm-12" style="background-color:#092b1b; padding:20px; height: 265px;">
            <h5>Clouds &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: <?php echo $op[6]; ?> </h5>
            <h5>Humidity &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: <?php echo $op[7]; ?> </h5>
            <h5>Feels Like &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: <?php echo $op[8]; ?> </h5>
            <h5>Dew Point &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: <?php echo $op[9]; ?> </h5>
            <h5>Wind Speed &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: <?php echo $op[10]; ?> </h5>
            <h5>Sunrise Time &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: <?php echo $op[11]; ?> </h5>
            <h5>Sunset Time &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: <?php echo $op[12]; ?> </h5>
        </div>
        <div class="col-lg-3 col-md-12 col-sm-12" style="background-color:#1e5239; padding:20px;">
            <div class="lap"><br><br><br></div>
            <center>
            <h5>Weather Forecast</h5>
            <a href="weather_forecast.php"><button type="button" class="btn" style="background-color:white; color:black;">View Forecast</button></a>
            </center>
            <div class="lap"><br><br><br></div>
        </div>
    </div>
</div>