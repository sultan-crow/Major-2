-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2015 at 12:13 AM
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
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` text NOT NULL,
  `user_id` text NOT NULL,
  `comments` text NOT NULL,
  `date` text NOT NULL,
  `time` text NOT NULL,
  PRIMARY KEY (`comment_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `post_id`, `user_id`, `comments`, `date`, `time`) VALUES
(1, '13', 'jrfjrt', 'jtjtjte', 'ghdth', 'tdued'),
(2, '13', '64e', 'dyu', 'dye', 'ueu'),
(5, '13', 'ketan', 'dvd', '2015-04-27', '23:17:34'),
(6, '13', 'ketan', 'dvd', '2015-04-27', '23:22:55'),
(7, '13', 'ketan', 'gd', '2015-04-27', '23:23:05'),
(8, '13', 'ketan', 'gr', '2015-04-27', '23:23:48'),
(9, '13', 'ketan', 'dd', '2015-04-27', '23:35:53'),
(10, '13', 'ketan', 'rgr', '2015-04-27', '23:37:53'),
(11, '38', 'rishuindce', 'dfas', '2015-05-03', '12:26:54'),
(12, '38', 'rishuindce', 'cscscs', '2015-05-03', '12:27:01'),
(13, '17', 'rishuindce', 'cscsc', '2015-05-03', '12:27:08'),
(14, '16', 'cpsingh', 'dv', '2015-05-04', '00:10:44'),
(15, '50', 'sagnik', 'scs', '2015-05-18', '03:27:51'),
(16, '51', 'sagnik', 'wsdwd', '2015-05-18', '03:36:08'),
(17, '51', 'sagnik', 'dwdw', '2015-05-18', '03:36:16'),
(18, '51', 'sagnik', 'wsw', '2015-05-18', '03:36:28');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
