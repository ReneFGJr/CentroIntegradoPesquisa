<?php
$nome_display = $this -> session -> userdata('nome_display');
$nome = $this -> session -> userdata('nome');
$cracha = $this -> session -> userdata('cracha');
$id = $this -> session -> userdata('id_us');
if (!isset($link)) { $link = base_url();
}

$admin = 0;
if (function_exists("perfil")) {
	if (perfil('#ADM')) { $admin = 1;
	}
	$link = 'index.php/';
}

if (isset($_SESSION['id_us'])) {
	echo '<div id="cab_user">';
	echo 'Seja bem-vindo, <B>' . $nome_display . ' (' . $cracha . ')</B>';
	echo '</div>';

	echo '<div id="cabecalho_user_menu" style="border: 0px solid #FFFFFF;">';
	echo '<br>';
	echo '<ul>';
	echo '<a href="' . base_url($link . 'login/logout') . '">
					<li>
						<i class="icon-remove"></i>' . $this -> lang -> line('cab_logout') . '
					</li>
				  </a>';
	echo '<a href="' . base_url($link . 'usuario/atualiza_dados/') . '">';
	echo '<li><i class="icon-refresh"></i>' . $this -> lang -> line('cab_update') . '</li></a>';

	if ($admin == 1) {
		echo '<a href="' . base_url($link . 'admin') . '">';
		echo '<li><i class="icon-wrench"></i>' . $this -> lang -> line('cab_admin') . '</li></a>' . cr();
	}
}
?>
</div>