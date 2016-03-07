-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 07, 2016 at 12:54 PM
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
-- Table structure for table `pibic_parecer_2018`
--

CREATE TABLE IF NOT EXISTS `pibic_parecer_2018` (
`id_pp` bigint(20) unsigned NOT NULL,
  `pp_nrparecer` char(7) DEFAULT NULL,
  `pp_tipo` char(5) DEFAULT NULL,
  `pp_protocolo` char(7) DEFAULT NULL,
  `pp_protocolo_mae` char(7) DEFAULT NULL,
  `pp_avaliador` char(8) DEFAULT NULL,
  `pp_avaliador_id` int(11) NOT NULL,
  `pp_revisor` char(8) DEFAULT NULL,
  `pp_status` char(1) DEFAULT NULL,
  `pp_pontos` bigint(20) DEFAULT '0',
  `pp_pontos_pp` bigint(20) DEFAULT '0',
  `pp_data` bigint(20) DEFAULT NULL,
  `pp_data_leitura` bigint(20) DEFAULT NULL,
  `pp_hora` char(5) DEFAULT NULL,
  `pp_parecer_data` bigint(20) DEFAULT NULL,
  `pp_parecer_hora` char(5) DEFAULT NULL,
  `pp_p01` char(5) DEFAULT NULL,
  `pp_p02` char(5) DEFAULT NULL,
  `pp_p03` char(5) DEFAULT NULL,
  `pp_p04` char(5) DEFAULT NULL,
  `pp_p05` char(5) DEFAULT NULL,
  `pp_p06` char(5) DEFAULT NULL,
  `pp_p07` char(5) DEFAULT NULL,
  `pp_p08` char(5) DEFAULT NULL,
  `pp_p09` char(5) DEFAULT NULL,
  `pp_p10` char(5) DEFAULT NULL,
  `pp_p11` char(5) DEFAULT NULL,
  `pp_p12` char(5) DEFAULT NULL,
  `pp_p13` char(5) DEFAULT NULL,
  `pp_p14` char(5) DEFAULT NULL,
  `pp_p15` char(5) DEFAULT NULL,
  `pp_p16` char(5) DEFAULT NULL,
  `pp_p17` char(5) DEFAULT NULL,
  `pp_p18` char(5) DEFAULT NULL,
  `pp_p19` char(5) DEFAULT NULL,
  `pp_abe_01` text,
  `pp_abe_02` text,
  `pp_abe_03` text,
  `pp_abe_04` text,
  `pp_abe_05` text,
  `pp_abe_06` text,
  `pp_abe_07` text,
  `pp_abe_08` text,
  `pp_abe_09` text,
  `pp_abe_10` text,
  `pp_abe_11` text,
  `pp_abe_12` text,
  `pp_abe_13` text,
  `pp_abe_14` text,
  `pp_abe_15` text,
  `pp_abe_16` text,
  `pp_abe_17` text,
  `pp_abe_18` text,
  `pp_abe_19` text
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3769 ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pibic_parecer_2018`
--
ALTER TABLE `pibic_parecer_2018`
 ADD UNIQUE KEY `id_pp` (`id_pp`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pibic_parecer_2018`
--
ALTER TABLE `pibic_parecer_2018`
MODIFY `id_pp` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3769;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
