-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2020 at 09:11 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `renfit2`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `nama`, `alamat`, `telp`, `level`, `username`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Farra', 'Magetan', '0895346032530', 'admin', 'farra', '$2y$10$nNSCGMMAb5ew.jn7dk4iouSKr8RwU2BTxQC8r4bJgPsrO579rk8vS', '2020-04-22 22:31:21', '2020-04-22 22:31:21'),
(2, 'Valen', 'Gresik', '0895346032530', 'user', 'valen', '$2y$10$LVj/Kwowht7p8/nNka15neYxjwfjAcwqMQLhH8iXW0B5ikQkG/Hsy', '2020-04-22 22:32:29', '2020-04-22 22:32:29'),
(3, 'Nafarras Ayu P', 'magetan', '081335566774', 'admin', 'nafarras', '$2y$10$IfCO4O4iqGuHO0Unuyfb5exzJk6ZlGAvJLApWBs224SVaivYeWVUG', '2020-04-24 23:09:29', '2020-04-24 23:09:29'),
(4, 'Valen Zidana', 'Gresik', '08123456', 'user', 'valen', '$2y$10$265CWPFH1VAxpH2zf.MDgOmM.UBSmWdZbOhgVrGW9iUcrDApCowD6', '2020-04-24 23:10:26', '2020-04-24 23:10:26');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2020_04_23_050656_create_login_table', 1),
(2, '2020_04_23_050801_create_outfit_table', 1),
(3, '2020_04_23_050937_create_penyewaan_table', 1),
(4, '2020_04_23_051008_create_transaksi_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `outfit`
--

CREATE TABLE `outfit` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `foto` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_baju` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kondisi_baju` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_baju` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_sewa` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `outfit`
--

INSERT INTO `outfit` (`id`, `foto`, `nama_baju`, `kondisi_baju`, `jenis_baju`, `harga_sewa`, `created_at`, `updated_at`) VALUES
(1, 'haha', 'adat bali', 'baik,mulus', 'pakaian adat', '25000', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `penyewaan`
--

CREATE TABLE `penyewaan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `foto` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lokasi` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_book` date NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_selesai` date NOT NULL,
  `harga_sewa` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penyewaan`
--

INSERT INTO `penyewaan` (`id`, `foto`, `lokasi`, `tgl_book`, `tgl_mulai`, `tgl_selesai`, `harga_sewa`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 'adat.jpg', 'magetan', '2020-04-01', '2020-04-02', '2020-04-03', '25000', 'untuk karnaval', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_penyewaan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtotal` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `outfit`
--
ALTER TABLE `outfit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penyewaan`
--
ALTER TABLE `penyewaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `outfit`
--
ALTER TABLE `outfit`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `penyewaan`
--
ALTER TABLE `penyewaan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
