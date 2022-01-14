<?php 

require("koneksi.php");
session_start();
error_reporting(0);
 
if (!isset($_SESSION['username_admin'])) {
    header("Location: admin_login.php");
}

function http_request($url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($ch);
    curl_close($ch);
    return $output;
}
if (isset($_GET['submit'])) {
    $data = http_request("http://localhost/vaksin/API/api_searching.php?nama=".$_GET["nama"]);
    $data = json_decode($data, TRUE);
}else{
    $data = http_request("http://localhost/vaksin/API/api_tampil.php");
    $data = json_decode($data, TRUE);
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
    <div class="kotak_utama1">
        <div class="kotak_judul">
            <p>DATA DAFTAR PESERTA VAKSIN</p>
        </div>
        <div class="isi">
            <a href="admin_cetak.php"><button class="tombol_cetak">Cetak</button></a>
            <div class="kotak_pencarian">
                <form method="GET" action="admin_data.php">
                    <label>Cari</label>
                    <input type="text" name="nama" class="input_pencarian" placeholder="Masukan nama" required>
                    <input type="submit" name="submit" class="tombol_pencarian" value="Cari">
                </form>
            </div>
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
                    <th>Edit</th>
                    <th>Hapus</th>
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
                        <td><a href="http://localhost/vaksin/admin_edit.php?id=<?= $data['id'] ?>">Edit</a></td>
                        <td><a href="http://localhost/vaksin/API/api_hapus.php?id=<?= $data['id'] ?>">Hapus</a></td>
                    </tr>
                <?php
                }?>
            </table>
        </div>
    </div>
</body>
</html>