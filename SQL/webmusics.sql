-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 07, 2023 lúc 01:19 PM
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
CREATE DATABASE IF NOT EXISTS `webmusics`;
USE `webmusics`;

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
('huydeptrai', 'Huy', 'Le', 'huytraceraner@gmail.com', '$2y$10$4M5iavCPP81hZ98lgIPj4OxrlqppkJRDEi0RdDlhtmdSlu3O6RYJa', b'1', 'e9811011ea3a14165a919297e881b24c'),
('tdt', 'Tôn', 'Đức Thắng', 'tdt@tdtu.edu.vn', '$2y$10$UA6d8dqFhh5T1WWWNZGeDetmVrMw8rGwndxxQijdKfBdte8z4l9wm', b'1', '123456');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `artists`
--

CREATE TABLE `artists` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `image` varchar(255) NOT NULL,
  `followers` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `artists`
--

INSERT INTO `artists` (`id`, `name`, `image`, `followers`) VALUES
(1, 'Ariana Grande', 'artists/ariana-grande.jpg', 135000000),
(2, 'Taylor Swift', 'artists/taylor-swift.jpg', 120000000),
(3, 'Ed Sheeran', 'artists/ed-sheeran.jpg', 100000000),
(4, 'BTS', 'artists/bts.jpg', 35000000),
(5, 'Billie Eilish', 'artists/billie-eilish.jpg', 80000000),
(6, 'Drake', 'artists/drake.jpg', 75000000),
(7, 'Dua Lipa', 'artists/dua-lipa.jpg', 20000000),
(8, 'Justin Bieber', 'artists/justin-bieber.jpg', 150000000),
(9, 'Shawn Mendes', 'artists/shawn-mendes.jpg', 50000000),
(10, 'The Weeknd', 'artists/the-weeknd.jpg', 40000000),
(11, 'Đen Vâu', 'artists/den-vau.jpg', 700000),
(12, 'Sơn Tùng M-TP', 'artists/son-tung-mtp.jpg', 5000000),
(13, 'Karik', 'artists/karik.jpg', 1000000),
(14, 'Bích Phương', 'artists/bich-phuong.jpg', 3000000),
(15, 'JustaTee', 'artists/justatee.jpg', 2000000),
(16, 'Trịnh Thăng Bình', 'artists/trinh-thang-binh.jpg', 500000),
(17, 'Tóc Tiên', 'artists/toc-tien.jpg', 1500000),
(18, 'Hương Tràm', 'artists/huong-tram.jpg', 2500000),
(19, 'Vũ Cát Tường', 'artists/vu-cat-tuong.jpg', 1000000),
(20, 'Soobin Hoàng Sơn', 'artists/soobin-hoang-son.jpg', 4000000),
(21, 'Adele', 'artists/adele.jpg', 60000000),
(22, 'Bruno Mars', 'artists/bruno-mars.jpg', 45000000),
(23, 'Coldplay', 'artists/coldplay.jpg', 35000000),
(24, 'Eminem', 'artists/eminem.jpg', 95000000),
(25, 'Katy Perry', 'artists/katy-perry.jpg', 110000000),
(26, 'Lady Gaga', 'artists/lady-gaga.jpg', 90000000),
(27, 'Maroon 5', 'artists/maroon-5.jpg', 70000000),
(28, 'Rihanna', 'artists/rihanna.jpg', 120000000),
(29, 'Selena Gomez', 'artists/selena-gomez.jpg', 25000000),
(30, 'Sia', 'artists/sia.jpg', 50000000);

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

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `songs`
--

CREATE TABLE `songs` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `artist` varchar(255) NOT NULL,
  `categories` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `listens` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `songs`
--

INSERT INTO `songs` (`id`, `name`, `artist`, `categories`, `image`, `link`, `listens`) VALUES
(1, 'Love Story', 'Taylor Swift', 'Pop', 'poster/love_story.jpg', 'musics/Taylor Swift -Love Story.mp3', 1000000),
(2, 'Blinding Lights', 'The Weeknd', 'Pop', 'poster/blinding_lights.jpg', 'musics/blinding-lights-official-audio.mp3', 5000000),
(3, 'Dynamite', 'BTS', 'K-pop', 'poster/dynamite.jpg', 'musics/BTS-Dynamite.mp3', 3000000),
(4, 'Shape of You', 'Ed Sheeran', 'Pop', 'poster/shape_of_you.jpg', 'musics/Ed Sheeran-Shape Of You.mp3', 8000000),
(5, 'Good 4 U', 'Olivia Rodrigo', 'Pop', 'poster/good_4_u.jpg', 'musics/Olivia Rodrigo-good 4.mp3', 4000000),
(6, 'Don\'t Start Now', 'Dua Lipa', 'Pop', 'poster/dont_start_now.jpg', 'musics/Dua Lipa  Dont Start Now.mp3', 2000000),
(7, 'Drivers License', 'Olivia Rodrigo', 'Pop', 'poster/drivers_license.jpg', 'musics/Olivia Rodrigo  drivers license.mp3', 6000000),
(8, 'I Don\'t Care', 'Ed Sheeran & Justin Bieber', 'Pop', 'poster/i_dont_care.jpg', 'musics/Ed Sheeran  Justin Bieber  I Dont Care.mp3', 900000),
(9, 'Senorita', 'Shawn Mendes & Camila Cabello', 'Pop', 'poster/senorita.jpg', 'musics/Señorita  Shawn Mendes Camila Cabello.mp3', 7000000),
(10, 'Bad Guy', 'Billie Eilish', 'Pop', 'poster/bad_guy.jpg', 'musics/Billie Eilish  bad guy.mp3', 10000000),
(11, 'Thank U, Next', 'Ariana Grande', 'Pop', 'poster/thank_u_next.jpg', 'musics/Ariana Grande  thank u next.mp3', 4000000),
(12, 'Rain On Me', 'Lady Gaga & Ariana Grande', 'Pop', 'poster/rain_on_me.jpg', 'musics/Lady Gaga Ariana Grande  Rain On Me.mp3', 2000000),
(13, 'Peaches', 'Justin Bieber ft. Daniel Caesar & Giveon', 'Pop', 'poster/peaches.jpg', 'musics/Justin Bieber  Peaches ft Daniel Caesar Giveon.mp3', 500000),
(14, 'Industry Baby', 'Lil Nas X ft. Jack Harlow', 'Hip-hop', 'poster/industry_baby.jpg', 'musics/Lil Nas X  Industry Baby Lyrics ft Jack Harlow.mp3', 800000),
(15, 'Montero (Call Me By Your Name)', 'Lil Nas X', 'Hip-hop', 'poster/montero.jpg', 'musics/Lil Nas X  MONTERO Call Me By Your Name.mp3', 1200000),
(16, 'Hãy Trao Cho Anh', 'Sơn Tùng M-TP', 'V-pop', 'poster/hay_trao_cho_anh.jpg', 'musics/hay-trao-cho-anh.mp3', 23568976),
(17, 'Lạc Trôi', 'Sơn Tùng M-TP', 'V-pop', 'poster/lac_troi.jpg', 'musics/Lạc Trôi.mp3', 9876543),
(18, 'Chạy Ngay Đi', 'Sơn Tùng M-TP', 'V-pop', 'poster/chay_ngay_di.jpg', 'musics/chay-ngay-di.mp3', 12547896),
(19, 'Một Triệu Like', 'Đen Vâu ft. MTV', 'Hip-hop', 'poster/mot_trieu_like.jpg', 'musics/Đen  một triệu like ft Thành Đồng', 3456789),
(20, 'Bài Này Chill Phết', 'Đen Vâu', 'Hip-hop', 'poster/bai_nay_chill_phet.jpg', 'musics/Bài này chill phết  Đen ft MIN.mp3', 7845632),
(21, 'Ghen', 'Erik ft. Min', 'V-pop', 'poster/ghen.jpg', 'musics/GHEN  KHẮC HƯNG x MIN x ERIK.mp3', 2345678),
(22, 'Em Gái Mưa', 'Hương Tràm', 'V-pop', 'poster/em_gai_mua.jpg', 'musics/EM GÁI MƯA  HƯƠNG TRÀM.mp3', 8734561),
(23, 'Nơi Này Có Anh', 'Sơn Tùng M-TP', 'V-pop', 'poster/noi_nay_co_anh.jpg', 'musics/noi-nay-co-anh.mp3', 1678432),
(24, 'Người Lạ Ơi', 'Karik ft. Orange, Superbrothers', 'V-pop', 'poster/nguoi_la_oi.jpg', 'musics/Người Lạ Ơi  Karik Orange.mp3', 3178945),
(25, 'Đi Đu Đưa Đi', 'Bích Phương', 'V-pop', 'poster/di_du_dua_di.jpg', 'musics/Đi Đu Đưa Đi  BÍCH PHƯƠNG.mp3', 6542347);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `song_categories`
--

CREATE TABLE `song_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `song_categories`
--

INSERT INTO `song_categories` (`id`, `name`, `image`) VALUES
(1, 'Pop', 'categories/pop.jpg'),
(2, 'Rock', 'categories/rock.jpg'),
(3, 'Hip-Hop', 'categories/hiphop.jpg'),
(4, 'Country', 'categories/country.jpg'),
(5, 'Electronic', 'categories/electronic.jpg'),
(6, 'Classical', 'categories/classical.jpg'),
(7, 'Jazz', 'categories/jazz.jpg'),
(8, 'Reggae', 'categories/reggae.jpg'),
(9, 'Blues', 'categories/blues.jpg'),
(10, 'Folk', 'categories/folk.jpg'),
(11, 'Indie', 'categories/indie.jpg'),
(12, 'Metal', 'categories/metal.jpg'),
(13, 'R&B', 'categories/rnb.jpg'),
(14, 'Soul', 'categories/soul.jpg'),
(15, 'Gospel', 'categories/gospel.jpg'),
(16, 'Latin', 'categories/latin.jpg'),
(17, 'World', 'categories/world.jpg'),
(18, 'Funk', 'categories/funk.jpg'),
(19, 'Punk', 'categories/punk.jpg'),
(20, 'V-POP', 'categories/vpop.jpg'),
(21, 'K-POP', 'categories/kpop.jpg');

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
-- Chỉ mục cho bảng `artists`
--
ALTER TABLE `artists`
  ADD PRIMARY KEY (`id`);

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
-- Chỉ mục cho bảng `songs`
--
ALTER TABLE `songs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `song_categories`
--
ALTER TABLE `song_categories`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `artists`
--
ALTER TABLE `artists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT cho bảng `favsong`
--
ALTER TABLE `favsong`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT cho bảng `song`
--
ALTER TABLE `song`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `songs`
--
ALTER TABLE `songs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `song_categories`
--
ALTER TABLE `song_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
