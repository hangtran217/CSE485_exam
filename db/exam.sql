-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 20, 2021 lúc 01:50 PM
-- Phiên bản máy phục vụ: 10.4.20-MariaDB
-- Phiên bản PHP: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `exam`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id_admin` int(10) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_admin`, `username`, `password`) VALUES
(1, 'hangtl', '123456');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_bomon`
--

CREATE TABLE `tbl_bomon` (
  `id_bomon` int(10) UNSIGNED NOT NULL,
  `bomon` varchar(255) NOT NULL,
  `id_khoa` int(10) UNSIGNED NOT NULL,
  `phong` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_bomon`
--

INSERT INTO `tbl_bomon` (`id_bomon`, `bomon`, `id_khoa`, `phong`) VALUES
(1, 'Văn phòng khoa', 1, 'P305'),
(2, 'Toán học', 1, 'P203');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_chucvu`
--

CREATE TABLE `tbl_chucvu` (
  `id_chucvu` int(10) UNSIGNED NOT NULL,
  `chucvu` varchar(255) NOT NULL,
  `id_bomon` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_chucvu`
--

INSERT INTO `tbl_chucvu` (`id_chucvu`, `chucvu`, `id_bomon`) VALUES
(1, 'Trưởng khoa: P204', 1),
(2, 'Phó trưởng khoa', 1),
(3, 'Trợ lý khoa', 1),
(4, 'Trưởng BM', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_congty`
--

CREATE TABLE `tbl_congty` (
  `id` int(10) UNSIGNED NOT NULL,
  `tencongty` varchar(255) NOT NULL,
  `maytruc` int(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `diachi` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_congty`
--

INSERT INTO `tbl_congty` (`id`, `tencongty`, `maytruc`, `email`, `diachi`, `website`) VALUES
(1, 'Đại học Thủy Lợi', 2132937, 'daihocthuyloi@tlu.edu.vn', '275 Tây Sơn, Hà Nội', 'daihocthuyloi.edu.vn');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_khoa`
--

CREATE TABLE `tbl_khoa` (
  `id` int(10) UNSIGNED NOT NULL,
  `khoa` varchar(255) NOT NULL,
  `maytruc` int(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `diachi` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  `id_congty` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_khoa`
--

INSERT INTO `tbl_khoa` (`id`, `khoa`, `maytruc`, `email`, `diachi`, `website`, `id_congty`) VALUES
(1, 'Công Nghệ Thông Tin', 243563221, 'vpkcntt@tlu.edu.vn', 'Tầng 2, Nhà C1', 'http://cse.tlu.edu.vn', 1),
(2, 'Ban Giám Hiệu', 1232132, 'bgh@tlu.edu.vn', '175 Tây Sơn', 'dhtl.edu.vn', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(10) UNSIGNED NOT NULL,
  `hoten` varchar(255) NOT NULL,
  `dtcoquan` int(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `dtdidong` int(10) NOT NULL,
  `id_chucvu` int(10) UNSIGNED NOT NULL,
  `id_bomon` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `hoten`, `dtcoquan`, `email`, `dtdidong`, `id_chucvu`, `id_bomon`) VALUES
(1, 'Nguyễn Thanh Tùng', 38521442, 'tungnt@tlu.edu.vn', 921312873, 1, 1),
(2, 'Đặng Thị Thu Hiền', 35632211, 'hiendtt@tlu.edu.vn', 975813542, 2, 1),
(3, 'Nguyễn Hữu Thọ', 23423432, 'thonh@tlu.edu.vn', 97819236, 4, 2),
(5, 'NA', 313, 'A@a.a', 32323, 4, 2),
(6, 'a', 0, ' a@a', 2, 1, 1),
(9, 'Trần Lệ Hằng', 123, 'hangtl@wru.vn', 95465435, 3, 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Chỉ mục cho bảng `tbl_bomon`
--
ALTER TABLE `tbl_bomon`
  ADD PRIMARY KEY (`id_bomon`),
  ADD KEY `id_khoa` (`id_khoa`);

--
-- Chỉ mục cho bảng `tbl_chucvu`
--
ALTER TABLE `tbl_chucvu`
  ADD PRIMARY KEY (`id_chucvu`),
  ADD KEY `id_bomon` (`id_bomon`);

--
-- Chỉ mục cho bảng `tbl_congty`
--
ALTER TABLE `tbl_congty`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_khoa`
--
ALTER TABLE `tbl_khoa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_congty` (`id_congty`);

--
-- Chỉ mục cho bảng `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_chucvu` (`id_chucvu`),
  ADD KEY `fk_bomon` (`id_bomon`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `tbl_bomon`
--
ALTER TABLE `tbl_bomon`
  ADD CONSTRAINT `fk_khoabm` FOREIGN KEY (`id_khoa`) REFERENCES `tbl_khoa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_chucvu`
--
ALTER TABLE `tbl_chucvu`
  ADD CONSTRAINT `fk_chucvubm` FOREIGN KEY (`id_bomon`) REFERENCES `tbl_bomon` (`id_bomon`);

--
-- Các ràng buộc cho bảng `tbl_khoa`
--
ALTER TABLE `tbl_khoa`
  ADD CONSTRAINT `fk_congty` FOREIGN KEY (`id_congty`) REFERENCES `tbl_congty` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD CONSTRAINT `fk_bomon` FOREIGN KEY (`id_bomon`) REFERENCES `tbl_bomon` (`id_bomon`),
  ADD CONSTRAINT `fk_chucvu_user` FOREIGN KEY (`id_chucvu`) REFERENCES `tbl_chucvu` (`id_chucvu`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
