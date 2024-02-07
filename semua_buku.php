<?php
    include './functions/koneksi.php';
    session_start();    

    $query_buku = mysqli_query($conn, "SELECT * FROM bukus WHERE jumlah_buku > 0");
    $query_hasil_buku = mysqli_fetch_all($query_buku, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="assets/landing/img/pppbulutuban.png">
    <title>UPT - Pelabuhan Perikanan Pantai Bulu</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">

    <!-- Favicon -->
    <link href="" rel="icon">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="assets/landing/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="assets/landing/lib/animate/animate.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="assets/css/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="assets/landing/css/style.css" rel="stylesheet">
    
    <!-- DataTables -->
    <link rel="stylesheet" href="assets/vendor/DataTables-1.13.6/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="assets/vendor/DataTables-1.13.6/css/jquery.dataTables.css">

    <script src="assets/vendor/sweetalert2/sweetalert2.all.min.js"></script>
    <script src="assets/vendor/Jquery/jquery-3.6.0.min.js"></script>
    
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner"
        class="bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner"></div>
    </div>
    <!-- Spinner End -->


    <!-- Topbar Start -->
    <div class="container-fluid bg-dark px-5 d-none d-lg-block">
        <div class="row gx-0">
            <div class="col-lg-8 text-center text-lg-start mb-2 mb-lg-0">
                <div class="d-inline-flex align-items-center" style="height: 45px;">
                    <small class="me-3 text-light"><i class="fa fa-map-marker-alt me-2"></i>123 Street, New York,
                        USA</small>
                    <small class="me-3 text-light"><i class="fa fa-phone-alt me-2"></i>085156957434</small>
                    <small class="text-light"><i class="fa fa-envelope-open me-2"></i>ppp_bulu@jatimprov.go.id</small>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar & Carousel Start -->
    <div class="container-fluid position-relative p-0">
        <nav class="navbar navbar-expand-lg navbar-dark px-5 py-3 py-lg-0 sticky-top shadow-sm">
            <a href="/" class="navbar-brand p-0">
                <img src="assets/landing/img/logo.gif" alt="logo" class="img-fluid my-3" style="width: 250px" />
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0">
                    <a href="http://localhost/perpustakaan_upt_ppp_bulu/" class="nav-item nav-link">Beranda</a>
                    <a href="semua_buku.php" class="nav-item nav-link">Perpus Digital</a>
                </div>
                <?php
                        if(isset($_SESSION['login'])){
                    ?>
                        <div class="dropdown">
                            <a class="btn btn-primary dropdown-toggle py-2 px-4 ms-3" href="#" role="button" id="dropdownMenuLink"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user"></i> <?php echo $_SESSION['nama']; ?>
                            </a>

                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <?php
                                    if($_SESSION['role'] == 'user'){
                                ?>
                                <li><a class="dropdown-item" href="dashboard_user.php">Dashboard</a></li>
                                <?php
                                    }else{
                                ?>
                                <li><a class="dropdown-item" href="dashboard.php">Dashboard</a></li>
                                <?php
                                    }
                                ?>
                                <li><a class="dropdown-item" href="profil_user.php">Profil</a></li>
                                <li>
                                    <a href="functions/logoutAction.php" class="dropdown-item has-icon text-danger"
                                    onclick="return confirm('Apakah anda yakin ingin keluar?')">
                                        <i class="fas fa-sign-out-alt"></i> Logout
                                    </a>
                                </li>
                            </ul>
                        </div>
                    <?php
                        }else{
                    ?>
                        <a href="login.php" class="btn btn-primary py-2 px-4 ms-3">LOGIN</a>
                    <?php
                        }
                    ?>
            </div>
        </nav>

        <!-- Navbar & Carousel Start -->
    <div class="container-fluid position-relative p-0">
        <div class="container-fluid wow zoomIn px-0" data-wow-delay="0.3s">
            <div class="card border-0">
                <img src="assets/landing/img/uptbulu.jpg" class="qq card-img" alt="..."
                    style="max-height: 500px; filter: brightness(55%); object-fit:cover">
                <div class="tt card-img-overlay" style="top:45%">
                    <div class="card-title display-4 text-center fw-bold text-light">
                        e-Katalog Perpustakaan
                    </div>
                    <div class="card-text text-center text-light">
                        <p class="lead">Layanan Katalog Buku PerpustakaanPelabuhan Perikanan Pantai Bulu Secara Online</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- Navbar & Carousel End -->

    
    <div class="container-fluid bg-light py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title section-title-sm position-relative pb-3 mb-4">
                        <h3 class="text-dark mb-0">e-Katalog Perpustakaan</h3>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped" id="table">
                            <thead>
                                <tr class="text-center">
                                    <th class="text-center">No</th>
                                    <th class="text-center">Kode Buku</th>
                                    <th class="text-center">Judul Buku</th>
                                    <th class="text-center">Penulis</th>
                                    <th class="text-center">Penerbit</th>
                                    <th class="text-center">Tahun</th>
                                    <th class="text-center">Jumlah</th>
                                    <th class="text-center">Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach($query_hasil_buku as $key => $value){
                                ?>
                                <tr>
                                    <td class="text-center"><?php echo $key+1; ?></td>
                                    <td class="text-center"><?php echo $value['kode_buku']; ?></td>
                                    <td class="text-center"><?php echo $value['judul_buku']; ?></td>
                                    <td class="text-center"><?php echo $value['penulis']; ?></td>
                                    <td class="text-center"><?php echo $value['penerbit']; ?></td>
                                    <td class="text-center"><?php echo $value['tahun_terbit']; ?></td>
                                    <td class="text-center"><?php echo $value['jumlah_buku']; ?></td>
                                    <td class="d-flex justify-content-center gap-1 align-items-center">
                                        <button type="submit" class="btn btn-sm btn-primary pinjamBukuUser" data-id="<?php echo $value['id']; ?>">
                                            <i class="bi bi-arrow-right"></i> Pinjam
                                        </button>
                                    </td>
                                </tr>
                                <?php
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="viewPinjamUser" tabindex="-1" data-backdrop="static"
         data-keyboard="false" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Pinjam Buku</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row mb-3">
                        <form action="functions/pinjamBukuAction.php" method="post">
                            <input type="hidden" name="id_book" id="id_book">
                            <input type="hidden" name="id_user" id="id_user" value="<?= $_SESSION['id']; ?>">
                            <div class="col-md-12 mb-3">
                                <label for="tgl_kunjungan" class="mb-2">Tanggal Kunjungan</label>
                                <input type="text" id="tgl_kunjungan" name="tgl_kunjungan" class="form-control" value="<?= date('Y-m-d'); ?>" readonly>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="tujuan_kunjungan" class="mb-2">Tujuan Kunjungan</label>
                                <textarea name="tujuan_kunjungan" id="tujuan_kunjungan" class="form-control" cols="30" rows="5"></textarea>
                            </div>
                            <div class="col-md-12 mb-3">
                                <input type="hidden" name="pinjamBuku" value="pinjamBuku">
                                <button type="submit" class="btn btn-primary btn-block">Pinjam</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="wow fadeInUp" id="blog" data-wow-delay="0.1s"
        style="visibility: hidden; animation-delay: 0.1s; animation-name: none;">
        <img class="img-fluid" src="assets/landing/img/WBS-PPPBULU.webp" style="width: 100%" alt="">
    </div>


    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light wow fadeInUp" data-wow-delay="0.1s"
    style="visibility: hidden; animation-delay: 0.1s; animation-name: none;">
        <div class="container">
            <div class="row gx-5">
                <div class="col-md-12">
                    <div class="row gx-5">
                        <div class="col-lg-3 col-md-12 pt-5 mb-5">
                            <div class="section-title section-title-sm position-relative pb-3 mb-4">
                                <h3 class="text-light mb-0">Kontak Kami</h3>
                            </div>
                            <div class="d-flex mb-2">
                                <i class="bi bi-geo-alt text-primary me-2"></i>
                                <p class="mb-0">Jalan Raya Tuban-Semarang Km.45 Desa Bulumeduro, Kecamatan Bancar, Tuban (62354)</p>
                            </div>
                            <div class="section-title section-title-sm position-relative pb-3 mb-4">
                                <h3 class="text-light mb-0">Ikuti Kami</h3>
                            </div>
                            <div class="d-flex mt-4">
                                <a class="btn btn-primary btn-square me-2" href="#"><i
                                        class="fab fa-twitter fw-normal"></i></a>
                                <a class="btn btn-primary btn-square me-2" href="#"><i
                                        class="fab fa-facebook-f fw-normal"></i></a>
                                <a class="btn btn-primary btn-square me-2" href="#"><i
                                        class="fab fa-linkedin-in fw-normal"></i></a>
                                <a class="btn btn-primary btn-square" href="#"><i
                                        class="fab fa-instagram fw-normal"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-12 pt-0 pt-lg-5 mb-5">
                            <div class="section-title section-title-sm position-relative pb-3 mb-4">
                                <h3 class="text-light mb-0">Informasi Publik</h3>
                            </div>
                            <div class="link-animated d-flex flex-column justify-content-start">
                                <a class="text-light mb-2" href="#"><i
                                        class="bi bi-arrow-right text-primary me-2"></i>Silayut Mantap</a>
                                <a class="text-light mb-2" href="#"><i
                                        class="bi bi-arrow-right text-primary me-2"></i>Literasi DIgital</a>
                                <a class="text-light mb-2" href="#"><i
                                        class="bi bi-arrow-right text-primary me-2"></i>DKP Jatim</a>
                            </div>
                            <div class="section-title section-title-sm position-relative pb-3 mb-4">
                                <h3 class="text-light mb-0">Link Terkait</h3>
                            </div>
                            <div class="link-animated d-flex flex-column justify-content-start">
                                <a class="text-light mb-2" href="#"><i
                                        class="bi bi-arrow-right text-primary me-2"></i>Simpelpas</a>
                                <a class="text-light mb-2" href="#"><i
                                        class="bi bi-arrow-right text-primary me-2"></i>Masdanis</a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 pt-0 pt-lg-5 mb-5">
                            <div>
                                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1980.9964992586983!2d111.725335!3d-6.770705000000001!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e770f5b81de2363%3A0xab1208b5d261f1cd!2sUPT%20Pelabuhan%20Perikanan%20Pantai%20Bulu!5e0!3m2!1sen!2sus!4v1702870858396!5m2!1sen!2sus" width="600" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid text-white" style="background: #061429;">
        <div class="container text-center">
            <div class="row justify-content-end">
                <div class="col-md-12">
                    <div class="d-flex align-items-center justify-content-center" style="height: 75px;">
                        <p class="mb-0">© Designed by Desy Shofiatul hidayah 2024.
                            All Rights Reserved. 
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded back-to-top" style="display: inline;"><i
            class="bi bi-arrow-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="assets/vendor/Jquery/jquery-3.6.0.min.js"></script>
    <script src="assets/css/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/landing/lib/wow/wow.min.js"></script>
    <script src="assets/landing/lib/easing/easing.min.js"></script>
    <script src="assets/landing/lib/waypoints/waypoints.min.js"></script>
    <script src="assets/landing/lib/counterup/counterup.min.js"></script>
    <script src="assets/landing/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="assets/vendor/DataTables-1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="assets/vendor/DataTables-1.13.6/js/jquery.dataTables.js"></script>

    <!-- Template Javascript -->
    <script src="assets/landing/js/main.js"></script>
    <script src="assets/js/sweetalert.js"></script>

    <script>
        $(document).ready(function() {
            $('#table').DataTable({
                "paging": true,
                "ordering": true,
                "info": true,
                "searching": true,
                "lengthChange": true,
                "autoWidth": true,
                "responsive": true,
            });

            $('.pinjamBukuUser').click(function() {
                let auth = "<?= isset($_SESSION['login']) ? $_SESSION['login'] : false; ?>";
                if(auth == false){
                    Swal.fire({
                        title: 'Perhatian!',
                        text: 'Silahkan login terlebih dahulu untuk melakukan peminjaman buku',
                        icon: 'warning',
                        confirmButtonText: 'OK'
                    })
                }else{
                    let id_book = $(this).data('id');
                    $('#viewPinjamUser').modal('show');
                    $('#id_book').val(id_book);
                }
            });

            // close modal
            $('#viewPinjamUser').on('hidden.bs.modal', function() {
                $('#id_book').val('');
                $('#id_user').val('');
                $('#tgl_kunjungan').val('');
                $('#tujuan_kunjungan').val('');
            });
            
        });
    </script>

</body>

</html>
