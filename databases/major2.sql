-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2015 at 01:17 AM
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
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `post_id` int(20) NOT NULL AUTO_INCREMENT,
  `comment_id` varchar(20) NOT NULL,
  `t_user_name` varchar(50) NOT NULL,
  `comment_text` varchar(1000) NOT NULL,
  `time` varchar(25) NOT NULL,
  `date` varchar(25) NOT NULL,
  PRIMARY KEY (`post_id`),
  UNIQUE KEY `post_id` (`post_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `comment_id`, `t_user_name`, `comment_text`, `time`, `date`) VALUES
(4, 'dd', '', 'byee', '', '2015-03-22'),
(5, 'dd', '', 'ketan', '', '2015-03-22'),
(6, 'dd', '', 'vj', '', '2015-03-22'),
(7, 'dd', '', 'kk', '', '2015-03-22'),
(8, 'dd', '', 'vj', '12:45:25', '2015-03-22'),
(9, 'dd', '', 'dd', '21:24:27', '2015-03-22'),
(10, 'dd', '', 'ddd', '21:25:12', '2015-03-22'),
(11, 'dd', '', 'qq', '21:27:59', '2015-03-22'),
(12, 'dd', '', 'hello', '21:28:11', '2015-03-22');

-- --------------------------------------------------------

--
-- Table structure for table `research`
--

CREATE TABLE IF NOT EXISTS `research` (
  `r_id` int(20) NOT NULL,
  `r_text` text NOT NULL,
  `t_user_name` text NOT NULL,
  `link` varchar(1000) NOT NULL,
  UNIQUE KEY `r_id` (`r_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `research`
--

INSERT INTO `research` (`r_id`, `r_text`, `t_user_name`, `link`) VALUES
(1, 'wfqw', 'wqrqw', 'wrqw'),
(2, 'dhKLH', 'rsrivastava', 'saa');

-- --------------------------------------------------------

--
-- Table structure for table `user_fac`
--

CREATE TABLE IF NOT EXISTS `user_fac` (
  `u_id` int(10) NOT NULL,
  `t_user_name` varchar(25) NOT NULL,
  `password` varchar(30) NOT NULL,
  `role` text NOT NULL,
  `name` varchar(50) NOT NULL,
  `sex` char(1) NOT NULL,
  `pic` varchar(250) NOT NULL,
  `designation` varchar(80) NOT NULL,
  `qualification` text NOT NULL,
  `dob` varchar(12) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`t_user_name`),
  UNIQUE KEY `u_id` (`u_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_fac`
--

INSERT INTO `user_fac` (`u_id`, `t_user_name`, `password`, `role`, `name`, `sex`, `pic`, `designation`, `qualification`, `dob`, `email`) VALUES
(1, 'rsrivastava', 'mathematics', 'faculty', 'Dr. R. Srivastava', 'm', 'http://people.dce.edu/faculty/userimages/rsrivastava.jpg', 'Assistant Professor', 'Phd.', '01-01-1980', 'r.srivastva@gmail.com');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
