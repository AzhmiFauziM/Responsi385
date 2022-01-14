<?php 
require("koneksi.php");
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
    <div class="kotak_utama">
        <div class="kotak_judul">PENDAFTARAN VAKSIN </div>
        <div class="isi">
            <form method="POST" action="API/api_tambah.php">
                <label>Nama Lengkap</label>
                <input type="text" name="nama" class="input_form" placeholder="Nama Lengkap" required>
                <label>Jenis Kelamin</label>
                <select name="jenis_kelamin" class="input_form" required>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
                <label>Nomor Induk Kependudukan (NIK)</label>
                <input type="number" name="nik" class="input_form" placeholder="Nomor Induk Kependudukan" required>
                <label>Alamat Domisili</label>
                <input type="text" name="alamat" class="input_form" placeholder="Alamat Domisili" required>
                <label>Nomor HP</label>
                <input type="number" name="no_hp" class="input_form" placeholder="Nomor HP" required>
                <label>Jenis Vaksin</label>
                <select name="jenis_vaksin" class="input_form" required>
                    <option value="Sinovac">Sinovac</option>
                    <option value="AstraZeneca">AstraZeneca</option>
                    <option value="Sinopharm">Sinopharm</option>
                    <option value="Moderna">Moderna</option>
                    <option value="Pfizer">Pfizer</option>
                    <option value="Sputnik V">Sputnik V</option>
                    <option value="Janssen">Janssen</option>
                    <option value="Convidecia">Convidecia</option>
                </select>
                <label>Dosis</label>
                <select name="dosis" class="input_form" required>
                    <option value="1">1</option>
                    <option value="2">2</option>
                </select>
                <input type="submit" name="submit" class="tombol_kirim" value="DAFTAR">
            </form>
        </div>
    </div>
    </script>
</body>
</html>