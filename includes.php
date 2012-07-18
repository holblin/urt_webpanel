<?php

function get_servers() {
	$servers = get_servers_list();
	$auto_start = get_servers_autostart();
	$status = get_servers_status();
	
	$result = array();
	foreach($servers as $name) {
		$result[$name] = array(	
				'autostart'	=> isset($auto_start[$name]),
				'port'		=> get_server_port($name),
				'status'	=> isset($status[$name]) ? $status[$name] : 'off' );
	}
	uasort($result, function($a, $b) {
		if ($a['port'] == $b['port']) {
			return 0;
		}
		return ($a['port'] < $b['port']) ? -1 : 1;
	});
	
	return $result;
}


//==================================================//
//				CONFIGURATIONS	FILES				//
//==================================================//
{

	function get_servers_list() {
		// TODO
		// code youre own get serveur list
		$str = shell_exec('ls /etc/urt.d');
		$servers = explode("\n", $str);
		array_pop($servers); // remove the last (is empty name server because shell finish with \n)
		return $servers;
	}

	function get_servers_autostart() {
		// TODO
		// code youre own get serveur autostart list
		$result = get_var_conf_file('/etc/urt/serveur.conf','SERVERS_ENABLES');
		if ($result) {
			$result = explode(' ', $result);
			$result = array_flip($result); // met le nom des serveurs en clee (supprime les doublond et enleve les vide ?!)
		}
		return $result;
	}

	function get_servers_ip() {
		// TODO
		// code youre own get serveur ip
		return get_var_conf_file('/etc/urt/serveur.conf','SRV_IP');
	}

	function get_server_port($server_name) {
		// TODO
		// code youre own get serveur port
		if (strpos($server_name, '.') !== false)
			return false;
		return get_var_conf_file('/etc/urt.d/'.$server_name.'/serveur.conf','SRV_PORT');
	}

	function get_var_conf_file($conf_file, $var) {
		$tmp = file_get_contents($conf_file);
		$tmp = explode("\n",$tmp);
		$result = false;
		foreach ($tmp as $val) {
			if ( strstr($val,'=') !== false ) {
				list($name, $val) = explode('=', $val, 2);
				if (trim($name) == $var) {
					$result = trim(str_replace('"','', $val));
				}
			}	
		}
		return $result;
	}
}


//==================================================//
//				SKELETON		SCRIPT				//
//==================================================//
{
	function get_servers_status() {
		// TODO
		// code youre own get status here
	
		$tmp = shell_exec( 'sudo -u my_urt_user /etc/init.d/skeleton_urt status');
		$tmp = preg_replace('/'.preg_quote('').'\[[0-9]+;[0-9]+m/','',$tmp);
		$tmp = preg_replace('/'.preg_quote('').'\[[0-9]+m/','',$tmp);
		$tmp = str_replace('[', '' ,$tmp );
		$tmp = explode( "\n" ,$tmp );
		$status = array();
		foreach ($tmp as $key => $val) {
			if ($val == '') continue;
			
			list($name, $action) = explode( ']',$val);
			$name	= trim($name);
			$action	= trim($action);
			$status[$name] = $action == 'is running.' ? 'on' : ( $action == 'is stoped !'  ? 'error' :  'unknow' );
		}
		return $status;
	}

	function start( $name = null) {
		// TODO
		// code youre own start here
		if ($name === null)
			shell_exec( 'sudo -u my_urt_user /etc/init.d/skeleton_urt start');
		else
			shell_exec( 'sudo -u my_urt_user /etc/init.d/skeleton_urt start '.$name);
	}

	function stop( $name = null ) {
		// TODO
		// code youre own stop here
		if ($name === null)
			shell_exec( 'sudo -u my_urt_user /etc/init.d/skeleton_urt stop');
		else
			shell_exec( 'sudo -u my_urt_user /etc/init.d/skeleton_urt stop '.$name);
	}

	function restart( $name = null ) {
		// TODO
		// code youre own restart here
		if ($name === null)
			shell_exec( 'sudo -u my_urt_user /etc/init.d/skeleton_urt restart');
		else
			shell_exec( 'sudo -u my_urt_user /etc/init.d/skeleton_urt restart '.$name);
	}
	
}


//==================================================//
//				RCON		FUNCTIONS				//
//==================================================//
{
	function urt_query($ip, $port, $query, $answer = true) {
		$fp = fsockopen("udp://$ip",$port, $errno, $errstr, 2);
		stream_set_blocking( $fp , 0);
		socket_set_timeout($fp,2);
		stream_set_timeout($fp,2); 

		if (!$fp)	{
			echo "$errstr ($errno)<br/>\n";
		} else {
			$query = chr(0xff) . chr(0xff) . chr(0xff) . chr(0xff) . $query;
			$tmp = fwrite($fp,$query);
		}
		if ( !$answer)
			return;
			
		$data = '';
		$tmp1 = microtime(true);
		do {
			$d = fread ($fp, 2048);
			$data .= $d;
			
			if (strlen($d) == 0)
				usleep( 50 );
		} while ( strlen($d) == 0  &&  (microtime(true) - $tmp1 < 3 ));
		
		if (microtime(true) - $tmp1 > 3)
			return false;
		
		
		$nb_zero = 0;
		do {
			$d = fread ($fp, 2048);
			$data .= $d;
			
			if (strlen($d) == 0) {
				$nb_zero++;
				usleep(50);
			}else
				$nb_zero = 0;
		} while ( $nb_zero < 5 );
		
		fclose ($fp);
		return $data;
	}

	function status ($ip, $port ) {
		$data = urt_query($ip, $port, 'getstatus' , true );
		return explode_backslash($data);
	}

	function rcon ($ip, $port, $rcon_pass, $command, $answer = true) {
		$data = urt_query($ip, $port, 'rcon "' . $rcon_pass . '" ' . $command , $answer );
		if ( substr($data,0 , -1) == chr(0xff) . chr(0xff) . chr(0xff) . chr(0xff) . "print\nBad rconpassword." ){ session_destroy(); echo 'Bad rconpassword'; die(); }
		
		if (! $answer)
			return $data;
		
		$data = preg_replace ("/....print\n/", "", $data);
		return $data;
	}

	function rcon_recovery( $ip, $port, $recovery_pass) {
		// TODO
		// code youre own get rcon password here ( https://github.com/holblin/ioq3-for-UrbanTerror-4/commit/5ba6c87d467a64ace1557f127eb331fcd411ffec )
		return 'myrconpassword';
	}

	function rcon_status ($ip, $port, $rcon_pass) {
		$data = rcon ($ip, $port, $rcon_pass, "status");
		$data = explode ("\n", $data);

		# ok, let's deal with the following :
		#
		# map: q3wcp9
		# num score ping name            lastmsg address               qport rate
		# --- ----- ---- --------------- ------- --------------------- ----- -----
		#   1    19   33 l33t^n1ck       33 62.212.106.216:27960   5294 25000

		$map = array_shift($data); // 1st line : map q3wcp9
		$map = preg_replace('/^map: /','',$map);
		array_shift($data); // 2nd line : col headers
		array_shift($data); // 3rd line : -- ------ ----
		array_pop($data);
		array_pop($data); // two empty lines at the end, go figure.

		$result = array();
		foreach ($data as $line) {
			$player = $line;
			// preg_match_all("/^\s*(\d+)\s*(\d+)\s*(\d+)(.*?)(\d*)\s*(\S*)\s*(\d*)\s*(\d*)\s*$/", $player, $out); // weeeeeeeeee \o/
			preg_match_all("/^\s*(\d+)\s*(\-?\d+)\s*(\d+)\s*(.*?)\s*(\d*)\s*(\S*)\s*(\d*)\s*(\d*)\s*$/", $player, $out);
			$num = $out[1][0];
			$score = $out[2][0];
			$ping = $out[3][0];
			$name = trim($out[4][0]);
			$lastmsg = $out[5][0];
			$address = $out[6][0];
			if ($address != 'bot')
				$address = preg_replace ("/:.*$/", "", $address);
			$qport = $out[7][0];
			$rate = $out[8][0];
			
			$result[$num] = array(
							'num'=> $num,
							'score'=> $score,
							'ping'=> $ping,
							'name'=> $name,
							'lastmsg'=> $lastmsg,
							'address'=> $address,
							'qport'=> $qport,
							'rate'=> $rate,);
		}
		return array( 'map' => $map , 'data' => $result);
	}
}


//==================================================//
//				URT TOOLS FUNCTIONS					//
//==================================================//
{
	function clean_and_colors( $str ) {
		$colors = array(
			0 => 'black',
			1 => 'red',
			2 => 'green',
			3 => 'yellow',
			4 => 'blue',
			5 => 'cyan',
			6 => 'pink',
			7 => 'white',
			8 => 'black');
		
		$str = htmlentities($str);
		
		$i = 0;
		$nb = 0;
		
		$pos = strpos($str, '^' , $i);
		while ($pos !== false) {
			$i = $pos;
			if ( isset( $str[$i+1] , $colors[ $str[$i+1] ] ) ) {
				$replace = '<span style="color: '.$colors[ $str[$i+1] ].';">';
				if ($nb > 0)
					$replace = '</span>'.$replace;
				$tmp = $i - 1 + strlen($replace);
				$str = substr($str, 0, $i  ). $replace . substr($str, $i + 2 );
				$i = $tmp;
				$nb ++;
			}
			$pos = strpos($str, '^', $i + 1 );
		}
		if ( $nb > 0 )
			$str .= '</span>';
		
		return $str;
	}

	// This will take the server response and makes it in to readable key value pair
	function explode_backslash($data = array()) {
		$haystack = explode("\n", $data, 3);
		$stack = explode('\\', $haystack[1]);
		for ($i = 1;$i <= count($stack);$i = $i + 2) {
			$list[@$stack[$i]] = @$stack[$i + 1];
		}
		$list[] = @$haystack[2];
		foreach ($list as $key => $dum) {
			if (empty($dum) || !isset($dum)) {
				unset($list[$key]);
			}
		}
		return $list;
	}

	function gametype_to_int($gt) {
		$ref = array('ffa'=>1,'tdm'=>3,'ts'=>4,'ftl'=>5,'c&h'=>6,'ctf'=>7,'bomb'=>8);
		if (isset($ref[ strtolower( $gt ) ]))
			return $ref[ strtolower( $gt ) ];
		else
			return false;
	}
	
	function int_to_gametype($i) {
		$ref = array(0=>'FFA',1=>'FFA',2=>'FFA',3=>'TDM',4=>'TS',5=>'FTL',6=>'C&H',7=>'CTF',8=>'BOMB');
		if (isset($ref[ intval( $i ) ]))
			return $ref[ intval( $i ) ];
		else
			return false;
	}
}
