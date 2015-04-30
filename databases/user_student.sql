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
  `group` text NOT NULL,
  `dob` text NOT NULL,
  `email` text NOT NULL,
  PRIMARY KEY (`u_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `user_student`
--

INSERT INTO `user_student` (`u_id`, `s_user_name`, `password`, `name`, `sex`, `pic`, `class`, `group`, `dob`, `email`) VALUES
(1, 'ketan', 'kumar', 'Ketan Kumar Keshri', 'm', 'C:\\Users\\kunal\\Desktop/passport.jpg', 'Second', 'R2', '24-08-1994', 'ketank90@gmail.com'),
(2, 'sagnik', 'sinha', 'Sagnik Sinha Roy', 'm', '', 'Fourth', 'R3', '08-06-1994', 'sagnik.sinharoy@gmail.com'),
(3, 'shrutiarora', 'hello', 'Shruti Arora', 'f', '', 'Fourth', 'R3', '29-06-1993', 'shrutiarora93@yahoo.com'),
(4, 'utkarsh', 'yoyo', 'Utkarsh Joshi', 'm', '', 'Second', 'R3', '18-03-1993', 'ut183@gmail.com');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
