<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fitmart_db"; // Change this to your database name

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
