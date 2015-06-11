-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 11, 2015 at 05:48 PM
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
-- Table structure for table `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
`id_us` int(11) NOT NULL,
  `us_nome` varchar(250) DEFAULT NULL,
  `us_cpf` varchar(15) DEFAULT NULL,
  `us_cracha` varchar(15) DEFAULT NULL,
  `us_emplid` varchar(15) DEFAULT NULL,
  `us_login` varchar(80) DEFAULT NULL,
  `us_pass` varchar(100) DEFAULT NULL,
  `us_email` varchar(150) DEFAULT NULL,
  `us_link_lattes` varchar(100) DEFAULT NULL,
  `us_ativo` tinyint(1) DEFAULT '1',
  `us_teste` tinyint(1) DEFAULT '0',
  `us_origem` tinyint(1) DEFAULT '0' COMMENT '0 - PUCPR\n1 - Externo',
  `us_professor_tipo` tinyint(1) DEFAULT '0' COMMENT '0 - Gradua��o\n1 - Stricto Sensu',
  `us_aluno_tipo` varchar(45) DEFAULT NULL,
  `us_regime` varchar(10) DEFAULT NULL COMMENT 'Horista / TI / TP',
  `us_genero` char(1) DEFAULT NULL COMMENT '''M'' = masculino\n''F'' = feminino',
  `usuario_tipo_ust_id` int(11) NOT NULL,
  `usuario_funcao_usf_id` int(11) NOT NULL,
  `usuario_titulacao_ust_id` int(11) NOT NULL,
  `us_dt_nascimento` date NOT NULL DEFAULT '0000-00-00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabela com dados de usuarios (Alunos, Professores, Colaboradores e Externos)' AUTO_INCREMENT=1 ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
 ADD PRIMARY KEY (`id_us`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
MODIFY `id_us` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
