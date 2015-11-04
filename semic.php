<head>
	<title>PUCPR - SEMIC</title>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<link rel="shortcut icon" type="image/x-icon" href="https://cip.pucpr.br/favicon.ico" />
	<link rel="stylesheet" href="/css/jquery-ui.min.css">
	<link rel="stylesheet" href="/css/fonts_cicpg.css">
	<link rel="stylesheet" href="/css/style.css">
	<link rel="stylesheet" href="/css/style_form.css">
	<link rel="stylesheet" href="/css/style_font-awesome.css">
	<link rel="stylesheet" href="/css/style_table.css">

	<link rel="stylesheet" href="/css/style_cab_semic_2015.css">
	<link rel="stylesheet" href="/css/style_semic_2015.css">
	<link rel="stylesheet" href="/css/form_sisdoc.css">
	<script language="JavaScript" type="text/javascript" src="/js/jquery.js"></script>
	<script language="JavaScript" type="text/javascript" src="/js/jquery.mask.js"></script>
	<script language="JavaScript" type="text/javascript" src="/js/jquery-ui.min.js"></script>
	<script language="JavaScript" type="text/javascript" src="/js/sisdoc_form.js"></script>

	<script language="JavaScript" type="text/javascript" src="/js/js_cab.js"></script>
	<script language="JavaScript" type="text/javascript" src="/js/unslider.min.js"></script>
</head>
<style>
	body {
		background: #faf5d8;
		background-image: -webkit-gradient(
		linear,
		left top,
		right top,
		color-stop(.34, rgba(230,237,241,.05)),
		color-stop(.67, rgba(230,237,241,0)));
		-webkit-background-size: 5px 5px;
	}

	#pagegradient {
		background-image: -webkit-gradient(
		radial,
		50% -50,
		300,
		50% 0,
		0,
		from(rgba(230, 237, 241, 0)),
		to(rgba(230, 237, 241, 0.8)));
		height: 100%;
		left: 0px;
		position: absolute;
		top: 0;
		width: 600px;
	}

	.button {
		position: absolute;
		display: inline-block;
		margin: 0 auto;
		-webkit-border-radius: 10px;
		-webkit-box-shadow: 0px 3px rgba(128,128,128,1), /* gradient effects */
		0px 4px rgba(118,118,118,1), 0px 5px rgba(108,108,108,1), 0px 6px rgba(98,98,98,1), 0px 7px rgba(88,88,88,1), 0px 8px rgba(78,78,78,1), 0px 14px 6px -1px rgba(128,128,128,1); /* shadow */
		-webkit-transition: -webkit-box-shadow .1s ease-in-out;
	}

	.button span {
		background-color: #E8E8E8;
		background-image:
		/* gloss gradient */
		-webkit-gradient(
		linear,
		left bottom,
		left top,
		color-stop(50%,rgba(255,255,255,0)),
		color-stop(50%,rgba(255,255,255,0.3)),
		color-stop(100%,rgba(255,255,255,0.2))),

		/* dark outside gradient */
		-webkit-gradient(
		linear,
		left top,
		right top,
		color-stop(0%,rgba(210,210,210,0.3)),
		color-stop(20%,rgba(210,210,210,0)),
		color-stop(80%,rgba(210,210,210,0)),
		color-stop(100%,rgba(210,210,210,0.3))),

		/* light inner gradient */
		-webkit-gradient(
		linear,
		left top,
		right top,
		color-stop(0%,rgba(255,255,255,0)),
		color-stop(20%,rgba(255,255,255,0.5)),
		color-stop(80%,rgba(255,255,255,0.5)),
		color-stop(100%,rgba(255,255,255,0))),

		/* diagonal line pattern */
		-webkit-gradient(
		linear,
		0% 100%,
		100% 0%,
		color-stop(0%,rgba(255,255,255,0)),
		color-stop(40%,rgba(255,255,255,0)),
		color-stop(40%,#D2D2D1),
		color-stop(60%,#D2D2D1),
		color-stop(60%,rgba(255,255,255,0)),
		color-stop(100%,rgba(255,255,255,0)));
		-webkit-box-shadow: 0px -1px #fff, /* top highlight */
		0px 1px 1px #FFFFFF; /* bottom edge */
		-webkit-background-size: 100%, 100%, 100%, 4px 4px;
		-webkit-border-radius: 10px;
		-webkit-transition: -webkit-transform .1s ease-in-out;
		display: inline-block;
		padding: 10px 40px 10px 40px;
		color: #3A474D;
		text-transform: uppercase;
		font-family: 'TradeGothicLTStd-BdCn20', 'PT Sans Narrow';
		font-weight: 700;
		font-size: 32px;
		text-shadow: 0px 1px #fff, 0px -1px #262F33;
	}

	.button span:hover {
		color: #AEBF3B;
		text-shadow: 0px -1px #97A63A;
		cursor: pointer;
	}

	.button:active {
		-webkit-box-shadow: 0px 3px rgba(128,128,128,1), 0px 4px rgba(118,118,118,1), 0px 5px rgba(108,108,108,1), 0px 6px rgba(98,98,98,1), 0px 7px rgba(88,88,88,1), 0px 8px rgba(78,78,78,1), 0px 10px 2px 0px rgba(128,128,128,.6); /* shadow */
	}

	.button:active span {
		-webkit-transform: translate(0, 5px); /* depth of button press */
	}

	.button span:after {
		content: ">";
		display: block;
		width: 10px;
		height: 10px;
		position: absolute;
		right: 14px;
		top: 12px;
		font-family: 'Cabin';
		font-weight: 700;
		color: #AEBF3B;
		text-shadow: 0px 1px #fff, 0px -1px #97A63A;
		font-size: 26px;
	}
.button_01
	{
		top: 300px;
		left: 500px;
	}
.button_02
	{
		top: 400px;
		left: 500px;
	}	
	
.button_03
	{
		top: 500px;
		left: 500px;
	}		
</style>
<link  href="http://fonts.googleapis.com/css?family=Cabin:400,500,600,bold" rel="stylesheet" type="text/css" >
<link  href="http://fonts.googleapis.com/css?family=PT+Sans+Narrow:regular,bold" rel="stylesheet" type="text/css" >
<img src="https://cip.pucpr.br/semic/img/semic2015/bk_topo_02_date.jpg">
<div id="pagegradient"></div>

<a href="index.php/credenciamento" target="_new_cred" class="button button_02"> <span>credenciamento</span> </a>
<a href="index.php/semic_avaliacao" target="_new_aval" class="button button_03"> <span>avaliadores</span> </a>
<a href="https://cip.pucpr.br/semic/" class="button button_01" target="_new_site"> <span>Site do Semic</span> </a>