-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 21, 2015 at 01:30 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `major2`
--

-- --------------------------------------------------------

--
-- Table structure for table `user_student`
--

CREATE TABLE IF NOT EXISTS `user_student` (
  `u_id` int(10) NOT NULL AUTO_INCREMENT,
  `password` varchar(300) NOT NULL,
  `name` varchar(50) NOT NULL,
  `sex` char(1) NOT NULL,
  `pic` varchar(250) NOT NULL,
  `dob` varchar(12) NOT NULL,
  `email` varchar(50) NOT NULL,
  `year` int(11) NOT NULL,
  `gcm_id` varchar(500) NOT NULL,
  PRIMARY KEY (`u_id`),
  UNIQUE KEY `u_id` (`u_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user_student`
--

INSERT INTO `user_student` (`u_id`, `password`, `name`, `sex`, `pic`, `dob`, `email`, `year`, `gcm_id`) VALUES
(1, '76d80224611fc919a5d54f0ff9fba446', 'qwe', '', '', '', 'qwe', 1, 'APA91bEdPU2jdg1xjhoqeE3u-EzIFFUh3bVDPIS2NZ-56D0YJDGEmIqxGVhJOCEzW6MSQg5bMH-t_TT-oFf0EWP0rLJ0czHKdgT90tIUwTRwxNYkhhRXe-NbdpMcEJW-L8rgKabwfVyX8D6UBqxYU1bqvX8cQaSaSdzub_h1LOOlmd5vipwWe3I');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
