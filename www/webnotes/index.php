<?php
	$root = realpath($_SERVER["DOCUMENT_ROOT"]);
	include $root . '/php/PageContent.php';
	$page = new PageContent("Web Notes");
?>

<div>
	<p><b>Basics</b></p>
</div>

<?php
	$page->render();
?>
