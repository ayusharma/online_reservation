-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 28, 2014 at 01:09 PM
-- Server version: 5.5.37-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `or`
--

-- --------------------------------------------------------

--
-- Table structure for table `bus`
--

CREATE TABLE IF NOT EXISTS `bus` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `bus_no` varchar(30) NOT NULL,
  `bus_name` varchar(255) NOT NULL,
  `1` varchar(255) NOT NULL,
  `2` varchar(255) NOT NULL,
  `3` varchar(255) NOT NULL,
  `4` varchar(255) NOT NULL,
  `source` varchar(255) NOT NULL,
  `destination` varchar(255) NOT NULL,
  `day` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `AC` varchar(255) NOT NULL,
  `REGULAR` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `bus`
--

INSERT INTO `bus` (`id`, `bus_no`, `bus_name`, `1`, `2`, `3`, `4`, `source`, `destination`, `day`, `class`, `AC`, `REGULAR`) VALUES
(1, 'RJ1479', 'Apex Travels', '09:00 (Day-1)', '12:30 (Day-1)', '', '', '1', '2', '0123456', 'ACREGULAR', '300', '220'),
(2, 'RJ0036', 'Kalpana Travels', '23:00 (Day-1)', '02:45 (Day-2)', '', '', '1', '2', '0123456', 'ACREGULAR', '300', '240'),
(3, 'RJ4783', 'Divyanshi Travels', '05:10 (Day-1)', '08:30 (Day-1)', '', '', '1', '2', '0123456', 'ACREGULAR', 'NOT AVAILABLE', '220'),
(4, 'RJ3948', 'Raj Travels', '7:00 (Day-1)', '10:45 (Day-1)', '', '', '1', '2', '0123456', 'ACREGULAR', '310', '250'),
(5, 'RJ0420', 'Ganesh Travels', '12:30 (Day-1)', '', '19:00 (Day-1)', '', '1', '3', '0123456', 'ACREGULAR', '350', '220'),
(6, 'RJ3695', 'Kalpana Travels', '00:30 (Day-1)', '', '07:00 (Day-1)', '', '1', '3', '0123456', 'ACREGULAR', '380', '250'),
(7, 'RJ4752', 'Hans Travels Indore', '23:00 (Day-1)', '', '05:30 (Day-2)', '', '1', '3', '0123456', 'ACREGULAR', '270', '380'),
(8, 'RJ5936', 'Mahalaxmi Travels', '06:00 (Day-1)', '', '12:30 (Day-1)', '', '1', '3', '0123456', 'ACREGULAR', '360', '210'),
(9, 'RJ0085', 'Rishab Travels', '12:00 (Day-1)', '', '', '18:30 (Day-1)', '1', '4', '0123456', 'ACREGULAR', '600', '450'),
(10, 'RJ4963', 'Vikas Travels', '21:30 (Day-1)', '', '', '05:00 (Day-2)', '1', '4', '0123456', 'ACREGULAR', '350', '220');

-- --------------------------------------------------------

--
-- Table structure for table `down`
--

CREATE TABLE IF NOT EXISTS `down` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `train_no` int(6) NOT NULL,
  `train_name` varchar(255) NOT NULL,
  `1` varchar(255) NOT NULL,
  `2` varchar(255) NOT NULL,
  `3` varchar(255) NOT NULL,
  `4` varchar(255) NOT NULL,
  `5` varchar(255) NOT NULL,
  `6` varchar(255) NOT NULL,
  `tags` varchar(255) NOT NULL,
  `day` varchar(255) NOT NULL,
  `SL` int(5) NOT NULL,
  `AC-1` int(5) NOT NULL,
  `AC-2` int(5) NOT NULL,
  `AC-3` int(5) NOT NULL,
  `class` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `down`
--

INSERT INTO `down` (`id`, `train_no`, `train_name`, `1`, `2`, `3`, `4`, `5`, `6`, `tags`, `day`, `SL`, `AC-1`, `AC-2`, `AC-3`, `class`) VALUES
(1, 12951, 'Mumbai Rajdhani', '16:40 (Day-1)', '21:07 (Day-1)', '00:37 (Day-2)', '03:10 (Day-2)', 'No Stop', '8:30 (Day-2)', '12346', '0123456', 800, 3290, 2490, 1500, 'AC-1AC-2AC-3'),
(2, 12903, 'Golden Temple MI', '21:30 (Day-1)', '2:57 (Day-2)', '7:00 (Day-2)', '10:55 (Day-2)', '16:20 (Day-2)', '18:35 (Day-2)', '123456', '0123456', 482, 3236, 1888, 1297, 'SLAC-1AC-2AC-3'),
(3, 12925, 'Paschim Express', '11:35 (Day-1)', '17:40 (Day-1)', '22:00 (Day-1)', '02:25 (Day-2)', '07:50 (Day-2)', '11:05 (Day-2)', '123456', '0123456', 493, 1277, 1866, 3199, 'SLAC-1AC-2AC-3'),
(4, 19019, 'Dehradun Express', '00:05 (Day-1)', '06:45 (Day-1)', '12:50 (Day-1)', '19:30 (Day-1)', '02:30 (Day-2)', '05:50 (Day-2)', '123456', '0123456', 471, 1263, 1846, 2530, 'SLAC-1AC-2AC-3'),
(5, 19023, 'Fzr Janata Express', '07:25 (Day-1)', '16:05 (Day-1)', '20:55 (Day-1)', '01:35 (Day-2)', '09:43 (Day-2)', '13:15 (Day-2)', '123456', '0123456', 493, 0, 0, 0, 'SL'),
(6, 12953, 'Aug Kr Raj Exp', '17:40 (Day-1)', '22:45 (Day-1)', '02:20 (Day-2)', '05:20 (Day-2)', '09:02 (Day-2)', '10:55 (Day-2)', '123456', '0123456', 0, 1483, 2152, 3694, 'AC-1AC-2AC-3'),
(7, 12471, 'Swaraj Express', '07:55 (Day-1)', '13:45 (Day-1)', '18:05 (Day-1)', '21:40 (Day-1)', '02:05 (Day-2)', '04:50 (Day-2)', '123456', '0156', 493, 0, 1866, 1277, 'SLAC-2AC-3'),
(8, 12431, 'Rajdhani Express', '19:15 (Day-1)', '00:26 (Day-2)', 'NO STOP', '06:50 (Day-2)', 'NO STOP', '12:40 (Day-2)', '1246', '356', 0, 3694, 2152, 1483, 'AC-1AC-2AC-3');

-- --------------------------------------------------------

--
-- Table structure for table `plane`
--

CREATE TABLE IF NOT EXISTS `plane` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `plane_no` varchar(255) NOT NULL,
  `plane_name` varchar(255) NOT NULL,
  `1` varchar(255) NOT NULL,
  `2` varchar(255) NOT NULL,
  `3` varchar(255) NOT NULL,
  `4` varchar(255) NOT NULL,
  `5` varchar(255) NOT NULL,
  `source` varchar(255) NOT NULL,
  `destination` varchar(255) NOT NULL,
  `day` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `BUSINESS` varchar(255) NOT NULL,
  `ECONOMY` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE IF NOT EXISTS `signup` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `sex` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `sec_que` varchar(255) NOT NULL,
  `answer` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`id`, `name`, `username`, `password`, `email`, `sex`, `city`, `sec_que`, `answer`) VALUES
(1, 'ayush', 'ayush', 'password', 'ayush.sharna469@gmail.com', 'male', 'jaipur', 'Who is your favourite teacher ?', 'ggg');

-- --------------------------------------------------------

--
-- Table structure for table `up`
--

CREATE TABLE IF NOT EXISTS `up` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `train_no` varchar(255) NOT NULL,
  `train_name` varchar(255) NOT NULL,
  `1` varchar(255) NOT NULL,
  `2` varchar(255) NOT NULL,
  `3` varchar(255) NOT NULL,
  `4` varchar(255) NOT NULL,
  `5` varchar(255) NOT NULL,
  `6` varchar(255) NOT NULL,
  `tags` varchar(255) NOT NULL,
  `day` varchar(255) NOT NULL,
  `SL` int(5) NOT NULL,
  `AC-1` int(5) NOT NULL,
  `AC-2` int(5) NOT NULL,
  `AC-3` int(5) NOT NULL,
  `class` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `up`
--

INSERT INTO `up` (`id`, `train_no`, `train_name`, `1`, `2`, `3`, `4`, `5`, `6`, `tags`, `day`, `SL`, `AC-1`, `AC-2`, `AC-3`, `class`) VALUES
(1, '12904', 'Goldn Temple MI', '07:40 (Day-1)', '10:00 (Day-1)', '14:25 (Day-1)', '19:10 (Day-1)', '23:15 (Day-1)', '05:20 (Day-2)', '123456', '0123456', 510, 3300, 1930, 1335, 'SLAC-1AC-2AC-3'),
(2, '22926', 'Paschim Express', '16:50 (Day-1)', '19:15 (Day-1)', '23:45 (Day-1)', '04:20 (Day-2)', '08:25 (Day-2)', '14:45 (Day-2)', '123456', '0123456', 520, 3335, 1950, 1350, 'SLAC-1AC-2AC-3'),
(3, '12954', 'Aug Kr Raj Express', '16:55 (Day-1)', '18:40 (Day-1)', '21:50 (Day-1)', '00:53 (Day-2)', '04:30 (Day-2)', '10:00 (Day-2)', '123456', '0123456', 0, 4035, 2435, 1780, 'AC-1AC-2AC-3'),
(4, '12952', 'Mumbai Rajdhani', '16:30 (Day-1)', 'NO STOP', '21:05 (Day-1)', '00:05 (Day-2)', '03:41 (Day-2)', '08:35 (Day-2)', '13456', '0123456', 0, 4135, 2495, 1815, 'AC-1AC-2AC-3'),
(5, '19024', 'Fzr Bct Janta Express', '13:35 (Day-1)', '17:05 (Day-1)', '23:20 (Day-1)', '06:00 (Day-2)', '10:50 (Day-2)', '20:10 (Day-2)', '123456', '0123456', 490, 0, 0, 0, 'SL'),
(6, '12472', 'Swaraj Express', '21:50 (Day-1)', '00:10 (Day-2)', '03:55 (Day-2)', '08:20 (Day-2)', '12:15 (Day-2)', '18:05 (Day-2)', '123456', '2356', 520, 0, 1950, 1350, 'SLAC-2AC-3'),
(7, '19020', 'Dehradun Express', '22:20 (Day-1)', '01:45 (Day-2)', '07:50 (Day-2)', '14:35 (Day-2)', '20:05 (Day-2)', '04:20 (Day-3)', '123456', '0123456', 510, 0, 1930, 1335, 'SLAC-2AC-3'),
(8, '12138', 'Punjab Mail', '05:15 (Day-1)', '07:40 (Day-1)', 'NO STOP', 'NO STOP', 'NO STOP', '07:35 (Day-2)', '126', '0123456', 521, 3501, 2038, 1389, 'SLAC-1AC-2AC-3');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
