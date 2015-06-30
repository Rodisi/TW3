-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2015 at 01:36 PM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `convite`
--

INSERT INTO `convite` (`conviteid`, `eventid`, `email`, `estado`, `mensagem`) VALUES
(13, 8, '123@hotmail.com', 1, 'fdaa'),
(15, 9, '123@hotmail.com', 1, 'dssd'),
(16, 8, '789@gmail.com', 0, 'fsdds'),
(36, 14, 'brunomarques87@gmail.com', 0, 'sdfsdf');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `evento`
--

INSERT INTO `evento` (`eventid`, `userid`, `nome`, `descricao`, `data`, `hora`, `local`, `lat`, `lon`) VALUES
(8, 1, 'asasas', 'gdsfv dsfdff', '2020-11-12', '14:14', 'AlgueirÃ£o-Mem Martins, Portugal', '38.79161093673066', '-9.341983795166016'),
(9, 1, 'sasddddddd', 'hghgfdgdfgdfg', '2016-07-21', '14:11', 'Amadora, Portugal', '38.75340974729409', '-9.222099781036377'),
(11, 1, 'fggfgfg', '23', '2015-11-11', '11:11', 'Lisbon, Portugal', '38.75121759812029', '-9.204998016357422'),
(13, 1, 'gfgfg', 'gfgfgfg', '2015-09-21', '15:05', 'fgfgfgfgfg', '', ''),
(14, 2, 'asasas', 'vccvbcvb', '2015-11-12', '14:00', 'AgÃªncia Nacional de InovaÃ§Ã£o', '38.771994', '-9.180686000000037');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `nome`, `email`, `pass`) VALUES
(1, 'bruno', 'brunomarques87@gmail.com', '121187'),
(2, '123', '123@hotmail.com', '123');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
