<?php
	//FIXME: this should be under content/portfolio/pacman
	$root = realpath($_SERVER["DOCUMENT_ROOT"]);
	include $root . '/php/PageContent.php';
	$page = new PageContent();
	$page->setPageTitle("Pacman Prototype");
?>
<p>Check out this <b>pacman prototype</b> game i made. Source code at <a class='basicLink' href='https://github.com/hkunz/pacman-prototype' target='_blank'><b>github</b></a>. This game has no ending as this is still a prototype. It is slightly different from the original version in that when you eat a ghost it goes around at random locations for 5 seconds and then re-spawns itself.<br /><br /></p>
<div id='flashContent' class='flashContent'></div>
<script type="text/javascript">
	var flash = "/assets/bin/portfolio/";
	var type = 'actionscript';
	var so = new SWFObject(flash + "flashloader.swf?url=" + flash + "pacman.swf", "theMovie", "445", "590", "8");
	so.addParam("allowScriptAccess", "always");
	so.addParam("wmode", "transparent", "middle");
	so.write("flashContent");
</script>
<?php
	$page->render();
?>