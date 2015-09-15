<?php
for ($r=0;$r < count($menu);$r++)
	{
		echo '<font class="lt1">MENU</font>';
		echo ' | ';
		echo '<a href="'.base_url('index.php/'.$menu[$r][1]).'" class="link lt1">';
		echo msg($menu[$r][0]);
		echo '</a>';
		echo ' | ';
	}
