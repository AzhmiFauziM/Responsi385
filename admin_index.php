<?php 
 
session_start();
 
if (!isset($_SESSION['username_admin'])) {
    header("Location: admin_login.php");
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
                <a href="#">Vaksin Admin</a>
            </div>
            <li><a href="admin_index.php">Beranda</a></li>
            <li><a href="#">Artikel</a></li>
            <li><a href="admin_data.php">Data</a></li>
            <li><a href="">Form</a></li>
            <li><a href="admin_logout.php">Logout</a></li>
        </ul>
    </nav>
    <div class="kotak_utama">
    </div>
</body>
</html>