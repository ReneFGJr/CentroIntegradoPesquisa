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
	$this -> load -> view('header/cab_nav');
}
?>
<div id="cab_print">
	IMPRESSORA
</div>
