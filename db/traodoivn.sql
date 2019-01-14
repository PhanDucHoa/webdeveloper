-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 14, 2019 at 03:28 PM
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
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `slug`, `icon`, `home`, `status`, `created_at`, `updated_at`) VALUES
(24, 'Điện tử', 'dien-tu', 'iconfinder_smartphone_2261328.png', 0, 1, '2019-01-14 09:26:31', '2019-01-14 09:26:31'),
(21, 'Thú cưng', 'thu-cung', 'iconfinder_12_1490190.png', 0, 1, '2019-01-14 09:15:04', '2019-01-14 09:25:02'),
(23, 'Thời trang', 'thoi-trang', 'iconfinder_shirt_1845807.png', 0, 1, '2019-01-14 09:26:14', '2019-01-14 10:19:45'),
(22, 'Thể thao và Sở thích', 'the-thao-va-so-thich', 'iconfinder_02_Soccer_300768.png', 0, 1, '2019-01-14 09:26:00', '2019-01-14 09:26:00'),
(25, 'Dịch vụ', 'dich-vu', 'iconfinder_1_-_Customer_Service_2102045.png', 0, 1, '2019-01-14 09:26:48', '2019-01-14 09:26:48'),
(26, 'Gaming', 'gaming', 'iconfinder_videogame_icons-07_611914.png', 0, 1, '2019-01-14 09:27:05', '2019-01-14 09:27:05'),
(27, 'Xe cộ', 'xe-co', 'iconfinder_BT_c3front_905665.png', 0, 1, '2019-01-14 09:27:19', '2019-01-14 09:27:19'),
(28, 'Khác', 'khac', 'iconfinder_Three_dots_2202238.png', 0, 1, '2019-01-14 09:27:29', '2019-01-14 09:27:29');

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
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `thumbnail`, `category_id`, `description`, `featured`, `created_at`, `updated_at`) VALUES
(21, 'Iphone X ', 'iphonex.jpg', 24, 'Cần đổi sang các dòng Samsung hoặc Sony, có thương lượng bù trừ', 0, '2019-01-14 09:56:51', '2019-01-14 09:56:51'),
(20, 'Tai nghe gaming HyperX Revolver', 'hyperx-headset-revolver-s-2-zm-lg.jpg', 26, 'Qua sử dụng 90%, muốn đổi sang dòng tai nghe Logitech hoặc Steelseries', 0, '2019-01-14 09:55:59', '2019-01-14 09:55:59'),
(19, 'Áo thun nam còn mới', 'lacoste-t-shirt.jpg', 23, 'Mới mặc 1 lần, muốn đem đổi vì không dùng đến, có thương lượng', 0, '2019-01-14 09:54:23', '2019-01-14 09:54:23'),
(15, 'Filco Majestouch TKL', 'filco-masjectouch-2-tkl-yellow.jpg', 24, 'Còn bảo hành đến tháng 10/2021, muốn giao lưu với các dòng Leopold', 0, '2019-01-14 09:50:33', '2019-01-14 09:50:33'),
(16, 'Keycaps CSGO xuyên LED', 'csgo-keycap-set.jpg', 26, 'Còn thừa set này muốn đem bán hoặc trao đổi với các set khác ', 0, '2019-01-14 09:51:19', '2019-01-14 09:51:19'),
(17, 'Honda CB 400', 'honda-cb-400.jpg', 27, 'Tình trạng như ảnh, liên hệ để biết thêm chi tiết', 0, '2019-01-14 09:52:01', '2019-01-14 09:52:01'),
(18, 'Mô hình BMW M3 1:12 Otto', 'otto-112-bmw-m3.jpg', 22, 'Còn mới 90%, xước 1 chỗ nhỏ không đáng kể, muốn giao lưu với các model xe máy hoặc các dòng xe SUV', 0, '2019-01-14 09:53:12', '2019-01-14 09:53:12'),
(13, 'Mèo cần đem cho', 'cats.png', 21, 'Cần đem cho mèo do không còn khả năng nuôi, liên hệ', 0, '2019-01-14 09:48:28', '2019-01-14 09:48:28'),
(14, 'Tượng Figma Reaper Overwatch', 'figma-reaper.jpg', 22, 'Mua được 3 tháng, còn mới, muốn đổi sang Figma khác cùng dòng game', 0, '2019-01-14 09:49:29', '2019-01-14 09:49:29');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

DROP TABLE IF EXISTS `report`;
CREATE TABLE IF NOT EXISTS `report` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) DEFAULT NULL,
  `user_id` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`id`, `product_id`, `user_id`, `description`, `created_at`, `updated_at`) VALUES
(4, 11, '1', NULL, '2019-01-14 08:26:33', '2019-01-14 08:26:33');

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
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `phone`, `address`, `password`, `province`, `status`, `rating`, `created_at`, `updated_at`) VALUES
(3, 'kaito', 'pthuy7448@gmail.com', '123', 'Đồng Khởi, Biên Hòa', '202cb962ac59075b964b07152d234b70', NULL, 1, NULL, '2019-01-14 14:30:54', '2019-01-14 14:30:54');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
