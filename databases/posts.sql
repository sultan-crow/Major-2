-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2015 at 02:52 PM
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
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `post_id` int(20) NOT NULL AUTO_INCREMENT,
  `posted_by` varchar(50) NOT NULL,
  `class` text NOT NULL,
  `post_title` text NOT NULL,
  `post_text` varchar(1000) NOT NULL,
  `time` varchar(25) NOT NULL,
  `date` varchar(25) NOT NULL,
  PRIMARY KEY (`post_id`),
  UNIQUE KEY `post_id` (`post_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `posted_by`, `class`, `post_title`, `post_text`, `time`, `date`) VALUES
(13, 'rsrivastava', 'Second', 'No class this week', 'wq', '12:00:56', '2015-03-28'),
(16, 'cpsingh', 'First', 'New Timings', 'hhr', '21:58:56', '2015-03-28'),
(17, 'cpsingh', 'Fourth', 'No class', 'cppccp', '21:59:05', '2015-03-28'),
(20, 'ketan', 'Second', 'acd', 'accfew', '04:51:59', '2015-04-15'),
(21, 'ketan', 'Second', 'sasc', 'sdvswvw', '04:52:50', '2015-04-15'),
(22, 'ketan', 'Second', 'sasc', 'sdvswvw', '04:53:17', '2015-04-15'),
(26, 'ketan', 'Second', 'fasc', 'No class this week', '08:55:37', '2015-04-15'),
(27, 'ketan', 'Second', '', '', '00:21:27', '2015-04-28'),
(28, 'ketan', 'Second', '', '', '00:25:15', '2015-04-28'),
(29, 'ketan', 'Second', '', '', '00:34:52', '2015-04-28'),
(30, 'ketan', 'Second', 'Hello', 'Bye!!', '00:37:11', '2015-04-28'),
(31, 'ketan', 'Second', 'hdh', 'rhreh', '01:11:07', '2015-04-28'),
(32, 'ketan', 'Second', 'thty', 'ydr', '01:12:09', '2015-04-28'),
(33, 'ketan', 'Second', 'qq', 'd', '01:21:45', '2015-04-28'),
(34, 'ketan', 'Second', 'xaz', 'xaxaxa', '01:22:17', '2015-04-28'),
(35, 'ketan', 'Second', 'ds', 'sxs', '01:25:29', '2015-04-28'),
(36, 'ketan', 'Second', 'cs', 'dwdw', '01:25:42', '2015-04-28'),
(37, 'ketan', 'Second', 'dq', 'csd', '01:27:09', '2015-04-28');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
