<?php
	ob_start();
?>

<div>
	<h4 class='heading'>Adventures</h4>
	<p><a class='basicLink' href='travel/travel-rome-italy.php'>Trip to Rome Italy</a></p>
	<h4 class='heading'>Articles</h4>
	<p><a class='basicLink' href='articles/debit-credit-cards.php'>Debit &amp; Credit Card Numbers</a></p>
</div>

<?php
	$pageTitle = "hkunz.com: Blog";
	$pageSubTitle = "My Blog";
	$pageMainContent = ob_get_contents();
	$headers = "";
	ob_end_clean();
	include("../php/master.inc.php");
?>