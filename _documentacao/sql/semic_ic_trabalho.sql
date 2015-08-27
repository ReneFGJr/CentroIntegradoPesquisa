-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 15, 2015 at 08:05 AM
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
-- Table structure for table `semic_ic_trabalho`
--

CREATE TABLE IF NOT EXISTS `semic_ic_trabalho` (
`id_sm` bigint(20) unsigned NOT NULL,
  `sm_codigo` char(7) COLLATE latin1_general_ci DEFAULT NULL,
  `sm_titulo` longtext COLLATE latin1_general_ci,
  `sm_titulo_en` longtext COLLATE latin1_general_ci,
  `sm_programa` char(7) COLLATE latin1_general_ci DEFAULT NULL,
  `sm_curso` char(7) COLLATE latin1_general_ci DEFAULT NULL,
  `sm_docente` char(8) COLLATE latin1_general_ci DEFAULT NULL,
  `sm_discente` char(8) COLLATE latin1_general_ci DEFAULT NULL,
  `sm_colaboradores` longtext COLLATE latin1_general_ci,
  `sm_autores` longtext COLLATE latin1_general_ci,
  `sm_edital` char(6) COLLATE latin1_general_ci DEFAULT NULL,
  `sm_ano` char(4) COLLATE latin1_general_ci DEFAULT NULL,
  `sm_lastupdate` int(11) DEFAULT NULL,
  `sm_resumo_01` longtext COLLATE latin1_general_ci,
  `sm_resumo_02` longtext COLLATE latin1_general_ci,
  `sm_rem_01` longtext COLLATE latin1_general_ci,
  `sm_rem_02` longtext COLLATE latin1_general_ci,
  `sm_rem_03` longtext COLLATE latin1_general_ci,
  `sm_rem_04` longtext COLLATE latin1_general_ci,
  `sm_rem_05` longtext COLLATE latin1_general_ci,
  `sm_rem_06` longtext COLLATE latin1_general_ci,
  `sm_rem_11` longtext COLLATE latin1_general_ci,
  `sm_rem_12` longtext COLLATE latin1_general_ci,
  `sm_rem_13` longtext COLLATE latin1_general_ci,
  `sm_rem_14` longtext COLLATE latin1_general_ci,
  `sm_rem_15` longtext COLLATE latin1_general_ci,
  `sm_rem_16` longtext COLLATE latin1_general_ci,
  `sm_status` char(1) COLLATE latin1_general_ci DEFAULT NULL,
  `sm_modalidade` char(20) COLLATE latin1_general_ci DEFAULT NULL,
  `sm_formacao` char(20) COLLATE latin1_general_ci DEFAULT NULL,
  `sm_obs` longtext COLLATE latin1_general_ci,
  `sm_revisor` char(30) COLLATE latin1_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `semic_ic_trabalho`
--
ALTER TABLE `semic_ic_trabalho`
 ADD UNIQUE KEY `id_sm` (`id_sm`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `semic_ic_trabalho`
--
ALTER TABLE `semic_ic_trabalho`
MODIFY `id_sm` bigint(20) unsigned NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
