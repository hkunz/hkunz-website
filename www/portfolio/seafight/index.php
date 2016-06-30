<?php
	ob_start();
	$link = "<a class='basicLink' href='http://seafight.com' target='_blank'>Seafight</a>"
?>

<div>
	<p class="block">Kiosk application for our client <?php echo $link;?>. This application was creeated with mostly pure <a href='https://en.wikipedia.org/wiki/ActionScript' target='_blank'>ActionScript 3.0</a> incorporating a custom made <a href="https://en.wikipedia.org/wiki/Content_management_system">CMS</a>. My lead was <a href="https://www.linkedin.com/in/simon-rodwell-8715101">Simon Rodwell</a> who as of this writing now works for Amazon</p>
	<div class="showTell"><img class="" src="img/sf-view.png" width="450"/></div>
	<p class="block"></p>
</div>

<?php
	$pageTitle = "Seafight";
	$pageSubTitle = "Seafight";
	$pageMainContent = ob_get_contents();
	$headers = "";
	ob_end_clean();
	
	include("../../php/master.inc.php");
?>
