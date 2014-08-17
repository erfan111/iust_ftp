-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 17, 2014 at 11:03 AM
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
  `id` int(11) NOT NULL,
  `name` varchar(90) NOT NULL,
  `desc` text,
  `address` text NOT NULL,
  `img` text,
  `dltimes` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ftpt`
--

INSERT INTO `ftpt` (`id`, `name`, `desc`, `address`, `img`, `dltimes`) VALUES
(0, 'ms office 2013', 'office13', 'www.ed.wefcwefc', 'images/portfolio/girl.jpg', 1),
(1, 'idm', 'internet download manager 5.19', 'ftp.iust.ac.ir/p/r/fhf/hgf/s/idm', 'images/portfolio/coffee.jpg', 3);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
