-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2015 at 03:49 PM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=52 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `posted_by`, `class`, `post_title`, `post_text`, `time`, `date`) VALUES
(13, 'rsrivastava', '2', 'No class this week', 'wq', '12:00:56', '2015-03-28'),
(16, 'cpsingh', '1', 'New Timings', 'hhr', '21:58:56', '2015-03-28'),
(17, 'cpsingh', '4', 'No class', 'cppccp', '21:59:05', '2015-03-28'),
(20, 'ketan', '2', 'acd', 'accfew', '04:51:59', '2015-04-15'),
(21, 'ketan', '2', 'sasc', 'sdvswvw', '04:52:50', '2015-04-15'),
(22, 'ketan', '2', 'sasc', 'sdvswvw', '04:53:17', '2015-04-15'),
(26, 'ketan', '2', 'fasc', 'No class this week', '08:55:37', '2015-04-15'),
(30, 'ketan', '2', 'Hello', 'Bye!!', '00:37:11', '2015-04-28'),
(31, 'ketan', '2', 'hdh', 'rhreh', '01:11:07', '2015-04-28'),
(32, 'ketan', '2', 'thty', 'ydr', '01:12:09', '2015-04-28'),
(33, 'ketan', '2', 'qq', 'd', '01:21:45', '2015-04-28'),
(34, 'ketan', '2', 'xaz', 'xaxaxa', '01:22:17', '2015-04-28'),
(35, 'ketan', '2', 'ds', 'sxs', '01:25:29', '2015-04-28'),
(36, 'ketan', '2', 'cs', 'dwdw', '01:25:42', '2015-04-28'),
(37, 'ketan', '2', 'dq', 'csd', '01:27:09', '2015-04-28'),
(38, 'rishuindce', '4', 'hey', 'gooo', '12:24:06', '2015-05-03'),
(39, 'ketan2408', '4', 'dgd', 'safasfsaf', '15:23:22', '2015-05-03'),
(40, 'cpsingh', '4', 'asdwad', 'qdqdq', '22:12:23', '2015-05-04'),
(41, 'cpsingh', '1234', 'sdsds', 'sdsdwsdw', '22:17:24', '2015-05-04'),
(42, 'cpsingh', '2', 'dcswcww', 'dcscs', '10:44:47', '2015-05-05'),
(43, 'ketan2408', '4', 'kjhgkjhk', 'kjguhgk', '22:26:16', '2015-05-05'),
(44, 'cpsingh', '3', 'kgkjg', 'ugugyu', '22:27:54', '2015-05-05'),
(45, 'sfwdaw', '', 'fcwdfw', 'swdw', '02:59:48', '2015-05-06'),
(46, 'dqdq', '', 'ketan', 'kumar', '03:29:33', '2015-05-06'),
(47, 'dqdq', '', 'wdw', 'sw', '03:30:21', '2015-05-06'),
(48, 'ketan2408', '4', 'End Semester Exams Schedule', 'The end semester exams will be held from the 12th of May, 2015. The exams will be on 12th, 14th and 16th respectively. The practicals will then be held from 25th onwards.', '04:26:55', '2015-05-06'),
(49, 'ketan2408', '4', 'Major Dates', '21st May\r\n23 May\r\n30th May', '12:15:44', '2015-05-06'),
(50, 'ketan2408', '4', 'Practical dates', '25th Maty-29th May', '12:17:08', '2015-05-06'),
(51, 'ketan2408', '4', 'Admit Cards date', '8th May', '12:18:36', '2015-05-06');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
