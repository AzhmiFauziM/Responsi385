<?php
require("koneksi.php");

$sql = "SELECT * FROM data_vaksin ORDER BY tanggal ASC";
$query = mysqli_query($con,$sql);
while ($row = mysqli_fetch_assoc($query)) {
	$data[] = $row;
}
header('content-type: application/json');
echo json_encode($data);
mysqli_close($con);
?>