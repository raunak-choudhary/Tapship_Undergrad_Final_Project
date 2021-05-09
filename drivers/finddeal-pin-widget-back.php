<?php
$d_mobile = $_POST['d_mobile'];
$d_pincode = $_POST['d_pincode'];

$res = shell_exec("python finddeal-pin.py $d_mobile $d_pincode");
$op = explode("\n", $res);

$url = file_get_contents('https://dev.virtualearth.net/REST/v1/Locations?countryRegion=IN&o=json&postalCode='.$d_pincode.'&maxResults=1&key=Alcd58ybycSq_3khfOUdGYo7AnC4PMT_03DlC6y8r7lcWZk7IwtK17LDNMq0_l3d');
$data = json_decode($url, true);
$lat = $data['resourceSets'][0]['resources'][0]['point']['coordinates'][0];
$long = $data['resourceSets'][0]['resources'][0]['point']['coordinates'][1];

$url = file_get_contents('http://dev.virtualearth.net/REST/v1/Locations/'.$lat.','.$long.'?&includeNeighborhood=1&o=json&key=Alcd58ybycSq_3khfOUdGYo7AnC4PMT_03DlC6y8r7lcWZk7IwtK17LDNMq0_l3d');
$data = json_decode($url, true);
$locaction = $data['resourceSets'][0]['resources'][0]['name'];

?>

<div class="container" style="background-color:#0c3823; padding-top:10px; border-radius:10px;">
    <h4 style="color:white; margin:5px; display: inline-block;">Filter Results :</h4>
    <p style="color:white; margin:5px; display: inline-block;">(showing for pincode)</p>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3">
            <div class="opt">
                <center>
                    <button class="btn btn-class btn-block" style="background-color:#90173f; color:#ffffff;"><a href="finddeal-pin.php" style="color:white;">Pincode (Address)</a></button>
                </center>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3">
            <div class="opt">
                <center>
                    <button class="btn btn-class btn-block" style="background-color:white;"><a href="finddeal-loc.php" style="color:black;">Live Location</a></but>
                </center>
            </div>
        </div>
        <div class=" col-xs-12 col-sm-12 col-md-12 col-lg-6">
            <div class="opt">
                <center>
                    <p style="border:2px white solid; color:white; padding:8px;">Result Location: <?php echo $locaction; ?></p>
                </center>
            </div>
        </div>
    </div>
</div>
<br>

<?php echo $op[0]; ?>
<br>