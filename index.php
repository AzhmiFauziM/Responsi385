<?php 
 
session_start();
 
if (!isset($_SESSION['username_user'])) {
    header("Location: user_login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<nav class="menu">
        <ul>
            <div class="heading">
                <a href="#">Vaksin</a>
            </div>
            <li><a href="index.php">Beranda</a></li>
            <li><a href="#">Artikel</a></li>
            <li><a href="user_data.php">Data</a></li>
            <li><a href="user_form_pendaftaran.php">Form</a></li>
            <li><a href="user_logout.php">Logout</a></li>
        </ul>
    </nav>
</body>
</html>