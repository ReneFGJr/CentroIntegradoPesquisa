<table cellpadding="0" cellspacing="0" width="180" style="border-right: 1px solid #666; padding-right: 10px;" >
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
					<td>
					<a href="'.$bp_link.'/'.$pos.'" class="pdv">
					<div class="'.$class_2.' pdv">
					<font class="'.$class.'">'.($pos).'</font>
					'.$value.'</div></td>
					</a>
				  </tr>';
			
		}
?>
</table>

<style>
.pbv_01, .pbv_02, .pbv_03
	{
		font-size: 20px;
	}
.pdv
	{
		opacity: 0.8;
		text-decoration: none;
	}
.pdv:hover
	{
		opacity: 1;
	}
.pdv:visited
	{
		color: #000000;
		opacity: 1;
	}		
.pbv_01a
	{
		background-color: #777;
		border: 1px solid #c0c0c0;
		border-radius: 0px 10px 10px 0px;
		padding: 10px;
		width: 120px;
		color: #ccc;
	}
.pbv_02a
	{
		background-color: #8a0419;
		border: 1px solid #c0c0c0;
		border-radius: 0px 10px 10px 0px;
		padding: 10px;
		width: 160px;
		color: white;
	}
.pbv_03a
	{
		background-color: #F0F0F0;
		border: 1px solid #c0c0c0;
		border-radius: 0px 10px 10px 0px;
		padding: 10px;
		width: 120px;
	}		
</style>