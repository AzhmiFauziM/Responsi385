<?php 
require("koneksi.php");
error_reporting(0);
session_start(); 
if (isset($_SESSION['username_admin'])) {
    header("Location: admin_index.php");
}
 
if (isset($_POST['submit'])) {
	if ($_POST["captcha_code"] == $_SESSION["captcha_code"]) {
	    $email = $_POST['email'];
	    $password = md5($_POST['password']);
	 
	    $sql = "SELECT * FROM admin WHERE email='$email' AND password='$password'";
	    $result = mysqli_query($con, $sql);
	    $cek = mysqli_affected_rows($con);
	    if($cek > 0){
	        $row = mysqli_fetch_assoc($result);
	        $_SESSION['username_admin'] = $row['username'];
	        $_SESSION['email_admin'] = $row['email'];
	        header("Location: admin_index.php");
	    } else {
	        echo "<script>alert('Email atau password Anda salah. Silahkan coba lagi!')</script>";
	    }
	}else{
		echo "<script>alert('Login gagal! Captcha tidak sesuai')</script>";
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
		<center><font size="4" style="color: #0094e3;"><b>LOGIN ADMIN</b></font></center><br>
		<form method="POST">
			<input type="email" name="email" class="form_LR" placeholder="Email" required>
			<input type="password" name="password" class="form_LR" placeholder="Password" required>
			<label>Captcha:</label><br>
			<img src="captcha.php" style="margin-top: 5px">
			<input type="text" name="captcha_code" class="form_LR" placeholder="Captcha" style="width: 70%; float: right;" required>
			<input type="submit" name="submit" class="tombol_LR" value="LOGIN">
			<br><br>
			<center>
				<b>Anda belum punya akun? </b><a href="register.php">Register</a>
				<a href="user_login.php">Masuk sebagai user</a>
			</center>
		</form>
	</div>
</body>
</html>