<?php
include 'config.php';
session_start();

$sql = "SELECT * FROM Photo WHERE is_public=1";
$result = $conn->query($sql);
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
    <h1>Public Photos</h1>
    <?php
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<div class='photo'>";
            echo "<img src='" . $row['path'] . "' alt='" . $row['title'] . "'>";
            echo "<h2>" . $row['title'] . "</h2>";
            echo "<p>" . $row['description'] . "</p>";
            echo "</div>";
        }
    } else {
        echo "<p>No public photos available.</p>";
    }
    $conn->close();
    ?>
</div>
</body>
</html>
