-- phpMyAdmin SQL Dump
-- version 4.4.8
-- http://www.phpmyadmin.net
--
-- Host: mariadb.pro.pucpr.br
-- Generation Time: Dec 04, 2015 at 02:54 PM
-- Server version: 10.0.21-MariaDB-wsrep
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
-- Table structure for table `ic_acompanhamento`
--

CREATE TABLE IF NOT EXISTS `ic_acompanhamento` (
  `id_pa` bigint(20) unsigned NOT NULL,
  `pa_protocolo` char(8) NOT NULL,
  `pa_usuario_id` int(11) NOT NULL,
  `pa_tipo` char(3) NOT NULL,
  `pa_data` date NOT NULL DEFAULT '0000-00-00',
  `pa_hora` varchar(5) NOT NULL,
  `pa_status` varchar(1) NOT NULL DEFAULT '@',
  `pa_p01` int(11) NOT NULL,
  `pa_p02` int(11) NOT NULL,
  `pa_p03` int(11) NOT NULL,
  `pa_p04` int(11) NOT NULL,
  `pa_p05` int(11) NOT NULL,
  `pa_p06` int(11) NOT NULL,
  `pa_p07` int(11) NOT NULL,
  `pa_p08` int(11) NOT NULL,
  `pa_p09` int(11) NOT NULL,
  `pa_p20` text NOT NULL,
  `pa_p21` text NOT NULL,
  `pa_p22` text NOT NULL,
  `pa_p23` text NOT NULL,
  `pa_p24` text NOT NULL,
  `pa_p25` text NOT NULL,
  `pa_p26` text NOT NULL,
  `pa_p27` text NOT NULL,
  `pa_p28` text NOT NULL,
  `pa_p29` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ic_acompanhamento`
--
ALTER TABLE `ic_acompanhamento`
  ADD UNIQUE KEY `id_pa` (`id_pa`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ic_acompanhamento`
--
ALTER TABLE `ic_acompanhamento`
  MODIFY `id_pa` bigint(20) unsigned NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
