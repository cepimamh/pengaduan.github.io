-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2021 at 01:14 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laporan_pengaduan_masyarakat`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `daftar_pengaduan` ()  BEGIN
	SELECT
  `pengaduan`.`id_pengaduan`     AS `id_pengaduan`,
  `pengaduan`.`subjek_pengaduan` AS `subjek_pengaduan`,
  `pengaduan`.`tgl_pengaduan`    AS `tgl_pengaduan`,
  `users`.`nama`            AS `nama`,
  `tanggapan`.`pengirim`            AS `pengirim`,
  `tanggapan`.`tgl_tanggapan`    AS `tgl_tanggapan`,
  `tanggapan`.`id_tanggapan`     AS `id_tanggapan`,
  `pengaduan`.`statuss`          AS `statuss`
FROM ((`pengaduan`
    JOIN `users`)
   JOIN `tanggapan`)
WHERE `users`.`nik` = `pengaduan`.`nik`
    AND `tanggapan`.`id_pengaduan` = `pengaduan`.`id_pengaduan`
    AND `pengaduan`.`statuss` = 'selesai';

	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_pengguna` ()  BEGIN
	SELECT
  `masyarakat`.`nik`         	AS `nik`,
  `masyarakat`.`nama`         	AS `nama`,
  `masyarakat`.`telp`         	AS `telp`,
  `pengaduan`.`id_pengaduan`  	AS `id_pengaduan`,
  `pengaduan`.`tgl_pengaduan` 	AS `tgl_pengaduan`,
  `pengaduan`.`subjek_pengaduan` 	AS `subjek_pengaduan`,
  `pengaduan`.`isi_laporan`   	AS `isi_laporan`,
  `pengaduan`.`foto`          	AS `foto`,
  `pengaduan`.`statuss`        	AS `statuss`,
  `tanggapan`.`id_tanggapan`  	AS `id_tanggapan`,
  `tanggapan`.`tgl_tanggapan` 	AS `tgl_tanggapan`,
  `tanggapan`.`tanggapan`     	AS `tanggapan`,
  `petugas`.`id_petugas`      	AS `id_petugas`,
  `petugas`.`nama_petugas`    	AS `nama_petugas`,
  `petugas`.`level`    	AS `level`
FROM (((`pengaduan`
     LEFT JOIN `masyarakat`
       ON (`pengaduan`.`nik` = `masyarakat`.`nik`))
    LEFT JOIN `tanggapan`
      ON (`tanggapan`.`id_pengaduan` = `pengaduan`.`id_pengaduan`))
   LEFT JOIN `petugas`
     ON (`petugas`.`id_petugas` = `tanggapan`.`id_petugas`));


	END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `admin_cetak_bukti_pengaduan`
-- (See below for the actual view)
--
CREATE TABLE `admin_cetak_bukti_pengaduan` (
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `admin_cetak_daftar_pengaduan`
-- (See below for the actual view)
--
CREATE TABLE `admin_cetak_daftar_pengaduan` (
`nama` varchar(255)
,`nik` varchar(255)
,`email` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `admin_daftar_pengaduan`
-- (See below for the actual view)
--
CREATE TABLE `admin_daftar_pengaduan` (
`id_pengaduan` int(11)
,`subjek_pengaduan` varchar(100)
,`tgl_pengaduan` date
,`nama` varchar(35)
,`tgl_tanggapan` date
,`id_tanggapan` int(11)
,`statuss` enum('0','proses','selesai')
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `admin_daftar_petugas`
-- (See below for the actual view)
--
CREATE TABLE `admin_daftar_petugas` (
`id_petugas` int(11)
,`nama_petugas` varchar(35)
,`telp` varchar(13)
,`level` varchar(1)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `admin_pesan_belum_dibaca`
-- (See below for the actual view)
--
CREATE TABLE `admin_pesan_belum_dibaca` (
`belum_dibaca` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `admin_pesan_total_pengaduan`
-- (See below for the actual view)
--
CREATE TABLE `admin_pesan_total_pengaduan` (
`Count(*)` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `admin_tabel_pengaduan_baru`
-- (See below for the actual view)
--
CREATE TABLE `admin_tabel_pengaduan_baru` (
`id_pengaduan` int(11)
,`subjek_pengaduan` varchar(100)
,`tgl_pengaduan` date
,`nama` varchar(35)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `admin_total_user_masyarakat`
-- (See below for the actual view)
--
CREATE TABLE `admin_total_user_masyarakat` (
`COUNT(*)` bigint(21)
);

-- --------------------------------------------------------

--
-- Table structure for table `auth_activation_attempts`
--

CREATE TABLE `auth_activation_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups`
--

CREATE TABLE `auth_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_groups`
--

INSERT INTO `auth_groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'administrator'),
(2, 'petugas', 'petugas'),
(3, 'user', 'regular user');

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups_permissions`
--

CREATE TABLE `auth_groups_permissions` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups_users`
--

CREATE TABLE `auth_groups_users` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_groups_users`
--

INSERT INTO `auth_groups_users` (`group_id`, `user_id`) VALUES
(1, 11),
(1, 11),
(2, 26),
(3, 29);

-- --------------------------------------------------------

--
-- Table structure for table `auth_logins`
--

CREATE TABLE `auth_logins` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_logins`
--

INSERT INTO `auth_logins` (`id`, `ip_address`, `email`, `user_id`, `date`, `success`) VALUES
(1, '::1', 'Admin@gmail.com', 1, '2021-03-26 08:51:12', 1),
(2, '::1', 'Admin@gmail.com', 1, '2021-03-26 09:10:09', 1),
(3, '::1', 'megumin585@gmail.com', 2, '2021-03-26 09:12:05', 1),
(4, '::1', 'Admin@gmail.com', 1, '2021-03-26 09:20:46', 1),
(5, '::1', 'megumin585@gmail.com', 2, '2021-03-26 09:25:39', 1),
(6, '::1', 'Admin@gmail.com', NULL, '2021-03-26 09:45:12', 0),
(7, '::1', 'Admin@gmail.com', NULL, '2021-03-26 09:45:19', 0),
(8, '::1', 'Admin@gmail.com', 1, '2021-03-26 09:45:26', 1),
(9, '::1', 'Admin@gmail.com', NULL, '2021-03-26 09:47:57', 0),
(10, '::1', 'Admin@gmail.com', 1, '2021-03-26 09:48:03', 1),
(11, '::1', 'megumin585@gmail.com', 2, '2021-03-26 09:56:16', 1),
(12, '::1', 'Admin@gmail.com', 1, '2021-03-26 20:18:27', 1),
(13, '::1', 'Admin@gmail.com', 1, '2021-03-26 20:23:07', 1),
(14, '::1', 'megumin585@gmail.com', 2, '2021-03-26 20:23:20', 1),
(15, '::1', 'Admin@gmail.com', 1, '2021-03-26 20:59:18', 1),
(16, '::1', 'Admin@gmail.com', 4, '2021-03-27 00:54:33', 1),
(17, '::1', 'Admin@gmail.com', 4, '2021-03-27 00:54:46', 1),
(18, '::1', 'Admin@gmail.com', 5, '2021-03-27 00:58:19', 1),
(19, '::1', 'Admin@gmail.com', 5, '2021-03-27 00:58:20', 1),
(20, '::1', 'cepimamh@gmail.com', 13, '2021-03-27 01:19:48', 1),
(21, '::1', 'megumin585@gmail.com', 11, '2021-03-27 01:48:16', 1),
(22, '::1', 'mamanfirdanshyah@gmail.com', NULL, '2021-03-27 01:51:23', 0),
(23, '::1', 'cepimamh@gmail.com', NULL, '2021-03-27 01:52:28', 0),
(24, '::1', 'Admin@gmail.com', NULL, '2021-03-27 01:52:39', 0),
(25, '::1', 'cepimamh@gmail.com', NULL, '2021-03-27 01:56:02', 0),
(26, '::1', 'cepimamh@gmail.com', 13, '2021-03-27 01:56:11', 1),
(27, '::1', 'cepimamh@gmail.com', 13, '2021-03-27 02:07:58', 1),
(28, '::1', 'megumin585@gmail.com', 11, '2021-03-27 02:24:38', 1),
(29, '::1', 'megumin585@gmail.com', NULL, '2021-03-27 07:40:21', 0),
(30, '::1', 'megumin585@gmail.com', 11, '2021-03-27 07:40:38', 1),
(31, '::1', 'megumin585@gmail.com', NULL, '2021-03-27 07:51:58', 0),
(32, '::1', 'megumin585@gmail.com', 11, '2021-03-27 07:52:18', 1),
(33, '::1', 'cepimamh@gmail.com', NULL, '2021-03-27 08:10:49', 0),
(34, '::1', 'cepimamh@gmail.com', 13, '2021-03-27 08:11:00', 1),
(35, '::1', 'megumin585@gmail.com', NULL, '2021-03-27 08:13:26', 0),
(36, '::1', 'megumin585@gmail.com', 11, '2021-03-27 08:13:36', 1),
(37, '::1', 'megumin585@gmail.com', NULL, '2021-03-27 09:46:23', 0),
(38, '::1', 'megumin585@gmail.com', 11, '2021-03-27 09:46:34', 1),
(39, '::1', 'cepimamh@gmail.com', NULL, '2021-03-27 09:51:03', 0),
(40, '::1', 'cepimamh@gmail.com', 13, '2021-03-27 09:51:20', 1),
(41, '::1', 'megumin585@gmail.com', 11, '2021-03-27 09:53:40', 1),
(42, '::1', 'megumin585@gmail.com', 11, '2021-03-28 08:37:08', 1),
(43, '::1', 'megumin585@gmail.com', 11, '2021-03-28 08:38:24', 1),
(44, '::1', 'dada@gmail.com', 16, '2021-03-28 09:09:25', 1),
(45, '::1', 'megumin585@gmail.com', 11, '2021-03-28 09:10:09', 1),
(46, '::1', 'megumin585@gmail.com', 11, '2021-03-28 19:27:04', 1),
(47, '::1', 'cepimamh@gmail.com', NULL, '2021-03-28 19:34:58', 0),
(48, '::1', 'cepimamh@gmail.com', 16, '2021-03-28 19:35:11', 1),
(49, '::1', 'ikaruga1710@gmail.com', NULL, '2021-03-28 19:37:08', 0),
(50, '::1', 'ikaruga1710@gmail.com', NULL, '2021-03-28 19:37:18', 0),
(51, '::1', 'megumin585@gmail.com', 11, '2021-03-28 19:40:09', 1),
(52, '::1', 'cepimamh@gmail.com', 18, '2021-03-28 20:15:32', 1),
(53, '::1', 'megumin585@gmail.com', NULL, '2021-03-28 20:26:51', 0),
(54, '::1', 'megumin585@gmail.com', 11, '2021-03-28 20:27:00', 1),
(55, '::1', 'cepimamh@gmail.com', 18, '2021-03-28 20:30:06', 1),
(56, '::1', 'megumin585@gmail.com', NULL, '2021-03-28 20:30:35', 0),
(57, '::1', 'cepimamh@gmail.com', NULL, '2021-03-28 20:30:50', 0),
(58, '::1', 'megumin585@gmail.com', NULL, '2021-03-28 20:31:30', 0),
(59, '::1', 'megumin585@gmail.com', 11, '2021-03-28 20:31:54', 1),
(60, '::1', 'megumin585@gmail.com', 11, '2021-03-28 21:27:55', 1),
(61, '::1', 'cepimamh@gmail.com', 18, '2021-03-29 00:20:32', 1),
(62, '::1', 'megumin585@gmail.com', NULL, '2021-03-29 00:24:02', 0),
(63, '::1', 'megumin585@gmail.com', 11, '2021-03-29 00:24:47', 1),
(64, '::1', 'cepimamh@gmail.com', 18, '2021-03-29 00:25:06', 1),
(65, '::1', 'megumin585@gmail.com', 11, '2021-03-29 00:26:31', 1),
(66, '::1', 'megumin585@gmail.com', 11, '2021-03-29 06:28:19', 1),
(67, '::1', 'megumin585@gmail.com', 11, '2021-03-29 19:36:54', 1),
(68, '::1', 'mamanfirdanshyah@gmail.com', 19, '2021-03-29 19:42:54', 1),
(69, '::1', 'mamanfirdanshyah@gmail.com', 19, '2021-03-29 19:44:07', 1),
(70, '::1', 'megumin585@gmail.com', NULL, '2021-03-29 21:05:21', 0),
(71, '::1', 'megumin585@gmail.com', 11, '2021-03-29 21:05:52', 1),
(72, '::1', 'megumin585@gmail.com', 11, '2021-03-30 19:06:37', 1),
(73, '::1', 'ikaruga1710@gmail.com', NULL, '2021-03-30 19:38:09', 0),
(74, '::1', 'ikaruga1710@gmail.com', 15, '2021-03-30 19:38:21', 1),
(75, '::1', 'megumin585@gmail.com', 11, '2021-03-30 19:38:54', 1),
(76, '::1', 'Admin@gmail.com', 21, '2021-03-30 20:29:43', 1),
(77, '::1', 'megumin585@gmail.com', 11, '2021-03-30 20:30:03', 1),
(78, '::1', 'Admin@gmail.com', NULL, '2021-03-30 20:43:02', 0),
(79, '::1', 'Admin@gmail.com', 20, '2021-03-30 20:43:16', 1),
(80, '::1', 'megumin585@gmail.com', 11, '2021-03-30 20:44:29', 1),
(81, '::1', 'cepimamh@gmail.com', 18, '2021-03-30 22:04:35', 1),
(82, '::1', 'ikaruga1710@gmail.com', 15, '2021-03-30 22:05:34', 1),
(83, '::1', 'megumin585@gmail.com', 11, '2021-03-31 05:28:25', 1),
(84, '::1', 'cepimamh@gmail.com', 18, '2021-03-31 05:37:51', 1),
(85, '::1', 'megumin585@gmail.com', 11, '2021-03-31 18:05:36', 1),
(86, '::1', 'cepimamh@gmail.com', 18, '2021-03-31 18:12:16', 1),
(87, '::1', 'mamanfirdanshyah@gmail.com', NULL, '2021-03-31 18:13:26', 0),
(88, '::1', 'mamanfirdanshyah@gmail.com', NULL, '2021-03-31 18:13:42', 0),
(89, '::1', 'mamanfirdanshyah@gmail.com', 20, '2021-03-31 18:13:50', 1),
(90, '::1', 'ikaruga1710@gmail.com', 15, '2021-03-31 18:15:36', 1),
(91, '::1', 'cepimamh@gmail.com', 18, '2021-03-31 19:44:28', 1),
(92, '::1', 'megumin585@gmail.com', NULL, '2021-03-31 20:02:49', 0),
(93, '::1', 'megumin585@gmail.com', 11, '2021-03-31 20:02:58', 1),
(94, '::1', 'cepimamh@gmail.com', 18, '2021-03-31 20:05:02', 1),
(95, '::1', 'megumin585@gmail.com', 11, '2021-03-31 20:19:47', 1),
(96, '::1', 'cepimamh@gmail.com', 18, '2021-03-31 21:17:22', 1),
(97, '::1', 'cepimamh@gmail.com', 18, '2021-03-31 21:17:23', 1),
(98, '::1', 'megumin585@gmail.com', 11, '2021-03-31 21:18:20', 1),
(99, '::1', 'Admin@gmail.com', 22, '2021-03-31 22:45:07', 1),
(100, '::1', 'Petugas@gmail.com', 23, '2021-03-31 23:14:37', 1),
(101, '::1', 'Admin@gmail.com', 22, '2021-03-31 23:17:09', 1),
(102, '::1', 'Petugas@gmail.com', 23, '2021-03-31 23:17:34', 1),
(103, '::1', 'megumin585@gmail.com', 11, '2021-04-01 06:01:16', 1),
(104, '::1', 'megumin585@gmail.com', 11, '2021-04-01 19:38:35', 1),
(105, '::1', 'megumin585@gmail.com', 11, '2021-04-01 22:43:00', 1),
(106, '::1', 'megumin585@gmail.com', 11, '2021-04-02 00:37:33', 1),
(107, '::1', 'megumin585@gmail.com', 11, '2021-04-02 06:18:26', 1),
(108, '::1', 'cepimamh@gmail.com', NULL, '2021-04-02 07:48:28', 0),
(109, '::1', 'megumin585@gmail.com', 11, '2021-04-02 18:07:10', 1),
(110, '::1', 'mamanfirdanshyah@gmail.com', NULL, '2021-04-02 18:17:16', 0),
(111, '::1', 'mamanfirdanshyah@gmail.com', NULL, '2021-04-02 18:17:29', 0),
(112, '::1', 'mamanfirdanshyah@gmail.com', NULL, '2021-04-02 18:18:11', 0),
(113, '::1', 'mamanfirdanshyah@gmail.com', 20, '2021-04-02 18:18:29', 1),
(114, '::1', 'ikaruga1710@gmail.com', 24, '2021-04-02 18:37:24', 1),
(115, '::1', 'mamanfirdanshyah@gmail.com', 20, '2021-04-02 21:06:40', 1),
(116, '::1', 'mamanfirdanshyah@gmail.com', NULL, '2021-04-02 21:21:17', 0),
(117, '::1', 'mamanfirdanshyah@gmail.com', NULL, '2021-04-02 21:21:26', 0),
(118, '::1', 'mamanfirdanshyah@gmail.com', 20, '2021-04-02 21:21:34', 1),
(119, '::1', 'megumin585@gmail.com', 11, '2021-04-02 21:22:27', 1),
(120, '::1', 'ikaruga1710@gmail.com', 24, '2021-04-02 21:35:27', 1),
(121, '::1', 'megumin585@gmail.com', NULL, '2021-04-03 03:18:22', 0),
(122, '::1', 'megumin585@gmail.com', 11, '2021-04-03 03:18:34', 1),
(123, '::1', 'megumin585@gmail.com', 11, '2021-04-03 04:00:59', 1),
(124, '::1', 'ikaruga1710@gmail.com', 24, '2021-04-03 04:58:29', 1),
(125, '::1', 'megumin585@gmail.com', 11, '2021-04-03 05:01:11', 1),
(126, '::1', 'Ryomen Sukuna', NULL, '2021-04-03 05:08:31', 0),
(127, '::1', 'mamanfirdanshyah@gmail.com', NULL, '2021-04-03 05:08:53', 0),
(128, '::1', 'mamanfirdanshyah@gmail.com', 20, '2021-04-03 05:09:02', 1),
(129, '::1', 'ikaruga1710@gmail.com', 24, '2021-04-03 06:35:18', 1),
(130, '::1', 'mamanfirdanshyah@gmail.com', 20, '2021-04-03 06:35:51', 1),
(131, '::1', 'megumin585@gmail.com', 11, '2021-04-03 13:50:24', 1),
(132, '::1', 'megumin585@gmail.com', 11, '2021-04-03 13:56:10', 1),
(133, '::1', 'megumin585@gmail.com', 11, '2021-04-04 16:13:19', 1),
(134, '::1', 'megumin585@gmail.com', 11, '2021-04-04 19:25:20', 1),
(135, '::1', 'cepimamh@gmail.com', 27, '2021-04-04 20:15:57', 1),
(136, '::1', 'cepimamh@gmail.com', NULL, '2021-04-04 21:16:53', 0),
(137, '::1', 'cepimamh@gmail.com', 27, '2021-04-04 21:17:11', 1),
(138, '::1', 'cepimamh@gmail.com', 27, '2021-04-04 22:09:04', 1),
(139, '::1', 'ikaruga1710@gmail.com', 28, '2021-04-04 22:28:19', 1),
(140, '::1', 'mamanfirdanshyah@gmail.com', 26, '2021-04-04 22:41:08', 1),
(141, '::1', 'megumin585@gmail.com', 11, '2021-04-04 22:43:31', 1),
(142, '::1', 'megumin585@gmail.com', 11, '2021-04-04 23:18:26', 1),
(143, '::1', 'ikaruga1710@gmail.com', 28, '2021-04-04 23:29:43', 1),
(144, '::1', 'megumin585@gmail.com', 11, '2021-04-04 23:32:44', 1),
(145, '::1', 'ikaruga1710@gmail.com', 28, '2021-04-04 23:38:23', 1),
(146, '::1', 'megumin585@gmail.com', 11, '2021-04-04 23:39:13', 1),
(147, '::1', 'megumin585@gmail.com', 11, '2021-04-05 06:40:29', 1),
(148, '::1', 'megumin585@gmail.com', 11, '2021-04-05 06:50:18', 1),
(149, '::1', 'megumin585@gmail.com', 11, '2021-04-06 07:17:59', 1),
(150, '::1', 'ikaruga1710@gmail.com', 28, '2021-04-06 07:19:02', 1),
(151, '::1', 'megumin585@gmail.com', 11, '2021-04-06 18:44:40', 1),
(152, '::1', 'ikaruga1710@gmail.com', NULL, '2021-04-06 20:40:49', 0),
(153, '::1', 'ikaruga1710@gmail.com', NULL, '2021-04-06 20:42:17', 0),
(154, '::1', 'ikaruga1710@gmail.com', 28, '2021-04-06 20:42:30', 1),
(155, '::1', 'mamanfirdanshyah@gmail.com', 26, '2021-04-06 21:01:58', 1),
(156, '::1', 'cepimamh@gmail.com', 27, '2021-04-06 21:03:15', 1),
(157, '::1', 'megumin585@gmail.com', 11, '2021-04-06 21:06:20', 1),
(158, '::1', 'ikaruga1710@gmail.com', 29, '2021-04-06 21:35:49', 1),
(159, '::1', 'mamanfirdanshyah@gmail.com', 26, '2021-04-06 21:37:30', 1),
(160, '::1', 'megumin585@gmail.com', 11, '2021-04-06 21:38:01', 1),
(161, '::1', 'ikaruga1710@gmail.com', 29, '2021-04-06 21:39:14', 1),
(162, '::1', 'megumin585@gmail.com', 11, '2021-04-06 21:40:06', 1),
(163, '::1', 'ikaruga1710@gmail.com', 29, '2021-04-06 21:40:53', 1),
(164, '::1', 'megumin585@gmail.com', 11, '2021-04-06 21:41:35', 1),
(165, '::1', 'megumin585@gmail.com', NULL, '2021-05-12 06:06:18', 0),
(166, '::1', 'cepimamh@gmail.com', NULL, '2021-05-12 06:07:34', 0),
(167, '::1', 'cepimamh@gmail.com', 27, '2021-05-12 06:07:50', 1),
(168, '::1', 'megumin585@gmail.com', NULL, '2021-05-12 06:08:11', 0),
(169, '::1', 'mamanfirdanshyah@gmail.com', 26, '2021-05-12 06:08:17', 1),
(170, '::1', 'ikaruga1710@gmail.com', 29, '2021-05-12 06:08:37', 1),
(171, '::1', 'megumin585@gmail.com', NULL, '2021-05-12 06:09:39', 0),
(172, '::1', 'megumin585@gmail.com', 11, '2021-05-12 06:09:56', 1),
(173, '::1', 'mamanfirdanshyah@gmail.com', 26, '2021-05-12 06:11:56', 1),
(174, '::1', 'ikaruga1710@gmail.com', 29, '2021-05-12 06:12:13', 1),
(175, '::1', 'megumin585@gmail.com', 11, '2021-05-12 06:12:29', 1);

-- --------------------------------------------------------

--
-- Table structure for table `auth_permissions`
--

CREATE TABLE `auth_permissions` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_permissions`
--

INSERT INTO `auth_permissions` (`id`, `name`, `description`) VALUES
(1, 'manage-admin', 'manage-admin'),
(2, 'manage-petugas', 'manage-petugas'),
(3, 'manage-user', 'manage-user');

-- --------------------------------------------------------

--
-- Table structure for table `auth_reset_attempts`
--

CREATE TABLE `auth_reset_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_reset_attempts`
--

INSERT INTO `auth_reset_attempts` (`id`, `email`, `ip_address`, `user_agent`, `token`, `created_at`) VALUES
(1, 'megumin585@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.90 Safari/537.36 Edg/89.0.774.57', 'a6f6cc27abfef548ff9bc8e33fa1b0e6', '2021-03-27 01:47:53'),
(2, 'cepimamh@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.90 Safari/537.36 Edg/89.0.774.57', '6cfe90cae0befb90fa49eaff25d2d92a', '2021-03-27 01:55:52'),
(3, 'megumin585@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.90 Safari/537.36 Edg/89.0.774.57', 'a74791c2ff9ffc687aea033033d5ddcf', '2021-03-27 07:51:21'),
(4, 'cepimamh@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.90 Safari/537.36 Edg/89.0.774.57', '6f31321eb0db4501fc73d82cc0e9d423', '2021-03-28 20:25:27'),
(5, 'cepimamh@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.90 Safari/537.36 Edg/89.0.774.57', 'e927e553cab6abdac7188f50bfad1b7e', '2021-03-28 20:29:57');

-- --------------------------------------------------------

--
-- Table structure for table `auth_tokens`
--

CREATE TABLE `auth_tokens` (
  `id` int(11) UNSIGNED NOT NULL,
  `selector` varchar(255) NOT NULL,
  `hashedValidator` varchar(255) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `expires` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_users_permissions`
--

CREATE TABLE `auth_users_permissions` (
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `masyarakat`
--

CREATE TABLE `masyarakat` (
  `nik` char(16) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(32) NOT NULL,
  `telp` varchar(13) NOT NULL,
  `level` varchar(1) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `masyarakat`
--

INSERT INTO `masyarakat` (`nik`, `nama`, `username`, `password`, `telp`, `level`, `email`) VALUES
('3276046501920001', 'imam H', 'asdad', '1', '085523844630', '3', 'petugas@gmail.com'),
('3276046501920003', 'Cep Imam ', 'Cep imam h', '1', '085523844630', '3', 'megumin585@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` text NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2017-11-20-223112', 'Myth\\Auth\\Database\\Migrations\\CreateAuthTables', 'default', 'Myth\\Auth', 1616765800, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pengaduan`
--

CREATE TABLE `pengaduan` (
  `id_pengaduan` int(11) NOT NULL,
  `tgl_pengaduan` date NOT NULL,
  `nik` char(16) DEFAULT NULL,
  `isi_laporan` text NOT NULL,
  `foto` varchar(255) NOT NULL,
  `statuss` enum('0','proses','selesai') NOT NULL,
  `subjek_pengaduan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengaduan`
--

INSERT INTO `pengaduan` (`id_pengaduan`, `tgl_pengaduan`, `nik`, `isi_laporan`, `foto`, `statuss`, `subjek_pengaduan`) VALUES
(46, '2021-04-06', '4567893876378355', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'pohon tumbang_1.jpg', 'selesai', 'pohon tumbang'),
(47, '2021-04-06', '4567893876378355', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'jalan.jpg', 'selesai', 'Jalan Berlubang');

-- --------------------------------------------------------

--
-- Stand-in structure for view `pengguna`
-- (See below for the actual view)
--
CREATE TABLE `pengguna` (
);

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(11) NOT NULL,
  `nama_petugas` varchar(35) NOT NULL,
  `username` varchar(25) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(32) NOT NULL,
  `telp` varchar(13) NOT NULL,
  `level` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `nama_petugas`, `username`, `email`, `password`, `telp`, `level`) VALUES
(1, 'cep imam', 'admin', 'admin@gmail.com', 'admin', '085523844630', '1'),
(2, 'imam', 'imam', 'petugas@gmail.com', '1', '085523844630', '2');

-- --------------------------------------------------------

--
-- Table structure for table `tanggapan`
--

CREATE TABLE `tanggapan` (
  `id_tanggapan` int(11) NOT NULL,
  `id_pengaduan` int(11) NOT NULL,
  `tgl_tanggapan` date NOT NULL,
  `tanggapan` text NOT NULL,
  `pengirim` varchar(255) NOT NULL,
  `foto` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tanggapan`
--

INSERT INTO `tanggapan` (`id_tanggapan`, `id_pengaduan`, `tgl_tanggapan`, `tanggapan`, `pengirim`, `foto`) VALUES
(30, 40, '2021-04-04', 'hh', 'Cep Imam H', ''),
(31, 39, '2021-04-04', 'dssc', 'Cep Imam H', ''),
(34, 42, '2021-04-04', 'dada', 'Cep Imam H', 'Screenshot (64)_4.png'),
(35, 43, '2021-04-04', 'ghyd', 'Cep Imam H', 'Screenshot (138).png'),
(36, 44, '2021-04-04', 'wdd', 'Cep Imam H', 'IMG-20200802-WA0035.jpg'),
(37, 46, '2021-04-06', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Cep Imam H', 'after.jpg'),
(38, 47, '2021-04-06', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Cep Imam H', 'after_1.jpg');

--
-- Triggers `tanggapan`
--
DELIMITER $$
CREATE TRIGGER `proses` AFTER DELETE ON `tanggapan` FOR EACH ROW BEGIN
UPDATE pengaduan SET statuss = "proses" WHERE id_pengaduan=old.id_pengaduan;
    END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `status` AFTER INSERT ON `tanggapan` FOR EACH ROW BEGIN
	UPDATE pengaduan SET statuss = "selesai" WHERE id_pengaduan=new.id_pengaduan;
    END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `telp` varchar(255) DEFAULT NULL,
  `nik` varchar(255) DEFAULT NULL,
  `password_hash` varchar(255) NOT NULL,
  `reset_hash` varchar(255) DEFAULT NULL,
  `reset_at` datetime DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL,
  `activate_hash` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `force_pass_reset` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `nama`, `telp`, `nik`, `password_hash`, `reset_hash`, `reset_at`, `reset_expires`, `activate_hash`, `status`, `status_message`, `active`, `force_pass_reset`, `created_at`, `updated_at`, `deleted_at`) VALUES
(11, 'megumin585@gmail.com', 'Administrator', 'Cep Imam H', '085523844630', '3211031710020004', '$2y$10$XOABVKrzsI.XbWXCzNuHuOS2gEsOkSSv/rMb7BxroWRKWk8mKH2bO', '62d4743a9480da05c848131467b99dee', '2021-03-27 07:51:23', '2021-03-28 21:08:47', NULL, NULL, NULL, 1, 0, '2021-03-27 01:15:51', '2021-03-28 20:08:47', NULL),
(26, 'mamanfirdanshyah@gmail.com', 'James', 'Lebron James', '085523844630', '3211031710020075', '$2y$10$IT9dwJGwA53gPRzdAsrZbeN/ZsuGRnEsYKoxEK2a5tCdsEAkBCiXq', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-04-04 19:30:49', '2021-04-04 19:30:49', NULL),
(29, 'ikaruga1710@gmail.com', 'cep imam', 'Cep Imam Hidayattulloh', '085523844630', '4567893876378355', '$2y$10$14sXgS3gkRIs0oTsrSjJrejLB8zWtOOuMaIJkcYxhEf2LbzzEp.XK', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-04-06 21:35:41', '2021-04-06 21:35:41', NULL);

-- --------------------------------------------------------

--
-- Structure for view `admin_cetak_bukti_pengaduan`
--
DROP TABLE IF EXISTS `admin_cetak_bukti_pengaduan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `admin_cetak_bukti_pengaduan`  AS  (select `masyarakat`.`nama` AS `nama`,`pengaduan`.`tgl_pengaduan` AS `tgl_pengaduan`,`pengaduan`.`subjek_pengaduan` AS `subjek_pengaduan`,`pengaduan`.`isi_laporan` AS `isi_laporan`,`petugas`.`nama_petugas` AS `nama_petugas`,`tanggapan`.`tgl_tanggapan` AS `tgl_tanggapan`,`pengaduan`.`statuss` AS `statuss`,`tanggapan`.`tanggapan` AS `tanggapan` from (((`pengaduan` join `masyarakat`) join `tanggapan`) join `petugas`) where `masyarakat`.`nik` = `pengaduan`.`nik` and `tanggapan`.`id_pengaduan` = `pengaduan`.`id_pengaduan` and `tanggapan`.`id_petugas` = `petugas`.`id_petugas` and `pengaduan`.`id_pengaduan` <> 0) ;

-- --------------------------------------------------------

--
-- Structure for view `admin_cetak_daftar_pengaduan`
--
DROP TABLE IF EXISTS `admin_cetak_daftar_pengaduan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `admin_cetak_daftar_pengaduan`  AS  (select `users`.`nama` AS `nama`,`users`.`nik` AS `nik`,`users`.`email` AS `email` from `users`) ;

-- --------------------------------------------------------

--
-- Structure for view `admin_daftar_pengaduan`
--
DROP TABLE IF EXISTS `admin_daftar_pengaduan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `admin_daftar_pengaduan`  AS  (select `pengaduan`.`id_pengaduan` AS `id_pengaduan`,`pengaduan`.`subjek_pengaduan` AS `subjek_pengaduan`,`pengaduan`.`tgl_pengaduan` AS `tgl_pengaduan`,`masyarakat`.`nama` AS `nama`,`tanggapan`.`tgl_tanggapan` AS `tgl_tanggapan`,`tanggapan`.`id_tanggapan` AS `id_tanggapan`,`pengaduan`.`statuss` AS `statuss` from ((`pengaduan` join `masyarakat`) join `tanggapan`) where `masyarakat`.`nik` = `pengaduan`.`nik` and `tanggapan`.`id_pengaduan` = `pengaduan`.`id_pengaduan` and `pengaduan`.`statuss` = 'selesai') ;

-- --------------------------------------------------------

--
-- Structure for view `admin_daftar_petugas`
--
DROP TABLE IF EXISTS `admin_daftar_petugas`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `admin_daftar_petugas`  AS  (select `petugas`.`id_petugas` AS `id_petugas`,`petugas`.`nama_petugas` AS `nama_petugas`,`petugas`.`telp` AS `telp`,`petugas`.`level` AS `level` from `petugas`) ;

-- --------------------------------------------------------

--
-- Structure for view `admin_pesan_belum_dibaca`
--
DROP TABLE IF EXISTS `admin_pesan_belum_dibaca`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `admin_pesan_belum_dibaca`  AS  (select count(`pengaduan`.`id_pengaduan`) AS `belum_dibaca` from `pengaduan` where `pengaduan`.`statuss` = '0') ;

-- --------------------------------------------------------

--
-- Structure for view `admin_pesan_total_pengaduan`
--
DROP TABLE IF EXISTS `admin_pesan_total_pengaduan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `admin_pesan_total_pengaduan`  AS  (select count(0) AS `Count(*)` from `pengaduan`) ;

-- --------------------------------------------------------

--
-- Structure for view `admin_tabel_pengaduan_baru`
--
DROP TABLE IF EXISTS `admin_tabel_pengaduan_baru`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `admin_tabel_pengaduan_baru`  AS  (select `pengaduan`.`id_pengaduan` AS `id_pengaduan`,`pengaduan`.`subjek_pengaduan` AS `subjek_pengaduan`,`pengaduan`.`tgl_pengaduan` AS `tgl_pengaduan`,`masyarakat`.`nama` AS `nama` from (`pengaduan` join `masyarakat` on(`masyarakat`.`nik` = `pengaduan`.`nik`)) where `pengaduan`.`statuss` = '0') ;

-- --------------------------------------------------------

--
-- Structure for view `admin_total_user_masyarakat`
--
DROP TABLE IF EXISTS `admin_total_user_masyarakat`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `admin_total_user_masyarakat`  AS  (select count(0) AS `COUNT(*)` from `masyarakat`) ;

-- --------------------------------------------------------

--
-- Structure for view `pengguna`
--
DROP TABLE IF EXISTS `pengguna`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `pengguna`  AS  (select `masyarakat`.`nik` AS `nik`,`masyarakat`.`nama` AS `nama`,`masyarakat`.`telp` AS `telp`,`pengaduan`.`id_pengaduan` AS `id_pengaduan`,`pengaduan`.`subjek_pengaduan` AS `subjek_pengaduan`,`pengaduan`.`tgl_pengaduan` AS `tgl_pengaduan`,`pengaduan`.`isi_laporan` AS `isi_laporan`,`pengaduan`.`foto` AS `foto`,`pengaduan`.`statuss` AS `statuss`,`tanggapan`.`id_tanggapan` AS `id_tanggapan`,`tanggapan`.`tgl_tanggapan` AS `tgl_tanggapan`,`tanggapan`.`tanggapan` AS `tanggapan`,`petugas`.`id_petugas` AS `id_petugas`,`petugas`.`nama_petugas` AS `nama_petugas`,`petugas`.`level` AS `level` from (((`masyarakat` left join `pengaduan` on(`masyarakat`.`nik` = `pengaduan`.`nik`)) left join `tanggapan` on(`tanggapan`.`id_pengaduan` = `pengaduan`.`id_pengaduan`)) left join `petugas` on(`petugas`.`id_petugas` = `tanggapan`.`id_petugas`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_groups`
--
ALTER TABLE `auth_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD KEY `auth_groups_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `group_id_permission_id` (`group_id`,`permission_id`);

--
-- Indexes for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD KEY `auth_groups_users_user_id_foreign` (`user_id`),
  ADD KEY `group_id_user_id` (`group_id`,`user_id`);

--
-- Indexes for table `auth_logins`
--
ALTER TABLE `auth_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `auth_permissions`
--
ALTER TABLE `auth_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_tokens_user_id_foreign` (`user_id`),
  ADD KEY `selector` (`selector`);

--
-- Indexes for table `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD KEY `auth_users_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `user_id_permission_id` (`user_id`,`permission_id`);

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
-- Indexes for table `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`id_pengaduan`),
  ADD UNIQUE KEY `id_pengaduan` (`id_pengaduan`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indexes for table `tanggapan`
--
ALTER TABLE `tanggapan`
  ADD PRIMARY KEY (`id_tanggapan`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_groups`
--
ALTER TABLE `auth_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `auth_logins`
--
ALTER TABLE `auth_logins`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=176;

--
-- AUTO_INCREMENT for table `auth_permissions`
--
ALTER TABLE `auth_permissions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `id_pengaduan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `tanggapan`
--
ALTER TABLE `tanggapan`
  MODIFY `id_tanggapan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD CONSTRAINT `auth_groups_permissions_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD CONSTRAINT `auth_groups_users_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD CONSTRAINT `auth_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD CONSTRAINT `auth_users_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_users_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
