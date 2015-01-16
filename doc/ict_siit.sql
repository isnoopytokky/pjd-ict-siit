-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 16, 2015 at 03:04 AM
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
-- Table structure for table `tb_configurations`
--

CREATE TABLE IF NOT EXISTS `tb_configurations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `conf_name` text COLLATE utf8_unicode_ci NOT NULL,
  `conf_value` text COLLATE utf8_unicode_ci NOT NULL,
  `createdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modifiedate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tb_configurations`
--

INSERT INTO `tb_configurations` (`id`, `conf_name`, `conf_value`, `createdate`, `modifiedate`) VALUES
(1, 'about_description', '&#10;&#9;&#9;&#9;&#9;&#9;&#9;&#9;&#9;    <h2>à¸Ÿà¸«à¸à¸Ÿà¸</h2><p>à¸Ÿà¸«à¸à¸Ÿ</p><p>p</p><h6>p</h6><p>Â  Â  test</p>&#9;&#9;&#9;&#9;&#9;&#9;&#9;&#9;  &#9;&#9;&#9;&#9;&#9;&#9;&#9;&#9;  &#9;&#9;&#9;&#9;&#9;&#9;&#9;&#9;  &#9;&#9;&#9;&#9;&#9;&#9;&#9;&#9;  ', '2015-01-15 08:07:51', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_news`
--

CREATE TABLE IF NOT EXISTS `tb_news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `news_title` text COLLATE utf8_unicode_ci NOT NULL,
  `news_detail` text COLLATE utf8_unicode_ci NOT NULL,
  `news_picture` text COLLATE utf8_unicode_ci NOT NULL,
  `news_link` text COLLATE utf8_unicode_ci NOT NULL,
  `isactive` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `createdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modifiedate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Dumping data for table `tb_news`
--

INSERT INTO `tb_news` (`id`, `news_title`, `news_detail`, `news_picture`, `news_link`, `isactive`, `createdate`, `modifiedate`) VALUES
(1, 'SIIT Van and Shuttle Bus Service (January 12 - May 23, 2015)', 'A', '/images/news/1.jpg', '', '1', '2015-01-15 08:34:05', '2015-01-15 08:35:43'),
(2, 'SIIT Van and Shuttle Bus Service (January 11 - May 11, 2016)', 'B', '/images/news/2.jpg', '', '1', '2015-01-15 08:34:05', '2015-01-15 08:36:33'),
(3, 'SIIT Van and Shuttle Bus Service (January 12 - May 23, 2015)', 'C', '/images/news/1.jpg', '', '1', '2015-01-15 08:34:05', '2015-01-15 08:36:35'),
(4, 'SIIT Van and Shuttle Bus Service (January 12 - May 23, 2015)', 'D', '/images/news/1.jpg', '', '1', '2015-01-15 08:34:05', '2015-01-15 08:36:36'),
(5, 'SIIT Van and Shuttle Bus Service (January 12 - May 23, 2015)', 'SIIT Van and Shuttle Bus Service (January 12 - May 23, 2015)', '/images/news/1.jpg', '', '1', '2015-01-15 08:34:05', '2015-01-15 08:36:37'),
(6, 'SIIT Van and Shuttle Bus Service (January 12 - May 23, 2015)', 'SIIT Van and Shuttle Bus Service (January 12 - May 23, 2015)', '/images/news/1.jpg', '', '1', '2015-01-15 08:34:05', '2015-01-15 08:36:39'),
(7, 'SIIT Van and Shuttle Bus Service (January 12 - May 23, 2015)', 'SIIT Van and Shuttle Bus Service (January 12 - May 23, 2015)', '/images/news/1.jpg', '', '1', '2015-01-15 08:34:05', '2015-01-15 08:36:40'),
(8, 'SIIT Van and Shuttle Bus Service (January 12 - May 23, 2015)', 'SIIT Van and Shuttle Bus Service (January 12 - May 23, 2015)', '/images/news/1.jpg', '', '1', '2015-01-15 08:34:05', '2015-01-15 08:36:41'),
(9, 'SIIT Van and Shuttle Bus Service (January 12 - May 23, 2015)', 'SIIT Van and Shuttle Bus Service (January 12 - May 23, 2015)', '/images/news/1.jpg', '', '1', '2015-01-15 08:34:05', '2015-01-15 08:36:46'),
(10, 'SIIT Van and Shuttle Bus Service (January 12 - May 23, 2015)', 'SIIT Van and Shuttle Bus Service (January 12 - May 23, 2015)', '/images/news/1.jpg', '', '1', '2015-01-15 08:34:05', '2015-01-15 08:36:46');

-- --------------------------------------------------------

--
-- Table structure for table `tb_test`
--

CREATE TABLE IF NOT EXISTS `tb_test` (
  `id` int(11) NOT NULL,
  `text` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_test`
--

INSERT INTO `tb_test` (`id`, `text`) VALUES
(1, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_users`
--

CREATE TABLE IF NOT EXISTS `tb_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `createdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `lastlogin` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tb_users`
--

INSERT INTO `tb_users` (`id`, `username`, `password`, `role`, `createdate`, `lastlogin`) VALUES
(1, 'admin', '1234', 'Staff', '2015-01-02 17:00:00', '2015-01-02 18:36:14');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
