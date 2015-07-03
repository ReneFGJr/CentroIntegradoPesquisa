-- phpMyAdmin SQL Dump
-- version 4.4.8
-- http://www.phpmyadmin.net
--
-- Host: 10.100.4.24
-- Generation Time: 03-Jul-2015 às 12:50
-- Versão do servidor: 5.6.19
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
  "es_nome" varchar(40) NOT NULL,
  "es_regiao" varchar(15) NOT NULL
);

--
-- Extraindo dados da tabela `estado`
--

INSERT INTO `estado` (`id_es`, `es_uf`, `es_nome`, `es_regiao`) VALUES
(1, 'AC', 'Acre', 'Norte'),
(2, 'AL', 'Alagoas', 'Nordeste'),
(3, 'AM', 'Amazonas', 'Norte'),
(4, 'AP', 'Amapá', 'Norte'),
(5, 'BA', 'Bahia', 'Nordeste'),
(6, 'CE', 'Ceará', 'Nordeste'),
(7, 'DF', 'Distrito Federal', 'Centro-Oeste'),
(8, 'ES', 'Espírito Santo', 'Sudeste'),
(9, 'GO', 'Goiás', 'Centro-Oeste'),
(10, 'MA', 'Maranhão', 'Nordeste'),
(11, 'MG', 'Minas Gerais', 'Sudeste'),
(12, 'MS', 'Mato Grosso do Sul', 'Centro-Oeste'),
(13, 'MT', 'Mato Grosso', 'Centro-Oeste'),
(14, 'PA', 'Pará', 'Norte'),
(15, 'PB', 'Paraíba', 'Nordeste'),
(16, 'PE', 'Pernambuco', 'Nordeste'),
(17, 'PI', 'Piauí', 'Nordeste'),
(18, 'PR', 'Paraná', 'Sul'),
(19, 'RJ', 'Rio de Janeiro', 'Sudeste'),
(20, 'RN', 'Rio Grande do Norte', 'Nordeste'),
(21, 'RR', 'Roraima', 'Norte'),
(22, 'RO', 'Rondônia', 'Norte'),
(23, 'RS', 'Rio Grande do Sul', 'Sul'),
(24, 'SC', 'Santa Catarina', 'Sul'),
(25, 'SE', 'Sergipe', 'Nordeste'),
(26, 'SP', 'São Paulo', 'Sudeste'),
(27, 'TO', 'Tocantins', 'Norte');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY ("id_es");

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
