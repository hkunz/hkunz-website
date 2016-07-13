<?php
	$root = realpath($_SERVER["DOCUMENT_ROOT"]);
	include $root . '/php/PageContent.php';
	include $root . '/php/createImageLightbox.inc.php';
	$page = new PageContent("CBA Touch Screen Kiosk");
?>

<div>
	<p class="block">We were given the task to design and build a UI for the <a class='basicLink' href='https://www.commbank.com.au/' target='_blank'>Commonwealth Bank of Australia</a>'s interactive kiosk project. The interface was designed to maximise the navigational possibilities of large scale touch screens and be flexible enough to work with a bespoke CMS and CBA's branding requirements. The application was written with mostly pure <a href='https://en.wikipedia.org/wiki/ActionScript' target='_blank'>ActionScript 3.0</a> incorporating a custom made <a href="https://en.wikipedia.org/wiki/Content_management_system">CMS</a>. My lead was <a href="https://www.linkedin.com/in/simon-rodwell-8715101">Simon Rodwell</a> who as of this writing now works for Amazon</p>
	<?php echo createImageLightbox("img/cba-logo-2.jpg", 460); ?>
	<p class="block">Main Menu</p>
	<?php echo createImageLightbox("img/cba-mainmenu.jpg", 460); ?>
        <p class="block">Home Loan Repayment Screen</p>
	<?php echo createImageLightbox("img/cba-home-loan-calc.jpg", 460); ?>
        <p class="block">Quick Links Panel</p>
	<?php echo createImageLightbox("img/cba-quicklinks.jpg", 460); ?>
        <p class="block">Bank's Logo</p>
	<?php echo createImageLightbox("img/cba-logo-1.jpg", 460); ?>
</div>

<?php
	$page->render();
?>
