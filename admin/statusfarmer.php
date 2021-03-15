<?php 
 
 include('session-script.php');
 $res = $_SESSION["sessionid"];
 $a_name= $res;
 if(!isset($_SESSION['login_admin'])){
 header("location: login.php"); // Redirecting To Profile Page
 }
 
$con=mysqli_connect("localhost","root","","tapship");
   if(!$con)
   {
       die(" Connection Error ");
   }

   $c_mobile = $_GET['c_mobile'];

   if(isset($_POST['accept']))
   {        
        $query = " update customer set c_approve = '1' where c_mobile='".$c_mobile."'";
        $result = mysqli_query($con,$query);
   }
   if(isset($_POST['review']))
   {        
        $query = " update customer set c_approve = '2' where c_mobile='".$c_mobile."'";
        $result = mysqli_query($con,$query);
   }
   if(isset($_POST['reject']))
   {        
        $query = " update customer set c_approve = '3' where c_mobile='".$c_mobile."'";
        $result = mysqli_query($con,$query);
   }
   header("Location: customerprofile.php?c_mobile=$c_mobile"); 
?>
