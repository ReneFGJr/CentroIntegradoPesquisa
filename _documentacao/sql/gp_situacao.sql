-- phpMyAdmin SQL Dump
-- version 4.4.8
-- http://www.phpmyadmin.net
--
-- Host: 10.100.3.55
-- Generation Time: Jul 06, 2015 at 04:40 PM
-- Server version: 10.0.19-MariaDB-wsrep
-- PHP Version: 5.4.16

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
-- Table structure for table `gp_situacao`
--

CREATE TABLE IF NOT EXISTS `gp_situacao` (
  `id_gps` int(10) unsigned NOT NULL,
  `gps_situacao` varchar(50) DEFAULT NULL COMMENT 'Certificado',
  `gpd_ativo` tinyint(1) unsigned DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gp_situacao`
--

INSERT INTO `gp_situacao` (`id_gps`, `gps_situacao`, `gpd_ativo`) VALUES
(1, 'Certificado - Não-atualizado há mais de 12 meses', 1),
(2, 'Aguardando certificação', 1),
(3, 'Aguardando certificação', 1),
(4, 'Em preenchimento', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gp_situacao`
--
ALTER TABLE `gp_situacao`
  ADD PRIMARY KEY (`id_gps`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gp_situacao`
--
ALTER TABLE `gp_situacao`
  MODIFY `id_gps` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
