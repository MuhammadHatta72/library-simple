<?php

include './koneksi.php';
session_start();

if(isset($_POST['kembalikanPemesanan'])){
    $id_peminjaman = $_POST['id_peminjaman'];

    $query_peminjaman_lama = "SELECT * FROM peminjamans WHERE id = '$id_peminjaman'";
    $result_peminjaman_lama = mysqli_query($conn, $query_peminjaman_lama);

    $status = mysqli_fetch_assoc($result_peminjaman_lama);
    
    //hitung hari ini (hari pengembalian) dan tanggal kembalian, jika tidak sama maka didenda. denda tiap hari dikalikan 5000
    
    $hari_pengembalian = date('Y-m-d');
    $hitung_hari = strtotime($hari_pengembalian) - strtotime($status['tgl_kembali']);


    $denda = 0;
    if($hitung_hari > 0){
        $denda = $hitung_hari / 86400;
        $denda = $denda * 5000;
    }

    $query = "UPDATE peminjamans SET status = 'dikembalikan', denda = '$denda' WHERE id = '$id_peminjaman'";
    $result = mysqli_query($conn, $query);

    // tambah jumlah buku
    $query_pemesanan = "SELECT * FROM peminjamans WHERE id = '$id_peminjaman'";
    $result_tambah_buku = mysqli_query($conn, $query_pemesanan);

    $id_buku = mysqli_fetch_assoc($result_tambah_buku);

    $query_tambah_buku = "SELECT * FROM bukus WHERE id = '$id_buku[id_buku]'";
    $result_tambah_buku = mysqli_query($conn, $query_tambah_buku);
    $jumlah_buku = mysqli_fetch_assoc($result_tambah_buku);

    $jumlah_buku_update = (int) $jumlah_buku['jumlah_buku'] + 1;

    $query_update_buku = "UPDATE bukus SET jumlah_buku = '$jumlah_buku_update' WHERE id = '$id_buku[id_buku]'";
    $result_update_buku = mysqli_query($conn, $query_update_buku);

    if(!$result){
        echo "<script>alert('Data Pemesanan gagal dikembalikan.');window.location='../pemesanan_index.php';</script>";
    exit;
    } else {
        echo "<script>alert('Data berhasil dikembalikan.');window.location='../pemesanan_index.php';</script>";
        exit;
    }
}else{
    echo "<script>alert('Data Pemesanan gagal dikembalikan.');window.location='../pemesanan_index.php';</script>";
    exit;
}