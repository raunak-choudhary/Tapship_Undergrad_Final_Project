 <?php
session_start(); // Starting Session
$error = ''; // Variable To Store Error Message
error_reporting(0);
if (isset($_POST['submit'])) {
if (empty($_POST['c_mobile']) || empty($_POST['c_password'])) {
$error = "Username or Password is invalid";
}
else{
// Define $mobile and $password
$c_mobile = $_POST['c_mobile'];
$c_password = $_POST['c_password'];
$_SESSION["sessionid"] = $_POST['c_mobile'];
// mysqli_connect() function opens a new connection to the MySQL server.
$con = mysqli_connect("127.0.0.1", "root", "", "tapship");
// SQL query to fetch information of registerd users and finds user match.
$query = "SELECT c_mobile, c_password from customer where c_mobile=? AND c_password=? LIMIT 1";
// To protect MySQL injection for Security purpose
$stmt = $con->prepare($query);
$stmt->bind_param("ss", $c_mobile, $c_password);
$stmt->execute();
$stmt->bind_result($c_mobile, $c_password);
$stmt->store_result();
if($stmt->fetch()) //fetching the contents of the row {
$_SESSION['login_customer'] = $c_mobile; // Initializing Session
header("location: login.php"); // Redirecting To Profile Page
}
mysqli_close(); // Closing Connection
}
?>
