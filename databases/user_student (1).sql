-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2015 at 07:49 PM
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
-- Table structure for table `user_student`
--

CREATE TABLE IF NOT EXISTS `user_student` (
  `u_id` int(11) NOT NULL AUTO_INCREMENT,
  `s_user_name` text NOT NULL,
  `password` text NOT NULL,
  `name` text NOT NULL,
  `sex` char(2) NOT NULL,
  `pic` text NOT NULL,
  `class` text NOT NULL,
  `group_` text NOT NULL,
  `dob` text NOT NULL,
  `email` text NOT NULL,
  `gcm_id` varchar(500) NOT NULL,
  PRIMARY KEY (`u_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `user_student`
--

INSERT INTO `user_student` (`u_id`, `s_user_name`, `password`, `name`, `sex`, `pic`, `class`, `group_`, `dob`, `email`, `gcm_id`) VALUES
(1, 'ketan', 'kumar', 'Ketan Kumar Keshri', 'm', 'C:\\Users\\kunal\\Desktop/passport.jpg', '2', 'R2', '24-08-1994', 'ketank90@gmail.com', ''),
(2, 'sagnik', 'sinha', 'Sagnik Sinha Roy', 'm', '', '2', 'R3', '08-06-1994', 'sagnik.sinharoy@gmail.com', ''),
(3, 'qwe', '76d80224611fc919a5d54f0ff9fba446', 'qwe', 'm', 'https://scontent-hkg.xx.fbcdn.net/hphotos-xfa1/t31.0-8/471786_3869549470898_945499164_o.jpg', '4', 'R3', '01-01-1993', 'qwe@qwe.co', 'APA91bEdPU2jdg1xjhoqeE3u-EzIFFUh3bVDPIS2NZ-56D0YJDGEmIqxGVhJOCEzW6MSQg5bMH-t_TT-oFf0EWP0rLJ0czHKdgT90tIUwTRwxNYkhhRXe-NbdpMcEJW-L8rgKabwfVyX8D6UBqxYU1bqvX8cQaSaSdzub_h1LOOlmd5vipwWe3I'),
(12, 'sdwdw', '71112dcbe9a8ff9c204efb09d30a1f40', 'sadd', 'm', 'kk', '3', 'R1', '05/04/2015', 'sdsd@d.im', ''),
(13, 'wdwdq', 'c0a7ef21004500a5e20689ba377e7f9e', 'sdawd', 'm', 'kk', '4', 'R2', '05/11/2015', 'asdw@j.cm', ''),
(14, 'ketann', 'c0a7ef21004500a5e20689ba377e7f9e', 'ketan', 'm', 'kk', '2', 'R3', '05/26/2015', 'ketank@j.bn', ''),
(15, 'kqndaqkjn', '151bde48d7e8f2a52410059ce10ab80f', 'jnkj', 'm', 'kk', '4', 'R1', '05/04/2015', 'sdw@n.vv', ''),
(16, 'sfascsc', '151bde48d7e8f2a52410059ce10ab80f', 'fefe', 'f', 'kk', '4', 'R1', '05/10/2015', 'd@b.nn', ''),
(17, 'fssd', '151bde48d7e8f2a52410059ce10ab80f', 'fs', 'f', 'kk', '3', 'R1', '05/03/2015', 'fdd@b.mm', ''),
(18, 'ketan2408', '325a2cc052914ceeb8c19016c091d2ac', 'Ketan Kumar Keshri', 'm', 'kk', '4', 'R2', '08/24/2013', 'ketank90@gmail.com', ''),
(19, 'rishuindce', '325a2cc052914ceeb8c19016c091d2ac', 'Rishu', 'm', 'kk', '4', 'R2', '05/10/2015', 'rishuindce@gmail.com', ''),
(20, 'ketank90', '325a2cc052914ceeb8c19016c091d2ac', 'Ketan', 'm', 'kk', '2', 'R3', '05/19/2015', 'ketanops@gmail.com', ''),
(21, 'saransh24', '2de8b076fbfc0d39b802fe7749ae8b1d', 'saransh', 'm', 'kk', '4', 'R3', '12/20/1993', 'saranshg24@gmail.com', ''),
(22, 'kumar1', '325a2cc052914ceeb8c19016c091d2ac', 'ketan', 'm', 'kk', '4', 'R1', '09/22/2015', 'k@k.com', ''),
(23, 'qwea', 'f54d2de733d7173c229cd538d01e8e7e', 'qwe', '', '', '1', '', '', 'qwe@qwe.com', 'APA91bEdPU2jdg1xjhoqeE3u-EzIFFUh3bVDPIS2NZ-56D0YJDGEmIqxGVhJOCEzW6MSQg5bMH-t_TT-oFf0EWP0rLJ0czHKdgT90tIUwTRwxNYkhhRXe-NbdpMcEJW-L8rgKabwfVyX8D6UBqxYU1bqvX8cQaSaSdzub_h1LOOlmd5vipwWe3I'),
(24, 'qw', '006d2143154327a64d86a264aea225f3', 'qwe', '', '', '1', '', '', 'qw', 'APA91bEdPU2jdg1xjhoqeE3u-EzIFFUh3bVDPIS2NZ-56D0YJDGEmIqxGVhJOCEzW6MSQg5bMH-t_TT-oFf0EWP0rLJ0czHKdgT90tIUwTRwxNYkhhRXe-NbdpMcEJW-L8rgKabwfVyX8D6UBqxYU1bqvX8cQaSaSdzub_h1LOOlmd5vipwWe3I');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
