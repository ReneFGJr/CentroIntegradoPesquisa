-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 08, 2015 at 05:30 PM
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
-- Table structure for table `cnpq_evento`
--

CREATE TABLE IF NOT EXISTS `cnpq_evento` (
`id_ev` bigint(20) unsigned NOT NULL,
  `ev_nome` char(100) NOT NULL,
  `ev_titulo` char(200) NOT NULL,
  `ev_isbn` char(13) NOT NULL,
  `ev_ano` char(4) NOT NULL,
  `ev_idioma` char(15) NOT NULL,
  `ev_volume` char(5) NOT NULL,
  `ev_outros` text NOT NULL,
  ev_pag_ini char(6),
  ev_pag_fim char(6),
  ev_num char(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cnpq_evento`
--
ALTER TABLE `cnpq_evento`
 ADD UNIQUE KEY `id_ev` (`id_ev`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cnpq_evento`
--
ALTER TABLE `cnpq_evento`
MODIFY `id_ev` bigint(20) unsigned NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
