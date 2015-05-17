-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2015 at 06:10 PM
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
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `message_id` int(50) NOT NULL AUTO_INCREMENT,
  `sent_by` text NOT NULL,
  `received_by` text NOT NULL,
  `message` text NOT NULL,
  `time` text NOT NULL,
  `date` text NOT NULL,
  PRIMARY KEY (`message_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`message_id`, `sent_by`, `received_by`, `message`, `time`, `date`) VALUES
(1, 'sagnik', 'ketan2408', 'hello', '00:59:40', '2015-05-05'),
(2, 'ketan2408', 'sagnik', 'hi', '01:00:19', '2015-05-05'),
(3, '0', 'gsrg', '0', '01:00:34', '2015-05-05'),
(4, '0', 'sdfsw', '0', '01:03:29', '2015-05-05'),
(5, '0', 'hello', '0', '01:18:30', '2015-05-05'),
(6, 'ketan2408', 'sagnik', 'hi again', '21:11:50', '2015-05-17'),
(7, 'ketan2408', '', 'rsfcgfcgfc', '21:13:26', '2015-05-17'),
(8, 'ketan2408', '', 'rrrrdrd', '21:14:51', '2015-05-17'),
(9, 'ketan2408', 'sagnik', 'hgvghvghvghvghv', '21:18:13', '2015-05-17'),
(10, 'ketan2408', 'wdwdq', 'dge', '21:21:36', '2015-05-17'),
(11, 'ketan2408', 'wdwdq', 'dgge', '21:21:46', '2015-05-17'),
(12, 'ketan2408', 'wdwdq', 'dfdfedf', '21:22:25', '2015-05-17'),
(13, 'ketan2408', 'wdwdq', 'fvrfv', '21:24:10', '2015-05-17'),
(14, 'ketan2408', 'wdwdq', 'hello', '21:25:07', '2015-05-17'),
(15, 'ketan2408', 'wdwdq', 'hello', '21:25:58', '2015-05-17'),
(16, 'ketan2408', 'wdwdq', 'jdfjdjnd', '21:27:50', '2015-05-17'),
(17, 'ketan2408', 'wdwdq', 'jvjdnfjdfjn', '21:28:14', '2015-05-17'),
(18, 'ketan2408', 'wdwdq', 'jdnjdnfjndf', '21:28:39', '2015-05-17'),
(19, 'sagnik', 'ketan2408', 'Aur bata, kya haal hai?', '21:34:53', '2015-05-17'),
(20, 'ketan2408', 'sagnik', 'bas, badiya, tu suna', '21:35:08', '2015-05-17');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
