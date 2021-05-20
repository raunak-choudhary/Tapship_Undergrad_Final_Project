<?php
 $con = mysqli_connect("localhost", "root", "", "tapship");

$MszID= $_POST['mszID'];
$MarkingAsSolved=$con->query("UPDATE contactus SET u_status='1' WHERE u_id='".$MszID."'");
if($MarkingAsSolved){
	echo "success";
}
else{
	echo "error";
}
?>