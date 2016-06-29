<?php
  ob_start();
?>

<div>
	<p>Stock Page Specific Content</p>
</div>

<?php
	$pageTitle = "Stock Chart";
	$headers = "";
	$pageMainContent = ob_get_contents();
	ob_end_clean();

	include("../../php/master.inc.php");
?>