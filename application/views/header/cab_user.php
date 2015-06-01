<?php
$dados = $this -> session -> userdata();
$nome = $dados['nome'];
$cracha = $dados['cracha'];

$link = 'index.php/';
?>
<div id="cab_user">
	Seja bem-vindo, <B><?php echo $nome;?>
	(<?php echo $cracha;?>)</B>
</div>
<div id="cabecalho_user_menu" style="border: 0px solid #FFFFFF;">
	<br>
	<ul>
		<a href="<?php echo base_url($link.'login/logout');?>">
		<li>
			<i class="icon-remove"></i> Sair
		</li></a><a href="<?php echo base_url($link.'login/myaccount');?>">
		<li>
			<i class="icon-refresh"></i>
			Atualizar dados
		</li></a><a href="<?php echo base_url($link.'admin');?>">
		<li>
			<i class="icon-wrench"></i> Administração
		</li></a>
</div>