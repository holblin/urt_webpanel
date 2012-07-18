<?php

include 'includes.php';

$servers = get_servers();
print_r($servers);
echo "\n----------------------------------------------------------\n";

$ip = get_servers_ip();
echo $ip;
echo "\n----------------------------------------------------------\n";


$rcon = rcon_recovery( '188.165.226.28' , '27961', 'your rcon recovery password' );
print_r($rcon);
echo "\n----------------------------------------------------------\n";

$status = status( '188.165.226.28' , '27961' );
print_r($status);
echo "\n----------------------------------------------------------\n";

$rconstatus = rconstatus( '188.165.226.28' , '27961', $rcon);
print_r($rconstatus);

foreach($rconstatus as $val) {
	echo '<hr/>'.clean_and_colors($val['name']);
}

