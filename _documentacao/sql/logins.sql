-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 11, 2015 at 06:15 PM
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
-- Table structure for table `logins`
--

CREATE TABLE IF NOT EXISTS `logins` (
`id_us` bigint(20) unsigned NOT NULL,
  `us_nome` char(120) DEFAULT NULL,
  `us_login` char(40) DEFAULT NULL,
  `us_senha` char(100) DEFAULT NULL,
  `us_lastupdate` bigint(20) DEFAULT NULL,
  `us_cpf` char(15) DEFAULT NULL,
  `us_dt_admissao` bigint(20) DEFAULT NULL,
  `us_cracha` char(15) DEFAULT NULL,
  `us_perfil` text,
  `us_id` char(15) DEFAULT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `logins`
--

INSERT INTO `logins` (`id_us`, `us_nome`, `us_login`, `us_senha`, `us_lastupdate`, `us_cpf`, `us_dt_admissao`, `us_cracha`, `us_perfil`, `us_id`) VALUES
(2, 'Rene Faustino Gabriel Junior', 'RENE.GABRIEL', '876197588c22835cee493fea3e2d1c2e', 20150611, '72952105987', 20150611, '', NULL, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `logins`
--
ALTER TABLE `logins`
 ADD PRIMARY KEY (`id_us`), ADD UNIQUE KEY `id_us` (`id_us`), ADD UNIQUE KEY `user_cpf` (`us_cpf`), ADD UNIQUE KEY `user_login` (`us_login`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `logins`
--
ALTER TABLE `logins`
MODIFY `id_us` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
