<?php
	$root = realpath($_SERVER["DOCUMENT_ROOT"]);
	include $root . '/php/PageContent.php';
	$page = new PageContent("3D Dot-Matrix");
?>

<div>
	<p>This is a 3d looking Dot Matrix display generator! You can tinker around with the settings :)<br /><br /></p>
	<div><div id='flashContent' class='flashContent'></div></div>
</div>

<script type="text/javascript">
	var root = '../../';
	var type = 'actionscript';
	var so = new SWFObject(root + "flash/FlashLoader.swf?url=DotMatrix3d.swf", "theMovie", "445", "400", "8");
	
	so.addParam("allowScriptAccess", "always");
	so.addParam("wmode", "transparent", "middle");
	so.write("flashContent");
</script>

<?php
	$page->render($page);
?>
