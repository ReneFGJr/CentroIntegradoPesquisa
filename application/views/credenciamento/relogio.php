<link rel="stylesheet" href="<?php echo base_url('gadget/clock/flipclock.css');?>">
<script src="<?php echo base_url('gadget/clock/flipclock.js');?>"></script>

<div id="relogio" class="clock"></div>

<script type="text/javascript">
	var clock;

	$(document).ready(function() {
		clock = $('.clock').FlipClock({
			clockFace : 'TwentyFourHourClock'
		});
	}); 
</script>