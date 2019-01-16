-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 16, 2019 at 11:01 AM
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
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
(14, 41, 5, NULL, '2019-01-16 05:13:21', '2019-01-16 05:13:21'),
(13, 40, 6, NULL, '2019-01-15 10:47:09', '2019-01-15 10:47:09'),
(15, 42, 5, NULL, '2019-01-16 05:15:15', '2019-01-16 05:15:15'),
(16, 43, 7, NULL, '2019-01-16 05:17:44', '2019-01-16 05:17:44'),
(17, 44, 7, NULL, '2019-01-16 05:19:31', '2019-01-16 05:19:31'),
(18, 45, 4, NULL, '2019-01-16 05:21:34', '2019-01-16 05:21:34'),
(19, 46, 4, NULL, '2019-01-16 05:23:27', '2019-01-16 05:23:27'),
(20, 47, 4, NULL, '2019-01-16 05:25:56', '2019-01-16 05:25:56'),
(21, 48, 6, NULL, '2019-01-16 06:23:12', '2019-01-16 06:23:12'),
(22, 49, 5, NULL, '2019-01-16 06:26:31', '2019-01-16 06:26:31');

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
) ENGINE=MyISAM AUTO_INCREMENT=50 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `thumbnail`, `category_id`, `description`, `featured`, `created_at`, `updated_at`) VALUES
(41, 'Tay cầm Logitech F710', 'logitech-f710-controller.jpg', 26, 'Còn nguyên seal, muốn đổi sang các món khác ngang giá, hoặc bán.', 0, '2019-01-16 05:13:21', '2019-01-16 05:13:21'),
(37, 'Máy chơi game PS4', 'sony-playstation-4-pro.jpg', 26, 'Còn mới 90%, đã hết bảo hành, muốn trade qua các loại phụ kiện gaming khác.', 0, '2019-01-15 10:39:05', '2019-01-15 10:39:05'),
(38, 'Tai nghe gaming HyperX Revolver', 'hyperx-headset-revolver-s-2-zm-lg.jpg', 26, 'Cần đổi sang các dòng tai nghe khác, giao lưu với Steelseries, Logitech, ...', 0, '2019-01-15 10:43:48', '2019-01-15 10:43:48'),
(31, 'Honda CB 400', 'honda-cb-400.jpg', 27, 'Xe máy phân khối lớn, sử dụng được 10 tháng, muốn giao lưu với các dòng xe khác.', 0, '2019-01-15 10:28:54', '2019-01-15 10:28:54'),
(32, 'Nerf Rival Blaster', 'nerf-rival-mxv-1200.jpeg', 22, 'Còn mới 95%, muốn trade qua các dòng Nerf khác hoặc các loại gel blaster.', 0, '2019-01-15 10:32:12', '2019-01-15 10:32:12'),
(33, 'Zowie EC2-B bản CS:GO', 'zowie-ec2b.jpg', 26, 'Mới sử dụng 2 tháng, cầm không vừa tay nên muốn đổi chuột có form balanced.', 0, '2019-01-15 10:33:21', '2019-01-15 10:33:21'),
(34, 'Filco Majestouch TKL', 'filco-masjectouch-2-tkl-yellow.jpg', 24, 'Được tặng nên còn thừa. Muốn đổi qua tai nghe hoặc linh kiện PC cùng giá. Còn nguyên bảo hành ở H2 Gaming.', 0, '2019-01-15 10:34:47', '2019-01-16 01:43:20'),
(35, 'Áo thun nam còn mới', 'lacoste-t-shirt.jpg', 23, 'Nhà còn dư áo nên đem đổi, miễn là cùng giá trị.', 0, '2019-01-15 10:36:33', '2019-01-15 10:36:33'),
(36, 'Mô hình BMW M3 1:12 Otto', 'otto-112-bmw-m3.jpg', 22, 'Còn mới 95%, xước 1 chỗ nhỏ gần bánh trước không đáng kể, muốn trade sang các model xe SUV.', 0, '2019-01-15 10:37:41', '2019-01-15 10:37:41'),
(30, 'Váy', 'dress.jpeg', 23, 'Váy còn mới chỉ sử dụng 2 lần', 0, '2019-01-15 04:14:23', '2019-01-15 04:14:23'),
(40, 'Figma Reaper', 'figma-reaper.jpg', 22, 'Còn mới, bảo quản kĩ vì chỉ cất hộp. Cần đổi với các figma khác tình trạng còn đẹp.', 0, '2019-01-15 10:47:09', '2019-01-15 10:47:09'),
(42, 'Steelseries Arctis 5 phiên bản DOTA 2', 'steelseries-arctis-5-dota2.jpg', 26, 'Đã qua sử dụng, còn mới 90%, bề ngoài hơi cũ, sử dụng ngon lành. Cần bán hoặc đem trao đổi với các loại tai nghe khác.', 0, '2019-01-16 05:15:15', '2019-01-16 05:15:15'),
(43, 'Bungee giữ dây chuột của Zowie', 'Zowie-Camade-Bungee-v2-red.jpg', 26, 'Còn thừa 1 cái bungee nên cần đổi với các mặt hàng khác (ưu tiên dây cáp sạc điện thoại).', 0, '2019-01-16 05:17:44', '2019-01-16 05:17:44'),
(44, 'Chuột gaming Logitech G403 bản có dây', 'logitech-g403-prodigy-wired.jpg', 26, 'Đã cũ và hết bảo hành nhưng vẫn xài ngon lành, feet chuột hơi mòn nhưng thay dễ dàng. Món đổi sang các mặt hàng khác (có thương lượng).', 0, '2019-01-16 05:19:31', '2019-01-16 05:19:31'),
(45, 'Bàn phím Corsair K68 Fullsize', 'corsair-k68-red-led.jpg', 26, 'Muốn đổi sang các dòng phím cơ TKL vì Fullsize chiếm diện tích quá, ưu tiên IKBC hoặc Leopold (có bù trừ).', 0, '2019-01-16 05:21:34', '2019-01-16 05:21:34'),
(46, 'Đồng hồ Casio 2nd còn xài tốt', 'Casio-AE-1200WHD-1AVDF.jpg', 23, 'Muốn lên đời đồng hồ khác nên cần đem đổi.', 0, '2019-01-16 05:23:27', '2019-01-16 05:23:27'),
(47, 'Tai nghe Logitech G430 7.1', 'logitech-g430-surround-sound-gaming-headset.jpg', 26, 'Đã cũ, bong tróc phần đệm tai (thay mới được), còn sound card. Ưu tiên trade ra chuột gaming.', 0, '2019-01-16 05:25:56', '2019-01-16 05:25:56'),
(48, 'Đĩa game PS4 God of War 4', 'god-of-war-4-ps4.jpg', 26, 'Cần đổi sang các tựa game khác vì đã chơi chán.', 0, '2019-01-16 06:23:12', '2019-01-16 06:23:12'),
(49, 'Tay cầm Xbox', 'space-two-xbox-one-controller.jpg', 26, 'Còn mới, chỉ dùng 1 lần rồi cất hộp, muốn trade qua tay cầm PS4 có custom theme.', 0, '2019-01-16 06:26:31', '2019-01-16 06:26:31');

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
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`id`, `product_id`, `user_id`, `description`, `created_at`, `updated_at`) VALUES
(7, 47, '6', NULL, '2019-01-16 06:17:09', '2019-01-16 06:17:09');

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
