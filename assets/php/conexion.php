<?php  
$host = "localhost";
$user = "root";
$pass = "";
$db = "Amimitl";
$link = mysqli_connect($host, $user, $pass, $db);
if (!$link) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}
?>