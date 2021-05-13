<?php 
 
 include('session-script.php');
 $res = $_SESSION["sessionid"];
 $f_mobile= $res;
 if(!isset($_SESSION['login_farmer'])){
 header("location: login.php"); // Redirecting To Profile Page
 }
 
 $con = mysqli_connect("b3bu9bb23ikjqsiv8aku-mysql.services.clever-cloud.com", "uodltp4afruoomkk", "WAniOzDcPXxfNZTCLGnl", "b3bu9bb23ikjqsiv8aku");

$id = $_GET['id'];
        
$cr_id=base64_decode($id);
$cr_id=round((double)$cr_id/525325.24/6537838239.89);

    $query = " delete from cropsale where cr_id=$cr_id";
    echo $query;
    $result = mysqli_query($con,$query); 

   header("location: activecrop.php?id=$id");
   
?>
