-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 08, 2015 at 05:30 PM
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
-- Table structure for table `cnpq_bibliografia`
--

CREATE TABLE IF NOT EXISTS `cnpq_bibliografia` (
`id_cc` bigint(20) unsigned NOT NULL,
  `cc_nome` char(100) NOT NULL,
  `cc_titulo` char(200) NOT NULL,
  `cc_isbn` char(13) NOT NULL,
  `cc_ano` char(4) NOT NULL,
  `cc_idioma` char(15) NOT NULL,
  `cc_volume` char(5) NOT NULL,
  `cc_outros` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cnpq_bibliografia`
--
ALTER TABLE `cnpq_bibliografia`
 ADD UNIQUE KEY `id_cc` (`id_cc`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cnpq_bibliografia`
--
ALTER TABLE `cnpq_bibliografia`
MODIFY `id_cc` bigint(20) unsigned NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
