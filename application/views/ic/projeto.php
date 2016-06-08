<?php
/* */
/* CEP */
$cep = $pj_cep_status;
switch ($cep)
	{
	case '1':
		$cep = 'Não aplicado';
		break;
	case '2':
		$cep = 'Em submissão';
		break;
	case '3':
		$cep = 'Aprovado';
		break;
	}

$ceua = $pj_ceua_status;
switch ($ceua)
	{
	case '1':
		$ceua = 'Não aplicado';
		break;
	case '2':
		$ceua = 'Em submissão';
		break;
	case '3':
		$ceua = 'Aprovado';
		break;
	}

$editar_titulo = '';
if (perfil('#ADM#SPI'))
	{
		$editar_titulo = '<br><a href="#" onclick="newwin(\''.base_url('index.php/ic/projeto_alterar_titulo/'.$id_pj.'/'.checkpost_link($id_pj)).'\',600,600);" class="lt0 link"">editar título</a>';
	}

$logo = '';
if (!isset($ged)) { $ged = ''; $ged_arquivos = '';}
switch ($pj_edital)
	{
	case 'ICMST':
		$logo = '<img src="'.base_url('img/logo/logo_ic_master.png').'" width="150">';
		break;
	case 'PIBEP':
		$logo = '<img src="'.base_url('img/logo/logo_pibep.png').'" width="150">';
		break;		
	}
?>
<table class="captacao_folha border1 black" width="100%" border=0>
	<tr class="lt0" align="left" valign="top">
		<td colspan=3><?php echo msg('projeto_titulo');?></td>
		<td align="right"><?php echo msg('protocolo');?></td>
		<td align="right" rowspan=5 width="150"><?php echo $logo;?></td>
	</tr>
	<tr class="lt2">
		<td align="left" colspan=3 class="lt4"><b><?php echo $pj_titulo;?></b><?php echo $editar_titulo;?></td>
		<td align="right"><?php echo $pj_codigo;?></td>
	</tr>
	<tr class="lt0" align="left">
		<td colspan=3><?php echo msg('orientador');?></td>
		<td align="right"><?php echo msg('ano');?></td>
	</tr>
	<tr class="lt2" align="left">
		<td colspan=3><?php echo link_perfil($pf_nome, $id_pf);?></td>
		<td align="right"><?php echo $pj_ano;?></td>
	</tr>
	
	<?php if ($id_al > 0) { ?>
	<tr class="lt0" align="left">
		<td colspan=3><?php echo msg('estudante');?></td>
	</tr>
	<tr class="lt2" align="left">
		<td colspan=5><?php echo link_perfil($al_nome, $id_al);?></td>
	</tr>
	<?php } ?>
	
	<tr class="lt0">
		<td align="left">Avaliação do Comitê de Ética com Seres Humanos (CEP): <b><?php echo $cep;?></b></td>
		<td>Avaliação do Comitê de Ética no Uso de Animais (CEUA): <b><?php echo $ceua;?></b></td>
	</tr>
	
	<tr class="lt0" align="left">
		<td colspan=2><?php echo msg('area');?></td>
		<td colspan=3><?php echo msg('situacao');?></td>
	</tr>	
	<tr class="lt2" align="left">
		<td align="left" colspan=2><?php echo $ac_nome_area;?>(<?php echo $pj_area;?>)</td>
		<td align="left" colspan=3 class="lt2"><font color="#FF8C00"><b><?php echo $ssi_descricao;?></b></font></td>
	</tr>
	<tr class="lt1" align="left">
		<td align="left" colspan=5>
			<?php echo $ged;?>
			<?php echo $ged_arquivos;?>			
		</td>
	</tr>	
	<!--Informacoes extra do projeto -->
	<tr class="lt1" align="left" >
		<td >Informações: </td>
	</tr>
		<tr class="lt1" align="left">
			<td align="left" colspan=5> 
				<ul>
					<?php if ((strlen($pj_coment) > 0)){
						echo "<li>$pj_coment</li>";
					}?>	
					
					<?php if ((strlen($pj_ss_programa) > 0)){
						echo "<li>$pj_ss_programa</li>";
					}?>
					
					<?php if ((strlen($pj_ss_linha) > 0)){
						echo "<li>$pj_ss_linha</li>";
					}?>
					
					<?php if ((strlen($pj_cep) > 0)){
						echo "<li>$pj_cep</li>";
					}?>
					
					<?php if ((strlen($pj_ceua) > 0)){
						echo "<li>$pj_ceua</li>";
					}?>
					
					<?php if ((strlen($pj_cep_status) > 0)){
						echo "<li>$pj_cep_status</li>";
					}?>
					
					<?php if ((strlen($pj_ceua_status) > 0)){
						echo "<li>$pj_ceua_status</li>";
					}?>
					
					<?php if ((strlen($pj_ext_sn) > 0)){
						echo "<li>$pj_ext_sn</li>";
					}?>
					
					<?php if ((strlen($pj_ext_local) > 0)){
						echo "<li>$pj_ext_local</li>";
					}?>
					
					<?php if ((strlen($pj_ext_edital) > 0)){
						echo "<li>$pj_ext_edital</li>";
					}?>
					
					<?php if ((strlen($pj_ext_chamada) > 0)){
						echo "<li>$pj_ext_chamada</li>";
					}?>
					
					<?php if ((strlen($pj_ext_valor) > 0)){
						echo "<li>$pj_ext_valor</li>";
					}?>
					
					<?php if ((strlen($pj_ext_vjini) > 0)){
						echo "<li>$pj_ext_vjini</li>";
					}?>
					
					<?php if ((strlen($pj_est_vjfim) > 0)){
						echo "<li>$pj_est_vjfim</li>";
					}?>
					
					<?php if ((strlen($pj_gr2_sn) > 0)){
						echo "<li>$pj_gr2_sn</li>";
					}?>
					
					<?php if ((strlen($pj_gr2_local) > 0)){
						echo "<li>$pj_gr2_local</li>";
					}?>
					
					<?php if ((strlen($pj_gr2_cnpj) > 0)){
						echo "<li>$pj_gr2_cnpj</li>";
					}?>
					
					<?php if ((strlen($pj_gr2_valor) > 0)){
						echo "<li>$pj_gr2_valor</li>";
					}?>	
					
					<?php if ((strlen($pj_gr2_vjini) > 0)){
						echo "<li>$pj_gr2_vjini</li>";
					}?>	
					
					<?php if ((strlen($pj_gr2_vjfim) > 0)){
						echo "<li>$pj_gr2_vjfim</li>";
					}?>	
					
					<?php if ((strlen($pj_bp) > 0)){
						echo "<li>$pj_bp</li>";
					}?>	
					
					<?php if ((strlen($pj_professor) > 0)){
						echo "<li>Cracha professor: $pj_professor</li>";
					}?>	
					
					<?php if ((strlen($pj_aluno) > 0)){
						echo "<li>Cracha aluno: $pj_aluno</li>";
					}?>	
						
				</ul>
			</td>
		</tr>		
	
	<?php 
	if (isset($equipe))
		{
	if (strpos($equipe,'Nenhum membro registrado na equipe') == 0) { ?>
	<tr class="lt1" align="left" >
		<td colspan=2>Equipe do projeto: <?php echo $equipe; ?></td>
	</tr>
	<?php } } ?>	
</table>
