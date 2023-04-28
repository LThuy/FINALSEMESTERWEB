-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 28, 2023 lúc 04:13 PM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

CREATE DATABASE IF NOT EXISTS `webmusics`;
USE `webmusics`;
--
-- Cơ sở dữ liệu: `webmusics`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account`
--

CREATE TABLE `account` (
  `username` varchar(64) NOT NULL,
  `firstname` varchar(64) NOT NULL,
  `lastname` varchar(64) NOT NULL,
  `email` varchar(64) NOT NULL,
  `password` varchar(255) NOT NULL,
  `activated` bit(1) DEFAULT b'0',
  `activate_token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `account`
--

INSERT INTO `account` (`username`, `firstname`, `lastname`, `email`, `password`, `activated`, `activate_token`) VALUES
('admin', 'Quản', 'Trị Viên', 'admin@gmail.com', '$2y$10$UA6d8dqFhh5T1WWWNZGeDetmVrMw8rGwndxxQijdKfBdte8z4l9wm', b'1', '123456'),
('tdt', 'Tôn', 'Đức Thắng', 'tdt@tdtu.edu.vn', '$2y$10$UA6d8dqFhh5T1WWWNZGeDetmVrMw8rGwndxxQijdKfBdte8z4l9wm', b'1', '123456');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `favsong`
--

CREATE TABLE `favsong` (
  `id` int(11) NOT NULL,
  `namesong` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `usernameid` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `favsong`
--

INSERT INTO `favsong` (`id`, `namesong`, `author`, `link`, `image`, `usernameid`) VALUES
(40, 'Hãy Trao Cho Anh', 'Sơn Tung MTP', 'musics/hay-trao-cho-anh.mp3', 'poster/1.jpg', 'admin');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `reset_token`
--

CREATE TABLE `reset_token` (
  `email` varchar(64) NOT NULL,
  `token` varchar(255) NOT NULL,
  `expire_on` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `reset_token`
--

INSERT INTO `reset_token` (`email`, `token`, `expire_on`) VALUES
('admin@gmail.com', '', 0),
('tdt@tdtu.edu.vn', '', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `song`
--

CREATE TABLE `song` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `song`
--

INSERT INTO `song` (`id`, `name`, `author`, `link`, `image`) VALUES
(1, 'Hãy Trao Cho Anh', 'Sơn Tung MTP', 'musics/hay-trao-cho-anh.mp3', 'poster/1.jpg'),
(2, 'Đúng Cũng Thành Sai', 'Mỹ Tâm', 'musics/dung-cung-thanh-sai.mp3', 'poster/2.jpg'),
(3, 'Lối Nhỏ', 'Đen Vâu ft Phương Đào', 'musics/loi-nho.mp3', 'poster/4.jpg'),
(4, 'Khỏi Phải Make-up ', 'Ricky Star - Bùi Công Nam', 'musics/KHỎI PHẢI MAKE UP.mp3', 'poster/5.jpg'),
(5, 'Blinding Lights', 'The Weeknd', 'musics/blinding-lights-official-audio.mp3', 'poster/6.jpg'),
(6, '24H', 'LYLY', 'musics/24H-LyLy-Magazine.mp3', 'poster/7.jpg'),
(7, 'The Applause', 'Lady Gaga', 'musics/Applause - Lady GaGa [128kbps_MP3].mp3', 'poster/8.jpg'),
(8, 'Bad At Love', 'Halsey', 'musics/Bad At Love - Halsey.mp3', 'poster/9.jpg'),
(9, 'Bailando', ' Enrique Iglesias', 'musics/Bailando - Enrique Iglesias_.mp3', 'poster/10.jpg'),
(10, 'Bạn Hay Là Yêu', 'Vicky Nhung', 'musics/Bạn hay là yêu -Vicky-Nhung.mp3', 'poster/11.jpg'),
(11, 'Bâng Khuâng', 'Justatee', 'musics/Bâng Khuâng.mp3', 'poster/12.jpg'),
(12, 'El Farsante', 'Ozuna', 'musics/El Farsante - Ozuna [128kbps_MP3].mp3', 'poster/13.jpg'),
(13, 'My Heart Will Go On ', 'Celine Dion', 'musics/My-Heart-Will-Go-On-Celine-Dion.mp3', 'poster/14.jpg');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Chỉ mục cho bảng `favsong`
--
ALTER TABLE `favsong`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `reset_token`
--
ALTER TABLE `reset_token`
  ADD PRIMARY KEY (`email`);

--
-- Chỉ mục cho bảng `song`
--
ALTER TABLE `song`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `favsong`
--
ALTER TABLE `favsong`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT cho bảng `song`
--
ALTER TABLE `song`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
