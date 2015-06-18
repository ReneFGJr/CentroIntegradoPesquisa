-- phpMyAdmin SQL Dump
-- version 4.4.8
-- http://www.phpmyadmin.net
--
-- Host: 10.100.4.24
-- Generation Time: Jun 18, 2015 at 04:17 PM
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
-- Table structure for table `fomento_editais`
--

CREATE TABLE IF NOT EXISTS `fomento_editais` (
  `id_ed` bigint(20) unsigned NOT NULL,
  `ed_titulo` text,
  `ed_data` date DEFAULT NULL,
  `ed_agencia` char(7) DEFAULT NULL,
  `ed_idioma` char(5) DEFAULT NULL,
  `ed_chamada` char(30) DEFAULT NULL,
  `ed_data_1` date DEFAULT NULL,
  `ed_data_2` date DEFAULT NULL,
  `ed_data_3` date DEFAULT NULL,
  `ed_texto_1` text,
  `ed_texto_2` text,
  `ed_texto_3` text,
  `ed_texto_4` text,
  `ed_texto_5` text,
  `ed_texto_6` text,
  `ed_texto_7` text,
  `ed_texto_8` text,
  `ed_texto_9` text,
  `ed_texto_10` text,
  `ed_texto_11` text,
  `ed_texto_12` text,
  `ed_status` char(1) DEFAULT NULL,
  `ed_autor` char(20) DEFAULT NULL,
  `ed_corpo` text,
  `ed_url_externa` char(200) DEFAULT NULL,
  `ed_total_visualizacoes` int(11) DEFAULT NULL,
  `ed_local` char(15) DEFAULT NULL,
  `ed_data_envio` date DEFAULT NULL,
  `ed_document_require` char(1) DEFAULT NULL,
  `ed_login` char(15) DEFAULT NULL,
  `ed_titulo_email` char(100) DEFAULT NULL,
  `ed_edital_tipo` char(2) DEFAULT NULL,
  `ed_fluxo_continuo` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fomento_editais`
--

INSERT INTO `fomento_editais` (`id_ed`, `ed_titulo`, `ed_data`, `ed_agencia`, `ed_idioma`, `ed_chamada`, `ed_data_1`, `ed_data_2`, `ed_data_3`, `ed_texto_1`, `ed_texto_2`, `ed_texto_3`, `ed_texto_4`, `ed_texto_5`, `ed_texto_6`, `ed_texto_7`, `ed_texto_8`, `ed_texto_9`, `ed_texto_10`, `ed_texto_11`, `ed_texto_12`, `ed_status`, `ed_autor`, `ed_corpo`, `ed_url_externa`, `ed_total_visualizacoes`, `ed_local`, `ed_data_envio`, `ed_document_require`, `ed_login`, `ed_titulo_email`, `ed_edital_tipo`, `ed_fluxo_continuo`) VALUES
(1, 'teste', NULL, '111', 'pt_BR', NULL, NULL, NULL, NULL, 'qwe', 'qwe', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
