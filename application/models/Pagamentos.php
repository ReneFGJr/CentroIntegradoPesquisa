<?php
class pagamentos extends CI_Model {
	var $tabela = 'ic_pagamentos';
	var $filename = '';

	function dir($dir) {
		$ok = 0;
		if (is_dir($dir)) { $ok = 1;
		} else {
			mkdir($dir);
			$rlt = fopen($dir . '/index.php', 'w');
			fwrite($rlt, 'acesso restrito');
			fclose($rlt);
		}
		return ($ok);
	}

	/* PAGAMENTOS HSBC
	 *
	 *
	 */
	function save_file($txt, $modalidade, $edital, $venc) {
		$data = date("Y-m-d");
		$seq = 1;
		$file = date("ym") . strzero($modalidade, 3) . $seq . '.seq';
		while (file_exists($file)) {
			$seq++;
			$file = date("ym") . strzero($modalidade, 3) . $seq . '.seq';
		}
		$this -> filename = $file;
		$this -> pagamentos -> dir('_document');
		$this -> pagamentos -> dir('_document/_pagamento/');
		$this -> pagamentos -> dir('_document/_pagamento/' . date("Y"));
		$this -> pagamentos -> dir('_document/_pagamento/' . date("Y") . '/' . date("m"));

		$path = '_document/_pagamento/' . date("Y") . '/' . date("m") . '/';
		$file = $path . $file;

		$fl = fopen($file, 'w+');
		fwrite($fl, $txt);
		fclose($fl);
		$user = round($_SESSION['id_us']);
		$venc = sonumero($venc);
		$venc = substr($venc, 0, 4) . '-' . substr($venc, 4, 2) . '-' . substr($venc, 6, 2);
		$sql = "insert into ic_pagamentos_arquivo
						(
							paa_arquivo, paa_data, paa_user,
							paa_ativo, paa_modalidade, paa_vencimento
						) values (
							'$file','$data','$user',
							1,$modalidade,$venc
						)
					";
		$this -> db -> query($sql);
		return ($file);
	}

	function pagamento_compromisso_mostra($id) {
		$sql = "select * from ic_pagamentos
						WHERE pg_nrdoc = '$id'
				";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		$sx = '';
		if (count($rlt) > 0) {
			$data = $rlt[0];
			$sx = $this -> load -> view('ic/ic_pagamento', $data, true);
		}
		return ($sx);
	}

	function processa_seq($file) {
		/* Verifica se arquivo não existe */
		if (!(file_exists($file))) {
			return (0);
		}

		$rd = load_file_local($file);

		$rd = troca($rd, chr(13), ';');
		$lns = splitx(';', $rd);
		$sx = '<table width="100%" class="tabela01">';
		$vlrt = 0;
		$tot = 0;
		for ($rn = 0; $rn < count($lns); $rn++) {
			$l = $lns[$rn];
			$tp = substr($l, 13, 1);

			if ($tp == '0') {
				$cnpj = substr($l, 18, 14);
				$ctr = substr($l, 32, 6);
			}

			if ($tp == 'A') {/*
				 3990146300145A00070000102187 0000000013471 CHRISTOFER KOK                01401600010145      05012016R$                  0000000040000N                                                                                              0
				 * */
				$banco = substr($l, 20, 3);
				$seq = substr($l, 3, 4);
				$op = substr($l, 7, 1);
				$nrdoc = trim(substr($l, 73, 18));
				$venc = substr($l, 93, 8);
				$vc = substr($venc, 4, 4) . substr($venc, 2, 2) . substr($venc, 0, 2);
				$vlr = round(substr($l, 121, 13)) / 100;
				$nome = substr($l, 43, 30);
				$bco = $banco;

				$ccag = substr($l, 23, 5);
				$ccc = substr($l, 35, 7);
				$ccac = substr($l, 30, 12);
				$id1 = $lns[$rn];

				$vlrt = $vlrt + $vlr;
				$tot++;
				echo '<br>' . $nrdoc;
			}

			if ($tp == 'B') {
				$cpf = substr($l, 21, 14);
				$tp = 'I';
				$id2 = $lns[$rn];

				$sx .= '<tr>';
				$sx .= '<td align="center">' . $tot . '</td>';
				$sx .= '<td align="center">' . $bco . '</td>';
				$sx .= '<td align="center">' . $ccag . '-' . $ccc . '</td>';
				$sx .= '<td align="center">' . $seq . '-' . $op . '-' . $tp . '</td>';
				$sx .= '<td align="right">' . number_format($vlr, 2, ',', '.') . '</td>';
				$sx .= '<td align="left">' . $nome . '</td>';
				$sx .= '<td align="center">' . $cpf . '</td>';
				$sx .= '<td align="center">' . stodbr($vc) . '</td>';

				$sql = "select * from ic_pagamentos 
								where pg_nrdoc = '$nrdoc'
								and pg_cpf = '$cpf' and pg_vencimento = $vc
						";
				$rlt2 = $this -> db -> query($sql);
				$rlt2 = $rlt2 -> result_array();

				if (count($rlt2) == 0) {
					$sql = "insert into ic_pagamentos
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
					$rlt2 = $this -> db -> query($sql);
					$sx .= '<td align="center"><font color="green">Inserido</font></td>';
				} else {
					$sx .= '<td align="center"><font color="orange">Já registrado</font></td>';
				}
			}
		}
		$sx .= '</table>';

		/* Resumo */
		$sa = '<table width="100%" class="tabela01 border1">';
		$sa .= '<tr><th>total de pagamentos</th><th>valor processado</th></tr>';
		$sa .= '<tr class="lt6" align="center"><td>' . $tot . '</td><td>' . number_format($vlrt, 2, ',', '.') . '</th></td>';
		$sa .= '</table></br></br>';

		return ($sa . $sx);
	}

	function gerar_pagamento_bolsa_arquivo($modalidade, $edital, $venc) {
		$fl = $this -> pagamentos -> header_rq();
		$fl .= $this -> pagamentos -> header_rq2();
		/*
		 $fl .= $this->req_pagamento($ln,$venc);
		 */

		$data = date("Y-m-d");
		$venc = sonumero($venc);
		$venc = substr($venc, 0, 4) . '-' . substr($venc, 4, 2) . '-' . substr($venc, 6, 2);

		$sql = "select * from ic_aluno
					left join us_usuario on us_cracha = ic_aluno_cracha
					left join ic on ic_id = id_ic  
					left join ic_modalidade_bolsa on id_mb = mb_id
					left join us_conta on id_us = us_usuario_id_us
						where mb_id = $modalidade 
						and ic_ano = '$edital' 
						and icas_id = 1
						and (aic_dt_saida = '0000-00-00' or aic_dt_saida > '$data') 
					order by us_nome ";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();

		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			$fl .= $this -> req_pagamento($line, $venc);
		}
		$fl .= $this -> pagamentos -> req_fim();

		$file = $this -> pagamentos -> save_file($fl, $modalidade, $edital, $venc);
		//$fl = '<a href="'.base_url($file).'">Download do Arquivo</a>';
		return ($fl);
	}

	function gerar_pagamento_bolsa_arquivo_rateio($proto, $valor, $venc) {
		$fl = $this -> pagamentos -> header_rq();
		$fl .= $this -> pagamentos -> header_rq2();
		/*
		 $fl .= $this->req_pagamento($ln,$venc);
		 */

		$data = date("Y-m-d");
		$venc = sonumero($venc);
		$venc = substr($venc, 0, 4) . '-' . substr($venc, 4, 2) . '-' . substr($venc, 6, 2);

		$sql = "select * from ic_aluno
					left join us_usuario on us_cracha = ic_aluno_cracha
					left join ic on ic_id = id_ic  
					left join ic_modalidade_bolsa on id_mb = mb_id
					left join us_conta on id_us = us_usuario_id_us
						where ic_projeto_professor_codigo = '$proto' 
						and icas_id = 1 
					order by us_nome ";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();

		$vlr = round($valor / count($rlt) * 100) / 100;

		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			$line['mb_valor'] = $vlr;
			$fl .= $this -> req_pagamento($line, $venc);
		}
		$fl .= $this -> pagamentos -> req_fim();

		$file = $this -> pagamentos -> save_file($fl, $proto, date("Y-m"), $venc);
		//$fl = '<a href="'.base_url($file).'">Download do Arquivo</a>';
		return ($fl);
	}

	function detalhado($ano, $mes,$valor='') {
		$mes = strzero($mes, 2);
		$wh = '';
		if (strlen($valor) > 0) { $wh = ' AND pg_valor = '.$valor; }
		$sql = "select * from ic_pagamentos
						left join (select distinct us_nome, us_cpf from us_usuario) as usuario on us_cpf = pg_cpf
						where substr(pg_vencimento,1,4) = '$ano'
							AND substr(pg_vencimento,5,2) = '$mes'
							$wh
						order by us_nome";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();

		$dados = array();
		$sa = '';

		$sx = '<table class="tabela00 lt2" width="100%">';
		$tot = 0;
		$tot1 = 0;
		$xcpf = '';
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			$cpf = $line['pg_cpf'];
			$bg = '';
			$tot1++;
			$cor = '';
			$xcor = '';
			if ($cpf == $xcpf) { $bg = ' class="danger" style="color: red;" '; $cor = '<font color="red">'; $xcor = '</font>'; }
			
			$sx .= '<tr '.$bg.'>';
			$sx .= '<td align="center" width="30">'.$tot1.'</td>';
			$sx .= '<td>' . $line['us_nome'] . '</td>';
			$sx .= '<td align="center">' . stodbr($line['pg_vencimento']) . '</td>';
			$sx .= '<td>' . mask_cpf($line['pg_cpf']) . '</td>';
			$sx .= '<td>' . mask_cpf($line['us_cpf']) . '</td>';
			$sx .= '<td align="right">' . number_format($line['pg_valor'],2,',','.') . '</td>';
			$sx .= '</tr>';
			$tot = $tot + $line['pg_valor'];
			$xcpf = $cpf;
			
		}
		$sx .= '<tr><td colspan=10>Total '.$tot1.' pagamento(s), no valor de '.number_format($tot,2,',','.').'</td></tr>';
		$sx .= '</table>';
		return($sx);
	}

	function consolidado($ano) {
		$sql = "select substr(pg_vencimento,1,4) as ano, substr(pg_vencimento,5,2) as mes, sum(pg_valor) as valor from ic_pagamentos
						where substr(pg_vencimento,1,4) > 2000
						group by ano, mes";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();

		$dados = array();
		$sa = '';

		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			$vlr = $line['valor'];
			$ano = $line['ano'];
			$mes = round($line['mes']);
			$dados[$ano][$mes] = $vlr;
		}

		for ($x = 2010; $x <= date("Y"); $x++) {
			$sa .= '<tr><td align="center"><b>' . $x . '</b></td>';

			for ($r = 1; $r <= 12; $r++) {
				if (isset($dados[$x][$r])) {
					$link = '<a href="' . base_url('index.php/ic/pagamento_detalhado/' . $x . '/' . $r) . '" class="lt2 link">';
					$sa .= '<td align="right" class="border1 lt3">' . $link . number_format($dados[$x][$r], 2, ',', '.') . '</a>' . '</td>';
				} else {
					$sa .= '<td align="center" class="border1 lt3">-</td>';
				}
			}
			$sa .= '</tr>';
		}
		$sx = '<h1>Desembolso consolidado PIBIC</h1>';
		$sx .= '<table width="100%" class="tabela00">';
		$sx .= '<tr><th>ano</th>';
		$mes = meses_short();

		for ($r = 1; $r <= 12; $r++) { $sx .= '<th width="' . round(100 / 12) . '%">' . $mes[$r] . '</th>';
		}
		$sx .= '</tr>';
		$sx .= '' . $sa . '';
		$sx .= '</table>';
		return ($sx);

	}

	function gerar_pagamento_bolsa_arquivo_avulso($proto, $valor, $venc) {
		$fl = $this -> pagamentos -> header_rq();
		$fl .= $this -> pagamentos -> header_rq2();
		/*
		 $fl .= $this->req_pagamento($ln,$venc);
		 */

		$data = date("Y-m-d");
		$venc = sonumero($venc);
		$venc = substr($venc, 0, 4) . '-' . substr($venc, 4, 2) . '-' . substr($venc, 6, 2);

		$sql = "select * from ic_aluno
					left join us_usuario on us_cracha = ic_aluno_cracha
					left join ic on ic_id = id_ic  
					left join ic_modalidade_bolsa on id_mb = mb_id
					left join us_conta on id_us = us_usuario_id_us
						where ic_plano_aluno_codigo = '$proto' 
						and icas_id = 1 
					order by us_nome ";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();

		$vlr = round($valor / count($rlt) * 100) / 100;

		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			$line['mb_valor'] = $vlr;
			$fl .= $this -> req_pagamento($line, $venc);
		}
		$fl .= $this -> pagamentos -> req_fim();

		$file = $this -> pagamentos -> save_file($fl, $proto, date("Y-m"), $venc);
		//$fl = '<a href="'.base_url($file).'">Download do Arquivo</a>';
		return ($fl);
	}
	
	//header do arquivo
	function header_rq() {
		$sx = '399';
		$sx .= '00000';
		$sx .= '         ';
		$sx .= '27665982';
		//$sx .= '00001510'; //<-- antigo contrato continha 6 poisições
		$sx .= '0000151'; //<-- retirado o 0 para atender posicionamento de caracteres para o novo contrato
		//$sx .= '51462'; //<-- Trocado convenio de Salário para Outros
		//$sx .= '90565'; //<-- Solicitidado pelo Fernando em 17/07/2013
		//$sx .= '51462';//<--contrato anterior valido até 23/06/2016 - Solicitidado pelo Fernando em 16/06/2014
		$sx .= '246107';//<--novo contrato Solicitidado pelo Fernando em 23/06/2016 alterar o contrato 51462 para 246107
		$sx .= '              ';
		$sx .= '00000';
		$sx .= ' ';
		$sx .= '0000000000000';
		$sx .= ' ';
		$sx .= 'APC PIBIC                     ';
		$sx .= 'HSBC BANK BRASIL S.A.                   ';
		$sx .= '1';
		//$sx .= '02082011';
		$sx .= date("dmY");
		//$sx .= '1446520';
		$sx .= date("His");
		$sx .= '00000002001600';
		$sx .= 'CPGY2K SFW 10.10                                                     ';
		$sx .= chr(13) . chr(10);
		return ($sx);
	}

	//header do lote
	function header_rq2() {
		$sx = '399';
		//$sx .= '00011C3001020'; //<--o numero 30 nas posições 10 e 11 referece a "salario"
		$sx .= '00011C2001020'; //<-- alterado para o numero 20 nas posições 10 e 11 refrente a "fornecedor"
		$sx .= ' ';
		//$sx .= '2766598200001510'; //<-- retirado o 0 para atender posicionamento de caracteres para o novo contrato
		$sx .= '276659820000151'; //<-- retirado o 0 para atender posicionamento de caracteres para o novo contrato
		//$sx .= '51462'; //<--contrato anterior valido até 23/06/2016
		//$sx .= '90565'; //<-- Solicitidado pelo Fernando em 17/07/2013
		$sx .= '246107';//<--novo contrato Solicitidado pelo Fernando em 23/06/2016 alterar o contrato 51462 para 246107
		$sx .= '              ';
		$sx .= '00000';
		$sx .= ' ';
		$sx .= '0000000000000';
		$sx .= ' ';
		$sx .= 'APC PIBIC                                                                                                                                   ';
		$sx .= '00000000';
		$sx .= '                    ';
		$sx .= chr(13) . chr(10);
		return ($sx);
	}

	function req_fim() {
		global $ln, $pg, $total;
		$sx = '39906465         ';
		$sx .= '0';
		//$sx .= '00646';
		$sx .= strzero($ln, 5);
		$sx .= '   ';
		//$sx .= '000000012880000';
		$sx .= strzero($total * 100, 15);
		$sx .= '                                                                                                                                                                                                       ' . chr(13) . chr(10);

		$ln++;
		$sx .= '39999999         ';
		$sx .= '000001';
		$sx .= '0';
		$sx .= strzero($ln + 1, 5);
		//$sx .= '00648';
		$sx .= '                                                                                                                                                                                                                   ' . chr(13) . chr(10);
		return ($sx);
	}

	function req_pagamento($line, $data = 20130305) {
		global $ln, $pg, $total, $total1, $total2, $total3, $total4;
		$data = sonumero($data);
		//$sql = "alter table pibic_aluno add column usc_modo char(3)";
		//$rlt = db_query($sql);

		$banco = trim($line['usc_banco']);
		$cpf = $this -> validaCPF(trim($line['us_cpf']));
		$mod = trim($line['usc_modo']);
		$conta = $situacao = $this -> bancos -> checadv($line['usc_agencia'], $line['usc_conta_corrente'], $banco, $mod);
		$agencia = trim($line['usc_agencia']);

		if (strlen($banco) == 0) {
			echo '<BR>Banco inválido';
			return ('');
		}
		if (strlen($agencia) == 0) {
			echo '<BR>Agência inválida';
			return ('');
		}

		if (!($conta == 'ok') or ($cpf == 0)) {
			echo '<TT>' . sonumero($line['us_cpf']);
			echo ' ' . $line['us_nome'];
			echo ' ';
			echo ' CPF(' . $cpf . ') - Banco:' . $banco . ' Conta (' . $conta . ')';
			echo '<BR>';
			$total1++;
			$total2 = $total2 + $line['mb_valor'];
			return ('');
		}

		$data_nr = substr($data, 6, 2) . substr($data, 4, 2) . substr($data, 0, 4);
		if (empty($ln)) {
			 $ln = 1;
		}

		$valor = strzero($line['mb_valor'] * 100, 13);
		$total = $total + $line['mb_valor'];

		$nome = Substr(UpperCaseSQL(trim($line['us_nome'])), 0, 30);
		while (strlen($nome) < 30) {
			 $nome .= ' ';
		}
		$sx = '399';
		$sx .= strzero($ln + 1, 4);
		//$sx .= '0002';
		$sx .= '3';
		$sx .= strzero($ln, 5);
		//$sx .= '00001';
		$sx .= 'A';
		$sx .= '000';
		if ($banco == '399') {
			$sx .= '   ';
		} else {
			$sx .= '700';
		}

		switch ($banco) {
			case '399' :
				$cc = strz($line['usc_banco'], 3);
				;
				//$sx .= '01748';
				$cc .= strz($line['usc_agencia'], 5);
				$cc .= ' ';
				$cc .= '0';
				$ncc = strz($line['usc_agencia'], 5);
				$nca = strz($line['usc_conta_corrente'], 7);

				if ($nca == '0000000') { $ncc = '00000';
				}
				$cc .= $ncc;
				$cc .= $nca;
				//$cc .= strz($line['usc_conta_corrente'],7);
				$cc .= ' ';
				break;
			default :
				$cc = strz($line['usc_banco'], 3);
				;
				//$sx .= '01748';
				$cc .= strz(substr(trim($line['usc_agencia']), 0, 4), 5);
				$cc .= ' ';
				$cc .= '0';
				//$cc .= strz(substr($line['usc_agencia'],0,4),5);
				if ($banco == '104') {
					$cc .= strz($line['usc_modo'], 3);
					$cc .= strz($line['usc_conta_corrente'], 9);
				} else {
					$cc .= strz($line['usc_conta_corrente'], 12);
				}

				$cc .= ' ';
				break;
		}
		if (strlen($cc) > 23) {
			echo '<BR>Erro nos dados da conta ' . $line['us_nome'];
			echo '<BR><TT>' . $cc . '</TT>-' . strlen($cc);
			return ('');
		}
		$sx .= $cc;
		$sx .= $nome;
		/**Nr. DOC processado [número do compromisso] para pagamento
		$sx .= strzero($line['mb_id'], 3);//<-- antigo 
		$vvv = substr($data_nr, 2, 1) . substr($data_nr, 6, 2);
		$vvv .= '0' . trim($line['usc_banco']);
		$sx .= $vvv . strz($ln, 4);
		*/
		
		/* Nr. DOC processado [número do compromisso] para pagamento */
		$sx .= strzero($line['mb_id'], 3). trim($line['id_ic']);//<-- Novo -> adicionado id_ic para gerar um numeral sem duplicacao par numero do DOC [04/07/2016 Elizandro]
		$vvv = substr($data_nr, 2, 1) . substr($data_nr, 6, 2);
		$vvv .= '0' . trim($line['usc_banco']);
		$sx .= $vvv . strz($ln, 4);
		
		/*Espaços em branco*/
		$sx .= '      ';
		/* Adiciona a data*/ 
		$sx .= $data_nr;
		$sx .= 'R$';
		$sx .= '                  ';
		//$sx .= '0000000036000';
		$sx .= $valor;
		$sx .= 'N';
		$sx .= '                                                                                              ';
		$sx .= '0';
		$sx .= '          ';
		$sx .= chr(13) . chr(10);

		$ln++;
		/* LN 2 */
		$sx .= '399';
		$sx .= strzero($ln + 1, 4);
		$sx .= '3';
		$sx .= strzero($ln, 5);
		$sx .= 'B';
		$sx .= '   ';
		$sx .= '1000';
		$sx .= strzero(sonumero($line['us_cpf']), 11);
		//$sx .= '06196555936'; /* cof */
		$sx .= '                                                                                                                                                                                                                ';
		$sx .= chr(13) . chr(10);
		$ln++;
		return ($sx);
	}

	function validaCPF($cpf) {
		/*
		 @autor: Moacir Selínger Fernandes
		 @email: hassed@hassed.com
		 */
		// Verifiva se o número digitado contém todos os digitos

		$cpf = strzero(sonumero($cpf), 11);

		// Verifica se nenhuma das sequências abaixo foi digitada, caso seja, retorna falso
		if (strlen($cpf) != 11 || $cpf == '00000000000' || $cpf == '11111111111' || $cpf == '22222222222' || $cpf == '33333333333' || $cpf == '44444444444' || $cpf == '55555555555' || $cpf == '66666666666' || $cpf == '77777777777' || $cpf == '88888888888' || $cpf == '99999999999') {
			return (0);
		} else {// Calcula os números para verificar se o CPF é verdadeiro
			for ($t = 9; $t < 11; $t++) {
				for ($d = 0, $c = 0; $c < $t; $c++) { $d += $cpf{$c} * (($t + 1) - $c);
				}

				$d = ((10 * $d) % 11) % 10;

				if ($cpf{$c} != $d) {
					return (0);
				}
			}
			return (1);
		}
	}

	/**************************************************************************************************/
	function pagamento_por_rateio($proto, $valor, $venc) {
		$data = date("Y-m-d");
		$venc = sonumero($venc);
		$venc = substr($venc, 0, 4) . '-' . substr($venc, 4, 2) . '-' . substr($venc, 6, 2);

		$sql = "select * from ic_aluno
					left join us_usuario on us_cracha = ic_aluno_cracha
					left join ic on ic_id = id_ic  
					left join ic_modalidade_bolsa on id_mb = mb_id
					left join us_conta on id_us = us_usuario_id_us
						where ic_projeto_professor_codigo = '$proto' 
						and icas_id = 1 
					order by us_nome ";

		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();

		$to1 = 0;
		$to2 = 0;
		$to3 = 0;
		$to4 = 0;
		$to1v = 0;
		$to2v = 0;
		$to3v = 0;

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

		$vlr = $valor / count($rlt);

		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];

			$cpf = $line['us_cpf'];
			$cor = '<font>';
			if ($cpf == $xcpf) {
				$cor = '<font color="red">';
				$to4++;
			}
			$xcpf = $cpf;

			$sx .= '<tr>';
			$sx .= '<td class="borderb1">';
			$sx .= $cor . $line['us_nome'] . '</font>';
			//$sx .= '('.$line['id_us'].')';
			$sx .= ' (' . $line['ic_aluno_cracha'] . ')';
			$sx .= '</td>';

			$sx .= '<td class="borderb1" align="center" width="110"><nobr>';
			$sx .= $cor . mask_cpf($line['us_cpf']) . '</font>';
			$sx .= '</nobr></td>';

			$sx .= '<td align="right" class="borderb1" width="110"><nobr>';
			$sx .= $cor . $line['mb_moeda'] . ' ';
			$sx .= number_format($vlr, 2, ',', '.') . '</font></nobr>';
			$sx .= '</td>';

			$ccv = trim($line['usc_conta_corrente']);
			if ($ccv == '0000000') {$ccv = '<font color="green"><b>ORDEM</b></font>';
				$to3++;
				$to3v = $to3v + $vlr;
			}

			$sx .= '<td class="borderb1" align="center">' . $line['usc_banco'] . '</td>';
			$sx .= '<td class="borderb1" align="center">' . $line['usc_agencia'] . '</td>';
			$sx .= '<td class="borderb1" align="center">' . $line['usc_modo'] . '</td>';
			$sx .= '<td class="borderb1" align="center">' . $ccv . '</td>';

			$banco = $line['usc_banco'];
			$mod = $line['usc_modo'];
			$cc = trim($line['usc_conta_corrente']);

			$ag = $line['usc_agencia'];

			$situacao = $this -> bancos -> checadv($ag, $cc, $banco, $mod);
			$sx .= '<td align="center" class="borderb1">' . $situacao . '</td>';

			$sx .= '</tr>';

			/* */
			if ($situacao == 'ok') {
				$to1++;
				$to1v = $to1v + $vlr;
			} else {
				$to2++;
				$to2v = $to2v + $vlr;
			}
		}
		$sx .= '</table>';

		/* Resumo */
		$sa = '<table width="100%" class="lt2 border1" border=0>';
		$sa .= '<tr>';
		if (isset($rlt[0])) {
			$sa .= '<td colspan="10" class="lt5">' . $rlt[0]['mb_descricao'] . '</td>';
		}
		$sa .= '<td class="lt0" align="center">Total de bolsas<br><font class="lt5">' . ($to1 + $to2) . '</font></td>';
		$sa .= '<td class="lt0" align="center" class="border1">Total de bolsas válidas<br><font class="lt5">' . ($to1) . '</font></td>';
		$sa .= '<td class="lt0" align="center" class="border1">Valor pago<br><font class="lt5">' . number_format($to1v, 2, ',', '.') . '</font></td>';
		if ($to4 > 0) {
			$sa .= '<td class="lt0" align="center" bgcolor="#ffe0e0">Pagamento duplicado<br><font class="lt5" color="red">' . ($to4) . '</font></font></td>';
		}
		if ($to3 > 0) {
			$sa .= '<td class="lt0" align="center">Total de Ordem de Pagamento<br><font class="lt5" color="green">' . ($to3) . '</font></font></td>';
			$sa .= '<td class="lt0" align="center" class="border1">Valor pago<br><font class="lt5" color="green"><b>' . number_format($to3v, 2, ',', '.') . '</b></font></font></td>';
		}
		$cor = '<font>';
		if ($to2 > 0) {
			$sa .= '<td class="lt0" align="center">Total de bolsas inválidas<br><font class="lt5" color="red">' . ($to2) . '</font></font></td>';
			$sa .= '<td class="lt0" align="center" class="border1">Valor pago<br><font class="lt5" color="red"><b>' . number_format($to2v, 2, ',', '.') . '</b></font></font></td>';
		}
		if ($to1 > 0) {
			$sa .= '<td width="80" class="nopr">';
			$sa .= '<form method="get" action="' . base_url('index.php/ic/pagamento_planilha_hsbc_rateio/' . $proto . '/' . $valor . '/' . $venc) . '">';
			$sa .= '<input type="submit" name="button" value="' . msg("gerar_arquivo") . '" class="btn btn-primary" >';
			$sa .= '</form>';
			$sa .= '</td>';
		}
		$sa .= '</tr>';
		$sa .= '</table>';

		return ($sa . $sx);
	}

	function pagamento_avulso($proto, $valor, $venc) {
		$data = date("Y-m-d");

		$venc = sonumero($venc);
		$venc = substr($venc, 0, 4) . '-' . substr($venc, 4, 2) . '-' . substr($venc, 6, 2);

		$sql = "select * from ic_aluno
					left join us_usuario on us_cracha = ic_aluno_cracha
					left join ic on ic_id = id_ic  
					left join ic_modalidade_bolsa on id_mb = mb_id
					left join us_conta on id_us = us_usuario_id_us
						where ic_plano_aluno_codigo = '$proto' 
						and icas_id = 1 
					order by us_nome ";

		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();
		if (count($rlt) == 0) {
			return ('<div class="danger">PROTOCOLO NÃO LOCALIZADO</div>');
		}
		$to1 = 0;
		$to2 = 0;
		$to3 = 0;
		$to4 = 0;
		$to1v = 0;
		$to2v = 0;
		$to3v = 0;

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

		$vlr = $valor / count($rlt);

		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];

			$cpf = $line['us_cpf'];
			$cor = '<font>';
			if ($cpf == $xcpf) {
				$cor = '<font color="red">';
				$to4++;
			}
			$xcpf = $cpf;

			$sx .= '<tr>';
			$sx .= '<td class="borderb1">';
			$sx .= $cor . $line['us_nome'] . '</font>';
			//$sx .= '('.$line['id_us'].')';
			$sx .= ' (' . $line['ic_aluno_cracha'] . ')';
			$sx .= '</td>';

			$sx .= '<td class="borderb1" align="center" width="110"><nobr>';
			$sx .= $cor . mask_cpf($line['us_cpf']) . '</font>';
			$sx .= '</nobr></td>';

			$sx .= '<td align="right" class="borderb1" width="110"><nobr>';
			$sx .= $cor . $line['mb_moeda'] . ' ';
			$sx .= number_format($vlr, 2, ',', '.') . '</font></nobr>';
			$sx .= '</td>';

			$ccv = trim($line['usc_conta_corrente']);
			if ($ccv == '0000000') {$ccv = '<font color="green"><b>ORDEM</b></font>';
				$to3++;
				$to3v = $to3v + $vlr;
			}

			$sx .= '<td class="borderb1" align="center">' . $line['usc_banco'] . '</td>';
			$sx .= '<td class="borderb1" align="center">' . $line['usc_agencia'] . '</td>';
			$sx .= '<td class="borderb1" align="center">' . $line['usc_modo'] . '</td>';
			$sx .= '<td class="borderb1" align="center">' . $ccv . '</td>';

			$banco = $line['usc_banco'];
			$mod = $line['usc_modo'];
			$cc = trim($line['usc_conta_corrente']);

			$ag = $line['usc_agencia'];

			$situacao = $this -> bancos -> checadv($ag, $cc, $banco, $mod);
			$sx .= '<td align="center" class="borderb1">' . $situacao . '</td>';

			$sx .= '</tr>';

			/* */
			if ($situacao == 'ok') {
				$to1++;
				$to1v = $to1v + $vlr;
			} else {
				$to2++;
				$to2v = $to2v + $vlr;
			}
		}
		$sx .= '</table>';

		/* Resumo */
		$sa = '<table width="100%" class="lt2 border1" border=0>';
		$sa .= '<tr>';
		if (isset($rlt[0])) {
			$sa .= '<td colspan="10" class="lt5">' . $rlt[0]['mb_descricao'] . '</td>';
		}
		$sa .= '<td class="lt0" align="center">Total de bolsas<br><font class="lt5">' . ($to1 + $to2) . '</font></td>';
		$sa .= '<td class="lt0" align="center" class="border1">Total de bolsas válidas<br><font class="lt5">' . ($to1) . '</font></td>';
		$sa .= '<td class="lt0" align="center" class="border1">Valor pago<br><font class="lt5">' . number_format($to1v, 2, ',', '.') . '</font></td>';
		if ($to4 > 0) {
			$sa .= '<td class="lt0" align="center" bgcolor="#ffe0e0">Pagamento duplicado<br><font class="lt5" color="red">' . ($to4) . '</font></font></td>';
		}
		if ($to3 > 0) {
			$sa .= '<td class="lt0" align="center">Total de Ordem de Pagamento<br><font class="lt5" color="green">' . ($to3) . '</font></font></td>';
			$sa .= '<td class="lt0" align="center" class="border1">Valor pago<br><font class="lt5" color="green"><b>' . number_format($to3v, 2, ',', '.') . '</b></font></font></td>';
		}
		$cor = '<font>';
		if ($to2 > 0) {
			$sa .= '<td class="lt0" align="center">Total de bolsas inválidas<br><font class="lt5" color="red">' . ($to2) . '</font></font></td>';
			$sa .= '<td class="lt0" align="center" class="border1">Valor pago<br><font class="lt5" color="red"><b>' . number_format($to2v, 2, ',', '.') . '</b></font></font></td>';
		}
		if ($to1 > 0) {
			$sa .= '<td width="80" class="nopr">';
			$sa .= '<form method="get" action="' . base_url('index.php/ic/pagamento_planilha_hsbc_avulso/' . $proto . '/' . $valor . '/' . $venc) . '">';
			$sa .= '<input type="submit" name="button" value="' . msg("gerar_arquivo") . '" class="btn btn-primary" >';
			$sa .= '</form>';
			$sa .= '</td>';
		}
		$sa .= '</tr>';
		$sa .= '</table>';

		return ($sa . $sx);
	}

	function gerar_pagamento_bolsa($bolsa = 0, $ano = 0, $venc = 0) {
		$data = date("Y-m-d");
		$venc = sonumero($venc);
		$venc = substr($venc, 0, 4) . '-' . substr($venc, 4, 2) . '-' . substr($venc, 6, 2);

		$sql = "select * from ic_aluno
					left join us_usuario on us_cracha = ic_aluno_cracha
					left join ic on ic_id = id_ic  
					left join ic_modalidade_bolsa on id_mb = mb_id
					left join us_conta on id_us = us_usuario_id_us
						where mb_id = $bolsa 
						and ic_ano = '$ano' 
						and icas_id = 1
						and (aic_dt_saida = '0000-00-00' or aic_dt_saida > '$data') 
					order by us_nome ";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();

		$to1 = 0;
		$to2 = 0;
		$to3 = 0;
		$to4 = 0;
		$to1v = 0;
		$to2v = 0;
		$to3v = 0;

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
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];

			$cpf = $line['us_cpf'];
			$cor = '<font>';
			if ($cpf == $xcpf) {
				$cor = '<font color="red">';
				$to4++;
			}
			$xcpf = $cpf;

			$sx .= '<tr>';
			$sx .= '<td class="borderb1">';
			$sx .= $cor . $line['us_nome'] . '</font>';
			//$sx .= '('.$line['id_us'].')';
			$sx .= ' (' . $line['ic_aluno_cracha'] . ')';
			$sx .= ' (' . $line['ic_aluno_cracha'] . ')';
			$sx .= '</td>';	
			

			$sx .= '<td class="borderb1" align="center" width="110"><nobr>';
			$sx .= $cor . mask_cpf($line['us_cpf']) . '</font>';
			$sx .= '</nobr></td>';

			$sx .= '<td align="right" class="borderb1" width="110"><nobr>';
			$sx .= $cor . $line['mb_moeda'] . ' ';
			$sx .= number_format($line['mb_valor'], 2, ',', '.') . '</font></nobr>';
			$sx .= '</td>';

			$ccv = trim($line['usc_conta_corrente']);
			if ($ccv == '0000000') {$ccv = '<font color="green"><b>ORDEM</b></font>';
				$to3++;
				$to3v = $to3v + $line['mb_valor'];
			}

			$sx .= '<td class="borderb1" align="center">' . $line['usc_banco'] . '</td>';
			$sx .= '<td class="borderb1" align="center">' . $line['usc_agencia'] . '</td>';
			$sx .= '<td class="borderb1" align="center">' . $line['usc_modo'] . '</td>';
			$sx .= '<td class="borderb1" align="center">' . $ccv . '</td>';

			$banco = $line['usc_banco'];
			$mod = $line['usc_modo'];
			$cc = trim($line['usc_conta_corrente']);

			$ag = $line['usc_agencia'];

			$situacao = $this -> bancos -> checadv($ag, $cc, $banco, $mod);
			$sx .= '<td align="center" class="borderb1">' . $situacao . '</td>';

			$sx .= '</tr>';

			/* */
			if ($situacao == 'ok') {
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
		if (isset($rlt[0])) {
			$sa .= '<td colspan="10" class="lt5">' . $rlt[0]['mb_descricao'] . '</td>';
		}
		$sa .= '<td class="lt0" align="center">Total de bolsas<br><font class="lt5">' . ($to1 + $to2) . '</font></td>';
		$sa .= '<td class="lt0" align="center" class="border1">Total de bolsas válidas<br><font class="lt5">' . ($to1) . '</font></td>';
		$sa .= '<td class="lt0" align="center" class="border1">Valor pago<br><font class="lt5">' . number_format($to1v, 2, ',', '.') . '</font></td>';
		if ($to4 > 0) {
			$sa .= '<td class="lt0" align="center" bgcolor="#ffe0e0">Pagamento duplicado<br><font class="lt5" color="red">' . ($to4) . '</font></font></td>';
		}
		if ($to3 > 0) {
			$sa .= '<td class="lt0" align="center">Total de Ordem de Pagamento<br><font class="lt5" color="green">' . ($to3) . '</font></font></td>';
			$sa .= '<td class="lt0" align="center" class="border1">Valor pago<br><font class="lt5" color="green"><b>' . number_format($to3v, 2, ',', '.') . '</b></font></font></td>';
		}
		$cor = '<font>';
		if ($to2 > 0) {
			$sa .= '<td class="lt0" align="center">Total de bolsas inválidas<br><font class="lt5" color="red">' . ($to2) . '</font></font></td>';
			$sa .= '<td class="lt0" align="center" class="border1">Valor pago<br><font class="lt5" color="red"><b>' . number_format($to2v, 2, ',', '.') . '</b></font></font></td>';
		}
		if ($to1 > 0) {
			$sa .= '<td width="80" class="nopr">';
			$sa .= '<form method="get" action="' . base_url('index.php/ic/pagamento_planilha_hsbc/' . $bolsa . '/' . $ano . '/' . $venc) . '">';
			$sa .= '<input type="submit" name="button" value="' . msg("gerar_arquivo") . '" class="btn btn-primary" >';
			$sa .= '</form>';
			$sa .= '</td>';
		}
		$sa .= '</tr>';
		$sa .= '</table>';

		return ($sa . $sx);
	}

	function gerar_pagamentos($bolsa, $credito, $ano = 2012, $bcos, $ss = '') {
		global $total, $total1, $total2, $total3, $total4;
		$wh = "pb_tipo = '$bolsa' and ";

		if ($bcos == 'ORDEM') {
			$wh .= " usc_conta_corrente = '0000000' and ";
		} else {
			$wh .= " usc_conta_corrente <> '0000000' and ";
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
					order by us_nome
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
						left join pibic_aluno on pg_cpf = us_cpf and us_ativo = 1
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
			$sx .= $link . $cor . $line['us_nome'] . '</A>';
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

	function pagamentos_lotes($data = '', $fim = 0) {

		if (strlen($data) == 0) { $data = date("Yd") . '01';
		}

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
		$sx .= '<th width="25%">' . msg('Lote') . '</th>';
		$sx .= '<th width="25%">' . msg('Bolsas') . '</th>';
		$sx .= '<th width="25%">' . msg('Valor_medio') . '</th>';
		$sx .= '<th width="725%">' . msg('Valor') . '</th>';

		$tot = 0;
		$pag = 0;
		while ($line = db_read($rlt)) {
			$cpf = $line['pg_cpf'];
			$id = $line['id_pg'];
			$link = '<A HREF="' . base_url('index.php/ic/pagamentos/201409/view/8e92536ed4d6cf1694db65cd7826cd64') . $data . '/' . $line['lote'] . '" class="link">';

			$valor = $line['total'];
			$sx .= '<TR>';
			$sx .= '<td class="border1" align="center">' . $link . $line['lote'] . '</a></td>';
			$sx .= '<td class="border1" align="center">' . $link . $line['registros'] . '</a></td>';
			$sx .= '<td class="border1" align="center">' . $link . number_format($line['total'] / $line['registros'], 2, ',', '.') . '</a></td>';
			$sx .= '<td class="border1" align="right">' . $link . number_format($line['total'], 2, ',', '.') . '</a></td>';
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
				$link = '<A HREF="' . base_url('index.php/ic/' . $line['id_us'] . '/' . checkpost_link($line['id_us'])) . '">';
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
				$this -> db -> query($sql);
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
		$sx .= '<th width="33%">' . msg('vigência') . '</th>';
		$sx .= '<th width="33%">' . msg('documentos') . '</th>';
		$sx .= '<th width="33%">' . msg('valor_total') . '</th>';

		$page = page();
		$page = troca($page, '.php', 'a.php');

		while ($line = db_read($rlt)) {
			$mes = substr($line['pg_venc'], 0, 6);

			$link = '<A href="' . base_url('index.php/ic/pagamentos/' . $line['pg_venc'] . '/view/' . checkpost_link($line['pg_venc'])) . '" class="link">';
			if ($xmes != $mes) {
				$sx .= '<tr><td align="center" class="border1">';
				$sx .= $link . substr($mes, 4, 2) . '/' . substr($mes, 0, 4) . '</a>';
				$xmes = $mes;
			} else {
				$sx .= '<tr><td>&nbsp;</td>';
			}

			$sx .= '<td align="center" class="border1" width="25%">';
			$sx .= $link;
			$sx .= $line['total'];
			$sx .= '</td>';

			$sx .= '<td align="right" class="border1" width="25%">';
			$sx .= $link . number_format($line['valor'], 2, ',', '.') . '</a>';
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