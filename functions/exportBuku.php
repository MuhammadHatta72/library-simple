<?php
require('../fpdf/fpdf.php');
require('./koneksi.php');

$query_buku = mysqli_query($conn, "SELECT * FROM bukus");
$query_hasil_kamar = mysqli_fetch_all($query_buku, MYSQLI_ASSOC);


$pdf = new FPDF();
$pdf->SetTitle('Laporan Data Buku');
$pdf->AddPage('L');
$pdf->SetFont('Arial','B',16);
// add logo
$pdf->Image('../assets/img/pppbulutuban.png',10,10,-700);

$pdf->Cell(0,10,'LAPORAN DATA BUKU',0,1,'C');
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
$pdf->Cell(50,10,'Kode Buku',1,0,'C');
$pdf->Cell(40,10,'Judul Buku',1,0,'C');
$pdf->Cell(40,10,'Deskripsi',1,0,'C');
$pdf->Cell(20,10,'Penulis',1,0,'C');
$pdf->Cell(20,10,'Penerbit',1,0,'C');
$pdf->Cell(25,10,'Tahun Terbit',1,0,'C');
$pdf->Cell(20,10,'Katagori',1,0,'C');
$pdf->Cell(20,10,'Lemari',1,0,'C');
$pdf->Cell(20,10,'Rak',1,0,'C');
$pdf->Cell(20,10,'Jumlah',1,0,'C');

$pdf->SetFont('Arial','',10);
// display data kamar
$no = 1;
foreach($query_hasil_kamar as $row){
    $pdf->Ln(10);
    $pdf->Cell(50,10,$row['kode_buku'],1,0,'C');
    $pdf->Cell(40,10,$row['judul_buku'],1,0,'C');
    $pdf->Cell(40,10,$row['deskripsi'],1,0,'C');
    $pdf->Cell(20,10,$row['penulis'],1,0,'C');
    $pdf->Cell(20,10,$row['penerbit'],1,0,'C');
    $pdf->Cell(25,10,$row['tahun_terbit'],1,0,'C');
    $pdf->Cell(20,10,$row['kategori'],1,0,'C');
    $pdf->Cell(20,10,$row['lemari'],1,0,'C');
    $pdf->Cell(20,10,$row['rak'],1,0,'C');
    $pdf->Cell(20,10,$row['jumlah_buku'],1,0,'C');
    $no++;
}

$pdf->Output();
?>