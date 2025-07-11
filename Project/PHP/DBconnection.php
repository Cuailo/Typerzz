<?php
$serverName = "localhost";
$userName = "root";
$password = "";
$databaseName ="typerzz";

$conn = new mysqli($serverName,$userName,$password,$databaseName);

if($conn->connect_error) {
    die("<script>console.log('Connection failed: " . $conn->connect_error . "');</script>");
}
echo "<script>console.log('Connected successfully');</script>";
?>
