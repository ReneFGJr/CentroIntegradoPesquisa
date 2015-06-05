<div id="main_menu">
<h1><?php echo $title_menu;?></h1>
<?php
for ($r = 0; $r < count($menu); $r++) {
	$tipo = $menu[$r][2];

	switch ($tipo) {
		case 'BTN' :
			echo '
				<a href="' . base_url('index.php'.$menu[$r][3]) . '\" onclick="parent.location=\'' . $menu[$r][3] . '\'" class="no-undeline">     
					<div id="icone-cip-2" class="icone-iniciacao-cientifica icone-cip">
						<h2 class="icone-iniciacao-cientifica-cor">' . $menu[$r][0] . '</h2>
						<p>
							' . $menu[$r][1] . '
						</p>						
					</div>
				</a>
			';
			break;
		case 'BTA' :
			echo '
				<a href="' . base_url('index.php'.$menu[$r][3]) . '\" onclick="parent.location=\'' . $menu[$r][3] . '\'" class="no-undeline">     
					<div id="icone-cip-2" class="icone-admin icone-cip">
						<h2 class="icone-admin-cor">' . $menu[$r][0] . '</h2>
						<p>
							' . $menu[$r][1] . '
						</p>						
					</div>
				</a>
			';
			break;			
	}
}
?>
</div>