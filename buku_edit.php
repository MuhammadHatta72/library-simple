<?php
include './functions/koneksi.php';
session_start();
if ($_SESSION['role'] != 'admin') {
    header('Location: login.php');
    exit;
}

$query = "SELECT * FROM bukus WHERE id = $_GET[id]";
$result = mysqli_query($conn, $query);
$buku = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport" />
    <link rel="shortcut icon" href="assets/img/pppbulutuban.png">
    <title>UPT - Pelabuhan Perikanan Pantai Bulu Tuban</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T">

    <link href="assets/css/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous" />

    <link href="assets/css/vendor/fontawesome-free-5.15.4-web/css/all.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="assets/vendor/DataTables-1.13.6/css/dataTables.bootstrap5.min.css">


    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

    <script src="assets/vendor/sweetalert2/sweetalert2.all.min.js"></script>
    <script src="assets/vendor/Jquery/jquery-3.6.0.min.js"></script>


    <link rel="stylesheet" href="assets/css/vendor/select2/select2.min.css">
    <script src="assets/css/vendor/select2/select2.min.js"></script>

    <!-- Template CSS -->
    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="stylesheet" href="assets/css/components.css" />
</head>

<body>
    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <form class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li>
                            <a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a>
                        </li>
                    </ul>
                </form>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <a href="#" data-bs-toggle="dropdown" class="nav-link dropdown-toggle">
                            <img alt="image" src="assets/img/avatar/avatar-1.png" class="rounded-circle me-1"
                                style="width: 30px; height: 30px" />
                            <span class="d-none d-lg-inline-block">
                                <?= $_SESSION['nama']; ?>
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                                <a href="profil.php" class="dropdown-item has-icon">
                                    <i class="far fa-user"></i> Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a href="functions/logoutAction.php" class="dropdown-item has-icon text-danger"
                                onclick="return confirm('Apakah anda yakin ingin keluar?')">
                                    <i class="fas fa-sign-out-alt"></i> Logout
                                </a>
                        </div>
                    </li>
                </ul>

            </nav>
            <div class="main-sidebar sidebar-style-2">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand mt-1">
                        <a href="http://localhost/perpustakaan_upt_ppp_bulu">
                            <img src="assets/img/pppbulutuban.png" alt="logo" width="100" class="img-fluid">
                        </a>
                    </div>
                    <div class="sidebar-brand sidebar-brand-sm mt-1">
                        <a href="http://localhost/perpustakaan_upt_ppp_bulu">
                            <img src="assets/img/pppbulutuban.png" alt="logo" width="70" class="img-fluid">
                        </a>
                    </div>
                    <ul class="sidebar-menu mt-5">
                            <li class="menu-header">Menu</li>
                            <li class="nav-item">
                                <a href="dashboard.php" class="nav-link">
                                    <i class="fas fa-poll-h"></i><span>Dashboard</span>
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a href="#" class="nav-link has-dropdown">
                                    <i class="fas fa-book"></i><span>Buku</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="nav-link"
                                            href="buku_tambah.php">Tambah Buku</a>
                                    </li>
                                    <li>
                                        <a class="nav-link"
                                            href="buku_index.php">Daftar Buku</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a href="#" class="nav-link has-dropdown">
                                    <i class="fas fa-list"></i><span>Peminjaman</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="nav-link"
                                            href="pemesanan_tambah.php">Tambah Peminjaman</a>
                                    </li>
                                    <li>
                                        <a class="nav-link"
                                            href="pemesanan_index.php">Daftar Peminjaman</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a href="#" class="nav-link has-dropdown">
                                    <i class="fas fa-users"></i><span>Pengguna</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="nav-link"
                                            href="pengguna_index.php">Daftar Pengguna</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a href="#" class="nav-link has-dropdown">
                                    <i class="fas fa-newspaper"></i> <span>Laporan</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="nav-link" href="laporan_buku.php">Daftar Buku</a>
                                    </li>
                                    <li>
                                        <a class="nav-link" href="laporan_pengguna.php">Daftar Pengguna</a>
                                    </li>
                                    <li>
                                        <a class="nav-link" href="laporan_peminjaman.php">Daftar Peminjaman</a>
                                    </li>
                                </ul>
                            </li>
                    </ul>

                    <div class="mt-4 mb-4 p-2 hide-sidebar-mini">
                        <a href="http://localhost/perpustakaan_upt_ppp_bulu/" target="_blank" class="btn btn-primary btn-lg btn-block btn-icon-split">
                            <img src="assets/img/pppbulutuban.png" alt="logo" width="30" class="img-fluid">
                            PPP BULU TUBAN
                        </a>
                    </div>
                </aside>

            </div>

            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        <h1>Edit Buku</h1>
                    </div>

                    <div class="section-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Data Buku</h4>
                                    </div>
                                    <div class="card-body">
                                        <form method="post" id="form-id" action="functions/bukuUpdate.php"
                                            enctype="multipart/form-data">
                                        
                                            <div class="row">
                                                <div class="col-md-12 mb-3">
                                                    <input type="hidden" name="id" value="<?= $buku['id']; ?>">
                                                    <label for="kode_buku" class="form-label">Kode Buku<span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control"
                                                        id="kode_buku" value="<?= $buku['kode_buku']; ?>" readonly/>
                                                    
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 mb-3">
                                                    <label for="judul_buku" class="form-label">Judul Buku<span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control"
                                                        id="judul_buku" name="judul_buku" value="<?= $buku['judul_buku']; ?>" />
                                                    
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 mb-3">
                                                    <label for="deskripsi" class="form-label">Deskripsi<span
                                                            class="text-danger">*</span></label>
                                                    <textarea class="form-control"
                                                        id="deskripsi" name="deskripsi" rows="3" style="height: 100px;"><?= $buku['deskripsi']; ?></textarea>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 mb-3">
                                                    <label for="penulis" class="form-label">Penulis<span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control"
                                                        id="penulis" name="penulis" value="<?= $buku['penulis']; ?>" />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 mb-3">
                                                    <label for="penerbit" class="form-label">Penerbit<span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control"
                                                        id="penerbit" name="penerbit" value="<?= $buku['penerbit']; ?>" />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 mb-3">
                                                    <label for="tahun_terbit" class="form-label">Tahun Terbit<span
                                                            class="text-danger">*</span></label>
                                                    <input type="number" class="form-control "
                                                        id="tahun_terbit" name="tahun_terbit" value="<?= $buku['tahun_terbit']; ?>" />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 mb-3">
                                                    <label for="kategori" class="form-label">Kategori<span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control"
                                                        id="kategori" name="kategori" value="<?= $buku['kategori']; ?>" />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 mb-3">
                                                    <label for="lemari" class="form-label">Lemari<span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control"
                                                        id="lemari" name="lemari" value="<?= $buku['lemari']; ?>" />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 mb-3">
                                                    <label for="rak" class="form-label">Rak<span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control "
                                                        id="rak" name="rak" value="<?= $buku['rak']; ?>" />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 mb-3">
                                                    <label for="jumlah_buku" class="form-label">Jumlah Buku<span
                                                            class="text-danger">*</span></label>
                                                    <input type="number" class="form-control "
                                                        id="jumlah_buku" name="jumlah_buku" value="<?= $buku['jumlah_buku']; ?>" />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <input type="hidden" name="bukuUpdate" value="bukuUpdate">
                                                <div class="col-md-12 mb-3">
                                                    <label for="gambar" class="form-label">Gambar<span
                                                            class="text-danger">*</span></label>
                                                    <input type="file" class="form-control"
                                                        id="gambar" name="gambar" />
                                                </div>
                                            </div>
                                            <a href="buku_index.php" class="btn btn-warning">Kembali</a>
                                            <button type="submit" class="btn btn-success">Tambah</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

            <footer class="main-footer">
                <div class="footer-left">
                    Copyright &copy; 2024
                    <div class="bullet"></div>
                    Developed By Desy Shofiatul hidayah 2024.
                </div>
                <div class="footer-right">0.1</div>

            </footer>
        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="assets/css/vendor/bootstrap/js/bootstrap.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
    <script src="assets/vendor/DataTables-1.13.6/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="assets/vendor/DataTables-1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="assets/js/stisla.js"></script>

    <!-- Template JS File -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/scripts.js"></script>
    <script src="assets/js/sweetalert.js"></script>

</body>

</html>
