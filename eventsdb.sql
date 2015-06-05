-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2015 at 06:53 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `eventsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `convite`
--

CREATE TABLE IF NOT EXISTS `convite` (
  `conviteid` int(11) NOT NULL AUTO_INCREMENT,
  `eventid` int(11) NOT NULL,
  `email` varchar(80) NOT NULL,
  `estado` int(1) NOT NULL,
  `mensagem` varchar(512) NOT NULL,
  PRIMARY KEY (`conviteid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `evento`
--

CREATE TABLE IF NOT EXISTS `evento` (
  `eventid` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `nome` varchar(64) NOT NULL,
  `descricao` varchar(256) NOT NULL,
  `data` varchar(12) NOT NULL,
  `hora` varchar(12) NOT NULL,
  `local` varchar(128) NOT NULL,
  `lat` varchar(32) NOT NULL,
  `lon` varchar(32) NOT NULL,
  PRIMARY KEY (`eventid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(80) NOT NULL,
  `email` varchar(80) NOT NULL,
  `pass` varchar(32) NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
