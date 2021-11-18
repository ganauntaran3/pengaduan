-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2021 at 07:08 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pengaduan`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `getPengaduan_by_status` (IN `uStatus` VARCHAR(255))  NO SQL
SELECT * FROM complains 
INNER JOIN masyarakat ON
complains.nik=masyarakat.nik
WHERE status = uStatus$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `complains`
--

CREATE TABLE `complains` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tgl_pengaduan` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `nik` varchar(16) CHARACTER SET utf8mb4 NOT NULL,
  `isi_laporan` text CHARACTER SET utf8mb4 NOT NULL,
  `foto` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `status` enum('0','proses','selesai') CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `complains`
--

INSERT INTO `complains` (`id`, `tgl_pengaduan`, `nik`, `isi_laporan`, `foto`, `status`) VALUES
(1, '2021-03-30 00:19:41', '5171010205030009', 'Ada balap liar yang meresahkan di sekitar Jalan Sudirman', '1617063581-speech-icon-2797263_1280.png', 'selesai'),
(2, '2021-03-30 00:28:21', '5176336341245557', 'Banyak kerumunan di dekat pasar sanglah', '1617064101-working-hard-party-hard-weekends-cropped-shot-woman-typing-keyboard-sitting-front-computer-monitor-freelancer-translating-new-project-writing-some-notes-note-pad-min.jpg', 'selesai'),
(3, '2021-03-30 04:12:30', '5171010205030009', 'Terdapat sabung ayam yang meresahkan di petang', '1617077064-front-view-desk-elements-arrangement-with-copy-space-min.jpg', 'selesai'),
(5, '2021-03-31 08:37:13', '5171010205030009', 'Tempat Sampah yang berada di pasar Badung sangatlah kurang mengingat banyaknya pengunjung yang data. Banyak masyarakat sekitar yang sudah mengeluh saat berkunjung bahwa kurangnya tempat sampah akan memicu banyaknya juga orang - orang yang akan membuang sampah <b>sembarangan</b>', '1617151033-vecteezy_new-normal-illustration_en0121.jpg', 'selesai'),
(6, '2021-03-31 08:53:50', '5171010205030009', 'Ada kerumunan boneka mampang di perempatan Jalan Gunung Agung', '1617151997-blonde-woman-with-elegant-hairstyle-typing-text-keyboard-office-indoor-portrait-international-employees-with-secretary-using-laptop-min.jpg', 'proses'),
(7, '2021-03-31 09:23:29', '5171010205030009', 'Terdapat banyak sekali sampah berserakan di depan Patung Catur Muka Puputan', '1617153809-writing-828911_1920.jpg', '0'),
(8, '2021-03-31 10:38:26', '5171010205030009', 'Adanya pohon tumbang di Jalan Diponegoro, menyebabkan arus lalu lintas yang macet', '1617158306-contemporary-room-workplace-office-supplies-concept-min.jpg', '0'),
(9, '2021-03-31 11:28:17', '5172203456780006', 'Terdapat praktek judi di daerah <b>Gunung Agung, Blok A.</b>', '1617161251-2924720.jpg', 'selesai'),
(10, '2021-03-31 12:49:21', '5174563337890002', 'Ada pohon tumbang akibat hujan, di sekitar Jalan Pulau Moyo, yang menyebabkan arus lalu lintas terganggu', '1617166125-megaphone-2824574.png', 'selesai');

--
-- Triggers `complains`
--
DELIMITER $$
CREATE TRIGGER ` deleteTanggapan` AFTER DELETE ON `complains` FOR EACH ROW DELETE FROM responses
WHERE complain_id = old.id
$$
DELIMITER ;

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
-- Table structure for table `masyarakat`
--

CREATE TABLE `masyarakat` (
  `nik` varchar(16) CHARACTER SET utf8mb4 NOT NULL,
  `nama` varchar(35) CHARACTER SET utf8mb4 NOT NULL,
  `username` varchar(25) CHARACTER SET utf8mb4 NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `telp` varchar(255) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `masyarakat`
--

INSERT INTO `masyarakat` (`nik`, `nama`, `username`, `password`, `telp`) VALUES
('5171010205030009', 'Gana Untaran', 'ganauntaran', '$2y$10$grdC9P1mk1jcLIRB3g2BuOVrHii0AnHHZlVoqK2QfsuDIgevadOiK', '089777666555'),
('5172203456780006', 'Anton', 'antonio', '$2y$10$41EqIYENFTKXibKDvv3.1uEunfsWpUkGUjJPKHIF80Sfeogz.lYBS', '08564333456'),
('5174563337890002', 'Yudha', 'yuda12', '$2y$10$YffLKMnDhFvA1Mwjl9Z16u.sELoB/fjzqOdiT/xzw.ZODlipB9Nca', '085234566788'),
('5176336341245557', 'Abdoel Hadi', 'doeladi', '$2y$10$/LzIAI.hN9cL3a9CJaQAzuu94Wf6qIWR5HGqp3X7NLumh/KCdP/8C', '081999456788');

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
(4, '2021_03_29_002054_create_masyarakats_table', 1),
(5, '2021_03_29_002127_create_petugas_table', 1),
(6, '2021_03_29_034549_create_complains_table', 1),
(7, '2021_03_29_034559_create_responses_table', 1);

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
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_petugas` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` enum('admin','petugas') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id`, `nama_petugas`, `username`, `password`, `telp`, `level`) VALUES
(1, 'admin', 'administrator', '$2y$10$vkkvdrdwgY0GwXMBA60yFeoFKbqJZRLy0mnYG6h/aIGQtN2J7eYdi', '08766655432', 'admin'),
(8, 'Asep Fingerboard', 'jarwo333', '$2y$10$Pr9RLH8P2wRJXgyLdnCnKuocetWKMlclQzN4uR.5wFjoqNi60CYAm', '089777666555', 'petugas'),
(10, 'Dadang', 'dadang', '$2y$10$OippmHYFTaYme3CYfx46YuwzTBq2X4kU7xoc0M.bt.9gdUWcCkeWC', '089777666555', 'petugas');

-- --------------------------------------------------------

--
-- Table structure for table `responses`
--

CREATE TABLE `responses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `complain_id` int(11) NOT NULL,
  `tgl_tanggapan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggapan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `petugas_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `responses`
--

INSERT INTO `responses` (`id`, `complain_id`, `tgl_tanggapan`, `tanggapan`, `petugas_id`) VALUES
(1, 1, '2021-03-30 01:29:44', 'Terima kasih telah melapor saat ini, laporan anda telah ditindak lanjuti oleh pihak kepolisian yang sedang mengirimkan tim patroli ke Jalan Sudirman', 4),
(2, 3, '2021-03-31 07:59:44', 'Terima kasih telah melapor, satpol pp akan mengadakan pemeriksaan secepatnya.', 8),
(3, 2, '2021-03-31 08:17:50', 'Satgas COVID baru saja mengunjungi tempat tersebut dan telah dilakukan sosialisasi', 8),
(5, 5, '2021-03-31 09:13:22', 'Terima kasih telah melapor kami telah menghubungi dinas perhubungan terkait kasus kekurangan tempat sampah. Mohon untuk menunggu agar tempat sampah segera datang', 1),
(6, 9, '2021-03-31 11:31:47', 'Laporan anda telah ditindak lanjuti, oleh pihak berwajib. Terima kasih sudah melapor.', 8),
(7, 10, '2021-03-31 12:51:47', 'Kami sudah meneruskan laporan kepada dinas perhubungan. Terima kasih telah melapor', 8);

--
-- Triggers `responses`
--
DELIMITER $$
CREATE TRIGGER `updateStatus` AFTER INSERT ON `responses` FOR EACH ROW UPDATE complains SET status = 'selesai'
WHERE id = new.complain_id
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `complains`
--
ALTER TABLE `complains`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nik` (`nik`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `masyarakat`
--
ALTER TABLE `masyarakat`
  ADD PRIMARY KEY (`nik`);

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
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `responses`
--
ALTER TABLE `responses`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `complains`
--
ALTER TABLE `complains`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `responses`
--
ALTER TABLE `responses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `complains`
--
ALTER TABLE `complains`
  ADD CONSTRAINT `complains_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `masyarakat` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
