<?php
include 'config.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM Photo WHERE user_id='$user_id'";
$result = $conn->query($sql);

header('Content-Type: text/csv');
header('Content-Disposition: attachment;filename=user_data.csv');

$output = fopen('php://output', 'w');
fputcsv($output, array('ID', 'Title', 'Description', 'Path', 'Public'));

while ($row = $result->fetch_assoc()) {
    fputcsv($output, $row);
}

fclose($output);
$conn->close();
?>