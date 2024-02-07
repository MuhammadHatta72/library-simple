<?php

include './koneksi.php';
session_start();

if(isset($_POST['hapusUser'])){
    $id = $_POST['id'];

    //cek tabel pemesanan buku
    $query = "SELECT * FROM peminjamans WHERE id_user = '$id'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_num_rows($result);

    if($row > 0){
        echo "<script>alert('Gagal hapus pengguna. Pengguna masih memiliki peminjaman.');window.location='../pengguna_index.php';</script>";
        return false;
    } else {
        $query = "DELETE FROM users WHERE id = '$id'";
        $result = mysqli_query($conn, $query);

        if($result){
            echo "<script>alert('Berhasil hapus pengguna.');window.location='../pengguna_index.php';</script>";
            return true;
        } else {
            echo "<script>alert('Gagal hapus pengguna.');window.location='../pengguna_index.php';</script>";
            return false;
        }
    }
} else {
    echo "<script>window.location='../pengguna_index.php';</script>";
    return false;
}