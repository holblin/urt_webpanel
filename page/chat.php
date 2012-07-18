<?php

	$str = shell_exec('ls /var/log/urbanterror/'.$selected.'/');
	$logs = explode("\n", $str);
	array_pop($logs); // remove the last (is empty name server because shell finish with \n)


	if (isset($_REQUEST['log']) && in_array($_REQUEST['log'], $logs )) {
		$log = $_REQUEST['log'];
	}
	else {
		$log = 'none';
	}
	
	echo '<div class="uni ui-state-default ui-corner-all">
			<div class="header ui-widget-header ui-corner-all">
				<div class="choix">';
					foreach($logs as $l) {
						echo '<a href="index.php?selected='.urlencode($selected).'&page='.$page.'&log='.urlencode($l).'" '.($log == $l ? 'class="ui-state-active"': '').'>'.ucfirst($l).'</a>';
					}
			echo '</div>
			</div>';
		echo '<div>';
	if ($log == 'none') {
		echo '<div>';
			echo 'Petite explication sur blablabla ...<br/>Explication des raccourcis';
		echo '</div>';
	}
	else {
		echo '<div>';
			echo'<textarea name="log_file" id="log_file">';
				if ( file_exists( '/var/log/urbanterror/'.$selected.'/'.$log )) {
					$file = substr( file_get_contents('/var/log/urbanterror/'.$selected.'/'.$log) , -(1024*50));
					
					$file = explode("\n", $file);
					$file = array_reverse($file);
					array_pop($file);
					$file = implode("\n", $file);
					echo $file;
				}
			echo'</textarea>';
		echo '</div>';
	}
	echo '</div>';
	
				

?>
<script>
	var editor = CodeMirror.fromTextArea(document.getElementById("log_file"), {
		mode: "text/plain",
		lineNumbers: true,
		tabSize: 4,
		lineWrapping: true,
		onCursorActivity: function() {
			editor.setLineClass(hlLine, null);
			hlLine = editor.setLineClass(editor.getCursor().line, "activeline");
		}
	});
	var hlLine = editor.setLineClass(0, "activeline");
</script>
