-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 11, 2015 at 02:44 PM
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
-- Table structure for table `logins_perfil`
--

CREATE TABLE IF NOT EXISTS `logins_perfil` (
`id_usp` bigint(20) unsigned NOT NULL,
  `usp_codigo` char(4) DEFAULT NULL,
  `usp_descricao` char(50) DEFAULT NULL,
  `usp_ativo` int(11) DEFAULT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `logins_perfil`
--

INSERT INTO `logins_perfil` (`id_usp`, `usp_codigo`, `usp_descricao`, `usp_ativo`) VALUES
(1, '#MAS', 'Master', 1),
(2, '#ADM', 'Admin', 1),
(3, '#MEM', 'Member of committee', 1),
(4, '#ADC', 'Ad Hoc', 1),
(5, '#CPI', 'Coordenador PIBIC', 1),
(6, '#SPI', 'Secretaria PIBIC', 1),
(7, '#SCR', 'Secretaria Pesquisa', 1),
(8, '#COO', 'Coordenador Pesquisa', 1),
(9, '#RES', 'Pesquisador', 1),
(10, '#CSF', 'Ciência sem Fronteiras', 1),
(11, '#PIB', 'Membros do PIBIC', 1),
(12, '#PIT', 'Revisores e Tradutores PIBIC/PIBITI', 1),
(13, '#CEU', 'Membro do CEUA', 1),
(14, '#CES', 'Secretaria do CEUA', 1),
(15, '#CPS', 'Secretária Executiva do CIP', 1),
(16, '#SEP', 'Secretaria da Pós-Graduação', 1),
(17, '#SPA', 'Secretaria do PPG Gestão Urbana', 1),
(18, '#SPB', 'Secretaria do PPG Educação', 1),
(19, '#SPC', 'Secretaria do PPG Ciências da Saúde', 1),
(20, '#OBS', 'Observador CIP', 1),
(21, '#CNQ', 'Observador CNPq', 1),
(22, '#SPD', 'Secretaria do PPG  Engenharia de Produção e Sistem', 1),
(23, '#SPE', 'Secretaria do PPG Odontologia', 1),
(24, '#SPF', 'Secretaria do PPG Administração', 1),
(25, '#SPR', 'Secretaria do PPG Ciência Animal', 1),
(26, '#SPH', 'Secretaria do PPG Teologia', 1),
(27, '#SPG', 'Secretaria Executiva da Pós-Graduação', 1),
(28, '#SPJ', 'Secretaria do PPG Direito', 1),
(29, '#SPL', 'Secretaria do PPG Filosofia', 1),
(30, '#SPM', 'Secretaria do PPG Engenharia Mecânica', 1),
(31, '#SPN', 'Secretaria do PPG Bioética', 1),
(32, '#SPP', 'Secretaria do PPG Gestão de Cooperativas', 1),
(33, '#SPO', 'Secretaria do PPG Informática', 1),
(34, '#SPT', 'Secretaria do PPG Tecnologia em Saúde', 1),
(35, '#CPP', 'Coordenador Administrativo do PIBIC/PIBITI', 1),
(36, '#FNP', 'Fundo de Pesquisa - Adm', 1),
(37, '#DIP', 'Diretora de Pesquisa', 1),
(38, '#TST', 'Testing ground', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `logins_perfil`
--
ALTER TABLE `logins_perfil`
 ADD UNIQUE KEY `id_usp` (`id_usp`), ADD UNIQUE KEY `perfil_key` (`usp_codigo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `logins_perfil`
--
ALTER TABLE `logins_perfil`
MODIFY `id_usp` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=39;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
