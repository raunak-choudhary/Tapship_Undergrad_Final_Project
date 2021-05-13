<?php 
 
 include('session-script.php');
 $res = $_SESSION["sessionid"];
 $d_mobile= $res;
 if(!isset($_SESSION['login_driver'])){
 header("location: login.php"); // Redirecting To Profile Page
 }
 
 $con = mysqli_connect("b3bu9bb23ikjqsiv8aku-mysql.services.clever-cloud.com", "uodltp4afruoomkk", "WAniOzDcPXxfNZTCLGnl", "b3bu9bb23ikjqsiv8aku");

    $id = $_GET['id'];
echo $id;

    $query = " delete from transportbid where tb_id=$id";
    echo $query;
    $result = mysqli_query($con,$query); 

   header("location: yourtransportbids.php");
   
?>
