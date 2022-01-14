<?php 
 
session_start();
error_reporting(0);
 
if (!isset($_SESSION['username_user'])) {
    header("Location: user_login.php");
}

function http_request($url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($ch);
    curl_close($ch);
    return $output;
}

$data = http_request("http://localhost/vaksin/API/api_getuser.php?email=".$_SESSION['email_user']);
$data = json_decode($data, TRUE);
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
    <div class="kotak_utama1">
        <div class="kotak_judul">DATA PENDAFTARAN</div>
        <div class="isi">
            <table class="table1">
                <tr>
                    <th>No</th>
                    <th>Email</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>NIK</th>
                    <th>Alamat</th>
                    <th>Nomor HP</th>
                    <th>Jenis Vaksin</th>
                    <th>Dosis</th>
                    <th>Tanggal</th>
                    <th>Cetak</th>
                </tr>
                <?php
                $no=1;
                foreach ($data as $data) {
                ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $data["email"] ?></td>
                        <td><?= $data["nama"] ?></td>
                        <td><?= $data["jenis_kelamin"] ?></td>
                        <td><?= $data["nik"] ?></td>
                        <td><?= $data["alamat"] ?></td>
                        <td><?= $data["nomor"] ?></td>
                        <td><?= $data["jenis_vaksin"] ?></td>
                        <td><?= $data["dosis"] ?></td>
                        <td><?= $data["tanggal"] ?></td>
                        <td><a href="user_cetak.php?id=<?= $data['id'] ?>">Cetak</a></td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</body>
</html>