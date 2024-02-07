<?php

include './koneksi.php';
session_start();

if(isset($_POST['updateProfilUser'])){
    $id = $_SESSION['id'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $no_hp = $_POST['no_hp'];
    $alamat = $_POST['alamat'];
    $password = $_POST['password'];
    $password_2 = $_POST['password_2'];

    if($password != $password_2){
        echo "<script>alert('Password pertama dan kedua harus sama');window.location='../profil_user.php';</script>";
        exit;
    }

    //cek email sudah terdaftar atau belum selain email user yang sedang login
    $query_user = "SELECT * FROM users WHERE email='$email' AND id!='$id'";
    $result_user = mysqli_query($conn, $query_user);
    $cek = mysqli_num_rows($result_user);

    if($cek > 0){
        echo "<script>alert('Email sudah terdaftar');window.location='../profil_user.php';</script>";
        exit;
    }

    $password_jadi = password_hash($password, PASSWORD_DEFAULT);

    // jika password tidak diubah
    if($password == ''){
        $query = "UPDATE users SET nama='$nama', email='$email', no_hp='$no_hp', alamat='$alamat' WHERE id='$id'";
        $result = mysqli_query($conn, $query);
    }else{
        $query = "UPDATE users SET nama='$nama', email='$email', no_hp='$no_hp', alamat='$alamat', password='$password_jadi' WHERE id='$id'";
        $result = mysqli_query($conn, $query);
    }

    $query_user_asli = "SELECT * FROM users WHERE id='$id'";
    $result_user_asli = mysqli_query($conn, $query_user_asli);
    $data_user = mysqli_fetch_assoc($result_user_asli);

    // update session
    $_SESSION['nama'] = $data_user['nama'];
    $_SESSION['email'] = $data_user['email'];
    $_SESSION['alamat'] = $data_user['alamat'];
    $_SESSION['no_hp'] = $data_user['no_hp'];

    if($result){
        echo "<script>alert('Profil berhasil diupdate');window.location='../profil_user.php';</script>";
        exit;
    }else{
        echo "<script>alert('Profil gagal diupdate');window.location='../profil_user.php';</script>";
        exit;
    }
}
