-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 16, 2019 at 02:54 AM
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
(1, 'kaito', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 1, '2019-01-13 13:26:30', '2019-01-15 04:39:11');

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
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `offer`
--

INSERT INTO `offer` (`id`, `product_id`, `user_id`, `view`, `created_at`, `updated_at`) VALUES
(2, 29, 3, NULL, '2019-01-15 04:02:21', '2019-01-15 04:02:21'),
(3, 30, 3, NULL, '2019-01-15 04:14:23', '2019-01-15 04:14:23'),
(4, 31, 5, NULL, '2019-01-15 10:28:54', '2019-01-15 10:28:54'),
(5, 32, 5, NULL, '2019-01-15 10:32:12', '2019-01-15 10:32:12'),
(6, 33, 5, NULL, '2019-01-15 10:33:21', '2019-01-15 10:33:21'),
(7, 34, 6, NULL, '2019-01-15 10:34:47', '2019-01-15 10:34:47'),
(8, 35, 7, NULL, '2019-01-15 10:36:33', '2019-01-15 10:36:33'),
(9, 36, 7, NULL, '2019-01-15 10:37:41', '2019-01-15 10:37:41'),
(10, 37, 3, NULL, '2019-01-15 10:39:05', '2019-01-15 10:39:05'),
(11, 38, 6, NULL, '2019-01-15 10:43:48', '2019-01-15 10:43:48'),
(13, 40, 6, NULL, '2019-01-15 10:47:09', '2019-01-15 10:47:09');

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
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `thumbnail`, `category_id`, `description`, `featured`, `created_at`, `updated_at`) VALUES
(37, 'Máy chơi game PS4', 'sony-playstation-4-pro.jpg', 26, 'Còn mới 90%, đã hết bảo hành, muốn trade qua các loại phụ kiện gaming khác.', 0, '2019-01-15 10:39:05', '2019-01-15 10:39:05'),
(38, 'Tai nghe gaming HyperX Revolver', 'hyperx-headset-revolver-s-2-zm-lg.jpg', 26, 'Cần đổi sang các dòng tai nghe khác, giao lưu với Steelseries, Logitech, ...', 0, '2019-01-15 10:43:48', '2019-01-15 10:43:48'),
(31, 'Honda CB 400', 'honda-cb-400.jpg', 27, 'Xe máy phân khối lớn, sử dụng được 10 tháng, muốn giao lưu với các dòng xe khác.', 0, '2019-01-15 10:28:54', '2019-01-15 10:28:54'),
(32, 'Nerf Rival Blaster', 'nerf-rival-mxv-1200.jpeg', 22, 'Còn mới 95%, muốn trade qua các dòng Nerf khác hoặc các loại gel blaster.', 0, '2019-01-15 10:32:12', '2019-01-15 10:32:12'),
(33, 'Zowie EC2-B bản CS:GO', 'zowie-ec2b.jpg', 26, 'Mới sử dụng 2 tháng, cầm không vừa tay nên muốn đổi chuột có form balanced.', 0, '2019-01-15 10:33:21', '2019-01-15 10:33:21'),
(34, 'Filco Majestouch TKL', 'filco-masjectouch-2-tkl-yellow.jpg', 24, 'Được tặng nên còn thừa. Muốn đổi qua tai nghe hoặc linh kiện PC cùng giá. Còn nguyên bảo hành ở H2 Gaming.', 0, '2019-01-15 10:34:47', '2019-01-16 01:43:20'),
(35, 'Áo thun nam còn mới', 'lacoste-t-shirt.jpg', 23, 'Nhà còn dư áo nên đem đổi, miễn là cùng giá trị.', 0, '2019-01-15 10:36:33', '2019-01-15 10:36:33'),
(36, 'Mô hình BMW M3 1:12 Otto', 'otto-112-bmw-m3.jpg', 22, 'Còn mới 95%, xước 1 chỗ nhỏ gần bánh trước không đáng kể, muốn trade sang các model xe SUV.', 0, '2019-01-15 10:37:41', '2019-01-15 10:37:41'),
(30, 'Váy', 'dress.jpeg', 23, 'Váy còn mới chỉ sử dụng 2 lần', 0, '2019-01-15 04:14:23', '2019-01-15 04:14:23'),
(40, 'Figma Reaper', 'figma-reaper.jpg', 22, 'Còn mới, bảo quản kĩ vì chỉ cất hộp. Cần đổi với các figma khác tình trạng còn đẹp.', 0, '2019-01-15 10:47:09', '2019-01-15 10:47:09');

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
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `phone`, `address`, `password`, `province`, `status`, `rating`, `created_at`, `updated_at`) VALUES
(3, 'Vũ Thủy', 'pthuy7448@gmail.com', '123', 'Đồng Khởi, Biên Hòa', '202cb962ac59075b964b07152d234b70', NULL, 1, NULL, '2019-01-14 14:30:54', '2019-01-16 02:42:08'),
(4, 'Thái Hoàng', 'pthuy74@gmail.com', '123456789', '245, Ấp 3, xã An Hòa', '202cb962ac59075b964b07152d234b70', NULL, 1, NULL, '2019-01-15 10:25:11', '2019-01-15 10:25:11'),
(5, 'Võ Hiển', 'hien@gmail.com', '456789123', 'Dĩ An, Bình Dương', '202cb962ac59075b964b07152d234b70', NULL, 1, NULL, '2019-01-15 10:26:00', '2019-01-15 10:26:00'),
(6, 'Thành Chung', 'ttrung@gmail.com', '0461235664', 'Biên Hòa, Đồng Nai', '202cb962ac59075b964b07152d234b70', NULL, 1, NULL, '2019-01-15 10:26:53', '2019-01-16 02:39:24'),
(7, 'Công Lý', 'congly@gmail.com', '445324698423', 'Thanh Chương, Nghệ An', '202cb962ac59075b964b07152d234b70', NULL, 1, NULL, '2019-01-15 10:27:54', '2019-01-15 10:27:54');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
