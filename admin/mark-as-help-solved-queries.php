<?php
$con = mysqli_connect("localhost", "root", "", "tapship");

$MszID= $_POST['mszID'];
$MarkingAsSolved=$con->query("UPDATE queries SET q_status='1' WHERE q_id='".$MszID."'");
if($MarkingAsSolved){
	echo "success";
}
else{
	echo "error";
}
?>