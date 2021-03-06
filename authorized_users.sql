-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2020 at 12:31 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `authorized_users`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `ID` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Slogan` varchar(100) NOT NULL,
  `Price` varchar(100) NOT NULL,
  `Description` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`ID`, `Name`, `Slogan`, `Price`, `Description`) VALUES
(1, 'ProBook', 'Years ahead of the competetion', '800', 'The ProBook is the laptop for the modern consumer. Unlike other laptops, the ProBook can run for days at a time without requiring a recharge. This flexibility means the device is perfect for the busy worker. Whether you are working on school, your business, or for leisure, the ProBook will provide you with the power that you need.'),
(2, 'ProWatch', 'A modern tool for the modern consumer', '200', 'With the ProWatch, the power of portability is in your hands. Despite its small form factor, the ProWatch packs plenty of power. The ability to play music and make calls help alleviate the need to always be carrying a phone while fitness features like the heart rate tracker keep an eye on what\'s most important, your health.'),
(3, 'ProPhone', 'PHONE SLOGAN', '700', 'PHONE DESCRIPTION'),
(4, 'ProMonitor', 'MONITOR SLOGAN', '400', 'MONITOR DESCRIPTION');

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE `session` (
  `SessionKey` varchar(1000) NOT NULL,
  `ProBook` tinyint(1) NOT NULL,
  `ProWatch` tinyint(1) NOT NULL,
  `ProPhone` tinyint(1) NOT NULL,
  `ProMonitor` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `FirstName` varchar(100) NOT NULL,
  `LastName` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`FirstName`, `LastName`, `Email`, `Username`, `Password`) VALUES
('Supreme', 'Overlord', 'no@g.com', 'root', 'sysadmin');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
