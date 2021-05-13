<?php
 $con = mysqli_connect("remotemysql.com", "m1t7Rrl6v7", "gIP1i7Re2y", "m1t7Rrl6v7");

$MszID= $_POST['mszID'];
$MarkingAsSolved=$con->query("UPDATE queries SET q_status='1' WHERE q_id='".$MszID."'");
if($MarkingAsSolved){
	echo "success";
}
else{
	echo "error";
}
?>