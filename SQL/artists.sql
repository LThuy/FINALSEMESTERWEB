-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 29, 2023 lúc 03:10 PM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `webmusics`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `artists`
--

CREATE TABLE `artists` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `artists`
--

INSERT INTO `artists` (`id`, `name`, `image`) VALUES
(1, 'Adele', 'artists/adele.jpg'),
(2, 'Beyonce', 'artists/beyonce.jpg'),
(3, 'Coldplay', 'artists/coldplay.jpg'),
(4, 'Daft Punk', 'artists/daftpunk.jpg'),
(5, 'Ed Sheeran', 'artists/edsheeran.jpg'),
(6, 'Hozier', 'artists/hozier.jpg'),
(7, 'Imagine Dragons', 'artists/imaginedragons.jpg'),
(8, 'Janelle Monae', 'artists/janellemonae.jpg'),
(9, 'Kendrick Lamar', 'artists/kendricklamar.jpg'),
(10, 'Lorde', 'artists/lorde.jpg'),
(11, 'Queen', 'artists/queen.jpg'),
(12, 'Radiohead', 'artists/radiohead.jpg'),
(13, 'St. Vincent', 'artists/stvincent.jpg'),
(14, 'Taylor Swift', 'artists/taylorswift.jpg'),
(15, 'Sơn Tùng M-TP', 'artists/son-tung-mtp.jpg'),
(16, 'Đen Vâu', 'artists/den-vau.jpg'),
(17, 'Bích Phương', 'artists/bich-phuong.jpg'),
(18, 'AMEE', 'artists/amee.jpg'),
(19, 'Karik', 'artists/karik.jpg'),
(20, 'Hương Tràm', 'artists/huong-tram.jpg'),
(21, 'Trúc Nhân', 'artists/truc-nhan.jpg'),
(22, 'Đức Phúc', 'artists/duc-phuc.jpg'),
(23, 'Hương Ly', 'artists/huong-ly.jpg'),
(24, 'Mr. Siro', 'artists/mr-siro.jpg'),
(25, 'Khắc Hưng', 'artists/khac-hung.jpg'),
(26, 'Soobin Hoàng Sơn', 'artists/soobin-hoang-son.jpg'),
(27, 'Thùy Chi', 'artists/thuy-chi.jpg'),
(28, 'Chi Dân', 'artists/chi-dan.jpg'),
(29, 'Trọng Hiếu', 'artists/trong-hieu.jpg'),
(30, 'Trịnh Thăng Bình', 'artists/trinh-thang-binh.jpg'),
(31, 'Erik', 'artists/erik.jpg'),
(32, 'Vũ Cát Tường', 'artists/vu-cat-tuong.jpg'),
(33, 'Tùng Dương', 'artists/tung-duong.jpg'),
(34, 'Phan Mạnh Quỳnh', 'artists/phan-manh-quynh.jpg');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `artists`
--
ALTER TABLE `artists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `artists`
--
ALTER TABLE `artists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
