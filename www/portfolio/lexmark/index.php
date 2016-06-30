<?php
	ob_start();
	$link = "<a class='basicLink' href='http://www.lexmark.com' target='_blank'>Lexmark</a>"
?>

<div>
	<p class="block">User interface for touch-based operator panel of <?php echo $link;?>'s inkjet printers. Lexmark's venture to create the first web-enabled touch based user interface for their inkjet printers through collaboration of engineers from different sites. This innovation put Lexmark into a strategic position with offerings of solutions that increases the productivity and efficiency of its customers.</p>
	<div class="showTell"><img class="" src="img/lxk-platinum-pro905.jpg" width="460"/></div>
	<p class="block"></p>
</div>

<?php
	$pageTitle = "Lexmark Platinum Pro905";
	$pageSubTitle = "Lexmark Platinum Pro905";
	$pageMainContent = ob_get_contents();
	$headers = "";
	ob_end_clean();
	
	include("../../php/master.inc.php");
?>
