<?php
require("koneksi.php");

if (isset($_GET['id'])) {
    $id  = $_GET['id'];
    $sql = "DELETE FROM data_vaksin WHERE id='$id'";
    $eksekusi = mysqli_query($con, $sql);
    $cek = mysqli_affected_rows($con);
    if($cek > 0){
        $response["kode"] = 1;
        $response["pesan"] = "Data Berhasil Dihapus";
        header("Location: http://localhost/vaksin/admin_data.php");
    }else{
        $response["kode"] = 0;
        $response["pesan"] = "Gagal Menghapus Data";
    }
} else {
    $response["kode"] = 0;
    $response["pesan"] = "Tidak Ada GET Data";
}
echo json_encode($response);
mysqli_close($con);
?>