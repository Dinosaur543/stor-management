-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 29, 2022 at 06:36 AM
-- Server version: 5.7.17-log
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `am_id` int(10) NOT NULL COMMENT 'รหัสตาราง(pk)',
  `am_user` varchar(20) NOT NULL COMMENT 'ชื่อ Login เข้าระบบ',
  `am_pass` varchar(15) NOT NULL COMMENT 'รหัสผ่าน',
  `am_name` varchar(40) NOT NULL COMMENT 'ชื่อ - นามสกุล',
  `am_tel` varchar(10) NOT NULL COMMENT 'เบอร์โทร',
  `am_email` varchar(150) NOT NULL COMMENT 'อีเมล์',
  `am_status` varchar(20) NOT NULL COMMENT 'สถานะ'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='ตารางผู้ดูแลระบบ';

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`am_id`, `am_user`, `am_pass`, `am_name`, `am_tel`, `am_email`, `am_status`) VALUES
(13, 'admin', '12345678', 'Owner', '789456123', 'logixtik.first@gmail.com', 'System administrator');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(10) NOT NULL COMMENT 'รหัสตาราง(pk)',
  `category_name` varchar(50) NOT NULL COMMENT 'ชื่อหมวดหมู่'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='ตารางหมวดหมู่';

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(43, 'Dessert'),
(45, 'Cake'),
(33, 'Coffee'),
(46, 'Tea'),
(47, 'Soda');

-- --------------------------------------------------------

--
-- Table structure for table `expired`
--

CREATE TABLE `expired` (
  `exp_id` int(10) NOT NULL,
  `exp_am_id` int(5) NOT NULL,
  `exp_am_name` varchar(150) NOT NULL,
  `exp_date` datetime NOT NULL,
  `exp_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `expired_detail`
--

CREATE TABLE `expired_detail` (
  `od_exp_id` int(11) NOT NULL,
  `od_wh_id` int(11) NOT NULL,
  `od_num` int(11) NOT NULL,
  `od_price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ingredient`
--

CREATE TABLE `ingredient` (
  `ingredient_id` int(11) NOT NULL,
  `ingredient_name` varchar(50) CHARACTER SET armscii8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ingredient`
--

INSERT INTO `ingredient` (`ingredient_id`, `ingredient_name`) VALUES
(3, 'Flour'),
(4, 'Sugar'),
(5, 'Cheese'),
(6, 'Butter'),
(7, 'Milk'),
(8, 'Baking');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `ord_id` int(11) NOT NULL COMMENT 'รหัสตาราง(pk)',
  `ord_am_id` int(5) NOT NULL COMMENT 'รหัสผู้ทำรายการ',
  `ord_am_name` varchar(150) NOT NULL COMMENT 'ชื่อผู้ทำรายการ',
  `ord_total` float NOT NULL COMMENT 'ราคารวม',
  `ord_get_money` int(11) NOT NULL,
  `ord_change` float NOT NULL,
  `ord_date` datetime NOT NULL COMMENT 'วันที่ทำรายการ',
  `ord_status` varchar(20) NOT NULL COMMENT 'สถานะ'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='ตารางใบสั่งซื้อ';

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`ord_id`, `ord_am_id`, `ord_am_name`, `ord_total`, `ord_get_money`, `ord_change`, `ord_date`, `ord_status`) VALUES
(156, 13, 'Owner', 300, 0, -300, '2022-05-27 08:48:12', '1'),
(157, 13, 'Owner', 400, 0, -400, '2022-05-27 08:49:21', '1'),
(158, 13, 'Owner', 100, 0, -100, '2022-05-27 08:50:42', '1'),
(162, 13, 'Owner', 100, 0, -100, '2022-05-27 10:10:38', '1'),
(160, 13, 'Owner', 69, 0, -69, '2022-05-27 09:30:16', '1'),
(72, 13, 'Owner', 129, 0, -129, '2022-04-25 22:18:19', '1'),
(71, 13, 'Owner', 59, 0, -59, '2022-04-25 22:18:29', '1'),
(141, 13, 'Owner', 135, 0, -135, '2022-05-24 00:45:48', '1'),
(142, 13, 'Owner', 198, 0, -198, '2022-05-25 00:26:26', '1'),
(143, 13, 'Owner', 69, 0, -69, '2022-05-26 01:03:21', '1'),
(153, 13, 'Owner', 300, 0, -300, '2022-05-27 08:31:06', '1'),
(154, 13, 'Owner', 248, 0, -248, '2022-05-27 08:46:17', '1'),
(155, 13, 'Owner', 59, 0, -59, '2022-05-27 08:47:02', '1'),
(70, 13, 'Owner', 59, 0, -59, '2022-04-25 22:01:32', '1'),
(69, 13, 'Owner', 158, 0, -158, '2022-04-25 22:01:13', '1'),
(68, 13, 'Owner', 59, 0, -59, '2022-04-25 22:01:23', '1'),
(67, 13, 'Owner', 184, 0, -184, '2022-04-24 22:00:14', '1'),
(66, 13, 'Owner', 188, 0, -188, '2022-04-24 21:59:55', '1'),
(65, 13, 'Owner', 178, 0, -178, '2022-04-24 21:59:31', '1'),
(64, 13, 'Owner', 148, 0, -148, '2022-04-24 21:58:28', '1'),
(63, 13, 'Owner', 148, 0, -148, '2022-04-24 21:58:10', '1'),
(62, 13, 'Owner', 128, 0, -128, '2022-04-24 21:47:12', '1'),
(61, 13, 'Owner', 168, 0, -168, '2022-04-24 21:46:53', '1'),
(60, 13, 'Owner', 218, 0, -218, '2022-04-23 21:46:38', '1'),
(59, 13, 'Owner', 119, 0, -119, '2022-04-23 21:46:22', '1'),
(58, 13, 'Owner', 119, 0, -119, '2022-04-23 21:46:09', '1'),
(57, 13, 'Owner', 119, 0, -119, '2022-04-23 21:45:55', '1'),
(56, 13, 'Owner', 99, 0, -99, '2022-04-23 21:45:43', '1'),
(55, 13, 'Owner', 109, 0, -109, '2022-04-23 21:45:31', '1'),
(54, 13, 'Owner', 147, 0, -147, '2022-04-23 21:45:14', '1'),
(53, 13, 'Owner', 118, 0, -118, '2022-04-23 21:44:51', '1'),
(52, 13, 'Owner', 49, 0, -49, '2022-04-23 21:44:32', '1'),
(51, 13, 'Owner', 178, 0, -178, '2022-04-23 21:44:09', '1'),
(50, 13, 'Owner', 138, 0, -138, '2022-04-23 21:25:42', '1'),
(117, 13, 'Owner', 69, 0, -69, '2022-05-23 16:18:05', '1'),
(116, 13, 'Owner', 119, 40, -79, '2022-05-23 16:17:35', '1'),
(115, 13, 'Owner', 69, 200, 131, '2022-05-23 16:17:14', '1'),
(114, 13, 'Owner', 138, 140, 2, '2022-05-23 01:17:06', '1'),
(113, 13, 'Owner', 188, 200, 12, '2022-05-23 01:11:06', '1'),
(112, 13, 'Owner', 167, 200, 33, '2022-05-22 21:33:12', '1'),
(111, 13, 'Owner', 138, 150, 12, '2022-05-22 21:32:35', '1'),
(110, 13, 'Owner', 128, 200, 72, '2022-05-22 21:31:42', '1'),
(109, 13, 'Owner', 135, 150, 15, '2022-05-22 21:31:08', '1'),
(108, 13, 'Owner', 98, 100, 2, '2022-05-22 21:30:50', '1'),
(107, 13, 'Owner', 138, 150, 12, '2022-05-22 21:29:59', '1'),
(103, 13, 'Owner', 138, 150, 12, '2022-05-22 09:43:27', '1'),
(104, 13, 'Owner', 119, 150, 31, '2022-05-22 09:54:36', '1'),
(105, 13, 'Owner', 59, 60, 1, '2022-05-22 10:11:44', '1'),
(106, 13, 'Owner', 194, 200, 6, '2022-05-22 15:49:33', '1'),
(102, 13, 'Owner', 39, 40, 1, '2022-05-22 09:05:17', '1'),
(83, 13, 'Owner', 198, 200, 2, '2022-05-10 13:08:22', '1'),
(84, 13, 'Owner', 128, 150, 22, '2022-05-10 20:39:48', '1'),
(85, 13, 'Owner', 39, 40, 1, '2022-05-10 21:06:05', '1'),
(86, 13, 'Owner', 79, 80, 1, '2022-05-10 21:06:21', '1'),
(87, 13, 'Owner', 98, 100, 2, '2022-05-10 21:06:54', '1'),
(88, 13, 'Owner', 119, 150, 31, '2022-05-10 21:27:58', '1'),
(89, 13, 'Owner', 188, 500, 312, '2022-05-10 21:28:35', '1'),
(90, 13, 'Owner', 158, 200, 42, '2022-05-10 21:30:22', '1'),
(91, 13, 'Owner', 79, 100, 21, '2022-05-10 21:30:47', '1'),
(92, 13, 'Owner', 168, 180, 12, '2022-05-12 21:27:30', '1'),
(93, 13, 'Owner', 138, 200, 62, '2022-05-12 21:28:05', '1'),
(94, 13, 'Owner', 204, 300, 96, '2022-05-12 21:28:32', '1'),
(95, 13, 'Owner', 49, 50, 1, '2022-05-16 11:38:27', '1'),
(96, 13, 'Owner', 119, 120, 1, '2022-05-16 11:39:16', '1'),
(97, 13, 'Owner', 148, 150, 2, '2022-05-16 12:04:14', '1'),
(99, 13, 'Owner', 79, 100, 21, '2022-05-18 13:16:15', '1'),
(100, 13, 'Owner', 129, 200, 71, '2022-05-19 23:25:54', '1'),
(101, 13, 'Owner', 79, 500, 421, '2022-05-20 00:02:59', '1'),
(161, 13, 'Owner', 79, 0, -79, '2022-05-27 09:30:26', '1'),
(163, 13, 'Owner', 286, 300, 14, '2022-05-27 10:11:47', '1'),
(164, 13, 'Owner', 300, 0, -300, '2022-05-27 10:14:19', '1'),
(165, 13, 'Owner', 207, 100, -107, '2022-05-27 10:21:23', '1');

-- --------------------------------------------------------

--
-- Table structure for table `orders_detail`
--

CREATE TABLE `orders_detail` (
  `od_ord_id` int(11) NOT NULL COMMENT 'รหัสใบเบิก(fk)',
  `od_prd_id` int(11) NOT NULL COMMENT 'รหัสพัสดุ(fk)',
  `od_num` int(11) NOT NULL COMMENT 'จำนวนพัสดุ',
  `od_price` float NOT NULL COMMENT 'ราคา'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='ตารางรายละเอียดใบสั่งซื้อ';

--
-- Dumping data for table `orders_detail`
--

INSERT INTO `orders_detail` (`od_ord_id`, `od_prd_id`, `od_num`, `od_price`) VALUES
(50, 21, 1, 150),
(50, 13, 1, 30),
(50, 8, 3, 50),
(63, 23, 2, 50),
(62, 24, 1, 200),
(91, 46, 1, 79),
(90, 56, 1, 109),
(90, 76, 1, 49),
(88, 45, 1, 119),
(92, 69, 1, 49),
(87, 69, 2, 49),
(56, 22, 1, 200),
(56, 21, 1, 150),
(89, 64, 1, 59),
(83, 44, 1, 69),
(83, 40, 1, 129),
(95, 68, 1, 49),
(94, 41, 1, 135),
(18, 5, 10, 6),
(19, 5, 1, 6),
(21, 5, 3, 6),
(84, 46, 1, 79),
(23, 14, 3, 20),
(23, 12, 2, 50),
(24, 5, 1, 6),
(24, 6, 1, 6),
(25, 5, 1, 6),
(26, 5, 1, 6),
(26, 8, 1, 50),
(27, 5, 1, 6),
(28, 14, 1, 20),
(29, 13, 1, 30),
(30, 14, 1, 20),
(31, 5, 1, 6),
(32, 12, 1, 50),
(33, 5, 1, 6),
(33, 13, 1, 30),
(34, 5, 1, 6),
(34, 13, 1, 30),
(35, 13, 1, 30),
(35, 8, 4, 50),
(36, 5, 2, 6),
(36, 12, 1, 50),
(37, 13, 1, 30),
(38, 13, 1, 30),
(38, 6, 1, 6),
(39, 8, 1, 50),
(39, 13, 1, 30),
(39, 16, 1, 1000),
(40, 18, 1, 60),
(41, 8, 1, 50),
(42, 8, 1, 50),
(42, 12, 1, 50),
(43, 8, 1, 50),
(43, 12, 1, 50),
(44, 8, 1, 50),
(45, 8, 2, 50),
(46, 8, 2, 50),
(46, 12, 1, 50),
(46, 14, 1, 20),
(46, 21, 1, 150),
(47, 12, 1, 50),
(48, 14, 1, 20),
(49, 8, 1, 50),
(49, 13, 1, 30),
(51, 8, 1, 50),
(52, 14, 1, 20),
(52, 21, 1, 150),
(53, 14, 1, 20),
(53, 21, 1, 150),
(89, 42, 1, 129),
(92, 45, 1, 119),
(96, 54, 1, 119),
(93, 60, 1, 59),
(93, 46, 1, 79),
(94, 70, 1, 69),
(101, 49, 1, 79),
(97, 49, 1, 79),
(97, 44, 1, 69),
(100, 40, 1, 129),
(99, 46, 1, 79),
(86, 49, 1, 79),
(85, 43, 1, 39),
(103, 49, 1, 79),
(102, 43, 1, 39),
(103, 65, 1, 59),
(104, 54, 1, 119),
(106, 41, 1, 135),
(105, 47, 1, 59),
(84, 76, 1, 49),
(106, 47, 1, 59),
(107, 66, 1, 59),
(107, 48, 1, 79),
(108, 76, 1, 49),
(108, 67, 1, 49),
(109, 41, 1, 135),
(110, 62, 1, 59),
(110, 44, 1, 69),
(111, 61, 1, 59),
(111, 46, 1, 79),
(112, 60, 1, 59),
(112, 62, 1, 59),
(112, 76, 1, 49),
(113, 42, 1, 129),
(113, 64, 1, 59),
(114, 49, 1, 79),
(114, 59, 1, 59),
(115, 70, 1, 69),
(116, 45, 1, 119),
(117, 44, 1, 69),
(118, 46, 1, 79),
(118, 47, 1, 59),
(119, 45, 1, 119),
(119, 66, 1, 59),
(120, 74, 1, 49),
(121, 69, 1, 49),
(121, 44, 1, 69),
(122, 43, 1, 39),
(122, 66, 1, 59),
(122, 68, 1, 49),
(123, 55, 1, 109),
(124, 51, 1, 99),
(125, 54, 1, 119),
(126, 53, 1, 119),
(127, 50, 1, 119),
(128, 56, 2, 109),
(129, 73, 1, 49),
(129, 45, 1, 119),
(130, 68, 1, 49),
(130, 49, 1, 79),
(131, 70, 1, 69),
(131, 48, 1, 79),
(132, 67, 1, 49),
(132, 51, 1, 99),
(133, 63, 1, 59),
(133, 54, 1, 119),
(134, 62, 1, 59),
(134, 42, 1, 129),
(135, 73, 1, 49),
(135, 41, 1, 135),
(136, 68, 1, 49),
(136, 56, 1, 109),
(137, 64, 1, 59),
(138, 65, 1, 59),
(139, 42, 1, 129),
(140, 62, 1, 59),
(141, 41, 1, 135),
(142, 42, 1, 129),
(142, 44, 1, 69),
(143, 44, 1, 69),
(153, 2, 1, 0),
(154, 45, 1, 119),
(154, 40, 1, 129),
(155, 47, 1, 59),
(156, 2, 1, 0),
(157, 9, 1, 0),
(157, 11, 1, 0),
(158, 7, 1, 0),
(162, 78, 1, 100),
(160, 44, 1, 69),
(161, 46, 1, 79),
(163, 42, 1, 129),
(163, 47, 1, 59),
(163, 74, 2, 49),
(164, 2, 1, 0),
(165, 48, 2, 79),
(165, 67, 1, 49);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `prd_id` int(10) NOT NULL COMMENT 'รหัสตาราง(pk)',
  `prd_code` varchar(10) NOT NULL COMMENT 'รหัสสินค้า',
  `prd_name` varchar(200) NOT NULL COMMENT 'ขื่อสินค้า',
  `prd_price` float NOT NULL COMMENT 'ราคา',
  `prd_color` varchar(10) NOT NULL COMMENT 'สี',
  `prd_size` varchar(10) NOT NULL COMMENT 'ขนาด',
  `prd_id_category` int(10) NOT NULL COMMENT 'รหัสหมวดหมู่(fk)'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='ตารางสินค้า';

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`prd_id`, `prd_code`, `prd_name`, `prd_price`, `prd_color`, `prd_size`, `prd_id_category`) VALUES
(48, '203', 'Orange cake', 79, 'Orange', 'S', 45),
(47, '202', 'Cup cake', 59, '-', 'S', 45),
(45, '106', 'Banoffee', 119, '-', '-', 43),
(46, '201', 'Chocolate cake', 79, '-', 'S', 45),
(43, '104', 'Cookie', 39, '-', '-', 43),
(44, '105', 'Brownie', 69, '-', '-', 43),
(42, '103', 'Ice-cream waffle', 129, 'brown', 'S', 43),
(41, '102', 'Honey toat', 135, 'Brown', 'M', 43),
(40, '101', 'Pancake tower', 129, 'White', 'S', 43),
(49, '204', 'Coconut cake', 79, 'White', 'S', 45),
(50, '205', 'Strawberry cheese cake', 119, '-', 'S', 45),
(51, '206', 'Cheese cake', 99, '-', '-', 45),
(52, '207', 'Blueberry chees cake', 119, '-', 'S', 45),
(53, '208', 'Strawberry cheese pie', 119, '-', 'S', 45),
(54, '209', 'Blueberry chees pie', 119, '-', '-', 45),
(55, '210', 'Red velvet cake', 109, 'Red', 'S', 45),
(56, '211', 'Strawberry crepe cake', 109, '-', 'S', 45),
(60, '302', 'Cappucino', 59, '-', 'S', 33),
(59, '301', 'Espresso', 59, '-', 'S', 33),
(61, '303', 'Mocca', 59, '-', 'S', 33),
(62, '304', 'Latte', 59, '-', 'S', 33),
(63, '305', 'Flate white', 59, '-', 'S', 33),
(64, '306', 'Americano', 59, '-', 'S', 33),
(65, '307', 'Doppio', 59, '-', 'S', 33),
(66, '308', 'Macchiato', 59, '-', 'S', 33),
(67, '401', 'Chocolate ', 49, '-', 'S', 46),
(68, '402', 'Green tea', 49, '-', 'S', 46),
(69, '403', 'Milk tea', 49, '-', 'S', 46),
(70, '404', 'Matcha latte', 69, '-', 'S', 46),
(71, '501', 'Lemon soda', 49, '-', 'S', 47),
(72, '502', 'Strawberry soda', 49, '-', '-', 47),
(73, '503', 'Red lemonade soda', 49, '-', '-', 47),
(74, '504', 'Blue Ocean', 49, '-', '-', 47),
(75, '505', 'Peach soda', 49, '-', '-', 47),
(76, '506', 'Kiwi soda', 49, '-', '-', 47),
(77, '507', 'Mango soda', 49, '-', 'S', 47);

-- --------------------------------------------------------

--
-- Table structure for table `warehouse`
--

CREATE TABLE `warehouse` (
  `wh_id` int(10) NOT NULL,
  `wh_code` varchar(10) CHARACTER SET armscii8 NOT NULL,
  `wh_name` varchar(200) CHARACTER SET armscii8 NOT NULL,
  `wh_price` float NOT NULL,
  `wh_color` varchar(10) CHARACTER SET armscii8 NOT NULL,
  `wh_id_ingredient` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `warehouse`
--

INSERT INTO `warehouse` (`wh_id`, `wh_code`, `wh_name`, `wh_price`, `wh_color`, `wh_id_ingredient`) VALUES
(2, '601', 'Cocoa flour', 300, 'Dark brown', 0),
(3, '602', 'All-Purpose Flour', 100, 'White', 0),
(4, '603', 'Cake Flour', 100, 'White', 0),
(5, '604', 'Bread Flour', 100, 'White', 0),
(6, '605', 'Corn Flour', 50, 'White', 0),
(7, '701', 'Granulated Sugar', 100, 'White', 0),
(8, '702', 'Brown Sugar', 100, 'Brown', 0),
(9, '703', 'Confectionery Sugar or Icing', 200, 'White', 0),
(10, '801', 'Cream Cheese', 300, 'White', 0),
(11, '802', 'Cottage Cheese', 200, '', 0),
(12, '803', 'Ricotta', 200, '', 0),
(13, '804', 'Mozzarella', 0, '', 0),
(14, '901', 'Butter', 0, '', 0),
(15, '902', 'Margarine', 0, '', 0),
(16, '903', 'Pastry Margarine', 0, '', 0),
(17, '904', 'Shortening', 0, 'White', 0),
(18, '1001', 'Milk', 0, 'White', 0),
(19, '1002', 'Evaporated Milk', 0, '', 0),
(20, '1003', 'Dried Whole Milk', 0, '', 0),
(21, '1004', 'Sweetened Condensed Milk', 0, '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`am_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `expired`
--
ALTER TABLE `expired`
  ADD PRIMARY KEY (`exp_id`);

--
-- Indexes for table `expired_detail`
--
ALTER TABLE `expired_detail`
  ADD PRIMARY KEY (`od_exp_id`);

--
-- Indexes for table `ingredient`
--
ALTER TABLE `ingredient`
  ADD PRIMARY KEY (`ingredient_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`ord_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`prd_id`);

--
-- Indexes for table `warehouse`
--
ALTER TABLE `warehouse`
  ADD PRIMARY KEY (`wh_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `am_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'รหัสตาราง(pk)', AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'รหัสตาราง(pk)', AUTO_INCREMENT=58;
--
-- AUTO_INCREMENT for table `expired`
--
ALTER TABLE `expired`
  MODIFY `exp_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `expired_detail`
--
ALTER TABLE `expired_detail`
  MODIFY `od_exp_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ingredient`
--
ALTER TABLE `ingredient`
  MODIFY `ingredient_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `ord_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสตาราง(pk)', AUTO_INCREMENT=166;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `prd_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'รหัสตาราง(pk)', AUTO_INCREMENT=79;
--
-- AUTO_INCREMENT for table `warehouse`
--
ALTER TABLE `warehouse`
  MODIFY `wh_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
