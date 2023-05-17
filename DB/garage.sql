-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2023 at 09:45 PM
-- Server version: 5.6.15-log
-- PHP Version: 5.5.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `garage`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `Name` varchar(1000) NOT NULL,
  `Email` varchar(1000) NOT NULL,
  `Subject` varchar(1000) NOT NULL,
  `Message` varchar(10000) NOT NULL,
  `IdContact` int(100) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`IdContact`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`Name`, `Email`, `Subject`, `Message`, `IdContact`) VALUES
('test', 'Moncef002@gmail.com', 'Test', 'Testing', 6);

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE IF NOT EXISTS `newsletter` (
  `NL_ID` int(255) NOT NULL AUTO_INCREMENT,
  `Email` varchar(255) NOT NULL,
  PRIMARY KEY (`NL_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `newsletter`
--

INSERT INTO `newsletter` (`NL_ID`, `Email`) VALUES
(1, 'Mahdi@gmail.com'),
(2, 'Motia@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `slidev`
--

CREATE TABLE IF NOT EXISTS `slidev` (
  `IdVslide` int(20) NOT NULL AUTO_INCREMENT,
  `NomVS` varchar(50) NOT NULL,
  `DescVS` varchar(50) NOT NULL,
  PRIMARY KEY (`IdVslide`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `slidev`
--

INSERT INTO `slidev` (`IdVslide`, `NomVS`, `DescVS`) VALUES
(1, 'Porsche 356', 'Lorem ipsum dolor sit amet, consectetur ,<br>sed '),
(2, 'benz', 'zdzdqdqz');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `UserId` int(100) NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `ImageName` varchar(255) NOT NULL,
  `Type` varchar(255) NOT NULL DEFAULT 'User',
  PRIMARY KEY (`UserId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserId`, `Name`, `Email`, `Password`, `ImageName`, `Type`) VALUES
(1, 'Moncef', 'Moncef002@gmail.com', '$2y$10$O2S7b5.pMYeN3F5t1C.JduGGe4qcsWpN5tkZEWQh6/B.X1FgdedT.', 'profile-pic.png', 'Admin'),
(2, 'Mahdi', 'Mahdi@gmail.com', '$2y$10$X.FvA..V.HMCXRYmRLjn0O3rfJZ.63IzjFPJCuKuU0Pn5FvWB53sW', 'meme-let-me-in.gif', 'User'),
(11, 'Motiaazdadazd', 'Moqdzqdstia@gmail.com', '$2y$10$KTW0EEZDxd2fXj8dGPvOp.JfmikXDM1AZlq5QkBhQeb2IGvX0w5iC', 'meme-let-me-in.gif', 'User');

-- --------------------------------------------------------

--
-- Table structure for table `voitures`
--

CREATE TABLE IF NOT EXISTS `voitures` (
  `IdV` int(50) NOT NULL AUTO_INCREMENT,
  `Voitures` varchar(50) NOT NULL,
  `Prix` int(20) NOT NULL,
  `Description` varchar(1000) NOT NULL,
  PRIMARY KEY (`IdV`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `voitures`
--

INSERT INTO `voitures` (`IdV`, `Voitures`, `Prix`, `Description`) VALUES
(1, 'Renault', 5858, 'sgrfsrgseqgsgseg'),
(2, 'Ford Mustang', 3000, 'Lorem ipsum dolor sit amet, consectetur, sed do eiusmod tempor incididunt'),
(3, 'Porche x', 1200, 'Lorem ipsum dolor sit amet, consectetur, sed do eiusmod tempor incididunt'),
(4, 'Porche 911', 41258, 'zdzdzdzd'),
(5, 'Chevrolet SS', 3000, 'Lorem ipsum dolor sit amet, consectetur, sed do eiusmod tempor incididunt'),
(6, 'Meclaren', 2500, 'Lorem ipsum dolor sit amet, consectetur, sed do eiusmod tempor incididunt'),
(7, 'Rolls Royce', 7542, 'Lorem ipsum dolor sit amet, consectetur, sed do eiusmod tempor incididunt'),
(8, 'Rover', 54141, 'dzdzdzd');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
