-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2023 at 03:34 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spk-rec-aslab`
--

-- --------------------------------------------------------

--
-- Table structure for table `aslab`
--

CREATE TABLE `aslab` (
  `nim` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dataalternatif`
--

CREATE TABLE `dataalternatif` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(255) NOT NULL,
  `nim` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dataalternatif`
--

INSERT INTO `dataalternatif` (`id`, `kode`, `nim`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'A01', '2118060', 'Cornelia', '2023-06-05 04:24:08', '2023-06-05 04:24:08'),
(3, 'A02', '2118061', 'Kevin', '2023-06-05 05:15:25', '2023-06-05 05:15:25');

-- --------------------------------------------------------

--
-- Table structure for table `dataaslab`
--

CREATE TABLE `dataaslab` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nim` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(255) NOT NULL,
  `ipk` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dataaslab`
--

INSERT INTO `dataaslab` (`id`, `nim`, `nama`, `jenis_kelamin`, `ipk`, `created_at`, `updated_at`) VALUES
(4, '2118060', 'Cornelia', 'Perempuan', '4.00', '2023-06-05 05:12:08', '2023-06-05 05:12:08');

-- --------------------------------------------------------

--
-- Table structure for table `datadosen`
--

CREATE TABLE `datadosen` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nip` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `mk` varchar(255) NOT NULL,
  `lab` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `datadosen`
--

INSERT INTO `datadosen` (`id`, `nip`, `nama`, `mk`, `lab`, `created_at`, `updated_at`) VALUES
(6, '19019010', 'Mikhael', 'Pengolahan Citra Digital', 'Multimedia', '2023-06-05 05:22:25', '2023-06-05 05:22:25');

-- --------------------------------------------------------

--
-- Table structure for table `datakriteria`
--

CREATE TABLE `datakriteria` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(255) NOT NULL,
  `kriteria` varchar(255) NOT NULL,
  `bobot` decimal(4,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `datakriteria`
--

INSERT INTO `datakriteria` (`id`, `kode`, `kriteria`, `bobot`, `created_at`, `updated_at`) VALUES
(4, 'C01', 'Mengajar', '0.35', '2023-06-05 04:25:02', '2023-06-05 04:26:47'),
(5, 'C02', 'Wawancara', '0.35', '2023-06-05 04:26:57', '2023-06-05 04:26:57'),
(6, 'C03', 'Tes tertulis', '0.30', '2023-06-05 04:27:05', '2023-06-05 04:27:05');

-- --------------------------------------------------------

--
-- Table structure for table `datalab`
--

CREATE TABLE `datalab` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `namaprak` varchar(255) NOT NULL,
  `semester` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `datalab`
--

INSERT INTO `datalab` (`id`, `namaprak`, `semester`, `created_at`, `updated_at`) VALUES
(4, 'Struktur Data', 'Genap', '2023-06-05 05:13:53', '2023-06-05 05:13:53');

-- --------------------------------------------------------

--
-- Table structure for table `datapenggunas`
--

CREATE TABLE `datapenggunas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `datapenilaian`
--

CREATE TABLE `datapenilaian` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_alternatif` bigint(20) UNSIGNED NOT NULL,
  `id_kriteria` bigint(20) UNSIGNED NOT NULL,
  `nilai` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `datapenilaian`
--

INSERT INTO `datapenilaian` (`id`, `id_alternatif`, `id_kriteria`, `nilai`, `created_at`, `updated_at`) VALUES
(14, 1, 4, 4, '2023-06-05 04:35:08', '2023-06-05 04:35:08'),
(15, 1, 5, 3, '2023-06-05 04:35:14', '2023-06-05 04:35:14'),
(16, 1, 6, 2, '2023-06-05 04:35:24', '2023-06-05 04:35:24'),
(20, 3, 4, 1, '2023-06-05 05:15:57', '2023-06-05 05:15:57'),
(21, 3, 5, 3, '2023-06-05 05:29:02', '2023-06-05 05:29:02'),
(22, 3, 6, 5, '2023-06-05 05:29:12', '2023-06-05 05:29:12');

-- --------------------------------------------------------

--
-- Table structure for table `datapraktikum`
--

CREATE TABLE `datapraktikum` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `namaprak` varchar(255) NOT NULL,
  `semester` varchar(255) NOT NULL,
  `dosen` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `datapraktikum`
--

INSERT INTO `datapraktikum` (`id`, `namaprak`, `semester`, `dosen`, `created_at`, `updated_at`) VALUES
(4, 'Multimedia', 'Ganjil', 'Cornelia', '2023-06-05 05:23:51', '2023-06-05 05:23:51');

-- --------------------------------------------------------

--
-- Table structure for table `datasubkriteria`
--

CREATE TABLE `datasubkriteria` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_kriteria` bigint(20) UNSIGNED NOT NULL,
  `namasub` varchar(255) NOT NULL,
  `bobot` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2023_04_29_175653_create_aslab_table', 1),
(3, '2023_04_30_003717_create_user_table', 1),
(4, '2023_05_02_050307_create_dataalternatifs_table', 1),
(5, '2023_05_02_051933_create_dataaslabs_table', 1),
(6, '2023_05_10_041028_create_datadosens_table', 1),
(7, '2023_05_10_212619_create_datakriterias_table', 1),
(8, '2023_05_10_212621_alternatif', 1),
(9, '2023_05_10_212622_create_datalab_table', 1),
(10, '2023_06_03_034758_create_datasubkriteria_table', 1),
(11, '2023_06_03_200954_create_datapenilaian_table', 1),
(12, '2023_06_04_024718_create_datapraktikums_table', 1),
(13, '2023_06_05_094734_create_datapenggunas_table', 1);

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `name`, `username`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Cornelia', 'cornel', '$2y$10$7eh4WAev3GzmpO27I5QIBOfi2qVRFphvgG09iZhYuysYOx0E1HQsa', '2023-06-05 04:16:31', '2023-06-05 04:16:31'),
(2, 'Cornelia', 'lia', '$2y$10$t50BXIdi9/BIMa3pwyuCI.R3Skspins2yUa8rEG1wpTw7HUR6Wx5i', '2023-06-05 05:00:48', '2023-06-05 05:00:48'),
(3, 'Mindaha', 'cornelia', '$2y$10$q.GEJVc/KmhNV9th/NmXE.J9FYh3CvtXkPooe1HkvaXQMtlUJM2NG', '2023-06-05 05:10:07', '2023-06-05 05:10:07'),
(4, 'Rista', 'rista', '$2y$10$G9le5In3ZPYgFkGalXcjQuZ5ns.5V0JD9VzErp0Myto54V7oCx9eu', '2023-06-05 05:19:25', '2023-06-05 05:19:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aslab`
--
ALTER TABLE `aslab`
  ADD UNIQUE KEY `aslab_nim_unique` (`nim`);

--
-- Indexes for table `dataalternatif`
--
ALTER TABLE `dataalternatif`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dataaslab`
--
ALTER TABLE `dataaslab`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `dataaslab_nim_unique` (`nim`);

--
-- Indexes for table `datadosen`
--
ALTER TABLE `datadosen`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `datadosen_nip_unique` (`nip`);

--
-- Indexes for table `datakriteria`
--
ALTER TABLE `datakriteria`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `datakriteria_kode_unique` (`kode`);

--
-- Indexes for table `datalab`
--
ALTER TABLE `datalab`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `datapenggunas`
--
ALTER TABLE `datapenggunas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `datapenilaian`
--
ALTER TABLE `datapenilaian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `datapenilaian_id_alternatif_foreign` (`id_alternatif`),
  ADD KEY `datapenilaian_id_kriteria_foreign` (`id_kriteria`);

--
-- Indexes for table `datapraktikum`
--
ALTER TABLE `datapraktikum`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `datasubkriteria`
--
ALTER TABLE `datasubkriteria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `datasubkriteria_id_kriteria_foreign` (`id_kriteria`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dataalternatif`
--
ALTER TABLE `dataalternatif`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `dataaslab`
--
ALTER TABLE `dataaslab`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `datadosen`
--
ALTER TABLE `datadosen`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `datakriteria`
--
ALTER TABLE `datakriteria`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `datalab`
--
ALTER TABLE `datalab`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `datapenggunas`
--
ALTER TABLE `datapenggunas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `datapenilaian`
--
ALTER TABLE `datapenilaian`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `datapraktikum`
--
ALTER TABLE `datapraktikum`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `datasubkriteria`
--
ALTER TABLE `datasubkriteria`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `datapenilaian`
--
ALTER TABLE `datapenilaian`
  ADD CONSTRAINT `datapenilaian_id_alternatif_foreign` FOREIGN KEY (`id_alternatif`) REFERENCES `dataalternatif` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `datapenilaian_id_kriteria_foreign` FOREIGN KEY (`id_kriteria`) REFERENCES `datakriteria` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `datasubkriteria`
--
ALTER TABLE `datasubkriteria`
  ADD CONSTRAINT `datasubkriteria_id_kriteria_foreign` FOREIGN KEY (`id_kriteria`) REFERENCES `datakriteria` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
