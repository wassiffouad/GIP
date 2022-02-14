-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 29, 2021 at 05:42 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbgip`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblgebruikers`
--

DROP TABLE IF EXISTS `tblgebruikers`;
CREATE TABLE IF NOT EXISTS `tblgebruikers` (
  `volgnummer` int(11) NOT NULL AUTO_INCREMENT,
  `naam` varchar(30) DEFAULT NULL,
  `voornaam` varchar(20) DEFAULT NULL,
  `email` varchar(70) DEFAULT NULL,
  `wachtwoord` varchar(30) DEFAULT NULL,
  `admin` int(1) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`volgnummer`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblgebruikers`
--

INSERT INTO `tblgebruikers` (`volgnummer`, `naam`, `voornaam`, `email`, `wachtwoord`, `admin`, `status`) VALUES
(25, 'Fouad', 'Wassif', 'wassif-fouad@hotmail.com', 'test123', 1, 0),
(27, 'Mathys', 'Cas', 'cas.mathys@hotmail.com', 'test123', 0, 0),
(28, 'Heus ', 'Rune', 'rune.heus@hotmail.com', 'test123', 0, 0),
(29, 'Mergaerts', 'Lennard', 'lennard.mergaerts@hotmail.com', 'test123', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblspullen`
--

DROP TABLE IF EXISTS `tblspullen`;
CREATE TABLE IF NOT EXISTS `tblspullen` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `volgnummer` text NOT NULL,
  `naam` text NOT NULL,
  `soort_item` text NOT NULL,
  `prijs` int(50) NOT NULL,
  `stad` text NOT NULL,
  `postcode` varchar(50) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblspullen`
--

INSERT INTO `tblspullen` (`product_id`, `volgnummer`, `naam`, `soort_item`, `prijs`, `stad`, `postcode`) VALUES
(1, '0', 'Jordan 1s', 'schoenen', 100, 'Mechelen', '2800');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
