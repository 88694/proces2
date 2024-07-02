<?php
session_start();
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
                <?php if (isset($_SESSION['user_id'])): ?>
                    <li><a href="upload.php">Upload Photo</a></li>
                    <li><a href="myphotos.php">My Photos</a></li>
                    <li><a href="publicphotos.php">Public Photos</a></li>
                    <li><a href="export.php">Export Data</a></li>
                    <li><a href="delete_account.php">Delete Account</a></li>
                    <li><a href="logout.php">Logout</a></li>
                <?php else: ?>
                    <li><a href="register.php">Register</a></li>
                    <li><a href="login.php">Login</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>
</header>

<div class="container">
    <?php if (isset($_SESSION['user_id'])): ?>
        <h1>Welcome!</h1>
    <?php else: ?>
        <h1>Welcome to FotoBase</h1>
        <p>Please register or login to manage your photos.</p>
    <?php endif; ?>
</div>
</body>
</html>
