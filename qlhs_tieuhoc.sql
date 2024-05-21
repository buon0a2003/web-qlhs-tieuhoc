-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2024 at 04:58 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qlhs_tieuhoc`
--

-- --------------------------------------------------------

--
-- Table structure for table `chitietdiem`
--

CREATE TABLE `chitietdiem` (
  `id_chitietdiem` int(11) NOT NULL,
  `mamon` int(11) DEFAULT NULL,
  `mahocsinh` int(11) DEFAULT NULL,
  `diem_giua_ki1` int(11) NOT NULL,
  `diem_ki1` int(11) NOT NULL,
  `diem_giua_ki2` int(11) NOT NULL,
  `diem_ki2` int(11) NOT NULL,
  `ghichu` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chitietdiem`
--

INSERT INTO `chitietdiem` (`id_chitietdiem`, `mamon`, `mahocsinh`, `diem_giua_ki1`, `diem_ki1`, `diem_giua_ki2`, `diem_ki2`, `ghichu`) VALUES
(1, 1, 1, 5, 5, 7, 7, 'không có'),
(2, 2, 1, 6, 6, 5, 5, NULL),
(4, 1, 2, 5, 5, 3, 3, NULL),
(5, 2, 2, 9, 9, 10, 10, NULL),
(6, 3, 2, 8, 8, 8, 8, NULL),
(7, 1, 3, 6, 7, 8, 9, NULL),
(8, 2, 3, 7, 8, 9, 6, NULL),
(9, 3, 3, 8, 9, 10, 7, NULL),
(12, 3, 1, 8, 8, 6, 6, 'aaa');

-- --------------------------------------------------------

--
-- Table structure for table `giaovien`
--

CREATE TABLE `giaovien` (
  `gvid` int(11) NOT NULL,
  `hotengv` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `ngay_sinh` date NOT NULL,
  `diachi` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `sdt` varchar(20) DEFAULT NULL,
  `mamon` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `giaovien`
--

INSERT INTO `giaovien` (`gvid`, `hotengv`, `ngay_sinh`, `diachi`, `sdt`, `mamon`) VALUES
(1, 'giao vien a', '1990-01-01', 'hà nội', '1234567', 1),
(2, 'giao vien b', '1990-11-09', 'hải phòng', '923579265', 2),
(3, 'giao vien c', '1980-12-12', 'thanh hóa', '352352326', 3);

-- --------------------------------------------------------

--
-- Table structure for table `hocsinh`
--

CREATE TABLE `hocsinh` (
  `hsid` int(11) NOT NULL,
  `tenhs` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `gioitinh` enum('male','female') DEFAULT NULL,
  `ngaysinh` date NOT NULL,
  `sdtbome` varchar(50) NOT NULL,
  `diachi` varchar(50) NOT NULL,
  `malop` int(11) NOT NULL,
  `ghichu` varchar(50) DEFAULT 'NULL'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hocsinh`
--

INSERT INTO `hocsinh` (`hsid`, `tenhs`, `gioitinh`, `ngaysinh`, `sdtbome`, `diachi`, `malop`, `ghichu`) VALUES
(1, 'xơn', 'male', '2018-01-02', '424749237', 'hải phòng', 1, 'ngu'),
(2, 'kiên', 'female', '2018-10-09', '235437456', 'địa ngục', 2, 'thông minh'),
(3, 'dũng', 'male', '2018-04-07', '556256356', 'hà nội', 3, 'không có');

-- --------------------------------------------------------

--
-- Table structure for table `lop`
--

CREATE TABLE `lop` (
  `lopid` int(11) NOT NULL,
  `ten_lop` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lop`
--

INSERT INTO `lop` (`lopid`, `ten_lop`) VALUES
(1, '1A'),
(2, '1B'),
(3, '1C');

-- --------------------------------------------------------

--
-- Table structure for table `monhoc`
--

CREATE TABLE `monhoc` (
  `idmonhoc` int(11) NOT NULL,
  `tenmon` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `monhoc`
--

INSERT INTO `monhoc` (`idmonhoc`, `tenmon`) VALUES
(1, 'toán'),
(2, 'tiếng việt'),
(3, 'tiếng anh');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL,
  `tenrole` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `capdo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `tenrole`, `capdo`) VALUES
(1, 'giám hiệu', 0),
(2, 'giáo viên', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `role_id`) VALUES
(111, 'admin', '827ccb0eea8a706c4c34a16891f84e7b', 1),
(222, 'giaovien', '01cfcd4f6b8770febfb40cb906715822', 2);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_chitiet_hs_tienganh`
-- (See below for the actual view)
--
CREATE TABLE `view_chitiet_hs_tienganh` (
`id_chitietdiem` int(11)
,`hsid` int(11)
,`tenhs` varchar(50)
,`gioitinh` enum('male','female')
,`ngaysinh` date
,`diem_giua_ki1` int(11)
,`diem_ki1` int(11)
,`diem_giua_ki2` int(11)
,`diem_ki2` int(11)
,`TB` decimal(17,4)
,`ghichu` varchar(50)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_chitiet_hs_tiengviet`
-- (See below for the actual view)
--
CREATE TABLE `view_chitiet_hs_tiengviet` (
`id_chitietdiem` int(11)
,`hsid` int(11)
,`tenhs` varchar(50)
,`gioitinh` enum('male','female')
,`ngaysinh` date
,`diem_giua_ki1` int(11)
,`diem_ki1` int(11)
,`diem_giua_ki2` int(11)
,`diem_ki2` int(11)
,`TB` decimal(17,4)
,`ghichu` varchar(50)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_chitiet_hs_toan`
-- (See below for the actual view)
--
CREATE TABLE `view_chitiet_hs_toan` (
`id_chitietdiem` int(11)
,`hsid` int(11)
,`tenhs` varchar(50)
,`gioitinh` enum('male','female')
,`ngaysinh` date
,`diem_giua_ki1` int(11)
,`diem_ki1` int(11)
,`diem_giua_ki2` int(11)
,`diem_ki2` int(11)
,`TB` decimal(17,4)
,`ghichu` varchar(50)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_hs_diem_tb`
-- (See below for the actual view)
--
CREATE TABLE `view_hs_diem_tb` (
`tenhs` varchar(50)
,`tenmon` varchar(50)
,`ngaysinh` date
,`diemtbmon` decimal(17,4)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_hs_tongket_tb`
-- (See below for the actual view)
--
CREATE TABLE `view_hs_tongket_tb` (
`hsid` int(11)
,`tenhs` varchar(50)
,`tienganhTB` decimal(17,4)
,`tiengvietTB` decimal(17,4)
,`toanTB` decimal(17,4)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_thong_tin_hs`
-- (See below for the actual view)
--
CREATE TABLE `view_thong_tin_hs` (
`hsid` int(11)
,`tenhs` varchar(50)
,`gioitinh` enum('male','female')
,`ngaysinh` date
,`sdtbome` varchar(50)
,`diachi` varchar(50)
,`ten_lop` varchar(20)
,`ghichu` varchar(50)
);

-- --------------------------------------------------------

--
-- Structure for view `view_chitiet_hs_tienganh`
--
DROP TABLE IF EXISTS `view_chitiet_hs_tienganh`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_chitiet_hs_tienganh`  AS SELECT `chitietdiem`.`id_chitietdiem` AS `id_chitietdiem`, `hocsinh`.`hsid` AS `hsid`, `hocsinh`.`tenhs` AS `tenhs`, `hocsinh`.`gioitinh` AS `gioitinh`, `hocsinh`.`ngaysinh` AS `ngaysinh`, `chitietdiem`.`diem_giua_ki1` AS `diem_giua_ki1`, `chitietdiem`.`diem_ki1` AS `diem_ki1`, `chitietdiem`.`diem_giua_ki2` AS `diem_giua_ki2`, `chitietdiem`.`diem_ki2` AS `diem_ki2`, (`chitietdiem`.`diem_giua_ki1` + `chitietdiem`.`diem_giua_ki2` + `chitietdiem`.`diem_ki1` + `chitietdiem`.`diem_ki2`) / 4 AS `TB`, `hocsinh`.`ghichu` AS `ghichu` FROM (`chitietdiem` join `hocsinh` on(`chitietdiem`.`mahocsinh` = `hocsinh`.`hsid`)) WHERE `chitietdiem`.`mamon` = 3 ;

-- --------------------------------------------------------

--
-- Structure for view `view_chitiet_hs_tiengviet`
--
DROP TABLE IF EXISTS `view_chitiet_hs_tiengviet`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_chitiet_hs_tiengviet`  AS SELECT `chitietdiem`.`id_chitietdiem` AS `id_chitietdiem`, `hocsinh`.`hsid` AS `hsid`, `hocsinh`.`tenhs` AS `tenhs`, `hocsinh`.`gioitinh` AS `gioitinh`, `hocsinh`.`ngaysinh` AS `ngaysinh`, `chitietdiem`.`diem_giua_ki1` AS `diem_giua_ki1`, `chitietdiem`.`diem_ki1` AS `diem_ki1`, `chitietdiem`.`diem_giua_ki2` AS `diem_giua_ki2`, `chitietdiem`.`diem_ki2` AS `diem_ki2`, (`chitietdiem`.`diem_giua_ki1` + `chitietdiem`.`diem_giua_ki2` + `chitietdiem`.`diem_ki1` + `chitietdiem`.`diem_ki2`) / 4 AS `TB`, `hocsinh`.`ghichu` AS `ghichu` FROM (`chitietdiem` join `hocsinh` on(`chitietdiem`.`mahocsinh` = `hocsinh`.`hsid`)) WHERE `chitietdiem`.`mamon` = 2 ;

-- --------------------------------------------------------

--
-- Structure for view `view_chitiet_hs_toan`
--
DROP TABLE IF EXISTS `view_chitiet_hs_toan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_chitiet_hs_toan`  AS SELECT `chitietdiem`.`id_chitietdiem` AS `id_chitietdiem`, `hocsinh`.`hsid` AS `hsid`, `hocsinh`.`tenhs` AS `tenhs`, `hocsinh`.`gioitinh` AS `gioitinh`, `hocsinh`.`ngaysinh` AS `ngaysinh`, `chitietdiem`.`diem_giua_ki1` AS `diem_giua_ki1`, `chitietdiem`.`diem_ki1` AS `diem_ki1`, `chitietdiem`.`diem_giua_ki2` AS `diem_giua_ki2`, `chitietdiem`.`diem_ki2` AS `diem_ki2`, (`chitietdiem`.`diem_giua_ki1` + `chitietdiem`.`diem_giua_ki2` + `chitietdiem`.`diem_ki1` + `chitietdiem`.`diem_ki2`) / 4 AS `TB`, `hocsinh`.`ghichu` AS `ghichu` FROM (`chitietdiem` join `hocsinh` on(`chitietdiem`.`mahocsinh` = `hocsinh`.`hsid`)) WHERE `chitietdiem`.`mamon` = 1 ;

-- --------------------------------------------------------

--
-- Structure for view `view_hs_diem_tb`
--
DROP TABLE IF EXISTS `view_hs_diem_tb`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_hs_diem_tb`  AS SELECT `hocsinh`.`tenhs` AS `tenhs`, `monhoc`.`tenmon` AS `tenmon`, `hocsinh`.`ngaysinh` AS `ngaysinh`, (`chitietdiem`.`diem_giua_ki1` + `chitietdiem`.`diem_ki1` + `chitietdiem`.`diem_giua_ki2` + `chitietdiem`.`diem_ki2`) / 4 AS `diemtbmon` FROM ((`hocsinh` join `chitietdiem` on(`hocsinh`.`hsid` = `chitietdiem`.`mahocsinh`)) join `monhoc` on(`chitietdiem`.`mamon` = `monhoc`.`idmonhoc`)) ;

-- --------------------------------------------------------

--
-- Structure for view `view_hs_tongket_tb`
--
DROP TABLE IF EXISTS `view_hs_tongket_tb`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_hs_tongket_tb`  AS SELECT `view_chitiet_hs_tienganh`.`hsid` AS `hsid`, `view_chitiet_hs_tienganh`.`tenhs` AS `tenhs`, `view_chitiet_hs_tienganh`.`TB` AS `tienganhTB`, `view_chitiet_hs_tiengviet`.`TB` AS `tiengvietTB`, `view_chitiet_hs_toan`.`TB` AS `toanTB` FROM ((`view_chitiet_hs_tienganh` join `view_chitiet_hs_tiengviet` on(`view_chitiet_hs_tienganh`.`hsid` = `view_chitiet_hs_tiengviet`.`hsid`)) join `view_chitiet_hs_toan` on(`view_chitiet_hs_tienganh`.`hsid` = `view_chitiet_hs_toan`.`hsid`)) ;

-- --------------------------------------------------------

--
-- Structure for view `view_thong_tin_hs`
--
DROP TABLE IF EXISTS `view_thong_tin_hs`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_thong_tin_hs`  AS SELECT `hocsinh`.`hsid` AS `hsid`, `hocsinh`.`tenhs` AS `tenhs`, `hocsinh`.`gioitinh` AS `gioitinh`, `hocsinh`.`ngaysinh` AS `ngaysinh`, `hocsinh`.`sdtbome` AS `sdtbome`, `hocsinh`.`diachi` AS `diachi`, `lop`.`ten_lop` AS `ten_lop`, `hocsinh`.`ghichu` AS `ghichu` FROM (`hocsinh` join `lop` on(`hocsinh`.`malop` = `lop`.`lopid`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chitietdiem`
--
ALTER TABLE `chitietdiem`
  ADD PRIMARY KEY (`id_chitietdiem`),
  ADD KEY `mamon` (`mamon`),
  ADD KEY `mahocsinh` (`mahocsinh`);

--
-- Indexes for table `giaovien`
--
ALTER TABLE `giaovien`
  ADD PRIMARY KEY (`gvid`),
  ADD KEY `fk_giaovien_monhoc` (`mamon`);

--
-- Indexes for table `hocsinh`
--
ALTER TABLE `hocsinh`
  ADD PRIMARY KEY (`hsid`),
  ADD KEY `malop` (`malop`);

--
-- Indexes for table `lop`
--
ALTER TABLE `lop`
  ADD PRIMARY KEY (`lopid`);

--
-- Indexes for table `monhoc`
--
ALTER TABLE `monhoc`
  ADD PRIMARY KEY (`idmonhoc`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chitietdiem`
--
ALTER TABLE `chitietdiem`
  MODIFY `id_chitietdiem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `giaovien`
--
ALTER TABLE `giaovien`
  MODIFY `gvid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `lop`
--
ALTER TABLE `lop`
  MODIFY `lopid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chitietdiem`
--
ALTER TABLE `chitietdiem`
  ADD CONSTRAINT `chitietdiem_ibfk_1` FOREIGN KEY (`mamon`) REFERENCES `monhoc` (`idmonhoc`),
  ADD CONSTRAINT `chitietdiem_ibfk_2` FOREIGN KEY (`mahocsinh`) REFERENCES `hocsinh` (`hsid`);

--
-- Constraints for table `giaovien`
--
ALTER TABLE `giaovien`
  ADD CONSTRAINT `fk_giaovien_monhoc` FOREIGN KEY (`mamon`) REFERENCES `monhoc` (`idmonhoc`);

--
-- Constraints for table `hocsinh`
--
ALTER TABLE `hocsinh`
  ADD CONSTRAINT `hocsinh_ibfk_1` FOREIGN KEY (`malop`) REFERENCES `lop` (`lopid`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
