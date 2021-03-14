 <?php
session_start(); // Starting Session
$error = ''; // Variable To Store Error Message
error_reporting(0);
if (isset($_POST['submit'])) {
if (empty($_POST['f_mobile']) || empty($_POST['f_password'])) {
$error = "Username or Password is invalid";
}
else{
// Define $mobile and $password
$f_mobile = $_POST['f_mobile'];
$f_password = $_POST['f_password'];
$_SESSION["sessionid"] = $_POST['f_mobile'];
// mysqli_connect() function opens a new connection to the MySQL server.
$conn = mysqli_connect("127.0.0.1", "root", "", "tapship");
// SQL query to fetch information of registerd users and finds user match.
$query = "SELECT f_mobile, f_password from farmer where f_mobile=? AND f_password=? LIMIT 1";
// To protect MySQL injection for Security purpose
$stmt = $conn->prepare($query);
$stmt->bind_param("ss", $f_mobile, $f_password);
$stmt->execute();
$stmt->bind_result($f_mobile, $f_password);
$stmt->store_result();
if($stmt->fetch()) //fetching the contents of the row {
$_SESSION['login_farmer'] = $f_mobile; // Initializing Session
header("location: login.php"); // Redirecting To Profile Page
}
mysqli_close(); // Closing Connection
}
?>
