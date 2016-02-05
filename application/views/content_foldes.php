<?php
if (!isset($abas)) {
	echo 'Abas not set array("title","content")';
	$abas = array();
}
$bar = '';
$texto = '';
for ($r=0;$r < count($abas);$r++)
	{
		if (isset($abas[$r]))
			{
			$title = $abas[$r]['title'];
			$content = $abas[$r]['content'];
			$bar .= '<td>'.$title.'</td>';
			$texto .= '<td>'.$content.'</td>';
			}
		
	}
?>
<table >
	<tr><?php echo $bar;?></tr>
	<tr><?php echo $texto;?></tr>
</table>
