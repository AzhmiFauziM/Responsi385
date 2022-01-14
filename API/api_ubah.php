<?php
require("koneksi.php");

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $nik = $_POST['nik'];
    $alamat = $_POST['alamat'];
    $no_hp = $_POST['no_hp'];
    $jenis_vaksin = $_POST['jenis_vaksin'];
    $dosis = $_POST['dosis'];
    $tanggal = $_POST['tanggal'];

    $sql = "UPDATE data_vaksin SET nama='$nama', jenis_kelamin='$jenis_kelamin', nik='$nik', alamat='$alamat', nomor='$no_hp', jenis_vaksin='$jenis_vaksin', dosis='$dosis', tanggal='$tanggal' WHERE id='$id'";
    $eksekusi = mysqli_query($con, $sql);
    $cek = mysqli_affected_rows($con);

    if($cek > 0){
        $response["kode"] = 1;
        $response["pesan"] = "Data Berhasil Diubah";
        echo "<script>alert('Data Berhasil Diubah')</script>";
        echo "<script>document.location.href='http://localhost/vaksin/admin_data.php'</script>";
    }else{
        $response["kode"] = 0;
        $response["pesan"] = "Gagal Mengubah Data";
    }
} else {
    $response["kode"] = 0;
    $response["pesan"] = "Tidak Ada POST Data";
}