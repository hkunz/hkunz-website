<?php
	ob_start();
?>

<div>
	<p><a class='basicLink' href='articles/debit-credit-cards.php'>Debit &amp; Credit Card Numbers</a></p>
</div>

<?php
	$pageTitle = "hkunz.com: Articles";
	$pageSubTitle = "Articles";
	$pageMainContent = ob_get_contents();
	$headers = "";
	ob_end_clean();
	include("../php/master.inc.php");
?>