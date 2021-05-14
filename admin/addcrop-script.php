<?php

include('session-script.php');
$res = $_SESSION["sessionid"];
$a_name = $res;
if (!isset($_SESSION['login_admin'])) {
    header("location: login.php"); // Redirecting To Profile Page
}
?>
<?php
//error_reporting(0);
$con = mysqli_connect("b3bu9bb23ikjqsiv8aku-mysql.services.clever-cloud.com", "uodltp4afruoomkk", "WAniOzDcPXxfNZTCLGnl", "b3bu9bb23ikjqsiv8aku");

//Create Connection


if (isset($_POST["submit"])) {
    #retrieve file title
    $crop_type = $con->real_escape_string($_POST['crop_type']);
    $crop_name = $con->real_escape_string($_POST['crop_name']);
    $crop_cost = $con->real_escape_string($_POST['crop_cost']);

    $crop_msp = round($crop_cost * 1.5);
    #sql query to insert into database
    $query = "INSERT into cropdetails(cro_name,cro_type,cro_costperkg,cro_msp) VALUES('$crop_name','$crop_type','$crop_cost','$crop_msp')";
    $success = $con->query($query);
    if ($success) {
        $query = "SELECT cro_id from cropdetails where cro_name= '$crop_name' and cro_type='$crop_type'";
        $result = mysqli_query($con, $query);

        while ($res = mysqli_fetch_assoc($result)) {
            $cro_id =  $res['cro_id'];
            echo $cro_id;
        }
        $query1 = "INSERT into mepdetails(cro_id,mep) VALUES('$cro_id','$crop_msp')";
        $success1 = $con->query($query1);
        $query2 = "INSERT into mepdetails(cro_id,mep) VALUES('$cro_id','$crop_msp')";
        $success2 = $con->query($query1);
        $query3 = "INSERT into mepdetails(cro_id,mep) VALUES('$cro_id','$crop_msp')";
        $success3 = $con->query($query1);
        $query4 = "INSERT into mepdetails(cro_id,mep) VALUES('$cro_id','$crop_msp')";
        $success4 = $con->query($query1);
        $query5 = "INSERT into mepdetails(cro_id,mep) VALUES('$cro_id','$crop_msp')";
        $success5 = $con->query($query1);
        header("location: cropdetails.php");
    } else {
        header("location: addcrop.php");
    }
}

$con->close();

?>