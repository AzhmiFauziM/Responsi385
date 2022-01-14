<?php
require("koneksi.php");
session_start();
 
if (isset($_SESSION['username_user'])) {
    header("Location: index.php");
}
 
if (isset($_POST['submit'])) {
	if ($_POST["captcha_code"] == $_SESSION["captcha_code"]) {
	    $username = $_POST['username'];
	    $email = $_POST['email'];
	    $password = md5($_POST['password']);
	    $cpassword = md5($_POST['cpassword']);
	 
	    if ($password == $cpassword) {
	        $sql1 = "SELECT * FROM users WHERE email='$email'";
	        $result = mysqli_query($con, $sql1);
	        $cek = mysqli_affected_rows($con);
	    	if(!$cek > 0){
	            $sql2 = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
	            $result = mysqli_query($con, $sql2);
	            if ($result) {
	                echo "<script>alert('Selamat, registrasi berhasil!')</script>";

	            } else {
	                echo "<script>alert('Terjadi kesalahan.')</script>";
	            }
	        } else {
	            echo "<script>alert('Email Sudah Terdaftar.')</script>";
	        }
	         
	    } else {
	        echo "<script>alert('Password Tidak Sesuai')</script>";
	    }
	}else{
		echo "<script>alert('Gagal mendaftar! Captcha tidak sesuai')</script>";
	}
}
 
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<script type="text/javascript">
		
	</script>
</head>
<body>
	<div class="kotak_LR">
		<center><font size="4" style="color: #0094e3;"><b>REGISTER</b></font></center><br>
		<form method="POST">
			<input type="text" name="username" class="form_LR" placeholder="Username">
			<input type="email" name="email" class="form_LR" placeholder="Email" required>
			<input type="password" name="password" class="form_LR" placeholder="Password" required>
			<input type="password" name="cpassword" class="form_LR" placeholder="Konfirmasi Password" required>
			<label>Captcha:</label><br>
			<img src="captcha.php" style="margin-top: 5px">
			<input type="text" name="captcha_code" class="form_LR" placeholder="Captcha" style="width: 70%; float: right;" required>
			<input type="submit" name="submit" class="tombol_LR" value="DAFTAR">
			<br><br>
			<center><b>Anda sudah punya akun? </b><a href="user_login.php">Login</a></center>
		</form>
	</div>
</body>
</html>