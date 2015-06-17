-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 12, 2015 at 04:31 PM
-- Generation Time: Jun 14, 2015 at 12:18 AM
-- Server version: 5.6.20-log
-- PHP Version: 5.4.31

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
(2, 1, 'Administra��o da Gradua��o em Pedagogia - Curitiba', '', '', 1),
(3, 64, 'Administra��o da Gradua��o em Odontologia - Curiti', '', '', 1),
(4, 407, 'Engenharia Mec�nica', '', '', 1),
(5, 408, 'Inform�tica Aplicada', '', '', 1),
(6, 415, 'Administra��o', '', '', 1),
(7, 418, 'Engenharia de Produ��o e Sistemas', '', '', 1),
(8, 814, 'Gest�o Urbana', '', '', 1),
(9, 2050, 'GRADUA��O - CWB - INATIVOS - ESCOLA POLIT�CNICA', '', '', 1),
(10, 2192, 'GRADUA��O - SJP - INATIVOS - ESCOLA DE CI�NC. AGR.', '', '', 1),
(11, 2420, 'Administra��o da Gradua��o em Agronomia - Toledo', '', '', 1),
(12, 3498, 'Administra��o da Gradua��o em Biologia - Curitiba', '', '', 1),
(13, 3507, 'Administra��o da Gradua��o em Enfermagem - Curitib', '', '', 1),
(14, 3541, 'Administra��o da Gradua��o em Medicina - Curitiba', '', '', 1),
(15, 3557, 'Administra��o da Gradua��o em Odontologia - Curiti', '', '', 1),
(16, 3795, 'Administra��o da Gradua��o em Engenharia Ambiental', '', '', 1),
(17, 3803, 'Administra��o da Gradua��o em Engenharia Civil Cur', '', '', 1),
(18, 3811, 'Administra��o da Gradua��o em Engenharia de Alimen', '', '', 1),
(19, 3820, 'Administra��o da Gradua��o em Engenharia de Comput', '', '', 1),
(20, 3838, 'Administra��o da Gradua��o em Engenharia de Produ�', '', '', 1),
(21, 3852, 'Administra��o da Gradua��o em Engenharia El�trica', '', '', 1),
(22, 3860, 'Administra��o da Gradua��o em Engenharia Mec�nica', '', '', 1),
(23, 4076, 'GRADUA��O - CWB - INATIVOS - ESCOLA DE COMUNICA��O', '', '', 1),
(24, 4093, 'Administra��o da Gradua��o em Direito Curitiba', '', '', 1),
(25, 4572, 'Administra��o da Gradua��o em Administra��o - SJP', '', '', 1),
(26, 4588, 'Administra��o da Gradua��o em Ci�ncias Cont�beis -', '', '', 1),
(27, 4753, 'Administra��o da Gradua��o em Medicina Veterin�ria', '', '', 1),
(28, 6452, 'Lab. de Controle de Polui��o - BL III PQ TEC', '', '', 1),
(29, 6453, 'Lab. de Simula��o T�rmica - CCET', '', '', 1),
(30, 6454, 'Lab. de Sistemas T�rmicos - CCET', '', '', 1),
(31, 6828, 'Central de Processamento de Dados - PPGIA', '', '', 1),
(32, 6833, 'Lab. de Comuta��o - BL II PQ TEC', '', '', 1),
(33, 6836, 'Lab. de Engenharia de Reabilita��o - LER', '', '', 1),
(34, 6838, 'Lab. de Inform�tica em Sa�de - LAIS - BL II PQ TEC', '', '', 1),
(35, 6840, 'Lab. de Redes I - BL II PQ TEC', '', '', 1),
(36, 6841, 'Lab. de Sistemas Distribu�dos - LASID', '', '', 1),
(37, 6844, 'Lab. de Transmiss�o - REMAV - BL II PQ TEC', '', '', 1),
(38, 6851, 'Lab.s de An�lises Ambientais - BL III PQ TEC', '', '', 1),
(39, 6870, 'Lab. de Metalografia - BL III PQ TEC', '', '', 1),
(40, 6875, 'Lab. de Estruturas - BL III PQ TEC', '', '', 1),
(41, 6880, 'Lab. de Termodin�mica Aplicada - BL III PQ TEC', '', '', 1),
(42, 6881, 'Lab. de Topografia - BL III PQ TEC', '', '', 1),
(43, 6883, 'Lab. de Usinagem - LAUS - BL III PQ TEC', '', '', 1),
(44, 6885, 'LAS II - Lab Grupo Pesq de Sist Autom Integrados', '', '', 1),
(45, 6924, 'Lab. de Farmacologia - CCBS', '', '', 1),
(46, 6925, 'Lab. de Fisiologia Animal - CCBS', '', '', 1),
(47, 6927, 'Lab. de Fisiologia Vegetal e Gen�tica - CCBS', '', '', 1),
(48, 6928, 'Lab. de Bioqu�mica - CCBS', '', '', 1),
(49, 6933, 'Lab. de Tecnologia Farmac�utica - CCBS', '', '', 1),
(50, 6935, 'Lab. de Farmacot�cnica - CCBS', '', '', 1),
(51, 6955, 'N�cleo de C�lulas Humanas Prod. de Insulina - CCBS', '', '', 1),
(52, 6956, 'Lab. de Engenharia e Transplante Celular', '', '', 1),
(53, 6966, 'Lab. Bio-Inform�tica - CCAA', '', '', 1),
(54, 7052, 'LAS VIII - Lab. de Controle de Processos', '', '', 1),
(55, 7065, 'N�cleo de Cardiomioplastia Celular - BL IV PQ TEC', '', '', 1),
(56, 7069, 'N�cleo de Enxertos Cardiovasculares - BL IV PQ TEC', '', '', 1),
(57, 7073, 'N�cleo de Imunogen�tica - BL IV PQ TEC', '', '', 1),
(58, 7118, 'Adm. Stricto Sensu - CWB - Escola de Neg�cios', '', '', 1),
(59, 7119, 'Adm. Lato Sensu - CWB - Escola de Sa�de e Bioci�nc', '', '', 1),
(60, 7122, 'Adm. Stricto Sensu - CWB - Escola de Medicina', '', '', 1),
(61, 7128, 'Adm. Stricto Sensu - CWB - Escola Polit�cnica', '', '', 1),
(62, 7158, 'Adm. Stricto Sensu - CWB - Escola de Educa��o e Hu', '', '', 1),
(63, 7298, 'Laborat�rio de Usabilidade - BL IV PQ TEC', '', '', 1),
(64, 8785, 'Odontologia', '', '', 1),
(65, 9027, 'Engenharia Mec�nica', '', '', 1),
(66, 9264, 'Educa��o', '', '', 1),
(67, 9928, 'Gest�o Urbana', '', '', 1),
(68, 10000, 'Engenharia de Produ��o e Sistemas', '', '', 1),
(69, 10222, 'Laborat�rio de An�lises - Eng� Ambiental - BL III', '', '', 1),
(70, 10528, 'Adm do Bloco I do Parque Tecnol�gico', '', '', 1),
(71, 20100, 'Adm. da Escola de Sa�de e Bioci�ncias - CWB', '', '', 1),
(72, 20200, 'Adm. da Escola Polit�cnica - CWB', '', '', 1),
(73, 20220, 'Lab. de Modelos - CCET', '', '', 1),
(74, 20234, 'Administra��o do Bloco III do Parque Tecnol�gico', '', '', 1),
(75, 20237, 'Administra��o do Bloco II do Parque Tecnol�gico', '', '', 1),
(76, 20300, 'Adm. da Escola de Direito - CWB', '', '', 1),
(77, 20314, 'Lab. de Comunica��o', '', '', 1),
(78, 20400, 'Adm. da Escola de Educa��o e Humanidades - CWB', '', '', 1),
(79, 20500, 'Adm. da Escola da Neg�cios - CWB', '', '', 1),
(80, 20725, 'Hospital Veterin�rio -CCAA', '', '', 1),
(81, 20728, 'Unidade Hosp. Animais de Fazenda (UHAF) - CCAA', '', '', 1),
(82, 20800, 'Administra��o do Campus SJP', '', '', 1),
(83, 20813, 'Lab. de Biologia Molecular (Genoma) - CCAA', '', '', 1),
(84, 28821, 'Laborat�rio de An�lises de Solos - Presta��o de Se', '', '', 1),
(85, 28822, 'Setor de Piscicultura', '', '', 1),
(86, 40103, 'Cl�nica de Psicologia - CCBS', '', '', 1),
(87, 40104, 'N�cleo de Pr�ticas Jur�dicas - NPJ - CCJS', '', '', 1),
(88, 40105, 'N�cleo de Pr�ticas Jur�dicas - NPJ - CCSA SJP', '', '', 1),
(89, 41302, 'CR A ASSOCIAR', '', '', 1),
(90, 41700, 'Cl�nica de Fisioterapia e Reabilita��o - CCBS', '', '', 1),
(91, 41801, 'Cl�nica Odontol�gica - CCBS', '', '', 1),
(92, 50108, 'Lab.s de Apoio - CCAA', '', '', 1),
(93, 70204, 'Lab. de Apoio - CCJE', '', '', 1),
(94, 70305, 'Lab. de Avalia��o Nutricional - CCAS', '', '', 1),
(95, 100059, 'CR A ASSOCIAR', '', '', 1),
(96, 101026, 'Compras AS', '', '', 1),
(97, 101063, 'Setor de Capta��o de Recursos e Projetos AS', '', '', 1),
(98, 101079, 'Pr�dio Gin�sio', '', '', 1),
(99, 101086, 'Hotelaria APC - HUC', '', '', 1),
(100, 101102, 'Conv�nios Educa��o', '', '', 1),
(101, 101108, 'CR A ASSOCIAR', '', '', 1),
(102, 101111, 'Conv�nios Educa��o', '', '', 1),
(103, 101122, 'Conv�nios Educa��o', '', '', 1),
(104, 101136, 'CR A ASSOCIAR', '', '', 1),
(105, 101139, 'CR A ASSOCIAR', '', '', 1),
(106, 101143, 'CR A ASSOCIAR', '', '', 1),
(107, 101156, 'CR A ASSOCIAR', '', '', 1),
(108, 101162, 'CR A ASSOCIAR', '', '', 1),
(109, 101163, 'CR A ASSOCIAR', '', '', 1),
(110, 101164, 'CR A ASSOCIAR', '', '', 1),
(111, 101167, 'Despesas Mantenedora', '', '', 1),
(112, 101174, 'Administra��o da Diretoria de Neg�cios Suplementar', '', '', 1),
(113, 101177, 'Adm. Diretoria Financeira', '', '', 1),
(114, 101184, 'CR A ASSOCIAR', '', '', 1),
(115, 101185, 'CR A ASSOCIAR', '', '', 1),
(116, 101188, 'Setor de Planejamento de Neg�cios', '', '', 1),
(117, 101193, 'CR A ASSOCIAR', '', '', 1),
(118, 101194, 'CR A ASSOCIAR', '', '', 1),
(119, 101195, 'CR A ASSOCIAR', '', '', 1),
(120, 101198, 'Setor de Contabilidade', '', '', 1),
(121, 101205, 'Setor de Finan�as', '', '', 1),
(122, 101210, 'Controladoria', '', '', 1),
(123, 101216, 'Administra��o da Diretoria de Gest�o de Pessoas', '', '', 1),
(124, 101225, 'N�cleo do Refeit�rio Campus Curitiba', '', '', 1),
(125, 101231, 'Administra��o da Diretoria de Tecnologia', '', '', 1),
(126, 101268, 'N�cleo de Compras', '', '', 1),
(127, 101269, 'N�cleo de Almoxarifado', '', '', 1),
(128, 101276, 'N�cleo Seguran�a e Contr Tr�fego - APC - Curitiba', '', '', 1),
(129, 101287, 'Centro de Compet�ncia T�cnica', '', '', 1),
(130, 101311, 'N�cleo NTE', '', '', 1),
(131, 101313, 'Administra��o do Setor de Esportes', '', '', 1),
(132, 101329, 'Resid�ncia Marista PUC', '', '', 1),
(133, 101331, 'Superintend�ncia Executiva', '', '', 1),
(134, 101333, 'Assessoria Jur�dica', '', '', 1),
(135, 101335, 'Diretoria de Marketing - APC', '', '', 1),
(136, 101344, 'Setor de Tecnologia', '', '', 1),
(137, 101367, 'N�cleo de Transportes', '', '', 1),
(138, 101377, 'Ger�ncia de Medicina Ocupacional - APC', '', '', 1),
(139, 101395, 'CR A ASSOCIAR', '', '', 1),
(140, 101405, 'Setor de Infraestrutura', '', '', 1),
(141, 101417, 'Ger�ncia BP Sa�de', '', '', 1),
(142, 101441, 'CR A ASSOCIAR', '', '', 1),
(143, 101450, 'CR A ASSOCIAR', '', '', 1),
(144, 101451, 'CR A ASSOCIAR', '', '', 1),
(145, 101452, 'CR A ASSOCIAR', '', '', 1),
(146, 101453, 'CR A ASSOCIAR', '', '', 1),
(147, 101469, 'CR A ASSOCIAR', '', '', 1),
(148, 101470, 'CR A ASSOCIAR', '', '', 1),
(149, 101471, 'Conv�nios Educa��o', '', '', 1),
(150, 101476, 'CR A ASSOCIAR', '', '', 1),
(151, 101481, 'CR A ASSOCIAR', '', '', 1),
(152, 101482, 'CR A ASSOCIAR', '', '', 1),
(153, 101483, 'CR A ASSOCIAR', '', '', 1),
(154, 101487, 'Conv�nios Educa��o', '', '', 1),
(155, 101488, 'CR A ASSOCIAR', '', '', 1),
(156, 101490, 'CR A ASSOCIAR', '', '', 1),
(157, 101491, 'CR A ASSOCIAR', '', '', 1),
(158, 101492, 'CR A ASSOCIAR', '', '', 1),
(159, 101521, 'CR A ASSOCIAR', '', '', 1),
(160, 101522, 'Assessoria de Rela��es Institucionais', '', '', 1),
(161, 101526, 'Conv�nio APC Educa��o Infantil - 18.892', '', '', 1),
(162, 101527, 'CR A ASSOCIAR', '', '', 1),
(163, 101530, 'Setor de Governan�a', '', '', 1),
(164, 101531, 'CR A ASSOCIAR', '', '', 1),
(165, 101533, 'Conv�nios Educa��o', '', '', 1),
(166, 101534, 'CR A ASSOCIAR', '', '', 1),
(167, 101539, 'CR A ASSOCIAR', '', '', 1),
(168, 101544, 'CR A ASSOCIAR', '', '', 1),
(169, 101558, 'CR A ASSOCIAR', '', '', 1),
(170, 101559, 'CR A ASSOCIAR', '', '', 1),
(171, 101562, 'CR A ASSOCIAR', '', '', 1),
(172, 101571, 'Conv�nios Educa��o', '', '', 1),
(173, 101598, 'CR A ASSOCIAR', '', '', 1),
(174, 101601, 'Setor de Contratos e Conv�nios', '', '', 1),
(175, 101603, 'CR A ASSOCIAR', '', '', 1),
(176, 101610, 'Conv�nios Educa��o', '', '', 1),
(177, 101612, 'CR A ASSOCIAR', '', '', 1),
(178, 101613, 'CR A ASSOCIAR', '', '', 1),
(179, 101617, 'Conv�nios Educa��o', '', '', 1),
(180, 101621, 'Gabinete da Presid�ncia', '', '', 1),
(181, 101622, 'Gest�o de Bens Patrimoniais APC', '', '', 1),
(182, 101625, 'Centro de Compet�ncia T�cnica', '', '', 1),
(183, 101652, 'Centro de Compet�ncia T�cnica', '', '', 1),
(184, 101665, 'Centro de Compet�ncia T�cnica', '', '', 1),
(185, 101684, 'CR A ASSOCIAR', '', '', 1),
(186, 101692, 'CR A ASSOCIAR', '', '', 1),
(187, 101695, 'CR A ASSOCIAR', '', '', 1),
(188, 101699, 'Conv�nios Educa��o', '', '', 1),
(189, 101717, 'Gabinete da Diretoria HUC', '', '', 1),
(190, 101718, 'CR A ASSOCIAR', '', '', 1),
(191, 101837, 'CR A ASSOCIAR', '', '', 1),
(192, 101839, 'Conv�nios Educa��o', '', '', 1),
(193, 101841, 'Conv�nios Educa��o', '', '', 1),
(194, 101847, 'Conv�nios Educa��o', '', '', 1),
(195, 101848, 'Conv�nios Educa��o', '', '', 1),
(196, 101856, 'CR A ASSOCIAR', '', '', 1),
(197, 101882, 'Conv�nio HUC', '', '', 1),
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
(211, 102012, 'Nutri��o HUC', '', '', 1),
(212, 102023, 'Secretaria Acad�mica HUC', '', '', 1),
(213, 102030, 'Pronto Socorro HUC', '', '', 1),
(214, 102036, 'Centro Cir�rgico HUC', '', '', 1),
(215, 102040, 'Equipe de Terapia Intensiva HUC', '', '', 1),
(216, 102041, 'Unidade de Terapia Intensiva 1 HUC', '', '', 1),
(217, 102042, 'Unidade de Terapia Intensiva 2 HUC', '', '', 1),
(218, 102045, 'Equipe de Unidades de Interna��o HUC', '', '', 1),
(219, 102048, 'Unidade de Interna��o 3 HUC', '', '', 1),
(220, 102049, 'Unidade de Interna��o 4 HUC', '', '', 1),
(221, 102053, 'Unidade de Interna��o 8 HUC', '', '', 1),
(222, 102058, 'Gerencia Administrativa HUC', '', '', 1),
(223, 102059, 'Laborat�rio de An�lises Cl�nicas HUC', '', '', 1),
(224, 102060, 'Laborat�rio de Imunogen�tica HUC', '', '', 1),
(225, 102061, 'Servi�o de Radiologia Convencional HUC', '', '', 1),
(226, 102064, 'Servi�o de Tomografia HUC', '', '', 1),
(227, 102090, 'Centro de Atendimento M�dico', '', '', 1),
(228, 102093, 'N�cleo de Epidemiologia e Controle de Infec��o Hos', '', '', 1),
(229, 102101, 'Ger�ncia de Enfermagem HUC', '', '', 1),
(230, 102102, 'Unidade de Terapia Intensiva 4 HUC', '', '', 1),
(231, 102108, 'Unidade de Interna��o 6 HUC', '', '', 1),
(232, 102116, 'Setor de faturamento HUC', '', '', 1),
(233, 102117, 'Ambulat�rio HUC', '', '', 1),
(234, 102373, 'Pr�dio do Hospital Universit�rio Cajuru', '', '', 1),
(235, 102380, 'Resid�ncia M�dica HUC', '', '', 1),
(236, 103051, 'Diretoria de Suporte Operacional e Acad�mico', '', '', 1),
(237, 103054, 'Relacionamento', '', '', 1),
(238, 103099, 'Projetos Tecnoparque', '', '', 1),
(239, 103101, 'Pr�dio Acad�mico', '', '', 1),
(240, 103246, 'Administra��o da Reitoria', '', '', 1),
(241, 103247, 'Administra��o da PUCPR Campus Curitiba', '', '', 1),
(242, 103250, 'Adm da Pr�-Reitoria de Gradua��o', '', '', 1),
(243, 103251, 'Adm da Pr�-Reitoria Adm. e de Desenvolvimento', '', '', 1),
(244, 103252, 'N�cleo de Processos Seletivos', '', '', 1),
(245, 103266, 'Biblioteca Central', '', '', 1),
(246, 103268, 'Administra��o da Diretoria de Educa��o a Dist�ncia', '', '', 1),
(247, 103269, 'N�cleo PUC WEB', '', '', 1),
(248, 103275, 'N�cleo da Pastoral', '', '', 1),
(249, 103278, 'N�cleo do Museu e Memoriais', '', '', 1),
(250, 103280, 'N�cleo do Coral', '', '', 1),
(251, 103284, 'Cl�nica de Nutri��o - CCBS', '', '', 1),
(252, 103309, 'N�cleo do Fundo de Pesquisa', '', '', 1),
(253, 103321, 'Pr�dio Humanas', '', '', 1),
(254, 103324, 'Bloco III Parque Tecnol�gico', '', '', 1),
(255, 103361, 'Pr�dio Cl�nicas Rockfeller', '', '', 1),
(256, 103421, 'Lab. de Inform�tica - Desenvolvimento - Curitiba', '', '', 1),
(257, 103422, 'Lab. de Inform�tica - Biom�dico - Curitiba', '', '', 1),
(258, 103423, 'Lab. de Inform�tica C�lculo - Curitiba', '', '', 1),
(259, 103424, 'Lab. de Inform�tica - Gr�fico - Curitiba', '', '', 1),
(260, 103433, 'Lab. de Apoio - Eng. El�trica - BL II PQ TEC', '', '', 1),
(261, 103510, 'Administra��o da Diretoria de P�s-Gradua��o Strict', '', '', 1),
(262, 103538, 'N�cleos Curitiba', '', '', 1),
(263, 103636, 'Pr�dio Simula��o Cl�nica - HNSL', '', '', 1),
(264, 103638, 'Laborat�rio Multiusu�rios - Curitiba', '', '', 1),
(265, 103699, 'Projeto Apple', '', '', 1),
(266, 104014, 'SIGA - SJP', '', '', 1),
(267, 104083, 'Administra��o do Campus SJP', '', '', 1),
(268, 104084, 'Administra��o da Diretoria de Infraestrutura', '', '', 1),
(269, 104088, 'Almoxarifado - SJPinhais', '', '', 1),
(270, 104090, 'NIAA - SJP', '', '', 1),
(271, 104096, 'Biblioteca - SJP', '', '', 1),
(272, 105013, 'SIGA - Londrina', '', '', 1),
(273, 105085, 'Administra��o da Fazenda Gralha Azul', '', '', 1),
(274, 105089, 'Agricultura - Fazenda', '', '', 1),
(275, 105099, 'Dire��o', '', '', 1),
(276, 105115, 'Administra��o do Setor Industrial', '', '', 1),
(277, 105125, 'Administra��o da L�men', '', '', 1),
(278, 105128, 'Rede Vida', '', '', 1),
(279, 105133, 'Biblioteca - Londrina', '', '', 1),
(280, 105137, 'Administra��o do Campus - Toledo', '', '', 1),
(281, 105143, 'Hospital Veterin�rio Campus Toledo - CCTP', '', '', 1),
(282, 105148, 'Administra��o da Farm�cia Universit�ria', '', '', 1),
(283, 105150, 'Administra��o do Campus Maring�', '', '', 1),
(284, 105189, 'Gest�o de Bens Patrimoniais APC', '', '', 1),
(285, 105190, 'Administrativo', '', '', 1),
(286, 105192, 'N�cleo Comunit�rio de Guaratuba', '', '', 1),
(287, 105193, 'Administrativo', '', '', 1),
(288, 105194, 'N�cleo Comunit�rio de S�o Jos� dos Pinhais', '', '', 1),
(289, 105197, 'SIGA - Maring�', '', '', 1),
(290, 105271, 'Pr�dio Laborat�rios Londrina', '', '', 1),
(291, 108001, 'Projeto M�dia Complexidade', '', '', 1),
(292, 123019, 'Pr�dio do Hospital Marcelino Champagnat', '', '', 1),
(293, 123034, 'Recep��o CD 2 HMC', '', '', 1),
(294, 123049, 'Servi�o de Hemodin�mica HMC', '', '', 1),
(295, 123059, 'Posto de Enfermagem 1 HMC', '', '', 1),
(296, 123063, 'Posto de Enfermagem 5 HMC', '', '', 1),
(297, 103300, 'Diretoria de Pesquisa', '70004750', '70004750', 1),
(298, 103507, 'Adminstra��o da Pr�-Reitoria', '88890586', '88890586', 1);

-- --------------------------------------------------------

--
-- Table structure for table `csf`
--

CREATE TABLE IF NOT EXISTS `logins_log` (
  `ul_ip` char(15) NOT NULL,
  `ul_proto` char(5) NOT NULL,
  `ul_cpf` char(15) NOT NULL
) ;

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
(1, 'Microsc�pio triocular', 'Carl Zeiss', 'Axio Scope A1', 100511, 1, '', '0', '', '', 1),
(2, 'Microsc�pio Eletr�nico de Varredura', '', '', 0, 1, '', '', '', '', 1),
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
(1, 'Microsc�pio', 5, 1),
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
(9, 'Escola Polit�cnica', '', '', 1),
(10, 'Escola de Sa�de e Bioci�ncias', '', '', 1),
(2, 'Escola de Ci�ncias Agr�rias e Medicina Veterin�ria', '', '', 1),
(1, 'Escola de Arquitetura e Design', '', '', 1),
(4, 'Escola de Comunica��o e Artes', '', '', 1),
(5, 'Escola de Direito', '', '', 1),
(6, 'Escola de Educa��o e Humanidade', '', '', 1),
(7, 'Escola de Medicina', '', '', 1),
(8, 'Escola de Neg�cios', '', '', 1),
(11, '-n�o identificado-', '', '', 1),
(12, '-n�o identificado-', '', '', 1),
(3, '--cancelado--', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

--
-- Indexes for table `centro_resultado`
--
ALTER TABLE `centro_resultado`
 ADD UNIQUE KEY `id_cr` (`id_cr`);

--
-- Indexes for table `csf`
--
ALTER TABLE `csf`
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
@@ -2871,6 +3420,11 @@ ALTER TABLE `usuario`
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
-- AUTO_INCREMENT for table `logins_log`
--
ALTER TABLE `logins_log`
MODIFY `id_ul` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
MODIFY `id_ul` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `logins_perfil`
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