<?php
	$root = realpath($_SERVER["DOCUMENT_ROOT"]);
	include $root . '/php/PageContent.php';
	$page = new PageContent("Pacman Prototype");
?>

<div>
	<p>Check out this pacman prototype game i made. Source code at <a class='basicLink' href='https://github.com/hkunz/pacman-prototype' target='_blank'>github</a>. This game has no ending as this is still a prototype. It is slightly different from the original version in that when you eat a ghost it goes around at random locations for 5 seconds and then re-spawns itself.<br /><br /></p>
	<div><div id='flashContent' class='flashContent'></div></div>
</div>

<script type="text/javascript">
	var root = '../../';
	var type = 'actionscript';
	var so = new SWFObject(root + "flash/FlashLoader.swf?url=PacMan.swf", "theMovie", "445", "590", "8");
	
	so.addParam("allowScriptAccess", "always");
	so.addParam("wmode", "transparent", "middle");
	so.write("flashContent");
</script>

<?php
	$page->render($page);
?>
