<?php 
 
 include('session-script.php');
 $res = $_SESSION["sessionid"];
 $d_mobile= $res;
 if(!isset($_SESSION['login_driver'])){
 header("location: login.php"); // Redirecting To Profile Page
 }
 
 $con = mysqli_connect("remotemysql.com", "m1t7Rrl6v7", "gIP1i7Re2y", "m1t7Rrl6v7");

    $id = $_GET['id'];
echo $id;

    $query = " delete from transportbid where tb_id=$id";
    echo $query;
    $result = mysqli_query($con,$query); 

   header("location: yourtransportbids.php");
   
?>
