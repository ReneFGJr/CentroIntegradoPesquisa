<table cellpadding="0" cellspacing="4" width="180" class="tabela01 lt1" style="border-right: 1px solid #666;" >
<?php
	$pos = 0;
	foreach ($bp as $key => $value) {
			$pos++;
			$class="pbv_01";
			$class_2="pbv_01a";
			$r = $key;
			if ($r == ($bp_atual)) { $class="pbv_02";  $class_2="pbv_02a";}
			if ($r > ($bp_atual))  { $class="pbv_03";  $class_2="pbv_03a";}
			echo '<tr >
					<td><div class="'.$class.'">'.($pos).'</div></td>
					<td><div class="'.$class_2.'">'.$value.'</div></td>
				  </tr>';
			
		}
	?>
</table>

<!-- Style --->
<style>
	.pbv_01a
		{
			color: #ddd;
		}
	.pbv_03a
		{
			color: #999;
			border: 1px solid #00000;
		}		
	.pbv_01
		{
			border: 1px solid #4A0000;
			border-radius: 20px;
			background-color: #6A0000;
			color: #fff;
			width: 20px;
			height: 25px;
			text-align: center;
			font-size: 20px;
			font-family: 'CICPG', Verdana, Geneva, Arial, Helvetica, sans-serif;
			padding: 5px;
		}
	.pbv_02
		{
			border: 1px solid #6A0000;
			border-radius: 20px;
			background-color: #CA4459;
			color: #fff;
			width: 20px;
			height: 25px;
			text-align: center;
			font-size: 20px;
			font-family: 'CICPG', Verdana, Geneva, Arial, Helvetica, sans-serif;
			padding: 5px;
		}
	.pbv_03
		{
			border: 1px solid #888;
			border-radius: 20px;
			background-color: #ddd;
			color: #111;
			width: 20px;
			height: 25px;
			text-align: center;
			font-size: 20px;
			font-family: 'CICPG', Verdana, Geneva, Arial, Helvetica, sans-serif;
			padding: 5px;
		}
</style>
