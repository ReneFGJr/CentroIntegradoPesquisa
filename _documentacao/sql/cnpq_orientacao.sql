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
-- Table structure for table `cnpq_orientacao`
--

CREATE TABLE IF NOT EXISTS `cnpq_orientacao` (
`id_or` bigint(20) unsigned NOT NULL,
  `or_nome` char(100) NOT NULL,
  `or_titulo` char(200) NOT NULL,
  `or_orientado` char(80) NOT NULL,
  `or_ano` char(4) NOT NULL,
  `or_instituicao` char(80) NOT NULL,
  or_tipo char(5),
  or_curso char(60)
  
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cnpq_orientacao`
--
ALTER TABLE `cnpq_orientacao`
 ADD UNIQUE KEY `id_or` (`id_or`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cnpq_orientacao`
--
ALTER TABLE `cnpq_orientacao`
MODIFY `id_or` bigint(20) unsigned NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
