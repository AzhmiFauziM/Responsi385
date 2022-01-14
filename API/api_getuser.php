<?php
require("koneksi.php");

if (isset($_GET['email'])){
    $email = $_GET['email'];
    $sql = "SELECT * FROM data_vaksin WHERE email='$email'";
    $query = mysqli_query($con, $sql);
    $cek = mysqli_affected_rows($con);
    if($cek > 0){
        while ($row = mysqli_fetch_assoc($query)) {
            $response[] = $row;
        }
    }
} else {
    $response["kode"] = 0;
    $response["pesan"] = "Tidak Ada GET Data";
}
echo json_encode($response);
mysqli_close($con);
?>