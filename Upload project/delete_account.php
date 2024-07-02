<?php
include 'config.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION['user_id'];

    $sql = "DELETE FROM User WHERE id='$user_id'";
    $conn->query($sql);

    $sql = "DELETE FROM Photo WHERE user_id='$user_id'";
    $conn->query($sql);

    session_unset();
    session_destroy();
    header("Location: index.php");
    exit();
}

$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<header>
    <div class="container">
        <div class="branding">
            <h1>FotoBase</h1>
        </div>
        <nav>
            <ul>
                <li><a href="upload.php">Upload Photo</a></li>
                <li><a href="myphotos.php">My Photos</a></li>
                <li><a href="publicphotos.php">Public Photos</a></li>
                <li><a href="export.php">Export Data</a></li>
                <li><a href="delete_account.php">Delete Account</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </div>
</header>

<div class="container">
    <h1>Delete Account</h1>
    <form method="post" action="">
        <input type="submit" value="Delete Account" class="delete-btn">
    </form>
</div>
</body>
</html>
