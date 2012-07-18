<?php

if ($servers[$selected]['status'] == 'on') {

	if (isset($_POST['setcvar_key']) && isset($_POST['setcvar_val']) && isset($_POST['setcvar_type'])) {
		if (in_array($_POST['setcvar_type'], array('set','seta','setu','sets'))) {

			$data = rcon( $ip, $servers[$selected]['port'], $rcon , $_POST['setcvar_type'].' "'.str_replace('"', '\\"',urldecode($_POST['setcvar_key'])).'" "'.str_replace('"', '\\"',urldecode($_POST['setcvar_val'])).'"');
			
			if (urldecode($_POST['setcvar_key']) == 'rconpassword')
				$rcon = $_SESSION['serveur'][$selected]['rcon'] = urldecode($_POST['setcvar_val']);
		}
	}




	$data = rcon( $ip, $servers[$selected]['port'], $rcon , 'cvarlist' );
	$data = explode("\n", $data);

	array_pop($data); // empty line
	$cvar_index	= array_pop($data);
	$cvar_nb	= array_pop($data);
	array_pop($data); // empty line

	// 316 cvar indexes
	if ( 1 !== preg_match('/^\s*(\d+)\s+'.preg_quote('cvar indexes').'$/', $cvar_index, $m ))
		die('erreur index !' . $cvar_index);
	else
		$cvar_index = $m[1];
		
	// 316 total cvars
	if ( 1 !== preg_match('/^\s*(\d+)\s+'.preg_quote('total cvars').'$/', $cvar_nb, $m ))
		die('erreur cvars !' . $cvar_nb);
	else
		$cvar_nb = $m[1];

	echo '<table class="cvarlist uni ui-state-default ui-corner-all">';
		echo '<thead><tr class="ui-corner-all">';
			echo '<th colspan="3" class="ui-widget-header ui-corner-all">
					<span style="font-size: 1.2em">CvarList</span> <span style="font-size: 0.8em">('.$cvar_nb.' cvars, '.$cvar_index.' indexes)</span>
					<div style="float: right;"><label for="cvar_search">Recherche : </label><input type="text" class="focus" name="cvar_search" id="cvar_search"/></div>
				</th>';
		echo '</tr><tr class="ui-corner-all">';
			echo '<th class="ui-widget-header ui-corner-all">Type</th>';
			echo '<th class="ui-widget-header ui-corner-all">Nom</th>';
			echo '<th class="ui-widget-header ui-corner-all">Valeur</th>';	
		echo '</tr></thead>';
		echo '<tbody>';

		$types = array(
				'S' => '<abbr title="CVAR_SERVERINFO">S</abbr></th>',
				'U' => '<abbr title="CVAR_USERINFO">U</abbr>',
				'R' => '<abbr title="CVAR_ROM">R</abbr>',
				'I' => '<abbr title="CVAR_INIT">I</abbr>',
				'A' => '<abbr title="CVAR_ARCHIVE">A</abbr>',
				'L' => '<abbr title="CVAR_LATCH">L</abbr>',
				'C' => '<abbr title="CVAR_CHEAT">C</abbr>',);

		foreach($data as $val){
			$t = array();
			$t['S'] = substr($val,0,1);
			$t['U'] = substr($val,1,1);
			$t['R'] = substr($val,2,1);
			$t['I'] = substr($val,3,1);
			$t['A'] = substr($val,4,1);
			$t['L'] = substr($val,5,1);
			$t['C'] = substr($val,6,1);
			$tmp = substr($val,8);
			
			$i = 0;
			while ( 0 === ($n = strpos($tmp, ' ', $i)) ) { $i ++;}
			$key = substr($tmp,0, $n );
			$val = substr($tmp, $n );
			
			// $tmp = explode(' ',$tmp,2);
			// $key = $tmp[0];
			// $val = $tmp[1];
			
			if ( $key == 'sv_pakNames' )
				continue;
				
			foreach($t as $t_key => $t_val){
				if ($t_val == ' ')
					$t[$t_key] = '';
				else if(isset($types[$t_key]))
					$t[$t_key] = $types[$t_key];
			}
			$t = implode(' ',$t);
			
			echo '<tr>';
				echo '<td class="t">'.$t.'</td>';
				echo '<td class="k">'.$key.'</td>';
				echo '<td class="v">'.$val.'</td>';
			echo '</tr>';
		}
		echo '</tbody>';
	echo '</table>';
}else {
	echo '<h1>Non disponible si le serveur est éteind !</h1>';
}