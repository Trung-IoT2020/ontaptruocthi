-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th1 02, 2021 lúc 03:50 AM
-- Phiên bản máy phục vụ: 5.7.28
-- Phiên bản PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `demolaravel`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_12_02_033213_create_tbl_admin_table', 1),
(5, '2020_12_02_053849_create_tbl_doanhmuc_sanpham', 2),
(6, '2020_12_04_063432_create_tbl_thuonghieu_sanpham', 3),
(7, '2020_12_04_063719_create_tbl_doanhmuc_sanpham', 4),
(8, '2020_12_04_075314_create_tbl_sanpham', 5),
(9, '2020_12_04_153256_create_tbl_sanpham', 6),
(10, '2020_12_04_171948_create_tbl_thuonghieu_sanpham', 7);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_admin`
--

DROP TABLE IF EXISTS `tbl_admin`;
CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `admin_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `admin_mail` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_password` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_phone` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_mail`, `admin_password`, `admin_name`, `admin_phone`, `created_at`, `updated_at`) VALUES
(1, 'admin@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'root', '0924016865', '2020-12-01 17:00:00', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_doanhmuc_sanpham`
--

DROP TABLE IF EXISTS `tbl_doanhmuc_sanpham`;
CREATE TABLE IF NOT EXISTS `tbl_doanhmuc_sanpham` (
  `sanpham_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `sanpham_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sanpham_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sanpham_loai` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`sanpham_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_doanhmuc_sanpham`
--

INSERT INTO `tbl_doanhmuc_sanpham` (`sanpham_id`, `sanpham_name`, `sanpham_desc`, `sanpham_loai`, `created_at`, `updated_at`) VALUES
(1, 'Điện thoại', 'Liên lạc thông tin', 1, NULL, NULL),
(2, 'pin dự phòng', 'hỗ trợ sạc nhanh', 1, NULL, NULL),
(3, 'Tai Nghe', 'sang trọng', 1, NULL, NULL),
(4, 'óp lưng', 'bảo vệ điện thoại', 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_sanpham`
--

DROP TABLE IF EXISTS `tbl_sanpham`;
CREATE TABLE IF NOT EXISTS `tbl_sanpham` (
  `sanpham_chinh_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `sanpham_id` int(11) NOT NULL,
  `thuonghieu_id` int(11) NOT NULL,
  `sanpham_chinh_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sanpham_chinh_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sanpham_chinh_content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sanpham_chinh_price` int(255) NOT NULL,
  `sanpham_chinh_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sanpham_chinh_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`sanpham_chinh_id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_sanpham`
--

INSERT INTO `tbl_sanpham` (`sanpham_chinh_id`, `sanpham_id`, `thuonghieu_id`, `sanpham_chinh_name`, `sanpham_chinh_desc`, `sanpham_chinh_content`, `sanpham_chinh_price`, `sanpham_chinh_image`, `sanpham_chinh_status`, `created_at`, `updated_at`) VALUES
(4, 1, 1, 'iphone 11 pro max', 'iphone thương hiệu đứng đầu.', '256GB, chụp hình full đẹp', 19900000, 'iphone11promax91.jpg', 1, NULL, NULL),
(6, 1, 1, 'iphone 12 pro max', '123', '123', 30900000, '1_55_3_2_1_160.jpg', 1, NULL, NULL),
(7, 1, 1, 'iphone 7 plus 128GB', 'ổn định trong phân khúc 6-7trieu', 'Màn hình:LED-backlit IPS LCD 5.5 inch\r\nHệ điều hành - CPU:iOS 11\r\nCamera sau:12 MP (f/1.8, 28mm, 1/3\r\nCamera trước:7 MP (f/2.2, 32mm)\r\nRAM:3GB\r\nBộ nhớ trong:128GB\r\nThẻ nhớ:Không hỗ trợ\r\nThẻ sim:1 Nano SIM\r\nDung lượng pin:2900 mAh', 6500000, 'iPhone-7-plus-jetback51.png', 1, NULL, NULL),
(8, 1, 1, 'điện thoại', 'Trông ngoại hình khá giống nhau, tuy nhiên Galaxy Note 10 Plus 256GB-Bản Mỹ-Mới 100% Fullbox sở hữu khá nhiều điểm khác biệt so với Galaxy Note 10 và đây được xem là một trong những chiếc máy đáng mua nhất trong năm 2019, đặc biệt dành cho những người thích một chiếc máy màn hình lớn, camera chất lượng hàng đầu.', 'Thông số kỹ thuật\r\nThân Máy\r\nKích Thước	162.3 x 77.2 x 7.9 mm (6.39 x 3.04 x 0.31 in)\r\nKhối Lượng	196 g (6.91 oz)\r\nSIM	1 SIM \r\nMàn hình\r\nCông nghệ	Dynamic AMOLED, cảm ứng điện dung, 16 triệu màu, HDR 10+\r\nĐộ phân giải	1440 x 3040 pixels, (~489 ppi)\r\nKích thước	6.8 inches, 114.0 cm2\r\nBảo vệ	Corning Gorilla Glass 6\r\nHệ điều hành - CPU\r\nHệ điều hành	Android 9.0 (Pie), Upgradable lên Android 10.0, One UI\r\nChipset	Qualcomm SDM855 Snapdragon 855 (7 nm)\r\nHiệu suất CPU	\r\n - 1 nhân 2.8 GHz Kryo 485\r\n\r\n - 3 nhân 2.4 GHz Kryo 485\r\n\r\n - 4 nhân 1.7 GHz Kryo 485\r\n\r\nĐồ họa (GPU)	Adreno 640\r\nBộ nhớ máy\r\nRam	12GB\r\nBộ nhớ trong	256GB\r\nThẻ nhớ ngoài	microSD, hỗ trợ thẻ nhớ dung lượng 1TB\r\nCamera sau\r\nĐộ phân giải	\r\n - 12 MP, khẩu độ f/1.5-2.4, tiêu cự 27mm (ống kính chính), 1/2.55\", 1.4µm\r\n\r\n - 12 MP, khẩu độ f/2.1, tiêu cự 52mm (ống kính tele), 1/3.6\", 1.0µm\r\n\r\n - 16 MP,khẩu độ f/2.2, tiêu cự 12mm (ống kính góc rộng), 1.0µm\r\n\r\n - TOF 3D VGA camera\r\n\r\nTính năng	LED flash, auto HDR, chụp toàn cảnh, chống rung quang học kép (OIS), chụp ban đêm, lấy nét kép theo pha, zoom 2x\r\nQuay video	2160p@30/60fps, 1080p@30/60/240fps, 720p@960fps\r\nHDR10+, dual-video rec., stereo sound rec., gyro-EIS & OIS\r\n\r\nCamera trước\r\nĐộ phân giải	10 MP, khẩu độ f/2.2, tiêu cự 26mm (wide), 1.22µm\r\nTính năng	\r\nGọi video kép, HDR tự động\r\n\r\n2160p@30fps, 1080p@30fps\r\n\r\nÂm thanh\r\nLoa ngoài	\r\nÂm thanh nổi, loa kép\r\n\r\nTai nghe	\r\n - Chuẩn kết nối Type-C\r\n\r\n - Âm thanh 32-bit/384kHz\r\n\r\n - Khử tiếng ồn chủ động\r\n\r\n- Dolby Atmos/AKG\r\n\r\nKết nối\r\nWLAN	 Wi-Fi 802.11 a/b/g/n/ac/ax, dual-band, Wi-Fi Direct, hotspot\r\nBluetooth	 v5.0, A2DP, LE, aptX\r\nGPS	 GPS và A-GPS, GLONASS, BDS, GALILEO\r\nUSB	 3.1, Type-C 1.0 \r\nPin & sạc\r\nDung lượng	 4.300 mAh\r\nLoại pin	Non-removable Li-Ion\r\nChuẩn kết nối	Type C\r\nCông nghệ	\r\n Sạc nhanh 45W\r\n\r\n Sạc không dây 15W\r\n\r\n Sạc không dây ngược 9W', 13990000, 'galaxyA5192.jfif', 2, NULL, NULL),
(9, 1, 1, 'điện thoại samsung note 10', 'Trông ngoại hình khá giống nhau, tuy nhiên Galaxy Note 10 Plus 256GB-Bản Mỹ-Mới 100% Fullbox sở hữu khá nhiều điểm khác biệt so với Galaxy Note 10 và đây được xem là một trong những chiếc máy đáng mua nhất trong năm 2019, đặc biệt dành cho những người thích một chiếc máy màn hình lớn, camera chất lượng hàng đầu.', 'Thông số kỹ thuật\r\nThân Máy\r\nKích Thước	162.3 x 77.2 x 7.9 mm (6.39 x 3.04 x 0.31 in)\r\nKhối Lượng	196 g (6.91 oz)\r\nSIM	1 SIM \r\nMàn hình\r\nCông nghệ	Dynamic AMOLED, cảm ứng điện dung, 16 triệu màu, HDR 10+\r\nĐộ phân giải	1440 x 3040 pixels, (~489 ppi)\r\nKích thước	6.8 inches, 114.0 cm2\r\nBảo vệ	Corning Gorilla Glass 6\r\nHệ điều hành - CPU\r\nHệ điều hành	Android 9.0 (Pie), Upgradable lên Android 10.0, One UI\r\nChipset	Qualcomm SDM855 Snapdragon 855 (7 nm)\r\nHiệu suất CPU	\r\n - 1 nhân 2.8 GHz Kryo 485\r\n\r\n - 3 nhân 2.4 GHz Kryo 485\r\n\r\n - 4 nhân 1.7 GHz Kryo 485\r\n\r\nĐồ họa (GPU)	Adreno 640\r\nBộ nhớ máy\r\nRam	12GB\r\nBộ nhớ trong	256GB\r\nThẻ nhớ ngoài	microSD, hỗ trợ thẻ nhớ dung lượng 1TB\r\nCamera sau\r\nĐộ phân giải	\r\n - 12 MP, khẩu độ f/1.5-2.4, tiêu cự 27mm (ống kính chính), 1/2.55\", 1.4µm\r\n\r\n - 12 MP, khẩu độ f/2.1, tiêu cự 52mm (ống kính tele), 1/3.6\", 1.0µm\r\n\r\n - 16 MP,khẩu độ f/2.2, tiêu cự 12mm (ống kính góc rộng), 1.0µm\r\n\r\n - TOF 3D VGA camera\r\n\r\nTính năng	LED flash, auto HDR, chụp toàn cảnh, chống rung quang học kép (OIS), chụp ban đêm, lấy nét kép theo pha, zoom 2x\r\nQuay video	2160p@30/60fps, 1080p@30/60/240fps, 720p@960fps\r\nHDR10+, dual-video rec., stereo sound rec., gyro-EIS & OIS\r\n\r\nCamera trước\r\nĐộ phân giải	10 MP, khẩu độ f/2.2, tiêu cự 26mm (wide), 1.22µm\r\nTính năng	\r\nGọi video kép, HDR tự động\r\n\r\n2160p@30fps, 1080p@30fps\r\n\r\nÂm thanh\r\nLoa ngoài	\r\nÂm thanh nổi, loa kép\r\n\r\nTai nghe	\r\n - Chuẩn kết nối Type-C\r\n\r\n - Âm thanh 32-bit/384kHz\r\n\r\n - Khử tiếng ồn chủ động\r\n\r\n- Dolby Atmos/AKG\r\n\r\nKết nối\r\nWLAN	 Wi-Fi 802.11 a/b/g/n/ac/ax, dual-band, Wi-Fi Direct, hotspot\r\nBluetooth	 v5.0, A2DP, LE, aptX\r\nGPS	 GPS và A-GPS, GLONASS, BDS, GALILEO\r\nUSB	 3.1, Type-C 1.0 \r\nPin & sạc\r\nDung lượng	 4.300 mAh\r\nLoại pin	Non-removable Li-Ion\r\nChuẩn kết nối	Type C\r\nCông nghệ	\r\n Sạc nhanh 45W\r\n\r\n Sạc không dây 15W\r\n\r\n Sạc không dây ngược 9W', 13990000, 'samsungnote10p0.jfif', 1, NULL, NULL),
(10, 1, 1, 'iphone 10 plus', 'iPhone XS 64GB Like new 99% - Fullbox sở hữu bộ vi xử lý mạnh mẽ và thông minh nhất từ trước tới nay trong thế giới smartphone, đồng thời hệ thống camera kép cũng được nâng lên một tầm cao mới.', 'Thông số kỹ thuật\r\nThân Máy\r\nKích Thước	143.6 x 70.9 x 7.7 mm (5.65 x 2.79 x 0.30 in)\r\nKhối Lượng	177 g (6.24 oz) \r\nSIM	1 SIM Nano và 1 eSIM\r\nMàn hình\r\nCông nghệ	Super Retina OLED, cảm ứng điện dung, 16 triệu màu, HDR 10, Dolby Vision, độ sáng màn hình 625 nits, tần số quét cảm ứng 120Hz\r\nĐộ phân giải	1125 x 2436 pixels, 19.5:9 ratio (~458 ppi density)\r\nKích thước	5.8 inches, 84.4 cm2\r\nBảo vệ	Corning Gorilla Glass\r\nHệ điều hành - CPU\r\nHệ điều hành	iOS 12, upgradable to iOS 13.3\r\nChipset	Apple A12 Bionic (7 nm)\r\nHiệu suất CPU	\r\n - 2 nhân 2.5 GHz Vortex\r\n\r\n - 4 nhân 1.6 GHz Tempest\r\n\r\nĐồ họa (GPU)	Apple GPU 4 nhân\r\nBộ nhớ máy\r\nRam	4GB\r\nBộ nhớ trong	64GB\r\nThẻ nhớ ngoài	không hỗ trợ\r\nCamera sau\r\nĐộ phân giải	\r\n - 12 MP, hẩu độ f/1.8, tiêu cự 26mm, 1/2.55\", 1.4µm\r\n\r\n - 12 MP, khẩu độ f/2.4, tiêu cự 52mm (telephoto camera), 1/3.4\", 1.0µm\r\n\r\nTính năng	Đèn flash Quad-LED dual-tone, auto HDR, chụp toàn cảnh, zoom 2x, lấy nét theo pha, chống quang học (OIS)\r\nQuay video	2160p@24/30/60fps, 1080p@30/60/120/240fps\r\nHDR10, stereo sound rec.\r\n\r\nCamera trước\r\nĐộ phân giải	\r\n - 7 MP, khẩu độ f/2.2, tiêu cự 32mm\r\n\r\nTính năng	\r\nGọi video kép, HDR tự động\r\n\r\n2160p@24/30/60fps, 1080p@30/60/120fps,  chống rung điện tử (gyro-EIS)\r\n\r\nÂm thanh\r\nLoa ngoài	\r\nÂm thanh nổi, loa kép\r\n\r\nTai nghe	\r\n - Chuẩn kết nối Lightning\r\n\r\n- Khử tiếng ồn chủ động\r\n\r\nKết nối\r\nWLAN	 Wi-Fi 802.11 a/b/g/n/ac/ax, dual-band, hotspot\r\nBluetooth	 5.0, A2DP, LE\r\nGPS	 GPS và A-GPS, GLONASS, GALILEO, QZSS\r\nUSB	 2.0\r\nPin & sạc\r\nDung lượng	2.658 mAh\r\nLoại pin	Non-removable Li-Ion\r\nChuẩn kết nối	Lightning\r\nCông nghệ	\r\n Sạc nhanh 15W\r\n\r\n Sạc không dây\r\n\r\nThời gian chờ 	\r\n72h', 13990000, 'iphone_xr_64gb_157.webp', 1, NULL, NULL),
(11, 1, 1, 'điện thoại', '123123', '123123123', 1231231, 'note2099.jfif', 1, NULL, NULL),
(12, 1, 1, 'iphone 6', 'So với đàn em iPhone 6s, ngoại hình iPhone 6s Plus đã qua sử dụng không có gì khác biệt, ngoại trừ việc dày hơn 0.2mm và nặng hơn 20 gram (192 gram so với 172 gram). Ngoài ra, iPhone 6s Plus sử dụng chất liệu nhôm hoàn toàn mới để chế tác, với đặc trưng là cứng và bền hơn.\r\n\r\nĐồng thời, mặt kính phía trước cũng cứng cáp hơn. Máy có thêm một tông màu mới là vàng hồng, bên cạnh 3 màu quen thuộc bạc, vàng sâm panh và ghi.', 'Màn hìnhLED-backlit IPS LCD, 5.5\", Retina HDHệ điều hànhiOS 9Camera sau12 MPCamera trước5 MPCPUApple A9 2 nhân 64-bitRAM2 GBBộ nhớ trong (ROM)16/ 32/ 64GBHỗ trợ thẻ nhớKhôngThẻ Sim1 SIM, Nano SIMDung lượng pin2750 mAh', 4090000, 'iphone659.jpg', 1, NULL, NULL),
(13, 1, 1, 'xiaomi', '123', '123', 2090000, 'samsungnote10p53.jfif', 1, NULL, NULL),
(14, 1, 2, 'iphone 11 pro max', '123', '123', 20900000, 'iphone11promax82.jpg', 2, NULL, NULL),
(15, 1, 1, 'điện thoại 123', '1231311', '313123', 19900000, '1_55_3_2_1_168.jpg', 1, NULL, NULL),
(16, 1, 1, 'iphone 11 pro max', 'đẹp quá', 'cấu hình chi tiết quá chi tiết', 20000000, '1_55_3_2_1_153.jpg', 1, NULL, NULL),
(17, 1, 1, 'iphone 12 pro max', 'sang trọng quý phái', 'vượt xa tưởng tượng', 30900000, 'iphone11promax88.jpg', 1, NULL, NULL),
(18, 2, 4, 'pin 10000A', 'xiaomi bền bĩ', 'pin 10000A', 509000, 'pinxiaomi16.png', 1, NULL, NULL),
(19, 2, 1, 'Pin Iphone', 'Đẳng cấp thương hiệu', '>=10000A', 1000000, 'pinIphone61.jpg', 1, NULL, NULL),
(20, 1, 1, 'iphone 11 pro max', '123', '123', 123, '1_55_3_2_1_191.jpg', 1, NULL, NULL),
(21, 1, 1, 'điện thoại', '1233123', '1231233', 1231231, 'iphone11promax62.jpg', 1, NULL, NULL),
(22, 1, 1, 'điện thoại', 'ưqe', 'qưe', 1231231, 'iphone11promax21.jpg', 1, NULL, NULL),
(23, 3, 1, 'tai nghe iphone', 'airpods 2', 'đủ sàng điệu', 3600000, 'tai-nghe-bluetooth-airpods-2-wireless-charge-mrxj2-avatar-1-600x60093.jpg', 1, NULL, NULL),
(25, 2, 3, 'abv', '31313', '12313123123', 13990000, 'logo3.png', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_thuonghieu_sanpham`
--

DROP TABLE IF EXISTS `tbl_thuonghieu_sanpham`;
CREATE TABLE IF NOT EXISTS `tbl_thuonghieu_sanpham` (
  `thuonghieu_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `thuonghieu_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thuonghieu_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `thuonghieu_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`thuonghieu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
