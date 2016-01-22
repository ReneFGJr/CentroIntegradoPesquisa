<?php
$nome_display = $this -> session -> userdata('nome_display');
$nome = $this -> session -> userdata('nome');
$cracha = $this -> session -> userdata('cracha');
$id     = $this -> session -> userdata('id_us');


$link = 'index.php/';
?>
<div id="cab_user">
	Seja bem-vindo, <B><?php echo $nome_display;?>
	(<?php echo $cracha;?>)</B>
</div>
<div id="cabecalho_user_menu" style="border: 0px solid #FFFFFF;">
	<br>
	<ul>
		<a href="<?php echo base_url($link . 'login/logout');?>">
		<li>
			<i class="icon-remove"></i><?php echo $this -> lang -> line('cab_logout');?>
			
		</li></a><a href="<?php echo base_url($link . 'usuario/atualiza_dados_usu_session/' . $id);?>">
		<li>
			<i class="icon-refresh"></i>
			<?php echo $this -> lang -> line('cab_update');?>
		</li></a>
		<?php
		if (perfil('#ADM')) {
			echo '<a href="' . base_url($link . 'admin') . '">';
			echo '
<li><i class="icon-wrench"></i>' . $this -> lang -> line('cab_admin') . '</li></a>' . cr();
		}
		?>
</div>