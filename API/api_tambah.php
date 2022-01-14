<?php
require("koneksi.php");
session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$email = $_SESSION['email_user'];
    $nama = $_POST['nama'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $nik = $_POST['nik'];
    $alamat = $_POST['alamat'];
    $no_hp = $_POST['no_hp'];
    $jenis_vaksin = $_POST['jenis_vaksin'];
    $dosis = $_POST['dosis'];

	$sql = "SELECT * FROM data_vaksin WHERE nik='$nik'";
    $result = mysqli_query($con, $sql);
    $cek = mysqli_affected_rows($con);
    if(!$cek > 0){
	    $sql2 = "INSERT INTO data_vaksin (email, nama, jenis_kelamin, nik, alamat, nomor, jenis_vaksin, dosis) VALUES ('$email', '$nama', '$jenis_kelamin', '$nik', '$alamat', '$no_hp', '$jenis_vaksin', '$dosis')";
	    $result = mysqli_query($con, $sql2);
		if ($result) {
			echo "<script>alert('Berhasil Daftar Vaksin')</script>";
			echo "<script>document.location.href='http://localhost/vaksin/user_form_pendaftaran.php'</script>";
		} else {
			echo "<script>alert('Terjadi kesalahan.')</script>";
			echo "<script>document.location.href='http://localhost/vaksin/user_form_pendaftaran.php'</script>";
		}
    }else {
        echo "<script>alert('NIK Sudah Terdaftar.')</script>";
        echo "<script>document.location.href='http://localhost/vaksin/user_form_pendaftaran.php'</script>";
    }
} else {
	echo "GAGAL";
}