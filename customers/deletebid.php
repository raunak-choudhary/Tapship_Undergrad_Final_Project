<?php 
 
 include('session-script.php');
 $res = $_SESSION["sessionid"];
 $c_mobile= $res;
 if(!isset($_SESSION['login_customer'])){
 header("location: login.php"); // Redirecting To Profile Page
 }
 
 $con = mysqli_connect("remotemysql.com", "m1t7Rrl6v7", "gIP1i7Re2y", "m1t7Rrl6v7");

$id = $_GET['id'];

    $query = " delete from cropbid where cb_id=$id";
    echo $query;
    $result = mysqli_query($con,$query); 

   header("location: youractivebids.php");
   
?>
