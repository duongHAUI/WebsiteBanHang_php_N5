-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2022 at 10:37 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `headphone_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(10) NOT NULL,
  `admin_name` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `admin_email` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `admin_password` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `admin_image` text CHARACTER SET utf8mb4 NOT NULL,
  `admin_country` text CHARACTER SET utf8mb4 NOT NULL,
  `admin_about` text CHARACTER SET utf8mb4 NOT NULL,
  `admin_phone` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_name`, `admin_email`, `admin_password`, `admin_image`, `admin_country`, `admin_about`, `admin_phone`, `createdAt`, `updatedAt`) VALUES
(8, 'Nguyen van Duong', 'duongvipro2k1@gmail.com', 'duong2k1', '94625858_647206419190297_2888198050080096256_n.jpg', 'Việt Nam', '<p><strong>Vui t&iacute;nh</strong></p>\r\n<div class=\"ddict_btn\" style=\"top: 17px; left: 61.8625px;\"><img src=\"chrome-extension://bpggmmljdiliancllaapiggllnkbjocb/logo/48.png\" /></div>', '0321321321', '2022-05-23 06:48:07', '2022-05-31 10:19:17'),
(25, 'ThuHuong', 'thuhuong123@gmail.com', 'Huong12', 'admin6.jpg', 'VietNam', 'No', '0967825310', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(10) NOT NULL,
  `brand_title` text CHARACTER SET utf8mb4 NOT NULL,
  `brand_desc` text CHARACTER SET utf8mb4 NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`, `brand_desc`, `createdAt`, `updatedAt`) VALUES
(17, 'Apple', 'NO', '2022-05-30 15:03:57', '2022-05-30 15:03:57'),
(18, 'Audio-technical', 'NO', '2022-05-30 15:04:33', '2022-05-30 15:04:33'),
(19, ' iclever ', 'NO', '2022-05-30 15:12:37', '2022-05-30 15:12:37'),
(20, 'SoundPEATS', 'NO', '2022-05-30 15:14:04', '2022-05-30 15:14:04'),
(21, 'Monster', 'NO', '2022-05-30 15:14:30', '2022-05-30 15:14:30'),
(22, 'Hifiman', 'NO', '2022-05-30 15:15:23', '2022-05-30 15:15:23'),
(23, 'LG', 'NO', '2022-05-30 15:15:50', '2022-05-30 15:15:50'),
(24, 'Shure', 'NO', '2022-05-30 15:16:17', '2022-05-30 15:16:17'),
(25, 'Sony', 'NO', '2022-06-05 10:10:26', '2022-06-18 16:55:05');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(10) NOT NULL,
  `cus_id` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `cart_qty` int(10) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `cus_id`, `pro_id`, `cart_qty`, `createdAt`, `updatedAt`) VALUES
(115, 16, 24, 2, '2022-06-18 17:07:31', '2022-06-18 18:18:05'),
(116, 16, 25, 3, '2022-06-18 17:07:35', '2022-06-18 18:17:55'),
(117, 16, 30, 4, '2022-06-18 17:10:13', '2022-06-18 18:18:30'),
(118, 16, 26, 1, '2022-06-18 18:17:28', '2022-06-18 18:17:28'),
(119, 16, 39, 1, '2022-06-18 18:18:00', '2022-06-18 18:18:00'),
(120, 16, 35, 1, '2022-06-18 18:18:45', '2022-06-18 18:18:45');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(10) NOT NULL,
  `cat_title` text CHARACTER SET utf8mb4 NOT NULL,
  `cat_desc` text CHARACTER SET utf8mb4 NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`, `cat_desc`, `createdAt`, `updatedAt`) VALUES
(22, 'Tai nghe chống ồn', 'Tai nghe loại bỏ tiếng ồn có thể giúp bạn nghe nhạc dễ dàng hơn và thế giới của bạn yên bình hơn một chút.', '2022-05-30 14:32:03', '2022-06-14 16:27:13'),
(23, 'Tai nghe chơi game', 'Tai nghe chơi game phải kết hợp âm thanh nổi bật, sự thoải mái để kéo dài một phiên chơi game thích hợp và cả khả năng kết nối tuyệt vời.', '2022-05-30 14:39:07', '2022-06-14 16:27:37'),
(25, 'Tai nghe thể thao', 'Một cặp tai nghe thể thao mới là một cách tuyệt vời để tạo động lực cho bản thân.', '2022-05-30 14:41:56', '2022-06-14 16:28:16'),
(26, 'Tai nghe trẻ em', 'Tại một số thời điểm, hầu hết trẻ em cần sử dụng tai nghe, cho dù đó là để đi học, đi du lịch hay chỉ đơn giản là để giúp người lớn tỉnh táo hơn.', '2022-05-30 14:46:58', '2022-06-14 16:28:39'),
(27, 'Tai nghe DJ', 'Một loại tai nghe được thiết kế đặc biệt cho các DJ', '2022-05-30 15:02:33', '2022-06-14 16:42:27');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(10) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_password` varchar(255) NOT NULL,
  `customer_country` text NOT NULL,
  `customer_city` text NOT NULL,
  `customer_phone` varchar(255) NOT NULL,
  `customer_address` text NOT NULL,
  `customer_image` text NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_name`, `customer_email`, `customer_password`, `customer_country`, `customer_city`, `customer_phone`, `customer_address`, `customer_image`, `createdAt`, `updatedAt`) VALUES
(1, 'Huong', 'huong123@gmail.com', '1234', 'VietNam', 'HaNoi', '0731', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 'Nguyen Mai Phuong', 'phuongsapphire2209hn@gmail.com', 'fea370856fe9651c7c0e628146d43410', 'Vietnam', 'Ha Noi', '0123456789', 'Ha Noi', '', '2022-06-15 12:25:19', '2022-06-15 14:54:33'),
(15, 'Min', 'minmin@gmail.com', 'b5d5bcaf6a476613f3ec7c80bbd5aa92', 'Việt Nam', 'Thanh Hóa', '0328558612', 'Hải Lộc', '', '2022-06-17 05:38:59', '2022-06-18 13:52:35'),
(16, 'Nguyễn Văn Dương', 'duongvipro2k1@gmail.com', '2b97561866618930d8ea0a2f18c9eb67', 'Việt Nam', 'Thanh Hóa', '0328558614', 'Hải Lộc', '', '2022-06-18 13:52:57', '2022-06-18 15:51:33');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `image_id` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `image_link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`image_id`, `pro_id`, `image_link`) VALUES
(32, 24, 'products/dj_sh1.jpg'),
(33, 24, 'products/dj_sh2.jpg'),
(34, 24, 'products/dj_sh3.jpg'),
(41, 25, 'products/dj_au1.jpg'),
(42, 25, 'products/dj_au2.jpg'),
(43, 25, 'products/dj_au3.jpg'),
(44, 26, 'products/blt_sn1.jpg'),
(45, 26, 'products/blt_sn2.jpg'),
(46, 26, 'products/blt_sn3.jpg'),
(47, 27, 'products/nc_ap1.png'),
(48, 27, 'products/nc_ap2.png'),
(49, 27, 'products/nc_ap3.png'),
(50, 28, 'products/nc_lg1.jpg'),
(51, 28, 'products/nc_lg2.jpg'),
(52, 28, 'products/nc_lg3.jpg'),
(53, 29, 'products/gm_sp1.png'),
(54, 29, 'products/gm_sp2.jpg'),
(55, 29, 'products/gm_sp3.jpg'),
(71, 30, 'products/co_sn1.jpg'),
(72, 30, 'products/co_sn2.jpg'),
(73, 30, 'products/co_sn3.jpg'),
(74, 31, 'products/sp_mt1.jpg'),
(75, 31, 'products/sp_mt2.jpg'),
(76, 31, 'products/sp_mt3.jpg'),
(77, 32, 'products/cr_ic1.jpg'),
(78, 32, 'products/cr_ic2.jpg'),
(79, 32, 'products/cr_ic3.jpg'),
(80, 33, 'products/cr_ic4.jpg'),
(81, 33, 'products/cr_ic5.jpg'),
(82, 33, 'products/cr_ic6.jpg'),
(83, 34, 'products/nc_hf1.jpg'),
(84, 34, 'products/nc_hf2.jpg'),
(85, 34, 'products/nc_hf3.jpg'),
(86, 35, 'products/nc_sp1.jpg'),
(87, 35, 'products/nc_sp2.jpg'),
(88, 35, 'products/nc_sp3.jpg'),
(98, 39, 'products/775_studio_2_0_black.jpg'),
(99, 39, 'products/775_studio_2_0_red.jpg'),
(100, 39, 'products/775_studio_2_0_white.jpg'),
(101, 40, 'products/4493_tai_nghe_denon_ah_c160w_xuan_vu_3.jpg'),
(102, 40, 'products/4493_tai_nghe_denon_ah_c160w_xuan_vu_4.jpg'),
(103, 40, 'products/4493_tai_nghe_denon_ah_c160w_xuan_vu_7.jpg'),
(104, 41, 'products/anh1.jpg'),
(105, 41, 'products/anh2.jpg'),
(106, 41, 'products/anh3.jpg'),
(107, 42, 'products/anh4.jpg'),
(108, 42, 'products/anh5.jpg'),
(109, 42, 'products/anh6.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `cus_id` int(10) NOT NULL,
  `order_amount` double NOT NULL,
  `order_payment_methods` text NOT NULL,
  `order_address` varchar(255) NOT NULL,
  `order_receiver` varchar(50) NOT NULL,
  `order_phone` varchar(10) NOT NULL,
  `order_note` text DEFAULT NULL,
  `order_status` tinyint(4) NOT NULL DEFAULT 0,
  `order_cancel_reason` varchar(255) DEFAULT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `cus_id`, `order_amount`, `order_payment_methods`, `order_address`, `order_receiver`, `order_phone`, `order_note`, `order_status`, `order_cancel_reason`, `createdAt`, `updatedAt`) VALUES
(1, 14, 26496500, 'Thanh toán khi nhận hàng', 'Ha Noi', 'Nguyen Mai Phuong', '0123456789', 'Note', 0, '', '2012-01-01 12:25:30', '2022-06-21 08:35:25'),
(2, 14, 5226000, 'Thanh toán khi nhận hàng', 'Ha Noi', 'Nguyen Mai Phuong', '0123456789', 'Note', 0, '', '2013-02-02 12:25:30', '2022-06-21 08:35:25'),
(3, 14, 2029500, 'Thanh toán khi nhận hàng', 'Ha Noi', 'Nguyen Mai Phuong', '0123456789', 'Note', 0, '', '2014-06-03 14:49:24', '2022-06-21 08:27:52'),
(4, 14, 3893500, 'Thanh toán khi nhận hàng', 'Ha Noi', 'Nguyen Mai Phuong', '0123456789', 'Note', 0, '', '2015-06-04 14:49:37', '2022-06-21 08:27:52'),
(5, 14, 4666500, 'Thanh toán khi nhận hàng', 'Ha Noi', 'Nguyen Mai Phuong', '0123456789', 'Note', 0, '', '2016-06-05 14:49:49', '2022-06-21 08:27:52'),
(6, 14, 32767500, 'Thanh toán khi nhận hàng', 'Ha Noi', 'Nguyen Mai Phuong', '0123456789', 'Note', 0, '', '2017-06-06 14:50:00', '2022-06-21 08:27:52'),
(7, 14, 1681500, 'Thanh toán khi nhận hàng', 'Ha Noi', 'Nguyen Mai Phuong', '0123456789', 'Note', 0, '', '2018-06-06 14:50:14', '2022-06-21 08:27:52'),
(8, 14, 5183900, 'Thanh toán khi nhận hàng', 'Ha Noi', 'Nguyen Mai Phuong', '0123456789', 'Note', 0, '', '2019-06-07 14:50:33', '2022-06-21 08:27:52'),
(9, 14, 2970000, 'Thanh toán khi nhận hàng', 'Ha Noi', 'Nguyen Mai Phuong', '0123456789', 'Note', 0, '', '2020-06-08 14:50:45', '2022-06-21 08:27:52'),
(10, 14, 10190400, 'Thanh toán khi nhận hàng', 'Ha Noi', 'Nguyen Mai Phuong', '0123456789', 'Note', 0, '', '2021-06-09 14:50:59', '2022-06-21 08:27:52'),
(11, 14, 26268000, 'Thanh toán khi nhận hàng', 'Ha Noi', 'Nguyen Mai Phuong', '0123456789', 'Note', 0, '', '2022-01-10 14:51:09', '2022-06-21 08:27:52'),
(12, 14, 2610000, 'Thanh toán khi nhận hàng', 'Ha Noi', 'Nguyen Mai Phuong', '0123456789', 'Note', 0, '', '2022-02-11 14:51:21', '2022-06-21 08:27:52'),
(13, 14, 2622000, 'Thanh toán khi nhận hàng', 'Ha Noi', 'Nguyen Mai Phuong', '0123456789', 'Note', 0, '', '2022-03-12 14:51:44', '2022-06-21 08:27:52'),
(14, 14, 1966500, 'Thanh toán khi nhận hàng', 'Ha Noi', 'Nguyen Mai Phuong', '0123456789', 'Note', 0, '', '2022-04-13 14:52:05', '2022-06-21 08:27:52'),
(15, 14, 4221000, 'Thanh toán khi nhận hàng', 'Ha Noi', 'Nguyen Mai Phuong', '0123456789', 'Note', 0, '', '2022-05-14 14:52:15', '2022-06-21 08:27:52'),
(16, 14, 3893500, 'Thanh toán khi nhận hàng', 'Ha Noi', 'Nguyen Mai Phuong', '0123456789', 'Note', 0, '', '2022-06-01 14:52:29', '2022-06-21 08:27:52'),
(17, 14, 2970000, 'Thanh toán khi nhận hàng', 'Ha Noi', 'Nguyen Mai Phuong', '0123456789', 'Note', 0, '', '2022-06-02 14:53:00', '2022-06-21 08:27:52'),
(18, 14, 26268000, 'Thanh toán khi nhận hàng', 'Ha Noi', 'Nguyen Mai Phuong', '0123456789', 'Note', 0, '', '2022-06-03 14:53:27', '2022-06-21 08:27:52'),
(19, 14, 21845000, 'Thanh toán khi nhận hàng', 'Ha Noi', 'Nguyen Mai Phuong', '0123456789', 'Note', 0, '', '2022-06-04 14:53:38', '2022-06-21 08:27:52'),
(20, 14, 24864800, 'Thanh toán khi nhận hàng', 'Ha Noi', 'Nguyen Mai Phuong', '0123456789', 'Note', 0, '', '2022-06-05 14:57:16', '2022-06-21 08:27:52'),
(21, 14, 30294000, 'Thanh toán khi nhận hàng', 'Ha Noi', 'Nguyen Mai Phuong', '0123456789', 'Note', 0, '', '2022-06-06 14:57:51', '2022-06-21 08:27:52'),
(22, 14, 17120000, 'Thanh toán khi nhận hàng', 'Ha Noi', 'Nguyen Mai Phuong', '0123456789', 'Note', 0, '', '2022-06-07 15:07:41', '2022-06-21 08:27:52'),
(23, 14, 8442000, 'Thanh toán khi nhận hàng', 'Ha Noi', 'Nguyen Mai Phuong', '0123456789', 'Note', 0, '', '2022-06-08 15:07:53', '2022-06-21 08:27:52'),
(24, 14, 21845000, 'Thanh toán khi nhận hàng', 'Ha Noi', 'Nguyen Mai Phuong', '0123456789', 'Note', 0, '', '2022-06-09 15:08:02', '2022-06-21 08:27:52'),
(25, 14, 7920000, 'Thanh toán khi nhận hàng', 'Ha Noi', 'Nguyen Mai Phuong', '0123456789', 'Note', 0, '', '2022-06-10 15:08:33', '2022-06-21 08:27:52'),
(26, 14, 10190400, 'Thanh toán khi nhận hàng', 'Ha Noi', 'Nguyen Mai Phuong', '0123456789', 'Note', 0, '', '2022-06-11 15:08:43', '2022-06-21 08:27:52'),
(27, 14, 7847000, 'Thanh toán khi nhận hàng', 'Ha Noi', 'Nguyen Mai Phuong', '0123456789', 'Note', 0, '', '2022-06-12 15:09:33', '2022-06-21 08:27:52'),
(28, 14, 14009600, 'Thanh toán khi nhận hàng', 'Ha Noi', 'Nguyen Mai Phuong', '0123456789', 'Note', 0, '', '2022-06-13 15:09:45', '2022-06-21 08:27:52'),
(29, 14, 61142400, 'Thanh toán khi nhận hàng', 'Ha Noi', 'Nguyen Mai Phuong', '0123456789', 'Note', 0, '', '2022-06-14 15:09:56', '2022-06-21 08:27:52'),
(30, 14, 16815000, 'Thanh toán khi nhận hàng', 'Ha Noi', 'Nguyen Mai Phuong', '0345090535', 'Note', 0, '', '2022-06-15 15:44:24', '2022-06-21 08:27:52'),
(31, 14, 196605000, 'Thanh toán khi nhận hàng', 'Ha Noi', 'Nguyen Mai Phuong', '0345090535', 'Note', 0, '', '2022-06-16 15:44:38', '2022-06-21 08:27:52'),
(32, 14, 15732000, 'Thanh toán khi nhận hàng', 'Ha Noi', 'Nguyen Mai Phuong', '0345090535', 'Note', 0, '', '2022-06-17 15:44:53', '2022-06-21 08:27:52'),
(33, 14, 10922500, 'Thanh toán khi nhận hàng', 'Ha Noi', 'Nguyen Mai Phuong', '0123456789', 'Note', 0, '', '2022-06-18 14:53:00', '2022-06-21 08:27:52'),
(34, 14, 3960000, 'Thanh toán khi nhận hàng', 'Ha Noi', 'Nguyen Mai Phuong', '0123456789', 'Note', 0, '', '2022-06-19 14:53:27', '2022-06-21 08:27:52'),
(35, 14, 5095200, 'Thanh toán khi nhận hàng', 'Ha Noi', 'Nguyen Mai Phuong', '0123456789', 'Note', 0, '', '2022-06-20 14:53:38', '2022-06-21 08:27:52'),
(36, 14, 3923500, 'Thanh toán khi nhận hàng', 'Ha Noi', 'Nguyen Mai Phuong', '0123456789', 'Note', 0, '', '2022-06-21 14:57:16', '2022-06-21 08:27:52'),
(37, 14, 7004800, 'Thanh toán khi nhận hàng', 'Ha Noi', 'Nguyen Mai Phuong', '0123456789', 'Note', 0, '', '2022-06-22 14:57:51', '2022-06-21 08:27:52'),
(38, 14, 20380800, 'Thanh toán khi nhận hàng', 'Ha Noi', 'Nguyen Mai Phuong', '0123456789', 'Note', 0, '', '2022-06-23 15:07:41', '2022-06-21 08:27:52'),
(39, 14, 5605000, 'Thanh toán khi nhận hàng', 'Ha Noi', 'Nguyen Mai Phuong', '0123456789', 'Note', 0, '', '2022-06-24 15:07:53', '2022-06-21 08:27:52'),
(40, 14, 65535000, 'Thanh toán khi nhận hàng', 'Ha Noi', 'Nguyen Mai Phuong', '0123456789', 'Note', 0, '', '2022-06-25 15:08:33', '2022-06-21 08:27:52'),
(41, 14, 5244000, 'Thanh toán khi nhận hàng', 'Ha Noi', 'Nguyen Mai Phuong', '0123456789', 'Note', 0, '', '2022-06-26 15:08:43', '2022-06-21 08:27:52'),
(42, 14, 14500400, 'Thanh toán khi nhận hàng', 'Ha Noi', 'Nguyen Mai Phuong', '0123456789', 'Note', 0, '', '2022-06-27 15:09:33', '2022-06-21 08:35:25'),
(43, 14, 7004800, 'Thanh toán khi nhận hàng', 'Ha Noi', 'Nguyen Mai Phuong', '0123456789', 'Note', 0, '', '2022-06-28 15:09:45', '2022-06-21 08:27:52'),
(44, 14, 20380800, 'Thanh toán khi nhận hàng', 'Ha Noi', 'Nguyen Mai Phuong', '0123456789', 'Note', 0, '', '2022-06-29 15:09:56', '2022-06-21 08:27:52'),
(45, 14, 5605000, 'Thanh toán khi nhận hàng', 'Ha Noi', 'Nguyen Mai Phuong', '0123456789', 'Note', 0, '', '2022-06-30 15:44:24', '2022-06-21 08:27:52'),
(46, 14, 65535000, 'Thanh toán khi nhận hàng', 'Ha Noi', 'Nguyen Mai Phuong', '0123456789', 'Note', 0, '', '2022-05-12 15:44:38', '2022-06-21 08:27:52'),
(47, 14, 5244000, 'Thanh toán khi nhận hàng', 'Ha Noi', 'Nguyen Mai Phuong', '0123456789', 'Note', 0, '', '2022-06-01 15:44:53', '2022-06-21 08:27:52'),
(48, 14, 2242000, 'Thanh toán khi nhận hàng', 'Ha Noi', 'Nguyen Mai Phuong', '0123456789', 'Note', 0, '', '2021-08-24 15:09:56', '2022-06-21 08:27:52'),
(49, 14, 12177000, 'Thanh toán khi nhận hàng', 'Ha Noi', 'Nguyen Mai Phuong', '0123456789', 'Note', 0, '', '2021-10-27 15:44:24', '2022-06-21 08:27:52'),
(50, 14, 2970000, 'Thanh toán khi nhận hàng', 'Ha Noi', 'Nguyen Mai Phuong', '0123456789', 'Note', 0, '', '2021-11-11 15:44:38', '2022-06-21 08:27:52'),
(51, 14, 8560000, 'Thanh toán khi nhận hàng', 'Ha Noi', 'Nguyen Mai Phuong', '0123456789', 'Note', 0, '', '2022-06-15 15:44:53', '2022-06-21 08:27:52'),
(54, 16, 9816500, 'Thanh toán khi nhận hàng', 'Hải Lộc', 'Nguyễn Văn Dương', '0328558614', 'laafn 2', 0, '', '2022-06-18 16:24:10', '2022-06-21 08:27:52');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `detail_id` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` double NOT NULL,
  `size` varchar(20) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`detail_id`, `pro_id`, `order_id`, `quantity`, `price`, `size`, `createdAt`, `updatedAt`) VALUES
(1, 25, 1, 4, 3893500, '', '2022-06-15 12:25:30', '2022-06-21 08:27:36'),
(2, 27, 1, 1, 10922500, '', '2022-06-15 12:25:30', '2022-06-21 08:35:21'),
(3, 24, 3, 1, 2029500, '', '2022-06-15 14:49:24', '2022-06-21 08:27:36'),
(4, 25, 4, 1, 3893500, '', '2022-06-15 14:49:37', '2022-06-21 08:27:36'),
(5, 26, 5, 1, 4666500, '', '2022-06-15 14:49:49', '2022-06-21 08:27:36'),
(6, 27, 6, 3, 10922500, '', '2022-06-15 14:50:00', '2022-06-21 08:27:36'),
(7, 29, 7, 3, 560500, '', '2022-06-15 14:50:14', '2022-06-21 08:27:36'),
(8, 29, 8, 3, 560500, '', '2022-06-15 14:50:33', '2022-06-21 08:27:36'),
(9, 31, 8, 2, 1751200, '', '2022-06-15 14:50:33', '2022-06-21 08:27:36'),
(10, 32, 9, 3, 990000, '', '2022-06-15 14:50:45', '2022-06-21 08:27:36'),
(11, 30, 10, 2, 5095200, '', '2022-06-15 14:50:59', '2022-06-21 08:27:36'),
(12, 34, 11, 1, 26268000, '', '2022-06-15 14:51:09', '2022-06-21 08:27:36'),
(13, 35, 12, 2, 1305000, '', '2022-06-15 14:51:21', '2022-06-21 08:27:36'),
(14, 33, 13, 4, 655500, '', '2022-06-15 14:51:44', '2022-06-21 08:27:36'),
(15, 33, 14, 3, 655500, '', '2022-06-15 14:52:05', '2022-06-21 08:27:36'),
(16, 28, 15, 1, 4221000, '', '2022-06-15 14:52:15', '2022-06-21 08:27:36'),
(17, 25, 16, 1, 3893500, '', '2022-06-15 14:52:29', '2022-06-21 08:27:36'),
(18, 32, 17, 3, 990000, '', '2022-06-15 14:53:00', '2022-06-21 08:27:36'),
(19, 34, 18, 1, 26268000, '', '2022-06-15 14:53:27', '2022-06-21 08:27:36'),
(20, 27, 19, 2, 10922500, '', '2022-06-15 14:53:38', '2022-06-21 08:27:36'),
(21, 30, 20, 4, 5095200, '', '2022-06-15 14:57:16', '2022-06-21 08:27:36'),
(22, 29, 20, 4, 560500, '', '2022-06-15 14:57:16', '2022-06-21 08:27:36'),
(23, 24, 21, 6, 2029500, '', '2022-06-15 14:57:51', '2022-06-21 08:27:36'),
(24, 32, 21, 3, 990000, '', '2022-06-15 14:57:51', '2022-06-21 08:27:36'),
(25, 26, 22, 1, 4666500, '', '2022-06-15 15:07:41', '2022-06-21 08:27:36'),
(26, 25, 22, 1, 3893500, '', '2022-06-15 15:07:41', '2022-06-21 08:27:36'),
(27, 28, 23, 1, 4221000, '', '2022-06-15 15:07:53', '2022-06-21 08:27:36'),
(28, 27, 24, 1, 10922500, '', '2022-06-15 15:08:02', '2022-06-21 08:27:36'),
(29, 32, 25, 4, 990000, '', '2022-06-15 15:08:33', '2022-06-21 08:27:36'),
(30, 30, 26, 1, 5095200, '', '2022-06-15 15:08:43', '2022-06-21 08:27:36'),
(31, 29, 27, 7, 560500, '', '2022-06-15 15:09:33', '2022-06-21 08:27:36'),
(32, 31, 28, 4, 1751200, '', '2022-06-15 15:09:45', '2022-06-21 08:27:36'),
(33, 30, 29, 4, 5095200, '', '2022-06-15 15:09:56', '2022-06-21 08:27:36'),
(34, 29, 30, 10, 560500, '', '2022-06-15 15:44:24', '2022-06-21 08:27:36'),
(35, 27, 31, 6, 10922500, '', '2022-06-15 15:44:38', '2022-06-21 08:27:36'),
(36, 33, 32, 8, 655500, '', '2022-06-15 15:44:53', '2022-06-21 08:27:36'),
(37, 29, 20, 4, 560500, '', '2022-06-15 14:57:16', '2022-06-21 08:27:36'),
(38, 24, 21, 6, 2029500, '', '2022-06-15 14:57:51', '2022-06-21 08:27:36'),
(39, 32, 21, 3, 990000, '', '2022-06-15 14:57:51', '2022-06-21 08:27:36'),
(40, 26, 22, 1, 4666500, '', '2022-06-15 15:07:41', '2022-06-21 08:27:36'),
(41, 25, 22, 1, 3893500, '', '2022-06-15 15:07:41', '2022-06-21 08:27:36'),
(42, 28, 23, 1, 4221000, '', '2022-06-15 15:07:53', '2022-06-21 08:27:36'),
(43, 27, 24, 1, 10922500, '', '2022-06-15 15:08:02', '2022-06-21 08:27:36'),
(44, 32, 25, 4, 990000, '', '2022-06-15 15:08:33', '2022-06-21 08:27:36'),
(45, 30, 26, 1, 5095200, '', '2022-06-15 15:08:43', '2022-06-21 08:27:36'),
(46, 29, 27, 7, 560500, '', '2022-06-15 15:09:33', '2022-06-21 08:27:36'),
(47, 31, 28, 4, 1751200, '', '2022-06-15 15:09:45', '2022-06-21 08:27:36'),
(48, 30, 29, 4, 5095200, '', '2022-06-15 15:09:56', '2022-06-21 08:27:36'),
(49, 29, 30, 10, 560500, '', '2022-06-15 15:44:24', '2022-06-21 08:27:36'),
(50, 27, 31, 6, 10922500, '', '2022-06-15 15:44:38', '2022-06-21 08:27:36'),
(51, 33, 32, 8, 655500, '', '2022-06-15 15:44:53', '2022-06-21 08:27:36'),
(52, 30, 29, 4, 5095200, '', '2022-06-15 15:09:56', '2022-06-21 08:27:36'),
(53, 29, 30, 10, 560500, '', '2022-06-15 15:44:24', '2022-06-21 08:27:36'),
(54, 27, 31, 6, 10922500, '', '2022-06-15 15:44:38', '2022-06-21 08:27:36'),
(55, 33, 32, 8, 655500, '', '2022-06-15 15:44:53', '2022-06-21 08:27:36'),
(61, 24, 54, 1, 2029500, '', '2022-06-18 16:24:10', '2022-06-21 08:27:36'),
(62, 25, 54, 2, 3893500, '', '2022-06-18 16:24:10', '2022-06-21 08:27:36'),
(63, 27, 33, 1, 10922500, '', '2022-06-15 15:08:02', '2022-06-21 08:27:36'),
(64, 32, 34, 4, 990000, '', '2022-06-15 15:08:33', '2022-06-21 08:27:36'),
(65, 30, 35, 1, 5095200, '', '2022-06-15 15:08:43', '2022-06-21 08:27:36'),
(66, 29, 36, 7, 560500, '', '2022-06-15 15:09:33', '2022-06-21 08:27:36'),
(67, 31, 37, 4, 1751200, '', '2022-06-15 15:09:45', '2022-06-21 08:27:36'),
(68, 30, 38, 4, 5095200, '', '2022-06-15 15:09:56', '2022-06-21 08:27:36'),
(69, 29, 39, 10, 560500, '', '2022-06-15 15:44:24', '2022-06-21 08:27:36'),
(70, 27, 40, 6, 10922500, '', '2022-06-15 15:44:38', '2022-06-21 08:27:36'),
(71, 33, 41, 8, 655500, '', '2022-06-15 15:44:53', '2022-06-21 08:27:36'),
(72, 29, 42, 4, 560500, '', '2022-06-15 14:57:16', '2022-06-21 08:27:36'),
(73, 31, 42, 7, 1751200, '', '2022-06-15 15:09:33', '2022-06-21 08:35:21'),
(74, 31, 43, 4, 1751200, '', '2022-06-15 15:09:45', '2022-06-21 08:27:36'),
(75, 30, 44, 4, 5095200, '', '2022-06-15 15:09:56', '2022-06-21 08:27:36'),
(76, 29, 45, 10, 560500, '', '2022-06-15 15:44:24', '2022-06-21 08:27:36'),
(77, 27, 46, 6, 10922500, '', '2022-06-15 15:44:38', '2022-06-21 08:27:36'),
(78, 33, 47, 8, 655500, '', '2022-06-15 15:44:53', '2022-06-21 08:27:36'),
(79, 29, 48, 4, 560500, '', '2022-06-15 14:57:16', '2022-06-21 08:27:36'),
(80, 24, 49, 6, 2029500, '', '2022-06-15 14:57:51', '2022-06-21 08:27:36'),
(81, 32, 50, 3, 990000, '', '2022-06-15 14:57:51', '2022-06-21 08:27:36'),
(82, 26, 51, 1, 4666500, '', '2022-06-15 15:07:41', '2022-06-21 08:27:36'),
(83, 25, 51, 1, 3893500, '', '2022-06-15 15:07:41', '2022-06-21 08:27:36'),
(84, 33, 2, 2, 655500, '', '2022-06-15 14:51:44', '2022-06-21 08:27:36'),
(85, 35, 2, 3, 1305000, '', '2022-06-15 14:52:05', '2022-06-21 08:35:21');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(10) NOT NULL,
  `cat_id` int(10) NOT NULL,
  `brand_id` int(10) NOT NULL,
  `product_title` text NOT NULL,
  `product_price` double NOT NULL,
  `product_sold` int(11) NOT NULL DEFAULT 0,
  `product_quantity` int(11) NOT NULL,
  `product_discount` int(11) NOT NULL,
  `product_mass_discount` int(11) DEFAULT NULL,
  `is_mass_discount` tinyint(4) DEFAULT 0,
  `product_desc` text NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `cat_id`, `brand_id`, `product_title`, `product_price`, `product_sold`, `product_quantity`, `product_discount`, `product_mass_discount`, `is_mass_discount`, `product_desc`, `createdAt`, `updatedAt`) VALUES
(24, 27, 24, 'Tai nghe Shure SRH440', 2255000, 13, 9996, 10, NULL, 0, 'Tai nghe Shure SRH 440 rất phổ biến trong studio, tai nghe với âm thanh cân bằng, tai nghe cỡ to SRH440 có thể gập lại dễ dàng để mang theo.\r\nĐây là một trong những headphone tai nghe studio giá hợp lý mà chất lượng nếu bạn tìm tai nghe kín âm thanh tầm trung chất lượng\r\nTai nghe SRH440 Professional Studio từ Shure cung cấp âm thanh đặc biệt và thoải mái.', '2022-05-30 16:21:54', '2022-06-21 08:26:00'),
(25, 27, 18, 'Tai nghe Audio Technica ATH-M70X', 5990000, 10, 9996, 35, NULL, 0, '<p>M-Series của AudioTechnica l&agrave; d&ograve;ng tai nghe ph&ograve;ng thu chuy&ecirc;n nghiệp, được ch&uacute; trọng chế tạo với kiểu d&aacute;ng, thiết kế v&agrave; chất lượng &acirc;m thanh trung thực nhất. M70x hiện l&agrave; tai nghe đầu bảng thuộc d&ograve;ng M-series với tất cả những đặc điểm tuyệt vời n&ecirc;u tr&ecirc;n. M70x c&oacute; chất &acirc;m ch&iacute;nh x&aacute;c, tất cả c&aacute;c chi tiết được gia c&ocirc;ng kỹ c&agrave;ng, c&aacute;c khớp nối v&agrave; headband bằng kim loại cho độ bền cao nhất. Driver 45mm với cuộn cảm nh&ocirc;m, c&oacute; trọng lượng nhẹ, linh hoạt với c&aacute;c rung động nhanh, nhằm t&aacute;i tạo &acirc;m thanh thật tốt m&agrave; kh&ocirc;ng g&acirc;y ra hiện tượng trễ tiếng.</p>', '2022-06-04 18:10:28', '2022-06-21 08:26:00'),
(26, 22, 25, 'Tai nghe Bluetooth Sony WH-1000XM4', 5490000, 3, 9999, 15, NULL, 0, 'Tai nghe Sony WH-1000XM4 chính hãng\r\nMới đây, Sony vừa công bố thế hệ thứ 4 của dòng tai nghe chụp đầu chống ồn cao cấp: WH1000XM4. Sony WH-1000XM4 có thiết kế tương tự như người đàn anh của mình, và cũng được trang bị bộ xử lý chống ồn QN1, thứ giúp cho Sony WH-1000XM3 trở thành một trong những tai nghe không dây tốt nhất trong phân khúc chống ồn chủ động.', '2022-06-05 10:12:10', '2022-06-21 08:26:00'),
(27, 22, 17, 'Tai nghe Apple AirPods Max chính hãng ZA/A', 12850000, 6, 9999, 15, NULL, 0, '<p><strong>Tai nghe Apple Airpod Max</strong></p>\r\n<p>Vào ngày 08/12, Apple đã chính thức công bố chiếc tai nghe trùm đầu (Over-ear) đầu tiên của mình, tên gọi chính thức của chiếc tai nghe này là AirPods Max.</p>', '2022-06-05 10:23:01', '2022-06-21 08:26:00'),
(28, 22, 23, 'Tai nghe True Wireless LG Tone Free Tone-FP9', 4690000, 0, 9999, 10, NULL, 0, '<p><strong>Tai nghe True Wireless LG Tone Free Tone-FP9s</strong> đi kèm với tính năng chống ồn chủ động, kết nối không dây qua Bluetooth hiện đại, chống nước và mồ hôi đạt tiêu chuẩn IPX4, micro cho chất lượng cuộc gọi rõ ràng,.. Hơn thế, thời lượng pin và khả năng sạc nhanh của chiếc tai nghe này được đánh giá là vô cùng tuyệt vời.</p>', '2022-06-05 10:27:21', '2022-06-21 08:26:00'),
(29, 23, 20, 'Tai nghe Chơi Game SoundPEATS G1', 590000, 6, 9999, 5, NULL, 0, '<p>Nếu bạn đang tìm kiếm một thiết bị đồng hành trong các trận chiến game máu lửa thì có thể tham khảo tai nghe SoundPEATS G1. Với những cải tiến vượt trội cả về công nghệ âm thanh lẫn thiết kế, chắc chắn sẽ chinh phục bạn ngay từ lần trải nghiệm đầu tiên.</p>', '2022-06-05 10:30:10', '2022-06-21 08:26:00'),
(30, 22, 25, 'Tai nghe Bluetooth Sony WH-XB900N', 5790000, 0, 9999, 12, NULL, 0, '<p>Tai nghe Bluetooth Sony WH-XB900N</p>\r\nKhả năng chống ồn đỉnh cao, âm thanh tinh tế, cân bằng là những gì mà chúng ta đã quá quen thuộc với dòng sản phẩm Sony WH-1000X của Sony. Nhưng mới đây những công nghệ tiên tiến bao gồm cả tính năng chống ồn đã được hãng mang xuống dòng sản phẩm Extra Bass của mình qua sản phẩm Sony WH-XB900N.', '2022-06-05 11:05:49', '2022-06-21 08:26:00'),
(31, 25, 21, 'Tai nghe True Wireless Monster Clarity 101 Airlinks', 1990000, 0, 9999, 12, NULL, 0, '<p>Tai nghe Monster Clarity 101 Airlinks chính hãng</p>\r\n<p>Thị trường tai nghe True Wireless trong phân khúc phổ thông hiện nay đã và đang sôi động hơn bao giờ hết và tất nhiên hãng âm thanh nổi tiếng của Mỹ - Monster sẽ không đứng ngoài cuộc chơi.</p>', '2022-06-05 11:09:10', '2022-06-21 08:26:00'),
(32, 26, 19, 'Tai nghe Bluetooth iClever TransNova BTH16', 990000, 0, 9999, 0, NULL, 0, 'iClever – một thương hiệu điện tử tiêu dùng được thành lập vào năm 2010. Tới nay, thương hiệu này đã mở rộng thị trường ra 8 quốc ra trên khắp 3 châu lục. Với mong muốn cải thiện cuộc sống hàng ngày của nhiều người, iClever luôn nỗ lực không ngừng để tạo ra các sản phẩm mới, chất lượng và sáng tạo hơn.   ', '2022-06-05 11:11:41', '2022-06-21 08:26:00'),
(33, 26, 19, 'Tai nghe iclever BTH12', 690000, 0, 9999, 5, NULL, 0, '<p>Thiết kế cải tiến, hỗ trợ kết nối Bluetooth 5.0, tích hợp mic, hỗ trợ sạc nhanh qua USB-C và cho phép tùy chọn âm lượng theo 3 mức 74/85 / 94dB,.. Tai nghe iClever BTH12 chắc chắn là một công cụ học tập, giải trí tuyệt vời dành cho trẻ em thời hiện đại.</p>', '2022-06-05 11:13:33', '2022-06-21 08:26:00'),
(34, 22, 22, 'Tai nghe HiFiMan HE-R10D', 29850000, 2, 9997, 12, NULL, 0, '<p>Tai nghe HiFiMan HE-R10D</p>', '2022-06-05 11:16:50', '2022-06-21 08:26:00'),
(35, 22, 20, 'Tai nghe Bluetooth SoundPeats Mini Pro', 1450000, 10, 9994, 10, NULL, 0, '<p>Xã hội phát triển kéo theo mong muốn và nhu cầu của người dùng cũng trở lên khắt khe hơn. Để đáp ứng kỳ vọng của nhiều người, thương hiệu SoundPeats sẽ tiếp tục trình làng mẫu sản phẩm mới mang tên SoundPeats Mini Pro. Đây là phiên bản cải tiến hoàn toàn so với mẫu Mini trước đó, hứa hẹn sẽ mang tới những tính năng và công nghệ hấp dẫn để làm hài lòng cả những tín đồ audiophile khó tính nhất.</p>', '2022-06-05 11:21:49', '2022-06-21 08:26:00'),
(39, 27, 22, 'Tai nghe Beats Studio 2.0', 5990000, 0, 75, 10, NULL, 0, '<h2 style=\"color: #222222; font-family: arial, Helvetica, sans-serif; line-height: 1.38; text-align: justify; margin-top: 0pt; margin-bottom: 8pt;\"><span style=\"font-family: arial, helvetica, sans-serif; font-size: 18pt;\"><strong><span style=\"background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">Tai nghe Beats Studio 2.0</span></strong></span></h2>\r\n<p style=\"color: #222222; font-family: arial, Helvetica, sans-serif; line-height: 1.38; text-align: justify; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 12pt; font-family: arial, helvetica, sans-serif; color: #000000; background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\"><strong>Beats Studio 2.0</strong> l&agrave; một trong những mẫu tai nghe được rất nhiều người d&ugrave;ng ưa th&iacute;ch của h&atilde;ng &acirc;m thanh Mỹ. <a style=\"color: #333333; text-decoration-line: none; font-size: inherit;\" href=\"https://tainghe.com.vn/beats-studio-2-0.html\"><strong>Beats Studio 2.0</strong></a> nổi bật với thiết kế đẹp mắt c&ugrave;ng với đ&oacute; l&agrave; một chất lượng &acirc;m thanh c&oacute; thể gi&uacute;p bạn trải nghiệm nhiều thể loại nhạc kh&aacute;c nhau.&nbsp;</span></p>', '2022-06-18 18:09:13', '2022-06-18 18:09:13'),
(40, 25, 20, 'Tai nghe Denon AH-C160W', 3100000, 0, 99, 0, NULL, 0, '<h2 style=\"font-size: 20px; color: #222222; font-family: arial, Helvetica, sans-serif; margin: 0px; font-weight: 300;\">Đặc điểm nổi bật của Tai nghe Denon AH-C160W</h2>', '2022-06-18 18:12:03', '2022-06-18 18:12:03'),
(41, 25, 23, 'Tai nghe True Wireless Jabra Elite 4 Active', 3150000, 0, 99, 15, NULL, 0, '<h2 style=\"font-size: 20px; color: #222222; font-family: arial, Helvetica, sans-serif; margin: 0px; font-weight: 300;\">Đặc điểm nổi bật của Tai nghe True Wireless Jabra Elite 4 Active</h2>', '2022-06-18 18:13:54', '2022-06-18 18:13:54'),
(42, 23, 21, 'Tai nghe Skullcandy Crusher ANC', 8600000, 0, 99, 30, NULL, 0, '<h2 style=\"color: #222222; font-family: arial, Helvetica, sans-serif;\"><span style=\"font-size: 12pt;\">Tai nghe Skullcandy Crusher ANC ch&iacute;nh h&atilde;ng</span></h2>\r\n<p style=\"color: #222222; font-family: arial, Helvetica, sans-serif;\"><span style=\"font-size: 12pt;\">Mới đ&acirc;y&nbsp;<a style=\"color: #333333; text-decoration-line: none; font-size: inherit;\" href=\"https://tainghe.com.vn/brand/skullcandy\" target=\"_blank\" rel=\"noopener\">Skullcandy</a>&nbsp;đ&atilde; tung ra một loạt sản phẩm mới nhất , để giới thiệu đến với người ti&ecirc;u d&ugrave;ng những t&iacute;nh năng mới , c&ocirc;ng nghệ mới v&agrave; những cải thiện về chất &acirc;m v&ocirc; c&ugrave;ng đ&aacute;ng sở hữu trong cuối năm 2019 n&agrave;y. Trong đ&oacute; sản phẩm mang nhiều t&iacute;nh năng mới mẻ nhất, đột ph&aacute; nhất của&nbsp;<a style=\"color: #333333; text-decoration-line: none; font-size: inherit;\" href=\"https://tainghe.com.vn/brand/skullcandy\" target=\"_blank\" rel=\"noopener\">Skullcandy</a>&nbsp;l&agrave; tai nghe&nbsp;<a style=\"color: #333333; text-decoration-line: none; font-size: inherit;\" href=\"https://tainghe.com.vn/tai-nghe-skullcandy-crusher-anc.html\" target=\"_blank\" rel=\"noopener\">Skullcandy Crusher ANC</a>.</span></p>', '2022-06-18 18:16:05', '2022-06-18 18:16:05');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `slide_id` int(10) NOT NULL,
  `slide_name` varchar(255) NOT NULL,
  `slide_good` varchar(255) NOT NULL,
  `slide_image` text NOT NULL,
  `slide_desc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`slide_id`, `slide_name`, `slide_good`, `slide_image`, `slide_desc`) VALUES
(6, 'Tai nghe', 'TIpsum dolor', 'JBL_E55BT_KEY_BLACK_6175_FS_x1-1605x1605px.png', 'Thay vì sử dụng dây nối như dòng tai nghe truyền thống, thiết bị âm thanh này đã đem đến cho người dùng những trải nghiệm hoàn toàn mới ngay từ “ngoại hình” ấn tương, tiện ích của nó. Không còn những chiếc dây nối rắc rối, phức tạp'),
(7, 'Tai nghe', 'Consectetur Elit', 'JBL_JR 310BT_Product Image_Hero_Skyblue.png', 'Giớ đây, bạn sẽ được tận hưởng những công nghệ âm thanh chất lượng, hiện đại với sự tối ưu hoàn toàn trong thiết kế. Ngoài ra, các phím chức năng đều được tích hợp đầy đủ giúp người dùng dễ dàng thao tác khi dùng.'),
(8, 'Tai nghe', 'Next-gen design', 'JBL_E55BT_KEY_RED_6063_FS_x1-1605x1605px.webp', ' Không còn những chiếc dây nối rắc rối, phức tạp. Giớ đây, bạn sẽ được tận hưởng những công nghệ âm thanh chất lượng.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `FK_Cart_Cus` (`cus_id`),
  ADD KEY `FK_Cart_Pro` (`pro_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`image_id`),
  ADD KEY `fk_img_pro` (`pro_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `FK_Oders_Customers` (`cus_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`detail_id`),
  ADD KEY `FK_Details_Orders` (`order_id`),
  ADD KEY `FK_Detail_Products` (`pro_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `fk_pro_cat` (`cat_id`),
  ADD KEY `fk_pro_brand` (`brand_id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`slide_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `slide_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `FK_Cart_Cus` FOREIGN KEY (`cus_id`) REFERENCES `customers` (`customer_id`),
  ADD CONSTRAINT `FK_Cart_Pro` FOREIGN KEY (`pro_id`) REFERENCES `products` (`product_id`);

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `fk_img_pro` FOREIGN KEY (`pro_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `FK_Oders_Customers` FOREIGN KEY (`cus_id`) REFERENCES `customers` (`customer_id`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `FK_Detail_Products` FOREIGN KEY (`pro_id`) REFERENCES `products` (`product_id`),
  ADD CONSTRAINT `FK_Details_Orders` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_pro_brand` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`brand_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_pro_cat` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`cat_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
