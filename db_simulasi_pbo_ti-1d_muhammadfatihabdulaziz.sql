-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 18, 2026 at 06:51 AM
-- Server version: 8.4.3
-- PHP Version: 8.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_simulasi_pbo_ti-1d_muhammadfatihabdulaziz`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabel_pendaftaran`
--

CREATE TABLE `tabel_pendaftaran` (
  `id_pendaftaran` int NOT NULL,
  `nama_calon` varchar(255) NOT NULL,
  `asal_sekolah` varchar(255) NOT NULL,
  `nilai_ujian` decimal(5,2) NOT NULL,
  `biaya_pendaftaran_dasar` int NOT NULL,
  `jalur_pendaftaran` enum('Reguler','Prestasi','Kedinasan') NOT NULL,
  `pilihan_prodi` varchar(100) DEFAULT NULL,
  `lokasi_kampus` varchar(100) DEFAULT NULL,
  `jenis_prestasi` varchar(100) DEFAULT NULL,
  `tingkat_prestasi` varchar(50) DEFAULT NULL,
  `sk_ikatan_dinas` varchar(100) DEFAULT NULL,
  `instansi_sponsor` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tabel_pendaftaran`
--

INSERT INTO `tabel_pendaftaran` (`id_pendaftaran`, `nama_calon`, `asal_sekolah`, `nilai_ujian`, `biaya_pendaftaran_dasar`, `jalur_pendaftaran`, `pilihan_prodi`, `lokasi_kampus`, `jenis_prestasi`, `tingkat_prestasi`, `sk_ikatan_dinas`, `instansi_sponsor`) VALUES
(1, 'Budi Santoso', 'SMA 1 Cilacap', 85.50, 250000, 'Reguler', 'Teknik Informatika', 'Kampus Utama', NULL, NULL, NULL, NULL),
(2, 'Siti Aminah', 'SMA 2 Purwokerto', 82.00, 250000, 'Reguler', 'Sistem Informasi', 'Kampus Utama', NULL, NULL, NULL, NULL),
(3, 'Andi Wijaya', 'SMK 1 Banyumas', 78.50, 250000, 'Reguler', 'Teknik Komputer', 'Kampus Cabang', NULL, NULL, NULL, NULL),
(4, 'Dewi Lestari', 'SMA 3 Cilacap', 88.00, 250000, 'Reguler', 'Teknik Informatika', 'Kampus Utama', NULL, NULL, NULL, NULL),
(5, 'Rizky Maulana', 'SMA 1 Kroya', 80.50, 250000, 'Reguler', 'Sistem Informasi', 'Kampus Cabang', NULL, NULL, NULL, NULL),
(6, 'Fitri Ramadhani', 'SMK 2 Purwokerto', 83.00, 250000, 'Reguler', 'Teknik Komputer', 'Kampus Utama', NULL, NULL, NULL, NULL),
(7, 'Ahmad Fauzi', 'SMA 1 Maos', 81.00, 250000, 'Reguler', 'Teknik Informatika', 'Kampus Cabang', NULL, NULL, NULL, NULL),
(8, 'Rina Melati', 'SMA 4 Purwokerto', 86.50, 250000, 'Reguler', 'Sistem Informasi', 'Kampus Utama', NULL, NULL, NULL, NULL),
(9, 'Kevin Sanjaya', 'SMA 1 Jakarta', 92.00, 250000, 'Prestasi', NULL, NULL, 'Olimpiade Komputer', 'Nasional', NULL, NULL),
(10, 'Putri Kusuma', 'SMA 2 Bandung', 90.50, 250000, 'Prestasi', NULL, NULL, 'Lomba Debat Bahasa Inggris', 'Provinsi', NULL, NULL),
(11, 'Hendra Setiawan', 'SMA 1 Semarang', 89.00, 250000, 'Prestasi', NULL, NULL, 'Kejuaraan Pencak Silat', 'Nasional', NULL, NULL),
(12, 'Nita Violina', 'SMA 3 Surabaya', 91.50, 250000, 'Prestasi', NULL, NULL, 'Lomba Karya Tulis Ilmiah', 'Internasional', NULL, NULL),
(13, 'Fajar Alfian', 'SMA 1 Malang', 88.50, 250000, 'Prestasi', NULL, NULL, 'Olimpiade Matematika', 'Provinsi', NULL, NULL),
(14, 'Apriyani Rahayu', 'SMA 1 Makassar', 93.00, 250000, 'Prestasi', NULL, NULL, 'Kejuaraan Bulu Tangkis', 'Nasional', NULL, NULL),
(15, 'Gilang Dirga', 'Taruna Nusantara', 87.00, 250000, 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-DINAS-001', 'Kementerian Kominfo'),
(16, 'Tiara Andini', 'SMA 1 Bogor', 86.00, 250000, 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-DINAS-002', 'Pemprov Jawa Tengah'),
(17, 'Rangga Azof', 'SMA 2 Depok', 85.50, 250000, 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-DINAS-003', 'Kementerian Keuangan'),
(18, 'Maudy Ayunda', 'SMA 1 Bekasi', 88.00, 250000, 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-DINAS-004', 'Kementerian BUMN'),
(19, 'Reza Rahadian', 'SMA 3 Tangerang', 84.50, 250000, 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-DINAS-005', 'Pemkab Cilacap'),
(20, 'Chelsea Islan', 'SMA 1 Sleman', 87.50, 250000, 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-DINAS-006', 'Kementerian Pertahanan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_pendaftaran`
--
ALTER TABLE `tabel_pendaftaran`
  ADD PRIMARY KEY (`id_pendaftaran`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabel_pendaftaran`
--
ALTER TABLE `tabel_pendaftaran`
  MODIFY `id_pendaftaran` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
