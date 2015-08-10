SELECT 
	us_alu.us_nome AS aluno,
    us_prof.us_nome AS professor,
	us_alu_ori.us_nome AS aluno_orientador,
	ppa.id_ppa AS id_pibic,
	ppa_codigo,
	pmb.pmb_modalidade,
	ps.ps_situacao,
	p.id_pibic,
	ac.ac_nome_area,
	i.i_nome_instituicao,
	ppalu.ppa_plano,
	ppp.ppp_codigo,
	ppp.ppp_nome
FROM 
    pibic_professor_aluno AS ppa, 
	pibic_modalidade_bolsa AS pmb,
	pibic_situacao AS ps,
	pibic AS p,
	area_conhecimento AS ac,
	instituicao AS i,
	pibic_plano_aluno AS ppalu,
	pibic_projeto_professor AS ppp,
	us_usuario AS us_alu, 
	us_usuario AS us_prof,
	us_usuario AS us_alu_ori
WHERE ppa.id_professor = us_prof.id_us
AND ppa.id_aluno_pibic = us_alu.id_us
AND	ppa.id_aluno_orientador = us_alu_ori.id_us
AND	pmb.id_pmb = ppa.pmb_id
AND	ps.id_ps = ppa.ps_id
AND	ppa.id_pibic = p.id_pibic
AND	p.ac_id = ac.id_ac
AND i.id_i = p.i_id
AND ppalu.codigo_ppa = p.ppa_codigo
AND ppp.id_ppp = p.ppp_id
	UNION
SELECT 
	us_alu.us_nome AS aluno,
    us_prof.us_nome AS professor,
	'sem aluno orientando',
	ppa.id_ppa AS id_pibic,
	ppa_codigo,
	pmb.pmb_modalidade,
	ps.ps_situacao,
	p.id_pibic,
	ac.ac_nome_area,
	i.i_nome_instituicao,
	ppalu.ppa_plano,
	ppp.ppp_codigo,
	ppp.ppp_nome
FROM 
    pibic_professor_aluno AS ppa, 
	pibic_modalidade_bolsa AS pmb,
	pibic_situacao AS ps,
	pibic AS p,
	area_conhecimento AS ac,
	instituicao AS i,
	pibic_plano_aluno AS ppalu,
	pibic_projeto_professor AS ppp,
	us_usuario AS us_alu, 
	us_usuario AS us_prof,
	us_usuario AS us_alu_ori
WHERE ppa.id_professor = us_prof.id_us
AND ppa.id_aluno_pibic = us_alu.id_us
AND	ppa.id_aluno_orientador = 0
AND	pmb.id_pmb = ppa.pmb_id
AND	ps.id_ps = ppa.ps_id
AND	ppa.id_pibic = p.id_pibic
AND	p.ac_id = ac.id_ac
AND i.id_i = p.i_id
AND ppalu.codigo_ppa = p.ppa_codigo
AND ppp.id_ppp = p.ppp_id

	