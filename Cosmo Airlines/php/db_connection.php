<?php
$servername = "localhost"; // Your database host
$username = "root"; // Your database username
$password = ""; // Your database password (default is empty for XAMPP)
$dbname = "cosmo_airlines"; // The name of your database

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
