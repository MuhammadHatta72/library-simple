<?php
include './koneksi.php';
session_start();

if(isset($_POST['hapusDataBuku'])){
    $id = $_POST['id'];
    
    //hapus gambar
    $query = "SELECT * FROM bukus WHERE id = '$id'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    $gambar_db = $row['gambar'];
    unlink("../assets/buku/".$gambar_db);

    $query = "DELETE FROM bukus WHERE id = '$id'";
    $result = mysqli_query($conn, $query);

    if($result){
        echo "<script>alert('Buku berhasil dihapus');
        window.location='../buku_index.php';
        </script>";
        exit;
    }else{
        echo "<script>alert('Buku gagal dihapus');
        window.location='../buku_index.php';
        </script>";
        exit;
    }
}else{
    echo "<script>alert('Buku gagal dihapus');
    window.location='../buku_index.php';
    </script>";
    exit;
}