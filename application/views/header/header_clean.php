<?php
header ('Content-type: text/html; charset=ISO-8859-1');
if (isset($title))
	{
		
	} else {
		$title = ':: CIP ::';
	}
?>
<head>
<title><?php echo $title;?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="shortcut icon" type="image/x-icon" href="https://cip.pucpr.br/favicon.ico" />
<?php
		/* ESTILOS CSS 
		 */
		if (isset($css) > 0)
			{
				for ($r=0;$r < count($css);$r++)
					{
					echo '<link rel="stylesheet" href="'.base_url('css/'.$css[$r]).'">'.chr(13).chr(10);
					}
			}
		/* BIBLIOTECAS JAVA SCRIPT
		 */
		if (isset($js) > 0)
			{
				for ($r=0;$r < count($js);$r++)
					{
					echo '<script language="JavaScript" type="text/javascript" src="'.base_url('js/'.$js[$r]).'"></script>'.chr(13).chr(10);
					}
			}			
?>
</head>