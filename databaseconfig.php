<?php
// db_connection.php
$host = 'localhost';
$db = 'cosmo_air';
$user = 'root';
$pass = '';
$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
