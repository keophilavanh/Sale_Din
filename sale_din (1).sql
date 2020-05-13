-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 12, 2020 at 01:46 AM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sale_din`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `Name_LA` varchar(50) NOT NULL,
  `Name_EN` varchar(50) NOT NULL,
  `status` varchar(15) NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `Name_LA`, `Name_EN`, `status`) VALUES
(18, 'ດີນປຸກສ້າງ', 'asd', 'Active'),
(16, 'ດີນຈັດສັນ', 'en', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

DROP TABLE IF EXISTS `image`;
CREATE TABLE IF NOT EXISTS `image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pro_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `part` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`id`, `pro_id`, `name`, `part`) VALUES
(9, 137, 'img/1588485138_1.png', 'product/'),
(7, 135, 'img/1588484499_1.png', 'product/'),
(8, 136, 'img/1588484576_1.png', 'product/'),
(10, 137, 'img/1588485138_2.png', 'product/'),
(11, 55, 'img/1588485213_1.png', 'product/'),
(12, 55, 'img/1588485297_1.png', 'product/'),
(13, 55, 'img/1588485417_1.png', 'product/'),
(14, 55, 'img/1588485417_2.jpg', 'product/'),
(15, 142, 'img/1588485697_1.png', 'product/'),
(16, 142, 'img/1588485697_2.jpg', 'product/'),
(17, 142, 'img/1588485697_3.jpg', 'product/'),
(18, 142, 'img/1588485697_4.png', 'product/'),
(19, 143, 'img/1588485784_1.png', 'product/'),
(20, 144, 'img/1588485854_1.png', 'product/'),
(21, 145, 'img/1588485982_1.png', 'product/'),
(22, 145, 'img/1588485982_2.jpg', 'product/'),
(23, 145, 'img/1588485982_3.jpg', 'product/'),
(24, 146, 'img/1588486089_1.png', 'product/'),
(26, 146, 'img/1588488763_1.png', 'product/'),
(27, 146, 'img/1588488763_2.jpg', 'product/'),
(28, 146, 'img/1588488839_1.png', 'product/'),
(29, 147, 'img/1588697265_1.jpg', 'product/'),
(30, 147, 'img/1588697265_2.jpg', 'product/'),
(31, 147, 'img/1588697265_3.png', 'product/');

-- --------------------------------------------------------

--
-- Table structure for table `inbox`
--

DROP TABLE IF EXISTS `inbox`;
CREATE TABLE IF NOT EXISTS `inbox` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message` varchar(500) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `name` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `inbox`
--

INSERT INTO `inbox` (`id`, `message`, `phone`, `name`, `user_id`) VALUES
(1, 'asasdasd', '45212', 'adasd', 1),
(2, 'asdasd', 'asdsa', 'asdsa', 1),
(3, 'asdas', 'sadas', 'test', 7);

-- --------------------------------------------------------

--
-- Table structure for table `information`
--

DROP TABLE IF EXISTS `information`;
CREATE TABLE IF NOT EXISTS `information` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titel_LA` varchar(250) NOT NULL,
  `titel_EN` varchar(250) NOT NULL,
  `Description_LA` varchar(1000) NOT NULL,
  `Description_EN` varchar(1000) NOT NULL,
  `image` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Name_LA` varchar(250) NOT NULL,
  `Name_EN` varchar(250) NOT NULL,
  `Description_LA` varchar(1000) NOT NULL,
  `Description_EN` varchar(1000) NOT NULL,
  `Localtion_LA` varchar(500) NOT NULL,
  `Localtion_EN` varchar(500) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `Price_KIP` double NOT NULL,
  `Price_THB` double NOT NULL,
  `Price_USD` double NOT NULL,
  `view` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=148 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `Name_LA`, `Name_EN`, `Description_LA`, `Description_EN`, `Localtion_LA`, `Localtion_EN`, `cat_id`, `user_id`, `Price_KIP`, `Price_THB`, `Price_USD`, `view`) VALUES
(27, 'asdas', 'asdas', 'asd', 'asd', 'asd', 'asd', 16, 3, 0, 0, 0, 6),
(28, 'sdasd', 'sadasd', 'asdasd', 'asdasd', 'asdasd', 'asdasd', 16, 2, 5000, 5000, 5000, 1),
(29, 'sdasd', 'sadasd', 'asdasd', 'asdasd', 'asdasd', 'asdasd', 16, 2, 5000, 5000, 5000, 0),
(30, 'sdasd', 'sadasd', 'asdasd', 'asdasd', 'asdasd', 'asdasd', 18, 2, 5000, 5000, 5000, 0),
(31, 'sdasd', 'sadasd', 'asdasd', 'asdasd', 'asdasd', 'asdasd', 18, 2, 5000, 5000, 5000, 0),
(32, 'sdasd', 'sadasd', 'asdasd', 'asdasd', 'asdasd', 'asdasd', 18, 2, 5000, 5000, 5000, 0),
(33, 'sdasd', 'sadasd', 'asdasd', 'asdasd', 'asdasd', 'asdasd', 18, 2, 5000, 5000, 5000, 0),
(34, 'sdasd', 'sadasd', 'asdasd', 'asdasd', 'asdasd', 'asdasd', 1, 2, 5000, 5000, 5000, 0),
(35, 'sdasd', 'sadasd', 'asdasd', 'asdasd', 'asdasd', 'asdasd', 1, 2, 5000, 5000, 5000, 0),
(36, 'sdasd', 'sadasd', 'asdasd', 'asdasd', 'asdasd', 'asdasd', 1, 2, 5000, 5000, 5000, 0),
(37, 'sdasd', 'sadasd', 'asdasd', 'asdasd', 'asdasd', 'asdasd', 1, 2, 5000, 5000, 5000, 0),
(38, 'sdasd', 'sadasd', 'asdasd', 'asdasd', 'asdasd', 'asdasd', 1, 2, 5000, 5000, 5000, 0),
(39, 'sdasd', 'sadasd', 'asdasd', 'asdasd', 'asdasd', 'asdasd', 1, 2, 5000, 5000, 5000, 0),
(40, 'sdasd', 'sadasd', 'asdasd', 'asdasd', 'asdasd', 'asdasd', 1, 2, 5000, 5000, 5000, 0),
(41, 'sdasd', 'sadasd', 'asdasd', 'asdasd', 'asdasd', 'asdasd', 2, 2, 5000, 5000, 5000, 0),
(42, 'sdasd', 'sadasd', 'asdasd', 'asdasd', 'asdasd', 'asdasd', 2, 2, 5000, 5000, 5000, 0),
(43, 'sdasd', 'sadasd', 'asdasd', 'asdasd', 'asdasd', 'asdasd', 2, 2, 5000, 5000, 5000, 0),
(44, 'sdasd', 'sadasd', 'asdasd', 'asdasd', 'asdasd', 'asdasd', 2, 2, 5000, 5000, 5000, 0),
(45, 'sdasd', 'sadasd', 'asdasd', 'asdasd', 'asdasd', 'asdasd', 2, 2, 5000, 5000, 5000, 0),
(46, 'sdasd', 'sadasd', 'asdasd', 'asdasd', 'asdasd', 'asdasd', 2, 2, 5000, 5000, 5000, 0),
(47, 'sdasd', 'sadasd', 'asdasd', 'asdasd', 'asdasd', 'asdasd', 2, 2, 5000, 5000, 5000, 0),
(48, 'sdasd', 'sadasd', 'asdasd', 'asdasd', 'asdasd', 'asdasd', 2, 2, 5000, 5000, 5000, 0),
(49, 'sdasd', 'sadasd', 'asdasd', 'asdasd', 'asdasd', 'asdasd', 2, 2, 5000, 5000, 5000, 0),
(50, 'sdasd', 'sadasd', 'asdasd', 'asdasd', 'asdasd', 'asdasd', 2, 2, 5000, 5000, 5000, 0),
(51, 'sdasd', 'sadasd', 'asdasd', 'asdasd', 'asdasd', 'asdasd', 2, 2, 5000, 5000, 5000, 0),
(52, 'sdasd', 'sadasd', 'asdasd', 'asdasd', 'asdasd', 'asdasd', 2, 2, 5000, 5000, 5000, 0),
(53, 'sdasd', 'sadasd', 'asdasd', 'asdasd', 'asdasd', 'asdasd', 2, 2, 5000, 5000, 5000, 0),
(54, 'sdasd', 'sadasd', 'asdasd', 'asdasd', 'asdasd', 'asdasd', 2, 2, 5000, 5000, 5000, 0),
(55, 'sdasd', 'sadasd', 'asdasd', 'asdasd', 'asdasd', 'asdasd', 2, 2, 5000, 5000, 5000, 0),
(56, 'sadasd', 'asdasasd', 'asdasd', 'asdasd', 'asdasd', 'asdasd', 2, 5, 500, 5000, 5000, 0),
(57, 'sadasd', 'asdasasd', 'asdasd', 'asdasd', 'asdasd', 'asdasd', 2, 5, 500, 5000, 5000, 0),
(58, 'sadasd', 'asdasasd', 'asdasd', 'asdasd', 'asdasd', 'asdasd', 2, 5, 500, 5000, 5000, 0),
(59, 'sadasd', 'asdasasd', 'asdasd', 'asdasd', 'asdasd', 'asdasd', 2, 5, 500, 5000, 5000, 0),
(60, 'sadasd', 'asdasasd', 'asdasd', 'asdasd', 'asdasd', 'asdasd', 2, 5, 500, 5000, 5000, 0),
(61, 'sadasd', 'asdasasd', 'asdasd', 'asdasd', 'asdasd', 'asdasd', 2, 5, 500, 5000, 5000, 0),
(62, 'sadasd', 'asdasasd', 'asdasd', 'asdasd', 'asdasd', 'asdasd', 2, 5, 500, 5000, 5000, 0),
(63, 'sadasd', 'asdasasd', 'asdasd', 'asdasd', 'asdasd', 'asdasd', 2, 5, 500, 5000, 5000, 0),
(64, 'sadasd', 'asdasasd', 'asdasd', 'asdasd', 'asdasd', 'asdasd', 2, 5, 500, 5000, 5000, 0),
(65, 'sadasd', 'asdasasd', 'asdasd', 'asdasd', 'asdasd', 'asdasd', 2, 5, 500, 5000, 5000, 0),
(66, 'sadasd', 'asdasasd', 'asdasd', 'asdasd', 'asdasd', 'asdasd', 2, 5, 500, 5000, 5000, 0),
(67, 'sadasd', 'asdasasd', 'asdasd', 'asdasd', 'asdasd', 'asdasd', 2, 5, 500, 5000, 5000, 0),
(68, 'sadasd', 'asdasasd', 'asdasd', 'asdasd', 'asdasd', 'asdasd', 2, 5, 500, 5000, 5000, 0),
(69, 'sadasd', 'asdasasd', 'asdasd', 'asdasd', 'asdasd', 'asdasd', 2, 5, 500, 5000, 5000, 0),
(70, 'sadasd', 'asdasasd', 'asdasd', 'asdasd', 'asdasd', 'asdasd', 2, 5, 500, 5000, 5000, 0),
(71, 'sadasd', 'asdasasd', 'asdasd', 'asdasd', 'asdasd', 'asdasd', 2, 5, 500, 5000, 5000, 0),
(72, 'sadasd', 'asdasasd', 'asdasd', 'asdasd', 'asdasd', 'asdasd', 2, 5, 500, 5000, 5000, 0),
(73, 'sadasd', 'asdasasd', 'asdasd', 'asdasd', 'asdasd', 'asdasd', 2, 5, 500, 5000, 5000, 0),
(74, 'sadasd', 'asdasasd', 'asdasd', 'asdasd', 'asdasd', 'asdasd', 2, 5, 500, 5000, 5000, 0),
(75, 'sadasd', 'asdasasd', 'asdasd', 'asdasd', 'asdasd', 'asdasd', 2, 5, 500, 5000, 5000, 0),
(76, 'sadasd', 'asdasasd', 'asdasd', 'asdasd', 'asdasd', 'asdasd', 2, 5, 500, 5000, 5000, 0),
(77, 'sadasd', 'asdasasd', 'asdasd', 'asdasd', 'asdasd', 'asdasd', 2, 5, 500, 5000, 5000, 0),
(78, 'sadasd', 'asdasasd', 'asdasd', 'asdasd', 'asdasd', 'asdasd', 2, 5, 500, 5000, 5000, 0),
(79, 'sadasd', 'asdasasd', 'asdasd', 'asdasd', 'asdasd', 'asdasd', 2, 5, 500, 5000, 5000, 0),
(80, 'sadasd', 'asdasasd', 'asdasd', 'asdasd', 'asdasd', 'asdasd', 2, 5, 500, 5000, 5000, 0),
(81, 'sadasd', 'asdasasd', 'asdasd', 'asdasd', 'asdasd', 'asdasd', 2, 5, 500, 5000, 5000, 0),
(82, 'sadasd', 'asdasasd', 'asdasd', 'asdasd', 'asdasd', 'asdasd', 2, 5, 500, 5000, 5000, 0),
(83, 'sadasd', 'asdasasd', 'asdasd', 'asdasd', 'asdasd', 'asdasd', 2, 5, 500, 5000, 5000, 0),
(84, 'sadasd', 'asdasasd', 'asdasd', 'asdasd', 'asdasd', 'asdasd', 2, 5, 500, 5000, 5000, 0),
(85, 'sadasd', 'asdasasd', 'asdasd', 'asdasd', 'asdasd', 'asdasd', 2, 5, 500, 5000, 5000, 0),
(86, 'sadasd', 'asdasasd', 'asdasd', 'asdasd', 'asdasd', 'asdasd', 2, 5, 500, 5000, 5000, 0),
(87, 'sadasd', 'asdasasd', 'asdasd', 'asdasd', 'asdasd', 'asdasd', 2, 5, 500, 5000, 5000, 0),
(88, 'sadasd', 'asdasasd', 'asdasd', 'asdasd', 'asdasd', 'asdasd', 2, 5, 500, 5000, 5000, 0),
(89, 'sadasd', 'asdasasd', 'asdasd', 'asdasd', 'asdasd', 'asdasd', 2, 5, 500, 5000, 5000, 0),
(90, 'sadasd', 'asdasasd', 'asdasd', 'asdasd', 'asdasd', 'asdasd', 2, 5, 500, 5000, 5000, 0),
(91, 'sadasd', 'asdasasd', 'asdasd', 'asdasd', 'asdasd', 'asdasd', 2, 5, 500, 5000, 5000, 0),
(92, 'sadasd', 'asdasasd', 'asdasd', 'asdasd', 'asdasd', 'asdasd', 2, 5, 500, 5000, 5000, 0),
(93, 'sadasd', 'asdasasd', 'asdasd', 'asdasd', 'asdasd', 'asdasd', 2, 5, 500, 5000, 5000, 0),
(94, 'sadasd', 'asdasasd', 'asdasd', 'asdasd', 'asdasd', 'asdasd', 2, 5, 500, 5000, 5000, 0),
(95, 'sadasd', 'asdasasd', 'asdasd', 'asdasd', 'asdasd', 'asdasd', 2, 5, 500, 5000, 5000, 0),
(96, 'sadasd', 'asdasasd', 'asdasd', 'asdasd', 'asdasd', 'asdasd', 2, 5, 500, 5000, 5000, 0),
(97, 'sadasd', 'asdasasd', 'asdasd', 'asdasd', 'asdasd', 'asdasd', 2, 5, 500, 5000, 5000, 0),
(98, 'sadasd', 'asdasasd', 'asdasd', 'asdasd', 'asdasd', 'asdasd', 2, 5, 500, 5000, 5000, 0),
(99, 'sadasd', 'asdasasd', 'asdasd', 'asdasd', 'asdasd', 'asdasd', 2, 5, 500, 5000, 5000, 0),
(100, 'sadasd', 'asdasasd', 'asdasd', 'asdasd', 'asdasd', 'asdasd', 2, 5, 500, 5000, 5000, 0),
(101, 'sadasd', 'asdasasd', 'asdasd', 'asdasd', 'asdasd', 'asdasd', 2, 5, 500, 5000, 5000, 0),
(102, 'sadasd', 'asdasasd', 'asdasd', 'asdasd', 'asdasd', 'asdasd', 2, 5, 500, 5000, 5000, 0),
(103, 'sadasd', 'asdasasd', 'asdasd', 'asdasd', 'asdasd', 'asdasd', 2, 5, 500, 5000, 5000, 0),
(104, 'sadasd', 'asdasasd', 'asdasd', 'asdasd', 'asdasd', 'asdasd', 2, 5, 500, 5000, 5000, 0),
(105, 'sadasd', 'asdasasd', 'asdasd', 'asdasd', 'asdasd', 'asdasd', 2, 5, 500, 5000, 5000, 0),
(106, 'sadasd', 'asdasasd', 'asdasd', 'asdasd', 'asdasd', 'asdasd', 2, 5, 500, 5000, 5000, 0),
(107, 'sadasd', 'asdasasd', 'asdasd', 'asdasd', 'asdasd', 'asdasd', 2, 5, 500, 5000, 5000, 0),
(108, 'sadasd', 'asdasasd', 'asdasd', 'asdasd', 'asdasd', 'asdasd', 2, 5, 500, 5000, 5000, 0),
(109, 'sadasd', 'asdasasd', 'asdasd', 'asdasd', 'asdasd', 'asdasd', 2, 5, 500, 5000, 5000, 0),
(110, 'sadasd', 'asdasasd', 'asdasd', 'asdasd', 'asdasd', 'asdasd', 2, 5, 500, 5000, 5000, 0),
(111, 'sadasd', 'asdasasd', 'asdasd', 'asdasd', 'asdasd', 'asdasd', 2, 5, 500, 5000, 5000, 0),
(112, 'sadasd', 'asdasasd', 'asdasd', 'asdasd', 'asdasd', 'asdasd', 2, 5, 500, 5000, 5000, 0),
(113, 'sadasd', 'asdasasd', 'asdasd', 'asdasd', 'asdasd', 'asdasd', 2, 5, 500, 5000, 5000, 0),
(114, 'sadasd', 'asdasasd', 'asdasd', 'asdasd', 'asdasd', 'asdasd', 2, 5, 500, 5000, 5000, 0),
(115, 'sadasd', 'asdasasd', 'asdasd', 'asdasd', 'asdasd', 'asdasd', 2, 5, 500, 5000, 5000, 0),
(116, 'sadasd', 'asdasasd', 'asdasd', 'asdasd', 'asdasd', 'asdasd', 2, 5, 500, 5000, 5000, 0),
(117, 'sadasd', 'asdasasd', 'asdasd', 'asdasd', 'asdasd', 'asdasd', 2, 5, 500, 5000, 5000, 0),
(118, 'sadasd', 'asdasasd', 'asdasd', 'asdasd', 'asdasd', 'asdasd', 2, 5, 500, 5000, 5000, 0),
(119, 'sadasd', 'asdasasd', 'asdasd', 'asdasd', 'asdasd', 'asdasd', 2, 5, 500, 5000, 5000, 0),
(120, 'sadasd', 'asdasasd', 'asdasd', 'asdasd', 'asdasd', 'asdasd', 2, 5, 500, 5000, 5000, 0),
(121, 'sadasd', 'asdasasd', 'asdasd', 'asdasd', 'asdasd', 'asdasd', 2, 5, 500, 5000, 5000, 0),
(122, 'asda', 'sad', 'asdas', 'asd', 'asdas', 'asd', 18, 1, 5000, 5000, 5000, 5),
(125, 'adsassssss', 'ssssssssssssssssss', 'ssssssssssssssssssss', 'sssssssssssssssss', 'sssssssssssssssss', 'sssssssssssssss', 18, 7, 500000, 500000, 500000, 0),
(126, 'adsassssss', 'ssssssssssssssssss', 'ssssssssssssssssssss', 'sssssssssssssssss', 'sssssssssssssssss', 'sssssssssssssss', 18, 7, 500000, 500000, 500000, 0),
(127, 'asdas', 'asd', 'asdas', 'asdas', 'asdasd', 'asdas', 18, 7, 222, 222, 222, 0),
(128, 'asdasd', 'asdas', 'asdasd', 'asdas', 'asdasd', 'asdas', 18, 7, 20000, 20000, 20000, 0),
(129, 'asdas', 'asda', 'asdas', 'asdas', 'asdas', 'asdas', 18, 7, 2000, 2000, 200, 0),
(130, 'aasdsa', 'asdas', 'asdasd', 'asdas', 'asdas', 'asdas', 18, 7, 215, 1515, 212, 0),
(131, 'asdsadaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaa', 'ssssssssssssssss', 'sssssssssssssssssss', 18, 7, 12, 12, 12, 0),
(132, 'asdsadaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaa', 'ssssssssssssssss', 'sssssssssssssssssss', 18, 7, 12, 12, 12, 0),
(133, 'asdsadaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaa', 'ssssssssssssssss', 'sssssssssssssssssss', 18, 7, 12, 12, 12, 0),
(134, 'asdasd', 'asdas', 'asdasd', 'asdasd', 'asdsa', 'asdasd', 18, 7, 20000, 20000, 200000, 0),
(138, 'sadcad', 'asdasd', 'asdasd', 'asdasd', 'asdasd', 'asdas', 18, 7, 5000, 5000, 5000, 0),
(139, 'sadasd', 'asdasd', 'sdasd', 'asdasda', 'asdasd', 'asdas', 18, 7, 5000, 50000, 52000, 0),
(140, 'sdsadasd', 'asdas', 'asdasd', 'asdasd', 'asdasd', 'asdasd', 16, 7, 5000, 5000, 5000, 0),
(141, 'sdsadasd', 'asdas', 'asdasd', 'asdasd', 'asdasd', 'asdasd', 18, 7, 5000, 5000, 5000, 0),
(142, 'test', 'asdasd', 'asdasd', 'asdasd', 'asdasdas', 'asdasd', 18, 7, 2000, 2000, 2000, 0),
(143, 'test2', 'sdfsad', 'asdasd', 'asdasd', 'asdasd', 'asdasd', 18, 7, 2000, 2000, 2000, 0),
(144, 'test3', 'test', 'sadasd', 'asdasd', 'asdasd', 'asdasd', 16, 7, 2000, 2000, 2000, 0),
(145, 'asdasd', 'asdsadas', 'sadasd', 'asdasd', 'asdasd', 'asdasdasd', 16, 7, 1522, 625, 326, 4),
(146, 'sdsadas', 'asdasd', 'asdsad', 'asdasd', 'asdasd', 'asdasd', 18, 7, 2000, 2000, 20000, 0),
(147, 'ຫຫັັກັຫກັຫກ', 'asdasd', 'ັຫກັຫກັຫກັຫກັຫກັ', 'asdasdas', 'ັຫກັຫກັຫກັຫກ', 'asdasdas', 16, 7, 15000000, 50000, 6000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `system`
--

DROP TABLE IF EXISTS `system`;
CREATE TABLE IF NOT EXISTS `system` (
  `id` int(11) NOT NULL,
  `Name_LA` varchar(70) NOT NULL,
  `Name_EN` varchar(70) NOT NULL,
  `token_bot` varchar(300) DEFAULT NULL,
  `image` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `system`
--

INSERT INTO `system` (`id`, `Name_LA`, `Name_EN`, `token_bot`, `image`) VALUES
(404, 'ເວບໄຊຂາຍດິນອອນລາຍ', 'Sale Online', 'asfsafergdfhdhrtd', '1587268188.png');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `address` varchar(300) NOT NULL,
  `phone` varchar(8) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `user_type` varchar(15) NOT NULL,
  `status` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `surname`, `address`, `phone`, `username`, `password`, `user_type`, `status`) VALUES
(3, 'customer', 'customer', 'customer', '77452952', 'customer', '123456', 'Customer', 'No Active'),
(7, 'Member', 'Member', 'Member', 'Member', 'Member', '123456', 'VIP', 'No Active'),
(8, 'test', 'test', 'setes', '777777', 'test', 'test', 'Customer', 'No Active'),
(9, 'test', 'test', 'setes', '777777', 'test', 'test', 'Customer', 'No Active'),
(10, 'asdasd', 'asdasd', 'asdasd', 'asdasda', 'fffff', 'fffff', 'Customer', NULL),
(11, 'Admin', 'Admin', 'Admin', '77452952', 'Admin', '123456', 'Admin', 'Active');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
