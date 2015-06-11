CREATE TABLE IF NOT EXISTS `teste_gnose`.`usuario` (
  `id_us` INT(11) NOT NULL AUTO_INCREMENT,
  `us_nome` VARCHAR(250) NULL DEFAULT NULL,
  `us_cpf` VARCHAR(15) NULL DEFAULT NULL,
  `us_cracha` VARCHAR(15) NULL DEFAULT NULL,
  `us_cracha_completo` VARCHAR(15) NULL DEFAULT NULL,
  `us_login` VARCHAR(80) NULL DEFAULT NULL,
  `us_pass` VARCHAR(100) NULL DEFAULT NULL,
  `us_email` VARCHAR(150) NULL DEFAULT NULL,
  `us_link_lattes` VARCHAR(100) NULL DEFAULT NULL,
  `us_ativo` TINYINT(1) NULL DEFAULT 1,
  `us_teste` TINYINT(1) NULL DEFAULT 0,
  `us_origem` TINYINT(1) NULL DEFAULT 0 COMMENT '0 - PUCPR\n1 - Externo',
  `us_professor_tipo` TINYINT(1) NULL DEFAULT 0 COMMENT '0 - Graduação\n1 - Stricto Sensu',
  `us_aluno_tipo` VARCHAR(45) NULL DEFAULT NULL,
  `us_regime` VARCHAR(10) NULL DEFAULT NULL COMMENT 'Horista / TI / TP',
  `us_genero` CHAR(1) NULL DEFAULT NULL COMMENT '\'M\' = masculino\n\'F\' = feminino',
  `usuario_tipo_ust_id` INT(11) NOT NULL,
  `usuario_funcao_usf_id` INT(11) NOT NULL,
  `usuario_titulacao_ust_id` INT(11) NOT NULL,
  PRIMARY KEY (`id_us`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_swedish_ci
COMMENT = 'Tabela com dados de usuarios (Alunos, Professores, Colaboradores e Externos)';

CREATE TABLE IF NOT EXISTS `teste_gnose`.`usuario_complemento` (
  `usuario_id_us` INT(11) NOT NULL,
  `usc_rua` VARCHAR(150) NULL DEFAULT NULL,
  `usc_complemento` VARCHAR(45) NULL DEFAULT NULL,
  `usc_bairro` VARCHAR(80) NULL DEFAULT NULL,
  `usc_cep` VARCHAR(10) NULL DEFAULT NULL,
  `usc_cidade` VARCHAR(80) NULL DEFAULT NULL,
  `usc_pais` VARCHAR(60) NULL DEFAULT NULL,
  `usc_uf` CHAR(2) NULL DEFAULT NULL,
  `usc_fone_residencial` VARCHAR(15) NULL DEFAULT NULL,
  `usc_fone_celular` VARCHAR(15) NULL DEFAULT NULL,
  `usc_fone_comercial` VARCHAR(15) NULL DEFAULT NULL,
  `usc_fone_recado` VARCHAR(15) NULL DEFAULT NULL,
  `usc_dt_nascimento` DATE NULL DEFAULT NULL,
  `usc_raca_cor` VARCHAR(20) NULL DEFAULT NULL,
  `usc_nacionalidade` VARCHAR(45) NULL DEFAULT NULL,
  `usc_rg` VARCHAR(20) NULL DEFAULT NULL,
  `usc_orgao_expedidor` VARCHAR(20) NULL DEFAULT NULL,
  `usc_nome_mae` VARCHAR(150) NULL DEFAULT NULL,
  `usc_cpf_mae` VARCHAR(15) NULL DEFAULT NULL,
  `usc_nome_pai` VARCHAR(150) NULL DEFAULT NULL,
  `usc_cpf_pai` VARCHAR(15) NULL DEFAULT NULL)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_swedish_ci
COMMENT = 'Tabela com dados complementares menos utilziados (pode ser que ainda necessite de mais dados)';