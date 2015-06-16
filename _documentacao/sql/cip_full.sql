-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 16, 2015 at 09:52 AM
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
-- Table structure for table `ajax_areadoconhecimento`
--

CREATE TABLE IF NOT EXISTS `ajax_areadoconhecimento` (
`id_aa` bigint(20) unsigned NOT NULL,
  `a_cnpq` char(16) DEFAULT NULL,
  `a_descricao` char(100) DEFAULT NULL,
  `a_codigo` char(7) DEFAULT NULL,
  `a_geral` char(7) DEFAULT NULL,
  `a_semic` smallint(6) DEFAULT NULL,
  `a_ativo` char(1) DEFAULT NULL,
  `a_submit` char(1) DEFAULT NULL,
  `a_journal` char(1) DEFAULT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1389 ;

--
-- Dumping data for table `ajax_areadoconhecimento`
--

INSERT INTO `ajax_areadoconhecimento` (`id_aa`, `a_cnpq`, `a_descricao`, `a_codigo`, `a_geral`, `a_semic`, `a_ativo`, `a_submit`, `a_journal`) VALUES
(1, '7.08.04.00-1X', 'Formação de professores', '0001443', '', 1, '', '1', '1'),
(2, '4.08.01.00-X', 'Fisioterapia Motora', '0001382', '', 0, '', '1', '1'),
(3, '3.11.00.00-7', 'Engenharia Naval e Oceânica', '0000688', '', 0, '', '1', '1'),
(4, '6.12.03.00-X', 'Design de Moda', '0001444', '', 1, '', '1', '1'),
(5, '1.04.01.00-8', 'Astronomia de Posição e Mecânica Celeste', '0000157', '', 0, '', '0', '1'),
(6, '3.05.03.00-0', 'Mecânica dos Sólidos', '0001446', '', 1, '', '1', '1'),
(7, '7.08.04.02-8', 'Métodos e Técnicas de Ensino', '0001280', '', 0, '', '1', '1'),
(8, '8.03.05.04-0', 'Interpretação Teatral', '0001372', '', 0, '', '1', '1'),
(9, '7.01.01.00-0', 'História da Filosofia', '0001167', '', 1, '', '1', '1'),
(10, '6.02.02.02-5', 'Organizações Públicas', '0001012', '', 0, '', '1', '1'),
(11, '6.06.06.02-9', 'Políticas de Redistribuição de População', '0001124', '', 0, '', '1', '1'),
(12, 'X9.00.00.00-X', 'Não é uma Áreas estratégicas (não vai concorrer as cotas)', '0001390', '', 0, '', '0', '1'),
(13, '1.07.01.00-1', 'Geologia', '0000268', '', 0, '', '1', '1'),
(14, '1.07.01.01-0', 'Mineralogia', '0000269', '', 0, '', '1', '1'),
(15, '1.07.01.06-0', 'Geocronologia', '0000274', '', 0, '', '1', '1'),
(16, '1.07.01.07-9', 'Cartografia Geológica', '0000275', '', 0, '', '1', '1'),
(17, '1.07.01.08-7', 'Metalogenia', '0000276', '', 0, '', '1', '1'),
(18, '7.01.04.00-0', 'Ética', '0001448', '', 1, '', '1', '1'),
(19, '7.01.02.00-7', 'Metafísica', '0001449', '', 1, '', '1', '1'),
(20, '7.01.03.00-3', 'Lógica', '0001450', '', 1, '', '1', '1'),
(21, '1.03.03.02-2', 'Engenharia de Software', '0001451', '', 0, '', '0', '1'),
(22, '4.00.00.00-1', 'Ciências da Saúde', '0000745', '', 0, '', '1', '1'),
(23, '6.01.03.03-5', 'Direito do Trabalho', '0001000', '', 1, '', '1', '1'),
(24, '6.07.02.01-0', 'Teoria da Classificação', '0001133', '', 0, '', '1', '1'),
(25, '8.03.02.05-0', 'Cerâmica', '0001358', '', 0, '', '1', '1'),
(26, '1.03.04.02-9', 'Arquitetura de Sistemas de Computação', '0000153', '', 1, '', '1', '1'),
(27, '1.03.03.04-9', 'Sistemas de Informação', '0000149', '', 0, '', '0', '1'),
(28, '1.03.03.05-7', 'Processamento Gráfico (Graphics)', '0000150', '', 0, '', '0', '1'),
(29, '9.12.00.00-X', 'Segurança e Desenvolvimento Humano', '0001417', '', 0, '', '0', '1'),
(30, '9.07.00.00-X', 'Agronegócio', '0001412', '', 0, '', '0', '1'),
(31, 'X9.01.02.00-X', 'Microtecnologia', '0001429', '', 0, '', '0', '1'),
(32, '1.04.00.00-1', 'Astronomia', '0000156', '', 0, '', '0', '1'),
(33, 'X9.04.00.00-X', 'Energias Renováveis', '0001406', '', 0, '', '0', '1'),
(34, 'X9.06.00.00-X', 'Desenvolvimento Sustentável', '0001408', '', 0, '', '0', '1'),
(35, '1.03.04.01-0', 'Hardware', '0000152', '', 0, '', '1', '1'),
(36, 'X9.08.00.00-X', 'Formação de Professores', '0001413', '', 0, '', '0', '1'),
(37, 'X9.09.00.00-X', 'Engenharia ambiental', '0001414', '', 0, '', '0', '1'),
(38, '1.03.02.01-8', 'Matemática Simbólica', '0000143', '', 0, '', '0', '1'),
(39, '9.00.00.00-X', ':: Não é área estratégica ::', '0001441', '', 1, '', '1', '1'),
(40, '6.01.04.02-X', 'Direitos humanos', '0001397', '', 1, '', '1', '1'),
(41, '6.01.05.00-X', 'Direito econômico e da integração', '0001431', '', 1, '', '1', '1'),
(42, '7.01.04.01-X', 'Bioética', '0001399', '', 1, '', '1', '1'),
(43, '7.01.04.02-X', 'Ética e técnica', '0001435', '', 1, '', '1', '1'),
(44, '7.01.07.00-X', 'Filosofia e psicanálise', '0001398', '', 1, '', '1', '1'),
(45, '7.01.08.00-x', 'Filosofia da mente', '0001433', '', 1, '', '1', '1'),
(46, '7.07.12.00-X', 'Psicanálise', '0001401', '', 1, '', '1', '1'),
(47, '9.00.00.01-X', 'Direitos Humanos - Juventudes', '0001442', '', 1, '', '1', '1'),
(48, '4.08.00.00-X', 'Muscoloesquelético', '0001436', '', 1, '', '1', '1'),
(49, '4.08.00.00-8-1', 'Musculoesquelética', '0001437', '', 1, '', '1', '1'),
(50, '4.02.12.00-X', 'Prótese Dentária', '0001385', '', 0, '', '1', '1'),
(51, '1.03.03.00-6', 'Metodologia e Técnicas da Computação', '0000145', '', 1, '', '1', '1'),
(52, '1.03.04.00-2', 'Sistemas de Computação', '0000151', '', 1, '', '1', '1'),
(53, '4.08.00.02-X', 'Fisioterapia Respiratória', '0001438', '', 0, '', '1', '1'),
(54, '6.03.01.02-3', 'Teoria Geral da Economia', '0001020', '', 0, '', '1', '1'),
(55, '5.06.05.00-7', 'Avicultura', '0001439', '', 0, '', '1', '1'),
(56, '7.07.11.00-X', 'Psicologia Hospitalar', '0001400', '', 0, '', '1', '1'),
(57, '5.05.05.00-9', 'Inspeção de Produtos de Origem Animal', '0000941', '', 0, '', '1', '1'),
(58, '6.10.01.00-7', 'Fundamentos do Serviço Social', '0001153', '', 0, '', '1', '1'),
(59, '7.01.09.00-x', 'Filosofia Política', '0001434', '', 0, '', '1', '1'),
(60, '7.10.04.00-9 X', 'Ensino Religioso', '0001432', '', 0, '', '1', '1'),
(61, '9.13.00.00-X', 'Cidades', '0001458', '', 1, '1', '1', '1'),
(62, 'X9.10.00.00-X', 'Ética e questões sociais', '0001415', '', 0, '', '0', '1'),
(63, 'X9.11.00.00-X', 'Energia elétrica', '0001416', '', 0, '', '0', '1'),
(64, '7.08.07.09-X', 'Educação à Distância', '0001403', '', 1, '', '1', '1'),
(65, '1.00.00.00-3', 'Ciências Exatas e da Terra', '0000091', '', 0, '', '1', '1'),
(66, 'xsaxasx', 'Vida', '0001456', '', 0, '1', '0', '1'),
(67, 'xcvasc', 'Vida', '0001453', '', 0, '1', '0', '1'),
(68, 'xvas', 'Vida', '0001454', '', 0, '1', '0', '1'),
(69, 'xxca', 'Vida', '0001455', '', 0, '1', '0', '1'),
(70, 'X9.13.00.00-X', 'Agroalimentos', '0001410', '', 0, '', '0', '1'),
(71, '9.01.01.00-X', 'Micro e Nanotecnologia', '0001392', '', 0, '', '0', '1'),
(72, 'BMF', 'Oral and Maxillofacial Surgery', '0001428', '', 0, '', '0', '1'),
(73, '1.01.01.02-0', 'Lógica Matemática', '0000095', '', 0, '', '0', '1'),
(74, '1.01.02.05-1', 'Equações Diferênciais Parciais', '0000105', '', 0, '', '0', '1'),
(75, '8.03.09.00-3', 'Artes do Vídeo', '0001380', '', 0, '', '1', '1'),
(76, '8.03.10.00-1', 'Educação Artística', '0001381', '', 0, '', '1', '1'),
(77, '4.02.02.00-3', 'Cirurgia Buco-Maxilo-Facial', '0000788', '', 1, '', '1', '1'),
(78, '6.03.10.01-4', 'Economia Agrária', '0001061', '', 0, '', '1', '1'),
(79, '6.03.10.02-2', 'Economia dos Recursos Naturais', '0001062', '', 0, '', '1', '1'),
(80, '1.03.02.00-0', 'Matemática da Computação', '0000142', '', 1, '', '1', '1'),
(81, '1.03.01.00-3', 'Teoria da Computação', '0000137', '', 1, '', '1', '1'),
(82, '1.05.05.02-4', 'Espectros Atômicos e Integração de Fótons', '0000207', '', 0, '', '1', '1'),
(83, '1.03.01.01-1', 'Computabilidade e Modelos de Computação', '0000138', '', 0, '', '0', '1'),
(84, '1.03.01.03-8', 'Análise de Algoritmos e Complexidade de Computação', '0000140', '', 0, '', '0', '1'),
(85, '1.03.01.04-6', 'Lógicas e Semântica de Programas', '0000141', '', 0, '', '0', '1'),
(86, '1.06.02.01-1', 'Campos de Coordenação', '0000243', '', 0, '', '1', '1'),
(87, '1.06.03.01-8', 'Cinética Química e Catálise', '0000251', '', 0, '', '1', '1'),
(88, '1.06.03.04-2', 'Química de Interfaces', '0000254', '', 0, '', '1', '1'),
(89, '2.03.02.00-2', 'Morfologia Vegetal', '0000346', '', 0, '', '1', '1'),
(90, '2.03.04.02-1', 'Taxonomia de Fanerógamos', '0000357', '', 0, '', '1', '1'),
(91, '3.12.01.00-8', 'Aerodinâmica', '0000711', '', 0, '', '1', '1'),
(92, '2.03.03.03-3', 'Ecofisiologia Vegetal', '0000354', '', 1, '', '1', '1'),
(93, '', '::SELECIONE UMA ÁREA::', '0001457', '', 0, '1', '0', '1'),
(94, '1.06.03.02-6', 'Eletroquímica', '0000252', '', 0, '', '1', '1'),
(95, '1.06.03.03-4', 'Espectroscopia', '0000253', '', 0, '', '1', '1'),
(96, '1.06.03.05-0', 'Química do Estado Condensado', '0000255', '', 0, '', '1', '1'),
(97, '1.06.03.06-9', 'Química Nuclear e Radioquímica', '0000256', '', 0, '', '1', '1'),
(98, '1.06.03.07-7', 'Química Teórica', '0000257', '', 0, '', '1', '1'),
(99, '1.06.03.08-5', 'Termodinâmica Química', '0000258', '', 0, '', '1', '1'),
(100, '1.06.04.01-4', 'Separação', '0000260', '', 0, '', '1', '1'),
(101, '1.06.04.02-2', 'Métodos Óticos de Análise', '0000261', '', 0, '', '1', '1'),
(102, '1.06.04.03-0', 'Eletroanalítica', '0000262', '', 0, '', '1', '1'),
(103, '1.06.04.04-9', 'Gravimetria', '0000263', '', 0, '', '1', '1'),
(104, '1.06.04.05-7', 'Titimetria', '0000264', '', 0, '', '1', '1'),
(105, '1.06.04.06-5', 'Instrumentação Analítica', '0000265', '', 0, '', '1', '1'),
(106, '1.06.04.07-3', 'Análise de Traços e Química Ambiental', '0000266', '', 0, '', '1', '1'),
(107, '1.06.04.00-6', 'Química Analítica', '0000259', '', 1, '', '1', '1'),
(108, '1.07.02.09-1', 'Geofísica Aplicada', '0000292', '', 0, '', '1', '1'),
(109, '4.04.05.00-1', 'Enfermagem de Doenças Contagiosas', '0000807', '', 0, '', '1', '1'),
(110, '3.12.02.00-4', 'Dinâmica de Vôo', '0000714', '', 0, '', '1', '1'),
(111, '2.02.01.00-1', 'Genética Quantitativa', '0000338', '', 0, '', '1', '1'),
(112, '2.02.02.00-8', 'Genética Molecular e de Microorganismos', '0000339', '', 0, '', '1', '1'),
(113, '2.02.03.00-4', 'Genética Vegetal', '0000340', '', 0, '', '1', '1'),
(114, '2.02.04.00-0', 'Genética Animal', '0000341', '', 0, '', '1', '1'),
(115, '2.02.06.00-3', 'Mutagênese', '0000343', '', 0, '', '1', '1'),
(116, '2.03.01.00-6', 'Paleobotânica', '0000345', '', 0, '', '1', '1'),
(117, '2.03.02.01-0', 'Morfologia Externa', '0000347', '', 0, '', '1', '1'),
(118, '2.03.02.02-9', 'Citologia Vegetal', '0000348', '', 0, '', '1', '1'),
(119, '2.03.02.04-5', 'Palinologia', '0000350', '', 0, '', '1', '1'),
(120, '2.03.03.02-5', 'Reprodução Vegetal', '0000353', '', 0, '', '1', '1'),
(121, '2.03.03.00-9', 'Fisiologia Vegetal', '0000351', '', 1, '', '1', '1'),
(122, '2.03.02.03-7', 'Anatomia Vegetal', '0000349', '', 0, '', '1', '1'),
(123, '1.07.05.01-5', 'Geomorfologia', '0000311', '', 0, '', '1', '1'),
(124, '4.01.02.00-9', 'Cirurgia', '0000766', '', 1, '', '1', '1'),
(125, '2.02.05.00-7', 'Genética Humana e Médica', '0000342', '', 1, '', '1', '1'),
(126, '2.03.03.01-7', 'Nutrição e Crescimento Vegetal', '0000352', '', 1, '', '1', '1'),
(127, '4.06.01.00-5', 'Epidemiologia', '0000815', '', 1, '', '1', '1'),
(128, '2.03.04.00-5', 'Taxonomia Vegetal', '0000355', '', 0, '', '1', '1'),
(129, '2.03.05.00-1', 'Fitogeografia', '0000358', '', 0, '', '1', '1'),
(130, '2.03.06.00-8', 'Botânica Aplicada', '0000359', '', 0, '', '1', '1'),
(131, '2.04.01.00-0', 'Paleozoologia', '0000361', '', 0, '', '1', '1'),
(132, '2.08.01.01-7', 'Proteínas', '0000395', '', 0, '', '1', '1'),
(133, '2.04.03.00-3', 'Fisiologia dos Grupos Recentes', '0000363', '', 0, '', '1', '1'),
(134, '5.02.01.07-7', 'Solos Florestais', '0000858', '', 0, '', '1', '1'),
(135, '5.02.02.06-5', 'Ordenamento Florestal', '0000866', '', 0, '', '1', '1'),
(136, '5.02.03.02-9', 'Mecanização Florestal', '0000869', '', 0, '', '1', '1'),
(137, '5.04.04.02-4', 'Manejo e Conservação de Pastagens', '0000909', '', 0, '', '1', '1'),
(138, '4.07.00.00-3', 'Fonoaudiologia', '0000818', '', 1, '', '1', '1'),
(139, '5.07.02.00-9', 'Tecnologia de Alimentos', '0000968', '', 1, '', '1', '1'),
(140, '5.05.01.02-0', 'Técnica Cirúrgica Animal', '0000920', '', 0, '', '1', '1'),
(141, '2.04.02.00-7', 'Morfologia dos Grupos Recentes', '0000362', '', 1, '', '1', '1'),
(142, '2.09.04.00-2', 'Radiologia e Fotobiologia', '0000406', '', 0, '', '1', '1'),
(143, '3.01.04.01-7', 'Hidráulica', '0000457', '', 0, '', '1', '1'),
(144, '1.05.02.05-0', 'Mecânica, Elasticidade e Reologia', '0000191', '', 0, '', '1', '1'),
(145, '3.04.01.03-8', 'Materiais e Dispositivos Supercondutores', '0000508', '', 0, '', '1', '1'),
(146, '1.07.01.13-3', 'Estratigrafia', '0000281', '', 0, '', '1', '1'),
(147, '3.05.04.06-6', 'Métodos de Síntese e Otimização Aplicados ao Projeto Mecânico', '0000559', '', 0, '', '1', '1'),
(148, '1.05.07.10-8', 'Transp.Eletrônicos e Prop. Elétricas de Superfícies (Interfaces e Películas)', '0000225', '', 0, '', '1', '1'),
(149, '3.07.02.04-6', 'Técnicas Avancadas de Tratamento de Águas', '0000610', '', 0, '', '1', '1'),
(150, '2.02.00.00-5', 'Genética e Biotecnologia', '0000337', '', 1, '', '1', '1'),
(151, '3.10.01.00-9', 'Planejamento de Transportes', '0000676', '', 0, '', '1', '1'),
(152, '2.09.02.00-0', 'Biofísica Celular', '0000404', '', 0, '', '1', '1'),
(153, '4.01.01.00-2', 'Clínica Médica', '0000747', '', 0, '', '1', '1'),
(154, '3.01.02.02-2', 'Estruturas de Madeiras', '0000447', '', 0, '', '1', '1'),
(155, '3.03.04.04-0', 'Transformação de Fases', '0000497', '', 0, '', '1', '1'),
(156, '4.01.01.17-7', 'Oftalmologia', '0000764', '', 1, '', '1', '1'),
(157, '3.05.01.04-0', 'Principios Variacionais e Métodos Numéricos', '0000543', '', 0, '', '1', '1'),
(158, '4.06.02.00-1', 'Saúde Publica', '0000816', '', 1, '', '1', '1'),
(159, '5.02.03.00-2', 'Técnicas e Operações Florestais', '0000867', '', 0, '', '1', '1'),
(160, '9.17.00.00-X', 'Direitos Humanos', '0001459', '', 1, '', '1', '1'),
(161, '3.06.03.14-5', 'Óleos', '0000591', '', 0, '', '1', '1'),
(162, '3.06.03.15-3', 'Papel e Celulose', '0000592', '', 0, '', '1', '1'),
(163, '3.08.02.03-2', 'Séries Temporais', '0000638', '', 0, '', '1', '1'),
(164, '3.08.02.04-0', 'Teoria dos Grafos', '0000639', '', 0, '', '1', '1'),
(165, '3.08.02.05-9', 'Teoria dos Jogos', '0000640', '', 0, '', '1', '1'),
(166, '3.08.04.00-0', 'Engenharia Econômica', '0000647', '', 0, '', '1', '1'),
(167, '3.08.02.00-8', 'Pesquisa Operacional', '0000635', '', 0, '', '1', '1'),
(168, '3.08.02.01-6', 'Processos Estocásticos e Teorias da Filas', '0000636', '', 0, '', '1', '1'),
(169, '3.08.03.02-0', 'Metodologia de Projeto do Produto', '0000643', '', 0, '', '1', '1'),
(170, '3.08.03.03-9', 'Processos de Trabalho', '0000644', '', 0, '', '1', '1'),
(171, '3.08.03.04-7', 'Gerência do Projeto e do Produto', '0000645', '', 0, '', '1', '1'),
(172, '3.08.03.00-4', 'Engenharia do Produto', '0000641', '', 1, '', '1', '1'),
(173, '3.08.04.01-9', 'Estudo de Mercado', '0000648', '', 0, '', '1', '1'),
(174, '3.08.04.02-7', 'Localização Industrial', '0000649', '', 0, '', '1', '1'),
(175, '9.18.00.00-X', 'Biotecnologia', '0001460', '', 0, '', '1', '1'),
(176, '3.08.03.01-2', 'Ergonomia', '0000642', '', 1, '', '1', '1'),
(177, '3.08.03.05-5', 'Desenvolvimento de Produto', '0000646', '', 1, '', '1', '1'),
(178, '5.05.01.00-3', 'Clínica e Cirurgia Animal', '0000918', '', 1, '', '1', '1'),
(179, '5.05.01.01-1', 'Anestesiologia Animal', '0000919', '', 1, '', '1', '1'),
(180, '3.08.04.03-5', 'Análise de Custos', '0000650', '', 0, '', '1', '1'),
(181, '3.08.04.04-3', 'Economia de Tecnologia', '0000651', '', 0, '', '1', '1'),
(182, '6.01.02.00-4', 'Direito Público', '0000989', '', 1, '', '1', '1'),
(183, '9.19.00.00-X', 'Telecomunicações', '0001461', '', 0, '', '0', '1'),
(184, '3.11.03.00-6', 'Máquinas Marítimas', '0000696', '', 0, '', '1', '1'),
(185, '3.11.03.01-4', 'Análise de Sistemas Propulsores', '0000697', '', 0, '', '1', '1'),
(186, '6.03.01.04-0', 'História Econômica', '0001022', '', 0, '', '1', '1'),
(187, '6.03.01.05-8', 'Sistemas Econômicos', '0001023', '', 0, '', '1', '1'),
(188, '6.03.02.01-1', 'Métodos e Modelos Matemáticos, Econométricos e Estatísticos', '0001025', '', 0, '', '1', '1'),
(189, 'X.XX.XX.00-0', 'Ética', '0001170', '', 0, '', '0', '1'),
(190, '3.10.03.00-1', 'Operações de Transportes', '0000684', '', 0, '', '1', '1'),
(191, '3.11.02.00-0', 'Estruturas Navais e Oceânicas', '0000692', '', 0, '', '1', '1'),
(192, '3.11.02.02-6', 'Dinâmica Estrutural Naval e Oceânica', '0000694', '', 0, '', '1', '1'),
(193, '3.11.02.01-8', 'Análise Teórica e Experimental de Estrutura', '0000693', '', 0, '', '1', '1'),
(194, '3.13.01.01-0', 'Processamento de Sinais Biológicos', '0000737', '', 0, '', '1', '1'),
(195, '6.04.04.01-9', 'Desenvolvimento Histórico do Paisagismo', '0001076', '', 0, '', '1', '1'),
(196, '1.01.03.05-8', 'Teoria das Singularidades e Teoria das Catástrofes', '0000112', '', 0, '', '0', '1'),
(197, '4.01.01.01-0', 'Angiologia', '0000748', '', 0, '', '1', '1'),
(198, '4.01.01.02-9', 'Dermatologia', '0000749', '', 0, '', '1', '1'),
(199, '6.09.00.00-8', 'Comunicação', '0001140', '', 1, '', '1', '1'),
(200, '1.04.06.00-0', 'Instrumentação Astronômica', '0000173', '', 0, '', '0', '1'),
(201, '4.02.03.00-0', 'Ortodontia', '0000789', '', 1, '', '1', '1'),
(202, '4.02.07.00-5', 'Radiologia Odontológica', '0000793', '', 1, '', '1', '1'),
(203, '6.09.04.00-3', 'Relações Públicas e Propaganda', '0001150', '', 1, '', '1', '1'),
(204, '4.02.08.00-1', 'Odontologia Social e Preventiva', '0000794', '', 0, '', '1', '1'),
(205, '7.02.01.02-1', 'História da Sociologia', '0001176', '', 0, '', '1', '1'),
(206, '1.05.01.06-1', 'Instrumentação Específica de Uso Geral em Física', '0000185', '', 0, '', '0', '1'),
(207, '5.01.02.04-4', 'Microbiologia Agrícola', '0000834', '', 0, '', '1', '1'),
(208, '5.01.02.05-2', 'Defesa Fitossanitária', '0000835', '', 0, '', '1', '1'),
(209, '5.02.04.08-4', 'Tecnologia de Celulose e Papel', '0000878', '', 0, '', '1', '1'),
(210, '5.02.04.09-2', 'Tecnologia de Chapas', '0000879', '', 0, '', '1', '1'),
(211, 'DT-03', 'Direito Tributário', '0001462', '', 0, '1', '0', '1'),
(212, '7.07.02.04-7', 'Estados Subjetivos e Emoção', '0001227', '', 1, '', '1', '1'),
(213, '5.02.05.00-5', 'Conservação da Natureza', '0000880', '', 0, '', '1', '1'),
(214, '7.08.04.00-1', 'Ensino-Aprendizagem', '0001278', '', 0, '', '1', '1'),
(215, '5.05.01.05-4', 'Obstetrícia Animal', '0000923', '', 0, '', '1', '1'),
(216, 'DT-01', 'Direito Tributário', '0001463', '', 0, '1', '0', '1'),
(217, '5.05.01.06-2', 'Clínica Veterinária', '0000924', '', 1, '', '1', '1'),
(218, '5.05.01.07-0', 'Clínica Cirúrgica Animal', '0000925', '', 1, '', '1', '1'),
(219, '8.00.00.00-2', 'Lingüística, Letras e Artes', '0001329', '', 0, '', '1', '1'),
(220, '5.07.01.06-1', 'Avaliação e Controle de Qualidade de Alimentos', '0000966', '', 0, '', '1', '1'),
(221, '5.07.01.07-0', 'Padrões, Legislação e Fiscalização de Alimentos', '0000967', '', 0, '', '1', '1'),
(222, '5.07.00.00-6', 'Ciência e Tecnologia de Alimentos', '0000959', '', 1, '', '1', '1'),
(223, 'DT-02', 'Direito Tributário', '0001464', '', 0, '0', '0', '1'),
(224, '6.01.01.00-8', 'Teoria do Direito', '0000980', '', 1, '', '1', '1'),
(225, 'X9.15.00.00-X', 'Ciência, tecnologia e inovação - regulação e legislação', '0001409', '', 0, '', '0', '1'),
(226, '6.02.02.00-9', 'Administração Pública', '0001010', '', 0, '', '1', '1'),
(227, 'DE-01', 'Direito Eleitoral', '0001465', '', 0, '1', '0', '1'),
(228, '6.02.01.05-3', 'Administração de Recursos Humanos', '0001009', '', 1, '', '1', '1'),
(229, '6.02.02.01-7', 'Contabilidade e Financas Públicas', '0001011', '', 1, '', '1', '1'),
(230, '6.02.02.03-3', 'Política e Planejamento Governamentais', '0001013', '', 0, '', '1', '1'),
(231, 'DF-01', 'Direito Financeiro', '0001466', '', 0, '1', '0', '1'),
(232, '9.04.00.00-X', 'Tecnologia e gestão da informação e comunicação', '0001430', '', 1, '', '1', '1'),
(233, '2.07.02.07-8', 'Cinesiologia', '0000390', '', 1, '', '1', '1'),
(234, '3.07.00.00-X', 'Engenharia Ambiental', '0001440', '', 1, '', '1', '1'),
(235, '1.06.02.03-8', 'Compostos Organo-Metálicos', '0000245', '', 0, '', '1', '1'),
(236, '1.06.02.04-6', 'Determinação de Estrutura de Compostos Inorgânicos', '0000246', '', 0, '', '1', '1'),
(237, '1.06.02.05-4', 'Foto-Química Inorgânica', '0000247', '', 0, '', '1', '1'),
(238, '1.06.02.06-2', 'Fisico Química Inorgânica', '0000248', '', 0, '', '1', '1'),
(239, '1.05.03.04-8', 'Propriedades de Partículas Específicas e Ressonâncias', '0000197', '', 0, '', '1', '1'),
(240, '9.99.00.00-X', 'Mobilidade Nacional e Internacional', '0001452', '', 0, '', '0', '1'),
(241, '1.01.00.00-8', 'Matemática', '0000092', '', 1, '', '1', '1'),
(242, '1.03.00.00-7', 'Ciência da Computação', '0000136', '', 1, '', '1', '1'),
(243, '1.06.02.07-0', 'Química Bio-Inorgânica', '0000249', '', 0, '', '1', '1'),
(244, '2.03.04.01-3', 'Taxonomia de Criptógamos', '0000356', '', 0, '', '1', '1'),
(245, '2.07.02.05-1', 'Fisiologia Endocrina', '0000388', '', 0, '', '1', '1'),
(246, '2.07.02.06-0', 'Fisiologia da Digestão', '0000389', '', 0, '', '1', '1'),
(247, '2.07.03.00-7', 'Fisiologia do Esforço', '0000391', '', 0, '', '1', '1'),
(248, '2.07.04.00-3', 'Fisiologia Comparada', '0000392', '', 0, '', '1', '1'),
(249, '1.01.02.03-5', 'Análise Funcional Não-Linear', '0000103', '', 0, '', '0', '1'),
(250, '1.05.01.04-5', 'Física Estatística e Termodinâmica', '0000183', '', 0, '', '0', '1'),
(251, '8.03.07.00-0', 'Fotografia', '0001374', '', 1, '', '1', '1'),
(252, 'X9.14.00.00-X', 'Infraestrutura, organização produtiva e logística na área jurídica', '0001411', '', 0, '', '0', '1'),
(253, '8.03.05.01-6', 'Dramaturgia', '0001369', '', 0, '', '1', '1'),
(254, '8.03.05.02-4', 'Direção Teatral', '0001370', '', 0, '', '1', '1'),
(255, '8.03.05.03-2', 'Cenografia', '0001371', '', 0, '', '1', '1'),
(256, '8.03.06.00-4', 'Ópera', '0001373', '', 0, '', '1', '1'),
(257, '8.03.08.00-7', 'Cinema', '0001375', '', 0, '', '1', '1'),
(258, '8.03.08.01-5', 'Administração e Produção de Filmes', '0001376', '', 0, '', '1', '1'),
(259, '8.03.08.02-3', 'Roteiro e Direção Cinematográficos', '0001377', '', 0, '', '1', '1'),
(260, '8.03.08.03-1', 'Técnicas de Registro e Processamento de Filmes', '0001378', '', 0, '', '1', '1'),
(261, '3.04.01.02-0', 'Materiais e Componentes Semicondutores', '0000507', '', 1, '', '1', '1'),
(262, '3.05.03.02-7', 'Dinâmica dos Corpos Rígidos, Elásticos e Plásticos', '0000550', '', 1, '', '1', '1'),
(263, '3.07.01.01-5', 'Planejamento Integrado dos Recursos Hídricos', '0000601', '', 1, '', '1', '1'),
(264, '6.04.01.01-0', 'História da Arquitetura e Urbanismo', '0001065', '', 1, '', '1', '1'),
(265, '6.04.03.00-4', 'Tecnologia de Arquitetura e Urbanismo', '0001073', '', 1, '', '1', '1'),
(266, '1.02.02.06-4', 'Regressão e Correlação', '0000132', '', 0, '', '0', '1'),
(267, '1.02.02.07-2', 'Planejamento de Experimentos', '0000133', '', 0, '', '0', '1'),
(268, '6.07.00.00-9', 'Ciência da Informação', '0001127', '', 0, '', '1', '1'),
(269, '6.03.01.03-1', 'História do Pensamento Econômico', '0001021', '', 0, '', '1', '1'),
(270, '6.03.02.00-3', 'Métodos Quantitativos em Economia', '0001024', '', 0, '', '1', '1'),
(271, '6.04.02.02-4', 'Planejamento e Projeto do Espaço Urbano', '0001071', '', 0, '', '1', '1'),
(272, '6.04.02.03-2', 'Planejamento e Projeto do Equipamento', '0001072', '', 0, '', '1', '1'),
(273, '6.04.03.01-2', 'Adequação Ambiental', '0001074', '', 0, '', '1', '1'),
(274, '6.04.04.00-0', 'Paisagismo', '0001075', '', 0, '', '1', '1'),
(275, '7.02.01.01-3', 'Teoria Sociológica', '0001175', '', 0, '', '1', '1'),
(276, '7.02.03.00-8', 'Sociologia do Desenvolvimento', '0001178', '', 0, '', '1', '1'),
(277, '6.04.01.00-1', 'Fundamentos de Arquitetura e Urbanismo', '0001064', '', 0, '', '1', '1'),
(278, '6.04.01.02-8', 'Teoria da Arquitetura', '0001066', '', 0, '', '1', '1'),
(279, '6.04.01.03-6', 'História do Urbanismo', '0001067', '', 0, '', '1', '1'),
(280, '6.04.01.04-4', 'Teoria do Urbanismo', '0001068', '', 0, '', '1', '1'),
(281, '6.04.02.00-8', 'Projeto de Arquitetuta e Urbanismo', '0001069', '', 0, '', '1', '1'),
(282, '6.04.02.01-6', 'Planejamento e Projetos da Edificação', '0001070', '', 0, '', '1', '1'),
(283, '6.04.00.00-5', 'Arquitetura e Urbanismo', '0001063', '', 1, '', '1', '1'),
(284, '2.08.01.03-3', 'Glicídeos', '0000397', '', 0, '', '1', '1'),
(285, '2.09.03.00-6', 'Biofísica de Processos e Sistemas', '0000405', '', 0, '', '1', '1'),
(286, '2.10.01.00-6', 'Farmacologia Geral', '0000408', '', 0, '', '1', '1'),
(287, '3.01.02.03-0', 'Estruturas Metálicas', '0000448', '', 0, '', '1', '1'),
(288, '3.03.05.00-4', 'Materiais não Metálicos', '0000499', '', 0, '', '1', '1'),
(289, '3.01.05.00-5', 'Infra-Estrutura de Transportes', '0000459', '', 1, '', '1', '1'),
(290, '4.01.01.08-8', 'Pediatria', '0000755', '', 1, '', '1', '1'),
(291, '3.04.01.05-4', 'Materiais e Componentes Eletroóticos e Magnetoóticos, Materiais Fotoelétricos', '0000510', '', 0, '', '1', '1'),
(292, '3.05.04.05-8', 'Máquinas, Motores e Equipamentos', '0000558', '', 0, '', '1', '1'),
(293, '3.05.04.08-2', 'Aproveitamento de Energia', '0000561', '', 0, '', '1', '1'),
(294, '3.07.02.03-8', 'Técnicas Convencionais de Tratamento de Águas', '0000609', '', 0, '', '1', '1'),
(295, '3.07.02.06-2', 'Lay Out de Processos Industriais', '0000612', '', 0, '', '1', '1'),
(296, '3.08.04.05-1', 'Vida Econômica dos Equipamentos', '0000652', '', 0, '', '1', '1'),
(297, '3.10.02.02-1', 'Veículos de Transportes', '0000681', '', 0, '', '1', '1'),
(298, '4.01.01.16-9', 'Fisiatria', '0000763', '', 0, '', '1', '1'),
(299, '5.05.00.00-7', 'Medicina Veterinária', '0000917', '', 1, '', '1', '1'),
(300, '3.01.04.00-9', 'Engenharia Hidráulica', '0000456', '', 1, '', '1', '1'),
(301, '5.07.02.03-3', 'Tecnologia das Bebidas', '0000971', '', 0, '', '1', '1'),
(302, '5.07.01.00-2', 'Ciência de Alimentos', '0000960', '', 1, '', '1', '1'),
(303, '3.13.00.09-x', 'Eletroterapia', '0001445', '', 0, '', '1', '1'),
(304, '1.07.03.00-4', 'Meteorologia', '0000294', '', 1, '', '1', '1'),
(305, '8.01.01.00-3', 'Teoria e Análise Lingüística', '0001331', '', 0, '', '1', '1'),
(306, '3.11.01.02-0', 'Propulsão de Navios', '0000691', '', 0, '', '1', '1'),
(307, '1.01.01.03-9', 'Teoria dos Números', '0000096', '', 0, '', '0', '1'),
(308, '1.01.01.04-7', 'Grupos de Algebra Não-Comutaviva', '0000097', '', 0, '', '0', '1'),
(309, '7.08.01.05-3', 'Economia da Educação', '0001269', '', 0, '', '1', '1'),
(310, '7.08.03.03-0', 'Avaliação de Sistemas, Instituições, Planos e Programas Educacionais', '0001277', '', 0, '', '1', '1'),
(311, '1.07.05.02-3', 'Climatologia Geográfica', '0000312', '', 0, '', '1', '1'),
(312, '1.07.05.03-1', 'Pedologia', '0000313', '', 0, '', '1', '1'),
(313, '1.07.05.04-0', 'Hidrogeografia', '0000314', '', 0, '', '1', '1'),
(314, '1.07.05.05-8', 'Geoecologia', '0000315', '', 0, '', '1', '1'),
(315, '1.07.05.06-6', 'Fotogeografia (Físico-Ecológica)', '0000316', '', 0, '', '1', '1'),
(316, '1.07.05.07-4', 'Geocartografia', '0000317', '', 0, '', '1', '1'),
(317, '1.08.00.00-0', 'Oceanografia', '0000318', '', 0, '', '1', '1'),
(318, '1.08.01.00-6', 'Oceanografia Biológica', '0000319', '', 0, '', '1', '1'),
(319, '1.08.01.01-4', 'Interação entre os Organismos Marinhos e os Parâmetros Ambientais', '0000320', '', 0, '', '1', '1'),
(320, '1.08.02.00-2', 'Oceanografia Física', '0000321', '', 0, '', '1', '1'),
(321, '1.08.02.01-0', 'Variáveis Físicas da Água do Mar', '0000322', '', 0, '', '1', '1'),
(322, '1.08.02.02-9', 'Movimento da Água do Mar', '0000323', '', 0, '', '1', '1'),
(323, '1.07.04.00-0', 'Geodesia', '0000304', '', 1, '', '1', '1'),
(324, '1.07.04.01-9', 'Geodesia Física', '0000305', '', 1, '', '1', '1'),
(325, '1.07.00.00-5', 'GeoCiências', '0000267', '', 1, '', '1', '1'),
(326, '1.01.01.00-4', 'Álgebra', '0000093', '', 1, '', '1', '1'),
(327, '1.01.02.00-0', 'Análise', '0000100', '', 1, '', '1', '1'),
(328, '1.04.02.00-4', 'Astrofísica Estelar', '0000160', '', 0, '', '1', '1'),
(329, '1.01.01.06-3', 'Geometria Algebrica', '0000099', '', 0, '', '0', '1'),
(330, '1.01.01.05-5', 'Algebra Comutativa', '0000098', '', 0, '', '0', '1'),
(331, '1.01.02.01-9', 'Análise Complexa', '0000101', '', 0, '', '0', '1'),
(332, '1.01.02.02-7', 'Análise Funcional', '0000102', '', 0, '', '0', '1'),
(333, '1.04.01.01-6', 'Astronomia Fundamental', '0000158', '', 0, '', '0', '1'),
(334, '1.04.01.02-4', 'Astronomia Dinâmica', '0000159', '', 0, '', '0', '1'),
(335, '1.04.03.00-0', 'Astrofísica do Meio Interestelar', '0000161', '', 0, '', '0', '1'),
(336, '1.04.03.01-9', 'Meio Interestelar', '0000162', '', 0, '', '0', '1'),
(337, '1.04.03.02-7', 'Nebulosa', '0000163', '', 0, '', '0', '1'),
(338, '1.04.04.00-7', 'Astrofísica Extragaláctica', '0000164', '', 0, '', '0', '1'),
(339, '1.04.04.01-5', 'Galáxias', '0000165', '', 0, '', '0', '1'),
(340, '1.04.04.02-3', 'Aglomerados de Galáxias', '0000166', '', 0, '', '0', '1'),
(341, '1.04.04.03-1', 'Quasares', '0000167', '', 0, '', '0', '1'),
(342, '1.04.04.04-0', 'Cosmologia', '0000168', '', 0, '', '0', '1'),
(343, '1.04.05.01-1', 'Física Solar', '0000170', '', 0, '', '0', '1'),
(344, '1.04.05.00-3', 'Astrofísica do Sistema Solar', '0000169', '', 0, '', '0', '1'),
(345, '1.04.05.02-0', 'Movimento da Terra', '0000171', '', 0, '', '0', '1'),
(346, '1.04.05.03-8', 'Sistema Planetário', '0000172', '', 0, '', '0', '1'),
(347, '1.04.06.01-8', 'Astronômia Ótica', '0000174', '', 0, '', '0', '1'),
(348, '1.05.01.01-0', 'Métodos Matemáticos da Física', '0000180', '', 0, '', '0', '1'),
(349, '1.05.01.02-9', 'Física Clássica e Física Quântica (Mecânica e Campos)', '0000181', '', 0, '', '0', '1'),
(350, '1.05.00.00-6', 'Física', '0000178', '', 1, '', '1', '1'),
(351, '1.05.01.00-2', 'Física Geral', '0000179', '', 1, '', '1', '1'),
(352, '1.05.02.01-7', 'Eletricidade e Magnetismo (Campos e Partículas Carregadas)', '0000187', '', 0, '', '1', '1'),
(353, '1.05.02.02-5', 'Ótica', '0000188', '', 0, '', '1', '1'),
(354, '1.05.02.04-1', 'Transferência de Calor (Processos Térmicos e Termodinâmicos)', '0000190', '', 1, '', '1', '1'),
(355, '1.05.02.06-8', 'Dinâmica dos Fluidos', '0000192', '', 1, '', '1', '1'),
(356, '4.02.10.00-X', 'Cirurgia Odontológica', '0001383', '', 0, '', '1', '1'),
(357, '1.05.02.03-3', 'Acústica', '0000189', '', 1, '', '1', '1'),
(358, '1.05.02.00-9', 'Áreas Clássicas de Fenomenologia e suas Aplicações', '0000186', '', 0, '', '1', '1'),
(359, '6.03.06.01-7', 'Treinamento e Alocação de Mão-de-Obra', '0001045', '', 0, '', '1', '1'),
(360, '1.02.01.00-9', 'Probabilidade', '0000119', '', 0, '', '1', '1'),
(361, '1.01.04.00-3', 'Matemática Aplicada', '0000114', '', 1, '', '1', '1'),
(362, '1.01.03.00-7', 'Geometria e Topologia', '0000107', '', 1, '', '1', '1'),
(363, '1.02.00.00-2', 'Probabilidade e Estatística', '0000118', '', 1, '', '1', '1'),
(364, '1.02.01.06-8', 'Processos Estocásticos Especiais', '0000125', '', 0, '', '1', '1'),
(365, '1.01.01.01-2', 'Conjuntos', '0000094', '', 0, '', '0', '1'),
(366, '1.01.02.04-3', 'Equações Diferênciais Ordinárias', '0000104', '', 0, '', '0', '1'),
(367, '1.01.02.06-0', 'Equações Diferênciais Funcionais', '0000106', '', 0, '', '0', '1'),
(368, '1.01.03.01-5', 'Geometria Diferêncial', '0000108', '', 0, '', '0', '1'),
(369, '1.01.03.02-3', 'Topologia Algébrica', '0000109', '', 0, '', '0', '1'),
(370, '1.01.03.03-1', 'Topologia das Variedades', '0000110', '', 0, '', '0', '1'),
(371, '1.01.03.04-0', 'Sistemas Dinâmicos', '0000111', '', 0, '', '0', '1'),
(372, '1.01.03.06-6', 'Teoria das Folheações', '0000113', '', 0, '', '0', '1'),
(373, '1.01.04.01-1', 'Física Matemática', '0000115', '', 0, '', '0', '1'),
(374, '1.01.04.03-8', 'Matemática Discreta e Combinatoria', '0000117', '', 0, '', '0', '1'),
(375, '1.02.01.01-7', 'Teoria Geral e Fundamentos da Probabilidade', '0000120', '', 0, '', '0', '1'),
(376, '1.02.01.02-5', 'Teoria Geral e Processos Estocásticos', '0000121', '', 0, '', '0', '1'),
(377, '1.02.01.03-3', 'Teoremas de Limite', '0000122', '', 0, '', '0', '1'),
(378, '1.02.01.04-1', 'Processos Markovianos', '0000123', '', 0, '', '0', '1'),
(379, '1.02.01.05-0', 'Análise Estocástica', '0000124', '', 0, '', '0', '1'),
(380, '1.02.02.01-3', 'Fundamentos da Estatística', '0000127', '', 0, '', '0', '1'),
(381, '1.02.02.03-0', 'Inferência Nao-Paramétrica', '0000129', '', 0, '', '0', '1'),
(382, '1.02.02.02-1', 'Inferência Paramétrica', '0000128', '', 0, '', '0', '1'),
(383, '1.02.02.04-8', 'Inferência em Processos Estocásticos', '0000130', '', 0, '', '0', '1'),
(384, '1.02.02.05-6', 'Análise Multivariada', '0000131', '', 0, '', '0', '1'),
(385, '1.03.01.02-0', 'Linguagem Formais e Automatos', '0000139', '', 0, '', '0', '1'),
(386, '1.04.06.02-6', 'Radioastronomia', '0000175', '', 0, '', '0', '1'),
(387, '1.04.06.03-4', 'Astronomia Espacial', '0000176', '', 0, '', '0', '1'),
(388, '1.04.06.04-2', 'Processamento de Dados Astronômicos', '0000177', '', 0, '', '0', '1'),
(389, '1.05.01.03-7', 'Relatividade e Gravitação', '0000182', '', 0, '', '0', '1'),
(390, '1.05.01.05-3', 'Metrologia, Técnicas Gerais de Laboratório, Sistema de Instrumentação', '0000184', '', 0, '', '0', '1'),
(391, '7.09.05.01-0', 'Política Externa do Brasil', '0001320', '', 0, '', '1', '1'),
(392, '4.02.13.00-X', 'Dentística', '0001386', '', 1, '', '1', '1'),
(393, '7.07.01.00-8', 'Fundamentos e Medidas da Psicologia', '0001218', '', 0, '', '1', '1'),
(394, '7.07.02.03-9', 'Processos Cognitivos e Atencionais', '0001226', '', 0, '', '1', '1'),
(395, '7.07.03.01-9', 'Neurologia, Eletrofisiologia e Comportamento', '0001229', '', 0, '', '1', '1'),
(396, '1.07.01.09-5', 'Hidrogeologia', '0000277', '', 0, '', '1', '1'),
(397, '1.07.01.10-9', 'Prospecção Mineral', '0000278', '', 0, '', '1', '1'),
(398, '1.07.01.11-7', 'Sedimentologia', '0000279', '', 0, '', '1', '1'),
(399, '1.07.01.12-5', 'Paleontologia Estratigráfica', '0000280', '', 0, '', '1', '1'),
(400, '1.07.01.14-1', 'Geologia Ambiental', '0000282', '', 0, '', '1', '1'),
(401, '1.07.02.00-8', 'Geofísica', '0000283', '', 0, '', '1', '1'),
(402, '1.07.02.01-6', 'Geomagnetismo', '0000284', '', 0, '', '1', '1'),
(403, '1.07.03.08-0', 'Sensoriamento Remoto da Atmosfera', '0000302', '', 0, '', '1', '1'),
(404, '1.07.04.02-7', 'Geodesia Geométrica', '0000306', '', 0, '', '1', '1'),
(405, '1.02.03.00-1', 'Probabilidade e Estatística Aplicadas', '0000135', '', 0, '', '1', '1'),
(406, '1.05.03.00-5', 'Física das Partículas Elementares e Campos', '0000193', '', 0, '', '1', '1'),
(407, '1.05.03.01-3', 'Teoria Geral de Partículas e Campos', '0000194', '', 0, '', '1', '1'),
(408, '1.05.03.02-1', 'Teorias Específicas e Modelos de Interação (Sistematica de Partículas, Raios Cósmicos)', '0000195', '', 0, '', '1', '1'),
(409, '1.05.03.03-0', 'Reações Específicas e Fenomiologia de Partículas', '0000196', '', 0, '', '1', '1'),
(410, '1.05.04.06-0', 'Métodos Experimentais e Instrumentação para Partículas Elementares e Física Nuclear', '0000204', '', 0, '', '1', '1'),
(411, '1.01.04.02-0', 'Análise Numérica', '0000116', '', 0, '', '0', '1'),
(412, '1.05.04.01-0', 'Estrutura Nuclear', '0000199', '', 0, '', '0', '1'),
(413, '1.05.05.01-6', 'Estrutura Eletrônica de Átomos e Moléculas (Teoria)', '0000206', '', 0, '', '1', '1'),
(414, '1.05.04.00-1', 'Física Nuclear', '0000198', '', 0, '', '0', '1'),
(415, '1.05.04.02-8', 'Desintegração Nuclear e Radioatividade', '0000200', '', 0, '', '0', '1'),
(416, '1.05.04.03-6', 'Reações Nucleares e Espalhamento Geral', '0000201', '', 0, '', '0', '1'),
(417, '1.05.04.04-4', 'Reações Nucleares e Espalhamento (Reações Específicas)', '0000202', '', 0, '', '0', '1'),
(418, '1.05.04.05-2', 'Propriedades de Núcleos Específicos', '0000203', '', 0, '', '0', '1'),
(419, '1.05.05.00-8', 'Física Atômica e Molécular', '0000205', '', 1, '', '1', '1'),
(420, '4.01.02.15-X', 'Cirurgia Vascular', '0001389', '', 1, '', '1', '1'),
(421, '1.08.03.02-5', 'Interações Químico-Biológicas/Geológ. Sub. Quím. da Água do Mar', '0000329', '', 0, '', '1', '1'),
(422, '1.05.05.03-2', 'Espectros Moléculares e Interações de Fótons com Moléculas', '0000208', '', 0, '', '1', '1'),
(423, '1.05.05.04-0', 'Processos de Colisão e Interações de Átomos e Moléculas', '0000209', '', 0, '', '1', '1'),
(424, '1.05.05.05-9', 'Inf.Sobre Átomos e Moléculas Obtidos Experimentalmente (Instrumentação e Técnicas)', '0000210', '', 0, '', '1', '1'),
(425, '1.05.05.06-7', 'Estudos de Átomos e Moléculas Especiais', '0000211', '', 0, '', '1', '1'),
(426, '1.05.06.00-4', 'Física dos Fluidos, Física de Plasmas e Descargas Elétricas', '0000212', '', 0, '', '1', '1'),
(427, '1.05.06.01-2', 'Cinética e Teoria de Transporte de Fluidos (Propriedades Físicas de Gases)', '0000213', '', 0, '', '1', '1'),
(428, '1.05.06.02-0', 'Física de Plasmas e Descargas Elétricas', '0000214', '', 0, '', '1', '1'),
(429, '1.05.07.00-0', 'Física da Matéria Condensada', '0000215', '', 0, '', '1', '1'),
(430, '1.05.07.01-9', 'Estrutura de Líquidos e Sólidos (Cristalografia)', '0000216', '', 0, '', '1', '1'),
(431, '1.05.07.02-7', 'Propriedades Mecânicas e Acústicas da Matéria Condensada', '0000217', '', 0, '', '1', '1'),
(432, '1.05.07.03-5', 'Dinâmica da Rede e Estatística de Cristais', '0000218', '', 0, '', '1', '1'),
(433, '1.05.07.04-3', 'Equação de Estado, Equilíbrio de Fases e Transições de Fase', '0000219', '', 0, '', '1', '1'),
(434, '1.05.07.05-1', 'Propriedades Térmicas da Matéria Condensada', '0000220', '', 0, '', '1', '1'),
(435, '1.05.07.06-0', 'Propriedades de Transportes de Matéria Condensada (Não Eletrônicas)', '0000221', '', 0, '', '1', '1'),
(436, '1.05.07.07-8', 'Campos Quânticos e Sólidos, Hélio, Líquido, Sólido', '0000222', '', 0, '', '1', '1'),
(437, '4.01.01.19-X', 'Urologia', '0001388', '', 1, '', '1', '1'),
(438, '7.10.04.00-9', 'Teologia Pastoral', '0001328', '', 1, '', '1', '1'),
(439, '1.05.07.08-6', 'Superfícies e Interfaces (Películas e Filamentos)', '0000223', '', 0, '', '1', '1'),
(440, '1.05.07.09-4', 'Estados Eletrônicos', '0000224', '', 0, '', '1', '1'),
(441, '1.05.07.11-6', 'Estruturas Eletrônicas e Propriedades Elétricas de Superfícies Interfaces e Películas', '0000226', '', 0, '', '1', '1'),
(442, '1.05.07.12-4', 'Supercondutividade', '0000227', '', 0, '', '1', '1'),
(443, '1.05.07.13-2', 'Materiais Magnéticos e Propriedades Magnéticas', '0000228', '', 0, '', '1', '1'),
(444, '1.05.07.14-0', 'Ressonância Mag.e Relax.Na Mat.Condens (Efeitos Mosbauer, Corr.Ang.Pertubada)', '0000229', '', 0, '', '1', '1'),
(445, '1.05.07.15-9', 'Materiais Dielétricos e Propriedades Dielétricas', '0000230', '', 0, '', '1', '1'),
(446, '1.05.07.16-7', 'Prop.Óticas e Espectrosc.da Mat.Condens (Outras Inter.da Mat.Com Rad.e Part.)', '0000231', '', 0, '', '1', '1'),
(447, '1.05.07.17-5', 'Emissão Eletrônica e Iônica por Líquidos e Sólidos (Fenômenos de Impacto)', '0000232', '', 0, '', '1', '1'),
(448, '1.06.03.00-0', 'Fisico-Química', '0000250', '', 1, '', '1', '1'),
(449, '1.06.01.01-5', 'Estrutura, Conformação e Estereoquímica', '0000235', '', 0, '', '1', '1'),
(450, '1.06.00.00-0', 'Química', '0000233', '', 1, '', '1', '1'),
(451, '1.06.01.02-3', 'Sintese Orgânica', '0000236', '', 0, '', '1', '1'),
(452, '1.06.01.03-1', 'Fisico-Química Orgânica', '0000237', '', 0, '', '1', '1'),
(453, '1.06.01.04-0', 'Fotoquímica Orgânica', '0000238', '', 0, '', '1', '1'),
(454, '2.00.00.00-0', 'Ciências Biológicas', '0000335', '', 0, '', '1', '1'),
(455, '1.06.01.06-6', 'Evolução, Sistemática e Ecologia Química', '0000240', '', 0, '', '1', '1'),
(456, '1.06.01.07-4', 'Polimeros e Colóides', '0000241', '', 0, '', '1', '1'),
(457, '1.06.01.00-7', 'Química Orgânica', '0000234', '', 1, '', '1', '1'),
(458, '1.06.02.02-0', 'Não-Metais e Seus Compostos', '0000244', '', 0, '', '1', '1'),
(459, '1.06.02.00-3', 'Química Inorgânica', '0000242', '', 1, '', '1', '1'),
(460, '1.07.02.10-5', 'Gravimetria', '0000293', '', 0, '', '1', '1'),
(461, '1.07.03.01-2', 'Meteorologia Dinâmica', '0000295', '', 0, '', '1', '1'),
(462, '1.07.03.02-0', 'Meteorologia Sinótica', '0000296', '', 0, '', '1', '1'),
(463, '1.07.03.03-9', 'Meteorologia Física', '0000297', '', 0, '', '1', '1'),
(464, '1.07.03.04-7', 'Química da Atmosfera', '0000298', '', 0, '', '1', '1'),
(465, '1.07.03.05-5', 'Instrumentação Meteorológica', '0000299', '', 0, '', '1', '1'),
(466, '1.07.03.06-3', 'Climatologia', '0000300', '', 0, '', '1', '1'),
(467, '1.07.03.07-1', 'Micrometeorologia', '0000301', '', 0, '', '1', '1'),
(468, '1.07.01.02-8', 'Petrologia', '0000270', '', 0, '', '1', '1'),
(469, '1.07.01.03-6', 'Geoquímica', '0000271', '', 0, '', '1', '1'),
(470, '1.07.01.04-4', 'Geologia Regional', '0000272', '', 0, '', '1', '1'),
(471, '1.07.01.05-2', 'Geotectônica', '0000273', '', 0, '', '1', '1'),
(472, '1.07.02.02-4', 'Sismologia', '0000285', '', 0, '', '1', '1'),
(473, '1.07.02.03-2', 'Geotermia e Fluxo Térmico', '0000286', '', 0, '', '1', '1'),
(474, '1.07.02.04-0', 'Propriedades Físicas das Rochas', '0000287', '', 0, '', '1', '1'),
(475, '1.07.02.05-9', 'Geofísica Nuclear', '0000288', '', 0, '', '1', '1'),
(476, '1.07.02.07-5', 'Aeronomia', '0000290', '', 0, '', '1', '1'),
(477, '1.07.02.08-3', 'Desenvolvimento de Instrumentação Geofísica', '0000291', '', 0, '', '1', '1'),
(478, '1.08.02.03-7', 'Origem das Massas de Água', '0000324', '', 0, '', '1', '1'),
(479, '1.08.02.04-5', 'Interação do Oceano com o Leito do Mar', '0000325', '', 0, '', '1', '1'),
(480, '1.08.02.05-3', 'Interação do Oceano com a Atmosfera', '0000326', '', 0, '', '1', '1'),
(481, '2.01.00.00-0', 'Biologia Geral', '0000336', '', 1, '', '1', '1'),
(482, '2.03.00.00-0', 'Botânica', '0000344', '', 1, '', '1', '1'),
(483, '1.07.03.09-8', 'Meteorologia Aplicada', '0000303', '', 0, '', '1', '1'),
(484, '1.07.04.03-5', 'Geodesia Celeste', '0000307', '', 0, '', '1', '1'),
(485, '1.07.02.06-7', 'Sensoriamento Remoto', '0000289', '', 1, '', '1', '1'),
(486, '1.07.04.04-3', 'Fotogrametria', '0000308', '', 0, '', '1', '1'),
(487, '1.07.04.05-1', 'Cartografia Básica', '0000309', '', 0, '', '1', '1'),
(488, '1.07.05.00-7', 'Geografia Física', '0000310', '', 0, '', '1', '1'),
(489, '1.08.03.00-9', 'Oceanografia Química', '0000327', '', 0, '', '1', '1'),
(490, '1.08.03.01-7', 'Propriedades Químicas da Água do Mar', '0000328', '', 0, '', '1', '1'),
(491, '1.08.04.00-5', 'Oceanografia Geológica', '0000330', '', 0, '', '1', '1'),
(492, '1.08.04.01-3', 'Geomorfologia Submarina', '0000331', '', 0, '', '1', '1'),
(493, '1.08.04.02-1', 'Sedimentologia Marinha', '0000332', '', 0, '', '1', '1'),
(494, '1.08.04.03-0', 'Geofísica Marinha', '0000333', '', 0, '', '1', '1'),
(495, '1.08.04.04-8', 'Geoquímica Marinha', '0000334', '', 0, '', '1', '1'),
(496, '2.04.04.00-0', 'Comportamento Animal', '0000364', '', 0, '', '1', '1'),
(497, '2.04.05.00-6', 'Taxonomia dos Grupos Recentes', '0000365', '', 0, '', '1', '1'),
(498, '2.04.06.00-2', 'Zoologia Aplicada', '0000366', '', 0, '', '1', '1'),
(499, '2.04.06.01-0', 'Conservação das Espécies Animais', '0000367', '', 0, '', '1', '1'),
(500, '2.04.06.02-9', 'Utilização dos Animais', '0000368', '', 0, '', '1', '1'),
(501, '2.04.06.03-7', 'Controle Populacional de Animais', '0000369', '', 0, '', '1', '1'),
(502, '2.04.00.00-4', 'Zoologia', '0000360', '', 1, '', '1', '1'),
(503, '2.05.01.00-5', 'Ecologia Teórica', '0000371', '', 0, '', '1', '1'),
(504, '2.06.04.02-5', 'Anatomia Animal', '0000380', '', 1, '', '1', '1'),
(505, '2.05.00.00-9', 'Ecologia', '0000370', '', 1, '', '1', '1'),
(506, '2.06.02.00-6', 'Embriologia', '0000376', '', 0, '', '1', '1'),
(507, '2.06.03.00-2', 'Histologia', '0000377', '', 0, '', '1', '1'),
(508, '2.06.04.00-9', 'Anatomia', '0000378', '', 0, '', '1', '1'),
(509, '2.06.00.00-3', 'Morfologia', '0000374', '', 1, '', '1', '1'),
(510, '2.07.01.00-4', 'Fisiologia Geral', '0000382', '', 0, '', '1', '1'),
(511, '2.07.02.00-0', 'Fisiologia de Órgaos e Sistemas', '0000383', '', 0, '', '1', '1'),
(512, '2.07.02.01-9', 'Neurofisiologia', '0000384', '', 0, '', '1', '1'),
(513, '2.07.02.03-5', 'Fisiologia da Respiração', '0000386', '', 0, '', '1', '1'),
(514, '2.07.02.04-3', 'Fisiologia Renal', '0000387', '', 0, '', '1', '1'),
(515, '2.07.00.00-8', 'Fisiologia', '0000381', '', 1, '', '1', '1'),
(516, '2.08.01.00-9', 'Química de Macromoléculas', '0000394', '', 0, '', '1', '1'),
(517, '2.08.01.02-5', 'Lipídeos', '0000396', '', 0, '', '1', '1'),
(518, '2.08.02.00-5', 'Bioquímica dos Microorganismos', '0000398', '', 0, '', '1', '1'),
(519, '2.08.03.00-1', 'Metabolismo e Bioenergética', '0000399', '', 0, '', '1', '1'),
(520, '2.09.01.00-3', 'Biofísica Molecular', '0000403', '', 0, '', '1', '1'),
(521, '2.08.00.00-2', 'Bioquímica', '0000393', '', 1, '', '1', '1'),
(522, '2.08.04.00-8', 'Biologia Molecular', '0000400', '', 1, '', '1', '1'),
(523, '2.08.05.00-4', 'Enzimologia', '0000401', '', 0, '', '1', '1'),
(524, '2.09.00.00-7', 'Biofísica', '0000402', '', 1, '', '1', '1'),
(525, '3.01.01.00-0', 'Construção Civil', '0000441', '', 0, '', '1', '1'),
(526, '2.10.01.01-4', 'Farmacocinética', '0000409', '', 0, '', '1', '1'),
(527, '2.10.01.02-2', 'Biodisponibilidade', '0000410', '', 0, '', '1', '1'),
(528, '2.10.02.00-2', 'Farmacologia Autonômica', '0000411', '', 0, '', '1', '1'),
(529, '2.05.03.00-8', 'Ecologia Aplicada', '0000373', '', 1, '', '1', '1'),
(530, '2.06.01.00-0', 'Citologia e Biologia Celular', '0000375', '', 1, '', '1', '1'),
(531, '2.06.04.01-7', 'Anatomia Humana', '0000379', '', 1, '', '1', '1'),
(532, '2.07.02.02-7', 'Fisiologia Cardiovascular', '0000385', '', 1, '', '1', '1'),
(533, '2.10.03.00-9', 'Neuropsicofarmacologia', '0000412', '', 0, '', '1', '1'),
(534, '2.10.04.00-5', 'Farmacologia Cardiorenal', '0000413', '', 0, '', '1', '1'),
(535, '2.10.05.00-1', 'Farmacologia Bioquímica e Molecular', '0000414', '', 0, '', '1', '1'),
(536, '3.00.00.00-9', 'Engenharias', '0000439', '', 0, '', '1', '1'),
(537, '2.10.07.00-4', 'Toxicologia', '0000416', '', 0, '', '1', '1'),
(538, '2.10.00.00-0', 'Farmacologia', '0000407', '', 1, '', '1', '1'),
(539, '2.11.01.00-0', 'Imunoquímica', '0000419', '', 0, '', '1', '1'),
(540, '2.11.02.00-7', 'Imunologia Celular', '0000420', '', 0, '', '1', '1'),
(541, '2.11.03.00-3', 'Imunogenética', '0000421', '', 0, '', '1', '1'),
(542, '2.11.00.00-4', 'Imunologia', '0000418', '', 1, '', '1', '1'),
(543, '2.12.01.00-5', 'Biologia e Fisiologia dos Microorganismos', '0000424', '', 0, '', '1', '1'),
(544, '2.12.01.02-1', 'Bacterologia', '0000426', '', 0, '', '1', '1'),
(545, '2.12.01.03-0', 'Micologia', '0000427', '', 0, '', '1', '1'),
(546, '2.12.02.02-8', 'Microbiologia Industrial e de Fermentação', '0000430', '', 0, '', '1', '1'),
(547, '2.12.00.00-9', 'Microbiologia', '0000423', '', 1, '', '1', '1'),
(548, '2.13.01.00-0', 'Protozoologia de Parasitos', '0000432', '', 0, '', '1', '1'),
(549, '2.13.01.01-8', 'Protozoologia Parasitária Humana', '0000433', '', 0, '', '1', '1'),
(550, '2.13.01.02-6', 'Protozoologia Parasitária Animal', '0000434', '', 0, '', '1', '1'),
(551, '2.13.02.00-6', 'Helmintologia de Parasitos', '0000435', '', 0, '', '1', '1'),
(552, '2.13.02.01-4', 'Helmintologia Humana', '0000436', '', 0, '', '1', '1'),
(553, '2.13.02.02-2', 'Helmintologia Animal', '0000437', '', 0, '', '1', '1'),
(554, '2.13.03.00-2', 'Entomologia e Malacologia de Parasitos e Vetores', '0000438', '', 0, '', '1', '1'),
(555, '2.13.00.00-3', 'Parasitologia', '0000431', '', 1, '', '1', '1'),
(556, '3.01.00.00-3', 'Engenharia Civil', '0000440', '', 1, '', '1', '1'),
(557, '3.01.01.02-6', 'Processos Construtivos', '0000443', '', 0, '', '1', '1'),
(558, '3.01.01.03-4', 'Instalações Prediais', '0000444', '', 0, '', '1', '1'),
(559, '3.01.02.00-6', 'Estruturas', '0000445', '', 0, '', '1', '1'),
(560, '3.01.02.01-4', 'Estruturas de Concreto', '0000446', '', 0, '', '1', '1'),
(561, '3.01.02.04-9', 'Mecânica das Estruturas', '0000449', '', 0, '', '1', '1'),
(562, '3.01.03.02-9', 'Mecânicas das Rochas', '0000452', '', 0, '', '1', '1'),
(563, '3.01.03.04-5', 'Obras de Terra e Enrocamento', '0000454', '', 0, '', '1', '1'),
(564, '3.01.03.05-3', 'Pavimentos', '0000455', '', 0, '', '1', '1'),
(565, '3.01.04.02-5', 'Hidrologia', '0000458', '', 0, '', '1', '1'),
(566, '3.01.05.01-3', 'Aeroportos (Projeto e Construção)', '0000460', '', 0, '', '1', '1'),
(567, '3.01.05.02-1', 'Ferrovias (Projetos e Construção)', '0000461', '', 0, '', '1', '1'),
(568, '3.01.05.03-0', 'Portos e Vias Nevegáveis (Projeto e Construção)', '0000462', '', 0, '', '1', '1'),
(569, '3.01.05.04-8', 'Rodovias (Projeto e Construção)', '0000463', '', 0, '', '1', '1'),
(570, '3.03.01.00-9', 'Instalações e Equipamentos Metalúrgicos', '0000476', '', 0, '', '1', '1'),
(571, '2.10.08.00-0', 'Farmacologia Clínica', '0000417', '', 1, '', '1', '1'),
(572, '2.11.04.00-0', 'Imunologia Aplicada', '0000422', '', 1, '', '1', '1'),
(573, '2.12.01.01-3', 'Virologia', '0000425', '', 1, '', '1', '1'),
(574, '2.12.02.00-1', 'Microbiologia Aplicada', '0000428', '', 1, '', '1', '1'),
(575, '2.12.02.01-0', 'Microbiologia Médica', '0000429', '', 1, '', '1', '1'),
(576, '3.01.01.01-8', 'Materiais e Componentes de Construção', '0000442', '', 1, '', '1', '1'),
(577, '3.01.03.00-2', 'Geotécnica', '0000450', '', 1, '', '1', '1'),
(578, '3.01.03.01-0', 'Fundações e Escavações', '0000451', '', 1, '', '1', '1'),
(579, '3.02.01.00-4', 'Pesquisa Mineral', '0000465', '', 0, '', '1', '1'),
(580, '3.02.01.01-2', 'Caracterização do Minério', '0000466', '', 0, '', '1', '1'),
(581, '3.02.01.02-0', 'Dimensionamento de Jazidas', '0000467', '', 0, '', '1', '1'),
(582, '3.02.02.00-0', 'Lavra', '0000468', '', 0, '', '1', '1'),
(583, '3.02.02.01-9', 'Lavra a Céu Aberto', '0000469', '', 0, '', '1', '1'),
(584, '3.02.02.02-7', 'Lavra de Mina Subterrânea', '0000470', '', 0, '', '1', '1'),
(585, '3.02.02.03-5', 'Equipamentos de Lavra', '0000471', '', 0, '', '1', '1'),
(586, '3.02.03.00-7', 'Tratamento de Minérios', '0000472', '', 0, '', '1', '1'),
(587, '3.02.03.01-5', 'Métodos de Concentração e Enriquecimento de Minérios', '0000473', '', 0, '', '1', '1'),
(588, '3.02.03.02-3', 'Equipamentos de Beneficiamento de Minérios', '0000474', '', 0, '', '1', '1'),
(589, '3.03.01.01-7', 'Instalações Metalúrgicas', '0000477', '', 0, '', '1', '1'),
(590, '3.03.01.02-5', 'Equipamentos Metalúrgicos', '0000478', '', 0, '', '1', '1'),
(591, '3.03.02.00-5', 'Metalurgia Extrativa', '0000479', '', 0, '', '1', '1'),
(592, '3.03.02.01-3', 'Aglomeração', '0000480', '', 0, '', '1', '1'),
(593, '3.03.02.02-1', 'Eletrometalurgia', '0000481', '', 0, '', '1', '1'),
(594, '3.03.02.03-0', 'Hidrometalurgia', '0000482', '', 0, '', '1', '1'),
(595, '3.03.02.04-8', 'Pirometalurgia', '0000483', '', 0, '', '1', '1'),
(596, '3.03.02.05-6', 'Tratamento de Minérios', '0000484', '', 0, '', '1', '1'),
(597, '3.03.03.01-0', 'Conformação Mecânica', '0000486', '', 0, '', '1', '1'),
(598, '3.03.03.00-1', 'Metalurgia de Transformação', '0000485', '', 0, '', '1', '1'),
(599, '3.03.03.02-8', 'Fundição', '0000487', '', 0, '', '1', '1'),
(600, '3.03.03.03-6', 'Metalurgia de Po', '0000488', '', 0, '', '1', '1'),
(601, '3.03.03.04-4', 'Recobrimentos', '0000489', '', 0, '', '1', '1'),
(602, '3.03.03.05-2', 'Soldagem', '0000490', '', 0, '', '1', '1'),
(603, '3.03.03.07-9', 'Usinagem', '0000492', '', 0, '', '1', '1'),
(604, '3.03.04.00-8', 'Metalurgia Fisica', '0000493', '', 0, '', '1', '1'),
(605, '3.03.04.01-6', 'Estrutura dos Metais e Ligas', '0000494', '', 0, '', '1', '1'),
(606, '3.03.04.02-4', 'Propriedades Físicas dos Metais e Ligas', '0000495', '', 0, '', '1', '1');
INSERT INTO `ajax_areadoconhecimento` (`id_aa`, `a_cnpq`, `a_descricao`, `a_codigo`, `a_geral`, `a_semic`, `a_ativo`, `a_submit`, `a_journal`) VALUES
(607, '3.03.04.03-2', 'Propriedades Mecânicas dos Metais e Ligas', '0000496', '', 0, '', '1', '1'),
(608, '3.03.04.05-9', 'Corrosão', '0000498', '', 0, '', '1', '1'),
(609, '3.03.05.01-2', 'Extração e Transformação de Materiais', '0000500', '', 0, '', '1', '1'),
(610, '3.03.05.02-0', 'Cerâmicos', '0000501', '', 0, '', '1', '1'),
(611, '3.03.05.03-9', 'Materiais Conjugados não Metálicos', '0000502', '', 0, '', '1', '1'),
(612, '3.04.01.00-3', 'Materiais Elétricos', '0000505', '', 0, '', '1', '1'),
(613, '3.04.01.01-1', 'Materiais Condutores', '0000506', '', 0, '', '1', '1'),
(614, '3.03.00.00-2', 'Engenharia de Materiais e Metalúrgica', '0000475', '', 1, '', '1', '1'),
(615, '3.04.00.00-7', 'Engenharia Elétrica', '0000504', '', 1, '', '1', '1'),
(616, '3.02.00.00-8', 'Engenharia de Minas', '0000464', '', 0, '', '1', '1'),
(617, '3.04.01.04-6', 'Materiais Dielétricos, Piesoelétricos e Ferroelétricos', '0000509', '', 0, '', '1', '1'),
(618, '3.04.01.06-2', 'Materiais e Dispositivos Magnéticos', '0000511', '', 0, '', '1', '1'),
(619, '3.04.02.00-0', 'Medidas Elétricas, Magnéticas e Eletrônicas (Instrumentação)', '0000512', '', 0, '', '1', '1'),
(620, '3.04.02.01-8', 'Medidas Elétricas', '0000513', '', 0, '', '1', '1'),
(621, '3.04.02.02-6', 'Medidas Magnéticas', '0000514', '', 0, '', '1', '1'),
(622, '3.04.02.03-4', 'Instrumentação Eletromecânica', '0000515', '', 0, '', '1', '1'),
(623, '3.04.02.04-2', 'Instrumentação Eletrônica', '0000516', '', 0, '', '1', '1'),
(624, '3.03.05.04-7', 'Polímeros, Aplicações', '0000503', '', 1, '', '1', '1'),
(625, '3.04.02.05-0', 'Sistemas Eletrônicos de Medida e de Controle', '0000517', '', 1, '', '1', '1'),
(626, '3.04.03.00-6', 'Circuitos Elétricos, Magnéticos e Eletrônicos', '0000518', '', 0, '', '1', '1'),
(627, '3.04.03.01-4', 'Teoria Geral dos Circuitos Elétricos', '0000519', '', 0, '', '1', '1'),
(628, '3.04.03.02-2', 'Circuitos Lineares e Não-Lineares', '0000520', '', 0, '', '1', '1'),
(629, 'XXXXXX', 'XXXX', '0000548', '', 0, '', '0', '1'),
(630, '3.04.03.04-9', 'Circuitos Magnéticos, Magnetismos, Eletromagnetismo', '0000522', '', 0, '', '1', '1'),
(631, '3.04.04.00-2', 'Sistemas Elétricos de Potência', '0000523', '', 0, '', '1', '1'),
(632, '3.04.04.01-0', 'Geração da Energia Elétrica', '0000524', '', 0, '', '1', '1'),
(633, '3.04.04.02-9', 'Transmissão da Energia Elétrica, Distribuição da Energia Elétrica', '0000525', '', 0, '', '1', '1'),
(634, '3.04.04.03-7', 'Conversão e Retificação da Energia Elétrica', '0000526', '', 0, '', '1', '1'),
(635, '3.04.04.04-5', 'Medição, Controle, Correção e Proteção de Sistemas Elétricos de Potência', '0000527', '', 0, '', '1', '1'),
(636, '3.04.04.05-3', 'Máquinas Elétricas e Dispositivos de Potência', '0000528', '', 0, '', '1', '1'),
(637, '3.04.04.06-1', 'Instalações Elétricas Prediais e Industriais', '0000529', '', 0, '', '1', '1'),
(638, '3.04.05.00-9', 'Eletrônica Industrial, Sistemas e Controles Eletrônicos', '0000530', '', 0, '', '1', '1'),
(639, '3.04.05.01-7', 'Eletrônica Industrial', '0000531', '', 0, '', '1', '1'),
(640, '3.04.05.03-3', 'Controle de Processos Eletrônicos, Retroalimentação', '0000533', '', 0, '', '1', '1'),
(641, '3.04.06.00-5', 'Telecomunicações', '0000534', '', 0, '', '1', '1'),
(642, '3.04.06.01-3', 'Teoria Eletromagnética, Microondas, Propagação de Ondas, Antenas', '0000535', '', 0, '', '1', '1'),
(643, '3.04.06.02-1', 'Radionavegação e Radioastronomia', '0000536', '', 0, '', '1', '1'),
(644, '3.04.06.03-0', 'Sistemas de Telecomunicações', '0000537', '', 0, '', '1', '1'),
(645, '3.05.01.00-8', 'Fenômenos de Transporte', '0000539', '', 0, '', '1', '1'),
(646, '3.05.01.01-6', 'Transferência de Calor', '0000540', '', 0, '', '1', '1'),
(647, '3.05.00.00-1', 'Engenharia Mecânica', '0000538', '', 1, '', '1', '1'),
(648, '3.05.01.02-4', 'Mecânica dos Fluidos', '0000541', '', 0, '', '1', '1'),
(649, '3.05.01.03-2', 'Dinâmica dos Gases', '0000542', '', 0, '', '1', '1'),
(650, '3.05.02.01-2', 'Termodinâmica', '0000545', '', 0, '', '1', '1'),
(651, '3.05.02.03-9', 'Aproveitamento da Energia', '0000547', '', 0, '', '1', '1'),
(652, '3.05.02.00-4', 'Engenharia Térmica', '0000544', '', 1, '', '1', '1'),
(653, '3.05.03.03-5', 'Análise de Tensões', '0000551', '', 0, '', '1', '1'),
(654, '3.05.03.04-3', 'Termoelasticidade', '0000552', '', 0, '', '1', '1'),
(655, '3.05.04.00-7', 'Projetos de Máquinas', '0000553', '', 0, '', '1', '1'),
(656, '3.05.04.01-5', 'Teoria dos Mecanismos', '0000554', '', 0, '', '1', '1'),
(657, '3.05.04.02-3', 'Estática e Dinâmica Aplicada', '0000555', '', 0, '', '1', '1'),
(658, '3.05.04.03-1', 'Elementos de Máquinas', '0000556', '', 0, '', '1', '1'),
(659, '3.05.04.04-0', 'Fundamentos Gerais de Projetos das Máquinas', '0000557', '', 0, '', '1', '1'),
(660, '3.05.04.07-4', 'Controle de Sistemas Mecânicos', '0000560', '', 0, '', '1', '1'),
(661, '3.05.05.00-3', 'Processos de Fabricação', '0000562', '', 0, '', '1', '1'),
(662, '3.05.05.01-1', 'Matrizes e Ferramentas', '0000563', '', 0, '', '1', '1'),
(663, '3.05.05.02-0', 'Máquinas de Usinagem e Conformação', '0000564', '', 0, '', '1', '1'),
(664, '3.05.05.03-8', 'Controle Numérico', '0000565', '', 0, '', '1', '1'),
(665, '3.05.05.04-6', 'Robotização', '0000566', '', 0, '', '1', '1'),
(666, '3.05.05.05-4', 'Processos de Fabricação, Seleção Econômica', '0000567', '', 0, '', '1', '1'),
(667, '3.06.01.00-2', 'Processos Industriais de Engenharia Química', '0000569', '', 0, '', '1', '1'),
(668, '3.06.01.01-0', 'Processos Bioquimicos', '0000570', '', 0, '', '1', '1'),
(669, '3.06.00.00-6', 'Engenharia Química', '0000568', '', 1, '', '1', '1'),
(670, '3.04.05.02-5', 'Automação Eletrônica de Processos Elétricos e Industriais', '0000532', '', 1, '', '1', '1'),
(671, '3.05.02.02-0', 'Controle Ambiental', '0000546', '', 1, '', '1', '1'),
(672, '3.05.03.01-9', 'Mecânica dos Corpos Sólidos, Elásticos e Plásticos', '0000549', '', 1, '', '1', '1'),
(673, '3.06.01.02-9', 'Processos Orgânicos', '0000571', '', 0, '', '1', '1'),
(674, '3.06.01.03-7', 'Processos Inorgânicos', '0000572', '', 0, '', '1', '1'),
(675, '3.06.02.02-5', 'Operações Características de Processos Bioquímicos', '0000575', '', 0, '', '1', '1'),
(676, '3.06.02.03-3', 'Operações de Separação e Mistura', '0000576', '', 0, '', '1', '1'),
(677, '3.06.02.00-9', 'Operações Industriais e Equipamentos para Engenharia Química', '0000573', '', 0, '', '1', '1'),
(678, '3.06.03.01-3', 'Balancos Globais de Matéria e Energia', '0000578', '', 0, '', '1', '1'),
(679, '3.06.03.02-1', 'Água', '0000579', '', 0, '', '1', '1'),
(680, '3.06.03.03-0', 'Álcool', '0000580', '', 0, '', '1', '1'),
(681, '3.06.03.04-8', 'Alimentos', '0000581', '', 0, '', '1', '1'),
(682, '3.06.03.05-6', 'Borrachas', '0000582', '', 0, '', '1', '1'),
(683, '3.06.03.06-4', 'Carvão', '0000583', '', 0, '', '1', '1'),
(684, '3.06.03.07-2', 'Cerâmica', '0000584', '', 0, '', '1', '1'),
(685, '3.06.03.08-0', 'Cimento', '0000585', '', 0, '', '1', '1'),
(686, '3.06.03.09-9', 'Couro', '0000586', '', 0, '', '1', '1'),
(687, '3.06.03.10-2', 'Detergentes', '0000587', '', 0, '', '1', '1'),
(688, '3.06.03.11-0', 'Fertilizantes', '0000588', '', 0, '', '1', '1'),
(689, '3.06.03.12-9', 'Medicamentos', '0000589', '', 0, '', '1', '1'),
(690, '3.06.03.13-7', 'Metais não-Ferrosos', '0000590', '', 0, '', '1', '1'),
(691, '3.06.03.17-0', 'Polímeros', '0000594', '', 0, '', '1', '1'),
(692, '3.06.03.18-8', 'Produtos Naturais', '0000595', '', 0, '', '1', '1'),
(693, '3.06.03.19-6', 'Têxteis', '0000596', '', 0, '', '1', '1'),
(694, '3.06.03.20-0', 'Tratamentos e Aproveitamento de Rejeitos', '0000597', '', 0, '', '1', '1'),
(695, '3.06.03.21-8', 'Xisto', '0000598', '', 0, '', '1', '1'),
(696, '3.07.01.02-3', 'Tecnologia e Problemas Sanitários de Irrigação', '0000602', '', 0, '', '1', '1'),
(697, '3.07.00.00-0', 'Engenharia Sanitária', '0000599', '', 1, '', '1', '1'),
(698, '3.07.01.03-1', 'Águas Subterrâneas e Poços Profundos', '0000603', '', 0, '', '1', '1'),
(699, '3.07.01.04-0', 'Controle de Enchentes e de Barragens', '0000604', '', 0, '', '1', '1'),
(700, '3.07.01.05-8', 'Sedimentologia', '0000605', '', 0, '', '1', '1'),
(701, '3.07.02.00-3', 'Tratamento de Águas de Abastecimento e Residuárias', '0000606', '', 0, '', '1', '1'),
(702, '3.07.02.01-1', 'Química Sanitária', '0000607', '', 0, '', '1', '1'),
(703, '3.07.02.02-0', 'Processos Simplificados de Tratamento de Águas', '0000608', '', 0, '', '1', '1'),
(704, '3.07.02.05-4', 'Estudos e Caracterização de Efluentes Industriais', '0000611', '', 0, '', '1', '1'),
(705, '3.07.02.07-0', 'Resíduos Radioativos', '0000613', '', 0, '', '1', '1'),
(706, '3.07.03.00-0', 'Saneamento Básico', '0000614', '', 0, '', '1', '1'),
(707, '3.07.03.01-8', 'Técnicas de Abastecimento da Água', '0000615', '', 0, '', '1', '1'),
(708, '3.07.03.02-6', 'Drenagem de Águas Residuárias', '0000616', '', 0, '', '1', '1'),
(709, '3.07.03.03-4', 'Drenagem Urbana de Águas Pluviais', '0000617', '', 0, '', '1', '1'),
(710, '3.07.03.05-0', 'Limpeza Pública', '0000619', '', 0, '', '1', '1'),
(711, '3.07.03.06-9', 'Instalações Hidráulico-Sanitárias', '0000620', '', 0, '', '1', '1'),
(712, '3.07.04.01-4', 'Ecologia Aplicada à Engenharia Sanitária', '0000622', '', 0, '', '1', '1'),
(713, '3.07.04.03-0', 'Parasitologia Aplicada à Engenharia Sanitária', '0000624', '', 0, '', '1', '1'),
(714, '3.06.03.00-5', 'Tecnologia Química', '0000577', '', 1, '', '1', '1'),
(715, '3.06.03.16-1', 'Petróleo e Petroquímica', '0000593', '', 1, '', '1', '1'),
(716, '3.07.01.00-7', 'Recursos Hídricos', '0000600', '', 1, '', '1', '1'),
(717, '3.07.03.04-2', 'Resíduos Sólidos, Domésticos e Industriais', '0000618', '', 1, '', '1', '1'),
(718, '3.07.04.00-6', 'Saneamento Ambiental', '0000621', '', 1, '', '1', '1'),
(719, '3.07.04.02-2', 'Microbiologia Aplicada e Engenharia Sanitária', '0000623', '', 1, '', '1', '1'),
(720, '3.07.04.04-9', 'Qualidade do Ar, das Águas e do Solo', '0000625', '', 0, '', '1', '1'),
(721, '3.07.04.06-5', 'Legislação Ambiental', '0000627', '', 0, '', '1', '1'),
(722, '3.08.01.00-1', 'Gerência de Produção', '0000629', '', 0, '', '1', '1'),
(723, '3.08.01.01-0', 'Planejamento de Instalações Industriais', '0000630', '', 0, '', '1', '1'),
(724, '3.08.00.00-5', 'Engenharia de Produção', '0000628', '', 1, '', '1', '1'),
(725, '3.08.01.03-6', 'Higiene e Segurança do Trabalho', '0000632', '', 0, '', '1', '1'),
(726, '3.08.01.04-4', 'Suprimentos', '0000633', '', 0, '', '1', '1'),
(727, '3.08.02.02-4', 'Programação Linear, Não-Linear, Mista e Dinâmica', '0000637', '', 0, '', '1', '1'),
(728, '3.08.04.06-0', 'Avaliação de Projetos', '0000653', '', 0, '', '1', '1'),
(729, '3.09.01.01-4', 'Produção de Radioisotopos', '0000656', '', 0, '', '1', '1'),
(730, '3.09.01.02-2', 'Aplicações Industriais de Radioisotopos', '0000657', '', 0, '', '1', '1'),
(731, '3.09.01.03-0', 'Instrumentação para Medida e Controle de Radiação', '0000658', '', 0, '', '1', '1'),
(732, '3.09.02.00-2', 'Fusão Controlada', '0000659', '', 0, '', '1', '1'),
(733, '3.09.00.00-0', 'Engenharia Nuclear', '0000654', '', 0, '', '1', '1'),
(734, '3.09.01.00-6', 'Aplicações de Radioisotopos', '0000655', '', 0, '', '1', '1'),
(735, '3.10.01.01-7', 'Planejamento e Organização do Sistema de Transporte', '0000677', '', 0, '', '1', '1'),
(736, '3.10.01.02-5', 'Economia dos Transportes', '0000678', '', 0, '', '1', '1'),
(737, '3.11.03.02-2', 'Controle e Automação de Sistemas Propulsores', '0000698', '', 0, '', '1', '1'),
(738, '3.11.03.03-0', 'Equipamentos Auxiliares do Sistema Propulsivo', '0000699', '', 0, '', '1', '1'),
(739, '3.11.03.04-9', 'Motor de Propulsão', '0000700', '', 0, '', '1', '1'),
(740, '3.11.04.00-2', 'Projeto de Navios e de Sistemas Oceânicos', '0000701', '', 0, '', '1', '1'),
(741, '3.11.04.01-0', 'Projetos de Navios', '0000702', '', 0, '', '1', '1'),
(742, '3.11.04.02-9', 'Projetos de Sistemas Oceânicos Fixos e Semi-Fixos', '0000703', '', 0, '', '1', '1'),
(743, '3.11.04.03-7', 'Projetos de Embarcações Não-Convencionais', '0000704', '', 0, '', '1', '1'),
(744, '3.11.05.00-9', 'Tecnologia de Construção Naval e de Sistemas Oceânicas', '0000705', '', 0, '', '1', '1'),
(745, '3.11.05.01-7', 'Métodos de Fabricação de Navios e Sistemas Oceânicos', '0000706', '', 0, '', '1', '1'),
(746, '3.11.05.02-5', 'Soldagem de Estruturas Navais e Oceânicos', '0000707', '', 0, '', '1', '1'),
(747, '3.11.05.03-3', 'Custos de Construção Naval', '0000708', '', 0, '', '1', '1'),
(748, '3.11.05.04-1', 'Normatização e Certificação de Qualidade de Navios', '0000709', '', 0, '', '1', '1'),
(749, '3.12.00.00-1', 'Engenharia Aeroespacial', '0000710', '', 0, '', '1', '1'),
(750, '3.09.02.02-9', 'Problemas Tecnológicos da Fusão Controlada', '0000661', '', 0, '', '1', '1'),
(751, '3.10.02.00-5', 'Veículos e Equipamentos de Controle', '0000679', '', 0, '', '1', '1'),
(752, '3.09.03.00-9', 'Combustível Nuclear', '0000662', '', 0, '', '1', '1'),
(753, '3.11.01.01-1', 'Resistência Hidrodinâmica', '0000690', '', 0, '', '1', '1'),
(754, '3.09.03.01-7', 'Extração de Combustível Nuclear', '0000663', '', 0, '', '1', '1'),
(755, '3.11.02.03-4', 'Síntese Estrutural Naval e Oceânica', '0000695', '', 0, '', '1', '1'),
(756, '3.09.03.02-5', 'Conversão, Enriquecimento e Fabricação de Combustível Nuclear', '0000664', '', 0, '', '1', '1'),
(757, '3.09.03.03-3', 'Reprocessamento de Combustível Nuclear', '0000665', '', 0, '', '1', '1'),
(758, '3.09.03.04-1', 'Rejeitos de Combustível Nuclear', '0000666', '', 0, '', '1', '1'),
(759, '3.09.04.00-5', 'Tecnologia dos Reatores', '0000667', '', 0, '', '1', '1'),
(760, '3.09.04.01-3', 'Núcleo do Reator', '0000668', '', 0, '', '1', '1'),
(761, '3.09.04.02-1', 'Materiais Nucleares e Blindagem de Reatores', '0000669', '', 0, '', '1', '1'),
(762, '3.09.04.03-0', 'Transferência de Calor em Reatores', '0000670', '', 0, '', '1', '1'),
(763, '3.09.04.04-8', 'Geração e Integração Com Sistemas Elétricos em Reatores', '0000671', '', 0, '', '1', '1'),
(764, '3.09.04.05-6', 'Instrumentação Para Operação e Controle de Reatores', '0000672', '', 0, '', '1', '1'),
(765, '3.08.01.02-8', 'Planejamento, Projeto e Controle de Sistemas de Produção', '0000631', '', 1, '', '1', '1'),
(766, '3.08.01.05-2', 'Garantia de Controle de Qualidade', '0000634', '', 1, '', '1', '1'),
(767, '3.09.04.06-4', 'Seguranca, Localização e Licênciamento de Reatores', '0000673', '', 0, '', '1', '1'),
(768, '3.09.04.07-2', 'Aspectos Econômicos de Reatores', '0000674', '', 0, '', '1', '1'),
(769, '3.11.01.00-3', 'Hidrodinâmica de Navios e Sistemas Oceânicos', '0000689', '', 0, '', '1', '1'),
(770, '3.09.02.01-0', 'Processos Industriais da Fusão Controlada', '0000660', '', 0, '', '1', '1'),
(771, '3.10.00.00-2', 'Engenharia de Transportes', '0000675', '', 1, '', '1', '1'),
(772, '3.10.02.01-3', 'Vias de Transporte', '0000680', '', 0, '', '1', '1'),
(773, '3.10.02.03-0', 'Estação de Transporte', '0000682', '', 0, '', '1', '1'),
(774, '3.10.02.04-8', 'Equipamentos Auxiliares e Controles', '0000683', '', 0, '', '1', '1'),
(775, '3.10.03.01-0', 'Engenharia de Tráfego', '0000685', '', 0, '', '1', '1'),
(776, '3.10.03.02-8', 'Capacidade de Vias de Transporte', '0000686', '', 0, '', '1', '1'),
(777, '3.10.03.03-6', 'Operação de Sistemas de Transporte', '0000687', '', 0, '', '1', '1'),
(778, '3.13.01.02-9', 'Modelagem de Fenomenos Biológicos', '0000738', '', 0, '', '1', '1'),
(779, '3.12.02.01-2', 'Trajetorias e Orbitas', '0000715', '', 0, '', '1', '1'),
(780, '3.12.02.02-0', 'Estabilidade e Controle', '0000716', '', 0, '', '1', '1'),
(781, '3.12.03.00-0', 'Estruturas Aeroespaciais', '0000717', '', 0, '', '1', '1'),
(782, '3.12.03.01-9', 'Aeroelasticidade', '0000718', '', 0, '', '1', '1'),
(783, '3.12.03.02-7', 'Fadiga', '0000719', '', 0, '', '1', '1'),
(784, '3.12.03.03-5', 'Projeto de Estruturas Aeroespaciais', '0000720', '', 0, '', '1', '1'),
(785, '3.12.04.00-7', 'Materiais e Processos para Engenharia Aeronáutica e Aeroespacial', '0000721', '', 0, '', '1', '1'),
(786, '3.12.05.00-3', 'Propulsão Aeroespacial', '0000722', '', 0, '', '1', '1'),
(787, '3.12.05.01-1', 'Combustão e Escoamento com Reações Químicas', '0000723', '', 0, '', '1', '1'),
(788, '3.12.05.02-0', 'Propulsão de Foguetes', '0000724', '', 0, '', '1', '1'),
(789, '3.12.05.03-8', 'Máquinas de Fluxo', '0000725', '', 0, '', '1', '1'),
(790, '3.12.06.00-0', 'Sistemas Aeroespaciais', '0000727', '', 0, '', '1', '1'),
(791, '3.12.06.01-8', 'Aviões', '0000728', '', 0, '', '1', '1'),
(792, '3.12.06.02-6', 'Foguetes', '0000729', '', 0, '', '1', '1'),
(793, '3.12.06.03-4', 'Helicópteros', '0000730', '', 0, '', '1', '1'),
(794, '3.12.06.04-2', 'Hovercraft', '0000731', '', 0, '', '1', '1'),
(795, '3.12.06.05-0', 'Satélites e Outros Dispositivos Aeroespaciais', '0000732', '', 0, '', '1', '1'),
(796, '3.12.06.06-9', 'Normatização e Certificação de Qualidade de Aeronaves e Componentes', '0000733', '', 0, '', '1', '1'),
(797, '3.12.06.07-7', 'Manutenção de Sistemas Aeroespaciais', '0000734', '', 0, '', '1', '1'),
(798, '3.13.01.03-7', 'Modelagem de Sistemas Biológicos', '0000739', '', 0, '', '1', '1'),
(799, '3.13.00.00-6', 'Engenharia Biomédica', '0000735', '', 1, '', '1', '1'),
(800, '3.13.01.00-2', 'Bioengenharia', '0000736', '', 1, '', '1', '1'),
(801, '3.13.02.02-5', 'Transdutores para Aplicações Biomédicas', '0000742', '', 0, '', '1', '1'),
(802, '3.13.02.03-3', 'Instrumentação Odontológica e Médico-Hospitalar', '0000743', '', 0, '', '1', '1'),
(803, '3.13.02.00-9', 'Engenharia Médica', '0000740', '', 1, '', '1', '1'),
(804, '4.01.01.03-7', 'Alergologia e Imunologia Clínica', '0000750', '', 0, '', '1', '1'),
(805, '4.01.00.00-6', 'Medicina', '0000746', '', 1, '', '1', '1'),
(806, '4.01.01.05-3', 'Hematologia', '0000752', '', 0, '', '1', '1'),
(807, '4.01.01.09-6', 'Doenças Infecciosas e Parasitárias', '0000756', '', 0, '', '1', '1'),
(808, '4.01.01.11-8', 'Gastroenterologia', '0000758', '', 1, '', '1', '1'),
(809, '3.13.02.01-7', 'Biomateriais e Materiais Biocompatíveis', '0000741', '', 1, '', '1', '1'),
(810, '3.13.02.04-1', 'Tecnologia de Próteses', '0000744', '', 1, '', '1', '1'),
(811, '4.01.01.04-5', 'Cancerologia', '0000751', '', 1, '', '1', '1'),
(812, '4.01.01.06-1', 'Endocrinologia', '0000753', '', 1, '', '1', '1'),
(813, '4.01.01.07-0', 'Neurologia', '0000754', '', 1, '', '1', '1'),
(814, '4.01.01.12-6', 'Pneumologia', '0000759', '', 0, '', '1', '1'),
(815, '4.01.01.10-0', 'Cardiologia', '0000757', '', 1, '', '1', '1'),
(816, '4.01.01.14-2', 'Reumatologia', '0000761', '', 0, '', '1', '1'),
(817, '4.01.01.13-4', 'Nefrologia', '0000760', '', 1, '', '1', '1'),
(818, '3.12.01.01-6', 'Aerodinâmica de Aeronaves Espaciais', '0000712', '', 0, '', '1', '1'),
(819, '3.12.01.02-4', 'Aerodinâmica dos Processos Geofísicos e Interplanetarios', '0000713', '', 0, '', '1', '1'),
(820, '4.01.02.01-7', 'Cirurgia Plástica e Restauradora', '0000767', '', 0, '', '1', '1'),
(821, '4.01.02.03-3', 'Cirurgia Oftalmológica', '0000769', '', 0, '', '1', '1'),
(822, '4.01.02.05-0', 'Cirurgia Toráxica', '0000771', '', 0, '', '1', '1'),
(823, '4.01.02.07-6', 'Cirurgia Pediátrica', '0000773', '', 0, '', '1', '1'),
(824, '4.01.02.08-4', 'Neurocirurgia', '0000774', '', 0, '', '1', '1'),
(825, '4.01.02.09-2', 'Cirurgia Urológica', '0000775', '', 0, '', '1', '1'),
(826, '4.01.03.00-5', 'Saúde Materno-Infantil', '0000781', '', 0, '', '1', '1'),
(827, '4.01.04.00-1', 'Psiquiatria', '0000782', '', 0, '', '1', '1'),
(828, '4.01.05.00-8', 'Anatomia Patológica e Patologia Clínica', '0000783', '', 0, '', '1', '1'),
(829, '4.01.06.00-4', 'Radiologia Médica', '0000784', '', 0, '', '1', '1'),
(830, '4.01.07.00-0', 'Medicina Legal e Deontologia', '0000785', '', 0, '', '1', '1'),
(831, '4.02.05.00-2', 'Periodontia', '0000791', '', 0, '', '1', '1'),
(832, '4.02.01.00-7', 'Clínica Odontológica', '0000787', '', 0, '', '1', '1'),
(833, '4.04.01.00-6', 'Enfermagem Médico-Cirúrgica', '0000803', '', 1, '', '1', '1'),
(834, '4.02.04.00-6', 'Odontopediatria', '0000790', '', 0, '', '1', '1'),
(835, '4.02.09.00-8', 'Materiais Odontológicos', '0000795', '', 0, '', '1', '1'),
(836, '4.02.00.00-0', 'Odontologia', '0000786', '', 1, '', '1', '1'),
(837, '4.03.01.00-1', 'Farmacotecnia', '0000797', '', 0, '', '1', '1'),
(838, '4.03.02.00-8', 'Farmacognosia', '0000798', '', 0, '', '1', '1'),
(839, '4.03.03.00-4', 'Análise Toxicológica', '0000799', '', 0, '', '1', '1'),
(840, '4.03.05.00-7', 'Bromatologia', '0000801', '', 0, '', '1', '1'),
(841, '4.03.00.00-5', 'Farmácia', '0000796', '', 1, '', '1', '1'),
(842, '4.01.02.12-x', 'Traumatológia', '0000778', '', 0, '', '1', '1'),
(843, '4.04.02.00-2', 'Enfermagem Obstétrica', '0000804', '', 0, '', '1', '1'),
(844, '4.04.03.00-9', 'Enfermagem Pediátrica', '0000805', '', 0, '', '1', '1'),
(845, '4.04.04.00-5', 'Enfermagem Psiquiátrica', '0000806', '', 0, '', '1', '1'),
(846, '4.04.00.00-0', 'Enfermagem', '0000802', '', 1, '', '1', '1'),
(847, '4.05.01.00-0', 'Bioquímica da Nutrição', '0000810', '', 0, '', '1', '1'),
(848, '4.05.02.00-7', 'Dietética', '0000811', '', 0, '', '1', '1'),
(849, '4.05.03.00-3', 'Análise Nutricional de População', '0000812', '', 0, '', '1', '1'),
(850, '4.01.01.18-6', 'Ortopedia', '0000765', '', 1, '', '1', '1'),
(851, '4.01.02.02-5', 'Cirurgia Otorrinolaringológica', '0000768', '', 1, '', '1', '1'),
(852, '4.01.02.04-1', 'Cirurgia Cardiovascular', '0000770', '', 1, '', '1', '1'),
(853, '4.01.02.06-8', 'Cirurgia Gastroenterologia', '0000772', '', 1, '', '1', '1'),
(854, '4.01.02.10-6', 'Cirurgia Proctológica', '0000776', '', 1, '', '1', '1'),
(855, '4.01.02.11-4', 'Cirurgia Ortopédica', '0000777', '', 1, '', '1', '1'),
(856, '4.01.02.14-9', 'Cirurgia Experimental', '0000780', '', 1, '', '1', '1'),
(857, '4.02.06.00-9', 'Endodontia', '0000792', '', 1, '', '1', '1'),
(858, '4.03.04.00-0', 'Análise e Controle e Medicamentos', '0000800', '', 1, '', '1', '1'),
(859, '4.04.06.00-8', 'Enfermagem de Saúde Pública', '0000808', '', 1, '', '1', '1'),
(860, '4.05.04.00-0', 'Desnutrição e Desenvolvimento Fisiológico', '0000813', '', 0, '', '1', '1'),
(861, '4.05.00.00-4', 'Nutrição', '0000809', '', 1, '', '1', '1'),
(862, '4.06.00.00-9', 'Saúde Coletiva', '0000814', '', 1, '', '1', '1'),
(863, '4.06.03.00-8', 'Medicina Preventiva', '0000817', '', 0, '', '1', '1'),
(864, '5.01.01.00-5', 'Ciência do Solo', '0000823', '', 0, '', '1', '1'),
(865, '5.01.01.01-3', 'Genese, Morfologia e Classificação dos Solos', '0000824', '', 0, '', '1', '1'),
(866, '5.01.01.02-1', 'Física do Solo', '0000825', '', 0, '', '1', '1'),
(867, '5.01.01.03-0', 'Química do Solo', '0000826', '', 0, '', '1', '1'),
(868, '5.01.01.04-8', 'Microbiologia e Bioquímica do Solo', '0000827', '', 0, '', '1', '1'),
(869, '5.00.00.00-4', 'Ciências Agrárias', '0000821', '', 0, '', '1', '1'),
(870, '5.01.01.06-4', 'Manejo e Conservação do Solo', '0000829', '', 0, '', '1', '1'),
(871, '5.01.02.00-1', 'Fitossanidade', '0000830', '', 0, '', '1', '1'),
(872, '5.01.02.01-0', 'Fitopatologia', '0000831', '', 0, '', '1', '1'),
(873, '5.01.02.02-8', 'Entomologia Agrícola', '0000832', '', 0, '', '1', '1'),
(874, '5.01.02.03-6', 'Parasitologia Agrícola', '0000833', '', 0, '', '1', '1'),
(875, '5.01.03.01-6', 'Manejo e Tratos Culturais', '0000837', '', 0, '', '1', '1'),
(876, '5.01.03.03-2', 'Produção e Beneficiamento de Sementes', '0000839', '', 0, '', '1', '1'),
(877, '5.01.03.05-9', 'Melhoramento Vegetal', '0000841', '', 0, '', '1', '1'),
(878, '5.01.03.06-7', 'Fisiologia de Plantas Cultivadas', '0000842', '', 0, '', '1', '1'),
(879, '5.01.04.00-4', 'Floricultura, Parques e Jardins', '0000844', '', 0, '', '1', '1'),
(880, '5.01.04.01-2', 'Floricultura', '0000845', '', 0, '', '1', '1'),
(881, '5.01.04.02-0', 'Parques e Jardins', '0000846', '', 0, '', '1', '1'),
(882, '5.01.04.03-9', 'Arborização de Vias Públicas', '0000847', '', 0, '', '1', '1'),
(883, '5.01.05.00-0', 'Agrometeorologia', '0000848', '', 0, '', '1', '1'),
(884, '5.01.06.00-7', 'Extensão Rural', '0000849', '', 0, '', '1', '1'),
(885, '5.01.00.00-9', 'Agronomia', '0000822', '', 1, '', '1', '1'),
(886, '5.02.01.00-0', 'Silvicultura', '0000851', '', 0, '', '1', '1'),
(887, '5.02.01.01-8', 'Dendrologia', '0000852', '', 0, '', '1', '1'),
(888, '5.02.01.03-4', 'Genética e Melhoramento Florestal', '0000854', '', 0, '', '1', '1'),
(889, '5.02.01.06-9', 'Fisiologia Florestal', '0000857', '', 0, '', '1', '1'),
(890, '5.02.01.08-5', 'Proteção Florestal', '0000859', '', 0, '', '1', '1'),
(891, '5.02.02.00-6', 'Manejo Florestal', '0000860', '', 0, '', '1', '1'),
(892, '5.02.02.01-4', 'Economia Florestal', '0000861', '', 0, '', '1', '1'),
(893, '5.02.02.02-2', 'Politica e Legislação Florestal', '0000862', '', 0, '', '1', '1'),
(894, '5.02.02.03-0', 'Administração Florestal', '0000863', '', 0, '', '1', '1'),
(895, '5.02.02.04-9', 'Dendrometria e Inventário Florestal', '0000864', '', 0, '', '1', '1'),
(896, '5.02.02.05-7', 'Fotointerpretação Florestal', '0000865', '', 0, '', '1', '1'),
(897, '5.02.00.00-3', 'Recursos Florestais e Engenharia Florestal', '0000850', '', 1, '', '1', '1'),
(898, '4.08.00.00-8', 'Fisioterapia e Terapia Ocupacional', '0000819', '', 1, '', '1', '1'),
(899, '5.01.03.00-8', 'Fitotecnia', '0000836', '', 1, '', '1', '1'),
(900, '5.01.03.02-4', 'Mecanização Agrícola', '0000838', '', 1, '', '1', '1'),
(901, '5.01.03.04-0', 'Produção de Mudas', '0000840', '', 1, '', '1', '1'),
(902, '5.01.03.07-5', 'Matologia', '0000843', '', 1, '', '1', '1'),
(903, '5.02.01.02-6', 'Florestamento e Reflorestamento', '0000853', '', 1, '', '1', '1'),
(904, '5.02.01.04-2', 'Sementes Florestais', '0000855', '', 1, '', '1', '1'),
(905, '5.02.01.05-0', 'Nutrição Florestal', '0000856', '', 1, '', '1', '1'),
(906, '5.02.03.01-0', 'Exploração Florestal', '0000868', '', 0, '', '1', '1'),
(907, '5.02.04.01-7', 'Anatomia e Identificação de Produtos Florestais', '0000871', '', 0, '', '1', '1'),
(908, '5.02.04.02-5', 'Propriedades Físico-Mecânicas da Madeira', '0000872', '', 0, '', '1', '1'),
(909, '5.02.04.03-3', 'Relações Água-Madeira e Secagem', '0000873', '', 0, '', '1', '1'),
(910, '5.02.04.04-1', 'Tratamento da Madeira', '0000874', '', 0, '', '1', '1'),
(911, '5.02.04.05-0', 'Processamento Mecânico da Madeira', '0000875', '', 0, '', '1', '1'),
(912, '5.02.04.06-8', 'Química da Madeira', '0000876', '', 0, '', '1', '1'),
(913, '5.02.04.07-6', 'Resinas de Madeiras', '0000877', '', 0, '', '1', '1'),
(914, '5.02.05.01-3', 'Hidrologia Florestal', '0000881', '', 0, '', '1', '1'),
(915, '5.02.05.02-1', 'Conservação de Áreas Silvestres', '0000882', '', 0, '', '1', '1'),
(916, '5.02.05.03-0', 'Conservação de Bacias Hidrográficas', '0000883', '', 0, '', '1', '1'),
(917, '5.02.06.00-1', 'Energia de Biomassa Florestal', '0000885', '', 0, '', '1', '1'),
(918, '5.04.05.02-0', 'Manejo de Animais', '0000915', '', 1, '', '1', '1'),
(919, '5.03.01.00-4', 'Máquinas e Implementos Agrícolas', '0000887', '', 0, '', '1', '1'),
(920, '5.03.02.00-0', 'Engenharia de Água e Solo', '0000888', '', 0, '', '1', '1'),
(921, '5.03.02.01-9', 'Irrigação e Drenagem', '0000889', '', 0, '', '1', '1'),
(922, '5.03.02.02-7', 'Conservação de Solo e Água', '0000890', '', 0, '', '1', '1'),
(923, '5.03.03.00-7', 'Engenharia de Processamento de Produtos Agrícolas', '0000891', '', 0, '', '1', '1'),
(924, '5.03.03.01-5', 'Pré-Processamento de Produtos Agrícolas', '0000892', '', 0, '', '1', '1'),
(925, '5.03.03.02-3', 'Armazenamento de Produtos Agrícolas', '0000893', '', 0, '', '1', '1'),
(926, '5.03.03.03-1', 'Transferência de Produtos Agrícolas', '0000894', '', 0, '', '1', '1'),
(927, '5.03.04.00-3', 'Construções Rurais e Ambiência', '0000895', '', 0, '', '1', '1'),
(928, '5.03.04.01-1', 'Assentamento Rural', '0000896', '', 0, '', '1', '1'),
(929, '5.03.04.02-0', 'Engenharia de Construções Rurais', '0000897', '', 0, '', '1', '1'),
(930, '5.03.04.03-8', 'Saneamento Rural', '0000898', '', 0, '', '1', '1'),
(931, '5.03.05.00-0', 'Energização Rural', '0000899', '', 0, '', '1', '1'),
(932, '5.03.00.00-8', 'Engenharia Agrícola', '0000886', '', 1, '', '1', '1'),
(933, '5.04.01.00-9', 'Ecologia dos Animais Domésticos e Etologia', '0000901', '', 0, '', '1', '1'),
(934, '5.04.02.00-5', 'Genética e Melhoramento dos Animais Domésticos', '0000902', '', 0, '', '1', '1'),
(935, '5.04.03.00-1', 'Nutrição e Alimentação Animal', '0000903', '', 0, '', '1', '1'),
(936, '5.04.03.01-0', 'Exigências Nutricionais dos Animais', '0000904', '', 0, '', '1', '1'),
(937, '5.04.03.02-8', 'Avaliação de Alimentos para Animais', '0000905', '', 0, '', '1', '1'),
(938, '5.04.03.03-6', 'Conservação de Alimentos para Animais', '0000906', '', 0, '', '1', '1'),
(939, '5.04.04.01-6', 'Avaliação, Produção e Conservação de Forragens', '0000908', '', 0, '', '1', '1'),
(940, '5.04.04.03-2', 'Fisiologia de Plantas Forrageiras', '0000910', '', 0, '', '1', '1'),
(941, '5.04.04.04-0', 'Melhoramento de Plantas Forrageiras e Produção de Sementes', '0000911', '', 0, '', '1', '1'),
(942, '5.04.04.05-9', 'Toxicologia e Plantas Tóxicas', '0000912', '', 0, '', '1', '1'),
(943, '5.04.05.01-2', 'Criação de Animais', '0000914', '', 0, '', '1', '1'),
(944, '5.04.05.03-9', 'Instalações para Produção Animal', '0000916', '', 0, '', '1', '1'),
(945, '5.04.00.00-2', 'Zootecnia', '0000900', '', 1, '', '1', '1'),
(946, '5.02.05.04-8', 'Recuperação de Áreas Degradadas', '0000884', '', 1, '', '1', '1'),
(947, '5.04.04.00-8', 'Pastagem e Forragicultura', '0000907', '', 1, '', '1', '1'),
(948, '5.04.05.00-4', 'Produção Animal', '0000913', '', 1, '', '1', '1'),
(949, '5.05.01.03-8', 'Radiologia de Animais', '0000921', '', 1, '', '1', '1'),
(950, '5.05.01.04-6', 'Farmacologia e Terapêutica Animal', '0000922', '', 1, '', '1', '1'),
(951, '5.05.01.08-9', 'Toxicologia Animal', '0000926', '', 1, '', '1', '1'),
(952, '5.05.02.00-0', 'Medicina Veterinária Preventiva', '0000927', '', 1, '', '1', '1'),
(953, '5.05.02.01-8', 'Epidemiologia Animal', '0000928', '', 0, '', '1', '1'),
(954, '5.05.02.02-6', 'Saneamento Aplicado à Saúde do Homem', '0000929', '', 0, '', '1', '1'),
(955, '5.05.02.03-4', 'Doenças Infecciosas de Animais', '0000930', '', 0, '', '1', '1'),
(956, '5.05.02.04-2', 'Doenças Parasitárias de Animais', '0000931', '', 0, '', '1', '1'),
(957, '5.05.02.05-0', 'Saúde Animal (Programas Sanitários)', '0000932', '', 0, '', '1', '1'),
(958, '5.05.03.01-4', 'Patologia Aviária', '0000934', '', 0, '', '1', '1'),
(959, '5.05.04.02-9', 'Inseminação Artificial Animal', '0000939', '', 0, '', '1', '1'),
(960, '5.05.04.03-7', 'Fisiopatologia da Reprodução Animal', '0000940', '', 0, '', '1', '1'),
(961, '5.06.01.00-8', 'Recursos Pesqueiros Marinhos', '0000943', '', 0, '', '1', '1'),
(962, '5.06.01.01-6', 'Fatores Abióticos do Mar', '0000944', '', 0, '', '1', '1'),
(963, '5.06.01.02-4', 'Avaliação de Estoques Pesqueiros Marinhos', '0000945', '', 0, '', '1', '1'),
(964, '5.06.01.03-2', 'Exploração Pesqueira Marinha', '0000946', '', 0, '', '1', '1'),
(965, '5.06.01.04-0', 'Manejo e Conservação de Recursos Pesqueiros Marinhos', '0000947', '', 0, '', '1', '1'),
(966, '5.06.02.00-4', 'Recursos Pesqueiros de Águas Interiores', '0000948', '', 0, '', '1', '1'),
(967, '5.06.02.01-2', 'Fatores Abióticos de Águas Interiores', '0000949', '', 0, '', '1', '1'),
(968, '5.06.02.02-0', 'Avaliação de Estoques Pesqueiros de Águas Interiores', '0000950', '', 0, '', '1', '1'),
(969, '5.06.02.03-9', 'Explotação Pesqueira de Águas Interiores', '0000951', '', 0, '', '1', '1'),
(970, '5.06.02.04-7', 'Manejo e Conservação de Recursos Pesqueiros de Águas Interiores', '0000952', '', 0, '', '1', '1'),
(971, '5.06.03.01-9', 'Maricultura', '0000954', '', 0, '', '1', '1'),
(972, '5.06.03.02-7', 'Carcinocultura', '0000955', '', 0, '', '1', '1'),
(973, '5.06.03.03-5', 'Ostreicultura', '0000956', '', 0, '', '1', '1'),
(974, '5.06.03.04-3', 'Piscicultura', '0000957', '', 0, '', '1', '1'),
(975, '5.06.04.00-7', 'Engenharia de Pesca', '0000958', '', 0, '', '1', '1'),
(976, '5.06.00.00-1', 'Recursos Pesqueiros e Engenharia de Pesca', '0000942', '', 1, '', '1', '1'),
(977, '5.07.01.01-0', 'Valor Nutritivo de Alimentos', '0000961', '', 0, '', '1', '1'),
(978, '5.07.01.04-5', 'Fisiologia Pós-Colheita', '0000964', '', 0, '', '1', '1'),
(979, '5.07.01.05-3', 'Toxicidade e Resíduos de Pesticidas em Alimentos', '0000965', '', 0, '', '1', '1'),
(980, '6.01.01.01-6', 'Teoria Geral do Direito', '0000981', '', 0, '', '1', '1'),
(981, '5.07.02.04-1', 'Tecnologia de Alimentos Dietéticos e Nutricionais', '0000972', '', 0, '', '1', '1'),
(982, '5.07.02.05-0', 'Aproveitamento de Subprodutos', '0000973', '', 0, '', '1', '1'),
(983, '5.07.02.06-8', 'Embalagens de Produtos Alimentares', '0000974', '', 0, '', '1', '1'),
(984, '5.07.03.00-5', 'Engenharia de Alimentos', '0000975', '', 0, '', '1', '1'),
(985, '5.07.03.01-3', 'Instalações Industriais de Produção de Alimentos', '0000976', '', 0, '', '1', '1'),
(986, '5.07.03.02-1', 'Armazenamento de Alimentos', '0000977', '', 0, '', '1', '1'),
(987, '6.01.02.06-3', 'Direito Administrativo', '0000995', '', 1, '', '1', '1'),
(988, '6.01.01.02-4', 'Teoria Geral do Processo', '0000982', '', 0, '', '1', '1'),
(989, '6.01.01.03-2', 'Teoria do Estado', '0000983', '', 0, '', '1', '1'),
(990, '6.01.01.04-0', 'História do Direito', '0000984', '', 0, '', '1', '1'),
(991, '6.01.01.06-7', 'Lógica Jurídica', '0000986', '', 0, '', '1', '1'),
(992, '5.05.03.02-2', 'Anatomia Patologia Animal', '0000935', '', 1, '', '1', '1'),
(993, '5.05.03.03-0', 'Patologia Clínica Animal', '0000936', '', 1, '', '1', '1'),
(994, '5.05.04.00-2', 'Reprodução Animal', '0000937', '', 1, '', '1', '1'),
(995, '5.05.04.01-0', 'Ginecologia e Andrologia Animal', '0000938', '', 1, '', '1', '1'),
(996, '5.06.03.00-0', 'Aqüicultura', '0000953', '', 1, '', '1', '1'),
(997, '5.07.01.02-9', 'Química, Física, Físico-Química e Bioquímica dos Alim. e das Mat.-Primas Alimentares', '0000962', '', 1, '', '1', '1'),
(998, '5.07.01.03-7', 'Microbiologia de Alimentos', '0000963', '', 1, '', '1', '1'),
(999, '6.01.01.08-3', 'Antropologia Jurídica', '0000988', '', 0, '', '1', '1'),
(1000, '6.01.03.00-0', 'Direito Privado', '0000997', '', 1, '', '1', '1'),
(1001, '6.01.01.05-9', 'Filosofia do Direito', '0000985', '', 1, '', '1', '1'),
(1002, '6.01.02.05-5', 'Direito Constitucional', '0000994', '', 1, '', '1', '1'),
(1003, '6.01.04.00-7', 'Direitos Especiais', '0001002', '', 1, '', '1', '1'),
(1004, '6.01.03.04-3', 'Direito Internacional Privado', '0001001', '', 0, '', '1', '1'),
(1005, '6.03.01.00-7', 'Teoria Econômica', '0001018', '', 0, '', '1', '1'),
(1006, '6.01.00.00-1', 'Direito', '0000979', '', 1, '', '1', '1'),
(1007, '6.02.01.01-0', 'Administração da Produção', '0001005', '', 0, '', '1', '1'),
(1008, '6.02.01.02-9', 'Administração Financeira', '0001006', '', 0, '', '1', '1'),
(1009, '6.02.01.04-5', 'Negócios Internacionais', '0001008', '', 0, '', '1', '1'),
(1010, '6.02.02.04-1', 'Administração de Pessoal', '0001014', '', 0, '', '1', '1'),
(1011, '6.02.00.00-6', 'Administração', '0001003', '', 1, '', '1', '1'),
(1012, '5.07.02.01-7', 'Tecnologia de Produtos de Origem Animal', '0000969', '', 0, '', '1', '1'),
(1013, '6.03.01.01-5', 'Economia Geral', '0001019', '', 0, '', '1', '1'),
(1014, '6.03.00.00-0', 'Economia', '0001017', '', 1, '', '1', '1'),
(1015, '5.07.02.02-5', 'Tecnologia de Produtos de Origem Vegetal', '0000970', '', 0, '', '1', '1'),
(1016, '6.03.02.02-0', 'Estatística Sócio-Econômica', '0001026', '', 0, '', '1', '1'),
(1017, '6.03.02.03-8', 'Contabilidade Nacional', '0001027', '', 0, '', '1', '1'),
(1018, '6.03.02.04-6', 'Economia Matemática', '0001028', '', 0, '', '1', '1'),
(1019, '6.03.03.00-0', 'Economia Monetária e Fiscal', '0001029', '', 0, '', '1', '1'),
(1020, '6.03.03.01-8', 'Teoria Monetária e Financeira', '0001030', '', 0, '', '1', '1'),
(1021, '6.03.03.02-6', 'Instituições Monetárias e Financeiras do Brasil', '0001031', '', 0, '', '1', '1'),
(1022, '6.03.03.03-4', 'Financas Públicas Internas', '0001032', '', 0, '', '1', '1'),
(1023, '6.03.03.04-2', 'Política Fiscal do Brasil', '0001033', '', 0, '', '1', '1'),
(1024, '6.03.04.00-6', 'Crescimento, Flutuações e Planejamento Econômico', '0001034', '', 0, '', '1', '1'),
(1025, '6.03.04.01-4', 'Crescimento e Desenvolvimento Econômico', '0001035', '', 0, '', '1', '1'),
(1026, '6.03.04.02-2', 'Teoria e Política de Planejamento Econômico', '0001036', '', 0, '', '1', '1'),
(1027, '6.03.04.03-0', 'Flutuações Cíclicas e Projeções Econômicas', '0001037', '', 0, '', '1', '1'),
(1028, '6.03.04.04-9', 'Inflação', '0001038', '', 0, '', '1', '1'),
(1029, '6.03.05.00-2', 'Economia Internacional', '0001039', '', 0, '', '1', '1'),
(1030, '6.03.05.01-0', 'Teoria do Comércio Internacional', '0001040', '', 0, '', '1', '1'),
(1031, '6.03.05.03-7', 'Balanço de Pagamentos (Financas Internacionais)', '0001042', '', 0, '', '1', '1'),
(1032, '6.03.05.04-5', 'Investimentos Internacionais e Ajuda Externa', '0001043', '', 0, '', '1', '1'),
(1033, '6.03.06.00-9', 'Economia dos Recursos Humanos', '0001044', '', 0, '', '1', '1'),
(1034, '6.01.02.01-2', 'Direito Tributário', '0000990', '', 1, '', '1', '1'),
(1035, '6.01.02.02-0', 'Direito Penal', '0000991', '', 1, '', '1', '1'),
(1036, '6.01.02.03-9', 'Direito Processual Penal', '0000992', '', 1, '', '1', '1'),
(1037, '6.01.02.04-7', 'Direito Processual Civil', '0000993', '', 1, '', '1', '1'),
(1038, '6.01.02.07-1', 'Direito Internacional Público', '0000996', '', 1, '', '1', '1'),
(1039, '6.01.03.01-9', 'Direito Civil', '0000998', '', 1, '', '1', '1'),
(1040, '6.01.03.02-7', 'Direito Comercial', '0000999', '', 1, '', '1', '1'),
(1041, '6.02.01.03-7', 'Mercadologia', '0001007', '', 1, '', '1', '1'),
(1042, '6.02.03.00-5', 'Administração de Setores Específicos', '0001015', '', 1, '', '1', '1'),
(1043, '6.02.04.00-1', 'Ciências Contábeis', '0001016', '', 1, '', '1', '1'),
(1044, '6.03.05.02-9', 'Relações do Comércio (Política Comercial, Integração Econômica)', '0001041', '', 1, '', '1', '1'),
(1045, '6.03.06.02-5', 'Mercado de Trabalho (Política do Governo)', '0001046', '', 0, '', '1', '1'),
(1046, '6.03.06.03-3', 'Sindicatos, Dissídios Coletivos, Relações de Emprego (Empregador/Empregado)', '0001047', '', 0, '', '1', '1'),
(1047, '6.03.06.04-1', 'Capital Humano', '0001048', '', 0, '', '1', '1'),
(1048, '6.03.06.05-0', 'Demografia Econômica', '0001049', '', 0, '', '1', '1'),
(1049, '6.03.07.00-5', 'Economia Industrial', '0001050', '', 0, '', '1', '1'),
(1050, '6.03.07.01-3', 'Organização Industrial e Estudos Industriais', '0001051', '', 0, '', '1', '1'),
(1051, '6.03.07.02-1', 'Mudança Tecnologica', '0001052', '', 0, '', '1', '1'),
(1052, '6.03.08.00-1', 'Economia do Bem-Estar Social', '0001053', '', 0, '', '1', '1'),
(1053, '6.03.08.01-0', 'Economia dos Programas de Bem-Estar Social', '0001054', '', 0, '', '1', '1'),
(1054, '6.03.08.02-8', 'Economia do Consumidor', '0001055', '', 0, '', '1', '1'),
(1055, '6.03.09.00-8', 'Economia Regional e Urbana', '0001056', '', 0, '', '1', '1'),
(1056, '6.03.09.02-4', 'Economia Urbana', '0001058', '', 0, '', '1', '1'),
(1057, '6.03.10.00-6', 'Economias Agrária e dos Recursos Naturais', '0001060', '', 0, '', '1', '1'),
(1058, '6.04.04.02-7', 'Conceituação de Paisagismo e Metodologia do Paisagismo', '0001077', '', 0, '', '1', '1'),
(1059, '6.04.04.03-5', 'Estudos de Organização do Espaço Exterior', '0001078', '', 0, '', '1', '1'),
(1060, '6.04.04.04-3', 'Projetos de Espaços Livres Urbanos', '0001079', '', 0, '', '1', '1'),
(1061, '6.05.01.01-4', 'Teoria do Planejamento Urbano e Regional', '0001082', '', 0, '', '1', '1'),
(1062, '6.05.01.02-2', 'Teoria da Urbanização', '0001083', '', 0, '', '1', '1'),
(1063, '6.05.01.03-0', 'Política Urbana', '0001084', '', 0, '', '1', '1'),
(1064, '6.05.01.04-9', 'História Urbana', '0001085', '', 0, '', '1', '1'),
(1065, '6.05.02.00-2', 'Métodos e Técnicas do Planejamento Urbano e Regional', '0001086', '', 0, '', '1', '1'),
(1066, '6.05.02.01-0', 'Informação, Cadastro e Mapeamento', '0001087', '', 0, '', '1', '1'),
(1067, '6.05.02.02-9', 'Técnica de Previsão Urbana e Regional', '0001088', '', 0, '', '1', '1'),
(1068, '6.05.02.03-7', 'Técnicas de Análise e Avaliação Urbana e Regional', '0001089', '', 0, '', '1', '1'),
(1069, '6.05.02.04-5', 'Técnicas de Planejamento e Projeto Urbanos e Regionais', '0001090', '', 0, '', '1', '1'),
(1070, '6.05.03.00-9', 'Serviços Urbanos e Regionais', '0001091', '', 0, '', '1', '1'),
(1071, '6.05.03.02-5', 'Estudos da Habitação', '0001093', '', 0, '', '1', '1'),
(1072, '6.05.03.04-1', 'Aspectos Econômicos do Planejamento Urbano e Regional', '0001095', '', 0, '', '1', '1'),
(1073, '6.05.03.05-0', 'Aspectos Físico-Ambientais do Planejamento Urbano e Regional', '0001096', '', 0, '', '1', '1'),
(1074, '6.05.03.06-8', 'Serviços Comunitários', '0001097', '', 0, '', '1', '1'),
(1075, '6.05.03.07-6', 'Infra-Estruturas Urbanas e Regionais', '0001098', '', 0, '', '1', '1'),
(1076, '6.05.03.08-4', 'Transporte e Tráfego Urbano e Regional', '0001099', '', 0, '', '1', '1'),
(1077, '6.05.03.09-2', 'Legislação Urbana e Regional', '0001100', '', 0, '', '1', '1'),
(1078, '6.05.00.00-0', 'Planejamento Urbano e Regional', '0001080', '', 1, '', '1', '1'),
(1079, '6.05.01.00-6', 'Fundamentos do Planejamento Urbano e Regional', '0001081', '', 0, '', '1', '1'),
(1080, '6.06.01.00-0', 'Distribuição Espacial', '0001102', '', 0, '', '1', '1'),
(1081, '6.06.01.01-9', 'Distribuição Espacial Geral', '0001103', '', 0, '', '1', '1'),
(1082, '6.06.01.02-7', 'Distribuição Espacial Urbana', '0001104', '', 0, '', '1', '1'),
(1083, '6.06.01.03-5', 'Distribuição Espacial Rural', '0001105', '', 0, '', '1', '1'),
(1084, '6.06.02.00-7', 'Tendência Populacional', '0001106', '', 0, '', '1', '1'),
(1085, '6.06.02.01-5', 'Tendências Passadas', '0001107', '', 0, '', '1', '1'),
(1086, '6.06.02.02-3', 'Taxas e Estimativas Correntes', '0001108', '', 0, '', '1', '1'),
(1087, '6.06.02.03-1', 'Projeções', '0001109', '', 0, '', '1', '1'),
(1088, '6.06.03.00-3', 'Componentes da Dinâmica Demográfica', '0001110', '', 0, '', '1', '1'),
(1089, '6.03.09.03-2', 'Renda e Tributação', '0001059', '', 1, '', '1', '1'),
(1090, '6.05.03.01-7', 'Administração Municipal e Urbana', '0001092', '', 1, '', '1', '1'),
(1091, '6.05.03.03-3', 'Aspectos Sociais do Planejamento Urbano e Regional', '0001094', '', 1, '', '1', '1'),
(1092, '6.06.03.01-1', 'Fecundidade', '0001111', '', 0, '', '1', '1'),
(1093, '6.06.03.02-0', 'Mortalidade', '0001112', '', 0, '', '1', '1'),
(1094, '6.06.03.03-8', 'Migração', '0001113', '', 0, '', '1', '1'),
(1095, '6.06.04.00-0', 'Nupcialidade e Família', '0001114', '', 0, '', '1', '1'),
(1096, '6.06.04.01-8', 'Casamento e Divórcio', '0001115', '', 0, '', '1', '1'),
(1097, '6.06.04.02-6', 'Família e Reprodução', '0001116', '', 0, '', '1', '1'),
(1098, '6.06.05.00-6', 'Demografia Histórica', '0001117', '', 0, '', '1', '1'),
(1099, '6.06.05.01-4', 'Distribuição Espacial', '0001118', '', 0, '', '1', '1'),
(1100, '6.06.05.02-2', 'Natalidade, Mortalidade, Migração', '0001119', '', 0, '', '1', '1'),
(1101, '6.06.05.04-9', 'Métodos e Técnicas de Demografia Histórica', '0001121', '', 0, '', '1', '1'),
(1102, '6.06.06.00-2', 'Política Pública e População', '0001122', '', 0, '', '1', '1'),
(1103, '6.06.06.01-0', 'Política Populacional', '0001123', '', 0, '', '1', '1'),
(1104, '6.06.00.00-4', 'Demografia', '0001101', '', 0, '', '1', '1'),
(1105, '6.09.02.00-0', 'Jornalismo e Editoração', '0001142', '', 1, '', '1', '1'),
(1106, '6.09.01.00-4', 'Teoria da Comunicação', '0001141', '', 0, '', '1', '1'),
(1107, '6.07.01.00-5', 'Teoria da Informação', '0001128', '', 0, '', '1', '1'),
(1108, '6.07.01.01-3', 'Teoria Geral da Informação', '0001129', '', 0, '', '1', '1'),
(1109, '6.07.01.02-1', 'Processos da Comunicação', '0001130', '', 0, '', '1', '1'),
(1110, '6.07.01.03-0', 'Representação da Informação', '0001131', '', 0, '', '1', '1'),
(1111, '6.07.02.00-1', 'Biblioteconomia', '0001132', '', 0, '', '1', '1'),
(1112, '6.07.02.02-8', 'Métodos Quantitativos. Bibliometria', '0001134', '', 0, '', '1', '1'),
(1113, '6.07.02.03-6', 'Técnicas de Recuperação de Informação', '0001135', '', 0, '', '1', '1'),
(1114, '6.07.02.04-4', 'Processos de Disseminação da Informação', '0001136', '', 0, '', '1', '1'),
(1115, '6.07.03.00-8', 'Arquivologia', '0001137', '', 0, '', '1', '1'),
(1116, '6.07.03.01-6', 'Organização de Arquivos', '0001138', '', 0, '', '1', '1'),
(1117, '6.08.00.00-3', 'Museologia', '0001139', '', 0, '', '1', '1'),
(1118, '6.11.00.00-5', 'Economia Doméstica', '0001160', '', 0, '', '1', '1'),
(1119, '7.01.05.00-6', 'Epistemologia', '0001171', '', 1, '', '1', '1'),
(1120, '6.09.02.01-9', 'Teoria e Ética do Jornalismo', '0001143', '', 0, '', '1', '1'),
(1121, '6.09.02.02-7', 'Organização Editorial de Jornais', '0001144', '', 0, '', '1', '1'),
(1122, '6.09.02.03-5', 'Organização Comercial de Jornais', '0001145', '', 0, '', '1', '1'),
(1123, '6.09.02.04-3', 'Jornalismo Especializado (Comunitário, Rural, Empresarial, Científico)', '0001146', '', 0, '', '1', '1'),
(1124, '6.09.03.00-7', 'Rádio e Televisão', '0001147', '', 0, '', '1', '1'),
(1125, '6.09.03.01-5', 'Radiodifusão', '0001148', '', 0, '', '1', '1'),
(1126, '6.09.03.02-3', 'Videodifusão', '0001149', '', 0, '', '1', '1'),
(1127, '6.09.05.00-0', 'Comunicação Visual', '0001151', '', 0, '', '1', '1'),
(1128, '6.10.02.00-3', 'Serviço Social Aplicado', '0001154', '', 0, '', '1', '1'),
(1129, '6.10.02.01-1', 'Serviço Social do Trabalho', '0001155', '', 0, '', '1', '1'),
(1130, '6.10.02.02-0', 'Serviço Social da Educação', '0001156', '', 0, '', '1', '1'),
(1131, '6.10.02.03-8', 'Serviço Social do Menor', '0001157', '', 0, '', '1', '1'),
(1132, '6.10.02.04-6', 'Serviço Social da Saúde', '0001158', '', 0, '', '1', '1'),
(1133, '6.10.02.05-4', 'Serviço Social da Habitação', '0001159', '', 0, '', '1', '1'),
(1134, '6.10.00.00-0', 'Serviço Social', '0001152', '', 1, '', '1', '1'),
(1135, '6.12.00.00-0', 'Desenho Industrial', '0001161', '', 1, '', '1', '1'),
(1136, '6.13.00.00-4', 'Turismo', '0001164', '', 1, '', '1', '1'),
(1137, '6.12.01.00-6', 'Programação Visual', '0001162', '', 1, '', '1', '1'),
(1138, '6.12.02.00-2', 'Desenho de Produto', '0001163', '', 1, '', '1', '1'),
(1139, '7.01.06.00-2', 'Filosofia Brasileira', '0001172', '', 0, '', '1', '1'),
(1140, '7.01.00.00-4', 'Filosofia', '0001166', '', 1, '', '1', '1'),
(1141, '7.02.01.00-5', 'Fundamentos da Sociologia', '0001174', '', 0, '', '1', '1'),
(1142, '7.02.00.00-9', 'Sociologia', '0001173', '', 1, '', '1', '1'),
(1143, '6.06.06.03-7', 'Políticas de Planejamento Familiar', '0001125', '', 0, '', '1', '1'),
(1144, '6.06.07.00-9', 'Fontes de Dados Demográficos', '0001126', '', 0, '', '1', '1'),
(1145, '7.02.02.00-1', 'Sociologia do Conhecimento', '0001177', '', 0, '', '1', '1'),
(1146, '7.00.00.00-0', 'Ciências Humanas', '0001165', '', 0, '', '1', '1'),
(1147, '7.02.05.00-0', 'Sociologia Rural', '0001180', '', 0, '', '1', '1'),
(1148, '7.02.06.00-7', 'Sociologia da Saúde', '0001181', '', 0, '', '1', '1'),
(1149, '7.03.01.00-0', 'Teoria Antropológica', '0001184', '', 0, '', '1', '1'),
(1150, '7.03.02.00-6', 'Etnologia Indígena', '0001185', '', 0, '', '1', '1'),
(1151, '7.03.03.00-2', 'Antropologia Urbana', '0001186', '', 0, '', '1', '1'),
(1152, '7.03.04.00-9', 'Antropologia Rural', '0001187', '', 0, '', '1', '1'),
(1153, '7.03.05.00-5', 'Antropologia das Populações Afro-Brasileiras', '0001188', '', 0, '', '1', '1'),
(1154, '7.03.00.00-3', 'Antropologia', '0001183', '', 1, '', '1', '1'),
(1155, '7.04.01.00-4', 'Teoria e Método em Arqueologia', '0001190', '', 0, '', '1', '1'),
(1156, '7.04.02.00-0', 'Arqueologia Pré-Histórica', '0001191', '', 0, '', '1', '1'),
(1157, '7.04.03.00-7', 'Arqueologia Histórica', '0001192', '', 0, '', '1', '1'),
(1158, '7.05.04.00-8', 'História da América', '0001197', '', 0, '', '1', '1'),
(1159, '7.05.04.01-6', 'História dos Estados Unidos', '0001198', '', 0, '', '1', '1'),
(1160, '7.05.04.02-4', 'História Latino-Americana', '0001199', '', 0, '', '1', '1'),
(1161, '7.05.05.01-2', 'História do Brasil Colônia', '0001201', '', 0, '', '1', '1'),
(1162, '7.05.05.02-0', 'História do Brasil Império', '0001202', '', 0, '', '1', '1'),
(1163, '7.05.05.04-7', 'História Regional do Brasil', '0001204', '', 0, '', '1', '1'),
(1164, '7.05.06.00-0', 'História das Ciências', '0001205', '', 0, '', '1', '1'),
(1165, '7.05.00.00-2', 'História', '0001193', '', 1, '', '1', '1'),
(1166, '7.06.01.00-3', 'Geografia Humana', '0001207', '', 0, '', '1', '1'),
(1167, '7.06.01.01-1', 'Geografia da População', '0001208', '', 0, '', '1', '1'),
(1168, '7.06.01.02-0', 'Geografia Agrária', '0001209', '', 0, '', '1', '1'),
(1169, '7.06.01.03-8', 'Geografia Urbana', '0001210', '', 0, '', '1', '1'),
(1170, '7.06.01.04-6', 'Geografia Econômica', '0001211', '', 0, '', '1', '1'),
(1171, '7.06.01.05-4', 'Geografia Política', '0001212', '', 0, '', '1', '1'),
(1172, '7.06.02.00-0', 'Geografia Regional', '0001213', '', 0, '', '1', '1'),
(1173, '7.06.02.01-8', 'Teoria do Desenvolvimento Regional', '0001214', '', 0, '', '1', '1'),
(1174, '7.06.02.02-6', 'Regionalização', '0001215', '', 0, '', '1', '1'),
(1175, '7.06.02.03-4', 'Análise Regional', '0001216', '', 0, '', '1', '1'),
(1176, '7.06.00.00-7', 'Geografia', '0001206', '', 1, '', '1', '1'),
(1177, '7.02.07.00-3', 'Outras Sociologias Específicas', '0001182', '', 1, '', '1', '1'),
(1178, '7.05.01.00-9', 'Teoria e Filosofia da História', '0001194', '', 1, '', '1', '1'),
(1179, '7.05.02.00-5', 'História Antiga e Medieval', '0001195', '', 1, '', '1', '1'),
(1180, '7.05.03.00-1', 'História Moderna e Contemporânea', '0001196', '', 1, '', '1', '1'),
(1181, '7.05.05.00-4', 'História do Brasil', '0001200', '', 1, '', '1', '1'),
(1182, '7.05.05.03-9', 'História do Brasil República', '0001203', '', 1, '', '1', '1'),
(1183, '7.07.01.01-6', 'História, Teorias e Sistemas em Psicologia', '0001219', '', 1, '', '1', '1'),
(1184, 'X.X.X.X.A', 'Metafísica', '0001168', '', 0, '', '0', '1'),
(1185, '7.07.01.02-4', 'Metodologia, Instrumentação e Equipamento em Psicologia', '0001220', '', 0, '', '1', '1'),
(1186, '7.07.01.03-2', 'Construção e Validade de Testes, Escalas e Outras Medidas Psicológicas', '0001221', '', 0, '', '1', '1'),
(1187, '7.07.01.04-0', 'Técnicas de Processamento Estatístico, Matemático e Computacional em Psicologia', '0001222', '', 0, '', '1', '1');
INSERT INTO `ajax_areadoconhecimento` (`id_aa`, `a_cnpq`, `a_descricao`, `a_codigo`, `a_geral`, `a_semic`, `a_ativo`, `a_submit`, `a_journal`) VALUES
(1188, '7.07.02.01-2', 'Processos Perceptuais e Motores', '0001224', '', 0, '', '1', '1'),
(1189, '7.07.02.02-0', 'Processos de Aprendizagem, Memória e Motivação', '0001225', '', 0, '', '1', '1'),
(1190, '7.07.00.00-1', 'Psicologia', '0001217', '', 1, '', '1', '1'),
(1191, '7.04.00.00-8', 'Arqueologia', '0001189', '', 0, '', '1', '1'),
(1192, '7.07.03.00-0', 'Psicologia Fisiológica', '0001228', '', 0, '', '1', '1'),
(1193, '7.07.03.02-7', 'Processos Psico-Fisiológicos', '0001230', '', 0, '', '1', '1'),
(1194, '7.07.03.03-5', 'Estimulação Elétrica e com Drogas (Comportamento)', '0001231', '', 0, '', '1', '1'),
(1195, '7.07.03.04-3', 'Psicobiologia', '0001232', '', 0, '', '1', '1'),
(1196, '7.07.04.00-7', 'Psicologia Comparativa', '0001233', '', 0, '', '1', '1'),
(1197, '7.07.04.01-5', 'Estudos Naturalísticos do Comportamento Animal', '0001234', '', 0, '', '1', '1'),
(1198, '7.07.04.02-3', 'Mecanismos Instintivos e Processos Sociais em Animais', '0001235', '', 0, '', '1', '1'),
(1199, '7.07.05.02-0', 'Processos Grupais e de Comunicação', '0001238', '', 0, '', '1', '1'),
(1200, '7.07.05.03-8', 'Papéis e Estruturas Sociais (Indivíduo)', '0001239', '', 0, '', '1', '1'),
(1201, '7.07.06.00-0', 'Psicologia Cognitiva', '0001240', '', 0, '', '1', '1'),
(1202, '7.07.07.01-4', 'Processos Perceptuais e Cognitivos (Desenvolvimento)', '0001242', '', 0, '', '1', '1'),
(1203, '7.07.07.02-2', 'Desenvolvimento Social e da Personalidade', '0001243', '', 0, '', '1', '1'),
(1204, '7.07.08.00-2', 'Psicologia do Ensino e da Aprendizagem', '0001244', '', 0, '', '1', '1'),
(1205, '7.07.08.01-0', 'Planejamento Institucional', '0001245', '', 0, '', '1', '1'),
(1206, '7.07.08.02-9', 'Programação de Condições de Ensino', '0001246', '', 0, '', '1', '1'),
(1207, '7.07.08.03-7', 'Treinamento de Pessoal', '0001247', '', 0, '', '1', '1'),
(1208, '7.07.08.04-5', 'Aprendizagem e Desempenho Acadêmicos', '0001248', '', 0, '', '1', '1'),
(1209, '7.07.08.05-3', 'Ensino e Aprendizagem na Sala de Aula', '0001249', '', 0, '', '1', '1'),
(1210, '7.07.09.00-9', 'Psicologia do Trabalho e Organizacional', '0001250', '', 0, '', '1', '1'),
(1211, '7.07.09.01-7', 'Análise Institucional', '0001251', '', 0, '', '1', '1'),
(1212, '7.07.09.04-1', 'Fatores Humanos no Trabalho', '0001254', '', 0, '', '1', '1'),
(1213, '7.07.10.01-5', 'Intervenção Terapêutica', '0001257', '', 0, '', '1', '1'),
(1214, '7.07.10.02-3', 'Programas de Atendimento Comunitário', '0001258', '', 0, '', '1', '1'),
(1215, '7.07.10.03-1', 'Treinamento e Reabilitação', '0001259', '', 0, '', '1', '1'),
(1216, '7.07.10.04-0', 'Desvios da Conduta', '0001260', '', 0, '', '1', '1'),
(1217, '7.07.10.05-8', 'Distúrbios da Linguagem', '0001261', '', 0, '', '1', '1'),
(1218, '7.07.10.06-6', 'Distúrbios Psicossomáticos', '0001262', '', 0, '', '1', '1'),
(1219, '7.08.01.06-1', 'Psicologia Educacional', '0001270', '', 1, '', '1', '1'),
(1220, '7.08.01.00-2', 'Fundamentos da Educação', '0001264', '', 0, '', '1', '1'),
(1221, '7.08.01.01-0', 'Filosofia da Educação', '0001265', '', 0, '', '1', '1'),
(1222, '7.08.01.03-7', 'Sociologia da Educação', '0001267', '', 0, '', '1', '1'),
(1223, '7.08.01.04-5', 'Antropologia Educacional', '0001268', '', 0, '', '1', '1'),
(1224, '7.07.05.00-3', 'Psicologia Social', '0001236', '', 1, '', '1', '1'),
(1225, '7.07.05.01-1', 'Relações Interpessoais', '0001237', '', 1, '', '1', '1'),
(1226, '7.07.07.00-6', 'Psicologia do Desenvolvimento Humano', '0001241', '', 1, '', '1', '1'),
(1227, '7.07.09.02-5', 'Recrutamento e Seleção de Pessoal', '0001252', '', 1, '', '1', '1'),
(1228, '7.07.09.03-3', 'Treinamento e Avaliação', '0001253', '', 1, '', '1', '1'),
(1229, '7.07.09.05-0', 'Planejamento Ambiental e Comportamento Humano', '0001255', '', 1, '', '1', '1'),
(1230, '7.07.10.00-7', 'Tratamento e Prevenção Psicológica', '0001256', '', 1, '', '1', '1'),
(1231, '7.08.01.02-9', 'História da Educação', '0001266', '', 1, '', '1', '1'),
(1232, '7.08.02.00-9', 'Administração Educacional', '0001271', '', 0, '', '1', '1'),
(1233, '7.08.02.01-7', 'Administração de Sistemas Educacionais', '0001272', '', 0, '', '1', '1'),
(1234, '7.08.02.02-5', 'Administração de Unidades Educativas', '0001273', '', 0, '', '1', '1'),
(1235, '7.08.03.00-5', 'Planejamento e Avaliação Educacional', '0001274', '', 0, '', '1', '1'),
(1236, '7.08.03.01-3', 'Política Educacional', '0001275', '', 0, '', '1', '1'),
(1237, '7.08.03.02-1', 'Planejamento Educacional', '0001276', '', 0, '', '1', '1'),
(1238, '7.08.00.00-6', 'Educação', '0001263', '', 1, '', '1', '1'),
(1239, '7.09.01.00-7', 'Teoria Política', '0001298', '', 0, '', '1', '1'),
(1240, '7.09.01.01-5', 'Teoria Política Clássica', '0001299', '', 0, '', '1', '1'),
(1241, '7.08.04.03-6', 'Tecnologia Educacional', '0001281', '', 0, '', '1', '1'),
(1242, '7.08.04.04-4', 'Avaliação da Aprendizagem', '0001282', '', 0, '', '1', '1'),
(1243, '7.08.05.00-8', 'Currículo', '0001283', '', 0, '', '1', '1'),
(1244, '7.08.05.01-6', 'Teoria Geral de Planejamento e Desenvolvimento Curricular', '0001284', '', 0, '', '1', '1'),
(1245, '7.08.05.02-4', 'Currículos Específicos para Níveis e Tipos de Educação', '0001285', '', 0, '', '1', '1'),
(1246, '7.08.06.00-4', 'Orientação e Aconselhamento', '0001286', '', 0, '', '1', '1'),
(1247, '7.08.06.01-2', 'Orientação Educacional', '0001287', '', 0, '', '1', '1'),
(1248, '7.08.06.02-0', 'Orientação Vocacional', '0001288', '', 0, '', '1', '1'),
(1249, '7.08.07.00-0', 'Tópicos Específicos de Educação', '0001289', '', 0, '', '1', '1'),
(1250, '7.08.07.01-9', 'Educação de Adultos', '0001290', '', 0, '', '1', '1'),
(1251, '7.08.07.02-7', 'Educação Permanente', '0001291', '', 0, '', '1', '1'),
(1252, '7.08.07.03-5', 'Educação Rural', '0001292', '', 0, '', '1', '1'),
(1253, '7.08.07.04-3', 'Educação em Periferias Urbanas', '0001293', '', 0, '', '1', '1'),
(1254, '7.08.07.05-1', 'Educação Especial', '0001294', '', 0, '', '1', '1'),
(1255, '7.08.07.06-0', 'Educação Pré-Escolar', '0001295', '', 0, '', '1', '1'),
(1256, '7.08.07.07-8', 'Ensino Profissionalizante', '0001296', '', 0, '', '1', '1'),
(1257, '7.10.01.00-0', 'História da Teologia', '0001325', '', 1, '', '1', '1'),
(1258, '7.09.01.02-3', 'Teoria Política Medieval', '0001300', '', 0, '', '1', '1'),
(1259, '7.09.01.03-1', 'Teoria Política Moderna', '0001301', '', 0, '', '1', '1'),
(1260, '7.09.01.04-0', 'Teoria Política Contemporânea', '0001302', '', 0, '', '1', '1'),
(1261, '7.09.02.00-3', 'Estado e Governo', '0001303', '', 0, '', '1', '1'),
(1262, '7.09.02.01-1', 'Estrutura e Transformação do Estado', '0001304', '', 0, '', '1', '1'),
(1263, '7.09.02.02-0', 'Sistemas Governamentais Comparados', '0001305', '', 0, '', '1', '1'),
(1264, '7.09.02.03-8', 'Relações Intergovernamentais', '0001306', '', 0, '', '1', '1'),
(1265, '7.09.02.04-6', 'Estudos do Poder Local', '0001307', '', 0, '', '1', '1'),
(1266, '7.09.02.05-4', 'Instituições Governamentais Específicas', '0001308', '', 0, '', '1', '1'),
(1267, '7.09.03.00-0', 'Comportamento Político', '0001309', '', 0, '', '1', '1'),
(1268, '7.09.03.02-6', 'Atitude e Ideologias Políticas', '0001311', '', 0, '', '1', '1'),
(1269, '7.09.03.03-4', 'Conflitos e Coalizões Políticas', '0001312', '', 0, '', '1', '1'),
(1270, '7.09.03.04-2', 'Comportamento Legislativo', '0001313', '', 0, '', '1', '1'),
(1271, '7.09.03.05-0', 'Classes Sociais e Grupos de Interesse', '0001314', '', 0, '', '1', '1'),
(1272, '7.09.04.01-4', 'Análise do Processo Decisório', '0001316', '', 0, '', '1', '1'),
(1273, '7.09.04.02-2', 'Análise Institucional', '0001317', '', 0, '', '1', '1'),
(1274, '7.09.04.03-0', 'Técnicas de Antecipação', '0001318', '', 0, '', '1', '1'),
(1275, '7.09.05.00-2', 'Política Internacional', '0001319', '', 0, '', '1', '1'),
(1276, '7.09.05.02-9', 'Organizações Internacionais', '0001321', '', 0, '', '1', '1'),
(1277, '7.09.05.03-7', 'Integração Internacional, Conflito, Guerra e Paz', '0001322', '', 0, '', '1', '1'),
(1278, '7.09.04.00-6', 'Políticas Públicas', '0001315', '', 1, '', '1', '1'),
(1279, '7.09.05.04-5', 'Relações Internacionais, Bilaterais e Multilaterais', '0001323', '', 0, '', '1', '1'),
(1280, '7.09.00.00-0', 'Ciência Política', '0001297', '', 1, '', '1', '1'),
(1281, '7.10.00.00-3', 'Teologia', '0001324', '', 1, '', '1', '1'),
(1282, '7.08.04.01-0', 'Teorias da Instrução', '0001279', '', 0, '', '1', '1'),
(1283, '8.01.02.00-0', 'Fisiologia da Linguagem', '0001332', '', 0, '', '1', '1'),
(1284, '8.01.03.00-6', 'Lingüística Histórica', '0001333', '', 0, '', '1', '1'),
(1285, '8.01.04.00-2', 'Sociolingüística e Dialetologia', '0001334', '', 0, '', '1', '1'),
(1286, '8.01.05.00-9', 'Psicolingüística', '0001335', '', 0, '', '1', '1'),
(1287, '8.01.00.00-7', 'Lingüística', '0001330', '', 1, '', '1', '1'),
(1288, '8.02.01.00-8', 'Língua Portuguesa', '0001338', '', 0, '', '1', '1'),
(1289, '8.02.02.00-4', 'Línguas Estrangeiras Modernas', '0001339', '', 0, '', '1', '1'),
(1290, '8.02.03.00-0', 'Línguas Clássicas', '0001340', '', 0, '', '1', '1'),
(1291, '8.02.04.00-7', 'Línguas Indígenas', '0001341', '', 0, '', '1', '1'),
(1292, '8.02.07.00-6', 'Outras Literaturas Vernáculas', '0001344', '', 0, '', '1', '1'),
(1293, '8.02.08.00-2', 'Literaturas Estrangeiras Modernas', '0001345', '', 0, '', '1', '1'),
(1294, '8.02.09.00-9', 'Literaturas Clássicas', '0001346', '', 0, '', '1', '1'),
(1295, '8.02.10.00-7', 'Literatura Comparada', '0001347', '', 0, '', '1', '1'),
(1296, '8.02.00.00-1', 'Letras', '0001337', '', 1, '', '1', '1'),
(1297, 'X.XX.XX.XX.XX', 'neurologia', '0001387', '', 0, '0', '0', '1'),
(1298, '8.03.01.00-2', 'Fundamentos e Crítica das Artes', '0001349', '', 0, '', '1', '1'),
(1299, '8.03.01.01-0', 'Teoria da Arte', '0001350', '', 0, '', '1', '1'),
(1300, '8.03.01.03-7', 'Crítica da Arte', '0001352', '', 0, '', '1', '1'),
(1301, '8.03.02.00-9', 'Artes Plásticas', '0001353', '', 0, '', '1', '1'),
(1302, '8.03.02.01-7', 'Pintura', '0001354', '', 0, '', '1', '1'),
(1303, '8.03.02.02-5', 'Desenho', '0001355', '', 0, '', '1', '1'),
(1304, '8.03.02.03-3', 'Gravura', '0001356', '', 0, '', '1', '1'),
(1305, '8.03.02.04-1', 'Escultura', '0001357', '', 0, '', '1', '1'),
(1306, '8.03.02.06-8', 'Tecelagem', '0001359', '', 0, '', '1', '1'),
(1307, '8.03.03.01-3', 'Regência', '0001361', '', 0, '', '1', '1'),
(1308, '8.03.03.02-1', 'Instrumentação Musical', '0001362', '', 0, '', '1', '1'),
(1309, '8.03.03.03-0', 'Composição Musical', '0001363', '', 0, '', '1', '1'),
(1310, '8.03.03.04-8', 'Canto', '0001364', '', 0, '', '1', '1'),
(1311, '8.03.04.00-1', 'Dança', '0001365', '', 0, '', '1', '1'),
(1312, '8.03.04.02-8', 'Coreografia', '0001367', '', 0, '', '1', '1'),
(1313, '8.03.05.00-8', 'Teatro', '0001368', '', 0, '', '1', '1'),
(1314, '8.03.08.04-0', 'Interpretação Cinematográfica', '0001379', '', 0, '', '1', '1'),
(1315, '8.03.00.00-6', 'Artes', '0001348', '', 1, '', '1', '1'),
(1316, '2.02.00.00-X', 'Biotecnologia', '0001391', '', 1, '', '1', '1'),
(1317, '4.01.00.01-X', 'Pediatria', '0001424', '', 1, '', '1', '1'),
(1318, '4.00.00.02-X', 'Técnologia em Saúde', '0001425', '', 1, '', '1', '1'),
(1319, '7.10.03.00-2', 'Teologia Sistemática', '0001327', '', 1, '', '1', '1'),
(1320, '8.01.06.00-5', 'Lingüística Aplicada', '0001336', '', 1, '', '1', '1'),
(1321, '8.02.05.00-3', 'Teoria Literária', '0001342', '', 1, '', '1', '1'),
(1322, '8.02.06.00-0', 'Literatura Brasileira', '0001343', '', 1, '', '1', '1'),
(1323, '8.03.01.02-9', 'História da Arte', '0001351', '', 1, '', '1', '1'),
(1324, '8.03.03.00-5', 'Música', '0001360', '', 1, '', '1', '1'),
(1325, '4.01.01.00-X', 'Gerontologia', '0001420', '', 0, '', '1', '1'),
(1326, '4.01.01.02-X', 'Dermatofuncional', '0001427', '', 1, '1', '1', '1'),
(1327, '4.02.11.00-X', 'Implantodontia', '0001384', '', 0, '', '1', '1'),
(1328, '6.01.04.01-X', 'Direito ambiental', '0001396', '', 1, '', '1', '1'),
(1329, '4.02.14.00-X', 'Patologia Bucal', '0001393', '', 0, '', '1', '1'),
(1330, '4.06.00.01-X', 'Saúde do Idoso', '0001421', '', 0, '', '1', '1'),
(1331, '4.06.03.00-X', 'Saúde Ambiental', '0001394', '', 0, '', '1', '1'),
(1332, '9.05.00.00-X', 'Meio Ambiente e Sustentabilidade', '0001407', '', 0, '', '0', '1'),
(1333, '9.03.00.00-X', 'Energia', '0001405', '', 1, '', '1', '1'),
(1334, '4.06.06.00-X', 'Saúde da Mulher', '0001419', '', 0, '', '1', '1'),
(1335, 'X2.00.00.00-X', 'Biologia Teste', '0001426', '', 0, '', '0', '1'),
(1336, '1.03.02.02-6', 'Modelos Analíticos e de Simulação', '0000144', '', 0, '', '0', '1'),
(1337, '1.03.03.01-4', 'Linguagens de Programação', '0000146', '', 0, '', '0', '1'),
(1338, '1.03.03.03-0', 'Banco de Dados', '0000148', '', 0, '', '0', '1'),
(1339, '1.03.04.03-7', 'Software Básico', '0000154', '', 0, '', '1', '1'),
(1340, '1.03.04.04-5', 'Teleinformática', '0000155', '', 0, '', '1', '1'),
(1341, '1.02.02.00-5', 'Estatística', '0000126', '', 1, '', '1', '1'),
(1342, '1.02.02.08-0', 'Análise de Dados', '0000134', '', 1, '', '1', '1'),
(1343, '1.06.01.05-8', 'Química dos Produtos Naturais', '0000239', '', 1, '', '1', '1'),
(1344, '2.05.02.00-1', 'Ecologia de Ecossistemas', '0000372', '', 1, '', '1', '1'),
(1345, '2.10.06.00-8', 'Etnofarmacologia', '0000415', '', 1, '', '1', '1'),
(1346, '3.01.03.03-7', 'Mecânicas dos Solos', '0000453', '', 1, '', '1', '1'),
(1347, '9.02.00.00-X', 'Saúde', '0001404', '', 1, '', '1', '1'),
(1348, '3.03.03.06-0', 'Tratamento Térmicos, Mecânicos e Químicos', '0000491', '', 1, '', '1', '1'),
(1349, '3.04.03.03-0', 'Circuitos Eletrônicos', '0000521', '', 1, '', '1', '1'),
(1350, '3.06.02.01-7', 'Reatores Químicos', '0000574', '', 1, '', '1', '1'),
(1351, '6.01.04.03-X', 'Direito Eleitoral', '0001470', '', 1, '', '1', '1'),
(1352, '6.01.04.04-X', 'Direito do Consumidor', '0001469', '', 1, '', '1', '1'),
(1353, '6.01.04.05-X', 'Direito Urbanístico', '0001468', '', 1, '', '1', '1'),
(1354, '6.01.02.08-1', 'Direito Econômico', '', '', 0, '', '1', '1'),
(1355, '6.01.02.09-1', 'Direito Financeiro', '', '', 0, '', '0', '1'),
(1356, '5.01.01.05-6', 'Fertilidade do Solo e Adubação', '0000828', '', 1, '', '1', '1'),
(1357, '3.07.04.05-7', 'Controle da Poluição', '0000626', '', 1, '', '1', '1'),
(1358, '3.12.05.04-6', 'Motores Alternativos', '0000726', '', 1, '', '1', '1'),
(1359, '4.01.01.15-0', 'Ginecologia e Obstetrícia', '0000762', '', 1, '', '1', '1'),
(1360, '4.01.02.13-0', 'Anestesiologia', '0000779', '', 1, '', '1', '1'),
(1361, '4.06.05.00-X', 'Saúde do trabalhador', '0001395', '', 1, '', '1', '1'),
(1362, '4.08.00.01-X', 'Fisioterapia Desportiva', '0001423', '', 1, '', '1', '1'),
(1363, '5.02.04.00-9', 'Tecnologia e Utilização de Produtos Florestais', '0000870', '', 1, '', '1', '1'),
(1364, '5.05.03.00-6', 'Patologia Animal', '0000933', '', 1, '', '1', '1'),
(1365, '6.01.01.07-5', 'Sociologia Jurídica', '0000987', '', 1, '', '1', '1'),
(1366, '6.02.01.00-2', 'Administração de Empresas', '0001004', '', 1, '', '1', '1'),
(1367, 'X.X.X.X.X.X', 'Engenharia de Software', '0000147', '', 0, '', '0', '1'),
(1368, 'XXXXAA', 'XAXA', '0001467', '', 0, '', '0', '0'),
(1369, 'X.A.X.A.Q', 'Hidroterapia', '0001422', '', 0, '', '0', '1'),
(1370, '6.03.09.01-6', 'Economia Regional', '0001057', '', 1, '', '1', '1'),
(1371, '6.06.05.03-0', 'Nupcialidade e Família', '0001120', '', 1, '', '1', '1'),
(1372, '7.02.04.00-4', 'Sociologia Urbana', '0001179', '', 1, '', '1', '1'),
(1373, '7.07.02.00-4', 'Psicologia Experimental', '0001223', '', 1, '', '1', '1'),
(1374, '7.08.07.08-X', 'Educação Ambiental', '0001402', '', 1, '', '1', '1'),
(1375, '7.09.03.01-8', 'Estudos Eleitorais e Partidos Políticos', '0001310', '', 1, '', '1', '1'),
(1376, '7.10.02.00-6', 'Teologia Moral', '0001326', '', 1, '', '1', '1'),
(1377, '8.03.04.01-0', 'Execução da Dança', '0001366', '', 1, '', '1', '1'),
(1378, '4.08.00.03-X', 'Metodologia Científica', '', '', 1, '', '1', '1'),
(1379, '4.09.00.00-2', 'Educação Física', '0000820', '', 1, '', '1', '1'),
(1380, '4.01.07.00-1', 'Neuropediatria', '', '', 1, '', '1', '1'),
(1381, '6.00.00.00-7', 'Ciências Sociais Aplicadas', '0000978', '', 0, '', '1', '1'),
(1382, '0.00.00.00-0', '::SEM AREA DEFINIDA::', '0001418', '', 1, '', '1', '1'),
(1383, '9.20.00.00-X', 'Direitos Humanos - Programa Ciência e Transcendência', '', '', 1, '', '1', ''),
(1384, 'X.X.X.V.X.A', 'Astrofísica Estelar', '0001447', '', 0, '', '0', '1'),
(1385, 'X.A.X.A.X', 'Lógica', '0001169', '', 0, '', '0', '1'),
(1386, 'X.A.A.Q', 'Direito Registral e Notarial', '', '', 0, '', '0', '1'),
(1387, 'X.X.Q.A.Q', 'XAXA', '', '', 0, '', '0', '0'),
(1388, 'XXQQW', 'QWQWQ', '', '', 0, '', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `centro_resultado`
--

CREATE TABLE IF NOT EXISTS `centro_resultado` (
`id_cr` bigint(20) unsigned NOT NULL,
  `cr_nr` int(11) NOT NULL,
  `cr_descricao` varchar(200) NOT NULL,
  `cr_ordenador_necessidade` char(8) NOT NULL,
  `cr_ordenador_gasto` char(8) NOT NULL,
  `cr_ativo` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=299 ;

--
-- Dumping data for table `centro_resultado`
--

INSERT INTO `centro_resultado` (`id_cr`, `cr_nr`, `cr_descricao`, `cr_ordenador_necessidade`, `cr_ordenador_gasto`, `cr_ativo`) VALUES
(1, 0, 'CR A ASSOCIAR', '', '', 1),
(2, 1, 'Administração da Graduação em Pedagogia - Curitiba', '', '', 1),
(3, 64, 'Administração da Graduação em Odontologia - Curiti', '', '', 1),
(4, 407, 'Engenharia Mecânica', '', '', 1),
(5, 408, 'Informática Aplicada', '', '', 1),
(6, 415, 'Administração', '', '', 1),
(7, 418, 'Engenharia de Produção e Sistemas', '', '', 1),
(8, 814, 'Gestão Urbana', '', '', 1),
(9, 2050, 'GRADUAÇÃO - CWB - INATIVOS - ESCOLA POLITÉCNICA', '', '', 1),
(10, 2192, 'GRADUAÇÃO - SJP - INATIVOS - ESCOLA DE CIÊNC. AGR.', '', '', 1),
(11, 2420, 'Administração da Graduação em Agronomia - Toledo', '', '', 1),
(12, 3498, 'Administração da Graduação em Biologia - Curitiba', '', '', 1),
(13, 3507, 'Administração da Graduação em Enfermagem - Curitib', '', '', 1),
(14, 3541, 'Administração da Graduação em Medicina - Curitiba', '', '', 1),
(15, 3557, 'Administração da Graduação em Odontologia - Curiti', '', '', 1),
(16, 3795, 'Administração da Graduação em Engenharia Ambiental', '', '', 1),
(17, 3803, 'Administração da Graduação em Engenharia Civil Cur', '', '', 1),
(18, 3811, 'Administração da Graduação em Engenharia de Alimen', '', '', 1),
(19, 3820, 'Administração da Graduação em Engenharia de Comput', '', '', 1),
(20, 3838, 'Administração da Graduação em Engenharia de Produç', '', '', 1),
(21, 3852, 'Administração da Graduação em Engenharia Elétrica', '', '', 1),
(22, 3860, 'Administração da Graduação em Engenharia Mecânica', '', '', 1),
(23, 4076, 'GRADUAÇÃO - CWB - INATIVOS - ESCOLA DE COMUNICAÇÃO', '', '', 1),
(24, 4093, 'Administração da Graduação em Direito Curitiba', '', '', 1),
(25, 4572, 'Administração da Graduação em Administração - SJP', '', '', 1),
(26, 4588, 'Administração da Graduação em Ciências Contábeis -', '', '', 1),
(27, 4753, 'Administração da Graduação em Medicina Veterinária', '', '', 1),
(28, 6452, 'Lab. de Controle de Poluição - BL III PQ TEC', '', '', 1),
(29, 6453, 'Lab. de Simulação Térmica - CCET', '', '', 1),
(30, 6454, 'Lab. de Sistemas Térmicos - CCET', '', '', 1),
(31, 6828, 'Central de Processamento de Dados - PPGIA', '', '', 1),
(32, 6833, 'Lab. de Comutação - BL II PQ TEC', '', '', 1),
(33, 6836, 'Lab. de Engenharia de Reabilitação - LER', '', '', 1),
(34, 6838, 'Lab. de Informática em Saúde - LAIS - BL II PQ TEC', '', '', 1),
(35, 6840, 'Lab. de Redes I - BL II PQ TEC', '', '', 1),
(36, 6841, 'Lab. de Sistemas Distribuídos - LASID', '', '', 1),
(37, 6844, 'Lab. de Transmissão - REMAV - BL II PQ TEC', '', '', 1),
(38, 6851, 'Lab.s de Análises Ambientais - BL III PQ TEC', '', '', 1),
(39, 6870, 'Lab. de Metalografia - BL III PQ TEC', '', '', 1),
(40, 6875, 'Lab. de Estruturas - BL III PQ TEC', '', '', 1),
(41, 6880, 'Lab. de Termodinâmica Aplicada - BL III PQ TEC', '', '', 1),
(42, 6881, 'Lab. de Topografia - BL III PQ TEC', '', '', 1),
(43, 6883, 'Lab. de Usinagem - LAUS - BL III PQ TEC', '', '', 1),
(44, 6885, 'LAS II - Lab Grupo Pesq de Sist Autom Integrados', '', '', 1),
(45, 6924, 'Lab. de Farmacologia - CCBS', '', '', 1),
(46, 6925, 'Lab. de Fisiologia Animal - CCBS', '', '', 1),
(47, 6927, 'Lab. de Fisiologia Vegetal e Genética - CCBS', '', '', 1),
(48, 6928, 'Lab. de Bioquímica - CCBS', '', '', 1),
(49, 6933, 'Lab. de Tecnologia Farmacêutica - CCBS', '', '', 1),
(50, 6935, 'Lab. de Farmacotécnica - CCBS', '', '', 1),
(51, 6955, 'Núcleo de Células Humanas Prod. de Insulina - CCBS', '', '', 1),
(52, 6956, 'Lab. de Engenharia e Transplante Celular', '', '', 1),
(53, 6966, 'Lab. Bio-Informática - CCAA', '', '', 1),
(54, 7052, 'LAS VIII - Lab. de Controle de Processos', '', '', 1),
(55, 7065, 'Núcleo de Cardiomioplastia Celular - BL IV PQ TEC', '', '', 1),
(56, 7069, 'Núcleo de Enxertos Cardiovasculares - BL IV PQ TEC', '', '', 1),
(57, 7073, 'Núcleo de Imunogenética - BL IV PQ TEC', '', '', 1),
(58, 7118, 'Adm. Stricto Sensu - CWB - Escola de Negócios', '', '', 1),
(59, 7119, 'Adm. Lato Sensu - CWB - Escola de Saúde e Biociênc', '', '', 1),
(60, 7122, 'Adm. Stricto Sensu - CWB - Escola de Medicina', '', '', 1),
(61, 7128, 'Adm. Stricto Sensu - CWB - Escola Politécnica', '', '', 1),
(62, 7158, 'Adm. Stricto Sensu - CWB - Escola de Educação e Hu', '', '', 1),
(63, 7298, 'Laboratório de Usabilidade - BL IV PQ TEC', '', '', 1),
(64, 8785, 'Odontologia', '', '', 1),
(65, 9027, 'Engenharia Mecânica', '', '', 1),
(66, 9264, 'Educação', '', '', 1),
(67, 9928, 'Gestão Urbana', '', '', 1),
(68, 10000, 'Engenharia de Produção e Sistemas', '', '', 1),
(69, 10222, 'Laboratório de Análises - Engª Ambiental - BL III', '', '', 1),
(70, 10528, 'Adm do Bloco I do Parque Tecnológico', '', '', 1),
(71, 20100, 'Adm. da Escola de Saúde e Biociências - CWB', '', '', 1),
(72, 20200, 'Adm. da Escola Politécnica - CWB', '', '', 1),
(73, 20220, 'Lab. de Modelos - CCET', '', '', 1),
(74, 20234, 'Administração do Bloco III do Parque Tecnológico', '', '', 1),
(75, 20237, 'Administração do Bloco II do Parque Tecnológico', '', '', 1),
(76, 20300, 'Adm. da Escola de Direito - CWB', '', '', 1),
(77, 20314, 'Lab. de Comunicação', '', '', 1),
(78, 20400, 'Adm. da Escola de Educação e Humanidades - CWB', '', '', 1),
(79, 20500, 'Adm. da Escola da Negócios - CWB', '', '', 1),
(80, 20725, 'Hospital Veterinário -CCAA', '', '', 1),
(81, 20728, 'Unidade Hosp. Animais de Fazenda (UHAF) - CCAA', '', '', 1),
(82, 20800, 'Administração do Campus SJP', '', '', 1),
(83, 20813, 'Lab. de Biologia Molecular (Genoma) - CCAA', '', '', 1),
(84, 28821, 'Laboratório de Análises de Solos - Prestação de Se', '', '', 1),
(85, 28822, 'Setor de Piscicultura', '', '', 1),
(86, 40103, 'Clínica de Psicologia - CCBS', '', '', 1),
(87, 40104, 'Núcleo de Práticas Jurídicas - NPJ - CCJS', '', '', 1),
(88, 40105, 'Núcleo de Práticas Jurídicas - NPJ - CCSA SJP', '', '', 1),
(89, 41302, 'CR A ASSOCIAR', '', '', 1),
(90, 41700, 'Clínica de Fisioterapia e Reabilitação - CCBS', '', '', 1),
(91, 41801, 'Clínica Odontológica - CCBS', '', '', 1),
(92, 50108, 'Lab.s de Apoio - CCAA', '', '', 1),
(93, 70204, 'Lab. de Apoio - CCJE', '', '', 1),
(94, 70305, 'Lab. de Avaliação Nutricional - CCAS', '', '', 1),
(95, 100059, 'CR A ASSOCIAR', '', '', 1),
(96, 101026, 'Compras AS', '', '', 1),
(97, 101063, 'Setor de Captação de Recursos e Projetos AS', '', '', 1),
(98, 101079, 'Prédio Ginásio', '', '', 1),
(99, 101086, 'Hotelaria APC - HUC', '', '', 1),
(100, 101102, 'Convênios Educação', '', '', 1),
(101, 101108, 'CR A ASSOCIAR', '', '', 1),
(102, 101111, 'Convênios Educação', '', '', 1),
(103, 101122, 'Convênios Educação', '', '', 1),
(104, 101136, 'CR A ASSOCIAR', '', '', 1),
(105, 101139, 'CR A ASSOCIAR', '', '', 1),
(106, 101143, 'CR A ASSOCIAR', '', '', 1),
(107, 101156, 'CR A ASSOCIAR', '', '', 1),
(108, 101162, 'CR A ASSOCIAR', '', '', 1),
(109, 101163, 'CR A ASSOCIAR', '', '', 1),
(110, 101164, 'CR A ASSOCIAR', '', '', 1),
(111, 101167, 'Despesas Mantenedora', '', '', 1),
(112, 101174, 'Administração da Diretoria de Negócios Suplementar', '', '', 1),
(113, 101177, 'Adm. Diretoria Financeira', '', '', 1),
(114, 101184, 'CR A ASSOCIAR', '', '', 1),
(115, 101185, 'CR A ASSOCIAR', '', '', 1),
(116, 101188, 'Setor de Planejamento de Negócios', '', '', 1),
(117, 101193, 'CR A ASSOCIAR', '', '', 1),
(118, 101194, 'CR A ASSOCIAR', '', '', 1),
(119, 101195, 'CR A ASSOCIAR', '', '', 1),
(120, 101198, 'Setor de Contabilidade', '', '', 1),
(121, 101205, 'Setor de Finanças', '', '', 1),
(122, 101210, 'Controladoria', '', '', 1),
(123, 101216, 'Administração da Diretoria de Gestão de Pessoas', '', '', 1),
(124, 101225, 'Núcleo do Refeitório Campus Curitiba', '', '', 1),
(125, 101231, 'Administração da Diretoria de Tecnologia', '', '', 1),
(126, 101268, 'Núcleo de Compras', '', '', 1),
(127, 101269, 'Núcleo de Almoxarifado', '', '', 1),
(128, 101276, 'Núcleo Segurança e Contr Tráfego - APC - Curitiba', '', '', 1),
(129, 101287, 'Centro de Competência Técnica', '', '', 1),
(130, 101311, 'Núcleo NTE', '', '', 1),
(131, 101313, 'Administração do Setor de Esportes', '', '', 1),
(132, 101329, 'Residência Marista PUC', '', '', 1),
(133, 101331, 'Superintendência Executiva', '', '', 1),
(134, 101333, 'Assessoria Jurídica', '', '', 1),
(135, 101335, 'Diretoria de Marketing - APC', '', '', 1),
(136, 101344, 'Setor de Tecnologia', '', '', 1),
(137, 101367, 'Núcleo de Transportes', '', '', 1),
(138, 101377, 'Gerência de Medicina Ocupacional - APC', '', '', 1),
(139, 101395, 'CR A ASSOCIAR', '', '', 1),
(140, 101405, 'Setor de Infraestrutura', '', '', 1),
(141, 101417, 'Gerência BP Saúde', '', '', 1),
(142, 101441, 'CR A ASSOCIAR', '', '', 1),
(143, 101450, 'CR A ASSOCIAR', '', '', 1),
(144, 101451, 'CR A ASSOCIAR', '', '', 1),
(145, 101452, 'CR A ASSOCIAR', '', '', 1),
(146, 101453, 'CR A ASSOCIAR', '', '', 1),
(147, 101469, 'CR A ASSOCIAR', '', '', 1),
(148, 101470, 'CR A ASSOCIAR', '', '', 1),
(149, 101471, 'Convênios Educação', '', '', 1),
(150, 101476, 'CR A ASSOCIAR', '', '', 1),
(151, 101481, 'CR A ASSOCIAR', '', '', 1),
(152, 101482, 'CR A ASSOCIAR', '', '', 1),
(153, 101483, 'CR A ASSOCIAR', '', '', 1),
(154, 101487, 'Convênios Educação', '', '', 1),
(155, 101488, 'CR A ASSOCIAR', '', '', 1),
(156, 101490, 'CR A ASSOCIAR', '', '', 1),
(157, 101491, 'CR A ASSOCIAR', '', '', 1),
(158, 101492, 'CR A ASSOCIAR', '', '', 1),
(159, 101521, 'CR A ASSOCIAR', '', '', 1),
(160, 101522, 'Assessoria de Relações Institucionais', '', '', 1),
(161, 101526, 'Convênio APC Educação Infantil - 18.892', '', '', 1),
(162, 101527, 'CR A ASSOCIAR', '', '', 1),
(163, 101530, 'Setor de Governança', '', '', 1),
(164, 101531, 'CR A ASSOCIAR', '', '', 1),
(165, 101533, 'Convênios Educação', '', '', 1),
(166, 101534, 'CR A ASSOCIAR', '', '', 1),
(167, 101539, 'CR A ASSOCIAR', '', '', 1),
(168, 101544, 'CR A ASSOCIAR', '', '', 1),
(169, 101558, 'CR A ASSOCIAR', '', '', 1),
(170, 101559, 'CR A ASSOCIAR', '', '', 1),
(171, 101562, 'CR A ASSOCIAR', '', '', 1),
(172, 101571, 'Convênios Educação', '', '', 1),
(173, 101598, 'CR A ASSOCIAR', '', '', 1),
(174, 101601, 'Setor de Contratos e Convênios', '', '', 1),
(175, 101603, 'CR A ASSOCIAR', '', '', 1),
(176, 101610, 'Convênios Educação', '', '', 1),
(177, 101612, 'CR A ASSOCIAR', '', '', 1),
(178, 101613, 'CR A ASSOCIAR', '', '', 1),
(179, 101617, 'Convênios Educação', '', '', 1),
(180, 101621, 'Gabinete da Presidência', '', '', 1),
(181, 101622, 'Gestão de Bens Patrimoniais APC', '', '', 1),
(182, 101625, 'Centro de Competência Técnica', '', '', 1),
(183, 101652, 'Centro de Competência Técnica', '', '', 1),
(184, 101665, 'Centro de Competência Técnica', '', '', 1),
(185, 101684, 'CR A ASSOCIAR', '', '', 1),
(186, 101692, 'CR A ASSOCIAR', '', '', 1),
(187, 101695, 'CR A ASSOCIAR', '', '', 1),
(188, 101699, 'Convênios Educação', '', '', 1),
(189, 101717, 'Gabinete da Diretoria HUC', '', '', 1),
(190, 101718, 'CR A ASSOCIAR', '', '', 1),
(191, 101837, 'CR A ASSOCIAR', '', '', 1),
(192, 101839, 'Convênios Educação', '', '', 1),
(193, 101841, 'Convênios Educação', '', '', 1),
(194, 101847, 'Convênios Educação', '', '', 1),
(195, 101848, 'Convênios Educação', '', '', 1),
(196, 101856, 'CR A ASSOCIAR', '', '', 1),
(197, 101882, 'Convênio HUC', '', '', 1),
(198, 101883, 'CR A ASSOCIAR', '', '', 1),
(199, 101903, 'CR A ASSOCIAR', '', '', 1),
(200, 101907, 'CR A ASSOCIAR', '', '', 1),
(201, 101914, 'CR A ASSOCIAR', '', '', 1),
(202, 101916, 'CR A ASSOCIAR', '', '', 1),
(203, 101918, 'CR A ASSOCIAR', '', '', 1),
(204, 101922, 'CR A ASSOCIAR', '', '', 1),
(205, 101924, 'CR A ASSOCIAR', '', '', 1),
(206, 101958, 'CR A ASSOCIAR', '', '', 1),
(207, 101992, 'CR A ASSOCIAR', '', '', 1),
(208, 101993, 'CR A ASSOCIAR', '', '', 1),
(209, 101995, 'CR A ASSOCIAR', '', '', 1),
(210, 102002, 'Gabinete da Diretoria HUC', '', '', 1),
(211, 102012, 'Nutrição HUC', '', '', 1),
(212, 102023, 'Secretaria Acadêmica HUC', '', '', 1),
(213, 102030, 'Pronto Socorro HUC', '', '', 1),
(214, 102036, 'Centro Cirúrgico HUC', '', '', 1),
(215, 102040, 'Equipe de Terapia Intensiva HUC', '', '', 1),
(216, 102041, 'Unidade de Terapia Intensiva 1 HUC', '', '', 1),
(217, 102042, 'Unidade de Terapia Intensiva 2 HUC', '', '', 1),
(218, 102045, 'Equipe de Unidades de Internação HUC', '', '', 1),
(219, 102048, 'Unidade de Internação 3 HUC', '', '', 1),
(220, 102049, 'Unidade de Internação 4 HUC', '', '', 1),
(221, 102053, 'Unidade de Internação 8 HUC', '', '', 1),
(222, 102058, 'Gerencia Administrativa HUC', '', '', 1),
(223, 102059, 'Laboratório de Análises Clínicas HUC', '', '', 1),
(224, 102060, 'Laboratório de Imunogenética HUC', '', '', 1),
(225, 102061, 'Serviço de Radiologia Convencional HUC', '', '', 1),
(226, 102064, 'Serviço de Tomografia HUC', '', '', 1),
(227, 102090, 'Centro de Atendimento Médico', '', '', 1),
(228, 102093, 'Núcleo de Epidemiologia e Controle de Infecção Hos', '', '', 1),
(229, 102101, 'Gerência de Enfermagem HUC', '', '', 1),
(230, 102102, 'Unidade de Terapia Intensiva 4 HUC', '', '', 1),
(231, 102108, 'Unidade de Internação 6 HUC', '', '', 1),
(232, 102116, 'Setor de faturamento HUC', '', '', 1),
(233, 102117, 'Ambulatório HUC', '', '', 1),
(234, 102373, 'Prédio do Hospital Universitário Cajuru', '', '', 1),
(235, 102380, 'Residência Médica HUC', '', '', 1),
(236, 103051, 'Diretoria de Suporte Operacional e Acadêmico', '', '', 1),
(237, 103054, 'Relacionamento', '', '', 1),
(238, 103099, 'Projetos Tecnoparque', '', '', 1),
(239, 103101, 'Prédio Acadêmico', '', '', 1),
(240, 103246, 'Administração da Reitoria', '', '', 1),
(241, 103247, 'Administração da PUCPR Campus Curitiba', '', '', 1),
(242, 103250, 'Adm da Pró-Reitoria de Graduação', '', '', 1),
(243, 103251, 'Adm da Pró-Reitoria Adm. e de Desenvolvimento', '', '', 1),
(244, 103252, 'Núcleo de Processos Seletivos', '', '', 1),
(245, 103266, 'Biblioteca Central', '', '', 1),
(246, 103268, 'Administração da Diretoria de Educação a Distância', '', '', 1),
(247, 103269, 'Núcleo PUC WEB', '', '', 1),
(248, 103275, 'Núcleo da Pastoral', '', '', 1),
(249, 103278, 'Núcleo do Museu e Memoriais', '', '', 1),
(250, 103280, 'Núcleo do Coral', '', '', 1),
(251, 103284, 'Clínica de Nutrição - CCBS', '', '', 1),
(252, 103309, 'Núcleo do Fundo de Pesquisa', '', '', 1),
(253, 103321, 'Prédio Humanas', '', '', 1),
(254, 103324, 'Bloco III Parque Tecnológico', '', '', 1),
(255, 103361, 'Prédio Clínicas Rockfeller', '', '', 1),
(256, 103421, 'Lab. de Informática - Desenvolvimento - Curitiba', '', '', 1),
(257, 103422, 'Lab. de Informática - Biomédico - Curitiba', '', '', 1),
(258, 103423, 'Lab. de Informática Cálculo - Curitiba', '', '', 1),
(259, 103424, 'Lab. de Informática - Gráfico - Curitiba', '', '', 1),
(260, 103433, 'Lab. de Apoio - Eng. Elétrica - BL II PQ TEC', '', '', 1),
(261, 103510, 'Administração da Diretoria de Pós-Graduação Strict', '', '', 1),
(262, 103538, 'Núcleos Curitiba', '', '', 1),
(263, 103636, 'Prédio Simulação Clínica - HNSL', '', '', 1),
(264, 103638, 'Laboratório Multiusuários - Curitiba', '', '', 1),
(265, 103699, 'Projeto Apple', '', '', 1),
(266, 104014, 'SIGA - SJP', '', '', 1),
(267, 104083, 'Administração do Campus SJP', '', '', 1),
(268, 104084, 'Administração da Diretoria de Infraestrutura', '', '', 1),
(269, 104088, 'Almoxarifado - SJPinhais', '', '', 1),
(270, 104090, 'NIAA - SJP', '', '', 1),
(271, 104096, 'Biblioteca - SJP', '', '', 1),
(272, 105013, 'SIGA - Londrina', '', '', 1),
(273, 105085, 'Administração da Fazenda Gralha Azul', '', '', 1),
(274, 105089, 'Agricultura - Fazenda', '', '', 1),
(275, 105099, 'Direção', '', '', 1),
(276, 105115, 'Administração do Setor Industrial', '', '', 1),
(277, 105125, 'Administração da Lúmen', '', '', 1),
(278, 105128, 'Rede Vida', '', '', 1),
(279, 105133, 'Biblioteca - Londrina', '', '', 1),
(280, 105137, 'Administração do Campus - Toledo', '', '', 1),
(281, 105143, 'Hospital Veterinário Campus Toledo - CCTP', '', '', 1),
(282, 105148, 'Administração da Farmácia Universitária', '', '', 1),
(283, 105150, 'Administração do Campus Maringá', '', '', 1),
(284, 105189, 'Gestão de Bens Patrimoniais APC', '', '', 1),
(285, 105190, 'Administrativo', '', '', 1),
(286, 105192, 'Núcleo Comunitário de Guaratuba', '', '', 1),
(287, 105193, 'Administrativo', '', '', 1),
(288, 105194, 'Núcleo Comunitário de São José dos Pinhais', '', '', 1),
(289, 105197, 'SIGA - Maringá', '', '', 1),
(290, 105271, 'Prédio Laboratórios Londrina', '', '', 1),
(291, 108001, 'Projeto Média Complexidade', '', '', 1),
(292, 123019, 'Prédio do Hospital Marcelino Champagnat', '', '', 1),
(293, 123034, 'Recepção CD 2 HMC', '', '', 1),
(294, 123049, 'Serviço de Hemodinâmica HMC', '', '', 1),
(295, 123059, 'Posto de Enfermagem 1 HMC', '', '', 1),
(296, 123063, 'Posto de Enfermagem 5 HMC', '', '', 1),
(297, 103300, 'Diretoria de Pesquisa', '70004750', '70004750', 1),
(298, 103507, 'Adminstração da Pró-Reitoria', '88890586', '88890586', 1);

-- --------------------------------------------------------

--
-- Table structure for table `csf`
--

CREATE TABLE IF NOT EXISTS `csf` (
`id_csf` bigint(20) unsigned NOT NULL,
  `csf_aluno` int(11) NOT NULL DEFAULT '0',
  `csf_orientador` int(11) NOT NULL DEFAULT '0',
  `csf_modalidade` int(11) NOT NULL,
  `csf_saida` date NOT NULL DEFAULT '0000-00-00',
  `csf_saida_previsao` date NOT NULL DEFAULT '0000-00-00',
  `csf_retorno` date NOT NULL DEFAULT '0000-00-00',
  `csf_retorno_previsao` date NOT NULL DEFAULT '0000-00-00',
  `csf_pa_intercambio` text NOT NULL,
  `csf_pais` varchar(3) NOT NULL DEFAULT '0',
  `csf_universidade` int(11) NOT NULL DEFAULT '0',
  `csf_status` int(11) NOT NULL DEFAULT '0',
  `csf_obs` text NOT NULL,
  `csf_area` int(11) NOT NULL DEFAULT '0',
  `csf_curso` int(11) NOT NULL DEFAULT '0',
  `csf_chamada` int(11) NOT NULL DEFAULT '0',
  `csf_parceiro` int(11) NOT NULL DEFAULT '1'
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `csf`
--

INSERT INTO `csf` (`id_csf`, `csf_aluno`, `csf_orientador`, `csf_modalidade`, `csf_saida`, `csf_saida_previsao`, `csf_retorno`, `csf_retorno_previsao`, `csf_pa_intercambio`, `csf_pais`, `csf_universidade`, `csf_status`, `csf_obs`, `csf_area`, `csf_curso`, `csf_chamada`, `csf_parceiro`) VALUES
(1, 10, 0, 0, '0000-00-00', '2015-06-01', '0000-00-00', '0000-00-00', '0', '0', 0, 1, '', 0, 0, 8, 0),
(2, 4, 0, 0, '0000-00-00', '2015-06-01', '0000-00-00', '0000-00-00', '0', 'DEU', 0, 1, '', 0, 0, 8, 1),
(3, 6, 0, 0, '0000-00-00', '2015-12-01', '0000-00-00', '0000-00-00', '0', 'DEU', 0, 1, '', 0, 0, 8, 0),
(4, 9, 0, 0, '0000-00-00', '2015-12-01', '0000-00-00', '0000-00-00', '0', 'DEU', 0, 1, '', 0, 0, 8, 0),
(5, 11, 0, 0, '0000-00-00', '2015-06-01', '0000-00-00', '0000-00-00', '0', 'AUS', 0, 1, '', 0, 0, 8, 0);

-- --------------------------------------------------------

--
-- Table structure for table `csf_parceiro`
--

CREATE TABLE IF NOT EXISTS `csf_parceiro` (
`id_cp` bigint(20) unsigned NOT NULL,
  `cp_descricao` char(80) NOT NULL,
  `cp_pais` int(11) NOT NULL DEFAULT '0',
  `cp_ativo` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `csf_parceiro`
--

INSERT INTO `csf_parceiro` (`id_cp`, `cp_descricao`, `cp_pais`, `cp_ativo`) VALUES
(1, 'Alemanha/DAAD', 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `csf_status`
--

CREATE TABLE IF NOT EXISTS `csf_status` (
`id_cs` bigint(20) unsigned NOT NULL,
  `cs_descricao` char(80) NOT NULL,
  `cs_ativo` tinyint(4) NOT NULL DEFAULT '1',
  `cs_contabiliza` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `csf_status`
--

INSERT INTO `csf_status` (`id_cs`, `cs_descricao`, `cs_ativo`, `cs_contabiliza`) VALUES
(1, 'Em homologação', 1, 0),
(2, 'Homologado pela Instituição', 1, 0),
(3, 'Homologado pela CAPES/CNPq', 1, 0),
(4, 'Aceito pela Parceira', 1, 2),
(5, 'Em Intercâmbio', 1, 1),
(6, 'Intercambio Finalizado', 1, 3),
(7, 'Retorno Antecipado', 1, 3),
(8, 'Cancelado - Desistente', 1, 0),
(9, 'Não homologado pela instituição', 1, 0),
(10, 'Não homologado pela CAPES/CNPq', 1, 0),
(11, 'Cancelado - Erro de Registro', 1, 0),
(12, 'Cadastrado - Aguardando resultado', 1, 0);

-- --------------------------------------------------------

--
-- Stand-in structure for view `csf_view`
--
CREATE TABLE IF NOT EXISTS `csf_view` (
`id_csf` bigint(20) unsigned
,`csf_aluno` int(11)
,`csf_orientador` int(11)
,`csf_modalidade` int(11)
,`csf_saida` date
,`csf_saida_previsao` date
,`csf_retorno` date
,`csf_retorno_previsao` date
,`csf_pa_intercambio` text
,`csf_pais` varchar(3)
,`csf_universidade` int(11)
,`csf_status` int(11)
,`csf_obs` text
,`csf_area` int(11)
,`csf_curso` int(11)
,`csf_chamada` int(11)
,`csf_parceiro` int(11)
,`id_us` int(11)
,`us_nome` varchar(250)
,`us_cpf` varchar(15)
,`us_cracha` varchar(15)
,`us_emplid` varchar(15)
,`us_login` varchar(80)
,`us_pass` varchar(100)
,`us_email` varchar(150)
,`us_link_lattes` varchar(100)
,`us_ativo` tinyint(1)
,`us_teste` tinyint(1)
,`us_origem` tinyint(1)
,`us_professor_tipo` tinyint(1)
,`us_aluno_tipo` varchar(45)
,`us_regime` varchar(10)
,`us_genero` char(1)
,`usuario_tipo_ust_id` int(11)
,`usuario_funcao_usf_id` int(11)
,`usuario_titulacao_ust_id` int(11)
,`us_dt_nascimento` date
,`id_cs` bigint(20) unsigned
,`cs_descricao` char(80)
,`cs_ativo` tinyint(4)
,`cs_contabiliza` tinyint(4)
,`id` int(11)
,`iso` char(2)
,`iso3` char(3)
,`numcode` char(3)
,`nome` varchar(80)
,`id_ed` bigint(20) unsigned
,`ed_titulo` text
,`ed_data` int(11)
,`ed_agencia` char(7)
,`ed_idioma` char(5)
,`ed_chamada` char(30)
,`ed_data_1` int(11)
,`ed_data_2` int(11)
,`ed_data_3` int(11)
,`ed_texto_1` text
,`ed_texto_2` text
,`ed_texto_3` text
,`ed_texto_4` text
,`ed_texto_5` text
,`ed_texto_6` text
,`ed_texto_7` text
,`ed_texto_8` text
,`ed_texto_9` text
,`ed_texto_10` text
,`ed_texto_11` text
,`ed_texto_12` text
,`ed_status` char(1)
,`ed_autor` char(20)
,`ed_corpo` text
,`ed_url_externa` char(200)
,`ed_total_visualizacoes` int(11)
,`ed_local` char(15)
,`ed_data_envio` int(11)
,`ed_document_require` char(1)
,`ed_login` char(15)
,`ed_titulo_email` char(100)
,`ed_edital_tipo` char(2)
,`ed_fluxo_continuo` int(11)
,`id_cp` bigint(20) unsigned
,`cp_descricao` char(80)
,`cp_pais` int(11)
,`cp_ativo` tinyint(4)
);
-- --------------------------------------------------------

--
-- Table structure for table `fomento_categoria`
--

CREATE TABLE IF NOT EXISTS `fomento_categoria` (
`id_ct` bigint(20) unsigned NOT NULL,
  `ct_descricao` char(50) DEFAULT NULL,
  `ct_main` char(1) DEFAULT NULL,
  `ct_ref` int(5) DEFAULT NULL,
  `ct_ordem` int(11) DEFAULT NULL,
  `ct_ativo` int(11) DEFAULT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=146 ;

--
-- Dumping data for table `fomento_categoria`
--

INSERT INTO `fomento_categoria` (`id_ct`, `ct_descricao`, `ct_main`, `ct_ref`, `ct_ordem`, `ct_ativo`) VALUES
(34, 'Bolsa Capacitação', '', 16, 16, 1),
(32, 'Mobilidade Internacional', '', 16, 10, 1),
(26, 'Prêmios', '', 16, 18, 1),
(28, 'Pesquisador na empresa', '', 16, 6, 1),
(20, 'Organização de eventos', '', 16, 5, 1),
(16, 'Tipo de edital', '1', 0, 5, 1),
(1, 'Corpo Docente & Discente', '1', 0, 1, 1),
(2, 'Professores stricto sensu', '', 1, 1, 1),
(3, 'Professores doutores', '', 1, 2, 1),
(4, 'Professores mestres', '', 1, 3, 1),
(5, 'Todos os professores (SS e graduação)', '', 1, 4, 1),
(6, 'Secretarias & Decanatos', '1', 0, 2, 1),
(7, 'Decanos', '', 1, 1, 1),
(18, 'Bolsas de Iniciação Científica', '', 16, 2, 1),
(45, 'Escola de Negócios', '', 35, 13, 1),
(43, 'Escola de Educação e Humanidades', '', 35, 19, 1),
(37, '==teste PDI==', '', 16, 20, 1),
(25, 'Pesquisador visitante', '', 16, 19, 1),
(23, 'Projeto Institucional', '', 16, 7, 1),
(8, 'Coordenadores de programas PG', '', 6, 2, 1),
(9, 'Secretarias PPG', '', 6, 3, 1),
(10, 'Discentes', '1', 0, 3, 1),
(11, 'Discentes PPG', '', 10, 1, 1),
(12, 'Discentes IC', '', 10, 2, 1),
(13, 'Discentes doutorandos', '', 10, 3, 1),
(14, 'Discentes mestrandos', '', 10, 3, 1),
(15, 'Discentes egressos', '', 10, 6, 1),
(19, 'Bolsas Pós-Doutorado', '', 16, 2, 1),
(21, 'Bolsas produtividade', '', 16, 8, 1),
(22, 'Bolsas Sênior', '', 16, 13, 1),
(24, 'Bolsas de mestrado e doutorado', '', 16, 11, 1),
(30, 'Apoio a editoração e publicação de periódicos', '', 16, 20, 1),
(38, 'Escola Politécnica', '', 35, 5, 1),
(17, 'Pesquisa básica e aplicada', '', 16, 1, 1),
(27, 'Participação em eventos', '', 16, 9, 1),
(29, 'Ciência sem Fronteiras', '', 16, 17, 1),
(31, 'Fundação Araucária e o Fundo Newton', '', 16, 1, 1),
(33, 'Bolsa Graduação', '1', 16, 20, 1),
(36, 'Escola de Saúde e Biociências', '', 35, 1, 1),
(35, 'Escolas da PUCPR', '1', 0, 11, 1),
(39, 'Escola de Arquitetura e Design', '', 35, 10, 1),
(40, 'Escola de Ciências Agrárias e Medicina Veterinária', '', 35, 13, 1),
(41, 'Escola de Comunicação e Artes', '', 35, 16, 1),
(42, 'Escola de Direito', '', 35, 16, 1),
(44, 'Escola de Medicina', '', 35, 17, 1);

-- --------------------------------------------------------

--
-- Table structure for table `fomento_editais`
--

CREATE TABLE IF NOT EXISTS `fomento_editais` (
`id_ed` bigint(20) unsigned NOT NULL,
  `ed_titulo` text,
  `ed_data` int(11) DEFAULT NULL,
  `ed_agencia` char(7) DEFAULT NULL,
  `ed_idioma` char(5) DEFAULT NULL,
  `ed_chamada` char(30) DEFAULT NULL,
  `ed_data_1` int(11) DEFAULT NULL,
  `ed_data_2` int(11) DEFAULT NULL,
  `ed_data_3` int(11) DEFAULT NULL,
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
  `ed_data_envio` int(11) DEFAULT NULL,
  `ed_document_require` char(1) DEFAULT NULL,
  `ed_login` char(15) DEFAULT NULL,
  `ed_titulo_email` char(100) DEFAULT NULL,
  `ed_edital_tipo` char(2) DEFAULT NULL,
  `ed_fluxo_continuo` int(11) DEFAULT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10234 ;

--
-- Dumping data for table `fomento_editais`
--

INSERT INTO `fomento_editais` (`id_ed`, `ed_titulo`, `ed_data`, `ed_agencia`, `ed_idioma`, `ed_chamada`, `ed_data_1`, `ed_data_2`, `ed_data_3`, `ed_texto_1`, `ed_texto_2`, `ed_texto_3`, `ed_texto_4`, `ed_texto_5`, `ed_texto_6`, `ed_texto_7`, `ed_texto_8`, `ed_texto_9`, `ed_texto_10`, `ed_texto_11`, `ed_texto_12`, `ed_status`, `ed_autor`, `ed_corpo`, `ed_url_externa`, `ed_total_visualizacoes`, `ed_local`, `ed_data_envio`, `ed_document_require`, `ed_login`, `ed_titulo_email`, `ed_edital_tipo`, `ed_fluxo_continuo`) VALUES
(8, 'Prêmio Fundação Bunge contempla profissionais ligados à Produtividade Agrícola Sustentável e Artes Circenses com apoio  da Fundação Araucária.', 20140611, 'FA', 'pt_BR', 'Prêmio Fund. Bunge', 20140516, 20140516, 20140725, 'A Fundação Bunge através deste prêmio e temas, espera contribuir:\r\n<BR> com a escolha da PRODUTIVIDADE AGRÍCOLA SUSTENTÁVEL;\r\n<BR>  Homenagear as Artes Circenses.', 'Além de diploma e medalha, os agraciados na categoria "Vida e Obra" receberão R$ 135 mil e os contemplados em "Juventude" serão premiados com R$ 50 mil, em cerimônia realizada em São Paulo, no dia 22 de setembro.', '', '', 'Etapas\r\n\r\n<BR>Indicações - os candidatos ao Prêmio não são inscritos, mas sim indicados pelas principais universidades e entidades científicas e culturais brasileiras, incluindo a Fundação Araucária. O período para indicação acontece entre abril e maio.\r\nProcesso do Prêmio:\r\n<BR>Anúncio dos contemplados - em 25 de julho, o Grande Júri, composto por cerca de 50 membros, entre reitores de universidades e presidentes de entidades científicas e culturais, anuncia os contemplados de 2014.\r\n<BR>Entrega solene dos Prêmios - A cerimônia de premiação acontece em 22 de setembro, no Palácio dos Bandeirantes, em São Paulo.\r\n<BR>Seminário Internacional - em 23 de setembro, a Fundação Bunge, em parceria com a FAPESP - Fundação de Amparo à Pesquisa do Estado de São Paulo, realiza um Seminário Internacional sobre Produtividade Agrícola Sustentável. No seminário, especialistas promovem exposições e debates sobre os avanços obtidos nesta área.', 'Em 2014, o Prêmio Fundação Bunge, em sua 59ª edição, contempla profissionais ligados à Produtividade Agrícola Sustentável, na área de Ciências Agrárias, e Artes Circenses, na área de Artes.', '', '', '', '', 'Os candidatos ao Prêmio não são inscritos, mas sim indicados pelas principais universidades e entidades científicas e culturais brasileiras. \r\n<BR> Caso, haja interesse, manifeste-se, através do email cip@pucpr.br  até as 12horas do dia 16/05/2014.', 'Através do email cip@pucpr.br ou pelço telefone (41) 3271-2582', 'B', '', '', 'http://www.fundacaobunge.org.br/projetos/premio-fundacao-bunge/', 0, 'CSF', 0, '', 'e.bianco', '', '', 0),
(78, 'Programa CAPES/STINT - Cooperação bilateral com a Suécia', 20140930, 'CAPES', 'pt_BR', '58/2014-15', 20141031, 19000101, 19000101, 'Apoiar o desenvolvimento de projetos conjuntos de pesquisa e fomentar a mobilidade de pesquisadores e de estudantes de doutorado e pósdoutorado, em todas as áreas do conhecimento.', 'Missões de trabalho e de estudo. Custeio de até R$ 10.000,00 por ano.', '1. A proposta deve estar vinculada a um Programa de Pós-Graduação recomendado e reconhecido pela CAPES, com nota mínima 3; <br>2. Contemplar, principalmente e obrigatoriamente a formação de pós-graduandos e o aperfeiçoamento de docentes e pesquisadores vinculados aos referidos programas; <br>3. Ter caráter inovador; <br>4. Ser apresentada por coordenador de equipe detentor do título de doutor obtido há, pelo menos, 4 anos; <br>5. As equipes proponente brasileiras deverão ser compostas por, no mínimo, 2 docentes doutores, além do coordenador, vinculados a um PPG.', 'stint@capes.gov.br', '', 'Diversas áreas do conhecimento.', '', '', '', '', 'As inscrições serão gratuitas e deverão ser feitas pelo coordenador da equipe, exclusivamente pela internet mediante o preenchimento do formulário de inscrição e o envio de documentos eletrônicos, disponível no endereço http://capes.gov.br/cooperacaointernacional/suecia/capes-stint', '', 'A', '', '', 'http://www.capes.gov.br/cooperacao-internacional/suecia/capes-stint', 0, 'Observatório', 20140930, '', 'francine.zucco', 'Oportunidade Capes de cooperação bilateral com a Suécia', '', 0),
(37, 'Prêmio CAPES-INTERFARMA de Inovação e Pesquisa', 20140704, 'CAPES', 'pt_BR', '2014', 20140804, 19000101, 19000101, 'Reconhecer as melhores teses de doutorado defendidas em 2013 em Saúde Humana ou Ética/Bioética no Brasil.', 'Para autores da tese: prêmio no valor de R$ 26.495,75, passagem aérea para comparecimento na cerimônia de premiação, troféu, certificado de premiação e bolsa para realização de estágio pós-doutoral em instituição nacional de até três anos, que poderá ser convertida em estágio pós-doutoral de um ano fora do país. <br>Para orientadores: certificado, passagem aérea para comparecimento na cerimônia de premiação e prêmio para participação em congresso nacional no valor de R$ 3 mil.', '-A tese deve ter sido defendida no Brasil e em PPG que tenha tido, no mínimo, 3 teses de doutorado defendidas no ano do prêmio e deve estar disponível no banco de teses da Capes. <br>-Deve passar por uma pré-seleção feita por uma comissão de avaliação instaurada pelo Programa de Doutorado. O responsável pela inscrição da tese será o coordenador do PPG.', 'PremioCapesInterfarma@capes.gov.br', '', 'Área de Saúde Humana ou Ética/Bioética. <br>Áreas e sub-áreas de avaliação: Medicina, Odontologia, Farmácia, Enfermagem ou Ciências Biomédicas.', '', '', '', '', '', 'Para esclarecimentos e auxílio, favor entrar em contato com o Observatório de Pesquisa, Desenvolvimento & Inovação - pdi@pucpr.br, (41) 3271-2128.', 'A', '', '', 'http://www.capes.gov.br/images/stories/download/editais/272014-Edital-Premio-Capes-Interfarma-2014.pdf', 0, 'Observatório', 20140704, '', 'francine.zucco', 'Prêmio CAPES de tese na área da Saúde', '', 0),
(34, '<br>Prêmio Santander Universidades', 20140826, '00044', 'pt_BR', '2014', 20140918, 19000101, 19000101, 'Reconhecer, incentivar e premiar ideias e projetos relevantes de alunos, professores, pesquisadores e Instituições de Ensino Superior.', 'R$ 2 milhões em prêmios e bolsas de estudos internacionais.', '<br>1.Prêmio Santander Ciência e Inovação: Pesquisadores-doutores formados e que sejam docentes em Instituições de Ensino Superior. <br>2.Prêmio Santander Empreendedorismo: Graduandos e Pós-graduandos. <br>3.Prêmio Santander Universidade Solidária: Professores e Alunos que tenham interesse ou que já realizam projetos sociais de desenvolvimento sustentável com ênfase em geração de renda. <br>4.Prêmio Guia do Estudante – Destaques do Ano: Instituições de Ensino Superior.', 'Para dúvidas, consulte: http://universidades.ciatech.com.br/faq', '', 'Diversas áreas de conhecimento', '', '', '', '', '', 'Para esclarecimentos e auxílio, favor entrar em contato com o Observatório de Pesquisa, Desenvolvimento & Inovação - pdi@pucpr.br, (41) 3271-2128.', '!', '', '', 'http://www.santander.com.br/portal/wps/gcm/package/wps/universidades_10062014_89828.zip/correntistas_conta_premios.htm', 0, 'Observatório', 20140826, '', 'francine.zucco', 'Prêmio Santander: inscrições até 18/09', '', 0),
(23, 'Edital de Concurso para Bolsa de Doutorado SENAI-PR', 20140611, '00039', 'pt_BR', 'Nº. 506/2014', 19000101, 20140623, 20140704, 'Seleção de Pesquisadores para concessão de 13 bolsas de Doutorado por 20 meses para o desenvolvimento de atividades de pesquisa previstas e planejadas nos projetos de Inovação Tecnológica aprovados no Edital Senai Sesi de Inovação 2013 em parceria com indústrias e realizado em conjunto com a Fundação Araucária.', 'Bolsa doutorado.', 'Possuir título de doutor e não acumular bolsa de nenhuma natureza.', 'anay.mello@fiepr.org.br', '', 'Madeira e mobiliário; Design, Sensores Eletroquímicos; Tintas e Revestimentos; Química; Biotecnologia; Ciências Biológicas; Engenharias Elétrica e Eletrônica; Física; Papel e Celulose - de acordo com a cidade.', '', '', '', '', 'Os documentos deverão ser entregues, pessoalmente ou via postal, à Comissão de Licitações do Sistema FIEP, em envelope único, contendo etiqueta conforme modelo apresentado no edital.', 'Para esclarecimentos e auxílio, favor entrar em contato com o Observatório de Pesquisa, Desenvolvimento & Inovação - pdi@pucpr.br, (41) 3271-2128.', 'A', '', '', 'http://app2.fiepr.org.br/licitacao/pub/arquivos/c6b7673a88e5750bf7957c84629ded54.pdf', 0, 'Observatório', 20140611, '', 'francine.zucco', '', '', 0),
(29, 'PRÊMIO DE INCENTIVO EM CIÊNCIA E TECNOLOGIA PARA O SUS\r\nXIII EDIÇÃO – ANO 2014', 20140618, '00041', 'pt_BR', 'XIII EDIÇÃO – ANO 20', 20140711, 19000101, 19000101, 'O concurso visa à obtenção de trabalhos científico-tecnológicos de pesquisadores, estudiosos e profissionais de saúde ou de qualquer área do conhecimento em nível de pós-graduação concluída, com temática voltada para a área de Ciência e Tecnologia em Saúde, e potencial de incorporação pelo Sistema Único de Saúde e serviços de saúde.', '<br>PREMIAÇÃO</br>\r\n<br>A) Tese de doutorado (R$ 50.000,00);</br>\r\n<br>B) Dissertação de mestrado (R$ 30.000,00);</br>\r\n<br>C) Trabalho científico publicado (R$ 50.000,00);</br>\r\n<br>D) Monografia de especialização/residência (R$ 15.000,00).</br>', '<br>O Prêmio de Incentivo em Ciência e Tecnologia para o SUS - ano 2014 é composto por quatro categorias: Tese de Doutorado; Dissertação de Mestrado; Trabalho Científico Publicado e Monografia de Especialização ou Residência (maiores detalhes no edital).', 'Para informações, enviar mensagem para o seguinte endereço eletrônico: decit.premio@saude.gov.br', '', '', '', '', '', '', 'As inscrições para a primeira fase do Prêmio de Incentivo em Ciência e Tecnologia para o SUS - ano 2014 - serão efetuadas somente via internet, no endereço eletrônico http://www.saude.gov.br/premio no período entre às 10 horas do dia 27 de maio de 2014, até às 18h do dia 11 de julho de 2014, observado o horário oficial de Brasília-DF.', 'Para esclarecimento de dúvidas e auxílio no envio da proposta, favor entrar em contato com o Observatório PD&I pelo Ramal: 2128 ou e-mail: <a href="mailto:pdi@pucpr.br" style="color: navy; text-decoration: none; font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 11.818181991577148px; text-align: justify; background-color: rgb(255, 255, 255);">pdi@pucpr.br</a><span style="font-family: Verdana; font-size: 11.818181991577148px; text-align: justify; background-color: rgb(255, 255, 255);">.</span></p>', 'A', '', '', 'http://bvsms.saude.gov.br/bvs/ct/premio/', 0, 'Observatório', 20140618, '', 'jeferson.vieira', '', '', 0),
(15, '<br>  Training Course on Sustainable Biomass and Bio-Energy Utilization in Tropics', 20140610, '00034', 'us_EN', 'NO. J1404254/ ID. 14', 20140804, 19000101, 19000101, 'Promover a utilização efetiva de recursos de biomassa por meio de tecnologias avançadas e contribuir para o desenvolvimento de uma sociedade sustentável e de indústrias de biomassa nos países envolvidos.', 'Bolsa para curso de treinamento em grupo no Japão.', 'Mais de 3 anos de experiência na área; fluente em inglês; entre 25 e 35 anos de idade.', 'JICA Brasil - brsp_oso_rep@jica.go.jp / jicabr-training@jica.go.jp', '', 'Agrícola, ambiental, química, engenharia mecânica ou equivalentes.', '', '', '', '', '', 'Para esclarecimentos e auxílio, favor entrar em contato com o Observatório de Pesquisa Desenvolvimento & Inovação - pdi@pucpr.br, (41) 3271-2128', 'A', '', '', 'http://www.jica.go.jp/brazil/portuguese/office/courses/c8h0vm00008shbxr-att/J1404254_-_Sustainable_Biomass_and_Bio-Energy_Utilization_in_Tropics.pdf', 0, 'Observatório', 0, '', 'francine.zucco', '', '', 0),
(79, 'MCTI/CONAB/CNPQ - Perdas Pós-Colheita de Grãos', 20141007, 'CNPq', 'pt_BR', '18/2014', 20141113, 19000101, 19000101, 'Financiamento de projetos de desenvolvimento científico e tecnológico e inovação, voltados para o estudo de perdas quantitativas e qualitativas no armazenamento e no transporte de grãos.', 'O valor máximo a ser financiado por proposta será de R$ 800.000,00, com vigência de 36 meses - custeio, capital e bolsas.', 'O proponente deve possuir título de doutor e ser obrigatoriamente o coordenador da proposta. <br>A proposta deverá ser apresentada na forma de projeto de pesquisa, obedecendo estritamente as exigências descritas no edital na linha temática a que for submetido.', 'chamada18-2014@cnpq.br', '', 'O projeto poderá ser submetido em apenas uma de cinco Linhas Temáticas e deverá obrigatoriamente cumprir as exigências dispostas no edital: <br>1. Milho em Grãos a Granel; <br>2. Arroz em Casca a Granel e Ensacado; <br>3. Trigo em Grãos a Granel; <br>4. Estudo de perdas quantitativas no transporte rodoviário de grãos de arroz em casca, milho e trigo a granel; <br>5. Metodologia para determinação de volume e massa de grãos a granel e ensacados.', '', '', '', '', 'As propostas devem ser acompanhadas de arquivo contendo o projeto e devem ser encaminhadas ao CNPq exclusivamente via Internet, utilizando-se do Formulário de Propostas online, disponível na Plataforma Carlos Chagas, no endereço eletrônico http://carloschagas.cnpq.br/', '', 'A', '', '', 'http://goo.gl/3mns6C', 0, 'Observatório', 20141001, '', 'francine.zucco', 'Oportunidade CNPq de recursos para pesquisas em perdas pós-colheita de grãos', '', 0),
(110, 'Cátedra Capes/Universidade de Bolonha - 68/2014', 20150126, 'CAPES', 'pt_BR', '68/2014', 20150301, 19000101, 19000101, 'Visa a conceder bolsa a notável pesquisador e professor sênior do Brasil, especialista em qualquer disciplina ou área acadêmica, para lecionar e pesquisar na Universidade de Bolonha, Itália, no âmbito da Cátedra CAPES/Universidade de Bolonha.', 'Mensalidade e auxílios', 'Ser brasileiro ou estrangeiro com visto; possuir título de doutor há pelo menos cinco anos; possuir atuação acadêmica qualificada e reconhecida competência profissional com produção intelectual consistente; ter fluência em italiano, inglês ou português (em casos específicos).', 'catedra.unibo@capes.gov.br', '', 'Diversas áreas do conhecimento', '', '', '', '', 'As inscrições serão gratuitas e feitas exclusivamente pela internet, mediante o preenchimento do formulário de inscrição disponível no endereço virtual do programa.', '', 'A', '', '', 'http://capes.gov.br/cooperacao-internacional/catedras/programa-catedra-capes-universidade-de-bolonha', 0, 'Observatório', 20141201, '', 'francine.zucco', '', '1', 0),
(30, 'Bolsa CAPES - Fulbright Professor/Pesquisador Visitante nos EUA', 20140618, 'CAPES', 'pt_BR', 'EDITAL Nº 35/2014', 20140731, 19000101, 20140901, 'Selecionar candidatos para bolsas de Professor/Pesquisador Visitante nos EUA para ministrar aulas, realizar pesquisas e desenvolver atividades de orientação técnica e científica, em renomadas instituições de ensino superior. Destacar no meio universitário e de pesquisa dos EUA a atuação de cientistas brasileiros em diversas áreas do conhecimento e promover o mais alto nível de aproximação, diálogo e aprofundamento no conhecimento mútuo das respectivas culturas e sociedades.', 'Mensalidade; auxílios pesquisa, deslocamento, seguro saúde e instalação.', '-Possuir nacionalidade brasileira, não cumulada com nacionalidade norte-americana; <br>-ter obtido o diploma de doutorado anteriormente a janeiro de 2007; <br>-possuir vínculo empregatício com instituição de ensino superior ou instituição de pesquisa; <br>-ter proficiência em língua inglesa; <br>-não ter usufruído anteriormente de outra bolsa de estágio pós-doutoral no exterior ou auxílio financeiro para o mesmo objetivo; <br>-residir atualmente no Brasil.', 'fulbright@capes.gov.br', '', 'Diversas áreas de conhecimento.', '', '', '', '', 'As inscrições serão gratuitas e feitas exclusivamente, pela internet, mediante o preenchimento do formulário de inscrição da Comissão Fulbright, em inglês, disponível no endereço www.fulbright.org.br', 'Para esclarecimentos e auxílio, favor entrar em contato com o Observatório de Pesquisa, Desenvolvimento & Inovação - pdi@pucpr.br, (41) 3271-2128.', 'A', '', '', 'http://www.capes.gov.br/images/stories/download/editais/1652014-035-2014-PVE-EUA.pdf', 0, 'Observatório', 20140618, '', 'francine.zucco', '', '', 0),
(92, '<br>Chamada n. 46/2014 - PROÁFRICA', 20141028, 'CNPq', 'pt_BR', '46/2014', 20150122, 19000101, 19000101, 'O Programa de Cooperação em Ciência, Tecnologia e Inovação com Países da África apoiará projetos de pesquisa científica e tecnológica que visem contribuir significativamente para o desenvolvimento científico e tecnológico do País por meio do financiamento de projetos de pesquisa conjunta, no âmbito da cooperação científica, tecnológica e de inovação com os países africanos e em especial com os países da comunidade de língua portuguesa/CPLP do continente.', 'Até R$ 150.000,00 em custeio.', 'O proponente deve possuir título de doutor, ser obrigatoriamente o coordenador da proposta e ter vínculo formal com a instituição de execução do projeto. <br>É recomendável a existência de outras parcerias e que a proposta demonstre a existência de apoio de outras instituições nacionais ou estrangeiras na forma de recursos financeiros ou de infra-estrutura para pesquisa, efetivamente necessários à execução do projeto.', 'coped@cnpq.br', '', 'Segurança alimentar, saúde pública, desenvolvimento agrícola e pecuário, inclusão social, mudanças climáticas e eventos extremos.', '', '', '', '', 'As propostas devem ser acompanhadas de arquivo contendo o projeto e devem ser encaminhadas ao CNPq exclusivamente via Internet, utilizando-se do Formulário de Propostas online, disponível na Plataforma Carlos Chagas.', '', 'A', '', '', 'http://goo.gl/CtRvkw', 0, 'Observatório', 20141028, '', 'francine.zucco', 'Programa de Cooperação em Ciência, Tecnologia e Inovação com Países da África', '', 0),
(9, 'Oportunidade de recursos Newton Funding (Reino Unido)/Fundação Araucária', 20140609, 'FA', 'pt_BR', 'Fundo Newton / FA', 20140520, 20140520, 19000101, 'Convocamos todos os pesquisadores da PUCPR que tenham projetos em parceria (ou parceria potencial) com instituições do Reino Unido para enviarem suas propostas. Estas propostas são importantes para mapear quais temas de projetos de pesquisa e inovação estão sendo pesquisados em parceria com o Reino Unido e, assim, prospectar a captação de fundos.', '', '', '', 'Senhor(a) Pesquisador(a), Coordenador(a) e Gestor(a) Educacional,\r\n<BR>Em abril de 2014, foi estabelecido um acordo de cooperação entre Brasil e Reino Unido e, em abril, A Fundação Araucária e o Fundo Newton no Brasil firmaram acordo por meio do Conselho Nacional das Fundações de Apoio à Pesquisa (CONFAP). O Fundo Newton foi lançado em 9 de abril deste ano em São Paulo com a presença do Ministro das Finanças do Reino Unido, George Osborne. Serão financiados no país 9 milhões de libras por ano, por um período de três anos que deverão ser comprometidos (empenhados) até março de 2015, quando é encerrado o ano fiscal no Reino Unido. Os projetos do Fundo Newton devem contemplar três modalidades que podem ser combinadas: Mobilidade/capacitação de Pessoas, Projetos de Pesquisa e Projetos de Inovação.\r\n <BR>A próxima etapa da parceria é selecionar os projetos que receberão os recursos. Por isto, convocamos todos os pesquisadores da PUCPR que tenham projetos em parceria (ou parceria potencial) com instituições do Reino Unido para enviarem suas propostas até o dia 20 de maio. Estas propostas são importantes para mapear quais temas de projetos de pesquisa e inovação estão sendo pesquisados em parceria com o Reino Unido e, assim, prospectar a captação de fundos. \r\n<BR>A proposta deve estar descrita em uma página, com a seguinte estrutura:\r\n<BR>- Título do Projeto;\r\n<BR>- Sumário em 10 linhas no máximo;\r\n<BR>- Coordenador local (proponente: pesquisador e entidade vinculada) e parceiros de Mato Grosso do Sul e nacionais, eventualmente;\r\n<BR>- Parceiro Britânico (já existente, indicado ou sugerido);\r\n<BR>- Valor do projeto (custos);\r\n<BR>- Prazo de execução.', '', '', '', '', '', 'Os projetos devem ser encaminhados até dia 20 de maio de 2014 para o e-mail do Observatório de Pesquisa Desenvolvimento & Inovação - pdi@pucpr.br com o assunto: Fundo Newton.', 'Para esclarecimentos e auxílio, favor entrar em contato com Observatório de Pesquisa Desenvolvimento & Inovação  falar com Francine (41) 3271-2128.', 'B', '', '', 'https://www.gov.uk/government/publications/newton-fund-building-science-and-innovation-capacity-in-developing-countries/newton-fund-building-science-and-innovation-capacity-in-developing-countries', 0, 'Observatório', 0, '', '', '', '', 0),
(24, 'Programa Centros Associados para o Fortalecimento da Pós-Graduação Brasil-Argentina (CAFP-BA)', 20140611, 'CAPES', 'pt_BR', 'Edital nº 32/2014', 20140730, 19000101, 20141101, 'O programa consiste em projetos de parcerias universitárias entre pelo menos uma IES brasileira e uma argentina, exclusivamente em nível de pós-graduação, para o fomento ao intercâmbio de estudantes de pós-graduação e o aperfeiçoamento de docentes, pesquisadores e professores visitantes, em diversas áreas do conhecimento, para fortalecimento dos cursos de pós-graduação nos dois países.', 'Passagens aéreas internacionais e diárias para missões de trabalho, bolsas e passagens para missão de estudos e material de consumo.', 'Os coordenadores das equipes do projeto deverão possuir o título de doutor há pelo menos 4 anos; <br>-para atuar como entidade PROMOTORA, o PPG deve possuir conceito superior ou igual a 5, para atuar como RECEPTORA, nota 3 ou 4 na avaliação CAPES; <br>-as propostas deverão apresentar equipe de trabalho brasileira com, no mínimo, 2 docentes Doutores, além do coordenador, vinculados à instituição.', 'cafp@capes.gov.br', '', 'Diversas áreas de conhecimento.', '', '', '', '', '', 'Para esclarecimentos e auxílio, favor entrar em contato com o Observatório de Pesquisa, Desenvolvimento & Inovação - pdi@pucpr.br, (41) 3271-2128.', '!', '', '', 'http://www.capes.gov.br/cooperacao-internacional/argentina/centros-associados-cafp', 0, 'Observatório', 20140617, '1', 'francine.zucco', '', '', 0),
(80, 'Chamada CNPq N° 19/2014 - Fortalecimento da Juventude Rural', 20141007, 'CNPq', 'pt_BR', '19/2014', 20141113, 19000101, 19000101, 'Apoiar projetos de capacitação profissional e extensão tecnológica e inovadora de jovens de 15 a 29 anos, estudantes de nível médio, que visem contribuir significativamente para o desenvolvimento dos assentamentos de Reforma Agrária, da agricultura familiar e comunidades tradicionais. Apoiar projetos que objetivam contribuir para a formação de jovens de 15 a 29 anos, a produção de conhecimentos, a capacitação técnico-profissional, a produção e disseminação de tecnologias sociais.', 'Custeio e bolsa.', 'O proponente deve possuir título de doutor e ser obrigatoriamente o coordenador da proposta.', 'chamada19-2014@cnpq.br', '', 'Os projetos devem ter como foco prioritário a juventude rural e suas questões teóricas, metodológicas e de cunho prático, associadas a projetos de inserção organizada nas suas comunidades de assentamentos, agricultura familiar e comunidades tradicionais, que contribuam para a compreensão crítica da realidade do campo e para sua transformação em direção a um novo paradigma fundamentado no desenvolvimento agrário sustentável.', '', '', '', '', 'As propostas devem ser acompanhadas de arquivo contendo o projeto e devem ser encaminhadas ao CNPq exclusivamente via Internet, utilizando-se do Formulário de Propostas online, disponível na Plataforma Carlos Chagas, no endereço eletrônico http://carloschagas.cnpq.br/', '', 'A', '', '', 'http://www.cnpq.br/web/guest/chamadas-publicas?p_p_id=resultadosportlet_WAR_resultadoscnpqportlet_INSTANCE_0ZaM&filtro=abertas&detalha=chamadaDivulgada&idDivulgacao=5302', 0, 'Observatório', 20141002, '', 'francine.zucco', '', '', 0),
(36, 'Biodiversidade do Paraná - Fundação Araucária e Fundação Grupo Boticário', 20140704, 'FA', 'pt_BR', 'Chamada Pública 08/2', 20140831, 19000101, 19000101, 'Apoiar propostas que visem contribuir efetivamente para a conservação da natureza, priorizando a região da Floresta Ombrófila Mista (floresta  com  araucárias)  e fitofisionomia  associadas,  além da região do  Lagamar compreendida nos limites do litoral do Paraná.', 'Bolsas, material de consumo, serviços de terceiros, despesas com viagem, material permanente, taxas administrativas. <br>Propostas no valor máximo de R$ 300.000,00', '', 'Fundação Araucária: projetos2@fundacaoaraucaria.org.br ou (41) 3218-9263 <br>Fundação Grupo Boticário: edital@fundacaogrupoboticario.org.br, por meio da ferramenta específica de correio do SiSGER ou (41) 3340-2638.', '', '1.Unidades de Conservação de Proteção Integral (continentais e marinhas) e RPPNs: criação e ampliação de UCs e execução de seus Planos de Manejo;\r\n<br>2.Espécies Ameaçadas: execução de Planos de Ação Nacionais (PAN), ações emergenciais para proteção e definição de status de ameaça de espécies nativas;\r\n<br>3.Ambientes Marinhos: estudos, proteção e redução das pressões sobre a biodiversidade marinha.', '', '', '', '', '', 'Para esclarecimentos e auxílio, favor entrar em contato com o Observatório de Pesquisa, Desenvolvimento & Inovação - pdi@pucpr.br, (41) 3271-2128.', 'A', '', '', 'http://www.fappr.pr.gov.br/arquivos/File/chamadas2014/CP08_2014_FAFGB.pdf', 0, 'Observatório', 20140704, '', 'francine.zucco', 'Oportunidade de recursos pela Fundação Grupo Boticário', '', 0),
(10, 'Fluxo contínuo - Pós Doutorado no Exterior para o National Institute of Health - NIH', 20140611, 'CNPq', 'pt_BR', 'Ciências Fronteiras', 20140528, 20140528, 20140912, 'x', '', 'Antes de solicitar uma bolsa, os candidatos interessados em uma vaga para a realização de doutorado pleno devem fazer contato com a instituição de seu interesse no exterior para obter uma carta de aceite condicional. \r\n<BR> Verifique antes se o seu projeto enquadra-se às Áreas Prioritárias do Programa Ciência sem Fronteiras.', '', '', '', '', '', '', '', '', '', 'B', '', '', '', 0, 'Observatório', 0, '', 'e.bianco', '', '', 0),
(25, 'Programa Centros Associados da Pós-Graduação Brasil-Argentina (CAPG-BA)', 20140611, 'CAPES', 'pt_BR', 'EDITAL Nº 31/2014', 20140730, 19000101, 19000101, 'O programa tem como objetivo o estímulo ao intercâmbio acadêmico de docentes, pesquisadores e estudantes brasileiros e argentinos vinculados a programas de pós-graduação de Instituições de Ensino Superior (IES) e a promoção da formação de recursos humanos de alto nível nos dois países, nas diversas áreas do conhecimento.', 'Passagens aéreas internacionais e diárias para missões de trabalho, bolsas e passagens para missão de estudos e material de consumo.', 'Os coordenadores das equipes do projeto deverão possuir o título de doutor há pelo menos 4 anos e o PPG deve possuir conceito CAPES superior ou igual a 5.', 'capg@capes.gov.br', '', 'Diversas áreas de conhecimento.', '', '', '', '', '', 'Para esclarecimentos e auxílio, favor entrar em contato com o Observatório de Pesquisa, Desenvolvimento & Inovação - pdi@pucpr.br, (41) 3271-2128.', '!', '', '', 'http://www.capes.gov.br/cooperacao-internacional/argentina/centros-associados-capg', 0, 'Observatório', 20140613, '1', 'francine.zucco', '', '', 0),
(11, 'Programa BRAFAGRI - Cooperação Brasil/França em Agricultura', 20140617, 'CAPES', 'pt_BR', 'EDITAL nº. 20/2014', 20140615, 19000101, 20141130, 'Fomentar o intercâmbio de estudantes em nível de graduação nas áreas de ciências agronômicas, agroalimentares e veterinária por meio de parcerias entre instituições brasileiras e francesas. \r\nPrograma de dois anos (podendo ser prorrogado por mais dois).', 'Missões de trabalho, material de custeio e missões de estudo.', 'Proposta de projeto em parceria com universidade francesa; equipe de trabalho com no mínimo 2 docentes doutores, além do coordenador do projeto.', 'CAPES: bexeletronico.cgci@capes.gov.br', '', 'Ciências Agronômicas, agroalimentares e veterinária.', '', '', '', '', '', 'Para esclarecimentos e auxílio, favor entrar em contato com o Observatório de Pesquisa Desenvolvimento & Inovação - pdi@pucpr.br, (41) 3271-2128', 'B', '', '', 'http://www.capes.gov.br/images/stories/download/editais/1542014-Edital-020-2014-BRAFAGRI.pdf', 0, 'Observatório', 0, '', 'francine.zucco', '', '', 0),
(81, 'Chamada 22/2014 - Ciências Humanas, Sociais e Sociais Aplicadas', 20141007, 'CNPq', 'pt_BR', '22/2014', 20141105, 19000101, 19000101, 'Apoiar projetos de pesquisa científica, tecnológica e de inovação que visem contribuir significativamente para o desenvolvimento científico e tecnológico do País, no âmbito das Ciências Humanas, Sociais e Sociais Aplicadas, mediante o financiamento de projetos de pesquisa com mérito científico.', 'Até R$ 30.000,00 para gastos com itens de custeio e capital.', '1.O proponente deve possuir título de doutor, ser obrigatoriamente o coordenador da proposta e ter vínculo formal com a instituição de execução do projeto, em departamentos das áreas de Ciências Humanas, Sociais e Sociais Aplicadas ou em programas de pós-graduação dessas áreas. <br>2.O projeto deve estar claramente caracterizado como pesquisa científica, tecnológica ou inovação. Não serão enquadradas propostas de atividades de extensão nem de montagem de banco de dados.', 'humanas2014@cnpq.br', '', '', '', '', '', '', 'As propostas devem ser acompanhadas de arquivo contendo o projeto e devem ser encaminhadas ao CNPq exclusivamente via Internet, utilizando-se do Formulário de Propostas online, disponível na Plataforma Carlos Chagas.', '', 'A', '', '', 'http://www.cnpq.br/web/guest/chamadas-publicas?p_p_id=resultadosportlet_WAR_resultadoscnpqportlet_INSTANCE_0ZaM&id=47-413-2859&detalha=chamadaDetalhada&filtro=abertas', 0, 'Observatório', 20141007, '', 'francine.zucco', 'Oportunidade de recursos para projetos em Ciências Humanas e Sociais', '', 0),
(5, 'CHAMADA DE PROJETOS MEC/MCTI/CAPES/CNPq/FAPs \r\nNº 09/2014<BR>\r\nPROGRAMA CIÊNCIA SEM FRONTEIRAS – BOLSAS NO PAÍS \r\nMODALIDADE PESQUISADOR VISITANTE ESPECIAL – PVE', 20140617, 'CNPq', 'pt_BR', '09/2014', 20140408, 20140623, 20140825, 'Esta chamada, a ser gerida exclusivamente pela CAPES, tem como objetivo o apoio financeiro a projetos de pesquisa que visem por meio do intercâmbio, da mobilidade internacional e da cooperação científica e tecnológica, promover a consolidação, expansão e internacionalização da \r\nciência, inovação, e tecnologia, bem como da competitividade do País com enfoque nas áreas contempladas do Programa Ciência sem Fronteiras.', '', 'Perfil: O pesquisador indicado para a bolsa Pesquisador Visitante Especial – PVE deve atender aos seguintes requisitos: <BR>\r\n• Ter reconhecida liderança científica e/ou tecnológica internacional nas áreas \r\ncontempladas do Programa Ciência sem Fronteiras; \r\n• Ter título de doutor ou perfil equivalente; \r\n• Residir no exterior no momento de envio da proposta', '', '', '', '', '', '', '', 'As propostas deverão ser submetidas por meio do link disponível na página \r\nhttp://www.cienciasemfronteiras.gov.br/web/csf/pesquisador-visitante-especial1, a partir da data  indicada na seção CRONOGRAMA – Apêndice I da Chamada.', '', 'B', '', '', '', 0, 'Observatório', 0, '', 'e.bianco', '', '', 0),
(82, 'Chamada 43/2014  <br>Olimpíadas Científicas', 20141007, 'CNPq', 'pt_BR', '43/2014', 20141105, 19000101, 19000101, 'Selecionar propostas para a realização de Olimpíadas Cientificas de âmbito Nacional como instrumento de melhoria dos ensinos fundamental e médio, para identificar jovens talentosos que podem ser estimulados a seguir carreiras técnico-científicas. Poderá ser apoiada também a realização de olimpíadas internacionais no Brasil, em sua fase final, de acordo com as conclusões estabelecidas nesta Chamada.', 'Itens de custeio.', '1. O proponente deve possuir título de doutor, ser obrigatoriamente o coordenador da proposta e ter vínculo formal com a instituição. <br>2. O projeto deve estar claramente caracterizado como Olimpíada Científica de alcance nacional. <br>3. No caso de Olimpíada Internacional ela deverá se realizar no Brasil; estar claramente caracterizada como Olimpíada Científica; encontrar-se em sua fase final; envolver um número significativo de países e ser proposta por grupo organizador de Olimpíada Nacional já apoiada pelo CNPq e com tradição na área.', 'olimpíadas@cnpq.br', '', '', '', '', '', '', 'As propostas devem ser acompanhadas de arquivo contendo o projeto e devem ser encaminhadas ao CNPq exclusivamente via Internet, utilizando-se do Formulário de Propostas online, disponível na Plataforma Carlos Chagas.', '', 'A', '', '', 'http://goo.gl/P08o5B', 0, 'Observatório', 20141007, '', 'francine.zucco', 'Recursos para realização de Olimpíadas Científicas', '', 0),
(12, 'Advanced Training Course on Foot and Mouth Disease in Cattle and Pigs', 20140618, '00034', 'us_EN', 'NO. J1404311/ID.1480', 20140618, 20140618, 20140725, 'Educação aplicada e capacitação de recursos humanos em medidas preventivas, epidemiológicas, ambientais e de estabilização para pecuária em um dos maiores campos de criação de gado do Japão.\r\nCursos de 25 de agosto a 28 de setembro de 2014.', 'Bolsa para curso de treinamento em grupo no Japão.', 'Mais de 3 anos de experiência na área; fluente em inglês; ser professor ou pesquisador; entre 25 a 55 anos de idade.', 'JICA Brasil -  brsp_oso_rep@jica.go.jp / jicabr-training@jica.go.jp', '', 'Medicina Veterinária.', '', '', '', '', '', 'Para esclarecimentos e auxílio, favor entrar em contato com o Observatório de Pesquisa Desenvolvimento & Inovação - pdi@pucpr.br, (41) 3271-2128.', 'B', '', '', 'http://www.jica.go.jp/brazil/portuguese/office/courses/c8h0vm00008rb1vc-att/J1404311_-_Advanced_Training_Course_on_Foot_and_Mouth_Disease.pdf', 0, 'Observatório', 0, '', 'francine.zucco', '', '', 0),
(93, 'EDITAL Nº 61/2014 - Programa Dra. Ruth Cardoso', 20141030, 'CAPES', 'pt_BR', '61/2014', 20141207, 19000101, 19000101, 'O presente edital tem como objetivo selecionar candidato para bolsa de professor/pesquisador visitante brasileiro, atuando em instituições brasileiras, em meio de carreira, no âmbito do programa Cátedra Dra. Ruth Cardoso, oferecendo apoio à participação em atividades de docência e pesquisa nas Ciências Humanas e Sociais na Universidade Columbia, na cidade de Nova Iorque, EUA.', 'Estipêndio mensal: US$ 5.000,00 e benefícios.', '<br>1.Ter concluído seu doutorado até 31 de dezembro de 2005; <br>2.possuir nacionalidade brasileira, não cumulada com nacionalidade norte-americana; <br>3.estar credenciado como docente e orientador em programa de pós-graduação reconhecido pela CAPES; <br>4.dedicar-se em regime integral às atividades acadêmicas, que devem incluir a docência, orientação ou co-orientação de dissertações ou teses e a participação em projetos de pesquisa nas áreas de História do Brasil Contemporânea, Antropologia, Ciência Política e Sociologia.', 'fulbright@capes.gov.br', '', 'História do Brasil Contemporânea, Antropologia, Ciência Política e Sociologia', '', '', '', '', 'O candidato deve submeter sua candidatura exclusivamente via internet - www.fulbright.org.br', '', 'A', '', '', 'http://www.capes.gov.br/cooperacao-internacional/estados-unidos/programa-ruth-cardoso', 0, 'Observatório', 20141030, '', 'francine.zucco', 'Bolsa pesquisador visitante em ciências humanas e sociais - Universidade de Columbia', '', 0),
(101, 'Global Brain and Nervous System Disorders Research Across the Lifespan', 20141110, '00058', 'us_EN', '2014/15', 20150105, 19000101, 19000101, 'This Funding Opportunity Announcement (FOA) encourages applications proposing innovative, collaborative research projects between United States (U.S.) and low- and middle-income country (LMIC) scientists (or direct collaborations between upper middle-income country (UMIC), and other LMIC scientists) on brain and other nervous system function and disorders throughout life, relevant to LMICs. These research programs are expected to contribute to the long-term goals of building sustainable research capacity in LMICs to address nervous system development, function and impairment throughout life, which may ultimately lead to diagnostics, prevention, treatment, rehabilitation and implementation strategies.', 'Application budgets are not limited, but need to reflect actual needs of proposed project.  Direct costs do not include any consortium/contractual Facilities and Administrative (F & A) costs.', 'At least two institutions, one in the U.S. or UMIC (upper-middle income)  and one in a LMIC (low-middle income) must be involved as partners in the grant application.', 'brainfic@mail.nih.gov', '', 'Nervous system function and/or impairment from birth to advanced age and across generations.', '', '', '', '', 'Applications must be submitted electronically following the instructions described in the SF424 (R&R) Application Guide.', '', 'A', '', '', 'http://grants.nih.gov/grants/guide/pa-files/PAR-14-332.html#_Section_III._Eligibility', 0, 'Observatório', 20141110, '', 'francine.zucco', 'Oportunidade do National Institutes of Health - Global Brain and Nervous System Disorders Research', '', 0),
(39, 'Programa Paranaense de Pesquisas em Saneamento Ambiental - FA/SANEPAR', 20140710, 'FA', 'pt_BR', '09/2014', 20140930, 20141003, 19000101, 'Apoiar a execução de projetos de pesquisa e desenvolvimento que contribuam com  a melhoria das condições do saneamento ambiental, representando significativa contribuição para o desenvolvimento da ciência, tecnologia e inovação.', 'Serão financiados itens de capital (na proporção máxima de 20%) e de custeio (na proporção mínima de 80%), no valor global de até R$ 150.000,00.', 'O coordenador deve possuir título de doutor e o projeto deve atender exclusivamente às linhas temáticas dispostas no edital.', 'projetos@fundacaoaraucaria.org.br', '', 'Saneamento ambiental: água, esgoto, reuso, resíduos sólidos, gestão.', '', '', '', '', '', 'Para esclarecimentos e auxílio, favor entrar em contato com o Observatório de Pesquisa, Desenvolvimento & Inovação - pdi@pucpr.br, (41) 3271-2128.', 'A', '', '', 'http://www.fappr.pr.gov.br/arquivos/File/chamadas2014/CP09_2014_Saneamento.pdf', 0, 'Observatório', 20140710, '1', 'francine.zucco', '', '', 0),
(4, '<BR>Chamada N° 01/2014 - CAPES/CNPq/DAAD<BR>\r\nPrograma Conjunto de Bolsas de Doutorado na República Federal da Alemanha Seleção 2014/2015', 20140610, 'CAPES', 'pt_BR', '01/2014', 20140428, 20140428, 20140830, 'O objetivo do programa é oferecer bolsas de estágio de doutorado de forma a complementar os esforços despendidos pelos programas de pós-graduação no Brasil, na formação de recursos humanos de alto nível para inserção no meio acadêmico, de ensino e de pesquisa no país.', '', '<BR>3.1 Cada candidatura deverá apresentar, obrigatoriamente, os seguintes requisitos:\r\n<BR>a) confirmação formal de orientação científica na Alemanha;\r\n<BR>b) projeto de pesquisa científica de qualidade e formalmente aceito pelo(s)  orientador(es);\r\n<BR>c) qualificação acadêmica acima da média;\r\n<BR>d) ser cidadão brasileiro ou estrangeiro com visto permanente no país;\r\n<BR>e) comprovante de conhecimento de inglês ou de alemão;\r\n<BR>f) não ter recebido anteriormente bolsa das agências brasileiras para realização de estudos no mesmo nível pretendido;\r\n<BR>g) não ter o título de doutor;\r\n<BR>h) o Currículo Lattes deve estar atualizado, principalmente as informações de endereço completo, telefone e e-mail.<BR>\r\n<BR>3.2 Caso esteja cursando o mestrado, o candidato deverá defender a dissertação antes de viajar para a Alemanha.<BR>\r\n3.3 Os candidatos à bolsa de Doutorado Sanduíche e de Duplo Doutorado deverão, necessariamente, estar matriculados em curso de doutorado em Instituição de Ensino Superior no Brasil.<BR>\r\n<BR>3.4 Para as bolsas de duplo doutorado, é necessário que no regulamento da pós-graduação de ambas as universidades (brasileira e alemã) esteja prevista essa possibilidade.<BR>\r\n<BR>3.5 O candidato residente na Alemanha há um ano ou mais, levando-se em conta a data de inscrição no programa, ou período igual ou superior a dois anos, levando-se em conta o início da implementação da bolsa, não poderá receber bolsa da agência alemã DAAD.<BR>\r\n<BR>3.6 O bolsista que se encontre residindo no exterior, quando da aprovação da bolsa, não fará jus ao valor correspondente ao auxílio-deslocamento relativo ao trecho de ida e nem ao auxílio-instalação.', 'Esclarecimentos e informações adicionais acerca do conteúdo desta Chamada podem ser obtidos encaminhando mensagem para os seguintes endereços: doutorado@daad.org.br, doutorado_alemanha@capes.gov.br e codes@cnpq.br', '', 'Doutorado Pleno <BR>\r\n\r\nCaracteriza-se pela execução plena da pesquisa e da defesa de tese na Alemanha. Essa modalidade tem o objetivo de formar doutores no exterior em instituições de reconhecido nível de ensino e pesquisa, em todas as áreas do conhecimento.<BR>\r\n\r\nDoutorado Sanduíche<BR>\r\n\r\nEssa modalidade apoia o aluno formalmente matriculado em curso de doutorado no Brasil que justifique a necessidade de aprofundamento teórico, coleta e/ou tratamento de dados ou desenvolvimento parcial da parte experimental de sua tese na Alemanha.<BR>\r\n\r\nDuplo Doutorado (Doutorado Sanduíche –SWE Cotutela)<BR>\r\n\r\nTrata-se de modalidade oferecida pela CAPES e pelo DAAD e destina-se a candidatos inscritos em um curso de doutorado no Brasil que pretendem obter titulação de ambas as universidades.', '', '', '', '', 'As candidaturas devem ser apresentadas por meio do formulário eletrônico disponível na plataforma Carlos Chagas, localizada na página do CNPq. Uma versão da documentação deverá ser encaminhada por correio para o escritório do DAAD, no Rio de Janeiro/Brasil.', 'Para esclarecimento de dúvidas e auxílio no envio da proposta, favor entrar em contato com a Diretoria de Pesquisa pelo e-mail cip@pucpr.br aos cuidados de Erli.', 'B', '', '', 'http://www.cnpq.br/web/guest/chamadas-publicas', 0, 'Observatório', 0, '', 'e.bianco', '', '', 0),
(83, 'Chamada 44/2014 - Feiras de Ciências e Mostras Científicas', 20141007, 'CNPq', 'pt_BR', '44/2014', 20141105, 19000101, 19000101, 'Apoiar a realização de Feiras de Ciências e Mostras Científicas de âmbito municipal, estadual/distrital e nacional, como um instrumento para a melhoria dos ensinos fundamental, médio e técnico, bem como para despertar vocações científicas e/ou tecnológicas e identificar jovens talentosos que possam ser estimulados a seguirem carreiras científico-tecnológicas. Além disso, possibilitar a seleção dos melhores trabalhos para participação em Feiras/Mostras Internacionais.', '1. Abrangência municipal: até R$ 40.000,00 e máx. 5 bolsas de IC Jr. <br>2. Abrangência estadual: até R$ 200.000,00 e máx. 20 bolsas de IC Jr. <br>3. Abrangência nacional: até R$ 500.000,00 e máx. 70 bolsas de IC Jr.', 'O proponente poderá apresentar um único projeto e para apenas uma das categoriais descritas, deverá ser obrigatoriamente o coordenador do projeto e ter curso superior completo.', 'feiradeciencias@cnpq.br', '', '', '', '', '', '', 'As propostas devem ser acompanhadas de arquivo contendo o projeto e devem ser encaminhadas ao CNPq exclusivamente via Internet, utilizando-se do Formulário de Propostas online, disponível na Plataforma Carlos Chagas.', '', 'A', '', '', 'http://goo.gl/3kvqOo', 0, 'Observatório', 20141007, '', 'francine.zucco', 'Recursos para realização de Feiras de Ciências e Mostras Científicas - Bolsas IC Jr.', '', 0),
(6, 'ÚLTIMOS DIAS: <br>Chamada Universal– MCTI/CNPq', 20140617, 'CNPq', 'pt_BR', 'Nº 14/2014', 20140616, 19000101, 20141103, 'A presente Chamada tem por objetivo selecionar propostas para apoio financeiro a projetos que visem contribuir significativamente para o desenvolvimento científico e tecnológico e inovação do País, em qualquer área do conhecimento.', 'CUSTEIO:\r\n<BR>a) material de consumo, componentes e/ou peças de reposição de equipamentos, software caso seja apenas uma licença temporária, instalação, recuperação e manutenção de equipamentos;\r\n<BR>b) serviços de terceiros – pagamento integral ou parcial de contratos de manutenção e serviços de terceiros, pessoa física ou jurídica, de caráter eventual;\r\n<BR>c) despesas acessórias, especialmente as de importação e as de instalações necessárias ao adequado funcionamento dos equipamentos; \r\n<BR>d) passagens e diárias.\r\n<BR>CAPITAL:\r\n<BR>a) material bibliográfico;\r\n<BR>b) software, cuja licença seja permanente, equipamentos e material permanente.\r\n<BR>BOLSAS\r\n<BR>Serão concedidas bolsas, unicamente nas modalidades Iniciação Científica e Apoio Técnico.\r\n<BR>A bolsa de Apoio Técnico destina-se a profissional técnico especializado. Para esta modalidade estão disponíveis dois níveis: AT-NS - bolsa para técnico de nível.', 'Faixa A: exclusiva para Pesquisadores que obtiveram o título de doutor a partir de 2007 inclusive, exceto bolsistas de produtividade (PQ/DT) nível 1; ou a Bolsistas BJT do Programa Ciência sem Fronteiras.\r\n<br>Faixa B: Bolsistas de Produtividade em Pesquisa (PQ) categoria 2; ou Produtividade em Desenvolvimento Tecnológico e Extensão Inovadora (DT) categoria 2; ou ainda, a pesquisadores que não possuem bolsas destas modalidades, em qualquer categoria. \r\n<br>Faixa C: de livre concorrência. Podem concorrer nesta faixa quaisquer pesquisadores que atendam ao item II.2.4 da Chamada. Bolsistas de Produtividade (PQ e DT) categoria 1 podem concorrer apenas na faixa C.', 'Esclarecimentos e informações adicionais acerca do conteúdo desta Chamada podem ser obtidos encaminhando mensagem para o endereço: universal2014@cnpq.br.\r\n<BR>O atendimento a proponentes com dificuldades técnicas no preenchimento do Formulário de Propostas online será feito pelo endereço eletrônico suporte@cnpq.br.\r\n<BR>Para dúvidas ou dificuldades no preenchimento dos itens do Formulário de Propostas online, o atendimento se dará pelo telefone 0800.61.9697, de segunda a sexta-feira, no horário de 8h30 às 18h30.', '', 'Todas as áreas de conhecimento.', '', '', '', '', 'As propostas devem ser acompanhadas de arquivo contendo o projeto e devem ser encaminhadas ao CNPq exclusivamente via Internet, utilizando-se do Formulário de Propostas Online, disponível na Plataforma Integrada Carlos Chagas (http://carloschagas.cnpq.br).', 'Para esclarecimentos e auxílio, favor entrar em contato com o Observatório de Pesquisa, Desenvolvimento & Inovação - pdi@pucpr.br, (41) 3271-2128.', 'B', '', '', 'http://www.cnpq.br/web/guest/chamadas-publicas?p_p_id=resultadosportlet_WAR_resultadoscnpqportlet_INSTANCE_0ZaM&filtro=abertas&detalha=chamadaDivulgada&idDivulgacao=4742', 0, 'Observatório', 20140612, '', 'e.bianco', '', '', 0),
(13, '<br>Programa BRAFITEC - Cooperação Brasil/França em Tecnologia', 20140610, 'CAPES', 'pt_BR', 'EDITAL nº. 21/2014', 20140919, 19000101, 19000101, 'O programa consiste em projetos de parcerias universitárias em todas as especialidades de Engenharia, exclusivamente em nível de graduação, para fomentar o intercâmbio em ambos os países e estimular a aproximação das estruturas curriculares, inclusive a equivalência e o reconhecimento mútuo de créditos obtidos nas instituições participantes.', 'Missões de trabalho, material de custeio e missões de estudo.', 'Proposta de projeto de parceria universitária, equipe de trabalho com no mínimo 2 docentes doutores, além do coordenador do projeto.', 'brafitec.projetos@capes.gov.br', '', 'Engenharias.', '', '', '', '', '', 'Para esclarecimentos e auxílio, favor entrar em contato com o Observatório de Pesquisa Desenvolvimento & Inovação - pdi@pucpr.br, (41) 3271-2128', 'A', '', '', 'http://www.capes.gov.br/images/stories/download/editais/1542014-Edital-021-2014-BRAFITEC.pdf', 0, 'Observatório', 0, '', 'francine.zucco', '', '', 0);
INSERT INTO `fomento_editais` (`id_ed`, `ed_titulo`, `ed_data`, `ed_agencia`, `ed_idioma`, `ed_chamada`, `ed_data_1`, `ed_data_2`, `ed_data_3`, `ed_texto_1`, `ed_texto_2`, `ed_texto_3`, `ed_texto_4`, `ed_texto_5`, `ed_texto_6`, `ed_texto_7`, `ed_texto_8`, `ed_texto_9`, `ed_texto_10`, `ed_texto_11`, `ed_texto_12`, `ed_status`, `ed_autor`, `ed_corpo`, `ed_url_externa`, `ed_total_visualizacoes`, `ed_local`, `ed_data_envio`, `ed_document_require`, `ed_login`, `ed_titulo_email`, `ed_edital_tipo`, `ed_fluxo_continuo`) VALUES
(84, 'Chamada CNPq 39/2014 - Agroecologia', 20141009, 'CNPq', 'pt_BR', '39/2014', 20141107, 19000101, 19000101, 'Apoiar projetos que integrem atividades de extensão, pesquisa, ensino e fomento a processos de inovação tecnológica e metodológica visando a construção e socialização de conhecimentos e práticas relacionados à agroecologia, bem como à promoção dos sistemas orgânicos de produção e de base agroecológica. Tal ação permitirá a formação de Núcleos e Rede de Núcleos de Estudo em Agroecologia e Produção Orgânica.', 'Projeto de Núcleo de Estudo em Agroecologia e Produção Orgânica: até R$ 200.000,00 - custeio, capital e bolsas.', 'Os projetos submetidos na Linha 1 deverão propor a criação ou manutenção de um Núcleo de Estudo em Agroecologia e Produção Orgânica fundamentado nos princípios, conhecimentos e práticas da agroecologia e da produção orgânica e de base agroecológica, por meio de ações que integrem atividades de ensino, pesquisa e extensão em sua área de influência. <br>Quanto ao proponente: possuir título de mestre ou doutor; ser obrigatoriamente o coordenador do projeto e não ser contemplado na Chamada CNPq 81/2013.', 'chamada39-2014@cnpq.br', '', 'Agroecologia e Produção Orgânica.', '', '', '', '', 'As propostas devem ser acompanhadas de arquivo contendo o projeto e devem ser encaminhadas ao CNPq exclusivamente via Internet, utilizando-se do Formulário de Propostas online, disponível na Plataforma Carlos Chagas.', '', 'A', '', '', 'http://goo.gl/x7P8JG', 0, 'Observatório', 20141009, '', 'francine.zucco', '', '', 0),
(16, 'xxx', 20140609, '', 'pt_BR', '2014', 20141015, 19000101, 19000101, 'xxx', '<html>\r\n	<head>\r\n		<title>Editor HTML Online</title>\r\n	</head>\r\n	<body>\r\n		<div style="text-align: center;">\r\n			<img alt="" height="72" src="http://www.grupocoimbra.org.br/coimbra/images/stories/coimbra/capes.jpg" style="float: left;" width="83" /></div>\r\n		<div style="text-align: center;">\r\n			<p>\r\n				Segue o link para acesso ao Edital do Prêmio Capes de Tese – Edição 2014 com todas as orientações sobre a pré-seleção a ser feita pela Coordenação do Programa de pós-graduação e a seleção dos premiados a ser feita pela CAPES:</p>\r\n			<p>\r\n				<a href="http://www.capes.gov.br/images/stories/download/editais/262014-033-2014-PCT.pdf">http://www.capes.gov.br/images/stories/download/editais/262014-033-2014-PCT.pdf</a></p>\r\n			<p>\r\n				Mais uma vez, contamos com a ampla divulgação e participação desta instituição.</p>\r\n			<p>\r\n				As inscrições estarão abertas no período de <strong>29/05/14 a 26/06/14</strong>.</p>\r\n			<p>\r\n				Qualquer dúvida poderá ser esclarecida por meio do endereço: <a href="mailto:premiocapes@capes.gov.br">premiocapes@capes.gov.br</a></p>\r\n			<p>\r\n				 </p>\r\n		</div>\r\n		<p>\r\n			 </p>\r\n	</body>\r\n</html>', '', '', '', '', '', '', '', '', '', 'xxx', 'X', '', '', '', 0, 'Observatório', 0, '', 'RENE.GABRIEL', '', '', 0),
(26, 'Programa CAPES/STIC-AmSud Cooperação Brasil-França-América do Sul em Tecnologia da Informação', 20140617, 'CAPES', 'pt_BR', 'EDITAL Nº 30/2014', 20140717, 19000101, 19000101, 'O Programa regional STIC-AmSud é uma iniciativa da cooperação francesa com suas contrapartes da Argentina, Brasil, Chile, Peru e Uruguai, orientada para promover e fortalecer a colaboração e a criação de redes de pesquisa-desenvolvimento no âmbito das Ciências e Tecnologias da Informação e da Comunicação (STIC), através da realização de projetos conjuntos de pesquisa.', 'Missões de trabalho e missões de estudo.', '-Os coordenadores das equipes do projeto deverão possuir o título de doutor há pelo menos 4 anos; <br>-o PPG deve possuir preferencialmente conceito 5, 6 ou 7; <br>-as propostas deverão apresentar equipe de trabalho brasileira com, no mínimo, 2 (dois) docentes Doutores, além do coordenador, vinculados à instituição e apresentar também caráter inovador; <br>-o grupo de pesquisa brasileiro deverá estar associado, no mínimo, a uma equipe francesa e a \r\numa sul-americana.', 'sticamsud@capes.gov.br', '', 'Ciências e Tecnologias da Informação e da Comunicação (STIC).', '', '', '', '', '', 'Para esclarecimentos e auxílio, favor entrar em contato com o Observatório de Pesquisa, Desenvolvimento & Inovação - pdi@pucpr.br, (41) 3271-2128.', 'A', '', '', 'http://www.capes.gov.br/editais/abertos/5978-stic-amsud', 0, 'Observatório', 20140617, '1', 'francine.zucco', '', '', 0),
(28, 'Capes/Fulbright - Estágio Pós-Doutoral em Ciências Humanas, Ciências Sociais, Letras e Artes nos EUA', 20140623, 'CAPES', 'pt_BR', 'EDITAL Nº 34/2014', 20140731, 19000101, 20140901, 'Selecionar candidatos para bolsas de Estágio Pós-Doutoral, no âmbito do Programa CAPES/Fulbright Estágio Pós-Doutoral em Ciências Humanas, Ciências Sociais, Letras e Artes nos EUA, incrementar as pesquisas realizadas por recém-doutores no país nestas áreas e estreitar as relações bilaterais entre os dois países.', 'Mensalidade; auxílios pesquisa, deslocamento, seguro saúde, instalação, e participação em eventos.', 'Possuir nacionalidade brasileira, não cumulada com nacionalidade norte-americana; <br>-ter obtido o diploma de doutorado após 31 de dezembro de 2006; <br>-ter proficiência em língua inglesa; <br>-não ter usufruído anteriormente de outra bolsa de estágio pós-doutoral no exterior ou auxílio financeiro para o mesmo objetivo; <br>-residir atualmente no Brasil.', 'fulbright@capes.gov.br; posdoc@fulbright.org.br', '', 'Ciências Humanas, Ciências Sociais, Letras e Artes.', '', '', '', '', 'As inscrições serão gratuitas e feitas exclusivamente pela internet, mediante o preenchimento do formulário de inscrição da Comissão Fulbright, em inglês, no endereço www.fulbright.org.br.', 'Para esclarecimentos e auxílio, favor entrar em contato com o Observatório de Pesquisa, Desenvolvimento & Inovação - pdi@pucpr.br, (41) 3271-2128.', 'A', '', '', 'http://www.capes.gov.br/editais/abertos/6426-bolsa-capes-fulbright-estagio-pos-doutoral-nas-ciencias-humanas-ciencias-sociais-letras-e-artes-nos-eua', 0, 'Observatório', 20140624, '', 'francine.zucco', '', '', 0),
(35, '<br>Apoio à concessão de bolsas FA–FPTI', 20140708, '00045', 'pt_BR', 'Edital FPTI-BR 058', 20140730, 19000101, 19000101, 'Conceder apoio financeiro a coordenadores de projetos de pesquisa vinculados a Instituições de Ensino Superior através da contrapartida da Fundação Parque Tecnológico Itaipu por meio deste Edital e por meio da contrapartida da Fundação Araucária, através da Chamada Pública 02/2014, para submissão de projetos de pesquisa que estejam contemplados nas áreas de meio ambiente, energia e desenvolvimento territorial.', 'Bolsas e custeio. O coordenador, caso julgue necessário, poderá submeter o mesmo projeto de pesquisa à Chamada Pública nº 02/2014 para obtenção de apoio suplementar a novas bolsas de pesquisa.', 'A pesquisa deve ter foco em algum dos territórios dispostos no Anexo I do edital (região de Itaipu), ser um projeto científico caracterizado como de desenvolvimento tecnológico ou de inovação.', 'ptict@pti.org.br', '', 'Meio ambiente e recursos hídricos; Energia e Desenvolvimento territorial.', '', '', '', '', '', 'Para esclarecimentos e auxílio, favor entrar em contato com o Observatório de Pesquisa, Desenvolvimento & Inovação - pdi@pucpr.br, (41) 3271-2128.', 'A', '', '', 'http://www.pti.org.br/sites/default/files/edital_058-2014_-_agp_-_apoio_a_grupos_de_pesquisa.pdf', 0, 'Observatório', 20140703, '1', 'francine.zucco', '', '', 0),
(20, 'Programa CsF – Bolsas no País Modalidade Atração de Jovens Talentos', 20140811, '00038', 'pt_BR', 'Nº 02/2014', 20140915, 19000101, 19000101, 'Atrair e estimular a fixação no Brasil de jovens pesquisadores de talento, residentes no exterior, brasileiros ou estrangeiros, com destacada produção científica ou tecnológica nas áreas contempladas do Programa Ciência sem Fronteiras.', 'Mensalidade, auxílio deslocamento e instalação, auxílio à pesquisa na forma de custeio e cotas adicionais.', 'O coordenador do projeto, como proponente, deve ser bolsista produtividade PQ/DT ou equivalente e ter vínculo formal com a instituição de execução do projeto. O candidato à bolsa Atração de Jovens Talento de possuir título de doutor, residir no exterior e apresentar, no Currículo Lattes ou no modelo de Currículo anexado à chamada, o histórico de registro de patentes e/ou publicações científicas.', '0800 61 61 61 (para conteúdo da chamada) ou suporte@cienciasemfronteiras.gov.br (para dificuldades no acesso ou preenchimento).', '', 'Áreas contempladas no Programa Ciência sem Fronteiras.', '', '', '', '', '', 'Para esclarecimentos e auxílio, favor entrar em contato com o Observatório de Pesquisa Desenvolvimento & Inovação - pdi@pucpr.br, (41) 3271-2128', 'A', '', '', 'http://www.cnpq.br/web/guest/chamadas-publicas?p_p_id=resultadosportlet_WAR_resultadoscnpqportlet_INSTANCE_0ZaM&id=426-1-2232&detalha=chamadaDetalhada&filtro=abertas', 0, 'Observatório', 20140811, '', 'francine.zucco', 'Terceiro calendário de propostas para bolsas atração de Jovens Talentos', '', 0),
(7, 'PROGRAMA CIÊNCIA SEM FRONTEIRAS – BOLSAS NO PAÍS MODALIDADE PESQUISADOR VISITANTE ESPECIAL – PVE CHAMADA DE PROJETOS MEC/MCTI/CAPES/CNPq/FAPs', 20140617, 'CNPq', 'pt_BR', 'Nº 03/2014', 20140623, 20140623, 20140831, 'Fomentar o intercâmbio e a cooperação internacional, por meio da atração de lideranças internacionais que tenham destacada produção científica e tecnológica nas áreas contempladas do Programa Ciência sem Fronteiras.\r\nDuração: de dois a três anos, com permanência mínima no Brasil de 30 dias e no máximo noventa dias a cada ano de projeto, em estadias contínuas ou não.', 'Os recursos da presente Chamada serão destinados ao financiamento de bolsa e itens de custeio e deverão ser utilizados exclusivamente no projeto proposto pelo coordenador e aprovado pelo CNPq, compreendendo:\r\nBolsa Pesquisador Visitante Especial – PVE e respectivos benefícios, bolsas doutorado sanduíche no exterior e pós-doutorado no Brasil.\r\n<BR>Custeio:\r\n<BR>a. material bibliográfico;\r\n<BR>b. material de consumo, componentes e/ou peças de reposição de equipamentos, software, instalação, <BR>recuperação e manutenção de equipamentos;\r\n<BR>c. serviços de terceiros – pagamento integral ou parcial de contratos de manutenção e serviços de <BR>terceiros, pessoa física ou jurídica, de caráter eventual;\r\n<BR>d. despesas acessórias, especialmente as de importação e as de instalações necessárias ao adequado <BR>funcionamento de equipamentos;\r\n<BR>e. Passagens e diárias, de acordo com as normas das agências financiadoras, destinadas, <BR>exclusivamente aos membros da equipe para realização de atividades de campo, coleta de dados ou <BR>suporte de especialista para desenvolvimento do projeto.', 'O coordenador do projeto deverá atender, obrigatoriamente, aos itens abaixo:\r\n<BR>a. possuir o título de doutor ou perfil equivalente;\r\n<BR>b. ter seu currículo cadastrado na Plataforma Lattes, atualizado até a data limite para envio da proposta;\r\n<BR>c. ter vínculo formal com a instituição de execução do projeto.\r\n<BR>O candidato à bolsa Pesquisador Visitante Especial, no momento do <BR>envio da proposta, deverá: a. residir no exterior - para comprovação <BR>deste requisito, deverá constar no Currículo Lattes atualizado ou no <BR>modelo de Currículo, o endereço residencial e profissional no exterior.\r\n<BR>b. apresentar, no Currículo Lattes ou no modelo de Currículo, histórico de <BR>registro de patentes e/ou publicação de trabalhos científicos e <BR>tecnológicos de impacto e/ou prêmios de mérito acadêmico. Estes <BR>trabalhos devem estar relacionados às áreas contempladas do Programa <BR>Ciência sem Fronteiras.', 'Esclarecimentos e informações adicionais acerca do conteúdo desta Chamada podem ser obtidos exclusivamente encaminhando mensagem por meio do endereço http://www.capes.gov.br/faleconosco ou por telefone 0800 61 61 61, opção 0, subopção 1.\r\n<BR>O atendimento a proponentes, exclusivamente com dificuldades no acesso ou no preenchimento do Formulário de Propostas Online, será feito pelo endereço suporte@cienciasemfronteiras.gov.br ou por telefone 0800 61 96 97 de segunda a sexta-feira, no horário de 8h30 as 18h00.', '', 'ÁREAS CONTEMPLADAS\r\n<BR>a. Engenharias e demais Áreas Tecnológicas;\r\n<BR>b. Ciências Exatas e da Terra;\r\n<BR>c. Biologia, Ciências Biomédicas e da Saúde;\r\n<BR>d. Computação e Tecnologias da Informação;\r\n<BR>e. Tecnologia Aeroespacial;\r\n<BR>f. Fármacos;\r\n<BR>g. Produção Agrícola Sustentável;\r\n<BR>h. Petróleo, Gás e Carvão Mineral;\r\n<BR>i. Energias Renováveis;\r\n<BR>j. Tecnologia Mineral;\r\n<BR>k. Biotecnologia;\r\n<BR>l. Nanotecnologia e Novos Materiais;\r\n<BR>m. Tecnologias de Prevenção e Mitigação de Desastres Naturais;\r\n<BR>n. Biodiversidade e Bioprospecção;\r\n<BR>o. Ciências do Mar;\r\n<BR>p. Indústria Criativa (voltada a produtos e processos para desenvolvimento tecnológico e inovação);\r\n<BR>q. Novas Tecnologias de Engenharia Construtiva;', '', '', '', '', '', '', 'X', '', '', '', 0, 'Observatório', 0, '', 'e.bianco', '', '', 0),
(14, '<br>Banting Postdoctoral Fellowships', 20140721, '00035', 'us_EN', '2014-15', 20140924, 19000101, 19000101, 'Atrair e reter talentos pós-doc nacionais e internacionais, desenvolver seu potencial de liderança e posicioná-los como líderes de pesquisa de sucesso do futuro.', 'Bolsa pós-doutorado.', 'Não pode ter uma posição "tenure-track ou tenure" na instituição e deve desenvolver o projeto em Universidade canadense previamente prospectada.', 'banting@researchnet-recherchenet.ca', '', 'Ciências da Saúde.', '', '', '', '', 'A submissão será completa apenas após uma série de etapas descritas detalhadamente no site.', 'Para esclarecimentos e auxílio, favor entrar em contato com o Observatório de Pesquisa Desenvolvimento & Inovação - pdi@pucpr.br, (41) 3271-2128', 'A', '', '', 'http://banting.fellowships-bourses.gc.ca/app-dem/elig-adm-eng.html', 0, 'Observatório', 20140721, '', 'francine.zucco', 'Oportunidade de bolsa pós-doc em Ciências da Saúde no Canadá', '', 0),
(19, 'Programa CsF – Bolsas no País Modalidade Pesquisador Visitante Especial', 20140811, '00038', 'pt_BR', 'Nº 03/2014', 20140915, 19000101, 19000101, 'Fomentar o intercâmbio e a cooperação científica e tecnológica entre grupos de pesquisa nacionais e do exterior, por meio da atração de lideranças internacionais que tenham destacada produção científica e tecnológica nas áreas contempladas do Programa Ciência sem Fronteiras.', 'Bolsa, auxílio deslocamento e instalação, auxílio à pesquisa na forma de custeio e cotas adicionais.', 'O coordenador do projeto, como proponente, deve ser bolsista produtividade ou equivalente e ter vínculo formal com a instituição de execução do projeto.\r\nO candidato à bolsa Pesquisador Visitante Especial, no momento do envio da proposta, deve residir no exterior e apresentar, no Currículo Lattes ou no modelo de Currículo anexado à chamada, o histórico de registro de patentes e/ou publicações científicas.', '0800 61 61 61 (para conteúdo da chamada) ou suporte@cienciasemfronteiras.gov.br (para dificuldades no acesso ou preenchimento).', '', 'Áreas contempladas no Programa Ciência sem Fronteiras.', '', '', '', '', '', 'Para esclarecimentos e auxílio, favor entrar em contato com o Observatório de Pesquisa Desenvolvimento & Inovação - pdi@pucpr.br, (41) 3271-2128', 'A', '', '', 'http://www.cnpq.br/web/guest/chamadas-publicas?p_p_id=resultadosportlet_WAR_resultadoscnpqportlet_INSTANCE_0ZaM&filtro=abertas&detalha=chamadaDivulgada&idDivulgacao=4602', 0, 'Observatório', 20140811, '', 'francine.zucco', 'Terceiro calendário de propostas para bolsas Pesquisador Visitante Especial', '', 0),
(85, 'Chamada CNPQ/CAPES n. 25/2014 - Editoração', 20141009, 'CNPq', 'pt_BR', '25/2014', 20141105, 19000101, 19000101, 'A presente Chamada tem por objetivo selecionar propostas para apoio financeiro a projetos que visem incentivar a editoração e publicação de periódicos científicos brasileiros de alta especialização em todas as áreas de conhecimento de forma a contribuir significativamente para o desenvolvimento científico e tecnológico e inovação do País.', '', '1. O proponente deve possuir título de doutor, ser obrigatoriamente o coordenador da proposta e ter vínculo formal com a instituição de execução do projeto. <br>2. O periódico deve atender às características descritas na chamada (item II.2.2.1).', 'editoracao@cnpq.br', '', '', '', '', '', '', 'As propostas devem ser acompanhadas de arquivo contendo o projeto e devem ser encaminhadas ao CNPq exclusivamente via Internet, utilizando-se do Formulário de Propostas online, disponível na Plataforma Carlos Chagas.', '', 'A', '', '', 'http://www.cnpq.br/web/guest/chamadas-publicas?p_p_id=resultadosportlet_WAR_resultadoscnpqportlet_INSTANCE_0ZaM&filtro=abertas&detalha=chamadaDivulgada&idDivulgacao=5462', 0, 'Observatório', 20141009, '', 'francine.zucco', 'Oportunidade de recursos para editoração e publicação de periódicos científicos brasileiros', '', 0),
(21, 'CHAMADA INCT - MCTI/CNPq/CAPES/FAPs', 20140611, 'CNPq', 'pt_BR', 'nº 16/2014', 20140908, 19000101, 20150306, 'Apoiar atividades de pesquisa científica, tecnológica e de inovação em áreas estratégicas e/ou na fronteira do conhecimento que visem a busca de solução de grandes problemas nacionais, por meio de Institutos Nacionais de Ciência e Tecnologia, no âmbito do PROGRAMA INCT.', 'Custeio, capital e bolsas - total de até R$ 10 milhões.', '- O coordenador do projeto, como proponente, deve ser bolsista produtividade PQ/DT nível 1 ou equivalente; \r\n<br>- contrapartida da instituição (uso da estrutura, disponibilização de profissional especializado); \r\n<br>- o Instituto deve atender às características essenciais descritas na chamada, ser composto por no mínimo 8 pesquisadores doutores e com Comitê Gestor com pelo menos 5 doutores de, no mínimo, 3 instituições distintas; \r\n<br>Os Institutos devem abranger preferencialmente quatro vertentes: pesquisa, formação de recursos humanos, internacionalização e transferência do conhecimento para o Setor Empresarial e/ou para o Setor Público. Adicionalmente, considerando seu caráter estratégico, todos os INCT devem obrigatoriamente prever ações em uma quinta vertente, a de difusão e disseminação do conhecimento para a sociedade.', 'inct2014@cnpq.br', '', 'Temas preferencialmente apoiados: \r\n<br>- Tecnologias ambientais e mitigação de mudanças climáticas\r\n<br>- Biotecnologia e uso sustentável da biodiversidade\r\n<br>- Agricultura\r\n<br>- Saúde e fármacos\r\n<br>- Espaço, defesa e segurança nacional\r\n<br>- Desenvolvimento urbano\r\n<br>- Segurança pública\r\n<br>- Fontes alternativas de energias renováveis, biocombustíveis e bioenergia\r\n<br>- Nanotecnologia\r\n<br>- Pesquisa Nuclear\r\n<br>- Tecnologia da informação e comunicação\r\n<br>- Controle e Gerenciamento de Tráfego Aéreo.', '', '', '', '', '', 'Para esclarecimentos e auxílio, favor entrar em contato com o Observatório de Pesquisa Desenvolvimento & Inovação - pdi@pucpr.br, (41) 3271-2128', '!', '', '', 'http://www.cnpq.br/web/guest/chamadas-publicas?p_p_id=resultadosportlet_WAR_resultadoscnpqportlet_INSTANCE_0ZaM&filtro=abertas&detalha=chamadaDivulgada&idDivulgacao=4862', 0, 'Observatório', 20140616, '1', 'francine.zucco', '', '', 0),
(102, 'Programa de Bolsas FA & Renault do Brasil - CP 19/2014', 20141111, 'FA', 'pt_BR', '19/2014', 20141212, 19000101, 19000101, 'Incentivar a articulação entre instituições de ensino superior e institutos de pesquisa e a Renault do Brasil, oportunizando parceria na formação de futuros profissionais e favorecer o aprendizado de estudantes em práticas diferenciadas relacionadas ao universo de automóveis.', 'Bolsas para alunos da graduação, mestrado e doutorado.', 'A proposta deve ser apresentada por um Coordenador Institucional do Programa com vínculo formal com a instituição proponente.', 'projetos2@fundacaoaraucaria.org.br', '', '', '', '', '', '', 'As propostas deverão ser enviadas por meio do Sistema de Informação e Gestão de Projetos (SigAraucária), disponível no site www.fappr.pr.gov.br', '', '!', '', '', 'http://www.fappr.pr.gov.br/arquivos/File/chamadas2014/CP19_2014_Renault.pdf', 0, 'Observatório', 20141111, '', 'francine.zucco', '', '', 0),
(86, 'Tecnologia Assistiva no Brasil e Estudos sobre Deficiência (PGPTA) n. 59/2014', 20141010, 'CAPES', 'pt_BR', '59/2014', 20141106, 20141106, 19000101, 'O PGPTA tem por objetivo estimular no País a realização de projetos conjuntos de pesquisa com vistas a possibilitar o desenvolvimento de projetos de pesquisas científicas e a formação de recursos humanos pós-graduados na área de Tecnologia Assistiva no Brasil, contribuindo, assim, para desenvolver e consolidar o pensamento brasileiro contemporâneo na área.', 'Custeio: até R$ 266.640,00; Capital: até R$ 400.000,00 e bolsas.', '1.O edital dirige-se a pesquisadores de instituições de Ensino Superior que possuam programas de pós-graduação (PPG) stricto sensu acadêmicos, recomendados pela CAPES com áreas de concentração ou linhas de pesquisa voltados à tecnologia assistiva ou dirigidas aos temas contemplados neste Edital. <br>2.Serão apoiados projetos que envolvam, obrigatoriamente, parcerias (rede ou consórcio) entre equipes de diferentes instituições de ensino superior (3 a 4 equipes), preferencialmente de diferentes estados. <br>3.A instituição líder deve ter vinculado um PPG com conceito Capes  igual ou superior a 5. <br>4.O projeto deverá ter, prioritariamente, caráter multi e interdisciplinar, contemplar a formação de RH e ter como objetivo final a formação de no mínimo 3 mestres e 2 doutores. <br>5.O coordenador-geral deve possuir título de doutor há pelo menos 5 anos e cada IES coparticipante deve indicar um coordenador doutor.', 'pgpta@capes.gov.br', '', 'Tecnologia Assistiva', '', '', '', '', 'As propostas deverão ser enviadas à CAPES em 2 (duas) vias, uma impressa, por correio e outra, digitalizada em formato PDF, por e-mail (pgpta@capes.gov.br), até o dia 06/11/2014.', '', 'A', '', '', 'http://www.capes.gov.br/bolsas/programas-especiais/programa-capes-pgtpa', 0, 'Observatório', 20141010, '', 'francine.zucco', '', '', 0),
(32, 'Reimagine Education Awards', 20140718, '00042', 'us_EN', 'Awards 2014', 20140926, 19000101, 19000101, 'Preparar os líderes de amanhã em todos os domínio da vida e trabalho; atender às necessidade de bilhões de pessoas que necessitam desenvolver suas competências em um mundo em exponencial mudança cientifica e tecnológica; atender às necessidades educacionais de todos os tipos de estudantes; promover o aproveitamento máximo dos métodos educacionais presenciais e à distância; e apoiar o aprendizado ao longo da vida.', 'Prêmio de $ 50,000.00 e divulgação na mídia via QS.', 'Experimentos pedagógicos com resultados mensuráveis e impacto definido, de metodologia replicável e inspiradora.', '', '', 'E-learning, ensino semi- e presencial nas seguintes categorias: Artes e Humanas • Engenharias e Tecnologia • Ciências da Vida e Natureza • Medicina • Ciências Sociais • Educação Profissional e Executiva e metodologias pedagógicas inovadoras.', '', '', '', '', 'O Competition Submission Form deve ser preenchido e enviado juntamente com os documentos relevantes descritos no site. A inscrição em seu total não deve ultrapassar 2 mil palavras, ou quantidade equivalente de mídia adicional.', 'Para esclarecimentos e auxílio, favor entrar em contato com o Observatório de Pesquisa, Desenvolvimento & Inovação - pdi@pucpr.br, (41) 3271-2128.', 'A', '', '', 'http://reimagine-education.com/', 0, 'Observatório', 20140718, '', 'francine.zucco', '', '', 0),
(22, '<br>PRÊMIO CAPES DE TESE 2014', 20140610, 'CAPES', 'pt_BR', 'Edital nº 33/2014', 20140626, 19000101, 20140925, 'O Prêmio Capes de Tese e o Grande Prêmio Capes de Tese são prêmios concedidos anualmente pela Capes às melhores teses de doutorado defendidas e aprovadas nos cursos reconhecidos pelo MEC, considerando os quesitos originalidade e qualidade. \r\nO Prêmio é outorgado para a melhor tese de doutorado selecionada em cada uma das áreas do conhecimento reconhecidas pela CAPES.\r\n<br>O Grande Prêmio Capes de Tese é outorgado para a melhor tese selecionada nas áreas de 1)Ciências Biológicas, Ciências da Saúde e Ciências Agrárias; 2)Engenharias e Ciências Exatas e da Terra; 3)Ciências Humanas, Lingüística, Letras e Artes, Ciências Sociais Aplicadas e Ensino de Ciências.', '- Auxílios equivalentes a uma participação em congresso nacional ou internacional para o orientador;\r\n<br>- bolsa para realização de estágio pós-doutoral no Brasil e/ou no exterior para o autor;\r\n<br>- prêmios adicionais em dinheiro, em parceria com a Fundação Conrado Wessel, Fundação Carlos Chagas e Instituto Paulo Gontijo.', 'A tese deve ter sido defendida no Brasil e em PPG que tenha tido, no mínimo, 3 teses de doutorado defendidas no ano do prêmio e deve estar disponível no banco de teses da Capes. Deve primeiramente passar por uma pré-seleção dentro da instituição, realizada por uma comissão de avaliação instaurada pelo Programa de Doutorado. \r\n<br>Concorrerão ao Grande Prêmio Capes de Tese os autores vencedores do Prêmio Capes de Tese que apresentarem à Capes uma vídeo-aula com duração de 20 a 30 minutos, em CD ou DVD, destinada a estudantes de ensino médio, abordando, de forma apropriada a tal nível educacional, o tema da tese de doutorado.', 'premiocapes@capes.gov.br', '', 'Áreas de conhecimento reconhecidas pela CAPES.', '', '', '', '', 'O coordenador do programa de pós-graduação deverá ser o responsável pela inscrição.', 'Para esclarecimentos e auxílio, favor entrar em contato com o Observatório de Pesquisa Desenvolvimento & Inovação - pdi@pucpr.br, (41) 3271-2128', 'A', '', '', 'http://www.capes.gov.br/images/stories/download/editais/262014-033-2014-PCT.pdf', 0, 'Observatório', 20140611, '', 'francine.zucco', '', '', 0),
(33, 'OPORTUNIDADE PARA ATRAIR JOVENS PESQUISADORES: CNPq / TWAS Fellowships Programme', 20140701, 'CNPq', 'pt_BR', 'Nº 009/2014', 20140728, 19000101, 20141101, 'Selecionar jovens pesquisadores provenientes de países em desenvolvimento (à exceção do Brasil) para realizar parte de sua formação no Brasil, em nível de Doutorado Pleno, Doutorado Sanduíche ou Pós-Doutorado.', 'Bolsas de doutorado, doutorado sanduíche e pós-doutorado, auxílio deslocamento.', 'Jovens pesquisadores provenientes de países em desenvolvimento (à exceção do Brasil), possuir domínio da língua portuguesa, aplicar para PPGs de conceito igual ou superior a 5.', 'twas.ascin@cnpq.br', '', 'Ciências Agrárias, Ciências Biológicas, Ciências Médicas e da Saúde, Química, Engenharias, Matemática, Ciências da Computação, Física, Astronomia e Geociências, Oceanografia.', '', '', '', '', '', 'Para esclarecimentos e auxílio, favor entrar em contato com o Observatório de Pesquisa, Desenvolvimento & Inovação - pdi@pucpr.br, (41) 3271-2128.', 'A', '', '', 'http://www.cnpq.br/web/guest/chamadas-publicas?p_p_id=resultadosportlet_WAR_resultadoscnpqportlet_INSTANCE_0ZaM&filtro=abertas&detalha=chamadaDivulgada&idDivulgacao=4842', 0, 'Observatório', 20140701, '', 'francine.zucco', '', '', 0),
(27, 'Chamada para projetos de P&D das empresas de distribuição da Eletrobras', 20140623, '00040', 'pt_BR', '2014-15', 20140718, 19000101, 20141101, 'Seleção de projetos de P&D a serem desenvolvidos para empresas de distribuição da Eletrobras.', 'Aquisição de Materiais/Equipamentos; apoio à Infraestrutura; recursos humanos, serviços de terceiros; viagens e diárias; outros.', '-A proponente pode ser Universidade, Instituição de Ensino Superior ou Instituição de \r\nPesquisa, Científica ou Tecnológica; <br>-deve  possuir competência e atuação \r\nno tema em questão e estar preferencialmente sediada nas Regiões Norte, \r\nNordeste e Centro Oeste; <br>-o projeto deve apresentar caráter inovativo nas áreas de interesse descritas no edital.', 'pedpee.distribuicao@eletrobras.com', '', 'Sistemas de energia elétrica: Meio ambiente, planejamento, segurança, operações, qualidade,  supervisão e controle, medição e combate às perdas.', '', '', '', '', 'As propostas deverão ser encaminhadas unicamente através da página da Eletrobras: www.eletrobras.com/elb/chamadaprojetosped, de acordo com as instruções e esclarecimentos apresentados na mesma página.', 'Para esclarecimentos e auxílio, favor entrar em contato com o Observatório de Pesquisa, Desenvolvimento & Inovação - pdi@pucpr.br, (41) 3271-2128.', 'A', '', '', 'http://www.eletrobras.com/elb/chamadaprojetosped/main.asp', 0, 'Observatório', 20140623, '', 'francine.zucco', '', '', 0),
(95, 'Edital 62/2014 - Programa de bolsa especial para doutorado em pesquisa médica PBE-DPM II', 20150126, 'CAPES', 'pt_BR', '62/2014', 20150306, 20150306, 19000101, 'Apoiar a formação de recursos humanos em pesquisa médica, com a finalidade de estimular a produção acadêmica e a formação de pesquisadores, em nível de doutorado, por meio de financiamento específico, consolidando e ampliando o pensamento crítico estratégico para o desenvolvimento científico do País.', 'Bolsas de doutorado', 'Este Edital dirige-se a coordenadores de programas de pós-graduação stricto sensu das áreas de Medicina e áreas afins, de instituições públicas e privadas brasileiras, que possuam programas com conceito 5, 6 ou 7 que possuam área de concentração ou linha de pesquisa em Medicina.', '', '', 'Medicina', '', '', '', '', 'O envio da(s) proposta(s) deverá ser feito via correio, em formato impresso para o endereço especificado no item 13 deste Edital.  Deverá ser enviada, também, uma cópia digital da proposta em formato PDF ao e-mail: doutorado.pesquisa@capes.gov.br', '', '!', '', '', 'http://capes.gov.br/bolsas/programas-especiais/pbe-dpm', 0, 'Observatório', 20141104, '', 'francine.zucco', '', '1', 0),
(1, '27.ª edição do Prêmio Paranaense de Ciência e Tecnologia', 20140610, 'SETI', 'pt_BR', '09/2013', 20140331, 20140430, 19000101, 'Estimular os pesquisadores e inventores do estado do Paraná.\r\n<BR>Identificar, premiar, disseminar e estimular a realização de ações de pesquisa e inovação;\r\n<BR>Dar visibilidade à produção científica e tecnológica desenvolvida no Estado do Paraná.', 'Será premiado um candidato de cada um das áreas do conhecimento e de cada uma das categorias da edição em curso com:\r\n<BR>a) Certificado.\r\n<BR>b) Prêmio em dinheiro (líquido) equivalente a uma vez e meia do valor do vencimento do professor titular em regime de dedicação exclusiva, incluindo a gratificação de incentivo à titularidade de doutor, da Carreira do Magistério Público do Ensino Superior do Paraná, ao professor-pesquisador e ao pesquisador-extensionista.\r\n<BR>c) Prêmio em dinheiro (liquido) equivalente a uma vez e meia do valor do vencimento do professor titular em regime de dedicação exclusiva, incluindo a gratificação de incentivo à titularidade de doutor, da Carreira do Magistério Público do Ensino Superior do Paraná, ao estudante de graduação.\r\n<BR>d) Prêmio em dinheiro (liquido) equivalente a 60% do valor do vencimento do professor titular em regime de dedicação exclusiva, incluindo a gratificação de incentivo à titularidade de doutor, da carreira do Magistério Público do Ensino Superior do Paraná, ao inventor independente.\r\n<BR>e)Prêmio em dinheiro (liquido) equivalente a 60% do valor do vencimento do professor titular em regime de dedicação exclusiva, incluindo a gratificação de incentivo à titularidade de doutor, da carreira do Magistério Público do Ensino Superior do Paraná, ao jornalista.\r\n<BR>OBS: O prêmio em dinheiro será em moeda nacional e depositado em conta bancária indicada pelo vencedor.', 'Ciências Humanas e Sociais e Ciências Agrárias', 'Informações com a SETI: CCT – Coordenadoria de Ciência e Tecnologia\r\npremiocet@seti.pr.gov.br\r\nTelefones: (41) 3281-7383 I (41) 3281-7314', '', 'Ciências Humanas e Sociais e Ciências Agrárias\r\n<BR>a)       à Categoria Profissional: um professor-pesquisador e um pesquisador-extensionista;\r\n<BR>b)       à Categoria Estudante de Curso de Graduação;\r\n<BR>c)       à Categoria Inventor Independente; e\r\n<BR>d)       à Categoria Jornalismo Científico', '', '', '', '', 'A proposta deverá ser submetida, única e exclusivamente, pela internet, através do site da SETI – Secretaria de Estado da Ciência, Tecnologia e Ensino Superior, e ainda, as categorias: Professor-Pesquisador, Professor-Extensionista e Estudante de Curso de Graduação, deverão encaminhar os documentos seguintes documentos solicitados:\r\n<BR>Ficha de Inscrição devidamente preenchida e assinada;\r\n<BR>Currículo lattes atualizado;\r\n<BR>Carta de Indicação do Pró-Reitor de Pesquisa, devidamente justificada, no caso das Universidades e institutos de Pesquisa e cargos congêneres para outras instituições  para o seguinte endereço eletrônico premiocet@seti.pr.gov.br.', 'Para esclarecimento de dúvidas e auxílio no envio da proposta, favor entrar em contato com a Diretoria de Pesquisa pelo e-mail cip@pucpr.br aos cuidados de Erli.', 'B', '', '', 'http://www.seti.pr.gov.br/modules/conteudo/conteudo.php?conteudo=226', 0, 'Observatório', 0, '', 'e.bianco', '', '', 0),
(31, 'Programa CAPES/Universidade de Dundee-Reino Unido - Seleção de Bolsistas para Doutorado-Pleno', 20140701, 'CAPES', 'pt_BR', 'EDITAL Nº. 36/2014', 20140731, 19000101, 20141001, 'Apoiar estudantes brasileiros que pretendem realizar seu doutorado na Universidade de Dundee e estreitar as relações bilaterais entre os dois países.', 'Mensalidade, auxílio deslocamento, auxílio seguro-saúde e auxílio instalação.', '-Possuir nacionalidade brasileira; <br>-ter diploma de nível superior e, preferencialmente, diploma de mestrado reconhecido pela CAPES; <br>-não ter sido agraciado anteriormente com bolsa de estudos no exterior, em nível de doutorado e nem receber bolsa ou benefício financeiro para o mesmo objetivo.', 'dundee@capes.gov.br; CLS-PhDAdmin@dundee.ac.uk', '', 'Biologia', '', '', '', '', 'O candidato deverá, obrigatoriamente, apresentar sua candidatura simultaneamente à CAPES e à Universidade de Dundee, composta de projeto de pesquisa, formulários e documentação complementar. Para candidatura na Universidade de Dundee, os candidatos devem submeter o CV para o email CLS-PhDAdmin@dundee.ac.uk.', 'Para esclarecimentos e auxílio, favor entrar em contato com o Observatório de Pesquisa, Desenvolvimento & Inovação - pdi@pucpr.br, (41) 3271-2128.', 'A', '', '', 'http://www.capes.gov.br/editais/abertos/6200-programa-capesuniversidade-de-dundee-bolsa-de-doutorado-pleno-', 0, 'Observatório', 20140701, '', 'francine.zucco', '', '', 0),
(40, '<br>Gorgas Memorial Institute Research Award', 20140707, '00046', 'pt_BR', '2014', 20140723, 19000101, 19000101, 'Promover e facilitar o desenvolvimento de relações científicas entre cientistas das Américas por meio da oportunidade de viagens de curto prazo para pesquisadores em início de carreira no sentido de: <br>-estabelecer projetos em colaboração na área de biomedicina com foco em doenças tropicais relevantes à comunidade local <br>-aprendizado de novas técnicas e metodologias aplicáveis ao estudo de tais doenças.', 'Prêmio de até $20,000 para custos de viagem e relacionados ao projeto.', 'Ser cidadão ou residente permanente na América, possuir doutorado na área de doenças tropicais, ser pesquisador em início de carreira.', 'Judy DeAcetis - j.deacetis@astmh.org <br>+1-847-480-9592; +1-847-480-9282', '', 'Saúde pública, doenças tropicais, doenças infecciosas, microbiologia.', '', '', '', '', '', 'Para esclarecimentos e auxílio, favor entrar em contato com o Observatório de Pesquisa, Desenvolvimento & Inovação - pdi@pucpr.br, (41) 3271-2128.', 'A', '', '', 'http://www.astmh.org/AM/Template.cfm?Section=ASTMH_Sponsored_Fellowships&Template=/CM/ContentDisplay.cfm&ContentID=5833', 0, 'Observatório', 20140707, '1', 'francine.zucco', 'Prêmio internacional na área de doenças tropicais', '', 0),
(38, 'Programa CAPES/DGPU de Cooperação entre Brasil e Espanha', 20140707, 'CAPES', 'pt_BR', 'EDITAL Nº 40/2014', 20140817, 19000101, 19000101, 'Apoiar e fomentar Projetos Conjuntos de Pesquisa e para Seminários em diversas áreas e a troca de conhecimento científico, de documentação e de publicações especializadas, de acordo com os termos acordados entre as partes, bem como promover a mobilidade de docentes e estudantes de pós-graduação, em nível de doutorado sanduíche e pós-doutorado entre Brasil e Espanha.', 'Bolsas no exterior, auxílio deslocamento, auxílio instalação, seguro saúde, diárias e recursos para material de custeio. ', 'O coordenador do projeto deve possuir título de doutor há mais de 5 anos e estar em efetivo exercício no magistério da educação superior durante todo o período da pesquisa. A equipe brasileira deverá ser composta por pelo menos 2 doutores vinculados ao PPG, além do coordenador.', 'dgpu@capes.gov.br', '', 'Diversas áreas de conhecimento.', '', '', '', '', '', 'Para esclarecimentos e auxílio, favor entrar em contato com o Observatório de Pesquisa, Desenvolvimento & Inovação - pdi@pucpr.br, (41) 3271-2128.', 'A', '', '', 'http://www.capes.gov.br/cooperacao-internacional/espanha/capesdgpu', 0, 'Observatório', 20140707, '1', 'francine.zucco', 'Oportunidade de recursos para Cooperação com Instituições Espanholas', '', 0),
(96, 'Cátedra Capes/Univerisdade de Harvard - 51/2014', 20141107, 'CAPES', 'pt_BR', '51/2014', 20141230, 19000101, 19000101, 'O objetivo específico deste Programa Cátedra CAPES / Universidade de Harvard – Professor Visitante Sênior nos EUA é a seleção para concessão de bolsa de até 12 meses de duração a professor visitante na Universidade de Harvard. A vaga será preenchida por um notável pesquisador e professor sênior do Brasil, especialista em qualquer disciplina ou área acadêmica.', 'Bolsa e auxílios', 'O candidato deve: <br>-possuir título de doutor; <br>-estar credenciado como docente e orientador em programa de pós&#8208;graduação reconhecido pela Capes, <br>-dedicar&#8208;se em regime integral às atividades acadêmicas; <br>-ter fluência em inglês.', 'harvard@capes.gov.br', '', 'Diversas áreas do conhecimento', '', '', '', '', 'O candidato deve submeter sua candidatura exclusivamente via internet constando os documentos descritos no edital.', '', 'A', '', '', 'http://www.capes.gov.br/cooperacao-internacional/estados-unidos/catedra-capes-harvard', 0, 'Observatório', 20141107, '', 'francine.zucco', 'Oportunidade de Cátedra em Harvard', '', 0),
(41, 'Programa de Bolsas de Mestrado e Doutorado - CAPES/FA', 20140710, 'FA', 'pt_BR', 'Chamada 11/2014', 20140811, 20140814, 19000101, 'Conceder bolsas de mestrado e doutorado em todas as áreas do conhecimento, visando promover a consolidação e o fortalecimento dos programas de pós-graduação stricto sensu paranaenses recomendados pela CAPES e ofertados por instituições paranaenses.', 'Bolsas para mestrado e doutorado.', 'O coordenador do curso/programa de Pós-Graduação, ou substituto legal, será o responsável pelo envio da proposta, podendo submeter apenas uma proposta por programa.', 'projetos@fundacaoaraucaria.org.br', '', 'Diversas áreas de conhecimento.', '', '', '', '', '', 'Para esclarecimentos e auxílio, favor entrar em contato com o Observatório de Pesquisa, Desenvolvimento & Inovação - pdi@pucpr.br, (41) 3271-2128.', 'A', '', '', 'http://www.fappr.pr.gov.br/arquivos/File/chamadas2014/CP11_2014_MeD.pdf', 0, 'Observatório', 20140710, '1', 'francine.zucco', '', '', 0),
(54, 'Prêmio Universitário Desafio Renault Experience', 20140818, '00050', 'pt_BR', '2014', 20140831, 19000101, 19000101, 'Oportunidade para alunos de universidades de todo o Brasil mostrarem o seu talento nas áreas de Engenharia, Design, Negócios e Comunicação.', 'Prêmios de até R$ 10 mil.', '-Acadêmicos regularmente matriculados dos cursos de Comunicação, Design, Engenharia e Negócios (Administração, Recursos Humanos, Ciências Contábeis, Marketing e Economia). <br>-É obrigatória a orientação de um professor pertencente à mesma IES dos alunos do Grupo. Cada aluno poderá participar de apenas um Grupo, os professores poderão participar de quantos grupos desejarem.', '', '', 'Engenharia, Comunicação, Design e Negócios.', '', '', '', '', '', 'Para esclarecimentos e auxílio, favor entrar em contato com o Observatório de Pesquisa, Desenvolvimento & Inovação - pdi@pucpr.br, (41) 3271-2128.', 'A', '', '', 'https://www.desafiorenaultexperience.com.br/', 0, 'Observatório', 20140812, '', 'francine.zucco', 'Prêmio Renault para alunos da graduação', '', 0),
(87, 'Prazo Prorrogado: Prêmio Vale-Capes de Ciência e Sustentabilidade 2014', 20141118, 'CAPES', 'pt_BR', '60/2014', 20141130, 19000101, 19000101, 'Selecionar as melhores teses de doutorado e dissertações de mestrado que tragam ideias, soluções e processos inovadores para questões como redução do consumo de água e energia, redução de gases do efeito estufa (GEE), aproveitamento, reaproveitamento e reciclagem de resíduos e/ou rejeitos e tecnologia socioambiental com ênfase no combate à pobreza.', '', 'As teses e dissertações para concorrerem ao Prêmio devem: <br>1. estar disponíveis no banco de teses e dissertações da CAPES; <br>2. ter sido defendidas em 2013 e no Brasil; <br>3. ter sido defendidas em programa de pós-graduação que tenha tido, no mínimo, 5 (cinco) teses de doutorado e/ou 5 (cinco) dissertações de mestrado defendidas no ano anterior ao do Edital.', 'premiovalecapes@capes.gov.br', '', 'Teses e dissertações em: <br>1.Processos eficientes para redução do consumo de água e de energia; <br>2.Aproveitamento, reaproveitamento e reciclagem de resíduos e/ou <br>3.Redução de Gases do efeito estufa (GEE); <br>4.Tecnologias socioambientais, com ênfase no combate a pobreza.', '', '', '', '', 'A pré-seleção das teses e dissertações a serem indicadas aos Prêmios ocorrerá nos programas de pós-graduação das Instituições de Ensino Superior. Após a indicação do(s) trabalho(s) selecionado(s) pela comissão de avaliação, o coordenador do programa de pós-graduação será responsável pela inscrição do(s) trabalho(s), exclusivamente, pelo site http://pvc.capes.gov.br/inscricao até 30/11/2014.', '', 'A', '', '', 'http://www.capes.gov.br/bolsas/premios/premio-vale-capes-de-ciencia-e-sustentabilidade', 0, 'Observatório', 20141118, '', 'francine.zucco', '', '', 0),
(97, 'Grand Challenges in Global Health: Preventing Preterm Birth', 20141107, '00057', 'pt_BR', '2014-2015', 20141201, 19000101, 19000101, 'The present Request for Proposals (RFP) is the third call for proposals of the Preventing Preterm Birth initiative. The present Request for Proposals (RFP) is meant to catalyze additional research into longitudinal determinants of both healthy and abnormal pregnancy, with emphasis on preterm birth, by funding pilot studies to assess the feasibility of applying multi-omics high-throughput systems biology.', 'Total cost of $500,000 (including indirect costs)', 'Characteristics of successful proposals: the overarching goal is to assess the feasibility and reproducibility of multi-platform systems biologic approaches to characterize normal and abnormal pregnancy in a limited series of pilot projects. <br><br>Successful proposals may include one or more of the Aims: <br>1. Samples collection; <br>2. Utilization of high-throughput platforms; <br>3. Computational analysis of meta-data from multiple platforms. <br><br>Collaboration and cooperation among Research Investigators will be required with preference for cross-disciplinary studies and computational biology that could provide the most detailed interrogation of hypotheses, validation, and interventions appropriate to low-resource settings.', 'gappsgrants@seattlechildrens.org', '', '', '', '', '', '', 'Submission of a letter of inquiry (LOI) to GAPPS by December 1st, 2014. Letters of inquiry must be submitted electronically, using the forms, instructions, and process \r\ndescribed at: www.gapps.org/healthybirth.', '', 'A', '', '', 'http://gapps.org/index.php/research/healthy_birth/', 0, 'Observatório', 20141107, '', 'francine.zucco', 'Oportunidade Grand Challenges em Preventing Preterm Birth initiative', '', 0),
(42, 'Inscrição para bolsa Pós Doutorado na AstraZeneca pelo Programa Ciência sem Fronteiras (Fluxo Contínuo).', 20140715, '00038', 'pt_BR', '2014 – Fluxo EUA/UK', 20141231, 19000101, 19000101, 'É a oportunidade para pós-doutorados atuarem em um centro de pesquisas de referência mundial e fazer a diferença na saúde de pacientes de todo o mundo. Estão abertas 30 vagas para o período de dois anos de estudos nos centros de pesquisa da Medlmmune, em Gaithersburg e Mountain View (EUA), e Cambridge (Reino Unido).', 'Bolsa pós-doutorado.', 'Todos os documentos devem estar em Inglês, inclusive o Currículo Lattes (o usuário deverá optar pela publicação em Inglês na Plataforma Lattes). Na Carta de Apresentação, em inglês, deverá ser informada a linha ou linhas de interesse (ver site).', 'currículos.posdoc@astrazeneca.com', '', 'Ciências Biológicas e da Saúde', '', '', '', '', '', 'Para esclarecimentos e auxílio, favor entrar em contato com o Observatório de Pesquisa Desenvolvimento & Inovação - pdi@pucpr.br, (41) 3271-2128', 'A', '', '', 'http://www.cienciasemfronteiras.gov.br/web/csf/reino-unido4', 0, 'Observatório', 20140714, '', 'jeferson.vieira', '', '', 0),
(65, '<br>Gates Cambridge Scholarship', 20140910, '00054', 'pt_BR', '2014', 20141202, 19000101, 19000101, 'Gates Cambridge Scholarships são bolsas full-time altamente reconhecidas e concorridas. São concedidas aos candidatos de destaque de diferentes países fora do UK para obter o diploma de pós-graduação em qualquer uma das áreas disponíveis na University of Cambridge. <br>O programa busca formar uma rede global de futuros líderes comprometidos com a melhoria da qualidade de vida da população.', 'Bolsas para doutorado, mestrado ou programa de pós-graduação de 1 ano.', 'Quatro critérios: <br>-alinhamento ao programa escolhido de pós-graduação de Cambridge; <br>-excelência acadêmica, <br>-potencial de liderança; <br>-compromisso com o bem-estar social.', '', '', 'Áreas disponíveis na University of Cambridge.', '', '', '', '', 'Candidatos devem aplicar simultaneamene para o Gates Cambridge Scholarship e junto à Universidade de Cambridge no programa desejado por meio do Graduate Admissions  - http://www.graduate.study.cam.ac.uk/', '', 'A', '', '', 'http://gatescambridge.org/about/', 0, 'Observatório', 20140910, '', 'francine.zucco', 'Bolsas para pós-graduação em Cambridge', '', 0),
(43, 'Programa de Apoio à Formação de Profissionais no Campo das Competências Socioemocionais', 20140715, 'CAPES', 'pt_BR', 'EDITAL Nº 044/2014', 20140905, 19000101, 20141003, 'O programa apoiará o desenvolvimento de 10 projetos em rede de pesquisa e de inovação que permitam a criação de estratégias para o desenvolvimento de competências socioemocionais aliadas à formação de profissionais do magistério, bem como a melhoria da educação básica na rede pública.', 'Custeio no valor de até R$ 100.000,00 e limite de R$ 466.440,00 em bolsas.', 'Poderão submeter projetos professores que pertençam ao quadro de docentes de programas de pós-graduação (PPG) em educação, psicologia, psicopedagogia e outras áreas afins, cujos programas tenham obtido nota igual ou superior a 3 na última avaliação da CAPES. Os projetos devem ser compostos por pelo menos 2 PPGs stricto sensu de 2 instituições distintas.', 'cse@capes.gov.br', '', 'Educação. Foco no desenvolvimento de competências e habilidades socioemocionais como uma das dimensões da formação docente, integrada às demais.', '', '', '', '', 'Os projetos deverão ser submetidos por meio do Sistema Integrado CAPES – \r\nSICAPES (http://socioemocionais.capes.gov.br)', 'Para esclarecimentos e auxílio, favor entrar em contato com o Observatório de Pesquisa, Desenvolvimento & Inovação - pdi@pucpr.br, (41) 3271-2128.', 'A', '', '', 'http://www.capes.gov.br/educacao-basica/programa-capes-competencias-socioemocionais', 0, 'Observatório', 20140715, '1', 'francine.zucco', 'Oportunidade na área de Educação - Parceria entre CAPES e Instituto Ayrton Senna', '', 0);
INSERT INTO `fomento_editais` (`id_ed`, `ed_titulo`, `ed_data`, `ed_agencia`, `ed_idioma`, `ed_chamada`, `ed_data_1`, `ed_data_2`, `ed_data_3`, `ed_texto_1`, `ed_texto_2`, `ed_texto_3`, `ed_texto_4`, `ed_texto_5`, `ed_texto_6`, `ed_texto_7`, `ed_texto_8`, `ed_texto_9`, `ed_texto_10`, `ed_texto_11`, `ed_texto_12`, `ed_status`, `ed_autor`, `ed_corpo`, `ed_url_externa`, `ed_total_visualizacoes`, `ed_local`, `ed_data_envio`, `ed_document_require`, `ed_login`, `ed_titulo_email`, `ed_edital_tipo`, `ed_fluxo_continuo`) VALUES
(45, 'Bolsa CAPES/FULBRIGHT Master of Fine Arts', 20140718, 'CAPES', 'pt_BR', 'EDITAL Nº 45/2014', 20140831, 19000101, 19000101, 'Seleção de candidatos para concessão, pela CAPES, de bolsa de estudo em nível de Mestrado em Produção Cinematográfica, visando à realização de estudos em instituições de ensino superior nos EUA que oferecem este nível de formação profissional.', 'Bolsa, auxílio deslocamento e seguro saúde.', '-Possuir nacionalidade brasileira, não cumulada com nacionalidade norte-americana; <br>-ter concluído curso superior; <br>-ter experiência comprovada na área de elaboração de roteiros para produções cinematográficas e/ou audiovisuais; <br>-possuir certificado de proficiência em língua inglesa com pontuação mínima conforme o edital; <br>-não receber ou ter recebido bolsa para o mesmo objetivo.', 'camila.mfa@fulbright.org.br; fulbright@capes.gov.br', '', 'Produção cinematográfica', '', '', '', '', 'As inscrições serão gratuitas e feitas, exclusivamente, pela internet, mediante o preenchimento do formulário de inscrição da Comissão Fulbright, em inglês, e de acordo com as instruções específicas, ambos disponíveis no endereço www.fulbright.org.br.', 'Para esclarecimentos e auxílio, favor entrar em contato com o Observatório de Pesquisa, Desenvolvimento & Inovação - pdi@pucpr.br, (41) 3271-2128.', 'A', '', '', 'http://www.capes.gov.br/component/content/article/36-salaimprensa/noticias/7076-programa-seleciona-estudantes-para-mestrado-nos-eua-na-area-de-producao-cinematografica', 0, 'Observatório', 20140718, '', 'francine.zucco', 'Oportunidade de mestrado em produção cinematográfica', '', 0),
(66, 'Inscrições prorrogadas até 23/02/2015: Prêmio Mercosul de Ciência e Tecnologia', 20150126, 'CNPq', 'pt_BR', '2014', 20150223, 19000101, 19000101, 'Reconhecer e premiar os melhores trabalhos de estudantes, jovens pesquisadores e equipes de pesquisa, que representem potencial contribuição para o desenvolvimento científico e tecnológico dos países membros e associados ao Mercosul.', 'Premiação de US$ 20.500,00, troféus e placas.', 'São quatro categorias: <br>1. Iniciação Científica: modalidade individual ou equipe. Para equipes, sua composição poderá ser representada por, no mínimo, 2 representantes de um ou de mais países membros ou associados do MERCOSUL, até o limite de 5 integrantes, incluindo o autor principal; <br>2. Estudante Universitário: modalidade individual, sem limite de idade; <br>3. Jovem Pesquisador: modalidade individual, direcionada para graduados, estudantes de mestrado, mestres, estudantes de doutorado e doutores que tenham no máximo 35 anos de idade até 10/10/2014; <br>4. Integração: modalidade equipe, direcionada para graduados, estudantes de mestrado, mestres, estudantes de doutorado e doutores, sem limite de idade. A equipe deverá ser representada por, no mínimo, 2 integrantes de diferentes países membros ou associados do MERCOSUL, até o limite de 10 integrantes, incluindo o autor principal.  <br><br>O trabalho de pesquisa deve estar voltado aos interesses do MERCOSUL, abordar o tema "Popularização da Ciência" e deve estar concluído e apresentar resultados finais.', 'pmercosul@cnpq.br', '', 'Tema "Popularização da Ciência" nas seguintes linhas de pesquisa: <br>1. Museus e Centros de Ciência físicos, virtuais e itinerantes; <br>2. Feiras de Ciências, Mostras de Ciência, Mostras Científicas Itinerantes; <br>3. Mídias sociais e outros instrumentos.', '', '', '', '', 'A inscrição é de caráter individual ou equipe e deverá ser efetuada exclusivamente no endereço: www.premiomercosul.cnpq.br', '', 'A', '', '', 'http://www.premiomercosul.cnpq.br/', 0, 'Observatório', 20141215, '', 'francine.zucco', 'Inscrições prorrogadas até 23/02/2015: Prêmio Mercosul de Ciência e Tecnologia', '4', 0),
(46, 'Programa Centro Brasileiro Argentino de Biotecnologia', 20140718, 'CNPq', 'pt_BR', 'CBAB N° 07/2014', 20140820, 19000101, 19000101, 'Selecionar propostas em cooperação com a Argentina, sendo opcional e desejável a cooperação com o Uruguai, para apoio financeiro a projetos que visem contribuir significativamente para o desenvolvimento científico e tecnológico do país em biotecnologia.', 'Itens de custeio com orçamento máximo de R$ 150.000,00 por proposta.', '-O proponente deve possuir título de doutor e ter vínculo com  a instituição executora; <br>-o projeto deve prever a cooperação entre grupos de pesquisa do Brasil e da Argentina e, opcionalmente, do Uruguai; <br>-a proposta deve ser submetida no Brasil pelo coordenador brasileiro e na Argentina e Uruguai pelos respectivos coordenadores, em Chamadas lançadas naqueles países.', 'cobrg@cnpq.br ou pelo telefone 0800 61 9697.', '', '1- Bioprospecção, com ênfase em enzimas industriais e outros bioprodutos; <br>2- agrobiotecnologia, com impacto na produtividade, sustentabilidade e qualidade da produção agropecuária; <br>3- bioenergia, com ênfase em produção de biomassa e bioprocessos; <br>4- saúde humana, com ênfase em biofármacos; <br>5- saúde e produção animal; <br>6- biotecnologia ambiental.', '', '', '', '', 'As propostas devem ser acompanhadas de arquivo contendo o projeto e devem ser encaminhadas ao CNPq exclusivamente via Internet, utilizando-se do Formulário de Propostas online, disponível na Plataforma Carlos Chagas.', 'Para esclarecimentos e auxílio, favor entrar em contato com o Observatório de Pesquisa, Desenvolvimento & Inovação - pdi@pucpr.br, (41) 3271-2128.', 'A', '', '', 'http://www.cnpq.br/web/guest/chamadas-publicas?p_p_id=resultadosportlet_WAR_resultadoscnpqportlet_INSTANCE_0ZaM&filtro=abertas&detalha=chamadaDivulgada&idDivulgacao=4902', 0, 'Observatório', 20140718, '', 'francine.zucco', 'Oportunidade de cooperação com a Argentina em Biotecnologia', '', 0),
(44, 'Programa de Apoio à Pós-Graduação e à Pesquisa Científica e Tecnológica em Desenvolvimento Socioeconômico no Brasil', 20140721, 'CAPES', 'pt_BR', 'PGPSE N° 42/ 2014', 20141017, 20141017, 20141215, 'Estimular no País a realização de projetos conjuntos de pesquisa com vistas a possibilitar o desenvolvimento de pesquisas científicas e a formação de recursos humanos pós-graduados na área de Desenvolvimento Socioeconômico no Brasil, contribuindo, assim, para desenvolver e consolidar o pensamento brasileiro contemporâneo na área.', 'Bolsas, passagens aéreas, diárias para missões de pesquisa e docência e despesas de custeio relacionadas às atividades do projeto.', '-Deverá envolver parcerias (em rede ou consórcio) entre equipes de diferentes instituições; <br>-cada projeto deverá indicar uma instituição líder vinculada a um PPG com nota superior ou igual a 5; <br>deve contemplar um mínimo de 3 e um máximo de 4 equipes; <br>-o projeto deverá ter prioritariamente caráter multi e interdisciplinar, contemplar a formação de RH e ter como objetivo final a formação de no mínimo 3 doutores; <br>-cada coordenador institucional deve possuir título de doutor, sendo que o coordenador-geral há pelo menos 5 anos.', 'pgpse@capes.gov.br', '', 'Área de Desenvolvimento Socioeconômico, com áreas temáticas prioritárias definidas no edital.', '', '', '', '', 'As propostas deverão ser enviadas à CAPES em 2 (duas) vias, uma impressa, por correio e outra, digitalizada em formato PDF, por e&#8208;mail (pgpse@capes.gov.br)', 'Para esclarecimentos e auxílio, favor entrar em contato com o Observatório de Pesquisa, Desenvolvimento & Inovação - pdi@pucpr.br, (41) 3271-2128.', '!', '', '', 'http://www.capes.gov.br/bolsas/programas-especiais/desenvolvimento-socioeconomico-pgpse', 0, 'Observatório', 20140721, '1', 'francine.zucco', '', '', 0),
(67, 'CONFAP/UK Fellowship and Research Mobility', 20140923, '00048', 'pt_BR', '2014', 20141022, 19000101, 19000101, 'Este recurso para até três anos de apoio financeiro constitui uma oportunidade para pesquisadores brasileiros e britânios desenvolverem competências e aprimorarem esforços em seus grupos de pesquisa por meio de treinamentos, colaboração e visitas recíprocas entre seus parceiros.', 'Bolsas de pós-doutorado e mobilidade de pesquisa.', 'Os candidatos brasileiros devem ter vínculo empregatício com uma instituição brasileira e um coproponente no Reino Unido. <br>As bolsas de pós-doutorado acomodarão pesquisadores jovens (que tiverem terminado o doutorado entre 2 e 7 anos atrás) e pesquisadores seniors (mais de 7 anos desde a conclusão do doutorado).', 'aci@fapemig.br', '', 'Ciência Natural, Engenharia, Ciências Sociais e Humanidades.', '', '', '', '', 'As inscrições podem ser feitas por meio do site http://confap.org.br, na página reservada ao Fundo Newton. Após o preenchimento do formulário de inscrição, o pesquisador candidato deve enviá-lo para o e-mail fundonewton@confap.org.br', '', 'A', '', '', 'http://confap.org.br/news/reino-unido-e-confap-anunciam-oportunidades-para-pesquisadores-britanicos-e-brasileiros/', 0, 'Observatório', 20140918, '', 'francine.zucco', '2ª Chamada Fundo Newton - Fellowship and Research Mobility', '', 0),
(47, '<br>AEX - Apoio a eventos no exterior', 20150226, 'CAPES', 'pt_BR', '2014', 19000101, 19000101, 19000101, 'Apoiar a participação de doutores em eventos científicos no exterior, com vistas à apresentação de trabalhos científicos, de modo a propiciar a visibilidade internacional da produção científica, tecnológica e cultural geradas no país.', 'Valor fixo de auxílio para despesas de estadia e traslado de ida e volta, de acordo com a localização geográfica do evento.', '-Ter diploma de doutorado; <br>-não ter recebido apoio do programa AEX no ano anterior; <br>-submeter trabalho a congresso ou similar, de reconhecida relevância internacional na área do conhecimento.', 'paex@capes.gov.br', '', 'Diversas áreas do conhecimento.', '', '', '', '', 'A inscrição deverá seguir o calendário do edital e ser efetuada exclusivamente via internet, no endereço eletrônico: http://www.capes.gov.br/apoio-a-eventos/aex', '', 'A', '', '', 'http://www.capes.gov.br/apoio-a-eventos/aex', 0, 'Observatório', 20150309, '', 'francine.zucco', 'Apoio CAPES à participação em eventos no exterior', '5', 1),
(88, 'Newton Researcher Links Workshop Call', 20141016, '00048', 'pt_BR', '2014', 20141120, 19000101, 19000101, 'Esta modalidade do Newton Researcher Links visa dar apoio financeiro a grupos de pesquisadores em início de carreira do UK e do Brasil para desenvolverem workshop em parceria, focando no estabelecimento de links para oportunidades de futura colaboração e desenvolvimento de carreira. <br>Os workshops devem: <br>1. Apoiar o desenvolvimento internacional de pesquisa relevante; <br>2. Contribuir para o desenvolvimento profissional de pesquisadores em início de carreira; <br>3. Estabelecer novos links em pesquisa ou fortalecer os já existentes, com potencial de sustentabilidade a longo prazo.', 'Para realização de workshop.', 'Cada workshop será coordenado por dois pesquisadores líderes, um de cada país, e focará tanto numa área específica de pesquisa ou em temas interdisciplinares. <br>Os coordenadores poderão apontar até quatro pesquisadores líderes ou seniores (dois de cada país) para se envolverem nas atividades e atuarem como mentores; no entanto, o restante dos participantes deve ser pesquisadores em início de carreira. <br>A proposta deve ser bilateral, com parceiro britânico prospectado. <br>O workshop deve ter duração de  3 a 5 dias, ser realizado entre 01/04/2015 e 31/03/2016, com no máximo 40 participantes e em inglês.', 'UK-ResearcherLinks@britishcouncil.org', '', 'Todas as áreas estão contempladas, porém as áreas prioritárias no Brasil são: <br>1. Segurança alimentar; <br>2. Terapias avançadas para o tratamento de doenças crônicas: terapias celular e genética; <br>3. Doenças negligenciadas, <br>4. Radiofármacos; <br>5. Nanotecnologia aplicada à saúde pública.', '', '', '', '', 'A submissão da proposta deve ser feita mediante preenchimento de formulário online - www.britishcouncil.org/education/science/current-opportunities/Newton-Researcher-Links-workshops', '', 'A', '', '', 'http://www.britishcouncil.org/education/science/current-opportunities/Newton-Researcher-Links-workshops', 0, 'Observatório', 20141015, '', 'francine.zucco', 'Newton Fund: recursos para realização de workshop em parceria com Universidade britânica', '', 0),
(68, 'Chamada CNPq N º 31/2014 – Pesquisas sobre Doença de Chagas', 20140923, 'CNPq', 'pt_BR', '31/2014', 20141016, 19000101, 19000101, 'Apoiar atividades de pesquisa científica, tecnológica e a inovação no tema doença de Chagas por meio de projetos que possam gerar resultados capazes de contribuir ao aprimoramento dos programas de vigilância, controle, erradicação e prevenção da doença de Chagas.', 'De R$ 100 mil a R$ 500 mil - custeio, capital e bolsas.', 'O proponente deve possuir título de doutor e ser obrigatoriamente o coordenador da proposta.', 'cosau@cnpq.br', '', '', '', '', '', '', 'As propostas devem ser acompanhadas de arquivo contendo o projeto e devem ser encaminhadas ao CNPq exclusivamente via Internet, utilizando-se do Formulário de Propostas online, disponível na Plataforma Carlos Chagas.', '', 'A', '', '', 'http://www.cnpq.br/web/guest/chamadas-publicas?p_p_id=resultadosportlet_WAR_resultadoscnpqportlet_INSTANCE_0ZaM&id=47-436-2970&detalha=chamadaDetalhada&filtro=abertas', 0, 'Observatório', 20140923, '', 'francine.zucco', 'Recursos CNPq para pesquisas em Doença de Chagas', '', 0),
(49, 'Programa CAPES/FCT', 20140804, 'CAPES', 'pt_BR', '39/2014', 20140908, 19000101, 19000101, 'Apoiar o intercâmbio entre instituições de ensino e pesquisa, brasileiras e portuguesas por meio da mobilidade de docentes, pesquisadores e discentes de pós-graduação brasileiros e portugueses, visando à consolidação, expansão e internacionalização das instituições de ensino superior e dos institutos ou centros de pesquisa e desenvolvimento públicos brasileiros.', 'Missões de trabalho, missões de estudo e recursos de custeio.', 'O coordenador do projeto no Brasil deve: <br>-estar em efetivo exercício no magistério da educação superior durante todo o período da pesquisa; <br>-possuir título de doutor há mais de 5 (cinco) anos. <br>As instituições brasileiras poderão apresentar projeto conjunto com até 3 (três) outras instituições brasileiras. <br>A equipe brasileira deverá ser composta de pelo menos 2 (dois) doutores, além do coordenador, e estes devem estar vinculados a um PPG.', 'fct@capes.gov.br', '', 'Diversas áreas do conhecimento.', '', '', '', '', 'A apresentação da proposta deverá ser efetuada pela equipe portuguesa à FCT e pela equipe brasileira à CAPES mediante o preenchimento do formulário de inscrição disponível em http://www.capes.gov.br/cooperacao-internacional/portugal/fct até às 16h de 08/09/2014.', 'Para esclarecimentos e auxílio, favor entrar em contato com o Observatório de Pesquisa, Desenvolvimento & Inovação - pdi@pucpr.br, (41) 3271-2128.', 'A', '', '', 'http://www.capes.gov.br/cooperacao-internacional/portugal/fct', 0, 'Observatório', 20140804, '1', 'francine.zucco', 'Oportunidade de cooperação com Portugal', '', 0),
(50, '<br>PEC-PG 2014', 20140804, 'CNPq', 'pt_BR', '010/2014', 20140901, 19000101, 19000101, 'A presente Chamada tem por objetivo a concessão de bolsa para cidadãos oriundos de países com os quais o Brasil mantém acordo de Cooperação Educacional, Cultural ou de Ciência e Tecnologia, para realização de estudos de pós-graduação, em nível de mestrado, em IES brasileiras, de modo a fornecer a capacitação necessária para que o estudante-convênio possa contribuir para o desenvolvimento do seu país.', 'Bolsas de mestrado e auxílio deslocamento.', 'O candidato deve: <br>-ser cidadão dos países em desenvolvimento com os quais o Brasil mantém Acordo de \r\nCooperação conforme listagem do edital; <br>-não ser portador de visto que autorize o exercício de atividade remunerada no Brasil; <br>-não ser cidadão brasileiro, ainda que binacional; <br>-ter curso de graduação completo e não ter iniciado mestrado no Brasil; <br>-possuir comprovada proficiência em português; <br>-ser financeiramente responsável pela passagem de vinda para o Brasil e por sua manutenção até o recebimento da primeira mensalidade.', 'pec-pg@cnpq.br', '', 'Diversas áreas do conhecimento.', '', '', '', '', '', 'Para esclarecimentos e auxílio, favor entrar em contato com o Observatório de Pesquisa, Desenvolvimento & Inovação - pdi@pucpr.br, (41) 3271-2128.', 'A', '', '', 'http://www.cnpq.br/web/guest/chamadas-publicas?p_p_id=resultadosportlet_WAR_resultadoscnpqportlet_INSTANCE_0ZaM&filtro=abertas&detalha=chamadaDivulgada&idDivulgacao=4882', 0, 'Observatório', 20140804, '', 'francine.zucco', 'Oportunidade para trazer estrangeiros para programas de mestrado', '', 0),
(109, 'Cátedra Capes/CES de Ciências Sociais e Humanas em Portugal - 67/2014', 20150126, 'CAPES', 'pt_BR', '67/2014', 20150301, 19000101, 19000101, 'Visa a conceder bolsa a notável pesquisador e professor sênior do Brasil, especialista na área de ciências sociais e humanas, para lecionar e pesquisar no Centro de Estudos Sociais da Universidade de Coimbra, Portugal, no âmbito da Cátedra CAPES/CES de Ciências Sociais e Humanas.', 'Mensalidade e auxílios', 'Ser brasileiro ou estrangeiro com visto; possuir título de doutor há pelo menos cinco anos; possuir atuação acadêmica qualificada e reconhecida competência profissional com produção intelectual consistente.', 'catedracoimbra@capes.gov.br', '', 'Ciências Sociais e Humanas', '', '', '', '', 'As inscrições serão gratuitas e feitas exclusivamente pela internet, mediante o preenchimento do formulário de inscrição disponível (http://www.capes.gov.br/cooperacao-internacional/catedras)', '', 'A', '', '', 'http://capes.gov.br/cooperacao-internacional/catedras/programa-catedra-capes-ces-de-ciencias-sociais-e-humanas-portugal', 0, 'Observatório', 20141128, '', 'francine.zucco', '', '1', 0),
(69, 'Chamada CNPq 33/2014 – Criação da Rede Nacional de Pesquisas em Doenças Cardiovasculares', 20140923, 'CNPq', 'pt_BR', '33/2014', 20141016, 19000101, 19000101, 'Apoiar atividades de pesquisa científica, tecnológica e inovação no tocante às doenças cardiovasculares mediante a formação da Rede Nacional de Pesquisa em Doenças Cardiovasculares (RNPDC) envolvendo instituições de pesquisa públicas e privadas de todas as regiões do Brasil, que possam gerar e executar projetos de pesquisa de interesse do Ministério da Saúde.', 'De R$ 200 mil a R$ 1 milhão - custeio, capital e bolsas. As bolsas terão seu valor limitado a 20% do valor total do solicitado.', 'O proponente deve possuir título de doutor e ser obrigatoriamente o coordenador da proposta.', 'chamada332014@cnpq.br', '', '', '', '', '', '', 'As propostas devem ser acompanhadas de arquivo contendo o projeto e devem ser encaminhadas ao CNPq exclusivamente via Internet, utilizando-se do Formulário de Propostas online, disponível na Plataforma Carlos Chagas.', '', 'A', '', '', 'http://www.cnpq.br/web/guest/chamadas-publicas?p_p_id=resultadosportlet_WAR_resultadoscnpqportlet_INSTANCE_0ZaM&id=47-438-2966&detalha=chamadaDetalhada&filtro=abertas', 0, 'Observatório', 20140923, '', 'francine.zucco', 'Recursos para Pesquisas em Doenças Cardiovasculares', '', 0),
(70, 'Chamada CNPq Nº 27/2014 - Pesquisas sobre Doenças Neurodegenerativas', 20140923, 'CNPq', 'pt_BR', 'Nº 27/2014', 20141017, 19000101, 19000101, 'Apoiar projetos de pesquisa científica e tecnológica que visem contribuir significativamente para o desenvolvimento científico e tecnológico do País, no tema doenças neurodegenerativas (DND).', 'De R$ 200 mil a R$ 1 milhão - custeio, capital e bolsas. As bolsas terão seu valor limitado a 20% do valor total do solicitado.', 'O proponente deve possuir título de doutor e ser obrigatoriamente o coordenador da proposta.', 'chamada272014@cnpq.br', '', 'O proponente poderá apresentar um único projeto, do tipo estudo básico, pré-clínico ou clínico, que se enquadre em um dos eixos temáticos: <br>1.Marcadores precoces de doenças;<br>2.Estratégias de prevenção; <br>3.Novas abordagens terapêuticas ou de intervenção (exceto estudos de terapias celulares); <br>4.Mecanismos básicos aplicáveis às doenças neurodegenerativas.', '', '', '', '', 'As propostas devem ser acompanhadas de arquivo contendo o projeto e devem ser encaminhadas ao CNPq exclusivamente via Internet, utilizando-se do Formulário de Propostas online, disponível na Plataforma Carlos Chagas.', '', 'A', '', '', 'http://www.cnpq.br/web/guest/chamadas-publicas?p_p_id=resultadosportlet_WAR_resultadoscnpqportlet_INSTANCE_0ZaM&id=47-428-2961&detalha=chamadaDetalhada&filtro=abertas', 0, 'Observatório', 20140923, '', 'francine.zucco', 'Recursos para Pesquisas em Doenças Neurodegenerativas', '', 0),
(111, '<br>Postdoc CsF - IIASA/Áustria', 20141201, '00061', 'pt_BR', '2014', 20141219, 19000101, 19000101, 'Every year IIASA provides full funding for several postdoctoral researchers. Scholars are expected to conduct their own research in collaboration with one or more of IIASA´s research programs or special projects. Postdoctoral positions, up to 2 years duration, can begin up to 6 months after selection. ', '', 'Have a proven record of research accomplishments, and a solid working knowledge of English; have held a doctoral degree for less than 5 years at the application deadline.', '', '', 'Advanced systems Analysis; Evolution and Ecology; Energy; Ecosystems Services & Management; Mitigation of Air Pollution & greenhouse Gases; World Population; Risk, Policy and Vulnerability; Transitions to New Technologies; Water; Tropical Futures Initiative.', '', '', '', '', 'Applying for the postdoctoral fellowship is done through the IIASA online postdoctoral application form (available on 5th Dec). Once you have a letter of support from an IIASA supervisor, you are automatically considered for the regular IIASA Post Doc fellowship and you can apply to CNPq/Ciências sem Fronteiras. The next deadline (CsF) is 19/12, and then 23/05/2015.', '', 'A', '', '', 'http://www.iiasa.ac.at/web/home/education/postdoctoralProgram/Apply/Application-2014.en.html', 0, 'Observatório', 20141201, '', 'francine.zucco', '', '', 0),
(99, 'Prazo prorrogado: Programa Capes/NUFFIC - Cooperação com a Holanda - 63/2014', 20141215, 'CAPES', 'pt_BR', '63/2014', 20150116, 19000101, 19000101, 'O presente Edital tem como objetivo selecionar projetos conjuntos de pesquisa desenvolvidos por grupos brasileiros e holandeses vinculados à Instituições de Ensino Superior e/ou de Pesquisa com o intuito de apoiar e fomentar o intercâmbio científico entre grupos de pesquisa e desenvolvimento públicos brasileiros e holandeses. O Programa CAPES/NUFFIC visa fomentar a mobilidade de docentes e de estudantes de graduação e pós-graduação nos níveis de doutorado e de pós-doutorado.', 'Missões de trabalho, missões de estudo e recursos de custeio.', '-A proposta de projeto deve: <br>-ter caráter institucional e ser coordenada por representante docente brasileiro, detentor de título de doutorado há pelo menos 4 anos; <br>-cada departamento da IES brasileira poderá apresentar somente uma proposta de projeto; <br>-a proposta deverá conter previsão de formação de recursos humanos nas modalidades de graduação sanduíche, doutorado sanduíche e estágio pós-doutoral; <br>-ter caráter inovador; <br>-favorecer o aprendizado da língua no país parceiro; <br>-preferencialmente associar-se em rede com mais de uma Instituição de cada país.', 'nuffic@capes.gov.br', '', 'Ciências Biológicas, Engenharias, Ciências Médicas (Ciências da Saúde), Ciências Agrícolas, Ciências Sociais Aplicadas, Ciências Humanas e Artes', '', '', '', '', 'A proposta deve ser similar em cada um dos países, contendo o plano de ações conjuntas e a programação da formação de recursos humanos em ambos os sentidos. <br>As inscrições serão  admitidas exclusivamente pela internet, mediante o preenchimento do Formulário de Inscrição e o envio de documentos eletrônicos -\r\nhttp://www.capes.gov.br/cooperacao-internacional/holanda/programa-capesnuffic', '', '!', '', '', 'http://capes.gov.br/cooperacao-internacional/holanda/programa-capesnuffic', 0, 'Observatório', 0, '', 'francine.zucco', 'Prazo prorrogado: Oportunidade de cooperação com a Holanda - 16/01', '', 0),
(114, '<br>Doutorado Pleno no Exterior', 20141205, 'CAPES', 'pt_BR', '2014/15', 20150119, 19000101, 19000101, 'O Programa de Doutorado Pleno no Exterior tem por objetivo conceder bolsas de estudos a fim de complementar às possibilidades ofertadas pelo conjunto dos programas de pós-graduação no Brasil, de forma a buscar a formação de docentes e pesquisadores de alto nível.', 'Mensalidade e auxílios', 'A bolsa destina-se a candidatos de elevado desempenho acadêmico, que se dirijam a instituições estrangeiras de excelência, para a realização de doutorado pleno em universidades do exterior.', '0800 61 61 61, opção 7', '', 'Diversas áreas do conhecimento', '', '', '', '', 'As inscrições serão gratuitas e feitas exclusivamente pela internet, mediante o preenchimento do formulário de inscrição disponível.', '', 'A', '', '', 'http://www.capes.gov.br/bolsas/bolsas-no-exterior/doutorado', 0, 'Observatório', 20141205, '', 'francine.zucco', 'Doutorado Pleno no Exterior - Capes', '', 0),
(100, 'Grand Challenges: Putting Women and Girls at the Center of Development', 20141110, '00057', 'us_EN', '2014-2015', 20150113, 19000101, 19000101, 'The ultimate goal of this challenge is to accelerate discovery of how to most effectively and intentionally identify and address gender inequalities and how this relates to sectoral outcomes; scale-up approaches known to work, in context-relevant ways; and do more to develop better measures of the impact of approaches to enhance women’s and girls’ empowerment and agency. ', '-2-year exploratory grants at USD $500,000 to support the initial development and validation of solutions. <br>-4-year full grants at USD $2.5 million to develop, refine, and rigorously test larger multi-sectoral approaches, including those that have previous data demonstrating proof of concept, and show promise and potential for scale', 'Investigators in low-income and middle-income countries. Women-led organizations and applications involving projects led by women are encouraged.', '', '', 'Solutions in: urban sanitation; financial services for the poor; agricultural development; HIV/AIDS; family planning; maternal, newborn and child health; nutrition; and emergency relief.', '', '', '', '', '', '', 'A', '', '', 'http://gcgh.grandchallenges.org/GrantOpportunities/Pages/WomenandGirls.aspx', 0, 'Observatório', 20141110, '', 'francine.zucco', 'Oportunidade Grand Challenges: Putting Women and Girls at the Center of Development', '', 0),
(17, '<br>Inscrições prorrogadas: Prêmio Finep 2014', 20140806, '00036', 'pt_BR', '2014', 20140912, 19000101, 19000101, 'O Prêmio Finep foi criado para reconhecer e divulgar esforços inovadores realizados por empresas, instituições sem fins lucrativos e pessoas físicas, desenvolvidos no Brasil e já inseridos no mercado interno ou externo, a fim de tornar o País competitivo e plenamente desenvolvido por meio da inovação.<br>As empresas, as instituições e os inventores inovadores são aqueles que desenvolvem soluções em forma de produtos, processos, metodologias e/ou serviços novos ou significativamente modificados.</br>', '<b>Etapa Regional:</b> Os vencedores da fase regional de cada categoria, além de concorrerem à premiação nacional, receberão o Troféu Ouro e prêmios em espécie (consultar edital). <br><b>Etapa Nacional:</b> Os vencedores da fase nacional de cada categoria receberão o troféu de vencedor nacional e os prêmios em espécie (consultar edital).</br>', '1 - Empresas - as empresas poderão realizar mais de uma inscrição de diferentes produtos, processos e serviços nas categorias Tecnologia Assistiva e Inovação Sustentável, podendo, ainda, realizar a inscrição nas categorias Micro/Pequena, Média ou Grande Empresa, de acordo com o seu faturamento;\r\n		<br>\r\n			2 - Instituição de Ciência e Tecnologia, e Tecnologia Social - uma mesma instituição poderá concorrer simultaneamente nestas duas categorias, atendidas as especificidades de cada uma delas;</br>\r\n			3 - Inventor Inovador - os inventores poderão realizar mais de uma inscrição nesta categoria de diferentes patentes concedidas pelo INPI (com carta patente expedida) e cujos objetos estejam comercializados. Quando o participante concorrer com uma patente que possua mais de um inventor, todos devem ser citados no formulário de inscrição. Neste caso, se a proposta for selecionada para fins de premiação, o inventor deverá apresentar declaração dos demais co-titulares da patente autorizando-o a receber o prêmio.', 'Mais informações: (21) 2555-0510 - (21) 2555-0455 - (21) 2555-0555 ou e-mail:  <a href="mailto:premio@finep.gov.br" style="color: navy; text-decoration: none; font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 11.818181991577148px; text-align: justify; background-color: rgb(255, 255, 255);">premio@finep.gov.br</a><span style="font-family: Verdana; font-size: 11.818181991577148px; text-align: justify; background-color: rgb(255, 255, 255);">.</span></p>', '', 'Micro/Pequena Empresa - Média Empresa - Inovação Sustentável - Instituição de Ciência e Tecnologia - Tecnologia Social e Inventor Inovador', '', '', '', '', 'As inscrições devem ser feitas até 18h00 do dia 12 de setembro de 2014.<br>É condição para participação o preenchimento completo do formulário de inscrição da respectiva categoria disponível no endereço eletrônico do Prêmio Finep - www.finep.gov.br/premio.</br> Está vedado o envio de anexos, amostras ou qualquer outro tipo de material complementar.', 'Para esclarecimento de dúvidas e auxílio no envio da proposta, favor entrar em contato com o Observatório PD&I pelo Ramal: 2128 ou e-mail: <a href="mailto:pdi@pucpr.br" style="color: navy; text-decoration: none; font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 11.818181991577148px; text-align: justify; background-color: rgb(255, 255, 255);">pdi@pucpr.br</a><span style="font-family: Verdana; font-size: 11.818181991577148px; text-align: justify; background-color: rgb(255, 255, 255);">.</span></p>', 'A', '', '', 'http://premio.finep.gov.br/', 0, 'Observatório', 20140806, '', 'jeferson.vieira', 'Inscrições prorrogadas para o Prêmio Finep 2014', '', 0),
(18, '<br>Prêmio Saúde 2014', 20140811, '00037', 'pt_BR', '2014', 20140820, 19000101, 20141125, 'Busca valorizar o empenho de quem pensa, luta e trabalha por um Brasil mais saudável e prestigiar projetos que vão de estudos em fase clínica a campanhas de prevenção, realizados por cientistas e profissionais de todas as áreas da saúde.', 'Prêmio de R$ 890,00.', 'Médicos, enfermeiros, nutricionistas, obstetrizes, fisioterapeutas, terapeutas ocupacionais, educadores físicos, fonoaudiólogos, psicólogos, assistentes sociais, farmacêuticos, biólogos, biomédicos e cirurgiões-dentistas, com registro nos devidos conselhos de classe.\r\nPodem concorrer individualmente ou organizados em grupos de profissionais de saúde de até 30 integrantes.', 'premiosaude@abril.com.br', '', 'a) Saúde e Prevenção;\r\nb) Saúde da Criança;\r\nc) Saúde Mental e Emocional;\r\nd) Saúde e Nutrição;\r\ne) Saúde Bucal;\r\nf) Saúde e Atividade Física;\r\ng) Instituição do Ano e\r\nh) Personalidade do Ano.', '', '', '', '', '', 'Para esclarecimentos e auxílio, favor entrar em contato com o Observatório de Pesquisa Desenvolvimento & Inovação - pdi@pucpr.br, (41) 3271-2128', 'A', '', '', 'http://www.premiosaude.com.br/', 0, 'Observatório', 20140811, '', 'francine.zucco', 'Últimos dias para inscrição no Prêmio Saúde 2014', '', 0),
(53, '<br>', 20140806, '00049', 'pt_BR', '2014/2015', 20141115, 19000101, 19000101, 'Chevening Scholarships são concedidas para profissionais talentosos e potenciais líderes e formadores de opinião. As bolsas não só oferecem apoio finaceiro para realizar o mestrado em uma Universidade de excelência do UK, mas constituem uma oportunidade para fazer parte de uma rede conceituada e influente.', 'Bolsa de mestrado e auxílios.', '-Comprometer-se a retornar ao país pelo período mínimo de 2 anos após a conclusão dos estudos; <br>-possuir formação superior equivalente ao UK; <br>-ter pelo menos 2 anos de experiência (trabalho voluntário e estágios inclusos); <br>-aplicar para 3 diferentes cursos de Mestrado no UK; <br>-não possuir cidadania britânica; <br>-não ter recebido nenhum tipo de bolsa do UK anteriormente.', 'Para dúvidas quanto ao sistema de cadastro: support@wcn.co.uk', '', 'Áreas prioritárias: <br>-negócios e investimentos - incluindo energia e infraestrutura; <br>-ambiente de negócios - finanças, administração econômica e pública; <br>-segurança mundial e relações internacionais - direitos humanos e educação; <br>-desenvolvimento, sustentabilidade e mudanças climáticas; <br>-criminal: conflitos, inteligência; <br>-eventos esportivos e legado: adminsitração, desenvolvimento, legado e educação.', '', '', '', '', 'Guia para submissão: http://www.chevening.org/apply/resources/guidance', 'Para esclarecimentos e auxílio, favor entrar em contato com o Observatório de Pesquisa, Desenvolvimento & Inovação - pdi@pucpr.br, (41) 3271-2128.', '!', '', '', 'http://www.chevening.org/brazil/', 0, 'Observatório', 20140806, '', 'francine.zucco', 'Oportunidade de bolsas de mestrado no UK', '', 0),
(52, 'Newton Fund: RCUK – CONFAP Research Partnerships call for projects', 20140807, '00047', 'pt_BR', '2014', 20141017, 19000101, 19000101, 'Estabelecer cooperação sustentável entre o Reino Unido e pesquisadores brasileiros que resultarão em pesquisa de excelência, como o desenvolvimento de conhecimento que não seria possível por meio das colaborações internacionais existentes até o momento.', '£50.000,00 por parceiro.', '-O proponente britânico deve possuir um RCUK award - recursos provenientes de um dos UK Research Councils ou Instituto, Unidade ou Centro financiado por um Conselho. <br>-Exceções poderão ser aplicadas de acordo com a área de conhecimento ou se recebido recursos de um dos Conselhos nos últimos 5 anos. <br>-O projeto em colaboração deve atender às diretrizes do Official Development Assistance (ODA) - tratar de questões pertinentes ao desenvolvimento do país.', 'Em caso de dúvidas sobre o edital, enviar os questionamentos para o e-mail aci@fapemig.br', '', 'Áreas prioritárias: <br>-saúde; <br>-transformações urbanas; <br>-alimentos, energia, água e meio ambiente; <br>-resiliência de ecossistemas e biodiversidade; <br>-desenvolvimento econômico e bem-estar social. <br>Propostas em outras áreas também serão consideradas, desde que sejam objeto de forte colaboração entre o Reino Unido e o Brasil e atendam aos critérios associados ao ODA.', '', '', '', '', '1.O formulário para envio da proposta estará disponível na homepage do RCUK (Conselhos de Pesquisa do Reino Unido) a partir do dia 18/08 (segunda-feira): http://www.rcuk.ac.uk/international/newton/confap/ <br>2.O pesquisador brasileiro deverá enviar a sua proposta para o e-mail fundonewton@confap.org.br  e o formulário deverá ser preenchido com a mesma proposta em inglês pelo pesquisador do Reino Unido e Brasil.', 'Para esclarecimentos e auxílio, favor entrar em contato com o Observatório de Pesquisa, Desenvolvimento & Inovação - pdi@pucpr.br, (41) 3271-2128.', 'A', '', '', 'http://www.fappr.pr.gov.br/modules/noticias/article.php?storyid=906', 0, 'Observatório', 20140806, '', 'francine.zucco', 'Newton Fund: oportunidade de parceria com UK', '', 0),
(89, 'Newton Institutional Links Programme', 20141016, '00048', 'pt_BR', '2014', 20141120, 19000101, 19000101, 'O Fundo Newton busca estabelecer parcerias entre UK e outros países em pesquisa e inovação em temas com direta relevância no bem-estar social e no desenvolvimento econômico do país parceiro. <br>O Newton Institutional Links Programme vai além da conexão individual entre pesquisadores, oferecendo oportunidade para colaborações em pesquisa e inovação mais sustentáveis e práticas entre grupos acadêmicos, outras instituições sem fins lucrativos e setor privado.', 'Áreas Capes: Até £ 300.000,00 - recursos humanos, custeio, capital. <br>Área SAE (Secretaria de Assuntos Estratégicos): até £ 150.000,00.', '1. Cada proposta deve ser submetida por um parceiro britânico e um brasileiro, pesquisadores seniores. <br>2. O projeto deve demonstrar seu impacto positivo no bem-estar social e desenvolvimento econômico dos países em desenvolvimento.', 'UK-InstitutionalLinks@britishcouncil.org', '', 'Áreas prioritárias no Brasil (Capes): <br>1. Desenvolvimento de novos fármacos; <br>2. Agricultura; <br>3. Água; <br>4. Meio ambiente. <br>Foco Secretaria de Assuntos Estratégicos (SAE): Conhecimento em adaptação às mudanças climáticas no Brasil.', '', '', '', '', 'Pedimos que manifeste previamente seu interesse em participar para articulação institucional - pdi@pucpr.br <br>A submissão da proposta deve ser feita mediante preenchimento de formulário online - http://www.britishcouncil.org/education/science/current-opportunities/institutional-links-2014', '', 'A', '', '', 'http://www.britishcouncil.org/education/science/current-opportunities/institutional-links-2014', 0, 'Observatório', 20141016, '', 'francine.zucco', 'Newton Institutional Links Programme - Recursos para parceria com UK', '', 0),
(72, 'Chamada CNPq N º32/2014 – Pesquisas sobre Leishmanioses', 20140924, 'CNPq', 'pt_BR', '32/2014', 20141017, 19000101, 19000101, 'Apoiar projetos de pesquisa científica e tecnológica que visem contribuir significativamente para o desenvolvimento científico e tecnológico do País e para a inovação em leishmanioses.', 'De R$ 100 mil a R$ 500 mil - custeio, capital e bolsas. As bolsas terão seu valor limitado a 20% do valor total do solicitado.', 'O proponente deve possuir título de doutor e ser obrigatoriamente o coordenador da proposta.', 'chamada322014@cnpq.br', '', 'O proponente deverá apresentar um único projeto, do tipo estudo básico, pré-clínico, clínico ou epidemiológico, e para apenas um dos eixos temáticos: <br>1. Diagnóstico; <br>2. Clínica e tratamento; <br>3. Vacinas; <br>4. Vetor.', '', '', '', '', 'As propostas devem ser acompanhadas de arquivo contendo o projeto e devem ser encaminhadas ao CNPq exclusivamente via Internet, utilizando-se do Formulário de Propostas online, disponível na Plataforma Carlos Chagas.', '', 'A', '', '', 'http://www.cnpq.br/web/guest/chamadas-publicas?p_p_id=resultadosportlet_WAR_resultadoscnpqportlet_INSTANCE_0ZaM&id=47-437-2934&detalha=chamadaDetalhada&filtro=abertas', 0, 'Observatório', 20140924, '', 'francine.zucco', 'Recursos CNPq para Projetos de Pesquisa em Leishmaniose', '', 0),
(55, 'Cátedra Rio Branco em Relações Internacionais - Universidade de Oxford', 20140818, 'CAPES', 'pt_BR', '49/2014', 20140925, 19000101, 19000101, 'A Fundação Coordenação de Aperfeiçoamento de Pessoas de Nível Superior (CAPES), e o Instituto Rio Branco, e a Universidade de Oxford, realizam seleção de candidatos à bolsa para o Programa Cátedra Rio Branco em Relações Internacionais da Universidade de Oxford, na área de Relações Internacionais. O programa tem como objetivo enviar pesquisadores, intelectuais e formuladores de políticas públicas à Universidade de Oxford, proporcionando ambiente propício para a análise da função desempenhada pelo Brasil no cenário mundial e das posições adotadas pelo país em temas globais.', 'Bolsa mensal de £ 3.500,00, auxílio-instalação, auxílio deslocamento, auxílio seguro saúde.', '-Possuir título de doutor; <br>-estar credenciado como docente e orientador em PPG reconhecido pela CAPES; <br>-dedicar-se em regime integral às atividades acadêmicas; <br>-ter fluência em inglês; <br>-não receber bolsa ou benefício financeiro de outras agências ou entidades do Governo Federal para o mesmo objetivo.', 'Oxford@capes.gov.br', '', 'Relações internacionais', '', '', '', '', 'O candidato deve submeter sua candidatura exclusivamente via Internet.', 'Para esclarecimentos e auxílio, favor entrar em contato com o Observatório de Pesquisa, Desenvolvimento & Inovação - pdi@pucpr.br, (41) 3271-2128.', 'A', '', '', 'http://www.capes.gov.br/cooperacao-internacional/catedras/catedra-rio-branco-oxford', 0, 'Observatório', 20140818, '', 'francine.zucco', 'Oportunidade de cátedra em Oxford em relações internacionais', '', 0),
(73, '<br>Chamada CNPq  N º 30/2014', 20140924, 'CNPq', 'pt_BR', '30/2014', 20141027, 19000101, 19000101, 'Apoiar projetos de pesquisa científica e tecnológica que visem promover, estimular, e/ou expandir atividades de pesquisa colaborativa básica, translacional e aplicada entre pesquisadores estadunidenses elegíveis e com pesquisas já em andamento no âmbito do NIH e pesquisadores brasileiros elegíveis nas áreas de câncer associado a infecções, alergia, imunologia, e/ou doenças infecciosas, incluindo HIV/AIDS e suas comorbidades.', 'Estima-se apoiar 25 (vinte e cinco) projetos de cerca de R$ 220.000,00 (duzentos e vinte mil reais) cada - custeio, capital e bolsas.', 'O proponente deve possuir título de doutor e ser obrigatoriamente o coordenador da proposta. <br>A proposta apresentada deverá contemplar projeto de pesquisa em que haja colaboração com um  pesquisador estadunidense já contemplado por um auxílio do NIH, o qual também submeterá pedido de financiamento a chamada análoga publicada pelos EUA. <br>Os projetos de pesquisa colaborativos submetidos deverão ser julgados elegíveis tanto na Chamada dos EUA quanto na do Brasil.', 'cosau@cnpq.br', '', 'Os projetos de pesquisas apresentados em resposta à presente Chamada deverão se enquadrar em um ou mais dos seguintes eixos temáticos: <br>1. Imunologia básica; <br>2. Doenças Infecciosas (exceto HIV/AIDS); <br>3. Estudos sobre HIV/AIDS e suas comorbidades/co-infecções; <br>4. Cânceres associados a infecções.', '', '', '', '', 'As propostas devem ser acompanhadas de arquivo contendo o projeto e devem ser encaminhadas ao CNPq exclusivamente via Internet, utilizando-se do Formulário de Propostas online, disponível na Plataforma Carlos Chagas.', '', 'A', '', '', 'http://www.cnpq.br/web/guest/chamadas-publicas?p_p_id=resultadosportlet_WAR_resultadoscnpqportlet_INSTANCE_0ZaM&id=47-433-2905&detalha=chamadaDetalhada&filtro=abertas', 0, 'Observatório', 20140924, '', 'francine.zucco', 'Recursos CNPq para Pesquisa nas áreas de câncer associado e doenças infecciosas', '', 0),
(98, 'Grand Challenges: New Interventions for Global Health', 20141110, '00057', 'us_EN', '14-15', 20150113, 19000101, 19000101, 'This challenge focuses on innovative concepts for vaccines, therapeutics, and diagnostics with the potential to be translated into safe, effective, affordable, and widely utilized interventions to protect against the acquisition, progression, or transmission of infectious diseases, or to provide a cure for infectious diseases, in resource&#8208;limited settings.', 'Full awards: up to USD $10,000,000, <br>Pilot awards of up to USD $2,000,000.', 'Full awards up to $10M and up to four years: must include an industry, biotech or other translational partner either leading or participating in the application. <br>Pilot awards up to $2M and up to four years:  do not include a requirement for a biotech or translation partner but such partnerships would still be welcome', 'grandchallenges@gatesfoundation.org', '', '', '', '', '', '', '', '', 'A', '', '', 'http://gcgh.grandchallenges.org/GrantOpportunities/Pages/NewInterventions.aspx', 0, 'Observatório', 20141110, '', 'francine.zucco', 'Oportunidade: Grand Challenges: New Interventions for Global Health', '', 0),
(129, '<br>Nestlé Creating Shared Value Prize', 20150126, '00068', 'us_EN', '2016', 20150228, 19000101, 19000101, 'The Nestlé Creating Shared Value Prize (“Nestlé Prize”) is designed to recognise the development of an outstanding innovation or programme in the areas of Water, Nutrition or Rural Development that: <br>1. Has proven its worth on a pilot or small-scale basis; <br>2. Is judged to be feasible on a broad-scale basis or replicable in other settings or communitites; <br>3. Has high promise of having a social impact, through either improving access to nutrition, improving rural development, or having a significant impact on water management or access to clean water; <br>4. Is built on a sound and viable business model.', 'Up to CHF 500,000 to one/maximum of three winners.', 'Applicants to the Nestlé CSV Prize can either self-nominate or be nominated by others who are familiar with their work. In either case, the nomination process is the same.', 'CSVPrize@nestle.com', '', 'Nutrition, water, or rural development', '', '', '', '', 'Entries must be submitted in writing during the Nomination Period through the Nomination Form which is available on the Nestlé corporate website (www.nestle.com)', '', 'A', '', '', 'http://www.nestle.com/csv/what-is-csv/nestleprize/about-csv-prize', 0, 'Observatório', 20141222, '', 'francine.zucco', 'Prêmio internacional: Nestlé Creating Shared Value Prize', '4', 0),
(56, 'Seleção Pública de propostas de cursos para formação de recursos humanos em Biotecnologia', 20140814, 'CNPq', 'pt_BR', 'CBAB N° 20/2014', 20141003, 19000101, 19000101, 'Selecionar propostas para apoio financeiro a cursos na área de biotecnologia, em nível de pós-graduação, nos temas especificados na Chamada de interesse para o Brasil, Argentina e Uruguai, no âmbito do Centro \r\nBrasileiro-Argentino de Biotecnologia.', 'Itens de custeio no valor máximo de R$ 70.000,00.', 'O proponente deve: <br>-possuir o título de doutor; <br>-ser obrigatoriamente o coordenador do projeto; <br>-ter vínculo formal com a instituição de execução do projeto.\r\n<br><br>Características esperadas do curso: <br>-ser teórico-prático (40% teórico e 60% prático); <br>-ter duração de duas semanas com aproximadamente 80 horas/aula; <br>-ter a colaboração de professor argentino convidado, com um mínimo de 8 (oito) horas-aula; <br>-apresentar distribuição de vagas por nacionalidade, conforme descrito na Chamada.', '', '', 'Biotecnologia.', '', '', '', '', 'As propostas devem ser acompanhadas de arquivo contendo o projeto e devem ser encaminhadas ao CNPq exclusivamente via Internet, utilizando-se do Formulário de Propostas online, disponível na Plataforma Carlos Chagas.', 'Para esclarecimentos e auxílio, favor entrar em contato com o Observatório de Pesquisa, Desenvolvimento & Inovação - pdi@pucpr.br, (41) 3271-2128.', 'A', '', '', 'http://www.cnpq.br/web/guest/chamadas-publicas?p_p_id=resultadosportlet_WAR_resultadoscnpqportlet_INSTANCE_0ZaM&id=47-397-2790&detalha=chamadaDetalhada&filtro=abertas', 0, 'Observatório', 20140814, '', 'francine.zucco', 'Oportunidade para proposta de curso em Biotecnologia em cooperação com a Argentina', '', 0);
INSERT INTO `fomento_editais` (`id_ed`, `ed_titulo`, `ed_data`, `ed_agencia`, `ed_idioma`, `ed_chamada`, `ed_data_1`, `ed_data_2`, `ed_data_3`, `ed_texto_1`, `ed_texto_2`, `ed_texto_3`, `ed_texto_4`, `ed_texto_5`, `ed_texto_6`, `ed_texto_7`, `ed_texto_8`, `ed_texto_9`, `ed_texto_10`, `ed_texto_11`, `ed_texto_12`, `ed_status`, `ed_autor`, `ed_corpo`, `ed_url_externa`, `ed_total_visualizacoes`, `ed_local`, `ed_data_envio`, `ed_document_require`, `ed_login`, `ed_titulo_email`, `ed_edital_tipo`, `ed_fluxo_continuo`) VALUES
(71, 'Chamada CNPq N º 28/2014 - Medicina Regenerativa', 20140924, 'CNPq', 'pt_BR', '28/2014', 20141017, 19000101, 19000101, 'Apoiar projetos de pesquisa científica e tecnológica que visem contribuir significativamente para o desenvolvimento científico e tecnológico do País e para a inovação no tema Medicina Regenerativa.', 'De R$ 200 mil a R$ 1 milhão - custeio, capital e bolsas. As bolsas terão seu valor limitado a 20% do valor total do solicitado.', 'O proponente deve possuir título de doutor e ser obrigatoriamente o coordenador da proposta.', 'chamada282014@cnpq.br', '', 'Eixos temáticos: <br>1. Geração de células tronco humanas de pluripotência induzida para seleção (screening) de fármacos; <br>2. Diferenciação de células pluripotentes humanas em tipos celulares específicos para modelagem de doenças; <br>3. Reprogramação direta de células somáticas; <br>4. Geração de células tronco humanas de pluripotência induzida por métodos não integrativos de genes exógenos para fins de uso em medicina regenerativa; <br>5. Recelularização de órgãos descelularizados com células tronco pluripotentes ou órgãosespecíficas; bioengenharia de órgãos usando impressão 3D; <br>6. Bioengenharia de órgãos ocos.', '', '', '', '', 'As propostas devem ser acompanhadas de arquivo contendo o projeto e devem ser encaminhadas ao CNPq exclusivamente via Internet, utilizando-se do Formulário de Propostas online, disponível na Plataforma Carlos Chagas.', '', 'A', '', '', 'http://www.cnpq.br/web/guest/chamadas-publicas?p_p_id=resultadosportlet_WAR_resultadoscnpqportlet_INSTANCE_0ZaM&id=47-429-2939&detalha=chamadaDetalhada&filtro=abertas', 0, 'Observatório', 20140924, '', 'francine.zucco', 'Recursos para Projetos em Medicina Regenerativa', '', 0),
(58, '<br>Grand Challenges Canada - <br>Saving Brains', 20140819, '00052', 'pt_BR', '2014', 20140908, 19000101, 19000101, 'Grand Challenges Canada é dedicado a apoiar ideias inovadoras com grande impacto na saúde global. No programa Saving Brains, busca-se selecionar ideias inovadoras para produtos e serviços acessíveis e de cunho científico e implementação de modelos que protejam e assegurem o desenvolvimento cerebral inicial de maneira sustentável.', 'Modalidade seed funding: até 250 mil dólares canadenses.', 'O projeto pode ter no máximo dois líderes e deve ser desenvolvido no país.', 'savingbrains@grandchallenges.ca', '', 'Desenvolvimento cerebral infantil.', '', '', '', '', '', 'Para esclarecimentos e auxílio, favor entrar em contato com o Observatório de Pesquisa, Desenvolvimento & Inovação - pdi@pucpr.br, (41) 3271-2128.', 'A', '', '', 'http://www.grandchallenges.ca/saving-brains/', 0, 'Observatório', 20140819, '', 'francine.zucco', 'Oportunidade de captação de recursos junto ao governo canadense em desenvolvimento infantil', '', 0),
(57, '<br>Energy Globe Awards 2014', 20140819, '00051', 'pt_BR', '2014', 20140922, 19000101, 19000101, 'Identificar projetos que tenham como foco a conservação dos recursos, melhoria na qualidade do ar e da água, uso eficaz da energia, e a implementação de energia renovável e criação de conscientização para o tema. São cinco as categorias disponíveis: Terra, Água, Ar, Fogo e Juventude.', 'Prêmio de 10 mil euros para cada categoria.', 'Projetos podem ser submetidos por empresas, organizações públicas e privadas e pessoas físicas. Mais de um projeto pode ser submetido por proponente e serão considerados apenas projetos já implementados e com resultados demonstrados.', 'contact@energyglobe.info', '', 'Eficiência energética, mudanças climáticas, qualidade do ar e água, conscientização populacional.', '', '', '', '', 'A submissão é feita online e um checklist está disponível em http://www.energyglobe.info/en/participation/1-project-submission-checklist/', 'Para esclarecimentos e auxílio, favor entrar em contato com o Observatório de Pesquisa, Desenvolvimento & Inovação - pdi@pucpr.br, (41) 3271-2128.', 'A', '', '', 'http://www.energyglobe.info/en/participation/', 0, 'Observatório', 20140819, '', 'francine.zucco', 'Prêmio internacional em sustentabilidade', '', 0),
(74, 'Chamada CNPq Nº37/2014 – Pesquisas sobre Helmintíases', 20140925, 'CNPq', 'pt_BR', '37/2014', 20141104, 19000101, 19000101, 'Apoiar atividades de pesquisa científica, tecnológica e de inovação no tocante à esquistossomose e outras helmintíases.', 'De R$ 100 mil a R$ 500 mil - custeio, capital e bolsas.', 'O proponente deve possuir título de doutor e ser obrigatoriamente o coordenador da proposta.', 'chamada372014@cnpq.br', '', 'Eixos temáticos: 1. Diagnóstico; 2. Clínica; 3. Tratamento; 4. Desenvolvimento tecnológico e avaliação de programas, serviços e ações; 5.  Mecanismos de Interação parasita-célula.', '', '', '', '', 'As propostas devem ser acompanhadas de arquivo contendo o projeto e devem ser encaminhadas ao CNPq exclusivamente via Internet, utilizando-se do Formulário de Propostas online, disponível na Plataforma Carlos Chagas.', '', 'A', '', '', 'http://www.cnpq.br/web/guest/chamadas-publicas?p_p_id=resultadosportlet_WAR_resultadoscnpqportlet_INSTANCE_0ZaM&id=47-447-3022&detalha=chamadaDetalhada&filtro=abertas', 0, 'Observatório', 20140925, '', 'francine.zucco', 'Recursos CNPq para Pesquisas sobre Helmintíases', '', 0),
(59, 'Programa CAPES/Universidade de Nottingham - Seleção de Projetos Conjuntos de Pesquisa em Drug Discovery', 20140821, 'CAPES', 'pt_BR', 'Nº 041/2014', 20140901, 19000101, 19000101, 'Tem como objeto o estreitamento, fortalecimento e aprofundamento da cooperação técnico-científica e o suporte ao acesso de pesquisadores e estudantes de instituições de ciência, tecnologia e inovação, e de empresas brasileiras ao Centro de Drug Discovery da Universidade de Nottingham.', '-Auxílio deslocamento, seguro saúde e diárias para pesquisadores brasileiros em missão de trabalho no Reino Unido; <br>-bolsas de estudo e pesquisa nas modalidades de graduação sanduíche, mestrado sanduíche, doutorado sanduíche e estágio pós-doutoral na Universidade de Nottingham; <br>-recursos de custeio para a equipe brasileira (no valor de até R$ 200.000,00 por ano/projeto).', 'O coordenador deve ser detentor de título de doutor há mais de 5 anos, vinculado a curso de pós-graduação com nota igual ou superior a 5. <br>A proposta de projeto deve ser escrita em inglês.', 'drug-discovery@capes.gov.br', '', '', '', '', '', '', 'As inscrições serão gratuitas e feitas exclusivamente pela Internet, mediante preenchimento de formulário eletrônico disponível na página da CAPES.', 'Para esclarecimentos e auxílio, favor entrar em contato com o Observatório de Pesquisa, Desenvolvimento & Inovação - pdi@pucpr.br, (41) 3271-2128.', 'A', '', '', 'http://capes.gov.br/cooperacao-internacional/reino-unido/programa-capes-nottingham', 0, 'Observatório', 20140821, '1', 'francine.zucco', 'Oportunidade de recursos na área de fármacos', '', 0),
(105, 'Doutorado Sanduíche no Exterior (SWE)', 20150312, 'CNPq', 'pt_BR', '2014', 20150423, 19000101, 19000101, 'Apoiar aluno formalmente matriculado em curso de doutorado no Brasil que comprove qualificação para usufruir, no exterior, da oportunidade de aprofundamento teórico, coleta e/ou tratamento de dados ou desenvolvimento parcial da parte experimental de sua tese a ser defendida no Brasil.', 'Mensalidade, auxílios e taxas.', 'O candidato deve: <br>1. estar formalmente matriculado em curso de doutorado no Brasil reconhecido pela CAPES; <br>2. ter conhecimento do idioma em questão; <br>3. ter anuência do coordenador do PPG e dos orientadores no país e exterior; <br>4. ser brasileiro ou com visto permanente; <br>5. não acumular bolsa.', '', '', 'Diversas áreas de conhecimento.', '', '', '', '', 'As propostas deverão ser submetidas por meio de formulário eletrônico de propostas, disponível na Plataforma Carlos Chagas.', '', 'B', '', '', 'http://www.cienciasemfronteiras.gov.br/web/csf/doutorado-sanduiche', 0, 'Observatório', 20141124, '', 'francine.zucco', 'Doutorado Sanduíche no Exterior (SWE)', '1', 0),
(75, 'Chamada CNPq Nº36/2014 – Pesquisas sobre Doenças Renais', 20140926, 'CNPq', 'pt_BR', '36/2014', 20141104, 19000101, 19000101, 'Apoiar atividades de pesquisa científica, tecnológica e de inovação no tocante às doenças renais, mediante a seleção de propostas para apoio financeiro a projetos que contribuam de modo efetivo para o avanço do conhecimento, a geração de produtos, a formulação, implementação e avaliação de ações públicas voltadas para a melhoria das condições de saúde da população brasileira e o fortalecimento dos serviços de saúde à luz dos princípios e diretrizes do SUS.', 'De R$ 200 mil a R$ 1 milhão - custeio, capital e bolsas.', 'O proponente deve possuir título de doutor e ser obrigatoriamente o coordenador da proposta.', 'chamada362014@cnpq.br', '', 'Controle, prevenção e tratamento das doenças renais.', '', '', '', '', 'As propostas devem ser acompanhadas de arquivo contendo o projeto e devem ser encaminhadas ao CNPq exclusivamente via Internet, utilizando-se do Formulário de Propostas online, disponível na Plataforma Carlos Chagas.', '', 'A', '', '', 'http://www.cnpq.br/web/guest/chamadas-publicas?p_p_id=resultadosportlet_WAR_resultadoscnpqportlet_INSTANCE_0ZaM&id=47-446-3015&detalha=chamadaDetalhada&filtro=abertas', 0, 'Observatório', 20140925, '', 'francine.zucco', 'Recursos CNPq para Projetos de Pesquisa em Doenças Renais', '', 0),
(90, '10º Prêmio Construindo a Igualdade de Gênero/CNPq', 20150126, 'igua', 'pt_BR', '01', 20150318, 19000101, 19000101, 'O Prêmio Construindo a Igualdade de Gênero - concurso de redações, artigos científicos e projetos pedagógicos na área das relações de gênero, mulheres e feminismos - é uma iniciativa da Secretaria de Políticas para as Mulheres/Presidência da República, do Ministério da Ciência e Tecnologia, do Conselho Nacional de Desenvolvimento Científico e Tecnológico, do Ministério da Educação e da ONU Mulheres.', 'Bolsas, laptop e prêmios em dinheiro, dependendo da categoria.', 'Mestra (e) e Estudante de Doutorado\r\nGraduada (o), Especialista e Estudante de Mestrado\r\nEstudante de Graduação\r\nEstudante do Ensino Médio\r\nEscola Promotora da Igualdade de Gênero', '', '', 'O Prêmio tem como objetivos estimular e fortalecer a reflexão crítica e a pesquisa acerca das desigualdades existentes entre homens e mulheres em nosso país, contemplando suas interseções com as abordagens de classe social, geração, raça, etnia e sexualidade no campo dos estudos das relações de gênero, mulheres e feminismos; e sensibilizar a sociedade para tais questões.', '', '', '', '', 'As inscrições são individuais e devem ser realizadas até 18 de março de 2015, exclusivamente via internet, para todas as categorias, no endereço eletrônico: www.igualdadedegenero.cnpq.br', '', 'A', '', '', 'http://www.igualdadedegenero.cnpq.br/igualdade.html', 0, 'Observatório', 20141203, '', 'jeferson.vieira', '', '4', 0),
(61, 'Chamada CNPQ Nº 26/2014 - Pesquisas sobre Distúrbios Neuropsiquiátricos', 20140910, 'CNPq', 'pt_BR', '26/2014', 20141013, 19000101, 19000101, 'Apoio a atividades de pesquisa científica, tecnológica e inovação no tema distúrbios neuropsiquiátricos, que contribuam de modo efetivo para o avanço do conhecimento, a geração de produtos, a formulação, implementação e avaliação de ações públicas voltadas para a melhoria das condições de saúde da população brasileira e fortalecimento da capacidade instalada do SUS quanto à integração da saúde mental.', 'Os projetos submetidos deverão ter valores mínimos de R$ 200.000,00 mil reais e valor máximo de R$ 1.000.000,00 milhão de reais - itens de custeio, capital e bolsa.', 'O proponente deve possuir título de doutor e ser obrigatoriamente o coordenador da proposta.', 'cosau@cnpq.br', '', 'Linha 1 - Estudos de detecção e intervenção precoce dos distúrbios neuropsiquiátricos, incluindo-se a identificação de seus mecanismos fisiopatológicos; <br>Linha 2 - Estratégias de prevenção dos distúrbios neuropsiquiátricos; <br>Linha 3 - Estudos sobre gênero e distúrbios neuropsiquiátricos; <br>Linha 4 - Estudos sobre déficits cognitivos e seus tratamentos; <br>Linha 5 - Desenvolvimento de fármacos, métodos diagnósticos e estratégias terapêuticas para o tratamento e detecção dos distúrbios neuropsiquiátricos; <br>Linha 6 - Estudos para aprimorar a atenção primária em transtornos neuropsiquiátricos.', '', '', '', '', 'As propostas devem ser acompanhadas de arquivo contendo o projeto e devem ser encaminhadas ao CNPq exclusivamente via Internet, utilizando-se do Formulário de Propostas online, disponível na Plataforma Carlos Chagas.', '', 'A', '', '', 'http://www.cnpq.br/pt/web/guest/chamadas-publicas?p_p_id=resultadosportlet_WAR_resultadoscnpqportlet_INSTANCE_0ZaM&filtro=abertas&detalha=chamadaDivulgada&idDivulgacao=5062', 0, 'Observatório', 20140901, '', 'francine.zucco', '', '', 0),
(60, 'Chamada CNPQ 21/2014 - Saúde da População Negra no Brasil', 20140910, 'CNPq', 'pt_BR', '21/2014', 20141013, 19000101, 19000101, 'Produzir conhecimentos que contribuam para o aperfeiçoamento e a efetiva implementação da Política Nacional da Saúde Integral da População Negra, visando à promoção da saúde deste grupo populacional brasileiro, excelência dos serviços de atenção básica, de média e alta complexidade no âmbito do Sistema Único de Saúde.', 'Os projetos submetidos deverão ter valor mínimo de R$ 150.000,00 e máximo de R$ 300.000,00.<br>Financiamento de itens de custeio, capital e bolsa.', 'O proponente deve possuir título de doutor e ser obrigatoriamente o coordenador da proposta. <br>Será dada prioridade aos projetos encaminhados em rede ou multicêntricos e, ainda, àqueles que prevêem articulação com gestoras e gestores estaduais e municipais de Saúde, tendo explicitadas as formas de participação de cada um dos atores na pesquisa.', 'chamadapopnegra2014@cnpq.br', '', 'Tema 1 - Avaliação da implementação da Política Nacional de Saúde Integral da População Negra; <br>Tema 2 - Racismo Institucional; <br>Tema 3 - Situações de risco, agravos e incapacidades; <br>Tema 4 - Identificação e avaliação de estratégias de promoção da saúde e qualidade de vida para a população negra e quilombola em espaços promotores de saúde; <br>Tema 5 - Racismo no Brasil: seus impactos nas relações sociais e implicações sobre condições de vida, processo de saúde-adoecimento, cuidado e morte da população negra e mortalidade da \r\njuventude negra.', '', '', '', '', 'As propostas devem ser acompanhadas de arquivo contendo o projeto e devem ser encaminhadas ao CNPq exclusivamente via Internet, utilizando-se do Formulário de Propostas online, disponível na Plataforma Carlos Chagas.', '', 'A', '', '', 'http://www.cnpq.br/pt/web/guest/chamadas-publicas?p_p_id=resultadosportlet_WAR_resultadoscnpqportlet_INSTANCE_0ZaM&filtro=abertas&detalha=chamadaDivulgada&idDivulgacao=5043', 0, 'Observatório', 20140901, '', 'francine.zucco', '', '', 0),
(76, 'Chamada CNPq Nº34/2014 – Pesquisas sobre Doenças Respiratórias Crônicas', 20140926, 'CNPq', 'pt_BR', '34/2014', 20141110, 19000101, 19000101, 'Apoiar atividades de pesquisa científica, tecnológica e de inovação no tema das doenças respiratórias crônicas.', 'De R$ 200 mil a R$ 1 milhão - custeio, capital e bolsas.', 'O proponente deve possuir título de doutor e ser obrigatoriamente o coordenador da proposta.', '', '', 'Estudos relacionados a Apneia Obstrutiva do Sono, Asma, Bronquiectasia, Doença Pulmonar Obstrutiva Crônica (DPOC), Doenças Pulmonares, Ocupacionais, Fibrose Pulmonar, Hipertensão Arterial Pulmonar ou Complicações pulmonares, associadas às doenças crônicas.', '', '', '', '', 'As propostas devem ser acompanhadas de arquivo contendo o projeto e devem ser encaminhadas ao CNPq exclusivamente via Internet, utilizando-se do Formulário de Propostas online, disponível na Plataforma Carlos Chagas.', '', 'A', '', '', 'http://www.cnpq.br/web/guest/chamadas-publicas?p_p_id=resultadosportlet_WAR_resultadoscnpqportlet_INSTANCE_0ZaM&id=47-444-3043&detalha=chamadaDetalhada&filtro=abertas', 0, 'Observatório', 20140926, '', 'francine.zucco', 'Recursos CNPq para Pesquisas em Doenças Respiratórias Crônicas', '', 0),
(91, 'NOVO YOUTUBE PUCPR - UM CANAL PLURAL', 20141023, 'CPUC', 'pt_BR', 'CANAL', 19000101, 19000101, 19000101, 'SEGUNDA-FEIRA É DIA DE VÍDEO: Uma grade universidade não gera conhecimento apenas dentro do câmpus. Fora dele também.\r\n\r\nAlém de produções de alunos e professores, teremos conteúdos pensados exclusivamente para o canal postados periodicamente.', 'INSCREVA-SE NO CANAL (link abaixo):  Receba todas as atualizações em tempo real e interaja com o canal.', '', '', '', 'NOSSA IDENTIDADE: Montamos uma programação com aberturas, vinhetas e direção de arte para estimular a visualização do conteúdo.', '', '', '', '', '', 'http://canalpucpr.pucpr.br/', '!', '', '', 'https://www.youtube.com/user/canalpucpr', 0, 'Observatório', 0, '', 'jeferson.vieira', 'NOVO YOUTUBE PUCPR - UM CANAL PLURAL', '', 0),
(108, '<br>Cátedra Capes/Sorbonne - 66/2014', 20150126, 'CAPES', 'pt_BR', '66/2014', 20150301, 19000101, 19000101, 'Conceder bolsa a notável pesquisador e professor sênior do Brasil, especialista em qualquer disciplina ou área acadêmica, para lecionar e pesquisar na Sorbonne Universités.', 'Mensalidade e auxílios', 'Ser brasileiro ou estrangeiro com visto; possuir título de doutor há pelo menos cinco anos; possuir atuação acadêmica qualificada e reconhecida competência profissional com produção intelectual consistente; ter fluência em inglês ou francês.', 'catedra.sorbonne@capes.gov.br', '', 'Diversas áreas do conhecimento', '', '', '', '', 'As inscrições serão gratuitas e feitas exclusivamente pela internet, mediante o preenchimento do formulário de inscrição disponível (http://www.capes.gov.br/cooperacao-internacional/catedras)', '', 'A', '', '', 'http://capes.gov.br/cooperacao-internacional/catedras/catedra-sorbonne', 0, 'Observatório', 20141128, '', 'francine.zucco', '', '1', 0),
(62, '<br>PROGRAMA CAPES/JSPS <br>Cooperação com o Japão', 20140910, 'CAPES', 'pt_BR', '53/2014', 20140930, 19000101, 19000101, 'Seleção de projetos conjuntos de pesquisa nas diversas áreas do conhecimento, com vistas ao intercâmbio científico entre Instituições de Ensino Superior (IES) do Brasil e do Japão, visando à formação de recursos humanos de alto nível nos dois países.', 'Recursos para missões de trabalho, missões de estudo e de custeio.', 'A proposta deve: <br>-estar vinculada a um PPG; <br>-contemplar, principalmente e obrigatoriamente, a formação de pós-graduandos e o aperfeiçoamento de docentes e pesquisadores vinculados aos referidos programas; <br>-ter caráter inovador; <br>-ser apresentada por coordenador de equipe, detentor do título de doutor obtido há pelo menos 05 anos; <br>-a equipe proponente brasileira deverá contar com, no mínimo, 02 docentes doutores vinculados.', 'jsps@capes.gov.br', '', 'Diversas áreas do conhecimento', '', '', '', '', 'As inscrições serão gratuitas e deverão ser feitas pelo coordenador da equipe, exclusivamente pela internet, mediante o preenchimento do formulário e o envio de documentos eletrônicos, disponível no endereço http://www.capes.gov.br/cooperacao-internacional/japao/programa-capes-jsps', '', 'A', '', '', 'http://www.capes.gov.br/cooperacao-internacional/japao/programa-capes-jsps', 0, 'Observatório', 20140910, '', 'francine.zucco', 'Oportunidade de cooperação com o Japão', '', 0),
(63, 'Prêmio Jovem Cientista em Segurança Alimentar e Nutricional', 20140910, 'CNPq', 'pt_BR', '2014', 20141219, 19000101, 19000101, 'Revelar talentos, impulsionar a pesquisa no país e investir em estudantes e jovens pesquisadores que procuram inovar na solução dos desafios da sociedade brasileira. <br>Prêmio é atribuído a quatro categorias: <br>1.Mestre e Doutor; <br>2.Estudante do Ensino Superior; <br>3.Estudante do Ensino Médio; <br>4.Mérito Institucional.', 'Prêmio de até R$ 40.000,00 e bolsas de estudo.', '1. Categoria Mestre e Doutor: podem concorrer estudantes de mestrado, mestres, estudantes de doutorado e doutores que tenham menos de 40 (quarenta) anos de idade, em 19 de dezembro de 2014. <br>2. Categoria Estudante do Ensino Superior: podem concorrer estudantes que estejam frequentando cursos de graduação ou que tenham concluído a graduação entre 01 de dezembro de 2013 e 29 de agosto de 2014 e que tenham menos de 30 (trinta) anos de idade, em 19 de dezembro de 2014. <br>3. Categoria Mérito Institucional: serão premiadas uma instituição de ensino superior e outra de ensino médio, às quais estiverem vinculados o maior número de trabalhos qualificados, apresentados respectivamente nas categorias Mestre e Doutor e Estudante do Ensino Superior, e Estudante do Ensino Médio.', 'pjc@cnpq.br ', '', 'Segurança Alimentar e Nutricional', '', '', '', '', '', 'A inscrição é de caráter individual e deverá ser efetuada exclusivamente no endereço www.jovemcientista.cnpq.br', 'A', '', '', 'http://www.jovemcientista.cnpq.br/', 0, 'Observatório', 20140905, '', 'francine.zucco', 'Prêmio nacional em Segurança Alimentar e Nutricional', '', 0),
(64, '.', 20140905, '00053', 'pt_BR', 'EDITAL 09/2014', 20140921, 19000101, 19000101, 'i) Atrair alunos de graduação e de pós-graduação inventivos e empreendedores dispostos a compartilhar suas ideias com a comunidade acadêmica, dando abertura para a criatividade, a inovação e o fator empreendedor da proposta; <br>ii) Identificar e incentivar alunos de graduação e de pós-graduação que apresentam um perfil mais inventivo, em busca de projetos com potencial para se transformar em Inovação.', 'Os três melhores projetos serão premiados: <br>1º lugar: R$2.000,00; <br>2º Lugar: R$ 1.000,00; <br>3º Lugar: Menção Honrosa. <br>Os três projetos selecionados serão premiados também com a pré-incubação na Incubadora da Agência PUC de Ciência, Tecnologia e Inovação.', 'A participação no concurso PUC Jovens ideais é aberta a: <br>a) alunos de graduação e pós-graduação regularmente matriculados na PUCPR de todos os Campi; <br>b) alunos de graduação e pós-graduação de outros IES brasileiras.', '', '', '', '', '', '', '', 'A inscrição deverá ser realizada via e-mail: jovensideias@pucpr.br no período de 26/08 a 21/09.', '', '!', '', '', 'http://www.pucpr.br/pesquisacientifica/iniciacaocientifica/jovens_ideias.php', 0, 'Observatório', 20141001, '', 'francine.zucco', '', '', 0),
(77, 'Chamada CNPq Nº 35/2014 - Pesquisas sobre Doenças Raras', 20140930, 'CNPq', 'pt_BR', '35/2014', 20141104, 19000101, 19000101, 'Desenvolver pesquisas sobre os mecanismos básicos das doenças raras; Desenvolver pesquisas epidemiológicas;  Investigar novos procedimentos diagnósticos e terapêuticos para as doenças raras;  Iniciar a avaliação de intervenções terapêuticas e preventivas em doenças raras que sejam de interesse do Ministério da Saúde.', 'De R$ 200 mil a R$ 1 milhão - custeio, capital e bolsas.', 'O proponente deve possuir título de doutor e ser obrigatoriamente o coordenador da proposta.', 'chamada352014@cnpq.br', '', 'Eixos temáticos: 1. Hiperfenilalaninemias; 2. Síndrome de Prader-Willi e Hormônio do Crescimento; 3. Doença de Fabry; 4. Esclerose Tuberosa e inibidores do mTOR.', '', '', '', '', 'As propostas devem ser acompanhadas de arquivo contendo o projeto e devem ser encaminhadas ao CNPq exclusivamente via Internet, utilizando-se do Formulário de Propostas online, disponível na Plataforma Carlos Chagas.', '', 'A', '', '', 'http://www.cnpq.br/web/guest/chamadas-publicas?p_p_id=resultadosportlet_WAR_resultadoscnpqportlet_INSTANCE_0ZaM&id=47-445-3053&detalha=chamadaDetalhada&filtro=abertas', 0, 'Observatório', 20140926, '', 'francine.zucco', 'Recursos CNPq para Projetos de Pesquisa em Doenças Raras', '', 0),
(103, 'Grandes Desafios Brasil: Desenvolvimento Saudável Para Todas as Crianças - 47/2014', 20141117, '00057', 'pt_BR', '47/2014', 20150117, 19000101, 19000101, 'O CNPq/MCTI, o Decit/SCTIE/MS e a Fundação Bill & Melinda Gates formaram uma aliança estratégica em torno de prioridades comuns e lançaram em conjunto o Programa Grandes Desafios Brasil (Grand Challenges Brazil) com o objetivo de dar apoio à pesquisa e à inovação na área de saúde. <br>O programa "Grandes Desafios Brasil: Desenvolvimento Saudável Para Todas as Crianças" foca em novas ferramentas para mensurar o desenvolvimento infantil e em novas combinações de abordagens para promover o desenvolvimento infantil – de maneira que elas não apenas sobrevivam, mas também tenham uma vida saudável e produtiva.', '1. Financiamento básico ou “semente”, no valor máximo de R$ 500.000,00 com duração de até dois anos; <br>2. Financiamento pleno, no valor máximo de R$ 4.000.000,00 para até 4 anos.', 'O proponente deve possuir título de doutor, ser obrigatoriamente o coordenador da proposta e ter vínculo formal com a instituição de execução do projeto. <br><br>Como primeira etapa, a carta de intenção deve ser enviada até 17/01/2015. Esta carta deve conter no máximo 4 páginas (para cada idioma - português e inglês), incluindo um resumo do projeto. O sumário, de até 250 palavras, deve incluir uma ou duas frases em negrito que captem o ponto essencial da sua ideia. O resumo deve indicar qual é o problema específico que o projeto busca resolver, qual é a abordagem proposta para a solução do problema, por que o projeto é inovador e qual é o impacto esperado do projeto – caso seja bem sucedido – ao final do período de financiamento.', 'chamada472014@cnpq.br', '', 'Desenvolvimento infantil - Inovação em ferramentas de mensuração, pacotes de interações e ferramentas analíticas.', '', '', '', '', 'As propostas devem ser acompanhadas de arquivo contendo o projeto e devem ser encaminhadas ao CNPq exclusivamente via Internet, utilizando-se do Formulário de Propostas online, disponível na Plataforma Carlos Chagas.', '', 'A', '', '', 'http://goo.gl/c6snmk', 0, 'Observatório', 20141117, '', 'francine.zucco', 'Parceria entre CNPq e Bill & Melinda Gates Foundation em Desenvolvimento Infantil', '', 0),
(104, 'LONGITUDE PRIZE 2014 - Challenge with a £10 million prize fund to help solve the problem of global antibiotic resistance', 20150126, 'nst', 'us_EN', 'V10', 20150531, 19000101, 19000101, 'Longitude Prize 2014 is a challenge prize fund to help solve the problem of global antibiotic resistance. It is being run by Nesta, supported by Innovate UK, the new name for the Technology Strategy Board, as funding partner.', 'Longitude Prize is looking to help tackle the problem of antibiotic resistance with a £10 million prize fund for a diagnostic tool that can rule out antibiotic use or help identify an effective antibiotic to treat a patient.', 'Anyone of any age and any organisation may enter the competition. The team is able to demonstrate that in winning the Longitude Prize it would deliver direct economic growth \r\nor benefit or social benefit in the UK. Include a member which has a presence in the United Kingdom, meaning an office in the UK, affiliation with a UK Company or partnership with a UK organisation or institution.', 'longitude.prize@nesta.org.uk', '', 'The Longitude Prize will therefore focus on diagnostic technologies that can be used at the point–of–care and exclude technologies that can only be used in a laboratory. The challenge: better point–of–care diagnosis of infections.', '', '', '', '', 'http://longitudeprize.org/enter', 'pdi@pucpr.br', 'A', '', '', 'http://goo.gl/G64PJh', 0, 'Observatório', 20141119, '', 'jeferson.vieira', 'LONGITUDE PRIZE 2014 - Challenge with a £10 million prize fund to help solve the problem of global a', '4', 0),
(106, 'Bolsas para Pesquisa Capes/Humboldt - 57/2014', 20141201, 'CAPES', 'pt_BR', '57/2014', 20141231, 19000101, 19000101, 'A parceria da Capes com a Fundação Alexander von Humboldt (AvH) visa à internacionalização de forma mais consistente, o aprimoramento da produção e qualificação científicas e o desenvolvimento de métodos e teorias em conjunto com pesquisadores, de reconhecido mérito científico, alemães ou estrangeiros residentes na Alemanha.', 'Bolsa mensal, auxílios, curso de alemão (se necessário).', '1.Pós-doutorado: para pesquisador altamente qualificado e em início da carreira acadêmica, que tenha completado seu doutorado há menos de quatro anos. <br>2.Pesquisador experiente: para acadêmico altamente qualificado com um perfil de pesquisa definido, que tenha completado seu doutorado há menos de doze anos. <br><br>Confirmação de aceitação por uma instituição alemã com infraestrutura adequada à realização do projeto de pesquisa proposta e competência linguística em alemão e/ou inglês.', 'humboldt@capes.gov.br', '', 'Humanas, Ciências Sociais, Medicina, Ciências Naturais e Engenharias', '', '', '', '', 'As inscrições serão gratuitas e admitidas exclusivamente pela internet, mediante o preenchimento de formulários de inscrição e o envio de documentos eletrônicos no endereço: http://capes.gov.br/cooperacaointernacional/alemanha/humboldt', '', 'A', '', '', 'http://www.capes.gov.br/cooperacao-internacional/alemanha/humboldt', 0, 'Observatório', 20141126, '', 'francine.zucco', '', '', 0),
(107, 'Patrocínio a Eventos Culturais 2015', 20141127, 'BNDES', 'pt_BR', 'BNDES/PE', 20141219, 20141219, 19000101, 'O BNDES receberá, para o 1º período de 2015 (de março a agosto), propostas de patrocínio a eventos culturais nos segmentos de Música e Literatura. São considerados eventos culturais os projetos com duração e local pré-estabelecidos, que contribuam para a difusão e fomento da cultura brasileira, tais como mostras, festivais, feiras, espetáculos, entre outros.', 'Análise pelo BNDES.', 'Os pedidos de patrocínio podem ser apresentados por pessoas jurídicas regularmente constituídas, que detenham  – isolada ou conjuntamente – a responsabilidade pelo projeto.\r\nNão serão objeto de patrocínio, propostas apresentadas por: \r\nPessoas físicas, incluindo microempreendedores individuais ou empresários individuais, que possuem natureza jurídica de pessoa física;\r\nassociações de empregados das empresas integrantes do Sistema BNDES, da ativa ou aposentados;\r\nentidades político-partidárias; ou\r\nentidades religiosas.', '21 2172-7447', '', 'Música:	Festivais, feiras e espetáculos com ênfase em música instrumental e clássica, que reúnam artistas e grupos diversos, prioritariamente brasileiros. ||||||||  \r\nLiteratura: Festivais, festas e feiras literárias com ênfase na divulgação da obra e da produção de diferentes autores, prioritariamente brasileiros.', '', '', '', '', 'http://goo.gl/E3Bv2L', 'pdi@pucpr.br', 'B', '', '', 'http://goo.gl/dXmSrH', 0, 'Observatório', 20141127, '', 'jeferson.vieira', 'Patrocínio a Eventos Culturais 2015', '', 0),
(112, 'IIASA Young Scientists Program <br>(2015 YSSP)', 20141201, '00061', 'us_EN', '2014/15', 20150112, 19000101, 19000101, 'Since 1977, IIASA’s annual 3-month Young Scientists Summer Program (YSSP) offers research opportunities to talented young researchers whose interests correspond with IIASA’s ongoing research on issues of global environmental, economic and social change. From June through August accepted participants work within the Institute’s research programs under the guidance of IIASA scientific staff.', '', '1. Have research experience corresponding to a level typical of a researcher about 2 years prior to receiving a PhD or equivalent degree; <br>2. A summer research proposal that clearly fits the interdisciplinary research agenda of a selected IIASA program; <br>3. Ability to work independently as well as to interact with other scientists; <br>4. Fluency in English and the ability to communicate in a scientific environment.', '', '', 'Advanced systems Analysis; Evolution and Ecology; Energy; Ecosystems Services & Management; Mitigation of Air Pollution & greenhouse Gases; World Population; Risk, Policy and Vulnerability; Transitions to New Technologies; Water; Tropical Futures Initiative.', '', '', '', '', 'Before sending your application you are strongly advised to get in touch with the relevant program representatives to find out about mutual interest in your intended research. More information at http://www.iiasa.ac.at/web/home/education/yssp/Apply/OnlineApplication/Online-application.en.html', '', 'A', '', '', 'http://www.iiasa.ac.at/web/home/education/yssp/Apply/ConditionsEligibility/Conditions-and-Eligibility.en.html', 0, 'Observatório', 20141201, '', 'francine.zucco', '', '', 0),
(113, '<br>SWE e PDE CsF/CISB/SAAB', 20150126, 'CNPq', 'pt_BR', '42/2014', 20150515, 19000101, 19000101, 'Propiciar a formação de recursos humanos altamente qualificados nas melhores universidades e instituições de pesquisa estrangeiras, com vistas a promover a internacionalização da ciência e tecnologia nacional, estimulando estudos e pesquisas de brasileiros no exterior.', 'Mensalidade, auxílios e taxas.', 'O candidato deve: ter o currículo Lattes atualizado; ser brasileiro ou estrangeiro regular; possuir formação profissional compatível, possuir conhecimento do idioma a ser confirmado em entrevista.', 'coene@cnpq.br', '', 'Materiais e manufatura, Eletrônica, TICs, Engenharia Mecânica', '', '', '', '', 'As propostas devem ser acompanhadas de arquivo contendo o projeto em português e em inglês e devem ser encaminhadas ao CNPq exclusivamente pela Internet, utilizando-se do Formulário de Propostas online, disponível na Plataforma Carlos Chagas.', '', 'A', '', '', 'http://www.cnpq.br/web/guest/chamadas-publicas?p_p_id=resultadosportlet_WAR_resultadoscnpqportlet_INSTANCE_0ZaM&filtro=abertas&detalha=chamadaDivulgada&idDivulgacao=5562', 0, 'Observatório', 20141208, '', 'francine.zucco', 'Bolsas SWE e PDE Ciência sem Fronteiras/CISB/SAAB', '1', 0),
(94, 'Últimos dias: CP 18/2014 -Cooperação Internacional Fundação Araucária/INRIA/INS2i-NRS', 20141209, 'FA', 'pt_BR', 'CP 18/2014', 20141218, 19000101, 19000101, 'Apoiar propostas de pesquisa científica, tecnológica e de inovação em ciência e tecnologia da informação e comunicação (TIC), mediante a seleção de projetos conjuntos a serem executados por equipe de pesquisadores do Estado do Paraná (Equipe Brasileira Principal ou Orbital) e pesquisadores franceses do INRIA ou do INS2i-CNRS, em colaboração eventual com pesquisadores de outros estados da federação.', 'Até R$ 120.000,00 por projeto, no caso de Equipe Principal com agregação de Equipe Brasileira Orbital. <br> Até R$ 100.000,00 sem Equipe Brasileira Orbital. <br>Até R$ 40.000,00 se apenas Equipe Orbital.', 'O proponente deve: <br>1.Possuir o título de Doutor e experiência em projetos de cooperação internacional e/ou alta qualificação; <br>2.ter vínculo empregatício/funcional com a Instituição Executora Local; <br>3.ter produção científica e tecnológica relevante nos últimos cinco anos. <br><br>Os parceiros da França deverão apresentar proposta correspondente ao INRIA ou ao INS2i-CNRS, bem como coparticipes brasileiros às FAPs de seus respectivos estados.', '', '', 'Tecnologia da Informação e Comunicação', '', '', '', '', 'As propostas deverão ser enviadas à Fundação Araucária por meio do Sistema de Informação e Gestão de Projetos (SigAraucária), disponível no site www.fappr.br', '', 'A', '', '', 'http://www.fappr.pr.gov.br/arquivos/File/chamadas2014/CP18_2014_Inria.pdf', 0, 'Observatório', 20141209, '', 'francine.zucco', 'Últimos dias: Programa de Cooperação em TICs entre Fundação Araucária e institutos franceses', '', 0),
(115, 'Programa Estágio Pós-Doutoral PCTI 2014 – Parques Tecnológicos', 20150126, 'CAPES', 'pt_BR', '2014', 20150315, 19000101, 19000101, 'Oferecer oportunidade de formação pós-doutoral no exterior, possibilitando maior visibilidade internacional aos ambientes de inovação brasileiros, em especial os Parques Científicos e Tecnológicos; ampliar o potencial de colaboração conjunta entre gestores e pesquisadores que atuam no Brasil e no exterior nesta área de gestão de ambientes de inovação; ampliar o acesso de gestores de ambientes de inovação a Parques Científicos e Tecnológicos e outros ambientes de inovação internacionais de excelência e possibilitar o desenvolvimento dos ambientes de inovação brasileiros com o posterior retorno do bolsista.', 'Bolsas e auxilios', 'O candidato deverá obrigatoriamente preencher os seguintes requisitos: ser brasileiro ou estrangeiro com visto permanente no Brasil; possuir o título de Doutor, reconhecido conforme legislação brasileira, e vinculação com um Parque Científico e Tecnológico ou área de Inovação no Brasil, quando da inscrição neste edital; propor projeto de estudos dentro das áreas temáticas contempladas no edital.', 'pcti@capes.gov.br', '', 'Áreas contempladas no Programa Ciência sem Fronteiras.', '', '', '', '', 'O candidato deverá realizar inscrição e  anexar a seguinte documentação ao formulário de inscrições on-line: plano de estudos e/ou projeto de pesquisa, endereço/link para acesso ao seu Curriculum Lattes, documento do próprio candidato, indicando uma ou mais áreas e temas de maior interesse, manifestação de aceite formal por parte da instituição estrangeira e diploma de doutorado ou ata de defesa de tese, para defesas recentes.', '', 'A', '', '', 'http://capes.gov.br/cooperacao-internacional/multinacional/programa-estagio-pos-doutoral-pcti-2014-parques-tecnologicos', 0, 'Observatório', 20141205, '', 'francine.zucco', '', '1', 0),
(116, 'Ernst Mach Grant for studying at an Austrian University of Applied Sciences (Fachhochschule)', 20141210, '00063', 'us_EN', '2015', 20150110, 19000101, 19000101, 'OeAD-GmbH/ICM on behalf of and financed by the Federal Ministry of Science, Research and Economy (BMWFW) offers na opportunity to spend an exchange semester in the Austrian Alps at Vorarlberg University of Applied Sciences. Intensive support and mentoring, an open door policy and an interesting exchange between students and lecturers from all over the world support the personal development and the qualification of the participating students.', 'Monthly grant and travel cost subsidy', '1.Applicants must study  a master Programme or have successfully completed at least 4 semesters of studies within a bachelor/diploma Programme by the time of taking up the grant; <br>2.Maximum age: 35 years; <br>3.Proficiency in the language of instruction (German or English), particularly in the respective subject area, is a prerequisite; <br>4.Applicants must not have studied/pursued research/pursued academic work in Austria in the last six months before taking up the grant.', 'sts@fhv.at', '', 'Natural Sciences, Technical Sciences, Human Medicine, Health Sciences, Agricultural Sciences and Social Sciences', '', '', '', '', 'First, students who are interested in this grant need to get in contact with  Sabine sts@fhv.at as soon as possible, no later than January 10th,  2015. <br>Further, the online application must be done until March 1st, 2015 at http://www.scholarships.at', '', 'A', '', '', 'http://oead.grants.at/out/default.aspx?TemplateGroupID=34&PageMode=3&GrainEntryID=7277&HZGID=7806&LangID=2', 0, 'Observatório', 20141210, '', 'francine.zucco', 'Ernst Mach Grant for studying at an Austrian University of Applied Sciences (Fachhochschule)', '', 0),
(118, 'Mobile Health: Technology and Outcomes in Low and Middle Income Countries ', 20141211, '00058', 'us_EN', '2015', 20150119, 19000101, 19000101, 'To encourage exploratory/developmental research applications that propose to study the development or adaptation of innovative mobile health (mHealth) technology specifically suited for low and middle income countries (LMICs) and the health-related outcomes associated with implementation of the technology. Of highest interest are well-designed multidisciplinary projects that focus on tools or interventions for chronic diseases or technology for disease agnostic/cross-cutting applications.', 'Up to $125,000 direct costs per year', 'International research network (at least one U.S. institution), multidisciplinary and cross-sector in nature. <br>Any individual(s) with the skills, knowledge, and resources necessary to carry out the proposed research as the Program Director(s)/Principal Investigator(s) (PD(s)/PI(s)) is invited to work with his/her organization to develop an application for support.', 'laura.povlich@nih.gov', '', 'Mobile communication technologies applied to health issues', '', '', '', '', 'Although a letter of intent is not required, it is recommended to submit the letter by Jan 19, and the deadline to apply is Feb 19.', '', 'A', '', '', 'http://grants.nih.gov/grants/guide/pa-files/PAR-14-028.html', 0, 'Observatório', 20141211, '', 'francine.zucco', '', '', 0),
(117, 'Society in Science – The Branco Weiss Fellowship', 20141210, '00064', 'us_EN', '2015', 20150115, 19000101, 19000101, 'Society in Science – The Branco Weiss Fellowship is a unique postdoc program. It awards young researchers around the world with a generous personal research grant, giving them the freedom to work on whatever topic they choose anywhere in the world, for up to five years.', 'CHF 100´000/year - For all legitimate cost of research (i.e. salary and/or equipment, travel cost, consumables, personnel etc)', 'You are eligible for the 2015 campaign if: <br>1. You officially hold a PhD on January 15, 2015; <br>2. Your project departs from the mainstream of research in your discipline; <br>3. You have a record of outstanding scientific achievement; <br>4. You demonstrate in the proposal a willingness to engage in a dialogue on relevant social, cultural, political or economic issues across the frontiers of your particular discipline.', 'society-in-science@ethz.ch', '', 'Ideally, unconventional projects in new areas of science, engineering and social sciences', '', '', '', '', '', '', 'A', '', '', 'http://www.society-in-science.org/', 0, 'Observatório', 20141210, '', 'francine.zucco', '', '', 0),
(119, 'International Research Ethics Education and Curriculum Development Award ', 20150126, '00058', 'us_EN', '2015', 20150422, 19000101, 19000101, 'Strengthen research ethics capacity in low- and middle-income countries (LMICs) through increasing the number of scientists, health professionals and relevant academics from these countries with in-depth knowledge of the ethical principles, processes and policies related to international clinical and public health research as well as the critical skills to develop research ethics education, ethical review leadership and expert consultation to researchers, their institutions, governments and international research organizations.', 'Up to $230,000 direct costs per year', 'Any individual(s) with the skills, knowledge, and resources necessary to carry out the proposed research as the Program Director(s)/Principal Investigator(s) (PD(s)/PI(s)) is invited to work with his/her organization to develop an application for support.', 'sinab@mail.nih.gov', '', 'Bioethics', '', '', '', '', 'Although a letter of intent is not required, it is recommended to submit the letter by April 22, and the deadline to apply is May 22.', '', 'A', '', '', 'http://grants.nih.gov/grants/guide/pa-files/PAR-13-027.html', 0, 'Observatório', 20141211, '', 'francine.zucco', '', '2', 0),
(120, 'Programa Geral de Cooperação Internacional', 20150126, 'CAPES', 'pt_BR', '026/2008', 19100101, 19000101, 19000101, 'Apoiar projetos conjuntos de pesquisa e parcerias universitárias entre Instituições de Ensino Superior do Brasil e de países que promovam a formação em nível de pós-graduação (doutorado sanduíche e pós-doutorado), situadas em países com os quais o Brasil possui acordos internacionais, mas a Capes não possui acordo específico, e o aperfeiçoamento de docentes e pesquisadores.', 'Missões de trabalho e de estudo; custeio; seminários e workshops; bolsas de estudo em nível de doutorado-sanduíche e pós-doutorado.', '1. A proposta deverá estar vinculada a um ou mais programas de pós-graduação avaliados pela CAPES, preferencialmente, com conceitos 5, 6 ou 7; <br>2. A coordenação do projeto estará a cargo de docente com título de doutor há pelo menos 5 anos; <br>3. A equipe do Brasil deverá ser composta de pelo menos dois doutores, além do Coordenador; <br>4. A proposta deverá ter caráter inovador, considerando inclusive o desenvolvimento da área no contexto nacional e internacional, e explicitando as vantagens da parceria.', 'cgci@capes.gov.br', '', 'Diversas áreas do conhecimento', '', '', '', '', 'Fluxo contínuo: As inscrições serão gratuitas e feitas exclusivamente on-line, mediante o preenchimento do formulário de inscrição, disponível no endereço: http://www.capes.gov.br/cooperacaointernacional/multinacional', '', 'B', '', '', 'http://www.capes.gov.br/cooperacao-internacional/multinacional/programa-geral-de-cooperacao-internacional', 0, 'Observatório', 20141212, '', 'francine.zucco', '', '3', 0),
(122, 'Cátedra Instituto de Educação da Universidade de Londres - Anísio Teixeira', 20150126, 'CAPES', 'pt_BR', '70/2014', 20150227, 19000101, 19000101, 'O Programa tem como objetivo específico enviar pesquisadores, intelectuais e formuladores de políticas públicas ao Instituto de Educação da Universidade de Londres, proporcionando ambiente propício para permitir o desenvolvimento do estudo acadêmico na área de educação, com prioridade para a área de tecnologia aplicada à educação.', 'Estipêndio mensal e auxílios.', '1. Possuir título de doutor; <br>2. Estar credenciado como docente e orientador em programa de pós-graduação reconhecido pela CAPES; <br>3. Dedicar-se em regime integral às atividades acadêmicas; <br>4. Ter fluência em inglês', 'anisioteixeira@capes.gov.br', '', 'Educação e áreas relacionadas', '', '', '', '', 'Os candidatos deverão se inscrever exclusivamente via internet, preenchendo formulário de inscrição online, em português, disponível no link de inscrições na página do programa e incluindo pelo mesmo formulário os documentos especificados no edital.', '', 'A', '', '', 'http://www.capes.gov.br/cooperacao-internacional/catedras/catedra-anisio-teixeira', 0, 'Observatório', 20141215, '', 'francine.zucco', 'Oportunidade de Cátedra na Universidade de Londres na área de Educação - Capes', '1', 0),
(121, 'Cátedra Capes/Universidade de Brown - 71/2014', 20150126, 'CAPES', 'pt_BR', '71/2014', 20150202, 19000101, 19000101, 'Aprofundar a cooperação acadêmica entre instituições de ensino superior e centros de ciência e tecnologia brasileiros e americanos, a fim de promover o desenvolvimento da ciência e tecnologia em ambos os países, e aprofundar a cooperação entre pesquisadores e educadores de instituições de pesquisa e ensino superior no Brasil e seus pares da Universidade de Brown e aumentar o conhecimento na Universidade de Brown sobre as contribuições de notáveis pesquisadores e educadores do Brasil, por meio da concessão de bolsa a notável pesquisador e professor sênior do Brasil, especialista em qualquer disciplina ou área acadêmica.', 'Bolsa mensal, auxílio deslocamento, acomodação e seguro saúde.', '1. Possuir título de doutor; <br>2. Estar credenciado como docente e orientador em programa de pós-graduação reconhecido pela CAPES; <br>3. Dedicar-se em regime integral às atividades acadêmicas; <br>4. Ter fluência em inglês.', 'brown@capes.gov.br', '', 'Diversas áreas do conhecimento', '', '', '', '', 'O candidato deve submeter sua candidatura exclusivamente via internet disponível em: http://www.capes.gov.br/cooperacao-internacional/catedras/catedra-capesuniversidade-de-brown', '', 'A', '', '', 'http://www.capes.gov.br/cooperacao-internacional/catedras/catedra-capes-universidade-de-brown', 0, 'Observatório', 20141215, '', 'francine.zucco', 'Oportunidade de Cátedra na Universidade de Brown - Capes', '1', 0);
INSERT INTO `fomento_editais` (`id_ed`, `ed_titulo`, `ed_data`, `ed_agencia`, `ed_idioma`, `ed_chamada`, `ed_data_1`, `ed_data_2`, `ed_data_3`, `ed_texto_1`, `ed_texto_2`, `ed_texto_3`, `ed_texto_4`, `ed_texto_5`, `ed_texto_6`, `ed_texto_7`, `ed_texto_8`, `ed_texto_9`, `ed_texto_10`, `ed_texto_11`, `ed_texto_12`, `ed_status`, `ed_autor`, `ed_corpo`, `ed_url_externa`, `ed_total_visualizacoes`, `ed_local`, `ed_data_envio`, `ed_document_require`, `ed_login`, `ed_titulo_email`, `ed_edital_tipo`, `ed_fluxo_continuo`) VALUES
(123, 'Programa Capes/National Science Foundation (NSF)-Biodiversidade - 72/2014', 20141215, 'CAPES', 'pt_BR', '72/2014', 20150110, 19000101, 19000101, 'O objetivo do Programa Capes/NSF-Biodiversidade é aprofundar a cooperação acadêmica entre as instituições de ensino superior do País e a agência governamental norte-americana NSF, no âmbito do programa "Dimensões da Biodiversidade" para Pesquisa e Infraestrutura Associada. A iniciativa promove novas abordagens integradas para identificar e compreender o significado evolutivo e ecológico da biodiversidade em meio ao ambiente de mudanças. Esta chamada de projetos visa caracterizar a biodiversidade na Terra, usando abordagens inovadoras de integração, para preencher as lacunas mais importantes em nossa compreensão da diversidade da vida na Terra.', 'Missões de trabalho e de iniciação científica, recursos de custeio.', 'As instituições brasileiras devem estar cadastradas junto à NSF para apresentarem seus projetos. Para cada proposta brasileira submetida à CAPES, deverá existir proposta equivalente submetida previamente à NSF pela parte americana. <br>A proposta deve comprovar a vinculação do coordenador da proposta a Programa de Pós-Graduação reconhecido pela CAPES.', 'nsf@capes.gov.br', '', 'Biodiversidade', '', '', '', '', 'A inscrição da equipe brasileira será gratuita e admitida exclusivamente pela internet, mediante o preenchimento do formulário de inscrição e o envio de documentos eletrônicos. A equipe americana deverá enviar a proposta para a NSF.', '', 'A', '', '', 'http://capes.gov.br/cooperacao-internacional/estados-unidos/capes-national-science-foundation-nsf', 0, 'Observatório', 20141215, '', 'francine.zucco', '', '', 0),
(124, 'Inova Talentos - Programa RHAE Trainee CNPq/IEL', 20150126, '00065', 'pt_BR', '2015', 20150228, 19000101, 19000101, 'O programa INOVA Talentos é uma parceria do IEL com o CNPq, que está abrindo as portas de inúmeras empresas para estudantes e recém-formados que buscam a oportunidade de mostrar o seu conhecimento para inovar. O objetivo é ampliar o quadro de profissionais em atividades de inovação no setor brasileiro.', 'Bolsas de desenvolvimento tecnológico e extensão inovadora', 'Estudantes a partir do penúltimo ano de graduação, graduados e mestres com até 5 (cinco) anos de conclusão da graduação, de todas as áreas de conhecimento. <br>Serão aceitas propostas de projetos de PD&I que visem o aumento da competitividade das empresas, por meio de inovação de produtos e processos, organizacional, em marketing e modelo de negócios.', '', '', 'Diversas áreas do conhecimento', '', '', '', '', 'Os candidatos interessados em concorrer às oportunidades das empresas deverão cadastrar seu currículo e candidatar-se às vagas no site Inova Talentos.', '', 'A', '', '', 'http://www.ielpr.org.br/inovatalentos', 0, 'Observatório', 20141216, '', 'francine.zucco', '', '1', 0),
(127, 'EU-BRAZIL RESEARCH AND DEVELOPMENT COOPERATION IN ADVANCED CYBER INFRASTRUCTURE', 20150303, 'hz', 'us_EN', 'EUB-2015', 20150421, 20150421, 19000101, 'Specific Topics:\r\n1)EUB-1-2015: Cloud Computing, including security aspects:\r\nSpecific Challenge: Data are motivating a profound transformation in the culture and conduct of scientific research in every field of science and engineering. Advancements in this area are required in terms of cloud-centric applications for big data,.......2)EUB-2-2015: High Performance Computing (HPC):\r\nSpecific Challenge: The work aims at the development of state-of-the-art High Performance Computing (HPC) environment that efficiently exploits the HPC resources in both the EU and Brazil and advances the work on HPC applications in domains of common......3)EUB-3-2015: Experimental Platforms:\r\nSpecific Challenge: The objective of cooperation in the area of Experimental Platforms is to enable and promote the federation of experimental resources irrespective of their localization in Brazil and in Europe, with a view towards global experimentation.', 'Total Call Budget	€7,000,000', 'Additional eligibility criterion:\r\n*Proposals submitted to this call which do not includecoordination with a Brazilian\r\nproposalwill be considered ineligible.\r\n\r\n*The proposed project duration shall not exceed 36 months\r\n\r\n*At least three legal entities. Each of the three shall be established in a different Member State or associated country. All three legal entities shall be independent of each other.', 'http://ec.europa.eu/research/participants/api//contact/index.html', '', 'Information and communication technologies.', '', '', '', '', '', '', '!', '', '', '', 0, 'Observatório', 0, '', 'jeferson.vieira', 'EU-BRAZIL RESEARCH AND DEVELOPMENT COOPERATION IN ADVANCED CYBER INFRASTRUCTURE', '3', 0),
(125, 'Eiffel Excellence Scholarship Programme', 20150126, '00066', 'us_EN', '2015', 20150109, 19000101, 19000101, 'The Eiffel Excellence Scholarship Programme was established by the French Ministry of Foreign Affairs and International Development to enable French higher education establishments to attract top foreign students to enrol in their master’s and PhD courses. It helps to shape the future foreign decision-makers of the private and public sectors, in priority areas of study, and encourages applications from emerging countries at master’s level, and from emerging and industrialized countries at PhD level.', 'Two branches: 1. Master’s branch, which funds master’s courses lasting between 12 and 36 months; <br>2. PhD branch, which offers funding for PhD students to spend ten months in France, through joint supervision or dual enrollment (preferably in the second year of their PhD).', 'Age: for master’s courses, candidates must be no older than 30 on the date of the selection committee meeting, i.e. born after 11/03/1984; at PhD level, candidates must be no older than 35 on the date of the selection committee meeting, i.e. born after 11/03/1979.  <br>Language skills should meet the requirements of the relevant course of study.', 'candidatures.eiffel@campusfrance.org', '', 'Engineering science at master’s level, science in the broadest sense at PhD level; economics and management; law and political sciences.', '', '', '', '', 'Only the French higher education institutions may submit candidature files. It applies to students with previous cooperation/contact with French universities.', '', 'A', '', '', 'http://www.campusfrance.org/en/eiffel', 0, 'Observatório', 20141216, '', 'francine.zucco', 'Oportunidade de bolsas mestrado e doutorado na França', '1', 0),
(126, 'CUD ARES Scholarships in Belgium for Developing Countries', 20150126, '00067', 'us_EN', '2015', 20150211, 19000101, 19000101, 'International Courses and Training Programmes are part of the global study programmes of the Higher Education Institutions. They are open to all students who satisfy the conditions of qualification, but aim at proposing training units that distinguish themselves by their openness towards specific development issues.', 'Scholarships - masters and training programmes', '1. At the beginning of the programme, candidates must be less than 40 years old for courses, and less than 45 years old for training programmes; <br>2. Candidates must be holders of a degree that is comparable to a Belgian University graduate degree (“licence”); <br>3. Candidates must have a good knowledge of written and spoken French; <br>4. Candidates must show professional experience of at least two years upon termination of their studies; <br>5. Candidates are not allowed to apply for more than one programme. <br>Each Master’s and Training Program has its own eligibility requirements. Please see the complete description of each program.', '', '', 'Diversas áreas do conhecimento - http://www.cud.be/content/view/334/203/lang,/', '', '', '', '', 'The application form can be downloaded from the official website and it should be carefully completed and sent only by POST MAIL or EXPRESS MAIL, to ARES-CCD.', '', 'A', '', '', 'http://www.cud.be/content/view/339/208/lang,/', 0, 'Observatório', 20141216, '', 'francine.zucco', '', '1', 0),
(132, '<br>CP IPEA/PNPD Nº 001/2015', 20150126, '00071', 'pt_BR', '001/2015', 20150204, 19000101, 19000101, 'Selecionar interessados, para concessão de bolsa pesquisa, que atendam aos requisitos dispostos na chamada para realizar pesquisa no Projeto “Condicionantes institucionais ao investimento em infraestrutura”.', 'Auxiliar de Pesquisa: R$ 700,00; <br>Doutor II (não presencial): R$ 4.500,00', '1. Auxiliar de Pesquisa (Graduando): estar regularmente matriculado na graduação no curso de Direito; ter cursado as disciplinas de Direito da Propriedade ou Direito das Coisas; ter disponibilidade para execução de atividade inerentes ao projeto de pesquisa, nas instalações do IPEA/Brasília. <br>2. Doutor II: possuir titulo de doutor em Direito; ter experiência na área do Direito da Propriedade ou Direito das Coisas.', 'pnpd@ipea.gov.br', '', 'Direito', '', '', '', '', 'A solicitação deve ser apresentada, pelo candidato, mediante o cadastramento de seus dados no Sistema de Cadastro de Bolsista, disponível na página do IPEA www.ipea.gov.br', '', '!', '', '', 'http://www.ipea.gov.br/portal/index.php?option=com_content&view=article&id=24284&catid=117&Itemid=5', 0, 'Observatório', 20150115, '', 'francine.zucco', 'Oportunidade de bolsas IPEA em Direito', '1', 0),
(128, 'Programa de Licenciaturas Internacionais - 74/2014', 20150126, 'CAPES', 'pt_BR', '74/2014', 20150315, 19000101, 19000101, 'Seleção de projetos de graduação sanduíche para estudantes de cursos de licenciaturas das áreas de Biologia, Física, Matemática, Química e Português no âmbito do Programa de Licenciaturas Internacionais PLI – Portugal, com vistas a valorizar e estimular a formação de professores de educação básica no Brasil.', '1. Bolsas e auxílios para estudantes brasileiros nos termos vigentes da Capes; <br>2. Passagens aéreas internacionais e diárias internacionais para docentes brasileiros em missão a Portugal.', 'Cada proposta deverá apresentar apenas uma universidade portuguesa como destino e poderá apresentar projeto conjunto com até 2 outras instituições brasileiras. <br>Os projetos serão coordenados por um docente doutor vinculado ao curso de licenciatura da instituição proponente. <br>O coordenador deve estar em efetivo exercício no magistério da educação superior durante todo o período de vigência do projeto e possuir título de doutor há, no mínimo, 3 anos. <br>A equipe brasileira deverá ser composta de pelo menos 2 (dois) doutores, além do coordenador, e estes devem estar vinculados à mesma instituição do coordenador do projeto.', 'pli@capes.gov.br', '', 'Biologia, Física, Matemática, Química e Português', '', '', '', '', 'Potenciais coordenadores devem manifestar seu interesse pelo e-mail pdi@pucpr.br para articulação institucional. <br>As inscrições da equipe brasileira serão gratuitas e feitas exclusivamente pela internet, mediante o preenchimento do formulário de inscrição disponível no endereço http://inscricoes-cgci.capes.gov.br/index.php/roteiroprojeto/init/CodigoProjeto/1150', '', 'A', '', '', 'http://www.capes.gov.br/cooperacao-internacional/multinacional/licenciaturas-internacionais/licenciaturas-internacionais-portugal', 0, 'Observatório', 20141222, '', 'francine.zucco', '', '1', 0),
(133, 'Programa Estágio Pós-Doutoral Bayer 2015 - 01/2015', 20150209, 'CAPES', 'pt_BR', '01/2015', 20150220, 19000101, 19000101, 'Oferecer oportunidade de formação pós-doutoral no exterior e maior visibilidade internacional à produção científica e tecnológica brasileira; ampliar o potencial de colaboração conjunta entre pesquisadores que atuam no Brasil e no exterior; ampliar o acesso de pesquisadores brasileiros a centros internacionais de excelência e possibilitar o desenvolvimento de centros de ensino e pesquisa brasileiros com o posterior retorno do bolsista.', 'Bolsa (US$ 2.100,00 ou € 2.100,00), seguro saúde e auxílios.', 'O candidato deve ser brasileiro ou estrangeiro com visto permanente no Brasil; possuir o título de Doutor quando da inscrição neste Edital e propor projeto de estudos dentro das áreas temáticas.', '', '', 'Pesquisa e Desenvolvimento Agronômico e de Fármacos', '', '', '', '', 'O candidato deverá preencher o formulário de inscrição disponível na página da CAPES.', '', 'A', '', '', 'http://capes.gov.br/bolsas/bolsas-no-exterior/pesquisa-pos-doutoral-no-exterior/programa-estagio-pos-doutoral-bayer', 0, 'Observatório', 20150209, '', 'francine.zucco', 'Últimas semanas: Programa Estágio Pós-Doutoral Bayer 2015 - 01/2015', '1', 0),
(131, 'Powering Agriculture: An Energy Grand Challenge for Development (PAEGC) - Second Global Innovation Call', 20150126, '00070', 'us_EN', '2015', 20150212, 19000101, 19000101, 'The objective of PAEGC is to support new and sustainable approaches to accelerate the development and deployment of Clean Energy Solutions (CES) 5 for increasing agriculture productivity and/or value in developing countries.', 'Funding Window 1 – Clean Energy Solution Design: up to $500,000 USD; <br>Funding Window 2 – Clean Energy Solutions Scale-up/Commercial Growth: up to $2,000,000 USD', 'Demonstrate cost-sharing either through direct funding, beneficiary contributions, in-kind assistance, or a combination thereof.', '', '', 'Clean Energy Solution/Agriculture', '', '', '', '', 'All Concept Notes and Full Proposals (if requested) and supporting documentation from Applicants will be submitted through the PAEGC Online Application Platform (OAP) found at: http://poweringag.org/call-innovations', '', 'A', '', '', 'http://www.grants.gov/web/grants/search-grants.html?keywords=AID-SOL-OAA-00005', 0, 'Observatório', 20150115, '', 'francine.zucco', 'Oportunidade de recursos do USAID em energias limpas', '2', 0),
(135, '<br>TFI Institutional Grants', 20150126, '00072', 'us_EN', '2015', 20150301, 19000101, 19000101, 'The Foundation’s Institutional Grants program has as its goal the creation of effective policy changes to improve the lives of Latin Americans.', '', '1. The project/program for which funding is sought must be geographically focused on Latin America. <br>2. The Foundation encourages collaboration among organizations in the United States and Latin America and prefers to fund those institutions that are actively engaged with external stakeholders in addressing an issue of concern.', 'tinker@tinker.org', '', '1. Democratic Governance; <br>2. Education; <br>3. Sustainable Resource Management; <br>4. U.S. Policy toward Latin America; <br>5. Antarctica Science and Policy.', '', '', '', '', 'Potential applicants are encouraged to submit a brief letter of inquiry before the deadline (01/03 for full project).', '', 'A', '', '', 'http://www.tinker.org/content/institutional-grants-overview', 0, 'Observatório', 20150120, '', 'francine.zucco', 'Tinker Foundation Incorporated (TFI) Institutional Grants', '2', 0),
(137, 'The William & Flora Hewlett Foundation - Energy and Climate Grants', 20150126, '00074', 'us_EN', '2015', 19000101, 19000101, 19000101, 'The goal is to To ensure that energy is produced and used cleanly and efficiently, with limited impacts on human health and the environment, and that global average temperatures increase less than 2°C to avoid the worst effects of climate change.', '', '', '', '', 'Clean power, Clean transportation and Building broad support', '', '', '', '', 'Completing the Letter of Inquiry Application is the first step in requesting funding from the Foundation. Letters of Inquiry are accepted at any time.', '', '!', '', '', 'http://www.hewlett.org/programs/environment/energy-and-climate', 0, 'Observatório', 20150130, '', 'francine.zucco', '', '2', 0),
(134, 'Programa Geral de Cooperação Internacional (PGCI) 2015', 20150126, 'CAPES', 'pt_BR', '2015', 20150430, 19000101, 19000101, 'Apoiar projetos conjuntos de pesquisa e parcerias universitárias entre Instituições de Ensino Superior do Brasil e de países que promovam a formação em nível de pós-graduação (doutorado sanduíche e pós-doutorado), situadas em países com os quais o Brasil possui acordos internacionais, mas a Capes não possui acordo específico, e o aperfeiçoamento de docentes e pesquisadores.', 'Missões de trabalho e de estudo; custeio; seminários e workshops; bolsas de estudo em nível de doutorado-sanduíche e pós-doutorado.', '1. A coordenação do projeto estará a cargo de docente com título de doutor e vinculado a um PPG recomendado pela Capes; <br>2. A equipe do Brasil deverá ser composta de pelo menos dois doutores, além do Coordenador e com comprovada capacidade técnico-científica para o desenvolvimento do\r\nprojeto; <br>3. A proposta deverá ter caráter inovador, considerando inclusive o desenvolvimento da área no contexto nacional e internacional, e explicitando as vantagens da parceria.', 'cgci@capes.gov.br', '', 'Diversas áreas do conhecimento', '', '', '', '', '1º cronograma de inscrições até 30/04. As inscrições serão gratuitas e feitas exclusivamente on-line, mediante o preenchimento do formulário de inscrição.', '', 'A', '', '', 'http://www.capes.gov.br/cooperacao-internacional/multinacional/programa-geral-de-cooperacao-internacional', 0, 'Observatório', 20150120, '', 'francine.zucco', '', '3', 0),
(138, '<br>Research Project Grants', 20150127, '00075', 'us_EN', '2015', 19000101, 19000101, 19000101, 'The aim of these awards is to provide financial support for innovative and original research projects of high quality and potential, the choice of theme and the design of the research lying entirely with the applicant (the Principal Investigator). The grants provide support for the salaries of research staff engaged on the project, plus associated costs directly related to the research proposed, and the award is paid directly to the institution at which the applicant is employed.', 'Offering up to £500,000 over five years for research on a topic of the applicant’s choice. Grants cover salary and research costs directly associated with the project.', 'Eligible applicants will already be employed by the eligible institution or be an academic who has maintained close links with that institution following retirement. <br>The Trust does not fund: <br>1. Research which is of direct relevance to clinicians, medical professionals and/or the pharmaceutical industry; <br>2. Policy-driven research where the principal objective is to assemble an evidence base for immediate policy initiatives; <br>3. Research of which advocacy forms an explicit component; <br>4. Research which is aimed principally at an immediate commercial application; <br>5. Applications in which the main focus is on capacity building, networking, or the development of the skills of those involved.', 'mdillnutt@leverhulme.ac.uk', '', '', '', '', '', '', 'There are no deadlines for Outline Applications (first step), and their assessment is normally completed within three months.', '', 'A', '', '', 'http://www.leverhulme.ac.uk/funding/RPG/RPG.cfm', 0, 'Observatório', 20150127, '', 'francine.zucco', 'The Leverhulme Trust - Research Project Grants', '2', 0),
(140, 'Masdar Institute Scholarships - <br>Msc. and Ph.D.', 20150126, '00077', 'us_EN', '2015', 20150531, 19000101, 19000101, 'There are five categories of scholarships available to applicants of Masdar Institute – the Masdar Institute Scholarship, BP Innovation Scholarship, IRENA Scholarship, Toyota Scholarship and ICT Fund Scholarship. <br>Masdar Institute of Science and Technology is the world’s first graduate-level university dedicated to providing real-world solutions to issues of sustainability, and was created in collaboration with MIT.', 'Monthly stipend, housing, annual return ticket, a laptop.', '1. Relevant (undergrad and/or Master´s) degree in the field; <br>2. Minimum GRE Quantitative score of 155; <br>3. Minimum TOEFL score of 91 or 6.5 at IELTS.', 'info@masdar.ac.ae', '', 'Science, Engineering and Information Technology', '', '', '', '', 'Applicants are required to fill in the online application form and submit the required documents.', '', 'A', '', '', 'https://www.masdar.ac.ae/admissions/scholarships', 0, 'Observatório', 20150121, '', 'francine.zucco', 'Oportunidade de bolsas de mestrado e doutorado no Masdar Institute/Abu Dhabi', '1', 0),
(141, '<br>Erasmus Mundus iBrasil', 20150126, '00078', 'pt_BR', '2015', 20150208, 20150206, 19000101, 'O Projeto IBRASIL é um consórcio Erasmus Mundus Ação 2 financiado pela Comissão Europeia, coordenado pela Université de Lille3 (França) e co-coordenado pela UNESP - Universidade Estadual Paulista (Brasil). Serão concedidas bolsas a brasileiros para mobilidade de créditos e de formação nas Instituições de Educação Superior Europeias membros da rede IBRASIL.  ', 'Bolsas para graduação, doutorado integral e sanduíche, pós-doc e professor/colaborador visitante. O auxílio  inclui as despesas de deslocamento, seguro e mensalidade.', 'Verificar eligibilidade para cada tipo de bolsa no <A HREF=http://www.pucpr.br/intercambio/noticia.php?ref=12751&id=2015-01-13_55563> edital da PUCPR</A>', '', '', 'Engenharia, Tecnologia e Educação e Treinamento de Professores.', '', '', '', '', 'A ficha de inscrição deve ser entregue no Núcleo de Intercâmbio (térreo do prédio administrativo da PUC) até o dia 06/02/2015. As inscrições online devem ser feitas até 08/02/2015 no site  http://ibrasilmundus.eu', 'Graduação: intercambio@pucpr.br; <br>Pós-Graduação: leonardo.peroni@pucpr.br', '!', '', '', 'http://www.pucpr.br/intercambio/noticia.php?ref=12751&id=2015-01-13_55563', 0, 'Observatório', 20150116, '', 'francine.zucco', 'Inscrições prorrogadas para o Erasmus Mundus iBrasil - 06/02', '1', 0),
(142, '<br>Brazil Visiting Fellows Scheme 2014/15', 20150126, '00079', 'us_EN', '2014/15', 20150213, 19000101, 19000101, 'The Scheme will provide early career university lecturers or post-doctoral researchers currently working at recognized universities in Brazil the opportunity to spend three months at the University of Birmingham carrying out identified research projects. <br>The aim is to support the professional development of early career researchers at Brazilian universities; enable visiting fellows to obtain insight into the organisation and conduct of research, training and administration at Birmingham University; promote research collaboration between leading groups in Birmingham and Brazil through projects undertaken initially in the UK and to support partnership development and collaboration between the University of Birmingham and institutions in Brazil.', 'Travel expenses of up to £850 and a monthly stipend of £1200 for three months to help cover living expenses and accommodation.', '', 'm.flemingfroy@bham.ac.uk', '', 'Any subject area', '', '', '', '', 'Once completed the application form available at the web site, send it to Dr. Marion Fleming-Froy, Brazil Visiting Fellowship Scheme, International Relations, University of Birmingham, B15 2TT, UK. E-mail: m.flemingfroy@bham.ac.uk', '', 'A', '', '', 'http://www.birmingham.ac.uk/International/global-engagement/brazil/dvfs.aspx', 0, 'Observatório', 20150116, '', 'francine.zucco', 'University of Birmingham/Brazil Visiting Fellows Scheme', '1', 0),
(143, '12º Prêmio Destaque na Iniciação Científica e Tecnológica 2014', 20150126, 'CNPq', 'pt_BR', '2014', 20150330, 19000101, 19000101, 'Premiar bolsistas de Iniciação Científica e Tecnológica do CNPq que se destacaram durante o ano, sob os aspectos de relevância e qualidade do seu relatório final, e as instituições participantes do Programa Institucional de Bolsas de Iniciação Científica (PIBIC) que contribuíram de forma relevante para o alcance dos objetivos do Programa.', 'R$ 42 mil em espécie, participação na SBPC 2015 e R$ 216 mil em bolsas de mestrado.', '1. Bolsista de Iniciação Científica: bolsistas PIBIC, PIBIC-Af e de quotas de pesquisador com pelo menos 12 meses de bolsa e que estejam em processo de continuidade; <br>2. Bolsista de Iniciação Tecnológica: bolsistas PIBITI e ITI com pelo menos 12 meses de bolsa e que estejam em processo de continuidade.', 'pict@cnpq.br', '', '1. Ciências Exatas, da Terra e Engenharias; <br>2. Ciências da Vida; <br>3. Ciências Humanas e Sociais, Letras e Artes.', '', '', '', '', 'As indicações dos bolsistas deverão ser encaminhadas pelo e-mail pict@cnpq.br com a documentação em arquivo único no formato PDF: formulário de indicação, histórico escolar, relatório final e carta de recomendação.', '', '!', '', '', 'http://www.destaqueict.cnpq.br/', 0, 'Observatório', 20150120, '', 'francine.zucco', '', '4', 0),
(144, '<br>TWAS-Celso Furtado Prize in Social Sciences', 20150126, '00080', 'us_EN', '2015', 19000101, 20150228, 19000101, 'With funding from the Brazilian Government for four years, the prize will recognize social scientists who have been living and working in a developing country for at least ten years. <br>The TWAS-Celso Furtado Prize is named after the renowned Brazilian economist, Celso Monteiro Furtado (1920-2004). Furtado´s research focused on the plight of the poor in Brazil and throughout South America.', 'Prize of US$15,000.', '1. Candidates for the TWAS-Celso Furtado Prize in Social Sciences must be scientists who have been working and living in a developing country for at least ten years immediately prior to their nomination. They must have made outstanding contributions in both understanding and addressing social sciences disciplines such as economics, political sciences and sociology; <br>2. Members of TWAS and candidates for TWAS membership are not eligible for the prize; <br>3. Self-nominations will not be considered.', 'prizes@twas.org', '', 'Social Sciences', '', '', '', '', 'Nominations must be made on the nomination form and clearly state the contribution the candidate has made to the development of the social sciences, and must be submitted to the address provided at the web site. Nominations arriving later will be considered in the following year.', '', 'A', '', '', 'http://twas.org/opportunity/twas-celso-furtado-prize-social-sciences', 0, 'Observatório', 20150121, '', 'francine.zucco', '', '4', 0),
(145, '<br>TWAS 2015 Prizes', 20150126, '00080', 'us_EN', '2015', 20150228, 19000101, 19000101, 'Every year, TWAS awards eight prizes of USD15,000 each in the following fields: agricultural sciences, biology, chemistry, earth sciences, engineering sciences, mathematics, medical sciences and physics.', 'Prize of US$15,000', 'Members of TWAS and candidates for TWAS membership are not eligible for TWAS Prizes. <br>Self-nominations will not be considered.<br>Candidates for a TWAS Prize must be scientists who have been working and living in a developing country for at least ten years immediately prior to their nomination. They must meet at least one of the following qualifications: <br>1. Scientific research achievement of outstanding significance for the development of scientific thought; <br>2. Outstanding contribution to the application of science and technology to industry or to human well-being in a developing country.', 'prizes@twas.org', '', 'Agricultural Sciences, Biology, Chemistry, Earth Sciences, Engineering Sciences, Mathematics, Medical Sciences and Physics', '', '', '', '', 'Nominations must be made on the nomination form and clearly state the contribution the candidate has made to the development of the social sciences, and must be submitted either to the address provided at the web site or eletronically. Nominations arriving later will be considered in the following year.', '', 'A', '', '', 'http://twas.org/opportunity/twas-2015-prizes', 0, 'Observatório', 20150121, '', 'francine.zucco', '', '4', 0),
(147, '<br>Newton International Fellowships', 20150126, '00048', 'us_EN', '2015', 20150225, 19000101, 19000101, 'The Newton International Fellowships Scheme is delivered by the British Academy, the Royal Society and the Academy of Medical Sciences. The Scheme has been established to select the very best early stage post-doctoral researchers from all over the world and enable them to work at UK research institutions for a period of two years.', '£24,000 per annum for subsistence costs, up to £8,000 per annum research expenses, as well as a one-off payment of up to £2,000 for relocation expenses.', 'The applicant must: <br>1. have a PhD, or be at the final stages of it; <br>2. hold a permanent position; <br>3. not hold UK citizenship; <br>4. be competent in oral and written English; <br>5. have a clearly defined and mutually-beneficial research proposal agreed with a UK host researcher; and <br>6. applicants should have no more than 7 years of active full time postdoctoral experience at the time of application.', 'info@newtonfellowships.org', '', 'Physical, Natural and Social Sciences, and the Humanities.', '', '', '', '', 'The application must be submitted via e-GAP - https://e-gap.royalsociety.org/', '', 'A', '', '', 'http://www.britac.ac.uk/funding/guide/intl/newton_international_fellowships.cfm', 0, 'Observatório', 20150126, '', 'francine.zucco', '', '1', 0),
(51, 'Últimos dias: terceiro calendário do Programa de Apoio à Organização de Eventos F A', 20150126, 'FA', 'pt_BR', 'Chamada 15/2014', 20150131, 20150206, 19000101, 'Conceder apoio financeiro às associações ou sociedades técnico-científicas ou institutos de pesquisa, de natureza pública ou privada, sem fins lucrativos e de utilidade pública estadual, com sede e CNPJ do Estado do Paraná, na organização de eventos relacionados com ciência e tecnologia, nas diversas áreas de conhecimento, destinados ao intercâmbio de experiências entre pesquisadores e a divulgação dos resultados de seus trabalhos, cuja realização ocorra no âmbito estadual no período de junho a setembro de 2015.', 'Abrangência: <br>-Estadual: entre R$ 5 e 15 mil; <br>-Nacional: entre R$ 10 e 30 mil; <br>-Internacional: entre R$ 15 e 45 mil.', '-Projetos em parceria com associação ou sociedade técnico-científica; <br>-evento no âmbito estadual no período de junho a setembro de 2015.', '', '', '', '', '', '', '', 'A proposta deverá ser enviada à Fundação Araucária pelo coordenador, através do SigAraucária disponível em www.fappr.pr.gov.br e a documentação impressa encaminhada.', '', 'A', '', '', 'http://www.fappr.pr.gov.br/arquivos/File/chamadas2014/CP15_2014_Eventos.pdf', 0, 'Observatório', 20150121, '', 'francine.zucco', 'Últimos dias: recursos para organização de eventos (junho a setembro/2015) - FA', '5', 0),
(146, 'Innovative Measures of Oral Medication Adherence for HIV Treatment and Prevention (R01)', 20150126, '00058', 'us_EN', 'PAR-14-193', 20150325, 19000101, 19000101, 'The purpose of this Funding Opportunity Announcement (FOA) is to solicit innovative research applications that seek to advance the development of bioanalytical assays, pill ingestion sensors, drug metabolite and taggant detection systems, or wireless technologic approaches for monitoring and improving adherence to oral antiretroviral therapy (ART) and pre-exposure prophylaxis (PrEP).', 'Application budgets are not limited but need to reflect the actual needs of the proposed project.', 'Any individual(s) with the skills, knowledge, and resources necessary to carry out the proposed research as the Program Director(s)/Principal Investigator(s) (PD(s)/PI(s)) is invited to work with his/her organization to develop an application for support. Must have/create an eRA Commons account.', 'pjackson@niaid.nih.gov', '', 'HIV Treatment and Prevention', '', '', '', '', 'Although a letter of intent is not required, it is recommended (until 25/02). For submission, all instructions in the SF424 (R&R) Application Guide must be followed.', '', 'A', '', '', 'http://grants.nih.gov/grants/guide/rfa-files/RFA-AI-14-071.html', 0, 'Observatório', 20150123, '', 'francine.zucco', 'Recursos NIH (EUA) para pesquisa em HIV', '2', 0),
(139, '<br>Leibniz – DAAD Research Fellowships 2015', 20150126, '00076', 'us_EN', '2015', 19000101, 20150316, 19000101, 'The Leibniz – DAAD Research Fellowship programme is jointly carried out by the Leibniz Association (Wissenschaftsgemeinschaft Gottfried Wilhelm Leibniz e.V.) and the German Academic Exchange Service (DAAD). Leibniz-DAAD fellowships offer highly-qualified, international postdoctoral researchers, who have recently completed their doctoral studies, the opportunity to conduct research at a Leibniz Institute of their choice in Germany.', 'Fellowship (€2,000 per month), 2-months German course.', 'Applicants must neither hold German nationality nor have resided in Germany for more than six months; should be able to prove their outstanding academic or research achievements and must have completed their studies with a PhD or equivalent qualification (no more than two years should have passed since graduation) and have excellent knowledge of English.', 'behrsing@daad.de', '', 'Section A. Humanities and Educational Research; <br>Section B. Economics, Social Sciences and Spatial Research; <br>Section C. Life Sciences; <br>Section D. Mathematics, Natural Sciences and Engineering; <br>Section E. Environmental Sciences.', '', '', '', '', 'The complete application must be sent to the DAAD head office in Bonn/Germany.', '', 'A', '', '', 'https://www.daad.org/leibnizdaad', 0, 'Observatório', 20150119, '', 'francine.zucco', '', '1', 0),
(136, 'GrOW Call for proposals: Effects of patterns of growth on women’s economic empowerment', 20150126, '00073', 'us_EN', '2015', 20150223, 19000101, 19000101, 'This call aims to investigate the effect that specific patterns of growth have on women’s economic empowerment. Research also aims to determine which public policies and interventions can ensure that the positive effects of growth on women’s empowerment are enhanced and the negative effects minimized.', 'Up to CA$300,000.', '1. Research focused on a single country or economic context will not be accepted; <br>2. Research consortia comprised of multiple institutional partners may apply; however, one partner must be designated as the lead institution; <br>3. Preference will be given to applications that propose a set of projects covering a wide spectrum of the broader research questions described in the call document and that analyze policies that can enhance positive impacts of growth patterns on women’s economic empowerment.', 'grow@idrc.ca', '', 'Growth and Economic Opportunities for Women (GrOW) program on the effect of specific patterns of growth on women’s economic empowerment.', '', '', '', '', 'This call is the first step of two stages in the selection process for the funding of a proposal. To apply, complete and submit the online application.', '', 'A', '', '', 'http://www.idrc.ca/EN/Funding/Competitions/Pages/CompetitionDetails.aspx?CompetitionID=87', 0, 'Observatório', 20150119, '', 'francine.zucco', '', '2', 0),
(130, '<br>ENS International Selection Scholarships', 20150126, '00069', 'us_EN', '2015/16', 20150210, 19000101, 19000101, 'Each year, École Normale Supérieure (ENS) organizes an international selection allowing the most promising international students, either in Science or in Humanities, to follow a two or three-year Masters Degree at the University.', 'A monthly stipend of  1,000 Euros', '1. Candidates must be aged no more than 24 on the date of registration; <br>2. Candidates must declare that they have not lived in France more than 5 months during the academic year of the selection nor the previous year; <br>3.  Candidates must show proof of a diploma or certification awarded by a foreign university,which indicates that the candidate has completed at least one year of undergraduate studies.', 'ens-international@ens.fr', '', 'Selected Masters Courses in Science or Humanities ', '', '', '', '', 'Online applications are open until 10 February 2015. Candidates whose applications are selected may be asked to go to Paris for written and oral examinations in July/2015.', '', 'A', '', '', 'http://www.ens.fr/admission/selection-internationale/?lang=en', 0, 'Observatório', 20141223, '', 'francine.zucco', 'Oportunidade de Mestrado na École Normale Supérieure (ENS)', '1', 0),
(148, 'Movilidad de Profesores e Investigadores Brasil-España', 20150126, 'fc01', 'us_EN', 'C.2015', 20150409, 20150409, 20150731, 'Las becas de movilidad de profesores e investigadores de universidades brasileñas y españolas tienen como objetivo promover la cooperación cultural y científica entre Brasil y España. La Fundación Carolina convoca estas becas en colaboración con la Junta de Andalucía, la Universidad de Málaga, la Universidad de Sevilla,  ,la Universidad de Cádiz,  la Universidad Politécnica de Madrid  y la Universitat Rovira i Virgili.', 'Pasaje aéreo de ida y vuelta en clase turista. (Se especificaran en el comunicado de concesión las ciudades de partida/llegada de Brasil. Fundación Carolina  no cubre los traslados internos )\r\nSeguro médico, no farmacéutico\r\n1.200 € mensuales en concepto de alojamiento y manutención.', 'Candidato brasileño:\r\na. Ser nacional de Brasil\r\nb. Ser graduado universitario de carreras de no menos de cuatro años de duración y haber obtenido el grado equivalente a licenciado.\r\nc. Ser docente universitario, preferentemente a tiempo completo, investigador o estudiante de doctorado en fase de investigación, en una universidad u organismo de investigación brasileños reconocido por CAPES.\r\nd. Disponer de un currículum académico o profesional de excelencia.\r\ne. Haber obtenido previamente la aceptación de una de las siguientes instituciones: alguna de las universidades  u organismo de investigación de las universidades   públicas :  de la Junta de Andalucia, la Universidad de Málaga, la Universidad de Sevilla, la Universidad de Cádiz, la Universidad Politécnica de Madrid  y la Universitat Rovira i Virgili. \r\n f. No ser residente en España.', 'FORMACIONPERMANENTEBRASIL_2015@fundacioncarolina.es', '', '', '', '', '', '', 'http://gestion.fundacioncarolina.es/candidato/becas/ficha/ficha.asp?Id_Programa=3695', 'pdi@pucpr.br', 'A', '', '', 'http://gestion.fundacioncarolina.es/candidato/becas/ficha/ficha.asp?Id_Programa=3695', 0, 'Observatório', 20150126, '', 'jeferson.vieira', 'Movilidad de Profesores e Investigadores Brasil-España', '1', 0),
(149, '<br>Escola de Altos Estudos (EAE) - 04/2015', 20150130, 'CAPES', 'pt_BR', '04/2015', 20150430, 19000101, 19000101, 'A Escola de Altos Estudos tem por objetivo apoiar os Programas de Pós-Graduação de Instituições de Ensino Superior federais, estaduais, confessionais e comunitárias, por meio do fomento à cooperação acadêmica e do intercâmbio acadêmico internacional. Esse apoio se dará por meio da oferta de cursos monográficos intensivos de alto nível, ministrados por docentes e pesquisadores radicados no exterior de elevado conceito internacional.', 'Até R$150.000,00', '1. Poderão apresentar projetos no âmbito da Escola de Altos Estudos, Programas de Pós-Graduação stricto sensu, avaliados e reconhecidos pela CAPES; <br>2. A Escola de Altos Estudos poderá ser ministrada por um ou mais professores convidados; <br>3. A proposta deverá prever a permanência de cada professor convidado por até 30 (trinta) dias ininterruptos.', 'altosestudos@capes.gov.br', '', 'Diversas áreas do conhecimento', '', '', '', '', 'As inscrições devem ser efetuadas por meio de preenchimento de formulário e do envio de documentos relacionados no edital dentro dos prazos estabelecidos no calendário abaixo.', '', 'A', '', '', 'http://www.capes.gov.br/cooperacao-internacional/multinacional/escola-de-altos-estudos', 0, 'Observatório', 20150130, '', 'francine.zucco', '', '3', 0),
(150, 'Programa de Licenciaturas Internacionais (PLI) com a França', 20150127, 'CAPES', 'pt_BR', '2015', 20150304, 19000101, 19000101, 'O programa tem como objetivo diversificar o currículo dos cursos de licenciatura brasileiros, tendo como prioridade o aperfeiçoamento e a valorização da formação de professores para a educação básica, além de ampliar as oportunidades de formação de licenciandos por meio da realização de graduação sanduíche, com possibilidade de obtenção de diploma francês.', 'Missões de trabalho e de estudo', '1. A equipe brasileira do projeto deverá ser composta de no mínimo 2 (dois) Doutores, sendo a coordenação brasileira exercida por docente brasileiro com título de Doutor obtido há pelo menos 5 (cinco) anos; <br>2. Todos os membros da equipe deverão estar vinculados aos cursos de Licenciatura relacionados ao projeto.', 'plifr@capes.gov.br', '', 'Licenciatura em Letras, Biologia, Matemática, Física e Química', '', '', '', '', 'As inscrições serão admitidas exclusivamente pela internet, mediante o preenchimento doformulário de inscrição.', '', 'A', '', '', 'http://www.capes.gov.br/cooperacao-internacional/multinacional/licenciaturas-internacionais/licenciaturas-internacionais-franca', 0, 'Observatório', 20150127, '', 'francine.zucco', '', '3', 0),
(151, 'CP IPEA/PNPD Nº 003/2015 - Bolsa em Economia', 20150128, '00071', 'pt_BR', '003/2015', 20150205, 19000101, 19000101, 'A presente Chamada tem por objetivo selecionar interessados, para concessão de bolsa pesquisa para o  Projeto “ Acompanhamento e Análise das Finanças Públicas em Alta Frequência”.', '', '1. Possuir graduação na área de Economia; <br>2. Ter disponibilidade para execução de atividade inerentes ao projeto de pesquisa, nas instalações do IPEA/Brasília; <br>3. Ter domínio do pacote Office e noções de base de dados; <br>4. Não ter recebido bolsa IPEA por 12 meses ou mais.', 'pnpd@ipea.gov.br', '', 'Economia', '', '', '', '', 'A solicitação deve ser apresentada, pelo candidato, mediante o cadastramento de seus dados no Sistema de Cadastro de Bolsista, disponível na página do IPEA www.ipea.gov.br', '', 'A', '', '', 'http://www.ipea.gov.br/portal/index.php?option=com_content&view=article&id=24367&catid=117&Itemid=5', 0, 'Observatório', 20150128, '', 'francine.zucco', '', '1', 0),
(153, '28º Prêmio Paranaense de Ciência e Tecnologia', 20150202, 'SETI', 'pt_BR', '28 - 2014', 20150415, 19000101, 19000101, 'O prêmio de C&T cresceu e se consolidou como uma das ações da SETI e tem como objetivo valorizar a trajetória e a produção científica de grandes pesquisadores que atuam no Paraná, bem como de jovens talentosos que escolheram a ciência como um projeto profissional e de vida.', 'Prêmio em dinheiro', 'Categorias: <br>1. Professor-pesquisador; <br>2. Pesquisador-extensionista; <br>3. Graduandos; <br>4. Inventor independente; <br>5. Jornalista Científico.', '', '', 'Engenharias e Ciências Biológicas', '', '', '', '', 'O candidato deverá encaminhar os documentos solicitados para o endereço eletrônico premiocet@seti.pr.gov.br', '', 'A', '', '', 'http://www.seti.pr.gov.br/modules/conteudo/conteudo.php?conteudo=261', 0, 'Observatório', 20150202, '1', 'francine.zucco', '28º Prêmio Paranaense de Ciência e Tecnologia', '4', 0),
(152, 'Programa CAPES/TAMU - Projeto Conjunto de Pesquisa', 20150129, 'CAPES', 'pt_BR', '02/2015', 20150303, 19000101, 19000101, 'Apoiar o desenvolvimento de projetos conjuntos de pesquisa e fomentar a mobilidade de pesquisadores e de estudantes de doutorado e pós-doutorado, em todas as áreas do conhecimento, visando ao desenvolvimento de núcleos de pesquisa transnacionais entre instituições do Brasil e da Universidade Texas A&M, nos Estados Unidos.', 'Missões de trabalho e de estudo, custeio de até R$ 10.000,00', '1. A coordenação do projeto estará a cargo de docente com título de doutor e vinculado a um PPG recomendado pela Capes; <br>2. A equipe do Brasil deverá ser composta de pelo menos dois doutores, além do Coordenador e com comprovada capacidade técnico-científica para o desenvolvimento do projeto; <br>3. A proposta deverá ter caráter inovador, considerando inclusive o desenvolvimento da área no contexto nacional e internacional, e explicitando as vantagens da parceria.', 'tamu@capes.gov.br', '', 'Diversas áreas do conhecimento', '', '', '', '', 'Embora não seja lançado edital específico para o Programa CAPES/TAMU em 2015, serão recebidos pedidos de apoio a projetos com grupos americanos financiados pela Universidade Texas A&M por meio do edital PGCI, mas com cronograma específico - até 03/03.', '', 'A', '', '', 'http://www.capes.gov.br/cooperacao-internacional/estados-unidos/programa-tamu', 0, 'Observatório', 20150129, '', 'francine.zucco', '', '3', 0),
(154, 'Projeto “Dimensionamento da força e trabalho e interiorização do ministério público” - 008/2015', 20150205, '00071', 'pt_BR', '008/2015', 20150213, 19000101, 19000101, 'A presente Chamada tem por objetivo selecionar interessados, para concessão de bolsa pesquisa, que atendam aos requisitos do Termo de Referência constante no Anexo I e no regulamento desta Chamada, em realizar atividades no âmbito do projeto: “Dimensionamento da Força de trabalho e Interiorização do Ministério Público do Trabalho”.', 'Bolsas', '1. Assistente de Pesquisa II (Mestrando); <br>2. Assistente de Pesquisa III (Mestre); <br>3. Bolsa de Incentivo a Pesquisa I (Graduado); <br>4. Doutor I.', 'pnpd@ipea.gov.br', '', 'Diversas áreas do conhecimento', '', '', '', '', 'A solicitação deve ser apresentada, pelo candidato, mediante o cadastramento de seus dados no Sistema de Cadastro de Bolsista, disponível na página do IPEA www.ipea.gov.br, mediante a seleção do projeto de interesse', '', 'A', '', '', 'http://www.ipea.gov.br/portal/index.php?option=com_content&view=article&id=24408&catid=117&Itemid=5', 0, 'Observatório', 20150205, '', 'francine.zucco', 'Bolsa IPEA  em Dimensionamento da força e trabalho e interiorização do ministério público', '1', 0),
(155, 'Programa de Apoio a Ações de Conservação', 20150206, '00033', 'pt_BR', '2015', 20150331, 19000101, 19000101, 'Investir em projetos de conservação da biodiversidade, a médio e longo prazos, é uma das principais estratégias para garantir o bem-estar social desta e das futuras gerações. Por essa razão, a Fundação Boticário mantem há mais de 20 anos um programa de apoio a iniciativas de conservação da natureza no país, contribuindo para o desenvolvimento científico, aplicação prática e divulgação do conhecimento gerado, ampliando o engajamento em prol da necessidade de conservação de nossos ambientes naturais.', 'Podem ser apoiados recursos para materiais de consumo, materiais permanentes, despesas com viagens (transporte, hospedagem, alimentação, pedágio), despesas com terceiros (serviços pontuais ao projeto) e despesas com pessoal (remuneração para membros da equipe executora). <br>Bolsas somente para alunos de graduação. <br>Materiais importados poderão ser vetados.', 'Os editais de apoio a projetos da Fundação Grupo Boticário são destinados somente a pessoas jurídicas sem fins lucrativos, como organizações não governamentais ou fundações e associações.', 'edital@fundacaogrupoboticario.org.br', '', 'Linhas temáticas: <br>1. Unidades de Conservação de Proteção Integral e RPPNs: criação e ampliação de UCs e execução de seus Planos de Manejo; <br>2. Espécies Ameaçadas: execução de Planos de Ação Nacionais (PAN), ações emergenciais para proteção e definição de status de ameaça de espécies nativas; <br>3. Ambientes Marinhos: estudos, proteção e redução das pressões sobre a biodiversidade marinha.', '', '', '', '', 'A inscrição deverá ser feita via formulário online.', '', 'A', '', '', 'http://www.fundacaogrupoboticario.org.br/pt/o-que-fazemos/editais/pages/apoio-projetos-linhas.aspx', 0, 'Observatório', 20150206, '', 'francine.zucco', 'Fundação Grupo Boticário: Programa de Apoio a Ações de Conservação', '2', 0);
INSERT INTO `fomento_editais` (`id_ed`, `ed_titulo`, `ed_data`, `ed_agencia`, `ed_idioma`, `ed_chamada`, `ed_data_1`, `ed_data_2`, `ed_data_3`, `ed_texto_1`, `ed_texto_2`, `ed_texto_3`, `ed_texto_4`, `ed_texto_5`, `ed_texto_6`, `ed_texto_7`, `ed_texto_8`, `ed_texto_9`, `ed_texto_10`, `ed_texto_11`, `ed_texto_12`, `ed_status`, `ed_autor`, `ed_corpo`, `ed_url_externa`, `ed_total_visualizacoes`, `ed_local`, `ed_data_envio`, `ed_document_require`, `ed_login`, `ed_titulo_email`, `ed_edital_tipo`, `ed_fluxo_continuo`) VALUES
(156, '<br>Newton Advanced Fellowships', 20150209, '00048', 'us_EN', '2015', 20150318, 19000101, 19000101, 'Newton Advanced Fellowships provide early to mid-career international researchers who already have a track record with an opportunity to develop their research strengths and capabilities, and those of their group or network, through training, collaboration and visits with a partner in the UK.', 'Each award provides up to £37,000 per year: salary for the applicant, research support, travel and subsistence, training.', '1. Applicants must have a PhD or equivalent research experience and hold a permanent or fixed-term contract in an eligible university or research institute in a partner country, which must span the duration of the project; <br>2. Collaborations should focus on a single project involving the overseas-based researcher (“the Applicant”) and a UK-based researcher (“the Co-applicant”); <br>3. Applicants should have not more than 15 years postdoctoral research experience.', 'newtonfund@britac.ac.uk', '', '<A HREF=https://royalsociety.org/grants/schemes/newton-advanced-fellowships/> 1. Natural Sciences</A> \r\n<br><A HREF=http://www.acmedsci.ac.uk/careers/funding-schemes/newton-advanced-fellowships/> 2. Medical Sciences</A>\r\n<br><A HREF=http://www.britac.ac.uk/funding/guide/newton_advanced_fellowships.cfm?frmAlias=/newton-advanced-fellowships/> 3. Social Sciences and Humanities</A>', '', '', '', '', 'Applications must be submitted online using the British Academy’s electronic Grant Application and Processing (eGAP) system.', '', 'A', '', '', 'https://www.gov.uk/government/publications/newton-fund-building-science-and-innovation-capacity-in-developing-countries/newton-fund-building-science-and-innovation-capacity-in-developing-countries', 0, 'Observatório', 20150209, '', 'francine.zucco', 'Oportunidade Cooperação com UK: Newton Advanced Fellowships', '3', 0),
(157, '2º Prêmio Paulo Freire - Concurso de experiências Inovadoras', 20150210, '00082', 'pt_BR', '2ª/2015', 20150315, 19000101, 19000101, 'O Programa de Apoio ao Setor Educacional do MERCOSUL promove o intercâmbio de experiências e práticas educacionais transformadoras na formação docente da Argentina, do Brasil, do Paraguai e do Uruguai, por meio do Concurso de Experiências Inovadoras na Formação Docente. O objetivo do prêmio é compartilhar as experiências realizadas e estabelecer ações comuns para ampliar o direito à educação e à integração regional.', '', '1. Ter desenvolvido as experiências entre os anos de 2010 e 2013 ou estar atualmente em desenvolvimento há, pelo menos, um ano; <br>2. Estar devidamente documentada com material empírico e depoimentos diretos; <br>3. Contar com resultados identificáveis por parte dos seus responsáveis e seus destinatários; <br>4. Ser apoiada pela instituição que desenvolveu o projeto e/ou a/s instituição/ões destinatária/s.', '', '', 'Seguintes temáticas: <br>1. Práticas inovadoras no percurso da prática profissional ou no âmbito da formação inicial docente; <br>2. Práticas inovadoras de educação para a diversidade.', '', '', '', '', '', '', 'A', '', '', 'http://www.pasem.org/pt/concurso/', 0, 'Observatório', 20150210, '', 'francine.zucco', '2º Prêmio Paulo Freire - Concurso de experiências Inovadoras', '4', 0),
(158, '<br>Newton Mobility Grants', 20150210, '00048', 'us_EN', '2015', 20150318, 19000101, 19000101, 'Newton Mobility Grants are offered under the Newton Fund, which is part of the UK’s Official Development Assistance (ODA) commitment. These grants provide support for international researchers based in a country covered by the Newton Fund to establish and develop collaboration with UK researchers around a specific jointly defined research project. These one-year awards are particularly suited to initiate new collaborative partnerships, between scholars who have not previously worked together, or new initiatives between scholars who have collaborated in the past.', 'Grants are offered up to a maximum of £10,000 for a period of one year.', '1. Both an overseas-based applicant and a UK-based co-applicant are required for this scheme and each must have input into the application. <br>2. Both applicants must have a PhD or equivalent research experience and hold a permanent or fixed-term contract in an eligible university or research institute, which must span the duration of the project.', 'newtonfund@britac.ac.uk', '', 'All disciplines within the social sciences and humanities.', '', '', '', '', 'Applications must be submitted online using the British Academy’s electronic Grant Application and Processing (eGAP) system.', '', 'A', '', '', 'http://www.britac.ac.uk/funding/guide/Newton_Mobility_Grants.cfm?frmAlias=/newton-mobility-grants/', 0, 'Observatório', 20150210, '', 'francine.zucco', 'Oportunidade de cooperação com UK: Newton Mobility Grants', '3', 0),
(159, '4º Prêmio Pemberton - Prêmio Coca-Cola na área de saúde', 20150210, '00083', 'pt_BR', '4º/2015', 20150510, 19000101, 19000101, 'Incentivar e promover pesquisas científicas com foco em bem-estar e nos requisitos para uma vida saudável, tais como os benefícios da alimentação equilibrada, da hidratação e da prática de exercícios físicos. A 4ª edição do Prêmio Pemberton contemplará trabalhos científicos nas áreas de Medicina, Educação Física, Nutrição, Biologia, Engenharia de Alimentos e disciplinas afins.', 'Prêmio em dinheiro e viagem', '1. Poderão se inscrever pesquisadores e profissionais de toda e qualquer área ligada à Saúde e afins e vinculados a uma entidade acadêmica ou instituição de pesquisa; <br>2. O Prêmio não se aplica a estudantes da graduação; <br>3. O trabalho deverá ser inédito e não poderá ter sido publicado na íntegra; <br>4. Não serão aceitos trabalhos ainda não concluídos e trabalhos de revisão bibliográfica; <br>5. Ter sido aprovado pelo comitê de ética da instituição e/ou pela Comissão Nacional de Ética em Pesquisas (CONEP), quando pertinente.', '', '', 'Áreas de saúde e afins em duas categorias: 1. Pesquisa básica e 2. Pesquisa aplicada.', '', '', '', '', 'A inscrição deverá ocorrer somente pelo site www.premiopemberton.com.br por meio de envio do resumo do trabalho e preenchimento obrigatório da ficha de inscrição solicitada durante o cadastro no site. Deverão ser enviados, ainda, por correio, devidamente preenchidos e assinados, o Termo de Responsabilidade do Orientador e o Termo de Cessão de Direitos.', '', 'A', '', '', 'https://www.premiopemberton.com.br/', 0, 'Observatório', 20150210, '', 'francine.zucco', '4º Prêmio Pemberton - Prêmio Coca-Cola na área de saúde', '4', 0),
(160, 'Rapid Ocean Conservation (ROC) Grants Program', 20150219, '00084', 'us_EN', '2015', 19000101, 19000101, 19000101, 'The Rapid Ocean Conservation (ROC) Grants Program provides small grants with a quick turnaround time for solutions to emerging conservation issues. This complements the Waitt Foundation’s existing major grants program and is responsive to conservation opportunities, supports higher-risk ideas at a low financial cost, and engages with small, local NGOs domestically and abroad.', 'Proposals for grants up to $10,000 will be reviewed on a rolling basis. Proposals up to $20,000 will be considered, but granted highly infrequently.', '1. Project must support sustainable fishing and/or MPAs as elaborated in the program focus section; <br>2. Applicants need not hold advanced degrees, but must demonstrate a commensurate level of experience and expertise with respect to the proposed project; <br>3. Applicants must have and maintain legitimate affiliation with an academic institution or NGO for the duration of the grant project; <br>4. Spending of grant funds must commence within 1 month of granting, and be completed within 6 months; <br>5. Funds cannot be used for event sponsorships; <br>6. ROC grants should constitute the sole or primary source of funding for the proposed project.', '', '', 'Scientific Research: natural science or social science projects.', '', '', '', '', 'All applicants must submit a project specific budget along with electronic submission. Applications can be done at any time, no deadline.', '', 'A', '', '', 'http://waittfoundation.org/roc-grants-program', 0, 'Observatório', 20150219, '', 'francine.zucco', 'Rapid Ocean Conservation (ROC) Grants Program', '2', 0),
(161, 'Group and Region-Focused Training in Criminal Justice', 20150210, '00034', 'us_EN', 'J1504425', 19000101, 20150306, 19000101, 'The objective of this program is to give criminal justice personnel in the Asia and Pacific region, and other countries, an opportunity to share experiences, gain knowledge, examine concrete measures and discuss best practices for the criminal justice system regarding investigation, prosecution, adjudication, enforcement and international cooperation. It is also hoped that the participants will create an international network of counterparts.', 'Training, travel and accommodation expenses covered.', 'This program is offered to relatively senior criminal justice officials such as investigators, public prosecutors, or judges who deal with criminal cases.', 'Watanabe.Hajime@jica.go.jp', '', 'The main theme of the program is “The State of Cybercrime: Current Issues and Countermeasures”', '', '', '', '', '', '', 'A', '', '', 'http://www.jica.go.jp/brazil/portuguese/office/courses/index.html', 0, 'Observatório', 20150210, '', 'francine.zucco', 'Group and Region-Focused Training in Criminal Justice', '1', 0),
(162, 'EU-LAC Foundation´s Open Call for Research Projects', 20150211, '00085', 'us_EN', '2015', 20150331, 19000101, 19000101, 'The Open Call is part of the Foundation’s effort to promote mutual knowledge and visibility of the partnership among the European Union, Latin America and the Caribbean. Stimulating debate on issues that are relevant to the EU-LAC agenda enables the Foundation, within its work programme “Explore”, to propose ways of cooperating on these issues in the bi-regional relationship.', 'Up to € 30,000 (gross) - personnel costs and travel expenses.', 'Applicants must: <br>1. Be affiliated with an EU or LAC research institution. In the case of research consortia, a bi-regional composition of the consortium will be valued, although it does not in itself guarantee a favourable decision; <br>2. Propose a research project related to the bi-regional relationship and/or related to biregional cooperation; <br>3. Be able to carry out the project in English or Spanish.', 'info@eulacfoundation.org', '', 'Topics relevant to the relationship between the European Union and Latin America and the Caribbean.', '', '', '', '', 'Applications must be made in English or Spanish and all necessary documentation can be downloaded from the website.', '', 'A', '', '', 'http://eulacfoundation.org/en/opencall', 0, 'Observatório', 20150211, '', 'francine.zucco', 'EU-LAC Foundation´s Open Call for Research Projects', '3', 0),
(163, 'Vice Chancellor’s International Scholarship for Research Excellence', 20150212, '00086', 'us_EN', '2015', 20150506, 19000101, 19000101, 'The Vice-Chancellor’s Scholarships for Research Excellence aim to recognize and reward applications from outstanding international students. In 2015, we are offering international students over 50 full tuition fee scholarships.', 'Full tuition fee coverage. The scholarships are for up to each of 3 years of a research programme subject to satisfactory progress', 'Applicants must be classified as ‘overseas’ for fee purposes and already hold an offer to start a full-time research degree programme, PhD or MPhil, at Nottingham in September or October 2015, any subject area.', '', '', 'Arts, Medicine and Health Sciences, Science, Social Sciences.', '', '', '', '', 'Application for admission to study at Nottingham must be received at least six weeks before the scholarship closing date to allow time for the Admissions office to process the application and confirm your offer, before you can apply for the scholarship.', '', 'A', '', '', 'http://www.nottingham.ac.uk/studywithus/international-applicants/scholarships-fees-and-finance/scholarships/scholarshipdetails/research-overseas.aspx', 0, 'Observatório', 20150212, '', 'francine.zucco', 'Vice Chancellor’s International Scholarship for Research Excellence', '1', 0),
(164, 'VLIR-UOS Training Scholarships for Developing Countries', 20150211, '00087', 'us_EN', '2015', 19000101, 19000101, 19000101, 'VLIR-UOS aims to give young scientists and professionals the opportunity to follow a course in Flanders, in an international environment. The programme aims to exchange knowledge and skills to contribute to the local development of the home countries of the participants and to global development.', 'VLIR-UOS provides full scholarships for the total duration of the training including  allowance of € 32/day, several one-time payments, accommodation, insurance, international travel and tuition fee.', '1. Age: 45 years or less; <br>2. Meet the academic admission criteria set by the university or university college, concerning educational background, language proficiency, etc; <br>3. Have relevant professional experience and a written (future) employer’s statement of (re)integration in an employment where the acquired knowledge and skills will be immediately applicable. The statement should also confirm the added value of the training for the candidate and the organization.', 'ellen.vanhimbergen@vliruos.be', '', 'Training programmes: <br>1. Dairy Nutrition - 1st Mar; <br>2. Technology for Integrated Water Management - 20th Feb; <br>3.  Food Safety, Quality Assurance Systems and Risk Analysis - 1st Mar; <br>4.  Human Rights for Development (‘HR4DEV’) - 15th Mar; <br>5. Road safety in Low and Middle-Income Countries: Challenges and Strategies for Improvement - 12th Apr; <br>6. AudioVisual Learning Materials – Management, Production and Activities (AVLM) - 31st Mar.', '', '', '', '', 'To apply for a scholarship, you first need to apply for the training programme. To apply for a training programme, visit the website of the training programme of your interest.', '', 'A', '', '', 'http://www.vliruos.be/en/project-funding/programdetail/international-training-programme-itp_3958/', 0, 'Observatório', 20150211, '', 'francine.zucco', 'VLIR-UOS Training Scholarships for Developing Countries', '1', 0),
(165, 'Bolsas postdoc Embrapa Agroenergia em Bioprocessos', 20150212, '00088', 'pt_BR', '2015', 20150227, 19000101, 19000101, 'Bolsas de pós-doutorado para atuar em pesquisas com processos fermentativos na produção de biomoléculas a partir de glicerina e obtenção de enzimas a serem aplicadas na síntese de biodiesel. Os selecionados vão desenvolver seu trabalho na sede da Embrapa Agroenergia, em Brasília/DF, com carga horária de 40 horas semanais.', 'Bolsa Capes (R$ 4.100,00).', 'Ter doutorado na área de bioprocessos, de preferência em produção de moléculas via fermentação.', '', '', '1. Produção de polióis por processos fermentativos em biorreatores; <br>2. Produção de biomoléculas (enzimas e polióis) por processos fermentativos e aplicação de enzimas.', '', '', '', '', 'Os interessados devem enviar e-mail até 27/02 para thais.salum@embrapa.br, com o assunto "Bolsa de Pós-doc – bioprocessos". No corpo do e-mail, devem enviar o link para o Currículo Lattes e indicar em qual das áreas deseja atuar.', '', 'A', '', '', 'https://www.embrapa.br/busca-de-noticias/-/noticia/2425303/prorrogadas-inscricoes-para-bolsas-em-bioprocessos', 0, 'Observatório', 20150212, '', 'francine.zucco', 'Bolsas postdoc Embrapa Agroenergia em Bioprocessos', '1', 0),
(166, 'Core Fulbright U.S. Scholar Program - Award # 6455', 20150219, '00089', 'us_EN', '#6455', 20150803, 19000101, 19000101, 'The Fulbright Core Scholar Program supports activities and projects that recognize and promote the critical relationship between educational exchange and international understanding, in addition to the intellectual merit of the proposals.', 'A fixed sum of US$ 24,000 for one academic semester (4 months) and up to US$ 1,000 for in-country travel (for four-month grants only).', '1. U.S. citizenship; <br>2. Ph.D. or equivalent professional/terminal degree; <br>3. Foreign language proficiency, depending on the area; <br>4. The candidate is expected to apply no earlier than 5 years after having obtained his or her Ph.D. or other terminal degree.', 'fulbright@fulbright.org.br', '', 'All disciplines', '', '', '', '', 'The candidates must apply online - more info at http://www.cies.org/application-guidelines. Moreover, an expression of interest from the host institution is required. ', '', 'A', '', '', 'http://www.cies.org/program/core-fulbright-us-scholar-program#9', 0, 'Observatório', 20150227, '', 'francine.zucco', 'Oportunidade para trazer professores americanos - Fulbright Award', '3', 0),
(168, 'Inscrições prorrogadas: Fellowship in Spokane Community College', 20150430, '00089', 'pt_BR', '2015', 20150531, 19000101, 19000101, 'O Programa Scholar-In-Residence oferece oportunidade para brasileiros ministrarem aulas nos Estados Unidos, por um ano acadêmico. O Spokane Community College  busca um profissional da área de Sociologia, Ciência Política ou História para apoiar no desenvolvimento de cursos de graduação em estudos latino-americanos/internacionais. A ideia é que o professor traga a  perspectiva latino-americana para a cursos como Introdução à Sociologia, Problemas Sociais e História da América Latina e do Mundo.', 'Fellowship no total de US$ 42,221.00.', '1. Possuir doutorado preferencialmente em uma das áreas de concentração; <br>2. Possuir ao menos três anos de experiência em atividades acadêmicas; <br>3. Ter fluência na língua inglesa; <br>4. Possuir pouca ou nenhuma experiência acadêmica nos EUA.', 'alexandre@fulbright.org.br', '', 'Sociologia, Ciência Política ou História', '', '', '', '', 'O candidato deverá se inscrever até o dia 31 de maio de 2015, preenchendo o Application Form em inglês.', '', 'A', '', '', 'http://www.fulbright.org.br/content/view/22/80/', 0, 'Observatório', 20150430, '', 'francine.zucco', 'Inscrições prorrogadas: Fulbright Fellowship in Spokane Community College', '1', 0),
(169, 'Bolsa DTI/CNPq - Projeto ISI/SDS Plasma', 20150219, '00039', 'pt_BR', '2015', 19000101, 19000101, 19000101, 'O Instituto SENAI de Inovação em Eletroquímica busca um profissional altamente motivado para trabalhar no tema de Nitretação a Plasma em Válvulas para Motores Automotivos. O candidato selecionado será contemplado com uma bolsa DTI/CNPq-B e deve estar disposto a trabalhar em uma equipe multidisciplinar (engenharia mecânica, materiais, projetos e engenharia de superfície).', 'Bolsa CNPq/DTI – B, valor mensal de R$ 3.000,00.', 'Graduação na Grande área de Ciências Exatas, preferencialmente em Engenharia (nível graduado com dois anos de experiência ou Mestre em Engenharia) com experiência em pesquisa em aços ou tratamentos térmicos e de superfície ou projeto de equipamentos ou  ensaios de materiais (preparação de amostra para metalografia, microscopia optica e eletronica de varredura, ensaios de dureza e microdureza).', '(41) 3271-7433 ou (41) 3271-7432 e-mail: nerio.vicente@pr.senai.br', '', 'Engenharias', '', '', '', '', 'Favor entrar em contato com Nério Vicente Jr - nerio.vicente@pr.senai.br', '', '!', '', '', '', 0, 'Observatório', 20150219, '', 'francine.zucco', 'Bolsa DTI/CNPq - Projeto ISI/SDS Plasma', '1', 0),
(167, 'Cátedra Fulbright em Saúde Coletiva (Global Health)', 20150219, '00089', 'pt_BR', '2015', 20150331, 19000101, 19000101, 'A Cátedra Fulbright em Saúde Global na Rutgers, The State University of New Jersey, destina-se a professores e pesquisadores brasileiros com comprovada experiência na área da Saúde. Profissionais com trabalhos com ênfase em saúde global e urbanização; urbanização e vulnerabilidade da população aos impactos das mudanças climáticas e exposição à poluição; urbanização e doenças crônicas têm preferência na seleção.', 'Um grant de US$ 20.000,00, passagem aérea, seguro de saúde e moradia.', '1. Ter concluído o doutorado até 2005; <br>2. Possuir nacionalidade brasileira e não possuir nacionalidade norte-americana; <br>3. Ter dez ou mais anos de experiência profissional qualificada; <br>4. Ter fluência em inglês; <br>5. Estar atuando no Brasil; <br>6. Não receber bolsa ou benefício financeiro de outras agências ou entidades brasileiras para o mesmo objetivo.', 'alexandre@fulbright.org.br', '', 'Ciências da Saúde e Biomédicas de Rutgers (RBHS): câncer, infecção e inflamação, meio-ambiente e saúde ocupacional, e neurociências', '', '', '', '', 'O candidato deve submeter sua candidatura exclusivamente via internet. No item Special Award Name, indicar Chair in Global Health at Rutgers.', '', 'A', '', '', 'http://www.fulbright.org.br/content/view/319/190/', 0, 'Observatório', 20150220, '', 'francine.zucco', 'Cátedra Fulbright em Saúde Coletiva (Global Health)', '1', 0),
(170, 'Emerging Leaders in the Americas Program (ELAP)', 20150220, '00035', 'us_EN', '2015', 20150430, 19000101, 19000101, 'The Emerging Leaders in the Americas Program (ELAP) scholarships are facilitated through institutional collaborations and student exchange agreements between Canadian and Latin American or Caribbean institutions. These agreements are created between colleges, technical or vocational institutions and universities. Students or researchers, hereby referred to as "candidates", remain registered as full time students in their home institution during this exchange.', 'The scholarship value varies depending on the duration and level of study: <br>1. $7,200 CAN for college, undergraduate or graduate students (Master´s and PhD) for four months or one academic term of study or research; <br>2. $9,700 CAN for graduate students (Master´s and PhD) for a period of five to six months of study or research.', 'Candidates: <br>1. must be enrolled full-time at a post-secondary institution in an eligible country and paying any tuition fees regulated by that institution for the full duration of the exchange; <br>2. must be proficient in English or French; <br>3. may not hold any other scholarship granted by the Government of Canada.', 'admin-scholarships-bourses@cbie.ca', '', 'All disciplines', '', '', '', '', 'The Canadian institutions are responsible for submitting applications on behalf of candidates from institutions in Latin America and the Caribbean. Please communicate with partner institutions in Canada to confirm or explore possibilities.', '', 'A', '', '', 'http://www.scholarships-bourses.gc.ca/scholarships-bourses/can/institutions/elap-pfla.aspx?lang=eng', 0, 'Observatório', 20150220, '', 'francine.zucco', 'Government of Canada - Emerging Leaders in the Americas Program (ELAP)', '3', 0),
(171, 'Cutting-Edge Basic Research Awards', 20150220, '00058', 'us_EN', 'PAR-12-086', 20150820, 19000101, 19000101, 'The National Institute on Drug Abuse (NIDA) Cutting-Edge Basic Research Award (CEBRA) is designed to foster highly innovative or conceptually creative research related to drug abuse and addiction and how to prevent and treat them. It supports research that is high-risk and potentially high-impact that is underrepresented or not included in NIDA´s current portfolio.', 'Application budgets are limited to $125,000 direct costs per year.', 'The proposed research should: <br>(1) test a highly novel and significant hypothesis for which there are scant precedent or preliminary data and which, if confirmed, would have a substantial impact on current thinking; and/or <br>(2) develop or adapt innovative techniques or methods for addiction research, or that have promising future applicability to drug abuse research.', 'svolman@mail.nih.gov', '', 'Drug abuse and addiction', '', '', '', '', 'Organizations must submit applications to Grants.gov. Aplicants must then complete the submission process by tracking the status of the application in the eRA Commons.', '', 'A', '', '', 'http://grants.nih.gov/grants/guide/pa-files/PAR-15-079.html#_Section_III._Eligibility', 0, 'Observatório', 20150224, '', 'francine.zucco', 'NIH - Cutting-Edge Basic Research Awards', '2', 0),
(172, 'Canada-Brazil Awards - Joint Research Projects (Capes-DFATD)', 20150220, 'CAPES', 'pt_BR', 'PGCI', 20150430, 19000101, 19000101, 'Selecionar projetos conjuntos de pesquisa em todas as áreas do conhecimento, fortalecer a colaboração entre pesquisadores brasileiros e canadenses, e estimular a mobilidade acadêmica. Nesse caso, o apoio da Capes é destinado a missões de trabalho para docentes, missões de estudos de doutorado-sanduíche, além da concessão de recursos de custeio à equipe brasileira. O apoio a equipes canadenses será conforme as regras do DFATD.', 'Missões de trabalho e missões de estudo', '1. A coordenação do projeto estará a cargo de docente com título de doutor e vinculado a um PPG recomendado pela Capes; <br>2. A equipe do Brasil deverá ser composta de pelo menos dois doutores, além do Coordenador e com comprovada capacidade técnico-científica para o desenvolvimento do projeto; <br>3. A proposta deverá ter caráter inovador, considerando inclusive o desenvolvimento da área no contexto nacional e internacional, e explicitando as vantagens da parceria.', ' dfait@capes.gov.br', '', 'Diversas áreas do conhecimento', '', '', '', '', 'Em 2015 não será lançado edital específico para o Programa CAPES/DFATD. Serão recebidos pedidos de apoio a projetos com grupos canadenses financiados pelo DFATD por meio do edital PGCI.', '', 'A', '', '', 'http://www.capes.gov.br/cooperacao-internacional/canada/programa-capes-dfait', 0, 'Observatório', 20150223, '', 'francine.zucco', 'Canada-Brazil Awards - Joint Research Projects (Capes-DFATD)', '3', 0),
(173, 'Visiting Fellowships in Canadian Government Laboratories Program', 20150226, '00035', 'us_EN', '2015', 19000101, 19000101, 19000101, 'The Visiting Fellowships in Canadian Government Laboratories (VF) Program provides promising emerging scientists and engineers with the opportunity to work with research groups or leaders in Canadian government laboratories and research institutions. Fellowships are awarded for one year with the possibility of renewal for a second and third year, at the discretion of the government department concerned.', '$50,503 per year.', 'The candidate must have received a doctoral degree in the natural sciences or engineering from a recognized university within the past five years or, if currently enrolled, must complete within six months.', 'schol@nserc-crsng.gc.ca', '', 'Different disciplines', '', '', '', '', 'There are no deadlines for application to this program; applications are processed and reviewed as they are received.', '', 'A', '', '', 'http://www.nserc-crsng.gc.ca/Students-Etudiants/PD-NP/Laboratories-Laboratoires/index_eng.asp', 0, 'Observatório', 20150226, '', 'francine.zucco', 'Visiting Fellowships in Canadian Government Laboratories Program', '1', 1),
(174, '<br>Mitacs Globalink Research Award', 20150220, '00090', 'us_EN', '2015', 20150612, 19000101, 19000101, 'The Globalink Research Award provides an opportunity for faculty at Canadian universities to strengthen existing international research collaborations and connect with colleagues around the world through the mobility of senior undergraduate and graduate students.', 'Up to $5,000 in research award to the Canadian supervisor for student travel expenses', 'Full-time students at Canadian institutions', '', '', 'All disciplines', '', '', '', '', 'Students and their home university academic supervisors (from Canada) must submit Globalink Research Award applications directly to Mitacs by email at intsubmission(at)mitacs.ca', '', 'A', '', '', 'https://www.mitacs.ca/en/programs/globalink/globalink-research-award', 0, 'Observatório', 20150224, '', 'francine.zucco', 'Oportunidade para trazer acadêmicos canadenses - Mitacs Globalink Research Award', '3', 0),
(175, 'VI Prêmio Octavio Frias de Oliveira em Oncologia', 20150223, '00091', 'pt_BR', '2015', 19000101, 20150430, 19000101, 'Incentivar e premiar a produção de conhecimento nacional na prevenção e combate ao Câncer. Esse é o objetivo do Prêmio Octavio Frias de Oliveira que o ICESP - Instituto do Câncer do Estado de São Paulo Octavio Frias de Oliveira, em parceria com o Grupo Folha de São Paulo, concede, anualmente, desde 2010.', '1º lugar: R$ 16.000,00', 'Três categorias: <br>1. Personalidade de Destaque em Oncologia; <br>2. Pesquisa em Oncologia - trabalhos originais publicados em revistas científicas nos anos de 2014 e 2015, cujo autor principal atue em Instituição de Pesquisa e/ou de Ensino nacionais; <br>3. Inovação Tecnológica em Oncologia - trabalhos originais publicados em revistas científicas ou patentes depositadas nos anos de 2013 a 2015, cujo autor/inventor atue em Instituição de Pesquisa e/ou Ensino nacionais.', 'premio@icesp.org.br', '', 'Oncologia', '', '', '', '', 'A inscrição poderá ser feita pessoalmente ou por correio. O material enviado deve incluir 4 cópias do trabalho/patente e a ficha de inscrição devidamente preenchida, disponível no site.', '', 'A', '', '', 'http://www.icesp.org.br/premio/', 0, 'Observatório', 20150223, '', 'francine.zucco', 'VI Prêmio Octavio Frias de Oliveira em Oncologia', '4', 0),
(176, '<br>XI Edital de Bolsas Universidad de la Rioja', 20150226, '00092', 'pt_BR', 'XI', 20150320, 19000101, 19000101, 'A Universidade de La Rioja, comprometida com o trabalho de difusão do conhecimento e da Língua Espanhola, oferece o programa de Cursos de Língua e Cultura Espanholas 2015-2016, dirigido para estudantes e para graduados de Universidades Brasileiras ou com residência permanente na República Federativa do Brasil, que desejam aprender espanhol ou aperfeiçoar seus conhecimentos nesta língua.', 'Bolsa de 2 mil euros, além do curso de 1 trimestre com foco na língua e cultura espanholas, residência universitária e seguro saúde.', '1. Ser brasileiro; <br>2. Ser estudante de uma Universidade Brasileira ou que tenha obtido um Diploma Universitário (bacharel, licenciatura, pós-graduação, especialização, mestrado, doutorado ou pós-doutorado) expedido por uma Universidade Brasileira nos últimos quatro anos; <br>3. Não residir na Espanha.', '', '', '', '', '', '', '', 'O registro de candidaturas será apenas realizado online. Somente os candidatos pré-selecionados deverão enviar a documentação que lhes seja requisitada.', '', 'A', '', '', 'http://fundacion.unirioja.es/espanol_secciones/view/47/xi-edital-de-bolsas-2015-2016', 0, 'Observatório', 20150226, '', 'francine.zucco', 'Curso de línguas e cultura espanhola - XI Edital de Bolsas Universidad de la Rioja', '1', 0),
(2, 'Programa de Apoio a Eventos no País (PAEP)', 20150303, 'CAPES', 'pt_BR', 'N° 004/2012', 19000101, 19000101, 19000101, 'Impulsionar a realização de eventos científicos no Brasil e a formação de professores para a educação básica, através da concessão de auxílio financeiro às comissões organizadoras.', '<I>Pessoa Jurídica:</I>\r\n<BR>a) passagens para palestrantes e/ou conferencistas;\r\n<BR>b) hospedagem, transporte e alimentação de palestrantes e/ou conferencistas.\r\n<BR>c) publicação de anais, vídeos, CDs; \r\n<BR>d) impressão de pôsteres / banners para divulgação do evento;\r\n<BR>e) locação de sala de conferência;\r\n<BR>f) serviços de tecnologia da informação:\r\n<BR>g) serviços de tradução simultânea;\r\n<BR>h) montagem de estrutura do evento;\r\n<BR>i) serviços gráficos e cópias.\r\n<br>\r\n<BR><I>Pessoa Física:</I>\r\n<BR>a) diárias e transporte para palestrantes e/ou conferencistas;\r\n<BR>b) serviços de tradução simultânea.\r\n<br>\r\n<BR><I>Material de Consumo:</I>\r\n<BR>a) material de Escritório', 'Como proponente:\r\n<BR>a) Ser presidente da comissão organizadora do evento. \r\n<BR>b) Ter título de doutor ou qualificação equivalente;\r\n<BR>c) Ter Curriculum Vitae cadastrado e atualizado na Plataforma Lattes ou  Plataforma Freire:\r\n<BR>d) Estar adimplente junto a União. \r\n<br>\r\n<BR>Quanto ao evento:\r\n<BR>a)Ter relevância para o Sistema Nacional de Pós-Graduação, para a Área do Conhecimento e /ou formação de professores;\r\n<BR>b) Ser de âmbito local, estadual, regional, nacional ou internacional;\r\n<BR>c) Ser realizado no Brasil.', '', '', 'Eventos científicos, tecnológicos e culturais', '', '', '', '', 'A proposta deverá ser submetida com antecedência mínima de 90 dias da data de início do evento.', '', 'A', '', '', 'http://www.capes.gov.br/apoio-a-eventos/paep', 0, 'Observatório', 20150227, '', 'francine.zucco', 'Recurso para realização de eventos - Programa de Apoio a Eventos no País (PAEP)', '5', 1),
(177, 'Saving Lives at Birth: A Grand Challenge for Development', 20150302, '00093', 'us_EN', '2015', 20150327, 19000101, 19000101, 'This fifth application round seeks prevention and treatment approaches for pregnant women and newborns in poor, hard-to-reach communities around the world, encompassing innovation in science and technology, service delivery, and health care demand. ', '1. Seed Funds to develop and assess the feasibility of innovative ideas - $250,000 USD per project, 2 yrs; <br>2. Validation Funds to introduce and validate the effectiveness of innovations to reach proof-of-concept - $250,000 USD per project, 2 yrs; <br>3. Transition Funds to transition innovations with demonstrated proof-of concept toward scale up - up to $2 million USD per project, 4 yrs.', '', '', '', 'Maternal and newborn health -  Innovative prevention and treatment approaches across three main domains: <br>1. Science and Technology; <br>2. Service delivery; <br>3. Healthcare demand.', '', '', '', '', 'Expressions of Interest (EOI) shall be submitted by March 27. If initial review indicates the EOI merits further consideration , selected organizations or consortia may be invited, individually or in combination, to\r\ndiscuss their proposals with the Saving Lives at Birth partners. This process may result in applicants being invited to submit concept notes and attend the DevelopmentXChange in Washington, DC July 21-22, 2015.', '', 'A', '', '', 'http://savinglivesatbirth.net/', 0, 'Observatório', 20150302, '', 'francine.zucco', 'Saving Lives at Birth: A Grand Challenge for Development', '2', 0),
(178, 'Technology to Support Education in Crisis and Conflict Settings Ideation Challenge', 20150302, '00094', 'us_EN', '2015', 20150330, 19000101, 19000101, 'The Seeker is looking for technology--supported approaches for adapting, developing and delivering learner-centered educational materials for learners in crisis and conflict situations where formal schooling has been interrupted and infrastructure and trained, in-person human resources are extremely limited.', 'The total payout will be up to $50,000, with at least one award in each of the three categories being no smaller than $5,000 and no other award being smaller than $1,500.', 'The Ideation Challenge is looking for technology-supported approaches to provide basic education in one or more of the following crisis or conflict situations: Health Crisis, Natural Disaster, and Conflict Zone. Proposed Solutions should be usable within the first six months after the onset of the crisis or conflict and be usable within the context of a developing country.', 'grandchallenges@innocentive.com', '', 'Approaches to improve access to quality education in crisis and/or conflict situations', '', '', '', '', '', '', 'A', '', '', 'https://www.omnicompete.com/crisisandconflictedtech.html', 0, 'Observatório', 20150302, '', 'francine.zucco', 'All Children Reading: A Grand Challenge for Development', '4', 0),
(179, 'Tracking and Tracing Books Prize Competition', 20150303, '00094', 'pt_BR', '2015', 20150401, 19000101, 19000101, 'This Tracking & Tracing Books Prize Competition seeks innovations to track books destined for early-grade classrooms and learning centers in low-income countries and allow stakeholders, ranging from parents to Ministries of Education and donor agencies, to quickly and easily access tracking information. ', '$20,000 (phase 1) and $100,000 awarded at the completion of Phase 3.', 'Innovations should have four main components: <BR>1. A process for tracking and tracing books; <BR>2. Associated software; <BR>3. Associated hardware and devices; <br>4. A method for engaging/easily interfacing with users.', 'grandchallenges@innocentive.com', '', 'Innovations to track books', '', '', '', '', 'There are three phases to this Prize Competition. The first phase requires a written description of the proposed innovation and the expertise and experience of the Solver. Entrants successful in Phase 1 will be invited to refine and/or develop their innovation and work with the ACR GCD partners to pilot it in Phases 2 and 3.', '', 'A', '', '', 'https://www.omnicompete.com/trackingandtracingbooks.html', 0, 'Observatório', 20150303, '', 'francine.zucco', 'Tracking and Tracing Books Prize Competition', '4', 0),
(180, 'Grand Challenges Explorations <br>Round 15', 20150303, '00057', 'us_EN', 'Round 15', 20150513, 19000101, 19000101, 'GCE is an extension of the Bill & Melinda Gates Foundation´s commitment to the Grand Challenges in Global Health, which was launched in 2003 to accelerate the discovery of new technologies to improve global health. GCE has since expanded to include global development and communications challenges.', 'Awards of $100,000 USD are made in Phase I. Phase I awardees have one opportunity to apply for a follow-on Phase II award of up to $1,000,000 USD.', 'Your proposal must demonstrate an innovative approach that complies with all restrictions and guidelines for the topic to which you are applying.', 'GCEhelp@gatesfoundation.org', '', 'Topics: <br>1. Addressing Newborn and Infant Gut Health Through Bacteriophage-Mediated Microbiome Engineering; <br>2. Explore New Ways to Measure Delivery and Use of Digital Financial Services Data; <br>3. Surveillance Tools, Diagnostics and an Artificial Diet to Support New Approaches to Vector Control; <br>4. New Approaches for Addressing Outdoor/Residual Malaria Transmission; <br>5. New Ways to Reduce Childhood Pneumonia Deaths Through Delivery of Timely Effective Treatment; <br>6. Enable Merchant Acceptance of Mobile Money Payments.', '', '', '', '', 'An applicant must submit under only one topic each round and may submit only one proposal. You are required to submit either the application form in Microsoft Word or PDF format; no more than two pages in length.', '', 'A', '', '', 'http://gcgh.grandchallenges.org/Explorations/Pages/ApplicationInstructions.aspx', 0, 'Observatório', 20150303, '', 'francine.zucco', 'Grand Challenges Explorations Round 15', '2', 0),
(181, '<br>Pesquisa Pós-doutoral - Bolsas Capes', 20150303, 'CAPES', 'pt_BR', '2015', 20150530, 19000101, 19000101, 'O Programa de Pesquisa Pós-doutoral visa oferecer bolsa no exterior para a realização de estudos avançados após o doutorado e destina-se a pesquisadores ou docentes com menos de oito anos de formação doutoral, visando à internacionalização de forma mais consistente, aprimorando sua produção e qualificação científicas, funcionando como atividade de treinamento prático e avançado em pesquisa, desenvolvendo métodos e trabalhos teóricos-empíricos em parceria com pesquisadores estrangeiros de reconhecido mérito científico.', 'Mensalidade e auxílios', 'O candidato ao programa deverá: <br>1. ter nacionalidade brasileira; <br>2. ter obtido o título de doutorado há menos de oito anos; <br>3. residir no Brasil e demonstrar atuação em atividade de docência ou pesquisa, compatíveis com o tempo de atuação como doutor; <br>4. não ter realizado no exterior trabalhos da mesma natureza dos definidos por este regulamento nos últimos três anos.', '', '', 'Diversas áreas do conhecimento', '', '', '', '', 'As inscrições serão gratuitas e efetuadas por meio de preenchimento do formulário de inscrição, disponível no link da Capes.', '', 'A', '', '', 'http://www.capes.gov.br/bolsas/bolsas-no-exterior/pesquisa-pos-doutoral-no-exterior', 0, 'Observatório', 20150304, '', 'francine.zucco', 'Pesquisa Pós-doutoral - Bolsas Capes', '1', 0),
(182, 'DST/Wageningen fellowships in dairy chain', 20150304, '00095', 'us_EN', '2015', 20150501, 19000101, 19000101, 'Scholarships for encouraging talented students to follow a two years master´s programme Dairy Science and Technology at Wageningen University. The objective is to obtain new knowledge about the composition of milk (products) throughout the dairy chain to create new options for adding value to milk and its components.', '10, 000 euros per year', '1. Relevant BSc (Food Science, Food Technology, Biotechnology, Nutrition, Chemical Technology or similar); <br>2. gpa > 80% of Maximum scale; <br>3. English level TOEFL 550, IELTS 6.0 or equivalent; <br>4. Students must have been approved for admission to Wageningen University for the MSc Food Technology; <br>5. Only prospective first year students may apply; <br>6. Applicants are preferably under the age of 30.', '', '', 'The whole dairy chain with focus on milk and milk components.', '', '', '', '', 'Applications (motivation letter, CV, study results and GPA score, and a copy of the confirmation of your admission to Wageningen University) should be send as pdf files by email to Hein van Valenberg of the Dairy Science and Technology Group.', '', 'A', '', '', 'http://www.wageningenur.nl/en/Research-Results/Projects-and-programmes/Dairy/Education/Fellowships.htm', 0, 'Observatório', 20150304, '', 'francine.zucco', 'DST/Wageningen fellowships in dairy chain', '1', 0),
(183, 'Healthy Cities and Energy-Environment-Food Security Nexus', 20150309, '00048', 'us_EN', '2015', 20150313, 19000101, 19000101, 'The Newton Fund with the support of CONFAP and CNPq is inviting applications from scientists based in Brazil to attend a jointly organised workshop with ESRC – Economics and Social Science Research Council in London, UK, on 13 - 14 April 2015, followed by an agenda of 2 days of visits and meetings in Scotland.', 'The Newton Fund will fund International Flights tickets in economy class, accommodation in the UK from 12th April until 17th April, transportation within the UK, including transfer from/to airport and also breakfast.', '', '', '', 'Healthy Cities and Energy-Environment-Food Security', '', '', '', '', 'To attend the workshop you must complete the expression of interest (“EoI”) form. The form, together with a CV of no more than two sides of A4, should be sent to brazil.newtonfund@fco.gov.uk by 23:59 (Brasília Time) on Friday 13th March 2015. To receive the form, please contact Observatório PD&I.', '', 'A', '', '', '', 0, 'Observatório', 20150309, '', 'francine.zucco', 'Oportunidade para participar de workshop no UK - Healthy Cities and Energy-Environment-Food Security', '1', 0),
(184, 'TWAS-USM Fellowships for Visiting Researchers in Malaysia', 20150310, '00080', 'us_EN', '2015', 20150915, 19000101, 19000101, 'For scientists from developing countries (other than Malaysia) who wish to pursue advanced research in natural sciences. TWAS-USM Visiting Researchers Fellowships in natural sciences are tenable for a minimum period of one month to a maximum of three months at a school/department of the Universiti Sains Malaysia (USM).', 'USM will provide a standard monthly allowance which should be used to cover living costs, such as accommodation and food. ', 'Applicants must: <br>1. Be a maximum age of 55 years; <br>2. Be nationals of a developing country; <br>3. Must not hold any visa for temporary or permanent residency in Malaysia or any developed country; <br>4. Hold a PhD degree in a field of the natural sciences and a regular research assignment with at least five years of postdoctoral research experience; <br>5. Provide an official Preliminary Acceptance Letter from the Institute of Postgraduate Studies (IPS), USM to TWAS.', 'fellowships@twas.org', '', 'Natural Sciences', '', '', '', '', 'Applicants must submit the preliminary acceptance letter from the Institute of Postgraduate Studies (IPS), USM when applying to TWAS or by the deadline at the latest. The deadline for submitting applications to USM is 2 August 2015.', '', 'A', '', '', 'http://twas.org/opportunity/twas-usm-fellowships-visiting-researchers-malaysia', 0, 'Observatório', 20150310, '', 'francine.zucco', 'TWAS-USM Fellowships for Visiting Researchers in Malaysia', '1', 0),
(48, 'Auxílio Participação em Eventos Científicos - AVG', 20150310, 'CNPq', 'pt_BR', '2014', 19000101, 19000101, 19000101, 'Apoiar a participação de pesquisador com desempenho destacado em sua área de atuação em eventos científicos no exterior, tais como: <br>- Congressos e similares; <br>- Intercâmbio científico ou tecnológico; ou <br>- Visitas de curta duração, para aquisição de conhecimentos específicos e necessários ao desenvolvimento da pesquisa científica ou tecnológica.', 'a) Passagem aérea internacional; <br>b) Diárias no exterior, conforme valores estabelecidos em Resolução Normativa específica.', 'Ter título de doutor. <br>Para participação em congressos e similares: - Ter carta convite ou de aceitação da organização do evento; e - Ter domínio do idioma oficial do evento.', '', '', 'Diversas áreas do conhecimento.', '', '', '', '', 'As propostas deverão ser submetidas por meio de formulário eletrônico de propostas, disponível na Plataforma Carlos Chagas , até 90 (noventa) dias antes do início da atividade ou evento.', '', 'A', '', '', 'http://www.cnpq.br/view/-/journal_content/56_INSTANCE_0oED/10157/25480#rn17112', 0, 'Observatório', 20150311, '', 'francine.zucco', 'Apoio CNPq à participação em eventos no exterior', '5', 1),
(185, '<br>Bilateral Exchange of Academics', 20150310, '00076', 'us_EN', '2015', 20150401, 19000101, 19000101, 'To improve international relations and bilateral research cooperations between German and foreign universities, the DAAD supports exchanges of scientists and academics from partner countries. The basis of these exchanges are cultural exchange programmes and bilateral agreements with foreign partner organisations.', 'Research stays at state or state-recognized institutions of higher education or non-university research institutes in Germany.', 'Foreign academics and scientists who have usually completed a doctoral degree and work at a university or research institute in their home country. The dates and purpose of the stay must be agreed beforehand with the academic host institute in Germany', 'info@daad.org.br', '', 'All disciplines', '', '', '', '', 'The application procedure occurs online through the DAAD portal. You are also required to send 1 copy/copies of the "Application summary" (PDF file), which is generated in the DAAD portal after the online application procedure has been completed, by post to the application address.', '', 'A', '', '', 'http://goo.gl/qbJC7j', 0, 'Observatório', 20150310, '', 'francine.zucco', 'Bilateral Exchange of Academics - DAAD', '3', 0),
(186, 'TWAS Fellowships for Research and Advanced Training', 20150311, '00080', 'us_EN', '2015', 20151001, 19000101, 19000101, 'TWAS offers fellowships to young scientists in developing countries to enable them to spend three to 12 months at a research institution in a developing country other than their own. The purpose of these fellowships is to enhance the research capacity of promising scientists, especially those at the beginning of their research career, helping them to foster links for further collaboration.', 'TWAS covers international low-cost airfare plus a contribution towards subsistence amounting to a maximum of USD 300 per month. The host institution is expected to provide accommodation and food as well as research facilities.', '1. The fellowships are for research and advanced training. They are offered to young scientists holding at least an MSc or equivalent degree. <br>2. Eligible applicants for the fellowships are young scientists working in any area of natural sciences who are citizens of a developing country and are employed by a research institution in a developing country; <br>3. There is no age limit. However, preference is given to young scientists at the beginning of their research career.', '', '', 'All disciplines', '', '', '', '', 'Part 1 of the application form should be completed by the applicant and the head of the applicant´s HOME institution, and sent to the TWAS secretariat. <br>Part 2 must be sent by the applicant to the head of the institution he/she intends to visit, together with a copy of Part 1 (for information). Part 2 should then be completed by the head of the host institution and sent to the TWAS secretariat.', '', 'A', '', '', 'http://twas.org/opportunity/twas-fellowships-research-and-advanced-training', 0, 'Observatório', 20150311, '', 'francine.zucco', 'TWAS Fellowships for Research and Advanced Training', '1', 0);
INSERT INTO `fomento_editais` (`id_ed`, `ed_titulo`, `ed_data`, `ed_agencia`, `ed_idioma`, `ed_chamada`, `ed_data_1`, `ed_data_2`, `ed_data_3`, `ed_texto_1`, `ed_texto_2`, `ed_texto_3`, `ed_texto_4`, `ed_texto_5`, `ed_texto_6`, `ed_texto_7`, `ed_texto_8`, `ed_texto_9`, `ed_texto_10`, `ed_texto_11`, `ed_texto_12`, `ed_status`, `ed_autor`, `ed_corpo`, `ed_url_externa`, `ed_total_visualizacoes`, `ed_local`, `ed_data_envio`, `ed_document_require`, `ed_login`, `ed_titulo_email`, `ed_edital_tipo`, `ed_fluxo_continuo`) VALUES
(188, '<br>Bolsas individuais no país', 20150312, 'CNPq', 'pt_BR', '2015', 20150423, 19000101, 19000101, 'Várias modalidades de bolsas são oferecidas a jovens de ensino médio e superior, em nível de pós-graduaçao, interessados em atuar na pesquisa cientifica, e a especialistas para atuarem em pesquisa e desenvolvimento nas empresas e centros tecnológicos.', 'Mensalidade, auxílios e taxas.', 'Modalidades: <br>1. Pesquisador Visitante - PV\r\n<br>2. Pós-doutorado Júnior - PDJ\r\n<br>3. Pós-doutorado Sênior - PDS\r\n<br>4. Pós-doutorado Empresarial - PDI\r\n<br>5. Doutorado-Sanduíche no País - SWP\r\n<br>6. Doutorado-Sanduíche Empresarial - SWI\r\n<br>7. Pesquisador Visitante - PV (Pesquisador residente no exterior)', '', '', 'Diversas áreas do conhecimento', '', '', '', '', 'As propostas deverão ser submetidas por meio de formulário eletrônico de propostas, disponível na Plataforma Carlos Chagas.', '', 'A', '', '', 'http://www.cnpq.br/view/-/journal_content/56_INSTANCE_0oED/10157/100343', 0, 'Observatório', 20150312, '', 'francine.zucco', 'Bolsas individuais no país', '1', 0),
(187, '<br>Bolsas no exterior', 20150312, 'CNPq', 'pt_BR', '2015', 20150423, 19000101, 19000101, 'As bolsas no exterior oferecidas pelo CNPq são destinadas à formação de estudantes e ao aprimoramento de pesquisadores em instituições estrangeiras conceituadas.', 'Mensalidade; auxílio instalação; seguro saúde; auxílio deslocamento.', 'Modalidades: <br>1. Pós-Doutorado no Exterior (PDE); <br>2. Doutorado Sanduíche (SWE); <br>3. Estágio Senior no Exterior (ESN); <br>4. Doutorado no exterior (GDE).\r\n<br> Veja também em http://www.cienciasemfronteiras.gov.br/', '', '', 'Diversas áreas do conhecimento', '', '', '', '', 'As propostas deverão ser submetidas por meio de formulário eletrônico de propostas, disponível na Plataforma Carlos Chagas.', '', 'A', '', '', 'http://www.cnpq.br/view/-/journal_content/56_INSTANCE_0oED/10157/515690', 0, 'Observatório', 20150312, '', 'francine.zucco', 'Bolsas no exterior - CNPq', '1', 0),
(190, 'L´ORÉAL/UNESCO/ABC Para Mulheres na Ciência', 20150325, '00097', 'pt_BR', '2015', 20150531, 19000101, 19000101, 'Primeiro programa dedicado a mulheres cientistas no mundo, o L’Oréal-UNESCO For Women in Science foi fundado em 1998, na firme convicção de que o mundo precisa de ciência e a ciência precisa de mulheres. É com este propósito que todos os anos o Programa identifica, recompensa, incentiva e coloca sob os holofotes excepcionais cientistas de todos os continentes.', 'O valor de cada Bolsa-auxílio é o equivalente a US$ 20.000, convertidos em reais, para aplicação em 12 meses.', 'O Programa de Bolsa-auxílio visa apoiar projetos científicos viáveis e de alto valor a serem desenvolvidos durante 12 meses por pesquisadoras que tenham residência estável no Brasil, por no mínimo há 4 anos, e desenvolvam projetos de pesquisa em instituições nacionais. <br>As Bolsas-auxílio destinam-se a pesquisadoras que tenham concluído o\r\ndoutorado a partir de 01/01/2009 e com currículo Lattes atualizado.', '', '', 'Ciências Físicas, Ciências Biomédicas, Biológicas e da Saúde, Ciências Matemáticas e Ciências Químicas.', '', '', '', '', 'A candidatura deverá incluir os documentos referidos no Formulário de Inscrição Eletrônico disponível no site www.paramulheresnaciencia.com.br', '', 'A', '', '', 'http://www.paramulheresnaciencia.com.br/', 0, 'Observatório', 20150325, '', 'francine.zucco', 'Prêmio L´ORÉAL/UNESCO/ABC Para Mulheres na Ciência', '4', 0),
(189, 'Joint Japan World Bank Graduate Scholarship Program', 20150313, '00096', 'us_EN', 'JJ/WBGSP', 20150319, 19000101, 19000101, 'The  Joint Japan World Bank  Graduate Scholarship Program (JJ/WBGSP) sponsors students from developing countries to pursue graduate studies leading to a master’s degree from preferred and partner universities around the world. Scholars are expected to return home to contribute to the development of their country.', 'The scholarship provides travel costs between your home country and the host university, tuition for your graduate program, the cost of basic medical insurance, a monthly subsistence allowance to cover living expenses, including books.', 'The candidate must: <br>1. be a developing country national; <br>2. not be a dual citizen of any developed country; <br>3. hold a Bachelor’s degree (or equivalent university degree) earned before 2012; <br>4. have at least 3 years of development-related experience since earning a Bachelor’s degree; <br>5. must commit to returning backhome after graduation.', 'scholarshipapplicants@worldbank.org', '', 'Different disciplines', '', '', '', '', '', '', 'A', '', '', 'http://goo.gl/6GMEHH', 0, 'Observatório', 20150313, '', 'francine.zucco', 'Joint Japan World Bank Graduate Scholarship Program', '1', 0),
(191, 'Programa de Capacitação em Taxonomia – PROTAX - 01/2015', 20150325, 'CNPq', 'pt_BR', '01/2015', 20150508, 19000101, 19000101, 'Apoiar projetos de pesquisa científica e tecnológica que visem contribuir significativamente para o desenvolvimento científico e tecnológico do País, dando continuidade e fortalecendo o Programa Especial de Capacitação em Taxonomia – PROTAX, por meio da formação de recursos humanos especializados em Taxonomia para atuação em inventários, curadorias e gestão das coleções biológicas brasileiras, de forma a estimular e desenvolver a capacidade taxonômica instalada do País, visando a ampliação do conhecimento sobre a biodiversidade brasileira.', 'Até R$ 250.000,00 em bolsas modalidades Apoio Técnico (AT), Iniciação Científica (IC), Mestrado (GM), Doutorado (GD) e Pós-Doutorado Junior (PDJ).', 'O proponente deve: <br>1. possuir o título de doutor e ter currículo cadastrado na Plataforma Lattes;  <br>2. ser obrigatoriamente o coordenador do projeto; <br>3.  ser obrigatoriamente o coordenador do projeto; <br>4. estar credenciado a um PPG stricto atuando formalmente na formação de recursos humanos em Taxonomia nas áreas de Botânica. <br>A proposta deve estar claramente enquadrada como pesquisa Taxonômica nas áreas da Botânica, da Zoologia e/ou da Microbiologia e que vise formar recursos humanos para trabalhos em Taxonomia para atuação em coleções biológicas, inventários, revisões taxonômicas e outras ações que exijam conhecimentos especializados; desenvolver a capacidade da ciência Taxonômica instalada no País para ampliar o conhecimento sobre a biodiversidade brasileira em conformidade com as políticas de biodiversidade, bem como contribuir para a redução do impedimento taxonômico; Zoologia e/ou Microbiologia.', 'taxonomia@cnpq.br', '', 'Taxonomia', '', '', '', '', 'As propostas devem ser acompanhadas de arquivo contendo o projeto e devem ser encaminhadas ao CNPq exclusivamente via Internet, utilizando-se do Formulário de Propostas online, disponível na Plataforma Integrada Carlos Chagas.', '', 'A', '', '', 'http://goo.gl/GXL6dB', 0, 'Observatório', 20150325, '', 'francine.zucco', 'Programa de Capacitação em Taxonomia – PROTAX - 01/2015', '2', 0),
(192, 'Prêmio José Reis de Divulgação Científica e Tecnológica', 20150325, 'CNPq', 'pt_BR', '2015', 19000101, 20150522, 19000101, 'Destinado às iniciativas que contribuam significativamente para tornar a Ciência, a Tecnologia e a Inovação conhecidas do grande público, o prêmio é concedido anualmente pelo CNPq desde 1978. Em 2015 a modalidade é "Instituição ou Veículo de Comunicação" e vai premiar a instituição ou veículo de comunicação coletivo que tenha tornado acessível, ao público, conhecimento sobre Ciência, Tecnologia, Inovação e seus avanços.', 'A instituição ou veículo de comunicação receberá diploma e passagem aérea e hospedagem para participar da cerimônia de entrega do prêmio na Reunião Anual da Sociedade Brasileira para o Progresso da Ciência (SBPC).', '', 'pjr@cnpq.br', '', 'Comunicação', '', '', '', '', 'A inscrição será feita pelo dirigente institucional ou por seu representante legal. Comunicar ao Observatório (pdi@pucpr.br) o interesse em participar deste prêmio para articulação institucional.', '', 'A', '', '', 'http://www.premiojosereis.cnpq.br/', 0, 'Observatório', 20150325, '', 'francine.zucco', 'Prêmio José Reis de Divulgação Científica e Tecnológica', '4', 0),
(193, 'New Zealand Development Scholarships (NZDS)', 20150325, '00098', 'us_EN', '2015', 20150731, 19000101, 19000101, 'The New Zealand Development Scholarships (NZDS) offers the opportunity for international students from selected developing countries to study in New Zealand to gain knowledge and skills through post-graduate study in specific subject areas that will assist in the development of their home country.', 'The scholarships include a fortnightly living allowance, an establishment allowance, medical and travel insurance, travel to and from your home country at the start and end of your scholarship, home leave or reunion travel for some students, and assistance with research and thesis costs for most postgraduate research students.', 'Applicants must meet the following conditions: <BR>1. Be a minimum of 18 years of age at the time of commencing your scholarship; <BR>2. Be a citizen of the country from which you are applying for a scholarship and have resided in that country for at least the last two years; <BR>3. Agree to return to your home country for a minimum of two years on completion of the scholarship; <BR>4. Have at least 2 years of work experience (part time or fulltime, paid or voluntary); <BR>5. Be academically and linguistically able to obtain an Offer of Place for the proposed programme of study from the tertiary institute where you will undertake your scholarship.', '', '', 'Subject areas that are relevant to the sustainable development needs of your country (i.e. renewable energy, agriculture, fisheries, disaster risk management, natural resource management, health, and education).', '', '', '', '', 'You must first apply for an Offer of Place (admission) at your preferred New Zealand institution. Once you have a confirmed Offer of Place, you must submit the completed NZDS application form together with your essay and supporting documents by 31 July 2015 to the address indicated at the NZDS page specific to your country.', '', 'A', '', '', 'http://www.aid.govt.nz/funding-and-contracts/scholarships/types-scholarship/new-zealand-development-scholarships', 0, 'Observatório', 20150327, '', 'francine.zucco', 'New Zealand Development Scholarships (NZDS)', '1', 0),
(194, 'Université Paris-Saclay International Master’s Scholarships', 20150325, '00099', 'us_EN', '2015-16', 20150517, 19000101, 19000101, 'The Université Paris-Saclay would like to give foreign students access to its master’s (nationally-certified degree) programs provided in its member establishments and to make it easier for highly-qualified foreign students to attend its University especially those wishing to develop an academic project through research up to the doctoral level. The scholarships are open to students wishing to obtain a master’s degree in one of Paris-Saclay University’s member establishments (entering an M1 or an M2 directly). The scholarships does not apply to internships and work-study programs.', 'The Université Paris-Saclay scholarship is 10,000€ per year awarded by the establishment the candidate is registered in for the duration of the academic year and for a period of no less than 10 consecutive months per year. <br>A maximum of 1,000€ for travel and VISA expenses is also awarded depending on the candidate’s country of origin.', 'The program is available for first-time arrivals, aged 30 years old or less the year of acceptance and only applies to non-French national students.', '', '', 'List of master’s programs available at the Université Paris-Saclay: http://www.universite-paris-saclay.fr/en/formation/masters', '', '', '', '', 'Students must first submit their candidature for a master at Université Paris-Saclay. At the paragraphe "Grant" they should specify: Bourse Internationale de master Paris-Saclay\r\n<br>The candidates accepted to run for the final selection will be directly contacted by the professor in charge of the master.', '', 'A', '', '', 'http://goo.gl/kHGM7b', 0, 'Observatório', 20150326, '', 'francine.zucco', 'Université Paris-Saclay International Master’s Scholarships', '1', 0),
(195, '<br>TWAS-Lenovo Science Prize', 20150326, '00080', 'us_EN', '2015', 19000101, 20150430, 19000101, 'The rapid growth Lenovo has recently experienced in emerging markets has prompted the company to partner with TWAS to launch a high-level prize to give international recognition and visibility to individual scientists in the developing world for their outstanding scientific achievements.', ' The TWAS-Lenovo Science Prize will carry a monetary award of USD100,000 provided by Lenovo, as well as a medal and a certificate highlighting the recipient´s major contributions to science.', 'Candidates must be nationals of a developing country and must have lived and worked in a developing country for the last 10 years. The prizes will only be awarded to individuals for scientific research of outstanding international merit carried out at institutions in developing countries.', 'prizes@twas.org', '', 'Mathematics', '', '', '', '', 'Additional information and nomination forms are available from the TWAS Secretariat. Nominations for the 2015 prize should reach the TWAS Secretariat by 30 April 2015.', '', 'A', '', '', 'http://twas.org/opportunity/twas-lenovo-science-prize', 0, 'Observatório', 20150326, '', 'francine.zucco', 'TWAS-Lenovo Science Prize', '4', 0),
(197, '<br>Doutorado Capes/DAAD/CNPq - 2015/2016', 20150407, 'CAPES', 'pt_BR', '07/2015', 20150515, 19000101, 19000101, 'A iniciativa tem por objetivo apoiar candidatos com excelente qualificação científica e acadêmica para realização de doutorado pleno, de duplo doutorado e de doutorado sanduíche na Alemanha. O programa é fruto de parceria entre a Capes, o Conselho Nacional de Desenvolvimento Científico e Tecnológico (CNPq) e o Serviço Alemão de Intercâmbio Acadêmico (DAAD).', 'Além do curso de alemão oferecido pelo DAAD (com duração de 2 a 6 meses, conforme necessidade do candidato), a bolsa concedida pela CAPES inclui mensalidades no exterior, passagem aérea internacional de ida/volta ou auxílio deslocamento (a critério da Capes) e auxílio seguro saúde.', '1. Ser cidadão brasileiro; <br>2. Ter cursado o mestrado em curso credenciado pela Capes, concluído ou em fase de conclusão até o final do 1º semestre de 2015; <br>3. Ter qualificação acadêmica acima da média; <br>4. Apresentar plano de trabalho sobre o estudo que pretende realizar; <br>5. Ter confirmação de orientação científica na Alemanha; <br>6. Para o Duplo-Doutorado, é necessário que no regulamento da pós-graduação, tanto da universidade brasileira quanto da alemã, esteja prevista essa possibilidade.', '', '', 'Diversas áreas do conhecimento', '', '', '', '', 'As candidaturas devem ser apresentadas por meio do formulário eletrônico disponível na plataforma Carlos Chagas, localizada na página do CNPq. Uma versão da documentação deverá ser encaminhada por correio para o escritório do DAAD, no Rio de Janeiro.', '', 'A', '', '', 'http://capes.gov.br/cooperacao-internacional/alemanha/doutorado-capes-daad-cnpq', 0, 'Observatório', 20150401, '', 'francine.zucco', 'Doutorado Capes/DAAD/CNPq - 2015/2016', '1', 0),
(196, '7º Prêmio de Projetos Inovadores', 20150401, '7p', 'pt_BR', '07/2015', 20150410, 20150410, 19000101, 'O Senai, o Sindimetal Londrina e o Sinduscon Norte PR realizarão o 7º Prêmio de Projetos Inovadores com\r\nAplicabilidade na Indústria Metalúrgica, Mecânica, Eletrônica, Materiais Elétricos e Construção Civil. A edição\r\n2015 do referido Prêmio será realizada nos dias 6 e 7 de maio, na estrutura do Senai em Londrina (Rua Belém nº\r\n844), no horário das 16h às 22h, durante o “Fórum EletroMetalCon 2015 – Inovações e Tecnologias Aplicadas na\r\nIndústria.', 'Autores e orientadores dos projetos expostos participam da Festa e da solenidade de premiação do 7º Prêmio\r\nde Projetos Inovadores com Aplicabilidade na Indústria. São R$ 18 mil em premiação, assim divididos: ao primeiro\r\nlugar será concedido o valor de R$ 10.000,00. O segundo lugar será contemplado com R$ 5.000,00 e o terceiro lugar\r\nreceberá a premiação de R$ 3.000,00.', 'Uma comissão julgadora - dentre todos os projetos inscritos – selecionará 03 (três) projetos que ficarão\r\nexpostos durante o Fórum EletroMetalCon 2015, nos dias 6 e 7 de maio. Durante o evento, os três projetos expostos\r\npassarão por nova avaliação, que será feita por 30 profissionais especialmente convidados para pontuarem (através\r\nvotação secreta e depositada em urna) os projetos que - de seu ponto de vista – devam receber o 1º, 2º e 3º lugar.\r\nO resultado da respectiva premiação somente será divulgada no dia 29 de maio/2015, durante a Festa em\r\nComemoração ao Dia da Indústria, no Buffet Planalto em Londrina.', 'Informações: Senai – Londrina (43) 3294.5134 – 3294.5133', '', '', '', '', '', '', '', 'pdi@pucpr.br', 'A', '', '', '', 0, 'Observatório', 20150401, '', 'jeferson.vieira', '7º Prêmio de Projetos Inovadores', '4', 0),
(198, '<br>Bolsas Ibero-Americanas 2015', 20150407, '00044', 'pt_BR', '2015', 20150510, 20150511, 19000101, 'Lançado em 2011, o Programa de Bolsas Ibero-Americanas é uma iniciativa criada para um período de 5 anos (2011 à 2015) com o objetivo de promover o intercâmbio acadêmico anual de estudantes de graduação entre universidades de 9 países da região da Ibero-América: Brasil, Argentina, Espanha, Chile, Colômbia, México, Portugal, Porto Rico e Uruguai.', '3.000 mil euros por aluno como bolsa-auxílio para cobrir custos com transporte, hospedagem e alimentação.', '1. Estar regularmente matriculado(a) em um curso de graduação da PUCPR, tendo concluído, até o início do intercâmbio o 4º período do curso; <br>2. Possuir IRA igual ou superior a 7,0; <br>3. Não possuir mais que uma reprovação; <br>4.  Realizar a pré-inscrição no site do Santander Universidades; <br>5. Comprovar conhecimento do idioma espanhol (B1), para instituições de língua espanhola, mediante realização do teste de Espanhol organizado pelo Núcleo de Intercâmbio no dia 12/05/2015 às 14h; <br>6. Realizar o pagamento da taxa de inscrição de R$80,00.', 'intercambio@pucpr.br', '', 'Diversas áreas do conhecimento', '', '', '', '', 'O candidato deve preencher o formulário de inscrição disponível no link abaixo, imprimi-lo e entregar na Coordenação de Mobilidade da PUCPR até 11/05/2015.', '', 'A', '', '', 'http://www.pucpr.br/intercambio/noticia.php?ref=12751&id=2015-04-06_56563', 0, 'Observatório', 20150408, '', 'francine.zucco', 'Santander Universidades - Bolsas Ibero-Americanas 2015', '1', 0),
(199, '<br>Apoio a Eventos Científicos em Saúde', 20150408, '00101', 'pt_BR', '2015', 20150430, 19000101, 19000101, 'O apoio irá viabilizar e facilitar a disseminação de novos conhecimentos e tecnologias que apresentem alto impacto na solução de problemas de saúde, garantir um maior intercâmbio científico entre pesquisadores e gestores na área da saúde e aumentar a visibilidade do Ministério da Saúde junto à comunidade científica e tecnológica e à sociedade. Além disso, o evento a ser apoiado deve estar em consonância com a Política Nacional de Ciência, Tecnologia e Inovação em Saúde e com a Agenda Nacional de Prioridades de Pesquisa em Saúde.', 'De 15 a 50 mil reais', 'Podem participar entidades públicas ou privadas, sem caráter lucrativo, que queiram realizar eventos de caráter técnico-científico na área da saúde entre 15 de julho a 15 de dezembro de 2015. \r\n<br>A proposta deve estar em consonância com a Política Nacional de Ciência, Tecnologia e\r\nInovação em Saúde e com o Plano Nacional de Saúde  e ter relevância para o SUS e para as políticas de saúde no nível local, regional ou nacional.', 'deciteventos@saude.gov.br', '', 'Saúde', '', '', '', '', 'As inscrições serão feitas por meio de formulário eletrônico disponível no site do Ministério da Saúde.', '', 'A', '', '', 'http://portal2.saude.gov.br/sisct/', 0, 'Observatório', 20150408, '', 'francine.zucco', 'Apoio a Eventos Científicos em Saúde - Ministério da Saúde', '5', 0),
(200, 'Prêmio Fernão Mendes Pinto 2015', 20150410, '00102', 'pt_BR', '2015', 20150731, 19000101, 19000101, 'Agraciar uma dissertação de mestrado ou de doutorado que contribua para a aproximação dos integrantes da Comunidade dos Países de Língua Portuguesa (CPLP), explicitando as relações entre as comunidades de, pelo menos, dois países.', '8.000 Euros', 'A dissertação ou tese a submeter, escrita em português, tem que ter sido defendida durante o ano anterior ao da candidatura.', 'aulp@aulp.org', '', 'Língua Portuguesa', '', '', '', '', 'As propostas deverão ser apresentadas por Instituições de Ensino Superior ou Institutos de Investigação Científica de países de língua portuguesa. Para indicação de uma tese/disertação, entre em contato com o Observatório.', '', 'A', '', '', 'http://aulp.org/node/112683', 0, 'Observatório', 20150410, '', 'francine.zucco', 'Prêmio Fernão Mendes Pinto 2015 - Língua Portuguesa', '4', 0),
(201, '<br>Prêmio Capes de Tese 2015', 20150410, 'CAPES', 'pt_BR', '08/2015', 20150515, 19000101, 19000101, 'O Prêmio Capes de Tese 2015 será outorgado para a melhor tese de doutorado selecionada em cada uma das quarenta e oito áreas do conhecimento reconhecidas pela CAPES nos cursos de pós-graduação adimplentes e reconhecidos no Sistema Nacional de Pós-Graduação. Serão concedidos prêmios especiais para áreas pré-determinadas em parceria com a Fundação Carlos Chagas. O Grande Prêmio Capes de Tese será outorgado em parceria com a Fundação Conrado Wessel.', 'Certificado, cerimônia de premiação, bolsas, auxílio participação em evento.', 'A tese deve: <br>1. estar disponível na Plataforma Sucupira da CAPES; <br>2. ter sido defendida em 2014; <br>3. ter sido defendida no Brasil, mesmo em casos de cotutela ou outras formas de dupla diplomação; <br>4. ter sido defendida em programa de pós-graduação que tenha tido, no mínimo, 3(três) teses de doutorado defendidas em 2014.', 'premiocapes@capes.gov.br', '', 'Áreas do conhecimento reconhecidas pela CAPES', '', '', '', '', 'A pré-seleção das teses a serem indicadas ao Prêmio Capes de Tese ocorre nos programas de pós-graduação das instituições de ensino superior que tenham tido, no mínimo, três teses de doutorado defendidas em 2014. Após a indicação da tese vencedora pela comissão de avaliação, o coordenador do programa de pós-graduação deve realizar a inscrição da tese até o dia 15 de maio.', '', 'A', '', '', 'http://www.capes.gov.br/premiocapesdetese', 0, 'Observatório', 20150410, '', 'francine.zucco', 'Prêmio Capes de Tese 2015', '4', 0),
(202, 'Prêmio Capes-Interfarma de Inovação e Pesquisa', 20150413, 'CAPES', 'pt_BR', '09/2015', 20150515, 19000101, 19000101, 'A premiação, fruto da parceria com a Associação da Indústria Farmacêutica de Pesquisa (Interfarma), reconhecerá as melhores teses de doutorado defendidas em 2014 em Saúde Humana ou Ética/Bioética no Brasil, Medicina, Odontologia, Farmácia, Enfermagem ou Ciências Biomédicas (que inclui Genética; Fisiologia, Bioquímica, Farmacologia; Imunologia, Microbiologia, Parasitologia e Biologia Celular).', 'Prêmio no valor de R$ 26.495,75, cerimônia de premiação, bolsa, auxílio participação em evento.', 'A tese deve: <br>1. estar disponível na Plataforma Sucupira da CAPES; <br>2. ter sido defendida em 2014; <br>3. ter sido defendida no Brasil, mesmo em casos de cotutela ou outras formas de dupla diplomação; <br>4. ter sido defendida em programa de pós-graduação que tenha tido, no mínimo, 3(três) teses de doutorado defendidas em 2014.', 'PremioCapesInterfarma@capes.gov.br', '', 'Área de Saúde Humana ou Ética/Bioética', '', '', '', '', 'A pré-seleção das teses a serem indicadas ao prêmio ocorre nos programas de pós-graduação das instituições de ensino superior. Após selecionados, os trabalhos que cumprirem os requisitos descritos no edital devem ser inscritos exclusivamente pela internet, até 15 de maio, pelo coordenador do programa de pós-graduação.', '', 'A', '', '', 'http://goo.gl/0icdFT', 0, 'Observatório', 20150413, '', 'francine.zucco', 'Prêmio Capes-Interfarma de Inovação e Pesquisa', '4', 0),
(203, 'Prêmio Fundação Bunge 2015', 20150414, '00103', 'pt_BR', '2015', 20150429, 19000101, 19000101, 'Em 2015, o Prêmio Fundação Bunge, em sua 60ª edição, contempla profissionais envolvidos com a Recuperação de Solos Degradados para a Agricultura, na área de Ciências Agrárias, e Saneamento Básico e Manejo de Água, na área de Ciências Biológicas, Ecológicas e da Saúde.', 'Os contemplados receberão medalhas de ouro e prata, diplomas em pergaminho e um prêmio de R$ 150 mil e R$ 60 mil.', '', '', '', 'Recuperação de Solos Degradados para a Agricultura, na área de Ciências Agrárias, e Saneamento Básico e Manejo de Água, na área de Ciências Biológicas, Ecológicas e da Saúde.', '', '', '', '', 'Os candidatos ao Prêmio não são inscritos, mas sim indicados pelas principais universidades e entidades científicas e culturais brasileiras. Por favor, indicar o candidato até o dia 29 de abril no e-mail do Observatório - pdi@pucpr.br', '', 'A', '', '', 'http://www.fundacaobunge.org.br/projetos/premio-fundacao-bunge/', 0, 'Observatório', 20150414, '', 'francine.zucco', 'Prêmio Fundação Bunge 2015', '4', 0),
(204, 'B.BICE+ Call for travel grants targeting innovation actors', 20150414, '00104', 'us_EN', '2015', 20150419, 19000101, 19000101, 'Build stronger relationships and long term partnerships between European and Brazilian research and innovation actors on priority areas identified by the EU-Brazil Policy Dialogue on Research and Innovation; identify areas of cooperation and mutual interest and enhance the sharing of experience among seasoned innovation actors through working visits.', 'Visit exchange (up to 3.000 euros)', 'The call is open to research institutions, TTOs, SMEs, technology platforms, innovation agencies and innovation networks (clusters / arranjos produtivos locais, Science and Technology Parks, business incubators) or other innovation actor from Europe (MS/AC) and Brazil. Each applicant from Europe must have found a partner institution in Brazil and each applicant from a Brazilian institution must have found a partner in Europe', '', '', 'Marine research; Food security, sustainable agriculture and bio-economy; Energy; Nanotechnologies; Sustainable agriculture and Biotechnology/bio-economy; Health.', '', '', '', '', 'Please submit your proposal (Annex 1) by email to tobbiceplus@ird.fr along with your CV, supporting letter from the candidate´s institution and letter/invitation from the hosting institution.', '', 'A', '', '', 'http://www.b-bice-plus.eu/call-for-travel-grants-targeting-innovation-actors/', 0, 'Observatório', 20150414, '', 'francine.zucco', 'B.BICE+ Call for travel grants targeting innovation actors', '3', 0),
(205, 'International S & T Cooperation: Post-Doc Fellowships to non-EU researchers', 20150415, '00105', 'us_EN', '2015', 20150531, 19000101, 19000101, 'The stimulation of international mobility and the attraction of researchers from abroad is one of the priorities of the European Research Area. The Federal Science Policy Office (BELSPO) is contributing to this objective by granting post-doc fellowships to non-EU researchers allowing them to work in a Belgian research team during a given period of time. The ultimate aim is to promote sustainable S&T collaborations between the research institutions and support the research networks.', 'Net monthly allowance of 2,403 EUR, travel expenses, insurance costs.', 'Qualifications required: <br>1. holding a doctor’s degree at the date of entry the Fellowship; <br>2. being under the age limit of 50 at the date of entry the Fellowship; <br>3. having the nationality of a target country, <br>4. and be associated to research in one of these target countries.', 'bernard.delhausse@belspo.be', '', '', '', '', '', '', 'The application form is introduced both in hard and electronic copy (bernard.delhausse@belspo.be) to the Federal Science Policy Office by the Belgian promoter.', '', 'A', '', '', 'http://www.belspo.be/belspo/organisation/call_postdoc_fr.stm', 0, 'Observatório', 20150415, '', 'francine.zucco', 'International S & T Cooperation: Post-Doc Fellowships to non-EU researchers', '1', 0),
(206, 'UNESCO Kalinga Prize for the Popularization of Science', 20150416, '00106', 'us_EN', '2015', 20150515, 19000101, 19000101, 'The purpose of the UNESCO-Kalinga Prize for the Popularization of Science is to reward the efforts of a person who has had a distinguished career as a writer, editor, lecturer, radio/television programme director or film producer, which has enabled him/her to help interpret science, research and technology to the public. ', 'The one-time award consists of: a cheque for the amount of the prize US$20,000, a certificate and the UNESCO-Albert Einstein silver medal. The laureate will also be offered the Kalinga Chair established by the Government of India (Department of Science and Technology) which comprises a certificate and cash award of US$5,000.', '1. Writers, editors, lecturers, radio/television programme directors or film producers who have devoted their career to interpreting science, research and technology for the general public; <BR>2. The applicant does not need to have a science degree; <BR>3. This prize does not reward research;<BR> 4. This prize does not reward formal teaching (in a school/university), nor curriculum development for the formal learning sector.', '', '', 'Popularization of science', '', '', '', '', 'If you belong to a national association for the advancement of science or any other science association, including science writers or scientific journalists, inform them of your interest in applying for this prize. <br>Candidates are submitted by the government through the country’s National Commission for UNESCO - Division of Cultural and Multilateral Agreements,  damc@itamaraty.gov.br; Gustavo.guimaraes@itamaraty.gov.br', '', 'A', '', '', 'http://goo.gl/HuY4oJ', 0, 'Observatório', 20150416, '', 'francine.zucco', 'UNESCO Kalinga Prize for the Popularization of Science', '4', 0),
(207, '<br>CIMO PhD Fellowships in Finland', 20150417, '00107', 'us_EN', '2015', 19000101, 19000101, 19000101, 'The CIMO Fellowships programme is open to young Doctoral level students and researchers from all countries and from all academic fields.', 'The monthly allowance is 1500 euros, intended to cover living expenses in Finland for a single person. Expenses due to international travel to and from Finland are not covered by CIMO.', 'The prerequisite for applying is that the visiting researcher must have established contacts with a Finnish host university.', '', '', '', '', '', '', '', 'Only the hosting Finnish university can act as an "applicant" in the CIMO Fellowship programme. There are no annual application deadlines in the CIMO Fellowship programme. Applications may be considered at all times. However, please note that applications should be submitted at least 5 months before the intended scholarship period.', '', 'A', '', '', 'http://www.studyinfinland.fi/tuition_and_scholarships/cimo_scholarships/cimo_fellowships', 0, 'Observatório', 20150417, '', 'francine.zucco', 'CIMO PhD Fellowships in Finland', '1', 1),
(208, 'Prêmio Emerald/Capes 2015 de Pesquisa nas áreas de Ciência da Informação e Administração e Gestão', 20150422, 'CAPES', 'pt_BR', '10/2015', 20150830, 19000101, 19000101, 'O objetivo de prêmio é incentivar a realização de projetos de pesquisa nas áreas de Ciência da Informação e Ciência da Administração e Gestão que conciliem a disseminação do conhecimento com o desenvolvimento social aplicado à realidade brasileira.', 'Prêmio de U$ 3.000 para cada categoria.', 'O Prêmio é direcionado às propostas de projetos que conciliem a disseminação do conhecimento com o desenvolvimento social aplicado à realidade brasileira. Pesquisadores vinculados a instituições usuárias do Portal de Periódicos poderão submeter trabalhos nos moldes deste Edital.', 'cgpp@capes.gov.br', '', 'Duas categorias: 1. Ciência da Informação e 2. Administração e Gestão', '', '', '', '', 'As inscrições deverão ser feitas no link disponível no site do Portal de Periódicos, que direcionará ao site da EMERALD.', '', 'A', '', '', 'http://capes.gov.br/component/content/article/94-bolsas-s/7499-premio-emerald-capes', 0, 'Observatório', 20150422, '', 'francine.zucco', 'Prêmio Emerald/Capes 2015 de Pesquisa nas áreas de Ciência da Informação e Administração e Gestão', '4', 0),
(209, '<br>Sofja Kovalevskaja Award', 20150422, '00108', 'us_EN', '2015', 19000101, 20150731, 19000101, 'The Alexander von Humboldt Foundation’s Sofja Kovalevskaja Award, which is funded by the Federal Ministry of Education and Research of Germany, is granted to young exceptionally promising researchers from abroad in recognition of outstanding academic achievements. The award is designed to enable them to embark on academic careers in Germany by establishing their own junior research groups at research institutions in Germany.', 'Up to 1.65 million EUR. The award funds are placed at the award winner’s disposal for a period of five years to carry out the approved research project of his or her own choice in Germany.', 'For scientists and scholars from abroad whose previous research has already been internationally recognized as outstanding and who are expected to continue producing outstanding results. <vr>The programme is open to scientists and scholars from all countries and disciplines who completed their doctorates with distinction less than six years ago. The Alexander von Humboldt Foundation particularly welcomes applications from qualified, female junior researchers.', 'info@avh.de', '', 'All disciplines', '', '', '', '', 'Applications must be sent to the Foundation´s office by the deadline.', '', 'A', '', '', 'http://www.humboldt-foundation.de/web/7360.html', 0, 'Observatório', 20150422, '', 'francine.zucco', 'Sofja Kovalevskaja Award - Humboldt Foundation', '1', 0),
(210, '<br>Humanitarian Innovation Fund', 20150423, '00109', 'us_EN', '2015', 20150514, 19000101, 19000101, 'The Humanitarian Innovation Fund supports organisations and individuals to identify, nurture and share innovative and scalable solutions to the challenges facing effective humanitarian assistance.', 'Grants between £75,000 and £150,000 - for development and implementation phases of the innovation process.', 'The aim of the project must be to improve humanitarian practice and must be an innovation. At least one of the partner organisations must be able to demonstrate experience working in humanitarian response.', 'info@humanitarianinnovation.org', '', 'Different areas with application to humanitarian assistance', '', '', '', '', 'Interested applicants should submit an Expression of Interest (EoI), which explains their innovative idea, to the HIF’s online grant management system. First time applicants should register first.', '', 'A', '', '', 'http://www.elrha.org/news/funding-alert-call-for-large-grant-applications-is-open/', 0, 'Observatório', 20150423, '', 'francine.zucco', 'Humanitarian Innovation Fund', '2', 0),
(211, '<br>Lee Kuan Yew Water Prize 2016', 20150423, '00032', 'us_EN', '2016', 20150601, 19000101, 19000101, 'The Lee Kuan Yew Water Prize honours outstanding contributions by individuals or organisations towards solving the world´s water challenges by applying innovative technologies, policies or programmes which benefit humanity.', 'S$300,000, a certificate, and a gold medallion at the award ceremony to be held during the Singapore International Water Week 2016.', 'A valid nominee for the Lee Kuan Yew Water Prize should have made outstanding achievements in any water-related field. <br>Qualified parties, such as leaders of international water companies and water utilities, top academics in water research, policy and management, heads of international organisations, members of government, or distinguished individuals in the water industry are welcome to submit nominations.', 'leekuanyewwaterprize@siww.com.sg', '', 'Water solutions', '', '', '', '', 'The submission of nominations for the Lee Kuan Yew Water Prize 2016 follows a rigorous two-stage process. The first stage is for the nominator to submit a citation of the nominee. Self-nomination and nominations by family members of nominees will not be accepted.', '', 'A', '', '', 'http://www.siww.com.sg/about-prize', 0, 'Observatório', 20150423, '', 'francine.zucco', 'Lee Kuan Yew Water Prize 2016', '4', 0),
(212, 'Prêmio Fundação Banco do Brasil de Tecnologia Social', 20150423, '00110', 'pt_BR', '2015', 20150531, 19000101, 19000101, 'O Prêmio tem por objetivo certificar, premiar e difundir tecnologias sociais já aplicadas e ainda em atividade, em âmbito local, regional ou nacional, que se constituam em efetivas soluções para questões relativas a: água, alimentação, educação, energia, geração de renda, habitação, meio ambiente e saúde.', 'R$ 50.000,00 (cinquenta mil reais) para o 1º lugar de cada categoria e R$ 25.000,00 (vinte e cinco mil reais) para cada um dos dois outros finalistas por categoria.', '1. Estar em atividade há, pelo menos, 2 (dois) anos; <br>2. Possuir resultados comprovados de transformação social; <br>3. Estar sistematizada a ponto de tornar possível sua reaplicação em outras comunidades; <br>4. Contar com o envolvimento da comunidade na sua concepção ou ter sido apropriada por ela em seu desenvolvimento ou reaplicação; <br>5. Respeitar os seguintes princípios e valores: protagonismo social, respeito cultural, cuidado ambiental, solidariedade econômica.', '', '', 'Seis categorias: <br>1. Comunidades Tradicionais, Agricultores Familiares e Assentados da Reforma Agrária; <br>2. Juventude; <br>3. Mulheres; <br>4. Gestores Públicos; <br>5. Universidades e Instituições de Ensino e Pesquisa; <br>6. Tecnologias Sociais para o Meio Urbano.', '', '', '', '', 'As inscrições somente serão efetuadas pela internet no site do prêmio.', '', 'A', '', '', 'http://www.fbb.org.br/tecnologiasocial/', 0, 'Observatório', 20150424, '', 'francine.zucco', 'Prêmio Fundação Banco do Brasil de Tecnologia Social', '4', 0),
(213, '<BR>iBrasil Doctorate mobility scholarships', 20150424, '00078', 'us_EN', '2015', 20150531, 19000101, 19000101, 'The IBRASIL consortium which stands for “Inclusive and Innovative Brazil” has emerged from a long and mature collaboration between Brazilian and European universities. The main objectives of IBRASIL are the training of a new generation of highly qualified teachers, engineers and researchers who are open to inclusive values as well as to social and technological innovation; to foster sustainable joint programmes and common research involving Brazilian and European students, teaching staff and researchers and to increase collaboration between European and Brazilian HEIs, as well as the promotion of tools which facilitate international cooperation and the academic recognition of student mobilities.', '1500 EUR/month (6- or 10-month period).', '1. Must hold Brazilian nationality; <BR>2. Must have not resided nor have carried out their main activity (studies, work, etc) for more than a total of 12 months over the last five years in any of the eligible European countries at the time of submitting their application to the partnership; <BR>3. Must have not benefited in the past from an Erasmus Mundus scholarship for the same type of mobility; <BR>4. Must be enrolled in a doctorate course.', 'ibrasil@univ-lille3.fr', '', 'Education, Teacher Training, Engineering and Technology.', '', '', '', '', 'The Application Form can be downloaded from the web site and filled in English (or exceptionally in Portuguese).', '', 'A', '', '', 'http://ibrasilmundus.eu/general_information', 0, 'Observatório', 20150424, '', 'francine.zucco', 'iBrasil Doctorate mobility scholarships', '1', 0),
(214, '<br>Programa Bragecrim', 20150427, 'CAPES', 'pt_BR', '02/2014', 20150615, 19000101, 19000101, 'O programa Bragecrim (Iniciativa Brasil-Alemanha para Pesquisa Colaborativa em Tecnologia de Manufatura) tem o objetivo de apoiar e financiar projetos conjuntos de pesquisa entre grupos de pesquisa brasileiros e alemães na área de tecnologia de manufatura avançada. <br>A principal meta dos projetos aprovados no âmbito do programa é gerar conhecimento tecnológico fundamental, possibilitando o desenvolvimento de soluções inovadoras para o aprimoramento da produtividade, qualidade e sustentabilidade das companhias industriais tanto brasileiras quanto alemãs. Outro importante objetivo é a troca de conhecimento por meio de missões de trabalho e de estudos de pesquisadores/docentes e estudantes de ambos os países.', '1. Passagens aéreas, seguro saúde e diárias para docentes brasileiros em missão de trabalho na Alemanha; <br>2. Até 10 (dez) bolsas de estudos (em todas as modalidades) por projeto nos termos vigentes da CAPES; <br>3. Recursos de custeio e de capital (aquisição de equipamentos) relacionados às atividades do projeto.', '1. Comprovar a vinculação do projeto a Programa de Pós-Graduação reconhecido pela CAPES; <br>2. Contemplar o intercâmbio de estudantes e a mobilidade de docentes e pesquisadores vinculados à equipe de trabalho; <br>3. Contemplar projeto de pesquisa tecnológica de fronteira em uma temática/tecnologia da cadeia de produção de interesse comum dos proponentes; <br>4. Ser coordenada no Brasil por docente/pesquisador com doutorado há pelo menos 4 anos; <br>5. Apresentar equipe de trabalho com, no mínimo, 2 (dois) docentes/pesquisadores doutores, além do coordenador do projeto.', 'bragecrim@capes.gov.br', '', 'Tecnologia de Manufatura', '', '', '', '', 'As propostas de projetos conjuntos de pesquisa deverão ser apresentadas simultaneamente à CAPES e ao DFG por meio dos formulários eletrônicos próprios de cada agência.', '', 'A', '', '', 'http://capes.gov.br/cooperacao-internacional/alemanha/bragecrim', 0, 'Observatório', 20150427, '', 'francine.zucco', 'Programa Bragecrim - Pesquisa Colaborativa em Tecnologia de Manufatura', '3', 0),
(216, '<br>Banting Postdoctoral Fellowships', 20150427, '00035', 'us_EN', '2015/16', 20150923, 19000101, 19000101, 'Attract and retain top-tier postdoctoral talent, both nationally and internationally; develop their leadership potential; position them for success as research leaders of tomorrow.', '$70,000 per year (taxable)', 'Applicants must have fulfilled all requirements for their degree at the time of application and must not hold a tenure-track or tenured faculty position, nor can they be on leave from such a position. Applicants can submit only one application per competition year to the Banting Postdoctoral Fellowships program.', 'banting@researchnet-recherchenet.ca', '', 'Health; Natural Sciences and Engineering; Social Sciences and Humanities', '', '', '', '', 'Applications must be completed in full collaboration with the potential host institution. Individual application documents can be submitted in either English or French.', '', 'A', '', '', 'http://banting.fellowships-bourses.gc.ca/app-dem/index-eng.html', 0, 'Observatório', 20150427, '', 'francine.zucco', 'Banting Postdoctoral Fellowships', '1', 0),
(215, '<br>Barcelona GSE Master Degrees', 20150427, '00111', 'us_EN', '2015/16', 20150625, 19000101, 19000101, 'Thanks to the participation of a number of companies and institutions, the Barcelona Graduate School of Economics is able to offer more than 700.000 Euros in tuition waivers, based on academic merit. These highly competitive financial awards help the School attract the best and brightest international students. Preference in admission and financial aid will be given to early applicants.', 'Scholarships', '1. Undergraduate/bachelor/grado/laurea, or equivalent degree from an accredited college or university; <br>2. Advanced level of English language skills.', '', '', 'Economics, Finance and Data Science', '', '', '', '', 'The application process for the Barcelona Graduate School of Economics master programs is conducted entirely online.', '', 'A', '', '', 'http://www.barcelonagse.eu/admissions.html', 0, 'Observatório', 20150427, '', 'francine.zucco', 'Barcelona GSE Master Degrees', '1', 0),
(217, 'The Andrew W. Mellon Foundation Grants', 20150429, '00112', 'us_EN', '2015', 19000101, 19000101, 19000101, 'The Andrew W. Mellon Foundation supports a wide range of initiatives to strengthen the humanities, arts, higher education, and cultural heritage.', 'Up to $150,000.', '', '', '', 'Higher Education and Scholarship in the Humanities; Arts and Cultural Heritage; Diversity; Scholarly Communications; and International Higher Education and Strategic Projects', '', '', '', '', 'Draft proposals should be submitted to the Foundation through email in no more than four files: the information sheet; an MS Word file that includes the proposal narrative and budget narrative; an Excel budget spreadsheet using the Foundation’s budget template; and a PDF file containing any additional supporting materials.', '', 'A', '', '', 'https://mellon.org/grants/grantmaking-policies-and-guidelines/grant-proposal-guidelines/', 0, 'Observatório', 20150429, '', 'francine.zucco', 'The Andrew W. Mellon Foundation Grants', '2', 1),
(218, 'Fulbright Professorship on Global Cities at CUNY', 20150429, '00089', 'us_EN', '2015', 20150528, 19000101, 19000101, 'This program will strengthen cooperation between Brazilian and CUNY institutions addressing the challenges facing Global Cities, thus laying a foundation for scientific advancement and broadening students’ knowledge in the field. The research produced through this cooperation should be appropriate for eventual policy application.', 'The grantee will receive full funding for one academic term to support teaching and research activities at CUNY (US $38,400).', 'The candidate must demonstrate outstanding academic qualification and a record of professional experience along with intellectual production in the proposed area during the last ten years in the Brazilian arena. English language proficiency compatible with the proposed teaching and research activities is a requirement. The candidate must hold a Brazilian passport and must have earned the doctoral degree before December 31, 2006. Dual Brazilian/U.S. citizens are not eligible.', 'alexandre@fulbright.org.br', '', 'Global Cities', '', '', '', '', 'The candidate must submit the online application form with all attachments in English.', '', 'A', '', '', 'http://www.fulbright.org.br/content/view/21/87/', 0, 'Observatório', 20150429, '', 'francine.zucco', 'Fulbright Professorship on Global Cities at CUNY', '1', 0),
(219, 'Fulbright Professorship in Democracy and Human Development', 20150429, '00089', 'us_EN', '2015', 20150528, 19000101, 19000101, 'This program will strengthen cooperation between Brazilian institutions and Kellogg Institute that expects fresh perspectives and expertise on contemporary issues in Brazil, which has been a major focus of study at the Institute since the 1980s. The research produced through this cooperation should be appropriate for eventual policy application.', 'The Program will award funding for one visiting scholar for a four-month period - US$ 24,000, housing, health coverage and access to facilities.', 'The candidate must demonstrate outstanding academic qualification and a record of professional experience along with intellectual production in the proposed area during the last ten years in the Brazilian arena. English language proficiency compatible with the proposed activities is a requirement. The candidate must hold a Brazilian passport and must have earned the doctoral degree before December 31, 2006. Dual Brazilian/U.S. citizens are not eligible.', 'alexandre@fulbright.org.br', '', 'Democracy and Human Development', '', '', '', '', 'The candidate must submit the online application form with all attachments in English.', '', 'A', '', '', 'http://www.fulbright.org.br/content/view/61/123/', 0, 'Observatório', 20150429, '', 'francine.zucco', 'Fulbright Professorship in Democracy and Human Development', '1', 0);
INSERT INTO `fomento_editais` (`id_ed`, `ed_titulo`, `ed_data`, `ed_agencia`, `ed_idioma`, `ed_chamada`, `ed_data_1`, `ed_data_2`, `ed_data_3`, `ed_texto_1`, `ed_texto_2`, `ed_texto_3`, `ed_texto_4`, `ed_texto_5`, `ed_texto_6`, `ed_texto_7`, `ed_texto_8`, `ed_texto_9`, `ed_texto_10`, `ed_texto_11`, `ed_texto_12`, `ed_status`, `ed_autor`, `ed_corpo`, `ed_url_externa`, `ed_total_visualizacoes`, `ed_local`, `ed_data_envio`, `ed_document_require`, `ed_login`, `ed_titulo_email`, `ed_edital_tipo`, `ed_fluxo_continuo`) VALUES
(220, 'Fulbright Chair in Agricultural Sciences', 20150429, '00089', 'us_EN', '2015', 20150610, 19000101, 19000101, 'This program will strengthen cooperation between Brazilian institutions and University of Nebraska fostering deeper learning where diverse basic and applied natural, life, earth and social sciences are integrated into the context of a global society and environmental stewardship. The research produced through this cooperation should be appropriate for eventual policy application.', 'The Program will award funding for one visiting scholar for a four-month period - US$ 22,000, housing, health coverage and access to facilities.', 'The candidate must demonstrate outstanding academic qualification and a record of professional experience along with intellectual production in the proposed area during the last ten years in the Brazilian arena. English language proficiency compatible with the proposed activities is a requirement. The candidate must hold a Brazilian passport and must have earned the doctoral degree before December 31, 2006. Dual Brazilian/U.S. citizens are not eligible.', 'alexandre@fulbright.org.br', '', 'Agricultural Sciences.', '', '', '', '', 'The candidate must submit the online application form with all attachments in English.', '', 'A', '', '', 'http://www.fulbright.org.br/content/view/104/152/', 0, 'Observatório', 20150429, '', 'francine.zucco', 'Fulbright Chair in Agricultural Sciences', '1', 0),
(221, 'Fulbright Chair in Environmental Sciences and Policies', 20150430, '00089', 'us_EN', '2015-16', 20150610, 19000101, 19000101, 'This program will strengthen cooperation between Brazilian institutions and the University of Texas at Austin fostering deeper learning where diverse basic and applied natural, life, earth and social sciences are integrated into the context of a global society and environmental stewardship. The research produced through this cooperation should be appropriate for eventual policy application.', 'The Program will award funding for one visiting scholar for a four-month period - US$ 28,000, housing allowance of US$ 8,000, health coverage and access to facilities.', 'The candidate must demonstrate outstanding academic qualification and a record of professional experience along with intellectual production in the proposed area during the last ten years in the Brazilian arena. English language proficiency compatible with the proposed activities is a requirement. The candidate must hold a Brazilian passport and must have earned the doctoral degree before December 31, 2006. Dual Brazilian/U.S. citizens are not eligible.', 'alexandre@fulbright.org.br', '', 'Candidates may focus on fields of study such as: green energy; Environmental law/ policy; Sustainable cities; Environmental activism; or, Community environmental rights.', '', '', '', '', 'The candidate must submit the online application form with all attachments in English. Applications must include a proposal for a workshop and a 3-hour-per-week course for graduate\r\nor advanced undergraduate students on a related theme.', '', 'A', '', '', 'http://www.fulbright.org.br/content/view/60/120/', 0, 'Observatório', 20150430, '', 'francine.zucco', 'Fulbright Chair in Environmental Sciences and Policies', '1', 0),
(222, 'Fulbright Professorship in Brazilian Studies', 20150504, '00089', 'us_EN', '2015', 20150610, 19000101, 19000101, 'This program will strengthen cooperation between Brazilian institutions and UMass – Amherst to promote research, training, and public engagement on the histories, cultures, and politics of Brazil and the U.S. The research produced through this cooperation should be appropriate for eventual policy application.', 'The Program will award funding for one visiting scholar for a four-month period - US$ 18,000, housing, health coverage and access to facilities.', 'The candidate must demonstrate outstanding academic qualification and a record of professional experience along with intellectual production in the Social Sciences during the last ten years in the Brazilian arena. English language proficiency compatible with the proposed activities is a requirement. The candidate must hold a Brazilian passport and must have earned the doctoral degree before December 31, 2006. Dual Brazilian/U.S. citizens are not eligible', 'alexandre@fulbright.org.br', '', 'Preference will be given to candidates with comprehensive knowledge and experience in one or more of the following areas: Race Relations, Women´s and Gender Studies, Social Movements, Social Policy, Cultural Anthropology, Political Sociology, Political Economics, History, Cultural Studies, and/ or Communication', '', '', '', '', 'The candidate must submit the online application form with all attachments in English. Applications must include a proposal for a course for graduate students on a theme relating to Brazilian Studies', '', 'A', '', '', 'http://www.fulbright.org.br/content/view/260/182/', 0, 'Observatório', 20150504, '', 'francine.zucco', 'Fulbright Professorship in Brazilian Studies', '1', 0),
(223, 'Fulbright Visiting Scholar Program in Music and Musicology', 20150504, '00089', 'pt_BR', '2015/16', 20150610, 19000101, 19000101, 'This program will strengthen cooperation between Brazilian institutions and Indiana University to promote the study of music with music educators, performers, scholars and teachers who are dedicated to inspiring and mentoring the next generation of music leaders.', 'The Program will award funding for one visiting scholar for a four-month period - US$ 20,000, housing, health coverage and access to facilities.', 'The candidate must demonstrate outstanding academic qualification and a record of professional experience along with intellectual production in the fields of music and/ or musicology during the last ten years in the Brazilian arena. The candidate must hold a Brazilian passport. Dual Brazilian/U.S. citizens are not eligible. Moreover, the candidate must have an adequate command of the English language; compatible with the proposed activities. Faculties and Researchers must have earned the doctoral degree before December 31, 2006. Musicians, Composers and Performers must have over ten years of professional experience with relevant institutional affiliation in the area.', 'alexandre@fulbright.org.br', '', 'Music and/or Musicology', '', '', '', '', 'The candidate must submit the online application form with all attachments in English.', '', 'A', '', '', 'http://www.fulbright.org.br/content/view/273/188/', 0, 'Observatório', 20150504, '', 'francine.zucco', 'Fulbright Visiting Scholar Program in Music and Musicology', '1', 0),
(224, 'Call for Proposals on Climate Predictability and Inter-Regional Linkages', 20150504, '00113', 'us_EN', '2015-16', 20150601, 19000101, 19000101, 'The Belmont Forum and JPI-Climate have launched a call for proposals on climate predictability and inter-regional linkages (drivers and mechanisms linking Poles & Monsoons for societal usefulness of climate services). <br>This call aims to contribute to the overall challenge of developing climate services with a focus on the role of inter-regional linkages in climate variability and predictability. Major impediments to efficient climate services at regional and local level still exist because of little or poorly understood climate processes (in part caused by a paucity of observations), inadequate dissemination of scientific knowledge, conflicts between climatic and non-climatic stressors and lack of action by decision makers and society at large.', 'Between 1 and 3 M€', 'The proposed project should exhibit that it requires critical mass reachable only with international and regional coordination. Development of research consortia supported by at least three participating partner agencies with at least one outside of Europe is a key criterion.', '', '', 'Topic 1- Understanding past and current variability and trends of regional extremes; <br>Topic 2- Predictability and prediction skills for near&#8208;future variability and trends of regional extremes; <br>Topic 3&#8208; Co&#8208;construction of near term forecast products with users.', '', '', '', '', 'The “Climate predictability and inter-regional linkages” CRA is envisioned as a two-stage Call. Proposers will be asked to submit a pre-proposal (~ 4 pages long) describing the project, the consortium and the tentative budget and, for the projects that will successfully go through stage 1, submission of the full proposal (~ 20 pages long) will follow.', '', 'A', '', '', 'http://belmontforum.org/cra-2015-climate-predictability-and-inter-regional-linkages', 0, 'Observatório', 20150504, '', 'francine.zucco', 'Belmont Forum and JPI-Climate Collaborative Research Action', '3', 0),
(225, 'UK-Brazil Neglected Infectious Diseases Partnership', 20150506, '00048', 'us_EN', '2015', 20150601, 19000101, 19000101, 'The UK-Brazil Neglected Infectious Diseases Partnership initiative aims to provide support for joint Brazilian and UK working in the area of neglected infectious disease research. The objective is to deliver significant 2-3 year research funding for internationally competitive and innovative collaborative projects between scientists from Brazil and the UK that will allow the pursuit of shared research interests.', 'Equipments, travel costs, material and consumables, scolarships (PhD and postdoc).', '1. Present a PhD degree; <br>2. Have great qualifications in the referred area of research; <br>3. Have a UK partner, in accordance to MRC´s eligibility criteria.', 'mrc-confap-cnpq@cnpq.br', '', 'Through this call, the funders are specifically looking for proposals that target biomedical, social and/or economic research studies in neglected infectious diseases that place a significant burden upon the poorest and most vulnerable in Brazilian society.', '', '', '', '', 'In order to identify peer reviewers and convene assessment panels in advance, it is important that researchers indicate their intention to submit a proposal. Please email a preliminary indication by 01 June to mrc-confap-cnpq@cnpq.br. <br>UK and Brazilian applicants must apply separately to their respective funding agencies for the funding component requested within each country, but this must be based around a common scientific plan. Closing Date for investigators to submit their complete proposals to MRS and CONFAP is 01 July.', '', 'A', '', '', 'http://www.mrc.ac.uk/funding/browse/uk-brazil-neglected-infectious-diseases-partnership/', 0, 'Observatório', 20150506, '', 'francine.zucco', 'UK-Brazil Neglected Infectious Diseases Partnership', '3', 0),
(227, '<br>Bolsas PQ/DT/PQ-Sr', 20150506, 'CNPq', 'pt_BR', '2015', 20150814, 19000101, 19000101, 'Busca distinguir o pesquisador, valorizando sua produção científica e/ou tecnológica segundo critérios normativos estabelecidos pelo CNPq.', 'Mensalidade de acordo com o nível da bolsa', 'O pesquisador deve: <br>1. ter título de doutor ou perfil científico/tecnológico equivalente; <br>2. ser brasileiro ou estrangeiro com situação regular no País; <br>3. dedicar-se às atividades constantes de seu pedido de bolsa. <br>Requisitos e critérios mínimos para enquadramento e classificação específicos a cada categoria.', '', '', 'Diversas áreas do conhecimento', '', '', '', '', 'A solicitação deverá ser feita por meio do Formulário de Propostas Online, disponível na Plataforma Carlos Chagas.', '', 'A', '', '', 'http://www.cnpq.br/web/guest/bolsas-no-pais', 0, 'Observatório', 20150506, '', 'francine.zucco', 'Bolsas PQ/DT/PQ-Sr', '1', 0),
(226, 'UK-Brazil Call on Healthy Urban Living and the Social Science of the Food-Water-Energy Nexus', 20150506, '00048', 'us_EN', '2015', 20150702, 19000101, 19000101, 'Proposals are invited for collaborative projects between the UK and Brazil which contribute to the economic development and welfare of Brazil within the areas of Healthy Urban Living and the Social Science of the Food-Water-Energy Nexus. The calls will form part of the Newton Fund commitment to develop bilateral research partnerships and enhance the global research community through developing knowledge.', 'Equipments, travel costs, material and consumables, scholarships (PhD and postdoc).', '1. Present a PhD degree; <br>2. Have great qualifications in the referred area of research; <br>3. Have a UK partner, in accordance to MRC´s eligibility criteria. <br>Projects on Healthy Urban Living must be led by social science; however interdisciplinary research is strongly encouraged.', 'esrc-confap-cnpq@cnpq.br', '', 'Healthy Urban Living and the Social Science of the Food-Water-Energy Nexus.', '', '', '', '', 'As this is a joint application to ESRC and CONFAP/FAPESP, applicants should ensure that proposals include a single identical case for support (10 pages max) and are submitted to both ESRC and FAPESP/CNPq.', '', 'A', '', '', 'http://goo.gl/zfYA5f', 0, 'Observatório', 20150506, '', 'francine.zucco', 'Call on Healthy Urban Living and the Social Science of the Food-Water-Energy Nexus', '3', 0),
(228, 'Endeavour Scholarships and Fellowhships in Australia', 20150507, '00114', 'us_EN', '2015-16', 20150630, 19000101, 19000101, 'Endeavour Scholarships and Fellowships are internationally competitive, merit-based scholarships provided by the Australian Government that support citizens around the world to undertake study, research and professional development in Australia and for Australians to do the same overseas.', 'Travel and establishment allowances, monthly stipend, health insurance.', 'Applicants must: <br>1. be aged 18 years or over at the commencement of their programme; <br>2. commence their proposed programme after 1 January 2016 and no later than 30 November 2016; <br>3. provide all relevant supporting documentation; <br>4. not currently hold or have completed, since 1 January 2014, an Australian Government sponsored scholarship and/or fellowship.', '', '', 'Any field of study in Australian Universities - Masters, PhD, postoc, Vocational Education and Training (VET) and Executive Fellowship.', '', '', '', '', 'Applications must be submitted using the Endeavour Online application system.', '', 'A', '', '', 'https://internationaleducation.gov.au/Endeavour%20program/Scholarships-and-Fellowships/Pages/default.aspx', 0, 'Observatório', 20150507, '', 'francine.zucco', 'Endeavour Scholarships and Fellowhships in Australia', '1', 0),
(229, '2016 Mexican Government Scholarships for International Students', 20150508, '00115', 'us_EN', '2016', 20150831, 19000101, 19000101, 'On behalf of the Ministry of Foreign Affairs, the Mexican Agency for International Development Cooperation (AMEXCID) invites foreign citizens who are interested in studying for a specialization, master’s degree or doctorate, conducting graduate or postdoctoral research, or taking part in an undergraduate or graduate-level academic mobility program, to participate in the 2016 Mexican Government Scholarship Program for International Students.', 'The scholarship includes monthly stipend, registration fees and tuition, health insurance, round-trip international airfare, and transportation to and from Mexico City.', 'Requirements for all applicants: <br>1. Bachelor’s, Master’s, or PhD Degree, as required by the program for which the scholarship is requested; <br>2. Minimum grade point average of eight (8.0) on a scale of 0 to 10, or the equivalent, for the last academic degree received; <br>3. Be accepted to or currently enrolled in a program at one of the participating Mexican institutions.', 'infobecas@sre.gob.mx', '', 'Different disciplines', '', '', '', '', 'No applications will be accepted directly from the applicants. The entire scholarship application process must be done at the Mexican or concurrent  embassy for the applicant’s country.', '', 'A', '', '', 'http://amexcid.gob.mx/index.php/oferta-de-becas-para-extranjeros', 0, 'Observatório', 20150508, '', 'francine.zucco', '2016 Mexican Government Scholarships for International Students', '1', 0),
(230, 'Bolsa para realização de pesquisas em universidades japonesas 2016.', 20150512, 'mext', 'pt_BR', '2016', 19000101, 20150529, 20151220, 'Bolsa para realização de pesquisas em universidades japonesas.\r\nOferece ao interessado oportunidade de cursar o mestrado e/ou doutorado, caso venha a ser aprovado no exame de admissão da universidade japonesa.\r\nInclui curso de língua japonesa nos seis primeiros meses da bolsa, dependendo do nível de conhecimento da língua do aprovado.', 'Bolsa e pagamento de taxas escolares entre outros.', 'Nascidos antes de 02 de Abril de 1981;\r\nBrasileiro sem dupla nacionalidade; \r\nPara cada área existe um background específico, ver edital no site informado.', 'Consulado Geral do Japão em Curitiba\r\nRua Marechal Deodoro 630, 18º andar CEP:80010-912\r\nTel:(41)3322-4919 Fax:(41)3222-0499 \r\nEmail: cultura@c1.mofa.go.jp', '', 'Todas', '', '', '', '', 'Pessoalmente no Consulado Geral do Japão em Curitiba.', 'pdi@pucpr.br', 'A', '', '', 'http://www.curitiba.br.emb-japan.go.jp/bolsa1.html', 0, 'Observatório', 20150512, '', 'jeferson.vieira', 'Oferece ao interessado oportunidade de cursar o mestrado e/ou doutorado.', '1', 0),
(231, 'Securing Water for Food: A Grand Challenge for Development', 20150514, '00070', 'us_EN', '2015', 20150522, 19000101, 19000101, 'This $12.5 million call for proposals focuses on identifying market-driven, low-cost, and scalable solutions that will enable us to improve water efficiency and wastewater reuse; enhance water capture and storage; and reduce the impacts of salinity on aquifers and food production. The third call has an increased focus on cutting-edge, advanced technologies and business models, as well as those that prioritize the engagement of women.', 'Between $100,000 and $3 million in funding and acceleration support', 'Securing Water for Food is open to all organizations regardless of type or size. All applicants must use the funds to implement the innovation in a developing or emerging country. Innovations must directly or indirectly benefit the poor. For Stage 1 (Market-driven product/Business development), just in-kind contribution as matched funding is OK.', 'securingwaterforfood@gmail.com', '', '', '', '', '', '', 'Concept Notes shall be received no later than May 22, 2015 at 5:00 PM EST via the Online Application Platform accessed at: http://securingwaterforfood.org/apply. Applicants should retain a copy of their proposals and accompanying uploaded documents for their records.', '', 'A', '', '', 'http://www.securingwaterforfood.org/round-3-call-3/', 0, 'Observatório', 20150514, '', 'francine.zucco', 'Securing Water for Food: A Grand Challenge for Development', '2', 0),
(3, 'Auxílio Promoção de Eventos ARC/CNPq', 20150520, 'CNPq', 'pt_BR', '09/2015', 20150703, 19000101, 19000101, 'A presente Chamada tem por objetivo selecionar propostas para apoio financeiro da realização no Brasil, de congressos, simpósios, workshops, seminários, ciclos de conferências e outros eventos similares, de abrangência nacional ou internacional, relacionados à Ciência, Tecnologia e Inovação. <br>Linha 1: Destina-se a apoiar eventos nacionais ou internacionais tradicionais da área, promovidos por sociedades ou associações científicas e/ou  tecnológicas ou eventos que sejam realizados periodicamente e que tenham abrangência nacional ou internacional.<br>Linha 2: Destina-se a apoiar eventos de abrangência regional ou eventos que estejam em suas primeiras edições (com histórico inferior a 10 (dez) anos). <br>Linha 3: Destina-se a apoiar eventos MUNDIAIS promovidos por sociedades científicas e/ou tecnológicas mundiais, sediadas ou não no Brasil, que ocorrem periodicamente em diferentes países a cada edição e que serão realizados no Brasil.', 'Itens de custeio. Máx R$ 150 mil para linhas 1 e 3 e R$ 75 mil para linha 2.', 'Quanto ao proponete:\r\n<BR>a) ter vínculo formal com a instituição promotora ou colaboradora do evento;\r\n<BR>b) possuir currículo cadastrado na Plataforma Lattes;\r\n<BR>c) ser obrigatoriamente o coordenador do projeto.\r\n<BR>Quanto à proposta: O evento deverá ser necessariamente relacionado à Ciência, Tecnologia ou Inovação, de abrangência nacional ou internacional e ser realizado no Brasil.\r\n<br><br>Para linhas 1 e 2, eventos realizados entre  01/07/2015 e 31/12/2015.\r\n<br> Para linha 3, eventos entre 01/07/2015 e 30/06/2016.', 'chamadaarc2015@cnpq.br', '', '', '', '', '', '', 'As propostas devem ser encaminhadas ao CNPq exclusivamente via Internet, utilizando-se do Formulário de Propostas online, disponível na Plataforma Carlos Chagas.', '', 'A', '', '', 'http://goo.gl/uOuFQu', 0, 'Observatório', 20150520, '', 'francine.zucco', 'Apoio CNPq à realização de eventos', '5', 0),
(232, 'Prêmio de Incentivo em Ciência e Tecnologia para o SUS - 2015', 20150528, '00041', 'pt_BR', '01/2015', 20150703, 19000101, 19000101, 'O Prêmio de Incentivo em Ciência e Tecnologia para o SUS - 2015 é uma iniciativa do Ministério da Saúde promovida por meio da Secretaria de Ciência e Tecnologia e Insumos Estratégicos. Esta ação tem como objetivo proporcionar reconhecimento ao pesquisador e profissionais da área da saúde pelo seu papel no desenvolvimento social e econômico do país.', '<br>CATEGORIA VALOR</br>\r\n<br>a) Tese de doutorado R$ 50.000,00</br>\r\n<br>b) Dissertação de mestrado R$ 30.000,00</br>\r\n<br>c) Trabalho científico publicado R$ 50.000,00</br>\r\n<br>d) Monografia de especialização/residência R$ 15.000,00</br>', '<br>a) Categoria Trabalho Científico Publicado: ter publicado artigo científico, texto completo, em revista científica indexada (versão impressa ou eletrônica) no período de 27 de maio de 2014 a 17 de maio de 2015;</br>\r\n<br>b) Categoria Tese de Doutorado: ter concluído curso de pós-graduação em nível de Doutorado e tese aprovada em banca examinadora no período de 27 de maio de 2014 a 17 de maio de 2015;</br>\r\n<br>c) Categoria Dissertação de Mestrado: ter concluído curso de pósgraduação em nível de Mestrado e dissertação aprovada em banca examinadora no período de 27 de maio de 2014 a 17 de maio de 2015;</br>\r\n<br>d) Categoria Monografia de Especialização ou Residência: ter concluído curso de pós-graduação em nível de Especialização ou Residência e monografia aprovada no período de 27 de maio de 2014 a 17 de maio de 2015.</br>', 'decit.premio@saude.gov.br', '', 'Todas as áreas com aplicação em saúde.', '', '', '', '', 'As inscrições para o Prêmio de Incentivo em Ciência e Tecnologia para o SUS –\r\n2015 são efetuadas somente via internet, no endereço eletrônico\r\nwww.saude.gov.br/sisct no período entre às 10 horas do dia 18 de maio de 2015, até às 18h do dia 03 de julho de 2015, observado o horário oficial de Brasília-DF', 'pdi@pucpr.br', 'A', '', '', 'http://portalsaude.saude.gov.br/images/pdf/2015/maio/15/XIV-PREMIO-INCENTIVO-CIENCIA-E-TECNOLOGIA-SUS.pdf', 0, 'Observatório', 20150528, '', 'jeferson.vieira', 'Prêmio de Incentivo em Ciência e Tecnologia para o SUS - 2015', '4', 0),
(233, 'Fomento e Apoio à Pesquisa, Capacitação Científica e Assessoramento com Foco na Promoção e Defesa dos Direitos de Crianças e Jovens.', 20150609, 'PUCPR', 'pt_BR', '01/2015', 19000101, 20150703, 20150713, 'A Pró-Reitoria de Pesquisa e Pós-Graduação – PRPPG,  juntamente com a Rede Marista de Solidariedade – RMS tem como <b>objetivo</b> fomentar e apoiar financeiramente a realização de projetos de pesquisa de natureza acadêmica destinada à produção de conhecimento, com identificação e análise de estudos (pesquisas), cujo foco seja a promoção e defesa dos direitos das infâncias e juventudes, com vistas a subsidiar ações e/ou intervenções para sua promoção e garantia, prioritariamente com o foco nas populações empobrecidas ou representativas.', 'Está previsto para o presente edital o apoio financeiro para até 02 (dois) pesquisadores.<br>\r\n\r\nSão financiáveis: <br>\r\na) Isenção de Mensalidade para mestrado;  <br>\r\nb) Bolsa-auxílio mensal de R$ 2.000,00 destinada ao estudante; <br>\r\nc) Recurso de custeio no valor de R$ 5.000,00 para gastos com inscrição no evento, passagens aéreas, hospedagem e alimentação para o estudante participar de seminário/congresso e outras atividades fundamentais à realização da pesquisa, bem como para gastos com publicação do trabalho realizado.', 'As propostas deverão obrigatoriamente, se enquadrar em uma ou mais  áreas de conhecimento de acordo com as temáticas  da Rede Marista de Solidariedade.<br>\r\nQuanto ao proponente, são elegíveis os docentes com vínculo efetivo junto aos Programas de Pós-Graduação <i>stricto sensu</i> da PUCPR.', '', '', '•	Participação Infantil como Direito <br>\r\n•	Direito de crianças e adolescentes de viver sem violência <br>\r\n•	Migração Infantil e o Direito de viver em família <br>\r\n•	Internet como direito humano e redes sociais <br>\r\n•	Educomunicação <br>\r\n•	Acesso à justiça de crianças e adolescentes <br>\r\n•	Culturas juvenis <br>\r\n•	Dependência química - drogas lícitas e ilícitas – prevenção e tratamento <br>\r\n•	Educação Infantil como Direito <br>\r\n•	Educação Integral como Direito <br>\r\n•	Espaços de lazer nos territórios de vulnerabilidade <br>\r\n•	Infâncias e juventudes rurais <br>\r\n•	Investimento Público e a garantia dos direitos das infâncias e juventudes <br>\r\n•	Juventudes e espiritualidade <br>\r\n•	Juventudes e mercado de trabalho <br>\r\n•	Mercado de consumo e as infâncias e juventudes <br>\r\n•	Novas tecnologias e seus impactos na promoção dos Direitos das infâncias e juventudes <br>\r\n•	Participação da criança, do adolescente e jovem como Direito <br>\r\n•	Qualificação profissional e inserção no mundo do trabalho das juventudes <br>\r\n•	Redes juvenis <br>\r\n•	Sistema de Garantia de Direitos <br>\r\n•	Situação dos Direitos das infâncias e juventudes <br>\r\n•	Violência urbana e institucional', '', '', '', '', 'A proposta deverá ser enviada à Diretoria de Pesquisa/Observatório de Pesquisa, Desenvolvimento e Inovação (PD&I) via e-mail para pdi@pucpr.br.', 'Para esclarecimentos e auxílio, favor entrar em contato com o Observatório de Pesquisa, Desenvolvimento & Inovação - pdi@pucpr.br, (41) 3271-2128.', 'B', '', '', 'http://www.pucpr.br/pesquisacientifica/prppg/editaissociais.php', 0, 'Observatório', 20150609, '', 'e.bianco', 'Edital de Chamada de Projetos Sociais nº 01/2015', '1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `fomento_edital_categoria`
--

CREATE TABLE IF NOT EXISTS `fomento_edital_categoria` (
`id_catp` bigint(20) unsigned NOT NULL,
  `catp_produto` int(7) DEFAULT NULL,
  `catp_categoria` char(5) DEFAULT NULL,
  `catp_ativo` int(11) DEFAULT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=432 ;

--
-- Dumping data for table `fomento_edital_categoria`
--

INSERT INTO `fomento_edital_categoria` (`id_catp`, `catp_produto`, `catp_categoria`, `catp_ativo`) VALUES
(1, 40, '00036', 1),
(2, 40, '00040', 1),
(3, 3, '00005', 1),
(4, 40, '00044', 1),
(5, 0, '00002', 1),
(6, 0, '00007', 1),
(7, 38, '00002', 1),
(8, 34, '00005', 1),
(9, 9, '00005', 1),
(10, 9, '00031', 1),
(11, 11, '00005', 1),
(12, 11, '00033', 1),
(13, 12, '00005', 1),
(14, 12, '00034', 1),
(15, 15, '00005', 1),
(16, 15, '00034', 1),
(17, 13, '00005', 1),
(18, 13, '00033', 1),
(19, 20, '00002', 1),
(20, 41, '00008', 1),
(21, 1, '00002', 1),
(22, 1, '00007', 1),
(23, 1, '00008', 1),
(24, 1, '00009', 1),
(25, 1, '00011', 1),
(26, 1, '00012', 1),
(27, 1, '00026', 1),
(28, 41, '00009', 1),
(29, 39, '00038', 1),
(30, 42, '00036', 1),
(31, 42, '00044', 1),
(32, 22, '00008', 1),
(33, 22, '00009', 1),
(34, 23, '00003', 1),
(35, 43, '00043', 1),
(36, 6, '00005', 1),
(37, 6, '00017', 1),
(38, 25, '00002', 1),
(39, 21, '00037', 1),
(40, 26, '00002', 1),
(41, 24, '00002', 1),
(42, 32, '00002', 1),
(43, 45, '00041', 1),
(44, 46, '00036', 1),
(45, 29, '00005', 1),
(46, 30, '00003', 1),
(47, 18, '00036', 1),
(48, 27, '00038', 1),
(49, 28, '00037', 1),
(50, 31, '00036', 1),
(51, 33, '00036', 1),
(52, 33, '00038', 1),
(53, 33, '00039', 1),
(54, 33, '00040', 1),
(55, 33, '00044', 1),
(56, 33, '00043', 1),
(57, 44, '00038', 1),
(58, 44, '00039', 1),
(59, 44, '00045', 1),
(60, 14, '00036', 1),
(61, 14, '00040', 1),
(62, 14, '00044', 1),
(63, 35, '00038', 1),
(64, 35, '00039', 1),
(65, 44, '00040', 1),
(66, 44, '00041', 1),
(67, 44, '00042', 1),
(68, 44, '00043', 1),
(69, 37, '00036', 1),
(70, 47, '00003', 1),
(71, 36, '00038', 1),
(72, 36, '00040', 1),
(73, 48, '00003', 1),
(74, 49, '00003', 1),
(75, 50, '00005', 1),
(76, 51, '00005', 1),
(77, 53, '00005', 1),
(78, 17, '00005', 1),
(79, 52, '00005', 1),
(80, 19, '00002', 1),
(81, 54, '00005', 1),
(82, 55, '00045', 1),
(83, 56, '00036', 1),
(84, 57, '00038', 1),
(85, 57, '00040', 1),
(86, 58, '00036', 1),
(87, 58, '00044', 1),
(88, 59, '00036', 1),
(89, 59, '00044', 1),
(90, 60, '00036', 1),
(91, 60, '00042', 1),
(92, 60, '00044', 1),
(93, 60, '00043', 1),
(94, 61, '00036', 1),
(95, 61, '00044', 1),
(96, 63, '00036', 1),
(97, 63, '00038', 1),
(98, 63, '00040', 1),
(99, 62, '00002', 1),
(100, 65, '00005', 1),
(101, 66, '00005', 1),
(102, 66, '00009', 1),
(103, 67, '00003', 1),
(104, 67, '00009', 1),
(105, 68, '00036', 1),
(106, 68, '00044', 1),
(107, 69, '00036', 1),
(108, 69, '00044', 1),
(109, 70, '00036', 1),
(110, 70, '00044', 1),
(111, 71, '00036', 1),
(112, 71, '00044', 1),
(113, 72, '00036', 1),
(114, 72, '00044', 1),
(115, 73, '00036', 1),
(116, 73, '00044', 1),
(117, 74, '00036', 1),
(118, 74, '00044', 1),
(119, 75, '00036', 1),
(120, 75, '00044', 1),
(121, 76, '00036', 1),
(122, 76, '00044', 1),
(123, 77, '00036', 1),
(124, 77, '00044', 1),
(125, 78, '00002', 1),
(126, 78, '00009', 1),
(127, 64, '00040', 1),
(128, 79, '00040', 1),
(129, 80, '00040', 1),
(130, 81, '00039', 1),
(131, 81, '00045', 1),
(132, 81, '00041', 1),
(133, 81, '00042', 1),
(134, 81, '00043', 1),
(135, 82, '00005', 1),
(136, 82, '00009', 1),
(137, 83, '00005', 1),
(138, 83, '00009', 1),
(139, 84, '00040', 1),
(140, 85, '00005', 1),
(141, 86, '00036', 1),
(142, 86, '00038', 1),
(143, 86, '00041', 1),
(144, 86, '00044', 1),
(145, 86, '00043', 1),
(146, 87, '00038', 1),
(147, 87, '00039', 1),
(148, 87, '00040', 1),
(149, 87, '00043', 1),
(150, 88, '00005', 1),
(151, 89, '00005', 1),
(152, 89, '00009', 1),
(153, 92, '00005', 1),
(154, 92, '00009', 1),
(155, 93, '00043', 1),
(156, 94, '00038', 1),
(157, 95, '00037', 1),
(158, 96, '00003', 1),
(159, 96, '00009', 1),
(160, 97, '00036', 1),
(161, 97, '00044', 1),
(162, 98, '00036', 1),
(163, 98, '00044', 1),
(164, 100, '00036', 1),
(165, 100, '00044', 1),
(166, 99, '00007', 1),
(167, 99, '00008', 1),
(168, 99, '00009', 1),
(169, 101, '00036', 1),
(170, 101, '00044', 1),
(171, 102, '00037', 1),
(172, 103, '00036', 1),
(173, 103, '00044', 1),
(174, 104, '00036', 1),
(175, 104, '00040', 1),
(176, 104, '00044', 1),
(177, 105, '00002', 1),
(178, 106, '00003', 1),
(179, 107, '00039', 1),
(180, 107, '00041', 1),
(181, 107, '00042', 1),
(182, 107, '00043', 1),
(183, 108, '00003', 1),
(184, 108, '00009', 1),
(185, 109, '00045', 1),
(186, 109, '00041', 1),
(187, 109, '00042', 1),
(188, 109, '00043', 1),
(189, 110, '00003', 1),
(190, 111, '00003', 1),
(191, 112, '00005', 1),
(192, 112, '00009', 1),
(193, 90, '00036', 1),
(194, 90, '00045', 1),
(195, 90, '00041', 1),
(196, 90, '00042', 1),
(197, 90, '00043', 1),
(198, 114, '00005', 1),
(199, 114, '00009', 1),
(200, 115, '00003', 1),
(201, 115, '00009', 1),
(202, 113, '00038', 1),
(203, 116, '00005', 1),
(204, 116, '00009', 1),
(205, 117, '00003', 1),
(206, 117, '00009', 1),
(207, 118, '00036', 1),
(208, 118, '00038', 1),
(209, 118, '00044', 1),
(210, 119, '00036', 1),
(211, 119, '00044', 1),
(212, 120, '00003', 1),
(213, 120, '00009', 1),
(214, 121, '00003', 1),
(215, 121, '00009', 1),
(216, 122, '00043', 1),
(217, 123, '00036', 1),
(218, 123, '00038', 1),
(219, 123, '00040', 1),
(220, 124, '00005', 1),
(221, 124, '00009', 1),
(222, 125, '00005', 1),
(223, 125, '00009', 1),
(224, 126, '00005', 1),
(225, 126, '00009', 1),
(226, 128, '00036', 1),
(227, 128, '00043', 1),
(228, 129, '00036', 1),
(229, 129, '00038', 1),
(230, 129, '00039', 1),
(231, 129, '00040', 1),
(232, 129, '00044', 1),
(233, 130, '00005', 1),
(234, 131, '00038', 1),
(235, 131, '00040', 1),
(236, 132, '00042', 1),
(237, 133, '00036', 1),
(238, 133, '00040', 1),
(239, 133, '00044', 1),
(240, 141, '00005', 1),
(241, 141, '00009', 1),
(242, 142, '00005', 1),
(243, 136, '00045', 1),
(244, 136, '00041', 1),
(245, 136, '00042', 1),
(246, 136, '00043', 1),
(247, 139, '00005', 1),
(248, 135, '00005', 1),
(249, 143, '00037', 1),
(250, 134, '00003', 1),
(251, 140, '00005', 1),
(252, 140, '00009', 1),
(253, 144, '00045', 1),
(254, 144, '00042', 1),
(255, 144, '00043', 1),
(256, 145, '00036', 1),
(257, 145, '00038', 1),
(258, 145, '00039', 1),
(259, 145, '00040', 1),
(260, 145, '00044', 1),
(261, 145, '00043', 1),
(262, 146, '00036', 1),
(263, 146, '00044', 1),
(264, 147, '00003', 1),
(265, 148, '00005', 1),
(266, 150, '00043', 1),
(267, 138, '00005', 1),
(268, 151, '00045', 1),
(269, 152, '00002', 1),
(270, 149, '00002', 1),
(271, 137, '00038', 1),
(272, 153, '00036', 1),
(273, 153, '00038', 1),
(274, 153, '00044', 1),
(275, 154, '00038', 1),
(276, 154, '00045', 1),
(277, 154, '00042', 1),
(278, 154, '00043', 1),
(279, 155, '00036', 1),
(280, 155, '00038', 1),
(281, 155, '00040', 1),
(282, 156, '00003', 1),
(283, 157, '00043', 1),
(284, 158, '00045', 1),
(285, 158, '00041', 1),
(286, 158, '00042', 1),
(287, 158, '00043', 1),
(288, 159, '00036', 1),
(289, 159, '00044', 1),
(290, 161, '00042', 1),
(291, 162, '00005', 1),
(292, 163, '00036', 1),
(293, 163, '00039', 1),
(294, 163, '00045', 1),
(295, 163, '00040', 1),
(296, 163, '00041', 1),
(297, 163, '00042', 1),
(298, 163, '00044', 1),
(299, 163, '00043', 1),
(300, 164, '00005', 1),
(301, 165, '00036', 1),
(302, 165, '00038', 1),
(303, 165, '00040', 1),
(304, 160, '00036', 1),
(305, 160, '00040', 1),
(306, 168, '00043', 1),
(307, 169, '00038', 1),
(308, 167, '00036', 1),
(309, 167, '00044', 1),
(310, 170, '00005', 1),
(311, 171, '00036', 1),
(312, 171, '00044', 1),
(313, 173, '00003', 1),
(314, 174, '00005', 1),
(315, 172, '00002', 1),
(316, 175, '00036', 1),
(317, 175, '00044', 1),
(318, 176, '00005', 1),
(319, 176, '00009', 1),
(320, 166, '00002', 1),
(321, 2, '00003', 1),
(322, 2, '00009', 1),
(323, 183, '00038', 1),
(324, 183, '00039', 1),
(325, 183, '00040', 1),
(326, 177, '00036', 1),
(327, 177, '00044', 1),
(328, 178, '00038', 1),
(329, 178, '00041', 1),
(330, 178, '00043', 1),
(331, 179, '00038', 1),
(332, 179, '00043', 1),
(333, 180, '00036', 1),
(334, 180, '00038', 1),
(335, 180, '00045', 1),
(336, 180, '00040', 1),
(337, 180, '00044', 1),
(338, 181, '00003', 1),
(339, 182, '00036', 1),
(340, 182, '00038', 1),
(341, 182, '00040', 1),
(342, 184, '00003', 1),
(343, 185, '00003', 1),
(344, 186, '00005', 1),
(345, 187, '00005', 1),
(346, 188, '00005', 1),
(347, 189, '00005', 1),
(348, 190, '00003', 1),
(349, 191, '00036', 1),
(350, 191, '00040', 1),
(351, 192, '00041', 1),
(352, 194, '00005', 1),
(353, 195, '00038', 1),
(354, 195, '00043', 1),
(355, 193, '00005', 1),
(356, 196, '00005', 1),
(357, 197, '00005', 1),
(358, 197, '00009', 1),
(359, 198, '00005', 1),
(360, 199, '00036', 1),
(361, 199, '00044', 1),
(362, 200, '00043', 1),
(363, 201, '00002', 1),
(364, 201, '00009', 1),
(365, 202, '00036', 1),
(366, 202, '00044', 1),
(367, 203, '00036', 1),
(368, 203, '00040', 1),
(369, 204, '00036', 1),
(370, 204, '00038', 1),
(371, 204, '00039', 1),
(372, 204, '00040', 1),
(373, 204, '00044', 1),
(374, 205, '00003', 1),
(375, 206, '00005', 1),
(376, 207, '00005', 1),
(377, 208, '00038', 1),
(378, 208, '00045', 1),
(379, 209, '00003', 1),
(380, 210, '00005', 1),
(381, 211, '00036', 1),
(382, 211, '00038', 1),
(383, 212, '00005', 1),
(384, 213, '00038', 1),
(385, 213, '00043', 1),
(386, 214, '00038', 1),
(387, 215, '00045', 1),
(388, 216, '00003', 1),
(389, 217, '00041', 1),
(390, 217, '00043', 1),
(391, 218, '00039', 1),
(392, 219, '00042', 1),
(393, 219, '00043', 1),
(394, 220, '00040', 1),
(395, 221, '00038', 1),
(396, 221, '00039', 1),
(397, 221, '00042', 1),
(398, 222, '00045', 1),
(399, 222, '00041', 1),
(400, 222, '00042', 1),
(401, 222, '00043', 1),
(402, 223, '00041', 1),
(403, 224, '00038', 1),
(404, 224, '00039', 1),
(405, 225, '00036', 1),
(406, 225, '00044', 1),
(407, 226, '00036', 1),
(408, 226, '00038', 1),
(409, 226, '00039', 1),
(410, 226, '00040', 1),
(411, 226, '00044', 1),
(412, 226, '00043', 1),
(413, 227, '00003', 1),
(414, 227, '00009', 1),
(415, 228, '00005', 1),
(416, 229, '00005', 1),
(417, 230, '00002', 1),
(418, 230, '00009', 1),
(419, 230, '00036', 1),
(420, 230, '00038', 1),
(421, 230, '00039', 1),
(422, 230, '00045', 1),
(423, 230, '00040', 1),
(424, 230, '00041', 1),
(425, 230, '00042', 1),
(426, 230, '00044', 1),
(427, 230, '00043', 1),
(428, 231, '00038', 1),
(429, 231, '00039', 1),
(430, 231, '00040', 1),
(431, 232, '00005', 1);

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

-- --------------------------------------------------------

--
-- Table structure for table `logins_log`
--

CREATE TABLE IF NOT EXISTS `logins_log` (
`id_ul` bigint(20) unsigned NOT NULL,
  `ul_data` int(11) NOT NULL,
  `ul_hora` char(8) NOT NULL,
  `ul_ip` char(15) NOT NULL,
  `ul_proto` char(5) NOT NULL,
  `ul_cpf` char(15) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `logins_log`
--

INSERT INTO `logins_log` (`id_ul`, `ul_data`, `ul_hora`, `ul_ip`, `ul_proto`, `ul_cpf`) VALUES
(14, 20150611, '11:55:00', '127.0.0.1', 'LOGIN', '72952105987'),
(15, 20150611, '13:48:41', '127.0.0.1', 'LOGIN', '72952105987'),
(16, 20150611, '15:33:25', '127.0.0.1', 'ADR', '72952105987'),
(17, 20150611, '15:34:10', '127.0.0.1', 'ADR', '72952105987'),
(18, 20150611, '15:35:35', '127.0.0.1', 'ADR', '72952105987'),
(19, 20150611, '15:48:15', '127.0.0.1', 'ADR', '72952105987'),
(20, 20150611, '17:11:34', '127.0.0.1', 'ADR', '72952105987'),
(21, 20150611, '17:24:15', '127.0.0.1', 'LOGIN', '72952105987'),
(22, 20150611, '17:24:20', '127.0.0.1', 'LOGIN', '72952105987'),
(23, 20150612, '08:01:38', '127.0.0.1', 'ADR', '72952105987'),
(24, 20150613, '09:43:36', '127.0.0.1', 'ADR', '72952105987'),
(25, 20150614, '18:03:47', '127.0.0.1', 'ADR', '72952105987'),
(26, 20150614, '18:03:50', '127.0.0.1', 'ADR', '72952105987'),
(27, 20150615, '06:56:08', '127.0.0.1', 'ADR', '72952105987');

-- --------------------------------------------------------

--
-- Table structure for table `logins_perfil`
--

CREATE TABLE IF NOT EXISTS `logins_perfil` (
`id_usp` bigint(20) unsigned NOT NULL,
  `usp_codigo` char(4) DEFAULT NULL,
  `usp_descricao` char(50) DEFAULT NULL,
  `usp_ativo` int(11) DEFAULT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `logins_perfil`
--

INSERT INTO `logins_perfil` (`id_usp`, `usp_codigo`, `usp_descricao`, `usp_ativo`) VALUES
(1, '#MAS', 'Master', 1),
(2, '#ADM', 'Admin', 1),
(3, '#MEM', 'Member of committee', 1),
(4, '#ADC', 'Ad Hoc', 1),
(5, '#CPI', 'Coordenador PIBIC', 1),
(6, '#SPI', 'Secretaria PIBIC', 1),
(7, '#SCR', 'Secretaria Pesquisa', 1),
(8, '#COO', 'Coordenador Pesquisa', 1),
(9, '#RES', 'Pesquisador', 1),
(10, '#CSF', 'Ciência sem Fronteiras', 1),
(11, '#PIB', 'Membros do PIBIC', 1),
(12, '#PIT', 'Revisores e Tradutores PIBIC/PIBITI', 1),
(13, '#CEU', 'Membro do CEUA', 1),
(14, '#CES', 'Secretaria do CEUA', 1),
(15, '#CPS', 'Secretária Executiva do CIP', 1),
(16, '#SEP', 'Secretaria da Pós-Graduação', 1),
(17, '#SPA', 'Secretaria do PPG Gestão Urbana', 1),
(18, '#SPB', 'Secretaria do PPG Educação', 1),
(19, '#SPC', 'Secretaria do PPG Ciências da Saúde', 1),
(20, '#OBS', 'Observador CIP', 1),
(21, '#CNQ', 'Observador CNPq', 1),
(22, '#SPD', 'Secretaria do PPG  Engenharia de Produção e Sistem', 1),
(23, '#SPE', 'Secretaria do PPG Odontologia', 1),
(24, '#SPF', 'Secretaria do PPG Administração', 1),
(25, '#SPR', 'Secretaria do PPG Ciência Animal', 1),
(26, '#SPH', 'Secretaria do PPG Teologia', 1),
(27, '#SPG', 'Secretaria Executiva da Pós-Graduação', 1),
(28, '#SPJ', 'Secretaria do PPG Direito', 1),
(29, '#SPL', 'Secretaria do PPG Filosofia', 1),
(30, '#SPM', 'Secretaria do PPG Engenharia Mecânica', 1),
(31, '#SPN', 'Secretaria do PPG Bioética', 1),
(32, '#SPP', 'Secretaria do PPG Gestão de Cooperativas', 1),
(33, '#SPO', 'Secretaria do PPG Informática', 1),
(34, '#SPT', 'Secretaria do PPG Tecnologia em Saúde', 1),
(35, '#CPP', 'Coordenador Administrativo do PIBIC/PIBITI', 1),
(36, '#FNP', 'Fundo de Pesquisa - Adm', 1),
(37, '#DIP', 'Diretora de Pesquisa', 1),
(38, '#TST', 'Testing ground', 1);

-- --------------------------------------------------------

--
-- Table structure for table `logins_perfil_ativo`
--

CREATE TABLE IF NOT EXISTS `logins_perfil_ativo` (
`id_up` bigint(20) unsigned NOT NULL,
  `up_perfil` tinyint(4) DEFAULT '0',
  `up_data` date DEFAULT '0000-00-00',
  `up_data_end` date DEFAULT '0000-00-00',
  `up_ativo` tinyint(11) DEFAULT NULL,
  `up_user` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pais`
--

CREATE TABLE IF NOT EXISTS `pais` (
`id` int(11) NOT NULL,
  `iso` char(2) NOT NULL,
  `iso3` char(3) NOT NULL,
  `numcode` char(3) NOT NULL,
  `nome` varchar(80) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=245 ;

--
-- Dumping data for table `pais`
--

INSERT INTO `pais` (`id`, `iso`, `iso3`, `numcode`, `nome`) VALUES
(1, 'AF', 'AFG', '004', 'Afeganistão'),
(2, 'ZA', 'ZAF', '710', 'África do Sul'),
(3, 'AX', 'ALA', '248', 'Åland, Ilhas'),
(4, 'AL', 'ALB', '008', 'Albânia'),
(5, 'DE', 'DEU', '276', 'Alemanha'),
(6, 'AD', 'AND', '020', 'Andorra'),
(7, 'AO', 'AGO', '024', 'Angola'),
(8, 'AI', 'AIA', '660', 'Anguilla'),
(9, 'AQ', 'ATA', '010', 'Antárctida'),
(10, 'AG', 'ATG', '028', 'Antigua e Barbuda'),
(11, 'AN', 'ANT', '530', 'Antilhas Holandesas'),
(12, 'SA', 'SAU', '682', 'Arábia Saudita'),
(13, 'DZ', 'DZA', '012', 'Argélia'),
(14, 'AR', 'ARG', '032', 'Argentina'),
(15, 'AM', 'ARM', '051', 'Arménia'),
(16, 'AW', 'ABW', '533', 'Aruba'),
(17, 'AU', 'AUS', '036', 'Austrália'),
(18, 'AT', 'AUT', '040', 'Áustria'),
(19, 'AZ', 'AZE', '031', 'Azerbeijão'),
(20, 'BS', 'BHS', '044', 'Bahamas'),
(21, 'BH', 'BHR', '048', 'Bahrain'),
(22, 'BD', 'BGD', '050', 'Bangladesh'),
(23, 'BB', 'BRB', '052', 'Barbados'),
(24, 'BE', 'BEL', '056', 'Bélgica'),
(25, 'BZ', 'BLZ', '084', 'Belize'),
(26, 'BJ', 'BEN', '204', 'Benin'),
(27, 'BM', 'BMU', '060', 'Bermuda'),
(28, 'BY', 'BLR', '112', 'Bielo-Rússia'),
(29, 'BO', 'BOL', '068', 'Bolívia'),
(30, 'BA', 'BIH', '070', 'Bósnia-Herzegovina'),
(31, 'BW', 'BWA', '072', 'Botswana'),
(32, 'BV', 'BVT', '074', 'Bouvet, Ilha'),
(33, 'BR', 'BRA', '076', 'Brasil'),
(34, 'BN', 'BRN', '096', 'Brunei'),
(35, 'BG', 'BGR', '100', 'Bulgária'),
(36, 'BF', 'BFA', '854', 'Burkina Faso'),
(37, 'BI', 'BDI', '108', 'Burundi'),
(38, 'BT', 'BTN', '064', 'Butão'),
(39, 'CV', 'CPV', '132', 'Cabo Verde'),
(40, 'KH', 'KHM', '116', 'Cambodja'),
(41, 'CM', 'CMR', '120', 'Camarões'),
(42, 'CA', 'CAN', '124', 'Canadá'),
(43, 'KY', 'CYM', '136', 'Cayman, Ilhas'),
(44, 'KZ', 'KAZ', '398', 'Cazaquistão'),
(45, 'CF', 'CAF', '140', 'Centro-africana, República'),
(46, 'TD', 'TCD', '148', 'Chade'),
(47, 'CZ', 'CZE', '203', 'Checa, República'),
(48, 'CL', 'CHL', '152', 'Chile'),
(49, 'CN', 'CHN', '156', 'China'),
(50, 'CY', 'CYP', '196', 'Chipre'),
(51, 'CX', 'CXR', '162', 'Christmas, Ilha'),
(52, 'CC', 'CCK', '166', 'Cocos, Ilhas'),
(53, 'CO', 'COL', '170', 'Colômbia'),
(54, 'KM', 'COM', '174', 'Comores'),
(55, 'CG', 'COG', '178', 'Congo, República do'),
(56, 'CD', 'COD', '180', 'Congo, República Democrática do (antigo Zaire)'),
(57, 'CK', 'COK', '184', 'Cook, Ilhas'),
(58, 'KR', 'KOR', '410', 'Coreia do Sul'),
(59, 'KP', 'PRK', '408', 'Coreia, República Democrática da (Coreia do Norte)'),
(60, 'CI', 'CIV', '384', 'Costa do Marfim'),
(61, 'CR', 'CRI', '188', 'Costa Rica'),
(62, 'HR', 'HRV', '191', 'Croácia'),
(63, 'CU', 'CUB', '192', 'Cuba'),
(64, 'DK', 'DNK', '208', 'Dinamarca'),
(65, 'DJ', 'DJI', '262', 'Djibouti'),
(66, 'DM', 'DMA', '212', 'Dominica'),
(67, 'DO', 'DOM', '214', 'Dominicana, República'),
(68, 'EG', 'EGY', '818', 'Egipto'),
(69, 'SV', 'SLV', '222', 'El Salvador'),
(70, 'AE', 'ARE', '784', 'Emiratos Árabes Unidos'),
(71, 'EC', 'ECU', '218', 'Equador'),
(72, 'ER', 'ERI', '232', 'Eritreia'),
(73, 'SK', 'SVK', '703', 'Eslováquia'),
(74, 'SI', 'SVN', '705', 'Eslovénia'),
(75, 'ES', 'ESP', '724', 'Espanha'),
(76, 'US', 'USA', '840', 'Estados Unidos da América'),
(77, 'EE', 'EST', '233', 'Estónia'),
(78, 'ET', 'ETH', '231', 'Etiópia'),
(79, 'FO', 'FRO', '234', 'Faroe, Ilhas'),
(80, 'FJ', 'FJI', '242', 'Fiji'),
(81, 'PH', 'PHL', '608', 'Filipinas'),
(82, 'FI', 'FIN', '246', 'Finlândia'),
(83, 'FR', 'FRA', '250', 'França'),
(84, 'GA', 'GAB', '266', 'Gabão'),
(85, 'GM', 'GMB', '270', 'Gâmbia'),
(86, 'GH', 'GHA', '288', 'Gana'),
(87, 'GE', 'GEO', '268', 'Geórgia'),
(88, 'GS', 'SGS', '239', 'Geórgia do Sul e Sandwich do Sul, Ilhas'),
(89, 'GI', 'GIB', '292', 'Gibraltar'),
(90, 'GR', 'GRC', '300', 'Grécia'),
(91, 'GD', 'GRD', '308', 'Grenada'),
(92, 'GL', 'GRL', '304', 'Gronelândia'),
(93, 'GP', 'GLP', '312', 'Guadeloupe'),
(94, 'GU', 'GUM', '316', 'Guam'),
(95, 'GT', 'GTM', '320', 'Guatemala'),
(96, 'GG', 'GGY', '831', 'Guernsey'),
(97, 'GY', 'GUY', '328', 'Guiana'),
(98, 'GF', 'GUF', '254', 'Guiana Francesa'),
(99, 'GW', 'GNB', '624', 'Guiné-Bissau'),
(100, 'GN', 'GIN', '324', 'Guiné-Conacri'),
(101, 'GQ', 'GNQ', '226', 'Guiné Equatorial'),
(102, 'HT', 'HTI', '332', 'Haiti'),
(103, 'HM', 'HMD', '334', 'Heard e Ilhas McDonald, Ilha'),
(104, 'HN', 'HND', '340', 'Honduras'),
(105, 'HK', 'HKG', '344', 'Hong Kong'),
(106, 'HU', 'HUN', '348', 'Hungria'),
(107, 'YE', 'YEM', '887', 'Iémen'),
(108, 'IN', 'IND', '356', 'Índia'),
(109, 'ID', 'IDN', '360', 'Indonésia'),
(110, 'IQ', 'IRQ', '368', 'Iraque'),
(111, 'IR', 'IRN', '364', 'Irão'),
(112, 'IE', 'IRL', '372', 'Irlanda'),
(113, 'IS', 'ISL', '352', 'Islândia'),
(114, 'IL', 'ISR', '376', 'Israel'),
(115, 'IT', 'ITA', '380', 'Itália'),
(116, 'JM', 'JAM', '388', 'Jamaica'),
(117, 'JP', 'JPN', '392', 'Japão'),
(118, 'JE', 'JEY', '832', 'Jersey'),
(119, 'JO', 'JOR', '400', 'Jordânia'),
(120, 'KI', 'KIR', '296', 'Kiribati'),
(121, 'KW', 'KWT', '414', 'Kuwait'),
(122, 'LA', 'LAO', '418', 'Laos'),
(123, 'LS', 'LSO', '426', 'Lesoto'),
(124, 'LV', 'LVA', '428', 'Letónia'),
(125, 'LB', 'LBN', '422', 'Líbano'),
(126, 'LR', 'LBR', '430', 'Libéria'),
(127, 'LY', 'LBY', '434', 'Líbia'),
(128, 'LI', 'LIE', '438', 'Liechtenstein'),
(129, 'LT', 'LTU', '440', 'Lituânia'),
(130, 'LU', 'LUX', '442', 'Luxemburgo'),
(131, 'MO', 'MAC', '446', 'Macau'),
(132, 'MK', 'MKD', '807', 'Macedónia, República da'),
(133, 'MG', 'MDG', '450', 'Madagáscar'),
(134, 'MY', 'MYS', '458', 'Malásia'),
(135, 'MW', 'MWI', '454', 'Malawi'),
(136, 'MV', 'MDV', '462', 'Maldivas'),
(137, 'ML', 'MLI', '466', 'Mali'),
(138, 'MT', 'MLT', '470', 'Malta'),
(139, 'FK', 'FLK', '238', 'Malvinas, Ilhas (Falkland)'),
(140, 'IM', 'IMN', '833', 'Man, Ilha de'),
(141, 'MP', 'MNP', '580', 'Marianas Setentrionais'),
(142, 'MA', 'MAR', '504', 'Marrocos'),
(143, 'MH', 'MHL', '584', 'Marshall, Ilhas'),
(144, 'MQ', 'MTQ', '474', 'Martinica'),
(145, 'MU', 'MUS', '480', 'Maurícia'),
(146, 'MR', 'MRT', '478', 'Mauritânia'),
(147, 'YT', 'MYT', '175', 'Mayotte'),
(148, 'UM', 'UMI', '581', 'Menores Distantes dos Estados Unidos, Ilhas'),
(149, 'MX', 'MEX', '484', 'México'),
(150, 'MM', 'MMR', '104', 'Myanmar (antiga Birmânia)'),
(151, 'FM', 'FSM', '583', 'Micronésia, Estados Federados da'),
(152, 'MZ', 'MOZ', '508', 'Moçambique'),
(153, 'MD', 'MDA', '498', 'Moldávia'),
(154, 'MC', 'MCO', '492', 'Mónaco'),
(155, 'MN', 'MNG', '496', 'Mongólia'),
(156, 'ME', 'MNE', '499', 'Montenegro'),
(157, 'MS', 'MSR', '500', 'Montserrat'),
(158, 'NA', 'NAM', '516', 'Namíbia'),
(159, 'NR', 'NRU', '520', 'Nauru'),
(160, 'NP', 'NPL', '524', 'Nepal'),
(161, 'NI', 'NIC', '558', 'Nicarágua'),
(162, 'NE', 'NER', '562', 'Níger'),
(163, 'NG', 'NGA', '566', 'Nigéria'),
(164, 'NU', 'NIU', '570', 'Niue'),
(165, 'NF', 'NFK', '574', 'Norfolk, Ilha'),
(166, 'NO', 'NOR', '578', 'Noruega'),
(167, 'NC', 'NCL', '540', 'Nova Caledónia'),
(168, 'NZ', 'NZL', '554', 'Nova Zelândia (Aotearoa)'),
(169, 'OM', 'OMN', '512', 'Oman'),
(170, 'NL', 'NLD', '528', 'Países Baixos (Holanda)'),
(171, 'PW', 'PLW', '585', 'Palau'),
(172, 'PS', 'PSE', '275', 'Palestina'),
(173, 'PA', 'PAN', '591', 'Panamá'),
(174, 'PG', 'PNG', '598', 'Papua-Nova Guiné'),
(175, 'PK', 'PAK', '586', 'Paquistão'),
(176, 'PY', 'PRY', '600', 'Paraguai'),
(177, 'PE', 'PER', '604', 'Peru'),
(178, 'PN', 'PCN', '612', 'Pitcairn'),
(179, 'PF', 'PYF', '258', 'Polinésia Francesa'),
(180, 'PL', 'POL', '616', 'Polónia'),
(181, 'PR', 'PRI', '630', 'Porto Rico'),
(182, 'PT', 'PRT', '620', 'Portugal'),
(183, 'QA', 'QAT', '634', 'Qatar'),
(184, 'KE', 'KEN', '404', 'Quénia'),
(185, 'KG', 'KGZ', '417', 'Quirguistão'),
(186, 'GB', 'GBR', '826', 'Reino Unido da Grã-Bretanha e Irlanda do Norte'),
(187, 'RE', 'REU', '638', 'Reunião'),
(188, 'RO', 'ROU', '642', 'Roménia'),
(189, 'RW', 'RWA', '646', 'Ruanda'),
(190, 'RU', 'RUS', '643', 'Rússia'),
(191, 'EH', 'ESH', '732', 'Saara Ocidental'),
(192, 'AS', 'ASM', '016', 'Samoa Americana'),
(193, 'WS', 'WSM', '882', 'Samoa (Samoa Ocidental)'),
(194, 'PM', 'SPM', '666', 'Saint Pierre et Miquelon'),
(195, 'SB', 'SLB', '090', 'Salomão, Ilhas'),
(196, 'KN', 'KNA', '659', 'São Cristóvão e Névis (Saint Kitts e Nevis)'),
(197, 'SM', 'SMR', '674', 'San Marino'),
(198, 'ST', 'STP', '678', 'São Tomé e Príncipe'),
(199, 'VC', 'VCT', '670', 'São Vicente e Granadinas'),
(200, 'SH', 'SHN', '654', 'Santa Helena'),
(201, 'LC', 'LCA', '662', 'Santa Lúcia'),
(202, 'SN', 'SEN', '686', 'Senegal'),
(203, 'SL', 'SLE', '694', 'Serra Leoa'),
(204, 'RS', 'SRB', '688', 'Sérvia'),
(205, 'SC', 'SYC', '690', 'Seychelles'),
(206, 'SG', 'SGP', '702', 'Singapura'),
(207, 'SY', 'SYR', '760', 'Síria'),
(208, 'SO', 'SOM', '706', 'Somália'),
(209, 'LK', 'LKA', '144', 'Sri Lanka'),
(210, 'SZ', 'SWZ', '748', 'Suazilândia'),
(211, 'SD', 'SDN', '736', 'Sudão'),
(212, 'SE', 'SWE', '752', 'Suécia'),
(213, 'CH', 'CHE', '756', 'Suíça'),
(214, 'SR', 'SUR', '740', 'Suriname'),
(215, 'SJ', 'SJM', '744', 'Svalbard e Jan Mayen'),
(216, 'TH', 'THA', '764', 'Tailândia'),
(217, 'TW', 'TWN', '158', 'Taiwan'),
(218, 'TJ', 'TJK', '762', 'Tajiquistão'),
(219, 'TZ', 'TZA', '834', 'Tanzânia'),
(220, 'TF', 'ATF', '260', 'Terras Austrais e Antárticas Francesas (TAAF)'),
(221, 'IO', 'IOT', '086', 'Território Britânico do Oceano Índico'),
(222, 'TL', 'TLS', '626', 'Timor-Leste'),
(223, 'TG', 'TGO', '768', 'Togo'),
(224, 'TK', 'TKL', '772', 'Toquelau'),
(225, 'TO', 'TON', '776', 'Tonga'),
(226, 'TT', 'TTO', '780', 'Trindade e Tobago'),
(227, 'TN', 'TUN', '788', 'Tunísia'),
(228, 'TC', 'TCA', '796', 'Turks e Caicos'),
(229, 'TM', 'TKM', '795', 'Turquemenistão'),
(230, 'TR', 'TUR', '792', 'Turquia'),
(231, 'TV', 'TUV', '798', 'Tuvalu'),
(232, 'UA', 'UKR', '804', 'Ucrânia'),
(233, 'UG', 'UGA', '800', 'Uganda'),
(234, 'UY', 'URY', '858', 'Uruguai'),
(235, 'UZ', 'UZB', '860', 'Usbequistão'),
(236, 'VU', 'VUT', '548', 'Vanuatu'),
(237, 'VA', 'VAT', '336', 'Vaticano'),
(238, 'VE', 'VEN', '862', 'Venezuela'),
(239, 'VN', 'VNM', '704', 'Vietname'),
(240, 'VI', 'VIR', '850', 'Virgens Americanas, Ilhas'),
(241, 'VG', 'VGB', '092', 'Virgens Britânicas, Ilhas'),
(242, 'WF', 'WLF', '876', 'Wallis e Futuna'),
(243, 'ZM', 'ZMB', '894', 'Zâmbia'),
(244, 'ZW', 'ZWE', '716', 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `pro_equipamento`
--

CREATE TABLE IF NOT EXISTS `pro_equipamento` (
`id_pe` bigint(20) unsigned NOT NULL,
  `pe_nome` char(250) COLLATE latin1_general_ci NOT NULL,
  `pe_marca` varchar(40) COLLATE latin1_general_ci NOT NULL,
  `pe_modelo` char(40) COLLATE latin1_general_ci NOT NULL,
  `pe_preco` double NOT NULL,
  `pe_tipo` int(11) NOT NULL,
  `pe_part_number` varchar(40) COLLATE latin1_general_ci NOT NULL,
  `pe_descricao_1` text COLLATE latin1_general_ci NOT NULL,
  `pe_descricao_2` text COLLATE latin1_general_ci NOT NULL,
  `pe_descricao_3` text COLLATE latin1_general_ci NOT NULL,
  `pe_ativo` int(11) NOT NULL DEFAULT '1'
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `pro_equipamento`
--

INSERT INTO `pro_equipamento` (`id_pe`, `pe_nome`, `pe_marca`, `pe_modelo`, `pe_preco`, `pe_tipo`, `pe_part_number`, `pe_descricao_1`, `pe_descricao_2`, `pe_descricao_3`, `pe_ativo`) VALUES
(1, 'Microscópio triocular', 'Carl Zeiss', 'Axio Scope A1', 100511, 1, '', '0', '', '', 1),
(2, 'Microscópio Eletrônico de Varredura', '', '', 0, 1, '', '', '', '', 1),
(3, 'Servidor Sun Blade 6048 Chassis base assembly', 'Sun', '6048', 289917.71, 2, '', '', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pro_equipamento_contabil`
--

CREATE TABLE IF NOT EXISTS `pro_equipamento_contabil` (
`id_pec` bigint(20) unsigned NOT NULL,
  `pec_descricao` varchar(80) COLLATE latin1_general_ci NOT NULL,
  `pec_ativo` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=13 ;

--
-- Dumping data for table `pro_equipamento_contabil`
--

INSERT INTO `pro_equipamento_contabil` (`id_pec`, `pec_descricao`, `pec_ativo`) VALUES
(1, 'Aparelhos de Medicina e Cirurgia', 1),
(2, 'Computadores, Periféricos e Rede', 1),
(3, 'Equipamentos Agrícolas e Agropecuários', 1),
(4, 'Equipamentos de Audio e Vídeo', 1),
(5, 'Equipamentos de Laboratório', 1),
(6, 'Equipamentos de Odontologia', 1),
(7, 'Equipamentos de Telecomunicação', 1),
(8, 'Equipamentos Hospitalares', 1),
(9, 'Máquinas e Equipamentos (Ferramentas)', 1),
(10, 'Móveis e Utensílios de Escritório', 1),
(11, 'Móveis e Utensílios Domésticos', 1),
(12, 'Móveis Hospitalares', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pro_equipamento_item`
--

CREATE TABLE IF NOT EXISTS `pro_equipamento_item` (
`id_pei` bigint(20) unsigned NOT NULL,
  `pei_equipamento` int(11) NOT NULL,
  `pei_patrimonio` char(30) COLLATE latin1_general_ci NOT NULL,
  `pei_serial` char(30) COLLATE latin1_general_ci NOT NULL,
  `pei_laboratorio` int(11) NOT NULL,
  `pei_aquisicao` date NOT NULL DEFAULT '0000-00-00',
  `pei_convenio` char(20) COLLATE latin1_general_ci NOT NULL,
  `pei_obs` text COLLATE latin1_general_ci NOT NULL,
  `pei_status` int(11) NOT NULL,
  `pei_valor` double NOT NULL,
  `pei_obs_2` text COLLATE latin1_general_ci NOT NULL,
  `pei_ativo` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pro_equipamento_laboratorio`
--

CREATE TABLE IF NOT EXISTS `pro_equipamento_laboratorio` (
`id_pel` bigint(20) unsigned NOT NULL,
  `pel_descricao` char(150) COLLATE latin1_general_ci NOT NULL,
  `pel_escola` int(11) NOT NULL,
  `pel_responsavel` int(11) NOT NULL,
  `pel_localizacao` text COLLATE latin1_general_ci NOT NULL,
  `pel_atualizado` int(11) NOT NULL,
  `pel_lat` double NOT NULL,
  `pel_log` double NOT NULL,
  `pel_ativo` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pro_equipamento_status`
--

CREATE TABLE IF NOT EXISTS `pro_equipamento_status` (
`id_pes` bigint(20) unsigned NOT NULL,
  `pes_descricao` char(150) COLLATE latin1_general_ci NOT NULL,
  `pes_color` char(7) COLLATE latin1_general_ci NOT NULL,
  `pes_ativo` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=12 ;

--
-- Dumping data for table `pro_equipamento_status`
--

INSERT INTO `pro_equipamento_status` (`id_pes`, `pes_descricao`, `pes_color`, `pes_ativo`) VALUES
(1, 'Orçamentação', '', 1),
(2, 'Licitação', '', 1),
(3, 'Instalação', '', 1),
(4, 'Solicitação de compras', '', 1),
(5, 'Aquisição', '', 1),
(6, 'Aguardando instalação', '', 1),
(7, 'Instalado', '', 1),
(8, 'Em conserto', '', 1),
(9, 'Com defeito', '', 1),
(10, 'Baixado do patrimonio', '', 1),
(11, 'Roubado', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pro_equipamento_tipo`
--

CREATE TABLE IF NOT EXISTS `pro_equipamento_tipo` (
`id_pet` bigint(20) unsigned NOT NULL,
  `pet_descricao` char(80) COLLATE latin1_general_ci NOT NULL,
  `pet_contabil` int(11) NOT NULL,
  `pet_ativo` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `pro_equipamento_tipo`
--

INSERT INTO `pro_equipamento_tipo` (`id_pet`, `pet_descricao`, `pet_contabil`, `pet_ativo`) VALUES
(1, 'Microscópio', 5, 1),
(2, 'Servidor', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `unidade`
--

CREATE TABLE IF NOT EXISTS `unidade` (
`id_u` bigint(20) unsigned NOT NULL,
  `u_descricao` char(200) COLLATE latin1_general_ci NOT NULL,
  `u_sigla` char(10) COLLATE latin1_general_ci NOT NULL,
  `u_decano` char(8) COLLATE latin1_general_ci NOT NULL,
  `u_ativo` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=14 ;

--
-- Dumping data for table `unidade`
--

INSERT INTO `unidade` (`id_u`, `u_descricao`, `u_sigla`, `u_decano`, `u_ativo`) VALUES
(9, 'Escola Politécnica', '', '', 1),
(10, 'Escola de Saúde e Biociências', '', '', 1),
(2, 'Escola de Ciências Agrárias e Medicina Veterinária', '', '', 1),
(1, 'Escola de Arquitetura e Design', '', '', 1),
(4, 'Escola de Comunicação e Artes', '', '', 1),
(5, 'Escola de Direito', '', '', 1),
(6, 'Escola de Educação e Humanidade', '', '', 1),
(7, 'Escola de Medicina', '', '', 1),
(8, 'Escola de Negócios', '', '', 1),
(11, '-não identificado-', '', '', 1),
(12, '-não identificado-', '', '', 1),
(3, '--cancelado--', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
`id_us` int(11) NOT NULL,
  `us_nome` varchar(250) DEFAULT NULL,
  `us_cpf` varchar(15) DEFAULT NULL,
  `us_cracha` varchar(15) DEFAULT NULL,
  `us_emplid` varchar(15) DEFAULT NULL,
  `us_login` varchar(80) DEFAULT NULL,
  `us_pass` varchar(100) DEFAULT NULL,
  `us_email` varchar(150) DEFAULT NULL,
  `us_link_lattes` varchar(100) DEFAULT NULL,
  `us_ativo` tinyint(1) DEFAULT '1',
  `us_teste` tinyint(1) DEFAULT '0',
  `us_origem` tinyint(1) DEFAULT '0' COMMENT '0 - PUCPR\n1 - Externo',
  `us_professor_tipo` tinyint(1) DEFAULT '0' COMMENT '0 - Gradua��o\n1 - Stricto Sensu',
  `us_aluno_tipo` varchar(45) DEFAULT NULL,
  `us_regime` varchar(10) DEFAULT NULL COMMENT 'Horista / TI / TP',
  `us_genero` char(1) DEFAULT NULL COMMENT '''M'' = masculino\n''F'' = feminino',
  `usuario_tipo_ust_id` int(11) NOT NULL,
  `usuario_funcao_usf_id` int(11) NOT NULL,
  `usuario_titulacao_ust_id` int(11) NOT NULL,
  `us_dt_nascimento` date NOT NULL DEFAULT '0000-00-00'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Tabela com dados de usuarios (Alunos, Professores, Colaboradores e Externos)' AUTO_INCREMENT=12 ;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`id_us`, `us_nome`, `us_cpf`, `us_cracha`, `us_emplid`, `us_login`, `us_pass`, `us_email`, `us_link_lattes`, `us_ativo`, `us_teste`, `us_origem`, `us_professor_tipo`, `us_aluno_tipo`, `us_regime`, `us_genero`, `usuario_tipo_ust_id`, `usuario_funcao_usf_id`, `usuario_titulacao_ust_id`, `us_dt_nascimento`) VALUES
(4, 'Alessandra Benilde Gryzinski Lu', '06150126986', '89108296', '', NULL, NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, 2, 0, 0, '1992-05-22'),
(6, 'Evelyn Martina Dueck', '09257718999', '89201186', '', NULL, NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, 2, 0, 0, '1994-11-10'),
(8, 'Shaina Bunese Carvalho', '07475165965', '89224391', '', NULL, NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, 2, 0, 0, '1995-01-10'),
(9, 'Victor Pimentel Rosa', '43706667835', '89198025', '', NULL, NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, 2, 0, 0, '1994-03-03'),
(10, 'Rene Faustino Gabriel Junior', '72952105987', '88958022', '', NULL, NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, 2, 0, 0, '1969-10-05'),
(11, 'Priscilla Soares de Oliveira', '06358612913', '89174217', '', NULL, NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, 2, 0, 0, '1994-11-08');

-- --------------------------------------------------------

--
-- Table structure for table `usuario_complemento`
--

CREATE TABLE IF NOT EXISTS `usuario_complemento` (
  `usuario_id_us` int(11) NOT NULL,
  `usc_rua` varchar(150) DEFAULT NULL,
  `usc_complemento` varchar(45) DEFAULT NULL,
  `usc_bairro` varchar(80) DEFAULT NULL,
  `usc_cep` varchar(10) DEFAULT NULL,
  `usc_cidade` varchar(80) DEFAULT NULL,
  `usc_pais` varchar(60) DEFAULT NULL,
  `usc_uf` char(2) DEFAULT NULL,
  `usc_fone_residencial` varchar(15) DEFAULT NULL,
  `usc_fone_celular` varchar(15) DEFAULT NULL,
  `usc_fone_comercial` varchar(15) DEFAULT NULL,
  `usc_fone_recado` varchar(15) DEFAULT NULL,
  `usc_dt_nascimento` date DEFAULT NULL,
  `usc_raca_cor` varchar(20) DEFAULT NULL,
  `usc_nacionalidade` varchar(45) DEFAULT NULL,
  `usc_rg` varchar(20) DEFAULT NULL,
  `usc_orgao_expedidor` varchar(20) DEFAULT NULL,
  `usc_nome_mae` varchar(150) DEFAULT NULL,
  `usc_cpf_mae` varchar(15) DEFAULT NULL,
  `usc_nome_pai` varchar(150) DEFAULT NULL,
  `usc_cpf_pai` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabela com dados complementares menos utilziados (pode ser que ainda necessite de mais dados)';

-- --------------------------------------------------------

--
-- Structure for view `csf_view`
--
DROP TABLE IF EXISTS `csf_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `csf_view` AS (select `csf`.`id_csf` AS `id_csf`,`csf`.`csf_aluno` AS `csf_aluno`,`csf`.`csf_orientador` AS `csf_orientador`,`csf`.`csf_modalidade` AS `csf_modalidade`,`csf`.`csf_saida` AS `csf_saida`,`csf`.`csf_saida_previsao` AS `csf_saida_previsao`,`csf`.`csf_retorno` AS `csf_retorno`,`csf`.`csf_retorno_previsao` AS `csf_retorno_previsao`,`csf`.`csf_pa_intercambio` AS `csf_pa_intercambio`,`csf`.`csf_pais` AS `csf_pais`,`csf`.`csf_universidade` AS `csf_universidade`,`csf`.`csf_status` AS `csf_status`,`csf`.`csf_obs` AS `csf_obs`,`csf`.`csf_area` AS `csf_area`,`csf`.`csf_curso` AS `csf_curso`,`csf`.`csf_chamada` AS `csf_chamada`,`csf`.`csf_parceiro` AS `csf_parceiro`,`usuario`.`id_us` AS `id_us`,`usuario`.`us_nome` AS `us_nome`,`usuario`.`us_cpf` AS `us_cpf`,`usuario`.`us_cracha` AS `us_cracha`,`usuario`.`us_emplid` AS `us_emplid`,`usuario`.`us_login` AS `us_login`,`usuario`.`us_pass` AS `us_pass`,`usuario`.`us_email` AS `us_email`,`usuario`.`us_link_lattes` AS `us_link_lattes`,`usuario`.`us_ativo` AS `us_ativo`,`usuario`.`us_teste` AS `us_teste`,`usuario`.`us_origem` AS `us_origem`,`usuario`.`us_professor_tipo` AS `us_professor_tipo`,`usuario`.`us_aluno_tipo` AS `us_aluno_tipo`,`usuario`.`us_regime` AS `us_regime`,`usuario`.`us_genero` AS `us_genero`,`usuario`.`usuario_tipo_ust_id` AS `usuario_tipo_ust_id`,`usuario`.`usuario_funcao_usf_id` AS `usuario_funcao_usf_id`,`usuario`.`usuario_titulacao_ust_id` AS `usuario_titulacao_ust_id`,`usuario`.`us_dt_nascimento` AS `us_dt_nascimento`,`csf_status`.`id_cs` AS `id_cs`,`csf_status`.`cs_descricao` AS `cs_descricao`,`csf_status`.`cs_ativo` AS `cs_ativo`,`csf_status`.`cs_contabiliza` AS `cs_contabiliza`,`pais`.`id` AS `id`,`pais`.`iso` AS `iso`,`pais`.`iso3` AS `iso3`,`pais`.`numcode` AS `numcode`,`pais`.`nome` AS `nome`,`fomento_editais`.`id_ed` AS `id_ed`,`fomento_editais`.`ed_titulo` AS `ed_titulo`,`fomento_editais`.`ed_data` AS `ed_data`,`fomento_editais`.`ed_agencia` AS `ed_agencia`,`fomento_editais`.`ed_idioma` AS `ed_idioma`,`fomento_editais`.`ed_chamada` AS `ed_chamada`,`fomento_editais`.`ed_data_1` AS `ed_data_1`,`fomento_editais`.`ed_data_2` AS `ed_data_2`,`fomento_editais`.`ed_data_3` AS `ed_data_3`,`fomento_editais`.`ed_texto_1` AS `ed_texto_1`,`fomento_editais`.`ed_texto_2` AS `ed_texto_2`,`fomento_editais`.`ed_texto_3` AS `ed_texto_3`,`fomento_editais`.`ed_texto_4` AS `ed_texto_4`,`fomento_editais`.`ed_texto_5` AS `ed_texto_5`,`fomento_editais`.`ed_texto_6` AS `ed_texto_6`,`fomento_editais`.`ed_texto_7` AS `ed_texto_7`,`fomento_editais`.`ed_texto_8` AS `ed_texto_8`,`fomento_editais`.`ed_texto_9` AS `ed_texto_9`,`fomento_editais`.`ed_texto_10` AS `ed_texto_10`,`fomento_editais`.`ed_texto_11` AS `ed_texto_11`,`fomento_editais`.`ed_texto_12` AS `ed_texto_12`,`fomento_editais`.`ed_status` AS `ed_status`,`fomento_editais`.`ed_autor` AS `ed_autor`,`fomento_editais`.`ed_corpo` AS `ed_corpo`,`fomento_editais`.`ed_url_externa` AS `ed_url_externa`,`fomento_editais`.`ed_total_visualizacoes` AS `ed_total_visualizacoes`,`fomento_editais`.`ed_local` AS `ed_local`,`fomento_editais`.`ed_data_envio` AS `ed_data_envio`,`fomento_editais`.`ed_document_require` AS `ed_document_require`,`fomento_editais`.`ed_login` AS `ed_login`,`fomento_editais`.`ed_titulo_email` AS `ed_titulo_email`,`fomento_editais`.`ed_edital_tipo` AS `ed_edital_tipo`,`fomento_editais`.`ed_fluxo_continuo` AS `ed_fluxo_continuo`,`csf_parceiro`.`id_cp` AS `id_cp`,`csf_parceiro`.`cp_descricao` AS `cp_descricao`,`csf_parceiro`.`cp_pais` AS `cp_pais`,`csf_parceiro`.`cp_ativo` AS `cp_ativo` from (((((`csf` left join `usuario` on((`usuario`.`id_us` = `csf`.`csf_aluno`))) left join `csf_status` on((`csf`.`csf_status` = `csf_status`.`id_cs`))) left join `pais` on((`csf`.`csf_pais` = `pais`.`iso3`))) left join `fomento_editais` on((`csf`.`csf_chamada` = `fomento_editais`.`id_ed`))) left join `csf_parceiro` on((`csf`.`csf_parceiro` = `csf_parceiro`.`id_cp`))));

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ajax_areadoconhecimento`
--
ALTER TABLE `ajax_areadoconhecimento`
 ADD UNIQUE KEY `id_aa` (`id_aa`);

--
-- Indexes for table `centro_resultado`
--
ALTER TABLE `centro_resultado`
 ADD UNIQUE KEY `id_cr` (`id_cr`);

--
-- Indexes for table `csf`
--
ALTER TABLE `csf`
 ADD UNIQUE KEY `id_csf` (`id_csf`);

--
-- Indexes for table `csf_parceiro`
--
ALTER TABLE `csf_parceiro`
 ADD UNIQUE KEY `id_csf` (`id_cp`);

--
-- Indexes for table `csf_status`
--
ALTER TABLE `csf_status`
 ADD UNIQUE KEY `id_cs` (`id_cs`);

--
-- Indexes for table `fomento_categoria`
--
ALTER TABLE `fomento_categoria`
 ADD UNIQUE KEY `id_ct` (`id_ct`);

--
-- Indexes for table `fomento_editais`
--
ALTER TABLE `fomento_editais`
 ADD UNIQUE KEY `id_ed` (`id_ed`);

--
-- Indexes for table `fomento_edital_categoria`
--
ALTER TABLE `fomento_edital_categoria`
 ADD UNIQUE KEY `id_catp` (`id_catp`);

--
-- Indexes for table `logins`
--
ALTER TABLE `logins`
 ADD PRIMARY KEY (`id_us`), ADD UNIQUE KEY `id_us` (`id_us`), ADD UNIQUE KEY `user_cpf` (`us_cpf`), ADD UNIQUE KEY `user_login` (`us_login`);

--
-- Indexes for table `logins_log`
--
ALTER TABLE `logins_log`
 ADD UNIQUE KEY `id_ul` (`id_ul`);

--
-- Indexes for table `logins_perfil`
--
ALTER TABLE `logins_perfil`
 ADD UNIQUE KEY `id_usp` (`id_usp`), ADD UNIQUE KEY `perfil_key` (`usp_codigo`);

--
-- Indexes for table `logins_perfil_ativo`
--
ALTER TABLE `logins_perfil_ativo`
 ADD UNIQUE KEY `id_up` (`id_up`);

--
-- Indexes for table `pais`
--
ALTER TABLE `pais`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pro_equipamento`
--
ALTER TABLE `pro_equipamento`
 ADD UNIQUE KEY `id_pe` (`id_pe`);

--
-- Indexes for table `pro_equipamento_contabil`
--
ALTER TABLE `pro_equipamento_contabil`
 ADD UNIQUE KEY `id_pec` (`id_pec`);

--
-- Indexes for table `pro_equipamento_item`
--
ALTER TABLE `pro_equipamento_item`
 ADD UNIQUE KEY `id_pei` (`id_pei`);

--
-- Indexes for table `pro_equipamento_laboratorio`
--
ALTER TABLE `pro_equipamento_laboratorio`
 ADD UNIQUE KEY `id_pel` (`id_pel`);

--
-- Indexes for table `pro_equipamento_status`
--
ALTER TABLE `pro_equipamento_status`
 ADD UNIQUE KEY `id_pes` (`id_pes`);

--
-- Indexes for table `pro_equipamento_tipo`
--
ALTER TABLE `pro_equipamento_tipo`
 ADD UNIQUE KEY `id_pet` (`id_pet`);

--
-- Indexes for table `unidade`
--
ALTER TABLE `unidade`
 ADD UNIQUE KEY `id_u` (`id_u`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
 ADD PRIMARY KEY (`id_us`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ajax_areadoconhecimento`
--
ALTER TABLE `ajax_areadoconhecimento`
MODIFY `id_aa` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1389;
--
-- AUTO_INCREMENT for table `centro_resultado`
--
ALTER TABLE `centro_resultado`
MODIFY `id_cr` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=299;
--
-- AUTO_INCREMENT for table `csf`
--
ALTER TABLE `csf`
MODIFY `id_csf` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `csf_parceiro`
--
ALTER TABLE `csf_parceiro`
MODIFY `id_cp` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `csf_status`
--
ALTER TABLE `csf_status`
MODIFY `id_cs` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `fomento_categoria`
--
ALTER TABLE `fomento_categoria`
MODIFY `id_ct` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=146;
--
-- AUTO_INCREMENT for table `fomento_editais`
--
ALTER TABLE `fomento_editais`
MODIFY `id_ed` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10234;
--
-- AUTO_INCREMENT for table `fomento_edital_categoria`
--
ALTER TABLE `fomento_edital_categoria`
MODIFY `id_catp` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=432;
--
-- AUTO_INCREMENT for table `logins`
--
ALTER TABLE `logins`
MODIFY `id_us` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `logins_log`
--
ALTER TABLE `logins_log`
MODIFY `id_ul` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `logins_perfil`
--
ALTER TABLE `logins_perfil`
MODIFY `id_usp` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `logins_perfil_ativo`
--
ALTER TABLE `logins_perfil_ativo`
MODIFY `id_up` bigint(20) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pais`
--
ALTER TABLE `pais`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=245;
--
-- AUTO_INCREMENT for table `pro_equipamento`
--
ALTER TABLE `pro_equipamento`
MODIFY `id_pe` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `pro_equipamento_contabil`
--
ALTER TABLE `pro_equipamento_contabil`
MODIFY `id_pec` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `pro_equipamento_item`
--
ALTER TABLE `pro_equipamento_item`
MODIFY `id_pei` bigint(20) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pro_equipamento_laboratorio`
--
ALTER TABLE `pro_equipamento_laboratorio`
MODIFY `id_pel` bigint(20) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pro_equipamento_status`
--
ALTER TABLE `pro_equipamento_status`
MODIFY `id_pes` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `pro_equipamento_tipo`
--
ALTER TABLE `pro_equipamento_tipo`
MODIFY `id_pet` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `unidade`
--
ALTER TABLE `unidade`
MODIFY `id_u` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
MODIFY `id_us` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
