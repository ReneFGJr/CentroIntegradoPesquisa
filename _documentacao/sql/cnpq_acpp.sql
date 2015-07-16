-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 16, 2015 at 05:17 PM
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
-- Table structure for table `cnpq_acpp`
--

CREATE TABLE IF NOT EXISTS `cnpq_acpp` (
`id_acpp` bigint(20) unsigned NOT NULL,
  `acpp_autor` char(100) NOT NULL,
  `acpp_tipo` char(50) NOT NULL,
  `acpp_idioma` char(20) NOT NULL,
  `acpp_ano` char(4) NOT NULL,
  `acpp_titulo` text NOT NULL,
  `acpp_ordem` int(11) NOT NULL,
  `acpp_relevante` int(11) NOT NULL,
  `acpp_periodico` char(100) NOT NULL,
  `acpp_issn` char(10) NOT NULL,
  `acpp_volume` char(15) NOT NULL,
  `acpp_fasciculo` char(15) NOT NULL,
  `acpp_pg_ini` char(10) NOT NULL,
  `acpp_pg_fim` char(10) NOT NULL,
  `acpp_editora` char(50) NOT NULL,
  `acpp_doi` char(30) NOT NULL,
  `acpp_jcr` char(8) NOT NULL,
  `acpp_qualis` char(5) NOT NULL,
  `acpp_circulacao` char(10) NOT NULL,
  `acpp_qt_autores` int(11) NOT NULL,
  `acpp_autores` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cnpq_acpp`
--
ALTER TABLE `cnpq_acpp`
 ADD UNIQUE KEY `id_acpp` (`id_acpp`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cnpq_acpp`
--
ALTER TABLE `cnpq_acpp`
MODIFY `id_acpp` bigint(20) unsigned NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
