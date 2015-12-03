<?php
class pagamentos extends CI_Model {
	var $tabela = 'ic_pagamentos';
	
	function gerar_pagamento_bolsa($bolsa=0,$ano=0)
		{
			$data = date("Y-m-d");
			$sql = "select * from ic_aluno
					left join us_usuario on us_cracha = ic_aluno_cracha
					left join ic on ic_id = id_ic  
					left join ic_modalidade_bolsa on id_mb = mb_id
					left join us_conta on id_us = us_usuario_id_us
						where mb_id = $bolsa 
						and ic_ano = '$ano' 
						and (aic_dt_saida = '0000-00-00' or aic_dt_saida > '$data') 
					order by us_nome ";
			$rlt = $this->db->query($sql);
			$rlt = $rlt->result_array();
			
			$to1=0;
			$to2=0;
			$to1v=0;
			$to2v=0;			

			$sx = '<br>';
			$sx .= '<table width="100%" class="lt2 border1" border=0>';			
			$sx .= '<tr>
						<th width="60%">beneficiário</th>
						<th width="80">CPF</th>
						<th width="80">Valor</th>
						<th width="30">Banco</th>
						<th width="50">Ag.</th>
						<th width="30">Mod.</th>
						<th width="80">CC</th>
						<th swith="20">Situação</th>
					</tr>';
			$xcpf = '';
			for ($r=0;$r < count($rlt);$r++)
				{
					$line = $rlt[$r];
					
					$cpf = $line['us_cpf'];
					$cor = '<font>';
					if ($cpf == $xcpf)
						{
							$cor = '<font color="red">';
						}	
					$xcpf = $cpf;
					
					$sx .= '<tr>';
					$sx .= '<td class="borderb1">';
					$sx .= $cor.$line['us_nome'].'</font>';
					//$sx .= '('.$line['id_us'].')';
					$sx .= ' ('.$line['ic_aluno_cracha'].')';
					$sx .= '</td>';

					$sx .= '<td class="borderb1" align="center" width="110">';
					$sx .= $cor.mask_cpf($line['us_cpf']).'</font>';
					$sx .= '</td>';

					$sx .= '<td align="right" class="borderb1" width="110">';
					$sx .= $cor.$line['mb_moeda'].' ';
					$sx .= number_format($line['mb_valor'],2,',','.').'</font>';
					$sx .= '</td>';
					
					$sx .= '<td class="borderb1" align="center">'.$line['usc_banco'].'</td>';
					$sx .= '<td class="borderb1" align="center">'.$line['usc_agencia'].'</td>';
					$sx .= '<td class="borderb1" align="center">'.$line['usc_modo'].'</td>';
					$sx .= '<td class="borderb1" align="center">'.$line['usc_conta_corrente'].'</td>';
					
					$banco = $line['usc_banco'];
					$mod = $line['usc_modo'];
					$cc = $line['usc_conta_corrente'];
					$ag = $line['usc_agencia'];
					
					$situacao = $this -> bancos -> checadv($ag, $cc, $banco, $mod);
					$sx .= '<td align="center" class="borderb1">'.$situacao.'</td>';

					$sx .= '</tr>';	
					
					/* */
					if ($situacao == 'ok')
						{
							$to1++;
							$to1v = $to1v + $line['mb_valor'];
						} else {
							$to2++;
							$to2v = $to2v + $line['mb_valor'];
						}				
				}
			$sx .= '</table>';
			
			/* Resumo */
			$sa = '<table width="100%" class="lt2 border1" border=0>';
			$sa .= '<tr>';
			$sa .= '<td colspan="10" class="lt5">'.$rlt[0]['mb_descricao'].'</td>';
			$sa .= '<td class="lt0" align="center">Total de bolsas<br><font class="lt5">'.($to1+$to2).'</font></td>';
			$sa .= '<td class="lt0" align="center" class="border1">Total de bolsas válidas<br><font class="lt5">'.($to1).'</font></td>';
			$sa .= '<td class="lt0" align="center" class="border1">Valor pago<br><font class="lt5">'.number_format($to1v,2,',','.').'</font></td>';
			$cor = '<font>';
			if ($to2 > 0)
				{
					$sa .= '<td class="lt0" align="center">Total de bolsas inválidas<br><font class="lt5" color="red">'.($to2).'</font></font></td>';
					$sa .= '<td class="lt0" align="center" class="border1">Valor pago<br><font class="lt5" color="red"><b>'.number_format($to2v,2,',','.').'</b></font></font></td>';
				}
			$sa .= '</tr>';
			$sa .= '</table>';
						
			return($sa . $sx);
		}

	function gerar_pagamentos($bolsa, $credito, $ano = 2012, $bcos, $ss = '') {
		global $total, $total1, $total2, $total3, $total4;
		$wh = "pb_tipo = '$bolsa' and ";

		if ($bcos == 'ORDEM') {
			$wh .= " pa_cc_conta = '0000000' and ";
		} else {
			$wh .= " pa_cc_conta <> '0000000' and ";
		}

		$hsbc = new hsbc;
		/* Linha 1 */
		$sx = $hsbc -> header_rq();
		/* Linha 2 */
		$sx .= $hsbc -> header_rq2();
		$total = 0;
		$sql = "
					select * from pibic_bolsa_contempladas
				 	inner join pibic_bolsa_tipo on pbt_codigo = pb_tipo
				 	left join pibic_aluno on pb_aluno = pa_cracha
				 	
					where (pb_status <> 'C' and pb_status <> 'S' and pb_status <> 'F') 
					and $wh pb_ano = '$ano'
					order by pa_nome
					 ";

		//left join pibic_pagamentos on (pg_cpf = pa_cpf and (pg_vencimento >= ".date("Ym01")." and pg_vencimento < ".date("Ym99")."))
		$rlt = db_query($sql);
		while ($line = db_read($rlt)) {
			$valor = round($line['pg_valor']);
			$ok = 1;

			if (($ss == 'S') and ($valor > 0)) { $ok = 0;
			}
			if ($ok == 1) {
				$sx .= $hsbc -> req_pagamento($line, $credito);
			}
		}
		$sx .= $hsbc -> req_fim();
		return ($sx);
	}

	function pagamentos_por_data($dd1, $dd2) {
		$sql = "select * from (
						select pg_cpf, pg_nome, sum(pg_valor) as valor,
						count(*) as total
					    from " . $this -> tabela . "
						where pg_vencimento >= " . $dd1 . " and pg_vencimento <= " . $dd2 . "
						group by pg_nome, pg_cpf
						) as tabela
						left join pibic_aluno on pg_cpf = pa_cpf
						order by valor desc, pg_nome
					";

		$rlt = db_query($sql);

		$sx = '<table width="100%">';
		$sx .= '<TR><TD colspan=10>';
		$sx .= '<h3>' . msg('pagamentos') . ' - ' . stodbr($dd1) . ' até ' . stodbr($dd2) . '</h3>';
		$sx .= '<TR>';
		$sx .= '<TH width="7%">' . msg('cpf');
		$sx .= '<TH width="35">' . msg('nome');
		$sx .= '<TH width="35%">' . msg('nome_siga');
		$sx .= '<TH width="7%">' . msg('cracha');
		$sx .= '<TH width="7%">' . msg('lacamentos');
		$sx .= '<TH width="7%">' . msg('valor');
		$sx .= '<TH width="7%">' . msg('media');
		$tot = 0;
		while ($line = db_read($rlt)) {
			$tot = $tot + $line['valor'];
			$pag++;
			$link = '<A HREF="discente.php?dd0=' . $line['id_pa'] . '&dd90=' . checkpost($line['id_pa']) . '">';
			$tot = $tot + $line['pg_valor'];
			$sx .= '<TR>';
			$sx .= '<TD class="tabela01" align="center">';
			$sx .= $cor . $line['pg_cpf'];
			$sx .= '<TD class="tabela01">';
			$sx .= $cor . $line['pg_nome'];
			$sx .= '<TD class="tabela01">';
			$sx .= $link . $cor . $line['pa_nome'] . '</A>';
			$sx .= '<TD class="tabela01" align="center">';
			$sx .= $link . $cor . $line['pa_cracha'] . '</A>';
			$sx .= '<TD class="tabela01" align="center">';
			$sx .= $cor . ($line['total']);
			$sx .= '<TD class="tabela01" align="right">';
			$sx .= $cor . number_format($line['valor'], 2);
			$sx .= '<TD class="tabela01" align="right">';
			$sx .= $cor . number_format($line['valor'] / $line['total'], 2);
		}
		$sx .= '<TR>';
		$sx .= '<TD colspan=10>' . msg('total') . ' ' . number_format($tot, 2, ',', '.') . ' (' . $pag . ')';
		$sx .= '</table>';
		return ($sx);
	}

	function pagamentos_lotes($data='', $fim = 0) {

		if (strlen($data) == 0) { $data = date("Yd").'01'; }
		
		if (strlen($data) == 4) {
			$dd1 = $data . '0101';
			$dd2 = $data . '1299';
		}
		if (strlen($data) == 6) {
			$dd1 = $data . '01';
			$dd2 = $data . '31';
		}
		if (strlen($data) == 8) {
			$dd1 = $data;
			$dd2 = $data;
		}
		if (strlen($fim) == 8) { $dd2 = $fim;
		}

		$sql = "select lote, count(*) as registros, sum(pg_valor) as total, pg_cpf, id_pg  
				from
						( 
						select left(pg_nrdoc,6) as lote, pg_valor, pg_cpf ,id_pg 
						
						 from " . $this -> tabela . "
						where pg_vencimento >= $dd1 and
						pg_vencimento <= $dd2 and pg_valor > 0
						) as tabela 
						group by lote
						order by lote
				";

		$rlt = db_query($sql);
		//echo 'FIM'; exit;

		$sx = '<table width="400" class="lt2">';
		$sx .= '<tr>';
		$sx .= '<th width="25%">' . msg('Lote').'</th>';
		$sx .= '<th width="25%">' . msg('Bolsas').'</th>';
		$sx .= '<th width="25%">' . msg('Valor_medio').'</th>';
		$sx .= '<th width="725%">' . msg('Valor').'</th>';

		$tot = 0;
		$pag = 0;
		while ($line = db_read($rlt)) {
			$cpf = $line['pg_cpf'];
			$id = $line['id_pg'];
			$link = '<A HREF="' . base_url('index.php/ic/pagamentos/201409/view/8e92536ed4d6cf1694db65cd7826cd64') . $data . '/' . $line['lote'] . '" class="link">';

			$valor = $line['total'];
			$sx .= '<TR>';
			$sx .= '<td class="border1" align="center">' . $link . $line['lote'] . '</a></td>';
			$sx .= '<td class="border1" align="center">' . $link.$line['registros'].'</a></td>';
			$sx .= '<td class="border1" align="center">' . $link.number_format($line['total'] / $line['registros'], 2, ',', '.').'</a></td>';
			$sx .= '<td class="border1" align="right">' . $link.number_format($line['total'], 2, ',', '.').'</a></td>';
			$pag = $pag + $valor;
			$tot = $tot + $line['registros'];
		}
		$sx .= '<TR>';
		$sx .= '<TD colspan=10>' . msg('total') . ' ' . number_format($pag, 2, ',', '.') . ' (' . $tot . ')';
		$sx .= ' - ';
		$sx .= msg('periodo') . '- ' . stodbr($dd1) . ' até ' . stodbr($dd2);
		$sx .= '</td></tr>';
				
		$sx .= '</table>';
		return ($sx);
	}

	function detalhe_pagamentos($data, $fim = 0, $lote = '') {
		if (strlen($data) == 4) {
			$dd1 = $data . '0101';
			$dd2 = $data . '1299';
		}
		if (strlen($data) == 6) {
			$dd1 = $data . '01';
			$dd2 = $data . '31';
		}
		if (strlen($data) == 8) {
			$dd1 = $data;
			$dd2 = $data;
		}
		if (strlen($fim) == 8) { $dd2 = $fim;
		}

		$wh = '';
		if (strlen($lote) > 0) { $wh = " and (substr(pg_nrdoc,1,6) like '" . $lote . "%' ) ";
		}

		$sql = "select * from " . $this -> tabela . "
						left join us_usuario on pg_cpf = us_cpf
						where pg_vencimento >= $dd1 and
						pg_vencimento <= $dd2 $wh
						order by us_nome, pg_vencimento, 
						pg_valor desc
				";
		//echo $sql;
		//$sql = "delete from ".$this->tabela." where pg_vencimento = 20130925 ";

		$rlt = db_query($sql);
		//echo 'FIM'; exit;

		$sx = '<table width="100%" class="lt1">';
		$sx .= '<TR><TD colspan=10>';
		$sx .= '<h3>' . msg('pagamentos') . '- ' . stodbr($dd1) . ' até ' . stodbr($dd2) . '</h3>';
		$sx .= '<TR>';
		$sx .= '<TH width="1%">' . msg('id');
		$sx .= '<TH width="7%">' . msg('venc');
		$sx .= '<TH width="7%">' . msg('cpf');
		$sx .= '<TH width="35%">' . msg('nome');
		$sx .= '<TH width="35%">' . msg('nome_siga');
		$sx .= '<TH width="7%">' . msg('cracha');
		$sx .= '<TH width="7%">' . msg('documento');
		$sx .= '<TH width="7%">' . msg('valor');

		//$sql = "delete from ".$this->tabela." where pg_valor = -400 ";
		//$rlt = db_query($sql);

		$tot = 0;
		$pag = 0;
		$xcpf = 'x';
		$xid = 0;
		$idc = '';
		$ydoc = '';
		while ($line = db_read($rlt)) {
			$pag++;
			$cpf = $line['pg_cpf'];
			$id = $line['id_us'];
			if ($id != $xid) {
				$valor = $line['pg_valor'];
				$link = '<A HREF="'.base_url('index.php/ic/' . $line['id_us'] . '/' . checkpost_link($line['id_us'])) . '">';
				$cor = '';
				$xid = $id;
				if ($cpf == $xcpf) { $cor = '<font color="red">';
				}
				if ($valor < 0) { $cor = '';
				}
				$xcpf = $cpf;
				$tot = $tot + $line['pg_valor'];
				$sx .= '<TR>';
				$sx .= '<td class="border1">' . $pag;
				$sx .= '<TD class="border1" align="center">';
				$sx .= $cor . stodbr($line['pg_vencimento']);
				$sx .= '<TD class="border1" align="center">';
				$sx .= $cor . $line['pg_cpf'];
				$sx .= '<TD class="border1">';
				$sx .= $cor . $line['us_nome'];
				$sx .= '<TD class="border1">';
				$sx .= $link . $cor . $line['us_nome'] . '</A>';
				$sx .= '<TD class="border1" align="center">';
				$sx .= $link . $cor . $line['us_cracha'] . '</A>';
				$sx .= '<TD class="border1" align="center">';
				$sx .= $line['pg_nrdoc'];
				$sx .= '<TD class="border1" align="right">';
				if ($line['pg_valor'] < 0) {
					$cor = '<font color="red">';
				}
				$sx .= $cor . number_format($line['pg_valor'], 2);
			}
			$xdoc = trim($line['pg_nrdoc']);
			if ($xdoc == $ydoc) { $sx .= '';
			}
			$ydoc = $xdoc;

			$pc = trim($line['pg_cracha']);
			if ((strlen($pc) == 0) and (strlen($line['us_nome']) > 0)) {
				$sql = "update " . $this -> tabela . "
									set pg_cracha = '" . $line['us_cracha'] . "'
									where id_pg = " . $line['id_pg'];
				$rltx = db_query($sql);
			}
			if (trim($line['pg_cpf']) != sonumero($line['pg_cpf'])) {
				$sql = "update " . $this -> tabela . " 
									set pg_cpf = '" . strzero(sonumero($line['pg_cpf']), 11) . "' 
									where id_pg = " . $line['id_pg'];
				$this->db->query($sql);
			}
		}
		$sx .= '<TR>';
		$sx .= '<TD colspan=10>' . msg('total') . ' ' . number_format($tot, 2, ',', '.') . ' (' . $pag . ')';
		$sx .= '</table>';
		return ($sx);
	}

	function resumo_pagamentos() {
		$sql = "alter table " . $this -> tabela . " add column pg_modalidade char(10)";
		//$rlt = db_query($sql);

		$sql = "select pg_modalidade, round(pg_vencimento/100) as pg_venc, count(*) as total,
						sum(pg_valor) as valor
						from " . $this -> tabela . "
						group by pg_venc, pg_modalidade
						order by pg_venc desc
						";
		$rlt = db_query($sql);
		$xmes = 'xxxx';
		$tot = 0;
		$tot1 = 0;
		$pag = 0;
		$pag1 = 0;
		$sx = '<table width="380" class="lt2" border=0>';
		$sx .= '<tr>';
		$sx .= '<th width="33%">' . msg('vigência').'</th>';
		$sx .= '<th width="33%">' . msg('documentos').'</th>';
		$sx .= '<th width="33%">' . msg('valor_total').'</th>';

		$page = page();
		$page = troca($page, '.php', 'a.php');

		while ($line = db_read($rlt)) {
			$mes = substr($line['pg_venc'], 0, 6);

			$link = '<A href="' . base_url('index.php/ic/pagamentos/'.$line['pg_venc'] .'/view/'.checkpost_link($line['pg_venc'])). '" class="link">';
			if ($xmes != $mes) {
				$sx .= '<tr><td align="center" class="border1">';
				$sx .= $link.substr($mes, 4, 2) . '/' . substr($mes, 0, 4).'</a>';
				$xmes = $mes;
			} else {
				$sx .= '<tr><td>&nbsp;</td>';
			}

			$sx .= '<td align="center" class="border1" width="25%">';
			$sx .= $link;
			$sx .= $line['total'];
			$sx .= '</td>';

			$sx .= '<td align="right" class="border1" width="25%">';
			$sx .= $link.number_format($line['valor'], 2, ',', '.').'</a>';
			$sx .= '</td>';
		}
		$sx .= '</table>';
		return ($sx);

	}

	function pagamento_mes($mes = 0, $ano = 1900) {
		$dd1 = strzero($ano, 4) . strzero($mes, 2) . '01';
		$dd2 = strzero($ano, 4) . strzero($mes, 2) . '99';
		$sql = "select * from " . $this -> tabela . "
					where pg_vencimento >= $dd1 and pg_vencimento <= $dd2
				";
		echo $sql;

	}

	function pagamentos($cracha = '', $cpf = '') {
		$cracha = '';
		$sql = "select * from " . $this -> tabela . " where ";
		if ($cracha != '') { $sql .= "pg_cracha = '$cracha' ";
		}
		if ($cpf != '') { $sql .= " pg_cpf = '$cpf' ";
		}
		if (strlen($cracha . $cpf) == 0) {
			return ('');
		}

		$sql .= " order by pg_vencimento desc ";
		$rlt = db_query($sql);
		$sx = '<table width="100%" class="tabela01">';

		$sx .= '<TR>';
		$sx .= '<TD colspan=10>';
		$sx .= '<H3>' . msg('pagamento') . '</h3>';

		$sx .= '<TR>';
		$sx .= '<TH width="10%">' . msg('cpf');
		$sx .= '<TH width="40%">' . msg('beneficiario');
		$sx .= '<TH width="5%">' . msg('nrdoc');
		$sx .= '<TH width="5%">cp';
		$sx .= '<TH width="10%">' . msg('vencimento');
		$sx .= '<TH width="15%">' . msg('conta');
		$sx .= '<TH width="10%">' . msg('valor');
		$sx .= '<TH width="10%">' . msg('status');

		$tot = 0;
		$pag = 0;
		while ($line = db_read($rlt)) {
			$sx .= '<TR>';
			$sx .= '<TD class="tabela01" align="center">';
			$sx .= trim($line['pg_cpf']);
			$sx .= '<TD class="tabela01">';
			$sx .= trim($line['pg_nome']);
			$sx .= '<TD class="tabela01" align="center">';
			$sx .= trim($line['pg_nrdoc']);
			$sx .= '<TD class="tabela01" align="center">';
			$sx .= trim($line['pg_complemento']);
			$sx .= '<TD class="tabela01" align="center">';
			$sx .= stodbr($line['pg_vencimento']);
			$sx .= '<TD class="tabela01" align="center">';
			$sx .= $line['pg_agencia'];
			$sx .= '-' . $line['pg_conta'];
			$sx .= '<TD class="tabela01" align="right">';
			$sx .= number_format($line['pg_valor'], 2, ',', '.');
			$sx .= '<TD class="tabela01" align="center">';
			$sta .= trim($line['pg_status']);
			if ($sta == '') { $sx .= msg('lancado');
			}

			$sx .= '<TD class="tabela01" align="center">';
			$sx .= trim($line['pg_mes']) . '/' . trim($line['pg_ano']);

			$tot = $tot + $line['pg_valor'];
			$pag++;
		}
		$sx .= '<TR><TD colspan=10 align="right"><B><I>';
		$sx .= msg('total') . ' ' . number_format($tot, 2, ',', '.') . ' (' . $pag . ' ' . msg('lancamento') . ')';
		$sx .= '</table>';

		return ($sx);
	}

	function processa_seq() {
		$sql = "select count(*) as total from ln where ln_status='A' ";
		$rlt = db_query($sql);
		$line = db_read($rlt);
		echo '<H2>' . $line['total'] . '</h2>';
		$sql = "select * from ln where ln_status='A' order by id_ln ";
		$rlt = db_query($sql);
		$id = 0;
		while ($ln = db_read($rlt)) {
			print_r($ln);
			echo '<HR>';
			$id++;
			//print_r($ln);
			$l = utf8_decode(trim($ln['ln_text']));
			$tp = substr($l, 13, 1);

			if ($tp == '0') {
				$cnpj = substr($l, 18, 14);
				$ctr = substr($l, 32, 6);
			}

			if ($tp == 'A') {
				$banco = substr($l, 20, 3);
				$seq = substr($l, 3, 4);
				$op = substr($l, 7, 1);
				$nrdoc = trim(substr($l, 73, 18));
				$venc = substr($l, 93, 8);
				$vc = substr($venc, 4, 4) . substr($venc, 2, 2) . substr($venc, 0, 2);
				$vlr = round(substr($l, 121, 13)) / 100;
				$nome = substr($l, 43, 30);
				$bco = $banco;
				echo '<TT>' . $l . '</tt>';
				/*
				 3990002300001A00070000100009 0000000610305
				 */

				$ccag = substr($l, 23, 5);
				$ccc = substr($l, 35, 7);
				$ccac = substr($l, 30, 12);
				$id1 = $ln['id_ln'];
			}

			if ($tp == 'B') {
				$cpf = substr($l, 21, 14);
				$tp = 'I';
				$id2 = $ln['id_ln'];

				echo '<BR>banco->' . $bco . 'Ag. [' . $ccag . '-' . $ccc . ']';
				echo '' . $seq . '-' . $op . '-' . $tp;
				echo '->' . $vlr;
				echo '->' . $nome;
				echo '->' . $cpf;
				echo '->' . $vc;

				$sql = "select * from pibic_pagamentos 
								where pg_nrdoc = '$nrdoc'
								and pg_cpf = '$cpf' and pg_vencimento = $vc
						";

				$rlt2 = db_query($sql);
				if (!(db_read($rlt2))) {
					$sql = "insert into pibic_pagamentos
							(pg_ctr, pg_cnpj, pg_nrdoc,
								pg_valor, pg_vencimento, pg_cpf,
								pg_tipo, pg_nome,pg_banco,
								
								pg_agencia,pg_conta,pg_cc
								) values (
								'$ctr','$cnpj','$nrdoc',
								'$vlr','$vc','$cpf',
								'$tp','$nome','$banco',
						
								'$ccag','$ccc','$ccac')
								";
					$rlt2 = db_query($sql);
				}
				$sql = "update ln set ln_status = 'B' where (id_ln = " . $id1 . " or id_ln = " . $id2 . " )";
				$rlt3 = db_query($sql);

			}
		}
		return ($id);
	}

	function inport_file($file) {
		if (!(file_exists($file))) {
			echo $file . '<BR>';
			echo 'ERRO DE ABERTURA';
			return (0);
		}
		$fld = fopen($file, 'r');
		$sx = '';
		while (!(feof($fld))) {
			$sx .= fread($fld, 1024);
		}
		fclose($fld);

		$ln = splitx(chr(13), $sx);
		$sql = "create table ln (
					id_ln serial NOT NULL,
					ln_text text,
					ln_status char(1)
				)";
		//$rlt = db_query($sql);
		$sql = "delete from ln where 1=1 ";
		$rlt = db_query($sql);

		echo '===>' . count($ln);
		for ($r = 0; $r < count($ln); $r++) {
			if (round($r / 10) == ($r / 10)) { echo 'x';
			} else { echo '.';
			}
			if (round($r / 100) == ($r / 100)) { echo '<BR>';
			}
			$lnx = UpperCaseSql($ln[$r]);
			$lnx = troca($lnx, "'", '´');
			$sql = "insert into ln (ln_text, ln_status) 
						values
						('" . $lnx . "','A')		
					";
			$rlt = db_query($sql);
		}
	}

	function lista_pagamentos_total($dd1 = 19000101, $dd2 = 20990101, $cpf = '') {
		$sql = "selec";
	}

	function limpa_duplicados() {
		$sql = "
					select * from (
					select pg_cpf, round(pg_vencimento/100) as vencimento, count(*) as total, max(id_pg) as id_pg from dados
					group by pg_cpf, vencimento
					) as tabela where total > 1
					order by total desc
					limit 300 ";
		$rlt = db_query($sql);

		$sql = "delete from " . $this -> tabela . " where ";
		$id = 0;
		while ($line = db_read($rlt)) {

			if ($id > 0) { $sql .= ' or ';
			}
			$sql = $sql . '(id_pg = ' . $line['id_pg'] . ') ';
			$id++;
		}
		if ($id > 0) {
			echo $sql;
			$rlt = db_query($sql);
		}
	}

	function row() {
		global $cdf, $cdm, $masc;
		$cdf = array('id_pg', 'pg_cpf', 'pg_nrdoc', 'pg_nome', 'pg_valor', 'pg_complemento');
		$cdm = array('cod', msg('cpf'), msg('nrdoc'), msg('nome'), msg('valor'), 'compl');
		$masc = array('', '', '', '', '', '', '');
		return (1);
	}

	function cp() {
		$cp = array();
		array_push($cp, array('$H8', 'id_pg', '', False, true));
		array_push($cp, array('$S1', 'pg_complemento', 'Complemento', False, true));
		array_push($cp, array('$D8', 'pg_vencimento', 'Vencimento', False, true));
		array_push($cp, array('$S20', 'pg_nrdoc', 'Documento', False, true));
		return ($cp);
	}

}
?>