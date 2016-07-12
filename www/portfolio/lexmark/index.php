<?php
	$root = realpath($_SERVER["DOCUMENT_ROOT"]);
	include $root . '/php/PageContent.php';
	include $root . '/php/createImageLightbox.inc.php';
	$page = new PageContent("Lexmark Platinum Pro905");
?>

<div>
	<p class="block">User interface for touch-based operator panel of <a class='basicLink' href='http://www.lexmark.com' target='_blank'>Lexmark</a>'s inkjet printers. Lexmark's venture to create the first web-enabled touch based user interface for their inkjet printers through collaboration of engineers from different sites. This innovation put Lexmark into a strategic position with offerings of solutions that increases the productivity and efficiency of its customers.</p>
	<?php echo createImageLightbox("img/lxk-logo-1.jpg", 460); ?>
	<p class="block">Lexmark has recently changed their logo to reflect the "green" implying their products are now more environment friendly</p>
	<?php echo createImageLightbox("img/lxk-logo-2.jpg", 460); ?>
	<p class="block">My team was in charge of developing the operator panel (OpPanel) GUI which was written in ActionScript-2.0 and C++ was the backend firmware</p>
	<?php echo createImageLightbox("img/lxk-platinum-pro905.jpg", 460); ?>
	<p class="block">A closer view of the main menu of the pro905</p>
	<?php echo createImageLightbox("img/lxk-platinum-pro905-closeup.jpg", 460); ?>
</div>

<?php
	$page->render($page);
?>
