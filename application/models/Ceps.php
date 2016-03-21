<?php
class ceps extends CI_model
	{
		function inport($txt)
			{
				$st = '<span style="">Apreciação</span>';
				$sf = '</table><table class="fullWidth">';
				
				$posi = strpos($txt,$st);
				$posf = strpos($txt,$sf);
				
				$ttt = substr($txt,$posi,($posf-$posi));
				$ttt = troca($ttt,'<','#');
				$ttt = troca($ttt,'>','$');
				//echo '<pre>'.$ttt.'</pre>';
				
				$id = 0;
				while (strpos($ttt,'title="'))
					{
						$pos = strpos($ttt,'title="');
						echo substr($ttt,$pos,200);
						echo '<hr>';
						
						$ttt = substr($ttt,$pos+10,strlen($ttt));
					}
			}	
	}
?>
