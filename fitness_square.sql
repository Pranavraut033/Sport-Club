-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Mar 27, 2019 at 06:06 PM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fitness_square`
--
CREATE DATABASE IF NOT EXISTS `fitness_square` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `fitness_square`;

-- --------------------------------------------------------

--
-- Table structure for table `membership`
--

DROP TABLE IF EXISTS `membership`;
CREATE TABLE IF NOT EXISTS `membership` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(80) NOT NULL,
  `membership_type` varchar(80) DEFAULT NULL,
  `batch` varchar(80) DEFAULT NULL,
  `sport_name` varchar(80) DEFAULT NULL,
  `duration` varchar(80) DEFAULT NULL,
  `gym_type` varchar(80) DEFAULT NULL,
  `start_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `membership`
--

INSERT INTO `membership` (`id`, `username`, `membership_type`, `batch`, `sport_name`, `duration`, `gym_type`, `start_date`) VALUES
(1, 'pranav', 'sport', 'morning', 'badminton', 'monthly', NULL, '2019-03-27'),
(2, 'pranav', 'all', 'anytime', NULL, 'annual', 'gold', '2019-03-27');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

DROP TABLE IF EXISTS `registration`;
CREATE TABLE IF NOT EXISTS `registration` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone_number` bigint(10) NOT NULL,
  `gender` char(10) NOT NULL,
  `dob` date NOT NULL,
  `address` varchar(200) NOT NULL,
  `pincode` int(6) NOT NULL,
  `city` varchar(100) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`username`, `password`, `first_name`, `last_name`, `email`, `phone_number`, `gender`, `dob`, `address`, `pincode`, `city`) VALUES
('pranav', 'gn15OuQHFADIVNOT', 'Pranav', 'Raut', 'pranavraut033@gmail.com', 8149920780, 'male', '2019-03-15', '1306, A-Wing, New Vinayak Tower, New Versova Link Road, Andheri (W)', 400053, 'Mumbai');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
