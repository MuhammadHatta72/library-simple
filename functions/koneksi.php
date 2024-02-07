<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "library_upt";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi Gagal: " . $conn->connect_error);
}

// INSERT INTO users (nama, alamat, no_hp, email, role, email_verified_at, password, check_admin) VALUES ('Admin', 'Jl. Admin', '081234567890', 'admin@gmail.com', 'admin', NOW(), '$2y$10$.tzdJy.sKrnZ4L7yZ4AGpuZlsU/W7nkD37QNQ8S/MtXF.WckUylvO', 'Terverifikasi');

?>