-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th10 18, 2022 lúc 05:48 AM
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
  `Hoten` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NgaySinh` datetime NOT NULL,
  `GioiTinh` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `SĐT` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `CMND` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `DiaChi` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Usename` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`ID_admin`, `Hoten`, `Email`, `NgaySinh`, `GioiTinh`, `SĐT`, `CMND`, `DiaChi`, `Usename`) VALUES
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
  `Biển_số` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `car`
--

INSERT INTO `car` (`ID_car`, `ID_Khachhang`, `Company`, `Car_type`, `color`, `Biển_số`) VALUES
(1, 1, 'Yamaha', 'Yamaha-RSX', 'Đỏ', '43A-549.78'),
(2, 2, 'Toyota', 'Toyota2021', 'Đen', '37B-598.97');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giave`
--

CREATE TABLE `giave` (
  `ID_Giave` int(11) NOT NULL,
  `Time` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TG_BĐ` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `TG-KT` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Loại_vé` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Gia_ve` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `giave`
--

INSERT INTO `giave` (`ID_Giave`, `Time`, `TG_BĐ`, `TG-KT`, `Loại_vé`, `Gia_ve`) VALUES
(1, 'Sáng', '6h00', '17h00', 'Sáng', 5000),
(2, 'Tối', '17h00', '23h00', 'Tối', 7000),
(3, 'Đêm', '23h00', '6h00', 'Đêm', 10000),
(4, 'Ngày', NULL, NULL, '15000 VĐN/ ngày', 15000),
(5, 'Tuần', NULL, NULL, '100000 VNĐ/ tuần', 100000),
(6, 'Tháng', NULL, NULL, '400000 VNĐ/ tháng', 400000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `guixe`
--

CREATE TABLE `guixe` (
  `ID_Guixe` int(11) NOT NULL,
  `TimeIn` datetime NOT NULL,
  `TimeOut` datetime DEFAULT NULL,
  `TG_gui` int(25) DEFAULT NULL,
  `ID_car` int(11) NOT NULL,
  `ID_parking` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ID_giave` int(11) DEFAULT NULL,
  `Số_lượng` int(20) DEFAULT NULL,
  `Tổng` int(20) DEFAULT NULL,
  `ID_HoaDon` int(11) NOT NULL,
  `TrangThai` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `guixe`
--

INSERT INTO `guixe` (`ID_Guixe`, `TimeIn`, `TimeOut`, `TG_gui`, `ID_car`, `ID_parking`, `ID_giave`, `Số_lượng`, `Tổng`, `ID_HoaDon`, `TrangThai`) VALUES
(2, '2022-11-17 10:00:17', NULL, NULL, 1, 'P4', NULL, NULL, NULL, 1, 'Đang gửi'),
(3, '2022-11-17 10:00:38', NULL, NULL, 2, 'P5', NULL, NULL, NULL, 2, 'Đang gửi');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `ID_HoaDon` int(11) NOT NULL,
  `ID_Khachhang` int(11) DEFAULT NULL,
  `ID_Nhanvien` int(11) NOT NULL,
  `TrangThai` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hoadon`
--

INSERT INTO `hoadon` (`ID_HoaDon`, `ID_Khachhang`, `ID_Nhanvien`, `TrangThai`) VALUES
(1, 1, 1, 'Chưa thanh toán'),
(2, 2, 1, 'Chưa thanh toán');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `ID_Khachhang` int(11) NOT NULL,
  `Hoten` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `GioiTinh` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `SDT` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `CMND` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `DiaChi` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`ID_Khachhang`, `Hoten`, `GioiTinh`, `SDT`, `CMND`, `DiaChi`) VALUES
(1, 'Lê Trọng Hoàng Minh', 'Nam', '0342549381', '093482043112', 'Huế'),
(2, 'Mai Hoài Thương', 'Nữ', '0234932098', '030029834212', 'Quảng Trị');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `ID_Nhanvien` int(11) NOT NULL,
  `Hoten` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NgaySinh` datetime NOT NULL,
  `GioiTinh` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `SĐT` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `CMND` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `DiaChi` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Usename` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `TrangThai` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`ID_Nhanvien`, `Hoten`, `Email`, `NgaySinh`, `GioiTinh`, `SĐT`, `CMND`, `DiaChi`, `Usename`, `TrangThai`) VALUES
(1, 'Trần Hồng Đức', 'duc@gmail.com', '2002-03-22 13:20:20', 'Nam', '0349200239', '031243648210', 'Đà Nẵng', 'duc22', b'1'),
(2, 'Nguyễn Văn Khoa', 'khoa@gmail.com', '2002-02-02 15:11:24', 'Nam', '0928391234', '032349957387', 'Đà Nẵng', 'khoa', b'1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `parking`
--

CREATE TABLE `parking` (
  `ID_parking` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Parking_space` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TrangThai` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `parking`
--

INSERT INTO `parking` (`ID_parking`, `Parking_space`, `TrangThai`) VALUES
('P1', 'A1', 'Trống'),
('P2', 'A2', 'Trống'),
('P3', 'B1', 'Trống'),
('P4', 'B2', 'Đang gửi'),
('P5', 'C1', 'Đang gửi'),
('P6', 'C2', 'Trống');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `Usename` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Password` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Quyen` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`Usename`, `Password`, `Quyen`) VALUES
('duc22', '22032002', b'0'),
('khoa', '123', b'0'),
('trang', '123456', b'1');

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
-- Chỉ mục cho bảng `giave`
--
ALTER TABLE `giave`
  ADD PRIMARY KEY (`ID_Giave`);

--
-- Chỉ mục cho bảng `guixe`
--
ALTER TABLE `guixe`
  ADD PRIMARY KEY (`ID_Guixe`),
  ADD KEY `ID_Car` (`ID_car`),
  ADD KEY `ID_Giave` (`ID_giave`),
  ADD KEY `ID_Parking` (`ID_parking`),
  ADD KEY `ID_Hoadon` (`ID_HoaDon`);

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`ID_HoaDon`),
  ADD KEY `ID_KH1` (`ID_Khachhang`),
  ADD KEY `ID_NV1` (`ID_Nhanvien`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`ID_Khachhang`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`ID_Nhanvien`),
  ADD KEY `usename_2` (`Usename`);

--
-- Chỉ mục cho bảng `parking`
--
ALTER TABLE `parking`
  ADD PRIMARY KEY (`ID_parking`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`Usename`);

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
-- AUTO_INCREMENT cho bảng `giave`
--
ALTER TABLE `giave`
  MODIFY `ID_Giave` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `guixe`
--
ALTER TABLE `guixe`
  MODIFY `ID_Guixe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `ID_HoaDon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `ID_Khachhang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `ID_Nhanvien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `usename_1` FOREIGN KEY (`Usename`) REFERENCES `taikhoan` (`Usename`);

--
-- Các ràng buộc cho bảng `car`
--
ALTER TABLE `car`
  ADD CONSTRAINT `ID_KH` FOREIGN KEY (`ID_Khachhang`) REFERENCES `khachhang` (`ID_Khachhang`);

--
-- Các ràng buộc cho bảng `guixe`
--
ALTER TABLE `guixe`
  ADD CONSTRAINT `ID_Car` FOREIGN KEY (`ID_car`) REFERENCES `car` (`ID_car`),
  ADD CONSTRAINT `ID_Giave` FOREIGN KEY (`ID_giave`) REFERENCES `giave` (`ID_Giave`),
  ADD CONSTRAINT `ID_Hoadon` FOREIGN KEY (`ID_HoaDon`) REFERENCES `hoadon` (`ID_HoaDon`),
  ADD CONSTRAINT `ID_Parking` FOREIGN KEY (`ID_parking`) REFERENCES `parking` (`ID_parking`);

--
-- Các ràng buộc cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `ID_KH1` FOREIGN KEY (`ID_Khachhang`) REFERENCES `khachhang` (`ID_Khachhang`),
  ADD CONSTRAINT `ID_NV1` FOREIGN KEY (`ID_Nhanvien`) REFERENCES `nhanvien` (`ID_Nhanvien`);

--
-- Các ràng buộc cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD CONSTRAINT `usename_2` FOREIGN KEY (`Usename`) REFERENCES `taikhoan` (`Usename`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
