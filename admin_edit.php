<?php 
 
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

$data = http_request("http://localhost/vaksin/API/api_get.php?id=".$_GET["id"]);
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
        <div class="isi">
            <form method="POST" action="API/api_ubah.php">
                <input type="hidden" name="id" value="<?= $data["id"] ?>">
                <label>Nama Lengkap</label>
                <input type="text" name="nama" class="input_form" value="<?= $data["nama"] ?>" placeholder="Nama Lengkap" required>
                <label>Jenis Kelamin</label>
                <select name="jenis_kelamin" class="input_form" required>
                    <option value="Laki-laki" <?= ($data["jenis_kelamin"]=="Laki-laki") ? 'selected' : '' ?>>Laki-laki</option>
                    <option value="Perempuan" <?= ($data["jenis_kelamin"]=="Perempuan") ? 'selected' : '' ?>>Perempuan</option>
                </select>
                <label>Nomor Induk Kependudukan (NIK)</label>
                <input type="number" name="nik" class="input_form" value="<?= $data["nik"] ?>" placeholder="Nomor Induk Kependudukan" required>
                <label>Alamat Domisili</label>
                <input type="text" name="alamat" class="input_form" value="<?= $data["alamat"] ?>" placeholder="Alamat Domisili" required>
                <label>Nomor HP</label>
                <input type="number" name="no_hp" class="input_form" value="<?= $data["nomor"] ?>" placeholder="Nomor HP" required>
                <label>Jenis Vaksin</label>
                <select name="jenis_vaksin" class="input_form" required>
                    <option value="Sinovac" <?= ($data["jenis_vaksin"]=="Sinovac") ? 'selected' : '' ?>>Sinovac</option>
                    <option value="AstraZeneca" <?= ($data["jenis_vaksin"]=="AstraZeneca") ? 'selected' : '' ?>>AstraZeneca</option>
                    <option value="Sinopharm" <?= ($data["jenis_vaksin"]=="Sinopharm") ? 'selected' : '' ?>>Sinopharm</option>
                    <option value="Moderna" <?= ($data["jenis_vaksin"]=="Moderna") ? 'selected' : '' ?>>Moderna</option>
                    <option value="Pfizer" <?= ($data["jenis_vaksin"]=="Pfizer") ? 'selected' : '' ?>>Pfizer</option>
                    <option value="Sputnik V" <?= ($data["jenis_vaksin"]=="Sputnik V") ? 'selected' : '' ?>>Sputnik V</option>
                    <option value="Janssen" <?= ($data["jenis_vaksin"]=="Janssen") ? 'selected' : '' ?>>Janssen</option>
                    <option value="Convidecia" <?= ($data["jenis_vaksin"]=="Convidecia") ? 'selected' : '' ?>>Convidecia</option>
                </select>
                <label>Dosis</label>
                <select name="dosis" class="input_form" required>
                    <option value="1" <?= ($data["dosis"]== 1) ? 'selected' : '' ?>>1</option>
                    <option value="2" <?= ($data["dosis"]== 2) ? 'selected' : '' ?>>2</option>
                </select>
                <label>Tanggal Vaksin</label>
                <input type="date" name="tanggal" class="input_form" value="<?= $data["tanggal"] ?>" placeholder="Tanggal" required>
                <input type="submit" name="submit" class="tombol_kirim" value="UBAH">
            </form>
        </div>
    </div>
</body>
</html>
