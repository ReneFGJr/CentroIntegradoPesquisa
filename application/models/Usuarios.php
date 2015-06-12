<?php
class usuarios extends CI_model {
	function insere_usuario($DadosUsuario) {
		$nome = nbr_autor($DadosUsuario['nome'], 7);
		$cpf = $DadosUsuario['cpf'];
		$genero = $DadosUsuario['sexo'];
		$dtnasc = sonumero($DadosUsuario['dataNascimento']);
		$dtnasc = substr($dtnasc, 4, 4) . '-' . substr($dtnasc, 2, 2) . '-' . substr($dtnasc, 0, 2);
		$cracha = $DadosUsuario['pessoa'];
		$emplid = '';
		$tipo = $DadosUsuario['tipo'];

		$sql = "select * from usuario where us_cpf = '$cpf' ";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array($rlt);

		if (count($rlt) > 0) {
			/* Ja existe */
			$sql = "";
		} else {
			/* Novo registro */
			$sql = "insert into usuario 
							(
							us_nome, us_cpf, us_cracha,
							us_emplid, usuario_tipo_ust_id, us_dt_nascimento
							) values (
							'$nome','$cpf','$cracha',
							'$emplid','$tipo','$dtnasc'
							)					
					";
			$this -> db -> query($sql);
		}
	}
}
?>