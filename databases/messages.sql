-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2015 at 08:58 PM
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
  `read_` int(1) NOT NULL,
  PRIMARY KEY (`message_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=114 ;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`message_id`, `sent_by`, `received_by`, `message`, `time`, `date`, `read_`) VALUES
(1, 'sagnik', 'ketan2408', 'hello', '00:59:40', '2015-05-05', 1),
(2, 'ketan2408', 'sagnik', 'hi', '01:00:19', '2015-05-05', 1),
(3, '0', 'gsrg', '0', '01:00:34', '2015-05-05', 0),
(4, '0', 'sdfsw', '0', '01:03:29', '2015-05-05', 0),
(5, '0', 'hello', '0', '01:18:30', '2015-05-05', 0),
(6, 'ketan2408', 'sagnik', 'hi again', '21:11:50', '2015-05-17', 1),
(7, 'ketan2408', '', 'rsfcgfcgfc', '21:13:26', '2015-05-17', 0),
(8, 'ketan2408', '', 'rrrrdrd', '21:14:51', '2015-05-17', 0),
(9, 'ketan2408', 'sagnik', 'hgvghvghvghvghv', '21:18:13', '2015-05-17', 1),
(10, 'ketan2408', 'wdwdq', 'dge', '21:21:36', '2015-05-17', 0),
(11, 'ketan2408', 'wdwdq', 'dgge', '21:21:46', '2015-05-17', 0),
(12, 'ketan2408', 'wdwdq', 'dfdfedf', '21:22:25', '2015-05-17', 0),
(13, 'ketan2408', 'wdwdq', 'fvrfv', '21:24:10', '2015-05-17', 0),
(14, 'ketan2408', 'wdwdq', 'hello', '21:25:07', '2015-05-17', 0),
(15, 'ketan2408', 'wdwdq', 'hello', '21:25:58', '2015-05-17', 0),
(16, 'ketan2408', 'wdwdq', 'jdfjdjnd', '21:27:50', '2015-05-17', 0),
(17, 'ketan2408', 'wdwdq', 'jvjdnfjdfjn', '21:28:14', '2015-05-17', 0),
(18, 'ketan2408', 'wdwdq', 'jdnjdnfjndf', '21:28:39', '2015-05-17', 0),
(19, 'sagnik', 'ketan2408', 'Aur bata, kya haal hai?', '21:34:53', '2015-05-17', 1),
(20, 'ketan2408', 'sagnik', 'bas, badiya, tu suna', '21:35:08', '2015-05-17', 1),
(21, 'ketan2408', 'sagnik', 'sdwdw', '22:07:27', '2015-05-17', 1),
(22, 'ketan2408', 'sagnik', 'dwsd', '22:07:50', '2015-05-17', 1),
(23, 'ketan2408', 'sagnik', 'scwsdcw', '22:10:57', '2015-05-17', 1),
(24, 'ketan2408', 'sagnik', 'jnj', '22:19:31', '2015-05-17', 1),
(25, 'ketan2408', 'sagnik', 'kmkmn', '22:19:39', '2015-05-17', 1),
(26, 'ketan2408', 'sagnik', 'kjih', '22:20:01', '2015-05-17', 1),
(27, 'ketan2408', 'sagnik', 'scjkbskjs', '22:54:48', '2015-05-17', 1),
(28, 'ketan2408', 'sagnik', 'ssfs', '22:56:38', '2015-05-17', 1),
(29, 'ketan2408', 'sagnik', 'dvdf', '22:57:44', '2015-05-17', 1),
(30, 'ketan2408', 'sagnik', 'dvde', '22:58:38', '2015-05-17', 1),
(31, 'ketan2408', 'sagnik', 'wfwfwf', '23:03:11', '2015-05-17', 1),
(32, 'ketan2408', 'sagnik', 'jhgujghu', '23:03:23', '2015-05-17', 1),
(33, 'ketan2408', 'sagnik', 'jkhijh', '23:03:27', '2015-05-17', 1),
(34, 'ketan2408', 'sagnik', 'jcndjncdn', '00:17:01', '2015-05-18', 1),
(35, 'ketan2408', 'sagnik', 'jdnjdjdncjd', '00:18:09', '2015-05-18', 1),
(36, 'ketan2408', 'sagnik', 'hdbhbfdh', '00:19:33', '2015-05-18', 1),
(37, 'ketan2408', 'sagnik', 'jvcdjndnvd', '00:23:43', '2015-05-18', 1),
(38, 'ketan2408', 'sagnik', 'jjcdjdncjdnjc', '00:23:51', '2015-05-18', 1),
(39, 'ketan2408', 'sagnik', 'jvnjdndnd', '00:23:57', '2015-05-18', 1),
(40, 'ketan2408', 'sagnik', 'vbjnfjnfn', '00:24:38', '2015-05-18', 1),
(41, 'ketan2408', 'sagnik', 'kmvkkfmvkfm', '00:24:45', '2015-05-18', 1),
(42, 'ketan2408', 'sagnik', 'kdjvdklvj', '00:34:05', '2015-05-18', 1),
(43, 'ketan2408', 'sagnik', 'sjsnj', '00:39:26', '2015-05-18', 1),
(44, 'ketan2408', 'sagnik', 'ss', '00:41:55', '2015-05-18', 1),
(45, 'ketan2408', 'sagnik', 'dwdw', '00:42:00', '2015-05-18', 1),
(46, 'ketan2408', 'sagnik', 'fww', '00:42:10', '2015-05-18', 1),
(47, 'ketan2408', 'sagnik', 'scs', '00:42:59', '2015-05-18', 1),
(48, 'ketan2408', 'sagnik', 'sdsd', '00:43:11', '2015-05-18', 1),
(49, 'ketan2408', 'sagnik', 'axaxd', '00:43:51', '2015-05-18', 1),
(50, 'ketan2408', 'sagnik', 'scsc', '00:44:37', '2015-05-18', 1),
(51, 'ketan2408', 'sagnik', 'sfcs', '00:45:17', '2015-05-18', 1),
(52, 'ketan2408', 'sagnik', 'kasadty', '00:45:27', '2015-05-18', 1),
(53, 'ketan2408', 'sagnik', 'fsf', '00:45:35', '2015-05-18', 1),
(54, 'ketan2408', 'sagnik', 'da', '00:46:17', '2015-05-18', 1),
(55, 'ketan2408', 'sagnik', 'dwdwdw', '00:46:21', '2015-05-18', 1),
(56, 'ketan2408', 'sagnik', 'sdws', '00:47:07', '2015-05-18', 1),
(57, 'ketan2408', 'sagnik', 'ada', '00:47:14', '2015-05-18', 1),
(58, 'ketan2408', 'sagnik', '/', '00:47:16', '2015-05-18', 1),
(59, 'ketan2408', 'sagnik', 'fsf', '00:48:42', '2015-05-18', 1),
(60, 'ketan2408', 'sagnik', 'csa', '00:48:53', '2015-05-18', 1),
(61, 'ketan2408', 'sagnik', 'ss', '00:49:03', '2015-05-18', 1),
(62, 'ketan2408', 'sagnik', 'sdsssds', '00:51:02', '2015-05-18', 1),
(63, 'ketan2408', 'sagnik', 'nvkdnv', '00:51:04', '2015-05-18', 1),
(64, 'ketan2408', 'sagnik', 'sdksnk', '00:51:11', '2015-05-18', 1),
(65, 'ketan2408', 'sagnik', 'sds', '00:51:15', '2015-05-18', 1),
(66, 'ketan2408', 'sagnik', 'sdcsxscs', '00:51:22', '2015-05-18', 1),
(67, 'ketan2408', 'sagnik', 'cscs', '00:52:32', '2015-05-18', 1),
(68, 'ketan2408', 'sagnik', 'kcnskns', '00:52:41', '2015-05-18', 1),
(69, 'ketan2408', 'sagnik', 'csnckscn', '00:52:45', '2015-05-18', 1),
(70, 'ketan2408', 'sagnik', 'scscs', '00:52:50', '2015-05-18', 1),
(71, 'ketan2408', 'sagnik', '.', '00:52:57', '2015-05-18', 1),
(72, 'ketan2408', 'sagnik', '/', '00:53:01', '2015-05-18', 1),
(73, 'ketan2408', 'sagnik', ':)', '00:53:05', '2015-05-18', 1),
(74, 'ketan2408', 'sagnik', 'axax', '00:54:21', '2015-05-18', 1),
(75, 'ketan2408', 'sagnik', 'dkwdnk', '00:55:37', '2015-05-18', 1),
(76, 'ketan2408', 'sagnik', 'ckvnl', '00:55:41', '2015-05-18', 1),
(77, 'ketan2408', 'sagnik', 'c/', '00:59:02', '2015-05-18', 1),
(78, 'ketan2408', 'sagnik', 'fjvnfjvnjf,./', '01:04:07', '2015-05-18', 1),
(79, 'ketan2408', 'sagnik', '/', '01:04:14', '2015-05-18', 1),
(80, 'ketan2408', 'sagnik', '"', '01:04:24', '2015-05-18', 1),
(81, 'ketan2408', 'sagnik', ';', '01:04:30', '2015-05-18', 1),
(82, 'ketan2408', 'sagnik', 'fghfh;', '01:04:38', '2015-05-18', 1),
(83, 'ketan2408', 'sagnik', '|', '01:04:43', '2015-05-18', 1),
(84, 'ketan2408', 'sagnik', 'kmkmm', '01:06:08', '2015-05-18', 1),
(85, 'ketan2408', 'sagnik', 'klkm''', '01:06:12', '2015-05-18', 1),
(86, 'ketan2408', 'sagnik', '''', '01:06:16', '2015-05-18', 1),
(87, 'sagnik', 'ketan2408', 'mhkhgk', '01:22:58', '2015-05-18', 1),
(88, 'ut183', 'ketan', 'sdskdn', '02:38:04', '2015-05-18', 1),
(89, 'ut183', 'ketann', 'Hiii', '02:47:06', '2015-05-18', 0),
(90, 'ut183', 'ketank90', 'Hello', '02:47:17', '2015-05-18', 0),
(91, 'ut183', 'ketank90', 'dg', '02:50:17', '2015-05-18', 0),
(92, 'sagnik', 'saransh24', 'hii', '03:26:32', '2015-05-18', 1),
(93, 'sagnik', 'kqndaqkjn', 'wdw', '19:13:53', '2015-05-18', 1),
(94, 'sagnik', 'ketan2408', 'wdfwd', '19:14:03', '2015-05-18', 1),
(95, 'sagnik', 'ketan2408', '''', '19:14:13', '2015-05-18', 1),
(96, 'sagnik', 'ketan2408', 'jwdbwuh', '19:29:34', '2015-05-18', 1),
(97, 'sagnik', 'ketan2408', 'dfef', '19:32:00', '2015-05-18', 1),
(98, 'ketan2408', 'sagnik', 'scfsf', '19:32:22', '2015-05-18', 1),
(99, 'sagnik', 'ketan2408', 'sf', '19:32:43', '2015-05-18', 1),
(100, 'ketan2408', 'sagnik', 'dfdef', '19:33:37', '2015-05-18', 1),
(101, 'sagnik', 'ketan2408', 'sfs', '19:35:43', '2015-05-18', 1),
(102, 'ketan2408', 'sagnik', 'Hello ther....how''re you', '20:08:53', '2015-05-18', 1),
(103, 'sagnik', 'ketan2408', 'Dinner kaha kroge?', '20:10:19', '2015-05-18', 1),
(104, 'ketan2408', 'sagnik', '''sup?', '20:20:14', '2015-05-18', 1),
(105, 'sagnik', 'ketan2408', 'sfs', '20:20:50', '2015-05-18', 1),
(106, 'ketan2408', 'sagnik', 'Yo!!', '20:25:55', '2015-05-18', 1),
(107, 'ketan2408', 'sagnik', 'Hey', '22:43:44', '2015-05-18', 1),
(108, 'ketan2408', 'sagnik', 'What''sup??', '22:43:48', '2015-05-18', 1),
(109, 'ketan2408', 'sagnik', 'Hello again', '22:46:36', '2015-05-18', 1),
(110, 'ketan2408', 'sagnik', '''sup?', '22:46:39', '2015-05-18', 1),
(111, 'ketan2408', 'sagnik', 'hhhbhbchdcd', '23:01:32', '2015-05-18', 1),
(112, 'ketan2408', 'sagnik', 'hcdhcdhcdchd', '23:01:34', '2015-05-18', 1),
(113, 'ketan2408', 'sagnik', 'jfjfdkjnfkdjnvkf', '23:16:45', '2015-05-18', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
