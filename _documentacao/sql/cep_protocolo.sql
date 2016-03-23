-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 23, 2016 at 12:38 PM
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
-- Table structure for table `cep_protocolo`
--

CREATE TABLE IF NOT EXISTS `cep_protocolo` (
`id_pc` bigint(20) unsigned NOT NULL,
  `pc_caae` char(20) NOT NULL,
  `pc_titulo` text NOT NULL,
  `pc_autor` char(100) NOT NULL,
  `pc_dt_1st` date NOT NULL DEFAULT '0000-00-00',
  `pc_dt_last` date NOT NULL DEFAULT '0000-00-00',
  `pc_situacao` int(11) NOT NULL,
  `pc_instituicao` char(80) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Dumping data for table `cep_protocolo`
--

INSERT INTO `cep_protocolo` (`id_pc`, `pc_caae`, `pc_titulo`, `pc_autor`, `pc_dt_1st`, `pc_dt_last`, `pc_situacao`, `pc_instituicao`) VALUES
(32, '54244315.6.0000.0100', 'Correlação entre uso de contraceptivos hormonais e marcadores moleculares no câncer de mam(...)', 'Ana Cristina da Silva do Amaral Herrera', '2015-12-08', '0000-00-00', 1, 'Pontifícia Universidade Católica do Parana - PUCPR'),
(31, '54313616.0.0000.0100', 'P07/16 - Estudo de Bioequivalência Farmacêutica entre duas formulações de Claritromicina (...)', 'Ana Maria Pugens Pinto', '2016-03-16', '0000-00-00', 1, 'BIOCINESE - CENTRO DE ESTUDOS BIOFARMACEUTICOS LTDA'),
(30, '50941315.0.0000.0020', 'CORRELAÇÃO ENTRE OS ESCORES MELD, CHILD-TURCOTTE-PUGH, LOK ÍNDEX, FIB-4, APRI E CONTAGEM D(...)', 'Jean Rodrigo Tafarel', '2015-11-12', '0000-00-00', 1, 'Pontifícia Universidade Católica do Parana - PUCPR'),
(29, '54238416.6.0000.0020', 'DESPERDÍCIO DE ALIMENTOS NO AMBIENTE ACADÊMICO: UMA DISCUSSÃO NECESSÁRIA', 'Flavia Auler', '2016-03-09', '0000-00-00', 1, 'Pontifícia Universidade Católica do Parana - PUCPR'),
(28, '54238716.4.0000.0020', 'Diagnóstico e Conduta de Delirium em pacientes internados', 'Luana Alves Tannous', '2016-03-15', '0000-00-00', 1, 'Hospital Universitário Cajuru'),
(27, '54238515.5.0000.0020', 'Os Efeitos dos Treinamentos Pliométrico e Força na Altura do Salto Vertical de Atletas de (...)', 'Christiano Francisco dos Santos', '2015-11-20', '0000-00-00', 1, 'Pontifícia Universidade Católica do Parana - PUCPR'),
(26, '52809115.0.0000.0020', 'FATORES DE RISCO, QUALIDADE DE VIDA E TRATAMENTO RESTAURADOR DE DEFEITOS DE DESENVOLVIMENT(...)', 'Evelise Machado de Souza', '2015-12-02', '0000-00-00', 1, 'Pontifícia Universidade Católica do Paraná'),
(25, '23944513.6.0000.0020', 'PERFIL NUTRICIONAL DE HOMENS EM UMA INSTITUIÇÃO DE LONGA PERMANÊNCIA PARA IDOSOS EM CURITI(...)', 'Joana Perotta', '2013-11-06', '0000-00-00', 1, 'Pontifícia Universidade Católica do Parana - PUCPR'),
(24, '14922513.0.1001.0020', 'Chronic Kidney Disease Outcomes and Practice Patterns Study (CKDopps)- Brazil. Estudo do I(...)', 'Roberto Pecoits Filho', '2013-04-03', '0000-00-00', 1, 'Pontifícia Universidade Católica do Parana - PUCPR'),
(23, '50939415.1.0000.0020', 'UTILIDADES DA UVA-DO-JAPÃO NA CONFEITARIA E SUA ACEITAÇÃO EM UMA SOBREMESA', 'ALEXANDRE ROBERTO DHEIN', '2015-11-13', '0000-00-00', 1, 'Pontifícia Universidade Católica do Parana - PUCPR'),
(22, '54240116.3.0000.0020', 'PROTOCOLO DE MANCHESTER:O CONHECIMENTO DO ENFERMEIRO SOBRE A TRIAGEM EM UMA UNIDADE DE PRO(...)', 'Ana Carla Campos Hidalgo de Almeida', '2016-03-11', '0000-00-00', 1, 'Pontifícia Universidade Católica do Parana - PUCPR'),
(19, '54240616.9.0000.0020', 'USO E CONHECIMENTO DA PÍLULA DO DIA SEGUINTE', 'Patricia Terron Ghezzi da Mata', '2016-03-15', '0000-00-00', 1, 'Pontifícia Universidade Católica do Parana - PUCPR'),
(20, '54244115.5.0000.0020', 'Qualidade de vida em pacientes portadores de câncer de pulmão', 'Ana Cristina da Silva do Amaral Herrera', '2015-11-27', '0000-00-00', 1, 'Pontifícia Universidade Católica do Parana - PUCPR'),
(21, '54245416.0.0000.0020', 'ESPIRITUALIDADE MARISTA - ANÁLISE DA ESPIRITUALIDADE MARISTA ATRAVÉS DE DOCUMENTOS ESPECÍF(...)', 'Andreia Cristina Serrato', '2016-03-09', '0000-00-00', 1, 'Pontifícia Universidade Católica do Parana - PUCPR'),
(33, '25669613.6.2027.0100', 'THEMIS - Um Estudo Multinacional, Randomizado, Duplo-Cego, Controlado por Placebo para Ava(...)', 'José Augusto Ribas Fortes', '2015-02-10', '0000-00-00', 1, 'IRMANDADE DA SANTA CASA DE MISERICORDIA DE CURITIBA'),
(34, '30439013.6.0000.0100', '', 'Geninho Thomé', '2013-10-10', '2015-12-04', 0, '5'),
(35, '13410813.1.2010.0100', '', 'JOSE CARLOS MOURA JORGE', '2013-09-16', '2015-12-17', 0, '5'),
(36, '51106515.8.0000.0100', '', 'Ana Maria Pugens Pinto', '2015-11-17', '2016-02-12', 0, '2'),
(37, '05185212.2.2008.0020', '', 'Jose Rocha Faria Neto', '2012-10-02', '2015-10-15', 0, '3'),
(38, '51630115.6.0000.0020', '', 'LILIAN COSTA CASTEX', '2015-11-27', '2015-12-04', 0, '1'),
(39, '51325715.4.0000.0020', '', 'Luciane Hilu', '2015-11-24', '2015-12-08', 0, '2'),
(40, '47883615.0.0000.0020', '', 'Joana Fiorentin', '2015-07-23', '2016-03-09', 0, '2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cep_protocolo`
--
ALTER TABLE `cep_protocolo`
 ADD UNIQUE KEY `id_pc` (`id_pc`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cep_protocolo`
--
ALTER TABLE `cep_protocolo`
MODIFY `id_pc` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=41;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
