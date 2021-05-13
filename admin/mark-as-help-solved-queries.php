<?php
 $con = mysqli_connect("b3bu9bb23ikjqsiv8aku-mysql.services.clever-cloud.com", "uodltp4afruoomkk", "WAniOzDcPXxfNZTCLGnl", "b3bu9bb23ikjqsiv8aku");

$MszID= $_POST['mszID'];
$MarkingAsSolved=$con->query("UPDATE queries SET q_status='1' WHERE q_id='".$MszID."'");
if($MarkingAsSolved){
	echo "success";
}
else{
	echo "error";
}
?>