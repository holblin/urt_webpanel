<?php
include 'includes.php';

session_save_path('.session');
session_start();


$selected	= isset($_REQUEST['selected']) ? urldecode($_REQUEST['selected']) : 'none';
$page		= isset($_REQUEST['page']) ? urldecode($_REQUEST['page']) : 'global';




if (isset($_REQUEST['quick']) && isset($_REQUEST['target']) ) {
	switch($_REQUEST['quick']) {
		case 'start':
			start($_REQUEST['target']);
			break;
		case 'stop':
			stop($_REQUEST['target']);
			break;
		case 'restart':
			restart($_REQUEST['target']);
			break;
	}
}


$rcon_recovery = 'your rcon recovery password';


if (!isset($_SESSION['ip']))
	$_SESSION['ip'] = get_servers_ip();
$ip = $_SESSION['ip'];


$servers = get_servers();
		
if ($selected != 'none') {
	if (!isset($_SESSION['serveur'][$selected]['rcon'])) {
		$rcon = rcon_recovery($ip, $servers[$selected]['port'] ,$rcon_recovery);
		$rcon = $_SESSION['serveur'][$selected]['rcon'] = substr($rcon, 0, -1);
	}
	else {
		$rcon = $_SESSION['serveur'][$selected]['rcon'];
	}

	if (!isset($_SESSION['serveur'][$selected]['cmdlist'])){
		$cmdlist = rcon( $ip, $servers[$selected]['port'], $rcon , 'cmdlist' );
		$cmdlist = explode("\n", $cmdlist);
		array_pop($cmdlist); // empty line
		$cmd_nb	= array_pop($cmdlist);

		if ( 1 !== preg_match('/^\s*(\d+)\s+'.preg_quote('commands').'$/', $cmd_nb, $m ))
			die('erreur number !' . $cmd_nb);
		else
			$cmd_nb = $m[1];
			
		$_SESSION['serveur'][$selected]['cmdlist'] = $cmdlist;
	}
	$cmdlist = $_SESSION['serveur'][$selected]['cmdlist'];
}




?><!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Urt Webpanel By HoLbLiN</title>
		<link type="text/css" href="css/smoothness/jquery-ui-1.8.17.custom.css" rel="stylesheet" />	
		<link rel="stylesheet" href="codemirror/lib/util/dialog.css">
		<link rel="stylesheet" href="codemirror/lib/codemirror.css">
		
		<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
		<script type="text/javascript" src="js/jquery-ui-1.8.17.custom.min.js"></script>
		<script type="text/javascript" src="js/jquery.quicksearch.js"></script>
		<script src="codemirror/lib/codemirror.js"></script>
		<script src="codemirror/lib/util/dialog.js"></script>
		<script src="codemirror/lib/util/searchcursor.js"></script>
		<script src="codemirror/lib/util/search.js"></script>
		<script src="codemirror/mode/clike/clike.js"></script>

		
		<script type="text/javascript">
			$(function(){
				$('input#cvar_search').quicksearch('table.cvarlist tbody tr');
				$('table.cvarlist tbody td.v').dblclick(function(me){
					$me = $(me.target)
					if ($me.text().indexOf('"') != -1) {
						var key = $me.prev().text()
						var val = $me.text().trim().replace(/^"+/g,'').replace(/"+$/g,'')
						$me.html('<form action="index.php?selected=<?php echo urlencode($selected); ?>&page=<?php echo $page; ?>" method="post"> \
									<input type="radio" name="setcvar_type" checked="checked" value="set" title="set : la cvar est définie et lisible dans tous les contextes. Non archivée en fin de serveur / client." />set\
									<input type="radio" name="setcvar_type" value="setu" title="setu : la cvar est définie et lisible localement par le client seulement. Non archivée.. ( très utile en gtv pour séparer client / serveur )" />setu\
									<input type="radio" name="setcvar_type" value="sets" title="sets : la cvar est définie et lisible par le serveur seulement. Non archivée." />sets\
									<input type="radio" name="setcvar_type" value="seta" title="seta : la cvar est définie et lisible dans tous les contextes. Archivée dans le qconfig_server.cfg ( serveur) ou qconfig.cfg ( client )" />seta\
									\
									<input type="hidden" name="setcvar_key" value="' + key + '"/> \
									<input type="text" name="setcvar_val" value="' + val + '"/> \
									<button type="submit">Sauver</button> \
								</form>')
					}
				});
				
				$(".btn_play").button({
					icons: {
						secondary: "ui-icon-play"
					}
				});
				
				$("#configuration .save button").button({
					icons: {
						secondary: "ui-icon-play"
					}
				});
				
				$("#configuration .choix a").each( function(i,item){
					$(item).button();
					if ( $(item).hasClass('ui-state-active') )
						$(item).button( 'disable' );
				});
				
				
				$("#chat .choix a").each( function(i,item){
					$(item).button();
					if ( $(item).hasClass('ui-state-active') )
						$(item).button( 'disable' );
				});
				
				<?php if ($selected != 'none') {
				 echo 'var cmdlist = [ "'.implode('", "',$cmdlist).'"];';
				?>	$( ".rcon_autocomplete" ).autocomplete({
						source: cmdlist
					});
				<?php } ?>
				$(".focus").focus();
			});
		</script>
		<style type="text/css">
			.ui-icon-none { background-position: -160px -224px; }
			.ui-icon.ui-icon-grip-dotted-vertical.small{ background-position: -4px -224px; width: 8px; }
			.ui-state-default .ui-icon.ui-icon-urt { background-image: url(css/urt_black.png); }
			.uni.ui-state-default{ background-color: rgb(216, 220, 223); background-image: none; cursor: default;  }
			
			#variables table.cvarlist { width: 100%;}
			#variables table.cvarlist tbody td{ background-color: rgb(244, 244, 244); padding: 2px 8px 2px 8px; }
			#variables table.cvarlist tbody td.t{ text-align: center; }
			
			#rcon .btn_play .ui-button-text{padding: 0px 26px 0px 5px;}
			#rcon .rcon_autocomplete{width:550px;}
			
			
			
			#configuration .header{overflow: hidden;}
			#configuration .choix a {margin: 2px;}
			#configuration .choix a .ui-button-text{padding: 0px 5px 0px 5px;}
			#configuration .choix a.ui-state-disabled{opacity: 1;}
			#configuration .save{float: right;}
			#configuration .save button .ui-button-text{padding: 0px 26px 0px 5px;}
			
			
			#chat .header{overflow: hidden;}
			#chat .choix a {margin: 2px;}
			#chat .choix a .ui-button-text{padding: 0px 5px 0px 5px;}
			#chat .choix a.ui-state-disabled{opacity: 1;}
			
			#global .publicvars{width: 350px;}
			#global .publicvars thead th{text-align: right; padding: 0px 10px 0px 10px;}
			
			#global .playerlist{width: 480px; margin-left: 10px;}
			#global .playerlist tbody td{text-align: center;}
			#global .playerlist thead th{padding: 0px 5px 0px 5px;}
			
			#global table{ border-spacing: 1px; }
			#global table tbody td{ background-color: rgb(244, 244, 244); padding: 1px 4px 1px 4px; font-size: 14px;}
			
			.ui-autocomplete .ui-menu-item{ font-size : 0.7em;}
			
			.menu{ width: 250px; float: left; padding-top: 50px; margin-right: 15px; }
			.menu .ui-icon{ display: inline-block; position: relative; top: 2px; left: 2px; }
			.menu a.center{ display: block; text-align: center; }
			.menu .icon-bar{ float: left; margin-right: 15px; }
			.menu .extend{ width: 221px; margin-left: 27px; overflow: hidden;}
			.menu .extend .first{ float: left; width: 50%; }
			.menu .extend ul{ margin: 0px; padding: 5px 5px 5px 15px; list-style: none; }
			
			
			.activeline {background: #e8f2ff !important;}
			
			.CodeMirror{
				min-height: 300px;
			}
			
			.CodeMirror-scroll {
				height: auto;
				overflow-y: hidden;
				overflow-x: auto;
				width: 100%;
			}
			
			.body{
				float: left;
				width: 850px;
			}
			#main {
				margin: auto;
				width:1150px;
			}
		</style>
	</head>
	<body>
		<div id="main">
			<?php 
				include 'menu.php'; 
				echo '<div class="body" id="'.$page.'">';
					if ($selected != 'none' && file_exists('page/'.$page.'.php'))
						include 'page/'.$page.'.php';
				echo '</div>';
			?>
		</div>
	</body>
</html>