-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 23, 2016 at 10:09 AM
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
-- Table structure for table `cep_tramitacao`
--

CREATE TABLE IF NOT EXISTS `cep_tramitacao` (
`id_ct` bigint(20) unsigned NOT NULL,
  `ct_caae` char(20) NOT NULL,
  `ct_versao` char(5) NOT NULL,
  `ct_tipo` char(5) NOT NULL,
  `ct_data` date NOT NULL DEFAULT '0000-00-00',
  `ct_relator` int(11) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `cep_tramitacao`
--

INSERT INTO `cep_tramitacao` (`id_ct`, `ct_caae`, `ct_versao`, `ct_tipo`, `ct_data`, `ct_relator`) VALUES
(1, '30439013.6.0000.0100', '5', 'E2', '0000-00-00', 1),
(2, '13410813.1.2010.0100', '5', 'Np5', '2016-03-23', 1),
(3, '51106515.8.0000.0100', '2', 'PO', '2016-03-23', 409),
(4, '25669613.6.2027.0100', '3', 'Ep2', '0000-00-00', 837),
(5, '54244315.6.0000.0100', '1', 'PO', '2016-03-23', 409),
(6, '54313616.0.0000.0100', '1', 'PO', '2016-03-23', 837),
(7, '05185212.2.2008.0020', '3', 'Ep1', '2016-03-23', 1),
(8, '51630115.6.0000.0020', '1', 'PO', '2016-03-23', 1),
(9, '51325715.4.0000.0020', '2', 'PO', '2016-03-23', 1),
(10, '47883615.0.0000.0020', '2', 'PO', '0000-00-00', 220),
(11, '54245416.0.0000.0020', '1', 'PO', '2016-03-23', 409),
(12, '50941315.0.0000.0020', '2', 'E1', '2016-03-23', 1698),
(13, '52809115.0.0000.0020', '2', 'PO', '2016-03-23', 617),
(14, '54244115.5.0000.0020', '1', 'PO', '2016-03-23', 1698),
(15, '54240616.9.0000.0020', '1', 'PO', '2016-03-23', 2037),
(16, '14922513.0.1001.0020', '7', 'E4', '2016-03-23', 837),
(17, '54238515.5.0000.0020', '1', 'PO', '2016-03-23', 1428),
(18, '54240116.3.0000.0020', '1', 'PO', '2016-03-23', 1671),
(19, '54238716.4.0000.0020', '1', 'PO', '2016-03-23', 743),
(20, '50939415.1.0000.0020', '2', 'PO', '0000-00-00', 1494),
(21, '23944513.6.0000.0020', '4', 'E1', '2016-03-23', 1),
(22, '54238416.6.0000.0020', '1', 'PO', '2016-03-23', 1494);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cep_tramitacao`
--
ALTER TABLE `cep_tramitacao`
 ADD UNIQUE KEY `id_ct` (`id_ct`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cep_tramitacao`
--
ALTER TABLE `cep_tramitacao`
MODIFY `id_ct` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
