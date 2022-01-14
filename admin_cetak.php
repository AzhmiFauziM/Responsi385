<?php
require('fpdf/fpdf.php');
$pdf = new FPDF('l','mm','A5');
$pdf->AddPage();
$pdf->SetFont('Arial','B',14);
$pdf->Cell(190,7,'DAFTAR PESERTA VAKSIN KLINIK ',0,1,'C');
$pdf->SetFont('Arial','B',12);
$pdf->Cell(190,7,'TAHUN 2022',0,1,'C');
$pdf->Cell(10,7,'',0,1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(50,6,'NAMA',1,0);
$pdf->Cell(40,6,'JENIS KELAMIN',1,0);
$pdf->Cell(25,6,'ALAMAT',1,0);
$pdf->Cell(30,6,'JENIS VAKSIN',1,0);
$pdf->Cell(15,6,'DOSIS',1,0);
$pdf->Cell(30,6,'TANGGAL',1,1);
$pdf->SetFont('Arial','',10);
include 'koneksi.php';
$mahasiswa = mysqli_query($con, "select * from data_vaksin");
while ($row = mysqli_fetch_array($mahasiswa)){
	$pdf->Cell(50,6,$row['nama'],1,0);
	$pdf->Cell(40,6,$row['jenis_kelamin'],1,0);
	$pdf->Cell(25,6,$row['alamat'],1,0);
	$pdf->Cell(30,6,$row['jenis_vaksin'],1,0);
	$pdf->Cell(15,6,$row['dosis'],1,0);
	$pdf->Cell(30,6,$row['tanggal'],1,1); 
}
$pdf->Output();
?>