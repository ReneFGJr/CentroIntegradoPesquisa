-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 06, 2015 at 09:53 AM
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
-- Table structure for table `ic_modalidade`
--

CREATE TABLE IF NOT EXISTS `ic_modalidade` (
`id_mb` bigint(20) unsigned NOT NULL,
  `mb_descricao` varchar(150) NOT NULL,
  `mb_tipo` char(10) NOT NULL,
  `mb_ativo` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `ic_modalidade`
--

INSERT INTO `ic_modalidade` (`id_mb`, `mb_descricao`, `mb_tipo`, `mb_ativo`) VALUES
(1, 'Ciência sem Fronteiras', 'CSF', 1),
(2, 'Bolsa Estratégica PUCPR', 'PIBITI', 1),
(3, 'Bolsa CNPq-PIBIC', 'PIBIC', 1),
(4, 'Bolsa Fundação Araucária', 'PIBIC', 1),
(5, 'Inclusão Social - Fundação Araucária', 'PIBIC', 1),
(6, 'Juventudes', 'PIBIC', 1),
(7, 'Inclusão Social Tecnológica - Fundação Araucária', 'PIBITI', 1),
(8, 'Bolsa PUCPR-PIBITI', 'PIBITI', 1),
(9, 'Fundação Araucária-PIBITI', 'PIBITI', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ic_modalidade`
--
ALTER TABLE `ic_modalidade`
 ADD UNIQUE KEY `id_mb` (`id_mb`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ic_modalidade`
--
ALTER TABLE `ic_modalidade`
MODIFY `id_mb` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
