-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 03, 2023 at 04:13 AM
-- Server version: 10.5.15-MariaDB-cll-lve
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smartwat_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `log_water`
--

CREATE TABLE `log_water` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pemakaian_air` double(4,2) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `log_water`
--

INSERT INTO `log_water` (`id`, `pemakaian_air`, `status`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 10.50, 'Baik', '2', '2023-06-26 11:08:10', '2023-06-26 11:08:10'),
(2, 10.50, 'Baik', '2', '2023-06-27 11:08:31', '2023-06-26 11:08:31'),
(3, 11.50, 'Baik', '2', '2023-06-27 07:20:50', '2023-06-27 07:20:50'),
(4, 9.50, 'Baik', '2', '2023-06-27 07:20:58', '2023-06-27 07:20:58'),
(5, 9.50, 'Baik', '2', '2023-07-02 01:43:49', '2023-07-02 01:43:49'),
(6, 9.50, 'Baik', '7', '2023-07-02 01:44:15', '2023-07-02 01:44:15'),
(7, 9.50, 'Baik', '7', '2023-07-02 01:47:48', '2023-07-02 01:47:48'),
(8, 9.50, 'Baik', '7', '2023-07-02 01:47:49', '2023-07-02 01:47:49'),
(9, 9.50, 'Baik', '7', '2023-07-02 01:53:15', '2023-07-02 01:53:15'),
(10, 10.30, 'baik', '2', '2023-07-02 07:22:27', '2023-07-02 07:22:27'),
(11, 10.30, 'baik', '2', '2023-07-02 12:05:43', '2023-07-02 12:05:43'),
(12, 10.30, 'baik', '2', '2023-07-02 12:08:10', '2023-07-02 12:08:10'),
(13, 10.30, 'baik', '2', '2023-07-02 12:52:49', '2023-07-02 12:52:49'),
(14, 10.30, 'Terjadi kerusakan ', '2', '2023-07-02 12:53:13', '2023-07-02 12:53:13'),
(15, 9.41, 'baik', '4', '2023-07-02 12:54:20', '2023-07-02 12:54:20'),
(16, 18.91, 'baik', '4', '2023-07-02 12:55:20', '2023-07-02 12:55:20'),
(17, 28.41, 'baik', '4', '2023-07-02 12:56:20', '2023-07-02 12:56:20'),
(18, 37.91, 'baik', '4', '2023-07-02 12:57:20', '2023-07-02 12:57:20'),
(19, 47.41, 'baik', '4', '2023-07-02 12:58:26', '2023-07-02 12:58:26'),
(20, 56.91, 'baik', '4', '2023-07-02 12:59:26', '2023-07-02 12:59:26'),
(21, 66.41, 'baik', '4', '2023-07-02 13:00:26', '2023-07-02 13:00:26'),
(22, 75.91, 'baik', '4', '2023-07-02 13:01:26', '2023-07-02 13:01:26'),
(23, 85.41, 'baik', '4', '2023-07-02 13:02:26', '2023-07-02 13:02:26'),
(24, 94.91, 'baik', '4', '2023-07-02 13:03:26', '2023-07-02 13:03:26');

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
(5, '2014_10_12_000000_create_users_table', 1),
(6, '2014_10_12_100000_create_password_resets_table', 1),
(7, '2019_08_19_000000_create_failed_jobs_table', 1),
(8, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(12, '2023_06_24_181151_create_log_water', 2);

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(6, 'App\\Models\\User', 1, 'access-token', 'faaee00eef69eb525896499866f4e7eb5a447400c34749428721640596e8f0e0', '[\"*\"]', NULL, NULL, '2023-06-26 10:25:55', '2023-06-26 10:25:55');

-- --------------------------------------------------------

--
-- Table structure for table `tagihan`
--

CREATE TABLE `tagihan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bulan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_tagihan` int(11) NOT NULL,
  `status_pembayaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tagihan`
--

INSERT INTO `tagihan` (`id`, `bulan`, `jumlah_tagihan`, `status_pembayaran`, `user_id`, `created_at`, `updated_at`) VALUES
(3, 'June-2023', 84000, 'belum', '2', NULL, NULL),
(4, 'June-2023', 84000, 'belum', '6', NULL, NULL),
(5, 'June-2023', 84000, 'belum', '7', NULL, NULL),
(6, 'June-2023', 84000, 'belum', '8', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','pengguna') COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `api_token` varchar(155) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `remember_token`, `api_token`, `created_at`, `updated_at`) VALUES
(1, 'Irpan Nawawi', 'irpannawawi.ixd@gmail.com', '$2y$10$cPzAzBLtfXcTjT9Up941zOh5kNtEqWqLleXIKa74o.5vzh6QFA4HO', 'admin', NULL, '$2y$10$qP080k3mBdiupD5yI2kvK.FsZ5/Q/4sDjwHxawVXcTKcT6IDN46O6', '2023-06-24 08:00:25', '2023-06-27 07:19:11'),
(2, 'Rudi', 'rudi@gmail.com', '$2y$10$fGW.LzTkrtvp7RrhCADUH.g3tTqyeByVvB/t636Twd1QD1P.eYNBO', 'pengguna', NULL, NULL, NULL, '2023-06-27 05:27:03'),
(3, 'Admin', 'admin@gmail.com', '$2y$10$p/GcX/9TxQLPCEBZE4J5TOlPZAqSHQywTYU3XKrILEnPXc6SPdQU.', 'admin', NULL, '$2y$10$bnbWUJky17yV61NeSOztPumi53XwfEvEuhgnyvIAb6KdPRz/ZgUg.', NULL, '2023-06-27 11:11:05'),
(4, 'Bima', 'bima14pro@gmail.com', '$2y$10$NPj3cD6U0BRLJOnY452K7e6PdejkvHWkro1tb/vIYdNthEn4RzuSO', 'admin', NULL, '$2y$10$.SN5TDgknQxOZPBzMM/yR.Zs.yE86.UfdJAGXCAdHQvZcp2VRYxdW', NULL, '2023-06-27 11:11:32'),
(6, 'rizal', 'rizal@gmail.com', '$2y$10$JIRc5qHYnzXndqaj8Gls6.FiOtEuQ9CdKZ2F.WTNas.58C9PhZzQC', 'pengguna', NULL, NULL, NULL, NULL),
(7, 'bima2', 'bima@gmail.com', '$2y$10$NqQ5a4fiBbsbozOxUCPqKem.akdg7Ahb.OdN8mC.vzgHr8Uk7FQUq', 'pengguna', NULL, '$2y$10$ccEQn4.oxVOYk6mpqgggq.GZpbfLWWs5CfZxrR5P39RLR36ThymZG', NULL, '2023-07-02 01:32:53'),
(8, 'sandi', 'sandi@gmail.com', '$2y$10$NnlDS61/A5uPyXy633NVOOPRZ4CCeNJSnEhVQ/oZOasFHgnUVR8M.', 'pengguna', NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `log_water`
--
ALTER TABLE `log_water`
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
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `tagihan`
--
ALTER TABLE `tagihan`
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
-- AUTO_INCREMENT for table `log_water`
--
ALTER TABLE `log_water`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tagihan`
--
ALTER TABLE `tagihan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
