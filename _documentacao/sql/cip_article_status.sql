-- phpMyAdmin SQL Dump
-- version 4.4.8
-- http://www.phpmyadmin.net
--
-- Host: 10.100.3.55
-- Generation Time: Jul 17, 2015 at 01:23 PM
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
-- Table structure for table `cip_artigo_status`
--

CREATE TABLE IF NOT EXISTS `cip_artigo_status` (
  `id_cas` bigint(20) unsigned NOT NULL,
  `cas_descricao` char(100) NOT NULL,
  `cas_menu` tinyint(4) NOT NULL DEFAULT '1',
  `cas_contabiliza` tinyint(4) NOT NULL DEFAULT '1',
  `cas_ordem` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cip_artigo_status`
--

INSERT INTO `cip_artigo_status` (`id_cas`, `cas_descricao`, `cas_menu`, `cas_contabiliza`, `cas_ordem`) VALUES
(1, 'Em cadastro pelo professor', 1, 1, 1),
(2, 'Em correção pelo professor', 1, 1, 2),
(3, 'Em validação pelo coordenador', 1, 1, 3),
(4, 'Em validação pela Diretoria de Pesquisa', 1, 1, 4),
(5, 'Em análise da Diretoria de Pesquisa', 1, 1, 5),
(6, 'Liberação pela secretaria', 1, 1, 6),
(7, 'Comunicar o professor', 1, 1, 7),
(8, 'Finalizado', 1, 1, 8),
(9, 'Cancelado', 1, 0, 9);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cip_artigo_status`
--
ALTER TABLE `cip_artigo_status`
  ADD UNIQUE KEY `id_cas` (`id_cas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cip_artigo_status`
--
ALTER TABLE `cip_artigo_status`
  MODIFY `id_cas` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
