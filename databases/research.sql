-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2015 at 06:41 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `social_network`
--

-- --------------------------------------------------------

--
-- Table structure for table `research`
--

CREATE TABLE IF NOT EXISTS `research` (
  `r_id` int(20) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `abstract` text NOT NULL,
  `keyword` text NOT NULL,
  `user_name` text NOT NULL,
  `link` varchar(1000) NOT NULL,
  UNIQUE KEY `r_id` (`r_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `research`
--

INSERT INTO `research` (`r_id`, `title`, `abstract`, `keyword`, `user_name`, `link`) VALUES
(1, 'ss', 'jbj', 'jbj', 'cpsingh', ''),
(2, 'dws', 'w', 'wdw', 'cpsingh', 'w');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
