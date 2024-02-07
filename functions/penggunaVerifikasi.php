<?php

include './koneksi.php';
session_start();

if(isset($_POST['verifikasiUser'])){
    $id = $_POST['id'];

    $query = "UPDATE users SET check_admin = 'Terverifikasi' WHERE id = '$id'";
    $result = mysqli_query($conn, $query);

    if($result){
        echo "<script>alert('Berhasil verifikasi pengguna.');window.location='../pengguna_index.php';</script>";
    } else {
        echo "<script>alert('Gagal verifikasi pengguna.');window.location='../pengguna_index.php';</script>";
    }
} else {
    echo "<script>window.location='../pengguna_index.php';</script>";
}