<?php
function strz($vz,$tm)
	{
		$vz = trim($vz);
		$vz = troca($vz,'-','');
		$vz = troca($vz,'X','0');		
		$vz = troca($vz,'.','');
		while (strlen($vz) < $tm)
			{
				$vz = '0'.$vz;
			}
		return($vz);
	}
class bancos extends CI_model
	{
	function checadv($ag='',$cc='',$banco='',$ccmod='')
		{
			$banco = trim($banco);
//			if ($banco == '104')
//			{ echo '<BR>===3>'.$banco.'-'.$ag.'-'.$cc.'=========[]'.$ccmod.'[]'; }
			if (strlen($banco)!=3)	{ return('<font color="red">ERRO BANCO '.$banco.'</font>'); exit; }
			if ($cc=='')	{ return('<font color="red">ERRO CC</font>'); exit; }
			if ($ag=='')	{ return('<font color="red">ERRO AG</font>'); exit; }

			//if ($cc == 'PAGAMENTO') { $cc = '0000000'; }
			//if ($ag == 'ORDEM') { $cc = '00000'; }

			$ccx = trim($cc);
			$agx = trim($ag);
			$ag = sonumero($ag);
			$cc = sonumero($cc);
			$bc = sonumero($banco);
			$mod = $ccmod;
			//if ((strlen($ag)==0) or (strlen($cc)==0))
			//	{ return('<font color="red">ERRO(NI)</font>'); }
			switch ($banco)
				{
				case '001': $sx = $this->banco_bb($agx,$ccx); break; /* BB */
				case '033': $sx = $this->banco_santander($ag,$cc); break; /* SANTANDER */ 
				//case '041': $sx = $this->banco_barinsul($ag,$cc); break; /* BARINSUL */
				case '104': $sx = $this->banco_caixa($ag,$cc,$mod); break; /* CAIXA ECONOMICA */
				case '237': $sx = $this->banco_bradesco($ag,$cc); break; /* BRADESCO */ 
				case '341': $sx = $this->banco_itau($ag,$cc); break; /* ITAU */
				//case '356': $sx = $this->banco_real($ag,$cc); break; /* REAL */
				case '399': $sx = $this->banco_hsbc($ag,$cc); break; /* HSBC */
				case '748': $sx = 'ok'; break; /* HSBC */
				//case '745': $sx = $this->banco_city($ag,$cc); break; /* CITYBANK */
				default: $sx = '<font color="green">BANCO??</font>'; break;
				 
				}
			return($sx);		
			
		}
	function banco_bradesco($ag,$cc)
		{
			$cc = trim($cc); $ag = trim($ag);
			$cccc = trim(troca($cc,'-',''));
			$ccag = trim(troca($ag,'-',''));
			$cca = substr($cccc,0,strlen($cccc)-1);
			$ccr = substr($ccag,0,strlen($ccag)-1);
			if ($cc != '0000000')
				{
					$dva = $this->DVMOD13($ccr);
					$dvc = substr($ccag,strlen($ccag)-1,1);
				} else {
					if ($ccr == '00000') { return('<font color="red">SEM ID AG.(BB)</font>'); }					
					return("ok");
				}

			if ($dva == $dvc)
				{
					while (strlen($cca) < 8) { $cca = '0'.$cca; }
					$dva = $this->DVMOD11($cca);
					$dvc = substr($cc,strlen($cc)-1,1);
					if ($dva == $dvc)
					{
						return("ok");
					} else {
						$this->calc .= '<BR>'.$dva.'--DV:'.$dvc;
						$this->calc .= '<BR>'.$cccc;
						$this->calc = '';
						return('<font color="red">ERRO CC (BB)</font>'.$this->calc);
					} 
				}
			else 
				{
					$this->calc .= '<BR>'.$dva.'--'.$dvc;
					$this->calc .= '<BR>'.$cccc;
					$this->calc = '';
					return('<font color="red">ERRO AG.(BB)'.$this->calc.'</font>'); 
				}
		}
	function banco_caixa($ag,$cc,$mod='')
		{
			//echo '==>'.$mod;
			if (strlen($mod)==0) {
					return('<font color="red">MOD.</font>'); 
				}
			$ccc = strzero(sonumero($cc),9);
			$ccr = strzero($ag,4);
			$cca = $ccr.$mod.substr($ccc,0,8);
			
			if ($ccc != '000000')
				{
					//echo '---{'.$cca.'}';
					$dv = $this->DV44($cca);
					$dvc = substr($cc,strlen($cc)-1,1);
					if ($dv != $dvc)
						{
							$this->calc = '';
							return('<font color="red">ERR AG./CC.'.$this->calc.'</font>');
						} else {
							return('ok');
						}
				} else {
					if ($ccr == '00000') { return('<font color="red">SEM AG.</font>'); }					
					return("ok");
				}
		}
	function banco_santander($ag,$cc)
		{
			$ccc = strzero($cc,9);
			$ccr = strzero($ag,4);
			$cca = $ccr.'00'.substr($ccc,0,8);
			
			if ($ccc != '000000')
				{
					$dv = $this->DV33($cca);
					$dvc = substr($cc,strlen($cc)-1,1);
					if ($dv != $dvc)
						{
							$this->calc = '';
							return('<font color="red">ERR AG./CC.'.$this->calc.'</font>');
						} else {
							return('ok');
						}
				} else {
					if ($ccr == '00000') { return('<font color="red">SEM AG.</font>'); }					
					return("ok");
				}
		}
	function banco_bb($ag,$cc)
		{
			$cc = trim($cc); $ag = trim($ag);
			$cccc = trim(troca($cc,'-',''));
			$ccag = trim(troca($ag,'-',''));
			$cca = substr($cccc,0,strlen($cccc)-1);
			$ccr = substr($ccag,0,strlen($ccag)-1);
			if ($cc != '0000000')
				{
					$dva = $this->DVMOD11($ccr);
					$dvc = substr($ccag,strlen($ccag)-1,1);
				} else {
					if ($ccr == '00000') { return('<font color="red">SEM ID AG.(BB)</font>'); }					
					return("ok");
				}

			if ($dva == $dvc)
				{
					while (strlen($cca) < 8) { $cca = '0'.$cca; }
					$dva = $this->DVMOD11($cca);
					$dvc = substr($cc,strlen($cc)-1,1);
					if ($dva == $dvc)
					{
						return("ok");
					} else {
						$this->calc .= '<BR>'.$dva.'--DV:'.$dvc;
						$this->calc .= '<BR>'.$cccc;
						$this->calc = '';
						return('<font color="red">ERRO CC (BB)</font>'.$this->calc);
					} 
				}
			else 
				{
					$this->calc .= '<BR>'.$dva.'--'.$dvc;
					$this->calc .= '<BR>'.$cccc;
					$this->calc = '';
					return('<font color="red">ERRO AG.(BB)'.$this->calc.'</font>'); 
				}
		}		
		
	function banco_hsbc($ag,$cc)
		{
			$ccc = strzero($cc,7);
			$ccr = strzero($ag,5);
			$cca = substr($ccc,0,6);
			if ($ccc != '0000000')
				{
					$dv = $this->DV11($ccr.$cca);
					$dvc = substr($cc,strlen($cc)-1,1);
				} else {
					if ($ccr == '00000') { return('<font color="red">SEM AG.</font>'); }					
					return("ok");
				}

			if ($dv == $dvc)
				{ return("ok"); }
			else 
				{ return('<font color="red">ERRO DV</font>'); }
		}
	function banco_itau($ag,$cc)
		{
			$ccc = strzero($cc,6);
			$ccr = strzero($ag,4);
			$this->calc = '';
			if ($ccc != '0000000')
				{
					$dv = $this->DV22($ccr.substr($ccc,0,5));
					$dvc = substr($ccc,strlen($ccc)-1,1);
				} else {
					if ($ccr == '00000') { return('<font color="red">SEM AG.</font>'); }					
					return("ok");
				}

			if ($dv == $dvc)
				{ return("ok"); }
			else 
				{
					$this->calc = '';
					return('<font color="red">ERRO DV'.$this->calc.'</font>'); 
				}
		}

	function DV44($nr)
		{
			$va = array(8,7,6,5,4,3,2,9,8,7,6,5,4,3,2);			
			$tot = 0;
			$this->calc = '';
			for ($r=0;$r < strlen($nr);$r++)
				{
					$nrn = $va[$r];
					$nrv = round(substr($nr,$r,1));
					$tot = $tot + ($nrv * $nrn);
					$this->calc .= '<BR>'.$nrv.'x'.$nrn.'='.$tot;
				}
			$tot = $tot * 10;
			$tott = $tot;
			$mult = 0;
			
			while ($tot >= 11) { $tot = $tot - 11; $mult++; }
			$tot = $tott - $mult * 11;
			if ($tot == 10) { $tot = 0; }
			return($tot);
		}
	function DV33($nr)
		{
			$va = array(9,7,3,1,0,0,9,7,1,3,1,9,7,3);			
			$tot = 0;
			$this->calc = '';
			for ($r=0;$r < strlen($nr);$r++)
				{
					$nrn = $va[$r];
					$nrv = round(substr($nr,$r,1));
					$tot = $tot + $this->somarvs($nrv * $nrn);
					$this->calc .= '<BR>'.$nrv.'x'.$nrn.'='.$tot;
				}
			while ($tot > 10) { $tot = $tot - 10; }
			$tot = 10 - $tot;
			return($tot);
		}
	function DV22($nr)
		{
			$nrn = 2;
			$tot = 0;
			for ($r=0;$r < strlen($nr);$r++)
				{
					$nrv = round(substr($nr,$r,1));
					$tot = $tot + $this->somarvl($nrv * $nrn);
					$this->calc .= '<BR>'.$nrv.'x'.$nrn.'='.$tot;
					if ($nrn == 2) { $nrn = 1; } else { $nrn = 2; }
				}
			while ($tot > 10) { $tot = $tot - 10; }
			$tot = 10 - $tot;
			return($tot);
		}

	function somarvs($v)
		{
			while ($v > 10) {$v = $v - 10; }
			return($v);
		}

	function somarvl($v)
		{
			$tot = 0;
			for ($r=0;$r < strlen($v);$r++)
				{
					$vv = substr($v,$r,1);
					$tot = $tot + round($vv);
				}
			return($tot);
		}
		
		
	function DVMOD11($nr)
		{
			$nrn = strlen($nr)+1;
			$tot = 0;
			$sa = '';
			$calc = '';
			for ($r=0;$r < strlen($nr);$r++)
				{
					$nrv = round(substr($nr,$r,1));
					$tot = $tot + ($nrv * $nrn);
					$calc .= '<BR>'.$nrv.'x'.$nrn.'='.$tot;
					$nrn--;
					if ($nrn == 0) { $nrn = 9; }
				}
			$ttt = $tot;
			while ($tot > 11) { $tot = $tot - 11; }
			$calc .= '<BR>MOD 11='.$tot;
			$tot = 11 - $tot;
			$calc .= '<BR>SUB 11='.$tot;
			$this->calc = $calc;
			if ($tot == 10) { $dv = 'X'; } else { $dv = $tot; }
			return($dv);
		}
	function DVMOD13($nr)
		{
			$nrn = strlen($nr)+1;
			$tot = 0;
			$sa = '';
			$calc = '';
			for ($r=0;$r < strlen($nr);$r++)
				{
					$nrv = round(substr($nr,$r,1));
					$tot = $tot + ($nrv * $nrn);
					$calc .= '<BR>'.$nrv.'x'.$nrn.'='.$tot;
					$nrn--;
					if ($nrn == 0) { $nrn = 9; }
				}
			$ttt = $tot;
			while ($tot > 11) { $tot = $tot - 11; }
			$calc .= '<BR>MOD 11='.$tot;
			$tot = 11 - $tot;
			$calc .= '<BR>SUB 11='.$tot;
			$this->calc = $calc;
			if ($tot == 10) { $dv = '0'; } else { $dv = $tot; }
			return($dv);
		}
	function DV11($nr)
		{
			$nr = sonumero($nr);
			$nrn = 2;
			$tot = 0;
			for ($r=0;$r < strlen($nr);$r++)
				{
					$nrv = round(substr($nr,(strlen($nr)-$r-1),1));
					$tot = $tot + ($nrv * $nrn);
					//echo '<BR>'.$nrv.'x'.$nrn.'='.$tot;
					
					$nrn++;
					if ($nrn > 9) { $nrn = 2; }
				}
			//echo '<BR>'.$tot.'x10='.$tot*10;
			$tot = $tot * 10;
			$totx = 0;
			while ($tot >= 11)
				{
					$totx++;
					$tot = $tot - 11;
				}
			//echo '<BR>'.$tot.'/11='.$totx;
			$tot = $totx;			
			
			while ($tot > 10) { $tot = $tot - 10; }
			//echo '<BR>Resto: '.$tot;
			$dv = 10 - $tot;
			if ($dv == 10) { $dv = 0; }
			return($dv);
		}
	function validaCPF($cpf)
		{	
			/*
			@autor: Moacir Selínger Fernandes
			@email: hassed@hassed.com
			 */
			 // Verifiva se o número digitado contém todos os digitos
			 
    		$cpf = str_pad(ereg_replace('[^0-9]', '', $cpf), 11, '0', STR_PAD_LEFT);
		
			// Verifica se nenhuma das sequências abaixo foi digitada, caso seja, retorna falso
    		if (strlen($cpf) != 11 || $cpf == '00000000000' || $cpf == '11111111111' || $cpf == '22222222222' || $cpf == '33333333333' || $cpf == '44444444444' || $cpf == '55555555555' || $cpf == '66666666666' || $cpf == '77777777777' || $cpf == '88888888888' || $cpf == '99999999999')
			{
				return(0);
    		}
		else
			{   // Calcula os números para verificar se o CPF é verdadeiro
        	for ($t = 9; $t < 11; $t++) 
        		{
	            	for ($d = 0, $c = 0; $c < $t; $c++) 
	            	{ $d += $cpf{$c} * (($t + 1) - $c); }
	
            		$d = ((10 * $d) % 11) % 10;
	
            		if ($cpf{$c} != $d) { return(0); }
        		}	
        	return(1);
    		}
    	}
	}
?>
