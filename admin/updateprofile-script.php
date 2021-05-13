<?php 

include('session-script.php');
$res = $_SESSION["sessionid"];
$a_name= $res;
if(!isset($_SESSION['login_admin'])){
header("location: login.php"); // Redirecting To Profile Page
}

     $con = mysqli_connect("remotemysql.com", "m1t7Rrl6v7", "gIP1i7Re2y", "m1t7Rrl6v7");
    if(!$con)
    {
        die(" Connection Error ");
    }

    if(isset($_POST['update']))
    {
        
        $a_name = $_GET['a_name'];
        $a_nameupdate = $_POST['a_name'];
        $a_password = $_POST['a_password'];

        $query = " update admin set a_name = '".$a_nameupdate."',a_password = '".$a_password."' where a_name='".$a_name."'";
        $result = mysqli_query($con,$query); 
    }
    header("location: logout-script.php");
?>
