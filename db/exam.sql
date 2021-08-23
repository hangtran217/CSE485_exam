-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 23, 2021 lúc 04:49 PM
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
-- Cấu trúc bảng cho bảng `tbl_coquan`
--

CREATE TABLE `tbl_coquan` (
  `id_coquan` int(10) NOT NULL,
  `tendonvi` varchar(255) NOT NULL,
  `diachi` varchar(255) NOT NULL,
  `sdt` int(11) NOT NULL,
  `email_coquan` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  `id_cha` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_coquan`
--

INSERT INTO `tbl_coquan` (`id_coquan`, `tendonvi`, `diachi`, `sdt`, `email_coquan`, `website`, `id_cha`) VALUES
(1, 'ĐHTL', '175 Tây Sơn', 23123, 'dhtl@tlu.edu.vn', 'dhtl.tlu.edu.vn', 1),
(2, 'Khoa công nghệ thông tin', 'Nhà C, ĐHTL', 41231, 'cse@tlu.edu.vn', 'cse.tlu.edu.vn', 1),
(3, 'BM Hệ thống thông tin', 'P205 Nhà C, ĐHTL', 4232, 'httt@tlu.edu.vn', '', 2),
(4, 'Khoa Kinh tế và Quản lý', 'Nhà A2, ĐHTL', 3821237, 'fem@tlu.edu.vn', 'http://fem.tlu.edu.vn/', 1),
(5, 'BM Kinh tế', 'P205 Nhà A2, ĐHTL', 9273812, 'femkt@tlu.edu.vn', 'http://femkt.tlu.edu.vn', 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(10) UNSIGNED NOT NULL,
  `hoten` varchar(255) NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dtcoquan` varchar(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `dtdidong` varchar(15) NOT NULL,
  `chucvu` varchar(255) NOT NULL,
  `id_coquan` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `hoten`, `image`, `dtcoquan`, `email`, `dtdidong`, `chucvu`, `id_coquan`) VALUES
(1, 'Nguyễn Thanh Tùng', 'image/nguyenthanhtung.png', '032132', 'tungnt@tlu.edu.vn', '01171711', 'Trưởng khoa', 2),
(13, 'Kiều Tuấn Dũng', 'image/KieuTuanDung.jpg', '0328726139', 'dungkt@tlu.edu.vn', '097238746', 'Giảng viên', 3),
(14, 'Đặng Thị Thu Hiền', 'image/DangThuHien.png', '028723249', 'hiendt@tlu.edu.vn', '097412346', 'Trưởng bộ môn', 3),
(15, 'Trịnh Minh Thụ ', 'image/trinhminhthu.jpg', '0928723249', 'thutm@tlu.edu.vn', '0984332346', 'Hiệu trưởng', 1),
(25, 'Trần Quốc Hưng', '/image/tranquochung.jpg', '092371928', 'hungtq@tlu.edu.vn', '092371283', 'Trưởng Bộ môn', 5);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Chỉ mục cho bảng `tbl_coquan`
--
ALTER TABLE `tbl_coquan`
  ADD PRIMARY KEY (`id_coquan`),
  ADD KEY `id_cha` (`id_cha`);

--
-- Chỉ mục cho bảng `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_coquan` (`id_coquan`),
  ADD KEY `id_coquan_2` (`id_coquan`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_coquan`
--
ALTER TABLE `tbl_coquan`
  MODIFY `id_coquan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `tbl_coquan`
--
ALTER TABLE `tbl_coquan`
  ADD CONSTRAINT `tbl_coquan_ibfk_1` FOREIGN KEY (`id_cha`) REFERENCES `tbl_coquan` (`id_coquan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD CONSTRAINT `fk_coquan_canbo` FOREIGN KEY (`id_coquan`) REFERENCES `tbl_coquan` (`id_coquan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
