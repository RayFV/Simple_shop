-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 2017-12-30 15:12:58
-- 服务器版本： 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `b10423056hw2`
--

-- --------------------------------------------------------

--
-- 表的结构 `iteminfo`
--

DROP TABLE IF EXISTS `iteminfo`;
CREATE TABLE IF NOT EXISTS `iteminfo` (
  `ItemID` char(10) NOT NULL,
  `ItemName` varchar(20) NOT NULL,
  `SId` char(5) DEFAULT NULL,
  PRIMARY KEY (`ItemID`),
  KEY `SId` (`SId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `iteminfo`
--

INSERT INTO `iteminfo` (`ItemID`, `ItemName`, `SId`) VALUES
('0000000000', 'Note 8', '4'),
('1111111111', 'ZenFone 4', '1'),
('2222222222', 'ZenBook', '1'),
('3333333333', 'ZenPad 10', '1'),
('4444444444', 'VivoBook', '1'),
('5555555555', 'Pewdator 21 X', '2'),
('6666666666', 'Switch 7', '2'),
('7777777777', 'Iconia One 7', '2'),
('8888888888', 'iMac', '3'),
('9999999999', 'Iphone X', '3');

-- --------------------------------------------------------

--
-- 表的结构 `member`
--

DROP TABLE IF EXISTS `member`;
CREATE TABLE IF NOT EXISTS `member` (
  `Account` char(10) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `Name` varchar(32) NOT NULL,
  `Birthday` date DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Account`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `member`
--

INSERT INTO `member` (`Account`, `Password`, `Name`, `Birthday`, `Address`) VALUES
('Hk0001', 'yun0001', 'Jay', '1994-01-08', 'No.1, Sec. 3, University Road, Douliu City, Yunlin County'),
('Hk0002', 'yun0002', 'Tim', '1995-10-25', 'No.2, Sec. 3, University Road, Douliu City, Yunlin County'),
('Hk0003', 'yun0003', 'Edwin', '1993-06-09', 'No.3, Sec. 3, University Road, Douliu City, Yunlin County'),
('Hk0004', 'yun0004', 'Kevin', '1992-04-15', 'No.4, Sec. 3, University Road, Douliu City, Yunlin County'),
('Hk0005', 'yun0005', 'Angela', '1993-04-20', 'No.5, Sec. 3, University Road, Douliu City, Yunlin County'),
('Hk0006', 'yun0006', 'Genie', '1990-03-25', 'No.6, Sec. 3, University Road, Douliu City, Yunlin County'),
('Hk0007', 'yun0007', 'Jam', '1987-05-05', 'No.7, Sec. 3, University Road, Douliu City, Yunlin County'),
('Hk0008', 'yun0008', 'Jane', '1953-08-08', 'No.8, Sec. 3, University Road, Douliu City, Yunlin County'),
('Hk0009', 'yun0009', 'Cairns', '1991-11-11', 'No.9, Sec. 3, University Road, Douliu City, Yunlin County'),
('Hk0010', 'yun0010', 'Jacob', '1995-10-10', 'No.10, Sec. 3, University Road, Douliu City, Yunlin County');

-- --------------------------------------------------------

--
-- 表的结构 `odetail`
--

DROP TABLE IF EXISTS `odetail`;
CREATE TABLE IF NOT EXISTS `odetail` (
  `OId` char(4) NOT NULL,
  `ItemID` char(10) NOT NULL,
  PRIMARY KEY (`OId`,`ItemID`),
  KEY `ItemID` (`ItemID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `odetail`
--

INSERT INTO `odetail` (`OId`, `ItemID`) VALUES
('10', '0000000000'),
('7', '0000000000'),
('1', '1111111111'),
('1', '2222222222'),
('2', '2222222222'),
('9', '2222222222'),
('1', '3333333333'),
('3', '3333333333'),
('1', '4444444444'),
('4', '4444444444'),
('9', '4444444444'),
('5', '5555555555'),
('6', '6666666666'),
('9', '6666666666'),
('7', '7777777777'),
('7', '8888888888'),
('8', '8888888888'),
('7', '9999999999'),
('9', '9999999999');

-- --------------------------------------------------------

--
-- 表的结构 `orderhistory`
--

DROP TABLE IF EXISTS `orderhistory`;
CREATE TABLE IF NOT EXISTS `orderhistory` (
  `OId` char(4) NOT NULL,
  `Account` char(10) DEFAULT NULL,
  `PurchaseDate` date NOT NULL,
  PRIMARY KEY (`OId`),
  KEY `Account` (`Account`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `orderhistory`
--

INSERT INTO `orderhistory` (`OId`, `Account`, `PurchaseDate`) VALUES
('1', 'Hk0001', '2017-01-01'),
('10', 'Hk0010', '2017-01-29'),
('2', 'Hk0002', '2017-01-01'),
('3', 'Hk0003', '2017-01-08'),
('4', 'Hk0004', '2017-01-12'),
('5', 'Hk0005', '2017-01-14'),
('6', 'Hk0006', '2017-01-18'),
('7', 'Hk0007', '2017-01-19'),
('8', 'Hk0008', '2017-01-19'),
('9', 'Hk0009', '2017-01-20');

-- --------------------------------------------------------

--
-- 表的结构 `supplier`
--

DROP TABLE IF EXISTS `supplier`;
CREATE TABLE IF NOT EXISTS `supplier` (
  `SId` char(5) NOT NULL,
  `SName` varchar(25) NOT NULL,
  `STel` varchar(32) NOT NULL,
  PRIMARY KEY (`SId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `supplier`
--

INSERT INTO `supplier` (`SId`, `SName`, `STel`) VALUES
('1', 'ASUS', '02-2222-2222'),
('2', 'Acer', '03-3333-3333'),
('3', 'Apple', '04-4444-4444'),
('4', 'Samsung', '05-5555-5555');

-- --------------------------------------------------------

--
-- 替换视图以便查看 `view_order_count`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `view_order_count`;
CREATE TABLE IF NOT EXISTS `view_order_count` (
`SName` varchar(25)
,`ItemName` varchar(20)
,`Purchase_Freq` bigint(21)
);

-- --------------------------------------------------------

--
-- 视图结构 `view_order_count`
--
DROP TABLE IF EXISTS `view_order_count`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_order_count`  AS  select `supplier`.`SName` AS `SName`,`iteminfo`.`ItemName` AS `ItemName`,count(0) AS `Purchase_Freq` from ((`supplier` join `iteminfo`) join `odetail`) where ((`supplier`.`SId` = `iteminfo`.`SId`) and (`iteminfo`.`ItemID` = `odetail`.`ItemID`)) group by `odetail`.`ItemID` ;

--
-- 限制导出的表
--

--
-- 限制表 `iteminfo`
--
ALTER TABLE `iteminfo`
  ADD CONSTRAINT `iteminfo_ibfk_1` FOREIGN KEY (`SId`) REFERENCES `supplier` (`SId`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- 限制表 `odetail`
--
ALTER TABLE `odetail`
  ADD CONSTRAINT `odetail_ibfk_1` FOREIGN KEY (`OId`) REFERENCES `orderhistory` (`OId`) ON UPDATE CASCADE,
  ADD CONSTRAINT `odetail_ibfk_2` FOREIGN KEY (`ItemID`) REFERENCES `iteminfo` (`ItemID`);

--
-- 限制表 `orderhistory`
--
ALTER TABLE `orderhistory`
  ADD CONSTRAINT `orderhistory_ibfk_1` FOREIGN KEY (`Account`) REFERENCES `member` (`Account`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
