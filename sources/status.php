<?php

// var_dump(shell_exec( '/etc/init.d/skeleton_urt'));
// var_dump(shell_exec( 'sudo /etc/init.d/skeleton_urt'));

// var_dump(shell_exec( '/etc/init.d/skeleton_urt status'));
function get_status() {
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
		$status[$name] = $action == 'is running.' ? true : ( $action == 'is stoped !'  ? false :  null );
	}
	return $status;
}

$str = file_get_contents('/etc/urt/serveur.conf');
var_dump($str);

$str = shell_exec('ls /etc/urt.d');
var_dump($str);

var_dump(get_status());

var_dump(shell_exec( 'whoami'));
var_dump(shell_exec( 'sudo -u my_urt_user whoami'));

