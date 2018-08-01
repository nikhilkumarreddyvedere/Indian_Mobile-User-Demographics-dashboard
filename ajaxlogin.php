
<?php

session_start();

if(isset($_SESSION['group_id'])!="") {
	header("Location:..\index.php");
}

$servername = "127.0.0.1";
$username = "root";
$password = "root";
$dbname = "Capstone_Projects";


// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection



$group_id2 = $_POST['groupid1'];

$password2 = $_POST['password1'];

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT `group_id`, `password` FROM `users` WHERE group_id= '$group_id2' and password= '$password2' ";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "successfully logged in";
        $_SESSION['group_id'] = $row['group_id'];
    }
} 



mysqli_close($conn);
?>
