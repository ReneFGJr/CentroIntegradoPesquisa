-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 11, 2015 at 05:47 PM
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
-- Table structure for table `usuario_complemento`
--

CREATE TABLE IF NOT EXISTS `usuario_complemento` (
  `usuario_id_us` int(11) NOT NULL,
  `usc_rua` varchar(150) DEFAULT NULL,
  `usc_complemento` varchar(45) DEFAULT NULL,
  `usc_bairro` varchar(80) DEFAULT NULL,
  `usc_cep` varchar(10) DEFAULT NULL,
  `usc_cidade` varchar(80) DEFAULT NULL,
  `usc_pais` varchar(60) DEFAULT NULL,
  `usc_uf` char(2) DEFAULT NULL,
  `usc_fone_residencial` varchar(15) DEFAULT NULL,
  `usc_fone_celular` varchar(15) DEFAULT NULL,
  `usc_fone_comercial` varchar(15) DEFAULT NULL,
  `usc_fone_recado` varchar(15) DEFAULT NULL,
  `usc_dt_nascimento` date DEFAULT NULL,
  `usc_raca_cor` varchar(20) DEFAULT NULL,
  `usc_nacionalidade` varchar(45) DEFAULT NULL,
  `usc_rg` varchar(20) DEFAULT NULL,
  `usc_orgao_expedidor` varchar(20) DEFAULT NULL,
  `usc_nome_mae` varchar(150) DEFAULT NULL,
  `usc_cpf_mae` varchar(15) DEFAULT NULL,
  `usc_nome_pai` varchar(150) DEFAULT NULL,
  `usc_cpf_pai` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabela com dados complementares menos utilziados (pode ser que ainda necessite de mais dados)';

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
