<?php
require('../fpdf/fpdf.php');
require('./koneksi.php');

$query_peminjaman = mysqli_query($conn, "SELECT *, peminjamans.id AS id_peminjaman, users.id AS id_user, bukus.id AS id_buku FROM peminjamans JOIN users ON peminjamans.id_user = users.id JOIN bukus ON peminjamans.id_buku = bukus.id ORDER BY peminjamans.id DESC");
$query_hasil_peminjaman = mysqli_fetch_all($query_peminjaman, MYSQLI_ASSOC);

$pdf = new FPDF();
$pdf->SetTitle('Laporan Data Peminjaman');
$pdf->AddPage('L');
$pdf->SetFont('Arial','B',16);
// add logo
$pdf->Image('../assets/img/pppbulutuban.png',10,10,-700);

$pdf->Cell(0,10,'LAPORAN DATA PEMINJAMAN',0,1,'C');
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
$pdf->Cell(50,10,'Kode Peminjaman',1,0,'C');
$pdf->Cell(50,10,'Nama Peminjam',1,0,'C');
$pdf->Cell(60,10,'Judul Buku',1,0,'C');
$pdf->Cell(40,10,'Tanggal Kunjungan',1,0,'C');
$pdf->Cell(40,10,'TUjuan',1,0,'C');
$pdf->Cell(35,10,'Status',1,0,'C');

$pdf->SetFont('Arial','',10);
// display data peminjaman
$no = 1;
foreach($query_hasil_peminjaman as $row){
    $pdf->Ln(10);
    $pdf->Cell(50,10,$row['kode_peminjaman'],1,0,'C');
    $pdf->Cell(50,10,$row['nama'],1,0,'C');
    $pdf->Cell(60,10,$row['judul_buku'],1,0,'C');
    $pdf->Cell(40,10,$row['tgl_kunjungan'],1,0,'C');
    $pdf->Cell(40,10,$row['tujuan'],1,0,'C');
    $pdf->Cell(35,10,$row['status'],1,0,'C');
    $no++;
}

$pdf->Output();
?>