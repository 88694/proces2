<?php
include 'config.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $is_public = isset($_POST['is_public']) ? 1 : 0;
    $user_id = $_SESSION['user_id'];
    $target_dir = "photos/";
    $target_file = $target_dir . basename($_FILES["photo"]["name"]);
    move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file);

    $sql = "INSERT INTO Photo (user_id, title, description, path, is_public) VALUES ('$user_id', '$title', '$description', '$target_file', '$is_public')";

    if ($conn->query($sql) === TRUE) {
        echo "<div class='message'>Photo uploaded successfully</div>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
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
    <h1>Upload Photo</h1>
    <form method="post" action="" enctype="multipart/form-data">
        Title: <input type="text" name="title" required><br>
        Description: <textarea name="description" required></textarea><br>
        Public: <input type="checkbox" name="is_public"><br>
        Photo: <input type="file" name="photo" required><br>
        <input type="submit" value="Upload">
    </form>
</div>
</body>
</html>
