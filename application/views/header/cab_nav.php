<?php
if (isset($menus))
	{
		
	} else {
		$menus = array();
	}

echo '<div id="cab_nav">';
echo '<table id="cab_ul">
		<tr valign="top">';
echo '<td class="cab_nav_td">';
echo '<A href="'.base_url('index.php/main').'"><img src="'.base_url('img/icon/icone_home.png').'" border=0 height="16" title="home"></A>'.cr();
echo '</td>';

for ($r=0;$r < count($menus);$r++)
	{
		echo '<td class="cab_nav_td">';
		echo '<A href="'.base_url($menus[$r][1]).'">'.$menus[$r][0].'</A>';
		echo '</td>';
	}
//echo '</ul>';

echo '</tr>';
echo '</table>';
echo '</div>';
?>
