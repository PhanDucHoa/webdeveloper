-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 13, 2019 at 03:24 PM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `traodoivn`
--
CREATE DATABASE IF NOT EXISTS `traodoivn` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `traodoivn`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rank` tinyint(4) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `rank`, `created_at`, `updated_at`) VALUES
(1, 'kaito', 'pthuy7448@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 1, '2019-01-13 13:26:30', '2019-01-13 14:03:53');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `icon` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `home` tinyint(4) DEFAULT '0',
  `status` tinyint(4) DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `slug`, `icon`, `home`, `status`, `created_at`, `updated_at`) VALUES
(19, 'Đồ gia dụng', 'do-gia-dung', NULL, 0, 1, '2019-01-13 12:31:27', '2019-01-13 12:31:27'),
(3, 'Xe cộ', 'xe-co', NULL, 0, 1, '2019-01-11 09:17:25', '2019-01-11 09:17:25'),
(13, 'Dịch vụ', 'dich-vu', NULL, 0, 1, '2019-01-12 08:43:33', '2019-01-12 08:43:33'),
(14, 'Báo chí', 'bao-chi', NULL, 0, 1, '2019-01-12 08:43:48', '2019-01-12 08:43:48'),
(17, 'Thời trang', 'thoi-trang', NULL, 0, 1, '2019-01-13 12:31:11', '2019-01-13 12:31:11'),
(18, 'Thú cưng', 'thu-cung', NULL, 0, 1, '2019-01-13 12:31:21', '2019-01-13 12:31:21');

-- --------------------------------------------------------

--
-- Table structure for table `offer`
--

DROP TABLE IF EXISTS `offer`;
CREATE TABLE IF NOT EXISTS `offer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `view` int(11) DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `province` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `wanted_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thumbnail` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `featured` tinyint(4) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `thumbnail`, `category_id`, `description`, `featured`, `created_at`, `updated_at`) VALUES
(2, 'Xe bọc thép cực mạnh', '22549662_1494231357291903_5506341504538520390_n.jpg', 3, 'Cần trao đổi với các loại xe hạng nặng khác hoặc bán (có thể thương lượng).', 0, '2019-01-12 13:54:01', '2019-01-13 14:52:19'),
(3, 'Yeri', '0000048138_001_20180813090058037.jpeg', 13, 'Idol đến từ Red Velvet, cần đổi idol khác', 0, '2019-01-13 03:22:36', '2019-01-13 14:52:54'),
(4, 'Cục Airdrop', '1502049534_preview_loot.png', 13, 'Muốn đổi cục Airdrop khác có M14 EBR', 0, '2019-01-13 03:28:02', '2019-01-13 14:53:26'),
(5, 'THANOS YEEZY', 'DcIMYxTXcAAhQy_.jpg', 17, 'THANOS YEEZY', 0, '2019-01-13 03:28:48', '2019-01-13 14:53:38'),
(6, 'Giáp 3', 'military_vest.png', 13, 'Đổi giáp 3 lấy nón 3', 0, '2019-01-13 08:10:34', '2019-01-13 14:53:59'),
(7, 'Gà mái biết bơi', 'DoD8dzTUUAE81sP.jpg', 18, 'Cần đổi sang con vật khác biết bay', 0, '2019-01-13 14:54:35', '2019-01-13 14:54:35'),
(8, 'M67 Frag Grenade', 'pubg-grenade-tips.jpg', 19, 'Cần trade ra HE Grenade, có thương lượng', 0, '2019-01-13 14:55:51', '2019-01-13 14:55:51'),
(9, 'Nerf Rival Blaster', '511BoKyjYXL._SL500_AC_SS350_.jpg', 19, 'Cần trade ra các loại gel blaster khác hoặc các loại súng Nerf khác.', 0, '2019-01-13 14:56:58', '2019-01-13 14:56:58'),
(10, 'Figure Hanzo', 'Hot-Game-OW-font-b-Shimada-b-font-font-b-Hanzo-b-font-PVC-Figure-Collectible_470497763873440.jpg', 19, 'Muốn đổi ra các loại figure cùng giá (có thể là gundam model kit).', 0, '2019-01-13 14:58:29', '2019-01-13 14:58:29'),
(11, 'Mèo trắng', '10857761_409179169255552_4357618676049897300_n.jpg', 18, 'Cần đổi sang 1 con vật nuôi khác', 0, '2019-01-13 15:00:41', '2019-01-13 15:00:41'),
(12, 'Xe tải 2 men 1 truck', 'two-men-and-a-truck-crime-25488384.png', 3, 'Đổi sang dòng xe tải khác như Volvo', 0, '2019-01-13 15:01:46', '2019-01-13 15:01:46');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` char(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `province` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  `rating` float DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
