<?php 
 
 include('session-script.php');
 $res = $_SESSION["sessionid"];
 $c_mobile= $res;
 if(!isset($_SESSION['login_customer'])){
 header("location: login.php"); // Redirecting To Profile Page
 }
 
$con=mysqli_connect("localhost","root","","tapship");
    $cb_id = $con->real_escape_string($_POST['id']);
    $cropbid_paytype =  $con->real_escape_string($_POST['cropbid_paytype']);
    $cropbid_tid =  $con->real_escape_string($_POST['cropbid_tid']);

    $cropbid_tproof= $cropbid_tid."-".$_FILES["cropbid_tproof"]["name"];
    $tname1 = $_FILES["cropbid_tproof"]["tmp_name"];
    $target_path1 = "assets/documents/payment/".$cropbid_tproof;
    move_uploaded_file($tname1, $target_path1);
    
    $query = "UPDATE cropbid set cb_paytype='$cropbid_paytype', cb_tid='$cropbid_tid', cb_tproof='$target_path1' where cb_id=$cb_id";
    $con->query($query) ;
    $result = mysqli_query($con,$query); 

    header("location: viewbiddetails.php?cb_id=$cb_id");
   
?>
