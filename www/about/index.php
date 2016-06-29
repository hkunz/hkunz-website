<?php
	ob_start();
?>

<div>
	<p><a class='basicLink' href=''>About Me</a></p>
	<p><a class='basicLink' href=''>About You</a></p>
</div>
	
<?php
	$pageTitle = "hkunz.com: About";
	$pageSubTitle = "About";
	$pageMainContent = ob_get_contents();
	$headers = "";
	ob_end_clean();
	
	include("../php/master.inc.php");
?>