<?php
	ob_start();
?>

<div>
	<p>Check out this pacman prototype game i made. This game has no ending as this is still a prototype. It is slightly different from the original version in that when you eat a ghost it goes around at random locations for 5 seconds and then re-spawns itself.<br /></p>
	<div><div id='flashContent' name='flashContent' class='flashContent'></div></div>
</div>

<script language="javascript" type="text/javascript">
	var root = '../../';
	var type = 'actionscript';
	var so = new SWFObject(root + "flash/FlashLoader.swf?url=PacMan.swf", "theMovie", "445", "590", "8");
	
	so.addParam("allowScriptAccess", "always");
	so.addParam("wmode", "transparent", "middle");
	so.write("flashContent");
</script>

<?php
	$pageTitle = "Pacman Prototype";
	$pageSubTitle = "Pacman Prototype";
	$pageMainContent = ob_get_contents();
	$headers = "";
	ob_end_clean();
	
	include("../../php/master.inc.php");
?>