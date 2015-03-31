-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2015 at 07:01 AM
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `message_id` int(50) NOT NULL AUTO_INCREMENT,
  `sent_by` int(11) NOT NULL,
  `recieved_by` int(11) NOT NULL,
  `message` int(11) NOT NULL,
  `time` text NOT NULL,
  `date` text NOT NULL,
  PRIMARY KEY (`message_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `post_id` int(20) NOT NULL AUTO_INCREMENT,
  `t_user_name` varchar(50) NOT NULL,
  `class` text NOT NULL,
  `post_title` text NOT NULL,
  `post_text` varchar(1000) NOT NULL,
  `time` varchar(25) NOT NULL,
  `date` varchar(25) NOT NULL,
  PRIMARY KEY (`post_id`),
  UNIQUE KEY `post_id` (`post_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `t_user_name`, `class`, `post_title`, `post_text`, `time`, `date`) VALUES
(13, 'rsrivastava', '2', '3', 'wq', '12:00:56', '2015-03-28'),
(14, 'rsrivastava', '2', '3', 'wq', '12:01:28', '2015-03-28'),
(15, 'rsrivastava', '3', '3', 'dw', '12:01:40', '2015-03-28'),
(16, 'cpsingh', '1', '3', 'hhr', '21:58:56', '2015-03-28'),
(17, 'cpsingh', '4', '3', 'cppccp', '21:59:05', '2015-03-28');

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

INSERT INTO `user_fac` (`u_id`, `t_user_name`, `password`, `name`, `sex`, `pic`, `designation`, `qualification`, `dob`, `email`) VALUES
(0, 'cpsingh', 'mathematics', 'Dr. C.P. Singh', 'm', '', 'Assistant Professor', 'PhD', '02-02-1960', 'cpsingh@dce.edu'),
(1, 'rsrivastava', 'mathematics', 'Dr. R. Srivastava', 'm', 'http://people.dce.edu/faculty/userimages/rsrivastava.jpg', 'Assistant Professor', 'Phd.', '01-01-1980', 'r.srivastva@gmail.com'),
(3, 'sangitakansal', 'mathematics', 'faculty', 'f', 'M', 'Assistant Professor', 'PhD', '02-02-1960', 'cpsingh@dce.edu');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
