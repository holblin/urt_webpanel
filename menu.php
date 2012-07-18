<div class="menu">
	<?php
		foreach($servers as $name => $v) {
			echo '<div class="ui-state-default ui-corner-all'. ( $selected == $name ? ' ui-state-hover' : '' ).'">';
				echo '<div class="icon-bar">';
					if ($v['autostart'] == 1)
						echo '<span class="ui-icon ui-icon-home" title="Ce serveur démare automatiquement"></span>';
					else
						echo '<span class="ui-icon ui-icon-none"></span>';
					echo '<span class="ui-icon ui-icon-grip-dotted-vertical small"></span>';
					switch($v['status']) {
						case 'on':
							echo '<a href="#" title="Status : OK"><span class="ui-icon ui-icon-check"></span></a>';
							break;
						case 'off':
							echo '<a href="#" title="Status : OFF"><span class="ui-icon ui-icon-closethick"></span></a>';
							break;
						case 'error':
							echo '<a href="#" title="Status : Erreur !"><span class="ui-icon ui-icon-alert"></span></a>';
							break;
						case 'unknow':
							echo '<a href="#" title="Status : Inconnu"><span class="ui-icon ui-icon-help"></span></a>';
							break;
					}
					echo '<span class="ui-icon ui-icon-grip-dotted-vertical small"></span>';
					echo '<a href="index.php?quick=restart&target='.urlencode($name).'" title="Redémarer le serveur"><span class="ui-icon ui-icon-refresh"></span></a>';
					echo '<a href="index.php?quick=start&target='.urlencode($name).'" title="Lancer le serveur"><span class="ui-icon ui-icon-play"></span></a>';
					echo '<a href="index.php?quick=stop&target='.urlencode($name).'" title="Arrêter le serveur"><span class="ui-icon ui-icon-stop"></span></a>';
					echo '<span class="ui-icon ui-icon-grip-dotted-vertical small"></span>';
					echo '<a href="urt://'.$ip.':'.$v['port'].'" title="Rejoindre la partie"><span class="ui-icon ui-icon-urt"></span></a>';
					echo '<span class="ui-icon ui-icon-grip-dotted-vertical small"></span>';
				echo '</div>';
				if ( $name == $selected && $page == 'global' )
					echo '<a href="?" class="center">'.ucfirst($name).'</a>';
				else
					echo '<a href="?selected='.urlencode($name).'" class="center">'.ucfirst($name).'</a>';
			echo '</div>';
			
			if ( $name == $selected ) {
				echo '<div class="ui-state-default ui-corner-all extend">';
					echo '<div class="first">';
						echo '<ul>';
							echo '<li><a href="?selected='.urlencode($name).'&page=global">Global</a></li>';
							echo '<li><a href="?selected='.urlencode($name).'&page=rcon">Rcon</a></li>';
							echo '<li><a href="?selected='.urlencode($name).'&page=chat">Chat / Logs</a></li>';
						echo '</ul>';
					echo '</div>';
					echo '<div>';
						echo '<ul>';
							echo '<li><a href="?selected='.urlencode($name).'&page=variables">Variables</a></li>';
							echo '<li><a href="?selected='.urlencode($name).'&page=configuration">Configuration</a></li>';
							echo '<li><a href="?selected='.urlencode($name).'&page=statistiques">Statistiques</a></li>';
						echo '</ul>';
					echo '</div>';
				echo '</div>';
			}
		}
	?>
</div>