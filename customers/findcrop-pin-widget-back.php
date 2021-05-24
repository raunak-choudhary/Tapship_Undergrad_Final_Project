<?php

$c_mobile = $_POST['c_mobile'];
$c_pincode = $_POST['c_pincode'];

$url = file_get_contents('https://dev.virtualearth.net/REST/v1/Locations?countryRegion=IN&o=json&postalCode='.$c_pincode.'&maxResults=1&key=Alcd58ybycSq_3khfOUdGYo7AnC4PMT_03DlC6y8r7lcWZk7IwtK17LDNMq0_l3d');
$data = json_decode($url, true);
$lat = $data['resourceSets'][0]['resources'][0]['point']['coordinates'][0];
$long = $data['resourceSets'][0]['resources'][0]['point']['coordinates'][1];

$url = file_get_contents('http://dev.virtualearth.net/REST/v1/Locations/'.$lat.','.$long.'?&includeNeighborhood=1&o=json&key=Alcd58ybycSq_3khfOUdGYo7AnC4PMT_03DlC6y8r7lcWZk7IwtK17LDNMq0_l3d');
$data = json_decode($url, true);
$locaction = $data['resourceSets'][0]['resources'][0]['name'];

$res = shell_exec("python findcrop-pin.py $c_mobile $c_pincode");
$op = explode("\n",$res);
?>

<div class="container" style="background-color:#0c3823; padding-top:10px; border-radius:10px;">
  <div class="row">
  
    <div class=" col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="opt">
            <center>
            <h4 style="color:white; margin:5px; display: inline-block;">Filter Results :</h4><p style="color:white; margin:5px; display: inline-block;">(showing for pincode)</p>
            <p style="border:2px white solid; color:white; padding:8px; display: inline-block;">Result Location: <?php echo $locaction; ?></p>
            </center>
        </div>
    </div>
</div>
</div>
<br>

<?php echo $op[0]; ?>
<br>