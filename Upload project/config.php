<?php
$servername = "localhost";
$username = "Hammi"; 
$password = "Hammi12344";
$dbname = "FotoBase";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
