<?php
	$root = realpath($_SERVER["DOCUMENT_ROOT"]);
	include $root . '/php/PageContent.php';
	$page = new PageContent("Error 404: Non-Existent Page");
?>

<div>
	<p>The page you are looking for does not exist. Please do visit some of the other links on the left panel.</p>
</div>

<?php
	$page->render();
?>