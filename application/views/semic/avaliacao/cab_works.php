<table width="980" border=0 align="center" cellpadding="0" cellspacing="0">
	<tr class="cab_semic">
		<?php 
		if (isset($back)) {
			echo '<td width="80" align="right">';
			echo '<a href="'.$back.'" class="link">';
			echo '<img src="'.base_url('img/icon/icone_back.png').'" height="60" border=0>';
			echo '</a>';
			echo '</td>';	
		}
		?>
		<td><A name="top"></A><?php echo $title; ?></td>
	</tr>
</table>
