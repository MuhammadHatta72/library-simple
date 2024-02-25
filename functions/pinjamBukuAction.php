<?php

include './koneksi.php';
session_start();

if(isset($_POST['pinjamBuku'])){
    $id_book = $_POST['id_book'];
    $id_user = $_POST['id_user'];
    $tgl_kunjungan = $_POST['tgl_kunjungan'];
    $tujuan_kunjungan = $_POST['tujuan_kunjungan'];

    $query_tambah_buku = "SELECT * FROM bukus WHERE id = '$id_book'";
    $result_tambah_buku = mysqli_query($conn, $query_tambah_buku);

    // cek jumlah buku
    $jumlah_buku = mysqli_fetch_assoc($result_tambah_buku);
    if($jumlah_buku['jumlah_buku'] == 0){
        echo "<script>alert('Buku tidak tersedia.');window.location='../semua_buku.php';</script>";
        exit;
    }

    $kode_peminjaman = 'PMJ-'.date('YmdHis');

    $tgl_kembali = date('Y-m-d', strtotime('+3 days', strtotime($tgl_kunjungan)));
    $denda = 0;

    $query = "INSERT INTO peminjamans (kode_peminjaman, id_buku, id_user, tgl_kunjungan, tujuan, tgl_kembali, denda, status) VALUES ('$kode_peminjaman', '$id_book', '$id_user', '$tgl_kunjungan', '$tujuan_kunjungan', '$tgl_kembali', '$denda', 'diproses')";
    $result = mysqli_query($conn, $query);


    if(!$result){
        echo "<script>alert('Data Pemesanan gagal ditambah.');window.location='../semua_buku.php';</script>";
    exit;
    } else {
        echo "<script>alert('Data berhasil ditambah.');window.location='../semua_buku.php';</script>";
        exit;
    }
}else{
    echo "<script>alert('Data Pemesanan gagal ditambah.');window.location='../semua_buku.php';</script>";
    exit;
}
