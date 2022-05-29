-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 29, 2022 at 07:16 PM
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
-- Database: `chatapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `msg_id` int(11) NOT NULL AUTO_INCREMENT,
  `incoming_msg_id` int(255) NOT NULL,
  `outgoing_msg_id` int(255) NOT NULL,
  `msg` varchar(1000) NOT NULL,
  PRIMARY KEY (`msg_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`msg_id`, `incoming_msg_id`, `outgoing_msg_id`, `msg`) VALUES
(1, 920128356, 346569751, 'ewa'),
(2, 346569751, 920128356, 'ewa alles goe?'),
(3, 920128356, 346569751, 'met mij is alles in orde'),
(4, 920128356, 346569751, 'wbu'),
(5, 920128356, 346569751, '?'),
(6, 920128356, 346569751, 'hallo'),
(7, 920128356, 346569751, 'ewa strijder'),
(8, 346569751, 920128356, 'dfasdfa'),
(9, 920128356, 346569751, 'fasfaf'),
(10, 346569751, 920128356, 'ewa'),
(11, 346569751, 370766373, 'ewa'),
(12, 346569751, 370766373, 'ik wil iets kopen');

-- --------------------------------------------------------

--
-- Table structure for table `tblgoedkeuring`
--

DROP TABLE IF EXISTS `tblgoedkeuring`;
CREATE TABLE IF NOT EXISTS `tblgoedkeuring` (
  `volgnummer` int(11) NOT NULL AUTO_INCREMENT,
  `foto` varchar(255) NOT NULL,
  `soort` varchar(255) NOT NULL,
  `beschrijvingPost` varchar(1000) NOT NULL,
  `poster` int(255) NOT NULL,
  `datum` date NOT NULL,
  `likes` int(255) NOT NULL,
  `zoekertje` int(255) NOT NULL,
  `prijs` int(255) NOT NULL,
  `stad` varchar(255) NOT NULL,
  `postcode` int(255) NOT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`volgnummer`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblposts`
--

DROP TABLE IF EXISTS `tblposts`;
CREATE TABLE IF NOT EXISTS `tblposts` (
  `volgnummer` int(11) NOT NULL AUTO_INCREMENT,
  `foto` varchar(255) NOT NULL,
  `soort` varchar(255) NOT NULL,
  `beschrijvingPost` varchar(1000) NOT NULL,
  `poster` int(255) NOT NULL,
  `datum` date NOT NULL,
  `likes` int(255) NOT NULL,
  `zoekertje` int(255) NOT NULL,
  `prijs` int(250) NOT NULL,
  `stad` varchar(255) NOT NULL,
  `postcode` int(250) NOT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`volgnummer`),
  KEY `foreign` (`id_user`)
) ENGINE=MyISAM AUTO_INCREMENT=59 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblposts`
--

INSERT INTO `tblposts` (`volgnummer`, `foto`, `soort`, `beschrijvingPost`, `poster`, `datum`, `likes`, `zoekertje`, `prijs`, `stad`, `postcode`, `id_user`) VALUES
(57, 'blouse.jpeg', 'Blouse', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit', 346569751, '2022-05-29', 0, 0, 15, 'Mechelen', 2800, 1),
(34, 'jordan1s.jpeg', 'Jordan 1s', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit', 920128356, '2022-05-26', 0, 0, 100, 'Mechelen', 2800, 2),
(14, 'napajiri.jpeg', 'Napapijri jas', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit', 509898452, '2022-05-13', 0, 0, 80, 'Boom', 2850, 4),
(15, 'converse.jpeg', 'Converse high', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit', 509898452, '2022-05-13', 0, 0, 60, 'Mechelen ', 2800, 4);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `unique_id` int(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `admin` int(11) NOT NULL,
  `subscription_id` int(11) NOT NULL,
  `counter` int(11) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `unique_id`, `fname`, `lname`, `email`, `password`, `img`, `status`, `admin`, `subscription_id`, `counter`) VALUES
(1, 346569751, 'Wassif', 'Fouad', 'wassif-fouad@hotmail.com', 'cc03e747a6afbbcbf8be7668acfebee5', '1653664564deuce.jpg', 'Active now', 1, 3, 0),
(2, 920128356, 'Sophia', 'Fouad', 'wassifxf@gmail.com', 'cc03e747a6afbbcbf8be7668acfebee5', '1652293328runetje.png', 'Offline now', 0, 2, 1),
(4, 509898452, 'Rune', 'Heus', 'rune.heus@bazandpoort.be', 'cc03e747a6afbbcbf8be7668acfebee5', '1652293513steffjee.jpg', 'Offline now', 0, 1, 2),
(7, 961519905, 'Gerrit', 'Wijns', 'gerrit.wijns@bazandpoort.be', 'cc03e747a6afbbcbf8be7668acfebee5', '1653590586zenitsu.jpg', 'Offline now', 0, 2, 0),
(9, 370766373, 'Ilias ', 'Lahrichi', 'ilias.lah@gmail.com', 'cc03e747a6afbbcbf8be7668acfebee5', '1653652171C8833797-A818-4402-9900-1778C9B1E128.jpg', 'Offline now', 0, 3, 1),
(11, 129051818, 'Lennert', 'Mergaerts', 'lennert.mergaerts@bazandpoort.be', 'a69e86909ae34960ecb61d60033e0d4f', '1653851549C8833797-A818-4402-9900-1778C9B1E128.jpg', 'Offline now', 0, 0, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
