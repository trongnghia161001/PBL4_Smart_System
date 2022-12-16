-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th12 16, 2022 lúc 07:32 AM
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
-- Cơ sở dữ liệu: `smartparkingcar`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account`
--

CREATE TABLE `account` (
  `Username` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `Password` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `Office` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `account`
--

INSERT INTO `account` (`Username`, `Password`, `Office`) VALUES
('duc', '22032002', b'0'),
('dung', '12072002', b'0'),
('trang', '123456', b'1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `ID_admin` int(11) NOT NULL,
  `Name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Birthday` datetime NOT NULL,
  `Sex` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `Phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `CMND` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Username` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`ID_admin`, `Name`, `Email`, `Birthday`, `Sex`, `Phone`, `CMND`, `Address`, `Username`) VALUES
(1, 'Đào Thuỷ Trang', 'trang@gmail.com', '2002-04-24 14:00:00', 'Nữ', '0343969468', '037302002782', 'Đà Nẵng', 'trang');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `car`
--

CREATE TABLE `car` (
  `ID_car` int(11) NOT NULL,
  `ID_customer` int(11) NOT NULL,
  `Company` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Car_type` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `Color` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `License_plate` varchar(25) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `car`
--

INSERT INTO `car` (`ID_car`, `ID_customer`, `Company`, `Car_type`, `Color`, `License_plate`) VALUES
(1, 2, 'Yamaha', 'Yamaha-RSX', 'Đỏ', '43A54978'),
(2, 1, 'Toyota', 'Toyota2021', 'Đen', '37B59897');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `check`
--

CREATE TABLE `check` (
  `ID_check` int(11) NOT NULL,
  `License_plate` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `TimeIn` datetime NOT NULL,
  `TimeOut` datetime DEFAULT NULL,
  `ID_car` int(11) DEFAULT NULL,
  `Status` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `check`
--

INSERT INTO `check` (`ID_check`, `License_plate`, `TimeIn`, `TimeOut`, `ID_car`, `Status`) VALUES
(1, '43A54978', '2022-12-12 05:59:10', NULL, 1, b'1'),
(2, '43A56578', '2022-12-12 05:59:54', NULL, NULL, b'0'),
(3, '37B59897', '2022-12-12 06:00:33', NULL, 2, b'1'),
(4, '37B59897', '2022-12-16 05:13:36', NULL, 2, b'1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer`
--

CREATE TABLE `customer` (
  `ID_Customer` int(11) NOT NULL,
  `Name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Sex` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `Gmail` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Birthday` datetime NOT NULL,
  `Phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `CMND` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Username` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Status` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `customer`
--

INSERT INTO `customer` (`ID_Customer`, `Name`, `Sex`, `Gmail`, `Birthday`, `Phone`, `CMND`, `Address`, `Username`, `Status`) VALUES
(1, 'Trần Hồng Đức', 'Nam', 'duc@gmail.com', '2002-03-22 11:46:47', '0392563721', '036203005589', 'Đà Nẵng', 'duc', b'1'),
(2, 'Ngô Tấn Dũng', 'Nam', 'dung@gmail.com', '2002-07-12 11:49:48', '0349829009', '037803002458', 'Đà Nẵng', 'dung', b'1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `invoice`
--

CREATE TABLE `invoice` (
  `ID_invoice` int(11) NOT NULL,
  `ID_bill` int(11) NOT NULL,
  `ID_customer` int(11) NOT NULL,
  `ID_admin` int(11) NOT NULL,
  `Status` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `invoice`
--

INSERT INTO `invoice` (`ID_invoice`, `ID_bill`, `ID_customer`, `ID_admin`, `Status`) VALUES
(1, 2, 1, 1, b'0'),
(2, 3, 2, 1, b'0');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `parking`
--

CREATE TABLE `parking` (
  `ID_parking` int(11) NOT NULL,
  `Location` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `Amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `parking`
--

INSERT INTO `parking` (`ID_parking`, `Location`, `Amount`) VALUES
(1, 'Hải Châu', 20);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ticketsprice`
--

CREATE TABLE `ticketsprice` (
  `ID_tickets_price` int(11) NOT NULL,
  `Time` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `TG_BĐ` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TG_KT` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Ticket_type` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `Tickets_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `ticketsprice`
--

INSERT INTO `ticketsprice` (`ID_tickets_price`, `Time`, `TG_BĐ`, `TG_KT`, `Ticket_type`, `Tickets_price`) VALUES
(1, 'Sáng', '6h00', '17h00', 'Sáng', 5000),
(2, 'Tối', '17h00', '23h00', 'Tối', 7000),
(3, 'Đêm', '23h00', '6h00', 'Đêm', 10000),
(4, 'Ngày', NULL, NULL, 'Ngày', 15000);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`Username`);

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID_admin`),
  ADD KEY `Username` (`Username`);

--
-- Chỉ mục cho bảng `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`ID_car`),
  ADD KEY `ID_customer` (`ID_customer`);

--
-- Chỉ mục cho bảng `check`
--
ALTER TABLE `check`
  ADD PRIMARY KEY (`ID_check`),
  ADD KEY `ID_car` (`ID_car`);

--
-- Chỉ mục cho bảng `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`ID_Customer`),
  ADD KEY `Username` (`Username`);

--
-- Chỉ mục cho bảng `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`ID_invoice`),
  ADD KEY `ID_customer` (`ID_customer`),
  ADD KEY `ID_admin` (`ID_admin`),
  ADD KEY `ID_bill` (`ID_bill`);

--
-- Chỉ mục cho bảng `parking`
--
ALTER TABLE `parking`
  ADD PRIMARY KEY (`ID_parking`);

--
-- Chỉ mục cho bảng `ticketsprice`
--
ALTER TABLE `ticketsprice`
  ADD PRIMARY KEY (`ID_tickets_price`);

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
-- AUTO_INCREMENT cho bảng `check`
--
ALTER TABLE `check`
  MODIFY `ID_check` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `customer`
--
ALTER TABLE `customer`
  MODIFY `ID_Customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `invoice`
--
ALTER TABLE `invoice`
  MODIFY `ID_invoice` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `parking`
--
ALTER TABLE `parking`
  MODIFY `ID_parking` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `ticketsprice`
--
ALTER TABLE `ticketsprice`
  MODIFY `ID_tickets_price` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`Username`) REFERENCES `account` (`Username`);

--
-- Các ràng buộc cho bảng `car`
--
ALTER TABLE `car`
  ADD CONSTRAINT `car_ibfk_1` FOREIGN KEY (`ID_customer`) REFERENCES `customer` (`ID_Customer`);

--
-- Các ràng buộc cho bảng `check`
--
ALTER TABLE `check`
  ADD CONSTRAINT `check_ibfk_1` FOREIGN KEY (`ID_car`) REFERENCES `car` (`ID_car`);

--
-- Các ràng buộc cho bảng `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`Username`) REFERENCES `account` (`Username`);

--
-- Các ràng buộc cho bảng `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `invoice_ibfk_2` FOREIGN KEY (`ID_customer`) REFERENCES `customer` (`ID_Customer`),
  ADD CONSTRAINT `invoice_ibfk_3` FOREIGN KEY (`ID_admin`) REFERENCES `admin` (`ID_admin`),
  ADD CONSTRAINT `invoice_ibfk_4` FOREIGN KEY (`ID_bill`) REFERENCES `bill` (`ID_bill`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
