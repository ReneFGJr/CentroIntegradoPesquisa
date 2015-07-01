-- phpMyAdmin SQL Dump
-- version 4.4.8
-- http://www.phpmyadmin.net
--
-- Host: 10.100.4.24
-- Generation Time: 01-Jul-2015 �s 17:41
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
-- Estrutura da tabela `ajax_areadoconhecimento`
--

CREATE TABLE IF NOT EXISTS "ajax_areadoconhecimento" (
  "id_aa" bigint(20) unsigned NOT NULL,
  "a_cnpq" char(16) DEFAULT NULL,
  "a_descricao" char(100) DEFAULT NULL,
  "a_codigo" char(7) DEFAULT NULL,
  "a_geral" char(7) DEFAULT NULL,
  "a_semic" smallint(6) DEFAULT NULL,
  "a_ativo" char(1) DEFAULT NULL,
  "a_submit" char(1) DEFAULT NULL,
  "a_journal" char(1) DEFAULT NULL
);

--
-- Extraindo dados da tabela `ajax_areadoconhecimento`
--

INSERT INTO `ajax_areadoconhecimento` (`id_aa`, `a_cnpq`, `a_descricao`, `a_codigo`, `a_geral`, `a_semic`, `a_ativo`, `a_submit`, `a_journal`) VALUES
(1, '7.08.04.00-1X', 'Forma��o de professores', '0001443', '', 1, '', '1', '1'),
(2, '4.08.01.00-X', 'Fisioterapia Motora', '0001382', '', 0, '', '1', '1'),
(3, '3.11.00.00-7', 'Engenharia Naval e Oce�nica', '0000688', '', 0, '', '1', '1'),
(4, '6.12.03.00-X', 'Design de Moda', '0001444', '', 1, '', '1', '1'),
(5, '1.04.01.00-8', 'Astronomia de Posi��o e Mec�nica Celeste', '0000157', '', 0, '', '0', '1'),
(6, '3.05.03.00-0', 'Mec�nica dos S�lidos', '0001446', '', 1, '', '1', '1'),
(7, '7.08.04.02-8', 'M�todos e T�cnicas de Ensino', '0001280', '', 0, '', '1', '1'),
(8, '8.03.05.04-0', 'Interpreta��o Teatral', '0001372', '', 0, '', '1', '1'),
(9, '7.01.01.00-0', 'Hist�ria da Filosofia', '0001167', '', 1, '', '1', '1'),
(10, '6.02.02.02-5', 'Organiza��es P�blicas', '0001012', '', 0, '', '1', '1'),
(11, '6.06.06.02-9', 'Pol�ticas de Redistribui��o de Popula��o', '0001124', '', 0, '', '1', '1'),
(12, 'X9.00.00.00-X', 'N�o � uma �reas estrat�gicas (n�o vai concorrer as cotas)', '0001390', '', 0, '', '0', '1'),
(13, '1.07.01.00-1', 'Geologia', '0000268', '', 0, '', '1', '1'),
(14, '1.07.01.01-0', 'Mineralogia', '0000269', '', 0, '', '1', '1'),
(15, '1.07.01.06-0', 'Geocronologia', '0000274', '', 0, '', '1', '1'),
(16, '1.07.01.07-9', 'Cartografia Geol�gica', '0000275', '', 0, '', '1', '1'),
(17, '1.07.01.08-7', 'Metalogenia', '0000276', '', 0, '', '1', '1'),
(18, '7.01.04.00-0', '�tica', '0001448', '', 1, '', '1', '1'),
(19, '7.01.02.00-7', 'Metaf�sica', '0001449', '', 1, '', '1', '1'),
(20, '7.01.03.00-3', 'L�gica', '0001450', '', 1, '', '1', '1'),
(21, '1.03.03.02-2', 'Engenharia de Software', '0001451', '', 0, '', '0', '1'),
(22, '4.00.00.00-1', 'Ci�ncias da Sa�de', '0000745', '', 0, '', '1', '1'),
(23, '6.01.03.03-5', 'Direito do Trabalho', '0001000', '', 1, '', '1', '1'),
(24, '6.07.02.01-0', 'Teoria da Classifica��o', '0001133', '', 0, '', '1', '1'),
(25, '8.03.02.05-0', 'Cer�mica', '0001358', '', 0, '', '1', '1'),
(26, '1.03.04.02-9', 'Arquitetura de Sistemas de Computa��o', '0000153', '', 1, '', '1', '1'),
(27, '1.03.03.04-9', 'Sistemas de Informa��o', '0000149', '', 0, '', '0', '1'),
(28, '1.03.03.05-7', 'Processamento Gr�fico (Graphics)', '0000150', '', 0, '', '0', '1'),
(29, '9.12.00.00-X', 'Seguran�a e Desenvolvimento Humano', '0001417', '', 0, '', '0', '1'),
(30, '9.07.00.00-X', 'Agroneg�cio', '0001412', '', 0, '', '0', '1'),
(31, 'X9.01.02.00-X', 'Microtecnologia', '0001429', '', 0, '', '0', '1'),
(32, '1.04.00.00-1', 'Astronomia', '0000156', '', 0, '', '0', '1'),
(33, 'X9.04.00.00-X', 'Energias Renov�veis', '0001406', '', 0, '', '0', '1'),
(34, 'X9.06.00.00-X', 'Desenvolvimento Sustent�vel', '0001408', '', 0, '', '0', '1'),
(35, '1.03.04.01-0', 'Hardware', '0000152', '', 0, '', '1', '1'),
(36, 'X9.08.00.00-X', 'Forma��o de Professores', '0001413', '', 0, '', '0', '1'),
(37, 'X9.09.00.00-X', 'Engenharia ambiental', '0001414', '', 0, '', '0', '1'),
(38, '1.03.02.01-8', 'Matem�tica Simb�lica', '0000143', '', 0, '', '0', '1'),
(39, '9.00.00.00-X', ':: N�o � �rea estrat�gica ::', '0001441', '', 1, '', '1', '1'),
(40, '6.01.04.02-X', 'Direitos humanos', '0001397', '', 1, '', '1', '1'),
(41, '6.01.05.00-X', 'Direito econ�mico e da integra��o', '0001431', '', 1, '', '1', '1'),
(42, '7.01.04.01-X', 'Bio�tica', '0001399', '', 1, '', '1', '1'),
(43, '7.01.04.02-X', '�tica e t�cnica', '0001435', '', 1, '', '1', '1'),
(44, '7.01.07.00-X', 'Filosofia e psican�lise', '0001398', '', 1, '', '1', '1'),
(45, '7.01.08.00-x', 'Filosofia da mente', '0001433', '', 1, '', '1', '1'),
(46, '7.07.12.00-X', 'Psican�lise', '0001401', '', 1, '', '1', '1'),
(47, '9.00.00.01-X', 'Direitos Humanos - Juventudes', '0001442', '', 1, '', '1', '1'),
(48, '4.08.00.00-X', 'Muscoloesquel�tico', '0001436', '', 1, '', '1', '1'),
(49, '4.08.00.00-8-1', 'Musculoesquel�tica', '0001437', '', 1, '', '1', '1'),
(50, '4.02.12.00-X', 'Pr�tese Dent�ria', '0001385', '', 0, '', '1', '1'),
(51, '1.03.03.00-6', 'Metodologia e T�cnicas da Computa��o', '0000145', '', 1, '', '1', '1'),
(52, '1.03.04.00-2', 'Sistemas de Computa��o', '0000151', '', 1, '', '1', '1'),
(53, '4.08.00.02-X', 'Fisioterapia Respirat�ria', '0001438', '', 0, '', '1', '1'),
(54, '6.03.01.02-3', 'Teoria Geral da Economia', '0001020', '', 0, '', '1', '1'),
(55, '5.06.05.00-7', 'Avicultura', '0001439', '', 0, '', '1', '1'),
(56, '7.07.11.00-X', 'Psicologia Hospitalar', '0001400', '', 0, '', '1', '1'),
(57, '5.05.05.00-9', 'Inspe��o de Produtos de Origem Animal', '0000941', '', 0, '', '1', '1'),
(58, '6.10.01.00-7', 'Fundamentos do Servi�o Social', '0001153', '', 0, '', '1', '1'),
(59, '7.01.09.00-x', 'Filosofia Pol�tica', '0001434', '', 0, '', '1', '1'),
(60, '7.10.04.00-9 X', 'Ensino Religioso', '0001432', '', 0, '', '1', '1'),
(61, '9.13.00.00-X', 'Cidades', '0001458', '', 1, '1', '1', '1'),
(62, 'X9.10.00.00-X', '�tica e quest�es sociais', '0001415', '', 0, '', '0', '1'),
(63, 'X9.11.00.00-X', 'Energia el�trica', '0001416', '', 0, '', '0', '1'),
(64, '7.08.07.09-X', 'Educa��o � Dist�ncia', '0001403', '', 1, '', '1', '1'),
(65, '1.00.00.00-3', 'Ci�ncias Exatas e da Terra', '0000091', '', 0, '', '1', '1'),
(66, 'xsaxasx', 'Vida', '0001456', '', 0, '1', '0', '1'),
(67, 'xcvasc', 'Vida', '0001453', '', 0, '1', '0', '1'),
(68, 'xvas', 'Vida', '0001454', '', 0, '1', '0', '1'),
(69, 'xxca', 'Vida', '0001455', '', 0, '1', '0', '1'),
(70, 'X9.13.00.00-X', 'Agroalimentos', '0001410', '', 0, '', '0', '1'),
(71, '9.01.01.00-X', 'Micro e Nanotecnologia', '0001392', '', 0, '', '0', '1'),
(72, 'BMF', 'Oral and Maxillofacial Surgery', '0001428', '', 0, '', '0', '1'),
(73, '1.01.01.02-0', 'L�gica Matem�tica', '0000095', '', 0, '', '0', '1'),
(74, '1.01.02.05-1', 'Equa��es Difer�nciais Parciais', '0000105', '', 0, '', '0', '1'),
(75, '8.03.09.00-3', 'Artes do V�deo', '0001380', '', 0, '', '1', '1'),
(76, '8.03.10.00-1', 'Educa��o Art�stica', '0001381', '', 0, '', '1', '1'),
(77, '4.02.02.00-3', 'Cirurgia Buco-Maxilo-Facial', '0000788', '', 1, '', '1', '1'),
(78, '6.03.10.01-4', 'Economia Agr�ria', '0001061', '', 0, '', '1', '1'),
(79, '6.03.10.02-2', 'Economia dos Recursos Naturais', '0001062', '', 0, '', '1', '1'),
(80, '1.03.02.00-0', 'Matem�tica da Computa��o', '0000142', '', 1, '', '1', '1'),
(81, '1.03.01.00-3', 'Teoria da Computa��o', '0000137', '', 1, '', '1', '1'),
(82, '1.05.05.02-4', 'Espectros At�micos e Integra��o de F�tons', '0000207', '', 0, '', '1', '1'),
(83, '1.03.01.01-1', 'Computabilidade e Modelos de Computa��o', '0000138', '', 0, '', '0', '1'),
(84, '1.03.01.03-8', 'An�lise de Algoritmos e Complexidade de Computa��o', '0000140', '', 0, '', '0', '1'),
(85, '1.03.01.04-6', 'L�gicas e Sem�ntica de Programas', '0000141', '', 0, '', '0', '1'),
(86, '1.06.02.01-1', 'Campos de Coordena��o', '0000243', '', 0, '', '1', '1'),
(87, '1.06.03.01-8', 'Cin�tica Qu�mica e Cat�lise', '0000251', '', 0, '', '1', '1'),
(88, '1.06.03.04-2', 'Qu�mica de Interfaces', '0000254', '', 0, '', '1', '1'),
(89, '2.03.02.00-2', 'Morfologia Vegetal', '0000346', '', 0, '', '1', '1'),
(90, '2.03.04.02-1', 'Taxonomia de Faner�gamos', '0000357', '', 0, '', '1', '1'),
(91, '3.12.01.00-8', 'Aerodin�mica', '0000711', '', 0, '', '1', '1'),
(92, '2.03.03.03-3', 'Ecofisiologia Vegetal', '0000354', '', 1, '', '1', '1'),
(93, '', '::SELECIONE UMA �REA::', '0001457', '', 0, '1', '0', '1'),
(94, '1.06.03.02-6', 'Eletroqu�mica', '0000252', '', 0, '', '1', '1'),
(95, '1.06.03.03-4', 'Espectroscopia', '0000253', '', 0, '', '1', '1'),
(96, '1.06.03.05-0', 'Qu�mica do Estado Condensado', '0000255', '', 0, '', '1', '1'),
(97, '1.06.03.06-9', 'Qu�mica Nuclear e Radioqu�mica', '0000256', '', 0, '', '1', '1'),
(98, '1.06.03.07-7', 'Qu�mica Te�rica', '0000257', '', 0, '', '1', '1'),
(99, '1.06.03.08-5', 'Termodin�mica Qu�mica', '0000258', '', 0, '', '1', '1'),
(100, '1.06.04.01-4', 'Separa��o', '0000260', '', 0, '', '1', '1'),
(101, '1.06.04.02-2', 'M�todos �ticos de An�lise', '0000261', '', 0, '', '1', '1'),
(102, '1.06.04.03-0', 'Eletroanal�tica', '0000262', '', 0, '', '1', '1'),
(103, '1.06.04.04-9', 'Gravimetria', '0000263', '', 0, '', '1', '1'),
(104, '1.06.04.05-7', 'Titimetria', '0000264', '', 0, '', '1', '1'),
(105, '1.06.04.06-5', 'Instrumenta��o Anal�tica', '0000265', '', 0, '', '1', '1'),
(106, '1.06.04.07-3', 'An�lise de Tra�os e Qu�mica Ambiental', '0000266', '', 0, '', '1', '1'),
(107, '1.06.04.00-6', 'Qu�mica Anal�tica', '0000259', '', 1, '', '1', '1'),
(108, '1.07.02.09-1', 'Geof�sica Aplicada', '0000292', '', 0, '', '1', '1'),
(109, '4.04.05.00-1', 'Enfermagem de Doen�as Contagiosas', '0000807', '', 0, '', '1', '1'),
(110, '3.12.02.00-4', 'Din�mica de V�o', '0000714', '', 0, '', '1', '1'),
(111, '2.02.01.00-1', 'Gen�tica Quantitativa', '0000338', '', 0, '', '1', '1'),
(112, '2.02.02.00-8', 'Gen�tica Molecular e de Microorganismos', '0000339', '', 0, '', '1', '1'),
(113, '2.02.03.00-4', 'Gen�tica Vegetal', '0000340', '', 0, '', '1', '1'),
(114, '2.02.04.00-0', 'Gen�tica Animal', '0000341', '', 0, '', '1', '1'),
(115, '2.02.06.00-3', 'Mutag�nese', '0000343', '', 0, '', '1', '1'),
(116, '2.03.01.00-6', 'Paleobot�nica', '0000345', '', 0, '', '1', '1'),
(117, '2.03.02.01-0', 'Morfologia Externa', '0000347', '', 0, '', '1', '1'),
(118, '2.03.02.02-9', 'Citologia Vegetal', '0000348', '', 0, '', '1', '1'),
(119, '2.03.02.04-5', 'Palinologia', '0000350', '', 0, '', '1', '1'),
(120, '2.03.03.02-5', 'Reprodu��o Vegetal', '0000353', '', 0, '', '1', '1'),
(121, '2.03.03.00-9', 'Fisiologia Vegetal', '0000351', '', 1, '', '1', '1'),
(122, '2.03.02.03-7', 'Anatomia Vegetal', '0000349', '', 0, '', '1', '1'),
(123, '1.07.05.01-5', 'Geomorfologia', '0000311', '', 0, '', '1', '1'),
(124, '4.01.02.00-9', 'Cirurgia', '0000766', '', 1, '', '1', '1'),
(125, '2.02.05.00-7', 'Gen�tica Humana e M�dica', '0000342', '', 1, '', '1', '1'),
(126, '2.03.03.01-7', 'Nutri��o e Crescimento Vegetal', '0000352', '', 1, '', '1', '1'),
(127, '4.06.01.00-5', 'Epidemiologia', '0000815', '', 1, '', '1', '1'),
(128, '2.03.04.00-5', 'Taxonomia Vegetal', '0000355', '', 0, '', '1', '1'),
(129, '2.03.05.00-1', 'Fitogeografia', '0000358', '', 0, '', '1', '1'),
(130, '2.03.06.00-8', 'Bot�nica Aplicada', '0000359', '', 0, '', '1', '1'),
(131, '2.04.01.00-0', 'Paleozoologia', '0000361', '', 0, '', '1', '1'),
(132, '2.08.01.01-7', 'Prote�nas', '0000395', '', 0, '', '1', '1'),
(133, '2.04.03.00-3', 'Fisiologia dos Grupos Recentes', '0000363', '', 0, '', '1', '1'),
(134, '5.02.01.07-7', 'Solos Florestais', '0000858', '', 0, '', '1', '1'),
(135, '5.02.02.06-5', 'Ordenamento Florestal', '0000866', '', 0, '', '1', '1'),
(136, '5.02.03.02-9', 'Mecaniza��o Florestal', '0000869', '', 0, '', '1', '1'),
(137, '5.04.04.02-4', 'Manejo e Conserva��o de Pastagens', '0000909', '', 0, '', '1', '1'),
(138, '4.07.00.00-3', 'Fonoaudiologia', '0000818', '', 1, '', '1', '1'),
(139, '5.07.02.00-9', 'Tecnologia de Alimentos', '0000968', '', 1, '', '1', '1'),
(140, '5.05.01.02-0', 'T�cnica Cir�rgica Animal', '0000920', '', 0, '', '1', '1'),
(141, '2.04.02.00-7', 'Morfologia dos Grupos Recentes', '0000362', '', 1, '', '1', '1'),
(142, '2.09.04.00-2', 'Radiologia e Fotobiologia', '0000406', '', 0, '', '1', '1'),
(143, '3.01.04.01-7', 'Hidr�ulica', '0000457', '', 0, '', '1', '1'),
(144, '1.05.02.05-0', 'Mec�nica, Elasticidade e Reologia', '0000191', '', 0, '', '1', '1'),
(145, '3.04.01.03-8', 'Materiais e Dispositivos Supercondutores', '0000508', '', 0, '', '1', '1'),
(146, '1.07.01.13-3', 'Estratigrafia', '0000281', '', 0, '', '1', '1'),
(147, '3.05.04.06-6', 'M�todos de S�ntese e Otimiza��o Aplicados ao Projeto Mec�nico', '0000559', '', 0, '', '1', '1'),
(148, '1.05.07.10-8', 'Transp.Eletr�nicos e Prop. El�tricas de Superf�cies (Interfaces e Pel�culas)', '0000225', '', 0, '', '1', '1'),
(149, '3.07.02.04-6', 'T�cnicas Avancadas de Tratamento de �guas', '0000610', '', 0, '', '1', '1'),
(150, '2.02.00.00-5', 'Gen�tica e Biotecnologia', '0000337', '', 1, '', '1', '1'),
(151, '3.10.01.00-9', 'Planejamento de Transportes', '0000676', '', 0, '', '1', '1'),
(152, '2.09.02.00-0', 'Biof�sica Celular', '0000404', '', 0, '', '1', '1'),
(153, '4.01.01.00-2', 'Cl�nica M�dica', '0000747', '', 0, '', '1', '1'),
(154, '3.01.02.02-2', 'Estruturas de Madeiras', '0000447', '', 0, '', '1', '1'),
(155, '3.03.04.04-0', 'Transforma��o de Fases', '0000497', '', 0, '', '1', '1'),
(156, '4.01.01.17-7', 'Oftalmologia', '0000764', '', 1, '', '1', '1'),
(157, '3.05.01.04-0', 'Principios Variacionais e M�todos Num�ricos', '0000543', '', 0, '', '1', '1'),
(158, '4.06.02.00-1', 'Sa�de Publica', '0000816', '', 1, '', '1', '1'),
(159, '5.02.03.00-2', 'T�cnicas e Opera��es Florestais', '0000867', '', 0, '', '1', '1'),
(160, '9.17.00.00-X', 'Direitos Humanos', '0001459', '', 1, '', '1', '1'),
(161, '3.06.03.14-5', '�leos', '0000591', '', 0, '', '1', '1'),
(162, '3.06.03.15-3', 'Papel e Celulose', '0000592', '', 0, '', '1', '1'),
(163, '3.08.02.03-2', 'S�ries Temporais', '0000638', '', 0, '', '1', '1'),
(164, '3.08.02.04-0', 'Teoria dos Grafos', '0000639', '', 0, '', '1', '1'),
(165, '3.08.02.05-9', 'Teoria dos Jogos', '0000640', '', 0, '', '1', '1'),
(166, '3.08.04.00-0', 'Engenharia Econ�mica', '0000647', '', 0, '', '1', '1'),
(167, '3.08.02.00-8', 'Pesquisa Operacional', '0000635', '', 0, '', '1', '1'),
(168, '3.08.02.01-6', 'Processos Estoc�sticos e Teorias da Filas', '0000636', '', 0, '', '1', '1'),
(169, '3.08.03.02-0', 'Metodologia de Projeto do Produto', '0000643', '', 0, '', '1', '1'),
(170, '3.08.03.03-9', 'Processos de Trabalho', '0000644', '', 0, '', '1', '1'),
(171, '3.08.03.04-7', 'Ger�ncia do Projeto e do Produto', '0000645', '', 0, '', '1', '1'),
(172, '3.08.03.00-4', 'Engenharia do Produto', '0000641', '', 1, '', '1', '1'),
(173, '3.08.04.01-9', 'Estudo de Mercado', '0000648', '', 0, '', '1', '1'),
(174, '3.08.04.02-7', 'Localiza��o Industrial', '0000649', '', 0, '', '1', '1'),
(175, '9.18.00.00-X', 'Biotecnologia', '0001460', '', 0, '', '1', '1'),
(176, '3.08.03.01-2', 'Ergonomia', '0000642', '', 1, '', '1', '1'),
(177, '3.08.03.05-5', 'Desenvolvimento de Produto', '0000646', '', 1, '', '1', '1'),
(178, '5.05.01.00-3', 'Cl�nica e Cirurgia Animal', '0000918', '', 1, '', '1', '1'),
(179, '5.05.01.01-1', 'Anestesiologia Animal', '0000919', '', 1, '', '1', '1'),
(180, '3.08.04.03-5', 'An�lise de Custos', '0000650', '', 0, '', '1', '1'),
(181, '3.08.04.04-3', 'Economia de Tecnologia', '0000651', '', 0, '', '1', '1'),
(182, '6.01.02.00-4', 'Direito P�blico', '0000989', '', 1, '', '1', '1'),
(183, '9.19.00.00-X', 'Telecomunica��es', '0001461', '', 0, '', '0', '1'),
(184, '3.11.03.00-6', 'M�quinas Mar�timas', '0000696', '', 0, '', '1', '1'),
(185, '3.11.03.01-4', 'An�lise de Sistemas Propulsores', '0000697', '', 0, '', '1', '1'),
(186, '6.03.01.04-0', 'Hist�ria Econ�mica', '0001022', '', 0, '', '1', '1'),
(187, '6.03.01.05-8', 'Sistemas Econ�micos', '0001023', '', 0, '', '1', '1'),
(188, '6.03.02.01-1', 'M�todos e Modelos Matem�ticos, Econom�tricos e Estat�sticos', '0001025', '', 0, '', '1', '1'),
(189, 'X.XX.XX.00-0', '�tica', '0001170', '', 0, '', '0', '1'),
(190, '3.10.03.00-1', 'Opera��es de Transportes', '0000684', '', 0, '', '1', '1'),
(191, '3.11.02.00-0', 'Estruturas Navais e Oce�nicas', '0000692', '', 0, '', '1', '1'),
(192, '3.11.02.02-6', 'Din�mica Estrutural Naval e Oce�nica', '0000694', '', 0, '', '1', '1'),
(193, '3.11.02.01-8', 'An�lise Te�rica e Experimental de Estrutura', '0000693', '', 0, '', '1', '1'),
(194, '3.13.01.01-0', 'Processamento de Sinais Biol�gicos', '0000737', '', 0, '', '1', '1'),
(195, '6.04.04.01-9', 'Desenvolvimento Hist�rico do Paisagismo', '0001076', '', 0, '', '1', '1'),
(196, '1.01.03.05-8', 'Teoria das Singularidades e Teoria das Cat�strofes', '0000112', '', 0, '', '0', '1'),
(197, '4.01.01.01-0', 'Angiologia', '0000748', '', 0, '', '1', '1'),
(198, '4.01.01.02-9', 'Dermatologia', '0000749', '', 0, '', '1', '1'),
(199, '6.09.00.00-8', 'Comunica��o', '0001140', '', 1, '', '1', '1'),
(200, '1.04.06.00-0', 'Instrumenta��o Astron�mica', '0000173', '', 0, '', '0', '1'),
(201, '4.02.03.00-0', 'Ortodontia', '0000789', '', 1, '', '1', '1'),
(202, '4.02.07.00-5', 'Radiologia Odontol�gica', '0000793', '', 1, '', '1', '1'),
(203, '6.09.04.00-3', 'Rela��es P�blicas e Propaganda', '0001150', '', 1, '', '1', '1'),
(204, '4.02.08.00-1', 'Odontologia Social e Preventiva', '0000794', '', 0, '', '1', '1'),
(205, '7.02.01.02-1', 'Hist�ria da Sociologia', '0001176', '', 0, '', '1', '1'),
(206, '1.05.01.06-1', 'Instrumenta��o Espec�fica de Uso Geral em F�sica', '0000185', '', 0, '', '0', '1'),
(207, '5.01.02.04-4', 'Microbiologia Agr�cola', '0000834', '', 0, '', '1', '1'),
(208, '5.01.02.05-2', 'Defesa Fitossanit�ria', '0000835', '', 0, '', '1', '1'),
(209, '5.02.04.08-4', 'Tecnologia de Celulose e Papel', '0000878', '', 0, '', '1', '1'),
(210, '5.02.04.09-2', 'Tecnologia de Chapas', '0000879', '', 0, '', '1', '1'),
(211, 'DT-03', 'Direito Tribut�rio', '0001462', '', 0, '1', '0', '1'),
(212, '7.07.02.04-7', 'Estados Subjetivos e Emo��o', '0001227', '', 1, '', '1', '1'),
(213, '5.02.05.00-5', 'Conserva��o da Natureza', '0000880', '', 0, '', '1', '1'),
(214, '7.08.04.00-1', 'Ensino-Aprendizagem', '0001278', '', 0, '', '1', '1'),
(215, '5.05.01.05-4', 'Obstetr�cia Animal', '0000923', '', 0, '', '1', '1'),
(216, 'DT-01', 'Direito Tribut�rio', '0001463', '', 0, '1', '0', '1'),
(217, '5.05.01.06-2', 'Cl�nica Veterin�ria', '0000924', '', 1, '', '1', '1'),
(218, '5.05.01.07-0', 'Cl�nica Cir�rgica Animal', '0000925', '', 1, '', '1', '1'),
(219, '8.00.00.00-2', 'Ling��stica, Letras e Artes', '0001329', '', 0, '', '1', '1'),
(220, '5.07.01.06-1', 'Avalia��o e Controle de Qualidade de Alimentos', '0000966', '', 0, '', '1', '1'),
(221, '5.07.01.07-0', 'Padr�es, Legisla��o e Fiscaliza��o de Alimentos', '0000967', '', 0, '', '1', '1'),
(222, '5.07.00.00-6', 'Ci�ncia e Tecnologia de Alimentos', '0000959', '', 1, '', '1', '1'),
(223, 'DT-02', 'Direito Tribut�rio', '0001464', '', 0, '0', '0', '1'),
(224, '6.01.01.00-8', 'Teoria do Direito', '0000980', '', 1, '', '1', '1'),
(225, 'X9.15.00.00-X', 'Ci�ncia, tecnologia e inova��o - regula��o e legisla��o', '0001409', '', 0, '', '0', '1'),
(226, '6.02.02.00-9', 'Administra��o P�blica', '0001010', '', 0, '', '1', '1'),
(227, 'DE-01', 'Direito Eleitoral', '0001465', '', 0, '1', '0', '1'),
(228, '6.02.01.05-3', 'Administra��o de Recursos Humanos', '0001009', '', 1, '', '1', '1'),
(229, '6.02.02.01-7', 'Contabilidade e Financas P�blicas', '0001011', '', 1, '', '1', '1'),
(230, '6.02.02.03-3', 'Pol�tica e Planejamento Governamentais', '0001013', '', 0, '', '1', '1'),
(231, 'DF-01', 'Direito Financeiro', '0001466', '', 0, '1', '0', '1'),
(232, '9.04.00.00-X', 'Tecnologia e gest�o da informa��o e comunica��o', '0001430', '', 1, '', '1', '1'),
(233, '2.07.02.07-8', 'Cinesiologia', '0000390', '', 1, '', '1', '1'),
(234, '3.07.00.00-X', 'Engenharia Ambiental', '0001440', '', 1, '', '1', '1'),
(235, '1.06.02.03-8', 'Compostos Organo-Met�licos', '0000245', '', 0, '', '1', '1'),
(236, '1.06.02.04-6', 'Determina��o de Estrutura de Compostos Inorg�nicos', '0000246', '', 0, '', '1', '1'),
(237, '1.06.02.05-4', 'Foto-Qu�mica Inorg�nica', '0000247', '', 0, '', '1', '1'),
(238, '1.06.02.06-2', 'Fisico Qu�mica Inorg�nica', '0000248', '', 0, '', '1', '1'),
(239, '1.05.03.04-8', 'Propriedades de Part�culas Espec�ficas e Resson�ncias', '0000197', '', 0, '', '1', '1'),
(240, '9.99.00.00-X', 'Mobilidade Nacional e Internacional', '0001452', '', 0, '', '0', '1'),
(241, '1.01.00.00-8', 'Matem�tica', '0000092', '', 1, '', '1', '1'),
(242, '1.03.00.00-7', 'Ci�ncia da Computa��o', '0000136', '', 1, '', '1', '1'),
(243, '1.06.02.07-0', 'Qu�mica Bio-Inorg�nica', '0000249', '', 0, '', '1', '1'),
(244, '2.03.04.01-3', 'Taxonomia de Cript�gamos', '0000356', '', 0, '', '1', '1'),
(245, '2.07.02.05-1', 'Fisiologia Endocrina', '0000388', '', 0, '', '1', '1'),
(246, '2.07.02.06-0', 'Fisiologia da Digest�o', '0000389', '', 0, '', '1', '1'),
(247, '2.07.03.00-7', 'Fisiologia do Esfor�o', '0000391', '', 0, '', '1', '1'),
(248, '2.07.04.00-3', 'Fisiologia Comparada', '0000392', '', 0, '', '1', '1'),
(249, '1.01.02.03-5', 'An�lise Funcional N�o-Linear', '0000103', '', 0, '', '0', '1'),
(250, '1.05.01.04-5', 'F�sica Estat�stica e Termodin�mica', '0000183', '', 0, '', '0', '1'),
(251, '8.03.07.00-0', 'Fotografia', '0001374', '', 1, '', '1', '1'),
(252, 'X9.14.00.00-X', 'Infraestrutura, organiza��o produtiva e log�stica na �rea jur�dica', '0001411', '', 0, '', '0', '1'),
(253, '8.03.05.01-6', 'Dramaturgia', '0001369', '', 0, '', '1', '1'),
(254, '8.03.05.02-4', 'Dire��o Teatral', '0001370', '', 0, '', '1', '1'),
(255, '8.03.05.03-2', 'Cenografia', '0001371', '', 0, '', '1', '1'),
(256, '8.03.06.00-4', '�pera', '0001373', '', 0, '', '1', '1'),
(257, '8.03.08.00-7', 'Cinema', '0001375', '', 0, '', '1', '1'),
(258, '8.03.08.01-5', 'Administra��o e Produ��o de Filmes', '0001376', '', 0, '', '1', '1'),
(259, '8.03.08.02-3', 'Roteiro e Dire��o Cinematogr�ficos', '0001377', '', 0, '', '1', '1'),
(260, '8.03.08.03-1', 'T�cnicas de Registro e Processamento de Filmes', '0001378', '', 0, '', '1', '1'),
(261, '3.04.01.02-0', 'Materiais e Componentes Semicondutores', '0000507', '', 1, '', '1', '1'),
(262, '3.05.03.02-7', 'Din�mica dos Corpos R�gidos, El�sticos e Pl�sticos', '0000550', '', 1, '', '1', '1'),
(263, '3.07.01.01-5', 'Planejamento Integrado dos Recursos H�dricos', '0000601', '', 1, '', '1', '1'),
(264, '6.04.01.01-0', 'Hist�ria da Arquitetura e Urbanismo', '0001065', '', 1, '', '1', '1'),
(265, '6.04.03.00-4', 'Tecnologia de Arquitetura e Urbanismo', '0001073', '', 1, '', '1', '1'),
(266, '1.02.02.06-4', 'Regress�o e Correla��o', '0000132', '', 0, '', '0', '1'),
(267, '1.02.02.07-2', 'Planejamento de Experimentos', '0000133', '', 0, '', '0', '1'),
(268, '6.07.00.00-9', 'Ci�ncia da Informa��o', '0001127', '', 0, '', '1', '1'),
(269, '6.03.01.03-1', 'Hist�ria do Pensamento Econ�mico', '0001021', '', 0, '', '1', '1'),
(270, '6.03.02.00-3', 'M�todos Quantitativos em Economia', '0001024', '', 0, '', '1', '1'),
(271, '6.04.02.02-4', 'Planejamento e Projeto do Espa�o Urbano', '0001071', '', 0, '', '1', '1'),
(272, '6.04.02.03-2', 'Planejamento e Projeto do Equipamento', '0001072', '', 0, '', '1', '1'),
(273, '6.04.03.01-2', 'Adequa��o Ambiental', '0001074', '', 0, '', '1', '1'),
(274, '6.04.04.00-0', 'Paisagismo', '0001075', '', 0, '', '1', '1'),
(275, '7.02.01.01-3', 'Teoria Sociol�gica', '0001175', '', 0, '', '1', '1'),
(276, '7.02.03.00-8', 'Sociologia do Desenvolvimento', '0001178', '', 0, '', '1', '1'),
(277, '6.04.01.00-1', 'Fundamentos de Arquitetura e Urbanismo', '0001064', '', 0, '', '1', '1'),
(278, '6.04.01.02-8', 'Teoria da Arquitetura', '0001066', '', 0, '', '1', '1'),
(279, '6.04.01.03-6', 'Hist�ria do Urbanismo', '0001067', '', 0, '', '1', '1'),
(280, '6.04.01.04-4', 'Teoria do Urbanismo', '0001068', '', 0, '', '1', '1'),
(281, '6.04.02.00-8', 'Projeto de Arquitetuta e Urbanismo', '0001069', '', 0, '', '1', '1'),
(282, '6.04.02.01-6', 'Planejamento e Projetos da Edifica��o', '0001070', '', 0, '', '1', '1'),
(283, '6.04.00.00-5', 'Arquitetura e Urbanismo', '0001063', '', 1, '', '1', '1'),
(284, '2.08.01.03-3', 'Glic�deos', '0000397', '', 0, '', '1', '1'),
(285, '2.09.03.00-6', 'Biof�sica de Processos e Sistemas', '0000405', '', 0, '', '1', '1'),
(286, '2.10.01.00-6', 'Farmacologia Geral', '0000408', '', 0, '', '1', '1'),
(287, '3.01.02.03-0', 'Estruturas Met�licas', '0000448', '', 0, '', '1', '1'),
(288, '3.03.05.00-4', 'Materiais n�o Met�licos', '0000499', '', 0, '', '1', '1'),
(289, '3.01.05.00-5', 'Infra-Estrutura de Transportes', '0000459', '', 1, '', '1', '1'),
(290, '4.01.01.08-8', 'Pediatria', '0000755', '', 1, '', '1', '1'),
(291, '3.04.01.05-4', 'Materiais e Componentes Eletro�ticos e Magneto�ticos, Materiais Fotoel�tricos', '0000510', '', 0, '', '1', '1'),
(292, '3.05.04.05-8', 'M�quinas, Motores e Equipamentos', '0000558', '', 0, '', '1', '1'),
(293, '3.05.04.08-2', 'Aproveitamento de Energia', '0000561', '', 0, '', '1', '1'),
(294, '3.07.02.03-8', 'T�cnicas Convencionais de Tratamento de �guas', '0000609', '', 0, '', '1', '1'),
(295, '3.07.02.06-2', 'Lay Out de Processos Industriais', '0000612', '', 0, '', '1', '1'),
(296, '3.08.04.05-1', 'Vida Econ�mica dos Equipamentos', '0000652', '', 0, '', '1', '1'),
(297, '3.10.02.02-1', 'Ve�culos de Transportes', '0000681', '', 0, '', '1', '1'),
(298, '4.01.01.16-9', 'Fisiatria', '0000763', '', 0, '', '1', '1'),
(299, '5.05.00.00-7', 'Medicina Veterin�ria', '0000917', '', 1, '', '1', '1'),
(300, '3.01.04.00-9', 'Engenharia Hidr�ulica', '0000456', '', 1, '', '1', '1'),
(301, '5.07.02.03-3', 'Tecnologia das Bebidas', '0000971', '', 0, '', '1', '1'),
(302, '5.07.01.00-2', 'Ci�ncia de Alimentos', '0000960', '', 1, '', '1', '1'),
(303, '3.13.00.09-x', 'Eletroterapia', '0001445', '', 0, '', '1', '1'),
(304, '1.07.03.00-4', 'Meteorologia', '0000294', '', 1, '', '1', '1'),
(305, '8.01.01.00-3', 'Teoria e An�lise Ling��stica', '0001331', '', 0, '', '1', '1'),
(306, '3.11.01.02-0', 'Propuls�o de Navios', '0000691', '', 0, '', '1', '1'),
(307, '1.01.01.03-9', 'Teoria dos N�meros', '0000096', '', 0, '', '0', '1'),
(308, '1.01.01.04-7', 'Grupos de Algebra N�o-Comutaviva', '0000097', '', 0, '', '0', '1'),
(309, '7.08.01.05-3', 'Economia da Educa��o', '0001269', '', 0, '', '1', '1'),
(310, '7.08.03.03-0', 'Avalia��o de Sistemas, Institui��es, Planos e Programas Educacionais', '0001277', '', 0, '', '1', '1'),
(311, '1.07.05.02-3', 'Climatologia Geogr�fica', '0000312', '', 0, '', '1', '1'),
(312, '1.07.05.03-1', 'Pedologia', '0000313', '', 0, '', '1', '1'),
(313, '1.07.05.04-0', 'Hidrogeografia', '0000314', '', 0, '', '1', '1'),
(314, '1.07.05.05-8', 'Geoecologia', '0000315', '', 0, '', '1', '1'),
(315, '1.07.05.06-6', 'Fotogeografia (F�sico-Ecol�gica)', '0000316', '', 0, '', '1', '1'),
(316, '1.07.05.07-4', 'Geocartografia', '0000317', '', 0, '', '1', '1'),
(317, '1.08.00.00-0', 'Oceanografia', '0000318', '', 0, '', '1', '1'),
(318, '1.08.01.00-6', 'Oceanografia Biol�gica', '0000319', '', 0, '', '1', '1'),
(319, '1.08.01.01-4', 'Intera��o entre os Organismos Marinhos e os Par�metros Ambientais', '0000320', '', 0, '', '1', '1'),
(320, '1.08.02.00-2', 'Oceanografia F�sica', '0000321', '', 0, '', '1', '1'),
(321, '1.08.02.01-0', 'Vari�veis F�sicas da �gua do Mar', '0000322', '', 0, '', '1', '1'),
(322, '1.08.02.02-9', 'Movimento da �gua do Mar', '0000323', '', 0, '', '1', '1'),
(323, '1.07.04.00-0', 'Geodesia', '0000304', '', 1, '', '1', '1'),
(324, '1.07.04.01-9', 'Geodesia F�sica', '0000305', '', 1, '', '1', '1'),
(325, '1.07.00.00-5', 'GeoCi�ncias', '0000267', '', 1, '', '1', '1'),
(326, '1.01.01.00-4', '�lgebra', '0000093', '', 1, '', '1', '1'),
(327, '1.01.02.00-0', 'An�lise', '0000100', '', 1, '', '1', '1'),
(328, '1.04.02.00-4', 'Astrof�sica Estelar', '0000160', '', 0, '', '1', '1'),
(329, '1.01.01.06-3', 'Geometria Algebrica', '0000099', '', 0, '', '0', '1'),
(330, '1.01.01.05-5', 'Algebra Comutativa', '0000098', '', 0, '', '0', '1'),
(331, '1.01.02.01-9', 'An�lise Complexa', '0000101', '', 0, '', '0', '1'),
(332, '1.01.02.02-7', 'An�lise Funcional', '0000102', '', 0, '', '0', '1'),
(333, '1.04.01.01-6', 'Astronomia Fundamental', '0000158', '', 0, '', '0', '1'),
(334, '1.04.01.02-4', 'Astronomia Din�mica', '0000159', '', 0, '', '0', '1'),
(335, '1.04.03.00-0', 'Astrof�sica do Meio Interestelar', '0000161', '', 0, '', '0', '1'),
(336, '1.04.03.01-9', 'Meio Interestelar', '0000162', '', 0, '', '0', '1'),
(337, '1.04.03.02-7', 'Nebulosa', '0000163', '', 0, '', '0', '1'),
(338, '1.04.04.00-7', 'Astrof�sica Extragal�ctica', '0000164', '', 0, '', '0', '1'),
(339, '1.04.04.01-5', 'Gal�xias', '0000165', '', 0, '', '0', '1'),
(340, '1.04.04.02-3', 'Aglomerados de Gal�xias', '0000166', '', 0, '', '0', '1'),
(341, '1.04.04.03-1', 'Quasares', '0000167', '', 0, '', '0', '1'),
(342, '1.04.04.04-0', 'Cosmologia', '0000168', '', 0, '', '0', '1'),
(343, '1.04.05.01-1', 'F�sica Solar', '0000170', '', 0, '', '0', '1'),
(344, '1.04.05.00-3', 'Astrof�sica do Sistema Solar', '0000169', '', 0, '', '0', '1'),
(345, '1.04.05.02-0', 'Movimento da Terra', '0000171', '', 0, '', '0', '1'),
(346, '1.04.05.03-8', 'Sistema Planet�rio', '0000172', '', 0, '', '0', '1'),
(347, '1.04.06.01-8', 'Astron�mia �tica', '0000174', '', 0, '', '0', '1'),
(348, '1.05.01.01-0', 'M�todos Matem�ticos da F�sica', '0000180', '', 0, '', '0', '1'),
(349, '1.05.01.02-9', 'F�sica Cl�ssica e F�sica Qu�ntica (Mec�nica e Campos)', '0000181', '', 0, '', '0', '1'),
(350, '1.05.00.00-6', 'F�sica', '0000178', '', 1, '', '1', '1'),
(351, '1.05.01.00-2', 'F�sica Geral', '0000179', '', 1, '', '1', '1'),
(352, '1.05.02.01-7', 'Eletricidade e Magnetismo (Campos e Part�culas Carregadas)', '0000187', '', 0, '', '1', '1'),
(353, '1.05.02.02-5', '�tica', '0000188', '', 0, '', '1', '1'),
(354, '1.05.02.04-1', 'Transfer�ncia de Calor (Processos T�rmicos e Termodin�micos)', '0000190', '', 1, '', '1', '1'),
(355, '1.05.02.06-8', 'Din�mica dos Fluidos', '0000192', '', 1, '', '1', '1'),
(356, '4.02.10.00-X', 'Cirurgia Odontol�gica', '0001383', '', 0, '', '1', '1'),
(357, '1.05.02.03-3', 'Ac�stica', '0000189', '', 1, '', '1', '1'),
(358, '1.05.02.00-9', '�reas Cl�ssicas de Fenomenologia e suas Aplica��es', '0000186', '', 0, '', '1', '1'),
(359, '6.03.06.01-7', 'Treinamento e Aloca��o de M�o-de-Obra', '0001045', '', 0, '', '1', '1'),
(360, '1.02.01.00-9', 'Probabilidade', '0000119', '', 0, '', '1', '1'),
(361, '1.01.04.00-3', 'Matem�tica Aplicada', '0000114', '', 1, '', '1', '1'),
(362, '1.01.03.00-7', 'Geometria e Topologia', '0000107', '', 1, '', '1', '1'),
(363, '1.02.00.00-2', 'Probabilidade e Estat�stica', '0000118', '', 1, '', '1', '1'),
(364, '1.02.01.06-8', 'Processos Estoc�sticos Especiais', '0000125', '', 0, '', '1', '1'),
(365, '1.01.01.01-2', 'Conjuntos', '0000094', '', 0, '', '0', '1'),
(366, '1.01.02.04-3', 'Equa��es Difer�nciais Ordin�rias', '0000104', '', 0, '', '0', '1'),
(367, '1.01.02.06-0', 'Equa��es Difer�nciais Funcionais', '0000106', '', 0, '', '0', '1'),
(368, '1.01.03.01-5', 'Geometria Difer�ncial', '0000108', '', 0, '', '0', '1'),
(369, '1.01.03.02-3', 'Topologia Alg�brica', '0000109', '', 0, '', '0', '1'),
(370, '1.01.03.03-1', 'Topologia das Variedades', '0000110', '', 0, '', '0', '1'),
(371, '1.01.03.04-0', 'Sistemas Din�micos', '0000111', '', 0, '', '0', '1'),
(372, '1.01.03.06-6', 'Teoria das Folhea��es', '0000113', '', 0, '', '0', '1'),
(373, '1.01.04.01-1', 'F�sica Matem�tica', '0000115', '', 0, '', '0', '1'),
(374, '1.01.04.03-8', 'Matem�tica Discreta e Combinatoria', '0000117', '', 0, '', '0', '1'),
(375, '1.02.01.01-7', 'Teoria Geral e Fundamentos da Probabilidade', '0000120', '', 0, '', '0', '1'),
(376, '1.02.01.02-5', 'Teoria Geral e Processos Estoc�sticos', '0000121', '', 0, '', '0', '1'),
(377, '1.02.01.03-3', 'Teoremas de Limite', '0000122', '', 0, '', '0', '1'),
(378, '1.02.01.04-1', 'Processos Markovianos', '0000123', '', 0, '', '0', '1'),
(379, '1.02.01.05-0', 'An�lise Estoc�stica', '0000124', '', 0, '', '0', '1'),
(380, '1.02.02.01-3', 'Fundamentos da Estat�stica', '0000127', '', 0, '', '0', '1'),
(381, '1.02.02.03-0', 'Infer�ncia Nao-Param�trica', '0000129', '', 0, '', '0', '1'),
(382, '1.02.02.02-1', 'Infer�ncia Param�trica', '0000128', '', 0, '', '0', '1'),
(383, '1.02.02.04-8', 'Infer�ncia em Processos Estoc�sticos', '0000130', '', 0, '', '0', '1'),
(384, '1.02.02.05-6', 'An�lise Multivariada', '0000131', '', 0, '', '0', '1'),
(385, '1.03.01.02-0', 'Linguagem Formais e Automatos', '0000139', '', 0, '', '0', '1'),
(386, '1.04.06.02-6', 'Radioastronomia', '0000175', '', 0, '', '0', '1'),
(387, '1.04.06.03-4', 'Astronomia Espacial', '0000176', '', 0, '', '0', '1'),
(388, '1.04.06.04-2', 'Processamento de Dados Astron�micos', '0000177', '', 0, '', '0', '1'),
(389, '1.05.01.03-7', 'Relatividade e Gravita��o', '0000182', '', 0, '', '0', '1'),
(390, '1.05.01.05-3', 'Metrologia, T�cnicas Gerais de Laborat�rio, Sistema de Instrumenta��o', '0000184', '', 0, '', '0', '1'),
(391, '7.09.05.01-0', 'Pol�tica Externa do Brasil', '0001320', '', 0, '', '1', '1'),
(392, '4.02.13.00-X', 'Dent�stica', '0001386', '', 1, '', '1', '1'),
(393, '7.07.01.00-8', 'Fundamentos e Medidas da Psicologia', '0001218', '', 0, '', '1', '1'),
(394, '7.07.02.03-9', 'Processos Cognitivos e Atencionais', '0001226', '', 0, '', '1', '1'),
(395, '7.07.03.01-9', 'Neurologia, Eletrofisiologia e Comportamento', '0001229', '', 0, '', '1', '1'),
(396, '1.07.01.09-5', 'Hidrogeologia', '0000277', '', 0, '', '1', '1'),
(397, '1.07.01.10-9', 'Prospec��o Mineral', '0000278', '', 0, '', '1', '1'),
(398, '1.07.01.11-7', 'Sedimentologia', '0000279', '', 0, '', '1', '1'),
(399, '1.07.01.12-5', 'Paleontologia Estratigr�fica', '0000280', '', 0, '', '1', '1'),
(400, '1.07.01.14-1', 'Geologia Ambiental', '0000282', '', 0, '', '1', '1'),
(401, '1.07.02.00-8', 'Geof�sica', '0000283', '', 0, '', '1', '1'),
(402, '1.07.02.01-6', 'Geomagnetismo', '0000284', '', 0, '', '1', '1'),
(403, '1.07.03.08-0', 'Sensoriamento Remoto da Atmosfera', '0000302', '', 0, '', '1', '1'),
(404, '1.07.04.02-7', 'Geodesia Geom�trica', '0000306', '', 0, '', '1', '1'),
(405, '1.02.03.00-1', 'Probabilidade e Estat�stica Aplicadas', '0000135', '', 0, '', '1', '1'),
(406, '1.05.03.00-5', 'F�sica das Part�culas Elementares e Campos', '0000193', '', 0, '', '1', '1'),
(407, '1.05.03.01-3', 'Teoria Geral de Part�culas e Campos', '0000194', '', 0, '', '1', '1'),
(408, '1.05.03.02-1', 'Teorias Espec�ficas e Modelos de Intera��o (Sistematica de Part�culas, Raios C�smicos)', '0000195', '', 0, '', '1', '1'),
(409, '1.05.03.03-0', 'Rea��es Espec�ficas e Fenomiologia de Part�culas', '0000196', '', 0, '', '1', '1'),
(410, '1.05.04.06-0', 'M�todos Experimentais e Instrumenta��o para Part�culas Elementares e F�sica Nuclear', '0000204', '', 0, '', '1', '1'),
(411, '1.01.04.02-0', 'An�lise Num�rica', '0000116', '', 0, '', '0', '1'),
(412, '1.05.04.01-0', 'Estrutura Nuclear', '0000199', '', 0, '', '0', '1'),
(413, '1.05.05.01-6', 'Estrutura Eletr�nica de �tomos e Mol�culas (Teoria)', '0000206', '', 0, '', '1', '1'),
(414, '1.05.04.00-1', 'F�sica Nuclear', '0000198', '', 0, '', '0', '1'),
(415, '1.05.04.02-8', 'Desintegra��o Nuclear e Radioatividade', '0000200', '', 0, '', '0', '1'),
(416, '1.05.04.03-6', 'Rea��es Nucleares e Espalhamento Geral', '0000201', '', 0, '', '0', '1'),
(417, '1.05.04.04-4', 'Rea��es Nucleares e Espalhamento (Rea��es Espec�ficas)', '0000202', '', 0, '', '0', '1'),
(418, '1.05.04.05-2', 'Propriedades de N�cleos Espec�ficos', '0000203', '', 0, '', '0', '1'),
(419, '1.05.05.00-8', 'F�sica At�mica e Mol�cular', '0000205', '', 1, '', '1', '1'),
(420, '4.01.02.15-X', 'Cirurgia Vascular', '0001389', '', 1, '', '1', '1'),
(421, '1.08.03.02-5', 'Intera��es Qu�mico-Biol�gicas/Geol�g. Sub. Qu�m. da �gua do Mar', '0000329', '', 0, '', '1', '1'),
(422, '1.05.05.03-2', 'Espectros Mol�culares e Intera��es de F�tons com Mol�culas', '0000208', '', 0, '', '1', '1'),
(423, '1.05.05.04-0', 'Processos de Colis�o e Intera��es de �tomos e Mol�culas', '0000209', '', 0, '', '1', '1'),
(424, '1.05.05.05-9', 'Inf.Sobre �tomos e Mol�culas Obtidos Experimentalmente (Instrumenta��o e T�cnicas)', '0000210', '', 0, '', '1', '1'),
(425, '1.05.05.06-7', 'Estudos de �tomos e Mol�culas Especiais', '0000211', '', 0, '', '1', '1'),
(426, '1.05.06.00-4', 'F�sica dos Fluidos, F�sica de Plasmas e Descargas El�tricas', '0000212', '', 0, '', '1', '1'),
(427, '1.05.06.01-2', 'Cin�tica e Teoria de Transporte de Fluidos (Propriedades F�sicas de Gases)', '0000213', '', 0, '', '1', '1'),
(428, '1.05.06.02-0', 'F�sica de Plasmas e Descargas El�tricas', '0000214', '', 0, '', '1', '1'),
(429, '1.05.07.00-0', 'F�sica da Mat�ria Condensada', '0000215', '', 0, '', '1', '1'),
(430, '1.05.07.01-9', 'Estrutura de L�quidos e S�lidos (Cristalografia)', '0000216', '', 0, '', '1', '1'),
(431, '1.05.07.02-7', 'Propriedades Mec�nicas e Ac�sticas da Mat�ria Condensada', '0000217', '', 0, '', '1', '1'),
(432, '1.05.07.03-5', 'Din�mica da Rede e Estat�stica de Cristais', '0000218', '', 0, '', '1', '1'),
(433, '1.05.07.04-3', 'Equa��o de Estado, Equil�brio de Fases e Transi��es de Fase', '0000219', '', 0, '', '1', '1'),
(434, '1.05.07.05-1', 'Propriedades T�rmicas da Mat�ria Condensada', '0000220', '', 0, '', '1', '1'),
(435, '1.05.07.06-0', 'Propriedades de Transportes de Mat�ria Condensada (N�o Eletr�nicas)', '0000221', '', 0, '', '1', '1'),
(436, '1.05.07.07-8', 'Campos Qu�nticos e S�lidos, H�lio, L�quido, S�lido', '0000222', '', 0, '', '1', '1'),
(437, '4.01.01.19-X', 'Urologia', '0001388', '', 1, '', '1', '1'),
(438, '7.10.04.00-9', 'Teologia Pastoral', '0001328', '', 1, '', '1', '1'),
(439, '1.05.07.08-6', 'Superf�cies e Interfaces (Pel�culas e Filamentos)', '0000223', '', 0, '', '1', '1'),
(440, '1.05.07.09-4', 'Estados Eletr�nicos', '0000224', '', 0, '', '1', '1'),
(441, '1.05.07.11-6', 'Estruturas Eletr�nicas e Propriedades El�tricas de Superf�cies Interfaces e Pel�culas', '0000226', '', 0, '', '1', '1'),
(442, '1.05.07.12-4', 'Supercondutividade', '0000227', '', 0, '', '1', '1'),
(443, '1.05.07.13-2', 'Materiais Magn�ticos e Propriedades Magn�ticas', '0000228', '', 0, '', '1', '1'),
(444, '1.05.07.14-0', 'Resson�ncia Mag.e Relax.Na Mat.Condens (Efeitos Mosbauer, Corr.Ang.Pertubada)', '0000229', '', 0, '', '1', '1'),
(445, '1.05.07.15-9', 'Materiais Diel�tricos e Propriedades Diel�tricas', '0000230', '', 0, '', '1', '1'),
(446, '1.05.07.16-7', 'Prop.�ticas e Espectrosc.da Mat.Condens (Outras Inter.da Mat.Com Rad.e Part.)', '0000231', '', 0, '', '1', '1'),
(447, '1.05.07.17-5', 'Emiss�o Eletr�nica e I�nica por L�quidos e S�lidos (Fen�menos de Impacto)', '0000232', '', 0, '', '1', '1'),
(448, '1.06.03.00-0', 'Fisico-Qu�mica', '0000250', '', 1, '', '1', '1'),
(449, '1.06.01.01-5', 'Estrutura, Conforma��o e Estereoqu�mica', '0000235', '', 0, '', '1', '1'),
(450, '1.06.00.00-0', 'Qu�mica', '0000233', '', 1, '', '1', '1'),
(451, '1.06.01.02-3', 'Sintese Org�nica', '0000236', '', 0, '', '1', '1'),
(452, '1.06.01.03-1', 'Fisico-Qu�mica Org�nica', '0000237', '', 0, '', '1', '1'),
(453, '1.06.01.04-0', 'Fotoqu�mica Org�nica', '0000238', '', 0, '', '1', '1'),
(454, '2.00.00.00-0', 'Ci�ncias Biol�gicas', '0000335', '', 0, '', '1', '1'),
(455, '1.06.01.06-6', 'Evolu��o, Sistem�tica e Ecologia Qu�mica', '0000240', '', 0, '', '1', '1'),
(456, '1.06.01.07-4', 'Polimeros e Col�ides', '0000241', '', 0, '', '1', '1'),
(457, '1.06.01.00-7', 'Qu�mica Org�nica', '0000234', '', 1, '', '1', '1'),
(458, '1.06.02.02-0', 'N�o-Metais e Seus Compostos', '0000244', '', 0, '', '1', '1'),
(459, '1.06.02.00-3', 'Qu�mica Inorg�nica', '0000242', '', 1, '', '1', '1'),
(460, '1.07.02.10-5', 'Gravimetria', '0000293', '', 0, '', '1', '1'),
(461, '1.07.03.01-2', 'Meteorologia Din�mica', '0000295', '', 0, '', '1', '1'),
(462, '1.07.03.02-0', 'Meteorologia Sin�tica', '0000296', '', 0, '', '1', '1'),
(463, '1.07.03.03-9', 'Meteorologia F�sica', '0000297', '', 0, '', '1', '1'),
(464, '1.07.03.04-7', 'Qu�mica da Atmosfera', '0000298', '', 0, '', '1', '1'),
(465, '1.07.03.05-5', 'Instrumenta��o Meteorol�gica', '0000299', '', 0, '', '1', '1'),
(466, '1.07.03.06-3', 'Climatologia', '0000300', '', 0, '', '1', '1'),
(467, '1.07.03.07-1', 'Micrometeorologia', '0000301', '', 0, '', '1', '1'),
(468, '1.07.01.02-8', 'Petrologia', '0000270', '', 0, '', '1', '1'),
(469, '1.07.01.03-6', 'Geoqu�mica', '0000271', '', 0, '', '1', '1'),
(470, '1.07.01.04-4', 'Geologia Regional', '0000272', '', 0, '', '1', '1'),
(471, '1.07.01.05-2', 'Geotect�nica', '0000273', '', 0, '', '1', '1'),
(472, '1.07.02.02-4', 'Sismologia', '0000285', '', 0, '', '1', '1'),
(473, '1.07.02.03-2', 'Geotermia e Fluxo T�rmico', '0000286', '', 0, '', '1', '1'),
(474, '1.07.02.04-0', 'Propriedades F�sicas das Rochas', '0000287', '', 0, '', '1', '1'),
(475, '1.07.02.05-9', 'Geof�sica Nuclear', '0000288', '', 0, '', '1', '1'),
(476, '1.07.02.07-5', 'Aeronomia', '0000290', '', 0, '', '1', '1'),
(477, '1.07.02.08-3', 'Desenvolvimento de Instrumenta��o Geof�sica', '0000291', '', 0, '', '1', '1'),
(478, '1.08.02.03-7', 'Origem das Massas de �gua', '0000324', '', 0, '', '1', '1'),
(479, '1.08.02.04-5', 'Intera��o do Oceano com o Leito do Mar', '0000325', '', 0, '', '1', '1'),
(480, '1.08.02.05-3', 'Intera��o do Oceano com a Atmosfera', '0000326', '', 0, '', '1', '1'),
(481, '2.01.00.00-0', 'Biologia Geral', '0000336', '', 1, '', '1', '1'),
(482, '2.03.00.00-0', 'Bot�nica', '0000344', '', 1, '', '1', '1'),
(483, '1.07.03.09-8', 'Meteorologia Aplicada', '0000303', '', 0, '', '1', '1'),
(484, '1.07.04.03-5', 'Geodesia Celeste', '0000307', '', 0, '', '1', '1'),
(485, '1.07.02.06-7', 'Sensoriamento Remoto', '0000289', '', 1, '', '1', '1'),
(486, '1.07.04.04-3', 'Fotogrametria', '0000308', '', 0, '', '1', '1'),
(487, '1.07.04.05-1', 'Cartografia B�sica', '0000309', '', 0, '', '1', '1'),
(488, '1.07.05.00-7', 'Geografia F�sica', '0000310', '', 0, '', '1', '1'),
(489, '1.08.03.00-9', 'Oceanografia Qu�mica', '0000327', '', 0, '', '1', '1'),
(490, '1.08.03.01-7', 'Propriedades Qu�micas da �gua do Mar', '0000328', '', 0, '', '1', '1'),
(491, '1.08.04.00-5', 'Oceanografia Geol�gica', '0000330', '', 0, '', '1', '1'),
(492, '1.08.04.01-3', 'Geomorfologia Submarina', '0000331', '', 0, '', '1', '1'),
(493, '1.08.04.02-1', 'Sedimentologia Marinha', '0000332', '', 0, '', '1', '1'),
(494, '1.08.04.03-0', 'Geof�sica Marinha', '0000333', '', 0, '', '1', '1'),
(495, '1.08.04.04-8', 'Geoqu�mica Marinha', '0000334', '', 0, '', '1', '1'),
(496, '2.04.04.00-0', 'Comportamento Animal', '0000364', '', 0, '', '1', '1'),
(497, '2.04.05.00-6', 'Taxonomia dos Grupos Recentes', '0000365', '', 0, '', '1', '1'),
(498, '2.04.06.00-2', 'Zoologia Aplicada', '0000366', '', 0, '', '1', '1'),
(499, '2.04.06.01-0', 'Conserva��o das Esp�cies Animais', '0000367', '', 0, '', '1', '1'),
(500, '2.04.06.02-9', 'Utiliza��o dos Animais', '0000368', '', 0, '', '1', '1'),
(501, '2.04.06.03-7', 'Controle Populacional de Animais', '0000369', '', 0, '', '1', '1'),
(502, '2.04.00.00-4', 'Zoologia', '0000360', '', 1, '', '1', '1'),
(503, '2.05.01.00-5', 'Ecologia Te�rica', '0000371', '', 0, '', '1', '1'),
(504, '2.06.04.02-5', 'Anatomia Animal', '0000380', '', 1, '', '1', '1'),
(505, '2.05.00.00-9', 'Ecologia', '0000370', '', 1, '', '1', '1'),
(506, '2.06.02.00-6', 'Embriologia', '0000376', '', 0, '', '1', '1'),
(507, '2.06.03.00-2', 'Histologia', '0000377', '', 0, '', '1', '1'),
(508, '2.06.04.00-9', 'Anatomia', '0000378', '', 0, '', '1', '1'),
(509, '2.06.00.00-3', 'Morfologia', '0000374', '', 1, '', '1', '1'),
(510, '2.07.01.00-4', 'Fisiologia Geral', '0000382', '', 0, '', '1', '1'),
(511, '2.07.02.00-0', 'Fisiologia de �rgaos e Sistemas', '0000383', '', 0, '', '1', '1'),
(512, '2.07.02.01-9', 'Neurofisiologia', '0000384', '', 0, '', '1', '1'),
(513, '2.07.02.03-5', 'Fisiologia da Respira��o', '0000386', '', 0, '', '1', '1'),
(514, '2.07.02.04-3', 'Fisiologia Renal', '0000387', '', 0, '', '1', '1'),
(515, '2.07.00.00-8', 'Fisiologia', '0000381', '', 1, '', '1', '1'),
(516, '2.08.01.00-9', 'Qu�mica de Macromol�culas', '0000394', '', 0, '', '1', '1'),
(517, '2.08.01.02-5', 'Lip�deos', '0000396', '', 0, '', '1', '1'),
(518, '2.08.02.00-5', 'Bioqu�mica dos Microorganismos', '0000398', '', 0, '', '1', '1'),
(519, '2.08.03.00-1', 'Metabolismo e Bioenerg�tica', '0000399', '', 0, '', '1', '1'),
(520, '2.09.01.00-3', 'Biof�sica Molecular', '0000403', '', 0, '', '1', '1'),
(521, '2.08.00.00-2', 'Bioqu�mica', '0000393', '', 1, '', '1', '1'),
(522, '2.08.04.00-8', 'Biologia Molecular', '0000400', '', 1, '', '1', '1'),
(523, '2.08.05.00-4', 'Enzimologia', '0000401', '', 0, '', '1', '1'),
(524, '2.09.00.00-7', 'Biof�sica', '0000402', '', 1, '', '1', '1'),
(525, '3.01.01.00-0', 'Constru��o Civil', '0000441', '', 0, '', '1', '1'),
(526, '2.10.01.01-4', 'Farmacocin�tica', '0000409', '', 0, '', '1', '1'),
(527, '2.10.01.02-2', 'Biodisponibilidade', '0000410', '', 0, '', '1', '1'),
(528, '2.10.02.00-2', 'Farmacologia Auton�mica', '0000411', '', 0, '', '1', '1'),
(529, '2.05.03.00-8', 'Ecologia Aplicada', '0000373', '', 1, '', '1', '1'),
(530, '2.06.01.00-0', 'Citologia e Biologia Celular', '0000375', '', 1, '', '1', '1'),
(531, '2.06.04.01-7', 'Anatomia Humana', '0000379', '', 1, '', '1', '1'),
(532, '2.07.02.02-7', 'Fisiologia Cardiovascular', '0000385', '', 1, '', '1', '1'),
(533, '2.10.03.00-9', 'Neuropsicofarmacologia', '0000412', '', 0, '', '1', '1'),
(534, '2.10.04.00-5', 'Farmacologia Cardiorenal', '0000413', '', 0, '', '1', '1'),
(535, '2.10.05.00-1', 'Farmacologia Bioqu�mica e Molecular', '0000414', '', 0, '', '1', '1'),
(536, '3.00.00.00-9', 'Engenharias', '0000439', '', 0, '', '1', '1'),
(537, '2.10.07.00-4', 'Toxicologia', '0000416', '', 0, '', '1', '1'),
(538, '2.10.00.00-0', 'Farmacologia', '0000407', '', 1, '', '1', '1'),
(539, '2.11.01.00-0', 'Imunoqu�mica', '0000419', '', 0, '', '1', '1'),
(540, '2.11.02.00-7', 'Imunologia Celular', '0000420', '', 0, '', '1', '1'),
(541, '2.11.03.00-3', 'Imunogen�tica', '0000421', '', 0, '', '1', '1'),
(542, '2.11.00.00-4', 'Imunologia', '0000418', '', 1, '', '1', '1'),
(543, '2.12.01.00-5', 'Biologia e Fisiologia dos Microorganismos', '0000424', '', 0, '', '1', '1'),
(544, '2.12.01.02-1', 'Bacterologia', '0000426', '', 0, '', '1', '1'),
(545, '2.12.01.03-0', 'Micologia', '0000427', '', 0, '', '1', '1'),
(546, '2.12.02.02-8', 'Microbiologia Industrial e de Fermenta��o', '0000430', '', 0, '', '1', '1'),
(547, '2.12.00.00-9', 'Microbiologia', '0000423', '', 1, '', '1', '1'),
(548, '2.13.01.00-0', 'Protozoologia de Parasitos', '0000432', '', 0, '', '1', '1'),
(549, '2.13.01.01-8', 'Protozoologia Parasit�ria Humana', '0000433', '', 0, '', '1', '1'),
(550, '2.13.01.02-6', 'Protozoologia Parasit�ria Animal', '0000434', '', 0, '', '1', '1'),
(551, '2.13.02.00-6', 'Helmintologia de Parasitos', '0000435', '', 0, '', '1', '1'),
(552, '2.13.02.01-4', 'Helmintologia Humana', '0000436', '', 0, '', '1', '1'),
(553, '2.13.02.02-2', 'Helmintologia Animal', '0000437', '', 0, '', '1', '1'),
(554, '2.13.03.00-2', 'Entomologia e Malacologia de Parasitos e Vetores', '0000438', '', 0, '', '1', '1'),
(555, '2.13.00.00-3', 'Parasitologia', '0000431', '', 1, '', '1', '1'),
(556, '3.01.00.00-3', 'Engenharia Civil', '0000440', '', 1, '', '1', '1'),
(557, '3.01.01.02-6', 'Processos Construtivos', '0000443', '', 0, '', '1', '1'),
(558, '3.01.01.03-4', 'Instala��es Prediais', '0000444', '', 0, '', '1', '1'),
(559, '3.01.02.00-6', 'Estruturas', '0000445', '', 0, '', '1', '1'),
(560, '3.01.02.01-4', 'Estruturas de Concreto', '0000446', '', 0, '', '1', '1'),
(561, '3.01.02.04-9', 'Mec�nica das Estruturas', '0000449', '', 0, '', '1', '1'),
(562, '3.01.03.02-9', 'Mec�nicas das Rochas', '0000452', '', 0, '', '1', '1'),
(563, '3.01.03.04-5', 'Obras de Terra e Enrocamento', '0000454', '', 0, '', '1', '1'),
(564, '3.01.03.05-3', 'Pavimentos', '0000455', '', 0, '', '1', '1'),
(565, '3.01.04.02-5', 'Hidrologia', '0000458', '', 0, '', '1', '1'),
(566, '3.01.05.01-3', 'Aeroportos (Projeto e Constru��o)', '0000460', '', 0, '', '1', '1'),
(567, '3.01.05.02-1', 'Ferrovias (Projetos e Constru��o)', '0000461', '', 0, '', '1', '1'),
(568, '3.01.05.03-0', 'Portos e Vias Neveg�veis (Projeto e Constru��o)', '0000462', '', 0, '', '1', '1'),
(569, '3.01.05.04-8', 'Rodovias (Projeto e Constru��o)', '0000463', '', 0, '', '1', '1'),
(570, '3.03.01.00-9', 'Instala��es e Equipamentos Metal�rgicos', '0000476', '', 0, '', '1', '1'),
(571, '2.10.08.00-0', 'Farmacologia Cl�nica', '0000417', '', 1, '', '1', '1'),
(572, '2.11.04.00-0', 'Imunologia Aplicada', '0000422', '', 1, '', '1', '1'),
(573, '2.12.01.01-3', 'Virologia', '0000425', '', 1, '', '1', '1'),
(574, '2.12.02.00-1', 'Microbiologia Aplicada', '0000428', '', 1, '', '1', '1'),
(575, '2.12.02.01-0', 'Microbiologia M�dica', '0000429', '', 1, '', '1', '1'),
(576, '3.01.01.01-8', 'Materiais e Componentes de Constru��o', '0000442', '', 1, '', '1', '1'),
(577, '3.01.03.00-2', 'Geot�cnica', '0000450', '', 1, '', '1', '1'),
(578, '3.01.03.01-0', 'Funda��es e Escava��es', '0000451', '', 1, '', '1', '1'),
(579, '3.02.01.00-4', 'Pesquisa Mineral', '0000465', '', 0, '', '1', '1'),
(580, '3.02.01.01-2', 'Caracteriza��o do Min�rio', '0000466', '', 0, '', '1', '1'),
(581, '3.02.01.02-0', 'Dimensionamento de Jazidas', '0000467', '', 0, '', '1', '1'),
(582, '3.02.02.00-0', 'Lavra', '0000468', '', 0, '', '1', '1'),
(583, '3.02.02.01-9', 'Lavra a C�u Aberto', '0000469', '', 0, '', '1', '1'),
(584, '3.02.02.02-7', 'Lavra de Mina Subterr�nea', '0000470', '', 0, '', '1', '1'),
(585, '3.02.02.03-5', 'Equipamentos de Lavra', '0000471', '', 0, '', '1', '1'),
(586, '3.02.03.00-7', 'Tratamento de Min�rios', '0000472', '', 0, '', '1', '1'),
(587, '3.02.03.01-5', 'M�todos de Concentra��o e Enriquecimento de Min�rios', '0000473', '', 0, '', '1', '1'),
(588, '3.02.03.02-3', 'Equipamentos de Beneficiamento de Min�rios', '0000474', '', 0, '', '1', '1'),
(589, '3.03.01.01-7', 'Instala��es Metal�rgicas', '0000477', '', 0, '', '1', '1'),
(590, '3.03.01.02-5', 'Equipamentos Metal�rgicos', '0000478', '', 0, '', '1', '1'),
(591, '3.03.02.00-5', 'Metalurgia Extrativa', '0000479', '', 0, '', '1', '1'),
(592, '3.03.02.01-3', 'Aglomera��o', '0000480', '', 0, '', '1', '1'),
(593, '3.03.02.02-1', 'Eletrometalurgia', '0000481', '', 0, '', '1', '1'),
(594, '3.03.02.03-0', 'Hidrometalurgia', '0000482', '', 0, '', '1', '1'),
(595, '3.03.02.04-8', 'Pirometalurgia', '0000483', '', 0, '', '1', '1'),
(596, '3.03.02.05-6', 'Tratamento de Min�rios', '0000484', '', 0, '', '1', '1'),
(597, '3.03.03.01-0', 'Conforma��o Mec�nica', '0000486', '', 0, '', '1', '1'),
(598, '3.03.03.00-1', 'Metalurgia de Transforma��o', '0000485', '', 0, '', '1', '1'),
(599, '3.03.03.02-8', 'Fundi��o', '0000487', '', 0, '', '1', '1'),
(600, '3.03.03.03-6', 'Metalurgia de Po', '0000488', '', 0, '', '1', '1'),
(601, '3.03.03.04-4', 'Recobrimentos', '0000489', '', 0, '', '1', '1'),
(602, '3.03.03.05-2', 'Soldagem', '0000490', '', 0, '', '1', '1'),
(603, '3.03.03.07-9', 'Usinagem', '0000492', '', 0, '', '1', '1'),
(604, '3.03.04.00-8', 'Metalurgia Fisica', '0000493', '', 0, '', '1', '1'),
(605, '3.03.04.01-6', 'Estrutura dos Metais e Ligas', '0000494', '', 0, '', '1', '1'),
(606, '3.03.04.02-4', 'Propriedades F�sicas dos Metais e Ligas', '0000495', '', 0, '', '1', '1'),
(607, '3.03.04.03-2', 'Propriedades Mec�nicas dos Metais e Ligas', '0000496', '', 0, '', '1', '1'),
(608, '3.03.04.05-9', 'Corros�o', '0000498', '', 0, '', '1', '1'),
(609, '3.03.05.01-2', 'Extra��o e Transforma��o de Materiais', '0000500', '', 0, '', '1', '1'),
(610, '3.03.05.02-0', 'Cer�micos', '0000501', '', 0, '', '1', '1'),
(611, '3.03.05.03-9', 'Materiais Conjugados n�o Met�licos', '0000502', '', 0, '', '1', '1'),
(612, '3.04.01.00-3', 'Materiais El�tricos', '0000505', '', 0, '', '1', '1'),
(613, '3.04.01.01-1', 'Materiais Condutores', '0000506', '', 0, '', '1', '1'),
(614, '3.03.00.00-2', 'Engenharia de Materiais e Metal�rgica', '0000475', '', 1, '', '1', '1'),
(615, '3.04.00.00-7', 'Engenharia El�trica', '0000504', '', 1, '', '1', '1');
INSERT INTO `ajax_areadoconhecimento` (`id_aa`, `a_cnpq`, `a_descricao`, `a_codigo`, `a_geral`, `a_semic`, `a_ativo`, `a_submit`, `a_journal`) VALUES
(616, '3.02.00.00-8', 'Engenharia de Minas', '0000464', '', 0, '', '1', '1'),
(617, '3.04.01.04-6', 'Materiais Diel�tricos, Piesoel�tricos e Ferroel�tricos', '0000509', '', 0, '', '1', '1'),
(618, '3.04.01.06-2', 'Materiais e Dispositivos Magn�ticos', '0000511', '', 0, '', '1', '1'),
(619, '3.04.02.00-0', 'Medidas El�tricas, Magn�ticas e Eletr�nicas (Instrumenta��o)', '0000512', '', 0, '', '1', '1'),
(620, '3.04.02.01-8', 'Medidas El�tricas', '0000513', '', 0, '', '1', '1'),
(621, '3.04.02.02-6', 'Medidas Magn�ticas', '0000514', '', 0, '', '1', '1'),
(622, '3.04.02.03-4', 'Instrumenta��o Eletromec�nica', '0000515', '', 0, '', '1', '1'),
(623, '3.04.02.04-2', 'Instrumenta��o Eletr�nica', '0000516', '', 0, '', '1', '1'),
(624, '3.03.05.04-7', 'Pol�meros, Aplica��es', '0000503', '', 1, '', '1', '1'),
(625, '3.04.02.05-0', 'Sistemas Eletr�nicos de Medida e de Controle', '0000517', '', 1, '', '1', '1'),
(626, '3.04.03.00-6', 'Circuitos El�tricos, Magn�ticos e Eletr�nicos', '0000518', '', 0, '', '1', '1'),
(627, '3.04.03.01-4', 'Teoria Geral dos Circuitos El�tricos', '0000519', '', 0, '', '1', '1'),
(628, '3.04.03.02-2', 'Circuitos Lineares e N�o-Lineares', '0000520', '', 0, '', '1', '1'),
(629, 'XXXXXX', 'XXXX', '0000548', '', 0, '', '0', '1'),
(630, '3.04.03.04-9', 'Circuitos Magn�ticos, Magnetismos, Eletromagnetismo', '0000522', '', 0, '', '1', '1'),
(631, '3.04.04.00-2', 'Sistemas El�tricos de Pot�ncia', '0000523', '', 0, '', '1', '1'),
(632, '3.04.04.01-0', 'Gera��o da Energia El�trica', '0000524', '', 0, '', '1', '1'),
(633, '3.04.04.02-9', 'Transmiss�o da Energia El�trica, Distribui��o da Energia El�trica', '0000525', '', 0, '', '1', '1'),
(634, '3.04.04.03-7', 'Convers�o e Retifica��o da Energia El�trica', '0000526', '', 0, '', '1', '1'),
(635, '3.04.04.04-5', 'Medi��o, Controle, Corre��o e Prote��o de Sistemas El�tricos de Pot�ncia', '0000527', '', 0, '', '1', '1'),
(636, '3.04.04.05-3', 'M�quinas El�tricas e Dispositivos de Pot�ncia', '0000528', '', 0, '', '1', '1'),
(637, '3.04.04.06-1', 'Instala��es El�tricas Prediais e Industriais', '0000529', '', 0, '', '1', '1'),
(638, '3.04.05.00-9', 'Eletr�nica Industrial, Sistemas e Controles Eletr�nicos', '0000530', '', 0, '', '1', '1'),
(639, '3.04.05.01-7', 'Eletr�nica Industrial', '0000531', '', 0, '', '1', '1'),
(640, '3.04.05.03-3', 'Controle de Processos Eletr�nicos, Retroalimenta��o', '0000533', '', 0, '', '1', '1'),
(641, '3.04.06.00-5', 'Telecomunica��es', '0000534', '', 0, '', '1', '1'),
(642, '3.04.06.01-3', 'Teoria Eletromagn�tica, Microondas, Propaga��o de Ondas, Antenas', '0000535', '', 0, '', '1', '1'),
(643, '3.04.06.02-1', 'Radionavega��o e Radioastronomia', '0000536', '', 0, '', '1', '1'),
(644, '3.04.06.03-0', 'Sistemas de Telecomunica��es', '0000537', '', 0, '', '1', '1'),
(645, '3.05.01.00-8', 'Fen�menos de Transporte', '0000539', '', 0, '', '1', '1'),
(646, '3.05.01.01-6', 'Transfer�ncia de Calor', '0000540', '', 0, '', '1', '1'),
(647, '3.05.00.00-1', 'Engenharia Mec�nica', '0000538', '', 1, '', '1', '1'),
(648, '3.05.01.02-4', 'Mec�nica dos Fluidos', '0000541', '', 0, '', '1', '1'),
(649, '3.05.01.03-2', 'Din�mica dos Gases', '0000542', '', 0, '', '1', '1'),
(650, '3.05.02.01-2', 'Termodin�mica', '0000545', '', 0, '', '1', '1'),
(651, '3.05.02.03-9', 'Aproveitamento da Energia', '0000547', '', 0, '', '1', '1'),
(652, '3.05.02.00-4', 'Engenharia T�rmica', '0000544', '', 1, '', '1', '1'),
(653, '3.05.03.03-5', 'An�lise de Tens�es', '0000551', '', 0, '', '1', '1'),
(654, '3.05.03.04-3', 'Termoelasticidade', '0000552', '', 0, '', '1', '1'),
(655, '3.05.04.00-7', 'Projetos de M�quinas', '0000553', '', 0, '', '1', '1'),
(656, '3.05.04.01-5', 'Teoria dos Mecanismos', '0000554', '', 0, '', '1', '1'),
(657, '3.05.04.02-3', 'Est�tica e Din�mica Aplicada', '0000555', '', 0, '', '1', '1'),
(658, '3.05.04.03-1', 'Elementos de M�quinas', '0000556', '', 0, '', '1', '1'),
(659, '3.05.04.04-0', 'Fundamentos Gerais de Projetos das M�quinas', '0000557', '', 0, '', '1', '1'),
(660, '3.05.04.07-4', 'Controle de Sistemas Mec�nicos', '0000560', '', 0, '', '1', '1'),
(661, '3.05.05.00-3', 'Processos de Fabrica��o', '0000562', '', 0, '', '1', '1'),
(662, '3.05.05.01-1', 'Matrizes e Ferramentas', '0000563', '', 0, '', '1', '1'),
(663, '3.05.05.02-0', 'M�quinas de Usinagem e Conforma��o', '0000564', '', 0, '', '1', '1'),
(664, '3.05.05.03-8', 'Controle Num�rico', '0000565', '', 0, '', '1', '1'),
(665, '3.05.05.04-6', 'Robotiza��o', '0000566', '', 0, '', '1', '1'),
(666, '3.05.05.05-4', 'Processos de Fabrica��o, Sele��o Econ�mica', '0000567', '', 0, '', '1', '1'),
(667, '3.06.01.00-2', 'Processos Industriais de Engenharia Qu�mica', '0000569', '', 0, '', '1', '1'),
(668, '3.06.01.01-0', 'Processos Bioquimicos', '0000570', '', 0, '', '1', '1'),
(669, '3.06.00.00-6', 'Engenharia Qu�mica', '0000568', '', 1, '', '1', '1'),
(670, '3.04.05.02-5', 'Automa��o Eletr�nica de Processos El�tricos e Industriais', '0000532', '', 1, '', '1', '1'),
(671, '3.05.02.02-0', 'Controle Ambiental', '0000546', '', 1, '', '1', '1'),
(672, '3.05.03.01-9', 'Mec�nica dos Corpos S�lidos, El�sticos e Pl�sticos', '0000549', '', 1, '', '1', '1'),
(673, '3.06.01.02-9', 'Processos Org�nicos', '0000571', '', 0, '', '1', '1'),
(674, '3.06.01.03-7', 'Processos Inorg�nicos', '0000572', '', 0, '', '1', '1'),
(675, '3.06.02.02-5', 'Opera��es Caracter�sticas de Processos Bioqu�micos', '0000575', '', 0, '', '1', '1'),
(676, '3.06.02.03-3', 'Opera��es de Separa��o e Mistura', '0000576', '', 0, '', '1', '1'),
(677, '3.06.02.00-9', 'Opera��es Industriais e Equipamentos para Engenharia Qu�mica', '0000573', '', 0, '', '1', '1'),
(678, '3.06.03.01-3', 'Balancos Globais de Mat�ria e Energia', '0000578', '', 0, '', '1', '1'),
(679, '3.06.03.02-1', '�gua', '0000579', '', 0, '', '1', '1'),
(680, '3.06.03.03-0', '�lcool', '0000580', '', 0, '', '1', '1'),
(681, '3.06.03.04-8', 'Alimentos', '0000581', '', 0, '', '1', '1'),
(682, '3.06.03.05-6', 'Borrachas', '0000582', '', 0, '', '1', '1'),
(683, '3.06.03.06-4', 'Carv�o', '0000583', '', 0, '', '1', '1'),
(684, '3.06.03.07-2', 'Cer�mica', '0000584', '', 0, '', '1', '1'),
(685, '3.06.03.08-0', 'Cimento', '0000585', '', 0, '', '1', '1'),
(686, '3.06.03.09-9', 'Couro', '0000586', '', 0, '', '1', '1'),
(687, '3.06.03.10-2', 'Detergentes', '0000587', '', 0, '', '1', '1'),
(688, '3.06.03.11-0', 'Fertilizantes', '0000588', '', 0, '', '1', '1'),
(689, '3.06.03.12-9', 'Medicamentos', '0000589', '', 0, '', '1', '1'),
(690, '3.06.03.13-7', 'Metais n�o-Ferrosos', '0000590', '', 0, '', '1', '1'),
(691, '3.06.03.17-0', 'Pol�meros', '0000594', '', 0, '', '1', '1'),
(692, '3.06.03.18-8', 'Produtos Naturais', '0000595', '', 0, '', '1', '1'),
(693, '3.06.03.19-6', 'T�xteis', '0000596', '', 0, '', '1', '1'),
(694, '3.06.03.20-0', 'Tratamentos e Aproveitamento de Rejeitos', '0000597', '', 0, '', '1', '1'),
(695, '3.06.03.21-8', 'Xisto', '0000598', '', 0, '', '1', '1'),
(696, '3.07.01.02-3', 'Tecnologia e Problemas Sanit�rios de Irriga��o', '0000602', '', 0, '', '1', '1'),
(697, '3.07.00.00-0', 'Engenharia Sanit�ria', '0000599', '', 1, '', '1', '1'),
(698, '3.07.01.03-1', '�guas Subterr�neas e Po�os Profundos', '0000603', '', 0, '', '1', '1'),
(699, '3.07.01.04-0', 'Controle de Enchentes e de Barragens', '0000604', '', 0, '', '1', '1'),
(700, '3.07.01.05-8', 'Sedimentologia', '0000605', '', 0, '', '1', '1'),
(701, '3.07.02.00-3', 'Tratamento de �guas de Abastecimento e Residu�rias', '0000606', '', 0, '', '1', '1'),
(702, '3.07.02.01-1', 'Qu�mica Sanit�ria', '0000607', '', 0, '', '1', '1'),
(703, '3.07.02.02-0', 'Processos Simplificados de Tratamento de �guas', '0000608', '', 0, '', '1', '1'),
(704, '3.07.02.05-4', 'Estudos e Caracteriza��o de Efluentes Industriais', '0000611', '', 0, '', '1', '1'),
(705, '3.07.02.07-0', 'Res�duos Radioativos', '0000613', '', 0, '', '1', '1'),
(706, '3.07.03.00-0', 'Saneamento B�sico', '0000614', '', 0, '', '1', '1'),
(707, '3.07.03.01-8', 'T�cnicas de Abastecimento da �gua', '0000615', '', 0, '', '1', '1'),
(708, '3.07.03.02-6', 'Drenagem de �guas Residu�rias', '0000616', '', 0, '', '1', '1'),
(709, '3.07.03.03-4', 'Drenagem Urbana de �guas Pluviais', '0000617', '', 0, '', '1', '1'),
(710, '3.07.03.05-0', 'Limpeza P�blica', '0000619', '', 0, '', '1', '1'),
(711, '3.07.03.06-9', 'Instala��es Hidr�ulico-Sanit�rias', '0000620', '', 0, '', '1', '1'),
(712, '3.07.04.01-4', 'Ecologia Aplicada � Engenharia Sanit�ria', '0000622', '', 0, '', '1', '1'),
(713, '3.07.04.03-0', 'Parasitologia Aplicada � Engenharia Sanit�ria', '0000624', '', 0, '', '1', '1'),
(714, '3.06.03.00-5', 'Tecnologia Qu�mica', '0000577', '', 1, '', '1', '1'),
(715, '3.06.03.16-1', 'Petr�leo e Petroqu�mica', '0000593', '', 1, '', '1', '1'),
(716, '3.07.01.00-7', 'Recursos H�dricos', '0000600', '', 1, '', '1', '1'),
(717, '3.07.03.04-2', 'Res�duos S�lidos, Dom�sticos e Industriais', '0000618', '', 1, '', '1', '1'),
(718, '3.07.04.00-6', 'Saneamento Ambiental', '0000621', '', 1, '', '1', '1'),
(719, '3.07.04.02-2', 'Microbiologia Aplicada e Engenharia Sanit�ria', '0000623', '', 1, '', '1', '1'),
(720, '3.07.04.04-9', 'Qualidade do Ar, das �guas e do Solo', '0000625', '', 0, '', '1', '1'),
(721, '3.07.04.06-5', 'Legisla��o Ambiental', '0000627', '', 0, '', '1', '1'),
(722, '3.08.01.00-1', 'Ger�ncia de Produ��o', '0000629', '', 0, '', '1', '1'),
(723, '3.08.01.01-0', 'Planejamento de Instala��es Industriais', '0000630', '', 0, '', '1', '1'),
(724, '3.08.00.00-5', 'Engenharia de Produ��o', '0000628', '', 1, '', '1', '1'),
(725, '3.08.01.03-6', 'Higiene e Seguran�a do Trabalho', '0000632', '', 0, '', '1', '1'),
(726, '3.08.01.04-4', 'Suprimentos', '0000633', '', 0, '', '1', '1'),
(727, '3.08.02.02-4', 'Programa��o Linear, N�o-Linear, Mista e Din�mica', '0000637', '', 0, '', '1', '1'),
(728, '3.08.04.06-0', 'Avalia��o de Projetos', '0000653', '', 0, '', '1', '1'),
(729, '3.09.01.01-4', 'Produ��o de Radioisotopos', '0000656', '', 0, '', '1', '1'),
(730, '3.09.01.02-2', 'Aplica��es Industriais de Radioisotopos', '0000657', '', 0, '', '1', '1'),
(731, '3.09.01.03-0', 'Instrumenta��o para Medida e Controle de Radia��o', '0000658', '', 0, '', '1', '1'),
(732, '3.09.02.00-2', 'Fus�o Controlada', '0000659', '', 0, '', '1', '1'),
(733, '3.09.00.00-0', 'Engenharia Nuclear', '0000654', '', 0, '', '1', '1'),
(734, '3.09.01.00-6', 'Aplica��es de Radioisotopos', '0000655', '', 0, '', '1', '1'),
(735, '3.10.01.01-7', 'Planejamento e Organiza��o do Sistema de Transporte', '0000677', '', 0, '', '1', '1'),
(736, '3.10.01.02-5', 'Economia dos Transportes', '0000678', '', 0, '', '1', '1'),
(737, '3.11.03.02-2', 'Controle e Automa��o de Sistemas Propulsores', '0000698', '', 0, '', '1', '1'),
(738, '3.11.03.03-0', 'Equipamentos Auxiliares do Sistema Propulsivo', '0000699', '', 0, '', '1', '1'),
(739, '3.11.03.04-9', 'Motor de Propuls�o', '0000700', '', 0, '', '1', '1'),
(740, '3.11.04.00-2', 'Projeto de Navios e de Sistemas Oce�nicos', '0000701', '', 0, '', '1', '1'),
(741, '3.11.04.01-0', 'Projetos de Navios', '0000702', '', 0, '', '1', '1'),
(742, '3.11.04.02-9', 'Projetos de Sistemas Oce�nicos Fixos e Semi-Fixos', '0000703', '', 0, '', '1', '1'),
(743, '3.11.04.03-7', 'Projetos de Embarca��es N�o-Convencionais', '0000704', '', 0, '', '1', '1'),
(744, '3.11.05.00-9', 'Tecnologia de Constru��o Naval e de Sistemas Oce�nicas', '0000705', '', 0, '', '1', '1'),
(745, '3.11.05.01-7', 'M�todos de Fabrica��o de Navios e Sistemas Oce�nicos', '0000706', '', 0, '', '1', '1'),
(746, '3.11.05.02-5', 'Soldagem de Estruturas Navais e Oce�nicos', '0000707', '', 0, '', '1', '1'),
(747, '3.11.05.03-3', 'Custos de Constru��o Naval', '0000708', '', 0, '', '1', '1'),
(748, '3.11.05.04-1', 'Normatiza��o e Certifica��o de Qualidade de Navios', '0000709', '', 0, '', '1', '1'),
(749, '3.12.00.00-1', 'Engenharia Aeroespacial', '0000710', '', 0, '', '1', '1'),
(750, '3.09.02.02-9', 'Problemas Tecnol�gicos da Fus�o Controlada', '0000661', '', 0, '', '1', '1'),
(751, '3.10.02.00-5', 'Ve�culos e Equipamentos de Controle', '0000679', '', 0, '', '1', '1'),
(752, '3.09.03.00-9', 'Combust�vel Nuclear', '0000662', '', 0, '', '1', '1'),
(753, '3.11.01.01-1', 'Resist�ncia Hidrodin�mica', '0000690', '', 0, '', '1', '1'),
(754, '3.09.03.01-7', 'Extra��o de Combust�vel Nuclear', '0000663', '', 0, '', '1', '1'),
(755, '3.11.02.03-4', 'S�ntese Estrutural Naval e Oce�nica', '0000695', '', 0, '', '1', '1'),
(756, '3.09.03.02-5', 'Convers�o, Enriquecimento e Fabrica��o de Combust�vel Nuclear', '0000664', '', 0, '', '1', '1'),
(757, '3.09.03.03-3', 'Reprocessamento de Combust�vel Nuclear', '0000665', '', 0, '', '1', '1'),
(758, '3.09.03.04-1', 'Rejeitos de Combust�vel Nuclear', '0000666', '', 0, '', '1', '1'),
(759, '3.09.04.00-5', 'Tecnologia dos Reatores', '0000667', '', 0, '', '1', '1'),
(760, '3.09.04.01-3', 'N�cleo do Reator', '0000668', '', 0, '', '1', '1'),
(761, '3.09.04.02-1', 'Materiais Nucleares e Blindagem de Reatores', '0000669', '', 0, '', '1', '1'),
(762, '3.09.04.03-0', 'Transfer�ncia de Calor em Reatores', '0000670', '', 0, '', '1', '1'),
(763, '3.09.04.04-8', 'Gera��o e Integra��o Com Sistemas El�tricos em Reatores', '0000671', '', 0, '', '1', '1'),
(764, '3.09.04.05-6', 'Instrumenta��o Para Opera��o e Controle de Reatores', '0000672', '', 0, '', '1', '1'),
(765, '3.08.01.02-8', 'Planejamento, Projeto e Controle de Sistemas de Produ��o', '0000631', '', 1, '', '1', '1'),
(766, '3.08.01.05-2', 'Garantia de Controle de Qualidade', '0000634', '', 1, '', '1', '1'),
(767, '3.09.04.06-4', 'Seguranca, Localiza��o e Lic�nciamento de Reatores', '0000673', '', 0, '', '1', '1'),
(768, '3.09.04.07-2', 'Aspectos Econ�micos de Reatores', '0000674', '', 0, '', '1', '1'),
(769, '3.11.01.00-3', 'Hidrodin�mica de Navios e Sistemas Oce�nicos', '0000689', '', 0, '', '1', '1'),
(770, '3.09.02.01-0', 'Processos Industriais da Fus�o Controlada', '0000660', '', 0, '', '1', '1'),
(771, '3.10.00.00-2', 'Engenharia de Transportes', '0000675', '', 1, '', '1', '1'),
(772, '3.10.02.01-3', 'Vias de Transporte', '0000680', '', 0, '', '1', '1'),
(773, '3.10.02.03-0', 'Esta��o de Transporte', '0000682', '', 0, '', '1', '1'),
(774, '3.10.02.04-8', 'Equipamentos Auxiliares e Controles', '0000683', '', 0, '', '1', '1'),
(775, '3.10.03.01-0', 'Engenharia de Tr�fego', '0000685', '', 0, '', '1', '1'),
(776, '3.10.03.02-8', 'Capacidade de Vias de Transporte', '0000686', '', 0, '', '1', '1'),
(777, '3.10.03.03-6', 'Opera��o de Sistemas de Transporte', '0000687', '', 0, '', '1', '1'),
(778, '3.13.01.02-9', 'Modelagem de Fenomenos Biol�gicos', '0000738', '', 0, '', '1', '1'),
(779, '3.12.02.01-2', 'Trajetorias e Orbitas', '0000715', '', 0, '', '1', '1'),
(780, '3.12.02.02-0', 'Estabilidade e Controle', '0000716', '', 0, '', '1', '1'),
(781, '3.12.03.00-0', 'Estruturas Aeroespaciais', '0000717', '', 0, '', '1', '1'),
(782, '3.12.03.01-9', 'Aeroelasticidade', '0000718', '', 0, '', '1', '1'),
(783, '3.12.03.02-7', 'Fadiga', '0000719', '', 0, '', '1', '1'),
(784, '3.12.03.03-5', 'Projeto de Estruturas Aeroespaciais', '0000720', '', 0, '', '1', '1'),
(785, '3.12.04.00-7', 'Materiais e Processos para Engenharia Aeron�utica e Aeroespacial', '0000721', '', 0, '', '1', '1'),
(786, '3.12.05.00-3', 'Propuls�o Aeroespacial', '0000722', '', 0, '', '1', '1'),
(787, '3.12.05.01-1', 'Combust�o e Escoamento com Rea��es Qu�micas', '0000723', '', 0, '', '1', '1'),
(788, '3.12.05.02-0', 'Propuls�o de Foguetes', '0000724', '', 0, '', '1', '1'),
(789, '3.12.05.03-8', 'M�quinas de Fluxo', '0000725', '', 0, '', '1', '1'),
(790, '3.12.06.00-0', 'Sistemas Aeroespaciais', '0000727', '', 0, '', '1', '1'),
(791, '3.12.06.01-8', 'Avi�es', '0000728', '', 0, '', '1', '1'),
(792, '3.12.06.02-6', 'Foguetes', '0000729', '', 0, '', '1', '1'),
(793, '3.12.06.03-4', 'Helic�pteros', '0000730', '', 0, '', '1', '1'),
(794, '3.12.06.04-2', 'Hovercraft', '0000731', '', 0, '', '1', '1'),
(795, '3.12.06.05-0', 'Sat�lites e Outros Dispositivos Aeroespaciais', '0000732', '', 0, '', '1', '1'),
(796, '3.12.06.06-9', 'Normatiza��o e Certifica��o de Qualidade de Aeronaves e Componentes', '0000733', '', 0, '', '1', '1'),
(797, '3.12.06.07-7', 'Manuten��o de Sistemas Aeroespaciais', '0000734', '', 0, '', '1', '1'),
(798, '3.13.01.03-7', 'Modelagem de Sistemas Biol�gicos', '0000739', '', 0, '', '1', '1'),
(799, '3.13.00.00-6', 'Engenharia Biom�dica', '0000735', '', 1, '', '1', '1'),
(800, '3.13.01.00-2', 'Bioengenharia', '0000736', '', 1, '', '1', '1'),
(801, '3.13.02.02-5', 'Transdutores para Aplica��es Biom�dicas', '0000742', '', 0, '', '1', '1'),
(802, '3.13.02.03-3', 'Instrumenta��o Odontol�gica e M�dico-Hospitalar', '0000743', '', 0, '', '1', '1'),
(803, '3.13.02.00-9', 'Engenharia M�dica', '0000740', '', 1, '', '1', '1'),
(804, '4.01.01.03-7', 'Alergologia e Imunologia Cl�nica', '0000750', '', 0, '', '1', '1'),
(805, '4.01.00.00-6', 'Medicina', '0000746', '', 1, '', '1', '1'),
(806, '4.01.01.05-3', 'Hematologia', '0000752', '', 0, '', '1', '1'),
(807, '4.01.01.09-6', 'Doen�as Infecciosas e Parasit�rias', '0000756', '', 0, '', '1', '1'),
(808, '4.01.01.11-8', 'Gastroenterologia', '0000758', '', 1, '', '1', '1'),
(809, '3.13.02.01-7', 'Biomateriais e Materiais Biocompat�veis', '0000741', '', 1, '', '1', '1'),
(810, '3.13.02.04-1', 'Tecnologia de Pr�teses', '0000744', '', 1, '', '1', '1'),
(811, '4.01.01.04-5', 'Cancerologia', '0000751', '', 1, '', '1', '1'),
(812, '4.01.01.06-1', 'Endocrinologia', '0000753', '', 1, '', '1', '1'),
(813, '4.01.01.07-0', 'Neurologia', '0000754', '', 1, '', '1', '1'),
(814, '4.01.01.12-6', 'Pneumologia', '0000759', '', 0, '', '1', '1'),
(815, '4.01.01.10-0', 'Cardiologia', '0000757', '', 1, '', '1', '1'),
(816, '4.01.01.14-2', 'Reumatologia', '0000761', '', 0, '', '1', '1'),
(817, '4.01.01.13-4', 'Nefrologia', '0000760', '', 1, '', '1', '1'),
(818, '3.12.01.01-6', 'Aerodin�mica de Aeronaves Espaciais', '0000712', '', 0, '', '1', '1'),
(819, '3.12.01.02-4', 'Aerodin�mica dos Processos Geof�sicos e Interplanetarios', '0000713', '', 0, '', '1', '1'),
(820, '4.01.02.01-7', 'Cirurgia Pl�stica e Restauradora', '0000767', '', 0, '', '1', '1'),
(821, '4.01.02.03-3', 'Cirurgia Oftalmol�gica', '0000769', '', 0, '', '1', '1'),
(822, '4.01.02.05-0', 'Cirurgia Tor�xica', '0000771', '', 0, '', '1', '1'),
(823, '4.01.02.07-6', 'Cirurgia Pedi�trica', '0000773', '', 0, '', '1', '1'),
(824, '4.01.02.08-4', 'Neurocirurgia', '0000774', '', 0, '', '1', '1'),
(825, '4.01.02.09-2', 'Cirurgia Urol�gica', '0000775', '', 0, '', '1', '1'),
(826, '4.01.03.00-5', 'Sa�de Materno-Infantil', '0000781', '', 0, '', '1', '1'),
(827, '4.01.04.00-1', 'Psiquiatria', '0000782', '', 0, '', '1', '1'),
(828, '4.01.05.00-8', 'Anatomia Patol�gica e Patologia Cl�nica', '0000783', '', 0, '', '1', '1'),
(829, '4.01.06.00-4', 'Radiologia M�dica', '0000784', '', 0, '', '1', '1'),
(830, '4.01.07.00-0', 'Medicina Legal e Deontologia', '0000785', '', 0, '', '1', '1'),
(831, '4.02.05.00-2', 'Periodontia', '0000791', '', 0, '', '1', '1'),
(832, '4.02.01.00-7', 'Cl�nica Odontol�gica', '0000787', '', 0, '', '1', '1'),
(833, '4.04.01.00-6', 'Enfermagem M�dico-Cir�rgica', '0000803', '', 1, '', '1', '1'),
(834, '4.02.04.00-6', 'Odontopediatria', '0000790', '', 0, '', '1', '1'),
(835, '4.02.09.00-8', 'Materiais Odontol�gicos', '0000795', '', 0, '', '1', '1'),
(836, '4.02.00.00-0', 'Odontologia', '0000786', '', 1, '', '1', '1'),
(837, '4.03.01.00-1', 'Farmacotecnia', '0000797', '', 0, '', '1', '1'),
(838, '4.03.02.00-8', 'Farmacognosia', '0000798', '', 0, '', '1', '1'),
(839, '4.03.03.00-4', 'An�lise Toxicol�gica', '0000799', '', 0, '', '1', '1'),
(840, '4.03.05.00-7', 'Bromatologia', '0000801', '', 0, '', '1', '1'),
(841, '4.03.00.00-5', 'Farm�cia', '0000796', '', 1, '', '1', '1'),
(842, '4.01.02.12-x', 'Traumatol�gia', '0000778', '', 0, '', '1', '1'),
(843, '4.04.02.00-2', 'Enfermagem Obst�trica', '0000804', '', 0, '', '1', '1'),
(844, '4.04.03.00-9', 'Enfermagem Pedi�trica', '0000805', '', 0, '', '1', '1'),
(845, '4.04.04.00-5', 'Enfermagem Psiqui�trica', '0000806', '', 0, '', '1', '1'),
(846, '4.04.00.00-0', 'Enfermagem', '0000802', '', 1, '', '1', '1'),
(847, '4.05.01.00-0', 'Bioqu�mica da Nutri��o', '0000810', '', 0, '', '1', '1'),
(848, '4.05.02.00-7', 'Diet�tica', '0000811', '', 0, '', '1', '1'),
(849, '4.05.03.00-3', 'An�lise Nutricional de Popula��o', '0000812', '', 0, '', '1', '1'),
(850, '4.01.01.18-6', 'Ortopedia', '0000765', '', 1, '', '1', '1'),
(851, '4.01.02.02-5', 'Cirurgia Otorrinolaringol�gica', '0000768', '', 1, '', '1', '1'),
(852, '4.01.02.04-1', 'Cirurgia Cardiovascular', '0000770', '', 1, '', '1', '1'),
(853, '4.01.02.06-8', 'Cirurgia Gastroenterologia', '0000772', '', 1, '', '1', '1'),
(854, '4.01.02.10-6', 'Cirurgia Proctol�gica', '0000776', '', 1, '', '1', '1'),
(855, '4.01.02.11-4', 'Cirurgia Ortop�dica', '0000777', '', 1, '', '1', '1'),
(856, '4.01.02.14-9', 'Cirurgia Experimental', '0000780', '', 1, '', '1', '1'),
(857, '4.02.06.00-9', 'Endodontia', '0000792', '', 1, '', '1', '1'),
(858, '4.03.04.00-0', 'An�lise e Controle e Medicamentos', '0000800', '', 1, '', '1', '1'),
(859, '4.04.06.00-8', 'Enfermagem de Sa�de P�blica', '0000808', '', 1, '', '1', '1'),
(860, '4.05.04.00-0', 'Desnutri��o e Desenvolvimento Fisiol�gico', '0000813', '', 0, '', '1', '1'),
(861, '4.05.00.00-4', 'Nutri��o', '0000809', '', 1, '', '1', '1'),
(862, '4.06.00.00-9', 'Sa�de Coletiva', '0000814', '', 1, '', '1', '1'),
(863, '4.06.03.00-8', 'Medicina Preventiva', '0000817', '', 0, '', '1', '1'),
(864, '5.01.01.00-5', 'Ci�ncia do Solo', '0000823', '', 0, '', '1', '1'),
(865, '5.01.01.01-3', 'Genese, Morfologia e Classifica��o dos Solos', '0000824', '', 0, '', '1', '1'),
(866, '5.01.01.02-1', 'F�sica do Solo', '0000825', '', 0, '', '1', '1'),
(867, '5.01.01.03-0', 'Qu�mica do Solo', '0000826', '', 0, '', '1', '1'),
(868, '5.01.01.04-8', 'Microbiologia e Bioqu�mica do Solo', '0000827', '', 0, '', '1', '1'),
(869, '5.00.00.00-4', 'Ci�ncias Agr�rias', '0000821', '', 0, '', '1', '1'),
(870, '5.01.01.06-4', 'Manejo e Conserva��o do Solo', '0000829', '', 0, '', '1', '1'),
(871, '5.01.02.00-1', 'Fitossanidade', '0000830', '', 0, '', '1', '1'),
(872, '5.01.02.01-0', 'Fitopatologia', '0000831', '', 0, '', '1', '1'),
(873, '5.01.02.02-8', 'Entomologia Agr�cola', '0000832', '', 0, '', '1', '1'),
(874, '5.01.02.03-6', 'Parasitologia Agr�cola', '0000833', '', 0, '', '1', '1'),
(875, '5.01.03.01-6', 'Manejo e Tratos Culturais', '0000837', '', 0, '', '1', '1'),
(876, '5.01.03.03-2', 'Produ��o e Beneficiamento de Sementes', '0000839', '', 0, '', '1', '1'),
(877, '5.01.03.05-9', 'Melhoramento Vegetal', '0000841', '', 0, '', '1', '1'),
(878, '5.01.03.06-7', 'Fisiologia de Plantas Cultivadas', '0000842', '', 0, '', '1', '1'),
(879, '5.01.04.00-4', 'Floricultura, Parques e Jardins', '0000844', '', 0, '', '1', '1'),
(880, '5.01.04.01-2', 'Floricultura', '0000845', '', 0, '', '1', '1'),
(881, '5.01.04.02-0', 'Parques e Jardins', '0000846', '', 0, '', '1', '1'),
(882, '5.01.04.03-9', 'Arboriza��o de Vias P�blicas', '0000847', '', 0, '', '1', '1'),
(883, '5.01.05.00-0', 'Agrometeorologia', '0000848', '', 0, '', '1', '1'),
(884, '5.01.06.00-7', 'Extens�o Rural', '0000849', '', 0, '', '1', '1'),
(885, '5.01.00.00-9', 'Agronomia', '0000822', '', 1, '', '1', '1'),
(886, '5.02.01.00-0', 'Silvicultura', '0000851', '', 0, '', '1', '1'),
(887, '5.02.01.01-8', 'Dendrologia', '0000852', '', 0, '', '1', '1'),
(888, '5.02.01.03-4', 'Gen�tica e Melhoramento Florestal', '0000854', '', 0, '', '1', '1'),
(889, '5.02.01.06-9', 'Fisiologia Florestal', '0000857', '', 0, '', '1', '1'),
(890, '5.02.01.08-5', 'Prote��o Florestal', '0000859', '', 0, '', '1', '1'),
(891, '5.02.02.00-6', 'Manejo Florestal', '0000860', '', 0, '', '1', '1'),
(892, '5.02.02.01-4', 'Economia Florestal', '0000861', '', 0, '', '1', '1'),
(893, '5.02.02.02-2', 'Politica e Legisla��o Florestal', '0000862', '', 0, '', '1', '1'),
(894, '5.02.02.03-0', 'Administra��o Florestal', '0000863', '', 0, '', '1', '1'),
(895, '5.02.02.04-9', 'Dendrometria e Invent�rio Florestal', '0000864', '', 0, '', '1', '1'),
(896, '5.02.02.05-7', 'Fotointerpreta��o Florestal', '0000865', '', 0, '', '1', '1'),
(897, '5.02.00.00-3', 'Recursos Florestais e Engenharia Florestal', '0000850', '', 1, '', '1', '1'),
(898, '4.08.00.00-8', 'Fisioterapia e Terapia Ocupacional', '0000819', '', 1, '', '1', '1'),
(899, '5.01.03.00-8', 'Fitotecnia', '0000836', '', 1, '', '1', '1'),
(900, '5.01.03.02-4', 'Mecaniza��o Agr�cola', '0000838', '', 1, '', '1', '1'),
(901, '5.01.03.04-0', 'Produ��o de Mudas', '0000840', '', 1, '', '1', '1'),
(902, '5.01.03.07-5', 'Matologia', '0000843', '', 1, '', '1', '1'),
(903, '5.02.01.02-6', 'Florestamento e Reflorestamento', '0000853', '', 1, '', '1', '1'),
(904, '5.02.01.04-2', 'Sementes Florestais', '0000855', '', 1, '', '1', '1'),
(905, '5.02.01.05-0', 'Nutri��o Florestal', '0000856', '', 1, '', '1', '1'),
(906, '5.02.03.01-0', 'Explora��o Florestal', '0000868', '', 0, '', '1', '1'),
(907, '5.02.04.01-7', 'Anatomia e Identifica��o de Produtos Florestais', '0000871', '', 0, '', '1', '1'),
(908, '5.02.04.02-5', 'Propriedades F�sico-Mec�nicas da Madeira', '0000872', '', 0, '', '1', '1'),
(909, '5.02.04.03-3', 'Rela��es �gua-Madeira e Secagem', '0000873', '', 0, '', '1', '1'),
(910, '5.02.04.04-1', 'Tratamento da Madeira', '0000874', '', 0, '', '1', '1'),
(911, '5.02.04.05-0', 'Processamento Mec�nico da Madeira', '0000875', '', 0, '', '1', '1'),
(912, '5.02.04.06-8', 'Qu�mica da Madeira', '0000876', '', 0, '', '1', '1'),
(913, '5.02.04.07-6', 'Resinas de Madeiras', '0000877', '', 0, '', '1', '1'),
(914, '5.02.05.01-3', 'Hidrologia Florestal', '0000881', '', 0, '', '1', '1'),
(915, '5.02.05.02-1', 'Conserva��o de �reas Silvestres', '0000882', '', 0, '', '1', '1'),
(916, '5.02.05.03-0', 'Conserva��o de Bacias Hidrogr�ficas', '0000883', '', 0, '', '1', '1'),
(917, '5.02.06.00-1', 'Energia de Biomassa Florestal', '0000885', '', 0, '', '1', '1'),
(918, '5.04.05.02-0', 'Manejo de Animais', '0000915', '', 1, '', '1', '1'),
(919, '5.03.01.00-4', 'M�quinas e Implementos Agr�colas', '0000887', '', 0, '', '1', '1'),
(920, '5.03.02.00-0', 'Engenharia de �gua e Solo', '0000888', '', 0, '', '1', '1'),
(921, '5.03.02.01-9', 'Irriga��o e Drenagem', '0000889', '', 0, '', '1', '1'),
(922, '5.03.02.02-7', 'Conserva��o de Solo e �gua', '0000890', '', 0, '', '1', '1'),
(923, '5.03.03.00-7', 'Engenharia de Processamento de Produtos Agr�colas', '0000891', '', 0, '', '1', '1'),
(924, '5.03.03.01-5', 'Pr�-Processamento de Produtos Agr�colas', '0000892', '', 0, '', '1', '1'),
(925, '5.03.03.02-3', 'Armazenamento de Produtos Agr�colas', '0000893', '', 0, '', '1', '1'),
(926, '5.03.03.03-1', 'Transfer�ncia de Produtos Agr�colas', '0000894', '', 0, '', '1', '1'),
(927, '5.03.04.00-3', 'Constru��es Rurais e Ambi�ncia', '0000895', '', 0, '', '1', '1'),
(928, '5.03.04.01-1', 'Assentamento Rural', '0000896', '', 0, '', '1', '1'),
(929, '5.03.04.02-0', 'Engenharia de Constru��es Rurais', '0000897', '', 0, '', '1', '1'),
(930, '5.03.04.03-8', 'Saneamento Rural', '0000898', '', 0, '', '1', '1'),
(931, '5.03.05.00-0', 'Energiza��o Rural', '0000899', '', 0, '', '1', '1'),
(932, '5.03.00.00-8', 'Engenharia Agr�cola', '0000886', '', 1, '', '1', '1'),
(933, '5.04.01.00-9', 'Ecologia dos Animais Dom�sticos e Etologia', '0000901', '', 0, '', '1', '1'),
(934, '5.04.02.00-5', 'Gen�tica e Melhoramento dos Animais Dom�sticos', '0000902', '', 0, '', '1', '1'),
(935, '5.04.03.00-1', 'Nutri��o e Alimenta��o Animal', '0000903', '', 0, '', '1', '1'),
(936, '5.04.03.01-0', 'Exig�ncias Nutricionais dos Animais', '0000904', '', 0, '', '1', '1'),
(937, '5.04.03.02-8', 'Avalia��o de Alimentos para Animais', '0000905', '', 0, '', '1', '1'),
(938, '5.04.03.03-6', 'Conserva��o de Alimentos para Animais', '0000906', '', 0, '', '1', '1'),
(939, '5.04.04.01-6', 'Avalia��o, Produ��o e Conserva��o de Forragens', '0000908', '', 0, '', '1', '1'),
(940, '5.04.04.03-2', 'Fisiologia de Plantas Forrageiras', '0000910', '', 0, '', '1', '1'),
(941, '5.04.04.04-0', 'Melhoramento de Plantas Forrageiras e Produ��o de Sementes', '0000911', '', 0, '', '1', '1'),
(942, '5.04.04.05-9', 'Toxicologia e Plantas T�xicas', '0000912', '', 0, '', '1', '1'),
(943, '5.04.05.01-2', 'Cria��o de Animais', '0000914', '', 0, '', '1', '1'),
(944, '5.04.05.03-9', 'Instala��es para Produ��o Animal', '0000916', '', 0, '', '1', '1'),
(945, '5.04.00.00-2', 'Zootecnia', '0000900', '', 1, '', '1', '1'),
(946, '5.02.05.04-8', 'Recupera��o de �reas Degradadas', '0000884', '', 1, '', '1', '1'),
(947, '5.04.04.00-8', 'Pastagem e Forragicultura', '0000907', '', 1, '', '1', '1'),
(948, '5.04.05.00-4', 'Produ��o Animal', '0000913', '', 1, '', '1', '1'),
(949, '5.05.01.03-8', 'Radiologia de Animais', '0000921', '', 1, '', '1', '1'),
(950, '5.05.01.04-6', 'Farmacologia e Terap�utica Animal', '0000922', '', 1, '', '1', '1'),
(951, '5.05.01.08-9', 'Toxicologia Animal', '0000926', '', 1, '', '1', '1'),
(952, '5.05.02.00-0', 'Medicina Veterin�ria Preventiva', '0000927', '', 1, '', '1', '1'),
(953, '5.05.02.01-8', 'Epidemiologia Animal', '0000928', '', 0, '', '1', '1'),
(954, '5.05.02.02-6', 'Saneamento Aplicado � Sa�de do Homem', '0000929', '', 0, '', '1', '1'),
(955, '5.05.02.03-4', 'Doen�as Infecciosas de Animais', '0000930', '', 0, '', '1', '1'),
(956, '5.05.02.04-2', 'Doen�as Parasit�rias de Animais', '0000931', '', 0, '', '1', '1'),
(957, '5.05.02.05-0', 'Sa�de Animal (Programas Sanit�rios)', '0000932', '', 0, '', '1', '1'),
(958, '5.05.03.01-4', 'Patologia Avi�ria', '0000934', '', 0, '', '1', '1'),
(959, '5.05.04.02-9', 'Insemina��o Artificial Animal', '0000939', '', 0, '', '1', '1'),
(960, '5.05.04.03-7', 'Fisiopatologia da Reprodu��o Animal', '0000940', '', 0, '', '1', '1'),
(961, '5.06.01.00-8', 'Recursos Pesqueiros Marinhos', '0000943', '', 0, '', '1', '1'),
(962, '5.06.01.01-6', 'Fatores Abi�ticos do Mar', '0000944', '', 0, '', '1', '1'),
(963, '5.06.01.02-4', 'Avalia��o de Estoques Pesqueiros Marinhos', '0000945', '', 0, '', '1', '1'),
(964, '5.06.01.03-2', 'Explora��o Pesqueira Marinha', '0000946', '', 0, '', '1', '1'),
(965, '5.06.01.04-0', 'Manejo e Conserva��o de Recursos Pesqueiros Marinhos', '0000947', '', 0, '', '1', '1'),
(966, '5.06.02.00-4', 'Recursos Pesqueiros de �guas Interiores', '0000948', '', 0, '', '1', '1'),
(967, '5.06.02.01-2', 'Fatores Abi�ticos de �guas Interiores', '0000949', '', 0, '', '1', '1'),
(968, '5.06.02.02-0', 'Avalia��o de Estoques Pesqueiros de �guas Interiores', '0000950', '', 0, '', '1', '1'),
(969, '5.06.02.03-9', 'Explota��o Pesqueira de �guas Interiores', '0000951', '', 0, '', '1', '1'),
(970, '5.06.02.04-7', 'Manejo e Conserva��o de Recursos Pesqueiros de �guas Interiores', '0000952', '', 0, '', '1', '1'),
(971, '5.06.03.01-9', 'Maricultura', '0000954', '', 0, '', '1', '1'),
(972, '5.06.03.02-7', 'Carcinocultura', '0000955', '', 0, '', '1', '1'),
(973, '5.06.03.03-5', 'Ostreicultura', '0000956', '', 0, '', '1', '1'),
(974, '5.06.03.04-3', 'Piscicultura', '0000957', '', 0, '', '1', '1'),
(975, '5.06.04.00-7', 'Engenharia de Pesca', '0000958', '', 0, '', '1', '1'),
(976, '5.06.00.00-1', 'Recursos Pesqueiros e Engenharia de Pesca', '0000942', '', 1, '', '1', '1'),
(977, '5.07.01.01-0', 'Valor Nutritivo de Alimentos', '0000961', '', 0, '', '1', '1'),
(978, '5.07.01.04-5', 'Fisiologia P�s-Colheita', '0000964', '', 0, '', '1', '1'),
(979, '5.07.01.05-3', 'Toxicidade e Res�duos de Pesticidas em Alimentos', '0000965', '', 0, '', '1', '1'),
(980, '6.01.01.01-6', 'Teoria Geral do Direito', '0000981', '', 0, '', '1', '1'),
(981, '5.07.02.04-1', 'Tecnologia de Alimentos Diet�ticos e Nutricionais', '0000972', '', 0, '', '1', '1'),
(982, '5.07.02.05-0', 'Aproveitamento de Subprodutos', '0000973', '', 0, '', '1', '1'),
(983, '5.07.02.06-8', 'Embalagens de Produtos Alimentares', '0000974', '', 0, '', '1', '1'),
(984, '5.07.03.00-5', 'Engenharia de Alimentos', '0000975', '', 0, '', '1', '1'),
(985, '5.07.03.01-3', 'Instala��es Industriais de Produ��o de Alimentos', '0000976', '', 0, '', '1', '1'),
(986, '5.07.03.02-1', 'Armazenamento de Alimentos', '0000977', '', 0, '', '1', '1'),
(987, '6.01.02.06-3', 'Direito Administrativo', '0000995', '', 1, '', '1', '1'),
(988, '6.01.01.02-4', 'Teoria Geral do Processo', '0000982', '', 0, '', '1', '1'),
(989, '6.01.01.03-2', 'Teoria do Estado', '0000983', '', 0, '', '1', '1'),
(990, '6.01.01.04-0', 'Hist�ria do Direito', '0000984', '', 0, '', '1', '1'),
(991, '6.01.01.06-7', 'L�gica Jur�dica', '0000986', '', 0, '', '1', '1'),
(992, '5.05.03.02-2', 'Anatomia Patologia Animal', '0000935', '', 1, '', '1', '1'),
(993, '5.05.03.03-0', 'Patologia Cl�nica Animal', '0000936', '', 1, '', '1', '1'),
(994, '5.05.04.00-2', 'Reprodu��o Animal', '0000937', '', 1, '', '1', '1'),
(995, '5.05.04.01-0', 'Ginecologia e Andrologia Animal', '0000938', '', 1, '', '1', '1'),
(996, '5.06.03.00-0', 'Aq�icultura', '0000953', '', 1, '', '1', '1'),
(997, '5.07.01.02-9', 'Qu�mica, F�sica, F�sico-Qu�mica e Bioqu�mica dos Alim. e das Mat.-Primas Alimentares', '0000962', '', 1, '', '1', '1'),
(998, '5.07.01.03-7', 'Microbiologia de Alimentos', '0000963', '', 1, '', '1', '1'),
(999, '6.01.01.08-3', 'Antropologia Jur�dica', '0000988', '', 0, '', '1', '1'),
(1000, '6.01.03.00-0', 'Direito Privado', '0000997', '', 1, '', '1', '1'),
(1001, '6.01.01.05-9', 'Filosofia do Direito', '0000985', '', 1, '', '1', '1'),
(1002, '6.01.02.05-5', 'Direito Constitucional', '0000994', '', 1, '', '1', '1'),
(1003, '6.01.04.00-7', 'Direitos Especiais', '0001002', '', 1, '', '1', '1'),
(1004, '6.01.03.04-3', 'Direito Internacional Privado', '0001001', '', 0, '', '1', '1'),
(1005, '6.03.01.00-7', 'Teoria Econ�mica', '0001018', '', 0, '', '1', '1'),
(1006, '6.01.00.00-1', 'Direito', '0000979', '', 1, '', '1', '1'),
(1007, '6.02.01.01-0', 'Administra��o da Produ��o', '0001005', '', 0, '', '1', '1'),
(1008, '6.02.01.02-9', 'Administra��o Financeira', '0001006', '', 0, '', '1', '1'),
(1009, '6.02.01.04-5', 'Neg�cios Internacionais', '0001008', '', 0, '', '1', '1'),
(1010, '6.02.02.04-1', 'Administra��o de Pessoal', '0001014', '', 0, '', '1', '1'),
(1011, '6.02.00.00-6', 'Administra��o', '0001003', '', 1, '', '1', '1'),
(1012, '5.07.02.01-7', 'Tecnologia de Produtos de Origem Animal', '0000969', '', 0, '', '1', '1'),
(1013, '6.03.01.01-5', 'Economia Geral', '0001019', '', 0, '', '1', '1'),
(1014, '6.03.00.00-0', 'Economia', '0001017', '', 1, '', '1', '1'),
(1015, '5.07.02.02-5', 'Tecnologia de Produtos de Origem Vegetal', '0000970', '', 0, '', '1', '1'),
(1016, '6.03.02.02-0', 'Estat�stica S�cio-Econ�mica', '0001026', '', 0, '', '1', '1'),
(1017, '6.03.02.03-8', 'Contabilidade Nacional', '0001027', '', 0, '', '1', '1'),
(1018, '6.03.02.04-6', 'Economia Matem�tica', '0001028', '', 0, '', '1', '1'),
(1019, '6.03.03.00-0', 'Economia Monet�ria e Fiscal', '0001029', '', 0, '', '1', '1'),
(1020, '6.03.03.01-8', 'Teoria Monet�ria e Financeira', '0001030', '', 0, '', '1', '1'),
(1021, '6.03.03.02-6', 'Institui��es Monet�rias e Financeiras do Brasil', '0001031', '', 0, '', '1', '1'),
(1022, '6.03.03.03-4', 'Financas P�blicas Internas', '0001032', '', 0, '', '1', '1'),
(1023, '6.03.03.04-2', 'Pol�tica Fiscal do Brasil', '0001033', '', 0, '', '1', '1'),
(1024, '6.03.04.00-6', 'Crescimento, Flutua��es e Planejamento Econ�mico', '0001034', '', 0, '', '1', '1'),
(1025, '6.03.04.01-4', 'Crescimento e Desenvolvimento Econ�mico', '0001035', '', 0, '', '1', '1'),
(1026, '6.03.04.02-2', 'Teoria e Pol�tica de Planejamento Econ�mico', '0001036', '', 0, '', '1', '1'),
(1027, '6.03.04.03-0', 'Flutua��es C�clicas e Proje��es Econ�micas', '0001037', '', 0, '', '1', '1'),
(1028, '6.03.04.04-9', 'Infla��o', '0001038', '', 0, '', '1', '1'),
(1029, '6.03.05.00-2', 'Economia Internacional', '0001039', '', 0, '', '1', '1'),
(1030, '6.03.05.01-0', 'Teoria do Com�rcio Internacional', '0001040', '', 0, '', '1', '1'),
(1031, '6.03.05.03-7', 'Balan�o de Pagamentos (Financas Internacionais)', '0001042', '', 0, '', '1', '1'),
(1032, '6.03.05.04-5', 'Investimentos Internacionais e Ajuda Externa', '0001043', '', 0, '', '1', '1'),
(1033, '6.03.06.00-9', 'Economia dos Recursos Humanos', '0001044', '', 0, '', '1', '1'),
(1034, '6.01.02.01-2', 'Direito Tribut�rio', '0000990', '', 1, '', '1', '1'),
(1035, '6.01.02.02-0', 'Direito Penal', '0000991', '', 1, '', '1', '1'),
(1036, '6.01.02.03-9', 'Direito Processual Penal', '0000992', '', 1, '', '1', '1'),
(1037, '6.01.02.04-7', 'Direito Processual Civil', '0000993', '', 1, '', '1', '1'),
(1038, '6.01.02.07-1', 'Direito Internacional P�blico', '0000996', '', 1, '', '1', '1'),
(1039, '6.01.03.01-9', 'Direito Civil', '0000998', '', 1, '', '1', '1'),
(1040, '6.01.03.02-7', 'Direito Comercial', '0000999', '', 1, '', '1', '1'),
(1041, '6.02.01.03-7', 'Mercadologia', '0001007', '', 1, '', '1', '1'),
(1042, '6.02.03.00-5', 'Administra��o de Setores Espec�ficos', '0001015', '', 1, '', '1', '1'),
(1043, '6.02.04.00-1', 'Ci�ncias Cont�beis', '0001016', '', 1, '', '1', '1'),
(1044, '6.03.05.02-9', 'Rela��es do Com�rcio (Pol�tica Comercial, Integra��o Econ�mica)', '0001041', '', 1, '', '1', '1'),
(1045, '6.03.06.02-5', 'Mercado de Trabalho (Pol�tica do Governo)', '0001046', '', 0, '', '1', '1'),
(1046, '6.03.06.03-3', 'Sindicatos, Diss�dios Coletivos, Rela��es de Emprego (Empregador/Empregado)', '0001047', '', 0, '', '1', '1'),
(1047, '6.03.06.04-1', 'Capital Humano', '0001048', '', 0, '', '1', '1'),
(1048, '6.03.06.05-0', 'Demografia Econ�mica', '0001049', '', 0, '', '1', '1'),
(1049, '6.03.07.00-5', 'Economia Industrial', '0001050', '', 0, '', '1', '1'),
(1050, '6.03.07.01-3', 'Organiza��o Industrial e Estudos Industriais', '0001051', '', 0, '', '1', '1'),
(1051, '6.03.07.02-1', 'Mudan�a Tecnologica', '0001052', '', 0, '', '1', '1'),
(1052, '6.03.08.00-1', 'Economia do Bem-Estar Social', '0001053', '', 0, '', '1', '1'),
(1053, '6.03.08.01-0', 'Economia dos Programas de Bem-Estar Social', '0001054', '', 0, '', '1', '1'),
(1054, '6.03.08.02-8', 'Economia do Consumidor', '0001055', '', 0, '', '1', '1'),
(1055, '6.03.09.00-8', 'Economia Regional e Urbana', '0001056', '', 0, '', '1', '1'),
(1056, '6.03.09.02-4', 'Economia Urbana', '0001058', '', 0, '', '1', '1'),
(1057, '6.03.10.00-6', 'Economias Agr�ria e dos Recursos Naturais', '0001060', '', 0, '', '1', '1'),
(1058, '6.04.04.02-7', 'Conceitua��o de Paisagismo e Metodologia do Paisagismo', '0001077', '', 0, '', '1', '1'),
(1059, '6.04.04.03-5', 'Estudos de Organiza��o do Espa�o Exterior', '0001078', '', 0, '', '1', '1'),
(1060, '6.04.04.04-3', 'Projetos de Espa�os Livres Urbanos', '0001079', '', 0, '', '1', '1'),
(1061, '6.05.01.01-4', 'Teoria do Planejamento Urbano e Regional', '0001082', '', 0, '', '1', '1'),
(1062, '6.05.01.02-2', 'Teoria da Urbaniza��o', '0001083', '', 0, '', '1', '1'),
(1063, '6.05.01.03-0', 'Pol�tica Urbana', '0001084', '', 0, '', '1', '1'),
(1064, '6.05.01.04-9', 'Hist�ria Urbana', '0001085', '', 0, '', '1', '1'),
(1065, '6.05.02.00-2', 'M�todos e T�cnicas do Planejamento Urbano e Regional', '0001086', '', 0, '', '1', '1'),
(1066, '6.05.02.01-0', 'Informa��o, Cadastro e Mapeamento', '0001087', '', 0, '', '1', '1'),
(1067, '6.05.02.02-9', 'T�cnica de Previs�o Urbana e Regional', '0001088', '', 0, '', '1', '1'),
(1068, '6.05.02.03-7', 'T�cnicas de An�lise e Avalia��o Urbana e Regional', '0001089', '', 0, '', '1', '1'),
(1069, '6.05.02.04-5', 'T�cnicas de Planejamento e Projeto Urbanos e Regionais', '0001090', '', 0, '', '1', '1'),
(1070, '6.05.03.00-9', 'Servi�os Urbanos e Regionais', '0001091', '', 0, '', '1', '1'),
(1071, '6.05.03.02-5', 'Estudos da Habita��o', '0001093', '', 0, '', '1', '1'),
(1072, '6.05.03.04-1', 'Aspectos Econ�micos do Planejamento Urbano e Regional', '0001095', '', 0, '', '1', '1'),
(1073, '6.05.03.05-0', 'Aspectos F�sico-Ambientais do Planejamento Urbano e Regional', '0001096', '', 0, '', '1', '1'),
(1074, '6.05.03.06-8', 'Servi�os Comunit�rios', '0001097', '', 0, '', '1', '1'),
(1075, '6.05.03.07-6', 'Infra-Estruturas Urbanas e Regionais', '0001098', '', 0, '', '1', '1'),
(1076, '6.05.03.08-4', 'Transporte e Tr�fego Urbano e Regional', '0001099', '', 0, '', '1', '1'),
(1077, '6.05.03.09-2', 'Legisla��o Urbana e Regional', '0001100', '', 0, '', '1', '1'),
(1078, '6.05.00.00-0', 'Planejamento Urbano e Regional', '0001080', '', 1, '', '1', '1'),
(1079, '6.05.01.00-6', 'Fundamentos do Planejamento Urbano e Regional', '0001081', '', 0, '', '1', '1'),
(1080, '6.06.01.00-0', 'Distribui��o Espacial', '0001102', '', 0, '', '1', '1'),
(1081, '6.06.01.01-9', 'Distribui��o Espacial Geral', '0001103', '', 0, '', '1', '1'),
(1082, '6.06.01.02-7', 'Distribui��o Espacial Urbana', '0001104', '', 0, '', '1', '1'),
(1083, '6.06.01.03-5', 'Distribui��o Espacial Rural', '0001105', '', 0, '', '1', '1'),
(1084, '6.06.02.00-7', 'Tend�ncia Populacional', '0001106', '', 0, '', '1', '1'),
(1085, '6.06.02.01-5', 'Tend�ncias Passadas', '0001107', '', 0, '', '1', '1'),
(1086, '6.06.02.02-3', 'Taxas e Estimativas Correntes', '0001108', '', 0, '', '1', '1'),
(1087, '6.06.02.03-1', 'Proje��es', '0001109', '', 0, '', '1', '1'),
(1088, '6.06.03.00-3', 'Componentes da Din�mica Demogr�fica', '0001110', '', 0, '', '1', '1'),
(1089, '6.03.09.03-2', 'Renda e Tributa��o', '0001059', '', 1, '', '1', '1'),
(1090, '6.05.03.01-7', 'Administra��o Municipal e Urbana', '0001092', '', 1, '', '1', '1'),
(1091, '6.05.03.03-3', 'Aspectos Sociais do Planejamento Urbano e Regional', '0001094', '', 1, '', '1', '1'),
(1092, '6.06.03.01-1', 'Fecundidade', '0001111', '', 0, '', '1', '1'),
(1093, '6.06.03.02-0', 'Mortalidade', '0001112', '', 0, '', '1', '1'),
(1094, '6.06.03.03-8', 'Migra��o', '0001113', '', 0, '', '1', '1'),
(1095, '6.06.04.00-0', 'Nupcialidade e Fam�lia', '0001114', '', 0, '', '1', '1'),
(1096, '6.06.04.01-8', 'Casamento e Div�rcio', '0001115', '', 0, '', '1', '1'),
(1097, '6.06.04.02-6', 'Fam�lia e Reprodu��o', '0001116', '', 0, '', '1', '1'),
(1098, '6.06.05.00-6', 'Demografia Hist�rica', '0001117', '', 0, '', '1', '1'),
(1099, '6.06.05.01-4', 'Distribui��o Espacial', '0001118', '', 0, '', '1', '1'),
(1100, '6.06.05.02-2', 'Natalidade, Mortalidade, Migra��o', '0001119', '', 0, '', '1', '1'),
(1101, '6.06.05.04-9', 'M�todos e T�cnicas de Demografia Hist�rica', '0001121', '', 0, '', '1', '1'),
(1102, '6.06.06.00-2', 'Pol�tica P�blica e Popula��o', '0001122', '', 0, '', '1', '1'),
(1103, '6.06.06.01-0', 'Pol�tica Populacional', '0001123', '', 0, '', '1', '1'),
(1104, '6.06.00.00-4', 'Demografia', '0001101', '', 0, '', '1', '1'),
(1105, '6.09.02.00-0', 'Jornalismo e Editora��o', '0001142', '', 1, '', '1', '1'),
(1106, '6.09.01.00-4', 'Teoria da Comunica��o', '0001141', '', 0, '', '1', '1'),
(1107, '6.07.01.00-5', 'Teoria da Informa��o', '0001128', '', 0, '', '1', '1'),
(1108, '6.07.01.01-3', 'Teoria Geral da Informa��o', '0001129', '', 0, '', '1', '1'),
(1109, '6.07.01.02-1', 'Processos da Comunica��o', '0001130', '', 0, '', '1', '1'),
(1110, '6.07.01.03-0', 'Representa��o da Informa��o', '0001131', '', 0, '', '1', '1'),
(1111, '6.07.02.00-1', 'Biblioteconomia', '0001132', '', 0, '', '1', '1'),
(1112, '6.07.02.02-8', 'M�todos Quantitativos. Bibliometria', '0001134', '', 0, '', '1', '1'),
(1113, '6.07.02.03-6', 'T�cnicas de Recupera��o de Informa��o', '0001135', '', 0, '', '1', '1'),
(1114, '6.07.02.04-4', 'Processos de Dissemina��o da Informa��o', '0001136', '', 0, '', '1', '1'),
(1115, '6.07.03.00-8', 'Arquivologia', '0001137', '', 0, '', '1', '1'),
(1116, '6.07.03.01-6', 'Organiza��o de Arquivos', '0001138', '', 0, '', '1', '1'),
(1117, '6.08.00.00-3', 'Museologia', '0001139', '', 0, '', '1', '1'),
(1118, '6.11.00.00-5', 'Economia Dom�stica', '0001160', '', 0, '', '1', '1'),
(1119, '7.01.05.00-6', 'Epistemologia', '0001171', '', 1, '', '1', '1'),
(1120, '6.09.02.01-9', 'Teoria e �tica do Jornalismo', '0001143', '', 0, '', '1', '1'),
(1121, '6.09.02.02-7', 'Organiza��o Editorial de Jornais', '0001144', '', 0, '', '1', '1'),
(1122, '6.09.02.03-5', 'Organiza��o Comercial de Jornais', '0001145', '', 0, '', '1', '1'),
(1123, '6.09.02.04-3', 'Jornalismo Especializado (Comunit�rio, Rural, Empresarial, Cient�fico)', '0001146', '', 0, '', '1', '1'),
(1124, '6.09.03.00-7', 'R�dio e Televis�o', '0001147', '', 0, '', '1', '1'),
(1125, '6.09.03.01-5', 'Radiodifus�o', '0001148', '', 0, '', '1', '1'),
(1126, '6.09.03.02-3', 'Videodifus�o', '0001149', '', 0, '', '1', '1'),
(1127, '6.09.05.00-0', 'Comunica��o Visual', '0001151', '', 0, '', '1', '1'),
(1128, '6.10.02.00-3', 'Servi�o Social Aplicado', '0001154', '', 0, '', '1', '1'),
(1129, '6.10.02.01-1', 'Servi�o Social do Trabalho', '0001155', '', 0, '', '1', '1'),
(1130, '6.10.02.02-0', 'Servi�o Social da Educa��o', '0001156', '', 0, '', '1', '1'),
(1131, '6.10.02.03-8', 'Servi�o Social do Menor', '0001157', '', 0, '', '1', '1'),
(1132, '6.10.02.04-6', 'Servi�o Social da Sa�de', '0001158', '', 0, '', '1', '1'),
(1133, '6.10.02.05-4', 'Servi�o Social da Habita��o', '0001159', '', 0, '', '1', '1'),
(1134, '6.10.00.00-0', 'Servi�o Social', '0001152', '', 1, '', '1', '1'),
(1135, '6.12.00.00-0', 'Desenho Industrial', '0001161', '', 1, '', '1', '1'),
(1136, '6.13.00.00-4', 'Turismo', '0001164', '', 1, '', '1', '1'),
(1137, '6.12.01.00-6', 'Programa��o Visual', '0001162', '', 1, '', '1', '1'),
(1138, '6.12.02.00-2', 'Desenho de Produto', '0001163', '', 1, '', '1', '1'),
(1139, '7.01.06.00-2', 'Filosofia Brasileira', '0001172', '', 0, '', '1', '1'),
(1140, '7.01.00.00-4', 'Filosofia', '0001166', '', 1, '', '1', '1'),
(1141, '7.02.01.00-5', 'Fundamentos da Sociologia', '0001174', '', 0, '', '1', '1'),
(1142, '7.02.00.00-9', 'Sociologia', '0001173', '', 1, '', '1', '1'),
(1143, '6.06.06.03-7', 'Pol�ticas de Planejamento Familiar', '0001125', '', 0, '', '1', '1'),
(1144, '6.06.07.00-9', 'Fontes de Dados Demogr�ficos', '0001126', '', 0, '', '1', '1'),
(1145, '7.02.02.00-1', 'Sociologia do Conhecimento', '0001177', '', 0, '', '1', '1'),
(1146, '7.00.00.00-0', 'Ci�ncias Humanas', '0001165', '', 0, '', '1', '1'),
(1147, '7.02.05.00-0', 'Sociologia Rural', '0001180', '', 0, '', '1', '1'),
(1148, '7.02.06.00-7', 'Sociologia da Sa�de', '0001181', '', 0, '', '1', '1'),
(1149, '7.03.01.00-0', 'Teoria Antropol�gica', '0001184', '', 0, '', '1', '1'),
(1150, '7.03.02.00-6', 'Etnologia Ind�gena', '0001185', '', 0, '', '1', '1'),
(1151, '7.03.03.00-2', 'Antropologia Urbana', '0001186', '', 0, '', '1', '1'),
(1152, '7.03.04.00-9', 'Antropologia Rural', '0001187', '', 0, '', '1', '1'),
(1153, '7.03.05.00-5', 'Antropologia das Popula��es Afro-Brasileiras', '0001188', '', 0, '', '1', '1'),
(1154, '7.03.00.00-3', 'Antropologia', '0001183', '', 1, '', '1', '1'),
(1155, '7.04.01.00-4', 'Teoria e M�todo em Arqueologia', '0001190', '', 0, '', '1', '1'),
(1156, '7.04.02.00-0', 'Arqueologia Pr�-Hist�rica', '0001191', '', 0, '', '1', '1'),
(1157, '7.04.03.00-7', 'Arqueologia Hist�rica', '0001192', '', 0, '', '1', '1'),
(1158, '7.05.04.00-8', 'Hist�ria da Am�rica', '0001197', '', 0, '', '1', '1'),
(1159, '7.05.04.01-6', 'Hist�ria dos Estados Unidos', '0001198', '', 0, '', '1', '1'),
(1160, '7.05.04.02-4', 'Hist�ria Latino-Americana', '0001199', '', 0, '', '1', '1'),
(1161, '7.05.05.01-2', 'Hist�ria do Brasil Col�nia', '0001201', '', 0, '', '1', '1'),
(1162, '7.05.05.02-0', 'Hist�ria do Brasil Imp�rio', '0001202', '', 0, '', '1', '1'),
(1163, '7.05.05.04-7', 'Hist�ria Regional do Brasil', '0001204', '', 0, '', '1', '1'),
(1164, '7.05.06.00-0', 'Hist�ria das Ci�ncias', '0001205', '', 0, '', '1', '1'),
(1165, '7.05.00.00-2', 'Hist�ria', '0001193', '', 1, '', '1', '1'),
(1166, '7.06.01.00-3', 'Geografia Humana', '0001207', '', 0, '', '1', '1'),
(1167, '7.06.01.01-1', 'Geografia da Popula��o', '0001208', '', 0, '', '1', '1'),
(1168, '7.06.01.02-0', 'Geografia Agr�ria', '0001209', '', 0, '', '1', '1'),
(1169, '7.06.01.03-8', 'Geografia Urbana', '0001210', '', 0, '', '1', '1'),
(1170, '7.06.01.04-6', 'Geografia Econ�mica', '0001211', '', 0, '', '1', '1'),
(1171, '7.06.01.05-4', 'Geografia Pol�tica', '0001212', '', 0, '', '1', '1'),
(1172, '7.06.02.00-0', 'Geografia Regional', '0001213', '', 0, '', '1', '1'),
(1173, '7.06.02.01-8', 'Teoria do Desenvolvimento Regional', '0001214', '', 0, '', '1', '1'),
(1174, '7.06.02.02-6', 'Regionaliza��o', '0001215', '', 0, '', '1', '1'),
(1175, '7.06.02.03-4', 'An�lise Regional', '0001216', '', 0, '', '1', '1'),
(1176, '7.06.00.00-7', 'Geografia', '0001206', '', 1, '', '1', '1'),
(1177, '7.02.07.00-3', 'Outras Sociologias Espec�ficas', '0001182', '', 1, '', '1', '1'),
(1178, '7.05.01.00-9', 'Teoria e Filosofia da Hist�ria', '0001194', '', 1, '', '1', '1'),
(1179, '7.05.02.00-5', 'Hist�ria Antiga e Medieval', '0001195', '', 1, '', '1', '1'),
(1180, '7.05.03.00-1', 'Hist�ria Moderna e Contempor�nea', '0001196', '', 1, '', '1', '1'),
(1181, '7.05.05.00-4', 'Hist�ria do Brasil', '0001200', '', 1, '', '1', '1'),
(1182, '7.05.05.03-9', 'Hist�ria do Brasil Rep�blica', '0001203', '', 1, '', '1', '1'),
(1183, '7.07.01.01-6', 'Hist�ria, Teorias e Sistemas em Psicologia', '0001219', '', 1, '', '1', '1'),
(1184, 'X.X.X.X.A', 'Metaf�sica', '0001168', '', 0, '', '0', '1'),
(1185, '7.07.01.02-4', 'Metodologia, Instrumenta��o e Equipamento em Psicologia', '0001220', '', 0, '', '1', '1'),
(1186, '7.07.01.03-2', 'Constru��o e Validade de Testes, Escalas e Outras Medidas Psicol�gicas', '0001221', '', 0, '', '1', '1'),
(1187, '7.07.01.04-0', 'T�cnicas de Processamento Estat�stico, Matem�tico e Computacional em Psicologia', '0001222', '', 0, '', '1', '1'),
(1188, '7.07.02.01-2', 'Processos Perceptuais e Motores', '0001224', '', 0, '', '1', '1'),
(1189, '7.07.02.02-0', 'Processos de Aprendizagem, Mem�ria e Motiva��o', '0001225', '', 0, '', '1', '1'),
(1190, '7.07.00.00-1', 'Psicologia', '0001217', '', 1, '', '1', '1'),
(1191, '7.04.00.00-8', 'Arqueologia', '0001189', '', 0, '', '1', '1'),
(1192, '7.07.03.00-0', 'Psicologia Fisiol�gica', '0001228', '', 0, '', '1', '1'),
(1193, '7.07.03.02-7', 'Processos Psico-Fisiol�gicos', '0001230', '', 0, '', '1', '1'),
(1194, '7.07.03.03-5', 'Estimula��o El�trica e com Drogas (Comportamento)', '0001231', '', 0, '', '1', '1'),
(1195, '7.07.03.04-3', 'Psicobiologia', '0001232', '', 0, '', '1', '1'),
(1196, '7.07.04.00-7', 'Psicologia Comparativa', '0001233', '', 0, '', '1', '1'),
(1197, '7.07.04.01-5', 'Estudos Natural�sticos do Comportamento Animal', '0001234', '', 0, '', '1', '1'),
(1198, '7.07.04.02-3', 'Mecanismos Instintivos e Processos Sociais em Animais', '0001235', '', 0, '', '1', '1'),
(1199, '7.07.05.02-0', 'Processos Grupais e de Comunica��o', '0001238', '', 0, '', '1', '1'),
(1200, '7.07.05.03-8', 'Pap�is e Estruturas Sociais (Indiv�duo)', '0001239', '', 0, '', '1', '1'),
(1201, '7.07.06.00-0', 'Psicologia Cognitiva', '0001240', '', 0, '', '1', '1'),
(1202, '7.07.07.01-4', 'Processos Perceptuais e Cognitivos (Desenvolvimento)', '0001242', '', 0, '', '1', '1'),
(1203, '7.07.07.02-2', 'Desenvolvimento Social e da Personalidade', '0001243', '', 0, '', '1', '1'),
(1204, '7.07.08.00-2', 'Psicologia do Ensino e da Aprendizagem', '0001244', '', 0, '', '1', '1');
INSERT INTO `ajax_areadoconhecimento` (`id_aa`, `a_cnpq`, `a_descricao`, `a_codigo`, `a_geral`, `a_semic`, `a_ativo`, `a_submit`, `a_journal`) VALUES
(1205, '7.07.08.01-0', 'Planejamento Institucional', '0001245', '', 0, '', '1', '1'),
(1206, '7.07.08.02-9', 'Programa��o de Condi��es de Ensino', '0001246', '', 0, '', '1', '1'),
(1207, '7.07.08.03-7', 'Treinamento de Pessoal', '0001247', '', 0, '', '1', '1'),
(1208, '7.07.08.04-5', 'Aprendizagem e Desempenho Acad�micos', '0001248', '', 0, '', '1', '1'),
(1209, '7.07.08.05-3', 'Ensino e Aprendizagem na Sala de Aula', '0001249', '', 0, '', '1', '1'),
(1210, '7.07.09.00-9', 'Psicologia do Trabalho e Organizacional', '0001250', '', 0, '', '1', '1'),
(1211, '7.07.09.01-7', 'An�lise Institucional', '0001251', '', 0, '', '1', '1'),
(1212, '7.07.09.04-1', 'Fatores Humanos no Trabalho', '0001254', '', 0, '', '1', '1'),
(1213, '7.07.10.01-5', 'Interven��o Terap�utica', '0001257', '', 0, '', '1', '1'),
(1214, '7.07.10.02-3', 'Programas de Atendimento Comunit�rio', '0001258', '', 0, '', '1', '1'),
(1215, '7.07.10.03-1', 'Treinamento e Reabilita��o', '0001259', '', 0, '', '1', '1'),
(1216, '7.07.10.04-0', 'Desvios da Conduta', '0001260', '', 0, '', '1', '1'),
(1217, '7.07.10.05-8', 'Dist�rbios da Linguagem', '0001261', '', 0, '', '1', '1'),
(1218, '7.07.10.06-6', 'Dist�rbios Psicossom�ticos', '0001262', '', 0, '', '1', '1'),
(1219, '7.08.01.06-1', 'Psicologia Educacional', '0001270', '', 1, '', '1', '1'),
(1220, '7.08.01.00-2', 'Fundamentos da Educa��o', '0001264', '', 0, '', '1', '1'),
(1221, '7.08.01.01-0', 'Filosofia da Educa��o', '0001265', '', 0, '', '1', '1'),
(1222, '7.08.01.03-7', 'Sociologia da Educa��o', '0001267', '', 0, '', '1', '1'),
(1223, '7.08.01.04-5', 'Antropologia Educacional', '0001268', '', 0, '', '1', '1'),
(1224, '7.07.05.00-3', 'Psicologia Social', '0001236', '', 1, '', '1', '1'),
(1225, '7.07.05.01-1', 'Rela��es Interpessoais', '0001237', '', 1, '', '1', '1'),
(1226, '7.07.07.00-6', 'Psicologia do Desenvolvimento Humano', '0001241', '', 1, '', '1', '1'),
(1227, '7.07.09.02-5', 'Recrutamento e Sele��o de Pessoal', '0001252', '', 1, '', '1', '1'),
(1228, '7.07.09.03-3', 'Treinamento e Avalia��o', '0001253', '', 1, '', '1', '1'),
(1229, '7.07.09.05-0', 'Planejamento Ambiental e Comportamento Humano', '0001255', '', 1, '', '1', '1'),
(1230, '7.07.10.00-7', 'Tratamento e Preven��o Psicol�gica', '0001256', '', 1, '', '1', '1'),
(1231, '7.08.01.02-9', 'Hist�ria da Educa��o', '0001266', '', 1, '', '1', '1'),
(1232, '7.08.02.00-9', 'Administra��o Educacional', '0001271', '', 0, '', '1', '1'),
(1233, '7.08.02.01-7', 'Administra��o de Sistemas Educacionais', '0001272', '', 0, '', '1', '1'),
(1234, '7.08.02.02-5', 'Administra��o de Unidades Educativas', '0001273', '', 0, '', '1', '1'),
(1235, '7.08.03.00-5', 'Planejamento e Avalia��o Educacional', '0001274', '', 0, '', '1', '1'),
(1236, '7.08.03.01-3', 'Pol�tica Educacional', '0001275', '', 0, '', '1', '1'),
(1237, '7.08.03.02-1', 'Planejamento Educacional', '0001276', '', 0, '', '1', '1'),
(1238, '7.08.00.00-6', 'Educa��o', '0001263', '', 1, '', '1', '1'),
(1239, '7.09.01.00-7', 'Teoria Pol�tica', '0001298', '', 0, '', '1', '1'),
(1240, '7.09.01.01-5', 'Teoria Pol�tica Cl�ssica', '0001299', '', 0, '', '1', '1'),
(1241, '7.08.04.03-6', 'Tecnologia Educacional', '0001281', '', 0, '', '1', '1'),
(1242, '7.08.04.04-4', 'Avalia��o da Aprendizagem', '0001282', '', 0, '', '1', '1'),
(1243, '7.08.05.00-8', 'Curr�culo', '0001283', '', 0, '', '1', '1'),
(1244, '7.08.05.01-6', 'Teoria Geral de Planejamento e Desenvolvimento Curricular', '0001284', '', 0, '', '1', '1'),
(1245, '7.08.05.02-4', 'Curr�culos Espec�ficos para N�veis e Tipos de Educa��o', '0001285', '', 0, '', '1', '1'),
(1246, '7.08.06.00-4', 'Orienta��o e Aconselhamento', '0001286', '', 0, '', '1', '1'),
(1247, '7.08.06.01-2', 'Orienta��o Educacional', '0001287', '', 0, '', '1', '1'),
(1248, '7.08.06.02-0', 'Orienta��o Vocacional', '0001288', '', 0, '', '1', '1'),
(1249, '7.08.07.00-0', 'T�picos Espec�ficos de Educa��o', '0001289', '', 0, '', '1', '1'),
(1250, '7.08.07.01-9', 'Educa��o de Adultos', '0001290', '', 0, '', '1', '1'),
(1251, '7.08.07.02-7', 'Educa��o Permanente', '0001291', '', 0, '', '1', '1'),
(1252, '7.08.07.03-5', 'Educa��o Rural', '0001292', '', 0, '', '1', '1'),
(1253, '7.08.07.04-3', 'Educa��o em Periferias Urbanas', '0001293', '', 0, '', '1', '1'),
(1254, '7.08.07.05-1', 'Educa��o Especial', '0001294', '', 0, '', '1', '1'),
(1255, '7.08.07.06-0', 'Educa��o Pr�-Escolar', '0001295', '', 0, '', '1', '1'),
(1256, '7.08.07.07-8', 'Ensino Profissionalizante', '0001296', '', 0, '', '1', '1'),
(1257, '7.10.01.00-0', 'Hist�ria da Teologia', '0001325', '', 1, '', '1', '1'),
(1258, '7.09.01.02-3', 'Teoria Pol�tica Medieval', '0001300', '', 0, '', '1', '1'),
(1259, '7.09.01.03-1', 'Teoria Pol�tica Moderna', '0001301', '', 0, '', '1', '1'),
(1260, '7.09.01.04-0', 'Teoria Pol�tica Contempor�nea', '0001302', '', 0, '', '1', '1'),
(1261, '7.09.02.00-3', 'Estado e Governo', '0001303', '', 0, '', '1', '1'),
(1262, '7.09.02.01-1', 'Estrutura e Transforma��o do Estado', '0001304', '', 0, '', '1', '1'),
(1263, '7.09.02.02-0', 'Sistemas Governamentais Comparados', '0001305', '', 0, '', '1', '1'),
(1264, '7.09.02.03-8', 'Rela��es Intergovernamentais', '0001306', '', 0, '', '1', '1'),
(1265, '7.09.02.04-6', 'Estudos do Poder Local', '0001307', '', 0, '', '1', '1'),
(1266, '7.09.02.05-4', 'Institui��es Governamentais Espec�ficas', '0001308', '', 0, '', '1', '1'),
(1267, '7.09.03.00-0', 'Comportamento Pol�tico', '0001309', '', 0, '', '1', '1'),
(1268, '7.09.03.02-6', 'Atitude e Ideologias Pol�ticas', '0001311', '', 0, '', '1', '1'),
(1269, '7.09.03.03-4', 'Conflitos e Coaliz�es Pol�ticas', '0001312', '', 0, '', '1', '1'),
(1270, '7.09.03.04-2', 'Comportamento Legislativo', '0001313', '', 0, '', '1', '1'),
(1271, '7.09.03.05-0', 'Classes Sociais e Grupos de Interesse', '0001314', '', 0, '', '1', '1'),
(1272, '7.09.04.01-4', 'An�lise do Processo Decis�rio', '0001316', '', 0, '', '1', '1'),
(1273, '7.09.04.02-2', 'An�lise Institucional', '0001317', '', 0, '', '1', '1'),
(1274, '7.09.04.03-0', 'T�cnicas de Antecipa��o', '0001318', '', 0, '', '1', '1'),
(1275, '7.09.05.00-2', 'Pol�tica Internacional', '0001319', '', 0, '', '1', '1'),
(1276, '7.09.05.02-9', 'Organiza��es Internacionais', '0001321', '', 0, '', '1', '1'),
(1277, '7.09.05.03-7', 'Integra��o Internacional, Conflito, Guerra e Paz', '0001322', '', 0, '', '1', '1'),
(1278, '7.09.04.00-6', 'Pol�ticas P�blicas', '0001315', '', 1, '', '1', '1'),
(1279, '7.09.05.04-5', 'Rela��es Internacionais, Bilaterais e Multilaterais', '0001323', '', 0, '', '1', '1'),
(1280, '7.09.00.00-0', 'Ci�ncia Pol�tica', '0001297', '', 1, '', '1', '1'),
(1281, '7.10.00.00-3', 'Teologia', '0001324', '', 1, '', '1', '1'),
(1282, '7.08.04.01-0', 'Teorias da Instru��o', '0001279', '', 0, '', '1', '1'),
(1283, '8.01.02.00-0', 'Fisiologia da Linguagem', '0001332', '', 0, '', '1', '1'),
(1284, '8.01.03.00-6', 'Ling��stica Hist�rica', '0001333', '', 0, '', '1', '1'),
(1285, '8.01.04.00-2', 'Socioling��stica e Dialetologia', '0001334', '', 0, '', '1', '1'),
(1286, '8.01.05.00-9', 'Psicoling��stica', '0001335', '', 0, '', '1', '1'),
(1287, '8.01.00.00-7', 'Ling��stica', '0001330', '', 1, '', '1', '1'),
(1288, '8.02.01.00-8', 'L�ngua Portuguesa', '0001338', '', 0, '', '1', '1'),
(1289, '8.02.02.00-4', 'L�nguas Estrangeiras Modernas', '0001339', '', 0, '', '1', '1'),
(1290, '8.02.03.00-0', 'L�nguas Cl�ssicas', '0001340', '', 0, '', '1', '1'),
(1291, '8.02.04.00-7', 'L�nguas Ind�genas', '0001341', '', 0, '', '1', '1'),
(1292, '8.02.07.00-6', 'Outras Literaturas Vern�culas', '0001344', '', 0, '', '1', '1'),
(1293, '8.02.08.00-2', 'Literaturas Estrangeiras Modernas', '0001345', '', 0, '', '1', '1'),
(1294, '8.02.09.00-9', 'Literaturas Cl�ssicas', '0001346', '', 0, '', '1', '1'),
(1295, '8.02.10.00-7', 'Literatura Comparada', '0001347', '', 0, '', '1', '1'),
(1296, '8.02.00.00-1', 'Letras', '0001337', '', 1, '', '1', '1'),
(1297, 'X.XX.XX.XX.XX', 'neurologia', '0001387', '', 0, '0', '0', '1'),
(1298, '8.03.01.00-2', 'Fundamentos e Cr�tica das Artes', '0001349', '', 0, '', '1', '1'),
(1299, '8.03.01.01-0', 'Teoria da Arte', '0001350', '', 0, '', '1', '1'),
(1300, '8.03.01.03-7', 'Cr�tica da Arte', '0001352', '', 0, '', '1', '1'),
(1301, '8.03.02.00-9', 'Artes Pl�sticas', '0001353', '', 0, '', '1', '1'),
(1302, '8.03.02.01-7', 'Pintura', '0001354', '', 0, '', '1', '1'),
(1303, '8.03.02.02-5', 'Desenho', '0001355', '', 0, '', '1', '1'),
(1304, '8.03.02.03-3', 'Gravura', '0001356', '', 0, '', '1', '1'),
(1305, '8.03.02.04-1', 'Escultura', '0001357', '', 0, '', '1', '1'),
(1306, '8.03.02.06-8', 'Tecelagem', '0001359', '', 0, '', '1', '1'),
(1307, '8.03.03.01-3', 'Reg�ncia', '0001361', '', 0, '', '1', '1'),
(1308, '8.03.03.02-1', 'Instrumenta��o Musical', '0001362', '', 0, '', '1', '1'),
(1309, '8.03.03.03-0', 'Composi��o Musical', '0001363', '', 0, '', '1', '1'),
(1310, '8.03.03.04-8', 'Canto', '0001364', '', 0, '', '1', '1'),
(1311, '8.03.04.00-1', 'Dan�a', '0001365', '', 0, '', '1', '1'),
(1312, '8.03.04.02-8', 'Coreografia', '0001367', '', 0, '', '1', '1'),
(1313, '8.03.05.00-8', 'Teatro', '0001368', '', 0, '', '1', '1'),
(1314, '8.03.08.04-0', 'Interpreta��o Cinematogr�fica', '0001379', '', 0, '', '1', '1'),
(1315, '8.03.00.00-6', 'Artes', '0001348', '', 1, '', '1', '1'),
(1316, '2.02.00.00-X', 'Biotecnologia', '0001391', '', 1, '', '1', '1'),
(1317, '4.01.00.01-X', 'Pediatria', '0001424', '', 1, '', '1', '1'),
(1318, '4.00.00.02-X', 'T�cnologia em Sa�de', '0001425', '', 1, '', '1', '1'),
(1319, '7.10.03.00-2', 'Teologia Sistem�tica', '0001327', '', 1, '', '1', '1'),
(1320, '8.01.06.00-5', 'Ling��stica Aplicada', '0001336', '', 1, '', '1', '1'),
(1321, '8.02.05.00-3', 'Teoria Liter�ria', '0001342', '', 1, '', '1', '1'),
(1322, '8.02.06.00-0', 'Literatura Brasileira', '0001343', '', 1, '', '1', '1'),
(1323, '8.03.01.02-9', 'Hist�ria da Arte', '0001351', '', 1, '', '1', '1'),
(1324, '8.03.03.00-5', 'M�sica', '0001360', '', 1, '', '1', '1'),
(1325, '4.01.01.00-X', 'Gerontologia', '0001420', '', 0, '', '1', '1'),
(1326, '4.01.01.02-X', 'Dermatofuncional', '0001427', '', 1, '1', '1', '1'),
(1327, '4.02.11.00-X', 'Implantodontia', '0001384', '', 0, '', '1', '1'),
(1328, '6.01.04.01-X', 'Direito ambiental', '0001396', '', 1, '', '1', '1'),
(1329, '4.02.14.00-X', 'Patologia Bucal', '0001393', '', 0, '', '1', '1'),
(1330, '4.06.00.01-X', 'Sa�de do Idoso', '0001421', '', 0, '', '1', '1'),
(1331, '4.06.03.00-X', 'Sa�de Ambiental', '0001394', '', 0, '', '1', '1'),
(1332, '9.05.00.00-X', 'Meio Ambiente e Sustentabilidade', '0001407', '', 0, '', '0', '1'),
(1333, '9.03.00.00-X', 'Energia', '0001405', '', 1, '', '1', '1'),
(1334, '4.06.06.00-X', 'Sa�de da Mulher', '0001419', '', 0, '', '1', '1'),
(1335, 'X2.00.00.00-X', 'Biologia Teste', '0001426', '', 0, '', '0', '1'),
(1336, '1.03.02.02-6', 'Modelos Anal�ticos e de Simula��o', '0000144', '', 0, '', '0', '1'),
(1337, '1.03.03.01-4', 'Linguagens de Programa��o', '0000146', '', 0, '', '0', '1'),
(1338, '1.03.03.03-0', 'Banco de Dados', '0000148', '', 0, '', '0', '1'),
(1339, '1.03.04.03-7', 'Software B�sico', '0000154', '', 0, '', '1', '1'),
(1340, '1.03.04.04-5', 'Teleinform�tica', '0000155', '', 0, '', '1', '1'),
(1341, '1.02.02.00-5', 'Estat�stica', '0000126', '', 1, '', '1', '1'),
(1342, '1.02.02.08-0', 'An�lise de Dados', '0000134', '', 1, '', '1', '1'),
(1343, '1.06.01.05-8', 'Qu�mica dos Produtos Naturais', '0000239', '', 1, '', '1', '1'),
(1344, '2.05.02.00-1', 'Ecologia de Ecossistemas', '0000372', '', 1, '', '1', '1'),
(1345, '2.10.06.00-8', 'Etnofarmacologia', '0000415', '', 1, '', '1', '1'),
(1346, '3.01.03.03-7', 'Mec�nicas dos Solos', '0000453', '', 1, '', '1', '1'),
(1347, '9.02.00.00-X', 'Sa�de', '0001404', '', 1, '', '1', '1'),
(1348, '3.03.03.06-0', 'Tratamento T�rmicos, Mec�nicos e Qu�micos', '0000491', '', 1, '', '1', '1'),
(1349, '3.04.03.03-0', 'Circuitos Eletr�nicos', '0000521', '', 1, '', '1', '1'),
(1350, '3.06.02.01-7', 'Reatores Qu�micos', '0000574', '', 1, '', '1', '1'),
(1351, '6.01.04.03-X', 'Direito Eleitoral', '0001470', '', 1, '', '1', '1'),
(1352, '6.01.04.04-X', 'Direito do Consumidor', '0001469', '', 1, '', '1', '1'),
(1353, '6.01.04.05-X', 'Direito Urban�stico', '0001468', '', 1, '', '1', '1'),
(1354, '6.01.02.08-1', 'Direito Econ�mico', '', '', 0, '', '1', '1'),
(1355, '6.01.02.09-1', 'Direito Financeiro', '', '', 0, '', '0', '1'),
(1356, '5.01.01.05-6', 'Fertilidade do Solo e Aduba��o', '0000828', '', 1, '', '1', '1'),
(1357, '3.07.04.05-7', 'Controle da Polui��o', '0000626', '', 1, '', '1', '1'),
(1358, '3.12.05.04-6', 'Motores Alternativos', '0000726', '', 1, '', '1', '1'),
(1359, '4.01.01.15-0', 'Ginecologia e Obstetr�cia', '0000762', '', 1, '', '1', '1'),
(1360, '4.01.02.13-0', 'Anestesiologia', '0000779', '', 1, '', '1', '1'),
(1361, '4.06.05.00-X', 'Sa�de do trabalhador', '0001395', '', 1, '', '1', '1'),
(1362, '4.08.00.01-X', 'Fisioterapia Desportiva', '0001423', '', 1, '', '1', '1'),
(1363, '5.02.04.00-9', 'Tecnologia e Utiliza��o de Produtos Florestais', '0000870', '', 1, '', '1', '1'),
(1364, '5.05.03.00-6', 'Patologia Animal', '0000933', '', 1, '', '1', '1'),
(1365, '6.01.01.07-5', 'Sociologia Jur�dica', '0000987', '', 1, '', '1', '1'),
(1366, '6.02.01.00-2', 'Administra��o de Empresas', '0001004', '', 1, '', '1', '1'),
(1367, 'X.X.X.X.X.X', 'Engenharia de Software', '0000147', '', 0, '', '0', '1'),
(1368, 'XXXXAA', 'XAXA', '0001467', '', 0, '', '0', '0'),
(1369, 'X.A.X.A.Q', 'Hidroterapia', '0001422', '', 0, '', '0', '1'),
(1370, '6.03.09.01-6', 'Economia Regional', '0001057', '', 1, '', '1', '1'),
(1371, '6.06.05.03-0', 'Nupcialidade e Fam�lia', '0001120', '', 1, '', '1', '1'),
(1372, '7.02.04.00-4', 'Sociologia Urbana', '0001179', '', 1, '', '1', '1'),
(1373, '7.07.02.00-4', 'Psicologia Experimental', '0001223', '', 1, '', '1', '1'),
(1374, '7.08.07.08-X', 'Educa��o Ambiental', '0001402', '', 1, '', '1', '1'),
(1375, '7.09.03.01-8', 'Estudos Eleitorais e Partidos Pol�ticos', '0001310', '', 1, '', '1', '1'),
(1376, '7.10.02.00-6', 'Teologia Moral', '0001326', '', 1, '', '1', '1'),
(1377, '8.03.04.01-0', 'Execu��o da Dan�a', '0001366', '', 1, '', '1', '1'),
(1378, '4.08.00.03-X', 'Metodologia Cient�fica', '', '', 1, '', '1', '1'),
(1379, '4.09.00.00-2', 'Educa��o F�sica', '0000820', '', 1, '', '1', '1'),
(1380, '4.01.07.00-1', 'Neuropediatria', '', '', 1, '', '1', '1'),
(1381, '6.00.00.00-7', 'Ci�ncias Sociais Aplicadas', '0000978', '', 0, '', '1', '1'),
(1382, '0.00.00.00-0', '::SEM AREA DEFINIDA::', '0001418', '', 1, '', '1', '1'),
(1383, '9.20.00.00-X', 'Direitos Humanos - Programa Ci�ncia e Transcend�ncia', '', '', 1, '', '1', ''),
(1384, 'X.X.X.V.X.A', 'Astrof�sica Estelar', '0001447', '', 0, '', '0', '1'),
(1385, 'X.A.X.A.X', 'L�gica', '0001169', '', 0, '', '0', '1'),
(1386, 'X.A.A.Q', 'Direito Registral e Notarial', '', '', 0, '', '0', '1'),
(1387, 'X.X.Q.A.Q', 'XAXA', '', '', 0, '', '0', '0'),
(1388, 'XXQQW', 'QWQWQ', '', '', 0, '', '0', '0');

-- --------------------------------------------------------

--
-- Estrutura da tabela `campus`
--

CREATE TABLE IF NOT EXISTS "campus" (
  "id_c" int(11) unsigned NOT NULL,
  "c_campus" varchar(60) DEFAULT NULL,
  "c_cidade" varchar(60) DEFAULT NULL,
  "c_ativo" tinyint(1) unsigned DEFAULT '1'
);

-- --------------------------------------------------------

--
-- Estrutura da tabela `centro_resultado`
--

CREATE TABLE IF NOT EXISTS "centro_resultado" (
  "id_cr" bigint(20) unsigned NOT NULL,
  "cr_nr" int(11) NOT NULL,
  "cr_descricao" varchar(200) NOT NULL,
  "cr_ordenador_necessidade" char(8) NOT NULL,
  "cr_ordenador_gasto" char(8) NOT NULL,
  "cr_ativo" tinyint(4) NOT NULL DEFAULT '1'
);

--
-- Extraindo dados da tabela `centro_resultado`
--

INSERT INTO `centro_resultado` (`id_cr`, `cr_nr`, `cr_descricao`, `cr_ordenador_necessidade`, `cr_ordenador_gasto`, `cr_ativo`) VALUES
(299, 0, 'CR A ASSOCIAR', '', '', 1),
(300, 1, 'Administra��o da Gradua��o em Pedagogia - Curitiba', '', '', 1),
(301, 64, 'Administra��o da Gradua��o em Odontologia - Curiti', '', '', 1),
(302, 407, 'Engenharia Mec�nica', '', '', 1),
(303, 408, 'Inform�tica Aplicada', '', '', 1),
(304, 415, 'Administra��o', '', '', 1),
(305, 418, 'Engenharia de Produ��o e Sistemas', '', '', 1),
(306, 814, 'Gest�o Urbana', '', '', 1),
(307, 2050, 'GRADUA��O - CWB - INATIVOS - ESCOLA POLIT�CNICA', '', '', 1),
(308, 2192, 'GRADUA��O - SJP - INATIVOS - ESCOLA DE CI�NC. AGR.', '', '', 1),
(309, 2420, 'Administra��o da Gradua��o em Agronomia - Toledo', '', '', 1),
(310, 3498, 'Administra��o da Gradua��o em Biologia - Curitiba', '', '', 1),
(311, 3507, 'Administra��o da Gradua��o em Enfermagem - Curitib', '', '', 1),
(312, 3541, 'Administra��o da Gradua��o em Medicina - Curitiba', '', '', 1),
(313, 3557, 'Administra��o da Gradua��o em Odontologia - Curiti', '', '', 1),
(314, 3795, 'Administra��o da Gradua��o em Engenharia Ambiental', '', '', 1),
(315, 3803, 'Administra��o da Gradua��o em Engenharia Civil Cur', '', '', 1),
(316, 3811, 'Administra��o da Gradua��o em Engenharia de Alimen', '', '', 1),
(317, 3820, 'Administra��o da Gradua��o em Engenharia de Comput', '', '', 1),
(318, 3838, 'Administra��o da Gradua��o em Engenharia de Produ�', '', '', 1),
(319, 3852, 'Administra��o da Gradua��o em Engenharia El�trica', '', '', 1),
(320, 3860, 'Administra��o da Gradua��o em Engenharia Mec�nica', '', '', 1),
(321, 4076, 'GRADUA��O - CWB - INATIVOS - ESCOLA DE COMUNICA��O', '', '', 1),
(322, 4093, 'Administra��o da Gradua��o em Direito Curitiba', '', '', 1),
(323, 4572, 'Administra��o da Gradua��o em Administra��o - SJP', '', '', 1),
(324, 4588, 'Administra��o da Gradua��o em Ci�ncias Cont�beis -', '', '', 1),
(325, 4753, 'Administra��o da Gradua��o em Medicina Veterin�ria', '', '', 1),
(326, 6452, 'Lab. de Controle de Polui��o - BL III PQ TEC', '', '', 1),
(327, 6453, 'Lab. de Simula��o T�rmica - CCET', '', '', 1),
(328, 6454, 'Lab. de Sistemas T�rmicos - CCET', '', '', 1),
(329, 6828, 'Central de Processamento de Dados - PPGIA', '', '', 1),
(330, 6833, 'Lab. de Comuta��o - BL II PQ TEC', '', '', 1),
(331, 6836, 'Lab. de Engenharia de Reabilita��o - LER', '', '', 1),
(332, 6838, 'Lab. de Inform�tica em Sa�de - LAIS - BL II PQ TEC', '', '', 1),
(333, 6840, 'Lab. de Redes I - BL II PQ TEC', '', '', 1),
(334, 6841, 'Lab. de Sistemas Distribu�dos - LASID', '', '', 1),
(335, 6844, 'Lab. de Transmiss�o - REMAV - BL II PQ TEC', '', '', 1),
(336, 6851, 'Lab.s de An�lises Ambientais - BL III PQ TEC', '', '', 1),
(337, 6870, 'Lab. de Metalografia - BL III PQ TEC', '', '', 1),
(338, 6875, 'Lab. de Estruturas - BL III PQ TEC', '', '', 1),
(339, 6880, 'Lab. de Termodin�mica Aplicada - BL III PQ TEC', '', '', 1),
(340, 6881, 'Lab. de Topografia - BL III PQ TEC', '', '', 1),
(341, 6883, 'Lab. de Usinagem - LAUS - BL III PQ TEC', '', '', 1),
(342, 6885, 'LAS II - Lab Grupo Pesq de Sist Autom Integrados', '', '', 1),
(343, 6924, 'Lab. de Farmacologia - CCBS', '', '', 1),
(344, 6925, 'Lab. de Fisiologia Animal - CCBS', '', '', 1),
(345, 6927, 'Lab. de Fisiologia Vegetal e Gen�tica - CCBS', '', '', 1),
(346, 6928, 'Lab. de Bioqu�mica - CCBS', '', '', 1),
(347, 6933, 'Lab. de Tecnologia Farmac�utica - CCBS', '', '', 1),
(348, 6935, 'Lab. de Farmacot�cnica - CCBS', '', '', 1),
(349, 6955, 'N�cleo de C�lulas Humanas Prod. de Insulina - CCBS', '', '', 1),
(350, 6956, 'Lab. de Engenharia e Transplante Celular', '', '', 1),
(351, 6966, 'Lab. Bio-Inform�tica - CCAA', '', '', 1),
(352, 7052, 'LAS VIII - Lab. de Controle de Processos', '', '', 1),
(353, 7065, 'N�cleo de Cardiomioplastia Celular - BL IV PQ TEC', '', '', 1),
(354, 7069, 'N�cleo de Enxertos Cardiovasculares - BL IV PQ TEC', '', '', 1),
(355, 7073, 'N�cleo de Imunogen�tica - BL IV PQ TEC', '', '', 1),
(356, 7118, 'Adm. Stricto Sensu - CWB - Escola de Neg�cios', '', '', 1),
(357, 7119, 'Adm. Lato Sensu - CWB - Escola de Sa�de e Bioci�nc', '', '', 1),
(358, 7122, 'Adm. Stricto Sensu - CWB - Escola de Medicina', '', '', 1),
(359, 7128, 'Adm. Stricto Sensu - CWB - Escola Polit�cnica', '', '', 1),
(360, 7158, 'Adm. Stricto Sensu - CWB - Escola de Educa��o e Hu', '', '', 1),
(361, 7298, 'Laborat�rio de Usabilidade - BL IV PQ TEC', '', '', 1),
(362, 8785, 'Odontologia', '', '', 1),
(363, 9027, 'Engenharia Mec�nica', '', '', 1),
(364, 9264, 'Educa��o', '', '', 1),
(365, 9928, 'Gest�o Urbana', '', '', 1),
(366, 10000, 'Engenharia de Produ��o e Sistemas', '', '', 1),
(367, 10222, 'Laborat�rio de An�lises - Eng� Ambiental - BL III', '', '', 1),
(368, 10528, 'Adm do Bloco I do Parque Tecnol�gico', '', '', 1),
(369, 20100, 'Adm. da Escola de Sa�de e Bioci�ncias - CWB', '', '', 1),
(370, 20200, 'Adm. da Escola Polit�cnica - CWB', '', '', 1),
(371, 20220, 'Lab. de Modelos - CCET', '', '', 1),
(372, 20234, 'Administra��o do Bloco III do Parque Tecnol�gico', '', '', 1),
(373, 20237, 'Administra��o do Bloco II do Parque Tecnol�gico', '', '', 1),
(374, 20300, 'Adm. da Escola de Direito - CWB', '', '', 1),
(375, 20314, 'Lab. de Comunica��o', '', '', 1),
(376, 20400, 'Adm. da Escola de Educa��o e Humanidades - CWB', '', '', 1),
(377, 20500, 'Adm. da Escola da Neg�cios - CWB', '', '', 1),
(378, 20725, 'Hospital Veterin�rio -CCAA', '', '', 1),
(379, 20728, 'Unidade Hosp. Animais de Fazenda (UHAF) - CCAA', '', '', 1),
(380, 20800, 'Administra��o do Campus SJP', '', '', 1),
(381, 20813, 'Lab. de Biologia Molecular (Genoma) - CCAA', '', '', 1),
(382, 28821, 'Laborat�rio de An�lises de Solos - Presta��o de Se', '', '', 1),
(383, 28822, 'Setor de Piscicultura', '', '', 1),
(384, 40103, 'Cl�nica de Psicologia - CCBS', '', '', 1),
(385, 40104, 'N�cleo de Pr�ticas Jur�dicas - NPJ - CCJS', '', '', 1),
(386, 40105, 'N�cleo de Pr�ticas Jur�dicas - NPJ - CCSA SJP', '', '', 1),
(387, 41302, 'CR A ASSOCIAR', '', '', 1),
(388, 41700, 'Cl�nica de Fisioterapia e Reabilita��o - CCBS', '', '', 1),
(389, 41801, 'Cl�nica Odontol�gica - CCBS', '', '', 1),
(390, 50108, 'Lab.s de Apoio - CCAA', '', '', 1),
(391, 70204, 'Lab. de Apoio - CCJE', '', '', 1),
(392, 70305, 'Lab. de Avalia��o Nutricional - CCAS', '', '', 1),
(393, 100059, 'CR A ASSOCIAR', '', '', 1),
(394, 101026, 'Compras AS', '', '', 1),
(395, 101063, 'Setor de Capta��o de Recursos e Projetos AS', '', '', 1),
(396, 101079, 'Pr�dio Gin�sio', '', '', 1),
(397, 101086, 'Hotelaria APC - HUC', '', '', 1),
(398, 101102, 'Conv�nios Educa��o', '', '', 1),
(399, 101108, 'CR A ASSOCIAR', '', '', 1),
(400, 101111, 'Conv�nios Educa��o', '', '', 1),
(401, 101122, 'Conv�nios Educa��o', '', '', 1),
(402, 101136, 'CR A ASSOCIAR', '', '', 1),
(403, 101139, 'CR A ASSOCIAR', '', '', 1),
(404, 101143, 'CR A ASSOCIAR', '', '', 1),
(405, 101156, 'CR A ASSOCIAR', '', '', 1),
(406, 101162, 'CR A ASSOCIAR', '', '', 1),
(407, 101163, 'CR A ASSOCIAR', '', '', 1),
(408, 101164, 'CR A ASSOCIAR', '', '', 1),
(409, 101167, 'Despesas Mantenedora', '', '', 1),
(410, 101174, 'Administra��o da Diretoria de Neg�cios Suplementar', '', '', 1),
(411, 101177, 'Adm. Diretoria Financeira', '', '', 1),
(412, 101184, 'CR A ASSOCIAR', '', '', 1),
(413, 101185, 'CR A ASSOCIAR', '', '', 1),
(414, 101188, 'Setor de Planejamento de Neg�cios', '', '', 1),
(415, 101193, 'CR A ASSOCIAR', '', '', 1),
(416, 101194, 'CR A ASSOCIAR', '', '', 1),
(417, 101195, 'CR A ASSOCIAR', '', '', 1),
(418, 101198, 'Setor de Contabilidade', '', '', 1),
(419, 101205, 'Setor de Finan�as', '', '', 1),
(420, 101210, 'Controladoria', '', '', 1),
(421, 101216, 'Administra��o da Diretoria de Gest�o de Pessoas', '', '', 1),
(422, 101225, 'N�cleo do Refeit�rio Campus Curitiba', '', '', 1),
(423, 101231, 'Administra��o da Diretoria de Tecnologia', '', '', 1),
(424, 101268, 'N�cleo de Compras', '', '', 1),
(425, 101269, 'N�cleo de Almoxarifado', '', '', 1),
(426, 101276, 'N�cleo Seguran�a e Contr Tr�fego - APC - Curitiba', '', '', 1),
(427, 101287, 'Centro de Compet�ncia T�cnica', '', '', 1),
(428, 101311, 'N�cleo NTE', '', '', 1),
(429, 101313, 'Administra��o do Setor de Esportes', '', '', 1),
(430, 101329, 'Resid�ncia Marista PUC', '', '', 1),
(431, 101331, 'Superintend�ncia Executiva', '', '', 1),
(432, 101333, 'Assessoria Jur�dica', '', '', 1),
(433, 101335, 'Diretoria de Marketing - APC', '', '', 1),
(434, 101344, 'Setor de Tecnologia', '', '', 1),
(435, 101367, 'N�cleo de Transportes', '', '', 1),
(436, 101377, 'Ger�ncia de Medicina Ocupacional - APC', '', '', 1),
(437, 101395, 'CR A ASSOCIAR', '', '', 1),
(438, 101405, 'Setor de Infraestrutura', '', '', 1),
(439, 101417, 'Ger�ncia BP Sa�de', '', '', 1),
(440, 101441, 'CR A ASSOCIAR', '', '', 1),
(441, 101450, 'CR A ASSOCIAR', '', '', 1),
(442, 101451, 'CR A ASSOCIAR', '', '', 1),
(443, 101452, 'CR A ASSOCIAR', '', '', 1),
(444, 101453, 'CR A ASSOCIAR', '', '', 1),
(445, 101469, 'CR A ASSOCIAR', '', '', 1),
(446, 101470, 'CR A ASSOCIAR', '', '', 1),
(447, 101471, 'Conv�nios Educa��o', '', '', 1),
(448, 101476, 'CR A ASSOCIAR', '', '', 1),
(449, 101481, 'CR A ASSOCIAR', '', '', 1),
(450, 101482, 'CR A ASSOCIAR', '', '', 1),
(451, 101483, 'CR A ASSOCIAR', '', '', 1),
(452, 101487, 'Conv�nios Educa��o', '', '', 1),
(453, 101488, 'CR A ASSOCIAR', '', '', 1),
(454, 101490, 'CR A ASSOCIAR', '', '', 1),
(455, 101491, 'CR A ASSOCIAR', '', '', 1),
(456, 101492, 'CR A ASSOCIAR', '', '', 1),
(457, 101521, 'CR A ASSOCIAR', '', '', 1),
(458, 101522, 'Assessoria de Rela��es Institucionais', '', '', 1),
(459, 101526, 'Conv�nio APC Educa��o Infantil - 18.892', '', '', 1),
(460, 101527, 'CR A ASSOCIAR', '', '', 1),
(461, 101530, 'Setor de Governan�a', '', '', 1),
(462, 101531, 'CR A ASSOCIAR', '', '', 1),
(463, 101533, 'Conv�nios Educa��o', '', '', 1),
(464, 101534, 'CR A ASSOCIAR', '', '', 1),
(465, 101539, 'CR A ASSOCIAR', '', '', 1),
(466, 101544, 'CR A ASSOCIAR', '', '', 1),
(467, 101558, 'CR A ASSOCIAR', '', '', 1),
(468, 101559, 'CR A ASSOCIAR', '', '', 1),
(469, 101562, 'CR A ASSOCIAR', '', '', 1),
(470, 101571, 'Conv�nios Educa��o', '', '', 1),
(471, 101598, 'CR A ASSOCIAR', '', '', 1),
(472, 101601, 'Setor de Contratos e Conv�nios', '', '', 1),
(473, 101603, 'CR A ASSOCIAR', '', '', 1),
(474, 101610, 'Conv�nios Educa��o', '', '', 1),
(475, 101612, 'CR A ASSOCIAR', '', '', 1),
(476, 101613, 'CR A ASSOCIAR', '', '', 1),
(477, 101617, 'Conv�nios Educa��o', '', '', 1),
(478, 101621, 'Gabinete da Presid�ncia', '', '', 1),
(479, 101622, 'Gest�o de Bens Patrimoniais APC', '', '', 1),
(480, 101625, 'Centro de Compet�ncia T�cnica', '', '', 1),
(481, 101652, 'Centro de Compet�ncia T�cnica', '', '', 1),
(482, 101665, 'Centro de Compet�ncia T�cnica', '', '', 1),
(483, 101684, 'CR A ASSOCIAR', '', '', 1),
(484, 101692, 'CR A ASSOCIAR', '', '', 1),
(485, 101695, 'CR A ASSOCIAR', '', '', 1),
(486, 101699, 'Conv�nios Educa��o', '', '', 1),
(487, 101717, 'Gabinete da Diretoria HUC', '', '', 1),
(488, 101718, 'CR A ASSOCIAR', '', '', 1),
(489, 101837, 'CR A ASSOCIAR', '', '', 1),
(490, 101839, 'Conv�nios Educa��o', '', '', 1),
(491, 101841, 'Conv�nios Educa��o', '', '', 1),
(492, 101847, 'Conv�nios Educa��o', '', '', 1),
(493, 101848, 'Conv�nios Educa��o', '', '', 1),
(494, 101856, 'CR A ASSOCIAR', '', '', 1),
(495, 101882, 'Conv�nio HUC', '', '', 1),
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
(509, 102012, 'Nutri��o HUC', '', '', 1),
(510, 102023, 'Secretaria Acad�mica HUC', '', '', 1),
(511, 102030, 'Pronto Socorro HUC', '', '', 1),
(512, 102036, 'Centro Cir�rgico HUC', '', '', 1),
(513, 102040, 'Equipe de Terapia Intensiva HUC', '', '', 1),
(514, 102041, 'Unidade de Terapia Intensiva 1 HUC', '', '', 1),
(515, 102042, 'Unidade de Terapia Intensiva 2 HUC', '', '', 1),
(516, 102045, 'Equipe de Unidades de Interna��o HUC', '', '', 1),
(517, 102048, 'Unidade de Interna��o 3 HUC', '', '', 1),
(518, 102049, 'Unidade de Interna��o 4 HUC', '', '', 1),
(519, 102053, 'Unidade de Interna��o 8 HUC', '', '', 1),
(520, 102058, 'Gerencia Administrativa HUC', '', '', 1),
(521, 102059, 'Laborat�rio de An�lises Cl�nicas HUC', '', '', 1),
(522, 102060, 'Laborat�rio de Imunogen�tica HUC', '', '', 1),
(523, 102061, 'Servi�o de Radiologia Convencional HUC', '', '', 1),
(524, 102064, 'Servi�o de Tomografia HUC', '', '', 1),
(525, 102090, 'Centro de Atendimento M�dico', '', '', 1),
(526, 102093, 'N�cleo de Epidemiologia e Controle de Infec��o Hos', '', '', 1),
(527, 102101, 'Ger�ncia de Enfermagem HUC', '', '', 1),
(528, 102102, 'Unidade de Terapia Intensiva 4 HUC', '', '', 1),
(529, 102108, 'Unidade de Interna��o 6 HUC', '', '', 1),
(530, 102116, 'Setor de faturamento HUC', '', '', 1),
(531, 102117, 'Ambulat�rio HUC', '', '', 1),
(532, 102373, 'Pr�dio do Hospital Universit�rio Cajuru', '', '', 1),
(533, 102380, 'Resid�ncia M�dica HUC', '', '', 1),
(534, 103051, 'Diretoria de Suporte Operacional e Acad�mico', '', '', 1),
(535, 103054, 'Relacionamento', '', '', 1),
(536, 103099, 'Projetos Tecnoparque', '', '', 1),
(537, 103101, 'Pr�dio Acad�mico', '', '', 1),
(538, 103246, 'Administra��o da Reitoria', '', '', 1),
(539, 103247, 'Administra��o da PUCPR Campus Curitiba', '', '', 1),
(540, 103250, 'Adm da Pr�-Reitoria de Gradua��o', '', '', 1),
(541, 103251, 'Adm da Pr�-Reitoria Adm. e de Desenvolvimento', '', '', 1),
(542, 103252, 'N�cleo de Processos Seletivos', '', '', 1),
(543, 103266, 'Biblioteca Central', '', '', 1),
(544, 103268, 'Administra��o da Diretoria de Educa��o a Dist�ncia', '', '', 1),
(545, 103269, 'N�cleo PUC WEB', '', '', 1),
(546, 103275, 'N�cleo da Pastoral', '', '', 1),
(547, 103278, 'N�cleo do Museu e Memoriais', '', '', 1),
(548, 103280, 'N�cleo do Coral', '', '', 1),
(549, 103284, 'Cl�nica de Nutri��o - CCBS', '', '', 1),
(550, 103309, 'N�cleo do Fundo de Pesquisa', '', '', 1),
(551, 103321, 'Pr�dio Humanas', '', '', 1),
(552, 103324, 'Bloco III Parque Tecnol�gico', '', '', 1),
(553, 103361, 'Pr�dio Cl�nicas Rockfeller', '', '', 1),
(554, 103421, 'Lab. de Inform�tica - Desenvolvimento - Curitiba', '', '', 1),
(555, 103422, 'Lab. de Inform�tica - Biom�dico - Curitiba', '', '', 1),
(556, 103423, 'Lab. de Inform�tica C�lculo - Curitiba', '', '', 1),
(557, 103424, 'Lab. de Inform�tica - Gr�fico - Curitiba', '', '', 1),
(558, 103433, 'Lab. de Apoio - Eng. El�trica - BL II PQ TEC', '', '', 1),
(559, 103510, 'Administra��o da Diretoria de P�s-Gradua��o Strict', '', '', 1),
(560, 103538, 'N�cleos Curitiba', '', '', 1),
(561, 103636, 'Pr�dio Simula��o Cl�nica - HNSL', '', '', 1),
(562, 103638, 'Laborat�rio Multiusu�rios - Curitiba', '', '', 1),
(563, 103699, 'Projeto Apple', '', '', 1),
(564, 104014, 'SIGA - SJP', '', '', 1),
(565, 104083, 'Administra��o do Campus SJP', '', '', 1),
(566, 104084, 'Administra��o da Diretoria de Infraestrutura', '', '', 1),
(567, 104088, 'Almoxarifado - SJPinhais', '', '', 1),
(568, 104090, 'NIAA - SJP', '', '', 1),
(569, 104096, 'Biblioteca - SJP', '', '', 1),
(570, 105013, 'SIGA - Londrina', '', '', 1),
(571, 105085, 'Administra��o da Fazenda Gralha Azul', '', '', 1),
(572, 105089, 'Agricultura - Fazenda', '', '', 1),
(573, 105099, 'Dire��o', '', '', 1),
(574, 105115, 'Administra��o do Setor Industrial', '', '', 1),
(575, 105125, 'Administra��o da L�men', '', '', 1),
(576, 105128, 'Rede Vida', '', '', 1),
(577, 105133, 'Biblioteca - Londrina', '', '', 1),
(578, 105137, 'Administra��o do Campus - Toledo', '', '', 1),
(579, 105143, 'Hospital Veterin�rio Campus Toledo - CCTP', '', '', 1),
(580, 105148, 'Administra��o da Farm�cia Universit�ria', '', '', 1),
(581, 105150, 'Administra��o do Campus Maring�', '', '', 1),
(582, 105189, 'Gest�o de Bens Patrimoniais APC', '', '', 1),
(583, 105190, 'Administrativo', '', '', 1),
(584, 105192, 'N�cleo Comunit�rio de Guaratuba', '', '', 1),
(585, 105193, 'Administrativo', '', '', 1),
(586, 105194, 'N�cleo Comunit�rio de S�o Jos� dos Pinhais', '', '', 1),
(587, 105197, 'SIGA - Maring�', '', '', 1),
(588, 105271, 'Pr�dio Laborat�rios Londrina', '', '', 1),
(589, 108001, 'Projeto M�dia Complexidade', '', '', 1),
(590, 123019, 'Pr�dio do Hospital Marcelino Champagnat', '', '', 1),
(591, 123034, 'Recep��o CD 2 HMC', '', '', 1),
(592, 123049, 'Servi�o de Hemodin�mica HMC', '', '', 1),
(593, 123059, 'Posto de Enfermagem 1 HMC', '', '', 1),
(594, 123063, 'Posto de Enfermagem 5 HMC', '', '', 1),
(595, 103300, 'Diretoria de Pesquisa', '70004750', '70004750', 1),
(596, 103507, 'Adminstra��o da Pr�-Reitoria', '88890586', '88890586', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `csf`
--

CREATE TABLE IF NOT EXISTS "csf" (
  "id_csf" bigint(20) unsigned NOT NULL,
  "csf_aluno" int(11) NOT NULL DEFAULT '0',
  "csf_orientador" int(11) NOT NULL DEFAULT '0',
  "csf_modalidade" int(11) NOT NULL,
  "csf_saida" date NOT NULL DEFAULT '0000-00-00',
  "csf_saida_previsao" date NOT NULL DEFAULT '0000-00-00',
  "csf_retorno" date NOT NULL DEFAULT '0000-00-00',
  "csf_retorno_previsao" date NOT NULL DEFAULT '0000-00-00',
  "csf_pa_intercambio" text NOT NULL,
  "csf_pais" varchar(3) NOT NULL DEFAULT '0',
  "csf_universidade" int(11) NOT NULL DEFAULT '0',
  "csf_status" int(11) NOT NULL DEFAULT '0',
  "csf_obs" text NOT NULL,
  "csf_area" int(11) NOT NULL DEFAULT '0',
  "csf_curso" int(11) NOT NULL DEFAULT '0',
  "csf_chamada" int(11) NOT NULL DEFAULT '0',
  "csf_parceiro" int(11) NOT NULL DEFAULT '1'
);

--
-- Extraindo dados da tabela `csf`
--

INSERT INTO `csf` (`id_csf`, `csf_aluno`, `csf_orientador`, `csf_modalidade`, `csf_saida`, `csf_saida_previsao`, `csf_retorno`, `csf_retorno_previsao`, `csf_pa_intercambio`, `csf_pais`, `csf_universidade`, `csf_status`, `csf_obs`, `csf_area`, `csf_curso`, `csf_chamada`, `csf_parceiro`) VALUES
(3, 4, 0, 0, '0000-00-00', '2015-06-01', '0000-00-00', '0000-00-00', '0', 'DEU', 0, 1, '', 0, 0, 0, 0),
(4, 5, 0, 0, '0000-00-00', '2015-06-01', '0000-00-00', '0000-00-00', '0', 'DEU', 0, 1, '', 0, 0, 0, 0),
(5, 3, 0, 0, '0000-00-00', '2015-06-01', '0000-00-00', '0000-00-00', '0', 'DEU', 0, 1, '', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `csf_ged`
--

CREATE TABLE IF NOT EXISTS "csf_ged" (
  "id_doc" bigint(20) unsigned NOT NULL,
  "doc_dd0" int(7) DEFAULT NULL,
  "doc_tipo" char(5) DEFAULT NULL,
  "doc_ano" char(4) DEFAULT NULL,
  "doc_filename" text,
  "doc_status" char(1) DEFAULT NULL,
  "doc_data" int(11) DEFAULT NULL,
  "doc_hora" char(8) DEFAULT NULL,
  "doc_arquivo" text,
  "doc_extensao" char(4) DEFAULT NULL,
  "doc_size" float DEFAULT NULL,
  "doc_versao" char(4) DEFAULT NULL,
  "doc_ativo" int(11) DEFAULT NULL
);

--
-- Extraindo dados da tabela `csf_ged`
--

INSERT INTO `csf_ged` (`id_doc`, `doc_dd0`, `doc_tipo`, `doc_ano`, `doc_filename`, `doc_status`, `doc_data`, `doc_hora`, `doc_arquivo`, `doc_extensao`, `doc_size`, `doc_versao`, `doc_ativo`) VALUES
(1, 7, 'DIVER', '2015', 'ic por campus.docx', '@', 20150618, '10:18:17', '_document/2015/06/-9cde0-ic por campus.docx', 'docx', 24682, '0', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `csf_ged_tipo`
--

CREATE TABLE IF NOT EXISTS "csf_ged_tipo" (
  "id_doct" bigint(20) unsigned NOT NULL,
  "doct_nome" char(50) DEFAULT NULL,
  "doct_codigo" char(5) DEFAULT NULL,
  "doct_publico" int(11) DEFAULT NULL,
  "doct_avaliador" int(11) DEFAULT NULL,
  "doct_autor" int(11) DEFAULT NULL,
  "doct_restrito" int(11) DEFAULT NULL,
  "doct_ativo" int(11) DEFAULT NULL
);

--
-- Extraindo dados da tabela `csf_ged_tipo`
--

INSERT INTO `csf_ged_tipo` (`id_doct`, `doct_nome`, `doct_codigo`, `doct_publico`, `doct_avaliador`, `doct_autor`, `doct_restrito`, `doct_ativo`) VALUES
(1, 'Documentos diversos', 'DIVER', 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `csf_historico`
--

CREATE TABLE IF NOT EXISTS "csf_historico" (
  "id_slog" bigint(20) unsigned NOT NULL,
  "slog_protocolo" int(7) NOT NULL,
  "slog_usuario" varchar(15) NOT NULL,
  "slog_status" int(11) NOT NULL,
  "slog_data" date NOT NULL DEFAULT '0000-00-00',
  "slog_hora" char(8) NOT NULL,
  "slog_text" text NOT NULL
);

--
-- Extraindo dados da tabela `csf_historico`
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
-- Estrutura da tabela `csf_parceiro`
--

CREATE TABLE IF NOT EXISTS "csf_parceiro" (
  "id_cp" bigint(20) unsigned NOT NULL,
  "cp_descricao" char(80) NOT NULL,
  "cp_pais" varchar(3) NOT NULL DEFAULT '0',
  "cp_ativo" tinyint(4) NOT NULL DEFAULT '1',
  "cp_contato" text NOT NULL,
  "cp_email_1" char(80) NOT NULL,
  "cp_email_2" char(80) NOT NULL,
  "cp_phone_1" char(20) NOT NULL,
  "cp_phone_2" char(20) NOT NULL,
  "cp_site" char(250) NOT NULL
);

--
-- Extraindo dados da tabela `csf_parceiro`
--

INSERT INTO `csf_parceiro` (`id_cp`, `cp_descricao`, `cp_pais`, `cp_ativo`, `cp_contato`, `cp_email_1`, `cp_email_2`, `cp_phone_1`, `cp_phone_2`, `cp_site`) VALUES
(1, 'Alemanha/DAAD', '5', 1, '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `csf_status`
--

CREATE TABLE IF NOT EXISTS "csf_status" (
  "id_cs" bigint(20) unsigned NOT NULL,
  "cs_descricao" char(80) NOT NULL,
  "cs_ativo" tinyint(4) NOT NULL DEFAULT '1',
  "cs_contabiliza" tinyint(4) NOT NULL DEFAULT '1'
);

--
-- Extraindo dados da tabela `csf_status`
--

INSERT INTO `csf_status` (`id_cs`, `cs_descricao`, `cs_ativo`, `cs_contabiliza`) VALUES
(1, 'Em homologa��o', 1, 0),
(2, 'Homologado pela Institui��o', 1, 0),
(3, 'Homologado pela CAPES/CNPq', 1, 0),
(4, 'Aceito pela Parceira', 1, 2),
(5, 'Em Interc�mbio', 1, 1),
(6, 'Intercambio Finalizado', 1, 3),
(7, 'Retorno Antecipado', 1, 3),
(8, 'Cancelado - Desistente', 1, 0),
(9, 'N�o homologado pela institui��o', 1, 0),
(10, 'N�o homologado pela CAPES/CNPq', 1, 0),
(11, 'Cancelado - Erro de Registro', 1, 0),
(12, 'Cadastrado - Aguardando resultado', 1, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `dgp`
--

CREATE TABLE IF NOT EXISTS "dgp" (
  "id_dgp" bigint(20) unsigned NOT NULL,
  "dgp_link" char(100) NOT NULL,
  "dgp_nome" char(100) NOT NULL,
  "dgp_instituicao" char(7) NOT NULL,
  "dgp_lastupdate" int(11) NOT NULL,
  "dgp_status" char(1) NOT NULL
);

--
-- Extraindo dados da tabela `dgp`
--

INSERT INTO `dgp` (`id_dgp`, `dgp_link`, `dgp_nome`, `dgp_instituicao`, `dgp_lastupdate`, `dgp_status`) VALUES
(1, 'http://dgp.cnpq.br/dgp/espelhogrupo/9734870278687868', 'ESTUDOS M�TRICOS EM INFORMA��O', '', 0, '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `dgp_cache`
--

CREATE TABLE IF NOT EXISTS "dgp_cache" (
  "id_dgpc" bigint(20) unsigned NOT NULL,
  "dgpc_link" char(250) NOT NULL,
  "dgpc_content" longtext NOT NULL,
  "dgpc_data" date NOT NULL DEFAULT '0000-00-00',
  "dgpc_status" varchar(1) NOT NULL,
  "dgpc_xml" longtext NOT NULL
);

-- --------------------------------------------------------

--
-- Estrutura da tabela `escola`
--

CREATE TABLE IF NOT EXISTS "escola" (
  "id_es" int(11) unsigned NOT NULL,
  "es_escola" varchar(60) DEFAULT NULL,
  "es_ativo" tinyint(1) unsigned DEFAULT NULL
);

-- --------------------------------------------------------

--
-- Estrutura da tabela `fomento_agencia`
--

CREATE TABLE IF NOT EXISTS "fomento_agencia" (
  "id_agf" bigint(20) NOT NULL,
  "agf_codigo" char(5) NOT NULL,
  "agf_nome" char(100) NOT NULL,
  "agf_sigla" char(20) NOT NULL,
  "agf_ativo" int(4) NOT NULL,
  "agf_cidade" char(5) NOT NULL,
  "agf_estado" char(5) NOT NULL,
  "agf_pais" char(5) NOT NULL,
  "agf_descricao" text,
  "agf_ordem" int(4) DEFAULT NULL,
  "agf_imagem" char(100) DEFAULT NULL
);

--
-- Extraindo dados da tabela `fomento_agencia`
--

INSERT INTO `fomento_agencia` (`id_agf`, `agf_codigo`, `agf_nome`, `agf_sigla`, `agf_ativo`, `agf_cidade`, `agf_estado`, `agf_pais`, `agf_descricao`, `agf_ordem`, `agf_imagem`) VALUES
(2, '00002', 'Funda��o Arauc�ria', 'FA', 1, '', '', '', '', 3, 'http://www.peiexparana.com.br/site/uploads/noticias/1007933287158dd4a94a60fec24271e4.jpg'),
(3, '00003', 'Secretaria da Ci�ncia, Tecnologia e Ensino Superior (SETI)', 'SETI-PR', 1, '', '', '', '', 1, 'http://www.pr.gov.br/logos/logo_governo_119x103.png'),
(4, '00004', 'Secretaria da Sa�de (PR) - SESA', 'SESA', 1, '', '', '', '', 1, ''),
(5, '00005', 'CNPq', 'CNPq', 1, '', '', '', '', 1, 'http://www.inf.ufrgs.br/cei/img/LogoCNPq.jpg'),
(6, '00006', 'CNPq/DECIT', 'CNPq/DECIT', 0, '', '', '', '', 1, ''),
(7, '00007', 'CAPES - Coordena��o de Aperfei�oamento de Pessoal de N�vel Superior', 'CAPES', 1, '', '', '', '', 2, 'http://www2.pucpr.br/reol/img/logo_pdi_capes.png'),
(8, '00008', 'XXXXX', 'XXXXX', 0, '', '', '', '', 1, ''),
(9, '00009', 'Minist�rio da Ci�ncia e Tecnologia (MCTI)', 'MCTI', 1, '', '', '', '', 1, ''),
(10, '00010', 'Centro Social Champagnat (PUCPR)', 'PUCPR', 1, '', '', '', '', 20, ''),
(11, '00011', 'FINEP - Financiadora de Estudos e Projetos', 'FINEP', 1, '', '', '', '', 1, ''),
(12, '00012', 'Neodent � Implante Ostointegr�vel', 'Neodent', 1, '', '', '', '', 1, ''),
(13, '00013', '(CANCELADO)', '', 0, '', '', '', '', 1, ''),
(14, '00014', 'Eletrobras', 'Eletrobras', 0, '', '', '', '', 5, ''),
(15, '00015', 'Neo-ortho Implantes', 'Neo-ortho', 1, '', '', '', '', 1, ''),
(16, '00016', 'Empresa', 'Empresa', 1, '', '', '', '', 1, ''),
(17, '00017', 'Outras Agencias Governamentais', 'AG', 1, '', '', '', '', 1, ''),
(18, '00018', 'PUCPR', 'PUCPR', 1, '', '', '', '', 1, ''),
(19, '00019', 'Organiza��o Panamericana de Sa�de', 'OPAS', 1, '', '', '', '', 1, ''),
(20, '00020', 'FINEP - (INATIVO)', 'XXFINEP', 0, '', '', '', '', 1, ''),
(21, '00021', 'Banco Nacional do Desenvolvimento', 'BNDES', 1, '', '', '', '', 10, 'http://www.bndes.gov.br/SiteBNDES/bndes/imagens/bndes_facebook.jpg'),
(22, '00022', 'Org�o Governamental', 'OG', 2, '', '', '', '', 5, ''),
(23, '00023', 'Org�o Governamental (Internacional)', 'OGI', 2, '', '', '', '', 5, ''),
(24, '00024', 'Empresa', 'EMP', 2, '', '', '', '', 7, ''),
(25, '00025', 'Empresa Internacional', 'EMPI', 2, '', '', '', '', 7, ''),
(26, '00026', 'Ag�ncia de Fomento Nacional', 'OF', 2, '', '', '', '', 3, ''),
(27, '00027', 'Ag�ncia de Fomento Internacional', 'OFI', 2, '', '', '', '', 3, ''),
(28, '00028', ':: Selecione tipo de capta��o ::', ':::::', 1, '', '', '', '', 1, ''),
(30, '00030', 'ISS Tecnol�gico - Ag�ncia Curitiba S/A', 'ISS Tecnol�gico', 1, '', '', '', '', 1, ''),
(31, '00031', 'Equipment Leasing and Finance Foundation', '', 1, '', '', '', '', 1, ''),
(32, '00032', 'Lee Kuan Yew Water Prize', 'Lee Kuan Yew Water P', 1, '', '', '', '', 41, 'http://www.siww.com.sg/sites/default/files/Lee_Kuan_Yew_Water_Prize_2016.jpg'),
(33, '00033', 'Funda��o Grupo Botic�rio', 'Funda��o Grupo Botic', 1, '', '', '', '', 49, 'http://goo.gl/XEFuWo'),
(34, '00034', 'Japan International Cooperation Agency', 'JICA', 1, '', '', '', '', 99, 'http://www.ghananewsagency.org/assets/images/JICA%20Logo.gif'),
(35, '00035', 'Government of Canada', 'Government of Canada', 1, '', '', '', '', 1, 'http://www.ppforum.ca/sites/default/files/government-of-canada_0.gif?1328899731'),
(36, '00036', 'Pr�mio Finep', '', 1, '', '', '', '', 1, 'http://premio.finep.gov.br/templates/premio/images/logo_premio_15_anos2d.png'),
(37, '00037', 'Abril Comunica��es S/A', 'Abril', 1, '', '', '', '', 82, 'http://bluebus.s3.amazonaws.com/wp-content/uploads/2013/06/abril-logo.png'),
(38, '00038', 'Ci�ncia sem Fronteiras', 'CsF', 1, '', '', '', '', 46, 'http://www.e-dublin.com.br/wp-content/uploads/2014/04/ci%C3%AAncia-sem-fronteiras.jpg'),
(39, '00039', 'SENAI', 'SENAI', 1, '', '', '', '', 46, 'http://aprendizjovem.com/wp-content/uploads/2014/02/iel_fiep_jovemaprendiz.jpg'),
(40, '00040', 'Eletrobras', 'Eletrobras', 1, '', '', '', '', 49, 'http://www.extranet.eletrobras.com/sites/wikis2/pgc/SiteAssets/marca-eletrobras-facebook.jpg'),
(41, '00041', 'PR�MIO DE INCENTIVO EM CI�NCIA E TECNOLOGIA PARA O SUS', 'PR�MIO DE INCENTIVO', 1, '', '', '', '', 1, 'http://blog.grancursosonline.com.br/wp-content/uploads/2014/07/MSAUDE.gif'),
(42, '00042', 'QS', 'QS', 1, '', '', '', '', 1, 'http://www2.pucpr.br/reol/img/logo_qs.png'),
(43, '00043', 'Portal da Sa�de - SUS', '', 1, '', '', '', '', 1, 'http://www.sbp.com.br/img/portal_da_saude.JPG'),
(44, '00044', 'Santander Universidades', '', 1, '', '', '', '', 52, 'http://www.uneb.br/asseci/files/2013/09/santander-universidaDES.jpg'),
(45, '00045', 'Funda��o Parque Tecnol�gico Itaipu', 'FPTI', 1, '', '', '', '', 45, 'http://www.apeam.com.br/wp-content/uploads/2014/05/FPTI.jpg'),
(46, '00046', 'American Society of Tropical Medicine and Hygiene', 'ASTMH', 1, '', '', '', '', 48, 'https://lh5.googleusercontent.com/-kb4aX-by3Vg/AAAAAAAAAAI/AAAAAAAAAAA/pGMDPXVPlCs/photo.jpg'),
(47, '00047', 'Research Councils UK', 'RCUK', 1, '', '', '', '', 70, 'http://www.podium.ac.uk/assets/images/resize/showcase/1082.jpg'),
(48, '00048', 'Newton Fund', 'Newton Fund', 1, '', '', '', '', 79, 'http://goo.gl/2PSt03'),
(49, '00049', 'Chevening scholarships UK', 'Chevening', 1, '', '', '', '', 90, 'http://www.chevening.org/images/logo.png'),
(50, '00050', 'Renault experience', 'Renault', 1, '', '', '', '', 1, 'http://www.unicap.br/assecom1/wp-content/uploads/2013/09/LogoRenaultExperience.jpg'),
(51, '00051', 'energy globe awards', 'energy globe', 1, '', '', '', '', 62, 'http://energy-floors.com/media/userfiles/images/energy_0.jpg'),
(52, '00052', 'Grand Challenges Canada', '', 1, '', '', '', '', 1, 'http://fractalup.com/images/P_A/canada.png'),
(53, '00053', 'PUC Jovens Ideias', 'Jovens Ideias', 1, '', '', '', '', 1, 'http://www.pucpr.br/arquivosUpload/5388495391409845844.png'),
(54, '00054', 'University of Cambridge', 'Cambridge', 1, '', '', '', '', 1, 'http://www.aslanidou.gr/sites/default/files/images/news/240.jpg'),
(55, '00055', 'Programa Mulher e Ci�ncia', '', 1, '', '', '', '', 1, 'http://agencia.fapesp.br/agencia-novo/imagens/noticia/10381.jpg'),
(56, '00056', 'CANAL_PUC1', 'CANAL', 1, '', '', '', '', 1, 'https://morpheus.pucpr.br/morpheus2/www.pucpr.br/albumFt/892898511414077322.png'),
(57, '00057', 'Bill & Melinda Gates Foundation', 'Bill & Melinda Gates', 1, '', '', '', '', 32, 'http://www.bond.org.uk/data/jobs/1357/bill-and-melinda-gates-foundation_logo_0.png'),
(58, '00058', 'National Institutes of Health', 'NIH', 1, '', '', '', '', 39, 'http://upload.wikimedia.org/wikipedia/commons/c/c8/NIH_Master_Logo_Vertical_2Color.png'),
(59, '00059', 'Renault', 'RN', 1, '', '', '', '', 1, 'http://upload.wikimedia.org/wikipedia/commons/thumb/4/49/Renault_2009_logo.svg/2000px-Renault_2009_l'),
(60, '00060', 'NESTA UK', 'NESTA', 1, '', '', '', '', 1, 'http://media.tumblr.com/b974e096db2570ea3bf38775c24b21d9/tumblr_inline_mp9672wThE1qz4rgp.jpg'),
(61, '00061', 'IIASA', 'IIASA', 1, '', '', '', '', 1, 'http://goo.gl/ZJ3M3w'),
(62, '00062', 'Horizon 2020', 'eu', 1, '', '', '', '', 1, 'http://research.ie/sites/default/files/horizon2020.jpg'),
(63, '00063', 'Austrian Agency for International Cooperation in Education and Research', 'OeAD-GmbH', 1, '', '', '', '', 32, 'http://spcdn.amizoalimited.netdna-cdn.com/wp-content/uploads/2013/01/OeAD1.jpg'),
(64, '00064', 'ETH Zurich', 'ETH', 1, '', '', '', '', 37, 'http://www.climate-kic.org/wp-content/uploads/2013/09/eth-2.jpg'),
(65, '00065', 'Inova Talentos - IEL/CNPq', 'Inova Talentos', 1, '', '', '', '', 51, 'http://www.fucapi.br/educacao/files/2014/02/inova_121.jpg'),
(66, '00066', 'Campus France', 'Campus France', 1, '', '', '', '', 56, 'http://www.afjoaopessoa.com.br/wp-content/uploads/2013/06/logo_campusFrance.jpg'),
(67, '00067', 'Academie de Recherche et D�Enseignement Sup�rieur', 'ARES', 1, '', '', '', '', 40, 'http://www.educaid.be/sites/default/files/images/logo_ares_quare_200px.jpg'),
(68, '00068', 'Nestle shared Value', 'Nestle shared Value', 1, '', '', '', '', 41, 'http://www.photos.apo-opa.com/plog-content/images/apo/logos/nestle.jpg'),
(69, '00069', '�cole Normal Sup�rieure', 'ENS', 1, '', '', '', '', 43, 'http://www.gradprog.biologie.ens.fr/bones/images/logo_ens.png'),
(70, '00070', 'USAID', 'USAID', 1, '', '', '', '', 48, 'http://upload.wikimedia.org/wikipedia/commons/8/84/USAID-Logo.svg'),
(71, '00071', 'IPEA', 'IPEA', 1, '', '', '', '', 54, 'http://blogrubensmenin.com.br/wp-content/uploads/2013/12/IPEA-Logo.jpg'),
(72, '00072', 'Tinker Foundation Incorporated', 'TFI', 1, '', '', '', '', 44, 'http://www.tinker.org/sites/default/themes/tinker_theme/logo.png'),
(73, '00073', 'International Development Research Centre', 'IDRC', 1, '', '', '', '', 50, 'http://ecocimati.org/lionfish/wp-content/uploads/2014/11/IDRC-logo2.png'),
(74, '00074', 'Hewlett Foundation', 'Hewlett Foundation', 1, '', '', '', '', 33, 'http://upload.wikimedia.org/wikipedia/en/b/b0/Hewlett_Foundation_logo.png'),
(75, '00075', 'Leverhulme Trust', 'Leverhulme Trust', 1, '', '', '', '', 70, 'http://www2.warwick.ac.uk/fac/soc/pais/research/gcrp/leverhulme-trust-logo1.jpg'),
(76, '00076', 'DAAD', 'DAAD', 1, '', '', '', '', 33, 'http://www.squeaker.net/1387893642/image/paragraph/daad_logo.png'),
(77, '00077', 'Masdar Institute', 'Masdar Institute', 1, '', '', '', '', 72, 'http://cdn6.triplepundit.com/wp-content/uploads/2014/10/masdar-institute-logo.png'),
(78, '00078', 'iBrasil/Erasmus Mundus', 'iBrasil', 1, '', '', '', '', 54, 'http://www.ibrasilmundus.eu/images/logo.gif'),
(79, '00079', 'University of Birmingham', 'University of Birmin', 1, '', '', '', '', 41, 'http://www.ranklogos.com/wp-content/uploads/2012/06/university-of-birmingham.jpg'),
(80, '00080', 'TWAS', 'TWAS', 1, '', '', '', '', 40, 'http://goo.gl/hSa1Yo'),
(81, '00081', 'Fundaci�n Carolina', 'fc', 1, '', '', '', '', 1, 'http://www.aecid.org.ni/wp-content/uploads/2013/04/fundacion_carolina.jpg'),
(82, '00082', 'PASEM', 'PASEM', 1, '', '', '', '', 40, 'http://espectadornegocios.com/media/xcore//90374_1412852360_logo-a-en-alta.jpg'),
(83, '00083', 'Pr�mio Pemberton', 'Pr�mio Pemberton', 1, '', '', '', '', 62, 'http://www.sorocabarefrescos.com.br/upload/noticias/thumb/85HFBI7h482aZf4.jpg'),
(84, '00084', 'Waitt Foundation', 'Waitt Foundation', 1, '', '', '', '', 1, 'http://waittinstitute.org/wp-content/uploads/2014/07/waitt_foundation_logo.jpg'),
(85, '00085', 'EU-LAC', 'EU-LAC', 1, '', '', '', '', 53, 'https://pbs.twimg.com/profile_images/2339866026/Logo_EU_LAC_small_400x400.jpg'),
(86, '00086', 'University of Nottingham', 'University of Nottin', 1, '', '', '', '', 49, 'http://hope-for-children.org/wp-content/uploads/logo_university_nottingham.jpg'),
(87, '00087', 'VLIR-UOS', 'VLIR-UOS', 1, '', '', '', '', 52, 'http://youthvillage.co.za/wp-content/uploads/2014/02/Vlir-uos-150x150.jpg'),
(88, '00088', 'Embrapa', 'Embrapa', 1, '', '', '', '', 63, 'http://grao.cnpms.embrapa.br//img/layout/rodape_embrapa_grao.png'),
(89, '00089', 'Fulbright', 'Fulbright', 1, '', '', '', '', 40, 'http://www.niutoday.info/wp-content/uploads/2013/05/fulbright-logo.jpg'),
(90, '00090', 'Mitacs', 'Mitacs', 1, '', '', '', '', 29, 'http://goo.gl/rfLJdI'),
(91, '00091', 'ICESP', 'ICESP', 1, '', '', '', '', 61, 'http://spa.fotolog.com/photo/26/60/89/carolinasalema/1228692939664_f.jpg'),
(92, '00092', 'Universidad de la Rioja', 'Universidad de la Ri', 1, '', '', '', '', 38, 'http://www.losrestosdelconcierto.com/wp-content/uploads/2013/03/Logo_UR_VCP.jpg'),
(93, '00093', 'Grand Challenges - Saving lives at birth', 'Saving lives at birt', 1, '', '', '', '', 41, 'http://healthmarketinnovations.org/sites/default/files/Saving-Lives-at-Birth.gif'),
(94, '00094', 'Grand Challenges - All Children reading', 'All Children reading', 1, '', '', '', '', 49, 'http://www.dukesead.org/uploads/1/8/4/2/18429695/8117690.jpg'),
(95, '00095', 'Wageningen University', 'Wageningen Universit', 1, '', '', '', '', 51, 'http://goo.gl/AWtwyc'),
(96, '00096', 'The World Bank', 'The World Bank', 1, '', '', '', '', 55, 'http://hdwallpapers360.com/wp-content/uploads/2014/03/The-World-Bank-logo.png'),
(97, '00097', 'For Women in Science', 'For Women in Science', 1, '', '', '', '', 34, 'https://www.unesco-ihe.org/sites/default/files/loreal-unesco_for_women_in_science_0.jpg'),
(98, '00098', 'New Zealand Aid Programme', 'New Zealand Aid Prog', 1, '', '', '', '', 1, 'http://www.vsa.org.nz/themes/vsa-responsive/images/nz_aid-mfat.jpg'),
(99, '00099', 'Universit� Paris-Saclay', '', 1, '', '', '', '', 1, 'https://www.universite-paris-saclay.fr/sites/default/files/logo_0.png'),
(100, '00100', 'Pr�mio de Projetos Inovadores', '7p', 1, '', '', '', '', 1, 'https://morpheus.pucpr.br/morpheus2/www.pucpr.br/albumFt/892901011427905499.png'),
(101, '00101', 'Minist�rio da Sa�de', 'Minist�rio da Sa�de', 1, '', '', '', '', 42, 'http://blog.grancursosonline.com.br/wp-content/uploads/2014/07/MSAUDE.gif'),
(102, '00102', 'AULP', 'AULP', 1, '', '', '', '', 39, 'http://aulp.org/sites/all/themes/AULP/Imagens/AULP_LogoPrincipal.PNG'),
(103, '00103', 'Funda��o Bunge', 'Funda��o Bunge', 1, '', '', '', '', 42, 'http://www.gife.org.br/imagens/empresas/logotipos/133/Funda%C3%A7%C3%A3oBunge1.jpg'),
(104, '00104', 'B-BICE+', 'B-BICE+', 1, '', '', '', '', 54, 'http://anprotec.org.br/site/wp-content/uploads/2014/06/bbice-270x160.jpg'),
(105, '00105', 'Belgian Science Policy Office (BELSPO)', 'BELSPO', 1, '', '', '', '', 42, 'https://ghum.kuleuven.be/ggs/images/logo/belspo-logo-en.jpg'),
(106, '00106', 'UNESCO', 'UNESCO', 1, '', '', '', '', 41, 'http://upload.wikimedia.org/wikipedia/commons/b/bc/UNESCO_logo.svg'),
(107, '00107', 'Finnish Ministry of Education and Culture', 'Finnish Ministry of', 1, '', '', '', '', 42, 'http://goo.gl/kdc4e8'),
(108, '00108', 'Humboldt Foundation', 'Humboldt Foundation', 1, '', '', '', '', 44, 'http://www.americanfriends-of-avh.org/media/AvH_Logo_n7_Word_rgb2.jpg'),
(109, '00109', 'Humanitarian Innovation Fund', 'Humanitarian Innovat', 1, '', '', '', '', 30, 'http://developmentdiaries.com/wp-content/uploads/2013/10/hif_logo_highres_1.png'),
(110, '00110', 'Funda��o BB', 'Funda��o BB', 1, '', '', '', '', 30, 'http://goo.gl/2eD4FS'),
(111, '00111', 'Barcelona GSE', 'Barcelona GSE', 1, '', '', '', '', 43, 'http://www.barcelonagse.eu/img/barcelonagselogo.png'),
(112, '00112', 'The Andrew W. Mellon Foundation', 'The Andrew W. Mellon', 1, '', '', '', '', 43, 'http://humwork.uchri.org/wp-content/uploads/2014/12/Mellon-Logo-Square-1748x984.jpg'),
(113, '00113', 'Belmont Forum', 'Belmont Forum', 1, '', '', '', '', 55, 'http://delta.umn.edu/sites/delta.umn.edu/files/Belmont_Forum_logo.png'),
(114, '00114', 'Endeavour Scholarships', 'Endeavour', 1, '', '', '', '', 52, 'http://goo.gl/dsnhig'),
(115, '00115', 'AMEXCID', 'AMEXCID', 1, '', '', '', '', 29, 'http://embamex.sre.gob.mx/paisesbajos/components/com_fpss/images/logo_amexcid.jpg'),
(116, '00116', 'Ministry of Education, Culture, Sports, Science and Technology of Japan', 'MEXT', 1, '', '', '', '', 1, 'http://www.jetaabc.ca/wp-content/uploads/2013/04/13_04_11-MEXT-290x290.jpg'),
(117, '00117', 'Google', 'Google', 1, '', '', '', '', 40, 'http://tudodownloads.uol.com.br/upload/imagens_upload/Google.jpg'),
(118, '00118', 'Ambafrance', 'Ambafrance', 1, '', '', '', '', 34, 'http://www.ambafrance-pt.org/IMG/arton2914.jpg?1421142662'),
(119, '00119', 'InBev-Baillet Latour', 'InBev-Baillet Latour', 1, '', '', '', '', 59, 'http://www.kikirpa.be/uploads/files/images2/image001_400.jpg'),
(120, '00120', 'BID - Banco Interamericano de Desenvolvimento', 'BID', 1, '', '', '', '', 74, 'http://orendaenergy.com/wp-content/uploads/2015/05/logo-english-33612.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `fomento_categoria`
--

CREATE TABLE IF NOT EXISTS "fomento_categoria" (
  "id_ct" int(11) unsigned NOT NULL,
  "ct_descricao" varchar(60) DEFAULT NULL,
  "ct_main" char(1) DEFAULT NULL,
  "ct_auto_ref" int(11) unsigned DEFAULT NULL,
  "ct_ativo" tinyint(1) unsigned DEFAULT '1',
  "ct_ordem" int(2) unsigned DEFAULT NULL
);

--
-- Extraindo dados da tabela `fomento_categoria`
--

INSERT INTO `fomento_categoria` (`id_ct`, `ct_descricao`, `ct_main`, `ct_auto_ref`, `ct_ativo`, `ct_ordem`) VALUES
(1, 'Corpo Docente & Discente', '1', 0, 1, 1),
(2, 'Professores stricto sensu', '', 1, 1, 1),
(3, 'Professores doutores', '', 1, 1, 2),
(4, 'Professores mestres', '', 1, 1, 3),
(5, 'Todos os professores (SS e gradua��o)', '', 1, 1, 4),
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
(17, 'Pesquisa b�sica e aplicada', '', 16, 1, 1),
(18, 'Bolsas de Inicia��o Cient�fica', '', 16, 1, 2),
(19, 'Bolsas P�s-Doutorado', '', 16, 1, 2),
(20, 'Organiza��o de eventos', '', 16, 1, 5),
(21, 'Bolsas produtividade', '', 16, 1, 8),
(22, 'Bolsas S�nior', '', 16, 1, 13),
(23, 'Projeto Institucional', '', 16, 1, 7),
(24, 'Bolsas de mestrado e doutorado', '', 16, 1, 11),
(25, 'Pesquisador visitante', '', 16, 1, 19),
(26, 'Pr�mios', '', 16, 1, 18),
(27, 'Participa��o em eventos', '', 16, 1, 9),
(28, 'Pesquisador na empresa', '', 16, 1, 6),
(29, 'Ci�ncia sem Fronteiras', '', 16, 1, 17),
(30, 'Apoio a editora��o e publica��o de peri�dicos', '', 16, 1, 20),
(31, 'Funda��o Arauc�ria e o Fundo Newton', '', 16, 1, 1),
(32, 'Mobilidade Internacional', '', 16, 1, 10),
(33, 'Bolsa Gradua��o', '1', 16, 1, 20),
(34, 'Bolsa Capacita��o', '', 16, 1, 16),
(35, 'Escolas da PUCPR', '1', 0, 1, 11),
(36, 'Escola de Sa�de e Bioci�ncias', '', 35, 1, 1),
(37, '==teste PDI==', '', 16, 1, 20),
(38, 'Escola Polit�cnica', '', 35, 1, 5),
(39, 'Escola de Arquitetura e Design', '', 35, 1, 10),
(40, 'Escola de Ci�ncias Agr�rias e Medicina Veterin�ria', '', 35, 1, 13),
(41, 'Escola de Comunica��o e Artes', '', 35, 1, 16),
(42, 'Escola de Direito', '', 35, 1, 16),
(43, 'Escola de Educa��o e Humanidades', '', 35, 1, 19),
(44, 'Escola de Medicina', '', 35, 1, 17),
(45, 'Escola de Neg�cios', '', 35, 1, 13);

-- --------------------------------------------------------

--
-- Estrutura da tabela `fomento_disseminador`
--

CREATE TABLE IF NOT EXISTS "fomento_disseminador" (
  "id_fdis" int(3) unsigned NOT NULL,
  "fdis_nome" varchar(45) DEFAULT NULL COMMENT 'Observatorio\nIC\nCi�ncia sem fronteiras',
  "fdis_ativo" tinyint(1) unsigned DEFAULT '1'
);

--
-- Extraindo dados da tabela `fomento_disseminador`
--

INSERT INTO `fomento_disseminador` (`id_fdis`, `fdis_nome`, `fdis_ativo`) VALUES
(1, 'Observat�rio', 1),
(2, 'IC', 1),
(3, 'Ci�ncia sem fronteira', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `fomento_edital`
--

CREATE TABLE IF NOT EXISTS "fomento_edital" (
  "id_ed" bigint(20) NOT NULL,
  "ed_titulo" text,
  "ed_dt_create" date NOT NULL COMMENT 'data de controle interno',
  "ed_agencia" varchar(7) DEFAULT NULL,
  "ed_idioma" varchar(5) DEFAULT NULL,
  "ed_chamada" varchar(30) DEFAULT NULL,
  "ed_dt_deadline_elet" date DEFAULT NULL,
  "ed_dt_deadline_envio" date NOT NULL,
  "ed_dt_previsao_divulg_res" date NOT NULL,
  "ed_texto_1" text,
  "ed_texto_2" text,
  "ed_texto_3" text,
  "ed_texto_4" text,
  "ed_texto_5" text,
  "ed_texto_6" text,
  "ed_texto_7" text,
  "ed_texto_8" text,
  "ed_texto_9" text,
  "ed_texto_10" text,
  "ed_texto_11" text,
  "ed_texto_12" text,
  "ed_status" char(1) DEFAULT NULL COMMENT '[B - finalizado], [A - aberto], [X - cancelado], [! - preenchimento] ',
  "ed_autor" varchar(20) DEFAULT NULL,
  "ed_corpo" text,
  "ed_url_externa" varchar(200) DEFAULT NULL,
  "ed_total_visualizacoes" int(4) DEFAULT NULL,
  "ed_codigo" int(11) NOT NULL,
  "ed_local" varchar(15) DEFAULT NULL,
  "ed_data_envio" int(4) DEFAULT NULL,
  "ed_document_require" char(1) DEFAULT NULL,
  "ed_login" varchar(15) DEFAULT NULL,
  "ed_titulo_email" varchar(100) DEFAULT NULL,
  "ed_edital_tipo" char(2) DEFAULT NULL,
  "ed_fluxo_continuo" int(4) DEFAULT NULL,
  "fdis_id" int(11) unsigned DEFAULT NULL COMMENT 'vinculo com a tabela fomento_disseminador',
  "fag_id" int(11) unsigned DEFAULT NULL COMMENT 'vinculo com a tabela fomento_agencia',
  "i_id" int(11) unsigned DEFAULT NULL COMMENT 'vinculo com tabela idioma',
  "ftp_id" int(11) unsigned DEFAULT NULL COMMENT 'vinculo com tabela fomento_tipo',
  "fs_id" int(11) unsigned DEFAULT NULL COMMENT 'vinculo com a tabela fomento_status'
);

--
-- Extraindo dados da tabela `fomento_edital`
--

INSERT INTO `fomento_edital` (`id_ed`, `ed_titulo`, `ed_dt_create`, `ed_agencia`, `ed_idioma`, `ed_chamada`, `ed_dt_deadline_elet`, `ed_dt_deadline_envio`, `ed_dt_previsao_divulg_res`, `ed_texto_1`, `ed_texto_2`, `ed_texto_3`, `ed_texto_4`, `ed_texto_5`, `ed_texto_6`, `ed_texto_7`, `ed_texto_8`, `ed_texto_9`, `ed_texto_10`, `ed_texto_11`, `ed_texto_12`, `ed_status`, `ed_autor`, `ed_corpo`, `ed_url_externa`, `ed_total_visualizacoes`, `ed_codigo`, `ed_local`, `ed_data_envio`, `ed_document_require`, `ed_login`, `ed_titulo_email`, `ed_edital_tipo`, `ed_fluxo_continuo`, `fdis_id`, `fag_id`, `i_id`, `ftp_id`, `fs_id`) VALUES
(1, '27.� edi��o do Pr�mio Paranaense de Ci�ncia e Tecnologia', '2014-06-10', '00003', 'pt_BR', '09/2013', '2014-03-31', '2014-04-30', '1900-01-01', 'Estimular os pesquisadores e inventores do estado do Paran�.\r\n<BR>Identificar, premiar, disseminar e estimular a realiza��o de a��es de pesquisa e inova��o;\r\n<BR>Dar visibilidade � produ��o cient�fica e tecnol�gica desenvolvida no Estado do Paran�.', 'Ser� premiado um candidato de cada um das �reas do conhecimento e de cada uma das categorias da edi��o em curso com:\r\n<BR>a) Certificado.\r\n<BR>b) Pr�mio em dinheiro (l�quido) equivalente a uma vez e meia do valor do vencimento do professor titular em regime de dedica��o exclusiva, incluindo a gratifica��o de incentivo � titularidade de doutor, da Carreira do Magist�rio P�blico do Ensino Superior do Paran�, ao professor-pesquisador e ao pesquisador-extensionista.\r\n<BR>c) Pr�mio em dinheiro (liquido) equivalente a uma vez e meia do valor do vencimento do professor titular em regime de dedica��o exclusiva, incluindo a gratifica��o de incentivo � titularidade de doutor, da Carreira do Magist�rio P�blico do Ensino Superior do Paran�, ao estudante de gradua��o.\r\n<BR>d) Pr�mio em dinheiro (liquido) equivalente a 60% do valor do vencimento do professor titular em regime de dedica��o exclusiva, incluindo a gratifica��o de incentivo � titularidade de doutor, da carreira do Magist�rio P�blico do Ensino Superior do Paran�, ao inventor independente.\r\n<BR>e)Pr�mio em dinheiro (liquido) equivalente a 60% do valor do vencimento do professor titular em regime de dedica��o exclusiva, incluindo a gratifica��o de incentivo � titularidade de doutor, da carreira do Magist�rio P�blico do Ensino Superior do Paran�, ao jornalista.\r\n<BR>OBS: O pr�mio em dinheiro ser� em moeda nacional e depositado em conta banc�ria indicada pelo vencedor.', 'Ci�ncias Humanas e Sociais e Ci�ncias Agr�rias', 'Informa��es com a SETI: CCT ? Coordenadoria de Ci�ncia e Tecnologia\r\npremiocet@seti.pr.gov.br\r\nTelefones: (41) 3281-7383 I (41) 3281-7314', '', 'Ci�ncias Humanas e Sociais e Ci�ncias Agr�rias\r\n<BR>a)       � Categoria Profissional: um professor-pesquisador e um pesquisador-extensionista;\r\n<BR>b)       � Categoria Estudante de Curso de Gradua��o;\r\n<BR>c)       � Categoria Inventor Independente; e\r\n<BR>d)       � Categoria Jornalismo Cient�fico', '', '', '', '', 'A proposta dever� ser submetida, �nica e exclusivamente, pela internet, atrav�s do site da SETI ? Secretaria de Estado da Ci�ncia, Tecnologia e Ensino Superior, e ainda, as categorias: Professor-Pesquisador, Professor-Extensionista e Estudante de Curso de Gradua��o, dever�o encaminhar os documentos seguintes documentos solicitados:\r\n<BR>Ficha de Inscri��o devidamente preenchida e assinada;\r\n<BR>Curr�culo lattes atualizado;\r\n<BR>Carta de Indica��o do Pr�-Reitor de Pesquisa, devidamente justificada, no caso das Universidades e institutos de Pesquisa e cargos cong�neres para outras institui��es  para o seguinte endere�o eletr�nico premiocet@seti.pr.gov.br.', 'Para esclarecimento de d�vidas e aux�lio no envio da proposta, favor entrar em contato com a Diretoria de Pesquisa pelo e-mail cip@pucpr.br aos cuidados de Erli.', 'B', '', '', 'http://www.seti.pr.gov.br/modules/conteudo/conteudo.php?conteudo=226', 0, 1, 'Observat�rio', 0, '', 'e.bianco', '', '', 0, 1, 3, 1, 0, 2),
(2, 'Programa de Apoio a Eventos no Pa�s (PAEP)', '2015-03-03', '00007', 'pt_BR', 'N� 004/2012', '1900-01-01', '1900-01-01', '1900-01-01', 'Impulsionar a realiza��o de eventos cient�ficos no Brasil e a forma��o de professores para a educa��o b�sica, atrav�s da concess�o de aux�lio financeiro �s comiss�es organizadoras.', '<I>Pessoa Jur�dica:</I>\r\n<BR>a) passagens para palestrantes e/ou conferencistas;\r\n<BR>b) hospedagem, transporte e alimenta��o de palestrantes e/ou conferencistas.\r\n<BR>c) publica��o de anais, v�deos, CDs; \r\n<BR>d) impress�o de p�steres / banners para divulga��o do evento;\r\n<BR>e) loca��o de sala de confer�ncia;\r\n<BR>f) servi�os de tecnologia da informa��o:\r\n<BR>g) servi�os de tradu��o simult�nea;\r\n<BR>h) montagem de estrutura do evento;\r\n<BR>i) servi�os gr�ficos e c�pias.\r\n<br>\r\n<BR><I>Pessoa F�sica:</I>\r\n<BR>a) di�rias e transporte para palestrantes e/ou conferencistas;\r\n<BR>b) servi�os de tradu��o simult�nea.\r\n<br>\r\n<BR><I>Material de Consumo:</I>\r\n<BR>a) material de Escrit�rio', 'Como proponente:\r\n<BR>a) Ser presidente da comiss�o organizadora do evento. \r\n<BR>b) Ter t�tulo de doutor ou qualifica��o equivalente;\r\n<BR>c) Ter Curriculum Vitae cadastrado e atualizado na Plataforma Lattes ou  Plataforma Freire:\r\n<BR>d) Estar adimplente junto a Uni�o. \r\n<br>\r\n<BR>Quanto ao evento:\r\n<BR>a)Ter relev�ncia para o Sistema Nacional de P�s-Gradua��o, para a �rea do Conhecimento e /ou forma��o de professores;\r\n<BR>b) Ser de �mbito local, estadual, regional, nacional ou internacional;\r\n<BR>c) Ser realizado no Brasil.', '', '', 'Eventos cient�ficos, tecnol�gicos e culturais', '', '', '', '', 'A proposta dever� ser submetida com anteced�ncia m�nima de 90 dias da data de in�cio do evento.', '', 'A', '', '', 'http://www.capes.gov.br/apoio-a-eventos/paep', 0, 2, 'Observat�rio', 20150227, '', 'francine.zucco', 'Recurso para realiza��o de eventos - Programa de Apoio a Eventos no Pa�s (PAEP)', '5', 1, 1, 7, 1, 6, 1),
(3, 'Aux�lio Promo��o de Eventos ARC/CNPq', '2015-05-20', '00005', 'pt_BR', '09/2015', '2015-07-03', '1900-01-01', '1900-01-01', 'A presente Chamada tem por objetivo selecionar propostas para apoio financeiro da realiza��o no Brasil, de congressos, simp�sios, workshops, semin�rios, ciclos de confer�ncias e outros eventos similares, de abrang�ncia nacional ou internacional, relacionados � Ci�ncia, Tecnologia e Inova��o. <br>Linha 1: Destina-se a apoiar eventos nacionais ou internacionais tradicionais da �rea, promovidos por sociedades ou associa��es cient�ficas e/ou  tecnol�gicas ou eventos que sejam realizados periodicamente e que tenham abrang�ncia nacional ou internacional.<br>Linha 2: Destina-se a apoiar eventos de abrang�ncia regional ou eventos que estejam em suas primeiras edi��es (com hist�rico inferior a 10 (dez) anos). <br>Linha 3: Destina-se a apoiar eventos MUNDIAIS promovidos por sociedades cient�ficas e/ou tecnol�gicas mundiais, sediadas ou n�o no Brasil, que ocorrem periodicamente em diferentes pa�ses a cada edi��o e que ser�o realizados no Brasil.', 'Itens de custeio. M�x R$ 150 mil para linhas 1 e 3 e R$ 75 mil para linha 2.', 'Quanto ao proponete:\r\n<BR>a) ter v�nculo formal com a institui��o promotora ou colaboradora do evento;\r\n<BR>b) possuir curr�culo cadastrado na Plataforma Lattes;\r\n<BR>c) ser obrigatoriamente o coordenador do projeto.\r\n<BR>Quanto � proposta: O evento dever� ser necessariamente relacionado � Ci�ncia, Tecnologia ou Inova��o, de abrang�ncia nacional ou internacional e ser realizado no Brasil.\r\n<br><br>Para linhas 1 e 2, eventos realizados entre  01/07/2015 e 31/12/2015.\r\n<br> Para linha 3, eventos entre 01/07/2015 e 30/06/2016.', 'chamadaarc2015@cnpq.br', '', '', '', '', '', '', 'As propostas devem ser encaminhadas ao CNPq exclusivamente via Internet, utilizando-se do Formul�rio de Propostas online, dispon�vel na Plataforma Carlos Chagas.', '', 'A', '', '', 'http://goo.gl/uOuFQu', 0, 3, 'Observat�rio', 20150520, '', 'francine.zucco', 'Apoio CNPq � realiza��o de eventos', '5', 0, 1, 5, 1, 6, 1),
(4, '<BR>Chamada N� 01/2014 - CAPES/CNPq/DAAD<BR>\r\nPrograma Conjunto de Bolsas de Doutorado na Rep�blica Federal da Alemanha Sele��o 2014/2015', '2014-06-10', '00007', 'pt_BR', '01/2014', '2014-04-28', '2014-04-28', '2014-08-30', 'O objetivo do programa � oferecer bolsas de est�gio de doutorado de forma a complementar os esfor�os despendidos pelos programas de p�s-gradua��o no Brasil, na forma��o de recursos humanos de alto n�vel para inser��o no meio acad�mico, de ensino e de pesquisa no pa�s.', '', '<BR>3.1 Cada candidatura dever� apresentar, obrigatoriamente, os seguintes requisitos:\r\n<BR>a) confirma��o formal de orienta��o cient�fica na Alemanha;\r\n<BR>b) projeto de pesquisa cient�fica de qualidade e formalmente aceito pelo(s)  orientador(es);\r\n<BR>c) qualifica��o acad�mica acima da m�dia;\r\n<BR>d) ser cidad�o brasileiro ou estrangeiro com visto permanente no pa�s;\r\n<BR>e) comprovante de conhecimento de ingl�s ou de alem�o;\r\n<BR>f) n�o ter recebido anteriormente bolsa das ag�ncias brasileiras para realiza��o de estudos no mesmo n�vel pretendido;\r\n<BR>g) n�o ter o t�tulo de doutor;\r\n<BR>h) o Curr�culo Lattes deve estar atualizado, principalmente as informa��es de endere�o completo, telefone e e-mail.<BR>\r\n<BR>3.2 Caso esteja cursando o mestrado, o candidato dever� defender a disserta��o antes de viajar para a Alemanha.<BR>\r\n3.3 Os candidatos � bolsa de Doutorado Sandu�che e de Duplo Doutorado dever�o, necessariamente, estar matriculados em curso de doutorado em Institui��o de Ensino Superior no Brasil.<BR>\r\n<BR>3.4 Para as bolsas de duplo doutorado, � necess�rio que no regulamento da p�s-gradua��o de ambas as universidades (brasileira e alem�) esteja prevista essa possibilidade.<BR>\r\n<BR>3.5 O candidato residente na Alemanha h� um ano ou mais, levando-se em conta a data de inscri��o no programa, ou per�odo igual ou superior a dois anos, levando-se em conta o in�cio da implementa��o da bolsa, n�o poder� receber bolsa da ag�ncia alem� DAAD.<BR>\r\n<BR>3.6 O bolsista que se encontre residindo no exterior, quando da aprova��o da bolsa, n�o far� jus ao valor correspondente ao aux�lio-deslocamento relativo ao trecho de ida e nem ao aux�lio-instala��o.', 'Esclarecimentos e informa��es adicionais acerca do conte�do desta Chamada podem ser obtidos encaminhando mensagem para os seguintes endere�os: doutorado@daad.org.br, doutorado_alemanha@capes.gov.br e codes@cnpq.br', '', 'Doutorado Pleno <BR>\r\n\r\nCaracteriza-se pela execu��o plena da pesquisa e da defesa de tese na Alemanha. Essa modalidade tem o objetivo de formar doutores no exterior em institui��es de reconhecido n�vel de ensino e pesquisa, em todas as �reas do conhecimento.<BR>\r\n\r\nDoutorado Sandu�che<BR>\r\n\r\nEssa modalidade apoia o aluno formalmente matriculado em curso de doutorado no Brasil que justifique a necessidade de aprofundamento te�rico, coleta e/ou tratamento de dados ou desenvolvimento parcial da parte experimental de sua tese na Alemanha.<BR>\r\n\r\nDuplo Doutorado (Doutorado Sandu�che ?SWE Cotutela)<BR>\r\n\r\nTrata-se de modalidade oferecida pela CAPES e pelo DAAD e destina-se a candidatos inscritos em um curso de doutorado no Brasil que pretendem obter titula��o de ambas as universidades.', '', '', '', '', 'As candidaturas devem ser apresentadas por meio do formul�rio eletr�nico dispon�vel na plataforma Carlos Chagas, localizada na p�gina do CNPq. Uma vers�o da documenta��o dever� ser encaminhada por correio para o escrit�rio do DAAD, no Rio de Janeiro/Brasil.', 'Para esclarecimento de d�vidas e aux�lio no envio da proposta, favor entrar em contato com a Diretoria de Pesquisa pelo e-mail cip@pucpr.br aos cuidados de Erli.', 'B', '', '', 'http://www.cnpq.br/web/guest/chamadas-publicas', 0, 4, 'Observat�rio', 0, '', 'e.bianco', '', '', 0, 1, 7, 1, 0, 2),
(5, 'CHAMADA DE PROJETOS MEC/MCTI/CAPES/CNPq/FAPs \r\nN� 09/2014<BR>\r\nPROGRAMA CI�NCIA SEM FRONTEIRAS ? BOLSAS NO PA�S \r\nMODALIDADE PESQUISADOR VISITANTE ESPECIAL ? PVE', '2014-06-17', '00005', 'pt_BR', '09/2014', '2014-04-08', '2014-06-23', '2014-08-25', 'Esta chamada, a ser gerida exclusivamente pela CAPES, tem como objetivo o apoio financeiro a projetos de pesquisa que visem por meio do interc�mbio, da mobilidade internacional e da coopera��o cient�fica e tecnol�gica, promover a consolida��o, expans�o e internacionaliza��o da \r\nci�ncia, inova��o, e tecnologia, bem como da competitividade do Pa�s com enfoque nas �reas contempladas do Programa Ci�ncia sem Fronteiras.', '', 'Perfil: O pesquisador indicado para a bolsa Pesquisador Visitante Especial ? PVE deve atender aos seguintes requisitos: <BR>\r\n? Ter reconhecida lideran�a cient�fica e/ou tecnol�gica internacional nas �reas \r\ncontempladas do Programa Ci�ncia sem Fronteiras; \r\n? Ter t�tulo de doutor ou perfil equivalente; \r\n? Residir no exterior no momento de envio da proposta', '', '', '', '', '', '', '', 'As propostas dever�o ser submetidas por meio do link dispon�vel na p�gina \r\nhttp://www.cienciasemfronteiras.gov.br/web/csf/pesquisador-visitante-especial1, a partir da data  indicada na se��o CRONOGRAMA ? Ap�ndice I da Chamada.', '', 'B', '', '', '', 0, 5, 'Observat�rio', 0, '', 'e.bianco', '', '', 0, 1, 5, 1, 0, 2),
(6, '�LTIMOS DIAS: <br>Chamada Universal? MCTI/CNPq', '2014-06-17', '00005', 'pt_BR', 'N� 14/2014', '2014-06-16', '1900-01-01', '2014-11-03', 'A presente Chamada tem por objetivo selecionar propostas para apoio financeiro a projetos que visem contribuir significativamente para o desenvolvimento cient�fico e tecnol�gico e inova��o do Pa�s, em qualquer �rea do conhecimento.', 'CUSTEIO:\r\n<BR>a) material de consumo, componentes e/ou pe�as de reposi��o de equipamentos, software caso seja apenas uma licen�a tempor�ria, instala��o, recupera��o e manuten��o de equipamentos;\r\n<BR>b) servi�os de terceiros ? pagamento integral ou parcial de contratos de manuten��o e servi�os de terceiros, pessoa f�sica ou jur�dica, de car�ter eventual;\r\n<BR>c) despesas acess�rias, especialmente as de importa��o e as de instala��es necess�rias ao adequado funcionamento dos equipamentos; \r\n<BR>d) passagens e di�rias.\r\n<BR>CAPITAL:\r\n<BR>a) material bibliogr�fico;\r\n<BR>b) software, cuja licen�a seja permanente, equipamentos e material permanente.\r\n<BR>BOLSAS\r\n<BR>Ser�o concedidas bolsas, unicamente nas modalidades Inicia��o Cient�fica e Apoio T�cnico.\r\n<BR>A bolsa de Apoio T�cnico destina-se a profissional t�cnico especializado. Para esta modalidade est�o dispon�veis dois n�veis: AT-NS - bolsa para t�cnico de n�vel.', 'Faixa A: exclusiva para Pesquisadores que obtiveram o t�tulo de doutor a partir de 2007 inclusive, exceto bolsistas de produtividade (PQ/DT) n�vel 1; ou a Bolsistas BJT do Programa Ci�ncia sem Fronteiras.\r\n<br>Faixa B: Bolsistas de Produtividade em Pesquisa (PQ) categoria 2; ou Produtividade em Desenvolvimento Tecnol�gico e Extens�o Inovadora (DT) categoria 2; ou ainda, a pesquisadores que n�o possuem bolsas destas modalidades, em qualquer categoria. \r\n<br>Faixa C: de livre concorr�ncia. Podem concorrer nesta faixa quaisquer pesquisadores que atendam ao item II.2.4 da Chamada. Bolsistas de Produtividade (PQ e DT) categoria 1 podem concorrer apenas na faixa C.', 'Esclarecimentos e informa��es adicionais acerca do conte�do desta Chamada podem ser obtidos encaminhando mensagem para o endere�o: universal2014@cnpq.br.\r\n<BR>O atendimento a proponentes com dificuldades t�cnicas no preenchimento do Formul�rio de Propostas online ser� feito pelo endere�o eletr�nico suporte@cnpq.br.\r\n<BR>Para d�vidas ou dificuldades no preenchimento dos itens do Formul�rio de Propostas online, o atendimento se dar� pelo telefone 0800.61.9697, de segunda a sexta-feira, no hor�rio de 8h30 �s 18h30.', '', 'Todas as �reas de conhecimento.', '', '', '', '', 'As propostas devem ser acompanhadas de arquivo contendo o projeto e devem ser encaminhadas ao CNPq exclusivamente via Internet, utilizando-se do Formul�rio de Propostas Online, dispon�vel na Plataforma Integrada Carlos Chagas (http://carloschagas.cnpq.br).', 'Para esclarecimentos e aux�lio, favor entrar em contato com o Observat�rio de Pesquisa, Desenvolvimento & Inova��o - pdi@pucpr.br, (41) 3271-2128.', 'B', '', '', 'http://www.cnpq.br/web/guest/chamadas-publicas?p_p_id=resultadosportlet_WAR_resultadoscnpqportlet_INSTANCE_0ZaM&filtro=abertas&detalha=chamadaDivulgada&idDivulgacao=4742', 0, 6, 'Observat�rio', 20140612, '', 'e.bianco', '', '', 0, 1, 5, 1, 0, 2),
(7, 'PROGRAMA CI�NCIA SEM FRONTEIRAS ? BOLSAS NO PA�S MODALIDADE PESQUISADOR VISITANTE ESPECIAL ? PVE CHAMADA DE PROJETOS MEC/MCTI/CAPES/CNPq/FAPs', '2014-06-17', '00005', 'pt_BR', 'N� 03/2014', '2014-06-23', '2014-06-23', '2014-08-31', 'Fomentar o interc�mbio e a coopera��o internacional, por meio da atra��o de lideran�as internacionais que tenham destacada produ��o cient�fica e tecnol�gica nas �reas contempladas do Programa Ci�ncia sem Fronteiras.\r\nDura��o: de dois a tr�s anos, com perman�ncia m�nima no Brasil de 30 dias e no m�ximo noventa dias a cada ano de projeto, em estadias cont�nuas ou n�o.', 'Os recursos da presente Chamada ser�o destinados ao financiamento de bolsa e itens de custeio e dever�o ser utilizados exclusivamente no projeto proposto pelo coordenador e aprovado pelo CNPq, compreendendo:\r\nBolsa Pesquisador Visitante Especial ? PVE e respectivos benef�cios, bolsas doutorado sandu�che no exterior e p�s-doutorado no Brasil.\r\n<BR>Custeio:\r\n<BR>a. material bibliogr�fico;\r\n<BR>b. material de consumo, componentes e/ou pe�as de reposi��o de equipamentos, software, instala��o, <BR>recupera��o e manuten��o de equipamentos;\r\n<BR>c. servi�os de terceiros ? pagamento integral ou parcial de contratos de manuten��o e servi�os de <BR>terceiros, pessoa f�sica ou jur�dica, de car�ter eventual;\r\n<BR>d. despesas acess�rias, especialmente as de importa��o e as de instala��es necess�rias ao adequado <BR>funcionamento de equipamentos;\r\n<BR>e. Passagens e di�rias, de acordo com as normas das ag�ncias financiadoras, destinadas, <BR>exclusivamente aos membros da equipe para realiza��o de atividades de campo, coleta de dados ou <BR>suporte de especialista para desenvolvimento do projeto.', 'O coordenador do projeto dever� atender, obrigatoriamente, aos itens abaixo:\r\n<BR>a. possuir o t�tulo de doutor ou perfil equivalente;\r\n<BR>b. ter seu curr�culo cadastrado na Plataforma Lattes, atualizado at� a data limite para envio da proposta;\r\n<BR>c. ter v�nculo formal com a institui��o de execu��o do projeto.\r\n<BR>O candidato � bolsa Pesquisador Visitante Especial, no momento do <BR>envio da proposta, dever�: a. residir no exterior - para comprova��o <BR>deste requisito, dever� constar no Curr�culo Lattes atualizado ou no <BR>modelo de Curr�culo, o endere�o residencial e profissional no exterior.\r\n<BR>b. apresentar, no Curr�culo Lattes ou no modelo de Curr�culo, hist�rico de <BR>registro de patentes e/ou publica��o de trabalhos cient�ficos e <BR>tecnol�gicos de impacto e/ou pr�mios de m�rito acad�mico. Estes <BR>trabalhos devem estar relacionados �s �reas contempladas do Programa <BR>Ci�ncia sem Fronteiras.', 'Esclarecimentos e informa��es adicionais acerca do conte�do desta Chamada podem ser obtidos exclusivamente encaminhando mensagem por meio do endere�o http://www.capes.gov.br/faleconosco ou por telefone 0800 61 61 61, op��o 0, subop��o 1.\r\n<BR>O atendimento a proponentes, exclusivamente com dificuldades no acesso ou no preenchimento do Formul�rio de Propostas Online, ser� feito pelo endere�o suporte@cienciasemfronteiras.gov.br ou por telefone 0800 61 96 97 de segunda a sexta-feira, no hor�rio de 8h30 as 18h00.', '', '�REAS CONTEMPLADAS\r\n<BR>a. Engenharias e demais �reas Tecnol�gicas;\r\n<BR>b. Ci�ncias Exatas e da Terra;\r\n<BR>c. Biologia, Ci�ncias Biom�dicas e da Sa�de;\r\n<BR>d. Computa��o e Tecnologias da Informa��o;\r\n<BR>e. Tecnologia Aeroespacial;\r\n<BR>f. F�rmacos;\r\n<BR>g. Produ��o Agr�cola Sustent�vel;\r\n<BR>h. Petr�leo, G�s e Carv�o Mineral;\r\n<BR>i. Energias Renov�veis;\r\n<BR>j. Tecnologia Mineral;\r\n<BR>k. Biotecnologia;\r\n<BR>l. Nanotecnologia e Novos Materiais;\r\n<BR>m. Tecnologias de Preven��o e Mitiga��o de Desastres Naturais;\r\n<BR>n. Biodiversidade e Bioprospec��o;\r\n<BR>o. Ci�ncias do Mar;\r\n<BR>p. Ind�stria Criativa (voltada a produtos e processos para desenvolvimento tecnol�gico e inova��o);\r\n<BR>q. Novas Tecnologias de Engenharia Construtiva;', '', '', '', '', '', '', 'X', '', '', '', 0, 7, 'Observat�rio', 0, '', 'e.bianco', '', '', 0, 1, 5, 1, 0, 3),
(8, 'Pr�mio Funda��o Bunge contempla profissionais ligados � Produtividade Agr�cola Sustent�vel e Artes Circenses com apoio  da Funda��o Arauc�ria.', '2014-06-11', '00002', 'pt_BR', 'Pr�mio Fund. Bunge', '2014-05-16', '2014-05-16', '2014-07-25', 'A Funda��o Bunge atrav�s deste pr�mio e temas, espera contribuir:\r\n<BR> com a escolha da PRODUTIVIDADE AGR�COLA SUSTENT�VEL;\r\n<BR>  Homenagear as Artes Circenses.', 'Al�m de diploma e medalha, os agraciados na categoria "Vida e Obra" receber�o R$ 135 mil e os contemplados em "Juventude" ser�o premiados com R$ 50 mil, em cerim�nia realizada em S�o Paulo, no dia 22 de setembro.', '', '', 'Etapas\r\n\r\n<BR>Indica��es - os candidatos ao Pr�mio n�o s�o inscritos, mas sim indicados pelas principais universidades e entidades cient�ficas e culturais brasileiras, incluindo a Funda��o Arauc�ria. O per�odo para indica��o acontece entre abril e maio.\r\nProcesso do Pr�mio:\r\n<BR>An�ncio dos contemplados - em 25 de julho, o Grande J�ri, composto por cerca de 50 membros, entre reitores de universidades e presidentes de entidades cient�ficas e culturais, anuncia os contemplados de 2014.\r\n<BR>Entrega solene dos Pr�mios - A cerim�nia de premia��o acontece em 22 de setembro, no Pal�cio dos Bandeirantes, em S�o Paulo.\r\n<BR>Semin�rio Internacional - em 23 de setembro, a Funda��o Bunge, em parceria com a FAPESP - Funda��o de Amparo � Pesquisa do Estado de S�o Paulo, realiza um Semin�rio Internacional sobre Produtividade Agr�cola Sustent�vel. No semin�rio, especialistas promovem exposi��es e debates sobre os avan�os obtidos nesta �rea.', 'Em 2014, o Pr�mio Funda��o Bunge, em sua 59� edi��o, contempla profissionais ligados � Produtividade Agr�cola Sustent�vel, na �rea de Ci�ncias Agr�rias, e Artes Circenses, na �rea de Artes.', '', '', '', '', 'Os candidatos ao Pr�mio n�o s�o inscritos, mas sim indicados pelas principais universidades e entidades cient�ficas e culturais brasileiras. \r\n<BR> Caso, haja interesse, manifeste-se, atrav�s do email cip@pucpr.br  at� as 12horas do dia 16/05/2014.', 'Atrav�s do email cip@pucpr.br ou pel�o telefone (41) 3271-2582', 'B', '', '', 'http://www.fundacaobunge.org.br/projetos/premio-fundacao-bunge/', 0, 8, 'Observat�rio', 0, '', 'e.bianco', '', '', 0, 1, 2, 1, 0, 2),
(9, 'Oportunidade de recursos Newton Funding (Reino Unido)/Funda��o Arauc�ria', '2014-06-09', '00002', 'pt_BR', 'Fundo Newton / FA', '2014-05-20', '2014-05-20', '1900-01-01', 'Convocamos todos os pesquisadores da PUCPR que tenham projetos em parceria (ou parceria potencial) com institui��es do Reino Unido para enviarem suas propostas. Estas propostas s�o importantes para mapear quais temas de projetos de pesquisa e inova��o est�o sendo pesquisados em parceria com o Reino Unido e, assim, prospectar a capta��o de fundos.', '', '', '', 'Senhor(a) Pesquisador(a), Coordenador(a) e Gestor(a) Educacional,\r\n<BR>Em abril de 2014, foi estabelecido um acordo de coopera��o entre Brasil e Reino Unido e, em abril, A Funda��o Arauc�ria e o Fundo Newton no Brasil firmaram acordo por meio do Conselho Nacional das Funda��es de Apoio � Pesquisa (CONFAP). O Fundo Newton foi lan�ado em 9 de abril deste ano em S�o Paulo com a presen�a do Ministro das Finan�as do Reino Unido, George Osborne. Ser�o financiados no pa�s 9 milh�es de libras por ano, por um per�odo de tr�s anos que dever�o ser comprometidos (empenhados) at� mar�o de 2015, quando � encerrado o ano fiscal no Reino Unido. Os projetos do Fundo Newton devem contemplar tr�s modalidades que podem ser combinadas: Mobilidade/capacita��o de Pessoas, Projetos de Pesquisa e Projetos de Inova��o.\r\n <BR>A pr�xima etapa da parceria � selecionar os projetos que receber�o os recursos. Por isto, convocamos todos os pesquisadores da PUCPR que tenham projetos em parceria (ou parceria potencial) com institui��es do Reino Unido para enviarem suas propostas at� o dia 20 de maio. Estas propostas s�o importantes para mapear quais temas de projetos de pesquisa e inova��o est�o sendo pesquisados em parceria com o Reino Unido e, assim, prospectar a capta��o de fundos. \r\n<BR>A proposta deve estar descrita em uma p�gina, com a seguinte estrutura:\r\n<BR>- T�tulo do Projeto;\r\n<BR>- Sum�rio em 10 linhas no m�ximo;\r\n<BR>- Coordenador local (proponente: pesquisador e entidade vinculada) e parceiros de Mato Grosso do Sul e nacionais, eventualmente;\r\n<BR>- Parceiro Brit�nico (j� existente, indicado ou sugerido);\r\n<BR>- Valor do projeto (custos);\r\n<BR>- Prazo de execu��o.', '', '', '', '', '', 'Os projetos devem ser encaminhados at� dia 20 de maio de 2014 para o e-mail do Observat�rio de Pesquisa Desenvolvimento & Inova��o - pdi@pucpr.br com o assunto: Fundo Newton.', 'Para esclarecimentos e aux�lio, favor entrar em contato com Observat�rio de Pesquisa Desenvolvimento & Inova��o  falar com Francine (41) 3271-2128.', 'B', '', '', 'https://www.gov.uk/government/publications/newton-fund-building-science-and-innovation-capacity-in-developing-countries/newton-fund-building-science-and-innovation-capacity-in-developing-countries', 0, 9, 'Observat�rio', 0, '', '', '', '', 0, 1, 2, 1, 0, 2),
(10, 'Fluxo cont�nuo - P�s Doutorado no Exterior para o National Institute of Health - NIH', '2014-06-11', '00005', 'pt_BR', 'Ci�ncias Fronteiras', '2014-05-28', '2014-05-28', '2014-09-12', 'x', '', 'Antes de solicitar uma bolsa, os candidatos interessados em uma vaga para a realiza��o de doutorado pleno devem fazer contato com a institui��o de seu interesse no exterior para obter uma carta de aceite condicional. \r\n<BR> Verifique antes se o seu projeto enquadra-se �s �reas Priorit�rias do Programa Ci�ncia sem Fronteiras.', '', '', '', '', '', '', '', '', '', 'B', '', '', '', 0, 10, 'Observat�rio', 0, '', 'e.bianco', '', '', 0, 1, 5, 1, 0, 2),
(11, 'Programa BRAFAGRI - Coopera��o Brasil/Fran�a em Agricultura', '2014-06-17', '00007', 'pt_BR', 'EDITAL n�. 20/2014', '2014-06-15', '1900-01-01', '2014-11-30', 'Fomentar o interc�mbio de estudantes em n�vel de gradua��o nas �reas de ci�ncias agron�micas, agroalimentares e veterin�ria por meio de parcerias entre institui��es brasileiras e francesas. \r\nPrograma de dois anos (podendo ser prorrogado por mais dois).', 'Miss�es de trabalho, material de custeio e miss�es de estudo.', 'Proposta de projeto em parceria com universidade francesa; equipe de trabalho com no m�nimo 2 docentes doutores, al�m do coordenador do projeto.', 'CAPES: bexeletronico.cgci@capes.gov.br', '', 'Ci�ncias Agron�micas, agroalimentares e veterin�ria.', '', '', '', '', '', 'Para esclarecimentos e aux�lio, favor entrar em contato com o Observat�rio de Pesquisa Desenvolvimento & Inova��o - pdi@pucpr.br, (41) 3271-2128', 'B', '', '', 'http://www.capes.gov.br/images/stories/download/editais/1542014-Edital-020-2014-BRAFAGRI.pdf', 0, 11, 'Observat�rio', 0, '', 'francine.zucco', '', '', 0, 1, 7, 1, 0, 2),
(12, 'Advanced Training Course on Foot and Mouth Disease in Cattle and Pigs', '2014-06-18', '00034', 'us_EN', 'NO. J1404311/ID.1480', '2014-06-18', '2014-06-18', '2014-07-25', 'Educa��o aplicada e capacita��o de recursos humanos em medidas preventivas, epidemiol�gicas, ambientais e de estabiliza��o para pecu�ria em um dos maiores campos de cria��o de gado do Jap�o.\r\nCursos de 25 de agosto a 28 de setembro de 2014.', 'Bolsa para curso de treinamento em grupo no Jap�o.', 'Mais de 3 anos de experi�ncia na �rea; fluente em ingl�s; ser professor ou pesquisador; entre 25 a 55 anos de idade.', 'JICA Brasil -  brsp_oso_rep@jica.go.jp / jicabr-training@jica.go.jp', '', 'Medicina Veterin�ria.', '', '', '', '', '', 'Para esclarecimentos e aux�lio, favor entrar em contato com o Observat�rio de Pesquisa Desenvolvimento & Inova��o - pdi@pucpr.br, (41) 3271-2128.', 'B', '', '', 'http://www.jica.go.jp/brazil/portuguese/office/courses/c8h0vm00008rb1vc-att/J1404311_-_Advanced_Training_Course_on_Foot_and_Mouth_Disease.pdf', 0, 12, 'Observat�rio', 0, '', 'francine.zucco', '', '', 0, 1, 34, 2, 0, 2),
(13, '<br>Programa BRAFITEC - Coopera��o Brasil/Fran�a em Tecnologia', '2014-06-10', '00007', 'pt_BR', 'EDITAL n�. 21/2014', '2014-09-19', '1900-01-01', '1900-01-01', 'O programa consiste em projetos de parcerias universit�rias em todas as especialidades de Engenharia, exclusivamente em n�vel de gradua��o, para fomentar o interc�mbio em ambos os pa�ses e estimular a aproxima��o das estruturas curriculares, inclusive a equival�ncia e o reconhecimento m�tuo de cr�ditos obtidos nas institui��es participantes.', 'Miss�es de trabalho, material de custeio e miss�es de estudo.', 'Proposta de projeto de parceria universit�ria, equipe de trabalho com no m�nimo 2 docentes doutores, al�m do coordenador do projeto.', 'brafitec.projetos@capes.gov.br', '', 'Engenharias.', '', '', '', '', '', 'Para esclarecimentos e aux�lio, favor entrar em contato com o Observat�rio de Pesquisa Desenvolvimento & Inova��o - pdi@pucpr.br, (41) 3271-2128', 'A', '', '', 'http://www.capes.gov.br/images/stories/download/editais/1542014-Edital-021-2014-BRAFITEC.pdf', 0, 13, 'Observat�rio', 0, '', 'francine.zucco', '', '', 0, 1, 7, 1, 0, 1),
(14, '<br>Banting Postdoctoral Fellowships', '2014-07-21', '00035', 'us_EN', '2014-15', '2014-09-24', '1900-01-01', '1900-01-01', 'Atrair e reter talentos p�s-doc nacionais e internacionais, desenvolver seu potencial de lideran�a e posicion�-los como l�deres de pesquisa de sucesso do futuro.', 'Bolsa p�s-doutorado.', 'N�o pode ter uma posi��o "tenure-track ou tenure" na institui��o e deve desenvolver o projeto em Universidade canadense previamente prospectada.', 'banting@researchnet-recherchenet.ca', '', 'Ci�ncias da Sa�de.', '', '', '', '', 'A submiss�o ser� completa apenas ap�s uma s�rie de etapas descritas detalhadamente no site.', 'Para esclarecimentos e aux�lio, favor entrar em contato com o Observat�rio de Pesquisa Desenvolvimento & Inova��o - pdi@pucpr.br, (41) 3271-2128', 'A', '', '', 'http://banting.fellowships-bourses.gc.ca/app-dem/elig-adm-eng.html', 0, 14, 'Observat�rio', 20140721, '', 'francine.zucco', 'Oportunidade de bolsa p�s-doc em Ci�ncias da Sa�de no Canad�', '', 0, 1, 35, 2, 0, 1),
(15, '<br>  Training Course on Sustainable Biomass and Bio-Energy Utilization in Tropics', '2014-06-10', '00034', 'us_EN', 'NO. J1404254/ ID. 14', '2014-08-04', '1900-01-01', '1900-01-01', 'Promover a utiliza��o efetiva de recursos de biomassa por meio de tecnologias avan�adas e contribuir para o desenvolvimento de uma sociedade sustent�vel e de ind�strias de biomassa nos pa�ses envolvidos.', 'Bolsa para curso de treinamento em grupo no Jap�o.', 'Mais de 3 anos de experi�ncia na �rea; fluente em ingl�s; entre 25 e 35 anos de idade.', 'JICA Brasil - brsp_oso_rep@jica.go.jp / jicabr-training@jica.go.jp', '', 'Agr�cola, ambiental, qu�mica, engenharia mec�nica ou equivalentes.', '', '', '', '', '', 'Para esclarecimentos e aux�lio, favor entrar em contato com o Observat�rio de Pesquisa Desenvolvimento & Inova��o - pdi@pucpr.br, (41) 3271-2128', 'A', '', '', 'http://www.jica.go.jp/brazil/portuguese/office/courses/c8h0vm00008shbxr-att/J1404254_-_Sustainable_Biomass_and_Bio-Energy_Utilization_in_Tropics.pdf', 0, 15, 'Observat�rio', 0, '', 'francine.zucco', '', '', 0, 1, 34, 2, 0, 1),
(16, 'xxx', '2014-06-09', '', 'pt_BR', '2014', '2014-10-15', '1900-01-01', '1900-01-01', 'xxx', '<html>\r\n	<head>\r\n		<title>Editor HTML Online</title>\r\n	</head>\r\n	<body>\r\n		<div style="text-align: center;">\r\n			<img alt="" height="72" src="http://www.grupocoimbra.org.br/coimbra/images/stories/coimbra/capes.jpg" style="float: left;" width="83" /></div>\r\n		<div style="text-align: center;">\r\n			<p>\r\n				Segue o link para acesso ao Edital do Pr�mio Capes de Tese ? Edi��o 2014 com todas as orienta��es sobre a pr�-sele��o a ser feita pela Coordena��o do Programa de p�s-gradua��o e a sele��o dos premiados a ser feita pela CAPES:</p>\r\n			<p>\r\n				<a href="http://www.capes.gov.br/images/stories/download/editais/262014-033-2014-PCT.pdf">http://www.capes.gov.br/images/stories/download/editais/262014-033-2014-PCT.pdf</a></p>\r\n			<p>\r\n				Mais uma vez, contamos com a ampla divulga��o e participa��o desta institui��o.</p>\r\n			<p>\r\n				As inscri��es estar�o abertas no per�odo de <strong>29/05/14 a 26/06/14</strong>.</p>\r\n			<p>\r\n				Qualquer d�vida poder� ser esclarecida por meio do endere�o: <a href="mailto:premiocapes@capes.gov.br">premiocapes@capes.gov.br</a></p>\r\n			<p>\r\n				 </p>\r\n		</div>\r\n		<p>\r\n			 </p>\r\n	</body>\r\n</html>', '', '', '', '', '', '', '', '', '', 'xxx', 'X', '', '', '', 0, 16, 'Observat�rio', 0, '', 'RENE.GABRIEL', '', '', 0, 1, 0, 1, 0, 3),
(17, '<br>Inscri��es prorrogadas: Pr�mio Finep 2014', '2014-08-06', '00036', 'pt_BR', '2014', '2014-09-12', '1900-01-01', '1900-01-01', 'O Pr�mio Finep foi criado para reconhecer e divulgar esfor�os inovadores realizados por empresas, institui��es sem fins lucrativos e pessoas f�sicas, desenvolvidos no Brasil e j� inseridos no mercado interno ou externo, a fim de tornar o Pa�s competitivo e plenamente desenvolvido por meio da inova��o.<br>As empresas, as institui��es e os inventores inovadores s�o aqueles que desenvolvem solu��es em forma de produtos, processos, metodologias e/ou servi�os novos ou significativamente modificados.</br>', '<b>Etapa Regional:</b> Os vencedores da fase regional de cada categoria, al�m de concorrerem � premia��o nacional, receber�o o Trof�u Ouro e pr�mios em esp�cie (consultar edital). <br><b>Etapa Nacional:</b> Os vencedores da fase nacional de cada categoria receber�o o trof�u de vencedor nacional e os pr�mios em esp�cie (consultar edital).</br>', '1 - Empresas - as empresas poder�o realizar mais de uma inscri��o de diferentes produtos, processos e servi�os nas categorias Tecnologia Assistiva e Inova��o Sustent�vel, podendo, ainda, realizar a inscri��o nas categorias Micro/Pequena, M�dia ou Grande Empresa, de acordo com o seu faturamento;\r\n		<br>\r\n			2 - Institui��o de Ci�ncia e Tecnologia, e Tecnologia Social - uma mesma institui��o poder� concorrer simultaneamente nestas duas categorias, atendidas as especificidades de cada uma delas;</br>\r\n			3 - Inventor Inovador - os inventores poder�o realizar mais de uma inscri��o nesta categoria de diferentes patentes concedidas pelo INPI (com carta patente expedida) e cujos objetos estejam comercializados. Quando o participante concorrer com uma patente que possua mais de um inventor, todos devem ser citados no formul�rio de inscri��o. Neste caso, se a proposta for selecionada para fins de premia��o, o inventor dever� apresentar declara��o dos demais co-titulares da patente autorizando-o a receber o pr�mio.', 'Mais informa��es: (21) 2555-0510 - (21) 2555-0455 - (21) 2555-0555 ou e-mail:  <a href="mailto:premio@finep.gov.br" style="color: navy; text-decoration: none; font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 11.818181991577148px; text-align: justify; background-color: rgb(255, 255, 255);">premio@finep.gov.br</a><span style="font-family: Verdana; font-size: 11.818181991577148px; text-align: justify; background-color: rgb(255, 255, 255);">.</span></p>', '', 'Micro/Pequena Empresa - M�dia Empresa - Inova��o Sustent�vel - Institui��o de Ci�ncia e Tecnologia - Tecnologia Social e Inventor Inovador', '', '', '', '', 'As inscri��es devem ser feitas at� 18h00 do dia 12 de setembro de 2014.<br>� condi��o para participa��o o preenchimento completo do formul�rio de inscri��o da respectiva categoria dispon�vel no endere�o eletr�nico do Pr�mio Finep - www.finep.gov.br/premio.</br> Est� vedado o envio de anexos, amostras ou qualquer outro tipo de material complementar.', 'Para esclarecimento de d�vidas e aux�lio no envio da proposta, favor entrar em contato com o Observat�rio PD&I pelo Ramal: 2128 ou e-mail: <a href="mailto:pdi@pucpr.br" style="color: navy; text-decoration: none; font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 11.818181991577148px; text-align: justify; background-color: rgb(255, 255, 255);">pdi@pucpr.br</a><span style="font-family: Verdana; font-size: 11.818181991577148px; text-align: justify; background-color: rgb(255, 255, 255);">.</span></p>', 'A', '', '', 'http://premio.finep.gov.br/', 0, 17, 'Observat�rio', 20140806, '', 'jeferson.vieira', 'Inscri��es prorrogadas para o Pr�mio Finep 2014', '', 0, 1, 36, 1, 0, 1),
(18, '<br>Pr�mio Sa�de 2014', '2014-08-11', '00037', 'pt_BR', '2014', '2014-08-20', '1900-01-01', '2014-11-25', 'Busca valorizar o empenho de quem pensa, luta e trabalha por um Brasil mais saud�vel e prestigiar projetos que v�o de estudos em fase cl�nica a campanhas de preven��o, realizados por cientistas e profissionais de todas as �reas da sa�de.', 'Pr�mio de R$ 890,00.', 'M�dicos, enfermeiros, nutricionistas, obstetrizes, fisioterapeutas, terapeutas ocupacionais, educadores f�sicos, fonoaudi�logos, psic�logos, assistentes sociais, farmac�uticos, bi�logos, biom�dicos e cirurgi�es-dentistas, com registro nos devidos conselhos de classe.\r\nPodem concorrer individualmente ou organizados em grupos de profissionais de sa�de de at� 30 integrantes.', 'premiosaude@abril.com.br', '', 'a) Sa�de e Preven��o;\r\nb) Sa�de da Crian�a;\r\nc) Sa�de Mental e Emocional;\r\nd) Sa�de e Nutri��o;\r\ne) Sa�de Bucal;\r\nf) Sa�de e Atividade F�sica;\r\ng) Institui��o do Ano e\r\nh) Personalidade do Ano.', '', '', '', '', '', 'Para esclarecimentos e aux�lio, favor entrar em contato com o Observat�rio de Pesquisa Desenvolvimento & Inova��o - pdi@pucpr.br, (41) 3271-2128', 'A', '', '', 'http://www.premiosaude.com.br/', 0, 18, 'Observat�rio', 20140811, '', 'francine.zucco', '�ltimos dias para inscri��o no Pr�mio Sa�de 2014', '', 0, 1, 37, 1, 0, 1),
(19, 'Programa CsF ? Bolsas no Pa�s Modalidade Pesquisador Visitante Especial', '2014-08-11', '00038', 'pt_BR', 'N� 03/2014', '2014-09-15', '1900-01-01', '1900-01-01', 'Fomentar o interc�mbio e a coopera��o cient�fica e tecnol�gica entre grupos de pesquisa nacionais e do exterior, por meio da atra��o de lideran�as internacionais que tenham destacada produ��o cient�fica e tecnol�gica nas �reas contempladas do Programa Ci�ncia sem Fronteiras.', 'Bolsa, aux�lio deslocamento e instala��o, aux�lio � pesquisa na forma de custeio e cotas adicionais.', 'O coordenador do projeto, como proponente, deve ser bolsista produtividade ou equivalente e ter v�nculo formal com a institui��o de execu��o do projeto.\r\nO candidato � bolsa Pesquisador Visitante Especial, no momento do envio da proposta, deve residir no exterior e apresentar, no Curr�culo Lattes ou no modelo de Curr�culo anexado � chamada, o hist�rico de registro de patentes e/ou publica��es cient�ficas.', '0800 61 61 61 (para conte�do da chamada) ou suporte@cienciasemfronteiras.gov.br (para dificuldades no acesso ou preenchimento).', '', '�reas contempladas no Programa Ci�ncia sem Fronteiras.', '', '', '', '', '', 'Para esclarecimentos e aux�lio, favor entrar em contato com o Observat�rio de Pesquisa Desenvolvimento & Inova��o - pdi@pucpr.br, (41) 3271-2128', 'A', '', '', 'http://www.cnpq.br/web/guest/chamadas-publicas?p_p_id=resultadosportlet_WAR_resultadoscnpqportlet_INSTANCE_0ZaM&filtro=abertas&detalha=chamadaDivulgada&idDivulgacao=4602', 0, 19, 'Observat�rio', 20140811, '', 'francine.zucco', 'Terceiro calend�rio de propostas para bolsas Pesquisador Visitante Especial', '', 0, 1, 38, 1, 0, 1),
(20, 'Programa CsF ? Bolsas no Pa�s Modalidade Atra��o de Jovens Talentos', '2014-08-11', '00038', 'pt_BR', 'N� 02/2014', '2014-09-15', '1900-01-01', '1900-01-01', 'Atrair e estimular a fixa��o no Brasil de jovens pesquisadores de talento, residentes no exterior, brasileiros ou estrangeiros, com destacada produ��o cient�fica ou tecnol�gica nas �reas contempladas do Programa Ci�ncia sem Fronteiras.', 'Mensalidade, aux�lio deslocamento e instala��o, aux�lio � pesquisa na forma de custeio e cotas adicionais.', 'O coordenador do projeto, como proponente, deve ser bolsista produtividade PQ/DT ou equivalente e ter v�nculo formal com a institui��o de execu��o do projeto. O candidato � bolsa Atra��o de Jovens Talento de possuir t�tulo de doutor, residir no exterior e apresentar, no Curr�culo Lattes ou no modelo de Curr�culo anexado � chamada, o hist�rico de registro de patentes e/ou publica��es cient�ficas.', '0800 61 61 61 (para conte�do da chamada) ou suporte@cienciasemfronteiras.gov.br (para dificuldades no acesso ou preenchimento).', '', '�reas contempladas no Programa Ci�ncia sem Fronteiras.', '', '', '', '', '', 'Para esclarecimentos e aux�lio, favor entrar em contato com o Observat�rio de Pesquisa Desenvolvimento & Inova��o - pdi@pucpr.br, (41) 3271-2128', 'A', '', '', 'http://www.cnpq.br/web/guest/chamadas-publicas?p_p_id=resultadosportlet_WAR_resultadoscnpqportlet_INSTANCE_0ZaM&id=426-1-2232&detalha=chamadaDetalhada&filtro=abertas', 0, 20, 'Observat�rio', 20140811, '', 'francine.zucco', 'Terceiro calend�rio de propostas para bolsas atra��o de Jovens Talentos', '', 0, 1, 38, 1, 0, 1),
(21, 'CHAMADA INCT - MCTI/CNPq/CAPES/FAPs', '2014-06-11', '00005', 'pt_BR', 'n� 16/2014', '2014-09-08', '1900-01-01', '2015-03-06', 'Apoiar atividades de pesquisa cient�fica, tecnol�gica e de inova��o em �reas estrat�gicas e/ou na fronteira do conhecimento que visem a busca de solu��o de grandes problemas nacionais, por meio de Institutos Nacionais de Ci�ncia e Tecnologia, no �mbito do PROGRAMA INCT.', 'Custeio, capital e bolsas - total de at� R$ 10 milh�es.', '- O coordenador do projeto, como proponente, deve ser bolsista produtividade PQ/DT n�vel 1 ou equivalente; \r\n<br>- contrapartida da institui��o (uso da estrutura, disponibiliza��o de profissional especializado); \r\n<br>- o Instituto deve atender �s caracter�sticas essenciais descritas na chamada, ser composto por no m�nimo 8 pesquisadores doutores e com Comit� Gestor com pelo menos 5 doutores de, no m�nimo, 3 institui��es distintas; \r\n<br>Os Institutos devem abranger preferencialmente quatro vertentes: pesquisa, forma��o de recursos humanos, internacionaliza��o e transfer�ncia do conhecimento para o Setor Empresarial e/ou para o Setor P�blico. Adicionalmente, considerando seu car�ter estrat�gico, todos os INCT devem obrigatoriamente prever a��es em uma quinta vertente, a de difus�o e dissemina��o do conhecimento para a sociedade.', 'inct2014@cnpq.br', '', 'Temas preferencialmente apoiados: \r\n<br>- Tecnologias ambientais e mitiga��o de mudan�as clim�ticas\r\n<br>- Biotecnologia e uso sustent�vel da biodiversidade\r\n<br>- Agricultura\r\n<br>- Sa�de e f�rmacos\r\n<br>- Espa�o, defesa e seguran�a nacional\r\n<br>- Desenvolvimento urbano\r\n<br>- Seguran�a p�blica\r\n<br>- Fontes alternativas de energias renov�veis, biocombust�veis e bioenergia\r\n<br>- Nanotecnologia\r\n<br>- Pesquisa Nuclear\r\n<br>- Tecnologia da informa��o e comunica��o\r\n<br>- Controle e Gerenciamento de Tr�fego A�reo.', '', '', '', '', '', 'Para esclarecimentos e aux�lio, favor entrar em contato com o Observat�rio de Pesquisa Desenvolvimento & Inova��o - pdi@pucpr.br, (41) 3271-2128', '!', '', '', 'http://www.cnpq.br/web/guest/chamadas-publicas?p_p_id=resultadosportlet_WAR_resultadoscnpqportlet_INSTANCE_0ZaM&filtro=abertas&detalha=chamadaDivulgada&idDivulgacao=4862', 0, 21, 'Observat�rio', 20140616, '1', 'francine.zucco', '', '', 0, 1, 5, 1, 0, 4),
(22, '<br>PR�MIO CAPES DE TESE 2014', '2014-06-10', '00007', 'pt_BR', 'Edital n� 33/2014', '2014-06-26', '1900-01-01', '2014-09-25', 'O Pr�mio Capes de Tese e o Grande Pr�mio Capes de Tese s�o pr�mios concedidos anualmente pela Capes �s melhores teses de doutorado defendidas e aprovadas nos cursos reconhecidos pelo MEC, considerando os quesitos originalidade e qualidade. \r\nO Pr�mio � outorgado para a melhor tese de doutorado selecionada em cada uma das �reas do conhecimento reconhecidas pela CAPES.\r\n<br>O Grande Pr�mio Capes de Tese � outorgado para a melhor tese selecionada nas �reas de 1)Ci�ncias Biol�gicas, Ci�ncias da Sa�de e Ci�ncias Agr�rias; 2)Engenharias e Ci�ncias Exatas e da Terra; 3)Ci�ncias Humanas, Ling��stica, Letras e Artes, Ci�ncias Sociais Aplicadas e Ensino de Ci�ncias.', '- Aux�lios equivalentes a uma participa��o em congresso nacional ou internacional para o orientador;\r\n<br>- bolsa para realiza��o de est�gio p�s-doutoral no Brasil e/ou no exterior para o autor;\r\n<br>- pr�mios adicionais em dinheiro, em parceria com a Funda��o Conrado Wessel, Funda��o Carlos Chagas e Instituto Paulo Gontijo.', 'A tese deve ter sido defendida no Brasil e em PPG que tenha tido, no m�nimo, 3 teses de doutorado defendidas no ano do pr�mio e deve estar dispon�vel no banco de teses da Capes. Deve primeiramente passar por uma pr�-sele��o dentro da institui��o, realizada por uma comiss�o de avalia��o instaurada pelo Programa de Doutorado. \r\n<br>Concorrer�o ao Grande Pr�mio Capes de Tese os autores vencedores do Pr�mio Capes de Tese que apresentarem � Capes uma v�deo-aula com dura��o de 20 a 30 minutos, em CD ou DVD, destinada a estudantes de ensino m�dio, abordando, de forma apropriada a tal n�vel educacional, o tema da tese de doutorado.', 'premiocapes@capes.gov.br', '', '�reas de conhecimento reconhecidas pela CAPES.', '', '', '', '', 'O coordenador do programa de p�s-gradua��o dever� ser o respons�vel pela inscri��o.', 'Para esclarecimentos e aux�lio, favor entrar em contato com o Observat�rio de Pesquisa Desenvolvimento & Inova��o - pdi@pucpr.br, (41) 3271-2128', 'A', '', '', 'http://www.capes.gov.br/images/stories/download/editais/262014-033-2014-PCT.pdf', 0, 22, 'Observat�rio', 20140611, '', 'francine.zucco', '', '', 0, 1, 7, 1, 0, 1),
(23, 'Edital de Concurso para Bolsa de Doutorado SENAI-PR', '2014-06-11', '00039', 'pt_BR', 'N�. 506/2014', '1900-01-01', '2014-06-23', '2014-07-04', 'Sele��o de Pesquisadores para concess�o de 13 bolsas de Doutorado por 20 meses para o desenvolvimento de atividades de pesquisa previstas e planejadas nos projetos de Inova��o Tecnol�gica aprovados no Edital Senai Sesi de Inova��o 2013 em parceria com ind�strias e realizado em conjunto com a Funda��o Arauc�ria.', 'Bolsa doutorado.', 'Possuir t�tulo de doutor e n�o acumular bolsa de nenhuma natureza.', 'anay.mello@fiepr.org.br', '', 'Madeira e mobili�rio; Design, Sensores Eletroqu�micos; Tintas e Revestimentos; Qu�mica; Biotecnologia; Ci�ncias Biol�gicas; Engenharias El�trica e Eletr�nica; F�sica; Papel e Celulose - de acordo com a cidade.', '', '', '', '', 'Os documentos dever�o ser entregues, pessoalmente ou via postal, � Comiss�o de Licita��es do Sistema FIEP, em envelope �nico, contendo etiqueta conforme modelo apresentado no edital.', 'Para esclarecimentos e aux�lio, favor entrar em contato com o Observat�rio de Pesquisa, Desenvolvimento & Inova��o - pdi@pucpr.br, (41) 3271-2128.', 'A', '', '', 'http://app2.fiepr.org.br/licitacao/pub/arquivos/c6b7673a88e5750bf7957c84629ded54.pdf', 0, 23, 'Observat�rio', 20140611, '', 'francine.zucco', '', '', 0, 1, 39, 1, 0, 1),
(24, 'Programa Centros Associados para o Fortalecimento da P�s-Gradua��o Brasil-Argentina (CAFP-BA)', '2014-06-11', '00007', 'pt_BR', 'Edital n� 32/2014', '2014-07-30', '1900-01-01', '2014-11-01', 'O programa consiste em projetos de parcerias universit�rias entre pelo menos uma IES brasileira e uma argentina, exclusivamente em n�vel de p�s-gradua��o, para o fomento ao interc�mbio de estudantes de p�s-gradua��o e o aperfei�oamento de docentes, pesquisadores e professores visitantes, em diversas �reas do conhecimento, para fortalecimento dos cursos de p�s-gradua��o nos dois pa�ses.', 'Passagens a�reas internacionais e di�rias para miss�es de trabalho, bolsas e passagens para miss�o de estudos e material de consumo.', 'Os coordenadores das equipes do projeto dever�o possuir o t�tulo de doutor h� pelo menos 4 anos; <br>-para atuar como entidade PROMOTORA, o PPG deve possuir conceito superior ou igual a 5, para atuar como RECEPTORA, nota 3 ou 4 na avalia��o CAPES; <br>-as propostas dever�o apresentar equipe de trabalho brasileira com, no m�nimo, 2 docentes Doutores, al�m do coordenador, vinculados � institui��o.', 'cafp@capes.gov.br', '', 'Diversas �reas de conhecimento.', '', '', '', '', '', 'Para esclarecimentos e aux�lio, favor entrar em contato com o Observat�rio de Pesquisa, Desenvolvimento & Inova��o - pdi@pucpr.br, (41) 3271-2128.', '!', '', '', 'http://www.capes.gov.br/cooperacao-internacional/argentina/centros-associados-cafp', 0, 24, 'Observat�rio', 20140617, '1', 'francine.zucco', '', '', 0, 1, 7, 1, 0, 4);
INSERT INTO `fomento_edital` (`id_ed`, `ed_titulo`, `ed_dt_create`, `ed_agencia`, `ed_idioma`, `ed_chamada`, `ed_dt_deadline_elet`, `ed_dt_deadline_envio`, `ed_dt_previsao_divulg_res`, `ed_texto_1`, `ed_texto_2`, `ed_texto_3`, `ed_texto_4`, `ed_texto_5`, `ed_texto_6`, `ed_texto_7`, `ed_texto_8`, `ed_texto_9`, `ed_texto_10`, `ed_texto_11`, `ed_texto_12`, `ed_status`, `ed_autor`, `ed_corpo`, `ed_url_externa`, `ed_total_visualizacoes`, `ed_codigo`, `ed_local`, `ed_data_envio`, `ed_document_require`, `ed_login`, `ed_titulo_email`, `ed_edital_tipo`, `ed_fluxo_continuo`, `fdis_id`, `fag_id`, `i_id`, `ftp_id`, `fs_id`) VALUES
(25, 'Programa Centros Associados da P�s-Gradua��o Brasil-Argentina (CAPG-BA)', '2014-06-11', '00007', 'pt_BR', 'EDITAL N� 31/2014', '2014-07-30', '1900-01-01', '1900-01-01', 'O programa tem como objetivo o est�mulo ao interc�mbio acad�mico de docentes, pesquisadores e estudantes brasileiros e argentinos vinculados a programas de p�s-gradua��o de Institui��es de Ensino Superior (IES) e a promo��o da forma��o de recursos humanos de alto n�vel nos dois pa�ses, nas diversas �reas do conhecimento.', 'Passagens a�reas internacionais e di�rias para miss�es de trabalho, bolsas e passagens para miss�o de estudos e material de consumo.', 'Os coordenadores das equipes do projeto dever�o possuir o t�tulo de doutor h� pelo menos 4 anos e o PPG deve possuir conceito CAPES superior ou igual a 5.', 'capg@capes.gov.br', '', 'Diversas �reas de conhecimento.', '', '', '', '', '', 'Para esclarecimentos e aux�lio, favor entrar em contato com o Observat�rio de Pesquisa, Desenvolvimento & Inova��o - pdi@pucpr.br, (41) 3271-2128.', '!', '', '', 'http://www.capes.gov.br/cooperacao-internacional/argentina/centros-associados-capg', 0, 25, 'Observat�rio', 20140613, '1', 'francine.zucco', '', '', 0, 1, 7, 1, 0, 4),
(26, 'Programa CAPES/STIC-AmSud Coopera��o Brasil-Fran�a-Am�rica do Sul em Tecnologia da Informa��o', '2014-06-17', '00007', 'pt_BR', 'EDITAL N� 30/2014', '2014-07-17', '1900-01-01', '1900-01-01', 'O Programa regional STIC-AmSud � uma iniciativa da coopera��o francesa com suas contrapartes da Argentina, Brasil, Chile, Peru e Uruguai, orientada para promover e fortalecer a colabora��o e a cria��o de redes de pesquisa-desenvolvimento no �mbito das Ci�ncias e Tecnologias da Informa��o e da Comunica��o (STIC), atrav�s da realiza��o de projetos conjuntos de pesquisa.', 'Miss�es de trabalho e miss�es de estudo.', '-Os coordenadores das equipes do projeto dever�o possuir o t�tulo de doutor h� pelo menos 4 anos; <br>-o PPG deve possuir preferencialmente conceito 5, 6 ou 7; <br>-as propostas dever�o apresentar equipe de trabalho brasileira com, no m�nimo, 2 (dois) docentes Doutores, al�m do coordenador, vinculados � institui��o e apresentar tamb�m car�ter inovador; <br>-o grupo de pesquisa brasileiro dever� estar associado, no m�nimo, a uma equipe francesa e a \r\numa sul-americana.', 'sticamsud@capes.gov.br', '', 'Ci�ncias e Tecnologias da Informa��o e da Comunica��o (STIC).', '', '', '', '', '', 'Para esclarecimentos e aux�lio, favor entrar em contato com o Observat�rio de Pesquisa, Desenvolvimento & Inova��o - pdi@pucpr.br, (41) 3271-2128.', 'A', '', '', 'http://www.capes.gov.br/editais/abertos/5978-stic-amsud', 0, 26, 'Observat�rio', 20140617, '1', 'francine.zucco', '', '', 0, 1, 7, 1, 0, 1),
(27, 'Chamada para projetos de P&D das empresas de distribui��o da Eletrobras', '2014-06-23', '00040', 'pt_BR', '2014-15', '2014-07-18', '1900-01-01', '2014-11-01', 'Sele��o de projetos de P&D a serem desenvolvidos para empresas de distribui��o da Eletrobras.', 'Aquisi��o de Materiais/Equipamentos; apoio � Infraestrutura; recursos humanos, servi�os de terceiros; viagens e di�rias; outros.', '-A proponente pode ser Universidade, Institui��o de Ensino Superior ou Institui��o de \r\nPesquisa, Cient�fica ou Tecnol�gica; <br>-deve  possuir compet�ncia e atua��o \r\nno tema em quest�o e estar preferencialmente sediada nas Regi�es Norte, \r\nNordeste e Centro Oeste; <br>-o projeto deve apresentar car�ter inovativo nas �reas de interesse descritas no edital.', 'pedpee.distribuicao@eletrobras.com', '', 'Sistemas de energia el�trica: Meio ambiente, planejamento, seguran�a, opera��es, qualidade,  supervis�o e controle, medi��o e combate �s perdas.', '', '', '', '', 'As propostas dever�o ser encaminhadas unicamente atrav�s da p�gina da Eletrobras: www.eletrobras.com/elb/chamadaprojetosped, de acordo com as instru��es e esclarecimentos apresentados na mesma p�gina.', 'Para esclarecimentos e aux�lio, favor entrar em contato com o Observat�rio de Pesquisa, Desenvolvimento & Inova��o - pdi@pucpr.br, (41) 3271-2128.', 'A', '', '', 'http://www.eletrobras.com/elb/chamadaprojetosped/main.asp', 0, 27, 'Observat�rio', 20140623, '', 'francine.zucco', '', '', 0, 1, 40, 1, 0, 1),
(28, 'Capes/Fulbright - Est�gio P�s-Doutoral em Ci�ncias Humanas, Ci�ncias Sociais, Letras e Artes nos EUA', '2014-06-23', '00007', 'pt_BR', 'EDITAL N� 34/2014', '2014-07-31', '1900-01-01', '2014-09-01', 'Selecionar candidatos para bolsas de Est�gio P�s-Doutoral, no �mbito do Programa CAPES/Fulbright Est�gio P�s-Doutoral em Ci�ncias Humanas, Ci�ncias Sociais, Letras e Artes nos EUA, incrementar as pesquisas realizadas por rec�m-doutores no pa�s nestas �reas e estreitar as rela��es bilaterais entre os dois pa�ses.', 'Mensalidade; aux�lios pesquisa, deslocamento, seguro sa�de, instala��o, e participa��o em eventos.', 'Possuir nacionalidade brasileira, n�o cumulada com nacionalidade norte-americana; <br>-ter obtido o diploma de doutorado ap�s 31 de dezembro de 2006; <br>-ter profici�ncia em l�ngua inglesa; <br>-n�o ter usufru�do anteriormente de outra bolsa de est�gio p�s-doutoral no exterior ou aux�lio financeiro para o mesmo objetivo; <br>-residir atualmente no Brasil.', 'fulbright@capes.gov.br; posdoc@fulbright.org.br', '', 'Ci�ncias Humanas, Ci�ncias Sociais, Letras e Artes.', '', '', '', '', 'As inscri��es ser�o gratuitas e feitas exclusivamente pela internet, mediante o preenchimento do formul�rio de inscri��o da Comiss�o Fulbright, em ingl�s, no endere�o www.fulbright.org.br.', 'Para esclarecimentos e aux�lio, favor entrar em contato com o Observat�rio de Pesquisa, Desenvolvimento & Inova��o - pdi@pucpr.br, (41) 3271-2128.', 'A', '', '', 'http://www.capes.gov.br/editais/abertos/6426-bolsa-capes-fulbright-estagio-pos-doutoral-nas-ciencias-humanas-ciencias-sociais-letras-e-artes-nos-eua', 0, 28, 'Observat�rio', 20140624, '', 'francine.zucco', '', '', 0, 1, 7, 1, 0, 1),
(29, 'PR�MIO DE INCENTIVO EM CI�NCIA E TECNOLOGIA PARA O SUS\r\nXIII EDI��O ? ANO 2014', '2014-06-18', '00041', 'pt_BR', 'XIII EDI��O ? ANO 20', '2014-07-11', '1900-01-01', '1900-01-01', 'O concurso visa � obten��o de trabalhos cient�fico-tecnol�gicos de pesquisadores, estudiosos e profissionais de sa�de ou de qualquer �rea do conhecimento em n�vel de p�s-gradua��o conclu�da, com tem�tica voltada para a �rea de Ci�ncia e Tecnologia em Sa�de, e potencial de incorpora��o pelo Sistema �nico de Sa�de e servi�os de sa�de.', '<br>PREMIA��O</br>\r\n<br>A) Tese de doutorado (R$ 50.000,00);</br>\r\n<br>B) Disserta��o de mestrado (R$ 30.000,00);</br>\r\n<br>C) Trabalho cient�fico publicado (R$ 50.000,00);</br>\r\n<br>D) Monografia de especializa��o/resid�ncia (R$ 15.000,00).</br>', '<br>O Pr�mio de Incentivo em Ci�ncia e Tecnologia para o SUS - ano 2014 � composto por quatro categorias: Tese de Doutorado; Disserta��o de Mestrado; Trabalho Cient�fico Publicado e Monografia de Especializa��o ou Resid�ncia (maiores detalhes no edital).', 'Para informa��es, enviar mensagem para o seguinte endere�o eletr�nico: decit.premio@saude.gov.br', '', '', '', '', '', '', 'As inscri��es para a primeira fase do Pr�mio de Incentivo em Ci�ncia e Tecnologia para o SUS - ano 2014 - ser�o efetuadas somente via internet, no endere�o eletr�nico http://www.saude.gov.br/premio no per�odo entre �s 10 horas do dia 27 de maio de 2014, at� �s 18h do dia 11 de julho de 2014, observado o hor�rio oficial de Bras�lia-DF.', 'Para esclarecimento de d�vidas e aux�lio no envio da proposta, favor entrar em contato com o Observat�rio PD&I pelo Ramal: 2128 ou e-mail: <a href="mailto:pdi@pucpr.br" style="color: navy; text-decoration: none; font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 11.818181991577148px; text-align: justify; background-color: rgb(255, 255, 255);">pdi@pucpr.br</a><span style="font-family: Verdana; font-size: 11.818181991577148px; text-align: justify; background-color: rgb(255, 255, 255);">.</span></p>', 'A', '', '', 'http://bvsms.saude.gov.br/bvs/ct/premio/', 0, 29, 'Observat�rio', 20140618, '', 'jeferson.vieira', '', '', 0, 1, 41, 1, 0, 1),
(30, 'Bolsa CAPES - Fulbright Professor/Pesquisador Visitante nos EUA', '2014-06-18', '00007', 'pt_BR', 'EDITAL N� 35/2014', '2014-07-31', '1900-01-01', '2014-09-01', 'Selecionar candidatos para bolsas de Professor/Pesquisador Visitante nos EUA para ministrar aulas, realizar pesquisas e desenvolver atividades de orienta��o t�cnica e cient�fica, em renomadas institui��es de ensino superior. Destacar no meio universit�rio e de pesquisa dos EUA a atua��o de cientistas brasileiros em diversas �reas do conhecimento e promover o mais alto n�vel de aproxima��o, di�logo e aprofundamento no conhecimento m�tuo das respectivas culturas e sociedades.', 'Mensalidade; aux�lios pesquisa, deslocamento, seguro sa�de e instala��o.', '-Possuir nacionalidade brasileira, n�o cumulada com nacionalidade norte-americana; <br>-ter obtido o diploma de doutorado anteriormente a janeiro de 2007; <br>-possuir v�nculo empregat�cio com institui��o de ensino superior ou institui��o de pesquisa; <br>-ter profici�ncia em l�ngua inglesa; <br>-n�o ter usufru�do anteriormente de outra bolsa de est�gio p�s-doutoral no exterior ou aux�lio financeiro para o mesmo objetivo; <br>-residir atualmente no Brasil.', 'fulbright@capes.gov.br', '', 'Diversas �reas de conhecimento.', '', '', '', '', 'As inscri��es ser�o gratuitas e feitas exclusivamente, pela internet, mediante o preenchimento do formul�rio de inscri��o da Comiss�o Fulbright, em ingl�s, dispon�vel no endere�o www.fulbright.org.br', 'Para esclarecimentos e aux�lio, favor entrar em contato com o Observat�rio de Pesquisa, Desenvolvimento & Inova��o - pdi@pucpr.br, (41) 3271-2128.', 'A', '', '', 'http://www.capes.gov.br/images/stories/download/editais/1652014-035-2014-PVE-EUA.pdf', 0, 30, 'Observat�rio', 20140618, '', 'francine.zucco', '', '', 0, 1, 7, 1, 0, 1),
(31, 'Programa CAPES/Universidade de Dundee-Reino Unido - Sele��o de Bolsistas para Doutorado-Pleno', '2014-07-01', '00007', 'pt_BR', 'EDITAL N�. 36/2014', '2014-07-31', '1900-01-01', '2014-10-01', 'Apoiar estudantes brasileiros que pretendem realizar seu doutorado na Universidade de Dundee e estreitar as rela��es bilaterais entre os dois pa�ses.', 'Mensalidade, aux�lio deslocamento, aux�lio seguro-sa�de e aux�lio instala��o.', '-Possuir nacionalidade brasileira; <br>-ter diploma de n�vel superior e, preferencialmente, diploma de mestrado reconhecido pela CAPES; <br>-n�o ter sido agraciado anteriormente com bolsa de estudos no exterior, em n�vel de doutorado e nem receber bolsa ou benef�cio financeiro para o mesmo objetivo.', 'dundee@capes.gov.br; CLS-PhDAdmin@dundee.ac.uk', '', 'Biologia', '', '', '', '', 'O candidato dever�, obrigatoriamente, apresentar sua candidatura simultaneamente � CAPES e � Universidade de Dundee, composta de projeto de pesquisa, formul�rios e documenta��o complementar. Para candidatura na Universidade de Dundee, os candidatos devem submeter o CV para o email CLS-PhDAdmin@dundee.ac.uk.', 'Para esclarecimentos e aux�lio, favor entrar em contato com o Observat�rio de Pesquisa, Desenvolvimento & Inova��o - pdi@pucpr.br, (41) 3271-2128.', 'A', '', '', 'http://www.capes.gov.br/editais/abertos/6200-programa-capesuniversidade-de-dundee-bolsa-de-doutorado-pleno-', 0, 31, 'Observat�rio', 20140701, '', 'francine.zucco', '', '', 0, 1, 7, 1, 0, 1),
(32, 'Reimagine Education Awards', '2014-07-18', '00042', 'us_EN', 'Awards 2014', '2014-09-26', '1900-01-01', '1900-01-01', 'Preparar os l�deres de amanh� em todos os dom�nio da vida e trabalho; atender �s necessidade de bilh�es de pessoas que necessitam desenvolver suas compet�ncias em um mundo em exponencial mudan�a cientifica e tecnol�gica; atender �s necessidades educacionais de todos os tipos de estudantes; promover o aproveitamento m�ximo dos m�todos educacionais presenciais e � dist�ncia; e apoiar o aprendizado ao longo da vida.', 'Pr�mio de $ 50,000.00 e divulga��o na m�dia via QS.', 'Experimentos pedag�gicos com resultados mensur�veis e impacto definido, de metodologia replic�vel e inspiradora.', '', '', 'E-learning, ensino semi- e presencial nas seguintes categorias: Artes e Humanas ? Engenharias e Tecnologia ? Ci�ncias da Vida e Natureza ? Medicina ? Ci�ncias Sociais ? Educa��o Profissional e Executiva e metodologias pedag�gicas inovadoras.', '', '', '', '', 'O Competition Submission Form deve ser preenchido e enviado juntamente com os documentos relevantes descritos no site. A inscri��o em seu total n�o deve ultrapassar 2 mil palavras, ou quantidade equivalente de m�dia adicional.', 'Para esclarecimentos e aux�lio, favor entrar em contato com o Observat�rio de Pesquisa, Desenvolvimento & Inova��o - pdi@pucpr.br, (41) 3271-2128.', 'A', '', '', 'http://reimagine-education.com/', 0, 32, 'Observat�rio', 20140718, '', 'francine.zucco', '', '', 0, 1, 42, 2, 0, 1),
(33, 'OPORTUNIDADE PARA ATRAIR JOVENS PESQUISADORES: CNPq / TWAS Fellowships Programme', '2014-07-01', '00005', 'pt_BR', 'N� 009/2014', '2014-07-28', '1900-01-01', '2014-11-01', 'Selecionar jovens pesquisadores provenientes de pa�ses em desenvolvimento (� exce��o do Brasil) para realizar parte de sua forma��o no Brasil, em n�vel de Doutorado Pleno, Doutorado Sandu�che ou P�s-Doutorado.', 'Bolsas de doutorado, doutorado sandu�che e p�s-doutorado, aux�lio deslocamento.', 'Jovens pesquisadores provenientes de pa�ses em desenvolvimento (� exce��o do Brasil), possuir dom�nio da l�ngua portuguesa, aplicar para PPGs de conceito igual ou superior a 5.', 'twas.ascin@cnpq.br', '', 'Ci�ncias Agr�rias, Ci�ncias Biol�gicas, Ci�ncias M�dicas e da Sa�de, Qu�mica, Engenharias, Matem�tica, Ci�ncias da Computa��o, F�sica, Astronomia e Geoci�ncias, Oceanografia.', '', '', '', '', '', 'Para esclarecimentos e aux�lio, favor entrar em contato com o Observat�rio de Pesquisa, Desenvolvimento & Inova��o - pdi@pucpr.br, (41) 3271-2128.', 'A', '', '', 'http://www.cnpq.br/web/guest/chamadas-publicas?p_p_id=resultadosportlet_WAR_resultadoscnpqportlet_INSTANCE_0ZaM&filtro=abertas&detalha=chamadaDivulgada&idDivulgacao=4842', 0, 33, 'Observat�rio', 20140701, '', 'francine.zucco', '', '', 0, 1, 5, 1, 0, 1),
(34, '<br>Pr�mio Santander Universidades', '2014-08-26', '00044', 'pt_BR', '2014', '2014-09-18', '1900-01-01', '1900-01-01', 'Reconhecer, incentivar e premiar ideias e projetos relevantes de alunos, professores, pesquisadores e Institui��es de Ensino Superior.', 'R$ 2 milh�es em pr�mios e bolsas de estudos internacionais.', '<br>1.Pr�mio Santander Ci�ncia e Inova��o: Pesquisadores-doutores formados e que sejam docentes em Institui��es de Ensino Superior. <br>2.Pr�mio Santander Empreendedorismo: Graduandos e P�s-graduandos. <br>3.Pr�mio Santander Universidade Solid�ria: Professores e Alunos que tenham interesse ou que j� realizam projetos sociais de desenvolvimento sustent�vel com �nfase em gera��o de renda. <br>4.Pr�mio Guia do Estudante ? Destaques do Ano: Institui��es de Ensino Superior.', 'Para d�vidas, consulte: http://universidades.ciatech.com.br/faq', '', 'Diversas �reas de conhecimento', '', '', '', '', '', 'Para esclarecimentos e aux�lio, favor entrar em contato com o Observat�rio de Pesquisa, Desenvolvimento & Inova��o - pdi@pucpr.br, (41) 3271-2128.', '!', '', '', 'http://www.santander.com.br/portal/wps/gcm/package/wps/universidades_10062014_89828.zip/correntistas_conta_premios.htm', 0, 34, 'Observat�rio', 20140826, '', 'francine.zucco', 'Pr�mio Santander: inscri��es at� 18/09', '', 0, 1, 44, 1, 0, 4),
(35, '<br>Apoio � concess�o de bolsas FA?FPTI', '2014-07-08', '00045', 'pt_BR', 'Edital FPTI-BR 058', '2014-07-30', '1900-01-01', '1900-01-01', 'Conceder apoio financeiro a coordenadores de projetos de pesquisa vinculados a Institui��es de Ensino Superior atrav�s da contrapartida da Funda��o Parque Tecnol�gico Itaipu por meio deste Edital e por meio da contrapartida da Funda��o Arauc�ria, atrav�s da Chamada P�blica 02/2014, para submiss�o de projetos de pesquisa que estejam contemplados nas �reas de meio ambiente, energia e desenvolvimento territorial.', 'Bolsas e custeio. O coordenador, caso julgue necess�rio, poder� submeter o mesmo projeto de pesquisa � Chamada P�blica n� 02/2014 para obten��o de apoio suplementar a novas bolsas de pesquisa.', 'A pesquisa deve ter foco em algum dos territ�rios dispostos no Anexo I do edital (regi�o de Itaipu), ser um projeto cient�fico caracterizado como de desenvolvimento tecnol�gico ou de inova��o.', 'ptict@pti.org.br', '', 'Meio ambiente e recursos h�dricos; Energia e Desenvolvimento territorial.', '', '', '', '', '', 'Para esclarecimentos e aux�lio, favor entrar em contato com o Observat�rio de Pesquisa, Desenvolvimento & Inova��o - pdi@pucpr.br, (41) 3271-2128.', 'A', '', '', 'http://www.pti.org.br/sites/default/files/edital_058-2014_-_agp_-_apoio_a_grupos_de_pesquisa.pdf', 0, 35, 'Observat�rio', 20140703, '1', 'francine.zucco', '', '', 0, 1, 45, 1, 0, 1),
(36, 'Biodiversidade do Paran� - Funda��o Arauc�ria e Funda��o Grupo Botic�rio', '2014-07-04', '00002', 'pt_BR', 'Chamada P�blica 08/2', '2014-08-31', '1900-01-01', '1900-01-01', 'Apoiar propostas que visem contribuir efetivamente para a conserva��o da natureza, priorizando a regi�o da Floresta Ombr�fila Mista (floresta  com  arauc�rias)  e fitofisionomia  associadas,  al�m da regi�o do  Lagamar compreendida nos limites do litoral do Paran�.', 'Bolsas, material de consumo, servi�os de terceiros, despesas com viagem, material permanente, taxas administrativas. <br>Propostas no valor m�ximo de R$ 300.000,00', '', 'Funda��o Arauc�ria: projetos2@fundacaoaraucaria.org.br ou (41) 3218-9263 <br>Funda��o Grupo Botic�rio: edital@fundacaogrupoboticario.org.br, por meio da ferramenta espec�fica de correio do SiSGER ou (41) 3340-2638.', '', '1.Unidades de Conserva��o de Prote��o Integral (continentais e marinhas) e RPPNs: cria��o e amplia��o de UCs e execu��o de seus Planos de Manejo;\r\n<br>2.Esp�cies Amea�adas: execu��o de Planos de A��o Nacionais (PAN), a��es emergenciais para prote��o e defini��o de status de amea�a de esp�cies nativas;\r\n<br>3.Ambientes Marinhos: estudos, prote��o e redu��o das press�es sobre a biodiversidade marinha.', '', '', '', '', '', 'Para esclarecimentos e aux�lio, favor entrar em contato com o Observat�rio de Pesquisa, Desenvolvimento & Inova��o - pdi@pucpr.br, (41) 3271-2128.', 'A', '', '', 'http://www.fappr.pr.gov.br/arquivos/File/chamadas2014/CP08_2014_FAFGB.pdf', 0, 36, 'Observat�rio', 20140704, '', 'francine.zucco', 'Oportunidade de recursos pela Funda��o Grupo Botic�rio', '', 0, 1, 2, 1, 0, 1),
(37, 'Pr�mio CAPES-INTERFARMA de Inova��o e Pesquisa', '2014-07-04', '00007', 'pt_BR', '2014', '2014-08-04', '1900-01-01', '1900-01-01', 'Reconhecer as melhores teses de doutorado defendidas em 2013 em Sa�de Humana ou �tica/Bio�tica no Brasil.', 'Para autores da tese: pr�mio no valor de R$ 26.495,75, passagem a�rea para comparecimento na cerim�nia de premia��o, trof�u, certificado de premia��o e bolsa para realiza��o de est�gio p�s-doutoral em institui��o nacional de at� tr�s anos, que poder� ser convertida em est�gio p�s-doutoral de um ano fora do pa�s. <br>Para orientadores: certificado, passagem a�rea para comparecimento na cerim�nia de premia��o e pr�mio para participa��o em congresso nacional no valor de R$ 3 mil.', '-A tese deve ter sido defendida no Brasil e em PPG que tenha tido, no m�nimo, 3 teses de doutorado defendidas no ano do pr�mio e deve estar dispon�vel no banco de teses da Capes. <br>-Deve passar por uma pr�-sele��o feita por uma comiss�o de avalia��o instaurada pelo Programa de Doutorado. O respons�vel pela inscri��o da tese ser� o coordenador do PPG.', 'PremioCapesInterfarma@capes.gov.br', '', '�rea de Sa�de Humana ou �tica/Bio�tica. <br>�reas e sub-�reas de avalia��o: Medicina, Odontologia, Farm�cia, Enfermagem ou Ci�ncias Biom�dicas.', '', '', '', '', '', 'Para esclarecimentos e aux�lio, favor entrar em contato com o Observat�rio de Pesquisa, Desenvolvimento & Inova��o - pdi@pucpr.br, (41) 3271-2128.', 'A', '', '', 'http://www.capes.gov.br/images/stories/download/editais/272014-Edital-Premio-Capes-Interfarma-2014.pdf', 0, 37, 'Observat�rio', 20140704, '', 'francine.zucco', 'Pr�mio CAPES de tese na �rea da Sa�de', '', 0, 1, 7, 1, 0, 1),
(38, 'Programa CAPES/DGPU de Coopera��o entre Brasil e Espanha', '2014-07-07', '00007', 'pt_BR', 'EDITAL N� 40/2014', '2014-08-17', '1900-01-01', '1900-01-01', 'Apoiar e fomentar Projetos Conjuntos de Pesquisa e para Semin�rios em diversas �reas e a troca de conhecimento cient�fico, de documenta��o e de publica��es especializadas, de acordo com os termos acordados entre as partes, bem como promover a mobilidade de docentes e estudantes de p�s-gradua��o, em n�vel de doutorado sandu�che e p�s-doutorado entre Brasil e Espanha.', 'Bolsas no exterior, aux�lio deslocamento, aux�lio instala��o, seguro sa�de, di�rias e recursos para material de custeio. ', 'O coordenador do projeto deve possuir t�tulo de doutor h� mais de 5 anos e estar em efetivo exerc�cio no magist�rio da educa��o superior durante todo o per�odo da pesquisa. A equipe brasileira dever� ser composta por pelo menos 2 doutores vinculados ao PPG, al�m do coordenador.', 'dgpu@capes.gov.br', '', 'Diversas �reas de conhecimento.', '', '', '', '', '', 'Para esclarecimentos e aux�lio, favor entrar em contato com o Observat�rio de Pesquisa, Desenvolvimento & Inova��o - pdi@pucpr.br, (41) 3271-2128.', 'A', '', '', 'http://www.capes.gov.br/cooperacao-internacional/espanha/capesdgpu', 0, 38, 'Observat�rio', 20140707, '1', 'francine.zucco', 'Oportunidade de recursos para Coopera��o com Institui��es Espanholas', '', 0, 1, 7, 1, 0, 1),
(39, 'Programa Paranaense de Pesquisas em Saneamento Ambiental - FA/SANEPAR', '2014-07-10', '00002', 'pt_BR', '09/2014', '2014-09-30', '2014-10-03', '1900-01-01', 'Apoiar a execu��o de projetos de pesquisa e desenvolvimento que contribuam com  a melhoria das condi��es do saneamento ambiental, representando significativa contribui��o para o desenvolvimento da ci�ncia, tecnologia e inova��o.', 'Ser�o financiados itens de capital (na propor��o m�xima de 20%) e de custeio (na propor��o m�nima de 80%), no valor global de at� R$ 150.000,00.', 'O coordenador deve possuir t�tulo de doutor e o projeto deve atender exclusivamente �s linhas tem�ticas dispostas no edital.', 'projetos@fundacaoaraucaria.org.br', '', 'Saneamento ambiental: �gua, esgoto, reuso, res�duos s�lidos, gest�o.', '', '', '', '', '', 'Para esclarecimentos e aux�lio, favor entrar em contato com o Observat�rio de Pesquisa, Desenvolvimento & Inova��o - pdi@pucpr.br, (41) 3271-2128.', 'A', '', '', 'http://www.fappr.pr.gov.br/arquivos/File/chamadas2014/CP09_2014_Saneamento.pdf', 0, 39, 'Observat�rio', 20140710, '1', 'francine.zucco', '', '', 0, 1, 2, 1, 0, 1),
(40, '<br>Gorgas Memorial Institute Research Award', '2014-07-07', '00046', 'pt_BR', '2014', '2014-07-23', '1900-01-01', '1900-01-01', 'Promover e facilitar o desenvolvimento de rela��es cient�ficas entre cientistas das Am�ricas por meio da oportunidade de viagens de curto prazo para pesquisadores em in�cio de carreira no sentido de: <br>-estabelecer projetos em colabora��o na �rea de biomedicina com foco em doen�as tropicais relevantes � comunidade local <br>-aprendizado de novas t�cnicas e metodologias aplic�veis ao estudo de tais doen�as.', 'Pr�mio de at� $20,000 para custos de viagem e relacionados ao projeto.', 'Ser cidad�o ou residente permanente na Am�rica, possuir doutorado na �rea de doen�as tropicais, ser pesquisador em in�cio de carreira.', 'Judy DeAcetis - j.deacetis@astmh.org <br>+1-847-480-9592; +1-847-480-9282', '', 'Sa�de p�blica, doen�as tropicais, doen�as infecciosas, microbiologia.', '', '', '', '', '', 'Para esclarecimentos e aux�lio, favor entrar em contato com o Observat�rio de Pesquisa, Desenvolvimento & Inova��o - pdi@pucpr.br, (41) 3271-2128.', 'A', '', '', 'http://www.astmh.org/AM/Template.cfm?Section=ASTMH_Sponsored_Fellowships&Template=/CM/ContentDisplay.cfm&ContentID=5833', 0, 40, 'Observat�rio', 20140707, '1', 'francine.zucco', 'Pr�mio internacional na �rea de doen�as tropicais', '', 0, 1, 46, 1, 0, 1),
(41, 'Programa de Bolsas de Mestrado e Doutorado - CAPES/FA', '2014-07-10', '00002', 'pt_BR', 'Chamada 11/2014', '2014-08-11', '2014-08-14', '1900-01-01', 'Conceder bolsas de mestrado e doutorado em todas as �reas do conhecimento, visando promover a consolida��o e o fortalecimento dos programas de p�s-gradua��o stricto sensu paranaenses recomendados pela CAPES e ofertados por institui��es paranaenses.', 'Bolsas para mestrado e doutorado.', 'O coordenador do curso/programa de P�s-Gradua��o, ou substituto legal, ser� o respons�vel pelo envio da proposta, podendo submeter apenas uma proposta por programa.', 'projetos@fundacaoaraucaria.org.br', '', 'Diversas �reas de conhecimento.', '', '', '', '', '', 'Para esclarecimentos e aux�lio, favor entrar em contato com o Observat�rio de Pesquisa, Desenvolvimento & Inova��o - pdi@pucpr.br, (41) 3271-2128.', 'A', '', '', 'http://www.fappr.pr.gov.br/arquivos/File/chamadas2014/CP11_2014_MeD.pdf', 0, 41, 'Observat�rio', 20140710, '1', 'francine.zucco', '', '', 0, 1, 2, 1, 0, 1),
(42, 'Inscri��o para bolsa P�s Doutorado na AstraZeneca pelo Programa Ci�ncia sem Fronteiras (Fluxo Cont�nuo).', '2014-07-15', '00038', 'pt_BR', '2014 ? Fluxo EUA/UK', '2014-12-31', '1900-01-01', '1900-01-01', '� a oportunidade para p�s-doutorados atuarem em um centro de pesquisas de refer�ncia mundial e fazer a diferen�a na sa�de de pacientes de todo o mundo. Est�o abertas 30 vagas para o per�odo de dois anos de estudos nos centros de pesquisa da Medlmmune, em Gaithersburg e Mountain View (EUA), e Cambridge (Reino Unido).', 'Bolsa p�s-doutorado.', 'Todos os documentos devem estar em Ingl�s, inclusive o Curr�culo Lattes (o usu�rio dever� optar pela publica��o em Ingl�s na Plataforma Lattes). Na Carta de Apresenta��o, em ingl�s, dever� ser informada a linha ou linhas de interesse (ver site).', 'curr�culos.posdoc@astrazeneca.com', '', 'Ci�ncias Biol�gicas e da Sa�de', '', '', '', '', '', 'Para esclarecimentos e aux�lio, favor entrar em contato com o Observat�rio de Pesquisa Desenvolvimento & Inova��o - pdi@pucpr.br, (41) 3271-2128', 'A', '', '', 'http://www.cienciasemfronteiras.gov.br/web/csf/reino-unido4', 0, 42, 'Observat�rio', 20140714, '', 'jeferson.vieira', '', '', 0, 1, 38, 1, 0, 1),
(43, 'Programa de Apoio � Forma��o de Profissionais no Campo das Compet�ncias Socioemocionais', '2014-07-15', '00007', 'pt_BR', 'EDITAL N� 044/2014', '2014-09-05', '1900-01-01', '2014-10-03', 'O programa apoiar� o desenvolvimento de 10 projetos em rede de pesquisa e de inova��o que permitam a cria��o de estrat�gias para o desenvolvimento de compet�ncias socioemocionais aliadas � forma��o de profissionais do magist�rio, bem como a melhoria da educa��o b�sica na rede p�blica.', 'Custeio no valor de at� R$ 100.000,00 e limite de R$ 466.440,00 em bolsas.', 'Poder�o submeter projetos professores que perten�am ao quadro de docentes de programas de p�s-gradua��o (PPG) em educa��o, psicologia, psicopedagogia e outras �reas afins, cujos programas tenham obtido nota igual ou superior a 3 na �ltima avalia��o da CAPES. Os projetos devem ser compostos por pelo menos 2 PPGs stricto sensu de 2 institui��es distintas.', 'cse@capes.gov.br', '', 'Educa��o. Foco no desenvolvimento de compet�ncias e habilidades socioemocionais como uma das dimens�es da forma��o docente, integrada �s demais.', '', '', '', '', 'Os projetos dever�o ser submetidos por meio do Sistema Integrado CAPES ? \r\nSICAPES (http://socioemocionais.capes.gov.br)', 'Para esclarecimentos e aux�lio, favor entrar em contato com o Observat�rio de Pesquisa, Desenvolvimento & Inova��o - pdi@pucpr.br, (41) 3271-2128.', 'A', '', '', 'http://www.capes.gov.br/educacao-basica/programa-capes-competencias-socioemocionais', 0, 43, 'Observat�rio', 20140715, '1', 'francine.zucco', 'Oportunidade na �rea de Educa��o - Parceria entre CAPES e Instituto Ayrton Senna', '', 0, 1, 7, 1, 0, 1),
(44, 'Programa de Apoio � P�s-Gradua��o e � Pesquisa Cient�fica e Tecnol�gica em Desenvolvimento Socioecon�mico no Brasil', '2014-07-21', '00007', 'pt_BR', 'PGPSE N� 42/ 2014', '2014-10-17', '2014-10-17', '2014-12-15', 'Estimular no Pa�s a realiza��o de projetos conjuntos de pesquisa com vistas a possibilitar o desenvolvimento de pesquisas cient�ficas e a forma��o de recursos humanos p�s-graduados na �rea de Desenvolvimento Socioecon�mico no Brasil, contribuindo, assim, para desenvolver e consolidar o pensamento brasileiro contempor�neo na �rea.', 'Bolsas, passagens a�reas, di�rias para miss�es de pesquisa e doc�ncia e despesas de custeio relacionadas �s atividades do projeto.', '-Dever� envolver parcerias (em rede ou cons�rcio) entre equipes de diferentes institui��es; <br>-cada projeto dever� indicar uma institui��o l�der vinculada a um PPG com nota superior ou igual a 5; <br>deve contemplar um m�nimo de 3 e um m�ximo de 4 equipes; <br>-o projeto dever� ter prioritariamente car�ter multi e interdisciplinar, contemplar a forma��o de RH e ter como objetivo final a forma��o de no m�nimo 3 doutores; <br>-cada coordenador institucional deve possuir t�tulo de doutor, sendo que o coordenador-geral h� pelo menos 5 anos.', 'pgpse@capes.gov.br', '', '�rea de Desenvolvimento Socioecon�mico, com �reas tem�ticas priorit�rias definidas no edital.', '', '', '', '', 'As propostas dever�o ser enviadas � CAPES em 2 (duas) vias, uma impressa, por correio e outra, digitalizada em formato PDF, por e&#8208;mail (pgpse@capes.gov.br)', 'Para esclarecimentos e aux�lio, favor entrar em contato com o Observat�rio de Pesquisa, Desenvolvimento & Inova��o - pdi@pucpr.br, (41) 3271-2128.', '!', '', '', 'http://www.capes.gov.br/bolsas/programas-especiais/desenvolvimento-socioeconomico-pgpse', 0, 44, 'Observat�rio', 20140721, '1', 'francine.zucco', '', '', 0, 1, 7, 1, 0, 4),
(45, 'Bolsa CAPES/FULBRIGHT Master of Fine Arts', '2014-07-18', '00007', 'pt_BR', 'EDITAL N� 45/2014', '2014-08-31', '1900-01-01', '1900-01-01', 'Sele��o de candidatos para concess�o, pela CAPES, de bolsa de estudo em n�vel de Mestrado em Produ��o Cinematogr�fica, visando � realiza��o de estudos em institui��es de ensino superior nos EUA que oferecem este n�vel de forma��o profissional.', 'Bolsa, aux�lio deslocamento e seguro sa�de.', '-Possuir nacionalidade brasileira, n�o cumulada com nacionalidade norte-americana; <br>-ter conclu�do curso superior; <br>-ter experi�ncia comprovada na �rea de elabora��o de roteiros para produ��es cinematogr�ficas e/ou audiovisuais; <br>-possuir certificado de profici�ncia em l�ngua inglesa com pontua��o m�nima conforme o edital; <br>-n�o receber ou ter recebido bolsa para o mesmo objetivo.', 'camila.mfa@fulbright.org.br; fulbright@capes.gov.br', '', 'Produ��o cinematogr�fica', '', '', '', '', 'As inscri��es ser�o gratuitas e feitas, exclusivamente, pela internet, mediante o preenchimento do formul�rio de inscri��o da Comiss�o Fulbright, em ingl�s, e de acordo com as instru��es espec�ficas, ambos dispon�veis no endere�o www.fulbright.org.br.', 'Para esclarecimentos e aux�lio, favor entrar em contato com o Observat�rio de Pesquisa, Desenvolvimento & Inova��o - pdi@pucpr.br, (41) 3271-2128.', 'A', '', '', 'http://www.capes.gov.br/component/content/article/36-salaimprensa/noticias/7076-programa-seleciona-estudantes-para-mestrado-nos-eua-na-area-de-producao-cinematografica', 0, 45, 'Observat�rio', 20140718, '', 'francine.zucco', 'Oportunidade de mestrado em produ��o cinematogr�fica', '', 0, 1, 7, 1, 0, 1),
(46, 'Programa Centro Brasileiro Argentino de Biotecnologia', '2014-07-18', '00005', 'pt_BR', 'CBAB N� 07/2014', '2014-08-20', '1900-01-01', '1900-01-01', 'Selecionar propostas em coopera��o com a Argentina, sendo opcional e desej�vel a coopera��o com o Uruguai, para apoio financeiro a projetos que visem contribuir significativamente para o desenvolvimento cient�fico e tecnol�gico do pa�s em biotecnologia.', 'Itens de custeio com or�amento m�ximo de R$ 150.000,00 por proposta.', '-O proponente deve possuir t�tulo de doutor e ter v�nculo com  a institui��o executora; <br>-o projeto deve prever a coopera��o entre grupos de pesquisa do Brasil e da Argentina e, opcionalmente, do Uruguai; <br>-a proposta deve ser submetida no Brasil pelo coordenador brasileiro e na Argentina e Uruguai pelos respectivos coordenadores, em Chamadas lan�adas naqueles pa�ses.', 'cobrg@cnpq.br ou pelo telefone 0800 61 9697.', '', '1- Bioprospec��o, com �nfase em enzimas industriais e outros bioprodutos; <br>2- agrobiotecnologia, com impacto na produtividade, sustentabilidade e qualidade da produ��o agropecu�ria; <br>3- bioenergia, com �nfase em produ��o de biomassa e bioprocessos; <br>4- sa�de humana, com �nfase em biof�rmacos; <br>5- sa�de e produ��o animal; <br>6- biotecnologia ambiental.', '', '', '', '', 'As propostas devem ser acompanhadas de arquivo contendo o projeto e devem ser encaminhadas ao CNPq exclusivamente via Internet, utilizando-se do Formul�rio de Propostas online, dispon�vel na Plataforma Carlos Chagas.', 'Para esclarecimentos e aux�lio, favor entrar em contato com o Observat�rio de Pesquisa, Desenvolvimento & Inova��o - pdi@pucpr.br, (41) 3271-2128.', 'A', '', '', 'http://www.cnpq.br/web/guest/chamadas-publicas?p_p_id=resultadosportlet_WAR_resultadoscnpqportlet_INSTANCE_0ZaM&filtro=abertas&detalha=chamadaDivulgada&idDivulgacao=4902', 0, 46, 'Observat�rio', 20140718, '', 'francine.zucco', 'Oportunidade de coopera��o com a Argentina em Biotecnologia', '', 0, 1, 5, 1, 0, 1),
(47, '<br>AEX - Apoio a eventos no exterior', '2015-02-26', '00007', 'pt_BR', '2014', '1900-01-01', '1900-01-01', '1900-01-01', 'Apoiar a participa��o de doutores em eventos cient�ficos no exterior, com vistas � apresenta��o de trabalhos cient�ficos, de modo a propiciar a visibilidade internacional da produ��o cient�fica, tecnol�gica e cultural geradas no pa�s.', 'Valor fixo de aux�lio para despesas de estadia e traslado de ida e volta, de acordo com a localiza��o geogr�fica do evento.', '-Ter diploma de doutorado; <br>-n�o ter recebido apoio do programa AEX no ano anterior; <br>-submeter trabalho a congresso ou similar, de reconhecida relev�ncia internacional na �rea do conhecimento.', 'paex@capes.gov.br', '', 'Diversas �reas do conhecimento.', '', '', '', '', 'A inscri��o dever� seguir o calend�rio do edital e ser efetuada exclusivamente via internet, no endere�o eletr�nico: http://www.capes.gov.br/apoio-a-eventos/aex', '', 'A', '', '', 'http://www.capes.gov.br/apoio-a-eventos/aex', 0, 47, 'Observat�rio', 20150309, '', 'francine.zucco', 'Apoio CAPES � participa��o em eventos no exterior', '5', 1, 1, 7, 1, 6, 1),
(48, 'Aux�lio Participa��o em Eventos Cient�ficos - AVG', '2015-03-10', '00005', 'pt_BR', '2014', '1900-01-01', '1900-01-01', '1900-01-01', 'Apoiar a participa��o de pesquisador com desempenho destacado em sua �rea de atua��o em eventos cient�ficos no exterior, tais como: <br>- Congressos e similares; <br>- Interc�mbio cient�fico ou tecnol�gico; ou <br>- Visitas de curta dura��o, para aquisi��o de conhecimentos espec�ficos e necess�rios ao desenvolvimento da pesquisa cient�fica ou tecnol�gica.', 'a) Passagem a�rea internacional; <br>b) Di�rias no exterior, conforme valores estabelecidos em Resolu��o Normativa espec�fica.', 'Ter t�tulo de doutor. <br>Para participa��o em congressos e similares: - Ter carta convite ou de aceita��o da organiza��o do evento; e - Ter dom�nio do idioma oficial do evento.', '', '', 'Diversas �reas do conhecimento.', '', '', '', '', 'As propostas dever�o ser submetidas por meio de formul�rio eletr�nico de propostas, dispon�vel na Plataforma Carlos Chagas , at� 90 (noventa) dias antes do in�cio da atividade ou evento.', '', 'A', '', '', 'http://www.cnpq.br/view/-/journal_content/56_INSTANCE_0oED/10157/25480#rn17112', 0, 48, 'Observat�rio', 20150311, '', 'francine.zucco', 'Apoio CNPq � participa��o em eventos no exterior', '5', 1, 1, 5, 1, 6, 1),
(49, 'Programa CAPES/FCT', '2014-08-04', '00007', 'pt_BR', '39/2014', '2014-09-08', '1900-01-01', '1900-01-01', 'Apoiar o interc�mbio entre institui��es de ensino e pesquisa, brasileiras e portuguesas por meio da mobilidade de docentes, pesquisadores e discentes de p�s-gradua��o brasileiros e portugueses, visando � consolida��o, expans�o e internacionaliza��o das institui��es de ensino superior e dos institutos ou centros de pesquisa e desenvolvimento p�blicos brasileiros.', 'Miss�es de trabalho, miss�es de estudo e recursos de custeio.', 'O coordenador do projeto no Brasil deve: <br>-estar em efetivo exerc�cio no magist�rio da educa��o superior durante todo o per�odo da pesquisa; <br>-possuir t�tulo de doutor h� mais de 5 (cinco) anos. <br>As institui��es brasileiras poder�o apresentar projeto conjunto com at� 3 (tr�s) outras institui��es brasileiras. <br>A equipe brasileira dever� ser composta de pelo menos 2 (dois) doutores, al�m do coordenador, e estes devem estar vinculados a um PPG.', 'fct@capes.gov.br', '', 'Diversas �reas do conhecimento.', '', '', '', '', 'A apresenta��o da proposta dever� ser efetuada pela equipe portuguesa � FCT e pela equipe brasileira � CAPES mediante o preenchimento do formul�rio de inscri��o dispon�vel em http://www.capes.gov.br/cooperacao-internacional/portugal/fct at� �s 16h de 08/09/2014.', 'Para esclarecimentos e aux�lio, favor entrar em contato com o Observat�rio de Pesquisa, Desenvolvimento & Inova��o - pdi@pucpr.br, (41) 3271-2128.', 'A', '', '', 'http://www.capes.gov.br/cooperacao-internacional/portugal/fct', 0, 49, 'Observat�rio', 20140804, '1', 'francine.zucco', 'Oportunidade de coopera��o com Portugal', '', 0, 1, 7, 1, 0, 1),
(50, '<br>PEC-PG 2015', '2015-06-16', '00005', 'pt_BR', '05/2015', '2015-07-27', '1900-01-01', '1900-01-01', 'A presente Chamada tem por objetivo a concess�o de bolsa para cidad�os oriundos de pa�ses com os quais o Brasil mant�m acordo de Coopera��o Educacional, Cultural ou de Ci�ncia e Tecnologia, para realiza��o de estudos de p�s-gradua��o, em n�vel de mestrado, em IES brasileiras, de modo a fornecer a capacita��o necess�ria para que o estudante-conv�nio possa contribuir para o desenvolvimento do seu pa�s.', 'Bolsas de mestrado e aux�lio deslocamento (retorno).', 'O candidato deve: <br>-ser cidad�o dos pa�ses em desenvolvimento com os quais o Brasil mant�m Acordo de Coopera��o conforme listagem do edital; <br>-n�o ser portador de visto que autorize o exerc�cio de atividade remunerada no Brasil; <br>-n�o ser cidad�o brasileiro, ainda que binacional; <br>-ter curso de gradua��o completo e n�o ter iniciado mestrado no Brasil; <br>-possuir comprovada profici�ncia em portugu�s; <br>-ser financeiramente respons�vel pela passagem de vinda para o Brasil e por sua manuten��o at� o recebimento da primeira mensalidade.', 'pec-pg@cnpq.br', '', 'Diversas �reas do conhecimento.', '', '', '', '', '', '', 'A', '', '', 'http://goo.gl/lZ7fV9', 0, 50, 'Observat�rio', 20150616, '', 'francine.zucco', 'Programa PEC-PG/CNPq de bolsas de mestrado', '1', 0, 1, 5, 1, 2, 1),
(51, '�ltimos dias: terceiro calend�rio do Programa de Apoio � Organiza��o de Eventos F A', '2015-01-26', '00002', 'pt_BR', 'Chamada 15/2014', '2015-01-31', '2015-02-06', '1900-01-01', 'Conceder apoio financeiro �s associa��es ou sociedades t�cnico-cient�ficas ou institutos de pesquisa, de natureza p�blica ou privada, sem fins lucrativos e de utilidade p�blica estadual, com sede e CNPJ do Estado do Paran�, na organiza��o de eventos relacionados com ci�ncia e tecnologia, nas diversas �reas de conhecimento, destinados ao interc�mbio de experi�ncias entre pesquisadores e a divulga��o dos resultados de seus trabalhos, cuja realiza��o ocorra no �mbito estadual no per�odo de junho a setembro de 2015.', 'Abrang�ncia: <br>-Estadual: entre R$ 5 e 15 mil; <br>-Nacional: entre R$ 10 e 30 mil; <br>-Internacional: entre R$ 15 e 45 mil.', '-Projetos em parceria com associa��o ou sociedade t�cnico-cient�fica; <br>-evento no �mbito estadual no per�odo de junho a setembro de 2015.', '', '', '', '', '', '', '', 'A proposta dever� ser enviada � Funda��o Arauc�ria pelo coordenador, atrav�s do SigArauc�ria dispon�vel em www.fappr.pr.gov.br e a documenta��o impressa encaminhada.', '', 'A', '', '', 'http://www.fappr.pr.gov.br/arquivos/File/chamadas2014/CP15_2014_Eventos.pdf', 0, 51, 'Observat�rio', 20150121, '', 'francine.zucco', '�ltimos dias: recursos para organiza��o de eventos (junho a setembro/2015) - FA', '5', 0, 1, 2, 1, 6, 1),
(52, 'Newton Fund: RCUK ? CONFAP Research Partnerships call for projects', '2014-08-07', '00047', 'pt_BR', '2014', '2014-10-17', '1900-01-01', '1900-01-01', 'Estabelecer coopera��o sustent�vel entre o Reino Unido e pesquisadores brasileiros que resultar�o em pesquisa de excel�ncia, como o desenvolvimento de conhecimento que n�o seria poss�vel por meio das colabora��es internacionais existentes at� o momento.', '�50.000,00 por parceiro.', '-O proponente brit�nico deve possuir um RCUK award - recursos provenientes de um dos UK Research Councils ou Instituto, Unidade ou Centro financiado por um Conselho. <br>-Exce��es poder�o ser aplicadas de acordo com a �rea de conhecimento ou se recebido recursos de um dos Conselhos nos �ltimos 5 anos. <br>-O projeto em colabora��o deve atender �s diretrizes do Official Development Assistance (ODA) - tratar de quest�es pertinentes ao desenvolvimento do pa�s.', 'Em caso de d�vidas sobre o edital, enviar os questionamentos para o e-mail aci@fapemig.br', '', '�reas priorit�rias: <br>-sa�de; <br>-transforma��es urbanas; <br>-alimentos, energia, �gua e meio ambiente; <br>-resili�ncia de ecossistemas e biodiversidade; <br>-desenvolvimento econ�mico e bem-estar social. <br>Propostas em outras �reas tamb�m ser�o consideradas, desde que sejam objeto de forte colabora��o entre o Reino Unido e o Brasil e atendam aos crit�rios associados ao ODA.', '', '', '', '', '1.O formul�rio para envio da proposta estar� dispon�vel na homepage do RCUK (Conselhos de Pesquisa do Reino Unido) a partir do dia 18/08 (segunda-feira): http://www.rcuk.ac.uk/international/newton/confap/ <br>2.O pesquisador brasileiro dever� enviar a sua proposta para o e-mail fundonewton@confap.org.br  e o formul�rio dever� ser preenchido com a mesma proposta em ingl�s pelo pesquisador do Reino Unido e Brasil.', 'Para esclarecimentos e aux�lio, favor entrar em contato com o Observat�rio de Pesquisa, Desenvolvimento & Inova��o - pdi@pucpr.br, (41) 3271-2128.', 'A', '', '', 'http://www.fappr.pr.gov.br/modules/noticias/article.php?storyid=906', 0, 52, 'Observat�rio', 20140806, '', 'francine.zucco', 'Newton Fund: oportunidade de parceria com UK', '', 0, 1, 47, 1, 0, 1),
(53, '<br>', '2014-08-06', '00049', 'pt_BR', '2014/2015', '2014-11-15', '1900-01-01', '1900-01-01', 'Chevening Scholarships s�o concedidas para profissionais talentosos e potenciais l�deres e formadores de opini�o. As bolsas n�o s� oferecem apoio finaceiro para realizar o mestrado em uma Universidade de excel�ncia do UK, mas constituem uma oportunidade para fazer parte de uma rede conceituada e influente.', 'Bolsa de mestrado e aux�lios.', '-Comprometer-se a retornar ao pa�s pelo per�odo m�nimo de 2 anos ap�s a conclus�o dos estudos; <br>-possuir forma��o superior equivalente ao UK; <br>-ter pelo menos 2 anos de experi�ncia (trabalho volunt�rio e est�gios inclusos); <br>-aplicar para 3 diferentes cursos de Mestrado no UK; <br>-n�o possuir cidadania brit�nica; <br>-n�o ter recebido nenhum tipo de bolsa do UK anteriormente.', 'Para d�vidas quanto ao sistema de cadastro: support@wcn.co.uk', '', '�reas priorit�rias: <br>-neg�cios e investimentos - incluindo energia e infraestrutura; <br>-ambiente de neg�cios - finan�as, administra��o econ�mica e p�blica; <br>-seguran�a mundial e rela��es internacionais - direitos humanos e educa��o; <br>-desenvolvimento, sustentabilidade e mudan�as clim�ticas; <br>-criminal: conflitos, intelig�ncia; <br>-eventos esportivos e legado: adminsitra��o, desenvolvimento, legado e educa��o.', '', '', '', '', 'Guia para submiss�o: http://www.chevening.org/apply/resources/guidance', 'Para esclarecimentos e aux�lio, favor entrar em contato com o Observat�rio de Pesquisa, Desenvolvimento & Inova��o - pdi@pucpr.br, (41) 3271-2128.', '!', '', '', 'http://www.chevening.org/brazil/', 0, 53, 'Observat�rio', 20140806, '', 'francine.zucco', 'Oportunidade de bolsas de mestrado no UK', '', 0, 1, 49, 1, 0, 4),
(54, 'Pr�mio Universit�rio Desafio Renault Experience', '2014-08-18', '00050', 'pt_BR', '2014', '2014-08-31', '1900-01-01', '1900-01-01', 'Oportunidade para alunos de universidades de todo o Brasil mostrarem o seu talento nas �reas de Engenharia, Design, Neg�cios e Comunica��o.', 'Pr�mios de at� R$ 10 mil.', '-Acad�micos regularmente matriculados dos cursos de Comunica��o, Design, Engenharia e Neg�cios (Administra��o, Recursos Humanos, Ci�ncias Cont�beis, Marketing e Economia). <br>-� obrigat�ria a orienta��o de um professor pertencente � mesma IES dos alunos do Grupo. Cada aluno poder� participar de apenas um Grupo, os professores poder�o participar de quantos grupos desejarem.', '', '', 'Engenharia, Comunica��o, Design e Neg�cios.', '', '', '', '', '', 'Para esclarecimentos e aux�lio, favor entrar em contato com o Observat�rio de Pesquisa, Desenvolvimento & Inova��o - pdi@pucpr.br, (41) 3271-2128.', 'A', '', '', 'https://www.desafiorenaultexperience.com.br/', 0, 54, 'Observat�rio', 20140812, '', 'francine.zucco', 'Pr�mio Renault para alunos da gradua��o', '', 0, 1, 50, 1, 0, 1),
(55, 'C�tedra Rio Branco em Rela��es Internacionais - Universidade de Oxford', '2014-08-18', '00007', 'pt_BR', '49/2014', '2014-09-25', '1900-01-01', '1900-01-01', 'A Funda��o Coordena��o de Aperfei�oamento de Pessoas de N�vel Superior (CAPES), e o Instituto Rio Branco, e a Universidade de Oxford, realizam sele��o de candidatos � bolsa para o Programa C�tedra Rio Branco em Rela��es Internacionais da Universidade de Oxford, na �rea de Rela��es Internacionais. O programa tem como objetivo enviar pesquisadores, intelectuais e formuladores de pol�ticas p�blicas � Universidade de Oxford, proporcionando ambiente prop�cio para a an�lise da fun��o desempenhada pelo Brasil no cen�rio mundial e das posi��es adotadas pelo pa�s em temas globais.', 'Bolsa mensal de � 3.500,00, aux�lio-instala��o, aux�lio deslocamento, aux�lio seguro sa�de.', '-Possuir t�tulo de doutor; <br>-estar credenciado como docente e orientador em PPG reconhecido pela CAPES; <br>-dedicar-se em regime integral �s atividades acad�micas; <br>-ter flu�ncia em ingl�s; <br>-n�o receber bolsa ou benef�cio financeiro de outras ag�ncias ou entidades do Governo Federal para o mesmo objetivo.', 'Oxford@capes.gov.br', '', 'Rela��es internacionais', '', '', '', '', 'O candidato deve submeter sua candidatura exclusivamente via Internet.', 'Para esclarecimentos e aux�lio, favor entrar em contato com o Observat�rio de Pesquisa, Desenvolvimento & Inova��o - pdi@pucpr.br, (41) 3271-2128.', 'A', '', '', 'http://www.capes.gov.br/cooperacao-internacional/catedras/catedra-rio-branco-oxford', 0, 55, 'Observat�rio', 20140818, '', 'francine.zucco', 'Oportunidade de c�tedra em Oxford em rela��es internacionais', '', 0, 1, 7, 1, 0, 1),
(56, 'Sele��o P�blica de propostas de cursos para forma��o de recursos humanos em Biotecnologia', '2014-08-14', '00005', 'pt_BR', 'CBAB N� 20/2014', '2014-10-03', '1900-01-01', '1900-01-01', 'Selecionar propostas para apoio financeiro a cursos na �rea de biotecnologia, em n�vel de p�s-gradua��o, nos temas especificados na Chamada de interesse para o Brasil, Argentina e Uruguai, no �mbito do Centro \r\nBrasileiro-Argentino de Biotecnologia.', 'Itens de custeio no valor m�ximo de R$ 70.000,00.', 'O proponente deve: <br>-possuir o t�tulo de doutor; <br>-ser obrigatoriamente o coordenador do projeto; <br>-ter v�nculo formal com a institui��o de execu��o do projeto.\r\n<br><br>Caracter�sticas esperadas do curso: <br>-ser te�rico-pr�tico (40% te�rico e 60% pr�tico); <br>-ter dura��o de duas semanas com aproximadamente 80 horas/aula; <br>-ter a colabora��o de professor argentino convidado, com um m�nimo de 8 (oito) horas-aula; <br>-apresentar distribui��o de vagas por nacionalidade, conforme descrito na Chamada.', '', '', 'Biotecnologia.', '', '', '', '', 'As propostas devem ser acompanhadas de arquivo contendo o projeto e devem ser encaminhadas ao CNPq exclusivamente via Internet, utilizando-se do Formul�rio de Propostas online, dispon�vel na Plataforma Carlos Chagas.', 'Para esclarecimentos e aux�lio, favor entrar em contato com o Observat�rio de Pesquisa, Desenvolvimento & Inova��o - pdi@pucpr.br, (41) 3271-2128.', 'A', '', '', 'http://www.cnpq.br/web/guest/chamadas-publicas?p_p_id=resultadosportlet_WAR_resultadoscnpqportlet_INSTANCE_0ZaM&id=47-397-2790&detalha=chamadaDetalhada&filtro=abertas', 0, 56, 'Observat�rio', 20140814, '', 'francine.zucco', 'Oportunidade para proposta de curso em Biotecnologia em coopera��o com a Argentina', '', 0, 1, 5, 1, 0, 1);
INSERT INTO `fomento_edital` (`id_ed`, `ed_titulo`, `ed_dt_create`, `ed_agencia`, `ed_idioma`, `ed_chamada`, `ed_dt_deadline_elet`, `ed_dt_deadline_envio`, `ed_dt_previsao_divulg_res`, `ed_texto_1`, `ed_texto_2`, `ed_texto_3`, `ed_texto_4`, `ed_texto_5`, `ed_texto_6`, `ed_texto_7`, `ed_texto_8`, `ed_texto_9`, `ed_texto_10`, `ed_texto_11`, `ed_texto_12`, `ed_status`, `ed_autor`, `ed_corpo`, `ed_url_externa`, `ed_total_visualizacoes`, `ed_codigo`, `ed_local`, `ed_data_envio`, `ed_document_require`, `ed_login`, `ed_titulo_email`, `ed_edital_tipo`, `ed_fluxo_continuo`, `fdis_id`, `fag_id`, `i_id`, `ftp_id`, `fs_id`) VALUES
(57, '<br>Energy Globe Awards 2014', '2014-08-19', '00051', 'pt_BR', '2014', '2014-09-22', '1900-01-01', '1900-01-01', 'Identificar projetos que tenham como foco a conserva��o dos recursos, melhoria na qualidade do ar e da �gua, uso eficaz da energia, e a implementa��o de energia renov�vel e cria��o de conscientiza��o para o tema. S�o cinco as categorias dispon�veis: Terra, �gua, Ar, Fogo e Juventude.', 'Pr�mio de 10 mil euros para cada categoria.', 'Projetos podem ser submetidos por empresas, organiza��es p�blicas e privadas e pessoas f�sicas. Mais de um projeto pode ser submetido por proponente e ser�o considerados apenas projetos j� implementados e com resultados demonstrados.', 'contact@energyglobe.info', '', 'Efici�ncia energ�tica, mudan�as clim�ticas, qualidade do ar e �gua, conscientiza��o populacional.', '', '', '', '', 'A submiss�o � feita online e um checklist est� dispon�vel em http://www.energyglobe.info/en/participation/1-project-submission-checklist/', 'Para esclarecimentos e aux�lio, favor entrar em contato com o Observat�rio de Pesquisa, Desenvolvimento & Inova��o - pdi@pucpr.br, (41) 3271-2128.', 'A', '', '', 'http://www.energyglobe.info/en/participation/', 0, 57, 'Observat�rio', 20140819, '', 'francine.zucco', 'Pr�mio internacional em sustentabilidade', '', 0, 1, 51, 1, 0, 1),
(58, '<br>Grand Challenges Canada - <br>Saving Brains', '2014-08-19', '00052', 'pt_BR', '2014', '2014-09-08', '1900-01-01', '1900-01-01', 'Grand Challenges Canada � dedicado a apoiar ideias inovadoras com grande impacto na sa�de global. No programa Saving Brains, busca-se selecionar ideias inovadoras para produtos e servi�os acess�veis e de cunho cient�fico e implementa��o de modelos que protejam e assegurem o desenvolvimento cerebral inicial de maneira sustent�vel.', 'Modalidade seed funding: at� 250 mil d�lares canadenses.', 'O projeto pode ter no m�ximo dois l�deres e deve ser desenvolvido no pa�s.', 'savingbrains@grandchallenges.ca', '', 'Desenvolvimento cerebral infantil.', '', '', '', '', '', 'Para esclarecimentos e aux�lio, favor entrar em contato com o Observat�rio de Pesquisa, Desenvolvimento & Inova��o - pdi@pucpr.br, (41) 3271-2128.', 'A', '', '', 'http://www.grandchallenges.ca/saving-brains/', 0, 58, 'Observat�rio', 20140819, '', 'francine.zucco', 'Oportunidade de capta��o de recursos junto ao governo canadense em desenvolvimento infantil', '', 0, 1, 52, 1, 0, 1),
(59, 'Programa CAPES/Universidade de Nottingham - Sele��o de Projetos Conjuntos de Pesquisa em Drug Discovery', '2014-08-21', '00007', 'pt_BR', 'N� 041/2014', '2014-09-01', '1900-01-01', '1900-01-01', 'Tem como objeto o estreitamento, fortalecimento e aprofundamento da coopera��o t�cnico-cient�fica e o suporte ao acesso de pesquisadores e estudantes de institui��es de ci�ncia, tecnologia e inova��o, e de empresas brasileiras ao Centro de Drug Discovery da Universidade de Nottingham.', '-Aux�lio deslocamento, seguro sa�de e di�rias para pesquisadores brasileiros em miss�o de trabalho no Reino Unido; <br>-bolsas de estudo e pesquisa nas modalidades de gradua��o sandu�che, mestrado sandu�che, doutorado sandu�che e est�gio p�s-doutoral na Universidade de Nottingham; <br>-recursos de custeio para a equipe brasileira (no valor de at� R$ 200.000,00 por ano/projeto).', 'O coordenador deve ser detentor de t�tulo de doutor h� mais de 5 anos, vinculado a curso de p�s-gradua��o com nota igual ou superior a 5. <br>A proposta de projeto deve ser escrita em ingl�s.', 'drug-discovery@capes.gov.br', '', '', '', '', '', '', 'As inscri��es ser�o gratuitas e feitas exclusivamente pela Internet, mediante preenchimento de formul�rio eletr�nico dispon�vel na p�gina da CAPES.', 'Para esclarecimentos e aux�lio, favor entrar em contato com o Observat�rio de Pesquisa, Desenvolvimento & Inova��o - pdi@pucpr.br, (41) 3271-2128.', 'A', '', '', 'http://capes.gov.br/cooperacao-internacional/reino-unido/programa-capes-nottingham', 0, 59, 'Observat�rio', 20140821, '1', 'francine.zucco', 'Oportunidade de recursos na �rea de f�rmacos', '', 0, 1, 7, 1, 0, 1),
(60, 'Chamada CNPQ 21/2014 - Sa�de da Popula��o Negra no Brasil', '2014-09-10', '00005', 'pt_BR', '21/2014', '2014-10-13', '1900-01-01', '1900-01-01', 'Produzir conhecimentos que contribuam para o aperfei�oamento e a efetiva implementa��o da Pol�tica Nacional da Sa�de Integral da Popula��o Negra, visando � promo��o da sa�de deste grupo populacional brasileiro, excel�ncia dos servi�os de aten��o b�sica, de m�dia e alta complexidade no �mbito do Sistema �nico de Sa�de.', 'Os projetos submetidos dever�o ter valor m�nimo de R$ 150.000,00 e m�ximo de R$ 300.000,00.<br>Financiamento de itens de custeio, capital e bolsa.', 'O proponente deve possuir t�tulo de doutor e ser obrigatoriamente o coordenador da proposta. <br>Ser� dada prioridade aos projetos encaminhados em rede ou multic�ntricos e, ainda, �queles que prev�em articula��o com gestoras e gestores estaduais e municipais de Sa�de, tendo explicitadas as formas de participa��o de cada um dos atores na pesquisa.', 'chamadapopnegra2014@cnpq.br', '', 'Tema 1 - Avalia��o da implementa��o da Pol�tica Nacional de Sa�de Integral da Popula��o Negra; <br>Tema 2 - Racismo Institucional; <br>Tema 3 - Situa��es de risco, agravos e incapacidades; <br>Tema 4 - Identifica��o e avalia��o de estrat�gias de promo��o da sa�de e qualidade de vida para a popula��o negra e quilombola em espa�os promotores de sa�de; <br>Tema 5 - Racismo no Brasil: seus impactos nas rela��es sociais e implica��es sobre condi��es de vida, processo de sa�de-adoecimento, cuidado e morte da popula��o negra e mortalidade da \r\njuventude negra.', '', '', '', '', 'As propostas devem ser acompanhadas de arquivo contendo o projeto e devem ser encaminhadas ao CNPq exclusivamente via Internet, utilizando-se do Formul�rio de Propostas online, dispon�vel na Plataforma Carlos Chagas.', '', 'A', '', '', 'http://www.cnpq.br/pt/web/guest/chamadas-publicas?p_p_id=resultadosportlet_WAR_resultadoscnpqportlet_INSTANCE_0ZaM&filtro=abertas&detalha=chamadaDivulgada&idDivulgacao=5043', 0, 60, 'Observat�rio', 20140901, '', 'francine.zucco', '', '', 0, 1, 5, 1, 0, 1),
(61, 'Chamada CNPQ N� 26/2014 - Pesquisas sobre Dist�rbios Neuropsiqui�tricos', '2014-09-10', '00005', 'pt_BR', '26/2014', '2014-10-13', '1900-01-01', '1900-01-01', 'Apoio a atividades de pesquisa cient�fica, tecnol�gica e inova��o no tema dist�rbios neuropsiqui�tricos, que contribuam de modo efetivo para o avan�o do conhecimento, a gera��o de produtos, a formula��o, implementa��o e avalia��o de a��es p�blicas voltadas para a melhoria das condi��es de sa�de da popula��o brasileira e fortalecimento da capacidade instalada do SUS quanto � integra��o da sa�de mental.', 'Os projetos submetidos dever�o ter valores m�nimos de R$ 200.000,00 mil reais e valor m�ximo de R$ 1.000.000,00 milh�o de reais - itens de custeio, capital e bolsa.', 'O proponente deve possuir t�tulo de doutor e ser obrigatoriamente o coordenador da proposta.', 'cosau@cnpq.br', '', 'Linha 1 - Estudos de detec��o e interven��o precoce dos dist�rbios neuropsiqui�tricos, incluindo-se a identifica��o de seus mecanismos fisiopatol�gicos; <br>Linha 2 - Estrat�gias de preven��o dos dist�rbios neuropsiqui�tricos; <br>Linha 3 - Estudos sobre g�nero e dist�rbios neuropsiqui�tricos; <br>Linha 4 - Estudos sobre d�ficits cognitivos e seus tratamentos; <br>Linha 5 - Desenvolvimento de f�rmacos, m�todos diagn�sticos e estrat�gias terap�uticas para o tratamento e detec��o dos dist�rbios neuropsiqui�tricos; <br>Linha 6 - Estudos para aprimorar a aten��o prim�ria em transtornos neuropsiqui�tricos.', '', '', '', '', 'As propostas devem ser acompanhadas de arquivo contendo o projeto e devem ser encaminhadas ao CNPq exclusivamente via Internet, utilizando-se do Formul�rio de Propostas online, dispon�vel na Plataforma Carlos Chagas.', '', 'A', '', '', 'http://www.cnpq.br/pt/web/guest/chamadas-publicas?p_p_id=resultadosportlet_WAR_resultadoscnpqportlet_INSTANCE_0ZaM&filtro=abertas&detalha=chamadaDivulgada&idDivulgacao=5062', 0, 61, 'Observat�rio', 20140901, '', 'francine.zucco', '', '', 0, 1, 5, 1, 0, 1),
(62, '<br>PROGRAMA CAPES/JSPS <br>Coopera��o com o Jap�o', '2014-09-10', '00007', 'pt_BR', '53/2014', '2014-09-30', '1900-01-01', '1900-01-01', 'Sele��o de projetos conjuntos de pesquisa nas diversas �reas do conhecimento, com vistas ao interc�mbio cient�fico entre Institui��es de Ensino Superior (IES) do Brasil e do Jap�o, visando � forma��o de recursos humanos de alto n�vel nos dois pa�ses.', 'Recursos para miss�es de trabalho, miss�es de estudo e de custeio.', 'A proposta deve: <br>-estar vinculada a um PPG; <br>-contemplar, principalmente e obrigatoriamente, a forma��o de p�s-graduandos e o aperfei�oamento de docentes e pesquisadores vinculados aos referidos programas; <br>-ter car�ter inovador; <br>-ser apresentada por coordenador de equipe, detentor do t�tulo de doutor obtido h� pelo menos 05 anos; <br>-a equipe proponente brasileira dever� contar com, no m�nimo, 02 docentes doutores vinculados.', 'jsps@capes.gov.br', '', 'Diversas �reas do conhecimento', '', '', '', '', 'As inscri��es ser�o gratuitas e dever�o ser feitas pelo coordenador da equipe, exclusivamente pela internet, mediante o preenchimento do formul�rio e o envio de documentos eletr�nicos, dispon�vel no endere�o http://www.capes.gov.br/cooperacao-internacional/japao/programa-capes-jsps', '', 'A', '', '', 'http://www.capes.gov.br/cooperacao-internacional/japao/programa-capes-jsps', 0, 62, 'Observat�rio', 20140910, '', 'francine.zucco', 'Oportunidade de coopera��o com o Jap�o', '', 0, 1, 7, 1, 0, 1),
(63, 'Pr�mio Jovem Cientista em Seguran�a Alimentar e Nutricional', '2014-09-10', '00005', 'pt_BR', '2014', '2014-12-19', '1900-01-01', '1900-01-01', 'Revelar talentos, impulsionar a pesquisa no pa�s e investir em estudantes e jovens pesquisadores que procuram inovar na solu��o dos desafios da sociedade brasileira. <br>Pr�mio � atribu�do a quatro categorias: <br>1.Mestre e Doutor; <br>2.Estudante do Ensino Superior; <br>3.Estudante do Ensino M�dio; <br>4.M�rito Institucional.', 'Pr�mio de at� R$ 40.000,00 e bolsas de estudo.', '1. Categoria Mestre e Doutor: podem concorrer estudantes de mestrado, mestres, estudantes de doutorado e doutores que tenham menos de 40 (quarenta) anos de idade, em 19 de dezembro de 2014. <br>2. Categoria Estudante do Ensino Superior: podem concorrer estudantes que estejam frequentando cursos de gradua��o ou que tenham conclu�do a gradua��o entre 01 de dezembro de 2013 e 29 de agosto de 2014 e que tenham menos de 30 (trinta) anos de idade, em 19 de dezembro de 2014. <br>3. Categoria M�rito Institucional: ser�o premiadas uma institui��o de ensino superior e outra de ensino m�dio, �s quais estiverem vinculados o maior n�mero de trabalhos qualificados, apresentados respectivamente nas categorias Mestre e Doutor e Estudante do Ensino Superior, e Estudante do Ensino M�dio.', 'pjc@cnpq.br ', '', 'Seguran�a Alimentar e Nutricional', '', '', '', '', '', 'A inscri��o � de car�ter individual e dever� ser efetuada exclusivamente no endere�o www.jovemcientista.cnpq.br', 'A', '', '', 'http://www.jovemcientista.cnpq.br/', 0, 63, 'Observat�rio', 20140905, '', 'francine.zucco', 'Pr�mio nacional em Seguran�a Alimentar e Nutricional', '', 0, 1, 5, 1, 0, 1),
(64, '.', '2014-09-05', '00053', 'pt_BR', 'EDITAL 09/2014', '2014-09-21', '1900-01-01', '1900-01-01', 'i) Atrair alunos de gradua��o e de p�s-gradua��o inventivos e empreendedores dispostos a compartilhar suas ideias com a comunidade acad�mica, dando abertura para a criatividade, a inova��o e o fator empreendedor da proposta; <br>ii) Identificar e incentivar alunos de gradua��o e de p�s-gradua��o que apresentam um perfil mais inventivo, em busca de projetos com potencial para se transformar em Inova��o.', 'Os tr�s melhores projetos ser�o premiados: <br>1� lugar: R$2.000,00; <br>2� Lugar: R$ 1.000,00; <br>3� Lugar: Men��o Honrosa. <br>Os tr�s projetos selecionados ser�o premiados tamb�m com a pr�-incuba��o na Incubadora da Ag�ncia PUC de Ci�ncia, Tecnologia e Inova��o.', 'A participa��o no concurso PUC Jovens ideais � aberta a: <br>a) alunos de gradua��o e p�s-gradua��o regularmente matriculados na PUCPR de todos os Campi; <br>b) alunos de gradua��o e p�s-gradua��o de outros IES brasileiras.', '', '', '', '', '', '', '', 'A inscri��o dever� ser realizada via e-mail: jovensideias@pucpr.br no per�odo de 26/08 a 21/09.', '', '!', '', '', 'http://www.pucpr.br/pesquisacientifica/iniciacaocientifica/jovens_ideias.php', 0, 64, 'Observat�rio', 20141001, '', 'francine.zucco', '', '', 0, 1, 53, 1, 0, 4),
(65, '<br>Gates Cambridge Scholarship', '2014-09-10', '00054', 'pt_BR', '2014', '2014-12-02', '1900-01-01', '1900-01-01', 'Gates Cambridge Scholarships s�o bolsas full-time altamente reconhecidas e concorridas. S�o concedidas aos candidatos de destaque de diferentes pa�ses fora do UK para obter o diploma de p�s-gradua��o em qualquer uma das �reas dispon�veis na University of Cambridge. <br>O programa busca formar uma rede global de futuros l�deres comprometidos com a melhoria da qualidade de vida da popula��o.', 'Bolsas para doutorado, mestrado ou programa de p�s-gradua��o de 1 ano.', 'Quatro crit�rios: <br>-alinhamento ao programa escolhido de p�s-gradua��o de Cambridge; <br>-excel�ncia acad�mica, <br>-potencial de lideran�a; <br>-compromisso com o bem-estar social.', '', '', '�reas dispon�veis na University of Cambridge.', '', '', '', '', 'Candidatos devem aplicar simultaneamene para o Gates Cambridge Scholarship e junto � Universidade de Cambridge no programa desejado por meio do Graduate Admissions  - http://www.graduate.study.cam.ac.uk/', '', 'A', '', '', 'http://gatescambridge.org/about/', 0, 65, 'Observat�rio', 20140910, '', 'francine.zucco', 'Bolsas para p�s-gradua��o em Cambridge', '', 0, 1, 54, 1, 0, 1),
(66, 'Inscri��es prorrogadas at� 23/02/2015: Pr�mio Mercosul de Ci�ncia e Tecnologia', '2015-01-26', '00005', 'pt_BR', '2014', '2015-02-23', '1900-01-01', '1900-01-01', 'Reconhecer e premiar os melhores trabalhos de estudantes, jovens pesquisadores e equipes de pesquisa, que representem potencial contribui��o para o desenvolvimento cient�fico e tecnol�gico dos pa�ses membros e associados ao Mercosul.', 'Premia��o de US$ 20.500,00, trof�us e placas.', 'S�o quatro categorias: <br>1. Inicia��o Cient�fica: modalidade individual ou equipe. Para equipes, sua composi��o poder� ser representada por, no m�nimo, 2 representantes de um ou de mais pa�ses membros ou associados do MERCOSUL, at� o limite de 5 integrantes, incluindo o autor principal; <br>2. Estudante Universit�rio: modalidade individual, sem limite de idade; <br>3. Jovem Pesquisador: modalidade individual, direcionada para graduados, estudantes de mestrado, mestres, estudantes de doutorado e doutores que tenham no m�ximo 35 anos de idade at� 10/10/2014; <br>4. Integra��o: modalidade equipe, direcionada para graduados, estudantes de mestrado, mestres, estudantes de doutorado e doutores, sem limite de idade. A equipe dever� ser representada por, no m�nimo, 2 integrantes de diferentes pa�ses membros ou associados do MERCOSUL, at� o limite de 10 integrantes, incluindo o autor principal.  <br><br>O trabalho de pesquisa deve estar voltado aos interesses do MERCOSUL, abordar o tema "Populariza��o da Ci�ncia" e deve estar conclu�do e apresentar resultados finais.', 'pmercosul@cnpq.br', '', 'Tema "Populariza��o da Ci�ncia" nas seguintes linhas de pesquisa: <br>1. Museus e Centros de Ci�ncia f�sicos, virtuais e itinerantes; <br>2. Feiras de Ci�ncias, Mostras de Ci�ncia, Mostras Cient�ficas Itinerantes; <br>3. M�dias sociais e outros instrumentos.', '', '', '', '', 'A inscri��o � de car�ter individual ou equipe e dever� ser efetuada exclusivamente no endere�o: www.premiomercosul.cnpq.br', '', 'A', '', '', 'http://www.premiomercosul.cnpq.br/', 0, 66, 'Observat�rio', 20141215, '', 'francine.zucco', 'Inscri��es prorrogadas at� 23/02/2015: Pr�mio Mercosul de Ci�ncia e Tecnologia', '4', 0, 1, 5, 1, 5, 1),
(67, 'CONFAP/UK Fellowship and Research Mobility', '2014-09-23', '00048', 'pt_BR', '2014', '2014-10-22', '1900-01-01', '1900-01-01', 'Este recurso para at� tr�s anos de apoio financeiro constitui uma oportunidade para pesquisadores brasileiros e brit�nios desenvolverem compet�ncias e aprimorarem esfor�os em seus grupos de pesquisa por meio de treinamentos, colabora��o e visitas rec�procas entre seus parceiros.', 'Bolsas de p�s-doutorado e mobilidade de pesquisa.', 'Os candidatos brasileiros devem ter v�nculo empregat�cio com uma institui��o brasileira e um coproponente no Reino Unido. <br>As bolsas de p�s-doutorado acomodar�o pesquisadores jovens (que tiverem terminado o doutorado entre 2 e 7 anos atr�s) e pesquisadores seniors (mais de 7 anos desde a conclus�o do doutorado).', 'aci@fapemig.br', '', 'Ci�ncia Natural, Engenharia, Ci�ncias Sociais e Humanidades.', '', '', '', '', 'As inscri��es podem ser feitas por meio do site http://confap.org.br, na p�gina reservada ao Fundo Newton. Ap�s o preenchimento do formul�rio de inscri��o, o pesquisador candidato deve envi�-lo para o e-mail fundonewton@confap.org.br', '', 'A', '', '', 'http://confap.org.br/news/reino-unido-e-confap-anunciam-oportunidades-para-pesquisadores-britanicos-e-brasileiros/', 0, 67, 'Observat�rio', 20140918, '', 'francine.zucco', '2� Chamada Fundo Newton - Fellowship and Research Mobility', '', 0, 1, 48, 1, 0, 1),
(68, 'Chamada CNPq N � 31/2014 ? Pesquisas sobre Doen�a de Chagas', '2014-09-23', '00005', 'pt_BR', '31/2014', '2014-10-16', '1900-01-01', '1900-01-01', 'Apoiar atividades de pesquisa cient�fica, tecnol�gica e a inova��o no tema doen�a de Chagas por meio de projetos que possam gerar resultados capazes de contribuir ao aprimoramento dos programas de vigil�ncia, controle, erradica��o e preven��o da doen�a de Chagas.', 'De R$ 100 mil a R$ 500 mil - custeio, capital e bolsas.', 'O proponente deve possuir t�tulo de doutor e ser obrigatoriamente o coordenador da proposta.', 'cosau@cnpq.br', '', '', '', '', '', '', 'As propostas devem ser acompanhadas de arquivo contendo o projeto e devem ser encaminhadas ao CNPq exclusivamente via Internet, utilizando-se do Formul�rio de Propostas online, dispon�vel na Plataforma Carlos Chagas.', '', 'A', '', '', 'http://www.cnpq.br/web/guest/chamadas-publicas?p_p_id=resultadosportlet_WAR_resultadoscnpqportlet_INSTANCE_0ZaM&id=47-436-2970&detalha=chamadaDetalhada&filtro=abertas', 0, 68, 'Observat�rio', 20140923, '', 'francine.zucco', 'Recursos CNPq para pesquisas em Doen�a de Chagas', '', 0, 1, 5, 1, 0, 1),
(69, 'Chamada CNPq 33/2014 ? Cria��o da Rede Nacional de Pesquisas em Doen�as Cardiovasculares', '2014-09-23', '00005', 'pt_BR', '33/2014', '2014-10-16', '1900-01-01', '1900-01-01', 'Apoiar atividades de pesquisa cient�fica, tecnol�gica e inova��o no tocante �s doen�as cardiovasculares mediante a forma��o da Rede Nacional de Pesquisa em Doen�as Cardiovasculares (RNPDC) envolvendo institui��es de pesquisa p�blicas e privadas de todas as regi�es do Brasil, que possam gerar e executar projetos de pesquisa de interesse do Minist�rio da Sa�de.', 'De R$ 200 mil a R$ 1 milh�o - custeio, capital e bolsas. As bolsas ter�o seu valor limitado a 20% do valor total do solicitado.', 'O proponente deve possuir t�tulo de doutor e ser obrigatoriamente o coordenador da proposta.', 'chamada332014@cnpq.br', '', '', '', '', '', '', 'As propostas devem ser acompanhadas de arquivo contendo o projeto e devem ser encaminhadas ao CNPq exclusivamente via Internet, utilizando-se do Formul�rio de Propostas online, dispon�vel na Plataforma Carlos Chagas.', '', 'A', '', '', 'http://www.cnpq.br/web/guest/chamadas-publicas?p_p_id=resultadosportlet_WAR_resultadoscnpqportlet_INSTANCE_0ZaM&id=47-438-2966&detalha=chamadaDetalhada&filtro=abertas', 0, 69, 'Observat�rio', 20140923, '', 'francine.zucco', 'Recursos para Pesquisas em Doen�as Cardiovasculares', '', 0, 1, 5, 1, 0, 1),
(70, 'Chamada CNPq N� 27/2014 - Pesquisas sobre Doen�as Neurodegenerativas', '2014-09-23', '00005', 'pt_BR', 'N� 27/2014', '2014-10-17', '1900-01-01', '1900-01-01', 'Apoiar projetos de pesquisa cient�fica e tecnol�gica que visem contribuir significativamente para o desenvolvimento cient�fico e tecnol�gico do Pa�s, no tema doen�as neurodegenerativas (DND).', 'De R$ 200 mil a R$ 1 milh�o - custeio, capital e bolsas. As bolsas ter�o seu valor limitado a 20% do valor total do solicitado.', 'O proponente deve possuir t�tulo de doutor e ser obrigatoriamente o coordenador da proposta.', 'chamada272014@cnpq.br', '', 'O proponente poder� apresentar um �nico projeto, do tipo estudo b�sico, pr�-cl�nico ou cl�nico, que se enquadre em um dos eixos tem�ticos: <br>1.Marcadores precoces de doen�as;<br>2.Estrat�gias de preven��o; <br>3.Novas abordagens terap�uticas ou de interven��o (exceto estudos de terapias celulares); <br>4.Mecanismos b�sicos aplic�veis �s doen�as neurodegenerativas.', '', '', '', '', 'As propostas devem ser acompanhadas de arquivo contendo o projeto e devem ser encaminhadas ao CNPq exclusivamente via Internet, utilizando-se do Formul�rio de Propostas online, dispon�vel na Plataforma Carlos Chagas.', '', 'A', '', '', 'http://www.cnpq.br/web/guest/chamadas-publicas?p_p_id=resultadosportlet_WAR_resultadoscnpqportlet_INSTANCE_0ZaM&id=47-428-2961&detalha=chamadaDetalhada&filtro=abertas', 0, 70, 'Observat�rio', 20140923, '', 'francine.zucco', 'Recursos para Pesquisas em Doen�as Neurodegenerativas', '', 0, 1, 5, 1, 0, 1),
(71, 'Chamada CNPq N � 28/2014 - Medicina Regenerativa', '2014-09-24', '00005', 'pt_BR', '28/2014', '2014-10-17', '1900-01-01', '1900-01-01', 'Apoiar projetos de pesquisa cient�fica e tecnol�gica que visem contribuir significativamente para o desenvolvimento cient�fico e tecnol�gico do Pa�s e para a inova��o no tema Medicina Regenerativa.', 'De R$ 200 mil a R$ 1 milh�o - custeio, capital e bolsas. As bolsas ter�o seu valor limitado a 20% do valor total do solicitado.', 'O proponente deve possuir t�tulo de doutor e ser obrigatoriamente o coordenador da proposta.', 'chamada282014@cnpq.br', '', 'Eixos tem�ticos: <br>1. Gera��o de c�lulas tronco humanas de pluripot�ncia induzida para sele��o (screening) de f�rmacos; <br>2. Diferencia��o de c�lulas pluripotentes humanas em tipos celulares espec�ficos para modelagem de doen�as; <br>3. Reprograma��o direta de c�lulas som�ticas; <br>4. Gera��o de c�lulas tronco humanas de pluripot�ncia induzida por m�todos n�o integrativos de genes ex�genos para fins de uso em medicina regenerativa; <br>5. Recelulariza��o de �rg�os descelularizados com c�lulas tronco pluripotentes ou �rg�osespec�ficas; bioengenharia de �rg�os usando impress�o 3D; <br>6. Bioengenharia de �rg�os ocos.', '', '', '', '', 'As propostas devem ser acompanhadas de arquivo contendo o projeto e devem ser encaminhadas ao CNPq exclusivamente via Internet, utilizando-se do Formul�rio de Propostas online, dispon�vel na Plataforma Carlos Chagas.', '', 'A', '', '', 'http://www.cnpq.br/web/guest/chamadas-publicas?p_p_id=resultadosportlet_WAR_resultadoscnpqportlet_INSTANCE_0ZaM&id=47-429-2939&detalha=chamadaDetalhada&filtro=abertas', 0, 71, 'Observat�rio', 20140924, '', 'francine.zucco', 'Recursos para Projetos em Medicina Regenerativa', '', 0, 1, 5, 1, 0, 1),
(72, 'Chamada CNPq N �32/2014 ? Pesquisas sobre Leishmanioses', '2014-09-24', '00005', 'pt_BR', '32/2014', '2014-10-17', '1900-01-01', '1900-01-01', 'Apoiar projetos de pesquisa cient�fica e tecnol�gica que visem contribuir significativamente para o desenvolvimento cient�fico e tecnol�gico do Pa�s e para a inova��o em leishmanioses.', 'De R$ 100 mil a R$ 500 mil - custeio, capital e bolsas. As bolsas ter�o seu valor limitado a 20% do valor total do solicitado.', 'O proponente deve possuir t�tulo de doutor e ser obrigatoriamente o coordenador da proposta.', 'chamada322014@cnpq.br', '', 'O proponente dever� apresentar um �nico projeto, do tipo estudo b�sico, pr�-cl�nico, cl�nico ou epidemiol�gico, e para apenas um dos eixos tem�ticos: <br>1. Diagn�stico; <br>2. Cl�nica e tratamento; <br>3. Vacinas; <br>4. Vetor.', '', '', '', '', 'As propostas devem ser acompanhadas de arquivo contendo o projeto e devem ser encaminhadas ao CNPq exclusivamente via Internet, utilizando-se do Formul�rio de Propostas online, dispon�vel na Plataforma Carlos Chagas.', '', 'A', '', '', 'http://www.cnpq.br/web/guest/chamadas-publicas?p_p_id=resultadosportlet_WAR_resultadoscnpqportlet_INSTANCE_0ZaM&id=47-437-2934&detalha=chamadaDetalhada&filtro=abertas', 0, 72, 'Observat�rio', 20140924, '', 'francine.zucco', 'Recursos CNPq para Projetos de Pesquisa em Leishmaniose', '', 0, 1, 5, 1, 0, 1),
(73, '<br>Chamada CNPq  N � 30/2014', '2014-09-24', '00005', 'pt_BR', '30/2014', '2014-10-27', '1900-01-01', '1900-01-01', 'Apoiar projetos de pesquisa cient�fica e tecnol�gica que visem promover, estimular, e/ou expandir atividades de pesquisa colaborativa b�sica, translacional e aplicada entre pesquisadores estadunidenses eleg�veis e com pesquisas j� em andamento no �mbito do NIH e pesquisadores brasileiros eleg�veis nas �reas de c�ncer associado a infec��es, alergia, imunologia, e/ou doen�as infecciosas, incluindo HIV/AIDS e suas comorbidades.', 'Estima-se apoiar 25 (vinte e cinco) projetos de cerca de R$ 220.000,00 (duzentos e vinte mil reais) cada - custeio, capital e bolsas.', 'O proponente deve possuir t�tulo de doutor e ser obrigatoriamente o coordenador da proposta. <br>A proposta apresentada dever� contemplar projeto de pesquisa em que haja colabora��o com um  pesquisador estadunidense j� contemplado por um aux�lio do NIH, o qual tamb�m submeter� pedido de financiamento a chamada an�loga publicada pelos EUA. <br>Os projetos de pesquisa colaborativos submetidos dever�o ser julgados eleg�veis tanto na Chamada dos EUA quanto na do Brasil.', 'cosau@cnpq.br', '', 'Os projetos de pesquisas apresentados em resposta � presente Chamada dever�o se enquadrar em um ou mais dos seguintes eixos tem�ticos: <br>1. Imunologia b�sica; <br>2. Doen�as Infecciosas (exceto HIV/AIDS); <br>3. Estudos sobre HIV/AIDS e suas comorbidades/co-infec��es; <br>4. C�nceres associados a infec��es.', '', '', '', '', 'As propostas devem ser acompanhadas de arquivo contendo o projeto e devem ser encaminhadas ao CNPq exclusivamente via Internet, utilizando-se do Formul�rio de Propostas online, dispon�vel na Plataforma Carlos Chagas.', '', 'A', '', '', 'http://www.cnpq.br/web/guest/chamadas-publicas?p_p_id=resultadosportlet_WAR_resultadoscnpqportlet_INSTANCE_0ZaM&id=47-433-2905&detalha=chamadaDetalhada&filtro=abertas', 0, 73, 'Observat�rio', 20140924, '', 'francine.zucco', 'Recursos CNPq para Pesquisa nas �reas de c�ncer associado e doen�as infecciosas', '', 0, 1, 5, 1, 0, 1),
(74, 'Chamada CNPq N�37/2014 ? Pesquisas sobre Helmint�ases', '2014-09-25', '00005', 'pt_BR', '37/2014', '2014-11-04', '1900-01-01', '1900-01-01', 'Apoiar atividades de pesquisa cient�fica, tecnol�gica e de inova��o no tocante � esquistossomose e outras helmint�ases.', 'De R$ 100 mil a R$ 500 mil - custeio, capital e bolsas.', 'O proponente deve possuir t�tulo de doutor e ser obrigatoriamente o coordenador da proposta.', 'chamada372014@cnpq.br', '', 'Eixos tem�ticos: 1. Diagn�stico; 2. Cl�nica; 3. Tratamento; 4. Desenvolvimento tecnol�gico e avalia��o de programas, servi�os e a��es; 5.  Mecanismos de Intera��o parasita-c�lula.', '', '', '', '', 'As propostas devem ser acompanhadas de arquivo contendo o projeto e devem ser encaminhadas ao CNPq exclusivamente via Internet, utilizando-se do Formul�rio de Propostas online, dispon�vel na Plataforma Carlos Chagas.', '', 'A', '', '', 'http://www.cnpq.br/web/guest/chamadas-publicas?p_p_id=resultadosportlet_WAR_resultadoscnpqportlet_INSTANCE_0ZaM&id=47-447-3022&detalha=chamadaDetalhada&filtro=abertas', 0, 74, 'Observat�rio', 20140925, '', 'francine.zucco', 'Recursos CNPq para Pesquisas sobre Helmint�ases', '', 0, 1, 5, 1, 0, 1),
(75, 'Chamada CNPq N�36/2014 ? Pesquisas sobre Doen�as Renais', '2014-09-26', '00005', 'pt_BR', '36/2014', '2014-11-04', '1900-01-01', '1900-01-01', 'Apoiar atividades de pesquisa cient�fica, tecnol�gica e de inova��o no tocante �s doen�as renais, mediante a sele��o de propostas para apoio financeiro a projetos que contribuam de modo efetivo para o avan�o do conhecimento, a gera��o de produtos, a formula��o, implementa��o e avalia��o de a��es p�blicas voltadas para a melhoria das condi��es de sa�de da popula��o brasileira e o fortalecimento dos servi�os de sa�de � luz dos princ�pios e diretrizes do SUS.', 'De R$ 200 mil a R$ 1 milh�o - custeio, capital e bolsas.', 'O proponente deve possuir t�tulo de doutor e ser obrigatoriamente o coordenador da proposta.', 'chamada362014@cnpq.br', '', 'Controle, preven��o e tratamento das doen�as renais.', '', '', '', '', 'As propostas devem ser acompanhadas de arquivo contendo o projeto e devem ser encaminhadas ao CNPq exclusivamente via Internet, utilizando-se do Formul�rio de Propostas online, dispon�vel na Plataforma Carlos Chagas.', '', 'A', '', '', 'http://www.cnpq.br/web/guest/chamadas-publicas?p_p_id=resultadosportlet_WAR_resultadoscnpqportlet_INSTANCE_0ZaM&id=47-446-3015&detalha=chamadaDetalhada&filtro=abertas', 0, 75, 'Observat�rio', 20140925, '', 'francine.zucco', 'Recursos CNPq para Projetos de Pesquisa em Doen�as Renais', '', 0, 1, 5, 1, 0, 1),
(76, 'Chamada CNPq N�34/2014 ? Pesquisas sobre Doen�as Respirat�rias Cr�nicas', '2014-09-26', '00005', 'pt_BR', '34/2014', '2014-11-10', '1900-01-01', '1900-01-01', 'Apoiar atividades de pesquisa cient�fica, tecnol�gica e de inova��o no tema das doen�as respirat�rias cr�nicas.', 'De R$ 200 mil a R$ 1 milh�o - custeio, capital e bolsas.', 'O proponente deve possuir t�tulo de doutor e ser obrigatoriamente o coordenador da proposta.', '', '', 'Estudos relacionados a Apneia Obstrutiva do Sono, Asma, Bronquiectasia, Doen�a Pulmonar Obstrutiva Cr�nica (DPOC), Doen�as Pulmonares, Ocupacionais, Fibrose Pulmonar, Hipertens�o Arterial Pulmonar ou Complica��es pulmonares, associadas �s doen�as cr�nicas.', '', '', '', '', 'As propostas devem ser acompanhadas de arquivo contendo o projeto e devem ser encaminhadas ao CNPq exclusivamente via Internet, utilizando-se do Formul�rio de Propostas online, dispon�vel na Plataforma Carlos Chagas.', '', 'A', '', '', 'http://www.cnpq.br/web/guest/chamadas-publicas?p_p_id=resultadosportlet_WAR_resultadoscnpqportlet_INSTANCE_0ZaM&id=47-444-3043&detalha=chamadaDetalhada&filtro=abertas', 0, 76, 'Observat�rio', 20140926, '', 'francine.zucco', 'Recursos CNPq para Pesquisas em Doen�as Respirat�rias Cr�nicas', '', 0, 1, 5, 1, 0, 1),
(77, 'Chamada CNPq N� 35/2014 - Pesquisas sobre Doen�as Raras', '2014-09-30', '00005', 'pt_BR', '35/2014', '2014-11-04', '1900-01-01', '1900-01-01', 'Desenvolver pesquisas sobre os mecanismos b�sicos das doen�as raras; Desenvolver pesquisas epidemiol�gicas;  Investigar novos procedimentos diagn�sticos e terap�uticos para as doen�as raras;  Iniciar a avalia��o de interven��es terap�uticas e preventivas em doen�as raras que sejam de interesse do Minist�rio da Sa�de.', 'De R$ 200 mil a R$ 1 milh�o - custeio, capital e bolsas.', 'O proponente deve possuir t�tulo de doutor e ser obrigatoriamente o coordenador da proposta.', 'chamada352014@cnpq.br', '', 'Eixos tem�ticos: 1. Hiperfenilalaninemias; 2. S�ndrome de Prader-Willi e Horm�nio do Crescimento; 3. Doen�a de Fabry; 4. Esclerose Tuberosa e inibidores do mTOR.', '', '', '', '', 'As propostas devem ser acompanhadas de arquivo contendo o projeto e devem ser encaminhadas ao CNPq exclusivamente via Internet, utilizando-se do Formul�rio de Propostas online, dispon�vel na Plataforma Carlos Chagas.', '', 'A', '', '', 'http://www.cnpq.br/web/guest/chamadas-publicas?p_p_id=resultadosportlet_WAR_resultadoscnpqportlet_INSTANCE_0ZaM&id=47-445-3053&detalha=chamadaDetalhada&filtro=abertas', 0, 77, 'Observat�rio', 20140926, '', 'francine.zucco', 'Recursos CNPq para Projetos de Pesquisa em Doen�as Raras', '', 0, 1, 5, 1, 0, 1),
(78, 'Programa CAPES/STINT - Coopera��o bilateral com a Su�cia', '2014-09-30', '00007', 'pt_BR', '58/2014-15', '2014-10-31', '1900-01-01', '1900-01-01', 'Apoiar o desenvolvimento de projetos conjuntos de pesquisa e fomentar a mobilidade de pesquisadores e de estudantes de doutorado e p�sdoutorado, em todas as �reas do conhecimento.', 'Miss�es de trabalho e de estudo. Custeio de at� R$ 10.000,00 por ano.', '1. A proposta deve estar vinculada a um Programa de P�s-Gradua��o recomendado e reconhecido pela CAPES, com nota m�nima 3; <br>2. Contemplar, principalmente e obrigatoriamente a forma��o de p�s-graduandos e o aperfei�oamento de docentes e pesquisadores vinculados aos referidos programas; <br>3. Ter car�ter inovador; <br>4. Ser apresentada por coordenador de equipe detentor do t�tulo de doutor obtido h�, pelo menos, 4 anos; <br>5. As equipes proponente brasileiras dever�o ser compostas por, no m�nimo, 2 docentes doutores, al�m do coordenador, vinculados a um PPG.', 'stint@capes.gov.br', '', 'Diversas �reas do conhecimento.', '', '', '', '', 'As inscri��es ser�o gratuitas e dever�o ser feitas pelo coordenador da equipe, exclusivamente pela internet mediante o preenchimento do formul�rio de inscri��o e o envio de documentos eletr�nicos, dispon�vel no endere�o http://capes.gov.br/cooperacaointernacional/suecia/capes-stint', '', 'A', '', '', 'http://www.capes.gov.br/cooperacao-internacional/suecia/capes-stint', 0, 78, 'Observat�rio', 20140930, '', 'francine.zucco', 'Oportunidade Capes de coopera��o bilateral com a Su�cia', '', 0, 1, 7, 1, 0, 1),
(79, 'MCTI/CONAB/CNPQ - Perdas P�s-Colheita de Gr�os', '2014-10-07', '00005', 'pt_BR', '18/2014', '2014-11-13', '1900-01-01', '1900-01-01', 'Financiamento de projetos de desenvolvimento cient�fico e tecnol�gico e inova��o, voltados para o estudo de perdas quantitativas e qualitativas no armazenamento e no transporte de gr�os.', 'O valor m�ximo a ser financiado por proposta ser� de R$ 800.000,00, com vig�ncia de 36 meses - custeio, capital e bolsas.', 'O proponente deve possuir t�tulo de doutor e ser obrigatoriamente o coordenador da proposta. <br>A proposta dever� ser apresentada na forma de projeto de pesquisa, obedecendo estritamente as exig�ncias descritas no edital na linha tem�tica a que for submetido.', 'chamada18-2014@cnpq.br', '', 'O projeto poder� ser submetido em apenas uma de cinco Linhas Tem�ticas e dever� obrigatoriamente cumprir as exig�ncias dispostas no edital: <br>1. Milho em Gr�os a Granel; <br>2. Arroz em Casca a Granel e Ensacado; <br>3. Trigo em Gr�os a Granel; <br>4. Estudo de perdas quantitativas no transporte rodovi�rio de gr�os de arroz em casca, milho e trigo a granel; <br>5. Metodologia para determina��o de volume e massa de gr�os a granel e ensacados.', '', '', '', '', 'As propostas devem ser acompanhadas de arquivo contendo o projeto e devem ser encaminhadas ao CNPq exclusivamente via Internet, utilizando-se do Formul�rio de Propostas online, dispon�vel na Plataforma Carlos Chagas, no endere�o eletr�nico http://carloschagas.cnpq.br/', '', 'A', '', '', 'http://goo.gl/3mns6C', 0, 79, 'Observat�rio', 20141001, '', 'francine.zucco', 'Oportunidade CNPq de recursos para pesquisas em perdas p�s-colheita de gr�os', '', 0, 1, 5, 1, 0, 1),
(80, 'Chamada CNPq N� 19/2014 - Fortalecimento da Juventude Rural', '2014-10-07', '00005', 'pt_BR', '19/2014', '2014-11-13', '1900-01-01', '1900-01-01', 'Apoiar projetos de capacita��o profissional e extens�o tecnol�gica e inovadora de jovens de 15 a 29 anos, estudantes de n�vel m�dio, que visem contribuir significativamente para o desenvolvimento dos assentamentos de Reforma Agr�ria, da agricultura familiar e comunidades tradicionais. Apoiar projetos que objetivam contribuir para a forma��o de jovens de 15 a 29 anos, a produ��o de conhecimentos, a capacita��o t�cnico-profissional, a produ��o e dissemina��o de tecnologias sociais.', 'Custeio e bolsa.', 'O proponente deve possuir t�tulo de doutor e ser obrigatoriamente o coordenador da proposta.', 'chamada19-2014@cnpq.br', '', 'Os projetos devem ter como foco priorit�rio a juventude rural e suas quest�es te�ricas, metodol�gicas e de cunho pr�tico, associadas a projetos de inser��o organizada nas suas comunidades de assentamentos, agricultura familiar e comunidades tradicionais, que contribuam para a compreens�o cr�tica da realidade do campo e para sua transforma��o em dire��o a um novo paradigma fundamentado no desenvolvimento agr�rio sustent�vel.', '', '', '', '', 'As propostas devem ser acompanhadas de arquivo contendo o projeto e devem ser encaminhadas ao CNPq exclusivamente via Internet, utilizando-se do Formul�rio de Propostas online, dispon�vel na Plataforma Carlos Chagas, no endere�o eletr�nico http://carloschagas.cnpq.br/', '', 'A', '', '', 'http://www.cnpq.br/web/guest/chamadas-publicas?p_p_id=resultadosportlet_WAR_resultadoscnpqportlet_INSTANCE_0ZaM&filtro=abertas&detalha=chamadaDivulgada&idDivulgacao=5302', 0, 80, 'Observat�rio', 20141002, '', 'francine.zucco', '', '', 0, 1, 5, 1, 0, 1),
(81, 'Chamada 22/2014 - Ci�ncias Humanas, Sociais e Sociais Aplicadas', '2014-10-07', '00005', 'pt_BR', '22/2014', '2014-11-05', '1900-01-01', '1900-01-01', 'Apoiar projetos de pesquisa cient�fica, tecnol�gica e de inova��o que visem contribuir significativamente para o desenvolvimento cient�fico e tecnol�gico do Pa�s, no �mbito das Ci�ncias Humanas, Sociais e Sociais Aplicadas, mediante o financiamento de projetos de pesquisa com m�rito cient�fico.', 'At� R$ 30.000,00 para gastos com itens de custeio e capital.', '1.O proponente deve possuir t�tulo de doutor, ser obrigatoriamente o coordenador da proposta e ter v�nculo formal com a institui��o de execu��o do projeto, em departamentos das �reas de Ci�ncias Humanas, Sociais e Sociais Aplicadas ou em programas de p�s-gradua��o dessas �reas. <br>2.O projeto deve estar claramente caracterizado como pesquisa cient�fica, tecnol�gica ou inova��o. N�o ser�o enquadradas propostas de atividades de extens�o nem de montagem de banco de dados.', 'humanas2014@cnpq.br', '', '', '', '', '', '', 'As propostas devem ser acompanhadas de arquivo contendo o projeto e devem ser encaminhadas ao CNPq exclusivamente via Internet, utilizando-se do Formul�rio de Propostas online, dispon�vel na Plataforma Carlos Chagas.', '', 'A', '', '', 'http://www.cnpq.br/web/guest/chamadas-publicas?p_p_id=resultadosportlet_WAR_resultadoscnpqportlet_INSTANCE_0ZaM&id=47-413-2859&detalha=chamadaDetalhada&filtro=abertas', 0, 81, 'Observat�rio', 20141007, '', 'francine.zucco', 'Oportunidade de recursos para projetos em Ci�ncias Humanas e Sociais', '', 0, 1, 5, 1, 0, 1),
(82, 'Chamada 43/2014  <br>Olimp�adas Cient�ficas', '2014-10-07', '00005', 'pt_BR', '43/2014', '2014-11-05', '1900-01-01', '1900-01-01', 'Selecionar propostas para a realiza��o de Olimp�adas Cientificas de �mbito Nacional como instrumento de melhoria dos ensinos fundamental e m�dio, para identificar jovens talentosos que podem ser estimulados a seguir carreiras t�cnico-cient�ficas. Poder� ser apoiada tamb�m a realiza��o de olimp�adas internacionais no Brasil, em sua fase final, de acordo com as conclus�es estabelecidas nesta Chamada.', 'Itens de custeio.', '1. O proponente deve possuir t�tulo de doutor, ser obrigatoriamente o coordenador da proposta e ter v�nculo formal com a institui��o. <br>2. O projeto deve estar claramente caracterizado como Olimp�ada Cient�fica de alcance nacional. <br>3. No caso de Olimp�ada Internacional ela dever� se realizar no Brasil; estar claramente caracterizada como Olimp�ada Cient�fica; encontrar-se em sua fase final; envolver um n�mero significativo de pa�ses e ser proposta por grupo organizador de Olimp�ada Nacional j� apoiada pelo CNPq e com tradi��o na �rea.', 'olimp�adas@cnpq.br', '', '', '', '', '', '', 'As propostas devem ser acompanhadas de arquivo contendo o projeto e devem ser encaminhadas ao CNPq exclusivamente via Internet, utilizando-se do Formul�rio de Propostas online, dispon�vel na Plataforma Carlos Chagas.', '', 'A', '', '', 'http://goo.gl/P08o5B', 0, 82, 'Observat�rio', 20141007, '', 'francine.zucco', 'Recursos para realiza��o de Olimp�adas Cient�ficas', '', 0, 1, 5, 1, 0, 1),
(83, 'Chamada 44/2014 - Feiras de Ci�ncias e Mostras Cient�ficas', '2014-10-07', '00005', 'pt_BR', '44/2014', '2014-11-05', '1900-01-01', '1900-01-01', 'Apoiar a realiza��o de Feiras de Ci�ncias e Mostras Cient�ficas de �mbito municipal, estadual/distrital e nacional, como um instrumento para a melhoria dos ensinos fundamental, m�dio e t�cnico, bem como para despertar voca��es cient�ficas e/ou tecnol�gicas e identificar jovens talentosos que possam ser estimulados a seguirem carreiras cient�fico-tecnol�gicas. Al�m disso, possibilitar a sele��o dos melhores trabalhos para participa��o em Feiras/Mostras Internacionais.', '1. Abrang�ncia municipal: at� R$ 40.000,00 e m�x. 5 bolsas de IC Jr. <br>2. Abrang�ncia estadual: at� R$ 200.000,00 e m�x. 20 bolsas de IC Jr. <br>3. Abrang�ncia nacional: at� R$ 500.000,00 e m�x. 70 bolsas de IC Jr.', 'O proponente poder� apresentar um �nico projeto e para apenas uma das categoriais descritas, dever� ser obrigatoriamente o coordenador do projeto e ter curso superior completo.', 'feiradeciencias@cnpq.br', '', '', '', '', '', '', 'As propostas devem ser acompanhadas de arquivo contendo o projeto e devem ser encaminhadas ao CNPq exclusivamente via Internet, utilizando-se do Formul�rio de Propostas online, dispon�vel na Plataforma Carlos Chagas.', '', 'A', '', '', 'http://goo.gl/3kvqOo', 0, 83, 'Observat�rio', 20141007, '', 'francine.zucco', 'Recursos para realiza��o de Feiras de Ci�ncias e Mostras Cient�ficas - Bolsas IC Jr.', '', 0, 1, 5, 1, 0, 1),
(84, 'Chamada CNPq 39/2014 - Agroecologia', '2014-10-09', '00005', 'pt_BR', '39/2014', '2014-11-07', '1900-01-01', '1900-01-01', 'Apoiar projetos que integrem atividades de extens�o, pesquisa, ensino e fomento a processos de inova��o tecnol�gica e metodol�gica visando a constru��o e socializa��o de conhecimentos e pr�ticas relacionados � agroecologia, bem como � promo��o dos sistemas org�nicos de produ��o e de base agroecol�gica. Tal a��o permitir� a forma��o de N�cleos e Rede de N�cleos de Estudo em Agroecologia e Produ��o Org�nica.', 'Projeto de N�cleo de Estudo em Agroecologia e Produ��o Org�nica: at� R$ 200.000,00 - custeio, capital e bolsas.', 'Os projetos submetidos na Linha 1 dever�o propor a cria��o ou manuten��o de um N�cleo de Estudo em Agroecologia e Produ��o Org�nica fundamentado nos princ�pios, conhecimentos e pr�ticas da agroecologia e da produ��o org�nica e de base agroecol�gica, por meio de a��es que integrem atividades de ensino, pesquisa e extens�o em sua �rea de influ�ncia. <br>Quanto ao proponente: possuir t�tulo de mestre ou doutor; ser obrigatoriamente o coordenador do projeto e n�o ser contemplado na Chamada CNPq 81/2013.', 'chamada39-2014@cnpq.br', '', 'Agroecologia e Produ��o Org�nica.', '', '', '', '', 'As propostas devem ser acompanhadas de arquivo contendo o projeto e devem ser encaminhadas ao CNPq exclusivamente via Internet, utilizando-se do Formul�rio de Propostas online, dispon�vel na Plataforma Carlos Chagas.', '', 'A', '', '', 'http://goo.gl/x7P8JG', 0, 84, 'Observat�rio', 20141009, '', 'francine.zucco', '', '', 0, 1, 5, 1, 0, 1),
(85, 'Chamada CNPQ/CAPES n. 25/2014 - Editora��o', '2014-10-09', '00005', 'pt_BR', '25/2014', '2014-11-05', '1900-01-01', '1900-01-01', 'A presente Chamada tem por objetivo selecionar propostas para apoio financeiro a projetos que visem incentivar a editora��o e publica��o de peri�dicos cient�ficos brasileiros de alta especializa��o em todas as �reas de conhecimento de forma a contribuir significativamente para o desenvolvimento cient�fico e tecnol�gico e inova��o do Pa�s.', '', '1. O proponente deve possuir t�tulo de doutor, ser obrigatoriamente o coordenador da proposta e ter v�nculo formal com a institui��o de execu��o do projeto. <br>2. O peri�dico deve atender �s caracter�sticas descritas na chamada (item II.2.2.1).', 'editoracao@cnpq.br', '', '', '', '', '', '', 'As propostas devem ser acompanhadas de arquivo contendo o projeto e devem ser encaminhadas ao CNPq exclusivamente via Internet, utilizando-se do Formul�rio de Propostas online, dispon�vel na Plataforma Carlos Chagas.', '', 'A', '', '', 'http://www.cnpq.br/web/guest/chamadas-publicas?p_p_id=resultadosportlet_WAR_resultadoscnpqportlet_INSTANCE_0ZaM&filtro=abertas&detalha=chamadaDivulgada&idDivulgacao=5462', 0, 85, 'Observat�rio', 20141009, '', 'francine.zucco', 'Oportunidade de recursos para editora��o e publica��o de peri�dicos cient�ficos brasileiros', '', 0, 1, 5, 1, 0, 1),
(86, 'Tecnologia Assistiva no Brasil e Estudos sobre Defici�ncia (PGPTA) n. 59/2014', '2014-10-10', '00007', 'pt_BR', '59/2014', '2014-11-06', '2014-11-06', '1900-01-01', 'O PGPTA tem por objetivo estimular no Pa�s a realiza��o de projetos conjuntos de pesquisa com vistas a possibilitar o desenvolvimento de projetos de pesquisas cient�ficas e a forma��o de recursos humanos p�s-graduados na �rea de Tecnologia Assistiva no Brasil, contribuindo, assim, para desenvolver e consolidar o pensamento brasileiro contempor�neo na �rea.', 'Custeio: at� R$ 266.640,00; Capital: at� R$ 400.000,00 e bolsas.', '1.O edital dirige-se a pesquisadores de institui��es de Ensino Superior que possuam programas de p�s-gradua��o (PPG) stricto sensu acad�micos, recomendados pela CAPES com �reas de concentra��o ou linhas de pesquisa voltados � tecnologia assistiva ou dirigidas aos temas contemplados neste Edital. <br>2.Ser�o apoiados projetos que envolvam, obrigatoriamente, parcerias (rede ou cons�rcio) entre equipes de diferentes institui��es de ensino superior (3 a 4 equipes), preferencialmente de diferentes estados. <br>3.A institui��o l�der deve ter vinculado um PPG com conceito Capes  igual ou superior a 5. <br>4.O projeto dever� ter, prioritariamente, car�ter multi e interdisciplinar, contemplar a forma��o de RH e ter como objetivo final a forma��o de no m�nimo 3 mestres e 2 doutores. <br>5.O coordenador-geral deve possuir t�tulo de doutor h� pelo menos 5 anos e cada IES coparticipante deve indicar um coordenador doutor.', 'pgpta@capes.gov.br', '', 'Tecnologia Assistiva', '', '', '', '', 'As propostas dever�o ser enviadas � CAPES em 2 (duas) vias, uma impressa, por correio e outra, digitalizada em formato PDF, por e-mail (pgpta@capes.gov.br), at� o dia 06/11/2014.', '', 'A', '', '', 'http://www.capes.gov.br/bolsas/programas-especiais/programa-capes-pgtpa', 0, 86, 'Observat�rio', 20141010, '', 'francine.zucco', '', '', 0, 1, 7, 1, 0, 1),
(87, 'Prazo Prorrogado: Pr�mio Vale-Capes de Ci�ncia e Sustentabilidade 2014', '2014-11-18', '00007', 'pt_BR', '60/2014', '2014-11-30', '1900-01-01', '1900-01-01', 'Selecionar as melhores teses de doutorado e disserta��es de mestrado que tragam ideias, solu��es e processos inovadores para quest�es como redu��o do consumo de �gua e energia, redu��o de gases do efeito estufa (GEE), aproveitamento, reaproveitamento e reciclagem de res�duos e/ou rejeitos e tecnologia socioambiental com �nfase no combate � pobreza.', '', 'As teses e disserta��es para concorrerem ao Pr�mio devem: <br>1. estar dispon�veis no banco de teses e disserta��es da CAPES; <br>2. ter sido defendidas em 2013 e no Brasil; <br>3. ter sido defendidas em programa de p�s-gradua��o que tenha tido, no m�nimo, 5 (cinco) teses de doutorado e/ou 5 (cinco) disserta��es de mestrado defendidas no ano anterior ao do Edital.', 'premiovalecapes@capes.gov.br', '', 'Teses e disserta��es em: <br>1.Processos eficientes para redu��o do consumo de �gua e de energia; <br>2.Aproveitamento, reaproveitamento e reciclagem de res�duos e/ou <br>3.Redu��o de Gases do efeito estufa (GEE); <br>4.Tecnologias socioambientais, com �nfase no combate a pobreza.', '', '', '', '', 'A pr�-sele��o das teses e disserta��es a serem indicadas aos Pr�mios ocorrer� nos programas de p�s-gradua��o das Institui��es de Ensino Superior. Ap�s a indica��o do(s) trabalho(s) selecionado(s) pela comiss�o de avalia��o, o coordenador do programa de p�s-gradua��o ser� respons�vel pela inscri��o do(s) trabalho(s), exclusivamente, pelo site http://pvc.capes.gov.br/inscricao at� 30/11/2014.', '', 'A', '', '', 'http://www.capes.gov.br/bolsas/premios/premio-vale-capes-de-ciencia-e-sustentabilidade', 0, 87, 'Observat�rio', 20141118, '', 'francine.zucco', '', '', 0, 1, 7, 1, 0, 1);
INSERT INTO `fomento_edital` (`id_ed`, `ed_titulo`, `ed_dt_create`, `ed_agencia`, `ed_idioma`, `ed_chamada`, `ed_dt_deadline_elet`, `ed_dt_deadline_envio`, `ed_dt_previsao_divulg_res`, `ed_texto_1`, `ed_texto_2`, `ed_texto_3`, `ed_texto_4`, `ed_texto_5`, `ed_texto_6`, `ed_texto_7`, `ed_texto_8`, `ed_texto_9`, `ed_texto_10`, `ed_texto_11`, `ed_texto_12`, `ed_status`, `ed_autor`, `ed_corpo`, `ed_url_externa`, `ed_total_visualizacoes`, `ed_codigo`, `ed_local`, `ed_data_envio`, `ed_document_require`, `ed_login`, `ed_titulo_email`, `ed_edital_tipo`, `ed_fluxo_continuo`, `fdis_id`, `fag_id`, `i_id`, `ftp_id`, `fs_id`) VALUES
(88, 'Newton Researcher Links Workshop Call', '2014-10-16', '00048', 'pt_BR', '2014', '2014-11-20', '1900-01-01', '1900-01-01', 'Esta modalidade do Newton Researcher Links visa dar apoio financeiro a grupos de pesquisadores em in�cio de carreira do UK e do Brasil para desenvolverem workshop em parceria, focando no estabelecimento de links para oportunidades de futura colabora��o e desenvolvimento de carreira. <br>Os workshops devem: <br>1. Apoiar o desenvolvimento internacional de pesquisa relevante; <br>2. Contribuir para o desenvolvimento profissional de pesquisadores em in�cio de carreira; <br>3. Estabelecer novos links em pesquisa ou fortalecer os j� existentes, com potencial de sustentabilidade a longo prazo.', 'Para realiza��o de workshop.', 'Cada workshop ser� coordenado por dois pesquisadores l�deres, um de cada pa�s, e focar� tanto numa �rea espec�fica de pesquisa ou em temas interdisciplinares. <br>Os coordenadores poder�o apontar at� quatro pesquisadores l�deres ou seniores (dois de cada pa�s) para se envolverem nas atividades e atuarem como mentores; no entanto, o restante dos participantes deve ser pesquisadores em in�cio de carreira. <br>A proposta deve ser bilateral, com parceiro brit�nico prospectado. <br>O workshop deve ter dura��o de  3 a 5 dias, ser realizado entre 01/04/2015 e 31/03/2016, com no m�ximo 40 participantes e em ingl�s.', 'UK-ResearcherLinks@britishcouncil.org', '', 'Todas as �reas est�o contempladas, por�m as �reas priorit�rias no Brasil s�o: <br>1. Seguran�a alimentar; <br>2. Terapias avan�adas para o tratamento de doen�as cr�nicas: terapias celular e gen�tica; <br>3. Doen�as negligenciadas, <br>4. Radiof�rmacos; <br>5. Nanotecnologia aplicada � sa�de p�blica.', '', '', '', '', 'A submiss�o da proposta deve ser feita mediante preenchimento de formul�rio online - www.britishcouncil.org/education/science/current-opportunities/Newton-Researcher-Links-workshops', '', 'A', '', '', 'http://www.britishcouncil.org/education/science/current-opportunities/Newton-Researcher-Links-workshops', 0, 88, 'Observat�rio', 20141015, '', 'francine.zucco', 'Newton Fund: recursos para realiza��o de workshop em parceria com Universidade brit�nica', '', 0, 1, 48, 1, 0, 1),
(89, 'Newton Institutional Links Programme', '2014-10-16', '00048', 'pt_BR', '2014', '2014-11-20', '1900-01-01', '1900-01-01', 'O Fundo Newton busca estabelecer parcerias entre UK e outros pa�ses em pesquisa e inova��o em temas com direta relev�ncia no bem-estar social e no desenvolvimento econ�mico do pa�s parceiro. <br>O Newton Institutional Links Programme vai al�m da conex�o individual entre pesquisadores, oferecendo oportunidade para colabora��es em pesquisa e inova��o mais sustent�veis e pr�ticas entre grupos acad�micos, outras institui��es sem fins lucrativos e setor privado.', '�reas Capes: At� � 300.000,00 - recursos humanos, custeio, capital. <br>�rea SAE (Secretaria de Assuntos Estrat�gicos): at� � 150.000,00.', '1. Cada proposta deve ser submetida por um parceiro brit�nico e um brasileiro, pesquisadores seniores. <br>2. O projeto deve demonstrar seu impacto positivo no bem-estar social e desenvolvimento econ�mico dos pa�ses em desenvolvimento.', 'UK-InstitutionalLinks@britishcouncil.org', '', '�reas priorit�rias no Brasil (Capes): <br>1. Desenvolvimento de novos f�rmacos; <br>2. Agricultura; <br>3. �gua; <br>4. Meio ambiente. <br>Foco Secretaria de Assuntos Estrat�gicos (SAE): Conhecimento em adapta��o �s mudan�as clim�ticas no Brasil.', '', '', '', '', 'Pedimos que manifeste previamente seu interesse em participar para articula��o institucional - pdi@pucpr.br <br>A submiss�o da proposta deve ser feita mediante preenchimento de formul�rio online - http://www.britishcouncil.org/education/science/current-opportunities/institutional-links-2014', '', 'A', '', '', 'http://www.britishcouncil.org/education/science/current-opportunities/institutional-links-2014', 0, 89, 'Observat�rio', 20141016, '', 'francine.zucco', 'Newton Institutional Links Programme - Recursos para parceria com UK', '', 0, 1, 48, 1, 0, 1),
(90, '10� Pr�mio Construindo a Igualdade de G�nero/CNPq', '2015-01-26', '00055', 'pt_BR', '01', '2015-03-18', '1900-01-01', '1900-01-01', 'O Pr�mio Construindo a Igualdade de G�nero - concurso de reda��es, artigos cient�ficos e projetos pedag�gicos na �rea das rela��es de g�nero, mulheres e feminismos - � uma iniciativa da Secretaria de Pol�ticas para as Mulheres/Presid�ncia da Rep�blica, do Minist�rio da Ci�ncia e Tecnologia, do Conselho Nacional de Desenvolvimento Cient�fico e Tecnol�gico, do Minist�rio da Educa��o e da ONU Mulheres.', 'Bolsas, laptop e pr�mios em dinheiro, dependendo da categoria.', 'Mestra (e) e Estudante de Doutorado\r\nGraduada (o), Especialista e Estudante de Mestrado\r\nEstudante de Gradua��o\r\nEstudante do Ensino M�dio\r\nEscola Promotora da Igualdade de G�nero', '', '', 'O Pr�mio tem como objetivos estimular e fortalecer a reflex�o cr�tica e a pesquisa acerca das desigualdades existentes entre homens e mulheres em nosso pa�s, contemplando suas interse��es com as abordagens de classe social, gera��o, ra�a, etnia e sexualidade no campo dos estudos das rela��es de g�nero, mulheres e feminismos; e sensibilizar a sociedade para tais quest�es.', '', '', '', '', 'As inscri��es s�o individuais e devem ser realizadas at� 18 de mar�o de 2015, exclusivamente via internet, para todas as categorias, no endere�o eletr�nico: www.igualdadedegenero.cnpq.br', '', 'A', '', '', 'http://www.igualdadedegenero.cnpq.br/igualdade.html', 0, 90, 'Observat�rio', 20141203, '', 'jeferson.vieira', '', '4', 0, 1, 55, 1, 5, 1),
(91, 'NOVO YOUTUBE PUCPR - UM CANAL PLURAL', '2014-10-23', '00056', 'pt_BR', 'CANAL', '1900-01-01', '1900-01-01', '1900-01-01', 'SEGUNDA-FEIRA � DIA DE V�DEO: Uma grade universidade n�o gera conhecimento apenas dentro do c�mpus. Fora dele tamb�m.\r\n\r\nAl�m de produ��es de alunos e professores, teremos conte�dos pensados exclusivamente para o canal postados periodicamente.', 'INSCREVA-SE NO CANAL (link abaixo):  Receba todas as atualiza��es em tempo real e interaja com o canal.', '', '', '', 'NOSSA IDENTIDADE: Montamos uma programa��o com aberturas, vinhetas e dire��o de arte para estimular a visualiza��o do conte�do.', '', '', '', '', '', 'http://canalpucpr.pucpr.br/', '!', '', '', 'https://www.youtube.com/user/canalpucpr', 0, 91, 'Observat�rio', 0, '', 'jeferson.vieira', 'NOVO YOUTUBE PUCPR - UM CANAL PLURAL', '', 0, 1, 56, 1, 0, 4),
(92, '<br>Chamada n. 46/2014 - PRO�FRICA', '2014-10-28', '00005', 'pt_BR', '46/2014', '2015-01-22', '1900-01-01', '1900-01-01', 'O Programa de Coopera��o em Ci�ncia, Tecnologia e Inova��o com Pa�ses da �frica apoiar� projetos de pesquisa cient�fica e tecnol�gica que visem contribuir significativamente para o desenvolvimento cient�fico e tecnol�gico do Pa�s por meio do financiamento de projetos de pesquisa conjunta, no �mbito da coopera��o cient�fica, tecnol�gica e de inova��o com os pa�ses africanos e em especial com os pa�ses da comunidade de l�ngua portuguesa/CPLP do continente.', 'At� R$ 150.000,00 em custeio.', 'O proponente deve possuir t�tulo de doutor, ser obrigatoriamente o coordenador da proposta e ter v�nculo formal com a institui��o de execu��o do projeto. <br>� recomend�vel a exist�ncia de outras parcerias e que a proposta demonstre a exist�ncia de apoio de outras institui��es nacionais ou estrangeiras na forma de recursos financeiros ou de infra-estrutura para pesquisa, efetivamente necess�rios � execu��o do projeto.', 'coped@cnpq.br', '', 'Seguran�a alimentar, sa�de p�blica, desenvolvimento agr�cola e pecu�rio, inclus�o social, mudan�as clim�ticas e eventos extremos.', '', '', '', '', 'As propostas devem ser acompanhadas de arquivo contendo o projeto e devem ser encaminhadas ao CNPq exclusivamente via Internet, utilizando-se do Formul�rio de Propostas online, dispon�vel na Plataforma Carlos Chagas.', '', 'A', '', '', 'http://goo.gl/CtRvkw', 0, 92, 'Observat�rio', 20141028, '', 'francine.zucco', 'Programa de Coopera��o em Ci�ncia, Tecnologia e Inova��o com Pa�ses da �frica', '', 0, 1, 5, 1, 0, 1),
(93, 'EDITAL N� 61/2014 - Programa Dra. Ruth Cardoso', '2014-10-30', '00007', 'pt_BR', '61/2014', '2014-12-07', '1900-01-01', '1900-01-01', 'O presente edital tem como objetivo selecionar candidato para bolsa de professor/pesquisador visitante brasileiro, atuando em institui��es brasileiras, em meio de carreira, no �mbito do programa C�tedra Dra. Ruth Cardoso, oferecendo apoio � participa��o em atividades de doc�ncia e pesquisa nas Ci�ncias Humanas e Sociais na Universidade Columbia, na cidade de Nova Iorque, EUA.', 'Estip�ndio mensal: US$ 5.000,00 e benef�cios.', '<br>1.Ter conclu�do seu doutorado at� 31 de dezembro de 2005; <br>2.possuir nacionalidade brasileira, n�o cumulada com nacionalidade norte-americana; <br>3.estar credenciado como docente e orientador em programa de p�s-gradua��o reconhecido pela CAPES; <br>4.dedicar-se em regime integral �s atividades acad�micas, que devem incluir a doc�ncia, orienta��o ou co-orienta��o de disserta��es ou teses e a participa��o em projetos de pesquisa nas �reas de Hist�ria do Brasil Contempor�nea, Antropologia, Ci�ncia Pol�tica e Sociologia.', 'fulbright@capes.gov.br', '', 'Hist�ria do Brasil Contempor�nea, Antropologia, Ci�ncia Pol�tica e Sociologia', '', '', '', '', 'O candidato deve submeter sua candidatura exclusivamente via internet - www.fulbright.org.br', '', 'A', '', '', 'http://www.capes.gov.br/cooperacao-internacional/estados-unidos/programa-ruth-cardoso', 0, 93, 'Observat�rio', 20141030, '', 'francine.zucco', 'Bolsa pesquisador visitante em ci�ncias humanas e sociais - Universidade de Columbia', '', 0, 1, 7, 1, 0, 1),
(94, '�ltimos dias: CP 18/2014 -Coopera��o Internacional Funda��o Arauc�ria/INRIA/INS2i-NRS', '2014-12-09', '00002', 'pt_BR', 'CP 18/2014', '2014-12-18', '1900-01-01', '1900-01-01', 'Apoiar propostas de pesquisa cient�fica, tecnol�gica e de inova��o em ci�ncia e tecnologia da informa��o e comunica��o (TIC), mediante a sele��o de projetos conjuntos a serem executados por equipe de pesquisadores do Estado do Paran� (Equipe Brasileira Principal ou Orbital) e pesquisadores franceses do INRIA ou do INS2i-CNRS, em colabora��o eventual com pesquisadores de outros estados da federa��o.', 'At� R$ 120.000,00 por projeto, no caso de Equipe Principal com agrega��o de Equipe Brasileira Orbital. <br> At� R$ 100.000,00 sem Equipe Brasileira Orbital. <br>At� R$ 40.000,00 se apenas Equipe Orbital.', 'O proponente deve: <br>1.Possuir o t�tulo de Doutor e experi�ncia em projetos de coopera��o internacional e/ou alta qualifica��o; <br>2.ter v�nculo empregat�cio/funcional com a Institui��o Executora Local; <br>3.ter produ��o cient�fica e tecnol�gica relevante nos �ltimos cinco anos. <br><br>Os parceiros da Fran�a dever�o apresentar proposta correspondente ao INRIA ou ao INS2i-CNRS, bem como coparticipes brasileiros �s FAPs de seus respectivos estados.', '', '', 'Tecnologia da Informa��o e Comunica��o', '', '', '', '', 'As propostas dever�o ser enviadas � Funda��o Arauc�ria por meio do Sistema de Informa��o e Gest�o de Projetos (SigArauc�ria), dispon�vel no site www.fappr.br', '', 'A', '', '', 'http://www.fappr.pr.gov.br/arquivos/File/chamadas2014/CP18_2014_Inria.pdf', 0, 94, 'Observat�rio', 20141209, '', 'francine.zucco', '�ltimos dias: Programa de Coopera��o em TICs entre Funda��o Arauc�ria e institutos franceses', '', 0, 1, 2, 1, 0, 1),
(95, 'Edital 62/2014 - Programa de bolsa especial para doutorado em pesquisa m�dica PBE-DPM II', '2015-01-26', '00007', 'pt_BR', '62/2014', '2015-03-06', '2015-03-06', '1900-01-01', 'Apoiar a forma��o de recursos humanos em pesquisa m�dica, com a finalidade de estimular a produ��o acad�mica e a forma��o de pesquisadores, em n�vel de doutorado, por meio de financiamento espec�fico, consolidando e ampliando o pensamento cr�tico estrat�gico para o desenvolvimento cient�fico do Pa�s.', 'Bolsas de doutorado', 'Este Edital dirige-se a coordenadores de programas de p�s-gradua��o stricto sensu das �reas de Medicina e �reas afins, de institui��es p�blicas e privadas brasileiras, que possuam programas com conceito 5, 6 ou 7 que possuam �rea de concentra��o ou linha de pesquisa em Medicina.', '', '', 'Medicina', '', '', '', '', 'O envio da(s) proposta(s) dever� ser feito via correio, em formato impresso para o endere�o especificado no item 13 deste Edital.  Dever� ser enviada, tamb�m, uma c�pia digital da proposta em formato PDF ao e-mail: doutorado.pesquisa@capes.gov.br', '', '!', '', '', 'http://capes.gov.br/bolsas/programas-especiais/pbe-dpm', 0, 95, 'Observat�rio', 20141104, '', 'francine.zucco', '', '1', 0, 1, 7, 1, 2, 4),
(96, 'C�tedra Capes/Univerisdade de Harvard - 51/2014', '2014-11-07', '00007', 'pt_BR', '51/2014', '2014-12-30', '1900-01-01', '1900-01-01', 'O objetivo espec�fico deste Programa C�tedra CAPES / Universidade de Harvard ? Professor Visitante S�nior nos EUA � a sele��o para concess�o de bolsa de at� 12 meses de dura��o a professor visitante na Universidade de Harvard. A vaga ser� preenchida por um not�vel pesquisador e professor s�nior do Brasil, especialista em qualquer disciplina ou �rea acad�mica.', 'Bolsa e aux�lios', 'O candidato deve: <br>-possuir t�tulo de doutor; <br>-estar credenciado como docente e orientador em programa de p�s&#8208;gradua��o reconhecido pela Capes, <br>-dedicar&#8208;se em regime integral �s atividades acad�micas; <br>-ter flu�ncia em ingl�s.', 'harvard@capes.gov.br', '', 'Diversas �reas do conhecimento', '', '', '', '', 'O candidato deve submeter sua candidatura exclusivamente via internet constando os documentos descritos no edital.', '', 'A', '', '', 'http://www.capes.gov.br/cooperacao-internacional/estados-unidos/catedra-capes-harvard', 0, 96, 'Observat�rio', 20141107, '', 'francine.zucco', 'Oportunidade de C�tedra em Harvard', '', 0, 1, 7, 1, 0, 1),
(97, 'Grand Challenges in Global Health: Preventing Preterm Birth', '2014-11-07', '00057', 'pt_BR', '2014-2015', '2014-12-01', '1900-01-01', '1900-01-01', 'The present Request for Proposals (RFP) is the third call for proposals of the Preventing Preterm Birth initiative. The present Request for Proposals (RFP) is meant to catalyze additional research into longitudinal determinants of both healthy and abnormal pregnancy, with emphasis on preterm birth, by funding pilot studies to assess the feasibility of applying multi-omics high-throughput systems biology.', 'Total cost of $500,000 (including indirect costs)', 'Characteristics of successful proposals: the overarching goal is to assess the feasibility and reproducibility of multi-platform systems biologic approaches to characterize normal and abnormal pregnancy in a limited series of pilot projects. <br><br>Successful proposals may include one or more of the Aims: <br>1. Samples collection; <br>2. Utilization of high-throughput platforms; <br>3. Computational analysis of meta-data from multiple platforms. <br><br>Collaboration and cooperation among Research Investigators will be required with preference for cross-disciplinary studies and computational biology that could provide the most detailed interrogation of hypotheses, validation, and interventions appropriate to low-resource settings.', 'gappsgrants@seattlechildrens.org', '', '', '', '', '', '', 'Submission of a letter of inquiry (LOI) to GAPPS by December 1st, 2014. Letters of inquiry must be submitted electronically, using the forms, instructions, and process \r\ndescribed at: www.gapps.org/healthybirth.', '', 'A', '', '', 'http://gapps.org/index.php/research/healthy_birth/', 0, 97, 'Observat�rio', 20141107, '', 'francine.zucco', 'Oportunidade Grand Challenges em Preventing Preterm Birth initiative', '', 0, 1, 57, 1, 0, 1),
(98, 'Grand Challenges: New Interventions for Global Health', '2014-11-10', '00057', 'us_EN', '14-15', '2015-01-13', '1900-01-01', '1900-01-01', 'This challenge focuses on innovative concepts for vaccines, therapeutics, and diagnostics with the potential to be translated into safe, effective, affordable, and widely utilized interventions to protect against the acquisition, progression, or transmission of infectious diseases, or to provide a cure for infectious diseases, in resource&#8208;limited settings.', 'Full awards: up to USD $10,000,000, <br>Pilot awards of up to USD $2,000,000.', 'Full awards up to $10M and up to four years: must include an industry, biotech or other translational partner either leading or participating in the application. <br>Pilot awards up to $2M and up to four years:  do not include a requirement for a biotech or translation partner but such partnerships would still be welcome', 'grandchallenges@gatesfoundation.org', '', '', '', '', '', '', '', '', 'A', '', '', 'http://gcgh.grandchallenges.org/GrantOpportunities/Pages/NewInterventions.aspx', 0, 98, 'Observat�rio', 20141110, '', 'francine.zucco', 'Oportunidade: Grand Challenges: New Interventions for Global Health', '', 0, 1, 57, 2, 0, 1),
(99, 'Prazo prorrogado: Programa Capes/NUFFIC - Coopera��o com a Holanda - 63/2014', '2014-12-15', '00007', 'pt_BR', '63/2014', '2015-01-16', '1900-01-01', '1900-01-01', 'O presente Edital tem como objetivo selecionar projetos conjuntos de pesquisa desenvolvidos por grupos brasileiros e holandeses vinculados � Institui��es de Ensino Superior e/ou de Pesquisa com o intuito de apoiar e fomentar o interc�mbio cient�fico entre grupos de pesquisa e desenvolvimento p�blicos brasileiros e holandeses. O Programa CAPES/NUFFIC visa fomentar a mobilidade de docentes e de estudantes de gradua��o e p�s-gradua��o nos n�veis de doutorado e de p�s-doutorado.', 'Miss�es de trabalho, miss�es de estudo e recursos de custeio.', '-A proposta de projeto deve: <br>-ter car�ter institucional e ser coordenada por representante docente brasileiro, detentor de t�tulo de doutorado h� pelo menos 4 anos; <br>-cada departamento da IES brasileira poder� apresentar somente uma proposta de projeto; <br>-a proposta dever� conter previs�o de forma��o de recursos humanos nas modalidades de gradua��o sandu�che, doutorado sandu�che e est�gio p�s-doutoral; <br>-ter car�ter inovador; <br>-favorecer o aprendizado da l�ngua no pa�s parceiro; <br>-preferencialmente associar-se em rede com mais de uma Institui��o de cada pa�s.', 'nuffic@capes.gov.br', '', 'Ci�ncias Biol�gicas, Engenharias, Ci�ncias M�dicas (Ci�ncias da Sa�de), Ci�ncias Agr�colas, Ci�ncias Sociais Aplicadas, Ci�ncias Humanas e Artes', '', '', '', '', 'A proposta deve ser similar em cada um dos pa�ses, contendo o plano de a��es conjuntas e a programa��o da forma��o de recursos humanos em ambos os sentidos. <br>As inscri��es ser�o  admitidas exclusivamente pela internet, mediante o preenchimento do Formul�rio de Inscri��o e o envio de documentos eletr�nicos -\r\nhttp://www.capes.gov.br/cooperacao-internacional/holanda/programa-capesnuffic', '', '!', '', '', 'http://capes.gov.br/cooperacao-internacional/holanda/programa-capesnuffic', 0, 99, 'Observat�rio', 0, '', 'francine.zucco', 'Prazo prorrogado: Oportunidade de coopera��o com a Holanda - 16/01', '', 0, 1, 7, 1, 0, 4),
(100, 'Grand Challenges: Putting Women and Girls at the Center of Development', '2014-11-10', '00057', 'us_EN', '2014-2015', '2015-01-13', '1900-01-01', '1900-01-01', 'The ultimate goal of this challenge is to accelerate discovery of how to most effectively and intentionally identify and address gender inequalities and how this relates to sectoral outcomes; scale-up approaches known to work, in context-relevant ways; and do more to develop better measures of the impact of approaches to enhance women?s and girls? empowerment and agency. ', '-2-year exploratory grants at USD $500,000 to support the initial development and validation of solutions. <br>-4-year full grants at USD $2.5 million to develop, refine, and rigorously test larger multi-sectoral approaches, including those that have previous data demonstrating proof of concept, and show promise and potential for scale', 'Investigators in low-income and middle-income countries. Women-led organizations and applications involving projects led by women are encouraged.', '', '', 'Solutions in: urban sanitation; financial services for the poor; agricultural development; HIV/AIDS; family planning; maternal, newborn and child health; nutrition; and emergency relief.', '', '', '', '', '', '', 'A', '', '', 'http://gcgh.grandchallenges.org/GrantOpportunities/Pages/WomenandGirls.aspx', 0, 100, 'Observat�rio', 20141110, '', 'francine.zucco', 'Oportunidade Grand Challenges: Putting Women and Girls at the Center of Development', '', 0, 1, 57, 2, 0, 1),
(101, 'Global Brain and Nervous System Disorders Research Across the Lifespan', '2014-11-10', '00058', 'us_EN', '2014/15', '2015-01-05', '1900-01-01', '1900-01-01', 'This Funding Opportunity Announcement (FOA) encourages applications proposing innovative, collaborative research projects between United States (U.S.) and low- and middle-income country (LMIC) scientists (or direct collaborations between upper middle-income country (UMIC), and other LMIC scientists) on brain and other nervous system function and disorders throughout life, relevant to LMICs. These research programs are expected to contribute to the long-term goals of building sustainable research capacity in LMICs to address nervous system development, function and impairment throughout life, which may ultimately lead to diagnostics, prevention, treatment, rehabilitation and implementation strategies.', 'Application budgets are not limited, but need to reflect actual needs of proposed project.  Direct costs do not include any consortium/contractual Facilities and Administrative (F & A) costs.', 'At least two institutions, one in the U.S. or UMIC (upper-middle income)  and one in a LMIC (low-middle income) must be involved as partners in the grant application.', 'brainfic@mail.nih.gov', '', 'Nervous system function and/or impairment from birth to advanced age and across generations.', '', '', '', '', 'Applications must be submitted electronically following the instructions described in the SF424 (R&R) Application Guide.', '', 'A', '', '', 'http://grants.nih.gov/grants/guide/pa-files/PAR-14-332.html#_Section_III._Eligibility', 0, 101, 'Observat�rio', 20141110, '', 'francine.zucco', 'Oportunidade do National Institutes of Health - Global Brain and Nervous System Disorders Research', '', 0, 1, 58, 2, 0, 1),
(102, 'Programa de Bolsas FA & Renault do Brasil - CP 19/2014', '2014-11-11', '00002', 'pt_BR', '19/2014', '2014-12-12', '1900-01-01', '1900-01-01', 'Incentivar a articula��o entre institui��es de ensino superior e institutos de pesquisa e a Renault do Brasil, oportunizando parceria na forma��o de futuros profissionais e favorecer o aprendizado de estudantes em pr�ticas diferenciadas relacionadas ao universo de autom�veis.', 'Bolsas para alunos da gradua��o, mestrado e doutorado.', 'A proposta deve ser apresentada por um Coordenador Institucional do Programa com v�nculo formal com a institui��o proponente.', 'projetos2@fundacaoaraucaria.org.br', '', '', '', '', '', '', 'As propostas dever�o ser enviadas por meio do Sistema de Informa��o e Gest�o de Projetos (SigArauc�ria), dispon�vel no site www.fappr.pr.gov.br', '', '!', '', '', 'http://www.fappr.pr.gov.br/arquivos/File/chamadas2014/CP19_2014_Renault.pdf', 0, 102, 'Observat�rio', 20141111, '', 'francine.zucco', '', '', 0, 1, 2, 1, 0, 4),
(103, 'Grandes Desafios Brasil: Desenvolvimento Saud�vel Para Todas as Crian�as - 47/2014', '2014-11-17', '00057', 'pt_BR', '47/2014', '2015-01-17', '1900-01-01', '1900-01-01', 'O CNPq/MCTI, o Decit/SCTIE/MS e a Funda��o Bill & Melinda Gates formaram uma alian�a estrat�gica em torno de prioridades comuns e lan�aram em conjunto o Programa Grandes Desafios Brasil (Grand Challenges Brazil) com o objetivo de dar apoio � pesquisa e � inova��o na �rea de sa�de. <br>O programa "Grandes Desafios Brasil: Desenvolvimento Saud�vel Para Todas as Crian�as" foca em novas ferramentas para mensurar o desenvolvimento infantil e em novas combina��es de abordagens para promover o desenvolvimento infantil ? de maneira que elas n�o apenas sobrevivam, mas tamb�m tenham uma vida saud�vel e produtiva.', '1. Financiamento b�sico ou ?semente?, no valor m�ximo de R$ 500.000,00 com dura��o de at� dois anos; <br>2. Financiamento pleno, no valor m�ximo de R$ 4.000.000,00 para at� 4 anos.', 'O proponente deve possuir t�tulo de doutor, ser obrigatoriamente o coordenador da proposta e ter v�nculo formal com a institui��o de execu��o do projeto. <br><br>Como primeira etapa, a carta de inten��o deve ser enviada at� 17/01/2015. Esta carta deve conter no m�ximo 4 p�ginas (para cada idioma - portugu�s e ingl�s), incluindo um resumo do projeto. O sum�rio, de at� 250 palavras, deve incluir uma ou duas frases em negrito que captem o ponto essencial da sua ideia. O resumo deve indicar qual � o problema espec�fico que o projeto busca resolver, qual � a abordagem proposta para a solu��o do problema, por que o projeto � inovador e qual � o impacto esperado do projeto ? caso seja bem sucedido ? ao final do per�odo de financiamento.', 'chamada472014@cnpq.br', '', 'Desenvolvimento infantil - Inova��o em ferramentas de mensura��o, pacotes de intera��es e ferramentas anal�ticas.', '', '', '', '', 'As propostas devem ser acompanhadas de arquivo contendo o projeto e devem ser encaminhadas ao CNPq exclusivamente via Internet, utilizando-se do Formul�rio de Propostas online, dispon�vel na Plataforma Carlos Chagas.', '', 'A', '', '', 'http://goo.gl/c6snmk', 0, 103, 'Observat�rio', 20141117, '', 'francine.zucco', 'Parceria entre CNPq e Bill & Melinda Gates Foundation em Desenvolvimento Infantil', '', 0, 1, 57, 1, 0, 1),
(104, 'LONGITUDE PRIZE 2014 - Challenge with a �10 million prize fund to help solve the problem of global antibiotic resistance', '2015-01-26', '00060', 'us_EN', 'V10', '2015-05-31', '1900-01-01', '1900-01-01', 'Longitude Prize 2014 is a challenge prize fund to help solve the problem of global antibiotic resistance. It is being run by Nesta, supported by Innovate UK, the new name for the Technology Strategy Board, as funding partner.', 'Longitude Prize is looking to help tackle the problem of antibiotic resistance with a �10 million prize fund for a diagnostic tool that can rule out antibiotic use or help identify an effective antibiotic to treat a patient.', 'Anyone of any age and any organisation may enter the competition. The team is able to demonstrate that in winning the Longitude Prize it would deliver direct economic growth \r\nor benefit or social benefit in the UK. Include a member which has a presence in the United Kingdom, meaning an office in the UK, affiliation with a UK Company or partnership with a UK organisation or institution.', 'longitude.prize@nesta.org.uk', '', 'The Longitude Prize will therefore focus on diagnostic technologies that can be used at the point?of?care and exclude technologies that can only be used in a laboratory. The challenge: better point?of?care diagnosis of infections.', '', '', '', '', 'http://longitudeprize.org/enter', 'pdi@pucpr.br', 'A', '', '', 'http://goo.gl/G64PJh', 0, 104, 'Observat�rio', 20141119, '', 'jeferson.vieira', 'LONGITUDE PRIZE 2014 - Challenge with a �10 million prize fund to help solve the problem of global a', '4', 0, 1, 60, 2, 5, 1),
(105, 'Doutorado Sandu�che no Exterior (SWE)', '2015-03-12', '00005', 'pt_BR', '2014', '2015-04-23', '1900-01-01', '1900-01-01', 'Apoiar aluno formalmente matriculado em curso de doutorado no Brasil que comprove qualifica��o para usufruir, no exterior, da oportunidade de aprofundamento te�rico, coleta e/ou tratamento de dados ou desenvolvimento parcial da parte experimental de sua tese a ser defendida no Brasil.', 'Mensalidade, aux�lios e taxas.', 'O candidato deve: <br>1. estar formalmente matriculado em curso de doutorado no Brasil reconhecido pela CAPES; <br>2. ter conhecimento do idioma em quest�o; <br>3. ter anu�ncia do coordenador do PPG e dos orientadores no pa�s e exterior; <br>4. ser brasileiro ou com visto permanente; <br>5. n�o acumular bolsa.', '', '', 'Diversas �reas de conhecimento.', '', '', '', '', 'As propostas dever�o ser submetidas por meio de formul�rio eletr�nico de propostas, dispon�vel na Plataforma Carlos Chagas.', '', 'B', '', '', 'http://www.cienciasemfronteiras.gov.br/web/csf/doutorado-sanduiche', 0, 105, 'Observat�rio', 20141124, '', 'francine.zucco', 'Doutorado Sandu�che no Exterior (SWE)', '1', 0, 1, 5, 1, 2, 2),
(106, 'Bolsas para Pesquisa Capes/Humboldt - 57/2014', '2014-12-01', '00007', 'pt_BR', '57/2014', '2014-12-31', '1900-01-01', '1900-01-01', 'A parceria da Capes com a Funda��o Alexander von Humboldt (AvH) visa � internacionaliza��o de forma mais consistente, o aprimoramento da produ��o e qualifica��o cient�ficas e o desenvolvimento de m�todos e teorias em conjunto com pesquisadores, de reconhecido m�rito cient�fico, alem�es ou estrangeiros residentes na Alemanha.', 'Bolsa mensal, aux�lios, curso de alem�o (se necess�rio).', '1.P�s-doutorado: para pesquisador altamente qualificado e em in�cio da carreira acad�mica, que tenha completado seu doutorado h� menos de quatro anos. <br>2.Pesquisador experiente: para acad�mico altamente qualificado com um perfil de pesquisa definido, que tenha completado seu doutorado h� menos de doze anos. <br><br>Confirma��o de aceita��o por uma institui��o alem� com infraestrutura adequada � realiza��o do projeto de pesquisa proposta e compet�ncia lingu�stica em alem�o e/ou ingl�s.', 'humboldt@capes.gov.br', '', 'Humanas, Ci�ncias Sociais, Medicina, Ci�ncias Naturais e Engenharias', '', '', '', '', 'As inscri��es ser�o gratuitas e admitidas exclusivamente pela internet, mediante o preenchimento de formul�rios de inscri��o e o envio de documentos eletr�nicos no endere�o: http://capes.gov.br/cooperacaointernacional/alemanha/humboldt', '', 'A', '', '', 'http://www.capes.gov.br/cooperacao-internacional/alemanha/humboldt', 0, 106, 'Observat�rio', 20141126, '', 'francine.zucco', '', '', 0, 1, 7, 1, 0, 1),
(107, 'Patroc�nio a Eventos Culturais 2015', '2014-11-27', '00021', 'pt_BR', 'BNDES/PE', '2014-12-19', '2014-12-19', '1900-01-01', 'O BNDES receber�, para o 1� per�odo de 2015 (de mar�o a agosto), propostas de patroc�nio a eventos culturais nos segmentos de M�sica e Literatura. S�o considerados eventos culturais os projetos com dura��o e local pr�-estabelecidos, que contribuam para a difus�o e fomento da cultura brasileira, tais como mostras, festivais, feiras, espet�culos, entre outros.', 'An�lise pelo BNDES.', 'Os pedidos de patroc�nio podem ser apresentados por pessoas jur�dicas regularmente constitu�das, que detenham  ? isolada ou conjuntamente ? a responsabilidade pelo projeto.\r\nN�o ser�o objeto de patroc�nio, propostas apresentadas por: \r\nPessoas f�sicas, incluindo microempreendedores individuais ou empres�rios individuais, que possuem natureza jur�dica de pessoa f�sica;\r\nassocia��es de empregados das empresas integrantes do Sistema BNDES, da ativa ou aposentados;\r\nentidades pol�tico-partid�rias; ou\r\nentidades religiosas.', '21 2172-7447', '', 'M�sica:	Festivais, feiras e espet�culos com �nfase em m�sica instrumental e cl�ssica, que re�nam artistas e grupos diversos, prioritariamente brasileiros. ||||||||  \r\nLiteratura: Festivais, festas e feiras liter�rias com �nfase na divulga��o da obra e da produ��o de diferentes autores, prioritariamente brasileiros.', '', '', '', '', 'http://goo.gl/E3Bv2L', 'pdi@pucpr.br', 'B', '', '', 'http://goo.gl/dXmSrH', 0, 107, 'Observat�rio', 20141127, '', 'jeferson.vieira', 'Patroc�nio a Eventos Culturais 2015', '', 0, 1, 21, 1, 0, 2),
(108, '<br>C�tedra Capes/Sorbonne - 66/2014', '2015-01-26', '00007', 'pt_BR', '66/2014', '2015-03-01', '1900-01-01', '1900-01-01', 'Conceder bolsa a not�vel pesquisador e professor s�nior do Brasil, especialista em qualquer disciplina ou �rea acad�mica, para lecionar e pesquisar na Sorbonne Universit�s.', 'Mensalidade e aux�lios', 'Ser brasileiro ou estrangeiro com visto; possuir t�tulo de doutor h� pelo menos cinco anos; possuir atua��o acad�mica qualificada e reconhecida compet�ncia profissional com produ��o intelectual consistente; ter flu�ncia em ingl�s ou franc�s.', 'catedra.sorbonne@capes.gov.br', '', 'Diversas �reas do conhecimento', '', '', '', '', 'As inscri��es ser�o gratuitas e feitas exclusivamente pela internet, mediante o preenchimento do formul�rio de inscri��o dispon�vel (http://www.capes.gov.br/cooperacao-internacional/catedras)', '', 'A', '', '', 'http://capes.gov.br/cooperacao-internacional/catedras/catedra-sorbonne', 0, 108, 'Observat�rio', 20141128, '', 'francine.zucco', '', '1', 0, 1, 7, 1, 2, 1),
(109, 'C�tedra Capes/CES de Ci�ncias Sociais e Humanas em Portugal - 67/2014', '2015-01-26', '00007', 'pt_BR', '67/2014', '2015-03-01', '1900-01-01', '1900-01-01', 'Visa a conceder bolsa a not�vel pesquisador e professor s�nior do Brasil, especialista na �rea de ci�ncias sociais e humanas, para lecionar e pesquisar no Centro de Estudos Sociais da Universidade de Coimbra, Portugal, no �mbito da C�tedra CAPES/CES de Ci�ncias Sociais e Humanas.', 'Mensalidade e aux�lios', 'Ser brasileiro ou estrangeiro com visto; possuir t�tulo de doutor h� pelo menos cinco anos; possuir atua��o acad�mica qualificada e reconhecida compet�ncia profissional com produ��o intelectual consistente.', 'catedracoimbra@capes.gov.br', '', 'Ci�ncias Sociais e Humanas', '', '', '', '', 'As inscri��es ser�o gratuitas e feitas exclusivamente pela internet, mediante o preenchimento do formul�rio de inscri��o dispon�vel (http://www.capes.gov.br/cooperacao-internacional/catedras)', '', 'A', '', '', 'http://capes.gov.br/cooperacao-internacional/catedras/programa-catedra-capes-ces-de-ciencias-sociais-e-humanas-portugal', 0, 109, 'Observat�rio', 20141128, '', 'francine.zucco', '', '1', 0, 1, 7, 1, 2, 1),
(110, 'C�tedra Capes/Universidade de Bolonha - 68/2014', '2015-01-26', '00007', 'pt_BR', '68/2014', '2015-03-01', '1900-01-01', '1900-01-01', 'Visa a conceder bolsa a not�vel pesquisador e professor s�nior do Brasil, especialista em qualquer disciplina ou �rea acad�mica, para lecionar e pesquisar na Universidade de Bolonha, It�lia, no �mbito da C�tedra CAPES/Universidade de Bolonha.', 'Mensalidade e aux�lios', 'Ser brasileiro ou estrangeiro com visto; possuir t�tulo de doutor h� pelo menos cinco anos; possuir atua��o acad�mica qualificada e reconhecida compet�ncia profissional com produ��o intelectual consistente; ter flu�ncia em italiano, ingl�s ou portugu�s (em casos espec�ficos).', 'catedra.unibo@capes.gov.br', '', 'Diversas �reas do conhecimento', '', '', '', '', 'As inscri��es ser�o gratuitas e feitas exclusivamente pela internet, mediante o preenchimento do formul�rio de inscri��o dispon�vel no endere�o virtual do programa.', '', 'A', '', '', 'http://capes.gov.br/cooperacao-internacional/catedras/programa-catedra-capes-universidade-de-bolonha', 0, 110, 'Observat�rio', 20141201, '', 'francine.zucco', '', '1', 0, 1, 7, 1, 2, 1),
(111, '<br>Postdoc CsF - IIASA/�ustria', '2014-12-01', '00061', 'pt_BR', '2014', '2014-12-19', '1900-01-01', '1900-01-01', 'Every year IIASA provides full funding for several postdoctoral researchers. Scholars are expected to conduct their own research in collaboration with one or more of IIASA�s research programs or special projects. Postdoctoral positions, up to 2 years duration, can begin up to 6 months after selection. ', '', 'Have a proven record of research accomplishments, and a solid working knowledge of English; have held a doctoral degree for less than 5 years at the application deadline.', '', '', 'Advanced systems Analysis; Evolution and Ecology; Energy; Ecosystems Services & Management; Mitigation of Air Pollution & greenhouse Gases; World Population; Risk, Policy and Vulnerability; Transitions to New Technologies; Water; Tropical Futures Initiative.', '', '', '', '', 'Applying for the postdoctoral fellowship is done through the IIASA online postdoctoral application form (available on 5th Dec). Once you have a letter of support from an IIASA supervisor, you are automatically considered for the regular IIASA Post Doc fellowship and you can apply to CNPq/Ci�ncias sem Fronteiras. The next deadline (CsF) is 19/12, and then 23/05/2015.', '', 'A', '', '', 'http://www.iiasa.ac.at/web/home/education/postdoctoralProgram/Apply/Application-2014.en.html', 0, 111, 'Observat�rio', 20141201, '', 'francine.zucco', '', '', 0, 1, 61, 1, 0, 1),
(112, 'IIASA Young Scientists Program <br>(2015 YSSP)', '2014-12-01', '00061', 'us_EN', '2014/15', '2015-01-12', '1900-01-01', '1900-01-01', 'Since 1977, IIASA?s annual 3-month Young Scientists Summer Program (YSSP) offers research opportunities to talented young researchers whose interests correspond with IIASA?s ongoing research on issues of global environmental, economic and social change. From June through August accepted participants work within the Institute?s research programs under the guidance of IIASA scientific staff.', '', '1. Have research experience corresponding to a level typical of a researcher about 2 years prior to receiving a PhD or equivalent degree; <br>2. A summer research proposal that clearly fits the interdisciplinary research agenda of a selected IIASA program; <br>3. Ability to work independently as well as to interact with other scientists; <br>4. Fluency in English and the ability to communicate in a scientific environment.', '', '', 'Advanced systems Analysis; Evolution and Ecology; Energy; Ecosystems Services & Management; Mitigation of Air Pollution & greenhouse Gases; World Population; Risk, Policy and Vulnerability; Transitions to New Technologies; Water; Tropical Futures Initiative.', '', '', '', '', 'Before sending your application you are strongly advised to get in touch with the relevant program representatives to find out about mutual interest in your intended research. More information at http://www.iiasa.ac.at/web/home/education/yssp/Apply/OnlineApplication/Online-application.en.html', '', 'A', '', '', 'http://www.iiasa.ac.at/web/home/education/yssp/Apply/ConditionsEligibility/Conditions-and-Eligibility.en.html', 0, 112, 'Observat�rio', 20141201, '', 'francine.zucco', '', '', 0, 1, 61, 2, 0, 1),
(113, '<br>SWE e PDE CsF/CISB/SAAB', '2015-01-26', '00005', 'pt_BR', '42/2014', '2015-05-15', '1900-01-01', '1900-01-01', 'Propiciar a forma��o de recursos humanos altamente qualificados nas melhores universidades e institui��es de pesquisa estrangeiras, com vistas a promover a internacionaliza��o da ci�ncia e tecnologia nacional, estimulando estudos e pesquisas de brasileiros no exterior.', 'Mensalidade, aux�lios e taxas.', 'O candidato deve: ter o curr�culo Lattes atualizado; ser brasileiro ou estrangeiro regular; possuir forma��o profissional compat�vel, possuir conhecimento do idioma a ser confirmado em entrevista.', 'coene@cnpq.br', '', 'Materiais e manufatura, Eletr�nica, TICs, Engenharia Mec�nica', '', '', '', '', 'As propostas devem ser acompanhadas de arquivo contendo o projeto em portugu�s e em ingl�s e devem ser encaminhadas ao CNPq exclusivamente pela Internet, utilizando-se do Formul�rio de Propostas online, dispon�vel na Plataforma Carlos Chagas.', '', 'A', '', '', 'http://www.cnpq.br/web/guest/chamadas-publicas?p_p_id=resultadosportlet_WAR_resultadoscnpqportlet_INSTANCE_0ZaM&filtro=abertas&detalha=chamadaDivulgada&idDivulgacao=5562', 0, 113, 'Observat�rio', 20141208, '', 'francine.zucco', 'Bolsas SWE e PDE Ci�ncia sem Fronteiras/CISB/SAAB', '1', 0, 1, 5, 1, 2, 1),
(114, '<br>Doutorado Pleno no Exterior', '2014-12-05', '00007', 'pt_BR', '2014/15', '2015-01-19', '1900-01-01', '1900-01-01', 'O Programa de Doutorado Pleno no Exterior tem por objetivo conceder bolsas de estudos a fim de complementar �s possibilidades ofertadas pelo conjunto dos programas de p�s-gradua��o no Brasil, de forma a buscar a forma��o de docentes e pesquisadores de alto n�vel.', 'Mensalidade e aux�lios', 'A bolsa destina-se a candidatos de elevado desempenho acad�mico, que se dirijam a institui��es estrangeiras de excel�ncia, para a realiza��o de doutorado pleno em universidades do exterior.', '0800 61 61 61, op��o 7', '', 'Diversas �reas do conhecimento', '', '', '', '', 'As inscri��es ser�o gratuitas e feitas exclusivamente pela internet, mediante o preenchimento do formul�rio de inscri��o dispon�vel.', '', 'A', '', '', 'http://www.capes.gov.br/bolsas/bolsas-no-exterior/doutorado', 0, 114, 'Observat�rio', 20141205, '', 'francine.zucco', 'Doutorado Pleno no Exterior - Capes', '', 0, 1, 7, 1, 0, 1),
(115, 'Programa Est�gio P�s-Doutoral PCTI 2014 ? Parques Tecnol�gicos', '2015-01-26', '00007', 'pt_BR', '2014', '2015-03-15', '1900-01-01', '1900-01-01', 'Oferecer oportunidade de forma��o p�s-doutoral no exterior, possibilitando maior visibilidade internacional aos ambientes de inova��o brasileiros, em especial os Parques Cient�ficos e Tecnol�gicos; ampliar o potencial de colabora��o conjunta entre gestores e pesquisadores que atuam no Brasil e no exterior nesta �rea de gest�o de ambientes de inova��o; ampliar o acesso de gestores de ambientes de inova��o a Parques Cient�ficos e Tecnol�gicos e outros ambientes de inova��o internacionais de excel�ncia e possibilitar o desenvolvimento dos ambientes de inova��o brasileiros com o posterior retorno do bolsista.', 'Bolsas e auxilios', 'O candidato dever� obrigatoriamente preencher os seguintes requisitos: ser brasileiro ou estrangeiro com visto permanente no Brasil; possuir o t�tulo de Doutor, reconhecido conforme legisla��o brasileira, e vincula��o com um Parque Cient�fico e Tecnol�gico ou �rea de Inova��o no Brasil, quando da inscri��o neste edital; propor projeto de estudos dentro das �reas tem�ticas contempladas no edital.', 'pcti@capes.gov.br', '', '�reas contempladas no Programa Ci�ncia sem Fronteiras.', '', '', '', '', 'O candidato dever� realizar inscri��o e  anexar a seguinte documenta��o ao formul�rio de inscri��es on-line: plano de estudos e/ou projeto de pesquisa, endere�o/link para acesso ao seu Curriculum Lattes, documento do pr�prio candidato, indicando uma ou mais �reas e temas de maior interesse, manifesta��o de aceite formal por parte da institui��o estrangeira e diploma de doutorado ou ata de defesa de tese, para defesas recentes.', '', 'A', '', '', 'http://capes.gov.br/cooperacao-internacional/multinacional/programa-estagio-pos-doutoral-pcti-2014-parques-tecnologicos', 0, 115, 'Observat�rio', 20141205, '', 'francine.zucco', '', '1', 0, 1, 7, 1, 2, 1),
(116, 'Ernst Mach Grant for studying at an Austrian University of Applied Sciences (Fachhochschule)', '2014-12-10', '00063', 'us_EN', '2015', '2015-01-10', '1900-01-01', '1900-01-01', 'OeAD-GmbH/ICM on behalf of and financed by the Federal Ministry of Science, Research and Economy (BMWFW) offers na opportunity to spend an exchange semester in the Austrian Alps at Vorarlberg University of Applied Sciences. Intensive support and mentoring, an open door policy and an interesting exchange between students and lecturers from all over the world support the personal development and the qualification of the participating students.', 'Monthly grant and travel cost subsidy', '1.Applicants must study  a master Programme or have successfully completed at least 4 semesters of studies within a bachelor/diploma Programme by the time of taking up the grant; <br>2.Maximum age: 35 years; <br>3.Proficiency in the language of instruction (German or English), particularly in the respective subject area, is a prerequisite; <br>4.Applicants must not have studied/pursued research/pursued academic work in Austria in the last six months before taking up the grant.', 'sts@fhv.at', '', 'Natural Sciences, Technical Sciences, Human Medicine, Health Sciences, Agricultural Sciences and Social Sciences', '', '', '', '', 'First, students who are interested in this grant need to get in contact with  Sabine sts@fhv.at as soon as possible, no later than January 10th,  2015. <br>Further, the online application must be done until March 1st, 2015 at http://www.scholarships.at', '', 'A', '', '', 'http://oead.grants.at/out/default.aspx?TemplateGroupID=34&PageMode=3&GrainEntryID=7277&HZGID=7806&LangID=2', 0, 116, 'Observat�rio', 20141210, '', 'francine.zucco', 'Ernst Mach Grant for studying at an Austrian University of Applied Sciences (Fachhochschule)', '', 0, 1, 63, 2, 0, 1),
(117, 'Society in Science ? The Branco Weiss Fellowship', '2014-12-10', '00064', 'us_EN', '2015', '2015-01-15', '1900-01-01', '1900-01-01', 'Society in Science ? The Branco Weiss Fellowship is a unique postdoc program. It awards young researchers around the world with a generous personal research grant, giving them the freedom to work on whatever topic they choose anywhere in the world, for up to five years.', 'CHF 100�000/year - For all legitimate cost of research (i.e. salary and/or equipment, travel cost, consumables, personnel etc)', 'You are eligible for the 2015 campaign if: <br>1. You officially hold a PhD on January 15, 2015; <br>2. Your project departs from the mainstream of research in your discipline; <br>3. You have a record of outstanding scientific achievement; <br>4. You demonstrate in the proposal a willingness to engage in a dialogue on relevant social, cultural, political or economic issues across the frontiers of your particular discipline.', 'society-in-science@ethz.ch', '', 'Ideally, unconventional projects in new areas of science, engineering and social sciences', '', '', '', '', '', '', 'A', '', '', 'http://www.society-in-science.org/', 0, 117, 'Observat�rio', 20141210, '', 'francine.zucco', '', '', 0, 1, 64, 2, 0, 1),
(118, 'Mobile Health: Technology and Outcomes in Low and Middle Income Countries ', '2014-12-11', '00058', 'us_EN', '2015', '2015-01-19', '1900-01-01', '1900-01-01', 'To encourage exploratory/developmental research applications that propose to study the development or adaptation of innovative mobile health (mHealth) technology specifically suited for low and middle income countries (LMICs) and the health-related outcomes associated with implementation of the technology. Of highest interest are well-designed multidisciplinary projects that focus on tools or interventions for chronic diseases or technology for disease agnostic/cross-cutting applications.', 'Up to $125,000 direct costs per year', 'International research network (at least one U.S. institution), multidisciplinary and cross-sector in nature. <br>Any individual(s) with the skills, knowledge, and resources necessary to carry out the proposed research as the Program Director(s)/Principal Investigator(s) (PD(s)/PI(s)) is invited to work with his/her organization to develop an application for support.', 'laura.povlich@nih.gov', '', 'Mobile communication technologies applied to health issues', '', '', '', '', 'Although a letter of intent is not required, it is recommended to submit the letter by Jan 19, and the deadline to apply is Feb 19.', '', 'A', '', '', 'http://grants.nih.gov/grants/guide/pa-files/PAR-14-028.html', 0, 118, 'Observat�rio', 20141211, '', 'francine.zucco', '', '', 0, 1, 58, 2, 0, 1),
(119, 'International Research Ethics Education and Curriculum Development Award ', '2015-01-26', '00058', 'us_EN', '2015', '2015-04-22', '1900-01-01', '1900-01-01', 'Strengthen research ethics capacity in low- and middle-income countries (LMICs) through increasing the number of scientists, health professionals and relevant academics from these countries with in-depth knowledge of the ethical principles, processes and policies related to international clinical and public health research as well as the critical skills to develop research ethics education, ethical review leadership and expert consultation to researchers, their institutions, governments and international research organizations.', 'Up to $230,000 direct costs per year', 'Any individual(s) with the skills, knowledge, and resources necessary to carry out the proposed research as the Program Director(s)/Principal Investigator(s) (PD(s)/PI(s)) is invited to work with his/her organization to develop an application for support.', 'sinab@mail.nih.gov', '', 'Bioethics', '', '', '', '', 'Although a letter of intent is not required, it is recommended to submit the letter by April 22, and the deadline to apply is May 22.', '', 'A', '', '', 'http://grants.nih.gov/grants/guide/pa-files/PAR-13-027.html', 0, 119, 'Observat�rio', 20141211, '', 'francine.zucco', '', '2', 0, 1, 58, 2, 3, 1);
INSERT INTO `fomento_edital` (`id_ed`, `ed_titulo`, `ed_dt_create`, `ed_agencia`, `ed_idioma`, `ed_chamada`, `ed_dt_deadline_elet`, `ed_dt_deadline_envio`, `ed_dt_previsao_divulg_res`, `ed_texto_1`, `ed_texto_2`, `ed_texto_3`, `ed_texto_4`, `ed_texto_5`, `ed_texto_6`, `ed_texto_7`, `ed_texto_8`, `ed_texto_9`, `ed_texto_10`, `ed_texto_11`, `ed_texto_12`, `ed_status`, `ed_autor`, `ed_corpo`, `ed_url_externa`, `ed_total_visualizacoes`, `ed_codigo`, `ed_local`, `ed_data_envio`, `ed_document_require`, `ed_login`, `ed_titulo_email`, `ed_edital_tipo`, `ed_fluxo_continuo`, `fdis_id`, `fag_id`, `i_id`, `ftp_id`, `fs_id`) VALUES
(120, 'Programa Geral de Coopera��o Internacional', '2015-01-26', '00007', 'pt_BR', '026/2008', '1910-01-01', '1900-01-01', '1900-01-01', 'Apoiar projetos conjuntos de pesquisa e parcerias universit�rias entre Institui��es de Ensino Superior do Brasil e de pa�ses que promovam a forma��o em n�vel de p�s-gradua��o (doutorado sandu�che e p�s-doutorado), situadas em pa�ses com os quais o Brasil possui acordos internacionais, mas a Capes n�o possui acordo espec�fico, e o aperfei�oamento de docentes e pesquisadores.', 'Miss�es de trabalho e de estudo; custeio; semin�rios e workshops; bolsas de estudo em n�vel de doutorado-sandu�che e p�s-doutorado.', '1. A proposta dever� estar vinculada a um ou mais programas de p�s-gradua��o avaliados pela CAPES, preferencialmente, com conceitos 5, 6 ou 7; <br>2. A coordena��o do projeto estar� a cargo de docente com t�tulo de doutor h� pelo menos 5 anos; <br>3. A equipe do Brasil dever� ser composta de pelo menos dois doutores, al�m do Coordenador; <br>4. A proposta dever� ter car�ter inovador, considerando inclusive o desenvolvimento da �rea no contexto nacional e internacional, e explicitando as vantagens da parceria.', 'cgci@capes.gov.br', '', 'Diversas �reas do conhecimento', '', '', '', '', 'Fluxo cont�nuo: As inscri��es ser�o gratuitas e feitas exclusivamente on-line, mediante o preenchimento do formul�rio de inscri��o, dispon�vel no endere�o: http://www.capes.gov.br/cooperacaointernacional/multinacional', '', 'B', '', '', 'http://www.capes.gov.br/cooperacao-internacional/multinacional/programa-geral-de-cooperacao-internacional', 0, 120, 'Observat�rio', 20141212, '', 'francine.zucco', '', '3', 0, 1, 7, 1, 4, 2),
(121, 'C�tedra Capes/Universidade de Brown - 71/2014', '2015-01-26', '00007', 'pt_BR', '71/2014', '2015-02-02', '1900-01-01', '1900-01-01', 'Aprofundar a coopera��o acad�mica entre institui��es de ensino superior e centros de ci�ncia e tecnologia brasileiros e americanos, a fim de promover o desenvolvimento da ci�ncia e tecnologia em ambos os pa�ses, e aprofundar a coopera��o entre pesquisadores e educadores de institui��es de pesquisa e ensino superior no Brasil e seus pares da Universidade de Brown e aumentar o conhecimento na Universidade de Brown sobre as contribui��es de not�veis pesquisadores e educadores do Brasil, por meio da concess�o de bolsa a not�vel pesquisador e professor s�nior do Brasil, especialista em qualquer disciplina ou �rea acad�mica.', 'Bolsa mensal, aux�lio deslocamento, acomoda��o e seguro sa�de.', '1. Possuir t�tulo de doutor; <br>2. Estar credenciado como docente e orientador em programa de p�s-gradua��o reconhecido pela CAPES; <br>3. Dedicar-se em regime integral �s atividades acad�micas; <br>4. Ter flu�ncia em ingl�s.', 'brown@capes.gov.br', '', 'Diversas �reas do conhecimento', '', '', '', '', 'O candidato deve submeter sua candidatura exclusivamente via internet dispon�vel em: http://www.capes.gov.br/cooperacao-internacional/catedras/catedra-capesuniversidade-de-brown', '', 'A', '', '', 'http://www.capes.gov.br/cooperacao-internacional/catedras/catedra-capes-universidade-de-brown', 0, 121, 'Observat�rio', 20141215, '', 'francine.zucco', 'Oportunidade de C�tedra na Universidade de Brown - Capes', '1', 0, 1, 7, 1, 2, 1),
(122, 'C�tedra Instituto de Educa��o da Universidade de Londres - An�sio Teixeira', '2015-01-26', '00007', 'pt_BR', '70/2014', '2015-02-27', '1900-01-01', '1900-01-01', 'O Programa tem como objetivo espec�fico enviar pesquisadores, intelectuais e formuladores de pol�ticas p�blicas ao Instituto de Educa��o da Universidade de Londres, proporcionando ambiente prop�cio para permitir o desenvolvimento do estudo acad�mico na �rea de educa��o, com prioridade para a �rea de tecnologia aplicada � educa��o.', 'Estip�ndio mensal e aux�lios.', '1. Possuir t�tulo de doutor; <br>2. Estar credenciado como docente e orientador em programa de p�s-gradua��o reconhecido pela CAPES; <br>3. Dedicar-se em regime integral �s atividades acad�micas; <br>4. Ter flu�ncia em ingl�s', 'anisioteixeira@capes.gov.br', '', 'Educa��o e �reas relacionadas', '', '', '', '', 'Os candidatos dever�o se inscrever exclusivamente via internet, preenchendo formul�rio de inscri��o online, em portugu�s, dispon�vel no link de inscri��es na p�gina do programa e incluindo pelo mesmo formul�rio os documentos especificados no edital.', '', 'A', '', '', 'http://www.capes.gov.br/cooperacao-internacional/catedras/catedra-anisio-teixeira', 0, 122, 'Observat�rio', 20141215, '', 'francine.zucco', 'Oportunidade de C�tedra na Universidade de Londres na �rea de Educa��o - Capes', '1', 0, 1, 7, 1, 2, 1),
(123, 'Programa Capes/National Science Foundation (NSF)-Biodiversidade - 72/2014', '2014-12-15', '00007', 'pt_BR', '72/2014', '2015-01-10', '1900-01-01', '1900-01-01', 'O objetivo do Programa Capes/NSF-Biodiversidade � aprofundar a coopera��o acad�mica entre as institui��es de ensino superior do Pa�s e a ag�ncia governamental norte-americana NSF, no �mbito do programa "Dimens�es da Biodiversidade" para Pesquisa e Infraestrutura Associada. A iniciativa promove novas abordagens integradas para identificar e compreender o significado evolutivo e ecol�gico da biodiversidade em meio ao ambiente de mudan�as. Esta chamada de projetos visa caracterizar a biodiversidade na Terra, usando abordagens inovadoras de integra��o, para preencher as lacunas mais importantes em nossa compreens�o da diversidade da vida na Terra.', 'Miss�es de trabalho e de inicia��o cient�fica, recursos de custeio.', 'As institui��es brasileiras devem estar cadastradas junto � NSF para apresentarem seus projetos. Para cada proposta brasileira submetida � CAPES, dever� existir proposta equivalente submetida previamente � NSF pela parte americana. <br>A proposta deve comprovar a vincula��o do coordenador da proposta a Programa de P�s-Gradua��o reconhecido pela CAPES.', 'nsf@capes.gov.br', '', 'Biodiversidade', '', '', '', '', 'A inscri��o da equipe brasileira ser� gratuita e admitida exclusivamente pela internet, mediante o preenchimento do formul�rio de inscri��o e o envio de documentos eletr�nicos. A equipe americana dever� enviar a proposta para a NSF.', '', 'A', '', '', 'http://capes.gov.br/cooperacao-internacional/estados-unidos/capes-national-science-foundation-nsf', 0, 123, 'Observat�rio', 20141215, '', 'francine.zucco', '', '', 0, 1, 7, 1, 0, 1),
(124, 'Inova Talentos - Programa RHAE Trainee CNPq/IEL', '2015-01-26', '00065', 'pt_BR', '2015', '2015-02-28', '1900-01-01', '1900-01-01', 'O programa INOVA Talentos � uma parceria do IEL com o CNPq, que est� abrindo as portas de in�meras empresas para estudantes e rec�m-formados que buscam a oportunidade de mostrar o seu conhecimento para inovar. O objetivo � ampliar o quadro de profissionais em atividades de inova��o no setor brasileiro.', 'Bolsas de desenvolvimento tecnol�gico e extens�o inovadora', 'Estudantes a partir do pen�ltimo ano de gradua��o, graduados e mestres com at� 5 (cinco) anos de conclus�o da gradua��o, de todas as �reas de conhecimento. <br>Ser�o aceitas propostas de projetos de PD&I que visem o aumento da competitividade das empresas, por meio de inova��o de produtos e processos, organizacional, em marketing e modelo de neg�cios.', '', '', 'Diversas �reas do conhecimento', '', '', '', '', 'Os candidatos interessados em concorrer �s oportunidades das empresas dever�o cadastrar seu curr�culo e candidatar-se �s vagas no site Inova Talentos.', '', 'A', '', '', 'http://www.ielpr.org.br/inovatalentos', 0, 124, 'Observat�rio', 20141216, '', 'francine.zucco', '', '1', 0, 1, 65, 1, 2, 1),
(125, 'Eiffel Excellence Scholarship Programme', '2015-01-26', '00066', 'us_EN', '2015', '2015-01-09', '1900-01-01', '1900-01-01', 'The Eiffel Excellence Scholarship Programme was established by the French Ministry of Foreign Affairs and International Development to enable French higher education establishments to attract top foreign students to enrol in their master?s and PhD courses. It helps to shape the future foreign decision-makers of the private and public sectors, in priority areas of study, and encourages applications from emerging countries at master?s level, and from emerging and industrialized countries at PhD level.', 'Two branches: 1. Master?s branch, which funds master?s courses lasting between 12 and 36 months; <br>2. PhD branch, which offers funding for PhD students to spend ten months in France, through joint supervision or dual enrollment (preferably in the second year of their PhD).', 'Age: for master?s courses, candidates must be no older than 30 on the date of the selection committee meeting, i.e. born after 11/03/1984; at PhD level, candidates must be no older than 35 on the date of the selection committee meeting, i.e. born after 11/03/1979.  <br>Language skills should meet the requirements of the relevant course of study.', 'candidatures.eiffel@campusfrance.org', '', 'Engineering science at master?s level, science in the broadest sense at PhD level; economics and management; law and political sciences.', '', '', '', '', 'Only the French higher education institutions may submit candidature files. It applies to students with previous cooperation/contact with French universities.', '', 'A', '', '', 'http://www.campusfrance.org/en/eiffel', 0, 125, 'Observat�rio', 20141216, '', 'francine.zucco', 'Oportunidade de bolsas mestrado e doutorado na Fran�a', '1', 0, 1, 66, 2, 2, 1),
(126, 'CUD ARES Scholarships in Belgium for Developing Countries', '2015-01-26', '00067', 'us_EN', '2015', '2015-02-11', '1900-01-01', '1900-01-01', 'International Courses and Training Programmes are part of the global study programmes of the Higher Education Institutions. They are open to all students who satisfy the conditions of qualification, but aim at proposing training units that distinguish themselves by their openness towards specific development issues.', 'Scholarships - masters and training programmes', '1. At the beginning of the programme, candidates must be less than 40 years old for courses, and less than 45 years old for training programmes; <br>2. Candidates must be holders of a degree that is comparable to a Belgian University graduate degree (?licence?); <br>3. Candidates must have a good knowledge of written and spoken French; <br>4. Candidates must show professional experience of at least two years upon termination of their studies; <br>5. Candidates are not allowed to apply for more than one programme. <br>Each Master?s and Training Program has its own eligibility requirements. Please see the complete description of each program.', '', '', 'Diversas �reas do conhecimento - http://www.cud.be/content/view/334/203/lang,/', '', '', '', '', 'The application form can be downloaded from the official website and it should be carefully completed and sent only by POST MAIL or EXPRESS MAIL, to ARES-CCD.', '', 'A', '', '', 'http://www.cud.be/content/view/339/208/lang,/', 0, 126, 'Observat�rio', 20141216, '', 'francine.zucco', '', '1', 0, 1, 67, 2, 2, 1),
(127, 'EU-BRAZIL RESEARCH AND DEVELOPMENT COOPERATION IN ADVANCED CYBER INFRASTRUCTURE', '2015-03-03', '00062', 'us_EN', 'EUB-2015', '2015-04-21', '2015-04-21', '1900-01-01', 'Specific Topics:\r\n1)EUB-1-2015: Cloud Computing, including security aspects:\r\nSpecific Challenge: Data are motivating a profound transformation in the culture and conduct of scientific research in every field of science and engineering. Advancements in this area are required in terms of cloud-centric applications for big data,.......2)EUB-2-2015: High Performance Computing (HPC):\r\nSpecific Challenge: The work aims at the development of state-of-the-art High Performance Computing (HPC) environment that efficiently exploits the HPC resources in both the EU and Brazil and advances the work on HPC applications in domains of common......3)EUB-3-2015: Experimental Platforms:\r\nSpecific Challenge: The objective of cooperation in the area of Experimental Platforms is to enable and promote the federation of experimental resources irrespective of their localization in Brazil and in Europe, with a view towards global experimentation.', 'Total Call Budget	?7,000,000', 'Additional eligibility criterion:\r\n*Proposals submitted to this call which do not includecoordination with a Brazilian\r\nproposalwill be considered ineligible.\r\n\r\n*The proposed project duration shall not exceed 36 months\r\n\r\n*At least three legal entities. Each of the three shall be established in a different Member State or associated country. All three legal entities shall be independent of each other.', 'http://ec.europa.eu/research/participants/api//contact/index.html', '', 'Information and communication technologies.', '', '', '', '', '', '', '!', '', '', '', 0, 127, 'Observat�rio', 0, '', 'jeferson.vieira', 'EU-BRAZIL RESEARCH AND DEVELOPMENT COOPERATION IN ADVANCED CYBER INFRASTRUCTURE', '3', 0, 1, 62, 2, 4, 4),
(128, 'Programa de Licenciaturas Internacionais - 74/2014', '2015-01-26', '00007', 'pt_BR', '74/2014', '2015-03-15', '1900-01-01', '1900-01-01', 'Sele��o de projetos de gradua��o sandu�che para estudantes de cursos de licenciaturas das �reas de Biologia, F�sica, Matem�tica, Qu�mica e Portugu�s no �mbito do Programa de Licenciaturas Internacionais PLI ? Portugal, com vistas a valorizar e estimular a forma��o de professores de educa��o b�sica no Brasil.', '1. Bolsas e aux�lios para estudantes brasileiros nos termos vigentes da Capes; <br>2. Passagens a�reas internacionais e di�rias internacionais para docentes brasileiros em miss�o a Portugal.', 'Cada proposta dever� apresentar apenas uma universidade portuguesa como destino e poder� apresentar projeto conjunto com at� 2 outras institui��es brasileiras. <br>Os projetos ser�o coordenados por um docente doutor vinculado ao curso de licenciatura da institui��o proponente. <br>O coordenador deve estar em efetivo exerc�cio no magist�rio da educa��o superior durante todo o per�odo de vig�ncia do projeto e possuir t�tulo de doutor h�, no m�nimo, 3 anos. <br>A equipe brasileira dever� ser composta de pelo menos 2 (dois) doutores, al�m do coordenador, e estes devem estar vinculados � mesma institui��o do coordenador do projeto.', 'pli@capes.gov.br', '', 'Biologia, F�sica, Matem�tica, Qu�mica e Portugu�s', '', '', '', '', 'Potenciais coordenadores devem manifestar seu interesse pelo e-mail pdi@pucpr.br para articula��o institucional. <br>As inscri��es da equipe brasileira ser�o gratuitas e feitas exclusivamente pela internet, mediante o preenchimento do formul�rio de inscri��o dispon�vel no endere�o http://inscricoes-cgci.capes.gov.br/index.php/roteiroprojeto/init/CodigoProjeto/1150', '', 'A', '', '', 'http://www.capes.gov.br/cooperacao-internacional/multinacional/licenciaturas-internacionais/licenciaturas-internacionais-portugal', 0, 128, 'Observat�rio', 20141222, '', 'francine.zucco', '', '1', 0, 1, 7, 1, 2, 1),
(129, '<br>Nestl� Creating Shared Value Prize', '2015-01-26', '00068', 'us_EN', '2016', '2015-02-28', '1900-01-01', '1900-01-01', 'The Nestl� Creating Shared Value Prize (?Nestl� Prize?) is designed to recognise the development of an outstanding innovation or programme in the areas of Water, Nutrition or Rural Development that: <br>1. Has proven its worth on a pilot or small-scale basis; <br>2. Is judged to be feasible on a broad-scale basis or replicable in other settings or communitites; <br>3. Has high promise of having a social impact, through either improving access to nutrition, improving rural development, or having a significant impact on water management or access to clean water; <br>4. Is built on a sound and viable business model.', 'Up to CHF 500,000 to one/maximum of three winners.', 'Applicants to the Nestl� CSV Prize can either self-nominate or be nominated by others who are familiar with their work. In either case, the nomination process is the same.', 'CSVPrize@nestle.com', '', 'Nutrition, water, or rural development', '', '', '', '', 'Entries must be submitted in writing during the Nomination Period through the Nomination Form which is available on the Nestl� corporate website (www.nestle.com)', '', 'A', '', '', 'http://www.nestle.com/csv/what-is-csv/nestleprize/about-csv-prize', 0, 129, 'Observat�rio', 20141222, '', 'francine.zucco', 'Pr�mio internacional: Nestl� Creating Shared Value Prize', '4', 0, 1, 68, 2, 5, 1),
(130, '<br>ENS International Selection Scholarships', '2015-01-26', '00069', 'us_EN', '2015/16', '2015-02-10', '1900-01-01', '1900-01-01', 'Each year, �cole Normale Sup�rieure (ENS) organizes an international selection allowing the most promising international students, either in Science or in Humanities, to follow a two or three-year Masters Degree at the University.', 'A monthly stipend of  1,000 Euros', '1. Candidates must be aged no more than 24 on the date of registration; <br>2. Candidates must declare that they have not lived in France more than 5 months during the academic year of the selection nor the previous year; <br>3.  Candidates must show proof of a diploma or certification awarded by a foreign university,which indicates that the candidate has completed at least one year of undergraduate studies.', 'ens-international@ens.fr', '', 'Selected Masters Courses in Science or Humanities ', '', '', '', '', 'Online applications are open until 10 February 2015. Candidates whose applications are selected may be asked to go to Paris for written and oral examinations in July/2015.', '', 'A', '', '', 'http://www.ens.fr/admission/selection-internationale/?lang=en', 0, 130, 'Observat�rio', 20141223, '', 'francine.zucco', 'Oportunidade de Mestrado na �cole Normale Sup�rieure (ENS)', '1', 0, 1, 69, 2, 2, 1),
(131, 'Powering Agriculture: An Energy Grand Challenge for Development (PAEGC) - Second Global Innovation Call', '2015-01-26', '00070', 'us_EN', '2015', '2015-02-12', '1900-01-01', '1900-01-01', 'The objective of PAEGC is to support new and sustainable approaches to accelerate the development and deployment of Clean Energy Solutions (CES) 5 for increasing agriculture productivity and/or value in developing countries.', 'Funding Window 1 ? Clean Energy Solution Design: up to $500,000 USD; <br>Funding Window 2 ? Clean Energy Solutions Scale-up/Commercial Growth: up to $2,000,000 USD', 'Demonstrate cost-sharing either through direct funding, beneficiary contributions, in-kind assistance, or a combination thereof.', '', '', 'Clean Energy Solution/Agriculture', '', '', '', '', 'All Concept Notes and Full Proposals (if requested) and supporting documentation from Applicants will be submitted through the PAEGC Online Application Platform (OAP) found at: http://poweringag.org/call-innovations', '', 'A', '', '', 'http://www.grants.gov/web/grants/search-grants.html?keywords=AID-SOL-OAA-00005', 0, 131, 'Observat�rio', 20150115, '', 'francine.zucco', 'Oportunidade de recursos do USAID em energias limpas', '2', 0, 1, 70, 2, 3, 1),
(132, '<br>CP IPEA/PNPD N� 001/2015', '2015-01-26', '00071', 'pt_BR', '001/2015', '2015-02-04', '1900-01-01', '1900-01-01', 'Selecionar interessados, para concess�o de bolsa pesquisa, que atendam aos requisitos dispostos na chamada para realizar pesquisa no Projeto ?Condicionantes institucionais ao investimento em infraestrutura?.', 'Auxiliar de Pesquisa: R$ 700,00; <br>Doutor II (n�o presencial): R$ 4.500,00', '1. Auxiliar de Pesquisa (Graduando): estar regularmente matriculado na gradua��o no curso de Direito; ter cursado as disciplinas de Direito da Propriedade ou Direito das Coisas; ter disponibilidade para execu��o de atividade inerentes ao projeto de pesquisa, nas instala��es do IPEA/Bras�lia. <br>2. Doutor II: possuir titulo de doutor em Direito; ter experi�ncia na �rea do Direito da Propriedade ou Direito das Coisas.', 'pnpd@ipea.gov.br', '', 'Direito', '', '', '', '', 'A solicita��o deve ser apresentada, pelo candidato, mediante o cadastramento de seus dados no Sistema de Cadastro de Bolsista, dispon�vel na p�gina do IPEA www.ipea.gov.br', '', '!', '', '', 'http://www.ipea.gov.br/portal/index.php?option=com_content&view=article&id=24284&catid=117&Itemid=5', 0, 132, 'Observat�rio', 20150115, '', 'francine.zucco', 'Oportunidade de bolsas IPEA em Direito', '1', 0, 1, 71, 1, 2, 4),
(133, 'Programa Est�gio P�s-Doutoral Bayer 2015 - 01/2015', '2015-02-09', '00007', 'pt_BR', '01/2015', '2015-02-20', '1900-01-01', '1900-01-01', 'Oferecer oportunidade de forma��o p�s-doutoral no exterior e maior visibilidade internacional � produ��o cient�fica e tecnol�gica brasileira; ampliar o potencial de colabora��o conjunta entre pesquisadores que atuam no Brasil e no exterior; ampliar o acesso de pesquisadores brasileiros a centros internacionais de excel�ncia e possibilitar o desenvolvimento de centros de ensino e pesquisa brasileiros com o posterior retorno do bolsista.', 'Bolsa (US$ 2.100,00 ou ? 2.100,00), seguro sa�de e aux�lios.', 'O candidato deve ser brasileiro ou estrangeiro com visto permanente no Brasil; possuir o t�tulo de Doutor quando da inscri��o neste Edital e propor projeto de estudos dentro das �reas tem�ticas.', '', '', 'Pesquisa e Desenvolvimento Agron�mico e de F�rmacos', '', '', '', '', 'O candidato dever� preencher o formul�rio de inscri��o dispon�vel na p�gina da CAPES.', '', 'A', '', '', 'http://capes.gov.br/bolsas/bolsas-no-exterior/pesquisa-pos-doutoral-no-exterior/programa-estagio-pos-doutoral-bayer', 0, 133, 'Observat�rio', 20150209, '', 'francine.zucco', '�ltimas semanas: Programa Est�gio P�s-Doutoral Bayer 2015 - 01/2015', '1', 0, 1, 7, 1, 2, 1),
(134, 'Programa Geral de Coopera��o Internacional (PGCI) 2015', '2015-01-26', '00007', 'pt_BR', '2015', '2015-04-30', '1900-01-01', '1900-01-01', 'Apoiar projetos conjuntos de pesquisa e parcerias universit�rias entre Institui��es de Ensino Superior do Brasil e de pa�ses que promovam a forma��o em n�vel de p�s-gradua��o (doutorado sandu�che e p�s-doutorado), situadas em pa�ses com os quais o Brasil possui acordos internacionais, mas a Capes n�o possui acordo espec�fico, e o aperfei�oamento de docentes e pesquisadores.', 'Miss�es de trabalho e de estudo; custeio; semin�rios e workshops; bolsas de estudo em n�vel de doutorado-sandu�che e p�s-doutorado.', '1. A coordena��o do projeto estar� a cargo de docente com t�tulo de doutor e vinculado a um PPG recomendado pela Capes; <br>2. A equipe do Brasil dever� ser composta de pelo menos dois doutores, al�m do Coordenador e com comprovada capacidade t�cnico-cient�fica para o desenvolvimento do\r\nprojeto; <br>3. A proposta dever� ter car�ter inovador, considerando inclusive o desenvolvimento da �rea no contexto nacional e internacional, e explicitando as vantagens da parceria.', 'cgci@capes.gov.br', '', 'Diversas �reas do conhecimento', '', '', '', '', '1� cronograma de inscri��es at� 30/04. As inscri��es ser�o gratuitas e feitas exclusivamente on-line, mediante o preenchimento do formul�rio de inscri��o.', '', 'A', '', '', 'http://www.capes.gov.br/cooperacao-internacional/multinacional/programa-geral-de-cooperacao-internacional', 0, 134, 'Observat�rio', 20150120, '', 'francine.zucco', '', '3', 0, 1, 7, 1, 4, 1),
(135, '<br>TFI Institutional Grants', '2015-01-26', '00072', 'us_EN', '2015', '2015-03-01', '1900-01-01', '1900-01-01', 'The Foundation?s Institutional Grants program has as its goal the creation of effective policy changes to improve the lives of Latin Americans.', '', '1. The project/program for which funding is sought must be geographically focused on Latin America. <br>2. The Foundation encourages collaboration among organizations in the United States and Latin America and prefers to fund those institutions that are actively engaged with external stakeholders in addressing an issue of concern.', 'tinker@tinker.org', '', '1. Democratic Governance; <br>2. Education; <br>3. Sustainable Resource Management; <br>4. U.S. Policy toward Latin America; <br>5. Antarctica Science and Policy.', '', '', '', '', 'Potential applicants are encouraged to submit a brief letter of inquiry before the deadline (01/03 for full project).', '', 'A', '', '', 'http://www.tinker.org/content/institutional-grants-overview', 0, 135, 'Observat�rio', 20150120, '', 'francine.zucco', 'Tinker Foundation Incorporated (TFI) Institutional Grants', '2', 0, 1, 72, 2, 3, 1),
(136, 'GrOW Call for proposals: Effects of patterns of growth on women?s economic empowerment', '2015-01-26', '00073', 'us_EN', '2015', '2015-02-23', '1900-01-01', '1900-01-01', 'This call aims to investigate the effect that specific patterns of growth have on women?s economic empowerment. Research also aims to determine which public policies and interventions can ensure that the positive effects of growth on women?s empowerment are enhanced and the negative effects minimized.', 'Up to CA$300,000.', '1. Research focused on a single country or economic context will not be accepted; <br>2. Research consortia comprised of multiple institutional partners may apply; however, one partner must be designated as the lead institution; <br>3. Preference will be given to applications that propose a set of projects covering a wide spectrum of the broader research questions described in the call document and that analyze policies that can enhance positive impacts of growth patterns on women?s economic empowerment.', 'grow@idrc.ca', '', 'Growth and Economic Opportunities for Women (GrOW) program on the effect of specific patterns of growth on women?s economic empowerment.', '', '', '', '', 'This call is the first step of two stages in the selection process for the funding of a proposal. To apply, complete and submit the online application.', '', 'A', '', '', 'http://www.idrc.ca/EN/Funding/Competitions/Pages/CompetitionDetails.aspx?CompetitionID=87', 0, 136, 'Observat�rio', 20150119, '', 'francine.zucco', '', '2', 0, 1, 73, 2, 3, 1),
(137, 'The William & Flora Hewlett Foundation - Energy and Climate Grants', '2015-01-26', '00074', 'us_EN', '2015', '1900-01-01', '1900-01-01', '1900-01-01', 'The goal is to To ensure that energy is produced and used cleanly and efficiently, with limited impacts on human health and the environment, and that global average temperatures increase less than 2�C to avoid the worst effects of climate change.', '', '', '', '', 'Clean power, Clean transportation and Building broad support', '', '', '', '', 'Completing the Letter of Inquiry Application is the first step in requesting funding from the Foundation. Letters of Inquiry are accepted at any time.', '', '!', '', '', 'http://www.hewlett.org/programs/environment/energy-and-climate', 0, 137, 'Observat�rio', 20150130, '', 'francine.zucco', '', '2', 0, 1, 74, 2, 3, 4),
(138, '<br>Research Project Grants', '2015-01-27', '00075', 'us_EN', '2015', '1900-01-01', '1900-01-01', '1900-01-01', 'The aim of these awards is to provide financial support for innovative and original research projects of high quality and potential, the choice of theme and the design of the research lying entirely with the applicant (the Principal Investigator). The grants provide support for the salaries of research staff engaged on the project, plus associated costs directly related to the research proposed, and the award is paid directly to the institution at which the applicant is employed.', 'Offering up to �500,000 over five years for research on a topic of the applicant?s choice. Grants cover salary and research costs directly associated with the project.', 'Eligible applicants will already be employed by the eligible institution or be an academic who has maintained close links with that institution following retirement. <br>The Trust does not fund: <br>1. Research which is of direct relevance to clinicians, medical professionals and/or the pharmaceutical industry; <br>2. Policy-driven research where the principal objective is to assemble an evidence base for immediate policy initiatives; <br>3. Research of which advocacy forms an explicit component; <br>4. Research which is aimed principally at an immediate commercial application; <br>5. Applications in which the main focus is on capacity building, networking, or the development of the skills of those involved.', 'mdillnutt@leverhulme.ac.uk', '', '', '', '', '', '', 'There are no deadlines for Outline Applications (first step), and their assessment is normally completed within three months.', '', 'A', '', '', 'http://www.leverhulme.ac.uk/funding/RPG/RPG.cfm', 0, 138, 'Observat�rio', 20150127, '', 'francine.zucco', 'The Leverhulme Trust - Research Project Grants', '2', 0, 1, 75, 2, 3, 1),
(139, '<br>Leibniz ? DAAD Research Fellowships 2015', '2015-01-26', '00076', 'us_EN', '2015', '1900-01-01', '2015-03-16', '1900-01-01', 'The Leibniz ? DAAD Research Fellowship programme is jointly carried out by the Leibniz Association (Wissenschaftsgemeinschaft Gottfried Wilhelm Leibniz e.V.) and the German Academic Exchange Service (DAAD). Leibniz-DAAD fellowships offer highly-qualified, international postdoctoral researchers, who have recently completed their doctoral studies, the opportunity to conduct research at a Leibniz Institute of their choice in Germany.', 'Fellowship (?2,000 per month), 2-months German course.', 'Applicants must neither hold German nationality nor have resided in Germany for more than six months; should be able to prove their outstanding academic or research achievements and must have completed their studies with a PhD or equivalent qualification (no more than two years should have passed since graduation) and have excellent knowledge of English.', 'behrsing@daad.de', '', 'Section A. Humanities and Educational Research; <br>Section B. Economics, Social Sciences and Spatial Research; <br>Section C. Life Sciences; <br>Section D. Mathematics, Natural Sciences and Engineering; <br>Section E. Environmental Sciences.', '', '', '', '', 'The complete application must be sent to the DAAD head office in Bonn/Germany.', '', 'A', '', '', 'https://www.daad.org/leibnizdaad', 0, 139, 'Observat�rio', 20150119, '', 'francine.zucco', '', '1', 0, 1, 76, 2, 2, 1),
(140, 'Masdar Institute Scholarships - <br>Msc. and Ph.D.', '2015-01-26', '00077', 'us_EN', '2015', '2015-05-31', '1900-01-01', '1900-01-01', 'There are five categories of scholarships available to applicants of Masdar Institute ? the Masdar Institute Scholarship, BP Innovation Scholarship, IRENA Scholarship, Toyota Scholarship and ICT Fund Scholarship. <br>Masdar Institute of Science and Technology is the world?s first graduate-level university dedicated to providing real-world solutions to issues of sustainability, and was created in collaboration with MIT.', 'Monthly stipend, housing, annual return ticket, a laptop.', '1. Relevant (undergrad and/or Master�s) degree in the field; <br>2. Minimum GRE Quantitative score of 155; <br>3. Minimum TOEFL score of 91 or 6.5 at IELTS.', 'info@masdar.ac.ae', '', 'Science, Engineering and Information Technology', '', '', '', '', 'Applicants are required to fill in the online application form and submit the required documents.', '', 'A', '', '', 'https://www.masdar.ac.ae/admissions/scholarships', 0, 140, 'Observat�rio', 20150121, '', 'francine.zucco', 'Oportunidade de bolsas de mestrado e doutorado no Masdar Institute/Abu Dhabi', '1', 0, 1, 77, 2, 2, 1),
(141, '<br>Erasmus Mundus iBrasil', '2015-01-26', '00078', 'pt_BR', '2015', '2015-02-08', '2015-02-06', '1900-01-01', 'O Projeto IBRASIL � um cons�rcio Erasmus Mundus A��o 2 financiado pela Comiss�o Europeia, coordenado pela Universit� de Lille3 (Fran�a) e co-coordenado pela UNESP - Universidade Estadual Paulista (Brasil). Ser�o concedidas bolsas a brasileiros para mobilidade de cr�ditos e de forma��o nas Institui��es de Educa��o Superior Europeias membros da rede IBRASIL.  ', 'Bolsas para gradua��o, doutorado integral e sandu�che, p�s-doc e professor/colaborador visitante. O aux�lio  inclui as despesas de deslocamento, seguro e mensalidade.', 'Verificar eligibilidade para cada tipo de bolsa no <A HREF=http://www.pucpr.br/intercambio/noticia.php?ref=12751&id=2015-01-13_55563> edital da PUCPR</A>', '', '', 'Engenharia, Tecnologia e Educa��o e Treinamento de Professores.', '', '', '', '', 'A ficha de inscri��o deve ser entregue no N�cleo de Interc�mbio (t�rreo do pr�dio administrativo da PUC) at� o dia 06/02/2015. As inscri��es online devem ser feitas at� 08/02/2015 no site  http://ibrasilmundus.eu', 'Gradua��o: intercambio@pucpr.br; <br>P�s-Gradua��o: leonardo.peroni@pucpr.br', '!', '', '', 'http://www.pucpr.br/intercambio/noticia.php?ref=12751&id=2015-01-13_55563', 0, 141, 'Observat�rio', 20150116, '', 'francine.zucco', 'Inscri��es prorrogadas para o Erasmus Mundus iBrasil - 06/02', '1', 0, 1, 78, 1, 2, 4),
(142, '<br>Brazil Visiting Fellows Scheme 2014/15', '2015-01-26', '00079', 'us_EN', '2014/15', '2015-02-13', '1900-01-01', '1900-01-01', 'The Scheme will provide early career university lecturers or post-doctoral researchers currently working at recognized universities in Brazil the opportunity to spend three months at the University of Birmingham carrying out identified research projects. <br>The aim is to support the professional development of early career researchers at Brazilian universities; enable visiting fellows to obtain insight into the organisation and conduct of research, training and administration at Birmingham University; promote research collaboration between leading groups in Birmingham and Brazil through projects undertaken initially in the UK and to support partnership development and collaboration between the University of Birmingham and institutions in Brazil.', 'Travel expenses of up to �850 and a monthly stipend of �1200 for three months to help cover living expenses and accommodation.', '', 'm.flemingfroy@bham.ac.uk', '', 'Any subject area', '', '', '', '', 'Once completed the application form available at the web site, send it to Dr. Marion Fleming-Froy, Brazil Visiting Fellowship Scheme, International Relations, University of Birmingham, B15 2TT, UK. E-mail: m.flemingfroy@bham.ac.uk', '', 'A', '', '', 'http://www.birmingham.ac.uk/International/global-engagement/brazil/dvfs.aspx', 0, 142, 'Observat�rio', 20150116, '', 'francine.zucco', 'University of Birmingham/Brazil Visiting Fellows Scheme', '1', 0, 1, 79, 2, 2, 1),
(143, '12� Pr�mio Destaque na Inicia��o Cient�fica e Tecnol�gica 2014', '2015-01-26', '00005', 'pt_BR', '2014', '2015-03-30', '1900-01-01', '1900-01-01', 'Premiar bolsistas de Inicia��o Cient�fica e Tecnol�gica do CNPq que se destacaram durante o ano, sob os aspectos de relev�ncia e qualidade do seu relat�rio final, e as institui��es participantes do Programa Institucional de Bolsas de Inicia��o Cient�fica (PIBIC) que contribu�ram de forma relevante para o alcance dos objetivos do Programa.', 'R$ 42 mil em esp�cie, participa��o na SBPC 2015 e R$ 216 mil em bolsas de mestrado.', '1. Bolsista de Inicia��o Cient�fica: bolsistas PIBIC, PIBIC-Af e de quotas de pesquisador com pelo menos 12 meses de bolsa e que estejam em processo de continuidade; <br>2. Bolsista de Inicia��o Tecnol�gica: bolsistas PIBITI e ITI com pelo menos 12 meses de bolsa e que estejam em processo de continuidade.', 'pict@cnpq.br', '', '1. Ci�ncias Exatas, da Terra e Engenharias; <br>2. Ci�ncias da Vida; <br>3. Ci�ncias Humanas e Sociais, Letras e Artes.', '', '', '', '', 'As indica��es dos bolsistas dever�o ser encaminhadas pelo e-mail pict@cnpq.br com a documenta��o em arquivo �nico no formato PDF: formul�rio de indica��o, hist�rico escolar, relat�rio final e carta de recomenda��o.', '', '!', '', '', 'http://www.destaqueict.cnpq.br/', 0, 143, 'Observat�rio', 20150120, '', 'francine.zucco', '', '4', 0, 1, 5, 1, 5, 4),
(144, '<br>TWAS-Celso Furtado Prize in Social Sciences', '2015-01-26', '00080', 'us_EN', '2015', '1900-01-01', '2015-02-28', '1900-01-01', 'With funding from the Brazilian Government for four years, the prize will recognize social scientists who have been living and working in a developing country for at least ten years. <br>The TWAS-Celso Furtado Prize is named after the renowned Brazilian economist, Celso Monteiro Furtado (1920-2004). Furtado�s research focused on the plight of the poor in Brazil and throughout South America.', 'Prize of US$15,000.', '1. Candidates for the TWAS-Celso Furtado Prize in Social Sciences must be scientists who have been working and living in a developing country for at least ten years immediately prior to their nomination. They must have made outstanding contributions in both understanding and addressing social sciences disciplines such as economics, political sciences and sociology; <br>2. Members of TWAS and candidates for TWAS membership are not eligible for the prize; <br>3. Self-nominations will not be considered.', 'prizes@twas.org', '', 'Social Sciences', '', '', '', '', 'Nominations must be made on the nomination form and clearly state the contribution the candidate has made to the development of the social sciences, and must be submitted to the address provided at the web site. Nominations arriving later will be considered in the following year.', '', 'A', '', '', 'http://twas.org/opportunity/twas-celso-furtado-prize-social-sciences', 0, 144, 'Observat�rio', 20150121, '', 'francine.zucco', '', '4', 0, 1, 80, 2, 5, 1),
(145, '<br>TWAS 2015 Prizes', '2015-01-26', '00080', 'us_EN', '2015', '2015-02-28', '1900-01-01', '1900-01-01', 'Every year, TWAS awards eight prizes of USD15,000 each in the following fields: agricultural sciences, biology, chemistry, earth sciences, engineering sciences, mathematics, medical sciences and physics.', 'Prize of US$15,000', 'Members of TWAS and candidates for TWAS membership are not eligible for TWAS Prizes. <br>Self-nominations will not be considered.<br>Candidates for a TWAS Prize must be scientists who have been working and living in a developing country for at least ten years immediately prior to their nomination. They must meet at least one of the following qualifications: <br>1. Scientific research achievement of outstanding significance for the development of scientific thought; <br>2. Outstanding contribution to the application of science and technology to industry or to human well-being in a developing country.', 'prizes@twas.org', '', 'Agricultural Sciences, Biology, Chemistry, Earth Sciences, Engineering Sciences, Mathematics, Medical Sciences and Physics', '', '', '', '', 'Nominations must be made on the nomination form and clearly state the contribution the candidate has made to the development of the social sciences, and must be submitted either to the address provided at the web site or eletronically. Nominations arriving later will be considered in the following year.', '', 'A', '', '', 'http://twas.org/opportunity/twas-2015-prizes', 0, 145, 'Observat�rio', 20150121, '', 'francine.zucco', '', '4', 0, 1, 80, 2, 5, 1),
(146, 'Innovative Measures of Oral Medication Adherence for HIV Treatment and Prevention (R01)', '2015-01-26', '00058', 'us_EN', 'PAR-14-193', '2015-03-25', '1900-01-01', '1900-01-01', 'The purpose of this Funding Opportunity Announcement (FOA) is to solicit innovative research applications that seek to advance the development of bioanalytical assays, pill ingestion sensors, drug metabolite and taggant detection systems, or wireless technologic approaches for monitoring and improving adherence to oral antiretroviral therapy (ART) and pre-exposure prophylaxis (PrEP).', 'Application budgets are not limited but need to reflect the actual needs of the proposed project.', 'Any individual(s) with the skills, knowledge, and resources necessary to carry out the proposed research as the Program Director(s)/Principal Investigator(s) (PD(s)/PI(s)) is invited to work with his/her organization to develop an application for support. Must have/create an eRA Commons account.', 'pjackson@niaid.nih.gov', '', 'HIV Treatment and Prevention', '', '', '', '', 'Although a letter of intent is not required, it is recommended (until 25/02). For submission, all instructions in the SF424 (R&R) Application Guide must be followed.', '', 'A', '', '', 'http://grants.nih.gov/grants/guide/rfa-files/RFA-AI-14-071.html', 0, 146, 'Observat�rio', 20150123, '', 'francine.zucco', 'Recursos NIH (EUA) para pesquisa em HIV', '2', 0, 1, 58, 2, 3, 1),
(147, '<br>Newton International Fellowships', '2015-01-26', '00048', 'us_EN', '2015', '2015-02-25', '1900-01-01', '1900-01-01', 'The Newton International Fellowships Scheme is delivered by the British Academy, the Royal Society and the Academy of Medical Sciences. The Scheme has been established to select the very best early stage post-doctoral researchers from all over the world and enable them to work at UK research institutions for a period of two years.', '�24,000 per annum for subsistence costs, up to �8,000 per annum research expenses, as well as a one-off payment of up to �2,000 for relocation expenses.', 'The applicant must: <br>1. have a PhD, or be at the final stages of it; <br>2. hold a permanent position; <br>3. not hold UK citizenship; <br>4. be competent in oral and written English; <br>5. have a clearly defined and mutually-beneficial research proposal agreed with a UK host researcher; and <br>6. applicants should have no more than 7 years of active full time postdoctoral experience at the time of application.', 'info@newtonfellowships.org', '', 'Physical, Natural and Social Sciences, and the Humanities.', '', '', '', '', 'The application must be submitted via e-GAP - https://e-gap.royalsociety.org/', '', 'A', '', '', 'http://www.britac.ac.uk/funding/guide/intl/newton_international_fellowships.cfm', 0, 147, 'Observat�rio', 20150126, '', 'francine.zucco', '', '1', 0, 1, 48, 2, 2, 1),
(148, 'Movilidad de Profesores e Investigadores Brasil-Espa�a', '2015-01-26', '00081', 'us_EN', 'C.2015', '2015-04-09', '2015-04-09', '2015-07-31', 'Las becas de movilidad de profesores e investigadores de universidades brasile�as y espa�olas tienen como objetivo promover la cooperaci�n cultural y cient�fica entre Brasil y Espa�a. La Fundaci�n Carolina convoca estas becas en colaboraci�n con la Junta de Andaluc�a, la Universidad de M�laga, la Universidad de Sevilla,  ,la Universidad de C�diz,  la Universidad Polit�cnica de Madrid  y la Universitat Rovira i Virgili.', 'Pasaje a�reo de ida y vuelta en clase turista. (Se especificaran en el comunicado de concesi�n las ciudades de partida/llegada de Brasil. Fundaci�n Carolina  no cubre los traslados internos )\r\nSeguro m�dico, no farmac�utico\r\n1.200 ? mensuales en concepto de alojamiento y manutenci�n.', 'Candidato brasile�o:\r\na. Ser nacional de Brasil\r\nb. Ser graduado universitario de carreras de no menos de cuatro a�os de duraci�n y haber obtenido el grado equivalente a licenciado.\r\nc. Ser docente universitario, preferentemente a tiempo completo, investigador o estudiante de doctorado en fase de investigaci�n, en una universidad u organismo de investigaci�n brasile�os reconocido por CAPES.\r\nd. Disponer de un curr�culum acad�mico o profesional de excelencia.\r\ne. Haber obtenido previamente la aceptaci�n de una de las siguientes instituciones: alguna de las universidades  u organismo de investigaci�n de las universidades   p�blicas :  de la Junta de Andalucia, la Universidad de M�laga, la Universidad de Sevilla, la Universidad de C�diz, la Universidad Polit�cnica de Madrid  y la Universitat Rovira i Virgili. \r\n f. No ser residente en Espa�a.', 'FORMACIONPERMANENTEBRASIL_2015@fundacioncarolina.es', '', '', '', '', '', '', 'http://gestion.fundacioncarolina.es/candidato/becas/ficha/ficha.asp?Id_Programa=3695', 'pdi@pucpr.br', 'A', '', '', 'http://gestion.fundacioncarolina.es/candidato/becas/ficha/ficha.asp?Id_Programa=3695', 0, 148, 'Observat�rio', 20150126, '', 'jeferson.vieira', 'Movilidad de Profesores e Investigadores Brasil-Espa�a', '1', 0, 1, 81, 2, 2, 1),
(149, '<br>Escola de Altos Estudos (EAE) - 04/2015', '2015-01-30', '00007', 'pt_BR', '04/2015', '2015-04-30', '1900-01-01', '1900-01-01', 'A Escola de Altos Estudos tem por objetivo apoiar os Programas de P�s-Gradua��o de Institui��es de Ensino Superior federais, estaduais, confessionais e comunit�rias, por meio do fomento � coopera��o acad�mica e do interc�mbio acad�mico internacional. Esse apoio se dar� por meio da oferta de cursos monogr�ficos intensivos de alto n�vel, ministrados por docentes e pesquisadores radicados no exterior de elevado conceito internacional.', 'At� R$150.000,00', '1. Poder�o apresentar projetos no �mbito da Escola de Altos Estudos, Programas de P�s-Gradua��o stricto sensu, avaliados e reconhecidos pela CAPES; <br>2. A Escola de Altos Estudos poder� ser ministrada por um ou mais professores convidados; <br>3. A proposta dever� prever a perman�ncia de cada professor convidado por at� 30 (trinta) dias ininterruptos.', 'altosestudos@capes.gov.br', '', 'Diversas �reas do conhecimento', '', '', '', '', 'As inscri��es devem ser efetuadas por meio de preenchimento de formul�rio e do envio de documentos relacionados no edital dentro dos prazos estabelecidos no calend�rio abaixo.', '', 'A', '', '', 'http://www.capes.gov.br/cooperacao-internacional/multinacional/escola-de-altos-estudos', 0, 149, 'Observat�rio', 20150130, '', 'francine.zucco', '', '3', 0, 1, 7, 1, 4, 1),
(150, 'Programa de Licenciaturas Internacionais (PLI) com a Fran�a', '2015-01-27', '00007', 'pt_BR', '2015', '2015-03-04', '1900-01-01', '1900-01-01', 'O programa tem como objetivo diversificar o curr�culo dos cursos de licenciatura brasileiros, tendo como prioridade o aperfei�oamento e a valoriza��o da forma��o de professores para a educa��o b�sica, al�m de ampliar as oportunidades de forma��o de licenciandos por meio da realiza��o de gradua��o sandu�che, com possibilidade de obten��o de diploma franc�s.', 'Miss�es de trabalho e de estudo', '1. A equipe brasileira do projeto dever� ser composta de no m�nimo 2 (dois) Doutores, sendo a coordena��o brasileira exercida por docente brasileiro com t�tulo de Doutor obtido h� pelo menos 5 (cinco) anos; <br>2. Todos os membros da equipe dever�o estar vinculados aos cursos de Licenciatura relacionados ao projeto.', 'plifr@capes.gov.br', '', 'Licenciatura em Letras, Biologia, Matem�tica, F�sica e Qu�mica', '', '', '', '', 'As inscri��es ser�o admitidas exclusivamente pela internet, mediante o preenchimento doformul�rio de inscri��o.', '', 'A', '', '', 'http://www.capes.gov.br/cooperacao-internacional/multinacional/licenciaturas-internacionais/licenciaturas-internacionais-franca', 0, 150, 'Observat�rio', 20150127, '', 'francine.zucco', '', '3', 0, 1, 7, 1, 4, 1),
(151, 'CP IPEA/PNPD N� 003/2015 - Bolsa em Economia', '2015-01-28', '00071', 'pt_BR', '003/2015', '2015-02-05', '1900-01-01', '1900-01-01', 'A presente Chamada tem por objetivo selecionar interessados, para concess�o de bolsa pesquisa para o  Projeto ? Acompanhamento e An�lise das Finan�as P�blicas em Alta Frequ�ncia?.', '', '1. Possuir gradua��o na �rea de Economia; <br>2. Ter disponibilidade para execu��o de atividade inerentes ao projeto de pesquisa, nas instala��es do IPEA/Bras�lia; <br>3. Ter dom�nio do pacote Office e no��es de base de dados; <br>4. N�o ter recebido bolsa IPEA por 12 meses ou mais.', 'pnpd@ipea.gov.br', '', 'Economia', '', '', '', '', 'A solicita��o deve ser apresentada, pelo candidato, mediante o cadastramento de seus dados no Sistema de Cadastro de Bolsista, dispon�vel na p�gina do IPEA www.ipea.gov.br', '', 'A', '', '', 'http://www.ipea.gov.br/portal/index.php?option=com_content&view=article&id=24367&catid=117&Itemid=5', 0, 151, 'Observat�rio', 20150128, '', 'francine.zucco', '', '1', 0, 1, 71, 1, 2, 1),
(152, 'Programa CAPES/TAMU - Projeto Conjunto de Pesquisa', '2015-01-29', '00007', 'pt_BR', '02/2015', '2015-03-03', '1900-01-01', '1900-01-01', 'Apoiar o desenvolvimento de projetos conjuntos de pesquisa e fomentar a mobilidade de pesquisadores e de estudantes de doutorado e p�s-doutorado, em todas as �reas do conhecimento, visando ao desenvolvimento de n�cleos de pesquisa transnacionais entre institui��es do Brasil e da Universidade Texas A&M, nos Estados Unidos.', 'Miss�es de trabalho e de estudo, custeio de at� R$ 10.000,00', '1. A coordena��o do projeto estar� a cargo de docente com t�tulo de doutor e vinculado a um PPG recomendado pela Capes; <br>2. A equipe do Brasil dever� ser composta de pelo menos dois doutores, al�m do Coordenador e com comprovada capacidade t�cnico-cient�fica para o desenvolvimento do projeto; <br>3. A proposta dever� ter car�ter inovador, considerando inclusive o desenvolvimento da �rea no contexto nacional e internacional, e explicitando as vantagens da parceria.', 'tamu@capes.gov.br', '', 'Diversas �reas do conhecimento', '', '', '', '', 'Embora n�o seja lan�ado edital espec�fico para o Programa CAPES/TAMU em 2015, ser�o recebidos pedidos de apoio a projetos com grupos americanos financiados pela Universidade Texas A&M por meio do edital PGCI, mas com cronograma espec�fico - at� 03/03.', '', 'A', '', '', 'http://www.capes.gov.br/cooperacao-internacional/estados-unidos/programa-tamu', 0, 152, 'Observat�rio', 20150129, '', 'francine.zucco', '', '3', 0, 1, 7, 1, 4, 1);
INSERT INTO `fomento_edital` (`id_ed`, `ed_titulo`, `ed_dt_create`, `ed_agencia`, `ed_idioma`, `ed_chamada`, `ed_dt_deadline_elet`, `ed_dt_deadline_envio`, `ed_dt_previsao_divulg_res`, `ed_texto_1`, `ed_texto_2`, `ed_texto_3`, `ed_texto_4`, `ed_texto_5`, `ed_texto_6`, `ed_texto_7`, `ed_texto_8`, `ed_texto_9`, `ed_texto_10`, `ed_texto_11`, `ed_texto_12`, `ed_status`, `ed_autor`, `ed_corpo`, `ed_url_externa`, `ed_total_visualizacoes`, `ed_codigo`, `ed_local`, `ed_data_envio`, `ed_document_require`, `ed_login`, `ed_titulo_email`, `ed_edital_tipo`, `ed_fluxo_continuo`, `fdis_id`, `fag_id`, `i_id`, `ftp_id`, `fs_id`) VALUES
(153, '28� Pr�mio Paranaense de Ci�ncia e Tecnologia', '2015-02-02', '00003', 'pt_BR', '28 - 2014', '2015-04-15', '1900-01-01', '1900-01-01', 'O pr�mio de C&T cresceu e se consolidou como uma das a��es da SETI e tem como objetivo valorizar a trajet�ria e a produ��o cient�fica de grandes pesquisadores que atuam no Paran�, bem como de jovens talentosos que escolheram a ci�ncia como um projeto profissional e de vida.', 'Pr�mio em dinheiro', 'Categorias: <br>1. Professor-pesquisador; <br>2. Pesquisador-extensionista; <br>3. Graduandos; <br>4. Inventor independente; <br>5. Jornalista Cient�fico.', '', '', 'Engenharias e Ci�ncias Biol�gicas', '', '', '', '', 'O candidato dever� encaminhar os documentos solicitados para o endere�o eletr�nico premiocet@seti.pr.gov.br', '', 'A', '', '', 'http://www.seti.pr.gov.br/modules/conteudo/conteudo.php?conteudo=261', 0, 153, 'Observat�rio', 20150202, '1', 'francine.zucco', '28� Pr�mio Paranaense de Ci�ncia e Tecnologia', '4', 0, 1, 3, 1, 5, 1),
(154, 'Projeto ?Dimensionamento da for�a e trabalho e interioriza��o do minist�rio p�blico? - 008/2015', '2015-02-05', '00071', 'pt_BR', '008/2015', '2015-02-13', '1900-01-01', '1900-01-01', 'A presente Chamada tem por objetivo selecionar interessados, para concess�o de bolsa pesquisa, que atendam aos requisitos do Termo de Refer�ncia constante no Anexo I e no regulamento desta Chamada, em realizar atividades no �mbito do projeto: ?Dimensionamento da For�a de trabalho e Interioriza��o do Minist�rio P�blico do Trabalho?.', 'Bolsas', '1. Assistente de Pesquisa II (Mestrando); <br>2. Assistente de Pesquisa III (Mestre); <br>3. Bolsa de Incentivo a Pesquisa I (Graduado); <br>4. Doutor I.', 'pnpd@ipea.gov.br', '', 'Diversas �reas do conhecimento', '', '', '', '', 'A solicita��o deve ser apresentada, pelo candidato, mediante o cadastramento de seus dados no Sistema de Cadastro de Bolsista, dispon�vel na p�gina do IPEA www.ipea.gov.br, mediante a sele��o do projeto de interesse', '', 'A', '', '', 'http://www.ipea.gov.br/portal/index.php?option=com_content&view=article&id=24408&catid=117&Itemid=5', 0, 154, 'Observat�rio', 20150205, '', 'francine.zucco', 'Bolsa IPEA  em Dimensionamento da for�a e trabalho e interioriza��o do minist�rio p�blico', '1', 0, 1, 71, 1, 2, 1),
(155, 'Programa de Apoio a A��es de Conserva��o', '2015-02-06', '00033', 'pt_BR', '2015', '2015-03-31', '1900-01-01', '1900-01-01', 'Investir em projetos de conserva��o da biodiversidade, a m�dio e longo prazos, � uma das principais estrat�gias para garantir o bem-estar social desta e das futuras gera��es. Por essa raz�o, a Funda��o Botic�rio mantem h� mais de 20 anos um programa de apoio a iniciativas de conserva��o da natureza no pa�s, contribuindo para o desenvolvimento cient�fico, aplica��o pr�tica e divulga��o do conhecimento gerado, ampliando o engajamento em prol da necessidade de conserva��o de nossos ambientes naturais.', 'Podem ser apoiados recursos para materiais de consumo, materiais permanentes, despesas com viagens (transporte, hospedagem, alimenta��o, ped�gio), despesas com terceiros (servi�os pontuais ao projeto) e despesas com pessoal (remunera��o para membros da equipe executora). <br>Bolsas somente para alunos de gradua��o. <br>Materiais importados poder�o ser vetados.', 'Os editais de apoio a projetos da Funda��o Grupo Botic�rio s�o destinados somente a pessoas jur�dicas sem fins lucrativos, como organiza��es n�o governamentais ou funda��es e associa��es.', 'edital@fundacaogrupoboticario.org.br', '', 'Linhas tem�ticas: <br>1. Unidades de Conserva��o de Prote��o Integral e RPPNs: cria��o e amplia��o de UCs e execu��o de seus Planos de Manejo; <br>2. Esp�cies Amea�adas: execu��o de Planos de A��o Nacionais (PAN), a��es emergenciais para prote��o e defini��o de status de amea�a de esp�cies nativas; <br>3. Ambientes Marinhos: estudos, prote��o e redu��o das press�es sobre a biodiversidade marinha.', '', '', '', '', 'A inscri��o dever� ser feita via formul�rio online.', '', 'A', '', '', 'http://www.fundacaogrupoboticario.org.br/pt/o-que-fazemos/editais/pages/apoio-projetos-linhas.aspx', 0, 155, 'Observat�rio', 20150206, '', 'francine.zucco', 'Funda��o Grupo Botic�rio: Programa de Apoio a A��es de Conserva��o', '2', 0, 1, 33, 1, 3, 1),
(156, '<br>Newton Advanced Fellowships', '2015-02-09', '00048', 'us_EN', '2015', '2015-03-18', '1900-01-01', '1900-01-01', 'Newton Advanced Fellowships provide early to mid-career international researchers who already have a track record with an opportunity to develop their research strengths and capabilities, and those of their group or network, through training, collaboration and visits with a partner in the UK.', 'Each award provides up to �37,000 per year: salary for the applicant, research support, travel and subsistence, training.', '1. Applicants must have a PhD or equivalent research experience and hold a permanent or fixed-term contract in an eligible university or research institute in a partner country, which must span the duration of the project; <br>2. Collaborations should focus on a single project involving the overseas-based researcher (?the Applicant?) and a UK-based researcher (?the Co-applicant?); <br>3. Applicants should have not more than 15 years postdoctoral research experience.', 'newtonfund@britac.ac.uk', '', '<A HREF=https://royalsociety.org/grants/schemes/newton-advanced-fellowships/> 1. Natural Sciences</A> \r\n<br><A HREF=http://www.acmedsci.ac.uk/careers/funding-schemes/newton-advanced-fellowships/> 2. Medical Sciences</A>\r\n<br><A HREF=http://www.britac.ac.uk/funding/guide/newton_advanced_fellowships.cfm?frmAlias=/newton-advanced-fellowships/> 3. Social Sciences and Humanities</A>', '', '', '', '', 'Applications must be submitted online using the British Academy?s electronic Grant Application and Processing (eGAP) system.', '', 'A', '', '', 'https://www.gov.uk/government/publications/newton-fund-building-science-and-innovation-capacity-in-developing-countries/newton-fund-building-science-and-innovation-capacity-in-developing-countries', 0, 156, 'Observat�rio', 20150209, '', 'francine.zucco', 'Oportunidade Coopera��o com UK: Newton Advanced Fellowships', '3', 0, 1, 48, 2, 4, 1),
(157, '2� Pr�mio Paulo Freire - Concurso de experi�ncias Inovadoras', '2015-02-10', '00082', 'pt_BR', '2�/2015', '2015-03-15', '1900-01-01', '1900-01-01', 'O Programa de Apoio ao Setor Educacional do MERCOSUL promove o interc�mbio de experi�ncias e pr�ticas educacionais transformadoras na forma��o docente da Argentina, do Brasil, do Paraguai e do Uruguai, por meio do Concurso de Experi�ncias Inovadoras na Forma��o Docente. O objetivo do pr�mio � compartilhar as experi�ncias realizadas e estabelecer a��es comuns para ampliar o direito � educa��o e � integra��o regional.', '', '1. Ter desenvolvido as experi�ncias entre os anos de 2010 e 2013 ou estar atualmente em desenvolvimento h�, pelo menos, um ano; <br>2. Estar devidamente documentada com material emp�rico e depoimentos diretos; <br>3. Contar com resultados identific�veis por parte dos seus respons�veis e seus destinat�rios; <br>4. Ser apoiada pela institui��o que desenvolveu o projeto e/ou a/s institui��o/�es destinat�ria/s.', '', '', 'Seguintes tem�ticas: <br>1. Pr�ticas inovadoras no percurso da pr�tica profissional ou no �mbito da forma��o inicial docente; <br>2. Pr�ticas inovadoras de educa��o para a diversidade.', '', '', '', '', '', '', 'A', '', '', 'http://www.pasem.org/pt/concurso/', 0, 157, 'Observat�rio', 20150210, '', 'francine.zucco', '2� Pr�mio Paulo Freire - Concurso de experi�ncias Inovadoras', '4', 0, 1, 82, 1, 5, 1),
(158, '<br>Newton Mobility Grants', '2015-02-10', '00048', 'us_EN', '2015', '2015-03-18', '1900-01-01', '1900-01-01', 'Newton Mobility Grants are offered under the Newton Fund, which is part of the UK?s Official Development Assistance (ODA) commitment. These grants provide support for international researchers based in a country covered by the Newton Fund to establish and develop collaboration with UK researchers around a specific jointly defined research project. These one-year awards are particularly suited to initiate new collaborative partnerships, between scholars who have not previously worked together, or new initiatives between scholars who have collaborated in the past.', 'Grants are offered up to a maximum of �10,000 for a period of one year.', '1. Both an overseas-based applicant and a UK-based co-applicant are required for this scheme and each must have input into the application. <br>2. Both applicants must have a PhD or equivalent research experience and hold a permanent or fixed-term contract in an eligible university or research institute, which must span the duration of the project.', 'newtonfund@britac.ac.uk', '', 'All disciplines within the social sciences and humanities.', '', '', '', '', 'Applications must be submitted online using the British Academy?s electronic Grant Application and Processing (eGAP) system.', '', 'A', '', '', 'http://www.britac.ac.uk/funding/guide/Newton_Mobility_Grants.cfm?frmAlias=/newton-mobility-grants/', 0, 158, 'Observat�rio', 20150210, '', 'francine.zucco', 'Oportunidade de coopera��o com UK: Newton Mobility Grants', '3', 0, 1, 48, 2, 4, 1),
(159, '4� Pr�mio Pemberton - Pr�mio Coca-Cola na �rea de sa�de', '2015-02-10', '00083', 'pt_BR', '4�/2015', '2015-05-10', '1900-01-01', '1900-01-01', 'Incentivar e promover pesquisas cient�ficas com foco em bem-estar e nos requisitos para uma vida saud�vel, tais como os benef�cios da alimenta��o equilibrada, da hidrata��o e da pr�tica de exerc�cios f�sicos. A 4� edi��o do Pr�mio Pemberton contemplar� trabalhos cient�ficos nas �reas de Medicina, Educa��o F�sica, Nutri��o, Biologia, Engenharia de Alimentos e disciplinas afins.', 'Pr�mio em dinheiro e viagem', '1. Poder�o se inscrever pesquisadores e profissionais de toda e qualquer �rea ligada � Sa�de e afins e vinculados a uma entidade acad�mica ou institui��o de pesquisa; <br>2. O Pr�mio n�o se aplica a estudantes da gradua��o; <br>3. O trabalho dever� ser in�dito e n�o poder� ter sido publicado na �ntegra; <br>4. N�o ser�o aceitos trabalhos ainda n�o conclu�dos e trabalhos de revis�o bibliogr�fica; <br>5. Ter sido aprovado pelo comit� de �tica da institui��o e/ou pela Comiss�o Nacional de �tica em Pesquisas (CONEP), quando pertinente.', '', '', '�reas de sa�de e afins em duas categorias: 1. Pesquisa b�sica e 2. Pesquisa aplicada.', '', '', '', '', 'A inscri��o dever� ocorrer somente pelo site www.premiopemberton.com.br por meio de envio do resumo do trabalho e preenchimento obrigat�rio da ficha de inscri��o solicitada durante o cadastro no site. Dever�o ser enviados, ainda, por correio, devidamente preenchidos e assinados, o Termo de Responsabilidade do Orientador e o Termo de Cess�o de Direitos.', '', 'A', '', '', 'https://www.premiopemberton.com.br/', 0, 159, 'Observat�rio', 20150210, '', 'francine.zucco', '4� Pr�mio Pemberton - Pr�mio Coca-Cola na �rea de sa�de', '4', 0, 1, 83, 1, 5, 1),
(160, 'Rapid Ocean Conservation (ROC) Grants Program', '2015-02-19', '00084', 'us_EN', '2015', '1900-01-01', '1900-01-01', '1900-01-01', 'The Rapid Ocean Conservation (ROC) Grants Program provides small grants with a quick turnaround time for solutions to emerging conservation issues. This complements the Waitt Foundation?s existing major grants program and is responsive to conservation opportunities, supports higher-risk ideas at a low financial cost, and engages with small, local NGOs domestically and abroad.', 'Proposals for grants up to $10,000 will be reviewed on a rolling basis. Proposals up to $20,000 will be considered, but granted highly infrequently.', '1. Project must support sustainable fishing and/or MPAs as elaborated in the program focus section; <br>2. Applicants need not hold advanced degrees, but must demonstrate a commensurate level of experience and expertise with respect to the proposed project; <br>3. Applicants must have and maintain legitimate affiliation with an academic institution or NGO for the duration of the grant project; <br>4. Spending of grant funds must commence within 1 month of granting, and be completed within 6 months; <br>5. Funds cannot be used for event sponsorships; <br>6. ROC grants should constitute the sole or primary source of funding for the proposed project.', '', '', 'Scientific Research: natural science or social science projects.', '', '', '', '', 'All applicants must submit a project specific budget along with electronic submission. Applications can be done at any time, no deadline.', '', 'A', '', '', 'http://waittfoundation.org/roc-grants-program', 0, 160, 'Observat�rio', 20150219, '', 'francine.zucco', 'Rapid Ocean Conservation (ROC) Grants Program', '2', 0, 1, 84, 2, 3, 1),
(161, 'Group and Region-Focused Training in Criminal Justice', '2015-02-10', '00034', 'us_EN', 'J1504425', '1900-01-01', '2015-03-06', '1900-01-01', 'The objective of this program is to give criminal justice personnel in the Asia and Pacific region, and other countries, an opportunity to share experiences, gain knowledge, examine concrete measures and discuss best practices for the criminal justice system regarding investigation, prosecution, adjudication, enforcement and international cooperation. It is also hoped that the participants will create an international network of counterparts.', 'Training, travel and accommodation expenses covered.', 'This program is offered to relatively senior criminal justice officials such as investigators, public prosecutors, or judges who deal with criminal cases.', 'Watanabe.Hajime@jica.go.jp', '', 'The main theme of the program is ?The State of Cybercrime: Current Issues and Countermeasures?', '', '', '', '', '', '', 'A', '', '', 'http://www.jica.go.jp/brazil/portuguese/office/courses/index.html', 0, 161, 'Observat�rio', 20150210, '', 'francine.zucco', 'Group and Region-Focused Training in Criminal Justice', '1', 0, 1, 34, 2, 2, 1),
(162, 'EU-LAC Foundation�s Open Call for Research Projects', '2015-02-11', '00085', 'us_EN', '2015', '2015-03-31', '1900-01-01', '1900-01-01', 'The Open Call is part of the Foundation?s effort to promote mutual knowledge and visibility of the partnership among the European Union, Latin America and the Caribbean. Stimulating debate on issues that are relevant to the EU-LAC agenda enables the Foundation, within its work programme ?Explore?, to propose ways of cooperating on these issues in the bi-regional relationship.', 'Up to ? 30,000 (gross) - personnel costs and travel expenses.', 'Applicants must: <br>1. Be affiliated with an EU or LAC research institution. In the case of research consortia, a bi-regional composition of the consortium will be valued, although it does not in itself guarantee a favourable decision; <br>2. Propose a research project related to the bi-regional relationship and/or related to biregional cooperation; <br>3. Be able to carry out the project in English or Spanish.', 'info@eulacfoundation.org', '', 'Topics relevant to the relationship between the European Union and Latin America and the Caribbean.', '', '', '', '', 'Applications must be made in English or Spanish and all necessary documentation can be downloaded from the website.', '', 'A', '', '', 'http://eulacfoundation.org/en/opencall', 0, 162, 'Observat�rio', 20150211, '', 'francine.zucco', 'EU-LAC Foundation�s Open Call for Research Projects', '3', 0, 1, 85, 2, 4, 1),
(163, 'Vice Chancellor?s International Scholarship for Research Excellence', '2015-02-12', '00086', 'us_EN', '2015', '2015-05-06', '1900-01-01', '1900-01-01', 'The Vice-Chancellor?s Scholarships for Research Excellence aim to recognize and reward applications from outstanding international students. In 2015, we are offering international students over 50 full tuition fee scholarships.', 'Full tuition fee coverage. The scholarships are for up to each of 3 years of a research programme subject to satisfactory progress', 'Applicants must be classified as ?overseas? for fee purposes and already hold an offer to start a full-time research degree programme, PhD or MPhil, at Nottingham in September or October 2015, any subject area.', '', '', 'Arts, Medicine and Health Sciences, Science, Social Sciences.', '', '', '', '', 'Application for admission to study at Nottingham must be received at least six weeks before the scholarship closing date to allow time for the Admissions office to process the application and confirm your offer, before you can apply for the scholarship.', '', 'A', '', '', 'http://www.nottingham.ac.uk/studywithus/international-applicants/scholarships-fees-and-finance/scholarships/scholarshipdetails/research-overseas.aspx', 0, 163, 'Observat�rio', 20150212, '', 'francine.zucco', 'Vice Chancellor?s International Scholarship for Research Excellence', '1', 0, 1, 86, 2, 2, 1),
(164, 'VLIR-UOS Training Scholarships for Developing Countries', '2015-02-11', '00087', 'us_EN', '2015', '1900-01-01', '1900-01-01', '1900-01-01', 'VLIR-UOS aims to give young scientists and professionals the opportunity to follow a course in Flanders, in an international environment. The programme aims to exchange knowledge and skills to contribute to the local development of the home countries of the participants and to global development.', 'VLIR-UOS provides full scholarships for the total duration of the training including  allowance of ? 32/day, several one-time payments, accommodation, insurance, international travel and tuition fee.', '1. Age: 45 years or less; <br>2. Meet the academic admission criteria set by the university or university college, concerning educational background, language proficiency, etc; <br>3. Have relevant professional experience and a written (future) employer?s statement of (re)integration in an employment where the acquired knowledge and skills will be immediately applicable. The statement should also confirm the added value of the training for the candidate and the organization.', 'ellen.vanhimbergen@vliruos.be', '', 'Training programmes: <br>1. Dairy Nutrition - 1st Mar; <br>2. Technology for Integrated Water Management - 20th Feb; <br>3.  Food Safety, Quality Assurance Systems and Risk Analysis - 1st Mar; <br>4.  Human Rights for Development (?HR4DEV?) - 15th Mar; <br>5. Road safety in Low and Middle-Income Countries: Challenges and Strategies for Improvement - 12th Apr; <br>6. AudioVisual Learning Materials ? Management, Production and Activities (AVLM) - 31st Mar.', '', '', '', '', 'To apply for a scholarship, you first need to apply for the training programme. To apply for a training programme, visit the website of the training programme of your interest.', '', 'A', '', '', 'http://www.vliruos.be/en/project-funding/programdetail/international-training-programme-itp_3958/', 0, 164, 'Observat�rio', 20150211, '', 'francine.zucco', 'VLIR-UOS Training Scholarships for Developing Countries', '1', 0, 1, 87, 2, 2, 1),
(165, 'Bolsas postdoc Embrapa Agroenergia em Bioprocessos', '2015-02-12', '00088', 'pt_BR', '2015', '2015-02-27', '1900-01-01', '1900-01-01', 'Bolsas de p�s-doutorado para atuar em pesquisas com processos fermentativos na produ��o de biomol�culas a partir de glicerina e obten��o de enzimas a serem aplicadas na s�ntese de biodiesel. Os selecionados v�o desenvolver seu trabalho na sede da Embrapa Agroenergia, em Bras�lia/DF, com carga hor�ria de 40 horas semanais.', 'Bolsa Capes (R$ 4.100,00).', 'Ter doutorado na �rea de bioprocessos, de prefer�ncia em produ��o de mol�culas via fermenta��o.', '', '', '1. Produ��o de poli�is por processos fermentativos em biorreatores; <br>2. Produ��o de biomol�culas (enzimas e poli�is) por processos fermentativos e aplica��o de enzimas.', '', '', '', '', 'Os interessados devem enviar e-mail at� 27/02 para thais.salum@embrapa.br, com o assunto "Bolsa de P�s-doc ? bioprocessos". No corpo do e-mail, devem enviar o link para o Curr�culo Lattes e indicar em qual das �reas deseja atuar.', '', 'A', '', '', 'https://www.embrapa.br/busca-de-noticias/-/noticia/2425303/prorrogadas-inscricoes-para-bolsas-em-bioprocessos', 0, 165, 'Observat�rio', 20150212, '', 'francine.zucco', 'Bolsas postdoc Embrapa Agroenergia em Bioprocessos', '1', 0, 1, 88, 1, 2, 1),
(166, 'Core Fulbright U.S. Scholar Program - Award # 6455', '2015-02-19', '00089', 'us_EN', '#6455', '2015-08-03', '1900-01-01', '1900-01-01', 'The Fulbright Core Scholar Program supports activities and projects that recognize and promote the critical relationship between educational exchange and international understanding, in addition to the intellectual merit of the proposals.', 'A fixed sum of US$ 24,000 for one academic semester (4 months) and up to US$ 1,000 for in-country travel (for four-month grants only).', '1. U.S. citizenship; <br>2. Ph.D. or equivalent professional/terminal degree; <br>3. Foreign language proficiency, depending on the area; <br>4. The candidate is expected to apply no earlier than 5 years after having obtained his or her Ph.D. or other terminal degree.', 'fulbright@fulbright.org.br', '', 'All disciplines', '', '', '', '', 'The candidates must apply online - more info at http://www.cies.org/application-guidelines. Moreover, an expression of interest from the host institution is required. ', '', 'A', '', '', 'http://www.cies.org/program/core-fulbright-us-scholar-program#9', 0, 166, 'Observat�rio', 20150227, '', 'francine.zucco', 'Oportunidade para trazer professores americanos - Fulbright Award', '3', 0, 1, 89, 2, 4, 1),
(167, 'C�tedra Fulbright em Sa�de Coletiva (Global Health)', '2015-02-19', '00089', 'pt_BR', '2015', '2015-03-31', '1900-01-01', '1900-01-01', 'A C�tedra Fulbright em Sa�de Global na Rutgers, The State University of New Jersey, destina-se a professores e pesquisadores brasileiros com comprovada experi�ncia na �rea da Sa�de. Profissionais com trabalhos com �nfase em sa�de global e urbaniza��o; urbaniza��o e vulnerabilidade da popula��o aos impactos das mudan�as clim�ticas e exposi��o � polui��o; urbaniza��o e doen�as cr�nicas t�m prefer�ncia na sele��o.', 'Um grant de US$ 20.000,00, passagem a�rea, seguro de sa�de e moradia.', '1. Ter conclu�do o doutorado at� 2005; <br>2. Possuir nacionalidade brasileira e n�o possuir nacionalidade norte-americana; <br>3. Ter dez ou mais anos de experi�ncia profissional qualificada; <br>4. Ter flu�ncia em ingl�s; <br>5. Estar atuando no Brasil; <br>6. N�o receber bolsa ou benef�cio financeiro de outras ag�ncias ou entidades brasileiras para o mesmo objetivo.', 'alexandre@fulbright.org.br', '', 'Ci�ncias da Sa�de e Biom�dicas de Rutgers (RBHS): c�ncer, infec��o e inflama��o, meio-ambiente e sa�de ocupacional, e neuroci�ncias', '', '', '', '', 'O candidato deve submeter sua candidatura exclusivamente via internet. No item Special Award Name, indicar Chair in Global Health at Rutgers.', '', 'A', '', '', 'http://www.fulbright.org.br/content/view/319/190/', 0, 167, 'Observat�rio', 20150220, '', 'francine.zucco', 'C�tedra Fulbright em Sa�de Coletiva (Global Health)', '1', 0, 1, 89, 1, 2, 1),
(168, 'Inscri��es prorrogadas: Fellowship in Spokane Community College', '2015-04-30', '00089', 'pt_BR', '2015', '2015-05-31', '1900-01-01', '1900-01-01', 'O Programa Scholar-In-Residence oferece oportunidade para brasileiros ministrarem aulas nos Estados Unidos, por um ano acad�mico. O Spokane Community College  busca um profissional da �rea de Sociologia, Ci�ncia Pol�tica ou Hist�ria para apoiar no desenvolvimento de cursos de gradua��o em estudos latino-americanos/internacionais. A ideia � que o professor traga a  perspectiva latino-americana para a cursos como Introdu��o � Sociologia, Problemas Sociais e Hist�ria da Am�rica Latina e do Mundo.', 'Fellowship no total de US$ 42,221.00.', '1. Possuir doutorado preferencialmente em uma das �reas de concentra��o; <br>2. Possuir ao menos tr�s anos de experi�ncia em atividades acad�micas; <br>3. Ter flu�ncia na l�ngua inglesa; <br>4. Possuir pouca ou nenhuma experi�ncia acad�mica nos EUA.', 'alexandre@fulbright.org.br', '', 'Sociologia, Ci�ncia Pol�tica ou Hist�ria', '', '', '', '', 'O candidato dever� se inscrever at� o dia 31 de maio de 2015, preenchendo o Application Form em ingl�s.', '', 'A', '', '', 'http://www.fulbright.org.br/content/view/22/80/', 0, 168, 'Observat�rio', 20150430, '', 'francine.zucco', 'Inscri��es prorrogadas: Fulbright Fellowship in Spokane Community College', '1', 0, 1, 89, 1, 2, 1),
(169, 'Bolsa DTI/CNPq - Projeto ISI/SDS Plasma', '2015-02-19', '00039', 'pt_BR', '2015', '1900-01-01', '1900-01-01', '1900-01-01', 'O Instituto SENAI de Inova��o em Eletroqu�mica busca um profissional altamente motivado para trabalhar no tema de Nitreta��o a Plasma em V�lvulas para Motores Automotivos. O candidato selecionado ser� contemplado com uma bolsa DTI/CNPq-B e deve estar disposto a trabalhar em uma equipe multidisciplinar (engenharia mec�nica, materiais, projetos e engenharia de superf�cie).', 'Bolsa CNPq/DTI ? B, valor mensal de R$ 3.000,00.', 'Gradua��o na Grande �rea de Ci�ncias Exatas, preferencialmente em Engenharia (n�vel graduado com dois anos de experi�ncia ou Mestre em Engenharia) com experi�ncia em pesquisa em a�os ou tratamentos t�rmicos e de superf�cie ou projeto de equipamentos ou  ensaios de materiais (prepara��o de amostra para metalografia, microscopia optica e eletronica de varredura, ensaios de dureza e microdureza).', '(41) 3271-7433 ou (41) 3271-7432 e-mail: nerio.vicente@pr.senai.br', '', 'Engenharias', '', '', '', '', 'Favor entrar em contato com N�rio Vicente Jr - nerio.vicente@pr.senai.br', '', '!', '', '', '', 0, 169, 'Observat�rio', 20150219, '', 'francine.zucco', 'Bolsa DTI/CNPq - Projeto ISI/SDS Plasma', '1', 0, 1, 39, 1, 2, 4),
(170, 'Emerging Leaders in the Americas Program (ELAP)', '2015-02-20', '00035', 'us_EN', '2015', '2015-04-30', '1900-01-01', '1900-01-01', 'The Emerging Leaders in the Americas Program (ELAP) scholarships are facilitated through institutional collaborations and student exchange agreements between Canadian and Latin American or Caribbean institutions. These agreements are created between colleges, technical or vocational institutions and universities. Students or researchers, hereby referred to as "candidates", remain registered as full time students in their home institution during this exchange.', 'The scholarship value varies depending on the duration and level of study: <br>1. $7,200 CAN for college, undergraduate or graduate students (Master�s and PhD) for four months or one academic term of study or research; <br>2. $9,700 CAN for graduate students (Master�s and PhD) for a period of five to six months of study or research.', 'Candidates: <br>1. must be enrolled full-time at a post-secondary institution in an eligible country and paying any tuition fees regulated by that institution for the full duration of the exchange; <br>2. must be proficient in English or French; <br>3. may not hold any other scholarship granted by the Government of Canada.', 'admin-scholarships-bourses@cbie.ca', '', 'All disciplines', '', '', '', '', 'The Canadian institutions are responsible for submitting applications on behalf of candidates from institutions in Latin America and the Caribbean. Please communicate with partner institutions in Canada to confirm or explore possibilities.', '', 'A', '', '', 'http://www.scholarships-bourses.gc.ca/scholarships-bourses/can/institutions/elap-pfla.aspx?lang=eng', 0, 170, 'Observat�rio', 20150220, '', 'francine.zucco', 'Government of Canada - Emerging Leaders in the Americas Program (ELAP)', '3', 0, 1, 35, 2, 4, 1),
(171, 'Cutting-Edge Basic Research Awards', '2015-02-20', '00058', 'us_EN', 'PAR-12-086', '2015-08-20', '1900-01-01', '1900-01-01', 'The National Institute on Drug Abuse (NIDA) Cutting-Edge Basic Research Award (CEBRA) is designed to foster highly innovative or conceptually creative research related to drug abuse and addiction and how to prevent and treat them. It supports research that is high-risk and potentially high-impact that is underrepresented or not included in NIDA�s current portfolio.', 'Application budgets are limited to $125,000 direct costs per year.', 'The proposed research should: <br>(1) test a highly novel and significant hypothesis for which there are scant precedent or preliminary data and which, if confirmed, would have a substantial impact on current thinking; and/or <br>(2) develop or adapt innovative techniques or methods for addiction research, or that have promising future applicability to drug abuse research.', 'svolman@mail.nih.gov', '', 'Drug abuse and addiction', '', '', '', '', 'Organizations must submit applications to Grants.gov. Aplicants must then complete the submission process by tracking the status of the application in the eRA Commons.', '', 'A', '', '', 'http://grants.nih.gov/grants/guide/pa-files/PAR-15-079.html#_Section_III._Eligibility', 0, 171, 'Observat�rio', 20150224, '', 'francine.zucco', 'NIH - Cutting-Edge Basic Research Awards', '2', 0, 1, 58, 2, 3, 1),
(172, 'Canada-Brazil Awards - Joint Research Projects (Capes-DFATD)', '2015-02-20', '00007', 'pt_BR', 'PGCI', '2015-04-30', '1900-01-01', '1900-01-01', 'Selecionar projetos conjuntos de pesquisa em todas as �reas do conhecimento, fortalecer a colabora��o entre pesquisadores brasileiros e canadenses, e estimular a mobilidade acad�mica. Nesse caso, o apoio da Capes � destinado a miss�es de trabalho para docentes, miss�es de estudos de doutorado-sandu�che, al�m da concess�o de recursos de custeio � equipe brasileira. O apoio a equipes canadenses ser� conforme as regras do DFATD.', 'Miss�es de trabalho e miss�es de estudo', '1. A coordena��o do projeto estar� a cargo de docente com t�tulo de doutor e vinculado a um PPG recomendado pela Capes; <br>2. A equipe do Brasil dever� ser composta de pelo menos dois doutores, al�m do Coordenador e com comprovada capacidade t�cnico-cient�fica para o desenvolvimento do projeto; <br>3. A proposta dever� ter car�ter inovador, considerando inclusive o desenvolvimento da �rea no contexto nacional e internacional, e explicitando as vantagens da parceria.', ' dfait@capes.gov.br', '', 'Diversas �reas do conhecimento', '', '', '', '', 'Em 2015 n�o ser� lan�ado edital espec�fico para o Programa CAPES/DFATD. Ser�o recebidos pedidos de apoio a projetos com grupos canadenses financiados pelo DFATD por meio do edital PGCI.', '', 'A', '', '', 'http://www.capes.gov.br/cooperacao-internacional/canada/programa-capes-dfait', 0, 172, 'Observat�rio', 20150223, '', 'francine.zucco', 'Canada-Brazil Awards - Joint Research Projects (Capes-DFATD)', '3', 0, 1, 7, 1, 4, 1),
(173, 'Visiting Fellowships in Canadian Government Laboratories Program', '2015-02-26', '00035', 'us_EN', '2015', '1900-01-01', '1900-01-01', '1900-01-01', 'The Visiting Fellowships in Canadian Government Laboratories (VF) Program provides promising emerging scientists and engineers with the opportunity to work with research groups or leaders in Canadian government laboratories and research institutions. Fellowships are awarded for one year with the possibility of renewal for a second and third year, at the discretion of the government department concerned.', '$50,503 per year.', 'The candidate must have received a doctoral degree in the natural sciences or engineering from a recognized university within the past five years or, if currently enrolled, must complete within six months.', 'schol@nserc-crsng.gc.ca', '', 'Different disciplines', '', '', '', '', 'There are no deadlines for application to this program; applications are processed and reviewed as they are received.', '', 'A', '', '', 'http://www.nserc-crsng.gc.ca/Students-Etudiants/PD-NP/Laboratories-Laboratoires/index_eng.asp', 0, 173, 'Observat�rio', 20150226, '', 'francine.zucco', 'Visiting Fellowships in Canadian Government Laboratories Program', '1', 1, 1, 35, 2, 2, 1),
(174, '<br>Mitacs Globalink Research Award', '2015-02-20', '00090', 'us_EN', '2015', '2015-06-12', '1900-01-01', '1900-01-01', 'The Globalink Research Award provides an opportunity for faculty at Canadian universities to strengthen existing international research collaborations and connect with colleagues around the world through the mobility of senior undergraduate and graduate students.', 'Up to $5,000 in research award to the Canadian supervisor for student travel expenses', 'Full-time students at Canadian institutions', '', '', 'All disciplines', '', '', '', '', 'Students and their home university academic supervisors (from Canada) must submit Globalink Research Award applications directly to Mitacs by email at intsubmission(at)mitacs.ca', '', 'A', '', '', 'https://www.mitacs.ca/en/programs/globalink/globalink-research-award', 0, 174, 'Observat�rio', 20150224, '', 'francine.zucco', 'Oportunidade para trazer acad�micos canadenses - Mitacs Globalink Research Award', '3', 0, 1, 90, 2, 4, 1),
(175, 'VI Pr�mio Octavio Frias de Oliveira em Oncologia', '2015-02-23', '00091', 'pt_BR', '2015', '1900-01-01', '2015-04-30', '1900-01-01', 'Incentivar e premiar a produ��o de conhecimento nacional na preven��o e combate ao C�ncer. Esse � o objetivo do Pr�mio Octavio Frias de Oliveira que o ICESP - Instituto do C�ncer do Estado de S�o Paulo Octavio Frias de Oliveira, em parceria com o Grupo Folha de S�o Paulo, concede, anualmente, desde 2010.', '1� lugar: R$ 16.000,00', 'Tr�s categorias: <br>1. Personalidade de Destaque em Oncologia; <br>2. Pesquisa em Oncologia - trabalhos originais publicados em revistas cient�ficas nos anos de 2014 e 2015, cujo autor principal atue em Institui��o de Pesquisa e/ou de Ensino nacionais; <br>3. Inova��o Tecnol�gica em Oncologia - trabalhos originais publicados em revistas cient�ficas ou patentes depositadas nos anos de 2013 a 2015, cujo autor/inventor atue em Institui��o de Pesquisa e/ou Ensino nacionais.', 'premio@icesp.org.br', '', 'Oncologia', '', '', '', '', 'A inscri��o poder� ser feita pessoalmente ou por correio. O material enviado deve incluir 4 c�pias do trabalho/patente e a ficha de inscri��o devidamente preenchida, dispon�vel no site.', '', 'A', '', '', 'http://www.icesp.org.br/premio/', 0, 175, 'Observat�rio', 20150223, '', 'francine.zucco', 'VI Pr�mio Octavio Frias de Oliveira em Oncologia', '4', 0, 1, 91, 1, 5, 1),
(176, '<br>XI Edital de Bolsas Universidad de la Rioja', '2015-02-26', '00092', 'pt_BR', 'XI', '2015-03-20', '1900-01-01', '1900-01-01', 'A Universidade de La Rioja, comprometida com o trabalho de difus�o do conhecimento e da L�ngua Espanhola, oferece o programa de Cursos de L�ngua e Cultura Espanholas 2015-2016, dirigido para estudantes e para graduados de Universidades Brasileiras ou com resid�ncia permanente na Rep�blica Federativa do Brasil, que desejam aprender espanhol ou aperfei�oar seus conhecimentos nesta l�ngua.', 'Bolsa de 2 mil euros, al�m do curso de 1 trimestre com foco na l�ngua e cultura espanholas, resid�ncia universit�ria e seguro sa�de.', '1. Ser brasileiro; <br>2. Ser estudante de uma Universidade Brasileira ou que tenha obtido um Diploma Universit�rio (bacharel, licenciatura, p�s-gradua��o, especializa��o, mestrado, doutorado ou p�s-doutorado) expedido por uma Universidade Brasileira nos �ltimos quatro anos; <br>3. N�o residir na Espanha.', '', '', '', '', '', '', '', 'O registro de candidaturas ser� apenas realizado online. Somente os candidatos pr�-selecionados dever�o enviar a documenta��o que lhes seja requisitada.', '', 'A', '', '', 'http://fundacion.unirioja.es/espanol_secciones/view/47/xi-edital-de-bolsas-2015-2016', 0, 176, 'Observat�rio', 20150226, '', 'francine.zucco', 'Curso de l�nguas e cultura espanhola - XI Edital de Bolsas Universidad de la Rioja', '1', 0, 1, 92, 1, 2, 1),
(177, 'Saving Lives at Birth: A Grand Challenge for Development', '2015-03-02', '00093', 'us_EN', '2015', '2015-03-27', '1900-01-01', '1900-01-01', 'This fifth application round seeks prevention and treatment approaches for pregnant women and newborns in poor, hard-to-reach communities around the world, encompassing innovation in science and technology, service delivery, and health care demand. ', '1. Seed Funds to develop and assess the feasibility of innovative ideas - $250,000 USD per project, 2 yrs; <br>2. Validation Funds to introduce and validate the effectiveness of innovations to reach proof-of-concept - $250,000 USD per project, 2 yrs; <br>3. Transition Funds to transition innovations with demonstrated proof-of concept toward scale up - up to $2 million USD per project, 4 yrs.', '', '', '', 'Maternal and newborn health -  Innovative prevention and treatment approaches across three main domains: <br>1. Science and Technology; <br>2. Service delivery; <br>3. Healthcare demand.', '', '', '', '', 'Expressions of Interest (EOI) shall be submitted by March 27. If initial review indicates the EOI merits further consideration , selected organizations or consortia may be invited, individually or in combination, to\r\ndiscuss their proposals with the Saving Lives at Birth partners. This process may result in applicants being invited to submit concept notes and attend the DevelopmentXChange in Washington, DC July 21-22, 2015.', '', 'A', '', '', 'http://savinglivesatbirth.net/', 0, 177, 'Observat�rio', 20150302, '', 'francine.zucco', 'Saving Lives at Birth: A Grand Challenge for Development', '2', 0, 1, 93, 2, 3, 1),
(178, 'Technology to Support Education in Crisis and Conflict Settings Ideation Challenge', '2015-03-02', '00094', 'us_EN', '2015', '2015-03-30', '1900-01-01', '1900-01-01', 'The Seeker is looking for technology--supported approaches for adapting, developing and delivering learner-centered educational materials for learners in crisis and conflict situations where formal schooling has been interrupted and infrastructure and trained, in-person human resources are extremely limited.', 'The total payout will be up to $50,000, with at least one award in each of the three categories being no smaller than $5,000 and no other award being smaller than $1,500.', 'The Ideation Challenge is looking for technology-supported approaches to provide basic education in one or more of the following crisis or conflict situations: Health Crisis, Natural Disaster, and Conflict Zone. Proposed Solutions should be usable within the first six months after the onset of the crisis or conflict and be usable within the context of a developing country.', 'grandchallenges@innocentive.com', '', 'Approaches to improve access to quality education in crisis and/or conflict situations', '', '', '', '', '', '', 'A', '', '', 'https://www.omnicompete.com/crisisandconflictedtech.html', 0, 178, 'Observat�rio', 20150302, '', 'francine.zucco', 'All Children Reading: A Grand Challenge for Development', '4', 0, 1, 94, 2, 5, 1),
(179, 'Tracking and Tracing Books Prize Competition', '2015-03-03', '00094', 'pt_BR', '2015', '2015-04-01', '1900-01-01', '1900-01-01', 'This Tracking & Tracing Books Prize Competition seeks innovations to track books destined for early-grade classrooms and learning centers in low-income countries and allow stakeholders, ranging from parents to Ministries of Education and donor agencies, to quickly and easily access tracking information. ', '$20,000 (phase 1) and $100,000 awarded at the completion of Phase 3.', 'Innovations should have four main components: <BR>1. A process for tracking and tracing books; <BR>2. Associated software; <BR>3. Associated hardware and devices; <br>4. A method for engaging/easily interfacing with users.', 'grandchallenges@innocentive.com', '', 'Innovations to track books', '', '', '', '', 'There are three phases to this Prize Competition. The first phase requires a written description of the proposed innovation and the expertise and experience of the Solver. Entrants successful in Phase 1 will be invited to refine and/or develop their innovation and work with the ACR GCD partners to pilot it in Phases 2 and 3.', '', 'A', '', '', 'https://www.omnicompete.com/trackingandtracingbooks.html', 0, 179, 'Observat�rio', 20150303, '', 'francine.zucco', 'Tracking and Tracing Books Prize Competition', '4', 0, 1, 94, 1, 5, 1),
(180, 'Grand Challenges Explorations <br>Round 15', '2015-03-03', '00057', 'us_EN', 'Round 15', '2015-05-13', '1900-01-01', '1900-01-01', 'GCE is an extension of the Bill & Melinda Gates Foundation�s commitment to the Grand Challenges in Global Health, which was launched in 2003 to accelerate the discovery of new technologies to improve global health. GCE has since expanded to include global development and communications challenges.', 'Awards of $100,000 USD are made in Phase I. Phase I awardees have one opportunity to apply for a follow-on Phase II award of up to $1,000,000 USD.', 'Your proposal must demonstrate an innovative approach that complies with all restrictions and guidelines for the topic to which you are applying.', 'GCEhelp@gatesfoundation.org', '', 'Topics: <br>1. Addressing Newborn and Infant Gut Health Through Bacteriophage-Mediated Microbiome Engineering; <br>2. Explore New Ways to Measure Delivery and Use of Digital Financial Services Data; <br>3. Surveillance Tools, Diagnostics and an Artificial Diet to Support New Approaches to Vector Control; <br>4. New Approaches for Addressing Outdoor/Residual Malaria Transmission; <br>5. New Ways to Reduce Childhood Pneumonia Deaths Through Delivery of Timely Effective Treatment; <br>6. Enable Merchant Acceptance of Mobile Money Payments.', '', '', '', '', 'An applicant must submit under only one topic each round and may submit only one proposal. You are required to submit either the application form in Microsoft Word or PDF format; no more than two pages in length.', '', 'A', '', '', 'http://gcgh.grandchallenges.org/Explorations/Pages/ApplicationInstructions.aspx', 0, 180, 'Observat�rio', 20150303, '', 'francine.zucco', 'Grand Challenges Explorations Round 15', '2', 0, 1, 57, 2, 3, 1),
(181, '<br>Pesquisa P�s-doutoral - Bolsas Capes', '2015-03-03', '00007', 'pt_BR', '2015', '2015-05-30', '1900-01-01', '1900-01-01', 'O Programa de Pesquisa P�s-doutoral visa oferecer bolsa no exterior para a realiza��o de estudos avan�ados ap�s o doutorado e destina-se a pesquisadores ou docentes com menos de oito anos de forma��o doutoral, visando � internacionaliza��o de forma mais consistente, aprimorando sua produ��o e qualifica��o cient�ficas, funcionando como atividade de treinamento pr�tico e avan�ado em pesquisa, desenvolvendo m�todos e trabalhos te�ricos-emp�ricos em parceria com pesquisadores estrangeiros de reconhecido m�rito cient�fico.', 'Mensalidade e aux�lios', 'O candidato ao programa dever�: <br>1. ter nacionalidade brasileira; <br>2. ter obtido o t�tulo de doutorado h� menos de oito anos; <br>3. residir no Brasil e demonstrar atua��o em atividade de doc�ncia ou pesquisa, compat�veis com o tempo de atua��o como doutor; <br>4. n�o ter realizado no exterior trabalhos da mesma natureza dos definidos por este regulamento nos �ltimos tr�s anos.', '', '', 'Diversas �reas do conhecimento', '', '', '', '', 'As inscri��es ser�o gratuitas e efetuadas por meio de preenchimento do formul�rio de inscri��o, dispon�vel no link da Capes.', '', 'A', '', '', 'http://www.capes.gov.br/bolsas/bolsas-no-exterior/pesquisa-pos-doutoral-no-exterior', 0, 181, 'Observat�rio', 20150304, '', 'francine.zucco', 'Pesquisa P�s-doutoral - Bolsas Capes', '1', 0, 1, 7, 1, 2, 1),
(182, 'DST/Wageningen fellowships in dairy chain', '2015-03-04', '00095', 'us_EN', '2015', '2015-05-01', '1900-01-01', '1900-01-01', 'Scholarships for encouraging talented students to follow a two years master�s programme Dairy Science and Technology at Wageningen University. The objective is to obtain new knowledge about the composition of milk (products) throughout the dairy chain to create new options for adding value to milk and its components.', '10, 000 euros per year', '1. Relevant BSc (Food Science, Food Technology, Biotechnology, Nutrition, Chemical Technology or similar); <br>2. gpa > 80% of Maximum scale; <br>3. English level TOEFL 550, IELTS 6.0 or equivalent; <br>4. Students must have been approved for admission to Wageningen University for the MSc Food Technology; <br>5. Only prospective first year students may apply; <br>6. Applicants are preferably under the age of 30.', '', '', 'The whole dairy chain with focus on milk and milk components.', '', '', '', '', 'Applications (motivation letter, CV, study results and GPA score, and a copy of the confirmation of your admission to Wageningen University) should be send as pdf files by email to Hein van Valenberg of the Dairy Science and Technology Group.', '', 'A', '', '', 'http://www.wageningenur.nl/en/Research-Results/Projects-and-programmes/Dairy/Education/Fellowships.htm', 0, 182, 'Observat�rio', 20150304, '', 'francine.zucco', 'DST/Wageningen fellowships in dairy chain', '1', 0, 1, 95, 2, 2, 1),
(183, 'Healthy Cities and Energy-Environment-Food Security Nexus', '2015-03-09', '00048', 'us_EN', '2015', '2015-03-13', '1900-01-01', '1900-01-01', 'The Newton Fund with the support of CONFAP and CNPq is inviting applications from scientists based in Brazil to attend a jointly organised workshop with ESRC ? Economics and Social Science Research Council in London, UK, on 13 - 14 April 2015, followed by an agenda of 2 days of visits and meetings in Scotland.', 'The Newton Fund will fund International Flights tickets in economy class, accommodation in the UK from 12th April until 17th April, transportation within the UK, including transfer from/to airport and also breakfast.', '', '', '', 'Healthy Cities and Energy-Environment-Food Security', '', '', '', '', 'To attend the workshop you must complete the expression of interest (?EoI?) form. The form, together with a CV of no more than two sides of A4, should be sent to brazil.newtonfund@fco.gov.uk by 23:59 (Bras�lia Time) on Friday 13th March 2015. To receive the form, please contact Observat�rio PD&I.', '', 'A', '', '', '', 0, 183, 'Observat�rio', 20150309, '', 'francine.zucco', 'Oportunidade para participar de workshop no UK - Healthy Cities and Energy-Environment-Food Security', '1', 0, 1, 48, 2, 2, 1),
(184, 'TWAS-USM Fellowships for Visiting Researchers in Malaysia', '2015-03-10', '00080', 'us_EN', '2015', '2015-09-15', '1900-01-01', '1900-01-01', 'For scientists from developing countries (other than Malaysia) who wish to pursue advanced research in natural sciences. TWAS-USM Visiting Researchers Fellowships in natural sciences are tenable for a minimum period of one month to a maximum of three months at a school/department of the Universiti Sains Malaysia (USM).', 'USM will provide a standard monthly allowance which should be used to cover living costs, such as accommodation and food. ', 'Applicants must: <br>1. Be a maximum age of 55 years; <br>2. Be nationals of a developing country; <br>3. Must not hold any visa for temporary or permanent residency in Malaysia or any developed country; <br>4. Hold a PhD degree in a field of the natural sciences and a regular research assignment with at least five years of postdoctoral research experience; <br>5. Provide an official Preliminary Acceptance Letter from the Institute of Postgraduate Studies (IPS), USM to TWAS.', 'fellowships@twas.org', '', 'Natural Sciences', '', '', '', '', 'Applicants must submit the preliminary acceptance letter from the Institute of Postgraduate Studies (IPS), USM when applying to TWAS or by the deadline at the latest. The deadline for submitting applications to USM is 2 August 2015.', '', 'A', '', '', 'http://twas.org/opportunity/twas-usm-fellowships-visiting-researchers-malaysia', 0, 184, 'Observat�rio', 20150310, '', 'francine.zucco', 'TWAS-USM Fellowships for Visiting Researchers in Malaysia', '1', 0, 1, 80, 2, 2, 1),
(185, '<br>Bilateral Exchange of Academics', '2015-03-10', '00076', 'us_EN', '2015', '2015-04-01', '1900-01-01', '1900-01-01', 'To improve international relations and bilateral research cooperations between German and foreign universities, the DAAD supports exchanges of scientists and academics from partner countries. The basis of these exchanges are cultural exchange programmes and bilateral agreements with foreign partner organisations.', 'Research stays at state or state-recognized institutions of higher education or non-university research institutes in Germany.', 'Foreign academics and scientists who have usually completed a doctoral degree and work at a university or research institute in their home country. The dates and purpose of the stay must be agreed beforehand with the academic host institute in Germany', 'info@daad.org.br', '', 'All disciplines', '', '', '', '', 'The application procedure occurs online through the DAAD portal. You are also required to send 1 copy/copies of the "Application summary" (PDF file), which is generated in the DAAD portal after the online application procedure has been completed, by post to the application address.', '', 'A', '', '', 'http://goo.gl/qbJC7j', 0, 185, 'Observat�rio', 20150310, '', 'francine.zucco', 'Bilateral Exchange of Academics - DAAD', '3', 0, 1, 76, 2, 4, 1);
INSERT INTO `fomento_edital` (`id_ed`, `ed_titulo`, `ed_dt_create`, `ed_agencia`, `ed_idioma`, `ed_chamada`, `ed_dt_deadline_elet`, `ed_dt_deadline_envio`, `ed_dt_previsao_divulg_res`, `ed_texto_1`, `ed_texto_2`, `ed_texto_3`, `ed_texto_4`, `ed_texto_5`, `ed_texto_6`, `ed_texto_7`, `ed_texto_8`, `ed_texto_9`, `ed_texto_10`, `ed_texto_11`, `ed_texto_12`, `ed_status`, `ed_autor`, `ed_corpo`, `ed_url_externa`, `ed_total_visualizacoes`, `ed_codigo`, `ed_local`, `ed_data_envio`, `ed_document_require`, `ed_login`, `ed_titulo_email`, `ed_edital_tipo`, `ed_fluxo_continuo`, `fdis_id`, `fag_id`, `i_id`, `ftp_id`, `fs_id`) VALUES
(186, 'TWAS Fellowships for Research and Advanced Training', '2015-03-11', '00080', 'us_EN', '2015', '2015-10-01', '1900-01-01', '1900-01-01', 'TWAS offers fellowships to young scientists in developing countries to enable them to spend three to 12 months at a research institution in a developing country other than their own. The purpose of these fellowships is to enhance the research capacity of promising scientists, especially those at the beginning of their research career, helping them to foster links for further collaboration.', 'TWAS covers international low-cost airfare plus a contribution towards subsistence amounting to a maximum of USD 300 per month. The host institution is expected to provide accommodation and food as well as research facilities.', '1. The fellowships are for research and advanced training. They are offered to young scientists holding at least an MSc or equivalent degree. <br>2. Eligible applicants for the fellowships are young scientists working in any area of natural sciences who are citizens of a developing country and are employed by a research institution in a developing country; <br>3. There is no age limit. However, preference is given to young scientists at the beginning of their research career.', '', '', 'All disciplines', '', '', '', '', 'Part 1 of the application form should be completed by the applicant and the head of the applicant�s HOME institution, and sent to the TWAS secretariat. <br>Part 2 must be sent by the applicant to the head of the institution he/she intends to visit, together with a copy of Part 1 (for information). Part 2 should then be completed by the head of the host institution and sent to the TWAS secretariat.', '', 'A', '', '', 'http://twas.org/opportunity/twas-fellowships-research-and-advanced-training', 0, 186, 'Observat�rio', 20150311, '', 'francine.zucco', 'TWAS Fellowships for Research and Advanced Training', '1', 0, 1, 80, 2, 2, 1),
(187, '<br>Bolsas no exterior', '2015-03-12', '00005', 'pt_BR', '2015', '2015-04-23', '1900-01-01', '1900-01-01', 'As bolsas no exterior oferecidas pelo CNPq s�o destinadas � forma��o de estudantes e ao aprimoramento de pesquisadores em institui��es estrangeiras conceituadas.', 'Mensalidade; aux�lio instala��o; seguro sa�de; aux�lio deslocamento.', 'Modalidades: <br>1. P�s-Doutorado no Exterior (PDE); <br>2. Doutorado Sandu�che (SWE); <br>3. Est�gio Senior no Exterior (ESN); <br>4. Doutorado no exterior (GDE).\r\n<br> Veja tamb�m em http://www.cienciasemfronteiras.gov.br/', '', '', 'Diversas �reas do conhecimento', '', '', '', '', 'As propostas dever�o ser submetidas por meio de formul�rio eletr�nico de propostas, dispon�vel na Plataforma Carlos Chagas.', '', 'A', '', '', 'http://www.cnpq.br/view/-/journal_content/56_INSTANCE_0oED/10157/515690', 0, 187, 'Observat�rio', 20150312, '', 'francine.zucco', 'Bolsas no exterior - CNPq', '1', 0, 1, 5, 1, 2, 1),
(188, '<br>Bolsas individuais no pa�s', '2015-03-12', '00005', 'pt_BR', '2015', '2015-04-23', '1900-01-01', '1900-01-01', 'V�rias modalidades de bolsas s�o oferecidas a jovens de ensino m�dio e superior, em n�vel de p�s-gradua�ao, interessados em atuar na pesquisa cientifica, e a especialistas para atuarem em pesquisa e desenvolvimento nas empresas e centros tecnol�gicos.', 'Mensalidade, aux�lios e taxas.', 'Modalidades: <br>1. Pesquisador Visitante - PV\r\n<br>2. P�s-doutorado J�nior - PDJ\r\n<br>3. P�s-doutorado S�nior - PDS\r\n<br>4. P�s-doutorado Empresarial - PDI\r\n<br>5. Doutorado-Sandu�che no Pa�s - SWP\r\n<br>6. Doutorado-Sandu�che Empresarial - SWI\r\n<br>7. Pesquisador Visitante - PV (Pesquisador residente no exterior)', '', '', 'Diversas �reas do conhecimento', '', '', '', '', 'As propostas dever�o ser submetidas por meio de formul�rio eletr�nico de propostas, dispon�vel na Plataforma Carlos Chagas.', '', 'A', '', '', 'http://www.cnpq.br/view/-/journal_content/56_INSTANCE_0oED/10157/100343', 0, 188, 'Observat�rio', 20150312, '', 'francine.zucco', 'Bolsas individuais no pa�s', '1', 0, 1, 5, 1, 2, 1),
(189, 'Joint Japan World Bank Graduate Scholarship Program', '2015-03-13', '00096', 'us_EN', 'JJ/WBGSP', '2015-03-19', '1900-01-01', '1900-01-01', 'The  Joint Japan World Bank  Graduate Scholarship Program (JJ/WBGSP) sponsors students from developing countries to pursue graduate studies leading to a master?s degree from preferred and partner universities around the world. Scholars are expected to return home to contribute to the development of their country.', 'The scholarship provides travel costs between your home country and the host university, tuition for your graduate program, the cost of basic medical insurance, a monthly subsistence allowance to cover living expenses, including books.', 'The candidate must: <br>1. be a developing country national; <br>2. not be a dual citizen of any developed country; <br>3. hold a Bachelor?s degree (or equivalent university degree) earned before 2012; <br>4. have at least 3 years of development-related experience since earning a Bachelor?s degree; <br>5. must commit to returning backhome after graduation.', 'scholarshipapplicants@worldbank.org', '', 'Different disciplines', '', '', '', '', '', '', 'A', '', '', 'http://goo.gl/6GMEHH', 0, 189, 'Observat�rio', 20150313, '', 'francine.zucco', 'Joint Japan World Bank Graduate Scholarship Program', '1', 0, 1, 96, 2, 2, 1),
(190, 'L�OR�AL/UNESCO/ABC Para Mulheres na Ci�ncia', '2015-03-25', '00097', 'pt_BR', '2015', '2015-05-31', '1900-01-01', '1900-01-01', 'Primeiro programa dedicado a mulheres cientistas no mundo, o L?Or�al-UNESCO For Women in Science foi fundado em 1998, na firme convic��o de que o mundo precisa de ci�ncia e a ci�ncia precisa de mulheres. � com este prop�sito que todos os anos o Programa identifica, recompensa, incentiva e coloca sob os holofotes excepcionais cientistas de todos os continentes.', 'O valor de cada Bolsa-aux�lio � o equivalente a US$ 20.000, convertidos em reais, para aplica��o em 12 meses.', 'O Programa de Bolsa-aux�lio visa apoiar projetos cient�ficos vi�veis e de alto valor a serem desenvolvidos durante 12 meses por pesquisadoras que tenham resid�ncia est�vel no Brasil, por no m�nimo h� 4 anos, e desenvolvam projetos de pesquisa em institui��es nacionais. <br>As Bolsas-aux�lio destinam-se a pesquisadoras que tenham conclu�do o\r\ndoutorado a partir de 01/01/2009 e com curr�culo Lattes atualizado.', '', '', 'Ci�ncias F�sicas, Ci�ncias Biom�dicas, Biol�gicas e da Sa�de, Ci�ncias Matem�ticas e Ci�ncias Qu�micas.', '', '', '', '', 'A candidatura dever� incluir os documentos referidos no Formul�rio de Inscri��o Eletr�nico dispon�vel no site www.paramulheresnaciencia.com.br', '', 'A', '', '', 'http://www.paramulheresnaciencia.com.br/', 0, 190, 'Observat�rio', 20150325, '', 'francine.zucco', 'Pr�mio L�OR�AL/UNESCO/ABC Para Mulheres na Ci�ncia', '4', 0, 1, 97, 1, 5, 1),
(191, 'Programa de Capacita��o em Taxonomia ? PROTAX - 01/2015', '2015-03-25', '00005', 'pt_BR', '01/2015', '2015-05-08', '1900-01-01', '1900-01-01', 'Apoiar projetos de pesquisa cient�fica e tecnol�gica que visem contribuir significativamente para o desenvolvimento cient�fico e tecnol�gico do Pa�s, dando continuidade e fortalecendo o Programa Especial de Capacita��o em Taxonomia ? PROTAX, por meio da forma��o de recursos humanos especializados em Taxonomia para atua��o em invent�rios, curadorias e gest�o das cole��es biol�gicas brasileiras, de forma a estimular e desenvolver a capacidade taxon�mica instalada do Pa�s, visando a amplia��o do conhecimento sobre a biodiversidade brasileira.', 'At� R$ 250.000,00 em bolsas modalidades Apoio T�cnico (AT), Inicia��o Cient�fica (IC), Mestrado (GM), Doutorado (GD) e P�s-Doutorado Junior (PDJ).', 'O proponente deve: <br>1. possuir o t�tulo de doutor e ter curr�culo cadastrado na Plataforma Lattes;  <br>2. ser obrigatoriamente o coordenador do projeto; <br>3.  ser obrigatoriamente o coordenador do projeto; <br>4. estar credenciado a um PPG stricto atuando formalmente na forma��o de recursos humanos em Taxonomia nas �reas de Bot�nica. <br>A proposta deve estar claramente enquadrada como pesquisa Taxon�mica nas �reas da Bot�nica, da Zoologia e/ou da Microbiologia e que vise formar recursos humanos para trabalhos em Taxonomia para atua��o em cole��es biol�gicas, invent�rios, revis�es taxon�micas e outras a��es que exijam conhecimentos especializados; desenvolver a capacidade da ci�ncia Taxon�mica instalada no Pa�s para ampliar o conhecimento sobre a biodiversidade brasileira em conformidade com as pol�ticas de biodiversidade, bem como contribuir para a redu��o do impedimento taxon�mico; Zoologia e/ou Microbiologia.', 'taxonomia@cnpq.br', '', 'Taxonomia', '', '', '', '', 'As propostas devem ser acompanhadas de arquivo contendo o projeto e devem ser encaminhadas ao CNPq exclusivamente via Internet, utilizando-se do Formul�rio de Propostas online, dispon�vel na Plataforma Integrada Carlos Chagas.', '', 'A', '', '', 'http://goo.gl/GXL6dB', 0, 191, 'Observat�rio', 20150325, '', 'francine.zucco', 'Programa de Capacita��o em Taxonomia ? PROTAX - 01/2015', '2', 0, 1, 5, 1, 3, 1),
(192, 'Pr�mio Jos� Reis de Divulga��o Cient�fica e Tecnol�gica', '2015-03-25', '00005', 'pt_BR', '2015', '1900-01-01', '2015-05-22', '1900-01-01', 'Destinado �s iniciativas que contribuam significativamente para tornar a Ci�ncia, a Tecnologia e a Inova��o conhecidas do grande p�blico, o pr�mio � concedido anualmente pelo CNPq desde 1978. Em 2015 a modalidade � "Institui��o ou Ve�culo de Comunica��o" e vai premiar a institui��o ou ve�culo de comunica��o coletivo que tenha tornado acess�vel, ao p�blico, conhecimento sobre Ci�ncia, Tecnologia, Inova��o e seus avan�os.', 'A institui��o ou ve�culo de comunica��o receber� diploma e passagem a�rea e hospedagem para participar da cerim�nia de entrega do pr�mio na Reuni�o Anual da Sociedade Brasileira para o Progresso da Ci�ncia (SBPC).', '', 'pjr@cnpq.br', '', 'Comunica��o', '', '', '', '', 'A inscri��o ser� feita pelo dirigente institucional ou por seu representante legal. Comunicar ao Observat�rio (pdi@pucpr.br) o interesse em participar deste pr�mio para articula��o institucional.', '', 'A', '', '', 'http://www.premiojosereis.cnpq.br/', 0, 192, 'Observat�rio', 20150325, '', 'francine.zucco', 'Pr�mio Jos� Reis de Divulga��o Cient�fica e Tecnol�gica', '4', 0, 1, 5, 1, 5, 1),
(193, 'New Zealand Development Scholarships (NZDS)', '2015-03-25', '00098', 'us_EN', '2015', '2015-07-31', '1900-01-01', '1900-01-01', 'The New Zealand Development Scholarships (NZDS) offers the opportunity for international students from selected developing countries to study in New Zealand to gain knowledge and skills through post-graduate study in specific subject areas that will assist in the development of their home country.', 'The scholarships include a fortnightly living allowance, an establishment allowance, medical and travel insurance, travel to and from your home country at the start and end of your scholarship, home leave or reunion travel for some students, and assistance with research and thesis costs for most postgraduate research students.', 'Applicants must meet the following conditions: <BR>1. Be a minimum of 18 years of age at the time of commencing your scholarship; <BR>2. Be a citizen of the country from which you are applying for a scholarship and have resided in that country for at least the last two years; <BR>3. Agree to return to your home country for a minimum of two years on completion of the scholarship; <BR>4. Have at least 2 years of work experience (part time or fulltime, paid or voluntary); <BR>5. Be academically and linguistically able to obtain an Offer of Place for the proposed programme of study from the tertiary institute where you will undertake your scholarship.', '', '', 'Subject areas that are relevant to the sustainable development needs of your country (i.e. renewable energy, agriculture, fisheries, disaster risk management, natural resource management, health, and education).', '', '', '', '', 'You must first apply for an Offer of Place (admission) at your preferred New Zealand institution. Once you have a confirmed Offer of Place, you must submit the completed NZDS application form together with your essay and supporting documents by 31 July 2015 to the address indicated at the NZDS page specific to your country.', '', 'A', '', '', 'http://www.aid.govt.nz/funding-and-contracts/scholarships/types-scholarship/new-zealand-development-scholarships', 0, 193, 'Observat�rio', 20150327, '', 'francine.zucco', 'New Zealand Development Scholarships (NZDS)', '1', 0, 1, 98, 2, 2, 1),
(194, 'Universit� Paris-Saclay International Master?s Scholarships', '2015-03-25', '00099', 'us_EN', '2015-16', '2015-05-17', '1900-01-01', '1900-01-01', 'The Universit� Paris-Saclay would like to give foreign students access to its master?s (nationally-certified degree) programs provided in its member establishments and to make it easier for highly-qualified foreign students to attend its University especially those wishing to develop an academic project through research up to the doctoral level. The scholarships are open to students wishing to obtain a master?s degree in one of Paris-Saclay University?s member establishments (entering an M1 or an M2 directly). The scholarships does not apply to internships and work-study programs.', 'The Universit� Paris-Saclay scholarship is 10,000? per year awarded by the establishment the candidate is registered in for the duration of the academic year and for a period of no less than 10 consecutive months per year. <br>A maximum of 1,000? for travel and VISA expenses is also awarded depending on the candidate?s country of origin.', 'The program is available for first-time arrivals, aged 30 years old or less the year of acceptance and only applies to non-French national students.', '', '', 'List of master?s programs available at the Universit� Paris-Saclay: http://www.universite-paris-saclay.fr/en/formation/masters', '', '', '', '', 'Students must first submit their candidature for a master at Universit� Paris-Saclay. At the paragraphe "Grant" they should specify: Bourse Internationale de master Paris-Saclay\r\n<br>The candidates accepted to run for the final selection will be directly contacted by the professor in charge of the master.', '', 'A', '', '', 'http://goo.gl/kHGM7b', 0, 194, 'Observat�rio', 20150326, '', 'francine.zucco', 'Universit� Paris-Saclay International Master?s Scholarships', '1', 0, 1, 99, 2, 2, 1),
(195, '<br>TWAS-Lenovo Science Prize', '2015-03-26', '00080', 'us_EN', '2015', '1900-01-01', '2015-04-30', '1900-01-01', 'The rapid growth Lenovo has recently experienced in emerging markets has prompted the company to partner with TWAS to launch a high-level prize to give international recognition and visibility to individual scientists in the developing world for their outstanding scientific achievements.', ' The TWAS-Lenovo Science Prize will carry a monetary award of USD100,000 provided by Lenovo, as well as a medal and a certificate highlighting the recipient�s major contributions to science.', 'Candidates must be nationals of a developing country and must have lived and worked in a developing country for the last 10 years. The prizes will only be awarded to individuals for scientific research of outstanding international merit carried out at institutions in developing countries.', 'prizes@twas.org', '', 'Mathematics', '', '', '', '', 'Additional information and nomination forms are available from the TWAS Secretariat. Nominations for the 2015 prize should reach the TWAS Secretariat by 30 April 2015.', '', 'A', '', '', 'http://twas.org/opportunity/twas-lenovo-science-prize', 0, 195, 'Observat�rio', 20150326, '', 'francine.zucco', 'TWAS-Lenovo Science Prize', '4', 0, 1, 80, 2, 5, 1),
(196, '7� Pr�mio de Projetos Inovadores', '2015-04-01', '00100', 'pt_BR', '07/2015', '2015-04-10', '2015-04-10', '1900-01-01', 'O Senai, o Sindimetal Londrina e o Sinduscon Norte PR realizar�o o 7� Pr�mio de Projetos Inovadores com\r\nAplicabilidade na Ind�stria Metal�rgica, Mec�nica, Eletr�nica, Materiais El�tricos e Constru��o Civil. A edi��o\r\n2015 do referido Pr�mio ser� realizada nos dias 6 e 7 de maio, na estrutura do Senai em Londrina (Rua Bel�m n�\r\n844), no hor�rio das 16h �s 22h, durante o ?F�rum EletroMetalCon 2015 ? Inova��es e Tecnologias Aplicadas na\r\nInd�stria.', 'Autores e orientadores dos projetos expostos participam da Festa e da solenidade de premia��o do 7� Pr�mio\r\nde Projetos Inovadores com Aplicabilidade na Ind�stria. S�o R$ 18 mil em premia��o, assim divididos: ao primeiro\r\nlugar ser� concedido o valor de R$ 10.000,00. O segundo lugar ser� contemplado com R$ 5.000,00 e o terceiro lugar\r\nreceber� a premia��o de R$ 3.000,00.', 'Uma comiss�o julgadora - dentre todos os projetos inscritos ? selecionar� 03 (tr�s) projetos que ficar�o\r\nexpostos durante o F�rum EletroMetalCon 2015, nos dias 6 e 7 de maio. Durante o evento, os tr�s projetos expostos\r\npassar�o por nova avalia��o, que ser� feita por 30 profissionais especialmente convidados para pontuarem (atrav�s\r\nvota��o secreta e depositada em urna) os projetos que - de seu ponto de vista ? devam receber o 1�, 2� e 3� lugar.\r\nO resultado da respectiva premia��o somente ser� divulgada no dia 29 de maio/2015, durante a Festa em\r\nComemora��o ao Dia da Ind�stria, no Buffet Planalto em Londrina.', 'Informa��es: Senai ? Londrina (43) 3294.5134 ? 3294.5133', '', '', '', '', '', '', '', 'pdi@pucpr.br', 'A', '', '', '', 0, 196, 'Observat�rio', 20150401, '', 'jeferson.vieira', '7� Pr�mio de Projetos Inovadores', '4', 0, 1, 100, 1, 5, 1),
(197, '<br>Doutorado Capes/DAAD/CNPq - 2015/2016', '2015-04-07', '00007', 'pt_BR', '07/2015', '2015-05-15', '1900-01-01', '1900-01-01', 'A iniciativa tem por objetivo apoiar candidatos com excelente qualifica��o cient�fica e acad�mica para realiza��o de doutorado pleno, de duplo doutorado e de doutorado sandu�che na Alemanha. O programa � fruto de parceria entre a Capes, o Conselho Nacional de Desenvolvimento Cient�fico e Tecnol�gico (CNPq) e o Servi�o Alem�o de Interc�mbio Acad�mico (DAAD).', 'Al�m do curso de alem�o oferecido pelo DAAD (com dura��o de 2 a 6 meses, conforme necessidade do candidato), a bolsa concedida pela CAPES inclui mensalidades no exterior, passagem a�rea internacional de ida/volta ou aux�lio deslocamento (a crit�rio da Capes) e aux�lio seguro sa�de.', '1. Ser cidad�o brasileiro; <br>2. Ter cursado o mestrado em curso credenciado pela Capes, conclu�do ou em fase de conclus�o at� o final do 1� semestre de 2015; <br>3. Ter qualifica��o acad�mica acima da m�dia; <br>4. Apresentar plano de trabalho sobre o estudo que pretende realizar; <br>5. Ter confirma��o de orienta��o cient�fica na Alemanha; <br>6. Para o Duplo-Doutorado, � necess�rio que no regulamento da p�s-gradua��o, tanto da universidade brasileira quanto da alem�, esteja prevista essa possibilidade.', '', '', 'Diversas �reas do conhecimento', '', '', '', '', 'As candidaturas devem ser apresentadas por meio do formul�rio eletr�nico dispon�vel na plataforma Carlos Chagas, localizada na p�gina do CNPq. Uma vers�o da documenta��o dever� ser encaminhada por correio para o escrit�rio do DAAD, no Rio de Janeiro.', '', 'A', '', '', 'http://capes.gov.br/cooperacao-internacional/alemanha/doutorado-capes-daad-cnpq', 0, 197, 'Observat�rio', 20150401, '', 'francine.zucco', 'Doutorado Capes/DAAD/CNPq - 2015/2016', '1', 0, 1, 7, 1, 2, 1),
(198, '<br>Bolsas Ibero-Americanas 2015', '2015-04-07', '00044', 'pt_BR', '2015', '2015-05-10', '2015-05-11', '1900-01-01', 'Lan�ado em 2011, o Programa de Bolsas Ibero-Americanas � uma iniciativa criada para um per�odo de 5 anos (2011 � 2015) com o objetivo de promover o interc�mbio acad�mico anual de estudantes de gradua��o entre universidades de 9 pa�ses da regi�o da Ibero-Am�rica: Brasil, Argentina, Espanha, Chile, Col�mbia, M�xico, Portugal, Porto Rico e Uruguai.', '3.000 mil euros por aluno como bolsa-aux�lio para cobrir custos com transporte, hospedagem e alimenta��o.', '1. Estar regularmente matriculado(a) em um curso de gradua��o da PUCPR, tendo conclu�do, at� o in�cio do interc�mbio o 4� per�odo do curso; <br>2. Possuir IRA igual ou superior a 7,0; <br>3. N�o possuir mais que uma reprova��o; <br>4.  Realizar a pr�-inscri��o no site do Santander Universidades; <br>5. Comprovar conhecimento do idioma espanhol (B1), para institui��es de l�ngua espanhola, mediante realiza��o do teste de Espanhol organizado pelo N�cleo de Interc�mbio no dia 12/05/2015 �s 14h; <br>6. Realizar o pagamento da taxa de inscri��o de R$80,00.', 'intercambio@pucpr.br', '', 'Diversas �reas do conhecimento', '', '', '', '', 'O candidato deve preencher o formul�rio de inscri��o dispon�vel no link abaixo, imprimi-lo e entregar na Coordena��o de Mobilidade da PUCPR at� 11/05/2015.', '', 'A', '', '', 'http://www.pucpr.br/intercambio/noticia.php?ref=12751&id=2015-04-06_56563', 0, 198, 'Observat�rio', 20150408, '', 'francine.zucco', 'Santander Universidades - Bolsas Ibero-Americanas 2015', '1', 0, 1, 44, 1, 2, 1),
(199, '<br>Apoio a Eventos Cient�ficos em Sa�de', '2015-04-08', '00101', 'pt_BR', '2015', '2015-04-30', '1900-01-01', '1900-01-01', 'O apoio ir� viabilizar e facilitar a dissemina��o de novos conhecimentos e tecnologias que apresentem alto impacto na solu��o de problemas de sa�de, garantir um maior interc�mbio cient�fico entre pesquisadores e gestores na �rea da sa�de e aumentar a visibilidade do Minist�rio da Sa�de junto � comunidade cient�fica e tecnol�gica e � sociedade. Al�m disso, o evento a ser apoiado deve estar em conson�ncia com a Pol�tica Nacional de Ci�ncia, Tecnologia e Inova��o em Sa�de e com a Agenda Nacional de Prioridades de Pesquisa em Sa�de.', 'De 15 a 50 mil reais', 'Podem participar entidades p�blicas ou privadas, sem car�ter lucrativo, que queiram realizar eventos de car�ter t�cnico-cient�fico na �rea da sa�de entre 15 de julho a 15 de dezembro de 2015. \r\n<br>A proposta deve estar em conson�ncia com a Pol�tica Nacional de Ci�ncia, Tecnologia e\r\nInova��o em Sa�de e com o Plano Nacional de Sa�de  e ter relev�ncia para o SUS e para as pol�ticas de sa�de no n�vel local, regional ou nacional.', 'deciteventos@saude.gov.br', '', 'Sa�de', '', '', '', '', 'As inscri��es ser�o feitas por meio de formul�rio eletr�nico dispon�vel no site do Minist�rio da Sa�de.', '', 'A', '', '', 'http://portal2.saude.gov.br/sisct/', 0, 199, 'Observat�rio', 20150408, '', 'francine.zucco', 'Apoio a Eventos Cient�ficos em Sa�de - Minist�rio da Sa�de', '5', 0, 1, 101, 1, 6, 1),
(200, 'Pr�mio Fern�o Mendes Pinto 2015', '2015-04-10', '00102', 'pt_BR', '2015', '2015-07-31', '1900-01-01', '1900-01-01', 'Agraciar uma disserta��o de mestrado ou de doutorado que contribua para a aproxima��o dos integrantes da Comunidade dos Pa�ses de L�ngua Portuguesa (CPLP), explicitando as rela��es entre as comunidades de, pelo menos, dois pa�ses.', '8.000 Euros', 'A disserta��o ou tese a submeter, escrita em portugu�s, tem que ter sido defendida durante o ano anterior ao da candidatura.', 'aulp@aulp.org', '', 'L�ngua Portuguesa', '', '', '', '', 'As propostas dever�o ser apresentadas por Institui��es de Ensino Superior ou Institutos de Investiga��o Cient�fica de pa�ses de l�ngua portuguesa. Para indica��o de uma tese/diserta��o, entre em contato com o Observat�rio.', '', 'A', '', '', 'http://aulp.org/node/112683', 0, 200, 'Observat�rio', 20150410, '', 'francine.zucco', 'Pr�mio Fern�o Mendes Pinto 2015 - L�ngua Portuguesa', '4', 0, 1, 102, 1, 5, 1),
(201, '<br>Pr�mio Capes de Tese 2015', '2015-04-10', '00007', 'pt_BR', '08/2015', '2015-05-15', '1900-01-01', '1900-01-01', 'O Pr�mio Capes de Tese 2015 ser� outorgado para a melhor tese de doutorado selecionada em cada uma das quarenta e oito �reas do conhecimento reconhecidas pela CAPES nos cursos de p�s-gradua��o adimplentes e reconhecidos no Sistema Nacional de P�s-Gradua��o. Ser�o concedidos pr�mios especiais para �reas pr�-determinadas em parceria com a Funda��o Carlos Chagas. O Grande Pr�mio Capes de Tese ser� outorgado em parceria com a Funda��o Conrado Wessel.', 'Certificado, cerim�nia de premia��o, bolsas, aux�lio participa��o em evento.', 'A tese deve: <br>1. estar dispon�vel na Plataforma Sucupira da CAPES; <br>2. ter sido defendida em 2014; <br>3. ter sido defendida no Brasil, mesmo em casos de cotutela ou outras formas de dupla diploma��o; <br>4. ter sido defendida em programa de p�s-gradua��o que tenha tido, no m�nimo, 3(tr�s) teses de doutorado defendidas em 2014.', 'premiocapes@capes.gov.br', '', '�reas do conhecimento reconhecidas pela CAPES', '', '', '', '', 'A pr�-sele��o das teses a serem indicadas ao Pr�mio Capes de Tese ocorre nos programas de p�s-gradua��o das institui��es de ensino superior que tenham tido, no m�nimo, tr�s teses de doutorado defendidas em 2014. Ap�s a indica��o da tese vencedora pela comiss�o de avalia��o, o coordenador do programa de p�s-gradua��o deve realizar a inscri��o da tese at� o dia 15 de maio.', '', 'A', '', '', 'http://www.capes.gov.br/premiocapesdetese', 0, 201, 'Observat�rio', 20150410, '', 'francine.zucco', 'Pr�mio Capes de Tese 2015', '4', 0, 1, 7, 1, 5, 1),
(202, 'Pr�mio Capes-Interfarma de Inova��o e Pesquisa', '2015-04-13', '00007', 'pt_BR', '09/2015', '2015-05-15', '1900-01-01', '1900-01-01', 'A premia��o, fruto da parceria com a Associa��o da Ind�stria Farmac�utica de Pesquisa (Interfarma), reconhecer� as melhores teses de doutorado defendidas em 2014 em Sa�de Humana ou �tica/Bio�tica no Brasil, Medicina, Odontologia, Farm�cia, Enfermagem ou Ci�ncias Biom�dicas (que inclui Gen�tica; Fisiologia, Bioqu�mica, Farmacologia; Imunologia, Microbiologia, Parasitologia e Biologia Celular).', 'Pr�mio no valor de R$ 26.495,75, cerim�nia de premia��o, bolsa, aux�lio participa��o em evento.', 'A tese deve: <br>1. estar dispon�vel na Plataforma Sucupira da CAPES; <br>2. ter sido defendida em 2014; <br>3. ter sido defendida no Brasil, mesmo em casos de cotutela ou outras formas de dupla diploma��o; <br>4. ter sido defendida em programa de p�s-gradua��o que tenha tido, no m�nimo, 3(tr�s) teses de doutorado defendidas em 2014.', 'PremioCapesInterfarma@capes.gov.br', '', '�rea de Sa�de Humana ou �tica/Bio�tica', '', '', '', '', 'A pr�-sele��o das teses a serem indicadas ao pr�mio ocorre nos programas de p�s-gradua��o das institui��es de ensino superior. Ap�s selecionados, os trabalhos que cumprirem os requisitos descritos no edital devem ser inscritos exclusivamente pela internet, at� 15 de maio, pelo coordenador do programa de p�s-gradua��o.', '', 'A', '', '', 'http://goo.gl/0icdFT', 0, 202, 'Observat�rio', 20150413, '', 'francine.zucco', 'Pr�mio Capes-Interfarma de Inova��o e Pesquisa', '4', 0, 1, 7, 1, 5, 1),
(203, 'Pr�mio Funda��o Bunge 2015', '2015-04-14', '00103', 'pt_BR', '2015', '2015-04-29', '1900-01-01', '1900-01-01', 'Em 2015, o Pr�mio Funda��o Bunge, em sua 60� edi��o, contempla profissionais envolvidos com a Recupera��o de Solos Degradados para a Agricultura, na �rea de Ci�ncias Agr�rias, e Saneamento B�sico e Manejo de �gua, na �rea de Ci�ncias Biol�gicas, Ecol�gicas e da Sa�de.', 'Os contemplados receber�o medalhas de ouro e prata, diplomas em pergaminho e um pr�mio de R$ 150 mil e R$ 60 mil.', '', '', '', 'Recupera��o de Solos Degradados para a Agricultura, na �rea de Ci�ncias Agr�rias, e Saneamento B�sico e Manejo de �gua, na �rea de Ci�ncias Biol�gicas, Ecol�gicas e da Sa�de.', '', '', '', '', 'Os candidatos ao Pr�mio n�o s�o inscritos, mas sim indicados pelas principais universidades e entidades cient�ficas e culturais brasileiras. Por favor, indicar o candidato at� o dia 29 de abril no e-mail do Observat�rio - pdi@pucpr.br', '', 'A', '', '', 'http://www.fundacaobunge.org.br/projetos/premio-fundacao-bunge/', 0, 203, 'Observat�rio', 20150414, '', 'francine.zucco', 'Pr�mio Funda��o Bunge 2015', '4', 0, 1, 103, 1, 5, 1),
(204, 'B.BICE+ Call for travel grants targeting innovation actors', '2015-04-14', '00104', 'us_EN', '2015', '2015-04-19', '1900-01-01', '1900-01-01', 'Build stronger relationships and long term partnerships between European and Brazilian research and innovation actors on priority areas identified by the EU-Brazil Policy Dialogue on Research and Innovation; identify areas of cooperation and mutual interest and enhance the sharing of experience among seasoned innovation actors through working visits.', 'Visit exchange (up to 3.000 euros)', 'The call is open to research institutions, TTOs, SMEs, technology platforms, innovation agencies and innovation networks (clusters / arranjos produtivos locais, Science and Technology Parks, business incubators) or other innovation actor from Europe (MS/AC) and Brazil. Each applicant from Europe must have found a partner institution in Brazil and each applicant from a Brazilian institution must have found a partner in Europe', '', '', 'Marine research; Food security, sustainable agriculture and bio-economy; Energy; Nanotechnologies; Sustainable agriculture and Biotechnology/bio-economy; Health.', '', '', '', '', 'Please submit your proposal (Annex 1) by email to tobbiceplus@ird.fr along with your CV, supporting letter from the candidate�s institution and letter/invitation from the hosting institution.', '', 'A', '', '', 'http://www.b-bice-plus.eu/call-for-travel-grants-targeting-innovation-actors/', 0, 204, 'Observat�rio', 20150414, '', 'francine.zucco', 'B.BICE+ Call for travel grants targeting innovation actors', '3', 0, 1, 104, 2, 4, 1),
(205, 'International S & T Cooperation: Post-Doc Fellowships to non-EU researchers', '2015-04-15', '00105', 'us_EN', '2015', '2015-05-31', '1900-01-01', '1900-01-01', 'The stimulation of international mobility and the attraction of researchers from abroad is one of the priorities of the European Research Area. The Federal Science Policy Office (BELSPO) is contributing to this objective by granting post-doc fellowships to non-EU researchers allowing them to work in a Belgian research team during a given period of time. The ultimate aim is to promote sustainable S&T collaborations between the research institutions and support the research networks.', 'Net monthly allowance of 2,403 EUR, travel expenses, insurance costs.', 'Qualifications required: <br>1. holding a doctor?s degree at the date of entry the Fellowship; <br>2. being under the age limit of 50 at the date of entry the Fellowship; <br>3. having the nationality of a target country, <br>4. and be associated to research in one of these target countries.', 'bernard.delhausse@belspo.be', '', '', '', '', '', '', 'The application form is introduced both in hard and electronic copy (bernard.delhausse@belspo.be) to the Federal Science Policy Office by the Belgian promoter.', '', 'A', '', '', 'http://www.belspo.be/belspo/organisation/call_postdoc_fr.stm', 0, 205, 'Observat�rio', 20150415, '', 'francine.zucco', 'International S & T Cooperation: Post-Doc Fellowships to non-EU researchers', '1', 0, 1, 105, 2, 2, 1),
(206, 'UNESCO Kalinga Prize for the Popularization of Science', '2015-04-16', '00106', 'us_EN', '2015', '2015-05-15', '1900-01-01', '1900-01-01', 'The purpose of the UNESCO-Kalinga Prize for the Popularization of Science is to reward the efforts of a person who has had a distinguished career as a writer, editor, lecturer, radio/television programme director or film producer, which has enabled him/her to help interpret science, research and technology to the public. ', 'The one-time award consists of: a cheque for the amount of the prize US$20,000, a certificate and the UNESCO-Albert Einstein silver medal. The laureate will also be offered the Kalinga Chair established by the Government of India (Department of Science and Technology) which comprises a certificate and cash award of US$5,000.', '1. Writers, editors, lecturers, radio/television programme directors or film producers who have devoted their career to interpreting science, research and technology for the general public; <BR>2. The applicant does not need to have a science degree; <BR>3. This prize does not reward research;<BR> 4. This prize does not reward formal teaching (in a school/university), nor curriculum development for the formal learning sector.', '', '', 'Popularization of science', '', '', '', '', 'If you belong to a national association for the advancement of science or any other science association, including science writers or scientific journalists, inform them of your interest in applying for this prize. <br>Candidates are submitted by the government through the country?s National Commission for UNESCO - Division of Cultural and Multilateral Agreements,  damc@itamaraty.gov.br; Gustavo.guimaraes@itamaraty.gov.br', '', 'A', '', '', 'http://goo.gl/HuY4oJ', 0, 206, 'Observat�rio', 20150416, '', 'francine.zucco', 'UNESCO Kalinga Prize for the Popularization of Science', '4', 0, 1, 106, 2, 5, 1),
(207, '<br>CIMO PhD Fellowships in Finland', '2015-04-17', '00107', 'us_EN', '2015', '1900-01-01', '1900-01-01', '1900-01-01', 'The CIMO Fellowships programme is open to young Doctoral level students and researchers from all countries and from all academic fields.', 'The monthly allowance is 1500 euros, intended to cover living expenses in Finland for a single person. Expenses due to international travel to and from Finland are not covered by CIMO.', 'The prerequisite for applying is that the visiting researcher must have established contacts with a Finnish host university.', '', '', '', '', '', '', '', 'Only the hosting Finnish university can act as an "applicant" in the CIMO Fellowship programme. There are no annual application deadlines in the CIMO Fellowship programme. Applications may be considered at all times. However, please note that applications should be submitted at least 5 months before the intended scholarship period.', '', 'A', '', '', 'http://www.studyinfinland.fi/tuition_and_scholarships/cimo_scholarships/cimo_fellowships', 0, 207, 'Observat�rio', 20150417, '', 'francine.zucco', 'CIMO PhD Fellowships in Finland', '1', 1, 1, 107, 2, 2, 1),
(208, 'Pr�mio Emerald/Capes 2015 de Pesquisa nas �reas de Ci�ncia da Informa��o e Administra��o e Gest�o', '2015-04-22', '00007', 'pt_BR', '10/2015', '2015-08-30', '1900-01-01', '1900-01-01', 'O objetivo de pr�mio � incentivar a realiza��o de projetos de pesquisa nas �reas de Ci�ncia da Informa��o e Ci�ncia da Administra��o e Gest�o que conciliem a dissemina��o do conhecimento com o desenvolvimento social aplicado � realidade brasileira.', 'Pr�mio de U$ 3.000 para cada categoria.', 'O Pr�mio � direcionado �s propostas de projetos que conciliem a dissemina��o do conhecimento com o desenvolvimento social aplicado � realidade brasileira. Pesquisadores vinculados a institui��es usu�rias do Portal de Peri�dicos poder�o submeter trabalhos nos moldes deste Edital.', 'cgpp@capes.gov.br', '', 'Duas categorias: 1. Ci�ncia da Informa��o e 2. Administra��o e Gest�o', '', '', '', '', 'As inscri��es dever�o ser feitas no link dispon�vel no site do Portal de Peri�dicos, que direcionar� ao site da EMERALD.', '', 'A', '', '', 'http://capes.gov.br/component/content/article/94-bolsas-s/7499-premio-emerald-capes', 0, 208, 'Observat�rio', 20150422, '', 'francine.zucco', 'Pr�mio Emerald/Capes 2015 de Pesquisa nas �reas de Ci�ncia da Informa��o e Administra��o e Gest�o', '4', 0, 1, 7, 1, 5, 1),
(209, '<br>Sofja Kovalevskaja Award', '2015-04-22', '00108', 'us_EN', '2015', '1900-01-01', '2015-07-31', '1900-01-01', 'The Alexander von Humboldt Foundation?s Sofja Kovalevskaja Award, which is funded by the Federal Ministry of Education and Research of Germany, is granted to young exceptionally promising researchers from abroad in recognition of outstanding academic achievements. The award is designed to enable them to embark on academic careers in Germany by establishing their own junior research groups at research institutions in Germany.', 'Up to 1.65 million EUR. The award funds are placed at the award winner?s disposal for a period of five years to carry out the approved research project of his or her own choice in Germany.', 'For scientists and scholars from abroad whose previous research has already been internationally recognized as outstanding and who are expected to continue producing outstanding results. <vr>The programme is open to scientists and scholars from all countries and disciplines who completed their doctorates with distinction less than six years ago. The Alexander von Humboldt Foundation particularly welcomes applications from qualified, female junior researchers.', 'info@avh.de', '', 'All disciplines', '', '', '', '', 'Applications must be sent to the Foundation�s office by the deadline.', '', 'A', '', '', 'http://www.humboldt-foundation.de/web/7360.html', 0, 209, 'Observat�rio', 20150422, '', 'francine.zucco', 'Sofja Kovalevskaja Award - Humboldt Foundation', '1', 0, 1, 108, 2, 2, 1),
(210, '<br>Humanitarian Innovation Fund', '2015-04-23', '00109', 'us_EN', '2015', '2015-05-14', '1900-01-01', '1900-01-01', 'The Humanitarian Innovation Fund supports organisations and individuals to identify, nurture and share innovative and scalable solutions to the challenges facing effective humanitarian assistance.', 'Grants between �75,000 and �150,000 - for development and implementation phases of the innovation process.', 'The aim of the project must be to improve humanitarian practice and must be an innovation. At least one of the partner organisations must be able to demonstrate experience working in humanitarian response.', 'info@humanitarianinnovation.org', '', 'Different areas with application to humanitarian assistance', '', '', '', '', 'Interested applicants should submit an Expression of Interest (EoI), which explains their innovative idea, to the HIF?s online grant management system. First time applicants should register first.', '', 'A', '', '', 'http://www.elrha.org/news/funding-alert-call-for-large-grant-applications-is-open/', 0, 210, 'Observat�rio', 20150423, '', 'francine.zucco', 'Humanitarian Innovation Fund', '2', 0, 1, 109, 2, 3, 1),
(211, '<br>Lee Kuan Yew Water Prize 2016', '2015-04-23', '00032', 'us_EN', '2016', '2015-06-01', '1900-01-01', '1900-01-01', 'The Lee Kuan Yew Water Prize honours outstanding contributions by individuals or organisations towards solving the world�s water challenges by applying innovative technologies, policies or programmes which benefit humanity.', 'S$300,000, a certificate, and a gold medallion at the award ceremony to be held during the Singapore International Water Week 2016.', 'A valid nominee for the Lee Kuan Yew Water Prize should have made outstanding achievements in any water-related field. <br>Qualified parties, such as leaders of international water companies and water utilities, top academics in water research, policy and management, heads of international organisations, members of government, or distinguished individuals in the water industry are welcome to submit nominations.', 'leekuanyewwaterprize@siww.com.sg', '', 'Water solutions', '', '', '', '', 'The submission of nominations for the Lee Kuan Yew Water Prize 2016 follows a rigorous two-stage process. The first stage is for the nominator to submit a citation of the nominee. Self-nomination and nominations by family members of nominees will not be accepted.', '', 'A', '', '', 'http://www.siww.com.sg/about-prize', 0, 211, 'Observat�rio', 20150423, '', 'francine.zucco', 'Lee Kuan Yew Water Prize 2016', '4', 0, 1, 32, 2, 5, 1),
(212, 'Pr�mio Funda��o Banco do Brasil de Tecnologia Social', '2015-04-23', '00110', 'pt_BR', '2015', '2015-05-31', '1900-01-01', '1900-01-01', 'O Pr�mio tem por objetivo certificar, premiar e difundir tecnologias sociais j� aplicadas e ainda em atividade, em �mbito local, regional ou nacional, que se constituam em efetivas solu��es para quest�es relativas a: �gua, alimenta��o, educa��o, energia, gera��o de renda, habita��o, meio ambiente e sa�de.', 'R$ 50.000,00 (cinquenta mil reais) para o 1� lugar de cada categoria e R$ 25.000,00 (vinte e cinco mil reais) para cada um dos dois outros finalistas por categoria.', '1. Estar em atividade h�, pelo menos, 2 (dois) anos; <br>2. Possuir resultados comprovados de transforma��o social; <br>3. Estar sistematizada a ponto de tornar poss�vel sua reaplica��o em outras comunidades; <br>4. Contar com o envolvimento da comunidade na sua concep��o ou ter sido apropriada por ela em seu desenvolvimento ou reaplica��o; <br>5. Respeitar os seguintes princ�pios e valores: protagonismo social, respeito cultural, cuidado ambiental, solidariedade econ�mica.', '', '', 'Seis categorias: <br>1. Comunidades Tradicionais, Agricultores Familiares e Assentados da Reforma Agr�ria; <br>2. Juventude; <br>3. Mulheres; <br>4. Gestores P�blicos; <br>5. Universidades e Institui��es de Ensino e Pesquisa; <br>6. Tecnologias Sociais para o Meio Urbano.', '', '', '', '', 'As inscri��es somente ser�o efetuadas pela internet no site do pr�mio.', '', 'A', '', '', 'http://www.fbb.org.br/tecnologiasocial/', 0, 212, 'Observat�rio', 20150424, '', 'francine.zucco', 'Pr�mio Funda��o Banco do Brasil de Tecnologia Social', '4', 0, 1, 110, 1, 5, 1),
(213, '<BR>iBrasil Doctorate mobility scholarships', '2015-04-24', '00078', 'us_EN', '2015', '2015-05-31', '1900-01-01', '1900-01-01', 'The IBRASIL consortium which stands for ?Inclusive and Innovative Brazil? has emerged from a long and mature collaboration between Brazilian and European universities. The main objectives of IBRASIL are the training of a new generation of highly qualified teachers, engineers and researchers who are open to inclusive values as well as to social and technological innovation; to foster sustainable joint programmes and common research involving Brazilian and European students, teaching staff and researchers and to increase collaboration between European and Brazilian HEIs, as well as the promotion of tools which facilitate international cooperation and the academic recognition of student mobilities.', '1500 EUR/month (6- or 10-month period).', '1. Must hold Brazilian nationality; <BR>2. Must have not resided nor have carried out their main activity (studies, work, etc) for more than a total of 12 months over the last five years in any of the eligible European countries at the time of submitting their application to the partnership; <BR>3. Must have not benefited in the past from an Erasmus Mundus scholarship for the same type of mobility; <BR>4. Must be enrolled in a doctorate course.', 'ibrasil@univ-lille3.fr', '', 'Education, Teacher Training, Engineering and Technology.', '', '', '', '', 'The Application Form can be downloaded from the web site and filled in English (or exceptionally in Portuguese).', '', 'A', '', '', 'http://ibrasilmundus.eu/general_information', 0, 213, 'Observat�rio', 20150424, '', 'francine.zucco', 'iBrasil Doctorate mobility scholarships', '1', 0, 1, 78, 2, 2, 1),
(214, '<br>Programa Bragecrim', '2015-04-27', '00007', 'pt_BR', '02/2014', '2015-06-15', '1900-01-01', '1900-01-01', 'O programa Bragecrim (Iniciativa Brasil-Alemanha para Pesquisa Colaborativa em Tecnologia de Manufatura) tem o objetivo de apoiar e financiar projetos conjuntos de pesquisa entre grupos de pesquisa brasileiros e alem�es na �rea de tecnologia de manufatura avan�ada. <br>A principal meta dos projetos aprovados no �mbito do programa � gerar conhecimento tecnol�gico fundamental, possibilitando o desenvolvimento de solu��es inovadoras para o aprimoramento da produtividade, qualidade e sustentabilidade das companhias industriais tanto brasileiras quanto alem�s. Outro importante objetivo � a troca de conhecimento por meio de miss�es de trabalho e de estudos de pesquisadores/docentes e estudantes de ambos os pa�ses.', '1. Passagens a�reas, seguro sa�de e di�rias para docentes brasileiros em miss�o de trabalho na Alemanha; <br>2. At� 10 (dez) bolsas de estudos (em todas as modalidades) por projeto nos termos vigentes da CAPES; <br>3. Recursos de custeio e de capital (aquisi��o de equipamentos) relacionados �s atividades do projeto.', '1. Comprovar a vincula��o do projeto a Programa de P�s-Gradua��o reconhecido pela CAPES; <br>2. Contemplar o interc�mbio de estudantes e a mobilidade de docentes e pesquisadores vinculados � equipe de trabalho; <br>3. Contemplar projeto de pesquisa tecnol�gica de fronteira em uma tem�tica/tecnologia da cadeia de produ��o de interesse comum dos proponentes; <br>4. Ser coordenada no Brasil por docente/pesquisador com doutorado h� pelo menos 4 anos; <br>5. Apresentar equipe de trabalho com, no m�nimo, 2 (dois) docentes/pesquisadores doutores, al�m do coordenador do projeto.', 'bragecrim@capes.gov.br', '', 'Tecnologia de Manufatura', '', '', '', '', 'As propostas de projetos conjuntos de pesquisa dever�o ser apresentadas simultaneamente � CAPES e ao DFG por meio dos formul�rios eletr�nicos pr�prios de cada ag�ncia.', '', 'A', '', '', 'http://capes.gov.br/cooperacao-internacional/alemanha/bragecrim', 0, 214, 'Observat�rio', 20150427, '', 'francine.zucco', 'Programa Bragecrim - Pesquisa Colaborativa em Tecnologia de Manufatura', '3', 0, 1, 7, 1, 4, 1),
(215, '<br>Barcelona GSE Master Degrees', '2015-04-27', '00111', 'us_EN', '2015/16', '2015-06-25', '1900-01-01', '1900-01-01', 'Thanks to the participation of a number of companies and institutions, the Barcelona Graduate School of Economics is able to offer more than 700.000 Euros in tuition waivers, based on academic merit. These highly competitive financial awards help the School attract the best and brightest international students. Preference in admission and financial aid will be given to early applicants.', 'Scholarships', '1. Undergraduate/bachelor/grado/laurea, or equivalent degree from an accredited college or university; <br>2. Advanced level of English language skills.', '', '', 'Economics, Finance and Data Science', '', '', '', '', 'The application process for the Barcelona Graduate School of Economics master programs is conducted entirely online.', '', 'A', '', '', 'http://www.barcelonagse.eu/admissions.html', 0, 215, 'Observat�rio', 20150427, '', 'francine.zucco', 'Barcelona GSE Master Degrees', '1', 0, 1, 111, 2, 2, 1),
(216, '<br>Banting Postdoctoral Fellowships', '2015-04-27', '00035', 'us_EN', '2015/16', '2015-09-23', '1900-01-01', '1900-01-01', 'Attract and retain top-tier postdoctoral talent, both nationally and internationally; develop their leadership potential; position them for success as research leaders of tomorrow.', '$70,000 per year (taxable)', 'Applicants must have fulfilled all requirements for their degree at the time of application and must not hold a tenure-track or tenured faculty position, nor can they be on leave from such a position. Applicants can submit only one application per competition year to the Banting Postdoctoral Fellowships program.', 'banting@researchnet-recherchenet.ca', '', 'Health; Natural Sciences and Engineering; Social Sciences and Humanities', '', '', '', '', 'Applications must be completed in full collaboration with the potential host institution. Individual application documents can be submitted in either English or French.', '', 'A', '', '', 'http://banting.fellowships-bourses.gc.ca/app-dem/index-eng.html', 0, 216, 'Observat�rio', 20150427, '', 'francine.zucco', 'Banting Postdoctoral Fellowships', '1', 0, 1, 35, 2, 2, 1),
(217, 'The Andrew W. Mellon Foundation Grants', '2015-04-29', '00112', 'us_EN', '2015', '1900-01-01', '1900-01-01', '1900-01-01', 'The Andrew W. Mellon Foundation supports a wide range of initiatives to strengthen the humanities, arts, higher education, and cultural heritage.', 'Up to $150,000.', '', '', '', 'Higher Education and Scholarship in the Humanities; Arts and Cultural Heritage; Diversity; Scholarly Communications; and International Higher Education and Strategic Projects', '', '', '', '', 'Draft proposals should be submitted to the Foundation through email in no more than four files: the information sheet; an MS Word file that includes the proposal narrative and budget narrative; an Excel budget spreadsheet using the Foundation?s budget template; and a PDF file containing any additional supporting materials.', '', 'A', '', '', 'https://mellon.org/grants/grantmaking-policies-and-guidelines/grant-proposal-guidelines/', 0, 217, 'Observat�rio', 20150429, '', 'francine.zucco', 'The Andrew W. Mellon Foundation Grants', '2', 1, 1, 112, 2, 3, 1);
INSERT INTO `fomento_edital` (`id_ed`, `ed_titulo`, `ed_dt_create`, `ed_agencia`, `ed_idioma`, `ed_chamada`, `ed_dt_deadline_elet`, `ed_dt_deadline_envio`, `ed_dt_previsao_divulg_res`, `ed_texto_1`, `ed_texto_2`, `ed_texto_3`, `ed_texto_4`, `ed_texto_5`, `ed_texto_6`, `ed_texto_7`, `ed_texto_8`, `ed_texto_9`, `ed_texto_10`, `ed_texto_11`, `ed_texto_12`, `ed_status`, `ed_autor`, `ed_corpo`, `ed_url_externa`, `ed_total_visualizacoes`, `ed_codigo`, `ed_local`, `ed_data_envio`, `ed_document_require`, `ed_login`, `ed_titulo_email`, `ed_edital_tipo`, `ed_fluxo_continuo`, `fdis_id`, `fag_id`, `i_id`, `ftp_id`, `fs_id`) VALUES
(218, 'Fulbright Professorship on Global Cities at CUNY', '2015-04-29', '00089', 'us_EN', '2015', '2015-05-28', '1900-01-01', '1900-01-01', 'This program will strengthen cooperation between Brazilian and CUNY institutions addressing the challenges facing Global Cities, thus laying a foundation for scientific advancement and broadening students? knowledge in the field. The research produced through this cooperation should be appropriate for eventual policy application.', 'The grantee will receive full funding for one academic term to support teaching and research activities at CUNY (US $38,400).', 'The candidate must demonstrate outstanding academic qualification and a record of professional experience along with intellectual production in the proposed area during the last ten years in the Brazilian arena. English language proficiency compatible with the proposed teaching and research activities is a requirement. The candidate must hold a Brazilian passport and must have earned the doctoral degree before December 31, 2006. Dual Brazilian/U.S. citizens are not eligible.', 'alexandre@fulbright.org.br', '', 'Global Cities', '', '', '', '', 'The candidate must submit the online application form with all attachments in English.', '', 'A', '', '', 'http://www.fulbright.org.br/content/view/21/87/', 0, 218, 'Observat�rio', 20150429, '', 'francine.zucco', 'Fulbright Professorship on Global Cities at CUNY', '1', 0, 1, 89, 2, 2, 1),
(219, 'Fulbright Professorship in Democracy and Human Development', '2015-04-29', '00089', 'us_EN', '2015', '2015-05-28', '1900-01-01', '1900-01-01', 'This program will strengthen cooperation between Brazilian institutions and Kellogg Institute that expects fresh perspectives and expertise on contemporary issues in Brazil, which has been a major focus of study at the Institute since the 1980s. The research produced through this cooperation should be appropriate for eventual policy application.', 'The Program will award funding for one visiting scholar for a four-month period - US$ 24,000, housing, health coverage and access to facilities.', 'The candidate must demonstrate outstanding academic qualification and a record of professional experience along with intellectual production in the proposed area during the last ten years in the Brazilian arena. English language proficiency compatible with the proposed activities is a requirement. The candidate must hold a Brazilian passport and must have earned the doctoral degree before December 31, 2006. Dual Brazilian/U.S. citizens are not eligible.', 'alexandre@fulbright.org.br', '', 'Democracy and Human Development', '', '', '', '', 'The candidate must submit the online application form with all attachments in English.', '', 'A', '', '', 'http://www.fulbright.org.br/content/view/61/123/', 0, 219, 'Observat�rio', 20150429, '', 'francine.zucco', 'Fulbright Professorship in Democracy and Human Development', '1', 0, 1, 89, 2, 2, 1),
(220, 'Fulbright Chair in Agricultural Sciences', '2015-04-29', '00089', 'us_EN', '2015', '2015-06-10', '1900-01-01', '1900-01-01', 'This program will strengthen cooperation between Brazilian institutions and University of Nebraska fostering deeper learning where diverse basic and applied natural, life, earth and social sciences are integrated into the context of a global society and environmental stewardship. The research produced through this cooperation should be appropriate for eventual policy application.', 'The Program will award funding for one visiting scholar for a four-month period - US$ 22,000, housing, health coverage and access to facilities.', 'The candidate must demonstrate outstanding academic qualification and a record of professional experience along with intellectual production in the proposed area during the last ten years in the Brazilian arena. English language proficiency compatible with the proposed activities is a requirement. The candidate must hold a Brazilian passport and must have earned the doctoral degree before December 31, 2006. Dual Brazilian/U.S. citizens are not eligible.', 'alexandre@fulbright.org.br', '', 'Agricultural Sciences.', '', '', '', '', 'The candidate must submit the online application form with all attachments in English.', '', 'A', '', '', 'http://www.fulbright.org.br/content/view/104/152/', 0, 220, 'Observat�rio', 20150429, '', 'francine.zucco', 'Fulbright Chair in Agricultural Sciences', '1', 0, 1, 89, 2, 2, 1),
(221, 'Fulbright Chair in Environmental Sciences and Policies', '2015-04-30', '00089', 'us_EN', '2015-16', '2015-06-10', '1900-01-01', '1900-01-01', 'This program will strengthen cooperation between Brazilian institutions and the University of Texas at Austin fostering deeper learning where diverse basic and applied natural, life, earth and social sciences are integrated into the context of a global society and environmental stewardship. The research produced through this cooperation should be appropriate for eventual policy application.', 'The Program will award funding for one visiting scholar for a four-month period - US$ 28,000, housing allowance of US$ 8,000, health coverage and access to facilities.', 'The candidate must demonstrate outstanding academic qualification and a record of professional experience along with intellectual production in the proposed area during the last ten years in the Brazilian arena. English language proficiency compatible with the proposed activities is a requirement. The candidate must hold a Brazilian passport and must have earned the doctoral degree before December 31, 2006. Dual Brazilian/U.S. citizens are not eligible.', 'alexandre@fulbright.org.br', '', 'Candidates may focus on fields of study such as: green energy; Environmental law/ policy; Sustainable cities; Environmental activism; or, Community environmental rights.', '', '', '', '', 'The candidate must submit the online application form with all attachments in English. Applications must include a proposal for a workshop and a 3-hour-per-week course for graduate\r\nor advanced undergraduate students on a related theme.', '', 'A', '', '', 'http://www.fulbright.org.br/content/view/60/120/', 0, 221, 'Observat�rio', 20150430, '', 'francine.zucco', 'Fulbright Chair in Environmental Sciences and Policies', '1', 0, 1, 89, 2, 2, 1),
(222, 'Fulbright Professorship in Brazilian Studies', '2015-05-04', '00089', 'us_EN', '2015', '2015-06-10', '1900-01-01', '1900-01-01', 'This program will strengthen cooperation between Brazilian institutions and UMass ? Amherst to promote research, training, and public engagement on the histories, cultures, and politics of Brazil and the U.S. The research produced through this cooperation should be appropriate for eventual policy application.', 'The Program will award funding for one visiting scholar for a four-month period - US$ 18,000, housing, health coverage and access to facilities.', 'The candidate must demonstrate outstanding academic qualification and a record of professional experience along with intellectual production in the Social Sciences during the last ten years in the Brazilian arena. English language proficiency compatible with the proposed activities is a requirement. The candidate must hold a Brazilian passport and must have earned the doctoral degree before December 31, 2006. Dual Brazilian/U.S. citizens are not eligible', 'alexandre@fulbright.org.br', '', 'Preference will be given to candidates with comprehensive knowledge and experience in one or more of the following areas: Race Relations, Women�s and Gender Studies, Social Movements, Social Policy, Cultural Anthropology, Political Sociology, Political Economics, History, Cultural Studies, and/ or Communication', '', '', '', '', 'The candidate must submit the online application form with all attachments in English. Applications must include a proposal for a course for graduate students on a theme relating to Brazilian Studies', '', 'A', '', '', 'http://www.fulbright.org.br/content/view/260/182/', 0, 222, 'Observat�rio', 20150504, '', 'francine.zucco', 'Fulbright Professorship in Brazilian Studies', '1', 0, 1, 89, 2, 2, 1),
(223, 'Fulbright Visiting Scholar Program in Music and Musicology', '2015-05-04', '00089', 'pt_BR', '2015/16', '2015-06-10', '1900-01-01', '1900-01-01', 'This program will strengthen cooperation between Brazilian institutions and Indiana University to promote the study of music with music educators, performers, scholars and teachers who are dedicated to inspiring and mentoring the next generation of music leaders.', 'The Program will award funding for one visiting scholar for a four-month period - US$ 20,000, housing, health coverage and access to facilities.', 'The candidate must demonstrate outstanding academic qualification and a record of professional experience along with intellectual production in the fields of music and/ or musicology during the last ten years in the Brazilian arena. The candidate must hold a Brazilian passport. Dual Brazilian/U.S. citizens are not eligible. Moreover, the candidate must have an adequate command of the English language; compatible with the proposed activities. Faculties and Researchers must have earned the doctoral degree before December 31, 2006. Musicians, Composers and Performers must have over ten years of professional experience with relevant institutional affiliation in the area.', 'alexandre@fulbright.org.br', '', 'Music and/or Musicology', '', '', '', '', 'The candidate must submit the online application form with all attachments in English.', '', 'A', '', '', 'http://www.fulbright.org.br/content/view/273/188/', 0, 223, 'Observat�rio', 20150504, '', 'francine.zucco', 'Fulbright Visiting Scholar Program in Music and Musicology', '1', 0, 1, 89, 1, 2, 1),
(224, 'Call for Proposals on Climate Predictability and Inter-Regional Linkages', '2015-05-04', '00113', 'us_EN', '2015-16', '2015-06-01', '1900-01-01', '1900-01-01', 'The Belmont Forum and JPI-Climate have launched a call for proposals on climate predictability and inter-regional linkages (drivers and mechanisms linking Poles & Monsoons for societal usefulness of climate services). <br>This call aims to contribute to the overall challenge of developing climate services with a focus on the role of inter-regional linkages in climate variability and predictability. Major impediments to efficient climate services at regional and local level still exist because of little or poorly understood climate processes (in part caused by a paucity of observations), inadequate dissemination of scientific knowledge, conflicts between climatic and non-climatic stressors and lack of action by decision makers and society at large.', 'Between 1 and 3 M?', 'The proposed project should exhibit that it requires critical mass reachable only with international and regional coordination. Development of research consortia supported by at least three participating partner agencies with at least one outside of Europe is a key criterion.', '', '', 'Topic 1- Understanding past and current variability and trends of regional extremes; <br>Topic 2- Predictability and prediction skills for near&#8208;future variability and trends of regional extremes; <br>Topic 3&#8208; Co&#8208;construction of near term forecast products with users.', '', '', '', '', 'The ?Climate predictability and inter-regional linkages? CRA is envisioned as a two-stage Call. Proposers will be asked to submit a pre-proposal (~ 4 pages long) describing the project, the consortium and the tentative budget and, for the projects that will successfully go through stage 1, submission of the full proposal (~ 20 pages long) will follow.', '', 'A', '', '', 'http://belmontforum.org/cra-2015-climate-predictability-and-inter-regional-linkages', 0, 224, 'Observat�rio', 20150504, '', 'francine.zucco', 'Belmont Forum and JPI-Climate Collaborative Research Action', '3', 0, 1, 113, 2, 4, 1),
(225, 'UK-Brazil Neglected Infectious Diseases Partnership', '2015-05-06', '00048', 'us_EN', '2015', '2015-06-01', '1900-01-01', '1900-01-01', 'The UK-Brazil Neglected Infectious Diseases Partnership initiative aims to provide support for joint Brazilian and UK working in the area of neglected infectious disease research. The objective is to deliver significant 2-3 year research funding for internationally competitive and innovative collaborative projects between scientists from Brazil and the UK that will allow the pursuit of shared research interests.', 'Equipments, travel costs, material and consumables, scolarships (PhD and postdoc).', '1. Present a PhD degree; <br>2. Have great qualifications in the referred area of research; <br>3. Have a UK partner, in accordance to MRC�s eligibility criteria.', 'mrc-confap-cnpq@cnpq.br', '', 'Through this call, the funders are specifically looking for proposals that target biomedical, social and/or economic research studies in neglected infectious diseases that place a significant burden upon the poorest and most vulnerable in Brazilian society.', '', '', '', '', 'In order to identify peer reviewers and convene assessment panels in advance, it is important that researchers indicate their intention to submit a proposal. Please email a preliminary indication by 01 June to mrc-confap-cnpq@cnpq.br. <br>UK and Brazilian applicants must apply separately to their respective funding agencies for the funding component requested within each country, but this must be based around a common scientific plan. Closing Date for investigators to submit their complete proposals to MRS and CONFAP is 01 July.', '', 'A', '', '', 'http://www.mrc.ac.uk/funding/browse/uk-brazil-neglected-infectious-diseases-partnership/', 0, 225, 'Observat�rio', 20150506, '', 'francine.zucco', 'UK-Brazil Neglected Infectious Diseases Partnership', '3', 0, 1, 48, 2, 4, 1),
(226, 'UK-Brazil Call on Healthy Urban Living and the Social Science of the Food-Water-Energy Nexus', '2015-05-06', '00048', 'us_EN', '2015', '2015-07-02', '1900-01-01', '1900-01-01', 'Proposals are invited for collaborative projects between the UK and Brazil which contribute to the economic development and welfare of Brazil within the areas of Healthy Urban Living and the Social Science of the Food-Water-Energy Nexus. The calls will form part of the Newton Fund commitment to develop bilateral research partnerships and enhance the global research community through developing knowledge.', 'Equipments, travel costs, material and consumables, scholarships (PhD and postdoc).', '1. Present a PhD degree; <br>2. Have great qualifications in the referred area of research; <br>3. Have a UK partner, in accordance to MRC�s eligibility criteria. <br>Projects on Healthy Urban Living must be led by social science; however interdisciplinary research is strongly encouraged.', 'esrc-confap-cnpq@cnpq.br', '', 'Healthy Urban Living and the Social Science of the Food-Water-Energy Nexus.', '', '', '', '', 'As this is a joint application to ESRC and CONFAP/FAPESP, applicants should ensure that proposals include a single identical case for support (10 pages max) and are submitted to both ESRC and FAPESP/CNPq.', '', 'A', '', '', 'http://goo.gl/zfYA5f', 0, 226, 'Observat�rio', 20150506, '', 'francine.zucco', 'Call on Healthy Urban Living and the Social Science of the Food-Water-Energy Nexus', '3', 0, 1, 48, 2, 4, 1),
(227, '<br>Bolsas PQ/DT/PQ-Sr', '2015-05-06', '00005', 'pt_BR', '2015', '2015-08-14', '1900-01-01', '1900-01-01', 'Busca distinguir o pesquisador, valorizando sua produ��o cient�fica e/ou tecnol�gica segundo crit�rios normativos estabelecidos pelo CNPq.', 'Mensalidade de acordo com o n�vel da bolsa', 'O pesquisador deve: <br>1. ter t�tulo de doutor ou perfil cient�fico/tecnol�gico equivalente; <br>2. ser brasileiro ou estrangeiro com situa��o regular no Pa�s; <br>3. dedicar-se �s atividades constantes de seu pedido de bolsa. <br>Requisitos e crit�rios m�nimos para enquadramento e classifica��o espec�ficos a cada categoria.', '', '', 'Diversas �reas do conhecimento', '', '', '', '', 'A solicita��o dever� ser feita por meio do Formul�rio de Propostas Online, dispon�vel na Plataforma Carlos Chagas.', '', 'A', '', '', 'http://www.cnpq.br/web/guest/bolsas-no-pais', 0, 227, 'Observat�rio', 20150506, '', 'francine.zucco', 'Bolsas PQ/DT/PQ-Sr', '1', 0, 1, 5, 1, 2, 1),
(228, 'Endeavour Scholarships and Fellowhships in Australia', '2015-05-07', '00114', 'us_EN', '2015-16', '2015-06-30', '1900-01-01', '1900-01-01', 'Endeavour Scholarships and Fellowships are internationally competitive, merit-based scholarships provided by the Australian Government that support citizens around the world to undertake study, research and professional development in Australia and for Australians to do the same overseas.', 'Travel and establishment allowances, monthly stipend, health insurance.', 'Applicants must: <br>1. be aged 18 years or over at the commencement of their programme; <br>2. commence their proposed programme after 1 January 2016 and no later than 30 November 2016; <br>3. provide all relevant supporting documentation; <br>4. not currently hold or have completed, since 1 January 2014, an Australian Government sponsored scholarship and/or fellowship.', '', '', 'Any field of study in Australian Universities - Masters, PhD, postoc, Vocational Education and Training (VET) and Executive Fellowship.', '', '', '', '', 'Applications must be submitted using the Endeavour Online application system.', '', 'A', '', '', 'https://internationaleducation.gov.au/Endeavour%20program/Scholarships-and-Fellowships/Pages/default.aspx', 0, 228, 'Observat�rio', 20150507, '', 'francine.zucco', 'Endeavour Scholarships and Fellowhships in Australia', '1', 0, 1, 114, 2, 2, 1),
(229, '2016 Mexican Government Scholarships for International Students', '2015-05-08', '00115', 'us_EN', '2016', '2015-08-31', '1900-01-01', '1900-01-01', 'On behalf of the Ministry of Foreign Affairs, the Mexican Agency for International Development Cooperation (AMEXCID) invites foreign citizens who are interested in studying for a specialization, master?s degree or doctorate, conducting graduate or postdoctoral research, or taking part in an undergraduate or graduate-level academic mobility program, to participate in the 2016 Mexican Government Scholarship Program for International Students.', 'The scholarship includes monthly stipend, registration fees and tuition, health insurance, round-trip international airfare, and transportation to and from Mexico City.', 'Requirements for all applicants: <br>1. Bachelor?s, Master?s, or PhD Degree, as required by the program for which the scholarship is requested; <br>2. Minimum grade point average of eight (8.0) on a scale of 0 to 10, or the equivalent, for the last academic degree received; <br>3. Be accepted to or currently enrolled in a program at one of the participating Mexican institutions.', 'infobecas@sre.gob.mx', '', 'Different disciplines', '', '', '', '', 'No applications will be accepted directly from the applicants. The entire scholarship application process must be done at the Mexican or concurrent  embassy for the applicant?s country.', '', 'A', '', '', 'http://amexcid.gob.mx/index.php/oferta-de-becas-para-extranjeros', 0, 229, 'Observat�rio', 20150508, '', 'francine.zucco', '2016 Mexican Government Scholarships for International Students', '1', 0, 1, 115, 2, 2, 1),
(230, 'Bolsa para realiza��o de pesquisas em universidades japonesas 2016.', '2015-05-12', '00116', 'pt_BR', '2016', '1900-01-01', '2015-05-29', '2015-12-20', 'Bolsa para realiza��o de pesquisas em universidades japonesas.\r\nOferece ao interessado oportunidade de cursar o mestrado e/ou doutorado, caso venha a ser aprovado no exame de admiss�o da universidade japonesa.\r\nInclui curso de l�ngua japonesa nos seis primeiros meses da bolsa, dependendo do n�vel de conhecimento da l�ngua do aprovado.', 'Bolsa e pagamento de taxas escolares entre outros.', 'Nascidos antes de 02 de Abril de 1981;\r\nBrasileiro sem dupla nacionalidade; \r\nPara cada �rea existe um background espec�fico, ver edital no site informado.', 'Consulado Geral do Jap�o em Curitiba\r\nRua Marechal Deodoro 630, 18� andar CEP:80010-912\r\nTel:(41)3322-4919 Fax:(41)3222-0499 \r\nEmail: cultura@c1.mofa.go.jp', '', 'Todas', '', '', '', '', 'Pessoalmente no Consulado Geral do Jap�o em Curitiba.', 'pdi@pucpr.br', 'A', '', '', 'http://www.curitiba.br.emb-japan.go.jp/bolsa1.html', 0, 230, 'Observat�rio', 20150512, '', 'jeferson.vieira', 'Oferece ao interessado oportunidade de cursar o mestrado e/ou doutorado.', '1', 0, 1, 116, 1, 2, 1),
(231, 'Securing Water for Food: A Grand Challenge for Development', '2015-05-14', '00070', 'us_EN', '2015', '2015-05-22', '1900-01-01', '1900-01-01', 'This $12.5 million call for proposals focuses on identifying market-driven, low-cost, and scalable solutions that will enable us to improve water efficiency and wastewater reuse; enhance water capture and storage; and reduce the impacts of salinity on aquifers and food production. The third call has an increased focus on cutting-edge, advanced technologies and business models, as well as those that prioritize the engagement of women.', 'Between $100,000 and $3 million in funding and acceleration support', 'Securing Water for Food is open to all organizations regardless of type or size. All applicants must use the funds to implement the innovation in a developing or emerging country. Innovations must directly or indirectly benefit the poor. For Stage 1 (Market-driven product/Business development), just in-kind contribution as matched funding is OK.', 'securingwaterforfood@gmail.com', '', '', '', '', '', '', 'Concept Notes shall be received no later than May 22, 2015 at 5:00 PM EST via the Online Application Platform accessed at: http://securingwaterforfood.org/apply. Applicants should retain a copy of their proposals and accompanying uploaded documents for their records.', '', 'A', '', '', 'http://www.securingwaterforfood.org/round-3-call-3/', 0, 231, 'Observat�rio', 20150514, '', 'francine.zucco', 'Securing Water for Food: A Grand Challenge for Development', '2', 0, 1, 70, 2, 3, 1),
(232, 'Pr�mio de Incentivo em Ci�ncia e Tecnologia para o SUS - 2015', '2015-05-28', '00041', 'pt_BR', '01/2015', '2015-07-03', '1900-01-01', '1900-01-01', 'O Pr�mio de Incentivo em Ci�ncia e Tecnologia para o SUS - 2015 � uma iniciativa do Minist�rio da Sa�de promovida por meio da Secretaria de Ci�ncia e Tecnologia e Insumos Estrat�gicos. Esta a��o tem como objetivo proporcionar reconhecimento ao pesquisador e profissionais da �rea da sa�de pelo seu papel no desenvolvimento social e econ�mico do pa�s.', '<br>CATEGORIA VALOR</br>\r\n<br>a) Tese de doutorado R$ 50.000,00</br>\r\n<br>b) Disserta��o de mestrado R$ 30.000,00</br>\r\n<br>c) Trabalho cient�fico publicado R$ 50.000,00</br>\r\n<br>d) Monografia de especializa��o/resid�ncia R$ 15.000,00</br>', '<br>a) Categoria Trabalho Cient�fico Publicado: ter publicado artigo cient�fico, texto completo, em revista cient�fica indexada (vers�o impressa ou eletr�nica) no per�odo de 27 de maio de 2014 a 17 de maio de 2015;</br>\r\n<br>b) Categoria Tese de Doutorado: ter conclu�do curso de p�s-gradua��o em n�vel de Doutorado e tese aprovada em banca examinadora no per�odo de 27 de maio de 2014 a 17 de maio de 2015;</br>\r\n<br>c) Categoria Disserta��o de Mestrado: ter conclu�do curso de p�sgradua��o em n�vel de Mestrado e disserta��o aprovada em banca examinadora no per�odo de 27 de maio de 2014 a 17 de maio de 2015;</br>\r\n<br>d) Categoria Monografia de Especializa��o ou Resid�ncia: ter conclu�do curso de p�s-gradua��o em n�vel de Especializa��o ou Resid�ncia e monografia aprovada no per�odo de 27 de maio de 2014 a 17 de maio de 2015.</br>', 'decit.premio@saude.gov.br', '', 'Todas as �reas com aplica��o em sa�de.', '', '', '', '', 'As inscri��es para o Pr�mio de Incentivo em Ci�ncia e Tecnologia para o SUS ?\r\n2015 s�o efetuadas somente via internet, no endere�o eletr�nico\r\nwww.saude.gov.br/sisct no per�odo entre �s 10 horas do dia 18 de maio de 2015, at� �s 18h do dia 03 de julho de 2015, observado o hor�rio oficial de Bras�lia-DF', 'pdi@pucpr.br', 'A', '', '', 'http://portalsaude.saude.gov.br/images/pdf/2015/maio/15/XIV-PREMIO-INCENTIVO-CIENCIA-E-TECNOLOGIA-SUS.pdf', 0, 232, 'Observat�rio', 20150528, '', 'jeferson.vieira', 'Pr�mio de Incentivo em Ci�ncia e Tecnologia para o SUS - 2015', '4', 0, 1, 41, 1, 5, 1),
(233, 'Fomento e Apoio � Pesquisa, Capacita��o Cient�fica e Assessoramento com Foco na Promo��o e Defesa dos Direitos de Crian�as e Jovens.', '2015-06-09', '00018', 'pt_BR', '01/2015', '1900-01-01', '2015-07-03', '2015-07-13', 'A Pr�-Reitoria de Pesquisa e P�s-Gradua��o ? PRPPG,  juntamente com a Rede Marista de Solidariedade ? RMS tem como <b>objetivo</b> fomentar e apoiar financeiramente a realiza��o de projetos de pesquisa de natureza acad�mica destinada � produ��o de conhecimento, com identifica��o e an�lise de estudos (pesquisas), cujo foco seja a promo��o e defesa dos direitos das inf�ncias e juventudes, com vistas a subsidiar a��es e/ou interven��es para sua promo��o e garantia, prioritariamente com o foco nas popula��es empobrecidas ou representativas.', 'Est� previsto para o presente edital o apoio financeiro para at� 02 (dois) pesquisadores.<br>\r\n\r\nS�o financi�veis: <br>\r\na) Isen��o de Mensalidade para mestrado;  <br>\r\nb) Bolsa-aux�lio mensal de R$ 2.000,00 destinada ao estudante; <br>\r\nc) Recurso de custeio no valor de R$ 5.000,00 para gastos com inscri��o no evento, passagens a�reas, hospedagem e alimenta��o para o estudante participar de semin�rio/congresso e outras atividades fundamentais � realiza��o da pesquisa, bem como para gastos com publica��o do trabalho realizado.', 'As propostas dever�o obrigatoriamente, se enquadrar em uma ou mais  �reas de conhecimento de acordo com as tem�ticas  da Rede Marista de Solidariedade.<br>\r\nQuanto ao proponente, s�o eleg�veis os docentes com v�nculo efetivo junto aos Programas de P�s-Gradua��o <i>stricto sensu</i> da PUCPR.', '', '', '?	Participa��o Infantil como Direito <br>\r\n?	Direito de crian�as e adolescentes de viver sem viol�ncia <br>\r\n?	Migra��o Infantil e o Direito de viver em fam�lia <br>\r\n?	Internet como direito humano e redes sociais <br>\r\n?	Educomunica��o <br>\r\n?	Acesso � justi�a de crian�as e adolescentes <br>\r\n?	Culturas juvenis <br>\r\n?	Depend�ncia qu�mica - drogas l�citas e il�citas ? preven��o e tratamento <br>\r\n?	Educa��o Infantil como Direito <br>\r\n?	Educa��o Integral como Direito <br>\r\n?	Espa�os de lazer nos territ�rios de vulnerabilidade <br>\r\n?	Inf�ncias e juventudes rurais <br>\r\n?	Investimento P�blico e a garantia dos direitos das inf�ncias e juventudes <br>\r\n?	Juventudes e espiritualidade <br>\r\n?	Juventudes e mercado de trabalho <br>\r\n?	Mercado de consumo e as inf�ncias e juventudes <br>\r\n?	Novas tecnologias e seus impactos na promo��o dos Direitos das inf�ncias e juventudes <br>\r\n?	Participa��o da crian�a, do adolescente e jovem como Direito <br>\r\n?	Qualifica��o profissional e inser��o no mundo do trabalho das juventudes <br>\r\n?	Redes juvenis <br>\r\n?	Sistema de Garantia de Direitos <br>\r\n?	Situa��o dos Direitos das inf�ncias e juventudes <br>\r\n?	Viol�ncia urbana e institucional', '', '', '', '', 'A proposta dever� ser enviada � Diretoria de Pesquisa/Observat�rio de Pesquisa, Desenvolvimento e Inova��o (PD&I) via e-mail para pdi@pucpr.br.', 'Para esclarecimentos e aux�lio, favor entrar em contato com o Observat�rio de Pesquisa, Desenvolvimento & Inova��o - pdi@pucpr.br, (41) 3271-2128.', 'B', '', '', 'http://www.pucpr.br/pesquisacientifica/prppg/editaissociais.php', 0, 233, 'Observat�rio', 20150609, '', 'e.bianco', 'Edital de Chamada de Projetos Sociais n� 01/2015', '1', 0, 1, 18, 1, 2, 2),
(234, 'Newton Researcher Links workshop grants', '2015-06-15', '00048', 'us_EN', '2015', '2015-07-13', '1900-01-01', '1900-01-01', 'This element of Newton Researcher Links provides financial support to bring together a UK/partner country bilateral cohort of early career researchers to take part in workshops to: 1. build research capacity in developing economies; 2. build links for future collaboration and 3. enhance the researchers? career opportunities.', 'Funding offered under the Researcher Links programme is intended as a contribution towards the costs of the workshops. Workshop coordinators are expected to add a contribution in-kind towards the overall cost of the workshop by dedicating their time to the planning and delivery of the workshops. It covers international and domestic travel, subsistence, event costs and up to �2,000 for administrative costs.', '1. Each workshop will be coordinated by two Leading Researchers, one from each country, and will focus either on a specific research area or on an interdisciplinary theme. <br>2. All proposals must clearly articulate a plausible pathway to positive impact on poor and vulnerable populations within a short- to medium-term time frame (3-15 years).  <br>Please refer to the call for detailed specifications.', 'UK-ResearcherLinks@britishcouncil.org', '', 'Different disciplines - please refer to the call for research priorities (Annex I - country-specific)', '', '', '', '', 'Applicants must submit a completed online application form (https://britishcouncil-cxobw.formstack.com/forms/application_form_rl_wg_april2015 ).  Submissions by email will not be accepted.', '', 'A', '', '', 'http://www.britishcouncil.org/education/science/current-opportunities/newton-workshops-april-2015', 0, 234, 'Observat�rio', 20150615, '', 'francine.zucco', 'Newton Researcher Links workshop grants', '5', 0, 1, 48, 2, 6, 1),
(235, 'Google Research Awards in Latin America Program', '2015-06-15', '00117', 'us_EN', '2015', '2015-07-06', '1900-01-01', '1900-01-01', 'As part of Google�s vision, the Google Research Awards in Latin America program aims to identify and support world-class, full-time faculty working in Latin America and pursuing research in areas of mutual interest. Google Research Awards in Latin America are one-year awards structured as unrestricted gifts to universities to support the work of world-class full-time faculty members and their students at top universities around the world.', 'For approved projects at Ph.D. level, the student will receive US$ 1.200 monthly and the faculty will receive US$ 750 monthly. For approved projects at M.Sc. level, the student will receive US$ 750 monthly and the faculty will receive US$ 675 monthly.', 'Full-time faculty members from universities in Latin America are eligible to apply. Each proposal should involve a single faculty and a single student, either at Ph.D. or M.Sc. level.', '', '', 'The intent of the Google Research Awards is to support cutting-edge research in Computer Science, Engineering, and related fields.', '', '', '', '', 'The application process for the Research Awards in Latin America is composed of two steps: <br>1. fill out this online form with basic information on the researcher, the project, and the student; <br>2. submit a project proposal in PDF to the email researchlatam@google.com', '', 'A', '', '', 'http://research.google.com/university/relations/research_awards_latin_america.html', 0, 235, 'Observat�rio', 20150615, '', 'francine.zucco', 'Google Research Awards in Latin America Program', '1', 0, 1, 117, 2, 2, 1),
(236, 'Concurso de Comunica��o Cient�fica - O clima e o desenvolvimento sustent�vel', '2015-06-15', '00118', 'pt_BR', '2015', '2015-07-15', '1900-01-01', '1900-01-01', 'Esse concurso de comunica��o cient�fica acontecer� em duas etapas: um v�deo de 180 segundos, em seguida uma apresenta��o oral, din�mica, inovadora e pedag�gica, sobre uma pesquisa conduzida sobre o clima/desenvolvimento sustent�vel.', 'Participa��o em evento no exterior, expedi��o de pesquisa.', '1. Ser mestrando, doutorando, p�s-doutorando ou pesquisador ligado a uma institui��o de ensino superior ou organismo de pesquisa brasileiro. <br>2. Conduzir uma pesquisa sobre qualquer tem�tica ligada � mudan�a clim�tica ou ao desenvolvimento sustent�vel, em qualquer �rea. <br>3. Estar no Brasil no momento da final (25/09/2015).', 'scac-stu.brasilia-amba@diplomatie.gouv.fr', '', 'Clima e desenvolvimento sustent�vel', '', '', '', '', 'O concurso � Minha pesquisa sobre o clima e o desenvolvimento sustent�vel em 180 segundos� acontecer� em duas fases: os vencedores da pr�-sele��o virtual ser�o classificados para a final presencial dia 25 de setembro no Rio de Janeiro.', '', 'A', '', '', 'http://www.ambafrance-br.org/Concurso-de-Comunicacao-Cientifica', 0, 236, 'Observat�rio', 20150616, '', 'francine.zucco', 'Concurso de Comunica��o Cient�fica - O clima e o desenvolvimento sustent�vel', '4', 0, 1, 118, 1, 5, 1),
(237, '<br>InBev-BAILLET LATOUR Health Prize', '2015-06-16', '00119', 'us_EN', '2016', '2015-09-30', '1900-01-01', '1900-01-01', 'This personal award is granted every year for outstanding achievements in biomedical research for the benefit of human health. It was established to recognize scientific merit and to encourage the laureate in the pursuit of his/her creative research, and is therefore intended for currently active biomedical scientists and not a "crown at the end of a scientific career". Exceptionally, the Prize may be shared by two people who have collaborated closely over a long period.', 'Prize of ? 250,000.', 'The Prize is open to scientists of any nationality who have not previously received an equivalent or higher prize for their personal use.', '', '', 'Infectious Diseases', '', '', '', '', 'Candidates may not apply themselves, but must be nominated by a person who is duly qualified to assess their work, using the form provided at www.inbevbailletlatour.com. The nomination file for the 2016 Prize must be sent electronically to prix@frs-fnrs.be', '', 'A', '', '', 'http://www.inbevbailletlatour.com/index.cfm?lang=ENG', 0, 237, 'Observat�rio', 20150616, '', 'francine.zucco', 'Pr�mio internacional em Sa�de: InBev-BAILLET LATOUR Health Prize', '4', 0, 1, 119, 2, 5, 1),
(238, '"Virtual Joint Centres in Agricultural Nitrogen" - CP 05/2015', '2015-06-17', '00002', 'pt_BR', '05/2015', '2015-07-22', '1900-01-01', '1900-01-01', 'Apoiar atividades de investiga��es bilaterais sob a forma de ?Virtual Joint Centres in Agricultural Nitrogen? entre pesquisadores do Brasil e Reino Unido.', 'At� 100 mil reais.', '1.  Ter submetido o projeto ao Edital BBSRC-CONFAP (feito simultaneamente); <br>2. Ter v�nculo formal com a institui��o; <br>3. Possuir o t�tulo de Doutor e experi�ncia em projetos de coopera��o internacional e/ou alta qualifica��o.', 'projetos2@ fundacaoaraucaria.org.br', '', 'Linha 1: Efici�ncia no uso de nitrog�nio agron�mico;  <br>Linha 2: Efici�ncia de uso de nitrog�nio biol�gico;  <br>Linha 3: Fixa��o biol�gica de nitrog�nio.', '', '', '', '', 'A proposta dever� ser enviada � Funda��o Arauc�ria por meio do SigArauc�ria e a documenta��o impressa e assinada por correio/secretaria da FA. <br>O proponente dever� tamb�m submeter simultaneamente o projeto ao Edital BBSRC-CONFAP http://confap.org.br/news/newtonfund/', '', 'A', '', '', 'http://www.fappr.pr.gov.br/modules/conteudo/conteudo.php?conteudo=11', 0, 238, 'Observat�rio', 20150617, '', 'francine.zucco', 'CP FA/Newton Fund - "Virtual Joint Centres in Agricultural Nitrogen"', '3', 0, 1, 2, 1, 4, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `fomento_edital_categoria`
--

CREATE TABLE IF NOT EXISTS "fomento_edital_categoria" (
  "id_fec" bigint(20) NOT NULL,
  "fe_id" bigint(20) NOT NULL,
  "fc_id" bigint(20) NOT NULL,
  "fec_ativo" tinyint(1) NOT NULL DEFAULT '1'
);

--
-- Extraindo dados da tabela `fomento_edital_categoria`
--

INSERT INTO `fomento_edital_categoria` (`id_fec`, `fe_id`, `fc_id`, `fec_ativo`) VALUES
(258, 1, 2, 1),
(259, 1, 7, 1),
(260, 1, 8, 1),
(261, 1, 9, 1),
(262, 1, 11, 1),
(263, 1, 12, 1),
(264, 1, 26, 1),
(295, 3, 5, 1),
(300, 9, 5, 1),
(301, 9, 31, 1),
(302, 11, 5, 1),
(303, 11, 33, 1),
(304, 12, 5, 1),
(305, 12, 34, 1),
(308, 15, 5, 1),
(309, 15, 34, 1),
(310, 13, 5, 1),
(311, 13, 33, 1),
(317, 20, 2, 1),
(335, 22, 8, 1),
(336, 22, 9, 1),
(337, 23, 3, 1),
(346, 6, 5, 1),
(347, 6, 17, 1),
(348, 25, 2, 1),
(349, 21, 37, 1),
(350, 26, 2, 1),
(351, 24, 2, 1),
(359, 29, 5, 1),
(360, 30, 3, 1),
(362, 18, 36, 1),
(364, 27, 38, 1),
(369, 28, 37, 1),
(372, 31, 36, 1),
(374, 33, 36, 1),
(375, 33, 38, 1),
(376, 33, 39, 1),
(377, 33, 40, 1),
(378, 33, 44, 1),
(379, 33, 43, 1),
(383, 14, 36, 1),
(384, 14, 40, 1),
(385, 14, 44, 1),
(386, 35, 38, 1),
(387, 35, 39, 1),
(392, 37, 36, 1),
(396, 36, 38, 1),
(397, 36, 40, 1),
(398, 40, 36, 1),
(399, 40, 40, 1),
(400, 40, 44, 1),
(401, 38, 2, 1),
(402, 34, 5, 1),
(409, 41, 8, 1),
(410, 41, 9, 1),
(411, 39, 38, 1),
(418, 42, 36, 1),
(419, 42, 44, 1),
(427, 43, 43, 1),
(432, 32, 2, 1),
(433, 45, 41, 1),
(434, 46, 36, 1),
(448, 44, 38, 1),
(449, 44, 39, 1),
(450, 44, 45, 1),
(451, 44, 40, 1),
(452, 44, 41, 1),
(453, 44, 42, 1),
(454, 44, 43, 1),
(457, 47, 3, 1),
(458, 48, 3, 1),
(459, 49, 3, 1),
(461, 50, 5, 1),
(462, 51, 5, 1),
(467, 53, 5, 1),
(468, 17, 5, 1),
(469, 52, 5, 1),
(470, 19, 2, 1),
(471, 54, 5, 1),
(472, 55, 45, 1),
(473, 56, 36, 1),
(474, 57, 38, 1),
(475, 57, 40, 1),
(476, 58, 36, 1),
(477, 58, 44, 1),
(481, 59, 36, 1),
(482, 59, 44, 1),
(483, 60, 36, 1),
(484, 60, 42, 1),
(485, 60, 44, 1),
(486, 60, 43, 1),
(487, 61, 36, 1),
(488, 61, 44, 1),
(489, 63, 36, 1),
(490, 63, 38, 1),
(491, 63, 40, 1),
(497, 62, 2, 1),
(498, 65, 5, 1),
(499, 66, 5, 1),
(500, 66, 9, 1),
(504, 67, 3, 1),
(505, 67, 9, 1),
(506, 68, 36, 1),
(507, 68, 44, 1),
(508, 69, 36, 1),
(509, 69, 44, 1),
(510, 70, 36, 1),
(511, 70, 44, 1),
(512, 71, 36, 1),
(513, 71, 44, 1),
(514, 72, 36, 1),
(515, 72, 44, 1),
(516, 73, 36, 1),
(517, 73, 44, 1),
(518, 74, 36, 1),
(519, 74, 44, 1),
(520, 75, 36, 1),
(521, 75, 44, 1),
(522, 76, 36, 1),
(523, 76, 44, 1),
(524, 77, 36, 1),
(525, 77, 44, 1),
(526, 78, 2, 1),
(527, 78, 9, 1),
(533, 64, 40, 1),
(534, 79, 40, 1),
(535, 80, 40, 1),
(536, 81, 39, 1),
(537, 81, 45, 1),
(538, 81, 41, 1),
(539, 81, 42, 1),
(540, 81, 43, 1),
(541, 82, 5, 1),
(542, 82, 9, 1),
(543, 83, 5, 1),
(544, 83, 9, 1),
(545, 84, 40, 1),
(546, 85, 5, 1),
(547, 86, 36, 1),
(548, 86, 38, 1),
(549, 86, 41, 1),
(550, 86, 44, 1),
(551, 86, 43, 1),
(552, 87, 38, 1),
(553, 87, 39, 1),
(554, 87, 40, 1),
(555, 87, 43, 1),
(556, 88, 5, 1),
(557, 89, 5, 1),
(558, 89, 9, 1),
(576, 92, 5, 1),
(577, 92, 9, 1),
(578, 93, 43, 1),
(580, 94, 38, 1),
(581, 95, 37, 1),
(582, 96, 3, 1),
(583, 96, 9, 1),
(584, 97, 36, 1),
(585, 97, 44, 1),
(586, 98, 36, 1),
(587, 98, 44, 1),
(588, 100, 36, 1),
(589, 100, 44, 1),
(590, 99, 7, 1),
(591, 99, 8, 1),
(592, 99, 9, 1),
(593, 101, 36, 1),
(594, 101, 44, 1),
(595, 102, 37, 1),
(596, 103, 36, 1),
(597, 103, 44, 1),
(598, 104, 36, 1),
(599, 104, 40, 1),
(600, 104, 44, 1),
(601, 105, 2, 1),
(602, 106, 3, 1),
(606, 107, 39, 1),
(607, 107, 41, 1),
(608, 107, 42, 1),
(609, 107, 43, 1),
(610, 108, 3, 1),
(611, 108, 9, 1),
(612, 109, 45, 1),
(613, 109, 41, 1),
(614, 109, 42, 1),
(615, 109, 43, 1),
(617, 110, 3, 1),
(618, 111, 3, 1),
(622, 112, 5, 1),
(623, 112, 9, 1),
(644, 90, 36, 1),
(645, 90, 45, 1),
(646, 90, 41, 1),
(647, 90, 42, 1),
(648, 90, 43, 1),
(649, 114, 5, 1),
(650, 114, 9, 1),
(651, 115, 3, 1),
(652, 115, 9, 1),
(653, 113, 38, 1),
(654, 116, 5, 1),
(655, 116, 9, 1),
(656, 117, 3, 1),
(657, 117, 9, 1),
(658, 118, 36, 1),
(659, 118, 38, 1),
(660, 118, 44, 1),
(663, 119, 36, 1),
(664, 119, 44, 1),
(665, 120, 3, 1),
(666, 120, 9, 1),
(667, 121, 3, 1),
(668, 121, 9, 1),
(669, 122, 43, 1),
(672, 123, 36, 1),
(673, 123, 38, 1),
(674, 123, 40, 1),
(675, 124, 5, 1),
(676, 124, 9, 1),
(680, 125, 5, 1),
(681, 125, 9, 1),
(682, 126, 5, 1),
(683, 126, 9, 1),
(687, 128, 36, 1),
(688, 128, 43, 1),
(689, 129, 36, 1),
(690, 129, 38, 1),
(691, 129, 39, 1),
(692, 129, 40, 1),
(693, 129, 44, 1),
(694, 130, 5, 1),
(706, 131, 38, 1),
(707, 131, 40, 1),
(710, 132, 42, 1),
(714, 133, 36, 1),
(715, 133, 40, 1),
(716, 133, 44, 1),
(722, 141, 5, 1),
(723, 141, 9, 1),
(724, 142, 5, 1),
(725, 136, 45, 1),
(726, 136, 41, 1),
(727, 136, 42, 1),
(728, 136, 43, 1),
(730, 139, 5, 1),
(732, 135, 5, 1),
(733, 143, 37, 1),
(735, 134, 3, 1),
(736, 140, 5, 1),
(737, 140, 9, 1),
(740, 144, 45, 1),
(741, 144, 42, 1),
(742, 144, 43, 1),
(743, 145, 36, 1),
(744, 145, 38, 1),
(745, 145, 39, 1),
(746, 145, 40, 1),
(747, 145, 44, 1),
(748, 145, 43, 1),
(749, 146, 36, 1),
(750, 146, 44, 1),
(751, 147, 3, 1),
(763, 148, 5, 1),
(764, 150, 43, 1),
(765, 138, 5, 1),
(766, 151, 45, 1),
(767, 152, 2, 1),
(768, 149, 2, 1),
(771, 137, 38, 1),
(772, 153, 36, 1),
(773, 153, 38, 1),
(774, 153, 44, 1),
(775, 154, 38, 1),
(776, 154, 45, 1),
(777, 154, 42, 1),
(778, 154, 43, 1),
(779, 155, 36, 1),
(780, 155, 38, 1),
(781, 155, 40, 1),
(782, 156, 3, 1),
(783, 157, 43, 1),
(785, 158, 45, 1),
(786, 158, 41, 1),
(787, 158, 42, 1),
(788, 158, 43, 1),
(791, 159, 36, 1),
(792, 159, 44, 1),
(793, 161, 42, 1),
(794, 162, 5, 1),
(795, 163, 36, 1),
(796, 163, 39, 1),
(797, 163, 45, 1),
(798, 163, 40, 1),
(799, 163, 41, 1),
(800, 163, 42, 1),
(801, 163, 44, 1),
(802, 163, 43, 1),
(803, 164, 5, 1),
(804, 165, 36, 1),
(805, 165, 38, 1),
(806, 165, 40, 1),
(807, 160, 36, 1),
(808, 160, 40, 1),
(809, 168, 43, 1),
(810, 169, 38, 1),
(811, 167, 36, 1),
(812, 167, 44, 1),
(813, 170, 5, 1),
(814, 171, 36, 1),
(815, 171, 44, 1),
(817, 173, 3, 1),
(819, 174, 5, 1),
(820, 172, 2, 1),
(821, 175, 36, 1),
(822, 175, 44, 1),
(824, 176, 5, 1),
(825, 176, 9, 1),
(827, 166, 2, 1),
(828, 2, 3, 1),
(829, 2, 9, 1),
(833, 177, 36, 1),
(834, 177, 44, 1),
(835, 178, 38, 1),
(836, 178, 41, 1),
(837, 178, 43, 1),
(838, 179, 38, 1),
(839, 179, 43, 1),
(840, 180, 36, 1),
(841, 180, 38, 1),
(842, 180, 45, 1),
(843, 180, 40, 1),
(844, 180, 44, 1),
(845, 181, 3, 1),
(846, 182, 36, 1),
(847, 182, 38, 1),
(848, 182, 40, 1),
(853, 183, 38, 1),
(854, 183, 39, 1),
(855, 183, 40, 1),
(857, 184, 3, 1),
(859, 185, 3, 1),
(860, 186, 5, 1),
(862, 187, 5, 1),
(863, 188, 5, 1),
(865, 189, 5, 1),
(867, 190, 3, 1),
(870, 191, 36, 1),
(871, 191, 40, 1),
(872, 192, 41, 1),
(876, 194, 5, 1),
(877, 195, 38, 1),
(878, 195, 43, 1),
(879, 193, 5, 1),
(882, 196, 5, 1),
(885, 197, 5, 1),
(886, 197, 9, 1),
(888, 198, 5, 1),
(889, 199, 36, 1),
(890, 199, 44, 1),
(891, 200, 43, 1),
(892, 201, 2, 1),
(893, 201, 9, 1),
(897, 202, 36, 1),
(898, 202, 44, 1),
(899, 203, 36, 1),
(900, 203, 40, 1),
(910, 204, 36, 1),
(911, 204, 38, 1),
(912, 204, 39, 1),
(913, 204, 40, 1),
(914, 204, 44, 1),
(916, 205, 3, 1),
(922, 206, 5, 1),
(923, 207, 5, 1),
(924, 208, 38, 1),
(925, 208, 45, 1),
(926, 209, 3, 1),
(928, 210, 5, 1),
(931, 211, 36, 1),
(932, 211, 38, 1),
(934, 212, 5, 1),
(937, 213, 38, 1),
(938, 213, 43, 1),
(939, 214, 38, 1),
(940, 215, 45, 1),
(941, 216, 3, 1),
(943, 217, 41, 1),
(944, 217, 43, 1),
(945, 218, 39, 1),
(948, 219, 42, 1),
(949, 219, 43, 1),
(950, 220, 40, 1),
(954, 221, 38, 1),
(955, 221, 39, 1),
(956, 221, 42, 1),
(957, 222, 45, 1),
(958, 222, 41, 1),
(959, 222, 42, 1),
(960, 222, 43, 1),
(962, 223, 41, 1),
(965, 224, 38, 1),
(966, 224, 39, 1),
(967, 225, 36, 1),
(968, 225, 44, 1),
(969, 226, 36, 1),
(970, 226, 38, 1),
(971, 226, 39, 1),
(972, 226, 40, 1),
(973, 226, 44, 1),
(974, 226, 43, 1),
(976, 227, 3, 1),
(977, 227, 9, 1),
(978, 228, 5, 1),
(979, 229, 5, 1),
(980, 230, 2, 1),
(981, 230, 9, 1),
(982, 230, 36, 1),
(983, 230, 38, 1),
(984, 230, 39, 1),
(985, 230, 45, 1),
(986, 230, 40, 1),
(987, 230, 41, 1),
(988, 230, 42, 1),
(989, 230, 44, 1),
(990, 230, 43, 1),
(991, 231, 38, 1),
(992, 231, 39, 1),
(993, 231, 40, 1),
(994, 232, 5, 1),
(998, 234, 5, 1),
(999, 235, 38, 1),
(1000, 236, 38, 1),
(1001, 236, 39, 1),
(1002, 236, 40, 1),
(1005, 237, 36, 1),
(1006, 237, 44, 1),
(1009, 238, 36, 1),
(1010, 238, 40, 1),
(1011, 239, 42, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `fomento_status`
--

CREATE TABLE IF NOT EXISTS "fomento_status" (
  "id_fs" int(3) unsigned NOT NULL,
  "fs_nome" varchar(20) DEFAULT NULL COMMENT '[A 1 - Aberto], \n[B 2 - Conclu�do],\n[X 3 - Cancelado],\n[! 4 - Editar]',
  "fs_ativo" tinyint(1) unsigned DEFAULT '1'
);

--
-- Extraindo dados da tabela `fomento_status`
--

INSERT INTO `fomento_status` (`id_fs`, `fs_nome`, `fs_ativo`) VALUES
(1, 'Aberto', 1),
(2, 'Conclu�do', 1),
(3, 'Cancelado', 1),
(4, 'Editar', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `fomento_tipo`
--

CREATE TABLE IF NOT EXISTS "fomento_tipo" (
  "id_ftp" int(11) unsigned NOT NULL,
  "ftp_nome" varchar(45) DEFAULT NULL COMMENT 'Bolsas / Recursos Humanos\nAuxilio a Pesquisa\nCoopera��o Internacional\nPr�mios\nEventos\n...',
  "ftp_ativo" tinyint(1) unsigned DEFAULT '1'
);

--
-- Extraindo dados da tabela `fomento_tipo`
--

INSERT INTO `fomento_tipo` (`id_ftp`, `ftp_nome`, `ftp_ativo`) VALUES
(1, 'Bolsas / Recursos Humanos', 1),
(2, 'Auxilio a Pesquisa', 1),
(3, 'Coopera��o Internacional', 1),
(4, 'Pr�mios', 1),
(5, 'Eventos', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `gpus_cnpq`
--

CREATE TABLE IF NOT EXISTS "gpus_cnpq" (
  "id_gpus_cnpq" int(11) unsigned NOT NULL,
  "gpus_cnpq_nome" varchar(80) DEFAULT NULL COMMENT 'Nome que est� cadastrado no cnpq',
  "us_id" int(11) unsigned NOT NULL COMMENT 'vinculo com a tabela us_usuario'
);

-- --------------------------------------------------------

--
-- Estrutura da tabela `gp_area_predominante`
--

CREATE TABLE IF NOT EXISTS "gp_area_predominante" (
  "id_gpap" int(11) unsigned NOT NULL,
  "gpap_area_predominante" varchar(250) DEFAULT NULL,
  "gpap_cod_principal" varchar(20) NOT NULL COMMENT 'vinculo tabela de areas do conhecimento',
  "id_gp" int(11) unsigned NOT NULL
);

-- --------------------------------------------------------

--
-- Estrutura da tabela `gp_equipamento`
--

CREATE TABLE IF NOT EXISTS "gp_equipamento" (
  "id_gpe" int(11) unsigned NOT NULL,
  "gpe_equipamento" varchar(80) DEFAULT NULL,
  "gp_id" int(11) unsigned NOT NULL
);

-- --------------------------------------------------------

--
-- Estrutura da tabela `gp_forma_remuneracao`
--

CREATE TABLE IF NOT EXISTS "gp_forma_remuneracao" (
  "id_gpfr" int(11) unsigned NOT NULL,
  "gpfr_remuneracao" varchar(150) DEFAULT NULL,
  "gpfr_id" int(11) unsigned NOT NULL
);

-- --------------------------------------------------------

--
-- Estrutura da tabela `gp_grupo_pesquisa`
--

CREATE TABLE IF NOT EXISTS "gp_grupo_pesquisa" (
  "id_gp" int(11) unsigned NOT NULL,
  "gp_nome" varchar(150) NOT NULL,
  "gp_ano_formacao" int(4) DEFAULT NULL,
  "gp_dt_situacao" date DEFAULT NULL,
  "gp_dt_ultimo_envio" date DEFAULT NULL,
  "gp_instituicao_grupo" varchar(100) DEFAULT NULL,
  "gp_unidade" varchar(80) DEFAULT NULL,
  "gp_egp_espelho" varchar(80) DEFAULT NULL,
  "gps_id" int(10) unsigned NOT NULL COMMENT 'vinculo com a tabela grupo_pesquisa_situacao',
  "gp_logradouro" varchar(150) DEFAULT NULL,
  "gp_numero" varchar(8) DEFAULT NULL,
  "gp_complemento" varchar(45) DEFAULT NULL,
  "gp_bairro" varchar(60) DEFAULT NULL,
  "gp_uf" char(2) DEFAULT NULL,
  "gp_cidade" varchar(80) DEFAULT NULL,
  "gp_cep" varchar(10) DEFAULT NULL,
  "gp_cx_postal" varchar(10) DEFAULT NULL,
  "gp_latitude" varchar(20) DEFAULT NULL,
  "gp_longitude" varchar(20) DEFAULT NULL,
  "gp_telefone" varchar(20) DEFAULT NULL,
  "gp_fax" varchar(20) DEFAULT NULL,
  "gp_contato" varchar(80) DEFAULT NULL,
  "gp_website" varchar(80) DEFAULT NULL,
  "gp_repercussao" text NOT NULL,
  "gp_equip_proprio" char(1) DEFAULT NULL COMMENT 'equimapentos mais de 100 mil\n''S'' - Sim\n''N'' - N�o'
);

-- --------------------------------------------------------

--
-- Estrutura da tabela `gp_instituicao_parceira`
--

CREATE TABLE IF NOT EXISTS "gp_instituicao_parceira" (
  "id_gpip" int(11) unsigned NOT NULL,
  "gpip_nome" varchar(80) DEFAULT NULL,
  "gpip_sigla" varchar(10) DEFAULT NULL,
  "gpip_uf" char(2) DEFAULT NULL,
  "gp_id" int(11) unsigned NOT NULL,
  "gpip_razao_social" varchar(90) DEFAULT NULL,
  "gpip_cnpj" varchar(20) DEFAULT NULL,
  "gpip_natureza_juridica" varchar(60) DEFAULT NULL,
  "gpip_faixa_po" varchar(15) DEFAULT NULL,
  "gpip_cidade" varchar(60) DEFAULT NULL,
  "gpip_setores_atividade_economica" text,
  "gpip_use" int(11) unsigned NOT NULL,
  "gpip_latitude" varchar(20) NOT NULL,
  "gpip_longitude" varchar(20) NOT NULL,
  "gpip_ordem" int(2) NOT NULL
);

-- --------------------------------------------------------

--
-- Estrutura da tabela `gp_pp`
--

CREATE TABLE IF NOT EXISTS "gp_pp" (
  "gp_id" int(11) unsigned NOT NULL COMMENT 'vinculo com grupo de pesquisa',
  "pp_id" int(11) unsigned NOT NULL COMMENT 'vinculo com programa de pos',
  "gp_pp_dt_vinculo" date DEFAULT NULL,
  "gp_pp_dt_desvinculo" date DEFAULT NULL,
  "gp_pp_ativo" tinyint(1) unsigned DEFAULT '1'
);

-- --------------------------------------------------------

--
-- Estrutura da tabela `gp_recursos_humanos`
--

CREATE TABLE IF NOT EXISTS "gp_recursos_humanos" (
  "id_gprh" int(11) unsigned NOT NULL,
  "gprh_recurso_humano" varchar(45) DEFAULT NULL,
  "gprh_ativo" tinyint(1) DEFAULT '1'
);

-- --------------------------------------------------------

--
-- Estrutura da tabela `gp_rede_pesquisa`
--

CREATE TABLE IF NOT EXISTS "gp_rede_pesquisa" (
  "id_gprp" int(10) unsigned NOT NULL,
  "gprp_rede_pesquisa" varchar(150) DEFAULT NULL,
  "gprp_ativo" tinyint(1) DEFAULT '1',
  "gp_id" int(11) unsigned NOT NULL
);

-- --------------------------------------------------------

--
-- Estrutura da tabela `gp_situacao`
--

CREATE TABLE IF NOT EXISTS "gp_situacao" (
  "id_gps" int(10) unsigned NOT NULL,
  "gps_situacao" varchar(45) DEFAULT NULL COMMENT 'Certificado',
  "gpd_ativo" tinyint(1) unsigned DEFAULT '1'
);

-- --------------------------------------------------------

--
-- Estrutura da tabela `gp_software`
--

CREATE TABLE IF NOT EXISTS "gp_software" (
  "id_gps" int(11) unsigned NOT NULL,
  "gps_software" varchar(80) DEFAULT NULL,
  "gp_id" int(11) unsigned NOT NULL
);

-- --------------------------------------------------------

--
-- Estrutura da tabela `gp_tipo_relacao`
--

CREATE TABLE IF NOT EXISTS "gp_tipo_relacao" (
  "id_gptr" int(11) unsigned NOT NULL,
  "gptr_relacao" varchar(150) DEFAULT NULL,
  "gpip_id" int(11) unsigned NOT NULL
);

-- --------------------------------------------------------

--
-- Estrutura da tabela `gp_usuario`
--

CREATE TABLE IF NOT EXISTS "gp_usuario" (
  "us_id" int(11) unsigned NOT NULL,
  "gp_id" int(11) unsigned NOT NULL,
  "lp_id" int(11) unsigned NOT NULL,
  "gpus_cnpq_id" int(11) unsigned NOT NULL COMMENT 'vinculo com tabela gpus_cnpq',
  "usgp_dt_inclusao" date DEFAULT NULL,
  "usgp_dt_saida" date DEFAULT NULL COMMENT 'Se dt_saida n�o for nula esse participante ser� egresso',
  "usgp_lider" int(1) DEFAULT '1' COMMENT '[1 - Participante], [2 - L�der]',
  "gprh_gp_id" int(11) unsigned NOT NULL COMMENT 'vincula com gp_recursos_humanos para grupo de pesquisa',
  "gprh_lp_id" int(11) unsigned NOT NULL COMMENT 'vincula com gp_recursos_humanos para linha de pesquisa Essa chave � redundante para verificar inconsistencia de Pesquisador e Estudante'
);

-- --------------------------------------------------------

--
-- Estrutura da tabela `idioma`
--

CREATE TABLE IF NOT EXISTS "idioma" (
  "id_i" int(11) unsigned NOT NULL,
  "i_nome" varchar(45) DEFAULT NULL COMMENT '[1 - Portugu�s],\n[2 - ingles], ...',
  "i_ativo" tinyint(1) unsigned DEFAULT '1',
  "i_codificacao" varchar(10) DEFAULT NULL COMMENT 'pt_BR / us_EN'
);

--
-- Extraindo dados da tabela `idioma`
--

INSERT INTO `idioma` (`id_i`, `i_nome`, `i_ativo`, `i_codificacao`) VALUES
(1, 'Portugu�s', 1, 'pt_BR'),
(2, 'Ingl�s', 1, 'us_EN');

-- --------------------------------------------------------

--
-- Estrutura da tabela `logins`
--

CREATE TABLE IF NOT EXISTS "logins" (
  "id_us" bigint(20) unsigned NOT NULL,
  "us_nome" char(120) DEFAULT NULL,
  "us_login" char(40) DEFAULT NULL,
  "us_senha" char(100) DEFAULT NULL,
  "us_lastupdate" bigint(20) DEFAULT NULL,
  "us_cpf" char(15) DEFAULT NULL,
  "us_dt_admissao" bigint(20) DEFAULT NULL,
  "us_cracha" char(15) DEFAULT NULL,
  "us_perfil" text,
  "us_id" char(15) DEFAULT NULL
);

--
-- Extraindo dados da tabela `logins`
--

INSERT INTO `logins` (`id_us`, `us_nome`, `us_login`, `us_senha`, `us_lastupdate`, `us_cpf`, `us_dt_admissao`, `us_cracha`, `us_perfil`, `us_id`) VALUES
(1, 'Rene Faustino Gabriel Junior', 'RENE.GABRIEL', '876197588c22835cee493fea3e2d1c2e', 20150611, '72952105987', 20150611, '', NULL, '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `logins_log`
--

CREATE TABLE IF NOT EXISTS "logins_log" (
  "id_ul" bigint(20) unsigned NOT NULL,
  "ul_data" int(11) NOT NULL,
  "ul_hora" char(8) NOT NULL,
  "ul_ip" char(15) NOT NULL,
  "ul_proto" char(5) NOT NULL,
  "ul_cpf" char(15) NOT NULL
);

--
-- Extraindo dados da tabela `logins_log`
--

INSERT INTO `logins_log` (`id_ul`, `ul_data`, `ul_hora`, `ul_ip`, `ul_proto`, `ul_cpf`) VALUES
(2, 20150615, '08:33:58', '127.0.0.1', 'LOGIN', '72952105987'),
(3, 20150618, '11:11:39', '10.96.155.106', 'ADR', '72952105987'),
(4, 20150623, '17:39:49', '10.96.155.106', 'ADR', '72952105987'),
(5, 20150624, '08:19:29', '10.96.155.106', 'ADR', '72952105987'),
(6, 20150624, '08:19:29', '10.96.155.106', 'ADR', '72952105987');

-- --------------------------------------------------------

--
-- Estrutura da tabela `logins_perfil`
--

CREATE TABLE IF NOT EXISTS "logins_perfil" (
  "id_usp" bigint(20) unsigned NOT NULL,
  "usp_codigo" char(4) DEFAULT NULL,
  "usp_descricao" char(50) DEFAULT NULL,
  "usp_ativo" int(11) DEFAULT NULL
);

--
-- Extraindo dados da tabela `logins_perfil`
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
(10, '#CSF', 'Ci�ncia sem Fronteiras', 1),
(11, '#PIB', 'Membros do PIBIC', 1),
(12, '#PIT', 'Revisores e Tradutores PIBIC/PIBITI', 1),
(13, '#CEU', 'Membro do CEUA', 1),
(14, '#CES', 'Secretaria do CEUA', 1),
(15, '#CPS', 'Secret�ria Executiva do CIP', 1),
(16, '#SEP', 'Secretaria da P�s-Gradua��o', 1),
(17, '#SPA', 'Secretaria do PPG Gest�o Urbana', 1),
(18, '#SPB', 'Secretaria do PPG Educa��o', 1),
(19, '#SPC', 'Secretaria do PPG Ci�ncias da Sa�de', 1),
(20, '#OBS', 'Observador CIP', 1),
(21, '#CNQ', 'Observador CNPq', 1),
(22, '#SPD', 'Secretaria do PPG  Engenharia de Produ��o e Sistem', 1),
(23, '#SPE', 'Secretaria do PPG Odontologia', 1),
(24, '#SPF', 'Secretaria do PPG Administra��o', 1),
(25, '#SPR', 'Secretaria do PPG Ci�ncia Animal', 1),
(26, '#SPH', 'Secretaria do PPG Teologia', 1),
(27, '#SPG', 'Secretaria Executiva da P�s-Gradua��o', 1),
(28, '#SPJ', 'Secretaria do PPG Direito', 1),
(29, '#SPL', 'Secretaria do PPG Filosofia', 1),
(30, '#SPM', 'Secretaria do PPG Engenharia Mec�nica', 1),
(31, '#SPN', 'Secretaria do PPG Bio�tica', 1),
(32, '#SPP', 'Secretaria do PPG Gest�o de Cooperativas', 1),
(33, '#SPO', 'Secretaria do PPG Inform�tica', 1),
(34, '#SPT', 'Secretaria do PPG Tecnologia em Sa�de', 1),
(35, '#CPP', 'Coordenador Administrativo do PIBIC/PIBITI', 1),
(36, '#FNP', 'Fundo de Pesquisa - Adm', 1),
(37, '#DIP', 'Diretora de Pesquisa', 1),
(38, '#TST', 'Testing ground', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `logins_perfil_ativo`
--

CREATE TABLE IF NOT EXISTS "logins_perfil_ativo" (
  "id_up" bigint(20) unsigned NOT NULL,
  "up_perfil" tinyint(4) DEFAULT '0',
  "up_data" date DEFAULT '0000-00-00',
  "up_data_end" date DEFAULT '0000-00-00',
  "up_ativo" tinyint(11) DEFAULT NULL,
  "up_user" int(11) NOT NULL
);

-- --------------------------------------------------------

--
-- Estrutura da tabela `lp_area_conhecimento`
--

CREATE TABLE IF NOT EXISTS "lp_area_conhecimento" (
  "id_lpac" int(11) unsigned NOT NULL,
  "lpac_nome" varchar(250) DEFAULT NULL,
  "lapc_cod_principal" varchar(20) NOT NULL COMMENT 'vinculo tabela de areas do conhecimento',
  "lp_id" int(11) unsigned NOT NULL
);

-- --------------------------------------------------------

--
-- Estrutura da tabela `lp_linha_pesquisa`
--

CREATE TABLE IF NOT EXISTS "lp_linha_pesquisa" (
  "id_lp" int(11) unsigned NOT NULL,
  "lp_nome" varchar(150) DEFAULT NULL,
  "lp_objetivo" text,
  "lp_espelho" varchar(80) NOT NULL
);

-- --------------------------------------------------------

--
-- Estrutura da tabela `lp_palavra_chave`
--

CREATE TABLE IF NOT EXISTS "lp_palavra_chave" (
  "id_lppc" int(11) unsigned NOT NULL,
  "lppc_palavra" varchar(60) DEFAULT NULL,
  "lp_id" int(11) unsigned NOT NULL
);

-- --------------------------------------------------------

--
-- Estrutura da tabela `lp_pp`
--

CREATE TABLE IF NOT EXISTS "lp_pp" (
  "pp_id" int(11) unsigned NOT NULL COMMENT 'vinculo com programa de pos',
  "lp_id" int(11) unsigned NOT NULL COMMENT 'vinculo com linha de pesquisa',
  "lp_pp_dt_vinculo" date DEFAULT NULL,
  "lp_pp_dt_desvinculo" date DEFAULT NULL,
  "lp_pp_ativo" tinyint(1) DEFAULT '1'
);

-- --------------------------------------------------------

--
-- Estrutura da tabela `lp_setor_aplicacao`
--

CREATE TABLE IF NOT EXISTS "lp_setor_aplicacao" (
  "id_lpsa" int(11) unsigned NOT NULL,
  "lpsa_setor" varchar(250) DEFAULT NULL,
  "lp_id" int(11) unsigned DEFAULT NULL
);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pais`
--

CREATE TABLE IF NOT EXISTS "pais" (
  "id" bigint(20) unsigned NOT NULL,
  "iso" char(2) NOT NULL,
  "iso3" char(3) NOT NULL,
  "numcode" char(3) NOT NULL,
  "nome" varchar(80) NOT NULL
);

--
-- Extraindo dados da tabela `pais`
--

INSERT INTO `pais` (`id`, `iso`, `iso3`, `numcode`, `nome`) VALUES
(1, 'AF', 'AFG', '004', 'Afeganist�o'),
(2, 'ZA', 'ZAF', '710', '�frica do Sul'),
(3, 'AX', 'ALA', '248', '�land, Ilhas'),
(4, 'AL', 'ALB', '008', 'Alb�nia'),
(5, 'DE', 'DEU', '276', 'Alemanha'),
(6, 'AD', 'AND', '020', 'Andorra'),
(7, 'AO', 'AGO', '024', 'Angola'),
(8, 'AI', 'AIA', '660', 'Anguilla'),
(9, 'AQ', 'ATA', '010', 'Ant�rctida'),
(10, 'AG', 'ATG', '028', 'Antigua e Barbuda'),
(11, 'AN', 'ANT', '530', 'Antilhas Holandesas'),
(12, 'SA', 'SAU', '682', 'Ar�bia Saudita'),
(13, 'DZ', 'DZA', '012', 'Arg�lia'),
(14, 'AR', 'ARG', '032', 'Argentina'),
(15, 'AM', 'ARM', '051', 'Arm�nia'),
(16, 'AW', 'ABW', '533', 'Aruba'),
(17, 'AU', 'AUS', '036', 'Austr�lia'),
(18, 'AT', 'AUT', '040', '�ustria'),
(19, 'AZ', 'AZE', '031', 'Azerbeij�o'),
(20, 'BS', 'BHS', '044', 'Bahamas'),
(21, 'BH', 'BHR', '048', 'Bahrain'),
(22, 'BD', 'BGD', '050', 'Bangladesh'),
(23, 'BB', 'BRB', '052', 'Barbados'),
(24, 'BE', 'BEL', '056', 'B�lgica'),
(25, 'BZ', 'BLZ', '084', 'Belize'),
(26, 'BJ', 'BEN', '204', 'Benin'),
(27, 'BM', 'BMU', '060', 'Bermuda'),
(28, 'BY', 'BLR', '112', 'Bielo-R�ssia'),
(29, 'BO', 'BOL', '068', 'Bol�via'),
(30, 'BA', 'BIH', '070', 'B�snia-Herzegovina'),
(31, 'BW', 'BWA', '072', 'Botswana'),
(32, 'BV', 'BVT', '074', 'Bouvet, Ilha'),
(33, 'BR', 'BRA', '076', 'Brasil'),
(34, 'BN', 'BRN', '096', 'Brunei'),
(35, 'BG', 'BGR', '100', 'Bulg�ria'),
(36, 'BF', 'BFA', '854', 'Burkina Faso'),
(37, 'BI', 'BDI', '108', 'Burundi'),
(38, 'BT', 'BTN', '064', 'But�o'),
(39, 'CV', 'CPV', '132', 'Cabo Verde'),
(40, 'KH', 'KHM', '116', 'Cambodja'),
(41, 'CM', 'CMR', '120', 'Camar�es'),
(42, 'CA', 'CAN', '124', 'Canad�'),
(43, 'KY', 'CYM', '136', 'Cayman, Ilhas'),
(44, 'KZ', 'KAZ', '398', 'Cazaquist�o'),
(45, 'CF', 'CAF', '140', 'Centro-africana, Rep�blica'),
(46, 'TD', 'TCD', '148', 'Chade'),
(47, 'CZ', 'CZE', '203', 'Checa, Rep�blica'),
(48, 'CL', 'CHL', '152', 'Chile'),
(49, 'CN', 'CHN', '156', 'China'),
(50, 'CY', 'CYP', '196', 'Chipre'),
(51, 'CX', 'CXR', '162', 'Christmas, Ilha'),
(52, 'CC', 'CCK', '166', 'Cocos, Ilhas'),
(53, 'CO', 'COL', '170', 'Col�mbia'),
(54, 'KM', 'COM', '174', 'Comores'),
(55, 'CG', 'COG', '178', 'Congo, Rep�blica do'),
(56, 'CD', 'COD', '180', 'Congo, Rep�blica Democr�tica do (antigo Zaire)'),
(57, 'CK', 'COK', '184', 'Cook, Ilhas'),
(58, 'KR', 'KOR', '410', 'Coreia do Sul'),
(59, 'KP', 'PRK', '408', 'Coreia, Rep�blica Democr�tica da (Coreia do Norte)'),
(60, 'CI', 'CIV', '384', 'Costa do Marfim'),
(61, 'CR', 'CRI', '188', 'Costa Rica'),
(62, 'HR', 'HRV', '191', 'Cro�cia'),
(63, 'CU', 'CUB', '192', 'Cuba'),
(64, 'DK', 'DNK', '208', 'Dinamarca'),
(65, 'DJ', 'DJI', '262', 'Djibouti'),
(66, 'DM', 'DMA', '212', 'Dominica'),
(67, 'DO', 'DOM', '214', 'Dominicana, Rep�blica'),
(68, 'EG', 'EGY', '818', 'Egipto'),
(69, 'SV', 'SLV', '222', 'El Salvador'),
(70, 'AE', 'ARE', '784', 'Emiratos �rabes Unidos'),
(71, 'EC', 'ECU', '218', 'Equador'),
(72, 'ER', 'ERI', '232', 'Eritreia'),
(73, 'SK', 'SVK', '703', 'Eslov�quia'),
(74, 'SI', 'SVN', '705', 'Eslov�nia'),
(75, 'ES', 'ESP', '724', 'Espanha'),
(76, 'US', 'USA', '840', 'Estados Unidos da Am�rica'),
(77, 'EE', 'EST', '233', 'Est�nia'),
(78, 'ET', 'ETH', '231', 'Eti�pia'),
(79, 'FO', 'FRO', '234', 'Faroe, Ilhas'),
(80, 'FJ', 'FJI', '242', 'Fiji'),
(81, 'PH', 'PHL', '608', 'Filipinas'),
(82, 'FI', 'FIN', '246', 'Finl�ndia'),
(83, 'FR', 'FRA', '250', 'Fran�a'),
(84, 'GA', 'GAB', '266', 'Gab�o'),
(85, 'GM', 'GMB', '270', 'G�mbia'),
(86, 'GH', 'GHA', '288', 'Gana'),
(87, 'GE', 'GEO', '268', 'Ge�rgia'),
(88, 'GS', 'SGS', '239', 'Ge�rgia do Sul e Sandwich do Sul, Ilhas'),
(89, 'GI', 'GIB', '292', 'Gibraltar'),
(90, 'GR', 'GRC', '300', 'Gr�cia'),
(91, 'GD', 'GRD', '308', 'Grenada'),
(92, 'GL', 'GRL', '304', 'Gronel�ndia'),
(93, 'GP', 'GLP', '312', 'Guadeloupe'),
(94, 'GU', 'GUM', '316', 'Guam'),
(95, 'GT', 'GTM', '320', 'Guatemala'),
(96, 'GG', 'GGY', '831', 'Guernsey'),
(97, 'GY', 'GUY', '328', 'Guiana'),
(98, 'GF', 'GUF', '254', 'Guiana Francesa'),
(99, 'GW', 'GNB', '624', 'Guin�-Bissau'),
(100, 'GN', 'GIN', '324', 'Guin�-Conacri'),
(101, 'GQ', 'GNQ', '226', 'Guin� Equatorial'),
(102, 'HT', 'HTI', '332', 'Haiti'),
(103, 'HM', 'HMD', '334', 'Heard e Ilhas McDonald, Ilha'),
(104, 'HN', 'HND', '340', 'Honduras'),
(105, 'HK', 'HKG', '344', 'Hong Kong'),
(106, 'HU', 'HUN', '348', 'Hungria'),
(107, 'YE', 'YEM', '887', 'I�men'),
(108, 'IN', 'IND', '356', '�ndia'),
(109, 'ID', 'IDN', '360', 'Indon�sia'),
(110, 'IQ', 'IRQ', '368', 'Iraque'),
(111, 'IR', 'IRN', '364', 'Ir�o'),
(112, 'IE', 'IRL', '372', 'Irlanda'),
(113, 'IS', 'ISL', '352', 'Isl�ndia'),
(114, 'IL', 'ISR', '376', 'Israel'),
(115, 'IT', 'ITA', '380', 'It�lia'),
(116, 'JM', 'JAM', '388', 'Jamaica'),
(117, 'JP', 'JPN', '392', 'Jap�o'),
(118, 'JE', 'JEY', '832', 'Jersey'),
(119, 'JO', 'JOR', '400', 'Jord�nia'),
(120, 'KI', 'KIR', '296', 'Kiribati'),
(121, 'KW', 'KWT', '414', 'Kuwait'),
(122, 'LA', 'LAO', '418', 'Laos'),
(123, 'LS', 'LSO', '426', 'Lesoto'),
(124, 'LV', 'LVA', '428', 'Let�nia'),
(125, 'LB', 'LBN', '422', 'L�bano'),
(126, 'LR', 'LBR', '430', 'Lib�ria'),
(127, 'LY', 'LBY', '434', 'L�bia'),
(128, 'LI', 'LIE', '438', 'Liechtenstein'),
(129, 'LT', 'LTU', '440', 'Litu�nia'),
(130, 'LU', 'LUX', '442', 'Luxemburgo'),
(131, 'MO', 'MAC', '446', 'Macau'),
(132, 'MK', 'MKD', '807', 'Maced�nia, Rep�blica da'),
(133, 'MG', 'MDG', '450', 'Madag�scar'),
(134, 'MY', 'MYS', '458', 'Mal�sia'),
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
(145, 'MU', 'MUS', '480', 'Maur�cia'),
(146, 'MR', 'MRT', '478', 'Maurit�nia'),
(147, 'YT', 'MYT', '175', 'Mayotte'),
(148, 'UM', 'UMI', '581', 'Menores Distantes dos Estados Unidos, Ilhas'),
(149, 'MX', 'MEX', '484', 'M�xico'),
(150, 'MM', 'MMR', '104', 'Myanmar (antiga Birm�nia)'),
(151, 'FM', 'FSM', '583', 'Micron�sia, Estados Federados da'),
(152, 'MZ', 'MOZ', '508', 'Mo�ambique'),
(153, 'MD', 'MDA', '498', 'Mold�via'),
(154, 'MC', 'MCO', '492', 'M�naco'),
(155, 'MN', 'MNG', '496', 'Mong�lia'),
(156, 'ME', 'MNE', '499', 'Montenegro'),
(157, 'MS', 'MSR', '500', 'Montserrat'),
(158, 'NA', 'NAM', '516', 'Nam�bia'),
(159, 'NR', 'NRU', '520', 'Nauru'),
(160, 'NP', 'NPL', '524', 'Nepal'),
(161, 'NI', 'NIC', '558', 'Nicar�gua'),
(162, 'NE', 'NER', '562', 'N�ger'),
(163, 'NG', 'NGA', '566', 'Nig�ria'),
(164, 'NU', 'NIU', '570', 'Niue'),
(165, 'NF', 'NFK', '574', 'Norfolk, Ilha'),
(166, 'NO', 'NOR', '578', 'Noruega'),
(167, 'NC', 'NCL', '540', 'Nova Caled�nia'),
(168, 'NZ', 'NZL', '554', 'Nova Zel�ndia (Aotearoa)'),
(169, 'OM', 'OMN', '512', 'Oman'),
(170, 'NL', 'NLD', '528', 'Pa�ses Baixos (Holanda)'),
(171, 'PW', 'PLW', '585', 'Palau'),
(172, 'PS', 'PSE', '275', 'Palestina'),
(173, 'PA', 'PAN', '591', 'Panam�'),
(174, 'PG', 'PNG', '598', 'Papua-Nova Guin�'),
(175, 'PK', 'PAK', '586', 'Paquist�o'),
(176, 'PY', 'PRY', '600', 'Paraguai'),
(177, 'PE', 'PER', '604', 'Peru'),
(178, 'PN', 'PCN', '612', 'Pitcairn'),
(179, 'PF', 'PYF', '258', 'Polin�sia Francesa'),
(180, 'PL', 'POL', '616', 'Pol�nia'),
(181, 'PR', 'PRI', '630', 'Porto Rico'),
(182, 'PT', 'PRT', '620', 'Portugal'),
(183, 'QA', 'QAT', '634', 'Qatar'),
(184, 'KE', 'KEN', '404', 'Qu�nia'),
(185, 'KG', 'KGZ', '417', 'Quirguist�o'),
(186, 'GB', 'GBR', '826', 'Reino Unido da Gr�-Bretanha e Irlanda do Norte'),
(187, 'RE', 'REU', '638', 'Reuni�o'),
(188, 'RO', 'ROU', '642', 'Rom�nia'),
(189, 'RW', 'RWA', '646', 'Ruanda'),
(190, 'RU', 'RUS', '643', 'R�ssia'),
(191, 'EH', 'ESH', '732', 'Saara Ocidental'),
(192, 'AS', 'ASM', '016', 'Samoa Americana'),
(193, 'WS', 'WSM', '882', 'Samoa (Samoa Ocidental)'),
(194, 'PM', 'SPM', '666', 'Saint Pierre et Miquelon'),
(195, 'SB', 'SLB', '090', 'Salom�o, Ilhas'),
(196, 'KN', 'KNA', '659', 'S�o Crist�v�o e N�vis (Saint Kitts e Nevis)'),
(197, 'SM', 'SMR', '674', 'San Marino'),
(198, 'ST', 'STP', '678', 'S�o Tom� e Pr�ncipe'),
(199, 'VC', 'VCT', '670', 'S�o Vicente e Granadinas'),
(200, 'SH', 'SHN', '654', 'Santa Helena'),
(201, 'LC', 'LCA', '662', 'Santa L�cia'),
(202, 'SN', 'SEN', '686', 'Senegal'),
(203, 'SL', 'SLE', '694', 'Serra Leoa'),
(204, 'RS', 'SRB', '688', 'S�rvia'),
(205, 'SC', 'SYC', '690', 'Seychelles'),
(206, 'SG', 'SGP', '702', 'Singapura'),
(207, 'SY', 'SYR', '760', 'S�ria'),
(208, 'SO', 'SOM', '706', 'Som�lia'),
(209, 'LK', 'LKA', '144', 'Sri Lanka'),
(210, 'SZ', 'SWZ', '748', 'Suazil�ndia'),
(211, 'SD', 'SDN', '736', 'Sud�o'),
(212, 'SE', 'SWE', '752', 'Su�cia'),
(213, 'CH', 'CHE', '756', 'Su��a'),
(214, 'SR', 'SUR', '740', 'Suriname'),
(215, 'SJ', 'SJM', '744', 'Svalbard e Jan Mayen'),
(216, 'TH', 'THA', '764', 'Tail�ndia'),
(217, 'TW', 'TWN', '158', 'Taiwan'),
(218, 'TJ', 'TJK', '762', 'Tajiquist�o'),
(219, 'TZ', 'TZA', '834', 'Tanz�nia'),
(220, 'TF', 'ATF', '260', 'Terras Austrais e Ant�rticas Francesas (TAAF)'),
(221, 'IO', 'IOT', '086', 'Territ�rio Brit�nico do Oceano �ndico'),
(222, 'TL', 'TLS', '626', 'Timor-Leste'),
(223, 'TG', 'TGO', '768', 'Togo'),
(224, 'TK', 'TKL', '772', 'Toquelau'),
(225, 'TO', 'TON', '776', 'Tonga'),
(226, 'TT', 'TTO', '780', 'Trindade e Tobago'),
(227, 'TN', 'TUN', '788', 'Tun�sia'),
(228, 'TC', 'TCA', '796', 'Turks e Caicos'),
(229, 'TM', 'TKM', '795', 'Turquemenist�o'),
(230, 'TR', 'TUR', '792', 'Turquia'),
(231, 'TV', 'TUV', '798', 'Tuvalu'),
(232, 'UA', 'UKR', '804', 'Ucr�nia'),
(233, 'UG', 'UGA', '800', 'Uganda'),
(234, 'UY', 'URY', '858', 'Uruguai'),
(235, 'UZ', 'UZB', '860', 'Usbequist�o'),
(236, 'VU', 'VUT', '548', 'Vanuatu'),
(237, 'VA', 'VAT', '336', 'Vaticano'),
(238, 'VE', 'VEN', '862', 'Venezuela'),
(239, 'VN', 'VNM', '704', 'Vietname'),
(240, 'VI', 'VIR', '850', 'Virgens Americanas, Ilhas'),
(241, 'VG', 'VGB', '092', 'Virgens Brit�nicas, Ilhas'),
(242, 'WF', 'WLF', '876', 'Wallis e Futuna'),
(243, 'ZM', 'ZMB', '894', 'Z�mbia'),
(244, 'ZW', 'ZWE', '716', 'Zimbabwe');

-- --------------------------------------------------------

--
-- Estrutura da tabela `programa_pos`
--

CREATE TABLE IF NOT EXISTS "programa_pos" (
  "id_pp" int(11) unsigned NOT NULL,
  "pp_nome" varchar(100) NOT NULL,
  "pp_sigla" varchar(10) NOT NULL,
  "pp_cursos" tinyint(1) DEFAULT '1' COMMENT 'se = 1 somente mestrado\nse = 2 mestrado e doutorado\nse = 3 mestrado, doutorado e p�s-doutorado',
  "pp_conceito" int(2) DEFAULT NULL COMMENT 'conceito do curso de pos',
  "pp_ano_inicio" int(4) DEFAULT NULL COMMENT 'data de inicio do programa',
  "pp_email1" varchar(100) DEFAULT NULL COMMENT 'email do programa',
  "pp_email2" varchar(100) DEFAULT NULL,
  "pp_fone1" varchar(14) DEFAULT NULL COMMENT 'fone do programa',
  "pp_fone2" varchar(14) DEFAULT NULL COMMENT 'fone do programa',
  "pp_ativo" tinyint(1) unsigned NOT NULL DEFAULT '1',
  "id_us_coordenador" int(11) unsigned NOT NULL,
  "id_us_secretaria1" int(11) unsigned NOT NULL,
  "id_us_secretaria2" int(11) unsigned DEFAULT NULL,
  "es_id" int(11) unsigned NOT NULL COMMENT 'vinculo escola',
  "c_id" int(11) unsigned NOT NULL COMMENT 'vinculo campus'
);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pro_equipamento`
--

CREATE TABLE IF NOT EXISTS "pro_equipamento" (
  "id_pe" bigint(20) unsigned NOT NULL,
  "pe_nome" char(250) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  "pe_marca" varchar(40) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  "pe_modelo" char(40) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  "pe_preco" double NOT NULL,
  "pe_tipo" int(11) NOT NULL,
  "pe_part_number" varchar(40) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  "pe_descricao_1" text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  "pe_descricao_2" text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  "pe_descricao_3" text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  "pe_ativo" int(11) NOT NULL DEFAULT '1'
);

--
-- Extraindo dados da tabela `pro_equipamento`
--

INSERT INTO `pro_equipamento` (`id_pe`, `pe_nome`, `pe_marca`, `pe_modelo`, `pe_preco`, `pe_tipo`, `pe_part_number`, `pe_descricao_1`, `pe_descricao_2`, `pe_descricao_3`, `pe_ativo`) VALUES
(1, 'Microsc�pio triocular', 'Carl Zeiss', 'Axio Scope A1', 100511, 1, '', '0', '', '', 1),
(2, 'Microsc�pio Eletr�nico de Varredura', '', '', 0, 1, '', '', '', '', 1),
(3, 'Servidor Sun Blade 6048 Chassis base assembly', 'Sun', '6048', 289917.71, 2, '', '', '', '', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pro_equipamento_contabil`
--

CREATE TABLE IF NOT EXISTS "pro_equipamento_contabil" (
  "id_pec" bigint(20) unsigned NOT NULL,
  "pec_descricao" varchar(80) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  "pec_ativo" tinyint(4) NOT NULL DEFAULT '1'
);

--
-- Extraindo dados da tabela `pro_equipamento_contabil`
--

INSERT INTO `pro_equipamento_contabil` (`id_pec`, `pec_descricao`, `pec_ativo`) VALUES
(1, 'Aparelhos de Medicina e Cirurgia', 1),
(2, 'Computadores, Perif�ricos e Rede', 1),
(3, 'Equipamentos Agr�colas e Agropecu�rios', 1),
(4, 'Equipamentos de Audio e V�deo', 1),
(5, 'Equipamentos de Laborat�rio', 1),
(6, 'Equipamentos de Odontologia', 1),
(7, 'Equipamentos de Telecomunica��o', 1),
(8, 'Equipamentos Hospitalares', 1),
(9, 'M�quinas e Equipamentos (Ferramentas)', 1),
(10, 'M�veis e Utens�lios de Escrit�rio', 1),
(11, 'M�veis e Utens�lios Dom�sticos', 1),
(12, 'M�veis Hospitalares', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pro_equipamento_item`
--

CREATE TABLE IF NOT EXISTS "pro_equipamento_item" (
  "id_pei" bigint(20) unsigned NOT NULL,
  "pei_equipamento" int(11) NOT NULL,
  "pei_patrimonio" char(30) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  "pei_serial" char(30) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  "pei_laboratorio" int(11) NOT NULL,
  "pei_aquisicao" date NOT NULL DEFAULT '0000-00-00',
  "pei_convenio" char(20) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  "pei_obs" text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  "pei_status" int(11) NOT NULL,
  "pei_valor" double NOT NULL,
  "pei_obs_2" text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  "pei_ativo" tinyint(4) NOT NULL
);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pro_equipamento_laboratorio`
--

CREATE TABLE IF NOT EXISTS "pro_equipamento_laboratorio" (
  "id_pel" bigint(20) unsigned NOT NULL,
  "pel_descricao" char(150) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  "pel_escola" int(11) NOT NULL,
  "pel_responsavel" int(11) NOT NULL,
  "pel_localizacao" text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  "pel_atualizado" int(11) NOT NULL,
  "pel_lat" double NOT NULL,
  "pel_log" double NOT NULL,
  "pel_ativo" int(11) NOT NULL
);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pro_equipamento_status`
--

CREATE TABLE IF NOT EXISTS "pro_equipamento_status" (
  "id_pes" bigint(20) unsigned NOT NULL,
  "pes_descricao" char(150) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  "pes_color" char(7) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  "pes_ativo" tinyint(4) NOT NULL DEFAULT '0'
);

--
-- Extraindo dados da tabela `pro_equipamento_status`
--

INSERT INTO `pro_equipamento_status` (`id_pes`, `pes_descricao`, `pes_color`, `pes_ativo`) VALUES
(1, 'Or�amenta��o', '', 1),
(2, 'Licita��o', '', 1),
(3, 'Instala��o', '', 1),
(4, 'Solicita��o de compras', '', 1),
(5, 'Aquisi��o', '', 1),
(6, 'Aguardando instala��o', '', 1),
(7, 'Instalado', '', 1),
(8, 'Em conserto', '', 1),
(9, 'Com defeito', '', 1),
(10, 'Baixado do patrimonio', '', 1),
(11, 'Roubado', '', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pro_equipamento_tipo`
--

CREATE TABLE IF NOT EXISTS "pro_equipamento_tipo" (
  "id_pet" bigint(20) unsigned NOT NULL,
  "pet_descricao" char(80) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  "pet_contabil" int(11) NOT NULL,
  "pet_ativo" tinyint(4) NOT NULL DEFAULT '1'
);

--
-- Extraindo dados da tabela `pro_equipamento_tipo`
--

INSERT INTO `pro_equipamento_tipo` (`id_pet`, `pet_descricao`, `pet_contabil`, `pet_ativo`) VALUES
(1, 'Microsc�pio', 5, 1),
(2, 'Servidor', 2, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `switch`
--

CREATE TABLE IF NOT EXISTS "switch" (
  "id_sw" bigint(20) unsigned NOT NULL,
  "sw_01" char(1) NOT NULL,
  "sw_02" char(1) NOT NULL,
  "sw_03" char(1) NOT NULL,
  "sw_04" char(1) NOT NULL,
  "sw_05" char(1) NOT NULL,
  "sw_06" char(1) NOT NULL,
  "sw_07" char(1) NOT NULL,
  "sw_08" char(1) NOT NULL
);

--
-- Extraindo dados da tabela `switch`
--

INSERT INTO `switch` (`id_sw`, `sw_01`, `sw_02`, `sw_03`, `sw_04`, `sw_05`, `sw_06`, `sw_07`, `sw_08`) VALUES
(1, '0', '0', '1', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `unidade`
--

CREATE TABLE IF NOT EXISTS "unidade" (
  "id_u" bigint(20) unsigned NOT NULL,
  "u_descricao" char(200) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  "u_sigla" char(10) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  "u_decano" char(8) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  "u_ativo" tinyint(4) NOT NULL DEFAULT '1'
);

--
-- Extraindo dados da tabela `unidade`
--

INSERT INTO `unidade` (`id_u`, `u_descricao`, `u_sigla`, `u_decano`, `u_ativo`) VALUES
(1, 'Escola Polit�cnica', '', '', 1),
(2, 'Escola de Sa�de e Bioci�ncias', '', '', 1),
(3, 'Escola de Ci�ncias Agr�rias e Medicina Veterin�ria', '', '', 1),
(4, 'Escola de Arquitetura e Design', '', '', 1),
(5, 'Escola de Comunica��o e Artes', '', '', 1),
(6, 'Escola de Direito', '', '', 1),
(7, 'Escola de Educa��o e Humanidade', '', '', 1),
(8, 'Escola de Medicina', '', '', 1),
(9, 'Escola de Neg�cios', '', '', 1),
(10, '-n�o identificado-', '', '', 1),
(11, '-n�o identificado-', '', '', 1),
(12, '--cancelado--', '', '', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `us_bolsa`
--

CREATE TABLE IF NOT EXISTS "us_bolsa" (
  "id_usb" int(11) unsigned NOT NULL,
  "usuario_id_us" int(11) NOT NULL COMMENT 'vincula o id do usuario dono da bolsa',
  "tipo_bolsa_id_bmod" int(11) NOT NULL DEFAULT '1' COMMENT 'vincula qual modalidade � a bolsa',
  "usb_vlr" float(9,2) DEFAULT NULL,
  "usb_dt_inicio" date DEFAULT NULL COMMENT 'inicio da vigencia',
  "usb_dt_termino" date DEFAULT NULL COMMENT 'fim da vigencia',
  "usb_vigencia" int(2) DEFAULT NULL COMMENT 'vigencia em meses',
  "usb_ativo" tinyint(1) DEFAULT '1' COMMENT '0 - inativa\n1 - ativa'
);

-- --------------------------------------------------------

--
-- Estrutura da tabela `us_bolsa_modalidade`
--

CREATE TABLE IF NOT EXISTS "us_bolsa_modalidade" (
  "id_bmod" int(11) NOT NULL,
  "bmod_modalidade" varchar(60) DEFAULT NULL COMMENT '[1 - N�o Definido], ...',
  "bmod_ativo" tinyint(1) DEFAULT '1'
);

--
-- Extraindo dados da tabela `us_bolsa_modalidade`
--

INSERT INTO `us_bolsa_modalidade` (`id_bmod`, `bmod_modalidade`, `bmod_ativo`) VALUES
(1, 'N�o Definido', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `us_complemento`
--

CREATE TABLE IF NOT EXISTS "us_complemento" (
  "usuario_id_us" int(11) unsigned NOT NULL,
  "usc_rua" varchar(150) DEFAULT NULL,
  "usc_complemento" varchar(45) DEFAULT NULL,
  "usc_bairro" varchar(80) DEFAULT NULL,
  "usc_cep" varchar(10) DEFAULT NULL,
  "usc_cidade" varchar(80) DEFAULT NULL,
  "usc_pais" varchar(60) DEFAULT NULL,
  "usc_uf" char(2) DEFAULT NULL,
  "usc_raca_cor" varchar(20) DEFAULT NULL,
  "usc_nacionalidade" varchar(45) DEFAULT NULL,
  "usc_rg" varchar(20) DEFAULT NULL,
  "usc_orgao_expedidor" varchar(20) DEFAULT NULL,
  "usc_nome_mae" varchar(150) DEFAULT NULL,
  "usc_cpf_mae" varchar(15) DEFAULT NULL,
  "usc_nome_pai" varchar(150) DEFAULT NULL,
  "usc_cpf_pai" varchar(15) DEFAULT NULL
);

-- --------------------------------------------------------

--
-- Estrutura da tabela `us_cracha`
--

CREATE TABLE IF NOT EXISTS "us_cracha" (
  "id_usc" int(11) unsigned NOT NULL,
  "usc_cracha" varchar(15) DEFAULT NULL COMMENT 'numeros dos crachas utilizados por um usuario',
  "usc_dt_inicio" date DEFAULT NULL COMMENT 'inicio da utiliza��o do numero',
  "usc_dt_fim" date DEFAULT NULL COMMENT 'fim da utiliza��o do numero',
  "usc_ativo" tinyint(1) DEFAULT '1' COMMENT 'numero atual ativo (replicado para a tabela usuario)',
  "usuario_id_us" int(11) NOT NULL COMMENT 'cincula com o id da tabela usuario'
);

-- --------------------------------------------------------

--
-- Estrutura da tabela `us_cursando`
--

CREATE TABLE IF NOT EXISTS "us_cursando" (
  "id_usc" int(11) unsigned NOT NULL,
  "usc_nome" varchar(60) DEFAULT NULL COMMENT '[1 - N�o Definido],\n[2 - Inativo], \n[3 - Gradua��o],\n[4 - Mestrado],\n[5 - Doutorado],\n[5 - P�s-Doutorado]\n',
  "usc_ativo" tinyint(1) DEFAULT '1'
);

--
-- Extraindo dados da tabela `us_cursando`
--

INSERT INTO `us_cursando` (`id_usc`, `usc_nome`, `usc_ativo`) VALUES
(1, 'N�o Definido', 1),
(2, 'Inativo', 1),
(3, 'Gradua��o', 1),
(4, 'Mestrado', 1),
(5, 'Doutorado', 1),
(6, 'P�s-Doutorado', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `us_email`
--

CREATE TABLE IF NOT EXISTS "us_email" (
  "id_usm" int(11) unsigned NOT NULL,
  "usuario_id_us" int(11) NOT NULL COMMENT 'vicula com o id da tabela usuario',
  "usm_tipo" char(4) DEFAULT NULL COMMENT 'Tipos de email - pessoal, corporativo',
  "usm_email" varchar(100) DEFAULT NULL,
  "usm_ativo" tinyint(1) DEFAULT '1',
  "usm_email_preferencial" tinyint(1) DEFAULT '0' COMMENT '[0 - n�o], [1 - sim]'
);

-- --------------------------------------------------------

--
-- Estrutura da tabela `us_fone`
--

CREATE TABLE IF NOT EXISTS "us_fone" (
  "id_ufs" int(11) unsigned NOT NULL,
  "usuario_id_us" int(11) NOT NULL COMMENT 'vincula com id da tabela usuario',
  "usf_tipo" char(3) DEFAULT NULL COMMENT 'Tipos de fone: [1 - celular], [2 - residencial], [3 - comercial], [4 - outro]',
  "usf_fone" varchar(15) DEFAULT NULL,
  "usf_ativo" tinyint(1) DEFAULT '1',
  "usf_fone_preferencial" tinyint(1) DEFAULT '1' COMMENT '[0 - n�o], [1 - sim]'
);

-- --------------------------------------------------------

--
-- Estrutura da tabela `us_funcao`
--

CREATE TABLE IF NOT EXISTS "us_funcao" (
  "usf_id" int(11) unsigned NOT NULL,
  "usf_nome" varchar(60) DEFAULT NULL COMMENT '[1 - N�o Definido],[2 - Professor Auxiliar de Ensino],[3 - Professor Assistente],[4 - Professor Adjunto],[5 - Professor Titular], ...',
  "usf_ativo" tinyint(1) DEFAULT '1'
);

--
-- Extraindo dados da tabela `us_funcao`
--

INSERT INTO `us_funcao` (`usf_id`, `usf_nome`, `usf_ativo`) VALUES
(1, 'N�o Definido', 1),
(2, 'Professor Auxiliar de Ensino', 1),
(3, 'Professor Assistente', 1),
(4, 'Professor Adjunto', 1),
(5, 'Professor Titular', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `us_hora`
--

CREATE TABLE IF NOT EXISTS "us_hora" (
  "usuario_id_us" int(11) unsigned NOT NULL COMMENT 'vincula com id da tabela usuario',
  "ush_administrativa" int(2) DEFAULT NULL,
  "ush_pedagogica" int(2) DEFAULT NULL,
  "ush_direcao" int(2) DEFAULT NULL,
  "ush_letiva" int(2) DEFAULT NULL,
  "ush_stricto_sensu" int(2) DEFAULT NULL,
  "ush_permanencia" int(2) DEFAULT NULL,
  "ush_permanencia_de" int(2) DEFAULT NULL,
  "ush_total" int(2) DEFAULT NULL,
  "ush_dt_atualizacao" date NOT NULL
);

-- --------------------------------------------------------

--
-- Estrutura da tabela `us_tipo`
--

CREATE TABLE IF NOT EXISTS "us_tipo" (
  "ust_id" int(11) unsigned NOT NULL,
  "ust_nome" varchar(45) DEFAULT NULL COMMENT '[1 - N�o Definido], [2 - Professor], [3 - Aluno], [4 - Colaborador], [5 - Externo]',
  "ust_ativo" tinyint(1) DEFAULT '1'
);

--
-- Extraindo dados da tabela `us_tipo`
--

INSERT INTO `us_tipo` (`ust_id`, `ust_nome`, `ust_ativo`) VALUES
(1, 'N�o Definido', 1),
(2, 'Professor', 1),
(3, 'Aluno', 1),
(4, 'Colaborador', 1),
(5, 'Externo', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `us_titulacao`
--

CREATE TABLE IF NOT EXISTS "us_titulacao" (
  "ust_id" int(11) unsigned NOT NULL,
  "ust_nome" varchar(50) DEFAULT NULL COMMENT '[1 - N�o Definido],\n[2 - T�cnico],\n[3 - Gradua��o],\n[4 - Especialista],\n[5 - Mestre],\n[6 - Doutor],\n[7 - P�s-Doutorado],\n[8 - Resid�ncia M�dica],',
  "ust_sigla" varchar(10) DEFAULT NULL,
  "ust_ativo" tinyint(1) DEFAULT '1'
);

--
-- Extraindo dados da tabela `us_titulacao`
--

INSERT INTO `us_titulacao` (`ust_id`, `ust_nome`, `ust_sigla`, `ust_ativo`) VALUES
(1, 'N�o Definido', 'ND.', 1),
(2, 'T�cnico', 'Tec.', 1),
(3, 'Gradua��o', 'BSc.', 1),
(4, 'Especialista', 'Esp.', 1),
(5, 'Mestre', 'MsC.', 1),
(6, 'Doutor', 'Dr.', 1),
(7, 'P�s-Doutor', 'P�s-Dr.', 1),
(8, 'Resid�ncia M�dica', 'Res. MD.', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `us_usuario`
--

CREATE TABLE IF NOT EXISTS "us_usuario" (
  "id_us" bigint(20) unsigned NOT NULL,
  "us_nome" varchar(250) DEFAULT NULL,
  "us_cpf" varchar(15) DEFAULT NULL,
  "us_cracha" varchar(15) DEFAULT NULL,
  "us_emplid" varchar(15) DEFAULT NULL,
  "us_link_lattes" varchar(100) DEFAULT NULL,
  "us_ativo" tinyint(1) unsigned DEFAULT '1',
  "us_teste" tinyint(1) unsigned DEFAULT '0',
  "us_origem" int(2) DEFAULT '1' COMMENT '[1 - N�o Definido], [2 - PUCPR], [3 - Externo]',
  "us_professor_tipo" int(2) DEFAULT '1' COMMENT '[1 - N�o Definido], [2 - Stricto Sensu], [3 - Gradua��o]',
  "us_usuario_cursando" int(11) DEFAULT '1' COMMENT '[1 - N�o Definido], [2 - Inativo],  [3 - Gradua��o], [4 - Mestrado], [5 - Doutorado], [5 - P�s-Doutorado]',
  "us_regime" varchar(10) DEFAULT NULL COMMENT 'Horista / TI / TP',
  "us_genero" char(1) DEFAULT NULL COMMENT '[''M'' = masculino], [''F'' = feminino]',
  "usuario_tipo_ust_id" int(11) NOT NULL DEFAULT '1' COMMENT '[1 - N�o Definido], [2 - Professor], [3 - Aluno], [4 - Colaborador], [5 - Externo]',
  "usuario_funcao_usf_id" int(11) NOT NULL DEFAULT '1' COMMENT '[1 - N�o Definido], [2 - Professor Auxiliar de Ensino], [3 - Professor Assistente], [4 - Professor Adjunto], [5 - Professor Titular],',
  "usuario_titulacao_ust_id" int(11) NOT NULL DEFAULT '1' COMMENT '[1 - N�o Definido], [2 - T�cnico], [3 - Gradua��o], [4 - Especialista], [5 - Mestre], [6 - Doutor], [7 - P�s-Doutorado], [8 - Resid�ncia M�dica],',
  "us_dt_nascimento" date NOT NULL DEFAULT '0000-00-00',
  "us_prof_drh" tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT 'flag pra verificar dado do drh',
  "us_avaliador" tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT 'flag para avaliador'
);

--
-- Extraindo dados da tabela `us_usuario`
--

INSERT INTO `us_usuario` (`id_us`, `us_nome`, `us_cpf`, `us_cracha`, `us_emplid`, `us_link_lattes`, `us_ativo`, `us_teste`, `us_origem`, `us_professor_tipo`, `us_usuario_cursando`, `us_regime`, `us_genero`, `usuario_tipo_ust_id`, `usuario_funcao_usf_id`, `usuario_titulacao_ust_id`, `us_dt_nascimento`, `us_prof_drh`, `us_avaliador`) VALUES
(1, 'Rene Faustino Gabriel Junior', '72952105987', '88958022', '', NULL, 1, 0, 1, 1, 1, NULL, 'M', 3, 1, 1, '1969-10-05', 0, 0),
(2, 'Jefferson Fellipe Jahnke', '02350263959', '88936956', '', NULL, 1, 0, 1, 1, 1, NULL, 'M', 3, 1, 1, '1977-11-04', 0, 0),
(3, 'Fl�vio Justino F�o', '84204052991', '88943483', '', NULL, 1, 0, 1, 1, 1, NULL, 'M', 3, 1, 1, '1976-10-23', 0, 0),
(4, 'Milena Binhame Albini', '06706138940', '88961973', '', NULL, 1, 0, 1, 1, 1, NULL, 'F', 3, 1, 1, '1987-07-23', 0, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `variaveis`
--

CREATE TABLE IF NOT EXISTS "variaveis" (
  "id_v" bigint(20) unsigned NOT NULL,
  "v_nome" char(80) DEFAULT NULL,
  "v_nome_grafico" char(100) NOT NULL,
  "v_update" int(11) DEFAULT NULL,
  "v_variavel" char(30) DEFAULT NULL,
  "v_metodologia" text,
  "v_col_01" char(30) DEFAULT NULL,
  "v_col_02" char(30) DEFAULT NULL,
  "v_col_03" char(30) DEFAULT NULL,
  "v_col_04" char(30) DEFAULT NULL,
  "v_col_05" char(30) DEFAULT NULL,
  "v_col_06" char(30) DEFAULT NULL,
  "v_ativo" int(11) DEFAULT NULL,
  "v_descricao" text,
  "v_fonte" char(30) DEFAULT NULL,
  "v_total" int(11) NOT NULL DEFAULT '0'
);

--
-- Extraindo dados da tabela `variaveis`
--

INSERT INTO `variaveis` (`id_v`, `v_nome`, `v_nome_grafico`, `v_update`, `v_variavel`, `v_metodologia`, `v_col_01`, `v_col_02`, `v_col_03`, `v_col_04`, `v_col_05`, `v_col_06`, `v_ativo`, `v_descricao`, `v_fonte`, `v_total`) VALUES
(1, 'Grupos de Pesquisa CNPq (DGP)', '', 20150623, 'GP-PUCPR', 'Grupos de Pesquisas registrados no Diret�rio de Grupos de Pesquisa do CNPq conforme censo bianual.\r\n<BR>http://lattes.cnpq.br/web/dgp/sobre14', 'Ano', NULL, NULL, 'Total de Grupos', 'Total pesquisadores', 'Total de doutores', 1, NULL, 'CNPq - DGP', 0),
(2, 'IC/IT - Submiss�o de Planos / Ano', '', 20150623, 'IC-IT-SUBM-PLAN-ANO', 'Total de submiss�o de planos por ano e modalidade no programa de Inicia��o Cient�fica', 'Ano', NULL, NULL, 'PIBIC', 'PIBITI', 'Outros', 1, NULL, 'cip.pucpr.br', 1),
(3, 'IC - Submiss�o Planos - Orientador - Titula��o - Ano', 'Planos PIBIC<br>titula��o orientador', 20150623, 'IC-SUBM-PLAN-ORIENT-TITULACAO', 'Outros refere-se a P�s-Doutorandos e Doutorandos', 'Ano', NULL, NULL, 'Dr.', 'Msc', 'Outros', 1, NULL, 'cip.pucpr.br', 1),
(4, 'IC - Submiss�o Planos - Orientador - SS - Ano', 'Planos PIBIC<br>orientador stricto sensu', NULL, 'IC-SUBM-PLAN-ORIENT-SS', 'Na categoria outros est�o todos os outros orientadores', 'Ano', NULL, NULL, 'Stricto Sensu', 'Outros', '', NULL, NULL, NULL, 1),
(5, 'IC - Submiss�o Planos - Orientador - Prod. - Ano', 'Planos PIBIC<BR>produtividade', NULL, 'IC-SUBM-PLAN-ORIENT-PROD', NULL, 'Ano', NULL, NULL, 'Prod.', 'Outros', NULL, 1, NULL, NULL, 1),
(6, 'IT - Submiss�o Planos - Orientador - Prod. - Ano', 'Planos PIBITI<BR>produtividade', NULL, 'IT-SUBM-PLAN-ORIENT-PROD', NULL, 'Ano', '', '', 'Prod.', 'Outros', NULL, NULL, NULL, NULL, 1),
(7, 'IT - Submiss�o Planos - Orientador - SS - Ano', 'Planos PIBITI<br>orientador stricto sensu', NULL, 'IT-SUBM-PLAN-ORIENT-SS', NULL, 'Ano', NULL, NULL, 'Stricto Sensu', 'Outros', '', 1, NULL, NULL, 1),
(8, 'IT - Submiss�o Planos - Orientador - Titula��o - Ano', 'Planos PIBITI<br>titula��o orientador', NULL, 'IT-SUBM-PLAN-ORIENT-TITULACAO', NULL, 'Ano', NULL, NULL, 'Dr.', 'Msc', 'Outros', 1, NULL, NULL, 1),
(9, 'IC/IT - Submiss�o Planos - Campus', 'Planos PIBIC/PIBITI/PIBIC_EM por Campus', NULL, 'IC-SUBM-PLAN-CAMPUS', NULL, 'Ano', 'Campus', NULL, 'PIBIC', 'PIBITI', 'Outros', 1, NULL, NULL, 1),
(11, 'Bolsas pagas - CNPq', 'Total de Bolsas Pagas de IC', 2015, 'BOLSAS-IC-CNPQ', 'N�mero total de bolsas pagas que podem ser atribu�das', 'Ano', '', '', 'PIBIC', 'PIBITI', 'PIBIC_EM', 1, '', 'CNPq', 1),
(12, 'Bolsas pagas - Funda��o Arauc�ria', 'Bolsa Funda��o Arauc�ria', 2015, 'BOLSAS-IC-FA', '', 'Ano', '', '', 'PIBIC/IS', 'PIBITI', 'PIBIC_EM', 1, '', 'FA', 1),
(13, 'Bolsas pagas - PUCPR', 'Bolsas PUCPR', 2015, 'BOLSAS-IC-PUCPR', '', 'Ano', '', '', 'PIBIC', 'PIBITI', 'PIBIC_EM', 1, '', 'PRPPG-PUCPR', 1),
(14, 'Inicia��o Tecnol�gica - Estudantes participantes', 'IC<br>estudantes', 2015, 'IC-IMPL-ESTUD-VOLUNTARIOS', '', 'Ano', '', '', 'ICV', 'ITV', '', 1, '', 'cip.pucpr.br', 1),
(15, 'Bolsas de Inicia��o Cient�fica e Tecnol�gicas - Valor base', 'Valores das Bolsas IC/IT <br>ano', 2015, 'BOLSAS-IC-IT-VALORES', '', 'Ano', '', '', 'PIBIC', 'PIBITI', 'PIBIC_RM', 1, '', '', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `variaveis_dados`
--

CREATE TABLE IF NOT EXISTS "variaveis_dados" (
  "id_d" bigint(20) unsigned NOT NULL,
  "d_variavel" int(7) DEFAULT NULL,
  "d_fld1" char(20) DEFAULT NULL,
  "d_fld2" char(20) DEFAULT NULL,
  "d_fld3" char(20) DEFAULT NULL,
  "d_fld4" char(20) DEFAULT NULL,
  "d_fld5" char(20) DEFAULT NULL,
  "d_fld6" char(20) DEFAULT NULL,
  "d_lock" char(1) DEFAULT NULL,
  "d_update" date NOT NULL DEFAULT '0000-00-00'
);

--
-- Extraindo dados da tabela `variaveis_dados`
--

INSERT INTO `variaveis_dados` (`id_d`, `d_variavel`, `d_fld1`, `d_fld2`, `d_fld3`, `d_fld4`, `d_fld5`, `d_fld6`, `d_lock`, `d_update`) VALUES
(1, 1, '2014', '', '', '107', '702', '461', '1', '0000-00-00'),
(2, 1, '2010', '', '', '98', '623', '382', '0', '2015-06-23'),
(3, 1, '2008', '', '', '86', '591', '340', '0', '2015-06-23'),
(4, 1, '2006', '', '', '89', '614', '334', '0', '2015-06-23'),
(5, 1, '2004', '', '', '100', '626', '302', '0', '2015-06-23'),
(6, 1, '2002', '', '', '0', '0', '0', '1', '2015-06-23'),
(7, 2, '2012', NULL, NULL, '1069', '128', '22', '1', '2015-06-23'),
(8, 2, '2013', NULL, NULL, '1153', '136', '11', '1', '2015-06-23'),
(9, 2, '2014', NULL, NULL, '1349', '152', '65', '1', '2015-06-23'),
(10, 2, '2015', NULL, NULL, '1243', '188', '28', '0', '2015-06-23'),
(11, 3, '2012', NULL, NULL, '700', '368', '22', '1', '2015-06-23'),
(12, 3, '2013', NULL, NULL, '734', '441', '24', '1', '2015-06-23'),
(13, 3, '2014', NULL, NULL, '822', '481', '46', '1', '2015-06-23'),
(14, 3, '2015', NULL, NULL, '860', '361', '22', '0', '2015-06-23'),
(15, 4, '2015', NULL, NULL, '777', '466', NULL, '0', '2015-06-23'),
(16, 4, '2014', NULL, NULL, '955', '394', NULL, '0', '2015-06-23'),
(17, 4, '2013', NULL, NULL, '371', '828', NULL, '0', '2015-06-23'),
(18, 4, '2012', NULL, NULL, '353', '737', NULL, '0', '2015-06-23'),
(19, 5, '2012', NULL, NULL, '86', '1004', NULL, '0', '2015-06-23'),
(20, 5, '2013', NULL, NULL, '85', '1114', NULL, '0', '2015-06-23'),
(21, 5, '2014', NULL, NULL, '88', '1261', NULL, '0', '2015-06-23'),
(22, 5, '2015', NULL, NULL, '94', '1149', NULL, '0', '2015-06-23'),
(23, 6, '2012', '', '', '18', '114', NULL, '0', '2015-06-23'),
(24, 6, '2013', '', '', '19', '120', NULL, '0', '2015-06-23'),
(25, 6, '2014', '', '', '17', '135', NULL, '0', '2015-06-23'),
(26, 6, '2015', '', '', '24', '164', NULL, '0', '2015-06-23'),
(27, 7, '2015', NULL, NULL, '66', '122', NULL, '0', '2015-06-23'),
(28, 7, '2012', NULL, NULL, '66', '66', NULL, '0', '2015-06-23'),
(29, 7, '2013', NULL, NULL, '49', '90', NULL, '0', '2015-06-23'),
(30, 7, '2014', NULL, NULL, '56', '96', NULL, '0', '2015-06-23'),
(31, 8, '2012', NULL, NULL, '103', '28', '1', '0', '2015-06-23'),
(32, 8, '2013', NULL, NULL, '90', '49', '0', '0', '2015-06-23'),
(33, 8, '2014', NULL, NULL, '123', '28', '1', '0', '2015-06-23'),
(34, 8, '2015', NULL, NULL, '146', '40', '2', '0', '2015-06-23'),
(35, 9, '2015', 'Toledo', NULL, '82', '17', '4', '1', '2015-06-24'),
(36, 9, '2015', 'S�o Jos� Dos Pinhais', NULL, '102', '2', '1', '1', '2015-06-24'),
(37, 9, '2015', 'Maringa', NULL, '41', '0', '0', '1', '2015-06-24'),
(38, 9, '2015', 'Londrina', NULL, '98', '4', '6', '1', '2015-06-24'),
(39, 9, '2015', 'Curitiba', NULL, '920', '132', '17', '1', '2015-06-24'),
(40, 9, '2014', 'Toledo', NULL, '113', '23', '6', '1', '2015-06-24'),
(41, 9, '2014', 'S�o Jos� Dos Pinhais', NULL, '115', '30', '1', '1', '2015-06-24'),
(42, 9, '2014', 'Maringa', NULL, '55', '0', '3', '1', '2015-06-24'),
(43, 9, '2014', 'Londrina', NULL, '166', '0', '0', '1', '2015-06-24'),
(44, 9, '2014', 'Curitiba', NULL, '900', '99', '42', '1', '2015-06-24'),
(45, 9, '2013', 'Toledo', NULL, '93', '12', '0', '1', '2015-06-24'),
(46, 9, '2013', 'S�o Jos� Dos Pinhais', NULL, '103', '32', '2', '1', '2015-06-24'),
(47, 9, '2013', 'Maringa', NULL, '41', '0', '1', '1', '2015-06-24'),
(48, 9, '2013', 'Londrina', NULL, '102', '0', '0', '1', '2015-06-24'),
(49, 9, '2013', 'Curitiba', NULL, '814', '92', '8', '1', '2015-06-24'),
(50, 9, '2012', 'Toledo', NULL, '87', '5', '0', '1', '2015-06-24'),
(51, 9, '2012', 'S�o Jos� Dos Pinhais', NULL, '120', '33', '3', '1', '2015-06-24'),
(52, 9, '2012', 'Maringa', NULL, '9', '0', '0', '1', '2015-06-24'),
(53, 9, '2012', 'Londrina', NULL, '105', '0', '0', '1', '2015-06-24'),
(54, 9, '2012', 'Curitiba', NULL, '748', '90', '19', '1', '2015-06-24'),
(55, 13, '2008-2009', NULL, NULL, '150', '0', '0', '1', '2015-07-01'),
(56, 13, '2009-2010', NULL, NULL, '150', '0', '40', '0', '2015-07-01'),
(57, 13, '2010-2011', NULL, NULL, '160', '50', '40', '0', '2015-07-01'),
(58, 13, '2012-2013', NULL, NULL, '325', '50', '45', '0', '2015-07-01'),
(59, 13, '2013-2014', NULL, NULL, '325', '50', '30', '0', '2015-07-01'),
(60, 13, '2014-2015', NULL, NULL, '350', '55', '50', '0', '2015-07-01'),
(61, 13, '2015-2016', NULL, NULL, '350', '55', '50?', '0', '2015-07-01'),
(62, 12, '2008-2009', NULL, NULL, '28', '0', '0', '0', '2015-07-01'),
(63, 12, '2009-2010', NULL, NULL, '57', '0', '40', '0', '2015-07-01'),
(64, 12, '2010-2011', NULL, NULL, '58', '0', '0', '0', '2015-07-01'),
(65, 12, '2011-2012', NULL, NULL, '130', '0', '0', '0', '2015-07-01'),
(66, 12, '2012-2013', NULL, NULL, '195', '0', '0', '0', '2015-07-01'),
(67, 12, '2013-2014', NULL, NULL, '145', '0', '16', '0', '2015-07-01'),
(68, 12, '2014-2015', NULL, NULL, '145', '0', '0?', '0', '2015-07-01'),
(69, 11, '2008-2009', NULL, NULL, '68', '0', '0', '0', '2015-07-01'),
(70, 11, '2009-2010', NULL, NULL, '57', '0', '40', '0', '2015-07-01'),
(71, 11, '2010-2011', NULL, NULL, '58', '30', '35', '0', '2015-07-01'),
(72, 11, '2011-2012', NULL, NULL, '95', '30', '35', '0', '2015-07-01'),
(73, 11, '2012-2013', NULL, NULL, '94', '38', '35', '0', '2015-07-01'),
(74, 11, '2013-2014', NULL, NULL, '94', '44', '35', '0', '2015-07-01'),
(75, 11, '2015-2016', NULL, NULL, '87', '32?', '35', '0', '2015-07-01'),
(76, 11, '2014-2015', NULL, NULL, '87', '32', '35', '0', '2015-07-01'),
(77, 14, '2008-2009', NULL, NULL, '62', '0', NULL, '0', '2015-07-01'),
(78, 14, '2009-2010', NULL, NULL, '117', '0', NULL, '0', '2015-07-01'),
(79, 14, '2010-2011', NULL, NULL, '200', '30', NULL, '0', '2015-07-01'),
(80, 14, '2011-2012', NULL, NULL, '206', '53', NULL, '0', '2015-07-01'),
(81, 14, '2012-2013', NULL, NULL, '370', '40', NULL, '0', '2015-07-01'),
(82, 14, '2013-2014', NULL, NULL, '448', '56', NULL, '0', '2015-07-01'),
(83, 14, '2014-2015', NULL, NULL, '772', '103', NULL, '0', '2015-07-01'),
(84, 15, '2014', NULL, NULL, '400', '400', '150', '0', '2015-07-01'),
(85, 15, '2013', NULL, NULL, '400', '400', '150', '0', '2015-07-01'),
(86, 15, '2012', NULL, NULL, '400', '400', '150', '0', '2015-07-01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `campus`
--
ALTER TABLE `campus`
  ADD PRIMARY KEY ("id_c");

--
-- Indexes for table `csf_ged`
--
ALTER TABLE `csf_ged`
  ADD UNIQUE KEY "id_doc" ("id_doc");

--
-- Indexes for table `csf_ged_tipo`
--
ALTER TABLE `csf_ged_tipo`
  ADD UNIQUE KEY "id_doct" ("id_doct");

--
-- Indexes for table `csf_historico`
--
ALTER TABLE `csf_historico`
  ADD UNIQUE KEY "id_slog" ("id_slog");

--
-- Indexes for table `dgp`
--
ALTER TABLE `dgp`
  ADD UNIQUE KEY "id_dgp" ("id_dgp");

--
-- Indexes for table `dgp_cache`
--
ALTER TABLE `dgp_cache`
  ADD UNIQUE KEY "id_dgpc" ("id_dgpc");

--
-- Indexes for table `escola`
--
ALTER TABLE `escola`
  ADD PRIMARY KEY ("id_es");

--
-- Indexes for table `fomento_agencia`
--
ALTER TABLE `fomento_agencia`
  ADD PRIMARY KEY ("id_agf");

--
-- Indexes for table `fomento_categoria`
--
ALTER TABLE `fomento_categoria`
  ADD PRIMARY KEY ("id_ct");

--
-- Indexes for table `fomento_disseminador`
--
ALTER TABLE `fomento_disseminador`
  ADD PRIMARY KEY ("id_fdis");

--
-- Indexes for table `fomento_edital`
--
ALTER TABLE `fomento_edital`
  ADD PRIMARY KEY ("id_ed");

--
-- Indexes for table `fomento_edital_categoria`
--
ALTER TABLE `fomento_edital_categoria`
  ADD PRIMARY KEY ("id_fec");

--
-- Indexes for table `fomento_status`
--
ALTER TABLE `fomento_status`
  ADD PRIMARY KEY ("id_fs");

--
-- Indexes for table `fomento_tipo`
--
ALTER TABLE `fomento_tipo`
  ADD PRIMARY KEY ("id_ftp");

--
-- Indexes for table `gpus_cnpq`
--
ALTER TABLE `gpus_cnpq`
  ADD PRIMARY KEY ("id_gpus_cnpq");

--
-- Indexes for table `gp_area_predominante`
--
ALTER TABLE `gp_area_predominante`
  ADD PRIMARY KEY ("id_gpap");

--
-- Indexes for table `gp_equipamento`
--
ALTER TABLE `gp_equipamento`
  ADD PRIMARY KEY ("id_gpe");

--
-- Indexes for table `gp_forma_remuneracao`
--
ALTER TABLE `gp_forma_remuneracao`
  ADD PRIMARY KEY ("id_gpfr");

--
-- Indexes for table `gp_grupo_pesquisa`
--
ALTER TABLE `gp_grupo_pesquisa`
  ADD PRIMARY KEY ("id_gp");

--
-- Indexes for table `gp_instituicao_parceira`
--
ALTER TABLE `gp_instituicao_parceira`
  ADD PRIMARY KEY ("id_gpip");

--
-- Indexes for table `gp_pp`
--
ALTER TABLE `gp_pp`
  ADD PRIMARY KEY ("gp_id","pp_id");

--
-- Indexes for table `gp_recursos_humanos`
--
ALTER TABLE `gp_recursos_humanos`
  ADD PRIMARY KEY ("id_gprh");

--
-- Indexes for table `gp_rede_pesquisa`
--
ALTER TABLE `gp_rede_pesquisa`
  ADD PRIMARY KEY ("id_gprp");

--
-- Indexes for table `gp_situacao`
--
ALTER TABLE `gp_situacao`
  ADD PRIMARY KEY ("id_gps");

--
-- Indexes for table `gp_software`
--
ALTER TABLE `gp_software`
  ADD PRIMARY KEY ("id_gps");

--
-- Indexes for table `gp_tipo_relacao`
--
ALTER TABLE `gp_tipo_relacao`
  ADD PRIMARY KEY ("id_gptr");

--
-- Indexes for table `gp_usuario`
--
ALTER TABLE `gp_usuario`
  ADD PRIMARY KEY ("us_id","gp_id","lp_id");

--
-- Indexes for table `idioma`
--
ALTER TABLE `idioma`
  ADD PRIMARY KEY ("id_i");

--
-- Indexes for table `logins_log`
--
ALTER TABLE `logins_log`
  ADD UNIQUE KEY "id_ul" ("id_ul");

--
-- Indexes for table `lp_area_conhecimento`
--
ALTER TABLE `lp_area_conhecimento`
  ADD PRIMARY KEY ("id_lpac");

--
-- Indexes for table `lp_linha_pesquisa`
--
ALTER TABLE `lp_linha_pesquisa`
  ADD PRIMARY KEY ("id_lp");

--
-- Indexes for table `lp_palavra_chave`
--
ALTER TABLE `lp_palavra_chave`
  ADD PRIMARY KEY ("id_lppc");

--
-- Indexes for table `lp_pp`
--
ALTER TABLE `lp_pp`
  ADD PRIMARY KEY ("pp_id","lp_id");

--
-- Indexes for table `lp_setor_aplicacao`
--
ALTER TABLE `lp_setor_aplicacao`
  ADD PRIMARY KEY ("id_lpsa");

--
-- Indexes for table `programa_pos`
--
ALTER TABLE `programa_pos`
  ADD PRIMARY KEY ("id_pp");

--
-- Indexes for table `switch`
--
ALTER TABLE `switch`
  ADD UNIQUE KEY "switch" ("id_sw");

--
-- Indexes for table `us_bolsa`
--
ALTER TABLE `us_bolsa`
  ADD PRIMARY KEY ("id_usb");

--
-- Indexes for table `us_bolsa_modalidade`
--
ALTER TABLE `us_bolsa_modalidade`
  ADD PRIMARY KEY ("id_bmod");

--
-- Indexes for table `us_cracha`
--
ALTER TABLE `us_cracha`
  ADD PRIMARY KEY ("id_usc");

--
-- Indexes for table `us_cursando`
--
ALTER TABLE `us_cursando`
  ADD PRIMARY KEY ("id_usc");

--
-- Indexes for table `us_email`
--
ALTER TABLE `us_email`
  ADD PRIMARY KEY ("id_usm");

--
-- Indexes for table `us_fone`
--
ALTER TABLE `us_fone`
  ADD PRIMARY KEY ("id_ufs");

--
-- Indexes for table `us_funcao`
--
ALTER TABLE `us_funcao`
  ADD PRIMARY KEY ("usf_id");

--
-- Indexes for table `us_hora`
--
ALTER TABLE `us_hora`
  ADD PRIMARY KEY ("usuario_id_us");

--
-- Indexes for table `us_tipo`
--
ALTER TABLE `us_tipo`
  ADD PRIMARY KEY ("ust_id");

--
-- Indexes for table `us_titulacao`
--
ALTER TABLE `us_titulacao`
  ADD PRIMARY KEY ("ust_id");

--
-- Indexes for table `us_usuario`
--
ALTER TABLE `us_usuario`
  ADD PRIMARY KEY ("id_us");

--
-- Indexes for table `variaveis`
--
ALTER TABLE `variaveis`
  ADD UNIQUE KEY "id_v" ("id_v");

--
-- Indexes for table `variaveis_dados`
--
ALTER TABLE `variaveis_dados`
  ADD UNIQUE KEY "id_d" ("id_d");

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `campus`
--
ALTER TABLE `campus`
  MODIFY "id_c" int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `csf_ged`
--
ALTER TABLE `csf_ged`
  MODIFY "id_doc" bigint(20) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `csf_ged_tipo`
--
ALTER TABLE `csf_ged_tipo`
  MODIFY "id_doct" bigint(20) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `csf_historico`
--
ALTER TABLE `csf_historico`
  MODIFY "id_slog" bigint(20) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dgp`
--
ALTER TABLE `dgp`
  MODIFY "id_dgp" bigint(20) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dgp_cache`
--
ALTER TABLE `dgp_cache`
  MODIFY "id_dgpc" bigint(20) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `escola`
--
ALTER TABLE `escola`
  MODIFY "id_es" int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fomento_agencia`
--
ALTER TABLE `fomento_agencia`
  MODIFY "id_agf" bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fomento_categoria`
--
ALTER TABLE `fomento_categoria`
  MODIFY "id_ct" int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fomento_disseminador`
--
ALTER TABLE `fomento_disseminador`
  MODIFY "id_fdis" int(3) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fomento_edital`
--
ALTER TABLE `fomento_edital`
  MODIFY "id_ed" bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fomento_edital_categoria`
--
ALTER TABLE `fomento_edital_categoria`
  MODIFY "id_fec" bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fomento_status`
--
ALTER TABLE `fomento_status`
  MODIFY "id_fs" int(3) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fomento_tipo`
--
ALTER TABLE `fomento_tipo`
  MODIFY "id_ftp" int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `gpus_cnpq`
--
ALTER TABLE `gpus_cnpq`
  MODIFY "id_gpus_cnpq" int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `gp_area_predominante`
--
ALTER TABLE `gp_area_predominante`
  MODIFY "id_gpap" int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `gp_equipamento`
--
ALTER TABLE `gp_equipamento`
  MODIFY "id_gpe" int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `gp_forma_remuneracao`
--
ALTER TABLE `gp_forma_remuneracao`
  MODIFY "id_gpfr" int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `gp_grupo_pesquisa`
--
ALTER TABLE `gp_grupo_pesquisa`
  MODIFY "id_gp" int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `gp_instituicao_parceira`
--
ALTER TABLE `gp_instituicao_parceira`
  MODIFY "id_gpip" int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `gp_recursos_humanos`
--
ALTER TABLE `gp_recursos_humanos`
  MODIFY "id_gprh" int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `gp_rede_pesquisa`
--
ALTER TABLE `gp_rede_pesquisa`
  MODIFY "id_gprp" int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `gp_situacao`
--
ALTER TABLE `gp_situacao`
  MODIFY "id_gps" int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `gp_software`
--
ALTER TABLE `gp_software`
  MODIFY "id_gps" int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `gp_tipo_relacao`
--
ALTER TABLE `gp_tipo_relacao`
  MODIFY "id_gptr" int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `idioma`
--
ALTER TABLE `idioma`
  MODIFY "id_i" int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `logins_log`
--
ALTER TABLE `logins_log`
  MODIFY "id_ul" bigint(20) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `lp_area_conhecimento`
--
ALTER TABLE `lp_area_conhecimento`
  MODIFY "id_lpac" int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `lp_linha_pesquisa`
--
ALTER TABLE `lp_linha_pesquisa`
  MODIFY "id_lp" int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `lp_palavra_chave`
--
ALTER TABLE `lp_palavra_chave`
  MODIFY "id_lppc" int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `lp_setor_aplicacao`
--
ALTER TABLE `lp_setor_aplicacao`
  MODIFY "id_lpsa" int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `programa_pos`
--
ALTER TABLE `programa_pos`
  MODIFY "id_pp" int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `switch`
--
ALTER TABLE `switch`
  MODIFY "id_sw" bigint(20) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `us_bolsa`
--
ALTER TABLE `us_bolsa`
  MODIFY "id_usb" int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `us_cracha`
--
ALTER TABLE `us_cracha`
  MODIFY "id_usc" int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `us_email`
--
ALTER TABLE `us_email`
  MODIFY "id_usm" int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `us_fone`
--
ALTER TABLE `us_fone`
  MODIFY "id_ufs" int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `us_funcao`
--
ALTER TABLE `us_funcao`
  MODIFY "usf_id" int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `us_tipo`
--
ALTER TABLE `us_tipo`
  MODIFY "ust_id" int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `us_titulacao`
--
ALTER TABLE `us_titulacao`
  MODIFY "ust_id" int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `us_usuario`
--
ALTER TABLE `us_usuario`
  MODIFY "id_us" bigint(20) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `variaveis`
--
ALTER TABLE `variaveis`
  MODIFY "id_v" bigint(20) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `variaveis_dados`
--
ALTER TABLE `variaveis_dados`
  MODIFY "id_d" bigint(20) unsigned NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
