<?php

include './koneksi.php';
session_start();


if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    if($row['email'] == $email){
        if(password_verify($password, $row['password'])){
            if($row['check_admin'] == 'Terverifikasi'){
                $_SESSION['login'] = true;
                $_SESSION['id'] = $row['id'];
                $_SESSION['nama'] = $row['nama'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['role'] = $row['role'];
                $_SESSION['alamat'] = $row['alamat'];
                $_SESSION['no_hp'] = $row['no_hp'];
                $_SESSION['check_admin'] = $row['check_admin'];
                if($row['role'] == 'admin'){
                    echo "<script>
                    alert('Berhasil login sebagai admin!');
                    window.location.href='../dashboard.php';
                    </script>";
                    exit;
                }else{
                    echo "<script>
                    alert('Berhasil login sebagai user!');
                    window.location.href='../dashboard_user.php';
                    </script>";
                    exit;
                }
            }else{
                echo "<script>
                alert('Akun anda belum diverifikasi oleh admin!');
                window.location.href='../login.php';
                </script>";
                exit;
            }
        }else{
            // display alert lalu redirect ke login.php
            echo "<script>
                alert('Gagal login, silahkan ulangi lagi!');
                window.location.href='../login.php';
                </script>";
                exit;
        }
    }
    echo "<script>
        alert('Gagal login, silahkan ulangi lagi!');
        window.location.href='../login.php';
        </script>";
        exit;
}

