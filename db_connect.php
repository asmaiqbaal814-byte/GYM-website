<?php
$servername = "localhost";   // The server where database runs
$username = "root";          // Default username in XAMPP
$password = "";              // Default password is empty in XAMPP
$dbname = "gym_db";          // The database we created

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

