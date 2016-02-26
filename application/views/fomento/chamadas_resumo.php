<div id="chamadas_pdi">
	<h1>Editais abertos</h1>
	<br>
	<br>
	<a href="<?php echo base_url('index.php/' . 'edital/abertos');?>">ver todos</a>
	<div class="banner">
		<ul>
			<li>
				Chamada 0
			</li>
			<li>
				Chamada 2
			</li>
		</ul>
	</div>
</div>
<script>
	$(function() {
		$('.banner').unslider()
	})
</script>
<style>
	.banner {
		position: relative;
		width: 100%;
		overflow: auto;
		padding: 0px;
		margin: 0px;
	}
	.banner ul {
		padding: 0px;
		margin: 0px;
	}
	.banner li {
		padding: 0px;
		margin: 0px;
	}
	.banner ul li {
		float: left;
		padding: 0px;
		margin: 0px;
		min-height: 200px;
		-webkit-background-size: 100% auto;
		-moz-background-size: 100% auto;
		-o-background-size: 100% auto;
		-ms-background-size: 100% auto;
		background-size: 100% auto;
		background-position-y: -75px;
		box-shadow: inset 0 -3px 6px rgba(0,0,0,.1);
	}
</style>