<?php

	// TODO
	// Change this by your own configs files
	$postit			= '/etc/urt.d/'.$selected.'/postit.txt';
	$mapcycle		= '/etc/urt.d/'.$selected.'/mapcycle.txt';
	$urt_cfg		= '/etc/urt.d/'.$selected.'/serveur.cfg';
	$skeleton_conf	= '/etc/urt.d/'.$selected.'/serveur.conf';
	
	if ( isset($_REQUEST['conf']) && in_array($_REQUEST['conf'], array('serveur','urt','mapcycle','postit')))
		$conf = $_REQUEST['conf'];
	else
		$conf = 'postit';
	
		
	if ( isset($_POST['conf_file']) ) {
		switch( $conf ){
			case 'postit':
				file_put_contents($postit		, $_POST['conf_file']);
				break;
			case 'urt':
				file_put_contents($urt_cfg		, $_POST['conf_file']);
				break;
			case 'mapcycle':
				file_put_contents($mapcycle		, $_POST['conf_file']);
				break;
			case 'serveur':
				file_put_contents($skeleton_conf, $_POST['conf_file']);
				break;
		}
	}
	
	echo '<form action="index.php?selected='.urlencode($selected).'&page='.$page.'&conf='.$conf.'" method="POST">';
		
	echo '<div class="uni ui-state-default ui-corner-all">
			<div class="header ui-widget-header ui-corner-all">';		
				echo '<div class="save">
						<button type="submit">Save</button>
					</div>';
						
				echo '<div class="choix">
					<a href="index.php?selected='.urlencode($selected).'&page='.$page.'&conf=postit" '.		($conf =='postit'	? 'class="ui-state-active"': '').'>Post-it</a>
					<a href="index.php?selected='.urlencode($selected).'&page='.$page.'&conf=urt" '.		($conf =='urt'		? 'class="ui-state-active"': '').'>Urt</a>
					<a href="index.php?selected='.urlencode($selected).'&page='.$page.'&conf=mapcycle" '.	($conf =='mapcycle'	? 'class="ui-state-active"': '').'>Mapcycle</a>
					<a href="index.php?selected='.urlencode($selected).'&page='.$page.'&conf=serveur" '.	($conf =='serveur'	? 'class="ui-state-active"': '').'>Serveur</a>
				</div>';
			echo'</div>';
		echo '<div>';
	if ($conf == 'none') {
		echo '<div>';
			echo 'Petite explication sur blablabla ...<br/>Explication des raccourcis';
		echo '</div>';
	}
	else {
		echo '<div>';
			echo'<textarea name="conf_file" id="conf_file">';
			switch($conf){
				case 'postit':
					if ( file_exists( $postit ))
						echo file_get_contents($postit);
					break;
				case 'urt':
					if ( file_exists( $urt_cfg ))
						echo file_get_contents($urt_cfg);
					break;
				case 'mapcycle':
					if ( file_exists( $mapcycle ))
						echo file_get_contents($mapcycle);
					break;
				case 'serveur':
					if ( file_exists( $skeleton_conf ))
						echo file_get_contents($skeleton_conf);
					break;
			}
			echo'</textarea>';
		echo '</div>';
	}
	echo '</div>';
	
	echo '</form>';
			
				

?>
<script>
	var editor = CodeMirror.fromTextArea(document.getElementById("conf_file"), {
<?php
			switch($conf){
				case 'postit':
					echo 'mode: "text/plain",';
					break;
				case 'urt':
					echo 'mode: "text/x-urtsrc",';
					break;
				case 'mapcycle':
					echo 'mode: "text/plain",';
					break;
				case 'serveur':
					echo 'mode: "text/plain",';
					break;
			}
?>
		lineNumbers: true,
		tabSize: 0,
		lineWrapping: true,
		onCursorActivity: function() {
			editor.setLineClass(hlLine, null);
			hlLine = editor.setLineClass(editor.getCursor().line, "activeline");
		}
	});
	var hlLine = editor.setLineClass(0, "activeline");
</script>
