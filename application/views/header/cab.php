<div id="cab_screen" class="cab_admin">
	<div id="caber">
		<div id="titu1" class="cab_title">
			<?php echo $title_page;?>
		</div>
		<div id="titu2" class="cab_title">
			<?php echo $title_page;?>
		</div>
		<A href="<?php echo base_url('index.php/main');?>"> <div id="cab_logo_1" ></div> <div id="cab_logo_2" ></div> </A>
		<?php
		$this -> load -> view('header/cab_user');
		?>
	</div>
</div>
<?php
if ($menu == 1) {
	if (!isset($menus)) { $menus = array(); }
	
	$data = array();
	$data['menus'] = $menus;
	$this -> load -> view('header/cab_nav',$data);
}
?>
<div id="cab_print">
	<table width="100%" >
		<tr>
			<td>
				<img src="<?php echo base_url('img/logo/logo_pucpr.png');?>" height="40">
				<img src="<?php echo base_url('img/logo_cip.png');?>" height="30">
				
				</td>
			<td align="center" class="lt6"><?php echo $title_page;?></td>
			<td align="right" class="lt0"><?php
				echo date("d/m/Y H:i");
				echo '<BR>http://cip.pucpr.br'
			?></td>
		</tr>
		<tr>
			<td colspan=3><hr size=1></td>
		</tr>
	</table>
</div>
