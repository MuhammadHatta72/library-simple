<?php
include './koneksi.php';
session_start();

// Cek apakah tombol register sudah diklik atau blum?
if (isset($_POST['register'])) {
    // Ambil data dari formulir registrasi
    $nama = $_POST['nama'];
    $no_hp = $_POST['no_hp'];
    $email = $_POST['email'];
    $alamat = "alamat";
    $password = $_POST['password'];
    $password2 = $_POST['password_confirmation'];

    if($password != $password2){
        echo "<script>
        alert('Password tidak sama!');
        window.location.href='../register.php';
        </script>";
        exit;
    }

    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Cek apakah email sudah terdaftar
    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    if ($row['email'] == $email) {
        echo "<script>
        alert('Email sudah terdaftar!');
        window.location.href='../register.php';
        </script>";
        exit;
    }

    // Query untuk menambahkan pengguna baru
    $query = "INSERT INTO users (nama, alamat, no_hp, email, role, email_verified_at, password, check_admin) VALUES ('$nama', '$alamat', '$no_hp', '$email', 'user', NOW(), '$password', 'Belum Terverifikasi')";

    // Eksekusi query
    if (mysqli_query($conn, $query)) {
        echo "<script>
        alert('Registrasi berhasil! Silakan login.');
        window.location.href='../login.php';
        </script>";
        exit;
    } else {
        echo "<script>
        alert('Registrasi gagal! Silakan ulangi lagi.');
        window.location.href='../register.php';
        </script>";
        exit;
    }
}else{
    echo "<script>
    alert('Registrasi gagal! Silakan ulangi lagi.');
    window.location.href='../register.php';
    </script>";
    exit;
}
?>
