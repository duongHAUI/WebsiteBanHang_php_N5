-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 01, 2022 lúc 06:43 AM
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
-- Cơ sở dữ liệu: `headphone_store`
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
(8, 'Nguyen van Duong', 'duongvipro2k1@gmail.com', 'duong2k1', '94625858_647206419190297_2888198050080096256_n.jpg', 'Việt Nam', '<p><strong>Vui t&iacute;nh</strong></p>\r\n<div class=\"ddict_btn\" style=\"top: 17px; left: 61.8625px;\"><img src=\"chrome-extension://bpggmmljdiliancllaapiggllnkbjocb/logo/48.png\" /></div>', '0321321321', '2022-05-23 06:48:07', '2022-05-31 10:19:17'),
(25, 'ThuHuong', 'thuhuong123@gmail.com', 'Huong12', 'admin6.jpg', 'VietNam', 'No', '0967825310', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

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
(17, 'Apple', 'NO', '2022-05-30 15:03:57', '2022-05-30 15:03:57'),
(18, 'Audio-technical', 'NO', '2022-05-30 15:04:33', '2022-05-30 15:04:33'),
(19, ' iclever ', 'NO', '2022-05-30 15:12:37', '2022-05-30 15:12:37'),
(20, 'SoundPEATS', 'NO', '2022-05-30 15:14:04', '2022-05-30 15:14:04'),
(21, 'Monster', 'NO', '2022-05-30 15:14:30', '2022-05-30 15:14:30'),
(22, 'Hifiman', 'NO', '2022-05-30 15:15:23', '2022-05-30 15:15:23'),
(23, 'LG', 'NO', '2022-05-30 15:15:50', '2022-05-30 15:15:50'),
(24, 'Shure', 'NO', '2022-05-30 15:16:17', '2022-05-30 15:16:17');

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
(22, 'Noise-canceling Headphones', 'Noise-cancelling headphones can make your music easier to hear and your world a little more peaceful.', '2022-05-30 14:32:03', '2022-05-30 14:40:55'),
(23, 'Gaming Headsets', 'The gaming headset has to mix outstanding audio, the comfort to last a proper gaming session, and great connectivity, too.', '2022-05-30 14:39:07', '2022-05-30 14:39:07'),
(25, 'Sports Headphones', 'A new pair of sports headphones is a great way to give yourself a boost. ', '2022-05-30 14:41:56', '2022-05-30 14:42:52'),
(26, 'Children\'s Headphones', 'At some point, most kids need access to headphones, whether it’s for school, travel, or simply to save an adult’s sanity.', '2022-05-30 14:46:58', '2022-05-30 15:12:14'),
(27, 'DJ Headphones', 'A type of headphone that is designed specifically for DJs', '2022-05-30 15:02:33', '2022-05-30 15:02:33');

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
(29, 23, 'products/dj_au1.jpg'),
(30, 23, 'products/dj_au2.jpg'),
(31, 23, 'products/dj_au3.jpg'),
(32, 24, 'products/dj_sh1.jpg'),
(33, 24, 'products/dj_sh2.jpg'),
(34, 24, 'products/dj_sh3.jpg');

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
  `product_sold` int(11) NOT NULL DEFAULT 0,
  `product_quantity` int(11) NOT NULL,
  `product_discount` int(11) NOT NULL,
  `product_desc` text NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`product_id`, `cat_id`, `brand_id`, `product_title`, `product_price`, `product_sold`, `product_quantity`, `product_discount`, `product_desc`, `createdAt`, `updatedAt`) VALUES
(23, 27, 18, 'Tai nghe Audio Technica ATH-M70X', 5990000, 0, 0, 0, '<p style=\"color: #222222; font-family: arial, Helvetica, sans-serif;\"><span style=\"font-family: arial, helvetica, sans-serif;\">M-Series của&nbsp;<strong>AudioTechnica</strong>&nbsp;l&agrave; d&ograve;ng tai nghe ph&ograve;ng thu chuy&ecirc;n nghiệp, được ch&uacute; trọng chế tạo với kiểu d&aacute;ng, thiết kế v&agrave; chất lượng &acirc;m thanh trung thực nhất. M70x hiện l&agrave; tai nghe đầu bảng thuộc d&ograve;ng M-series với tất cả những đặc điểm tuyệt vời n&ecirc;u tr&ecirc;n.&nbsp;</span></p>\r\n<div style=\"color: #222222; font-family: arial, Helvetica, sans-serif;\">\r\n<ul>\r\n<li>\r\n<p><span style=\"font-family: arial, helvetica, sans-serif;\">M70x c&oacute; chất &acirc;m ch&iacute;nh x&aacute;c, tất cả c&aacute;c chi tiết được gia c&ocirc;ng kỹ c&agrave;ng, c&aacute;c khớp nối v&agrave; headband bằng kim loại cho độ bền cao nhất.&nbsp;</span></p>\r\n</li>\r\n<li>\r\n<p><span style=\"font-family: arial, helvetica, sans-serif;\">Driver 45mm với cuộn cảm nh&ocirc;m, c&oacute; trọng lượng nhẹ, linh hoạt với c&aacute;c rung động nhanh, nhằm t&aacute;i tạo &acirc;m thanh thật tốt m&agrave; kh&ocirc;ng g&acirc;y ra hiện tượng trễ tiếng.&nbsp;</span></p>\r\n</li>\r\n<li>\r\n<p><span style=\"font-family: arial, helvetica, sans-serif;\">Chất &acirc;m c&acirc;n bằng, đều ba dải &acirc;m mang đến sự ch&iacute;nh x&aacute;c v&agrave; trung t&iacute;nh nhất</span></p>\r\n</li>\r\n<li>\r\n<p><span style=\"font-family: arial, helvetica, sans-serif;\">Thiết kế closed c&aacute;ch &acirc;m tuyệt đối, earcup xoay 90 độ để gập lại dễ d&agrave;ng, ph&ugrave; hợp cho nhu cầu di chuyển.&nbsp;</span></p>\r\n</li>\r\n<li>\r\n<p><span style=\"font-family: arial, helvetica, sans-serif;\">Earpad mềm dẻo, thoải m&aacute;i v&agrave; c&oacute; thể thay thế dễ d&agrave;ng.&nbsp;</span></p>\r\n</li>\r\n<li>\r\n<p><span style=\"font-family: arial, helvetica, sans-serif;\">Cable th&aacute;o rời, c&oacute; 1 d&acirc;y xoắn 3m, 1 d&acirc;y 1,2m v&agrave; 1 d&acirc;y 3m.&nbsp;</span></p>\r\n</li>\r\n</ul>\r\n</div>', '2022-05-30 16:19:21', '2022-05-30 16:19:21'),
(24, 27, 24, 'Tai nghe Shure SRH440', 2255000, 0, 0, 10, '<div class=\"products--description-txt txt\" style=\"padding: 0px; margin: 0px 0px 10px; border: 0px; font-size: 16px; vertical-align: baseline; clear: both; line-height: 1.5; color: #5a5d5e; font-family: tradegothic, sans-serif; letter-spacing: 0.07px; background: transparent; text-align: justify;\"><strong><a style=\"color: #333333; text-decoration-line: none; font-size: inherit;\" href=\"https://tainghe.com.vn/tai-nghe.html\">Tai nghe</a>&nbsp;Shure SRH 440</strong>&nbsp;rất phổ biến trong studio, tai nghe với &acirc;m thanh c&acirc;n bằng, tai nghe cỡ to SRH440 c&oacute; thể gập lại dễ d&agrave;ng để mang theo.</div>\r\n<div class=\"products--description-txt txt\" style=\"padding: 0px; margin: 0px 0px 10px; border: 0px; font-size: 16px; vertical-align: baseline; clear: both; line-height: 1.5; color: #5a5d5e; font-family: tradegothic, sans-serif; letter-spacing: 0.07px; background: transparent; text-align: justify;\">Đ&acirc;y l&agrave; một trong những headphone tai nghe studio gi&aacute; hợp l&yacute; m&agrave; chất lượng nếu bạn t&igrave;m tai nghe k&iacute;n &acirc;m thanh tầm trung chất lượng</div>\r\n<div class=\"products--description-txt txt\" style=\"padding: 0px; margin: 0px 0px 10px; border: 0px; font-size: 16px; vertical-align: baseline; clear: both; line-height: 1.5; color: #5a5d5e; font-family: tradegothic, sans-serif; letter-spacing: 0.07px; background: transparent; text-align: justify;\">Tai nghe SRH440 Professional Studio từ Shure cung cấp &acirc;m thanh đặc biệt v&agrave; thoải m&aacute;i.</div>\r\n<div class=\"products--description-txt txt\" style=\"padding: 0px; margin: 0px 0px 10px; border: 0px; font-size: 16px; vertical-align: baseline; clear: both; line-height: 1.5; color: #5a5d5e; font-family: tradegothic, sans-serif; letter-spacing: 0.07px; background: transparent; text-align: justify;\">Trở kh&aacute;ng, xử l&yacute; điện năng v&agrave; độ nhạy đều được hiệu chỉnh cho c&aacute;c thiết bị &acirc;m thanh chuy&ecirc;n nghiệp như m&aacute;y trộn DJ, m&aacute;y trộn v&agrave; bộ khuếch đại tai&nbsp;nghe. Bao gồm t&uacute;i x&aacute;ch v&agrave; bộ nối mạ v&agrave;ng 1/4 \"(6.3mm)</div>\r\n<div class=\"products--description-txt txt\" style=\"padding: 0px; margin: 0px 0px 10px; border: 0px; font-size: 16px; vertical-align: baseline; clear: both; line-height: 1.5; color: #5a5d5e; font-family: tradegothic, sans-serif; letter-spacing: 0.07px; background: transparent; text-align: justify;\">T&iacute;nh năng, đặc điểm</div>\r\n<div class=\"products--description-txt txt\" style=\"padding: 0px; margin: 0px 0px 10px; border: 0px; font-size: 16px; vertical-align: baseline; clear: both; line-height: 1.5; color: #5a5d5e; font-family: tradegothic, sans-serif; letter-spacing: 0.07px; background: transparent; text-align: justify;\">Đ&aacute;p ứng tần số n&acirc;ng cao cung cấp &acirc;m thanh ch&iacute;nh x&aacute;c qua một phạm vi rộng hơn</div>\r\n<div class=\"products--description-txt txt\" style=\"padding: 0px; margin: 0px 0px 10px; border: 0px; font-size: 16px; vertical-align: baseline; clear: both; line-height: 1.5; color: #5a5d5e; font-family: tradegothic, sans-serif; letter-spacing: 0.07px; background: transparent; text-align: justify;\">Trở kh&aacute;ng v&agrave; xử l&yacute; nguồn tối ưu h&oacute;a cho hiệu suất với c&aacute;c thiết bị &acirc;m thanh chuy&ecirc;n nghiệp</div>\r\n<div class=\"products--description-txt txt\" style=\"padding: 0px; margin: 0px 0px 10px; border: 0px; font-size: 16px; vertical-align: baseline; clear: both; line-height: 1.5; color: #5a5d5e; font-family: tradegothic, sans-serif; letter-spacing: 0.07px; background: transparent; text-align: justify;\">D&acirc;y nối&nbsp;c&oacute; thể điều chỉnh được v&agrave; cấu tr&uacute;c đ&oacute;ng lại mang lại sự thoải m&aacute;i v&agrave; t&iacute;nh di động</div>', '2022-05-30 16:21:54', '2022-05-30 16:21:54');

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
  ADD KEY `fk_img_pro` (`pro_id`);

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
  ADD KEY `fk_pro_cat` (`cat_id`),
  ADD KEY `fk_pro_brand` (`brand_id`);

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
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT cho bảng `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `images`
--
ALTER TABLE `images`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT cho bảng `order_details`
--
ALTER TABLE `order_details`
  MODIFY `detail_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

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
  ADD CONSTRAINT `fk_img_pro` FOREIGN KEY (`pro_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE;

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
  ADD CONSTRAINT `fk_pro_brand` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`brand_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_pro_cat` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`cat_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
