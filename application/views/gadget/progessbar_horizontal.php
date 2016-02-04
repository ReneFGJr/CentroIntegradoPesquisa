<table cellpadding="0" cellspacing="0" width="180" style="padding-right: 10px;" >
<tr >
<?php
	$pos = 0;
	foreach ($bp as $key => $value) {
			$pos++;
			$class="pbv_01";
			$class_2="pbv_01a";
			$r = $key;
			if ($r == ($bp_atual)) { $class="pbv_02";  $class_2="pbv_02a";}
			if ($r > ($bp_atual))  { $class="pbv_03";  $class_2="pbv_03a";}
			echo '
					<td>
					<a href="'.$bp_link.'/'.$pos.'" class="pdv">
					<div class="'.$class_2.' pdv">
					<font class="'.$class.'">'.($pos).'</font>
					'.$value.'</div></td>
					</a>
				  ';
			
		}
?>
</tr></table>

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
		background-color: #FEFEFE;
		border: 1px solid #c0c0c0;
		border-radius: 10px 10px 10px 10px;
		padding: 10px;
		color: #555;
		margin-right: 10px;
	}
.pbv_02a
	{
		background-color: #8a0419;
		border: 1px solid #c0c0c0;
		border-radius: 10px 10px 10px 10px;
		padding: 10px;
		color: white;
		margin-right: 10px;
	}
.pbv_03a
	{
		background-color: #FEFEFE;
		border: 1px solid #c0c0c0;
		border-radius: 10px 10px 10px 10px;
		padding: 10px;
		margin-right: 10px;
	}		
</style>