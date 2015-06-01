<!--- LOGIN --->
<div id="login_cab">
	<div id="login_logos">
		<div id="login_logos_img"></div>
		<div id="login_versao"><?php echo $login_versao;?> <?php echo $versao;?></div>
	</div>
	
	<!--- LOGIN FORMULARIO --->
	<div id="login_form">
		<!-- Abertura do formulario -->
		<?php
			$link = index_page();
			if (strlen($link) > 0) { $link .= '/'; }
			$link = base_url($link.'login');
			echo form_open($link);?>
		
			<?php
			/* Login user */ 
			echo $login_name.'<BR>';
			$data = array('name'=>'dd1','class'=>'formulario-entrada','id'=>'login_name','value'=>$lg_name);
			echo form_input($data);
			
			echo '<BR><BR>';
			
			/* Login user */ 
			echo $login_password.'<BR>';
			$data = array('name'=>'dd2','class'=>'formulario-entrada','id'=>'login_password','value'=>$lg_password);
			echo form_password($data);
			
			echo '<BR><BR>';			
		
			/* Submit Buttom */ 
			$data = array('name'=>'acao','class'=>'estilo-botao','id'=>'login_entrar','value'=>$login_entrar);
			echo form_submit($data);			
			?>
			<BR>
			<BR>

			<?php echo $login_error;?>
		<?php echo form_close(); ?>
	</div>
	
	<!--- FIM --->
</div>
