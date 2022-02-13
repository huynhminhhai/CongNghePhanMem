-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 05, 2020 lúc 07:34 AM
-- Phiên bản máy phục vụ: 10.4.14-MariaDB
-- Phiên bản PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `voucher`
--
CREATE DATABASE IF NOT EXISTS `voucher` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `voucher`;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietdonhang`
--

CREATE TABLE `chitietdonhang` (
  `id` int(11) NOT NULL,
  `iddonhang` int(11) DEFAULT NULL,
  `idvoucher` int(11) DEFAULT NULL,
  `soluong` int(11) DEFAULT NULL,
  `giaban` decimal(18,0) DEFAULT NULL,
  `thanhtien` decimal(18,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `chitietdonhang`
--

INSERT INTO `chitietdonhang` (`id`, `iddonhang`, `idvoucher`, `soluong`, `giaban`, `thanhtien`) VALUES
(1, 4, 8, 1, '120000', '120000'),
(2, 5, 12, 1, '499000', '499000'),
(3, 6, 1, 1, '700000', '700000'),
(4, 7, 14, 1, '240000', '240000'),
(5, 8, 14, 1, '240000', '240000'),
(6, 9, 13, 1, '320000', '320000'),
(7, 10, 12, 1, '499000', '499000'),
(8, 11, 8, 1, '120000', '120000'),
(9, 12, 12, 1, '499000', '499000'),
(10, 13, 12, 1, '499000', '499000'),
(11, 14, 1, 1, '700000', '700000'),
(12, 15, 1, 1, '700000', '700000'),
(13, 16, 8, 1, '120000', '120000'),
(14, 17, 15, 1, '600000', '600000'),
(15, 18, 18, 1, '45000', '45000'),
(16, 19, 8, 1, '120000', '120000'),
(17, 20, 16, 1, '320000', '320000'),
(18, 21, 16, 1, '320000', '320000'),
(19, 22, 19, 1, '70000', '70000');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `id` int(11) NOT NULL,
  `ngaydathang` datetime DEFAULT NULL,
  `idkhachhang` int(11) DEFAULT NULL,
  `idvoucher` int(11) DEFAULT NULL,
  `sdt` varchar(10) DEFAULT NULL,
  `xacnhanthanhtoan` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `donhang`
--

INSERT INTO `donhang` (`id`, `ngaydathang`, `idkhachhang`, `idvoucher`, `sdt`, `xacnhanthanhtoan`) VALUES
(4, '2020-12-05 00:00:00', 29, 8, '0944444444', b'1'),
(5, '2020-12-05 00:00:00', 29, 12, '0944444444', b'1'),
(6, '2020-12-05 00:00:00', 29, 1, '0944444444', b'1'),
(7, '2020-12-05 00:00:00', 29, 14, '0944444444', b'1'),
(8, '2020-12-05 00:00:00', 29, 14, '0944444444', b'1'),
(9, '2020-12-05 00:00:00', 29, 13, '0944444444', b'1'),
(10, '2020-12-05 00:00:00', 31, 12, '083893939', b'1'),
(11, '2020-12-05 00:00:00', 31, 8, '083893939', b'1'),
(12, '2020-12-05 00:00:00', 31, 12, '083893939', b'1'),
(13, '2020-12-05 00:00:00', 31, 12, '083893939', b'1'),
(14, '2020-12-05 00:00:00', 31, 1, '083893939', b'1'),
(15, '2020-12-05 00:00:00', 31, 1, '083893939', b'1'),
(16, '2020-12-05 00:00:00', 31, 8, '083893939', b'1'),
(17, '2020-12-05 00:00:00', 31, 15, '083893939', b'1'),
(18, '2020-12-05 00:00:00', 31, 18, '083893939', b'1'),
(19, '2020-12-05 00:00:00', 29, 8, '0944444444', b'1'),
(20, '2020-12-05 00:00:00', 29, 16, '0944444444', b'1'),
(21, '2020-12-05 00:00:00', 29, 16, '0944444444', b'1'),
(22, '2020-12-05 00:00:00', 29, 19, '0944444444', b'1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `idkhachhang` int(11) NOT NULL,
  `tenkhachhang` varchar(100) DEFAULT NULL,
  `dienthoai` varchar(10) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `diachi` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`idkhachhang`, `tenkhachhang`, `dienthoai`, `email`, `diachi`) VALUES
(1, 'abcd', '09xxxxxx', 'xx@gmail.com', 'xxx'),
(29, 'Đường Nhu', '0944444444', 'duongnhu@gmail.com', 'Thành phố Hàng Châu'),
(30, 'Hoàng Thiếu Thiên', '095555555', 'lamvu@gmail.com', 'Lam Vũ'),
(31, 'Dụ Văn Châu', '083893939', 'vanchau@gmail.com', 'Lam Vũ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaivoucher`
--

CREATE TABLE `loaivoucher` (
  `id` int(11) NOT NULL,
  `ten` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `loaivoucher`
--

INSERT INTO `loaivoucher` (`id`, `ten`) VALUES
(1, 'Ẩm thực'),
(2, 'Spa & làm đẹp'),
(3, 'Giải trí'),
(4, 'Thể thao'),
(5, 'Hotel'),
(6, 'Tour du lịch'),
(7, 'Điện Tử');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `id` int(11) NOT NULL,
  `hoten` varchar(50) DEFAULT NULL,
  `ngaysinh` date DEFAULT NULL,
  `gioitinh` varchar(5) DEFAULT NULL,
  `dienthoai` varchar(10) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `diachi` varchar(100) DEFAULT NULL,
  `active` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`id`, `hoten`, `ngaysinh`, `gioitinh`, `dienthoai`, `email`, `diachi`, `active`) VALUES
(2, 'Nguyễn Văn b', '2000-12-24', 'Nam', '0912567613', 'b@gmail.com', 'TP.HCM', b'1'),
(14, 'Nguyễn Đại Phước', '2000-11-17', 'Nam', 'qwrq324', 'qwr@fawef', 'waef', b'1'),
(15, 'Tô Mộc Tranh', '2000-02-18', 'Nữ', '0999999999', 'mucheng@gmail.com', 'Hưng Hân', b'1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhomtaikhoan`
--

CREATE TABLE `nhomtaikhoan` (
  `id` int(11) NOT NULL,
  `ten` varchar(100) DEFAULT NULL,
  `mota` varchar(1000) DEFAULT NULL,
  `active` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `nhomtaikhoan`
--

INSERT INTO `nhomtaikhoan` (`id`, `ten`, `mota`, `active`) VALUES
(1, 'Admin', 'Admin hệ thống', b'1'),
(2, 'Nhân viên bán hàng', 'tư vấn online, liên hê khách hàng,...', b'1'),
(3, 'Khách hàng', 'chọn voucher,thanh toán,...', b'1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `username` varchar(50) NOT NULL,
  `matkhau` varchar(32) DEFAULT NULL,
  `idnhomtaikhoan` int(11) DEFAULT NULL,
  `active` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`username`, `matkhau`, `idnhomtaikhoan`, `active`) VALUES
('aaaaa', '1111111', 2, b'1'),
('admin', 'admin', 1, b'1'),
('customer', '123', 3, b'1'),
('duongnhu', '123456', 3, b'1'),
('MocVuTranhPhong', 'glory', 2, b'1'),
('NVBH1', 'BH123', 2, b'1'),
('thieuthien', '123456', 3, b'1'),
('vanchau', '123456', 3, b'1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoankh`
--

CREATE TABLE `taikhoankh` (
  `username` varchar(50) NOT NULL,
  `idkhachhang` int(11) DEFAULT NULL,
  `ngaytao` date DEFAULT NULL,
  `active` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `taikhoankh`
--

INSERT INTO `taikhoankh` (`username`, `idkhachhang`, `ngaytao`, `active`) VALUES
('customer', 1, '2020-12-01', b'1'),
('duongnhu', 29, '2020-12-04', b'1'),
('moctranh', 16, '2020-12-04', b'1'),
('thieuthien', 30, '2020-12-05', b'1'),
('vanchau', 31, '2020-12-05', b'1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoannv`
--

CREATE TABLE `taikhoannv` (
  `username` varchar(50) NOT NULL,
  `idnhanvien` int(11) DEFAULT NULL,
  `ngaytao` date DEFAULT NULL,
  `active` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `taikhoannv`
--

INSERT INTO `taikhoannv` (`username`, `idnhanvien`, `ngaytao`, `active`) VALUES
('aaaaa', 14, '2020-12-04', b'1'),
('MocVuTranhPhong', 15, '2020-12-04', b'1'),
('NVBH1', 2, '0000-00-00', b'1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `voucher`
--

CREATE TABLE `voucher` (
  `idvoucher` int(11) DEFAULT NULL,
  `id` int(11) NOT NULL,
  `ten` varchar(100) DEFAULT NULL,
  `mota` varchar(100) DEFAULT NULL,
  `code` char(10) DEFAULT NULL,
  `soluong` int(11) DEFAULT NULL,
  `hinhanh` varchar(100) DEFAULT NULL,
  `giaban` decimal(18,0) DEFAULT NULL,
  `ngaybatdau` date DEFAULT NULL,
  `ngayketthuc` date DEFAULT NULL CHECK (`ngayketthuc` > `ngaybatdau`),
  `cuahang` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `voucher`
--

INSERT INTO `voucher` (`idvoucher`, `id`, `ten`, `mota`, `code`, `soluong`, `hinhanh`, `giaban`, `ngaybatdau`, `ngayketthuc`, `cuahang`) VALUES
(7, 1, 'Voucher Bình Minh', 'Giảm giá khi mua hàng điện tử tại Bình Minh', 'BM0001', 96, 'voucher01.jpg', '700000', '2020-12-01', '2020-12-22', 'Bình Minh Store'),
(4, 8, 'Thể Thao Điện Tử', 'Voucher sử dụng sân thi đấu điện tử Esport trong 3 giờ', '3segser44', 95, 'XingXinIcon.jpg', '120000', '2020-12-10', '2020-12-16', 'Hưng Hân'),
(6, 12, 'Voucher Trường Phát ', 'Voucher trị giá 1.000.000 đồng cho các chuyến du lịch trong nước và quốc tế', 'DL01902', 8, 'voucher5.jpg', '499000', '2020-12-09', '2020-12-30', 'In Trường Phát'),
(6, 13, 'Voucher Quy Nhơn', 'Voucher giảm giá cho chuyển du lịch quy nhơn', 'DL011921', 29, 'hinh-anh-tung-bung-don-he-voi-voucher-du-lich-quy-nhon-sieu-hot-1.jpg', '320000', '2020-12-09', '2020-12-18', 'Ocean Travel'),
(7, 14, 'Gift Voucher K', 'Voucher tri giá 500.000đ cho chuyến du lịch Huế-Đà Lât', 'DL04324', 48, 'voucher-1.png', '240000', '2020-11-10', '2020-11-30', 'Khám phá di sản'),
(7, 15, 'Voucher Điện Tử Tiki 1.000.000đ', 'Voucher thiết bị điện tử tại tiki trị giá 1.000.000đ', 'DT00241', 88, '00a4bea3fb2d89cb7f820c224f52c13a.jpg', '600000', '2020-11-29', '2020-11-30', 'Tiki'),
(5, 16, 'PACKAGE VOUCHER', 'Voucher trị giá 999.000 VNĐ tại VNPOST hotel', 'HT90921', 43, 'voucher-khach-san.png', '320000', '2020-12-09', '2020-12-18', 'VNPOST hotel'),
(4, 17, 'Voucher hoc bóng đá', 'E-Voucher giảm 50% học phí khóa học 1 tháng', 'TT78789', 80, 'download.jfif', '20000', '2020-12-01', '2021-02-28', 'Trung tâm bóng đá thể thao Việt Nam'),
(3, 18, 'Voucher Sun World', 'voucher giảm giá vui chơi tại Sun World Halong Complex', 'GT88998', 99, '190128_sun-group-1.png', '45000', '2020-12-01', '2021-01-31', 'Sun World Halong Complex'),
(2, 19, 'Voucher Spa', 'Phiếu Voucher Mina Beauty Spa 399k', 'SP09031', 29, 'ba147a2c74d2c4f68495d28fadb7df56.jfif', '70000', '2020-12-02', '2020-12-15', 'Mina Beauty Spa '),
(1, 20, 'Voucher bún đạu', 'Voucher 40k cho set bún đậu 2 người ăn', 'AT80904', 30, 'voucher-am-thuc-an-uong-alan (13).jpg', '15000', '2020-12-09', '2020-12-22', 'Bún Đậu Alan');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`idkhachhang`),
  ADD UNIQUE KEY `email_unique` (`email`);

--
-- Chỉ mục cho bảng `loaivoucher`
--
ALTER TABLE `loaivoucher`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_emailnv` (`email`);

--
-- Chỉ mục cho bảng `nhomtaikhoan`
--
ALTER TABLE `nhomtaikhoan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ten` (`ten`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`username`);

--
-- Chỉ mục cho bảng `taikhoankh`
--
ALTER TABLE `taikhoankh`
  ADD PRIMARY KEY (`username`);

--
-- Chỉ mục cho bảng `taikhoannv`
--
ALTER TABLE `taikhoannv`
  ADD PRIMARY KEY (`username`);

--
-- Chỉ mục cho bảng `voucher`
--
ALTER TABLE `voucher`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `donhang`
--
ALTER TABLE `donhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `idkhachhang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT cho bảng `loaivoucher`
--
ALTER TABLE `loaivoucher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `nhomtaikhoan`
--
ALTER TABLE `nhomtaikhoan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `voucher`
--
ALTER TABLE `voucher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
