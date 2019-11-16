-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th10 16, 2019 lúc 03:01 AM
-- Phiên bản máy phục vụ: 5.7.24
-- Phiên bản PHP: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `sinhvien`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giangvien`
--

DROP TABLE IF EXISTS `giangvien`;
CREATE TABLE IF NOT EXISTS `giangvien` (
  `ma_gv` varchar(10) NOT NULL,
  `ho_gv` varchar(30) NOT NULL,
  `ten_gv` varchar(50) NOT NULL,
  `ma_khoa` varchar(10) NOT NULL,
  PRIMARY KEY (`ma_gv`),
  KEY `fk_gv_khoa` (`ma_khoa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `giangvien`
--

INSERT INTO `giangvien` (`ma_gv`, `ho_gv`, `ten_gv`, `ma_khoa`) VALUES
('GV001', 'Lê Thị Bích', 'Hằng', 'CNTT'),
('GV002', 'Nguyễn Văn', 'Bảo', 'CNTP'),
('GV003', 'Trần', 'Hưng', 'DDT'),
('GV004', 'Hồ Lam', 'Hải', 'QTKD'),
('GV005', 'Nguyễn Thị', 'Thu', 'NNA');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khoa`
--

DROP TABLE IF EXISTS `khoa`;
CREATE TABLE IF NOT EXISTS `khoa` (
  `ma_khoa` varchar(10) NOT NULL,
  `ten_khoa` varchar(50) NOT NULL,
  PRIMARY KEY (`ma_khoa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `khoa`
--

INSERT INTO `khoa` (`ma_khoa`, `ten_khoa`) VALUES
('CNTP', 'Công nghệ thực phẩm'),
('CNTT', 'Công nghệ thông tin'),
('DDT', 'Điện điện tử'),
('NNA', 'Ngôn ngữ Anh'),
('QTKD', 'Quản trị kinh doanh');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lop`
--

DROP TABLE IF EXISTS `lop`;
CREATE TABLE IF NOT EXISTS `lop` (
  `ma_lop` varchar(10) NOT NULL,
  `ten_lop` varchar(50) NOT NULL,
  `si_so` int(11) NOT NULL,
  `ma_khoa` varchar(10) NOT NULL,
  `ma_gvcv` varchar(10) NOT NULL,
  PRIMARY KEY (`ma_lop`),
  KEY `fk_lop_khoa` (`ma_khoa`),
  KEY `fk_lop_gv` (`ma_gvcv`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `lop`
--

INSERT INTO `lop` (`ma_lop`, `ten_lop`, `si_so`, `ma_khoa`, `ma_gvcv`) VALUES
('58CNTP1', '58 Công nghệ thực phẩm 1', 57, 'CNTP', 'GV001'),
('58CNTP2', '58 Công nghệ thực phẩm 2', 40, 'CNTP', 'GV002'),
('58CNTT1', '58 Công nghệ thông tin 1', 49, 'CNTT', 'GV001'),
('58DDT2', '58 Điện điện tử 2', 70, 'DDT', 'GV003'),
('58NNA2', '58 Ngôn ngữ Anh 2', 50, 'NNA', 'GV005'),
('58QTKD3', '58 Quản trị kinh doanh 3', 69, 'QTKD', 'GV004');

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `giangvien`
--
ALTER TABLE `giangvien`
  ADD CONSTRAINT `fk_gv_khoa` FOREIGN KEY (`ma_khoa`) REFERENCES `khoa` (`ma_khoa`);

--
-- Các ràng buộc cho bảng `lop`
--
ALTER TABLE `lop`
  ADD CONSTRAINT `fk_lop_gv` FOREIGN KEY (`ma_gvcv`) REFERENCES `giangvien` (`ma_gv`),
  ADD CONSTRAINT `fk_lop_khoa` FOREIGN KEY (`ma_khoa`) REFERENCES `khoa` (`ma_khoa`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
