-- phpMyAdmin SQL Dump
-- version 4.3.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 05, 2015 at 01:17 PM
-- Server version: 5.5.38
-- PHP Version: 5.5.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `Search`
--

-- --------------------------------------------------------

--
-- Table structure for table `Contacts`
--

CREATE TABLE IF NOT EXISTS `Contacts` (
  `id` int(12) NOT NULL,
  `uid` int(12) NOT NULL,
  `fid` int(12) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Contacts`
--

INSERT INTO `Contacts` (`id`, `uid`, `fid`) VALUES
(1, 1, 2),
(2, 1, 3),
(3, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE IF NOT EXISTS `Users` (
  `Id` int(12) NOT NULL,
  `fname` varchar(128) NOT NULL,
  `lname` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `bday` date NOT NULL,
  `type` enum('user','admin') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`Id`, `fname`, `lname`, `email`, `bday`, `type`) VALUES
(1, 'oshry', 'levy', 'oshrylevy@gmail.com', '1981-03-08', 'user'),
(2, 'oshry1', 'levy1', 'oshrylevy1@gmail.com', '2015-04-11', 'user'),
(3, 'oshry2', 'ley2', 'oshrylevy2@gmail.com', '2000-04-16', 'user'),
(4, 'tomer', 'boo', 'tomer@gmail.com', '1991-04-13', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Contacts`
--
ALTER TABLE `Contacts`
  ADD PRIMARY KEY (`id`), ADD KEY `uid` (`uid`), ADD KEY `fid` (`fid`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Contacts`
--
ALTER TABLE `Contacts`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `Users`
--
ALTER TABLE `Users`
  MODIFY `Id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
