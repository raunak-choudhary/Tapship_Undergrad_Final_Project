 <?php
session_start(); // Starting Session
$error = ''; // Variable To Store Error Message
error_reporting(0);
if (isset($_POST['submit'])) {
if (empty($_POST['d_mobile']) || empty($_POST['d_password'])) {
$error = "Username or Password is invalid";
}
else{
// Define $mobile and $password
$d_mobile = $_POST['d_mobile'];
$d_password = $_POST['d_password'];
$_SESSION["sessionid"] = $_POST['d_mobile'];
// mysqli_connect() function opens a new connection to the MySQL server.
$conn = mysqli_connect("127.0.0.1", "root", "", "tapship");
// SQL query to fetch information of registerd users and finds user match.
$query = "SELECT d_mobile, d_password from driver where d_mobile=? AND d_password=? LIMIT 1";
// To protect MySQL injection for Security purpose
$stmt = $conn->prepare($query);
$stmt->bind_param("ss", $d_mobile, $d_password);
$stmt->execute();
$stmt->bind_result($d_mobile, $d_password);
$stmt->store_result();
if($stmt->fetch()) //fetching the contents of the row {
$_SESSION['login_user'] = $d_mobile; // Initializing Session
header("location: login.php"); // Redirecting To Profile Page
}
mysqli_close(); // Closing Connection
}
?>
