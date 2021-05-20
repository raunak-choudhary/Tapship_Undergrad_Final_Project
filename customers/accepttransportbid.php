<?php 
 
 include('session-script.php');
 $res = $_SESSION["sessionid"];
 $c_mobile= $res;
 if(!isset($_SESSION['login_farmer'])){
 }
 error_reporting(0);
 
 
 $con = mysqli_connect("localhost", "root", "", "tapship");
   if(!$con)
   {
       die(" Connection Error ");
   }

   $tb_id = $_GET['tb_id'];

   $q1 = "SELECT * from transportbid where tb_id=$tb_id";
   $result = mysqli_query($con,$q1);

   while( $res=mysqli_fetch_assoc($result))
   {
    $cb_id =  $res['tb_cb_id'];
    $d_mobile = $res['tb_d_mobile'];
   }


   $q2 = "SELECT * from cropbid where cb_id=$cb_id";
   $result = mysqli_query($con,$q2);

   while( $res=mysqli_fetch_assoc($result))
   {
    $cr_id =  $res['cb_cr_id'];
   }

   if(isset($_POST['submit']))
   {        
    $query1 = " update cropsale set cr_status='8' where cr_id=$cr_id";
    $result = mysqli_query($con,$query1);

    $query2 = " update cropbid set cb_status='8' where cb_id=$cb_id";
    $result = mysqli_query($con,$query2);

    $query3 = " update transportbid set tb_status='1' where tb_cb_id=$cb_id and tb_d_mobile=$d_mobile and tb_id=$tb_id";
    $result = mysqli_query($con,$query3);

    $query4 = " update transportbid set tb_status='2' where tb_cb_id=$cb_id and tb_id!=$tb_id";
    $result = mysqli_query($con,$query4);
    
   }

   header("location: acceptedbids.php");
   
?>
