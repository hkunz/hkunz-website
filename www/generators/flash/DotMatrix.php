<?php
	ob_start();
?>

<div>
	<p>This is a 3d looking Dot Matrix display generator! You can tinker around with the settings :)<br /><br /></p>
	<div><div id='flashContent' class='flashContent'></div></div>
</div>

<script type="text/javascript">
	var root = '../../';
	var type = 'actionscript';
	var so = new SWFObject(root + "flash/FlashLoader.swf?url=DotMatrix3d.swf", "theMovie", "445", "590", "8");
	
	so.addParam("allowScriptAccess", "always");
	so.addParam("wmode", "transparent", "middle");
	so.write("flashContent");
</script>

<?php
	$pageTitle = "3D Dot-Matrix";
	$pageSubTitle = "3D Dot-Matrix";
	$pageMainContent = ob_get_contents();
	$headers = "";
	ob_end_clean();
	
	include("../../php/master.inc.php");
?>
