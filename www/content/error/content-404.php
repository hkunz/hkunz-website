<?php
	$page->setPageTitle("Error 404: Non-Existent Page");
	$img = $page->getImagePath();
?>
<style>
.error-404-outer {
	width: 100%;
	text-align: center;
}
.error-404-inner {
	background: url(/assets/images/error/404.jpg) no-repeat center;
	text-align: middle;
	width: 100%;
	height: 264px;
}
</style>
<p><b>Error 404: </b>The page you are looking for does not exist.</p>
<div class="error-404-outer">
	<div class="error-404-inner"></div>
</div>
<p>Please try the other links on the left panel.</p>