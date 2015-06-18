-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 18, 2015 at 02:19 PM
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
-- Table structure for table `csf_ged`
--

CREATE TABLE IF NOT EXISTS `csf_ged` (
`id_doc` bigint(20) unsigned NOT NULL,
  `doc_dd0` int(7) DEFAULT NULL,
  `doc_tipo` char(5) DEFAULT NULL,
  `doc_ano` char(4) DEFAULT NULL,
  `doc_filename` text,
  `doc_status` char(1) DEFAULT NULL,
  `doc_data` int(11) DEFAULT NULL,
  `doc_hora` char(8) DEFAULT NULL,
  `doc_arquivo` text,
  `doc_extensao` char(4) DEFAULT NULL,
  `doc_size` float DEFAULT NULL,
  `doc_versao` char(4) DEFAULT NULL,
  `doc_ativo` int(11) DEFAULT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `csf_ged`
--

INSERT INTO `csf_ged` (`id_doc`, `doc_dd0`, `doc_tipo`, `doc_ano`, `doc_filename`, `doc_status`, `doc_data`, `doc_hora`, `doc_arquivo`, `doc_extensao`, `doc_size`, `doc_versao`, `doc_ativo`) VALUES
(1, 7, 'DIVER', '2015', 'ic por campus.docx', '@', 20150618, '10:18:17', '_document/2015/06/-9cde0-ic por campus.docx', 'docx', 24682, '0', 1);

-- --------------------------------------------------------

--
-- Table structure for table `csf_ged_tipo`
--

CREATE TABLE IF NOT EXISTS `csf_ged_tipo` (
`id_doct` bigint(20) unsigned NOT NULL,
  `doct_nome` char(50) DEFAULT NULL,
  `doct_codigo` char(5) DEFAULT NULL,
  `doct_publico` int(11) DEFAULT NULL,
  `doct_avaliador` int(11) DEFAULT NULL,
  `doct_autor` int(11) DEFAULT NULL,
  `doct_restrito` int(11) DEFAULT NULL,
  `doct_ativo` int(11) DEFAULT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `csf_ged_tipo`
--

INSERT INTO `csf_ged_tipo` (`id_doct`, `doct_nome`, `doct_codigo`, `doct_publico`, `doct_avaliador`, `doct_autor`, `doct_restrito`, `doct_ativo`) VALUES
(1, 'Documentos diversos', 'DIVER', 1, 1, 1, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `csf_ged`
--
ALTER TABLE `csf_ged`
 ADD UNIQUE KEY `id_doc` (`id_doc`);

--
-- Indexes for table `csf_ged_tipo`
--
ALTER TABLE `csf_ged_tipo`
 ADD UNIQUE KEY `id_doct` (`id_doct`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `csf_ged`
--
ALTER TABLE `csf_ged`
MODIFY `id_doc` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `csf_ged_tipo`
--
ALTER TABLE `csf_ged_tipo`
MODIFY `id_doct` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
