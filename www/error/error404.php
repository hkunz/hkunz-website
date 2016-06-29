<?php
  ob_start(); //Buffer larger content areas like the main page content
?>

<div>
	<p>The page you are looking for does not exist. Please do visit some of the other links on the left panel.</p>
</div>

<?php
	$pageTitle = "Error 404";
	$pageSubTitle = "Non-Existent Page";
	$pageMainContent = ob_get_contents();
	$headers = "";
	ob_end_clean();

	include("../php/master.inc.php");
?>