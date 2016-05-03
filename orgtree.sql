-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2016 at 11:22 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `orgtree`
--

-- --------------------------------------------------------

--
-- Table structure for table `adjacancylist`
--

CREATE TABLE IF NOT EXISTS `adjacancylist` (
  `NodeId` int(100) NOT NULL AUTO_INCREMENT,
  `NodeName` varchar(100) COLLATE utf32_unicode_ci NOT NULL,
  `OrignalId` int(100) NOT NULL,
  `NodeType` varchar(10) COLLATE utf32_unicode_ci NOT NULL,
  `TitleName` varchar(100) COLLATE utf32_unicode_ci DEFAULT NULL,
  `Contact` varchar(50) COLLATE utf32_unicode_ci DEFAULT NULL,
  `Avatar` varchar(100) COLLATE utf32_unicode_ci DEFAULT NULL,
  `Division` varchar(100) COLLATE utf32_unicode_ci DEFAULT NULL,
  `Address` varchar(500) COLLATE utf32_unicode_ci DEFAULT NULL,
  `Email` varchar(50) COLLATE utf32_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`NodeId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci AUTO_INCREMENT=60 ;

--
-- Dumping data for table `adjacancylist`
--

INSERT INTO `adjacancylist` (`NodeId`, `NodeName`, `OrignalId`, `NodeType`, `TitleName`, `Contact`, `Avatar`, `Division`, `Address`, `Email`) VALUES
(1, 'Employee Directory', 0, 'Rt', NULL, NULL, 'http://localhost/orgtree/Graph/assets/img/empdir_avatar.png', NULL, '148 WOW BAO - Water Tower', NULL),
(51, 'Karachi', 134, 'D', NULL, NULL, 'http://localhost/orgtree/Graph/assets/img/division_avatar.png', NULL, NULL, NULL),
(52, 'Lahore', 135, 'D', NULL, NULL, 'http://localhost/orgtree/Graph/assets/img/division_avatar.png', NULL, NULL, NULL),
(55, 'KFC', 40, 'R', NULL, '1212', 'http://localhost/orgtree/Graph/assets/img/rest_avatar.png', NULL, 'kfc road', 'kfc@g.com'),
(57, 'CoffeHouse', 42, 'R', NULL, '321321', 'http://localhost/orgtree/Graph/assets/img/rest_avatar.png', NULL, '1213 Road', 'c@aa.com'),
(58, 'Haider', 1, 'E', 'GM', '23123', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `division`
--

CREATE TABLE IF NOT EXISTS `division` (
  `division_id` int(11) NOT NULL AUTO_INCREMENT,
  `division_name` varchar(50) NOT NULL,
  PRIMARY KEY (`division_id`),
  UNIQUE KEY `division_name` (`division_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=137 ;

--
-- Dumping data for table `division`
--

INSERT INTO `division` (`division_id`, `division_name`) VALUES
(134, 'Karachi'),
(135, 'Lahore');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `employee_id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_name` varchar(50) NOT NULL,
  `employee_contact` varchar(20) NOT NULL,
  `employee_email` varchar(50) NOT NULL,
  `employee_avatar` varchar(255) NOT NULL,
  `restaurant_id` int(11) NOT NULL,
  `title_id` int(11) NOT NULL,
  PRIMARY KEY (`employee_id`),
  UNIQUE KEY `employee_email` (`employee_email`),
  KEY `title_id` (`title_id`),
  KEY `resturant_id` (`restaurant_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employee_id`, `employee_name`, `employee_contact`, `employee_email`, `employee_avatar`, `restaurant_id`, `title_id`) VALUES
(2, 'Haider', '5218924', 'abc@hotm.com', 'avatar.png', 40, 12);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `lastlogin` varchar(100) NOT NULL,
  `role` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `email`, `lastlogin`, `role`) VALUES
(0, 'passcode', '123', '', '', 3),
(2, 'Haider', 'hmFr25u4', 'abc@hotm.com', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `passcode`
--

CREATE TABLE IF NOT EXISTS `passcode` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `passcode`
--

INSERT INTO `passcode` (`id`, `code`) VALUES
(1, '123');

-- --------------------------------------------------------

--
-- Table structure for table `relationship`
--

CREATE TABLE IF NOT EXISTS `relationship` (
  `Rid` int(100) NOT NULL AUTO_INCREMENT,
  `NodeId` int(100) NOT NULL,
  `Relation` varchar(10) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  PRIMARY KEY (`Rid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `relationship`
--

INSERT INTO `relationship` (`Rid`, `NodeId`, `Relation`) VALUES
(23, 1, '1->51'),
(24, 1, '1->52'),
(32, 51, '51->55'),
(34, 52, '52->57');

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

CREATE TABLE IF NOT EXISTS `restaurant` (
  `restaurant_id` int(11) NOT NULL AUTO_INCREMENT,
  `restaurant_name` varchar(255) NOT NULL,
  `restaurant_postcode` int(11) NOT NULL,
  `division_id` int(11) NOT NULL,
  `restaurant_email` varchar(50) NOT NULL,
  `restaurant_contact` varchar(50) NOT NULL,
  `restaurant_address` varchar(255) NOT NULL,
  PRIMARY KEY (`restaurant_id`),
  UNIQUE KEY `restaurant_name` (`restaurant_name`),
  KEY `division_id` (`division_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=43 ;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`restaurant_id`, `restaurant_name`, `restaurant_postcode`, `division_id`, `restaurant_email`, `restaurant_contact`, `restaurant_address`) VALUES
(40, 'KFC', 1212, 134, 'kfc@g.com', '1212', 'kfc road'),
(42, 'CoffeHouse', 3213, 135, 'c@aa.com', '321321', '1213 Road');

-- --------------------------------------------------------

--
-- Table structure for table `site_log`
--

CREATE TABLE IF NOT EXISTS `site_log` (
  `log_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `labelname` varchar(50) NOT NULL,
  `query_type` varchar(255) NOT NULL,
  `query` varchar(500) NOT NULL,
  `log_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`log_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `site_log`
--

INSERT INTO `site_log` (`log_id`, `username`, `labelname`, `query_type`, `query`, `log_date`) VALUES
(1, 'Admin', 'division', 'delete', '[ERROR] [Cannot delete or update a parent row: a foreign key constraint fails (`orgtree`.`restaurant`, CONSTRAINT `restaurant_ibfk_1` FOREIGN KEY (`division_id`) REFERENCES `division` (`division_id`))] DELETE FROM `division` where `division_id` = ''134'' <> DELETE FROM `relationship` where SUBSTRING_INDEX(SUBSTRING_INDEX(Relation, ''->'', 2), ''->'', -1)=51 <> DELETE FROM `adjacancylist` where NodeType=''D'' and `OrignalId`=134', '2016-04-23 22:47:57'),
(2, 'Admin', 'division', 'delete', '[ERROR] [Division Cannot be Deleted , due to having one or More Restaurant] ', '2016-04-23 22:49:49'),
(3, 'Admin', 'employee', 'delete', 'DELETE FROM `employee` where `employee_id` = ''1''', '2016-04-23 22:58:40'),
(5, 'Admin', 'restaurant', 'delete', '[ERROR] [] ', '2016-04-23 22:59:21'),
(7, 'Admin', 'restaurant', 'delete', '[ERROR] [] ', '2016-04-23 23:05:57'),
(8, 'Admin', 'restaurant', 'delete', '[ERROR] [Restaurant Cannot be Deleted , due to having one or More Employees] ', '2016-04-23 23:14:16'),
(9, 'Admin', 'division', 'insert', 'INSERT INTO `division`(`division_name`) VALUES (''Islamabad'') ', '2016-04-23 23:15:45'),
(10, 'Admin', 'division', 'insert', 'INSERT INTO `adjacancylist`\r\n							( \r\n							 `NodeName`, `OrignalId`, \r\n							 `NodeType`, `TitleName`, \r\n							 `Contact`, `Avatar`, \r\n							 `Division`,`Address`, \r\n							 `Email`) VALUES\r\n							 (''Islamabad'', ''136'', ''D'', NULL, NULL,\r\n							 	''http://localhost/orgtree/Graph/assets/img/division_avatar.png'',\r\n							 	NULL, NULL, NULL) ', '2016-04-23 23:15:45'),
(11, 'Admin', 'division', 'insert', 'INSERT INTO `relationship`(`NodeId`, `Relation`) VALUES\r\n							 (1,''1->59'') ', '2016-04-23 23:15:45'),
(12, 'Admin', 'division', 'update', 'UPDATE `division` set `division_name` =''Peshawar'' where division_id=''136'' ', '2016-04-23 23:15:58'),
(13, 'Admin', 'division', 'update', 'UPDATE `adjacancylist` set `NodeName` =''Peshawar'' where NodeType=''D'' and OrignalId=''136'' ', '2016-04-23 23:15:58'),
(14, 'Admin', 'division', 'delete', 'DELETE FROM `division` where `division_id` = ''136''', '2016-04-23 23:16:02'),
(15, 'Admin', 'division', 'delete', 'DELETE FROM `adjacancylist` where NodeType=''D'' and `OrignalId`=136', '2016-04-23 23:16:02'),
(16, 'Admin', 'division', 'delete', 'DELETE FROM `relationship` where SUBSTRING_INDEX(SUBSTRING_INDEX(Relation, ''->'', 2), ''->'', -1)=59', '2016-04-23 23:16:02'),
(17, 'Admin', 'restaurant', 'delete', '[ERROR] [Restaurant Cannot be Deleted , due to having one or More Employees] ', '2016-04-24 01:14:38');

-- --------------------------------------------------------

--
-- Table structure for table `title`
--

CREATE TABLE IF NOT EXISTS `title` (
  `title_id` int(11) NOT NULL AUTO_INCREMENT,
  `title_name` varchar(255) NOT NULL,
  `hierarchy_id` int(11) NOT NULL,
  PRIMARY KEY (`title_id`),
  UNIQUE KEY `title_name` (`title_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `title`
--

INSERT INTO `title` (`title_id`, `title_name`, `hierarchy_id`) VALUES
(12, 'CEO', 1),
(13, 'GM', 2),
(14, 'Manager', 3),
(15, 'Cleaner', 4),
(16, 'Team Member', 5),
(18, 'GM3', 3);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`title_id`) REFERENCES `title` (`title_id`),
  ADD CONSTRAINT `employee_ibfk_2` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurant` (`restaurant_id`),
  ADD CONSTRAINT `employee_ibfk_3` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurant` (`restaurant_id`);

--
-- Constraints for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD CONSTRAINT `restaurant_ibfk_1` FOREIGN KEY (`division_id`) REFERENCES `division` (`division_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
