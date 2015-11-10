-- phpMyAdmin SQL Dump
-- version 4.4.8
-- http://www.phpmyadmin.net
--
-- Host: mariadb.pro.pucpr.br
-- Generation Time: Nov 10, 2015 at 02:39 PM
-- Server version: 10.0.21-MariaDB-wsrep
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
-- Table structure for table `ic_protocolo_motivos`
--

CREATE TABLE IF NOT EXISTS `ic_protocolo_motivos` (
  `id_pm` bigint(20) unsigned NOT NULL,
  `pm_descricao` char(200) NOT NULL,
  `pm_tipo` char(5) NOT NULL,
  `pm_ativo` int(11) NOT NULL DEFAULT '1',
  `pm_ordem` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ic_protocolo_motivos`
--

INSERT INTO `ic_protocolo_motivos` (`id_pm`, `pm_descricao`, `pm_tipo`, `pm_ativo`, `pm_ordem`) VALUES
(3, 'Por insuficiência de desempenho do aluno', 'CAN', 1, 1),
(6, 'Bolsista obteve concessão de outra agência', 'CAN', 1, 1),
(8, 'Cancelamento por término da graduação', 'CAN', 1, 1),
(11, 'Desistência do estudante', 'CAN', 1, 1),
(13, 'Cancelamento para troca de orientado', 'CAN', 1, 1),
(16, 'Outros motivos', 'CAN', 1, 1),
(17, 'Cancelamento da indicação do bolsista', 'CAN', 1, 1),
(21, 'Problemas de saúde pessoal', 'CAN', 1, 20),
(24, 'Problemas de saúde de um membro da família', 'CAN', 1, 21);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ic_protocolo_motivos`
--
ALTER TABLE `ic_protocolo_motivos`
  ADD UNIQUE KEY `id_pm` (`id_pm`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ic_protocolo_motivos`
--
ALTER TABLE `ic_protocolo_motivos`
  MODIFY `id_pm` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
