<?php

if ($servers[$selected]['status'] == 'on') {

	if (isset($_REQUEST['slap'])) {
		rcon($ip, $servers[$selected]['port'] , $rcon, 'slap '.intval($_REQUEST['slap']));
	}
	elseif (isset($_REQUEST['nuke'])) {
		rcon($ip, $servers[$selected]['port'] , $rcon, 'nuke '.intval($_REQUEST['nuke']));
	}
	elseif (isset($_REQUEST['kick'])) {
		rcon($ip, $servers[$selected]['port'] , $rcon, 'kick '.intval($_REQUEST['kick']));
	}

	echo '<div style="float: left;">';
		$data = status( $ip, $servers[$selected]['port'] );
		echo '<table class="publicvars uni ui-state-default ui-corner-all">';
		$serv = clean_and_colors('^7'. $data['sv_hostname'] );
		echo '<thead><tr class="ui-corner-all"><th colspan="3" class="ui-widget-header ui-corner-all">'.$serv.' &nbsp; ';
		echo '<a href="urt://'.$ip.':'.$servers[$selected]['port'].'">'.$ip.':'.$servers[$selected]['port'].'</a></td></tr></thead><tbody>';
		ksort($data);
		foreach ($data as $key => $val) {
			if (!in_array($key , array('sv_hostname'))) {
				echo '<tr><td>'.$key.'</td><td>';
				switch ($key) {
					case 'sv_dlURL':
						echo '<a href="'.$val.'">'.$val.'</a>';
						break;
					case 'mapname':
						echo '<a href="http://q3a.ath.cx/map/'.$val.'">'.$val.'</a>';
						break;
					case 'g_gametype':
						echo $val;
						if ( $name = int_to_gametype($val) )
							echo ' ('.$name.')';
						break;
					default:
						echo $val;
						break;
				}
				echo '</td><tr>';
			}
		}
		echo '</tbody></table>';
	echo '</div>';
	
	echo '<div style="float: left;">';
		echo '<div>';
			$status	= rcon_status( $ip, $servers[$selected]['port'] , $rcon );
			$status	= $status['data'];
			
			echo '<table class="playerlist uni ui-state-default ui-corner-all"><thead>';
			echo '<tr class="ui-corner-all"><th colspan="6" class="ui-widget-header ui-corner-all">Players</td></tr>';
			echo '<tr class="ui-corner-all">
					<th class="ui-widget-header ui-corner-all">Num</td>
					<th class="ui-widget-header ui-corner-all">Score</td>
					<th class="ui-widget-header ui-corner-all">Ping</td>
					<th class="ui-widget-header ui-corner-all">Name</td>
					<th class="ui-widget-header ui-corner-all">Address</td>
					<th class="ui-widget-header ui-corner-all">Action</td>
				</tr>';
			echo '</thead><tbody>';
			if (count($status) == 0)
				echo '<tr><td colspan="6" style="text-align: center;">No players !</td></tr>';
			foreach($status as $s) {
				echo '<tr>
						<td>'.$s['num'].'</td>
						<td>'.$s['score'].'</td>
						<td>'.$s['ping'].'</td>
						<td>'.clean_and_colors( $s['name'] ).'</td>
						<td>'.$s['address'].'</td>
						<td>'.
							'<a href="index.php?selected='.urlencode($selected).'&page=global&slap='.$s['num'].'" title="Slap"><img src="css/slap_black.png"/></a> '.
							'<a href="index.php?selected='.urlencode($selected).'&page=global&nuke='.$s['num'].'" title="Nuke"><img src="css/nuke_black.png"/></a> '.
							'<a href="index.php?selected='.urlencode($selected).'&page=global&kick='.$s['num'].'" title="Kick"><span style="display: inline-block; position: relative;" class="ui-icon ui-icon-closethick"></span></a>'.
							// '<span style="display: inline-block; position: relative;" class="ui-icon ui-icon-cancel"></span>'.
						'</td>
					</tr>';
			}
		echo '</div>';
		
	echo '</div>';

}else {
	echo '<h1>Non disponible si le serveur est éteind !</h1>';
}