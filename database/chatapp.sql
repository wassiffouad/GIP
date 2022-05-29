-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 13, 2022 at 12:50 AM
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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

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
(9, 920128356, 346569751, 'fasfaf');

-- --------------------------------------------------------

--
-- Table structure for table `registrations`
--

DROP TABLE IF EXISTS `registrations`;
CREATE TABLE IF NOT EXISTS `registrations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` blob,
  `phone` varchar(250) NOT NULL,
  `plan` enum('basic','standart','premium') DEFAULT NULL,
  `date_created` datetime NOT NULL,
  `ip` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblposts`
--

INSERT INTO `tblposts` (`volgnummer`, `foto`, `soort`, `beschrijvingPost`, `poster`, `datum`, `likes`, `zoekertje`, `prijs`, `stad`, `postcode`, `id_user`) VALUES
(11, 'lacoste2.jpeg', 'Ralph Lauren Polo', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit', 509898452, '2022-05-12', 0, 0, 25, 'Mechelen', 2800, 4),
(9, 'polo.jpeg', 'Ralph Lauren Polo', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit', 1184278348, '2022-05-12', 0, 0, 25, 'Mechelen ', 2800, 5),
(10, 'lacoste.jpeg', 'Lacoste Polo', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit', 1169738975, '2022-05-12', 0, 0, 25, 'Mechelen', 2800, 3),
(8, 'broek2.jpeg', 'Bershka broek', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit', 920128356, '2022-05-12', 0, 0, 15, 'Antwerpen', 2080, 2),
(7, 'jordan1s.jpeg', 'Jordan 1s', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit', 346569751, '2022-05-12', 0, 0, 100, 'Mechelen', 2800, 1),
(12, 'horloge.jpeg', 'Horloge Hugo Boss', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit', 346569751, '2022-05-13', 0, 0, 100, 'Mechelen', 2800, 1),
(13, 'lacoste2.jpeg', 'Lacoste Polo', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit', 920128356, '2022-05-13', 0, 0, 25, 'Mechelen', 2800, 2),
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
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `unique_id`, `fname`, `lname`, `email`, `password`, `img`, `status`, `admin`) VALUES
(1, 346569751, 'Wassif', 'Fouad', 'wassif-fouad@hotmail.com', 'cc03e747a6afbbcbf8be7668acfebee5', '1652293200runetje.png', 'Offline now', 1),
(2, 920128356, 'Sophia', 'Fouad', 'wassifxf@gmail.com', 'cc03e747a6afbbcbf8be7668acfebee5', '1652293328runetje.png', 'Offline now', 0),
(3, 1169738975, 'Cas ', 'Mathys', 'cas.mathys@bazandpoort.be', 'cc03e747a6afbbcbf8be7668acfebee5', '1652293485steffu.jpg', 'Offline now', 0),
(4, 509898452, 'Rune', 'Heus', 'rune.heus@bazandpoort.be', 'cc03e747a6afbbcbf8be7668acfebee5', '1652293513steffjee.jpg', 'Active now', 0),
(5, 1184278348, 'Noah', 'Uyttebroeck', 'noah.uyttebroeck@bazandpoort.be', 'cc03e747a6afbbcbf8be7668acfebee5', '1652293585stef .jpg', 'Offline now', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
