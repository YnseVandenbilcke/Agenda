-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Mar 07, 2020 at 02:42 PM
-- Server version: 5.7.26
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `agenda`
--
CREATE DATABASE IF NOT EXISTS `agenda` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `agenda`;

-- --------------------------------------------------------

--
-- Table structure for table `afspraken`
--

DROP TABLE IF EXISTS `afspraken`;
CREATE TABLE `afspraken` (
  `id` int(11) NOT NULL,
  `datum` date NOT NULL,
  `omschrijving` varchar(200) NOT NULL,
  `typeafspraak` int(11) NOT NULL,
  `contactid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `afspraken`
--

INSERT INTO `afspraken` (`id`, `datum`, `omschrijving`, `typeafspraak`, `contactid`) VALUES
(1, '2020-03-17', 'Les backend', 3, 1),
(2, '2020-03-18', 'Monitoraat', 1, 2),
(3, '2020-03-17', 'studentenoverleg', 2, 3),
(4, '2020-03-25', 'Les scripting', 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `contacten`
--

DROP TABLE IF EXISTS `contacten`;
CREATE TABLE `contacten` (
  `id` int(11) NOT NULL,
  `naam` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `geslacht` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contacten`
--

INSERT INTO `contacten` (`id`, `naam`, `email`, `geslacht`) VALUES
(1, 'Christophe', 'christophe.laprudence@howest.be', 'm'),
(2, 'Tine', 'tine.broucke@howest.be', 'v'),
(3, 'Dieter', 'dieter.roobrouck@howest.be', 'm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `afspraken`
--
ALTER TABLE `afspraken`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contactid` (`contactid`);

--
-- Indexes for table `contacten`
--
ALTER TABLE `contacten`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `afspraken`
--
ALTER TABLE `afspraken`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contacten`
--
ALTER TABLE `contacten`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `afspraken`
--
ALTER TABLE `afspraken`
  ADD CONSTRAINT `afspraken_ibfk_1` FOREIGN KEY (`contactid`) REFERENCES `contacten` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
