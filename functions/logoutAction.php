<?php
include './koneksi.php';
session_start();

// Hapus semua data sesi
session_unset();

// Hancurkan sesi
session_destroy();

echo "<script>
alert('Anda berhasil logout!');
window.location.href='../login.php';
</script>";
exit;