<?php

include './koneksi.php';
session_start();

if(isset($_POST['tambahPemesanan'])){

    //cek buku tersedia

    $id_buku = $_POST['id_buku'];
    $query_tambah_buku = "SELECT * FROM bukus WHERE id = '$id_buku'";
    $result_tambah_buku = mysqli_query($conn, $query_tambah_buku);

    // cek jumlah buku
    $jumlah_buku = mysqli_fetch_assoc($result_tambah_buku);
    if($jumlah_buku['jumlah_buku'] == 0){
        echo "<script>alert('Buku tidak tersedia.');window.location='../pemesanan_tambah.php';</script>";
        exit;
    }

    $kode_peminjaman = $_POST['kode_peminjaman'];
    $id_user = $_POST['id_user'];
    $tgl_kunjungan = $_POST['tgl_kunjungan'];
    $tujuan = $_POST['tujuan'];

    $tgl_kembali = date('Y-m-d', strtotime('+3 days', strtotime($tgl_kunjungan)));
    $denda = 0;

    $query = "INSERT INTO peminjamans (kode_peminjaman, id_buku, id_user, tgl_kunjungan, tujuan, tgl_kembali, denda, status) VALUES ('$kode_peminjaman', '$id_buku', '$id_user', '$tgl_kunjungan', '$tujuan', '$tgl_kembali', '$denda', 'dipinjam')";
    $result = mysqli_query($conn, $query);

    // mengurangi jumlah buku
    $jumlah_buku_update = (int) $jumlah_buku['jumlah_buku'] - 1;
    $query_update_buku = "UPDATE bukus SET jumlah_buku = '$jumlah_buku_update' WHERE id = '$id_buku'";
    $result_update_buku = mysqli_query($conn, $query_update_buku);

    if(!$result){
        echo "<script>alert('Data Pemesanan gagal ditambah.');window.location='../pemesanan_tambah.php';</script>";
    exit;
    } else {
        echo "<script>alert('Data berhasil ditambah.');window.location='../pemesanan_index.php';</script>";
        exit;
    }
}else{
    echo "<script>alert('Data Pemesanan gagal ditambah.');window.location='../pemesanan_tambah.php';</script>";
    exit;
}
