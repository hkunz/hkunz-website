<?php
	ob_start();
?>

<div>
	<p><a class='basicLink' href='flash/'>Flash generators</a></p>
	<p><a class='basicLink' href='htmlcss/CodeToHtmlCss.php/'>CodeToHtmlCss Generator</a></p>
</div>
	
<?php
	$pageTitle = "hkunz.com: Generators";
	$pageSubTitle = "Generators";
	$pageMainContent = ob_get_contents();
	$headers = "";
	ob_end_clean();
	
	include("../php/master.inc.php");
?>