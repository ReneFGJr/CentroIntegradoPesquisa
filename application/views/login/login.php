<!--- LOGIN --->
<div id="login_cab">
	<div id="login_logos">
		<img src="<?php echo base_url('img/imagem_lampada_cabecalho.png');?>" style="width: 30%;">
		<div id="login_logos_img"></div>
		<div id="login_versao"><?php echo $login_versao;?> <?php echo $versao;?></div>
	</div>
	
	<!--- LOGIN FORMULARIO --->
	<div id="login_form">
		<!-- Abertura do formulario -->
		<?php
			$link = index_page();
			if (strlen($link) > 0) { $link .= '/'; }
			$link = base_url($link.'login'.$link_debug);
			echo form_open($link);?>
		
			<?php
			/* Login user */ 
			echo $login_name.'<BR>';
			$data = array('name'=>'dd1','class'=>'formulario-entrada','id'=>'login_name','value'=>$lg_name);
			echo form_input($data);
			
			echo '<BR><BR>';
			
			/* Login user */ 
			echo $login_password.'<BR>';
			$data = array('name'=>'dd2','class'=>'formulario-entrada','id'=>'login_password','value'=>'');
			echo form_password($data);
			
			echo '<BR><BR>';			
		
			/* Submit Buttom */ 
			$data = array('name'=>'acao','class'=>'estilo-botao','id'=>'login_entrar','value'=>$login_entrar);
			echo form_submit($data);			
			?>
			<BR>
			<BR>

			<?php echo $login_error;?>
			<div id="modo"><?php echo $modo;?></div>
		<?php echo form_close(); ?>
	</div>
	
	<!--- FIM --->
</div>
