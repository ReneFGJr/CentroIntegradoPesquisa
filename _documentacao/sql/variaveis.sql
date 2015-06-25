-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 25, 2015 at 03:03 PM
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
-- Table structure for table `variaveis`
--

CREATE TABLE IF NOT EXISTS `variaveis` (
`id_v` bigint(20) unsigned NOT NULL,
  `v_nome` char(80) DEFAULT NULL,
  `v_nome_grafico` char(100) NOT NULL,
  `v_update` int(11) DEFAULT NULL,
  `v_variavel` char(30) DEFAULT NULL,
  `v_metodologia` text,
  `v_col_01` char(30) DEFAULT NULL,
  `v_col_02` char(30) DEFAULT NULL,
  `v_col_03` char(30) DEFAULT NULL,
  `v_col_04` char(30) DEFAULT NULL,
  `v_col_05` char(30) DEFAULT NULL,
  `v_col_06` char(30) DEFAULT NULL,
  `v_ativo` int(11) DEFAULT NULL,
  `v_descricao` text,
  `v_fonte` char(30) DEFAULT NULL,
  `v_total` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `variaveis`
--

INSERT INTO `variaveis` (`id_v`, `v_nome`, `v_nome_grafico`, `v_update`, `v_variavel`, `v_metodologia`, `v_col_01`, `v_col_02`, `v_col_03`, `v_col_04`, `v_col_05`, `v_col_06`, `v_ativo`, `v_descricao`, `v_fonte`, `v_total`) VALUES
(1, 'Grupos de Pesquisa CNPq (DGP)', '', 20150623, 'GP-PUCPR', 'Grupos de Pesquisas registrados no Diretório de Grupos de Pesquisa do CNPq conforme censo bianual.\r\n<BR>http://lattes.cnpq.br/web/dgp/sobre14', 'Ano', NULL, NULL, 'Total de Grupos', 'Total pesquisadores', 'Total de doutores', 1, NULL, 'CNPq - DGP', 0),
(2, 'IC/IT - Submissão de Planos / Ano', '', 20150623, 'IC-IT-SUBM-PLAN-ANO', 'Total de submissão de planos por ano e modalidade no programa de Iniciação Científica', 'Ano', NULL, NULL, 'PIBIC', 'PIBITI', 'Outros', 1, NULL, 'cip.pucpr.br', 1),
(3, 'IC - Submissão Planos - Orientador - Titulação - Ano', 'Planos PIBIC<br>titulação orientador', 20150623, 'IC-SUBM-PLAN-ORIENT-TITULACAO', 'Outros refere-se a Pós-Doutorandos e Doutorandos', 'Ano', NULL, NULL, 'Dr.', 'Msc', 'Outros', 1, NULL, 'cip.pucpr.br', 1),
(4, 'IC - Submissão Planos - Orientador - SS - Ano', 'Planos PIBIC<br>orientador stricto sensu', NULL, 'IC-SUBM-PLAN-ORIENT-SS', 'Na categoria outros estão todos os outros orientadores', 'Ano', NULL, NULL, 'Stricto Sensu', 'Outros', '', NULL, NULL, NULL, 1),
(5, 'IC - Submissão Planos - Orientador - Prod. - Ano', 'Planos PIBIC<BR>produtividade', NULL, 'IC-SUBM-PLAN-ORIENT-PROD', NULL, 'Ano', NULL, NULL, 'Prod.', 'Outros', NULL, 1, NULL, NULL, 1),
(6, 'IT - Submissão Planos - Orientador - Prod. - Ano', 'Planos PIBITI<BR>produtividade', NULL, 'IT-SUBM-PLAN-ORIENT-PROD', NULL, 'Ano', '', '', 'Prod.', 'Outros', NULL, NULL, NULL, NULL, 1),
(7, 'IT - Submissão Planos - Orientador - SS - Ano', 'Planos PIBITI<br>orientador stricto sensu', NULL, 'IT-SUBM-PLAN-ORIENT-SS', NULL, 'Ano', NULL, NULL, 'Stricto Sensu', 'Outros', '', 1, NULL, NULL, 1),
(8, 'IT - Submissão Planos - Orientador - Titulação - Ano', 'Planos PIBITI<br>titulação orientador', NULL, 'IT-SUBM-PLAN-ORIENT-TITULACAO', NULL, 'Ano', NULL, NULL, 'Dr.', 'Msc', 'Outros', 1, NULL, NULL, 1),
(9, 'IC/IT - Submissão Planos - Campus', 'Planos PIBIC/PIBITI/PIBIC_EM por Campus', NULL, 'IC-SUBM-PLAN-CAMPUS', NULL, 'Ano', 'Campus', NULL, 'PIBIC', 'PIBITI', 'Outros', 1, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `variaveis_dados`
--

CREATE TABLE IF NOT EXISTS `variaveis_dados` (
`id_d` bigint(20) unsigned NOT NULL,
  `d_variavel` int(7) DEFAULT NULL,
  `d_fld1` char(20) DEFAULT NULL,
  `d_fld2` char(20) DEFAULT NULL,
  `d_fld3` char(20) DEFAULT NULL,
  `d_fld4` char(20) DEFAULT NULL,
  `d_fld5` char(20) DEFAULT NULL,
  `d_fld6` char(20) DEFAULT NULL,
  `d_lock` char(1) DEFAULT NULL,
  `d_update` date NOT NULL DEFAULT '0000-00-00'
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=55 ;

--
-- Dumping data for table `variaveis_dados`
--

INSERT INTO `variaveis_dados` (`id_d`, `d_variavel`, `d_fld1`, `d_fld2`, `d_fld3`, `d_fld4`, `d_fld5`, `d_fld6`, `d_lock`, `d_update`) VALUES
(1, 1, '2014', '', '', '107', '702', '461', '1', '0000-00-00'),
(2, 1, '2010', '', '', '98', '623', '382', '0', '2015-06-23'),
(3, 1, '2008', '', '', '86', '591', '340', '0', '2015-06-23'),
(4, 1, '2006', '', '', '89', '614', '334', '0', '2015-06-23'),
(5, 1, '2004', '', '', '100', '626', '302', '0', '2015-06-23'),
(6, 1, '2002', '', '', '0', '0', '0', '1', '2015-06-23'),
(7, 2, '2012', NULL, NULL, '1069', '128', '22', '1', '2015-06-23'),
(8, 2, '2013', NULL, NULL, '1153', '136', '11', '1', '2015-06-23'),
(9, 2, '2014', NULL, NULL, '1349', '152', '65', '1', '2015-06-23'),
(10, 2, '2015', NULL, NULL, '1243', '188', '28', '0', '2015-06-23'),
(11, 3, '2012', NULL, NULL, '700', '368', '22', '1', '2015-06-23'),
(12, 3, '2013', NULL, NULL, '734', '441', '24', '1', '2015-06-23'),
(13, 3, '2014', NULL, NULL, '822', '481', '46', '1', '2015-06-23'),
(14, 3, '2015', NULL, NULL, '860', '361', '22', '0', '2015-06-23'),
(15, 4, '2015', NULL, NULL, '777', '466', NULL, '0', '2015-06-23'),
(16, 4, '2014', NULL, NULL, '955', '394', NULL, '0', '2015-06-23'),
(17, 4, '2013', NULL, NULL, '371', '828', NULL, '0', '2015-06-23'),
(18, 4, '2012', NULL, NULL, '353', '737', NULL, '0', '2015-06-23'),
(19, 5, '2012', NULL, NULL, '86', '1004', NULL, '0', '2015-06-23'),
(20, 5, '2013', NULL, NULL, '85', '1114', NULL, '0', '2015-06-23'),
(21, 5, '2014', NULL, NULL, '88', '1261', NULL, '0', '2015-06-23'),
(22, 5, '2015', NULL, NULL, '94', '1149', NULL, '0', '2015-06-23'),
(23, 6, '2012', '', '', '18', '114', NULL, '0', '2015-06-23'),
(24, 6, '2013', '', '', '19', '120', NULL, '0', '2015-06-23'),
(25, 6, '2014', '', '', '17', '135', NULL, '0', '2015-06-23'),
(26, 6, '2015', '', '', '24', '164', NULL, '0', '2015-06-23'),
(27, 7, '2015', NULL, NULL, '66', '122', NULL, '0', '2015-06-23'),
(28, 7, '2012', NULL, NULL, '66', '66', NULL, '0', '2015-06-23'),
(29, 7, '2013', NULL, NULL, '49', '90', NULL, '0', '2015-06-23'),
(30, 7, '2014', NULL, NULL, '56', '96', NULL, '0', '2015-06-23'),
(31, 8, '2012', NULL, NULL, '103', '28', '1', '0', '2015-06-23'),
(32, 8, '2013', NULL, NULL, '90', '49', '0', '0', '2015-06-23'),
(33, 8, '2014', NULL, NULL, '123', '28', '1', '0', '2015-06-23'),
(34, 8, '2015', NULL, NULL, '146', '40', '2', '0', '2015-06-23'),
(35, 9, '2015', 'Toledo', NULL, '82', '17', '4', '1', '2015-06-24'),
(36, 9, '2015', 'São José Dos Pinhais', NULL, '102', '2', '1', '1', '2015-06-24'),
(37, 9, '2015', 'Maringa', NULL, '41', '0', '0', '1', '2015-06-24'),
(38, 9, '2015', 'Londrina', NULL, '98', '4', '6', '1', '2015-06-24'),
(39, 9, '2015', 'Curitiba', NULL, '920', '132', '17', '1', '2015-06-24'),
(40, 9, '2014', 'Toledo', NULL, '113', '23', '6', '1', '2015-06-24'),
(41, 9, '2014', 'São José Dos Pinhais', NULL, '115', '30', '1', '1', '2015-06-24'),
(42, 9, '2014', 'Maringa', NULL, '55', '0', '3', '1', '2015-06-24'),
(43, 9, '2014', 'Londrina', NULL, '166', '0', '0', '1', '2015-06-24'),
(44, 9, '2014', 'Curitiba', NULL, '900', '99', '42', '1', '2015-06-24'),
(45, 9, '2013', 'Toledo', NULL, '93', '12', '0', '1', '2015-06-24'),
(46, 9, '2013', 'São José Dos Pinhais', NULL, '103', '32', '2', '1', '2015-06-24'),
(47, 9, '2013', 'Maringa', NULL, '41', '0', '1', '1', '2015-06-24'),
(48, 9, '2013', 'Londrina', NULL, '102', '0', '0', '1', '2015-06-24'),
(49, 9, '2013', 'Curitiba', NULL, '814', '92', '8', '1', '2015-06-24'),
(50, 9, '2012', 'Toledo', NULL, '87', '5', '0', '1', '2015-06-24'),
(51, 9, '2012', 'São José Dos Pinhais', NULL, '120', '33', '3', '1', '2015-06-24'),
(52, 9, '2012', 'Maringa', NULL, '9', '0', '0', '1', '2015-06-24'),
(53, 9, '2012', 'Londrina', NULL, '105', '0', '0', '1', '2015-06-24'),
(54, 9, '2012', 'Curitiba', NULL, '748', '90', '19', '1', '2015-06-24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `variaveis`
--
ALTER TABLE `variaveis`
 ADD UNIQUE KEY `id_v` (`id_v`);

--
-- Indexes for table `variaveis_dados`
--
ALTER TABLE `variaveis_dados`
 ADD UNIQUE KEY `id_d` (`id_d`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `variaveis`
--
ALTER TABLE `variaveis`
MODIFY `id_v` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `variaveis_dados`
--
ALTER TABLE `variaveis_dados`
MODIFY `id_d` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=55;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
