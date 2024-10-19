-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th9 21, 2023 lúc 10:56 AM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `kidolshop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `addresscustomer`
--

CREATE TABLE `addresscustomer` (
  `idAddress` int(10) UNSIGNED NOT NULL,
  `idCustomer` int(11) UNSIGNED NOT NULL,
  `Address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `PhoneNumber` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `CustomerName` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `addresscustomer`
--

INSERT INTO `addresscustomer` (`idAddress`, `idCustomer`, `Address`, `PhoneNumber`, `CustomerName`, `created_at`, `updated_at`) VALUES
(4, 2, 'Bình Thủy, Cần Thơ, Tp. Cần Thơ', '0923542101', 'Nguyễn Trà My', '2022-08-06 13:31:12', '2022-08-06 13:31:12'),
(6, 5, '330 XXX, XXX XXXX, XXXX', '0924818410', 'Customer', '2023-08-07 10:51:25', '2023-08-07 10:51:25'),
(7, 5, 'XXXXXXXXXXXXXXXXXXXXXXx', '03920391022', '2323123', '2023-08-07 12:29:56', '2023-08-07 12:29:56');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `idAdmin` int(10) UNSIGNED NOT NULL,
  `AdminName` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `AdminUser` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `AdminPass` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Position` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NumberPhone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`idAdmin`, `AdminName`, `AdminUser`, `AdminPass`, `Position`, `Address`, `NumberPhone`, `Email`, `Avatar`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'hy', '25d55ad283aa400af464c76d713c07ad', 'Quản lý', 'Việt Nam', '09440224114', 'project@gmail.com', 'a547.png', NULL, '2023-09-05 05:38:35'),
(2, 'nv123', 'nv123', '25d55ad283aa400af464c76d713c07ad', 'Nhân Viên', 'Bình Thủy, Cần Thơ', '0924345678', 'a@gmail.com', NULL, '2022-07-31 10:15:28', '2022-07-31 10:15:28');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `attribute`
--

CREATE TABLE `attribute` (
  `idAttribute` int(10) UNSIGNED NOT NULL,
  `AttributeName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `attribute`
--

INSERT INTO `attribute` (`idAttribute`, `AttributeName`, `created_at`, `updated_at`) VALUES
(1, 'Size', '2022-07-30 09:51:59', '2022-07-30 09:51:59'),
(2, 'Màu sắc', '2022-07-30 09:52:01', '2022-07-30 09:52:01'),
(3, 'Màu - Size', '2022-07-30 09:52:04', '2022-07-30 09:52:04'),
(4, 'Cân Nặng', '2022-08-28 08:10:48', '2022-08-28 08:10:48');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `attribute_value`
--

CREATE TABLE `attribute_value` (
  `idAttrValue` int(10) UNSIGNED NOT NULL,
  `idAttribute` int(11) UNSIGNED NOT NULL,
  `AttrValName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `attribute_value`
--

INSERT INTO `attribute_value` (`idAttrValue`, `idAttribute`, `AttrValName`, `created_at`, `updated_at`) VALUES
(4, 1, '8-9Y', '2022-07-30 09:54:34', '2022-07-30 09:54:34'),
(5, 1, '10-11Y', '2022-07-30 09:54:44', '2022-07-30 09:54:44'),
(6, 1, '12Y', '2022-07-30 09:54:48', '2022-07-30 09:54:48'),
(7, 3, 'Cam - S', '2022-07-30 09:57:11', '2022-07-30 09:57:35'),
(8, 3, 'Cam - M', '2022-07-30 09:57:50', '2022-07-30 09:57:50'),
(9, 3, 'Nâu - S', '2022-07-30 09:58:02', '2022-07-30 09:58:02'),
(10, 3, 'Nâu - M', '2022-07-30 09:58:08', '2022-07-30 09:58:08'),
(11, 1, 'NOSIZE', '2022-07-30 11:55:03', '2022-07-30 11:55:03'),
(12, 4, '11-12kg', '2022-08-28 08:11:47', '2022-08-28 08:11:47'),
(13, 4, '14-16kg', '2022-08-28 08:11:57', '2022-08-28 08:11:57'),
(14, 4, '19-22kg', '2022-08-28 08:12:16', '2022-08-28 08:12:16'),
(15, 4, '23-25kg', '2022-08-28 08:12:26', '2022-08-28 08:12:26'),
(16, 2, 'Kem nơ', '2022-10-04 14:36:52', '2022-10-04 14:36:52'),
(17, 2, 'Kem hoa', '2022-10-04 14:37:00', '2022-10-04 14:37:00'),
(18, 2, 'Đen', '2022-10-04 14:46:57', '2022-10-04 14:46:57'),
(19, 2, 'Be', '2022-10-04 14:47:02', '2022-10-04 14:47:02'),
(20, 1, '6-7Y', '2022-10-04 14:58:07', '2022-10-04 14:58:07'),
(21, 1, '5-6Y', '2022-10-04 14:58:41', '2022-10-04 14:58:41'),
(22, 1, '26', '2022-11-14 10:12:20', '2022-11-14 10:12:20'),
(23, 1, '27', '2022-11-14 10:12:24', '2022-11-14 10:12:24'),
(24, 1, '29', '2022-11-14 10:12:30', '2022-11-14 10:12:30'),
(25, 1, '30', '2022-11-14 10:12:34', '2022-11-14 10:12:34'),
(26, 1, '31', '2022-11-14 10:12:38', '2022-11-14 10:12:38'),
(27, 1, '32', '2022-11-14 10:12:42', '2022-11-14 10:12:42'),
(28, 1, '28', '2022-11-14 10:13:12', '2022-11-14 10:13:12'),
(29, 2, 'Vàng', '2022-11-14 10:19:24', '2022-11-14 10:19:24'),
(30, 2, 'Xanh Lam', '2022-11-14 10:19:30', '2022-11-14 10:19:30'),
(31, 2, 'Hồng', '2022-11-14 10:19:37', '2022-11-14 10:19:37'),
(32, 2, 'Đỏ', '2022-11-20 12:26:52', '2022-11-20 12:26:52'),
(33, 2, 'Trắng', '2022-11-20 12:27:00', '2022-11-20 12:27:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill`
--

CREATE TABLE `bill` (
  `idBill` int(10) UNSIGNED NOT NULL,
  `idCustomer` int(11) UNSIGNED NOT NULL,
  `Payment` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'cash',
  `Voucher` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `PhoneNumber` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `CustomerName` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ReceiveDate` datetime DEFAULT NULL,
  `Status` tinyint(4) NOT NULL DEFAULT 0,
  `TotalBill` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bill`
--

INSERT INTO `bill` (`idBill`, `idCustomer`, `Payment`, `Voucher`, `Address`, `PhoneNumber`, `CustomerName`, `ReceiveDate`, `Status`, `TotalBill`, `created_at`, `updated_at`) VALUES
(10, 2, 'cash', '1-2-300000', 'Bình Thủy, Cần Thơ, Tp. Cần Thơ', '0923542101', 'Nguyễn Trà My', '2022-08-06 20:32:37', 2, 1329000, '2022-08-06 13:31:22', '2022-08-06 13:32:37'),
(11, 2, 'cash', NULL, 'Bình Thủy, Cần Thơ, Tp. Cần Thơ', '0923542101', 'Nguyễn Trà My', NULL, 99, 408000, '2022-08-07 06:32:02', '2022-08-08 08:53:24'),
(12, 2, 'cash', NULL, 'Bình Thủy, Cần Thơ, Tp. Cần Thơ', '0923542101', 'Nguyễn Trà My', '2022-10-04 22:15:01', 2, 463000, '2022-08-08 09:01:21', '2022-10-04 15:15:01'),
(22, 5, 'vnpay', '', '330 XXX, XXX XXXX, XXXX', '0924818410', 'Customer', NULL, 1, 2164000, '2023-08-07 11:27:14', '2023-08-07 11:27:14'),
(23, 5, 'cash', NULL, 'XXXXXXXXXXXXXXXXXXXXXXx', '03920391022', '2323123', NULL, 0, 1195000, '2023-08-07 12:30:36', '2023-08-07 12:30:36');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `billhistory`
--

CREATE TABLE `billhistory` (
  `idBill` int(11) UNSIGNED NOT NULL,
  `AdminName` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `billhistory`
--

INSERT INTO `billhistory` (`idBill`, `AdminName`, `Status`, `created_at`, `updated_at`) VALUES
(10, 'Nguyễn Gia Hy', 1, '2022-08-06 13:32:33', '2022-08-06 13:32:33'),
(11, 'Nguyễn Gia Hy', 99, '2022-08-08 08:53:23', '2022-08-08 08:53:23'),
(12, 'Nguyễn Gia Hy', 1, '2022-08-28 10:24:38', '2022-08-28 10:24:38'),
(22, 'System', 1, '2023-08-07 11:27:14', '2023-08-07 11:27:14');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `billinfo`
--

CREATE TABLE `billinfo` (
  `idBill` int(11) UNSIGNED NOT NULL,
  `idProduct` int(11) UNSIGNED NOT NULL,
  `AttributeProduct` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Price` int(11) NOT NULL,
  `QuantityBuy` int(11) NOT NULL,
  `idProAttr` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `billinfo`
--

INSERT INTO `billinfo` (`idBill`, `idProduct`, `AttributeProduct`, `Price`, `QuantityBuy`, `idProAttr`, `created_at`, `updated_at`) VALUES
(10, 1, 'Size: 8-9Y', 220000, 2, 1, '2022-08-06 13:31:22', '2022-08-06 13:31:22'),
(10, 3, 'Size: 10-11Y', 378000, 2, 15, '2022-08-06 13:31:22', '2022-08-06 13:31:22'),
(10, 4, 'Size: 12Y', 433000, 1, 13, '2022-08-06 13:31:22', '2022-08-06 13:31:22'),
(11, 3, 'Size: 8-9Y', 378000, 1, 14, '2022-08-07 06:32:02', '2022-08-07 06:32:02'),
(12, 4, 'Size: 10-11Y', 433000, 1, 12, '2022-08-08 09:01:21', '2022-08-08 09:01:21'),
(22, 3, 'Size: 8-9Y', 356000, 3, 14, '2023-08-07 11:27:14', '2023-08-07 11:27:14'),
(22, 32, 'Size: 8-9Y', 274000, 4, 104, '2023-08-07 11:27:14', '2023-08-07 11:27:14'),
(23, 43, 'Cân Nặng: 19-22kg', 169000, 4, 156, '2023-08-07 12:30:36', '2023-08-07 12:30:36'),
(23, 11, 'Cân Nặng: 14-16kg', 173000, 1, 22, '2023-08-07 12:30:36', '2023-08-07 12:30:36'),
(23, 11, 'Cân Nặng: 19-22kg', 173000, 2, 23, '2023-08-07 12:30:36', '2023-08-07 12:30:36');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `blog`
--

CREATE TABLE `blog` (
  `idBlog` int(10) UNSIGNED NOT NULL,
  `BlogContent` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `Status` tinyint(4) NOT NULL DEFAULT 1,
  `BlogDesc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `BlogTitle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `BlogSlug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `BlogImage` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `blog`
--

INSERT INTO `blog` (`idBlog`, `BlogContent`, `Status`, `BlogDesc`, `BlogTitle`, `BlogSlug`, `BlogImage`, `created_at`, `updated_at`) VALUES
(1, '<p><span style=\"font-size:24px\"><strong>Đồ bộ trẻ em l&agrave; g&igrave;?</strong></span></p>\r\n\r\n<p style=\"text-align:center\"><input alt=\"\" src=\"https://file.hstatic.net/1000290074/file/hkn05308_399f0dab4130452e868d296ba3709deb_1024x1024_afac595dd1cb41979489aece5a924be1_grande.jpg\" style=\"height:600px; width:400px\" type=\"image\" /><br />\r\nĐồ bộ trẻ em l&agrave; trang phục kh&ocirc;ng thể thiếu trong tủ quần &aacute;o cho b&eacute;. Độ bộ trẻ em l&agrave; bộ quần &aacute;o mặc ở nh&agrave; cho cả b&eacute; g&aacute;i v&agrave; b&eacute; trai, được may c&ugrave;ng một loại vải, thường l&agrave; vải thun cotton 100% với chất vải mềm mịn. C&ocirc;ng dụng của n&oacute; vừa c&oacute; thể mặc nh&agrave;, mặc ngủ hay mặc đi chơi v&ocirc; c&ugrave;ng dễ thương v&agrave; thuận tiện cho b&eacute;.</p>\r\n\r\n<p><span style=\"font-size:24px\"><strong>Một v&agrave;i lưu &yacute; khi chọn đồ bộ&nbsp;b&eacute; g&aacute;i v&agrave; đồ bộ b&eacute; trai</strong></span><br />\r\nĐể gi&uacute;p cho trẻ lu&ocirc;n dễ chịu v&agrave; thoải m&aacute;i nhất khi mặc ho&agrave;n to&agrave;n phụ thuộc v&agrave;o sự lựa chọn của mẹ. V&igrave; vậy mẹ cần lưu &yacute; những điều sau đ&acirc;y khi chọn đồ bộ cho b&eacute;, đặc biệt l&agrave; đồ bộ b&eacute; trai.</p>\r\n\r\n<p>- Đừng quan t&acirc;m đến gi&aacute; tiền h&atilde;y ưu ti&ecirc;n lựa chọn chất liệu vải cho trẻ em tốt như thun cotton 100%. Những bộ quần &aacute;o từ cotton c&oacute; độ co gi&atilde;n nhất định, mềm mịn, thấm h&uacute;t mồ h&ocirc;i, l&agrave;nh t&iacute;nh với l&agrave;n da của b&eacute; cũng như kh&aacute;ng khuẩn tốt sẽ bảo vệ trẻ hiệu quả, to&agrave;n diện. Phương ch&acirc;m l&agrave; &iacute;t quần &aacute;o nhưng chất lượng sẽ tốt hơn nhiều nhưng chất lượng k&eacute;m.</p>\r\n\r\n<p>- Lựa chọn thương hiệu v&agrave; địa chỉ b&aacute;n uy t&iacute;n: Yếu tố n&agrave;y cũng rất quan trọng, c&aacute;c thương hiệu quần &aacute;o trẻ em nổi tiếng sẽ sử dụng chất liệu may cao cấp an to&agrave;n cho trẻ. Ngo&agrave;i ra địa chỉ b&aacute;n thời trang cho b&eacute; uy t&iacute;n cũng l&agrave; yếu tố mẹ cần c&acirc;n nhắc, h&atilde;y chọn lựa những địa chỉ b&aacute;n c&oacute; t&acirc;m, uy t&iacute;n, được nhiều người giới thiệu v&agrave; phản hồi chất lượng tốt để mua. Khi chọn quần &aacute;o v&agrave; trang phục cho trẻ ở những địa chỉ uy t&iacute;n mẹ sẽ được tư vấn, giải th&iacute;ch kỹ c&agrave;ng về chất liệu, c&aacute;ch sử dụng v&agrave; bảo quản đồ bộ y&ecirc;n t&acirc;m sử dụng cho b&eacute;.</p>\r\n\r\n<p>Hy vọng với những th&ocirc;ng tin trong b&agrave;i viết vừa chia sẻ đ&atilde; gi&uacute;p &iacute;ch cho qu&yacute; c&aacute;c mẹ hiểu hơn về đồ bộ v&agrave; đưa ra sự lựa chọn ho&agrave;n hảo v&agrave; ph&ugrave; hợp nhất cho b&eacute; con nh&agrave; m&igrave;nh.</p>', 1, '<p>Đồ bộ trẻ em mặc ở nh&agrave; kh&ocirc;ng chỉ gi&uacute;p b&eacute; tr&ocirc;ng đẹp hơn m&agrave; c&ograve;n cho b&eacute; tự tin, thoải m&aacute;i khi vận động. Ng&agrave;y nay trẻ em kh&ocirc;ng chỉ c&oacute; nhu cầu mặc đủ m&agrave; c&ograve;n mặc đẹp, an to&agrave;n, thời trang, v&igrave; vậy việc chọn đồ bộ trẻ em ph&ugrave; hợp lu&ocirc;n l&agrave; điều m&agrave; c&aacute;c gia đ&igrave;nh quan t&acirc;m. H&atilde;y c&ugrave;ng Rabity t&igrave;m hiểu ngay về độ bộ để lựa chọn cho b&eacute; ngay trong b&agrave;i viết dưới đ&acirc;y nh&eacute;!</p>', 'Đồ bộ trẻ em - thời trang đẹp cho bé', 'do-bo-tre-em-thoi-trang-dep-cho-be', 'blog_128.png', '2022-08-05 09:45:51', '2022-08-05 11:01:54'),
(2, '<h2><strong>Tại sao n&ecirc;n mua &aacute;o d&agrave;i chất liệu cotton?</strong></h2>\r\n\r\n<p>Cotton l&agrave; chất liệu phổ biến sử dụng trong may mặc được nhiều người ưa chuộng. Kh&ocirc;ng phải ngẫu nhi&ecirc;n m&agrave; trang phục Cotton được nhiều người lựa chọn.</p>\r\n\r\n<h3><strong>Cấu tr&uacute;c sợi cotton kh&aacute; phức tạp, gồm 3 lớp:&nbsp;</strong></h3>\r\n\r\n<p>- Ngo&agrave;i c&ugrave;ng l&agrave; lớp biểu b&igrave; c&oacute; chức năng bảo vệ c&aacute;c lớp b&ecirc;n trong v&agrave; c&oacute; t&iacute;nh kị nước. Th&agrave;nh phần của lớp biểu b&igrave; c&oacute; cellulose, hợp chất b&eacute;o v&agrave; s&aacute;p. Để vải cotton c&oacute; t&iacute;nh thấm nước tốt th&igrave; n&oacute; phải được xử l&yacute; sợi ở lớp n&agrave;y.</p>\r\n\r\n<p>- B&ecirc;n dưới lớp biểu b&igrave; l&agrave; lớp th&agrave;nh sợi ch&iacute;nh. Th&agrave;nh phần của lớp sợi ch&iacute;nh l&agrave; c&aacute;c sợi fibril nhỏ đan ngang dọc với nhau tạo th&agrave;nh. (Fibril l&agrave; một trong những chất quan trọng trong m&aacute;u, n&oacute; gi&uacute;p bịt k&iacute;n miệng vết thương v&agrave; ngăn kh&ocirc;ng cho m&aacute;u chảy ra nhiều hơn).</p>\r\n\r\n<p>- Sau lớp th&agrave;nh sợi ch&iacute;nh l&agrave; lớp th&agrave;nh sợi phụ, chiếm hầu hết khối lượng của sợi cotton, do c&aacute;c lớp sợi li&ecirc;n tiếp chồng l&ecirc;n nhau v&agrave; ngược hướng tạo th&agrave;nh.&nbsp;</p>\r\n\r\n<p>- C&ograve;n lại l&agrave; phần ruột của sợi cotton rỗng, để dẫn protein đi nu&ocirc;i c&aacute;c lớp sợi. Khi sợi đ&atilde; trưởng th&agrave;nh, n&oacute; sẽ bị kh&ocirc; đi đồng thời ruột bị dẹt lại, l&agrave;m cho những sợi cotton xoắn.</p>\r\n\r\n<p style=\"text-align:center\"><input alt=\"\" src=\"https://lh5.googleusercontent.com/VKbpG-V7r4Fi6QfESnaMflOlG-hyWcdEZdeI-5q9m6HkSDbZXqz32Em7O_5oVOnU87CZADxa-iSRLKat1MuSLgpz9c4hhKt4gBBlvsHgFUZSiK-UuGHhPznQbmjhIDpvkbDxBHhe\" type=\"image\" /></p>\r\n\r\n<p>Loại vải n&agrave;y được l&agrave;m từ sợi b&ocirc;ng, l&agrave; chất liệu phổ biến trong ng&agrave;nh thời trang. Cotton được nhiều người y&ecirc;u th&iacute;ch kh&ocirc;ng chỉ bởi độ bền đẹp, sự tiện dụng m&agrave; c&ograve;n bởi những t&iacute;nh năng nổi trội của n&oacute;. Ngo&agrave;i ra, gi&aacute; th&agrave;nh của n&oacute; vừa phải, ph&ugrave; hợp với t&uacute;i tiền của nhiều người, nhiều đối tượng kh&aacute;ch h&agrave;ng.&nbsp;</p>\r\n\r\n<p>Trang phục &aacute;o d&agrave;i chất liệu cotton với c&aacute;c t&iacute;nh năng ưu t&uacute; v&agrave; vượt trội, đa dạng, bền, khi giặt đem đi phơi kh&ocirc; nhanh v&agrave; khả năng thấm mồ h&ocirc;i, h&uacute;t ẩm, hạ nhiệt v&agrave; l&agrave;m m&aacute;t cơ thể cho c&aacute;c b&eacute; y&ecirc;u tự do, thoải m&aacute;i, đặc biệt hữu &iacute;ch v&agrave;o những ng&agrave;y h&egrave; nắng n&oacute;ng b&eacute; cần diện trang phục sang trọng, tự tin.</p>\r\n\r\n<h2><strong>Bảo quản&nbsp;<a href=\"https://rabity.vn/collections/ao-dai-be-gai\">&aacute;o d&agrave;i c&aacute;ch t&acirc;n b&eacute; g&aacute;i</a>&nbsp;chất liệu cotton</strong></h2>\r\n\r\n<p>C&aacute;c chuy&ecirc;n gia khuy&ecirc;n rằng kh&ocirc;ng n&ecirc;n để m&aacute;y giặt l&agrave;m kh&ocirc; cong đồ cotton, h&atilde;y đảm bảo đồ c&ograve;n hơi ẩm v&agrave; nước sẽ bay hơi dần. Đặc biệt, khi giặt đồ chất liệu cotton, kh&ocirc;ng n&ecirc;n d&ugrave;ng nước n&oacute;ng, cũng kh&ocirc;ng n&ecirc;n sử dụng chất tẩy rửa mạnh. N&ecirc;n treo v&agrave; cất đồ thay v&igrave; gấp lại v&igrave; Cotton nguy&ecirc;n chất sẽ dễ bị nhăn v&agrave; nhớ d&ugrave;ng m&oacute;c treo gi&agrave;y thay v&igrave; m&oacute;c sắt mảnh để gi&uacute;p &aacute;o d&agrave;i lu&ocirc;n giữ được phom.<strong>&nbsp;</strong></p>\r\n\r\n<p style=\"text-align:center\"><strong><input alt=\"\" src=\"https://lh6.googleusercontent.com/_YkEwDvWgzsxKDql9nuXa9UQ497A1bfyOd0jcAK3HPg7d-LPTtM2OGCyyhP5tecPqUp9hdXhn8udXTndmJ2KNbs6Wof4mtbScExE2_59ZuAN-zdjI2ZNMfWONc8wU_6CDcPMh_1O\" style=\"height:480px; width:320px\" type=\"image\" /></strong></p>\r\n\r\n<p>Thời điểm giặt &aacute;o d&agrave;i c&aacute;ch t&acirc;n tốt nhất l&agrave; ngay sau khi mặc xong, kh&ocirc;ng n&ecirc;n để qu&aacute; l&acirc;u mới giặt &aacute;o d&agrave;i c&aacute;ch t&acirc;n, bởi để &aacute;o d&agrave;i bẩn c&agrave;ng l&acirc;u th&igrave; vết bẩn c&agrave;ng b&aacute;m d&iacute;nh v&agrave;o &aacute;o d&agrave;i, rất kh&oacute; l&agrave;m sạch hoặc khi l&agrave;m sạch th&igrave; sợi vải dễ bị b&agrave;o m&ograve;n, giảm độ bền. Nếu b&eacute; kh&ocirc;ng mặc &aacute;o d&agrave;i thường xuy&ecirc;n, mẹ n&ecirc;n gấp gọn g&agrave;ng &aacute;o d&agrave;i chất liệu cotton rồi cho v&agrave;o t&uacute;i giấy sạch để gi&uacute;p &aacute;o lu&ocirc;n mềm mại v&agrave; kh&ocirc;ng b&aacute;m bụi. Tr&aacute;nh để &aacute;o d&agrave;i trong t&uacute;i nilon bởi n&oacute; sẽ g&acirc;y n&ecirc;n t&igrave;nh trạng xỉn m&agrave;u v&agrave; ố v&agrave;ng.</p>\r\n\r\n<p>Hy vọng sau khi tham khảo b&agrave;i viết n&agrave;y, mẹ sẽ thấy được những l&yacute; do tại sau n&ecirc;n mua &aacute;o d&agrave;i c&aacute;ch t&acirc;n b&eacute; g&aacute;i 10 tuổi, hoặc &aacute;o d&agrave;i c&aacute;ch t&acirc;n b&eacute; g&aacute;i 12 tuổi với chất liệu cotton.</p>', 1, '<p>&Aacute;o d&agrave;i c&aacute;ch t&acirc;n lu&ocirc;n được thiết kế đa dạng với nhiều chất liệu kh&aacute;c nhau. Tuy vậy, việc mẹ lựa chọn &aacute;o d&agrave;i chất liệu tốt v&agrave; ph&ugrave; hợp sẽ gi&uacute;p cho b&eacute; cảm thấy thoải m&aacute;i v&agrave; thư th&aacute;i hơn khi mặc, c&oacute; như vậy b&eacute; mới trở n&ecirc;n tự tin v&agrave; thu h&uacute;t hơn. H&atilde;y c&ugrave;ng Rabity kh&aacute;m ph&aacute; xem lựa chọn chất vải cotton &aacute;o d&agrave;i lu&ocirc;n được tin cậy cho b&eacute; nh&eacute;!&nbsp;</p>', 'Tại sao nên mua áo dài chất liệu cotton?', 'tai-sao-nen-mua-ao-dai-chat-lieu-cotton', 'blog_235.png', '2022-08-05 09:53:04', '2022-08-05 10:56:23'),
(3, '<h2><strong>Mẹo bảo quản c&aacute;c loại &aacute;o kho&aacute;c nỉ</strong></h2>\r\n\r\n<p><em><strong>Để lu&ocirc;n giữ cho &aacute;o kho&aacute;c nỉ tr&ocirc;ng mới mẻ, sạch sẽ th&igrave; mẹ cần biết một số mẹo bảo quản sau:</strong></em></p>\r\n\r\n<p><strong>Mặc &aacute;o cao cổ b&ecirc;n trong lớp &aacute;o nỉ:&nbsp;</strong>Mồ h&ocirc;i v&agrave; bụi bẩn tr&ecirc;n cơ thể rất dễ b&aacute;m bẩn ở phần cổ của &aacute;o nỉ, khiến mẹ kh&oacute; giặt sạch. V&igrave; vậy, mẹ h&atilde;y cho b&eacute; mặc chiếc &aacute;o cao cổ b&ecirc;n trong để tr&aacute;nh t&igrave;nh trạng n&agrave;y.</p>\r\n\r\n<p style=\"text-align:center\"><input alt=\"\" src=\"https://file.hstatic.net/1000290074/file/1_3c795c1e02cc4e568d411e7afd7f87d6_grande.jpg\" style=\"height:600px; width:400px\" type=\"image\" /></p>\r\n\r\n<p><strong>Giặt kh&ocirc; &aacute;o nỉ:&nbsp;</strong>Đối với &aacute;o nỉ, mẹ kh&ocirc;ng n&ecirc;n giặt ướt v&igrave; rất dễ l&agrave;m hỏng d&aacute;ng &aacute;o. V&igrave; vậy, h&atilde;y sử dụng một chiếc khăn ẩm v&agrave; b&agrave;n l&agrave;. Đặt chiếc khăn ẩm l&ecirc;n &aacute;o rồi l&agrave; bằng b&agrave;n l&agrave;. Bụi bẩn sẽ theo hơi nước bay l&ecirc;n, thấm v&agrave;o chiếc khăn mặt. Vậy l&agrave; chiếc &aacute;o dạ của b&eacute; tr&ocirc;ng vẫn như mới rồi.</p>\r\n\r\n<h2><strong>C&aacute;ch giặt v&agrave; bảo quản &aacute;o kho&aacute;c gi&oacute; sao cho đ&uacute;ng c&aacute;ch</strong></h2>\r\n\r\n<p>&Aacute;o gi&oacute; l&agrave; một loại &aacute;o đặc biệt được l&agrave;m chủ yếu từ sợi polyester tổng hợp, thường được nh&agrave; sản xuất tạo t&aacute;c dụng chống thấm nước bằng c&aacute;ch phủ một lớp h&oacute;a chất đặc biệt.<strong>&nbsp;</strong></p>\r\n\r\n<p><em><strong>Để bảo quản đ&uacute;ng c&aacute;ch cho chiếc &aacute;o n&agrave;y, mẹ cần l&agrave;m theo c&aacute;c bước sau:&nbsp;</strong></em></p>\r\n\r\n<p><strong>Về cơ bản, chiếc &aacute;o n&agrave;y&nbsp; c&oacute; thể giặt&nbsp; m&aacute;y hoặc giặt tay.&nbsp;</strong>Mẹ n&ecirc;n giặt tay để hạn chế việc l&agrave;m x&ugrave; mặt vải. D&ugrave; đặt chế độ vắt nhẹ nh&agrave;ng đến đ&acirc;u nhưng lực ly t&acirc;m&nbsp; lớn đến mức ảnh hưởng xấu đến bề mặt vải. Nếu bị bẩn, n&ecirc;n giặt bằng nước ấm (khoảng 2030 độ C) với chất tẩy rửa trung t&iacute;nh. Mẹ tr&aacute;nh sử dụng nước n&oacute;ng bởi v&igrave; vải c&oacute; thể bị co lại hoặc phai m&agrave;u.</p>\r\n\r\n<p style=\"text-align:center\"><input alt=\"\" src=\"https://file.hstatic.net/1000290074/file/e06c3d22903e5b60022f_82a3f25b84634d26ba10196f2f3752c8_grande.jpg\" style=\"height:600px; width:400px\" type=\"image\" /></p>\r\n\r\n<h4><strong>Bảo quản &aacute;o kho&aacute;c gi&oacute;</strong></h4>\r\n\r\n<p>Những chiếc &aacute;o kho&aacute;c gi&oacute; với đặc điểm nhẹ nh&agrave;ng, ấm &aacute;p được nhiều người lựa chọn&nbsp; trong m&ugrave;a đ&ocirc;ng. Tuy nhi&ecirc;n, nếu kh&ocirc;ng biết c&aacute;ch bảo quản, &aacute;o kho&aacute;c gi&oacute; rất dễ bị x&ugrave; bết l&ocirc;ng v&agrave; xỉn m&agrave;u. Mẹ n&ecirc;n treo tr&ecirc;n m&oacute;c trong tủ quần &aacute;o, để nơi tho&aacute;ng kh&iacute; tr&aacute;nh ẩm mốc. Đặc biệt,&nbsp; hạn chế gấp &aacute;o gi&oacute;.</p>\r\n\r\n<p>Vệ sinh tủ quần &aacute;o thường xuy&ecirc;n để tr&aacute;nh bụi bẩn, tr&aacute;nh &aacute;nh nắng trực tiếp.</p>\r\n\r\n<p><strong><em>Lưu &yacute;:&nbsp;</em></strong>Khi giặt mẹ n&ecirc;n lộn tr&aacute;i chiếc &aacute;o để tr&aacute;nh mặt vải bị lực v&ograve; l&agrave;m tổn thương.</p>\r\n\r\n<h2><strong>C&aacute;ch bảo quản &aacute;o kho&aacute;c len</strong></h2>\r\n\r\n<p>&Aacute;o kho&aacute;c len trở n&ecirc;n rất hot trong m&ugrave;a thu đ&ocirc;ng. Chắc hẳn mẹ cũng đ&atilde; mua cho b&eacute; &iacute;t nhất một chiếc &aacute;o kho&aacute;c len rồi đ&uacute;ng kh&ocirc;ng n&agrave;o? &Aacute;o kho&aacute;c len cũng rất thoải m&aacute;i khi mặc, nếu biết phối đồ linh hoạt, mẹ c&oacute; thể thay đổi&nbsp; phong c&aacute;ch của b&eacute;.</p>\r\n\r\n<p><strong>Phơi kh&ocirc; đ&uacute;ng c&aacute;ch:&nbsp;</strong>Đầu ti&ecirc;n cuộn&nbsp; &aacute;o len bằng vải cotton rồi&nbsp; vắt kiệt nước. Nếu kh&ocirc;ng c&oacute; khăn b&ocirc;ng, mẹ phải b&oacute;p nhẹ nh&agrave;ng từ tr&ecirc;n xuống dưới để &aacute;o len r&aacute;o nước. Trong mọi trường hợp, mẹ kh&ocirc;ng n&ecirc;n vắt một chiếc &aacute;o kho&aacute;c len như c&aacute;ch mẹ l&agrave;m với quần &aacute;o th&ocirc;ng thường. Mẹ cũng cần phải rất cẩn thận khi l&agrave;m kh&ocirc;. Kh&ocirc;ng l&agrave;m kh&ocirc; bằng m&oacute;c hoặc s&agrave;o. Thay v&agrave;o đ&oacute;, h&atilde;y cho &aacute;o kho&aacute;c len v&agrave;o t&uacute;i phơi kh&ocirc; hoặc trải ra nơi bằng phẳng, tho&aacute;ng m&aacute;t để &aacute;o lu&ocirc;n như mới.</p>\r\n\r\n<p><strong>H&atilde;y gấp quần &aacute;o đ&uacute;ng c&aacute;ch v&agrave; cất v&agrave;o tủ.&nbsp;</strong>D&ugrave;&nbsp; kh&ocirc; hay ướt, th&igrave; việc treo m&oacute;c &aacute;o len vẫn l&agrave;m ch&uacute;ng phải &ldquo;kh&oacute; chịu&rdquo; bởi rất dễ bị mất d&aacute;ng, bai d&atilde;o. V&igrave; vậy, h&atilde;y gấp&nbsp; gọn g&agrave;ng v&agrave; để chung với một m&oacute;n đồ mềm mại&nbsp; như v&aacute;y hoa hoặc &aacute;o thun của b&eacute;. Đừng để ch&uacute;ng lại gần những m&oacute;n đồ nhiều c&uacute;c v&agrave; những vật c&oacute; nhiều ngọc trai v&igrave; rất ch&uacute;ng dễ để những sợi len bị bung ra nếu như bị mắc v&agrave;o.</p>\r\n\r\n<p><em><strong>&nbsp;Tr&ecirc;n đ&acirc;y l&agrave; một số mẹo bảo quản c&aacute;c loại &aacute;o kho&aacute;c thời trang th&ocirc;ng dụng. H&atilde;y lu&ocirc;n l&agrave;m cho chiếc &aacute;o kho&aacute;c trẻ em của b&eacute;&nbsp;được mới mẻ v&agrave; bền đẹp nh&eacute;! Ch&uacute;c c&aacute;c mẹ th&agrave;nh c&ocirc;ng!</strong></em></p>', 1, '<p>C&oacute; rất nhiều loại &aacute;o kho&aacute;c trong tủ quần &aacute;o của con, v&agrave; tất nhi&ecirc;n, c&aacute;ch bảo quản ch&uacute;ng cũng kh&aacute;c nhau. Tất cả b&agrave; mẹ, ai cũng muốn &aacute;o kho&aacute;c của con m&igrave;nh lu&ocirc;n mới v&agrave; l&acirc;u phai. Nhưng kh&ocirc;ng phải ai cũng biết c&aacute;ch l&agrave;m điều đ&oacute;. Sau đ&acirc;y, Rabity sẽ m&aacute;ch mẹ c&aacute;ch bảo quản &aacute;o kho&aacute;c trẻ em, đặc biệt l&agrave;&nbsp;<strong><a href=\"https://rabity.vn/collections/ao-khoac-be-trai-10-tuoi\">&aacute;o kho&aacute;c b&eacute; trai 10 tuổi</a></strong>, &aacute;o kho&aacute;c b&eacute; trai 12 tuổi, &aacute;o kho&aacute;c b&eacute; g&aacute;i 10 tuổi,<a href=\"https://rabity.vn/collections/ao-khoac-be-gai-12-tuoi\">&nbsp;<strong>&aacute;o kho&aacute;c b&eacute; g&aacute;i 12 tuổi</strong></a>&nbsp;vừa bền vừa mới nh&eacute;!</p>', 'Cách bảo quản áo khoác trẻ em vừa bền vừa mới', 'cach-bao-quan-ao-khoac-tre-em-vua-ben-vua-moi', 'blog_333.png', '2022-08-05 09:55:09', '2022-08-05 11:00:31'),
(4, '<h2><strong>Chất liệu&nbsp;</strong></h2>\r\n\r\n<p>T&ugrave;y theo từng loại&nbsp; &aacute;o kho&aacute;c m&agrave; nh&agrave; sản xuất cho ra đời những mẫu m&atilde;, kiểu d&aacute;ng, m&agrave;u sắc ph&ugrave; hợp với mọi lứa tuổi. C&aacute;c chất liệu như len, sợi b&ocirc;ng, cotton, vải nỉ&hellip;&nbsp;</p>\r\n\r\n<h2><strong>&Aacute;o kho&aacute;c th&ocirc;ng dụng&nbsp;</strong></h2>\r\n\r\n<p>Trong qu&aacute; tr&igrave;nh h&igrave;nh th&agrave;nh v&agrave; ph&aacute;t triển, l&agrave;ng thời trang đ&atilde; &ldquo;sản sinh&rdquo; ra nhiều&nbsp;loại &aacute;o kho&aacute;c kh&aacute;c nhau cho mọi giới t&igrave;nh, mọi độ tuổi. Người d&ugrave;ng phổ th&ocirc;ng mới chỉ quen thuộc với c&aacute;ch gọi &quot;&aacute;o kho&aacute;c&quot; chung chung m&agrave; chưa tường tận về t&ecirc;n gọi ch&iacute;nh x&aacute;c của từng sản phẩm thuộc d&ograve;ng &aacute;o n&agrave;y. &Aacute;o kho&aacute;c c&oacute; khả năng cản gi&oacute; v&agrave; chống nước v&agrave; l&agrave;m ấm.&nbsp;</p>\r\n\r\n<p><strong>&Aacute;o kho&aacute;c gi&oacute;:&nbsp;</strong>L&agrave; loại &aacute;o kho&aacute;c mỏng, nhẹ&nbsp; v&agrave; c&oacute; độ thấm h&uacute;t thấp được l&agrave;m bằng PVC (vải d&ugrave;) hoặc nylon. Kh&ocirc;ng giống như c&aacute;c loại &aacute;o kho&aacute;c kh&aacute;c gi&uacute;p bạn giữ ấm trong những th&aacute;ng lạnh hơn, loại vải&nbsp; n&agrave;y gi&uacute;p người mặc thoải m&aacute;i hơn, m&aacute;t hơn, tr&aacute;nh gi&oacute; v&agrave; c&oacute; thể mặc trong thời tiết nắng n&oacute;ng. Do Leon Claude Duhamel sản xuất&nbsp; năm 1965.</p>\r\n\r\n<p style=\"text-align:center\"><input alt=\"\" src=\"https://lh3.googleusercontent.com/Zh-t7s0basPM-s8wdtN8RlqItumbN_MPZCBNT_E6n2draXpVVXdtAdryiOG5WYvc2M65x8Ys4MGiQ3QYyaKm4BGGD73p3vaRLtkm4bdiudA7wRPyJroitSIi-Sy4Jo1yXqv6g7dq\" style=\"height:1024px; width:682px\" type=\"image\" /></p>\r\n\r\n<p><em><strong><a href=\"https://rabity.vn/collections/ao-khoac-be-trai-10-tuoi\">&Aacute;o kho&aacute;c b&eacute; trai 10 tuổi</a>&nbsp;</strong>với họa tiết Marvel si&ecirc;u phong c&aacute;ch cho b&eacute;</em></p>\r\n\r\n<p><strong>&Aacute;o kho&aacute;c phao:&nbsp;</strong>C&ograve;n được gọi l&agrave; &aacute;o b&eacute;o, l&agrave; một loại &aacute;o kho&aacute;c d&agrave;y c&oacute; mũ tr&ugrave;m đầu. &Aacute;o được may bằng chất liệu vải d&ugrave; chống thấm, chống gi&oacute; lạnh tốt. Nguồn gốc của chiếc &aacute;o kho&aacute;c n&agrave;y l&agrave; ở quần đảo Aleutian.</p>\r\n\r\n<p style=\"text-align:center\"><input alt=\"\" src=\"https://lh6.googleusercontent.com/_Zd4k_IxmNdetfbpD7g-alPKBRGpjbn5hysVjYAZ5OEcYbC3ZR6mPWwxMN4x7PcprZFgB2Agz3NrTuq-id3e3gsM35Jv8jjBOBXNugIckSlkWZVtLiX4kKu8TYc8y7kdrX8X3ObE\" style=\"height:1024px; width:683px\" type=\"image\" /></p>\r\n\r\n<h3><em><strong>&gt;&gt;&gt; Xem th&ecirc;m:&nbsp;</strong><a href=\"https://rabity.vn/blogs/meo-nuoi-day-con-khoa-hoc/cach-bao-quan-ao-khoac-tre-em-vua-ben-vua-moi\"><strong>C&aacute;ch bảo quản &aacute;o kho&aacute;c trẻ em vừa bền vừa mới</strong></a></em></h3>\r\n\r\n<p><strong>&Aacute;o kho&aacute;c dạ:</strong>&nbsp;l&agrave; một loại &aacute;o được may bằng sợi thi&ecirc;n nhi&ecirc;n như l&ocirc;ng động vật, sợi b&ocirc;ng, đay., Do vậy, ch&uacute;ng trở n&ecirc;n d&agrave;y dặn n&ecirc;n khả năng giữ ấm của chất liệu n&agrave;y tốt hơn những loại vải kh&aacute;c. Nơi n&oacute; được biết đến nhiều v&agrave;o đầu thế kỷ 16 bởi người xứ Wales.</p>\r\n\r\n<p style=\"text-align:center\"><br />\r\n<input alt=\"\" src=\"https://lh4.googleusercontent.com/EON2zyYa-goBRtpY5BIpz94NQEvvkZpkmGDytc6LDnmzf4Hq_RlOv2RFyMeW_BqObuDbt5rJGEN0P9zwuDurgybj7bEbzbgBPyGqZUVQ0zbeToY-aVvnCYNXDyS9o8b7n7Jn-soM\" style=\"height:1024px; width:683px\" type=\"image\" /></p>\r\n\r\n<p><strong>&Aacute;o kho&aacute;c c&oacute; mũ:&nbsp;</strong>l&agrave; loại &aacute;o c&oacute; mũ tr&ugrave;m đầu, được thiết kế theo nhiều chất liệu vải kh&aacute;c nhau: nỉ, cotton,.. Sự đa dạng c&aacute;c mẫu m&atilde; &aacute;o kho&aacute;c c&oacute; mũ khiến mẹ sẽ dễ d&agrave;ng lựa chọn sản phẩm tốt nhất cho con.</p>\r\n\r\n<p style=\"text-align:center\"><input alt=\"\" src=\"https://lh5.googleusercontent.com/9EroyqlTnicEuqn1IVk_KE-OEXXHjv5QuK7hXJThtS31m1wl20DzjNKr87tZkRaikMq6iuSNe3UuOROCENVrAuVyvd9OLQDfK4kGk1ZjCbaTTiWWNl8oO0qzOFO_AyydH261d7jt\" style=\"height:1024px; width:682px\" type=\"image\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><em><strong><a href=\"https://rabity.vn/collections/ao-khoac-be-gai-12-tuoi\">&Aacute;o kho&aacute;c b&eacute; g&aacute;i 12 tuổi</a>&nbsp;</strong>thiết kế Elsa đậm chất nữ t&iacute;nh</em></p>\r\n\r\n<p>Hy vọng b&agrave;i viết ở tr&ecirc;n c&oacute; thể cung cấp cho c&aacute;c mẹ những th&ocirc;ng tin hữu &iacute;ch v&agrave; h&igrave;nh dung được r&otilde; r&agrave;ng nhất về &aacute;o kho&aacute;c trẻ em l&agrave; g&igrave;.<strong>&nbsp;</strong></p>\r\n\r\n<p>Nếu mẹ muốn mua &aacute;o kho&aacute;c đẹp cho b&eacute; hiện nay th&igrave; h&atilde;y gh&eacute; ngay<strong>&nbsp;Rabity Kids Fashion&nbsp;</strong>nh&eacute;!</p>', 1, '<p><strong>&Aacute;o kho&aacute;c trẻ em</strong>&nbsp;l&agrave; một loại trang phục mặc ngo&agrave;i rất phổ biến hiện nay. T&ugrave;y theo từng độ tuổi m&agrave; &aacute;o kho&aacute;c c&oacute; thiết kế, m&agrave;u sắc v&agrave; kiểu d&aacute;ng kh&aacute;c nhau, c&oacute; thể l&agrave; &aacute;o kho&aacute;c b&eacute; trai 10 tuổi, &aacute;o kho&aacute;c b&eacute; g&aacute;i 10 tuổi, hoặc &aacute;o kho&aacute;c b&eacute; trai 12 tuổi v&agrave; &aacute;o kho&aacute;c b&eacute; g&aacute;i 12 tuổi,....<strong>&nbsp;</strong>T&aacute;c dụng ch&iacute;nh của loại trang phục n&agrave;y l&agrave;&nbsp;giữ ấm cho cơ thể. Những chiếc &aacute;o kho&aacute;c thường được thiết kế với phần tay v&agrave; phần &aacute;o d&agrave;i hơn những chiếc &aacute;o sơ mi th&ocirc;ng thường. T&ugrave;y theo kiểu &aacute;o kho&aacute;c m&agrave; c&aacute;c nh&agrave; thiết kế&nbsp; sử dụng c&uacute;c, kh&oacute;a k&eacute;o, thắt lưng, đ&oacute;ng c&uacute;c, k&eacute;o kh&oacute;a ... hoặc kết hợp giữa c&aacute;c loại &aacute;o với nhau.&nbsp;</p>', 'Áo khoác trẻ em là gì?', 'ao-khoac-tre-em-la-gi', 'blog_440.png', '2022-08-05 09:58:33', '2022-08-05 11:00:21');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brand`
--

CREATE TABLE `brand` (
  `idBrand` int(10) UNSIGNED NOT NULL,
  `BrandName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `BrandSlug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `brand`
--

INSERT INTO `brand` (`idBrand`, `BrandName`, `BrandSlug`, `created_at`, `updated_at`) VALUES
(1, 'LOVEKIDS', 'lovekids', '2022-07-30 09:51:13', '2022-07-30 09:51:13'),
(2, 'Rabity Kids', 'rabity-kids', '2022-07-31 11:53:49', '2022-07-31 11:53:49'),
(3, 'ILABY', 'ilaby', '2022-07-31 11:53:58', '2022-07-31 11:53:58'),
(4, 'AMILA', 'amila', '2022-11-14 10:09:23', '2022-11-14 10:09:23');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `idCart` int(10) UNSIGNED NOT NULL,
  `idCustomer` int(11) UNSIGNED NOT NULL,
  `idProduct` int(11) UNSIGNED NOT NULL,
  `idProAttr` int(11) UNSIGNED NOT NULL,
  `AttributeProduct` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `PriceNew` int(11) NOT NULL,
  `QuantityBuy` int(11) NOT NULL,
  `Total` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`idCart`, `idCustomer`, `idProduct`, `idProAttr`, `AttributeProduct`, `PriceNew`, `QuantityBuy`, `Total`, `created_at`, `updated_at`) VALUES
(18, 3, 12, 25, 'Cân Nặng: 11-12kg', 120000, 1, 120000, '2022-08-31 08:29:54', '2022-08-31 08:29:54'),
(35, 4, 23, 68, 'Size: 8-9Y', 435000, 1, 435000, '2022-11-19 11:14:31', '2022-11-19 11:14:31');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `idCategory` int(10) UNSIGNED NOT NULL,
  `CategoryName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `CategorySlug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`idCategory`, `CategoryName`, `CategorySlug`, `created_at`, `updated_at`) VALUES
(1, 'Quần Áo Nam', 'quan-ao-nam', '2022-07-30 09:51:22', '2022-07-30 09:51:22'),
(2, 'Quần Áo Nữ', 'quan-ao-nu', '2022-07-30 09:51:24', '2022-07-30 09:51:24'),
(3, 'Áo Khoác', 'ao-khoac', '2022-07-30 09:51:27', '2022-07-30 09:51:27'),
(4, 'Phụ Kiện', 'phu-kien', '2022-07-30 09:51:30', '2022-07-30 09:51:30'),
(5, 'Giày Dép Nam', 'giay-dep-nam', '2022-07-30 09:51:32', '2022-07-30 09:51:32'),
(6, 'Giày Dép Nữ', 'giay-dep-nu', '2022-07-30 09:51:34', '2022-07-30 09:51:34'),
(7, 'Váy', 'vay', '2022-10-04 15:13:30', '2022-10-04 15:13:30');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer`
--

CREATE TABLE `customer` (
  `idCustomer` int(10) UNSIGNED NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `PhoneNumber` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CustomerName` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `customer`
--

INSERT INTO `customer` (`idCustomer`, `username`, `password`, `PhoneNumber`, `CustomerName`, `Avatar`, `created_at`, `updated_at`) VALUES
(2, 'hy12345', '25d55ad283aa400af464c76d713c07ad', NULL, NULL, NULL, '2022-08-06 13:29:12', '2022-08-06 13:29:12'),
(3, 'hy123', '25d55ad283aa400af464c76d713c07ad', NULL, NULL, NULL, '2022-08-31 08:29:30', '2022-08-31 08:29:30'),
(4, 'ducduc2102', '6bcb15df44fcb96767f5cc3b444ded22', NULL, NULL, NULL, '2022-11-18 15:37:20', '2022-11-18 15:37:20'),
(5, 'test123', '25d55ad283aa400af464c76d713c07ad', NULL, NULL, NULL, '2023-08-07 10:50:36', '2023-08-07 10:50:36');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(6, '2014_10_12_000000_create_users_table', 1),
(7, '2014_10_12_100000_create_password_resets_table', 1),
(8, '2019_08_19_000000_create_failed_jobs_table', 1),
(9, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(10, '2022_07_29_190711_create_tbl_product_table', 2),
(12, '2022_07_29_202441_create_saleproduct_table', 3),
(13, '2022_07_30_154639_create_brand_table', 4),
(14, '2022_07_30_154846_create_category_table', 4),
(15, '2022_07_30_155010_create_attribute_table', 4),
(16, '2022_07_30_155047_create_attributevalue_table', 4),
(17, '2022_07_30_155155_create_productattribute_table', 4),
(18, '2022_07_30_155246_create_productimage_table', 4),
(19, '2022_07_30_160811_create_admin_table', 5),
(20, '2022_07_30_162600_create_bill_table', 6),
(22, '2022_07_30_164010_create_billinfo_table', 7),
(23, '2022_07_30_171111_create_cart_table', 8),
(24, '2022_07_30_171621_create_wishlist_table', 9),
(25, '2022_07_30_171653_create_compare_table', 9),
(26, '2022_07_30_171717_create_blog_table', 9),
(27, '2022_07_30_171748_create_customer_table', 9),
(28, '2022_07_30_171916_create_statistic_table', 9),
(29, '2022_07_30_171958_create_voucher_table', 9),
(30, '2022_07_30_172031_create_billhistory_table', 9),
(31, '2022_07_30_172109_create_addresscustomer_table', 9);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `idProduct` int(10) UNSIGNED NOT NULL,
  `idCategory` int(11) UNSIGNED NOT NULL,
  `idBrand` int(11) UNSIGNED NOT NULL,
  `QuantityTotal` int(11) NOT NULL,
  `ProductName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ProductSlug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DesProduct` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `ShortDes` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Price` int(255) NOT NULL,
  `Sold` int(11) NOT NULL DEFAULT 0,
  `StatusPro` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`idProduct`, `idCategory`, `idBrand`, `QuantityTotal`, `ProductName`, `ProductSlug`, `DesProduct`, `ShortDes`, `Price`, `Sold`, `StatusPro`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 62, 'Áo sơ mi cộc tay bé trai trắng, kem chất liệu Cotton thoáng mát cho bé từ 8-12 tuổi LOVEKIDS', 'ao-so-mi-coc-tay-be-trai-trang-kem-chat-lieu-cotton-thoang-mat-cho-be-tu-8-12-tuoi-lovekids', '<p>* M&Ocirc; TẢ SẢN PHẨM:<br />\r\n- Sản phẩm được thiết kế v&agrave; sản xuất độc quyền bởi Lovekids JSC.<br />\r\n- Hệ size từ 6 tuổi đến 12 tuổi<br />\r\n- Chất liệu vải 100% cotton mềm mại, tho&aacute;ng m&aacute;t.<br />\r\n* HƯỚNG DẪN BẢO QUẢN<br />\r\nGiặt tay hoặc giặt bằng m&aacute;y kh&ocirc;ng qu&aacute; 30 độ C.<br />\r\nL&agrave; ở nhiệt độ thường.<br />\r\nKh&ocirc;ng giặt chung đồ bị phai m&agrave;u.<br />\r\nKh&ocirc;ng ng&acirc;m sản phẩm qu&aacute; 30 ph&uacute;t với x&agrave; ph&ograve;ng giặt.<br />\r\nKh&ocirc;ng sử dụng chất tẩy mạnh.</p>\r\n\r\n<p>* CHÍNH SÁCH ĐỔI SẢN PHẨM<br />\r\nThời gian đổi sản phẩm: Kh&aacute;ch h&agrave;ng c&oacute; thể đổi trả sản phẩm theo qui định của ShopeeMall hoặc c&oacute; thể đổi trả &nbsp;qua hệ thống cửa h&agrave;ng của Lovekids Store.<br />\r\nMỗi đơn h&agrave;ng được đổi trả tối đa 1 lần.<br />\r\nSản phẩm phải c&ograve;n nguy&ecirc;n m&aacute;c, chưa qua sử dụng, giặt tẩy, kh&ocirc;ng bị dơ, bẩn hoặc bị hư hỏng bởi c&aacute;c t&aacute;c nh&acirc;n b&ecirc;n ngo&agrave;i.<br />\r\nĐể lựa chọn sản phẩm vừa vặn với b&eacute;, c&aacute;c mẹ c&oacute; thể tham khảo bảng size hoặc gửi tin nhắn ngay cho Lovekids để nhận được hỗ trợ nh&eacute;.</p>\r\n\r\n<p>----------------------------------------------------------<br />\r\nC&ocirc;ng ty Cổ phần LoveKids được th&agrave;nh lập v&agrave;o năm 2015, hoạt động trong lĩnh vực sản xuất v&agrave; ph&acirc;n phối sản phẩm thời trang trẻ em xuất khẩu. Ch&uacute;ng t&ocirc;i mong muốn mang đến một sản phẩm của người Việt nhưng chất lượng c&oacute; thể đ&aacute;p ứng được nhu cầu của kh&aacute;ch h&agrave;ng tr&ecirc;n to&agrave;n thế giới. &nbsp;Hiện nay, c&aacute;c sản phẩm của ch&uacute;ng t&ocirc;i đ&atilde; c&oacute; mặt tại nhiều cửa h&agrave;ng v&agrave; trung t&acirc;m thương mại lớn ở Việt Nam c&ugrave;ng hơn 100,000 kh&aacute;ch h&agrave;ng tin tưởng v&agrave; ủng hộ. Lovekids đang kh&ocirc;ng ngừng nỗ lực để khẳng định t&ecirc;n tuổi của m&igrave;nh trong l&agrave;ng thời trang trẻ em.</p>', '<p>* M&Ocirc; TẢ SẢN PHẨM:<br />\r\n- Sản phẩm được thiết kế v&agrave; sản xuất độc quyền bởi Lovekids JSC.<br />\r\n- Hệ size từ 8 tuổi đến 12 tuổi<br />\r\n- Chất liệu vải 100% cotton mềm mại, tho&aacute;ng m&aacute;t.</p>', 259000, 4, 1, '2022-07-30 10:03:45', '2022-10-21 14:48:55'),
(2, 7, 1, 127, 'Chân váy nhung phối cúc bé gái - Lovekids', 'chan-vay-nhung-phoi-cuc-be-gai-lovekids', '<p>* M&Ocirc; TẢ SẢN PHẨM<br />\r\n- Sản xuất tại Việt Nam.<br />\r\n- Hệ size từ 6 tuổi đến 11/12 tuổi.<br />\r\n- Chất liệu vải nhung mềm mại<br />\r\n- M&agrave;u sắc: cam, n&acirc;u&nbsp;</p>\r\n\r\n<p>* HƯỚNG DẪN BẢO QUẢN<br />\r\nGiặt tay hoặc giặt bằng m&aacute;y kh&ocirc;ng qu&aacute; 30 độ C.<br />\r\nL&agrave; ở nhiệt độ thường.<br />\r\nKh&ocirc;ng giặt chung đồ bị phai m&agrave;u.<br />\r\nKh&ocirc;ng ng&acirc;m sản phẩm qu&aacute; 30 ph&uacute;t với x&agrave; ph&ograve;ng giặt.<br />\r\nKh&ocirc;ng sử dụng chất tẩy mạnh.</p>\r\n\r\n<p>* CHÍNH SÁCH ĐỔI SẢN PHẨM<br />\r\nThời gian đổi sản phẩm: Trong v&ograve;ng 7 ng&agrave;y kể từ ng&agrave;y nhận theo qui định của ShopeeMall<br />\r\nSản phẩm phải c&ograve;n nguy&ecirc;n m&aacute;c, chưa qua sử dụng, giặt tẩy, kh&ocirc;ng bị dơ, bẩn hoặc bị hư hỏng bởi c&aacute;c t&aacute;c nh&acirc;n b&ecirc;n ngo&agrave;i.<br />\r\nĐể lựa chọn sản phẩm vừa vặn với b&eacute;, c&aacute;c mẹ c&oacute; thể tham khảo bảng size hoặc gửi tin nhắn ngay cho Lovekids để nhận được hỗ trợ nh&eacute;.<br />\r\n----------------------------------------------------------<br />\r\nC&ocirc;ng ty Cổ phần LoveKids được th&agrave;nh lập v&agrave;o năm 2015, hoạt động trong lĩnh vực sản xuất v&agrave; ph&acirc;n phối sản phẩm thời trang trẻ em xuất khẩu. Ch&uacute;ng t&ocirc;i mong muốn mang đến một sản phẩm của người Việt nhưng chất lượng c&oacute; thể đ&aacute;p ứng được nhu cầu của kh&aacute;ch h&agrave;ng tr&ecirc;n to&agrave;n thế giới. &nbsp;Hiện nay, c&aacute;c sản phẩm của ch&uacute;ng t&ocirc;i đ&atilde; c&oacute; mặt tại nhiều cửa h&agrave;ng v&agrave; trung t&acirc;m thương mại lớn ở Việt Nam c&ugrave;ng hơn 100,000 kh&aacute;ch h&agrave;ng tin tưởng v&agrave; ủng hộ. Lovekids đang kh&ocirc;ng ngừng nỗ lực để khẳng định t&ecirc;n tuổi của m&igrave;nh trong l&agrave;ng thời trang trẻ em.</p>', '<p>* M&Ocirc; TẢ SẢN PHẨM<br />\r\n- Sản xuất tại Việt Nam.<br />\r\n- Hệ size từ 6 tuổi đến 11/12 tuổi.<br />\r\n- Chất liệu vải nhung mềm mại<br />\r\n- M&agrave;u sắc: cam, n&acirc;u&nbsp;</p>', 259000, 2, 1, '2022-07-30 10:05:24', '2022-10-04 15:14:01'),
(3, 3, 1, 57, 'Áo khoác nhung tăm túi hộp bé trai - Lovekids', 'ao-khoac-nhung-tam-tui-hop-be-trai-lovekids', '<p>* M&Ocirc; TẢ SẢN PHẨM<br />\r\n- Sản xuất tại Việt Nam<br />\r\n- Hệ size từ 8 tuổi đến 12 tuổi<br />\r\n- Chất liệu nhung tăm cao cấp mềm mịn.<br />\r\n- &Aacute;o kho&aacute;c nhung tăm t&uacute;i hộp chắc chắn l&agrave; item kh&ocirc;ng thể thiếu cho c&aacute;c ch&agrave;ng trong m&ugrave;a Thu Đ&ocirc;ng n&agrave;y.<br />\r\n- Dễ d&agrave;ng phối hợp với c&aacute;c item kh&aacute;c l&agrave; c&aacute;c ch&agrave;ng đ&atilde; c&oacute; vẻ ngo&agrave;i &quot;so&aacute;i ca&quot;.</p>\r\n\r\n<p>* HƯỚNG DẪN BẢO QUẢN<br />\r\nGiặt tay hoặc giặt bằng m&aacute;y kh&ocirc;ng qu&aacute; 30 độ C.<br />\r\nL&agrave; ở nhiệt độ thường.<br />\r\nKh&ocirc;ng giặt chung đồ bị phai m&agrave;u.<br />\r\nKh&ocirc;ng ng&acirc;m sản phẩm qu&aacute; 30 ph&uacute;t với x&agrave; ph&ograve;ng giặt.<br />\r\nKh&ocirc;ng sử dụng chất tẩy mạnh.</p>\r\n\r\n<p>* CHÍNH SÁCH ĐỔI SẢN PHẨM<br />\r\nThời gian đổi sản phẩm: Trong v&ograve;ng 7 ng&agrave;y theo qui định ShopeeMall.<br />\r\nSản phẩm phải c&ograve;n nguy&ecirc;n m&aacute;c, chưa qua sử dụng, giặt tẩy, kh&ocirc;ng bị dơ, bẩn hoặc bị hư hỏng bởi c&aacute;c t&aacute;c nh&acirc;n b&ecirc;n ngo&agrave;i.<br />\r\nĐể lựa chọn sản phẩm vừa vặn với b&eacute;, c&aacute;c mẹ c&oacute; thể tham khảo bảng size hoặc gửi tin nhắn ngay cho Lovekids để nhận được hỗ trợ nh&eacute;!<br />\r\n----------------------------------------------------------<br />\r\nC&ocirc;ng ty Cổ phần LoveKids được th&agrave;nh lập v&agrave;o năm 2015, hoạt động trong lĩnh vực sản xuất v&agrave; ph&acirc;n phối sản phẩm thời trang trẻ em xuất khẩu. Ch&uacute;ng t&ocirc;i mong muốn mang đến một sản phẩm của người Việt nhưng chất lượng c&oacute; thể đ&aacute;p ứng được nhu cầu của kh&aacute;ch h&agrave;ng tr&ecirc;n to&agrave;n thế giới. &nbsp;Hiện nay, c&aacute;c sản phẩm của ch&uacute;ng t&ocirc;i đ&atilde; c&oacute; mặt tại nhiều cửa h&agrave;ng v&agrave; trung t&acirc;m thương mại lớn ở Việt Nam c&ugrave;ng hơn 100,000 kh&aacute;ch h&agrave;ng tin tưởng v&agrave; ủng hộ. Lovekids đang kh&ocirc;ng ngừng nỗ lực để khẳng định t&ecirc;n tuổi của m&igrave;nh trong l&agrave;ng thời trang trẻ em</p>', '<p>* M&Ocirc; TẢ SẢN PHẨM<br />\r\n- Sản xuất tại Việt Nam<br />\r\n- Hệ size từ 8 tuổi đến 12 tuổi<br />\r\n- Chất liệu nhung tăm cao cấp mềm mịn.<br />\r\n- &Aacute;o kho&aacute;c nhung tăm t&uacute;i hộp chắc chắn l&agrave; item kh&ocirc;ng thể thiếu cho c&aacute;c ch&agrave;ng trong m&ugrave;a Thu Đ&ocirc;ng n&agrave;y.<br />\r\n- Dễ d&agrave;ng phối hợp với c&aacute;c item kh&aacute;c l&agrave; c&aacute;c ch&agrave;ng đ&atilde; c&oacute; vẻ ngo&agrave;i &quot;so&aacute;i ca&quot;</p>', 445000, 3, 1, '2022-07-30 10:06:38', '2022-07-30 10:08:22'),
(4, 3, 1, 82, 'Áo khoác dạng vest màu trơn bé trai - Lovekids', 'ao-khoac-dang-vest-mau-tron-be-trai-lovekids', '<p>* M&Ocirc; TẢ SẢN PHẨM<br />\r\n- Sản xuất tại Việt Nam.<br />\r\n- Hệ size từ 8 tuổi đến 12 tuổi.<br />\r\n- Chất liệu vải Tuytsi cao cấp.</p>\r\n\r\n<p>* HƯỚNG DẪN BẢO QUẢN<br />\r\nGiặt tay hoặc giặt bằng m&aacute;y kh&ocirc;ng qu&aacute; 30 độ C.<br />\r\nL&agrave; ở nhiệt độ thường.<br />\r\nKh&ocirc;ng giặt chung đồ bị phai m&agrave;u.<br />\r\nKh&ocirc;ng ng&acirc;m sản phẩm qu&aacute; 30 ph&uacute;t với x&agrave; ph&ograve;ng giặt.<br />\r\nKh&ocirc;ng sử dụng chất tẩy mạnh.</p>\r\n\r\n<p>* CHÍNH SÁCH ĐỔI SẢN PHẨM<br />\r\nThời gian đổi sản phẩm: Trong v&ograve;ng 7 ng&agrave;y kể từ ng&agrave;y nhận theo qui định của ShopeeMall<br />\r\nSản phẩm phải c&ograve;n nguy&ecirc;n m&aacute;c, chưa qua sử dụng, giặt tẩy, kh&ocirc;ng bị dơ, bẩn hoặc bị hư hỏng bởi c&aacute;c t&aacute;c nh&acirc;n b&ecirc;n ngo&agrave;i.<br />\r\nĐể lựa chọn sản phẩm vừa vặn với b&eacute;, c&aacute;c mẹ c&oacute; thể tham khảo bảng size hoặc gửi tin nhắn ngay cho Lovekids để nhận được hỗ trợ nh&eacute;.<br />\r\n----------------------------------------------------------<br />\r\nC&ocirc;ng ty Cổ phần LoveKids được th&agrave;nh lập v&agrave;o năm 2015, hoạt động trong lĩnh vực sản xuất v&agrave; ph&acirc;n phối sản phẩm thời trang trẻ em xuất khẩu. Ch&uacute;ng t&ocirc;i mong muốn mang đến một sản phẩm của người Việt nhưng chất lượng c&oacute; thể đ&aacute;p ứng được nhu cầu của kh&aacute;ch h&agrave;ng tr&ecirc;n to&agrave;n thế giới. &nbsp;Hiện nay, c&aacute;c sản phẩm của ch&uacute;ng t&ocirc;i đ&atilde; c&oacute; mặt tại nhiều cửa h&agrave;ng v&agrave; trung t&acirc;m thương mại lớn ở Việt Nam c&ugrave;ng hơn 100,000 kh&aacute;ch h&agrave;ng tin tưởng v&agrave; ủng hộ. Lovekids đang kh&ocirc;ng ngừng nỗ lực để khẳng định t&ecirc;n tuổi của m&igrave;nh trong l&agrave;ng thời trang trẻ em.</p>', '<p>* M&Ocirc; TẢ SẢN PHẨM<br />\r\n- Sản xuất tại Việt Nam.<br />\r\n- Hệ size từ 8 tuổi đến 12 tuổi.<br />\r\n- Chất liệu vải Tuytsi cao cấp.</p>', 509000, 3, 1, '2022-07-30 10:08:00', '2022-07-30 10:08:00'),
(11, 1, 2, 214, 'Áo phông tay ngắn bé trai hình khủng long năng động Rabity thun mát bền chất cotton thấm hút mồ hôi mặc thu đông 91155', 'ao-phong-tay-ngan-be-trai-hinh-khung-long-nang-dong-rabity-thun-mat-ben-chat-cotton-tham-hut-mo-hoi-mac-thu-dong-91155', '<p>1. RABITY CAM KẾT</p>\r\n\r\n<p>- Hỗ trợ đổi trả 30 ng&agrave;y tr&ecirc;n to&agrave;n quốc</p>\r\n\r\n<p>- Tư vấn nhiệt t&igrave;nh, giải quyết thỏa đ&aacute;ng khi kh&aacute;ch h&agrave;ng gặp vấn đề về sản phẩm</p>\r\n\r\n<p>- Sản phẩm sale: Sẵn s&agrave;ng đổi size nếu c&ograve;n size</p>\r\n\r\n<p>- Đặc quyền của sản phẩm nguy&ecirc;n gi&aacute;(kh&ocirc;ng sale): Sẵn s&agrave;ng đổi size, đổi lu&ocirc;n qua sản phẩm kh&aacute;c bằng gi&aacute; hoặc cao hơn &amp; b&ugrave; ch&ecirc;nh lệch.</p>\r\n\r\n<p>- Sản phẩm đổi trả phải c&ograve;n nguy&ecirc;n m&aacute;c, chưa qua sử dụng, giặt tẩy, kh&ocirc;ng bị bẩn hoặc bị hư hỏng bởi c&aacute;c t&aacute;c nh&acirc;n b&ecirc;n ngo&agrave;i.</p>\r\n\r\n<p>- Mọi thắc mắc xin qu&yacute; kh&aacute;ch vui l&ograve;ng nhắn tin trực tiếp cho shop để được hỗ trợ, từ 8h-22h mỗi ng&agrave;y</p>\r\n\r\n<p>- Với h&agrave;ng đồ l&oacute;t, khẩu trang Raibty rất lấy l&agrave;m tiếc v&igrave; kh&ocirc;ng thể hỗ trợ đổi</p>\r\n\r\n<p>- Rabity sẽ hỗ trợ ph&iacute; ship đổi hai chiều trong TH: giao sai h&agrave;ng, sản phẩm bị lỗi, ...</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>2. TH&Ocirc;NG TIN SẢN PHẨM: &Aacute;o ph&ocirc;ng tay ngắn b&eacute; trai h&igrave;nh khủng long năng động Rabity thun m&aacute;t bền chất cotton thấm h&uacute;t mồ h&ocirc;i mặc thu đ&ocirc;ng</p>\r\n\r\n<p>- Chất liệu sản phẩm: Chất liệu chủ đạo l&agrave; Cotton, được sản xuất từ sợi b&ocirc;ng thi&ecirc;n nhi&ecirc;n - một trong những loại Cotton an to&agrave;n được c&aacute;c mẹ bỉm ưa chuộng nhất</p>\r\n\r\n<p>- Q&ugrave;a tặng 0đ cho c&aacute;c đơn h&agrave;ng</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>- K&iacute;ch thước: bảng size ph&iacute;a dưới</p>\r\n\r\n<p style=\"text-align:center\"><img src=\"https://cf.shopee.vn/file/d0cc8514e1adcca99a10e3de106fb9f0\" style=\"height:invalid-value; width:invalid-value\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>- V&igrave; sao c&aacute;c mẹ bỉm sữa n&ecirc;n lựa chọn &aacute;o ph&ocirc;ng tay ngắn b&eacute; trai h&igrave;nh khủng long năng động Rabity thun m&aacute;t bền chất cotton thấm h&uacute;t mồ h&ocirc;i mặc thu đ&ocirc;ng Rabity?</p>\r\n\r\n<p>+ Thiết kế thời trang, năng động, đ&aacute;ng y&ecirc;u. M&agrave;u sắc tươi s&aacute;ng</p>\r\n\r\n<p>+ Họa tiết v&agrave; h&igrave;nh in chắc chắc, kh&ocirc;ng bong tr&oacute;c</p>\r\n\r\n<p>+ Được may với đường kim mũi chỉ cẩn thận, chắc chắn.</p>\r\n\r\n<p>+ Sử dụng chất liệu cotton với ưu điểm vượt trội l&agrave; khả năng thấm h&uacute;t mồ h&ocirc;i cao đem lại sự tho&aacute;ng m&aacute;t, thoải m&aacute;i cho b&eacute;, mềm mại tuyệt đối tạo sự dễ chịu khi chạm v&agrave;o, an to&agrave;n với l&agrave;n da nhạy cảm của b&eacute;.</p>\r\n\r\n<p style=\"text-align:center\"><img src=\"https://cf.shopee.vn/file/edf7e8646346b24381b5793933e809a6\" style=\"height:invalid-value; width:invalid-value\" /></p>\r\n\r\n<p style=\"text-align:center\"><img src=\"https://cf.shopee.vn/file/db2690ffeb8afebb1cde465054e83fc1\" style=\"height:invalid-value; width:invalid-value\" /></p>\r\n\r\n<p style=\"text-align:center\"><img src=\"https://cf.shopee.vn/file/9c0a65777642989b8889e7985a535da6\" style=\"height:invalid-value; width:invalid-value\" /></p>\r\n\r\n<p style=\"text-align:center\"><img src=\"https://cf.shopee.vn/file/04907b36311774201bf04bf22a5448f4\" style=\"height:invalid-value; width:invalid-value\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>3. HƯỚNG DẪN BẢO QUẢN ĐỒ CHO B&Eacute;: &aacute;o ph&ocirc;ng tay ngắn b&eacute; trai h&igrave;nh khủng long năng động Rabity thun m&aacute;t bền chất cotton thấm h&uacute;t mồ h&ocirc;i mặc thu đ&ocirc;ng</p>\r\n\r\n<p>- Tốt nhất n&ecirc;n giặt bằng tay đồ của trẻ</p>\r\n\r\n<p>- N&ecirc;n d&ugrave;ng bột giặt v&agrave; nước xả vải chuy&ecirc;n dụng cho quần &aacute;o b&eacute; nhỏ</p>\r\n\r\n<p>- Nếu giặt m&aacute;y, d&ugrave;ng t&uacute;i giặt v&agrave; giặt ở chế độ nhẹ/ chế độ d&agrave;nh ri&ecirc;ng cho đồ của b&eacute;</p>\r\n\r\n<p>- L&agrave; ủi ở nhiệt độ thấp</p>\r\n\r\n<p>- Phơi kh&ocirc; dưới &aacute;nh nắng, nơi tho&aacute;ng m&aacute;t</p>\r\n\r\n<p style=\"text-align:center\"><img src=\"https://cf.shopee.vn/file/73c478b42d1157c55499de1dc206fb7d\" style=\"height:invalid-value; width:invalid-value\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>4. HƯỚNG DẪN ĐẶT H&Agrave;NG &aacute;o ph&ocirc;ng tay ngắn b&eacute; trai h&igrave;nh khủng long năng động Rabity thun m&aacute;t bền chất cotton thấm h&uacute;t mồ h&ocirc;i mặc thu đ&ocirc;ng</p>\r\n\r\n<p>- Chat với shop để được tư vấn về size ➥ Chọn M&Agrave;U ➥ Chọn SIZE / SỐ LƯỢNG ➥ Nhấn TH&Ecirc;M V&Agrave;O GIỎ H&Agrave;NG</p>\r\n\r\n<p>(Muốn chọn th&ecirc;m m&agrave;u kh&aacute;c hoặc mẫu kh&aacute;c l&agrave;m tương tự c&aacute;c bước tr&ecirc;n)</p>\r\n\r\n<p>- Đừng qu&ecirc;n chọn th&ecirc;m voucher để được mua với gi&aacute; ưu đ&atilde;i nhất!</p>\r\n\r\n<p>- Muốn ho&agrave;n tất đơn h&agrave;ng nhấn v&agrave;o giỏ h&agrave;ng g&oacute;c tr&ecirc;n b&ecirc;n phải m&agrave;n h&igrave;nh tiến h&agrave;nh thanh to&aacute;n</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>5. RABITY - Thương hiệu thời trang trẻ em h&agrave;ng đầu Việt Nam, với hệ thống 80 cửa h&agrave;ng to&agrave;n quốc, c&oacute; mặt tại nhiều hệ thống si&ecirc;u thị lớn Vincom, Lotte, Aeon mall,&hellip; v&agrave; kinh nghiệm 20 năm theo đuổi mục ti&ecirc;u mang tới những sản phẩm từ chất liệu thi&ecirc;n nhi&ecirc;n an to&agrave;n, thoải m&aacute;i, gi&uacute;p trẻ tự do vận động, kh&aacute;m ph&aacute; thế giới. Rabity cũng l&agrave; đơn vị thời trang duy nhất tại VN đồng sở hữu bản quyền từ tập đo&agrave;n giải tr&iacute; Disney v&agrave; biểu tượng thời trang Ph&aacute;p - ELLE</p>', '<p>&Aacute;o ph&ocirc;ng tay ngắn b&eacute; trai h&igrave;nh khủng long thể năng động Rabity thun m&aacute;t bền chất cotton thấm h&uacute;t mồ h&ocirc;i mặc thu đ&ocirc;ng 91155</p>', 173000, 0, 1, '2022-08-28 08:19:15', '2022-08-28 08:19:15'),
(12, 1, 2, 165, 'Áo thun bé trai Rabity phông cotton hình siêu anh hùng spiderman thấm hút mồ hôi 5536', 'ao-thun-be-trai-rabity-phong-cotton-hinh-sieu-anh-hung-spiderman-tham-hut-mo-hoi-5536', '<p>&Aacute;o thun b&eacute; trai Rabity ph&ocirc;ng cotton h&igrave;nh si&ecirc;u anh h&ugrave;ng spiderman thấm h&uacute;t mồ h&ocirc;i 5535 5411.5534.5536</p>\r\n\r\n<p>1. RABITY CAM KẾT<br />\r\n- Hỗ trợ đổi trả 30 ng&agrave;y tr&ecirc;n to&agrave;n quốc&nbsp;<br />\r\n- Tư vấn nhiệt t&igrave;nh, giải quyết thỏa đ&aacute;ng khi kh&aacute;ch h&agrave;ng gặp vấn đề về sản phẩm<br />\r\n- Sản phẩm sale: Sẵn s&agrave;ng đổi size nếu c&ograve;n size<br />\r\n- Đặc quyền của sản phẩm nguy&ecirc;n gi&aacute;(kh&ocirc;ng sale): Sẵn s&agrave;ng đổi size, đổi lu&ocirc;n qua sản phẩm kh&aacute;c bằng gi&aacute; hoặc cao hơn &amp; b&ugrave; ch&ecirc;nh lệch.&nbsp;<br />\r\n- Sản phẩm đổi trả phải c&ograve;n nguy&ecirc;n m&aacute;c, chưa qua sử dụng, giặt tẩy, kh&ocirc;ng bị bẩn hoặc bị hư hỏng bởi c&aacute;c t&aacute;c nh&acirc;n b&ecirc;n ngo&agrave;i.<br />\r\n- Mọi thắc mắc xin qu&yacute; kh&aacute;ch vui l&ograve;ng nhắn tin trực tiếp cho shop để được hỗ trợ, từ 8h-22h mỗi ng&agrave;y<br />\r\n- Với h&agrave;ng đồ l&oacute;t, khẩu trang Raibty rất lấy l&agrave;m tiếc v&igrave; kh&ocirc;ng thể hỗ trợ đổi<br />\r\n- Rabity sẽ hỗ trợ ph&iacute; ship đổi hai chiều trong TH: giao sai h&agrave;ng, sản phẩm bị lỗi, ...</p>\r\n\r\n<p>2. TH&Ocirc;NG TIN SẢN PHẨM &Aacute;o thun b&eacute; trai Rabity ph&ocirc;ng cotton h&igrave;nh si&ecirc;u anh h&ugrave;ng spiderman thấm h&uacute;t mồ h&ocirc;i&nbsp;<br />\r\n- Chất liệu sản phẩm: Chất liệu chủ đạo l&agrave; Cotton, &nbsp;được sản xuất từ sợi b&ocirc;ng thi&ecirc;n nhi&ecirc;n - một trong những loại Cotton an to&agrave;n được c&aacute;c mẹ bỉm ưa chuộng nhất<br />\r\n- K&iacute;ch thước: bảng size ph&iacute;a dưới</p>\r\n\r\n<p>- V&igrave; sao c&aacute;c mẹ bỉm sữa n&ecirc;n lựa chọn sản phẩm Rabity?<br />\r\n+ Thiết kế thời trang, năng động, đ&aacute;ng y&ecirc;u. M&agrave;u sắc tươi s&aacute;ng&nbsp;<br />\r\n+ Họa tiết v&agrave; h&igrave;nh in chắc chắc, kh&ocirc;ng bong tr&oacute;c<br />\r\n+ Được may với đường kim mũi chỉ cẩn thận, chắc chắn.&nbsp;<br />\r\n+ Sử dụng chất liệu cotton với ưu điểm vượt trội l&agrave; khả năng thấm h&uacute;t mồ h&ocirc;i cao đem lại sự tho&aacute;ng m&aacute;t, thoải m&aacute;i cho b&eacute;, mềm mại tuyệt đối tạo sự dễ chịu khi chạm v&agrave;o, an to&agrave;n với l&agrave;n da nhạy cảm của b&eacute;.<br />\r\n- Q&ugrave;a tặng 0đ tất cả đơn h&agrave;ng</p>\r\n\r\n<p>3. HƯỚNG DẪN BẢO QUẢN ĐỒ CHO B&Eacute; &Aacute;o thun b&eacute; trai Rabity ph&ocirc;ng cotton h&igrave;nh si&ecirc;u anh h&ugrave;ng spiderman thấm h&uacute;t mồ h&ocirc;i<br />\r\n- Tốt nhất n&ecirc;n giặt bằng tay đồ của trẻ<br />\r\n- N&ecirc;n d&ugrave;ng bột giặt v&agrave; nước xả vải chuy&ecirc;n dụng cho quần &aacute;o b&eacute; nhỏ<br />\r\n- Nếu giặt m&aacute;y, d&ugrave;ng t&uacute;i giặt v&agrave; giặt ở chế độ nhẹ/ chế độ d&agrave;nh ri&ecirc;ng cho đồ của b&eacute;<br />\r\n- L&agrave; ủi ở nhiệt độ thấp<br />\r\n- Phơi kh&ocirc; dưới &aacute;nh nắng, nơi tho&aacute;ng m&aacute;t</p>\r\n\r\n<p>4. HƯỚNG DẪN ĐẶT H&Agrave;NG &Aacute;o thun b&eacute; trai Rabity ph&ocirc;ng cotton h&igrave;nh si&ecirc;u anh h&ugrave;ng spiderman thấm h&uacute;t mồ h&ocirc;i<br />\r\n- Chat với shop để được tư vấn về size ➥ Chọn M&Agrave;U ➥ Chọn SIZE / SỐ LƯỢNG ➥ Nhấn TH&Ecirc;M V&Agrave;O GIỎ H&Agrave;NG<br />\r\n(Muốn chọn th&ecirc;m m&agrave;u kh&aacute;c hoặc mẫu kh&aacute;c l&agrave;m tương tự c&aacute;c bước tr&ecirc;n)<br />\r\n- Đừng qu&ecirc;n chọn th&ecirc;m voucher để được mua với gi&aacute; ưu đ&atilde;i nhất!<br />\r\n- Muốn ho&agrave;n tất đơn h&agrave;ng nhấn v&agrave;o giỏ h&agrave;ng g&oacute;c tr&ecirc;n b&ecirc;n phải m&agrave;n h&igrave;nh tiến h&agrave;nh thanh to&aacute;n&nbsp;</p>\r\n\r\n<p>5. Rabity - Thương hiệu thời trang trẻ em h&agrave;ng đầu Việt Nam, với hệ thống 80 cửa h&agrave;ng to&agrave;n quốc, c&oacute; mặt tại nhiều hệ thống si&ecirc;u thị lớn Vincom, Lotte, Aeon mall,&hellip; v&agrave; kinh nghiệm 20 năm theo đuổi mục ti&ecirc;u mang tới những sản phẩm từ chất liệu thi&ecirc;n nhi&ecirc;n an to&agrave;n, thoải m&aacute;i, gi&uacute;p trẻ tự do vận động, kh&aacute;m ph&aacute; thế giới. Rabity cũng l&agrave; đơn vị thời trang duy nhất tại VN đồng sở hữu bản quyền từ tập đo&agrave;n giải tr&iacute; Disney v&agrave; biểu tượng thời trang Ph&aacute;p - ELLE</p>\r\n\r\n<p>CẢM ƠN MẸ V&Agrave; B&Eacute; Đ&Atilde; TIN TƯỞNG V&Agrave; SỬ DỤNG SẢN PHẨM CỦA RABITY&nbsp;</p>', '<p>2. TH&Ocirc;NG TIN SẢN PHẨM &Aacute;o thun b&eacute; trai Rabity ph&ocirc;ng cotton h&igrave;nh si&ecirc;u anh h&ugrave;ng spiderman thấm h&uacute;t mồ h&ocirc;i&nbsp;<br />\r\n- Chất liệu sản phẩm: Chất liệu chủ đạo l&agrave; Cotton, &nbsp;được sản xuất từ sợi b&ocirc;ng thi&ecirc;n nhi&ecirc;n - một trong những loại Cotton an to&agrave;n được c&aacute;c mẹ bỉm ưa chuộng nhất<br />\r\n- K&iacute;ch thước: bảng size ph&iacute;a dưới</p>\r\n\r\n<div class=\"ddict_btn\" style=\"left:1094.06px; top:19px\"><img src=\"chrome-extension://bpggmmljdiliancllaapiggllnkbjocb/logo/48.png\" /></div>', 120000, 0, 1, '2022-08-28 08:32:29', '2022-08-28 08:32:29'),
(13, 2, 3, 240, 'Áo dài cho bé gái ILABY cách tân họa tiết hoa sen tay bồng chất tơ óng mềm mại màu sắc nhẹ làn da bé gái [14IG1666H2FT]', 'ao-dai-cho-be-gai-ilaby-cach-tan-hoa-tiet-hoa-sen-tay-bong-chat-to-ong-mem-mai-mau-sac-nhe-lan-da-be-gai-[14ig1666h2ft]', '<p>ILaby - Nơi thi&ecirc;n thần tỏa s&aacute;ng - &Aacute;o d&agrave;i c&aacute;ch t&acirc;n họa tiết hoa sen tay bồng chất tơ &oacute;ng mềm mại m&agrave;u sắc nhẹ l&agrave;n da b&eacute; g&aacute;i 14IG1666H2FT</p>\r\n\r\n<p>Tại sao lại chọn đồ của ILaby:</p>\r\n\r\n<p>- Sản phẩm được thiết kế độc quyền bởi thương hiệu ILABY</p>\r\n\r\n<p>- Chất liệu an to&agrave;n l&agrave;n da b&eacute;</p>\r\n\r\n<p>- Mẫu m&atilde; đa dạng, đa năng: mặc đi chơi, đi tiệc, đi học đều được</p>\r\n\r\n<p>-----------</p>\r\n\r\n<p>🔶 TH&Ocirc;NG TIN SẢN PHẨM</p>\r\n\r\n<p>Thương hiệu: ILABY</p>\r\n\r\n<p>Xuất xứ: Việt Nam</p>\r\n\r\n<p>M&atilde; sản phẩm: 14IG1666H2FT</p>\r\n\r\n<p>M&agrave;u sắc: Hồng, đỏ, v&agrave;ng</p>\r\n\r\n<p>Chất liệu sử dụng: tơ</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>🔶 ILaby Kids cam kết</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>- Sản phẩm 100% giống m&ocirc; tả.</p>\r\n\r\n<p>- Chất vải được qua chọn lọc, đảm bảo chất lượng 100%</p>\r\n\r\n<p>- H&igrave;nh ảnh sản phẩm l&agrave; ảnh thật do ILaby tự chụp v&agrave; giữ bản quyền h&igrave;nh ảnh</p>\r\n\r\n<p>- Đổi h&agrave;ng, ho&agrave;n tiền nếu sản phẩm kh&ocirc;ng giống với m&ocirc; tả</p>\r\n\r\n<p>- Hỗ trợ đổi trả theo quy định của shopee</p>\r\n\r\n<p>- Qu&yacute; kh&aacute;ch vui l&ograve;ng quay lại video l&uacute;c b&oacute;c h&agrave;ng v&agrave; giữ nguy&ecirc;n tem m&aacute;c để tr&aacute;nh trường hợp đơn vị vận chuyển l&agrave;m mất h&agrave;ng hoặc h&agrave;ng c&oacute; vấn đề từ nh&agrave; sản xuất.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>🔶 CH&Iacute;NH S&Aacute;CH ĐỔI TRẢ ILABY</p>\r\n\r\n<p>- Điều kiện &aacute;p dụng (trong v&ograve;ng 07 ng&agrave;y kể từ khi nhận sản phẩm)</p>\r\n\r\n<p>- Qu&yacute; kh&aacute;ch vui l&ograve;ng quay lại video l&uacute;c b&oacute;c h&agrave;ng v&agrave; giữ nguy&ecirc;n tem m&aacute;c để tr&aacute;nh trường hợp đơn vị vận chuyển l&agrave;m mất h&agrave;ng hoặc h&agrave;ng c&oacute; vấn đề từ nh&agrave; sản xuất.</p>\r\n\r\n<p>- Sản phẩm đổi trả phải c&ograve;n nguy&ecirc;n tem, nh&atilde;n, bao b&igrave;, chưa qua sử dụng giặt tẩy, nguy&ecirc;n vẹn như ban đầu Shop giao</p>\r\n\r\n<p>- Sản phẩm lỗi kỹ thuật được đổi mới</p>\r\n\r\n<p>Do m&agrave;n h&igrave;nh v&agrave; điều kiện &aacute;nh s&aacute;ng kh&aacute;c nhau, m&agrave;u sắc thực tế của sản phẩm c&oacute; thể ch&ecirc;nh lệch khoảng 3-5%</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>🔶 LƯU &Yacute;</p>\r\n\r\n<p>- Qu&yacute; kh&aacute;ch nhận được h&agrave;ng nếu c&oacute; thắc mắc vui l&ograve;ng inbox shop.</p>\r\n\r\n<p>- Kh&aacute;ch y&ecirc;u đặt h&agrave;ng vui l&ograve;ng ghi ch&uacute; hoặc ib số c&acirc;n nặng v&agrave; tuổi của b&eacute; để shop giao h&agrave;ng chuẩn size cho b&eacute; nh&eacute;.</p>\r\n\r\n<p>Ch&uacute;c qu&yacute; kh&aacute;ch mua sắm vui vẻ!</p>', '<p>🔶 TH&Ocirc;NG TIN SẢN PHẨM</p>\r\n\r\n<p>Thương hiệu: ILABY</p>\r\n\r\n<p>Xuất xứ: Việt Nam</p>\r\n\r\n<p>M&atilde; sản phẩm: 14IG1666H2FT</p>\r\n\r\n<p>M&agrave;u sắc: Hồng, đỏ, v&agrave;ng</p>\r\n\r\n<p>Chất liệu sử dụng: tơ</p>', 399000, 0, 1, '2022-08-28 08:36:45', '2022-08-28 08:36:45'),
(14, 2, 3, 135, 'Set áo in vân mây kèm chân váy cho bé gái ILABY chất liệu lụa mềm mại', 'set-ao-in-van-may-kem-chan-vay-cho-be-gai-ilaby-chat-lieu-lua-mem-mai', '<p>ILaby - Nơi thi&ecirc;n thần tỏa s&aacute;ng - Set &aacute;o in v&acirc;n m&acirc;y k&egrave;m ch&acirc;n v&aacute;y cho b&eacute; g&aacute;i ILABY chất liệu lụa mềm mại</p>\r\n\r\n<p>Tại sao lại chọn đồ của ILaby:</p>\r\n\r\n<p>- Sản phẩm được thiết kế độc quyền bởi thương hiệu ILABY</p>\r\n\r\n<p>- Chất liệu an to&agrave;n l&agrave;n da b&eacute;</p>\r\n\r\n<p>-&nbsp; Mẫu m&atilde; đa dạng, đa năng: mặc đi chơi, đi tiệc, đi học đều được</p>\r\n\r\n<p>-----------</p>\r\n\r\n<p>🔶 TH&Ocirc;NG TIN SẢN PHẨM</p>\r\n\r\n<p>Thương hiệu: ILABY</p>\r\n\r\n<p>Xuất xứ: Việt Nam</p>\r\n\r\n<p>M&atilde; sản phẩm: 52IG1220H2FT</p>\r\n\r\n<p>M&agrave;u sắc: trắng</p>\r\n\r\n<p>Chất liệu sử dụng: lụa</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>🔶 ILaby Kids cam kết</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>- Sản phẩm 100% giống m&ocirc; tả.&nbsp;</p>\r\n\r\n<p>- Chất vải được qua chọn lọc, đảm bảo chất lượng 100%</p>\r\n\r\n<p>- H&igrave;nh ảnh sản phẩm l&agrave; ảnh thật do ILaby tự chụp v&agrave; giữ bản quyền h&igrave;nh ảnh</p>\r\n\r\n<p>- Đổi h&agrave;ng, ho&agrave;n tiền nếu sản phẩm kh&ocirc;ng giống với m&ocirc; tả</p>\r\n\r\n<p>- Hỗ trợ đổi trả theo quy định của shopee</p>\r\n\r\n<p>- Qu&yacute; kh&aacute;ch vui l&ograve;ng quay lại video l&uacute;c b&oacute;c h&agrave;ng v&agrave; giữ nguy&ecirc;n tem m&aacute;c để tr&aacute;nh trường hợp đơn vị vận chuyển l&agrave;m mất h&agrave;ng hoặc h&agrave;ng c&oacute; vấn đề từ nh&agrave; sản xuất.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>🔶 CH&Iacute;NH S&Aacute;CH ĐỔI TRẢ ILABY</p>\r\n\r\n<p>- Điều kiện &aacute;p dụng (trong v&ograve;ng 07 ng&agrave;y kể từ khi nhận sản phẩm)&nbsp;</p>\r\n\r\n<p>- Qu&yacute; kh&aacute;ch vui l&ograve;ng quay lại video l&uacute;c b&oacute;c h&agrave;ng v&agrave; giữ nguy&ecirc;n tem m&aacute;c để tr&aacute;nh trường hợp đơn vị vận chuyển l&agrave;m mất h&agrave;ng hoặc h&agrave;ng c&oacute; vấn đề từ nh&agrave; sản xuất.</p>\r\n\r\n<p>- Sản phẩm đổi trả phải c&ograve;n nguy&ecirc;n tem, nh&atilde;n, bao b&igrave;, chưa qua sử dụng giặt tẩy, nguy&ecirc;n vẹn như ban đầu Shop giao</p>\r\n\r\n<p>- Sản phẩm lỗi kỹ thuật được đổi mới</p>\r\n\r\n<p>Do m&agrave;n h&igrave;nh v&agrave; điều kiện &aacute;nh s&aacute;ng kh&aacute;c nhau, m&agrave;u sắc thực tế của sản phẩm c&oacute; thể ch&ecirc;nh lệch khoảng 3-5%</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>🔶 LƯU &Yacute;</p>\r\n\r\n<p>- Qu&yacute; kh&aacute;ch nhận được h&agrave;ng nếu c&oacute; thắc mắc vui l&ograve;ng inbox shop.</p>\r\n\r\n<p>- Kh&aacute;ch y&ecirc;u đặt h&agrave;ng vui l&ograve;ng ghi ch&uacute; hoặc ib số c&acirc;n nặng v&agrave; tuổi của b&eacute; để shop giao h&agrave;ng chuẩn size cho b&eacute; nh&eacute;.&nbsp;</p>\r\n\r\n<p>Ch&uacute;c qu&yacute; kh&aacute;ch mua sắm vui vẻ!</p>', '<p>🔶 TH&Ocirc;NG TIN SẢN PHẨM</p>\r\n\r\n<p>Thương hiệu: ILABY</p>\r\n\r\n<p>Xuất xứ: Việt Nam</p>\r\n\r\n<p>M&atilde; sản phẩm: 52IG1220H2FT</p>\r\n\r\n<p>M&agrave;u sắc: trắng</p>\r\n\r\n<p>Chất liệu sử dụng: lụa</p>', 320000, 0, 1, '2022-08-28 08:40:09', '2022-08-28 08:40:09'),
(15, 4, 2, 119, 'Mũ cói dây hình bông hoa cho bé gái Rabity mùa hè trẻ em 5-7 tuổi 22026', 'mu-coi-day-hinh-bong-hoa-cho-be-gai-rabity-mua-he-tre-em-5-7-tuoi-22026', '<p>Mũ c&oacute;i d&acirc;y h&igrave;nh b&ocirc;ng hoa cho b&eacute; g&aacute;i Rabity n&oacute;n m&ugrave;a h&egrave; cho trẻ em 22026 (5-7 tuổi)</p>\r\n\r\n<p>Tặng qu&agrave; mọi đơn h&agrave;ng</p>\r\n\r\n<p>Rabity cam kết</p>\r\n\r\n<p>- Hỗ trợ đổi trả 30 ng&agrave;y tr&ecirc;n to&agrave;n quốc</p>\r\n\r\n<p>- Tư vấn nhiệt t&igrave;nh, giải quyết thỏa đ&aacute;ng khi kh&aacute;ch h&agrave;ng gặp vấn đề về sản phẩm</p>\r\n\r\n<p>- Sản phẩm sale: sẵn s&agrave;ng đổi size nếu c&ograve;n size</p>\r\n\r\n<p>- Đặc quyền của sản phẩm nguy&ecirc;n gi&aacute;(kh&ocirc;ng sale): sẵn s&agrave;ng đổi size, đổi lu&ocirc;n qua sản phẩm kh&aacute;c bằng gi&aacute; hoặc cao hơn &amp; b&ugrave; ch&ecirc;nh lệch.</p>\r\n\r\n<p>- Sản phẩm đổi trả phải c&ograve;n nguy&ecirc;n m&aacute;c, chưa qua sử dụng, giặt tẩy, kh&ocirc;ng bị bẩn hoặc bị hư hỏng bởi c&aacute;c t&aacute;c nh&acirc;n b&ecirc;n ngo&agrave;i.</p>\r\n\r\n<p>- Mọi thắc mắc xin qu&yacute; kh&aacute;ch vui l&ograve;ng nhắn tin trực tiếp cho shop để được hỗ trợ, từ 8h-22h mỗi ng&agrave;y</p>\r\n\r\n<p>- Với h&agrave;ng đồ l&oacute;t, khẩu trang Raibty rất lấy l&agrave;m tiếc v&igrave; kh&ocirc;ng thể hỗ trợ đổi</p>\r\n\r\n<p>- Rabity sẽ hỗ trợ ph&iacute; ship đổi hai chiều trong trường hợp: giao sai h&agrave;ng, sản phẩm bị lỗi do nh&agrave; sản xuất, ...</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Th&ocirc;ng tin sản phẩm</p>\r\n\r\n<p>- Chất liệu sản phẩm: N&oacute;n cối</p>\r\n\r\n<p>- K&iacute;ch thước: Free size ( ph&ugrave; hợp cho trẻ từ 5-7 tuổi)</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>- V&igrave; sao c&aacute;c mẹ bỉm sữa n&ecirc;n lựa chọn sản phẩm Rabity?</p>\r\n\r\n<p>+ Thiết kế thời trang, năng động, đ&aacute;ng y&ecirc;u. M&agrave;u sắc tươi s&aacute;ng</p>\r\n\r\n<p>+ Họa tiết v&agrave; h&igrave;nh in chắc chắc, kh&ocirc;ng bong tr&oacute;c</p>\r\n\r\n<p>+ Được may với đường kim mũi chỉ cẩn thận, chắc chắn.</p>\r\n\r\n<p>+ Sử dụng chất liệu cotton với ưu điểm vượt trội l&agrave; khả năng thấm h&uacute;t mồ h&ocirc;i cao đem lại sự tho&aacute;ng m&aacute;t, thoải m&aacute;i cho b&eacute;, mềm mại tuyệt đối tạo sự dễ chịu khi chạm v&agrave;o, an to&agrave;n với l&agrave;n da nhạy cảm của b&eacute;.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Hướng dẫn bảo quản đồ cho b&eacute;</p>\r\n\r\n<p>- Tốt nhất n&ecirc;n giặt bằng tay đồ của trẻ</p>\r\n\r\n<p>- N&ecirc;n d&ugrave;ng bột giặt v&agrave; nước xả vải chuy&ecirc;n dụng cho quần &aacute;o b&eacute; nhỏ</p>\r\n\r\n<p>- Nếu giặt m&aacute;y, d&ugrave;ng t&uacute;i giặt v&agrave; giặt ở chế độ nhẹ/ chế độ d&agrave;nh ri&ecirc;ng cho đồ của b&eacute;</p>\r\n\r\n<p>- L&agrave; ủi ở nhiệt độ thấp</p>\r\n\r\n<p>- Phơi kh&ocirc; dưới &aacute;nh nắng, nơi tho&aacute;ng m&aacute;t</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Hướng dẫn đặt h&agrave;ng</p>\r\n\r\n<p>- Chat với shop để được tư vấn về size ➥ chọn m&agrave;u ➥ chọn size / số lượng➥ nhấn th&ecirc;m h&agrave;ng v&agrave;o giỏ h&agrave;ng</p>\r\n\r\n<p>(muốn chọn th&ecirc;m m&agrave;u kh&aacute;c hoặc mẫu kh&aacute;c l&agrave;m tương tự c&aacute;c bước tr&ecirc;n)</p>\r\n\r\n<p>- Đừng qu&ecirc;n chọn th&ecirc;m voucher để được mua với gi&aacute; ưu đ&atilde;i nhất!</p>\r\n\r\n<p>- Muốn ho&agrave;n tất đơn h&agrave;ng nhấn v&agrave;o giỏ h&agrave;ng g&oacute;c tr&ecirc;n b&ecirc;n phải m&agrave;n h&igrave;nh tiến h&agrave;nh thanh to&aacute;n</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Rabity - Thương hiệu thời trang trẻ em h&agrave;ng đầu Việt Nam, với hệ thống 80 cửa h&agrave;ng to&agrave;n quốc, c&oacute; mặt tại nhiều hệ thống si&ecirc;u thị lớn Vincom, Lotte, Aeon mall,&hellip; v&agrave; kinh nghiệm 20 năm theo đuổi mục ti&ecirc;u mang tới những sản phẩm từ chất liệu thi&ecirc;n nhi&ecirc;n an to&agrave;n, thoải m&aacute;i, gi&uacute;p trẻ tự do vận động, kh&aacute;m ph&aacute; thế giới. Rabity cũng l&agrave; đơn vị thời trang duy nhất tại VN đồng sở hữu bản quyền từ tập đo&agrave;n giải tr&iacute; Disney v&agrave; biểu tượng thời trang Ph&aacute;p - Elle</p>', '<p>Th&ocirc;ng tin sản phẩm</p>\r\n\r\n<p>- Chất liệu sản phẩm: N&oacute;n cối</p>\r\n\r\n<p>- K&iacute;ch thước: Free size ( ph&ugrave; hợp cho trẻ từ 5-7 tuổi)</p>', 85000, 0, 1, '2022-10-04 14:40:12', '2022-10-04 14:40:12'),
(16, 1, 2, 133, 'Áo thun bé trai dài tay RABITY cổ tròn hình người nhện Spider man', 'ao-thun-be-trai-dai-tay-rabity-co-tron-hinh-nguoi-nhen-spider-man', '<p>&Aacute;o thun b&eacute; trai d&agrave;i tay RABITY cổ tr&ograve;n h&igrave;nh người nhện Spider man 5512.5519.5538</p>\r\n\r\n<p>Tặng qu&agrave; đơn 0đ</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>🐇 Rabity cam kết</p>\r\n\r\n<p>- Hỗ trợ đổi trả 7 ng&agrave;y tr&ecirc;n to&agrave;n quốc</p>\r\n\r\n<p>- Giao COD to&agrave;n quốc</p>\r\n\r\n<p>- Tư vấn nhiệt t&igrave;nh, giải quyết thỏa đ&aacute;ng khi kh&aacute;ch h&agrave;ng gặp vấn đề về sản phẩm</p>\r\n\r\n<p>- Đặc quyền của sản phẩm nguy&ecirc;n gi&aacute;: Sẵn s&agrave;ng đổi size, đổi lu&ocirc;n qua sản phẩm kh&aacute;c bằng gi&aacute; hoặc cao hơn &amp; b&ugrave; ch&ecirc;nh lệch</p>\r\n\r\n<p>- Sản phẩm đổi trả phải c&ograve;n nguy&ecirc;n m&aacute;c, chưa qua sử dụng, giặt tẩy, kh&ocirc;ng bị bẩn hoặc bị hư hỏng bởi c&aacute;c t&aacute;c nh&acirc;n b&ecirc;n ngo&agrave;i.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&Aacute;o thun b&eacute; trai d&agrave;i tay RABITY cổ tr&ograve;n h&igrave;nh người nhện Spider man</p>\r\n\r\n<p>📍 TH&Ocirc;NG TIN SẢN PHẨM</p>\r\n\r\n<p>- Sản phẩm bao gồm: 01 &Aacute;o thun d&agrave;i tay cổ tr&ograve;n</p>\r\n\r\n<p>- Chất liệu &aacute;o thun b&eacute; trai: Cotton được sản xuất 100% từ sợi b&ocirc;ng thi&ecirc;n nhi&ecirc;n - một trong những loại cotton được c&aacute;c mẹ bỉm ưa chuộng nhất</p>\r\n\r\n<p>- Size &Aacute;o thun b&eacute; trai d&agrave;i tay:</p>\r\n\r\n<p>+ 2Y: 11-12kg</p>\r\n\r\n<p>+ 4Y: 14-16kg</p>\r\n\r\n<p>+ 6Y: 19-21kg</p>\r\n\r\n<p>+ 8Y: 23-25kg</p>\r\n\r\n<p>+ 10Y: 27-30kg</p>\r\n\r\n<p>+ 12Y: 32-34kg</p>\r\n\r\n<p>+ 14Y: 35-37kg</p>\r\n\r\n<p>- V&igrave; sao c&aacute;c mẹ bỉm sữa n&ecirc;n lựa chọn &aacute;o thun b&eacute; trai người nhện của Rabity?</p>\r\n\r\n<p>+ 𝐑𝐚𝐛𝐢𝐭𝐲 l&agrave; đối t&aacute;c duy nhất độc quyền tại Việt Nam của 𝐃𝐢𝐬𝐧𝐞𝐲 được sử dụng bản quyền h&igrave;nh ảnh Marvel cho d&ograve;ng thời trang trẻ em từ 0 - 14 tuổi.</p>\r\n\r\n<p>+ &Aacute;o thun d&agrave;i tay b&eacute; trai được thiết kế dựa tr&ecirc;n nh&acirc;n vật người nhện được c&aacute;c b&eacute; y&ecirc;u mến v&agrave; ngưỡng mộ.</p>\r\n\r\n<p>+ &Aacute;o thun d&agrave;i tay thiết kế kiểu d&aacute;ng khỏe khoắn, năng động cho b&eacute; tự do vận động, hướng đến phong c&aacute;ch tự do, thoải m&aacute;i. Đường may chắc chắn, tỉ mỉ</p>\r\n\r\n<p>+ &Aacute;o thun b&eacute; trai c&oacute; thể phối với 1 chiếc quần jean d&agrave;i kết hợp với một đ&ocirc;i gi&agrave;y thể thao khiến b&eacute; s&agrave;nh điệu, thời trang hơn</p>\r\n\r\n<p>+ &Aacute;o thun d&agrave;i tay cổ tr&ograve;n cho b&eacute; sử dụng chất liệu cotton với ưu điểm vượt trội l&agrave; khả năng thấm h&uacute;t mồ h&ocirc;i cao đem lại sự tho&aacute;ng m&aacute;t, thoải m&aacute;i cho b&eacute;, mềm mại tuyệt đối tạo sự dễ chịu khi chạm v&agrave;o, an to&agrave;n với l&agrave;n da nhạy cảm của b&eacute;.</p>\r\n\r\n<p>+ &Aacute;o thấm h&uacute;t mồ h&ocirc;i n&ecirc;n gi&uacute;p b&eacute; kh&ocirc;ng bị b&iacute;</p>\r\n\r\n<p>+ &Aacute;o thun d&agrave;i tay l&agrave; chiếc &aacute;o y&ecirc;u th&iacute;ch của c&aacute;c b&eacute;. &Aacute;o vừa đơn giản, dễ mặc, dễ phối đồ, thể hiện được phong c&aacute;ch thời trang của c&aacute;c bạn nhỏ</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&Aacute;o thun b&eacute; trai d&agrave;i tay RABITY cổ tr&ograve;n h&igrave;nh người nhện Spider man</p>\r\n\r\n<p>🌤️ HƯỚNG DẪN BẢO QUẢN ĐỒ CHO B&Eacute;</p>\r\n\r\n<p>- Giặt bằng tay</p>\r\n\r\n<p>- N&ecirc;n d&ugrave;ng bột giặt v&agrave; nước xả vải chuy&ecirc;n dụng cho quần &aacute;o b&eacute; nhỏ</p>\r\n\r\n<p>- Nếu giặt m&aacute;y, giặt ở chế độ nhẹ/ chế độ d&agrave;nh ri&ecirc;ng cho đồ của b&eacute;</p>\r\n\r\n<p>- L&agrave; ủi ở nhiệt độ thấp</p>\r\n\r\n<p>- Phơi kh&ocirc; dưới &aacute;nh nắng, nơi tho&aacute;ng m&aacute;t</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&Aacute;o thun b&eacute; trai d&agrave;i tay RABITY cổ tr&ograve;n h&igrave;nh người nhện Spider man</p>\r\n\r\n<p>🛍️ HƯỚNG DẪN ĐẶT H&Agrave;NG</p>\r\n\r\n<p>- Chat với shop để được tư vấn về size ➥ Chọn M&Agrave;U ➥ Chọn SIZE / SỐ LƯỢNG ➥ Nhấn TH&Ecirc;M V&Agrave;O GIỎ H&Agrave;NG</p>\r\n\r\n<p>(Muốn chọn th&ecirc;m m&agrave;u kh&aacute;c hoặc mẫu kh&aacute;c l&agrave;m tương tự c&aacute;c bước tr&ecirc;n)</p>\r\n\r\n<p>- Muốn ho&agrave;n tất đơn h&agrave;ng nhấn v&agrave;o giỏ h&agrave;ng g&oacute;c tr&ecirc;n b&ecirc;n phải m&agrave;n h&igrave;nh tiến h&agrave;nh thanh to&aacute;n</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>𝗥𝗔𝗕𝗜𝗧𝗬 - Thương hiệu thời trang trẻ em h&agrave;ng đầu Việt Nam, với hệ thống 80 cửa h&agrave;ng to&agrave;n quốc, c&oacute; mặt tại nhiều hệ thống si&ecirc;u thị lớn Vincom, Lotte, Aeon mall,&hellip; v&agrave; kinh nghiệm 20 năm theo đuổi mục ti&ecirc;u mang tới những sản phẩm từ chất liệu thi&ecirc;n nhi&ecirc;n an to&agrave;n, thoải m&aacute;i, gi&uacute;p trẻ tự do vận động, kh&aacute;m ph&aacute; thế giới.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>CẢM ƠN MẸ V&Agrave; B&Eacute; Đ&Atilde; TIN TƯỞNG V&Agrave; SỬ DỤNG SẢN PHẨM CỦA RABITY 💕</p>', '<p>📍 TH&Ocirc;NG TIN SẢN PHẨM</p>\r\n\r\n<p>- Sản phẩm bao gồm: 01 &Aacute;o thun d&agrave;i tay cổ tr&ograve;n</p>\r\n\r\n<p>- Chất liệu &aacute;o thun b&eacute; trai: Cotton được sản xuất 100% từ sợi b&ocirc;ng thi&ecirc;n nhi&ecirc;n - một trong những loại cotton được c&aacute;c mẹ bỉm ưa chuộng nhất</p>', 119000, 0, 1, '2022-10-04 14:45:16', '2022-10-04 14:45:16'),
(17, 4, 3, 220, 'Mũ cho bé ILABY trơn tròn chất liệu bò thô', 'mu-cho-be-ilaby-tron-tron-chat-lieu-bo-tho', '<p>ILaby - Nơi thi&ecirc;n thần tỏa s&aacute;ng - Mũ cho b&eacute; ILABY trơn tr&ograve;n chất liệu b&ograve; th&ocirc;</p>\r\n\r\n<p>Tại sao lại chọn đồ của ILaby:</p>\r\n\r\n<p>- Sản phẩm được thiết kế độc quyền bởi thương hiệu ILABY</p>\r\n\r\n<p>- Chất liệu an to&agrave;n l&agrave;n da b&eacute;</p>\r\n\r\n<p>-&nbsp; Mẫu m&atilde; đa dạng, đa năng: mặc đi chơi, đi tiệc, đi học đều được</p>\r\n\r\n<p>-----------</p>\r\n\r\n<p>🔶 TH&Ocirc;NG TIN SẢN PHẨM</p>\r\n\r\n<p>Thương hiệu: ILABY</p>\r\n\r\n<p>Xuất xứ: Việt Nam</p>\r\n\r\n<p>M&atilde; sản phẩm: 63IA08770322</p>\r\n\r\n<p>M&agrave;u sắc: Đen, be</p>\r\n\r\n<p>Chất liệu sử dụng: B&ograve; th&ocirc;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>🔶 ILaby Kids cam kết</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>- Sản phẩm 100% giống m&ocirc; tả.&nbsp;</p>\r\n\r\n<p>- Chất vải được qua chọn lọc, đảm bảo chất lượng 100%</p>\r\n\r\n<p>- H&igrave;nh ảnh sản phẩm l&agrave; ảnh thật do ILaby tự chụp v&agrave; giữ bản quyền h&igrave;nh ảnh</p>\r\n\r\n<p>- Đổi h&agrave;ng, ho&agrave;n tiền nếu sản phẩm kh&ocirc;ng giống với m&ocirc; tả</p>\r\n\r\n<p>- Hỗ trợ đổi trả theo quy định của shopee</p>\r\n\r\n<p>- Qu&yacute; kh&aacute;ch vui l&ograve;ng quay lại video l&uacute;c b&oacute;c h&agrave;ng v&agrave; giữ nguy&ecirc;n tem m&aacute;c để tr&aacute;nh trường hợp đơn vị vận chuyển l&agrave;m mất h&agrave;ng hoặc h&agrave;ng c&oacute; vấn đề từ nh&agrave; sản xuất.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>🔶 CH&Iacute;NH S&Aacute;CH ĐỔI TRẢ ILABY</p>\r\n\r\n<p>- Điều kiện &aacute;p dụng (trong v&ograve;ng 07 ng&agrave;y kể từ khi nhận sản phẩm)&nbsp;</p>\r\n\r\n<p>- Qu&yacute; kh&aacute;ch vui l&ograve;ng quay lại video l&uacute;c b&oacute;c h&agrave;ng v&agrave; giữ nguy&ecirc;n tem m&aacute;c để tr&aacute;nh trường hợp đơn vị vận chuyển l&agrave;m mất h&agrave;ng hoặc h&agrave;ng c&oacute; vấn đề từ nh&agrave; sản xuất.</p>\r\n\r\n<p>- Sản phẩm đổi trả phải c&ograve;n nguy&ecirc;n tem, nh&atilde;n, bao b&igrave;, chưa qua sử dụng giặt tẩy, nguy&ecirc;n vẹn như ban đầu Shop giao</p>\r\n\r\n<p>- Sản phẩm lỗi kỹ thuật được đổi mới</p>\r\n\r\n<p>Do m&agrave;n h&igrave;nh v&agrave; điều kiện &aacute;nh s&aacute;ng kh&aacute;c nhau, m&agrave;u sắc thực tế của sản phẩm c&oacute; thể ch&ecirc;nh lệch khoảng 3-5%</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>🔶 LƯU &Yacute;</p>\r\n\r\n<p>- Qu&yacute; kh&aacute;ch nhận được h&agrave;ng nếu c&oacute; thắc mắc vui l&ograve;ng inbox shop.</p>\r\n\r\n<p>- Kh&aacute;ch y&ecirc;u đặt h&agrave;ng vui l&ograve;ng ghi ch&uacute; hoặc ib số c&acirc;n nặng v&agrave; tuổi của b&eacute; để shop giao h&agrave;ng chuẩn size cho b&eacute; nh&eacute;.&nbsp;</p>\r\n\r\n<p>Ch&uacute;c qu&yacute; kh&aacute;ch mua sắm vui vẻ!</p>', '<p>🔶 TH&Ocirc;NG TIN SẢN PHẨM</p>\r\n\r\n<p>Thương hiệu: ILABY</p>\r\n\r\n<p>Xuất xứ: Việt Nam</p>\r\n\r\n<p>M&atilde; sản phẩm: 63IA08770322</p>\r\n\r\n<p>M&agrave;u sắc: Đen, be</p>\r\n\r\n<p>Chất liệu sử dụng: B&ograve; th&ocirc;</p>', 69000, 0, 1, '2022-10-04 14:49:13', '2022-10-04 14:49:13'),
(18, 1, 3, 310, 'Áo nỉ bé trai trai ILABY phối màu mác da ngực chất liệu nỉ dày đẹp', 'ao-ni-be-trai-trai-ilaby-phoi-mau-mac-da-nguc-chat-lieu-ni-day-dep', '<p>ILaby - Nơi thi&ecirc;n thần tỏa s&aacute;ng - &Aacute;o nỉ b&eacute; trai trai ILABY phối m&agrave;u m&aacute;c da ngực chất liệu nỉ d&agrave;y đẹp</p>\r\n\r\n<p>Tại sao lại chọn đồ của ILaby:</p>\r\n\r\n<p>- Sản phẩm được thiết kế độc quyền bởi thương hiệu ILABY</p>\r\n\r\n<p>- Chất liệu an to&agrave;n l&agrave;n da b&eacute;</p>\r\n\r\n<p>-&nbsp; Mẫu m&atilde; đa dạng, đa năng: mặc đi chơi, đi tiệc, đi học đều được</p>\r\n\r\n<p>-----------</p>\r\n\r\n<p>🔶 TH&Ocirc;NG TIN SẢN PHẨM</p>\r\n\r\n<p>Thương hiệu: ILABY</p>\r\n\r\n<p>Xuất xứ: Việt Nam</p>\r\n\r\n<p>M&atilde; sản phẩm: 20IB1276I2DL</p>\r\n\r\n<p>M&agrave;u sắc: m&agrave;u xanh</p>\r\n\r\n<p>Chất liệu sử dụng: nỉ</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>🔶 ILaby Kids cam kết</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>- Sản phẩm 100% giống m&ocirc; tả.&nbsp;</p>\r\n\r\n<p>- Chất vải được qua chọn lọc, đảm bảo chất lượng 100%</p>\r\n\r\n<p>- H&igrave;nh ảnh sản phẩm l&agrave; ảnh thật do ILaby tự chụp v&agrave; giữ bản quyền h&igrave;nh ảnh</p>\r\n\r\n<p>- Đổi h&agrave;ng, ho&agrave;n tiền nếu sản phẩm kh&ocirc;ng giống với m&ocirc; tả</p>\r\n\r\n<p>- Hỗ trợ đổi trả theo quy định của shopee</p>\r\n\r\n<p>- Qu&yacute; kh&aacute;ch vui l&ograve;ng quay lại video l&uacute;c b&oacute;c h&agrave;ng v&agrave; giữ nguy&ecirc;n tem m&aacute;c để tr&aacute;nh trường hợp đơn vị vận chuyển l&agrave;m mất h&agrave;ng hoặc h&agrave;ng c&oacute; vấn đề từ nh&agrave; sản xuất.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>🔶 CH&Iacute;NH S&Aacute;CH ĐỔI TRẢ ILABY</p>\r\n\r\n<p>- Điều kiện &aacute;p dụng (trong v&ograve;ng 07 ng&agrave;y kể từ khi nhận sản phẩm)&nbsp;</p>\r\n\r\n<p>- Qu&yacute; kh&aacute;ch vui l&ograve;ng quay lại video l&uacute;c b&oacute;c h&agrave;ng v&agrave; giữ nguy&ecirc;n tem m&aacute;c để tr&aacute;nh trường hợp đơn vị vận chuyển l&agrave;m mất h&agrave;ng hoặc h&agrave;ng c&oacute; vấn đề từ nh&agrave; sản xuất.</p>\r\n\r\n<p>- Sản phẩm đổi trả phải c&ograve;n nguy&ecirc;n tem, nh&atilde;n, bao b&igrave;, chưa qua sử dụng giặt tẩy, nguy&ecirc;n vẹn như ban đầu Shop giao</p>\r\n\r\n<p>- Sản phẩm lỗi kỹ thuật được đổi mới</p>\r\n\r\n<p>Do m&agrave;n h&igrave;nh v&agrave; điều kiện &aacute;nh s&aacute;ng kh&aacute;c nhau, m&agrave;u sắc thực tế của sản phẩm c&oacute; thể ch&ecirc;nh lệch khoảng 3-5%</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>🔶 LƯU &Yacute;</p>\r\n\r\n<p>- Qu&yacute; kh&aacute;ch nhận được h&agrave;ng nếu c&oacute; thắc mắc vui l&ograve;ng inbox shop.</p>\r\n\r\n<p>- Kh&aacute;ch y&ecirc;u đặt h&agrave;ng vui l&ograve;ng ghi ch&uacute; hoặc ib số c&acirc;n nặng v&agrave; tuổi của b&eacute; để shop giao h&agrave;ng chuẩn size cho b&eacute; nh&eacute;.&nbsp;</p>\r\n\r\n<p>Ch&uacute;c qu&yacute; kh&aacute;ch mua sắm vui vẻ!</p>', '<p>🔶 TH&Ocirc;NG TIN SẢN PHẨM</p>\r\n\r\n<p>Thương hiệu: ILABY</p>\r\n\r\n<p>Xuất xứ: Việt Nam</p>\r\n\r\n<p>M&atilde; sản phẩm: 20IB1276I2DL</p>\r\n\r\n<p>M&agrave;u sắc: m&agrave;u xanh</p>\r\n\r\n<p>Chất liệu sử dụng: nỉ</p>', 225000, 0, 1, '2022-10-04 14:53:11', '2022-10-04 14:53:11'),
(19, 2, 3, 297, 'Set áo yếm bé gái ILABY thêu kèm quần organza chất liệu lụa mềm mại', 'set-ao-yem-be-gai-ilaby-theu-kem-quan-organza-chat-lieu-lua-mem-mai', '<p>ILaby - Nơi thi&ecirc;n thần tỏa s&aacute;ng - Set &aacute;o yếm b&eacute; g&aacute;i ILABY th&ecirc;u k&egrave;m quần organza chất liệu lụa mềm mại</p>\r\n\r\n<p>Tại sao lại chọn đồ của ILaby:</p>\r\n\r\n<p>- Sản phẩm được thiết kế độc quyền bởi thương hiệu ILABY</p>\r\n\r\n<p>- Chất liệu an to&agrave;n l&agrave;n da b&eacute;</p>\r\n\r\n<p>-&nbsp; Mẫu m&atilde; đa dạng, đa năng: mặc đi chơi, đi tiệc, đi học đều được</p>\r\n\r\n<p>-----------</p>\r\n\r\n<p>🔶 TH&Ocirc;NG TIN SẢN PHẨM</p>\r\n\r\n<p>Thương hiệu: ILABY</p>\r\n\r\n<p>Xuất xứ: Việt Nam</p>\r\n\r\n<p>M&atilde; sản phẩm: 52IG1225H2FT</p>\r\n\r\n<p>M&agrave;u sắc: m&agrave;u đỏ</p>\r\n\r\n<p>Chất liệu sử dụng: lụa</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>🔶 ILaby Kids cam kết</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>- Sản phẩm 100% giống m&ocirc; tả.&nbsp;</p>\r\n\r\n<p>- Chất vải được qua chọn lọc, đảm bảo chất lượng 100%</p>\r\n\r\n<p>- H&igrave;nh ảnh sản phẩm l&agrave; ảnh thật do ILaby tự chụp v&agrave; giữ bản quyền h&igrave;nh ảnh</p>\r\n\r\n<p>- Đổi h&agrave;ng, ho&agrave;n tiền nếu sản phẩm kh&ocirc;ng giống với m&ocirc; tả</p>\r\n\r\n<p>- Hỗ trợ đổi trả theo quy định của shopee</p>\r\n\r\n<p>- Qu&yacute; kh&aacute;ch vui l&ograve;ng quay lại video l&uacute;c b&oacute;c h&agrave;ng v&agrave; giữ nguy&ecirc;n tem m&aacute;c để tr&aacute;nh trường hợp đơn vị vận chuyển l&agrave;m mất h&agrave;ng hoặc h&agrave;ng c&oacute; vấn đề từ nh&agrave; sản xuất.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>🔶 CH&Iacute;NH S&Aacute;CH ĐỔI TRẢ ILABY</p>\r\n\r\n<p>- Điều kiện &aacute;p dụng (trong v&ograve;ng 07 ng&agrave;y kể từ khi nhận sản phẩm)&nbsp;</p>\r\n\r\n<p>- Qu&yacute; kh&aacute;ch vui l&ograve;ng quay lại video l&uacute;c b&oacute;c h&agrave;ng v&agrave; giữ nguy&ecirc;n tem m&aacute;c để tr&aacute;nh trường hợp đơn vị vận chuyển l&agrave;m mất h&agrave;ng hoặc h&agrave;ng c&oacute; vấn đề từ nh&agrave; sản xuất.</p>\r\n\r\n<p>- Sản phẩm đổi trả phải c&ograve;n nguy&ecirc;n tem, nh&atilde;n, bao b&igrave;, chưa qua sử dụng giặt tẩy, nguy&ecirc;n vẹn như ban đầu Shop giao</p>\r\n\r\n<p>- Sản phẩm lỗi kỹ thuật được đổi mới</p>\r\n\r\n<p>Do m&agrave;n h&igrave;nh v&agrave; điều kiện &aacute;nh s&aacute;ng kh&aacute;c nhau, m&agrave;u sắc thực tế của sản phẩm c&oacute; thể ch&ecirc;nh lệch khoảng 3-5%</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>🔶 LƯU &Yacute;</p>\r\n\r\n<p>- Qu&yacute; kh&aacute;ch nhận được h&agrave;ng nếu c&oacute; thắc mắc vui l&ograve;ng inbox shop.</p>\r\n\r\n<p>- Kh&aacute;ch y&ecirc;u đặt h&agrave;ng vui l&ograve;ng ghi ch&uacute; hoặc ib số c&acirc;n nặng v&agrave; tuổi của b&eacute; để shop giao h&agrave;ng chuẩn size cho b&eacute; nh&eacute;.&nbsp;</p>\r\n\r\n<p>Ch&uacute;c qu&yacute; kh&aacute;ch mua sắm vui vẻ!</p>', '<p>🔶 TH&Ocirc;NG TIN SẢN PHẨM</p>\r\n\r\n<p>Thương hiệu: ILABY</p>\r\n\r\n<p>Xuất xứ: Việt Nam</p>\r\n\r\n<p>M&atilde; sản phẩm: 52IG1225H2FT</p>\r\n\r\n<p>M&agrave;u sắc: m&agrave;u đỏ</p>\r\n\r\n<p>Chất liệu sử dụng: lụa</p>', 349000, 0, 1, '2022-10-04 14:59:54', '2022-10-04 14:59:54'),
(20, 3, 3, 230, 'Áo vest cho bé trai ILABY chất liệu nhung tăm', 'ao-vest-cho-be-trai-ilaby-chat-lieu-nhung-tam', '<p>ILaby - Nơi thi&ecirc;n thần tỏa s&aacute;ng - &Aacute;o vest cho b&eacute; trai ILABY chất liệu nhung tăm<br />\r\nTại sao lại chọn đồ của ILaby:<br />\r\n- Sản phẩm được thiết kế độc quyền bởi thương hiệu ILABY<br />\r\n- Chất liệu an to&agrave;n l&agrave;n da b&eacute;<br />\r\n- &nbsp;Mẫu m&atilde; đa dạng, đa năng: mặc đi chơi, đi tiệc, đi học đều được<br />\r\n-----------<br />\r\n🔶 TH&Ocirc;NG TIN SẢN PHẨM<br />\r\nThương hiệu: ILABY<br />\r\nXuất xứ: Việt Nam<br />\r\nM&atilde; sản phẩm: 0682<br />\r\nM&agrave;u sắc: n&acirc;u<br />\r\nChất liệu sử dụng: nhung tăm</p>\r\n\r\n<p>🔶 ILaby Kids cam kết</p>\r\n\r\n<p>- Sản phẩm 100% giống m&ocirc; tả.&nbsp;<br />\r\n- Chất vải được qua chọn lọc, đảm bảo chất lượng 100%<br />\r\n- H&igrave;nh ảnh sản phẩm l&agrave; ảnh thật do ILaby tự chụp v&agrave; giữ bản quyền h&igrave;nh ảnh<br />\r\n- Đổi h&agrave;ng, ho&agrave;n tiền nếu sản phẩm kh&ocirc;ng giống với m&ocirc; tả<br />\r\n- Hỗ trợ đổi trả theo quy định của shopee<br />\r\n- Qu&yacute; kh&aacute;ch vui l&ograve;ng quay lại video l&uacute;c b&oacute;c h&agrave;ng v&agrave; giữ nguy&ecirc;n tem m&aacute;c để tr&aacute;nh trường hợp đơn vị vận chuyển l&agrave;m mất h&agrave;ng hoặc h&agrave;ng c&oacute; vấn đề từ nh&agrave; sản xuất.</p>\r\n\r\n<p>🔶 CH&Iacute;NH S&Aacute;CH ĐỔI TRẢ ILABY<br />\r\n- Điều kiện &aacute;p dụng (trong v&ograve;ng 07 ng&agrave;y kể từ khi nhận sản phẩm)&nbsp;<br />\r\n- Qu&yacute; kh&aacute;ch vui l&ograve;ng quay lại video l&uacute;c b&oacute;c h&agrave;ng v&agrave; giữ nguy&ecirc;n tem m&aacute;c để tr&aacute;nh trường hợp đơn vị vận chuyển l&agrave;m mất h&agrave;ng hoặc h&agrave;ng c&oacute; vấn đề từ nh&agrave; sản xuất.<br />\r\n- Sản phẩm đổi trả phải c&ograve;n nguy&ecirc;n tem, nh&atilde;n, bao b&igrave;, chưa qua sử dụng giặt tẩy, nguy&ecirc;n vẹn như ban đầu Shop giao<br />\r\n- Sản phẩm lỗi kỹ thuật được đổi mới<br />\r\nDo m&agrave;n h&igrave;nh v&agrave; điều kiện &aacute;nh s&aacute;ng kh&aacute;c nhau, m&agrave;u sắc thực tế của sản phẩm c&oacute; thể ch&ecirc;nh lệch khoảng 3-5%</p>\r\n\r\n<p>🔶 LƯU &Yacute;<br />\r\n- Qu&yacute; kh&aacute;ch nhận được h&agrave;ng nếu c&oacute; thắc mắc vui l&ograve;ng inbox shop.<br />\r\n- Kh&aacute;ch y&ecirc;u đặt h&agrave;ng vui l&ograve;ng ghi ch&uacute; hoặc ib số c&acirc;n nặng v&agrave; tuổi của b&eacute; để shop giao h&agrave;ng chuẩn size cho b&eacute; nh&eacute;.&nbsp;<br />\r\nCh&uacute;c qu&yacute; kh&aacute;ch mua sắm vui vẻ!</p>', '<p>🔶 TH&Ocirc;NG TIN SẢN PHẨM<br />\r\nThương hiệu: ILABY<br />\r\nXuất xứ: Việt Nam<br />\r\nM&atilde; sản phẩm: 0682<br />\r\nM&agrave;u sắc: n&acirc;u<br />\r\nChất liệu sử dụng: nhung tăm</p>', 399000, 0, 1, '2022-10-04 15:04:21', '2022-10-04 15:04:21');
INSERT INTO `product` (`idProduct`, `idCategory`, `idBrand`, `QuantityTotal`, `ProductName`, `ProductSlug`, `DesProduct`, `ShortDes`, `Price`, `Sold`, `StatusPro`, `created_at`, `updated_at`) VALUES
(21, 7, 1, 221, 'Váy nỉ dài tay dáng suông LK0283 - Lovekids', 'vay-ni-dai-tay-dang-suong-lk0283-lovekids', '<p>* M&Ocirc; TẢ SẢN PHẨM<br />\r\n- Sản xuất tại Việt Nam.<br />\r\n- Hệ size từ 4/5 tuổi đến 8/9 tuổi.<br />\r\n- Chất liệu vải nỉ da c&aacute; mềm mại,<br />\r\n- M&agrave;u sắc: cam v&agrave; ghi<br />\r\n- Thiết kế v&aacute;y vạt cao thấp c&ugrave;ng điểm nhấn nh&aacute; ở tay kết hợp m&agrave;u sắc nổi bật khiến chiếc v&aacute;y tr&ocirc;ng đơn giản những vẫn c&aacute; t&iacute;nh v&ocirc; c&ugrave;ng.</p>\r\n\r\n<p>* HƯỚNG DẪN BẢO QUẢN<br />\r\nGiặt tay hoặc giặt bằng m&aacute;y kh&ocirc;ng qu&aacute; 30 độ C.<br />\r\nL&agrave; ở nhiệt độ thường.<br />\r\nKh&ocirc;ng giặt chung đồ bị phai m&agrave;u.<br />\r\nKh&ocirc;ng ng&acirc;m sản phẩm qu&aacute; 30 ph&uacute;t với x&agrave; ph&ograve;ng giặt.<br />\r\nKh&ocirc;ng sử dụng chất tẩy mạnh.</p>\r\n\r\n<p>* CHÍNH SÁCH ĐỔI SẢN PHẨM<br />\r\nThời gian đổi sản phẩm: &aacute;p dụng theo qui định đổi trả của ShopeeMall.<br />\r\nSản phẩm đổi c&oacute; gi&aacute; trị bằng hoặc thấp hơn sản phẩm đ&atilde; mua (khoản ph&iacute; thừa sẽ kh&ocirc;ng được ho&agrave;n trả).<br />\r\nSản phẩm phải c&ograve;n nguy&ecirc;n m&aacute;c, chưa qua sử dụng, giặt tẩy, kh&ocirc;ng bị dơ, bẩn hoặc bị hư hỏng bởi c&aacute;c t&aacute;c nh&acirc;n b&ecirc;n ngo&agrave;i.<br />\r\nKh&ocirc;ng &aacute;p dụng đổi h&agrave;ng đối với sản phẩm mua trong chương tr&igrave;nh khuyến mại (Trừ trường hợp lỗi do sản phẩm)<br />\r\nĐể lựa chọn sản phẩm vừa vặn với b&eacute;, c&aacute;c mẹ c&oacute; thể tham khảo bảng size hoặc gửi tin nhắn ngay cho Lovekids để nhận được hỗ trợ nh&eacute;.</p>', '<p>* M&Ocirc; TẢ SẢN PHẨM<br />\r\n- Sản xuất tại Việt Nam.<br />\r\n- Hệ size từ 4/5 tuổi đến 8/9 tuổi.<br />\r\n- Chất liệu vải nỉ da c&aacute; mềm mại,<br />\r\n- M&agrave;u sắc: cam v&agrave; ghi<br />\r\n- Thiết kế v&aacute;y vạt cao thấp c&ugrave;ng điểm nhấn nh&aacute; ở tay kết hợp m&agrave;u sắc nổi bật khiến chiếc v&aacute;y tr&ocirc;ng đơn giản những vẫn c&aacute; t&iacute;nh v&ocirc; c&ugrave;ng.</p>', 215000, 0, 1, '2022-10-04 15:07:40', '2022-10-04 15:15:41'),
(22, 3, 1, 227, 'Cardigan Premier Fabric kẻ ngang bé gái - Lovekids', 'cardigan-premier-fabric-ke-ngang-be-gai-lovekids', '<p>* M&Ocirc; TẢ SẢN PHẨM<br />\r\n- Sản xuất tại Việt Nam<br />\r\n- Hệ size từ 2 tuổi đến 12 tuổi<br />\r\n- Chất liệu len cao cấp mềm mịn.<br />\r\n- &Aacute;o kho&aacute;c cardigan chắc chắn l&agrave; item kh&ocirc;ng thể thiếu cho c&aacute;c n&agrave;ng trong m&ugrave;a Thu Đ&ocirc;ng n&agrave;y.</p>\r\n\r\n<p>* HƯỚNG DẪN BẢO QUẢN<br />\r\nGiặt tay hoặc giặt bằng m&aacute;y kh&ocirc;ng qu&aacute; 30 độ C.<br />\r\nL&agrave; ở nhiệt độ thường.<br />\r\nKh&ocirc;ng giặt chung đồ bị phai m&agrave;u.<br />\r\nKh&ocirc;ng ng&acirc;m sản phẩm qu&aacute; 30 ph&uacute;t với x&agrave; ph&ograve;ng giặt.<br />\r\nKh&ocirc;ng sử dụng chất tẩy mạnh.</p>\r\n\r\n<p>* CHÍNH SÁCH ĐỔI SẢN PHẨM<br />\r\nThời gian đổi sản phẩm: Trong v&ograve;ng 7 ng&agrave;y theo qui định ShopeeMall.<br />\r\nSản phẩm phải c&ograve;n nguy&ecirc;n m&aacute;c, chưa qua sử dụng, giặt tẩy, kh&ocirc;ng bị dơ, bẩn hoặc bị hư hỏng bởi c&aacute;c t&aacute;c nh&acirc;n b&ecirc;n ngo&agrave;i.<br />\r\nĐể lựa chọn sản phẩm vừa vặn với b&eacute;, c&aacute;c mẹ c&oacute; thể tham khảo bảng size hoặc gửi tin nhắn ngay cho Lovekids để nhận được hỗ trợ nh&eacute;!</p>', '<p>* M&Ocirc; TẢ SẢN PHẨM<br />\r\n- Sản xuất tại Việt Nam<br />\r\n- Hệ size từ 2 tuổi đến 12 tuổi<br />\r\n- Chất liệu len cao cấp mềm mịn.<br />\r\n- &Aacute;o kho&aacute;c cardigan chắc chắn l&agrave; item kh&ocirc;ng thể thiếu cho c&aacute;c n&agrave;ng trong m&ugrave;a Thu Đ&ocirc;ng n&agrave;y.</p>', 319000, 0, 1, '2022-10-04 15:10:59', '2022-10-04 15:10:59'),
(23, 7, 1, 138, 'Váy thêu hoa cộc tay phối tầng - Lovekids', 'vay-theu-hoa-coc-tay-phoi-tang-lovekids', '<p>* M&Ocirc; TẢ SẢN PHẨM</p>\r\n\r\n<p>- Sản xuất tại Việt Nam.</p>\r\n\r\n<p>- Hệ size từ 6 tuổi đến 10 tuổi.</p>\r\n\r\n<p>- Chất liệu vải &nbsp;th&ocirc; th&ecirc;u 100% cotton cao cấp thấm h&uacute;t mồ h&ocirc;i tốt v&agrave; tạo độ thoải m&aacute;i cho b&eacute; khi mặc.</p>\r\n\r\n<p>* HƯỚNG DẪN BẢO QUẢN</p>\r\n\r\n<p>Giặt tay hoặc giặt bằng m&aacute;y kh&ocirc;ng qu&aacute; 30 độ C.</p>\r\n\r\n<p>L&agrave; ở nhiệt độ thường.</p>\r\n\r\n<p>Kh&ocirc;ng giặt chung đồ bị phai m&agrave;u.</p>\r\n\r\n<p>Kh&ocirc;ng ng&acirc;m sản phẩm qu&aacute; 30 ph&uacute;t với x&agrave; ph&ograve;ng giặt.</p>\r\n\r\n<p>Kh&ocirc;ng sử dụng chất tẩy mạnh.</p>\r\n\r\n<p>* CH&Iacute;NH S&Aacute;CH ĐỔI SẢN PHẨM</p>\r\n\r\n<p>Thời gian đổi sản phẩm: Theo qui định đổi trả của ShopeeMall.</p>\r\n\r\n<p>Để lựa chọn sản phẩm vừa vặn với b&eacute;, c&aacute;c mẹ c&oacute; thể tham khảo bảng size hoặc gửi tin nhắn ngay cho Lovekids để nhận được hỗ trợ nh&eacute;.</p>', '<p>* M&Ocirc; TẢ SẢN PHẨM</p>\r\n\r\n<p>- Sản xuất tại Việt Nam.</p>\r\n\r\n<p>- Hệ size từ 6 tuổi đến 10 tuổi.</p>\r\n\r\n<p>- Chất liệu vải &nbsp;th&ocirc; th&ecirc;u 100% cotton cao cấp thấm h&uacute;t mồ h&ocirc;i tốt v&agrave; tạo độ thoải m&aacute;i cho b&eacute; khi mặc.</p>', 435000, 1, 1, '2022-10-04 15:16:33', '2022-10-04 15:16:33'),
(24, 6, 4, 630, 'Giày thể thao AMILA thoáng khí thời trang năng động co bé', 'giay-the-thao-amila-thoang-khi-thoi-trang-nang-dong-co-be', '<p>Thời gian giao h&agrave;ng dự kiến cho sản phẩm n&agrave;y l&agrave; từ 7-9 ng&agrave;y</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Thương hiệu: AMILA</p>\r\n\r\n<p>Họa tiết: M&agrave;u trơn</p>\r\n\r\n<p>Th&iacute;ch hợp cho: Ng&agrave;y thường</p>\r\n\r\n<p style=\"text-align:center\"><img src=\"https://cf.shopee.vn/file/c19730866c6b5402ccc94c7b4cabc7dc\" style=\"height:invalid-value; width:invalid-value\" /></p>', '<p>Thời gian giao h&agrave;ng dự kiến cho sản phẩm n&agrave;y l&agrave; từ 7-9 ng&agrave;y</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Thương hiệu: AMILA</p>\r\n\r\n<p>Họa tiết: M&agrave;u trơn</p>\r\n\r\n<p>Th&iacute;ch hợp cho: Ng&agrave;y thường</p>', 315000, 0, 1, '2022-11-14 10:17:45', '2022-11-14 10:17:45'),
(25, 4, 4, 750, 'Mũ trùm tai AMILA chất liệu dày dặn ấm áp dễ thương cho bé tùy chọn màu sắc', 'mu-trum-tai-amila-chat-lieu-day-dan-am-ap-de-thuong-cho-be-tuy-chon-mau-sac', '<p>Thời gian giao h&agrave;ng dự kiến cho sản phẩm n&agrave;y l&agrave; từ 7-9 ng&agrave;y</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Mũ len dệt kim m&ugrave;a đ&ocirc;ng cho trẻ em với chất liệu cao cấp: Mũ len dệt kim m&ugrave;a đ&ocirc;ng cho trẻ em với lớp l&oacute;t len d&agrave;y, si&ecirc;u mềm, th&acirc;n thiện với da, ấm &aacute;p v&agrave; thoải m&aacute;i, đội cả ng&agrave;y d&agrave;i. Qu&aacute; tr&igrave;nh đan m&oacute;c tinh tế đảm bảo độ bền cao.</p>\r\n\r\n<p>Chiếc mũ m&ugrave;a đ&ocirc;ng trẻ em n&agrave;y rất linh hoạt, v&igrave; vậy sản ph&acirc;̉m c&oacute; thể sử dụng được nhiều năm.</p>\r\n\r\n<p>Lớp l&oacute;t l&ocirc;ng cừu ấm &aacute;p: Kh&ocirc;ng giống như hầu hết c&aacute;c loại mũ trẻ em, chiếc mũ dệt kim n&agrave;y sử dụng lớp l&oacute;t l&ocirc;ng cừu ấm &aacute;p. Thiết kế đặc biệt với bịt tai c&oacute; thể che to&agrave;n bộ đầu v&agrave; tai, gi&uacute;p b&eacute; cảm thấy ấm &aacute;p v&agrave; được bảo vệ. D&acirc;y đeo c&oacute; thể vừa kh&iacute;t với đầu của b&eacute; ngay cả trong m&ugrave;a đ&ocirc;ng lạnh nhất. Thoải m&aacute;i v&agrave; ấm &aacute;p, vừa vặn với đầu của b&eacute; ngay cả trong m&ugrave;a đ&ocirc;ng lạnh gi&aacute; nhất. Dễ d&agrave;ng th&aacute;o ra khi b&eacute; kh&ocirc;ng muốn đội mũ.</p>\r\n\r\n<p>* Qu&agrave; tặng cho b&eacute;: Nhiều m&agrave;u sắc cổ điển để lựa chọn, thoải m&aacute;i v&agrave; dễ thương, rất được c&aacute;c b&eacute; y&ecirc;u th&iacute;ch, kết hợp với quần &aacute;o m&ugrave;a đ&ocirc;ng. Một sự lựa chọn qu&agrave; tặng tuyệt vời cho trẻ em v&agrave;o ng&agrave;y sinh nhật, Lễ tạ ơn, Gi&aacute;ng sinh, Halloween, năm mới hay bất kỳ ng&agrave;y lễ n&agrave;o kh&aacute;c, b&eacute; sẽ rất th&iacute;ch.</p>', '<p>Mũ len dệt kim m&ugrave;a đ&ocirc;ng cho trẻ em với chất liệu cao cấp: Mũ len dệt kim m&ugrave;a đ&ocirc;ng cho trẻ em với lớp l&oacute;t len d&agrave;y, si&ecirc;u mềm, th&acirc;n thiện với da, ấm &aacute;p v&agrave; thoải m&aacute;i, đội cả ng&agrave;y d&agrave;i. Qu&aacute; tr&igrave;nh đan m&oacute;c tinh tế đảm bảo độ bền cao.</p>\r\n\r\n<p>Chiếc mũ m&ugrave;a đ&ocirc;ng trẻ em n&agrave;y rất linh hoạt, v&igrave; vậy sản ph&acirc;̉m c&oacute; thể sử dụng được nhiều năm.</p>\r\n\r\n<p>Lớp l&oacute;t l&ocirc;ng cừu ấm &aacute;p: Kh&ocirc;ng giống như hầu hết c&aacute;c loại mũ trẻ em, chiếc mũ dệt kim n&agrave;y sử dụng lớp l&oacute;t l&ocirc;ng cừu ấm &aacute;p. Thiết kế đặc biệt với bịt tai c&oacute; thể che to&agrave;n bộ đầu v&agrave; tai, gi&uacute;p b&eacute; cảm thấy ấm &aacute;p v&agrave; được bảo vệ. D&acirc;y đeo c&oacute; thể vừa kh&iacute;t với đầu của b&eacute; ngay cả trong m&ugrave;a đ&ocirc;ng lạnh nhất. Thoải m&aacute;i v&agrave; ấm &aacute;p, vừa vặn với đầu của b&eacute; ngay cả trong m&ugrave;a đ&ocirc;ng lạnh gi&aacute; nhất. Dễ d&agrave;ng th&aacute;o ra khi b&eacute; kh&ocirc;ng muốn đội mũ.</p>', 70000, 0, 1, '2022-11-14 10:21:58', '2022-11-14 10:21:58'),
(26, 3, 4, 300, 'Áo hoodie AMILA dáng rộng họa tiết hoạt hình phong cách Hàn Quốc cho bé trai', 'ao-hoodie-amila-dang-rong-hoa-tiet-hoat-hinh-phong-cach-han-quoc-cho-be-trai', '<p>Thương hiệu: AMILA</p>\r\n\r\n<p>Dịp sử dụng: Thường ng&agrave;y</p>\r\n\r\n<p>Kiểu &aacute;o hoodie: Chui đầu</p>\r\n\r\n<p>Độ tuổi đề xuất: Trẻ em (6-10 tuổi)</p>\r\n\r\n<p>Kiểu tay &aacute;o: D&agrave;i tay</p>\r\n\r\n<p>M&ugrave;a th&iacute;ch hợp: M&ugrave;a đ&ocirc;ng</p>\r\n\r\n<p>Chất liệu quần &aacute;o: Polyester</p>\r\n\r\n<p style=\"text-align:center\"><img src=\"https://cf.shopee.vn/file/5d3cea18301cdce9edcf1b483c2207ca\" style=\"height:invalid-value; width:invalid-value\" /></p>', '<p>Thương hiệu: AMILA</p>\r\n\r\n<p>Dịp sử dụng: Thường ng&agrave;y</p>\r\n\r\n<p>Kiểu &aacute;o hoodie: Chui đầu</p>\r\n\r\n<p>Độ tuổi đề xuất: Trẻ em (6-10 tuổi)</p>\r\n\r\n<p>Kiểu tay &aacute;o: D&agrave;i tay</p>\r\n\r\n<p>M&ugrave;a th&iacute;ch hợp: M&ugrave;a đ&ocirc;ng</p>\r\n\r\n<p>Chất liệu quần &aacute;o: Polyester</p>', 300000, 0, 1, '2022-11-14 10:24:48', '2022-11-14 10:24:48'),
(27, 2, 4, 264, 'Áo kiểu tay dài AMILA cổ lọ phối ren phong cách phương Tây cho bé gái', 'ao-kieu-tay-dai-amila-co-lo-phoi-ren-phong-cach-phuong-tay-cho-be-gai', '<p>T&ecirc;n sản phẩm: &aacute;o kiểu cho b&eacute; g&aacute;i</p>\r\n\r\n<p>Thương hiệu: AMILA</p>\r\n\r\n<p>Chất liệu vải ch&iacute;nh: cotton</p>\r\n\r\n<p>D&agrave;nh cho: b&eacute; g&aacute;i</p>\r\n\r\n<p>C&aacute;c yếu tố phổ biến: th&ecirc;u</p>\r\n\r\n<p>Họa tiết: m&agrave;u trơn</p>\r\n\r\n<p>Độ d&agrave;y: b&igrave;nh thường</p>\r\n\r\n<p style=\"text-align:center\"><img src=\"https://cf.shopee.vn/file/55211f4eb4ac74ed35c50ceb43b351b5\" style=\"height:invalid-value; width:invalid-value\" /></p>\r\n\r\n<p style=\"text-align:center\"><img src=\"https://cf.shopee.vn/file/728c35a18560e7c88da42f2b87f8d209\" style=\"height:invalid-value; width:invalid-value\" /></p>\r\n\r\n<p><img src=\"https://cf.shopee.vn/file/8213fa76c472e2d8bb7f8074ad988611\" style=\"height:invalid-value; width:invalid-value\" /></p>', '<p>T&ecirc;n sản phẩm: &aacute;o kiểu cho b&eacute; g&aacute;i</p>\r\n\r\n<p>Thương hiệu: AMILA</p>\r\n\r\n<p>Chất liệu vải ch&iacute;nh: cotton</p>\r\n\r\n<p>D&agrave;nh cho: b&eacute; g&aacute;i</p>\r\n\r\n<p>C&aacute;c yếu tố phổ biến: th&ecirc;u</p>\r\n\r\n<p>Họa tiết: m&agrave;u trơn</p>\r\n\r\n<p>Độ d&agrave;y: b&igrave;nh thường</p>', 200000, 0, 1, '2022-11-14 10:27:25', '2022-11-14 10:27:25'),
(28, 5, 4, 669, 'AMILA Giày Thể Thao Phối Lưới Thoáng Khí Mềm Mại Thời Trang Xuân Thu Cho Bé Trai', 'amila-giay-the-thao-phoi-luoi-thoang-khi-mem-mai-thoi-trang-xuan-thu-cho-be-trai', '<p>M&agrave;u: Đen, X&aacute;m, Be</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>21-26 Chiều d&agrave;i b&ecirc;n trong: 13,5 14 14,5 15 15,5 16cm</p>\r\n\r\n<p>27-32 Chiều d&agrave;i b&ecirc;n trong: 16,5 17 17,5 18 18,5 19cm</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Chọn chiều d&agrave;i b&ecirc;n trong + 1 cm cho chiều d&agrave;i b&agrave;n ch&acirc;n khuyến nghị chung + 1 cm để chọn chiều d&agrave;i b&ecirc;n trong + 1 cm, thường l&agrave; chiều d&agrave;i b&agrave;n ch&acirc;n khuyến nghị + 1 cm để chọn chiều d&agrave;i b&ecirc;n trong</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Độ tuổi &aacute;p dụng cho trẻ mới biết đi: trẻ mới biết đi (1-3 tuổi), quần &aacute;o trẻ em (4-6 tuổi), quần &aacute;o trẻ em (4-6 tuổi)</p>\r\n\r\n<p>Chức năng: tho&aacute;ng kh&iacute;, nhẹ, chống trượt, chống m&agrave;i m&ograve;n, hấp thụ sốc</p>\r\n\r\n<p>Chất liệu đế: cao su</p>\r\n\r\n<p>​</p>\r\n\r\n<p style=\"text-align:center\"><img src=\"https://cf.shopee.vn/file/3ac0e1740e1315f6e20aca3efcf18973\" style=\"height:invalid-value; width:invalid-value\" /></p>\r\n\r\n<p style=\"text-align:center\"><img src=\"https://cf.shopee.vn/file/84e54966d88d7b5399c3ab0cdcd48cf7\" style=\"height:invalid-value; width:invalid-value\" /></p>\r\n\r\n<p style=\"text-align:center\"><img src=\"https://cf.shopee.vn/file/c9f98b39b553ca15be3ac88b51074c7a\" style=\"height:invalid-value; width:invalid-value\" /></p>\r\n\r\n<p style=\"text-align:center\"><img src=\"https://cf.shopee.vn/file/db1f5a74ad377b862faadc8d4ac5876a\" style=\"height:invalid-value; width:invalid-value\" /></p>', '<p>M&agrave;u: Đen, X&aacute;m, Be</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>21-26 Chiều d&agrave;i b&ecirc;n trong: 13,5 14 14,5 15 15,5 16cm</p>\r\n\r\n<p>27-32 Chiều d&agrave;i b&ecirc;n trong: 16,5 17 17,5 18 18,5 19cm</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Chọn chiều d&agrave;i b&ecirc;n trong + 1 cm cho chiều d&agrave;i b&agrave;n ch&acirc;n khuyến nghị chung + 1 cm để chọn chiều d&agrave;i b&ecirc;n trong + 1 cm, thường l&agrave; chiều d&agrave;i b&agrave;n ch&acirc;n khuyến nghị + 1 cm để chọn chiều d&agrave;i b&ecirc;n trong</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Độ tuổi &aacute;p dụng cho trẻ mới biết đi: trẻ mới biết đi (1-3 tuổi), quần &aacute;o trẻ em (4-6 tuổi), quần &aacute;o trẻ em (4-6 tuổi)</p>\r\n\r\n<p>Chức năng: tho&aacute;ng kh&iacute;, nhẹ, chống trượt, chống m&agrave;i m&ograve;n, hấp thụ sốc</p>\r\n\r\n<p>Chất liệu đế: cao su</p>', 250000, 0, 1, '2022-11-14 10:30:03', '2022-11-14 10:30:03'),
(29, 4, 4, 300, 'Mũ trùm đầu AMILA dệt thiết kế tai gấu đáng yêu giữ ấm dành cho bé gái', 'mu-trum-dau-amila-det-thiet-ke-tai-gau-dang-yeu-giu-am-danh-cho-be-gai', '<p>Danh mục sản phẩm: Mũ tr&ugrave;m đầu</p>\r\n\r\n<p>Ph&ugrave; hợp với m&ugrave;a thu</p>\r\n\r\n<p>M&atilde; số mẫu: Mũ tr&ugrave;m đầu th&ecirc;u tai gấu</p>\r\n\r\n<p>Chi tiết phong c&aacute;ch: Kh&acirc;u th&ecirc;u</p>\r\n\r\n<p>M&agrave;u sắc: V&agrave;ng, Xanh dương, Hồng da, Kaki</p>\r\n\r\n<p>Kiểu v&agrave;nh: Kh&ocirc;ng c&oacute; v&agrave;nh</p>\r\n\r\n<p>Loại đỉnh mũ: Đỉnh v&ograve;m</p>\r\n\r\n<p>C&ocirc;ng dụng: Hỗ trợ cổ, Giữ ấm</p>\r\n\r\n<p>Phong c&aacute;ch: Phong c&aacute;ch thời trang, M&ugrave;i thơm nhẹ</p>\r\n\r\n<p>Độ tuổi sử dụng th&iacute;ch hợp: 2-4 tuổi</p>\r\n\r\n<p>T&ecirc;n chất vải: Polyester</p>\r\n\r\n<p>Ph&acirc;n loại phong c&aacute;ch: Tươi tắn v&agrave; ngọt ng&agrave;o</p>\r\n\r\n<p>C&ocirc;ng nghệ sản xuất: Dệt jacquard, Vải satin</p>\r\n\r\n<p>Chi tiết phong c&aacute;ch: Chữ c&aacute;i, Chữ số, Văn bản</p>\r\n\r\n<p><img src=\"https://cf.shopee.vn/file/sg-11134202-22100-tapasgvnb8ivb2\" style=\"height:invalid-value; width:invalid-value\" /></p>\r\n\r\n<p><img src=\"https://cf.shopee.vn/file/sg-11134202-22100-m1jxvmvnb8ivad\" style=\"height:invalid-value; width:invalid-value\" /></p>', '<p>Danh mục sản phẩm: Mũ tr&ugrave;m đầu</p>\r\n\r\n<p>Ph&ugrave; hợp với m&ugrave;a thu</p>\r\n\r\n<p>M&atilde; số mẫu: Mũ tr&ugrave;m đầu th&ecirc;u tai gấu</p>\r\n\r\n<p>Chi tiết phong c&aacute;ch: Kh&acirc;u th&ecirc;u</p>\r\n\r\n<p>M&agrave;u sắc: V&agrave;ng, Xanh dương, Hồng da, Kaki</p>\r\n\r\n<p>Kiểu v&agrave;nh: Kh&ocirc;ng c&oacute; v&agrave;nh</p>', 80000, 0, 1, '2022-11-14 10:35:58', '2022-11-14 10:35:58'),
(30, 1, 4, 190, 'Áo sweater AMILA kẻ sọc phong cách Hàn Quốc mới cho bé trai', 'ao-sweater-amila-ke-soc-phong-cach-han-quoc-moi-cho-be-trai', '<p>D&agrave;nh cho: B&eacute; trai</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Phong c&aacute;ch: H&agrave;n Quốc</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Nh&oacute;m tuổi ph&ugrave; hợp: Trẻ em (8 tuổi trở l&ecirc;n, 140cm trở l&ecirc;n)</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Th&iacute;ch hợp cho: M&ugrave;a xu&acirc;n v&agrave; m&ugrave;a thu</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>C&ocirc;ng nghệ vải: Xử l&yacute; l&agrave;m mềm</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Họa tiết: Kẻ sọc</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Độ d&agrave;y: Mỏng</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Chiều d&agrave;i tay: Tay dài</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>C&aacute;ch mặc: Tr&ograve;ng đầu</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Có mũ trùm đ&acirc;̀u kh&ocirc;ng: Kh&ocirc;ng</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Ch&acirc;́t vải: Cotton</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Chất liệu vải ch&iacute;nh: Cotton</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>H&agrave;m lượng chất vải ch&iacute;nh: 100 (%)</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Mức độ an to&agrave;n: Loại B</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Loại l&oacute;t: Lớp l&oacute;t bằng sợi polyester</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>M&agrave;u sắc: Như trong h&igrave;nh ảnh</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Chiều cao ph&ugrave; hợp: 110cm, 120cm, 130cm, 140cm, 150cm, 160cm</p>', '<p>D&agrave;nh cho: B&eacute; trai</p>\r\n\r\n<p>Phong c&aacute;ch: H&agrave;n Quốc</p>\r\n\r\n<p>Nh&oacute;m tuổi ph&ugrave; hợp: Trẻ em (8 tuổi trở l&ecirc;n, 140cm trở l&ecirc;n)</p>\r\n\r\n<p>Th&iacute;ch hợp cho: M&ugrave;a xu&acirc;n v&agrave; m&ugrave;a thu</p>', 245000, 0, 1, '2022-11-14 10:44:12', '2022-11-14 10:44:12'),
(31, 3, 4, 253, 'Áo khoác AMILA cổ bẻ lót nhung dày dặn ấm áp thời trang mùa đông cho bé gái', 'ao-khoac-amila-co-be-lot-nhung-day-dan-am-ap-thoi-trang-mua-dong-cho-be-gai', '<p>T&ecirc;n sản phẩm: &aacute;o kho&aacute;c trẻ em d&agrave;y gi&uacute;p giữ ấm</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Chất liệu: polyester</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>M&agrave;u xanh l&aacute; c&acirc;y</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Chiều cao th&iacute;ch hợp: 90cm-140cm</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&hearts;&hearts; Chất liệu: cotton pha, một chiếc &aacute;o kho&aacute;c xinh xắn l&agrave;m cho b&eacute; y&ecirc;u của bạn trở n&ecirc;n nổi bật, thời trang, đ&aacute;ng y&ecirc;u, vừa vặn ----- &Aacute;o kho&aacute;c trẻ em th&iacute;ch hợp cho m&ugrave;a lạnh</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&hearts;&hearts; Th&iacute;ch hợp cho b&eacute; dịp sinh nhật, mặc h&agrave;ng ng&agrave;y, quần &aacute;o m&ugrave;a thu, đ&ocirc;ng, &aacute;o kho&aacute;c thường, v.v.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&hearts;&hearts; Thiết kế in h&igrave;nh hoạt h&igrave;nh thời trang v&agrave; đ&aacute;ng y&ecirc;u gi&uacute;p b&eacute; th&ecirc;m phần thu h&uacute;t.</p>', '<p>T&ecirc;n sản phẩm: &aacute;o kho&aacute;c trẻ em d&agrave;y gi&uacute;p giữ ấm</p>\r\n\r\n<p>Chất liệu: polyester</p>\r\n\r\n<p>M&agrave;u xanh l&aacute; c&acirc;y</p>\r\n\r\n<p>Chiều cao th&iacute;ch hợp: 90cm-140cm</p>', 315000, 1, 1, '2022-11-14 10:46:22', '2022-11-14 10:46:22'),
(32, 3, 4, 652, 'AMILA Áo Khoác Bóng Chày Phong Cách Đường Phố Thời Trang Xuân Thu Cho Bé Trai áo khoác cho bé trai', 'amila-ao-khoac-bong-chay-phong-cach-duong-pho-thoi-trang-xuan-thu-cho-be-trai-ao-khoac-cho-be-trai', '<p>Thể loại: &Aacute;o kho&aacute;c b&eacute; trai</p>\r\n\r\n<p>M&agrave;u sắc: Đen</p>\r\n\r\n<p>Chất liệu vải ch&iacute;nh: cotton</p>\r\n\r\n<p>Th&agrave;nh phần l&oacute;t: cotton</p>\r\n\r\n<p>Xin ch&agrave;o! Ch&uacute;ng t&ocirc;i rất vui được ch&agrave;o đ&oacute;n bạn đến với cửa h&agrave;ng của ch&uacute;ng t&ocirc;i!</p>\r\n\r\n<p>Nhớ gh&eacute; thăm cửa h&agrave;ng mỗi ng&agrave;y để cập nhật những sản phẩm mới nhất</p>\r\n\r\n<p>Shop lu&ocirc;n cố gắng đảm bảo đạo đức kinh doanh với gi&aacute; cả hợp l&yacute;, lu&ocirc;n mang đến cho bạn những sản phẩm chất lượng vừa &yacute; v&agrave; kiểm tra kỹ c&agrave;ng trước khi giao h&agrave;ng cho kh&aacute;ch h&agrave;ng.</p>\r\n\r\n<p>Mọi thắc mắc vui l&ograve;ng li&ecirc;n hệ ngay với cửa h&agrave;ng của ch&uacute;ng t&ocirc;i</p>\r\n\r\n<p>Ch&uacute;c một ng&agrave;y tốt l&agrave;nh v&agrave; đừng qu&ecirc;n đ&aacute;nh gi&aacute; 5 sao nếu bạn th&iacute;ch sản phẩm</p>\r\n\r\n<p>Cảm ơn đ&atilde; gh&eacute; thăm! Hy vọng bạn c&oacute; một trải nghiệm mua sắm th&uacute; vị trong cửa h&agrave;ng của ch&uacute;ng t&ocirc;i!</p>', '<p>Thể loại: &Aacute;o kho&aacute;c b&eacute; trai</p>\r\n\r\n<p>M&agrave;u sắc: Đen</p>\r\n\r\n<p>Chất liệu vải ch&iacute;nh: cotton</p>\r\n\r\n<p>Th&agrave;nh phần l&oacute;t: cotton</p>', 343000, 0, 1, '2022-11-20 11:33:04', '2022-11-20 11:33:04'),
(33, 5, 4, 386, 'AMILA Giày Thể Thao Đế Mềm Chống Trượt Thoáng Khí Dành Cho Bé Trai Gái', 'amila-giay-the-thao-de-mem-chong-truot-thoang-khi-danh-cho-be-trai-gai', '<p>M&agrave;u sắc: tiếp theo l&agrave; xanh lam, tiếp theo l&agrave; xanh lục, tiếp theo l&agrave; hoa hồng</p>\r\n\r\n<p>Chất liệu tr&ecirc;n; lưới</p>\r\n\r\n<p>Danh mục sản phẩm: Gi&agrave;y ban</p>\r\n\r\n<p>Chất liệu đế: Cao su</p>\r\n\r\n<p>Chiều cao tr&ecirc;n: thấp</p>\r\n\r\n<p>Chiều cao hộp: hộp thấp</p>\r\n\r\n<p>Độ d&agrave;y: d&agrave;y th&ocirc;ng thường</p>\r\n\r\n<p style=\"text-align:center\"><img src=\"https://cf.shopee.vn/file/a32c131c44e32437de131d7db0f8802c\" style=\"height:invalid-value; width:invalid-value\" /></p>', '<p>M&agrave;u sắc: tiếp theo l&agrave; xanh lam, tiếp theo l&agrave; xanh lục, tiếp theo l&agrave; hoa hồng</p>\r\n\r\n<p>Chất liệu tr&ecirc;n; lưới</p>\r\n\r\n<p>Danh mục sản phẩm: Gi&agrave;y ban</p>\r\n\r\n<p>Chất liệu đế: Cao su</p>\r\n\r\n<p>Chiều cao tr&ecirc;n: thấp</p>\r\n\r\n<p>Chiều cao hộp: hộp thấp</p>\r\n\r\n<p>Độ d&agrave;y: d&agrave;y th&ocirc;ng thường</p>', 330000, 0, 1, '2022-11-20 11:39:17', '2022-11-20 11:39:17'),
(34, 6, 4, 186, 'Giày Thể Thao Màu Trắng Cổ Thấp Chống Mòn Thời Trang Xuân Thu Cho Bé Trai Và Gái', 'giay-the-thao-mau-trang-co-thap-chong-mon-thoi-trang-xuan-thu-cho-be-trai-va-gai', '<p>M&agrave;u sắc: da hồng, da xanh</p>\r\n\r\n<p>K&iacute;ch thước: 26,27,28,29,30,31,32,33,34,35,36,37</p>\r\n\r\n<p>Chất liệu tr&ecirc;n: da tổng hợp</p>\r\n\r\n<p>Danh mục sản phẩm: Gi&agrave;y thể thao</p>\r\n\r\n<p>Chất liệu đế: cao su</p>\r\n\r\n<p>Loại cổ gi&agrave;y: gi&agrave;y cổ thấp</p>\r\n\r\n<p>Chiều cao ống: ống thấp</p>\r\n\r\n<p>Phong c&aacute;ch mặc: Velcro</p>\r\n\r\n<p>C&aacute;c yếu tố phổ biến: kh&acirc;u da</p>\r\n\r\n<p>Thể thao &aacute;p dụng: đi bộ đường d&agrave;i</p>\r\n\r\n<p>Chức năng: tho&aacute;ng kh&iacute;, chống trượt, chống m&agrave;i m&ograve;n</p>\r\n\r\n<p>Độ d&agrave;y: d&agrave;y b&igrave;nh thường</p>\r\n\r\n<p>Họa tiết: hoạt h&igrave;nh</p>\r\n\r\n<p>M&ugrave;a th&iacute;ch hợp: hạ, đ&ocirc;ng, xu&acirc;n, thu</p>\r\n\r\n<p>Thủ c&ocirc;ng duy nhất: gi&agrave;y ti&ecirc;m</p>\r\n\r\n<p>Chất liệu đế: PU</p>\r\n\r\n<p>Phong c&aacute;ch: b&igrave;nh thường</p>\r\n\r\n<p>Độ tuổi &aacute;p dụng: quần &aacute;o trẻ mới biết đi (1-3 tuổi), quần &aacute;o trẻ em trung b&igrave;nh (7-12 tuổi), quần &aacute;o trẻ em nhỏ (4-6 tuổi), quần &aacute;o trẻ em lớn (13-16 tuổi)</p>\r\n\r\n<p style=\"text-align:center\"><img src=\"https://cf.shopee.vn/file/0f19fd40daa8a707523151f0e68bbc7a\" style=\"height:invalid-value; width:invalid-value\" /></p>\r\n\r\n<p style=\"text-align:center\"><img src=\"https://cf.shopee.vn/file/12fcad3ac654ad37d84a0e7ab3da6218\" style=\"height:invalid-value; width:invalid-value\" /></p>', '<p>M&agrave;u sắc: da hồng, da xanh</p>\r\n\r\n<p>K&iacute;ch thước: 26,27,28,29,30,31,32,33,34,35,36,37</p>\r\n\r\n<p>Chất liệu tr&ecirc;n: da tổng hợp</p>\r\n\r\n<p>Danh mục sản phẩm: Gi&agrave;y thể thao</p>\r\n\r\n<p>Chất liệu đế: cao su</p>\r\n\r\n<p>Loại cổ gi&agrave;y: gi&agrave;y cổ thấp</p>', 300000, 0, 1, '2022-11-20 11:41:23', '2022-11-20 11:41:23'),
(35, 1, 4, 270, 'Áo sweater AMILA thời trang xuân thu cá tính cho bé trai', 'ao-sweater-amila-thoi-trang-xuan-thu-ca-tinh-cho-be-trai', '<p>hời gian giao h&agrave;ng dự kiến cho sản phẩm n&agrave;y l&agrave; từ 7-9 ng&agrave;y</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>D&agrave;nh cho: B&eacute; trai</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Phong c&aacute;ch: Dễ phối đồ</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Nh&oacute;m tuổi ph&ugrave; hợp: Trẻ em (3~8 tuổi, 100~140cm)</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Thời tiết ph&ugrave; hợp: Xu&acirc;n v&agrave; thu.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Độ d&agrave;y: Th&ocirc;ng thường</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Chiều d&agrave;i tay: Tay dài</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>C&aacute;ch mặc: Kiểu mặc chui đầu</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>C&oacute; mũ tr&ugrave;m đầu: Kh&ocirc;ng mũ tr&ugrave;m đầu</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Đặc đi&ecirc;̉m: Thể thao, Sọc caro, Anh, Thời trang xu hướng</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Ch&acirc;́t vải: Cotton</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>M&agrave;u sắc: &Aacute;o len sọc caro-M&agrave;u xanh lam, &Aacute;o len sọc caro-M&agrave;u xanh lục</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Chiều cao ph&ugrave; hợp: 110cm, 120cm, 130cm, 140cm, 150cm, 160cm, 170cm</p>', '<p>Thời gian giao h&agrave;ng dự kiến cho sản phẩm n&agrave;y l&agrave; từ 7-9 ng&agrave;y</p>\r\n\r\n<p>D&agrave;nh cho: B&eacute; trai</p>\r\n\r\n<p>Phong c&aacute;ch: Dễ phối đồ</p>\r\n\r\n<p>Nh&oacute;m tuổi ph&ugrave; hợp: Trẻ em (3~8 tuổi, 100~140cm)</p>\r\n\r\n<p>Thời tiết ph&ugrave; hợp: Xu&acirc;n v&agrave; thu.</p>\r\n\r\n<p>Độ d&agrave;y: Th&ocirc;ng thường</p>\r\n\r\n<p>Chiều d&agrave;i tay: Tay dài</p>', 220000, 0, 1, '2022-11-20 11:44:12', '2022-11-20 11:44:12'),
(36, 6, 4, 372, 'Giày bốt martin AMILA cổ thấp phong cách Anh Quốc thời trang cá tính dành cho trẻ em', 'giay-bot-martin-amila-co-thap-phong-cach-anh-quoc-thoi-trang-ca-tinh-danh-cho-tre-em', '<p>Thời gian giao h&agrave;ng dự kiến cho sản phẩm n&agrave;y l&agrave; từ 7-9 ng&agrave;y</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>⛱️Lưu &yacute;:</p>\r\n\r\n<p>1.Sản phẩm được đo tr&ecirc;n b&agrave;n c&oacute; thể c&oacute; sai số 1-2cm. Xin lưu &yacute; rằng k&iacute;ch thước kh&ocirc;ng ph&ugrave; hợp với mọi người. Vui l&ograve;ng kiểm tra th&ocirc;ng tin k&iacute;ch thước trước khi mua h&agrave;ng.</p>\r\n\r\n<p>2.Do nhiều yếu tố như độ s&aacute;ng m&agrave;n h&igrave;nh v&agrave; độ s&aacute;ng của &aacute;nh s&aacute;ng trong qu&aacute; tr&igrave;nh chụp, m&agrave;u sắc sản phẩm thực tế c&oacute; thể hơi kh&aacute;c so với h&igrave;nh ảnh tr&ecirc;n trang web.</p>\r\n\r\n<p>3.Nếu bạn gặp bất kỳ vấn đề trong giao dịch, vui l&ograve;ng li&ecirc;n hệ với ch&uacute;ng t&ocirc;i để giải quyết vấn đề. Ch&uacute;c c&aacute;c bạn mua sắm vui vẻ!</p>\r\n\r\n<p>M&agrave;u sắc: Be, đen</p>\r\n\r\n<p>K&iacute;ch thước: 26-36</p>\r\n\r\n<p>Chất liệu mặt tr&ecirc;n: Da tổng hợp</p>\r\n\r\n<p>Hoa văn: M&agrave;u trơn</p>\r\n\r\n<p>Chất liệu đế: Cao su</p>\r\n\r\n<p>C&aacute;ch mang gi&agrave;y: D&acirc;y k&eacute;o b&ecirc;n h&ocirc;ng</p>\r\n\r\n<p>C&aacute;c yếu tố phổ biến: Kim sa</p>\r\n\r\n<p>Chiều cao th&acirc;n gi&agrave;y: Th&acirc;n thấp</p>\r\n\r\n<p style=\"text-align:center\"><img src=\"https://cf.shopee.vn/file/sg-11134202-22110-956x4cuv5xjv25\" style=\"height:invalid-value; width:invalid-value\" /></p>\r\n\r\n<p style=\"text-align:center\"><img src=\"https://cf.shopee.vn/file/sg-11134202-22110-swkn0luv5xjv11\" style=\"height:invalid-value; width:invalid-value\" /></p>', '<p>Thời gian giao h&agrave;ng dự kiến cho sản phẩm n&agrave;y l&agrave; từ 7-9 ng&agrave;y</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>⛱️Lưu &yacute;:</p>\r\n\r\n<p>1.Sản phẩm được đo tr&ecirc;n b&agrave;n c&oacute; thể c&oacute; sai số 1-2cm. Xin lưu &yacute; rằng k&iacute;ch thước kh&ocirc;ng ph&ugrave; hợp với mọi người. Vui l&ograve;ng kiểm tra th&ocirc;ng tin k&iacute;ch thước trước khi mua h&agrave;ng.</p>\r\n\r\n<p>2.Do nhiều yếu tố như độ s&aacute;ng m&agrave;n h&igrave;nh v&agrave; độ s&aacute;ng của &aacute;nh s&aacute;ng trong qu&aacute; tr&igrave;nh chụp, m&agrave;u sắc sản phẩm thực tế c&oacute; thể hơi kh&aacute;c so với h&igrave;nh ảnh tr&ecirc;n trang web.</p>\r\n\r\n<p>3.Nếu bạn gặp bất kỳ vấn đề trong giao dịch, vui l&ograve;ng li&ecirc;n hệ với ch&uacute;ng t&ocirc;i để giải quyết vấn đề. Ch&uacute;c c&aacute;c bạn mua sắm vui vẻ!</p>\r\n\r\n<p>M&agrave;u sắc: Be, đen</p>', 408000, 1, 1, '2022-11-20 11:46:20', '2022-11-20 11:47:01'),
(37, 5, 4, 385, 'AMILA Giày Thể Thao Phối Lưới Thoáng Khí Thời Trang Cho Bé Trai', 'amila-giay-the-thao-phoi-luoi-thoang-khi-thoi-trang-cho-be-trai', '<p>M&agrave;u sắc：trắng v&agrave; đen, đen</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>K&iacute;ch thước：28 thước chiều d&agrave;i b&ecirc;n trong / 17,5 cm, 29 thước chiều d&agrave;i b&ecirc;n trong / 18,0 cm, chiều d&agrave;i b&ecirc;n trong 30 thước / 18,5 cm, chiều d&agrave;i b&ecirc;n trong 31 thước / 19,0 cm, chiều d&agrave;i b&ecirc;n trong 32 thước / 19,5 cm, chiều d&agrave;i b&ecirc;n trong 33 thước / 19,5 cm, 34 Thước chiều d&agrave;i b&ecirc;n trong / 20,5 cm, 35 thước chiều d&agrave;i b&ecirc;n trong / 21,0 cm, 36 thước chiều d&agrave;i b&ecirc;n trong / 21,5 cm, 37 thước chiều d&agrave;i b&ecirc;n trong / 22,0 cm, 38 thước b&ecirc;n trong / 23,0cm.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Độ tuổi &aacute;p dụng cho lứa tuổi</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Quần &aacute;o trẻ em (7-12 tuổi), quần &aacute;o trẻ em (4-6 tuổi), quần &aacute;o trẻ em lớn (13-16 tuổi), quần &aacute;o trẻ em lớn (13-16 tuổi), quần &aacute;o trẻ em trung ni&ecirc;n (7-12 tuổi), Quần &aacute;o trẻ em nhỏ (4-6 tuổi), Quần &aacute;o trẻ em lớn (13-16 tuổi)</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Chất liệu tr&ecirc;n: da nh&acirc;n tạo</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Chức năng: khử m&ugrave;i, kh&ocirc;ng trơn trượt, thấm mồ h&ocirc;i</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Họa tiết: Sọc</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Chất liệu đế: cao su</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Độ d&agrave;y: Đơn</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Phong c&aacute;ch mặc: ren trước: ren trước</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Danh mục sản phẩm: Gi&agrave;y b&oacute;ng rổ</p>', '<p>M&agrave;u sắc：trắng v&agrave; đen, đen</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>K&iacute;ch thước：28 thước chiều d&agrave;i b&ecirc;n trong / 17,5 cm, 29 thước chiều d&agrave;i b&ecirc;n trong / 18,0 cm, chiều d&agrave;i b&ecirc;n trong 30 thước / 18,5 cm, chiều d&agrave;i b&ecirc;n trong 31 thước / 19,0 cm, chiều d&agrave;i b&ecirc;n trong 32 thước / 19,5 cm, chiều d&agrave;i b&ecirc;n trong 33 thước / 19,5 cm, 34 Thước chiều d&agrave;i b&ecirc;n trong / 20,5 cm, 35 thước chiều d&agrave;i b&ecirc;n trong / 21,0 cm, 36 thước chiều d&agrave;i b&ecirc;n trong / 21,5 cm, 37 thước chiều d&agrave;i b&ecirc;n trong / 22,0 cm, 38 thước b&ecirc;n trong / 23,0cm.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Độ tuổi &aacute;p dụng cho lứa tuổi</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Quần &aacute;o trẻ em (7-12 tuổi), quần &aacute;o trẻ em (4-6 tuổi), quần &aacute;o trẻ em lớn (13-16 tuổi), quần &aacute;o trẻ em lớn (13-16 tuổi), quần &aacute;o trẻ em trung ni&ecirc;n (7-12 tuổi), Quần &aacute;o trẻ em nhỏ (4-6 tuổi), Quần &aacute;o trẻ em lớn (13-16 tuổi)</p>', 330000, 0, 1, '2022-11-20 11:49:17', '2022-11-20 11:49:17'),
(38, 4, 4, 110, 'Gối Nhồi Bông Giữ Ấm Tay Hình Mèo Doodle Dễ Thương', 'goi-nhoi-bong-giu-am-tay-hinh-meo-doodle-de-thuong', '<p>T&ecirc;n: Dudu Cat Hand Warmer</p>\r\n\r\n<p>Th&ocirc;ng số kỹ thuật: Xanh l&aacute; c&acirc;y, Xanh lam, N&acirc;u, Hồng</p>\r\n\r\n<p>Ph&acirc;n loại sang trọng: sang trọng ngắn</p>\r\n\r\n<p>Thể loại m&ocirc; h&igrave;nh: Động vật</p>\r\n\r\n<p>Chất liệu l&agrave;m đầy: b&ocirc;ng PP</p>\r\n\r\n<p>H&igrave;nh ảnh: Dudu Cat</p>\r\n\r\n<p>Chất liệu: Vải l&ocirc;ng</p>\r\n\r\n<p>K&iacute;ch thước sản phẩm: 60cm</p>\r\n\r\n<p>Độ tuổi &aacute;p dụng: Thanh ni&ecirc;n (15-35 tuổi)</p>', '<p>T&ecirc;n: Dudu Cat Hand Warmer</p>\r\n\r\n<p>Th&ocirc;ng số kỹ thuật: Xanh l&aacute; c&acirc;y, Xanh lam, N&acirc;u, Hồng</p>\r\n\r\n<p>Ph&acirc;n loại sang trọng: sang trọng ngắn</p>\r\n\r\n<p>Thể loại m&ocirc; h&igrave;nh: Động vật</p>\r\n\r\n<p>Chất liệu l&agrave;m đầy: b&ocirc;ng PP</p>\r\n\r\n<p>H&igrave;nh ảnh: Dudu Cat</p>\r\n\r\n<p>Chất liệu: Vải l&ocirc;ng</p>\r\n\r\n<p>K&iacute;ch thước sản phẩm: 60cm</p>\r\n\r\n<p>Độ tuổi &aacute;p dụng: Thanh ni&ecirc;n (15-35 tuổi)</p>', 300000, 0, 1, '2022-11-20 11:51:58', '2022-11-20 11:51:58'),
(39, 4, 4, 285, 'Kẹp tóc nơ AMILA dễ thương cho bé gái', 'kep-toc-no-amila-de-thuong-cho-be-gai', '<p>Kẹp t&oacute;c nơ điệu đ&agrave;<br />\r\nPhong c&aacute;ch đơn giản, cổ điển v&agrave; linh hoạt<br />\r\nKiểu thẳng, si&ecirc;u bắt mắt<br />\r\nC&aacute;c b&eacute; nhanh tay mua ngay n&agrave;o ~<br />\r\nRăng kẹp chống trượt, thoải m&aacute;i khi đeo, kh&ocirc;ng dễ rơi<br />\r\nKẹp t&oacute;c ph&ugrave; hợp với những n&agrave;ng ti&ecirc;n nhỏ<br />\r\nNếu bạn y&ecirc;u b&eacute;, h&atilde;y cho b&eacute; những g&igrave; b&eacute; th&iacute;ch, v&agrave; tạo bất ngờ cho những đứa trẻ dễ thương!</p>', '<p>Kẹp t&oacute;c nơ điệu đ&agrave;<br />\r\nPhong c&aacute;ch đơn giản, cổ điển v&agrave; linh hoạt<br />\r\nKiểu thẳng, si&ecirc;u bắt mắt<br />\r\nC&aacute;c b&eacute; nhanh tay mua ngay n&agrave;o ~<br />\r\nRăng kẹp chống trượt, thoải m&aacute;i khi đeo, kh&ocirc;ng dễ rơi<br />\r\nKẹp t&oacute;c ph&ugrave; hợp với những n&agrave;ng ti&ecirc;n nhỏ<br />\r\nNếu bạn y&ecirc;u b&eacute;, h&atilde;y cho b&eacute; những g&igrave; b&eacute; th&iacute;ch, v&agrave; tạo bất ngờ cho những đứa trẻ dễ thương!</p>', 31000, 0, 1, '2022-11-20 11:54:30', '2022-11-20 11:54:30'),
(40, 4, 4, 371, 'Mũ Dệt Kim Dày Dặn Giữ Ấm Mùa Đông Dành Cho Bé Trai Và Bé Gái (6 Tháng-2 Tuổi)', 'mu-det-kim-day-dan-giu-am-mua-dong-danh-cho-be-trai-va-be-gai-6-thang-2-tuoi', '<p>T&ecirc;n sản phẩm: mũ trẻ em</p>\r\n\r\n<p>Chất liệu: cotton pha</p>\r\n\r\n<p>Đặc điểm sản phẩm: tai mềm v&agrave; thoải m&aacute;i, d&agrave;y v&agrave; ấm, ấm &aacute;p.</p>\r\n\r\n<p>&Aacute;p dụng: 6 th&aacute;ng-2 năm</p>', '<p>T&ecirc;n sản phẩm: mũ trẻ em</p>\r\n\r\n<p>Chất liệu: cotton pha</p>\r\n\r\n<p>Đặc điểm sản phẩm: tai mềm v&agrave; thoải m&aacute;i, d&agrave;y v&agrave; ấm, ấm &aacute;p.</p>\r\n\r\n<p>&Aacute;p dụng: 6 th&aacute;ng-2 năm</p>', 60000, 5, 1, '2022-11-20 11:56:22', '2022-11-20 11:56:22'),
(41, 1, 2, 330, 'Áo sơ mi dài tay bé trai Rabity 92406', 'ao-so-mi-dai-tay-be-trai-rabity-92406', '<p>&Aacute;o sơ mi d&agrave;i tay b&eacute; trai Rabity 92406</p>\r\n\r\n<p>Tặng qu&agrave; mọi đơn h&agrave;ng</p>\r\n\r\n<p>Rabity cam kết</p>\r\n\r\n<p>- Hỗ trợ đổi trả 30 ng&agrave;y tr&ecirc;n to&agrave;n quốc</p>\r\n\r\n<p>- Tư vấn nhiệt t&igrave;nh, giải quyết thỏa đ&aacute;ng khi kh&aacute;ch h&agrave;ng gặp vấn đề về sản phẩm</p>\r\n\r\n<p>- Sản phẩm sale: sẵn s&agrave;ng đổi size nếu c&ograve;n size</p>\r\n\r\n<p>- Đặc quyền của sản phẩm nguy&ecirc;n gi&aacute; (kh&ocirc;ng sale): sẵn s&agrave;ng đổi size, đổi lu&ocirc;n qua sản phẩm kh&aacute;c bằng gi&aacute; hoặc cao hơn &amp; b&ugrave; ch&ecirc;nh lệch.</p>\r\n\r\n<p>- Sản phẩm đổi trả phải c&ograve;n nguy&ecirc;n m&aacute;c, chưa qua sử dụng, giặt tẩy, kh&ocirc;ng bị bẩn hoặc bị hư hỏng bởi c&aacute;c t&aacute;c nh&acirc;n b&ecirc;n ngo&agrave;i.</p>\r\n\r\n<p>- Với h&agrave;ng đồ l&oacute;t, khẩu trang Raibty rất lấy l&agrave;m tiếc v&igrave; kh&ocirc;ng thể hỗ trợ đổi</p>\r\n\r\n<p>- Rabity sẽ hỗ trợ ph&iacute; ship đổi hai chiều trong trường hợp: giao sai h&agrave;ng, sản phẩm bị lỗi do nh&agrave; sản xuất, ...</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Th&ocirc;ng tin sản phẩm</p>\r\n\r\n<p>- Chất liệu sản phẩm: Chất liệu chủ đạo l&agrave; cotton, được sản xuất từ sợi b&ocirc;ng thi&ecirc;n nhi&ecirc;n - một trong những loại cotton an to&agrave;n được c&aacute;c mẹ bỉm ưa chuộng nhất</p>\r\n\r\n<p>- K&iacute;ch thước: theo bảng size</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&Aacute;o sơ mi d&agrave;i tay b&eacute; trai Rabity</p>\r\n\r\n<p>- V&igrave; sao c&aacute;c mẹ bỉm sữa n&ecirc;n lựa chọn sản phẩm Rabity?</p>\r\n\r\n<p>+ Thiết kế thời trang, năng động, đ&aacute;ng y&ecirc;u. M&agrave;u sắc tươi s&aacute;ng</p>\r\n\r\n<p>+ Họa tiết v&agrave; h&igrave;nh in chắc chắc, kh&ocirc;ng bong tr&oacute;c</p>\r\n\r\n<p>+ Được may với đường kim mũi chỉ cẩn thận, chắc chắn.</p>\r\n\r\n<p>+ Sử dụng chất liệu cotton với ưu điểm vượt trội l&agrave; khả năng thấm h&uacute;t mồ h&ocirc;i cao đem lại sự tho&aacute;ng m&aacute;t, thoải m&aacute;i cho b&eacute;, mềm mại tuyệt đối tạo sự dễ chịu khi chạm v&agrave;o, an to&agrave;n với l&agrave;n da nhạy cảm của b&eacute;.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&Aacute;o sơ mi d&agrave;i tay b&eacute; trai Rabity</p>\r\n\r\n<p>Hướng dẫn bảo quản đồ cho b&eacute;</p>\r\n\r\n<p>- Tốt nhất n&ecirc;n giặt bằng tay đồ của trẻ</p>\r\n\r\n<p>- N&ecirc;n d&ugrave;ng bột giặt v&agrave; nước xả vải chuy&ecirc;n dụng cho quần &aacute;o b&eacute; nhỏ</p>\r\n\r\n<p>- Nếu giặt m&aacute;y, d&ugrave;ng t&uacute;i giặt v&agrave; giặt ở chế độ nhẹ/ chế độ d&agrave;nh ri&ecirc;ng cho đồ của b&eacute;</p>\r\n\r\n<p>- L&agrave; ủi ở nhiệt độ thấp</p>\r\n\r\n<p>- Phơi kh&ocirc; dưới &aacute;nh nắng, nơi tho&aacute;ng m&aacute;t</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&Aacute;o sơ mi d&agrave;i tay b&eacute; trai Rabity</p>\r\n\r\n<p>Hướng dẫn đặt h&agrave;ng</p>\r\n\r\n<p>- Chat với shop để được tư vấn về size ➥ chọn m&agrave;u ➥ chọn size / số lượng➥ nhấn th&ecirc;m h&agrave;ng v&agrave;o giỏ h&agrave;ng</p>\r\n\r\n<p>(muốn chọn th&ecirc;m m&agrave;u kh&aacute;c hoặc mẫu kh&aacute;c l&agrave;m tương tự c&aacute;c bước tr&ecirc;n)</p>\r\n\r\n<p>- Đừng qu&ecirc;n chọn th&ecirc;m voucher để được mua với gi&aacute; ưu đ&atilde;i nhất!</p>\r\n\r\n<p>- Muốn ho&agrave;n tất đơn h&agrave;ng nhấn v&agrave;o giỏ h&agrave;ng g&oacute;c tr&ecirc;n b&ecirc;n phải m&agrave;n h&igrave;nh tiến h&agrave;nh thanh to&aacute;n</p>\r\n\r\n<p>- Mọi thắc mắc xin qu&yacute; kh&aacute;ch vui l&ograve;ng nhắn tin trực tiếp cho shop để được hỗ trợ, từ 8h-22h mỗi ng&agrave;y</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&Aacute;o sơ mi d&agrave;i tay b&eacute; trai Rabity</p>\r\n\r\n<p>Rabity - Thương hiệu thời trang trẻ em h&agrave;ng đầu Việt Nam, với hệ thống 80 cửa h&agrave;ng to&agrave;n quốc, c&oacute; mặt tại nhiều hệ thống si&ecirc;u thị lớn Vincom, Lotte, Aeon mall,&hellip; v&agrave; kinh nghiệm 20 năm theo đuổi mục ti&ecirc;u mang tới những sản phẩm từ chất liệu thi&ecirc;n nhi&ecirc;n an to&agrave;n, thoải m&aacute;i, gi&uacute;p trẻ tự do vận động, kh&aacute;m ph&aacute; thế giới. Rabity cũng l&agrave; đơn vị thời trang duy nhất tại VN đồng sở hữu bản quyền từ tập đo&agrave;n giải tr&iacute; Disney v&agrave; biểu tượng thời trang Ph&aacute;p - Elle</p>', '<p>Th&ocirc;ng tin sản phẩm</p>\r\n\r\n<p>- Chất liệu sản phẩm: Chất liệu chủ đạo l&agrave; cotton, được sản xuất từ sợi b&ocirc;ng thi&ecirc;n nhi&ecirc;n - một trong những loại cotton an to&agrave;n được c&aacute;c mẹ bỉm ưa chuộng nhất</p>\r\n\r\n<p>- K&iacute;ch thước: theo bảng size</p>', 249000, 0, 1, '2022-11-20 12:04:56', '2022-11-20 12:04:56'),
(42, 7, 2, 228, 'Đầm váy thô phối ren cho bé gái Rabity váy trẻ em họa tiết Elsa dễ thương mặc đi học đi chơi', 'dam-vay-tho-phoi-ren-cho-be-gai-rabity-vay-tre-em-hoa-tiet-elsa-de-thuong-mac-di-hoc-di-choi', '<p>Đầm v&aacute;y th&ocirc; phối ren cho b&eacute; g&aacute;i Rabity v&aacute;y trẻ em họa tiết Elsa dễ thương mặc đi học đi chơi 5648<br />\r\nTặng qu&agrave; mọi đơn h&agrave;ng<br />\r\nRabity cam kết<br />\r\n- Hỗ trợ đổi trả 30 ng&agrave;y tr&ecirc;n to&agrave;n quốc<br />\r\n- Tư vấn nhiệt t&igrave;nh, giải quyết thỏa đ&aacute;ng khi kh&aacute;ch h&agrave;ng gặp vấn đề về sản phẩm<br />\r\n- Sản phẩm sale: sẵn s&agrave;ng đổi size nếu c&ograve;n size<br />\r\n- Đặc quyền của sản phẩm nguy&ecirc;n gi&aacute; (kh&ocirc;ng sale): sẵn s&agrave;ng đổi size, đổi lu&ocirc;n qua sản phẩm kh&aacute;c bằng gi&aacute; hoặc cao hơn &amp; b&ugrave; ch&ecirc;nh lệch.<br />\r\n- Sản phẩm đổi trả phải c&ograve;n nguy&ecirc;n m&aacute;c, chưa qua sử dụng, giặt tẩy, kh&ocirc;ng bị bẩn hoặc bị hư hỏng bởi c&aacute;c t&aacute;c nh&acirc;n b&ecirc;n ngo&agrave;i.<br />\r\n- Với h&agrave;ng đồ l&oacute;t, khẩu trang Raibty rất lấy l&agrave;m tiếc v&igrave; kh&ocirc;ng thể hỗ trợ đổi<br />\r\n- Rabity sẽ hỗ trợ ph&iacute; ship đổi hai chiều trong trường hợp: giao sai h&agrave;ng, sản phẩm bị lỗi do nh&agrave; sản xuất, ...</p>\r\n\r\n<p>Đầm v&aacute;y th&ocirc; phối ren cho b&eacute; g&aacute;i Rabity v&aacute;y trẻ em họa tiết Elsa dễ thương mặc đi học đi chơi<br />\r\nTh&ocirc;ng tin sản phẩm<br />\r\n- Chất liệu sản phẩm: Chất liệu chủ đạo l&agrave; cotton, được sản xuất từ sợi b&ocirc;ng thi&ecirc;n nhi&ecirc;n - một trong những loại cotton an to&agrave;n được c&aacute;c mẹ bỉm ưa chuộng nhất<br />\r\n- K&iacute;ch thước: theo bảng size</p>\r\n\r\n<p>Đầm v&aacute;y th&ocirc; phối ren cho b&eacute; g&aacute;i Rabity v&aacute;y trẻ em họa tiết Elsa dễ thương mặc đi học đi chơi<br />\r\n- V&igrave; sao c&aacute;c mẹ bỉm sữa n&ecirc;n lựa chọn sản phẩm Rabity?<br />\r\n+ Thiết kế thời trang, năng động, đ&aacute;ng y&ecirc;u. M&agrave;u sắc tươi s&aacute;ng<br />\r\n+ Họa tiết v&agrave; h&igrave;nh in chắc chắc, kh&ocirc;ng bong tr&oacute;c<br />\r\n+ Được may với đường kim mũi chỉ cẩn thận, chắc chắn.<br />\r\n+ Sử dụng chất liệu cotton với ưu điểm vượt trội l&agrave; khả năng thấm h&uacute;t mồ h&ocirc;i cao đem lại sự tho&aacute;ng m&aacute;t, thoải m&aacute;i cho b&eacute;, mềm mại tuyệt đối tạo sự dễ chịu khi chạm v&agrave;o, an to&agrave;n với l&agrave;n da nhạy cảm của b&eacute;.</p>\r\n\r\n<p>Đầm v&aacute;y th&ocirc; phối ren cho b&eacute; g&aacute;i Rabity v&aacute;y trẻ em họa tiết Elsa dễ thương mặc đi học đi chơi<br />\r\nHướng dẫn bảo quản đồ cho b&eacute;<br />\r\n- Tốt nhất n&ecirc;n giặt bằng tay đồ của trẻ<br />\r\n- N&ecirc;n d&ugrave;ng bột giặt v&agrave; nước xả vải chuy&ecirc;n dụng cho quần &aacute;o b&eacute; nhỏ<br />\r\n- Nếu giặt m&aacute;y, d&ugrave;ng t&uacute;i giặt v&agrave; giặt ở chế độ nhẹ/ chế độ d&agrave;nh ri&ecirc;ng cho đồ của b&eacute;<br />\r\n- L&agrave; ủi ở nhiệt độ thấp<br />\r\n- Phơi kh&ocirc; dưới &aacute;nh nắng, nơi tho&aacute;ng m&aacute;t</p>\r\n\r\n<p>Đầm v&aacute;y th&ocirc; phối ren cho b&eacute; g&aacute;i Rabity v&aacute;y trẻ em họa tiết Elsa dễ thương mặc đi học đi chơi<br />\r\nHướng dẫn đặt h&agrave;ng<br />\r\n- Chat với shop để được tư vấn về size ➥ chọn m&agrave;u ➥ chọn size / số lượng➥ nhấn th&ecirc;m h&agrave;ng v&agrave;o giỏ h&agrave;ng<br />\r\n(muốn chọn th&ecirc;m m&agrave;u kh&aacute;c hoặc mẫu kh&aacute;c l&agrave;m tương tự c&aacute;c bước tr&ecirc;n)<br />\r\n- Đừng qu&ecirc;n chọn th&ecirc;m voucher để được mua với gi&aacute; ưu đ&atilde;i nhất!<br />\r\n- Muốn ho&agrave;n tất đơn h&agrave;ng nhấn v&agrave;o giỏ h&agrave;ng g&oacute;c tr&ecirc;n b&ecirc;n phải m&agrave;n h&igrave;nh tiến h&agrave;nh thanh to&aacute;n<br />\r\n- Mọi thắc mắc xin qu&yacute; kh&aacute;ch vui l&ograve;ng nhắn tin trực tiếp cho shop để được hỗ trợ, từ 8h-22h mỗi ng&agrave;y</p>\r\n\r\n<p>Đầm v&aacute;y th&ocirc; phối ren cho b&eacute; g&aacute;i Rabity v&aacute;y trẻ em họa tiết Elsa dễ thương mặc đi học đi chơi<br />\r\nRabity - Thương hiệu thời trang trẻ em h&agrave;ng đầu Việt Nam, với hệ thống 80 cửa h&agrave;ng to&agrave;n quốc, c&oacute; mặt tại nhiều hệ thống si&ecirc;u thị lớn Vincom, Lotte, Aeon mall,&hellip; v&agrave; kinh nghiệm 20 năm theo đuổi mục ti&ecirc;u mang tới những sản phẩm từ chất liệu thi&ecirc;n nhi&ecirc;n an to&agrave;n, thoải m&aacute;i, gi&uacute;p trẻ tự do vận động, kh&aacute;m ph&aacute; thế giới. Rabity cũng l&agrave; đơn vị thời trang duy nhất tại VN đồng sở hữu bản quyền từ tập đo&agrave;n giải tr&iacute; Disney v&agrave; biểu tượng thời trang Ph&aacute;p - Elle</p>', '<p>Th&ocirc;ng tin sản phẩm<br />\r\n- Chất liệu sản phẩm: Chất liệu chủ đạo l&agrave; cotton, được sản xuất từ sợi b&ocirc;ng thi&ecirc;n nhi&ecirc;n - một trong những loại cotton an to&agrave;n được c&aacute;c mẹ bỉm ưa chuộng nhất<br />\r\n- K&iacute;ch thước: theo bảng size</p>', 299000, 0, 1, '2022-11-20 12:06:36', '2022-11-20 12:06:36'),
(43, 2, 2, 196, 'Quần sooc ngắn bé gái chất cotton Rabity năng động thoải mái', 'quan-sooc-ngan-be-gai-chat-cotton-rabity-nang-dong-thoai-mai', '<p>Quần sooc ngắn b&eacute; g&aacute;i chất cotton Rabity năng động thoải m&aacute;i 92239.92328</p>\r\n\r\n<p>Tặng qu&agrave; mọi đơn h&agrave;ng</p>\r\n\r\n<p>1. Rabity cam kết</p>\r\n\r\n<p>- Hỗ trợ đổi trả 30 ng&agrave;y tr&ecirc;n to&agrave;n quốc</p>\r\n\r\n<p>- Tư vấn nhiệt t&igrave;nh, giải quyết thỏa đ&aacute;ng khi kh&aacute;ch h&agrave;ng gặp vấn đề về sản phẩm</p>\r\n\r\n<p>- Sản phẩm sale: Sẵn s&agrave;ng đổi size nếu c&ograve;n size</p>\r\n\r\n<p>- Đặc quyền của sản phẩm nguy&ecirc;n gi&aacute;(kh&ocirc;ng sale): Sẵn s&agrave;ng đổi size, đổi lu&ocirc;n qua sản phẩm kh&aacute;c bằng gi&aacute; hoặc cao hơn &amp; b&ugrave; ch&ecirc;nh lệch.</p>\r\n\r\n<p>- Sản phẩm đổi trả phải c&ograve;n nguy&ecirc;n m&aacute;c, chưa qua sử dụng, giặt tẩy, kh&ocirc;ng bị bẩn hoặc bị hư hỏng bởi c&aacute;c t&aacute;c nh&acirc;n b&ecirc;n ngo&agrave;i.</p>\r\n\r\n<p>- Mọi thắc mắc xin qu&yacute; kh&aacute;ch vui l&ograve;ng nhắn tin trực tiếp cho shop để được hỗ trợ, từ 8h-22h mỗi ng&agrave;y</p>\r\n\r\n<p>- Với h&agrave;ng đồ l&oacute;t, khẩu trang Raibty rất lấy l&agrave;m tiếc v&igrave; kh&ocirc;ng thể hỗ trợ đổi</p>\r\n\r\n<p>- Rabity sẽ hỗ trợ ph&iacute; ship đổi hai chiều trong TH: giao sai h&agrave;ng, sản phẩm bị lỗi, ...</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>2. Th&ocirc;ng tin sản phẩm quần sooc ngắn b&eacute; g&aacute;i chất cotton Rabity năng động thoải m&aacute;i</p>\r\n\r\n<p>- Chất liệu sản phẩm: Chất liệu chủ đạo l&agrave; Cotton, được sản xuất từ sợi b&ocirc;ng thi&ecirc;n nhi&ecirc;n - một trong những loại Cotton an to&agrave;n được c&aacute;c mẹ bỉm ưa chuộng nhất</p>\r\n\r\n<p>- K&iacute;ch thước: bảng size ph&iacute;a dưới</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>- V&igrave; sao c&aacute;c mẹ bỉm sữa n&ecirc;n lựa chọn sản phẩm quần sooc ngắn b&eacute; g&aacute;i chất cotton Rabity năng động thoải m&aacute;i?</p>\r\n\r\n<p>+ Thiết kế thời trang, năng động, đ&aacute;ng y&ecirc;u. M&agrave;u sắc tươi s&aacute;ng</p>\r\n\r\n<p>+ Họa tiết v&agrave; h&igrave;nh in chắc chắc, kh&ocirc;ng bong tr&oacute;c</p>\r\n\r\n<p>+ Được may với đường kim mũi chỉ cẩn thận, chắc chắn.</p>\r\n\r\n<p>+ Sử dụng chất liệu cotton với ưu điểm vượt trội l&agrave; khả năng thấm h&uacute;t mồ h&ocirc;i cao đem lại sự tho&aacute;ng m&aacute;t, thoải m&aacute;i cho b&eacute;, mềm mại tuyệt đối tạo sự dễ chịu khi chạm v&agrave;o, an to&agrave;n với l&agrave;n da nhạy cảm của b&eacute;.</p>\r\n\r\n<p>+ Q&ugrave;a tặng 0đ cho tất cả c&aacute;c đơn h&agrave;ng</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>3. Hướng dẫn bảo quản quần sooc ngắn b&eacute; g&aacute;i chất cotton Rabity năng động thoải m&aacute;i</p>\r\n\r\n<p>- Tốt nhất n&ecirc;n giặt bằng tay đồ của trẻ</p>\r\n\r\n<p>- N&ecirc;n d&ugrave;ng bột giặt v&agrave; nước xả vải chuy&ecirc;n dụng cho quần &aacute;o b&eacute; nhỏ</p>\r\n\r\n<p>- Nếu giặt m&aacute;y, d&ugrave;ng t&uacute;i giặt v&agrave; giặt ở chế độ nhẹ/ chế độ d&agrave;nh ri&ecirc;ng cho đồ của b&eacute;</p>\r\n\r\n<p>- L&agrave; ủi ở nhiệt độ thấp</p>\r\n\r\n<p>- Phơi kh&ocirc; dưới &aacute;nh nắng, nơi tho&aacute;ng m&aacute;t</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>4. Hướng dẫn đặt h&agrave;ng quần sooc ngắn b&eacute; g&aacute;i chất cotton Rabity năng động thoải m&aacute;i</p>\r\n\r\n<p>- Chat với shop để được tư vấn về size ➥ Chọn M&Agrave;U ➥ Chọn SIZE / SỐ LƯỢNG ➥ Nhấn TH&Ecirc;M V&Agrave;O GIỎ H&Agrave;NG</p>\r\n\r\n<p>(Muốn chọn th&ecirc;m m&agrave;u kh&aacute;c hoặc mẫu kh&aacute;c l&agrave;m tương tự c&aacute;c bước tr&ecirc;n)</p>\r\n\r\n<p>- Đừng qu&ecirc;n chọn th&ecirc;m voucher để được mua với gi&aacute; ưu đ&atilde;i nhất!</p>\r\n\r\n<p>- Muốn ho&agrave;n tất đơn h&agrave;ng nhấn v&agrave;o giỏ h&agrave;ng g&oacute;c tr&ecirc;n b&ecirc;n phải m&agrave;n h&igrave;nh tiến h&agrave;nh thanh to&aacute;n</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>5. Rabity - Thương hiệu thời trang trẻ em h&agrave;ng đầu Việt Nam, với hệ thống 80 cửa h&agrave;ng to&agrave;n quốc, c&oacute; mặt tại nhiều hệ thống si&ecirc;u thị lớn Vincom, Lotte, Aeon mall,&hellip; v&agrave; kinh nghiệm 20 năm theo đuổi mục ti&ecirc;u mang tới những sản phẩm từ chất liệu thi&ecirc;n nhi&ecirc;n an to&agrave;n, thoải m&aacute;i, gi&uacute;p trẻ tự do vận động, kh&aacute;m ph&aacute; thế giới. Rabity cũng l&agrave; đơn vị thời trang duy nhất tại VN đồng sở hữu bản quyền từ tập đo&agrave;n giải tr&iacute; Disney v&agrave; biểu tượng thời trang Ph&aacute;p - ELLE</p>', '<p>2. Th&ocirc;ng tin sản phẩm quần sooc ngắn b&eacute; g&aacute;i chất cotton Rabity năng động thoải m&aacute;i</p>\r\n\r\n<p>- Chất liệu sản phẩm: Chất liệu chủ đạo l&agrave; Cotton, được sản xuất từ sợi b&ocirc;ng thi&ecirc;n nhi&ecirc;n - một trong những loại Cotton an to&agrave;n được c&aacute;c mẹ bỉm ưa chuộng nhất</p>\r\n\r\n<p>- K&iacute;ch thước: bảng size ph&iacute;a dưới</p>', 169000, 0, 1, '2022-11-20 12:09:01', '2022-11-20 12:09:01');
INSERT INTO `product` (`idProduct`, `idCategory`, `idBrand`, `QuantityTotal`, `ProductName`, `ProductSlug`, `DesProduct`, `ShortDes`, `Price`, `Sold`, `StatusPro`, `created_at`, `updated_at`) VALUES
(44, 1, 2, 235, 'Áo sơ mi bé trai Rabity dài tay chất liệu cotton', 'ao-so-mi-be-trai-rabity-dai-tay-chat-lieu-cotton', '<p>Th&ocirc;ng tin sản phẩm</p>\r\n\r\n<p>- Chất liệu sản phẩm: Chất liệu chủ đạo l&agrave; cotton, được sản xuất từ sợi b&ocirc;ng thi&ecirc;n nhi&ecirc;n - một trong những loại cotton an to&agrave;n được c&aacute;c mẹ bỉm ưa chuộng nhất</p>\r\n\r\n<p>- K&iacute;ch thước: theo bảng size</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>- V&igrave; sao c&aacute;c mẹ bỉm sữa n&ecirc;n lựa chọn sản phẩm Rabity?</p>\r\n\r\n<p>+ Thiết kế thời trang, năng động, đ&aacute;ng y&ecirc;u. M&agrave;u sắc tươi s&aacute;ng</p>\r\n\r\n<p>+ Họa tiết v&agrave; h&igrave;nh in chắc chắc, kh&ocirc;ng bong tr&oacute;c</p>\r\n\r\n<p>+ Được may với đường kim mũi chỉ cẩn thận, chắc chắn.</p>\r\n\r\n<p>+ Sử dụng chất liệu cotton với ưu điểm vượt trội l&agrave; khả năng thấm h&uacute;t mồ h&ocirc;i cao đem lại sự tho&aacute;ng m&aacute;t, thoải m&aacute;i cho b&eacute;, mềm mại tuyệt đối tạo sự dễ chịu khi chạm v&agrave;o, an to&agrave;n với l&agrave;n da nhạy cảm của b&eacute;.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Hướng dẫn bảo quản đồ cho b&eacute;</p>\r\n\r\n<p>- Tốt nhất n&ecirc;n giặt bằng tay đồ của trẻ</p>\r\n\r\n<p>- N&ecirc;n d&ugrave;ng bột giặt v&agrave; nước xả vải chuy&ecirc;n dụng cho quần &aacute;o b&eacute; nhỏ</p>\r\n\r\n<p>- Nếu giặt m&aacute;y, d&ugrave;ng t&uacute;i giặt v&agrave; giặt ở chế độ nhẹ/ chế độ d&agrave;nh ri&ecirc;ng cho đồ của b&eacute;</p>\r\n\r\n<p>- L&agrave; ủi ở nhiệt độ thấp</p>\r\n\r\n<p>- Phơi kh&ocirc; dưới &aacute;nh nắng, nơi tho&aacute;ng m&aacute;t</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Hướng dẫn đặt h&agrave;ng</p>\r\n\r\n<p>- Chat với shop để được tư vấn về size ➥ chọn m&agrave;u ➥ chọn size / số lượng➥ nhấn th&ecirc;m h&agrave;ng v&agrave;o giỏ h&agrave;ng</p>\r\n\r\n<p>(muốn chọn th&ecirc;m m&agrave;u kh&aacute;c hoặc mẫu kh&aacute;c l&agrave;m tương tự c&aacute;c bước tr&ecirc;n)</p>\r\n\r\n<p>- Đừng qu&ecirc;n chọn th&ecirc;m voucher để được mua với gi&aacute; ưu đ&atilde;i nhất!</p>\r\n\r\n<p>- Muốn ho&agrave;n tất đơn h&agrave;ng nhấn v&agrave;o giỏ h&agrave;ng g&oacute;c tr&ecirc;n b&ecirc;n phải m&agrave;n h&igrave;nh tiến h&agrave;nh thanh to&aacute;n</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Rabity - Thương hiệu thời trang trẻ em h&agrave;ng đầu Việt Nam, với hệ thống 80 cửa h&agrave;ng to&agrave;n quốc, c&oacute; mặt tại nhiều hệ thống si&ecirc;u thị lớn Vincom, Lotte, Aeon mall,&hellip; v&agrave; kinh nghiệm 20 năm theo đuổi mục ti&ecirc;u mang tới những sản phẩm từ chất liệu thi&ecirc;n nhi&ecirc;n an to&agrave;n, thoải m&aacute;i, gi&uacute;p trẻ tự do vận động, kh&aacute;m ph&aacute; thế giới. Rabity cũng l&agrave; đơn vị thời trang duy nhất tại VN đồng sở hữu bản quyền từ tập đo&agrave;n giải tr&iacute; Disney v&agrave; biểu tượng thời trang Ph&aacute;p - Elle</p>', '<p>Th&ocirc;ng tin sản phẩm</p>\r\n\r\n<p>- Chất liệu sản phẩm: Chất liệu chủ đạo l&agrave; cotton, được sản xuất từ sợi b&ocirc;ng thi&ecirc;n nhi&ecirc;n - một trong những loại cotton an to&agrave;n được c&aacute;c mẹ bỉm ưa chuộng nhất</p>\r\n\r\n<p>- K&iacute;ch thước: theo bảng size</p>', 229000, 0, 1, '2022-11-20 12:10:34', '2022-11-20 12:10:34'),
(45, 7, 1, 220, 'Váy bé gái tay cánh dơi MNG20DR009 - Lovekids', 'vay-be-gai-tay-canh-doi-mng20dr009-lovekids', '<p>* M&Ocirc; TẢ SẢN PHẨM<br />\r\n- Sản phẩm được thiết kế v&agrave; sản xuất độc quyền bởi Lovekids JSC.<br />\r\n- L&agrave; một trong những sản phẩm thuộc brand mới MINIU.<br />\r\n- Sản phẩm l&agrave; v&aacute;y đ&ocirc;i d&agrave;nh cho mẹ v&agrave; b&eacute;.<br />\r\n- Hệ size b&eacute; từ 4 tuổi đến 10 tuổi, v&aacute;y mẹ gồm 3 size: XS, S, M.<br />\r\n- Chất liệu vải mango mềm mại, d&agrave;y dặn.<br />\r\n- Kiểu d&aacute;ng thời trang, m&agrave;u sắc nổi bật.</p>\r\n\r\n<p>* HƯỚNG DẪN BẢO QUẢN<br />\r\nGiặt tay hoặc giặt bằng m&aacute;y kh&ocirc;ng qu&aacute; 30 độ C.<br />\r\nL&agrave; ở nhiệt độ thường.<br />\r\nKh&ocirc;ng giặt chung đồ bị phai m&agrave;u.<br />\r\nKh&ocirc;ng ng&acirc;m sản phẩm qu&aacute; 30 ph&uacute;t với x&agrave; ph&ograve;ng giặt.<br />\r\nKh&ocirc;ng sử dụng chất tẩy mạnh.</p>\r\n\r\n<p>* CHÍNH SÁCH ĐỔI SẢN PHẨM<br />\r\nThời gian đổi sản phẩm: Trong v&ograve;ng 7 ng&agrave;y theo qui định của ShopeeMall.<br />\r\nMỗi đơn h&agrave;ng được đổi tối đa 01 lần.<br />\r\nSản phẩm phải c&ograve;n nguy&ecirc;n m&aacute;c, chưa qua sử dụng, giặt tẩy, kh&ocirc;ng bị dơ, bẩn hoặc bị hư hỏng bởi c&aacute;c t&aacute;c nh&acirc;n b&ecirc;n ngo&agrave;i.<br />\r\nKh&ocirc;ng &aacute;p dụng đổi h&agrave;ng đối với sản phẩm mua trong chương tr&igrave;nh khuyến mại (Trừ trường hợp lỗi do sản phẩm)<br />\r\nĐể lựa chọn sản phẩm vừa vặn với b&eacute;, c&aacute;c mẹ c&oacute; thể tham khảo bảng size hoặc gửi tin nhắn ngay cho Lovekids để nhận được hỗ trợ nh&eacute;!</p>', '<p>* M&Ocirc; TẢ SẢN PHẨM<br />\r\n- Sản phẩm được thiết kế v&agrave; sản xuất độc quyền bởi Lovekids JSC.<br />\r\n- L&agrave; một trong những sản phẩm thuộc brand mới MINIU.<br />\r\n- Sản phẩm l&agrave; v&aacute;y đ&ocirc;i d&agrave;nh cho mẹ v&agrave; b&eacute;.<br />\r\n- Hệ size b&eacute; từ 4 tuổi đến 10 tuổi, v&aacute;y mẹ gồm 3 size: XS, S, M.<br />\r\n- Chất liệu vải mango mềm mại, d&agrave;y dặn.<br />\r\n- Kiểu d&aacute;ng thời trang, m&agrave;u sắc nổi bật.</p>', 699000, 0, 1, '2022-11-20 12:13:27', '2022-11-20 12:13:27'),
(46, 3, 1, 252, 'Áo khoác cardigan bé trai - Lovekids', 'ao-khoac-cardigan-be-trai-lovekids', '<p>* M&Ocirc; TẢ SẢN PHẨM</p>\r\n\r\n<p>- Sản xuất tại Việt Nam.</p>\r\n\r\n<p>- Hệ size từ 7 đến 12 tuổi.</p>\r\n\r\n<p>- Mẫu &aacute;o kho&aacute;c cardigan b&eacute; trai chất liệu vải len mang đến cho b&eacute; cảm gi&aacute;c ấm &aacute;p suốt cả ng&agrave;y.D&aacute;ng &aacute;o thời trang dễ d&agrave;ng kết hợp với nhiều loại trang phục.</p>\r\n\r\n<p>* HƯỚNG DẪN BẢO QUẢN</p>\r\n\r\n<p>Giặt tay hoặc giặt bằng m&aacute;y kh&ocirc;ng qu&aacute; 30 độ C.</p>\r\n\r\n<p>L&agrave; ở nhiệt độ thường.</p>\r\n\r\n<p>Kh&ocirc;ng giặt chung đồ bị phai m&agrave;u.</p>\r\n\r\n<p>Kh&ocirc;ng ng&acirc;m sản phẩm qu&aacute; 30 ph&uacute;t với x&agrave; ph&ograve;ng giặt.</p>\r\n\r\n<p>Kh&ocirc;ng sử dụng chất tẩy mạnh.</p>\r\n\r\n<p>* CH&Iacute;NH S&Aacute;CH ĐỔI SẢN PHẨM</p>\r\n\r\n<p>Thời gian đổi sản phẩm: Theo qui định đổi trả của ShopeeMall.</p>\r\n\r\n<p>Để lựa chọn sản phẩm vừa vặn với b&eacute;, c&aacute;c mẹ c&oacute; thể tham khảo bảng size hoặc gửi tin nhắn ngay cho Lovekids để nhận được hỗ trợ nh&eacute;.</p>', '<p>* M&Ocirc; TẢ SẢN PHẨM</p>\r\n\r\n<p>- Sản xuất tại Việt Nam.</p>\r\n\r\n<p>- Hệ size từ 7 đến 12 tuổi.</p>\r\n\r\n<p>- Mẫu &aacute;o kho&aacute;c cardigan b&eacute; trai chất liệu vải len mang đến cho b&eacute; cảm gi&aacute;c ấm &aacute;p suốt cả ng&agrave;y.D&aacute;ng &aacute;o thời trang dễ d&agrave;ng kết hợp với nhiều loại trang phục.</p>', 329000, 0, 1, '2022-11-20 12:15:25', '2022-11-20 12:15:25'),
(47, 2, 1, 142, 'Áo blouse dài tay hoa nhí - Lovekids', 'ao-blouse-dai-tay-hoa-nhi-lovekids', '<p>* M&Ocirc; TẢ SẢN PHẨM</p>\r\n\r\n<p>- Sản xuất tại Việt Nam.</p>\r\n\r\n<p>- Hệ size từ 6 đến 12 tuổi.</p>\r\n\r\n<p>- Mẫu &aacute;o d&agrave;i tay họa tiết hoa nh&iacute; dễ d&agrave;ng kết hợp với nhiều loại trang phục.</p>\r\n\r\n<p>* HƯỚNG DẪN BẢO QUẢN</p>\r\n\r\n<p>Giặt tay hoặc giặt bằng m&aacute;y kh&ocirc;ng qu&aacute; 30 độ C.</p>\r\n\r\n<p>L&agrave; ở nhiệt độ thường.</p>\r\n\r\n<p>Kh&ocirc;ng giặt chung đồ bị phai m&agrave;u.</p>\r\n\r\n<p>Kh&ocirc;ng ng&acirc;m sản phẩm qu&aacute; 30 ph&uacute;t với x&agrave; ph&ograve;ng giặt.</p>\r\n\r\n<p>Kh&ocirc;ng sử dụng chất tẩy mạnh.</p>\r\n\r\n<p>* CH&Iacute;NH S&Aacute;CH ĐỔI SẢN PHẨM</p>\r\n\r\n<p>Thời gian đổi sản phẩm: Theo qui định đổi trả của ShopeeMall.</p>\r\n\r\n<p>Để lựa chọn sản phẩm vừa vặn với b&eacute;, c&aacute;c mẹ c&oacute; thể tham khảo bảng size hoặc gửi tin nhắn ngay cho Lovekids để nhận được hỗ trợ nh&eacute;.</p>', '<p>* M&Ocirc; TẢ SẢN PHẨM</p>\r\n\r\n<p>- Sản xuất tại Việt Nam.</p>\r\n\r\n<p>- Hệ size từ 6 đến 12 tuổi.</p>\r\n\r\n<p>- Mẫu &aacute;o d&agrave;i tay họa tiết hoa nh&iacute; dễ d&agrave;ng kết hợp với nhiều loại trang phục.</p>', 269000, 0, 1, '2022-11-20 12:17:15', '2022-11-20 12:17:15'),
(48, 1, 1, 270, 'Quần nhung bé trai phối sọc - Lovekids', 'quan-nhung-be-trai-phoi-soc-lovekids', '<p>* M&Ocirc; TẢ SẢN PHẨM:</p>\r\n\r\n<p>- Sản phẩm được thiết kế v&agrave; sản xuất độc quyền bởi Lovekids JSC.</p>\r\n\r\n<p>- Hệ size từ 4 đến 10 tuổi</p>\r\n\r\n<p>- Chất liệu vải nhung ấm &aacute;p,d&aacute;ng quần ống đứng phong c&aacute;ch,dễ d&agrave;ng kết hợp với nhiều loại trang phục.</p>\r\n\r\n<p>* HƯỚNG DẪN BẢO QUẢN</p>\r\n\r\n<p>Sản phẩm gốc tự nhi&ecirc;n khuyến kh&iacute;ch Giặt tay.</p>\r\n\r\n<p>L&agrave; ở nhiệt độ thường.</p>\r\n\r\n<p>Kh&ocirc;ng giặt chung đồ bị phai m&agrave;u.</p>\r\n\r\n<p>Kh&ocirc;ng ng&acirc;m sản phẩm qu&aacute; 30 ph&uacute;t với x&agrave; ph&ograve;ng giặt.</p>\r\n\r\n<p>Kh&ocirc;ng sử dụng chất tẩy mạnh.</p>\r\n\r\n<p>* CH&Iacute;NH S&Aacute;CH ĐỔI SẢN PHẨM</p>\r\n\r\n<p>Thời gian đổi sản phẩm: Kh&aacute;ch h&agrave;ng c&oacute; thể đổi trả sản phẩm theo qui định của ShopeeMall hoặc c&oacute; thể đổi trả &nbsp;qua hệ thống cửa h&agrave;ng của Lovekids Store.</p>\r\n\r\n<p>Mỗi đơn h&agrave;ng được đổi trả tối đa 1 lần.</p>\r\n\r\n<p>Sản phẩm phải c&ograve;n nguy&ecirc;n m&aacute;c, chưa qua sử dụng, giặt tẩy, kh&ocirc;ng bị dơ, bẩn hoặc bị hư hỏng bởi c&aacute;c t&aacute;c nh&acirc;n b&ecirc;n ngo&agrave;i.</p>\r\n\r\n<p>Để lựa chọn sản phẩm vừa vặn với b&eacute;, c&aacute;c mẹ c&oacute; thể tham khảo bảng size hoặc gửi tin nhắn ngay cho Lovekids để nhận được hỗ trợ nh&eacute;.</p>', '<p>* M&Ocirc; TẢ SẢN PHẨM:</p>\r\n\r\n<p>- Sản phẩm được thiết kế v&agrave; sản xuất độc quyền bởi Lovekids JSC.</p>\r\n\r\n<p>- Hệ size từ 4 đến 10 tuổi</p>\r\n\r\n<p>- Chất liệu vải nhung ấm &aacute;p,d&aacute;ng quần ống đứng phong c&aacute;ch,dễ d&agrave;ng kết hợp với nhiều loại trang phục.</p>', 259000, 0, 1, '2022-11-20 12:18:41', '2022-11-20 12:18:41'),
(49, 1, 3, 269, 'Quần đùi cho bé trai ILABY thoáng mát mùa hè', 'quan-dui-cho-be-trai-ilaby-thoang-mat-mua-he', '<p>ILaby - Nơi thi&ecirc;n thần tỏa s&aacute;ng - Quần đ&ugrave;i cho b&eacute; trai ILABY tho&aacute;ng m&aacute;t m&ugrave;a h&egrave;<br />\r\nTại sao lại chọn đồ của ILaby:<br />\r\n- Sản phẩm được thiết kế độc quyền bởi thương hiệu ILABY<br />\r\n- Chất liệu an to&agrave;n l&agrave;n da b&eacute;<br />\r\n- &nbsp;Mẫu m&atilde; đa dạng, đa năng: mặc đi chơi, đi tiệc, đi học đều được<br />\r\n-----------<br />\r\n🔶 TH&Ocirc;NG TIN SẢN PHẨM<br />\r\nThương hiệu: ILABY<br />\r\nXuất xứ: Việt Nam<br />\r\nM&atilde; sản phẩm:30IB00200321<br />\r\nM&agrave;u sắc: Đỏ n&acirc;u, Be nhạt, Trắng, V&agrave;ng n&acirc;u<br />\r\nChất liệu sử dụng: [chất liệu sản phẩm]</p>\r\n\r\n<p>🔶 ILaby Kids cam kết</p>\r\n\r\n<p>- Sản phẩm 100% giống m&ocirc; tả.&nbsp;<br />\r\n- Chất vải được qua chọn lọc, đảm bảo chất lượng 100%<br />\r\n- H&igrave;nh ảnh sản phẩm l&agrave; ảnh thật do ILaby tự chụp v&agrave; giữ bản quyền h&igrave;nh ảnh<br />\r\n- Đổi h&agrave;ng, ho&agrave;n tiền nếu sản phẩm kh&ocirc;ng giống với m&ocirc; tả<br />\r\n- Hỗ trợ đổi trả theo quy định của shopee<br />\r\n- Qu&yacute; kh&aacute;ch vui l&ograve;ng quay lại video l&uacute;c b&oacute;c h&agrave;ng v&agrave; giữ nguy&ecirc;n tem m&aacute;c để tr&aacute;nh trường hợp đơn vị vận chuyển l&agrave;m mất h&agrave;ng hoặc h&agrave;ng c&oacute; vấn đề từ nh&agrave; sản xuất.</p>\r\n\r\n<p>🔶 CH&Iacute;NH S&Aacute;CH ĐỔI TRẢ ILABY<br />\r\n- Điều kiện &aacute;p dụng (trong v&ograve;ng 07 ng&agrave;y kể từ khi nhận sản phẩm)&nbsp;<br />\r\n- Qu&yacute; kh&aacute;ch vui l&ograve;ng quay lại video l&uacute;c b&oacute;c h&agrave;ng v&agrave; giữ nguy&ecirc;n tem m&aacute;c để tr&aacute;nh trường hợp đơn vị vận chuyển l&agrave;m mất h&agrave;ng hoặc h&agrave;ng c&oacute; vấn đề từ nh&agrave; sản xuất.<br />\r\n- Sản phẩm đổi trả phải c&ograve;n nguy&ecirc;n tem, nh&atilde;n, bao b&igrave;, chưa qua sử dụng giặt tẩy, nguy&ecirc;n vẹn như ban đầu Shop giao<br />\r\n- Sản phẩm lỗi kỹ thuật được đổi mới<br />\r\nDo m&agrave;n h&igrave;nh v&agrave; điều kiện &aacute;nh s&aacute;ng kh&aacute;c nhau, m&agrave;u sắc thực tế của sản phẩm c&oacute; thể ch&ecirc;nh lệch khoảng 3-5%</p>\r\n\r\n<p>🔶 LƯU &Yacute;<br />\r\n- Qu&yacute; kh&aacute;ch nhận được h&agrave;ng nếu c&oacute; thắc mắc vui l&ograve;ng inbox shop.<br />\r\n- Kh&aacute;ch y&ecirc;u đặt h&agrave;ng vui l&ograve;ng ghi ch&uacute; hoặc ib số c&acirc;n nặng v&agrave; tuổi của b&eacute; để shop giao h&agrave;ng chuẩn size cho b&eacute; nh&eacute;.&nbsp;<br />\r\nCh&uacute;c qu&yacute; kh&aacute;ch mua sắm vui vẻ!</p>', '<p>🔶 TH&Ocirc;NG TIN SẢN PHẨM<br />\r\nThương hiệu: ILABY<br />\r\nXuất xứ: Việt Nam<br />\r\nM&atilde; sản phẩm:30IB00200321<br />\r\nM&agrave;u sắc: Đỏ n&acirc;u, Be nhạt, Trắng, V&agrave;ng n&acirc;u<br />\r\nChất liệu sử dụng: [chất liệu sản phẩm]</p>', 150000, 0, 1, '2022-11-20 12:21:43', '2022-11-20 12:21:43'),
(50, 1, 3, 202, 'Quần short bé trai ILABY phối túi gió chất liệu kaki', 'quan-short-be-trai-ilaby-phoi-tui-gio-chat-lieu-kaki', '<p>ILaby - Nơi thi&ecirc;n thần tỏa s&aacute;ng - Quần short b&eacute; trai ILABY phối t&uacute;i gi&oacute; chất liệu kaki</p>\r\n\r\n<p>Tại sao lại chọn đồ của ILaby:</p>\r\n\r\n<p>- Sản phẩm được thiết kế độc quyền bởi thương hiệu ILABY</p>\r\n\r\n<p>- Chất liệu an to&agrave;n l&agrave;n da b&eacute;</p>\r\n\r\n<p>- &nbsp;Mẫu m&atilde; đa dạng, đa năng: mặc đi chơi, đi tiệc, đi học đều được</p>\r\n\r\n<p>-----------</p>\r\n\r\n<p>🔶 TH&Ocirc;NG TIN SẢN PHẨM</p>\r\n\r\n<p>Thương hiệu: ILABY</p>\r\n\r\n<p>Xuất xứ: Việt Nam</p>\r\n\r\n<p>M&atilde; sản phẩm: 30IB09670622</p>\r\n\r\n<p>M&agrave;u sắc: Be - ghi</p>\r\n\r\n<p>Chất liệu sử dụng: Kaki</p>\r\n\r\n<p>🔶 ILaby Kids cam kết</p>\r\n\r\n<p>- Sản phẩm 100% giống m&ocirc; tả.&nbsp;</p>\r\n\r\n<p>- Chất vải được qua chọn lọc, đảm bảo chất lượng 100%</p>\r\n\r\n<p>- H&igrave;nh ảnh sản phẩm l&agrave; ảnh thật do ILaby tự chụp v&agrave; giữ bản quyền h&igrave;nh ảnh</p>\r\n\r\n<p>- Đổi h&agrave;ng, ho&agrave;n tiền nếu sản phẩm kh&ocirc;ng giống với m&ocirc; tả</p>\r\n\r\n<p>- Hỗ trợ đổi trả theo quy định của shopee</p>\r\n\r\n<p>- Qu&yacute; kh&aacute;ch vui l&ograve;ng quay lại video l&uacute;c b&oacute;c h&agrave;ng v&agrave; giữ nguy&ecirc;n tem m&aacute;c để tr&aacute;nh trường hợp đơn vị vận chuyển l&agrave;m mất h&agrave;ng hoặc h&agrave;ng c&oacute; vấn đề từ nh&agrave; sản xuất.</p>\r\n\r\n<p>🔶 CH&Iacute;NH S&Aacute;CH ĐỔI TRẢ ILABY</p>\r\n\r\n<p>- Điều kiện &aacute;p dụng (trong v&ograve;ng 07 ng&agrave;y kể từ khi nhận sản phẩm)&nbsp;</p>\r\n\r\n<p>- Qu&yacute; kh&aacute;ch vui l&ograve;ng quay lại video l&uacute;c b&oacute;c h&agrave;ng v&agrave; giữ nguy&ecirc;n tem m&aacute;c để tr&aacute;nh trường hợp đơn vị vận chuyển l&agrave;m mất h&agrave;ng hoặc h&agrave;ng c&oacute; vấn đề từ nh&agrave; sản xuất.</p>\r\n\r\n<p>- Sản phẩm đổi trả phải c&ograve;n nguy&ecirc;n tem, nh&atilde;n, bao b&igrave;, chưa qua sử dụng giặt tẩy, nguy&ecirc;n vẹn như ban đầu Shop giao</p>\r\n\r\n<p>- Sản phẩm lỗi kỹ thuật được đổi mới</p>\r\n\r\n<p>Do m&agrave;n h&igrave;nh v&agrave; điều kiện &aacute;nh s&aacute;ng kh&aacute;c nhau, m&agrave;u sắc thực tế của sản phẩm c&oacute; thể ch&ecirc;nh lệch khoảng 3-5%</p>\r\n\r\n<p>🔶 LƯU &Yacute;</p>\r\n\r\n<p>- Qu&yacute; kh&aacute;ch nhận được h&agrave;ng nếu c&oacute; thắc mắc vui l&ograve;ng inbox shop.</p>\r\n\r\n<p>- Kh&aacute;ch y&ecirc;u đặt h&agrave;ng vui l&ograve;ng ghi ch&uacute; hoặc ib số c&acirc;n nặng v&agrave; tuổi của b&eacute; để shop giao h&agrave;ng chuẩn size cho b&eacute; nh&eacute;.&nbsp;</p>\r\n\r\n<p>Ch&uacute;c qu&yacute; kh&aacute;ch mua sắm vui vẻ!</p>', '<p>-----------</p>\r\n\r\n<p>🔶 TH&Ocirc;NG TIN SẢN PHẨM</p>\r\n\r\n<p>Thương hiệu: ILABY</p>\r\n\r\n<p>Xuất xứ: Việt Nam</p>\r\n\r\n<p>M&atilde; sản phẩm: 30IB09670622</p>\r\n\r\n<p>M&agrave;u sắc: Be - ghi</p>\r\n\r\n<p>Chất liệu sử dụng: Kaki</p>', 179000, 0, 1, '2022-11-20 12:23:51', '2022-11-20 12:23:51'),
(51, 1, 3, 266, 'Quần dài bé trai ILABY can vải xoay canh chất nhung tăm to', 'quan-dai-be-trai-ilaby-can-vai-xoay-canh-chat-nhung-tam-to', '<p>ILaby - Nơi thi&ecirc;n thần tỏa s&aacute;ng - Quần d&agrave;i b&eacute; trai ILABY can vải xoay canh chất nhung tăm to&nbsp;</p>\r\n\r\n<p>Tại sao lại chọn đồ của ILaby:</p>\r\n\r\n<p>- Sản phẩm được thiết kế độc quyền bởi thương hiệu ILABY</p>\r\n\r\n<p>- Chất liệu an to&agrave;n l&agrave;n da b&eacute;</p>\r\n\r\n<p>- &nbsp;Mẫu m&atilde; đa dạng, đa năng: mặc đi chơi, đi tiệc, đi học đều được</p>\r\n\r\n<p>-----------</p>\r\n\r\n<p>🔶 TH&Ocirc;NG TIN SẢN PHẨM</p>\r\n\r\n<p>Thương hiệu: ILABY</p>\r\n\r\n<p>Xuất xứ: Việt Nam</p>\r\n\r\n<p>M&atilde; sản phẩm: 30IB1326I2DL</p>\r\n\r\n<p>M&agrave;u sắc: đen - ghi - n&acirc;u</p>\r\n\r\n<p>Chất liệu sử dụng: nhung tăm</p>\r\n\r\n<p>🔶 ILaby Kids cam kết</p>\r\n\r\n<p>- Sản phẩm 100% giống m&ocirc; tả.&nbsp;</p>\r\n\r\n<p>- Chất vải được qua chọn lọc, đảm bảo chất lượng 100%</p>\r\n\r\n<p>- H&igrave;nh ảnh sản phẩm l&agrave; ảnh thật do ILaby tự chụp v&agrave; giữ bản quyền h&igrave;nh ảnh</p>\r\n\r\n<p>- Đổi h&agrave;ng, ho&agrave;n tiền nếu sản phẩm kh&ocirc;ng giống với m&ocirc; tả</p>\r\n\r\n<p>- Hỗ trợ đổi trả theo quy định của shopee</p>\r\n\r\n<p>- Qu&yacute; kh&aacute;ch vui l&ograve;ng quay lại video l&uacute;c b&oacute;c h&agrave;ng v&agrave; giữ nguy&ecirc;n tem m&aacute;c để tr&aacute;nh trường hợp đơn vị vận chuyển l&agrave;m mất h&agrave;ng hoặc h&agrave;ng c&oacute; vấn đề từ nh&agrave; sản xuất.</p>\r\n\r\n<p>🔶 CH&Iacute;NH S&Aacute;CH ĐỔI TRẢ ILABY</p>\r\n\r\n<p>- Điều kiện &aacute;p dụng (trong v&ograve;ng 07 ng&agrave;y kể từ khi nhận sản phẩm)&nbsp;</p>\r\n\r\n<p>- Qu&yacute; kh&aacute;ch vui l&ograve;ng quay lại video l&uacute;c b&oacute;c h&agrave;ng v&agrave; giữ nguy&ecirc;n tem m&aacute;c để tr&aacute;nh trường hợp đơn vị vận chuyển l&agrave;m mất h&agrave;ng hoặc h&agrave;ng c&oacute; vấn đề từ nh&agrave; sản xuất.</p>\r\n\r\n<p>- Sản phẩm đổi trả phải c&ograve;n nguy&ecirc;n tem, nh&atilde;n, bao b&igrave;, chưa qua sử dụng giặt tẩy, nguy&ecirc;n vẹn như ban đầu Shop giao</p>\r\n\r\n<p>- Sản phẩm lỗi kỹ thuật được đổi mới</p>\r\n\r\n<p>Do m&agrave;n h&igrave;nh v&agrave; điều kiện &aacute;nh s&aacute;ng kh&aacute;c nhau, m&agrave;u sắc thực tế của sản phẩm c&oacute; thể ch&ecirc;nh lệch khoảng 3-5%</p>\r\n\r\n<p>🔶 LƯU &Yacute;</p>\r\n\r\n<p>- Qu&yacute; kh&aacute;ch nhận được h&agrave;ng nếu c&oacute; thắc mắc vui l&ograve;ng inbox shop.</p>\r\n\r\n<p>- Kh&aacute;ch y&ecirc;u đặt h&agrave;ng vui l&ograve;ng ghi ch&uacute; hoặc ib số c&acirc;n nặng v&agrave; tuổi của b&eacute; để shop giao h&agrave;ng chuẩn size cho b&eacute; nh&eacute;.&nbsp;</p>\r\n\r\n<p>Ch&uacute;c qu&yacute; kh&aacute;ch mua sắm vui vẻ!</p>', '<p>🔶 TH&Ocirc;NG TIN SẢN PHẨM</p>\r\n\r\n<p>Thương hiệu: ILABY</p>\r\n\r\n<p>Xuất xứ: Việt Nam</p>\r\n\r\n<p>M&atilde; sản phẩm: 30IB1326I2DL</p>\r\n\r\n<p>M&agrave;u sắc: đen - ghi - n&acirc;u</p>\r\n\r\n<p>Chất liệu sử dụng: nhung tăm</p>\r\n\r\n<p>🔶 ILaby Kids cam kết</p>', 219000, 0, 1, '2022-11-20 12:25:38', '2022-11-20 12:25:38'),
(52, 4, 3, 247, 'Bờm bé gái ILABY chất liệu nhựa nơ vải gấm', 'bom-be-gai-ilaby-chat-lieu-nhua-no-vai-gam', '<p>🔶 ILaby Kids cam kết</p>\r\n\r\n<p>- Sản phẩm 100% giống m&ocirc; tả.&nbsp;</p>\r\n\r\n<p>- Chất vải được qua chọn lọc, đảm bảo chất lượng 100%</p>\r\n\r\n<p>- H&igrave;nh ảnh sản phẩm l&agrave; ảnh thật do ILaby tự chụp v&agrave; giữ bản quyền h&igrave;nh ảnh</p>\r\n\r\n<p>- Đổi h&agrave;ng, ho&agrave;n tiền nếu sản phẩm kh&ocirc;ng giống với m&ocirc; tả</p>\r\n\r\n<p>- Hỗ trợ đổi trả theo quy định của shopee</p>\r\n\r\n<p>- Qu&yacute; kh&aacute;ch vui l&ograve;ng quay lại video l&uacute;c b&oacute;c h&agrave;ng v&agrave; giữ nguy&ecirc;n tem m&aacute;c để tr&aacute;nh trường hợp đơn vị vận chuyển l&agrave;m mất h&agrave;ng hoặc h&agrave;ng c&oacute; vấn đề từ nh&agrave; sản xuất.</p>\r\n\r\n<p>🔶 CH&Iacute;NH S&Aacute;CH ĐỔI TRẢ ILABY</p>\r\n\r\n<p>- Điều kiện &aacute;p dụng (trong v&ograve;ng 07 ng&agrave;y kể từ khi nhận sản phẩm)&nbsp;</p>\r\n\r\n<p>- Qu&yacute; kh&aacute;ch vui l&ograve;ng quay lại video l&uacute;c b&oacute;c h&agrave;ng v&agrave; giữ nguy&ecirc;n tem m&aacute;c để tr&aacute;nh trường hợp đơn vị vận chuyển l&agrave;m mất h&agrave;ng hoặc h&agrave;ng c&oacute; vấn đề từ nh&agrave; sản xuất.</p>\r\n\r\n<p>- Sản phẩm đổi trả phải c&ograve;n nguy&ecirc;n tem, nh&atilde;n, bao b&igrave;, chưa qua sử dụng giặt tẩy, nguy&ecirc;n vẹn như ban đầu Shop giao</p>\r\n\r\n<p>- Sản phẩm lỗi kỹ thuật được đổi mới</p>\r\n\r\n<p>Do m&agrave;n h&igrave;nh v&agrave; điều kiện &aacute;nh s&aacute;ng kh&aacute;c nhau, m&agrave;u sắc thực tế của sản phẩm c&oacute; thể ch&ecirc;nh lệch khoảng 3-5%</p>\r\n\r\n<p>🔶 LƯU &Yacute;</p>\r\n\r\n<p>- Qu&yacute; kh&aacute;ch nhận được h&agrave;ng nếu c&oacute; thắc mắc vui l&ograve;ng inbox shop.</p>\r\n\r\n<p>- Kh&aacute;ch y&ecirc;u đặt h&agrave;ng vui l&ograve;ng ghi ch&uacute; hoặc ib số c&acirc;n nặng v&agrave; tuổi của b&eacute; để shop giao h&agrave;ng chuẩn size cho b&eacute; nh&eacute;.&nbsp;</p>\r\n\r\n<p>Ch&uacute;c qu&yacute; kh&aacute;ch mua sắm vui vẻ!</p>', '<p>🔶 ILaby Kids cam kết</p>\r\n\r\n<p>- Sản phẩm 100% giống m&ocirc; tả.&nbsp;</p>\r\n\r\n<p>- Chất vải được qua chọn lọc, đảm bảo chất lượng 100%</p>\r\n\r\n<p>- H&igrave;nh ảnh sản phẩm l&agrave; ảnh thật do ILaby tự chụp v&agrave; giữ bản quyền h&igrave;nh ảnh</p>\r\n\r\n<p>- Đổi h&agrave;ng, ho&agrave;n tiền nếu sản phẩm kh&ocirc;ng giống với m&ocirc; tả</p>\r\n\r\n<p>- Hỗ trợ đổi trả theo quy định của shopee</p>\r\n\r\n<p>- Qu&yacute; kh&aacute;ch vui l&ograve;ng quay lại video l&uacute;c b&oacute;c h&agrave;ng v&agrave; giữ nguy&ecirc;n tem m&aacute;c để tr&aacute;nh trường hợp đơn vị vận chuyển l&agrave;m mất h&agrave;ng hoặc h&agrave;ng c&oacute; vấn đề từ nh&agrave; sản xuất.</p>', 29000, 0, 1, '2022-11-20 12:28:23', '2022-11-20 12:28:23'),
(53, 7, 3, 240, 'Váy công chúa bé gái ILABY ba tầng có nơ lưng chất liệu gấm cao cấp', 'vay-cong-chua-be-gai-ilaby-ba-tang-co-no-lung-chat-lieu-gam-cao-cap', '<p>ILaby - Nơi thi&ecirc;n thần tỏa s&aacute;ng - V&aacute;y c&ocirc;ng ch&uacute;a b&eacute; g&aacute;i ILABY ba tầng c&oacute; nơ lưng chất liệu gấm cao cấp</p>\r\n\r\n<p>Tại sao lại chọn đồ của ILaby:</p>\r\n\r\n<p>- Sản phẩm được thiết kế độc quyền bởi thương hiệu ILABY</p>\r\n\r\n<p>- Chất liệu an to&agrave;n l&agrave;n da b&eacute;</p>\r\n\r\n<p>- &nbsp;Mẫu m&atilde; đa dạng, đa năng: mặc đi chơi, đi tiệc, đi học đều được</p>\r\n\r\n<p>-----------</p>\r\n\r\n<p>🔶 TH&Ocirc;NG TIN SẢN PHẨM</p>\r\n\r\n<p>Thương hiệu: ILABY</p>\r\n\r\n<p>Xuất xứ: Việt Nam</p>\r\n\r\n<p>M&atilde; sản phẩm: 12IL1286K2PT</p>\r\n\r\n<p>M&agrave;u sắc: đỏ - be</p>\r\n\r\n<p>Chất liệu sử dụng: gấm cao cấp</p>\r\n\r\n<p>🔶 ILaby Kids cam kết</p>\r\n\r\n<p>- Sản phẩm 100% giống m&ocirc; tả.&nbsp;</p>\r\n\r\n<p>- Chất vải được qua chọn lọc, đảm bảo chất lượng 100%</p>\r\n\r\n<p>- H&igrave;nh ảnh sản phẩm l&agrave; ảnh thật do ILaby tự chụp v&agrave; giữ bản quyền h&igrave;nh ảnh</p>\r\n\r\n<p>- Đổi h&agrave;ng, ho&agrave;n tiền nếu sản phẩm kh&ocirc;ng giống với m&ocirc; tả</p>\r\n\r\n<p>- Hỗ trợ đổi trả theo quy định của shopee</p>\r\n\r\n<p>- Qu&yacute; kh&aacute;ch vui l&ograve;ng quay lại video l&uacute;c b&oacute;c h&agrave;ng v&agrave; giữ nguy&ecirc;n tem m&aacute;c để tr&aacute;nh trường hợp đơn vị vận chuyển l&agrave;m mất h&agrave;ng hoặc h&agrave;ng c&oacute; vấn đề từ nh&agrave; sản xuất.</p>\r\n\r\n<p>🔶 CH&Iacute;NH S&Aacute;CH ĐỔI TRẢ ILABY</p>\r\n\r\n<p>- Điều kiện &aacute;p dụng (trong v&ograve;ng 07 ng&agrave;y kể từ khi nhận sản phẩm)&nbsp;</p>\r\n\r\n<p>- Qu&yacute; kh&aacute;ch vui l&ograve;ng quay lại video l&uacute;c b&oacute;c h&agrave;ng v&agrave; giữ nguy&ecirc;n tem m&aacute;c để tr&aacute;nh trường hợp đơn vị vận chuyển l&agrave;m mất h&agrave;ng hoặc h&agrave;ng c&oacute; vấn đề từ nh&agrave; sản xuất.</p>\r\n\r\n<p>- Sản phẩm đổi trả phải c&ograve;n nguy&ecirc;n tem, nh&atilde;n, bao b&igrave;, chưa qua sử dụng giặt tẩy, nguy&ecirc;n vẹn như ban đầu Shop giao</p>\r\n\r\n<p>- Sản phẩm lỗi kỹ thuật được đổi mới</p>\r\n\r\n<p>Do m&agrave;n h&igrave;nh v&agrave; điều kiện &aacute;nh s&aacute;ng kh&aacute;c nhau, m&agrave;u sắc thực tế của sản phẩm c&oacute; thể ch&ecirc;nh lệch khoảng 3-5%</p>\r\n\r\n<p>🔶 LƯU &Yacute;</p>\r\n\r\n<p>- Qu&yacute; kh&aacute;ch nhận được h&agrave;ng nếu c&oacute; thắc mắc vui l&ograve;ng inbox shop.</p>\r\n\r\n<p>- Kh&aacute;ch y&ecirc;u đặt h&agrave;ng vui l&ograve;ng ghi ch&uacute; hoặc ib số c&acirc;n nặng v&agrave; tuổi của b&eacute; để shop giao h&agrave;ng chuẩn size cho b&eacute; nh&eacute;.&nbsp;</p>\r\n\r\n<p>Ch&uacute;c qu&yacute; kh&aacute;ch mua sắm vui vẻ!</p>', '<p>🔶 TH&Ocirc;NG TIN SẢN PHẨM</p>\r\n\r\n<p>Thương hiệu: ILABY</p>\r\n\r\n<p>Xuất xứ: Việt Nam</p>\r\n\r\n<p>M&atilde; sản phẩm: 12IL1286K2PT</p>\r\n\r\n<p>M&agrave;u sắc: đỏ - be</p>\r\n\r\n<p>Chất liệu sử dụng: gấm cao cấp</p>', 479000, 0, 1, '2022-11-20 12:30:31', '2022-11-20 12:30:31'),
(54, 7, 3, 354, 'Váy công chúa bé gái ILABY cánh tiên đuôi cá hai tầng chất liệu tơ kèm lót cao cấp mềm mại làn da bé', 'vay-cong-chua-be-gai-ilaby-canh-tien-duoi-ca-hai-tang-chat-lieu-to-kem-lot-cao-cap-mem-mai-lan-da-be', '<p>ILaby - Nơi thi&ecirc;n thần tỏa s&aacute;ng - V&aacute;y c&ocirc;ng ch&uacute;a b&eacute; g&aacute;i ILABY c&aacute;nh ti&ecirc;n đu&ocirc;i c&aacute; hai tầng chất liệu tơ k&egrave;m l&oacute;t cao cấp mềm mại l&agrave;n da b&eacute;</p>\r\n\r\n<p>Tại sao lại chọn đồ của ILaby:</p>\r\n\r\n<p>- Sản phẩm được thiết kế độc quyền bởi thương hiệu ILABY</p>\r\n\r\n<p>- Chất liệu an to&agrave;n l&agrave;n da b&eacute;</p>\r\n\r\n<p>- &nbsp;Mẫu m&atilde; đa dạng, đa năng: mặc đi chơi, đi tiệc, đi học đều được</p>\r\n\r\n<p>-----------</p>\r\n\r\n<p>🔶 TH&Ocirc;NG TIN SẢN PHẨM</p>\r\n\r\n<p>Thương hiệu: ILABY</p>\r\n\r\n<p>Xuất xứ: Việt Nam</p>\r\n\r\n<p>M&atilde; sản phẩm: 12IL1288K2PT</p>\r\n\r\n<p>M&agrave;u sắc: đỏ - trắng - hồng</p>\r\n\r\n<p>Chất liệu sử dụng: tơ l&oacute;t mềm mại</p>\r\n\r\n<p>🔶 ILaby Kids cam kết</p>\r\n\r\n<p>- Sản phẩm 100% giống m&ocirc; tả.&nbsp;</p>\r\n\r\n<p>- Chất vải được qua chọn lọc, đảm bảo chất lượng 100%</p>\r\n\r\n<p>- H&igrave;nh ảnh sản phẩm l&agrave; ảnh thật do ILaby tự chụp v&agrave; giữ bản quyền h&igrave;nh ảnh</p>\r\n\r\n<p>- Đổi h&agrave;ng, ho&agrave;n tiền nếu sản phẩm kh&ocirc;ng giống với m&ocirc; tả</p>\r\n\r\n<p>- Hỗ trợ đổi trả theo quy định của shopee</p>\r\n\r\n<p>- Qu&yacute; kh&aacute;ch vui l&ograve;ng quay lại video l&uacute;c b&oacute;c h&agrave;ng v&agrave; giữ nguy&ecirc;n tem m&aacute;c để tr&aacute;nh trường hợp đơn vị vận chuyển l&agrave;m mất h&agrave;ng hoặc h&agrave;ng c&oacute; vấn đề từ nh&agrave; sản xuất.</p>\r\n\r\n<p>🔶 CH&Iacute;NH S&Aacute;CH ĐỔI TRẢ ILABY</p>\r\n\r\n<p>- Điều kiện &aacute;p dụng (trong v&ograve;ng 07 ng&agrave;y kể từ khi nhận sản phẩm)&nbsp;</p>\r\n\r\n<p>- Qu&yacute; kh&aacute;ch vui l&ograve;ng quay lại video l&uacute;c b&oacute;c h&agrave;ng v&agrave; giữ nguy&ecirc;n tem m&aacute;c để tr&aacute;nh trường hợp đơn vị vận chuyển l&agrave;m mất h&agrave;ng hoặc h&agrave;ng c&oacute; vấn đề từ nh&agrave; sản xuất.</p>\r\n\r\n<p>- Sản phẩm đổi trả phải c&ograve;n nguy&ecirc;n tem, nh&atilde;n, bao b&igrave;, chưa qua sử dụng giặt tẩy, nguy&ecirc;n vẹn như ban đầu Shop giao</p>\r\n\r\n<p>- Sản phẩm lỗi kỹ thuật được đổi mới</p>\r\n\r\n<p>Do m&agrave;n h&igrave;nh v&agrave; điều kiện &aacute;nh s&aacute;ng kh&aacute;c nhau, m&agrave;u sắc thực tế của sản phẩm c&oacute; thể ch&ecirc;nh lệch khoảng 3-5%</p>\r\n\r\n<p>🔶 LƯU &Yacute;</p>\r\n\r\n<p>- Qu&yacute; kh&aacute;ch nhận được h&agrave;ng nếu c&oacute; thắc mắc vui l&ograve;ng inbox shop.</p>\r\n\r\n<p>- Kh&aacute;ch y&ecirc;u đặt h&agrave;ng vui l&ograve;ng ghi ch&uacute; hoặc ib số c&acirc;n nặng v&agrave; tuổi của b&eacute; để shop giao h&agrave;ng chuẩn size cho b&eacute; nh&eacute;.&nbsp;</p>\r\n\r\n<p>Ch&uacute;c qu&yacute; kh&aacute;ch mua sắm vui vẻ!</p>', '<p>🔶 TH&Ocirc;NG TIN SẢN PHẨM</p>\r\n\r\n<p>Thương hiệu: ILABY</p>\r\n\r\n<p>Xuất xứ: Việt Nam</p>\r\n\r\n<p>M&atilde; sản phẩm: 12IL1288K2PT</p>\r\n\r\n<p>M&agrave;u sắc: đỏ - trắng - hồng</p>\r\n\r\n<p>Chất liệu sử dụng: tơ l&oacute;t mềm mại</p>', 379000, 0, 1, '2022-11-20 12:31:54', '2022-11-20 12:31:54'),
(55, 1, 3, 275, 'Set chú cuội áo cổ V có đai bé trai ILABY chất liệu lụa mềm mại', 'set-chu-cuoi-ao-co-v-co-dai-be-trai-ilaby-chat-lieu-lua-mem-mai', '<p>ILaby - Nơi thi&ecirc;n thần tỏa s&aacute;ng - Set ch&uacute; cuội &aacute;o cổ V c&oacute; đai b&eacute; trai ILABY chất liệu lụa mềm mại</p>\r\n\r\n<p>Tại sao lại chọn đồ của ILaby:</p>\r\n\r\n<p>- Sản phẩm được thiết kế độc quyền bởi thương hiệu ILABY</p>\r\n\r\n<p>- Chất liệu an to&agrave;n l&agrave;n da b&eacute;</p>\r\n\r\n<p>- &nbsp;Mẫu m&atilde; đa dạng, đa năng: mặc đi chơi, đi tiệc, đi học đều được</p>\r\n\r\n<p>-----------</p>\r\n\r\n<p>🔶 TH&Ocirc;NG TIN SẢN PHẨM</p>\r\n\r\n<p>Thương hiệu: ILABY</p>\r\n\r\n<p>Xuất xứ: Việt Nam</p>\r\n\r\n<p>M&atilde; sản phẩm: 52IB1238H2FT</p>\r\n\r\n<p>M&agrave;u sắc: m&agrave;u be</p>\r\n\r\n<p>Chất liệu sử dụng: lụa</p>\r\n\r\n<p>🔶 ILaby Kids cam kết</p>\r\n\r\n<p>- Sản phẩm 100% giống m&ocirc; tả.&nbsp;</p>\r\n\r\n<p>- Chất vải được qua chọn lọc, đảm bảo chất lượng 100%</p>\r\n\r\n<p>- H&igrave;nh ảnh sản phẩm l&agrave; ảnh thật do ILaby tự chụp v&agrave; giữ bản quyền h&igrave;nh ảnh</p>\r\n\r\n<p>- Đổi h&agrave;ng, ho&agrave;n tiền nếu sản phẩm kh&ocirc;ng giống với m&ocirc; tả</p>\r\n\r\n<p>- Hỗ trợ đổi trả theo quy định của shopee</p>\r\n\r\n<p>- Qu&yacute; kh&aacute;ch vui l&ograve;ng quay lại video l&uacute;c b&oacute;c h&agrave;ng v&agrave; giữ nguy&ecirc;n tem m&aacute;c để tr&aacute;nh trường hợp đơn vị vận chuyển l&agrave;m mất h&agrave;ng hoặc h&agrave;ng c&oacute; vấn đề từ nh&agrave; sản xuất.</p>\r\n\r\n<p>🔶 CH&Iacute;NH S&Aacute;CH ĐỔI TRẢ ILABY</p>\r\n\r\n<p>- Điều kiện &aacute;p dụng (trong v&ograve;ng 07 ng&agrave;y kể từ khi nhận sản phẩm)&nbsp;</p>\r\n\r\n<p>- Qu&yacute; kh&aacute;ch vui l&ograve;ng quay lại video l&uacute;c b&oacute;c h&agrave;ng v&agrave; giữ nguy&ecirc;n tem m&aacute;c để tr&aacute;nh trường hợp đơn vị vận chuyển l&agrave;m mất h&agrave;ng hoặc h&agrave;ng c&oacute; vấn đề từ nh&agrave; sản xuất.</p>\r\n\r\n<p>- Sản phẩm đổi trả phải c&ograve;n nguy&ecirc;n tem, nh&atilde;n, bao b&igrave;, chưa qua sử dụng giặt tẩy, nguy&ecirc;n vẹn như ban đầu Shop giao</p>\r\n\r\n<p>- Sản phẩm lỗi kỹ thuật được đổi mới</p>\r\n\r\n<p>Do m&agrave;n h&igrave;nh v&agrave; điều kiện &aacute;nh s&aacute;ng kh&aacute;c nhau, m&agrave;u sắc thực tế của sản phẩm c&oacute; thể ch&ecirc;nh lệch khoảng 3-5%</p>\r\n\r\n<p>🔶 LƯU &Yacute;</p>\r\n\r\n<p>- Qu&yacute; kh&aacute;ch nhận được h&agrave;ng nếu c&oacute; thắc mắc vui l&ograve;ng inbox shop.</p>\r\n\r\n<p>- Kh&aacute;ch y&ecirc;u đặt h&agrave;ng vui l&ograve;ng ghi ch&uacute; hoặc ib số c&acirc;n nặng v&agrave; tuổi của b&eacute; để shop giao h&agrave;ng chuẩn size cho b&eacute; nh&eacute;.&nbsp;</p>\r\n\r\n<p>Ch&uacute;c qu&yacute; kh&aacute;ch mua sắm vui vẻ!</p>', '<p>🔶 TH&Ocirc;NG TIN SẢN PHẨM</p>\r\n\r\n<p>Thương hiệu: ILABY</p>\r\n\r\n<p>Xuất xứ: Việt Nam</p>\r\n\r\n<p>M&atilde; sản phẩm: 52IB1238H2FT</p>\r\n\r\n<p>M&agrave;u sắc: m&agrave;u be</p>\r\n\r\n<p>Chất liệu sử dụng: lụa</p>', 379000, 0, 1, '2022-11-20 12:33:52', '2022-11-20 12:33:52'),
(56, 1, 3, 145, 'Quần short bé trai ILABY viền chỉ chập dọc thân chất liệu bò', 'quan-short-be-trai-ilaby-vien-chi-chap-doc-than-chat-lieu-bo', '<p>ILaby - Nơi thi&ecirc;n thần tỏa s&aacute;ng - Quần short b&eacute; trai ILABY viền chỉ chập dọc th&acirc;n chất liệu b&ograve;</p>\r\n\r\n<p>Tại sao lại chọn đồ của ILaby:</p>\r\n\r\n<p>- Sản phẩm được thiết kế độc quyền bởi thương hiệu ILABY</p>\r\n\r\n<p>- Chất liệu an to&agrave;n l&agrave;n da b&eacute;</p>\r\n\r\n<p>-&nbsp; Mẫu m&atilde; đa dạng, đa năng: mặc đi chơi, đi tiệc, đi học đều được</p>\r\n\r\n<p>-----------</p>\r\n\r\n<p>🔶 TH&Ocirc;NG TIN SẢN PHẨM</p>\r\n\r\n<p>Thương hiệu: ILABY</p>\r\n\r\n<p>Xuất xứ: Việt Nam</p>\r\n\r\n<p>M&atilde; sản phẩm: 31IB08070122</p>\r\n\r\n<p>M&agrave;u sắc: Xanh than, xanh</p>\r\n\r\n<p>Chất liệu sử dụng: B&ograve;</p>\r\n\r\n<p style=\"text-align:center\"><img src=\"https://cf.shopee.vn/file/e887841cc68fa8551b31e63909621ffc\" style=\"height:invalid-value; width:invalid-value\" /></p>\r\n\r\n<p>🔶 ILaby Kids cam kết</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>- Sản phẩm 100% giống m&ocirc; tả.&nbsp;</p>\r\n\r\n<p>- Chất vải được qua chọn lọc, đảm bảo chất lượng 100%</p>\r\n\r\n<p>- H&igrave;nh ảnh sản phẩm l&agrave; ảnh thật do ILaby tự chụp v&agrave; giữ bản quyền h&igrave;nh ảnh</p>\r\n\r\n<p>- Đổi h&agrave;ng, ho&agrave;n tiền nếu sản phẩm kh&ocirc;ng giống với m&ocirc; tả</p>\r\n\r\n<p>- Hỗ trợ đổi trả theo quy định của shopee</p>\r\n\r\n<p>- Qu&yacute; kh&aacute;ch vui l&ograve;ng quay lại video l&uacute;c b&oacute;c h&agrave;ng v&agrave; giữ nguy&ecirc;n tem m&aacute;c để tr&aacute;nh trường hợp đơn vị vận chuyển l&agrave;m mất h&agrave;ng hoặc h&agrave;ng c&oacute; vấn đề từ nh&agrave; sản xuất.</p>\r\n\r\n<p style=\"text-align:center\"><img src=\"https://cf.shopee.vn/file/16b11befba9124ea6405c752142e4b28\" style=\"height:invalid-value; width:invalid-value\" /></p>\r\n\r\n<p>🔶 CH&Iacute;NH S&Aacute;CH ĐỔI TRẢ ILABY</p>\r\n\r\n<p>- Điều kiện &aacute;p dụng (trong v&ograve;ng 07 ng&agrave;y kể từ khi nhận sản phẩm)&nbsp;</p>\r\n\r\n<p>- Qu&yacute; kh&aacute;ch vui l&ograve;ng quay lại video l&uacute;c b&oacute;c h&agrave;ng v&agrave; giữ nguy&ecirc;n tem m&aacute;c để tr&aacute;nh trường hợp đơn vị vận chuyển l&agrave;m mất h&agrave;ng hoặc h&agrave;ng c&oacute; vấn đề từ nh&agrave; sản xuất.</p>\r\n\r\n<p>- Sản phẩm đổi trả phải c&ograve;n nguy&ecirc;n tem, nh&atilde;n, bao b&igrave;, chưa qua sử dụng giặt tẩy, nguy&ecirc;n vẹn như ban đầu Shop giao</p>\r\n\r\n<p>- Sản phẩm lỗi kỹ thuật được đổi mới</p>\r\n\r\n<p>Do m&agrave;n h&igrave;nh v&agrave; điều kiện &aacute;nh s&aacute;ng kh&aacute;c nhau, m&agrave;u sắc thực tế của sản phẩm c&oacute; thể ch&ecirc;nh lệch khoảng 3-5%</p>', '<p>🔶 TH&Ocirc;NG TIN SẢN PHẨM</p>\r\n\r\n<p>Thương hiệu: ILABY</p>\r\n\r\n<p>Xuất xứ: Việt Nam</p>\r\n\r\n<p>M&atilde; sản phẩm: 31IB08070122</p>\r\n\r\n<p>M&agrave;u sắc: Xanh than, xanh</p>\r\n\r\n<p>Chất liệu sử dụng: B&ograve;</p>', 219000, 0, 1, '2022-11-20 12:35:50', '2022-11-20 12:35:50');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `productimage`
--

CREATE TABLE `productimage` (
  `idImage` int(10) UNSIGNED NOT NULL,
  `idProduct` int(11) UNSIGNED NOT NULL,
  `ImageName` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `productimage`
--

INSERT INTO `productimage` (`idImage`, `idProduct`, `ImageName`, `created_at`, `updated_at`) VALUES
(1, 1, '[\"a627.png\",\"a745.png\",\"a878.png\",\"a1521.png\"]', '2022-07-30 10:03:45', '2022-07-30 10:03:45'),
(2, 2, '[\"a147.png\",\"a215.png\",\"a337.png\",\"a478.png\",\"a585.png\"]', '2022-07-30 10:05:24', '2022-07-30 10:05:24'),
(3, 3, '[\"a934.png\",\"a1037.png\",\"a114.png\",\"a128.png\"]', '2022-07-30 10:06:38', '2022-07-30 10:06:38'),
(4, 4, '[\"a1333.png\",\"a1442.png\",\"a1571.png\"]', '2022-07-30 10:08:00', '2022-07-30 10:08:00'),
(9, 11, '[\"rb178.png\",\"rb265.png\",\"rb367.png\"]', '2022-08-28 08:19:16', '2022-08-28 08:19:16'),
(10, 12, '[\"rb497.png\",\"rb592.png\",\"rb659.png\"]', '2022-08-28 08:32:29', '2022-08-28 08:32:29'),
(11, 13, '[\"i158.png\",\"i290.png\",\"i355.png\"]', '2022-08-28 08:36:45', '2022-08-28 08:36:45'),
(12, 14, '[\"i462.png\",\"i550.png\",\"i618.png\"]', '2022-08-28 08:40:10', '2022-08-28 08:40:10'),
(13, 15, '[\"rb784.png\",\"rb834.png\",\"rb979.png\"]', '2022-10-04 14:40:13', '2022-10-04 14:40:13'),
(14, 16, '[\"rb1058.png\",\"rb1123.png\",\"rb1287.png\"]', '2022-10-04 14:45:16', '2022-10-04 14:45:16'),
(15, 17, '[\"i791.png\",\"i816.png\",\"i969.png\"]', '2022-10-04 14:49:14', '2022-10-04 14:49:14'),
(16, 18, '[\"i1032.png\",\"i1114.png\",\"i1287.png\"]', '2022-10-04 14:53:11', '2022-10-04 14:53:11'),
(17, 19, '[\"i1358.png\",\"i1474.png\",\"i1543.png\"]', '2022-10-04 14:59:54', '2022-10-04 14:59:54'),
(18, 20, '[\"i1666.png\",\"i176.png\",\"i1865.png\"]', '2022-10-04 15:04:21', '2022-10-04 15:04:21'),
(19, 21, '[\"a1682.png\",\"a1751.png\",\"a1892.png\"]', '2022-10-04 15:07:40', '2022-10-04 15:07:40'),
(20, 22, '[\"a1945.png\",\"a2092.png\",\"a2129.png\"]', '2022-10-04 15:10:59', '2022-10-04 15:10:59'),
(21, 23, '[\"a2241.png\",\"a2333.png\",\"a2443.png\"]', '2022-10-04 15:16:33', '2022-10-04 15:16:33'),
(22, 24, '[\"ami135.png\",\"ami285.png\",\"ami359.png\"]', '2022-11-14 10:17:45', '2022-11-14 10:17:45'),
(23, 25, '[\"ami46.png\",\"ami56.png\",\"ami621.png\"]', '2022-11-14 10:22:00', '2022-11-14 10:22:00'),
(24, 26, '[\"ami749.png\",\"ami856.png\",\"ami962.png\"]', '2022-11-14 10:24:48', '2022-11-14 10:24:48'),
(25, 27, '[\"ami1013.png\"]', '2022-11-14 10:27:25', '2022-11-14 10:27:25'),
(26, 28, '[\"ami1139.png\"]', '2022-11-14 10:30:03', '2022-11-14 10:30:03'),
(27, 29, '[\"ami1284.png\",\"ami1366.png\"]', '2022-11-14 10:35:58', '2022-11-14 10:35:58'),
(28, 30, '[\"ami1437.png\",\"ami1570.png\"]', '2022-11-14 10:44:13', '2022-11-14 10:44:13'),
(29, 31, '[\"ami1658.png\"]', '2022-11-14 10:46:22', '2022-11-14 10:46:22'),
(30, 32, '[\"ami1778.png\"]', '2022-11-20 11:33:05', '2022-11-20 11:33:05'),
(31, 33, '[\"ami1846.png\"]', '2022-11-20 11:39:17', '2022-11-20 11:39:17'),
(32, 34, '[\"ami1889.png\"]', '2022-11-20 11:41:23', '2022-11-20 11:41:23'),
(33, 35, '[\"ami1997.png\"]', '2022-11-20 11:44:13', '2022-11-20 11:44:13'),
(34, 36, '[\"ami2019.png\"]', '2022-11-20 11:46:21', '2022-11-20 11:46:21'),
(35, 37, '[\"ami2183.png\"]', '2022-11-20 11:49:17', '2022-11-20 11:49:17'),
(36, 38, '[\"ami2280.png\"]', '2022-11-20 11:51:58', '2022-11-20 11:51:58'),
(37, 39, '[\"ami234.png\"]', '2022-11-20 11:54:30', '2022-11-20 11:54:30'),
(38, 40, '[\"ami2457.png\"]', '2022-11-20 11:56:22', '2022-11-20 11:56:22'),
(39, 41, '[\"rb1364.png\"]', '2022-11-20 12:04:56', '2022-11-20 12:04:56'),
(40, 42, '[\"rb1450.png\"]', '2022-11-20 12:06:36', '2022-11-20 12:06:36'),
(41, 43, '[\"rb1599.png\"]', '2022-11-20 12:09:01', '2022-11-20 12:09:01'),
(42, 44, '[\"rb1672.png\"]', '2022-11-20 12:10:34', '2022-11-20 12:10:34'),
(43, 45, '[\"a2517.png\"]', '2022-11-20 12:13:27', '2022-11-20 12:13:27'),
(44, 46, '[\"a2618.png\"]', '2022-11-20 12:15:25', '2022-11-20 12:15:25'),
(45, 47, '[\"a2724.png\"]', '2022-11-20 12:17:15', '2022-11-20 12:17:15'),
(46, 48, '[\"a284.png\"]', '2022-11-20 12:18:41', '2022-11-20 12:18:41'),
(47, 49, '[\"i1988.png\"]', '2022-11-20 12:21:43', '2022-11-20 12:21:43'),
(48, 50, '[\"i2074.png\"]', '2022-11-20 12:23:51', '2022-11-20 12:23:51'),
(49, 51, '[\"i2122.png\"]', '2022-11-20 12:25:38', '2022-11-20 12:25:38'),
(50, 52, '[\"i2273.png\"]', '2022-11-20 12:28:23', '2022-11-20 12:28:23'),
(51, 53, '[\"i2323.png\"]', '2022-11-20 12:30:31', '2022-11-20 12:30:31'),
(52, 54, '[\"i245.png\"]', '2022-11-20 12:31:54', '2022-11-20 12:31:54'),
(53, 55, '[\"i2511.png\"]', '2022-11-20 12:33:52', '2022-11-20 12:33:52'),
(54, 56, '[\"i265.png\"]', '2022-11-20 12:35:50', '2022-11-20 12:35:50');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_attribute`
--

CREATE TABLE `product_attribute` (
  `idProAttr` int(10) UNSIGNED NOT NULL,
  `idProduct` int(11) UNSIGNED NOT NULL,
  `idAttrValue` int(11) UNSIGNED NOT NULL DEFAULT 11,
  `Quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_attribute`
--

INSERT INTO `product_attribute` (`idProAttr`, `idProduct`, `idAttrValue`, `Quantity`, `created_at`, `updated_at`) VALUES
(1, 1, 4, 20, '2022-07-30 10:03:45', '2022-07-30 10:03:45'),
(2, 1, 5, 11, '2022-07-30 10:03:45', '2022-07-30 10:03:45'),
(3, 1, 6, 31, '2022-07-30 10:03:45', '2022-07-30 10:03:45'),
(11, 4, 4, 21, '2022-07-30 10:08:00', '2022-07-30 10:08:00'),
(12, 4, 5, 25, '2022-07-30 10:08:00', '2022-07-30 10:08:00'),
(13, 4, 6, 36, '2022-07-30 10:08:00', '2022-07-30 10:08:00'),
(14, 3, 4, 37, '2022-07-30 10:08:22', '2022-07-30 10:08:22'),
(15, 3, 5, 11, '2022-07-30 10:08:22', '2022-07-30 10:08:22'),
(16, 3, 6, 9, '2022-07-30 10:08:22', '2022-07-30 10:08:22'),
(21, 11, 12, 34, '2022-08-28 08:19:15', '2022-08-28 08:19:15'),
(22, 11, 13, 49, '2022-08-28 08:19:15', '2022-08-28 08:19:15'),
(23, 11, 14, 87, '2022-08-28 08:19:15', '2022-08-28 08:19:15'),
(24, 11, 15, 44, '2022-08-28 08:19:15', '2022-08-28 08:19:15'),
(25, 12, 12, 22, '2022-08-28 08:32:29', '2022-08-28 08:32:29'),
(26, 12, 13, 38, '2022-08-28 08:32:29', '2022-08-28 08:32:29'),
(27, 12, 14, 55, '2022-08-28 08:32:29', '2022-08-28 08:32:29'),
(28, 12, 15, 50, '2022-08-28 08:32:29', '2022-08-28 08:32:29'),
(29, 13, 4, 90, '2022-08-28 08:36:45', '2022-08-28 08:36:45'),
(30, 13, 5, 100, '2022-08-28 08:36:45', '2022-08-28 08:36:45'),
(31, 13, 6, 50, '2022-08-28 08:36:45', '2022-08-28 08:36:45'),
(32, 14, 4, 60, '2022-08-28 08:40:09', '2022-08-28 08:40:09'),
(33, 14, 5, 45, '2022-08-28 08:40:09', '2022-08-28 08:40:09'),
(34, 14, 6, 30, '2022-08-28 08:40:09', '2022-08-28 08:40:09'),
(35, 15, 16, 59, '2022-10-04 14:40:12', '2022-10-04 14:40:12'),
(36, 15, 17, 60, '2022-10-04 14:40:12', '2022-10-04 14:40:12'),
(37, 16, 4, 44, '2022-10-04 14:45:16', '2022-10-04 14:45:16'),
(38, 16, 5, 33, '2022-10-04 14:45:16', '2022-10-04 14:45:16'),
(39, 16, 6, 56, '2022-10-04 14:45:16', '2022-10-04 14:45:16'),
(40, 17, 18, 100, '2022-10-04 14:49:13', '2022-10-04 14:49:13'),
(41, 17, 19, 120, '2022-10-04 14:49:13', '2022-10-04 14:49:13'),
(42, 18, 4, 90, '2022-10-04 14:53:11', '2022-10-04 14:53:11'),
(43, 18, 5, 100, '2022-10-04 14:53:11', '2022-10-04 14:53:11'),
(44, 18, 6, 120, '2022-10-04 14:53:11', '2022-10-04 14:53:11'),
(45, 19, 4, 44, '2022-10-04 14:59:54', '2022-10-04 14:59:54'),
(46, 19, 5, 56, '2022-10-04 14:59:54', '2022-10-04 14:59:54'),
(47, 19, 6, 76, '2022-10-04 14:59:54', '2022-10-04 14:59:54'),
(48, 19, 20, 87, '2022-10-04 14:59:54', '2022-10-04 14:59:54'),
(49, 19, 21, 34, '2022-10-04 14:59:54', '2022-10-04 14:59:54'),
(50, 20, 4, 60, '2022-10-04 15:04:21', '2022-10-04 15:04:21'),
(51, 20, 5, 80, '2022-10-04 15:04:21', '2022-10-04 15:04:21'),
(52, 20, 6, 90, '2022-10-04 15:04:21', '2022-10-04 15:04:21'),
(56, 22, 4, 33, '2022-10-04 15:10:59', '2022-10-04 15:10:59'),
(57, 22, 5, 41, '2022-10-04 15:10:59', '2022-10-04 15:10:59'),
(58, 22, 6, 42, '2022-10-04 15:10:59', '2022-10-04 15:10:59'),
(59, 22, 20, 55, '2022-10-04 15:10:59', '2022-10-04 15:10:59'),
(60, 22, 21, 56, '2022-10-04 15:10:59', '2022-10-04 15:10:59'),
(61, 2, 7, 42, '2022-10-04 15:14:01', '2022-10-04 15:14:01'),
(62, 2, 8, 37, '2022-10-04 15:14:01', '2022-10-04 15:14:01'),
(63, 2, 9, 19, '2022-10-04 15:14:01', '2022-10-04 15:14:01'),
(64, 2, 10, 29, '2022-10-04 15:14:01', '2022-10-04 15:14:01'),
(65, 21, 4, 56, '2022-10-04 15:15:41', '2022-10-04 15:15:41'),
(66, 21, 5, 77, '2022-10-04 15:15:41', '2022-10-04 15:15:41'),
(67, 21, 6, 88, '2022-10-04 15:15:41', '2022-10-04 15:15:41'),
(68, 23, 4, 49, '2022-10-04 15:16:33', '2022-10-04 15:16:33'),
(69, 23, 20, 89, '2022-10-04 15:16:33', '2022-10-04 15:16:33'),
(70, 24, 22, 100, '2022-11-14 10:17:45', '2022-11-14 10:17:45'),
(71, 24, 23, 120, '2022-11-14 10:17:45', '2022-11-14 10:17:45'),
(72, 24, 24, 130, '2022-11-14 10:17:45', '2022-11-14 10:17:45'),
(73, 24, 25, 50, '2022-11-14 10:17:45', '2022-11-14 10:17:45'),
(74, 24, 26, 60, '2022-11-14 10:17:45', '2022-11-14 10:17:45'),
(75, 24, 27, 80, '2022-11-14 10:17:45', '2022-11-14 10:17:45'),
(76, 24, 28, 90, '2022-11-14 10:17:45', '2022-11-14 10:17:45'),
(77, 25, 19, 100, '2022-11-14 10:21:58', '2022-11-14 10:21:58'),
(78, 25, 29, 200, '2022-11-14 10:21:58', '2022-11-14 10:21:58'),
(79, 25, 30, 150, '2022-11-14 10:21:58', '2022-11-14 10:21:58'),
(80, 25, 31, 300, '2022-11-14 10:21:58', '2022-11-14 10:21:58'),
(81, 26, 4, 100, '2022-11-14 10:24:48', '2022-11-14 10:24:48'),
(82, 26, 5, 100, '2022-11-14 10:24:48', '2022-11-14 10:24:48'),
(83, 26, 6, 100, '2022-11-14 10:24:48', '2022-11-14 10:24:48'),
(84, 27, 4, 50, '2022-11-14 10:27:25', '2022-11-14 10:27:25'),
(85, 27, 5, 60, '2022-11-14 10:27:25', '2022-11-14 10:27:25'),
(86, 27, 6, 76, '2022-11-14 10:27:25', '2022-11-14 10:27:25'),
(87, 27, 20, 45, '2022-11-14 10:27:25', '2022-11-14 10:27:25'),
(88, 27, 21, 33, '2022-11-14 10:27:25', '2022-11-14 10:27:25'),
(89, 28, 22, 100, '2022-11-14 10:30:03', '2022-11-14 10:30:03'),
(90, 28, 23, 120, '2022-11-14 10:30:03', '2022-11-14 10:30:03'),
(91, 28, 24, 110, '2022-11-14 10:30:03', '2022-11-14 10:30:03'),
(92, 28, 25, 109, '2022-11-14 10:30:03', '2022-11-14 10:30:03'),
(93, 28, 26, 90, '2022-11-14 10:30:03', '2022-11-14 10:30:03'),
(94, 28, 27, 80, '2022-11-14 10:30:03', '2022-11-14 10:30:03'),
(95, 28, 28, 60, '2022-11-14 10:30:03', '2022-11-14 10:30:03'),
(96, 29, 29, 100, '2022-11-14 10:35:58', '2022-11-14 10:35:58'),
(97, 29, 30, 200, '2022-11-14 10:35:58', '2022-11-14 10:35:58'),
(98, 30, 4, 50, '2022-11-14 10:44:12', '2022-11-14 10:44:12'),
(99, 30, 5, 60, '2022-11-14 10:44:12', '2022-11-14 10:44:12'),
(100, 30, 6, 80, '2022-11-14 10:44:12', '2022-11-14 10:44:12'),
(101, 31, 4, 66, '2022-11-14 10:46:22', '2022-11-14 10:46:22'),
(102, 31, 5, 89, '2022-11-14 10:46:22', '2022-11-14 10:46:22'),
(103, 31, 6, 98, '2022-11-14 10:46:22', '2022-11-14 10:46:22'),
(104, 32, 4, 218, '2022-11-20 11:33:04', '2022-11-20 11:33:04'),
(105, 32, 5, 311, '2022-11-20 11:33:04', '2022-11-20 11:33:04'),
(106, 32, 6, 123, '2022-11-20 11:33:04', '2022-11-20 11:33:04'),
(107, 33, 24, 56, '2022-11-20 11:39:17', '2022-11-20 11:39:17'),
(108, 33, 25, 65, '2022-11-20 11:39:17', '2022-11-20 11:39:17'),
(109, 33, 26, 78, '2022-11-20 11:39:17', '2022-11-20 11:39:17'),
(110, 33, 27, 88, '2022-11-20 11:39:17', '2022-11-20 11:39:17'),
(111, 33, 28, 99, '2022-11-20 11:39:17', '2022-11-20 11:39:17'),
(112, 34, 24, 22, '2022-11-20 11:41:23', '2022-11-20 11:41:23'),
(113, 34, 25, 32, '2022-11-20 11:41:23', '2022-11-20 11:41:23'),
(114, 34, 26, 33, '2022-11-20 11:41:23', '2022-11-20 11:41:23'),
(115, 34, 27, 44, '2022-11-20 11:41:23', '2022-11-20 11:41:23'),
(116, 34, 28, 55, '2022-11-20 11:41:23', '2022-11-20 11:41:23'),
(117, 35, 4, 100, '2022-11-20 11:44:12', '2022-11-20 11:44:12'),
(118, 35, 5, 80, '2022-11-20 11:44:12', '2022-11-20 11:44:12'),
(119, 35, 6, 90, '2022-11-20 11:44:12', '2022-11-20 11:44:12'),
(125, 36, 24, 55, '2022-11-20 11:47:01', '2022-11-20 11:47:01'),
(126, 36, 25, 66, '2022-11-20 11:47:01', '2022-11-20 11:47:01'),
(127, 36, 26, 76, '2022-11-20 11:47:01', '2022-11-20 11:47:01'),
(128, 36, 27, 77, '2022-11-20 11:47:01', '2022-11-20 11:47:01'),
(129, 36, 28, 98, '2022-11-20 11:47:01', '2022-11-20 11:47:01'),
(130, 37, 24, 56, '2022-11-20 11:49:17', '2022-11-20 11:49:17'),
(131, 37, 25, 65, '2022-11-20 11:49:17', '2022-11-20 11:49:17'),
(132, 37, 26, 77, '2022-11-20 11:49:17', '2022-11-20 11:49:17'),
(133, 37, 27, 88, '2022-11-20 11:49:17', '2022-11-20 11:49:17'),
(134, 37, 28, 99, '2022-11-20 11:49:17', '2022-11-20 11:49:17'),
(135, 38, 30, 50, '2022-11-20 11:51:58', '2022-11-20 11:51:58'),
(136, 38, 31, 60, '2022-11-20 11:51:58', '2022-11-20 11:51:58'),
(137, 39, 16, 24, '2022-11-20 11:54:30', '2022-11-20 11:54:30'),
(138, 39, 18, 44, '2022-11-20 11:54:30', '2022-11-20 11:54:30'),
(139, 39, 29, 50, '2022-11-20 11:54:30', '2022-11-20 11:54:30'),
(140, 39, 30, 78, '2022-11-20 11:54:30', '2022-11-20 11:54:30'),
(141, 39, 31, 89, '2022-11-20 11:54:30', '2022-11-20 11:54:30'),
(142, 40, 18, 45, '2022-11-20 11:56:22', '2022-11-20 11:56:22'),
(143, 40, 19, 90, '2022-11-20 11:56:22', '2022-11-20 11:56:22'),
(144, 40, 29, 80, '2022-11-20 11:56:22', '2022-11-20 11:56:22'),
(145, 40, 30, 80, '2022-11-20 11:56:22', '2022-11-20 11:56:22'),
(146, 40, 31, 76, '2022-11-20 11:56:22', '2022-11-20 11:56:22'),
(147, 41, 12, 60, '2022-11-20 12:04:56', '2022-11-20 12:04:56'),
(148, 41, 13, 80, '2022-11-20 12:04:56', '2022-11-20 12:04:56'),
(149, 41, 14, 90, '2022-11-20 12:04:56', '2022-11-20 12:04:56'),
(150, 41, 15, 100, '2022-11-20 12:04:56', '2022-11-20 12:04:56'),
(151, 42, 12, 50, '2022-11-20 12:06:36', '2022-11-20 12:06:36'),
(152, 42, 13, 55, '2022-11-20 12:06:36', '2022-11-20 12:06:36'),
(153, 42, 14, 56, '2022-11-20 12:06:36', '2022-11-20 12:06:36'),
(154, 42, 15, 67, '2022-11-20 12:06:36', '2022-11-20 12:06:36'),
(155, 43, 13, 50, '2022-11-20 12:09:01', '2022-11-20 12:09:01'),
(156, 43, 14, 66, '2022-11-20 12:09:01', '2022-11-20 12:09:01'),
(157, 43, 15, 80, '2022-11-20 12:09:01', '2022-11-20 12:09:01'),
(158, 44, 4, 70, '2022-11-20 12:10:34', '2022-11-20 12:10:34'),
(159, 44, 5, 88, '2022-11-20 12:10:34', '2022-11-20 12:10:34'),
(160, 44, 6, 77, '2022-11-20 12:10:34', '2022-11-20 12:10:34'),
(161, 45, 4, 50, '2022-11-20 12:13:27', '2022-11-20 12:13:27'),
(162, 45, 5, 90, '2022-11-20 12:13:27', '2022-11-20 12:13:27'),
(163, 45, 6, 80, '2022-11-20 12:13:27', '2022-11-20 12:13:27'),
(164, 46, 4, 56, '2022-11-20 12:15:25', '2022-11-20 12:15:25'),
(165, 46, 5, 65, '2022-11-20 12:15:25', '2022-11-20 12:15:25'),
(166, 46, 6, 55, '2022-11-20 12:15:25', '2022-11-20 12:15:25'),
(167, 46, 20, 76, '2022-11-20 12:15:25', '2022-11-20 12:15:25'),
(168, 47, 4, 56, '2022-11-20 12:17:15', '2022-11-20 12:17:15'),
(169, 47, 5, 53, '2022-11-20 12:17:15', '2022-11-20 12:17:15'),
(170, 47, 6, 33, '2022-11-20 12:17:15', '2022-11-20 12:17:15'),
(171, 48, 4, 80, '2022-11-20 12:18:41', '2022-11-20 12:18:41'),
(172, 48, 5, 90, '2022-11-20 12:18:41', '2022-11-20 12:18:41'),
(173, 48, 20, 100, '2022-11-20 12:18:41', '2022-11-20 12:18:41'),
(174, 49, 4, 80, '2022-11-20 12:21:43', '2022-11-20 12:21:43'),
(175, 49, 20, 90, '2022-11-20 12:21:43', '2022-11-20 12:21:43'),
(176, 49, 21, 99, '2022-11-20 12:21:43', '2022-11-20 12:21:43'),
(177, 50, 4, 59, '2022-11-20 12:23:51', '2022-11-20 12:23:51'),
(178, 50, 5, 78, '2022-11-20 12:23:51', '2022-11-20 12:23:51'),
(179, 50, 20, 65, '2022-11-20 12:23:51', '2022-11-20 12:23:51'),
(180, 51, 4, 80, '2022-11-20 12:25:38', '2022-11-20 12:25:38'),
(181, 51, 5, 98, '2022-11-20 12:25:38', '2022-11-20 12:25:38'),
(182, 51, 6, 88, '2022-11-20 12:25:38', '2022-11-20 12:25:38'),
(183, 52, 31, 70, '2022-11-20 12:28:23', '2022-11-20 12:28:23'),
(184, 52, 32, 87, '2022-11-20 12:28:23', '2022-11-20 12:28:23'),
(185, 52, 33, 90, '2022-11-20 12:28:23', '2022-11-20 12:28:23'),
(186, 53, 4, 90, '2022-11-20 12:30:31', '2022-11-20 12:30:31'),
(187, 53, 5, 80, '2022-11-20 12:30:31', '2022-11-20 12:30:31'),
(188, 53, 6, 70, '2022-11-20 12:30:31', '2022-11-20 12:30:31'),
(189, 54, 4, 100, '2022-11-20 12:31:54', '2022-11-20 12:31:54'),
(190, 54, 5, 122, '2022-11-20 12:31:54', '2022-11-20 12:31:54'),
(191, 54, 6, 132, '2022-11-20 12:31:54', '2022-11-20 12:31:54'),
(192, 55, 4, 90, '2022-11-20 12:33:52', '2022-11-20 12:33:52'),
(193, 55, 5, 98, '2022-11-20 12:33:52', '2022-11-20 12:33:52'),
(194, 55, 6, 87, '2022-11-20 12:33:52', '2022-11-20 12:33:52'),
(195, 56, 4, 44, '2022-11-20 12:35:50', '2022-11-20 12:35:50'),
(196, 56, 5, 55, '2022-11-20 12:35:50', '2022-11-20 12:35:50'),
(197, 56, 6, 46, '2022-11-20 12:35:50', '2022-11-20 12:35:50');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `saleproduct`
--

CREATE TABLE `saleproduct` (
  `idSale` int(10) UNSIGNED NOT NULL,
  `idProduct` int(11) UNSIGNED NOT NULL,
  `SaleName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `SaleStart` datetime NOT NULL,
  `SaleEnd` datetime NOT NULL,
  `Percent` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `saleproduct`
--

INSERT INTO `saleproduct` (`idSale`, `idProduct`, `SaleName`, `SaleStart`, `SaleEnd`, `Percent`, `created_at`, `updated_at`) VALUES
(1, 1, 'sale', '2022-07-29 18:58:00', '2022-08-31 18:58:00', 15, '2022-07-30 11:58:49', '2022-07-30 11:58:49'),
(2, 3, 'sale', '2022-07-29 18:58:00', '2022-08-31 18:58:00', 15, '2022-07-30 11:58:49', '2022-07-30 11:58:49'),
(3, 4, 'sale', '2022-07-29 18:58:00', '2022-08-31 18:58:00', 15, '2022-07-30 11:58:49', '2022-07-30 11:58:49'),
(4, 3, 'Sale hè', '2022-10-23 18:19:00', '2022-11-30 18:19:00', 20, '2022-10-23 11:20:21', '2022-10-23 11:20:21'),
(5, 4, 'Sale hè', '2022-10-23 18:19:00', '2022-11-30 18:19:00', 20, '2022-10-23 11:20:21', '2022-10-23 11:20:21'),
(6, 13, 'Sale hè', '2022-10-23 18:19:00', '2022-11-30 18:19:00', 20, '2022-10-23 11:20:21', '2022-10-23 11:20:21'),
(7, 14, 'Sale hè', '2022-10-23 18:19:00', '2022-11-30 18:19:00', 20, '2022-10-23 11:20:21', '2022-10-23 11:20:21'),
(8, 17, 'Sale hè', '2022-10-23 18:19:00', '2022-11-30 18:19:00', 20, '2022-10-23 11:20:21', '2022-10-23 11:20:21'),
(9, 19, 'Sale hè', '2022-10-23 18:19:00', '2022-11-30 18:19:00', 20, '2022-10-23 11:20:21', '2022-10-23 11:20:21'),
(10, 20, 'Sale hè', '2022-10-23 18:19:00', '2022-11-30 18:19:00', 20, '2022-10-23 11:20:21', '2022-10-23 11:20:21'),
(11, 22, 'Sale hè', '2022-10-23 18:19:00', '2022-11-30 18:19:00', 20, '2022-10-23 11:20:21', '2022-10-23 11:20:21'),
(12, 1, 'SALE lớn', '2022-12-07 18:17:00', '2022-12-31 18:17:00', 20, '2022-12-08 11:17:44', '2022-12-08 11:17:44'),
(13, 2, 'SALE lớn', '2022-12-07 18:17:00', '2022-12-31 18:17:00', 20, '2022-12-08 11:17:44', '2022-12-08 11:17:44'),
(14, 12, 'SALE lớn', '2022-12-07 18:17:00', '2022-12-31 18:17:00', 20, '2022-12-08 11:17:44', '2022-12-08 11:17:44'),
(15, 13, 'SALE lớn', '2022-12-07 18:17:00', '2022-12-31 18:17:00', 20, '2022-12-08 11:17:44', '2022-12-08 11:17:44'),
(16, 14, 'SALE lớn', '2022-12-07 18:17:00', '2022-12-31 18:17:00', 20, '2022-12-08 11:17:44', '2022-12-08 11:17:44'),
(17, 17, 'SALE lớn', '2022-12-07 18:17:00', '2022-12-31 18:17:00', 20, '2022-12-08 11:17:44', '2022-12-08 11:17:44'),
(18, 21, 'SALE lớn', '2022-12-07 18:17:00', '2022-12-31 18:17:00', 20, '2022-12-08 11:17:44', '2022-12-08 11:17:44'),
(19, 24, 'SALE lớn', '2022-12-07 18:17:00', '2022-12-31 18:17:00', 20, '2022-12-08 11:17:44', '2022-12-08 11:17:44'),
(20, 25, 'SALE lớn', '2022-12-07 18:17:00', '2022-12-31 18:17:00', 20, '2022-12-08 11:17:44', '2022-12-08 11:17:44'),
(21, 26, 'SALE lớn', '2022-12-07 18:17:00', '2022-12-31 18:17:00', 20, '2022-12-08 11:17:44', '2022-12-08 11:17:44'),
(22, 31, 'SALE lớn', '2022-12-07 18:17:00', '2022-12-31 18:17:00', 20, '2022-12-08 11:17:44', '2022-12-08 11:17:44'),
(23, 37, 'SALE lớn', '2022-12-07 18:17:00', '2022-12-31 18:17:00', 20, '2022-12-08 11:17:44', '2022-12-08 11:17:44'),
(24, 38, 'SALE lớn', '2022-12-07 18:17:00', '2022-12-31 18:17:00', 20, '2022-12-08 11:17:44', '2022-12-08 11:17:44'),
(25, 40, 'SALE lớn', '2022-12-07 18:17:00', '2022-12-31 18:17:00', 20, '2022-12-08 11:17:44', '2022-12-08 11:17:44'),
(26, 44, 'SALE lớn', '2022-12-07 18:17:00', '2022-12-31 18:17:00', 20, '2022-12-08 11:17:44', '2022-12-08 11:17:44'),
(27, 45, 'SALE lớn', '2022-12-07 18:17:00', '2022-12-31 18:17:00', 20, '2022-12-08 11:17:44', '2022-12-08 11:17:44'),
(28, 53, 'SALE lớn', '2022-12-07 18:17:00', '2022-12-31 18:17:00', 20, '2022-12-08 11:17:44', '2022-12-08 11:17:44'),
(29, 54, 'SALE lớn', '2022-12-07 18:17:00', '2022-12-31 18:17:00', 20, '2022-12-08 11:17:44', '2022-12-08 11:17:44'),
(30, 2, 'Sale', '2023-08-06 17:28:00', '2023-10-30 17:28:00', 20, '2023-08-07 10:28:21', '2023-08-07 10:28:21'),
(31, 3, 'Sale', '2023-08-06 17:28:00', '2023-10-30 17:28:00', 20, '2023-08-07 10:28:21', '2023-08-07 10:28:21'),
(32, 4, 'Sale', '2023-08-06 17:28:00', '2023-10-30 17:28:00', 20, '2023-08-07 10:28:21', '2023-08-07 10:28:21'),
(33, 12, 'Sale', '2023-08-06 17:28:00', '2023-10-30 17:28:00', 20, '2023-08-07 10:28:21', '2023-08-07 10:28:21'),
(34, 13, 'Sale', '2023-08-06 17:28:00', '2023-10-30 17:28:00', 20, '2023-08-07 10:28:21', '2023-08-07 10:28:21'),
(35, 16, 'Sale', '2023-08-06 17:28:00', '2023-10-30 17:28:00', 20, '2023-08-07 10:28:21', '2023-08-07 10:28:21'),
(36, 20, 'Sale', '2023-08-06 17:28:00', '2023-10-30 17:28:00', 20, '2023-08-07 10:28:21', '2023-08-07 10:28:21'),
(37, 21, 'Sale', '2023-08-06 17:28:00', '2023-10-30 17:28:00', 20, '2023-08-07 10:28:21', '2023-08-07 10:28:21'),
(38, 24, 'Sale', '2023-08-06 17:28:00', '2023-10-30 17:28:00', 20, '2023-08-07 10:28:21', '2023-08-07 10:28:21'),
(39, 29, 'Sale', '2023-08-06 17:28:00', '2023-10-30 17:28:00', 20, '2023-08-07 10:28:21', '2023-08-07 10:28:21'),
(40, 32, 'Sale', '2023-08-06 17:28:00', '2023-10-30 17:28:00', 20, '2023-08-07 10:28:21', '2023-08-07 10:28:21'),
(41, 33, 'Sale', '2023-08-06 17:28:00', '2023-10-30 17:28:00', 20, '2023-08-07 10:28:21', '2023-08-07 10:28:21'),
(42, 36, 'Sale', '2023-08-06 17:28:00', '2023-10-30 17:28:00', 20, '2023-08-07 10:28:21', '2023-08-07 10:28:21'),
(43, 37, 'Sale', '2023-08-06 17:28:00', '2023-10-30 17:28:00', 20, '2023-08-07 10:28:21', '2023-08-07 10:28:21'),
(44, 41, 'Sale', '2023-08-06 17:28:00', '2023-10-30 17:28:00', 20, '2023-08-07 10:28:21', '2023-08-07 10:28:21'),
(45, 45, 'Sale', '2023-08-06 17:28:00', '2023-10-30 17:28:00', 20, '2023-08-07 10:28:21', '2023-08-07 10:28:21'),
(46, 48, 'Sale', '2023-08-06 17:28:00', '2023-10-30 17:28:00', 20, '2023-08-07 10:28:21', '2023-08-07 10:28:21'),
(47, 49, 'Sale', '2023-08-06 17:28:00', '2023-10-30 17:28:00', 20, '2023-08-07 10:28:21', '2023-08-07 10:28:21'),
(48, 52, 'Sale', '2023-08-06 17:28:00', '2023-10-30 17:28:00', 20, '2023-08-07 10:28:21', '2023-08-07 10:28:21'),
(49, 53, 'Sale', '2023-08-06 17:28:00', '2023-10-30 17:28:00', 20, '2023-08-07 10:28:21', '2023-08-07 10:28:21');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `viewer`
--

CREATE TABLE `viewer` (
  `idView` int(11) NOT NULL,
  `idCustomer` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `idProduct` int(11) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `viewer`
--

INSERT INTO `viewer` (`idView`, `idCustomer`, `idProduct`, `created_at`, `updated_at`) VALUES
(6, 'Xp0rCi31edMuXnUSmN5B0FsbTIDy8qAypPl3UTEo', 17, '2022-10-05 11:42:17', '2022-10-05 11:42:17'),
(7, 'Xp0rCi31edMuXnUSmN5B0FsbTIDy8qAypPl3UTEo', 15, '2022-10-05 11:45:28', '2022-10-05 11:45:28'),
(8, 'Xp0rCi31edMuXnUSmN5B0FsbTIDy8qAypPl3UTEo', 4, '2022-10-05 11:46:04', '2022-10-05 11:46:04'),
(14, 'juXZHDCUSqRyrWq7eFHr7ZtmATwhnFrvmPAHC2bF', 4, '2022-10-22 12:01:27', '2022-10-22 12:01:27'),
(17, '9GqlHvarCN1hBd5G6rbVUzskS9d27ednn5HqRnvz', 3, '2022-10-26 11:18:42', '2022-10-26 11:18:42'),
(26, 'ZDHU4a03Mb268GD4MA2IW7pwKAjnugAgD41F9QkZ', 23, '2022-11-11 08:27:02', '2022-11-11 08:27:02'),
(30, 'NQYl65bcMiHFpqfaXmXuq5yINPvHS4UQlGtYkHKE', 30, '2022-11-18 15:36:13', '2022-11-18 15:36:13'),
(32, '4', 11, '2022-11-18 15:43:08', '2022-11-18 15:43:08'),
(33, 'sEj9Hl6adQV25E7TGgFZAoaQfREnHFOmyJktXf6S', 14, '2022-11-19 06:55:45', '2022-11-19 06:55:45'),
(37, '4', 23, '2022-11-19 11:14:28', '2022-11-19 11:14:28'),
(38, '4', 30, '2022-11-19 11:17:27', '2022-11-19 11:17:27'),
(40, 'FGCHvA4K3TL1P98GGlbvvtEFiWI6Nv6CcEZKacDk', 2, '2022-11-20 04:40:12', '2022-11-20 04:40:12'),
(41, '4dzUU9x8yA6xQCsgFtobW2wAoDnyJtDVxwmy0h3E', 17, '2022-11-20 04:40:14', '2022-11-20 04:40:14'),
(42, 'FIqZ7L9KcOhil2SgOnksNYOfikSdbEZV5LfVRUnR', 26, '2022-11-20 04:40:15', '2022-11-20 04:40:15'),
(43, 'T9CQv6gu2zVQ6s3cPqlCsSYwhoQReOL3QPwIzacf', 30, '2022-11-20 04:40:16', '2022-11-20 04:40:16'),
(44, 'jJPXUve4fM8sg7mgREfnZ6sIc4TZ1EFS4H85tE9A', 19, '2022-11-20 04:40:16', '2022-11-20 04:40:16'),
(45, '7avCNgXd4iNiM3SrkBu4f5PlK9CWwZxWm5BQpBlN', 1, '2022-11-20 04:40:17', '2022-11-20 04:40:17'),
(46, '8B2kkcpJa9as6QliJeY5CIImk2rOpSPce9DnCBA6', 28, '2022-11-20 04:40:19', '2022-11-20 04:40:19'),
(47, 'HWeCAtEkbItDMISQfoDY3KnvHxm8MjCEIPqxadDt', 11, '2022-11-20 04:40:26', '2022-11-20 04:40:26'),
(48, 'GnQVXLX3yXWikFVt8Gmnf8IVIUOR7SUe8aJgKfq7', 12, '2022-11-20 04:40:29', '2022-11-20 04:40:29'),
(49, 'Gy8VaRCi9TzOdkbUOBIouc0ZjyiIwtik4UsX34oj', 48, '2022-11-20 12:19:05', '2022-11-20 12:19:05'),
(50, 'Gy8VaRCi9TzOdkbUOBIouc0ZjyiIwtik4UsX34oj', 3, '2022-11-20 12:19:34', '2022-11-20 12:19:34'),
(51, 'Gy8VaRCi9TzOdkbUOBIouc0ZjyiIwtik4UsX34oj', 56, '2022-11-20 12:36:12', '2022-11-20 12:36:12'),
(54, '1', 26, '2022-12-08 11:23:13', '2022-12-08 11:23:13'),
(55, 'xAykgIy5rKipUT7XJfP7feFoUUE4abcqKjbKxaQr', 3, '2022-12-11 11:20:15', '2022-12-11 11:20:15'),
(56, '1', 34, '2022-12-11 11:20:24', '2022-12-11 11:20:24'),
(57, '1', 30, '2023-08-07 10:50:08', '2023-08-07 10:50:08'),
(61, '5', 19, '2023-08-07 12:27:37', '2023-08-07 12:27:37'),
(62, '5', 11, '2023-08-07 12:28:06', '2023-08-07 12:28:06'),
(63, '5', 49, '2023-08-07 12:29:09', '2023-08-07 12:29:09');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `voucher`
--

CREATE TABLE `voucher` (
  `idVoucher` int(10) UNSIGNED NOT NULL,
  `VoucherName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `VoucherQuantity` int(11) NOT NULL,
  `VoucherCondition` tinyint(4) NOT NULL,
  `VoucherNumber` int(11) NOT NULL,
  `VoucherCode` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `VoucherStart` datetime NOT NULL,
  `VoucherEnd` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `voucher`
--

INSERT INTO `voucher` (`idVoucher`, `VoucherName`, `VoucherQuantity`, `VoucherCondition`, `VoucherNumber`, `VoucherCode`, `VoucherStart`, `VoucherEnd`, `created_at`, `updated_at`) VALUES
(1, 'Mã giảm 300K', 22, 2, 300000, 'SALE300K', '2022-07-29 18:59:00', '2022-08-31 18:59:00', '2022-07-30 11:59:35', '2022-07-30 11:59:35'),
(2, 'Mã giảm 50%', 8, 1, 50, 'SALE50', '2022-07-29 19:00:00', '2022-08-31 19:00:00', '2022-07-30 12:00:13', '2022-07-30 12:00:13'),
(3, 'Giảm 10%', 28, 1, 10, 'SALE10', '2022-08-05 18:26:00', '2023-05-31 18:26:00', '2022-08-05 11:26:51', '2022-08-05 11:26:51'),
(4, 'Giảm 100K', 101, 2, 100000, 'SALE100K', '2022-08-05 18:27:00', '2023-05-31 18:27:00', '2022-08-05 11:27:17', '2022-08-05 11:27:17');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wishlist`
--

CREATE TABLE `wishlist` (
  `idWish` int(10) UNSIGNED NOT NULL,
  `idCustomer` int(11) UNSIGNED NOT NULL,
  `idProduct` int(11) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `addresscustomer`
--
ALTER TABLE `addresscustomer`
  ADD PRIMARY KEY (`idAddress`),
  ADD KEY `idCustomer` (`idCustomer`);

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idAdmin`);

--
-- Chỉ mục cho bảng `attribute`
--
ALTER TABLE `attribute`
  ADD PRIMARY KEY (`idAttribute`);

--
-- Chỉ mục cho bảng `attribute_value`
--
ALTER TABLE `attribute_value`
  ADD PRIMARY KEY (`idAttrValue`),
  ADD KEY `idAttribute` (`idAttribute`);

--
-- Chỉ mục cho bảng `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`idBill`),
  ADD KEY `idCustomer` (`idCustomer`);

--
-- Chỉ mục cho bảng `billhistory`
--
ALTER TABLE `billhistory`
  ADD KEY `idBill` (`idBill`);

--
-- Chỉ mục cho bảng `billinfo`
--
ALTER TABLE `billinfo`
  ADD KEY `idBill` (`idBill`),
  ADD KEY `idProduct` (`idProduct`);

--
-- Chỉ mục cho bảng `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`idBlog`);

--
-- Chỉ mục cho bảng `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`idBrand`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`idCart`),
  ADD KEY `idCustomer` (`idCustomer`),
  ADD KEY `idProduct` (`idProduct`),
  ADD KEY `idProAttr` (`idProAttr`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`idCategory`);

--
-- Chỉ mục cho bảng `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`idCustomer`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`idProduct`),
  ADD KEY `idCategory` (`idCategory`,`idBrand`),
  ADD KEY `idBrand` (`idBrand`);
ALTER TABLE `product` ADD FULLTEXT KEY `ProductName` (`ProductName`);

--
-- Chỉ mục cho bảng `productimage`
--
ALTER TABLE `productimage`
  ADD PRIMARY KEY (`idImage`),
  ADD KEY `idProduct` (`idProduct`);

--
-- Chỉ mục cho bảng `product_attribute`
--
ALTER TABLE `product_attribute`
  ADD PRIMARY KEY (`idProAttr`),
  ADD KEY `idProduct` (`idProduct`,`idAttrValue`),
  ADD KEY `idAttrValue` (`idAttrValue`);

--
-- Chỉ mục cho bảng `saleproduct`
--
ALTER TABLE `saleproduct`
  ADD PRIMARY KEY (`idSale`),
  ADD KEY `idProduct` (`idProduct`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `viewer`
--
ALTER TABLE `viewer`
  ADD PRIMARY KEY (`idView`),
  ADD KEY `idProduct` (`idProduct`);

--
-- Chỉ mục cho bảng `voucher`
--
ALTER TABLE `voucher`
  ADD PRIMARY KEY (`idVoucher`);

--
-- Chỉ mục cho bảng `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`idWish`),
  ADD KEY `idCustomer` (`idCustomer`,`idProduct`),
  ADD KEY `idProduct` (`idProduct`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `addresscustomer`
--
ALTER TABLE `addresscustomer`
  MODIFY `idAddress` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `idAdmin` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `attribute`
--
ALTER TABLE `attribute`
  MODIFY `idAttribute` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `attribute_value`
--
ALTER TABLE `attribute_value`
  MODIFY `idAttrValue` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT cho bảng `bill`
--
ALTER TABLE `bill`
  MODIFY `idBill` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `blog`
--
ALTER TABLE `blog`
  MODIFY `idBlog` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `brand`
--
ALTER TABLE `brand`
  MODIFY `idBrand` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `idCart` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `idCategory` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `customer`
--
ALTER TABLE `customer`
  MODIFY `idCustomer` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `idProduct` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT cho bảng `productimage`
--
ALTER TABLE `productimage`
  MODIFY `idImage` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT cho bảng `product_attribute`
--
ALTER TABLE `product_attribute`
  MODIFY `idProAttr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=200;

--
-- AUTO_INCREMENT cho bảng `saleproduct`
--
ALTER TABLE `saleproduct`
  MODIFY `idSale` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `viewer`
--
ALTER TABLE `viewer`
  MODIFY `idView` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT cho bảng `voucher`
--
ALTER TABLE `voucher`
  MODIFY `idVoucher` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `idWish` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `addresscustomer`
--
ALTER TABLE `addresscustomer`
  ADD CONSTRAINT `addresscustomer_ibfk_1` FOREIGN KEY (`idCustomer`) REFERENCES `customer` (`idCustomer`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `attribute_value`
--
ALTER TABLE `attribute_value`
  ADD CONSTRAINT `attribute_value_ibfk_1` FOREIGN KEY (`idAttribute`) REFERENCES `attribute` (`idAttribute`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `bill_ibfk_1` FOREIGN KEY (`idCustomer`) REFERENCES `customer` (`idCustomer`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `billhistory`
--
ALTER TABLE `billhistory`
  ADD CONSTRAINT `billhistory_ibfk_1` FOREIGN KEY (`idBill`) REFERENCES `bill` (`idBill`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `billinfo`
--
ALTER TABLE `billinfo`
  ADD CONSTRAINT `billinfo_ibfk_1` FOREIGN KEY (`idBill`) REFERENCES `bill` (`idBill`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `billinfo_ibfk_2` FOREIGN KEY (`idProduct`) REFERENCES `product` (`idProduct`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`idCustomer`) REFERENCES `customer` (`idCustomer`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`idProduct`) REFERENCES `product` (`idProduct`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `cart_ibfk_3` FOREIGN KEY (`idProAttr`) REFERENCES `product_attribute` (`idProAttr`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`idBrand`) REFERENCES `brand` (`idBrand`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`idCategory`) REFERENCES `category` (`idCategory`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `productimage`
--
ALTER TABLE `productimage`
  ADD CONSTRAINT `productimage_ibfk_1` FOREIGN KEY (`idProduct`) REFERENCES `product` (`idProduct`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `product_attribute`
--
ALTER TABLE `product_attribute`
  ADD CONSTRAINT `product_attribute_ibfk_1` FOREIGN KEY (`idAttrValue`) REFERENCES `attribute_value` (`idAttrValue`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `product_attribute_ibfk_2` FOREIGN KEY (`idProduct`) REFERENCES `product` (`idProduct`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `saleproduct`
--
ALTER TABLE `saleproduct`
  ADD CONSTRAINT `saleproduct_ibfk_1` FOREIGN KEY (`idProduct`) REFERENCES `product` (`idProduct`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `viewer`
--
ALTER TABLE `viewer`
  ADD CONSTRAINT `viewer_ibfk_1` FOREIGN KEY (`idProduct`) REFERENCES `product` (`idProduct`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `wishlist_ibfk_1` FOREIGN KEY (`idCustomer`) REFERENCES `customer` (`idCustomer`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `wishlist_ibfk_2` FOREIGN KEY (`idProduct`) REFERENCES `product` (`idProduct`) ON DELETE CASCADE ON UPDATE NO ACTION;

DELIMITER $$
--
-- Sự kiện
--
$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
