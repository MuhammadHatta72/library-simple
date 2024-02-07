<?php
require('../fpdf/fpdf.php');
require('./koneksi.php');

$query_user = mysqli_query($conn, "SELECT * FROM users");
$query_hasil_kamar = mysqli_fetch_all($query_user, MYSQLI_ASSOC);


$pdf = new FPDF();
$pdf->SetTitle('Laporan Data Pengguna');
$pdf->AddPage('L');
$pdf->SetFont('Arial','B',16);
// add logo
$pdf->Image('../assets/img/pppbulutuban.png',10,10,-700);

$pdf->Cell(0,10,'LAPORAN DATA PENGGUNA',0,1,'C');
$pdf->SetFont('Arial','B',16);
$pdf->Cell(0,10,'UPT PELABUHAN PERIKANAN PANTAI BULU',0,1,'C');
$pdf->SetFont('Arial','',10);
$pdf->Cell(0,5,'Dinas Kelautan dan Perikanan Provinsi Jawa Timur - UPT Pelabuhan Perikanan Pantai Bulu',0,1,'C');

//add break line
$pdf->Ln(10);


// add line
$pdf->Line(10,38,287,38);
$pdf->SetLineWidth(1);
$pdf->Line(10,39,287,39);
$pdf->SetLineWidth(0);


$pdf->SetFont('Arial','B',10);
$pdf->Cell(85,10,'Nama',1,0,'C');
$pdf->Cell(70,10,'Alamat',1,0,'C');
$pdf->Cell(50,10,'No. Telepon',1,0,'C');
$pdf->Cell(40,10,'Email',1,0,'C');
$pdf->Cell(30,10,'Verifikasi',1,0,'C');

$pdf->SetFont('Arial','',10);
// display user
$no = 1;
foreach($query_hasil_kamar as $row){
    $pdf->Ln(10);
    $pdf->Cell(85,10,$row['nama'],1,0,'C');
    $pdf->Cell(70,10,$row['alamat'],1,0,'C');
    $pdf->Cell(50,10,$row['no_hp'],1,0,'C');
    $pdf->Cell(40,10,$row['email'],1,0,'C');
    $pdf->Cell(30,10,$row['check_admin'],1,0,'C');
    $no++;
}

$pdf->Output();
?>