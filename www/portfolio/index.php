<?php
	ob_start();
?>

<div>
	<p><a class='basicLink' href='skinzone/'>SkinzoneSkincare Website</a></p>
	<p><a class='basicLink' href='stockchart/'>Random-Generated Stock Graph</a></p>
</div>
	
<?php
	$pageTitle = "hkunz.com: Portfolio";
	$pageSubTitle = "Portfolio";
	$pageMainContent = ob_get_contents();
	$headers = "";
	ob_end_clean();
	
	include("../php/master.inc.php");
?>