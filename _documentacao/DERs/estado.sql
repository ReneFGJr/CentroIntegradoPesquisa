-- phpMyAdmin SQL Dump
-- version 4.4.8
-- http://www.phpmyadmin.net
--
-- Host: 10.100.4.24
-- Generation Time: 02-Jul-2015 �s 17:19
-- Vers�o do servidor: 5.6.19
-- PHP Version: 5.4.16

SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES latin1 */;

--
-- Database: `cip`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `estado`
--

CREATE TABLE IF NOT EXISTS "estado" (
  "id_es" int(11) unsigned NOT NULL,
  "es_uf" char(2) NOT NULL,
  "es_nome" varchar(40) NOT NULL
);

--
-- Extraindo dados da tabela `estado`
--

INSERT INTO `estado` (`id_es`, `es_uf`, `es_nome`) VALUES
(1, 'AC', 'Acre'),
(2, 'AL', 'Alagoas'),
(3, 'AM', 'Amazonas'),
(4, 'AP', 'Amap�'),
(5, 'BA', 'Bahia'),
(6, 'CE', 'Cear�'),
(7, 'DF', 'Distrito Federal'),
(8, 'ES', 'Esp�rito Santo'),
(9, 'GO', 'Goi�s'),
(10, 'MA', 'Maranh�o'),
(11, 'MG', 'Minas Gerais'),
(12, 'MS', 'Mato Grosso do Sul'),
(13, 'MT', 'Mato Grosso'),
(14, 'PA', 'Par�'),
(15, 'PB', 'Para�ba'),
(16, 'PE', 'Pernambuco'),
(17, 'PI', 'Piau�'),
(18, 'PR', 'Paran�'),
(19, 'RJ', 'Rio de Janeiro'),
(20, 'RN', 'Rio Grande do Norte'),
(21, 'RR', 'Roraima'),
(22, 'RO', 'Rond�nia'),
(23, 'RS', 'Rio Grande do Sul'),
(24, 'SC', 'Santa Catarina'),
(25, 'SE', 'Sergipe'),
(26, 'SP', 'S�o Paulo'),
(27, 'TO', 'Tocantins');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
