-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2015 at 02:53 PM
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
(1, 'rsrivastava', 'mathematics', 'Dr. R. Srivastava', 'm', 'http://people.dtu.ac.in/faculty/userimages/rsrivastava.jpg', 'Assistant Professor', 'Phd.', '01-01-1980', 'r.srivastva@gmail.com'),
(3, 'sangitakansal', 'mathematics', 'faculty', 'f', 'M', 'Assistant Professor', 'PhD', '02-02-1960', 'cpsingh@dce.edu');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
