<?php

include './koneksi.php';
session_start();

if(isset($_POST['prosesPemesanan'])){
    $id_peminjaman = $_POST['id_peminjaman'];

    $query = "UPDATE peminjamans SET status = 'dipinjam' WHERE id = '$id_peminjaman'";
    $result = mysqli_query($conn, $query);

    // tambah jumlah buku
    $query_pemesanan = "SELECT * FROM peminjamans WHERE id = '$id_peminjaman'";
    $result_tambah_buku = mysqli_query($conn, $query_pemesanan);

    $id_buku = mysqli_fetch_assoc($result_tambah_buku);

    $query_tambah_buku = "SELECT * FROM bukus WHERE id = '$id_buku[id_buku]'";
    $result_tambah_buku = mysqli_query($conn, $query_tambah_buku);
    $jumlah_buku = mysqli_fetch_assoc($result_tambah_buku);

    $jumlah_buku_update = (int) $jumlah_buku['jumlah_buku'] - 1;

    $query_update_buku = "UPDATE bukus SET jumlah_buku = '$jumlah_buku_update' WHERE id = '$id_buku[id_buku]'";
    $result_update_buku = mysqli_query($conn, $query_update_buku);


    if(!$result){
        echo "<script>alert('Data Pemesanan gagal dipinjamkan.');window.location='../pemesanan_index.php';</script>";
    exit;
    } else {
        echo "<script>alert('Data berhasil dipinjamkan.');window.location='../pemesanan_index.php';</script>";
        exit;
    }
}else{
    echo "<script>alert('Data Pemesanan gagal dipinjamkan.');window.location='../pemesanan_index.php';</script>";
    exit;
}