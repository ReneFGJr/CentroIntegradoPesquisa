<?php
if (isset($title)) {
	echo '<h1>' . $title;
	if (isset($submenu)) {
		echo '<br>'.$submenu.'</br>';
	}
	echo '</h1>';
}
echo $content;
?>