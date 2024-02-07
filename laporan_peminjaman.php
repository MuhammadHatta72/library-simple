<?php
include './functions/koneksi.php';
session_start();
if ($_SESSION['role'] != 'admin') {
    header('Location: login.php');
    exit;
}

$query_peminjaman = mysqli_query($conn, "SELECT *, peminjamans.id AS id_peminjaman, users.id AS id_user, bukus.id AS id_buku FROM peminjamans JOIN users ON peminjamans.id_user = users.id JOIN bukus ON peminjamans.id_buku = bukus.id ORDER BY peminjamans.id DESC");
$query_hasil_peminjaman = mysqli_fetch_all($query_peminjaman, MYSQLI_ASSOC);

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
                        <h1>Daftar Peminjaman</h1>
                    </div>

                    <div class="section-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Data Peminjaman</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="float-right mb-3">
                                            <a class="btn btn-success border-0 text-white createBtn" href="functions/exportPeminjaman.php" target="_blank">
                                                <i class="fas fa-print"></i>
                                                Print Peminjaman & Pengembalian Buku
                                            </a>
                                        </div>

                                        <div class="table-responsive">
                                            <table class="table table-striped" id="tablePaging">
                                                <thead>
                                                    <tr class="text-center">
                                                        <th class="text-center">Kode</th>
                                                        <th class="text-center">Nama Buku</th>
                                                        <th class="text-center">Nama Pengunjung</th>
                                                        <th class="text-center">Tanggal Kunjungan</th>
                                                        <th class="text-center">Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($query_hasil_peminjaman as $hasil_peminjaman) : ?>
                                                        <tr class="text-center">
                                                            <td><?= $hasil_peminjaman['kode_peminjaman']; ?></td>
                                                            <td><?= $hasil_peminjaman['judul_buku']; ?></td>
                                                            <td><?= $hasil_peminjaman['nama']; ?></td>
                                                            <td><?= $hasil_peminjaman['tgl_kunjungan']; ?></td>
                                                            <td>
                                                                <?php if ($hasil_peminjaman['status'] == 'dipinjam') : ?>
                                                                    <span class="badge badge-warning"><?= $hasil_peminjaman['status']; ?></span>
                                                                <?php else : ?>
                                                                    <span class="badge badge-success"><?= $hasil_peminjaman['status']; ?></span>
                                                                <?php endif; ?>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
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
