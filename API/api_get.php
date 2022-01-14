<?php
require("koneksi.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM data_vaksin WHERE id='$id' ORDER BY id ASC";
    $query = mysqli_query($con, $sql);
    $cek = mysqli_affected_rows($con);
    if($cek > 0){
        while ($row = mysqli_fetch_assoc($query)) {
            $response = $row;
        }
    }else{
        $response["kode"] = 0;
        $response["pesan"] = "Data Tidak Tersedia";
    }
} else {
    $response["kode"] = 0;
    $response["pesan"] = "Tidak Ada GET Data";
}
echo json_encode($response);
mysqli_close($con);
?>