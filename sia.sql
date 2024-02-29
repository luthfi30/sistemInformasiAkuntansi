-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 29, 2024 at 07:28 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sia`
--

-- --------------------------------------------------------

--
-- Table structure for table `akuns`
--

CREATE TABLE `akuns` (
  `no_reff` bigint(20) NOT NULL,
  `nama_akuns` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `akuns`
--

INSERT INTO `akuns` (`no_reff`, `nama_akuns`, `keterangan`, `created_at`, `updated_at`) VALUES
(111, 'Kas', 'Kas', NULL, NULL),
(112, 'Piutang', 'Piutang Usaha', NULL, NULL),
(113, 'Perlengkapan', 'Perlengkapan Perusahaan', NULL, NULL),
(121, 'Peralatan', 'Peralatan Perusahaan', NULL, NULL),
(122, 'Akumulasi Peralatan', 'Akumulasi Peralatan', NULL, NULL),
(211, 'Utang Usaha', 'Utang Usaha', NULL, NULL),
(311, 'Modal', 'Modal', NULL, NULL),
(312, 'Prive', 'Prive', NULL, NULL),
(411, 'Pendapatan', 'Pendapatan', NULL, NULL),
(511, 'Beban Gaji', 'Beban Gaji', NULL, NULL),
(512, 'Beban Sewa', 'Beban Sewa', NULL, NULL),
(513, 'Beban Penyusutan Peralatan', 'Beban Penyusutan Peralatan', NULL, NULL),
(514, 'Beban Lat', 'Beban Lat', NULL, NULL),
(515, 'Beban Perlengkapan', 'Beban Perlengkapan', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_04_27_100820_create_akuns_table', 1),
(5, '2020_04_28_073144_create_transaksis_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transaksis`
--

CREATE TABLE `transaksis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `no_reff` bigint(20) UNSIGNED NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_saldo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `saldo` bigint(20) NOT NULL,
  `tanggal_transaksi` date NOT NULL,
  `tanggal_input` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaksis`
--

INSERT INTO `transaksis` (`id`, `no_reff`, `keterangan`, `jenis_saldo`, `saldo`, `tanggal_transaksi`, `tanggal_input`, `created_at`, `updated_at`) VALUES
(2, 111, 'kas', 'Debit', 193475000, '2024-02-01', '2024-02-29', NULL, '2024-02-28 23:13:21'),
(3, 112, 'piutang sewa', 'Debit', 10000000, '2024-02-16', '2024-02-29', '2024-02-28 23:11:00', '2024-02-28 23:13:38'),
(4, 113, 'Inventaris kantor', 'Debit', 7500000, '2024-02-09', '2024-02-29', '2024-02-28 23:12:30', '2024-02-28 23:12:30'),
(5, 113, 'perlengkapan', 'Debit', 6300000, '2024-02-09', '2024-02-29', '2024-02-28 23:14:10', '2024-02-28 23:14:10'),
(6, 513, 'akum. penyusutan peralatan', 'Debit', 350000, '2024-02-09', '2024-02-29', '2024-02-28 23:14:53', '2024-02-28 23:14:53'),
(7, 121, 'peralatan', 'Debit', 40000000, '2024-02-14', '2024-02-29', '2024-02-28 23:15:26', '2024-02-28 23:15:31'),
(8, 513, 'akum penyusutan', 'Debit', 600000, '2024-02-16', '2024-02-28', '2024-02-28 23:16:06', '2024-02-28 23:16:06'),
(9, 512, 'sewa gedung', 'Debit', 48475000, '2024-02-06', '2024-02-29', '2024-02-28 23:16:40', '2024-02-28 23:16:40'),
(10, 211, 'utang usaha', 'Kredit', 25000000, '2024-02-15', '2024-02-29', '2024-02-28 23:17:10', '2024-02-28 23:17:10'),
(11, 311, 'modal usaha', 'Kredit', 200000000, '2024-02-01', '2024-02-29', '2024-02-28 23:17:37', '2024-02-28 23:17:37'),
(12, 411, 'laba bulan berjalan', 'Kredit', 81700000, '2024-02-29', '2024-02-29', '2024-02-28 23:18:18', '2024-02-28 23:18:18');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, '$2y$10$.Cqi2Aqg5l0aeP4/bwO..OtxSJo.vchO4O.Zz02KNZN.BGZBXb.Fq', NULL, '2024-02-28 23:01:19', '2024-02-28 23:01:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `transaksis`
--
ALTER TABLE `transaksis`
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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `transaksis`
--
ALTER TABLE `transaksis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
