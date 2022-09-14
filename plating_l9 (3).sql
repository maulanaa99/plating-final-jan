-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 08, 2022 at 03:14 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

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
-- Table structure for table `datapart`
--

CREATE TABLE `datapart` (
  `id` int(11) NOT NULL,
  `no_part` varchar(30) DEFAULT NULL,
  `nama_part` varchar(255) NOT NULL,
  `stok` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `datapart`
--

INSERT INTO `datapart` (`id`, `no_part`, `nama_part`, `stok`, `created_at`, `updated_at`) VALUES
(5, '75731-BZ130/M00', '2SJ FR DOOR MOLD RH', 910, '2022-09-07 00:58:21', '2022-09-07 02:28:31');

-- --------------------------------------------------------

--
-- Table structure for table `kensa`
--

CREATE TABLE `kensa` (
  `kensa_id` int(11) NOT NULL,
  `tanggal_k` datetime NOT NULL,
  `no_part` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `part_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `other` int(11) DEFAULT NULL,
  `gores` int(11) DEFAULT NULL,
  `regas` int(11) DEFAULT NULL,
  `silver` int(11) DEFAULT NULL,
  `hike` int(11) DEFAULT NULL,
  `burry` int(11) DEFAULT NULL,
  `others` int(11) DEFAULT NULL,
  `total_ok` int(11) NOT NULL,
  `total_ng` int(11) NOT NULL,
  `p_total_ok` decimal(11,2) NOT NULL,
  `p_total_ng` decimal(11,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kensa`
--

INSERT INTO `kensa` (`kensa_id`, `tanggal_k`, `no_part`, `part_name`, `no_bar`, `qty_bar`, `cycle`, `nikel`, `butsu`, `hadare`, `hage`, `moyo`, `fukure`, `crack`, `henkei`, `hanazaki`, `kizu`, `kaburi`, `other`, `gores`, `regas`, `silver`, `hike`, `burry`, `others`, `total_ok`, `total_ng`, `p_total_ok`, `p_total_ng`, `created_at`, `updated_at`) VALUES
(9, '2022-09-07 02:13:05', '53121-BZ450', 'D14N MLDG, Rad Grille, UPR', 1, 36, 'Cycle 1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 36, 0, '100.00', '0.00', '2022-09-07 07:13:13', '2022-09-07 07:13:13'),
(10, '2022-09-07 02:14:01', '53122-BZ160', 'D14N MLDG, Rad Grille, No.2', 2, 70, 'Cycle 1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 70, 0, '100.00', '0.00', '2022-09-07 07:14:12', '2022-09-07 07:14:12'),
(11, '2022-09-07 02:17:59', '53123-BZ180', 'D14N MLDG, Rad Grille, No.3', 3, 90, 'Cycle 1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 90, 0, '100.00', '0.00', '2022-09-07 07:18:07', '2022-09-07 07:18:07'),
(12, '2022-09-06 02:18:21', '7450B174', '4P45 Grille Rad Outer CTR RH', 5, 96, 'Cycle 1', 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 95, 1, '98.96', '1.04', '2022-09-07 07:18:44', '2022-09-07 07:18:44'),
(13, '2022-08-31 02:18:52', '53123-0D150', '230B MLDG, Grille RH (6Cr)', 9, 576, 'Cycle 1', 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 573, 3, '99.48', '0.52', '2022-09-07 07:19:26', '2022-09-07 07:19:26'),
(14, '2022-08-07 02:19:49', '75731-BZ130/M00', 'D80N FR DOOR MOLD RH', 1, 84, 'Cycle 1', 1, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 81, 3, '96.43', '3.57', '2022-09-07 07:20:08', '2022-09-07 07:20:08'),
(15, '2022-09-07 02:47:00', '53122-BZ140', 'D22D GRILLE MOLD', 10, 144, 'Cycle 1', 1, 1, 0, 0, 0, 0, 0, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 140, 4, '97.22', '2.78', '2022-09-07 07:47:17', '2022-09-07 07:56:28'),
(16, '2022-09-07 03:35:12', '75731-BZ130/M00', 'D80N FR DOOR MOLD RH', 14, 84, 'Cycle 1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 84, 0, '100.00', '0.00', '2022-09-07 08:35:35', '2022-09-07 08:35:35'),
(17, '2022-09-07 03:44:31', '53123-OK110', '490J GRILLE CTR RH (Dark)', 16, 252, 'Cycle 1', 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 251, 1, '99.60', '0.40', '2022-09-07 08:44:58', '2022-09-07 08:44:58'),
(18, '2022-09-07 03:50:15', '53123-OK110', '490J GRILLE CTR RH (Dark)', 11, 252, 'Cycle 1', 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 251, 1, '99.60', '0.40', '2022-09-07 08:50:28', '2022-09-07 08:50:28'),
(19, '2022-09-07 03:50:15', '53123-OK110', '490J GRILLE CTR RH (Dark)', 11, 252, 'Cycle 1', 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 251, 1, '99.60', '0.40', '2022-09-07 08:50:58', '2022-09-07 08:50:58'),
(20, '2022-09-07 03:50:15', '53123-OK110', '490J GRILLE CTR RH (Dark)', 11, 252, 'Cycle 1', 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 251, 1, '99.60', '0.40', '2022-09-07 08:51:01', '2022-09-07 08:51:01'),
(21, '2022-09-07 03:50:15', '53123-OK110', '490J GRILLE CTR RH (Dark)', 11, 252, 'Cycle 1', 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 251, 1, '99.60', '0.40', '2022-09-07 08:51:10', '2022-09-07 08:51:10'),
(22, '2022-09-07 03:52:21', '75731-BZ130/M00', 'D80N FR DOOR MOLD RH', 111, 84, 'Cycle 1', 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 83, 1, '98.81', '1.19', '2022-09-07 08:52:38', '2022-09-07 08:52:38'),
(23, '2022-09-07 04:04:33', '75731-BZ130/M00', 'D80N FR DOOR MOLD RH', 1, 84, 'Cycle 1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 84, 0, '100.00', '0.00', '2022-09-07 09:04:40', '2022-09-07 09:04:40'),
(24, '2022-09-07 04:05:20', '75731-BZ130/M00', 'D80N FR DOOR MOLD RH', 1, 84, 'Cycle 1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 84, 0, '100.00', '0.00', '2022-09-07 09:05:27', '2022-09-07 09:05:27'),
(25, '2022-09-08 08:09:56', '53121-BZ520/30/50', 'D12L MLDG, Rad Grille, UPR BLACK', 16, 30, 'Cycle 1', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 29, 1, '96.67', '3.33', '2022-09-08 01:10:10', '2022-09-08 01:10:10');

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
  `stok` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `masterdata`
--

INSERT INTO `masterdata` (`id`, `no_part`, `part_name`, `katalis`, `channel`, `grade_color`, `qty_bar`, `stok`, `created_at`, `updated_at`) VALUES
(129, '75731-BZ130/M00', 'D80N FR DOOR MOLD RH ', 'K2', 6, 'Cr 6+', 84, 0, '2022-08-08 02:33:15', '2022-08-08 02:33:15'),
(130, '75732-BZ130/M00', 'D80N FR DOOR MOLD LH ', 'K2', 6, 'Cr 6+', 84, 0, '2022-08-08 02:33:15', '2022-08-08 02:33:15'),
(131, '75741-BZ130/M00', 'D80N RR DOOR MOLD RH ', 'K2', 4, 'Cr 6+', 152, 0, '2022-08-08 02:33:15', '2022-08-08 02:33:15'),
(132, '75742-BZ130/M00', 'D80N RR DOOR MOLD LH', 'K2', 4, 'Cr 6+', 152, 0, '2022-08-08 02:33:15', '2022-08-08 02:33:15'),
(133, '623104LC0A-03/M00', 'K2 GRILLE FIN', 'K2', 9, 'Cr 6+', 30, 0, '2022-08-08 02:33:15', '2022-08-08 02:33:15'),
(134, '628904LC0A/M00', 'K2 EMBLEM FR', 'K2', 7, 'Cr 6+', 336, 0, '2022-08-08 02:33:15', '2022-08-08 02:33:15'),
(135, '908904LC0A/M00', 'K2 EMBLEM RR', 'K2', 8, 'Cr 6+', 432, 0, '2022-08-08 02:33:15', '2022-08-08 02:33:15'),
(136, '90892-4LCOA', 'K2 MARK GO', 'K2', 10, 'Cr 6+', 216, 0, '2022-08-08 02:33:15', '2022-08-08 02:33:15'),
(137, '90893-4LCOA', 'K2 MARK GO+', 'K2', 10, 'Cr 6+', 198, 0, '2022-08-08 02:33:15', '2022-08-08 02:33:15'),
(138, '71122-TBA-030', '2WF FR GRILLE MOLD Cr6  ', 'K2', 21, 'Cr 6+', 120, 0, '2022-08-08 02:33:15', '2022-08-08 02:33:15'),
(139, '71122-TBA-030', '2WF FR GRILLE MOLD Cr3  ', 'K2', 20, 'Cr 3+', 120, 0, '2022-08-08 02:33:15', '2022-08-08 02:33:15'),
(140, '74890-T5SA-U310/510', '2WF RR LICENSE Cr6      ', 'K2', 23, 'Cr 6+', 24, 0, '2022-08-08 02:33:15', '2022-08-08 02:33:15'),
(141, '74890-T5SA-U310/510', '2WF RR LICENSE Cr3', 'K2', 22, 'Cr 3+', 24, 0, '2022-08-08 02:33:15', '2022-08-08 02:33:15'),
(142, '71123-T8N-000', '2XP GRILLE MOLD RH', 'K2', 24, 'Cr 6+', 240, 0, '2022-08-08 02:33:15', '2022-08-08 02:33:15'),
(143, '71128-T8N-000', '2XP GRILLE MOLD LH', 'K2', 24, 'Cr 6+', 240, 0, '2022-08-08 02:33:15', '2022-08-08 02:33:15'),
(144, '53122-BZ140', 'D22D GRILLE MOLD', 'K2', 30, 'Cr 6+', 144, 0, '2022-08-08 02:33:15', '2022-08-08 02:33:15'),
(145, '76811-BZ320', 'D22D BACK DOOR RH', 'K2', 31, 'Cr 6+', 210, 0, '2022-08-08 02:33:15', '2022-08-08 02:33:15'),
(146, '76812-BZ060', 'D22D BACK DOOR LH', 'K2', 31, 'Cr 6+', 210, 0, '2022-08-08 02:33:15', '2022-08-08 02:33:15'),
(147, '71742-59RO', 'YL8 GRILLE UPR GN', 'K2', 50, 'Cr 6+', 24, 0, '2022-08-08 02:33:15', '2022-08-08 02:33:15'),
(148, '71743-59RO R', 'YL8 GRILLE CTR GN RH', 'K2', 51, 'Cr 6+', 100, 0, '2022-08-08 02:33:15', '2022-08-08 02:33:15'),
(149, '71743-59RO L', 'YL8 GRILLE CTR GN LH', 'K2', 51, 'Cr 6+', 100, 0, '2022-08-08 02:33:15', '2022-08-08 02:33:15'),
(150, '76811-BZ270', 'D17D BACK DOOR LOW', 'K2', 35, 'Cr 6+', 28, 0, '2022-08-08 02:33:15', '2022-08-08 02:33:15'),
(151, '76811-BZ340', 'D17D BACK DOOR HIGH', 'K2', 36, 'Cr 6+', 28, 0, '2022-08-08 02:33:15', '2022-08-08 02:33:15'),
(152, '75312-TSA-K000', '2SJ FR DOOR MOLD RH', 'K2', 144, 'Cr 6+', 30, 0, '2022-08-08 02:33:15', '2022-08-08 02:33:15'),
(153, '75332-TSA-K000', '2SJ FR DOOR MOLD LH', 'K2', 144, 'Cr 6+', 30, 0, '2022-08-08 02:33:15', '2022-08-08 02:33:15'),
(154, '75313-TSA-K000', '2SJ RR DOOR MOLD RH', 'K2', 146, 'Cr 6+', 30, 0, '2022-08-08 02:33:15', '2022-08-08 02:33:15'),
(155, '75333-TSA-K000', '2SJ RR DOOR MOLD LH', 'K2', 146, 'Cr 6+', 30, 0, '2022-08-08 02:33:15', '2022-08-08 02:33:15'),
(156, '74890-TSA-K00', '2SJ RR LICENSE CAMERA', 'K2', 27, 'Cr 6+', 32, 0, '2022-08-08 02:33:15', '2022-08-08 02:33:15'),
(157, '74890-TSA-K01', '2SJ RR LICENSE NON CAMERA', 'K2', 27, 'Cr 6+', 32, 0, '2022-08-08 02:33:15', '2022-08-08 02:33:15'),
(158, '75459-OK120', '660A MARK Q', 'K2', 60, 'Cr 6+', 768, 0, '2022-08-08 02:33:15', '2022-08-08 02:33:15'),
(159, '75459-OK310', '660A MARK SR', 'K2', 60, 'Cr 6+', 520, 0, '2022-08-08 02:33:15', '2022-08-08 02:33:15'),
(160, '75459-OK340', '660A MARK SRV', 'K2', 60, 'Cr 6+', 648, 0, '2022-08-08 02:33:15', '2022-08-08 02:33:15'),
(161, '75311-BZ310-H', 'D30D FR EMBLEM', 'K2', 41, 'Cr 6+', 240, 0, '2022-08-08 02:33:15', '2022-08-08 02:33:15'),
(162, '75441-BZ360-H', 'D30D SIGRA MARK', 'K2', 38, 'Cr 6+', 720, 0, '2022-08-08 02:33:15', '2022-08-08 02:33:15'),
(163, '53123-OK110', '490J GRILLE CTR RH (Dark)', 'K2', 61, 'Cr 3+', 252, 0, '2022-08-08 02:33:15', '2022-08-08 02:33:15'),
(164, '53124-OK020', '490J GRILLE CTR LH (Dark)', 'K2', 61, 'Cr 3+', 252, 0, '2022-08-08 02:33:15', '2022-08-08 02:33:15'),
(165, '53122-OK290', '490J GRILLE LWR (Dark)', 'K2', 62, 'Cr 3+', 82, 0, '2022-08-08 02:33:15', '2022-08-08 02:33:15'),
(166, '52127-OK250', '490J FOG LAMP RH (Dark)', 'K2', 63, 'Cr 3+', 140, 0, '2022-08-08 02:33:15', '2022-08-08 02:33:15'),
(167, '52128-OK250', '490J FOG LAMP LH (Dark)', 'K2', 63, 'Cr 3+', 140, 0, '2022-08-08 02:33:15', '2022-08-08 02:33:15'),
(168, '71122-TE7-K11-M1', '2MM MLDG FR GRILLE', 'K2', 28, 'Cr 6+', 26, 0, '2022-08-08 02:33:15', '2022-08-08 02:33:15'),
(169, '74891-TE7-K41-20', '2MM MLDG R, RR LICENSE', 'K2', 29, 'Cr 6+', 170, 0, '2022-08-08 02:33:15', '2022-08-08 02:33:15'),
(170, '74892-TE7-K41-20', '2MM MLDG L, RR LICENSE', 'K2', 29, 'Cr 6+', 170, 0, '2022-08-08 02:33:15', '2022-08-08 02:33:15'),
(171, '7450B174', '4P45 Grille Rad Outer CTR RH', 'K2', 93, 'Cr 6+', 96, 0, '2022-08-08 02:33:15', '2022-08-08 02:33:15'),
(172, '7450B173', '4P45 Grille Rad Outer CTR LH', 'K2', 93, 'Cr 6+', 96, 0, '2022-08-08 02:33:15', '2022-08-08 02:33:15'),
(173, '7450B176', '4P45 Grille Rad MID RH', 'K2', 91, 'Cr 6+', 280, 0, '2022-08-08 02:33:15', '2022-08-08 02:33:15'),
(174, '7450B175', '4P45 Grille Rad MID LH', 'K2', 91, 'Cr 6+', 280, 0, '2022-08-08 02:33:15', '2022-08-08 02:33:15'),
(175, '7450B171', '4P45 Grille Rad Outer Lower', 'K2', 92, 'Cr 6+', 42, 0, '2022-08-08 02:33:15', '2022-08-08 02:33:15'),
(176, '7450B177', '4P45 Cover FR Camera', 'K2', 83, 'Cr 6+', 364, 0, '2022-08-08 02:33:15', '2022-08-08 02:33:15'),
(177, '7415A669', '4P45 Mark 3 Dia', 'K2', 84, 'Cr 6+', 360, 0, '2022-08-08 02:33:15', '2022-08-08 02:33:15'),
(178, '71123-T5L-T80', '2WM MLDG Upper, FR Grille', 'K2', 16, 'Cr 6+', 72, 0, '2022-08-08 02:33:15', '2022-08-08 02:33:15'),
(179, '71122-T5L-T80', '2WM MLDG Lower, FR Grille', 'K2', 500, 'Cr 6+', 88, 0, '2022-08-08 02:33:15', '2022-08-08 02:33:15'),
(180, '7450B179', '4L45W Grille Radiator', 'K1', 100, 'Cr 6+', 16, 0, '2022-08-08 02:33:15', '2022-08-08 02:33:15'),
(181, '6407A186', '4L45W Bumper Side UPR RH', 'K2', 101, 'Cr 6+', 64, 0, '2022-08-08 02:33:15', '2022-08-08 02:33:15'),
(182, '6407A185', '4L45W Bumper Side UPR LH', 'K2', 101, 'Cr 6+', 64, 0, '2022-08-08 02:33:15', '2022-08-08 02:33:15'),
(183, '6407A188', '4L45W Bumper Side LWR RH', 'K2', 102, 'Cr 6+', 72, 0, '2022-08-08 02:33:15', '2022-08-08 02:33:15'),
(184, '6407A187', '4L45W Bumper Side LWR LH', 'K2', 102, 'Cr 6+', 72, 0, '2022-08-08 02:33:15', '2022-08-08 02:33:15'),
(185, '7415A622', '4L45W FR Emblem 3-DIA', 'K2', 112, 'Cr 6+', 200, 0, '2022-08-08 02:33:15', '2022-08-08 02:33:15'),
(186, '7415A672', '4L45W RR Emblem 3-DIA', 'K2', 106, 'Cr 6+', 440, 0, '2022-08-08 02:33:15', '2022-08-08 02:33:15'),
(187, '53121-BZ450', 'D14N MLDG, Rad Grille, UPR', 'K1', 76, 'Cr 6+', 36, 0, '2022-08-08 02:33:15', '2022-08-08 02:33:15'),
(188, '53122-BZ160', 'D14N MLDG, Rad Grille, No.2', 'K2', 77, 'Cr 6+', 70, 0, '2022-08-08 02:33:15', '2022-08-08 02:33:15'),
(189, '53123-BZ180', 'D14N MLDG, Rad Grille, No.3', 'K2', 78, 'Cr 6+', 90, 0, '2022-08-08 02:33:15', '2022-08-08 02:33:15'),
(190, '53123-0D150', '230B MLDG, Grille RH (6Cr)', 'K2', 66, 'Cr 6+', 576, 0, '2022-08-08 02:33:15', '2022-08-08 02:33:15'),
(191, '53124-0D270', '230B MLDG, Grille LH (6Cr)', 'K2', 66, 'Cr 6+', 576, 0, '2022-08-08 02:33:15', '2022-08-08 02:33:15'),
(192, '53123-0D150', '230B MLDG, Grille RH (3Cr)', 'K2', 67, 'Cr 3+', 576, 0, '2022-08-08 02:33:15', '2022-08-08 02:33:15'),
(193, '53124-0D270', '230B MLDG, Grille LH (3Cr)', 'K2', 67, 'Cr 3+', 576, 0, '2022-08-08 02:33:15', '2022-08-08 02:33:15'),
(194, '75312-TSA-K000', '2SK-B FR DOOR MOLD RH', 'K2', 243, 'GRADE 2', 30, 0, '2022-08-08 02:33:15', '2022-08-08 02:33:15'),
(195, '75332-TSA-K000', '2SK-B FR DOOR MOLD LH', 'K2', 243, 'GRADE 2', 30, 0, '2022-08-08 02:33:15', '2022-08-08 02:33:15'),
(196, '75313-TSA-K000', '2SK-B RR DOOR MOLD RH', 'K2', 244, 'GRADE 2', 30, 0, '2022-08-08 02:33:15', '2022-08-08 02:33:15'),
(197, '75333-TSA-K000', '2SK-B RR DOOR MOLD LH', 'K2', 244, 'GRADE 2', 30, 0, '2022-08-08 02:33:15', '2022-08-08 02:33:15'),
(198, '74890-TSA-K00', '2SK-B RR LICENSE CAMERA', 'K2', 247, 'GRADE 2', 32, 0, '2022-08-08 02:33:15', '2022-08-08 02:33:15'),
(199, '74890-TSA-K01', '2SK-B RR LICENSE NON CAMERA', 'K2', 247, 'GRADE 2', 32, 0, '2022-08-08 02:33:15', '2022-08-08 02:33:15'),
(200, '62310-8JA0A', 'K2(MC) Grille Fin', 'K2', 12, 'Cr 6+', 24, 0, '2022-08-08 02:33:15', '2022-08-08 02:33:15'),
(201, '62310-8G0A-02', 'K2D Grille Fin Rad', 'K2', 13, 'Cr 6+', 24, 0, '2022-08-08 02:33:15', '2022-08-08 02:33:15'),
(202, '6407A262', '4P45 Bumper Upper RH', 'K2', 95, 'Cr 6+', 40, 0, '2022-08-08 02:33:15', '2022-08-08 02:33:15'),
(203, '6407A261', '4P45 Bumper Upper LH', 'K2', 95, 'Cr 6+', 40, 0, '2022-08-08 02:33:15', '2022-08-08 02:33:15'),
(204, '6407A264', '4P45 Bumper Lower RH', 'K2', 96, 'Cr 6+', 144, 0, '2022-08-08 02:33:15', '2022-08-08 02:33:15'),
(205, '6407A263', '4P45 Bumper Lower LH', 'K2', 96, 'Cr 6+', 144, 0, '2022-08-08 02:33:15', '2022-08-08 02:33:15'),
(206, '5817A317', '4P45 Garnish License Cam', 'K2', 97, 'Cr 6+', 28, 0, '2022-08-08 02:33:15', '2022-08-08 02:33:15'),
(207, '5817A316', '4P45 Garnish License N/C', 'K2', 97, 'Cr 6+', 28, 0, '2022-08-08 02:33:15', '2022-08-08 02:33:15'),
(208, '84896 8GAOA', 'K2D CVT Mark', 'K2', 110, 'Cr 6+', 540, 0, '2022-08-08 02:33:15', '2022-08-08 02:33:15'),
(209, '71122-T7A-J51-M1', '2XS GRILLE UPR (Dark)', 'K1', 142, 'Cr 3+', 16, 0, '2022-08-08 02:33:15', '2022-08-08 02:33:15'),
(210, '71122-T7A-J51-M1', '2XS GRILLE UPR (Black)', 'K1', 141, 'Black', 16, 0, '2022-08-08 02:33:15', '2022-08-08 02:33:15'),
(211, '71163-T7A-JO/J51', '2XS EXTN MOLD RH (Dark)', 'K1', 132, 'Cr 3+', 108, 0, '2022-08-08 02:33:15', '2022-08-08 02:33:15'),
(212, '71168-T7A-JO/J51', '2XS EXTN MOLD LH (Dark)', 'K1', 132, 'Cr 3+', 108, 0, '2022-08-08 02:33:15', '2022-08-08 02:33:15'),
(213, '71163-T7A-JO/J51', '2XS EXTN MOLD RH (Black)', 'K2', 133, 'Black', 84, 0, '2022-08-08 02:33:15', '2022-08-08 02:33:15'),
(214, '71168-T7A-JO/J51', '2XS EXTN MOLD LH (Black)', 'K2', 133, 'Black', 84, 0, '2022-08-08 02:33:15', '2022-08-08 02:33:15'),
(215, '74892-T8NW-ZZ10-M1', '2XS RR LICENSE (Dark)', 'K2', 134, 'Cr 3+', 156, 0, '2022-08-08 02:33:15', '2022-08-08 02:33:15'),
(216, '74892-T8NW-ZZ01-M1', '2XS RR LICENSE (Black)', 'K2', 135, 'Black', 120, 0, '2022-08-08 02:33:15', '2022-08-08 02:33:15'),
(217, '83942-73RXO', 'YHA MLDG B/D Garnish', 'K2', 54, 'Cr 6+', 102, 0, '2022-08-08 02:33:15', '2022-08-08 02:33:15'),
(218, '08F21-TE7-7MO-M3', '2MM(HAC) GRILLE UPR', 'K2', 19, 'Cr 6+', 24, 0, '2022-08-08 02:33:15', '2022-08-08 02:33:15'),
(219, '53121-BZ530', 'D12L MLDG, Radiator Grille, UPR', 'K2', 301, 'Cr 6+', 30, 0, '2022-08-08 02:33:15', '2022-08-08 02:33:15'),
(220, '76802-BZ350', 'D12L GARN, B/D, Outside LH', 'K2', 305, 'Cr 6+', 36, 0, '2022-08-08 02:33:15', '2022-08-08 02:33:15'),
(221, '71126-TSA-K110-M1', '2KB (TSAX) Grade 1 Molding Front Grille', 'K2', 339, 'GRADE 1', 30, 0, '2022-08-08 02:33:15', '2022-08-08 02:33:15'),
(222, '71125-TSA-K110-M1', '2KB (TSAX) Grade 1 MLDG UPR, FR Grille', 'K2', 303, 'GRADE 1', 60, 0, '2022-08-08 02:33:15', '2022-08-08 02:33:15'),
(223, '71122-TSA-K110-M1', '2KB (TSAX) Grade 1 Moding Grille Lower', 'K2', 302, 'GRADE 1', 56, 0, '2022-08-08 02:33:15', '2022-08-08 02:33:15'),
(224, '71126-TSE-X110-M1', '2KB (TSAX) Grade 2 MLDG, FR Grille ', 'K2', 311, 'GRADE 2', 24, 0, '2022-08-08 02:33:15', '2022-08-08 02:33:15'),
(225, '71125-TSE-X110-M1', '2KB (TSAX) Grade 2 MLDG UPR, FR Grille', 'K2', 320, 'GRADE 2', 60, 0, '2022-08-08 02:33:15', '2022-08-08 02:33:15'),
(226, '71122-TSE-X110-M1', '2KB (TSAX) Grade 2 MLDG LWR, FR Grille', 'K2', 321, 'GRADE 2', 56, 0, '2022-08-08 02:33:15', '2022-08-08 02:33:15'),
(227, '72112-72SA0', 'YHA GN RADIATOR GRILLE RH', 'K2', 490, 'Cr 6+', 110, 0, '2022-08-08 02:33:15', '2022-08-08 02:33:15'),
(228, '72113-72SA0', 'YHA GN RADIATOR GRILLE LH', 'K2', 490, 'Cr 6+', 110, 0, '2022-08-08 02:33:15', '2022-08-08 02:33:15'),
(229, '7450B282', '5D45W MLDG, Grille', 'K2', 170, 'Cr 6+', 18, 0, '2022-08-08 02:33:15', '2022-08-08 02:33:15'),
(230, '7415A701', '5D45W Nissan Mark FR', 'K2', 171, 'Cr 6+', 250, 0, '2022-08-08 02:33:15', '2022-08-08 02:33:15'),
(231, '7415A703', '5D45W Nissan Mark RR', 'K2', 172, 'Cr 6+', 300, 0, '2022-08-08 02:33:15', '2022-08-08 02:33:15'),
(232, '7405A983', 'SL3800 Garnish FR End', 'K2', 381, 'Cr 6+', 20, 0, '2022-08-08 02:33:15', '2022-08-08 02:33:15'),
(233, '7450B506', '4L45W 20 MY SUV Grille Radiator', 'K1', 280, 'Cr 3+', 12, 0, '2022-08-08 02:33:15', '2022-08-08 02:33:15'),
(234, '6407A396', '4L45W 20 MY SUV Grille Upper RH', 'K2', 281, 'Cr 6+', 48, 0, '2022-08-08 02:33:15', '2022-08-08 02:33:15'),
(235, '6407A395', '4L45W 20 MY SUV Grille Upper LH', 'K2', 281, 'Cr 6+', 48, 0, '2022-08-08 02:33:15', '2022-08-08 02:33:15'),
(236, '6407A400', '4L45W 20 MY SUV Grille Lower RH', 'K2', 282, 'Cr 6+', 100, 0, '2022-08-08 02:33:15', '2022-08-08 02:33:15'),
(237, '6407A399', '4L45W 20 MY SUV Grille Lower LH', 'K2', 282, 'Cr 6+', 100, 0, '2022-08-08 02:33:15', '2022-08-08 02:33:15'),
(238, '7415A765', '4L45W 20 MY SUV Mark 3 Dia', 'K2', 283, 'Cr 6+', 150, 0, '2022-08-08 02:33:15', '2022-08-08 02:33:15'),
(239, '7450B503', '4L45W 20 MY STD Grille Radiator', 'K1', 107, 'Cr 6+', 16, 0, '2022-08-08 02:33:15', '2022-08-08 02:33:15'),
(240, '7415A729', '4L45W 20 MY SUV Cross Mark', 'K2', 285, 'Cr 6+', 768, 0, '2022-08-08 02:33:15', '2022-08-08 02:33:15'),
(241, '531470K11000', '655B-R', 'K1', 52, 'Cr 6+', 38, 0, '2022-08-08 02:33:15', '2022-08-08 02:33:15'),
(242, '531480K11000', '655B-L', 'K1', 52, 'Cr 6+', 38, 0, '2022-08-08 02:33:15', '2022-08-08 02:33:15'),
(243, '53147010KA00', '655B-R', 'K1', 55, 'Black', 28, 0, '2022-08-08 02:33:15', '2022-08-08 02:33:15'),
(244, '53148010KA00', '655B-L', 'K1', 55, 'Black', 28, 0, '2022-08-08 02:33:15', '2022-08-08 02:33:15'),
(245, '53121-BZ680', 'D26A Molding Rad Grille Upper', 'K2', 26, 'Cr 6+', 28, 0, '2022-08-08 02:33:15', '2022-08-08 02:33:15'),
(246, '6407A450', '4L45W 22 MY Garn, Side Upr RH', 'K2', 122, 'Cr 6+', 66, 0, '2022-08-08 02:33:15', '2022-08-08 02:33:15'),
(247, '6407A449', '4L45W 22 MY Garn, Side Upr LH', 'K2', 123, 'Cr 6+', 66, 0, '2022-08-08 02:33:15', '2022-08-08 02:33:15'),
(248, '6407A452', '4L45W 22 MY Garn, Side Lwr RH', 'K2', 124, 'Cr 6+', 56, 0, '2022-08-08 02:33:15', '2022-08-08 02:33:15'),
(249, '6407A451', '4L45W 22 MY Garn, Side Lwr LH', 'K2', 125, 'Cr 6+', 56, 0, '2022-08-08 02:33:15', '2022-08-08 02:33:15'),
(250, '71123-T56-K000', '2JX Mldg CTR, Fr Grille', 'K2', 290, 'GRADE 1', 36, 0, '2022-08-08 02:33:15', '2022-08-08 02:33:15'),
(251, '71125-T86-K001', '2JX Mldg Side R, Fr Grille', 'K2', 292, 'GRADE 1', 132, 0, '2022-08-08 02:33:15', '2022-08-08 02:33:15'),
(252, '71126-T86-K001', '2JX Mldg Side L, Fr Grille', 'K2', 293, 'GRADE 1', 132, 0, '2022-08-08 02:33:15', '2022-08-08 02:33:15'),
(253, '712023M1-T000M2', '2GN Mldg Upper Fr Grille ', 'K2', 120, 'Cr 6+', 50, 0, '2022-08-08 02:33:15', '2022-08-08 02:33:15'),
(254, '7405B166', 'SL3800 22MY Upper Mold RH', 'K2', 356, 'Cr 6+', 120, 0, '2022-08-08 02:33:15', '2022-08-08 02:33:15'),
(255, '7405B165', 'SL3800 22MY Upper Mold LH', 'K2', 357, 'Cr 6+', 120, 0, '2022-08-08 02:33:15', '2022-08-08 02:33:15'),
(256, '7405B086', 'SL3800 22MY Lower Mold RH', 'K2', 354, 'Cr 6+', 108, 0, '2022-08-08 02:33:15', '2022-08-08 02:33:15'),
(257, '7405B085', 'SL3800 22MY Lower Mold LH', 'K2', 355, 'Cr 6+', 108, 0, '2022-08-08 02:33:15', '2022-08-08 02:33:15'),
(260, '53121-BZ520/30/50', 'D12L MLDG, Rad Grille, UPR BLACK', 'K1', 201, 'BLACK', 30, 0, NULL, NULL),
(261, '76811-BZ540/550', 'D12L GARN, B/D, Outside LH (Black)', 'K1', 205, 'BLACK', 36, 0, NULL, NULL);

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
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_07_27_031549_create_masterdata_table', 1),
(6, '2022_07_27_031931_create_racking_table', 1),
(7, '2022_08_01_132848_create_unracking_table', 2),
(8, '2022_08_02_083937_create_plating_table', 3),
(9, '2022_08_08_082833_create_kensa_table', 4),
(10, '2022_08_09_083044_create_stockin_table', 5),
(11, '2022_08_11_075749_create_pegawais_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `plating`
--

CREATE TABLE `plating` (
  `plating_id` int(11) NOT NULL,
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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `plating`
--

INSERT INTO `plating` (`plating_id`, `no_part`, `part_name`, `katalis`, `channel`, `grade_color`, `qty_bar`, `cycle`, `tanggal_r`, `no_bar`, `waktu_in_r`, `tgl_lot_prod_mldg`, `tanggal_u`, `waktu_in_u`, `qty_aktual`, `created_at`, `updated_at`) VALUES
(27, '75731-BZ130/M00', 'D80N FR DOOR MOLD RH', 'K2', 6, 'Cr 6+', 84, 'Cycle 1', '2022-08-08', 1, '09:36:41', '2022-08-08', '2022-08-08', '09:37:51', 84, NULL, NULL),
(28, '53121-BZ450', 'D14N MLDG, Rad Grille, UPR', 'K1', 76, 'Cr 6+', 36, 'Cycle 1', '2022-08-08', 2, '09:36:51', '2022-08-08', '2022-08-08', '09:37:57', 36, NULL, NULL),
(29, '53121-BZ450', 'D14N MLDG, Rad Grille, UPR', 'K1', 76, 'Cr 6+', 36, 'Cycle 1', '2022-08-19', 23, '07:52:00', '2022-08-19', '2022-08-19', '08:23:50', 36, NULL, NULL),
(30, '6407A450', '4L45W 22 MY Garn, Side Upr RH', 'K2', 122, 'Cr 6+', 66, 'Cycle 1', '2022-08-19', 22, '08:17:38', '2022-08-19', '2022-08-19', '10:12:13', 66, NULL, NULL),
(31, '75312-TSA-K000', '2SJ FR DOOR MOLD RH', 'K2', 144, 'Cr 6+', 30, 'Cycle 1', '2022-08-19', 15, '08:19:18', '2022-08-19', '2022-08-19', '10:10:40', 30, NULL, NULL),
(32, '71126-TSA-K110-M1', '2KB (TSAX) Grade 1 Molding Front Grille', 'K2', 339, 'GRADE 1', 30, 'Cycle 1', '2022-08-19', 29, '08:20:10', '2022-08-19', '2022-08-19', '08:37:07', 30, NULL, NULL),
(33, '7405A983', 'SL3800 Garnish FR End', 'K2', 381, 'Cr 6+', 20, 'Cycle 1', '2022-08-19', 50, '08:20:36', '2022-08-19', '2022-08-19', '10:13:45', 20, NULL, NULL),
(34, '7450B174', '4P45 Grille Rad Outer CTR RH', 'K2', 93, 'Cr 6+', 96, 'Cycle 1', '2022-08-19', 89, '08:20:56', '2022-08-19', '2022-08-19', '10:12:30', 96, NULL, NULL),
(35, '75731-BZ130/M00', 'D80N FR DOOR MOLD RH', 'K2', 6, 'Cr 6+', 84, 'Cycle 1', '2022-08-19', 10, '10:56:21', '2022-08-19', '2022-08-19', '13:15:06', 84, NULL, NULL),
(36, '53121-BZ450', 'D14N MLDG, Rad Grille, UPR', 'K1', 76, 'Cr 6+', 36, 'Cycle 1', '2022-08-20', 15, '09:38:03', '2022-08-20', '2022-08-20', '09:40:07', 36, NULL, NULL),
(37, '53122-BZ140', 'D22D GRILLE MOLD', 'K2', 30, 'Cr 6+', 144, 'Cycle 1', '2022-08-24', 15, '13:13:02', '2022-08-24', '2022-09-07', '10:13:09', 144, NULL, NULL),
(38, '7450B179', '4L45W Grille Radiator', 'K1', 100, 'Cr 6+', 16, 'Cycle 1', '2022-09-07', 11, '13:20:14', '2022-09-07', '2022-09-08', '08:07:08', 16, NULL, NULL),
(39, '71122-TBA-030', '2WF FR GRILLE MOLD Cr6', 'K2', 21, 'Cr 6+', 120, 'Cycle 1', '2022-09-07', 55, '13:39:45', '2022-09-07', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `stok`
--

CREATE TABLE `stok` (
  `id` int(11) NOT NULL,
  `no_part` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `part_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stok_in` int(11) NOT NULL DEFAULT 0,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stok`
--

INSERT INTO `stok` (`id`, `no_part`, `part_name`, `stok_in`, `updated_at`, `created_at`) VALUES
(1, '75731-BZ130/M00', '129', 0, '2022-09-05 07:31:02', '2022-09-05 07:31:02'),
(2, '75731-BZ130/M00', '129', 0, '2022-09-05 07:32:00', '2022-09-05 07:32:00'),
(3, '75731-BZ130/M00', '129', 0, '2022-09-05 07:38:03', '2022-09-05 07:38:03'),
(4, '75731-BZ130/M00', '129', 0, '2022-09-05 07:39:56', '2022-09-05 07:39:56');

-- --------------------------------------------------------

--
-- Table structure for table `stokin`
--

CREATE TABLE `stokin` (
  `id` int(11) NOT NULL,
  `no_stok_in` varchar(255) NOT NULL,
  `id_datapart` int(11) NOT NULL,
  `jml_part_masuk` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stokin`
--

INSERT INTO `stokin` (`id`, `no_stok_in`, `id_datapart`, `jml_part_masuk`, `created_at`, `updated_at`) VALUES
(1, 'BM001', 5, 1, '2022-09-07 01:59:12', '2022-09-07 01:59:12'),
(2, 'BM002', 5, 200, '2022-09-07 01:59:35', '2022-09-07 01:59:35'),
(3, 'BM003', 5, 100, '2022-09-07 02:07:37', '2022-09-07 02:07:37'),
(4, 'BM004', 5, 900, '2022-09-07 02:28:31', '2022-09-07 02:28:31');

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
(1, 'admin', 'admin@gmail.com', NULL, '$2y$10$d92JGm20lEaNwsinkKGOIOcFlwGoc53GOPdYNpWxD4M1M2nWm8zbS', NULL, '2022-07-27 07:58:10', '2022-07-27 07:58:10'),
(2, 'maulana', 'maulana@sr.com', NULL, '$2y$10$YSNq1QytiflGV7bZ3k/mfe0xd4WeaWUpDRL1vZmwAA2ZzfPNx4vxa', NULL, '2022-08-20 00:50:59', '2022-08-20 00:50:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `datapart`
--
ALTER TABLE `datapart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kensa`
--
ALTER TABLE `kensa`
  ADD PRIMARY KEY (`kensa_id`),
  ADD KEY `no_part` (`no_part`);

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
-- Indexes for table `plating`
--
ALTER TABLE `plating`
  ADD PRIMARY KEY (`plating_id`);

--
-- Indexes for table `stok`
--
ALTER TABLE `stok`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stokin`
--
ALTER TABLE `stokin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_datapart` (`id_datapart`);

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
-- AUTO_INCREMENT for table `datapart`
--
ALTER TABLE `datapart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kensa`
--
ALTER TABLE `kensa`
  MODIFY `kensa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `masterdata`
--
ALTER TABLE `masterdata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=263;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `plating`
--
ALTER TABLE `plating`
  MODIFY `plating_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `stok`
--
ALTER TABLE `stok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `stokin`
--
ALTER TABLE `stokin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `stokin`
--
ALTER TABLE `stokin`
  ADD CONSTRAINT `stokin_ibfk_1` FOREIGN KEY (`id_datapart`) REFERENCES `datapart` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
