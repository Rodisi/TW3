-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2015 at 03:45 PM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `evento`
--

INSERT INTO `evento` (`eventid`, `userid`, `nome`, `descricao`, `data`, `hora`, `local`, `lat`, `lon`) VALUES
(1, 1, 'aaa', 'sas', '2015-11-12', '18:30', 'UAL - Universidade Autónoma de Lisboa', '38.724476', '-9.14570900000001'),
(2, 1, 'dfdfdf', 'asfdasfdfdsf', '2015-06-26', '19:30', 'sasasasas', '38.722252399999995', '-9.1393366'),
(3, 1, 'sasas', 'bvbvbv', '2016-12-11', '19:03', 'Energias de Portugal', '38.72592', '-9.149226999999996'),
(4, 1, 'fgfgfg', 'hfhfhh', '2078-11-12', '20:11', 'Castle of S. Jorge', '38.713909', '-9.133475999999973');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `nome`, `email`, `pass`) VALUES
(1, 'bruno', 'brunomarques87@gmail.com', '121187');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
