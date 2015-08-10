CREATE TABLE IF NOT EXISTS `cip`.`pibic_professor_aluno` (
  `id_ppa` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_pibic` BIGINT(20) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'vinculo com tabela pibic',
  `id_professor` BIGINT(20) UNSIGNED NOT NULL DEFAULT 0,
  `id_aluno_pibic` BIGINT(20) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'vinculo tabela usuario como aluno pibic',
  `ppa_dt_inicio_aluno` DATE NULL,
  `ppa_dt_terrmino_aluno` DATE NULL,
  `ppa_finalizou` TINYINT(1) NULL DEFAULT 0 COMMENT 'se = 1, esse aluno finalizou o pibic.',
  `id_aluno_orientador` BIGINT(20) UNSIGNED NOT NULL DEFAULT 0,
  `ppa_dt_aluno_orientador_inicio` DATE NULL,
  `ppa_dt_aluno_orientador_termino` DATE NULL,
  `pmb_id` BIGINT(20) UNSIGNED NOT NULL DEFAULT 1 COMMENT 'vinculo com modalidade de bolsa 1 = sem bolsa',
  `ppa_dt_inicio_bolsa_aluno` DATE NULL,
  `ppa_dt_termino_bolsa_aluno` DATE NULL,
  `ps_id` INT NOT NULL DEFAULT 1 COMMENT 'situação (1 = em andamento)',
  PRIMARY KEY (`id_ppa`))
ENGINE = InnoDB

CREATE TABLE IF NOT EXISTS `cip`.`pibic_modalidade_bolsa` (
  `id_pmb` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `pmb_modalidade` VARCHAR(45) NULL COMMENT '1 = sem bolsa',
  `pmb_valor` DECIMAL(9,2) NULL,
  `pmb_moeda` VARCHAR(15) NULL,
  `pmb_ativo` TINYINT(1) NULL DEFAULT 1,
  PRIMARY KEY (`id_pmb`))
ENGINE = InnoDB

CREATE TABLE IF NOT EXISTS `cip`.`pibic_situacao` (
  `id_ps` INT NOT NULL AUTO_INCREMENT,
  `ps_situacao` VARCHAR(45) NULL COMMENT '1 = em andamento',
  `ps_ativo` TINYINT(1) NULL DEFAULT 1,
  PRIMARY KEY (`id_ps`))
ENGINE = InnoDB

CREATE TABLE IF NOT EXISTS `cip`.`pibic` (
  `id_pibic` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ac_id` INT UNSIGNED NOT NULL COMMENT 'vinculo com area do conhecimento',
  `i_di` BIGINT(20) UNSIGNED NOT NULL COMMENT 'vinculo com isntituição',
  `ppa_codigo` VARCHAR(10) NOT NULL COMMENT 'vinculo com o plano de aluno',
  `ppp_id` BIGINT(20) UNSIGNED NOT NULL COMMENT 'vinculo com projeto do professor',
  PRIMARY KEY (`id_pibic`))
ENGINE = InnoDB

CREATE TABLE IF NOT EXISTS `cip`.`pibic_projeto_professor` (
  `id_ppp` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ppp_codigo` VARCHAR(7) NULL COMMENT 'codigo cotrole n000000',
  `ppp_nome` VARCHAR(100) NULL,
  PRIMARY KEY (`id_ppp`))
ENGINE = InnoDB

CREATE TABLE IF NOT EXISTS `cip`.`pibic_plano_aluno` (
  `codigo_ppa` VARCHAR(7) NOT NULL,
  `ppa_plano` VARCHAR(80) NULL,
  PRIMARY KEY (`codigo_ppa`))
ENGINE = InnoDB
-----------------------------------------------
----Tabelas já criadas em outras situações ----
-----------------------------------------------
CREATE TABLE IF NOT EXISTS `cip`.`instituicao` (
  `id_i` BIGINT(20) UNSIGNED NOT NULL,
  `i_nome_instituicao` VARCHAR(80) NULL,
  `i_ativo` TINYINT(1) NULL DEFAULT 1,
  PRIMARY KEY (`id_i`))
ENGINE = InnoDB

CREATE TABLE IF NOT EXISTS `cip`.`area_conhecimento` (
  `id_ac` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `ac_nome_area` VARCHAR(60) NULL,
  `ac_ativo` TINYINT(1) NULL DEFAULT 1,
  PRIMARY KEY (`id_ac`))
ENGINE = InnoDB

CREATE TABLE IF NOT EXISTS `cip`.`us_usuario` (
  `id_us` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `us_nome` VARCHAR(250) NULL,
  `us_nome_lattes` VARCHAR(150) NULL,
  `us_cpf` VARCHAR(15) NULL,
  `us_cracha` VARCHAR(15) NULL,
  `us_emplid` VARCHAR(15) NULL COMMENT 'Código do campus solution',
  `us_link_lattes` VARCHAR(100) NULL,
  `us_ativo` TINYINT(1) NULL DEFAULT 1,
  `us_teste` TINYINT(1) NULL DEFAULT 0,
  `us_origem` INT(2) NULL DEFAULT 1 COMMENT '[1 - Não Definido],\n[2 - PUCPR], \n[3 - Externo]',
  `us_professor_tipo` INT(2) NULL DEFAULT 1 COMMENT '[1 - Não Definido], \n[2 - Stricto Sensu],\n[3 - Graduação]',
  `us_regime` VARCHAR(10) NULL COMMENT 'Horista / TI / TP',
  `us_genero` CHAR(1) NULL COMMENT '\'M\' = masculino\n\'F\' = feminino',
  `us_dt_nascimento` DATE NULL,
  `ustp_id` INT(11) NOT NULL DEFAULT 1 COMMENT 'vicnulo com a tabela usuario_tipo\n[1 - Não Definido],\n[2 - Professor],\n[3 - Aluno],\n[4 - Colaborador],\n[5 - Externo],\n',
  `usf_id` INT(11) NOT NULL DEFAULT 1 COMMENT 'vinculo com a tabela usuario_função',
  `ust_id` INT(11) NOT NULL DEFAULT 1 COMMENT 'vinculo com a tabela usuario_titulação\n[1 - Não Definido],\n[2 - Técnico],\n[3 - Graduação],\n[4 - Especialista],\n[5 - Mestre],\n[6 - Doutor],\n[7 - Pós-Doutorado],\n[8 - Residência Médica],',
  `us_prof_drh` TINYINT(1) NULL DEFAULT 0 COMMENT 'Se os dados vieram do DRH',
  `us_avaliador` TINYINT(1) NULL DEFAULT 0,
  PRIMARY KEY (`id_us`))
ENGINE = InnoDB
