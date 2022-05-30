-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 30, 2022 lúc 02:12 PM
-- Phiên bản máy phục vụ: 10.4.22-MariaDB
-- Phiên bản PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `fashion_store`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admins`
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
-- Đang đổ dữ liệu cho bảng `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_name`, `admin_email`, `admin_password`, `admin_image`, `admin_country`, `admin_about`, `admin_phone`, `createdAt`, `updatedAt`) VALUES
(2, 'Boss Hoang', 'hoangbvgch17056@fpt.edu.vn', 'hoangdepzai', '', 'Vietnam', '<p>I am the 1st Admin a</p>', '0974-555-666', '2022-05-22 02:56:57', '2022-05-25 10:54:30'),
(3, 'Admin Duong', 'duong123@gmail.com', '123456', 'admin.jpg', 'Vietnam', '<p>I am the 2th Admin</p>', '0933-777-888', '2022-05-22 02:56:57', '2022-05-22 02:57:20'),
(4, 'Admin Viet Hoang', 'hoang1835@gmail.com', 'hoangpzo123', 'admin1.jpg', 'Vietnam', '<p><span style=\"color: #444444; font-family: sans-serif; font-size: 13.12px;\">I am the creator of this website</span></p>', '0962-379-888', '2022-05-22 02:56:57', '2022-05-22 02:57:20'),
(8, 'Nguyen van Duong', 'duongvipro2k1@gmail.com', 'duong2k1', 'HN.png', 'Việt Nam', 'haha', '0321321321', '2022-05-23 06:48:07', '2022-05-23 06:48:07');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(10) NOT NULL,
  `brand_title` text CHARACTER SET utf8mb4 NOT NULL,
  `brand_desc` text CHARACTER SET utf8mb4 NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`, `brand_desc`, `createdAt`, `updatedAt`) VALUES
(11, 'FIONA', '', '2022-05-27 06:07:42', '2022-05-27 06:07:42'),
(12, 'CANIFA', '', '2022-05-27 06:07:55', '2022-05-27 06:07:55'),
(13, 'Yody', '', '2022-05-27 06:08:35', '2022-05-27 06:08:35'),
(14, 'Elise', '', '2022-05-27 06:09:21', '2022-05-27 06:09:21'),
(15, 'Vascara', '', '2022-05-27 06:09:41', '2022-05-27 06:09:41');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
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
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(10) NOT NULL,
  `cat_title` text CHARACTER SET utf8mb4 NOT NULL,
  `cat_desc` text CHARACTER SET utf8mb4 NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`, `cat_desc`, `createdAt`, `updatedAt`) VALUES
(12, 'Váy, Đầm', '', '2022-05-27 06:04:08', '2022-05-27 06:04:08'),
(13, 'Chân váy', '', '2022-05-27 06:04:37', '2022-05-27 06:04:37'),
(14, 'Sơ mi nữ', '', '2022-05-27 06:04:52', '2022-05-27 06:04:52'),
(15, 'Quần âu nữ', '', '2022-05-27 06:05:06', '2022-05-27 06:05:06'),
(16, 'Áo len nữ', '', '2022-05-27 06:05:29', '2022-05-27 06:05:29'),
(17, 'Áo cotton nữ', '', '2022-05-27 06:05:56', '2022-05-27 06:05:56'),
(18, 'Quần jean', '', '2022-05-27 06:06:11', '2022-05-27 06:06:11'),
(19, 'Áo dài', '', '2022-05-27 06:06:24', '2022-05-27 06:06:24'),
(20, 'Áo khoác nữ', '', '2022-05-27 06:06:39', '2022-05-27 06:06:39'),
(21, 'Quần soóc', '', '2022-05-27 06:07:09', '2022-05-27 06:07:09');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customers`
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

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `images`
--

CREATE TABLE `images` (
  `image_id` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `image_link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `images`
--

INSERT INTO `images` (`image_id`, `pro_id`, `image_link`) VALUES
(9, 10, 'ao-so-mi-nu-tron-from-ao-doc-dao-679-1.jpg'),
(10, 13, 'ao-so-mi-nu-tron-from-ao-doc-dao-679-2.jpg'),
(11, 13, 'ao-so-mi-nu-tron-from-ao-doc-dao-679-3.jpg'),
(12, 11, 'ao-so-mi-nu-tron-from-ao-doc-dao-679-1.jpg'),
(13, 10, 'ao-so-mi-nu-tron-from-ao-doc-dao-679-2.jpg'),
(14, 12, 'ao-so-mi-nu-tron-from-ao-doc-dao-679-3.jpg'),
(15, 11, 'ao-so-mi-nu-tron-from-ao-doc-dao-679-1.jpg'),
(16, 12, 'ao-so-mi-nu-tron-from-ao-doc-dao-679-3.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `order_id` int(10) NOT NULL,
  `cus_id` int(10) NOT NULL,
  `order_amount` int(100) NOT NULL,
  `order_status` text NOT NULL,
  `order_address` varchar(255) NOT NULL,
  `order_receiver` varchar(50) NOT NULL,
  `order_phone` varchar(10) NOT NULL,
  `order_note` text DEFAULT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
--

CREATE TABLE `order_details` (
  `detail_id` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `size` varchar(20) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `product_id` int(10) NOT NULL,
  `cat_id` int(10) NOT NULL,
  `brand_id` int(10) NOT NULL,
  `product_title` text NOT NULL,
  `product_price` int(100) NOT NULL,
  `product_discount` int(11) NOT NULL,
  `product_desc` text NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`product_id`, `cat_id`, `brand_id`, `product_title`, `product_price`, `product_discount`, `product_desc`, `createdAt`, `updatedAt`) VALUES
(10, 12, 15, 'ÁO SƠ MI NỮ TRƠN FROM ÁO ĐỘC ĐÁO', 250000, 16, '<p><span style=\"color: #333333; font-family: Arial, Helvetica, sans-serif;\">&Aacute;O SƠ MI NỮ TRƠN FROM &Aacute;O ĐỘC Đ&Aacute;O: Với chất vải kate cao cấp mềm mịn v&agrave; tho&aacute;ng kh&iacute; gi&uacute;p người mang thoải m&aacute;i khi hoạt động cả ng&agrave;y d&ugrave; trong thời tiết nắng n&oacute;ng. B&ecirc;n cạnh đ&oacute; l&agrave; from &aacute;o độc đ&aacute;o mang tới vẻ đẹp c&aacute; t&iacute;nh, hiện đại gi&uacute;p c&aacute;c n&agrave;ng tr&ocirc;ng thật nổi bật trong mọi cuộc vui.</span></p>', '2022-05-29 03:15:41', '2022-05-29 13:37:59'),
(11, 13, 15, 'ÁO SƠ MI NỮ TRƠN FROM ÁO ĐỘC ĐÁO2', 250000, 20, '<p><span style=\"color: #333333; font-family: Arial, Helvetica, sans-serif;\">&Aacute;O SƠ MI NỮ TRƠN FROM &Aacute;O ĐỘC Đ&Aacute;O: Với chất vải kate cao cấp mềm mịn v&agrave; tho&aacute;ng kh&iacute; gi&uacute;p người mang thoải m&aacute;i khi hoạt động cả ng&agrave;y d&ugrave; trong thời tiết nắng n&oacute;ng. B&ecirc;n cạnh đ&oacute; l&agrave; from &aacute;o độc đ&aacute;o mang tới vẻ đẹp c&aacute; t&iacute;nh, hiện đại gi&uacute;p c&aacute;c n&agrave;ng tr&ocirc;ng thật nổi bật trong mọi cuộc vui.</span></p>', '2022-05-29 03:15:41', '2022-05-29 13:38:03'),
(12, 14, 15, 'ÁO SƠ MI NỮ TRƠN FROM ÁO ĐỘC ĐÁO3', 250000, 30, '<p><span style=\"color: #333333; font-family: Arial, Helvetica, sans-serif;\">&Aacute;O SƠ MI NỮ TRƠN FROM &Aacute;O ĐỘC Đ&Aacute;O: Với chất vải kate cao cấp mềm mịn v&agrave; tho&aacute;ng kh&iacute; gi&uacute;p người mang thoải m&aacute;i khi hoạt động cả ng&agrave;y d&ugrave; trong thời tiết nắng n&oacute;ng. B&ecirc;n cạnh đ&oacute; l&agrave; from &aacute;o độc đ&aacute;o mang tới vẻ đẹp c&aacute; t&iacute;nh, hiện đại gi&uacute;p c&aacute;c n&agrave;ng tr&ocirc;ng thật nổi bật trong mọi cuộc vui.</span></p>', '2022-05-29 03:15:41', '2022-05-29 13:23:38'),
(13, 16, 15, 'ÁO SƠ MI NỮ TRƠN FROM ÁO ĐỘC ĐÁO3', 250000, 30, '<p><span style=\"color: #333333; font-family: Arial, Helvetica, sans-serif;\">&Aacute;O SƠ MI NỮ TRƠN FROM &Aacute;O ĐỘC Đ&Aacute;O: Với chất vải kate cao cấp mềm mịn v&agrave; tho&aacute;ng kh&iacute; gi&uacute;p người mang thoải m&aacute;i khi hoạt động cả ng&agrave;y d&ugrave; trong thời tiết nắng n&oacute;ng. B&ecirc;n cạnh đ&oacute; l&agrave; from &aacute;o độc đ&aacute;o mang tới vẻ đẹp c&aacute; t&iacute;nh, hiện đại gi&uacute;p c&aacute;c n&agrave;ng tr&ocirc;ng thật nổi bật trong mọi cuộc vui.</span></p>', '2022-05-29 03:15:41', '2022-05-29 13:23:38'),
(14, 12, 15, 'ÁO SƠ MI NỮ TRƠN FROM ÁO ĐỘC ĐÁO', 250000, 16, '<p><span style=\"color: #333333; font-family: Arial, Helvetica, sans-serif;\">&Aacute;O SƠ MI NỮ TRƠN FROM &Aacute;O ĐỘC Đ&Aacute;O: Với chất vải kate cao cấp mềm mịn v&agrave; tho&aacute;ng kh&iacute; gi&uacute;p người mang thoải m&aacute;i khi hoạt động cả ng&agrave;y d&ugrave; trong thời tiết nắng n&oacute;ng. B&ecirc;n cạnh đ&oacute; l&agrave; from &aacute;o độc đ&aacute;o mang tới vẻ đẹp c&aacute; t&iacute;nh, hiện đại gi&uacute;p c&aacute;c n&agrave;ng tr&ocirc;ng thật nổi bật trong mọi cuộc vui.</span></p>', '2022-05-29 03:15:41', '2022-05-29 13:37:59'),
(15, 13, 15, 'ÁO SƠ MI NỮ TRƠN FROM ÁO ĐỘC ĐÁO2', 250000, 20, '<p><span style=\"color: #333333; font-family: Arial, Helvetica, sans-serif;\">&Aacute;O SƠ MI NỮ TRƠN FROM &Aacute;O ĐỘC Đ&Aacute;O: Với chất vải kate cao cấp mềm mịn v&agrave; tho&aacute;ng kh&iacute; gi&uacute;p người mang thoải m&aacute;i khi hoạt động cả ng&agrave;y d&ugrave; trong thời tiết nắng n&oacute;ng. B&ecirc;n cạnh đ&oacute; l&agrave; from &aacute;o độc đ&aacute;o mang tới vẻ đẹp c&aacute; t&iacute;nh, hiện đại gi&uacute;p c&aacute;c n&agrave;ng tr&ocirc;ng thật nổi bật trong mọi cuộc vui.</span></p>', '2022-05-29 03:15:41', '2022-05-29 13:38:03'),
(16, 14, 15, 'ÁO SƠ MI NỮ TRƠN FROM ÁO ĐỘC ĐÁO3', 250000, 30, '<p><span style=\"color: #333333; font-family: Arial, Helvetica, sans-serif;\">&Aacute;O SƠ MI NỮ TRƠN FROM &Aacute;O ĐỘC Đ&Aacute;O: Với chất vải kate cao cấp mềm mịn v&agrave; tho&aacute;ng kh&iacute; gi&uacute;p người mang thoải m&aacute;i khi hoạt động cả ng&agrave;y d&ugrave; trong thời tiết nắng n&oacute;ng. B&ecirc;n cạnh đ&oacute; l&agrave; from &aacute;o độc đ&aacute;o mang tới vẻ đẹp c&aacute; t&iacute;nh, hiện đại gi&uacute;p c&aacute;c n&agrave;ng tr&ocirc;ng thật nổi bật trong mọi cuộc vui.</span></p>', '2022-05-29 03:15:41', '2022-05-29 13:23:38'),
(17, 16, 15, 'ÁO SƠ MI NỮ TRƠN FROM ÁO ĐỘC ĐÁO3', 250000, 30, '<p><span style=\"color: #333333; font-family: Arial, Helvetica, sans-serif;\">&Aacute;O SƠ MI NỮ TRƠN FROM &Aacute;O ĐỘC Đ&Aacute;O: Với chất vải kate cao cấp mềm mịn v&agrave; tho&aacute;ng kh&iacute; gi&uacute;p người mang thoải m&aacute;i khi hoạt động cả ng&agrave;y d&ugrave; trong thời tiết nắng n&oacute;ng. B&ecirc;n cạnh đ&oacute; l&agrave; from &aacute;o độc đ&aacute;o mang tới vẻ đẹp c&aacute; t&iacute;nh, hiện đại gi&uacute;p c&aacute;c n&agrave;ng tr&ocirc;ng thật nổi bật trong mọi cuộc vui.</span></p>', '2022-05-29 03:15:41', '2022-05-29 13:23:38');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slider`
--

CREATE TABLE `slider` (
  `slide_id` int(10) NOT NULL,
  `slide_name` varchar(255) NOT NULL,
  `slide_good` varchar(255) NOT NULL,
  `slide_image` text NOT NULL,
  `slide_desc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `slider`
--

INSERT INTO `slider` (`slide_id`, `slide_name`, `slide_good`, `slide_image`, `slide_desc`) VALUES
(6, 'JBL Quantum ONE', 'Ipsum dolor', 'JBL_E55BT_KEY_BLACK_6175_FS_x1-1605x1605px.png', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. A optio, voluptatum aperiam nobis quis maxime corporis porro alias soluta sunt quae consectetur aliquid blanditiis perspiciatis labore cumque, ullam, quam eligendi!'),
(7, 'JBL JR 310BT', 'Consectetur Elit', 'JBL_JR 310BT_Product Image_Hero_Skyblue.png', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Explicabo aut fugiat, libero magnam nemo inventore in tempora beatae officiis temporibus odit deserunt molestiae amet quam, asperiores, iure recusandae nulla labore!'),
(8, 'JBL TUNE 750TNC', 'Next-gen design', 'JBL_E55BT_KEY_RED_6063_FS_x1-1605x1605px.webp', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati dolor commodi dignissimos culpa, eaque eos necessitatibus possimus veniam, cupiditate rerum deleniti? Libero, ducimus error? Beatae velit dolore sint explicabo! Fugit.');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Chỉ mục cho bảng `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `FK_Cart_Cus` (`cus_id`),
  ADD KEY `FK_Cart_Pro` (`pro_id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Chỉ mục cho bảng `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Chỉ mục cho bảng `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`image_id`),
  ADD KEY `FK_Images_Products` (`pro_id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `FK_Oders_Customers` (`cus_id`);

--
-- Chỉ mục cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`detail_id`),
  ADD KEY `FK_Details_Orders` (`order_id`),
  ADD KEY `FK_Detail_Products` (`pro_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `FK_Product_Categories` (`cat_id`),
  ADD KEY `FK_Product_Brands` (`brand_id`);

--
-- Chỉ mục cho bảng `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`slide_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `images`
--
ALTER TABLE `images`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `order_details`
--
ALTER TABLE `order_details`
  MODIFY `detail_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `slider`
--
ALTER TABLE `slider`
  MODIFY `slide_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `FK_Cart_Cus` FOREIGN KEY (`cus_id`) REFERENCES `customers` (`customer_id`),
  ADD CONSTRAINT `FK_Cart_Pro` FOREIGN KEY (`pro_id`) REFERENCES `products` (`product_id`);

--
-- Các ràng buộc cho bảng `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `FK_Images_Products` FOREIGN KEY (`pro_id`) REFERENCES `products` (`product_id`);

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `FK_Oders_Customers` FOREIGN KEY (`cus_id`) REFERENCES `customers` (`customer_id`);

--
-- Các ràng buộc cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `FK_Detail_Products` FOREIGN KEY (`pro_id`) REFERENCES `products` (`product_id`),
  ADD CONSTRAINT `FK_Details_Orders` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`);

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `FK_Product_Brands` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`brand_id`),
  ADD CONSTRAINT `FK_Product_Categories` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`cat_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
