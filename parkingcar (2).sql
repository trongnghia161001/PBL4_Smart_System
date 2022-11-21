-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th10 21, 2022 lúc 06:19 PM
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
-- Cơ sở dữ liệu: `parkingcar`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `ID_admin` int(11) NOT NULL,
  `Name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Date_of_birth` datetime NOT NULL,
  `Sex` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Number_phone` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `CMND` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Address` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Usename` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`ID_admin`, `Name`, `Email`, `Date_of_birth`, `Sex`, `Number_phone`, `CMND`, `Address`, `Usename`) VALUES
(1, 'Đào Thủy Trang', 'trang@gmail.com', '2002-04-24 13:14:20', 'Nữ', '0235263129', '032200331923', 'Ninh Bình', 'trang');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `car`
--

CREATE TABLE `car` (
  `ID_car` int(11) NOT NULL,
  `ID_Khachhang` int(11) DEFAULT NULL,
  `Company` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Car_type` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `License_plate` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `car`
--

INSERT INTO `car` (`ID_car`, `ID_Khachhang`, `Company`, `Car_type`, `color`, `License_plate`) VALUES
(1, 1, 'Yamaha', 'Yamaha-RSX', 'Đỏ', '43A-549.78'),
(2, 2, 'Toyota', 'Toyota2021', 'Đen', '37B-598.97');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `parking`
--

CREATE TABLE `parking` (
  `ID_parking` int(11) NOT NULL,
  `TimeIn` datetime NOT NULL,
  `TimeOut` datetime DEFAULT NULL,
  `TG_parking` int(25) DEFAULT NULL,
  `ID_car` int(11) NOT NULL,
  `ID_parking_lot` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ID_ticket_price` int(11) DEFAULT NULL,
  `amount` int(20) DEFAULT NULL,
  `Sum` int(20) DEFAULT NULL,
  `ID_invoice` int(11) NOT NULL,
  `TrangThai` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `parking`
--

INSERT INTO `parking` (`ID_parking`, `TimeIn`, `TimeOut`, `TG_parking`, `ID_car`, `ID_parking_lot`, `ID_ticket_price`, `amount`, `Sum`, `ID_invoice`, `TrangThai`) VALUES
(2, '2022-11-17 10:00:17', NULL, NULL, 1, 'P4', NULL, NULL, NULL, 1, 'Đang gửi'),
(3, '2022-11-17 10:00:38', NULL, NULL, 2, 'P5', NULL, NULL, NULL, 2, 'Đang gửi');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID_admin`),
  ADD KEY `usename_1` (`Usename`);

--
-- Chỉ mục cho bảng `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`ID_car`),
  ADD KEY `ID_KH` (`ID_Khachhang`);

--
-- Chỉ mục cho bảng `parking`
--
ALTER TABLE `parking`
  ADD PRIMARY KEY (`ID_parking`),
  ADD KEY `ID_Car` (`ID_car`),
  ADD KEY `ID_Parking` (`ID_parking_lot`),
  ADD KEY `ID_ticket_price` (`ID_ticket_price`),
  ADD KEY `ID_invoice` (`ID_invoice`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `ID_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `car`
--
ALTER TABLE `car`
  MODIFY `ID_car` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `parking`
--
ALTER TABLE `parking`
  MODIFY `ID_parking` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `usename_1` FOREIGN KEY (`Usename`) REFERENCES `account` (`Usename`);

--
-- Các ràng buộc cho bảng `car`
--
ALTER TABLE `car`
  ADD CONSTRAINT `ID_KH` FOREIGN KEY (`ID_Khachhang`) REFERENCES `customer` (`ID_Customer`);

--
-- Các ràng buộc cho bảng `parking`
--
ALTER TABLE `parking`
  ADD CONSTRAINT `ID_Car` FOREIGN KEY (`ID_car`) REFERENCES `car` (`ID_car`),
  ADD CONSTRAINT `ID_Parking` FOREIGN KEY (`ID_parking_lot`) REFERENCES `parkinglot` (`ID_parking_lot`),
  ADD CONSTRAINT `ID_invoice` FOREIGN KEY (`ID_invoice`) REFERENCES `invoice` (`ID_invoice`),
  ADD CONSTRAINT `ID_ticket_price` FOREIGN KEY (`ID_ticket_price`) REFERENCES `ticketsprice` (`ID_tickets_price`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
