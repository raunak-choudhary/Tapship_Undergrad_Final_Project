<?php 
 
 include('session-script.php');
 $res = $_SESSION["sessionid"];
 $d_mobile= $res;
 if(!isset($_SESSION['login_driver'])){
 header("location: login.php"); // Redirecting To Profile Page
 }
 
 $con = mysqli_connect("remotemysql.com", "m1t7Rrl6v7", "gIP1i7Re2y", "m1t7Rrl6v7");
    $tb_id = $con->real_escape_string($_POST['id']);
    $tb_bid = $con->real_escape_string($_POST['bid']);
    
    $query = " update transportbid set tb_bid=$tb_bid where tb_id=$tb_id";
    echo $query;
    $result = mysqli_query($con,$query); 

    header("location: viewtransportbiddetails.php?tb_id=$tb_id");
   
?>
