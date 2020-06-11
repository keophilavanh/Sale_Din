-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 11, 2020 at 05:00 AM
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
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;

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
(31, 147, 'img/1588697265_3.png', 'product/'),
(32, 148, 'img/1590427737_1.jpg', 'product/'),
(33, 162, 'img/1591628128_1.jpeg', 'product/'),
(34, 162, 'img/1591628128_2.jpeg', 'product/'),
(35, 162, 'img/1591628128_3.jpeg', 'product/'),
(36, 163, 'img/1591802207_1.jpg', 'product/');

-- --------------------------------------------------------

--
-- Table structure for table `inbox`
--

DROP TABLE IF EXISTS `inbox`;
CREATE TABLE IF NOT EXISTS `inbox` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message` varchar(500) NOT NULL,
  `phone` varchar(13) DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL,
  `from` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=45 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `inbox`
--

INSERT INTO `inbox` (`id`, `message`, `phone`, `name`, `user_id`, `from`) VALUES
(43, 'tset shap', '77452952', 'C shap', 2, NULL),
(42, 'tset shap', '77452952', 'C shap', 2, NULL),
(41, 'sdasd', 'setes', 'test', 11, 11),
(40, 'asdasd', 'asdas', 'asdsad', 11, NULL),
(39, 'sdfasdsa', '', 'Admin Admin', 11, NULL),
(44, 'tset shap', '77452952', 'C shap', 2, NULL),
(38, 'setstets', '', 'Admin Admin', -1, 11);

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
  `date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

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
  `USD_m` double NOT NULL,
  `KIP_m` double NOT NULL,
  `THB_m` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=164 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `Name_LA`, `Name_EN`, `Description_LA`, `Description_EN`, `Localtion_LA`, `Localtion_EN`, `cat_id`, `user_id`, `Price_KIP`, `Price_THB`, `Price_USD`, `view`, `USD_m`, `KIP_m`, `THB_m`) VALUES
(161, 'asdad', 'asdsad', 'asdad', 'asdad', 'ແຂວງນະຄອນຫຼວງ', 'asdad', 18, 11, 222, 55, 555, 91, 0, 0, 0),
(162, 'asdad', 'asdsad', 'ແຂວງນະຄອນຫຼວງ', 'asdad', 'ແຂວງນະຄອນຫຼວງ', 'asdad', 18, 11, 222, 55, 555, 55, 0, 0, 0),
(160, 'asdad', 'asdsad', 'asdad', 'asdad', 'ແຂວງນະຄອນຫຼວງ', 'asdad', 18, 11, 222, 55, 555, 34, 300, 150000, 2000),
(159, 'asdad', 'asdsad', 'asdad', 'asdad', 'ແຂວງນະຄອນຫຼວງ', 'asdad', 18, 11, 222, 55, 555, 34, 0, 0, 0),
(158, 'asdad', 'asdsad', 'asdad', 'asdad', 'ແຂວງນະຄອນຫຼວງ', 'asdad', 18, 11, 222, 55, 555, 34, 0, 0, 0),
(157, 'asdad', 'asdsad', 'asdad', 'asdad', 'ແຂວງນະຄອນຫຼວງ', 'asdad', 18, 11, 222, 55, 555, 34, 0, 0, 0),
(156, 'asdad', 'asdsad', 'asdad', 'asdad', 'ແຂວງນະຄອນຫຼວງ', 'asdad', 18, 11, 222, 55, 555, 34, 0, 0, 0),
(155, 'asdad', 'asdsad', 'asdad', 'asdad', 'ແຂວງນະຄອນຫຼວງ', 'asdad', 18, 11, 222, 55, 555, 34, 0, 0, 0),
(154, 'asdad', 'asdsad', 'asdad', 'asdad', 'ແຂວງນະຄອນຫຼວງ', 'asdad', 18, 11, 222, 55, 555, 34, 0, 0, 0),
(153, 'asdad', 'asdsad', 'asdad', 'asdad', 'ແຂວງນະຄອນຫຼວງ', 'asdad', 18, 11, 222, 55, 555, 34, 0, 0, 0),
(152, 'asdad', 'asdsad', 'asdad', 'asdad', 'asdad', 'asdad', 18, 11, 222, 55, 555, 34, 0, 0, 0),
(151, 'asdad', 'asdsad', 'asdad', 'asdad', 'ແຂວງນະຄອນຫຼວງ', 'asdad', 18, 11, 222, 55, 555, 34, 0, 0, 0),
(148, 'asdad', 'asdsad', 'asdad', 'asdad', 'ແຂວງນະຄອນຫຼວງ', 'asdad', 18, 11, 222, 55, 555, 38, 0, 0, 0),
(149, 'asdad', 'asdsad', 'asdad', 'asdad', 'ແຂວງນະຄອນຫຼວງ', 'asdad', 18, 11, 222, 55, 555, 34, 0, 0, 0),
(150, 'asdad', 'asdsad', 'asdad', 'asdad', 'asdad', 'asdad', 18, 11, 222, 55, 555, 34, 0, 0, 0),
(163, 'seesef', 'sdfsdfsd', 'sdfsdfsdf', 'sdfsdfsd', 'sdfsdfsdf', 'sdfsdfsdfsd', 18, 11, 150000000, 5200000, 600000, 0, 300, 1500000, 5000);

-- --------------------------------------------------------

--
-- Table structure for table `provin`
--

DROP TABLE IF EXISTS `provin`;
CREATE TABLE IF NOT EXISTS `provin` (
  `provin_id` int(11) NOT NULL AUTO_INCREMENT,
  `provin_name_la` varchar(50) NOT NULL,
  `provin_name_en` varchar(50) NOT NULL,
  `parent` int(11) DEFAULT NULL,
  PRIMARY KEY (`provin_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `provin`
--

INSERT INTO `provin` (`provin_id`, `provin_name_la`, `provin_name_en`, `parent`) VALUES
(3, 'ເມືອງສີໂຄດຕະບອງ', 'setse2555', 2),
(2, 'ແຂວງນະຄອນຫຼວງ', 'test', NULL),
(4, 'ເມືອງຈັນທະບູລີ', 'Chanthabouly city', 2),
(5, 'ເມືອງສີສັດຕະນາກ', 'sesattanak city', 2),
(6, 'ແຂວງວຽງຈັນ', 'test', NULL),
(7, 'ແຂວງຫຼວງພະບາງ', 'หกหฟ', NULL);

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
  `chat_id` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `system`
--

INSERT INTO `system` (`id`, `Name_LA`, `Name_EN`, `token_bot`, `image`, `chat_id`) VALUES
(404, 'ເວບໄຊຂາຍດິນອອນລາຍ', 'Sale Online', '1251355437:AAElMMZ1XR7nS2CerqCNxQp0vXeMOZR8g5E', '1587268188.png', '838018807');

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
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `surname`, `address`, `phone`, `username`, `password`, `user_type`, `status`) VALUES
(3, 'customer', 'customer', 'customer', '77452952', 'customer', '123456', 'Customer', 'No Active'),
(7, 'Member', 'Member', 'Member', 'Member', 'Member', '123456', 'VIP', 'Active'),
(8, 'test', 'test', 'setes', '777777', 'test', 'test', 'Customer', 'Active'),
(9, 'test', 'test', 'setes', '777777', 'test', 'test', 'Customer', 'No Active'),
(10, 'asdasd', 'asdasd', 'asdasd', 'asdasda', 'fffff', 'fffff', 'Customer', NULL),
(11, 'Admin', 'Admin', 'Admin', '77452952', 'Admin', '123456', 'Admin', 'Active'),
(12, 'test mes', 'tset mes', 'mrse', '77452952', 'test', '123456', 'Member', NULL),
(13, 'test', 'sdfdsf', 'sdfsd', '555', 'test222', '123456', 'Customer', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
