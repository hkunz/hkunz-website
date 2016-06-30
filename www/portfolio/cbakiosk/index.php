<?php
	ob_start();
	$link = "<a class='basicLink' href='https://www.commbank.com.au/' target='_blank'>Commonwealth Bank of Australia</a>"
?>

<div>
	<p class="block">We were given the task to design and build a UI for the <?php echo $link;?>'s interactive kiosk project. The interface was designed to maximise the navigational possibilities of large scale touch screens and be flexible enough to work with a bespoke CMS and CBA's branding requirements. The application was written with mostly pure <a href='https://en.wikipedia.org/wiki/ActionScript' target='_blank'>ActionScript 3.0</a> incorporating a custom made <a href="https://en.wikipedia.org/wiki/Content_management_system">CMS</a>. My lead was <a href="https://www.linkedin.com/in/simon-rodwell-8715101">Simon Rodwell</a> who as of this writing now works for Amazon</p>
	<div class="showTell"><img class="" src="img/cba-logo-2.jpg"/></div>
	<p class="block"></p>
</div>

<?php
	$pageTitle = "CBA Touch Screen Kiosk";
	$pageSubTitle = "CBA Touch Screen Kiosk";
	$pageMainContent = ob_get_contents();
	$headers = "";
	ob_end_clean();
	
	include("../../php/master.inc.php");
?>
