<?php

if ($servers[$selected]['status'] == 'on') {

	echo '<div class="uni ui-state-default ui-corner-all">';
		echo '<form action="index.php?selected='.urlencode($selected).'&page='. $page.'" method="POST">';
			echo '<div class="ui-widget-header ui-corner-all"> &nbsp; 
					<label for="rcon_command">Votre commande rcon</label> &nbsp; 
					<input type="text" class="rcon_autocomplete focus" name="rcon_command" id="rcon_command" value="'.(isset($_POST['rcon_command']) ? urldecode($_POST['rcon_command']):'').'"/>
					<button class="btn_play" type="submit">Exécuter</button>
				</div>';
		echo '</form>';
		if (empty($_REQUEST['rcon_command']))
			$_REQUEST['rcon_command'] = 'cmdlist';
		echo '<div>';
		
			$data = rcon( $ip, $servers[$selected]['port'], $rcon , urldecode($_REQUEST['rcon_command']));
			
			if (preg_match( '/set.?\s+rconpassword\s+.+/',urldecode($_REQUEST['rcon_command']) )){
				$rcon = $_SESSION['serveur'][$selected]['rcon'] = rcon_recovery($ip, $servers[$selected]['port'] ,$rcon_recovery);;
			}
		
			echo '<div><span>/rcon '.htmlentities( urldecode($_REQUEST['rcon_command']) ).'</span></div>';
			echo '<div><textarea id="rcon_answer">'.htmlentities( $data ) .'</textarea></div>';
			
		echo '</div>';
	echo '</div>';

	?>
<script>
	var editor = CodeMirror.fromTextArea(document.getElementById("rcon_answer"), {
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
	
	<?php
}else {
	echo '<h1>Non disponible si le serveur est éteind !</h1>';
}