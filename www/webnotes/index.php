<?php
	ob_start();
?>

<div>
	<p><b>Basics</b></p>
</div>
	
<?php
	$pageTitle = "Web Notes";
	$pageSubTitle = "Web Notes";
	$pageMainContent = ob_get_contents();
	$headers = "";
	ob_end_clean();
	
	include("../php/master.inc.php");
?>
