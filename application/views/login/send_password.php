<!--- LOGIN --->
<div id="login_cab">
	<div id="login_logos">
		<img src="<?php echo base_url('img/imagem_lampada_cabecalho.png');?>" style="width: 30%;">
		<div id="login_logos_img"></div>
		<div id="contato">
			<h2>O que � o CIP?</h2>
			O CIP � o Centro Integrado de Pesquisa da PUCPR. Aqui, coordenadores e pesquisadores podem acessar suas informa��es pessoais e de pesquisa para seu controle, gera��o de relat�rios, entre outras atividades.
			<h2>Como funciona?</h2>
			No CIP, voc� pode buscar as pesquisas existentes, gerar relat�rios de pesquisa e pesquisadores, atualizar informa��es, visualizar indicadores.
			<h2>Contato CIP</h2>
			<h3>Contatos Inicia��o Cient�fica</h3>
			pibicpr@pucpr.br<BR> 
			Telefones:<BR>
			(041) 3271-1165, 3271-2112, 3271-1602
			<!--
			<h3>Contato Diretoria de Pesquisa</h3>
			cip@pucpr.br<BR>	
			Telefone: (041) 3271-2582
			--></BR>
			</h2>
			
		</div>
		<div id="login_versao"><?php echo $login_versao;?> <?php echo $versao;?></div>
	</div>
	
	<!--- LOGIN FORMULARIO --->
	<div id="login_form">
		<!-- Abertura do formulario -->
		<?php
			$link = base_url('index.php/login/link');
			echo form_open($link);?>
		
			<?php
			/* Login user */ 
			echo 'Informe o n�mero de seu crach�'.'<BR>';
			$data = array('name'=>'dd1','class'=>'formulario-entrada','id'=>'cracha','value'=>$lg_name);
			echo form_input($data);
						
			echo '<BR><BR>';			
		
			/* Submit Buttom */ 
			$data = array('name'=>'acao','class'=>'estilo-botao','id'=>'login_entrar','value'=>'Enviar link de acesso');
			echo form_submit($data);			
			?>
			<BR><BR>
				<?php echo $login_error;?>
			<BR>
			<br><br><br><br>
			
			</form>
			
		<?php echo form_close(); ?>
	</div>
	
	<!--- FIM --->
</div>
