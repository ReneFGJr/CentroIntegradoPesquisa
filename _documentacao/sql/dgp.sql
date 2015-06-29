-- phpMyAdmin SQL Dump
-- version 4.4.8
-- http://www.phpmyadmin.net
--
-- Host: 10.100.3.55
-- Generation Time: Jun 29, 2015 at 01:31 PM
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
-- Table structure for table `dgp`
--

CREATE TABLE IF NOT EXISTS `dgp` (
  `id_dgp` bigint(20) unsigned NOT NULL,
  `dgp_link` char(100) NOT NULL,
  `dgp_nome` char(100) NOT NULL,
  `dgp_instituicao` char(7) NOT NULL,
  `dgp_lastupdate` int(11) NOT NULL,
  `dgp_status` char(1) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dgp`
--

INSERT INTO `dgp` (`id_dgp`, `dgp_link`, `dgp_nome`, `dgp_instituicao`, `dgp_lastupdate`, `dgp_status`) VALUES
(1, 'http://dgp.cnpq.br/dgp/espelhogrupo/9734870278687868', 'ESTUDOS MÉTRICOS EM INFORMAÇÃO', '', 0, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dgp`
--
ALTER TABLE `dgp`
  ADD UNIQUE KEY `id_dgp` (`id_dgp`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dgp`
--
ALTER TABLE `dgp`
  MODIFY `id_dgp` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
