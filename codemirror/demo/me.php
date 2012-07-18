<?php

	if (isset($_REQUEST['code']))
		file_put_contents('dump.sh',$_REQUEST['code']);

?><!doctype html>
<html>
  <head>
    <title>CodeMirror: Active Line Demo</title>
    <link rel="stylesheet" href="../lib/codemirror.css">
    <script src="../lib/codemirror.js"></script>
    <script src="../mode/clike/clike.js"></script>
    <script src="../lib/util/dialog.js"></script>
    <link rel="stylesheet" href="../lib/util/dialog.css">
    <script src="../lib/util/searchcursor.js"></script>
    <script src="../lib/util/search.js"></script>

    <style type="text/css">
      .CodeMirror {border-top: 1px solid black; border-bottom: 1px solid black;}
      .activeline {background: #e8f2ff !important;}
      .CodeMirror-scroll {
        height: auto;
        overflow-y: hidden;
        overflow-x: auto;
        width: 100%;
      }
    </style>
  </head>
  <body>
  
  

    <form method="post">
		<textarea id="code" name="code"><?php echo file_get_contents('serveur.cfg');?></textarea>
		<button type="submit">Save</button>
	</form>

    <script>
var editor = CodeMirror.fromTextArea(document.getElementById("code"), {
	mode: "text/x-urtsrc",
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


  </body>
</html>
