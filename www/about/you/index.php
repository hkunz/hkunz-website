<?php
	ob_start();
?>

<div>
	<p><b>YOU ARE YOU! :)</b></p>
</div>
	
<?php
	$pageTitle = "About You";
	$pageSubTitle = "About You";
	$pageMainContent = ob_get_contents();
	$headers = "";
	ob_end_clean();
	
	include("../../php/master.inc.php");
?>
