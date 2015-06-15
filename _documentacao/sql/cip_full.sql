-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 15, 2015 at 09:54 AM
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
-- Table structure for table `csf`
--

CREATE TABLE IF NOT EXISTS `csf` (
`id_csf` bigint(20) unsigned NOT NULL,
  `csf_aluno` int(11) NOT NULL DEFAULT '0',
  `csf_orientador` int(11) NOT NULL DEFAULT '0',
  `csf_modalidade` int(11) NOT NULL,
  `csf_saida` date NOT NULL DEFAULT '0000-00-00',
  `csf_saida_previsao` date NOT NULL DEFAULT '0000-00-00',
  `csf_retorno` date NOT NULL DEFAULT '0000-00-00',
  `csf_retorno_previsao` date NOT NULL DEFAULT '0000-00-00',
  `csf_pa_intercambio` text NOT NULL,
  `csf_pais` varchar(3) NOT NULL DEFAULT '0',
  `csf_universidade` int(11) NOT NULL DEFAULT '0',
  `csf_status` int(11) NOT NULL DEFAULT '0',
  `csf_obs` text NOT NULL,
  `csf_area` int(11) NOT NULL DEFAULT '0',
  `csf_curso` int(11) NOT NULL DEFAULT '0',
  `csf_chamada` int(11) NOT NULL DEFAULT '0',
  `csf_parceiro` int(11) NOT NULL DEFAULT '1'
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `csf`
--

INSERT INTO `csf` (`id_csf`, `csf_aluno`, `csf_orientador`, `csf_modalidade`, `csf_saida`, `csf_saida_previsao`, `csf_retorno`, `csf_retorno_previsao`, `csf_pa_intercambio`, `csf_pais`, `csf_universidade`, `csf_status`, `csf_obs`, `csf_area`, `csf_curso`, `csf_chamada`, `csf_parceiro`) VALUES
(1, 10, 0, 0, '0000-00-00', '2015-06-01', '0000-00-00', '0000-00-00', '0', '0', 0, 1, '', 0, 0, 8, 0),
(2, 4, 0, 0, '0000-00-00', '2015-06-01', '0000-00-00', '0000-00-00', '0', 'DEU', 0, 1, '', 0, 0, 8, 1),
(3, 6, 0, 0, '0000-00-00', '2015-12-01', '0000-00-00', '0000-00-00', '0', 'DEU', 0, 1, '', 0, 0, 8, 0),
(4, 9, 0, 0, '0000-00-00', '2015-12-01', '0000-00-00', '0000-00-00', '0', 'DEU', 0, 1, '', 0, 0, 8, 0),
(5, 11, 0, 0, '0000-00-00', '2015-06-01', '0000-00-00', '0000-00-00', '0', 'AUS', 0, 1, '', 0, 0, 8, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `csf`
--
ALTER TABLE `csf`
 ADD UNIQUE KEY `id_csf` (`id_csf`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `csf`
--
ALTER TABLE `csf`
MODIFY `id_csf` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
