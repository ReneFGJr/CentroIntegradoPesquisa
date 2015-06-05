<script src="<?php echo base_url('js/high/highcharts.js');?>"></script>
<script src="<?php echo base_url('js/high/modules/funnel.js');?>"></script>
<script src="<?php echo base_url('js/high/modules/exporting.js');?>"></script>
<div id="content-continue">
	<h2>Indicadores</h2>
	<table width="100%" border=0 cellpadding=0 cellspacing=0>
		<tr valign="top">
			<td width="33%">Indicado 1
				<?php $this->load->view('dgp/dgp_indicador_01'); ?>
				</td>
			<td width="33%">Indicado 2
				<?php $this->load->view('dgp/dgp_indicador_02'); ?>
				</td>
			<td width="33%">Indicado 3
				<?php $this->load->view('dgp/dgp_indicador_03'); ?></td>
		</tr>
	</table>
</div>