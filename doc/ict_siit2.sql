-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 03, 2015 at 04:01 PM
-- Server version: 5.6.13
-- PHP Version: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ict_siit`
--
CREATE DATABASE IF NOT EXISTS `ict_siit` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `ict_siit`;

-- --------------------------------------------------------

--
-- Table structure for table `tb_timetable`
--

DROP TABLE IF EXISTS `tb_timetable`;
CREATE TABLE IF NOT EXISTS `tb_timetable` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `subject_code` text COLLATE utf8_unicode_ci NOT NULL,
  `subject_name` text COLLATE utf8_unicode_ci NOT NULL,
  `subject_period` text COLLATE utf8_unicode_ci NOT NULL,
  `subject_day` int(11) NOT NULL,
  `subject_color` text COLLATE utf8_unicode_ci NOT NULL,
  `createdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modifiedate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tb_timetable`
--

INSERT INTO `tb_timetable` (`id`, `user_id`, `subject_code`, `subject_name`, `subject_period`, `subject_day`, `subject_color`, `createdate`, `modifiedate`) VALUES
(1, 2, 't001', 'test subject name', '9.30-12.30', 1, '#f00', '2015-01-29 03:21:08', '2015-01-30 09:35:40'),
(2, 2, 't001', 'test subject name', '13.30-15.00', 2, '#f00', '2015-01-29 03:29:21', '2015-01-30 09:35:44'),
(6, 1, 'T001', 'T', '9.30-11.00', 1, '#ff0', '2015-01-30 14:54:39', '2015-01-30 14:54:39'),
(7, 1, 'T100', 'Test', '13.30-16.30', 1, '#f00', '2015-01-30 14:54:39', '2015-01-30 14:54:39');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
