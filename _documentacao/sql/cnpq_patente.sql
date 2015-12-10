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
-- Table structure for table `cnpq_patente`
--

CREATE TABLE IF NOT EXISTS `cnpq_patente` (
`id_pt` bigint(20) unsigned NOT NULL,
  `pt_nome` char(100) NOT NULL,
  `pt_titulo` char(200) NOT NULL,
  `pt_registro` char(20) NOT NULL,
  `pt_ano` char(4) NOT NULL,
  `pt_outros` text NOT NULL
  
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cnpq_patente`
--
ALTER TABLE `cnpq_patente`
 ADD UNIQUE KEY `id_pt` (`id_pt`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cnpq_patente`
--
ALTER TABLE `cnpq_patente`
MODIFY `id_pt` bigint(20) unsigned NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
