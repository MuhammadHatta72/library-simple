<?php

include './koneksi.php';
session_start();

if(isset($_POST['bukuUpdate'])){

    //validasi
    if(empty($_POST['judul_buku'])){
        echo "<script>alert('Judul buku tidak boleh kosong.');window.location='../buku_tambah.php';</script>";
        exit;
    } else if(empty($_POST['deskripsi'])){
        echo "<script>alert('Deskripsi tidak boleh kosong.');window.location='../buku_tambah.php';</script>";
        exit;
    } else if(empty($_POST['penulis'])){
        echo "<script>alert('Penulis tidak boleh kosong.');window.location='../buku_tambah.php';</script>";
        exit;
    } else if(empty($_POST['penerbit'])){
        echo "<script>alert('Penerbit tidak boleh kosong.');window.location='../buku_tambah.php';</script>";
        exit;
    } else if(empty($_POST['tahun_terbit'])){
        echo "<script>alert('Tahun terbit tidak boleh kosong.');window.location='../buku_tambah.php';</script>";
        exit;
    } else if(empty($_POST['kategori'])){
        echo "<script>alert('Kategori tidak boleh kosong.');window.location='../buku_tambah.php';</script>";
        exit;
    } else if(empty($_POST['lemari'])){
        echo "<script>alert('Lemari tidak boleh kosong.');window.location='../buku_tambah.php';</script>";
        exit;
    } else if(empty($_POST['rak'])){
        echo "<script>alert('Rak tidak boleh kosong.');window.location='../buku_tambah.php';</script>";
        exit;
    } else if(empty($_POST['jumlah_buku'])){
        echo "<script>alert('Jumlah buku tidak boleh kosong.');window.location='../buku_tambah.php';</script>";
        exit;
    }

    $id_buku = $_POST['id'];
    $judul_buku = $_POST['judul_buku'];
    $deskripsi = $_POST['deskripsi'];
    $penulis = $_POST['penulis'];
    $penerbit = $_POST['penerbit'];
    $tahun_terbit = $_POST['tahun_terbit'];
    $kategori = $_POST['kategori'];
    $lemari = $_POST['lemari'];
    $rak = $_POST['rak'];
    $jumlah_buku = $_POST['jumlah_buku'];

    if(isset($_FILES['gambar']['name'])){
        //hapus gambar
        $query = "SELECT * FROM bukus WHERE id = '$id_buku'";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);
        
        $gambar_db = $row['gambar'];
        unlink("../assets/buku/".$gambar_db);

        $gambar = $_FILES['gambar']['name'];
        $ekstension = explode(".", $gambar);
        $ekstension_gambar = end($ekstension);
        
        // nama gambar waktu dan extension
        $nama_gambar = time().".".$ekstension_gambar;

        move_uploaded_file($_FILES['gambar']['tmp_name'], "../assets/buku/".$nama_gambar);

        $query = "UPDATE bukus SET judul_buku = '$judul_buku', deskripsi = '$deskripsi', penulis = '$penulis', penerbit = '$penerbit', tahun_terbit = '$tahun_terbit', kategori = '$kategori', lemari = '$lemari', rak = '$rak', jumlah_buku = '$jumlah_buku', gambar = '$nama_gambar' WHERE id = '$id_buku'";
    } else {
        $query = "UPDATE bukus SET judul_buku = '$judul_buku', deskripsi = '$deskripsi', penulis = '$penulis', penerbit = '$penerbit', tahun_terbit = '$tahun_terbit', kategori = '$kategori', lemari = '$lemari', rak = '$rak', jumlah_buku = '$jumlah_buku' WHERE id = '$id_buku'";
    }

    $result = mysqli_query($conn, $query);

    if($result){
        echo "<script>alert('Buku berhasil diupdate.');window.location='../buku_index.php';</script>";
        exit;
    } else {
        echo "<script>alert('Buku gagal diupdate.');window.location='../buku_index.php';</script>";
        exit;
    }
} else {
    echo "<script>alert('Buku gagal diupdate.');window.location='../buku_index.php';</script>";
    exit;
}