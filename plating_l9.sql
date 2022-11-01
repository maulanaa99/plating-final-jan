-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2022 at 11:23 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `plating_l9`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `nama_barang` varchar(11) DEFAULT NULL,
  `jumlah_barang` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `nama_barang`, `jumlah_barang`, `created_at`, `updated_at`) VALUES
(3, 'Pensil', 21, '2022-10-21 01:43:13', '2022-10-24 04:01:08'),
(4, 'Pulpen', 2, '2022-10-21 01:43:18', '2022-10-25 01:52:43'),
(5, 'Buku', 10, '2022-10-24 02:14:07', '2022-10-24 06:59:52');

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
-- Table structure for table `kensa`
--

CREATE TABLE `kensa` (
  `id` int(11) NOT NULL,
  `id_masterdata` int(11) NOT NULL DEFAULT 0,
  `tanggal_k` date NOT NULL,
  `waktu_k` time DEFAULT NULL,
  `no_part` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `part_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `no_bar` int(11) NOT NULL,
  `qty_bar` int(11) NOT NULL,
  `cycle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nikel` int(11) DEFAULT NULL,
  `butsu` int(11) DEFAULT NULL,
  `hadare` int(11) DEFAULT NULL,
  `hage` int(11) DEFAULT NULL,
  `moyo` int(11) DEFAULT NULL,
  `fukure` int(11) DEFAULT NULL,
  `crack` int(11) DEFAULT NULL,
  `henkei` int(11) DEFAULT NULL,
  `hanazaki` int(11) DEFAULT NULL,
  `kizu` int(11) DEFAULT NULL,
  `kaburi` int(11) DEFAULT NULL,
  `shiromoya` int(11) DEFAULT NULL,
  `shimi` int(11) DEFAULT NULL,
  `pitto` int(11) DEFAULT NULL,
  `other` int(11) DEFAULT NULL,
  `gores` int(11) DEFAULT NULL,
  `regas` int(11) DEFAULT NULL,
  `silver` int(11) DEFAULT NULL,
  `hike` int(11) DEFAULT NULL,
  `burry` int(11) DEFAULT NULL,
  `others` int(11) DEFAULT NULL,
  `total_ok` int(11) NOT NULL,
  `total_ng` int(11) NOT NULL,
  `p_total_ok` decimal(11,2) DEFAULT NULL,
  `p_total_ng` decimal(11,2) NOT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kensa`
--

INSERT INTO `kensa` (`id`, `id_masterdata`, `tanggal_k`, `waktu_k`, `no_part`, `part_name`, `no_bar`, `qty_bar`, `cycle`, `nikel`, `butsu`, `hadare`, `hage`, `moyo`, `fukure`, `crack`, `henkei`, `hanazaki`, `kizu`, `kaburi`, `shiromoya`, `shimi`, `pitto`, `other`, `gores`, `regas`, `silver`, `hike`, `burry`, `others`, `total_ok`, `total_ng`, `p_total_ok`, `p_total_ng`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(12, 401, '2022-10-25', '13:55:45', '71122-TBA-030', '2WF FR GRILLE MOLD Cr3', 14, 120, 'C1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 120, 0, '100.00', '0.00', '1', NULL, '2022-10-25 06:56:39', '2022-10-25 06:56:39'),
(16, 391, '2022-10-27', '11:02:56', '75731-BZ130/M00', 'D80N FR DOOR MOLD RH', 3, 84, 'C1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 84, 0, '100.00', '0.00', '1', NULL, '2022-10-27 04:03:02', '2022-10-27 04:03:02'),
(17, 391, '2022-10-27', '12:54:28', '75731-BZ130/M00', 'D80N FR DOOR MOLD RH', 10, 84, 'C1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 0, 0, 0, 0, 0, 82, 2, '97.62', '2.38', '1', NULL, '2022-10-27 05:55:02', '2022-10-27 05:55:02'),
(18, 504, '2022-10-27', '13:41:27', '6407A450', '4L45W 22 MY Garn, Side Upr RH', 16, 66, 'C1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 65, 1, '98.48', '1.52', '1', NULL, '2022-10-27 06:41:41', '2022-10-27 06:41:41'),
(19, 504, '2022-10-27', '13:41:41', '6407A450', '4L45W 22 MY Garn, Side Upr RH', 17, 66, 'C1', 0, 0, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 64, 2, '96.97', '3.03', '1', NULL, '2022-10-27 06:41:55', '2022-10-27 06:41:55'),
(20, 504, '2022-10-27', '13:41:55', '6407A450', '4L45W 22 MY Garn, Side Upr RH', 17, 66, 'C1', 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 65, 1, '98.48', '1.52', '1', NULL, '2022-10-27 06:42:08', '2022-10-27 06:42:08'),
(21, 505, '2022-10-27', '13:50:33', '6407A449', '4L45W 22 MY Garn, Side Upr LH', 22, 66, 'C1', 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 65, 1, '98.48', '1.52', '1', NULL, '2022-10-27 06:50:51', '2022-10-27 06:50:51');

-- --------------------------------------------------------

--
-- Table structure for table `masterdata`
--

CREATE TABLE `masterdata` (
  `id` int(11) NOT NULL,
  `no_part` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `part_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `katalis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `channel` int(11) NOT NULL,
  `grade_color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty_bar` int(11) NOT NULL,
  `qty_trolly` int(11) DEFAULT 0,
  `bagian` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `next_process` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stok_bc` int(11) DEFAULT 0,
  `total_ok` int(11) NOT NULL DEFAULT 0,
  `total_ng` int(11) NOT NULL DEFAULT 0,
  `total_kirim` int(11) DEFAULT 0,
  `stok` int(11) DEFAULT 0,
  `no_kartu` int(11) NOT NULL DEFAULT 0,
  `kirim_painting` int(11) DEFAULT 0,
  `kirim_assy` int(11) DEFAULT 0,
  `kirim_ppic` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `masterdata`
--

INSERT INTO `masterdata` (`id`, `no_part`, `part_name`, `katalis`, `channel`, `grade_color`, `qty_bar`, `qty_trolly`, `bagian`, `next_process`, `model`, `stok_bc`, `total_ok`, `total_ng`, `total_kirim`, `stok`, `no_kartu`, `kirim_painting`, `kirim_assy`, `kirim_ppic`, `created_at`, `updated_at`) VALUES
(391, '75731-BZ130/M00', 'D80N FR DOOR MOLD RH', 'K2', 6, 'Cr 6+', 84, 128, 'RH', 'ASSEMBLY', 'D80N', 84, 418, 2, 0, 418, 0, 0, 0, 0, NULL, '2022-10-27 05:55:02'),
(392, '75732-BZ130/M00', 'D80N FR DOOR MOLD LH', 'K2', 6, 'Cr 6+', 84, 128, 'LH', 'ASSEMBLY', 'D80N', 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, '2022-10-25 05:44:00'),
(393, '75741-BZ130/M00', 'D80N RR DOOR MOLD RH ', 'K2', 4, 'Cr 6+', 152, 128, 'RH', 'ASSEMBLY', 'D80N', 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, '2022-10-25 05:51:54'),
(394, '75742-BZ130/M00', 'D80N RR DOOR MOLD LH', 'K2', 4, 'Cr 6+', 152, 128, 'LH', 'ASSEMBLY', 'D80N', 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(395, '623104LC0A-03/M00', 'K2 GRILLE FIN', 'K2', 9, 'Cr 6+', 30, 16, '-', 'ASSEMBLY', 'K2', 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, '2022-10-25 06:10:17'),
(396, '628904LC0A/M00', 'K2 EMBLEM FR', 'K2', 7, 'Cr 6+', 336, 240, '-', 'PAINTING', 'K2', 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(397, '908904LC0A/M00', 'K2 EMBLEM RR', 'K2', 8, 'Cr 6+', 432, 288, '-', 'PAINTING', 'K2', 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(398, '90892-4LCOA', 'K2 MARK GO', 'K2', 10, 'Cr 6+', 216, 132, '-', 'ASSEMBLY', 'K2', 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(399, '90893-4LCOA', 'K2 MARK GO+', 'K2', 10, 'Cr 6+', 198, 132, '-', 'ASSEMBLY', 'K2', 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(400, '71122-TBA-030', '2WF FR GRILLE MOLD Cr6  ', 'K2', 21, 'Cr 6+', 120, 80, '-', 'ASSEMBLY', '2WF', 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(401, '71122-TBA-030', '2WF FR GRILLE MOLD Cr3 (Dark)', 'K2', 20, 'Dark 3+', 120, 80, '-', 'ASSEMBLY', '2WF', 0, 0, 0, 0, 0, 1, 0, 120, 0, NULL, '2022-10-25 06:57:18'),
(402, '74890-T5SA-U310/510', '2WF RR LICENSE Cr6 (Dark)', 'K2', 23, 'Dark 3+', 24, 48, '-', 'ASSEMBLY', '2WF', 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(403, '74890-T5SA-U310/510', '2WF RR LICENSE Cr3 (Dark)', 'K2', 22, 'Dark 3+', 24, 48, '-', 'ASSEMBLY', '2WF', 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(404, '71123-T8N-000', '2XP GRILLE MOLD RH', 'K2', 24, 'Cr 6+', 240, 144, 'RH', 'ASSEMBLY', '2XP', 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(405, '71128-T8N-000', '2XP GRILLE MOLD LH', 'K2', 24, 'Cr 6+', 240, 144, 'LH', 'ASSEMBLY', '2XP', 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(406, '53122-BZ140', 'D22D GRILLE MOLD', 'K2', 30, 'Cr 6+', 144, 128, '-', 'ASSEMBLY', 'D22D', 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(407, '76811-BZ320', 'D22D BACK DOOR RH', 'K2', 31, 'Cr 6+', 210, 224, 'RH', 'ASSEMBLY', 'D22D', 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(408, '76812-BZ060', 'D22D BACK DOOR LH', 'K2', 31, 'Cr 6+', 210, 224, 'LH', 'ASSEMBLY', 'D22D', 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(409, '71742-59RO', 'YL8 GRILLE UPR GN', 'K2', 50, 'Cr 6+', 24, 32, '-', 'ASSEMBLY', 'YL8', 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(410, '71743-59ROR', 'YL8 GRILLE CTR GN RH', 'K2', 51, 'Cr 6+', 100, 192, 'RH', 'ASSEMBLY', 'YL8', 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(411, '71743-59ROL', 'YL8 GRILLE CTR GN LH', 'K2', 51, 'Cr 6+', 100, 192, 'LH', 'ASSEMBLY', 'YL8', 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(412, '76811-BZ270', 'D17D BACK DOOR LOW', 'K2', 35, 'Cr 6+', 28, 48, '-', 'ASSEMBLY', 'D17D', 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, '2022-10-25 06:37:44'),
(413, '76811-BZ340', 'D17D BACK DOOR HIGH', 'K2', 36, 'Cr 6+', 28, 48, '-', 'PAINTING', 'D17D', 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(414, '75312-TSA-K000', '2SJ FR DOOR MOLD RH', 'K2', 144, 'Cr 6+', 30, 80, 'RH', 'ASSEMBLY', '2SJ', 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(415, '75332-TSA-K000', '2SJ FR DOOR MOLD LH', 'K2', 144, 'Cr 6+', 30, 80, 'LH', 'ASSEMBLY', '2SJ', 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(416, '75313-TSA-K000', '2SJ RR DOOR MOLD RH', 'K2', 146, 'Cr 6+', 30, 80, 'RH', 'ASSEMBLY', '2SJ', 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(417, '75333-TSA-K000', '2SJ RR DOOR MOLD LH', 'K2', 146, 'Cr 6+', 30, 80, 'LH', 'ASSEMBLY', '2SJ', 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(418, '74890-TSA-K00', '2SJ RR LICENSE CAMERA', 'K2', 27, 'Cr 6+', 32, 48, '-', 'ASSEMBLY', '2SJ', 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(419, '74890-TSA-K01', '2SJ RR LICENSE NON CAMERA', 'K2', 27, 'Cr 6+', 32, 48, '-', 'ASSEMBLY', '2SJ', 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, '2022-10-25 06:38:18'),
(420, '75459-OK120', '660A MARK Q', 'K2', 60, 'Cr 6+', 768, 132, '-', 'ASSEMBLY', '660A', 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(421, '75459-OK310', '660A MARK SR', 'K2', 60, 'Cr 6+', 520, 132, '-', 'ASSEMBLY', '660A', 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(422, '75459-OK340', '660A MARK SRV', 'K2', 60, 'Cr 6+', 648, 132, '-', 'ASSEMBLY', '660A', 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(423, '75311-BZ310-H', 'D30D FR EMBLEM', 'K2', 41, 'Cr 6+', 240, 20, '-', 'PPIC', 'D30D', 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, '2022-10-25 06:39:33'),
(424, '75441-BZ360-H', 'D30D SIGRA MARK', 'K2', 38, 'Cr 6+', 720, 80, '-', 'PPIC', 'D30D', 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, '2022-10-25 06:40:26'),
(425, '53123-OK110', '490J GRILLE CTR RH (Dark)', 'K2', 61, 'Dark 3+', 252, 10, 'RH', 'PPIC', '490J', 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(426, '53124-OK020', '490J GRILLE CTR LH (Dark)', 'K2', 61, 'Dark 3+', 252, 10, 'LH', 'PPIC', '490J', 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(427, '53122-OK290', '490J GRILLE LWR (Dark)', 'K2', 62, 'Dark 3+', 82, 4, '-', 'PPIC', '490J', 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(428, '52127-OK250', '490J FOG LAMP RH (Dark)', 'K2', 63, 'Dark 3+', 140, 4, 'RH', 'PPIC', '490J', 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(429, '52128-OK250', '490J FOG LAMP LH (Dark)', 'K2', 63, 'Dark 3+', 140, 4, 'LH', 'PPIC', '490J', 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(430, '71122-TE7-K11-M1', '2MM MLDG FR GRILLE', 'K2', 28, 'Cr 6+', 26, 32, '-', 'ASSEMBLY', '2MM', 26, 0, 0, 0, 0, 0, 0, 0, 0, NULL, '2022-10-27 07:57:13'),
(431, '74891-TE7-K41-20', '2MM MLDG R, RR LICENSE', 'K2', 29, 'Cr 6+', 170, 160, '-', 'ASSEMBLY', '2MM', 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(432, '74892-TE7-K41-20', '2MM MLDG L, RR LICENSE', 'K2', 29, 'Cr 6+', 170, 160, '-', 'ASSEMBLY', '2MM', 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(433, '7450B174', '4P45 Grille Rad Outer CTR RH', 'K2', 93, 'Cr 6+', 96, 128, 'RH', 'ASSEMBLY', '4P45', 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(434, '7450B173', '4P45 Grille Rad Outer CTR LH', 'K2', 93, 'Cr 6+', 96, 128, 'LH', 'ASSEMBLY', '4P45', 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(435, '7450B176', '4P45 Grille Rad MID RH', 'K2', 91, 'Cr 6+', 280, 56, 'RH', 'PPIC', '4P45', 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(436, '7450B175', '4P45 Grille Rad MID LH', 'K2', 91, 'Cr 6+', 280, 56, 'LH', 'PPIC', '4P45', 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(437, '7450B171', '4P45 Grille Rad Outer Lower', 'K2', 92, 'Cr 6+', 42, 48, '-', 'ASSEMBLY', '4P45', 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(438, '7450B177', '4P45 Cover FR Camera', 'K2', 83, 'Cr 6+', 364, 56, '-', 'ASSEMBLY', '4P45', 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(439, '7415A669', '4P45 Mark 3 Dia', 'K2', 84, 'Cr 6+', 360, 30, '-', 'ASSEMBLY', '4P45', 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(440, '71123-T5L-T80', '2WM MLDG Upper, FR Grille', 'K2', 16, 'Cr 6+', 72, 48, '-', 'ASSEMBLY', '2WM', 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(441, '71122-T5L-T80', '2WM MLDG Lower, FR Grille', 'K2', 500, 'Cr 6+', 88, 80, '-', 'ASSEMBLY', '2WM', 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(442, '7450B179', '4L45W Grille Radiator', 'K1', 100, 'Cr 6+', 16, 16, '-', 'PAINTING', '4L45W', 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(443, '7415A622', '4L45W FR Emblem 3-DIA', 'K2', 112, 'Cr 6+', 200, 30, '-', 'ASSEMBLY', '4L45W', 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, '2022-10-25 06:45:47'),
(444, '7415A672', '4L45W RR Emblem 3-DIA', 'K2', 106, 'Cr 6+', 440, 60, '-', 'ASSEMBLY', '4L45W', 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(445, '53121-BZ450', 'D14N MLDG, Rad Grille, UPR', 'K1', 76, 'Cr 6+', 36, 32, '-', NULL, 'D14N', 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, '2022-10-25 06:46:11'),
(446, '53122-BZ160', 'D14N MLDG, Rad Grille, No.2', 'K2', 77, 'Cr 6+', 70, 80, '-', NULL, 'D14N', 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, '2022-10-25 06:46:31'),
(447, '53123-BZ180', 'D14N MLDG, Rad Grille, No.3', 'K2', 78, 'Cr 6+', 90, 80, '-', NULL, 'D14N', 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, '2022-10-25 06:46:51'),
(448, '53123-0D150', '230B MLDG, Grille RH (6Cr)', 'K2', 66, 'Cr 6+', 576, 32, 'RH', 'PPIC', '230B', 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(449, '53124-0D270', '230B MLDG, Grille LH (6Cr)', 'K2', 66, 'Cr 6+', 576, 32, 'LH', 'PPIC', '230B', 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(450, '53123-0D150', '230B MLDG, Grille RH (Dark)', 'K2', 67, 'Dark 3+', 576, 32, 'RH', 'PPIC', '230B', 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(451, '53124-0D270', '230B MLDG, Grille LH (Dark)', 'K2', 67, 'Dark 3+', 576, 32, 'LH', 'PPIC', '230B', 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(452, '75312-TSA-K000', '2SK-B FR DOOR MOLD RH', 'K2', 243, 'GRADE 2', 30, 80, 'RH', 'ASSEMBLY', '2SK', 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(453, '75332-TSA-K000', '2SK-B FR DOOR MOLD LH', 'K2', 243, 'GRADE 2', 30, 80, 'LH', 'ASSEMBLY', '2SK', 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(454, '75313-TSA-K000', '2SK-B RR DOOR MOLD RH', 'K2', 244, 'GRADE 2', 30, 80, 'RH', 'ASSEMBLY', '2SK', 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(455, '75333-TSA-K000', '2SK-B RR DOOR MOLD LH', 'K2', 244, 'GRADE 2', 30, 80, 'LH', 'ASSEMBLY', '2SK', 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(456, '74890-TSA-K00', '2SK-B RR LICENSE CAMERA', 'K2', 247, 'GRADE 2', 32, 48, '-', 'ASSEMBLY', '2SK', 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(457, '74890-TSA-K01', '2SK-B RR LICENSE NON CAMERA', 'K2', 247, 'GRADE 2', 32, 48, '-', 'ASSEMBLY', '2SK', 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(458, '62310-8JA0A', 'K2(MC) Grille Fin', 'K2', 12, 'Cr 6+', 24, 40, '-', 'ASSEMBLY', 'K2MC', 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(459, '62310-8G0A-02', 'K2D Grille Fin Rad', 'K2', 13, 'Cr 6+', 24, 40, '-', 'ASSEMBLY', 'K2D', 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(460, '6407A262', '4P45 Bumper Upper RH', 'K2', 95, 'Cr 6+', 40, 10, 'RH', 'PPIC', '4P45', 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(461, '6407A261', '4P45 Bumper Upper LH', 'K2', 95, 'Cr 6+', 40, 10, 'LH', 'PPIC', '4P45', 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(462, '6407A264', '4P45 Bumper Lower RH', 'K2', 96, 'Cr 6+', 144, 15, 'RH', 'PPIC', '4P45', 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, '2022-10-25 06:47:24'),
(463, '6407A263', '4P45 Bumper Lower LH', 'K2', 96, 'Cr 6+', 144, 15, 'LH', 'PPIC', '4P45', 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(464, '5817A317', '4P45 Garnish License Cam', 'K2', 97, 'Cr 6+', 28, 64, '-', 'ASSEMBLY', '4P45', 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(465, '5817A316', '4P45 Garnish License N/C', 'K2', 97, 'Cr 6+', 28, 64, '-', 'ASSEMBLY', '4P45', 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(466, '84896 8GAOA', 'K2D CVT Mark', 'K2', 110, 'Cr 6+', 540, 150, '-', 'PAINTING', 'K2D', 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(467, '71122-T7A-J51-M1', '2XS GRILLE UPR (Dark)', 'K1', 142, 'Dark 3+', 16, 32, '-', 'ASSEMBLY', '2XS', 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(468, '71122-T7A-J51-M1', '2XS GRILLE UPR (Black)', 'K1', 141, 'Black 3+', 16, 32, '-', 'ASSEMBLY', '2XS', 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(469, '71163-T7A-JO/J51', '2XS EXTN MOLD RH (Dark)', 'K1', 132, 'Dark 3+', 108, 30, 'RH', 'PPIC', '2XS', 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(470, '71168-T7A-JO/J51', '2XS EXTN MOLD LH (Dark)', 'K1', 132, 'Dark 3+', 108, 30, 'LH', 'PPIC', '2XS', 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(471, '71163-T7A-JO/J51', '2XS EXTN MOLD RH (Black)', 'K2', 133, 'Black 3+', 84, 30, 'RH', 'PPIC', '2XS', 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(472, '71168-T7A-JO/J51', '2XS EXTN MOLD LH (Black)', 'K2', 133, 'Black 3+', 84, 30, 'LH', 'PPIC', '2XS', 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(473, '74892-T8NW-ZZ10-M1', '2XS RR LICENSE (Dark)', 'K2', 134, 'Dark 3+', 156, 160, '-', 'ASSEMBLY', '2XS', 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(474, '74892-T8NW-ZZ01-M1', '2XS RR LICENSE (Black)', 'K2', 135, 'Black 3+', 120, 0, '-', 'ASSEMBLY', '2XS', 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(475, '83942-73RXO', 'YHA MLDG B/D Garnish', 'K2', 54, 'Cr 6+', 102, 80, '-', 'ASSEMBLY', 'YHA', 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(476, '08F21-TE7-7MO-M3', '2MM(HAC) GRILLE UPR', 'K2', 19, 'Cr 6+', 24, 32, '-', 'ASSEMBLY', '2MM HAC', 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(477, '53121-BZ530', 'D12L MLDG, Radiator Grille, UPR', 'K2', 301, 'Cr 6+', 30, 32, '-', 'ASSEMBLY', 'D12L', 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, '2022-10-25 06:48:09'),
(478, '76802-BZ350', 'D12L GARN, B/D, Outside LH', 'K2', 305, 'Cr 6+', 36, 48, '-', 'ASSEMBLY', 'D12L', 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(479, '71126-TSA-K110-M1', '2KB (TSAX) Grade 1 Molding Front Grille', 'K2', 339, 'GRADE 1', 30, 32, '-', 'ASSEMBLY', '2KB', 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(480, '71125-TSA-K110-M1', '2KB (TSAX) Grade 1 MLDG UPR, FR Grille', 'K2', 303, 'GRADE 1', 60, 96, '-', 'ASSEMBLY', '2KB', 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(481, '71122-TSA-K110-M1', '2KB (TSAX) Grade 1 Moding Grille Lower', 'K2', 302, 'GRADE 1', 56, 96, '-', 'ASSEMBLY', '2KB', 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(482, '71126-TSE-X110-M1', '2KB (TSAX) Grade 2 MLDG, FR Grille ', 'K2', 311, 'GRADE 2', 24, 32, '-', 'ASSEMBLY', '2KB', 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(483, '71125-TSE-X110-M1', '2KB (TSAX) Grade 2 MLDG UPR, FR Grille', 'K2', 320, 'GRADE 2', 60, 96, '-', 'ASSEMBLY', '2KB', 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(484, '71122-TSE-X110-M1', '2KB (TSAX) Grade 2 MLDG LWR, FR Grille', 'K2', 321, 'GRADE 2', 56, 96, '-', 'ASSEMBLY', '2KB', 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(485, '72112-72SA0', 'YHA GN RADIATOR GRILLE RH', 'K2', 490, 'Cr 6+', 110, 10, 'RH', 'PAINTING', 'YHA', 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(486, '72113-72SA0', 'YHA GN RADIATOR GRILLE LH', 'K2', 490, 'Cr 6+', 110, 10, 'LH', 'PAINTING', 'YHA', 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(487, '7450B282', '5D45W MLDG, Grille', 'K2', 170, 'Cr 6+', 18, 40, '-', 'ASSEMBLY', '5D45W', 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, '2022-10-25 06:48:29'),
(488, '7415A701', '5D45W Nissan Mark FR', 'K2', 171, 'Cr 6+', 250, 15, '-', 'PAINTING', '5D45W', 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(489, '7415A703', '5D45W Nissan Mark RR', 'K2', 172, 'Cr 6+', 300, 15, '-', 'PAINTING', '5D45W', 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(490, '7405A983', 'SL3800 Garnish FR End', 'K2', 381, 'Cr 6+', 20, 32, '-', 'PAINTING', 'SL3800', 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, '2022-10-25 06:48:51'),
(491, '7450B506', '4L45W 20 MY SUV Grille Radiator', 'K1', 280, 'Dark 3+', 12, 16, '-', 'PAINTING', '4L45W 20MY', 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(492, '6407A396', '4L45W 20 MY SUV Grille Upper RH', 'K2', 281, 'Cr 6+', 48, 5, 'RH', 'PPIC', '4L45W 20MY', 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(493, '6407A395', '4L45W 20 MY SUV Grille Upper LH', 'K2', 281, 'Cr 6+', 48, 5, 'LH', 'PPIC', '4L45W 20MY', 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(494, '6407A400', '4L45W 20 MY SUV Grille Lower RH', 'K2', 282, 'Cr 6+', 100, 15, 'RH', 'PPIC', '4L45W 20MY', 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(495, '6407A399', '4L45W 20 MY SUV Grille Lower LH', 'K2', 282, 'Cr 6+', 100, 15, 'LH', 'PPIC', '4L45W 20MY', 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(496, '7415A765', '4L45W 20 MY SUV Mark 3 Dia', 'K2', 283, 'Cr 6+', 150, 30, '-', 'ASSEMBLY', '4L45W 20MY', 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, '2022-10-25 06:49:13'),
(497, '7450B503', '4L45W 20 MY STD Grille Radiator', 'K1', 107, 'Cr 6+', 16, 32, '-', 'PAINTING', '4L45W 20MY', 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, '2022-10-25 06:49:32'),
(498, '7415A729', '4L45W 20 MY SUV Cross Mark', 'K2', 285, 'Cr 6+', 768, 100, '-', 'ASSEMBLY', '4L45W 20MY', 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(499, '531470K11000', '655B-R Cr6+', 'K1', 52, 'Cr 6+', 38, 32, 'RH', 'ASSEMBLY', '655B', 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, '2022-10-25 06:49:53'),
(500, '531480K11000', '655B-L Cr6+', 'K1', 52, 'Cr 6+', 38, 32, 'LH', 'ASSEMBLY', '655B', 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, '2022-10-25 06:51:07'),
(501, '53147010KA00', '655B-R Black', 'K1', 55, 'Black 3+', 28, 32, 'RH', 'ASSEMBLY', '655B', 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, '2022-10-25 06:51:24'),
(502, '53148010KA00', '655B-L Black', 'K1', 55, 'Black 3+', 28, 32, 'LH', 'ASSEMBLY', '655B', 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, '2022-10-25 06:51:54'),
(503, '53121-BZ680', 'D26A Molding Rad Grille Upper', 'K2', 26, 'Cr 6+', 28, 32, '-', 'PAINTING', 'D26A', 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, '2022-10-25 07:10:42'),
(504, '6407A450', '4L45W 22 MY Garn, Side Upr RH', 'K2', 122, 'Cr 6+', 66, 5, 'RH', 'PPIC', '4L45W 22MY', 0, 194, 4, 0, 194, 5, 0, 0, 40, NULL, '2022-10-27 06:44:51'),
(505, '6407A449', '4L45W 22 MY Garn, Side Upr LH', 'K2', 123, 'Cr 6+', 66, 5, 'LH', 'PPIC', '4L45W 22MY', 0, 60, 1, 0, 60, 3, 0, 0, 15, NULL, '2022-10-27 07:24:26'),
(506, '6407A452', '4L45W 22 MY Garn, Side Lwr RH', 'K2', 124, 'Cr 6+', 56, 10, 'RH', 'PPIC', '4L45W 22MY', 56, 0, 0, 0, 0, 0, 0, 0, 0, NULL, '2022-10-27 07:58:18'),
(507, '6407A451', '4L45W 22 MY Garn, Side Lwr LH', 'K2', 125, 'Cr 6+', 56, 10, 'LH', 'PPIC', '4L45W 22MY', 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(508, '71123-T56-K000', '2JX Mldg CTR, Fr Grille', 'K2', 290, 'GRADE 1', 36, 32, '-', 'ASSEMBLY', '2JX', 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(509, '71125-T86-K001', '2JX Mldg Side R, Fr Grille', 'K2', 292, 'GRADE 1', 132, 30, 'RH', 'PPIC', '2JX', 132, 0, 0, 0, 0, 0, 0, 0, 0, NULL, '2022-10-27 07:58:05'),
(510, '71126-T86-K001', '2JX Mldg Side L, Fr Grille', 'K2', 293, 'GRADE 1', 132, 30, 'LH', 'PPIC', '2JX', 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(511, '712023M1-T000M2', '2GN Mldg Upper Fr Grille ', 'K2', 120, 'Cr 6+', 50, 80, '-', 'ASSEMBLY', '2GN', 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(512, '7405B166', 'SL3800 22MY Upper Mold RH', 'K2', 356, 'Cr 6+', 120, 10, 'RH', 'ASSEMBLY', 'SL3800 22MY', 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(513, '7405B165', 'SL3800 22MY Upper Mold LH', 'K2', 357, 'Cr 6+', 120, 10, 'LH', 'ASSEMBLY', 'SL3800 22MY', 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(514, '7405B086', 'SL3800 22MY Lower Mold RH', 'K2', 354, 'Cr 6+', 108, 10, 'RH', 'ASSEMBLY', 'SL3800 22MY', 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(515, '7405B085', 'SL3800 22MY Lower Mold LH', 'K2', 355, 'Cr 6+', 108, 10, 'LH', 'ASSEMBLY', 'SL3800 22MY', 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(516, '53121-BZ520/30/50', 'D12L MLDG, Rad Grille, UPR BLACK', 'K2', 0, 'Cr 6+', 30, 32, '-', 'ASSEMBLY', 'D12L', 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(517, '76811-BZ540/550', 'D12L GARN, B/D, Outside BLACK', 'K2', 0, 'Cr 6+', 36, 48, '-', 'ASSEMBLY', 'D12L', 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL);

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
(5, '2022_07_27_031549_create_masterdata_table', 1),
(8, '2022_08_02_083937_create_plating_table', 3),
(9, '2022_08_08_082833_create_kensa_table', 4),
(15, '2022_07_27_031931_create_racking_table', 5),
(16, '2022_08_01_132848_create_unracking_table', 5),
(17, '2022_08_09_083044_create_stockin_table', 5),
(18, '2022_09_15_142707_create_pegawais_table', 5),
(20, '2014_10_12_000000_create_users_table', 6),
(21, '2014_10_12_100000_create_password_resets_table', 6),
(22, '2019_08_19_000000_create_failed_jobs_table', 6),
(23, '2019_12_14_000001_create_personal_access_tokens_table', 6),
(24, '2022_10_10_112156_create_students_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `ng_racking`
--

CREATE TABLE `ng_racking` (
  `id` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `part_name` varchar(11) DEFAULT NULL,
  `jenis_ng` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Table structure for table `pengiriman`
--

CREATE TABLE `pengiriman` (
  `id` int(11) NOT NULL,
  `id_masterdata` int(11) DEFAULT NULL,
  `tgl_kanban` date DEFAULT NULL,
  `no_part` varchar(30) DEFAULT NULL,
  `part_name` varchar(255) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `bagian` varchar(255) DEFAULT NULL,
  `no_kartu` int(11) DEFAULT NULL,
  `next_process` varchar(255) DEFAULT NULL,
  `kirim_painting` int(11) DEFAULT 0,
  `kirim_assy` int(11) DEFAULT 0,
  `kirim_ppic` int(11) DEFAULT 0,
  `qty_kirim` int(11) DEFAULT 0,
  `std_qty` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `pengiriman`
--

INSERT INTO `pengiriman` (`id`, `id_masterdata`, `tgl_kanban`, `no_part`, `part_name`, `model`, `bagian`, `no_kartu`, `next_process`, `kirim_painting`, `kirim_assy`, `kirim_ppic`, `qty_kirim`, `std_qty`, `created_at`, `updated_at`) VALUES
(19, 401, '2022-10-25', '71122-TBA-030', '2WF FR GRILLE MOLD Cr3', '2WF', '-', 2, 'ASSEMBLY', 0, 120, 0, 0, '80', '2022-10-25 06:57:18', '2022-10-25 06:57:22'),
(20, 504, '2022-10-27', '6407A450', '4L45W 22 MY Garn, Side Upr RH', '4L45W 22MY', 'RH', 4, 'PPIC', 0, 0, 20, 0, '5', '2022-10-27 06:42:40', '2022-10-27 06:42:49'),
(21, 504, '2022-10-27', '6407A450', '4L45W 22 MY Garn, Side Upr RH', '4L45W 22MY', 'RH', 8, 'PPIC', 0, 0, 20, 0, '5', '2022-10-27 06:44:51', '2022-10-27 06:44:58'),
(22, 505, '2022-10-27', '6407A449', '4L45W 22 MY Garn, Side Upr LH', '4L45W 22MY', 'LH', 1, 'PPIC', 0, 0, 5, 0, '5', '2022-10-27 06:51:01', '2022-10-27 06:51:01'),
(23, 505, '2022-10-27', '6407A449', '4L45W 22 MY Garn, Side Upr LH', '4L45W 22MY', 'LH', 2, 'PPIC', 0, 0, 5, 0, '5', '2022-10-27 07:23:05', '2022-10-27 07:23:05'),
(24, 505, '2022-10-27', '6407A449', '4L45W 22 MY Garn, Side Upr LH', '4L45W 22MY', 'LH', 3, 'PPIC', 0, 0, 5, 0, '5', '2022-10-27 07:24:25', '2022-10-27 07:24:25');

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

-- --------------------------------------------------------

--
-- Table structure for table `plating`
--

CREATE TABLE `plating` (
  `id` int(11) NOT NULL,
  `id_masterdata` int(11) DEFAULT NULL,
  `no_part` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `part_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `katalis` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `channel` int(11) DEFAULT NULL,
  `grade_color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty_bar` int(11) DEFAULT NULL,
  `cycle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_r` date DEFAULT NULL,
  `no_bar` int(11) NOT NULL,
  `waktu_in_r` time DEFAULT NULL,
  `tgl_lot_prod_mldg` date DEFAULT NULL,
  `tanggal_u` date DEFAULT NULL,
  `waktu_in_u` time DEFAULT NULL,
  `qty_aktual` int(11) DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `plating`
--

INSERT INTO `plating` (`id`, `id_masterdata`, `no_part`, `part_name`, `katalis`, `channel`, `grade_color`, `qty_bar`, `cycle`, `tanggal_r`, `no_bar`, `waktu_in_r`, `tgl_lot_prod_mldg`, `tanggal_u`, `waktu_in_u`, `qty_aktual`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(13, 401, '71122-TBA-030', '2WF FR GRILLE MOLD Cr3', 'K2', 20, 'Cr 3+', 120, 'C1', '2022-10-25', 14, '13:37:06', '2022-10-25', '2022-10-25', '13:52:02', 120, 'Admin', NULL, '2022-10-25 06:37:23', '2022-10-25 06:52:04'),
(14, 412, '76811-BZ270', 'D17D BACK DOOR LOW', 'K2', 35, 'Cr 6+', 28, 'C1', '2022-10-25', 11, '13:37:23', '2022-10-25', '2022-10-25', '13:52:08', 28, 'Admin', NULL, '2022-10-25 06:37:44', '2022-10-25 06:52:11'),
(15, 419, '74890-TSA-K01', '2SJ RR LICENSE NON CAMERA', 'K2', 27, 'Cr 6+', 32, 'C1', '2022-10-25', 20, '13:37:44', '2022-10-25', '2022-10-25', '13:52:14', 32, 'Admin', NULL, '2022-10-25 06:38:18', '2022-10-25 06:52:16'),
(16, 423, '75311-BZ310-H', 'D30D FR EMBLEM', 'K2', 41, 'Cr 6+', 240, 'C1', '2022-10-25', 45, '13:39:03', '2022-10-25', '2022-10-25', '13:52:21', 240, 'Admin', NULL, '2022-10-25 06:39:33', '2022-10-25 06:52:26'),
(17, 424, '75441-BZ360-H', 'D30D SIGRA MARK', 'K2', 38, 'Cr 6+', 720, 'C1', '2022-10-25', 78, '13:39:33', '2022-10-25', '2022-10-25', '13:52:29', 720, 'Admin', NULL, '2022-10-25 06:40:26', '2022-10-25 06:52:32'),
(18, 443, '7415A622', '4L45W FR Emblem 3-DIA', 'K2', 112, 'Cr 6+', 200, 'C1', '2022-10-25', 83, '13:45:21', '2022-10-25', '2022-10-25', '13:52:37', 200, 'Admin', NULL, '2022-10-25 06:45:47', '2022-10-25 06:52:40'),
(19, 445, '53121-BZ450', 'D14N MLDG, Rad Grille, UPR', 'K1', 76, 'Cr 6+', 36, 'C1', '2022-10-25', 76, '13:45:47', '2022-10-25', '2022-10-25', '13:52:43', 36, 'Admin', NULL, '2022-10-25 06:46:11', '2022-10-25 06:52:46'),
(20, 446, '53122-BZ160', 'D14N MLDG, Rad Grille, No.2', 'K2', 77, 'Cr 6+', 70, 'C1', '2022-10-25', 46, '13:46:11', '2022-10-25', '2022-10-25', '13:52:49', 70, 'Admin', NULL, '2022-10-25 06:46:31', '2022-10-25 06:52:52'),
(21, 447, '53123-BZ180', 'D14N MLDG, Rad Grille, No.3', 'K2', 78, 'Cr 6+', 90, 'C1', '2022-10-25', 1, '13:46:31', '2022-10-25', '2022-10-25', '13:52:55', 78, 'Admin', NULL, '2022-10-25 06:46:51', '2022-10-25 06:52:58'),
(22, 462, '6407A264', '4P45 Bumper Lower RH', 'K2', 96, 'Cr 6+', 144, 'C1', '2022-10-25', 55, '13:46:51', '2022-10-25', '2022-10-25', '13:53:02', 144, 'Admin', NULL, '2022-10-25 06:47:24', '2022-10-25 06:53:05'),
(23, 477, '53121-BZ530', 'D12L MLDG, Radiator Grille, UPR', 'K2', 301, 'Cr 6+', 30, 'C1', '2022-10-25', 11, '13:47:24', '2022-10-25', '2022-10-25', '13:53:12', 30, 'Admin', NULL, '2022-10-25 06:48:09', '2022-10-25 06:53:14'),
(24, 487, '7450B282', '5D45W MLDG, Grille', 'K2', 170, 'Cr 6+', 18, 'C1', '2022-10-25', 23, '13:48:09', '2022-10-25', '2022-10-25', '13:53:17', 18, 'Admin', NULL, '2022-10-25 06:48:29', '2022-10-25 06:53:20'),
(25, 490, '7405A983', 'SL3800 Garnish FR End', 'K2', 381, 'Cr 6+', 20, 'C1', '2022-10-25', 5, '13:48:29', '2022-10-25', '2022-10-25', '13:53:23', 20, 'Admin', NULL, '2022-10-25 06:48:51', '2022-10-25 06:53:26'),
(26, 496, '7415A765', '4L45W 20 MY SUV Mark 3 Dia', 'K2', 283, 'Cr 6+', 150, 'C1', '2022-10-25', 8, '13:48:51', '2022-10-25', '2022-10-25', '13:53:29', 150, 'Admin', NULL, '2022-10-25 06:49:13', '2022-10-25 06:53:33'),
(27, 497, '7450B503', '4L45W 20 MY STD Grille Radiator', 'K1', 107, 'Cr 6+', 16, 'C1', '2022-10-25', 73, '13:49:13', '2022-10-25', '2022-10-25', '13:53:36', 16, 'Admin', NULL, '2022-10-25 06:49:32', '2022-10-25 06:53:39'),
(28, 499, '531470K11000', '655B-R Cr6+', 'K1', 52, 'Cr 6+', 38, 'C1', '2022-10-25', 31, '13:49:33', '2022-10-25', '2022-10-26', '13:53:43', 38, 'Admin', NULL, '2022-10-25 06:49:53', '2022-10-25 06:54:18'),
(29, 500, '531480K11000', '655B-L Cr6+', 'K1', 52, 'Cr 6+', 38, 'C1', '2022-10-25', 9, '13:49:53', '2022-10-25', '2022-10-26', '13:55:23', 38, 'Admin', NULL, '2022-10-25 06:51:07', '2022-10-25 06:55:30'),
(30, 501, '53147010KA00', '655B-R Black', 'K1', 55, 'Black', 28, 'C1', '2022-10-25', 54, '13:51:07', '2022-10-25', '2022-10-25', '13:55:32', 28, 'Admin', NULL, '2022-10-25 06:51:24', '2022-10-25 06:55:35'),
(31, 502, '53148010KA00', '655B-L Black', 'K1', 55, 'Black', 28, 'C1', '2022-10-25', 34, '13:51:24', '2022-10-25', '2022-10-25', '13:55:37', 28, 'Admin', NULL, '2022-10-25 06:51:54', '2022-10-25 06:55:40'),
(32, 503, '53121-BZ680', 'D26A Molding Rad Grille Upper', 'K2', 26, 'Cr 6+', 28, 'C1', '2022-10-25', 64, '14:10:27', '2022-10-25', '2022-10-25', '14:45:25', 28, 'Admin', NULL, '2022-10-25 07:10:42', '2022-10-25 07:45:28'),
(33, 504, '6407A450', '4L45W 22 MY Garn, Side Upr RH', 'K2', 122, 'Cr 6+', 66, 'C1', '2022-10-25', 49, '14:12:15', '2022-10-25', '2022-10-25', '14:45:30', 66, 'Admin', NULL, '2022-10-25 07:12:34', '2022-10-25 07:45:34'),
(39, 391, '75731-BZ130/M00', 'D80N FR DOOR MOLD RH', 'K2', 6, 'Cr 6+', 84, 'C1', '2022-10-27', 1, '10:18:19', '2022-10-27', '2022-10-27', '15:02:54', 84, 'Admin', NULL, '2022-10-27 03:18:25', '2022-10-27 08:02:56'),
(40, 391, '75731-BZ130/M00', 'D80N FR DOOR MOLD RH', 'K2', 6, 'Cr 6+', 84, 'C1', '2022-10-27', 3, '11:00:47', '2022-10-27', '2022-10-27', '15:02:59', 84, 'Admin', NULL, '2022-10-27 04:01:04', '2022-10-27 08:03:07'),
(43, 391, '75731-BZ130/M00', 'D80N FR DOOR MOLD RH', 'K2', 6, 'Cr 6+', 84, 'C1', '2022-10-27', 69, '11:59:03', '2022-10-27', '2022-10-27', '15:03:15', 84, 'Admin', NULL, '2022-10-27 04:59:09', '2022-10-27 08:03:17'),
(44, 504, '6407A450', '4L45W 22 MY Garn, Side Upr RH', 'K2', 122, 'Cr 6+', 66, 'C1', '2022-10-27', 15, '13:40:41', '2022-10-27', '2022-10-27', '15:03:19', 66, 'Admin', NULL, '2022-10-27 06:40:57', '2022-10-27 08:03:21'),
(45, 504, '6407A450', '4L45W 22 MY Garn, Side Upr RH', 'K2', 122, 'Cr 6+', 66, 'C1', '2022-10-27', 17, '13:40:57', '2022-10-27', '2022-10-27', '15:03:24', 66, 'Admin', NULL, '2022-10-27 06:41:09', '2022-10-27 08:03:26'),
(46, 504, '6407A450', '4L45W 22 MY Garn, Side Upr RH', 'K2', 122, 'Cr 6+', 66, 'C1', '2022-10-27', 18, '13:41:09', '2022-10-27', '2022-10-27', '15:03:29', 66, 'Admin', NULL, '2022-10-27 06:41:18', '2022-10-27 08:03:31'),
(47, 505, '6407A449', '4L45W 22 MY Garn, Side Upr LH', 'K2', 123, 'Cr 6+', 66, 'C1', '2022-10-27', 20, '13:49:54', '2022-10-27', '2022-10-27', '15:03:33', 66, 'Admin', NULL, '2022-10-27 06:50:09', '2022-10-27 08:03:35'),
(48, 430, '71122-TE7-K11-M1', '2MM MLDG FR GRILLE', 'K2', 28, 'Cr 6+', 26, 'FS', '2022-10-27', 27, '11:59:00', '2020-02-23', '2022-10-27', '15:03:09', 26, 'Admin', NULL, '2022-10-27 07:57:13', '2022-10-27 08:03:12'),
(49, 509, '71125-T86-K001', '2JX Mldg Side R, Fr Grille', 'K2', 292, 'GRADE 1', 132, 'C2', '2022-10-27', 94, '14:25:00', '2022-10-27', '2022-10-27', '15:03:38', 132, 'Admin', '1', '2022-10-27 07:58:05', '2022-10-27 08:03:40'),
(50, 506, '6407A452', '4L45W 22 MY Garn, Side Lwr RH', 'K2', 124, 'Cr 6+', 56, 'CS', '2022-10-27', 94, '03:15:00', '2022-10-27', '2022-10-27', '15:02:49', 56, 'Admin', NULL, '2022-10-27 07:58:18', '2022-10-27 08:02:52');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `id_barang` int(11) DEFAULT NULL,
  `jenis_transaksi` varchar(255) DEFAULT NULL,
  `jumlah_barang` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `id_barang`, `jenis_transaksi`, `jumlah_barang`, `created_at`, `updated_at`) VALUES
(7, 3, 'Masuk', 11, '2022-10-24 03:40:52', '2022-10-24 04:01:09'),
(9, 3, 'Masuk', 10, '2022-10-24 04:00:33', '2022-10-24 04:00:33'),
(10, 5, 'Masuk', 10, '2022-10-24 06:59:52', '2022-10-24 06:59:52'),
(11, 4, 'Masuk', 2, '2022-10-25 01:52:43', '2022-10-25 01:52:43');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_images` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `username`, `profile_images`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', 'admin', '202210201316Avatar.png', NULL, '$2y$10$IxDL5EQI5w/ticHx835ZmeblBv.nw58nEG2L9NuXtAUy7T5CH.Nw.', NULL, '2022-10-05 02:22:32', '2022-10-20 06:16:14'),
(2, 'Febri', 'febri@sr.com', 'febri', NULL, NULL, '$2y$10$bf/FyXKpDh.2PDpTpFdxU.hm/L7.Fda7sW2WMruEePBS564PZFh8O', NULL, '2022-10-05 05:01:16', '2022-10-05 05:01:16'),
(3, 'Daryo', 'daryo@sr.com', 'daryo', '202210061328rsz_1img20170712102416.jpg', NULL, '$2y$10$vnJS0hGJwJZFC1rAVfzDwuFIcmmUz5MFy4Pl9E28Mc5rVy2yihuG.', NULL, '2022-10-05 05:01:45', '2022-10-06 06:28:30'),
(4, 'Subandi', 'subandi@sr.com', 'subandi', '202210061310rsz_1subandi.jpg', NULL, '$2y$10$kCwtSJNCcq7nuprOdmwot.715c47/E7f6lUbliNJ8H0WqLw6toGXu', NULL, '2022-10-06 00:44:39', '2022-10-06 06:10:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `kensa`
--
ALTER TABLE `kensa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `no_part` (`no_part`),
  ADD KEY `id_masterdata` (`id_masterdata`);

--
-- Indexes for table `masterdata`
--
ALTER TABLE `masterdata`
  ADD PRIMARY KEY (`id`),
  ADD KEY `no_part` (`no_part`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ng_racking`
--
ALTER TABLE `ng_racking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_masterdata` (`id_masterdata`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `plating`
--
ALTER TABLE `plating`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_masterdata` (`id_masterdata`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kensa`
--
ALTER TABLE `kensa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `masterdata`
--
ALTER TABLE `masterdata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10009;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `ng_racking`
--
ALTER TABLE `ng_racking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengiriman`
--
ALTER TABLE `pengiriman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `plating`
--
ALTER TABLE `plating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kensa`
--
ALTER TABLE `kensa`
  ADD CONSTRAINT `kensa_ibfk_1` FOREIGN KEY (`id_masterdata`) REFERENCES `masterdata` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD CONSTRAINT `pengiriman_ibfk_1` FOREIGN KEY (`id_masterdata`) REFERENCES `masterdata` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `plating`
--
ALTER TABLE `plating`
  ADD CONSTRAINT `plating_ibfk_1` FOREIGN KEY (`id_masterdata`) REFERENCES `masterdata` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
