-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2022 at 06:16 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

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
(25, 'Sony', 'NO', '2022-06-05 10:10:26', '2022-06-05 10:10:36');

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
(13, 'Thu Huong', 'huong1234@gmail.com', 'ee4f60d01bda307268367e6f4b427995', '', '', '', '', '', '2022-06-04 13:26:04', '2022-06-04 13:26:04'),
(14, 'Nguyen Mai Phuong', 'phuongsapphire2209hn@gmail.com', 'fea370856fe9651c7c0e628146d43410', 'Vietnam', 'Ha Noi', '0123456789', 'Ha Noi', '', '2022-06-15 12:25:19', '2022-06-15 14:54:33');

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
(88, 35, 'products/nc_sp3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `cus_id` int(10) NOT NULL,
  `order_amount` double NOT NULL,
  `order_status` text NOT NULL,
  `order_address` varchar(255) NOT NULL,
  `order_receiver` varchar(50) NOT NULL,
  `order_phone` varchar(10) NOT NULL,
  `order_note` text DEFAULT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `cus_id`, `order_amount`, `order_status`, `order_address`, `order_receiver`, `order_phone`, `order_note`, `createdAt`, `updatedAt`) VALUES
(1, 14, 670.8, 'Thanh toán khi nhận hàng', 'Ha Noi', 'Nguyen Mai Phuong', '0123456789', 'Note', '2012-01-01 12:25:30', '2022-06-15 15:41:34'),
(2, 14, 258, 'Thanh toán khi nhận hàng', 'Ha Noi', 'Nguyen Mai Phuong', '0123456789', 'Note', '2013-02-02 12:25:30', '2022-06-15 15:41:34'),
(3, 14, 97.9, 'Thanh toán khi nhận hàng', 'Ha Noi', 'Nguyen Mai Phuong', '0123456789', 'Note', '2014-06-03 14:49:24', '2022-06-15 15:41:34'),
(4, 14, 167.7, 'Thanh toán khi nhận hàng', 'Ha Noi', 'Nguyen Mai Phuong', '0123456789', 'Note', '2015-06-04 14:49:37', '2022-06-15 15:41:34'),
(5, 14, 200.6, 'Thanh toán khi nhận hàng', 'Ha Noi', 'Nguyen Mai Phuong', '0123456789', 'Note', '2016-06-05 14:49:49', '2022-06-15 15:41:35'),
(6, 14, 1087.422, 'Thanh toán khi nhận hàng', 'Ha Noi', 'Nguyen Mai Phuong', '0123456789', 'Note', '2017-06-06 14:50:00', '2022-06-15 15:41:35'),
(7, 14, 60.2205, 'Thanh toán khi nhận hàng', 'Ha Noi', 'Nguyen Mai Phuong', '0123456789', 'Note', '2018-06-06 14:50:14', '2022-06-15 15:41:35'),
(8, 14, 211.2461, 'Thanh toán khi nhận hàng', 'Ha Noi', 'Nguyen Mai Phuong', '0123456789', 'Note', '2019-06-07 14:50:33', '2022-06-15 15:41:35'),
(9, 14, 128.07, 'Thanh toán khi nhận hàng', 'Ha Noi', 'Nguyen Mai Phuong', '0123456789', 'Note', '2020-06-08 14:50:45', '2022-06-15 15:41:34'),
(10, 14, 193.8992, 'Thanh toán khi nhận hàng', 'Ha Noi', 'Nguyen Mai Phuong', '0123456789', 'Note', '2021-06-09 14:50:59', '2022-06-15 15:41:35'),
(11, 14, 1132.63, 'Thanh toán khi nhận hàng', 'Ha Noi', 'Nguyen Mai Phuong', '0123456789', 'Note', '2022-01-10 14:51:09', '2022-06-15 15:44:04'),
(12, 14, 131.166, 'Thanh toán khi nhận hàng', 'Ha Noi', 'Nguyen Mai Phuong', '0123456789', 'Note', '2022-02-11 14:51:21', '2022-06-15 15:44:04'),
(13, 14, 113.05, 'Thanh toán khi nhận hàng', 'Ha Noi', 'Nguyen Mai Phuong', '0123456789', 'Note', '2022-03-12 14:51:44', '2022-06-15 15:44:04'),
(14, 14, 84.788, 'Thanh toán khi nhận hàng', 'Ha Noi', 'Nguyen Mai Phuong', '0123456789', 'Note', '2022-04-13 14:52:05', '2022-06-15 15:44:04'),
(15, 14, 123.795, 'Thanh toán khi nhận hàng', 'Ha Noi', 'Nguyen Mai Phuong', '0123456789', 'Note', '2022-05-14 14:52:15', '2022-06-15 15:41:35'),
(16, 14, 167.7, 'Thanh toán khi nhận hàng', 'Ha Noi', 'Nguyen Mai Phuong', '0123456789', 'Note', '2022-06-01 14:52:29', '2022-06-15 15:41:35'),
(17, 14, 128.07, 'Thanh toán khi nhận hàng', 'Ha Noi', 'Nguyen Mai Phuong', '0123456789', 'Note', '2022-06-02 14:53:00', '2022-06-15 15:41:34'),
(18, 14, 1132.6304, 'Thanh toán khi nhận hàng', 'Ha Noi', 'Nguyen Mai Phuong', '0123456789', 'Note', '2022-06-03 14:53:27', '2022-06-15 15:41:34'),
(19, 14, 724.948, 'Thanh toán khi nhận hàng', 'Ha Noi', 'Nguyen Mai Phuong', '0123456789', 'Note', '2022-06-04 14:53:38', '2022-06-15 15:41:35'),
(20, 14, 468.0924, 'Thanh toán khi nhận hàng', 'Ha Noi', 'Nguyen Mai Phuong', '0123456789', 'Note', '2022-06-05 14:57:16', '2022-06-15 15:41:34'),
(21, 14, 715.47, 'Thanh toán khi nhận hàng', 'Ha Noi', 'Nguyen Mai Phuong', '0123456789', 'Note', '2022-06-06 14:57:51', '2022-06-15 15:41:34'),
(22, 14, 368.3, 'Thanh toán khi nhận hàng', 'Ha Noi', 'Nguyen Mai Phuong', '0123456789', 'Note', '2022-06-07 15:07:41', '2022-06-15 15:41:35'),
(23, 14, 123.795, 'Thanh toán khi nhận hàng', 'Ha Noi', 'Nguyen Mai Phuong', '0123456789', 'Note', '2022-06-08 15:07:53', '2022-06-15 15:41:35'),
(24, 14, 362.474, 'Thanh toán khi nhận hàng', 'Ha Noi', 'Nguyen Mai Phuong', '0123456789', 'Note', '2022-06-09 15:08:02', '2022-06-15 15:41:34'),
(25, 14, 170.76, 'Thanh toán khi nhận hàng', 'Ha Noi', 'Nguyen Mai Phuong', '0123456789', 'Note', '2022-06-10 15:08:33', '2022-06-15 15:41:35'),
(26, 14, 96.9496, 'Thanh toán khi nhận hàng', 'Ha Noi', 'Nguyen Mai Phuong', '0123456789', 'Note', '2022-06-11 15:08:43', '2022-06-15 15:41:35'),
(27, 14, 140.5145, 'Thanh toán khi nhận hàng', 'Ha Noi', 'Nguyen Mai Phuong', '0123456789', 'Note', '2022-06-12 15:09:33', '2022-06-15 15:41:34'),
(28, 14, 302.0512, 'Thanh toán khi nhận hàng', 'Ha Noi', 'Nguyen Mai Phuong', '0123456789', 'Note', '2022-06-13 15:09:45', '2022-06-15 15:41:35'),
(29, 14, 387.7984, 'Thanh toán khi nhận hàng', 'Ha Noi', 'Nguyen Mai Phuong', '0123456789', 'Note', '2022-06-14 15:09:56', '2022-06-15 15:41:34'),
(30, 14, 200.735, 'Thanh toán khi nhận hàng', 'Ha Noi', 'Nguyen Mai Phuong', '0345090535', 'Note', '2022-06-15 15:44:24', '2022-06-15 15:49:58'),
(31, 14, 2174.844, 'Thanh toán khi nhận hàng', 'Ha Noi', 'Nguyen Mai Phuong', '0345090535', 'Note', '2022-06-16 15:44:38', '2022-06-15 15:49:58'),
(32, 14, 226.1, 'Thanh toán khi nhận hàng', 'Ha Noi', 'Nguyen Mai Phuong', '0345090535', 'Note', '2022-06-17 15:44:53', '2022-06-15 15:49:58'),
(33, 14, 128.07, 'Thanh toán khi nhận hàng', 'Ha Noi', 'Nguyen Mai Phuong', '0123456789', 'Note', '2022-06-18 14:53:00', '2022-06-15 15:41:34'),
(34, 14, 1132.6304, 'Thanh toán khi nhận hàng', 'Ha Noi', 'Nguyen Mai Phuong', '0123456789', 'Note', '2022-06-19 14:53:27', '2022-06-15 15:41:34'),
(35, 14, 724.948, 'Thanh toán khi nhận hàng', 'Ha Noi', 'Nguyen Mai Phuong', '0123456789', 'Note', '2022-06-20 14:53:38', '2022-06-15 15:41:35'),
(36, 14, 468.0924, 'Thanh toán khi nhận hàng', 'Ha Noi', 'Nguyen Mai Phuong', '0123456789', 'Note', '2022-06-21 14:57:16', '2022-06-15 15:41:34'),
(37, 14, 715.47, 'Thanh toán khi nhận hàng', 'Ha Noi', 'Nguyen Mai Phuong', '0123456789', 'Note', '2022-06-22 14:57:51', '2022-06-15 15:41:34'),
(38, 14, 368.3, 'Thanh toán khi nhận hàng', 'Ha Noi', 'Nguyen Mai Phuong', '0123456789', 'Note', '2022-06-23 15:07:41', '2022-06-15 15:41:35'),
(39, 14, 123.795, 'Thanh toán khi nhận hàng', 'Ha Noi', 'Nguyen Mai Phuong', '0123456789', 'Note', '2022-06-24 15:07:53', '2022-06-15 15:41:35'),
(40, 14, 170.76, 'Thanh toán khi nhận hàng', 'Ha Noi', 'Nguyen Mai Phuong', '0123456789', 'Note', '2022-06-25 15:08:33', '2022-06-15 15:41:35'),
(41, 14, 96.9496, 'Thanh toán khi nhận hàng', 'Ha Noi', 'Nguyen Mai Phuong', '0123456789', 'Note', '2022-06-26 15:08:43', '2022-06-15 15:41:35'),
(42, 14, 140.5145, 'Thanh toán khi nhận hàng', 'Ha Noi', 'Nguyen Mai Phuong', '0123456789', 'Note', '2022-06-27 15:09:33', '2022-06-15 15:41:34'),
(43, 14, 302.0512, 'Thanh toán khi nhận hàng', 'Ha Noi', 'Nguyen Mai Phuong', '0123456789', 'Note', '2022-06-28 15:09:45', '2022-06-15 15:41:35'),
(44, 14, 387.7984, 'Thanh toán khi nhận hàng', 'Ha Noi', 'Nguyen Mai Phuong', '0123456789', 'Note', '2022-06-29 15:09:56', '2022-06-15 15:41:34'),
(45, 14, 200.735, 'Thanh toán khi nhận hàng', 'Ha Noi', 'Nguyen Mai Phuong', '0345090535', 'Note', '2022-06-30 15:44:24', '2022-06-15 15:49:58'),
(46, 14, 2174.844, 'Thanh toán khi nhận hàng', 'Ha Noi', 'Nguyen Mai Phuong', '0345090535', 'Note', '2022-07-18 15:44:38', '2022-06-15 15:49:58'),
(47, 14, 226.1, 'Thanh toán khi nhận hàng', 'Ha Noi', 'Nguyen Mai Phuong', '0345090535', 'Note', '2022-08-17 15:44:53', '2022-06-15 15:49:58'),
(48, 14, 388, 'Thanh toán khi nhận hàng', 'Ha Noi', 'Nguyen Mai Phuong', '0123456789', 'Note', '2022-09-29 15:09:56', '2022-06-15 15:41:34'),
(49, 14, 201, 'Thanh toán khi nhận hàng', 'Ha Noi', 'Nguyen Mai Phuong', '0345090535', 'Note', '2022-10-30 15:44:24', '2022-06-15 15:49:58'),
(50, 14, 2175, 'Thanh toán khi nhận hàng', 'Ha Noi', 'Nguyen Mai Phuong', '0345090535', 'Note', '2022-11-18 15:44:38', '2022-06-15 15:49:58'),
(51, 14, 226, 'Thanh toán khi nhận hàng', 'Ha Noi', 'Nguyen Mai Phuong', '0345090535', 'Note', '2022-12-17 15:44:53', '2022-06-15 15:49:58');

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
(1, 25, 1, 4, 258, '', '2022-06-15 12:25:30', '2022-06-15 12:25:30'),
(2, 25, 1, 1, 258, '', '2022-06-15 12:25:30', '2022-06-15 12:25:30'),
(3, 24, 3, 1, 110, '', '2022-06-15 14:49:24', '2022-06-15 14:49:24'),
(4, 25, 4, 1, 258, '', '2022-06-15 14:49:37', '2022-06-15 14:49:37'),
(5, 26, 5, 1, 236, '', '2022-06-15 14:49:49', '2022-06-15 14:49:49'),
(6, 27, 6, 3, 426.44, '', '2022-06-15 14:50:00', '2022-06-15 14:50:00'),
(7, 29, 7, 3, 21.13, '', '2022-06-15 14:50:14', '2022-06-15 14:50:14'),
(8, 29, 8, 3, 21.13, '', '2022-06-15 14:50:33', '2022-06-15 14:50:33'),
(9, 31, 8, 2, 85.81, '', '2022-06-15 14:50:33', '2022-06-15 14:50:33'),
(10, 32, 9, 3, 42.69, '', '2022-06-15 14:50:45', '2022-06-15 14:50:45'),
(11, 30, 10, 2, 110.17, '', '2022-06-15 14:50:59', '2022-06-15 14:50:59'),
(12, 34, 11, 1, 1287.08, '', '2022-06-15 14:51:09', '2022-06-15 14:51:09'),
(13, 35, 12, 2, 72.87, '', '2022-06-15 14:51:21', '2022-06-15 14:51:21'),
(14, 33, 13, 4, 29.75, '', '2022-06-15 14:51:44', '2022-06-15 14:51:44'),
(15, 33, 14, 3, 29.75, '', '2022-06-15 14:52:05', '2022-06-15 14:52:05'),
(16, 28, 15, 1, 137.55, '', '2022-06-15 14:52:15', '2022-06-15 14:52:15'),
(17, 25, 16, 1, 258, '', '2022-06-15 14:52:29', '2022-06-15 14:52:29'),
(18, 32, 17, 3, 42.69, '', '2022-06-15 14:53:00', '2022-06-15 14:53:00'),
(19, 34, 18, 1, 1287.08, '', '2022-06-15 14:53:27', '2022-06-15 14:53:27'),
(20, 27, 19, 2, 426.44, '', '2022-06-15 14:53:38', '2022-06-15 14:53:38'),
(21, 30, 20, 4, 110.17, '', '2022-06-15 14:57:16', '2022-06-15 14:57:16'),
(22, 29, 20, 4, 21.13, '', '2022-06-15 14:57:16', '2022-06-15 14:57:16'),
(23, 24, 21, 6, 110, '', '2022-06-15 14:57:51', '2022-06-15 14:57:51'),
(24, 32, 21, 3, 42.69, '', '2022-06-15 14:57:51', '2022-06-15 14:57:51'),
(25, 26, 22, 1, 236, '', '2022-06-15 15:07:41', '2022-06-15 15:07:41'),
(26, 25, 22, 1, 258, '', '2022-06-15 15:07:41', '2022-06-15 15:07:41'),
(27, 28, 23, 1, 137.55, '', '2022-06-15 15:07:53', '2022-06-15 15:07:53'),
(28, 27, 24, 1, 426.44, '', '2022-06-15 15:08:02', '2022-06-15 15:08:02'),
(29, 32, 25, 4, 42.69, '', '2022-06-15 15:08:33', '2022-06-15 15:08:33'),
(30, 30, 26, 1, 110.17, '', '2022-06-15 15:08:43', '2022-06-15 15:08:43'),
(31, 29, 27, 7, 21.13, '', '2022-06-15 15:09:33', '2022-06-15 15:09:33'),
(32, 31, 28, 4, 85.81, '', '2022-06-15 15:09:45', '2022-06-15 15:09:45'),
(33, 30, 29, 4, 110.17, '', '2022-06-15 15:09:56', '2022-06-15 15:09:56'),
(34, 29, 30, 10, 21.13, '', '2022-06-15 15:44:24', '2022-06-15 15:44:24'),
(35, 27, 31, 6, 426.44, '', '2022-06-15 15:44:38', '2022-06-15 15:44:38'),
(36, 33, 32, 8, 29.75, '', '2022-06-15 15:44:53', '2022-06-15 15:44:53'),
(37, 29, 20, 4, 21, '', '2022-06-15 14:57:16', '2022-06-15 14:57:16'),
(38, 24, 21, 6, 110, '', '2022-06-15 14:57:51', '2022-06-15 14:57:51'),
(39, 32, 21, 3, 43, '', '2022-06-15 14:57:51', '2022-06-15 14:57:51'),
(40, 26, 22, 1, 236, '', '2022-06-15 15:07:41', '2022-06-15 15:07:41'),
(41, 25, 22, 1, 258, '', '2022-06-15 15:07:41', '2022-06-15 15:07:41'),
(42, 28, 23, 1, 138, '', '2022-06-15 15:07:53', '2022-06-15 15:07:53'),
(43, 27, 24, 1, 426, '', '2022-06-15 15:08:02', '2022-06-15 15:08:02'),
(44, 32, 25, 4, 43, '', '2022-06-15 15:08:33', '2022-06-15 15:08:33'),
(45, 30, 26, 1, 110, '', '2022-06-15 15:08:43', '2022-06-15 15:08:43'),
(46, 29, 27, 7, 21, '', '2022-06-15 15:09:33', '2022-06-15 15:09:33'),
(47, 31, 28, 4, 86, '', '2022-06-15 15:09:45', '2022-06-15 15:09:45'),
(48, 30, 29, 4, 110, '', '2022-06-15 15:09:56', '2022-06-15 15:09:56'),
(49, 29, 30, 10, 21, '', '2022-06-15 15:44:24', '2022-06-15 15:44:24'),
(50, 27, 31, 6, 426, '', '2022-06-15 15:44:38', '2022-06-15 15:44:38'),
(51, 33, 32, 8, 30, '', '2022-06-15 15:44:53', '2022-06-15 15:44:53'),
(52, 30, 29, 4, 110, '', '2022-06-15 15:09:56', '2022-06-15 15:09:56'),
(53, 29, 30, 10, 21, '', '2022-06-15 15:44:24', '2022-06-15 15:44:24'),
(54, 27, 31, 6, 426, '', '2022-06-15 15:44:38', '2022-06-15 15:44:38'),
(55, 33, 32, 8, 30, '', '2022-06-15 15:44:53', '2022-06-15 15:44:53');

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
(24, 27, 24, 'Tai nghe Shure SRH440', 2255000, 10, 9999, 10, NULL, 0, 'Tai nghe Shure SRH 440 rất phổ biến trong studio, tai nghe với âm thanh cân bằng, tai nghe cỡ to SRH440 có thể gập lại dễ dàng để mang theo.\r\nĐây là một trong những headphone tai nghe studio giá hợp lý mà chất lượng nếu bạn tìm tai nghe kín âm thanh tầm trung chất lượng\r\nTai nghe SRH440 Professional Studio từ Shure cung cấp âm thanh đặc biệt và thoải mái.', '2022-05-30 16:21:54', '2022-06-14 16:30:35'),
(25, 27, 18, 'Tai nghe Audio Technica ATH-M70X', 5990000, 7, 9999, 35, NULL, 0, 'M-Series của AudioTechnica là dòng tai nghe phòng thu chuyên nghiệp, được chú trọng chế tạo với kiểu dáng, thiết kế và chất lượng âm thanh trung thực nhất. M70x hiện là tai nghe đầu bảng thuộc dòng M-series với tất cả những đặc điểm tuyệt vời nêu trên. \r\n\r\nM70x có chất âm chính xác, tất cả các chi tiết được gia công kỹ càng, các khớp nối và headband bằng kim loại cho độ bền cao nhất. \r\n\r\nDriver 45mm với cuộn cảm nhôm, có trọng lượng nhẹ, linh hoạt với các rung động nhanh, nhằm tái tạo âm thanh thật tốt mà không gây ra hiện tượng trễ tiếng. ', '2022-06-04 18:10:28', '2022-06-14 16:32:08'),
(26, 22, 25, 'Tai nghe Bluetooth Sony WH-1000XM4', 5490000, 3, 9999, 15, NULL, 0, 'Tai nghe Sony WH-1000XM4 chính hãng\r\nMới đây, Sony vừa công bố thế hệ thứ 4 của dòng tai nghe chụp đầu chống ồn cao cấp: WH1000XM4. Sony WH-1000XM4 có thiết kế tương tự như người đàn anh của mình, và cũng được trang bị bộ xử lý chống ồn QN1, thứ giúp cho Sony WH-1000XM3 trở thành một trong những tai nghe không dây tốt nhất trong phân khúc chống ồn chủ động.', '2022-06-05 10:12:10', '2022-06-14 16:32:55'),
(27, 22, 17, 'Tai nghe Apple AirPods Max chính hãng ZA/A', 12850000, 6, 9999, 15, NULL, 0, '<p><strong>Tai nghe Apple Airpod Max</strong></p>\r\n<p>Vào ngày 08/12, Apple đã chính thức công bố chiếc tai nghe trùm đầu (Over-ear) đầu tiên của mình, tên gọi chính thức của chiếc tai nghe này là AirPods Max.</p>', '2022-06-05 10:23:01', '2022-06-14 16:34:27'),
(28, 22, 23, 'Tai nghe True Wireless LG Tone Free Tone-FP9', 4690000, 0, 9999, 10, NULL, 0, '<p><strong>Tai nghe True Wireless LG Tone Free Tone-FP9s</strong> đi kèm với tính năng chống ồn chủ động, kết nối không dây qua Bluetooth hiện đại, chống nước và mồ hôi đạt tiêu chuẩn IPX4, micro cho chất lượng cuộc gọi rõ ràng,.. Hơn thế, thời lượng pin và khả năng sạc nhanh của chiếc tai nghe này được đánh giá là vô cùng tuyệt vời.</p>', '2022-06-05 10:27:21', '2022-06-14 16:35:45'),
(29, 23, 20, 'Tai nghe Chơi Game SoundPEATS G1', 590000, 6, 9999, 5, NULL, 0, '<p>Nếu bạn đang tìm kiếm một thiết bị đồng hành trong các trận chiến game máu lửa thì có thể tham khảo tai nghe SoundPEATS G1. Với những cải tiến vượt trội cả về công nghệ âm thanh lẫn thiết kế, chắc chắn sẽ chinh phục bạn ngay từ lần trải nghiệm đầu tiên.</p>', '2022-06-05 10:30:10', '2022-06-14 16:36:32'),
(30, 22, 25, 'Tai nghe Bluetooth Sony WH-XB900N', 5790000, 0, 9999, 12, NULL, 0, '<p>Tai nghe Bluetooth Sony WH-XB900N</p>\r\nKhả năng chống ồn đỉnh cao, âm thanh tinh tế, cân bằng là những gì mà chúng ta đã quá quen thuộc với dòng sản phẩm Sony WH-1000X của Sony. Nhưng mới đây những công nghệ tiên tiến bao gồm cả tính năng chống ồn đã được hãng mang xuống dòng sản phẩm Extra Bass của mình qua sản phẩm Sony WH-XB900N.', '2022-06-05 11:05:49', '2022-06-14 16:37:33'),
(31, 25, 21, 'Tai nghe True Wireless Monster Clarity 101 Airlinks', 1990000, 0, 9999, 12, NULL, 0, '<p>Tai nghe Monster Clarity 101 Airlinks chính hãng</p>\r\n<p>Thị trường tai nghe True Wireless trong phân khúc phổ thông hiện nay đã và đang sôi động hơn bao giờ hết và tất nhiên hãng âm thanh nổi tiếng của Mỹ - Monster sẽ không đứng ngoài cuộc chơi.</p>', '2022-06-05 11:09:10', '2022-06-14 16:38:32'),
(32, 26, 19, 'Tai nghe Bluetooth iClever TransNova BTH16', 990000, 0, 9999, 0, NULL, 0, 'iClever – một thương hiệu điện tử tiêu dùng được thành lập vào năm 2010. Tới nay, thương hiệu này đã mở rộng thị trường ra 8 quốc ra trên khắp 3 châu lục. Với mong muốn cải thiện cuộc sống hàng ngày của nhiều người, iClever luôn nỗ lực không ngừng để tạo ra các sản phẩm mới, chất lượng và sáng tạo hơn.   ', '2022-06-05 11:11:41', '2022-06-14 16:39:24'),
(33, 26, 19, 'Tai nghe iclever BTH12', 690000, 0, 9999, 5, NULL, 0, '<p>Thiết kế cải tiến, hỗ trợ kết nối Bluetooth 5.0, tích hợp mic, hỗ trợ sạc nhanh qua USB-C và cho phép tùy chọn âm lượng theo 3 mức 74/85 / 94dB,.. Tai nghe iClever BTH12 chắc chắn là một công cụ học tập, giải trí tuyệt vời dành cho trẻ em thời hiện đại.</p>', '2022-06-05 11:13:33', '2022-06-14 16:40:12'),
(34, 22, 22, 'Tai nghe HiFiMan HE-R10D', 29850000, 0, 9999, 12, NULL, 0, '<p>Tai nghe HiFiMan HE-R10D</p>', '2022-06-05 11:16:50', '2022-06-14 16:40:54'),
(35, 22, 20, 'Tai nghe Bluetooth SoundPeats Mini Pro', 1450000, 5, 9999, 10, NULL, 0, '<p>Xã hội phát triển kéo theo mong muốn và nhu cầu của người dùng cũng trở lên khắt khe hơn. Để đáp ứng kỳ vọng của nhiều người, thương hiệu SoundPeats sẽ tiếp tục trình làng mẫu sản phẩm mới mang tên SoundPeats Mini Pro. Đây là phiên bản cải tiến hoàn toàn so với mẫu Mini trước đó, hứa hẹn sẽ mang tới những tính năng và công nghệ hấp dẫn để làm hài lòng cả những tín đồ audiophile khó tính nhất.</p>', '2022-06-05 11:21:49', '2022-06-14 16:41:44');

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
(6, 'JBL Quantum ONE', 'Ipsum dolor', 'JBL_E55BT_KEY_BLACK_6175_FS_x1-1605x1605px.png', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. A optio, voluptatum aperiam nobis quis maxime corporis porro alias soluta sunt quae consectetur aliquid blanditiis perspiciatis labore cumque, ullam, quam eligendi!'),
(7, 'JBL JR 310BT', 'Consectetur Elit', 'JBL_JR 310BT_Product Image_Hero_Skyblue.png', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Explicabo aut fugiat, libero magnam nemo inventore in tempora beatae officiis temporibus odit deserunt molestiae amet quam, asperiores, iure recusandae nulla labore!'),
(8, 'JBL TUNE 750TNC', 'Next-gen design', 'JBL_E55BT_KEY_RED_6063_FS_x1-1605x1605px.webp', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati dolor commodi dignissimos culpa, eaque eos necessitatibus possimus veniam, cupiditate rerum deleniti? Libero, ducimus error? Beatae velit dolore sint explicabo! Fugit.');

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
  MODIFY `brand_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

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