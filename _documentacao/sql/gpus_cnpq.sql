-- phpMyAdmin SQL Dump
-- version 4.4.8
-- http://www.phpmyadmin.net
--
-- Host: 10.100.3.55
-- Generation Time: Jul 06, 2015 at 06:55 PM
-- Server version: 10.0.19-MariaDB-wsrep
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
-- Table structure for table `gpus_cnpq`
--

CREATE TABLE IF NOT EXISTS `gpus_cnpq` (
  `id_gpus_cnpq` int(11) unsigned NOT NULL,
  `gpus_cnpq_nome` varchar(80) DEFAULT NULL COMMENT 'Nome que está cadastrado no cnpq',
  `gpus_titulacao_max` varchar(20) NOT NULL,
  `gpus_dt_inclusao` date NOT NULL COMMENT 'data da inclusao no grupo para não egressos',
  `gpus_egresso_dt_per_ini` date NOT NULL COMMENT 'data inicial da participação caso seja egresso',
  `gpus_egresso_dt_per_fim` date NOT NULL COMMENT 'data final da participação caso seja egresso',
  `us_id` int(11) unsigned NOT NULL COMMENT 'vinculo com a tabela us_usuario'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gpus_cnpq`
--
ALTER TABLE `gpus_cnpq`
  ADD PRIMARY KEY (`id_gpus_cnpq`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gpus_cnpq`
--
ALTER TABLE `gpus_cnpq`
  MODIFY `id_gpus_cnpq` int(11) unsigned NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
