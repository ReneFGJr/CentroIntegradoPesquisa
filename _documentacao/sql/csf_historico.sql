-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 17, 2015 at 10:39 PM
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
-- Table structure for table `csf_historico`
--

CREATE TABLE IF NOT EXISTS `csf_historico` (
`id_slog` bigint(20) unsigned NOT NULL,
  `slog_protocolo` int(7) NOT NULL,
  `slog_usuario` varchar(15) NOT NULL,
  `slog_status` int(11) NOT NULL,
  `slog_data` date NOT NULL DEFAULT '0000-00-00',
  `slog_hora` char(8) NOT NULL,
  `slog_text` text NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `csf_historico`
--

INSERT INTO `csf_historico` (`id_slog`, `slog_protocolo`, `slog_usuario`, `slog_status`, `slog_data`, `slog_hora`, `slog_text`) VALUES
(1, 5, '', 2, '0000-00-00', '19:26:04', ''),
(2, 4, '72952105987', 2, '0000-00-00', '19:26:39', ''),
(3, 6, '72952105987', 2, '0000-00-00', '19:27:25', ''),
(4, 3, '72952105987', 2, '2015-06-17', '19:28:20', ''),
(5, 4, '72952105987', 2, '2015-06-17', '19:32:39', ''),
(6, 6, '72952105987', 2, '2015-06-17', '19:33:30', ''),
(7, 5, '72952105987', 2, '2015-06-17', '19:33:55', ''),
(8, 3, '72952105987', 2, '2015-06-17', '19:38:03', 'Pais:[DEU],Previsao:[20150601]');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `csf_historico`
--
ALTER TABLE `csf_historico`
 ADD UNIQUE KEY `id_slog` (`id_slog`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `csf_historico`
--
ALTER TABLE `csf_historico`
MODIFY `id_slog` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
