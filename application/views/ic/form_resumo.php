<style>
	.form_textarea { width: 100%; }
	.form_string   { width: 100%; }
</style>
<?php
$cp = array();
array_push($cp,array('$H8','sm_codigo','',False,False));

array_push($cp,array('$A','','Resumo em Português',False,True));
array_push($cp,array('$T80:4','sm_rem_01','Introdução',False,True));
array_push($cp,array('$T80:4','sm_rem_02','Objetivo(s)',False,True));
array_push($cp,array('$T80:4','sm_rem_03','Metodologia',False,True));
array_push($cp,array('$T80:4','sm_rem_04','Resultado(s)',False,True));
array_push($cp,array('$T80:4','sm_rem_05','Considerações',False,True));
array_push($cp,array('$S250','sm_rem_06','Palavras-chave',False,True));

array_push($cp,array('$A','','Resumo em Inglês',False,True));
array_push($cp,array('$T80:4','sm_rem_11','Introduction',False,True));
array_push($cp,array('$T80:4','sm_rem_12','Purpose',False,True));
array_push($cp,array('$T80:4','sm_rem_13','Method',False,True));
array_push($cp,array('$T80:4','sm_rem_14','Result(s)',False,True));
array_push($cp,array('$T80:4','sm_rem_15','Conclusions ',False,True));
array_push($cp,array('$S250','sm_rem_16','Keywords',False,True));

array_push($cp,array('$B8','','Salvar resumo',False,True));
$form = new form;
$form->id = $ic_plano_aluno_codigo;
$sx = $form->editar($cp,'semic_trabalho');
echo $sx;
?>

