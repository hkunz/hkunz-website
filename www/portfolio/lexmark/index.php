<?php
	ob_start();
	$link = "<a class='basicLink' href='http://www.lexmark.com' target='_blank'>Lexmark</a>";
	include '../../php/createImageLightbox.inc.php';
?>

<div>
	<p class="block">User interface for touch-based operator panel of <?php echo $link;?>'s inkjet printers. Lexmark's venture to create the first web-enabled touch based user interface for their inkjet printers through collaboration of engineers from different sites. This innovation put Lexmark into a strategic position with offerings of solutions that increases the productivity and efficiency of its customers.</p>
	<?php echo createImageLightbox("img/lxk-logo-1.jpg", 460); ?>
	<p class="block">Lexmark has recently changed their logo to reflect the "green" implying their products are now more environment friendly</p>
	<?php echo createImageLightbox("img/lxk-logo-2.jpg", 460); ?>
	<p class="block">My team was in charge of developing the operator panel (OpPanel) GUI which was written in ActionScript-2.0 and C++ was the backend firmware</p>
	<?php echo createImageLightbox("img/lxk-platinum-pro905.jpg", 460); ?>
	<p class="block">A closer view of the main menu of the pro905</p>
	<?php echo createImageLightbox("img/lxk-platinum-pro905-closeup.jpg", 460); ?>
</div>


<?php
	$pageTitle = "Lexmark Platinum Pro905";
	$pageSubTitle = "Lexmark Platinum Pro905";
	$pageMainContent = ob_get_contents();
	$headers = "";
	ob_end_clean();

	include("../../php/master.inc.php");
?>
