-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 22, 2014 at 12:02 PM
-- Server version: 5.5.35
-- PHP Version: 5.4.4-14+deb7u9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `iustftpdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `ftpt`
--

CREATE TABLE IF NOT EXISTS `ftpt` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(90) NOT NULL,
  `desc` text,
  `cat` int(11) NOT NULL,
  `address` text NOT NULL,
  `img` text,
  `dltimes` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `ftpt`
--

INSERT INTO `ftpt` (`id`, `name`, `desc`, `cat`, `address`, `img`, `dltimes`) VALUES
(1, 'idm', 'internet download manager', 0, 'ftp://ftp.iust.ac.ir/somewhere', '/images/profilepic.jpg', 0),
(2, 'ms office 2013', 'ms office 13', 0, 'ftp://ftp.iust.ac.ir/somewhereelse', 'images/portfolio/judah.jpg', 0),
(4, 'nsagg', 'greavgbnyjnnrh4h', 0, 'ftp://www.ftp.iust.ir', 'room_002.png', 0),
(5, 'vgdsfcad', 'adcSFCASF', 0, 'ftp://www.ftp.iust.ir', 'Snowflakes.png', 0),
(6, 'vgdsfcad', 'adcSFCASF', 0, 'ftp://www.ftp.iust.ir', 'Snowflakes.png', 0),
(7, 'GEWGEWRGT', 'GE4GTRW45G54TVE4SEV4WTWWV', 0, 'ftp://www.ftp.iust.ir', 'new.jpg', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
