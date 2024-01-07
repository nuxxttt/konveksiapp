-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2023 at 02:35 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `konveksi3`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `category_id` varchar(255) NOT NULL,
  `supplier_id` varchar(255) NOT NULL,
  `kode_barang` varchar(255) NOT NULL,
  `harga_jual` varchar(20) NOT NULL,
  `harga_pokok` varchar(20) NOT NULL,
  `stok` varchar(255) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `satuan` varchar(255) NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `uuid`, `category_id`, `supplier_id`, `kode_barang`, `harga_jual`, `harga_pokok`, `stok`, `judul`, `status`, `keterangan`, `satuan`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'ABC123', '1', '1', 'B001', '10000', '7500', '-23', 'Barang pertama', 'Tersedia', 'Barang Masuk', '1', '1', NULL, NULL),
(2, 'DEF456', '1', '1', 'B002', '12000', '9000', '-267', 'Barang kedua', 'Tersedia', 'Dari Client', '1', '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `product`, `created_at`, `updated_at`) VALUES
(1, 'Kaos Partai', '2023-11-10 09:28:47', '2023-11-10 09:28:47'),
(2, 'Baju Batik', '2023-11-10 09:28:47', '2023-11-10 09:28:47');

-- --------------------------------------------------------

--
-- Table structure for table `distribusi`
--

CREATE TABLE `distribusi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mitra_id` varchar(255) NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `kode_barang` varchar(255) NOT NULL,
  `kuantitas` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_barang` varchar(255) NOT NULL,
  `category_id` varchar(255) NOT NULL,
  `supplier_id` varchar(255) NOT NULL,
  `harga_pokok` varchar(20) NOT NULL,
  `harga_jual` varchar(20) NOT NULL,
  `stok` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `kode_transaksi` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`id`, `kode_barang`, `category_id`, `supplier_id`, `harga_pokok`, `harga_jual`, `stok`, `status`, `created_by`, `kode_transaksi`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 'B001', '1', '1', '10000', '71210000', '7121', 'beli', '1', 'wlWESQTCMy', 'pembelian', '2023-11-10 21:47:47', '2023-11-10 21:47:47'),
(2, 'B001', '1', '1', '10000', '70000000', '7000', 'jual', '1', 'ft4qvvsBX4', 'penjualan', '2023-11-10 21:56:19', '2023-11-10 21:56:19'),
(3, 'B001', '1', '1', '10000', '1700000', '170', 'jual', '1', 'WASbqyxcqx', 'penjualan', '2023-11-10 21:56:34', '2023-11-10 21:56:34'),
(4, 'B001', '1', '1', '10000', '120000', '12', 'beli', '2', 'ZNNiyu03o5', 'pembelian', '2023-11-10 22:00:36', '2023-11-10 22:00:36'),
(5, 'B001', '1', '1', '10000', '120000', '12', 'beli', '1', '1MDBnF2jM3', 'pembelian', '2023-11-11 02:24:32', '2023-11-11 02:24:32'),
(6, 'B001', '1', '1', '10000', '240000', '24', 'jual', '1', '6PJhRVvzdb', 'penjualan', '2023-11-11 02:25:50', '2023-11-11 02:25:50'),
(7, 'B002', '1', '1', '12000', '756000', '63', 'jual', '1', '6PJhRVvzdb', 'penjualan', '2023-11-11 02:25:50', '2023-11-11 02:25:50'),
(8, 'B001', '1', '1', '10000', '120000', '12', 'jual', '1', 'IIIaH1lGIs', 'penjualan', '2023-11-11 02:31:28', '2023-11-11 02:31:28'),
(9, 'B002', '1', '1', '12000', '144000', '12', 'jual', '1', 'IIIaH1lGIs', 'penjualan', '2023-11-11 02:31:29', '2023-11-11 02:31:29'),
(10, 'B001', '1', '1', '10000', '120000', '12', 'jual', '1', 'lEqsqe9sS3', 'penjualan', '2023-11-11 02:35:59', '2023-11-11 02:35:59'),
(11, 'B002', '1', '1', '12000', '516000', '43', 'jual', '1', 'lEqsqe9sS3', 'penjualan', '2023-11-11 02:35:59', '2023-11-11 02:35:59'),
(12, 'B002', '1', '1', '12000', '2544000', '212', 'jual', '2', '070yBKVw48', 'penjualan', '2023-11-11 03:54:23', '2023-11-11 03:54:23');

-- --------------------------------------------------------

--
-- Table structure for table `isi_rak`
--

CREATE TABLE `isi_rak` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_rak` varchar(255) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `kuantitas` varchar(255) NOT NULL,
  `satuan` varchar(255) NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `isi_rak`
--

INSERT INTO `isi_rak` (`id`, `id_rak`, `nama_barang`, `kuantitas`, `satuan`, `created_by`, `created_at`, `updated_at`) VALUES
(1, '1', '2', '12', '2', '2', '2023-11-10 09:28:55', '2023-11-10 09:29:27');

-- --------------------------------------------------------

--
-- Table structure for table `konversi`
--

CREATE TABLE `konversi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `satuan_id1` varchar(255) NOT NULL,
  `satuan_id2` varchar(255) NOT NULL,
  `hasil_id1` varchar(255) NOT NULL,
  `hasil_id2` varchar(255) NOT NULL,
  `nama_konversi` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `konversi`
--

INSERT INTO `konversi` (`id`, `satuan_id1`, `satuan_id2`, `hasil_id1`, `hasil_id2`, `nama_konversi`, `created_at`, `updated_at`) VALUES
(5, '1', '5', '1', '20', 'kodi ke piece', '2023-11-11 00:49:40', '2023-11-11 00:49:40'),
(6, '5', '1', '20', '1', 'piece ke kodi', '2023-11-11 06:14:57', '2023-11-11 06:14:57');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_10_21_012315_create_barang_table', 1),
(6, '2023_10_21_012323_create_category_table', 1),
(7, '2023_10_21_012329_create_supplier_table', 1),
(8, '2023_10_21_012346_create_proses_produksi_table', 1),
(9, '2023_10_21_012351_create_history_table', 1),
(10, '2023_10_24_040219_create_mitra_table', 1),
(11, '2023_10_29_142122_create_rak_table', 1),
(12, '2023_10_29_142418_create_isi_rak_table', 1),
(13, '2023_11_03_133315_create_satuan_table', 1),
(14, '2023_11_04_074346_create_settings_table', 1),
(15, '2023_11_08_012255_create_distribusi_table', 1),
(16, '2023_11_08_012318_create_pemotongan_table', 1),
(17, '2023_11_08_013035_create_konversi_table', 1),
(18, '2023_11_08_100010_create_produksihistory_table', 1),
(19, '2023_11_08_135850_create_pengemasanhistory_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mitra`
--

CREATE TABLE `mitra` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mitra`
--

INSERT INTO `mitra` (`id`, `nama`, `phone`, `alamat`, `created_at`, `updated_at`) VALUES
(2, 'Nustra Pertama', '923894', 'Nganjuk', '2023-11-10 22:23:52', '2023-11-10 22:23:52');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pemotongan`
--

CREATE TABLE `pemotongan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `satuan_id1` varchar(255) NOT NULL,
  `satuan_id2` varchar(255) NOT NULL,
  `hasil_id1` varchar(255) NOT NULL,
  `hasil_id2` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pemotongan`
--

INSERT INTO `pemotongan` (`id`, `satuan_id1`, `satuan_id2`, `hasil_id1`, `hasil_id2`, `created_at`, `updated_at`) VALUES
(1, '1', '5', '12', '240', '2023-11-11 06:06:03', '2023-11-11 06:06:03'),
(2, '1', '5', '120', '2400', '2023-11-11 06:18:23', '2023-11-11 06:18:23');

-- --------------------------------------------------------

--
-- Table structure for table `pengemasanhistory`
--

CREATE TABLE `pengemasanhistory` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_barang` varchar(255) NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `kuantitas` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `produksihistory`
--

CREATE TABLE `produksihistory` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `proses_produksi`
--

CREATE TABLE `proses_produksi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product` varchar(255) NOT NULL,
  `jumlah` varchar(255) NOT NULL,
  `mulai` date NOT NULL,
  `deadline` date NOT NULL,
  `status` varchar(255) NOT NULL,
  `mitra` varchar(255) NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `proses_produksi`
--

INSERT INTO `proses_produksi` (`id`, `product`, `jumlah`, `mulai`, `deadline`, `status`, `mitra`, `created_by`, `created_at`, `updated_at`) VALUES
(1, '2', '12', '2023-11-01', '2023-11-16', 'Selesai', '1', '2', '2023-11-10 10:30:18', '2023-11-10 10:30:58'),
(2, '2', '21', '2023-11-03', '2023-11-23', 'Pending', '2', '1', '2023-11-10 22:24:27', '2023-11-10 22:24:27'),
(3, '2', '12', '2023-11-07', '2023-11-21', 'Pending', '2', '1', '2023-11-10 22:41:19', '2023-11-10 22:41:19');

-- --------------------------------------------------------

--
-- Table structure for table `rak`
--

CREATE TABLE `rak` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `satuan`
--

CREATE TABLE `satuan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `satuan`
--

INSERT INTO `satuan` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'kodi', '2023-11-10 09:28:47', '2023-11-10 09:28:47'),
(2, 'roll', '2023-11-10 09:28:47', '2023-11-10 09:28:47'),
(5, 'piece', '2023-11-11 00:49:24', '2023-11-11 00:49:24');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `supplier` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `supplier`, `address`, `phone`, `created_at`, `updated_at`) VALUES
(1, 'Nustra 1', 'Nganjuk', '832472847s', '2023-11-10 09:28:47', '2023-11-10 09:28:47');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', '2023-11-10 09:28:46', '$2y$10$oix4RQtzAvReu6VQBR.RHOFxPcHFQZ6e/yKqQuIii.A.m9fkTbyA.', 'admin', 'BoP8dg2sodBIR4bIsCzaL5dQYScHyvDi6tSvV40O5LqB3pcIVQu4YWLJntrk', '2023-11-10 09:28:46', '2023-11-10 09:28:46'),
(2, 'superadmin', 'jabatan', '2023-11-10 09:28:46', '$2y$10$fl3Ne1al0HWpG.nHlGc6SOXhWQHSMgE/QdYrqUzdazrR/sSfOSGAS', 'superadmin', '2LUJI6gWlnAHeCOyLv0rC2Tvzf0yASrY7ZDrmNV5puvQLS9hnaV0l4UAp13w', '2023-11-10 09:28:46', '2023-11-10 10:15:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `distribusi`
--
ALTER TABLE `distribusi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `isi_rak`
--
ALTER TABLE `isi_rak`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `konversi`
--
ALTER TABLE `konversi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mitra`
--
ALTER TABLE `mitra`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `pemotongan`
--
ALTER TABLE `pemotongan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengemasanhistory`
--
ALTER TABLE `pengemasanhistory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `produksihistory`
--
ALTER TABLE `produksihistory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `proses_produksi`
--
ALTER TABLE `proses_produksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rak`
--
ALTER TABLE `rak`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `satuan`
--
ALTER TABLE `satuan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `distribusi`
--
ALTER TABLE `distribusi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `isi_rak`
--
ALTER TABLE `isi_rak`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `konversi`
--
ALTER TABLE `konversi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `mitra`
--
ALTER TABLE `mitra`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pemotongan`
--
ALTER TABLE `pemotongan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pengemasanhistory`
--
ALTER TABLE `pengemasanhistory`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produksihistory`
--
ALTER TABLE `produksihistory`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `proses_produksi`
--
ALTER TABLE `proses_produksi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `rak`
--
ALTER TABLE `rak`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `satuan`
--
ALTER TABLE `satuan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
