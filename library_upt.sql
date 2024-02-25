-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 25, 2024 at 04:52 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library_upt`
--

-- --------------------------------------------------------

--
-- Table structure for table `bukus`
--

CREATE TABLE `bukus` (
  `id` int(11) NOT NULL,
  `kode_buku` varchar(255) NOT NULL,
  `judul_buku` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `penulis` varchar(255) NOT NULL,
  `penerbit` varchar(255) NOT NULL,
  `tahun_terbit` varchar(255) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `lemari` varchar(255) NOT NULL,
  `rak` varchar(255) NOT NULL,
  `jumlah_buku` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `peminjamans`
--

CREATE TABLE `peminjamans` (
  `id` int(11) NOT NULL,
  `kode_peminjaman` varchar(255) NOT NULL,
  `id_buku` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `tgl_kunjungan` varchar(255) NOT NULL,
  `tujuan` varchar(255) NOT NULL,
  `tgl_kembali` varchar(50) NOT NULL,
  `denda` int(10) NOT NULL,
  `status` enum('diproses','dipinjam','dikembalikan') DEFAULT 'dipinjam'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `check_admin` enum('Belum Terverifikasi','Terverifikasi') DEFAULT 'Belum Terverifikasi',
  `role` enum('admin','user') DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `alamat`, `no_hp`, `email`, `email_verified_at`, `password`, `check_admin`, `role`) VALUES
(1, 'Admin', '-', '-', 'admin@gmail.com', NULL, '$2y$10$.tzdJy.sKrnZ4L7yZ4AGpuZlsU/W7nkD37QNQ8S/MtXF.WckUylvO', 'Terverifikasi', 'admin'),
(2, 'Desy', 'alamat', '0815519819', 'desy@gmail.com', '2024-02-25 02:41:45', '$2y$10$DwAsxUJ7y73yFBevpYDsku.6oXeVXwkiTlpENAGjXmSmrNZyixpnu', 'Terverifikasi', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bukus`
--
ALTER TABLE `bukus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_buku` (`kode_buku`);

--
-- Indexes for table `peminjamans`
--
ALTER TABLE `peminjamans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_peminjaman` (`kode_peminjaman`),
  ADD KEY `id_buku` (`id_buku`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bukus`
--
ALTER TABLE `bukus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `peminjamans`
--
ALTER TABLE `peminjamans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `peminjamans`
--
ALTER TABLE `peminjamans`
  ADD CONSTRAINT `peminjamans_ibfk_1` FOREIGN KEY (`id_buku`) REFERENCES `bukus` (`id`),
  ADD CONSTRAINT `peminjamans_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
