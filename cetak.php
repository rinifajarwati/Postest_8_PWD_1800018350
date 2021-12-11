<?php
require('fpdf/fpdf.php');
$pdf = new FPDF('l','mm','A5');
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(190,7,'PROGRAM STUDI TEKNIK INFORMATIKA',0,1,'C');
$pdf->SetFont('Arial','B',12);
$pdf->Cell(190,7,'DAFTAR MAHASISWA MATKUL PEMROGRAMAN WEB DINAMIS',0,1,'C');
$pdf->Cell(10,7,'',0,1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(20,6,'NIM',1,0);
$pdf->Cell(50,6,'Nama Mahasiswa',1,0);
$pdf->Cell(25,6,'Jenis Kelamin',1,0);
$pdf->Cell(50,6,'Alamat',1,0);
$pdf->Cell(30,6,'Tanggal Lahir',1,1);
$pdf->SetFont('Arial','',10);
include "koneksi.php";
$mahasiswa = mysqli_query($con, "select * from mahasiswa");
while ($row = mysqli_fetch_array($mahasiswa)){
    $pdf->Cell(20,6,$row['nim'],1,0);
    $pdf->Cell(50,6,$row['nama'],1,0);
    $pdf->Cell(25,6,$row['jk'],1,0);
    $pdf->Cell(50,6,$row['alamat'],1,0);
    $pdf->Cell(30,6,$row['tgllhr'],1,1); 
}
$pdf->Output();
?>