-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 24, 2022 lúc 07:37 AM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `vuduy`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `permissions`
--

CREATE TABLE `permissions` (
  `id` int(11) NOT NULL,
  `permission` varchar(255) CHARACTER SET latin1 NOT NULL,
  `createuser` varchar(255) DEFAULT NULL,
  `deleteuser` varchar(255) DEFAULT NULL,
  `createbid` varchar(255) DEFAULT NULL,
  `updatebid` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `permissions`
--

INSERT INTO `permissions` (`id`, `permission`, `createuser`, `deleteuser`, `createbid`, `updatebid`) VALUES
(1, 'Superuser', NULL, '1', '1', '1'),
(2, 'Admin', NULL, NULL, '1', '1'),
(3, 'User', NULL, NULL, '1', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbladmin`
--

CREATE TABLE `tbladmin` (
  `ID` int(10) NOT NULL,
  `Staffid` varchar(255) DEFAULT NULL,
  `AdminName` varchar(120) DEFAULT NULL,
  `UserName` varchar(120) DEFAULT NULL,
  `FirstName` varchar(255) DEFAULT NULL,
  `LastName` varchar(255) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Status` int(11) NOT NULL DEFAULT 1,
  `Photo` varchar(255) CHARACTER SET latin1 NOT NULL DEFAULT 'avatar15.jpg',
  `Password` varchar(120) DEFAULT NULL,
  `AdminRegdate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbladmin`
--

INSERT INTO `tbladmin` (`ID`, `Staffid`, `AdminName`, `UserName`, `FirstName`, `LastName`, `MobileNumber`, `Email`, `Status`, `Photo`, `Password`, `AdminRegdate`) VALUES
(2, '10002', 'Admin', 'admin', 'NGUYEN', 'VU DUY  ', 949344976, 'nguyenvuduy.cm.vn@gmail.com', 0, '283993287_1390383934771927_29778322531071038_n.jpg', '81dc9bdb52d04dc20036dbd8313ed055', '2022-06-22 10:18:39'),
(31, '188736', 'Admin', 'VUDUY', 'VU DUY', 'NGUYEN', 9493449764, 'nguyenvuduy.cm.vn@gmail.com', 1, '283993287_1390383934771927_29778322531071038_n.jpg', '81dc9bdb52d04dc20036dbd8313ed055', '2022-05-30 02:58:47'),
(32, '188736', 'Superuser', 'VUDUY7', 'NGUYEN', 'NGUYENVUDUY', 949344976, 'test@gmail.com', 1, 'avatar15.jpg', '8e17840c85ea778f8bd9f38cd36228ae', '2022-06-24 03:32:16'),
(33, '188736', 'Superuser', 'test', 'NGUYEN', 'dddd', 949344976, 'nguyenvuduy@gmail.com', 1, 'avatar15.jpg', 'b59c67bf196a4758191e42f76670ceba', '2022-06-24 03:33:27');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tblbooking`
--

CREATE TABLE `tblbooking` (
  `BookingId` int(11) NOT NULL,
  `PackageId` int(11) DEFAULT NULL,
  `UserEmail` varchar(100) DEFAULT NULL,
  `FromDate` varchar(100) DEFAULT NULL,
  `ToDate` varchar(100) DEFAULT NULL,
  `Comment` mediumtext DEFAULT NULL,
  `RegDate` timestamp NULL DEFAULT current_timestamp(),
  `status` int(11) DEFAULT NULL,
  `CancelledBy` varchar(5) DEFAULT NULL,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `tblbooking`
--

INSERT INTO `tblbooking` (`BookingId`, `PackageId`, `UserEmail`, `FromDate`, `ToDate`, `Comment`, `RegDate`, `status`, `CancelledBy`, `UpdationDate`) VALUES
(19, 7, 'nguyenvuduy@gmail.com', '2022-05-30', '2022-05-31', 'test', '2022-05-30 09:55:57', 2, 'u', '2022-06-24 04:29:21'),
(20, 8, 'nguyenvuduy@gmail.com', '2022-06-04', '2022-06-03', 'test', '2022-06-01 08:07:07', 2, 'a', '2022-06-24 02:15:28'),
(21, 7, 'duy@gmail.com', '2022-06-08', '2022-06-25', 'dat cho', '2022-06-24 02:19:07', 1, NULL, '2022-06-24 03:34:02');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tblcompany`
--

CREATE TABLE `tblcompany` (
  `id` int(11) NOT NULL,
  `regno` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `companyname` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `companyemail` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `country` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `companyphone` int(10) NOT NULL,
  `companyaddress` varchar(255) CHARACTER SET latin1 NOT NULL,
  `companylogo` varchar(255) CHARACTER SET latin1 NOT NULL DEFAULT 'avatar15.jpg',
  `status` varchar(255) CHARACTER SET latin1 NOT NULL DEFAULT '0',
  `developer` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `creationdate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tblcompany`
--

INSERT INTO `tblcompany` (`id`, `regno`, `companyname`, `companyemail`, `country`, `companyphone`, `companyaddress`, `companylogo`, `status`, `developer`, `creationdate`) VALUES
(4, '1002', 'St. Paul Church', 'stpaul@gmail.com', 'Uganda', 770546590, 'Kyebando', 'church.jpg', '1', 'gerald', '2022-02-02 12:17:15');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbltourpackages`
--

CREATE TABLE `tbltourpackages` (
  `PackageId` int(11) NOT NULL,
  `PackageName` varchar(200) DEFAULT NULL,
  `PackageType` mediumtext DEFAULT NULL,
  `PackageLocation` varchar(10000) DEFAULT NULL,
  `PackagePrice` varchar(1100) DEFAULT NULL,
  `PackageFetures` varchar(255) DEFAULT NULL,
  `PackageDetails` mediumtext DEFAULT NULL,
  `PackageImage` varchar(100) DEFAULT NULL,
  `Creationdate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbltourpackages`
--

INSERT INTO `tbltourpackages` (`PackageId`, `PackageName`, `PackageType`, `PackageLocation`, `PackagePrice`, `PackageFetures`, `PackageDetails`, `PackageImage`, `Creationdate`, `UpdationDate`) VALUES
(7, 'Đại Nội Huế', 'Nằm ngay bên bờ sông Hương thơ mộng, Đại Nội Huế là một quần thế di tích văn hoá được công nhận là di tích văn hoá thế giới. Quần thế Đại Nội Huế bao ', 'Phú Hậu, Thành phố Huế, Thừa Thiên Huế', '100000', NULL, 'Đến thăm quan quần thể di tích Đại Nội Huế, địa điểm du lịch Huế bạn sẽ được chiêm ngưỡng những công trình cung điện nguy nga, đền đài và miếu thờ bề thế, đồ sộ mang đậm nét kiến trúc thời nhà Nguyễn. Không chỉ có cơ hội tìm hiểu thêm về lịch sử, bạn còn được tha hồ chụp ảnh trong không gian kiến trúc độc đáo này.\r\nĐặc biệt hơn nữa, mới đây Đại Nội Huế đã chính thức mở cửa đón khách thăm quan vào ban đêm từ 19 – 22h và đây chính là dịp để bạn “sở hữu” những bức ảnh tuyệt đẹp bên những công trình rực rỡ, lung linh ánh đèn. ', 'Dai-Noi-Hue-768x489.png', '2022-05-30 03:18:58', '2022-06-24 03:03:55'),
(11, 'Chùa Thiên Mụ', 'Nhắc đến các điểm tham quan Huế nhất định phải check-in mà bỏ qua Chùa Thiên Mụ thì thật là lãng phí. Chùa Thiên Mụ hay còn được gọi là chùa Linh Mụ, ', ' Đồi Hà Khê, Hương Hoà, Thành phố Huế, Thừa Thiên Huế', 'miễn phí', NULL, 'Khi đến đây, người người đều ấn tượng với tháp Phước Duyên được vua Thiệu Trị chỉ đạo khởi công. Tòa tháp bao gồm 7 tầng và mỗi tầng đều thờ một vị Phật khác nhau. Một điều bạn nhất định phải làm khi tới đây chính là ngắm hoàng hôn từ chùa Thiên Mụ và thưởng thức món đậu hũ đặc trưng ngay trước cổng chùa.', 'kinh-nghiem-di-chua-thien-mu-va-nhung-dieu-can-biet-1638814806.jpg', '2022-06-24 03:08:04', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tblusers`
--

CREATE TABLE `tblusers` (
  `id` int(11) NOT NULL,
  `FullName` varchar(100) DEFAULT NULL,
  `MobileNumber` char(10) DEFAULT NULL,
  `EmailId` varchar(70) DEFAULT NULL,
  `Password` varchar(100) DEFAULT NULL,
  `RegDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `tblusers`
--

INSERT INTO `tblusers` (`id`, `FullName`, `MobileNumber`, `EmailId`, `Password`, `RegDate`, `UpdationDate`) VALUES
(17, 'NGUYENVUDUY', '0949344976', 'nguyenvuduy@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '2022-05-30 09:54:45', NULL),
(18, 'NGUYENVUDUY', '9493449764', 'duy@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '2022-06-24 02:18:28', '2022-06-24 02:38:33');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `tblbooking`
--
ALTER TABLE `tblbooking`
  ADD PRIMARY KEY (`BookingId`);

--
-- Chỉ mục cho bảng `tblcompany`
--
ALTER TABLE `tblcompany`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbltourpackages`
--
ALTER TABLE `tbltourpackages`
  ADD PRIMARY KEY (`PackageId`);

--
-- Chỉ mục cho bảng `tblusers`
--
ALTER TABLE `tblusers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `EmailId` (`EmailId`),
  ADD KEY `EmailId_2` (`EmailId`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT cho bảng `tblbooking`
--
ALTER TABLE `tblbooking`
  MODIFY `BookingId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `tblcompany`
--
ALTER TABLE `tblcompany`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `tbltourpackages`
--
ALTER TABLE `tbltourpackages`
  MODIFY `PackageId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `tblusers`
--
ALTER TABLE `tblusers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
