<?php
class kanbans extends CI_Model {
	function row() {
		$sql = "select * from kanban_project order by kp_name ";
		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();

		$sx = '<h1>' . msg('Projects') . '</h1>';
		$sx .= '<ul class="lt4">';
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			$id = $line['id_kp'];
			$to1 = $line['kp_tasks'];
			$to2 = $line['kp_tasks_finish'];

			$link = base_url('index.php/kanban/project/' . $id . '/' . checkpost_link($id));
			$link = '<a href="' . $link . '" class="link lt4">';

			/* */
			if ($to1 > 0) {
				$perc = number_format($to2 / $to2 * 100, 1, ',', '.') . '%';
			} else {
				$perc = '<font color="red">' . msg('no_start') . '</font>';
			}
			$sx .= '<li>' . $link . $line['kp_name'] . '</a> (' . $perc . ')</li>' . cr();
		}
		$sx .= '</ul>';
		return ($sx);
	}

	function task($project = 0) {
		$sx = '';
		$sql = "select * from kanban_group 
						left join kanban_tasks on kt_group = id_kg
						left join us_usuario on kt_person = id_us
						where kg_project = $project 
						order by kg_order, kt_priority ";

		$rlt = $this -> db -> query($sql);
		$rlt = $rlt -> result_array();

		$xkg = 0;
		for ($r = 0; $r < count($rlt); $r++) {
			$line = $rlt[$r];
			$kg = $line['id_kg'];
			$title = trim($line['kt_name']);

			if ($kg != $xkg) {
				if ($xkg > 0) { $sx .= '</div>';
				}

				$sx .= '<div class="kanban_action" ondrop="drop(event)" ondragover="allowDrop(event)">';

				$sx .= '<div class="kanban_title" ondblclick="double();">';
				$sx .= $line['kg_name'];
				$sx .= '</div>';

				$xkg = $kg;
			}
			if (strlen($title) > 0) {
				$sx .= '<div class="kanban_task recebeDrag" ondblclick="double();" style="cursor: pointer;" >';
				$sx .= '<div class="kanban_point">
								<a href="#">
									<img src="' . base_url('img/kanban/icon_point.png') . '" height="20" draggable="true">
								</a>
							</div>';
				$sx .= $title;
				/* Usuario */
				$us = trim($line['us_nome']);
				if (strlen($us) == 0) { $us = 'none'; }
				$sx .= '<div class="kaban_user">'.$us.'</div>';
				$sx .= '</div>';
			}
		}
		if ($xkg > 0) { $sx .= '</div>';
		}
		$sx .= '</div>';
		
		$sx .= '
			<script type="text/javascript">
			function allowDrop(ev) {
			    ev.preventDefault();
			}
			
			function drag(ev) {
			    ev.dataTransfer.setData("text", ev.target.id);
			}
			
			function drop(ev) {
				alert("MOVE" + ev);
    			ev.preventDefault();
    			var data = ev.dataTransfer.getData("text");
    			ev.target.appendChild(document.getElementById(data));
			}
						
			function double()
				{
						alert("Double Click");
				}

			</script>
		';
		return ($sx);
	}

}
?>
