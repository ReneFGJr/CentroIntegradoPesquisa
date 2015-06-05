<center>
	<div class="banner_tela">
		<div class="banner">
			<ul>
				<li><img src="<?php echo base_url('img/background/img_comunitario.png');?>" class="banner_full" title="Comunitarias" />
				</li>
				<li><img src="<?php echo base_url('img/background/img_engenharia.png');?>" class="banner_full"title="The long and winding road" />
				</li>
				<li><img src="<?php echo base_url('img/background/img_laboratorio.png');?>" class="banner_full" title="Happy trees" />
				</li>
			</ul>
		</div>
	</div>
</center>
<script>
	$(function() {
		$('.banner').unslider();
	});

</script>
<style>
	.banner_full {
		width: 100%;
		height: 150px;
	}
	.banner_tela {
		position: relative;
		overflow: auto;
		width: 100%;
	}
	.banner {
		position: relative;
		overflow: auto;
		width: 9069px;
		margin: 0px;
	}
	.banner li {
		list-style: none;
		margin: 0px;
	}
	.banner ul li {
		margin: 0px;
		float: left;
	}
</style>