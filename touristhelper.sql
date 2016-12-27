-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 26, 2016 at 06:18 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `touristhelper`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `p_id` int(11) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `p_id`, `password`, `email`) VALUES
(1, 1, 'Geeks7173300!', 'hashimshafiq0@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `c_id` int(11) NOT NULL AUTO_INCREMENT,
  `place_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` varchar(50) NOT NULL,
  PRIMARY KEY (`c_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`c_id`, `place_id`, `user_id`, `comment`) VALUES
(1, 2, 2, 'good'),
(2, 2, 2, 'Awesome'),
(3, 3, 2, 'Awesome'),
(4, 3, 2, 'boring place');

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

CREATE TABLE IF NOT EXISTS `person` (
  `p_id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `address` varchar(45) NOT NULL,
  PRIMARY KEY (`p_id`),
  UNIQUE KEY `p_id` (`p_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `person`
--

INSERT INTO `person` (`p_id`, `fname`, `lname`, `contact`, `address`) VALUES
(1, 'hashim', 'shafiq', '03207879828', 'Islamabad Pakistan'),
(2, 'abc', 'abc', '0321456', 'Lahore Pakistan'),
(3, 'shami', 'shami', '0900078601', 'Ilsmabad');

-- --------------------------------------------------------

--
-- Table structure for table `place`
--

CREATE TABLE IF NOT EXISTS `place` (
  `place_id` int(11) NOT NULL AUTO_INCREMENT,
  `place_name` varchar(30) NOT NULL,
  `location` varchar(30) NOT NULL,
  `picture` varchar(30) NOT NULL,
  `keyword1` varchar(30) NOT NULL,
  `keyword2` varchar(30) NOT NULL,
  `keyword3` varchar(30) NOT NULL,
  PRIMARY KEY (`place_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `place`
--

INSERT INTO `place` (`place_id`, `place_name`, `location`, `picture`, `keyword1`, `keyword2`, `keyword3`) VALUES
(2, 'Makkah', 'Saudia Arabia', '1482664335mkk.jpg', 'Holy place', 'awsome', 'love'),
(3, 'Eifel Tower', 'Paris France', '1482664380ef.jpg', 'eiffel', 'love', 'good'),
(4, 'saif ul malook', 'Naran Pakistan', '1482664670kv.jpg', 'jheel', 'awsome', 'level'),
(5, 'Taj Mahal', 'Aagra India', '1482675430tm.jpg', 'Tajmahal', 'awsome', 'beautiful');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE IF NOT EXISTS `ratings` (
  `r_id` int(11) NOT NULL AUTO_INCREMENT,
  `place_id` int(11) NOT NULL,
  `r_value` int(11) NOT NULL,
  PRIMARY KEY (`r_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL DEFAULT '0',
  `p_id` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `p_id`, `email`, `password`) VALUES
(1, 2, 'user1@live.com', 'User123!'),
(2, 3, 'hashimshafiq@gmail.com', 'User123!');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
