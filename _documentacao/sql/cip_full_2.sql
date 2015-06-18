-- phpMyAdmin SQL Dump
-- version 4.4.8
-- http://www.phpmyadmin.net
--
-- Host: 10.100.4.24
-- Generation Time: Jun 18, 2015 at 04:25 PM
-- Server version: 5.6.19
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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
(606, '3.03.04.02-4', 'Propriedades Físicas dos Metais e Ligas', '0000495', '', 0, '', '1', '1'),
(607, '3.03.04.03-2', 'Propriedades Mecânicas dos Metais e Ligas', '0000496', '', 0, '', '1', '1'),
(608, '3.03.04.05-9', 'Corrosão', '0000498', '', 0, '', '1', '1'),
(609, '3.03.05.01-2', 'Extração e Transformação de Materiais', '0000500', '', 0, '', '1', '1'),
(610, '3.03.05.02-0', 'Cerâmicos', '0000501', '', 0, '', '1', '1'),
(611, '3.03.05.03-9', 'Materiais Conjugados não Metálicos', '0000502', '', 0, '', '1', '1'),
(612, '3.04.01.00-3', 'Materiais Elétricos', '0000505', '', 0, '', '1', '1'),
(613, '3.04.01.01-1', 'Materiais Condutores', '0000506', '', 0, '', '1', '1'),
(614, '3.03.00.00-2', 'Engenharia de Materiais e Metalúrgica', '0000475', '', 1, '', '1', '1'),
(615, '3.04.00.00-7', 'Engenharia Elétrica', '0000504', '', 1, '', '1', '1');
INSERT INTO `ajax_areadoconhecimento` (`id_aa`, `a_cnpq`, `a_descricao`, `a_codigo`, `a_geral`, `a_semic`, `a_ativo`, `a_submit`, `a_journal`) VALUES
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
(1187, '7.07.01.04-0', 'Técnicas de Processamento Estatístico, Matemático e Computacional em Psicologia', '0001222', '', 0, '', '1', '1'),
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
(1204, '7.07.08.00-2', 'Psicologia do Ensino e da Aprendizagem', '0001244', '', 0, '', '1', '1');
INSERT INTO `ajax_areadoconhecimento` (`id_aa`, `a_cnpq`, `a_descricao`, `a_codigo`, `a_geral`, `a_semic`, `a_ativo`, `a_submit`, `a_journal`) VALUES
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
-- Table structure for table `bolsa_modalidade`
--

CREATE TABLE IF NOT EXISTS `bolsa_modalidade` (
  `id_bmod` int(11) NOT NULL,
  `bmod_modalidade` varchar(60) DEFAULT NULL COMMENT '[1 - Não Definido], ...',
  `bmod_ativo` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabela vinculada a usuario_bolsa. Mostra quais tipos de bolsas o usuario possui';

--
-- Dumping data for table `bolsa_modalidade`
--

INSERT INTO `bolsa_modalidade` (`id_bmod`, `bmod_modalidade`, `bmod_ativo`) VALUES
(1, 'Não Definido', 1);

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `centro_resultado`
--

INSERT INTO `centro_resultado` (`id_cr`, `cr_nr`, `cr_descricao`, `cr_ordenador_necessidade`, `cr_ordenador_gasto`, `cr_ativo`) VALUES
(299, 0, 'CR A ASSOCIAR', '', '', 1),
(300, 1, 'Administração da Graduação em Pedagogia - Curitiba', '', '', 1),
(301, 64, 'Administração da Graduação em Odontologia - Curiti', '', '', 1),
(302, 407, 'Engenharia Mecânica', '', '', 1),
(303, 408, 'Informática Aplicada', '', '', 1),
(304, 415, 'Administração', '', '', 1),
(305, 418, 'Engenharia de Produção e Sistemas', '', '', 1),
(306, 814, 'Gestão Urbana', '', '', 1),
(307, 2050, 'GRADUAÇÃO - CWB - INATIVOS - ESCOLA POLITÉCNICA', '', '', 1),
(308, 2192, 'GRADUAÇÃO - SJP - INATIVOS - ESCOLA DE CIÊNC. AGR.', '', '', 1),
(309, 2420, 'Administração da Graduação em Agronomia - Toledo', '', '', 1),
(310, 3498, 'Administração da Graduação em Biologia - Curitiba', '', '', 1),
(311, 3507, 'Administração da Graduação em Enfermagem - Curitib', '', '', 1),
(312, 3541, 'Administração da Graduação em Medicina - Curitiba', '', '', 1),
(313, 3557, 'Administração da Graduação em Odontologia - Curiti', '', '', 1),
(314, 3795, 'Administração da Graduação em Engenharia Ambiental', '', '', 1),
(315, 3803, 'Administração da Graduação em Engenharia Civil Cur', '', '', 1),
(316, 3811, 'Administração da Graduação em Engenharia de Alimen', '', '', 1),
(317, 3820, 'Administração da Graduação em Engenharia de Comput', '', '', 1),
(318, 3838, 'Administração da Graduação em Engenharia de Produç', '', '', 1),
(319, 3852, 'Administração da Graduação em Engenharia Elétrica', '', '', 1),
(320, 3860, 'Administração da Graduação em Engenharia Mecânica', '', '', 1),
(321, 4076, 'GRADUAÇÃO - CWB - INATIVOS - ESCOLA DE COMUNICAÇÃO', '', '', 1),
(322, 4093, 'Administração da Graduação em Direito Curitiba', '', '', 1),
(323, 4572, 'Administração da Graduação em Administração - SJP', '', '', 1),
(324, 4588, 'Administração da Graduação em Ciências Contábeis -', '', '', 1),
(325, 4753, 'Administração da Graduação em Medicina Veterinária', '', '', 1),
(326, 6452, 'Lab. de Controle de Poluição - BL III PQ TEC', '', '', 1),
(327, 6453, 'Lab. de Simulação Térmica - CCET', '', '', 1),
(328, 6454, 'Lab. de Sistemas Térmicos - CCET', '', '', 1),
(329, 6828, 'Central de Processamento de Dados - PPGIA', '', '', 1),
(330, 6833, 'Lab. de Comutação - BL II PQ TEC', '', '', 1),
(331, 6836, 'Lab. de Engenharia de Reabilitação - LER', '', '', 1),
(332, 6838, 'Lab. de Informática em Saúde - LAIS - BL II PQ TEC', '', '', 1),
(333, 6840, 'Lab. de Redes I - BL II PQ TEC', '', '', 1),
(334, 6841, 'Lab. de Sistemas Distribuídos - LASID', '', '', 1),
(335, 6844, 'Lab. de Transmissão - REMAV - BL II PQ TEC', '', '', 1),
(336, 6851, 'Lab.s de Análises Ambientais - BL III PQ TEC', '', '', 1),
(337, 6870, 'Lab. de Metalografia - BL III PQ TEC', '', '', 1),
(338, 6875, 'Lab. de Estruturas - BL III PQ TEC', '', '', 1),
(339, 6880, 'Lab. de Termodinâmica Aplicada - BL III PQ TEC', '', '', 1),
(340, 6881, 'Lab. de Topografia - BL III PQ TEC', '', '', 1),
(341, 6883, 'Lab. de Usinagem - LAUS - BL III PQ TEC', '', '', 1),
(342, 6885, 'LAS II - Lab Grupo Pesq de Sist Autom Integrados', '', '', 1),
(343, 6924, 'Lab. de Farmacologia - CCBS', '', '', 1),
(344, 6925, 'Lab. de Fisiologia Animal - CCBS', '', '', 1),
(345, 6927, 'Lab. de Fisiologia Vegetal e Genética - CCBS', '', '', 1),
(346, 6928, 'Lab. de Bioquímica - CCBS', '', '', 1),
(347, 6933, 'Lab. de Tecnologia Farmacêutica - CCBS', '', '', 1),
(348, 6935, 'Lab. de Farmacotécnica - CCBS', '', '', 1),
(349, 6955, 'Núcleo de Células Humanas Prod. de Insulina - CCBS', '', '', 1),
(350, 6956, 'Lab. de Engenharia e Transplante Celular', '', '', 1),
(351, 6966, 'Lab. Bio-Informática - CCAA', '', '', 1),
(352, 7052, 'LAS VIII - Lab. de Controle de Processos', '', '', 1),
(353, 7065, 'Núcleo de Cardiomioplastia Celular - BL IV PQ TEC', '', '', 1),
(354, 7069, 'Núcleo de Enxertos Cardiovasculares - BL IV PQ TEC', '', '', 1),
(355, 7073, 'Núcleo de Imunogenética - BL IV PQ TEC', '', '', 1),
(356, 7118, 'Adm. Stricto Sensu - CWB - Escola de Negócios', '', '', 1),
(357, 7119, 'Adm. Lato Sensu - CWB - Escola de Saúde e Biociênc', '', '', 1),
(358, 7122, 'Adm. Stricto Sensu - CWB - Escola de Medicina', '', '', 1),
(359, 7128, 'Adm. Stricto Sensu - CWB - Escola Politécnica', '', '', 1),
(360, 7158, 'Adm. Stricto Sensu - CWB - Escola de Educação e Hu', '', '', 1),
(361, 7298, 'Laboratório de Usabilidade - BL IV PQ TEC', '', '', 1),
(362, 8785, 'Odontologia', '', '', 1),
(363, 9027, 'Engenharia Mecânica', '', '', 1),
(364, 9264, 'Educação', '', '', 1),
(365, 9928, 'Gestão Urbana', '', '', 1),
(366, 10000, 'Engenharia de Produção e Sistemas', '', '', 1),
(367, 10222, 'Laboratório de Análises - Engª Ambiental - BL III', '', '', 1),
(368, 10528, 'Adm do Bloco I do Parque Tecnológico', '', '', 1),
(369, 20100, 'Adm. da Escola de Saúde e Biociências - CWB', '', '', 1),
(370, 20200, 'Adm. da Escola Politécnica - CWB', '', '', 1),
(371, 20220, 'Lab. de Modelos - CCET', '', '', 1),
(372, 20234, 'Administração do Bloco III do Parque Tecnológico', '', '', 1),
(373, 20237, 'Administração do Bloco II do Parque Tecnológico', '', '', 1),
(374, 20300, 'Adm. da Escola de Direito - CWB', '', '', 1),
(375, 20314, 'Lab. de Comunicação', '', '', 1),
(376, 20400, 'Adm. da Escola de Educação e Humanidades - CWB', '', '', 1),
(377, 20500, 'Adm. da Escola da Negócios - CWB', '', '', 1),
(378, 20725, 'Hospital Veterinário -CCAA', '', '', 1),
(379, 20728, 'Unidade Hosp. Animais de Fazenda (UHAF) - CCAA', '', '', 1),
(380, 20800, 'Administração do Campus SJP', '', '', 1),
(381, 20813, 'Lab. de Biologia Molecular (Genoma) - CCAA', '', '', 1),
(382, 28821, 'Laboratório de Análises de Solos - Prestação de Se', '', '', 1),
(383, 28822, 'Setor de Piscicultura', '', '', 1),
(384, 40103, 'Clínica de Psicologia - CCBS', '', '', 1),
(385, 40104, 'Núcleo de Práticas Jurídicas - NPJ - CCJS', '', '', 1),
(386, 40105, 'Núcleo de Práticas Jurídicas - NPJ - CCSA SJP', '', '', 1),
(387, 41302, 'CR A ASSOCIAR', '', '', 1),
(388, 41700, 'Clínica de Fisioterapia e Reabilitação - CCBS', '', '', 1),
(389, 41801, 'Clínica Odontológica - CCBS', '', '', 1),
(390, 50108, 'Lab.s de Apoio - CCAA', '', '', 1),
(391, 70204, 'Lab. de Apoio - CCJE', '', '', 1),
(392, 70305, 'Lab. de Avaliação Nutricional - CCAS', '', '', 1),
(393, 100059, 'CR A ASSOCIAR', '', '', 1),
(394, 101026, 'Compras AS', '', '', 1),
(395, 101063, 'Setor de Captação de Recursos e Projetos AS', '', '', 1),
(396, 101079, 'Prédio Ginásio', '', '', 1),
(397, 101086, 'Hotelaria APC - HUC', '', '', 1),
(398, 101102, 'Convênios Educação', '', '', 1),
(399, 101108, 'CR A ASSOCIAR', '', '', 1),
(400, 101111, 'Convênios Educação', '', '', 1),
(401, 101122, 'Convênios Educação', '', '', 1),
(402, 101136, 'CR A ASSOCIAR', '', '', 1),
(403, 101139, 'CR A ASSOCIAR', '', '', 1),
(404, 101143, 'CR A ASSOCIAR', '', '', 1),
(405, 101156, 'CR A ASSOCIAR', '', '', 1),
(406, 101162, 'CR A ASSOCIAR', '', '', 1),
(407, 101163, 'CR A ASSOCIAR', '', '', 1),
(408, 101164, 'CR A ASSOCIAR', '', '', 1),
(409, 101167, 'Despesas Mantenedora', '', '', 1),
(410, 101174, 'Administração da Diretoria de Negócios Suplementar', '', '', 1),
(411, 101177, 'Adm. Diretoria Financeira', '', '', 1),
(412, 101184, 'CR A ASSOCIAR', '', '', 1),
(413, 101185, 'CR A ASSOCIAR', '', '', 1),
(414, 101188, 'Setor de Planejamento de Negócios', '', '', 1),
(415, 101193, 'CR A ASSOCIAR', '', '', 1),
(416, 101194, 'CR A ASSOCIAR', '', '', 1),
(417, 101195, 'CR A ASSOCIAR', '', '', 1),
(418, 101198, 'Setor de Contabilidade', '', '', 1),
(419, 101205, 'Setor de Finanças', '', '', 1),
(420, 101210, 'Controladoria', '', '', 1),
(421, 101216, 'Administração da Diretoria de Gestão de Pessoas', '', '', 1),
(422, 101225, 'Núcleo do Refeitório Campus Curitiba', '', '', 1),
(423, 101231, 'Administração da Diretoria de Tecnologia', '', '', 1),
(424, 101268, 'Núcleo de Compras', '', '', 1),
(425, 101269, 'Núcleo de Almoxarifado', '', '', 1),
(426, 101276, 'Núcleo Segurança e Contr Tráfego - APC - Curitiba', '', '', 1),
(427, 101287, 'Centro de Competência Técnica', '', '', 1),
(428, 101311, 'Núcleo NTE', '', '', 1),
(429, 101313, 'Administração do Setor de Esportes', '', '', 1),
(430, 101329, 'Residência Marista PUC', '', '', 1),
(431, 101331, 'Superintendência Executiva', '', '', 1),
(432, 101333, 'Assessoria Jurídica', '', '', 1),
(433, 101335, 'Diretoria de Marketing - APC', '', '', 1),
(434, 101344, 'Setor de Tecnologia', '', '', 1),
(435, 101367, 'Núcleo de Transportes', '', '', 1),
(436, 101377, 'Gerência de Medicina Ocupacional - APC', '', '', 1),
(437, 101395, 'CR A ASSOCIAR', '', '', 1),
(438, 101405, 'Setor de Infraestrutura', '', '', 1),
(439, 101417, 'Gerência BP Saúde', '', '', 1),
(440, 101441, 'CR A ASSOCIAR', '', '', 1),
(441, 101450, 'CR A ASSOCIAR', '', '', 1),
(442, 101451, 'CR A ASSOCIAR', '', '', 1),
(443, 101452, 'CR A ASSOCIAR', '', '', 1),
(444, 101453, 'CR A ASSOCIAR', '', '', 1),
(445, 101469, 'CR A ASSOCIAR', '', '', 1),
(446, 101470, 'CR A ASSOCIAR', '', '', 1),
(447, 101471, 'Convênios Educação', '', '', 1),
(448, 101476, 'CR A ASSOCIAR', '', '', 1),
(449, 101481, 'CR A ASSOCIAR', '', '', 1),
(450, 101482, 'CR A ASSOCIAR', '', '', 1),
(451, 101483, 'CR A ASSOCIAR', '', '', 1),
(452, 101487, 'Convênios Educação', '', '', 1),
(453, 101488, 'CR A ASSOCIAR', '', '', 1),
(454, 101490, 'CR A ASSOCIAR', '', '', 1),
(455, 101491, 'CR A ASSOCIAR', '', '', 1),
(456, 101492, 'CR A ASSOCIAR', '', '', 1),
(457, 101521, 'CR A ASSOCIAR', '', '', 1),
(458, 101522, 'Assessoria de Relações Institucionais', '', '', 1),
(459, 101526, 'Convênio APC Educação Infantil - 18.892', '', '', 1),
(460, 101527, 'CR A ASSOCIAR', '', '', 1),
(461, 101530, 'Setor de Governança', '', '', 1),
(462, 101531, 'CR A ASSOCIAR', '', '', 1),
(463, 101533, 'Convênios Educação', '', '', 1),
(464, 101534, 'CR A ASSOCIAR', '', '', 1),
(465, 101539, 'CR A ASSOCIAR', '', '', 1),
(466, 101544, 'CR A ASSOCIAR', '', '', 1),
(467, 101558, 'CR A ASSOCIAR', '', '', 1),
(468, 101559, 'CR A ASSOCIAR', '', '', 1),
(469, 101562, 'CR A ASSOCIAR', '', '', 1),
(470, 101571, 'Convênios Educação', '', '', 1),
(471, 101598, 'CR A ASSOCIAR', '', '', 1),
(472, 101601, 'Setor de Contratos e Convênios', '', '', 1),
(473, 101603, 'CR A ASSOCIAR', '', '', 1),
(474, 101610, 'Convênios Educação', '', '', 1),
(475, 101612, 'CR A ASSOCIAR', '', '', 1),
(476, 101613, 'CR A ASSOCIAR', '', '', 1),
(477, 101617, 'Convênios Educação', '', '', 1),
(478, 101621, 'Gabinete da Presidência', '', '', 1),
(479, 101622, 'Gestão de Bens Patrimoniais APC', '', '', 1),
(480, 101625, 'Centro de Competência Técnica', '', '', 1),
(481, 101652, 'Centro de Competência Técnica', '', '', 1),
(482, 101665, 'Centro de Competência Técnica', '', '', 1),
(483, 101684, 'CR A ASSOCIAR', '', '', 1),
(484, 101692, 'CR A ASSOCIAR', '', '', 1),
(485, 101695, 'CR A ASSOCIAR', '', '', 1),
(486, 101699, 'Convênios Educação', '', '', 1),
(487, 101717, 'Gabinete da Diretoria HUC', '', '', 1),
(488, 101718, 'CR A ASSOCIAR', '', '', 1),
(489, 101837, 'CR A ASSOCIAR', '', '', 1),
(490, 101839, 'Convênios Educação', '', '', 1),
(491, 101841, 'Convênios Educação', '', '', 1),
(492, 101847, 'Convênios Educação', '', '', 1),
(493, 101848, 'Convênios Educação', '', '', 1),
(494, 101856, 'CR A ASSOCIAR', '', '', 1),
(495, 101882, 'Convênio HUC', '', '', 1),
(496, 101883, 'CR A ASSOCIAR', '', '', 1),
(497, 101903, 'CR A ASSOCIAR', '', '', 1),
(498, 101907, 'CR A ASSOCIAR', '', '', 1),
(499, 101914, 'CR A ASSOCIAR', '', '', 1),
(500, 101916, 'CR A ASSOCIAR', '', '', 1),
(501, 101918, 'CR A ASSOCIAR', '', '', 1),
(502, 101922, 'CR A ASSOCIAR', '', '', 1),
(503, 101924, 'CR A ASSOCIAR', '', '', 1),
(504, 101958, 'CR A ASSOCIAR', '', '', 1),
(505, 101992, 'CR A ASSOCIAR', '', '', 1),
(506, 101993, 'CR A ASSOCIAR', '', '', 1),
(507, 101995, 'CR A ASSOCIAR', '', '', 1),
(508, 102002, 'Gabinete da Diretoria HUC', '', '', 1),
(509, 102012, 'Nutrição HUC', '', '', 1),
(510, 102023, 'Secretaria Acadêmica HUC', '', '', 1),
(511, 102030, 'Pronto Socorro HUC', '', '', 1),
(512, 102036, 'Centro Cirúrgico HUC', '', '', 1),
(513, 102040, 'Equipe de Terapia Intensiva HUC', '', '', 1),
(514, 102041, 'Unidade de Terapia Intensiva 1 HUC', '', '', 1),
(515, 102042, 'Unidade de Terapia Intensiva 2 HUC', '', '', 1),
(516, 102045, 'Equipe de Unidades de Internação HUC', '', '', 1),
(517, 102048, 'Unidade de Internação 3 HUC', '', '', 1),
(518, 102049, 'Unidade de Internação 4 HUC', '', '', 1),
(519, 102053, 'Unidade de Internação 8 HUC', '', '', 1),
(520, 102058, 'Gerencia Administrativa HUC', '', '', 1),
(521, 102059, 'Laboratório de Análises Clínicas HUC', '', '', 1),
(522, 102060, 'Laboratório de Imunogenética HUC', '', '', 1),
(523, 102061, 'Serviço de Radiologia Convencional HUC', '', '', 1),
(524, 102064, 'Serviço de Tomografia HUC', '', '', 1),
(525, 102090, 'Centro de Atendimento Médico', '', '', 1),
(526, 102093, 'Núcleo de Epidemiologia e Controle de Infecção Hos', '', '', 1),
(527, 102101, 'Gerência de Enfermagem HUC', '', '', 1),
(528, 102102, 'Unidade de Terapia Intensiva 4 HUC', '', '', 1),
(529, 102108, 'Unidade de Internação 6 HUC', '', '', 1),
(530, 102116, 'Setor de faturamento HUC', '', '', 1),
(531, 102117, 'Ambulatório HUC', '', '', 1),
(532, 102373, 'Prédio do Hospital Universitário Cajuru', '', '', 1),
(533, 102380, 'Residência Médica HUC', '', '', 1),
(534, 103051, 'Diretoria de Suporte Operacional e Acadêmico', '', '', 1),
(535, 103054, 'Relacionamento', '', '', 1),
(536, 103099, 'Projetos Tecnoparque', '', '', 1),
(537, 103101, 'Prédio Acadêmico', '', '', 1),
(538, 103246, 'Administração da Reitoria', '', '', 1),
(539, 103247, 'Administração da PUCPR Campus Curitiba', '', '', 1),
(540, 103250, 'Adm da Pró-Reitoria de Graduação', '', '', 1),
(541, 103251, 'Adm da Pró-Reitoria Adm. e de Desenvolvimento', '', '', 1),
(542, 103252, 'Núcleo de Processos Seletivos', '', '', 1),
(543, 103266, 'Biblioteca Central', '', '', 1),
(544, 103268, 'Administração da Diretoria de Educação a Distância', '', '', 1),
(545, 103269, 'Núcleo PUC WEB', '', '', 1),
(546, 103275, 'Núcleo da Pastoral', '', '', 1),
(547, 103278, 'Núcleo do Museu e Memoriais', '', '', 1),
(548, 103280, 'Núcleo do Coral', '', '', 1),
(549, 103284, 'Clínica de Nutrição - CCBS', '', '', 1),
(550, 103309, 'Núcleo do Fundo de Pesquisa', '', '', 1),
(551, 103321, 'Prédio Humanas', '', '', 1),
(552, 103324, 'Bloco III Parque Tecnológico', '', '', 1),
(553, 103361, 'Prédio Clínicas Rockfeller', '', '', 1),
(554, 103421, 'Lab. de Informática - Desenvolvimento - Curitiba', '', '', 1),
(555, 103422, 'Lab. de Informática - Biomédico - Curitiba', '', '', 1),
(556, 103423, 'Lab. de Informática Cálculo - Curitiba', '', '', 1),
(557, 103424, 'Lab. de Informática - Gráfico - Curitiba', '', '', 1),
(558, 103433, 'Lab. de Apoio - Eng. Elétrica - BL II PQ TEC', '', '', 1),
(559, 103510, 'Administração da Diretoria de Pós-Graduação Strict', '', '', 1),
(560, 103538, 'Núcleos Curitiba', '', '', 1),
(561, 103636, 'Prédio Simulação Clínica - HNSL', '', '', 1),
(562, 103638, 'Laboratório Multiusuários - Curitiba', '', '', 1),
(563, 103699, 'Projeto Apple', '', '', 1),
(564, 104014, 'SIGA - SJP', '', '', 1),
(565, 104083, 'Administração do Campus SJP', '', '', 1),
(566, 104084, 'Administração da Diretoria de Infraestrutura', '', '', 1),
(567, 104088, 'Almoxarifado - SJPinhais', '', '', 1),
(568, 104090, 'NIAA - SJP', '', '', 1),
(569, 104096, 'Biblioteca - SJP', '', '', 1),
(570, 105013, 'SIGA - Londrina', '', '', 1),
(571, 105085, 'Administração da Fazenda Gralha Azul', '', '', 1),
(572, 105089, 'Agricultura - Fazenda', '', '', 1),
(573, 105099, 'Direção', '', '', 1),
(574, 105115, 'Administração do Setor Industrial', '', '', 1),
(575, 105125, 'Administração da Lúmen', '', '', 1),
(576, 105128, 'Rede Vida', '', '', 1),
(577, 105133, 'Biblioteca - Londrina', '', '', 1),
(578, 105137, 'Administração do Campus - Toledo', '', '', 1),
(579, 105143, 'Hospital Veterinário Campus Toledo - CCTP', '', '', 1),
(580, 105148, 'Administração da Farmácia Universitária', '', '', 1),
(581, 105150, 'Administração do Campus Maringá', '', '', 1),
(582, 105189, 'Gestão de Bens Patrimoniais APC', '', '', 1),
(583, 105190, 'Administrativo', '', '', 1),
(584, 105192, 'Núcleo Comunitário de Guaratuba', '', '', 1),
(585, 105193, 'Administrativo', '', '', 1),
(586, 105194, 'Núcleo Comunitário de São José dos Pinhais', '', '', 1),
(587, 105197, 'SIGA - Maringá', '', '', 1),
(588, 105271, 'Prédio Laboratórios Londrina', '', '', 1),
(589, 108001, 'Projeto Média Complexidade', '', '', 1),
(590, 123019, 'Prédio do Hospital Marcelino Champagnat', '', '', 1),
(591, 123034, 'Recepção CD 2 HMC', '', '', 1),
(592, 123049, 'Serviço de Hemodinâmica HMC', '', '', 1),
(593, 123059, 'Posto de Enfermagem 1 HMC', '', '', 1),
(594, 123063, 'Posto de Enfermagem 5 HMC', '', '', 1),
(595, 103300, 'Diretoria de Pesquisa', '70004750', '70004750', 1),
(596, 103507, 'Adminstração da Pró-Reitoria', '88890586', '88890586', 1);

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `csf`
--

INSERT INTO `csf` (`id_csf`, `csf_aluno`, `csf_orientador`, `csf_modalidade`, `csf_saida`, `csf_saida_previsao`, `csf_retorno`, `csf_retorno_previsao`, `csf_pa_intercambio`, `csf_pais`, `csf_universidade`, `csf_status`, `csf_obs`, `csf_area`, `csf_curso`, `csf_chamada`, `csf_parceiro`) VALUES
(3, 4, 0, 0, '0000-00-00', '2015-06-01', '0000-00-00', '0000-00-00', '0', 'DEU', 0, 1, '', 0, 0, 0, 0),
(4, 5, 0, 0, '0000-00-00', '2015-06-01', '0000-00-00', '0000-00-00', '0', 'DEU', 0, 1, '', 0, 0, 0, 0),
(5, 3, 0, 0, '0000-00-00', '2015-06-01', '0000-00-00', '0000-00-00', '0', 'DEU', 0, 1, '', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `csf_ged`
--

CREATE TABLE IF NOT EXISTS `csf_ged` (
  `id_doc` bigint(20) unsigned NOT NULL,
  `doc_dd0` int(7) DEFAULT NULL,
  `doc_tipo` char(5) DEFAULT NULL,
  `doc_ano` char(4) DEFAULT NULL,
  `doc_filename` text,
  `doc_status` char(1) DEFAULT NULL,
  `doc_data` int(11) DEFAULT NULL,
  `doc_hora` char(8) DEFAULT NULL,
  `doc_arquivo` text,
  `doc_extensao` char(4) DEFAULT NULL,
  `doc_size` float DEFAULT NULL,
  `doc_versao` char(4) DEFAULT NULL,
  `doc_ativo` int(11) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `csf_ged`
--

INSERT INTO `csf_ged` (`id_doc`, `doc_dd0`, `doc_tipo`, `doc_ano`, `doc_filename`, `doc_status`, `doc_data`, `doc_hora`, `doc_arquivo`, `doc_extensao`, `doc_size`, `doc_versao`, `doc_ativo`) VALUES
(1, 7, 'DIVER', '2015', 'ic por campus.docx', '@', 20150618, '10:18:17', '_document/2015/06/-9cde0-ic por campus.docx', 'docx', 24682, '0', 1);

-- --------------------------------------------------------

--
-- Table structure for table `csf_ged_tipo`
--

CREATE TABLE IF NOT EXISTS `csf_ged_tipo` (
  `id_doct` bigint(20) unsigned NOT NULL,
  `doct_nome` char(50) DEFAULT NULL,
  `doct_codigo` char(5) DEFAULT NULL,
  `doct_publico` int(11) DEFAULT NULL,
  `doct_avaliador` int(11) DEFAULT NULL,
  `doct_autor` int(11) DEFAULT NULL,
  `doct_restrito` int(11) DEFAULT NULL,
  `doct_ativo` int(11) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `csf_ged_tipo`
--

INSERT INTO `csf_ged_tipo` (`id_doct`, `doct_nome`, `doct_codigo`, `doct_publico`, `doct_avaliador`, `doct_autor`, `doct_restrito`, `doct_ativo`) VALUES
(1, 'Documentos diversos', 'DIVER', 1, 1, 1, 1, 1);

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
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Table structure for table `csf_parceiro`
--

CREATE TABLE IF NOT EXISTS `csf_parceiro` (
  `id_cp` bigint(20) unsigned NOT NULL,
  `cp_descricao` char(80) NOT NULL,
  `cp_pais` int(11) NOT NULL DEFAULT '0',
  `cp_ativo` tinyint(4) NOT NULL DEFAULT '1',
  `cp_contato` text NOT NULL,
  `cp_email_1` char(80) NOT NULL,
  `cp_email_2` char(80) NOT NULL,
  `cp_phone_1` char(20) NOT NULL,
  `cp_phone_2` char(20) NOT NULL,
  `cp_site` char(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `csf_parceiro`
--

INSERT INTO `csf_parceiro` (`id_cp`, `cp_descricao`, `cp_pais`, `cp_ativo`, `cp_contato`, `cp_email_1`, `cp_email_2`, `cp_phone_1`, `cp_phone_2`, `cp_site`) VALUES
(1, 'Alemanha/DAAD', 5, 1, '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `csf_status`
--

CREATE TABLE IF NOT EXISTS `csf_status` (
  `id_cs` bigint(20) unsigned NOT NULL,
  `cs_descricao` char(80) NOT NULL,
  `cs_ativo` tinyint(4) NOT NULL DEFAULT '1',
  `cs_contabiliza` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
,`id_us` bigint(20) unsigned
,`us_nome` varchar(250)
,`us_cpf` varchar(15)
,`us_cracha` varchar(15)
,`us_emplid` varchar(15)
,`us_link_lattes` varchar(100)
,`us_ativo` tinyint(1) unsigned
,`us_teste` tinyint(1) unsigned
,`us_origem` int(2)
,`us_professor_tipo` int(2)
,`us_usuario_cursando` int(11)
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
,`id` bigint(20) unsigned
,`iso` char(2)
,`iso3` char(3)
,`numcode` char(3)
,`nome` varchar(80)
,`id_ed` bigint(20) unsigned
,`ed_titulo` text
,`ed_data` date
,`ed_agencia` char(7)
,`ed_idioma` char(5)
,`ed_chamada` char(30)
,`ed_data_1` date
,`ed_data_2` date
,`ed_data_3` date
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
,`ed_data_envio` date
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
  `id_ct` int(11) unsigned NOT NULL,
  `ct_descricao` varchar(60) DEFAULT NULL,
  `ct_main` char(1) DEFAULT NULL,
  `ct_auto_ref` int(11) unsigned DEFAULT NULL,
  `ct_ativo` tinyint(1) unsigned DEFAULT '1',
  `ct_ordem` int(2) unsigned DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fomento_categoria`
--

INSERT INTO `fomento_categoria` (`id_ct`, `ct_descricao`, `ct_main`, `ct_auto_ref`, `ct_ativo`, `ct_ordem`) VALUES
(1, 'Corpo Docente & Discente', '1', 0, 1, 1),
(2, 'Professores stricto sensu', '', 1, 1, 1),
(3, 'Professores doutores', '', 1, 1, 2),
(4, 'Professores mestres', '', 1, 1, 3),
(5, 'Todos os professores (SS e graduação)', '', 1, 1, 4),
(6, 'Secretarias & Decanatos', '1', 0, 1, 2),
(7, 'Decanos', '', 1, 1, 1),
(8, 'Coordenadores de programas PG', '', 6, 1, 2),
(9, 'Secretarias PPG', '', 6, 1, 3),
(10, 'Discentes', '1', 0, 1, 3),
(11, 'Discentes PPG', '', 10, 1, 1),
(12, 'Discentes IC', '', 10, 1, 2),
(13, 'Discentes doutorandos', '', 10, 1, 3),
(14, 'Discentes mestrandos', '', 10, 1, 3),
(15, 'Discentes egressos', '', 10, 1, 6),
(16, 'Tipo de edital', '1', 0, 1, 5),
(17, 'Pesquisa básica e aplicada', '', 16, 1, 1),
(18, 'Bolsas de Iniciação Científica', '', 16, 1, 2),
(19, 'Bolsas Pós-Doutorado', '', 16, 1, 2),
(20, 'Organização de eventos', '', 16, 1, 5),
(21, 'Bolsas produtividade', '', 16, 1, 8),
(22, 'Bolsas Sênior', '', 16, 1, 13),
(23, 'Projeto Institucional', '', 16, 1, 7),
(24, 'Bolsas de mestrado e doutorado', '', 16, 1, 11),
(25, 'Pesquisador visitante', '', 16, 1, 19),
(26, 'Prêmios', '', 16, 1, 18),
(27, 'Participação em eventos', '', 16, 1, 9),
(28, 'Pesquisador na empresa', '', 16, 1, 6),
(29, 'Ciência sem Fronteiras', '', 16, 1, 17),
(30, 'Apoio a editoração e publicação de periódicos', '', 16, 1, 20),
(31, 'Fundação Araucária e o Fundo Newton', '', 16, 1, 1),
(32, 'Mobilidade Internacional', '', 16, 1, 10),
(33, 'Bolsa Graduação', '1', 16, 1, 20),
(34, 'Bolsa Capacitação', '', 16, 1, 16),
(35, 'Escolas da PUCPR', '1', 0, 1, 11),
(36, 'Escola de Saúde e Biociências', '', 35, 1, 1),
(37, '==teste PDI==', '', 16, 1, 20),
(38, 'Escola Politécnica', '', 35, 1, 5),
(39, 'Escola de Arquitetura e Design', '', 35, 1, 10),
(40, 'Escola de Ciências Agrárias e Medicina Veterinária', '', 35, 1, 13),
(41, 'Escola de Comunicação e Artes', '', 35, 1, 16),
(42, 'Escola de Direito', '', 35, 1, 16),
(43, 'Escola de Educação e Humanidades', '', 35, 1, 19),
(44, 'Escola de Medicina', '', 35, 1, 17),
(45, 'Escola de Negócios', '', 35, 1, 13);

-- --------------------------------------------------------

--
-- Table structure for table `fomento_editais`
--

CREATE TABLE IF NOT EXISTS `fomento_editais` (
  `id_ed` bigint(20) unsigned NOT NULL,
  `ed_titulo` text,
  `ed_data` date DEFAULT NULL,
  `ed_agencia` char(7) DEFAULT NULL,
  `ed_idioma` char(5) DEFAULT NULL,
  `ed_chamada` char(30) DEFAULT NULL,
  `ed_data_1` date DEFAULT NULL,
  `ed_data_2` date DEFAULT NULL,
  `ed_data_3` date DEFAULT NULL,
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
  `ed_data_envio` date DEFAULT NULL,
  `ed_document_require` char(1) DEFAULT NULL,
  `ed_login` char(15) DEFAULT NULL,
  `ed_titulo_email` char(100) DEFAULT NULL,
  `ed_edital_tipo` char(2) DEFAULT NULL,
  `ed_fluxo_continuo` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fomento_editais`
--

INSERT INTO `fomento_editais` (`id_ed`, `ed_titulo`, `ed_data`, `ed_agencia`, `ed_idioma`, `ed_chamada`, `ed_data_1`, `ed_data_2`, `ed_data_3`, `ed_texto_1`, `ed_texto_2`, `ed_texto_3`, `ed_texto_4`, `ed_texto_5`, `ed_texto_6`, `ed_texto_7`, `ed_texto_8`, `ed_texto_9`, `ed_texto_10`, `ed_texto_11`, `ed_texto_12`, `ed_status`, `ed_autor`, `ed_corpo`, `ed_url_externa`, `ed_total_visualizacoes`, `ed_local`, `ed_data_envio`, `ed_document_require`, `ed_login`, `ed_titulo_email`, `ed_edital_tipo`, `ed_fluxo_continuo`) VALUES
(1, 'teste', NULL, '111', 'pt_BR', NULL, NULL, NULL, NULL, 'qwe', 'qwe', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `fomento_edital_categoria`
--

CREATE TABLE IF NOT EXISTS `fomento_edital_categoria` (
  `id_catp` bigint(20) unsigned NOT NULL,
  `catp_produto` int(7) DEFAULT NULL,
  `catp_categoria` char(5) DEFAULT NULL,
  `catp_ativo` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logins`
--

INSERT INTO `logins` (`id_us`, `us_nome`, `us_login`, `us_senha`, `us_lastupdate`, `us_cpf`, `us_dt_admissao`, `us_cracha`, `us_perfil`, `us_id`) VALUES
(1, 'Rene Faustino Gabriel Junior', 'RENE.GABRIEL', '876197588c22835cee493fea3e2d1c2e', 20150611, '72952105987', 20150611, '', NULL, '');

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
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logins_log`
--

INSERT INTO `logins_log` (`id_ul`, `ul_data`, `ul_hora`, `ul_ip`, `ul_proto`, `ul_cpf`) VALUES
(2, 20150615, '08:33:58', '127.0.0.1', 'LOGIN', '72952105987'),
(3, 20150618, '11:11:39', '10.96.155.106', 'ADR', '72952105987');

-- --------------------------------------------------------

--
-- Table structure for table `logins_perfil`
--

CREATE TABLE IF NOT EXISTS `logins_perfil` (
  `id_usp` bigint(20) unsigned NOT NULL,
  `usp_codigo` char(4) DEFAULT NULL,
  `usp_descricao` char(50) DEFAULT NULL,
  `usp_ativo` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pais`
--

CREATE TABLE IF NOT EXISTS `pais` (
  `id` bigint(20) unsigned NOT NULL,
  `iso` char(2) NOT NULL,
  `iso3` char(3) NOT NULL,
  `numcode` char(3) NOT NULL,
  `nome` varchar(80) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
-- Table structure for table `programa_pos`
--

CREATE TABLE IF NOT EXISTS `programa_pos` (
  `id_pp` int(11) unsigned NOT NULL,
  `pp_nome` varchar(100) NOT NULL,
  `pp_sigla` varchar(10) NOT NULL,
  `pp_cursos` tinyint(1) DEFAULT '1' COMMENT 'se = 1 somente mestrado\nse = 2 mestrado e doutorado\nse = 3 mestrado, doutorado e pós-doutorado',
  `pp_conceito` int(2) DEFAULT NULL COMMENT 'conceito do curso de pos',
  `pp_dt_inicio` date DEFAULT NULL COMMENT 'data de inicio do programa',
  `pp_email` varchar(100) DEFAULT NULL COMMENT 'email do programa',
  `pp_fone1` varchar(14) DEFAULT NULL COMMENT 'fone do programa',
  `pp_fone2` varchar(14) DEFAULT NULL COMMENT 'fone do programa',
  `pp_ativo` tinyint(1) unsigned NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1 COMMENT='relaciona todos os programas de pos graduação vinculados a um usuario';

--
-- Dumping data for table `programa_pos`
--

INSERT INTO `programa_pos` (`id_pp`, `pp_nome`, `pp_sigla`, `pp_cursos`, `pp_conceito`, `pp_dt_inicio`, `pp_email`, `pp_fone1`, `pp_fone2`, `pp_ativo`) VALUES
(1, 'Bioética', 'PPGB', 1, 3, '0000-00-00', '@pucpr.br', '41 9999-9999', '41 8888-8888', 1),
(2, 'Ciência Animal', 'PPGCA', 1, 3, '0000-00-00', '@pucpr.br', '41 9999-9999', '41 8888-8888', 1),
(3, 'Ciências da Saúde', 'PPGCS', 2, 5, '0000-00-00', '@pucpr.br', '41 9999-9999', '41 8888-8888', 1),
(4, 'Direito', 'PPGD', 2, 5, '0000-00-00', '@pucpr.br', '41 9999-9999', '41 8888-8888', 1),
(5, 'Educação', 'PPGE', 2, 5, '0000-00-00', '@pucpr.br', '41 9999-9999', '41 8888-8888', 1),
(6, 'Engenharia de Produção e Sistemas', 'PPGEPS', 2, 4, '0000-00-00', '@pucpr.br', '41 9999-9999', '41 8888-8888', 1),
(7, 'Engenharia Mecânica', 'PPGEM', 2, 5, '0000-00-00', '@pucpr.br', '41 9999-9999', '41 8888-8888', 1),
(8, 'Filosofia', 'PPGF', 1, 4, '0000-00-00', '@pucpr.br', '41 9999-9999', '41 8888-8888', 1),
(9, 'Gestão Urbana', 'PPGTU', 2, 5, '0000-00-00', '@pucpr.br', '41 3271-1664', '', 1),
(10, 'Informática', 'PPGIa', 2, 4, '0000-00-00', '@pucpr.br', '41 9999-9999', '41 8888-8888', 1),
(11, 'Odontologia', 'PPGO', 2, 4, '0000-00-00', '@pucpr.br', '41 9999-9999', '41 8888-8888', 1),
(12, 'Programa de Pós-Graduação em Administração', 'PPAD', 2, 5, '0000-00-00', '@pucpr.br', '41 9999-9999', '41 8888-8888', 1),
(13, 'Programa de Pós-Graduação em Gestão de Cooperativas', 'PPGCOOP', 1, 3, '0000-00-00', '@pucpr.br', '41 9999-9999', '41 8888-8888', 1),
(14, 'Tecnologia em Saúde', 'PPGTS', 1, 4, '0000-00-00', '@pucpr.br', '41 9999-9999', '41 8888-8888', 1),
(15, 'Teologia', 'PPGT', 1, 4, '0000-00-00', '@pucpr.br', '41 9999-9999', '41 8888-8888', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pro_equipamento`
--

CREATE TABLE IF NOT EXISTS `pro_equipamento` (
  `id_pe` bigint(20) unsigned NOT NULL,
  `pe_nome` char(250) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `pe_marca` varchar(40) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `pe_modelo` char(40) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `pe_preco` double NOT NULL,
  `pe_tipo` int(11) NOT NULL,
  `pe_part_number` varchar(40) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `pe_descricao_1` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `pe_descricao_2` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `pe_descricao_3` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `pe_ativo` int(11) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
  `pec_descricao` varchar(80) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `pec_ativo` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
  `pei_patrimonio` char(30) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `pei_serial` char(30) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `pei_laboratorio` int(11) NOT NULL,
  `pei_aquisicao` date NOT NULL DEFAULT '0000-00-00',
  `pei_convenio` char(20) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `pei_obs` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `pei_status` int(11) NOT NULL,
  `pei_valor` double NOT NULL,
  `pei_obs_2` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `pei_ativo` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pro_equipamento_laboratorio`
--

CREATE TABLE IF NOT EXISTS `pro_equipamento_laboratorio` (
  `id_pel` bigint(20) unsigned NOT NULL,
  `pel_descricao` char(150) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `pel_escola` int(11) NOT NULL,
  `pel_responsavel` int(11) NOT NULL,
  `pel_localizacao` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `pel_atualizado` int(11) NOT NULL,
  `pel_lat` double NOT NULL,
  `pel_log` double NOT NULL,
  `pel_ativo` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pro_equipamento_status`
--

CREATE TABLE IF NOT EXISTS `pro_equipamento_status` (
  `id_pes` bigint(20) unsigned NOT NULL,
  `pes_descricao` char(150) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `pes_color` char(7) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `pes_ativo` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
  `pet_descricao` char(80) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `pet_contabil` int(11) NOT NULL,
  `pet_ativo` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
  `u_descricao` char(200) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `u_sigla` char(10) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `u_decano` char(8) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `u_ativo` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unidade`
--

INSERT INTO `unidade` (`id_u`, `u_descricao`, `u_sigla`, `u_decano`, `u_ativo`) VALUES
(1, 'Escola Politécnica', '', '', 1),
(2, 'Escola de Saúde e Biociências', '', '', 1),
(3, 'Escola de Ciências Agrárias e Medicina Veterinária', '', '', 1),
(4, 'Escola de Arquitetura e Design', '', '', 1),
(5, 'Escola de Comunicação e Artes', '', '', 1),
(6, 'Escola de Direito', '', '', 1),
(7, 'Escola de Educação e Humanidade', '', '', 1),
(8, 'Escola de Medicina', '', '', 1),
(9, 'Escola de Negócios', '', '', 1),
(10, '-não identificado-', '', '', 1),
(11, '-não identificado-', '', '', 1),
(12, '--cancelado--', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id_us` bigint(20) unsigned NOT NULL,
  `us_nome` varchar(250) DEFAULT NULL,
  `us_cpf` varchar(15) DEFAULT NULL,
  `us_cracha` varchar(15) DEFAULT NULL,
  `us_emplid` varchar(15) DEFAULT NULL,
  `us_link_lattes` varchar(100) DEFAULT NULL,
  `us_ativo` tinyint(1) unsigned DEFAULT '1',
  `us_teste` tinyint(1) unsigned DEFAULT '0',
  `us_origem` int(2) DEFAULT '1' COMMENT '[1 - Não Definido], [2 - PUCPR], [3 - Externo]',
  `us_professor_tipo` int(2) DEFAULT '1' COMMENT '[1 - Não Definido], [2 - Stricto Sensu], [3 - Graduação]',
  `us_usuario_cursando` int(11) DEFAULT '1' COMMENT '[1 - Não Definido], [2 - Inativo],  [3 - Graduação], [4 - Mestrado], [5 - Doutorado], [5 - Pós-Doutorado]',
  `us_regime` varchar(10) DEFAULT NULL COMMENT 'Horista / TI / TP',
  `us_genero` char(1) DEFAULT NULL COMMENT '[''M'' = masculino], [''F'' = feminino]',
  `usuario_tipo_ust_id` int(11) NOT NULL DEFAULT '1' COMMENT '[1 - Não Definido], [2 - Professor], [3 - Aluno], [4 - Colaborador], [5 - Externo]',
  `usuario_funcao_usf_id` int(11) NOT NULL DEFAULT '1' COMMENT '[1 - Não Definido], [2 - Professor Auxiliar de Ensino], [3 - Professor Assistente], [4 - Professor Adjunto], [5 - Professor Titular],',
  `usuario_titulacao_ust_id` int(11) NOT NULL DEFAULT '1' COMMENT '[1 - Não Definido], [2 - Técnico], [3 - Graduação], [4 - Especialista], [5 - Mestre], [6 - Doutor], [7 - Pós-Doutorado], [8 - Residência Médica],',
  `us_dt_nascimento` date NOT NULL DEFAULT '0000-00-00'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`id_us`, `us_nome`, `us_cpf`, `us_cracha`, `us_emplid`, `us_link_lattes`, `us_ativo`, `us_teste`, `us_origem`, `us_professor_tipo`, `us_usuario_cursando`, `us_regime`, `us_genero`, `usuario_tipo_ust_id`, `usuario_funcao_usf_id`, `usuario_titulacao_ust_id`, `us_dt_nascimento`) VALUES
(1, 'Rene Faustino Gabriel Junior', '72952105987', '88958022', '', NULL, 1, 0, 1, 1, 1, NULL, 'M', 3, 1, 1, '1969-10-05'),
(2, 'Jefferson Fellipe Jahnke', '02350263959', '88936956', '', NULL, 1, 0, 1, 1, 1, NULL, 'M', 3, 1, 1, '1977-11-04'),
(3, 'Flávio Justino Fêo', '84204052991', '88943483', '', NULL, 1, 0, 1, 1, 1, NULL, 'M', 3, 1, 1, '1976-10-23'),
(4, 'Milena Binhame Albini', '06706138940', '88961973', '', NULL, 1, 0, 1, 1, 1, NULL, 'F', 3, 1, 1, '1987-07-23');

-- --------------------------------------------------------

--
-- Table structure for table `usuario_bolsa`
--

CREATE TABLE IF NOT EXISTS `usuario_bolsa` (
  `id_usb` int(11) unsigned NOT NULL,
  `usuario_id_us` int(11) NOT NULL COMMENT 'vincula o id do usuario dono da bolsa',
  `tipo_bolsa_id_bmod` int(11) NOT NULL DEFAULT '1' COMMENT 'vincula qual modalidade é a bolsa',
  `usb_vlr` float(9,2) DEFAULT NULL,
  `usb_dt_inicio` date DEFAULT NULL COMMENT 'inicio da vigencia',
  `usb_dt_termino` date DEFAULT NULL COMMENT 'fim da vigencia',
  `usb_vigencia` int(2) DEFAULT NULL COMMENT 'vigencia em meses',
  `usb_ativo` tinyint(1) DEFAULT '1' COMMENT '0 - inativa\n1 - ativa'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabela que armazena o historico de bolsas do usuario. vinculada a usuario e bolsa_modalidade';

-- --------------------------------------------------------

--
-- Table structure for table `usuario_complemento`
--

CREATE TABLE IF NOT EXISTS `usuario_complemento` (
  `usuario_id_us` int(11) unsigned NOT NULL,
  `usc_rua` varchar(150) DEFAULT NULL,
  `usc_complemento` varchar(45) DEFAULT NULL,
  `usc_bairro` varchar(80) DEFAULT NULL,
  `usc_cep` varchar(10) DEFAULT NULL,
  `usc_cidade` varchar(80) DEFAULT NULL,
  `usc_pais` varchar(60) DEFAULT NULL,
  `usc_uf` char(2) DEFAULT NULL,
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
-- Table structure for table `usuario_cracha`
--

CREATE TABLE IF NOT EXISTS `usuario_cracha` (
  `id_usc` int(11) unsigned NOT NULL,
  `usc_cracha` varchar(15) DEFAULT NULL COMMENT 'numeros dos crachas utilizados por um usuario',
  `usc_dt_inicio` date DEFAULT NULL COMMENT 'inicio da utilização do numero',
  `usc_dt_fim` date DEFAULT NULL COMMENT 'fim da utilização do numero',
  `usc_ativo` tinyint(1) DEFAULT '1' COMMENT 'numero atual ativo (replicado para a tabela usuario)',
  `usuario_id_us` int(11) NOT NULL COMMENT 'cincula com o id da tabela usuario'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabela para armazenar todos os numeros de cracha utilizados por um usuario';

-- --------------------------------------------------------

--
-- Table structure for table `usuario_cursando`
--

CREATE TABLE IF NOT EXISTS `usuario_cursando` (
  `id_usc` int(11) unsigned NOT NULL,
  `usc_nome` varchar(60) DEFAULT NULL COMMENT '[1 - Não Definido],\n[2 - Inativo], \n[3 - Graduação],\n[4 - Mestrado],\n[5 - Doutorado],\n[5 - Pós-Doutorado]\n',
  `usc_ativo` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='O que o usuario está cursando atualmente';

--
-- Dumping data for table `usuario_cursando`
--

INSERT INTO `usuario_cursando` (`id_usc`, `usc_nome`, `usc_ativo`) VALUES
(1, 'Não Definido', 1),
(2, 'Inativo', 1),
(3, 'Graduação', 1),
(4, 'Mestrado', 1),
(5, 'Doutorado', 1),
(6, 'Pós-Doutorado', 1);

-- --------------------------------------------------------

--
-- Table structure for table `usuario_email`
--

CREATE TABLE IF NOT EXISTS `usuario_email` (
  `id_usm` int(11) unsigned NOT NULL,
  `usuario_id_us` int(11) NOT NULL COMMENT 'vicula com o id da tabela usuario',
  `usm_tipo` char(4) DEFAULT NULL COMMENT 'Tipos de email - pessoal, corporativo',
  `usm_email` varchar(100) DEFAULT NULL,
  `usm_ativo` tinyint(1) DEFAULT '1',
  `usm_email_preferencial` tinyint(1) DEFAULT '0' COMMENT '[0 - não], [1 - sim]'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='tabela com todos os email do usuario';

-- --------------------------------------------------------

--
-- Table structure for table `usuario_fone`
--

CREATE TABLE IF NOT EXISTS `usuario_fone` (
  `id_ufs` int(11) unsigned NOT NULL,
  `usuario_id_us` int(11) NOT NULL COMMENT 'vincula com id da tabela usuario',
  `usf_tipo` char(3) DEFAULT NULL COMMENT 'Tipos de fone: [1 - celular], [2 - residencial], [3 - comercial], [4 - outro]',
  `usf_fone` varchar(15) DEFAULT NULL,
  `usf_ativo` tinyint(1) DEFAULT '1',
  `usf_fone_preferencial` tinyint(1) DEFAULT '1' COMMENT '[0 - não], [1 - sim]'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='todos os tipos de telefone de um usuario';

-- --------------------------------------------------------

--
-- Table structure for table `usuario_funcao`
--

CREATE TABLE IF NOT EXISTS `usuario_funcao` (
  `usf_id` int(11) unsigned NOT NULL,
  `usf_nome` varchar(60) DEFAULT NULL COMMENT '[1 - Não Definido],[2 - Professor Auxiliar de Ensino],[3 - Professor Assistente],[4 - Professor Adjunto],[5 - Professor Titular], ...',
  `usf_ativo` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 COMMENT='Tabela com as funções dos professores \r\n[1 - Professor Auxiliar de Ensino]\r\n[2 - Professor Assistente]\r\n[3 - Professor Adjunto]\r\n[4 - Professor Titular]';

--
-- Dumping data for table `usuario_funcao`
--

INSERT INTO `usuario_funcao` (`usf_id`, `usf_nome`, `usf_ativo`) VALUES
(1, 'Não Definido', 1),
(2, 'Professor Auxiliar de Ensino', 1),
(3, 'Professor Assistente', 1),
(4, 'Professor Adjunto', 1),
(5, 'Professor Titular', 1);

-- --------------------------------------------------------

--
-- Table structure for table `usuario_hora`
--

CREATE TABLE IF NOT EXISTS `usuario_hora` (
  `usuario_id_us` int(11) unsigned NOT NULL COMMENT 'vincula com id da tabela usuario',
  `ush_administrativa` int(2) DEFAULT NULL,
  `ush_pedagogica` int(2) DEFAULT NULL,
  `ush_direcao` int(2) DEFAULT NULL,
  `ush_letiva` int(2) DEFAULT NULL,
  `ush_stricto_sensu` int(2) DEFAULT NULL,
  `ush_permanencia` int(2) DEFAULT NULL,
  `ush_permanencia_de` int(2) DEFAULT NULL,
  `ush_total` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabela com a quantidade e tipo de horas trabalhadas por colaboradores e professores';

-- --------------------------------------------------------

--
-- Table structure for table `usuario_tipo`
--

CREATE TABLE IF NOT EXISTS `usuario_tipo` (
  `ust_id` int(11) unsigned NOT NULL,
  `ust_nome` varchar(45) DEFAULT NULL COMMENT '[1 - Não Definido], [2 - Professor], [3 - Aluno], [4 - Colaborador], [5 - Externo]',
  `ust_ativo` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 COMMENT='Tabela com o tipo do usuário (função Atual):\r\n1 - Professor\r\n2 - Aluno\r\n3 - Secretária\r\n4 - Colaborador';

--
-- Dumping data for table `usuario_tipo`
--

INSERT INTO `usuario_tipo` (`ust_id`, `ust_nome`, `ust_ativo`) VALUES
(1, 'Não Definido', 1),
(2, 'Professor', 1),
(3, 'Aluno', 1),
(4, 'Colaborador', 1),
(5, 'Externo', 1);

-- --------------------------------------------------------

--
-- Table structure for table `usuario_titulacao`
--

CREATE TABLE IF NOT EXISTS `usuario_titulacao` (
  `ust_id` int(11) unsigned NOT NULL,
  `ust_nome` varchar(50) DEFAULT NULL COMMENT '[1 - Não Definido],\n[2 - Técnico],\n[3 - Graduação],\n[4 - Especialista],\n[5 - Mestre],\n[6 - Doutor],\n[7 - Pós-Doutorado],\n[8 - Residência Médica],',
  `ust_sigla` varchar(10) DEFAULT NULL,
  `ust_ativo` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1 COMMENT='Tabela com a titulação atual do usuario';

--
-- Dumping data for table `usuario_titulacao`
--

INSERT INTO `usuario_titulacao` (`ust_id`, `ust_nome`, `ust_sigla`, `ust_ativo`) VALUES
(1, 'Não Definido', 'ND.', 1),
(2, 'Técnico', 'Tec.', 1),
(3, 'Graduação', 'BSc.', 1),
(4, 'Especialista', 'Esp.', 1),
(5, 'Mestre', 'MsC.', 1),
(6, 'Doutor', 'Dr.', 1),
(7, 'Pós-Doutor', 'Pós-Dr.', 1),
(8, 'Residência Médica', 'Res. MD.', 1);

-- --------------------------------------------------------

--
-- Structure for view `csf_view`
--
DROP TABLE IF EXISTS `csf_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`cip`@`%` SQL SECURITY DEFINER VIEW `csf_view` AS (select `csf`.`id_csf` AS `id_csf`,`csf`.`csf_aluno` AS `csf_aluno`,`csf`.`csf_orientador` AS `csf_orientador`,`csf`.`csf_modalidade` AS `csf_modalidade`,`csf`.`csf_saida` AS `csf_saida`,`csf`.`csf_saida_previsao` AS `csf_saida_previsao`,`csf`.`csf_retorno` AS `csf_retorno`,`csf`.`csf_retorno_previsao` AS `csf_retorno_previsao`,`csf`.`csf_pa_intercambio` AS `csf_pa_intercambio`,`csf`.`csf_pais` AS `csf_pais`,`csf`.`csf_universidade` AS `csf_universidade`,`csf`.`csf_status` AS `csf_status`,`csf`.`csf_obs` AS `csf_obs`,`csf`.`csf_area` AS `csf_area`,`csf`.`csf_curso` AS `csf_curso`,`csf`.`csf_chamada` AS `csf_chamada`,`csf`.`csf_parceiro` AS `csf_parceiro`,`usuario`.`id_us` AS `id_us`,`usuario`.`us_nome` AS `us_nome`,`usuario`.`us_cpf` AS `us_cpf`,`usuario`.`us_cracha` AS `us_cracha`,`usuario`.`us_emplid` AS `us_emplid`,`usuario`.`us_link_lattes` AS `us_link_lattes`,`usuario`.`us_ativo` AS `us_ativo`,`usuario`.`us_teste` AS `us_teste`,`usuario`.`us_origem` AS `us_origem`,`usuario`.`us_professor_tipo` AS `us_professor_tipo`,`usuario`.`us_usuario_cursando` AS `us_usuario_cursando`,`usuario`.`us_regime` AS `us_regime`,`usuario`.`us_genero` AS `us_genero`,`usuario`.`usuario_tipo_ust_id` AS `usuario_tipo_ust_id`,`usuario`.`usuario_funcao_usf_id` AS `usuario_funcao_usf_id`,`usuario`.`usuario_titulacao_ust_id` AS `usuario_titulacao_ust_id`,`usuario`.`us_dt_nascimento` AS `us_dt_nascimento`,`csf_status`.`id_cs` AS `id_cs`,`csf_status`.`cs_descricao` AS `cs_descricao`,`csf_status`.`cs_ativo` AS `cs_ativo`,`csf_status`.`cs_contabiliza` AS `cs_contabiliza`,`pais`.`id` AS `id`,`pais`.`iso` AS `iso`,`pais`.`iso3` AS `iso3`,`pais`.`numcode` AS `numcode`,`pais`.`nome` AS `nome`,`fomento_editais`.`id_ed` AS `id_ed`,`fomento_editais`.`ed_titulo` AS `ed_titulo`,`fomento_editais`.`ed_data` AS `ed_data`,`fomento_editais`.`ed_agencia` AS `ed_agencia`,`fomento_editais`.`ed_idioma` AS `ed_idioma`,`fomento_editais`.`ed_chamada` AS `ed_chamada`,`fomento_editais`.`ed_data_1` AS `ed_data_1`,`fomento_editais`.`ed_data_2` AS `ed_data_2`,`fomento_editais`.`ed_data_3` AS `ed_data_3`,`fomento_editais`.`ed_texto_1` AS `ed_texto_1`,`fomento_editais`.`ed_texto_2` AS `ed_texto_2`,`fomento_editais`.`ed_texto_3` AS `ed_texto_3`,`fomento_editais`.`ed_texto_4` AS `ed_texto_4`,`fomento_editais`.`ed_texto_5` AS `ed_texto_5`,`fomento_editais`.`ed_texto_6` AS `ed_texto_6`,`fomento_editais`.`ed_texto_7` AS `ed_texto_7`,`fomento_editais`.`ed_texto_8` AS `ed_texto_8`,`fomento_editais`.`ed_texto_9` AS `ed_texto_9`,`fomento_editais`.`ed_texto_10` AS `ed_texto_10`,`fomento_editais`.`ed_texto_11` AS `ed_texto_11`,`fomento_editais`.`ed_texto_12` AS `ed_texto_12`,`fomento_editais`.`ed_status` AS `ed_status`,`fomento_editais`.`ed_autor` AS `ed_autor`,`fomento_editais`.`ed_corpo` AS `ed_corpo`,`fomento_editais`.`ed_url_externa` AS `ed_url_externa`,`fomento_editais`.`ed_total_visualizacoes` AS `ed_total_visualizacoes`,`fomento_editais`.`ed_local` AS `ed_local`,`fomento_editais`.`ed_data_envio` AS `ed_data_envio`,`fomento_editais`.`ed_document_require` AS `ed_document_require`,`fomento_editais`.`ed_login` AS `ed_login`,`fomento_editais`.`ed_titulo_email` AS `ed_titulo_email`,`fomento_editais`.`ed_edital_tipo` AS `ed_edital_tipo`,`fomento_editais`.`ed_fluxo_continuo` AS `ed_fluxo_continuo`,`csf_parceiro`.`id_cp` AS `id_cp`,`csf_parceiro`.`cp_descricao` AS `cp_descricao`,`csf_parceiro`.`cp_pais` AS `cp_pais`,`csf_parceiro`.`cp_ativo` AS `cp_ativo` from (((((`csf` left join `usuario` on((`usuario`.`id_us` = `csf`.`csf_aluno`))) left join `csf_status` on((`csf`.`csf_status` = `csf_status`.`id_cs`))) left join `pais` on((`csf`.`csf_pais` = `pais`.`iso3`))) left join `fomento_editais` on((`csf`.`csf_chamada` = `fomento_editais`.`id_ed`))) left join `csf_parceiro` on((`csf`.`csf_parceiro` = `csf_parceiro`.`id_cp`))));

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bolsa_modalidade`
--
ALTER TABLE `bolsa_modalidade`
  ADD PRIMARY KEY (`id_bmod`);

--
-- Indexes for table `csf_ged`
--
ALTER TABLE `csf_ged`
  ADD UNIQUE KEY `id_doc` (`id_doc`);

--
-- Indexes for table `csf_ged_tipo`
--
ALTER TABLE `csf_ged_tipo`
  ADD UNIQUE KEY `id_doct` (`id_doct`);

--
-- Indexes for table `csf_historico`
--
ALTER TABLE `csf_historico`
  ADD UNIQUE KEY `id_slog` (`id_slog`);

--
-- Indexes for table `fomento_categoria`
--
ALTER TABLE `fomento_categoria`
  ADD PRIMARY KEY (`id_ct`);

--
-- Indexes for table `logins_log`
--
ALTER TABLE `logins_log`
  ADD UNIQUE KEY `id_ul` (`id_ul`);

--
-- Indexes for table `programa_pos`
--
ALTER TABLE `programa_pos`
  ADD PRIMARY KEY (`id_pp`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_us`);

--
-- Indexes for table `usuario_bolsa`
--
ALTER TABLE `usuario_bolsa`
  ADD PRIMARY KEY (`id_usb`);

--
-- Indexes for table `usuario_cracha`
--
ALTER TABLE `usuario_cracha`
  ADD PRIMARY KEY (`id_usc`);

--
-- Indexes for table `usuario_cursando`
--
ALTER TABLE `usuario_cursando`
  ADD PRIMARY KEY (`id_usc`);

--
-- Indexes for table `usuario_email`
--
ALTER TABLE `usuario_email`
  ADD PRIMARY KEY (`id_usm`);

--
-- Indexes for table `usuario_fone`
--
ALTER TABLE `usuario_fone`
  ADD PRIMARY KEY (`id_ufs`);

--
-- Indexes for table `usuario_funcao`
--
ALTER TABLE `usuario_funcao`
  ADD PRIMARY KEY (`usf_id`);

--
-- Indexes for table `usuario_hora`
--
ALTER TABLE `usuario_hora`
  ADD PRIMARY KEY (`usuario_id_us`);

--
-- Indexes for table `usuario_tipo`
--
ALTER TABLE `usuario_tipo`
  ADD PRIMARY KEY (`ust_id`);

--
-- Indexes for table `usuario_titulacao`
--
ALTER TABLE `usuario_titulacao`
  ADD PRIMARY KEY (`ust_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `csf_ged`
--
ALTER TABLE `csf_ged`
  MODIFY `id_doc` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `csf_ged_tipo`
--
ALTER TABLE `csf_ged_tipo`
  MODIFY `id_doct` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `csf_historico`
--
ALTER TABLE `csf_historico`
  MODIFY `id_slog` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `fomento_categoria`
--
ALTER TABLE `fomento_categoria`
  MODIFY `id_ct` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `logins_log`
--
ALTER TABLE `logins_log`
  MODIFY `id_ul` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `programa_pos`
--
ALTER TABLE `programa_pos`
  MODIFY `id_pp` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_us` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `usuario_bolsa`
--
ALTER TABLE `usuario_bolsa`
  MODIFY `id_usb` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `usuario_cracha`
--
ALTER TABLE `usuario_cracha`
  MODIFY `id_usc` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `usuario_email`
--
ALTER TABLE `usuario_email`
  MODIFY `id_usm` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `usuario_fone`
--
ALTER TABLE `usuario_fone`
  MODIFY `id_ufs` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `usuario_funcao`
--
ALTER TABLE `usuario_funcao`
  MODIFY `usf_id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `usuario_tipo`
--
ALTER TABLE `usuario_tipo`
  MODIFY `ust_id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `usuario_titulacao`
--
ALTER TABLE `usuario_titulacao`
  MODIFY `ust_id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
