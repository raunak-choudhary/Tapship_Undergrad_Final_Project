<?php
$f_mobile = $_POST['f_mobile'];
$f_pincode = $_POST['f_pincode'];

$py_res = shell_exec("python weather_forecast.py $f_mobile $f_pincode");
$op = explode("\n", $py_res);

?>

<div class="container-fluid">
    <div class="row" style="color:white; margin:10px;">
        <div class="col-lg-3 col-md-12 col-sm-12" style="background-color:#7e090f; padding:15px; height: 430px;">
            <h6><?php echo $op[0]; ?></h6>
            <h6><?php echo $op[1]; ?></h6>
            <?php echo $op[2]; ?>
            <h2><?php echo $op[3]; ?></h2>
            <h6>Weather Type : <?php echo $op[4]; ?> </h6>
            <h6>Clouds : <?php echo $op[5]; ?> </h6>
            <h6>Humidity : <?php echo $op[6]; ?> </h6>
            <h6>Dew Point : <?php echo $op[7]; ?> </h6>
            <h6>Wind Speed : <?php echo $op[8]; ?> </h6>
            <h6>Sunrise Time : <?php echo $op[9]; ?> </h6>
            <h6>Sunset Time : <?php echo $op[10]; ?> </h6>
            <h6>Maximum Temperature : <?php echo $op[11]; ?> </h6>
            <h6>Minimum Temperature : <?php echo $op[12]; ?> </h6>
        </div>
        <div class="col-lg-3 col-md-12 col-sm-12" style="background-color:#1e5239; padding:15px;   height: 430px;">
            <h6><?php echo $op[13]; ?></h6>
            <h6><?php echo $op[14]; ?></h6>
            <?php echo $op[15]; ?>
            <h2><?php echo $op[16]; ?></h2>
            <h6>Weather Type : <?php echo $op[17]; ?> </h6>
            <h6>Clouds : <?php echo $op[18]; ?> </h6>
            <h6>Humidity : <?php echo $op[19]; ?> </h6>
            <h6>Dew Point : <?php echo $op[20]; ?> </h6>
            <h6>Wind Speed : <?php echo $op[21]; ?> </h6>
            <h6>Sunrise Time : <?php echo $op[22]; ?> </h6>
            <h6>Sunset Time : <?php echo $op[23]; ?> </h6>
            <h6>Maximum Temperature : <?php echo $op[24]; ?> </h6>
            <h6>Minimum Temperature : <?php echo $op[25]; ?> </h6>
        </div>
        <div class="col-lg-3 col-md-12 col-sm-12" style="background-color:#092b1b; padding:15px;   height: 430px;">
            <h6><?php echo $op[26]; ?></h6>
            <h6><?php echo $op[27]; ?></h6>
            <?php echo $op[28]; ?>
            <h2><?php echo $op[29]; ?></h2>
            <h6>Weather Type : <?php echo $op[30]; ?> </h6>
            <h6>Clouds : <?php echo $op[31]; ?> </h6>
            <h6>Humidity : <?php echo $op[32]; ?> </h6>
            <h6>Dew Point : <?php echo $op[33]; ?> </h6>
            <h6>Wind Speed : <?php echo $op[34]; ?> </h6>
            <h6>Sunrise Time : <?php echo $op[35]; ?> </h6>
            <h6>Sunset Time : <?php echo $op[36]; ?> </h6>
            <h6>Maximum Temperature : <?php echo $op[37]; ?> </h6>
            <h6>Minimum Temperature : <?php echo $op[38]; ?> </h6>
        </div>
        <div class="col-lg-3 col-md-12 col-sm-12" style="background-color:#1e5239; padding:15px;   height: 430px;">
            <h6><?php echo $op[39]; ?></h6>
            <h6><?php echo $op[40]; ?></h6>
            <?php echo $op[41]; ?>
            <h2><?php echo $op[42]; ?></h2>
            <h6>Weather Type : <?php echo $op[43]; ?> </h6>
            <h6>Clouds : <?php echo $op[44]; ?> </h6>
            <h6>Humidity : <?php echo $op[45]; ?> </h6>
            <h6>Dew Point : <?php echo $op[46]; ?> </h6>
            <h6>Wind Speed : <?php echo $op[47]; ?> </h6>
            <h6>Sunrise Time : <?php echo $op[48]; ?> </h6>
            <h6>Sunset Time : <?php echo $op[49]; ?> </h6>
            <h6>Maximum Temperature : <?php echo $op[50]; ?> </h6>
            <h6>Minimum Temperature : <?php echo $op[51]; ?> </h6>
        </div>
    </div>
    <br>
    <div class="row" style="color:white; margin:10px; ">
        <div class="col-lg-3 col-md-12 col-sm-12" style="background-color:#092b1b; padding:15px;   height: 430px;">
            <h6><?php echo $op[52]; ?></h6>
            <h6><?php echo $op[53]; ?></h6>
            <?php echo $op[54]; ?>
            <h2><?php echo $op[55]; ?></h2>
            <h6>Weather Type : <?php echo $op[56]; ?> </h6>
            <h6>Clouds : <?php echo $op[57]; ?> </h6>
            <h6>Humidity : <?php echo $op[58]; ?> </h6>
            <h6>Dew Point : <?php echo $op[59]; ?> </h6>
            <h6>Wind Speed : <?php echo $op[60]; ?> </h6>
            <h6>Sunrise Time : <?php echo $op[61]; ?> </h6>
            <h6>Sunset Time : <?php echo $op[62]; ?> </h6>
            <h6>Maximum Temperature : <?php echo $op[63]; ?> </h6>
            <h6>Minimum Temperature : <?php echo $op[64]; ?> </h6>
        </div>
        <div class="col-lg-3 col-md-12 col-sm-12" style="background-color:#1e5239; padding:15px;   height: 430px;">
            <h6><?php echo $op[65]; ?></h6>
            <h6><?php echo $op[66]; ?></h6>
            <?php echo $op[67]; ?>
            <h2><?php echo $op[68]; ?></h2>
            <h6>Weather Type : <?php echo $op[69]; ?> </h6>
            <h6>Clouds : <?php echo $op[70]; ?> </h6>
            <h6>Humidity : <?php echo $op[71]; ?> </h6>
            <h6>Dew Point : <?php echo $op[72]; ?> </h6>
            <h6>Wind Speed : <?php echo $op[73]; ?> </h6>
            <h6>Sunrise Time : <?php echo $op[74]; ?> </h6>
            <h6>Sunset Time : <?php echo $op[75]; ?> </h6>
            <h6>Maximum Temperature : <?php echo $op[76]; ?> </h6>
            <h6>Minimum Temperature : <?php echo $op[77]; ?> </h6>
        </div>
        <div class="col-lg-3 col-md-12 col-sm-12" style="background-color:#092b1b; padding:15px;   height: 430px;">
            <h6><?php echo $op[78]; ?></h6>
            <h6><?php echo $op[79]; ?></h6>
            <?php echo $op[80]; ?>
            <h2><?php echo $op[81]; ?></h2>
            <h6>Weather Type : <?php echo $op[82]; ?> </h6>
            <h6>Clouds : <?php echo $op[83]; ?> </h6>
            <h6>Humidity : <?php echo $op[84]; ?> </h6>
            <h6>Dew Point : <?php echo $op[85]; ?> </h6>
            <h6>Wind Speed : <?php echo $op[86]; ?> </h6>
            <h6>Sunrise Time : <?php echo $op[87]; ?> </h6>
            <h6>Sunset Time : <?php echo $op[88]; ?> </h6>
            <h6>Maximum Temperature : <?php echo $op[89]; ?> </h6>
            <h6>Minimum Temperature : <?php echo $op[90]; ?> </h6>
        </div>
        <div class="col-lg-3 col-md-12 col-sm-12" style="background-color:#1e5239; padding:15px;   height: 430px;">
            <h6><?php echo $op[91]; ?></h6>
            <h6><?php echo $op[92]; ?></h6>
            <?php echo $op[93]; ?>
            <h2><?php echo $op[94]; ?></h2>
            <h6>Weather Type : <?php echo $op[95]; ?> </h6>
            <h6>Clouds : <?php echo $op[96]; ?> </h6>
            <h6>Humidity : <?php echo $op[97]; ?> </h6>
            <h6>Dew Point : <?php echo $op[98]; ?> </h6>
            <h6>Wind Speed : <?php echo $op[99]; ?> </h6>
            <h6>Sunrise Time : <?php echo $op[100]; ?> </h6>
            <h6>Sunset Time : <?php echo $op[101]; ?> </h6>
            <h6>Maximum Temperature : <?php echo $op[102]; ?> </h6>
            <h6>Minimum Temperature : <?php echo $op[103]; ?> </h6>
        </div>
    </div>
</div>