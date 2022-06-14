-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 14, 2022 lúc 07:35 PM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 8.0.19

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
(24, 'Shure', 'NO', '2022-05-30 15:16:17', '2022-05-30 15:16:17'),
(25, 'Sony', 'NO', '2022-06-05 10:10:26', '2022-06-05 10:10:36');

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

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`cart_id`, `cus_id`, `pro_id`, `cart_qty`, `createdAt`, `updatedAt`) VALUES
(11, 13, 33, 3, '2022-06-14 16:12:55', '2022-06-14 16:12:58'),
(12, 13, 24, 2, '2022-06-14 16:13:09', '2022-06-14 16:17:59'),
(13, 13, 26, 3, '2022-06-14 16:17:54', '2022-06-14 16:17:54');

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
(22, 'Tai nghe chống ồn', 'Tai nghe loại bỏ tiếng ồn có thể giúp bạn nghe nhạc dễ dàng hơn và thế giới của bạn yên bình hơn một chút.', '2022-05-30 14:32:03', '2022-06-14 16:27:13'),
(23, 'Tai nghe chơi game', 'Tai nghe chơi game phải kết hợp âm thanh nổi bật, sự thoải mái để kéo dài một phiên chơi game thích hợp và cả khả năng kết nối tuyệt vời.', '2022-05-30 14:39:07', '2022-06-14 16:27:37'),
(25, 'Tai nghe thể thao', 'Một cặp tai nghe thể thao mới là một cách tuyệt vời để tạo động lực cho bản thân.', '2022-05-30 14:41:56', '2022-06-14 16:28:16'),
(26, 'Tai nghe trẻ em', 'Tại một số thời điểm, hầu hết trẻ em cần sử dụng tai nghe, cho dù đó là để đi học, đi du lịch hay chỉ đơn giản là để giúp người lớn tỉnh táo hơn.', '2022-05-30 14:46:58', '2022-06-14 16:28:39'),
(27, 'Tai nghe DJ', 'Một loại tai nghe được thiết kế đặc biệt cho các DJ', '2022-05-30 15:02:33', '2022-06-14 16:42:27');

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

--
-- Đang đổ dữ liệu cho bảng `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_name`, `customer_email`, `customer_password`, `customer_country`, `customer_city`, `customer_phone`, `customer_address`, `customer_image`, `createdAt`, `updatedAt`) VALUES
(1, 'Huong', 'huong123@gmail.com', '1234', 'VietNam', 'HaNoi', '0731', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 'Thu Huong', 'huong1234@gmail.com', 'ee4f60d01bda307268367e6f4b427995', '', '', '', '', '', '2022-06-04 13:26:04', '2022-06-04 13:26:04');

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
-- Cấu trúc bảng cho bảng `orders`
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

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
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

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
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
-- Đang đổ dữ liệu cho bảng `products`
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
  MODIFY `brand_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT cho bảng `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `images`
--
ALTER TABLE `images`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `order_details`
--
ALTER TABLE `order_details`
  MODIFY `detail_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

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
