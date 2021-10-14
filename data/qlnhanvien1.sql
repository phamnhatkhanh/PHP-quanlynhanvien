-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 29, 2021 lúc 01:01 AM
-- Phiên bản máy phục vụ: 10.1.28-MariaDB
-- Phiên bản PHP: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `qlnhanvien1`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `t_nhanvien`
--

CREATE TABLE `t_nhanvien` (
  `MaNV` int(11) NOT NULL,
  `HoLotNV` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `TenNV` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `GioiTinh` int(11) NOT NULL,
  `DienThoai` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `DiaChi` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `MaPhong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `t_nhanvien`
--

INSERT INTO `t_nhanvien` (`MaNV`, `HoLotNV`, `TenNV`, `GioiTinh`, `DienThoai`, `DiaChi`, `MaPhong`) VALUES
(1, 'Lê Võ', 'Yến', 0, '0946845715', 'P7 - Cà Mau\r\n', 3),
(2, 'Trần Trọng', 'Hiếu', 1, '0887578941', 'P2 - Cà Mau', 3),
(3, 'Lý Công', 'Bằng', 1, '0795654159', 'P6- Cà Mau', 1),
(4, 'Bùi Lê', 'Diễm', 0, '0886789145', 'Đông Hải - Bạc Liêu', 2),
(5, 'Lê Minh', 'Tú', 1, '0966847125', 'Tân Thành - Cà Mau', 2),
(6, 'Nguyễn', 'Linh', 1, '0946514784', 'An Xuyên - Cà Mau', 3),
(7, 'Nguyễn Thị', 'Nga', 0, '0336741578', 'Cái Răng - Cần Thơ', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `t_phong`
--

CREATE TABLE `t_phong` (
  `MaPhong` int(11) NOT NULL,
  `TenPhong` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `DienThoai` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `KhuVuc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `t_phong`
--

INSERT INTO `t_phong` (`MaPhong`, `TenPhong`, `DienThoai`, `KhuVuc`) VALUES
(1, 'Tổ chức Hành chính', '3894512', 1),
(2, 'Quản lý Nhân sự', '3854125', 1),
(3, 'Kế toán Tài chính', '3862123', 2),
(4, 'Vật tư Thiết bị', '3878152', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `t_quanly`
--

CREATE TABLE `t_quanly` (
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `pass` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `t_quanly`
--

INSERT INTO `t_quanly` (`name`, `pass`) VALUES
('admin', '123456'),
('lena', '123');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `t_nhanvien`
--
ALTER TABLE `t_nhanvien`
  ADD PRIMARY KEY (`MaNV`),
  ADD KEY `MaPhong` (`MaPhong`);

--
-- Chỉ mục cho bảng `t_phong`
--
ALTER TABLE `t_phong`
  ADD PRIMARY KEY (`MaPhong`);

--
-- Chỉ mục cho bảng `t_quanly`
--
ALTER TABLE `t_quanly`
  ADD PRIMARY KEY (`name`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `t_nhanvien`
--
ALTER TABLE `t_nhanvien`
  MODIFY `MaNV` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `t_phong`
--
ALTER TABLE `t_phong`
  MODIFY `MaPhong` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `t_nhanvien`
--
ALTER TABLE `t_nhanvien`
  ADD CONSTRAINT `t_nhanvien_ibfk_1` FOREIGN KEY (`MaPhong`) REFERENCES `t_phong` (`MaPhong`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
