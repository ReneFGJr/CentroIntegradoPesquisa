-- phpMyAdmin SQL Dump
-- version 4.4.8
-- http://www.phpmyadmin.net
--
-- Host: 10.100.4.24
-- Generation Time: Jun 17, 2015 at 03:47 PM
-- Server version: 5.6.19
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
-- Table structure for table `programa_pos`
--

CREATE TABLE IF NOT EXISTS `programa_pos` (
  `id_pp` int(11) unsigned NOT NULL,
  `pp_nome` varchar(100) NOT NULL,
  `pp_sigla` varchar(10) NOT NULL,
  `pp_cursos` tinyint(1) DEFAULT '1' COMMENT 'se = 1 somente mestrado\nse = 2 mestrado e doutorado\nse = 3 mestrado, doutorado e pós-doutorado',
  `pp_conceito` int(2) DEFAULT NULL COMMENT 'conceito do curso de pos',
  `pp_dt_inicio` date DEFAULT NULL COMMENT 'data de inicio do programa',
  `pp_email` varchar(100) DEFAULT NULL COMMENT 'email do programa',
  `pp_fone1` varchar(14) DEFAULT NULL COMMENT 'fone do programa',
  `pp_fone2` varchar(14) DEFAULT NULL COMMENT 'fone do programa',
  `pp_ativo` tinyint(1) unsigned NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1 COMMENT='relaciona todos os programas de pos graduação vinculados a um usuario';

--
-- Dumping data for table `programa_pos`
--

INSERT INTO `programa_pos` (`id_pp`, `pp_nome`, `pp_sigla`, `pp_cursos`, `pp_conceito`, `pp_dt_inicio`, `pp_email`, `pp_fone1`, `pp_fone2`, `pp_ativo`) VALUES
(1, 'Bioética', 'PPGB', 1, 3, '0000-00-00', '@pucpr.br', '41 9999-9999', '41 8888-8888', 1),
(2, 'Ciência Animal', 'PPGCA', 1, 3, '0000-00-00', '@pucpr.br', '41 9999-9999', '41 8888-8888', 1),
(3, 'Ciências da Saúde', 'PPGCS', 2, 5, '0000-00-00', '@pucpr.br', '41 9999-9999', '41 8888-8888', 1),
(4, 'Direito', 'PPGD', 2, 5, '0000-00-00', '@pucpr.br', '41 9999-9999', '41 8888-8888', 1),
(5, 'Educação', 'PPGE', 2, 5, '0000-00-00', '@pucpr.br', '41 9999-9999', '41 8888-8888', 1),
(6, 'Engenharia de Produção e Sistemas', 'PPGEPS', 2, 4, '0000-00-00', '@pucpr.br', '41 9999-9999', '41 8888-8888', 1),
(7, 'Engenharia Mecânica', 'PPGEM', 2, 5, '0000-00-00', '@pucpr.br', '41 9999-9999', '41 8888-8888', 1),
(8, 'Filosofia', 'PPGF', 1, 4, '0000-00-00', '@pucpr.br', '41 9999-9999', '41 8888-8888', 1),
(9, 'Gestão Urbana', 'PPGTU', 2, 5, '0000-00-00', '@pucpr.br', '41 3271-1664', '', 1),
(10, 'Informática', 'PPGIa', 2, 4, '0000-00-00', '@pucpr.br', '41 9999-9999', '41 8888-8888', 1),
(11, 'Odontologia', 'PPGO', 2, 4, '0000-00-00', '@pucpr.br', '41 9999-9999', '41 8888-8888', 1),
(12, 'Programa de Pós-Graduação em Administração', 'PPAD', 2, 5, '0000-00-00', '@pucpr.br', '41 9999-9999', '41 8888-8888', 1),
(13, 'Programa de Pós-Graduação em Gestão de Cooperativas', 'PPGCOOP', 1, 3, '0000-00-00', '@pucpr.br', '41 9999-9999', '41 8888-8888', 1),
(14, 'Tecnologia em Saúde', 'PPGTS', 1, 4, '0000-00-00', '@pucpr.br', '41 9999-9999', '41 8888-8888', 1),
(15, 'Teologia', 'PPGT', 1, 4, '0000-00-00', '@pucpr.br', '41 9999-9999', '41 8888-8888', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `programa_pos`
--
ALTER TABLE `programa_pos`
  ADD PRIMARY KEY (`id_pp`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `programa_pos`
--
ALTER TABLE `programa_pos`
  MODIFY `id_pp` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
