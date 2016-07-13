<?php
	$root = realpath($_SERVER["DOCUMENT_ROOT"]);
	include $root . '/php/PageContent.php';
	$page = new PageContent("My Blog");
?>

<div>
	<h4 class='heading'>Adventures</h4>
	<p><a class='basicLink' href='travel/travel-rome-italy.php'>Trip to Rome Italy</a></p>
	<h4 class='heading'>Articles</h4>
	<p><a class='basicLink' href='articles/debit-credit-cards.php'>Debit &amp; Credit Card Numbers</a></p>
</div>

<?php
	$page->render();
?>