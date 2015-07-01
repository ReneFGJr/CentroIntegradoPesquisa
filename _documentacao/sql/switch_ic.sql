-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 30, 2015 at 12:48 PM
-- Server version: 5.6.20-log
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cip`
--

-- --------------------------------------------------------

--
-- Table structure for table `switch`
--

CREATE TABLE IF NOT EXISTS `switch` (
`id_sw` bigint(20) unsigned NOT NULL,
  `sw_01` char(1) NOT NULL,
  `sw_02` char(1) NOT NULL,
  `sw_03` char(1) NOT NULL,
  `sw_04` char(1) NOT NULL,
  `sw_05` char(1) NOT NULL,
  `sw_06` char(1) NOT NULL,
  `sw_07` char(1) NOT NULL,
  `sw_08` char(1) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `switch`
--

INSERT INTO `switch` (`id_sw`, `sw_01`, `sw_02`, `sw_03`, `sw_04`, `sw_05`, `sw_06`, `sw_07`, `sw_08`) VALUES
(1, '0', '0', '1', '', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `switch`
--
ALTER TABLE `switch`
 ADD UNIQUE KEY `switch` (`id_sw`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `switch`
--
ALTER TABLE `switch`
MODIFY `id_sw` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
