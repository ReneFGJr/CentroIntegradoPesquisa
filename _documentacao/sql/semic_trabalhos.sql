CREATE TABLE semic_trabalhos (
id_st serial NOT NULL,
  st_codigo char(7) NOT NULL,
  st_cod_trabalho char(15),
  st_edital char(10) NOT NULL,
  st_modalidade char(5) NOT NULL,
  st_id char(10) NOT NULL,
  st_area char(15) NOT NULL,
  st_nota_submint int8 NOT NULL,
  st_nota_rel_parcial int8 NOT NULL,
  st_nota_rel_final int8 NOT NULL,
  st_nota_media int8 NOT NULL,
  st_nota_semic_oral int8 NOT NULL,
  st_nota_semic_poster int8 NOT NULL
) 
